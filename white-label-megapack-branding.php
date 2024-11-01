<?php
/*
Plugin Name: White Label MegaPack Branding
Plugin URI: https://4wp.it/
Description: Customize the wordpress admin, you can hide or insert functions in the dashboard, posts, pages,media,  customize the login page graphically, change the access redirect based on the role, recaptcha protection and much more.
Version: 1.0.4
Author: 4wpBari
Author URI: https://4wp.it/roberto-bottalico/
License: GPL2
Text Domain: white-label-megapack-branding
*/


// If this file is called directly, abort
if ( ! defined( 'ABSPATH' ) ) {
     die ('Silly human what are you doing here');
}


// The core plugin file that is used to define internationalization, hooks and functions
require( plugin_dir_path( __FILE__ ) . '/include/plugin-functions.php');


// Function file that manages stylsheets
require( plugin_dir_path( __FILE__ ) . '/styling/styling-functions.php');


// Function file that manages admin views and functionality
require( plugin_dir_path( __FILE__ ) . '/admin/admin-functions.php');

require( plugin_dir_path( __FILE__ ) . '/admin/add-custom-page/custom-admin-page.php');


// Get current plugin version
$wlmpb_plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$wlmpb_plugin_version = $wlmpb_plugin_data['Version'];
global $wlmpb_plugin_version;


// Display additional links on WLMPB plugin action links
function wlmpb_plugin_add_settings_link( $links ) {
	$links = array_merge( array(
		'<a href="' . esc_url( admin_url( '/admin.php?page=white-label-megapack-branding' ) ) . '">' . __( 'Settings', 'white-label-megapack-branding' ) . '</a>',
    '<a href="https://4wp.it/category/documentazione/white-label-megapack-branding/" target="_blank" >' . __( 'Documentation', 'white-label-megapack-branding' ) . '</a>'
	), $links );
	return $links;
}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wlmpb_plugin_add_settings_link' );


// Update WLMPB options during plugin activation
function wlmpb_activation_actions(){
    do_action( 'wlmpb_extension_activation' );
}
register_activation_hook( __FILE__, 'wlmpb_activation_actions' );
// Set default values here
function wlmpb_default_options(){
    wlmpb_settings_activation_defaults();
}
add_action( 'wlmpb_extension_activation', 'wlmpb_default_options' );
add_action('upgrader_process_complete', 'wlmpb_default_options', 10, 2);


// Paths, for including files for Admin Detect Menu
define( 'WLMPB_DIR', plugin_dir_path( __FILE__ ) );
define( 'WLMPB_INC_DIR', trailingslashit( WLMPB_DIR . 'include' ) );
define( 'WLMPB_CLASSES_DIR', trailingslashit( WLMPB_INC_DIR . 'classes' ) );
define( 'WLMPB_ADMIN_PAGES_DIR', trailingslashit( WLMPB_DIR . 'admin/admin-pages' ) );

// Setting for Admin Detect Menu page
define( 'WLMPB_SETTING_MENU_DETECT', 'white_label_megapack_branding_menu_detect' );
define( 'WLMPB_SETTING_BAR', 'white_label_megapack_branding_admin_bar' );

// Load files for Admin Detect Menu
require_once WLMPB_INC_DIR . 'functions/menu-detect/menu-detect.php';
require_once WLMPB_INC_DIR . 'classes/admin-page.php';

// Separate Admin detect menu page in back-end only if the user activates it 
if ( is_admin() ) {
	include_once WLMPB_DIR . 'admin/admin-menu.php';
	new WLMPB_Admin_Menu_Detect();

}

require_once WLMPB_DIR . 'admin/admin-bar.php';
new WLMPB_Admin_Bar();

// Load Class for redirect url function based on user role

class WlmpbRRurls {
    function __construct() {
        add_filter('login_redirect', array($this, 'wlmpb_rrurlslogin_redirect'), 10, 3);
        add_action('after_setup_theme', array($this, 'wlmpb_rrurlsremove_admin_bar'));
        add_action('wp_logout', array($this, 'wlmpb_rrurlslogout_redirect'));
    }

    function wlmpb_rrurlslogin_redirect($redirect_to, $request, $user) {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wlmpb_rrurlsredirect");
        if (isset($user->roles) && is_array($user->roles)) {
            //check for subscribers
            foreach ($results as $result) {
                $desirerole = $result->role_type;
                if ($result->url_login_textbox) {
                    $desireurl = $result->url_login_textbox;
                }
                if (in_array($desirerole, $user->roles)) {
                    $redirect_to = $desireurl;
                }
            }
        }
        return $redirect_to;
    }
    function wlmpb_rrurlslogout_redirect() {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wlmpb_rrurlsredirect");
        foreach ($results as $result) {
            $desirerole = $result->role_type;
            if ($result->url_logout_textbox) {
                $desireurl = $result->url_logout_textbox;
            }
            if ($desireurl) {
                if (current_user_can($desirerole)) {
                    $redirect_url = $desireurl;
                    wp_safe_redirect($redirect_url);
                    exit;
                }
            } else {
                wp_safe_redirect(wp_login_url());
                exit;
            }
        }
    }
    function wlmpb_rrurlsremove_admin_bar() {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}wlmpb_rrurlsredirect");
        foreach ($results as $result) {
            if ($result->adminbar == 'yes') {
                if (current_user_can($result->role_type)) {
                    add_filter( 'show_admin_bar', '__return_false', PHP_INT_MAX );
                }
            }
        }
    }

}
$WlmpbRRurls = new WlmpbRRurls();
register_activation_hook(__FILE__, 'wlmpb_rrurlsinstall');
function wlmpb_rrurlsinstall() {
    global $wpdb;
    global $table_name;
    $table_name = $wpdb->prefix . "wlmpb_rrurlsredirect";
    if ($table_name != $wpdb->get_var("SHOW TABLES LIKE '$table_name'")) {
        $sql = "CREATE TABLE $table_name (
            `role_id` INT(20) NOT NULL AUTO_INCREMENT,
            `role_type` VARCHAR(20) NOT NULL,
            `url_login_textbox` VARCHAR(255) NOT NULL,
			`url_logout_textbox` VARCHAR(255) NOT NULL,
			`adminbar` VARCHAR(10) NOT NULL,
            PRIMARY KEY (`role_id`)
            )";
        //$wpdb->query($sql);
        require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
function wlmpb_rrurlsremove_database() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'wlmpb_rrurlsredirect';
    $sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);
}
register_deactivation_hook(__FILE__, 'wlmpb_rrurlsremove_database');