<?php
/**
 * @package Anila
 *
 */

 namespace Inc\settings;

/* ================================
 * Enqueue Admin Configuration Page
 * =================================
 */

class EnqueueAdmin
{
    //private $adm;
    function __construct(){
        $this   ->  themeUri            =   get_template_directory_uri();
    }
    public function enqueueAdmin($hook) {
        //echo $hook;

        wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
        wp_enqueue_style( 'jquery-ui' );
        wp_enqueue_script( 'jquery-ui-datepicker', array( 'jquery' ), '', true );
        wp_register_script( 'admin-scripts', $this->themeUri . '/assets/min/js/admin.min.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'admin-scripts' );
        if ( ('toplevel_page_anila' != $hook)
            && ('anila_page_anila_sidebar' != $hook)
            && ('anila_page_anila_css' != $hook )
            && ('anila_page_anila_contact' != $hook )
            && ('anila_page_anila_slider' != $hook )  )
        {
            return;
        }
        wp_register_style( 'admin', $this->themeUri . '/assets/min/css/admin.min.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'admin' );

        wp_enqueue_media();

        wp_enqueue_script( 'ace', $this->themeUri . '/assets/js/ace/src-min-noconflict/ace.js', array('jquery'), '26.03.18', true );


    }

}
