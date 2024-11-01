<?php


/**
 * Add separate section for add menu from plugin in admin area
 */
if ( ! function_exists( 'wlmpbam_add_pages' ) ) {
	function wlmpbam_add_pages() {
		global $wpdb;
		$settings = add_submenu_page( 'white-label-megapack-branding', __( 'Custom Admin Page Settings', 'white-label-megapack-branding' ), 'Custom Admin Page', 'administrator', 'custom-admin-page.php', 'wlmpbam_settings_page' );

		if ( ! function_exists( 'wlmpbam_screen_options' ) )
			require_once( dirname( __FILE__ ) . '/include/pages.php' );

		add_action( 'load-' . $settings, 'wlmpbam_add_tabs' );

		$pages = $wpdb->get_results( "SELECT * FROM `" . $wpdb->prefix . "wlmpbam_pages` WHERE `page_status`=0", ARRAY_A );
		foreach ( $pages as $page ) {
			if ( ! empty( $page['parent_page'] ) ) {
			
				add_submenu_page( $page['parent_page'], $page['page_title'], $page['page_title'], $page['capability'], $page['page_slug'], 'wlmpbam_page_content' );
			} else {
				add_menu_page( $page['page_title'], $page['page_title'], $page['capability'], $page['page_slug'], 'wlmpbam_page_content', $page['icon'], $page['position'] );
			}
		}
	}
}



/**
 * Init plugin
 */
if ( ! function_exists ( 'wlmpbam_init' ) ) {
	function wlmpbam_init() {
		global $wlmpbam_plugin_info;

		require_once( dirname( __FILE__ ) . '/include/wlmpbam_include.php' );
		wlmpbamw_include_init( plugin_basename( __FILE__ ) );

		if ( empty( $wlmpbam_plugin_info ) ) {
			if ( ! function_exists( 'get_plugin_data' ) )
				require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			$wlmpbam_plugin_info = get_plugin_data( dirname(__FILE__) . '/custom-admin-page.php' );
		}


		/* Get/Register and check settings for plugin */
		if ( isset( $_GET['page'] ) && 'custom-admin-page.php' == $_GET['page'] )
			wlmpbam_settings();
	}
}

/**
 *
 */


/**
* Performed at activation.
* @return void
*/
if ( ! function_exists( 'wlmpbam_create_table' ) ) {
	function wlmpbam_create_table() {
		global $wpdb;

		if ( $wpdb->query( "SHOW TABLES LIKE '{$wpdb->prefix}wlmpbam_pages'" ) )
			return false;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$sql_query =
			"CREATE TABLE `{$wpdb->prefix}wlmpbam_pages` (
			`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
			`page_title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
			`page_slug` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,			
			`page_content` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
			`capability` VARCHAR( 255 ) NOT NULL DEFAULT '0',
			`parent_page` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
			`icon` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
			`position` TINYINT DEFAULT NULL,	
			`page_status` INT( 1 ) NOT NULL DEFAULT '0',
			PRIMARY KEY ( `id` )
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		dbDelta( $sql_query );
	}
}

/**
 * Register settings for plugin
 *
 */
if ( ! function_exists( 'wlmpbam_settings' ) ) {
	function wlmpbam_settings() {
		global $wlmpbam_options, $wlmpbam_plugin_info, $wpdb;
		$db_version = '1.1';

		$wlmpbam_options_defaults = array(
			'plugin_option_version'		=> $wlmpbam_plugin_info["Version"],
			'suggest_feature_banner'	=> 1
		);

		/* install the option defaults */
		if ( ! get_option( 'wlmpbam_options' ) ) {
			add_option( 'wlmpbam_options', $wlmpbam_options_defaults );
		}
		$wlmpbam_options = get_option( 'wlmpbam_options' );

		if ( ! isset( $wlmpbam_options['plugin_option_version'] ) || $wlmpbam_options['plugin_option_version'] != $wlmpbam_plugin_info["Version"] ) {
			/**
			 * @deprecated
			 * @since 0.1.6
			 * @todo remove after 27.01.2019
			 */
			$wpdb->query( "ALTER TABLE `{$wpdb->prefix}wlmpbam_pages` MODIFY icon TEXT" );
			/* @todo end */
			$wlmpbam_options = array_merge( $wlmpbam_options_defaults, $wlmpbam_options );
			$update_option = true;
		}

		if ( ! isset( $wlmpbam_options['plugin_db_version'] ) || ( isset( $wlmpbam_options['plugin_db_version'] ) && $wlmpbam_options['plugin_db_version'] != $db_version ) ) {
			wlmpbam_create_table();
			$wlmpbam_options['plugin_db_version'] = $db_version;
			$update_option = true;
		}

		if ( isset( $update_option ) ) {
			update_option( 'wlmpbam_options', $wlmpbam_options );
		}
	}
}

/**
 * Add admin page
 */
