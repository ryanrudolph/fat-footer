<?php
/**
 * Plugin Name: Fat Footer
 * Plugin URI: http://getphound.com
 * Description: This plugin adds the fat footer to the bottom of the website.
 * Version: 0.0.1
 * Author: Ryan Rudolph
 * Author URI: http://ryanrudolph.com
 * License: GPL2
 */

// Register widget area
genesis_register_sidebar( array(
	'id' => 'fat-footer',
	'name' => __( 'Fat Footer', 'genesis' ),
	'description' => __( 'This is the widget area is intended to be used with the Fat Footer widget.', 'childtheme' ),
) );

add_action( 'genesis_before_footer', 'gp_fat_footer' );

function gp_fat_footer() {

}