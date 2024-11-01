<?php


// Register White Label Megapack Branding settings
add_action( 'wlmpb_create_options', 'wlmpb_register_options', 1 );
function wlmpb_register_options() {


// Register Header e Footer Settings Fields
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_modern_theme' );
// Register Admin Bar e Menu Detect Automatic Fields
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_allow_access_from_hide_menu' );
// Register Reorder Admin Menu Fields
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_reorder_admin_menu' );
// Register Header e Footer Settings Fields continuos...
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_accent' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_text_color' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_text_hover_color' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_submenu_text_color' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_admin_bar_text_color' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_link_text_color' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_background_light' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_background_dark' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_border_color' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_hide_wp_logo' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_howdy_text' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_dashboard_admin_bar_disable_frontend' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_admin_footer_text' );
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_admin_footer_version' );

	
// Register Post and Pages Settings Fields
//post columns
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_cb_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_author_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_columns_posts_tag' );		
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_columns_posts_categories' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_comments_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_date_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_bulk_actions_posts' );
//post metabox
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_author_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_thumbnail_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_excerpt_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_trackbacks_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_custom_fields_posts' );	
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_comments_posts' );	
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_revisions_posts' );	
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_page_attributes_posts' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_post_formats_posts' );	
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_posts_categories' );	
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_tags_posts' );
	
	
// Register Media Fields
register_setting( 'white-label-megapack-branding-media', 'wlmpb_hide_bulk_actions_media' );
register_setting( 'white-label-megapack-branding-media', 'wlmpb_add_categories_media' );
register_setting( 'white-label-megapack-branding-media', 'wlmpb_hide_create_gallery_mediauploadwy' );
register_setting( 'white-label-megapack-branding-media', 'wlmpb_hide_create_playlist_mediauploadwy' );
register_setting( 'white-label-megapack-branding-media', 'wlmpb_hide_create_videoplaylist_mediauploadwy' );
register_setting( 'white-label-megapack-branding-media', 'wlmpb_hide_insert_fromurl_mediauploadwy' );
	
// Register Post and Pages Settings Fields
//pages columns
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_cb_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_author_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_comments_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_date_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_bulk_actions_pages' );
//pages metabox
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_author_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_thumbnail_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_excerpt_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_trackbacks_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_custom_fields_pages' );	
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_comments_pages' );	
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_revisions_pages' );	
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_page_attributes_pages' );
register_setting( 'white-label-megapack-branding-posts-and-pages', 'wlmpb_hide_metabox_post_formats_pages' );
	
// Register Comments Fields
register_setting( 'white-label-megapack-branding-comments', 'wlmpb_hide_author_comments_frontend' );
register_setting( 'white-label-megapack-branding-comments', 'wlmpb_hide_email_comments_frontend' );
register_setting( 'white-label-megapack-branding-comments', 'wlmpb_hide_url_comments_frontend' );

// Register Admin Bar Color in Frontend
register_setting( 'white-label-megapack-branding-settings', 'wlmpb_misc_admin_bar_frontend_styling' );


// Register Login Page Settings Fields
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_logo' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_logo_width' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_logo_height' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_logo_padding_bottom' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_body_text_color' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_background_color' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_background_image' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_overlay_color' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_overlay_opacity' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_custom_content' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_hide_main_site_link' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_hide_rememberme_checkbox' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_hide_password_link' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_rename_wpadmin' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_logo_url' );
register_setting( 'white-label-megapack-branding-login', 'wlmpb_login_logo_title' );
	
// Register Cookie Bar Settings Fields
register_setting( 'white-label-megapack-branding-cookie-bar', 'wlmpb_cookie_bar_activation' );
register_setting( 'white-label-megapack-branding-cookie-bar', 'wlmpb_cookie_bar_color_field_backgroundcolor' );
register_setting( 'white-label-megapack-branding-cookie-bar', 'wlmpb_cookie_bar_color_field_textcolor' );
register_setting( 'white-label-megapack-branding-cookie-bar', 'wlmpb_cookie_bar_text_field_cookiesmessage' );
register_setting( 'white-label-megapack-branding-cookie-bar', 'wlmpb_cookie_bar_text_field_cookiesurl' );
register_setting( 'white-label-megapack-branding-cookie-bar', 'wlmpb_cookie_bar_text_field_cookiesanchor' );
register_setting( 'white-label-megapack-branding-cookie-bar', 'wlmpb_cookie_bar_color_field_button_backgroundcolor' );
register_setting( 'white-label-megapack-branding-cookie-bar', 'wlmpb_cookie_bar_color_field_button_textcolor' );
	
// Register Google Recaptcha Fields
register_setting( 'white-label-megapack-branding-google-recaptcha', 'wlmpb_google_recaptcha_active' );
register_setting( 'white-label-megapack-branding-google-recaptcha', 'wlmpb_google_recaptcha_site_key' );
register_setting( 'white-label-megapack-branding-google-recaptcha', 'wlmpb_google_recaptcha_secret_key' );
register_setting( 'white-label-megapack-branding-google-recaptcha', 'wlmpb_google_recaptcha_woocommerce_loginregister' );


// Register Manager Website Role Settings Fields
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_access' );
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_appearance' ); // Customize
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_settings' ); // Manage Settings
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_manage_users' ); // Manage Users
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_manage_administrators' ); // Manage Administrators
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_manage_plugins' ); // Manage Plugins
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_manage_theme' ); // Manage Themes
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_update_capability' ); // Update Capability
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_edit_files' ); // Edit Files
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_import' ); // Import
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_managerwebsite_export' ); // Export
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_dashboard_admin_bar_screen_options' );
register_setting( 'white-label-megapack-branding-managerwebsite', 'wlmpb_dashboard_admin_bar_help' );


// Register Widget Settings Fields in section dashboard
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_welcome' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_glutenberg' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_primary' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_secondary' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_activity' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_glance' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_draft' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_recent_drafts' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_incoming_links' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_recent_comments' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_site_health' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_rows' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget_shortcode' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget_two_shortcode' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget_three_shortcode' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget_four_shortcode' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget_two' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget_three' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget_four' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_custom_widget_count' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_title' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_body' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_two_title' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_two_body' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_three_title' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_three_body' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_four_title' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_widget_four_body' );

// Register Welcome Message Fields in section dashboard
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_message_title' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_message_body' );
register_setting( 'white-label-megapack-branding-widget', 'wlmpb_message_disable' );


// Register Tracking and Custom Code Fields
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_google_analytics' );
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_facebook_pixel' );
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_custom_script' );
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_custom_css' );
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_custom_css_admin' );
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_custom_js' );


// Register Coming Soon Fields
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_disable' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_login_logo' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_login_logo_width' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_title' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_title_padding_bottom' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_body' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_social_padding' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_facebook' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_instagram' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_twitter' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_linkedin' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_youtube' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_background_color' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_background_image' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_text_color' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_button_text_color' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_font_family' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_overlay_color' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_overlay_opacity' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_construction_logo_padding_bottom' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_button_text' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_button_link' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_button_color' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_button_radius' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_meta_title' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_meta_description' );
register_setting( 'white-label-megapack-branding-under_construction', 'wlmpb_under_construction_social_title' );


// Deprecated settings. Keep here to allows users using old versions to delete in /wp-admin/options.php
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_landing_custom_css' );
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_admin_custom_css' );
register_setting( 'white-label-megapack-branding-tracking', 'wlmpb_cc_google_pixel' );

}
