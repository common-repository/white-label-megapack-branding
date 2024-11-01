<?php


// Upgrade Page Content

add_action( 'wlmpb_settings_content', 'wlmpb_documentation_page' );
function wlmpb_documentation_page() {
		global $wlmpb_active_tab;
		if ( 'documentation' != $wlmpb_active_tab )
		return;
?>

<!-- Padding 0px for upgrade page -->
<style>
		.wlmpb-tab-content {
				padding: 0px!important;
		}
</style>

<div style="margin-top: 2px; margin-bottom: 1px;" class='wlmpb-documentation-body'>
		<div class="documentation-section">
				<h1>WLMP Branding </h1>
				<p>Visit all documentation.</p>
				<a href="https://4wp.it/category/documentazione/white-label-megapack-branding/" target="_blank">Get Now</a>
		</div>
	
</div>
<div style="margin-top: 2px; margin-bottom: 1px;" class='wlmpb-documentation-body'>
		<div class="documentation-section">
				<h1>Make a Donation </h1>
				<p>To allow us to keep the plugin always in update.</p>
				<a href="https://4wp-for-wordpress.sumup.link/donation-for-white-label-megapack-branding" target="_blank">Thank You</a>
		</div>
	
</div>
<div style="margin-top: 2px; margin-bottom: 1px;" class='wlmpb-documentation-body'>
		<div class="documentation-section">
				<h1>Rate 5 Stars </h1>
				<p>If the plugin is useful to you.</p>
				<a href="https://wordpress.org/plugins/white-label-megapack-branding/" target="_blank">Ok Sure</a>
		</div>
	
</div>
<div style="margin-top: 2px; margin-bottom: 1px;" class='wlmpb-documentation-body'>
		<div class="documentation-section">
				<h1>Support</h1>
				<p>Got something to say? Need help?</p>
				<a href="https://wordpress.org/support/plugin/white-label-megapack-branding/" target="_blank">View Support</a>
		</div>
	
</div>
<?php }
