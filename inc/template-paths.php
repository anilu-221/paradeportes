<?php
/**
 * Template paths functions
 *
 * @package paradeportes
 */

/**
 * Single Templates
 *
 * @param string $single single template.
 */
function paradeportes_single_templates( $single ) {
	global $post;
	/** Evento Single */
	if ( 'evento' === $post->post_type ) {
		if ( file_exists( PLUGIN_PATH . '/template-parts/single/single-evento.php' ) ) {
			return PLUGIN_PATH . '/template-parts/single/single-evento.php';
		}
	}

	/** Paradeportista Single */
	if ( 'paradeportista' === $post->post_type ) {
		if ( file_exists( PLUGIN_PATH . '/template-parts/single/single-paradeportista.php' ) ) {
			return PLUGIN_PATH . '/template-parts/single/single-paradeportista.php';
		}
	}
	return $single;
}

add_filter( 'single_template', 'paradeportes_single_templates' );

/**
 * Archive Templates
 *
 * @param string $archive archive template.
 */
function paradeportes_archive_templates( $archive ) {
	global $post;
	/** Evento Archive */
	if ( 'evento' === $post->post_type ) {
		if ( file_exists( PLUGIN_PATH . '/template-parts/archives/archive-evento.php' ) ) {
			return PLUGIN_PATH . '/template-parts/archives/archive-evento.php';
		}
	}

	/** Paradeporte Archive */
	if ( is_tax( 'paradeporte' ) ) {
		if ( file_exists( PLUGIN_PATH . '/template-parts/archives/archive-paradeporte.php' ) ) {
			return PLUGIN_PATH . '/template-parts/archives/archive-paradeporte.php';
		}
	}
	return $archive;
}
add_filter( 'archive_template', 'paradeportes_archive_templates' );

/**
 * Template for Paradeportistas Page
 *
 * @param string $template template variable.
 */
function paradeportes_page_template( $template ) {
	if ( is_page( 'paradeportistas' ) ) {
		$template = PLUGIN_PATH . '/template-parts/pages/page-paradeportistas.php';
	}
	return $template;
}

add_filter( 'page_template', 'paradeportes_page_template' );
