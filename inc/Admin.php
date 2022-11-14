<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Admin {
	use Simpleton;

	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}

		new Admin\Notice();
	}
}
