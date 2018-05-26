<?php
/**
 * @package Anila
 *
 */
 
/* ========================
 * Register Blocks
 * ========================
 */

namespace Inc\settings;
 
/* ================================
 * Enqueue Front Configuration Page  
 * =================================
 */

class RegisterBlocks
{
    //private $adm;
    function __construct(){
        $this   ->  themeUri            =   get_template_directory_uri();
    }
        

            function my_block_cgb_block_assets() {
                // Styles.
                wp_enqueue_style(
                    'my_block-cgb-style-css', // Handle.
                    $this->themeUri . '/blocks/my-block/dist/blocks.style.build.css', // Block style CSS.
                    array( 'wp-blocks' ) // Dependency to include the CSS after it.
                    // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: filemtime — Gets file modification time.
                );
            } // End function my_block_cgb_block_assets().
            
            // Hook: Frontend assets.
            
            
            /**
             * Enqueue Gutenberg block assets for backend editor.
             *
             * `wp-blocks`: includes block type registration and related functions.
             * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
             * `wp-i18n`: To internationalize the block's text.
             *
             * @since 1.0.0
             */
            function my_block_cgb_editor_assets() {
                // Scripts.
                wp_enqueue_script(
                    'my_block-cgb-block-js', // Handle.
                    $this->themeUri . '/blocks/my-block/dist/blocks.build.js', // Block.build.js: We register the block here. Built with Webpack.
                    array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
                    // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
                    true // Enqueue the script in the footer.
                );
            
                // Styles.
                wp_enqueue_style(
                    'my_block-cgb-block-editor-css', // Handle.
                    $this->themeUri . '/blocks/my-block/dist/blocks.editor.build.css', // Block editor CSS.
                    array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
                    // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: filemtime — Gets file modification time.
                );
            } // End function my_block_cgb_editor_assets().
            
            // Hook: Editor assets.
           
    
} 
       
    