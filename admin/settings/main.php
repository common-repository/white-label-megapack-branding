<?php


// Get requried indiviual settings pages

require( plugin_dir_path( __FILE__ ) . 'create-tabs.php');
require( plugin_dir_path( __FILE__ ) . 'header-footer-admin-wordpress-settings.php');
require( plugin_dir_path( __FILE__ ) . 'login-settings.php');
require( plugin_dir_path( __FILE__ ) . 'custom-login-redirect-settings.php');
require( plugin_dir_path( __FILE__ ) . 'managerwebsite-access.php');
require( plugin_dir_path( __FILE__ ) . 'dashboard-widget-settings.php');
require( plugin_dir_path( __FILE__ ) . 'post-settings.php');
require( plugin_dir_path( __FILE__ ) . 'media-settings.php');
require( plugin_dir_path( __FILE__ ) . 'pages-settings.php');
require( plugin_dir_path( __FILE__ ) . 'comments-settings.php');
require( plugin_dir_path( __FILE__ ) . 'custom-code.php');
require( plugin_dir_path( __FILE__ ) . 'cookie-bar-settings.php');
require( plugin_dir_path( __FILE__ ) . 'google-recaptcha-settings.php');
require( plugin_dir_path( __FILE__ ) . 'coming-soon.php');
require( plugin_dir_path( __FILE__ ) . 'documentation.php');


// Dashboards settings page content

function wlmpb_dashboards_page() {
global $wlmpb_active_tab;
global $wlmpb_plugin_version;
$wlmpb_active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'header-footer-admin-wordpress-settings'; ?>

		<div class="wrap wlmpb-settings-wrapper">
				<div class="wlmpb-header">
						<img clas="wlmpb-logo" src="<?php echo plugins_url( 'assets/white-label-megapack-branding-Logo.png', __FILE__ ); ?>" alt="WLMP Branding Dash" height="130" width="250" />
						<h1><?php _e( 'White Label MegaPack Branding', 'white-label-megapack-branding' ); ?><span class="white-label-megapack-branding-developer">Version <?php echo $wlmpb_plugin_version; ?></span></h1>
        </div>

        <div class="wlmpb-page-navigation vertical left clearfix">

						<div class="wlmpb-tabs-navigation-wrapper">
								<?php
								do_action( 'wlmpb_settings_tab' );
								?>
		        </div>

        </div>

        <div class="wlmpb-tab-content">
        <?php do_action( 'wlmpb_settings_content' ); ?>
        </div>

			      <script type="text/javascript">
			      jQuery(document).ready(function($){
			          $('#upload-btn').click(function(e) {
			              e.preventDefault();
			              var image = wp.media({
			                  title: 'Upload Image',
			                  // mutiple: true if you want to upload multiple files at once
			                  multiple: false
			              }).open()
			              .on('select', function(e){
			                  // This will return the selected image from the Media Uploader, the result is an object
			                  var uploaded_image = image.state().get('selection').first();
			                  // We convert uploaded_image to a JSON object to make accessing it easier
			                  // Output to the console uploaded_image
			                  console.log(uploaded_image);
			                  var image_url = uploaded_image.toJSON().url;
			                  // Let's assign the url value to the input field
			                  $('#image_url').val(image_url);
			              });
			          });
			      });
			      jQuery(document).ready(function($){
			          $('#upload-btn-two').click(function(e) {
			              e.preventDefault();
			              var image = wp.media({
			                  title: 'Upload Image',
			                  // mutiple: true if you want to upload multiple files at once
			                  multiple: false
			              }).open()
			              .on('select', function(e){
			                  // This will return the selected image from the Media Uploader, the result is an object
			                  var uploaded_image = image.state().get('selection').first();
			                  // We convert uploaded_image to a JSON object to make accessing it easier
			                  // Output to the console uploaded_image
			                  console.log(uploaded_image);
			                  var image_url_two = uploaded_image.toJSON().url;
			                  // Let's assign the url value to the input field
			                  $('#image_url_two').val(image_url_two);
			              });
			          });
			      });
			      jQuery(document).ready(function($){
			          $('#upload-btn-three').click(function(e) {
			              e.preventDefault();
			              var image = wp.media({
			                  title: 'Upload Image',
			                  // mutiple: true if you want to upload multiple files at once
			                  multiple: false
			              }).open()
			              .on('select', function(e){
			                  // This will return the selected image from the Media Uploader, the result is an object
			                  var uploaded_image = image.state().get('selection').first();
			                  // We convert uploaded_image to a JSON object to make accessing it easier
			                  // Output to the console uploaded_image
			                  console.log(uploaded_image);
			                  var image_url_three = uploaded_image.toJSON().url;
			                  // Let's assign the url value to the input field
			                  $('#image_url_three').val(image_url_three);
			              });
			          });
			      });
			      jQuery(document).ready(function($){
			          $('#upload-btn-four').click(function(e) {
			              e.preventDefault();
			              var image = wp.media({
			                  title: 'Upload Image',
			                  // mutiple: true if you want to upload multiple files at once
			                  multiple: false
			              }).open()
			              .on('select', function(e){
			                  // This will return the selected image from the Media Uploader, the result is an object
			                  var uploaded_image = image.state().get('selection').first();
			                  // We convert uploaded_image to a JSON object to make accessing it easier
			                  // Output to the console uploaded_image
			                  console.log(uploaded_image);
			                  var image_url_four = uploaded_image.toJSON().url;
			                  // Let's assign the url value to the input field
			                  $('#image_url_four').val(image_url_four);
			              });
			          });
			      });
						jQuery(document).ready(function($){
			          $('#upload-btn-admin-logo').click(function(e) {
			              e.preventDefault();
			              var image = wp.media({
			                  title: 'Upload Image',
			                  // mutiple: true if you want to upload multiple files at once
			                  multiple: false
			              }).open()
			              .on('select', function(e){
			                  // This will return the selected image from the Media Uploader, the result is an object
			                  var uploaded_image = image.state().get('selection').first();
			                  // We convert uploaded_image to a JSON object to make accessing it easier
			                  // Output to the console uploaded_image
			                  console.log(uploaded_image);
			                  var admin_logo_image_url = uploaded_image.toJSON().url;
			                  // Let's assign the url value to the input field
			                  $('#admin_logo_image_url').val(admin_logo_image_url);
			              });
			          });
			      });

			      // Add color picker to input

			      (function( $ ) {
			          // Add Color Picker to all inputs that have 'color-field' class
			          $(function() {
			              $('.color-field').wpColorPicker();
			          });

			      })( jQuery );

			      </script>
    </div>

		<!-- Footer -->
    <div class="white-label-megapack-branding-footer">Developed by <a href="https://4wp.it" target="_blank">4WP</a>.</div>
<?php }
