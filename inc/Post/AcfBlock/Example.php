<?php
namespace StarterTheme\Post\AcfBlock;

use StarterTheme\OmgAcfBlockAutoloader\AcfBlockField;

defined( 'ABSPATH' ) || exit;

class Example extends AcfBlockField {
	protected function register(): callable {
		return function (): void {};
	}
}
