<?php

// Function default file Reorder Menu Drag Drop.
require( plugin_dir_path( __FILE__ ) . '/functions/re-order-menu-admin/re-order-menu-admin.php');

// Function file for tab Dashboard Widget.
require( plugin_dir_path( __FILE__ ) . '/functions/dashboard/dashboard-widget.php');

// Function file for tab Media.
require( plugin_dir_path( __FILE__ ) . '/functions/media/media.php');

// Function file for tab Posts and Pages.
require( plugin_dir_path( __FILE__ ) . '/functions/posts-and-pages/posts-and-pages.php');

// Function file for tab Comments.
require( plugin_dir_path( __FILE__ ) . '/functions/comments/comments.php');

// Function file for tab Login Page.
require( plugin_dir_path( __FILE__ ) . '/functions/login-page/login-page.php');

// Function file for tab Custom Login Redirect.
require( plugin_dir_path( __FILE__ ) . '/functions/custom-login-redirect/custom-login-redirect.php');

// Function file for tab Header e Footer.
require( plugin_dir_path( __FILE__ ) . '/functions/header-footer/header-footer.php');

// Function file for tab Cookie Bar.
require( plugin_dir_path( __FILE__ ) . '/functions/cookie-bar/cookie-bar.php');

// Function file for tab Google Recaptcha.
require( plugin_dir_path( __FILE__ ) . '/functions/google-recaptcha/google-recaptcha.php');

// Function file for tab Coming Soon.
require( plugin_dir_path( __FILE__ ) . '/functions/coming-soon/coming-soon.php');

// Function file for tab Tracking e Custom Code.
require( plugin_dir_path( __FILE__ ) . '/functions/custom-code/custom-code.php');

// Upload image function
function wlmpb_load_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'wlmpb_load_media_files' );

add_action( 'admin_init', 'wlmpb_main_register_options' );
function wlmpb_main_register_options() {
    do_action( 'wlmpb_create_options' );
}
