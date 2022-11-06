<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Setup extends StaticClass {
	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}

		add_action('after_setup_theme', [$this, 'init']);
	}

	public function init(): void {
		load_theme_textdomain(KEY, get_path('lang'));

		new Form();
		new ACF();
		new Admin();

		add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
	}

	public function enqueue_assets(): void {
		Asset::enqueue_script('main');
		Asset::enqueue_style('main');
	}
}