if ( ! function_exists ( 'wlmpbam_settings_page' ) ) {
	function wlmpbam_settings_page () {
		global $wlmpbam_plugin_info;  ?>
<div class="wrap wlmpb-settings-wrapper">
<div class="wlmpb-header">
						<img clas="wlmpb-logo" src="<?php echo plugins_url( 'assets/white-label-megapack-branding-Logo.png', __FILE__ ); ?>" alt="White Label Megapack Branding" height="130" width="250" />
						<h1><?php _e( 'White Label MegaPack Branding', 'white-label-megapack-branding' ); ?></h1>
        </div>
        </div>
<div class="wlmpb-dynamic-item">
                        <div class="wlmpb-item-name">
	<h2>Custom Admin Page <a href="<?php echo wp_nonce_url( '?page=custom-admin-page.php&wlmpbam_tab_action=new', 'custom-admin-page-new' ); ?>" class="add-new-h2 wlmpbam_add_new_button"><?php _e( 'Add New Page', 'white-label-megapack-branding' ); ?></a></h2></strong>
			<?php if ( ! function_exists( 'wlmpbam_display_pages' ) )
				require_once( dirname( __FILE__ ) . '/pages.php' );

			wlmpbam_display_pages();
			wlmpbamw_plugin_instructions_block( $wlmpbam_plugin_info['Name'], 'white-label-megapack-branding' ); ?>
		</div></div>
	<?php }
}

if ( ! function_exists ( 'wlmpbam_page_content' ) ) {
	function wlmpbam_page_content () {
		global $wpdb;
		if ( isset( $_REQUEST['page'] ) ) {
			$page_content = $wpdb->get_var( $wpdb->prepare( "SELECT `page_content` FROM `" . $wpdb->prefix . "wlmpbam_pages` WHERE `page_status` = 0 AND `page_slug` = %s", sanitize_text_field($_REQUEST['page'] )) );
			if ( ! empty( $page_content ) ) { ?>
				<div class="wrap">
					<?php echo apply_filters( 'the_content', wp_unslash( $page_content ) ); ?>
				</div>
			<?php }
		}
	}
}

/* Add stylesheets */
if ( ! function_exists ( 'wlmpbam_admin_head' ) ) {
	function wlmpbam_admin_head() {
		if ( isset( $_GET['page'] ) && 'custom-admin-page.php' == $_GET['page'] ) {

			wp_enqueue_script( 'wlmpbacp-script', plugins_url( 'js/script.js', __FILE__ ), array( 'jquery' ) );

			$script_vars = array(
				'chooseFile'		=> __( 'Choose file', 'white-label-megapack-branding' ),
				'notSelected'		=> __( 'No file chosen', 'white-label-megapack-branding' ),
				'addImageLabel'		=> __( 'Add image', 'white-label-megapack-branding' ),
				'changeImageLabel'	=> __( 'Change image', 'white-label-megapack-branding' ),
				'errorInsertImage'	=> __( 'Warning: You can add an image only', 'white-label-megapack-branding' ),
				'ok' 				=> __( 'OK', 'white-label-megapack-branding' ),
				'cancel' 			=> __( 'Cancel', 'white-label-megapack-branding' ),
				'permalinkSaved' 	=> __( 'Permalink saved', 'white-label-megapack-branding' ),
				'ajax_nonce'    	=> wp_create_nonce( 'wlmpbam_ajax_nonce' )
			);
			wp_localize_script( 'wlmpbacp-script', 'wlmpbacpScriptVars', $script_vars );
		}
	}
}

/**
 * Ajax handler to retrieve a sample permalink.
 */
if ( ! function_exists( 'wp_ajax_wlmpbam_sample_permalink' ) ) {
	function wp_ajax_wlmpbam_sample_permalink() {
		check_ajax_referer( 'wlmpbam_ajax_nonce', 'nonce' );
		$title = isset( $_POST['new_title'] )? sanitize_text_field($_POST['new_title'] ) : '';
		$slug = isset( $_POST['new_slug'] )? sanitize_title( $_POST['new_slug'] ) : '';
		$page_id = isset( $_POST['page_id'] )? sanitize_title( $_POST['page_id'] ) : 0;
		$page_parent = isset( $_POST['parent_slug'] )? sanitize_title( $_POST['parent_slug'] ) : 0;

		if ( empty( $slug ) )
			$slug = ! empty( $title ) ? sanitize_title( $title ) : 'wlmpbacp-page-' . $page_id; 

		$url = ( ( ! empty( $page_parent ) && in_array( preg_replace( "/(\?.*)$/", "", $page_parent ), array( 'index.php', 'edit.php', 'upload.php', 'link-manager.php', 'edit-comments.php', 'themes.php', 'plugins.php', 'users.php', 'tools.php', 'options-general.php' ) ) ) ? $page_parent : 'admin.php' ) . ( ( stripos( $page_parent, '?' ) ) ? '&' : '?' )  . 'page=';
		?>
		<strong><?php _e( 'Permalink', 'white-label-megapack-branding' ); ?>:</strong>
		<span id="sample-permalink"><?php echo self_admin_url( $url ); ?><span id="editable-post-name"><?php echo $slug; ?></span></span>
		‎<span id="edit-slug-buttons"><button type="button" class="edit-slug button button-small hide-if-no-js" aria-label="<?php _e( 'Edit permalink', 'white-label-megapack-branding' ); ?>"><?php _e( 'Edit', 'white-label-megapack-branding' ); ?></button></span>
		<span id="editable-post-name-full"><?php echo $slug; ?></span>
		<?php die();
	}
}




/* Initialization plugin*/
add_action( 'init', 'wlmpbam_init' );
add_action( 'admin_menu', 'wlmpbam_add_pages',17 );
add_action( 'admin_enqueue_scripts', 'wlmpbam_admin_head' );
