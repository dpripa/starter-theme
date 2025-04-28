<?php
namespace MyTheme\Plugin;

use WP_Error;
use MyTheme\Admin\Notice;
use const MyTheme\KEY;

defined( 'ABSPATH' ) || exit;

abstract class RequiredPlugin {
	protected string $file;
	protected string $name;

	public function __construct() {
		add_action( 'init', array( $this, 'lock_deactivation' ) );
	}

	public function lock_deactivation(): void {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		if ( ! is_plugin_active( $this->file ) ) {
			if ( activate_plugin( $this->file ) instanceof WP_Error ) {
				if ( is_admin() ) {
					Notice::render(
						sprintf(
							__( '%s not found. Install and activate it now!', 'my-theme' ),
							$this->name
						),
						'error'
					);
				} else {
					wp_die(
						esc_html__( 'Here is the critical error. Please, check the details in the admin panel.', 'my-theme' ),
						esc_html__( 'Error', 'my-theme' )
					);
				}
			} else { // phpcs:ignore
				if ( is_admin() ) {
					Notice::render(
						sprintf(
							__( 'It\'s not allowed to deactivate %s!', 'my-theme' ),
							$this->name
						),
						'error'
					);
				}
			}
		}
	}
}
