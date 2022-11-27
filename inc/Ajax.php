<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Ajax {
	use Simpleton;

	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}

		new Ajax\Example();
	}
}
