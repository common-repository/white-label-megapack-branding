<?php


// Login Page Content

add_action( 'wlmpb_settings_content', 'wlmpb_login_settings_page' );
function wlmpb_login_settings_page() {
global $wlmpb_active_tab;
		if ( 'login-settings' != $wlmpb_active_tab )
		return;
?>

	  <h3><?php _e( 'Login Page Branding', 'white-label-megapack-branding' ); ?></h3>

    <form action="options.php" method="post">
				<?php
				settings_fields( 'white-label-megapack-branding-login' );
				do_settings_sections( 'white-label-megapack-branding-login' );
				$wlmpb_login_custom_content = get_option( 'wlmpb_login_custom_content' );
				$wlmpb_widget_body = get_option( 'wlmpb_widget_body' );
				?>

						<!-- Dashboard Styling Option Section -->

						<div class="wlmpb-inner-wrapper settings-login">
						<p class="wlmpb-settings-desc">Login page branding allows you to personalize the WordPress login page by adding your own logo, colors, background image, and text.</p>

						<div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

								<table class="form-table">
								<tbody>


								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( '', 'white-label-megapack-branding' ); ?>Logo</h2></th>
								</tr>

											<!-- Login Styling Option Section -->
											<tr>
											<th><?php _e( 'Login Logo', 'white-label-megapack-branding' ); ?></th>
											<td>
											<div>
											<input type="text" name="wlmpb_login_logo" id="image_url" value="<?php echo esc_attr( get_option('wlmpb_login_logo') ); ?>" class="regular-text">
											<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
											</div>
											<p>
											Replace the default WordPress logo. Max width: 320px.
											</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Logo Size', 'white-label-megapack-branding' ); ?>
											<p>Max width: 320px</p></th>
											<td>
											<div class="wlmpb-inline-option">
											<input class="input-short" type="text" placeholder="320px" name="wlmpb_logo_width" value="<?php echo esc_attr( get_option('wlmpb_logo_width') ); ?>" size="8" />
											<p>Width (px)</p>
											</div>
											<div class="wlmpb-inline-option">
											<input class="input-short" type="text" name="wlmpb_logo_height" value="<?php echo esc_attr( get_option('wlmpb_logo_height') ); ?>" size="8" />
											<p>Height (px)</p>
											</div>
											<div class="wlmpb-inline-option">
											<input class="input-short" type="text" name="wlmpb_logo_padding_bottom" value="<?php echo esc_attr( get_option('wlmpb_logo_padding_bottom') ?: '5px' ); ?>" size="8" />
											<p>Margin Bottom</p>
											</div>
											</td>
											</tr>

								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Colors & Background', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>

											<tr>
											<th><?php _e( 'Text & Link Color', 'white-label-megapack-branding' ); ?>
											</th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_login_body_text_color" value="<?php echo esc_attr( get_option('wlmpb_login_body_text_color') ); ?>" size="50" />
											<p>Select a text color for the login page. Note: This does not affect the login form.</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Background Color', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_login_background_color" value="<?php echo esc_attr( get_option('wlmpb_login_background_color') ); ?>" size="50" />
											<p>Select a background color for the login page.</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Background Image', 'white-label-megapack-branding' ); ?></th>
											<td>
											<div>
											<input type="text" name="wlmpb_login_background_image" id="image_url_two" value="<?php echo esc_attr( get_option('wlmpb_login_background_image') ); ?>" class="regular-text">
											<input type="button" name="upload-btn-two" id="upload-btn-two" class="button-secondary" value="Upload Image">
											</div>
											<p>Add a background image to the login page.</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Background Overlay', 'white-label-megapack-branding' ); ?>
											<p>Add a colored overlay to the background image.</p>
											</th>
											<td>
											<div class="wlmpb-inline-option">
											<input type="text" placeholder="" class="color-field" name="wlmpb_login_overlay_color" value="<?php echo esc_attr( get_option('wlmpb_login_overlay_color') ); ?>" size="50" />
											<p>
											Overlay Color
											</p>
											</div>
											<div class="wlmpb-inline-option">
											<input class="input-short" type="text" placeholder="" name="wlmpb_login_overlay_opacity" value="<?php echo esc_attr( get_option('wlmpb_login_overlay_opacity') ?: '0.5' ); ?>" size="8" />
											<p>
											Overylay Opacity (default 0.5)
											</p>
											</div>
											</td>
											</tr>

								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Extra Settings', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>

											<tr>
											<th><?php _e( 'Remember Checkbox', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_login_hide_rememberme_checkbox" value="hide_rememberme_checkbox" <?php checked( 'hide_rememberme_checkbox', get_option( 'wlmpb_login_hide_rememberme_checkbox' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide
											<p>
											Hide the checkbox "remember" from the login page.
											</p>
											</td>
											</tr>
											
											<tr>
											<th><?php _e( 'Lost Password Link', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_login_hide_password_link" value="hide_password_link" <?php checked( 'hide_password_link', get_option( 'wlmpb_login_hide_password_link' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide
											<p>
											Hide the lost password link from the login page.
											</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Back To Link', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_login_hide_main_site_link" value="hide_main_site_link" <?php checked( 'hide_main_site_link', get_option( 'wlmpb_login_hide_main_site_link' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide
											<p>
											Hide the back to link from the login page.
											</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Replace Logo URL', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="https://" name="wlmpb_login_logo_url" value="<?php echo esc_attr( get_option('wlmpb_login_logo_url') ); ?>" size="70" />
											<p>
											When login logo is clicked, the user will be redirected to this url. Default home url.
											</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Replace Logo Alt Text', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" name="wlmpb_login_logo_title" value="<?php echo esc_attr( get_option('wlmpb_login_logo_title') ); ?>" size="70" />
											<p>
											Alt text shown when mouse is hovered over the login logo.
											</p>
											</td>
											</tr>

								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Login Footer', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>

											<tr>
											<th>
											<?php _e( 'Custom Footer Text', 'white-label-megapack-branding' ); ?>
											<p>Add custom text to the login page footer.<br>e.g. Built by company name</p>
											</th>

											<td class="wlmpb-custom-content">
											<?php
											wp_editor( $wlmpb_login_custom_content , 'wlmpb_login_custom_content', array(
											'wpautop'       => false,
											'media_buttons' => true,
											'textarea_name' => 'wlmpb_login_custom_content',
											'editor_class'  => 'my_custom_class',
											'textarea_rows' => 5
											) );
											?>
											<p>Tip: You can adjust the alignment of the footer text by using the align tool on the toolbar.</p>
											</td>
											</tr>

									<tr class="wlmpb-title-holder">
									<th><h2 class="wlmpb-inner-title"><?php _e( 'Advanced Settings', 'white-label-megapack-branding' ); ?></h2></th>
									</tr>


												<tr>
												<th><?php _e( 'Rename Slug Login Page', 'white-label-megapack-branding' ); ?>
												<p>activate it to change the access slug to the admin panel. Then go to settings / permalinks.</p>
												</th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_login_rename_wpadmin" value="login_rename_wpadmin" <?php checked( 'login_rename_wpadmin', get_option( 'wlmpb_login_rename_wpadmin' ) ); ?> /><span class="wlmpb-slider round"></span></label>Active
											<p>
											</p>
											</td>
										    </tr>
										    <?php $wlmpb_login_rename_wpadmin = get_option('wlmpb_login_rename_wpadmin');
	                                              if ( !empty($wlmpb_login_rename_wpadmin) ) { ?>
											
											<th></th>
											<td>
											<p>Well, now that it is active go to settings / permalink or <a href="/wp-admin/options-permalink.php#change-login-url" target="_blank">click here</a>.</p>
											</td>
											</tr>
												<?php } ?>


								<tr class="wlmpb-float-option">
								<th class="wlmpb-save-section">
								<?php submit_button(); ?>
								<a class="wlmpb-preview-button" href="<?php echo site_url(); ?>/?wlmpb-preview-login-page" target="_blank">Preview Login Page</a>
								</th>
								</tr>

								</tbody>
								</table>
						</div>
      </form>
<?php }
