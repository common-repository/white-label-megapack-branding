<?php

//POST COLUMNS

// Hide column checkbox in all posts
add_action('admin_init','wlmpb_remove_cb_posts');
	function wlmpb_remove_cb_posts () {
		$hide_cb_posts = get_option( 'wlmpb_hide_cb_posts' );
    if (!empty($hide_cb_posts)) {
		// Checkbox
		add_filter('manage_posts_columns','wlmpb_remove_columns_cb_now');
			function wlmpb_remove_columns_cb_now ( $columns ) {
				unset($columns['cb']);

				return $columns;
			}
		}
		
	}

// Hide column author in all posts
add_action('admin_init','wlmpb_remove_author_posts');
	function wlmpb_remove_author_posts () {
		$hide_author_posts = get_option( 'wlmpb_hide_author_posts' );
    if (!empty($hide_author_posts)) {
		// Checkbox
		add_filter('manage_posts_columns','wlmpb_remove_columns_author_now');
			function wlmpb_remove_columns_author_now ( $columns ) {
				unset($columns['author']);

				return $columns;
			}
		}
		
	}

// Hide columns categories in all posts
add_action('admin_init','wlmpb_remove_columns_posts_categories');
	function wlmpb_remove_columns_posts_categories () {
		$hide_columns_posts_categories = get_option( 'wlmpb_hide_columns_posts_categories' );
    if (!empty($hide_columns_posts_categories)) {
		// Categories
		add_filter('manage_posts_columns','wlmpb_remove_columns_posts_categories_now');
			function wlmpb_remove_columns_posts_categories_now ( $columns ) {
				unset($columns['categories']);

				return $columns;
			}
		}
		
	}

// Hide columns tag in all posts
add_action('admin_init','wlmpb_remove_columns_posts_tag');
	function wlmpb_remove_columns_posts_tag () {
		$hide_columns_posts_tag = get_option( 'wlmpb_hide_columns_posts_tag' );
    if (!empty($hide_columns_posts_tag)) {
		// Categories
		add_filter('manage_posts_columns','wlmpb_remove_columns_posts_tag_now');
			function wlmpb_remove_columns_posts_tag_now ( $columns ) {
				unset($columns['tags']);

				return $columns;
			}
		}
		
	}

// Hide column comments in all posts
add_action('admin_init','wlmpb_remove_comments_posts');
	function wlmpb_remove_comments_posts () {
		$hide_comments_posts = get_option( 'wlmpb_hide_comments_posts' );
    if (!empty($hide_comments_posts)) {
		// Checkbox
		add_filter('manage_posts_columns','wlmpb_remove_columns_comments_now');
			function wlmpb_remove_columns_comments_now ( $columns ) {
				unset($columns['comments']);

				return $columns;
			}
		}
		
	}

// Hide column date in all posts
add_action('admin_init','wlmpb_remove_date_posts');
	function wlmpb_remove_date_posts () {
		$hide_date_posts = get_option( 'wlmpb_hide_date_posts' );
    if (!empty($hide_date_posts)) {
		// Checkbox
		add_filter('manage_posts_columns','wlmpb_remove_columns_date_now');
			function wlmpb_remove_columns_date_now ( $columns ) {
				unset($columns['date']);

				return $columns;
			}
		}
		
	}
	

//Hide Bulk Actions after edit posts
add_action('admin_init','wlmpb_remove_bulk_actions_posts');
	function wlmpb_remove_bulk_actions_posts () {
		$hide_bulk_actions_posts = get_option( 'wlmpb_hide_bulk_actions_posts' );
if (!empty($hide_bulk_actions_posts)) {
	
add_filter('bulk_actions-edit-post', 'wlmpb_remove_bulk_actions_posts_now');
    function wlmpb_remove_bulk_actions_posts_now ($actions) {
    
        unset(
            $actions['edit'],
            $actions['trash']
        );

        return $actions;
    }
		}
		}

//POST METABOX

// Hide categories metabox in posts
add_filter('rest_prepare_taxonomy', 'wlmpb_remove_metabox_posts_categories', 10, 2);
	function wlmpb_remove_metabox_posts_categories( $response, $taxonomy ) {
		$hide_metabox_posts_categories = get_option( 'wlmpb_hide_metabox_posts_categories' );
    if (!empty($hide_metabox_posts_categories)) {

		if ( 'category' == $taxonomy->name ) {
			$response->data['visibility']['show_ui'] = false;
		}
		}

		return $response;
	}

