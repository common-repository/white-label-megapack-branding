<?php

/**
 * Wlmpb Media Categories Taxonomies
 *
 * @package Media/Categories/Taxonomies
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Register media taxonomies
 *
 * @since 0.1.0
 */
function wlmpb_media_categories_register_media_taxonomy() {
	register_taxonomy( 'media_category', array( 'attachment' ), array(
		'hierarchical'			=> true,
		'show_ui'				=> true,
		'show_admin_column'		=> true,
		'public'				=> true,
		'show_in_nav_menus'		=> false,
		'query_var'				=> true,
		'update_count_callback'	=> 'wlmpb_media_categories_update_count_callback',
		'labels'                => array(
			'name'				=> __( 'Categories',        'white-label-megapack-branding' ),
			'singular_name'		=> __( 'Category',          'white-label-megapack-branding' ),
			'menu_name'			=> __( 'Categories',        'white-label-megapack-branding' ),
			'all_items'			=> __( 'All Categories',    'white-label-megapack-branding' ),
			'edit_item'			=> __( 'Edit Category',     'white-label-megapack-branding' ),
			'view_item'			=> __( 'View Category',     'white-label-megapack-branding' ),
			'update_item'		=> __( 'Update Category',   'white-label-megapack-branding' ),
			'add_new_item'		=> __( 'Add New Category',  'white-label-megapack-branding' ),
			'new_item_name'		=> __( 'New Category Name', 'white-label-megapack-branding' ),
			'parent_item'		=> __( 'Parent Category',   'white-label-megapack-branding' ),
			'parent_item_colon'	=> __( 'Parent Category:',  'white-label-megapack-branding' ),
			'search_items'		=> __( 'Search Categories', 'white-label-megapack-branding' )
		),
		'rewrite' => array(
			'with_front'   => false,
			'heirarchical' => true,
			'slug'         => 'media-category'
		)
	) );
}
