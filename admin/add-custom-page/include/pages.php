<?php
/**
 * Display 'Pages', 'Add page', 'Edit page' pages
 * @subpackage Custom Admin Page
 * @since 0.1
 */

/**
 * Create class Cstmdmnpg_Pages_List
 * for displaying page with document pages
 */
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
if ( ! class_exists( 'Cstmdmnpg_Pages_List' ) ) {
	class Cstmdmnpg_Pages_List extends WP_List_Table {
		/**
		* Constructor of class
		*/
		function __construct() {
			parent::__construct( array(
				'singular'  => __( 'page', 'white-label-megapack-branding' ),
				'plural'    => __( 'pages', 'white-label-megapack-branding' ),
				'ajax'      => true,
				)
			);
		}
		/**
		* Function to prepare data before display
		* @return void
		*/
		function prepare_items() {
			$columns               = $this->get_columns();
			$hidden                = array();
			$sortable              = $this->get_sortable_columns();
			$this->items           = $this->pages_list();
			$per_page              = $this->get_items_per_page( 'wlmpbam_per_page', 20 );
			$current_page          = $this->get_pagenum();
			$total_items           = $this->items_count();
			$this->set_pagination_args( array(
					'total_items' => $total_items,
					'per_page'    => $per_page,
				)
			);
		}
		/**
		* Function to show message if not pages found
		* @return void
		*/
		function no_items() {
			$message = isset( $_REQUEST['status'] ) && 'trash' == $_REQUEST['status'] ? __( 'No pages in trash', 'white-label-megapack-branding' ) : __( 'No pages yet', 'white-label-megapack-branding' ); ?>
			<p><?php echo $message; ?></p>
		<?php }
		/**
		 * Get a list of columns.
		 * @return array list of columns and titles
		 */
		function get_columns() {
			$columns = array(
				'cb'    		=> '<input type="checkbox" />',
				'page_title' 	=> __( 'Title', 'white-label-megapack-branding' ),
				'capability'	=> __( 'Capability', 'white-label-megapack-branding' ),
				'parent'		=> __( 'Parent', 'white-label-megapack-branding' ),
			);
			return $columns;
		}
		/**
		 * Get a list of sortable columns.
		 * @return array list of sortable columns
		 */
		function get_sortable_columns() {
			$sortable_columns = array(
				'page_title' 	=> array( 'page_title', false ),
				'capability'	=> array( 'capability', false ),
				'parent'		=> array( 'capability', false ),
			);
			return $sortable_columns;
		}
		/**
		 * Function to add action links to drop down menu before and after pages list
		 * @return array of actions
		 */
		function get_bulk_actions() {
			$actions = array();
			if ( isset( $_REQUEST['status'] ) ) {
				$actions['delete']  = __( 'Delete Permanently', 'white-label-megapack-branding' );
				$actions['restore'] = __( 'Restore', 'white-label-megapack-branding' );
			} else {
				$actions['trash'] = __( 'Trash', 'white-label-megapack-branding' );
			}
			return $actions;
		}
		/**
		 * Fires when the default column output is displayed for a single row.
		 * @param      string    $column_name      The custom column's name.
		 * @param      array     $item             The cuurrent letter data.
		 * @return    void
		 */
		function column_default( $item, $column_name ) {
			global $menu;
			switch ( $column_name ) {
				case 'parent':
					if ( ! empty( $item['parent_page'] ) ) {
						foreach ( $menu as $menu_slug ) { 
							if ( '' != $menu_slug[0] && $menu_slug[2] == $item['parent_page'] )
								return $menu_slug[0];
						}
						return $item['parent_page'];
					}
					return;
				case 'page_title':
					$page_title = empty( $item['page_title'] ) ? '<i>- ' . __( 'Empty title', 'white-label-megapack-branding' ) . ' -</i>' : '<strong><a href="' . wp_nonce_url( '?page=custom-admin-page.php&wlmpbam_tab_action=edit&wlmpbam_page_id=' . $list['id'], 'custom-admin-page-edit' . $list['id'] ) . '">' . $item['page_title'] . '</a></strong>';
					if ( isset( $_REQUEST['s'] ) && ( ! empty( $_REQUEST['s'] ) ) && '1' == $item['page_status'] ) {
						$page_title .=  ' - ' . __( 'in trash', 'white-label-megapack-branding' );
					}
					return $page_title;
				case 'capability':
					return $item[ $column_name ];
				default:
					return print_r( $item, true ) ;
			}
		}
		/**
		 * Function to add column of checboxes
		 * @param     array     $item        The cuurrent letter data.
		 * @return    string                  with html-structure of <input type=['checkbox']>
		 */
		function column_cb( $item ) {
			return sprintf( '<div class="wlmpb-div"><label class="wlmpb-switch"><input id="cb_%1s" type="checkbox" name="wlmpbam_page_id[]" value="%2s" /><span class="wlmpb-slider round"></span></label></div>', $item['id'], $item['id'] );
		}
		/**
		 * Function to add action links to title column depenting on status page
		 * @param    array     $item           The current letter data.
		 * @return   string                     with action links
		 */
		function column_page_title( $item ) {
			$status = isset( $_REQUEST['status'] ) ? '&status=' . sanitize_text_field($_REQUEST['status']) : '';
			$actions       = array();
			if ( ! isset( $_REQUEST['status'] ) ) {
				$actions['edit'] = '<a href="' . wp_nonce_url( '?page=custom-admin-page.php&wlmpbam_tab_action=edit&wlmpbam_page_id=' . $item['id'], 'custom-admin-page-edit' . $item['id'] ) . '">' . __( 'Edit', 'white-label-megapack-branding' ) . '</a>';
				$actions['trash'] = '<a class="submitdelete" href="' . wp_nonce_url( '?page=custom-admin-page.php&wlmpbam_tab_action=trash&wlmpbam_page_id=' . $item['id'], 'custom-admin-page-trash' . $item['id'] ) . '">' . __( 'Trash', 'white-label-megapack-branding' ) . '</a>';
			} else {
				$actions['delete'] = '<a class="submitdelete" href="' . wp_nonce_url( '?page=custom-admin-page.php&wlmpbam_tab_action=delete&wlmpbam_page_id=' . $item['id'] . $status, 'custom-admin-page-delete' . $item['id'] ) . '">' . __( 'Delete Permanently', 'white-label-megapack-branding' ) . '</a>';
				$actions['restore'] = '<a href="' . wp_nonce_url( '?page=custom-admin-page.php&wlmpbam_tab_action=restore&wlmpbam_page_id=' . $item['id'] . $status, 'custom-admin-page-restore' . $item['id'] ) . '">' . __( 'Restore', 'white-label-megapack-branding' ) . '</a>';
			}
			return sprintf( '%1$s %2$s', $item['page_title'], $this->row_actions( $actions ) );
		}
		
	

		
		/**
		* Function to add filters below and above letters list
		* @return array $status_links
		*/
		function get_views() {
			global $wpdb;
			$status_links  = array();
			$all_count     = $trash_count = 0;
			/* get count of pages by status */
			$filters_count = $wpdb->get_results (
				"SELECT COUNT(`id`) AS `all`,
					( SELECT COUNT(`id`) FROM `" . $wpdb->prefix . "wlmpbam_pages` WHERE `page_status`=1 ) AS `trash`
				FROM `" . $wpdb->prefix . "wlmpbam_pages` WHERE `page_status`=0;"
			);
			foreach ( $filters_count as $count ) {
				$all_count   = empty( $count->all ) ? 0 : $count->all;
				$trash_count = empty( $count->trash ) ? 0 : $count->trash;
			}
			/* get class for action links */
			$all_class = isset( $_REQUEST['status'] ) ? '' : 'class="current" ';
			$trash_class = isset( $_REQUEST['status'] ) && "trash" == $_REQUEST['status'] ? 'class="current" ': '';
			/* get array with action links */
			$status_links['all']   = '<a ' . $all_class . 'href="?page=custom-admin-page.php">' . __( 'All', 'white-label-megapack-branding' ) . '<span class="count"> ( ' . $all_count . ' )</span></a>';
			$status_links['trash'] = '<a ' . $trash_class . 'href="?page=custom-admin-page.php&status=trash">' . __( 'Trash', 'white-label-megapack-branding' ) . '<span class="count"> ( ' . $trash_count . ' )</span></a>';
			return $status_links;
		}

		/**
		 * Function to get pages list
		 * @return array list of letters
		 */
		function pages_list() {
			global $wpdb;

			$per_page = $this->get_items_per_page( 'wlmpbam_per_page', 20 );
			$paged = ( isset( $_REQUEST['paged'] ) && 1 < intval( $_REQUEST['paged'] ) ) ? $per_page * ( absint( intval( $_REQUEST['paged'] ) - 1 ) ) : 0;
			$order_by = ( isset( $_REQUEST['orderby'] ) && in_array( $_REQUEST['orderby'], array( 'page_title', 'capability', 'parent' ) ) ) ? $_REQUEST['orderby'] : 'page_title';
			$order = ( isset( $_REQUEST['order'] ) && 'DESC' == $_REQUEST['order'] ) ? $_REQUEST['order'] : 'ASC';
			
			$sql_query = "SELECT * FROM `" . $wpdb->prefix . "wlmpbam_pages` ";			
			if ( isset( $_REQUEST['s'] ) && ( ! empty( $_REQUEST['s'] ) ) )
				$sql_query .= "WHERE `page_title` LIKE '%" . sanitize_title( trim( $_REQUEST['s'] ) ) . "%'";
			elseif ( isset( $_REQUEST['status'] ) && 'trash' == $_REQUEST['status'] )
				$sql_query .= "WHERE `page_status`=1";
			else
				$sql_query .= "WHERE `page_status`=0";
			$sql_query .= " ORDER BY " . $order_by . " " . $order . " LIMIT " . $per_page . " OFFSET " . $paged . ";";

			$pages_list = $wpdb->get_results( $sql_query, ARRAY_A );

			return $pages_list;
		}

		/**
		 * Function to get number of pages lists
		 * @return sting pages lists number
		 */
		protected function items_count() {
			global $wpdb;
			$sql_query = "SELECT COUNT(`id`) FROM `" . $wpdb->prefix . "wlmpbam_pages`";
			if ( isset( $_REQUEST['s'] ) && ( ! empty( $_REQUEST['s'] ) ) )
				$sql_query .= "WHERE `page_title` LIKE '%" . sanitize_text_field( $_REQUEST['s'] ) . "%'";
			elseif ( isset( $_REQUEST['status'] ) && 'trash' == $_REQUEST['status'] )
				$sql_query .= "WHERE `page_status`=1;";
			else
				$sql_query .= "WHERE `page_status`=0;";
			$items_count = $wpdb->get_var( $sql_query );
			return $items_count;
		}
	}
} /* end of class definition */


