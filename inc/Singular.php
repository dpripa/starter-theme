<?php
namespace StarterTheme;

use StarterTheme\OmgCore\Asset;
use StarterTheme\OmgCore\OmgFeature;

defined( 'ABSPATH' ) || exit;

class Singular extends OmgFeature {
	protected Asset $asset;

	public function __construct( Asset $asset ) {
		parent::__construct();

		$this->asset = $asset;

		add_action( 'wp_enqueue_scripts', $this->enqueue_assets() );
	}

	protected function enqueue_assets(): callable {
		return function (): void {
			$this->asset->enqueue_style( 'singular' );

			if ( $this->is_template( 'template-example' ) ) {
				$this->asset->enqueue_style( 'template-example' );
			}
		};
	}

	public function is_template( string $slug ): bool {
		return is_page_template( 'templates/' . $slug . '.php' );
	}

	public function get_title(): string {
		if ( is_home() ) {
			$home = get_option( 'page_for_posts', true );

			if ( $home ) {
				return get_the_title( $home );
			}

			return '';

		} elseif ( is_archive() ) {
			return single_cat_title( '', false );

		} elseif ( is_search() ) {
			return sprintf( esc_html( __( 'Search Results for "%s"', 'starter-theme' ) ), get_search_query() );

		} elseif ( is_404() ) {
			return esc_html( __( "Oops! That page can't be found.", 'starter-theme' ) );
		}

		return get_the_title();
	}
}
