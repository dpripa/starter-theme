<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

class ACF {
	public function __construct() {
		Theme\ACFBlockAutoloader::add_block_type(
			'main',
			'acf-block',
			__( 'Main', KEY )
		);

		if ( ! \MyPlugin\Plugin\Env::is_dev() ) {
			add_filter( 'acf/settings/show_admin', '__return_false' );
		}
	}
}
