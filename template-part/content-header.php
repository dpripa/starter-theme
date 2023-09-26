<?php

namespace MainTheme;

defined( 'ABSPATH' ) || exit;
?>
<header class="mt-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">
		<a class="mt-header__logo mt-logo" href="<?php echo esc_url( \MainPlugin\Plugin\Url::get_home() ); ?>">
			<img
				class="mt-logo__emblem"
				src="<?php echo esc_url( Theme\Fs::get_url( 'images/logo.svg', true ) ); ?>"
				alt="<?php echo esc_attr__( 'Logo', KEY ); ?>"
			>
			<span class="mt-logo__label">
			<span class="mt-logo__title">
				<?php bloginfo( 'name' ); ?>
			</span>
			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description ) {
				?>
				<span class="mt-logo__description">
					<?php echo $description; // phpcs:ignore ?>
				</span>
			<?php } ?>
		</span>
		</a>
		<nav class="mt-header__menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => KEY . '_main',
					'menu_class'     => 'ul-clean ul-inline-block',
					'container'      => 'ul',
				)
			);
			?>
		</nav>
	</div>
</header>
