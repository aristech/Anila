<?php
/**
 * @package Anila
 *
 */

/* ========================
 * Jumbotron Template Page
 * ========================
 */
?>
<?php get_option( 'anila_activate_sidebar' ) == ('1') ? $withSide = 'with-side' : $withSide = '' ;?>
<div class="jumbotron jumbotron-fluid table <?php echo $withSide ;?>" style="<?php $withSide ? print 'background-size: calc(100% - 6rem);' : print ''; ?> background-image: url(<?php has_post_thumbnail() ? the_post_thumbnail_url() : print get_option( 'anila_header_image' ) ;  ?>)" data-type="background" data-speed="2">
    <div class="container table-cell">
        <h1 class="display-3 text-uppercase text-center" data-type="content">
        <?php get_option( 'anila_header_title' ) ? print get_the_title(get_post_thumbnail_id()) : print the_title(); ?>
        </h1>
    </div>


</div>