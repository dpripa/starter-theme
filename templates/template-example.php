<?php
/**
 * Template Name:      Example
 * Template Post Type: post, page
 */

namespace StarterTheme;

__( 'Sample', 'starter-theme' );

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="mnt-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		app()->view()->render( 'breadcrumbs' );

		while ( have_posts() ) {
			the_post();
			app()->view()->render( 'content-page' );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</main>
<?php
get_footer();
