<?php
namespace MyTheme\Plugin;

use WP_Error;
use MyTheme\Admin\Notice;
use const MyTheme\KEY;

defined( 'ABSPATH' ) || exit;

abstract class RequiredPlugin {
	protected $file;
	protected $name;

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
							__( '%s not found. Install and activate it now!', KEY ),
							$this->name
						),
						'error'
					);
				} else {
					wp_die(
						esc_html__( 'Here is the critical error. Please, check the details in the admin panel.', KEY ),
						esc_html__( 'Error', KEY )
					);
				}
			} else {
				if ( is_admin() ) {
					Notice::render(
						sprintf(
							__( 'It\'s not allowed to deactivate %s!', KEY ),
							$this->name
						),
						'error'
					);
				}
			}
		}
	}
}
