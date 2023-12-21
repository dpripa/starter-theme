<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;
?>
<form class="mnt-search" role="search" method="get" action="<?php echo esc_url( \MyPlugin\Plugin\Url::get_home() ); ?>">
	<label aria-label="<?php echo esc_attr( __( 'Search field', KEY ) ); ?>">
		<input
			value="<?php echo get_search_query(); ?>"
			name="s"
			type="search"
			placeholder="<?php echo esc_attr( __( 'Search', KEY ) ); ?>"
		>
	</label>
</form>
