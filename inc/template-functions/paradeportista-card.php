<?php
/**
 * Paradeportista Card Template Function
 *
 * @package paradeportes
 */

/**
 * Displays Eventos Card
 *
 * @param string $paradeportista_id el id del evento.
 */
function paradeportes_paradeportista_card( $paradeportista_id ) {
	?>
	<div class="col-6 col-lg-3 my-2 pd-card__col">
		<div class="pd-card__wrapper bg-dark">
			<!--Image--> 
				<div class="pd-card__image-container">
					<a class="text-decoration-none" href="<?php echo esc_url( get_the_permalink( $paradeportista_id ) ); ?>">
						<?php
						if ( get_the_post_thumbnail() ) {
							echo get_the_post_thumbnail(
								$paradeportista_id,
								'single-cards',
								array(
									'class' => 'pd-card__image-paradeportista',
								)
							);
						} else {
							?>
							<img class="pd-card__image-paradeportista" src="<?php echo esc_url( PLUGIN_URL . '/src/images/paradeportes-user.jpg' ); ?>" alt="Sombra de una persona">
							<?php
						}

						?>
					</a>
				</div>
			<!--Content--> 
				<div class="pd-card__body py-2">
					<!--Titulo--> 
					<a class="text-decoration-none text-white" href="<?php echo esc_url( $paradeportista_id ); ?>">
						<p class="mt-2 mb-2 text-white text-center"><?php echo esc_html( get_the_title( $paradeportista_id ) ); ?></p>
					</a>
				</div>
		</div>
	</div>
	<?php
}
