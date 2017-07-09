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

// Add settings menu
add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
	add_menu_page('Fat Footer Settings', 'Fat Footer Settings', 'administrator', 'my-plugin-settings', 'my_plugin_settings_page', 'dashicons-admin-generic');
}

function my_plugin_settings_page() { ?>
	
<div class="wrap">
<h2>Fat Footer Settings</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'my-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Business Address</th>
        <td><input type="text-area" name="business_address" value="<?php echo esc_attr( get_option('business_address') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Business Email</th>
        <td><input type="text" name="business_phone" value="<?php echo esc_attr( get_option('business_phone') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Business Phone</th>
        <td><input type="text" name="business_email" value="<?php echo esc_attr( get_option('business_email') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>


<?php }

add_action( 'admin_init', 'my_plugin_settings' );

function my_plugin_settings() {
	register_setting( 'my-plugin-settings-group', 'business_address' );
	register_setting( 'my-plugin-settings-group', 'business_phone' );
	register_setting( 'my-plugin-settings-group', 'business_email' );
}