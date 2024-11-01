<?php
// Create custom welcome message template
function wlmpb_general_admin_notice(){
global $pagenow;
    if ( $pagenow == 'index.php' ) {
         echo '<div class="notice notice-info is-dismissible wlmpb-welcome">
         <h1 class="title-background">' . get_option('wlmpb_message_title') . '</h1>
         <div class="wlmpb-welcome-content">' . get_option( 'wlmpb_message_body' ) . '</div>
         </div>';
    }
}
add_action('admin_notices', 'wlmpb_general_admin_notice');

// Creates Custom Widget 1
add_action('wp_dashboard_setup', 'wlmpb_create_custom_widget');
function wlmpb_create_custom_widget() {
global $wp_meta_boxes;
$wlmpb_widget_title_text = get_option('wlmpb_widget_title');
$wlmpb_widget_enabled = get_option('wlmpb_custom_widget');
    if (!empty($wlmpb_widget_enabled)) {
        wp_add_dashboard_widget('wlmpb_widget', " $wlmpb_widget_title_text  ", 'wlmpb_custom_widget');
    }
}
function wlmpb_custom_widget() {
    $wlmpb_widget_one_shortcode = get_option('wlmpb_custom_widget_shortcode');
        echo '<div class="wlmpb-custom-widget-content">' . get_option( 'wlmpb_widget_body' ) . '</div>
        <div class="wlmpb-widget-shortcode-one">' . do_shortcode("$wlmpb_widget_one_shortcode") . '</div>';
}


// Creates Custom Widget 2
add_action('wp_dashboard_setup', 'wlmpb_create_custom_widget_two');
function wlmpb_create_custom_widget_two() {
global $wp_meta_boxes;
$wlmpb_widget_two_title_text = get_option('wlmpb_widget_two_title');
$wlmpb_widget_two_enabled = get_option('wlmpb_custom_widget_two');
$wlmpb_widget_count = get_option('wlmpb_custom_widget_count');
    if ($wlmpb_widget_count !== "one") {
        if ($wlmpb_widget_count == "two" || "three" || "four") {
            if (!empty($wlmpb_widget_two_enabled)) {
                wp_add_dashboard_widget('wlmpb_widget_two', " $wlmpb_widget_two_title_text  ", 'wlmpb_custom_widget_two');
            }
        }
    }
}
function wlmpb_custom_widget_two() {
    $wlmpb_widget_two_shortcode = get_option('wlmpb_custom_widget_two_shortcode');
    echo '<div class="wlmpb-custom-widget-content">' . get_option( 'wlmpb_widget_two_body' ) . '</div>
    <div class="wlmpb-widget-shortcode-two">' . do_shortcode("$wlmpb_widget_two_shortcode") . '</div>';
}


// Create Custom Widget 3
add_action('wp_dashboard_setup', 'wlmpb_create_custom_widget_three');
function wlmpb_create_custom_widget_three() {
global $wp_meta_boxes;
$wlmpb_widget_three_title_text = get_option('wlmpb_widget_three_title');
$wlmpb_widget_three_enabled = get_option('wlmpb_custom_widget_three');
$wlmpb_widget_count = get_option('wlmpb_custom_widget_count');
    if ($wlmpb_widget_count !== "one") {
        if ($wlmpb_widget_count !== "two") {
            if ($wlmpb_widget_count == "three" || "four") {
                if (!empty($wlmpb_widget_three_enabled)) {
                    wp_add_dashboard_widget('wlmpb_widget_three', " $wlmpb_widget_three_title_text  ", 'wlmpb_custom_widget_three');
                }
            }
        }
    }
}
function wlmpb_custom_widget_three() {
    $wlmpb_widget_three_shortcode = get_option('wlmpb_custom_widget_three_shortcode');
    echo '<div class="wlmpb-custom-widget-content">' . get_option( 'wlmpb_widget_three_body' ) . '</div>
    <div class="wlmpb-widget-shortcode-three">' . do_shortcode("$wlmpb_widget_three_shortcode") . '</div>';
}


