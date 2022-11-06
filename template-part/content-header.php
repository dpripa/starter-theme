<?php

namespace MyTheme;

defined('ABSPATH') || exit;
?>
<header class="my-theme-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">
		<a class="my-theme-header__logo my-theme-logo" href="<?php echo esc_url(Url::get_home()); ?>">
			<img
				class="my-theme-logo__emblem"
				src="<?php echo esc_url(get_url('images/logo.svg', true)); ?>"
				alt="<?php echo esc_attr__('Logo', KEY); ?>"
			>
			<span class="my-theme-logo__label">
			<span class="my-theme-logo__title">
				<?php bloginfo('name'); ?>
			</span>
			<?php
			$description = get_bloginfo('description', 'display');

			if ($description) {
				?>
				<span class="my-theme-logo__description">
					<?php echo $description; // phpcs:ignore ?>
				</span>
			<?php } ?>
		</span>
		</a>
		<nav class="my-theme-header__menu">
			<?php
			wp_nav_menu(
				[
					'theme_location' => KEY . '_main',
					'menu_class' => 'ul-clean ul-inline-block',
					'container'  => 'ul',
				]
			);
			?>
		</nav>
	</div>
</header>
