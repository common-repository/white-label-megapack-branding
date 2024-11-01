<?php


// Comments Content

add_action( 'wlmpb_settings_content', 'wlmpb_comments_options_page' );
function wlmpb_comments_options_page() {
    global $wlmpb_active_tab;
    if ( 'comments-settings' != $wlmpb_active_tab )
    return;
?>

  	<h3><?php _e( 'Comments Settings', 'white-label-megapack-branding' ); ?></h3>

    <!-- Begin settings form -->
    <form action="options.php" method="post">

    <?php
    settings_fields( 'white-label-megapack-branding-comments' );
    do_settings_sections( 'white-label-megapack-branding-comments' );
    ?>
            

            <!-- Comments Styling Option Section -->

            <div class="wlmpb-inner-wrapper settings-widgets">
            <p class="wlmpb-settings-desc" style="padding-bottom: 6px;">This options is a great way to customize the WordPress comments. These settings apply to all user roles.</p>

            <div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

                <!-- Table Start -->
                <table class="form-table">
                <tbody>
                   
                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Comments in frontend', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>
                       
                    <tr>
                      <th><?php _e( 'Hide Field Author', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_author_comments_frontend" value="hide_author_comments_frontend" <?php checked( 'hide_author_comments_frontend', get_option( 'wlmpb_hide_author_comments_frontend' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                    <tr>
                      <th><?php _e( 'Hide Field Email', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_email_comments_frontend" value="hide_email_comments_frontend" <?php checked( 'hide_email_comments_frontend', get_option( 'wlmpb_hide_email_comments_frontend' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                      <tr style="padding-bottom: 25px;">
					  <th><?php _e( 'Remember to disable the mandatory flag for Author and Email', 'white-label-megapack-branding' ) ?></th>
					        <td><a style="position: relative!important; top: 5px;" href="/wp-admin/options-discussion.php">Visit this section if to disable the mandatory flag after you have disable fields Author and Email </a>
					  </td>
					  </tr>
                      
                    <tr>
                      <th><?php _e( 'Hide Url', 'white-label-megapack-branding' ) ?></th>
                            <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_hide_url_comments_frontend" value="hide_url_comments_frontend" <?php checked( 'hide_url_comments_frontend', get_option( 'wlmpb_hide_url_comments_frontend' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide<p>
                      </p>
                      </td>
                      </tr>
                      
                      
                   <tr>
                       <td>
                       <p style="margin-bottom: 800px;"></p>
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