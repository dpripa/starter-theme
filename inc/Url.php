<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Url {
	public static function get_current(): string {
		$path = add_query_arg(null, null);

		return is_admin() ? home_url($path) : self::get_home($path);
	}

	public static function get_home(string $path = '/'): string {
		return apply_filters(KEY . '_home_url', home_url($path));
	}

	public static function get_admin(string $slug = '', ?int $blog_id = null): string {
		return get_admin_url($blog_id, $slug ? "$slug.php" : '');
	}

	public static function redirect(string $url, int $response_code = 303): void {
		header("Location: $url", true, $response_code);

		exit;
	}
}
