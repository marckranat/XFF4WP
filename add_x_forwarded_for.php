<?php
/*
Plugin Name: X-Forwarded-For
Plugin URI: https://300m.com/
Description: Add X-Forwarded-For headers to correct the IP address seen in WordPress for CDNs
Version: 1.0
Author: Marc Kranat
Author URI: https://300m.com/
*/

// Add X-Forwarded-For headers to correct the IP address seen in WordPress for browsers
add_action( 'init', 'add_x_forwarded_for' );
function add_x_forwarded_for() {
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    $_SERVER['REMOTE_ADDR'] = $ip_address;
}

// Register the plugin activation hook
register_activation_hook( __FILE__, 'add_x_forwarded_for' );

?>
