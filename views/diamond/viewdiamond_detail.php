<link type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" rel="stylesheet" />
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<script>
var $ = jQuery.noConflict();
function printCurrPage() {
	window.print();
}

$(function() {
	$(".js__p_start, .js__p_another_start").simplePopup();
});

function addcartsubmit(pageURL){
	document.getElementById('form1').action = pageURL;
	document.getElementById('form1').submit();
}
</script>
<?php
$diamond_carat_value = _nf($row_detail['carat'], 2);
$carat_margin = getCaratMargin2($diamond_carat_value);
?>
<style>
.diamond_carat_bg{background: url('../../../../img/david_home/diamond_search/carat_diamond_bg_view.jpg') center no-repeat; width: 1039px; height: 137px;}
.diamond_carat_bg div{background: url('../../../../img/david_home/diamond_search/carat_bg_value.png') left no-repeat; width: 189px; height: 159px; display: inline-block; margin:5.4em 0px 0px <?php echo $carat_margin; ?>;}
.diamond_carat_bg div span{display: inline-block; font-size: 20px; padding: 4.2em 0px 0px 24px; color:#fff;}
.detail_bgview {background: #fff; padding: 20px 0px;line-height: 18px; }
.butonsbg { background: #E6A431;}
</style>
<link type="text/css" href="<?php echo SITE_URL; ?>css/steps_bar_section.css" rel="stylesheet" />
<div class="diamondViewDetail container">
<?php
$options_list = array('addpendantsetings3stone','tothreestone', 'tothree_supplied_stone');
$certs = !empty($row_detail['Cert'])?$row_detail['Cert']:'GIA';
$diamond_desc = 'This diamond comes accompanied by a diamond grading report from the '.$certs.'.
Have a question regarding this item? Our specialists are available to assist you.';
$addring_link = config_item('base_url').'engagement/engagement_ring_settings/'.$lot.'/addtoring';
$option_setting = setOptionValue($addoption);
$diamondOption = ( ( $addoption == 'false' || $addoption === 'addjewelry' ) ? 'rapnet' : $addoption );
$addring_pairlink = config_item('base_url').'diamonds/search/true/false/'.$option_setting.'/false/'.$lot;
$diamondTitle = _nf($row_detail['carat'], 2) . '-Carat ' .$row_detail['shape']. ' Diamond';
?>
<div>
	<ul class="bread_crumb_list">
		<li><a href="<?php echo SITE_URL; ?>">Home</a></li> >
		<li><a href="<?php echo SITE_URL; ?>diamonds/search/true">Diamond</a></li>
	</ul>
</div>
<div class="view_product_block">
	<div class="prod_views_heading">People who viewed this item also viewed</div>
	<?php
	if(!empty($section3)):
		foreach($section3 as $sectionc):
			if(!empty($sectionc['image'])){
				$images = explode(";",$sectionc['image']);
				if(@getimagesize($images[0]) && $images[0] != ""){
					$view_shapeimage = $images[0];
				}elseif(@getimagesize($images[1]) && $images[1] != ""){
					$view_shapeimage = $images[1];
				}
			}else{
				$view_shapeimage = SITE_URL .'images/no_image.jpeg';
			}
			$offer_price = $sectionc['price'];
			?>
			<div class="col-sm-4 set_prod_col">
				<div class="viewed_col_left"><a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectionc['id']; ?>"><img src="<?php echo $view_shapeimage;?>" alt="<?php echo $sectionc['description'];?>" /></a></div>
				<div class="viewed_col_right">
					<div><a href="<?php echo SITE_URL; ?>selection/engagement-rings-detail/<?php echo $sectionc['id']; ?>" style="color: #000;"><?php echo $sectionc['description'];?></a></div>
					<div class="price_color">$<?php echo _nf($offer_price,2); ?></div>
				</div>
			</div>
		<?php
		endforeach;
	endif;
	?>
	<div class="clear"></div>
</div>
<?php if($addoption == 'addtoring'){ ?>
	<br>
	<div id="Filters">
		<div id="Funnel">
			<ul class="funnel-container" data-share-link="">
				<li class="funnel-step">
					<div class="funnel-step-container">
						<span class="funnel-step-content">
							1<span class="title_1" style="z-index:10"><a id="SettingFunnel" style="text-decoration:none;cursor:pointer" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br>SETTING</a></span>
							<span class="edit_1"></span>
							<span class="img_1">
								<a href="<?php echo $view_link; ?>" id="SettingFunnel_ImageView" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">
								<img class="steps_img" src="<?php echo $setting_image; ?>" alt="setting_image"></a>
							</span>
							<span class="price_1"><span class="">$<?php echo $setting_price; ?></span></span>
							<span class="change_1">
								<span style=""><a id="SettingFunnel_View" class="viewchange" href="<?php echo $view_link; ?>" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">View</a> | <a id="SettingFunnel_Remove" href="<?php echo SITE_URL; ?>engagement/remove_unique_setting" class="viewchange"container="#WidePane">Remove</a></span>
							</span>
						</span>
					</div>
				</li>
				<li data-shipping-date="" class="funnel-step step-active set_active_img step_active_bk">
					<div class="funnel-step-container"><span class="funnel-step-content">2<span class="title_2"><a id="DiamondFunnel" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br>
					DIAMOND</a></span><span class="nodiamond2"></span></span></div>
				</li>
				<li class="funnel-step">
					<div class="funnel-step-container"><span class="funnel-step-content">3</span><span onClick="JSite.Hijax.Manager.Load('/complete-ring/');" class="complete-ring completeFunnel"></span><span class="title_3"><a id="CompleteFunnel" container="#WidePane" style="cursor:default"><span style="padding-left:0px !important">REVIEW</span><br>
					COMPLETE RING </a></span><span class="img_3"></span><span class="price_3"></span></div>
				</li>
			</ul>
		</div>
	</div>
	<br>
<?php
}

if(($row_detail['is_lab_diamond'] == 1) && (@getimagesize($row_detail['image_url']))){
	$view_shapeimage	= $row_detail['image_url'];
	$diamond_shape      = $row_detail['shape'];
}elseif(@getimagesize($row_detail['image_url']) && $row_detail['image_url'] != ''){
	$view_shapeimage	= $row_detail['image_url'];
	$diamond_shape      = $row_detail['shape'];
}else{
	if($row_detail['shape'] == 'B' || $row_detail['shape'] == 'Round'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
		$diamond_shape      = 'Round';
	}else if($row_detail['shape'] == 'PR' || $row_detail['shape'] == 'Princess'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
		$diamond_shape      = 'Princess';
	}else if($row_detail['shape'] == 'C' || $row_detail['shape'] == 'Cushion'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
		$diamond_shape      = 'Cushion';
	}else if($row_detail['shape'] == 'R' || $row_detail['shape'] == 'Radiant'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
		$diamond_shape      = 'Radiant';
	}else if($row_detail['shape'] == 'E' || $row_detail['shape'] == 'Emerald'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
		$diamond_shape      = 'Emerald';
	}else if($row_detail['shape'] == 'P' || $row_detail['shape'] == 'Pear'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/pear.jpg';
		$diamond_shape      = 'Pear';
	}else if($row_detail['shape'] == 'P' || $row_detail['shape'] == 'Oval'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/oval.jpg';
		$diamond_shape      = 'Oval';
	}else if($row_detail['shape'] == 'AS' || $row_detail['shape'] == 'Asscher'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
		$diamond_shape      = 'Asscher';
	}else if($row_detail['shape'] == 'M' || $row_detail['shape'] == 'Marquise'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
		$diamond_shape      = 'Marquise';
	}else if($row_detail['shape'] == 'H' || $row_detail['shape'] == 'Heart'){
		$view_shapeimage    = ''.SITE_URL.'images/shapes_images/heart.jpg';
		$diamond_shape      = 'Heart';
	}else{
		$view_shapeimage    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
		$diamond_shape      = '';
	}
}
?>
<div class="detail_bgview">
	<form name="form1" id="form1" method="post" action="<?php echo htmlspecialchars(SITE_URL.'jewelleries/addtoshoppingcart'); ?>">
		<div class="mainwrap">
			<div class="leftdetail col-sm-4">
				<div class="diamond_shimg">
					<div class="tz-gallery-collection">
						<?php 
						$make_html = '';
						if($row_detail['video_url'] != ""){
							$make_html .= '<a class="lightbox" id="light_a" href="'.$view_shapeimage.'"><img alt="diamonds-img" id="light_img" class="" src="'.$view_shapeimage.'" style="margin: 0px 0px;width:100%;" /><video width="100%" height="324" controls autoplay><source src="'. $row_detail['video_url'] .'" type="video/mp4">Your browser does not support the video tag.</video></a><br>';
							$make_html .= '<script type="text/javascript">
								$("a#light_a video").hide();
							</script>';
						}else{
							$make_html .= '<a class="lightbox" id="light_a" href="'.$view_shapeimage.'"><img alt="diamonds-img" id="light_img" class="" src="'.$view_shapeimage.'" style="margin: 0px 0px;width:100%;" /></a><br><br>';
						}
						if($row_detail['video_url'] != ""){
							if($row_detail['is_lab_diamond'] == 1){
								if(@getimagesize($row_detail['image_url']) && $row_detail['image_url'] != ''){
									$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs(\''. $row_detail['image_url'] .'\')"> <img src="'. $row_detail['image_url'] .'" style="width:75px;height:75px;display:inherit;margin:5px;" alt="'.$diamond_shape.'" /></a>';
								}
								if(@getimagesize($row_detail['image_path2']) && $row_detail['image_path2'] != ''){
									$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs(\''. $row_detail['image_path2'] .'\')"> <img src="'. $row_detail['image_path2'] .'" style="width:75px;height:75px;display:inherit;margin:5px;" alt="'.$diamond_shape.'" /></a>';
								}
								if(@getimagesize($row_detail['image_path3']) && $row_detail['image_path3'] != ''){
									$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs(\''. $row_detail['image_path3'] .'\')"> <img src="'. $row_detail['image_path3'] .'" style="width:75px;height:75px;display:inherit;margin:5px;" alt="'.$diamond_shape.'" /></a>';
								}
							}else{ 
								if(@getimagesize($row_detail['image_url']) && $row_detail['image_url'] != ''){
									$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs(\''. $row_detail['image_url'] .'\')"> <img src="'. $row_detail['image_url'] .'" style="width:75px;height:75px;display:inherit;margin:5px;" alt="'.$diamond_shape.'" /></a>';
								}
								if(@getimagesize($row_detail['image_path2']) && $row_detail['image_path2'] != ''){
									$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs(\''.  $row_detail['image_path2'] .'\')"> <img src="'. $row_detail['image_path2'] .'" style="width:75px;height:75px;display:inherit;margin:5px;" alt="'.$diamond_shape.'" /></a>';
								}
								if(@getimagesize($row_detail['image_path3']) && $row_detail['image_path3'] != ''){
									$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs(\''.  $row_detail['image_path3'] .'\')"> <img src="'. $row_detail['image_path3'] .'" style="width:75px;height:75px;display:inherit;margin:5px;" alt="'.$diamond_shape.'" /></a>';
								}
							}
							$make_html .= '<a href="javascript:void(0);" onclick="showhidevideo()"><img src="'. SITE_URL .'images/videoimage.jpg" style="width:75px;height:75px;display:inherit;margin:5px;" alt="Show play" /></a>';
						}
						$make_html .= '<script type="text/javascript">
						function ch_imgs(img_src){
							$("a#light_a video").hide();
							$("a#light_a img").show();
							$("#light_img").attr("src", img_src);
							$("#light_a").attr("href",img_src);
						}
						function showhidevideo(){
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
						?>
					</div>
				</div><br>
				<div class="diamond_logo"><img src="<?php echo IMGSRC_LINK; ?>diamond_logo_dt.jpg" alt="<?php echo $diamond_shape; ?> Diamond"></div>
				<div class="labdescription">
					<div class="dtheading">Diamond Grading Report</div>
					This diamond is certified by <?php echo $row_detail['Cert']; ?>. This provides you an authoritative analysis of your diamond. It also verifies that your diamond meets all the specific quality requirements.<br>
					<div class="dtview_link"><a href="#">View</a></div>
				</div>
				<div class="clear"></div>
			</div>
            <!-- diamond description -->
            <div class="rightdetail col-sm-8 pull-right">
                <div class="right_dtheading"><?php echo $diamondTitle; ?></div>
                <div><?php echo $diamond_desc; ?></div><br>
                <div>
                    <div class="contact_no_dt"><b><?php echo "678-949-5349"; ?></b></div>
                    <div><a href="mailto:<?php echo "orders@jewelercart.com"; ?>"><?php echo "orders@jewelercart.com"; ?></a></div>
                </div>
                <br>
                <div class="diamond_left_dt">
                    <div class="detail_rows"><label>SKU# <?php echo $row_detail['Stock_n']; ?></label></div>
                    <div class="detail_rows">
                        <span>Measurements: </span>
                        <span><?php echo $row_detail['Meas']; ?></span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Price</span>
                        <span>$<?php echo _nf($row_detail['price'],0); ?></span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Wire Price</span>
						<?php $wirepric = $row_detail['price']*0.03; ?>
                        <span>$<?php echo _nf($row_detail['price']-$wirepric); ?></span>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="right_detail_cols">
                    <div class="right_left_dtcols">
                        <div class="detail_rows"></div>
                    <div class="detail_rows">
                        <span>Report </span>
                        <span><?php echo $row_detail['Cert']; ?></span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Color </span>
                        <span><?php echo $row_detail['color']; ?></span>
                        <div class="clear"></div>
                    </div>
                    
                    </div>
                    <div class="right_left_dtcols">
                        <div class="detail_rows"></div>
                    <div class="detail_rows">
                        <span>Cut </span>
                        <span><?php echo $row_detail['cut']; ?></span>
                        <div class="clear"></div>
                    </div>
                     <div class="detail_rows">
                        <span>Clarity </span>
                        <span><?php echo $row_detail['clarity']; ?></span>
                        <div class="clear"></div>
                    </div>
                    </div>                    
                </div>                
                <div class="clear"></div><br>
				<div class="buttons_block">
					<?php
					$buymore_info = '';
					if( $addoption == 'addtoring' ) {
						$buymore_info = '<a href="'.SITE_URL.'engagement/engagement_ring_settings/'.$row_detail['lot'].'/addtoring" class="butonsbg">Select This Diamond</a>';
					} elseif(in_array($addoption, $options_list)) {
						if( !empty($suplied_stone_link) ) {
							$buymore_info = '<a href="'.$suplied_stone_link.'"><img src="'.SITE_URL.'images/select_pairimg.jpg" alt="select_pairimg"></a>';
						} else {
							$buymore_info = '<a href="'.$addring_pairlink.'"><img src="'.SITE_URL.'images/select_pairimg.jpg" alt="select_pairimg"></a>';
						}
					} else {
						$buymore_info = '<a href="#" onclick="submitPostForm(\'form1\')" class="butonsbg">Buy Now</a>'; 
					}
					echo $buymore_info;
					?>
					<input type="hidden" name="price" value="<?php echo intval(number_format($row_detail['price'],0,'.',''))?>,normal">
					<input type="hidden" name="item_rsize" id="item_rsize" value="<?php echo $row_detail['Meas']; ?>">
					<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $row_detail['Make']; ?>">
					<input type="hidden" name="3ez_price" value="<?= isset($ez3)?intval(number_format($ez3,0,'.','')):''; ?>">
					<input type="hidden" name="5ez_price" value="<?= isset($ez5)?intval(number_format($ez5,0,'.','')):''; ?>">
					<input type="hidden" name="main_price" value="<?php echo intval(number_format($row_detail['price'],0,'.','')); ?>">
					<input type="hidden" name="vender" value="unique">
					<input type="hidden" name="url" value="<?php echo $view_shapeimage ?>">
					<input type="hidden" name="prodname" value="<?php echo $row_detail['owner'] ?>">
					<input type="hidden" name="prid" value="<?php echo $row_detail['Stock_n'];?>">
					<input type="hidden" name="item_type" value="diamond" />
					<input type="hidden" name="txt_addoption" value="addjewelry" />
					<input type="hidden" name="vendors_name" value="<?php echo $row_detail['supplier'] ?>, <?php if($row_detail['State'] != ''){ echo $row_detail['State'].', '; } ?> <?php echo $row_detail['Country'] ?>" />
					<input type="hidden" name="vendor_number" value="<?php echo $row_detail['Phone'] ?>" />
					<input type="hidden" name="table_name" value="dev_diamonds" />
					<input type="hidden" name="item_title" value="<?php echo $diamondTitle; ?>" />
					<input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
					<input type="hidden" name="product_type" value="Diamonds" />
					<a href="#" class="butonsbg js__p_another_start">Request More Info</a>
					<div class="other_link_list">
						<ul>
							<li><a href="#" class="js__p_another_start">Drop a Hint</a></li>
							<li><a href="<?php echo SITE_URL.'account/account_wishlist/'.urldecode($row_detail['lot']).'/add/'.$diamondOption.'/'.$settingsid; ?>">Add to Wishlist</a></li>
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
							<li><a href="javascript:void(0);">Lab Report</a></li>
							<li>
								<?php
								$certNumber = $row_detail['Cert_n'];
								if($certNumber != ""){
									echo '<a href="https://www.gia.edu/report-check?reportno='.$certNumber.'" target="_blank">Verify Lab Report</a>';
								}else{
									echo '<a href="javascript:void(0);" target="_blank">Verify Lab Report</a>';
								}
								?>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="set_col_pading">
					<div class="col-sm-6">
						<div class="prod_cols_row">
							<?php $deliveryDate = date("l, F d",strtotime("+10 days")); ?>
							<div class="order_loosedm"><b>ORDER Now FOR DELIVERY BY <?php echo $deliveryDate; ?></b></div>
							<div class="clear"></div>
						</div>
						<div class="prod_cols_row">
							<div class="prod_left_col">Shipping:</div>
							<div class="prod_right_col">
								<b>Ground and Overnight delivery is available on all orders once your item is ready for shipping.</b>
							</div>
							<div class="clear"></div>
						</div>
						<div class="prod_cols_row">
							<div class="prod_left_col">Payments:</div>
							<div class="prod_right_col">
								<div><img src="<?php echo SITE_URL; ?>assets/site_images/payment_options_icon_view.jpg" alt="" /></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="prod_cols_row">
							<p><b><i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 22px;"></i> Orders under $5,000 are processed online with major credit cards.</b></p>
							<p><b><i class="fa fa-angle-double-left" aria-hidden="true" style="font-size: 22px;"></i> Orders over $5,000 are processed with telephone and bank wire option.</b></p>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</form>
        <br>
	</div>
    <div class="clear"></div><br>
    <div class="moredetail_bgblock">
        <br>
        <div class="mainwrap">
            <div class="moredetail_heading">More Details</div>
            <div class="details_cols col-sm-4">
                <div class="details_row">
                    <span>Type</span>
                    <span><?php echo $diamond_type; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Shape</span>
                    <span><?php echo $diamond_shape; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Report</span>
                    <span><?php echo $row_detail['Cert']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Carat</span>
                    <span><?php echo _nf($row_detail['carat'],2); ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Color</span>
                    <span><?php echo $row_detail['color']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Clarity</span>
                    <span><?php echo $row_detail['clarity']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Measurements</span>
                    <span><?php echo $row_detail['Meas']; ?></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="details_cols col-sm-4">
                <div class="details_row">
                    <span>Lab Cut Grade</span>
                    <span><?php echo $row_detail['cut']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Polish</span>
                    <span><?php echo $row_detail['Polish']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Symmetry</span>
                    <span><?php echo $row_detail['Sym']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Table %</span>
                    <span><?php echo $row_detail['TablePercent']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Depth %</span>
                    <span><?php echo $row_detail['Depth']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Crown %</span>
                    <span><?php echo $row_detail['crown']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Crown Angle</span>
                    <span><?php echo $row_detail['crown_angle']; ?></span>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="details_cols col-sm-4">
                <div class="details_row">
                    <span>Ratio</span>
                    <span><?php echo $row_detail['ratio']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Pav Angle</span>
                    <span><?php echo $row_detail['pavilion_angle']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Pavillion %</span>
                    <span><?php echo $row_detail['pavilion']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Lab</span>
                    <span><?php echo $row_detail['lab']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Culet</span>
                    <span><?php echo $row_detail['Culet']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Fluorescence</span>
                    <span><?php echo $row_detail['Flour']; ?></span>
                    <div class="clear"></div>
                </div>
                <div class="details_row">
                    <span>Girdle</span>
                    <span><?php echo $row_detail['Girdle']; ?></span>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <br><br>
    </div>
	<div class="clear"></div>
	<div class="similar_diamonds">
		<div class="mainwrap">
			<div class="similarHeading">
				<?php 
				$totalDiamond = count($row_sdiamond);
				if( $totalDiamond > 0 ) {
					echo $totalDiamond.' similar '.$row_detail['lab'].' Graded Diamonds'; 
				}
				?>
			</div>
			<table class="similar_diamond_table">
				<thead>
					<tr>
						<th>Shape</th>
						<th>Sku</th>
						<th>Carat</th>
						<th>Color</th>
						<th>Fancy Color</th>
						<th>Clarity</th>
						<th>Lab Cut Grade</th>
						<th>Depth</th>
						<th>Table</th>
						<th>Polish</th>
						<th>Measurement</th>
						<th>Cert</th>
						<th>Price</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$viewSimilarDiamond = '';
					if( $totalDiamond > 0 ) {
						foreach( $row_sdiamond as $rowdiamond ) {
							if(@getimagesize($row_detail['image_url']) && $rowdiamond['image_url'] != ''){
								$view_shapeimaged	= $rowdiamond['image_url'];
								$diamond_shaped      = $rowdiamond['shape'];
							}else{
								if($rowdiamond['shape'] == 'Round'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
									$diamond_shaped      = 'Round';
								}else if($rowdiamond['shape'] == 'Princess'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
									$diamond_shaped      = 'Princess';
								}else if($rowdiamond['shape'] == 'Cushion'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
									$diamond_shaped      = 'Cushion';
								}else if($rowdiamond['shape'] == 'Radiant'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
									$diamond_shaped      = 'Radiant';
								}else if($rowdiamond['shape'] == 'Emerald'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
									$diamond_shaped      = 'Emerald';
								}else if($rowdiamond['shape'] == 'Pear'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/pear.jpg';
									$diamond_shaped      = 'Pear';
								}else if($rowdiamond['shape'] == 'Oval'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/oval.jpg';
									$diamond_shaped      = 'Oval';
								}else if($rowdiamond['shape'] == 'Asscher'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
									$diamond_shaped      = 'Asscher';
								}else if($rowdiamond['shape'] == 'Marquise'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
									$diamond_shaped      = 'Marquise';
								}else if($rowdiamond['shape'] == 'Heart'){
									$view_shapeimaged    = ''.SITE_URL.'images/shapes_images/heart.jpg';
									$diamond_shaped      = 'Heart';
								}else{
									$view_shapeimaged    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
									$diamond_shaped      = '';
								}
							}
							$detail_link = SITE_URL . 'diamonds/diamond_detail/'.$rowdiamond['lot'].'/'.$addoption.'/'.$settingsid;
							$viewSimilarDiamond .= '<tr>
								<td><a href="'.$detail_link.'"><img src="'.$view_shapeimaged.'" alt="'.$diamond_shaped.'" />'.$diamond_shaped.'</a></td>
								<td>'.$rowdiamond['lot'].'</td>
								<td>'._nf($rowdiamond['carat'],2).'</td>
								<td>'.$rowdiamond['color'].'</td>
								<td>'.$rowdiamond['fcolor_value'].'</td>
								<td>'.$rowdiamond['clarity'].'</td>
								<td>'.$rowdiamond['cut'].'</td>
								<td>'.$rowdiamond['Depth'].'</td>
								<td>'.$rowdiamond['TablePercent'].'</td>
								<td>'.$rowdiamond['Polish'].'</td>
								<td>'.$rowdiamond['Meas'].'</td>
								<td>'.$rowdiamond['Cert'].'</td>
								<td>$'._nf($rowdiamond['price'], 2).'</td>
								<td><a href="'.$detail_link.'"><img src="'.IMGSRC_LINK.'view_detail.jpg" alt="View Detail" /></a></td>
							</tr>';
						}
					} else {
						$viewSimilarDiamond .= '<tr>
							<td colspan="13">NO Similar Diamond Found</td>
						</tr>';
					}
					echo $viewSimilarDiamond;
					?>
				</tbody>
			</table>
			<div class="clear"></div><br>
            <div class="pagination_block">
                <div class="clear"></div><br>
            </div>
		</div>
		<div class="clear"></div><br>
	</div>
    <div class="moredetail_bgblock daviddt_block">
        <div class="mainwrap">
            <div class="aboutdavid_img"></div><br><br>
            <div class="davidstern_cols col-sm-6">
                <div class="davidHeading">CARAT</div>
                <div>The international unit of weight used for measuring diamonds 
and gemstones, 1 carat is equal to 200 milligrams, or 0.2 grams. 
A specific measurement of a diamond's weight, carat weight alone 
may not accurately represent a diamond's visual size</div>
            </div>
            <div class="davidstern_cols col-sm-6 pull-right"><br>
                <div>We recommend considering carat weight along with two other influential 
characteristics: the overall dimensions and the cut grade of the diamond.</div>
                <div><a href="#">Learn More ></a></div>
            </div>
                <div class="clear"></div><br>
               <div class="aboutdavid_img diamond_carat_bk">
                   <div class="diamond_carat_bg">
                        <div><span><?php echo $diamond_carat_value; ?><br>Ct.</span></div>
                    </div>
<!--                   <span><?php echo _nf($row_detail['carat'], 2); ?><br>Ct.</span>-->
                <!-- <img src="<?php echo IMGSRC_LINK; ?>your_diamond_dt.jpg" alt="Your Diamond Detail">-->
               <div class="clear"></div>
               </div>
                <div class="clear"></div><br>
                <br><br><br><br>
        </div>
    </div>
    <div class="clear"></div>
    <div class="similar_diamonds daviddt_block">
        <div class="mainwrap">
            <div class="davidstern_cols col-sm-5">
                <div class="davidHeading">CUT</div>
                <div>Excellent: Our most brilliant cut, representing roughly the top 1% of <?php echo $certs;?> diamond quality based on cut. The highest grades of polish and symmetry allow it to reflect even more light than the standard ideal cut.
<br><br>
Ideal cut: Represents roughly the top 3% of AGS diamond quality based on cut. Reflects nearly all light that enters the diamond. An exquisite and rare cut.
<br><br>
Very good cut: Represents roughly the top 15% of diamond quality based on cut. Reflects nearly as much light as the ideal cut, but for a lower price.
<br><br>
Good cut: Represents roughly the top 25% of diamond quality based on cut. Reflects most light that enters. Much less expensive than a very good cut.
<br><br>
Fair cut: Represents roughly the top 35% of diamond quality based on cut. Still a quality diamond, but a fair cut will not be as brilliant as a good cut.
<br><br>
Poor cut: Diamonds that are generally so deep and narrow or shallow and wide that they lose most of the light out the sides and bottom. <?php echo SITES_NAME; ?> Fine Jewelry does not carry diamonds with cut grades of poor.</div><br>
            </div>
            <div class="col-sm-6 pull-right">
                <div class="aboutdavid_img"><img src="<?php echo IMGSRC_LINK; ?>shallow_cut.jpg" alt="CUT DIAMOND"></div>
            </div>
                <div class="clear"></div><br>
        </div>
    </div>
    <div class="moredetail_bgblock daviddt_block">
        <div class="mainwrap"><br><br>
            <div class="col-sm-5">
                <div class="davidHeading">COLOR</div>
                <div>Color refers to a diamond's lack of color, grading the whiteness of a diamond.
A color grade of D is the highest possible, while Z is the lowest.
<?php echo SITES_NAME; ?> Fine Jewelry only sells diamonds with a color grade of J or higher.</div>
            </div>
            <div class="col-sm-6 pull-right"><br>
                <div>Color manifests itself in a diamond as a pale yellow. This is why a diamond's color grade is based on its lack of color. The less color a diamond has, the higher its color grade. After cut, color is generally considered the second most important characteristic when selecting a diamond. This is because the human eye tends to detect a diamond's sparkle (light performance) first, and color second.
<br>
At <?php echo SITES_NAME; ?> Fine Jewelry, you'll find only the finest diamonds with color graded D-J. Diamonds graded J or better are colorless or near-colorless, with color that is typically undetectable to the unaided eye.</div>
            </div>
                <div class="clear"></div><br><br>
                <div class="aboutdavid_img text-center"><img src="<?php echo IMGSRC_LINK; ?>color_grading_dt.jpg" alt="Your Diamond Detail"></div><br><br>
        </div>
    </div>
    <div class="similar_diamonds daviddt_block">
        <div class="mainwrap"><br><br>
            <div class="davidstern_cols col-sm-6">
                <div class="davidHeading">CLARITY</div>
                <div>Clarity is a measure of the number and size of the tiny imperfections that occur in almost all diamonds.
Many of these imperfections are microscopic, and do not affect a diamond's beauty in any discernible way.

Much is made of a diamond's clarity, but of the Four Cs, it is the easiest to understand, and, according to many experts, generally has the least impact on a diamond's appearance. Clarity simply refers to the tiny, natural imperfections that occur in all but the finest diamonds. 
</div>
            </div>
            <div class="davidstern_cols1 col-sm-6 pull-right"><br>
                <div>Gemologists refer to these imperfections by a variety of technical names, including blemishes and inclusions, among others. Diamonds with the least and smallest imperfections receive the highest clarity grades. Because these imperfections tend to be microscopic, they do not generally affect a diamond's beauty in any discernible way.</div>
            </div>
                <div class="clear"></div><br><br>
                <div class="aboutdavid_img text-center"><img src="<?php echo IMGSRC_LINK; ?>clarity_dt.jpg" alt="Your Diamond Detail"></div><br><br>
        </div>
    </div>
    <?php /* <div class="moredetail_bgblock daviddt_block">
        <div class="mainwrap"><br><br>
            <div class="davidstern_cols col-sm-6">
                <div class="davidHeading">Diamond Price Guarantee</div>
                <div>The <?php echo SITES_NAME; ?> Fine Jewelry Diamond Price Match Guarantee makes it easy to purchase diamonds with peace of mind. If you find a comparable GIA certified diamond at a lower price, call <?php echo CONTACT_NO; ?>. If the offer meets our qualifications, we'll match the price. There is no comparison when it comes to the value and quality of <?php echo SITES_NAME; ?> Fine Jewelry diamonds.</div>
            </div>
            <div class="davidstern_cols1 col-sm-6 pull-right">
                <div class="davidHeading"><?php echo SITES_NAME; ?> UPGRADE PROGRAM</div>
                <div>As part of our jeweler for life commitment, <?php echo SITES_NAME; ?> Fine Jewelry is pleased to offer a lifetime diamond upgrade program on all GIA and AGSL certified diamonds. Simply call a Diamond & Jewelry Consultant at <?php echo CONTACT_NO; ?> to learn more about our upgrade program and to select your new diamond*.</div>
            </div>
                <div class="clear"></div><br><br>
                <div class="aboutdavid_img text-center"><img src="<?php echo IMGSRC_LINK; ?>diamond_price_dt.jpg" alt="Your Diamond Detail"></div><br><br>
        </div>
    </div> */ ?>
    <div class="shiping_block">
    <!--<div class="mainwrap">
        <div class="shiping_imgbk">
            <img src="<?php echo IMGSRC_LINK; ?>shiping_dt.jpg" alt="Shipping Detail">
        </div>
        <div class="shiping_detailbk">
            <div class="shipheading">Shipping</div>
            <div>
                <?php echo check_empty($shipping_row['content'], 'Coming Soon'); ?>
            </div>
            <br><br>
        </div>
        <div class="clear"></div>
    </div>-->
 </div>
    <!--<div class="bottom_linksbg">
        <div class="mainwrap">
            <ul>
                <li><a href="#">Track Your Order  ></a></li>
                <li><a href="#">Conflict-Free Diamonds & Sourcing  ></a></li>
                <li><a href="#">Special Offers and News  ></a></li>
                <li><a href="#">Blog  ></a></li>
            </ul> 
        </div>
    </div>-->
</div>
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
        <div class="popupHeading">Ask an Expert&nbsp;<span class="expertVdMessage"></span></div>
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