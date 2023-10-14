<?php
/**
 * Template para Archivo de Paradeportistas
 *
 * @package paradeportes
 */

get_header();

// Variables.
$paradeportes = get_terms(
	array(
		'taxonomy'   => 'paradeporte',
		'hide_empty' => false,
	)
);
?>

<!--Header-->
<?php paradeportes_hero_banner( 'Paradeportes' ); ?>

<div class="container">
	<div class="row">
		<div class="col my-5">
			<?php
			if ( $paradeportes ) {
				?>
				<div class="container-fluid px-0">
					<div class="row">
						<?php
						foreach ( $paradeportes as $paradeporte ) {
							$logo = get_field( 'logo_de_paradeporte', 'paradeporte_' . $paradeporte->term_id );
							?>
							<div class="col-lg-3 my-2">
								<a class="lista-paradeportes__wrapper-a" href="<?php echo esc_url( get_term_link( $paradeporte->term_id ) ); ?>">
									<div class="lista-paradeportes__wrapper">
										<div>
											<?php
											if ( $logo ) {
												echo wp_get_attachment_image(
													$logo,
													'Medium',
													false,
													array(
														'class' => 'lista-paradeportes__logo',
													)
												);
											}
											echo esc_html( $paradeporte->name );
											?>
										</div>
									</div>
								</a>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php
			} else {
				echo 'No hay paradeportes registrados.';
			}
			?>
		</div>
	</div>
</div>

<?php
get_footer();
