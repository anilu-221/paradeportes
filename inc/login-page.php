<?php
/**
 * Login Page Functions
 *
 * @package jackie-ux
 */

/**Changes login logo */
function paradeportes_login_logo() {
	$logo     = get_theme_mod( 'custom_logo' );
	$logo_url = wp_get_attachment_image_url( $logo, 'full', false );
	?>
	<style type="text/css">
		#login h1 a, .login h1 a {
		background-image: url('<?php echo esc_url( $logo_url ); ?>');
		background-position: center;
		height: 65px;
		width: 320px;
		background-size: contain;
		background-repeat: no-repeat;
		padding-bottom: 30px;
		border-radius: 1rem;
		}
		body{
			background-color: #2e323a !important;
			color: #fff !important,
		}

		.login  a{
			color: #fff !important
		}

		#login #loginform{
			border: 0 !important;
			box-shadow: unset !important;
			margin-bottom: 0;
		}

		#login input[type="submit"]{
			background-color: #23C686;
			width: 100%;
			padding: 6px;
			border: 0;
			font-size: 1rem;
		}

		#login input[type="submit"]:hover{
			background-color: #50575e;
		}

		#login input[type="password"]{
			padding: 6px;
		}

		#login input[type="password"]:focus{
			border-color: #23C686;
			box-shadow: 0 0 0 1px #23C686;
		}

		#login label{
			color: #646970;
			font-size: 1.25rem;
		}
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'paradeportes_login_logo' );

/** Changes Login Logo's URL to homepage*/
function paradeportes_login_logo_url() {
	return esc_url( site_url( '/' ) );
}
add_filter( 'login_headerurl', 'paradeportes_login_logo_url' );

