<?php
/**Register Custom Post Types */
    function paradeportes_register_cpt() {
        /**Eventos */
        $eventos_labels = array(
                'name' => _x( 'Eventos', 'Post Type General Name', 'paradeportes' ),
                'singular_name' => _x( 'Evento', 'Post Type Singular Name', 'paradeportes' ),
                'menu_name' => _x( 'Eventos', 'Admin Menu text', 'paradeportes' ),
                'name_admin_bar' => _x( 'Evento', 'Add New on Toolbar', 'paradeportes' ),
                'archives' => __( 'Evento', 'paradeportes' ),
                'attributes' => __( 'Evento', 'paradeportes' ),
                'parent_item_colon' => __( 'Evento', 'paradeportes' ),
                'all_items' => __( 'Todos los Eventos', 'paradeportes' ),
                'add_new_item' => __( 'Nuevo Evento', 'paradeportes' ),
                'add_new' => __( 'Agregar Nuevo', 'paradeportes' ),
                'new_item' => __( 'Nuevo Evento', 'paradeportes' ),
                'edit_item' => __( 'Editar Evento', 'paradeportes' ),
                'update_item' => __( 'Actualizar Evento', 'paradeportes' ),
                'view_item' => __( 'Ver Evento', 'paradeportes' ),
                'view_items' => __( 'Ver Eventos', 'paradeportes' ),
                'search_items' => __( 'Buscar Evento', 'paradeportes' ),
                'not_found' => __( 'No encontrado', 'paradeportes' ),
                'not_found_in_trash' => __( 'No encontrado en basura', 'paradeportes' ),
                'featured_image' => __( 'Imagen Personalizada', 'paradeportes' ),
                'set_featured_image' => __( 'Agregar Imagen Personalizada', 'paradeportes' ),
                'remove_featured_image' => __( 'Borrar Imagen Personalizada', 'paradeportes' ),
            );
            
            $eventos_args = array(
                'label' => __( 'Evento', 'paradeportes' ),
                'description' => __( 'Eventos', 'paradeportes' ),
                'labels' => $eventos_labels,
                'menu_icon' => 'dashicons-calendar-alt',
                'supports' => array('title', 'thumbnail'),
                'taxonomies' => array(),
                'hierarchical' => false,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'has_archive' => true,
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_admin_bar' => true,
                'can_export' => true,
                'show_in_nav_menus' => true,
                'menu_position' => 5,
                'capability_type' => 'post',
                'show_in_rest' => false,
            );
            
            register_post_type( 'evento', $eventos_args );

    }
    add_action( 'init', 'paradeportes_register_cpt', 0 );

/**Taxonomies */
    function paradeportes_register_taxonomies() {
        $labels = array(
            'name'              => _x( 'Deportes', 'taxonomy general name', 'paradeportes' ),
            'singular_name'     => _x( 'Deporte', 'taxonomy singular name', 'paradeportes' ),
            'search_items'      => __( 'Buscar Deportes', 'paradeportes' ),
            'all_items'         => __( 'Todos los Deportes', 'paradeportes' ),
            'parent_item'       => __( 'Parent Deporte', 'paradeportes' ),
            'parent_item_colon' => __( 'Parent Deporte:', 'paradeportes' ),
            'edit_item'         => __( 'Editar Deporte', 'paradeportes' ),
            'update_item'       => __( 'Actualizar Deporte', 'paradeportes' ),
            'add_new_item'      => __( 'Agregar Nuevo Deporte', 'paradeportes' ),
            'new_item_name'     => __( 'Nuevo Deporte Name', 'paradeportes' ),
            'menu_name'         => __( 'Deporte', 'paradeportes' ),
        );
        
        $args = array(
            'labels' => $labels,
            'description' => __( 'Deportes', 'paradeportes' ),
            'hierarchical' => false,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => false,
            'show_in_rest' => false,
            'has_archive'   =>  true,
        );
        register_taxonomy( 'deporte', array('post','evento'), $args );

    }
    add_action( 'init', 'paradeportes_register_taxonomies' );

/**Set Template Paths */    
    /** Single Templates */
        function paradeportes_single_templates($single) {
            global $post;
            /** Evento Single */
            if ( $post->post_type == 'evento' ) {
                if ( file_exists( PLUGIN_PATH . '/template-parts/single/single-evento.php' ) ) {
                    return PLUGIN_PATH . '/template-parts/single/single-evento.php';
                }
            }
            return $single;
        }

        add_filter('single_template', 'paradeportes_single_templates');

    /** Archive Templates */

    function paradeportes_archive_templates($archive){
        global $post;
        /** Deporte Tax Single */
        if(is_tax( 'deporte' )){
          //  return PLUGIN_PATH . '/template-parts/archives/archive-deporte.php';
        }

        /** Deporte Tax Single */
        if(is_archive( 'deporte' )){
           // return PLUGIN_PATH . '/template-parts/archives/archive-deporte.php';
        }

        /** Evento Archive */
        if( $post->post_type == 'evento'){
            if (file_exists( PLUGIN_PATH. '/template-parts/archives/archive-evento.php')){
                return PLUGIN_PATH. '/template-parts/archives/archive-evento.php';
            }
        }
        return $archive;
    }

    add_filter('archive_template', 'paradeportes_archive_templates');