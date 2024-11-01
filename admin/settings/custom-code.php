<?php


// Tracking and Custom Code Settings

add_action( 'wlmpb_settings_content', 'wlmpb_cc_code_page' );
function wlmpb_cc_code_page() {
    global $wlmpb_active_tab;
    if ( 'custom-code' != $wlmpb_active_tab )
    return;
?>

  	<h3><?php _e( 'Custom Code', 'white-label-megapack-branding' ); ?></h3>

    <form action="options.php" method="post">
        <?php
        settings_fields( 'white-label-megapack-branding-tracking' );
        do_settings_sections( 'white-label-megapack-branding-tracking' );
        $wlmpb_message_body = get_option( 'wlmpb_message_body' );
        $wlmpb_widget_body = get_option( 'wlmpb_widget_body' );
        ?>

            <!-- Dashboard Styling Option Section -->

            <div class="wlmpb-inner-wrapper settings-tracking">
            <p class="wlmpb-settings-desc">Manage websites custom code and tracking. This adds the code directly to the header of the website so you don't need to custom change any theme files. This also makes sure that you do not lose your tracking or custom code when you update your theme.</p>

            <div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

                <table class="form-table">
                <tbody>

                <tr class="wlmpb-title-holder">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Tracking', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>

                      <!-- Tracking Option Section -->
                      <tr>
                      <th><?php _e( 'Google Analytics ID', 'white-label-megapack-branding' ) ?>
                      <p>With this field you can monitor traffic on your website.</p>
                      </th>
                      <td><input class="regular-text" type="text" placeholder="UA-XXXXX-X" name="wlmpb_cc_google_analytics" value="<?php echo esc_attr( get_option('wlmpb_cc_google_analytics') ); ?>" size="30" /></td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Facebook Pixel ID', 'white-label-megapack-branding' ) ?>
                      <p>Enter your Facebook Pixel ID to track visitor activity on your website.</p>
                      </th>
                      <td><input class="regular-text" type="text" placeholder="" name="wlmpb_cc_facebook_pixel" value="<?php echo esc_attr( get_option('wlmpb_cc_facebook_pixel') ); ?>" size="30" /></td>
                      </tr>

                <tr class="wlmpb-title-holder">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Custom Code', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>

                      <tr>
                      <th><?php _e( 'Head Scripts', 'white-label-megapack-branding' ) ?>
                      <p>Enter your custom scripts here. This is not enclosed in the script tag. Can be useful for adding 3rd party scripts or Google verification codes to your website.</p>
                      </th>
                      <td><textarea rows="10" cols="100" type="textarea" placeholder='Example: <meta name="google-site-verification" content="your verification string">' name="wlmpb_cc_custom_script" value="<?php echo esc_attr( get_option('wlmpb_cc_custom_script') ); ?>" /><?php echo esc_attr( get_option('wlmpb_cc_custom_script') ); ?></textarea></td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Frontend Custom CSS', 'white-label-megapack-branding' ) ?>
                      <p>Enter your frontend custom CSS here.</p>
                      </th>
                      <td><textarea rows="10" cols="100" type="textarea" placeholder="" name="wlmpb_cc_custom_css" value="<?php echo esc_attr( get_option('wlmpb_cc_custom_css') ); ?>" /><?php echo esc_attr( get_option('wlmpb_cc_custom_css') ); ?></textarea>
                      <p>In case if you need to overwrite any CSS setting, you can add !important at the end of CSS property. eg: color: #da2234 !important;</p>
                      </td>
                      </tr>
                      
                                            <tr>
                      <th><?php _e( 'Backend Custom CSS', 'white-label-megapack-branding' ) ?>
                      <p>Enter your Backend custom CSS here.</p>
                      </th>
                      <td><textarea rows="10" cols="100" type="textarea" placeholder="" name="wlmpb_cc_custom_css_admin" value="<?php echo esc_attr( get_option('wlmpb_cc_custom_css_admin') ); ?>" /><?php echo esc_attr( get_option('wlmpb_cc_custom_css_admin') ); ?></textarea>
                      <p>In case if you need to overwrite any CSS setting, you can add !important at the end of CSS property. eg: color: #da2234 !important;</p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Custom JavaScript', 'white-label-megapack-branding' ) ?>
                      <p>Enter your custom JavaScript here. This is enclosed in the script tag.</p>
                      </th>
                      <td><textarea rows="10" cols="100" type="textarea" placeholder="" name="wlmpb_cc_custom_js" value="<?php echo esc_attr( get_option('wlmpb_cc_custom_js') ); ?>" /><?php echo esc_attr( get_option('wlmpb_cc_custom_js') ); ?></textarea></td>
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
