<?php

namespace MyTheme\Form;

defined('ABSPATH') || exit;

abstract class Ajax extends Post {
	protected const TYPE = 'wp_ajax';
	protected const URL = 'admin-ajax';
}
