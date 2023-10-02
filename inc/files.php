<?php
/**Enqueue Theme Files */
function paradeportes_enqueue_files(){
    //Theme Styles
    wp_enqueue_style('paradeportes_styles', PLUGIN_URL.'dist/css/app.css', null, '1.0');
    //Theme Scripts
    wp_enqueue_script('paradeportes_scripts', PLUGIN_URL.'dist/js/app.js', null, '1.0', true);

}
add_action('wp_enqueue_scripts', 'paradeportes_enqueue_files');