<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo ( !empty( $title ) ? $title : 'Welcome to ' . get_site_contact_info('sites_title') ); ?> | <?php echo get_site_contact_info('dashboard_title'); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php echo (isset($meta_tags) && !empty($meta_tags)) ? $meta_tags : ''; ?>
		<?php  $ch_menu = end($this->uri->segment_array());?>
		<meta name="google-site-verification" content="Epnk9IwQR1i8rkAuuRMxoKDTCbTgdl2g8u5nzLr6jqk" />
		<?php if($ch_menu!=''){ ?>
			<link type="text/css" href="<?php echo SITE_URL; ?>css/ruman.css" rel="stylesheet"  media="none" onload="if(media!='all')media='all'" />
			<link href="<?php echo SITE_URL; ?>css/bootstrap-toggle.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'" >
			<link type="text/css" href="<?php echo SITE_URL; ?>css/site-style.css" rel="stylesheet"  media="none" onload="if(media!='all')media='all'" />
			<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap.css"  type="text/css" media="none" onload="if(media!='all')media='all'" />
			<?php }?>
			<link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet" media="all">
			<?php if($ch_menu!=''){?>
			<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap-responsive.css" media="none" onload="if(media!='all')media='all'" >
			<link href="<?php echo SITE_URL; ?>css/jquery.smartmenus.bootstrap.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'" >
			<link href="<?php echo SITE_URL; ?>css/heart_diamond.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'" >
		<?php
		} 

		$engagmethod = $this->router->fetch_method();
		$contr_class = $this->router->fetch_class();
		$classlist = array('testengagementrings', 'qualitygoldrings', 'stullerygoldrings', 'heartdiamond', 'braceletsection', 'davidsternrings');
		$methodlist = array('quality_ring_detail', 'stuller_ring_details', 'stern_collection', 'jewelry_ring_detail', 'bracelet_detail');

		if($ch_menu!=''){
		?>
			<link href="<?php echo SITE_URL; ?>css/site-body.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'" >
			<link type="text/css" href="<?php echo SITE_URL; ?>css/johnny_dang_style.css" rel="stylesheet"  media="none" onload="if(media!='all')media='all'" />
			<link type="text/css" href="<?php echo SITE_URL; ?>css/johny_site_style.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'" />
			<?php
			if(in_array($contr_class, $classlist)){     
				if(!in_array($engagmethod, $methodlist)){ 
				?>
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>default.css" media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>jquery.thickbox.css"  media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>skin_2.2.20.css"  media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>popup_5.css"  media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>catalog.css" media="all" media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>carousel-productdetail.css"  media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>productdetail.css?version=03232016"  media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>productupdates.css"  media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>cloud-zoom.css"  media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>modal.css"  media="none" onload="if(media!='all')media='all'" >
					<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>reponsive.css" name="zcss_last"  media="none" onload="if(media!='all')media='all'" />
				<?php }
			} ?>
			<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/IE7styles.css" /><![endif]--> 
			<!--[if  IE 8]>
			<link rel="stylesheet" type="text/css"  href=<?php echo SITE_URL; ?>IE8styles.css"" />
			<![endif]-->
		<?php } ?>
		<script>
		var base_url = '<?php echo SITE_URL; ?>';
		var BASE_URL = base_url;
		var base_link = '<?php echo SITE_URL; ?>';
		</script>
		<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>
		<script src="<?php echo SITE_URL; ?>js/facebox.js" type="text/javascript"></script>
		<script src="<?php echo SITE_URL; ?>js/jquery.popup.js"></script>
		<?php if($ch_menu!=''){ ?>
			<script src="<?php echo SITE_URL; ?>js/numeral.js" ></script>
		<?php
		}

		$print_js = '';
		$print_1 = '';
		$rturn = check_diamond_page();
		$mt = $this->router->fetch_method();
		$link_class = array('engagement');
		$method_list = array('choose_urdiamond');

		if( $rturn || $mt === 'diamond_detail'  || in_array($contr_class) ) {
			$print_js .= '<link type="text/css" href="'.SITE_URL.'css/jquery.popup.css" rel="stylesheet" media="all" />';
			$print_js .= '<script src="'.SITE_URL.'js/jquery.popupoverlay.js"></script>';
			/* $print_js .= '<script>
			$(document).ready(function () {
				$.fn.popup.defaults.pagecontainer = \'.container\'
			});
			</script>'; */
			if( $addoption == 'addtoring' && $mt != 'engagement_ring_settings' ) {    
				$print_js .= '<script src="'.config_item('base_url').'js/jquery.js" type="text/javascript"></script>';
			}
			echo $print_js;
		} else {
			if(in_array($engagmethod, $method_list) || ($contr_class == 'diamonds' && $mt == 'search' && $details_search != '')){
				$print_1 .= '<script src="'.config_item('base_url').'js/jquery.js" type="text/javascript"></script>';
            }
			$print_1 .= '<link type="text/css" href="'.SITE_URL.'css/jquery.popup.css" media="all" rel="stylesheet" />'
			. '<script src="'.SITE_URL.'js/jquery.popupoverlay.js"></script>';
			echo $print_1;
		}

		if($ch_menu!=''){
		?>
			<script src="<?php echo SITE_URL; ?>slider/js-image-slider.js" type="text/javascript"></script>
			<script src="<?php echo SITE_URL; ?>js/jquery.corner.js" type="text/javascript"></script>
			<script src="<?php echo SITE_URL; ?>js/function.js" type="text/javascript"></script>
			<script src="<?php echo SITE_URL; ?>js/t.js" type="text/javascript"></script>
			<script src="<?php echo SITE_URL; ?>js/r.js" type="text/javascript"></script>
			<link href="<?php echo SITE_URL; ?>css/jewelercart_css/style.css" rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'" />
			<link href="<?php echo SITE_URL; ?>css/jewelercart_css/slicebox.css" rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'" >
			<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(1).css" media="none" onload="if(media!='all')media='all'" >
			<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(2).css" media="none" onload="if(media!='all')media='all'" >
			<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(3).css" media="none" onload="if(media!='all')media='all'" >
			<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(6).css" media="none" onload="if(media!='all')media='all'" >
		<?php } ?>
		<style>
		.w3l_header_left ul{margin:0px !important;}
		</style>
		<script type="text/javascript">
		var item_type ='<?php echo $itemtype;?>';
		$(document).ready(function() {
			/* console.log('item_type=>'+item_type); */
			$('td#body').removeClass("content");
			if(item_type.trim()!='' && !(item_type.trim()=='Rings' || item_type.trim()=='Ring')){
				$('p.ring').hide();
			}

			$('.subscribeButton').click(function() {
				$('#subsc_email').val( $('#footer_email_box').val() );
			});
		});
		</script>
		<script src="<?php echo SITE_URL; ?>js/subsemail_function.js"></script>
		<?php echo isset($extraheader) ? $extraheader : '';?> 
		<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			<?php /* echo isset($onloadextraheader) ? $onloadextraheader : ''; */?>
			closetimer = 0;
			if($("#mainmenu")) {
				$("#mainmenu b").mouseover(function() {
					clearTimeout(closetimer);
					if(this.className.indexOf("clicked") != -1) {
						$(this).parent().next().slideUp(300);
						$(this).removeClass("clicked");
					}
					else {
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
				return false;
			}
			if(searchkeyword!=''){						
				document.f_search.submit();
			}
		}
		</script>
		<?php if($ch_menu!=''){ ?>
			<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/leftmenu.css"; ?>"  media="none" onload="if(media!='all')media='all'" >
			<script>
			<?php echo getAanalytiCodeDyanmicaly( $analytic_code, $collection_cate_id ); /// site_common_func helper ?>
			</script>
		<?php } ?>
		<style>
		<?php
		if ($this->session->isLoggedin()) {
			echo '#header-menu ul{margin-right:-30px !important;}';
		}
		?>
		</style>
		<?php if($ch_menu!=''){ ?>
			<link href="<?php echo SITE_URL; ?>css/nouislider.min.css"  media="none" onload="if(media!='all')media='all'" rel="stylesheet">
			<script src="<?php echo SITE_URL; ?>js/nouislider.js" ></script>
			<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL; ?>css/home_style.css"  media="none" onload="if(media!='all')media='all'" />
		<?php } ?>
		<!-- other pages css and js start  -->
		<?php if(in_array($contr_class, $classlist)){ 
			if(!in_array($engagmethod, $methodlist)){
				$method_in_list = array('collection_detail', 'heart_collection_detail', 'stuller_ring_detail', 'stern_collection', 'engagement_ring_listings', 'engagement_ring_detail', 'collection_ring_detail');
				if( !in_array( $engagmethod, $method_in_list ) ) {
					echo '<script src="'.SITE_URL.'js/jquery-1.8.2.min.js"></script>';
				}
				?>
				<script>
				var jQuery = jQuery.noConflict();
				</script>
				<?php if($ch_menu!=''){ ?>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>effects.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>jquery.thickbox.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>product.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>product-view.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>cloud-zoom.1.0.2.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>category-review-more.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>verticalScroll.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>lazy-image-loader.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>common.js" ></script>
					<script type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>jquery.jcarousel.min.js"  productdetailpage=""></script>
				<?php } ?>
			<?php } else {
				echo '<link rel="stylesheet" type="text/css" href="'.DEMO_RETAIL_CSS.'productdetail.css?version=03232016" media="all">';
			}
		}
		?>
		<!-- other pages css and js end  -->
		<?php
		$onloadClasses = ( ( isset($onload_class) && !empty($onload_class) ) ? $onload_class : '' );
		?>
		<style>
		.w3l_header_left ul{margin:0!important}
		h1,h2,.h1,.h2{color:#222}
		.mainPageHeading h2{color:#fff!important}
		.gridProduct{padding:30px}
		</style>
		<link type="text/css" href="<?php echo SITE_URL; ?>css/header-new-style.css" rel="stylesheet"  media="none" onload="if(media!='all')media='all'" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="none" onload="if(media!='all')media='all'" >
		<?php  if($ch_menu!=''){?>
		<link href="<?php echo SITE_URL; ?>assets/site_vendor/magnific-popup/magnific-popup.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'" >
		<?php }?>
		<link href="<?php echo SITE_URL; ?>assets/css/bayou_sites_style.css" rel="stylesheet"  media="none" onload="if(media!='all')media='all'" />
		<?php  $ch_menu = end($this->uri->segment_array());
		if($ch_menu!=''){
		?>
		<link href="<?php echo SITE_URL; ?>assets/css/creative.min.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'" >
		<?php }?>
		<style>
		.diamond_inner_tabs a:hover{color:#000!important}
		.inner_tabs_hover:hover,.inner_tabs_active{font-weight:300;font-size:14px}
		.offerbackground{text-align:center;background-color:#ffba00}
		.offerbackground p{padding:3px;margin:0;text-align:center}
		#fade,#biolist{background:#000;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:10px}
		.accountBtn,.btnStyle{padding:8px 10px 7px;border:0;font-weight:700;cursor:pointer;min-width:100px!important;color:#fff;background:#ffa5a7;text-transform:uppercase}
		.viewErorMsage{color:red}
		</style>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-152526704-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-152526704-1');
		</script>
	</head>
	<body id="home" class="mean-container catalog-category-view categorypath-diamond-engagement-rings-aspx category-diamond-engagement-rings <?php echo $onloadClasses; ?>">
		<?php 
		require_once 'application/views/erd/main_header_file.php';
