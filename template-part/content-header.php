<?php

namespace MyTheme;

use MyPlugin\Core\Url;

defined( 'ABSPATH' ) || exit;
?>
<header class="my-theme-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">
		<a class="my-theme-header__logo my-theme-logo" href="<?php echo esc_url( app()->url->get_home() ); ?>">
			<img
				class="my-theme-logo__emblem"
				src="<?php echo esc_url( app()->fs->get_url( 'images/logo.svg', true ) ); ?>"
				alt="<?php echo esc_attr( app()->i18n->__( 'Logo' ) ); ?>"
			>
			<span class="my-theme-logo__label">
			<span class="my-theme-logo__title">
				<?php bloginfo( 'name' ); ?>
			</span>
			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description ) {
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
				array(
					'theme_location' => app()->get_key( 'main' ),
					'menu_class'     => 'ul-clean ul-inline-block',
					'container'      => 'ul',
					// 'walker' => new Walker\MainMenu(),
				)
			);
			?>
		</nav>
	</div>
</header>
