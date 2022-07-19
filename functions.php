<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/vendor/wpappy/wpappy/index.php';
require_once __DIR__ . '/vendor/autoload.php';

use Wpappy_1_0_6\App as App;

function app(): App {
	return App::get( __NAMESPACE__, __FILE__ );
}

new Setup();
