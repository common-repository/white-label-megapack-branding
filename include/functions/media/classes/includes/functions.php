<?php

/**
 * Wlmpb Media Categories Functions
 *
 * @package Media/Categories/Functions
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/**
 * Custom update_count_callback
 *
 * @since 0.1.0
 */
function wlmpb_media_categories_update_count_callback( $terms = array(), $media_taxonomy = 'media_category' ) {
	global $wpdb;

	// select id & count from taxonomy
	$sql = "SELECT term_taxonomy_id, MAX(total) AS total FROM ((
				SELECT tt.term_taxonomy_id, COUNT(*) AS total
					FROM {$wpdb->term_relationships} tr, {$wpdb->term_taxonomy} tt
					WHERE tr.term_taxonomy_id = tt.term_taxonomy_id
						AND tt.taxonomy = %s
					GROUP BY tt.term_taxonomy_id
				) UNION ALL (
					SELECT term_taxonomy_id, 0 AS total
						FROM {$wpdb->term_taxonomy}
						WHERE taxonomy = %s
				)) AS unioncount GROUP BY term_taxonomy_id";

	$prepared = $wpdb->prepare( $sql, $media_taxonomy->name, $media_taxonomy->name );
	$count    = $wpdb->get_results( $prepared );

	// update all count values from taxonomy
	foreach ( $count as $row_count ) {
		$wpdb->update(
			$wpdb->term_taxonomy,
			array( 'count'            => $row_count->total            ),
			array( 'term_taxonomy_id' => $row_count->term_taxonomy_id )
		);
	}
}

/**
 * Get the options to determine the list of media_category
 *
 * @since 0.1.0
 */
function wlmpb_media_categories_get_media_category_options( $selected_value = '' ) {
	return array(
		'taxonomy'           => 'media_category',
		'name'               => 'media_category',
		'option_none_value'  => 'no_category',
		'selected'           => $selected_value,
		'hide_empty'         => false,
		'hierarchical'       => true,
		'orderby'            => 'name',
		'walker'             => new WLMPB_Media_Categories_Filter_Walker(),
		'show_option_all'    => __( 'All categories', 'white-label-megapack-branding' ),
		'show_option_none'   => __( 'No categories',  'white-label-megapack-branding' ),
		'show_count'         => true,
		'value'              => 'slug'
	);
}

/**
 * Manipulate the request to filter media without category
 *
 * @since 1.0.1
 */
function wlmpb_media_categories_no_category_request( $query_args = array() ) {

	// Bail if not in admin
	if ( ! is_admin() || ! is_main_query() ) {
		return $query_args;
	}

	// No category?
	$media_category = wlmpb_media_categories_get_no_category_search();

	// Cuz I'm searchin...
	if ( ! empty( $media_category ) && ! empty( $query_args[ $media_category ] ) ) {

		// No categories, so do a "NOT EXISTS" taxonomy query
		if ( 'no_category' === $query_args[ $media_category ] ) {

			// This is necessary to prevent the JOIN clause from being stomped
			// and replaced for postmeta
			$query_args['suppress_filters'] = true;

			// This adds a taxonomy query, looking for no terms
			$query_args['tax_query'] = array(
				array(
					'taxonomy'         => $media_category,
					'operator'         => 'NOT EXISTS',
					'include_children' => false
				)
			);

			// Nullify the query argument to prevent incorrect core assertions
			$query_args[ $media_category ] = null;
		}
	}

	return $query_args;
}

/**
 * Check whether this search is for NO Category
 *
 * @since 0.1.0
 */
function wlmpb_media_categories_get_no_category_search() {

	// Default return value
	$search = '';

	// Check for correct Filter situation
	if ( empty( $_REQUEST['filter_action'] ) ) {
		return $search;
	}

	// Check parameters to use for new request
	if ( ! empty( $_REQUEST['bulk_tax_cat'] ) ) {
		$search = sanitize_text_field( $_REQUEST['bulk_tax_cat']);

		// Get the request value
		$request = isset( $_REQUEST[ $search ] )
			? sanitize_text_field($_REQUEST[ $search ])
			: '';

		// Filter request on specific category so don't mess with it
		if ( 'no_category' === $request ) {
			return $search;
		}
	}

	return '';
}

/**
 * Fired when the plugin is activated.
 *
 * @since  0.1.0
 *
 * @param  WP_Query $query The query object used to find objects like posts
 */
