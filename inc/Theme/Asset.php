<?php
namespace MyTheme\Theme;

use const MyTheme\KEY;

defined( 'ABSPATH' ) || exit;

class Asset extends \MyPlugin\Plugin\Asset {
	protected const KEY = KEY;

	protected static function get_url( string $rel ): string {
		return Fs::get_url( $rel );
	}

	protected static function get_path( string $rel ): string {
		return Fs::get_path( $rel );
	}
}
