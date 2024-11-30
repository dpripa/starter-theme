<?php
namespace MyTheme\Plugin;

use DirectoryIterator;
use Exception;
use MyTheme\Fs;
use MyTheme\Helper;
use const MyTheme\KEY;

defined( 'ABSPATH' ) || exit;

class ACF extends RequiredPlugin {
	protected $file = 'advanced-custom-fields-pro/acf.php';
	protected $name = 'Advanced Custom Fields PRO';

	public static function add_block_type( string $post_type, string $title, string $field_namespace ): void {
		if (
			! function_exists( 'acf_register_block_type' ) ||
			! function_exists( 'register_block_type' )
		) {
			return;
		}

		static::register_block_category( $post_type, $title );
		static::register_blocks( $post_type, $field_namespace );
	}

	protected static function register_block_category( string $post_type, string $title ): void {
		add_filter(
			'block_categories_all',
			function ( array $categories ) use ( $post_type, $title ): array {
				return array_merge(
					array(
						array(
							'slug'  => KEY . "_$post_type",
							'title' => $title,
						),
					),
					$categories
				);
			}
		);
	}

	protected static function register_blocks( string $post_type, string $field_namespace ): void {
		add_action(
			'acf/init',
			function() use ( $post_type, $field_namespace ): void {
				$path = "acf-block/$post_type";
				$dir  = Fs::get_path( $path );

				if ( ! file_exists( $dir ) ) {
					throw new Exception( "No \"$path\" directory was found" );
				}

				$dir_iterator = new DirectoryIterator( $dir );

				foreach ( $dir_iterator as $file ) {
					if ( $file->isDot() ) {
						continue;
					}

					$slug         = str_replace( '.php', '', $file->getFilename() );
					$file_headers = get_file_data(
						"$dir/$slug.php",
						array(
							'name'        => 'Block Name',
							'description' => 'Block Description',
							'icon'        => 'Block Icon',
							'keywords'    => 'Block Keywords',
						)
					);

					if ( empty( $file_headers['name'] ) ) {
						throw new Exception( "Block Name file header is required in the \"$slug\".php template" );
					}

					$file_headers['description'] = $file_headers['description'] ?? '';
					$file_headers['icon']        = $file_headers['icon'] ?? '';
					$file_headers['keywords']    = $file_headers['icon'] ?? '';

					static::register_block_fields( $slug, $field_namespace );
					acf_register_block_type(
						array(
							'name'            => $slug,
							'title'           => __( $file_headers['name'], KEY ), // phpcs:ignore
							'description'     => __( $file_headers['description'], KEY ), // phpcs:ignore
							'category'        => KEY . "_$post_type",
							'icon'            => $file_headers['icon'],
							'keywords'        => explode( ', ', $file_headers['keywords'] ),
							'post_types'      => array( $post_type ),
							'mode'            => 'edit',
							'supports'        => array(
								'mode'  => false,
								'align' => false,
							),
							'render_callback' => function ( array &$args ) use ( $path, $slug ) {
								require_once Fs::get_path( "$path/$slug.php" );
							},
						)
					);
				}
			}
		);
	}

	protected static function register_block_fields( string $slug, string $field_namespace ): void {
		$classname = $field_namespace . '\\' . Helper::dash_to_camelcase( $slug, true );

		if ( ! class_exists( $classname ) ) {
			return;
		}

		new $classname();
	}
}
