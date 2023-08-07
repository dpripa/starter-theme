<?php

namespace MyTheme;

use MyPlugin\Core;

defined('ABSPATH') || exit;

final class App implements Core\App {
	use Core\Bootstrap;

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
	public $setting;

	private function __construct(string $namespace, string $root_file) {
		$this->init($namespace, $root_file, true);

		$this->arr = \MyPlugin\app()->arr;
		$this->env = \MyPlugin\app()->env;
		$this->str = \MyPlugin\app()->str;
		$this->url = \MyPlugin\app()->url;
		$this->admin_notice = \MyPlugin\app()->admin_notice;
		$this->form = \MyPlugin\app()->form;
		$this->fs = new Core\Extension\FS($this);
		$this->hook = \MyPlugin\app()->hook;
		$this->asset = new Core\Extension\Asset($this, $this->fs);
		$this->i18n = new Core\Extension\I18n($this, $this->fs);
		$this->info = new Core\Extension\Info($this);
		$this->acf_block_autoloader = new Extension\ACFBlockAutoloader($this, $this->fs, $this->i18n);
		$this->template = new Core\Extension\Template($this, $this->fs);
		$this->setting = \MyPlugin\app()->setting;
	}
}
