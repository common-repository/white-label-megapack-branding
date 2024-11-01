<?php

		
class Wlmpb_Stack_Plugin {
	
	
		protected static $instance;
		protected $__FILE__;

		/**
		 * Blank protected constructor
		 */
		protected function __construct() {
		}

		/**
		 * Initializes the plugin object and returns its instance
		 *
		 * @param string $__FILE__ the main plugin file's __FILE__ value.
		 *
		 * @return object The plugin object instance.
		 */
		public static function start( $__FILE__ ) {
			if ( ! isset( static::$instance ) ) {
				static::$instance           = new static();
				static::$instance->__FILE__ = $__FILE__;
			}

			return static::get_instance();
		}

		/**
		 * Returns the plugin's object instance.
		 *
		 * @return object The plugin object instance.
		 */
		public static function get_instance() {
			if ( isset( static::$instance ) ) {
				return static::$instance;
			}
		}

		/**
		 * Add a WordPress hook (action/filter).
		 *
		 * @param  mixed $hook,... first parameter is the name of the hook.
		 *                         If second or third parameters are included,
		 *                         they will be used as a priority (if an integer)
		 *                         or as a class method callback name (if a string).
		 *
		 * @return bool Always returns true.
		 */
		public function hook( $hook ) {
			$priority = 10;
			$method   = $this->sanitize_method( $hook );
			$args     = func_get_args();
			unset( $args[0] );
			foreach ( (array) $args as $arg ) {
				if ( is_int( $arg ) ) {
					$priority = $arg;
				} else {
					$method = $arg;
				}
			}

			return add_action( $hook, array( $this, $method ), $priority, 999 );
		}

		/**
		 * Remove a WordPress hook (action/filter).
		 *
		 * @param  mixed $hook,... first parameter is the name of the hook.
		 *                         If second or third parameters are included,
		 *                         they will be used as a priority (if an integer)
		 *                         or as a class method callback name (if a string).
		 *
		 * @return bool Always returns true.
		 */
		public function unhook( $hook ) {
			$priority = 10;
			$method   = $this->sanitize_method( $hook );
			$args     = func_get_args();
			unset( $args[0] );
			foreach ( (array) $args as $arg ) {
				if ( is_int( $arg ) ) {
					$priority = $arg;
				} else {
					$method = $arg;
				}
			}

			return remove_action( $hook, array( $this, $method ), $priority );
		}

		/**
		 * Sanitize a method name by replacing dots and dashes.
		 *
		 * @param string $method The method name to sanitize.
		 *
		 * @return string The sanitized method name.
		 */
		private function sanitize_method( $method ) {
			return str_replace( array( '.', '-' ), array( '_DOT_', '_DASH_' ), $method );
		}

		/**
		 * Includes a file (relative to the plugin base path)
		 * and optionally globalizes a named array passed in
		 *
		 * @param  string $file the file to include
		 * @param  array  $data a named array of data to globalize
		 */
		protected function include_file( $file, $data = array() ) {
			extract( $data, EXTR_SKIP );
			include( $this->get_path() . $file );
		}

		/**
		 * Returns the URL to the plugin directory
		 *
		 * @return string The URL to the plugin directory.
		 */
		public function get_url() {
			return plugin_dir_url( $this->__FILE__ );
		}

		/**
		 * Returns the path to the plugin directory.
		 *
		 * @return string The absolute path to the plugin directory.
		 */
		public function get_path() {
			return plugin_dir_path( $this->__FILE__ );
		}


	}



class Wlmpb_Re_Order_Admin_Menu extends Wlmpb_Stack_Plugin {

	/**
	 * @var self
	 */
	protected static $instance;

	/**
	 * Constructs the object, hooks in to `plugins_loaded`.
	 */
	protected function __construct() {
		$wlmpb_reorder_admin_activation = get_option('wlmpb_reorder_admin_menu');
    if (empty($wlmpb_reorder_admin_activation)) {
		$this->hook( 'plugins_loaded', 'add_hooks' );
	}
		}

