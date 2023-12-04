<link href="<?php echo SITE_URL; ?>collection_detail/heart_collection_detail_1.css" rel="stylesheet" />
<style>
#offerpopup input[type=text],select,textarea{padding:8px!important;height:35px;margin:0!important}
.container{margin:0;width:100%}
.js__another_popup{margin-top:45px}
.set_ezpay label{font-size:12px;font-weight:700;width:100px}
.set_ezpay span input[type="radio"]{margin:0 6px 0 0}
#ringsthumb_view{border:0 solid #ccc}
.detail_right{width:40%}
.top_bar_cart{max-width:100%;top:0;left:0}
.container2{width:100%;margin:0 auto;padding:0 15px;background:#E9E9E9}
.diamondViewDetail{padding-top:20px}
.bread_crumb_list a{color:#666!important}
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
.catalog-product-view.page-layout-1column .detail_right:before{background:#e8e8e8}
.catalog-product-view.page-layout-1column .detail_right{background:#e8e8e8}
.detail_bk_row .detail_left_cols{text-align: left;width: 50%;float: left;padding: 10px;}
.detail_bk_row .detail_right_cols{text-align: right;width: 50%;float: left;padding: 10px;}
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

/* show and hide product deail tabs */
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
				$get_dev_index_info	= $this->Catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');

				$additional_stones_ex = explode('/', $rowsring['additional_stones']);
				$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);

				$where_dev_index		= array('carat' => $_GET['carat'], 'price !=' => '', 'price >' => '', 'color !=' => '');
				$get_dev_index_all_info	= $this->Catemodel->getdata_any_table_limit_order_by_where_like('dev_index', $where_dev_index, '1', '0', 'price', 'ASC', $additional_stones_first_item['1'], 'Meas');

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
					$get_dev_index_info	= $this->Catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
				}else{
					if($_GET['carat'] == '1'){
						$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' AND vdbapp_id > 0 AND fcolor_value = '' AND (`carat` LIKE '1.0' OR `carat` LIKE '".$_GET['carat']."') AND shape like '%".$suport_shape."%' LIMIT 1";
						$res_qry = $this->db->query($req_sql);
						$get_dev_index_info = $res_qry->result();
					}else{
						$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' AND vdbapp_id > 0 AND fcolor_value = '' AND `carat` LIKE '".$_GET['carat']."' AND shape like '%".$suport_shape."%' LIMIT 1";
						$res_qry = $this->db->query($req_sql);
						$get_dev_index_info = $res_qry->result();
					}
				}

				if(empty($get_dev_index_info)){
					if($_GET['carat'] == '1'){
						if($suport_shape == 'ROUND' || $suport_shape == 'round'){
							$req_sql = "SELECT * FROM `dev_index` WHERE `price` IS NOT NULL AND `price` > '0' AND `color` != '' AND fcolor_value = '' AND (`carat` LIKE '1.0' OR `carat` LIKE '".$_GET['carat']."') AND shape LIKE 'b' LIMIT 1";
							$res_qry = $this->db->query($req_sql);
							$get_dev_index_info = $res_qry->result();
						}else{
							$req_sql = "SELECT * FROM `dev_index` WHERE `price` IS NOT NULL AND `price` > '0' AND `color` != '' AND fcolor_value = '' AND (`carat` LIKE '1.0' OR `carat` LIKE '".$_GET['carat']."') AND shape LIKE '%".$suport_shape."%' LIMIT 1";
							$res_qry = $this->db->query($req_sql);
							$get_dev_index_info = $res_qry->result();
						}
					}else{
						if($suport_shape == 'ROUND' || $suport_shape == 'round'){
							$req_sql = "SELECT * FROM `dev_index` WHERE `price` IS NOT NULL AND `price` > '0' AND `color` != '' AND fcolor_value = '' AND `carat` LIKE '".$_GET['carat']."' AND shape LIKE 'b' LIMIT 1";
							$res_qry = $this->db->query($req_sql);
							$get_dev_index_info = $res_qry->result();
						}else{
							$req_sql = "SELECT * FROM `dev_index` WHERE `price` IS NOT NULL AND `price` > '0' AND `color` != '' AND fcolor_value = '' AND `carat` LIKE '".$_GET['carat']."' AND shape LIKE '%".$suport_shape."%' LIMIT 1";
							$res_qry = $this->db->query($req_sql);
							$get_dev_index_info = $res_qry->result();
						}
					}
				}

				$check_data = 0;
				if( count($get_dev_index_info) > 0 ) {
					foreach( $get_dev_index_info as $rows ) {
						$white_color_array	= array('D','E','F','G','H','I','J');
						$additional_meas_ex	= explode('x', $rows->Meas);
						$dev_index_meas		= str_replace('.', 'x', $additional_meas_ex['0']);
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
				$get_dev_index_info	= $this->Catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
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
					$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' and (color='d' or color='e' or color='f' or color='g' or color='h' or color='i' or color='j') and (clarity = 'FL' OR clarity = 'IF' OR clarity = 'VVS1' OR clarity = 'VVS2' OR clarity = 'VS1' OR clarity = 'VS2' OR clarity = 'Si1') and `carat` = '0.25' and Meas like '".$frt_like."%' and Meas like'%".$sec_like."%' and shape like '%".$suport_shape."%' AND fcolor_value = '' LIMIT 1";
					$res_qry = $this->db->query($req_sql);
					$get_dev_index_info = $res_qry->result();
					$additional_meas_ex		= explode('x', $get_dev_index_info->Meas);
					$dev_index_meas			= str_replace('.', 'x', $additional_meas_ex['0']);
					$result_new_index_meas	= substr($dev_index_meas['0'], 0, 3);
				}
				$check_count = $check_count + 1;
				if(empty($get_dev_index_info) || empty($additional_stones_first_item21[1])){
					$req_sql = "SELECT * FROM (`dev_index`) WHERE `price` != '' AND `price` > '0' AND `color` != '' and (color='d' or color='e' or color='f' or color='g' or color='h' or color='i' or color='j') and (clarity = 'FL' OR clarity = 'IF' OR clarity = 'VVS1' OR clarity = 'VVS2' OR clarity = 'VS1' OR clarity = 'VS2' OR clarity = 'Si1') and `carat` = '0.25' AND fcolor_value = '' LIMIT 1";
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
			$white_color_array	= array('D','E','F','G','H','I','J');
			if(!in_array($get_dev_index_info[0]->color, $white_color_array)){
				$get_color 	 = 'D';
			}
			$glarity_array = array('FL','IF','VVS1','VVs2','Vs1','Vs2','Si1');
		}
	}
	$get_diamond_price  = 0;
	if(empty($get_cert_no)){
		$get_cert_no	= '6157024136';
	}else{
		$get_cert_no	= $get_cert_no;
	}

	if(isset($_GET['carat'])){
		$diamond_carat_value = _nf( $_GET['carat'], 2);
	}else{
		$get_carat_value_d_i_NEW  =  str_replace(' CT.','',$rowsring['stone_weight']) + $get_carat_value_d_i;

		if($get_carat_value_d_i_NEW == 0){
			$get_carat_value_d_i = 0.25;
		}
		$diamond_carat_value = _nf( $get_carat_value_d_i, 2);
	}    
	$carat_margin = getCaratMargin( $diamond_carat_value );
	$ringtitle =  str_replace('KP', 'KT', $ringtitle);
	?>
	<style>
	.diamond_carat_bg{background: url('<?php echo SITE_URL; ?>img/david_home/diamond_search/carat_diamond_bg_view.jpg') center no-repeat; width: 100%; height: 137px;}
	.diamond_carat_bg div{background: url('<?php echo SITE_URL; ?>img/david_home/diamond_search/carat_bg_value.png') left no-repeat; width: 189px; height: 159px; display: inline-block; margin:5.4em 0px 0px <?php echo $carat_margin; ?>;}
	.diamond_carat_bg div span{display: inline-block; font-size: 20px; padding: 4.4em 0px 0px 30px; color:#fff;}
	.ringsize span:first-child{width:130px !important;}
    </style>
    <div>
		<ul class="bread_crumb_list">
			<li><a href="<?php echo SITE_URL; ?>">Home</a></li> >
			<li><a href="<?php echo SITE_URL; ?>diamonds/wedding-bands">Wedding Bands</a></li>
		</ul>
	</div>
    <div class="moredetail_bgblock daviddt_block">
		<div class="container2">
			<hr>
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
						<?php if($thumbs_count > 3){ ?>
							<br><p style="font-size: 18px;line-height: 1.5;margin-bottom: 5px;font-weight: bold">Wedding Band is Sold Separately</p>
						<?php } ?>
					</div>
					<script type="text/javascript">
					function ch_imgs(img_src){
						$("#light_img").attr("src", img_src);
						$("#light_a").attr("href",img_src);
					}
					</script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
					<script>
					baguetteBox.run('.tz-gallery-collection');
					</script>
				</div>       
				<form name="form1_detail" id="form1_detail" method="post" action="">
					<div class="detail_right col-sm-6">
						<div class="cut_diamond">
							<h1 class="product-title" itemprop="name">
								<?php echo get_site_contact_info('dashboard_title'); ?> <?php
								if(isset($_GET['carat'])){
									echo $_GET['carat'];
								}else{
									echo str_replace(" CT.","",$rowsring['stone_weight']);
								}
								?> Carats
								<?php echo $ringtitle; ?>
							</h1>
						</div>
						<div class="prices_label" id="price_label" style="margin-top:10px;">
							Setting Price: $<?=_nf($retail_price+$get_diamond_price,0)?>
						</div><br>
						<span style="font-size:24px;border-bottom: solid 1px #cccccc;">
							<span>Wire Price:</span>
							<?php $wirePrice = $retail_price*0.03; ?>
							<span style="padding-left: 25px;">$<?php echo _nf($retail_price-$wirePrice, 0); ?></span>
						</span><br>
						<p id="show_real_price_msg"></p>
						<div class="learn_about">
							<div class="further_dtcols">
								<span>Carat Weight</span>
								<span><?php
								if(isset($_GET['carat'])){
									echo $_GET['carat'];
								}else{
									echo str_replace(" CT.","",$rowsring['stone_weight']);
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
						<div class="further_dtcols metalsection ringsize set_ezpay" style="display:none">
							<span>Ez Pay :</span>
							<?php $full_price = _nf($retail_price+$get_diamond_price,0); ?>
							<script>
							function selectEzPay(){
								var ez_payments     = $("#ez_payments").val();
								var get_real_price  = $("#get_real_price").val();
								if(ez_payments == 3){
									var show_real_price = $("#3ez_price").val();
									$("#show_real_price_msg").html('Pay 1/3 now and rest  over 2 months');
									//$("#show_real_price_msg").html('Pay $'+show_real_price+' today and $'+show_real_price+' for the next 2 months then we will ship product');
								}else if(ez_payments == 5){
									var show_real_price = $("#5ez_price").val();
										$("#show_real_price_msg").html('Pay 1/5 now and rest  over 4 months');
								//	$("#show_real_price_msg").html('Pay $'+show_real_price+' today and $'+show_real_price+' for the next 4 months then we will ship product');
								}else{
									var show_real_price = $("#main_ez_price").val();;
									$("#show_real_price_msg").html('');
								}
								$("#show_real_price").html('$'+show_real_price);
							}
							</script>
							<select name="ez_payments" id="ez_payments" class="form-control" onChange="selectEzPay()">
								<option value="0">Full Price - $<?php echo _nf($retail_price+$get_diamond_price, 0) ; ?></option>
								<option value="<?php echo $first_ez_value; ?>"> <?php echo $first_ez_value; ?>ez - $<?php echo _nf(($retail_price+$get_diamond_price)/$first_ez_value, 0); ?></option>
								<option value="<?php echo $second_ez_value; ?>"> <?php echo $second_ez_value; ?>ez - $<?php echo _nf(($retail_price+$get_diamond_price)/$second_ez_value, 0); ?></option>
							</select> 
							<input type="hidden" id="3ez_price" value="<?php echo _nf(($retail_price+$get_diamond_price)/$first_ez_value, 2); ?>">
							<input type="hidden" id="5ez_price" value="<?php echo _nf(($retail_price+$get_diamond_price)/$second_ez_value, 2); ?>">
							<input type="hidden" id="main_ez_price" value="<?php echo _nf($retail_price+$get_diamond_price, 2) ; ?>">
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
									echo $rowsring['matalType'];  
								}
								?>
								</b>
							</div>
							<ul class="set_metals_list" style="display:none">
								<li>
									<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $rowsring['ring_id'];?>/1/14KP/">
									<img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_2.jpg" alt="metal_icons_2" />
									</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $rowsring['ring_id'];?>/1/18KP/">
									<img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_5.jpg" alt="metal_icons_5" />
									</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $rowsring['ring_id'];?>/1/PLAT/">
									<img src="<?php echo SITE_URL; ?>img/heart_diamond/metal_icons_4.jpg" alt="metal_icons_4" />
									</a>
								</li>
							</ul>
						</div>
						<div class="price-and-purchase">
							<div class="price-with-button force-wrap" data-smart-wrap="true">
								<div class="price-display">
									<div class="regular-price" style="display:none;">
										<span class="price" itemprop="price" content="<?php echo _nf($retail_price+$get_diamond_price, 0) ; ?>">$<?php echo _nf($retail_price+$get_diamond_price, 0) ; ?></span>
									</div> 
									<div style="text-align:right;font-size:15px;display:none;">
										<?php if($row_cate['parent_cid'] == 63 OR $row_cate['parent_cid'] == 69 OR $row_cate['parent_cid'] == 67 OR $row_cate['parent_cid'] == 57 OR $row_cate['parent_cid'] == 71 OR $row_cate['parent_cid'] == 73){ ?>
										<?php }else{ ?>
											<span class="price-message">(Price with
											<?php
											if(isset($_GET['carat'])){
												echo str_replace(' CT.','',$rowsring['stone_weight']) + $_GET['carat'];
											}else{
												echo str_replace(' CT.','',$rowsring['stone_weight']) + $get_carat_value_d_i;
											}
											?> Center Carat)</span><br>
										<?php } ?>
									</div>
									<div style="text-align:right;font-size:17px;display:none;">
										<?php
										$white_color_array = array('D','E','F','G','H','I','J');
										if(in_array($get_color, $white_color_array)){
											$get_color_diamond = 'white';
										}else{
											$get_color_diamond = 'yellow';
										}?>
									</div>
									<?php if(!empty($_GET['carat'])){?>
									<input type="hidden" value="<?php echo $_GET['carat'];?>" id="ch_cart1">
									<?php }else{?>
									<input type="hidden" value="0.25" id="ch_cart1">
									<?php }?>
									<input type="hidden" value="<?= isset($req_stone)?$req_stone:'';?>" id="req_stone1">
								</div>
							</div>    
						</div> 
						<div class="clear"></div>
						<div class="set_buton_bg col-sm-10">
							<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $setingtype; ?>">
							<input type="hidden" name="3ez_price" value="<?= isset($ez3)?intval(number_format($ez3,0,'.','')):''; ?>">
							<input type="hidden" name="5ez_price" value="<?= isset($ez5)?intval(number_format($ez5,0,'.','')):''; ?>">
							<input type="hidden" name="main_price" id='main_price' value="<?php echo $retail_price + $get_diamond_price; ?>" />
							<input type="hidden" name="price" value="<?php echo $retail_price+$get_diamond_price; ?>" />
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
							<input type="hidden" name="item_title" value="<?php if(isset($_GET['carat'])){ echo str_replace(' CT.','',$rowsring['stone_weight']) + $_GET['carat']; }else{ echo str_replace(' CT.','',$rowsring['stone_weight']) + $get_carat_value_d_i; } ?> carat <?php  if($rowsring['matalType'] == 'PLAT'){  echo 'Platinum';    }else{  echo $rowsring['matalType'];    }  ?> Color <?php echo $get_color; ?> Clarity <?php   echo $get_clarity; ?> <?php echo $get_cert_no; ?> by <?php echo $get_lab; ?> Diamond Engagement Ring" />
							<input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
							<input type="hidden" name="product_type" value="Engagement Rings" />
							<input type="hidden" name="center_stone_id" id="center_stone_id" />
							<input type="hidden" name="txt_qty" value="1" />
							<a href="#javascript" onclick="addcartsubmit('<?php echo $buynow_link; ?>')" id="addtoshopping"><div class="nile-button-black">Place a Memo</div></a>
						</div>
					</div>
				</form>  
				<div class="clear"></div>
				<script>
				$(document).ready(function(){
					$(document).on('click','.dfinder',function(e){
						e.preventDefault();
						var i = $(this).attr('data-i');
						var dstonumber = $(this).closest('tr').find('.shape-'+i).attr('data-stock-n');
						var dshape = $(this).closest('tr').find('.shape-'+i).html();
						var dcarat = $(this).closest('tr').find('.carat-'+i).html();
						var dcolor = $(this).closest('tr').find('.dc-'+i).html();
						var dcl = $(this).closest('tr').find('.dcl-'+i).html();
						var p = $(this).closest('tr').find('.price-'+i).attr('data-p');
						var pp = $(this).closest('tr').find('.price-'+i).html();
						var semiamt = $('#semi_price').attr('data-semi');
						var totalamt = parseFloat(semiamt)+parseFloat(p);
						var totalamt = parseFloat(totalamt).toFixed(2);
						$('.topbar_cart_left span').html('$'+totalamt);
						$('#price_label').html('$'+totalamt);
						$('.price').html('$'+totalamt);
						$(".price").attr("content",totalamt);
						$('#finalamt').html('$'+totalamt);
						$('.row-'+i).css('background-color','yellow')
						$('#stock_no').html('<a href="<?php echo base_url();?>/diamonds/diamond_detail/'+dstonumber+'/false/">'+dstonumber+'</a>');
						$('.side_diamond_shape').html(dshape);
						$('.center_diamond_carat').html(dcarat);
						$('.diamond_color').html(dcolor);
						$('.diamond_clarity').html(dcl);
						$('.center_loose_price').html(pp);
					});
				});
				</script>
				<div id="details-and-purchase">
					<div class="detail_bk_row first_item_d_rin">
						<div class="detail_left_cols">Ring Stock Number</div><div class="detail_right_cols"><?php echo $rowsring['name']; ?></div><div class="clear"></div>
					</div>
					<div class="detail_bk_row">
						<div class="detail_left_cols">TYPE</div><div class="detail_right_cols">Diamond</div><div class="clear"></div>
					</div>
					<?php
					if($rowsring['additional_stones'] == ''){
						$shape_type = "Round";
					}else{
						$supplied_stones = explode(',', $rowsring['supplied_stones']);
						if(count($supplied_stones) > 1){
							$shapeTypeArr = array();
							foreach($supplied_stones as $key=>$value){
								$additional_stones_ex = explode('/', $supplied_stones[0]);
								$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
								$additional_stones_secound_item = explode('x', $additional_stones_first_item['1']);
								if($additional_stones_ex['1'] == 'R' OR $additional_stones_ex['1'] == 'RD'){
									$shapeTypeArr[] = "Round";
								}else if($additional_stones_ex['1'] == 'A' OR $additional_stones_ex['1'] == 'AS'){
									$shapeTypeArr[] = "Asscher";
								}else if($additional_stones_ex['1'] == 'EC'){
									$shapeTypeArr[] = "Emerald";
								}else if($additional_stones_ex['1'] == 'PR'){
									$shapeTypeArr[] = "Princes";
								}else if($additional_stones_ex['1'] == 'H'){
									$shapeTypeArr[] = "Heart";
								}else if($additional_stones_ex['1'] == 'c' OR $additional_stones_ex['1'] == 'cu' OR $additional_stones_ex['1'] == 'C' OR $additional_stones_ex['1'] == 'CU'){
									$shapeTypeArr[] = "Cushion";
								}else if($additional_stones_ex['1'] == 'ma' OR $additional_stones_ex['1'] == 'MA'){
									$shapeTypeArr[] = "Marquise";
								}else if($additional_stones_ex['1'] == 'pe' OR $additional_stones_ex['1'] == 'PE'){
									$shapeTypeArr[] = "Pear";
								}else{
									$shapeTypeArr[] =$rowsring['supplied_stones'];
								}
							}
							if(!empty($shapeTypeArr)){
								$shape_type = implode(",",array_unique($shapeTypeArr));
							}else{
								$shape_type = $rowsring['supplied_stones'];
							}
						}else{
							$additional_stones_ex = explode('/', $supplied_stones[0]);
							$additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
							$additional_stones_secound_item = explode('x', $additional_stones_first_item['1']);
							
							if($additional_stones_ex['1'] == 'R' OR $additional_stones_ex['1'] == 'RD'){
								$shape_type = "Round";
							}else if($additional_stones_ex['1'] == 'A' OR $additional_stones_ex['1'] == 'AS'){
								$shape_type = "Asscher";
							}else if($additional_stones_ex['1'] == 'EC'){
								$shape_type = "Emerald";
							}else if($additional_stones_ex['1'] == 'PR'){
								$shape_type = "Princes";
							}else if($additional_stones_ex['1'] == 'H'){
								$shape_type = "Heart";
							}else if($additional_stones_ex['1'] == 'c' OR $additional_stones_ex['1'] == 'cu' OR $additional_stones_ex['1'] == 'C' OR $additional_stones_ex['1'] == 'CU'){
								$shape_type = "Cushion";
							}else if($additional_stones_ex['1'] == 'ma' OR $additional_stones_ex['1'] == 'MA'){
								$shape_type = "Marquise";
							}else if($additional_stones_ex['1'] == 'pe' OR $additional_stones_ex['1'] == 'PE'){
								$shape_type = "Pear";
							}else{
								$shape_type =$rowsring['supplied_stones'];
							}
						}
					}
					?>
					<div class="detail_bk_row">
						<div class="detail_left_cols">Side Diamond Shape</div>
						<div class="detail_right_cols side_diamond_shape"><?php echo $shape_type;?></div>
						<div class="clear"></div>
					</div>
					<div class="detail_bk_row">
						<div class="detail_left_cols">Side Diamond Carats</div><div class="detail_right_cols"><?php echo $rowsring['stone_weight']; ?></div><div class="clear"></div>
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
						$cur_stones1 = explode(',',$rowsring['supplied_stones']);
						$req_tot = 0;
						if(!empty($cur_stones1)){
							foreach($cur_stones1 as $cur_stone1){
								$req_data = explode('-',$cur_stone1);
								$req_tot = $req_tot + (int)$req_data[0];
							}
							$req_tot = $req_tot;
						}
						?></div><div class="clear"></div>
					</div>
					<div class="detail_bk_row">
						<div class="detail_left_cols">Total Diamonds</div><div class="detail_right_cols"><?php echo $req_tot;?></div><div class="clear"></div>
					</div>
					<div class="detail_bk_row">
						<div class="detail_left_cols">Setting Price</div><div class="detail_right_cols" id="semi_price" data-semi="<?php echo _nf($retail_price, 0); ?>">$<?php echo _nf($retail_price, 0); ?></div><div class="clear"></div>
					</div>
					<?php
					$item_listing = array(
						'Item Code' => $rowsring['style_group'],
						'Metal' => $rowsring['matalType'],
						'Approx. Weight' => $rowsring['metal_weight'],
						'Measurements' => 'Top Width: '.$rowsring['top_width'].' mm, <br>Bottom Width: '.$rowsring['bottom_width'].' mm, <br>Top Height: '.$rowsring['top_height'].' mm, <br>Bottom Height: '.$rowsring['bottom_height'].' mm',
						'Style Name' => $rowsring['name'],
						'Style Group Name' => $rowsring['style_group'],
						'Clarity' => 'VS',
						'Color' => 'GH'
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
								<span>VS</span>
								<div class="clear"></div>
							</div>
							<div class="item_rows">
								<span>Color</span>
								<span>GH</span>
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
			<div class="clear"></div>
		</div>
		<div class="clear"></div><br>
	</div>
</div>
<div class="clear"></div>
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
    
    function setHDIndexDiamondList(ring_id, shape_set, ring_color, item_metal, page_limit, item, ring_item_id, ring_metal_type,ch_price) {
        var ch_cart1 = $('#ch_cart1').val();
		var ch_param = '';
		if(ch_cart1!=''){
			ch_param = '?ch_cart1='+ch_cart1;
			<?php if(!empty($_GET['ring_size'])){?>
				ch_param = ch_param +'&ring_size=<?php echo $_GET['ring_size'];?>';
			<?php }?>
		}
		else{
			<?php if(!empty($_GET['ring_size'])){?>
				ch_param = '?ring_size=<?php echo $_GET['ring_size'];?>';
			<?php }?>
		}
		
		if(ch_price!=''){
			ch_param = ch_param +'&ch_price='+ch_price;
		}
		else{
			ch_param = '?ch_price='+ch_price;
		}
		
		var req_stone1 = $('#req_stone1').val();	
        var urlink = base_url + 'hdering_collections/getIndexDiamondListRign/'+ring_id + '/' +shape_set + '/' + ring_color+ '/' + item_metal+ '/' + page_limit + '/' + ring_item_id + '/' + ring_metal_type+'/'+req_stone1+ch_param;
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
<!-- top bar add to cart block end -->
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>