<?php
/*
Plugin Name: Extending AMP for WP - Featured Images
Version: 1.0
Author: Mohammed Khaled
Plugin URI: https://wordpress.org/plugins/accelerated-mobile-pages/
Donate link: https://www.paypal.me/Kaludi/5
License: GPL2
*/
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
define('AMPFORWP_CUSTOM_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

add_action('pre_amp_render_post',function(){
	remove_filter( 'amp_post_template_file', 'ampforwp_design_element_featured_image', 10, 3 );
	add_filter( 'amp_post_template_file', 'ampforwp_design_element_custom_featured_image', 10, 3 );
});

function ampforwp_design_element_custom_featured_image( $file, $type, $post ) {
	if ( 'ampforwp-featured-image' === $type ) {
		$file = AMPFORWP_CUSTOM_PLUGIN_DIR . 'featured-image.php';
	}
	return $file;
}