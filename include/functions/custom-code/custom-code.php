<?php

// Add Google Analytics Tracking code to header
function wlmpb_google_analytics_tracking_code(){
$propertyID = get_option('wlmpb_cc_google_analytics'); // GA Property ID
    if (!empty($propertyID)) { ?>
        <!-- WLMP Branding Dashboard Google Analytics -->
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', '<?php echo $propertyID; ?>']);
          _gaq.push(['_trackPageview']);
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
    <?php }
}
add_action('wp_head', 'wlmpb_google_analytics_tracking_code');


// Add Facebook Pixel code to header
function wlmpb_facebook_pixel_code(){
$wlmpb_facebook_pixel = get_option('wlmpb_cc_facebook_pixel');
    if (!empty($wlmpb_facebook_pixel)) { ?>
        <!-- WLMP Branding Dashboard Facebook Pixel -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo $wlmpb_facebook_pixel; ?>');
            fbq('track', 'PageView');
        </script>
        <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $wlmpb_facebook_pixel; ?>&ev=PageView&noscript=1"/>
        </noscript>
    <?php }
}
add_action('wp_head', 'wlmpb_facebook_pixel_code');

// Adds Custom CSS code to website frontend
function wlmpb_add_custom_css(){
$wlmpb_custom_css = get_option('wlmpb_cc_custom_css'); // GA Property ID
    if (!empty($wlmpb_custom_css)) { ?>
        <style type="text/css">
            <?php echo $wlmpb_custom_css; ?>
        </style>
    <?php }
}
add_action('wp_head', 'wlmpb_add_custom_css');

// Adds Custom CSS code to admin backend
function wlmpb_add_custom_css_admin(){
$wlmpb_custom_css_admin = get_option('wlmpb_cc_custom_css_admin'); // GA Property ID
    if (!empty($wlmpb_custom_css_admin)) { ?>
        <style type="text/css">
            <?php echo $wlmpb_custom_css_admin; ?>
        </style>
    <?php }
}
add_action('admin_head', 'wlmpb_add_custom_css_admin');



// Add Custom JS code to header
function wlmpb_add_custom_js(){
$wlmpb_custom_js = get_option('wlmpb_cc_custom_js'); // GA Property ID
    if (!empty($wlmpb_custom_js)) { ?>
        <!-- WLMP Branding Dashboard Custom JS -->
        <script type="text/javascript">
            <?php echo $wlmpb_custom_js; ?>
        </script>
<?php }
}
add_action('wp_head', 'wlmpb_add_custom_js');


// Add Custom Script to header
function wlmpb_add_custom_script(){
$wlmpb_custom_script = get_option('wlmpb_cc_custom_script');
    if (!empty($wlmpb_custom_script)) { ?>
        <!-- WLMP Branding Dashboard Custom Script -->
        <?php echo $wlmpb_custom_script; ?>
    <?php }
}
add_action('wp_head', 'wlmpb_add_custom_script');

