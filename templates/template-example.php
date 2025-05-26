<?php
/**
 * Template Name:      Example
 * Template Post Type: post, page
 */

namespace MyTheme;

__( 'Sample', 'my-theme' );

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="mnt-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		View::render( 'breadcrumbs' );

		while ( have_posts() ) {
			the_post();
			View::render( 'content-page' );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</main>
<?php
get_footer();
