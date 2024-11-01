<?php
/**
 * Remove default fields in comment form
 *
 * @link https://developer.wordpress.org/reference/hooks/comment_form_default_fields/
 */
add_filter('comment_form_default_fields', 'wlmpb_hide_fields_comments_frontend' );
	function wlmpb_hide_fields_comments_frontend ( $fields ) {
		$hide_author_comments_frontend = get_option( 'wlmpb_hide_author_comments_frontend' );
		$hide_email_comments_frontend = get_option( 'wlmpb_hide_email_comments_frontend' );
		$hide_url_comments_frontend = get_option( 'wlmpb_hide_url_comments_frontend' );
		
    if (!empty($hide_author_comments_frontend)) {
		unset( $fields['author'] );
		}
	if (!empty($hide_email_comments_frontend)) {	
		unset( $fields['email'] );
		}
	if (!empty($hide_url_comments_frontend)) {	
		unset( $fields['url'] );
		}

		return $fields;
	};