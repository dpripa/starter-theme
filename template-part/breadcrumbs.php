<?php

namespace MyTheme;

defined('ABSPATH') || exit;

if (function_exists('YoastSEO')) {
	yoast_breadcrumb('<div class="my-theme-breadcrumbs">', '</div>');
}
