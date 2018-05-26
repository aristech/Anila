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
<h1> <?php echo wp_get_theme(); ?> General Options</h1>
<?php settings_errors(); ?>
<div class="admin-content">
    <div class="admin-form">
        <form class="general-form" action="options.php" method="post">
            <?php settings_fields( 'anila-settings-group' ); ?>
            <?php do_settings_sections( 'anila' ); ?>
            <?php submit_button( 'Save changes', 'primary', 'btnSubmit' ); ?>
        </form>
    </div>
</div>


