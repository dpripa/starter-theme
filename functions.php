<?php
namespace MyTheme;

defined('ABSPATH') || exit;

const KEY = 'my_theme';

function get_url(string $rel = '', bool $stamp = false): string {
	$url = get_theme_file_uri($rel);

	if ($stamp) {
		$path = get_path($rel);

		if (!file_exists($path)) {
			return $url;
		}

		return add_query_arg(['ver' => filemtime($path)], $url);
	}

	return $url;
}

function get_path(string $rel = ''): string {
	return get_theme_file_path($rel);
}

$autoload = get_path('vendor/autoload.php');

if (!file_exists($autoload)) {
	throw new \Exception('Autoloader not exists');
}

require_once $autoload;

new Setup();
