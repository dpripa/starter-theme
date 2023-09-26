<?php

namespace MainTheme;

defined( 'ABSPATH' ) || exit;
?>
<form class="my-theme-search" role="search" method="get" action="<?php echo esc_url( \MainPlugin\Plugin\Url::get_home() ); ?>">
	<label aria-label="<?php echo esc_attr( __( 'Search field', KEY ) ); ?>">
		<input
			value="<?php echo get_search_query(); ?>"
			name="s"
			type="search"
			placeholder="<?php echo esc_attr( __( 'Search', KEY ) ); ?>"
		>
	</label>
</form>
