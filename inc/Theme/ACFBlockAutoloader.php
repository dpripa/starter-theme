<?php
namespace MyTheme\Theme;

use const MyTheme\KEY;

defined( 'ABSPATH' ) || exit;

class ACFBlockAutoloader {
	protected const KEY = KEY;

	public static function add_block_type( string $category, string $path, string $title ): void {
		if (
			! function_exists( 'acf_register_block_type' ) ||
			! function_exists( 'register_block_type' )
		) {
			return;
		}

		static::add_block_category( $category, $title );
		static::add_block_template_autoloader( $category, $path );
	}

	protected static function get_path( string $rel ): string {
		return Fs::get_path( $rel );
	}

	protected static function add_block_category( string $category, string $title ): void {
		add_filter(
			'block_categories',
			function ( array $categories ) use ( $category, $title ): array {
				return array_merge(
					array(
						array(
							'slug'  => static::KEY . "_$category",
							'title' => $title,
						),
					),
					$categories
				);
			}
		);
	}

	protected static function add_block_template_autoloader( string $category, string $path ): void {
		add_action(
			'acf/init',
			function() use ( $category, $path ): void {
				$dir = static::get_path( $path );

				if ( ! file_exists( $dir ) ) {
					return;
				}

				$dir_iterator = new \DirectoryIterator( $dir );

				foreach ( $dir_iterator as $file ) {
					if ( $file->isDot() ) {
						continue;
					}

					$slug = str_replace( '.php', '', $file->getFilename() );

					$file_headers = get_file_data(
						"$dir/$slug.php",
						array(
							'name'        => 'Block Name',
							'description' => 'Block Description',
							'icon'        => 'Block Icon',
							'keywords'    => 'Block Keywords',
							'post_types'  => 'Block Post Types',
						)
					);

					acf_register_block_type(
						array(
							'name'            => $slug,
							'title'           => __( $file_headers['name'], static::KEY ), // phpcs:ignore
							'description'     => __( $file_headers['description'], static::KEY ), // phpcs:ignore
							'category'        => static::KEY . "_$category",
							'icon'            => $file_headers['icon'],
							'keywords'        => explode( ', ', $file_headers['keywords'] ),
							'post_types'      => explode( ', ', trim( $file_headers['post_types'] ) ),
							'mode'            => 'edit',
							'supports'        => array(
								'mode'  => false,
								'align' => false,
							),
							'render_callback' => function ( array &$args ) use ( $path, $slug ) {
								require_once static::get_path( "${path}/${slug}.php" );
							},
						)
					);
				}
			}
		);
	}
}
