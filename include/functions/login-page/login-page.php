<?php
// Customize login logo styling
function wlmpb_login_logo() {
$wlmpb_login_logo = get_option('wlmpb_login_logo');
    if (!empty($wlmpb_login_logo)) { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_option('wlmpb_login_logo') ?>);
            background-size: contain!important;
            background-repeat: no-repeat;
            padding-bottom: 5px;
            width: <?php echo get_option('wlmpb_logo_width') ?>!important;
            height: <?php echo get_option('wlmpb_logo_height') ?>!important;
            max-width: 320px!important;
        }
        .login h1 a {
            background-size: contain!important;
            background-repeat: no-repeat;
            width: <?php echo get_option('wlmpb_logo_width') ?>!important;
            height: <?php echo get_option('wlmpb_logo_height') ?>!important;
            max-width: 320px!important;
        }
    </style>
    <?php } else {}
}
add_action( 'login_enqueue_scripts', 'wlmpb_login_logo' );


// Customize login background styling
function wlmpb_login_footer() { ?>
    <style type="text/css" media="screen">
        <?php
        $wlmpb_login_background_color = get_option('wlmpb_login_background_color');
        $wlmpb_login_background_image = get_option('wlmpb_login_background_image');
        if (!empty($wlmpb_login_background_color) || !empty($wlmpb_login_background_image)) { ?>
            body {
                <?php if (!empty($wlmpb_login_background_color)) { ?> background: <?php echo get_option('wlmpb_login_background_color') ?>!important; <?php } ?>
                <?php if (!empty($wlmpb_login_background_image)) { ?> background-image: url(<?php echo get_option('wlmpb_login_background_image') ?>)!important; <?php } ?>
                <?php if (!empty($wlmpb_login_background_image)) { ?> background-size: cover!important; <?php } ?>
                <?php if (!empty($wlmpb_login_background_image)) { ?> background-repeat: repeat; <?php } ?>
            }
        <?php }
        $wlmpb_dashboard_accent = get_option('wlmpb_dashboard_accent');
        if ( !empty($wlmpb_dashboard_accent) ) { ?>
        input[type=text]:focus,
        input[type=search]:focus,
        input[type=radio]:focus,
        input[type=tel]:focus,
        input[type=time]:focus,
        input[type=url]:focus,
        input[type=week]:focus,
        input[type=password]:focus,
        input[type=checkbox]:focus,
        input[type=color]:focus,
        input[type=date]:focus,
        input[type=datetime]:focus,
        input[type=datetime-local]:focus,
        input[type=email]:focus,
        input[type=month]:focus,
        input[type=number]:focus,
        select:focus,
        textarea:focus {
            border-color: <?php echo get_option('wlmpb_dashboard_accent') ?> !important;
            box-shadow: 0 0 2px <?php echo get_option('wlmpb_dashboard_accent') ?> !important;
        }
        .wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
            background: <?php echo get_option('wlmpb_dashboard_accent') ?> !important;
            border-color: <?php echo get_option('wlmpb_dashboard_accent') ?> !important;
            box-shadow: 0 1px 0 <?php echo get_option('wlmpb_dashboard_accent') ?> !important;
            text-shadow: none!important;
        }
		
		<?php }
        $wlmpb_login_hide_rememberme_checkbox = get_option('wlmpb_login_hide_rememberme_checkbox');
        if ( !empty($wlmpb_login_hide_rememberme_checkbox) ) { ?>
        .forgetmenot { 
			display:none!important; }
        }
		
        <?php }
        $wlmpb_login_hide_password = get_option('wlmpb_login_hide_password_link');
        if ( !empty($wlmpb_login_hide_password) ) { ?>
        .login #nav {
            display: none!important;
        }
        <?php }
        $wlmpb_login_hide_main_link = get_option('wlmpb_login_hide_main_site_link');
        if ( !empty($wlmpb_login_hide_main_link) ) { ?>
        .login #backtoblog a {
            display: none!important;
        }
        <?php }
        $wlmpb_login_body_text_color = get_option('wlmpb_login_body_text_color');
        if ( !empty($wlmpb_login_body_text_color) ) { ?>
        #nav a, #backtoblog a, .privacy-policy-link {
            color: <?php echo get_option('wlmpb_login_body_text_color') ?>!important;
        }
        .wlmpb-login-custom-content {
            color: <?php echo get_option('wlmpb_login_body_text_color') ?>!important;
            padding-top: 40px!important;
            width: 320px!important;
            margin: 0 auto!important;
            display: block!important;
        }
        .wlmpb-login-custom-content a {
            color: <?php echo get_option('wlmpb_login_body_text_color') ?>!important;
        }
        <?php }
        $wlmpb_login_overlay_color = get_option('wlmpb_login_overlay_color');
        if (!empty($wlmpb_login_overlay_color)) { ?>
        body:before {
            content: " ";
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: -1;
            top: 0;
            left: 0;
            background: <?php echo get_option('wlmpb_login_overlay_color') ?>;
            opacity: <?php echo get_option('wlmpb_login_overlay_opacity') ?>;
        }
        <?php }
        $wlmpb_logo_padding_bottom = get_option('wlmpb_logo_padding_bottom');
        if ( !empty($wlmpb_logo_padding_bottom) ) { ?>
        body.login div#login h1 a {
            padding-bottom: <?php echo get_option('wlmpb_logo_padding_bottom') ?> !important;
        }
        <?php } ?>
  	</style>
