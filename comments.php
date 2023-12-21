<?php
namespace MyTheme;

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}

$comment_count = (int) get_comments_number();
?>
<section class="mnt-comments">
	<?php if ( have_comments() ) { ?>
		<h2>
			<?php
			if ( 1 === $comment_count ) {
				printf(
					esc_html__( 'One thought on \'%1$s\'', KEY ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);

			} else {
				printf(
					esc_html( _n( '%1$s thought on \'%2$s\'', '%1$s thoughts on \'%2$s\'', $comment_count, KEY ) ),
					number_format_i18n( $comment_count ), // phpcs:ignore
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>
		<?php the_comments_navigation(); ?>
		<ol>
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) {
			?>
			<p><?php echo esc_html__( 'Comments are closed.', KEY ); ?></p>
			<?php
		}
	}
	comment_form();
	?>
</section>
