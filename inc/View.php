<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

class View {
	protected const DIR = 'view';

	public static function get( string $name, array $args = array() ): string {
		ob_start();
		static::render( $name, $args );

		return ob_get_clean();
	}

	public static function render( string $name, array $args = array() ): void {
		get_template_part( static::DIR . "/$name", null, $args );
	}
}
