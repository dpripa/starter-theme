<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

class Post {
	public const KEY = 'post';

	public function __construct() {
		Plugin\ACF::add_block_type(
			static::KEY,
			__( 'Kyhnia\'s layout', KEY ),
			static::class . '\Block'
		);
	}
}
