<?php
/*
Plugin Name: Kube VCard Master
Description: Easily integrate with BuddyBoss and download VCard files with ease.
Version: 1.0
Author: Burhan Sajid Hasanfatta
Author URI: https://example.com/
prefix: kube
*/

// Hook to check for BuddyPress before activating the plugin.
register_activation_hook(__FILE__, 'kube_vcard_activation');

function kube_vcard_activation() {
    if (!class_exists('BuddyPress')) {
        wp_die("Kube VCard Master requires BuddyPress to be active. The plugin has been deactivated.");
    }
}

add_action('plugins_loaded','kube_important_all_registation_file');
function kube_important_all_registation_file()
{
    define('KUBE_VCARD_URI' , plugin_dir_url( __FILE__ )); 
    define('KUBE_VCARD_DIR' , plugin_dir_path( __FILE__ ));
    include_once( KUBE_VCARD_DIR . '/includes/admin/registry/resgistration.php' );
}