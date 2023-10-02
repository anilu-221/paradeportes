<?php
/**
 * Plugin Name:       Paradeportes Inc
 * Description:       Funcionalidades para Paradeportes Inc.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Author:            Analucia M.
 * Author URI:        https://analucia.dev/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       paradeportes
 *
 * @package paradeportes-inc
 */

/** PLUGIN Constants*/
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/** Requires */
require_once PLUGIN_PATH . '/inc/custom-post-types.php';
require_once PLUGIN_PATH . '/inc/files.php';
require_once PLUGIN_PATH . '/inc/options-page.php';
require_once PLUGIN_PATH . '/inc/theme-functions.php';
require_once PLUGIN_PATH . '/inc/whatsapp-boton.php';

/** Template Functions */
require_once PLUGIN_PATH . '/inc/template-functions/hero-banner.php';
