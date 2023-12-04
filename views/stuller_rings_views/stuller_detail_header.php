<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ( !empty( $title ) ? $title : 'Welcome to ' . get_site_contact_info('sites_title') ); ?> | <?php echo get_site_contact_info('dashboard_title'); ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo (isset($meta_tags) && !empty($meta_tags)) ? $meta_tags : '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />'; ?>
 
<meta name="google-site-verification" content="Epnk9IwQR1i8rkAuuRMxoKDTCbTgdl2g8u5nzLr6jqk" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(1).css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(2).css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(3).css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(4).css">
        
<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-page.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/site-menu.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/main.css" rel="stylesheet" />
<link type="text/css" href="<?php echo config_item('base_url') ?>css/tamal.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL?>css/tabs.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL?>css/whsale_styles.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL?>css/site-body.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL?>css/site-style.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL; ?>css/home_style.css" />
<link type="text/css" href="<?php echo SITE_URL?>css/meanmenu_styles.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/heart_collection_menu.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL?>css/jquery-ui.css"/>
<link type="text/css" href="<?php echo SITE_URL; ?>css/wh_styles.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/heart_home_styles.css" rel="stylesheet" />

<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap.css"  type="text/css"/>
<link href="<?php echo SITE_URL; ?>css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/bootstrap-responsive.css">
<link href="<?php echo SITE_URL; ?>css/heart_diamond.css" rel="stylesheet">


<link href="<?php echo SITE_URL; ?>css/jewelercart_css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo SITE_URL; ?>css/jewelercart_css/slicebox.css" rel="stylesheet" type="text/css">
<!-- font-awesome-icons -->
<link href="<?php echo SITE_URL; ?>css/jewelercart_css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->

    <!--[if IE]>
        <![if lte IE 9]>
            <style type="text/css">
                .searchColumn{
                    min-height: 300px;
                    margin-bottom: 0 !important;
                }

                .searchColumn .bottomBadges {
                    bottom: auto;
                }

                @media (max-width: 767px){
                    .searchColumn {
                        min-height: 275px !important;
                    }
                }
                .searchColumn.tall {
                    min-height: 340px !important;
                }

                .responsiveTable thead, .responsiveTable thead tr {
                    position: relative;
                }

                .responsiveTable td {
                    padding-left: 5px !important;
                }

                .responsiveTable td:before {
                    content: "";
                }
            </style>
        <![endif]>
        <![if lt IE 9]>
            <style type="text/css">
                #contactLinks li {
                    display: block;
                    float: left;
                }
            </style>
            <script type="text/javascript" src="/combres.axd/RespondJs/-1394528463/"></script>
        <![endif]>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/stud_earings/imgs_lib/fonts.css">
    <script src="<?php echo SITE_URL; ?>js/function.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo SITE_URL; ?>stuller_libs/stud_earings/imgs_lib/sprytabbedpanels.css">    
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(6).css">
    <style type="text/css">
