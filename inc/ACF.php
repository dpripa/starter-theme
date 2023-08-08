<?php

namespace MyTheme;

defined( 'ABSPATH' ) || exit;

final class ACF {
	public function __construct() {
		if ( app()->validate_setup( self::class ) ) {
			return;
		}

		app()->acf_block_autoloader->add_block_type(
			'main',
			'acf-block',
			app()->i18n->__( 'Main' )
		);

		if ( ! app()->env->is_development() ) {
			add_filter( 'acf/settings/show_admin', '__return_false' );
		}
	}
}
