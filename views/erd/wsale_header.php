<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ( !empty( $title ) ? $title . ' | Godstone Diamonds' : 'Welcome to ' . getadmin_contact_info('sites_title') ); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php echo (isset($meta_tags) && !empty($meta_tags)) ? $meta_tags : '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'; ?>
		<meta name="google-site-verification" content="Epnk9IwQR1i8rkAuuRMxoKDTCbTgdl2g8u5nzLr6jqk" />
		<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL?>css/font-awesome.min.css"/>
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/ruman.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-style.css" rel="stylesheet" />
		<?php
		$engagmethod = $this->router->fetch_method();
		$contr_class = $this->router->fetch_class();
		$home_page_class = ( ( $contr_class == 'diamonds' && $engagmethod == 'index' ) ? 'home_page' : '' );
		$classlist = array('testengagementrings', 'qualitygoldrings', 'stullerygoldrings', 'davidsternrings', 'braceletsection');
		$methodlist = array('quality_ring_detail', 'stuller_ring_details', 'stern_collection', 'jewelry_ring_detail');
		echo '<link type="text/css" href="'.SITE_URL.'css/site-body.css" rel="stylesheet" />';
		?>
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-page.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-menu.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/main.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/js-image-slider.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/tamal.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo SITE_URL?>css/tabs.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo SITE_URL?>css/whsale_styles.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo SITE_URL?>css/meanmenu_styles.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo SITE_URL?>css/steps_bar_section.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo SITE_URL; ?>css/wh_styles.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap.css"  type="text/css"/>
		<link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap-responsive.css">
		<link href="<?php echo SITE_URL; ?>css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo SITE_URL?>css/IE7styles.css" /><![endif]--> 
		<!--[if  IE 8]>
		<link rel="stylesheet" type="text/css"  href=<?php echo SITE_URL?>IE8styles.css"" />
		<![endif]-->
		<script type="text/javascript">
		var base_url = '<?php echo SITE_URL;?>';
		var BASE_URL = base_url;
		var base_link = '<?php echo SITE_URL;?>';
		</script>
		<script src="<?php echo SITE_URL;?>js/jquery-1.11.3.min.js"></script>
		<script src="<?php echo SITE_URL;?>js/jquery.popup.js"></script>
		<?php
		$print_js = '';
		$print_1 = '';
		$rturn = check_diamond_page();
		$mt = $this->router->fetch_method();
		$link_class = array('engagement');
		$method_list = array('choose_urdiamond');
		if( $rturn || $mt === 'diamond_detail'  || (isset($contr_class) && !empty($contr_class))) {
			$print_js .= '<link type="text/css" href="'.SITE_URL.'css/jquery.popup.css" rel="stylesheet" />';
			$print_js .= '<script src="'.SITE_URL.'js/jquery.popupoverlay.js"></script>';
			$print_js .= '<script>
			$(document).ready(function () {
				$.fn.popup.defaults.pagecontainer = \'.container\'
			});
			</script>';
			echo $print_js;
		}else{
			if( in_array($engagmethod, $method_list) || ( $contr_class == 'diamondslist' && $mt == 'search' && $details_search != ''  ) ) {
				$print_1 .= '<script src="'.config_item('base_url').'js/jquery.js" type="text/javascript"></script>';
			}
			$print_1 .= '<link type="text/css" href="'.SITE_URL.'css/jquery.popup.css" rel="stylesheet" />'. '<script src="'.SITE_URL.'js/jquery.popupoverlay.js"></script>';
			echo $print_1;
		}
		?>
		<script src="<?php echo config_item('base_url');?>slider/js-image-slider.js" type="text/javascript"></script>
		<script src="<?php echo config_item('base_url') ?>js/facebox.js" type="text/javascript"></script>
		<script src="<?php echo SITE_URL?>js/jquery.corner.js" type="text/javascript"></script>
		<script src="<?php echo SITE_URL?>js/function.js" type="text/javascript"></script>
		<script src="<?php echo SITE_URL?>js/t.js" type="text/javascript"></script>
		<script src="<?php echo SITE_URL?>js/r.js" type="text/javascript"></script>
		<script type="text/javascript">
		var item_type ='<?= isset($itemtype)?$itemtype:''?>';
		$(document).ready(function() { console.log('item_type=>'+item_type);
			$('td#body').removeClass("content");
			if(item_type.trim()!='' && !(item_type.trim()=='Rings' || item_type.trim()=='Ring')){
				$('p.ring').hide();
			}
			$('.btn_signup').click(function() {
				$('#subsc_email').val( $('#subscribe_email').val() );
			});
		});
		</script>
		<script src="<?php echo SITE_URL?>js/subsemail_function.js"></script>
		<?php echo isset($extraheader) ? $extraheader : '';?> 
		<script type="text/javascript" language="javascript">
		jQuery(document).ready(function() {
			<?php echo isset($onloadextraheader) ? $onloadextraheader : '';?>
			closetimer = 0;
			if(jQuery("#mainmenu")) {
				jQuery("#mainmenu b").mouseover(function() {
					clearTimeout(closetimer);
					if(this.className.indexOf("clicked") != -1) {
						jQuery(this).parent().next().slideUp(300);
						jQuery(this).removeClass("clicked");
					} else {
						jQuery("#mainmenu b").removeClass();
						jQuery(this).addClass("clicked");
						jQuery("#mainmenu ul:visible").slideUp(300);
						jQuery(this).parent().next().slideDown(300);
					}
					return false;
				});
				jQuery("#mainmenu").mouseover(function() {
					clearTimeout(closetimer);
				});
				jQuery("#mainmenu").mouseout(function() {
					closetimer = window.setTimeout(function(){
						jQuery("#mainmenu ul:visible").slideUp(300);
						jQuery("#mainmenu b").removeClass("clicked");
					}, 500);
				}); 
			}

			//menuleft js
			jQuery("ul.lst-menu-left").mouseover(function(){
				jQuery(this).find("div.categoryPopout").css("display","block");
			});
			jQuery("ul.lst-menu-left div.categoryPopout").mouseover(function(){
				jQuery(this).parent().addClass("active");
			});
			jQuery("#ul.lst-menu-left").mouseout(function() {
				jQuery(this).find("div.categoryPopout").css("display","none");
			});	
			jQuery("ul.lst-menu-left div.categoryPopout").mouseout(function(){
				jQuery(this).parent().removeClass("active");
			});
		});
		//vnr
		function submit_search_form(){//alert('searchkeyword');
			var searchkeyword = $.trim($('#searchkeyword').val());	
			if(searchkeyword == ''){		
				//alert('Please enter some keyword');
				return false;
			}
			if(searchkeyword!=''){
				document.f_search.submit();
				//$('f_search').submit();
			}
		}
		function setListingPage(option_value) {
			window.location = option_value;
		}
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/leftmenu.css"; ?>" >
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-81631687-1', 'auto');
		ga('send', 'pageview');
		</script>
		<style>
		<?php
		if ($this->session->isLoggedin()) {
			echo '#header-menu ul{margin-right:-30px !important;}';
		}
		?>
		</style>
		<link href="<?php echo SITE_URL?>css/nouislider.min.css" rel="stylesheet">
		<script src="<?php echo SITE_URL?>js/nouislider.js"></script>
		<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL; ?>css/home_style.css" />
		<!-- other pages css and js start  -->
		<?php
		if(in_array($contr_class, $classlist)){ 
			if(!in_array($engagmethod, $methodlist)){
			?>
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>default.css">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>magento.css">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>calendar-win2k-1.css">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>widgets.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>jquery.thickbox.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>skin_2.2.20.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>style.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>custommenu.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>fbintegrator.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>popup_5.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>dailydeal_1.1.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>sociallogin.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>skin.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>catalog.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>custommenu1.3.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>carousel-productdetail.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>productdetail.css?version=03232016" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>productupdates.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>cloud-zoom.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>slider.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>like.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>tweet.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>modal.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>my_referrals.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>share.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>print.css" media="print">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>reponsive.css" name="zcss_last" />
				<?php
				$method_in_list = array('stuller_ring_detail', 'stern_collection');
				if( !in_array( $engagmethod, $method_in_list ) ) {
					echo '<script src="'.SITE_URL.'js/jquery-1.8.2.min.js"></script>';
					echo '<script>var jQuery = jQuery.noConflict();</script>';
				}
				?>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>effects.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>jquery.thickbox.js"></script>
				<script>
				var $j = jQuery.noConflict();
				</script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>script.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>jwplayer.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>window.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>social.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>dailydeal.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>lightbox.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>sociallogin.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>socialloginpopup.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>product.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>product-view.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>review.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>calendar.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>calendar-setup.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>cloud-zoom.1.0.2.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>cat_list_product_popup.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>custommenu.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>category-review-more.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>commonNav.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>navigation.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>verticalScroll.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>lazy-image-loader.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>common.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>jquery.jcarousel.min.js" productdetailpage=""></script>
			<?php
			} 
		}
		?>
		<!-- other pages css and js end  -->
		<?php $onloadClasses = ( ( isset($onload_class) && !empty($onload_class) ) ? $onload_class : '' ); ?>
		<style>
        #main-menu{background:#d3d3d3!important;font-variant:all-small-caps}
        </style>
	</head>
	<body>
		<script type="text/javascript" src="<?php echo SITE_URL?>third_party/dhtmltooltips/wz_tooltip.js"></script>
		<script type="text/javascript" src="<?php echo SITE_URL?>third_party/dhtmltooltips/tip_balloon.js"></script>
		<script type="text/javascript" src="<?php echo SITE_URL?>third_party/dhtmltooltips/tip_centerwindow.js"></script>
		<script type="text/javascript" src="<?php echo SITE_URL?>third_party/dhtmltooltips/tip_followscroll.js"></script>
		<?php
		$url_segment = explode('/', uri_string());
		$array_list = array('site','engagement','diamonds');
		?>
		<div class="main_wraper">
			<div class="header">
				<header>
					<div class="main_header">
						<div class="logo_section">
							<?php
							$logoImageUrl = SITE_URL.'assets/images/godstonelogo.png';
							$headerLogo = '<a href="'.SITE_URL.'Affiliate"><img src="'.$logoImageUrl.'" width="270" alt="'.get_site_title().'" /></a>';
							echo $headerLogo;
							?>
						</div>
						<div class="contact_section">
							<div>
								<span><a href="<?php echo SITE_URL; ?>Affiliate/account_information">My Account <img src="<?php echo SITE_WHURL; ?>header_dwar.jpg" alt="" /></a></span> 
								<span><a href="<?php echo SITE_URL; ?>Affiliate/shopping_cart">Cart <img src="<?php echo SITE_WHURL; ?>header_dwar.jpg" alt="" /></a></span> 
							</div>
							<div class="header_contact"><img src="<?php echo SITE_WHURL; ?>header_contact.jpg" alt="" /> <?php echo getadmin_contact_info('contact_info'); ?></div>
						</div>
						<div class="clear"></div>
						<br>
					</div>
					<div class="clear"></div>
					<div id="main-menu">
						<ul class="main-nav whmenu">
							<li class="margin"> <a href="#javascrip;">Collections</a>
								<div>
									<div class="main-nav-column">
										<div class="devide">
											<ul>
												<?php
												echo '<li><a href="'.SITE_URL.'rings/ringCollections/1401">Engagement Rings</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1402">Wedding Bands</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1403">Mens Wedding Bands</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1404">Tennis Bracelet</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1405">Diamond Stud Earrings</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1406">Fashion Rings</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1407">Tennis Necklace</a></li>';
												?>
											</ul>
										</div>
										<div class="devide">
											<ul>
												<?php
												echo '<li><a href="'.SITE_URL.'rings/ringCollections/1408">Diamond Hoop Earrings</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1409">Eternity Bands</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1410">Diamond Wedding Bands</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1411">Stackable Rings</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1412">Mens Diamond Wedding Bands</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1413">Diamonds</a></li>
												<li><a href="'.SITE_URL.'rings/ringCollections/1414">Lab Diamonds</a></li>';
												?>
											</ul>
										</div>
									</div>
								</div>
							</li>
							<li class="margin_none">
								<a href="#javascrip;">Diamonds</a>
								<div>
									<div class="main-nav-column">
										<div class="devide">
											<ul>
												<li><a href="<?php echo SITE_URL?>diamondslist/search/true/W">White Diamonds</a></li>
												<li><a href="<?php echo SITE_URL?>diamondslist/search/true/L">Lab Diamonds</a></li>
											</ul>
										</div>
									</div>
								</div>
							</li>
							<li>
								<form autocomplete="on" action="<?php echo SITE_URL?>engagement/searchresult" class="search_formbk" name="f_search" method="Post">
									<span class="setsearch_field"><input type="text" value="search" class="" onblur="if (this.value==''){this.value='search'}" onfocus="this.value=''" name="searchkeyword" /></span>
									<span><input type="image" src="<?php echo SITE_WHURL; ?>baner_serach.jpg" name="btn_submit" class="" /></span>
								</form>
							</li>
						</ul>
					</div>
				</header>
				<!-- end main header -->
				<div id="corner_tabs" class="RT-Corner-Tabs">
					<a href="<?php echo config_item('base_url') ?>engagement/search" class="Client-Portal"></a>
					<a href="<?php echo config_item('base_url') ?>jewelry/build_earings" class="Img-Gallery"></a>
					<a href="<?php echo config_item('base_url') ?>jewelry/buildiamond_pendant" class="Videos"></a>
					<a href="<?php echo config_item('base_url') ?>jewelry/buildthree_stonesring" class="Live-Chat live"></a>
					<a href="<? echo config_item('base_url') ?>site/page/contactus" class="Contact-Us"></a>
				</div> 
				<script type="text/javascript">
				$(".slideUpbox").click(function () {
					$(this).slideUp(2000);
				});
				</script>