// Create Custom Widget 4
add_action('wp_dashboard_setup', 'wlmpb_create_custom_widget_four');
function wlmpb_create_custom_widget_four() {
global $wp_meta_boxes;
$wlmpb_widget_four_title_text = get_option('wlmpb_widget_four_title');
$wlmpb_widget_four_enabled = get_option('wlmpb_custom_widget_four');
$wlmpb_widget_count = get_option('wlmpb_custom_widget_count');
    if ($wlmpb_widget_count == "four") {
        if (!empty($wlmpb_widget_four_enabled)) {
            wp_add_dashboard_widget('wlmpb_widget_four', " $wlmpb_widget_four_title_text  ", 'wlmpb_custom_widget_four');
        }
    }
}

function wlmpb_custom_widget_four() {
    $wlmpb_widget_four_shortcode = get_option('wlmpb_custom_widget_four_shortcode');
    echo '<div class="wlmpb-custom-widget-content">' . get_option( 'wlmpb_widget_four_body' ) . '</div>
    <div class="wlmpb-widget-shortcode-four">' . do_shortcode("$wlmpb_widget_four_shortcode") . '</div>';
}

// Remove default WordPress widgets from dashboard
function wlmpb_remove_default_dashboard_widgets() {
    // Welcome Panel Widget
    $welcome_panel = get_option( 'wlmpb_widget_welcome' );
    if (!empty($welcome_panel)) { remove_action( 'welcome_panel','wp_welcome_panel' ); } // Welcome Panel
    // Try Gluentberg Widget
    $try_gutenberg_panel = get_option( 'wlmpb_widget_glutenberg' );
    if (!empty($try_gutenberg_panel)) { remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); } // Try Gutenberg
    // Wordpress Events & News Widget
    $dashboard_primary = get_option( 'wlmpb_widget_primary' );
    if (!empty($dashboard_primary)) { remove_meta_box( 'dashboard_primary','dashboard','side' ); } // Wordpress Events & News
    // Other WordPress News Widget
    $dashboard_secondary = get_option( 'wlmpb_widget_secondary' );
    if (!empty($dashboard_secondary)) { remove_meta_box('dashboard_secondary','dashboard','side'); } // Other WordPress News
    // Activity Widget
    $dashboard_activity = get_option( 'wlmpb_widget_activity' );
    if (!empty($dashboard_activity)) { remove_meta_box('dashboard_activity','dashboard', 'normal'); } // Activity
    // Right Now Widget
    $dashboard_right_now = get_option( 'wlmpb_widget_glance' );
    if (!empty($dashboard_right_now)) { remove_meta_box('dashboard_right_now','dashboard', 'normal' ); } // Right Now
    // Quick Draft Widget
    $dashboard_quick_press = get_option( 'wlmpb_widget_draft' );
    if (!empty($dashboard_quick_press)) { remove_meta_box('dashboard_quick_press','dashboard','side'); } // Quick Draft
    // Recent Drafts Widget
    $dashboard_recent_drafts = get_option( 'wlmpb_widget_recent_drafts' );
    if (!empty($dashboard_recent_drafts)) { remove_meta_box('dashboard_recent_drafts','dashboard','side'); } // Recent Drafts
    // Incoming Links Widget
    $dashboard_incoming_links = get_option( 'wlmpb_widget_incoming_links' );
    if (!empty($dashboard_incoming_links)) { remove_meta_box('dashboard_incoming_links','dashboard','normal'); } // Incoming Links
    // Recent Comments Widget
    $dashboard_recent_comments = get_option( 'wlmpb_widget_recent_comments' );
    if (!empty($dashboard_recent_comments)) { remove_meta_box('dashboard_recent_comments','dashboard','normal'); } // Recent Comments
    // Site Health Widget
    $wlmpb_widget_site_health = get_option( 'wlmpb_widget_site_health' );
    if (!empty($wlmpb_widget_site_health)) { remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal'); } // Site Health

}
add_action('wp_dashboard_setup', 'wlmpb_remove_default_dashboard_widgets', 20);
add_action('wp_user_dashboard_setup', 'wlmpb_remove_default_dashboard_widgets', 20);