<?php


// Google Recaptcha Settings

add_action( 'wlmpb_settings_content', 'wlmpb_google_recaptcha_settings_page' );
function wlmpb_google_recaptcha_settings_page() {
		global $wlmpb_active_tab;
		if ( 'google-recaptcha-settings' != $wlmpb_active_tab ) {
				return;
		}
?>

	<h3><?php _e( 'Insert Google ReCaptcha', 'white-label-megapack-branding' ); ?></h3>

	<!-- Begin settings form -->
	<form action="options.php" method="post">
				<?php
				settings_fields( 'white-label-megapack-branding-google-recaptcha' );
				do_settings_sections( 'white-label-megapack-branding-google-recaptcha' );
				?>

						<!-- Google ReCaptcha Section -->

						<div class="wlmpb-inner-wrapper settings-google-recaptcha">
						<p class="wlmpb-settings-desc" style="padding-bottom: 6px;">You have to <a href="https://www.google.com/recaptcha/admin" target="_blank"> register your domain </a>first, get required keys from Google and save them bellow.</p>

						<div class="wlmpb-form-message"><?php settings_errors( 'wlmpb-notices' ); ?></div>

								<table class="form-table">
										<tbody>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Active Google ReCaptha?', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_google_recaptcha_active" value="google_recaptcha_active" <?php checked( 'google_recaptcha_active', get_option( 'wlmpb_google_recaptcha_active' ) ); ?> /><span class="wlmpb-slider round"></span></label>Active</div>
														</div>
												</div>

								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Insert Google Key v2', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>
								
								<tr>
											<th><?php _e( 'Site Key v2', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="ex. 6LcmJm0aAAAAAFeC55gACQc78bGl8v6gDp0koucU" name="wlmpb_google_recaptcha_site_key" value="<?php echo esc_attr( get_option('wlmpb_google_recaptcha_site_key') ); ?>" size="100" />
											<p>
											Use the site key provided by google.
											</p>
											</td>
											</tr>
											
																						<tr>
											<th><?php _e( 'Secret Key v2', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="ex. 6LcmJm0aAAAAggSh-Q3mqTMUbl5UfjCugXjQPzIG" name="wlmpb_google_recaptcha_secret_key" value="<?php echo esc_attr( get_option('wlmpb_google_recaptcha_secret_key') ); ?>" size="100" />
											<p>
											Uses the secret site key provided by google.
											</p>
											</td>
											</tr>
											
								<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) { ?>
											<tr class="wlmpb-next-update">
											<th><?php _e( 'Enable ReCaptcha in Woocommerce', 'white-label-megapack-branding' ); ?></th>
											<td>
											<p><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_google_recaptcha_woocommerce_loginregister" value="google_recaptcha_woocommerce_loginregister" <?php checked( 'google_recaptcha_woocommerce_loginregister', get_option( 'wlmpb_google_recaptcha_woocommerce_loginregister' ) ); ?> /><span class="wlmpb-slider round"></span></label>Enable in Login e Register form woocommerce</p>
											<p>
											</p>
											</td>
											</tr>
												<?php } ?>
												
					<tr>
                      <td>
                      <p style="margin-bottom: 800px;"></p>
                      </td>
                      </tr>


												<tr class="wlmpb-float-option">
														<th class="wlmpb-save-section dashboard">
														<?php submit_button(); ?>
														</th>
												</tr>

											</tbody>
								</table>
						</div>
				</form>
<?php
}
