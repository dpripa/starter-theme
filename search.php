<?php

namespace MainTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="my-theme-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		Theme\Tpl::render( 'breadcrumbs' );

		if ( have_posts() ) {
			?>
			<h1><?php echo esc_html( Singular::get_title() ); ?></h1>
			<?php
			while ( have_posts() ) {
				the_post();
				Theme\Tpl::render( 'card-page' );
			}

			Theme\Tpl::render( 'pagination' );

		} else {
			Theme\Tpl::render( 'content-none' );
		}
		?>
	</div>
</main>
<?php
get_footer();