/**
 * Add screen options and initialize instance of class Cstmdmnpg_Pages_List
 * @return void
 */
if ( ! function_exists( 'wlmpbam_screen_options' ) ) {
	function wlmpbam_screen_options() {
		global $wlmpbam_pages_list;
		$args = array(
			'label'   => __( 'Pages per page', 'white-label-megapack-branding' ),
			'default' => 20,
			'option'  => 'wlmpbam_per_page'
		);
		add_screen_option( 'per_page', $args );
		$wlmpbam_pages_list = new Cstmdmnpg_Pages_List();
	}
}

if ( ! function_exists( 'wlmpbam_help_tab' ) ) {
	function wlmpbam_help_tab() {
		$screen = get_current_screen();

		$args = array(
			'id'      => 'wlmpbacp',
			'section' => ''
		);
		wlmpbamw_help_tab( $screen, $args );

	}
}

if ( ! function_exists( 'wlmpbam_add_tabs' ) ) {
	function wlmpbam_add_tabs() {
		wlmpbam_help_tab();
		/* display screen options on 'Pages' page */
		wlmpbam_screen_options();
	}
}

/**
 *
 * @return    array      $action_message
 */
if ( ! function_exists( 'wlmpbam_handle_action' ) ) {
	function wlmpbam_handle_action() {
		$action_message = array(
			'done'  => '',
			'error' => '',
			'id'    => '',
		);
		/* Get necessary action */
		/* action links */
		$tab_action = isset( $_REQUEST['wlmpbam_tab_action'] ) && ( ! in_array( $_REQUEST['wlmpbam_tab_action'], array( 'new', 'edit' ) ) ) ? $_REQUEST['wlmpbam_tab_action'] : false;
		/* bulk actions */
		$action = isset( $_POST['action'] ) && in_array( $_POST['action'], array( 'trash', 'delete', 'restore' ) ) ? $_POST['action'] : false;
		if ( ! $action )
			$action = isset( $_POST['action2'] ) && in_array( $_POST['action2'], array( 'trash', 'delete', 'restore' ) ) ? $_POST['action2'] : false;

		$page_id      = empty( $_REQUEST['wlmpbam_page_id'] ) ? 0 : sanitize_text_field($_REQUEST['wlmpbam_page_id']);
		if ( ! $action )
			$action = $tab_action;
		if ( $action && in_array( $action, array( 'trash', 'restore', 'delete' ) ) && ! is_array( $page_id ) ) {
			$nonce_action    = 'custom-admin-page-' . $action . $page_id;
			$nonce_query_arg = '_wpnonce';
		} else {
			$nonce_action    = 'custom-admin-page/pages.php';
			$nonce_query_arg = 'wlmpbam_nonce_name';
		}
		if ( $action && check_admin_referer( $nonce_action, $nonce_query_arg ) ) {
			global $wpdb;
			$list_messages = array(
				'error'    => __( 'Some errors occurred', 'white-label-megapack-branding' ),
				'add'      => __( 'Page data saved. Refresh the page to see changes.', 'white-label-megapack-branding' ),
				'update'   => __( 'Page updated. Refresh the page to see changes.', 'white-label-megapack-branding' ),
				'trash'    => __( 'Selected pages were moved to the trash', 'white-label-megapack-branding' ),
				'restore'  => __( 'Selected pages were restored from the trash', 'white-label-megapack-branding' ),
				'delete'   => __( 'Selected pages were deleted', 'white-label-megapack-branding' ),
				'empty_id' => __( 'No pages was selected', 'white-label-megapack-branding' )
			);		

			if ( 0 === $page_id && 'add' != $action ) {
				$action_message['error'] = $list_messages['empty_id'];
			} else {
				if ( 'add' == $action || 'update' == $action ) {
					$page_title   = ! empty( $_REQUEST['wlmpbam_page_title'] ) ? sanitize_text_field( $_REQUEST['wlmpbam_page_title'] ) : '';
					$page_content = ! empty( $_REQUEST['wlmpbam_content'] ) ? sanitize_text_field( $_REQUEST['wlmpbam_content'] ) : '';
					if ( ! get_magic_quotes_gpc() ) {
						$page_title  = addslashes( $page_title );
						$page_content = addslashes( $page_content );
					}
					$page_slug 		= ! empty( $_REQUEST['wlmpbam_page_slug'] ) ? sanitize_title( $_REQUEST['wlmpbam_page_slug'] ) : '';
					if ( empty( $page_slug ) && ! empty( $page_title ) )
						$page_slug = sanitize_title( $page_title );

					$page_parent	= ! empty( $_REQUEST['wlmpbam_parent'] ) ? sanitize_text_field( $_REQUEST['wlmpbam_parent'] ) : NULL;
					$icon 			= ! empty( $_REQUEST['wlmpbam_icon'] ) ? sanitize_text_field( $_REQUEST['wlmpbam_icon'] ) : '';
					$capability 	= ! empty( $_REQUEST['wlmpbam_capability'] ) ? intval( $_REQUEST['wlmpbam_capability'] ) : 0;
					$position		= ! empty( $_REQUEST['wlmpbam_position'] ) ? intval( $_REQUEST['wlmpbam_position'] ) : NULL;
				}

				/* for bulk actions */
				if ( is_array( $page_id ) ) {
					$page_id = implode( ',', $page_id );
					$value = " IN (" . $page_id . ")";
				} else {
					$value = "=" . $page_id;
				}
				switch ( $action ) {
					case 'add':	
						
						if ( ! empty( $page_slug ) ) {
							$wpdb->insert(
								$wpdb->prefix . 'wlmpbam_pages',
								array(
									'page_title'   => $page_title,
									'page_content' => $page_content,
									'page_status'  => 0,
									'page_slug' 	=> $page_slug,
									'capability' 	=> $capability,
									'position' 		=> $position,
									'parent_page' 	=> $page_parent,
									'icon' 			=> $icon,
								)
							);
							$page_id = $wpdb->last_error ? 0 : $wpdb->insert_id;

						} else {
							$wpdb->insert(
								$wpdb->prefix . 'wlmpbam_pages',
								array(
									'page_title'   => $page_title,
									'page_status'  => 0,
									'page_content' => $page_content,
									'capability' 	=> $capability,
									'position' 		=> $position,
									'parent_page' 	=> $page_parent,
									'icon' 			=> $icon,
								)
							);
							$page_id = $wpdb->last_error ? 0 : $wpdb->insert_id;

							$page_slug = 'wlmpbacp-page-' . $page_id;
							$wpdb->update(
								$wpdb->prefix . 'wlmpbam_pages',
								array(
									'page_slug' => $page_slug,
								),
								array( 'id' => $page_id )
							);
						}
						break;
					case 'update':

						if ( empty( $page_slug ) )
							$page_slug = 'wlmpbacp-page-' . $page_id;

						$wpdb->update(
							$wpdb->prefix . 'wlmpbam_pages',
							array(
								'page_title'   	=> $page_title,
								'page_content' 	=> $page_content,
								'page_slug' 	=> $page_slug,
								'capability' 	=> $capability,
								'position' 		=> $position,
								'parent_page' 	=> $page_parent,
								'icon' 		=> $icon,
							),
							array( 'id' => $page_id )
						);
						break;
					case 'trash':
					case 'restore':
						if ( 'trash' == $action ) {
							$old_status = 0;
							$new_status = 1;
						} else {
							$old_status = 1;
							$new_status = 0;
						}
						$result = $wpdb->query( "UPDATE `" . $wpdb->prefix . "wlmpbam_pages` SET `page_status`=replace(page_status, " . $old_status . ", " . $new_status . ") WHERE `id`" . $value );
						break;
					case 'delete':
						global $wlmpbam_options;
						$result = $wpdb->query( "DELETE FROM `" . $wpdb->prefix . "wlmpbam_pages` WHERE `id`" . $value );
						$ids = is_array( $_REQUEST['wlmpbam_page_id'] ) ? sanitize_text_field($_REQUEST['wlmpbam_page_id']) : array( $_REQUEST['wlmpbam_page_id'] );
						if ( isset( $wlmpbam_options['page_for_pdf'] ) && in_array( $wlmpbam_options['page_for_pdf'], $ids ) )
							$wlmpbam_options['page_for_pdf'] = 0;
						if ( isset( $wlmpbam_options['page_for_print'] ) && in_array( $wlmpbam_options['page_for_print'], $ids ) )
							$wlmpbam_options['page_for_print'] = 0;
						update_option( 'wlmpbam_options', $wlmpbam_options );
						break;
					case 'edit':
					case 'new':
					default:
						break;
				}
			}
			if ( $wpdb->last_error ) {
				$action_message['error'] = $list_messages['error'];
			} else {
				$action_message['done']  = $list_messages[ $action ];
				$action_message['id']    = $page_id;
			}
		}
		return $action_message;
	}
}

