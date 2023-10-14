<?php
/**
 * Add Paradeportes and Paradeportistas pages
 *
 * @package paradeportes
 */

/**Adds Paradeportes Page */
function paradeportes_add_paradeportes_page() {
	$page_exists = get_page_by_path( 'paradeportes' );
	if ( empty( $page_exists ) ) {
		$page_id = wp_insert_post(
			array(
				'post_type'      => 'page',
				'comment_status' => 'close',
				'ping_status'    => 'close',
				'post_author'    => 1,
				'post_title'     => 'Paradeportes',
				'post_name'      => 'paradeportes',
				'post_status'    => 'publish',
			)
		);
	}
}
add_action( 'init', 'paradeportes_add_paradeportes_page' );

/**Adds Paradeportistas Page */
function paradeportes_add_paradeportistas_page() {
	$page_exists = get_page_by_path( 'paradeportistas' );
	if ( empty( $page_exists ) ) {
		$page_id = wp_insert_post(
			array(
				'post_type'      => 'page',
				'comment_status' => 'close',
				'ping_status'    => 'close',
				'post_author'    => 1,
				'post_title'     => 'Paradeportistas',
				'post_name'      => 'Paradeportistas',
				'post_status'    => 'publish',
			)
		);
	}
}
add_action( 'init', 'paradeportes_add_paradeportistas_page' );
