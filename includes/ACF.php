<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

final class ACF {

	public function __construct() {
		if ( app()->simpleton()->validate( self::class ) ) {
			return;
		}

		app()->integration()->acf()->block_category()->add(
			'general',
			'acf-blocks/general',
			app()->i18n()->__( 'My General ACF Blocks' )
		);
	}
}
