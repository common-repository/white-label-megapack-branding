<?php
// Activate WordPress coming soon mode
function wlmpb_landing_page_mode(){
global $pagenow;
$wlmpb_enable_constructions = get_option('wlmpb_under_construction_disable');
    if (!empty($wlmpb_enable_constructions)) {
        if ( $pagenow !== 'wp-login.php' && !is_user_logged_in() && !is_admin() ) {
        		header( $_SERVER["SERVER_PROTOCOL"] . ' 503 Service Temporarily Unavailable', true, 503 );
        		header( 'Content-Type: text/html; charset=utf-8' );
        		if ( file_exists( plugin_dir_path( __FILE__ ) . 'templates/wlmpb-coming-soon.php' ) ) {
        			require_once( plugin_dir_path( __FILE__ ) . 'templates/wlmpb-coming-soon.php' );
        		}
        		die();
      	}
    }
    else {
      // Don't display Coming Soon
    }
}
add_action('wp_loaded', 'wlmpb_landing_page_mode');


// Preview Coming Soon function
add_filter( 'template_include', 'wlmpb_landing_page_template', 99 );
function wlmpb_landing_page_template( $template ) {
    if(isset($_GET['wlmpb-preview-coming-soon']) && current_user_can('read')) {
        return( plugin_dir_path( __FILE__ ) . 'templates/wlmpb-coming-soon.php' );
    }
    return $template;
}

// Coming Soon meta data
add_action( 'wlmpb_coming_soon_meta', 'wlmpb_pro_coming_soon_meta' );
function wlmpb_pro_coming_soon_meta() {
    $wlmpb_landing_meta_title = get_option('wlmpb_under_construction_meta_title');
    $wlmpb_landing_meta_description = get_option('wlmpb_under_construction_meta_description');
    $wlmpb_landing_meta_description_striped = str_replace('"','',$wlmpb_landing_meta_description);
    $wlmpb_landing_meta_body= get_option('wlmpb_under_construction_body');
    $wlmpb_landing_meta_body_striped = str_replace('"','',$wlmpb_landing_meta_body); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (!empty($wlmpb_landing_meta_title)) { echo get_option('wlmpb_under_construction_meta_title'); } else { echo get_option('wlmpb_under_construction_title'); } ?></title>
    <meta name="description" content="<?php if (!empty($wlmpb_landing_meta_description)) { echo $wlmpb_landing_meta_description_striped; } else { echo $wlmpb_landing_meta_body_striped; } ?>">

<?php }

