<?php
namespace StarterTheme;

use Exception;

defined( 'ABSPATH' ) || exit;

const KEY = 'starter_theme';

$autoload = __DIR__ . '/vendor/autoload.php';

if ( ! file_exists( $autoload ) ) {
	throw new Exception( 'Autoloader not exists' );
}

require_once $autoload;

new Setup();
