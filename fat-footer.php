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
	add_menu_page('Fat Footer', 'Fat Footer', 'administrator', 'my-plugin-settings', 'my_plugin_settings_page', 'dashicons-admin-generic');
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
        <td><input type="text" name="business_address" value="<?php echo esc_attr( get_option('business_address') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Business Email</th>
        <td><input type="text" name="business_email" value="<?php echo esc_attr( get_option('business_email') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Business Phone</th>
        <td><input type="text" name="business_phone" value="<?php echo esc_attr( get_option('business_phone') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Google Map Link</th>
        <td><input type="text" name="google_map" value="<?php echo esc_attr( get_option('google_map') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Background Color</th>
        <td><input type="text" name="background_color" value="<?php echo esc_attr( get_option('background_color') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Form Shortcode <small>Default: [gravityform id="1" title="true" description="true"]</small></th>
        <td><input type="text" name="form_shortcode" value="<?php echo esc_attr( get_option('form_shortcode') ); ?>" /></td>
        </tr>

        <tr valign="top"><th scope="row"><h3>Social</h3></th></tr>

        <tr valign="top">
        <th scope="row">Facebook Link</th>
        <td><input type="text" name="facebook_link" value="<?php echo esc_attr( get_option('facebook_link') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Twitter Link</th>
        <td><input type="text" name="twitter_link" value="<?php echo esc_attr( get_option('twitter_link') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">LinkedIn Link</th>
        <td><input type="text" name="linkedin_link" value="<?php echo esc_attr( get_option('linkedin_link') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Google+ Link</th>
        <td><input type="text" name="google_link" value="<?php echo esc_attr( get_option('google_link') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Instagram Link</th>
        <td><input type="text" name="instagram_link" value="<?php echo esc_attr( get_option('instagram_link') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">YouTube Link</th>
        <td><input type="text" name="youtube_link" value="<?php echo esc_attr( get_option('youtube_link') ); ?>" /></td>
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
	register_setting( 'my-plugin-settings-group', 'google_map' );
	register_setting( 'my-plugin-settings-group', 'background_color' );
	register_setting( 'my-plugin-settings-group', 'form_shortcode' );
	register_setting( 'my-plugin-settings-group', 'facebook_link' );
	register_setting( 'my-plugin-settings-group', 'twitter_link' );
	register_setting( 'my-plugin-settings-group', 'linkedin_link' );
	register_setting( 'my-plugin-settings-group', 'google_link' );
	register_setting( 'my-plugin-settings-group', 'instagram_link' );
	register_setting( 'my-plugin-settings-group', 'youtube_link' );
}