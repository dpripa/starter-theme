<?php
namespace MyTheme;

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
			__( 'My Theme layout', 'my-theme' ),
			static::class . '\Block'
		);
	}
}
