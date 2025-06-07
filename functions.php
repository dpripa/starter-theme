<?php
namespace StarterTheme;

use Exception;

defined( 'ABSPATH' ) || exit;

const KEY       = 'starter_theme';
const ROOT_FILE = __FILE__;

$autoload = __DIR__ . '/lib/vendor/scoper-autoload.php';

if ( ! file_exists( $autoload ) ) {
	throw new Exception( 'Autoloader not exists' );
}

require_once $autoload;

function app(): App {
	return App::get_instance();
}

app();
