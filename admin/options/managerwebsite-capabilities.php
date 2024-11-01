<?php


// Creates new user role Manager Webiste
function wlmpb_default_managerwebsite_roles()
{
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    $edt = $wp_roles->get_role('editor');
    //Adding a 'new_role' with all editor caps
    $wp_roles->add_role('manager_website', 'Manager Website', $edt->capabilities);
}
add_action( 'wlmpb_extension_activation', 'wlmpb_default_managerwebsite_roles');


// Adds Appearance Capability
function wlmpb_managerwebsite_caps_appearance() {
$dash_managerwebsite_appearance = get_option('wlmpb_managerwebsite_appearance');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_managerwebsite_appearance)) {
        $role->add_cap( 'edit_theme_options' );
    } else {
        $role->remove_cap( 'edit_theme_options' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_appearance');


// Adds Settings Capability
function wlmpb_managerwebsite_caps_settings() {
$dash_managerwebsite_settings = get_option('wlmpb_managerwebsite_settings');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_managerwebsite_settings)) {
        $role->add_cap( 'manage_options' );
    } else {
        $role->remove_cap( 'manage_options' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_settings');


// Adds Manage Users Capability
function wlmpb_managerwebsite_caps_users() {
$dash_manage_users = get_option('wlmpb_managerwebsite_manage_users');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_manage_users)) {
        $role->add_cap( 'edit_users' );
        $role->add_cap( 'create_users' );
        $role->add_cap( 'delete_users' );
        $role->add_cap( 'list_users' );
    } else {
        $role->remove_cap( 'edit_users' );
        $role->remove_cap( 'create_users' );
        $role->remove_cap( 'delete_users' );
        $role->remove_cap( 'list_users' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_users');


// Adds Manage Plugins Capability
function wlmpb_managerwebsite_caps_plugins() {
$dash_manage_plugins = get_option('wlmpb_managerwebsite_manage_plugins');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_manage_plugins)) {
        $role->add_cap( 'install_plugins' );
        $role->add_cap( 'delete_plugins' );
        $role->add_cap( 'activate_plugins' );
        $role->add_cap( 'update_plugins' );
    } else {
        $role->remove_cap( 'install_plugins' );
        $role->remove_cap( 'delete_plugins' );
        $role->remove_cap( 'activate_plugins' );
        $role->remove_cap( 'update_plugins' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_plugins');

// Hide plugin WLMPB from list all plugins only for role Manager Website
add_action('pre_current_active_plugins', 'wlmpb_hide_pluginwlmpb_only_role_managerwebiste');
function wlmpb_hide_pluginwlmpb_only_role_managerwebiste() {
	if (current_user_can('manager_website')) {
    global $wp_list_table;
    $hidearr = array('white-label-megapack-branding/white-label-megapack-branding.php');

    $myplugins = $wp_list_table->items;

    foreach ($myplugins as $key => $val) {
        if ( in_array($key, $hidearr) ) {
            unset( $wp_list_table->items[$key] );
        }
    }
}
	}


// Adds Manage Themes Capability
function wlmpb_managerwebsite_caps_themes() {
$dash_manage_themes = get_option('wlmpb_managerwebsite_manage_theme');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_manage_themes)) {
        $role->add_cap( 'install_themes' );
        $role->add_cap( 'switch_themes' );
        $role->add_cap( 'update_themes' );
        $role->add_cap( 'edit_themes' );
        $role->add_cap( 'delete_themes' );
    } else {
        $role->remove_cap( 'install_themes' );
        $role->remove_cap( 'switch_themes' );
        $role->remove_cap( 'update_themes' );
        $role->remove_cap( 'edit_themes' );
        $role->remove_cap( 'delete_themes' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_themes');


// Adds Manage Update Capability
function wlmpb_managerwebsite_caps_update() {
$dash_update_capability = get_option('wlmpb_managerwebsite_update_capability');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_update_capability)) {
        $role->add_cap( 'update_core' );
    } else {
        $role->remove_cap( 'update_core' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_update');


// Adds Update Files Capability
function wlmpb_managerwebsite_caps_files() {
$dash_edit_files = get_option('wlmpb_managerwebsite_edit_files');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_edit_files)) {
        $role->add_cap( 'edit_files' );
        $role->add_cap( 'edit_themes' );
        $role->add_cap( 'edit_plugins' );
    } else {
        $role->remove_cap( 'edit_files' );
        $role->remove_cap( 'edit_themes' );
        $role->remove_cap( 'edit_plugins' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_files');


// Adds Import Capability
function wlmpb_managerwebsite_caps_import() {
$dash_import = get_option('wlmpb_managerwebsite_import');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_import)) {
        $role->add_cap( 'import' );
    } else {
        $role->remove_cap( 'import' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_import');


// Adds Export Capability
function wlmpb_managerwebsite_caps_export() {
$dash_export = get_option('wlmpb_managerwebsite_export');
    global $wp_roles;
    $role = get_role( 'manager_website' );
    if (!empty($dash_export)) {
        $role->add_cap( 'export' );
    } else {
        $role->remove_cap( 'export' );
    }
}
add_action( 'admin_init', 'wlmpb_managerwebsite_caps_export');

// Function to remove help tab from the WordPress dashboard
function wlmpb_remove_help_tab(){
    $wlmpb_dashboard_admin_bar_help = get_option('wlmpb_dashboard_admin_bar_help');
    if (!empty($wlmpb_dashboard_admin_bar_help)) {
        if (current_user_can('manager_website')) {
            $screen = get_current_screen();
            $screen->remove_help_tabs();
        }
    }
}
add_action('admin_head', 'wlmpb_remove_help_tab');



