<?php

namespace MyTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="my-theme-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php Theme\Tpl::render( 'breadcrumbs' ); ?>
		<h1><?php echo esc_html( Singular::get_title() ); ?></h1>
		<p><?php echo esc_html__( 'It looks like nothing was found at this location.', KEY ); ?></p>
	</div>
</main>
<?php
get_footer();
