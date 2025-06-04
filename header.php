<?php
namespace StarterTheme;

defined( 'ABSPATH' ) || exit;
?>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', '' );</script>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php
wp_body_open();

app()->view()->render( 'content-header' );
