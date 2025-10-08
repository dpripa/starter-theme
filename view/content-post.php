<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h1><?php echo esc_html( app()->singular()->get_title() ); ?></h1>
	<?php
	the_content();

	wp_link_pages(
		array(
			'before' => '<div class="pagination">' . esc_html__( 'Pages', 'starter-theme' ) . ':',
			'after'  => '</div>',
		)
	);
	?>
</article>
