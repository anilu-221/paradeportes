<?php
/**
 *
 * Template Name: Archive for paradeportes
 *
 * @package paradeportes
 */

get_header();

/** Variables */
$paradeporte_id      = get_queried_object()->term_id;
$paradeporte_slug    = get_queried_object()->slug;
$paradeporte_logo_id = get_field( 'logo_de_paradeporte', 'paradeporte_' . $paradeporte_id );
$paradeporte_logo    = wp_get_attachment_image(
	$paradeporte_logo_id,
	'medium',
	true,
	array(
		'class' => 'paradeporte__logo',
	)
);
$content             = '';
if ( $paradeporte_logo_id ) {
	$content = $paradeporte_logo . ' ' . get_the_archive_title();
} else {
	$content = get_the_archive_title();
}
?>

<!--Hero Banner--> 
	<?php paradeportes_hero_banner( $content ); ?>

<!--Content--> 
	<?php
	if ( term_description() ) {
		?>
		<div class="container">
			<div class="row">
				<div class="col-12 bg-white rounded shadow paradeporte__descripcion p-4 mb-4">
					<?php echo term_description(); ?>
				</div>
			</div>
		</div>
		<?php
	}
	?>
<!--Próximos Eventos-->
	<!--Query-->
	<?php
	$today                  = gmdate( 'Ymd' );
	$eventos_proximos_args  = array(
		'posts_per_page' => 3,
		'post_type'      => 'evento',
		'orderby'        => 'meta_value_num',
		'meta_key'       => 'fecha', //phpcs:ignore
		'meta_query'     => array( //phpcs:ignore
			array(
				'key'     => 'fecha',
				'value'   => $today,
				'compare' => '>=',
				'type'    => 'DATE',
			),
		),
		'tax_query'      => array( //phpcs:ignore
			array(
				'taxonomy' => 'paradeporte',
				'field'    => 'slug',
				'terms'    => $paradeporte_slug,
			),
		),
	);
	$eventos_proximos_query = new WP_Query( $eventos_proximos_args );
	?>
	<!--Content-->
	<?php
	if ( $eventos_proximos_query->have_posts() ) {
		?>
		<div class="container my-4">
			<div class="row">
				<div class="col-12 d-flex align-items-center">
					<h2 class="mb-3">Próximos Eventos</h2>
					<a href="/evento?paradeporte=<?php echo esc_attr( $paradeporte_slug ); ?>" class="btn btn-sm btn-primary ms-3 mb-2">Ver Todos</a>
				</div>
				<?php
				while ( $eventos_proximos_query->have_posts() ) {
					$eventos_proximos_query->the_post();
					paradeportes_eventos_card( get_the_ID() );
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	}
	?>

<!--Eventos Pasados-->
	<!--Query-->
	<?php
	$today                 = gmdate( 'Ymd' );
	$eventos_pasados_args  = array(
		'posts_per_page' => 3,
		'post_type'      => 'evento',
		'orderby'        => 'meta_value_num',
		'meta_key'       => 'fecha', //phpcs:ignore
		'meta_query'     => array( //phpcs:ignore
			array(
				'key'     => 'fecha',
				'value'   => $today,
				'compare' => '<=',
				'type'    => 'DATE',
			),
		),
		'tax_query'       => array( //phpcs:ignore
			array(
				'taxonomy' => 'paradeporte',
				'field'    => 'slug',
				'terms'    => $paradeporte_slug,
			),
		),
	);
	$eventos_pasados_query = new WP_Query( $eventos_pasados_args );
	?>
	<!--Content-->
	<?php
	if ( $eventos_pasados_query->have_posts() ) {
		?>
		<div class="container my-4">
			<div class="row">
				<div class="col-12 d-flex align-items-center">
					<h2 class="mb-3">Eventos Pasados</h2>
					<a href="/evento?paradeporte=<?php echo esc_attr( $paradeporte_slug ); ?>" class="btn btn-sm btn-primary ms-3 mb-2">Ver Todos</a>
				</div>
				<?php
				while ( $eventos_pasados_query->have_posts() ) {
					$eventos_pasados_query->the_post();
					paradeportes_eventos_card( get_the_ID() );
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	}
	?>
<!--Articulos y Noticias-->
	<!--Query-->
	<?php
	$posts_args  = array(
		'posts_per_page' => 6,
		'post_type'      => 'post',
		'tax_query'      => array( //phpcs:ignore
			array(
				'taxonomy' => 'paradeporte',
				'field'    => 'slug',
				'terms'    => $paradeporte_slug,
			),
		),
	);
	$posts_query = new WP_Query( $posts_args );
	if ( $posts_query->have_posts() ) {
		?>
		<div class="container my-5">
			<div class="row">
				<div class="col-12 d-flex align-items-center">
					<h2 class="mb-3">Artículos y noticias</h2>
					<a href="/blog?paradeporte=<?php echo esc_attr( $paradeporte_slug ); ?>" class="btn btn-sm btn-primary ms-3 mb-2">Ver Todos</a>
				</div>
				<?php
				while ( $posts_query->have_posts() ) {
					$posts_query->the_post();
					paradeportes_posts_card( get_the_ID() );
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	}
	?>
<!--Paradeportistas-->
	<!--Query-->
	<?php
	$paradeportistas_args  = array(
		'posts_per_page' => 18,
		'post_type'      => 'paradeportista',
		'tax_query'      => array( //phpcs:ignore
			array(
				'taxonomy' => 'paradeporte',
				'field'    => 'slug',
				'terms'    => $paradeporte_slug,
			),
		),
	);
	$paradeportistas_query = new WP_Query( $paradeportistas_args );
	if ( $paradeportistas_query->have_posts() ) {
		?>
		<div class="container my-4">
			<div class="row">
				<div class="col-12 d-flex align-items-center">
					<h2 class="mb-3">Paradeportistas</h2>
					<a href="/paradeportistas?paradeporte=<?php echo esc_attr( $paradeporte_slug ); ?>" class="btn btn-sm btn-primary ms-3 mb-2">Ver Todos</a>
				</div>
				<?php
				while ( $paradeportistas_query->have_posts() ) {
					$paradeportistas_query->the_post();
					paradeportes_paradeportista_card( get_the_ID() );
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	}
	?>
<?php
get_footer();
