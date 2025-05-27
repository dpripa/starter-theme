<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;

class Plugin {
	public function __construct() {
		new Plugin\ACF();
	}
}
