<?php


function wlmpb_add_footer_styles_cookiebar()
{
 $wlmpb_cookie_bar_activation = get_option('wlmpb_cookie_bar_activation');
        if ( !empty($wlmpb_cookie_bar_activation) ) { 
  wp_enqueue_style('your-style-id', plugins_url('css/cookiebar.css', __FILE__ ));
}
	};
add_action('get_footer', 'wlmpb_add_footer_styles_cookiebar');

function wlmpb_inject_html_to_footer_for_cookiebar()
{
$wlmpb_cookie_bar_activation = get_option('wlmpb_cookie_bar_activation');
        if ( !empty($wlmpb_cookie_bar_activation) ) {
  $text_to_display = get_option('wlmpb_cookie_bar_text_field_cookiesmessage') ? get_option('wlmpb_cookie_bar_text_field_cookiesmessage') : 'This site uses internal and external cookies provide and improve our services. By using our site, you grant consent to cookies.';
  $background_color = get_option('wlmpb_cookie_bar_color_field_backgroundcolor') ? get_option('wlmpb_cookie_bar_color_field_backgroundcolor') : '#000';
  $text_color = get_option('wlmpb_cookie_bar_color_field_textcolor') ? get_option('wlmpb_cookie_bar_color_field_textcolor') : '#fff';
  $cookies_policy_url = get_option('wlmpb_cookie_bar_text_field_cookiesurl') ? get_option('wlmpb_cookie_bar_text_field_cookiesurl') : get_home_url();
  $cookies_policy_anchor = get_option('wlmpb_cookie_bar_text_field_cookiesanchor') ? get_option('wlmpb_cookie_bar_text_field_cookiesanchor') : 'Learn more';

  //Button
	
  $button_background_color = get_option('wlmpb_cookie_bar_color_field_button_backgroundcolor') ? get_option('wlmpb_cookie_bar_color_field_button_backgroundcolor') : '#fff';
  $button_text_color = get_option('wlmpb_cookie_bar_color_field_button_textcolor') ? get_option('wlmpb_cookie_bar_color_field_button_textcolor') : '#000';


  echo <<<COOKIEBARHTML
  <div id="wlmpb-cookie-bar" class="wlmpb-cookie-bar" style="display: flex; align-items:center; justify-content:center; background:{$background_color};">
  <div>
    <div class="wlmpb-content">
      <p class="wlmpb-text" style="color:{$text_color};">{$text_to_display}</p>
      <a class="accept-button" id="accept-button" href="#" style="background-color:{$button_background_color};color:{$button_text_color}">Accept</a>
      <a class="learn-more" href="{$cookies_policy_url}" target="_blank" rel="nofollow">{$cookies_policy_anchor}</a>
      </div>
  </div>
</div>


<script>
const wlmpb = document.getElementById("wlmpb-cookie-bar");
const wlmpbAcceptButton = document.getElementById("accept-button");

if (!localStorage.wpWlmpbCookieBarIsClosed) {
    wlmpb.style.display="flex";
  } else {
    wlmpb.style.bottom="-500px";
  }

  wlmpbAcceptButton.addEventListener("click", () => {
    wlmpb.style.bottom="-500px";    
    localStorage.wpWlmpbCookieBarIsClosed = 'true';
  })

</script>
COOKIEBARHTML;
}
	}
add_action('wp_footer', 'wlmpb_inject_html_to_footer_for_cookiebar');