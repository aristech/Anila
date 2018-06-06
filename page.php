<?php
/**
 * @package Anila
 *
 */

/* ========================
 * Index Template Page
 * ========================
 */

if ( ! empty ( get_option( 'anila_header_type' ) )) {

    get_header( key( get_option( 'anila_header_type' )) );

   } else {

    get_header();

   }
 ?>
<?php
        if (have_posts()):

            while (have_posts()) : the_post(); ?>


<div id="primary" class="content-area" style="background-image:url(<?php echo get_template_directory_uri() . '/assets/images/noise.png' ?>)">
    <main id="main" class="site-main <?php get_option( 'anila_activate_sidebar' ) == ('1') ? print('with-side') : print('') ;?>" role "main">
        <div class="container">


            <?php
                get_template_part( 'template-parts/content', 'page' );

            endwhile;

        endif;
        ?>

        </div>
    </main>
</div>

<?php get_footer(); ?>