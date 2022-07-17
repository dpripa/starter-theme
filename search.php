<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="my-theme-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		app()->template()->render( 'breadcrumbs' );

		if ( have_posts() ) {
			?>
			<h1><?php echo esc_html( Singular::get_title() ); ?></h1>
			<?php
			while ( have_posts() ) {
				the_post();
				app()->template()->render( 'card-page' );
			}

			app()->template()->render( 'pagination' );

		} else {
			app()->template()->render( 'content-none' );
		}
		?>
	</div>
</main>
<?php
get_footer();
