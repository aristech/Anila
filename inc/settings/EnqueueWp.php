<?php
/**
 * @package Anila
 *
 */
 
/* ========================
 * Enqueue Wp Configuration Page 
 * ========================
 */

namespace Inc\settings;
 
/* ================================
 * Enqueue Front Configuration Page  
 * =================================
 */

class EnqueueWp 
{
    //private $adm;
    function __construct(){
        $this   ->  themeUri            =   get_template_directory_uri();
    }
    public function enqueueWp() {
        
        wp_enqueue_style( 'bootstrap', $this->themeUri . '/assets/min/css/bootstrap.min.css', array(), '4.1.1', 'all' );
        wp_enqueue_style( 'alegreya', 'https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,700&amp;subset=greek');
        wp_enqueue_style( 'anila', $this->themeUri . '/assets/min/css/anila.min.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'slick-css', $this->themeUri . '/assets/js/slick/slick.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'style', $this->themeUri . '/style.css', array(), '1.0.0', 'all' );

        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', $this->themeUri . '/assets/min/js/jquery.min.js', array(), '3.3.1', true );
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'bootstrap', $this->themeUri . '/assets/min/js/bootstrap.min.js', array('jquery'), '4.1.1', true );
        wp_enqueue_script( 'popper', $this->themeUri . '/assets/min/js/popper.min.js', array('jquery'), '1.14.3', true );
        wp_enqueue_script( 'slick-js', $this->themeUri . '/assets/js/slick/slick.min.js', array('jquery'), '1.9.0', true );
        wp_enqueue_script( 'anila_script', $this->themeUri . '/assets/min/js/anila_script.min.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'simple-svg', '//code.simplesvg.com/1/1.0.0-beta5/simple-svg.min.js', array(), '1.0.0', true );

    }
    
} 
       
    