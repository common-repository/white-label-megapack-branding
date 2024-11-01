<?php


// Include Dynamic CSS PHP File
include( plugin_dir_path( __FILE__ ) . 'wlmpb-dynamic-css.php');


// Links WLMPB admin stylesheet
function wlmpb_admin_styling() {
    global $wlmpb_plugin_version;
    wp_enqueue_style( 'white-label-megapack-branding-styling', plugins_url( 'wlmpb-backend.css', __FILE__ ), array(), "$wlmpb_plugin_version" );
}
add_action( 'admin_enqueue_scripts', 'wlmpb_admin_styling' );


// Links WLMPB modern theme stylesheet
function wlmpb_modern_theme_styling() {
    $dashboard_modern_theme = get_option('wlmpb_dashboard_modern_theme');
    if (!empty($dashboard_modern_theme)) {
        global $wlmpb_plugin_version;
        wp_enqueue_style( 'white-label-megapack-branding-modern-theme-styling', plugins_url( 'wlmpb-modern-theme.css', __FILE__ ), array(), "$wlmpb_plugin_version" );
    }
}
add_action( 'admin_enqueue_scripts', 'wlmpb_modern_theme_styling' );


// Links WLMPB frontend stylesheet
function wlmpb_frontend_styling() {
    if ( is_user_logged_in() ) {
        global $wlmpb_plugin_version;
        wp_enqueue_style( 'wlmpb-frontend-styling', plugins_url( 'wlmpb-frontend.css', __FILE__ ), array(), "$wlmpb_plugin_version" );
    }
}
add_action( 'wp_enqueue_scripts', 'wlmpb_frontend_styling' );
