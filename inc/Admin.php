<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Admin extends StaticClass {
	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}

		new Admin\Notice();
	}
}
