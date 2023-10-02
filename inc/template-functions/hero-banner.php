<?php
function paradeportes_hero_banner($bg_img, $content){
    if (!$bg_img){
        ?>
        <style>
            .pd-hero-banner__wrapper::after{
                opacity: 1;
            }
        </style>
        <?php
    }
    ?>
    <div class="pd-hero-banner__wrapper" style="background-image: url('<?php echo $bg_img; ?>');">
        <div class="container">
            <div class="row pd-hero-banner__row">
                <div class="col-12">
                    <h1 class="text-white"><?php echo $content; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php
}