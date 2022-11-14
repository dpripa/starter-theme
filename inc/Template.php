<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Template {
	private const TEMPLATE_DIR = 'template-part';

	public static function get(string $name, array $args = []): string {
		ob_start();
		self::render($name, $args);

		return ob_get_clean();
	}

	public static function render(string $name, array $args = []): void {
		get_template_part(self::TEMPLATE_DIR . '/' . $name, null, $args);
	}
}
