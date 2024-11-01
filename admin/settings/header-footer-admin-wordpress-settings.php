<?php


// Dashboard Settings

add_action( 'wlmpb_settings_content', 'wlmpb_dashboard_settings_page' );
function wlmpb_dashboard_settings_page() {
		global $wlmpb_active_tab;
		if ( 'header-footer-admin-wordpress-settings' != $wlmpb_active_tab )
		return;
?>

	  <h3><?php _e( 'Header and Footer Branding', 'white-label-megapack-branding' ); ?></h3>

		<!-- Begin settings form -->
    <form action="options.php" method="post">
				<?php
				settings_fields( 'white-label-megapack-branding-settings' );
				do_settings_sections( 'white-label-megapack-branding-settings' );
				$wlmpb_admin_footer_text = get_option( 'wlmpb_admin_footer_text' );
				?>

						<!-- Dashboard Styling Option Section -->

						<div class="wlmpb-inner-wrapper settings-dashboard">
						<p class="wlmpb-settings-desc">In this section gives you the ability to customize, white label, and rebrand the WordPress header and footer to create a personalized experience.</p>

						<div class="wlmpb-form-message"><?php settings_errors('wlmpb-notices'); ?></div>

								<table class="form-table">
								<tbody>

								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Theme', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>

											<tr>
											<th><?php _e( 'Modern Admin Bar e Menu', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_dashboard_modern_theme" value="disable_modern_theme" <?php checked( 'disable_modern_theme', get_option( 'wlmpb_dashboard_modern_theme' ) ); ?> /><span class="wlmpb-slider round"></span></label>Enable
											<p>
											Give the WordPress admin bar and menu style in a modern look and feel.
											</p>
											</td>
											</tr>
											
								<tr id="wlmpb-auto-detect" class="wlmpb-title-holder">
						        <th><h2 class="wlmpb-inner-title"><?php _e( 'Auto Detect Admin Bar e Menu', 'white-label-megapack-branding' ) ?></h2></th>
						        </tr>

									        <tr style="padding-bottom: 25px;">
									        <th><?php _e( 'Admin Bar auto detect', 'white-label-megapack-branding' ) ?></th>
									        <td><a style="position: relative!important; top: 5px;" href="/wp-admin/admin.php?page=white-label-megapack-branding?=auto-detect-admin-bar">Manage Admin Bar for role here</a>
									        </td>
									        </tr>
									        
									        									        <tr style="padding-bottom: 25px;">
									        <th><?php _e( 'Menu auto detect', 'white-label-megapack-branding' ) ?></th>
									        <td><a style="position: relative!important; top: 5px;" href="/wp-admin/admin.php?page=white-label-megapack-branding?=auto-detect-menu">Manage Menu for role here</a>
									        </td>
									        </tr>
									        
									        											<tr>
											<th><?php _e( 'Permission', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_allow_access_from_hide_menu" value="allow_access_from_hide_menu" <?php checked( 'allow_access_from_hide_menu', get_option( 'wlmpb_allow_access_from_hide_menu' ) ); ?> /><span class="wlmpb-slider round"></span></label>No - Deactivate
											<p>
											Do you want to allow access after you hide section in admin bar and menu?
											</p>
											</td>
											</tr>
											
											<th><?php _e( 'Re-Order Menu Admin', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_reorder_admin_menu" value="reorder_admin_menu" <?php checked( 'reorder_admin_menu', get_option( 'wlmpb_reorder_admin_menu' ) ); ?> /><span class="wlmpb-slider round"></span></label>Deactive
											<p>
											If you want to desable the reorder admin menu wordpress.
											</p>
											<p>
											The reorder menu is only visibile in to role administrator
											</p>
											<p>
											and is only visible in desktop format, not on mobile
											</p>
											</td>
											</tr>								
								


								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Admin Bar', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>

											<tr>
											<th><?php _e( 'Text Color', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_dashboard_admin_bar_text_color" value="<?php echo esc_attr( get_option('wlmpb_dashboard_admin_bar_text_color') ); ?>" size="50" />
											<p>
											Select a text color for the admin bar and active menu items.
											</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Background Color', 'white-label-megapack-branding' ); ?><p>Commonly used as an accent color.</p></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_dashboard_accent" value="<?php echo esc_attr( get_option('wlmpb_dashboard_accent') ); ?>" size="50" />
											<p>
											Select a background color for the admin bar and active menu items.
											</p>
											</td>
											</tr>
											
											<tr>
											<th><?php _e( 'Frontend Admin Bar Styling', 'white-label-megapack-branding' ) ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_misc_admin_bar_frontend_styling" value="wlmpb_misc_admin_bar_frontend_styling" <?php checked( 'wlmpb_misc_admin_bar_frontend_styling', get_option( 'wlmpb_misc_admin_bar_frontend_styling' ) ); ?> /><span class="wlmpb-slider round"></span></label>Disable
											<p>Disable the frontend admin bar color styling.</p>
											</td>
											</tr>



								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Admin Menu', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>


											<tr>
											<th><?php _e( 'Main Menu', 'white-label-megapack-branding' ); ?></th>
											<td>
											<div class="wlmpb-inline-option">
											<input type="text" placeholder="" class="color-field" name="wlmpb_dashboard_text_color" value="<?php echo esc_attr( get_option('wlmpb_dashboard_text_color') ); ?>" size="50" />
											<p><?php _e( 'Text', 'white-label-megapack-branding' ); ?></p>
											</div>
											<div class="wlmpb-inline-option">
											<input type="text" placeholder="" class="color-field" name="wlmpb_dashboard_background_dark" value="<?php echo esc_attr( get_option('wlmpb_dashboard_background_dark') ); ?>" size="50" />
											<p><?php _e( 'Background', 'white-label-megapack-branding' ); ?></p>
											</div>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Submenu', 'white-label-megapack-branding' ); ?></th>
											<td>
											<div class="wlmpb-inline-option wlmpb-admin-bar-menu">
											<input type="text" placeholder="" class="color-field" name="wlmpb_dashboard_submenu_text_color" value="<?php echo esc_attr( get_option('wlmpb_dashboard_submenu_text_color') ); ?>" size="50" />
											<p><?php _e( 'Submenu Text', 'white-label-megapack-branding' ); ?></p>
											</div>
											<div class="wlmpb-inline-option wlmpb-admin-bar-menu">
											<input type="text" placeholder="" class="color-field" name="wlmpb_dashboard_background_light" value="<?php echo esc_attr( get_option('wlmpb_dashboard_background_light') ); ?>" size="50" />
											<p><?php _e( 'Submenu Background', 'white-label-megapack-branding' ); ?></p>
											</div>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Menu Item Seperator', 'white-label-megapack-branding' ); ?>
											<p>Only applicable if modern dashboard is enabled.</p></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_dashboard_border_color" value="<?php echo esc_attr( get_option('wlmpb_dashboard_border_color') ?: 'rgba(255, 255, 255, 0.075)' ); ?>" size="50" />
											<p>
											Select a color for the horizontal separators between menu items.
											</p>
											</td>
											</tr>


								<tr class="wlmpb-title-holder">
								<th><h2 class="wlmpb-inner-title"><?php _e( 'Extra Settings', 'white-label-megapack-branding' ); ?></h2></th>
								</tr>

											<tr>
											<th><?php _e( 'Link & Button Colors', 'white-label-megapack-branding' ); ?></th>
											<td><input type="text" placeholder="" class="color-field" name="wlmpb_dashboard_link_text_color" value="<?php echo esc_attr( get_option('wlmpb_dashboard_link_text_color') ); ?>" size="50" />
											<p>
											Change the link and button colors throughout the WordPress dashboard.
											</p>
											</td>
											</tr>

											<tr>
											<th>Replace Howdy Text</th>
											<td><input class="regular-text" type="text" placeholder="Hello" name="wlmpb_howdy_text" value="<?php echo esc_attr( get_option('wlmpb_howdy_text') ); ?>" size="30" />
											<p>
											Customize the "Howdy" text for logged in users.
											</p>
											</td>
											</tr>

											<tr>
											<th><?php _e( 'Footer WP Version', 'white-label-megapack-branding' ); ?></th>
											<td><label class="wlmpb-switch"><input type="checkbox" name="wlmpb_admin_footer_version" value="#footer-upgrade" <?php checked( '#footer-upgrade', get_option( 'wlmpb_admin_footer_version' ) ); ?> /><span class="wlmpb-slider round"></span></label>Hide
											<p>
											Hide the current WordPress version from dashboard footer.
											</p>
											</td>
											</tr>

											<tr>
											<th>
											<?php _e( 'Custom Footer Text', 'white-label-megapack-branding' ); ?>
											<p>
											Enter the text you would like to display in the dashboard footer by replacing the default text. HTML markup can be used.
											</p>
											</th>

											<td class="wlmpb-custom-content">
											<?php
											wp_editor( $wlmpb_admin_footer_text , 'wlmpb_admin_footer_text', array(
											'wpautop'       => false,
											'media_buttons' => true,
											'textarea_name' => 'wlmpb_admin_footer_text',
											'editor_class'  => 'wlmpb-custom-footer',
											'textarea_rows' => 5
											) );
											?>
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
<?php }
