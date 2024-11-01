<?php
// Note that when we first hook to 'admin_menu', we save all current menu items to $wlmpbham_menu, $wlmpbham_submenu
global $wlmpbham_menu, $wlmpbham_submenu, $wp_roles;

$network_option = get_site_option( WLMPB_SETTING_MENU_DETECT, array() );
$option         = get_option( WLMPB_SETTING_MENU_DETECT, array() );

$action_page = is_network_admin() ? '' : 'options.php';

$roles = $wp_roles->get_names();

$alternate = true;
?>
		<div class="wrap wlmpb-settings-wrapper">
<div class="wlmpb-header">
						<img clas="wlmpb-logo" src="<?php echo plugins_url( 'assets/white-label-megapack-branding-Logo.png', __FILE__ ); ?>" alt="White Label Megapack Branding" height="130" width="250" />
						<h1><?php _e( 'White Label MegaPack Branding', 'white-label-megapack-branding' ); ?></h1>
        </div>
        </div>
<div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name">
	<h2><?php _e( 'Menu Automatic Detect', 'white-label-megapack-branding' ); ?></h2>
	<div class="wlmpb-settings-wrapper">
		<h3><p><?php esc_html_e( 'Checking a checkbox disables the access to the menu item for the corresponding role.', 'white-label-megapack-branding' ); ?></p>
		<p><?php esc_html_e( 'If no checkbox is available, it means the corresponding role cannot access the menu item by default (and you can\'t enable it with this plugin either).', 'white-label-megapack-branding' ); ?></p>
		<?php if ( is_multisite() ) : ?>
			<p><?php esc_html_e( 'Disabled (grey) checkbox means the corresponding menu is hidden network-wide.', 'white-label-megapack-branding' ); ?></p>
		<?php endif; ?>
		<p><strong><?php echo __( 'If you need NOT to allow the user role to still access the page you have hidden, <a href="/wp-admin/admin.php?page=white-label-megapack-branding&tab=header-footer-admin-wordpress-settings"> first enable the option PERMISSION from here </a>. ', 'white-label-megapack-branding' ); ?></strong></p></h3>
	</div>
	</div>

	<form method="post" action="<?php echo $action_page; ?>">

		<?php settings_fields( WLMPB_SETTING_MENU_DETECT ); ?>

		<table class="widefat" id="wlmpb-selection">
		<div>
			<thead>
			<tr>
				<th><h3><?php _e( 'Menu Item', 'white-label-megapack-branding' ); ?></h3></th>
				<?php
				foreach ( $roles as $role => $name ) {
					echo "<th class='wlmpb-center'><h2>{$name}</h2></th>";
				}
				?>
			</tr>
			</thead>
			</div>
			<tbody>
			<?php
			foreach ( $wlmpbham_menu as $top_item ) {
				$top_text = $top_item[0];
				if ( $top_text == '' ) {
					// If this is a separator
					if ( in_array( 'wp-menu-separator', $top_item ) || in_array( 'wp-menu-separator-last', $top_item ) ) {
						$top_text = __( 'Separator', 'white-label-megapack-branding' );
					}
					// Otherwise, the top menu has no title, it still appears in WP admin area, so we don't ignore it
				}

				$top_page   = $top_item[2];
				$capability = $top_item[1];
				if ( is_numeric( $capability ) ) {
					$capability = ham_user_level_to_capability( $capability );
				}

				echo "
					<tr class='wlmpb-items-level-0" . ( $alternate ? ' alternate' : '' ) . "' data-id='{$top_page}'>
						<td><h2>{$top_text}</h2></td>
				";

				$network_option_top = empty( $network_option[ $top_page ] ) ? array() : $network_option[ $top_page ];
				$option_top         = empty( $option[ $top_page ] ) ? array() : $option[ $top_page ];

				$top_tpl = '<label class="wlmpb-switch"><input type="checkbox" name="%s[%s][]" value="%s"%s%s><span class="wlmpb-slider round"></span></label>';
				$sub_tpl = '<label class="wlmpb-switch"><input type="checkbox" name="%s[%s][%s][]" value="%s"%s%s><span class="wlmpb-slider round"></span></label>';

				foreach ( $roles as $role => $name ) {
					echo '<td class="wlmpb-center">';

					// Show checkbox only if current role has capability
					$role_object = get_role( $role );
					if ( $role_object->has_cap( $capability ) ) {
						$item_tpl = sprintf( $top_tpl, WLMPB_SETTING_MENU_DETECT, $top_page, $role, '%s', '%s' );

						// Escape URL which contains '%'
						$item_tpl = str_replace( '%', '%%', $item_tpl );
						$item_tpl = str_replace( '%%s', '%s', $item_tpl );

						if ( is_multisite() ) {
							// In network admin config page
							if ( is_network_admin() ) {
								printf( $item_tpl, checked( in_array( $role, $network_option_top ), true, false ), '' );
							} // Hidden network-wide
							elseif ( in_array( $role, $network_option_top ) ) {
								printf( $item_tpl, ' checked="checked"', ' disabled="disabled"' );
							} else {
								printf( $item_tpl, checked( in_array( $role, $option_top ), true, false ), '' );
							}
						} else {
							printf( $item_tpl, checked( in_array( $role, $option_top ), true, false ), '' );
						}
					}

					echo '</td>';
				}

				echo '</tr>';

				$alternate = ! $alternate;

				// If current menu item has sub menu, echo its sub menu items
				if ( isset( $wlmpbham_submenu[ $top_page ] ) ) {
					foreach ( $wlmpbham_submenu[ $top_page ] as $sub_item ) {
						$sub_text   = $sub_item[0];
						$sub_page   = $sub_item[2];
						$capability = $sub_item[1];
						if ( is_numeric( $capability ) ) {
							$capability = ham_user_level_to_capability( $capability );
						}

						// If submenu has no title, just ignore it as it doesn't appear
						if ( $sub_text == '' ) {
							continue;
						}

						$network_option_sub = empty( $network_option_top[ $sub_page ] ) ? array() : $network_option_top[ $sub_page ];
						$option_sub         = empty( $option_top[ $sub_page ] ) ? array() : $option_top[ $sub_page ];

						echo "
							<tr class='wlmpb-items-level-1" . ( $alternate ? ' alternate' : '' ) . "' data-parent='{$top_page}'>
								<td>— {$sub_text}</td>
						";
						if ( strpos( $sub_page, '&amp;' ) ) {
							$sub_page = str_replace( '&amp;', '&amp;amp;', $sub_page );
						}
						foreach ( $roles as $role => $name ) {
							echo '<td class="wlmpb-center">';

							// Show checkbox only if current role has capability
							$role_object = get_role( $role );
							if ( $role_object->has_cap( $capability ) ) {
								$item_tpl = sprintf( $sub_tpl, WLMPB_SETTING_MENU_DETECT, $top_page, $sub_page, $role, '%s', '%s' );

								// Escape URL which contains '%'
								$item_tpl = str_replace( '%', '%%', $item_tpl );
								$item_tpl = str_replace( '%%s', '%s', $item_tpl );

								if ( is_multisite() ) {
									// In network admin config page
									if ( is_network_admin() ) {
										printf( $item_tpl, checked( in_array( $role, $network_option_sub ), true, false ), '' );
									} // Hidden network-wide
									elseif ( in_array( $role, $network_option_sub ) ) {
										printf( $item_tpl, ' checked="checked"', ' disabled="disabled"' );
									} else {
										printf( $item_tpl, checked( in_array( $role, $option_sub ), true, false ), '' );
									}
								} else {
									printf( $item_tpl, checked( in_array( $role, $option_sub ), true, false ), '' );
								}
							}

							echo '</td>';
						}

						echo '</tr>';

						$alternate = ! $alternate;
					}
				}
			}
			?>
			</tbody>
			<tfoot>
			<tr>
				<th><?php _e( 'Menu Item', 'white-label-megapack-branding' ); ?></th>
				<?php
				foreach ( $roles as $role => $name ) {
					echo "<th class='wlmpb-center'>{$name}</th>";
				}
				?>
			</tr>
			</tfoot>
		</table>
		<p class="submit">
			<?php submit_button( __( 'Save Settings', 'white-label-megapack-branding' ), 'primary', 'submit', false ); ?>
			<?php submit_button( __( 'Reset', 'white-label-megapack-branding' ), 'primary', 'reset', false ); ?>
		</p>
		<div class="white-label-megapack-branding-footer">Return to <a href="/wp-admin/admin.php?page=white-label-megapack-branding" >WLMPB MENU</a>.</div>
	</form>
</div>
