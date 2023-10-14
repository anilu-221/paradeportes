<?php
/**
 * Enqueue Files
 *
 * @package paradeportes
 */

/**Enqueue Theme Files */
function paradeportes_enqueue_files() {
	// Theme Styles.
	wp_enqueue_style( 'paradeportes_styles', PLUGIN_URL . 'dist/css/app.css', null, '1.0' );
	// Theme Scripts.
	wp_enqueue_script( 'paradeportes_scripts', PLUGIN_URL . 'dist/js/app.js', null, '1.0', true );

}
add_action( 'wp_enqueue_scripts', 'paradeportes_enqueue_files' );

/**
 * Admin scripts.
 */
function paradeportes_enqueue_admin_scripts() {
	wp_enqueue_style( 'paradeportes-admin-styles', PLUGIN_URL . '/src/admin/admin.css', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'paradeportes_enqueue_admin_scripts' );
