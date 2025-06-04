<?php
namespace StarterTheme;

use StarterTheme\OmgAcfBlockAutoloader\AcfBlockAutoloader;
use StarterTheme\OmgCore\App as AbstractApp;

defined( 'ABSPATH' ) || exit;

class App extends AbstractApp {
	protected AcfBlockAutoloader $acf_block_autoloader;
	protected Post $post;
	protected Singular $singular;

	protected function __construct() {
		parent::__construct( ROOT_FILE, 'starter_theme' );

		$this->acf_block_autoloader = new AcfBlockAutoloader( $this->key, $this->fs );

		add_action( 'after_setup_theme', $this->init() );
		add_action( 'after_switch_theme', $this->activate() );
		add_action( 'switch_theme', $this->deactivate() );
	}

	public function singular(): Singular {
		return $this->singular;
	}

	protected function init(): callable {
		return function (): void {
			load_theme_textdomain( 'starter-theme', $this->fs->get_path( 'lang' ) );

			if ( $this->requirement->validate() ) {
				return;
			}

			$this->post     = new Post( $this->acf_block_autoloader );
			$this->singular = new Singular( $this->asset );

			add_action( 'wp_enqueue_scripts', $this->enqueue_assets() );
		};
	}

	protected function load_textdomain(): callable {
		return function (): void {
			load_plugin_textdomain(
				'starter-plugin',
				false,
				$this->fs->get_path( 'lang' )
			);
		};
	}

	protected function enqueue_assets(): callable {
		return function (): void {
			$this->asset
				->enqueue_style( 'main' )
				->enqueue_script( 'main' );
		};
	}

	protected function activate(): callable {
		return function (): void {};
	}

	protected function deactivate(): callable {
		return function (): void {
			$this->admin_notice->reset();
		};
	}
}
