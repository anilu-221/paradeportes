<?php
/**
 *
 * Archive for evento
 *
 * @package paradeportes
 */

get_header();
/** Variables */
$bg_img                = get_field( 'events_bg_img', 'options' );
$bg_img_url            = wp_get_attachment_image_url( $bg_img, 'full', false );
$content               = 'Eventos';
$today                 = gmdate( 'Ymd' );
$paradeporte           = get_query_var( 'paradeporte' );
$tax_query_paradeporte = array();
if ( $paradeporte ) {
	$tax_query_paradeporte = array(
		array(
			'taxonomy' => 'paradeporte',
			'field'    => 'slug',
			'terms'    => $paradeporte,
		),
	);
	$paradeporte_obj       = get_term_by( 'slug', $paradeporte, 'paradeporte' );
	$content               = 'Eventos: ' . $paradeporte_obj->name;
}
$eventos_proximos_args  = array(
	'post_type'  => 'evento',
	'orderby'    => 'meta_value_num',
	'meta_key'   => 'fecha', //phpcs:ignore
	'meta_query' => array( //phpcs:ignore
		array(
			'key'     => 'fecha',
			'value'   => $today,
			'compare' => '>=',
			'type'    => 'DATE',
		),
	),
	'tax_query'  => $tax_query_paradeporte, //phpcs:ignore
);
$eventos_proximos_query = new WP_Query( $eventos_proximos_args );

$eventos_anteriores_args  = array(
	'post_type'  => 'evento',
	'orderby'    => 'meta_value_num',
	'meta_key'   => 'fecha', //phpcs:ignore
	'meta_query' => array( //phpcs:ignore
		array(
			'key'     => 'fecha',
			'value'   => $today,
			'compare' => '<=',
			'type'    => 'DATE',
		),
	),
	'tax_query'  => $tax_query_paradeporte, //phpcs:ignore
);
$eventos_anteriores_query = new WP_Query( $eventos_anteriores_args );

?>
<!--Hero Banner--> 
<?php paradeportes_hero_banner( $content ); ?>

<div class="main-content py-4 py-lg-5">
	<!--Eventos próximos-->
		<?php
		if ( $eventos_proximos_query->have_posts() ) {
			?>
			<div class="container">
				<div class="row py-3">
					<div class="col-12 mb-3">
						<h2>Próximos eventos</h2>
					</div>

					<!--Eventos--> 
					<div class="row">
						<?php
						while ( $eventos_proximos_query->have_posts() ) {
							$eventos_proximos_query->the_post();
							paradeportes_eventos_card( get_the_ID() );
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
			<?php
		}
		?>

	<!--Eventos pasados--> 
		<?php
		if ( $eventos_anteriores_query->have_posts() ) {
			?>
			<div class="container">
				<div class="row py-3">
					<div class="col-12 mb-3">
						<h2>Eventos Anteriores</h2>
					</div>

					<!--Eventos--> 
					<div class="row">
						<?php
						while ( $eventos_anteriores_query->have_posts() ) {
							$eventos_anteriores_query->the_post();
							paradeportes_eventos_card( get_the_ID() );
						}
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
			<?php
		}
		?>
</div>

<?php
get_footer();