/**
 * Display pages list
 * @return void
 */
if ( ! function_exists( 'wlmpbam_display_pages' ) ) {
	function wlmpbam_display_pages() {
		global $wpdb, $wlmpbam_pages_list, $menu, $submenu, $_registered_pages;
		$action_message = wlmpbam_handle_action();
		$error   = isset( $action_message['error'] ) && ( ! empty( $action_message['error'] ) ) ? $action_message['error'] : '';
		$message = isset( $action_message['done'] ) && ( ! empty( $action_message['done'] ) ) ? $action_message['done'] : '';

		$display_empty_page = false; ?>
		<div class="updated fade below-h2"<?php if ( empty( $message ) ) echo " style=\"display:none\""; ?>><p><strong><?php echo $message; ?></strong></p></div>
		<div class="error below-h2"<?php if ( empty( $error ) ) echo " style=\"display:none\""; ?>><p><strong><?php echo $error; ?></strong></p></div>
		<form id="wlmpbam_page_form" method="post">
			<?php if ( isset( $_REQUEST['wlmpbam_tab_action'] ) && in_array( $_REQUEST['wlmpbam_tab_action'], array( 'new', 'add', 'update', 'edit' ) ) ) {
				switch ( $_REQUEST['wlmpbam_tab_action'] ) {
					case 'add': /* display content of new page after inserting in database */
					case 'update': /* display content of new page after updating */
						check_admin_referer( 'custom-admin-page/pages.php', 'wlmpbam_nonce_name' );
						$title 			= __( 'Edit page', 'white-label-megapack-branding' );
						$button_title 	= __( 'Update page', 'white-label-megapack-branding' );
						$tab_action 	= 'update';
						$page_id 		= $action_message['id'];
						$page_title 	= ! empty( $_REQUEST['wlmpbam_page_title'] ) ? sanitize_title( $_REQUEST['wlmpbam_page_title'] ) : '';
						$page_slug 		= ! empty( $_REQUEST['wlmpbam_page_slug'] ) ? sanitize_title( $_REQUEST['wlmpbam_page_slug'] ) : '';
						$page_content	= ! empty( $_REQUEST['wlmpbam_content'] ) ? sanitize_text_field( $_REQUEST['wlmpbam_content'] ) : '';
						$page_parent	= ! empty( $_REQUEST['wlmpbam_parent'] ) ? sanitize_text_field( $_REQUEST['wlmpbam_parent'] ) : NULL;
						$icon 			= ! empty( $_REQUEST['wlmpbam_icon'] ) ? sanitize_text_field( $_REQUEST['wlmpbam_icon'] ) : '';
						$capability 	= ! empty( $_REQUEST['wlmpbam_capability'] ) ? intval( $_REQUEST['wlmpbam_capability'] ) : 0;
						$position		= ! empty( $_REQUEST['wlmpbam_position'] ) ? intval( $_REQUEST['wlmpbam_position'] ) : NULL;

						if ( empty( $page_slug ) )
							$page_slug = ! empty( $page_title ) ? sanitize_title( $page_title ) : 'wlmpbacp-page-' . $page_id;

						break;
					case 'edit': /* display content of page if we go from 'pages list'-page */
						$page_id = ( ! isset( $_REQUEST['wlmpbam_page_id'] ) ) || empty( $_REQUEST['wlmpbam_page_id'] ) ? 0 : sanitize_text_field($_REQUEST['wlmpbam_page_id']);
						check_admin_referer( 'custom-admin-page-edit' . $page_id );
						if ( empty( $page_id ) || 0 === $page_id ) {
							$display_empty_page = true;
						} else {
							$page_data = $wpdb->get_row( 'SELECT * FROM `' . $wpdb->prefix . 'wlmpbam_pages` WHERE `id`=' . $page_id, ARRAY_A );
							if ( ! empty( $page_data ) ) {
								$page_title 	= $page_data['page_title'];
								$page_content	= $page_data['page_content'];
								$page_slug		= $page_data['page_slug'];
								$icon 		= $page_data['icon'];
								$page_parent 	= $page_data['parent_page'];
								$capability 	= $page_data['capability'];
								$position 		= $page_data['position'];
								$title 			= __( 'Edit page', 'white-label-megapack-branding' );
								$button_title	= __( 'Update page', 'white-label-megapack-branding' );
								$tab_action 	= 'update';
							} else {
								$display_empty_page = true;
							}
						}
						break;
					case 'new': /* display empty form */
						check_admin_referer( 'custom-admin-page-new' );
						$display_empty_page = true;
						break;
					default: /* display empty form */
						check_admin_referer( plugin_basename( __FILE__ ), 'wlmpbam_nonce_name' );
						$display_empty_page = true;
						break;
				}
				if ( $display_empty_page ) {
					$title          = __( 'Add New page', 'white-label-megapack-branding' );
					$button_title   = __( 'Save page', 'white-label-megapack-branding' );
					$tab_action     = 'add';
					$page_id 		= 0;
					$page_title = $page_content = $icon = $position = '';
				} ?>
				<h2><?php echo $title; ?></h2>
				<div id="titlediv">
					<div id="titlewrap">
						<input type="text" name="wlmpbam_page_title" size="30" value="<?php echo $page_title; ?>" id="title" placeholder="<?php _e( 'Enter Page Title', 'white-label-megapack-branding' ); ?>" />
					</div>
					<?php if ( ! empty( $page_slug ) ) {
						$url = ( ( ! empty( $page_parent ) && in_array( preg_replace( "/(\?.*)$/", "", $page_parent ), array( 'index.php', 'edit.php', 'upload.php', 'link-manager.php', 'edit-comments.php', 'themes.php', 'plugins.php', 'users.php', 'tools.php', 'options-general.php' ) ) ) ? $page_parent : 'admin.php' ) . ( ( stripos( $page_parent, '?' ) ) ? '&' : '?' )  . 'page='; ?>
						<div class="inside">
							<div id="edit-slug-box" class="hide-if-no-js">
								<strong><?php _e( 'Permalink', 'white-label-megapack-branding' ); ?>:</strong>
								<span id="sample-permalink"><a href="<?php echo self_admin_url( $url . $page_slug ); ?>"><?php echo self_admin_url( $url ); ?><span id="editable-post-name"><?php echo $page_slug; ?></span></a></span>
								‎<span id="edit-slug-buttons"><button type="button" class="edit-slug button button-small hide-if-no-js" aria-label="<?php _e( 'Edit permalink', 'white-label-megapack-branding' ); ?>"><?php _e( 'Edit', 'white-label-megapack-branding' ); ?></button></span>
								<span id="editable-post-name-full"><?php echo $page_slug; ?></span>
							</div>
						</div>
						<label class="screen-reader-text" for="post_name"><?php _e( 'Slug', 'white-label-megapack-branding' ) ?></label>
						<input name="wlmpbam_page_slug" type="hidden" id="post_name" value="<?php echo esc_attr( $page_slug ); ?>" />
					<?php } ?>					
				</div><!-- /titlediv -->
				<h3><span><?php _e( 'Content', 'white-label-megapack-branding' ); ?></span></h3>
				<div class="postarea wp-editor-expand">
					<?php if ( function_exists( 'wp_editor' ) ) {
						$settings  = array(
								'wpautop'       => 1,
								'media_buttons' => 1,
								'textarea_name' => 'wlmpbam_content',
								'textarea_rows' => 5,
								'tabindex'      => null,
							    'editor_height' => 800,
								'editor_css'    => '<style>.mce-content-body { width: 100%; max-width: 100%; background: red;}</style>',
								'editor_class'  => 'wlmpbam_content',
								'teeny'         => 0,
								'dfw'           => 0,
								'tinymce'       => 1,
								'quicktags'     => 1
							);
						wp_editor( wp_unslash( $page_content ), 'wlmpbam_content', $settings );
					} else { ?>
						<textarea class="wlmpbam_content_area" rows="5" autocomplete="off" cols="40" name="wlmpbam_content" id="wlmpbam_content"><?php echo wp_unslash( $page_content ); ?></textarea>
					<?php }?>
				</div>
				<h3><span><?php _e( 'Page Attributes', 'white-label-megapack-branding' ); ?></span></h3>
				<div class="postbox">						
					<div class="inside">						
						<div>
							<strong><?php _e( 'Capability level', 'white-label-megapack-branding' ); ?> *</strong>
						</div>
						<select name="wlmpbam_capability">
							<?php for ( $i=0; $i<=10; $i++ ) { ?>
								<option value="<?php echo $i; ?>" <?php if ( isset( $capability ) && $capability == $i ) echo 'selected '; ?>><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<hr/>
						<div><strong><?php _e( 'Parent', 'white-label-megapack-branding' ); ?></strong></div>
						<select name="wlmpbam_parent">
							<option value="">(<?php _e( 'no parent', 'white-label-megapack-branding' ); ?>)</option>
							<?php foreach ( $menu as $menu_slug ) { 
								if ( '' != $menu_slug[0] ) { ?>
									<option value="<?php echo $menu_slug[2]; ?>" <?php if ( ! empty( $page_parent ) && $menu_slug[2] == $page_parent ) echo 'selected';?>><?php echo $menu_slug[0]; ?></option>
								<?php }
							} ?>
						</select>
						<div class="wlmpbam_icon">
							<hr/>
							<div>															
								<strong><?php _e( 'Icon', 'white-label-megapack-branding' ); ?></strong>
								
							</div>
							<input class="wlmpbacp-image-url" type="text" name="wlmpbam_icon" value="<?php echo $icon; ?>" />
						</div>
					</div>
				</div>
				<p>
					<input name="wlmpbam_page_submit" type="submit" class="button-primary" value="<?php echo $button_title; ?>" />
					<input type="hidden" name="wlmpbam_tab_action" value="<?php echo $tab_action; ?>" />
					<input type="hidden" name="wlmpbam_page_id" value="<?php echo $page_id; ?>" />
				</p>
			<?php } else {
				if ( isset( $_REQUEST['s'] ) && ( ! empty( $_REQUEST['s'] ) ) ) {
					echo '<div class="subtitle">' . sprintf( __( 'Search results for &#8220;%s&#8221;', 'white-label-megapack-branding' ), wp_html_excerpt( esc_html( wp_unslash( $_REQUEST['s'] ) ), 50, '&hellip;' ) ) . '</div>';
				}
				echo '<h2 class="screen-reader-text">' . __( 'Filter pages list', 'white-label-megapack-branding' ) . '</h2>';
				$wlmpbam_pages_list->views();
				$wlmpbam_pages_list->prepare_items();
				$wlmpbam_pages_list->current_action();
				$wlmpbam_pages_list->display();
			    
			?>
			<?php }
			wp_nonce_field( 'custom-admin-page/pages.php', 'wlmpbam_nonce_name' ); ?>
		</form>
	<?php }
}

/**
 * Save screen option for pages list
 */
if ( ! function_exists( 'wlmpbam_set_screen_option' ) ) {
	function wlmpbam_set_screen_option( $status, $option, $value ) {
		return $value;
	}
}

add_filter( 'set-screen-option', 'wlmpbam_set_screen_option', 10, 3 );