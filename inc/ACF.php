<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class ACF extends StaticClass {
	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}

		new ACF\Block();
	}
}
