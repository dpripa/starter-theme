<?php

namespace MyTheme;

defined('ABSPATH') || exit;

get_header();
?>
<main class="my-theme-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		Template::render('breadcrumbs');

		while (have_posts()) {
			the_post();
			Template::render('content-' . get_post_type());

			if (comments_open() || get_comments_number()) {
				comments_template();
			}
		}
		?>
	</div>
</main>
<?php
get_footer();
