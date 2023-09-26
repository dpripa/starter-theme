<?php

namespace MainTheme;

defined( 'ABSPATH' ) || exit;
?>
<footer class="mt-footer">
	<div class="container">
		<div>
			<?php echo esc_html( '© ' . gmdate( 'Y' ) ); ?>
		</div>
		<?php the_privacy_policy_link( '<div>', '</div>' ); ?>
	</div>
</footer>
