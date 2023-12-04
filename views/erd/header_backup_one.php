<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ( !empty( $title ) ? $title : 'Welcome to ' . get_site_contact_info('sites_title') ); ?> | <?php echo get_site_contact_info('dashboard_title'); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo (isset($meta_tags) && !empty($meta_tags)) ? $meta_tags : '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'; ?>

<meta name="google-site-verification" content="Epnk9IwQR1i8rkAuuRMxoKDTCbTgdl2g8u5nzLr6jqk" />


<!--<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/font-awesome.min.css"/>-->
<link type="text/css" href="<?php echo SITE_URL; ?>css/ruman.css" rel="stylesheet" />
<link href="<?php echo SITE_URL; ?>css/bootstrap-toggle.css" rel="stylesheet">
<link type="text/css" href="<?php echo SITE_URL; ?>css/site-style.css" rel="stylesheet" />
<?php
$engagmethod = $this->router->fetch_method();
$contr_class = $this->router->fetch_class();
$classlist = array('testengagementrings', 'qualitygoldrings', 'stullerygoldrings', 'heartdiamond', 'braceletsection', 'davidsternrings');
$methodlist = array('quality_ring_detail', 'stuller_ring_details', 'stern_collection', 'jewelry_ring_detail', 'bracelet_detail');

//if( !in_array($engagmethod, $methodlist) ) {
    echo '<link type="text/css" href="'.SITE_URL.'css/site-body.css" rel="stylesheet" />';
//}
?>
<link type="text/css" href="<?php echo SITE_URL; ?>css/site-page.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/site-menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/main.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/js-image-slider.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/tamal.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/tabs.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/whsale_styles.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/meanmenu_styles.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/steps_bar_section.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/heart_collection_menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/wh_styles.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/heart_home_styles.css"/>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap.css"  type="text/css"/>
<link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap-responsive.css">
<link href="<?php echo SITE_URL; ?>css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
<link href="<?php echo SITE_URL; ?>css/heart_diamond.css" rel="stylesheet">

<link type="text/css" href="<?php echo SITE_URL; ?>css/johnny_dang_style.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/johny_site_style.css" rel="stylesheet" />


<?php if( in_array($contr_class, $classlist) ) {     
        if( !in_array($engagmethod, $methodlist) ) { 
?>
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>default.css">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>jquery.thickbox.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>skin_2.2.20.css" media="all">
<!--            <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>style.css" media="all">-->
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>popup_5.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>catalog.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>carousel-productdetail.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>productdetail.css?version=03232016" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>productupdates.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>cloud-zoom.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>modal.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>reponsive.css" name="zcss_last" />
<?php }
  } ?>

<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>css/IE7styles.css" /><![endif]--> 

<!--[if  IE 8]>
<link rel="stylesheet" type="text/css"  href=<?php echo SITE_URL; ?>IE8styles.css"" />
<![endif]-->

<script>
    var base_url = '<?php echo SITE_URL; ?>';
    var BASE_URL = base_url;
    var base_link = '<?php echo SITE_URL; ?>';
</script>
<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>
<script src="<?php echo SITE_URL; ?>js/jquery.popup.js"></script>
<script src="<?php echo SITE_URL; ?>js/numeral.js"></script>


    <?php
	$print_js = '';
	$print_1 = '';
	$rturn = check_diamond_page();
        $mt = $this->router->fetch_method();
        $link_class = array('engagement');
        $method_list = array('choose_urdiamond');
        
	if( $rturn || $mt === 'diamond_detail'  || in_array($contr_class) ) {
		$print_js .= '<link type="text/css" href="'.SITE_URL.'css/jquery.popup.css" rel="stylesheet" />';
		/*$print_js .= '<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>';*/	
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
	} else {
            
            if( in_array($engagmethod, $method_list) || ( $contr_class == 'diamonds' && $mt == 'search' && $details_search != ''  ) ) {
		$print_1 .= '<script src="'.config_item('base_url').'js/jquery.js" type="text/javascript"></script>';
            }
                $print_1 .= '<link type="text/css" href="'.SITE_URL.'css/jquery.popup.css" rel="stylesheet" />'
                        . '<script src="'.SITE_URL.'js/jquery.popupoverlay.js"></script>';
                
                echo $print_1;
	}
?>
<script src="<?php echo SITE_URL; ?>slider/js-image-slider.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>js/facebox.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>js/jquery.corner.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>js/function.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>js/t.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL; ?>js/r.js" type="text/javascript"></script>


