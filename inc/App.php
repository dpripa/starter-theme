<?php

namespace MyTheme;

use O0W7_1\Bootstrap;
use O0W7_1\Extension;
use MyTheme\Extension as CustomExtension;
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
	public $acf_block_autoloader;
	public $template;

	public function __construct( string $namespace, string $root_file ) {
		$this->init( $namespace, $root_file, 'theme' );

		$this->arr                  = Extension\Arr::get_instance();
		$this->env                  = Extension\Env::get_instance();
		$this->str                  = Extension\Str::get_instance();
		$this->url                  = Extension\Url::get_instance();
		$this->admin_notice         = app()->admin_notice;
		$this->form                 = app()->form;
		$this->fs                   = new Extension\FS( $this );
		$this->hook                 = app()->hook;
		$this->asset                = new Extension\Asset( $this, $this->fs );
		$this->i18n                 = new Extension\I18n( $this, $this->fs );
		$this->info                 = new Extension\Info( $this, $this->fs );
		$this->acf_block_autoloader = new CustomExtension\ACFBlockAutoloader( $this, $this->fs, $this->i18n );
		$this->template             = new Extension\Template( $this, $this->fs );
	}
}
