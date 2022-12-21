<?php

namespace MyTheme\Admin;

use const MyTheme\KEY;

defined('ABSPATH') || exit;

final class Notice {
	private const KEY = KEY . '_admin_transient_notices';

	public function __construct() {
		add_action('admin_init', [$this, 'render_transients']);
	}

	public function render_transients(): void {
		$notices = self::get_transients();

		if (empty($notices)) {
			return;
		}

		foreach ($notices as $level => $messages) {
			foreach ($messages as $message) {
				self::render($message, $level);
			}
		}

		self::update_transients([]);
	}

	private static function get_transients(): array {
		return get_option(self::KEY, []);
	}

	private static function update_transients(array $notices): void {
		update_option(self::KEY, $notices);
	}

	public static function add_transient(string $message, string $level = 'warning'): void {
		$notices = self::get_transients();
		$notices[$level][] = $message;

		self::update_transients($notices);
	}

	public static function render(string $message, string $level = 'warning'): void {
		add_action(
			'admin_notices',
			function () use ($message, $level): void {
				?>
				<div class="notice notice-<?php echo esc_attr($level); ?> is-dismissible" style="padding-top: 10px; padding-bottom: 10px;">
					<?php echo wp_kses_post($message); ?>
				</div>
				<?php
			}
		);
	}
}
