<?php
global $wlmpbham_nodes, $wp_roles, $roles, $wlmpbham_displayed, $alternate, $option;

$option = get_option( WLMPB_SETTING_BAR );
if ( empty( $option ) ) {
	$option = array();
}

$roles = $wp_roles->get_names();

// For rows
$alternate = true;

// Save displayed items
$wlmpbham_displayed = array();

// Setup children for nodes
foreach ( $wlmpbham_nodes as $node ) {
	if ( false == $node->parent || ! isset( $wlmpbham_nodes[ $node->parent ] ) ) {
		continue;
	}

	$parent = &$wlmpbham_nodes[ $node->parent ];
	if ( ! isset( $parent->children ) ) {
		$parent->children = array();
	}

	$parent->children[] = $node;
}

// Remove children nodes
foreach ( $wlmpbham_nodes as $k => $node ) {
	if ( false != $node->parent ) {
		unset( $wlmpbham_nodes[ $k ] );
	}
}
?>
<div class="wrap wlmpb-settings-wrapper">
<div class="wlmpb-header">
						<img clas="wlmpb-logo" src="<?php echo plugins_url( 'assets/white-label-megapack-branding-Logo.png', __FILE__ ); ?>" alt="White Label Megapack Branding" height="130" width="250" />
						<h1><?php _e( 'White Label MegaPack Branding', 'white-label-megapack-branding' ); ?></h1>
        </div>
        </div>
<div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name">
		<h2><?php _e( 'Hide Admin Bar', 'white-label-megapack-branding' ); ?></h2>

		<div class="wlmpb-settings-wrapper">
			<h3><p><?php esc_html_e( 'Checking a checkbox disables the access to the menu item for the corresponding role.', 'white-label-megapack-branding' ); ?></p>
			<p><?php esc_html_e( 'If no checkbox is available, it means the corresponding role cannot access the menu item by default (and you can\'t enable it with this plugin either).', 'white-label-megapack-branding' ); ?></p>
			<p><?php echo __( 'If you need NOT to allow the user role to still access the page you have hidden, <a href="/wp-admin/admin.php?page=white-label-megapack-branding&tab=header-footer-admin-wordpress-settings"> first enable the option PERMISSION from here </a>. ', 'white-label-megapack-branding' ); ?></p></h3>
	</div>
	</div>
		<form method="post" action="options.php">

			<?php settings_fields( WLMPB_SETTING_BAR ); ?>

			<table class="widefat" id="wlmpb-selection">
				<thead>
				<tr>
					<th><h3><?php _e( 'Menu Item', 'white-label-megapack-branding' ); ?><h3></th>
					<?php
					foreach ( $roles as $role => $name ) {
						echo "<th class='wlmpb-center'><h2>{$name}</h2></th>";
					}
					?>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ( $wlmpbham_nodes as $k => $node ) {
					ham_show_admin_bar_item( $node );
				}
				?>
				</tbody>
				<tfoot>
				<tr>
					<th><?php _e( 'Menu Item', 'white-label-megapack-branding' ); ?></th>
					<?php
					foreach ( $roles as $role => $name ) {
						echo "<th class='wlmpb-center'><h2>{$name}</h2></th>";
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

<?php
/**
 * Show a table row for an item
 *
 * @param object $node
 * @param int    $depth
 */
function ham_show_admin_bar_item( $node, $depth = 0 ) {
	global $roles, $alternate, $wlmpbham_displayed, $option;

	// Check if item is displayed
	// If not, then not increase $depth
	$is_displayed = false;

	// Display item only it has title
	// And it hasn't been displayed
	if ( ! $node->group && ! in_array( $node->id, $wlmpbham_displayed ) ) {
		$class = "wlmpb-item-level-{$depth}";
		if ( $alternate ) {
			$class .= ' alternate';
		}

		// Get menu item title
		// Treat specially for special items
		switch ( $node->id ) {
			case 'wp-logo':
				$title = __( 'WordPress Logo', 'white-label-megapack-branding' );
				break;
			case 'comments':
				$title = __( 'Comments', 'white-label-megapack-branding' );
				break;
			case 'updates':
				$title = __( 'Updates', 'white-label-megapack-branding' );
				break;
			case 'my-account':
				$title = __( 'My Account', 'white-label-megapack-branding' );
				break;
			case 'user-info':
				$title = __( 'User Info', 'white-label-megapack-branding' );
				break;
			default:
				$title = wp_strip_all_tags( $node->title );
		}

		if ( $depth ) {
			$title = "— {$title}";
		}

		echo "
			<tr class='{$class}' data-id='{$node->id}' data-parent='{$node->parent}'>
				<td><h4>{$title}</h4></td>
		";

		$checked_roles = empty( $option[ $node->id ] ) ? array() : $option[ $node->id ];
		foreach ( $roles as $role => $name ) {
			echo '<td class="wlmpb-center">';

			echo "<label class='wlmpb-switch'><input type='checkbox' name='" . WLMPB_SETTING_BAR . "[{$node->id}][]' value='{$role}'" . checked( in_array( $role, $checked_roles ), true, false ) . ' /><span class="wlmpb-slider round"></span></label>';

			echo '</td>';
		}

		// Don't display the item in the future
		$wlmpbham_displayed[] = $node->id;

		// Change row class
		$alternate = ! $alternate;

		// Update item displayed status
		$is_displayed = true;
	}

	// Display child nodes
	if ( ! empty( $node->children ) ) {
		if ( $is_displayed ) {
			$depth ++;
		}
		foreach ( $node->children as $child_node ) {
			ham_show_admin_bar_item( $child_node, $depth );
		}
	}
}
