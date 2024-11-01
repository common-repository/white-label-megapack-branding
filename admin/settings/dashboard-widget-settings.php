<?php


// Widget Page Content

add_action( 'wlmpb_settings_content', 'wlmpb_widget_options_page' );
function wlmpb_widget_options_page() {
    global $wlmpb_active_tab;
    if ( 'dashboard-widget-settings' != $wlmpb_active_tab )
    return;
?>

  	<h3><?php _e( 'Dashboard Widgets', 'white-label-megapack-branding' ); ?></h3>

    <!-- Begin settings form -->
    <form action="options.php" method="post">

    <?php
    settings_fields( 'white-label-megapack-branding-widget' );
    do_settings_sections( 'white-label-megapack-branding-widget' );
    $wlmpb_widget_body = get_option( 'wlmpb_widget_body' );
    $wlmpb_widget_two_body = get_option( 'wlmpb_widget_two_body' );
    $wlmpb_widget_three_body = get_option( 'wlmpb_widget_three_body' );
    $wlmpb_widget_four_body = get_option( 'wlmpb_widget_four_body' );
	$wlmpb_message_body = get_option( 'wlmpb_message_body' );
	$wlmpb_widget_body = get_option( 'wlmpb_widget_body' );
    ?>
            

            <!-- Dashboard Styling Option Section -->

            <div class="wlmpb-inner-wrapper settings-widgets">
            <p class="wlmpb-settings-desc" style="padding-bottom: 6px;">The dashboard widget option is a great way to customize and declutter the WordPress dashboard homepage. You can choose the row format you would like to display widgets in, and even create your own custom widgets. You can include things like text, links, videos, iframes, and more. These settings apply to all user roles.</p>

            <div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

                <!-- Table Start -->
                <table class="form-table">
                <tbody>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Welcome', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_welcome" value="#welcome-panel" <?php checked( '#welcome-panel', get_option( 'wlmpb_widget_welcome' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Try Glutenberg', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_glutenberg" value="try_gutenberg_panel" <?php checked( 'try_gutenberg_panel', get_option( 'wlmpb_widget_glutenberg' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'WordPress Event & News', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_primary" value="#dashboard_primary" <?php checked( '#dashboard_primary', get_option( 'wlmpb_widget_primary' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Other WordPress News', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_secondary" value="dashboard_secondary" <?php checked( 'dashboard_secondary', get_option( 'wlmpb_widget_secondary' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Activity', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_activity" value="#dashboard_activity" <?php checked( '#dashboard_activity', get_option( 'wlmpb_widget_activity' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'At A Glance', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_glance" value="#dashboard_right_now" <?php checked( '#dashboard_right_now', get_option( 'wlmpb_widget_glance' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Quick Draft', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_draft" value="#dashboard_quick_press" <?php checked( '#dashboard_quick_press', get_option( 'wlmpb_widget_draft' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Recent Draft', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_recent_drafts" value="dashboard_recent_drafts" <?php checked( 'dashboard_recent_drafts', get_option( 'wlmpb_widget_recent_drafts' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Incoming Links', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_incoming_links" value="dashboard_incoming_links" <?php checked( 'dashboard_incoming_links', get_option( 'wlmpb_widget_incoming_links' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Recent Comments', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_recent_comments" value="dashboard_recent_comments" <?php checked( 'dashboard_recent_comments', get_option( 'wlmpb_widget_recent_comments' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                    <div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name"><?php _e( 'Site Health Status', 'white-label-megapack-branding' ) ?></div>
                        <div class="wlmpb-item-capabilities">
                            <div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_widget_site_health" value="wlmpb_widget_site_health" <?php checked( 'wlmpb_widget_site_health', get_option( 'wlmpb_widget_site_health' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide</div>
                        </div>
                    </div>

                <tr class="wlmpb-title-holder" style="margin-top: 24px;">
                <th><h2 class="wlmpb-inner-title"><?php _e( 'Custom Widgets', 'white-label-megapack-branding' ) ?></h2></th>
                </tr>

                      <tr>
                      <th><?php _e( 'Widget Format', 'white-label-megapack-branding' ) ?></th>
                      <td class="wlmpb-radio-row">

                      <input type="radio" name="wlmpb_widget_rows" value="25%"<?php checked( '25%', get_option( 'wlmpb_widget_rows' ) ); ?> />4 Rows
                      <input class="wlmpb-radio-spacing" type="radio" name="wlmpb_widget_rows" value="50%"<?php checked( '50%', get_option( 'wlmpb_widget_rows' ) ); ?> />2 Rows
                      <input class="wlmpb-radio-spacing" type="radio" name="wlmpb_widget_rows" value="100%"<?php checked( '100%', get_option( 'wlmpb_widget_rows' ) ); ?> />1 Row
                      <p>Customize the widget row format for the WordPress dashboard. (default 4 rows)</p>
                      </td>
                      </tr>

                      <tr class="wlmpb-inner-title">
                      <th><?php _e( 'Widget Count', 'white-label-megapack-branding' ) ?><p>Create up to 4 custom widgets to be displayed on the WordPress dashboard.</p></th>
                      <td><select name="wlmpb_custom_widget_count">
                      <option value="one" <?php selected(get_option('wlmpb_custom_widget_count'), "one"); ?>>1</option>
                      <option value="two" <?php selected(get_option('wlmpb_custom_widget_count'), "two"); ?>>2</option>
                      <option value="three" <?php selected(get_option('wlmpb_custom_widget_count'), "three"); ?>>3</option>
                      <option value="four" <?php selected(get_option('wlmpb_custom_widget_count'), "four"); ?>>4</option>
                      </select>
                      <p>
                      Select the number of custom widgets you would like to create. (save changes to update)
                      </p>
                      </td>
                      </tr>

                      <?php
                      $wlmpb_widget_count = get_option('wlmpb_custom_widget_count');
                      if ($wlmpb_widget_count == "one" || "two" || "three" || "four") {
                      ?>

                      <tr class="wlmpb-title-holder">
                      <th><h2 class="wlmpb-inner-title"><?php _e( 'Widget - ', 'white-label-megapack-branding' ) ?><?php echo esc_attr( get_option('wlmpb_widget_title') ); ?></h2></th>
                      </tr>

                      <tr>
                      <th><?php _e( 'Widget - ', 'white-label-megapack-branding' ) ?><?php echo esc_attr( get_option('wlmpb_widget_title') ); ?></th>
                      <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_custom_widget" value="#brand_dash_widget" <?php checked( '#brand_dash_widget', get_option( 'wlmpb_custom_widget' ) ); ?> /><span class="wlmpb-slider round"></span></label>Enable
                      <p>
                      Enable to activate widget.
                      </p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Title', 'white-label-megapack-branding' ) ?></th>
                      <td><input type="text" placeholder="" name="wlmpb_widget_title" value="<?php echo esc_attr( get_option('wlmpb_widget_title') ); ?>" size="70" /></td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Shortcode', 'white-label-megapack-branding' ) ?><p>Displays below content.</p></th>
                      <td><input type="text" placeholder="" name="wlmpb_custom_widget_shortcode" value="<?php echo esc_attr( get_option('wlmpb_custom_widget_shortcode') ); ?>" size="70" />
                      <p>If you would like to use a shortcode with your custom widget you can add it here.</p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Content', 'white-label-megapack-branding' ) ?>
                      <p>Customize the widget by using the content editor to add your own text. HTML markup can be used.</p>
                      </th>

                      <td class="wlmpb-custom-content">
                      <?php
                      wp_editor( $wlmpb_widget_body , 'wlmpb_widget_body', array(
                      'wpautop'       => false,
                      'media_buttons' => true,
                      'textarea_name' => 'wlmpb_widget_body',
                      'editor_class'  => 'my_custom_class',
                      'textarea_rows' => 15
                      ) );
                      ?>
                      </td>
                      </tr>

                      <?php } ?>
                      <?php
                      $wlmpb_widget_count = get_option('wlmpb_custom_widget_count');
                      if ($wlmpb_widget_count !== "one")  {
                      ?>

                      <tr class="wlmpb-title-holder">
                      <th><h2 class="wlmpb-inner-title"><?php _e( 'Widget - ', 'white-label-megapack-branding' ) ?><?php echo esc_attr( get_option('wlmpb_widget_two_title') ); ?></h2></th>
                      </tr>

                      <tr>
                      <th><?php _e( 'Widget - ', 'white-label-megapack-branding' ) ?><?php echo esc_attr( get_option('wlmpb_widget_two_title') ); ?></th>
                      <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_custom_widget_two" value="#brand_dash_widget" <?php checked( '#brand_dash_widget', get_option( 'wlmpb_custom_widget_two' ) ); ?> /><span class="wlmpb-slider round"></span></label>Enable
                      <p>
                      Enable to activate widget.
                      </p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Title', 'white-label-megapack-branding' ) ?></th>
                      <td><input type="text" placeholder="" name="wlmpb_widget_two_title" value="<?php echo esc_attr( get_option('wlmpb_widget_two_title') ); ?>" size="70" /></td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Shortcode', 'white-label-megapack-branding' ) ?><p>Displays below content.</p></th>
                      <td><input type="text" placeholder="" name="wlmpb_custom_widget_two_shortcode" value="<?php echo esc_attr( get_option('wlmpb_custom_widget_two_shortcode') ); ?>" size="70" />
                      <p>If you would like to use a shortcode with your custom widget you can add it here.</p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Content', 'white-label-megapack-branding' ) ?>
                      <p>Customize the widget by using the content editor to add your own text. HTML markup can be used.</p>
                      </th>

                      <td class="wlmpb-custom-content">
                      <?php
                      wp_editor( $wlmpb_widget_two_body , 'wlmpb_widget_two_body', array(
                      'wpautop'       => false,
                      'media_buttons' => true,
                      'textarea_name' => 'wlmpb_widget_two_body',
                      'editor_class'  => 'my_custom_class',
                      'textarea_rows' => 15
                      ) );
                      ?>
                      </td>
                      </tr>

                      <?php }?>
                      <?php
                      $wlmpb_widget_count = get_option('wlmpb_custom_widget_count');
                      if ($wlmpb_widget_count == "three" || "four" && $wlmpb_widget_count !== "two" && $wlmpb_widget_count !== "one") {
                      ?>

                      <tr class="wlmpb-title-holder">
                      <th><h2 class="wlmpb-inner-title"><?php _e( 'Widget - ', 'white-label-megapack-branding' ) ?><?php echo esc_attr( get_option('wlmpb_widget_three_title') ); ?></h2></th>
                      </tr>

                      <tr>
                      <th><?php _e( 'Widget - ', 'white-label-megapack-branding' ) ?><?php echo esc_attr( get_option('wlmpb_widget_two_title') ); ?></th>
                      <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_custom_widget_three" value="#brand_dash_widget" <?php checked( '#brand_dash_widget', get_option( 'wlmpb_custom_widget_three' ) ); ?> /><span class="wlmpb-slider round"></span></label>Enable
                      <p>
                      Enable to activate widget.
                      </p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Title', 'white-label-megapack-branding' ) ?></th>
                      <td><input type="text" placeholder="" name="wlmpb_widget_three_title" value="<?php echo esc_attr( get_option('wlmpb_widget_three_title') ); ?>" size="70" /></td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Shortcode', 'white-label-megapack-branding' ) ?><p>Displays below content.</p></th>
                      <td><input type="text" placeholder="" name="wlmpb_custom_widget_three_shortcode" value="<?php echo esc_attr( get_option('wlmpb_custom_widget_three_shortcode') ); ?>" size="70" />
                      <p>If you would like to use a shortcode with your custom widget you can add it here.</p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Content', 'white-label-megapack-branding' ) ?>
                      <p>Customize the widget by using the content editor to add your own text. HTML markup can be used.</p>
                      </th>

                      <td class="wlmpb-custom-content">
                      <?php
                      wp_editor( $wlmpb_widget_three_body , 'wlmpb_widget_three_body', array(
                      'wpautop'       => false,
                      'media_buttons' => true,
                      'textarea_name' => 'wlmpb_widget_three_body',
                      'editor_class'  => 'my_custom_class',
                      'textarea_rows' => 15
                      ) );
                      ?>
                      </td>
                      </tr>

                      <?php } ?>
                      <?php
                      $wlmpb_widget_count = get_option('wlmpb_custom_widget_count');
                      if ($wlmpb_widget_count == "four") {
                      ?>

                      <tr class="wlmpb-title-holder">
                      <th><h2 class="wlmpb-inner-title"><?php _e( 'Widget - ', 'white-label-megapack-branding' ) ?><?php echo esc_attr( get_option('wlmpb_widget_four_title') ); ?></h2></th>
                      </tr>

                      <tr>
                      <th><?php _e( 'Widget - ', 'white-label-megapack-branding' ) ?><?php echo esc_attr( get_option('wlmpb_widget_two_title') ); ?></th>
                      <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_custom_widget_four" value="#brand_dash_widget" <?php checked( '#brand_dash_widget', get_option( 'wlmpb_custom_widget_four' ) ); ?> /><span class="wlmpb-slider round"></span></label>Enable
                      <p>
                      Enable to activate widget.
                      </p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Title', 'white-label-megapack-branding' ) ?></th>
                      <td><input type="text" placeholder="" name="wlmpb_widget_four_title" value="<?php echo esc_attr( get_option('wlmpb_widget_four_title') ); ?>" size="70" /></td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Shortcode', 'white-label-megapack-branding' ) ?><p>Displays below content.</p></th>
                      <td><input type="text" placeholder="" name="wlmpb_custom_widget_four_shortcode" value="<?php echo esc_attr( get_option('wlmpb_custom_widget_four_shortcode') ); ?>" size="70" />
                      <p>If you would like to use a shortcode with your custom widget you can add it here.</p>
                      </td>
                      </tr>

                      <tr>
                      <th><?php _e( 'Content', 'white-label-megapack-branding' ) ?>
                      <p>Customize the widget by using the content editor to add your own text. HTML markup can be used.</p>
                      </th>

                      <td class="wlmpb-custom-content">
                      <?php
                      wp_editor( $wlmpb_widget_four_body , 'wlmpb_widget_four_body', array(
                      'wpautop'       => false,
                      'media_buttons' => true,
                      'textarea_name' => 'wlmpb_widget_four_body',
                      'editor_class'  => 'my_custom_class',
                      'textarea_rows' => 15
                      ) );
                      ?>
                      </td>
                      </tr>

                      <?php } ?>
                      
                 <tr>
                      <th>Welcome Panel<p>Replaces the default WordPress welcome panel.</p></th>
                      <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_message_disable" value=".wlmpb-welcome" <?php checked( '.wlmpb-welcome', get_option( 'wlmpb_message_disable' ) ); ?> /><span class="wlmpb-slider round"></span></label>Enable
                      <p>
                      Enable to display your welcome message on the WordPress dashboard.
                      </p>
                      </td>
                      </tr>

											<tr class="wlmpb-title-holder">
											<th><h2 class="wlmpb-inner-title"><?php _e( 'Content', 'white-label-megapack-branding' ); ?></h2></th>
											</tr>

											<tr>
											<th><?php _e( 'Title', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" name="wlmpb_message_title" value="<?php echo esc_attr( get_option('wlmpb_message_title') ?: 'Welcome to your new website.' ); ?>" size="70" /></td>
											</tr>

											<tr>
											<th>
											Content
											<p>Customize your welcome message. You can upload images and links using the content editor. HTML markup can be used.</p>
											</th>

											<td class="wlmpb-custom-content">
											<?php
											wp_editor( $wlmpb_message_body , 'wlmpb_message_body', array(
											'wpautop'       => false,
											'media_buttons' => true,
											'textarea_name' => 'wlmpb_message_body',
											'editor_class'  => 'my_custom_class',
											'textarea_rows' => 15
											) );
											?>
											<p class="wlmpb-content-tip">Tip: If you would like to have an image be full width of the body. Click the "Text" tab on the top right corner and change the image width to 100% and the height to auto.</p>
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
