<?php

namespace MyTheme;

use O0W7_1\Bootstrap;
use O0W7_1\Feature as FrameworkFeature;
use function MyPlugin\app;

defined( 'ABSPATH' ) || exit;

final class App implements \O0W7_1\App {
	use Bootstrap;

	public $arr;
	public $env;
	public $str;
	public $url;
	public $admin_notice;
	public $form;
	public $fs;
	public $hook;
	public $asset;
	public $i18n;
	public $info;
	public $template;

	public $acf_block_autoloader;

	public function __construct( string $namespace, string $root_file ) {
		$this->init( $namespace, $root_file, 'theme' );

		$this->arr          = FrameworkFeature\Arr::get_instance();
		$this->env          = FrameworkFeature\Env::get_instance();
		$this->str          = FrameworkFeature\Str::get_instance();
		$this->url          = FrameworkFeature\Url::get_instance();
		$this->admin_notice = app()->admin_notice;
		$this->form         = app()->form;
		$this->fs           = new FrameworkFeature\FS( $this );
		$this->hook         = app()->hook;
		$this->asset        = new FrameworkFeature\Asset( $this, $this->fs );
		$this->i18n         = new FrameworkFeature\I18n( $this, $this->fs );
		$this->info         = new FrameworkFeature\Info( $this, $this->fs );
		$this->template     = new FrameworkFeature\Template( $this, $this->fs );

		$this->acf_block_autoloader = new Feature\ACFBlockAutoloader( $this, $this->fs, $this->i18n );
	}
}
