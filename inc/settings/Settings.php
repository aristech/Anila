<?php
/**
 * @package Anila
 *
 */

 namespace Inc\Settings;

/* ========================
 * Settings
 * ========================
 */

class Settings
{


    function __construct(){

        $this   ->  themeUri            =   get_template_directory_uri();
        $this   ->  theme               =   get_template_directory();
        $this   ->  logo                =   get_option( 'anila_logo' );
        $this   ->  logosize            =   get_option( 'anila_logosize' );
        $this   ->  slider              =   get_option( 'anila_activate_slider' );
        $this   ->  sliderimage         =   get_option( 'anila_sliderimage' );
        $this   ->  header_image        =   get_option( 'anila_header_image' );
        $this   ->  header_title        =   get_option( 'anila_header_title' );
        $this   ->  sticky              =   get_option( 'anila_sticky' );
        $this   ->  shade               =   get_option( 'anila_shade_menu' );
        $this   ->  sidebar             =   get_option( 'anila_activate_sidebar' );
        $this   ->  profile_pic         =   get_option( 'anila_profile_picture' );
        $this   ->  title               =   esc_attr( get_option( 'anila_title' ) );
        $this   ->  description         =   esc_attr( get_option( 'anila_description' ) );
        $this   ->  socials             =   array(
                            'twitter'   => esc_attr( get_option( 'anila_twitter' ) ),
                            'facebook'  => esc_attr( get_option( 'anila_facebook' ) ),
                            'google'    => esc_attr( get_option( 'anila_google' ) ),
                        );

        $this   ->  contact             =   get_option( 'anila_activate_contact' );
        $this   ->  header              =   get_option( 'anila_header_type' );

    }
    public function settings() {
        //echo $hook;
        register_setting( 'anila-settings-group', 'anila_header_type');
        register_setting( 'anila-settings-group', 'anila_logo');
        register_setting( 'anila-settings-group', 'anila_logosize', array( $this, 'validate' ));
        register_setting( 'anila-settings-group', 'anila_sticky');
        register_setting( 'anila-settings-group', 'anila_shade_menu');
        register_setting( 'anila-settings-group', 'anila_header_image');
        register_setting( 'anila-settings-group', 'anila_header_title');

        add_settings_section( 'anila_general_settings', '', '', 'anila' );


        add_settings_field( 'header_type', 'Select Header', array($this, 'header_type'), 'anila', 'anila_general_settings' );
        add_settings_field( 'logo-main', 'Add Logo', array($this, 'logo'), 'anila', 'anila_general_settings' );
        add_settings_field( 'sticky-menu', 'Sticky Menu', array($this, 'sticky'), 'anila', 'anila_general_settings' );
        add_settings_field( 'shade-menu', 'Light or Dark Menu', array($this, 'shade'), 'anila', 'anila_general_settings' );
        add_settings_field( 'header-image', 'Global Header Image', array($this, 'header_image'), 'anila', 'anila_general_settings' );
        add_settings_field( 'header-title', 'Header Title', array($this, 'header_title'), 'anila', 'anila_general_settings' );




        //Contact Form Options
        register_setting( 'anila-contact-group', 'anila_activate_contact' );
        register_setting( 'anila-calendar-group', 'anila_calendar' );

        add_settings_section( 'contact-section', '', '', 'anila_contact' );
        add_settings_section( 'calendar-section', 'Calendar', '', 'anila_contact' );

        add_settings_field( 'activate-form', 'Add or remove custom contact form', array($this, 'activate_contact'), 'anila_contact', 'contact-section' );
        add_settings_field( 'calendar-area', 'Booking visualisation', array($this, 'calendar_callback'), 'anila_contact', 'contact-section' );



        //Sidebar Options
        register_setting( 'anila-sidebar-group', 'anila_activate_sidebar' );
        register_setting( 'anila-sidebar-group', 'anila_profile_picture' );
        register_setting( 'anila-sidebar-group', 'anila_title' );
        register_setting( 'anila-sidebar-group', 'anila_description' );
        register_setting( 'anila-sidebar-group', 'anila_twitter', array( $this, 'sanitize' ));
        register_setting( 'anila-sidebar-group', 'anila_facebook', array( $this, 'sanitize' ));
        register_setting( 'anila-sidebar-group', 'anila_google', array( $this, 'sanitize' ));


        add_settings_section( 'anila_sidebar_settings', 'Sidebar Options', '', 'anila_sidebar' );


        add_settings_field( 'activate-sidebar', 'Activate Sidebar', array($this, 'activate_sidebar'), 'anila_sidebar', 'anila_sidebar_settings');
        add_settings_field( 'profile-picture', 'Picture', array($this, 'profile_picture'), 'anila_sidebar', 'anila_sidebar_settings');
        add_settings_field( 'sidebar-name', 'Text', array($this, 'sidebar_name'), 'anila_sidebar', 'anila_sidebar_settings');
        add_settings_field( 'sidebar-socials', 'Socials', array($this, 'social_settings'), 'anila_sidebar', 'anila_sidebar_settings' );




        //Slider Options
        register_setting( 'anila-slider-group', 'anila_activate_slider' );
        register_setting( 'anila-slider-group', 'anila_sliderimage' );
        register_setting( 'anila-slider-group', 'anila_slidertitle' );
        register_setting( 'anila-slider-group', 'anila_slidersubtitle' );

        add_settings_section( 'anila_slider_settings', 'Slider Options', '', 'anila_slider' );
        add_settings_section( 'anila_slider_content', 'Slider Contents', '', 'anila_slider' );

        add_settings_field( 'activate-slider', 'Activate Slider', array($this, 'activate_slider'), 'anila_slider', 'anila_slider_settings');
        add_settings_field( 'items-slider', 'Slider Images', array($this, 'slider_content'), 'anila_slider', 'anila_slider_content');

        //add_settings_field( 'header-image', 'Global Header Image', array($this, 'header_image'), 'anila', 'anila_slider_content' );

        //CSS Options
        register_setting( 'anila-css-group', 'anila_css', array($this, 'sanitize_css') );

        add_settings_section( 'custom-css-section', 'Custom Css', '', 'anila_css' );

        add_settings_field( 'custom-css', 'Insert Your own css', array($this, 'custom_css_field_callback'), 'anila_css', 'custom-css-section' );


    }

