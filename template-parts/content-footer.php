<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;
?>
<footer class="my-footer">
	<div class="container">
		<div>
			<?php echo esc_html( '© ' . gmdate( 'Y' ) ); ?>
		</div>
		<?php the_privacy_policy_link( '<div>', '</div>' ); ?>
	</div>
</footer>
