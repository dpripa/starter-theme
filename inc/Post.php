<?php
namespace StarterTheme;

use StarterTheme\OmgAcfBlockAutoloader\AcfBlockAutoloader;

defined( 'ABSPATH' ) || exit;

class Post {
	protected App $app;
	protected string $key = 'post';

	public function __construct( AcfBlockAutoloader $acf_block_autoloader ) {
		$acf_block_autoloader->register_block_type(
			$this->key,
			__( 'Starter Theme Blocks', 'starter-theme' ),
			static::class . '\AcfBlock'
		);
	}
}
