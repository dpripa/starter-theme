<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

class Plugin {
	public function __construct() {
		new Plugin\ACF();
	}
}
