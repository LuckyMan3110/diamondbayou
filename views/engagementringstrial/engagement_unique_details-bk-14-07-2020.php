</div>
<div>
	<link href="<?php echo SITE_URL; ?>collection_detail/heart_collection_detail_1.css" rel="stylesheet" />
	<style>
    .js__another_popup{margin-top:45px}
	.set_ezpay label{font-size:12px;font-weight:700;width:100px}
	.set_ezpay span input[type="radio"]{margin:0 6px 0 0}
	.set_steps_bar{display:none}
	#ringsthumb_view{border:0 solid #ccc}
	.detail_right{width:40%}
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

	/* Show and hide product deail tabs */
	function show_tabs_block_detail(blockid) {
		var idar_list = ["product_details", "customer_reviews", "ask_questins", "similar_products", "policies"];
		$('#'+blockid).show();
		for(var i=0; i < idar_list.length; i++) {
			if( idar_list[i] !== blockid ) {
				$('#'+idar_list[i]).hide();
			}
		}
	}

	/* onclick show and hide block */
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
            var currentAttrValue = $(this).attr('href');
            if($(e.target).is('.active')) {
                close_accordion_section();
            }else {
                close_accordion_section();
                $(this).addClass('active');
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
	<!--<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>
	<link type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" rel="stylesheet" />
	<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>-->
	<script>
    var $ = jQuery.noConflict();
    function printCurrPage() {
        window.print();
    }
	$(function() {
		////// call popup scirpt
		$(".js__p_start, .js__p_another_start").simplePopup();
	});
	</script>
	<div class="diamondViewDetail container2 uniqueRingDetail">
		<?php
		$options_list = array('addpendantsetings3stone','tothreestone');

		$diamond_desc = 'This fair-cut '.$row_detail['cut'].', '.$row_detail['color'].'-color and '.$row_detail['clarity'].'-clarity diamond comes accompanied by a diamond grading report from the '.$row_detail['Cert'].'. <br>Have a question regarding this item? Our specialists are available to assist you.';
		$addring_link = config_item('base_url').'engagement/engagement_ring_settings/'.$lot.'/addtoring';
		$option_setting = setOptionValue($addoption);
		$diamondOption = ( ( $addoption == 'false' || $addoption === 'addjewelry' ) ? 'rapnet' : $addoption );
		$addring_pairlink = config_item('base_url').'diamonds/search/true/false/'.$option_setting.'/false/'.$lot;
		$diamondTitle = _nf($row_detail['carat'], 2) . '-Carat ' .$diamond_shape . ' Diamond';

		$additional_stones_new = 1;
		if (strpos($rowsring['additional_stones'], 'x') !== false) {

		}else{
			if($rowsring['additional_stones']){
				$additional_stones  =  explode('-',$rowsring['additional_stones']);
				if($additional_stones[1]){
					$additional_stones  =  explode('/',$additional_stones[1]);
					if($additional_stones[0]){
						$additional_stones_new = $additional_stones[0];
					}
				}
			}
		}
		$additional_stones_new = str_replace('0', '', $additional_stones_new);
		$additional_stones_ex = explode('/', $rowsring['additional_stones']);

		if($additional_stones_ex['1'] == 'R' OR $additional_stones_ex['1'] == 'RD'){
			$diamond_shape = 'B';
		}else if($additional_stones_ex['1'] == 'A' OR $additional_stones_ex['1'] == 'AS'){
			$diamond_shape = 'AS';
		}else if($additional_stones_ex['1'] == 'EC'){
			$diamond_shape = 'E';
		}else if($additional_stones_ex['1'] == 'PR'){
			$diamond_shape = 'PR';
		}else if($additional_stones_ex['1'] == 'H' OR $additional_stones_ex['1'] == 'HR'){
			$diamond_shape = 'H';
		}else if($additional_stones_ex['1'] == 'c' OR $additional_stones_ex['1'] == 'cu' OR $additional_stones_ex['1'] == 'C' OR $additional_stones_ex['1'] == 'CU'){
			$diamond_shape = 'C';
		}else if($additional_stones_ex['1'] == 'ma' OR $additional_stones_ex['1'] == 'MA'){
			$diamond_shape = 'M';
		}

		$get_diamond_price      = 0;
		$get_carat_value_d_i    = 0;
		$get_cert_no            = '';
		$get_lab                = 'GIA';
		$get_color              = 'D to J';
		$get_clarity            = 'VVS1 to SI2';
		$get_uid_find_dia       = '306710';
		$get_Meas_value         = '-';
		$get_measure            = '';
		$get_shape_find_dia     = 'B';
		$get_Stock_n            = 'IP1067-3.0';
		if($row_cate['parent_cid'] == 63 OR $row_cate['parent_cid'] == 69 OR $row_cate['parent_cid'] == 67 OR $row_cate['parent_cid'] == 57 OR $row_cate['parent_cid'] == 71 OR $row_cate['parent_cid'] == 73){
			
		}else{
			if(isset($_GET['carat'])){
				if(isset($_GET['dev_prd_id'])){
					$where_dev_index	= array('lot' => $_GET['dev_prd_id']);
					$get_dev_index_info	= $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
					$additional_stones_ex	= explode('/', $rowsring['additional_stones']);
					$additional_stones_first_item	= explode('-', $additional_stones_ex['0']);
					$get_Meas_value     = $get_dev_index_info['0']->Meas;
					$get_diamond_price  = $get_dev_index_info['0']->price;
					$get_cert_no        = $get_dev_index_info['0']->Cert_n;
					$get_color          = $get_dev_index_info['0']->color;
					$get_clarity        = $get_dev_index_info['0']->clarity;
					$get_shape          = $get_dev_index_info['0']->shape;
					$get_Stock_n        = $get_dev_index_info['0']->Stock_n;
				}else{
                    $additional_stones_ex = explode('/', $rowsring['additional_stones']);
                    $additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
                    $dev_index_us_meas = str_replace('x', '.', $additional_stones_first_item['1']);

					if($rowsring['additional_stones'] == ''){
						$where_dev_index	= array('carat' => $_GET['carat'], 'price !=' => '', 'color !=' => '','price >' => '0');
						$get_dev_index_info	= $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
					}else{
						$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' and (color='d' or color='e' or color='f' or color='g' or color='h' or color='i' or color='j') and (clarity = 'FL' OR clarity = 'IF' OR clarity = 'VVS1' OR clarity = 'VVS2' OR clarity = 'VS1' OR clarity = 'VS2' OR clarity = 'Si1') and `carat` = '".$_GET['carat']."' and Meas like '".$frt_like."%' and Meas like'%".$sec_like."%'   LIMIT 1";
						$res_qry = $this->db->query($req_sql);
						$get_dev_index_info = $res_qry->result();
					}

					$check_data = 0;
					if( count($get_dev_index_info) > 0 ) {
						foreach( $get_dev_index_info as $rows ) {
							$white_color_array          = array('D','E','F','G','H','I','J');
							$additional_meas_ex         = explode('x', $rows->Meas);
							$dev_index_meas             = str_replace('.', 'x', $additional_meas_ex['0']);
							if(in_array($rows->color, $white_color_array) AND $dev_index_us_meas == $dev_index_meas){
								$get_Meas_value     = $rows->Meas;
								$get_diamond_price  = $rows->price;
								$get_cert_no        = $rows->Cert_n;
								$get_color          = $rows->color;
								$get_clarity        = $rows->clarity;
								$get_shape          = $rows->shape;
								$get_Stock_n        = $get_dev_index_info['0']->Stock_n;
								$check_data++;
							}
						}
					}
					if($check_data == 0){
						$get_Meas_value     = $get_dev_index_info['0']->Meas;
						$get_diamond_price  = $get_dev_index_info['0']->price;
						$get_cert_no        = $get_dev_index_info['0']->Cert_n;
						$get_color          = $get_dev_index_info['0']->color;
						$get_clarity        = $get_dev_index_info['0']->clarity;
						$get_shape          = $get_dev_index_info['0']->shape;
						$get_Stock_n        = $get_dev_index_info['0']->Stock_n;
					}else{
						$get_Meas_value     = $get_dev_index_info['0']->Meas;
						$get_diamond_price  = $get_dev_index_info['0']->price;
						$get_cert_no        = $get_dev_index_info['0']->Cert_n;
						$get_color          = $get_dev_index_info['0']->color;
						$get_clarity        = $get_dev_index_info['0']->clarity;
						$get_shape          = $get_dev_index_info['0']->shape;
						$get_Stock_n        = $get_dev_index_info['0']->Stock_n;
					}
				}
			}else{
				if(empty($rowsring['additional_stones'])){
					$where_dev_index	= array('carat' => '0.25', 'price !=' => '', 'color !=' => '','price >' => '0');
					$get_dev_index_info	= $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
				}else{
					$additional_stones_ex = explode('/', $rowsring['additional_stones']);
					$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
					$additional_stones_first_item2   = $additional_stones_first_item['1'];

					$check_count = 0;
					$additional_stones_first_item21 =  explode('x',$additional_stones_first_item2);
					$frt_like = $additional_stones_first_item21[0];
					$sec_like = 'x '.$additional_stones_first_item21[1];

					$ch_stone1 = '';
					if(!empty($additional_stones_first_item21[1])){
						$ch_stone1 = 1;
					}

					if(empty($ch_stone1)){
						$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' and (color='d' or color='e' or color='f' or color='g' or color='h' or color='i' or color='j') and (clarity = 'FL' OR clarity = 'IF' OR clarity = 'VVS1' OR clarity = 'VVS2' OR clarity = 'VS1' OR clarity = 'VS2' OR clarity = 'Si1') and `carat` = '0.25' and Meas like '".$frt_like."%' and Meas like'%".$sec_like."%'   LIMIT 1";
						$res_qry = $this->db->query($req_sql);
						$get_dev_index_info = $res_qry->result();
						$additional_meas_ex         = explode('x', $get_dev_index_info->Meas);
						$dev_index_meas             = str_replace('.', 'x', $additional_meas_ex['0']);
						$result_new_index_meas      = substr($dev_index_meas['0'], 0, 3);
					}
					$check_count = $check_count + 1;

					if(empty($get_dev_index_info) || empty($additional_stones_first_item21[1])){
						$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' and (color='d' or color='e' or color='f' or color='g' or color='h' or color='i' or color='j') and (clarity = 'FL' OR clarity = 'IF' OR clarity = 'VVS1' OR clarity = 'VVS2' OR clarity = 'VS1' OR clarity = 'VS2' OR clarity = 'Si1') and `carat` = '0.25'   LIMIT 1";
						$res_qry = $this->db->query($req_sql);
						$get_dev_index_info = $res_qry->result();
					}
				}

				$get_diamond_price  = $get_dev_index_info['0']->price;
				$get_Meas_value     = $get_dev_index_info['0']->Meas;
				$get_carat_value_d_i= $get_dev_index_info['0']->carat;
				$get_cert_no        = $get_dev_index_info['0']->Cert_n;
				$get_color          = $get_dev_index_info['0']->color;
				$get_clarity        = $get_dev_index_info['0']->clarity;
				$get_shape          = $get_dev_index_info['0']->shape;
				$get_Stock_n        = $get_dev_index_info['0']->Stock_n;

				$white_color_array          = array('D','E','F','G','H','I','J');
				if(!in_array($get_dev_index_info[0]->color, $white_color_array)){
					$get_color 	 = 'D';
				}
				$glarity_array = array('FL','IF','VVS1','VVs2','Vs1','Vs2','Si1');
			}
		}

		if(isset($_GET['carat'])){
			$diamond_carat_value = _nf( $_GET['carat'], 2);
		}else{
			$diamond_carat_value = _nf( $get_carat_value_d_i, 2);
		}
		$carat_margin = getCaratMargin( $diamond_carat_value );
		$ringtitle   =  str_replace('KP', 'KT', $ringtitle);
		?>
		<style>
        .diamond_carat_bg{background: url('<?php echo SITE_URL; ?>img/david_home/diamond_search/carat_diamond_bg_view.jpg') center no-repeat; width: 100%; height: 137px;}
        .diamond_carat_bg div{background: url('<?php echo SITE_URL; ?>img/david_home/diamond_search/carat_bg_value.png') left no-repeat; width: 189px; height: 159px; display: inline-block; margin:5.4em 0px 0px <?php echo $carat_margin; ?>;}
        .diamond_carat_bg div span{display: inline-block; font-size: 20px; padding: 4.4em 0px 0px 30px; color:#fff;}
        .ringsize span:first-child{width:130px !important;}
		</style>
		<div style="display:none;">
			<ul class="bread_crumb_list">
				<li><a href="<?php echo SITE_URL; ?>">Home</a></li> >
				<?php echo unique_section_bread_crumb($row_cate); ?>
			</ul>
		</div>
		<div class="moredetail_bgblock daviddt_block">
			<div class="container2">
				<div class="set_steps_bar" id="builder_stpes_bar"><img src="<?php echo SITE_URL; ?>img/heart_diamond/ring_builder_steps.jpg" alt="ring_builder_steps" /></div>
				<div class="detail_column">
					<div class="detail_center col-sm-6">
						<div class="ring_img_block" style="display:none;">
							<div class="zoomright" id="ringsthumb_view">
								<div class="set_thumb_img" id="<?php echo $rowsring['ring_id'];?>">
									<div class="" id="show_thumb_view"></div>
								</div>
								<div class="left_arrow_view"><a href="#javascript" onclick="button_previous('<?php echo $rowsring['ring_id'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/left_arrow_icon.jpg" alt="left_arrow_icon" /></a></div>
								<div class="right_arrow_view"><a href="#javascript" onclick="button_next('<?php echo $rowsring['ring_id'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/right_arrow_icon.jpg" alt="right_arrow_icon" /></a></div>
							</div>
							<div class="clear"></div><br>
							<div class="rings_thumbs">
								<?php echo $rings_thumb; ?>
								<div class="smalimgview"><?php echo '<div class="popup-gallery">'.$product_circle['thumbs_popup'].'</div>'; ?></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
						<div class="tz-gallery-collection images-box-area">
						<?php echo $product_thums;?>
						</div>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
						<script>
						baguetteBox.run('.tz-gallery-collection');
						</script>
						<div style="height:30px;"></div>
						<h3 style="text-align:left;font-size:23px;">
							<span class="price-message">
								<?php if($rowsring['additional_stones'] == ''){ ?>

								<?php }else{ ?>
									This ring was made with 
									<?php 
									$additional_stones_ex = explode('/', $rowsring['additional_stones']);

									$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
									$additional_stones_secound_item = explode('x', $additional_stones_first_item['1']);

									echo $rowsring['additional_stones'];

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
								}
								?>
							</span>
						</h3>
						<div style="height:100px;"></div>
						<div class="clear"></div><br>
					</div>

					<form name="form1_detail" id="form1_detail" method="post" action="">
						<div class="detail_right col-sm-6">
							<div class="cut_diamond">
								<p style="color:#999;padding-bottom: 20px;">Ground Shipping</p>
								<p style="color:#999;">Dcutters's</p>
								<h1 class="product-title" itemprop="name">
									<?php
									if(isset($_GET['carat'])){
										echo $rowsring['stone_weight'] + $_GET['carat'];
									}else{
										echo $rowsring['stone_weight'] + $get_carat_value_d_i;
									}
									?> Carat    
									<?php echo $ringtitle; ?>
									<span class="sub-text" style="display:none;"> in (<?php
									if(isset($_GET['carat'])){
										echo $rowsring['stone_weight'] + $_GET['carat'];
									}else{
										echo $rowsring['stone_weight'] + $get_carat_value_d_i;
									}
									?> ct. tw.)
									</span>
								</h1>
							</div>
							<div class="prices_label" id="price_label" style="border-bottom: solid 1px #cccccc;padding-bottom: 12px !important;margin-top: 13px;">
								<?php 
								$full_price = $rowsring['priceRetail']+$get_diamond_price;
								if($full_price < 150){ ?>
									<a href="tel:<?php echo CONTACT_NO ?>" style="width: 100%;color:#666;font-size:20px;" id="addtoshopping">Please Call <?php echo CONTACT_NO ?> to Confirm Price</a>
								<?php }else{?>
									<span style="font-size: 40px;color: #999999;" id="show_real_price">$<?php echo _nf($rowsring['priceRetail']+$get_diamond_price, 2) ; ?></span>
								<?php } ?>
							</div><br>
							<span id="show_real_price_msg"></span>
							<div class="learn_about">
								<div class="further_dtcols" style="display:none;">
									<span>Retail Price</span>
									<span><strike>$ <?php echo _nf($retail_price+$get_diamond_price, 2); ?></strike> <span>save <?php echo $saving_percent; ?>%</span></span>
								</div>    
								<div class="further_dtcols">
									<span>Carat Weight</span>
									<span><?php
									if(isset($_GET['carat'])){
										echo $rowsring['stone_weight'] + $_GET['carat'];
									}else{
										echo $rowsring['stone_weight'] + $get_carat_value_d_i;
									}
									?></span>
								</div>
								<div class="clear"></div><br>
							</div>
							<div class="further_dtcols metalsection ringsize">
								<span>Metal Type and Color:</span>
								<span>
									<select name="metal_type" id="metal_type" onchange="setListingPage(this.value)">
									<?php echo $ringsmetail; ?>
									</select>
								</span>
							</div>
							<div class="further_dtcols metalsection ringsize">
								<span>Available in sizes</span>
								<span>
									<select name="metal_type" id="metal_type" onchange="setListingPage(this.value)">
										<?php echo $finger_ring_size; ?>
									</select>
								</span>
							</div>
							<div class="further_dtcols metalsection ringsize set_ezpay">
								<span>Ez Pay :</span>
								<?php $full_price = $rowsring['priceRetail']+$get_diamond_price; ?>
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
									<option value="0">Full Price - $<?php echo _nf($rowsring['priceRetail']+$get_diamond_price, 2); ?></option>
									<option value="<?php echo $first_ez_value; ?>"> <?php echo $first_ez_value; ?>ez - $<?php echo _nf($full_price/$first_ez_value, 2); ?></option>
									<option value="<?php echo $second_ez_value; ?>"> <?php echo $second_ez_value; ?>ez - $<?php echo _nf($full_price/$second_ez_value, 2); ?></option>
								</select> 
								<input type="hidden" id="3ez_price" value="<?php echo _nf($full_price/$first_ez_value, 2); ?>">
								<input type="hidden" id="5ez_price" value="<?php echo _nf($full_price/$second_ez_value, 2); ?>">
								<input type="hidden" id="main_ez_price" value="<?php echo _nf($full_price, 2) ; ?>">
							</div>
							<div class="clear"></div>
							<div class="clear"></div>
							<div class="metal_list_box">
								<div class="set_metal_label">
									Metal &ndash; <b>
									<?php 
									if($rowsring['matalType'] == 'PLAT'){
										echo 'Platinum';  
									}else{
										switch($rowsring['matalType']){
											case '14KP':
												echo '14 Karat Pink Gold';
												break;
											case '14KW':
												echo '14 Karat White Gold';
												break;
											case '14KY':
												echo '14 Karat Yellow Gold';
												break;
											case '18KP':
												echo '18 Karat Pink Gold';
												break;
											case '18KW':
												echo '18 Karat White Gold';
												break;
											case '18KY':
												echo '18 Karat Yellow Gold';
												break;
										}
									}
									?></b>
								</div>
								<?php 
								$req_param1 = '';
								if(!empty($_GET['diamond_lot'])){
									$req_param1 = '?diamond_lot='.$_GET['diamond_lot'];
								}
								if(!empty($_GET['ring_size'])){
									if(empty($req_param1))
										$req_param1 = '?ring_size='.$_GET['ring_size'];
									else
										$req_param1 .= '&ring_size='.$_GET['ring_size'];
								}
								?>
								<ul class="set_metals_list">
									<li>
										<a href="<?php echo SITE_URL; ?>selection/engagement_ring_detail/<?php echo $rowsring['ring_id'];?>/1/14KP/<?php echo $req_param1;?>"><img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_2.jpg" alt="metal_icons_2" /></a>
									</li>
									<li>
										<a href="<?php echo SITE_URL; ?>selection/engagement_ring_detail/<?php echo $rowsring['ring_id'];?>/1/18KP/<?php echo $req_param1;?>"><img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_5.jpg" alt="metal_icons_5" /></a>
									</li>
									<li>
										<a href="<?php echo SITE_URL; ?>selection/engagement_ring_detail/<?php echo $rowsring['ring_id'];?>/1/PLAT/<?php echo $req_param1;?>"><img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_4.jpg" alt="metal_icons_4" /></a>
									</li>
								</ul>
							</div>
							<div class="metal_list_box">
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
									$diamond_lot        = '';
									$ring_metal_type = $rowsring['matalType'];
									if($ring_metal_type == ''){
										$ring_metal_type = 'PLAT';
									}

									if($row_cate['parent_cid'] == 63 OR $row_cate['parent_cid'] == 69 OR $row_cate['parent_cid'] == 67  OR $row_cate['parent_cid'] == 57 OR $row_cate['parent_cid'] == 71 OR $row_cate['parent_cid'] == 73){
									}else{    
										for($i=1; $i <= 4; $i++) {
											$match_diamond_id = strchr($diamond_carats['diamond_lot'.$i], $diamond_lot);
											$active_carat = ( !empty($match_diamond_id) ? 'set_active_carat' : '' );
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
												}
											}
											$diamond_carat_list .= '<li class="'.$active_carat.'">
												<a href="'.SITE_URL.'selection/engagement-ring-detail/'.$rowsring['ring_id'].'/1/'.$ring_metal_type.'/?carat='.$carat_number.$req_param1.'"><img src="'.SITE_URL.'img/heart_diamond/diamond_carat_'.$i.'.jpg" alt="" /></a>
											</li>';
										}
										if( $rowsring['diamond_lot_id'] > 0 && $rowsring['category'] != 'Band' ) {
											 echo $diamond_carat_list;
										}else{
											 echo $diamond_carat_list;
										}  
									}    
									?>
								</ul>
							</div>
                
                <div class="price-and-purchase">     
                    <div class="price-with-button force-wrap" data-smart-wrap="true">
                      <div class="price-display">
                        <div class="regular-price" style="display:none;">
                          <span class="price" itemprop="price" content="<?php echo _nf($rowsring['priceRetail']+$get_diamond_price, 0); ?>">$<?php echo _nf($rowsring['priceRetail']+$get_diamond_price, 0); ?></span>
                        </div> 
                        <div style="text-align:right;font-size:15px;">
                            
                            <!--<?php if($row_cate['parent_cid'] == 63 OR $row_cate['parent_cid'] == 69 OR $row_cate['parent_cid'] == 67 OR $row_cate['parent_cid'] == 57 OR $row_cate['parent_cid'] == 71 OR $row_cate['parent_cid'] == 73){ ?>
                            
                            <?php }else{ ?>
                            
                            <span class="price-message">(Price with <?php
                            if(isset($_GET['carat'])){
                                echo $_GET['carat'];
                            }else{
                                echo $get_carat_value_d_i;
                            }
                            ?> Center Carat)</span><br>
                            
                            
                            <?php } ?>-->
                            
                            
                            <?php if($row_cate['parent_cid'] == 63 OR $row_cate['parent_cid'] == 69 OR $row_cate['parent_cid'] == 67 OR $row_cate['parent_cid'] == 57 OR $row_cate['parent_cid'] == 71 OR $row_cate['parent_cid'] == 73){ ?>
                            
                            <?php }else{ ?>
                            
                            <span class="price-message">(Price with <?php
                            if(isset($_GET['carat'])){
                                echo $_GET['carat'];
                            }else{
                                echo $get_carat_value_d_i;
                            }
                            ?> Center Carat)</span><br>
                            <a href="<?php echo SITE_URL ?>testengagementrings/engagement_ring_detail/<?php echo $rowsring['ring_id']; ?>">
                            <span class="price-message">
                                <?php if($rowsring['additional_stones'] == ''){ ?>
                                    
                                <?php }else{ ?>
                                    This ring was made with <?php 
                                    $additional_stones_ex = explode('/', $rowsring['additional_stones']);
                                    
                                    $additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
                                    $additional_stones_secound_item = explode('x', $additional_stones_first_item['1']);
                                    
                                    echo $rowsring['additional_stones'];
                                    
                                    if($additional_stones_ex['1'] == 'R' OR $additional_stones_ex['1'] == 'RD'){
                                        echo ' (Round Cut)';
                                    }else if($additional_stones_ex['1'] == 'A' OR $additional_stones_ex['1'] == 'AS'){
                                        echo ' (Asscher Cut)';
                                    }else if($additional_stones_ex['1'] == 'EC'){
                                        echo ' (Emerald Cut)';
                                    }else if($additional_stones_ex['1'] == 'PR'){
                                        echo ' (Princes Cut)';
                                    }else if($additional_stones_ex['1'] == 'H' OR $additional_stones_ex['1'] == 'HR'){
                                        echo ' (Heart Cut)';
                                    }else if($additional_stones_ex['1'] == 'c' OR $additional_stones_ex['1'] == 'cu' OR $additional_stones_ex['1'] == 'C' OR $additional_stones_ex['1'] == 'CU'){
                                        echo ' (Cushion Cut)';
                                    }else if($additional_stones_ex['1'] == 'ma' OR $additional_stones_ex['1'] == 'MA'){
                                        echo ' (Marquise Cut)';
                                    }
                                    ?>
                               <?php } ?>
                                
                            </span>
                            </a>
                            
                            <?php } ?>
                            <br>
                            
                        </div>
                        <div style="text-align:right;font-size:17px;">
                           <!-- ring_id, shape_set, ring_color, item_metal, page_limit-->
                           
                           <?php
                          
                               $white_color_array = array('D','E','F','G','H','I','J');
                               if(in_array($get_color, $white_color_array)){
                                   $get_color_diamond = 'white';
                               }else{
                                   $get_color_diamond = 'yellow';
                               }
                            
                           ?>
                           
                            <?php if($row_cate['parent_cid'] == 63 OR $row_cate['parent_cid'] == 69 OR $row_cate['parent_cid'] == 67 OR $row_cate['parent_cid'] == 57 OR $row_cate['parent_cid'] == 71 OR $row_cate['parent_cid'] == 73){ ?>
                            
                            <?php }else{ ?>
								<a href="#javascript" onclick="setHDIndexDiamondList('<?php echo $get_uid_find_dia; ?>', '<?php echo $get_shape_find_dia; ?>', '<?php echo $get_color_diamond; ?>', '14k_gold', 0, '1920', '<?php echo $rowsring['ring_id'];?>', '<?php echo $rowsring['matalType']; ?>','<?php echo _nf($get_diamond_price, 0);?>')">(Need More Center Diamond Options? Click Diamond Finder &trade;)</a>
                            <?php } ?>
                            
                        </div>
                      </div>
                    </div>    
                </div> 
                
               <div class="clear"></div>
                    
                    <div class="set_buton_bg col-sm-10">
                      <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $setingtype; ?>">
                      <input type="hidden" name="3ez_price" value="<?php echo intval(number_format($ez3,0,'.','')); ?>">
                      <input type="hidden" name="5ez_price" value="<?php echo intval(number_format($ez5,0,'.','')); ?>">
                      <input type="hidden" name="main_price" id='main_price' value="<?php echo $rowsring['priceRetail'] + $get_diamond_price; ?>" />
                      <input type="hidden" name="price" value="<?php echo $rowsring['priceRetail']+$get_diamond_price; ?>" />
                      <input type="hidden" name="vender" value="unique">
                      <input type="hidden" name="url" value="<?php echo $ringimg; ?>">
                      <input type="hidden" name="prodname" value="<?php echo $rowsring['name']?>">
                      <input type="hidden" name="diamnd_count" value="<?php echo $rowsring['supplied_stones'];?>">
                      <input type="hidden" name="ring_shape" value="<?php echo $suport_shape;?>">
                      <input type="hidden" name="ring_carat" value="<?php echo $rowsring['metal_weight']; ?>">
                      <input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['ring_id'];?>">
                      <input type="hidden" name="stock_number" id="stock_number" value="<?php echo $rowsring['style_group']; ?>">
                      <input type="hidden" name="diamond_cert_no" id="diamond_cert_no" value="<?php echo $get_cert_no; ?>">
                      <input type="hidden" name="txt_ringtype" value="generic_ring">
                      <input type="hidden" name="txt_ringsize" value="<?php if(isset($_GET['ring_size'])){ echo $_GET['ring_size']; }else{ echo  $set_ring_size; };?>" />
                      <input type="hidden" name="txt_metal" value="<?php echo $default_metal;?>" />
                      <input type="hidden" name="metals_weight" value="<?php echo $rowsring['metal_weight']; ?>" />
                      
                      <input type="hidden" name="vendors_name" value="Unique Setting" />
                      <input type="hidden" name="vendor_number" value="(888) 731 - 1111" />
                      <input type="hidden" name="table_name" value="dev_index" />
                      <input type="hidden" name="item_title" value="<?php if(isset($_GET['carat'])){ echo $rowsring['stone_weight'] + $_GET['carat']; }else{ echo $rowsring['stone_weight'] + $get_carat_value_d_i; } ?> carat <?php  if($rowsring['matalType'] == 'PLAT'){  echo 'Platinum';    }else{  echo $rowsring['matalType'];    }  ?> Color <?php echo $get_color; ?> Clarity <?php   echo $get_clarity; ?> <?php echo $get_cert_no; ?> by <?php echo $get_lab; ?> Diamond Engagement Ring" />
                      <input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
                      <input type="hidden" name="product_type" value="Engagement Rings" />
                      
                      <input type="hidden" name="center_stone_id" id="center_stone_id" />
                      <input type="hidden" name="txt_qty" value="1" />
