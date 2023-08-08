<?php

namespace MyTheme;

defined( 'ABSPATH' ) || exit;
?>
<section>
	<h1><?php echo esc_html( app()->i18n->__( 'Nothing Found' ) ); ?></h1>
	<?php if ( is_search() ) { ?>
		<p><?php echo esc_html( app()->i18n->__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ) ); ?></p>
	<?php } ?>
</section>
