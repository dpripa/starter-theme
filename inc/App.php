<?php
namespace StarterTheme;

use StarterTheme\OmgCore\Dependency;
use StarterTheme\OmgCore\OmgApp;
use StarterTheme\OmgAcfHelper\AcfHelper;
use StarterTheme\OmgAcfHelper\AcfBlockAutoloader;

defined( 'ABSPATH' ) || exit;

class App extends OmgApp {
	protected AcfHelper $acf_helper;
	protected AcfBlockAutoloader $acf_block_autoloader;
	protected Post $post;
	protected Singular $singular;

	protected function __construct() {
		parent::__construct( ROOT_FILE, KEY, false );

		$this->acf_helper           = new AcfHelper( $this );
		$this->acf_block_autoloader = new AcfBlockAutoloader( $this );
		$this->post                 = new Post( $this->acf_block_autoloader );
		$this->singular             = new Singular( $this->asset );
	}

	public function singular(): Singular {
		return $this->singular;
	}

	protected function init(): callable {
		return function (): void {
			parent::init()();
			$this->dependency->maybe_render_notice();
			add_theme_support( 'title-tag' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support(
				'html5',
				array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' )
			);
			add_action( 'wp_enqueue_scripts', $this->enqueue_assets() );
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

	protected function get_core_i18n(): callable {
		return function (): array {
			return array(
				Dependency::class => array(
					'notice_title_required_singular'      => __( 'The <b>%1$s</b> plugin%2$s is <b>required</b> for the <b>%3$s</b> features to function.', 'starter-theme' ),
					'notice_title_optional_singular'      => __( 'The <b>%1$s</b> plugin%2$s is <b>recommended</b> for the all <b>%3$s</b> features to function.', 'starter-theme' ),
					'notice_title_required_plural'        => __( 'The following plugins are <b>required</b> for the <b>%s"/b> features to function:', 'starter-theme' ),
					'notice_title_optional_plural'        => __( 'The following plugins are <b>recommended</b> for the all <b>%s</b> features to function:', 'starter-theme' ),
					'notice_item_not_installed'           => __( 'not installed', 'starter-theme' ),
					'notice_item_undefiled_installation_url' => __( 'not installed, can\'t be installed automatically', 'starter-theme' ),
					'notice_btn_activate'                 => __( 'Activate', 'starter-theme' ),
					'notice_btn_install_and_activate'     => __( 'Install and activate', 'starter-theme' ),
					'notice_btn_activate_only_required'   => __( 'Activate only required', 'starter-theme' ),
					'notice_btn_install_and_activate_only_required' => __( 'Install and activate only required', 'starter-theme' ),
					'notice_success_activate'             => __( 'Required plugin(s) activated.', 'starter-theme' ),
					'notice_success_install_and_activate' => __( 'Required plugin(s) installed and activated.', 'starter-theme' ),
					'notice_error_install'                => __( 'The "%1$s" plugin can\'t be installed automatically. Please install it manually.', 'starter-theme' ),
				),
			);
		};
	}
}
