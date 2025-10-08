<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;

if ( function_exists( 'YoastSEO' ) ) {
	yoast_breadcrumb( '<div class="mnt-breadcrumbs">', '</div>' );
}
