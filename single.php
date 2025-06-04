<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="mnt-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		app()->view()->render( 'breadcrumbs' );

		while ( have_posts() ) {
			the_post();
			app()->view()->render( 'content-' . get_post_type() );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</main>
<?php
get_footer();