<?php 
if($full_price < 150){ ?>
    <a href="tel:<?php echo CONTACT_NO ?>" class="button_link" style="width: 100%;" id="addtoshopping">Please Call <?php echo CONTACT_NO ?> to Confirm Price</a>
<?php }else{

if(isset($_GET['carat'])){ ?>
    
    <?php if($rowsring['additional_stones'] == ''){ ?>
        <a href="#javascript" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping">
           <div class="nile-button-black">ADD TO SHOPPING BAG</div>
        </a>
    <?php }else{ ?>
        <a href="tel:<?php echo CONTACT_NO ?>" class="button_link" style="width: 100%;" id="addtoshopping">Please Call <?php echo CONTACT_NO ?> to Confirm Availability</a>
   <?php } ?>
   
<?php }else{ 

if (strpos($rowsring['additional_stones'], 'x') !== false) {
    //
}else{
    if($rowsring['additional_stones']){
       $additional_stones  =  explode('-',$rowsring['additional_stones']);
       if($additional_stones[1]){
           $additional_stones  =  explode('/',$additional_stones[1]);
           if($additional_stones[0]){
               $additional_stones_new = $additional_stones[0];
           }
       }
    }
}

if($get_carat_value_d_i == $additional_stones_new){
?>
   <a href="#javascript" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping">
       <div class="nile-button-black">ADD TO SHOPPING BAG</div>
   </a>
    
<?php
}else{
    ?>
    <a href="tel:<?php echo CONTACT_NO ?>" class="button_link" style="width: 100%;" id="addtoshopping">Please Call <?php echo CONTACT_NO ?> to Confirm Availability</a>
    <?php
} 

 } 

}?>

                 </div>
                </form>  
                
                <div class="clear"></div><br>
                <div id="center_stone_list"></div>
                <br>
                
                <div class="clear"></div><br>
                
                <div class="learn_about">
                    <div class="dataseting">
                        
                       <!-- Order Today for Engagement Ring Delivery on Tuesday, February 05, 2019.
                        
                        Order Today for free Engagement Ring Delivery on <?php echo nextDate().' or set in jewelry on '.nextDate(11); ?>.-->
                        
                        Order Today for Engagement Ring Delivery on <?php echo nextDate(11); ?> <?= date('Y') ?>
                        
                        </div>
                        
                </div>
                
                  <div class="review-and-social">
                    <div class="product-rating-stars " data-action="scroll-to-review">
                      <div class="offer-rating">
                        <div><!--<img src="<?php echo SITE_URL; ?>collection_detail/customer_rating_stars.jpg" alt="<?php echo SITES_NAME; ?> Studio" />--></div>
                        <div class="rating-values"> <!--<span>4.8</span> (<span><a href="#" data-target="customer-review">9</a></span>)--> </div>
                      </div>
                      <div class="review-count" data-review-count="9"><!--(9 customer rating<span class="plural">s</span>)--></div>
                    </div>
                    <div class="social-icons">
                      <div class="group-of-icons"> 
                          <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_1.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                          <a href="https://twitter.com/hashtag/heartsanddiamonds" target="_blank"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_2.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                          <a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_3.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                          <a href="https://www.facebook.com/HeartsandDiamondsJewelry/" target="_blank"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_4.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                          <a href="#javascript" onclick="printThisPage()"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_5.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
                          <a href="#javascript" class="js__p_another_start"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_6.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
        <!--                <button class="icon-print"></button>
                        <span class="icon-envelope"></span>-->
                        <button class="icon-share" data-hasqtip="1"></button>
                      </div>
                    </div>
                  </div>
          
                <div class="clear"></div><br>
            
                <div id="details-and-purchase">
                            
                   
                   
                   
                   <div class="detail_bk_row first_item_d_rin">
                        <div class="detail_left_cols">Stock Number</div><div class="detail_right_cols"><?php echo $rowsring['style_group']; ?></div><div class="clear"></div>
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
                        <div class="detail_left_cols">Side Diamond Shape</div><div class="detail_right_cols">ROUND</div><div class="clear"></div>
                    </div>
                    <div class="detail_bk_row">
                        <div class="detail_left_cols">Side Diamond Carats</div><div class="detail_right_cols"><?php echo $rowsring['stone_weight']; ?></div><div class="clear"></div>
                    </div>
                    <div class="detail_bk_row">
                        <div class="detail_left_cols">Center Diamond Carat</div><div class="detail_right_cols">
                            <?php
                                if(isset($_GET['carat'])){
                                    echo $_GET['carat'];
                                }else{
                                    echo $get_carat_value_d_i;
                                }
                            ?>
                        </div><div class="clear"></div>
                    </div>
                    <div class="detail_bk_row">
                        <div class="detail_left_cols">Total Carat Weight</div><div class="detail_right_cols">
                            <?php
                            if(isset($_GET['carat'])){
                                echo $rowsring['stone_weight'] + $_GET['carat'];
                            }else{
                                echo $rowsring['stone_weight'] + $get_carat_value_d_i;
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
                        <?php 
                            if($rowsring['matalType'] == 'PLAT'){
                               echo 'Platinum';  
                            }else{
                               echo $rowsring['matalType'];  
                            }
                        ?></div><div class="clear"></div>
                    </div>
                    <div class="detail_bk_row">
                        <div class="detail_left_cols">Total Diamonds</div><div class="detail_right_cols">56</div><div class="clear"></div>
                    </div>
                    <div class="detail_bk_row">
                        <div class="detail_left_cols">Semi Mount Price</div><div class="detail_right_cols">$<?php echo _nf($rowsring['priceRetail'], 0); ?></div><div class="clear"></div>
                    </div>
                    
                    <div class="detail_bk_row">
                        <div class="detail_left_cols">Loose Diamond Price</div><div class="detail_right_cols">$<?php echo _nf($get_diamond_price, 0); ?></div><div class="clear"></div>
                    </div>
                    
                    <div class="detail_bk_row">
                        <div class="detail_left_cols">Setting <?php 
                            if($rowsring['matalType'] == 'PLAT'){
                               echo 'Platinum';  
                            }else{
                               echo $rowsring['matalType'];  
                            }
                        ?> Price</div><div class="detail_right_cols">$<?php echo _nf($rowsring['priceRetail'] + $get_diamond_price, 0); ?></div><div class="clear"></div>
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
                                <span><?php echo $rowsring['metal_weight']; ?></span>
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
                    <!--<section id="contact-information">
                      <div class="">
                        <div class="text need_help_cols"><br>
                          <h4>Need Help?</h4>
                          <p>Your questions or feedback are always welcome at <?php echo SITES_NAME; ?>.  Join in a conversation with one of our Diamond and Jewelry Consultants to help you make the right decision.</p>
                        </div>
                        <div class="contact_right_cols">
                          <div class="link-wrapper"> 
                              <div>
                                  <a href="tel:<?php echo CONTACT_NO; ?>">
                                    <i class="set_icon_space"><img src="<?php echo SITE_URL; ?>collection_detail/phone_contact_icon.jpg" alt="phone_contact_icon" /></i>
                                    <span><?php echo CONTACT_NO; ?></span>
                                  </a>
                              </div>                   
                              <div>
                                  <a href="mailto:<?php echo SITE_EMAIL; ?>">
                                    <i class="set_icon_space"><img src="<?php echo SITE_URL; ?>collection_detail/email_contact_icon.jpg" alt="email_contact_icon" /></i><span>Email Us</span>
                                  </a> 
                              </div>
                          </div>
                        </div>
                      </div>
                    </section>-->
                    
                    
                    
                    
                    
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
           
                <div class="clear"></div>
            </div>
            <div class="clear"></div><br><br>
            <br> 
            <div class="ring_heading">You Might Also Like</div><br>
            <div class="rings_block">
                <?php echo $popular_listings; ?>
                
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <br><br><br>
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
                    <b><?php echo CONTACT_NO; ?>        SEND US A MESSAGE</b>
                </div><br><br>
                <div class="view_faq"><a href="#">View FAQ  ></a></div><br>
            </div>
            <div class="selection_tabs_bk" style="display:none;">
                <a href="#javascript" class="selection_tabs sel_active_tabs" id="diamonds_link" onclick="set_detail_blocks('diamond_detail_bk')">Diamond Selector</a>
                <a href="#javascript" class="selection_tabs" id="rings_link" onclick="set_detail_blocks('ring_detail_bk')">Product Details</a>
            </div>
            <br><br>
            <!-- diamond detail block start  -->
            <div class="detail_ring_bk" id="diamond_detail_bk" style="display:none;">
                <div class="detail_bk_left">
                    <div class="detail_inner_bk">
                        <div class="detail_bk_head"><?php echo $suport_shape; ?> Diamond</div>
                        <div class="clarity_row">
                            <div class="clarity_cols">
                                <div>Carat</div>
                                <div>1.2</div>
                            </div>
                            <div class="clarity_cols">
                                <div>Clarity</div>
                                <div>SI2</div>
                            </div>
                            <div class="clarity_cols">  
                                <div>Color</div>
                                <div>1</div>
                            </div>
                            <div class="clear"></div><br>
                        </div>
                        <div class="clear"></div><br>    
                        <div>
<!--                            <img src="<?php echo SITE_URL; ?>img/heart_diamond/diamond_shape_view.jpg" alt="" />-->
                            <img src="<?php echo $supported_shape; ?>" alt="" />
                        </div><br />
                        <div>
                            <div><a href="#javascript" class="link_style">Learn About Diamonds</a></div>
                            <div><a href="#javascript" class="link_style">View GIA Certificate</a></div><br />
                            <div class="prices_label">$<?php echo _nf($priceRetail, 0) + $get_diamond_price; ?></div><br />
                            <div class="total_price_label">Total ring price</div><br /><br /><br />
                            <div><a href="#" class="button_link">Change this diamond</a></div>
                        </div><br />
                        
                    </div>
                </div>
                <div class="detail_bk_right">
                    <div><br /><br />
                    <div class="rightdetail">
                <div class="right_dtheading">5.00-Carat Round Diamond</div>
                <div>This fair-cut G, L-color and VVS1-clarity diamond comes accompanied by a diamond grading report from the GIA. <br>Have a question regarding this item? Our specialists are available to assist you.</div><br>
                <div>
                    <div class="contact_no_dt"><b><?php echo CONTACT_NO; ?></b></div>
                    <div><a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></div>
                </div>
                <br>
                <div class="diamond_left_dt">
                    <div class="detail_rows"><label>SKU# 89 39</label></div>
                    <div class="detail_rows">
                        <span>Measurements: </span>
                        <span>10.71 x 10.83 x 6.92</span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Price</span>
                        <span>$54,600</span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Wire Price</span>
                        <span>$54,600</span>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="right_detail_cols">
                    <div class="right_left_dtcols">
                        <div class="detail_rows"></div>
                    <div class="detail_rows">
                        <span>Report </span>
                        <span>GIA</span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Color </span>
                        <span>L</span>
                        <div class="clear"></div>
                    </div>
                    
                    </div>
                    <div class="right_left_dtcols">
                        <div class="detail_rows"></div>
                    <div class="detail_rows">
                        <span>Cut </span>
                        <span>G</span>
                        <div class="clear"></div>
                    </div>
                     <div class="detail_rows">
                        <span>Clarity </span>
                        <span><?php echo $get_clarity; ?></span>
                        <div class="clear"></div>
                    </div>
                    </div>                    
                </div>                
                <div class="clear"></div><br>
                  <div class="other_link_list">
                      <ul>
                          <li><a href="#" class="js__p_another_start">Drop a Hint</a></li>
                          <li><a href="http://heartsanddiamonds.jewelercart.com/account/account_wishlist/89 39/add/rapnet/">Add to Wishlist</a></li>
                          <li><a href="#" class="js__p_another_start">Ask an Expert</a></li>
                          <li><a href="#" class="js__p_start">Email a Friend</a></li>
                          <li><a href="#" class="js__p_another_start">Schedule Viewing</a></li>
                          <li><a href="#javascript" onclick="printCurrPage()">Print Details</a></li>
                      </ul>
                    </div>
                    <div class="clear"></div><br>
                    <div><b>Other Reports</b></div>
                    <div class="other_reports_link">
                        <ul>
<!--                          <li><a href="#">ASET</a></li>
                          <li><a href="#">Ideal Scope</a></li>
                          <li><a href="#">Heart</a></li>-->
                          <li><a href="#">Lab Report</a></li>
                          <li>
                              <a href="http://www.gia.edu/cs/Satellite?reportno=2145710367&amp;c=Page&amp;childpagename=GIA%2FPage%2FReportCheck&amp;pagename=GIA%2FDispatcher&amp;cid=1355954554547&amp;encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank">Verify Lab Report</a></li>
                      </ul>
                    </div>
            </div>
                <div class="clear"></div><br>
                    </div><br />
                </div>
                
                <div class="clear"></div><br>
                
                    <div class="diamond_result">
                        <table width="">
                            <thead>
                                <tr>
                                    <th>Sort:</th>
                                    <th>Carat</th>
                                    <th>Clarity</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i=1; $i <= 10; $i++) {
                                ?>
                                <tr>
                                    <td><img src="<?php echo SITE_URL; ?>img/heart_diamond/diamond_small_icon.jpg" width="25" alt="diamond_small_icon" /></td>
                                    <td>
                                        <div>Carat</div>
                                        <div>1.20</div>
                                    </td>
                                    <td>
                                        <div>Clarity</div>
                                        <div>S12</div>
                                    </td>
                                    <td>
                                        <div>Color</div>
                                        <div>I</div>
                                    </td>
                                    <td>
                                        <div>Ring Price</div>
                                        <div>$5,775</div>
                                    </td>
                                    <td>
                                        <div><a href="#" class="table_link">View GIA <br>Certificate</a></div>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <div><a href="#">Select</a></div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <div class="clear"></div><br>
            </div>
            <!-- diamond detail block end  -->
            
            <!-- ring detail block start  -->
            <div class="detail_ring_bk" id="ring_detail_bk" style="display:none;">
                <div class="detail_bk_left">
                    <div class="detail_inner_bk">
                        <div class="detail_bk_head"><?php echo $suport_shape; ?> Diamond Engagement Ring</div>
<!--                        <div class="clarity_row">
                            <div class="clarity_cols">
                                <div>Carat</div>
                                <div>1.2</div>
                            </div>
                            <div class="clarity_cols">
                                <div>Clarity</div>
                                <div>SI2</div>
                            </div>
                            <div class="clarity_cols">  
                                <div>Color</div>
                                <div>1</div>
                            </div>
                            <div class="clear"></div><br>
                        </div>-->
                        <div class="clear"></div><br>    
                        <div>
                            <img src="<?php echo $ringimg; ?>" width="282" height="272" alt="<?php echo $ringtitle; ?>" />
                        </div><br />
                        <div>
<!--                            <div><a href="#javascript" class="link_style">Learn About Diamonds</a></div>
                            <div><a href="#javascript" class="link_style">View GIA Certificate</a></div><br />-->
                            <div class="prices_label">$<?php echo _nf($priceRetail, 0) ; ?></div><br />
                            <div class="total_price_label">Total ring price</div><br /><br /><br />
<!--                            <div><a href="#" class="button_link">Change this diamond</a></div>-->
                        </div><br />
                        
                    </div>
                </div>
                <div class="detail_bk_right">
                    <div><br /><br />
                    <div class="details_tab_right">
                        <div><b>ITEM INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Item Code</span>
                                <span><?php echo $rowsring['style_group']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Approx. Weight</span>
                                <span><?php echo $rowsring['metal_weight']; ?></span>
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
                    </div><br />
                </div>
                
                <div class="clear"></div><br>
            </div>
            <!-- ring detail block end  -->
            
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
                            <div><span><?php echo $diamond_carat_value; ?><br>Ct.</span></div>
                        </div>
    <!--                   <span><?php echo _nf($row_detail['carat'], 2); ?><br>Ct.</span>-->
                    <!-- <img src="<?php echo IMGSRC_LINK; ?>your_diamond_dt.jpg" alt="Your Diamond Detail">-->
                   <div class="clear"></div>
                   </div>
               </div>
                <div class="clear"></div><br>
                <br><br><br><br>
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
            </div>
            <br><br>
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
    
    //if( opt === 'complete_stone' ) {
        $.ajax({
            type: "POST",
            url: base_url + 'testengagementrings/viewCenterStone/'+ringid,
            success: function(response) {
                     $('#center_diamond_list').html(response);
           },
                     error: function(){alert('Error ');}
        });
        
        showDiamondResultDetail(ringid);
        getLeftDiamondDetail(ringid, 'ring');
        
//    } else {
//        $('#center_diamond_list').html('');
//    }
}
function showDiamondResultDetail(ringid) {
    $.ajax({
            type: "POST",
            url: base_url + 'testengagementrings/ViewDiamondResult/'+ringid,
            success: function(response) {
                     $('#diamond_detail_bk').html(response);
           },
                     error: function(){alert('Error ');}
        });
}

