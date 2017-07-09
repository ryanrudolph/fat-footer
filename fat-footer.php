<?php
/**
 * Plugin Name: Fat Footer
 * Plugin URI: http://getphound.com
 * Description: This plugin adds a fat footer to the bottom of the website.
 * Version: 0.0.1
 * Author: Ryan Rudolph
 * Author URI: http://ryanrudolph.com
 * License: GPL2
 */

// Enqueue styles
add_action( 'wp_enqueue_styles', 'my_enqueued_styles' );

function my_enqueued_styles() {
	wp_enqueue_style( 'my-style', plugin_dir_url( __FILE__ ) . '/style.css' );
}

// Register widget area
genesis_register_sidebar( array(
	'id' => 'fat-footer',
	'name' => __( 'Fat Footer', 'genesis' ),
	'description' => __( 'This is the widget area is intended to be used with the Fat Footer widget.', 'childtheme' ),
) );

add_action( 'genesis_before_footer', 'gp_fat_footer' );

function gp_fat_footer() {

    genesis_widget_area( 'fat-footer', array(
		'before' => '<div class="fat-footer widget-area">',
		'after'  => '</div>',
    ) );

}

// Add settings menu
add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
	add_menu_page('Fat Footer Settings', 'Plugin Settings', 'administrator', 'my-plugin-settings', 'my_plugin_settings_page', 'dashicons-admin-generic');
}

function my_plugin_settings_page() {
  // 
}