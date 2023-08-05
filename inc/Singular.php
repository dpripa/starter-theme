<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Singular {
	public function __construct() {
		if (!is_singular()) {
			return;
		}

		add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
	}

	public function enqueue_assets(): void {
		app()->asset->enqueue_style('singular');

		if (self::is_template('template-example')) {
			app()->asset->enqueue_style('template-example');
		}
	}

	public static function is_template(string $slug): bool {
		return is_page_template('templates/' . $slug . '.php');
	}

	public static function get_title(): string {
		if (is_home()) {
			$home = get_option('page_for_posts', true);

			if ($home) {
				return get_the_title($home);
			}

			return '';

		} elseif (is_archive()) {
			return single_cat_title('', false);

		} elseif (is_search()) {
			return sprintf(esc_html(app()->i18n->__('Search Results for "%s"')), get_search_query());

		} elseif (is_404()) {
			return esc_html(app()->i18n->__("Oops! That page can't be found."));
		}

		return get_the_title();
	}
}
