<?php
/** Variables */

    $whatsapp_on = get_field('activar_whatsapp', 'options');
    $whatsapp_url = get_field('whatsapp_url', 'options');
    $whatsapp_img = get_field('whatsapp_img', 'options');
    if ($whatsapp_on && $whatsapp_url && $whatsapp_img && !is_admin()){
        ?>
            <a class="pd-btn__whatsapp" href="<?php echo esc_url($whatsapp_url);?>" alt="mandar mensaje por whatsapp">
                <?php
                echo wp_get_attachment_image( 
                    $whatsapp_img, 
                    'thumbnail', 
                    true, 
                );
                ?>
            </a>
        <?php
    }