<?php
}
add_action('login_footer', 'wlmpb_login_footer');


// Customize login logo url
function wlmpb_login_logo_url() {
$wlmpb_login_logo_url = get_option('wlmpb_login_logo_url');
    if (!empty($wlmpb_login_logo_url)) {
        return "$wlmpb_login_logo_url";
    } else {
        return home_url();
    }
}
add_filter( 'login_headerurl', 'wlmpb_login_logo_url' );


// Customize login logo title
function wlmpb_login_logo_url_title() {
$wlmpb_login_logo_title = get_option('wlmpb_login_logo_title');
    if (!empty($wlmpb_login_logo_title)) {
        return "$wlmpb_login_logo_title";
    } else {
        return 'powered by WLMP Branding Dash';
    }
}
add_filter( 'login_headertext', 'wlmpb_login_logo_url_title' );

// Preview Login Page function
add_filter( 'template_include', 'wlmpb_login_page_template', 99 );
function wlmpb_login_page_template( $template ) {
    if(isset($_GET['wlmpb-preview-login-page']) && current_user_can('read')) {
        return( 'wp-login.php' );
    }
    return $template;
}


// Add custom text to login page footer
function wlmpb_custom_login_content_footer() {
$wlmpb_login_footer_content_enabled = get_option('wlmpb_login_custom_content');
    if (!empty($wlmpb_login_footer_content_enabled)) { ?>
        <div class="wlmpb-login-custom-content">
        <?php echo get_option('wlmpb_login_custom_content') ?>
        </div>
    <?php }
}
add_action('login_footer','wlmpb_custom_login_content_footer');

// Rename login page slug wp-admin in setting/permalink