function wlmpb_media_categories_pre_get_posts( WP_Query $query ) {

	// Bail if in admin
	if ( is_admin() ) {
		return;
	}

	// Bail if not main query
	if ( ! $query->is_main_query() ) {
		return;
	}

	// Bail if not media_category query
	if ( ! is_tax( 'media_category' ) ) {
		return;
	}

	// Looking at some kind of media_category term archive
	if ( is_archive() ) {

		// Get media taxonomy and categories to find, default to __not_found
		$media_categories = $query->get( 'media_category', '__not_found' );

		// Looking at a specific media category
		if ( '__not_found' !== $media_categories ) {
			$query->set( 'post_type',   'attachment' );
			$query->set( 'post_status', 'inherit'    );
		}
	}
}

/**
 * Fired on attachment update
 *
 * @since  1.0.0
 *
 * @param array  $fields The existing fields
 * @param object $post   The post
 *
 * @return array
 */
function wlmpb_media_attachment_fields( $fields = array(), $post = false ) {

	// Bail if not a media category
	if ( empty( $fields[ 'media_category' ] ) ) {
		return $fields;
	}

	// Get the media category taxonomy
	$t = $fields[ 'media_category' ];

	// Bail if not public or no UI
	if ( empty( $t[ 'public' ] ) || empty( $t[ 'show_ui' ] ) ) {
		return $fields;
	}

	if ( empty( $t[ 'args' ] ) ) {
		$t[ 'args' ] = array();
	}

	// Get the taxonomy name to improve code readibility later
	$taxonomy = $t[ 'name' ];

	// Query for terms
	$terms = wp_get_object_terms( $post->ID, $taxonomy, $t[ 'args' ] );

	// Pluck the slugs
	$values = wp_list_pluck( $terms, 'slug' );

	// Add the values
	$t[ 'value' ] = join( ', ', $values );

	// Hierarchical taxonomies get special care
	if ( ! empty( $t[ 'hierarchical' ] ) ) {

		// Start an output buffer for the hierarchical checklist
		ob_start();

		// Output the checklist
		wp_terms_checklist( $post->ID, array(
			'taxonomy'      => 'media_category',
			'checked_ontop' => false,
			'walker'        => new WLMPB_Media_Categories_Checklist_Walker()
		) );

		// Get the output buffer contents
		$contents = ob_get_clean();

		// Decide what the HTML will be
		$html = ( false !== $contents )
			? '<ul class="term-list">' . $contents . '</ul>'
			: '<ul class="term-list"><li>' . sprintf( esc_html__( 'No %s', 'white-label-megapack-branding' ), $t[ 'label' ] ) . '</li></ul>';

		// Setup the new fields
		$t[ 'input' ] = 'html';
		$t[ 'html' ]  = $html;
	}

	// Add these fields to the attachment fields array
	$fields[ $taxonomy ] = $t;

	// Return fields
	return $fields;
}

/**
 * Get IDs of all attached to a media category and pass them through to the default gallery shortcode for rendering
 *
 * @since  1.0.0
 *
 * @param $args Arguments from shortcode
 */
function wlmpb_media_categories_register_gallery_shortcode( $args = array() ) {

	// Default return value
	$retval = '';

	// Bail if no category attribute
	if ( empty( $args[ 'category' ] ) ) {
		return $retval;
	}

	// Juggle the Category out
	$category = $args[ 'category' ];
	unset( $args[ 'category' ] );

	// Bail if Category does not exist
	$cat = get_term_by( 'slug', $category, 'media_category' );
	if ( false === $cat ) {
		return $retval;
	}

	// Default query arguments
	$query = array(
		'post_status'    => 'inherit',
		'posts_per_page' => -1,
		'post_type'      => 'attachment',
		'tax_query'      => array(
			array(
				'taxonomy' => 'media_category',
				'terms'    => array( $category ),
				'field'    => 'slug',
			)
		)
	);

	// Query for the posts
	$the_query = new WP_Query( $query );
	$posts     = $the_query->get_posts();

	// Get the IDs
	if ( ! empty( $posts ) ) {
		$ids = wp_parse_id_list( $posts );
	}

	// IDs to include
	$args[ 'include' ] = implode( ',', $ids );

	// Return the shortcode
	$retval = gallery_shortcode( $args );

	// Return the results
	return $retval;
}
