<?php


// Coming Soon Settings

add_action( 'wlmpb_settings_content', 'wlmpb_coming_soon' );
function wlmpb_coming_soon() {
		global $wlmpb_active_tab;
		if ( 'coming-soon' != $wlmpb_active_tab )
		return;
?>

  	<h3><?php _e( 'Coming Soon', 'white-label-megapack-branding' ); ?></h3>

		<!-- Begin settings form -->
    <form action="options.php" method="post">
				<?php
				settings_fields( 'white-label-megapack-branding-under_construction' );
				do_settings_sections( 'white-label-megapack-branding-under_construction' );
				$wlmpb_under_construction_body = get_option( 'wlmpb_under_construction_body' );
				?>

						<!-- Under Construction Mode Option Section -->

						<div class="wlmpb-inner-wrapper settings-coming-soon">
						<p class="wlmpb-settings-desc">The coming soon can be used as a coming soon or under construction page while working on the website. The coming soon is only visible to logged out users.</p>

						<div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

						<table class="form-table">
						<tbody>

						<!-- Under Construction Mode Option Section -->

						<tr class="wlmpb-title-holder">
						<th><h2 class="wlmpb-inner-title"><?php _e( 'Status', 'white-label-megapack-branding' ) ?></h2></th>
						</tr>

                  <tr>
                  <th><?php _e( 'Coming Soon Mode', 'white-label-megapack-branding' ) ?><p>Only visible to logged out users.</p></th>
                  <td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_under_construction_disable" value=".wlmpb-under-construction-wrapper" <?php checked( '.wlmpb-under-construction-wrapper', get_option( 'wlmpb_under_construction_disable' ) ); ?> /><span class="wlmpb-slider round"></span></label>Enable
                  <p>
                  Enable to activate coming soon mode.
                  </p>
                  </td>
                  </tr>

						<tr class="wlmpb-title-holder">
						<th><h2 class="wlmpb-inner-title"><?php _e( 'Content', 'white-label-megapack-branding' ) ?></h2></th>
						</tr>

									<tr>
									<th><?php _e( 'Logo', 'white-label-megapack-branding' ) ?></th>
									<td>
									<div>
									<label for="image_url_three"></label>
									<input type="text" name="wlmpb_under_construction_login_logo" id="image_url_three" value="<?php echo esc_attr( get_option('wlmpb_under_construction_login_logo') ); ?>" class="regular-text">
									<input type="button" name="upload-btn-three" id="upload-btn-three" class="button-secondary" value="Upload Image">
									</div>
									<p>
									Add a logo to the coming soon.
									</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Logo Width', 'white-label-megapack-branding' ) ?></th>
									<td><input class="input-short" type="text" placeholder="320px" name="wlmpb_under_construction_login_logo_width" value="<?php echo esc_attr( get_option('wlmpb_under_construction_login_logo_width') ); ?>" size="8" />
									<p>
									Set the width of the logo. (default auto)
									</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Logo Padding Bottom', 'white-label-megapack-branding' ) ?></th>
									<td><input class="input-short" type="text" placeholder="" name="wlmpb_construction_logo_padding_bottom" value="<?php echo esc_attr( get_option('wlmpb_construction_logo_padding_bottom') ?: '10px' ); ?>" size="8" />
									<p>
									Spacing between the logo and title. (default 10px)
									</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Title', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" placeholder="" name="wlmpb_under_construction_title" value="<?php echo esc_attr( get_option('wlmpb_under_construction_title') ); ?>" size="70" />
									<p>
									Title for the coming soon.
									</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Title Padding Bottom', 'white-label-megapack-branding' ) ?></th>
									<td><input class="input-short" type="text" placeholder="" name="wlmpb_under_construction_title_padding_bottom" value="<?php echo esc_attr( get_option('wlmpb_under_construction_title_padding_bottom') ?: '20px' ); ?>" size="8" />
									<p>
									Spacing between the title and content. (default 20px)
									</p>
									</td>
									</tr>

									<tr>
									<th>
									<?php _e( 'Content', 'white-label-megapack-branding' ) ?>
									<p>
									Customize the coming soon by using the content editor to add your own text. HTML markup can be used.
									</p>
									</th>

									<td class="wlmpb-custom-content">
									<?php
									wp_editor( $wlmpb_under_construction_body , 'wlmpb_under_construction_body', array(
									'wpautop'       => false,
									'media_buttons' => true,
									'textarea_name' => 'wlmpb_under_construction_body',
									'editor_class'  => 'my_custom_class',
									'textarea_rows' => 12
									) );
									?>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Button Text', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" placeholder="Contact Us" name="wlmpb_under_construction_button_text" value="<?php echo esc_attr( get_option('wlmpb_under_construction_button_text') ); ?>" size="70" />
									<p>
									To hide the button, leave this field empty. (default hidden)
									</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Button Link', 'white-label-megapack-branding' ) ?><p>Opens in a new tab.</p></th>
									<td>
									<input type="text" placeholder="https://4wp.it/" name="wlmpb_under_construction_button_link" value="<?php echo esc_attr( get_option('wlmpb_under_construction_button_link') ); ?>" size="70" />
									<p>
									You can use <b>mailto:name@email.com</b> to have your button open up visitors preferred mail.
									</p>
									</td>
									</tr>

						<tr class="wlmpb-title-holder">
						<th><h2 class="wlmpb-inner-title"><?php _e( 'Styling', 'white-label-megapack-branding' ) ?></h2></th>
						</tr>

									<tr>
									<th><?php _e( 'Text', 'white-label-megapack-branding' ) ?></th>
									<td>
									<div class="wlmpb-inline-option">
									<input type="text" placeholder="" class="color-field" name="wlmpb_under_construction_text_color" value="<?php echo esc_attr( get_option('wlmpb_under_construction_text_color') ); ?>" size="50" />
									<p>
									Text color
									</p>
									</div>
									<div class="wlmpb-inline-option">
									<select name="wlmpb_under_construction_font_family">
									<option value="Lato" <?php selected(get_option('wlmpb_under_construction_font_family'), "Lato"); ?>>Lato</option>
									<option value="Montserrat" <?php selected(get_option('wlmpb_under_construction_font_family'), "Montserrat"); ?>>Montserrat</option>
									<option value="Muli" <?php selected(get_option('wlmpb_under_construction_font_family'), "Muli"); ?>>Muli</option>
									<option value="Open Sans" <?php selected(get_option('wlmpb_under_construction_font_family'), "Open Sans"); ?>>Open Sans</option>
									<option value="Oswald" <?php selected(get_option('wlmpb_under_construction_font_family'), "Oswald"); ?>>Oswald</option>
									<option value="Poppins" <?php selected(get_option('wlmpb_under_construction_font_family'), "Poppins"); ?>>Poppins</option>
									<option value="Raleway" <?php selected(get_option('wlmpb_under_construction_font_family'), "Raleway"); ?>>Raleway</option>
									<option value="Roboto" <?php selected(get_option('wlmpb_under_construction_font_family'), "Roboto"); ?>>Roboto</option>
									<option value="Ubuntu" <?php selected(get_option('wlmpb_under_construction_font_family'), "Ubuntu"); ?>>Ubuntu</option>
									<option value="Source Sans Pro" <?php selected(get_option('wlmpb_under_construction_font_family'), "Source Sans Pro"); ?>>Source Sans Pro</option>
									</select>
									<p>
									Font family
									</p>
									</div>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Button', 'white-label-megapack-branding' ) ?></th>
									<td>
									<div class="wlmpb-inline-option">
								  <input type="text" placeholder="" class="color-field" name="wlmpb_under_construction_button_text_color" value="<?php echo esc_attr( get_option('wlmpb_under_construction_button_text_color') ); ?>" size="50" />
									<p>
									Text color
									</p>
									</div>
									<div class="wlmpb-inline-option">
									<input type="text" placeholder="" class="color-field" name="wlmpb_under_construction_button_color" value="<?php echo esc_attr( get_option('wlmpb_under_construction_button_color') ); ?>" size="50" />
									<p>
									Background color
									</p>
									</div>
			            <div class="wlmpb-inline-option">
									<input class="input-short" type="text" placeholder="" name="wlmpb_under_construction_button_radius" value="<?php echo esc_attr( get_option('wlmpb_under_construction_button_radius') ?: '3px' ); ?>" size="8" />
									<p>
									Border radius (default 3px)
									</p>
									</div>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Background Color', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" placeholder="" class="color-field" name="wlmpb_under_construction_background_color" value="<?php echo esc_attr( get_option('wlmpb_under_construction_background_color') ); ?>" size="50" />
									<p>
									Choose a background color for the coming soon.
									</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Background Image', 'white-label-megapack-branding' ) ?></th>
									<td>
									<div>
									<label for="image_url_four"></label>
									<input type="text" name="wlmpb_under_construction_background_image" id="image_url_four" value="<?php echo esc_attr( get_option('wlmpb_under_construction_background_image') ); ?>" class="regular-text">
									<input type="button" name="upload-btn-four" id="upload-btn-four" class="button-secondary" value="Upload Image">
									</div>
									<p>
									Add a background image to the coming soon.
									</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Background Overlay', 'white-label-megapack-branding' ) ?>
									<p>Add a colored overlay over the background image.</p>
								  </th>
									<td>
									<div class="wlmpb-inline-option">
									<input type="text" placeholder="" class="color-field" name="wlmpb_under_construction_overlay_color" value="<?php echo esc_attr( get_option('wlmpb_under_construction_overlay_color') ); ?>" size="50" />
									<p>
									Overlay Color
									</p>
									</div>
									<div class="wlmpb-inline-option">
									<input class="input-short" type="text" placeholder="" name="wlmpb_under_construction_overlay_opacity" value="<?php echo esc_attr( get_option('wlmpb_under_construction_overlay_opacity') ?: '0.5' ); ?>" size="8" />
									<p>
									Overlay Opacity (default 0.5)
									</p>
									</div>
									</td>
									</tr>


						<tr class="wlmpb-title-holder">
						<th><h2 class="wlmpb-inner-title"><?php _e( 'Social Settings', 'white-label-megapack-branding' ) ?></h2></th>
						</tr>

                  <tr>
                  <th><?php _e( 'Social Title', 'white-label-megapack-branding' ) ?><p>Default: Connect With Us.</p></th>
                  <td><input type="text" placeholder="Connect With Us" name="wlmpb_under_construction_social_title" value="<?php echo esc_attr( get_option('wlmpb_under_construction_social_title') ); ?>" size="70" />
                  <p>Change the social title text.</p>
                  </td>
                  </tr>

                  <tr>
                  <th><?php _e( 'Title Padding Top', 'white-label-megapack-branding' ) ?></th>
                  <td><input class="input-short" type="text" placeholder="" name="wlmpb_under_construction_social_padding" value="<?php echo esc_attr( get_option('wlmpb_under_construction_social_padding') ?: '60px' ); ?>" size="8" />
                  <p>Spacing between the content and social links on the coming soon. (default 60px)</p>
                  </td>
                  </tr>

									<tr>
									<th><?php _e( 'Facebook', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" placeholder="Facebook business or personal page URL" name="wlmpb_under_construction_facebook" value="<?php echo esc_attr( get_option('wlmpb_under_construction_facebook') ); ?>" size="70" />
									<p>Link to your personal or business Facebook page.</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Instagram', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" placeholder="Instagram Profile URL" name="wlmpb_under_construction_instagram" value="<?php echo esc_attr( get_option('wlmpb_under_construction_instagram') ); ?>" size="70" />
									<p>Link to your personal or business Instagram account.</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Twitter', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" placeholder="Twitter Profile URL" name="wlmpb_under_construction_twitter" value="<?php echo esc_attr( get_option('wlmpb_under_construction_twitter') ); ?>" size="70" />
									<p>Link to your personal or business Twitter account.</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'LinkedIn', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" placeholder="LinkedIn business or personal page URL" name="wlmpb_under_construction_linkedin" value="<?php echo esc_attr( get_option('wlmpb_under_construction_linkedin') ); ?>" size="70" />
									<p>Link to your personal or business LinkedIn account.</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'YouTube', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" placeholder="Youtube business or personal page URL" name="wlmpb_under_construction_youtube" value="<?php echo esc_attr( get_option('wlmpb_under_construction_youtube') ); ?>" size="70" />
									<p>Link to your personal or business YouTube account.</p>
									</td>
									</tr>

						<tr class="wlmpb-title-holder">
						<th><h2 class="wlmpb-inner-title"><?php _e( 'Tracking & SEO', 'white-label-megapack-branding' ) ?></h2></th>
						</tr>

									<tr style="padding-bottom: 25px;">
									<th><?php _e( 'Google Analytics ID', 'white-label-megapack-branding' ) ?></th>
									<td><a style="position: relative!important; top: 5px;" href="/wp-admin/admin.php?page=white-label-megapack-branding&tab=custom-code">Manage Tracking Code</a>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Meta Title', 'white-label-megapack-branding' ) ?></th>
									<td><input type="text" name="wlmpb_under_construction_meta_title" value="<?php echo esc_attr( get_option('wlmpb_under_construction_meta_title') ); ?>" size="70" />
									<p>Customize the meta title for the coming soon. This is the title that displays on seach engine results.</p>
									</td>
									</tr>

									<tr>
									<th><?php _e( 'Meta Description', 'white-label-megapack-branding' ) ?></th>
									<td><textarea rows="3" cols="90" type="textarea" placeholder="" name="wlmpb_under_construction_meta_description" value="<?php echo esc_attr( get_option('wlmpb_under_construction_meta_description') ); ?>" /><?php echo esc_attr( get_option('wlmpb_under_construction_meta_description') ); ?></textarea>
									<p>Customize the meta description for the coming soon. This is the description that displays on seach engine results.</p>
									</td>
									</tr>

						<tr class="wlmpb-title-holder">
						<th><h2 class="wlmpb-inner-title"><?php _e( 'Advanced Settings', 'white-label-megapack-branding' ) ?></h2></th>
						</tr>


									<tr>
									<th><?php _e( 'Coming Soon Custom CSS', 'white-label-megapack-branding' ) ?>
									<p>Enter your coming soon custom CSS here.</p>
									</th>
									<td><textarea rows="10" cols="100" type="textarea" placeholder="" name="wlmpb_pro_coming_soon_custom_css" value="<?php echo esc_attr( get_option('wlmpb_pro_coming_soon_custom_css') ); ?>" /><?php echo esc_attr( get_option('wlmpb_pro_coming_soon_custom_css') ); ?></textarea>
									<p>In case if you need to overwrite any CSS setting, you can add !important at the end of CSS property. eg: color: #da2234 !important;</p>
									</td>
									</tr>


						<tr class="wlmpb-float-option">
						<th class="wlmpb-save-section">
						<?php submit_button(); ?>
						<a class="wlmpb-preview-button" href="<?php echo site_url(); ?>/?wlmpb-preview-coming-soon" target="_blank">Preview Coming Soon</a>
						</th>
						</tr>

						</tbody>
						</table>
						</div>
      </form>
<?php }
