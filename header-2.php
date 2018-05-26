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
                <nav class="navbar navbar-expand-lg navbar-dark pt-0" data-spy="affix" data-offset-top="100">
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
                            'menu_class'        =>  'navbar-nav',
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
                    <?php 
                        wp_nav_menu( array(
                            'theme_location'    =>  'secondary',
                            'container'         =>  'nav',
                            'container_class'   =>  'navbar-collapse',
                            'container_id'      =>  'secondary-menu',
                            'menu_class'        =>  'navbar-nav ml-auto right-navbar',
                            'walker'            =>  new Walker_Nav_Primary()
                            

                        ) )

                    ?>

                </nav>
            </div>
            <!--Mainmenu-area/-->
            </div>
        <div class="sidebar">
            <div class="sidebar-wrapper container-fluid">
                <div class="row">
                    <col>
                        <a class="navbar-brand mx-auto text-center" href="<?php echo get_site_url(); ?>">
                            <?php if ( ! empty ( get_option( 'logo' ) )) { ?>

                            <img class="img-fluid" style="max-width: <?php echo get_option( 'logosize' ); ?>" src="<?php echo get_option( 'logo' ); ?>"
                                alt="logo">

                            <?php } else {

                                        bloginfo();

                                } ?>

                        </a>
                    </col>
                    <col>
                    
                    </col>
                </div>
            </div>
            <div class="sidebar-button">
                <button class="hamburger hamburger--spin" id="hamburger" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
            <div class="sidebar-contact">
                <div class="side-elements text-uppercase">
                <p class="lead mx-2 side-el-email">
                        me@email
                        </p>
                    <p class="lead mx-2 side-el-phone">
                        +1234567890
                    </span>
                </p>
                </div>
            </div>
        </div>
        <div class="jumbotron jumbotron-fluid table" style="background-image: url(<?php has_post_thumbnail() ? the_post_thumbnail_url() : print get_option( 'anila_header_image' ) ;  ?>)"
            data-type="background" data-speed="2">
            <div class="container table-cell">
                <h1 class="display-1 text-uppercase text-center" data-type="content">
                    <?php get_option( 'anila_header_title' ) ? print get_the_title(get_post_thumbnail_id()) : print the_title(); ?>
                </h1>
            </div>
        </div>
    </header>