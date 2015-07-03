<?php
/**
 * APOIP functions and definitions
 *
 * @package apoip
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

// External plugin
function my_mce_external_plugins($plugins) {
    $plugins['anchor'] = get_template_directory_uri() . '/js/tinymce/plugins/anchor/plugin.min.js';
    return $plugins;
}
add_filter('mce_external_plugins', 'my_mce_external_plugins');

// Enable hidden buttons in the editor
// based on: http://wptavern.com/how-to-add-subscript-and-superscript-characters-in-wordpress
// also https://wordpress.org/support/topic/anchor-button
function enable_more_buttons($buttons) {
	/**
	 * Add in core buttons that are disabled by default
	 */
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';
	$buttons[] = 'anchor';

	return $buttons;
}
add_filter('mce_buttons_2', 'enable_more_buttons');
