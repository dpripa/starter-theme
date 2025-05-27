<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;

class Deactivation {
	public function __construct() {
		add_action( 'switch_theme', array( $this, 'deactivate' ) );
	}

	public function deactivate(): void {
		Admin\Notice::reset();
	}
}
