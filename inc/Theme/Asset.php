<?php
namespace MainTheme\Theme;

use const MainTheme\KEY;

defined( 'ABSPATH' ) || exit;

class Asset extends \MainPlugin\Plugin\Asset {
	protected const KEY = KEY;

	protected static function get_url( string $rel ): string {
		return Fs::get_url( $rel );
	}

	protected static function get_path( string $rel ): string {
		return Fs::get_path( $rel );
	}
}
