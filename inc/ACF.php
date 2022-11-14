<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class ACF {
	use Simpleton;

	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}

		new ACF\Block();
	}
}
