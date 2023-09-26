<?php
namespace MainTheme\Theme;

defined( 'ABSPATH' ) || exit;

class Hook extends \MainPlugin\Plugin\Hook {
	protected const NAMESPACE = __NAMESPACE__;

	public static function add_activation( callable $callback ): void {
		add_action( 'after_switch_theme', $callback, 10, 2 );
	}

	public static function add_deactivation( callable $callback ): void {
		add_action( 'switch_theme', $callback, 10, 3 );
	}
}
