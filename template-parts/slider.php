<?php
/**
 * @package Anila
 *
 */

/* ========================
 * Main Slider Template Page
 * ========================
 */
?>
<div class="slider <?php echo $withSide ;?>">

    <div class="Kenburns">

        <div class="home-slider">
        <?php $sliderItems = explode(",",get_option( 'anila_sliderimage' ));?>
        <?php foreach ($sliderItems as $sl ) { ?>

            <div class="slider-item">
                <div class="slider-img" style="background-image:url('<?php echo wp_get_attachment_url( $sl ) ?>');"></div>
                <div class="table">
                    <div class="table-cell">
                        <h1 class="slider-title text-uppercase text-center">
                            <?php print get_the_title($sl); ?>
                        </h1>
                        <p class="slider-subtitle lead text-center"><?php echo wp_get_attachment_caption( $sl ) ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>

        </div>
        <div class="slider-controls">
            <span class="simple-svg s-control slick-prev" data-icon="typcn-arrow-up-outline" data-inline="false"></span>
            <span class="simple-svg s-control slick-next" data-icon="typcn-arrow-down-outline" data-inline="false"></span>
        </div>
    </div>

</div>