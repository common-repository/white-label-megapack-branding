<?php


// Register field options
include( plugin_dir_path( __FILE__ ) . '/settings/main.php');
require( plugin_dir_path( __FILE__ ) . 'options/managerwebsite-capabilities.php');
require( plugin_dir_path( __FILE__ ) . '/options/register-settings.php');
require( plugin_dir_path( __FILE__ ) . '/options/settings-activation.php');


// Add WLMP Branding Dashboards to admin menu
add_action('admin_menu', function() {
    add_menu_page( 'WLMP Branding', __( 'WLMP Branding', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding', 'wlmpb_dashboards_page', 'dashicons-dashboard', 90  );
    add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Dashboard', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=dashboard-widget-settings', 'wlmpb_dashboards_page' );	
    add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Posts', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=post-settings', 'wlmpb_dashboards_page' );
	add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Media', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=media-settings', 'wlmpb_dashboards_page' );
	add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Pages', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=pages-settings', 'wlmpb_dashboards_page' );
	add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Comments', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=comments-settings', 'wlmpb_dashboards_page' );
    add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Header Footer', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=header-footer-admin-wordpress-settings', 'wlmpb_dashboards_page' );
    add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Login Page', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=login-settings', 'wlmpb_dashboards_page' );
    add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Custom Login Redirect', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=custom-login-redirect-settings', 'wlmpb_dashboards_page' );
	add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Google ReCaptcha', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=google-recaptcha-settings', 'wlmpb_dashboards_page' );
	add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Cookie Bar', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=cookie-bar-settings', 'wlmpb_dashboards_page' );
    add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Coming Soon', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=coming-soon', 'wlmpb_dashboards_page' );
	add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Custom Code', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=custom-code', 'wlmpb_dashboards_page' );
    add_submenu_page( 'white-label-megapack-branding', 'wlmpb_dashboard_options_page', __( 'Manager Website Role', 'white-label-megapack-branding' ), 'administrator', 'white-label-megapack-branding&tab=managerwebsite-access', 'wlmpb_dashboards_page' );
    remove_submenu_page('white-label-megapack-branding','white-label-megapack-branding');

});


// Display Coming Soon Mode notice if enabled
add_action('admin_bar_menu', 'wlmpb_landing_page_notice');
function wlmpb_landing_page_notice($admin_bar) {
$wlmpb_enable_constructions = get_option('wlmpb_under_construction_disable');
    if (!empty($wlmpb_enable_constructions)) {
        $admin_bar->add_menu( array(
            'id'    => 'wlmpb-coming-soon-notice',
            'parent' => 'top-secondary',
            'title' => 'Coming Soon Active',
            'href'  => admin_url().'admin.php?page=white-label-megapack-branding&tab=coming-soon',
            'meta'  => array(
                'title' => __('Coming Soon Active'),
            ),
        ) );
    }
}


// Include color picker assets
add_action( 'admin_enqueue_scripts', 'wlmpb_color_picker' );
function wlmpb_color_picker( $hook ) {
    if( is_admin() ) {
        // Add the color picker css file
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wlmpb-custom-script-handle', plugins_url( '/settings/js/wlmpb-backend.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }
}


// Custom save changes option notice
function wlmpb_custom_save_notice() {
    global $pagenow;
    if ($pagenow == 'admin.php') {
        if ( isset( $_GET['settings-updated'] )) {
            add_settings_error( 'wlmpb-notices', 'wlmpb-settings-updated', __('Settings saved.', 'white-label-megapack-branding'), 'updated' );
        }
    }
}
add_action('admin_notices', 'wlmpb_custom_save_notice');
