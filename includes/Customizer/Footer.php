<?php

namespace My_Theme\Customizer;

use function My_Theme\app;

defined( 'ABSPATH' ) || exit;

final class Footer {

	public function __construct() {
		if ( app()->simpleton()->validate( self::class ) ) {
			return;
		}
	}
}