body {
	position: relative;
}
.whyPlatinum {
	color: #262626;
	width: 200px;
	margin: 0 auto;
	display: block;
	text-align: right;
	text-transform: uppercase;
}
#product_page_add_to_cart .addPanel .lblPrice {
	padding-top: 0px !important;
	margin-top: 0px !important;
	padding-bottom: 10px;
}
.largePrice {
	font-weight: normal;
}
.largePrice .whole {
	font-size: 1.5em;
}
.largePrice .decimal {
	line-height: 40%;
	vertical-align: top;
}
#product_page_add_to_cart .addPanel #addBlock {
	position: relative;
}
/*
            #product_page_add_to_cart .addPanel {
                width: 192px;
        }*/
        
        
            #product_page_add_to_cart .addPanel .largePrice {
	font-size: 25px;
	line-height: 100%;
}
#product_page_add_to_cart .addPanel #inStockStatus {
	text-align: center;
	font-size: 12px;
}
#product_page_add_to_cart .addPanel .soldByDescription {
	font-size: 11px;
	padding: 0 2px !important;
}
.ui-tooltip-stuller-down .ui-tooltip-content {
	max-height: 300px;
	overflow-y: auto;
}
.ui-buttonset .ui-button-text, .ui-button .ui-button-text {
	padding: 5px 10px !important;
}
.underTheMainImage.ui-dialog .ui-dialog-titlebar {
	display:none !important;
}
.ui-dialog.ui-widget-content {
	background: white;
}
.underTheMainImage.ui-dialog .ui-dialog-content {
	padding: 10px 0 0 10px;
}
.rightMarginLarge {
	margin-right: 15px !important;
}
.ring-size-opacity {
	opacity: .2;
}
#ratingBox {
	padding: 2px 0;
}
#shareButton {
	float: right;
}
#socialMediaBtn {
	padding-left: 105px;
}
fieldset {
	border: 1px solid #E7E4E1;
}
.priceSummary .table {
	border: none;
}
.pricingSummarySection {
	display: none !important;
}
fieldset {
	padding: 15px;
}
legend {
	height: 33px;
}
.stoneGroupExplodespan {
	padding: 0 !important;
}
#product-details-upload-engraving {
	width: 100%;
	height: 75px;
	border: 0;
}
.ui-widget-overlay {
	z-index: 14000 !important;
}
.ui-dialog {
	z-index: 14500 !important;
	border-width: 8px !important;
	border-color: #998B7D;
}
.ui-spinner {
	background: white !important;
	border-radius: 0 0 0 0;
	width: 100%;
}
#chainLengthInput {
	padding: 3px 0;
	width: 92%;
}
.stoneGroupExplode {
	padding: 0;
	width: 20px !important;
}
.stoneGroupExplode .ui-button-text {
	padding: 0!important;
}
#stoneSearchResultsTabs .ui-tabs-panel {
	padding: 0 !important;
}
.relatedProductsHeader {
	display: table;
	float: left;
	padding-top:25px;
}
.relatedProductsHeader span {
	display: table-cell;
	text-align: center;
	vertical-align: middle;
	font-size: 1.4em;
	font-weight: bold;
}
.image-zoom-container {
	max-width: 300px;
	max-height: 300px;
	margin: 0 auto;
	overflow: hidden;
	z-index: 1;
	position: relative;
}
.image-zoom-container .fa-search-plus {
	position: absolute;
	right: 5px;
	bottom: 5px;
	font-size: 18px;
	z-index: 1;
}
.zoom-image {
	position: absolute;
}
.stoneSearchFade h4 {
	font-family: "MrEaves", "Arial";
	font-size: 16px;
	font-weight: 400;
}
.fb-form .formInput {
	width: 200px !important;
}
.stoneSearchFade h5 {
	font-family: "MrEaves", "Arial";
	font-size: 14px;
	font-weight: 200;
	color: black;
}
.topPrice-xs .originalPrice, .topPrice-xs .lightningDealCountdownContainer, .topPrice-xs .timedDealType, .topPrice-xs .savedPrice {
	display: none;
}
.topPrice-xs .dealOfTheDayTag_new {
	margin-bottom: 15px;
}
.modal-lg .modal-body {
	min-height: 200px;
}
.agileits_top_menu ul {
    margin: 0px !important;
}
</style>
    <script>
        dataLayer = [{
            'loggedIn': 'No',
            'retailMode': 'No',
            'userMemberId': 'None'
        }];    
    </script>
    <!-- Google Code for Remarketing Tag -->
    <!--------------------------------------------------
    Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
    --------------------------------------------------->
<!--<script async="" src="<?php echo SITE_URL; ?>stuller_libs/stud_earings/js/hotjar-155458.js"></script>
<script src="<?php echo SITE_URL; ?>stuller_libs/stud_earings/js/modules-e12a7ede294d22ffa3a8a711155156e3.js"></script>-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97246540-1', 'auto');
  ga('send', 'pageview');

</script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery-1.8.2.min.js"></script>-->
<script src="https://www.davidsternfinejewelry.com/js/jquery-1.11.3.min.js"></script>

<script>
var base_url = '<?php echo SITE_URL; ?>';
</script>

<link type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" rel="stylesheet" />
<script src="<?php echo SITE_URL; ?>js/jquery.popupoverlay.js"></script>   
<script src="<?php echo SITE_URL; ?>js/subsemail_function.js"></script>

<script>
    $(document).ready(function () {
            $.fn.popup.defaults.pagecontainer = '.container';
    });
    </script>

<script type="text/javascript">
//$(document).ready(function() {
//		var sort_dmid = '';
//		viewPendantDiamondDetail(decodeURI(sort_dmid),'','false', '')	
//	});
var item_type ='';


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

<script>
    $(document).ready(function () {

            $('#fade').popup({
              transition: 'all 0.3s',
              scrolllock: true
            });

    });
            $(document).ready(function () {

                    $('#biolist').popup({
                    transition: 'all 0.3s',
                    scrolllock: true
                    });

            });
 </script>

<script>
//var $ = jQuery.noConflict();
</script>
</head>
<body id="b" class="stullerBody">
<?php 
    require_once 'application/views/erd/main_header_file.php';