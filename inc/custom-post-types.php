<?php
/**
 * Custom Post Types and Taxonomies
 *
 * @package paradeportes
 */

/**Register Custom Post Types */
function paradeportes_register_cpt() {
	/** Paradeportistas */
	$paradeportistas_labels = array(
		'name'                  => _x( 'Paradeportistas', 'Post Type General Name', 'paradeportes' ),
		'singular_name'         => _x( 'Paradeportista', 'Post Type Singular Name', 'paradeportes' ),
		'menu_name'             => _x( 'Paradeportistas', 'Admin Menu text', 'paradeportes' ),
		'name_admin_bar'        => _x( 'Paradeportista', 'Add New on Toolbar', 'paradeportes' ),
		'archives'              => __( 'Paradeportista', 'paradeportes' ),
		'attributes'            => __( 'Paradeportista', 'paradeportes' ),
		'parent_item_colon'     => __( 'Paradeportista', 'paradeportes' ),
		'all_items'             => __( 'Todos los Paradeportistas', 'paradeportes' ),
		'add_new_item'          => __( 'Nuevo Paradeportista', 'paradeportes' ),
		'add_new'               => __( 'Agregar Nuevo', 'paradeportes' ),
		'new_item'              => __( 'Nuevo Paradeportista', 'paradeportes' ),
		'edit_item'             => __( 'Editar Paradeportista', 'paradeportes' ),
		'update_item'           => __( 'Actualizar Paradeportista', 'paradeportes' ),
		'view_item'             => __( 'Ver Paradeportista', 'paradeportes' ),
		'view_items'            => __( 'Ver Paradeportistas', 'paradeportes' ),
		'search_items'          => __( 'Buscar Paradeportista', 'paradeportes' ),
		'not_found'             => __( 'No encontrado', 'paradeportes' ),
		'not_found_in_trash'    => __( 'No encontrado en basura', 'paradeportes' ),
		'featured_image'        => __( 'Imagen Personalizada', 'paradeportes' ),
		'set_featured_image'    => __( 'Agregar Imagen Personalizada', 'paradeportes' ),
		'remove_featured_image' => __( 'Borrar Imagen Personalizada', 'paradeportes' ),
	);

	$paradeportistas_args = array(
		'label'               => __( 'Paradeportista', 'paradeportes' ),
		'description'         => __( 'Paradeportistas', 'paradeportes' ),
		'labels'              => $paradeportistas_labels,
		'menu_icon'           => 'dashicons-groups',
		'supports'            => array( 'title', 'thumbnail' ),
		'hierarchical'        => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'has_archive'         => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'show_in_nav_menus'   => true,
		'menu_position'       => 5,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'paradeportista', $paradeportistas_args );

	/** Eventos */
	$eventos_labels = array(
			'name' => _x( 'Eventos', 'Post Type General Name', 'paradeportes' ),
			'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'paradeportes' ),
			'menu_name'             => _x( 'Eventos', 'Admin Menu text', 'paradeportes' ),
			'name_admin_bar'        => _x( 'Evento', 'Add New on Toolbar', 'paradeportes' ),
			'archives'              => __( 'Evento', 'paradeportes' ),
			'attributes'            => __( 'Evento', 'paradeportes' ),
			'parent_item_colon'     => __( 'Evento', 'paradeportes' ),
			'all_items'             => __( 'Todos los Eventos', 'paradeportes' ),
			'add_new_item'          => __( 'Nuevo Evento', 'paradeportes' ),
			'add_new'               => __( 'Agregar Nuevo', 'paradeportes' ),
			'new_item'              => __( 'Nuevo Evento', 'paradeportes' ),
			'edit_item'             => __( 'Editar Evento', 'paradeportes' ),
			'update_item'           => __( 'Actualizar Evento', 'paradeportes' ),
			'view_item'             => __( 'Ver Evento', 'paradeportes' ),
			'view_items'            => __( 'Ver Eventos', 'paradeportes' ),
			'search_items'          => __( 'Buscar Evento', 'paradeportes' ),
			'not_found'             => __( 'No encontrado', 'paradeportes' ),
			'not_found_in_trash'    => __( 'No encontrado en basura', 'paradeportes' ),
			'featured_image'        => __( 'Imagen Personalizada', 'paradeportes' ),
			'set_featured_image'    => __( 'Agregar Imagen Personalizada', 'paradeportes' ),
			'remove_featured_image' => __( 'Borrar Imagen Personalizada', 'paradeportes' ),
		);

	$eventos_args = array(
		'label'               => __( 'Evento', 'paradeportes' ),
		'description'         => __( 'Eventos', 'paradeportes' ),
		'labels'              => $eventos_labels,
		'menu_icon'           => 'dashicons-calendar-alt',
		'supports'            => array( 'title', 'thumbnail' ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'has_archive'         => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'show_in_nav_menus'   => true,
		'menu_position'       => 5,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'evento', $eventos_args );

}
add_action( 'init', 'paradeportes_register_cpt', 0 );

/**Taxonomies */
function paradeportes_register_taxonomies() {
	// Categoría
	$categoria_label = array(
		'name'              => _x( 'Cateogría', 'taxonomy general name', 'paradeportes' ),
		'singular_name'     => _x( 'Cateogría', 'taxonomy singular name', 'paradeportes' ),
		'search_items'      => __( 'Buscar Cateogrías', 'paradeportes' ),
		'all_items'         => __( 'Todas las Cateogrías', 'paradeportes' ),
		'parent_item'       => __( 'Cateogría Padre', 'paradeportes' ),
		'parent_item_colon' => __( 'Cateogría Padre:', 'paradeportes' ),
		'edit_item'         => __( 'Editar Cateogría', 'paradeportes' ),
		'update_item'       => __( 'Actualizar Cateogría', 'paradeportes' ),
		'add_new_item'      => __( 'Agregar Nueva Cateogría', 'paradeportes' ),
		'new_item_name'     => __( 'Nueva Cateogría', 'paradeportes' ),
		'menu_name'         => __( 'Cateogría', 'paradeportes' ),
	);

	$categoria_args = array(
		'labels'             => $categoria_label,
		'description'        => __( 'Categoría', 'paradeportes' ),
		'hierarchical'       => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_tagcloud'      => true,
		'show_in_quick_edit' => true,
		'show_admin_column'  => false,
		'show_in_rest'       => true,
		'has_archive'        => false,
	);
	register_taxonomy( 'categoria_paradeportista', array( 'paradeportista' ), $categoria_args );

	// Discapacidad.
	$discapacidad_label = array(
		'name'              => _x( 'Discapacidad', 'taxonomy general name', 'paradeportes' ),
		'singular_name'     => _x( 'Discapacidad', 'taxonomy singular name', 'paradeportes' ),
		'search_items'      => __( 'Buscar Discapacidades', 'paradeportes' ),
		'all_items'         => __( 'Todas las Discapacidades', 'paradeportes' ),
		'parent_item'       => __( 'Discapacidad Padre', 'paradeportes' ),
		'parent_item_colon' => __( 'Discapacidad Padre:', 'paradeportes' ),
		'edit_item'         => __( 'Editar Discapacidad', 'paradeportes' ),
		'update_item'       => __( 'Actualizar Discapacidad', 'paradeportes' ),
		'add_new_item'      => __( 'Agregar Nueva Discapacidad', 'paradeportes' ),
		'new_item_name'     => __( 'Nueva Discapacidad', 'paradeportes' ),
		'menu_name'         => __( 'Discapacidad', 'paradeportes' ),
	);

	$discapacidad_args = array(
		'labels'             => $discapacidad_label,
		'description'        => __( 'Discapacidad', 'paradeportes' ),
		'hierarchical'       => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_tagcloud'      => true,
		'show_in_quick_edit' => true,
		'show_admin_column'  => false,
		'show_in_rest'       => true,
		'has_archive'        => false,
	);
	register_taxonomy( 'discapacidad', array( 'paradeportista' ), $discapacidad_args );

	// Nivel
	$nivel_label = array(
		'name'              => _x( 'Nivel', 'taxonomy general name', 'paradeportes' ),
		'singular_name'     => _x( 'Nivel', 'taxonomy singular name', 'paradeportes' ),
		'search_items'      => __( 'Buscar Niveles', 'paradeportes' ),
		'all_items'         => __( 'Todas las Niveles', 'paradeportes' ),
		'parent_item'       => __( 'Nivel Padre', 'paradeportes' ),
		'parent_item_colon' => __( 'Nivel Padre:', 'paradeportes' ),
		'edit_item'         => __( 'Editar Nivel', 'paradeportes' ),
		'update_item'       => __( 'Actualizar Nivel', 'paradeportes' ),
		'add_new_item'      => __( 'Agregar Nuevo Nivel', 'paradeportes' ),
		'new_item_name'     => __( 'Nueva Nivel', 'paradeportes' ),
		'menu_name'         => __( 'Nivel', 'paradeportes' ),
	);

	$nivel_args = array(
		'labels'             => $nivel_label,
		'description'        => __( 'Nivel', 'paradeportes' ),
		'hierarchical'       => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_tagcloud'      => true,
		'show_in_quick_edit' => true,
		'show_admin_column'  => false,
		'show_in_rest'       => true,
		'has_archive'        => false,
	);
	register_taxonomy( 'nivel', array( 'paradeportista' ), $nivel_args );

	// Pais
	$pais_label = array(
		'name'              => _x( 'País', 'taxonomy general name', 'paradeportes' ),
		'singular_name'     => _x( 'País', 'taxonomy singular name', 'paradeportes' ),
		'search_items'      => __( 'Buscar países', 'paradeportes' ),
		'all_items'         => __( 'Todos los países', 'paradeportes' ),
		'parent_item'       => __( 'País Padre', 'paradeportes' ),
		'parent_item_colon' => __( 'País Padre:', 'paradeportes' ),
		'edit_item'         => __( 'Editar país', 'paradeportes' ),
		'update_item'       => __( 'Actualizar país', 'paradeportes' ),
		'add_new_item'      => __( 'Agregar Nuevo país', 'paradeportes' ),
		'new_item_name'     => __( 'Nuevo país', 'paradeportes' ),
		'menu_name'         => __( 'País', 'paradeportes' ),
	);

	$pais_args = array(
		'labels'             => $pais_label,
		'description'        => __( 'Pais', 'paradeportes' ),
		'hierarchical'       => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_tagcloud'      => true,
		'show_in_quick_edit' => true,
		'show_admin_column'  => false,
		'show_in_rest'       => true,
		'has_archive'        => false,
	);
	register_taxonomy( 'pais', array( 'paradeportista' ), $pais_args );

	// Paradeporte
	$paradeporte_label = array(
		'name'              => _x( 'Paradeportes', 'taxonomy general name', 'paradeportes' ),
		'singular_name'     => _x( 'Paradeporte', 'taxonomy singular name', 'paradeportes' ),
		'search_items'      => __( 'Buscar paradeportes', 'paradeportes' ),
		'all_items'         => __( 'Todos los paradeportes', 'paradeportes' ),
		'parent_item'       => __( 'Paradeporte padre', 'paradeportes' ),
		'parent_item_colon' => __( 'Paradeporte padre:', 'paradeportes' ),
		'edit_item'         => __( 'Editar paradeporte', 'paradeportes' ),
		'update_item'       => __( 'Actualizar paradeporte', 'paradeportes' ),
		'add_new_item'      => __( 'Agregar Nuevo paradeporte', 'paradeportes' ),
		'new_item_name'     => __( 'Nuevo paradeporte', 'paradeportes' ),
		'menu_name'         => __( 'Paradeporte', 'paradeportes' ),
	);

	$paradeporte_args = array(
		'labels'             => $paradeporte_label,
		'description'        => __( 'Paradeporte', 'paradeportes' ),
		'hierarchical'       => true,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_tagcloud'      => true,
		'show_in_quick_edit' => true,
		'show_admin_column'  => false,
		'show_in_rest'       => true,
		'has_archive'        => true,
	);
	register_taxonomy( 'paradeporte', array( 'post', 'evento', 'paradeportista' ), $paradeporte_args );
}
add_action( 'init', 'paradeportes_register_taxonomies' );
