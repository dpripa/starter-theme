<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Template extends StaticClass {
	public static function get(string $name, array $args = []): string {
		ob_start();
		self::render($name, $args);

		return ob_get_clean();
	}

	public static function render(string $name, array $args = []): void {
		get_template_part("template-part/$name", null, $args);
	}
}
