<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo getadmin_contact_info('dashboard_title'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="<?= BASE_URL() ?>new-admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="<?= BASE_URL() ?>new-admin/css/style.css" rel='stylesheet' type='text/css' />
		<!-- font CSS -->
		<!-- font-awesome icons -->
		<link href="<?= BASE_URL() ?>new-admin/css/font-awesome.css" rel="stylesheet"> 
		<!-- //font-awesome icons -->
		<!-- js-->
		<script src="<?= BASE_URL() ?>new-admin/js/jquery-1.11.1.min.js"></script>
		<script src="<?= BASE_URL() ?>new-admin/js/modernizr.custom.js"></script>
		<!--webfonts-->
		<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<!--//webfonts--> 
		<!--animate-->
		<script src="<?= BASE_URL() ?>new-admin/js/wow.min.js"></script>
		<script>
		new WOW().init();
		</script>
		<!--//end-animate-->
		<script src="<?= BASE_URL() ?>new-admin/js/underscore-min.js" type="text/javascript"></script>
		<script src= "<?= BASE_URL() ?>new-admin/js/moment-2.2.1.js" type="text/javascript"></script>
		<script src="<?= BASE_URL() ?>new-admin/js/clndr.js" type="text/javascript"></script>
		<script src="<?= BASE_URL() ?>new-admin/js/site.js" type="text/javascript"></script>
		<!--End Calender-->
		<!-- Metis Menu -->
		<script src="<?= BASE_URL() ?>new-admin/js/metisMenu.min.js"></script>
		<script src="<?= BASE_URL() ?>new-admin/js/custom.js"></script>
		<link href="<?= BASE_URL() ?>new-admin/css/custom.css" rel="stylesheet">
		<!--//Metis Menu -->
		<script src="<?php echo config_item('base_url');?>js/jquery-1.3.2.min.js"></script>
		<script>var base_url = '<?php echo config_item('base_url');?>';</script>
		<script src="<?php echo config_item('base_url') ?>js/facebox.js" type="text/javascript"></script>
		<script src="<?php echo config_item('base_url') ?>js/function.js" type="text/javascript"></script>
		<script src="<?php echo config_item('base_url') ?>js/admin.js" type="text/javascript"></script>
		<style>
		.cbp-spmenu-push div#page-wrapper {
		margin: 0 0 0 13.5em;
		}
		.sidebar .nav-second-level li a {
		padding-left: 25px;
		}
		.sidebar ul li {
		margin-bottom:4px;
		}
		i.nav_icon {
		margin-right: 5px;
		}
		</style>
		<?php echo isset($extraheader) ? $extraheader : '';?> 
		<script>
	jQuery.noConflict();
	 $(function( $ ) {
			$(".ddiframeshim").remove();
			<?php echo isset($onloadextraheader) ? $onloadextraheader : '';?>
			$(".roundcorner").corner("round 3px");
			<?php if(isset($success)) echo '$.facebox(\''.$success.'\');';?>  
			<?php if(isset($error)) echo '$.facebox(\'<div class="error">'.$error.'</div>\');';?>  
		})( jQuery ); 

		function saveTaskDetail() {
			var urlink = base_url+'admin/saveTaskDetail';

			dataString = $("#taskForm").serialize();
			var task_heading = $('#task_heading').val();
			var task_detail  = $('#task_detail').val();

			if(task_heading == '') {
				$('#task_heading').focus();
				$('#viewErorMsg').html('Please enter the task heading!');
				return false
			}
			if(task_detail == '') {
				$('#task_detail').focus();
				$('#viewErorMsg').html('Please enter the task detail');
				return false
			}

			$.ajax({
				type: "POST",
				url:urlink,
				data: dataString,
				success: function(data) {
					$('#viewErorMsg').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
					$('#viewErorMsg').html(data);

					$('#task_heading').val('');
					$('#task_detail').val('');
				},
				error: function(){
					alert('Error ');
				}
			});
		}

		function saveImpTaskDetail(id) {
			var urlink = base_url+'admin/saveImpTaskDetail/'+id;

			dataString = $("#impTaskForm").serialize();
			var task_title = $('#task_title').val();

			if(task_title == '') {
				$('#task_title').focus();
				//$('#viewErorMsg').html('Please enter the task heading!');
				return false
			}

			$.ajax({
				type: "POST",
				url:urlink,
				data: dataString,
				success: function(data) {
					$('#viewImpTask').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
					$('#viewImpTask').html(data);			 
					$('#task_title').val('');
				},
				error: function(){alert('Error ');}
			});
		}

		function deleteImpTask(taskid) {
			var urlink = base_url+'admin/deleteImpTaskDetail/'+taskid;
			dataString = $("#impTaskForm").serialize();

			$.ajax({
				type: "POST",
				url:urlink,
				data: dataString,
				success: function(data) {
					$('#viewImpTask').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
					$('#viewImpTask').html(data);	
				},
				error: function(){alert('Error ');}
			});
		}
		jQuery.noConflict();

		function showDropDownMenuAdmin(getId){
			$("#"+getId).toggle();
		}
		</script>
	</head> 
	<body class="cbp-spmenu-push">
		<div class="main-content">
			<!--left-fixed -navigation-->
			<div class=" sidebar" role="navigation">
				<div class="navbar-collapse">
					<?php
					if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
						function checkActiveSinglePage($getVal){
							if( isset($_GET['page']) ){
								if($_GET['page'] == $getVal){
									echo 'class="active"';
								}
							}
						}
						function checkActivePage($getV1,$getV2){
							if( isset($_GET['cp']) ){
								//echo $_GET['cp']; exit();
								if($_GET['cp'] == $getV2){
									echo 'class="active"';
								}
							}
						}
						function checkActiveParentPage($getV1){
							if( isset($_GET['pc']) ){
								if($_GET['pc'] == $getV1){
									echo 'style="display:block;"';
								}else{
									echo 'style="display:none;"';
								}
							}else{
								echo 'style="display:none;"';
							}
						}
						?>
						<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
							<ul class="nav" id="side-menu">
								<li><a href="<?= BASE_URL() ?>admin/"><i class="fa fa-home nav_icon"></i>Dashboard</a></li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('front-end-video-c-submenu')"><i class="fa fa-cogs nav_icon"></i>Frontend Videos Certifica:<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="front-end-video-c-submenu" <?php checkActiveParentPage('fvc'); ?>>
										<li><a href="<?= BASE_URL() ?>admin/video_certifications?category=frontend_video_certificate&page=frontend_video_certificate&pc=fvc&cp=fvc1" <?php checkActivePage('fvc', 'fvc1'); ?>><span class="glyphicon glyphicon-facetime-video"></span>All Frontend Videos</a></li>
										<?php
										$where_cat_id =  array('category' => 'frontend_video_certificate');
										$data_get_video_list =  $this->Catemodel->getdata_any_table_where($where_cat_id, 'video_certifications');
										if($data_get_video_list){
											$incree = 0;
											foreach($data_get_video_list as $video_list){
												$url        = $video_list->video_url;
												$step1      = explode('v=', $url);
												$step2      = explode('&',$step1[1]);
												$vedio_id   = $step2[0];
												if($vedio_id){
												?>
													<li><a href="<?= BASE_URL() ?>admin/single_video?category=frontend_video_certificate&page=frontend_video_certificate&pc=fvc&cp=fvc<?= $incree ?>&video_id=<?= $vedio_id ?>&video_title=<?= ucwords($video_list->title) ?>"><span class="glyphicon glyphicon-facetime-video"></span> <?= ucwords($video_list->title) ?></a></li>
													<?php
													$incree++;
												}
											}
										}
										?>
									</ul>
								</li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('site-management-submenu')"><i class="fa fa-cogs nav_icon"></i>Site Management <span class="nav-badge">4</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="site-management-submenu" <?php checkActiveParentPage('sm'); ?> >
										<li><a href="<?=SITE_URL?>admin/commonpagetemplate?pc=sm&cp=sm1" <?php checkActivePage('sm', 'sm1'); ?>><span class="glyphicon glyphicon-import"></span> Page Manager</a></li>
										<!--<li> <a href="<?=SITE_URL?>admin/manage_comments?pc=sm&cp=sm2" <?php checkActivePage('sm', 'sm2'); ?>><span class="glyphicon glyphicon-import"></span> Comments Manager</a></li>-->
										<li> <a href="<?=SITE_URL?>admin/emails_subscriber?pc=sm&cp=sm3" <?php checkActivePage('sm', 'sm3'); ?>><span class="glyphicon glyphicon-import"></span> Email Subscriber</a></li>
										<li> <a href="<?=SITE_URL?>admin/customs_design?pc=sm&cp=sm4" <?php checkActivePage('sm', 'sm4'); ?>><span class="glyphicon glyphicon-import"></span> Custom Design</a></li>
										<li> <a href="<?=SITE_URL?>footer_category_page_manager?pc=sm&cp=sm5" <?php checkActivePage('sm', 'sm5'); ?>><span class="glyphicon glyphicon-import"></span> Footer Main Page</a></li>
										<li> <a href="<?=SITE_URL?>footer_category_sub_page_manager?pc=sm&cp=sm6" <?php checkActivePage('sm', 'sm6'); ?>><span class="glyphicon glyphicon-import"></span> Footer Sub Page</a></li>
										<li> <a href="<?=SITE_URL?>admin/video_certifications?category=site_management&pc=sm&cp=sm7" <?php checkActivePage('sm', 'sm7'); ?>><span class="glyphicon glyphicon-facetime-video"></span> Video Certifications</a></li>
									</ul>
								</li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('master-management-submenu')"><i class="fa fa-cogs nav_icon"></i>Master Management <span class="nav-badge">4</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="master-management-submenu" <?php checkActiveParentPage('mm'); ?>>
										<li> <a href="<?=SITE_URL?>admin/rolex?pc=mm&cp=mm1" <?php checkActivePage('mm', 'mm1'); ?>><span class="glyphicon glyphicon-import"></span> Watches Mgmt.</a> </li>
										<li> <a href="<?=SITE_URL?>admin/brands?pc=mm&cp=mm2" <?php checkActivePage('mm', 'mm2'); ?>><span class="glyphicon glyphicon-import"></span> Manage Brands</a> </li>
										<li> <a href="<?=SITE_URL?>admin/jewelries_manager?pc=mm&cp=mm3" <?php checkActivePage('mm', 'mm3'); ?>><span class="glyphicon glyphicon-import"></span> Manage Jewelercart ™</a> </li>
										<li> <a href="<?=SITE_URL?>admin/video_certifications?category=master_management&pc=mm&cp=mm4" <?php checkActivePage('mm', 'mm4'); ?>><span class="glyphicon glyphicon-facetime-video"></span> Video Certifications</a></li>
									</ul>
								</li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('stuller-bands-submenu')"><i class="fa fa-cogs nav_icon"></i>Third Party Jewelry<span class="nav-badge">8</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="stuller-bands-submenu" <?php checkActiveParentPage('tpj'); ?>>
										<li><a <?php checkActivePage('tpj', 'tpj1'); ?> href="<?=SITE_URL?>engagement_rings_fashion_jewelry/stuller_engagement_rings_listing/view/engagement_rings/325?pc=tpj&cp=tpj1"><span class="glyphicon glyphicon-import"></span> Unique Settings</a> </li>
										<li><a <?php checkActivePage('tpj', 'tpj01'); ?> href="<?=SITE_URL?>star_collection_jewelry/star_collection_listing/view/star_collection/326?pc=tpj&cp=tpj01"><span class="glyphicon glyphicon-import"></span>Star Collection</a> </li>

										<li><a <?php checkActivePage('tpj', 'tpj2'); ?> href="<?=SITE_URL?>jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/337?pc=tpj&cp=tpj2"><span class="glyphicon glyphicon-import"></span> Overnight Mounting</a> </li>
										<li><a <?php checkActivePage('tpj', 'tpj3'); ?> href="<?=SITE_URL?>jcart_fashion_jewelry/virtual_boutique_diamond_listing/view/jewelercart/337?pc=tpj&cp=tpj3"><span class="glyphicon glyphicon-import"></span> Virtual Boutique</a> </li>

										<li><a <?php checkActivePage('tpj', 'tpd2'); ?> href="<?=SITE_URL?>jcart_fashion_jewelry/costar_listing/view/jewelercart/338?pc=tpj&cp=tpd2"><span class="glyphicon glyphicon-import"></span> Costar Jewelry</a> </li>
										<li><a <?php checkActivePage('tpj', 'tpd3'); ?> href="<?=SITE_URL?>jcart_fashion_jewelry/diamond_traces_listing/view/jewelercart/340?pc=tpj&cp=tpd3"><span class="glyphicon glyphicon-import"></span> FAM Collection</a> </li>
										<li><a <?php checkActivePage('tpj', 'tpd4'); ?> href="<?=SITE_URL?>jcart_fashion_jewelry/richard_cannon_listing/view/jewelercart/341?pc=tpj&cp=tpd4"><span class="glyphicon glyphicon-import"></span> Richard Cannon</a> </li>
										<li><a <?php checkActivePage('tpj', 'tpj2_2'); ?> href="<?=SITE_URL?>jcart_fashion_jewelry/quality_gold_listing/view/jewelercart/339?pc=tpj&cp=tpj2_2"><span class="glyphicon glyphicon-import"></span> Quality Gold </a> </li>
										<li><a <?php checkActivePage('tpj', 'tpj3'); ?> href="<?=SITE_URL?>admin/diamond_stuller_earing/wedding_bands_diamond?pc=tpj&cp=tpj3"><span class="glyphicon glyphicon-import"></span>Stuller Diamond Wedding Bands</a> </li>
										<li> <a <?php checkActivePage('tpj', 'tpj4'); ?> href="<?=SITE_URL?>admin/diamond_stuller_earing/wedding_bands_ladies?pc=tpj&cp=tpj4"><span class="glyphicon glyphicon-import"></span> Stuller Ladies Wedding Bands</a> </li>
										<li> <a <?php checkActivePage('tpj', 'tpj5'); ?> href="<?=SITE_URL?>admin/diamond_stuller_earing/wedding_bands_platinum?pc=tpj&cp=tpj5"><span class="glyphicon glyphicon-import"></span> Stuller Wedding Bands</a> </li>
										
										
										<li> <a <?php checkActivePage('tpj', 'tpj6'); ?> href="<?=SITE_URL?>admin/diamond_stuller_earing/wb_mens?pc=tpj&cp=tpj6"><span class="glyphicon glyphicon-import"></span> Stuller Men's Wedding Bands</a> </li>
										<li> <a <?php checkActivePage('tpj', 'tpj7'); ?> href="<?=SITE_URL?>admin/diamond_stuller_earing/wb_studs?pc=tpj&cp=tpj7"><span class="glyphicon glyphicon-import"></span> Stuller Diamond Stud Earrings</a> </li>
										<li> <a <?php checkActivePage('tpj', 'tpj8'); ?> href="<?=SITE_URL?>admin/diamond_stuller_earing/wb_hoops?pc=tpj&cp=tpj8"><span class="glyphicon glyphicon-import"></span> Stuller Diamond Hoops</a> </li>
										<li> <a <?php checkActivePage('tpj', 'tpj9'); ?> href="<?=SITE_URL?>admin/diamond_stuller_earing/gemstone?pc=tpj&cp=tpj9"><span class="glyphicon glyphicon-import"></span> Stuller Gemstone Earrings</a> </li>
										<li><a <?php checkActivePage('tpj', 'tpj10'); ?> href="<?=SITE_URL?>admin/diamond_stud_earing?pc=tpj&cp=tpj10"><span class="glyphicon glyphicon-import"></span> Stuller Diamond Stud Audit</a> </li>
										<li> <a <?php checkActivePage('tpj', 'tpj11'); ?> href="<?=SITE_URL?>admin/video_certifications?category=thrid_party_jewelery&pc=tpj&cp=tpj11"><span class="glyphicon glyphicon-facetime-video"></span> Video Certifications</a></li>
									</ul>
								</li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('market-places-submenu')"><i class="fa fa-cogs nav_icon"></i>Market Places <span class="nav-badge">4</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="market-places-submenu" <?php checkActiveParentPage('mp'); ?>>
										<li> <a <?php checkActivePage('mp','mp1_1'); ?> href="<?=SITE_URL?>admin/loosediamonds?pc=mp&cp=mp1_1"><span class="glyphicon glyphicon-import"></span> Market Filter</a> </li>
										<li><b>1. Diamonds</b></li>
										<li> <a <?php checkActivePage('mp','mp2'); ?> href="<?=SITE_URL?>admin/cert?pc=mp&cp=mp2"><span class="glyphicon glyphicon-import"></span> Diamond Certificates</a> </li>              
										<li> <a <?php checkActivePage('mp','mp3'); ?> href="<?=SITE_URL?>solitaire_image_uploader?pc=mp&cp=mp3"><span class="glyphicon glyphicon-import"></span> Solitaire Image Uploader</a> </li>
										<li> <a <?php checkActivePage('mp','mp4'); ?> href="<?=SITE_URL?>admin/admin/loosediamondshapes?pc=mp&cp=mp4"><span class="glyphicon glyphicon-import"></span> Diamond Shape Image Upload</a> </li>
										<li> <a <?php checkActivePage('mp','mp5'); ?> href="<?=SITE_URL?>admin/admin//owners?pc=mp&cp=mp5"><span class="glyphicon glyphicon-import"></span> Rapnet Companies</a> </li>
										<li> <a <?php checkActivePage('mp','mp6'); ?> href="<?=SITE_URL?>admin/loosediamonds?pc=mp&cp=mp6"><span class="glyphicon glyphicon-import"></span> Bulk Upload Diamonds</a> </li>
										<li> <a <?php checkActivePage('mp','mp7'); ?> href="<?=SITE_URL?>admin/rapnetDiamondsSearch?pc=mp&cp=mp7"><span class="glyphicon glyphicon-import"></span> Single Diamond Upload</a> </li>
										<li> <a <?php checkActivePage('mp','mp8'); ?> href="<?=SITE_URL?>admin/helixpriceQuality?pc=mp&cp=mp8"><span class="glyphicon glyphicon-import"></span> Diamond Price Manager</a> </li>
										<li> <a <?php checkActivePage('mp','mp9'); ?> href="<?=SITE_URL?>admin/rappent_logins_mgmt?pc=mp&cp=mp9"><span class="glyphicon glyphicon-import"></span> Rapnet Logins</a> </li>
										<li><b>2. Watches</b></li>
										<li> <a <?php checkActivePage('mp','mp10'); ?> href="<?=SITE_URL?>admin/rolex?pc=mp&cp=mp10"><span class="glyphicon glyphicon-import"></span> Watches Mgmt.</a> </li>
										<li> <a <?php checkActivePage('mp','mp11'); ?> href="<?=SITE_URL?>admin/brands?pc=mp&cp=mp11"><span class="glyphicon glyphicon-import"></span> Manage Brands</a> </li>
										<li> <a <?php checkActivePage('mp','mp12'); ?> href="<?=SITE_URL?>admin/inventory?pc=mp&cp=mp12"><span class="glyphicon glyphicon-import"></span> Watches Bulk Upload</a> </li>
										<li><b>3. Jewelry</b></li>
										<li> <a <?php checkActivePage('mp','mp13'); ?> href="<?=SITE_URL?>admin/jewelries_manager?pc=mp&cp=mp13"><span class="glyphicon glyphicon-import"></span> Jewelry Mgmt.</a> </li>
										<li> <a <?php checkActivePage('mp','mp14'); ?> href="<?=SITE_URL?>admin/jewelries_manager/add?pc=mp&cp=mp14"><span class="glyphicon glyphicon-import"></span> Jewelry Upload</a> </li>
										<li> <a <?php checkActivePage('mp','mp17'); ?> href="<?=SITE_URL?>admin/jewelriesinventory?pc=mp&cp=mp17"><span class="glyphicon glyphicon-import"></span> Bulk Jewelry Import</a> </li>
										<li><b>5.Market Place Login</b></li>
										<li><a href="https://sellercentral.amazon.com/gp/ezdpc-gui/inventory-status/status.html/ref=ag_invmgr_dnav_xx_" target="_blank">Manage Inventory</a></li>
										<li> <a <?php checkActivePage('mp','mp21'); ?> href="<?=SITE_URL?>admin/contentpage/ebaylogin?pc=mp&cp=mp21"><span class="glyphicon glyphicon-import"></span> Ebay Login</a></li>      
										<li> <a <?php checkActivePage('mp','mp22'); ?> href="<?=SITE_URL?>admin/contentpage/amazonlogin?pc=mp&cp=mp22"><span class="glyphicon glyphicon-import"></span> Amazon Login</a></li>   
										<li> <a <?php checkActivePage('mp','mp23'); ?> href="<?=SITE_URL?>admin/contentpage/etsylogin?pc=mp&cp=mp23"><span class="glyphicon glyphicon-import"></span> Etsy Login</a> </li>
										<li> <a <?php checkActivePage('mp','mp24'); ?> href="<?=SITE_URL?>admin/video_certifications?category=market_places?pc=mp&cp=mp24"><span class="glyphicon glyphicon-facetime-video"></span> Video Certifications</a></li>
									</ul>
								</li>
								<li><a href="<?=SITE_URL?>admin/loosediamondsii"><i class="fa fa-cogs nav_icon"></i>Market Place II</a></li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('e-commerce-submenu')"><i class="fa fa-cogs nav_icon"></i>E - Commerce <span class="nav-badge">4</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="e-commerce-submenu" <?php checkActiveParentPage('ec'); ?>>
										<li> <a <?php checkActivePage('ec', 'ec1'); ?> href="<?=SITE_URL?>admin/ideximport?pc=ec&cp=ec1"><span class="glyphicon glyphicon-import"></span> Upload Diamonds</a> </li>
										<li> <a <?php checkActivePage('ec', 'ec2'); ?> href="<?=SITE_URL?>admin/customers?pc=ec&cp=ec2"><span class="glyphicon glyphicon-import"></span> Manage Customers</a> </li>
										<li> <a <?php checkActivePage('ec', 'ec3'); ?> href="<?=SITE_URL?>admin/testimonial?pc=ec&cp=ec3"><span class="glyphicon glyphicon-import"></span> Testimonials</a> </li>
										<li> <a <?php checkActivePage('ec', 'ec4'); ?> href="<?=SITE_URL?>admin/coupon?pc=ec&cp=ec4"><span class="glyphicon glyphicon-import"></span> Coupon Manager</a> </li>
										<li> <a <?php checkActivePage('ec', 'ec5'); ?> href="<?=SITE_URL?>admin/feedbacks?pc=ec&cp=ec5"><span class="glyphicon glyphicon-import"></span> Feedback Manager</a> </li>
										<li> <a <?php checkActivePage('ec', 'ec6'); ?> href="<?=SITE_URL?>admin/video_certifications?category=e_commerce&pc=ec&cp=ec6"><span class="glyphicon glyphicon-facetime-video"></span> Video Certifications</a></li>
									</ul>
								</li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('diamonds-submenu')"><i class="fa fa-cogs nav_icon"></i>Diamonds <span class="nav-badge">4</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="diamonds-submenu" <?php checkActiveParentPage('diamonds'); ?>>
										<li> <a <?php checkActivePage('diamonds', 'rings'); ?> href="<?=SITE_URL?>admin/diamondsimport?pc=diamonds&cp=rings"><span class="glyphicon glyphicon-import"></span> Import Rings</a> </li>
										<li><a <?php checkActivePage('tpj', 'tpd3'); ?> href="<?=SITE_URL?>jcart_fashion_jewelry/vdbapp_listing/view/jewelercart/337?pc=tpj&cp=tpd3"><span class="glyphicon glyphicon-import"></span> vdbapp Diamonds</a> </li>
										<li><a <?php checkActivePage('diamonds', 'engagementrings'); ?> href="<?=SITE_URL?>admin/engagementrings_listing?pc=diamonds&cp=engagementrings"><span class="glyphicon glyphicon-import"></span> Engagement Rings</a></li>
									</ul>
								</li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('orders-submenu')"><i class="fa fa-cogs nav_icon"></i>Orders <span class="nav-badge">4</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="orders-submenu"  <?php checkActiveParentPage('order'); ?>>
										<li> <a <?php checkActivePage('order','order1'); ?> href="<?=SITE_URL?>admin/order?pc=order&cp=order1"><span class="glyphicon glyphicon-import"></span> Website Fullfillments</a> </li>
										<li> <a <?php checkActivePage('order','order3'); ?> href="<?=SITE_URL?>admin/video_certifications?category=orders&pc=order&cp=order3"><span class="glyphicon glyphicon-facetime-video"></span> Video Certifications</a></li>
									</ul>
								</li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('ez-pay-configuration-submenu')"><i class="fa fa-cogs nav_icon"></i>EZ Pay Configuration <span class="nav-badge">4</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="ez-pay-configuration-submenu" <?php checkActiveParentPage('ezc'); ?> >
										<li> <a <?php checkActivePage('ezc','ezc1'); ?> href="<?=SITE_URL?>admin/ezpay?pc=ezc&cp=ezc1"><span class="glyphicon glyphicon-import"></span> Ezpay Configuration</a> </li>
										<li> <a <?php checkActivePage('ezc','ezc2'); ?> href="<?=SITE_URL?>admin/catamanager?pc=ezc&cp=ezc2"><span class="glyphicon glyphicon-import"></span> Category Manager</a> </li>
										<li> <a <?php checkActivePage('ezc','ezc3'); ?> href="<?=SITE_URL?>admin/catamanager?pc=ezc&cp=ezc3"><span class="glyphicon glyphicon-import"></span> Price Manager</a> </li>
										<li> <a <?php checkActivePage('ezc','ezc4'); ?> href="<?=SITE_URL?>admin/video_certifications?category=ez_pay_configuration&pc=ezc&cp=ezc4"><span class="glyphicon glyphicon-facetime-video"></span> Video Certifications</a></li>
									</ul>
								</li>
								<li>
									<a href="#" onclick="showDropDownMenuAdmin('inventory-management-submenu')"><i class="fa fa-cogs nav_icon"></i>Inventory $ Management<span class="nav-badge">4</span> <span class="fa arrow"></span></a>
									<ul class="nav nav-second-level" id="inventory-management-submenu" <?php checkActiveParentPage('iam'); ?> >
										<li> <a <?php checkActivePage('iam','iam1'); ?> href="<?=SITE_URL?>engagement_rings_fashion_jewelry/stuller_engagement_rings_listing/view/engagement_rings/325?pc=iam&cp=iam1"><span class="glyphicon glyphicon-import"></span> Unique Settings</a> </li>
										<li> <a <?php checkActivePage('iam','iam1'); ?> href="<?=SITE_URL?>admin/inventory_mgnt?pc=iam&cp=iam2"><span class="glyphicon glyphicon-import"></span> Stuller</a> </li>
										<li> <a <?php checkActivePage('iam','iam1'); ?> href="<?=SITE_URL?>admin/inventory_mgnt?pc=iam&cp=iam3"><span class="glyphicon glyphicon-import"></span> Quality Gold</a> </li>
										<li> <a <?php checkActivePage('iam','iam1'); ?> href="<?=SITE_URL?>admin/helixprice?pc=iam&cp=iam4"><span class="glyphicon glyphicon-import"></span> Rapnet</a> </li>
										<li> <a <?php checkActivePage('iam','iam1'); ?> href="<?=SITE_URL?>admin/jewelries_manager?pc=iam&cp=iam5"><span class="glyphicon glyphicon-import"></span> Jeweler Cart</a> </li>
										<li> <a <?php checkActivePage('iam','iam6'); ?> href="<?=SITE_URL?>admin/video_certifications?category=inventory_management&pc=iam&cp=iam6"><span class="glyphicon glyphicon-facetime-video"></span> Video Certifications</a></li>
									</ul>
								</li>
								<li><a href="<?=SITE_URL?>admin/profile_mgmt"><i class="fa fa-sign-out"></i> Profile</a></li>
								<li><a href="<?=SITE_URL?>admin_order_summary/order_summary_details"><i class="fa fa-sign-out"></i> Sales Report</a></li>
								<li><a href="<?=SITE_URL?>home_page_mgmt/manage_cover_page"><i class="fa fa-sign-out"></i> Edit Cover Pages</a></li>
								<?php /* <li><a href="<?=SITE_URL?>home_page_mgmt/manage_home_page"><i class="fa fa-sign-out"></i>  Edit Cover Images</a></li>
								<li><a href="<?=SITE_URL?>home_page_mgmt/manage_cover_page2"><i class="fa fa-sign-out"></i> Manage Cover Pages New</a></li> */ ?>
								<li><a href="<?=SITE_URL?>admin/customers"><i class="fa fa-sign-out"></i> Retail Users</a></li>
								<li><a href="<?=SITE_URL?>admin/affiliate_customers"><i class="fa fa-sign-out"></i> Affiliate Users</a></li>
								<li><a href="<?= SITE_URL() ?>account/signout"><i class="fa fa-sign-out"></i> Logout</a></li>
							</ul>
						</nav>
					<?php } ?>
				</div>
			</div>
			<!--left-fixed -navigation-->
			<!-- header-starts -->
			<div class="sticky-header header-section ">
				<div class="header-left">
					<!--logo -->
					<div class="logo">
						<a href="<?= BASE_URL() ?>admin">
							<h1>ADMIN</h1>
							<span>Diamonds</span>
						</a>
					</div>
					<!--//logo-->

					<!--toggle button start-->
					<button id="showLeftPush"><i class="fa fa-bars"></i></button>
					<!--toggle button end-->

					<!--search-box-->
					<div class="search-box">
						<form class="input">
							<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
							<label class="input__label" for="input-31">
								<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
									<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
								</svg>
							</label>
						</form>
					</div>
					<!--//end-search-box-->

					<div class="top-simple-menu">
						<a href="<?= SITE_URL() ?>" target="_blank" style="color:#fff;">Visit Site</a>
						<?php if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) { ?>
							<a href="<?= SITE_URL() ?>admin/logout" style="color:#fff;" target="_blank">Logout</a>
						<?php } ?>
					</div>

					<div class="clearfix"> </div>
				</div>
				<div class="header-right">
					<!--notifications of menu start -->
					<div class="profile_details_left">
						<ul class="nofitications-dropdown"></ul>
						<div class="clearfix"> </div>
					</div>
					<!--notification menu end -->
					<div class="profile_details">		
						<?php if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) { ?>
							<ul>
								<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" onclick="showDropDownMenuAdmin('top-profile-submenu')">
										<div class="profile_img">	
											<span class="prfil-img"><img src="<?= BASE_URL() ?>new-admin/images/a.png" alt=""> </span> 
											<div class="user-name">
												<p>Hi</p>
												<span>Administrator</span>
											</div>
											<i class="fa fa-angle-down lnr"></i>
											<i class="fa fa-angle-up lnr"></i>
											<div class="clearfix"></div>	
										</div>	
									</a>
									<ul class="dropdown-menu drp-mnu" id="top-profile-submenu" style="display:none;">
										<li> <a href="<?=SITE_URL?>admin/profile_mgmt"><i class="fa fa-user"></i> Profile</a> </li> 
										<li> <a href="<?=SITE_URL?>admin/video_certifications?category=fonrend_video_certificate&page=fonrend_video_certificate&pc=fvc&cp=fvc1"><i class="fa fa-question-circle"></i> Help</a> </li> 
										<li> <a href="<?=SITE_URL?>admin/websites_theme"><i class="fa fa-bars"></i> Website Theme</a> </li> 
										<li> <a href="<?=SITE_URL?>" target="_blank"><i class="fa fa-bars"></i> Visit Website</a> </li> 
										<li> <a href="<?= SITE_URL() ?>admin/logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
									</ul>
								</li>
							</ul>
						<?php } ?>
					</div>
					<div class="clearfix"> </div>				
				</div>
				<div class="clearfix"> </div>	
			</div>
			<!-- //header-ends -->

			<!-- main content start-->
			<div id="page-wrapper">
				<div class="main-page">