<?php

namespace MyTheme\Data_Type;

use MyTheme\StaticClass;

defined('ABSPATH') || exit;

final class Arr extends StaticClass {
	public static function map_associative(callable $callback, array $array): array {
		$result = [];

		foreach ($array as $key => $val) {
			$result[$key] = $callback($key, $val);
		}

		return $result;
	}

	public static function insert_to_position(array $value, int $position, array $array): array {
		if (empty($array)) {
			return $value;
		}

		return array_merge(
			array_slice($array, 0, $position),
			$value,
			array_slice($array, $position)
		);
	}
}
