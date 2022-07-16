<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;
?>
<header class="my-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">
		<a class="my-header__logo my-logo" href="<?php echo esc_url( app()->http()->get_home_url() ); ?>">
			<img
				class="my-logo__emblem"
				src="<?php echo esc_url( app()->asset()->get_url( 'images/logo.svg', true ) ); ?>"
				alt="<?php echo esc_attr( app()->i18n()->__( 'Logo' ) ); ?>"
			>
			<span class="my-logo__label">
			<span class="my-logo__title">
				<?php bloginfo( 'name' ); ?>
			</span>
			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) {
				?>
				<span class="my-logo__description">
					<?php echo $description; // phpcs:ignore ?>
				</span>
			<?php } ?>
		</span>
		</a>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => app()->get_key( 'main' ),
				'menu_class'     => 'ul-clean ul-inline-block',
				'container'      => 'ul',
			)
		)
		?>
	</div>
</header>