    /*  ======================
        Theme Options Settings
        ======================
    */


    function header_type()
    {

        $formats = array( '1', '2', '3', '4' );
        $output = '';
        foreach ( $formats as $format ){
            //echo $format;
            $checked = ( @$this->header[$format] == 1 ? 'checked' : '' );
            $output .= '<input type="checkbox" class="ios8-switch chb" id="'.$format.'" name="anila_header_type['.$format.']" value="1" '.$checked.' /> <label for="'.$format.'">header '.$format.'</label><br><img style="max-width: 350px;margin-bottom:20px" src="'. $this->themeUri . '/assets/images/header'.$format.'.svg"><br>';
        }
        echo $output;
    }

    function logo()
    {
        if (!empty($this->logo)) {
            echo '<div class="add-logo-picture"><div><input type="button" class="button button-secondary btn-upload" value="Upload" id="upload-button" /><input type="button" class="button button-secondary btn-remove" value="&times;" id="remove-picture" /><input type="hidden" id="profile-picture" name="anila_logo" value="'. $this->logo .'"/></div><input class="text" type="number" name="anila_logosize" placeholder="Logo size 1% ~ 100%" value="'. filter_var($this->logosize , FILTER_SANITIZE_NUMBER_INT).'"/><img id="logo-prev" style="max-width: '. $this->logosize .';" src="'.$this->logo.'" ></div>';
        } else {
            echo '<input type="button" class="button button-secondary btn-upload" value="Upload" id="upload-button" /><input type="hidden" id="profile-picture" name="anila_logo" value="'. $this->logo .'"/>';
        }
    }

    function validate($input){
        $output = $input;
        $output .= '%';
        return $output;
    }
    function sticky()
    {
        $checked = ( @$this->sticky == 1 ? 'checked' : '' );
        echo '<input type="checkbox" class="ios8-switch" id="sticky" name="anila_sticky" value="1" '.$checked.' /> <label for="sticky">Sticky Menu</label>';
    }

    function shade()
    {
        $checked = ( @$this->shade == 1 ? 'checked' : '' );
        $name = ( @$this->shade == 1 ? 'Dark Menu' : 'Light Menu' );
        echo '<input type="checkbox" class="ios8-switch" id="shade" name="anila_shade_menu" value="1" '.$checked.' /> <label for="shade">'.$name.'</label>';
    }

    function header_image()
    {
        if (!empty($this->header_image)) {
            echo '<div class="add-header-image"><div><input type="button" class="button button-secondary btn-upload" value="Upload" id="upload-button-image" /><input type="button" class="button button-secondary btn-remove" value="&times;" id="remove-header-image" /><input type="hidden" id="header-image" name="anila_header_image" value="'. $this->header_image .'"/><img id="header-image-prev" style="max-width:200px" src="'.$this->header_image.'" ></div>';
        } else {
            echo '<input type="button" class="button button-secondary btn-upload" value="Upload" id="upload-button-image" /><input type="hidden" id="header-image" name="anila_header_image" value="'. $this->header_image .'"/>';
        }

    }

