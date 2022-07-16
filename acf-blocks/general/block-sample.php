<?php
/**
 * Block Name:        Sample Block
 * Block Description: Let's develop it!
 * Block Icon:        phone
 * Block Keywords:    contacts
 * Block Post Types:  post, page
 */

namespace My_Theme;

app()->i18n()->__( 'Sample Block' );
app()->i18n()->__( "Let's develop it!" );

defined( 'ABSPATH' ) || exit;

/**
 * @var array $args {
 *  @type string 'className'
 * }
 */
?>

<div class="<?php echo isset( $args['className'] ) ? esc_attr( $args['className'] ) : ''; ?>">
	<div class="container">
		<?php echo esc_html( app()->i18n()->__( "Let's develop it!" ) ); ?>
	</div>
</div>
