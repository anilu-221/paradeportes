<?php
/**
 *
 * Template Name: Archive for deporte
 *
 * @package paradeportes
 */

get_header();

/** Variables */
$taxonomy_pd = get_query_var( 'taxonomy' );
$term_pd     = get_query_var( 'term' );
$term_id     = get_term( $term_pd )->term_id;
$image       = get_field( 'deporte_img', $taxonomy_pd . '_' . $term_id );
$image       = wp_get_attachment_image_url( $image, 'full', false );
?>

<!--Hero Banner--> 
<?php paradeportes_hero_banner( get_the_archive_title() ); ?>

<?php
get_footer();
