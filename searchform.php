<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;
?>
<form class="my-theme-search" role="search" method="get" action="<?php echo esc_url( app()->http()->get_home_url() ); ?>">
	<label aria-label="<?php echo esc_attr( app()->i18n()->__( 'Search field' ) ); ?>">
		<input
			value="<?php echo get_search_query(); ?>"
			name="s"
			type="search"
			placeholder="<?php echo esc_attr( app()->i18n()->__( 'Search' ) ); ?>"
		>
	</label>
</form>
