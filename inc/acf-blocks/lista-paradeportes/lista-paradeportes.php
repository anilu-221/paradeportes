<?php
/**
 *
 * Block de Lista de Paradeportes
 *
 * @param array $block The block settings and attributes
 * @package paradeportes
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = esc_attr( $block['anchor'] );
}

// Attributes.
$attributes = get_block_wrapper_attributes();

// Variables.
$paradeportes = get_terms(
	array(
		'taxonomy'   => 'paradeporte',
		'hide_empty' => false,
	)
);

?>
<div>
	<?php
	if ( $paradeportes ) {
		?>
		<div class="container-fluid">
			<div class="row">
				<?php
				foreach ( $paradeportes as $paradeporte ) {
					$logo = get_field( 'logo_de_paradeporte', 'paradeporte_' . $paradeporte->term_id );
					?>
					<div class="col-6 col-lg-3">
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
