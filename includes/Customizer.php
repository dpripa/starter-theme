<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

final class Customizer {

	public function __construct() {
		if ( app()->simpleton()->validate( self::class ) ) {
			return;
		}

		new Customizer\Footer();
	}
}
