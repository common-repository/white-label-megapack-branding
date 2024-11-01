<?php


// Custom Login Redirect Page Content

add_action( 'wlmpb_settings_content', 'wlmpb_custom_login_redirect_settings_page' );
function wlmpb_custom_login_redirect_settings_page() {
		global $wlmpb_active_tab;
		if ( 'custom-login-redirect-settings' != $wlmpb_active_tab )
		return;
?>

   <?php
	global $wpdb;
	if( isset( $_POST['role_url_submit'] ) ) {
	if (isset( $_POST['url_redirect'] ) && wp_verify_nonce($_POST['url_redirect'], 'add-urls') ) {
		$wlmpb_rrurlsredirect = $wpdb->prefix . 'wlmpb_rrurlsredirect';
		$role_type=sanitize_text_field($_POST['role_userrole']);
		$url_login_textbox=sanitize_text_field($_POST['url_login_textbox']);				
		$url_logout_textbox=sanitize_text_field($_POST['url_logout_textbox']);
		$adminbar=isset($_POST['adminbar']);
		if ($adminbar == null )
		{
			$adminbar = "no";
		}
		else {
			$adminbar=sanitize_text_field($_POST['adminbar']);
		}
		
		if (!empty($url_login_textbox))
		{
			$result=  $wpdb->insert( $wlmpb_rrurlsredirect,
			array(
			'role_type' => $role_type,
			'url_login_textbox'=> $url_login_textbox,
			'url_logout_textbox'=> $url_logout_textbox,
			'adminbar' => $adminbar,
			),
			array( '%s', '%s', '%s', '%s' )
			);
			
		}
		else {
			
			echo "<script>alert('Please Select  Url')</script>";
		}
	}
	}
	
	if( isset( $_POST['role_url_update'] ) ) {
	if (isset( $_POST['url_redirect'] ) && wp_verify_nonce($_POST['url_redirect'], 'add-urls') ) {
		$wlmpb_rrurlsredirect = $wpdb->prefix . 'wlmpb_rrurlsredirect';
		$role_type=sanitize_text_field($_POST['role_userrole']);
		$url_login_textbox=sanitize_text_field($_POST['url_login_textbox']);				
		$url_logout_textbox=sanitize_text_field($_POST['url_logout_textbox']);
		$adminbar=isset($_POST['adminbar']);
		if ($adminbar == null )
		{
			$adminbar = "no";
		}
		else {
			$adminbar=sanitize_text_field($_POST['adminbar']);
		}
		//if (!empty($url_login_dropdown)||!empty($url_login_textbox))
        //{
			$wpdb->update( $wlmpb_rrurlsredirect,
			array(
			'url_login_textbox'=> $url_login_textbox,
			'url_logout_textbox'=> $url_logout_textbox,
			'adminbar' => $adminbar,
			),
			array( 'role_type' => $role_type )
			);
		//}
		//else {
			
		//	echo "<script>alert('Please Select Page or Url')</script>";
		//}
	}
	}
	global $wp_roles; 	
	$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wlmpb_rrurlsredirect" );
	$arr = array();
	foreach ( $results as $result) {			
		//$array = [$result->role_type];
		array_push($arr, $result->role_type);
	}
?>

<div class="container" >
	<?php	
		 
		$fetchlogintext= "";

		$fetchlogouttext= "";
		$fetchadminbar= "";

		$fetchrole_type= "";
	foreach ( $wp_roles->roles as $key=>$value ): 		
		$urls = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wlmpb_rrurlsredirect WHERE `role_type` = '$key'" );
        if( !empty( $urls[0]) ){	 
		$fetchlogintext = $urls[0]->url_login_textbox;
		$fetchlogouttext = $urls[0]->url_logout_textbox;	
		$fetchadminbar = $urls[0]->adminbar;
		$fetchrole_type= $urls[0]->role_type;
		}			?>
	<strong><h3><?php echo $value['name']; ?></h3></strong>
	<form action="" method="post">
		<input type="hidden" name="role_userrole" Value="<?php echo $key; ?>"/>
		<?php wp_nonce_field('add-urls','url_redirect'); ?>
		
		<div class="row">
			<div class="left">
				<p class="wlmpb-settings-desc" style="padding-bottom: 2px;padding-top:8px;">Custom Login Redirect Slug</p>
			</div>
			
			<div class="right">
				<input type="text" name="url_login_textbox" Value="<?php   if ($key == $fetchrole_type) { if( isset($fetchlogintext)){  echo $fetchlogintext; } }?>" placeholder="ex. wp-admin/edit.php"/>
			</div>
		</div>
		
		<div class="row">
			<div class="left">
				<p class="wlmpb-settings-desc" style="padding-bottom: 2px;padding-top:8px;">Custom Logout Redirect Slug</p>
			</div>
			
			<div class="right">
				<input type="text" name="url_logout_textbox" Value="<?php  if ($key == $fetchrole_type) {  if( isset($fetchlogouttext)){ echo $fetchlogouttext;}}?>" placeholder="ex. custompage slug my site"/>
			</div>
		</div>
		<div class="row">
			<div class="left">
				<p class="wlmpb-settings-desc" style="padding-bottom: 2px;padding-top:8px;">Hide Adminbar in frontend?</p>
			</div>
			
			<div class="right">
				<div class="wlmpb-div"><label class="wlmpb-switch"><input type="checkbox" name="adminbar" value="yes"<?php if ($key == $fetchrole_type) { if ($fetchadminbar == "yes") { echo "checked='checked'"; } }?> /><span class="wlmpb-slider round"></span></label>Hide</div>
			</div>
		</div>
		
		<?php if ($key != "administrator") { ?>
			<div class="row">
				<div class="left">
			</div>
		<?php } ?>
		<div class="row">
			<div class="left"></div>
			<div class="right">
			<p style="padding-bottom: 2px;padding-top:8px;"></p>
				<?php			
					if ( in_array($key,$arr) ){ ?>
					<input type="submit" class="button button-primary" Value="Update"/>
					<input type="hidden" name="role_url_update" />
					<?php } else { ?>
					<input type="submit" class="button button-primary" Value="Save"/>
					<input type="hidden" name="role_url_submit" />
					<?php } 			
				?>
				<p style="padding-bottom: 2px;padding-top:8px;"></p>
			</div>
		</div>
	</form>
	<?php  endforeach; ?>
</div>
<?php }
