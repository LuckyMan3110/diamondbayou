<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ( !empty( $title ) ? $title : 'Welcome to ' . getadmin_contact_info('sites_title') ); ?> | Hearts and Diamonds | Diamond Rings & Engagement</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php echo (isset($meta_tags) && !empty($meta_tags)) ? $meta_tags : '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'; ?>
		<meta name="google-site-verification" content="Epnk9IwQR1i8rkAuuRMxoKDTCbTgdl2g8u5nzLr6jqk" />
		<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url') ?>css/font-awesome.min.css"/>
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/ruman.css" rel="stylesheet" />
		<link href="<?php echo config_item('base_url') ?>css/bootstrap-toggle.css" rel="stylesheet">
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-style.css" rel="stylesheet" />
		<?php
		$engagmethod = $this->router->fetch_method();
		$contr_class = $this->router->fetch_class();
		$classlist = array('testengagementrings', 'qualitygoldrings', 'stullerygoldrings', 'heartdiamond', 'braceletsection', 'davidsternrings');
		$methodlist = array('quality_ring_detail', 'stuller_ring_details', 'stern_collection', 'jewelry_ring_detail', 'bracelet_detail');
		echo '<link type="text/css" href="'.SITE_URL.'css/site-body.css" rel="stylesheet" />';
		?>
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-page.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-menu.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/main.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/js-image-slider.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/tamal.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/tabs.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/whsale_styles.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/meanmenu_styles.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/steps_bar_section.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/heart_collection_menu.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo config_item('base_url') ?>css/wh_styles.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url') ?>css/heart_home_styles.css"/>
		<link rel="stylesheet" href="<?php echo config_item('base_url') ?>css/bootstrap.css"  type="text/css"/>
		<link href="<?php echo config_item('base_url') ?>css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo config_item('base_url') ?>css/bootstrap-responsive.css">
		<link href="<?php echo config_item('base_url') ?>css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
		<link href="<?php echo config_item('base_url') ?>css/heart_diamond.css" rel="stylesheet">
		<?php
		if(in_array($contr_class, $classlist)){     
			if(!in_array($engagmethod, $methodlist)){ 
			?>
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>default.css">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>jquery.thickbox.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>skin_2.2.20.css" media="all">
				<!-- <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>style.css" media="all">-->
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>popup_5.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>catalog.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>carousel-productdetail.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>productdetail.css?version=03232016" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>productupdates.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>cloud-zoom.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>modal.css" media="all">
				<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>reponsive.css" name="zcss_last" />
			<?php
			}
		}
		?>
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url') ?>css/IE7styles.css" /><![endif]--> 
		<!--[if  IE 8]>
		<link rel="stylesheet" type="text/css"  href=<?php echo config_item('base_url') ?>IE8styles.css"" />
		<![endif]-->
		<script>
		var base_url = '<?php echo config_item('base_url') ?>';
		var BASE_URL = base_url;
		var base_link = '<?php echo config_item('base_url') ?>';
		</script>
		<script src="<?php echo config_item('base_url') ?>js/jquery-1.11.3.min.js"></script>
		<script src="<?php echo config_item('base_url') ?>js/jquery.popup.js"></script>
		<script src="<?php echo config_item('base_url') ?>js/numeral.js"></script>
		<?php
		$print_js = '';
		$print_1 = '';
		$rturn = check_diamond_page();
		$mt = $this->router->fetch_method();
		$link_class = array('engagement');
		$method_list = array('choose_urdiamond');
		if( $rturn || $mt === 'diamond_detail'  || in_array($contr_class) ) {
			$print_js .= '<link type="text/css" href="'.SITE_URL.'css/jquery.popup.css" rel="stylesheet" />';
			/* $print_js .= '<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>'; */	
			$print_js .= '<script src="'.SITE_URL.'js/jquery.popupoverlay.js"></script>';
			$print_js .= '<script>
				$(document).ready(function () {
					$.fn.popup.defaults.pagecontainer = \'.container\'
				});
				</script>';
				if( $addoption == 'addtoring' && $mt != 'engagement_ring_settings' ) {    
					$print_js .= '<script src="'.config_item('base_url').'js/jquery.js" type="text/javascript"></script>';
				}
				echo $print_js;
		}else{
			if(in_array($engagmethod, $method_list) || ($contr_class == 'diamonds' && $mt == 'search' && $details_search != '')){
				$print_1 .= '<script src="'.config_item('base_url').'js/jquery.js" type="text/javascript"></script>';
            }
			$print_1 .= '<link type="text/css" href="'.SITE_URL.'css/jquery.popup.css" rel="stylesheet" />'
			. '<script src="'.SITE_URL.'js/jquery.popupoverlay.js"></script>';
			echo $print_1;
		}
		?>
		<script src="<?php echo config_item('base_url') ?>slider/js-image-slider.js" type="text/javascript"></script>
		<script src="<?php echo config_item('base_url') ?>js/facebox.js" type="text/javascript"></script>
		<script src="<?php echo config_item('base_url') ?>js/jquery.corner.js" type="text/javascript"></script>
		<script src="<?php echo config_item('base_url') ?>js/function.js" type="text/javascript"></script>
		<script src="<?php echo config_item('base_url') ?>js/t.js" type="text/javascript"></script>
		<script src="<?php echo config_item('base_url') ?>js/r.js" type="text/javascript"></script>
		<link href="<?php echo config_item('base_url') ?>css/moijey_css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo config_item('base_url') ?>css/moijey_css/slicebox.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" language="javascript">
		var item_type ='<?php echo $itemtype;?>';
		$(document).ready(function() {
			/* console.log('item_type=>'+item_type); */
			$('td#body').removeClass("content");
			if(item_type.trim()!='' && !(item_type.trim()=='Rings' || item_type.trim()=='Ring')){
				$('p.ring').hide();
			}

			$('.subscribeButton').click(function() {
				$('#subsc_email').val( $('#subscribe_email').val() );
			});
		});
		</script>
		<script src="<?php echo config_item('base_url') ?>js/subsemail_function.js" type="text/javascript" language="javascript"></script>
		<?php echo isset($extraheader) ? $extraheader : '';?> 
		<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			<?php echo isset($onloadextraheader) ? $onloadextraheader : '';?>
			closetimer = 0;
			if($("#mainmenu")) {
				$("#mainmenu b").mouseover(function() {
					clearTimeout(closetimer);
					if(this.className.indexOf("clicked") != -1) {
						$(this).parent().next().slideUp(300);
						$(this).removeClass("clicked");
					}else {
						$("#mainmenu b").removeClass();
						$(this).addClass("clicked");
						$("#mainmenu ul:visible").slideUp(300);
						$(this).parent().next().slideDown(300);
					}
					return false;
				});
				$("#mainmenu").mouseover(function() {
					clearTimeout(closetimer);
				});
				$("#mainmenu").mouseout(function() {
					closetimer = window.setTimeout(function(){
						$("#mainmenu ul:visible").slideUp(300);
						$("#mainmenu b").removeClass("clicked");
					}, 500);
				}); 
			}

			/* menuleft js */
			$("ul.lst-menu-left").mouseover(function(){
				$(this).find("div.categoryPopout").css("display","block");
			});
			$("ul.lst-menu-left div.categoryPopout").mouseover(function(){
				$(this).parent().addClass("active");
			});
			$("#ul.lst-menu-left").mouseout(function() {
				$(this).find("div.categoryPopout").css("display","none");
			});	
			$("ul.lst-menu-left div.categoryPopout").mouseout(function(){
				$(this).parent().removeClass("active");
			});
		});

		/* vnr */
		function submit_search_form(){
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
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/leftmenu.css"; ?>" >
		<script><?php echo getAanalytiCodeDyanmicaly( $analytic_code, $collection_cate_id ); ?></script>
		<style>
		<?php
		if ($this->session->isLoggedin()) {
			echo '#header-menu ul{margin-right:-30px !important;}';
		}
		?>
		</style>
		<link href="<?php echo config_item('base_url') ?>css/nouislider.min.css" rel="stylesheet">
		<script src="<?php echo config_item('base_url') ?>js/nouislider.js"></script>
		<link type="text/css" rel="stylesheet" href="<?php echo config_item('base_url') ?>css/home_style.css" />

		<!-- other pages css and js start  -->
		<?php 
		if(in_array($contr_class, $classlist)){ 
			if(!in_array($engagmethod, $methodlist)){
				$method_in_list = array('collection_detail', 'heart_collection_detail', 'stuller_ring_detail', 'stern_collection', 'engagement_ring_listings', 'engagement_ring_detail', 'collection_ring_detail');
				if(!in_array( $engagmethod, $method_in_list)){
					echo '<script src="'.SITE_URL.'js/jquery-1.8.2.min.js"></script>';
				}
				?>
				<script>
				var jQuery = jQuery.noConflict();
				</script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>effects.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>jquery.thickbox.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>product.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>product-view.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>cloud-zoom.1.0.2.js"></script>
				<!--<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>cat_list_product_popup.js"></script>-->
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>category-review-more.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>verticalScroll.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>lazy-image-loader.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>common.js"></script>
				<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>jquery.jcarousel.min.js" productdetailpage=""></script>
			<?php
			} else {
				echo '<link rel="stylesheet" type="text/css" href="'.DEMO_RETAIL_CSS.'productdetail.css?version=03232016" media="all">';
			}
		}
		
		/* other pages css and js end */
		$onloadClasses = ( ( isset($onload_class) && !empty($onload_class) ) ? $onload_class : '' );
		?>
	</head>
	<body id="home" class="mean-container catalog-category-view categorypath-diamond-engagement-rings-aspx category-diamond-engagement-rings <?php echo $onloadClasses; ?>">
		<?php require_once 'application/views/erd/main_header_file.php'; ?>