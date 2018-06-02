<?php
/**
 * @package Anila
 */

require get_template_directory() . '/inc/Admin.php';


function social_display()
{
    $socials   =   array(
        'facebook'  => esc_attr( get_option( 'anila_facebook' ) ),
        'twitter'   => esc_attr( get_option( 'anila_twitter' ) ),
        'google'    => esc_attr( get_option( 'anila_google' ) ),
    );
    $output = '<ul>';
    foreach ($socials as $key => $value)
    {
        if ($value) {
            $output .=  '<li>
            <a class="social-link" href="https://www.'.$key.'.com/'.$value.'" target="_blank" aria-label="fa fa-'.$key.'">
            <span class="simple-svg" data-icon="simple-line-icons:social-'.$key.'" data-inline="false"></span>
            </a></li>';
        }

    }

    $output .= '</ul>';
    echo $output;
}