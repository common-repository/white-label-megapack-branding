<?php


// Media Content

add_action( 'wlmpb_settings_content', 'wlmpb_media_options_page' );
function wlmpb_media_options_page() {
    global $wlmpb_active_tab;
    if ( 'media-settings' != $wlmpb_active_tab )
    return;
?>

  	<h3><?php _e( 'Media Settings', 'white-label-megapack-branding' ); ?></h3>

    <!-- Begin settings form -->
    <form action="options.php" method="post">

    <?php
    settings_fields( 'white-label-megapack-branding-media' );
    do_settings_sections( 'white-label-megapack-branding-media' );
    ?>
            

            <!-- Posts and Pages Styling Option Section -->

            <div class="wlmpb-inner-wrapper settings-widgets">
            <p class="wlmpb-settings-desc" style="padding-bottom: 6px;">This options is a great way to customize the WordPress media. These settings apply to all user roles.</p>

            <div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

                <!-- Table Start -->
                <table class="form-table">
                <tbody>
                   
                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Media Upload Wysiwyg', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>
                       
                    <tr>
                      <th><?php _e( 'Hide Create Gallery', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_create_gallery_mediauploadwy" value="hide_create_gallery_mediauploadwy" <?php checked( 'hide_create_gallery_mediauploadwy', get_option( 'wlmpb_hide_create_gallery_mediauploadwy' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Hide Create Play List', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_create_playlist_mediauploadwy" value="hide_create_playlist_mediauploadwy" <?php checked( 'hide_create_playlist_mediauploadwy', get_option( 'wlmpb_hide_create_playlist_mediauploadwy' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Hide Create Video Play List', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_create_videoplaylist_mediauploadwy" value="hide_create_videoplaylist_mediauploadwy" <?php checked( 'hide_create_videoplaylist_mediauploadwy', get_option( 'wlmpb_hide_create_videoplaylist_mediauploadwy' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Hide Insert From Url Title', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_insert_fromurl_mediauploadwy" value="hide_insert_fromurl_mediauploadwy" <?php checked( 'hide_insert_fromurl_mediauploadwy', get_option( 'wlmpb_hide_insert_fromurl_mediauploadwy' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    
                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Media Extra Settings', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>
                  
                     <tr>
                      <th><?php _e( 'Hide Bulk Actions in Media', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_bulk_actions_media" value="hide_bulk_actions_media" <?php checked( 'hide_bulk_actions_media', get_option( 'wlmpb_hide_bulk_actions_media' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      Hide Bulk Actions after edit in media only works in list view
                      </p>
                      </td>
                      </tr>
                   
                    <tr>
                      <th><?php _e( 'Add Categories in Media', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_add_categories_media" value="add_categories_media" <?php checked( 'add_categories_media', get_option( 'wlmpb_add_categories_media' ) ); ?> /><span class="wlmpb-slider round"></span></label>Active<p>
                      </p>
                      </td>
                      </tr>
                      
                   <tr>
                       <td>
                       <p style="margin-bottom: 600px;"></p>
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