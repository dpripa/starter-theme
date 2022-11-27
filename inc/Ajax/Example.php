<?php

namespace MyTheme\Ajax;

use const MyTheme\KEY;

final class Example extends Base {
	public const KEY = KEY . '_ajax_example';

	public function __construct() {
		if ($this->is_initialized()) {
			return;
		}

		parent::__construct();
	}

	public function callback(): void {
		die();
	}
}
