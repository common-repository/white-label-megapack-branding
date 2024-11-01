<?php


// Set default option values during plugin activation
function wlmpb_settings_activation_defaults() {
    $wlmpb_widget_count = get_option('wlmpb_custom_widget_count');
    if (empty($wlmpb_widget_count)) {
        update_option( 'wlmpb_custom_widget_count', 'one' );
    }
    $wlmpb_custom_widget = get_option('wlmpb_custom_widget');
    if (empty($wlmpb_custom_widget)) {
        update_option( 'wlmpb_custom_widget', '' );
    }
    $wlmpb_under_construction_body = get_option('wlmpb_under_construction_body');
    if (empty($wlmpb_under_construction_body)) {
        update_option( 'wlmpb_under_construction_body', '<p style="text-align: center;">Thank you for being patient. We are doing some work on the site and it will be live shortly.</p>' );
    }
    $wlmpb_under_construction_page_title = get_option('wlmpb_under_construction_title');
    if (empty($wlmpb_under_construction_page_title)) {
        update_option( 'wlmpb_under_construction_title', 'Website coming soon' );
    }
    $wlmpb_login_logo_url = get_option('wlmpb_login_logo_url');
    if (empty($wlmpb_login_logo_url)) {
        update_option( 'wlmpb_login_logo_url', '' );
    }
    $wlmpb_login_logo_title = get_option('wlmpb_login_logo_title');
    if (empty($wlmpb_login_logo_title)) {
        update_option( 'wlmpb_login_logo_title', '' );
    }
    $wlmpb_white_label_wordpress = get_option( 'wlmpb_dashboard_hide_wp_logo' );
    if (empty($wlmpb_white_label_wordpress)) {
        update_option( 'wlmpb_login_logo_title', '' );
    }
}
