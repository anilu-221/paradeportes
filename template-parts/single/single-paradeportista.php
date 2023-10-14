<?php
/**
 *
 * Template Name: Catalogo de Paradeportistas
 *
 * @package paradeportes
 */

get_header();

// Taxonomies.
$paises                   = get_the_terms( get_the_ID(), 'pais' );
$nivel                    = get_the_terms( get_the_ID(), 'nivel' );
$discapacidad             = get_the_terms( get_the_ID(), 'discapacidad' );
$paradeportes             = get_the_terms( get_the_ID(), 'paradeporte' );
$categoria_paradeportista = get_the_terms( get_the_ID(), 'categoria_paradeportista' );

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
<!--Gradient Line-->
<?php paradeportes_gradient_line(); ?>

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
					} else {
						?>
						<img class="paradeportista__img" src="<?php echo esc_url( PLUGIN_URL . '/src/images/paradeportes-user.jpg' ); ?>" alt="Sombra de una persona">
						<?php
					}
					?>
				<!--Body--> 
				<div class="py-2 px-4">
					<!--Name Mobile--> 
					<h1 class="d-lg-none"><?php the_title(); ?></h1>
					<!--Country--> 
						<?php
						if ( $paises ) {
							foreach ( $paises as $pais ) {
								$name    = $pais->name;
								$bandera = get_field( 'bandera', 'pais_' . $pais->term_id );
								?>
								<div class="d-flex align-items-center my-3">
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
									<p class="h3 my-0"><?php echo esc_html( $name ); ?></p>
								</div>
								<?php
							}
						}
						?>
					<!--Age--> 
						<?php
						if ( $nacimiento ) {
							$today = new DateTime( 'today' );
							$dob   = new DateTime( $nacimiento );
							$age   = $dob->diff( $today )->y;
							?>
							<div class="my-2">
								<p class="fs-5 m-0">
									<?php echo 'Edad: ' . esc_html( $age ) . ' años'; ?>
								</p>
							</div>
							<?php
						}
						?>

					<hr>
					<!--Contacto--> 
						<?php
						if ( $contacto ) {
							?>
							<div>
								<h3>Contacto</h3>
								<?php echo wp_kses_post( $contacto ); ?>
							</div>
							<?php
						}

						if ( $instagram || $facebook || $twitter || $tiktok ) {
							paradeportes_display_social_icons( $instagram, $facebook, $twitter, $tiktok );
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
					<h1 class="d-none d-lg-block"><?php the_title(); ?></h1>
				<!--Paradeporte con icono--> 
					<?php
					if ( $paradeportes ) {
						foreach ( $paradeportes as $paradeporte ) {
							$name           = $paradeporte->name;
							$paradeporte_id = $paradeporte->term_id;
							$logo           = get_field( 'logo_de_paradeporte', 'paradeporte_' . $paradeporte->term_id );
							if ( $logo ) {
								?>
								<div class="d-flex mt-3">
									<?php
									if ( $logo ) {
										echo wp_get_attachment_image(
											$logo,
											'Medium',
											false,
											array(
												'class' => 'paradeportista__deporte-logo bg-primary',
											)
										);
									}
									?>
									<h3 class="text-primary"><?php echo esc_html( $name ); ?></h3>
								</div>
								<?php
							} else {
								?>
								<h3 class="text-primary"><?php echo esc_html( $name ); ?></h3>
								<?php
							}
						}
					}
					?>

				<!--Categoría-->
					<?php
					if ( $categoria_paradeportista ) {
						$count = 1;
						$total = count( $categoria_paradeportista );
						echo '<p class="mt-3">';
						echo 'Categoría: ';
						foreach ( $categoria_paradeportista as $cat_p ) {
							echo esc_html( $cat_p->name );
							if ( $count < $total ) {
								echo ', ';
							}
							$count++;
						}
						echo '</p>';
					}
					?>
				<!--Nivel-->
					<?php
					if ( $nivel ) {
						$count = 1;
						$total = count( $nivel );
						echo '<p class="mt-3">';
						echo 'Nivel: ';
						foreach ( $nivel as $niv ) {
							echo esc_html( $niv->name );
							if ( $count < $total ) {
								echo ', ';
							}
							$count++;
						}
						echo '</p>';
					}
					?>
				<!--Discapacidad-->
					<?php
					if ( $discapacidad ) {
						$count = 1;
						$total = count( $discapacidad );
						echo '<p class="mt-3">';
						echo 'Tipo de discapacidad: ';
						foreach ( $discapacidad as $disc ) {
							echo esc_html( $disc->name );
							if ( $count < $total ) {
								echo ', ';
							}
							$count++;
						}
						echo '</p>';
					}
					?>
			</div>
			<!--Biografia--> 
			<?php
			if ( $biografia ) {
				?>
				<div class="paradeportista__card">
					<!--Biografía-->
					<?php echo wp_kses_post( $biografia ); ?>
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
