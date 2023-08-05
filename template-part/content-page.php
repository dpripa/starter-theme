<?php

namespace MyTheme;

defined('ABSPATH') || exit;
?>
<article <?php post_class(); ?> id="page-<?php the_ID(); ?>">
	<h1><?php echo esc_html(Singular::get_title()); ?></h1>
	<?php
	the_content();

	wp_link_pages(
		[
			'before' => '<div class="pagination">' . esc_html(app()->i18n->__('Pages')) . ':',
			'after'  => '</div>',
		]
	);
	?>
</article>
