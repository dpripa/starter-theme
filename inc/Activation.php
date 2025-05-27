<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;

class Activation {
	public function __construct() {
		add_action( 'after_switch_theme', array( $this, 'activate' ) );
	}

	public function activate(): void {}
}
