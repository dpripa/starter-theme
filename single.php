<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="mnt-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		Theme\Tpl::render( 'breadcrumbs' );

		while ( have_posts() ) {
			the_post();
			Theme\Tpl::render( 'content-' . get_post_type() );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		}
		?>
	</div>
</main>
<?php
get_footer();
