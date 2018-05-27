<?php
/**
 * @package Anila
 *
 */

 namespace Inc\adminPages;
 
/* ========================
 * Settings Page  
 * ========================
 */
?>
<h1> <?php echo wp_get_theme(); ?> Slider Options</h1>
<?php settings_errors(); ?>
<div class="admin-content">
    <div class="admin-form">
        <form class="general-form" action="options.php" method="post">
            <?php settings_fields( 'anila-slider-group' ); ?>
            <?php do_settings_sections( 'anila_slider' ); ?>
            <?php submit_button( 'Save changes', 'primary', 'btnSubmit' ); ?>
        </form>
    </div>
</div>