<link href="<?php echo SITE_URL; ?>css/jewelercart_css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo SITE_URL; ?>css/jewelercart_css/slicebox.css" rel="stylesheet" type="text/css">
<!-- font-awesome-icons -->
<link href="<?php echo SITE_URL; ?>css/jewelercart_css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->

<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(1).css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(2).css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(3).css">
<!--<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(4).css">-->
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(5).css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(6).css">
        

<script type="text/javascript">
.w3l_header_left ul{
    margin:0px !important;
}
//$(document).ready(function() {
//		var sort_dmid = '<?php echo $this->session->userdata('sort_dmid'); ?>';
//		viewPendantDiamondDetail(decodeURI(sort_dmid),'','false', '')	
//	});
var item_type ='<?php echo $itemtype;?>';


    $(document).ready(function() { console.log('item_type=>'+item_type);
        $('td#body').removeClass("content");
		if(item_type.trim()!='' && !(item_type.trim()=='Rings' || item_type.trim()=='Ring')){
			$('p.ring').hide();
		}
		
		$('.subscribeButton').click(function() {
			$('#subsc_email').val( $('#subscribe_email').val() );
		});
    });
</script>
<script src="<?php echo SITE_URL; ?>js/subsemail_function.js"></script>

<?php echo isset($extraheader) ? $extraheader : '';?> 

<script type="text/javascript" language="javascript">
	jQuery(document).ready(function() {
		<?php echo isset($onloadextraheader) ? $onloadextraheader : '';?>
		/*jQuery(".roundcorner").corner("round 3px");*/
		closetimer = 0;
		if(jQuery("#mainmenu")) {
			jQuery("#mainmenu b").mouseover(function() {
				clearTimeout(closetimer);
				if(this.className.indexOf("clicked") != -1) {
					jQuery(this).parent().next().slideUp(300);
					jQuery(this).removeClass("clicked");
				}
				else {
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
</script>


<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/leftmenu.css"; ?>" >
<script>
    <?php
        echo getAanalytiCodeDyanmicaly( $analytic_code, $collection_cate_id ); /// site_common_func helper
    ?>
</script>
<style>
<?php
if ($this->session->isLoggedin()) {
    echo '#header-menu ul{margin-right:-30px !important;}';
}
?>
</style>
<link href="<?php echo SITE_URL; ?>css/nouislider.min.css" rel="stylesheet">
<script src="<?php echo SITE_URL; ?>js/nouislider.js"></script>

<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL; ?>css/home_style.css" />

<!-- other pages css and js start  -->
<?php if( in_array($contr_class, $classlist) ) { 
    
        if( !in_array($engagmethod, $methodlist) ) {
    
$method_in_list = array('collection_detail', 'heart_collection_detail', 'stuller_ring_detail', 'stern_collection', 'engagement_ring_listings', 'engagement_ring_detail', 'collection_ring_detail');
if( !in_array( $engagmethod, $method_in_list ) ) {
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
    .w3l_header_left ul{
        margin:0px !important;
    }
    h1, h2, .h1, .h2 {
        color: #222;
    }
    .mainPageHeading h2{
        color: #fff !important;
    }
    .gridProduct{
        padding: 30px;
    }
</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116603091-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116603091-1');
</script>


<link type="text/css" href="<?php echo SITE_URL; ?>css/header-new-style.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='css/site_fonts.css' rel='stylesheet' type='text/css'>
<link href='css/sites_italic_fonts.css' rel='stylesheet' type='text/css'>

<!-- Plugin CSS -->
<link href="<?php echo SITE_URL; ?>assets/site_vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="<?php echo SITE_URL; ?>assets/css/bayou_sites_style.css" rel="stylesheet" />

<!-- Theme CSS -->
<link href="<?php echo SITE_URL; ?>assets/css/creative.min.css" rel="stylesheet">

<style>
    .diamond_inner_tabs a:hover{
        color:#000000 !important;
    }
    .inner_tabs_hover:hover, .inner_tabs_active {
        font-weight: 300;
        font-size: 14px;
    }
</style>



</head>

<body id="home" class="mean-container catalog-category-view categorypath-diamond-engagement-rings-aspx category-diamond-engagement-rings <?php echo $onloadClasses; ?>">
<?php 
require_once 'application/views/erd/main_header_file.php';