	/**
	 * Adds hooks.
	 */
	public function add_hooks() {

		// Load admin style sheet and JavaScript.
		$this->hook( 'admin_enqueue_scripts' );

		// Add edit button to menu
		$this->hook( 'adminmenu', 'add_admin_menu_button' );

		// Handle form submissions
		$this->hook( 'wp_ajax_wlmpbam_update_menu', 'update_menu' );

		// Modify admin menu
		$this->hook( 'admin_menu', 'alter_admin_menu', 999 );

		// Tell WordPress we're changing the menu order
		add_filter( 'custom_menu_order', '__return_true' );

		// Add our filter way later, after other plugins have defined the menu
		$this->hook( 'menu_order', 'alter_admin_menu_order', 9999 );
	}


	/**
	 * Load our JavaScript and CSS if the user has enough capabilities to edit the menu.
	 */
	public function admin_enqueue_scripts() {
		if ( ! current_user_can( 'administrator' ) ) {
			return;
		}

		// Use minified libraries if SCRIPT_DEBUG is turned off
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_style( 'white-label-megapack-branding', $this->get_url() . 'css/admin-menu-manager' . $suffix . '.css', array() );

		global $_wp_admin_css_colors;

		$current_color = get_user_option( 'admin_color' );
		if ( isset( $_wp_admin_css_colors[ $current_color ] ) ) {
			$border     = $_wp_admin_css_colors[ $current_color ]->icon_colors['base'];
			$background = $_wp_admin_css_colors[ $current_color ]->colors[0];
			$base       = $_wp_admin_css_colors[ $current_color ]->icon_colors['base'];
			$focus      = $_wp_admin_css_colors[ $current_color ]->icon_colors['focus'];
			$current    = $_wp_admin_css_colors[ $current_color ]->icon_colors['current'];
			$inline_css = "
			#adminmenu:not(.ui-sortable-disabled) .wp-menu-separator.ui-sortable-handle { background-color: $background; border-color: $border !important; }
			#admin-menu-manager-edit .menu-top { color: $base; }
			#admin-menu-manager-edit .menu-top:focus,
			#admin-menu-manager-edit .menu-top:focus div.wp-menu-image:before { color: $focus !important; }
			#admin-menu-manager-edit:hover .menu-top,
			#admin-menu-manager-edit:hover div.wp-menu-image:before { color: $current !important; }
			";
			wp_add_inline_style( 'white-label-megapack-branding', $inline_css );
		}

		wp_enqueue_script(
			'white-label-megapack-branding',
			$this->get_url() . 'js/admin-menu-manager' . $suffix . '.js',
			array(
				'jquery-ui-sortable',
				'underscore'
			),
			true );

		wp_localize_script( 'white-label-megapack-branding', 'WlmpbAdminMenu', array(
			'buttonEdit'   => __( 'Edit Menu', 'white-label-megapack-branding' ),
			'buttonSave'   => __( 'Save', 'white-label-megapack-branding' ),
			'buttonSaving' => __( 'Saving&hellip;', 'white-label-megapack-branding' ),
			'buttonSaved'  => __( 'Saved!', 'white-label-megapack-branding' ),
			'adminMenu'    => self::get_admin_menu(),
		) );
	}

	/**
	 * Add our edit button to the menu.
	 */
	public function add_admin_menu_button() {
		if ( ! current_user_can( 'administrator' ) ) {
			return;
		}
		?>
		<li id="admin-menu-manager-edit" class="hide-if-no-js">
			<a href="#" class="menu-top" title="<?php esc_attr_e( 'Edit Menu', 'white-label-megapack-branding' ); ?>">
				<div class="wp-menu-image dashicons-before dashicons-edit"></div>
				<div class="wp-menu-name"><?php _e( 'Edit Menu', 'white-label-megapack-branding' ); ?></div>
			</a>
		</li>
		<?php
	}

