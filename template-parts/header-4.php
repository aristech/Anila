<?php
/**
 * @package Anila
 *
 */
 
/* ========================
 * Header Template Page 
 * ========================
 */
?>
<?php get_option( 'anila_activate_sidebar' ) == ('1') ? $withSide = 'with-side' : $withSide = '' ;?>
<?php get_option( 'anila_shade_menu' ) == ('1') ? $shade = 'light' : $shade = 'dark' ;?>
<?php get_option( 'anila_sticky' ) == ('1') ? $sticky = 'sticky' : $sticky =  '' ;?>
<div class="mainmenu-area">
    <div class="container-fluid">
        <nav class="navbar sticky-top navbar-dark pt-0" data-spy="affix" data-offset-top="100">
            <a class="navbar-brand mr-auto" href="<?php echo get_site_url(); ?>">
                <?php if ( ! empty ( get_option( 'logo' ) )) { ?>

                <img class="img-fluid" style="max-width: <?php echo get_option( 'logosize' ); ?>" src="<?php echo get_option( 'logo' ); ?>"
                    alt="logo">

                <?php } else {

                                    bloginfo();

                            } ?>

            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <?php 
                wp_nav_menu( array(
                    'theme_location'    =>  'primary',
                    'container'         =>  'nav',
                    'container_class'   =>  'collapse navbar-collapse',
                    'container_id'      =>  'primary-menu',
                    'menu_class'        =>  'navbar-nav header4 ml-auto',
                    'walker'            =>  new Walker_Nav_Primary()
                    

                ) )

            ?>

        </nav>
    </div>
    <!--Mainmenu-area/-->
</div>