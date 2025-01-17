<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;
?>
<form class="mnt-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label aria-label="<?php echo esc_attr( __( 'Search field', 'my-theme' ) ); ?>">
		<input
			value="<?php echo get_search_query(); ?>"
			name="s"
			type="search"
			placeholder="<?php echo esc_attr( __( 'Search', 'my-theme' ) ); ?>"
		>
	</label>
</form>
