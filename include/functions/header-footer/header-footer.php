<?php
// Change howdy text on admin bar
function wlmpb_howdy_message($text) {
$wlmpb_howdy_text_change = get_option('wlmpb_howdy_text');
    if (!empty($wlmpb_howdy_text_change)) {
        $new_message = str_replace('Howdy', "$wlmpb_howdy_text_change", $text);
    } else {
        $new_message = str_replace('Howdy', "Howdy", $text);
    }
return $new_message;
}
add_filter('gettext', 'wlmpb_howdy_message', 10, 3);

// Change Admin Footer Text
function wlmpb_admin_footer_text () {
$wlmpb_admin_footer_text = get_option( 'wlmpb_admin_footer_text' );
    if (!empty($wlmpb_admin_footer_text)) {
        echo "$wlmpb_admin_footer_text";
    } else {
        $wlmpb_white_label_wordpress = get_option( 'wlmpb_dashboard_hide_wp_logo' );
        if (empty($wlmpb_white_label_wordpress)) {
            echo '<span id="footer-thankyou">Thank you for creating with <a href="https://wordpress.org/">WordPress</a>.</span>';
        }
    }
}
add_filter('admin_footer_text', 'wlmpb_admin_footer_text');


// Remove WordPress Footer Version
function wlmpb_remove_wordpress_footer_version() {
    $wlmpb_admin_footer_version = get_option('wlmpb_admin_footer_version');
    if (!empty($wlmpb_admin_footer_version)) {
        remove_filter( 'update_footer', 'core_update_footer' );
    }
}
add_action( 'admin_menu', 'wlmpb_remove_wordpress_footer_version' );


// Remove WordPress admin bar links
function wlmpb_remove_admin_bar_content() {
    global $wp_admin_bar;
    $wlmpb_dashboard_hide_wp_logo = get_option('wlmpb_dashboard_hide_wp_logo');
    if (!empty($wlmpb_dashboard_hide_wp_logo)) {
        $wp_admin_bar->remove_node( 'wp-logo' ); // Remove the WordPress logo
    }
}
add_action( 'admin_bar_menu', 'wlmpb_remove_admin_bar_content', 999 );


