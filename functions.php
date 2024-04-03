<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

const KEY = 'my_theme';

$parent_plugin_name = __( 'My Plugin', KEY );
$parent_plugin_path = 'wp-starter-plugin/index.php';
$fallback_theme     = 'twentytwentyone';

function check_parent_plugin_activation( string $parent_plugin_name, string $parent_plugin_path, $fallback_theme ): bool {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';

	if (
		is_plugin_active( $parent_plugin_path ) ||
		! activate_plugins( array( $parent_plugin_path ) ) instanceof \WP_Error
	) {
		return true;
	}

	add_action(
		'after_setup_theme',
		function () use ( $parent_plugin_name, $fallback_theme ) {
			update_option( 'template', $fallback_theme );
			update_option( 'stylesheet', $fallback_theme );
			delete_option( 'current_theme' );

			if ( ! is_admin() ) {
				header( 'Location: ' . get_home_url( '/' ), true, 303 );

				return;
			}

			load_theme_textdomain( KEY, __DIR__ . '/lang' );

			add_action(
				'admin_notices',
				function () use ( $parent_plugin_name ): void {
					?>
					<div class="notice notice-error is-dismissible" style="padding-top: 10px; padding-bottom: 10px;">
						<?php
						echo sprintf(
							esc_html__( '%1$s the %2$s theme %3$s the %4$s plugin to be %5$s first. %6$s', KEY ),
							'<b>' . esc_html__( 'Error', KEY ) . ':</b>',
							'<b>"' . esc_html( get_file_data( __DIR__ . '/style.css', array( 'name' => 'Theme Name' ) )['name'] ) . '"</b>',
							'<b>' . esc_html__( 'needs', KEY ) . '</b>',
							'<b>"' . esc_html( $parent_plugin_name ) . '"</b>',
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

	return false;
}

if ( ! check_parent_plugin_activation( $parent_plugin_name, $parent_plugin_path, $fallback_theme ) ) {
	return;
}

$autoload = __DIR__ . '/vendor/autoload.php';

if ( ! file_exists( $autoload ) ) {
	throw new \Exception( 'Autoloader not exists' );
}

require_once $autoload;

new Setup();
