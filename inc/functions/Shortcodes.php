<?php
/**
 * @package Anila
 *
 */

/* ========================
 * Shortcodes Configuration Page
 * ========================
 */

namespace Inc\functions;

/* ================================
 * Shortcodes Configuration Page
 * =================================
 */
use Inc\templates\BookingForm;
class Shortcodes
{
    //private $adm;
    function __construct(){
        $this   ->  booking             =   new BookingForm;
        //$this   ->  themeUri            =   get_template_directory_uri();
    }
    public function booking_form( $atts ) {

        $atts = shortcode_atts (
            array(),
            $atts,
            'booking_form'
        );

        return $this->booking->form();

    }

}