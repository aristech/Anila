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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title>
        <?php  bloginfo( 'name' ); wp_title(); ?>
    </title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if( is_singular() && pings_open( get_queried_object() ) ):?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <!--Mainmenu-area-->
    <header class="header">
        <div class="mainmenu-area <?php get_option( 'sticky' ) == ('1') ? print('sticky') : print('') ;?>" >
            <div class="container-fluid">
                <div class="navbar navbar-expand-lg navbar-dark pt-0" data-spy="affix" data-offset-top="100">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php 
                        wp_nav_menu( array(
                            'theme_location'    =>  'primary',
                            'container'         =>  'nav',
                            'container_class'   =>  'collapse navbar-collapse',
                            'container_id'      =>  'primary-menu',
                            'menu_class'        =>  'navbar-nav mr-auto',
                            'walker'            =>  new Walker_Nav_Primary()
                            

                        ) )

                    ?>
                    <a class="navbar-brand mx-auto text-center" href="<?php echo get_site_url(); ?>">
                        <?php if ( ! empty ( get_option( 'logo' ) )) { ?>

                            <img class="img-fluid" style="max-width: <?php echo get_option( 'logosize' ); ?>" src="<?php echo get_option( 'logo' ); ?>" alt="logo">

                                <?php } else {

                                    bloginfo();

                            } ?>
                        
                    </a>
                        </div>
            </div>
            <!--Mainmenu-area/-->
        </div>
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="container-fluid fixed-height px-0" src="<?php echo get_template_directory_uri() . '/assets/1.jpg' ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hello From</h5>
                        <p>the other</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="container-fluid px-0" src="<?php echo get_template_directory_uri() . '/assets/2.jpg' ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hello From</h5>
                        <p>the other</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="container-fluid px-0" src="<?php echo get_template_directory_uri() . '/assets/3.jpg' ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hello From</h5>
                        <p>the other</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>