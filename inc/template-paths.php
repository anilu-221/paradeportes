<?php
/**
 * Template paths functions
 *
 * @package paradeportes
 */

/** Single Templates */
function paradeportes_single_templates ( $single ) {
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

add_filter('single_template', 'paradeportes_single_templates');

/** Archive Templates */

function paradeportes_archive_templates($archive){
	global $post;
	/** Deporte Tax Single */
	if(is_tax( 'deporte' )){
		//  return PLUGIN_PATH . '/template-parts/archives/archive-deporte.php';
	}

	/** Deporte Tax Single */
	if(is_archive( 'deporte' )){
		// return PLUGIN_PATH . '/template-parts/archives/archive-deporte.php';
	}

	/** Evento Archive */
	if( $post->post_type == 'evento'){
		if (file_exists( PLUGIN_PATH. '/template-parts/archives/archive-evento.php')){
			return PLUGIN_PATH. '/template-parts/archives/archive-evento.php';
		}
	}

	/** Paradeportista Archive */
	if( $post->post_type == 'paradeportista'){
		if (file_exists( PLUGIN_PATH. '/template-parts/archives/archive-paradeportista.php')){
			return PLUGIN_PATH. '/template-parts/archives/archive-paradeportista.php';
		}
	}

	return $archive;
}

add_filter('archive_template', 'paradeportes_archive_templates');
