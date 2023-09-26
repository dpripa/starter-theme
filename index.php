<?php

namespace MainTheme;

defined( 'ABSPATH' ) || exit;

get_header();

$page_title = Singular::get_title();
?>
<main class="my-theme-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		if ( have_posts() ) {
			if ( $page_title ) {
				?>
				<h1><?php echo esc_html( $page_title ); ?></h1>
				<?php
			}

			while ( have_posts() ) {
				the_post();
				Theme\Tpl::render( 'card-' . get_post_type() );
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
