<?php get_header(); 
/** Variables */
$taxonomy = get_query_var( 'taxonomy' );
$term = get_query_var( 'term' );
$term_id = get_term($term)->term_id;
$image = get_field('deporte_img', $taxonomy.'_'.$term_id);
$image = wp_get_attachment_image_url( $image, 'full', false );
?>

<!--Hero Banner--> 
<?php paradeportes_hero_banner($image, get_the_archive_title()); ?>

<?php get_footer();