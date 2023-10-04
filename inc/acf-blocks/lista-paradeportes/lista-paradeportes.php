<?php
/**
 *
 * Block de Lista de Paradeportes
 *
 * @param array $block The block settings and attributes
 * @package paradeportes
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = esc_attr( $block['anchor'] );
}

// Attributes.
$attributes = get_block_wrapper_attributes();

// Custom Fields.

?>
<div>
	<p>Lista de paradeportes aqui</p>
</div>