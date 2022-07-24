<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

app()->integration()->yoast()->render_breadcrumbs( '<div class="my-theme-breadcrumbs">', '</div>' );
