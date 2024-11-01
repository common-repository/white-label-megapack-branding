<?php

// Creates Widget Options Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_widget_tab', 1 );
function wlmpb_widget_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'dashboard-widget-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=dashboard-widget-settings' ); ?>"><p class="dashicons-before dashicons-dashboard"><?php _e( ' Dashboard ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Posts Options Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_posts_and_pages_tab', 2 );
function wlmpb_posts_and_pages_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'post-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=post-settings' ); ?>"><p class="dashicons-before dashicons-admin-post"><?php _e( ' Posts ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Media Options Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_media_tab', 3 );
function wlmpb_media_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'media-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=media-settings' ); ?>"><p class="dashicons-before dashicons-admin-media"><?php _e( ' Media ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Pages Options Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_posts_and_pages_tabs', 4 );
function wlmpb_posts_and_pages_tabs(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'pages-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=pages-settings' ); ?>"><p class="dashicons-before dashicons-admin-page"><?php _e( ' Pages ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Comments Options Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_comments_tabs', 5 );
function wlmpb_comments_tabs(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'comments-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=comments-settings' ); ?>"><p class="dashicons-before dashicons-admin-comments"><?php _e( ' Comments ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Header Footer Styling Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_dashboard_tab', 6 );
function wlmpb_dashboard_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'header-footer-admin-wordpress-settings' || '' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=header-footer-admin-wordpress-settings' ); ?>"><p class="dashicons-before dashicons-align-center"><?php _e( ' Header Footer ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Login Styling Tab SQLITE3_TEXT
add_action( 'wlmpb_settings_tab', 'wlmpb_login_tab', 7  );
function wlmpb_login_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'login-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=login-settings' ); ?>"><p class="dashicons-before dashicons-wordpress"><?php _e( ' Login Page ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Custom Login Redirect Styling Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_custom_login_redirect_tab', 8 );
function wlmpb_custom_login_redirect_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'custom-login-redirect-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=custom-login-redirect-settings' ); ?>"><p class="dashicons-before dashicons-undo"><?php _e( ' Custom Login Redirect ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Google recaptcha Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_google_recaptcha_tab', 9 );
function wlmpb_google_recaptcha_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'google-recaptcha-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=google-recaptcha-settings' ); ?>"><p class="dashicons-before dashicons-google"><?php _e( ' Google reCaptcha ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Cookie Bar Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_cookie_bar_tab', 10 );
function wlmpb_cookie_bar_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'cookie-bar-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=cookie-bar-settings' ); ?>"><p class="dashicons-before dashicons-minus"><?php _e( ' Cookie Bar ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}


// Creates Coming Soon Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_under_construction_tab', 11 );
function wlmpb_under_construction_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'coming-soon' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=coming-soon' ); ?>"><p class="dashicons-before dashicons-admin-settings"><?php _e( ' Coming Soon ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Custom Code Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_custom_code_tab', 12 );
function wlmpb_custom_code_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'custom-code' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=custom-code' ); ?>"><p class="dashicons-before dashicons-media-code"><?php _e( ' Custom Code ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Manager Website Role Tab
add_action( 'wlmpb_settings_tab', 'wlmpb_managerwebsite_tab', 13 );
function wlmpb_managerwebsite_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'managerwebsite-access' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=managerwebsite-access' ); ?>"><p class="dashicons-before dashicons-businessperson"><?php _e( ' Manager Website Role ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Admin Menu detect tab
add_action( 'wlmpb_settings_tab', 'wlmpb_admin_menu_detect_tab', 14 );
function wlmpb_admin_menu_detect_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'admin-menu-detect-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding?=auto-detect-menu' ); ?>"><p class="dashicons-before dashicons-hidden"><?php _e( ' Admin Menu Detect ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Admin Bar detect tab
add_action( 'wlmpb_settings_tab', 'wlmpb_admin_bar_detect_tab', 15 );
function wlmpb_admin_bar_detect_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'admin-bar-detect-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding?=auto-detect-admin-bar' ); ?>"><p class="dashicons-before dashicons-hidden"><?php _e( ' Admin Bar Detect ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Custom Admin Page tab
add_action( 'wlmpb_settings_tab', 'wlmpb_admin_custom_page_tab', 16 );
function wlmpb_admin_custom_page_tab(){
		global $wlmpb_active_tab; ?>
		<a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'admin-custom-page-settings' ? 'wlmpb-nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=custom-admin-page.php' ); ?>"><p class="dashicons-before dashicons-menu-alt"><?php _e( ' Custom Admin Pages ', 'white-label-megapack-branding' ); ?></p> </a>
		<?php
}

// Creates Documentation tab
add_action( 'wlmpb_settings_tab', 'wlmpb_documentation_tab', 17 );
function wlmpb_documentation_tab(){
		    global $wlmpb_active_tab; ?>
        <a class="wlmpb-nav-tab <?php echo $wlmpb_active_tab == 'documentation' ? 'wlmpb-nav-tab-active' : ''; ?> wlmpb-documentation-button" href="<?php echo admin_url( 'admin.php?page=white-label-megapack-branding&tab=documentation' ); ?>"><p class="dashicons-before dashicons-media-document"><?php _e( ' Documentation ', 'white-label-megapack-branding' ); ?></p> </a>
<?php }

