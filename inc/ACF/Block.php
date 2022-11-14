<?php

namespace MyTheme\ACF;

use MyTheme\Simpleton;
use const MyTheme\KEY;
use function MyTheme\get_path;

defined('ABSPATH') || exit;

final class Block {
	use Simpleton;

	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}

		$this->add('main', 'acf-block', __('Main', KEY));
	}

	private function add(string $category, string $path, string $title): self {
		if (
			!function_exists('acf_register_block_type') ||
			!function_exists('register_block_type')
		) {
			return $this;
		}

		$this->add_category($category, $title);
		$this->add_template_autoloader($category, $path);

		return $this;
	}

	private function add_category(string $category, string $title): void {
		add_filter(
			'block_categories',
			function (array $categories) use ($category, $title): array {
				return array_merge(
					[
						[
							'slug' => KEY . "_$category",
							'title' => $title,
						],
					],
					$categories
				);
			}
		);
	}

	private function add_template_autoloader(string $category, string $path): void {
		add_action(
			'acf/init',
			function() use ($category, $path): void {
				$dir = get_path($path);

				if (!file_exists($dir)) {
					return;
				}

				$dir_iterator = new \DirectoryIterator($dir);

				foreach ($dir_iterator as $file) {
					if ($file->isDot()) {
						continue;
					}

					$slug = str_replace('.php', '', $file->getFilename());

					$file_headers = get_file_data(
						"$dir/$slug.php",
						[
							'name' => 'Block Name',
							'description' => 'Block Description',
							'icon' => 'Block Icon',
							'keywords' => 'Block Keywords',
							'post_types' => 'Block Post Types',
						]
					);

					acf_register_block_type(
						[
							'name' => $slug,
							'title' => esc_html__( $file_headers['name'], KEY ), // phpcs:ignore
							'description' => esc_html__( $file_headers['description'], KEY ), // phpcs:ignore
							'category' => KEY . "_$category",
							'icon' => $file_headers['icon'],
							'keywords' => explode(', ', $file_headers['keywords']),
							'post_types' => explode(', ', trim($file_headers['post_types'])),
							'mode' => 'edit',
							'supports' => [
								'mode' => false,
								'align' => false,
							],
							'render_callback' => function (array &$args) use ($path, $slug) {
								require_once get_path("${path}/${slug}.php");
							},
						]
					);
				}
			}
		);
	}
}
