<?php
namespace MainTheme;

defined( 'ABSPATH' ) || exit;

class Setup {
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'init' ) );
	}

	public function init(): void {
		load_theme_textdomain( KEY, Theme\Fs::get_path( 'lang' ) );

		new ACF();
		new Singular();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	public function enqueue_assets(): void {
		Theme\Asset::enqueue_style( 'main' );
		Theme\Asset::enqueue_script( 'main' );
	}
}
