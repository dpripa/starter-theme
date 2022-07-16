<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="my-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		app()->template()->render( 'breadcrumbs' );

		while ( have_posts() ) {
			the_post();
			app()->template()->render( 'content-' . get_post_type() );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</main>
<?php
get_footer();
