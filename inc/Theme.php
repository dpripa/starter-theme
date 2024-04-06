<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

class Theme {
	public function __construct() {
		new Theme\Env();
	}
}
