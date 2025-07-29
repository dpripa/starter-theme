<?php
namespace StarterTheme;

use Exception;
use StarterTheme\OmgAcfBlockAutoloader\AcfBlockAutoloader;
use StarterTheme\OmgCore\OmgFeature;

defined( 'ABSPATH' ) || exit;

class Post extends OmgFeature {
	protected App $app;
	protected string $key = 'post';

	/**
	 * @throws Exception
	 */
	public function __construct( AcfBlockAutoloader $acf_block_autoloader ) {
		parent::__construct();

		$acf_block_autoloader->register_block_type(
			$this->key,
			__( 'Starter Theme Blocks', 'starter-theme' ),
			static::class
		);
	}
}