// Hide tags metabox in posts
add_filter('rest_prepare_taxonomy', 'wlmpb_remove_metabox_tags_posts', 10, 2);
	function wlmpb_remove_metabox_tags_posts( $response, $taxonomy ) {
		$hide_metabox_tags_posts = get_option( 'wlmpb_hide_metabox_tags_posts' );
    if (!empty($hide_metabox_tags_posts)) {

		if ( 'post_tag' == $taxonomy->name ) {
			$response->data['visibility']['show_ui'] = false;
		}
		}

		return $response;
	}

// Other Metabox - Post type support
add_action('init', 'wlmpb_remove_metabox_posts');
    function wlmpb_remove_metabox_posts () {
		$post_type = 'post';
		
	    $hide_metabox_author_posts = get_option( 'wlmpb_hide_metabox_author_posts' );
        $hide_metabox_thumbnail_posts = get_option( 'wlmpb_hide_metabox_thumbnail_posts' );
		$hide_metabox_excerpt_posts = get_option( 'wlmpb_hide_metabox_excerpt_posts' );
		$hide_metabox_trackbacks_posts = get_option( 'wlmpb_hide_metabox_trackbacks_posts' );
		$hide_metabox_custom_fields_posts = get_option( 'wlmpb_hide_metabox_custom_fields_posts' );
		$hide_metabox_comments_posts = get_option( 'wlmpb_hide_metabox_comments_posts' );
		$hide_metabox_revisions_posts = get_option( 'wlmpb_hide_metabox_revisions_posts' );
		$hide_metabox_page_attributes_posts = get_option( 'wlmpb_hide_metabox_page_attributes_posts' );
		$hide_metabox_post_formats_posts = get_option( 'wlmpb_hide_metabox_post_formats_posts' );
		
		
		if (!empty($hide_metabox_author_posts)) {
		// Remove author
		remove_post_type_support( $post_type, 'author' );
        }
		
		if (!empty($hide_metabox_thumbnail_posts)) {
		// Remove thumbnail
		remove_post_type_support( $post_type, 'thumbnail' );
        }
		
		if (!empty($hide_metabox_excerpt_posts)) {
		// Remove excerpt
		remove_post_type_support( $post_type, 'excerpt' );
        }
		
		if (!empty($hide_metabox_trackbacks_posts)) {
		// Remove trackbacks
		remove_post_type_support( $post_type, 'trackbacks' );
        }
		
		if (!empty($hide_metabox_custom_fields_posts)) {
		// Remove custom fields
		remove_post_type_support( $post_type, 'custom-fields' );
        }
		
		if (!empty($hide_metabox_comments_posts)) {
		// Remove comments
		remove_post_type_support( $post_type, 'comments' );
        }
		
		if (!empty($hide_metabox_revisions_posts)) {
		// Remove revisions (will still store revisions)
		remove_post_type_support( $post_type, 'revisions' );
        }
		
		if (!empty($hide_metabox_page_attributes_posts)) {
		// Remove page attributes like menu order
		remove_post_type_support( $post_type, 'page-attributes' );
        }
		
		if (!empty($hide_metabox_post_formats_posts)) {
		// Remove post format
		remove_post_type_support( $post_type, 'post-formats' );
		}
		
	}

//Hide Link in Excerpt https://wordpress.org/support/article/excerpt/

add_action('admin_head', 'hide_link_excerpt');

function hide_link_excerpt() {
	global $post_type;
	if( 'post' == $post_type ) {
  echo '<style>
    a.components-external-link {
	display:none;}
    } 
  </style>';
}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
//PAGES COLUMNS

// Hide column checkbox in all pages
add_action('admin_init','wlmpb_remove_cb_pages');
	function wlmpb_remove_cb_pages () {
		$hide_cb_pages = get_option( 'wlmpb_hide_cb_pages' );
    if (!empty($hide_cb_pages)) {
		// Checkbox
		add_filter('manage_pages_columns','wlmpb_remove_columns_cb_pages_now');
			function wlmpb_remove_columns_cb_pages_now ( $columns ) {
				unset($columns['cb']);

				return $columns;
			}
		}
		
	}

// Hide column author in all pages
add_action('admin_init','wlmpb_remove_author_pages');
	function wlmpb_remove_author_pages () {
		$hide_author_pages = get_option( 'wlmpb_hide_author_pages' );
    if (!empty($hide_author_pages)) {
		// Author
		add_filter('manage_pages_columns','wlmpb_remove_columns_author_pages_now');
			function wlmpb_remove_columns_author_pages_now ( $columns ) {
				unset($columns['author']);

				return $columns;
			}
		}
		
	}

