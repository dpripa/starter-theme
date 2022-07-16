<?php

namespace My_Theme;

global $wp_query;

if ( $wp_query->max_num_pages > 1 ) {
	the_posts_pagination(
		array(
			'prev_text' => '← ' . esc_html( app()->i18n()->__( 'Backward' ) ),
			'next_text' => esc_html( app()->i18n()->__( 'Forward' ) ) . ' →',
		)
	);
}
