<?php

namespace MyTheme;

defined('ABSPATH') || exit;

final class ACF {
	public function __construct() {
		new ACF\Block();
	}
}