	/**
	 * Grab a list of all registered admin pages.
	 *
	 * @since 1.0.0
	 */
	public function get_admin_menu() {
		global $menu, $submenu;

		if ( null === $menu ) {
			$menu = array();
		}

		$menu_items = array();

		foreach ( $menu as $menu_item ) {
			if ( ! empty( $submenu[ $menu_item[2] ] ) ) {
				foreach ( $submenu[ $menu_item[2] ] as $key => &$value ) {
					if ( '' === $key && '' === $value[0] ) {
						unset( $submenu[ $menu_item[2] ][ $key ] );
						continue;
					}
					$value[] = $key;
				}
				$menu_item[] = array_values( $submenu[ $menu_item[2] ] );
			} else {
				$menu_item[] = array();
			}

			$menu_items[] = $menu_item;
		}

		return $menu_items;
	}
	
	/**
		 * Sanitize a menu name by replacing dots and dashes.
		 *
		 * @param string $menu The menu name to sanitize.
		 *
		 * @return string The sanitized menu name.
		 */
		private function sanitize_menu( $menu ) {
			return str_replace( array( '.', '-' ), array( '_DOT_', '_DASH_' ), $menu );
		}
	/**
	 * Ajax Handler to update the menu.
	 *
	 * The passed array is splitted up in a menu and submenu array,
	 * just like WordPress uses it in the backend.
	 */
	public function update_menu() {
		$menu    = $this->sanitize_menu($_REQUEST['adminMenu']);
		$items   = array();
		$submenu = array();

		$separatorIndex = 1;
		$lastSeparator  = null;

		foreach ( $menu as $index => $item ) {
			$item[0] = wp_unslash( $item[0] );

			if ( isset( $item[7] ) ) {
				$submenu[ $item[2] ] = array();
				foreach ( $item[7] as $subitem ) {
					$subitem[0]            = wp_unslash( $subitem[0] );
					$subitem               = array_slice( $subitem, 0, 4 );
					$submenu[ $item[2] ][] = $subitem;
				}
				unset( $item[7] );
			}

			// Store separators in correct order
			if ( false !== strpos( $item[2], 'separator' ) ) {
				$item[2]       = 'separator' . $separatorIndex ++;
				$item[4]       = 'wp-menu-separator';
				$lastSeparator = count( $items );
			}

			$items[] = $item;
		}

		$items[ $lastSeparator ][2] = 'separator-last';

		// Note: The third autoload parameter was introduced in WordPress 4.2.0
		update_option( 'wlmpb_am_menu', $items, false );
		update_option( 'wlmpb_am_submenu', $submenu, false );

		die( 1 );
	}

	public function disable_translations( $translated_text, $text, $domain ) {
		return $text;
	}

