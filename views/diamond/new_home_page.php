
<script type="text/javascript">
var abb = {};
var php = {};
var mk_header_parallax, mk_banner_parallax, mk_page_parallax, mk_footer_parallax, mk_body_parallax;
var mk_images_dir = "<?php echo SITE_URL; ?>wnydiamonds/wp-content/themes/jupiter/images/index.html",
mk_theme_js_path = "<?php echo SITE_URL; ?>wnydiamonds/wp-content/themes/jupiter/js/index.html",
mk_theme_dir = "<?php echo SITE_URL; ?>wnydiamonds/wp-content/themes/jupiter/index.html",
mk_captcha_placeholder = "Enter Captcha",
mk_captcha_invalid_txt = "Invalid. Try again.",
mk_captcha_correct_txt = "Captcha correct.",
mk_responsive_nav_width = 1140,
mk_check_rtl = true,
mk_grid_width = 1140,
mk_ajax_search_option = "fullscreen_search",
mk_preloader_txt_color = "#444444",
mk_preloader_bg_color = "#ffffff",
mk_accent_color = "#768ba0",
mk_go_to_top =  "true",
mk_preloader_bar_color = "#768ba0",
mk_preloader_logo = "../demos.artbees.net/jupiter/wp-content/uploads/2015/03/jupiter_preloader_logo.png";
var mk_header_parallax = false,
mk_banner_parallax = false,
mk_page_parallax = false,
mk_footer_parallax = false,
mk_body_parallax = false,
mk_no_more_posts = "No More Posts";
function is_touch_device() {
              return ("ontouchstart" in document.documentElement);
          }
</script>
<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
.agileits_w3layouts_banner_nav{
    position: absolute;
    z-index: 9999;
    width: 90%;
    left: 0px;
    margin-top: 30px;
    right: 0px;
}
.navbar-default .navbar-nav > li > a {
    font-size: 12px;
    color: #ffffff;
}
.agileits_top_menu {
    padding: 0.5em 5%;
    background: #ffffffb3;
    border-top: 10px solid #000000;
    border-bottom: solid 1px #ccc;
    position: absolute;
    width: 100%;
    left: 0px;
    right: 0px;
    z-index: 999;
}
.mk-button.savvy-dimension {
    padding: 8px;
}
@media all and (max-width: 768px){
    .agileits_w3layouts_footer_grid_list{
        margin: 0 0 0 0px;
    }
    header nav {
        overflow: scroll;
    }
    .agileits_w3layouts_banner_nav {
        position: inherit !important;
        margin-top: 0px;
        z-index: 0;
        right: 0px;
    }
    .nav-bar .fa-bars {
        z-index: 99999 !important;
    }
    .fa-bars::before {
        content: "";
    }
    .nav-bar .fa-bars {
        display: block;
        padding: 8px;
        color: #BEA46C;
        overflow: hidden;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        float: right;
        text-transform: uppercase;
        border: solid 1px;
        margin-top: 15px;
        margin-right: 5px;
    }
}
</style>


			<link rel='stylesheet' id='theme-styles-css'  href='<?php echo SITE_URL; ?>wnydiamonds/theme-styles.min5010.css?ver=4.9.8' type='text/css' media='all' />
			<link rel='stylesheet' id='theme-icons-css'  href='<?php echo SITE_URL; ?>wnydiamonds/theme-icons.min5010.css?ver=4.9.8' type='text/css' media='all' />
			<link rel='stylesheet' id='mk-style-css'  href='<?php echo SITE_URL; ?>wnydiamonds/style.css?ver=4.9.8' type='text/css' media='all' />
			<link rel='stylesheet' id='theme-dynamic-styles-css'  href='<?php echo SITE_URL; ?>wnydiamonds/custom.css?ver=4.9.8' type='text/css' media='all' />
			<link rel='stylesheet' id='js_composer_front-css'  href='<?php echo SITE_URL; ?>wnydiamonds/wp-content/plugins/js_composer_theme/assets/css/js_composer125b.css?ver=4.7.4' type='text/css' media='all' />
		<!--	<script type='text/javascript' src='<?php echo SITE_URL; ?>wnydiamonds/wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>-->
			<script type='text/javascript'>
/* 
				<![CDATA[ */
