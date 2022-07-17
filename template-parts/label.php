<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

/**
 * @var array $args {
 *  @type string 'label'
 * }
 */
?>
<div class="my-theme-label">
	<div class="my-theme-label__content">
		<?php echo esc_html( $args['label'] ); ?>
	</div>
</div>
