<?php
/*
Plugin Name: CF7 Unloaded
Plugin URI: http://www.strategio.fr/
Description: A small plugin to avoid loading of Contact Form 7 assets when not needed...
Author: Pierre SYLVESTRE | STRATEGIO
Author URI: http://www.strategio.fr/
Text Domain: cf7unloaded
Version: 1.0.0
*/

/**
 * Remove scripts and styles when shortcode isn't used !
 */
function cf7unloaded_deregister_contact_form() {
	global $post;
    if ( ! has_shortcode( $post->post_content, 'contact-form-7' ) ) {
        remove_action('wp_enqueue_scripts', 'wpcf7_do_enqueue_scripts');
    }
}
add_action( 'wp', 'cf7unloaded_deregister_contact_form');
// or: add_action( 'wp_enqueue_scripts', 'cf7unloaded_deregister_contact_form', 2);
