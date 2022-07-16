<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;
?>
<section>
	<h1><?php echo esc_html( app()->i18n()->__( 'Nothing Found' ) ); ?></h1>
	<?php if ( is_search() ) { ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'my_theme' ); ?></p>
	<?php } ?>
</section>
