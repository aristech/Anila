<?php
/**
 * @package Anila
 *
 */


namespace Inc\functions;

/* ================================
 * Ajax Configuration Page
 * =================================
 */
class Ajax
{
    //private $adm;
    function __construct(){
        //$this   ->  themeUri            =   get_template_directory_uri();
    }
    public function anila_save_contact() {

    $checkin = wp_strip_all_tags($_POST["checkin"]);
    $checkout = wp_strip_all_tags($_POST["checkout"]);
    $title = wp_strip_all_tags($_POST["name"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$message = wp_strip_all_tags($_POST["message"]);
	$args = array(
		'post_title' => $title,
		'post_content' => $message,
		'post_author' => 1,
		'post_status' => 'publish',
		'post_type' => 'anila_contact',
		'meta_input' => array(
			'_contact_email_value_key' => $email,
            '_contact_checkin_value_key' => $checkin,
            '_contact_checkout_value_key' => $checkout,
		)
	);
	$postID = wp_insert_post( $args );
	echo $postID;
	die();

    }

}