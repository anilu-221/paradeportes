<?php
/**
 * Eventos Card Template Function
 *
 * @package paradeportes
 */

/**
 * Displays Eventos Card
 *
 * @param string $evento_id el id del evento.
 */
function paradeportes_eventos_card( $evento_id ) {
	$fecha = get_field( 'fecha', $evento_id );
	?>
	<div class="col-lg-4 my-2 pd-card__col">
		<div class="pd-card__wrapper">
			<!--Image--> 
				<div class="pd-card__image-container">
					<a class="text-decoration-none" href="<?php echo esc_url( get_the_permalink( $evento_id ) ); ?>">
						<?php
						echo get_the_post_thumbnail(
							$evento_id,
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
						$deportes = get_the_terms( $evento_id, 'paradeporte' );
						if ( $deportes ) {
							foreach ( $deportes as $deporte ) {
								?>
									<a class="text-decoration-none" href="<?php echo esc_url( get_term_link( $deporte->term_id ) ); ?>">
										<p class="d-inline"><span class="badge dark-hover bg-primary me-2"><?php echo esc_html( $deporte->name ); ?></span></p>
									</a>
								<?php
							}
						}
						?>

					<!--Titulo--> 
					<a class="text-decoration-none" href="<?php echo esc_url( $evento_id ); ?>">
						<h3 class="mt-2 mb-2"><?php echo esc_html( get_the_title( $evento_id ) ); ?></h3>
					</a>


					<!--Fecha--> 
						<p>
							Fecha: <?php echo wp_kses_post( $fecha ); ?>
						</p>

					<!--Boton-->
						<a class="btn btn-sm btn-dark" href="<?php echo esc_url( $evento_id ); ?>">
							Ver Más
						</a>
				</div>
		</div>
	</div>
	<?php
}
