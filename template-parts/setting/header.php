<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;
?>
<div class="my-theme-header">
	<div class="my-theme-header__title">
		<?php echo esc_html( app()->info()->get_name() ); ?>
	</div>
</div>