// Hide column comments in all pages
add_action('admin_init','wlmpb_remove_comments_pages');
	function wlmpb_remove_comments_pages () {
		$hide_comments_pages = get_option( 'wlmpb_hide_comments_pages' );
    if (!empty($hide_comments_pages)) {
		// Comments
		add_filter('manage_pages_columns','wlmpb_remove_columns_comments_pages_now');
			function wlmpb_remove_columns_comments_pages_now ( $columns ) {
				unset($columns['comments']);

				return $columns;
			}
		}
		
	}

// Hide column date in all pages
add_action('admin_init','wlmpb_remove_date_pages');
	function wlmpb_remove_date_pages () {
		$hide_date_pages = get_option( 'wlmpb_hide_date_pages' );
    if (!empty($hide_date_pages)) {
		// Date
		add_filter('manage_pages_columns','wlmpb_remove_columns_date_pages_now');
			function wlmpb_remove_columns_date_pages_now ( $columns ) {
				unset($columns['date']);

				return $columns;
			}
		}
		
	}
	

//Hide Bulk Actions after edit in page
add_action('admin_init','wlmpb_remove_bulk_actions_pages');
	function wlmpb_remove_bulk_actions_pages () {
		$hide_bulk_actions_pages = get_option( 'wlmpb_hide_bulk_actions_pages' );
if (!empty($hide_bulk_actions_pages)) {
	
add_filter('bulk_actions-edit-page', 'wlmpb_remove_bulk_actions_pages_now');
    function wlmpb_remove_bulk_actions_pages_now ($actions) {
    
        unset(
            $actions['edit'],
            $actions['trash']
        );

        return $actions;
    }
		}
		}

// Metabox - Post type support Pages
add_action('init', 'wlmpb_remove_metabox_pages');
    function wlmpb_remove_metabox_pages () {
		$post_type = 'page';
		
	    $hide_metabox_author_pages = get_option( 'wlmpb_hide_metabox_author_pages' );
        $hide_metabox_thumbnail_pages = get_option( 'wlmpb_hide_metabox_thumbnail_pages' );
		$hide_metabox_excerpt_pages = get_option( 'wlmpb_hide_metabox_excerpt_pages' );
		$hide_metabox_trackbacks_pages = get_option( 'wlmpb_hide_metabox_trackbacks_pages' );
		$hide_metabox_custom_fields_pages = get_option( 'wlmpb_hide_metabox_custom_fields_pages' );
		$hide_metabox_comments_pages = get_option( 'wlmpb_hide_metabox_comments_pages' );
		$hide_metabox_revisions_pages = get_option( 'wlmpb_hide_metabox_revisions_pages' );
		$hide_metabox_page_attributes_pages = get_option( 'wlmpb_hide_metabox_page_attributes_pages' );
		$hide_metabox_post_formats_pages = get_option( 'wlmpb_hide_metabox_post_formats_pages' );
		
		
		if (!empty($hide_metabox_author_pages)) {
		// Remove author
		remove_post_type_support( $post_type, 'author' );
        }
		
		if (!empty($hide_metabox_thumbnail_pages)) {
		// Remove thumbnail
		remove_post_type_support( $post_type, 'thumbnail' );
        }
		
		if (!empty($hide_metabox_excerpt_pages)) {
		// Remove excerpt
		remove_post_type_support( $post_type, 'excerpt' );
        }
		
		if (!empty($hide_metabox_trackbacks_pages)) {
		// Remove trackbacks
		remove_post_type_support( $post_type, 'trackbacks' );
        }
		
		if (!empty($hide_metabox_custom_fields_pages)) {
		// Remove custom fields
		remove_post_type_support( $post_type, 'custom-fields' );
        }
		
		if (!empty($hide_metabox_comments_pages)) {
		// Remove comments
		remove_post_type_support( $post_type, 'comments' );
        }
		
		if (!empty($hide_metabox_revisions_pages)) {
		// Remove revisions (will still store revisions)
		remove_post_type_support( $post_type, 'revisions' );
        }
		
		if (!empty($hide_metabox_page_attributes_pages)) {
		// Remove page attributes like menu order
		remove_post_type_support( $post_type, 'page-attributes' );
        }
		
		if (!empty($hide_metabox_post_formats_pages)) {
		// Remove post format
		remove_post_type_support( $post_type, 'post-formats' );
		}
		
	}

