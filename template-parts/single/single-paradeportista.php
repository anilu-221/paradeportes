<?php
/**
 * Template para Paradeportistas
 *
 * @package paradeportes
 */

get_header();

// Taxonomies.
$paises    = get_the_terms( get_the_ID(), 'pais' );

// ACF.
$nacimiento = get_field( 'fecha_de_nacimiento' );
$biografia  = get_field( 'biografia' );
$contacto   = get_field( 'contacto' );
$instagram  = get_field( 'instagram' );
$facebook   = get_field( 'facebook' );
$twitter    = get_field( 'twitter' );
$tiktok     = get_field( 'tiktok' );
$producto   = get_field( 'producto_asociado' );
?>

<div class="container my-5">
	<!--Player Header--> 
	<div class="row g-4 my-3">
		<!--Left--> 
		<div class="col-lg-4">
			<div class="paradeportista__card--img">
				<!--Image-->
				<?php
					if ( has_post_thumbnail() ) {
						echo get_the_post_thumbnail(
							get_the_ID(),
							'large',
							array(
								'class' => 'paradeportista__img',
							)
						);
					}
				?>
				<!--Body--> 
				<div class="py-2 px-4">
					<!--Country--> 
					<?php
					if ( $paises ) {
						foreach ( $paises as $pais) {
							$name    = $pais->name;
							$bandera = get_field( 'bandera', 'pais_' . $pais->term_id );
							?>
							<div class="d-flex align-items-end my-3">
								<?php
								if ( $bandera ) {
									echo wp_get_attachment_image(
										$bandera,
										'medium',
										true,
										array(
											'class' => 'paradeportista__bandera',
										)
									);
								}
								?>
								<p class="h3 my-0 ms-2"><?php echo esc_html( $name ); ?></p>
							</div>
							<?php
						}
					}
					?>

					<!--Age--> 
					<?php
					if ( $nacimiento ) {
						?>
						<div class="my-2">
							<p class="fs-5 m-0">
								Edad: 29 Años
							</p>
						</div>
						<?php
					}
					?>

					<hr>
					<?php 
					if ( $contacto ) {
						?>
						<div>
							<h3>Contacto</h3>
							<?php echo $contacto; ?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>

		<!--Right--> 
		<div class="col-lg-8">
			<!--Header--> 
			<div class="paradeportista__card mb-4">
				<!--Name--> 
				<h1><?php the_title(); ?></h1>

				<!--Paradeporte con icono--> 

				<!--Categoría-->

				<!--Nivel-->
			</div>
			<!--Biografia--> 
			<?php
			if ( $biografia ) {
				?>
				<div class="paradeportista__card">
					<!--Biografía-->
					<?php echo $biografia; ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>

	<!--Player Footer--> 
	<div class="row">
		<div class="12">

		</div>
	</div>
</div>

<?php
get_footer();
