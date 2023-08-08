<?php

namespace MyTheme;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'MyPlugin\App' ) ) {
	add_action(
		'after_setup_theme',
		function () {
			update_option( 'template', 'twentytwentyone' );
			update_option( 'stylesheet', 'twentytwentyone' );
			delete_option( 'current_theme' );

			if ( ! is_admin() ) {
				header( 'Location: ' . get_home_url( '/' ), true, 303 );
			}

			$textdomain = strtolower( __NAMESPACE__ );
			load_theme_textdomain( $textdomain, __DIR__ . '/lang' );

			add_action(
				'admin_notices',
				function () use ( $textdomain ): void {
					$plugin_name = 'My Plugin';
					?>
					<div class="notice notice-error is-dismissible" style="padding-top: 10px; padding-bottom: 10px;">
						<?php
						echo sprintf(
							esc_html__( '%1$s the %2$s theme %3$s the %4$s plugin to be %5$s first. %6$s', $textdomain ),
							'<b>' . esc_html__( 'Error', $textdomain ) . ':</b>',
							'<b>' . esc_html( get_file_data( __DIR__ . '/style.css', array( 'name' => 'Theme Name' ) )['name'] ) . '</b>',
							'<b>' . esc_html__( 'needs', $textdomain ) . '</b>',
							'<b>' . esc_html( $plugin_name ) . '</b>',
							'<b>' . esc_html__( 'activated', $textdomain ) . '</b>',
							'<b><a href="' . esc_html( get_admin_url( is_multisite() ? get_current_blog_id() : null, 'plugins.php' ) ) . '">' .
								esc_html__( 'Go to activation', $textdomain ) .
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

function app(): App {
	return App::get_instance( __NAMESPACE__, __FILE__ );
}

new Setup();
