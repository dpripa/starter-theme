<?php
namespace MyTheme\Theme;

defined( 'ABSPATH' ) || exit;

class Tpl {
	protected const DIR = 'template-part';

	public static function get( string $name, array $args = array() ): string {
		ob_start();
		static::render( $name, $args );

		return ob_get_clean();
	}

	public static function render( string $name, array $args = array() ): void {
		get_template_part( static::DIR . "/$name", null, $args );
	}
}
