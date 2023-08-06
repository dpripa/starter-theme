<?php

namespace MyTheme;

use MyPlugin\Core;

defined('ABSPATH') || exit;

final class App implements Core\App {
	use Core\Bootstrap;

	public $arr;
	public $str;
	public $url;
	public $admin_notice;
	public $fs;
	public $asset;
	public $i18n;
	public $acf_block_autoloader;
	public $template;

	private function __construct(string $namespace, string $root_file) {
		$this->init($namespace, $root_file, true);

		$this->arr = Core\Extension\Arr::get_instance();
		$this->str = Core\Extension\Str::get_instance();
		$this->url = Core\Extension\Url::get_instance();
		$this->admin_notice = new Core\Extension\AdminNotice($this);
		$this->fs = new Core\Extension\FS($this);
		$this->asset = new Core\Extension\Asset($this, $this->fs);
		$this->i18n = new Core\Extension\I18n($this, $this->fs);
		$this->acf_block_autoloader = new Extension\ACFBlockAutoloader($this, $this->fs, $this->i18n);
		$this->template = new Core\Extension\Template($this, $this->fs);
	}
}