var CSP_DATA = {"siteUrl":"http:\/\/wnydiamonds.com\/","imgPath":"http:\/\/wnydiamonds.com\/wp-content\/plugins\/coming-soon-maintenance-mode-ready\/img\/","loader":"http:\/\/wnydiamonds.com\/wp-content\/plugins\/coming-soon-maintenance-mode-ready\/img\/loading-cube.gif","close":"http:\/\/wnydiamonds.com\/wp-content\/plugins\/coming-soon-maintenance-mode-ready\/img\/cross.gif","ajaxurl":"http:\/\/wnydiamonds.com\/wp-admin\/admin-ajax.php","animationSpeed":null,"siteLang":[],"options":{"mode":{"id":"1","code":"mode","value":"disable","label":"Plugin Mode","description":"Mode for Coming Soon Plugin","htmltype_id":"9","params":{"options":{"disable":"Disable","coming_soon":"Coming Soon Mode","maint_mode":"Maintenance Mode-Under Construction (HTTP 503)","redirect":"Redirect 301"}},"cat_id":"1","sort_order":"0","value_type":null,"htmltype":"selectbox","cat_label":"General"},"template":{"id":"2","code":"template","value":"csp_tpl_standard","label":"Template","description":"Your page Template","htmltype_id":"14","params":"","cat_id":"1","sort_order":"0","value_type":null,"htmltype":"block","cat_label":"General"}},"CSP_CODE":"csp","ball_loader":"http:\/\/wnydiamonds.com\/wp-content\/plugins\/coming-soon-maintenance-mode-ready\/img\/ajax-loader-ball.gif","ok_icon":"http:\/\/wnydiamonds.com\/wp-content\/plugins\/coming-soon-maintenance-mode-ready\/img\/ok-icon.png"};
/* ]]> */

			</script>
			<script type='text/javascript' src='<?php echo SITE_URL; ?>wnydiamonds/wp-content/themes/jupiter/js/head-scripts5010.js?ver=4.9.8'></script>
			<script type='text/javascript'>
							SG_POPUPS_QUEUE = [];
							SG_POPUP_DATA = [];
							SG_APP_POPUP_URL = '<?php echo SITE_URL; ?>wnydiamonds/wp-content/plugins/popup-builder/index.html';
							SG_POPUP_VERSION='2.676_1;';
							
							function sgAddEvent(element, eventName, fn) {
								if (element.addEventListener)
									element.addEventListener(eventName, fn, false);
								else if (element.attachEvent)
									element.attachEvent('on' + eventName, fn);
							}
						</script>
			<style type="text/css">.sg-popup-overlay-7,
					.sg-popup-content-7 {
						z-index: 9999 !important;
					}
					#sg-popup-content-wrapper-7 {
						padding: 0px !important;
					}</style>
			<script type='text/javascript'>SG_POPUP_DATA[7] ={"id":"7","title":"Enter to win $100 gift card","type":"image","effect":"sgpb-slideInUp","0":"width","1":"640px","height":"480px","delay":0,"duration":1,"2":"initialWidth","3":"300","initialHeight":"100","width":"640px","buttonDelayValue":0,"escKey":"on","isActiveStatus":"on","scrolling":"on","disable-page-scrolling":"on","scaling":"","reposition":"on","overlayClose":"on","reopenAfterSubmission":"","contentClick":"","content-click-behavior":"close","click-redirect-to-url":"","redirect-to-new-tab":"","opacity":"0.8","popup-background-opacity":"1","sgOverlayColor":"#ffffff","sg-content-background-color":"","popupFixed":"","fixedPostion":"","popup-dimension-mode":"responsiveMode","popup-responsive-dimension-measure":"auto","maxWidth":"700px","maxHeight":"","initialWidth":"300","closeButton":"on","theme":"colorbox1.css","sgTheme3BorderColor":"","sgTheme3BorderRadius":"0","onScrolling":"","inActivityStatus":"","inactivity-timout":"0","beforeScrolingPrsent":0,"forMobile":"","openMobile":"","repeatPopup":"on","popup-appear-number-limit":"1","save-cookie-page-level":"","autoClosePopup":"","countryStatus":"","showAllPages":"all","allPagesStatus":"","allPostsStatus":"","allCustomPostsStatus":"","allSelectedPages":"","showAllPosts":"all","showAllCustomPosts":"all","allSelectedPosts":"","allSelectedCustomPosts":"","posts-all-categories":"","all-custom-posts":"","sg-user-status":"","loggedin-user":"true","popup-timer-status":"","popup-schedule-status":"","popup-start-timer":"Mar 15 18 15:51","popup-finish-timer":"","schedule-start-weeks":"","schedule-start-time":"15:51","schedule-end-time":"","allowCountries":"","countryName":"","countryIso":"","disablePopup":"","disablePopupOverlay":"","popupClosingTimer":"","yesButtonLabel":"","noButtonLabel":"","restrictionUrl":"","yesButtonBackgroundColor":"","noButtonBackgroundColor":"","yesButtonTextColor":"","noButtonTextColor":"","yesButtonRadius":0,"noButtonRadius":0,"sgRestrictionExpirationTime":0,"restrictionCookeSavingLevel":"","pushToBottom":"","onceExpiresTime":"7","sgOverlayCustomClasss":"sg-popup-overlay","sgContentCustomClasss":"sg-popup-content","popup-z-index":"9999","popup-content-padding":"","theme-close-text":"Close","socialButtons":"{\u0022sgTwitterStatus\u0022:\u0022\u0022,\u0022sgFbStatus\u0022:\u0022\u0022,\u0022sgEmailStatus\u0022:\u0022\u0022,\u0022sgLinkedinStatus\u0022:\u0022\u0022,\u0022sgGoogleStatus\u0022:\u0022\u0022,\u0022sgPinterestStatus\u0022:\u0022\u0022,\u0022pushToBottom\u0022:\u0022\u0022}","socialOptions":"{\u0022sgSocialTheme\u0022:\u0022\u0022,\u0022sgSocialButtonsSize\u0022:\u0022\u0022,\u0022sgSocialLabel\u0022:\u0022\u0022,\u0022sgSocialShareCount\u0022:\u0022\u0022,\u0022sgRoundButton\u0022:\u0022\u0022,\u0022fbShareLabel\u0022:\u0022\u0022,\u0022lindkinLabel\u0022:\u0022\u0022,\u0022sgShareUrl\u0022:null,\u0022shareUrlType\u0022:\u0022\u0022,\u0022googLelabel\u0022:\u0022\u0022,\u0022twitterLabel\u0022:\u0022\u0022,\u0022pinterestLabel\u0022:\u0022\u0022,\u0022sgMailSubject\u0022:\u0022\u0022,\u0022sgMailLable\u0022:\u0022\u0022}","countdownOptions":"{\u0022pushToBottom\u0022:\u0022\u0022,\u0022countdownNumbersBgColor\u0022:\u0022\u0022,\u0022countdownNumbersTextColor\u0022:\u0022\u0022,\u0022sg-due-date\u0022:\u0022\u0022,\u0022countdown-position\u0022:\u0022\u0022,\u0022counts-language\u0022:\u0022\u0022,\u0022sg-time-zone\u0022:\u0022\u0022,\u0022sg-countdown-type\u0022:\u0022\u0022,\u0022countdown-autoclose\u0022:\u0022\u0022}","exitIntentOptions":"{\u0022exit-intent-type\u0022:\u0022\u0022,\u0022exit-intent-expire-time\u0022:\u0022\u0022,\u0022exit-intent-alert\u0022:\u0022\u0022}","videoOptions":"{\u0022video-autoplay\u0022:\u0022\u0022}","fblikeOptions":"{\u0022fblike-like-url\u0022:null,\u0022fblike-layout\u0022:\u0022\u0022,\u0022fblike-dont-show-share-button\u0022:\u0022\u0022,\u0022fblike-close-popup-after-like\u0022:\u0022\u0022}","repetitivePopup":"","repetitivePopupPeriod":"","randomPopup":"","popupOpenSound":"","popupOpenSoundFile":"http:\/\/wnydiamonds.com\/wp-content\/plugins\/popup-builder\/files\/lib\/popupOpenSound.wav","popupContentBgImage":"","popupContentBgImageUrl":"","popupContentBackgroundSize":"","popupContentBackgroundRepeat":"","image":"http:\/\/wnydiamonds.com\/wp-content\/uploads\/2018\/03\/diamond-1.jpg","customEvent":"0"};</script>
			<script type="text/javascript">

			sgAddEvent(window, 'load',function() {
				var sgPoupFrontendObj = new SGPopup();
				sgPoupFrontendObj.popupOpenById(7)
			});
		</script>
			<script type="text/javascript">
