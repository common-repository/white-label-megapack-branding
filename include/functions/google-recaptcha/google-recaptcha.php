<?php

$google_recaptcha_active = get_option('wlmpb_google_recaptcha_active');
    if (!empty($google_recaptcha_active)) {

function wlmpb_frontend_google_recaptcha_script() {
	if (did_action("login_init") > 0 || function_exists('is_account_page') || function_exists('bp_get_signup_page') || (is_single() && comments_open()) && !is_user_logged_in()) {
		wp_register_script("wlmpb_recaptcha", "https://www.google.com/recaptcha/api.js?hl=".get_locale());
		wp_enqueue_script("wlmpb_recaptcha");
		wp_enqueue_script("wlmpb_recaptcha_check");
		wp_localize_script("wlmpb_recaptcha_check", "wlmpb_recaptcha_trans", array("title" => __("Are you a Robot?", "white-label-megapack-branding")));
	
		add_action("comment_form_after_fields", "wlmpb_display");
		add_action("login_form", "wlmpb_display");
		add_action("register_form", "wlmpb_display");
		
		//add_action("woocommerce_login_form", "wlmpb_display");
		//add_action("woocommerce_register_form", "wlmpb_display");

	}
}

		
function wlmpb_display() {
	echo "<div class=\"g-recaptcha\" data-sitekey=\"".get_option("wlmpb_google_recaptcha_site_key")."\" data-callback=\"enableBtn\"></div>";
}

function wlmpb_verify($input) {
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["g-recaptcha-response"])) {
		$wlmpb_secret_key = filter_var(get_option("wlmpb_google_recaptcha_secret_key"), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$recaptcha_response = filter_input(INPUT_POST, "g-recaptcha-response", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret={$wlmpb_secret_key}&response={$recaptcha_response}");
		
		if (is_array($response)) {
			$response = json_decode($response["body"], 1);
			if ($response["success"]) {
				return $input;
			} elseif (is_array($input)) { // Array = Comment else Object
				wp_die("<p><strong>".__("ERROR:", "white-label-megapack-branding")."</strong> ".__("Google reCAPTCHA verification failed.", "white-label-megapack-branding")."</p>", "reCAPTCHA", array("response" => 403, "back_link" => 1));
			} else {
				return new WP_Error("reCAPTCHA", "<strong>".__("ERROR:", "white-label-megapack-branding")."</strong> ".__("Google reCAPTCHA verification failed.", "white-label-megapack-branding"));
			}
		} else {
			return new WP_Error("reCAPTCHA", "<strong>".__("ERROR:", "white-label-megapack-branding")."</strong> ".__("Wrong response from Google.", "white-label-megapack-branding"));
		}
	} else {
		wp_die("<p><strong>".__("ERROR:", "white-label-megapack-branding")."</strong> ".__("Google reCAPTCHA verification failed.", "white-label-megapack-branding")." ".__("Do you have JavaScript enabled?", "white-label-megapack-branding")."</p>", "reCAPTCHA", array("response" => 403, "back_link" => 1));
	}
}

function wlmpb_check() {
	if (get_option("wlmpb_google_recaptcha_site_key") != "" && get_option("wlmpb_google_recaptcha_secret_key") != "") {
		
		add_action("login_enqueue_scripts", "wlmpb_frontend_google_recaptcha_script");
		add_action("wp_enqueue_scripts", "wlmpb_frontend_google_recaptcha_script");
		
		if (!is_user_logged_in()) {
			add_action("preprocess_comment", "wlmpb_verify");
		}
		
		add_action("wp_authenticate_user", "wlmpb_verify");
		add_action("registration_errors", "wlmpb_verify");			
		//add_action("woocommerce_registration_errors", "wlmpb_verify");
	}
}

add_action("init", "wlmpb_check");
		}