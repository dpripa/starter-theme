<?php

namespace MyTheme\Form;

use MyTheme\Simpleton;
use MyTheme\Url;
use const MyTheme\KEY;

defined('ABSPATH') || exit;

abstract class Post {
	use Simpleton;

	protected const TYPE = 'admin_post';
	protected const URL = 'admin-post';

	public const KEY = KEY . '_';

	public function __construct() {
		add_action(static::TYPE . '_' . static::KEY, [$this, 'callback']);
		add_action(static::TYPE . '_nopriv_' . static::KEY, [$this, 'callback']);
	}

	abstract public function callback(): void;

	public function get_url(string $action = ''): string {
		$url = Url::get_admin(static::URL);

		if ($action) {
			if (!has_action(static::TYPE . '_' . static::KEY)) {
				throw new \Exception("The \"$action\" action isn't defined");
			}

			return add_query_arg($url, ['action' => static::KEY]);
		}

		return $url;
	}
}