(function(url){
	if(/(?:Chrome\/26\.0\.1410\.63 Safari\/537\.31|WordfenceTestMonBot)/.test(navigator.userAgent)){ return; }
	var addEvent = function(evt, handler) {
		if (window.addEventListener) {
			document.addEventListener(evt, handler, false);
		} else if (window.attachEvent) {
			document.attachEvent('on' + evt, handler);
		}
	};
	var removeEvent = function(evt, handler) {
		if (window.removeEventListener) {
			document.removeEventListener(evt, handler, false);
		} else if (window.detachEvent) {
			document.detachEvent('on' + evt, handler);
		}
	};
	var evts = 'contextmenu dblclick drag dragend dragenter dragleave dragover dragstart drop keydown keypress keyup mousedown mousemove mouseout mouseover mouseup mousewheel scroll'.split(' ');
	var logHuman = function() {
		var wfscr = document.createElement('script');
		wfscr.type = 'text/javascript';
		wfscr.async = true;
		wfscr.src = url + '&r=' + Math.random();
		(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(wfscr);
		for (var i = 0; i < evts.length; i++) {
			removeEvent(evts[i], logHuman);
		}
	};
	for (var i = 0; i < evts.length; i++) {
		addEvent(evts[i], logHuman);
	}
})('index1ab1.html?wordfence_lh=1&amp;hid=13DE108982552BEBA357EFC3402DEFDF');

			</script>
			<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
			<meta name="generator" content="Powered by Visual Composer - drag and drop page builder for WordPress."/>
			<!--[if lte IE 9]>
			<link rel="stylesheet" type="text/css" href="http://wnydiamonds.com/wp-content/plugins/js_composer_theme/assets/css/vc_lte_ie9.css" media="screen">
				<![endif]-->
				<!--[if IE  8]>
				<link rel="stylesheet" type="text/css" href="http://wnydiamonds.com/wp-content/plugins/js_composer_theme/assets/css/vc-ie8.css" media="screen">
					<![endif]-->
					<meta name="generator" content="Powered by Slider Revolution 5.0.9 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
					<meta name="generator" content="Jupiter Child Theme 4.4" />
					<noscript>
						<style> .wpb_animate_when_almost_visible { opacity: 1; }</style>
					</noscript>
				</head>
				<body class="home page-template-default page page-id-8  wpb-js-composer js-comp-ver-4.7.4 vc_responsive" data-backText="Back" data-vm-anim="1" itemscope="itemscope" itemtype="https://schema.org/WebPage" data-adminbar="">
					<div id="mk-boxed-layout">
						<div id="mk-theme-container" class="mk-transparent-header" >
							<header id="mk-header" data-height="90" data-hover-style="5" data-transparent-skin="light" data-header-style="1" data-sticky-height="55" data-sticky-style="slide" data-sticky-offset="header" class="header-style-1 header-align-left header-toolbar-false sticky-style-slide  mk-background-stretch boxed-header transparent-header light-header-skin remove-header-bg-true" role="banner" itemscope="itemscope" itemtype="https://schema.org/WPHeader" >
								<div class="clearboth"></div>
								<div class="mk-header-padding-wrapper"></div>
								<div class="clearboth"></div>
								<div class="mk-zindex-fix"></div>
								<div class="clearboth"></div>
								<form class="responsive-searchform" method="get" style="display:none;" action="http://wnydiamonds.com/">
									<input type="text" class="text-input" value="" name="s" id="s" placeholder="Search.." />
									<i class="mk-icon-search">
										<input value="" type="submit" />
									</i>
								</form>
							</header>
							<div id="theme-page" role="main" itemprop="mainContentOfPage" >
								<div class="mk-main-wrapper-holder">
									<div id="mk-page-id-8" class="theme-page-wrapper mk-main-wrapper full-layout no-padding mk-grid vc_row-fluid">
										<div class="theme-content no-padding" itemprop="mainContentOfPage">
											<div class="clearboth"></div>
										</div>
									</div>
								</div>
								<div id="mk-page-section-5b69e0052fdbe" data-intro-effect="false" class="full-width-5b69e0052fdbe  full-height-false mk-page-section self-hosted mk-blur-parent mk-shortcode  " >
									<div style="background-color:#eeeeee;opacity:0.15; -ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=15)';" class="mk-video-color-mask"></div>
									<div class="mk-section-video">
										<video poster="#" muted="muted" preload="auto" loop="true" autoplay="true" style="opacity:0;">
											<source type="video/mp4" src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2015/11/DiamondBanner_V2.mp4" />
										</video>
										
									</div>
									<div class="background-clipper"></div>
									<div class="mk-grid vc_row-fluid page-section-content">
										<div class="mk-padding-wrapper">
											<div style="" class="vc_col-sm-12 wpb_column column_container ">
												<div class="mk-image-shortcode mk-shortcode   align-center simple-frame inside-image " style="max-width: 800px; margin-bottom:0px">
													<div class="mk-image-inner">
														<img class="lightbox-false" alt="" title="" src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2015/11/diamondcutters_logo.png" />
													</div>
													<div class="clearboth"></div>
												</div>
												<h2 style="font-size: 38px;text-align:center;color: #ffffff;font-style:normal;font-weight:bold;padding-top:40px;padding-bottom:40px; text-transform:uppercase;letter-spacing:1px;" id="fancy-title-5b69e005311e9" class="mk-shortcode mk-fancy-title fancy-title-align-center mk-force-responsive simple-style ">
													<span style="">DIAMOND CUTTERS OF WESTERN NEW YORK</span>
												</h2>
												<div class="clearboth"></div>
												<div class="mk-button-align center">
													<a href="<?php echo SITE_URL; ?>imagegallery" target="_self"  class="mk-button outline-btn-light button-5b69e005314f3 light savvy-dimension large pointed   ">
														<span>SEE OUR WORKS</span>
													</a>
												</div>
												<div id="ajax-5b69e005314f3" class="mk-dynamic-styles">
													<!--  .button-5b69e005314f3 { margin-bottom: 0px; margin-top: 0px; min-width: 0px !important; } -->
												</div>
											</div>
										</div>
										<div class="clearboth"></div>
									</div>
									<div class="clearboth"></div>
								</div>
								<div class="mk-main-wrapper-holder">
									<div class="theme-page-wrapper no-padding full-layout mk-grid vc_row-fluid row-fluid">
										<div class="theme-content no-padding">
											<div id="ajax-5b69e0052fdbe" class="mk-dynamic-styles">
												<!--  .full-width-5b69e0052fdbe { min-height:500px; padding:180px 0 0px; margin-bottom:0px; } #background-layer--5b69e0052fdbe { background-position:center center; background-repeat:repeat; ; } -->
											</div>
											<div class="clearboth"></div>
										</div>
									</div>
								</div>
								<div id="mk-page-section-5b69e0053177a" data-intro-effect="false" class="full-width-5b69e0053177a  full-height-false mk-page-section self-hosted mk-blur-parent mk-shortcode  " >
									<div class="mk-video-color-mask"></div>
									<div class="background-clipper"></div>
									<div class="mk-grid vc_row-fluid page-section-content">
										<div class="mk-padding-wrapper container">
											<div style="" class="vc_col-sm-12 wpb_column column_container ">
												<div class="clearboth"></div>
												<div class="mk-shortcode mk-padding-shortcode" style="height:50px"></div>
												<div class="clearboth"></div>
												<div class="wpb_row vc_inner vc_row  vc_row-fluid   attched-false vc_row-fluid">
													<div class="wpb_column vc_column_container vc_col-sm-6">
														<div class="wpb_wrapper">
															<div class="clearboth"></div>
															<div class="mk-shortcode mk-padding-shortcode" style="height:50px"></div>
															<div class="clearboth"></div>
															<h2 style="font-size: 24px;text-align:left;color: #3b3b3b;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:20px; text-transform:none;letter-spacing:0px;" id="fancy-title-5b69e00532e82" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style ">
																<span style="">
																	<strong>Diamond Cutters</strong> has the largest selection of loose diamonds in 
																	<strong>Western New York</strong>.
																</span>
															</h2>
															<div class="clearboth"></div>
															<h2 style="font-size: 22px;text-align:left;color: #484b66;font-style:inherit;font-weight:300;padding-top:0px;padding-bottom:20px; text-transform:none;letter-spacing:0px;" id="fancy-title-5b69e00532fa1" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style ">
																<span style="">Skip the retailer, Skip the wholesaler! Here you can buy right from the cutter!</span>
															</h2>
															<div class="clearboth"></div>
															<h2 style="font-size: 20px;text-align:left;color: #484b66;font-style:inherit;font-weight:300;padding-top:0px;padding-bottom:20px; text-transform:none;letter-spacing:0px;" id="fancy-title-5b69e005330af" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style ">
																<span style="">
																	<em>To go to a more direct source, you&#8217;ll need a miner&#8217;s hat.</em>
																</span>
															</h2>
															<div class="clearboth"></div>
														</div>
													</div>
													<div class="wpb_column vc_column_container vc_col-sm-6">
														<div class="wpb_wrapper">
															<div class="wpb_single_image wpb_content_element vc_align_left">
																<div class="wpb_wrapper">
																	<div class="vc_single_image-wrapper  ">
																		<img width="650" height="541" src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Imagine-Designs-Image-3.jpg" class="vc_single_image-img attachment-full" alt="" srcset="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Imagine-Designs-Image-3.jpg 650w, <?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Imagine-Designs-Image-3-300x250.jpg 300w" sizes="(max-width: 650px) 100vw, 650px" />
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="clearboth"></div>
												<div class="mk-shortcode mk-padding-shortcode" style="height:50px"></div>
												<div class="clearboth"></div>
											</div>
										</div>
										<div class="clearboth"></div>
									</div>
									<div class="clearboth"></div>
								</div>
								<div class="mk-main-wrapper-holder">
									<div class="theme-page-wrapper no-padding full-layout mk-grid vc_row-fluid row-fluid">
										<div class="theme-content no-padding">
											<div id="ajax-5b69e0053177a" class="mk-dynamic-styles">
												<!--  .full-width-5b69e0053177a { min-height:100px; padding:0px 0 10px; margin-bottom:0px; border:1px solid #3b3b3b;border-left:none;border-right:none; } #background-layer--5b69e0053177a { background-position:left top; background-repeat:repeat; ; } -->
											</div>
											<div class="clearboth"></div>
										</div>
									</div>
								</div>
								<div id="mk-page-section-5b69e00534734" data-intro-effect="false" class="full-width-5b69e00534734  full-height-false mk-page-section self-hosted mk-blur-parent mk-shortcode  " >
									<div class="mk-video-color-mask"></div>
									<div class="background-clipper"></div>
									<div class="mk-grid vc_row-fluid page-section-content">
										<div class="mk-padding-wrapper container">
											<div style="" class="column_container ">
												<h2 style="font-size: 25px;text-align:center;color: #ffffff;font-style:inherit;font-weight:bold;padding-top:15px;padding-bottom:10px; text-transform:uppercase;letter-spacing:2px;" id="fancy-title-5b69e00534cc8" class="mk-shortcode mk-fancy-title fancy-title-align-left simple-style ">
													<span style="">Exclusive Brands! You can’t get these names anywhere else in Buffalo.</span>
												</h2>
												<div class="clearboth"></div>
											</div>
										</div>
										<div class="clearboth"></div>
									</div>
									<div class="clearboth"></div>
								</div>
								<div class="mk-main-wrapper-holder">
									<div class="theme-page-wrapper no-padding full-layout mk-grid vc_row-fluid row-fluid">
										<div class="theme-content no-padding">
											<div id="ajax-5b69e00534734" class="mk-dynamic-styles">
												<!--  .full-width-5b69e00534734 { min-height:0px; padding:40px 0 30px; margin-bottom:0px; background-color:#495366; } #background-layer--5b69e00534734 { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e00534734 .mk-fancy-title.pattern-style span, .full-width-5b69e00534734 .mk-blog-view-all { background-color: #495366 !important; }-->
											</div>
										</div>
									</div>
								</div>
								<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-true  attched-false vc_row-fluid">
									<div style="" class="vc_col-sm-12 wpb_column column_container ">
										<div style="padding: 0px 0 0px;" class="mk-divider mk-shortcode divider_full_width center thin_solid ">
											<div class="divider-inner" style="border-top-color:#e5e5e5;border-top-width:1px;"></div>
										</div>
										<div class="clearboth"></div>
									</div>
								</div>
								<div class="mk-main-wrapper-holder">
									<div class="theme-page-wrapper full-layout mk-grid vc_row-fluid no-padding">
										<div class="theme-content no-padding">
											<div class="clearboth"></div>
										</div>
									</div>
								</div>
								<div id="mk-page-section-5b69e00535c1a" data-intro-effect="false" class="full-width-5b69e00535c1a  full-height-false mk-page-section self-hosted mk-blur-parent mk-shortcode  " >
									<div class="mk-video-color-mask"></div>
									<div class="background-clipper"></div>
									<div class="mk-grid vc_row-fluid page-section-content">
										<div class="mk-padding-wrapper">
											<div style="" class="vc_col-sm-12 wpb_column column_container ">
												<h2 style="font-size: 25px;text-align:center;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:uppercase;letter-spacing:7px;" id="fancy-title-5b69e005361a2" class="mk-shortcode mk-fancy-title fancy-title-align-center simple-style ">
													<span style="">CUT. COLOR. CARAT. CLARITY</span>
												</h2>
												<div class="clearboth"></div>
												<div style="text-align: left;" class="mk-text-block  true">
													<p style="text-align: center;">A DIAMOND’S VALUE IS DETERMINED USING ALL OF THE 4CS</p>
													<div class="clearboth"></div>
												</div>
												<div style="padding: 24px 0 50px; width: 35px " class="mk-divider mk-shortcode custom-width center thin_solid ">
													<div class="divider-inner" style="border-top-color:#444444;border-top-width:3px;"></div>
												</div>
												<div class="clearboth"></div>
											</div>
										</div>
										<div class="clearboth"></div>
									</div>
									<div class="clearboth"></div>
								</div>
								<div class="mk-main-wrapper-holder">
									<div class="theme-page-wrapper no-padding full-layout mk-grid vc_row-fluid row-fluid">
										<div class="theme-content no-padding">
											<div id="ajax-5b69e00535c1a" class="mk-dynamic-styles">
												<!--  .full-width-5b69e00535c1a { min-height:100px; padding:60px 0 0px; margin-bottom:0px; background-color:#fafafa; border:1px solid #e5e5e5;border-left:none;border-right:none; } #background-layer--5b69e00535c1a { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e00535c1a .mk-fancy-title.pattern-style span, .full-width-5b69e00535c1a .mk-blog-view-all { background-color: #fafafa !important; }-->
											</div>
											<div class="clearboth"></div>
										</div>
									</div>
								</div>
								<div id="mk-page-section-5b69e00536835" data-intro-effect="false" class="full-width-5b69e00536835  full-height-false mk-page-section self-hosted mk-blur-parent mk-shortcode  " >
									<div class="mk-video-color-mask"></div>
									<div class="background-clipper"></div>
									<div class="mk-grid vc_row-fluid page-section-content">
										<div class="mk-padding-wrapper">
											<div style="" class="vc_col-sm-3 wpb_column column_container ">
												<div class="mk-flipbox-container flip-horizontal " style="height:1px; height:300px">
													<div class="mk-flipbox-flipper">
														<div class="mk-flipbox-front " style="" >
															<div class="mk-flipbox-content">
																<div class="front-icon">
																	<img src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Novell-Image-3.jpg" alt="Cut" />
																</div>
																<div class="front-title" style="font-weight:bold; font-size:24px; color:#495366;">Cut</div>
																<div class="front-desc" style="font-size:20px; "></div>
															</div>
														</div>
														<div class="mk-flipbox-back" style="">
															<div class="mk-flipbox-content">
																<div class="back-title" style="font-weight:bold; font-size:20px; color:#495366;">Cut</div>
																<div class="back-desc" style="font-size:20px;  ">The better the diamond has been cut the better the make, thus the more beautiful the diamond will appear.</div>
																<div class="mk-button-align center">
																	<a href="<?php echo SITE_URL; ?>fourcs/cut/" target="_self"  class="mk-button dark button-5b69e00537138 light-color  flat-dimension small pointed   back-button">
																		<span>Learn More</span>
																	</a>
																</div>
																<div id="ajax-5b69e00537138" class="mk-dynamic-styles">
																	<!--  .button-5b69e00537138 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e00537138 { background-color:#495366; } .mk-button.button-5b69e00537138.flat-dimension:hover { background-color:#ced4db !important; } -->
																</div>
															</div>
														</div>
														<div class="clearboth"></div>
													</div>
												</div>
											</div>
											<div style="" class="vc_col-sm-3 wpb_column column_container ">
												<div class="mk-flipbox-container flip-horizontal " style="height:1px; height:300px">
													<div class="mk-flipbox-flipper">
														<div class="mk-flipbox-front " style="" >
															<div class="mk-flipbox-content">
																<div class="front-icon">
																	<img src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Gregg-Ruth-Image-2.jpg" alt="Color" />
																</div>
																<div class="front-title" style="font-weight:bold; font-size:24px; color:#495366;">Color</div>
																<div class="front-desc" style="font-size:20px; "></div>
															</div>
														</div>
														<div class="mk-flipbox-back" style="">
															<div class="mk-flipbox-content">
																<div class="back-title" style="font-weight:bold; font-size:20px; color:#495366;">Color</div>
																<div class="back-desc" style="font-size:20px;  ">The color of a diamond ranges from colorless to specific fancy colors. Including Pink, Blue, Red, and Green.</div>
																<div class="mk-button-align center">
																	<a href="<?php echo SITE_URL; ?>fourcs/color" target="_self"  class="mk-button dark button-5b69e0053778f light-color  flat-dimension small pointed   back-button">
																		<span>Learn More</span>
																	</a>
																</div>
																<div id="ajax-5b69e0053778f" class="mk-dynamic-styles">
																	<!--  .button-5b69e0053778f { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e0053778f { background-color:#495366; } .mk-button.button-5b69e0053778f.flat-dimension:hover { background-color:#ced4db !important; } -->
																</div>
															</div>
														</div>
														<div class="clearboth"></div>
													</div>
												</div>
											</div>
											<div style="" class="vc_col-sm-3 wpb_column column_container ">
												<div class="mk-flipbox-container flip-horizontal " style="height:1px; height:300px">
													<div class="mk-flipbox-flipper">
														<div class="mk-flipbox-front " style="" >
															<div class="mk-flipbox-content">
																<div class="front-icon">
																	<img src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Imagine-Designs-Image-5.jpg" alt="Carat" />
																</div>
																<div class="front-title" style="font-weight:bold; font-size:24px; color:#495366;">Carat</div>
																<div class="front-desc" style="font-size:20px; "></div>
															</div>
														</div>
														<div class="mk-flipbox-back" style="">
															<div class="mk-flipbox-content">
																<div class="back-title" style="font-weight:bold; font-size:20px; color:#495366;">Carat</div>
																<div class="back-desc" style="font-size:20px;  ">The carat measurement of a diamond is often confused with the size of the diamond, when in reality it is the weight.</div>
																<div class="mk-button-align center">
																	<a href="<?php echo SITE_URL; ?>fourcs/carat" target="_self"  class="mk-button dark button-5b69e00537de2 light-color  flat-dimension small pointed   back-button">
																		<span>Learn More</span>
																	</a>
																</div>
																<div id="ajax-5b69e00537de2" class="mk-dynamic-styles">
																	<!--  .button-5b69e00537de2 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e00537de2 { background-color:#495366; } .mk-button.button-5b69e00537de2.flat-dimension:hover { background-color:#ced4db !important; } -->
																</div>
															</div>
														</div>
														<div class="clearboth"></div>
													</div>
												</div>
											</div>
											<div style="" class="vc_col-sm-3 wpb_column column_container ">
												<div class="mk-flipbox-container flip-horizontal " style="height:1px; height:300px">
													<div class="mk-flipbox-flipper">
														<div class="mk-flipbox-front " style="" >
															<div class="mk-flipbox-content">
																<div class="front-icon">
																	<img src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Prima-Image-2.jpg" alt="Clarity" />
																</div>
																<div class="front-title" style="font-weight:bold; font-size:24px; color:#495366;">Clarity</div>
																<div class="front-desc" style="font-size:20px; "></div>
															</div>
														</div>
														<div class="mk-flipbox-back" style="">
															<div class="mk-flipbox-content">
																<div class="back-title" style="font-weight:bold; font-size:20px; color:#495366;">Clarity</div>
																<div class="back-desc" style="font-size:20px;  ">The clarity of a diamond is the measurement and location of inclusions or flaws within the diamond.</div>
																<div class="mk-button-align center">
																	<a href="<?php echo SITE_URL; ?>fourcs/clarity" target="_self"  class="mk-button dark button-5b69e00538421 light-color  flat-dimension small pointed   back-button">
																		<span>Learn More</span>
																	</a>
																</div>
																<div id="ajax-5b69e00538421" class="mk-dynamic-styles">
																	<!--  .button-5b69e00538421 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e00538421 { background-color:#495366; } .mk-button.button-5b69e00538421.flat-dimension:hover { background-color:#ced4db !important; } -->
																</div>
															</div>
														</div>
														<div class="clearboth"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="clearboth"></div>
									</div>
									<div class="clearboth"></div>
								</div>
								<div class="mk-main-wrapper-holder">
									<div class="theme-page-wrapper no-padding full-layout mk-grid vc_row-fluid row-fluid">
										<div class="theme-content no-padding">
											<div id="ajax-5b69e00536835" class="mk-dynamic-styles">
												<!--  .full-width-5b69e00536835 { min-height:100px; padding:20px 0 80px; margin-bottom:0px; } #background-layer--5b69e00536835 { background-position:left top; background-repeat:repeat; ; } -->
											</div>
											<div class="clearboth"></div>
										</div>
									</div>
								</div>
								<div id="mk-page-section-5b69e005387c2" data-intro-effect="false" class="full-width-5b69e005387c2  full-height-false mk-page-section self-hosted mk-blur-parent mk-shortcode  " >
									<div class="mk-video-color-mask"></div>
									<div class="background-clipper"></div>
									<div class="mk-grid vc_row-fluid page-section-content">
										<div class="mk-padding-wrapper">
											<div style="" class="vc_col-sm-12 wpb_column column_container ">
												<h2 style="font-size: 25px;text-align:center;color: #3d3d3d;font-style:inherit;font-weight:bold;padding-top:0px;padding-bottom:0px; text-transform:uppercase;letter-spacing:7px;" id="fancy-title-5b69e00538d17" class="mk-shortcode mk-fancy-title fancy-title-align-center simple-style ">
													<span style="">DREAM &amp; CREATE</span>
												</h2>
												<div class="clearboth"></div>
												<div style="padding: 24px 0 50px; width: 35px " class="mk-divider mk-shortcode custom-width center thin_solid ">
													<div class="divider-inner" style="border-top-color:#444444;border-top-width:3px;"></div>
												</div>
												<div class="clearboth"></div>
											</div>
										</div>
										<div class="clearboth"></div>
									</div>
									<div class="clearboth"></div>
								</div>
								<div class="mk-main-wrapper-holder">
									<div class="theme-page-wrapper no-padding full-layout mk-grid vc_row-fluid row-fluid">
										<div class="theme-content no-padding">
											<div id="ajax-5b69e005387c2" class="mk-dynamic-styles">
												<!--  .full-width-5b69e005387c2 { min-height:100px; padding:60px 0 0px; margin-bottom:0px; background-color:#fafafa; border:1px solid #e5e5e5;border-left:none;border-right:none; } #background-layer--5b69e005387c2 { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e005387c2 .mk-fancy-title.pattern-style span, .full-width-5b69e005387c2 .mk-blog-view-all { background-color: #fafafa !important; }-->
											</div>
										</div>
									</div>
								</div>
								<div class="wpb_row vc_row  vc_row-fluid  mk-fullwidth-true  attched-false vc_row-fluid">
									<div style="" class="vc_col-sm-12 wpb_column column_container ">
										<div class="loop-main-wrapper">
											<section id="gallery-loop-5b69e005397a2" data-uniqid="5b69e005397a2" data-style="gallery" style="margin-bottom:20px" class="mk-gallery-shortcode mk-theme-loop  masnory-gallery ">
												<article class=" mk-isotop-item gallery-5b69e005397a2 mk-gallery-item hover-slow_zoom simple-frame">
													<div class="item-holder" style="margin:0 0px 0px">
														<div class="image-hover-overlay" ></div>
														<a href="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Coast-Diamond-Image-3.jpg" alt="" title="" data-fancybox-group="gallery-group-5b69e005397a2" class="mk-lightbox  mk-image-shortcode-lightbox">
															<i class="mk-jupiter-icon-plus-circle"></i>
														</a>
														<span class="gallery-inner">
															<img alt="" title="" src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/bfi_thumb/Coast-Diamond-Image-3-mid0mlwkr3dfn2vqnbtzcx7pkrdmbssm6is36sdt3c.jpg" />
														</span>
													</div>
												</article>
												<article class=" mk-isotop-item gallery-5b69e005397a2 mk-gallery-item hover-slow_zoom simple-frame">
													<div class="item-holder" style="margin:0 0px 0px">
														<div class="image-hover-overlay" ></div>
														<a href="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Benchmark-Image-1.jpg" alt="" title="" data-fancybox-group="gallery-group-5b69e005397a2" class="mk-lightbox  mk-image-shortcode-lightbox">
															<i class="mk-jupiter-icon-plus-circle"></i>
														</a>
														<span class="gallery-inner">
															<img alt="" title="" src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/bfi_thumb/Benchmark-Image-1-mid0m4zhc2q9u3kbe4ip41hevtp0h8xg471cjt2w7c.jpg" />
														</span>
													</div>
												</article>
												<article class=" mk-isotop-item gallery-5b69e005397a2 mk-gallery-item hover-slow_zoom gallery-mansory-large simple-frame">
													<div class="item-holder" style="margin:0 0px 0px">
														<div class="image-hover-overlay" ></div>
														<a href="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Martin-Flyer-Image-5.gif" alt="" title="" data-fancybox-group="gallery-group-5b69e005397a2" class="mk-lightbox  mk-image-shortcode-lightbox">
															<i class="mk-jupiter-icon-plus-circle"></i>
														</a>
														<span class="gallery-inner">
															<img alt="" title="" src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/bfi_thumb/Martin-Flyer-Image-5-mid0pbnshv396ixqsi36k8jnctzskbkp7yml3kcv48.gif" />
														</span>
													</div>
												</article>
												<article class=" mk-isotop-item gallery-5b69e005397a2 mk-gallery-item hover-slow_zoom simple-frame">
													<div class="item-holder" style="margin:0 0px 0px">
														<div class="image-hover-overlay" ></div>
														<a href="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Vanna-K-Image-5.jpg" alt="" title="" data-fancybox-group="gallery-group-5b69e005397a2" class="mk-lightbox  mk-image-shortcode-lightbox">
															<i class="mk-jupiter-icon-plus-circle"></i>
														</a>
														<span class="gallery-inner">
															<img alt="" title="" src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/bfi_thumb/Vanna-K-Image-5-mid0s1f08mt2pyzqxocdrjvl4wlysucs9eh30cbx54.jpg" />
														</span>
													</div>
												</article>
												<article class=" mk-isotop-item gallery-5b69e005397a2 mk-gallery-item hover-slow_zoom simple-frame">
													<div class="item-holder" style="margin:0 0px 0px">
														<div class="image-hover-overlay" ></div>
														<a href="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/2014/08/Imagine-Designs-Image-1.jpg" alt="" title="" data-fancybox-group="gallery-group-5b69e005397a2" class="mk-lightbox  mk-image-shortcode-lightbox">
															<i class="mk-jupiter-icon-plus-circle"></i>
														</a>
														<span class="gallery-inner">
															<img alt="" title="" src="<?php echo SITE_URL; ?>wnydiamonds/wp-content/uploads/bfi_thumb/Imagine-Designs-Image-1-mid0orx6icc8epqezrk0lviyvqp32oec58xe0r64qw.jpg" />
														</span>
													</div>
												</article>
												<div class="clearboth"></div>
											</section>
											<div class="mk-pagination-holder">
												<a class="mk-loadmore-button" style="display:none;" href="#">
													<i class="mk-moon-loop-4"></i>
													<i class="mk-moon-arrow-down-4"></i>Load More
												</a>
											</div>
											<div class="mk-preloader"></div>
										</div>
									</div>
								</div>
								
								<div class="mk-main-wrapper-holder">
									<div class="theme-page-wrapper no-padding full-layout mk-grid vc_row-fluid row-fluid">
										<div class="theme-content no-padding">
											<div id="ajax-5b69e0053d9be" class="mk-dynamic-styles">
												<!--  .full-width-5b69e0053d9be { min-height:0px; padding:40px 0 30px; margin-bottom:0px; background-color:#3b3b3b; } #background-layer--5b69e0053d9be { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e0053d9be .mk-fancy-title.pattern-style span, .full-width-5b69e0053d9be .mk-blog-view-all { background-color: #3b3b3b !important; }-->
											</div>
											<div class="clearboth"></div>
										</div>
										<div class="clearboth"></div>
									</div>
									<div class="clearboth"></div>
								</div>
							</div>
						</div>
					</div>
					<!--
					<a href="#" class="mk-go-top">
						<i class="mk-icon-chevron-up"></i>
					</a>-->
					<!-- Apply custom styles before runing other javascripts as they 
	might be based on those styles as well -->
					<script type="text/javascript">
		var dynamic_styles = ' .button-5b69e005314f3 { margin-bottom: 0px; margin-top: 0px; min-width: 0px !important; } .full-width-5b69e0052fdbe { min-height:680px; padding:180px 0 0px; margin-bottom:0px; } #background-layer--5b69e0052fdbe { background-position:center center; background-repeat:repeat; ; } .full-width-5b69e0053177a { min-height:100px; padding:0px 0 10px; margin-bottom:0px; border:1px solid #3b3b3b;border-left:none;border-right:none; } #background-layer--5b69e0053177a { background-position:left top; background-repeat:repeat; ; } .button-5b69e00535122 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e00535122 { background-color:#c1c1c1; } .mk-button.button-5b69e00535122.flat-dimension:hover { background-color:#26282b !important; } .full-width-5b69e00534734 { min-height:0px; padding:40px 0 30px; margin-bottom:0px; background-color:#495366; } #background-layer--5b69e00534734 { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e00534734 .mk-fancy-title.pattern-style span, .full-width-5b69e00534734 .mk-blog-view-all { background-color: #495366 !important; } .full-width-5b69e00535c1a { min-height:100px; padding:60px 0 0px; margin-bottom:0px; background-color:#fafafa; border:1px solid #e5e5e5;border-left:none;border-right:none; } #background-layer--5b69e00535c1a { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e00535c1a .mk-fancy-title.pattern-style span, .full-width-5b69e00535c1a .mk-blog-view-all { background-color: #fafafa !important; } .button-5b69e00537138 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e00537138 { background-color:#495366; } .mk-button.button-5b69e00537138.flat-dimension:hover { background-color:#ced4db !important; } .button-5b69e0053778f { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e0053778f { background-color:#495366; } .mk-button.button-5b69e0053778f.flat-dimension:hover { background-color:#ced4db !important; } .button-5b69e00537de2 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e00537de2 { background-color:#495366; } .mk-button.button-5b69e00537de2.flat-dimension:hover { background-color:#ced4db !important; } .button-5b69e00538421 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e00538421 { background-color:#495366; } .mk-button.button-5b69e00538421.flat-dimension:hover { background-color:#ced4db !important; } .full-width-5b69e00536835 { min-height:100px; padding:20px 0 80px; margin-bottom:0px; } #background-layer--5b69e00536835 { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e005387c2 { min-height:100px; padding:60px 0 0px; margin-bottom:0px; background-color:#fafafa; border:1px solid #e5e5e5;border-left:none;border-right:none; } #background-layer--5b69e005387c2 { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e005387c2 .mk-fancy-title.pattern-style span, .full-width-5b69e005387c2 .mk-blog-view-all { background-color: #fafafa !important; } .button-5b69e0053e309 { margin-bottom: 15px; margin-top: 0px; min-width: 0px !important; } .button-5b69e0053e309 { background-color:#bec5bd; } .mk-button.button-5b69e0053e309.flat-dimension:hover { background-color:#dbdbdb !important; } .full-width-5b69e0053d9be { min-height:0px; padding:40px 0 30px; margin-bottom:0px; background-color:#3b3b3b; } #background-layer--5b69e0053d9be { background-position:left top; background-repeat:repeat; ; } .full-width-5b69e0053d9be .mk-fancy-title.pattern-style span, .full-width-5b69e0053d9be .mk-blog-view-all { background-color: #3b3b3b !important; }';
		var dynamic_styles_ids = (["ajax-5b69e005314f3","ajax-5b69e0052fdbe","ajax-5b69e0053177a","ajax-5b69e00535122","ajax-5b69e00534734","ajax-5b69e00535c1a","ajax-5b69e00537138","ajax-5b69e0053778f","ajax-5b69e00537de2","ajax-5b69e00538421","ajax-5b69e00536835","ajax-5b69e005387c2","ajax-5b69e0053e309","ajax-5b69e0053d9be"] != null) ? ["ajax-5b69e005314f3","ajax-5b69e0052fdbe","ajax-5b69e0053177a","ajax-5b69e00535122","ajax-5b69e00534734","ajax-5b69e00535c1a","ajax-5b69e00537138","ajax-5b69e0053778f","ajax-5b69e00537de2","ajax-5b69e00538421","ajax-5b69e00536835","ajax-5b69e005387c2","ajax-5b69e0053e309","ajax-5b69e0053d9be"] : [];

		var styleTag = document.createElement('style'),
			head = document.getElementsByTagName('head')[0];

		styleTag.type = 'text/css';
		styleTag.setAttribute('data-ajax', '');
		styleTag.innerHTML = dynamic_styles;
		head.appendChild(styleTag);
	</script>
	<!-- Custom styles applied -->
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script type='text/javascript' src='<?php echo SITE_URL; ?>wnydiamonds/wp-content/themes/jupiter/js/min/scripts-vendors-ck5010.js?ver=4.9.8'></script>
<style>
    .vc_row{
        padding:0px;
        margin:0px;
    }
</style>


<style>
#container {
  max-width: 1000px;
  margin: 0 auto;
  background: #EEE;
}

#fvpp-blackout {
  display: none;
  z-index: 499;
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: #000;
  opacity: 0.5;
}

#my-welcome-message {
  display: none;
  z-index: 9999;
  position: fixed;
  width: 400px;
  left: 35%;
  top: 20%;
  padding: 0px;
  font-family: Calibri, Arial, sans-serif;
  background: #FFF;
}

#fvpp-close {
  position: absolute;
  top: 10px;
  right: 20px;
  cursor: pointer;
}

#fvpp-dialog h2 {
  font-size: 2em;
  margin: 0;
}

#fvpp-dialog p { margin: 0; }
</style>

<div id="my-welcome-message">
  <p><img alt="" title="" src="<?php echo SITE_URL; ?>images/diamond-1.png" style="width:400px;height:500px;"/></p>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="<?php echo SITE_URL; ?>js/jquery.firstVisitPopup.js"></script> 
<script>
	$(function () {
		$('#my-welcome-message').firstVisitPopup({
			cookieName : 'homepage',
			showAgainSelector: '#show-message'
		});
	});
</script>