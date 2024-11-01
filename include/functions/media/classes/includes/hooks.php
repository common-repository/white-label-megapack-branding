<?php

/**
 * Wlmpb Media Categories Actions & Filters
 *
 * @package Media/Categories/Hooks
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// Init
add_action( 'init', 'wlmpb_media_categories_register_media_taxonomy' );

// Admin
add_action( 'admin_enqueue_scripts',	'wlmpb_media_categories_enqueue_admin_scripts' );
add_action( 'admin_footer-upload.php',	'wlmpb_media_categories_custom_bulk_admin_footer' );
add_action( 'admin_notices',			'wlmpb_media_categories_custom_bulk_admin_notices' );
add_action( 'load-upload.php',			'wlmpb_media_categories_custom_bulk_action' );

// Save attachments
add_action( 'add_attachment',  'wlmpb_media_categories_set_attachment_category' );
add_action( 'edit_attachment', 'wlmpb_media_categories_set_attachment_category' );

// Set custom selector in media window
add_filter( 'attachment_fields_to_edit', 'wlmpb_media_attachment_fields', 10, 2 );

// filter the attachments from user dropdown
add_action( 'wp_ajax_query-attachments', 'wlmpb_media_categories_ajax_query_attachments', 0 );

// update the categories
add_action( 'wp_ajax_save-attachment-compat', 'wlmpb_media_categories_ajax_update_attachment_taxonomies', 0 );

// Some filters and action to process categories
add_action( 'restrict_manage_posts', 'wlmpb_media_categories_restrict_manage_posts' );

// Filter for `no_category` media category attachments list-table requests
add_filter( 'request', 'wlmpb_media_categories_no_category_request' );

// Filter theme-side media category queries
add_action( 'pre_get_posts', 'wlmpb_media_categories_pre_get_posts' );

// Add a shortcode to enable media_categories to be loaded into the default gallery shortcode
add_shortcode( 'mc-gallery', 'wlmpb_media_categories_register_gallery_shortcode' );
