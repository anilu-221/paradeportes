<?php
/**
 * Displays Hero Banner
 *
 * @package paradeportes
 */

/**
 * Displays Hero Banner
 *
 * @param string $content content of banner.
 */
function paradeportes_hero_banner( $content ) {
	?>
	<div class="pd-hero-banner__wrapper">
		<div class="container">
			<div class="row pd-hero-banner__row">
				<div class="col-12 text-center">
					<h1 class="text-white"> <?php echo wp_kses_post( $content ); ?> </h1>
				</div>
			</div>
		</div>
	</div>
	<?php
}
