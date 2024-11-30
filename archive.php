<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main class="mnt-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		Tpl::render( 'breadcrumbs' );

		if ( have_posts() ) {
			?>
			<h1><?php echo esc_html( Singular::get_title() ); ?></h1>
			<?php
			while ( have_posts() ) {
				the_post();
				Tpl::render( 'card-' . get_post_type() );
			}

			Tpl::render( 'pagination' );

		} else {
			Tpl::render( 'content-none' );
		}
		?>
	</div>
</main>
<?php
get_footer();
