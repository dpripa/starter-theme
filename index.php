<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;

get_header();

$page_title = app()->singular()->get_title();
?>
<main class="mnt-layout" role="main" itemscope itemprop="mainContentOfPage">
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
				app()->view()->render( 'card-' . get_post_type() );
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
