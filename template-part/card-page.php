<?php

namespace MyTheme;

defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class(); ?> id="page-<?php the_ID(); ?>">
	<?php if ( has_post_thumbnail() ) { ?>
		<a class="my-theme-img" href="<?php echo esc_url( get_permalink() ); ?>">
			<img
				data-src="<?php the_post_thumbnail_url( 'ego_card' ); ?>"
				data-retina="<?php the_post_thumbnail_url( 'ego_card_retina' ); ?>"
				alt="<?php echo esc_attr( __( 'Thumbnail for', KEY ) . ': "' . get_the_title() . '"' ); ?>"
			>
		</a>
		<?php
	}

	the_title(
		'<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
		'</a></h3>'
	);
	?>
	<div>
		<?php the_excerpt(); ?>
	</div>
	<a
		href="<?php echo esc_url( get_permalink() ); ?>"
		aria-label="<?php echo esc_attr( __( 'Read more', KEY ) . ': "' . get_the_title() . '"' ); ?>"
	>
		<?php echo esc_html__( 'Read more', KEY ) . ' →'; ?>
	</a>
</article>
