<?php get_header(); 
/** Variables */
$bg_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$fecha = get_field('fecha');
$content = get_the_title().'<br>'.'<p class="h3">'.$fecha.'</p>';
$descripcion = get_field('descripcion');
$videos = get_field('videos');
$fotos = get_field('fotos');
?>

<!--Hero Banner--> 
<?php paradeportes_hero_banner('', $content); ?>

<!--Description--> 
<div class="container">
    <div class="row">
        <div class="col-12 pd-evento__card my-5 shadow">
            <?php echo $descripcion;?>
        </div>
    </div>
</div>

<!--Videos--> 
<?php 
    if ($videos){
        ?>
        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <?php 
                    if (sizeof($videos) < 2){
                        echo '<h2>Video</h2>';
                    }else{
                        echo '<h2>Videos</h2>';
                    }
                    ?>
                </div>
                <?php 
                foreach ($videos as $video){
                    ?>
                    <div class="col-lg-6 my-3 pd-evento__video">
                        <?php echo $video['video_url']; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
?>

<!--Fotos--> 
<?php 
    if ($fotos){
        ?>
        <div class="bg-white">
            <div class="container p-5 ">
                <div class="row g-4 justify-content-center">
                    <div class="col-12">
                        <h2 class="text-center">Galería de fotos</h2>
                    </div>
                    <div class="col-lg-8">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-inner">
                                <?php 
                                $active = 'active';
                                    foreach($fotos as $foto){
                                        ?>
                                        <div class="carousel-item <?php echo $active;?>">
                                            <?php 
                                                echo wp_get_attachment_image( 
                                                    $foto, 
                                                    'full', 
                                                    false, 
                                                    array(
                                                        'class' =>  'pd-evento__fotos'
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <?php
                                        $active = '';
                                    }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
?>

<?php get_footer();