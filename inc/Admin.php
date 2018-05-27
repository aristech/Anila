<?php
/**
 * @package Anila
 *
 */
 
/* ========================
 * Admin Configuration Page 
 * ========================
 */
if ( file_exists( get_template_directory(). '/vendor/autoload.php')) {
    require_once get_template_directory(). '/vendor/autoload.php';
}

use Inc\settings\MenuOptions;
use Inc\settings\Settings;
//use Inc\settings\RegisterBlocks;
use Inc\settings\EnqueueAdmin;
use Inc\settings\EnqueueWp;


class Admin {
    public $theme;


     function __construct() 
     {

        $this   ->  MenuOptions         =   new MenuOptions;
        $this   ->  Settings            =   new Settings;
        //$this   ->  RegisterBlocks      =   new RegisterBlocks;
        $this   ->  enqueueAdmin        =   new EnqueueAdmin;
        $this   ->  enqueueWp           =   new EnqueueWp;
        $this   ->  theme               =   get_template_directory();
        $this   ->  themeUri            =   get_template_directory_uri();
        
        $this   ->  walker              =   require $this->theme . '/inc/settings/Walker.php';
                   
    }
   
    function register() 
    {
        add_filter( 'script_loader_src', array($this, 'removeVersion' ));
        add_filter( 'style_loader_src', array($this, 'removeVersion' ));
        add_filter( 'the_generator', array($this, 'removeMetaVersion') );
        add_action( 'admin_menu',array($this->MenuOptions, 'admin_menu_option'));  
        add_action( 'admin_enqueue_scripts', array($this->enqueueAdmin, 'enqueueAdmin' ));
        add_action( 'wp_enqueue_scripts', array($this->enqueueWp,'enqueueWp' ));
        add_action( 'after_setup_theme', array($this, 'anila_setup'));
        add_filter('upload_mimes', array($this, 'cc_mime_types'));
        add_theme_support( 'post-thumbnails' );
        //add_action( 'enqueue_block_assets', array($this->RegisterBlocks,'my_block_cgb_block_assets' ));
        //add_action( 'enqueue_block_editor_assets', array($this->RegisterBlocks, 'my_block_cgb_editor_assets' ));
        if( @$this->Settings->contact == 1) {
            add_action( 'init', array($this->Settings,'contact_cpt'));
            add_filter( 'manage_anila_contact_posts_columns', array($this->Settings, 'set_contact_columns'));
            add_action( 'manage_anila_contact_posts_custom_column', array($this->Settings, 'contact_custom_column'), 10, 2);
            add_action( 'add_meta_boxes', array($this->Settings,'contact_add_metabox' ));
            add_action( 'save_post', array($this->Settings, 'save_email_data'));
        }
        
        
    } 
    

    // Remove version number of wordpress    
    function removeVersion($src)
    {
        global $wp_version;
        parse_str(parse_url($src, PHP_URL_QUERY),$query);
        if (!empty($query['ver']) && $query['ver'] === $wp_version) {
            $src = remove_query_arg( 'ver', $src );
        }
        return $src;
    }

    // Remove Meta version 
    function removeMetaVersion()
    {
        
        return '';
    }

    

    // Navigation menus
    function anila_setup() 
    {
        add_theme_support( 'title-tag' );
        load_theme_textdomain( 'anila' );
        add_theme_support( 'align-wide' );
        register_nav_menu( 'primary', 'Header Primary Navigation Menu ' );
        register_nav_menu( 'secondary', 'Header Secondary Navigation Menu' );
    }
    
    // Support for svg
    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
      
   
}

if (class_exists('Admin')) {
    $admin =new Admin();
    $admin->register();
}