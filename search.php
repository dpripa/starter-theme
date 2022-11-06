<?php

namespace MyTheme;

defined('ABSPATH') || exit;

get_header();
?>
<main class="my-theme-layout" role="main" itemscope itemprop="mainContentOfPage">
	<div class="container">
		<?php
		Template::render('breadcrumbs');

		if (have_posts()) {
			?>
			<h1><?php echo esc_html(Singular::get_title()); ?></h1>
			<?php
			while (have_posts()) {
				the_post();
				Template::render('card-page');
			}

			Template::render('pagination');

		} else {
			Template::render('content-none');
		}
		?>
	</div>
</main>
<?php
get_footer();
