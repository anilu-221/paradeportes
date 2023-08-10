<?php 
if( function_exists('acf_add_options_page') ) {
	
    //Menu Tab
	acf_add_options_page(array(
		'page_title' 	=> 'Configuración Paradeportes',
		'menu_title'	=> 'Paradeportes',
		'menu_slug' 	=> 'paradeportes-configuracion',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position' 		=> 2.5,
	));
}