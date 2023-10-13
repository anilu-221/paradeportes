<?php
/**
 *
 * Archive for evento
 *
 * @package paradeportes
 */

get_header();
/** Variables */
$bg_img     = get_field( 'events_bg_img', 'options' );
$bg_img_url = wp_get_attachment_image_url( $bg_img, 'full', false );
$content    = 'Eventos';
$today      = gmdate( 'Ymd' );

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
);
$eventos_proximos_query = new WP_Query( $eventos_proximos_args );

$eventos_anteriores_args = array(
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
							$fecha = get_field( 'fecha' );
							?>
								<div class="col-lg-4 my-2 pd-card__col">
									<div class="pd-card__wrapper">
										<!--Image--> 
											<div class="pd-card__image-container">
												<a class="text-decoration-none" href="<?php echo esc_url( get_the_permalink() ); ?>">
													<?php
													echo get_the_post_thumbnail(
														get_the_ID(),
														'single-cards',
														array(
															'class' => 'pd-card__image',
														)
													);
													?>
												</a>
											</div>
										<!--Content--> 
											<div class="pd-card__body">
												<!--Deporte-->
													<?php
													$deportes = get_the_terms( get_the_ID(), 'deporte' );
													foreach ( $deportes as $deporte ) {
														?>
															<p class="d-inline"><span class="badge bg-primary me-2"><?php echo esc_html( $deporte->name ); ?></span></p>
														<?php
													}
													?>

												<!--Titulo--> 
												<a class="text-decoration-none" href="<?php echo esc_url( get_the_permalink() ); ?>">
													<h3 class="mt-2 mb-2"><?php the_title(); ?></h3>
												</a>


												<!--Fecha--> 
													<p>
														Fecha: <?php echo wp_kses_post( $fecha ); ?>
													</p>
											</div>
									</div>
								</div>
							<?php
						}
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
							$fecha = get_field( 'fecha' );
							?>
								<div class="col-lg-4 my-2 pd-card__col">
									<div class="pd-card__wrapper"> 
										<!--Image--> 
											<div class="pd-card__image-container">
												<a class="text-decoration-none" href="<?php echo esc_url( get_the_permalink() ); ?>">
													<?php
													echo get_the_post_thumbnail(
														get_the_ID(),
														'single-cards',
														array(
															'class' => 'pd-card__image',
														)
													);
													?>
												</a>
											</div>
										<!--Content--> 
											<div class="pd-card__body">
												<!--Deporte-->
													<?php
													$deportes = get_the_terms( get_the_ID(), 'paradeporte' );
													if ( $deportes ) {
														foreach ( $deportes as $deporte ) {
															?>
																<p class="d-inline"><span class="badge bg-primary me-2"><?php echo esc_html( $deporte->name ); ?></span></p>
															<?php
														}
													}
													?>

												<!--Titulo--> 
													<a class="text-decoration-none" href="<?php echo esc_url( get_the_permalink() ); ?>">
														<h3 class="mt-2 mb-2"><?php the_title(); ?></h3>
													</a>

												<!--Fecha--> 
													<p>
														Fecha: <?php echo wp_kses_post( $fecha ); ?>
													</p>
											</div>
									</div>
								</div>
							<?php
						}
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
