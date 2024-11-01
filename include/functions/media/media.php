<?php

/**
 * Include the Wlmpb Media Categories files Extra settings
 *
 *
 */
function _wlmpb_media_categories() {

	$wlmpb_active_categories_media = get_option('wlmpb_add_categories_media');
        if ( !empty($wlmpb_active_categories_media) ) { 
	// Get the plugin path
	$plugin_path = plugin_dir_path( __FILE__ ) . 'classes/';

	// Admin-only common files
	require_once $plugin_path . 'includes/admin.php';
	require_once $plugin_path . 'includes/ajax.php';
	require_once $plugin_path . 'includes/functions.php';
	require_once $plugin_path . 'includes/taxonomies.php';
	require_once $plugin_path . 'includes/walkers.php';
	require_once $plugin_path . 'includes/hooks.php';
}
	}
add_action( 'plugins_loaded', '_wlmpb_media_categories' );

function wlmpb_media_categories_get_plugin_url() {
	return plugin_dir_url( __FILE__ ) . 'classes/';
}

/**
 * Media Upload Functions in Wysiwyg
 *
 *
 */

add_filter('media_view_strings', 'wlmpb_hide_functions_mediauploadwy');
	function wlmpb_hide_functions_mediauploadwy ( $strings ) {
		
		$hide_create_gallery_mediauploadwy = get_option( 'wlmpb_hide_create_gallery_mediauploadwy' );
		$hide_create_playlist_mediauploadwy = get_option( 'wlmpb_hide_create_playlist_mediauploadwy' );
		$hide_create_videoplaylist_mediauploadwy = get_option( 'wlmpb_hide_create_videoplaylist_mediauploadwy' );
		$hide_insert_fromurl_mediauploadwy = get_option( 'wlmpb_hide_insert_fromurl_mediauploadwy' );
		
    if (!empty($hide_create_gallery_mediauploadwy)) {
		
		$strings['createGalleryTitle']       = null;
		}// Remove "Create gallery"-button.
		
	if (!empty($hide_create_playlist_mediauploadwy)) {	
		$strings['createPlaylistTitle']      = null;
		}// Remove "Create Audio Playlist"-button.
		
	if (!empty($hide_create_videoplaylist_mediauploadwy)) {	
		$strings['createVideoPlaylistTitle'] = null;
		}// Remove "Create Video Playlist"-button.
		
	if (!empty($hide_insert_fromurl_mediauploadwy)) {	
		$strings['insertFromUrlTitle']       = null;
		}// Remove "Insert from URL"-button.
		
		
		//$strings['setFeaturedImageTitle']    = null; // Remove "Featured Image"

		return $strings;
	}

//Hide Bulk Actions after edit in media only works in list view
$hide_bulk_actions_media = get_option( 'wlmpb_hide_bulk_actions_media' );
if (!empty($hide_bulk_actions_media)) {		
add_action( 'wp_loaded', 'wlmpb_remove_bulk_actions_media' );
function wlmpb_remove_bulk_actions_media(){
    add_filter( 'bulk_actions-upload',    '__return_empty_array' );
}
	}