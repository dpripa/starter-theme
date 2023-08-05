<?php

namespace MyTheme;

global $wp_query;

if ($wp_query->max_num_pages > 1) {
	the_posts_pagination(
		[
			'prev_text' => '← ' . esc_html(app()->i18n->__('Previous')),
			'next_text' =>esc_html(app()->i18n->__('Forward')) . ' →',
		]
	);
}
