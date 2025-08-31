<?php
namespace StarterTheme\Post\AcfBlock;

use StarterTheme\OmgAcfHelper\AcfBlockField;

defined( 'ABSPATH' ) || exit;

class Example extends AcfBlockField {
	protected function register(): callable {
		return function (): void {};
	}
}
