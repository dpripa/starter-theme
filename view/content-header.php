<?php

namespace StarterTheme;

defined( 'ABSPATH' ) || exit;
?>
<header class="mnt-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">
		<a class="mnt-header__logo mnt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img
				class="mnt-logo__emblem"
				src="<?php echo esc_url( Fs::get_url( 'img/logo.svg', true ) ); ?>"
				alt="<?php echo esc_attr__( 'Logo', 'starter-theme' ); ?>"
			>
			<span class="mnt-logo__label">
			<span class="mnt-logo__title">
				<?php bloginfo( 'name' ); ?>
			</span>
			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description ) {
				?>
				<span class="mnt-logo__description">
					<?php echo $description; // phpcs:ignore ?>
				</span>
			<?php } ?>
		</span>
		</a>
		<nav class="mnt-header__menu">
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
