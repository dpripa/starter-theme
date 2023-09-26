<?php

namespace MainTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="mt-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		Theme\Tpl::render( 'breadcrumbs' );

		while ( have_posts() ) {
			the_post();
			Theme\Tpl::render( 'content-page' );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</main>
<?php
get_footer();
