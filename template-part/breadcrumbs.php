<?php

namespace MainTheme;

defined( 'ABSPATH' ) || exit;

if ( function_exists( 'YoastSEO' ) ) {
	yoast_breadcrumb( '<div class="mt-breadcrumbs">', '</div>' );
}
