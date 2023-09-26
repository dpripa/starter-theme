<?php

namespace MyTheme;

defined( 'ABSPATH' ) || exit;
?>
<section>
	<h1><?php echo esc_html__( 'Nothing Found', KEY ); ?></h1>
	<?php if ( is_search() ) { ?>
		<p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', KEY ); ?></p>
	<?php } ?>
</section>
