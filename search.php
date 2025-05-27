<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="mnt-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		View::render( 'breadcrumbs' );

		if ( have_posts() ) {
			?>
			<h1><?php echo esc_html( Singular::get_title() ); ?></h1>
			<?php
			while ( have_posts() ) {
				the_post();
				View::render( 'card-page' );
			}

			View::render( 'pagination' );

		} else {
			View::render( 'content-none' );
		}
		?>
	</div>
</main>
<?php
get_footer();
