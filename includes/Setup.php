<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

final class Setup {

	public function __construct() {
		if ( app()->simpleton()->validate( self::class ) ) {
			return;
		}

		new Config();

		app()->setup( array( $this, 'setup' ) );
	}

	public function setup(): void {
		new ACF();
		new Setting();
		new Customizer();
		new Singular();

		app()->nav_menu()->add( 'main', app()->i18n()->__( 'Main menu' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		app()->hook()->do_action( 'setup_complete' );
	}

	public function enqueue_assets(): void {
		app()->asset()->enqueue_external_style(
			'google_fonts',
			'//fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800;900&display=swap'
		);

		app()->setting()->context()->add( 'general', 'single' );

		$label = app()->setting()->get( 'hello_text_label', 'labels' );

		app()->asset()->enqueue_script(
			'main',
			array( 'jquery' ),
			array(
				'labelText' => $label,
			)
		)->asset()->enqueue_style( 'main' );
	}
}
