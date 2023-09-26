<?php

namespace MyTheme;

defined( 'ABSPATH' ) || exit;

const KEY = 'my_theme';

$plugin_name = __( 'My Plugin', KEY );

if ( ! class_exists( 'MyPlugin\Setup' ) ) {
	add_action(
		'after_setup_theme',
		function () use ( $plugin_name ) {
			update_option( 'template', 'twentytwentyone' );
			update_option( 'stylesheet', 'twentytwentyone' );
			delete_option( 'current_theme' );

			if ( ! is_admin() ) {
				header( 'Location: ' . get_home_url( '/' ), true, 303 );
			}

			load_theme_textdomain( KEY, __DIR__ . '/lang' );

			add_action(
				'admin_notices',
				function () use ( $plugin_name ): void {
					?>
					<div class="notice notice-error is-dismissible" style="padding-top: 10px; padding-bottom: 10px;">
						<?php
						echo sprintf(
							esc_html__( '%1$s the %2$s theme %3$s the %4$s plugin to be %5$s first. %6$s', KEY ),
							'<b>' . esc_html__( 'Error', KEY ) . ':</b>',
							'<b>"' . esc_html( get_file_data( __DIR__ . '/style.css', array( 'name' => 'Theme Name' ) )['name'] ) . '"</b>',
							'<b>' . esc_html__( 'needs', KEY ) . '</b>',
							'<b>"' . esc_html( $plugin_name ) . '"</b>',
							'<b>' . esc_html__( 'activated', KEY ) . '</b>',
							'<b><a href="' . esc_html( get_admin_url( is_multisite() ? get_current_blog_id() : null, 'plugins.php' ) ) . '">' .
							esc_html__( 'Go to activation', KEY ) .
							'</a></b>'
						);
						?>
					</div>
					<?php
				}
			);
		}
	);

	return;
}

$autoload = __DIR__ . '/vendor/autoload.php';

if ( ! file_exists( $autoload ) ) {
	throw new \Exception( 'Autoloader not exists' );
}

require_once $autoload;

new Setup();
