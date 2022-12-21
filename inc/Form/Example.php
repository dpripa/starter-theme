<?php

namespace MyTheme\Form;

use const MyTheme\KEY;

final class Example extends AjaxAction {
	public const KEY = KEY . '_example';

	public function callback(): void {
		die();
	}
}
