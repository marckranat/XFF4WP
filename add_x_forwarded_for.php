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

function correct_ip_address() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_list = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $client_ip = trim(end($ip_list));

        if (filter_var($client_ip, FILTER_VALIDATE_IP)) {
            $_SERVER['REMOTE_ADDR'] = $client_ip;
        }
    }
}

add_action('init', 'correct_ip_address');
?>
