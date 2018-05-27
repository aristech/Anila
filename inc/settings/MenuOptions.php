<?php
/**
 * @package Anila
 *
 */

 namespace Inc\settings;
 
/* ========================
 * Admin Menu Options 
 * ========================
 */
use Inc\settings\Settings;


class MenuOptions 
{
    //private $adm;
    function __construct(){
        $this   ->  settings            =   new Settings;
        $this   ->  theme               =   get_template_directory();
    }
    //Create Theme Page and Subpages
    public function admin_menu_option() 
    {    
        add_menu_page('Anila Options', 'Anila', 'manage_options', 'anila', array($this,'themeSettings'), 'dashicons-calendar-alt', 200);
        add_submenu_page('anila', 'Theme Options', 'Settings', 'manage_options', 'anila', array($this,'themeSettings'));
        add_submenu_page( 'anila', 'Contact Options', 'Contact', 'manage_options', 'anila_contact', array($this, 'contactSettings'));
        add_submenu_page( 'anila', 'Sidebar Options', 'Sidebar', 'manage_options', 'anila_sidebar', array($this, 'sidebarSettings'));
        add_submenu_page( 'anila', 'Slider Options', 'Slider', 'manage_options', 'anila_slider', array($this, 'sliderSettings'));
        add_submenu_page('anila', 'Css Options', 'Custom Css', 'manage_options', 'anila_css', array($this,'cssSettings'));
        add_action( 'admin_init', array($this->settings, 'settings'));
    }



    function themeSettings()
    {
        require_once $this->theme . '/inc/adminPages/ThemeSettings.php';
    }

    function contactSettings()
    {
        require_once $this->theme . '/inc/adminPages/ContactSettings.php';
    }

    function sidebarSettings()
    {
        require_once $this->theme . '/inc/adminPages/SidebarSettings.php';
    }

    function sliderSettings()
    {
        require_once $this->theme . '/inc/adminPages/SliderSettings.php';
    }
    
    function cssSettings()
    {
        require_once $this->theme . '/inc/adminPages/CssSettings.php';
    }
    
}    
