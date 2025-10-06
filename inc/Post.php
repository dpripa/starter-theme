<?php
namespace StarterTheme;

use Exception;
use StarterTheme\OmgAcfHelper\AcfBlockAutoloader;
use StarterTheme\OmgCore\Feature;

defined( 'ABSPATH' ) || exit;

class Post extends Feature {
	protected string $post_type = 'post';
	protected AcfBlockAutoloader $acf_block_autoloader;

	/**
	 * @throws Exception
	 */
	public function __construct( AcfBlockAutoloader $acf_block_autoloader ) {
		parent::__construct();

		$this->acf_block_autoloader = $acf_block_autoloader;

		add_action( 'after_setup_theme', $this->register_blocks() );
	}

	protected function register_blocks(): callable {
		return function (): void {
			$this->acf_block_autoloader->register_block_type(
				$this->post_type,
				__( 'Starter Theme Blocks', 'starter-theme' ),
				static::class
			);
		};
	}
}
