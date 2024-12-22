<?php
namespace MyTheme;

use Exception;

defined( 'ABSPATH' ) || exit;

class Setup {
	public function __construct() {
		new Activation();
		new Deactivation();
		new Env();

		add_action( 'after_setup_theme', array( $this, 'init' ) );
	}

	public function init(): void {
		load_theme_textdomain( KEY, Fs::get_path( 'lang' ) );

		new Plugin();
		new Admin();
		new Singular();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * @throws Exception
	 */
	public function enqueue_assets(): void {
		Asset::enqueue_style( 'main' );
		Asset::enqueue_script( 'main' );
	}
}
