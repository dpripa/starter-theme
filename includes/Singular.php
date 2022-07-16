<?php

namespace My_Theme;

defined( 'ABSPATH' ) || exit;

final class Singular {

	public function __construct() {
		if ( app()->simpleton()->validate( self::class ) ) {
			return;
		}

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_filter( 'the_content', array( $this, 'render_hello_text_label' ) );
	}

	public function enqueue_assets(): void {
		if ( ! is_singular() ) {
			return;
		}

		app()->asset()->enqueue_style( 'singular' );

		if ( self::is_template( 'template-sample' ) ) {
			app()->asset()->enqueue_style( 'template-sample' );
		}
	}

	public function render_hello_text_label( string $content ): string {
		if ( ! is_single() ) {
			return $content;
		}

		app()->setting()->context()->add( 'general', 'single' );

		$label = app()->setting()->get( 'hello_text_label', 'labels' );

		if ( empty( $label ) ) {
			return $content;
		}

		$label_template = app()->template()->get(
			'label',
			array(
				'label' => $label,
			)
		);

		return $label_template . $content;
	}

	public static function is_template( string $slug ): bool {
		return is_page_template( 'templates/' . $slug . '.php' );
	}

	public static function get_title(): string {
		if ( is_home() ) {
			$home = get_option( 'page_for_posts', true );
			if ( $home ) {
				return get_the_title( $home );
			}

			return '';

		} elseif ( is_archive() ) {
			return single_cat_title( '', false );

		} elseif ( is_search() ) {
			return sprintf( esc_html( app()->i18n()->__( 'Search Results for "%s"' ) ), get_search_query() );

		} elseif ( is_404() ) {
			return esc_html( app()->i18n()->__( "Oops! That page can't be found." ) );
		}

		return get_the_title();
	}
}
