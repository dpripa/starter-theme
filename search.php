<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="mnt-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		app()->view()->render( 'breadcrumbs' );

		if ( have_posts() ) {
			?>
			<h1><?php echo esc_html( app()->singular()->get_title() ); ?></h1>
			<?php
			while ( have_posts() ) {
				the_post();
				app()->view()->render( 'card-page' );
			}

			app()->view()->render( 'pagination' );

		} else {
			app()->view()->render( 'content-none' );
		}
		?>
	</div>
</main>
<?php
get_footer();
