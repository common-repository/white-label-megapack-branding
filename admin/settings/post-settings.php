<?php


// Post and Pages Content

add_action( 'wlmpb_settings_content', 'wlmpb_posts_options_page' );
function wlmpb_posts_options_page() {
    global $wlmpb_active_tab;
    if ( 'post-settings' != $wlmpb_active_tab )
    return;
?>

  	<h3><?php _e( 'Posts Settings', 'white-label-megapack-branding' ); ?></h3>

    <!-- Begin settings form -->
    <form action="options.php" method="post">

    <?php
    settings_fields( 'white-label-megapack-branding-posts-and-pages' );
    do_settings_sections( 'white-label-megapack-branding-posts-and-pages' );
    ?>
            

            <!-- Posts and Pages Styling Option Section -->

            <div class="wlmpb-inner-wrapper settings-widgets">
            <p class="wlmpb-settings-desc" style="padding-bottom: 6px;">This options is a great way to customize the WordPress post. These settings apply to all user roles.</p>

            <div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

                <!-- Table Start -->
                <table class="form-table">
                <tbody>
                    
                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Post Menu', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>

					<tr style="padding-bottom: 25px;">
					  <th><?php _e( 'Hide Menu -> Posts -> ?', 'white-label-megapack-branding' ) ?></th>
					        <td><a style="position: relative!important; top: 5px;" href="/wp-admin/admin.php?page=white-label-megapack-branding?=auto-detect-menu">Visit this section to hide, choosing according to the role </a>
					  </td>
					  </tr>
                      
					<tr style="padding-bottom: 25px;">
					  <th><?php _e( 'Do you want to allow access after you hide section?', 'white-label-megapack-branding' ) ?></th>
					        <td><a style="position: relative!important; top: 5px;" href="/wp-admin/admin.php?page=white-label-megapack-branding&tab=header-footer-admin-wordpress-settings#wlmpb-auto-detect">Visit this section if to enable or not the access after you hide </a>
					  </td>
					  </tr>
                    
                                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Post Columns', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>
                   
                    <tr>
                      <th><?php _e( 'Column Checkbox in all posts', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_cb_posts" value="hide_cb_posts" <?php checked( 'hide_cb_posts', get_option( 'wlmpb_hide_cb_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Column Author in all posts', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_author_posts" value="hide_author_posts" <?php checked( 'hide_author_posts', get_option( 'wlmpb_hide_author_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                   
                    <tr>
                      <th><?php _e( 'Columns Categories in all posts', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_columns_posts_categories" value="hide_columns_posts_categories" <?php checked( 'hide_columns_posts_categories', get_option( 'wlmpb_hide_columns_posts_categories' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Columns Tag in all posts', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_columns_posts_tag" value="hide_columns_posts_tag" <?php checked( 'hide_columns_posts_tag', get_option( 'wlmpb_hide_columns_posts_tag' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Column Comments in all posts', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_comments_posts" value="hide_comments_posts" <?php checked( 'hide_comments_posts', get_option( 'wlmpb_hide_comments_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Column Date in all posts', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_date_posts" value="hide_date_posts" <?php checked( 'hide_date_posts', get_option( 'wlmpb_hide_date_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Bulk Action after edit in post', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_bulk_actions_posts" value="hide_bulk_actions_posts" <?php checked( 'hide_bulk_actions_posts', get_option( 'wlmpb_hide_bulk_actions_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Post Metabox', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>
                       
                    <tr>
                      <th><?php _e( 'Metabox Author', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_author_posts" value="hide_metabox_author_posts" <?php checked( 'hide_metabox_author_posts', get_option( 'wlmpb_hide_metabox_author_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Thumbnail', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_thumbnail_posts" value="hide_metabox_thumbnail_posts" <?php checked( 'hide_metabox_thumbnail_posts', get_option( 'wlmpb_hide_metabox_thumbnail_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Excerpt', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_excerpt_posts" value="hide_metabox_excerpt_posts" <?php checked( 'hide_metabox_excerpt_posts', get_option( 'wlmpb_hide_metabox_excerpt_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Trackbacks', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_trackbacks_posts" value="hide_metabox_trackbacks_posts" <?php checked( 'hide_metabox_trackbacks_posts', get_option( 'wlmpb_hide_metabox_trackbacks_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Custom-Fields', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_custom_fields_posts" value="hide_metabox_custom_fields_posts" <?php checked( 'hide_metabox_custom_fields_posts', get_option( 'wlmpb_hide_metabox_custom_fields_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Comments', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_comments_posts" value="hide_metabox_comments_posts" <?php checked( 'hide_metabox_comments_posts', get_option( 'wlmpb_hide_metabox_comments_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr> 
                      
                    <tr>
                      <th><?php _e( 'Metabox Revisions', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_revisions_posts" value="hide_metabox_revisions_posts" <?php checked( 'hide_metabox_revisions_posts', get_option( 'wlmpb_hide_metabox_revisions_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr> 
                      
                    <tr>
                      <th><?php _e( 'Metabox Page-Attributes', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_page_attributes_posts" value="hide_metabox_page_attributes_posts" <?php checked( 'hide_metabox_page_attributes_posts', get_option( 'wlmpb_hide_metabox_page_attributes_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr> 
                      
                    <tr>
                      <th><?php _e( 'Metabox Post-Formats', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_post_formats_posts" value="hide_metabox_post_formats_posts" <?php checked( 'hide_metabox_post_formats_posts', get_option( 'wlmpb_hide_metabox_post_formats_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr> 
                       
                    <tr>
                      <th><?php _e( 'Metabox Categories in post', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_posts_categories" value="hide_metabox_posts_categories" <?php checked( 'hide_metabox_posts_categories', get_option( 'wlmpb_hide_metabox_posts_categories' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Tags in post', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_tags_posts" value="hide_metabox_tags_posts" <?php checked( 'hide_metabox_tags_posts', get_option( 'wlmpb_hide_metabox_tags_posts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
            


                <tr class="wlmpb-float-option">
                <th class="wlmpb-save-section">
                <?php submit_button(); ?>
                </th>
                </tr>

                </tbody>
                </table>
            </div>

    </form>
<?php }
