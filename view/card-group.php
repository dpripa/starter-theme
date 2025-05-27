<?php

namespace StarterTheme;

global $wp_query;

if ( $wp_query->max_num_pages > 1 ) {
	the_posts_pagination(
		array(
			'prev_text' => '← ' . esc_html__( 'Previous', 'starter-theme' ),
			'next_text' => esc_html__( 'Forward', 'starter-theme' ) . ' →',
		)
	);
}
