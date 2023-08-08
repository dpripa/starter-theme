<?php

namespace MyTheme\Extension;

use MyPlugin\Core\App;
use MyPlugin\Core\Extension\FS;
use MyPlugin\Core\Extension\I18n;

defined( 'ABSPATH' ) || exit;

class ACFBlockAutoloader {
	protected $app;
	protected $fs;
	protected $i18n;

	public function __construct( App $app, FS $fs, I18n $i18n ) {
		$this->app  = $app;
		$this->fs   = $fs;
		$this->i18n = $i18n;
	}

	public function add_block_type( string $category, string $path, string $title ): void {
		if (
			! function_exists( 'acf_register_block_type' ) ||
			! function_exists( 'register_block_type' )
		) {
			return;
		}

		$this->add_block_category( $category, $title );
		$this->add_block_template_autoloader( $category, $path );
	}

	protected function add_block_category( string $category, string $title ): void {
		add_filter(
			'block_categories',
			function ( array $categories ) use ( $category, $title ): array {
				return array_merge(
					array(
						array(
							'slug'  => $this->app->get_key( $category ),
							'title' => $title,
						),
					),
					$categories
				);
			}
		);
	}

	protected function add_block_template_autoloader( string $category, string $path ): void {
		add_action(
			'acf/init',
			function() use ( $category, $path ): void {
				$dir = $this->fs->get_path( $path );

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
							'title'           => $this->i18n->__( $file_headers['name'] ),
							'description'     => $this->i18n->__( $file_headers['description'] ),
							'category'        => $this->app->get_key( $category ),
							'icon'            => $file_headers['icon'],
							'keywords'        => explode( ', ', $file_headers['keywords'] ),
							'post_types'      => explode( ', ', trim( $file_headers['post_types'] ) ),
							'mode'            => 'edit',
							'supports'        => array(
								'mode'  => false,
								'align' => false,
							),
							'render_callback' => function ( array &$args ) use ( $path, $slug ) {
								require_once $this->fs->get_path( "${path}/${slug}.php" );
							},
						)
					);
				}
			}
		);
	}
}
