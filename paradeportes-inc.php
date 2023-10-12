<?php
/**
 * Plugin Name:       Paradeportes Inc
 * Description:       Funcionalidades para Paradeportes Inc.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Author:            Analucia M.
 * Author URI:        https://analucia.dev/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       paradeportes
 *
 * @package paradeportes-inc
 */

/** PLUGIN Constants*/
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/** Requires */
require_once PLUGIN_PATH . '/inc/acf-blocks/acf-blocks-settings.php';
require_once PLUGIN_PATH . '/inc/custom-post-types.php';
require_once PLUGIN_PATH . '/inc/files.php';
require_once PLUGIN_PATH . '/inc/options-page.php';
require_once PLUGIN_PATH . '/inc/template-paths.php';
require_once PLUGIN_PATH . '/inc/theme-functions.php';

/** Template Functions */
require_once PLUGIN_PATH . '/inc/template-functions/hero-banner.php';

/** Displays social icons */
function paradeportes_display_social_icons ( $instagram, $facebook, $twitter, $tiktok ) {
	?>
	<div class="paradeportista__social-icons-container">
		<?php 
		if ( $instagram ) {
			?>
			<a href="<?php echo esc_url( $instagram ); ?>">
				<img class="paradeportista__social-icons-img" src="<?php echo PLUGIN_URL . 'src/images/instagram-icon-01.svg' ?>" alt="Instagram Logo">
			</a>
			<?php
		}
		if ( $facebook ) {
			?>
			<a href="<?php echo esc_url( $facebook ); ?>">
				<img class="paradeportista__social-icons-img" src="<?php echo PLUGIN_URL . 'src/images/facebook-icon-01.svg' ?>" alt="Facebook Logo">
			</a>
			<?php
		}
		if ( $twitter ) {
			?>
			<a href="<?php echo esc_url( $twitter ); ?>">
				<img class="paradeportista__social-icons-img" src="<?php echo PLUGIN_URL . 'src/images/x-t-icon-01.svg' ?>" alt="Twitter Logo">
			</a>
			<?php
		}
		if ( $tiktok ) {
			?>
			<a href="<?php echo esc_url( $tiktok ); ?>">
				<img class="paradeportista__social-icons-img" src="<?php echo PLUGIN_URL . 'src/images/tiktok-icon-01.svg' ?>" alt="Tiktok Logo">
			</a>
			<?php
		}
		?>
	</div>
	<?php
}

/**Query Vars */
function paradeportes_custom_query_var($query_vars)
{
    $query_vars[] = 'pais';
	$query_vars[] = 'paradeporte';
	$query_vars[] = 'nivel';
	$query_vars[] = 'categoria_p';
	$query_vars[] = 'discapacidad';
    return $query_vars;
}
add_filter('query_vars', 'paradeportes_custom_query_var');

/** Pagination */
function paradeportes_custom_number_pagination($custom_query) {
	echo '<div class="py-3 text-center paradeportes-pagination">';

	$big = 9999999;
	echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $custom_query->max_num_pages,
			'prev_next' =>  false,
			'next_text' =>  false,
		)
	);
	
	echo '</div>';
};