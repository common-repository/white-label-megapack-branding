<?php


// Manager Website Role Settings

add_action( 'wlmpb_settings_content', 'wlmpb_managerwebsite_access_page' );
function wlmpb_managerwebsite_access_page() {
		global $wlmpb_active_tab;
		if ( 'managerwebsite-access' != $wlmpb_active_tab ) {
				return;
		}
?>

	<h3><?php _e( 'Assign Manager Website Capabilities', 'white-label-megapack-branding' ); ?></h3>

	<!-- Begin settings form -->
	<form action="options.php" method="post">
				<?php
				settings_fields( 'white-label-megapack-branding-managerwebsite' );
				do_settings_sections( 'white-label-megapack-branding-managerwebsite' );
				?>

						<!-- Manager Website Option Section -->

						<div class="wlmpb-inner-wrapper settings-managerwebsite-access">
						<p class="wlmpb-settings-desc" style="padding-bottom: 6px;">The Website Manager role is an additional role added to your wordpress identical to the native wordpress editor role. In this section you can enhance his skills, allowing you to do other actions on your site. This role is indicated to be given to your client for the management of the site.</p>

						<div class="wlmpb-form-message"><?php settings_errors( 'wlmpb-notices' ); ?></div>

								<table class="form-table">
										<tbody>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Appearance', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_appearance" value="wlmpb_role_apperearance" <?php checked( 'wlmpb_role_apperearance', get_option( 'wlmpb_managerwebsite_appearance' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
														</div>
												</div>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Settings', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_settings" value="wlmpb_managerwebsite_settings" <?php checked( 'wlmpb_managerwebsite_settings', get_option( 'wlmpb_managerwebsite_settings' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
														</div>
												</div>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Manage Users', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_manage_users" value="wlmpb_managerwebsite_manage_users" <?php checked( 'wlmpb_managerwebsite_manage_users', get_option( 'wlmpb_managerwebsite_manage_users' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
														</div>
												</div>

												<div class="wlmpb-dynamic-item ui-state-default top-menu">
														<a class="wlmpb-item-toggle" href="#"></a>
														<div class="wlmpb-item-name"><?php _e( 'Manage Plugins', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_manage_plugins" value="wlmpb_managerwebsite_manage_plugins" <?php checked( 'wlmpb_managerwebsite_manage_plugins', get_option( 'wlmpb_managerwebsite_manage_plugins' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
														</div>
												</div>
												
														<div class="wlmpb-dynamic-subitems-wrap wlmpb-dynamic-capabilities wlmpb-item-hidden">
														<div class="wlmpb-dynamic-subitems-flex">
																<div class="wlmpb-dynamic-item ui-state-default submenu">
																<div class="wlmpb-item-name"><?php _e( 'Of course the plugin WLMPB will disappear from the plugin list for this role', 'white-label-megapack-branding' ); ?><span style="opacity: 0.45; font-size: 12px; padding-left: 7px"> </span></div>
															
																</div>
																</div>
														</div>
												</div>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Manage Themes', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_manage_theme" value="wlmpb_managerwebsite_manage_theme" <?php checked( 'wlmpb_managerwebsite_manage_theme', get_option( 'wlmpb_managerwebsite_manage_theme' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
														</div>
												</div>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Update WordPress', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_update_capability" value="wlmpb_managerwebsite_update_capability" <?php checked( 'wlmpb_managerwebsite_update_capability', get_option( 'wlmpb_managerwebsite_update_capability' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
													 	</div>
												</div>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Edit Code Files', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_edit_files" value="wlmpb_managerwebsite_edit_files" <?php checked( 'wlmpb_managerwebsite_edit_files', get_option( 'wlmpb_managerwebsite_edit_files' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
													 	</div>
												</div>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Import', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_import" value="wlmpb_managerwebsite_import" <?php checked( 'wlmpb_managerwebsite_import', get_option( 'wlmpb_managerwebsite_import' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
												 		</div>
												</div>

												<div class="wlmpb-dynamic-item">
														<div class="wlmpb-item-name"><?php _e( 'Export', 'white-label-megapack-branding' ); ?></div>
														<div class="wlmpb-item-capabilities">
																<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_managerwebsite_export" value="wlmpb_managerwebsite_export" <?php checked( 'wlmpb_managerwebsite_export', get_option( 'wlmpb_managerwebsite_export' ) ); ?> /><span class="wlmpb-slider round"></span></label>Authorize</div>
													 	</div>
												</div>
												
								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Extra Settings', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>
												
											<tr>
											<th><?php _e( 'Screen Options', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_dashboard_admin_bar_screen_options" value="wlmpb_dashboard_admin_bar_screen_options" <?php checked( 'wlmpb_dashboard_admin_bar_screen_options', get_option( 'wlmpb_dashboard_admin_bar_screen_options' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide
											<p>
											Hide screen options tab from the admin bar for user role 'Manager Website'.
											</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Help Box', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_dashboard_admin_bar_help" value="wlmpb_dashboard_admin_bar_help" <?php checked( 'wlmpb_dashboard_admin_bar_help', get_option( 'wlmpb_dashboard_admin_bar_help' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide
											<p>
											Hide help box tab from the admin bar for user role 'Manager Website'.
											</p>
											</td>
											</tr>
												
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