if ( defined( 'ABSPATH' ) && ! class_exists( 'Wlmpb_Rename_Login' ) ) {
	
	$wlmpb_login_rename_wpadmin = get_option('wlmpb_login_rename_wpadmin');
        if ( !empty($wlmpb_login_rename_wpadmin) ) {

	class Wlmpb_Rename_Login {
		private $wp_login_php;

		private function basename() {
			return plugin_basename( __FILE__ );
		}

		private function path() {
			return trailingslashit( dirname( __FILE__ ) );
		}

		private function use_trailing_slashes() {
			return '/' === substr( get_option( 'permalink_structure' ), -1, 1 );
		}

		private function user_trailingslashit( $string ) {
			return $this->use_trailing_slashes() ? trailingslashit( $string ) : untrailingslashit( $string );
		}

		private function wp_template_loader() {
			global $pagenow;

			$pagenow = 'index.php';

			if ( ! defined( 'WP_USE_THEMES' ) ) {
				define( 'WP_USE_THEMES', true );
			}

			wp();

			if ( $_SERVER['REQUEST_URI'] === $this->user_trailingslashit( str_repeat( '-/', 10 ) ) ) {
				$_SERVER['REQUEST_URI'] = $this->user_trailingslashit( '/wp-login-php/' );
			}

			require_once( ABSPATH . WPINC . '/template-loader.php' );

			die;
		}

		private function new_login_slug() {
			if (
				( $slug = get_option( 'wlmpb_page' ) ) || (
					is_multisite() &&
					is_plugin_active_for_network( $this->basename() ) &&
					( $slug = get_site_option( 'wlmpb_page', 'login' ) )
				) ||
				( $slug = 'login' )
			) {
				return $slug;
			}
		}

		public function new_login_url( $scheme = null ) {
			if ( get_option( 'permalink_structure' ) ) {
				return $this->user_trailingslashit( home_url( '/', $scheme ) . $this->new_login_slug() );
			} else {
				return home_url( '/', $scheme ) . '?' . $this->new_login_slug();
			}
		}

		public function __construct() {
			global $wp_version;

			if ( version_compare( $wp_version, '4.0-RC1-src', '<' ) ) {
				add_action( 'admin_notices', array( $this, 'admin_notices_incompatible' ) );
				add_action( 'network_admin_notices', array( $this, 'admin_notices_incompatible' ) );

				return;
			}

			register_activation_hook( $this->basename(), array( $this, 'activate' ) );
			register_uninstall_hook( $this->basename(), array( 'Wlmpb_Rename_Login', 'uninstall' ) );

			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );
			add_action( 'network_admin_notices', array( $this, 'admin_notices' ) );

			if ( is_multisite() && ! function_exists( 'is_plugin_active_for_network' ) ) {
				require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
			}

			add_filter( 'plugin_action_links_' . $this->basename(), array( $this, 'plugin_action_links' ) );

			if ( is_multisite() && is_plugin_active_for_network( $this->basename() ) ) {
				add_filter( 'network_admin_plugin_action_links_' . $this->basename(), array( $this, 'plugin_action_links' ) );

				add_action( 'wpmu_options', array( $this, 'wpmu_options' ) );
				add_action( 'update_wpmu_options', array( $this, 'update_wpmu_options' ) );
			}

			add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ), 1 );
			add_action( 'wp_loaded', array( $this, 'wp_loaded' ) );

			add_filter( 'site_url', array( $this, 'site_url' ), 10, 4 );
			add_filter( 'network_site_url', array( $this, 'network_site_url' ), 10, 3 );
			add_filter( 'wp_redirect', array( $this, 'wp_redirect' ), 10, 2 );

			add_filter( 'site_option_welcome_email', array( $this, 'welcome_email' ) );

			remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );
		}


		public function activate() {
			add_option( 'wlmpb_redirect', '1' );
			delete_option( 'wlmpb_admin' );
		}

		public static function uninstall() {
			global $wpdb;

			if ( is_multisite() ) {
				$blogs = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );

				if ( $blogs ) {
					foreach ( $blogs as $blog ) {
						switch_to_blog( $blog );
						delete_option( 'wlmpb_page' );
					}

					restore_current_blog();
				}

				delete_site_option( 'wlmpb_page' );
			} else {
				delete_option( 'wlmpb_page' );
			}
		}


		public function update_wpmu_options() {
			if (
				( $wlmpb_page = sanitize_title_with_dashes( $_POST['wlmpb_page'] ) ) &&
				strpos( $wlmpb_page, 'wp-login' ) === false &&
				! in_array( $wlmpb_page, $this->forbidden_slugs() )
			) {
				update_site_option( 'wlmpb_page', $wlmpb_page );
			}
		}

		public function admin_init() {
			global $pagenow;

			add_settings_section(
				'white-label-megapack-branding-section',
				__( 'Wlmpb Rename Login', 'white-label-megapack-branding' ),
				array( $this, 'wlmpb_section_desc' ),
				'permalink'
			);

			add_settings_field(
				'wlmpb-page',
				'<label for="wlmpb-page" id="change-login-url">' . __( 'Change Login URL', 'white-label-megapack-branding' ) . '</label>',
				array( $this, 'wlmpb_page_input' ),
				'permalink',
				'white-label-megapack-branding-section'
			);

			if ( isset( $_POST['wlmpb_page'] ) && $pagenow === 'options-permalink.php' ) {
				if (
					( $wlmpb_page = sanitize_title_with_dashes( $_POST['wlmpb_page'] ) ) &&
					strpos( $wlmpb_page, 'wp-login' ) === false &&
					! in_array( $wlmpb_page, $this->forbidden_slugs() )
				) {
					if ( is_multisite() && $wlmpb_page === get_site_option( 'wlmpb_page', 'login' ) ) {
						delete_option( 'wlmpb_page' );
					} else {
						update_option( 'wlmpb_page', $wlmpb_page );
					}
				}
			}

			if ( get_option( 'wlmpb_redirect' ) ) {
				delete_option( 'wlmpb_redirect' );

				if ( is_multisite() && is_super_admin() && is_plugin_active_for_network( $this->basename() ) ) {
					$redirect = network_admin_url( 'settings.php#wlmpb-page-input' );
				} else {
					$redirect = admin_url( 'options-permalink.php#wlmpb-page-input' );
				}

				wp_safe_redirect( $redirect );

				die;
			}
		}

		public function wlmpb_section_desc() {
			$out = '';

			if ( is_multisite() && is_super_admin() && is_plugin_active_for_network( $this->basename() ) ) {
				$out .= '<p>' . sprintf( __( 'To set a networkwide default, go to %s.', 'white-label-megapack-branding' ), '<a href="' . network_admin_url( 'settings.php#wlmpb-page-input' ) . '">' . __( 'Network Settings', 'white-label-megapack-branding' ) . '</a>') . '</p>';
			}

			echo $out;
		}

		public function wlmpb_page_input() {
			if ( get_option( 'permalink_structure' ) ) {
				echo '<code>' . trailingslashit( home_url() ) . '</code> <input id="wlmpb-page-input" type="text" name="wlmpb_page" value="' . $this->new_login_slug()  . '">' . ( $this->use_trailing_slashes() ? ' <code>/</code>' : '' );
			} else {
				echo '<code>' . trailingslashit( home_url() ) . '?</code> <input id="wlmpb-page-input" type="text" name="wlmpb_page" value="' . $this->new_login_slug()  . '">';
			}
		}

		public function admin_notices() {
			global $pagenow;

			if ( ! is_network_admin() && $pagenow === 'options-permalink.php' && isset( $_GET['settings-updated'] ) ) {
				echo '<div class="updated"><p>' . sprintf( __( 'Your login page is now here: %s. Bookmark this page!', 'white-label-megapack-branding' ), '<strong><a href="' . $this->new_login_url() . '">' . $this->new_login_url() . '</a></strong>' ) . '</p></div>';
			}
		}

		public function plugin_action_links( $links ) {
			if ( is_network_admin() && is_plugin_active_for_network( $this->basename() ) ) {
				array_unshift( $links, '<a href="' . network_admin_url( 'settings.php#wlmpb-page-input' ) . '">' . __( 'Settings', 'white-label-megapack-branding' ) . '</a>' );
			} elseif ( ! is_network_admin() ) {
				array_unshift( $links, '<a href="' . admin_url( 'options-permalink.php#wlmpb-page-input' ) . '">' . __( 'Settings', 'white-label-megapack-branding' ) . '</a>' );
			}

			return $links;
		}

		public function plugins_loaded() {
			global $pagenow;

			load_plugin_textdomain( 'white-label-megapack-branding' );

			if (
				! is_multisite() && (
					strpos( $_SERVER['REQUEST_URI'], 'wp-signup' ) !== false ||
					strpos( $_SERVER['REQUEST_URI'], 'wp-activate' ) !== false
				)
			) {
				wp_die( __( 'This feature is not enabled.', 'white-label-megapack-branding' ) );
			}

			$request = parse_url( $_SERVER['REQUEST_URI'] );

			if ( (
					strpos( $_SERVER['REQUEST_URI'], 'wp-login.php' ) !== false ||
					untrailingslashit( $request['path'] ) === site_url( 'wp-login', 'relative' )
				) &&
				! is_admin()
			) {
				$this->wp_login_php = true;
				$_SERVER['REQUEST_URI'] = $this->user_trailingslashit( '/' . str_repeat( '-/', 10 ) );
				$pagenow = 'index.php';
			} elseif (
				untrailingslashit( $request['path'] ) === home_url( $this->new_login_slug(), 'relative' ) || (
					! get_option( 'permalink_structure' ) &&
					isset( $_GET[$this->new_login_slug()] ) &&
					empty( $_GET[$this->new_login_slug()] )
			) ) {
				$pagenow = 'wp-login.php';
			}
		}

		public function wp_loaded() {
			global $pagenow;

			if ( is_admin() && ! is_user_logged_in() && ! defined( 'DOING_AJAX' ) ) {
				wp_die( __( 'You must log in to access the admin area.', 'white-label-megapack-branding' ) );
			}

			$request = parse_url( $_SERVER['REQUEST_URI'] );

			if (
				$pagenow === 'wp-login.php' &&
				$request['path'] !== $this->user_trailingslashit( $request['path'] ) &&
				get_option( 'permalink_structure' )
			) {
				wp_safe_redirect( $this->user_trailingslashit( $this->new_login_url() ) . ( ! empty( $_SERVER['QUERY_STRING'] ) ? '?' . $_SERVER['QUERY_STRING'] : '' ) );
				die;
			} elseif ( $this->wp_login_php ) {
				if (
					( $referer = wp_get_referer() ) &&
					strpos( $referer, 'wp-activate.php' ) !== false &&
					( $referer = parse_url( $referer ) ) &&
					! empty( $referer['query'] )
				) {
					parse_str( $referer['query'], $referer );

					if (
						! empty( $referer['key'] ) &&
						( $result = wpmu_activate_signup( $referer['key'] ) ) &&
						is_wp_error( $result ) && (
							$result->get_error_code() === 'already_active' ||
							$result->get_error_code() === 'blog_taken'
					) ) {
						wp_safe_redirect( $this->new_login_url() . ( ! empty( $_SERVER['QUERY_STRING'] ) ? '?' . $_SERVER['QUERY_STRING'] : '' ) );
						die;
					}
				}

				$this->wp_template_loader();
			} elseif ( $pagenow === 'wp-login.php' ) {
				global $error, $interim_login, $action, $user_login;

				@require_once ABSPATH . 'wp-login.php';

				die;
			}
		}

		public function site_url( $url, $path, $scheme, $blog_id ) {
			return $this->filter_wp_login_php( $url, $scheme );
		}

		public function network_site_url( $url, $path, $scheme ) {
			return $this->filter_wp_login_php( $url, $scheme );
		}

		public function wp_redirect( $location, $status ) {
			return $this->filter_wp_login_php( $location );
		}

		public function filter_wp_login_php( $url, $scheme = null ) {
			if ( strpos( $url, 'wp-login.php' ) !== false ) {
				if ( is_ssl() ) {
					$scheme = 'https';
				}

				$args = explode( '?', $url );

				if ( isset( $args[1] ) ) {
					parse_str( $args[1], $args );
					$url = add_query_arg( $args, $this->new_login_url( $scheme ) );
				} else {
					$url = $this->new_login_url( $scheme );
				}
			}

			return $url;
		}

		public function welcome_email( $value ) {
			return $value = str_replace( 'wp-login.php', trailingslashit( get_site_option( 'wlmpb_page', 'loginurl' ) ), $value );
		}

		public function forbidden_slugs() {
			$wp = new WP;
			return array_merge( $wp->public_query_vars, $wp->private_query_vars );
		}
	}

	new Wlmpb_Rename_Login;
}
}
