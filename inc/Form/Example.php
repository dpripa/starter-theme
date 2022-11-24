<?php

namespace MyTheme\Form;

use const MyTheme\KEY;

class Example extends Ajax {
	public const KEY = KEY . '_example';

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
