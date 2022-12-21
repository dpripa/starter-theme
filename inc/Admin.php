<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class Admin {
	public function __construct() {
		new Admin\Notice();
	}
}
