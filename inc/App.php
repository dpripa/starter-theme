<?php
namespace StarterTheme;

use StarterTheme\OmgCore\OmgApp;
use StarterTheme\OmgAcfBlockAutoloader\AcfBlockAutoloader;

defined( 'ABSPATH' ) || exit;

class App extends OmgApp {
	protected AcfBlockAutoloader $acf_block_autoloader;
	protected Post $post;
	protected Singular $singular;

	protected function __construct() {
		parent::__construct( ROOT_FILE, KEY );

		add_action( 'init', $this->load_textdomain() );
		add_action( 'after_setup_theme', $this->add_theme_support() );
		add_action( 'wp_enqueue_scripts', $this->enqueue_assets() );
		add_action( 'after_switch_theme', $this->activate() );
		add_action( 'switch_theme', $this->deactivate() );
	}

	public function singular(): Singular {
		return $this->singular;
	}

	protected function init(): void {
		$this->acf_block_autoloader = new AcfBlockAutoloader( KEY, $this->fs );
		$this->post                 = new Post( $this->acf_block_autoloader );
		$this->singular             = new Singular( $this->asset );
	}

	protected function load_textdomain(): callable {
		return function (): void {
			load_theme_textdomain( 'starter-theme', $this->fs->get_path( 'lang' ) );
		};
	}

	protected function add_theme_support(): callable {
		return function (): void {
			add_theme_support( 'title-tag' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support(
				'html5',
				array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' )
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