function getLeftDiamondDetail(ringid, type) {
    $.ajax({
            type: "POST",
            url: base_url + 'testengagementrings/getDiamondResultDetail/'+encodeURI(ringid)+'/'+type,
            success: function(response) {
                     $('#center_stone_detail').html(response);
           },
                     error: function(){alert('Error ');}
        });
}
</script>
<script type="text/javascript">
if (typeof jQuery == 'undefined')
{
    alert("Jquery library is not loaded. Please goto System > Configuration > Catalog > I-Quickshop and enable it.");
}
else
{
    jQuery(document).ready(function() {
        var tb_pathToImage = "<?php echo DEMO_RETAIL_IMG; ?>ajax-loader.gif";
        //tb_init('a.thickbox, area.thickbox, input.thickbox');//pass where to apply thickbox
        imgLoader = new Image();// preload image
        imgLoader.src = tb_pathToImage;
    });
    
    //close thick box on ESC key
    jQuery(this).keydown(function(e){
        if (e == null) { // ie
                keycode = event.keyCode;
        } else { // mozilla
                keycode = e.which;
        }
        if(keycode == 27){ // close
                top.tb_remove();
        }
    });
}

// Added by Amit JS on 06-NOV-2013 to notify empty page
//Modified by sujit on 24-02-14 to send email for partial search
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
    }
    else if(par!='' && page=='') {
        //alert(page);
        jQuery.post(BASE_URL+'/feeds/sendnotification.php',{ptext:'',partialtext:par,surl:'<?php echo SITE_URL; ?>',fpc_id:''},function(res) {
            if(res=='success') {
                window.location.reload(true);
            }
        });
    }
    else {
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
        //Show element after user scrolls 800px
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
    
    function setHDIndexDiamondList(ring_id, shape_set, ring_color, item_metal, page_limit, item, ring_item_id, ring_metal_type) {
        
        var urlink = base_url + 'hdering_collections/getIndexDiamondListRign/'+ring_id + '/' +shape_set + '/' + ring_color+ '/' + item_metal+ '/' + page_limit + '/' + ring_item_id + '/' + ring_metal_type;
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
<!--<div class="topbar_section" style="display: none;">
            <div class="top_bar_cart">
                <div class="topbar_left">
                    <div class="topbar_imgleft"><img src="<?php echo $ringimg; ?>" width="74" alt="<?php echo $ringtitle; ?>" /></div>
                    <div class="topbar_imgright">
                        <div class="topbar_heading">
                            Ring  Item ID: IP1067-3.0<br>
                            <?php echo $ringtitle; ?>
                            "Carats <?php
                        if(isset($_GET['carat'])){
                            echo $rowsring['stone_weight'] + $_GET['carat'];
                        }else{
                            echo $rowsring['stone_weight'] + $get_carat_value_d_i;
                        }
                        ?>
                        <?php echo $get_color; ?> Color <?php echo $get_clarity; ?> Clarity Oval <?php echo $get_lab; ?> by <?php echo $get_cert_no; ?> Diamond Engagement Ring"
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="topbar_right">
                    <div class="topbar_cart_left">
                        <table style="width: 100%;">
                        <tr>
                            <td><a href="<?php echo SITE_URL; ?>account/membersignin" class="addtocart_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" style="display: block;max-width: 150px;">Add To Wishlist</a></td>
                            <td width="20">&nbsp;</td>
                            <td><a href="#" class="addtocart_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" style="display: block;max-width: 150px;">Add To Cart</a></td>
                        </tr>
                        </table>
                    </div>
                    <div class="topbar_cart_right"><a href="#javascript" id="topbar_block"><img src="<?php echo SITE_URL; ?>img/heart_diamond/top_option_icon.jpg" /></a></div>
                </div>
                <div class="clear"></div>
            </div>
            <br>
            </div>-->
            
 
<!-- top bar add to cart block start -->
<div class="topbar_section hide_block">
    <div class="top_bar_cart">
        <div class="topbar_left">
            <div class="topbar_imgleft"><img src="<?php echo $ringimg; ?>" width="74" alt="<?php echo $ringtitle; ?>" /></div>
            <div class="topbar_imgright">
                <div class="topbar_heading">
                    Ring  Item ID: <?php echo $rowsring['style_group']; ?><br>
                    <?php
                    if(isset($_GET['carat'])){
                        echo $rowsring['stone_weight'] + $_GET['carat'];
                    }else{
                        echo $rowsring['stone_weight'] + $get_carat_value_d_i;
                    }
                    ?>
                        Carats <?php echo $ringtitle; ?>
                    <!--"<?php echo $get_color; ?> Color <?php echo $get_clarity; ?> Clarity Oval <?php echo $get_lab; ?> by <?php echo $get_cert_no; ?> Diamond Engagement Ring"-->
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="topbar_right">
            <div class="topbar_cart_left">
                <?php 
                    $full_price = $priceRetail+$get_diamond_price;
                    if($full_price < 150){ 
                    header("Location:/");
                    ?>
                    <br>
                        <a href="tel:<?php echo CONTACT_NO ?>" style="width: 100%;color:#666;font-size:20px;margin-top:15px;" id="addtoshopping">Please Call <?php echo CONTACT_NO ?> to Confirm Price</a>
                    <?php }else{?>
                                            
                        <span style="font-size:30px;">$<?php echo _nf($priceRetail+$get_diamond_price, 0) ; ?></span> <a href="#" class="addtocart_btn" onclick="addcartsubmit('<?php echo $buynow_link; ?>')">Add To Cart</a>
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