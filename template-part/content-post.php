<?php

namespace MainTheme;

defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h1><?php echo esc_html( Singular::get_title() ); ?></h1>
	<?php
	the_content();

	wp_link_pages(
		array(
			'before' => '<div class="pagination">' . esc_html__( 'Pages', KEY ) . ':',
			'after'  => '</div>',
		)
	);
	?>
</article>
