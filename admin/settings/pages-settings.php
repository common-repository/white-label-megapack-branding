<?php


// Post and Pages Content

add_action( 'wlmpb_settings_content', 'wlmpb_pages_options_page' );
function wlmpb_pages_options_page() {
    global $wlmpb_active_tab;
    if ( 'pages-settings' != $wlmpb_active_tab )
    return;
?>

  	<h3><?php _e( 'Pages Settings', 'white-label-megapack-branding' ); ?></h3>

    <!-- Begin settings form -->
    <form action="options.php" method="post">

    <?php
    settings_fields( 'white-label-megapack-branding-posts-and-pages' );
    do_settings_sections( 'white-label-megapack-branding-posts-and-pages' );
    ?>
            

            <!-- Posts and Pages Styling Option Section -->

            <div class="wlmpb-inner-wrapper settings-widgets">
            <p class="wlmpb-settings-desc" style="padding-bottom: 6px;">This options is a great way to customize the WordPress pages. These settings apply to all user roles.</p>

            <div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

                <!-- Table Start -->
                <table class="form-table">
                <tbody>
                    
                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Pages Menu', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>

					<tr style="padding-bottom: 25px;">
					  <th><?php _e( 'Hide Menu -> Page -> ?', 'white-label-megapack-branding' ) ?></th>
					        <td><a style="position: relative!important; top: 5px;" href="/wp-admin/admin.php?page=white-label-megapack-branding?=auto-detect-menu">Visit this section to hide, choosing according to the role </a>
					  </td>
					  </tr>
                      
					<tr style="padding-bottom: 25px;">
					  <th><?php _e( 'Do you want to allow access after you hide section?', 'white-label-megapack-branding' ) ?></th>
					        <td><a style="position: relative!important; top: 5px;" href="/wp-admin/admin.php?page=white-label-megapack-branding&tab=header-footer-admin-wordpress-settings#wlmpb-auto-detect">Visit this section if to enable or not the access after you hide </a>
					  </td>
					  </tr>
                    
                                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Pages Columns', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>
                   
                    <tr>
                      <th><?php _e( 'Column Checkbox in all pages', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_cb_pages" value="hide_cb_pages" <?php checked( 'hide_cb_pages', get_option( 'wlmpb_hide_cb_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Column Author in all pages', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_author_pages" value="hide_author_pages" <?php checked( 'hide_author_pages', get_option( 'wlmpb_hide_author_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Column Comments in all pages', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_comments_pages" value="hide_comments_pages" <?php checked( 'hide_comments_pages', get_option( 'wlmpb_hide_comments_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Column Date in all pages', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_date_pages" value="hide_date_pages" <?php checked( 'hide_date_pages', get_option( 'wlmpb_hide_date_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Bulk Action after edit in pages', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_bulk_actions_pages" value="hide_bulk_actions_pages" <?php checked( 'hide_bulk_actions_pages', get_option( 'wlmpb_hide_bulk_actions_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Pages Metabox', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>
                       
                    <tr>
                      <th><?php _e( 'Metabox Author', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_author_pages" value="hide_metabox_author_pages" <?php checked( 'hide_metabox_author_pages', get_option( 'wlmpb_hide_metabox_author_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Thumbnail', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_thumbnail_pages" value="hide_metabox_thumbnail_pages" <?php checked( 'hide_metabox_thumbnail_pages', get_option( 'wlmpb_hide_metabox_thumbnail_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Excerpt', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_excerpt_pages" value="hide_metabox_excerpt_pages" <?php checked( 'hide_metabox_excerpt_pages', get_option( 'wlmpb_hide_metabox_excerpt_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Trackbacks', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_trackbacks_pages" value="hide_metabox_trackbacks_pages" <?php checked( 'hide_metabox_trackbacks_pages', get_option( 'wlmpb_hide_metabox_trackbacks_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Custom-Fields', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_custom_fields_pages" value="hide_metabox_custom_fields_pages" <?php checked( 'hide_metabox_custom_fields_pages', get_option( 'wlmpb_hide_metabox_custom_fields_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Metabox Comments', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_comments_pages" value="hide_metabox_comments_pages" <?php checked( 'hide_metabox_comments_pages', get_option( 'wlmpb_hide_metabox_comments_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr> 
                      
                    <tr>
                      <th><?php _e( 'Metabox Revisions', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_revisions_pages" value="hide_metabox_revisions_pages" <?php checked( 'hide_metabox_revisions_pages', get_option( 'wlmpb_hide_metabox_revisions_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr> 
                      
                    <tr>
                      <th><?php _e( 'Metabox Page-Attributes', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_page_attributes_pages" value="hide_metabox_page_attributes_pages" <?php checked( 'hide_metabox_page_attributes_pages', get_option( 'wlmpb_hide_metabox_page_attributes_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr> 
                      
                    <tr>
                      <th><?php _e( 'Metabox Post-Formats', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_metabox_post_formats_pages" value="hide_metabox_post_formats_pages" <?php checked( 'hide_metabox_post_formats_pages', get_option( 'wlmpb_hide_metabox_post_formats_pages' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
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