	/**
	 * Here's where the magic happens!
	 *
	 * Compare our menu structure with the original.
	 * Essentially it uses the new order but with the original values,
	 * so translated strings and icons still work.
	 *
	 * 0 = menu_title, 1 = capability, 2 = menu_slug, 3 = page_title, 4 = classes
	 */
	public function alter_admin_menu() {
		
		$amm_menu    = get_option( 'wlmpb_am_menu', array() );
		$amm_submenu = get_option( 'wlmpb_am_submenu', array() );

		if ( empty( $amm_menu ) || empty( $amm_submenu ) ) {
			return;
		}

		global $menu, $submenu, $wp_filter, $admin_page_hooks;

		$temp_menu             = $menu;
		$temp_submenu          = $submenu;
		$temp_admin_page_hooks = $admin_page_hooks;

		$menu    = null;
		$submenu = null;

		// Iterate on the top level items
		foreach ( $amm_menu as $priority => &$item ) {
			// It was originally a top level item as well. It's a match!
			foreach ( $temp_menu as $key => $m_item ) {
				if ( $item[2] === $m_item[2] ) {
					if ( 'wp-menu-separator' == $m_item[4] ) {
						$menu[ $priority ] = $m_item;
					} else {
						add_menu_page(
							$m_item[3], // Page title
							$m_item[0], // Menu title
							$m_item[1], // Capability
							$m_item[2], // Slug
							'', // Function
							$m_item[6], // Icon
							$priority // Position
						);
					}

					unset( $temp_menu[ $key ] );
					continue 2;
				}
			}


			// Still no match, menu item must have been removed.
			unset( $temp_menu[ $priority ] );
		}

		// Iterate on all our submenu items
		foreach ( $amm_submenu as $parent_page => &$page ) {
			foreach ( $page as $priority => &$item ) {
				// Iterate on original submenu items
				foreach ( $temp_submenu as $s_parent_page => &$s_page ) {
					foreach ( $s_page as $s_priority => &$s_item ) {
						if ( $item[2] === $s_item[2] && $parent_page == $s_parent_page ) {
							$new_page = add_submenu_page(
								$s_parent_page, // Parent Slug
								isset( $s_item[3] ) ? $s_item[3] : $s_item[0], // Page title
								$s_item[0], // Menu title
								$s_item[1], // Capability
								$s_item[2] // SLug
							);

							unset( $temp_submenu[ $s_parent_page ][ $s_priority ] );

							continue 2;
						}
					}
				}

				
				

				// Still no match, menu item must have been removed.
			}
		}

		/**
		 * Append elements that haven't been added to a menu yet.
		 *
		 * This happens when installing a new plugin for example.
		 */
		$menu = array_merge( $menu, $temp_menu );

		foreach ( $temp_submenu as $parent => $item ) {
			if ( '' === $parent || empty( $item ) || ! is_array( $item ) ) {
				continue;
			}

			if ( isset( $submenu[ $parent ] ) ) {
				$submenu[ $parent ] = array_merge( $submenu[ $parent ], $item );
			} else {
				$submenu[ $parent ] = $item;
			}
		}

		/**
		 * Loop through admin page hooks.
		 *
		 * We want to keep the original, untranslated values.
		 */
		foreach ( $admin_page_hooks as $key => &$value ) {
			if ( isset( $temp_admin_page_hooks[ $key ] ) ) {
				$value = $temp_admin_page_hooks[ $key ];
			}
		}
	}

	/**
	 * Make sure our menu order is kept.
	 *
	 * Some plugins (I'm looking at you, Jetpack!) want to always be on top,
	 * let's fix this.
	 *
	 * @param array $menu_order WordPress admin menu order.
	 *
	 * @return array
	 */
	public function alter_admin_menu_order( $menu_order ) {
		global $menu;

		if ( ! get_option( 'wlmpb_am_menu', false ) ) {
			return $menu_order;
		}

		$new_order = array();
		foreach ( $menu as $item ) {
			$new_order[] = $item[2];
		}

		return $new_order;
	}

}

Wlmpb_Re_Order_Admin_Menu::start( __FILE__ );

	/**
	 * Fix Dashicons Woocommerce when use reorder menu
	 *
	 * Woocommerce use custom dashicons, issue custom class fixes
	 */

	
function callback_dashicons_woocommerce($buffer_class_woocommerce) {

    $buffer_class_woocommerce = str_replace('menu-top toplevel_page_woocommerce', 'menu-top menu-icon-generic toplevel_page_woocommerce', $buffer_class_woocommerce);
	$buffer_class_woocommerce = str_replace('menu-top toplevel_page_edit?post_type=product', 'menu-top menu-icon-product', $buffer_class_woocommerce);
	$buffer_class_woocommerce = str_replace('toplevel_page_edit-post_type-product', 'menu-posts-product', $buffer_class_woocommerce);
	

    return $buffer_class_woocommerce;
}

function buffer_start_replace_class() { ob_start("callback_dashicons_woocommerce"); }

function buffer_end_replace_class() { ob_end_flush(); }

add_action('admin_head', 'buffer_start_replace_class');
add_action('admin_footer', 'buffer_end_replace_class');
	
