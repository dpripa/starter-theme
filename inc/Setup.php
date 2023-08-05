<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Setup {
	public function __construct() {
		add_action('after_setup_theme', [$this, 'init']);
	}

	public function init(): void {
		new ACF();

		add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
	}

	public function enqueue_assets(): void {
		app()->asset->enqueue_style('main');
		app()->asset->enqueue_script('main');
	}
}
