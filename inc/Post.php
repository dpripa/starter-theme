<?php
namespace StarterTheme;

use Exception;

defined( 'ABSPATH' ) || exit;

class Post {
	public const KEY = 'post';

	/**
	 * @throws Exception
	 */
	public function __construct() {
		Plugin\ACF::add_block_type(
			static::KEY,
			__( 'Starter Theme Layout', 'starter-theme' ),
			static::class . '\Block'
		);
	}
}
