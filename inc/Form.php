<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Form extends StaticClass {
	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}
	}
}
