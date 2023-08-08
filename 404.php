<?php

namespace MyTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="my-theme-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php app()->template->render( 'breadcrumbs' ); ?>
		<h1><?php echo esc_html( Singular::get_title() ); ?></h1>
		<p><?php echo esc_html( app()->i18n->__( 'It looks like nothing was found at this location.' ) ); ?></p>
	</div>
</main>
<?php
get_footer();
