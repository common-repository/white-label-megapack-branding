<?php
/*
* Get latest version
*/

if ( ! function_exists ( 'wlmpbamw_include_init' ) ) {
	function wlmpbamw_include_init( $base ) {
		global $wlmpbglsplgns_options, $wlmpbglsplgns_added_menu;
		if ( ! function_exists( 'get_plugin_data' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );


			if ( ! isset( $plugin_with_newer_menu ) )
				$plugin_with_newer_menu = $base;
			$plugin_with_newer_menu = explode( '/', $plugin_with_newer_menu );
			$wp_content_dir = defined( 'WP_CONTENT_DIR' ) ? basename( WP_CONTENT_DIR ) : 'wp-content';

			if ( file_exists( ABSPATH . $wp_content_dir . '/plugins/' . $plugin_with_newer_menu[0] ) ) {
				require_once( dirname( __FILE__ ) . '/wlmpbam_functions.php' );
			}

			$wlmpbglsplgns_added_menu = true;
		}		
	
}