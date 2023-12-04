</div>
<div>
	<link href="<?php echo SITE_URL; ?>collection_detail/heart_collection_detail_1.css" rel="stylesheet" />
	<style>
	.js__another_popup{margin-top:45px}
	.set_ezpay label{font-size:12px;font-weight:700;width:100px}
	.set_ezpay span input[type="radio"]{margin:0 6px 0 0}
	.set_steps_bar{display:none}
	#ringsthumb_view{border:0 solid #ccc}
	.detail_right{width:57%}
	.top_bar_cart{max-width:100%;top:0;left:0}
	.container2{width:100%;margin:0 auto;padding:0 15px;background:#E9E9E9}
	.diamondViewDetail{padding-top:50px}
	.bread_crumb_list a{color:#666!important}
	.content{background:#E9E9E9}
	.detail-accordion{background:#E9E9E9}
	.moredetail_bgblock{background:#E9E9E9;padding:25px 0}
	.cut_diamond{font-size:inherit;font-weight:inherit;line-height:inherit;margin-bottom:inherit}
	h1.product-title{padding-left:0;color:#222;line-height:35px}
	.nile-button-black{background-color:#000;text-align:center;color:#fff;padding:13px 0;width:70%;margin:10px 0 20px}
	ul{margin:0}
	.set_diamond_carat{padding:5px 0}
	.rings_block .ring_cols{border:1px solid #fff;padding:10px 0 0;background-color:#fff!important;border-right:solid 10px #E9E9E9!important;padding-bottom:20px;font-size:16px!important}
	.details_tab_right{font-size:13px!important}
	.similar_diamonds{background:#E9E9E9;padding:30px 15px}
	@media only screen and (max-width: 768px) {
	.diamondViewDetail{padding-top:60px}
	.images-box-area img{width:100%!important}
	.detail_right{width:100%!important}
	.container2{padding:0 1px}
	}
	select#metal_type{padding:5px!important;}
	</style>
	<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
	<script>
	var $ = jQuery.noConflict();
	function view_simple_popup(block_vid) {
		$('#pop_' + block_vid).simplePopupBlock();
	}

	function getRingSize(field_id) {
		var mt = document.getElementById(field_id).value;
		window.location = mt;  
	}

	function ringThumbView(th_url) {
		$('#ringsthumb_view .sp').hide();
		$('#show_thumb_view').html('Loading.....');
		$('#show_thumb_view').html('<img src="'+th_url+'" onmouseover="show_magnify_affect(\'show_thumb_view\')" alt="" />');
		$('#show_thumb_view').zoom();
	}

	///// show and hide product deail tabs
	function show_tabs_block_detail(blockid) {
		var idar_list = ["product_details", "customer_reviews", "ask_questins", "similar_products", "policies"];
		$('#'+blockid).show();
		for(var i=0; i < idar_list.length; i++) {
			if( idar_list[i] !== blockid ) {
				$('#'+idar_list[i]).hide();
			}
		}
	}

	//// onclick show and hide block
	function show_hide_block() {

    }

	function commentsThisPost() {
		var urlink = base_url+'site/postRingComents';
		dataString = $("#coment_form").serialize();
		var fname = $('#full_name').val();
		var em = $('#email_adres').val();
		var coments = $('#tr_comments').val();
		var eror = '';
		<?php if(!$this->session->isLoggedin()){ ?>
			$('#view_errors').html('Plz login to your account first to comments this product!');
			return false
		<?php } ?>
		if(fname == '') {
			$('#full_name').focus();
			$('#view_errors').html('Please enter your Full name!');
			return false
		}
		if(em == '') {
			eror = 'Please enter your email address!';
			$('#email_adres').focus();
			$('#view_errors').html('Please enter your email address!');
			return false
		}
		if(coments == '') {
			$('#tr_comments').focus();
			$('#view_errors').html('Please enter your comments!');
			return false
		}
		$("#view_coments").html('');

		$.ajax({
			type: "POST",
			url:urlink,
			data: dataString,
			success: function(data) {
				$('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif" alt="loading"></div>');
				$("#view_errors").html(data);
				$('#tr_comments').val('');
				$('#cmb_rating').val('');
			},
			error: function(){alert('Error ');}
		});
	}

	$(document).ready(function() {
		function close_accordion_section() {
			$('.accordion .accordion-section-title').removeClass('active');
			$('.accordion .accordion-section-content').slideUp(300).removeClass('open');
		}

		$('.accordion-section-title').click(function(e) {
			// Grab current anchor value
			var currentAttrValue = $(this).attr('href');
			if($(e.target).is('.active')) {
				close_accordion_section();
			}else {
				close_accordion_section();
				// Add active class to section title
				$(this).addClass('active');
				// Open up the hidden content panel
				$('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
			}
            e.preventDefault();
		});
	});

	function addcartsubmit(pageURL){
		document.getElementById('form1_detail').action = pageURL;
		document.getElementById('form1_detail').submit();
    }

	function setListingPage(option_value) {
		window.location = option_value;
	}

	function set_detail_blocks(id_block) {                    
		var bk = ["diamond_detail_bk", "ring_detail_bk"];
		var link_bk = ["diamonds_link", "rings_link"];
		for(var i=0; i < bk.length; i++) {
			if( bk[i] === id_block ) {
				$('#'+bk[i]).show();
				$('#'+link_bk[i]).addClass('sel_active_tabs');
			} else {
				$('#'+bk[i]).hide();
				$('#'+link_bk[i]).removeClass('sel_active_tabs');
			}
		}
	}
	</script>
	<script>
	$(document).ready(function() { 
		$('#topbar_block').click(function() {
			$('html,body').animate({ scrollTop: 0 }, 1000);
			return false;
		});
	});
	$(document).scroll(function () {
		//Show element after user scrolls 800px
		var y = $(this).scrollTop();
		if (y > 200) {
			$('.topbar_section').fadeIn();
        } else {
            $('.topbar_section').fadeOut();
        }                
	});
	</script>
	<link type="text/css" href="<?php echo SITE_URL; ?>css/zoom_jquery.css" rel="stylesheet" />
	<script src="<?php echo SITE_URL; ?>js/jquery.zoom.js"></script>
	<script>
	$(document).ready(function(){
		$('.sp').zoom();
		$('#show_thumb_view').zoom();
	});
	</script>
	<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
	<script>
	var $ = jQuery.noConflict();
	function printCurrPage() {
		window.print();
	}
	$(function() {
		$(".js__p_start, .js__p_another_start").simplePopup();
	});
	</script>
	<div class="diamondViewDetail container2 uniqueRingDetail">
		<?php
		$options_list = array('addpendantsetings3stone','tothreestone');

		$addring_link = config_item('base_url').'engagement/engagement_ring_settings/'.$lot.'/addtoring';
		$option_setting = setOptionValue($addoption);
		$diamondOption = ( ( $addoption == 'false' || $addoption === 'addjewelry' ) ? 'rapnet' : $addoption );
		$addring_pairlink = config_item('base_url').'diamonds/search/true/false/'.$option_setting.'/false/'.$lot;
		$priceRetail = $rowsring['retail_price'];

		$get_diamond_price      = $our_price;
		$full_price				= $our_price;
        $get_carat_value_d_i    = 0;
        $get_cert_no            = '6157024136';
        $get_lab                = 'GIA';
        $get_color              = !empty($rowsring['color'])?$rowsring['color']:'D to L';
        $get_clarity            = !empty($rowsring['clarity'])?$rowsring['clarity']:'VVS1 to SI2';
        $get_uid_find_dia       = '306710';
        $get_Meas_value         = '-';
        $get_measure            = '';
        $get_shape_find_dia     = 'B';
        $get_Stock_n            = '94423274';
		$suport_shape			= 'Support any shape';
		$carat_margin			= '22.22em';
		?>
		<style>
		.diamond_carat_bg{background: url('<?php echo SITE_URL; ?>img/david_home/diamond_search/carat_diamond_bg_view.jpg') center no-repeat; width: 100%; height: 137px;}
		.diamond_carat_bg div{background: url('<?php echo SITE_URL; ?>img/david_home/diamond_search/carat_bg_value.png') left no-repeat; width: 189px; height: 159px; display: inline-block; margin:5.4em 0px 0px <?php echo $carat_margin; ?>;}
		.diamond_carat_bg div span{display: inline-block; font-size: 20px; padding: 4.4em 0px 0px 30px; color:#fff;}
		.ringsize span:first-child{width:130px !important;}
		</style>
		<div class="moredetail_bgblock daviddt_block">
			<div class="container2">
				<div class="set_steps_bar" id="builder_stpes_bar"><img src="<?php echo SITE_URL; ?>		img/heart_diamond/ring_builder_steps.jpg" alt="ring_builder_steps" /></div>
				<div class="detail_column">
					<div class="detail_center col-sm-5">
						<div class="clear"></div>
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">

						<div class="tz-gallery-collection">
							<?php 
							$make_html = '';
							if(!empty($rowsring['video_link']) && (strpos($rowsring['video_link'], '.mp4') !== false)){
								$gallery_videos1 = explode(";",$rowsring['video_link']);
								$gallery_videos = array_unique($gallery_videos1);
								if(!empty($gallery_videos)){
									if(file_exists('images/'.$gallery_videos[0])){
										$make_html .= '<a class="lightbox" id="light_a" href="'.$ringimg.'"><img alt="diamonds-img" id="light_img" class="" src="'.$ringimg.'" style="margin: 0px 0px;width:100%;" /><video width="100%" height="700" controls autoplay><source src="'. SITE_URL .'images/'. str_replace("3-stone/","",$gallery_videos[0]) .'" type="video/mp4">Your browser does not support the video tag.</video></a><br>';
									}else{
										$make_html .= '<a class="lightbox" id="light_a" href="'.$ringimg.'"><img alt="diamonds-img" id="light_img" class="" src="'.$ringimg.'" style="margin: 0px 0px;width:100%;" /><video width="100%" height="700" controls autoplay><source src="'. SITE_URL .'images/'. str_replace("3-stone/","",$gallery_videos[1]) .'" type="video/mp4">Your browser does not support the video tag.</video></a><br>';
									}
									$make_html .= '<script type="text/javascript">
									$("a#light_a img").hide();
									</script>';
								}else{
									$make_html .= '<a class="lightbox" id="light_a" href="'.$ringimg.'"><img alt="diamonds-img" id="light_img" class="" src="'.$ringimg.'" style="margin: 0px 0px;width:100%;" /></a><br><br>';
								}
							}else{
								$make_html .= '<a class="lightbox" id="light_a" href="'.$ringimg.'"><img alt="diamonds-img" id="light_img" class="" src="'.$ringimg.'" style="margin: 0px 0px;width:100%;" /></a><br><br>';
							}
							if(!empty($addition_images)){
								$gallery_imgs1 = explode(";",$addition_images);
								$gallery_imgs = array_unique($gallery_imgs1);
								if(!empty($gallery_imgs)){
									foreach($gallery_imgs as $gallery_img1){
										if (strpos($gallery_img1, '.jpg') !== false) {
											if(file_exists($image_path.str_replace("THUMBNAIL/","",$gallery_img1))){
												$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs'.$rowsring['id'].'(\''. SITE_URL .$image_path.str_replace("THUMBNAIL/","",$gallery_img1) .'\')"> <img src="'. SITE_URL .$image_path.str_replace("THUMBNAIL/","",$gallery_img1) .'" style="width:55px;height:55px;display: inherit;" alt="'.$rowsring['description'].'" /></a>';
											}
										}
									}
									$make_html .= '<a href="javascript:void(0);" onclick="showhidevideo'.$rowsring['id'].'()"><img src="'. SITE_URL .'images/videoimage.jpg" style="width:55px;height:55px;display: inherit;" alt="Show play" /></a>';
									$make_html .= '<script type="text/javascript">
									function ch_imgs'.$rowsring['id'].'(img_src){
										$("a#light_a video").hide();
										$("a#light_a img").show();
										$("#light_img").attr("src", img_src);
										$("#light_a").attr("href",img_src);
									}
									function showhidevideo'.$rowsring['id'].'(){
										if($("a#light_a video").css("display") == "none"){
											$("a#light_a img").hide();
											$("a#light_a video").show();
										} else { 
										   $("a#light_a video").hide();
										   $("a#light_a img").show();
										}
									}
									</script>';
									echo $make_html;
								}else{
								?>
									<img src="<?php echo $ringimg; ?>" style="width:55px;height:55px;" alt="<?php echo $rowsring['description']; ?>" />
								<?php } ?>
							<?php } ?>
						</div>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
						<script>
						baguetteBox.run('.tz-gallery-collection');
						</script>
						<div style="height:30px;"></div>
						<h3 style="text-align:left;font-size:23px;">
							<span class="price-message">
								<?php !empty($rowsring['name'])?'This ring was made with '.$rowsring['name']:''; ?>
							</span>
						</h3>
						<div class="clear"></div><br>
					</div>       

					<form name="form1_detail" id="form1_detail" method="post" action="">
						<div class="detail_right col-sm-7">
							<div class="cut_diamond">
								<h1 class="product-title" itemprop="name">
									DiamondBayou.com <?php echo $rowsring['description']; ?>
								</h1>
								<div class="clear"></div><br>
								<div><?php echo $rowsring['descriptionNdetails'];?></div>
							</div>
							<div class="prices_label" id="price_label" style="border-bottom: solid 1px #cccccc;padding-bottom: 12px !important;margin-top: 13px;">
								<?php 
								/* $full_price = $priceRetail;
								if($full_price < 150){ ?>
									<a href="tel:<?php echo CONTACT_NO ?>" style="width: 100%;color:#666;font-size:20px;" id="addtoshopping">Please Call <?php echo CONTACT_NO ?> to Confirm Price</a>
								<?php }else{ */?>
									<span style="color:gray;font-size: 28px;text-decoration: line-through;line-height: 1.8;" id="show_real_price">
										<span>Retail Price:</span>
										<span style="font-weight: bold;">$<?php echo _nf($priceRetail, 0); ?></span>
									</span> &nbsp;&nbsp;&nbsp;&nbsp;<br>
									<span style="color:gray;font-size: 26px;" id="show_real_price">
										<span>OUR PRICE:</span>
										<span style="font-weight: bold;">$<?php echo _nf($our_price, 0); ?></span>
									</span>
								<?php /* } */ ?>
							</div><br>
							<span id="show_real_price_msg"></span>
							<div class="learn_about">
								<div class="further_dtcols" style="display:none;">
									<span>Retail Price</span>
									<span><strike>$ <?php echo _nf($priceRetail, 2); ?></strike> <span>save <?php echo $saving_percent; ?>%</span></span>
								</div>    
								<div class="clear"></div><br>
							</div>
							<div class="further_dtcols metalsection ringsize set_ezpay">
								<span>Ez Pay :</span>
								<script>
								function selectEzPay(){
									var ez_payments     = $("#ez_payments").val();
									var get_real_price  = $("#get_real_price").val();
									if(ez_payments == 3){
										var show_real_price = $("#3ez_price").val();
										$("#show_real_price_msg").html('Pay $'+show_real_price+' today and $'+show_real_price+' for the next 2 months then we will ship product');
									}else if(ez_payments == 5){
										var show_real_price = $("#5ez_price").val();
										$("#show_real_price_msg").html('Pay $'+show_real_price+' today and $'+show_real_price+' for the next 4 months then we will ship product');
									}else{
										var show_real_price = $("#main_ez_price").val();;
										$("#show_real_price_msg").html('');
									}
									$("#show_real_price").html('$'+show_real_price);
								}
								</script>
								<select name="ez_payments" id="ez_payments" class="form-control" onChange="selectEzPay()">
									<option value="0">Full Price - $<?php echo _nf($our_price, 0) ; ?></option>
									<option value="<?php echo $first_ez_value; ?>"> <?php echo $first_ez_value; ?>ez - $<?php echo _nf($full_price/$first_ez_value, 2); ?></option>
									<option value="<?php echo $second_ez_value; ?>"> <?php echo $second_ez_value; ?>ez - $<?php echo _nf($full_price/$second_ez_value, 2); ?></option>
								</select> 
								<input type="hidden" id="3ez_price" value="<?php echo _nf($full_price/$first_ez_value, 2); ?>">
								<input type="hidden" id="5ez_price" value="<?php echo _nf($full_price/$second_ez_value, 2); ?>">
								<input type="hidden" id="main_ez_price" value="<?php echo _nf($full_price, 2) ; ?>">
							</div>
							<div class="further_dtcols metalsection ringsize">
								<span>Available in sizes</span>
								<span>
									<select name="metal_type" id="metal_type" onchange="setListingPage(this.value)">
										<?php echo $finger_ring_size; ?>
									</select>
								</span>
							</div>
							<div class="clear"></div>

							<div class="metal_list_box">
								<div class="set_metal_label">Metal &ndash;
									<b><?php echo $rowsring['metal']; ?></b>
								</div>
								<?php 
								$req_param1 = '';
								if(!empty($_GET['diamond_lot'])){
									$req_param1 = '?diamond_lot='.$_GET['diamond_lot'];
								}
								if(!empty($_GET['ring_size'])){
									if(empty($req_param1)){
										$req_param1 = '?ring_size='.$_GET['ring_size'];
									}else{
										$req_param1 .= '&ring_size='.$_GET['ring_size'];
									}
								}
								?>
								<ul class="set_metals_list">
									<li>
										<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $rowsring['id'];?>/1/14KP/<?php echo $req_param1;?>"><img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_2.jpg" alt="metal_icons_2" /></a>
									</li>
									<li>
										<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $rowsring['id'];?>/1/18KP/<?php echo $req_param1;?>"><img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_5.jpg" alt="metal_icons_5" /></a>
									</li>
									<li>
										<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $rowsring['id'];?>/1/PLAT/<?php echo $req_param1;?>"><img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_4.jpg" alt="metal_icons_4" /></a>
									</li>
								</ul>
							</div>

							<?php /* <div class="metal_list_box">
								<ul class="set_diamond_carat">
									<?php
									$req_param1 = '';
									if(!empty($_GET['diamond_lot'])){
										$req_param1 = '&diamond_lot='.$_GET['diamond_lot'];
									}
									if(!empty($_GET['ring_size'])){
										$req_param1 .= '&ring_size='.$_GET['ring_size'];
									}
									$diamond_carat_list = '';
									$ring_metal_type = $rowsring['metal'];
									if($ring_metal_type == ''){
										$ring_metal_type = 'PLAT';
									}

									$ch_stone = '';
									if(empty($ch_stone)){
										for($i=1; $i <= 4; $i++) {
											if($i == 1){
												$carat_number = '0.25';
											}else if($i == 2){
												$carat_number = '0.5';
											}else if($i == 3){
												$carat_number = '0.75';
											}else if($i == 4){
												$carat_number = '1';
											}
										
											if(isset($_GET['carat'])){
												if($_GET['carat'] == $carat_number){
													$active_carat = 'set_active_carat';
												}else{
													$active_carat = '';
												}
											}else{
												$active_carat = '';
											}
											$diamond_carat_list .= '<li class="'.$active_carat.'">
												<a href="'.SITE_URL.'selection/engagement-rings-detail/'.$rowsring['id'].'/1/'.$ring_metal_type.'/?carat='.$carat_number.$req_param1.'">
													<img src="'.SITE_URL.'img/heart_diamond/diamond_carat_'.$i.'.jpg" alt="" />
												</a>
											</li>';
										}
									}
									echo $diamond_carat_list;
									?>
								</ul>
							</div> */ ?>

							<div class="clear"></div>
							<div class="price-and-purchase">     
								<div class="price-with-button force-wrap" data-smart-wrap="true">
									<div class="price-display">
										<div class="regular-price">
											<span class="price" itemprop="price" content="<?php echo _nf($priceRetail, 0) ; ?>">$<?php echo _nf($priceRetail, 0) ; ?></span>
										</div> 
										<div style="text-align:right;font-size:15px;">
											<span class="price-message">(Price with <?php if(isset($_GET['carat'])){ echo $_GET['carat']; }else{ echo str_replace(" Carat"," ",$rowsring['diamond_weight']); } ?> Center Carat)</span><br>
											<a href="<?php echo SITE_URL ?>selection/engagement-rings-detail/<?php echo $rowsring['id']; ?>">
												<span class="price-message">
													<?php $req_stone = ''; ?>
													This ring was made with <?php 
													$additional_stones_ex = explode('/', $rowsring['stone_shape']);
													$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
													$additional_stones_secound_item = explode('x', $additional_stones_first_item['1']);

													echo $req_stone = $rowsring['stone_shape'].' '.$rowsring['cut'];

													if($additional_stones_ex['1'] == 'R' OR $additional_stones_ex['1'] == 'RD'){
														echo ' (Round Cut)';
													}else if($additional_stones_ex['1'] == 'A' OR $additional_stones_ex['1'] == 'AS'){
														echo ' (Asscher Cut)';
													}else if($additional_stones_ex['1'] == 'EC'){
														echo ' (Emerald Cut)';
													}else if($additional_stones_ex['1'] == 'PR'){
														echo ' (Princes Cut)';
													}else if($additional_stones_ex['1'] == 'H'){
														echo ' (Heart Cut)';
													}else if($additional_stones_ex['1'] == 'c' OR $additional_stones_ex['1'] == 'cu' OR $additional_stones_ex['1'] == 'C' OR $additional_stones_ex['1'] == 'CU'){
														echo ' (Cushion Cut)';
													}else if($additional_stones_ex['1'] == 'ma' OR $additional_stones_ex['1'] == 'MA'){
														echo ' (Marquise Cut)';
													}
													?>
												</span>
											</a>
										</div>
										<div style="text-align:right;font-size:17px;">
											<?php
											$white_color_array = array('D','E','F','G','H','I','J');
											if(in_array($get_color, $white_color_array)){
												$get_color_diamond = 'white';
											}else{
												$get_color_diamond = 'yellow';
											}
											?>
											<a href="#javascript" onclick="setHDIndexDiamondLists('<?php echo $get_uid_find_dia; ?>', '<?php echo $get_shape_find_dia; ?>', '<?php echo $get_color_diamond; ?>', '14k_gold', 0, '1920', '<?php echo $rowsring['id'];?>', '<?php echo $rowsring['metal']; ?>','<?php echo _nf($priceRetail, 0);?>','<?php if(isset($_GET['carat'])){ echo $_GET['carat']; }else{ echo str_replace(" Carat"," ",$rowsring['diamond_weight']); } ?>')">(Need More Center Diamond Options? Click Diamond Finder &trade;)</a>
											<?php if(!empty($_GET['carat'])){ ?>
												<input type="hidden" value="<?php echo $_GET['carat'];?>" id="ch_cart1">
											<?php }else{?>
												<input type="hidden" value="" id="ch_cart1">
											<?php }?>
											<input type="hidden" value="<?php echo $req_stone;?>" id="req_stone1">
										</div>
									</div>
								</div>    
							</div> 
							<div class="clear"></div><br>
							<div class="set_buton_bg col-sm-10">
							<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $setingtype; ?>">
							<input type="hidden" name="3ez_price" value="0">
							<input type="hidden" name="5ez_price" value="0">
							<input type="hidden" name="main_price" id='main_price' value="<?php echo $priceRetail; ?>" />
							<input type="hidden" name="price" value="<?php echo $priceRetail; ?>" />
							<input type="hidden" name="vender" value="unique">
							<input type="hidden" name="url" value="<?php echo $ringimg; ?>">
							<input type="hidden" name="prodname" value="<?php echo $rowsring['description']?>">
							<input type="hidden" name="diamnd_count" value="">
							<input type="hidden" name="ring_shape" value="Support any shape">
							<input type="hidden" name="ring_carat" value="">
							<input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['id'];?>">
							<input type="hidden" name="stock_number" id="stock_number" value="">
							<input type="hidden" name="diamond_cert_no" id="diamond_cert_no" value="<?php echo $get_cert_no; ?>">
							<input type="hidden" name="txt_ringtype" value="generic_ring">
							<input type="hidden" name="txt_ringsize" value="" />
							<input type="hidden" name="txt_metal" value="14KP" />
							<input type="hidden" name="metals_weight" value="" />
							<input type="hidden" name="vendors_name" value="Unique Setting" />
							<input type="hidden" name="vendor_number" value="(888) 731 - 1111" />
							<input type="hidden" name="table_name" value="dev_index" />
							<input type="hidden" name="item_title" value="<?php echo $rowsring['description']; ?> by <?php echo $get_lab; ?> Diamond Engagement Ring" />
							<input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
							<input type="hidden" name="product_type" value="Engagement Rings" />
							<input type="hidden" name="center_stone_id" id="center_stone_id" />
							<input type="hidden" name="txt_qty" value="1" />
							<?php 
							if($full_price < 150){ ?>
								<a href="tel:<?php echo CONTACT_NO ?>" class="button_link" style="width: 100%;" id="addtoshopping">Please Call <?php echo CONTACT_NO ?> to Confirm Price</a>
							<?php }else{ ?>
								<a href="#javascript" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping"><div class="nile-button-black">ADD TO SHOPPING BAG</div></a>
							<?php } ?>
						</div>
					</form>  
					<div class="clear"></div><br>
					<div id="center_stone_list"></div>
					<br>
					<div class="clear"></div><br>
					<div class="learn_about">
						<div class="dataseting">
							Order Today for Engagement Ring Delivery on <?php echo nextDate(11); ?> <?= date('Y') ?>
						</div>
					</div>
					<div class="review-and-social">
						<div class="product-rating-stars " data-action="scroll-to-review">
							<div class="offer-rating">
								<div></div>
								<div class="rating-values"></div>
							</div>
							<div class="review-count" data-review-count="9"></div>
						</div>
						<div class="social-icons">
							<div class="group-of-icons"> 
								<a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_1.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
								<a href="https://twitter.com/hashtag/heartsanddiamonds" target="_blank"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_2.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
								<a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_3.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
								<a href="https://www.facebook.com/HeartsandDiamondsJewelry/" target="_blank"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_4.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
								<a href="#javascript" onclick="printThisPage()"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_5.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
								<a href="#javascript" class="js__p_another_start"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_6.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
								<button class="icon-share" data-hasqtip="1"></button>
							</div>
						</div>
					</div>
					<div class="clear"></div><br>
					<div id="details-and-purchase">
						<div class="detail_bk_row first_item_d_rin">
						<div class="detail_left_cols">Stock Number</div><div class="detail_right_cols"><?php echo $rowsring['item_number']; ?></div><div class="clear"></div>
						</div>

						<?php if($row_cate['parent_cid'] == 63 OR $row_cate['parent_cid'] == 69 OR $row_cate['parent_cid'] == 67 OR $row_cate['parent_cid'] == 57 OR $row_cate['parent_cid'] == 71 OR $row_cate['parent_cid'] == 73){ ?>

						<?php }else{ ?>

						<div class="detail_bk_row">
						<div class="detail_left_cols">TYPE</div><div class="detail_right_cols">Diamond</div><div class="clear"></div>
						</div>

						<?php if($rowsring['additional_stones'] == ''){ ?>

						<?php }else{ ?>
					<div class="detail_bk_row">
						<div class="detail_left_cols">Center Diamond Shape</div><div class="detail_right_cols"><?php 
					   
								$additional_stones_ex = explode('/', $rowsring['additional_stones']);
								
								$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
								$additional_stones_secound_item = explode('x', $additional_stones_first_item['1']);
								
								if($additional_stones_ex['1'] == 'R' OR $additional_stones_ex['1'] == 'RD'){
									echo ' Round Cut';
								}else if($additional_stones_ex['1'] == 'A' OR $additional_stones_ex['1'] == 'AS'){
									echo ' Asscher Cut';
								}else if($additional_stones_ex['1'] == 'EC'){
									echo ' Emerald Cut';
								}else if($additional_stones_ex['1'] == 'PR'){
									echo ' Princes Cut';
								}else if($additional_stones_ex['1'] == 'H'){
									echo ' Heart Cut';
								}else if($additional_stones_ex['1'] == 'c' OR $additional_stones_ex['1'] == 'cu' OR $additional_stones_ex['1'] == 'C' OR $additional_stones_ex['1'] == 'CU'){
									echo ' Cushion Cut';
								}else if($additional_stones_ex['1'] == 'ma' OR $additional_stones_ex['1'] == 'MA'){
									echo ' Marquise Cut';
								}else{
									echo $rowsring['additional_stones'];
								}
								?></div><div class="clear"></div>
					</div>
			   <?php } ?>
				
				<div class="detail_bk_row">
					<div class="detail_left_cols">Diamond Shape</div><div class="detail_right_cols">ROUND</div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Side Carats</div><div class="detail_right_cols"><?= $rowsring['side_stone_weight'];?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Center Diamond Carat</div><div class="detail_right_cols">
						<?php
							if(isset($_GET['carat'])){
								echo $_GET['carat'];
							}else{
								echo str_replace(" Carat"," ",$rowsring['diamond_weight']);
							}
						?>
					</div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Total Carat Weight</div><div class="detail_right_cols">
						<?php
						if(isset($_GET['carat'])){
							echo $rowsring['side_stone_weight'] + $_GET['carat'];
						}else{
							echo $rowsring['side_stone_weight'] + str_replace(" Carat"," ",$rowsring['diamond_weight']);
						}
						?>
						</div><div class="clear"></div>
				</div>
				
				<div class="detail_bk_row">
					<div class="detail_left_cols">Diamond Cert :</div><div class="detail_right_cols">
						<span> <?php echo $get_cert_no; ?> by <?php echo $get_lab; ?> <a href="https://www.gia.edu/report-check?reportno=<?php echo $get_cert_no; ?>" target="_blank"><b>Click here to View Certificate</b></a></span> 
						</div>
					<div class="clear"></div>
				</div>
				
				<div class="detail_bk_row">
					<div class="detail_left_cols">Diamond Stock Number :</div><div class="detail_right_cols">
						<span> <?php echo $get_Stock_n; ?> <a href="<?php echo SITE_URL; ?>diamonds/diamond_detail/<?php echo $get_Stock_n; ?>" target="_blank"><b>View Diamond Detail</b></a></span> 
						</div>
					<div class="clear"></div>
				</div>
				
				<div class="detail_bk_row">
					<div class="detail_left_cols">Diamond Color</div><div class="detail_right_cols"><?php echo $get_color; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Diamond Clarity</div><div class="detail_right_cols"><?php echo $get_clarity; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Measurement</div><div class="detail_right_cols"><?php echo $get_Meas_value; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Metal</div><div class="detail_right_cols">
					<?php echo $rowsring['metal'];?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Metal weight</div><div class="detail_right_cols">
					<?php echo $rowsring['metal_weight'];?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Dimensions </div><div class="detail_right_cols"><?php echo $rowsring['ring_size']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Total Diamonds</div><div class="detail_right_cols">56</div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Semi Mount Price</div><div class="detail_right_cols">$<?php echo _nf($priceRetail); ?></div><div class="clear"></div>
				</div>
				
				<div class="detail_bk_row">
					<div class="detail_left_cols">Loose Diamond Price</div><div class="detail_right_cols">$<?php echo _nf($get_diamond_price); ?></div><div class="clear"></div>
				</div>
				
				<div class="detail_bk_row">
					<div class="detail_left_cols">Setting <?php echo $rowsring['setting']; ?> Price</div><div class="detail_right_cols">$<?php echo _nf($priceRetail+$get_diamond_price) ; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Setting </div><div class="detail_right_cols"><?php echo $rowsring['setting']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Setting style </div><div class="detail_right_cols"><?php echo $rowsring['setting_style']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Diamond Weight </div><div class="detail_right_cols"><?php echo $rowsring['diamond_weight']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Stone Shape </div><div class="detail_right_cols"><?php echo $rowsring['stone_shape']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Stone </div><div class="detail_right_cols"><?php echo $rowsring['stone']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Stone Number </div><div class="detail_right_cols"><?php echo $rowsring['stone_number']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Cut </div><div class="detail_right_cols"><?php echo $rowsring['cut']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Color </div><div class="detail_right_cols"><?php echo $rowsring['color']; ?></div><div class="clear"></div>
				</div>
				<div class="detail_bk_row">
					<div class="detail_left_cols">Clarity </div><div class="detail_right_cols"><?php echo $rowsring['clarity']; ?></div><div class="clear"></div>
				</div>
				
				 <?php
					$item_listing = array(
						'Item Code' => $rowsring['style_group'],
						'Metal' => $rowsring['matalType'],
						'Approx. Weight' => $rowsring['metal_weight'],
						'Measurements' => 'Top Width: '.$rowsring['top_width'].' mm, <br>Bottom Width: '.$rowsring['bottom_width'].' mm, <br>Top Height: '.$rowsring['top_height'].' mm, <br>Bottom Height: '.$rowsring['bottom_height'].' mm',
						'Style Name' => $rowsring['name'],
						'Style Group Name' => $rowsring['style_group'],
						'Clarity' => 'VVS1 to SI2',
						'Color' => 'D to L'
					);
					
					$view_lables = '';
					$incree = 1;
					foreach( $item_listing as $label => $cols_value ) {
						$class = '';
						if($incree == 1){
							$class = 'first_item_d_rin';
						}
						$view_lables .= '<div class="detail_bk_row '.$class.' ">
											<div class="detail_left_cols">'.$label.'</div>
											<div class="detail_right_cols">'.$cols_value.'</div>
											<div class="clear"></div>
										</div>';
						$incree++;                
					}
					
					//echo $view_lables;
				}    
				?>
				
				
				
				<div class="details_tab_right col-sm-12 pull-right"><br>
					<div><b>ITEM INFORMATION</b></div><br>
					<div class="item_detail_bk">
						<div class="item_rows">
							<span>Item Code</span>
							<span><?php echo $rowsring['style_group']; ?></span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Approx. Weight</span>
							<span><?php echo $rowsring['metal_weights']; ?></span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Measurements</span>
							<span><?php echo 'Top Width: '.$rowsring['top_width'].' mm, Bottom Width: '.$rowsring['bottom_width'].' mm, <br>Top Height: '.$rowsring['top_height'].' mm, Bottom Height: '.$rowsring['bottom_height'].' mm'; ?></span>
							<div class="clear"></div><br>
						</div>
						<div class="item_rows">
							<span>Style Name</span>
							<span><?php echo $rowsring['name']; ?></span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Style Group Name</span>
							<span><?php echo $rowsring['style_group']; ?></span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Supplied Stones</span>
							<span><?php echo $rowsring['supplied_stones']; ?></span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Supplied Stone Weight</span>
							<span><?php echo $rowsring['stone_weight']; ?></span>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div><br>
					<div><b>DIAMOND INFORMATION</b></div><br>
					<div class="item_detail_bk">
						<div class="item_rows">
							<span>Setting Type</span>
							<span><?php echo $maincate_name; ?></span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Supplied Stones</span>
							<span><?php echo $rowsring['supplied_stones']; ?></span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Supplied Stone Weight</span>
							<span><?php echo $rowsring['stone_weight']; ?></span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Diamond Shapes</span>
							<span><?php echo $suport_shape; ?></span>
							<div class="clear"></div>
						</div>
						
						<div class="item_rows">
							<span>Center Stone Sold Separately</span>
							<span><?php echo $rowsring['additional_stones']; ?></span>
							<div class="clear"></div>
						</div>                            
						<?php
							$itemInformation = '';
							if( !empty( $suported_shapes) ) {  
								$itemInformation .= '<div class="item_rows">
													<span>Diamond Shapes View</span>
													<span>'.$suported_shapes.'</span>
													<div class="clear"></div>
												</div>';
							}

							echo $itemInformation;
						?>
						<div class="item_rows">
							<span>Clarity</span>
							<span>VVS1 to SI2</span>
							<div class="clear"></div>
						</div>
						<div class="item_rows">
							<span>Color</span>
							<span>D to L</span>
							<div class="clear"></div>
						</div>
						
					</div>
				</div>
				<div class="clear"></div><br>
				
<style>
.first_item_d_rin{
border-top: 1px solid #ababab;
background-color:#EFFAFF !important;
}
.detail_bk_row:nth-child(2n) {
background: #ffffff;
border-top: 1px solid #ababab;
border-bottom: 1px solid #ababab;
}
</style>
						
			</div>  
			
			<div class="clear"></div><br>
			
			<div class="share_this">
				<span class='st_facebook_hcount' displayText='Facebook'></span> 
				<span class='st_twitter_hcount' displayText='Tweet'></span><br>
				<span class='st_linkedin_hcount' displayText='LinkedIn'></span> 
				<span class='st_pinterest_hcount' displayText='Pinterest'></span>
			</div>
				
			</div>               
					 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script>
                        $(document).ready(function(){
                            $('[data-toggle="tooltip"]').tooltip();   
                        });
                        function ch_img1(img_src){
                                $("#light_img").attr("src", img_src);
                                $('#light_a').attr("href",img_src);
                            }
                        </script> 
					<div class="clear"></div>
				</div>
				<div class="clear"></div><br><br><br> 
				<div class="ring_heading">You Might Also Like</div><br>
				<div class="rings_block">
					<?php echo $popular_listings; ?>
					<div class="clear"></div>
				</div>
				<div class="clear"></div><br><br><br>
				<div class="ring_heading set_red_color"><?= $row_cate['main_cname'] ?> Wedding Rings</div><br>
				<div class="rings_block">
					<?php echo $more_engagement_listings; ?>
					<div class="clear"></div><br>
				</div>
				<div class="clear"></div><br><br>
				<div class="expert_advice_bg">
					<div class="expert_advice">Expert Advice from our</div>
					<div class="jew_consultant">Jewelry Consultants</div><br><br>
					<div class="">
						Our Consultants are here to help every step of the way, from selecting the perfect <br>setting and stones to ensuring a seamless delivery.
					</div><br>
					<div class="">
						<b><?php echo CONTACT_NO; ?> SEND US A MESSAGE</b>
					</div><br><br>
					<div class="view_faq"><a href="#">View FAQ  ></a></div><br>
				</div><br><br>
			</div>
			<div class="container2">
				<hr /><br><br>
				<div class="davidstern_cols col-sm-6">
					<div class="davidHeading">CARAT</div>
					<div>The international unit of weight used for measuring diamonds 
					and gemstones, 1 carat is equal to 200 milligrams, or 0.2 grams. 
					A specific measurement of a diamond's weight, carat weight alone 
					may not accurately represent a diamond's visual size</div>
				</div>
				<div class="davidstern_cols1 col-sm-6"><br>
					<div>We recommend considering carat weight along with two other influential 
					characteristics: the overall dimensions and the cut grade of the diamond.</div>
					<div><a href="#">Learn More ></a></div>
				</div>
				<div class="clear"></div><br>
				<div id="carat_graph">
					<div class="aboutdavid_img diamond_carat_bk">
						<div class="diamond_carat_bg">
							<div><span>0.20<br>Ct.</span></div>
                        </div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div><br><br><br><br><br>
			</div>
		</div>
		<div class="clear"></div>
		<div class="similar_diamonds daviddt_block">
			<div class="mainwrap">
				<div class="davidstern_cols col-sm-6">
					<div class="davidHeading">CUT</div>
					<div>Excellent: Our most brilliant cut, representing roughly the top 1% of GIA diamond quality based on cut. The highest grades of polish and symmetry allow it to reflect even more light than the standard ideal cut.
					<br><br>
					Ideal cut: Represents roughly the top 3% of AGS diamond quality based on cut. Reflects nearly all light that enters the diamond. An exquisite and rare cut.
					<br><br>
					Very good cut: Represents roughly the top 15% of diamond quality based on cut. Reflects nearly as much light as the ideal cut, but for a lower price.
					<br><br>
					Good cut: Represents roughly the top 25% of diamond quality based on cut. Reflects most light that enters. Much less expensive than a very good cut.
					<br><br>
					Fair cut: Represents roughly the top 35% of diamond quality based on cut. Still a quality diamond, but a fair cut will not be as brilliant as a good cut.
					<br><br>
					Poor cut: Diamonds that are generally so deep and narrow or shallow and wide that they lose most of the light out the sides and bottom. Precious Fine Jewelry and Diamonds does not carry diamonds with cut grades of poor.</div><br>
				</div>
				<div class="davidstern_cols1 col-sm-6">
					<div class="aboutdavid_img"><img src="<?php echo IMGSRC_LINK; ?>shallow_cut.jpg" alt="CUT DIAMOND"></div>
				</div>
				<div class="clear"></div><br>
			</div>
		</div>
		<div class="moredetail_bgblock daviddt_block">
			<div class="container2"><br><br>
				<div class="davidstern_cols col-sm-6">
					<div class="davidHeading">COLOR</div>
					<div>Color refers to a diamond's lack of color, grading the whiteness of a diamond.
					A color grade of D is the highest possible, while Z is the lowest.
					Precious Fine Jewelry and Diamonds only sells diamonds with a color grade of J or higher.</div>
				</div>
				<div class="davidstern_cols1 col-sm-6"><br>
					<div>Color manifests itself in a diamond as a pale yellow. This is why a diamond's color grade is based on its lack of color. The less color a diamond has, the higher its color grade. After cut, color is generally considered the second most important characteristic when selecting a diamond. This is because the human eye tends to detect a diamond's sparkle (light performance) first, and color second.
					<br>
					At Precious Fine Jewelry and Diamonds, you'll find only the finest diamonds with color graded D-J. Diamonds graded J or better are colorless or near-colorless, with color that is typically undetectable to the unaided eye.</div>
				</div>
				<div class="clear"></div><br><br>
				<div class="aboutdavid_img"><img src="<?php echo IMGSRC_LINK; ?>color_grading_dt.jpg" alt="Your Diamond Detail"></div><br><br>
			</div>
		</div>
		<div class="similar_diamonds daviddt_block">
			<div class="container2"><br><br>
				<div class="davidstern_cols col-sm-6">
					<div class="davidHeading">CLARITY</div>
					<div>Clarity is a measure of the number and size of the tiny imperfections that occur in almost all diamonds.
					Many of these imperfections are microscopic, and do not affect a diamond's beauty in any discernible way.

					Much is made of a diamond's clarity, but of the Four Cs, it is the easiest to understand, and, according to many experts, generally has the least impact on a diamond's appearance. Clarity simply refers to the tiny, natural imperfections that occur in all but the finest diamonds. 
					</div>
				</div>
				<div class="davidstern_cols1 col-sm-6"><br>
					<div>Gemologists refer to these imperfections by a variety of technical names, including blemishes and inclusions, among others. Diamonds with the least and smallest imperfections receive the highest clarity grades. Because these imperfections tend to be microscopic, they do not generally affect a diamond's beauty in any discernible way.</div>
				</div>
				<div class="clear"></div><br><br>
				<div class="aboutdavid_img"><img src="<?php echo IMGSRC_LINK; ?>clarity_dt.jpg" alt="Your Diamond Detail"></div><br><br>
			</div>
		</div>
		<div class="moredetail_bgblock daviddt_block">
			<div class="container2"><br><br>
				<div class="davidstern_cols col-sm-6">
					<div class="davidHeading">Diamond Price Guarantee</div>
					<div>The Precious Fine Jewelry and Diamonds Diamond Price Match Guarantee makes it easy to purchase diamonds with peace of mind. If you find a comparable GIA certified diamond at a lower price, call <?php echo CONTACT_NO; ?>. If the offer meets our qualifications, we'll match the price. There is no comparison when it comes to the value and quality of Precious Fine Jewelry and Diamonds.</div>
				</div>
				<div class="davidstern_cols1 col-sm-6">
					<div class="davidHeading">DIAMOND HEART UPGRADE PROGRAM</div>
					<div>As part of our jeweler for life commitment, Precious Fine Jewelry and Diamonds is pleased to offer a lifetime diamond upgrade program on all GIA and AGSL certified diamonds. Simply call a Diamond & Jewelry Consultant at <?php echo CONTACT_NO; ?> to learn more about our upgrade program and to select your new diamond*.</div>
				</div>
				<div class="clear"></div><br><br>
				<div class="aboutdavid_img" style="display:none;"><img src="<?php echo IMGSRC_LINK; ?>diamond_price_dt.jpg" alt="Your Diamond Detail"></div><br><br>
			</div>
		</div>
		<div class="shiping_block">
			<div class="container2" style="display:none;">
				<div class="shiping_imgbk col-sm-3">
					<img src="<?php echo IMGSRC_LINK; ?>shiping_dt.jpg" alt="Shipping Detail">
				</div>
				<div class="shiping_detailbk col-sm-9">
					<div class="shipheading">Shipping</div>
					<div>
						<?php echo $shipping_policy; ?>
					</div><br><br>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
    <input type="hidden" name="liting_class" id="liting_class" value="" />
	<script>
	function centerStoneDiamondList(ringid) {
		var opt = $('#finished_level').val();
		$('#center_diamond_list').html('<div class="wait_data">LOADING PLEASE WAIT.....</div>');
		$('#diamond_detail_bk').show();
		$('.selection_tabs_bk').show();

		$.ajax({
			type: "POST",
			url: base_url + 'selection/viewCenterStone/'+ringid,
			success: function(response) {
				$('#center_diamond_list').html(response);
			},
			error: function(){alert('Error ');}
		});
        showDiamondResultDetail(ringid);
        getLeftDiamondDetail(ringid, 'ring');
	}

	function showDiamondResultDetail(ringid) {
		$.ajax({
			type: "POST",
			url: base_url + 'selection/ViewDiamondResult/'+ringid,
			success: function(response) {
				$('#diamond_detail_bk').html(response);
			},
			error: function(){alert('Error ');}
		});
	}

	function getLeftDiamondDetail(ringid, type) {
		$.ajax({
			type: "POST",
			url: base_url + 'selection/getDiamondResultDetail/'+encodeURI(ringid)+'/'+type,
			success: function(response) {
				$('#center_stone_detail').html(response);
			},
			error: function(){alert('Error ');}
		});
	}
	</script>
	<script type="text/javascript">
	if (typeof jQuery == 'undefined'){
		alert("Jquery library is not loaded. Please goto System > Configuration > Catalog > I-Quickshop and enable it.");
	}else{
		jQuery(document).ready(function() {
			var tb_pathToImage = "<?php echo DEMO_RETAIL_IMG; ?>ajax-loader.gif";
			imgLoader = new Image();
			imgLoader.src = tb_pathToImage;
		});

		jQuery(this).keydown(function(e){
			if (e == null) {
				keycode = event.keyCode;
			} else {
				keycode = e.which;
			}
			if(keycode == 27){
				top.tb_remove();
			}
		});
	}

	jQuery(document).ready(function () {
		var partial = '';
		var par = jQuery.trim(partial);
		var page = getParameterByName('p');

		if(jQuery.trim(jQuery('.note-msg').text()) == 'There are no products matching the selection.') {
			jQuery.post(BASE_URL+'/feeds/sendnotification.php',{purl:'<?php echo SITE_URL; ?>',fpc_id:'371'},function(res) {
				if(res=='success') {
					window.location.reload(true);
				}
			});
		}else if(par!='' && page=='') {
			jQuery.post(BASE_URL+'/feeds/sendnotification.php',{
				ptext:'',
				partialtext:par,
				surl:'<?php echo SITE_URL; ?>',fpc_id:''},
				function(res) {
					if(res=='success') {
						window.location.reload(true);
					}
				}
			);
		}else {
			viewMoreLess();
			reviewSlider();
		}
	});

	function getParameterByName(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}

	$(document).ready(function() { 
		$('#topbar_block').click(function() {
			$('html,body').animate({ scrollTop: 0 }, 1000);
			return false;
		});
	});

	$(document).scroll(function () {
		var y = $(this).scrollTop();
		if (y > 200) {
			$('.topbar_section').fadeIn();
		} else {
			$('.topbar_section').fadeOut();
		}                
	});

	function printThisPage() {
		window.print();
	}

	function setHDIndexDiamondLists(ring_id, shape_set, ring_color, item_metal, page_limit, item, ring_item_id, ring_metal_type,price,stone){
		/* var urlink = base_url + 'hdering_collections/getIndexDiamondListRignNew/'+ring_id + '/' +shape_set + '/' + ring_color+ '/' + item_metal+ '/' + page_limit + '/' + ring_item_id + '/' + ring_metal_type + '/' + stone; */
		var urlink = base_url + 'hdering_collections/getIndexDiamondListRign/'+ring_id + '/' +shape_set + '/' + ring_color+ '/' + item_metal+ '/' + page_limit + '/' + ring_item_id + '/' + ring_metal_type + '/' + stone;
		$("#center_stone_list").html('<b><i>Loading Diamond Finder &trade; Please Wait</i></b>');

		$.ajax({
			type: "POST",
			url: decodeURI(urlink),
			success: function(response) {
				$("#center_stone_list").html(response);
			},
			error: function(){alert('Error ');}
		}); 
	}
	</script>
<div class="p_body js__p_body js__fadeout"></div>
<div class="popup js__popup js__slide_top"> <a href="#" class="p_close js__p_close" title="Email a Friend"> <span></span><span></span> </a>
    <form name="askFriendForm" id="askFriendForm" method="post" action="#">
      <div class="p_content">
        <div class="popupHeading">Email a Friend&nbsp;<span class="validateMesage"></span></div>
        <div class="formArea">
          <div class="fieldBlock">
            <div class="fLabel">Your Name</div>
            <div class="columnSection">
              <input type="text" name="frien_fname" id="frien_fname" />
              <br />
              <span>First Name</span> </div>
            <div class="columnSection">
              <input type="text" name="frien_lname" id="frien_lname" />
              <br />
              <span>Last Name</span> </div>
            <div class="clear"></div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Your Email</div>
            <div>
              <input type="text" name="frien_email" id="frien_email" class="fullTextField" />
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Friend Name</div>
            <div class="columnSection">
              <input type="text" name="frien_frfname" id="frien_frfname" />
              <br />
              <span>First Name</span> </div>
            <div class="columnSection">
              <input type="text" name="frien_frlname" id="frien_frlname" />
              <br />
              <span>Last Name</span> </div>
            <div class="clear"></div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Friend Email</div>
            <div class="">
              <input type="text" name="frien_fremail" id="frien_fremail" class="fullTextField" />
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Description / Message</div>
            <div class="">
              <textarea name="frein_desc" id="frein_desc"></textarea>
            </div>
          </div>
          <div class="fieldBlock">
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['Stock_n'].'/false/';?>">
            <input type="button" name="btn_fnsubmit" class="btnStyle" onclick="friendForm()" value="Submit" />
          </div>
        </div>
      </div>
    </form>
  </div>
<!-- second popup block -->
<div class="popup js__another_popup js__slide_top"> <a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
    <form name="askExpertForm" id="askExpertForm" method="post" action="#">
      <div class="p_content">
        <div class="popupHeading">Email Us&nbsp;<span class="expertVdMessage"></span></div>
        <div class="formArea">
          <div class="fieldBlock">
            <div class="fLabel">Name</div>
            <div class="columnSection">
              <input type="text" name="exprt_fname" id="exprt_fname" />
              <br />
              <span>First Name</span> </div>
            <div class="columnSection">
              <input type="text" name="exprt_lname" id="exprt_lname" />
              <br />
              <span>Last Name</span> </div>
            <div class="clear"></div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Email</div>
            <div>
              <input type="text" name="exprt_email" id="exprt_email" class="fullTextField" />
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Phone No.</div>
            <div>
              <input type="text" name="exprt_pno" id="exprt_pno" class="" />
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">How did you hear about us?</div>
            <div>
              <select name="exprt_hear" id="exprt_hear">
                <option value="">Select</option>
                <option>Search Engine</option>
                <option>Yahoo</option>
                <option>Bing</option>
                <option>Google</option>
                <option>Friends</option>
                <option>Family</option>
                <option>Other Sources</option>
              </select>
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Description</div>
            <div class="">
              <textarea name="exprt_desc" id="exprt_desc"></textarea>
            </div>
          </div>
          <div class="fieldBlock">
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['Stock_n'].'/false/';?>">
            <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
          </div>
        </div>
      </div>
    </form>
  </div>

<!-- top bar add to cart block start -->
<div class="topbar_section hide_block">
    <div class="top_bar_cart">
        <div class="topbar_left">
            <div class="topbar_imgleft"><img src="<?php echo $ringimg; ?>" width="74" alt="<?php echo $ringtitle; ?>" /></div>
            <div class="topbar_imgright">
                <div class="topbar_heading">
                    Ring Item ID: <?php echo $rowsring['item_number']; ?><br>
                    <?php echo $rowsring['description']; ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="topbar_right">
            <div class="topbar_cart_left">
					<?php 
                    $full_price = $priceRetail+$get_diamond_price;
                    if($full_price < 150){ 
                    ?>
                    <br>
                        <a href="tel:<?php echo CONTACT_NO ?>" style="width: 100%;color:#666;font-size:20px;margin-top:15px;" id="addtoshopping">Please Call <?php echo CONTACT_NO ?> to Confirm Price</a>
                    <?php }else{?>
                        <span style="font-size:30px;">$<?php echo _nf($our_price, 0) ; ?></span> <a href="#" class="addtocart_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')">Add To Cart</a>
						<a href="<?php echo SITE_URL; ?>account/membersignin" class="addtowishlist_btn">Add To Wishlist</a>
                    <?php } ?>
            </div>
            <div class="topbar_cart_right"><a href="#javascript" id="topbar_block"><img src="<?php echo SITE_URL; ?>img/heart_diamond/top_option_icon.jpg" alt="top_option_icon"/></a></div>
        </div>
        <div class="clear"></div>
    </div>
    <br>
</div> 
<style type="text/css">
.topbar_left{
width: 43%;
}
.topbar_right{
width: 56.50%;
}
.addtowishlist_btn {
background: #666666;
max-width: 195px;
width: 100%;
padding: 16px 10px;
text-align: center;
text-transform: capitalize;
display: inline-block;
color: #fff;
margin-top: 17px;
}
.addtowishlist_btn:hover, .addtowishlist_btn:hover{
background: #006495;
}    
.topbar_cart_left {
float: left;
width: 83%;
}
</style>
<!-- top bar add to cart block end -->
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>