    function header_title()
    {
        $checked = ( @$this->header_title == 1 ? 'checked' : '' );
        echo '<label> Post / Page Title </label><input type="checkbox" class="ios8-switch" id="header_title" name="anila_header_title" value="1" '.$checked.' /> <label for="header_title">Image Title</label>';

    }



/*  ======================
    Theme Options Contact
    ======================
 */



function set_contact_columns( $columns )
{
    $newColumns =   array(
        'title'     =>  'Name',
        'message'   =>  'Message',
        'checkin'   =>  'Check In',
        'checkout'  =>  'Check Out',
        'adults'    =>  'Adults',
        'children'  =>  'Children',
        'email'     =>  'Email',
        'date'      =>  'Date',

    );
    return $newColumns;

}
function contact_custom_column($column, $post_id)
{
    switch($column){
        case 'message' :
            echo get_the_excerpt();
            break;

        case 'email':
            echo get_post_meta( $post_id, '_contact_email_value_key', true );
            break;

        case 'checkin':
            echo get_post_meta( $post_id, '_contact_checkin_value_key', true );
            break;

        case 'checkout':
            echo get_post_meta( $post_id, '_contact_checkout_value_key', true );
            break;

        case 'adults':
            echo get_post_meta( $post_id, '_contact_adults_value_key', true );
            break;

        case 'children':
            echo get_post_meta( $post_id, '_contact_children_value_key', true );
            break;
    }
}

/* CONTACT METABOX */

function contact_add_metabox()
{
    add_meta_box( 'contact_email', 'User email', array($this,'contact_email_callback'), 'anila_contact', 'normal', 'high' );
    add_meta_box( 'contact_checkin', 'Check In Date', array($this,'contact_checkin_callback'), 'anila_contact', 'normal', 'high' );
    add_meta_box( 'contact_checkout', 'Check Out Date', array($this,'contact_checkout_callback'), 'anila_contact', 'normal', 'high' );
    add_meta_box( 'contact_adults', 'Adults', array($this,'contact_adults_callback'), 'anila_contact', 'normal', 'high' );
    add_meta_box( 'contact_children', 'Children', array($this,'contact_children_callback'), 'anila_contact', 'normal', 'high' );
}

function contact_email_callback($post)
{
    wp_nonce_field( 'anila_save_email_data', 'anila_contact_email_meta_box_nonce' );
    $value = get_post_meta( $post->ID, '_contact_email_value_key', true );
    //var_dump(get_post_meta($post->ID));
    echo '<label for="anila_contact_email_field"> User Email Address: </label>';
    echo '<input class="regular-text" type="email" id="anila_contact_email_field" name="anila_contact_email_field" value="'.esc_attr( $value ).'" size="25"/>';
}

function contact_checkin_callback($post)
{
    wp_nonce_field( 'anila_save_checkin_data', 'anila_contact_checkin_meta_box_nonce' );
    $value = get_post_meta( $post->ID, '_contact_checkin_value_key', true );
    //var_dump(get_post_meta($post->ID));
    echo '<label for="checkin-picker"> User Checkin Date: </label>';
    echo '<input type="text" id="checkin-picker" name="anila_contact_checkin_field" value="'.esc_attr( $value ).'" size="25"/>';
}

function contact_checkout_callback($post)
{
    wp_nonce_field( 'anila_save_checkout_data', 'anila_contact_checkout_meta_box_nonce' );
    $value = get_post_meta( $post->ID, '_contact_checkout_value_key', true );
    //var_dump(get_post_meta($post->ID));
    echo '<label for="checkout-picker"> User Checkout Date: </label>';
    echo '<input type="text" id="checkout-picker" name="anila_contact_checkout_field" placeholder="dd mmm yyyy" value="'.esc_attr( $value ).'" size="25"/>';
}

function contact_adults_callback($post)
{
    wp_nonce_field( 'anila_save_adults_data', 'anila_contact_adults_meta_box_nonce' );
    $value = get_post_meta( $post->ID, '_contact_adults_value_key', true );
    //var_dump(get_post_meta($post->ID));
    echo '<label for="checkout-picker"> Adults: </label>';
    echo '<input type="number" id="adults" name="anila_contact_adults_field" value="'.esc_attr( $value ).'"';
}

function contact_children_callback($post)
{
    wp_nonce_field( 'anila_save_children_data', 'anila_contact_children_meta_box_nonce' );
    $value = get_post_meta( $post->ID, '_contact_children_value_key', true );
    //var_dump(get_post_meta($post->ID));
    echo '<label for="checkout-picker"> Children: </label>';
    echo '<input type="number" id="children" name="anila_contact_children_field" value="'.esc_attr( $value ).'"';
}

function anila_save_email_data($post_id)
{
    $metaBoxes = array( 'email', 'checkin', 'checkout', 'adults', 'children' );

    foreach ($metaBoxes as $meta) {
        if( !isset( $_POST['anila_contact_'.$meta.'_meta_box_nonce'])){
            return;
        }
        if(! wp_verify_nonce( $_POST['anila_contact_'.$meta.'_meta_box_nonce'], 'anila_save_'.$meta.'_data' )){
            return;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
           return;
        }
        if (!current_user_can( 'edit_post', $post_id )) {
            return;
        }
        if (! isset( $_POST['anila_contact_'.$meta.'_field'])) {
            return;
        }

        $data = sanitize_text_field( $_POST['anila_contact_'.$meta.'_field'] );
        update_post_meta( $post_id, '_contact_'.$meta.'_value_key', $data );
    }


}

function activate_contact()
{
    $checked = ( @$this->contact == 1 ? 'checked' : '');
    echo '<input type="checkbox" class="ios8-switch" id="activate_contact" name="anila_activate_contact" value="1" '.$checked.' /><label for="activate_contact">Activate Mesages Plugin</label>';
}

function calendar_callback()
{
    if (@$this->contact == 1) {
        echo '<div id="calendar" style="display: inline-block;"></div>';
    }
}

function contact_cpt(){
    $labels = array(
        'name'              =>  'Messages',
        'singular_name'     =>  'Message',
        'menu_name'         =>  'Messages',
        'name_admin_bar'    =>  'Message',

    );

    $args = array(
        'labels'            =>  $labels,
        'show_ui'           =>  true,
        'show_in_menu'      =>  true,
        'show_in_rest'      =>  true,
        'view_item'         =>  true,
        'capability_type'   =>  'post',
        'hierarchical'      =>  false,
        'menu_position'     =>  26,
        'supports'          =>  array( 'title', 'editor', 'author' ),
        'menu_icon'         =>  'dashicons-email',
    );
    register_post_type( 'anila_contact', $args );
}



/*  ======================
    Theme Options Sidebar
    ======================
 */

function activate_sidebar()
{
    $checked = ( @$this->sidebar == 1 ? 'checked' : '');
    echo '<input type="checkbox" class="ios8-switch" id="activate_sidebar" name="anila_activate_sidebar" value="1" '.$checked.' /><label for="activate_sidebar">Activate Sidebar</label>';
}

function sidebar_options()
{
    require_once $this->theme . '/inc/adminPages/sidebar-options.php';
}

function profile_picture()
{
    if (!empty($this->profile_pic)) {
        echo '<input type="button" class="button button-secondary btn-upload" value="Upload" id="upload-button" /><input type="button" class="button button-secondary btn-remove" value="&times;" id="remove-picture" /><input type="hidden" id="profile-picture" name="anila_profile_picture" value="'. $this->profile_pic .'"/>';
    } else {
        echo '<input type="button" class="button button-secondary btn-upload" value="Upload" id="upload-button" /><input type="hidden" id="profile-picture" name="anila_profile_picture" value="'. $this->profile_pic .'"/>';
    }
}

function sidebar_name()
{
    echo '<input class="regular-text" type="text" name="anila_title" placeholder="Title" value="'. $this->title .'"/><br /><input class="regular-text" type="text" name="anila_description" placeholder="Description" value="'. $this->description .'"/>';
}
function social_settings()
{
    foreach ($this->socials as $key => $value)
    {
        echo '<input class="regular-text" type="text" name="anila_'.$key.'" placeholder="anila_'.$key.' name" value="'. $value .'"/><p class="description">Your '.$key.' name </p>';
    }
}



/*  ======================
    Theme Options Slider
    ======================
 */

function activate_slider()
{
    $checked = ( @$this->slider == 1 ? 'checked' : '');
    echo '<input type="checkbox" class="ios8-switch" id="activate_slider" name="anila_activate_slider" value="1" '.$checked.' /><label for="activate_slider">Activate Slider</label>';
}

function slider_content()
{
    $output = '<div class="add-slider-image"><div><input type="button" class="button button-secondary btn-upload-slider" value="Upload" id="upload-button-slider" />
    <input type="hidden" id="slider-image" name="anila_sliderimage" value="'. $this->sliderimage.'"/>';
    echo $output;

}



/*  ======================
    Theme Options CSS
    ======================
 */
function css_options()
{
    require_once $this->theme . '/inc/admin-adminPages/css-options.php';
}

function custom_css_field_callback()
{
    $css = get_option( 'anila_css');
    $css = (empty($css)) ? '/* Anila Theme Custom Css*/' : $css ;
    echo '<div id="customCss">'.$css.'</div><textarea id="anila_css" name="anila_css" style="display:none;visibility:hidden">$'.$css.'</textarea>';
}

function sanitize($input){
    $output = sanitize_text_field( $input );
    $output = str_replace('@', '', $output);
    return $output;
}

function sanitize_css($input){
    $output = esc_textarea( $input );
    return $output;
}

}

