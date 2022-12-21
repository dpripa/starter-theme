<?php

namespace MyTheme\Form;

defined('ABSPATH') || exit;

abstract class AjaxAction extends Action {
	protected const TYPE = 'wp_ajax';
	protected const URL = 'admin-ajax';
}
