<?php

namespace StarterTheme;

defined( 'ABSPATH' ) || exit;
?>
<section>
	<h1><?php echo esc_html__( 'Nothing Found', 'starter-theme' ); ?></h1>
	<?php if ( is_search() ) { ?>
		<p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'starter-theme' ); ?></p>
	<?php } ?>
</section>
