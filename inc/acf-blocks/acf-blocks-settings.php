<?php
/**
 *
 * Custom Blocks made with ACF
 *
 * @package paradeportes
 */

/** Register Custom ACF Blocks */
function paradeportes_register_acf_blocks() {
	register_block_type( PLUGIN_PATH . '/inc/acf-blocks/lista-paradeportes' );
}
add_action( 'init', 'paradeportes_register_acf_blocks' );
