<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Asset extends StaticClass {
	private const POSTFIX = '.min';

	public static function enqueue_script(string $name, array $deps = [], array $args = [], ?string $args_object_name = null, bool $in_footer = true): void {
		$key = KEY . "_$name";
		$filename = $name . self::POSTFIX . '.js';
		$rel = "asset/script/$filename";
		$url = get_url($rel);
		$path = get_path($rel);

		if (!file_exists($path)) {
			throw new \Exception("The script asset file \"$name\" does not exist");
		}

		wp_enqueue_script($key, $url, $deps, filemtime($path), $in_footer);

		if ($args) {
			$args_object_name = $args_object_name ?: Data_Type\Str::to_camelcase($key);

			wp_localize_script($key, $args_object_name, $args);
		}
	}

	public static function enqueue_inline_script(string $parent_slug, string $js_code, string $position = 'after'): void {
		wp_add_inline_script(KEY . "_$parent_slug", $js_code, $position);
	}

	public static function enqueue_style(string $name, array $deps = [], /* string|array */ $addition = null): void {
		$key = KEY . "_$name";
		$filename = $name . self::POSTFIX . '.css';
		$rel = "asset/style/$filename";
		$url = get_url($rel);
		$path = get_path($rel);

		if (!file_exists($path)) {
			throw new \Exception("The style asset file \"$name\" does not exist");
		}

		wp_enqueue_style($key, $url, $deps, filemtime($path));

		if (empty($addition)) {
			return;
		}

		if (is_string($addition)) {
			wp_add_inline_style($key, $addition);

		} elseif (is_array($addition)) {
			$css_vars = ':root{';

			foreach ($addition as $var_slug => $var_val) {
				$css_vars .= '--' . str_replace('_', '-', KEY . "_$var_slug") . ':' . $var_val . ';';
			}

			wp_add_inline_style($key, "$css_vars}");
		}
	}

	public static function enqueue_external_script(string $slug, string $url, bool $in_footer = true): void {
		wp_enqueue_script(KEY . "_$slug", $url, false, null, $in_footer); // phpcs:ignore
	}

	public static function enqueue_external_style(string $slug, string $url): void {
		wp_enqueue_style(KEY . "_$slug", $url, false, null); // phpcs:ignore
	}

	public static function get_global_args_key(string $js_object_name): string {
		return KEY . "_args_object_$js_object_name";
	}

	public static function enqueue_global_args(string $js_object_name, array $args): void {
		$key = self::get_global_args_key($js_object_name);

		wp_register_script($key, null, [], null); // phpcs:ignore
		wp_localize_script($key, $js_object_name, $args);
	}
}
