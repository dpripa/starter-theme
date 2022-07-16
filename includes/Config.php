<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

final class Config {

	public function __construct() {
		if ( app()->simpleton()->validate( self::class ) ) {
			return;
		}

		app()->i18n()->setup();
		app()->admin()->notice()->setup();
		app()->integration()->polylang()->setup();
		app()->customizer()->setup();

		app()->integration()->wc()->set_theme_support()
			->integration()->wc()->set_block_support();

		app()->setting()->set_header( array( Setting::class, 'render_header' ) )
			->setting()->set_submit_btn( app()->i18n()->__( 'Save changes' ) )
			->setting()->set_error_notice( app()->i18n()->__( 'Something went wrong.' ) )
			->setting()->set_success_notice( app()->i18n()->__( 'Changes saved.' ) )
			->setting()->setup();
	}
}
