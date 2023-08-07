<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class ACF {
	public function __construct() {
		app()->acf_block_autoloader->add_block_type(
			'main',
			'acf-block',
			app()->i18n->__('Main')
		);

		if (defined('WP_ENVIRONMENT') && 'development' !== WP_ENVIRONMENT) {
			add_filter('acf/settings/show_admin', '__return_false');
		}
	}
}
