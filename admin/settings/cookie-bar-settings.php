<?php


// Cookie Bar Content

add_action( 'wlmpb_settings_content', 'wlmpb_cookie_bar_settings_page' );
function wlmpb_cookie_bar_settings_page() {
global $wlmpb_active_tab;
		if ( 'cookie-bar-settings' != $wlmpb_active_tab )
		return;
?>

	  <h3><?php _e( 'Cookie Bar', 'white-label-megapack-branding' ); ?></h3>

    <form action="options.php" method="post">
				<?php
				settings_fields( 'white-label-megapack-branding-cookie-bar' );
				do_settings_sections( 'white-label-megapack-branding-cookie-bar' );
				?>

						<!-- Dashboard Styling Option Section -->

						<div class="wlmpb-inner-wrapper settings-login">
						<p class="wlmpb-settings-desc">In this page you can activate the cookie bar in frontend and change text and color for the visual aspect.</p>
						
											<tr>
											<th><?php _e( 'Active the cookie bar?', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_cookie_bar_activation" value="cookie_bar_activation" <?php checked( 'cookie_bar_activation', get_option( 'wlmpb_cookie_bar_activation' ) ); ?> /><span class="wlmpb-slider round"></span></label>Active
											<p>
											Active here the cookie bar.
											</p>
											</td>
											</tr>

						<div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

								<table class="form-table">
								<tbody>


								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Text , Color and link', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>


											<tr>
											<th><?php _e( 'Background Color Cookie Bar', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_cookie_bar_color_field_backgroundcolor" value="<?php echo esc_attr( get_option('wlmpb_cookie_bar_color_field_backgroundcolor') ); ?>" size="50" />
											<p>Select a background color for the cookie bar.</p>
											</td>
											</tr>
											
																						<tr>
											<th><?php _e( 'Text Color Cookie Bar', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_cookie_bar_color_field_textcolor" value="<?php echo esc_attr( get_option('wlmpb_cookie_bar_color_field_textcolor') ); ?>" size="50" />
											<p>Select a background color for the cookie bar.</p>
											</td>
											</tr>


											<tr>
											<th><?php _e( 'Text Field Cookie Bar', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="ex. Usiamo i cookie per poterti offrire una migliore esperienza di navigazione e non ci permettono in alcun modo di identificarti direttamente. Clicca su accetta per continuare la navigazione" name="wlmpb_cookie_bar_text_field_cookiesmessage" value="<?php echo esc_attr( get_option('wlmpb_cookie_bar_text_field_cookiesmessage') ); ?>" size="100" />
											<p>
											Insert the text message cookie bar to show at user in frontend.
											</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Link Page Cookie Policy URL', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="ex. https://mysite.com/cookiepages" name="wlmpb_cookie_bar_text_field_cookiesurl" value="<?php echo esc_attr( get_option('wlmpb_cookie_bar_text_field_cookiesurl') ); ?>" size="100" />
											<p>
											Insert the url page to cookie istruction to show at user in frontend.
											</p>
											</td>
											</tr>
											
																						<tr>
											<th><?php _e( 'Text Anchor Cookie Policy URL', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="ex. Learn More" name="wlmpb_cookie_bar_text_field_cookiesanchor" value="<?php echo esc_attr( get_option('wlmpb_cookie_bar_text_field_cookiesanchor') ); ?>" size="50" />
											<p>
											Insert the text anchor for click to page policy url at user in frontend.
											</p>
											</td>
											</tr>


								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Button Propieters', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>

											<tr>
											<th><?php _e( 'Background Color Button Cookie', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_cookie_bar_color_field_button_backgroundcolor" value="<?php echo esc_attr( get_option('wlmpb_cookie_bar_color_field_button_backgroundcolor') ); ?>" size="50" />
											<p>Select a background color for the button acceptanse.</p>
											</td>
											</tr>
											
											<tr>
											<th><?php _e( 'Text Color Button Cookie', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_cookie_bar_color_field_button_textcolor" value="<?php echo esc_attr( get_option('wlmpb_cookie_bar_color_field_button_textcolor') ); ?>" size="50" />
											<p>Select a text color for the button acceptanse.</p>
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