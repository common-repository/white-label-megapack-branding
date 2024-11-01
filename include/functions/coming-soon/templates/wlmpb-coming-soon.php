<?php

/**
 * WLMP Branding Dash Coming Soon Template
 *
 * @package   white-label-megapack-branding
 * @license   GPL2+
 */

?>

<!DOCTYPE html>
<html>
<head>


    <!-- Meta Data -->
    <?php do_action( 'wlmpb_coming_soon_meta' ); ?>


	  <!-- Link Stylesheets -->
		<link rel="profile" href="http://gmpg.org/xfn/11">
	  <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Muli|Open+Sans|Oswald|Poppins|Raleway|Roboto|Source+Sans+Pro|Ubuntu" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="<?php echo plugins_url( 'templates/wlmpb-coming-soon.css', dirname( __FILE__ ) ); ?>">

			  <!-- Coming Soon dynamic styling -->
			  <style type="text/css">
						body {
						    background-size: cover!important;
						    background-position: center center;
						}
					  .wlmpb-construction-body {
					      background-image: url(<?php echo get_option('wlmpb_under_construction_background_image') ?>) !important;
								background-color: <?php echo get_option('wlmpb_under_construction_background_color') ?> !important;
					  }
					  h1, .wlmpb-message, .wlmpb-connect-title  {
					      color: <?php echo get_option('wlmpb_under_construction_text_color') ?>;
					      font-family: <?php echo get_option('wlmpb_under_construction_font_family') ?>;
					  }
					  .wlmpb-construction-body:before {
					      content: " ";
					      width: 100%;
					      height: 100%;
					      position: fixed;
					      z-index: -1;
					      top: 0;
					      left: 0;
					      background: <?php echo get_option('wlmpb_under_construction_overlay_color') ?>;
					      opacity: <?php echo get_option('wlmpb_under_construction_overlay_opacity') ?>;
					  }
					  .wlmpb-logo {
					      padding-bottom: <?php echo get_option('wlmpb_construction_logo_padding_bottom') ?>;
					  }
					  .wlmpb-button {
					      background: <?php echo get_option('wlmpb_under_construction_button_color') ?>;
					      border-radius: <?php echo get_option('wlmpb_under_construction_button_radius') ?>!important;
					  }
						.wlmpb-social-links a {
					      color: <?php echo get_option('wlmpb_under_construction_text_color') ?>;
						}
						.wlmpb-social-links a:hover {
								color: <?php echo get_option('wlmpb_under_construction_button_color') ?>;
						}
						.wlmpb-construction-wrapper .wlmpb-title {
								margin-bottom: <?php echo get_option('wlmpb_under_construction_title_padding_bottom') ?> !important;
						}
						.wlmpb-button {
					      color: <?php echo get_option('wlmpb_under_construction_text_color') ?>;
								color: <?php echo get_option('wlmpb_under_construction_button_text_color') ?>!important;
						}
						.wlmpb-social-links {
						    margin-top: 60px;
								margin-top: <?php echo get_option('wlmpb_under_construction_social_padding') ?>!important;
						    vertical-align: bottom;
						}
            .wlmpb-logo {
                width: auto;
                width: <?php echo get_option('wlmpb_under_construction_login_logo_width') ?> !important;
                height: auto;
            }

            /* Coming Soon Custom CSS */
            <?php do_action( 'wlmpb_coming_soon_custom_css' ); ?>

			  </style>

		<!-- WLMP Branding Dashboard Google Analytics -->
		<?php $propertyID = get_option('wlmpb_cc_google_analytics'); // GA Property ID ?>

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

</head>


