<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Form {
	use Simpleton;

	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}
	}
}