// Apply branding to frontend admin bar
function wlmpb_admin_bar_frontend_styling(){
// If admin bar frontend styling is enabled
$wlmpb_misc_admin_bar_frontend_styling = get_option('wlmpb_misc_admin_bar_frontend_styling');
if ( empty($wlmpb_misc_admin_bar_frontend_styling) ) {
    // Only add styling when user is logged in to help with site optimization
    if ( is_user_logged_in() ) { ?>
        <style>
            <?php // Start Admin Bar Styling
            $wlmpb_dashboard_admin_bar_text_color = get_option('wlmpb_dashboard_admin_bar_text_color');
            if ( !empty($wlmpb_dashboard_admin_bar_text_color) ) { ?>
                #wpadminbar span, #wpadminbar a.auto-fold #adminmenu div.wp-menu-image,
                #adminmenu li.current a.menu-top,
                #adminmenu li.wp-has-current-submenu div.wp-menu-image:before, #adminmenu li.current a.menu-top div.wp-menu-image:before,
                #wpadminbar .ab-icon, #wpadminbar .ab-item:before, #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default .ab-icon,#wpadminbar #adminbarsearch:before, #wpadminbar .ab-icon:before, #wpadminbar .ab-item:before,
                #wpadminbar a.ab-item,
                #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .wp-menu-name:focus,
                #wpadminbar .ab-empty-item,
                #adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before {
                    color: <?php echo get_option('wlmpb_dashboard_admin_bar_text_color') ?> !important;
                }
                @media screen and (max-width: 782px) {
                #wpadminbar .ab-icon, #wpadminbar .ab-item:before, #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default .ab-icon,
                .wp-responsive-open #wpadminbar #wp-admin-bar-menu-toggle .ab-icon:before, #wpadminbar #wp-admin-bar-menu-toggle .ab-icon:before {
                    color: <?php echo get_option('wlmpb_dashboard_admin_bar_text_color') ?> !important;

                }
                }
            <?php }
            $wlmpb_dashboard_accent = get_option('wlmpb_dashboard_accent');
            if ( !empty($wlmpb_dashboard_accent) ) { ?>
                #wpadminbar .ab-top-menu>#wp-admin-bar-my-account.hover>.ab-item span, #adminmenu li.current a.menu-top:hover div.wp-menu-image:before, #adminmenu li.current a.menu-top:hover,
                #wpadminbar span:hover, #wpadminbar a:hover,
                #wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover>a, #wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, #wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:focus, #wpadminbar .quicklinks .menupop.hover ul li div[tabindex]:hover, #wpadminbar li #adminbarsearch.adminbar-focused:before, #wpadminbar li .ab-item:focus .ab-icon:before, #wpadminbar li .ab-item:focus:before, #wpadminbar li a:focus .ab-icon:before, #wpadminbar li.hover .ab-icon:before, #wpadminbar li.hover .ab-item:before, #wpadminbar li:hover #adminbarsearch:before, #wpadminbar li:hover .ab-icon:before, #wpadminbar li:hover .ab-item:before, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover, #wpadminbar.mobile .quicklinks .hover .ab-icon:before, #wpadminbar.mobile .quicklinks .hover .ab-item:before,
                #wpadminbar #wp-admin-bar-user-info .display-name:hover,
                #wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus,
                #wpadminbar .menupop .ab-sub-wrapper:hover,
                #wpadminbar .ab-top-menu>#wp-admin-bar-new-content.hover>.ab-item span,
                #wpadminbar .quicklinks .menupop ul li .ab-item span,
                #wpadminbar .quicklinks .menupop.hover .ab-item span {
                    color: <?php echo get_option('wlmpb_dashboard_accent') ?> !important;
                }
                #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu, #adminmenu li a.wp-has-current-submenu .update-plugins, #adminmenu li.current a .awaiting-mod, #wpadminbar {
                    background: <?php echo get_option('wlmpb_dashboard_accent') ?> !important;
                }
            <?php }
            $wlmpb_dashboard_background_light = get_option('wlmpb_dashboard_background_light');
            if ( !empty($wlmpb_dashboard_background_light) ) { ?>
                #adminmenu .wp-submenu {
                    background: <?php echo get_option('wlmpb_dashboard_background_light') ?> !important;
                }
                #adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu, #adminmenu div.wp-menu-name:active, #adminmenu li.opensub>a.menu-top,#adminmenu .wp-submenu li:hover, #wpadminbar .shortlink-input,#wpadminbar a.ab-item:hover  {
                    background: <?php echo get_option('wlmpb_dashboard_background_light') ?> !important;
                }
                #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
                    background: <?php echo get_option('wlmpb_dashboard_background_light') ?>;
                }
            <?php }
            $wlmpb_dashboard_background_dark = get_option('wlmpb_dashboard_background_dark');
            if ( !empty($wlmpb_dashboard_background_dark) ) { ?>
                #adminmenu, #adminmenuback, #adminmenuwrap,
                #wpadminbar .menupop .ab-sub-wrapper,
                #wpadminbar .quicklinks .menupop ul.ab-sub-secondary, #wpadminbar .quicklinks .menupop ul.ab-sub-secondary .ab-submenu {
                    background: <?php echo get_option('wlmpb_dashboard_background_dark') ?> !important;
                }
                @media screen and (max-width: 782px) {
                    .wp-has-submenu.wp-not-current-submenu.menu-top {
                        background: <?php echo get_option('wlmpb_dashboard_background_dark') ?> !important;
                    }
                }
            <?php }
            $wlmpb_dashboard_background_light = get_option('wlmpb_dashboard_background_light');
            if ( !empty($wlmpb_dashboard_background_light) ) { ?>
                #adminmenu li.current a.menu-top:hover,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu:hover {
                    background: <?php echo get_option('wlmpb_dashboard_background_light') ?> !important;
                }
            <?php }
            $wlmpb_dashboard_background_dark = get_option('wlmpb_dashboard_background_dark');
            if ( !empty($wlmpb_dashboard_background_dark) ) { ?>
                #wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu>li:hover>.ab-item, #wpadminbar:not(.mobile) .ab-top-menu>li>.ab-item:focus,
                #wpadminbar .menupop .ab-sub-wrapper:hover {
                    background: <?php echo get_option('wlmpb_dashboard_background_dark') ?> !important;
                }
            <?php } ?>
            <?php $wlmpb_dashboard_text_color = get_option('wlmpb_dashboard_text_color');
            if ( !empty($wlmpb_dashboard_text_color) ) { ?>
                #adminmenu li div.wp-menu-image:before, #adminmenu .wp-menu-image img, #collapse-menu span,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, #wpadminbar #wp-admin-bar-user-info .display-name, #wpadminbar .menupop:hover .display-name,
                #wpadminbar .quicklinks .menupop ul li .ab-item, #wpadminbar .ab-topmenu>li.hover>.ab-item, #wpadminbar .ab-topmenu>li:hover>.ab-item, #wpadminbar .ab-topmenu>li.hover>.ab-item:focus, #wpadminbar ul#wp-admin-bar-root-default>li:hover span.ab-label {
                    color: <?php echo get_option('wlmpb_dashboard_text_color') ?> !important;
                }
                #adminmenuwrap a,
                #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu:hover,
                .current.menu-top.menu-top-first.menu-top-last a :hover {
                    color: <?php echo get_option('wlmpb_dashboard_text_color') ?> !important;
                }
            <?php } ?>
            #wpadminbar .quicklinks li#wp-admin-bar-my-account.with-avatar>a img {
                float:left;
                margin:5px 15px;
                width:20px;
                height:20px;
                border:1px solid #FFF;
                border-radius:50%
            }
            @media screen and (max-width: 782px) {
                #wpadminbar .quicklinks li#wp-admin-bar-my-account.with-avatar>a {
                    width: 70px;
                }
                #wpadminbar .quicklinks li#wp-admin-bar-my-account.with-avatar>a img {
                    top: 7px;
                }
            }
            #wp-admin-bar-wlmpb-coming-soon-notice a.ab-item {
                color: #fff!important;
            }
        </style>
<?php   }
    }
}
add_action('wp_head', 'wlmpb_admin_bar_frontend_styling');
