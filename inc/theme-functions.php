<?php
/**
 * Adds Theme Features
 *
 * @package paradeportes
 */

/**
 * Adds Theme Features
 */
function paradeportes_features() {
	add_image_size( 'single-cards', 420 );
}
add_action( 'after_setup_theme', 'paradeportes_features' );
