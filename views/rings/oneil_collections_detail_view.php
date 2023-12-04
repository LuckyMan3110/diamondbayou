<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<style>
#image-viewer-details-and-purchase .right-half{float:none;width:100%}
.product-detail-purchase{position:fixed;width:400px;z-index:6;padding-top:70px}
.product-detail-accordion .accordion-item .accordion-drawer{max-width:100%}
.ring_img_block{text-align:center;height:auto}
.product-detail-accordion .product-detail{display:block;padding-right:inherit;padding-left:inherit;float:none;margin-bottom:20px;overflow:hidden}
body > #content-wrapper,body > footer{max-width:100%}
.product-detail-accordion{margin-top:0}
#image-viewer-details-and-purchase{margin:0}
.product-detail{padding:0!important}
.detail-accordion{background:#fff}
.product-detail-wrap{font-size:0;background-color:#fff;display:block;padding:0}
h1.product-title{padding-left:0;color:#222;line-height:35px}
.metalsection select{border:1px solid #ccc;width:280px}
.nile-button-black{background-color:#000;text-align:center;color:#fff;padding:13px 0;width:70%;margin:10px 0 20px}
.contact_right_cols{float:left;width:100%;border-left:none;margin:2px 0 0;padding:0}
.social-icons .group-of-icons{float:left}
.product-detail-accordion .accordion-item .accordion-button{border-top:none}
.product-detail-accordion .accordion-item:last-of-type{border-bottom:none}
.collection_listings .set_bk_height{width:23.9%;background-color:#fff}
.set_position img{position:static!important;width:100%}
.collection_listings .similar_collection .sp{padding:0!important;width:200px;margin:0 auto;position:relative}
.sp{margin:0}
#page{background:#E9E9E9}
.item_info_view{position:absolute;bottom:62px;left:0;font-size:13px;right:0;background-color:#fff;height:115px;padding:13px}
.item_lable_style a,.addtocart_icon a{color:#333}
.detail_center{padding:0 20px}
.shipping-details-area{background-color:#F3F3F3;padding:60px 0;position:relative;z-index:999999;margin-top:-18px!important}
.detail-accordion{position:initial}
.footer{z-index:999;position:relative}
.w3layouts_bottom{z-index:999;position:relative}
.set_position img{width:auto;max-width:200px}
.purchase-column{margin-left:1.1666666667%}
.collection-detail-accordion{width:55%;float:left}
.collection-purchase-column{width:40%;float:right}
#product-details{padding:0 0 30px 30px !important}
#card-details-and-purchase{width:450px}
.fix-scrolling{position:fixed;width:450px;top:100px}
.top_bar_cart{z-index:999}
.ring_view_rating{display:none}
.topbar_section{background-color:#fff}
.catalog-product-view.page-layout-1column .detail_right:before{background:#e8e8e8}
.catalog-product-view.page-layout-1column .detail_right{background:#e8e8e8}
.variation-filters select{height:auto;padding:2px}
.loadingplease{background:none repeat scroll 0 0 #fff;display:block;height:380px;opacity:.7;position:absolute;text-align:center;width:400px;z-index:99999}
@media (max-width: 768px) {
.collection-detail-accordion{width:100%;float:none;padding:0px 15px}
.collection-purchase-column{width:100%;float:none;padding:0px 15px;text-align:center}
#card-details-and-purchase{width:100%}
.rings_block{text-align:center}
.addtocart_icon{left:30%}
.nile-button-black{width:100%}
#product-details{padding:0px!important}
}
</style>
<script>
$('.page-wrapper').before('<div class="loadingplease" id="loadingplease" style="display: block;position: fixed;width: 100vw;height: 100vh;top: 0;left: 0;background-color: rgba(255, 255, 255, 0.9);display: flex;justify-content: center;align-items: center;display: none;"> <img src="https://thumbs.gfycat.com/AnimatedImpureAmericancicada-max-1mb.gif" style="padding-top: 90px;max-width: 100%;">	</div>');
</script>
<script>
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
	if (y > 250) {
		$('#card-details-and-purchase').addClass("fix-scrolling");
	}else if (y > 400) {
		alert(y);
		$('#card-details-and-purchase').removeClass("fix-scrolling");
	} else {
		$('#card-details-and-purchase').removeClass("fix-scrolling");
	} 
});
</script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/zoom_jquery.css" rel="stylesheet" />
<script src="<?php echo SITE_URL; ?>js/jquery.zoom.js"></script>
<script>
$(document).ready(function(){
	$('.sp').zoom();
	$('#show_thumb_view').zoom();
	$('#show_thumb_view .sp img').scroll(zoom);
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
<?php
if($rowsring['vendor_name'] == 'Carrolls Jewelers'){
	$sales_price = $sales_price;
}
?>
<div class="content">
	<div>
		<ul class="bread_crumb_list">
			<li><a href="<?php echo SITE_URL; ?>">Home</a></li> >
			<li><a href="<?php echo SITE_URL; ?>rings/ringCollections/<?php echo $catgory_id; ?>"><?php echo $parent_cate; ?></a></li>
		</ul>
	</div>
	<div class="row">
		<div class="collection-detail-accordion">
			<div class="accordion-wrapper standard">
				<div id="accordion-product-details" class="product-details-nav-product-details accordion-item accordion-item-mutually-exclusive accordion-item-default accordion-item-standard accordion-item-medium accordion-item-small _open">
					<div class="detail_center">
						<div class="ring_img_block"  style="display:none;">
							<div class="zoomright" id="ringsthumb_view" >
								<div class="set_thumb_img" id="<?php echo $rowsring['stock_number'];?>">
									<div class="" id="show_thumb_view"></div>
									<div class="image_section">
										<?php echo $product_thumbs; ?>
                                    </div>
								</div> 
								<div class="left_arrow_view"><a href="#javascript" onclick="button_previous('<?php echo $rowsring['stock_number'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/left_arrow_icon.jpg" alt="left_arrow_icon" /></a></div>
								<div class="right_arrow_view"><a href="#javascript" onclick="button_next('<?php echo $rowsring['stock_number'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/right_arrow_icon.jpg" alt="right_arrow_icon" /></a></div>
							</div>
							<div class="clear"></div>
							<div class="rings_thumbs" style="max-width: 100%;">
								<?php
								if( !empty($prod_thumbs['small_thumbs']) ) {
									echo '<div class="small_thumbs">'.$prod_thumbs['small_thumbs'].'</div>';
								}
								?>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>

                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">    
                        <div class="tz-gallery-collection">
							<?php 
							$make_html	= '<a class="lightbox" id="light_a" href="'. SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image1']).'"><img alt="diamonds-img" id="light_img" class="" src="'. SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image1']).'" style="margin: 0px 0px;width:100%;" /></a><br>';
							if(file_exists(str_replace("THUMBNAIL/","",$rowsring['image2']))){
								$make_html	.= '<a href="javascript:void(0);" onclick="ch_imgs1(\''. SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image2']).'\')"> <img src="'. SITE_URL .'resize.php/'. str_replace("THUMBNAIL/","",$rowsring['image2']).'?width=55&height=55&image=/'. str_replace("THUMBNAIL/","",$rowsring['image2']).'" style="width:55px;height:55px;display: inherit;" alt="'.$rowsring['stock_real_number'].'" /></a>';
							}
							if(file_exists(str_replace("THUMBNAIL/","",$rowsring['image3']))){
								$make_html	.= '<a href="javascript:void(0);" onclick="ch_imgs1(\''. SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image3']).'\')"> <img src="'. SITE_URL .'resize.php/'. str_replace("THUMBNAIL/","",$rowsring['image3']).'?width=55&height=55&image=/'. str_replace("THUMBNAIL/","",$rowsring['image3']).'" style="width:55px;height:55px;display: inherit;" alt="'.$rowsring['stock_real_number'].'" /></a>';
							}
							if(file_exists(str_replace("THUMBNAIL/","",$rowsring['image4']))){
								$make_html	.= '<a href="javascript:void(0);" onclick="ch_imgs1(\''. SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image4']).'\')"> <img src="'. SITE_URL .'resize.php/'. str_replace("THUMBNAIL/","",$rowsring['image4']).'?width=55&height=55&image=/'. str_replace("THUMBNAIL/","",$rowsring['image4']).'" style="width:55px;height:55px;display: inherit;" alt="'.$rowsring['stock_real_number'].'" /></a>';
							}
							if(file_exists(str_replace("THUMBNAIL/","",$rowsring['image5']))){
								$make_html	.= '<a href="javascript:void(0);" onclick="ch_imgs1(\''. SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image5']).'\')"> <img src="'. SITE_URL .'resize.php/'. str_replace("THUMBNAIL/","",$rowsring['image5']).'?width=55&height=55&image=/'. str_replace("THUMBNAIL/","",$rowsring['image5']).'" style="width:55px;height:55px;display: inherit;" alt="'.$rowsring['stock_real_number'].'" /></a>';
							}
							if(file_exists(str_replace("THUMBNAIL/","",$rowsring['image6']))){
								$make_html	.= '<a href="javascript:void(0);" onclick="ch_imgs1(\''. SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image6']).'\')"> <img src="'. SITE_URL .'resize.php/'. str_replace("THUMBNAIL/","",$rowsring['image6']).'?width=55&height=55&image=/'. str_replace("THUMBNAIL/","",$rowsring['image6']).'" style="width:55px;height:55px;display: inherit;" alt="'.$rowsring['stock_real_number'].'" /></a>';
							}
							echo $make_html;
							?>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
                        <script>
						baguetteBox.run('.tz-gallery-collection');
						function ch_imgs1(img_src){
							$("#light_img").attr("src", img_src);
							$('#light_a').attr("href",img_src);
						}
                        </script>
					</div>
                    <br><br>
					<div class="accordion-drawer" id="product-details">
						<div class="product-detail">
							<?php if( !empty($rowsring['description']) ){ ?>
								<h3>Description</h3>
								<?php echo ''.get_site_contact_info('dashboard_title').' '.$rowsring['description'].' '.$rowsring['subcategory'].' '.$rowsring['category']; ?>
							<?php } ?>
							<div id="image-viewer-details-and-purchase">
								<div class="right-half">
									<div id="setting-information-table">
										<div class="detail-table">
											<div class="row detail even first">
												<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Stock Number </span> </div>
												<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['stock_real_number']; ?> </span> </div>
											</div>
											<?php if($rowsring['category_type'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Category Type </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['category_type']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['shape'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Shape</span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php $rowsring['shape']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['style'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Style </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['style']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['carat_weight'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Carat </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['carat_weight']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['metal'] != ''){ ?>
												<div class="row detail" style='display:none;'>
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Metal </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['metal']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['category'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Category </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['category']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['productSKU'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Product SKU </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['productSKU']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['metal_type'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Metal Type </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['metal_type']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['metal_color'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Metal Color </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['metal_color']; ?></span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['ring_size'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Size </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['ring_size']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['width'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Width </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['width']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['chain_type'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Chain Type </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['chain_type']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['clasp_type'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Clasp Type </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['clasp_type']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['RhodiumPolish'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Polish </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['RhodiumPolish']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['clarity'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Clarity </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['clarity']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if($rowsring['setting_type'] != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Setting Type </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $rowsring['setting_type']; ?> </span> </div>
												</div>
											<?php } ?>
											<?php if(isset($comment_text) && $comment_text != ''){ ?>
												<div class="row detail">
													<div data-unique-id="stock-number-column-0" class="column-0 "> <span> Comments </span> </div>
													<div data-unique-id="stock-number-column-1" class="column-1 "> <span> <?php echo $comment_text; ?> </span> </div>
												</div>
											<?php } ?>
											<div class="row contains-link">
												<div class="column-0"></div>
												<div class="column-1"> <a href="#" class="arrowed">Find your ring size</a> </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="product-detail-2"></div>
					</div>
				</div>
			</div>
            <div class="find-promo-small">
				<ul></ul>
            </div>
		</div>
		<div class="collection-purchase-column">
			<div id="card-details-and-purchase" class="clearfix">
				<?php 
				echo $recently_purchased;
				$cate_name = $this->Ringmodel->get_ebay_cat_name($rowsring['subcategory']);
				if($rowsring['metal_color'] == 'Y'){
					$Metal_Color = 'Yellow';
				}else if($rowsring['metal_color'] == 'W'){
					$Metal_Color = 'White';
				}else{
					$Metal_Color = $rowsring['metal_color']; 
				}
				?>
				<div class="small-only title-area">
					<div class="product-title">
						<h1 class="product-title" itemprop="name"><?php echo $heart_title; ?> <span class="sub-text" style="display:none;"> in <?php echo $rowsring['metal_type'].'ct. ('.$Metal_Color.' Gold)'; ?></span></h1>
					</div>
				</div>
				<form name="collection_form" id="collection_form" method="post" action="">
					<div class="right-half">
						<div class="title-area"> 
							<div class="product-title medium-and-large-only">
								<h1 class="product-title" itemprop="name"><?php echo $heart_title; ?> <span class="sub-text" style="display:none;"> in <?php echo $rowsring['metal_type'].'ct. ('.$Metal_Color.' Gold)'; ?> </span></h1>
							</div>
							<div class="price-with-button force-wrap" data-smart-wrap="true">
								<div class="price-display">
									<div class="regular-price" style="border-bottom: solid 1px #cccccc;padding-bottom: 5px;">
										<span class="price" style="font-size: 40px;color: #999999;" id="show_real_price" itemprop="price" content="2990.00">$<?php echo _nf($sales_price) ; ?></span>
									</div>
								</div>
							</div>
							<span id="show_real_price_msg"></span>
							<div class="price-and-purchase">
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

								function addCommas(nStr){
									return parseFloat(Math.round(nStr * 100) / 100).toFixed(2);
								}
								</script>
								<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

								<?php if( $rowsring['category'] == '740520120'){ ?>
									<div class="further_dtcols metalsection ringsize">
										<span>Available in sizes</span>
										<span>
											<select name="metal_type" id="metal_type" onchange="setListingPage(this.value)">
												<?php echo $finger_ring_size; ?>
											</select>
										</span>
									</div>
								<?php
								}

								if($rowsring['category'] == '740520259'){
									if(strpos($rowsring['metal_type'], 'Yellow') !== false){
										$yallow_white_image = 'images/carrollsjewelers/yallow-gold-icon.png';
									}else{
										$yallow_white_image = 'images/carrollsjewelers/white-icon.png';
									}
									?>
									<div class="further_dtcols metalsection ringsize set_ezpay">
										<span style="color:#999;"><img src="<?php echo SITE_URL.$yallow_white_image; ?>" width="25px">  Earrings Back Quality</span>
										<select name="txt_metal" id="txt_metal" class="form-control">
											<option value="<?php echo $rowsring['metal_type']; ?> Medium"><?php echo $rowsring['metal_type']; ?> Medium (Recommended)</option>
											<option value="<?php echo $rowsring['metal_type']; ?> Heavy Duty"><?php echo $rowsring['metal_type']; ?> Heavy Duty</option>
										</select>
									</div>
									<div class="tz-gallery-collection2" style="margin-bottom:20px;display: none;">
										<a href="<?= SITE_URL.'images/'.$rowsring['image1'] ?>">View Large Image</a>
										<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>     
										<script>
										baguetteBox.run('.tz-gallery-collection2');
										</script>
									</div>
								<?php }else{ ?>
									<input type="hidden" name="txt_metal" value="<?php echo $rowsring['metal_type']; ?>" />
								<?php } ?>
								<div class="further_dtcols metalsection ringsize set_ezpay" style="margin-bottom:20px;display:none;">
									<span style="color:#999;">Ez Pay</span>
									<select name="ez_payments" id="ez_payments" class="form-control" onChange="selectEzPay()">
										<option value="0" class="ez_full_price">Full Price - $<?php echo _nf($sales_price) ; ?></option>
										<option value="<?php echo $first_ez_value; ?>" class="ez_payments_t_ez"> <?php echo $first_ez_value; ?>ez - $<?php echo _nf($sales_price/$first_ez_value) ; ?> </option>
										<option value="<?php echo $second_ez_value; ?>" class="ez_payments_f_ez"> <?php echo $second_ez_value; ?>ez - $<?php echo _nf($sales_price/$second_ez_value) ; ?> </option>
									</select>
									<input type="hidden" id="3ez_price" value="<?php echo _nf($sales_price/$first_ez_value) ; ?>">
									<input type="hidden" id="5ez_price" value="<?php echo _nf($sales_price/$second_ez_value) ; ?>">
									<input type="hidden" id="main_ez_price" value="<?php echo _nf($sales_price) ; ?>">
								</div>
								<script>
								$(document).ready(function(){
									$('[data-toggle="tooltip"]').tooltip();
								});
								</script>
								<?php
								$where_dev_ebaycategories_cat    = array('category_id' => $rowsring['subcategory']);
								$dev_ebaycategories_data         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');

								$where_dev_ebaycategories_cat2    = array('category_id' => $rowsring['category']);
								$dev_ebaycategories_data2         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat2, 'dev_ebaycategories');
								?>
								<div class="action-buttons clearfix" style="width:100%;">
									<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $setingtype; ?>">
									<input type="hidden" name="3ez_price" class="3ez_price" value="<?php echo intval(number_format($sales_price/3,0,'.','')); ?>">
									<input type="hidden" name="5ez_price" class="5ez_price" value="<?php echo intval(number_format($sales_price/5,0,'.','')); ?>">
									<input type="hidden" name="main_price" id='main_price' value="<?php echo $sales_price; ?>" />
									<input type="hidden" name="price" id="get_real_price" value="<?php echo $sales_price; ?>" />
									<input type="hidden" name="vender" value="Dcutters_jewelers_diamond_collection">
									<input type="hidden" name="url" value="<?php echo $ringimg; ?>">
									<input type="hidden" name="prodname" value="<?= isset($rowsring['item_title'])?$rowsring['item_title']:'';?>">
									<input type="hidden" name="diamnd_count" value="<?= isset($rowsring['supplied_stones'])?$rowsring['supplied_stones']:'';?>">
									<input type="hidden" name="ring_shape" value="<?= isset($suport_shape)?$suport_shape:'';?>">
									<input type="hidden" name="ring_carat" value="<?= isset($rowsring['metal_weight'])?$rowsring['metal_weight']:'';?>">
									<input type="hidden" name="prid" id="prid" value="<?= isset($rowsring['stock_number'])?$rowsring['stock_number']:'';?>">
									<input type="hidden" name="stock_number" id="stock_number" value="<?= isset($get_stock_number)?$get_stock_number:'';?>">
									<input type="hidden" name="txt_ringtype" value="<?= isset($rowsring['category_type'])?$rowsring['category_type']:'';?>">
									<input type="hidden" name="txt_ringsize" value="<?php if(isset($_GET['ring_size'])){ echo $_GET['ring_size']; }else{ echo isset($$set_ring_size)?$set_ring_size:''; };?>" />
									<input type="hidden" name="metals_weight" value="<?= isset($rowsring['width'])?$rowsring['width']:'';?>" />
									<input type="hidden" name="vendors_name" value="<?= isset($rowsring['vendor_name'])?$rowsring['vendor_name']:'';?>" />
									<input type="hidden" name="vendor_number" value="<?= isset($rowsring['vendor_sku'])?$rowsring['vendor_sku']:'';?>" />
									<input type="hidden" name="table_name" value="dev_jewelries" />
									<input type="hidden" name="item_title" value="<?= isset($rowsring['item_title'])?$rowsring['item_title']:'';?>" />
									<input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
									<input type="hidden" name="product_type" value="<?= isset($dev_ebaycategories_data2['0']->category_name)?$dev_ebaycategories_data2['0']->category_name:''?>" />
									<input type="hidden" name="center_stone_id" id="center_stone_id" />
									<input type="hidden" name="txt_qty" value="1" />
									<div class="button-display">
										<div class="drop-down-action-button "></div>
									</div>
									<?php
									if( $stone_count == 1 || $stone_count == 2 || empty($stone_count) ) {
										echo '<a class="" href="#javascript" onclick="addcartsubmit(\''.$buynow_link.'\')">
											<div class="nile-button-black">Place a Memo</div>
										</a>';
									} else {
										echo 'Please Call ' . CONTACT_NO . ' for pricing';
									}
									?>
								</div>
							</div>
							<div class="review-and-social" style="display:none;">
								<div class="social-icons">
									<div class="group-of-icons"> 
										<a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_1.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
										<a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_2.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
										<a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_3.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
										<a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_4.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
										<a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_5.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
										<a href="#"><img src="<?php echo SITE_URL; ?>collection_detail/social_icon_set_6.jpg" alt="<?php echo SITES_NAME; ?> Studio" /></a>
										<button class="icon-share" data-hasqtip="1"></button>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" class="product_id" value="<?=trim($rowsring['item_title'])?>" />
						<script>
						function sort_item(){
							var variation = $('#variation').val();
							var metal_type = $('#metal_type').val();
							var meta_color = $('#metal_color').val();
							var finish_level = $('#finish_level').val();
							var diamond_quality = $('#diamond_quality').val();
							var product_id = $('.product_id').val();
							var a = "variation="+variation+"&metal_type="+metal_type+"&metal_color="+meta_color+"&finish_level="+finish_level+"&diamond_quality="+diamond_quality+"&product_id="+product_id;
							$("#loadingplease").css("display", "block");
							$.ajax({
								url:"<?=base_url();?>collection/setFilters",
								type:"post",
								data:{variant:variation,metal_type:metal_type,metal_color:meta_color,finish_level:finish_level,diamond_quality:diamond_quality,product_id:product_id},
								dataType:"json",
								success:function(res){
									if(res.price !="0"){
										var priced = res.price;
										$('.topbar_jewlary_price').text('$'+priced.toString());
										$('#show_real_price').text('$'+priced.toString(2));
										$('.ez_full_price').text('Full Price - $'+res.price);
										$('#3ez_price').val(res.tez);
										$('.3ez_price').val(res.tez);
										$('.ez_payments_t_ez').text('ez - $'+res.tez);
										$('#5ez_price').val(res.fez);
										$('.5ez_price').val(res.fez);
										$('.ez_payments_f_ez').text('ez - $'+res.fez);
										$('#main_price').val(res.price);
										$('#get_real_price').val(res.price);
									}
									$("#loadingplease").css("display", "none");
								}
							});
						}
						function variationProduct(v){
							sort_item();
						}
						</script>
						<div class="variation-filters">
							<div class="col-md-12">
								<label class="col-md-4">VARIATION</label>
								<select id="variation" name="variation" class="col-md-8" onchange="variationProduct(this.value);">
									<?php echo $optionVariation = getVariants('variation',preg_replace('/\s+/', '', $rowsring['item_title']),$rowsring['category'],$rowsring['subcategory'],''); ?>
								</select>
							</div>
							<div class="clear"></div><br>
							<script>
							function metalTypeProduct(v){
								sort_item();
								$('.set_metal_label').find('b').text(v);
								$('.metal_weight_overnig').text(v);
							}
							</script>
							<div class="col-md-12">
								<label class="col-md-4">METAL TYPE</label>
								<select id="metal_type" name="metal_type" class="col-md-8" onchange="metalTypeProduct(this.value);">
									<?php echo $optionMetaltype = getMetalVariants('metal_type',preg_replace('/\s+/', '', $rowsring['item_title']),$rowsring['category'],$rowsring['subcategory'],$rowsring['metal_type']); ?>
								</select>
							</div>
							<div class="clear"></div><br>
							<script>
							function metalColorProduct(v){
								sort_item();
							}
							</script>
							<div class="col-md-12">
								<label class="col-md-4">METAL COLOR</label>
								<select id="metal_color" name="metal_color" class="col-md-8" onchange="metalColorProduct(this.value);">
									<?php echo $optionMetalcolor = getMetalCVariants('metal_color',preg_replace('/\s+/', '', $rowsring['item_title']),$rowsring['category'],$rowsring['subcategory'],$rowsring['metal_color']); ?>
								</select>
							</div>
							<div class="clear"></div><br>
							<script>
							function finishLevelProduct(v){
								$('.d_diamond_weight').text("&nbsp;&nbsp;&nbsp;&nbsp;"+v);
								sort_item();
							}
							</script>
							<div class="col-md-12">
								<label class="col-md-4">FINISH LEVEL</label>
								<select id="finish_level" name="finish_level" class="col-md-8" onchange="finishLevelProduct(this.value);">
									<?php echo $optionFinishlevel = getFinishVariants('finish_level',preg_replace('/\s+/', '', $rowsring['item_title']),$rowsring['category'],$rowsring['subcategory'],$rowsring['finish']); ?>
								</select>
							</div>
							<div class="clear"></div><br>
							<script>
							function diamondQualityProduct(v){
								sort_item();
							}
							</script>
							<div class="col-md-12">
								<label class="col-md-4">DIAMOND QUALITY</label>
								<select id="diamond_quality" name="diamond_quality" class="col-md-8" onchange="diamondQualityProduct(this.value);">
									<?php echo $optionDiamondquality = getDQualityVariants('diamond_quality',preg_replace('/\s+/', '', $rowsring['item_title']),$rowsring['category'],$rowsring['subcategory'],$rowsring['quality']); ?>
								</select>
							</div>
						</div>
						<div class="clear"></div><br>
						<div class="details_tab_right col-sm-12 pull-right"><br>
							<div><b>Total weight of diamonds <?php echo $rowsring['carat_weight']; ?></b></div><br>
							<div class="clear"></div><br>
							<div><h4 style="font-size:14px;"><b>PRODUCT DESCRIPTION</b></h4></div>
							<p style="padding:5px;margin:0px;margin-left:20px;"><?php echo $rowsring['description']; ?></p>
							<br>
							<?php $nms = explode("/",$rowsring['RhodiumPolish']); ?>
							<div><h4 style="font-size:14px;">APPROXIMATE POLISHED DWT <span style="color:red" class="metal_weight_overnig"><?php echo !empty($nms[0])?$nms[0]:'14KT'; ?></span></h4></div>
							<p style="padding:5px;margin:0px;margin-left:20px;"><?php echo !empty($nms[1])?$nms[1]:''; ?></p>
							<br>
							<div><h4 style="font-size:14px;">STONE BREAKDOWN</h4></div>
							<p class="diamond_provide_textheanding">
							<span style="width:129px !important; display:inline-block;">COMPONENTS</span>
							<span style="width:71px !important; display:inline-block;">QTY</span>
							<span style="width:115px !important; display:inline-block;">QUALITY</span>
							</p>
							<?php 
							$parts = explode(") (",$rowsring['head_dimensions']);
							if(isset($parts) && !empty($parts)){
							?>
							<p style="margin:5px;" class="diamond_provide_textheanding">
							<?php echo str_replace("("," ",$parts[0]); ?>
							</p>
							<p style="margin: 5px;" class="diamond_provide_textheanding">
							<?php echo isset($parts[1])?str_replace("("," ",$parts[1]):''; ?>
							</p>
							<p style="margin:5px;" class="diamond_provide_textheanding">
							<?php echo isset($parts[2])?str_replace("("," ",$parts[2]):''; ?>
							</p>
							<?php } ?>
							<br>
							<div><h4 style="font-size:14px;">TOTAL WEIGHT OF DIAMONDS</h4></div>
							<p style="padding:5px;margin:0px;margin-left:20px;">
							<span style="text-transform: lowercase;" ><?= isset($rowsring['carat_weight'])?$rowsring['carat_weight']:''; ?></span>&nbsp;&nbsp;<span class='d_diamond_weight'>&nbsp;&nbsp;&nbsp;&nbsp;<?= isset($rowsring['stone_shape'])?$rowsring['stone_shape']:''; ?></span>
							</p>
							<br>
							<script>
							var vv = $('#finish_level').val();
							$('.d_diamond_weight').html(""+vv);
							</script>
						</div>
						<div class="clear"></div><br>
						<?php $comment_text = str_replace('|',' ',$rowsring['comment']); ?>
						<div id="contact-information" style="display:none;">
							<div class="">
								<div class="text need_help_cols" style="display:none;">
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
						</div>
					</div>
				</form>
			</div>
        </div>
	</div>
</div>
<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
<script type="text/javascript">
function view_simple_popup(block_vid) {
	$('#pop_' + block_vid).simplePopupBlock();
}
</script>
<script>
function show_video_image(getV){
	$("#video_show_div_1").hide();
	$("#video_show_div_2").hide();
	$("#video_show_div_3").hide();
	$("#video_show_div_4").hide();
	$("#video_show_div_5").hide();
	$("#video_show_div_6").hide();
	$("#video_show_div").hide();
	$("#"+getV).show();
}
function addcartsubmit(pageURL){
	document.getElementById('collection_form').action = pageURL;
	document.getElementById('collection_form').submit();
}
</script>