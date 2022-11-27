<?php

namespace MyTheme\Ajax;

defined('ABSPATH') || exit;

abstract class Base extends \MyTheme\Form\Base {
	protected const TYPE = 'wp_ajax';
	protected const URL = 'admin-ajax';
}
