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

/**
 * Create category for Appward custom blocks
 *
 * @param array $categories Gutenberg block categories.
 */
function paradeportes_create_block_category( $categories ) {
	// Adding a new category.
	$new_category = array(
		'slug'  => 'paradeportes-ux',
		'title' => 'paradeportes UX',
		'icon'  => 'paradeportes-logo-svg',
	);

	array_unshift( $categories, $new_category );

	return $categories;
}
add_filter( 'block_categories_all', 'paradeportes_create_block_category', 99, 2 );