<!-- Coming soon content -->
<body class="wlmpb-construction-body">
		<div class="wlmpb-overlay">
				<div class="wlmpb-construction-wrapper">

        <!-- Coming Soon Logo -->
				<img class="wlmpb-logo" src="<?php echo get_option('wlmpb_under_construction_login_logo') ?>"/>

        <!-- Coming Soon Title -->
				<h1 class="wlmpb-title"><?php echo get_option('wlmpb_under_construction_title') ?></h1>

            <!-- Coming Soon Message -->
						<div class="wlmpb-message">
						<?php echo do_shortcode("". get_option('wlmpb_under_construction_body') .""); ?>
						<?php
						$wlmpb_button_text = get_option('wlmpb_under_construction_button_text');
						$wlmpb_button_link = get_option('wlmpb_under_construction_button_link');
								if (!empty($wlmpb_button_text)) {
										echo "<div class='wlmpb-button-holder'><a class='wlmpb-button' href=' ". $wlmpb_button_link ." ' target='_blank'>" . $wlmpb_button_text . "</a></div>";
								}
								else {
								// Do not show Facebook Icon
								}
						?>
						</div>


		        <!-- Social Section -->
						<div class="wlmpb-social-links">

						<?php
						$wlmpb_social_facebook = get_option('wlmpb_under_construction_facebook');
						$wlmpb_social_instagram = get_option('wlmpb_under_construction_instagram');
						$wlmpb_social_twitter = get_option('wlmpb_under_construction_twitter');
						$wlmpb_social_linkedin = get_option('wlmpb_under_construction_linkedin');
						$wlmpb_social_youtube = get_option('wlmpb_under_construction_youtube');
						$wlmpb_social_title = get_option('wlmpb_under_construction_social_title');

            // Begin gathering content for social section

						if (!empty($wlmpb_social_facebook) || !empty($wlmpb_social_instagram) || !empty($wlmpb_social_twitter) || !empty($wlmpb_social_linkedin) || !empty($wlmpb_social_youtube)) {
								if ($wlmpb_social_title == "") {
    								echo "<div class='wlmpb-connect-title'>Connect With Us</div>";
  							} else {
      							echo "<div class='wlmpb-connect-title'>$wlmpb_social_title</div>";
  							}
						} else {
						    // Do not display social title
						}

  
				    // Display Facebook Icon
						$wlmpb_social_facebook = get_option('wlmpb_under_construction_facebook');
				    if (!empty($wlmpb_social_facebook)) {
								echo "<a href=' ". $wlmpb_social_facebook ."' target='_blank'><i class='fa fa-facebook' aria-hidden='true'></i></a>";
				    } else {
						    // Do not display Facebook Icon
				    }

						// Display Instagram Icon
						$wlmpb_social_instagram = get_option('wlmpb_under_construction_instagram');
				    if (!empty($wlmpb_social_instagram)) {
								echo "<a href=' ". $wlmpb_social_instagram ."' target='_blank'><i class='fa fa-instagram' aria-hidden='true'></i></a>";
				    } else {
						    // Do not display Instagram Icon
				    }

						// Display Twitter Icon
						$wlmpb_social_twitter = get_option('wlmpb_under_construction_twitter');
				    if (!empty($wlmpb_social_twitter)) {
								echo "<a href=' ". $wlmpb_social_twitter ."' target='_blank'><i class='fa fa-twitter' aria-hidden='true'></i></a>";
				    }
				    else {
						    // Do not display Twitter Icon
				    }

						// Display LinkedIn Icon
						$wlmpb_social_linkedin = get_option('wlmpb_under_construction_linkedin');
				    if (!empty($wlmpb_social_linkedin)) {
								echo "<a href=' ". $wlmpb_social_linkedin ."' target='_blank'><i class='fa fa-linkedin' aria-hidden='true'></i></a>";
				    }
				    else {
						    // Do not show Linkedin Icon
				    }

						// Display Youtube Icon
						$wlmpb_social_youtube = get_option('wlmpb_under_construction_youtube');
				    if (!empty($wlmpb_social_youtube)) {
								echo "<a href=' ". $wlmpb_social_youtube ."' target='_blank'><i class='fa fa-youtube' aria-hidden='true'></i></a>";
				    }
				    else {
						    // Do not show Youtube Icon
				    }
						?>

						</div>

				</div>
		</div>
</body>
</html>
