<?php

namespace MyTheme;

defined('ABSPATH') || exit;

$required_plugin_name = __('My Plugin');

if (!class_exists('MyPlugin\App')) {
	update_option('template', 'twentytwentyone');
	update_option('stylesheet', 'twentytwentyone');
	delete_option('current_theme');

	if (is_admin()) {
		add_action(
			'admin_notices',
			function () use ($required_plugin_name): void {
				?>
				<div class="notice notice-error is-dismissible" style="padding-top: 10px; padding-bottom: 10px;">
					<b><?php echo esc_html__('Error'); ?>:</b>
					<?php
					echo sprintf(
						esc_html__('the theme you are trying to activate needs <b>the "%s" plugin to be activated first</b>.'),
						esc_html($required_plugin_name)
					);
					?>
				</div>
				<?php
			}
		);

		return;
	}

	header('Location: ' . get_home_url('/'), true, 303);
}

$autoload = __DIR__ . '/vendor/autoload.php';

if (!file_exists($autoload)) {
	throw new \Exception('Autoloader not exists');
}

require_once $autoload;

function app(): App {
	return App::get_instance(__NAMESPACE__, __FILE__);
}

new Setup();
