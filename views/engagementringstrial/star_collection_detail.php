<?php
if($rowsring['supplied_side_stone'] != ''){
	$suported_shape = explode('/', str_replace(';','',$rowsring['supplied_side_stone']));
	$suported_shapes = end($suported_shape);
	if($suported_shapes == 'R' OR $suported_shapes == 'RD'){
		$suported_shaped = "Round";
	}else if($suported_shapes == 'A' OR $suported_shapes == 'AS'){
		$suported_shaped = "Asscher";
	}else if($suported_shapes == 'EC'){
		$suported_shaped = "Emerald";
	}else if($suported_shapes == 'PR'){
		$suported_shaped = "Princes";
	}else if($suported_shapes == 'H'){
		$suported_shaped = "Heart";
	}else if($suported_shapes == 'c' OR $suported_shapes == 'cu' OR $suported_shapes == 'C' OR $suported_shapes == 'CU'){
		$suported_shaped = "Cushion";
	}else if($suported_shapes == 'ma' OR $suported_shapes == 'MA'){
		$suported_shaped = "Marquise";
	}else if($suported_shapes == 'pe' OR $suported_shapes == 'PE'){
		$suported_shaped = "Pear";
	}else{
		$suported_shaped = "Round";
	}
}

if($rowsring['additional_stones'] != ''){
	$addi_shape = explode('/', str_replace(';','',$rowsring['additional_stones']));
	$addit_shapes = end($addi_shape);
	if($addit_shapes == 'R' OR $addit_shapes == 'RD'){
		$additional_shaped = "Round";
	}else if($addit_shapes == 'A' OR $addit_shapes == 'AS'){
		$additional_shaped = "Asscher";
	}else if($addit_shapes == 'EC'){
		$additional_shaped = "Emerald";
	}else if($addit_shapes == 'PR'){
		$additional_shaped = "Princes";
	}else if($addit_shapes == 'H'){
		$additional_shaped = "Heart";
	}else if($addit_shapes == 'c' OR $addit_shapes == 'cu' OR $addit_shapes == 'C' OR $addit_shapes == 'CU'){
		$additional_shaped = "Cushion";
	}else if($addit_shapes == 'ma' OR $addit_shapes == 'MA'){
		$additional_shaped = "Marquise";
	}else if($addit_shapes == 'pe' OR $addit_shapes == 'PE'){
		$additional_shaped = "Pear";
	}else{
		$additional_shaped = "Round";
	}
}else{
	$additional_shaped = "Round";
}
$ringtitle = get_site_contact_info('dashboard_title').' '.$ringtitle;
$get_diamond_price  = 0;
$get_cert_no	= '6157024136';
$ringtitle =  str_replace('KP', 'KT', $ringtitle);
$ringtitle=str_replace("Godstonediamonds","Jewelercart",$ringtitle);
?>
<script src="//script.brilliantearth.com/static/js/product/pdp_engrave.js?_v=1625471808" ></script>
<script type="text/javascript" src="//script.brilliantearth.com/static/js/jquery.zoomall.min.js?_v=1625471808"></script>
<script type="text/javascript" src="//script.brilliantearth.com/static/js/nouislider/jquery.nouislider-v6.min.js"></script>
<link href="<?= SITE_URL ?>css/assets/pdp-mini.css" rel="stylesheet">
<style>
.variation-filters select{height:auto;padding:2px}
.loadingplease{background:none repeat scroll 0 0 #fff;display:block;height:380px;opacity:.7;position:absolute;text-align:center;width:400px;z-index:99999}
.ir309-detail.ir218-detail #image_icon{position:static!important;top:0}
.jCarouselLiteDemo-body::-webkit-scrollbar{display:none}
.jCarouselLiteDemo-body{overflow:-moz-scrollbars-none}
.ir309-detail #jCarouselLiteDemo .carousel li a.zoomThumbActive{border-color:#ececec}
.zoom-box .ir312-pdp-badge{display:none}
.collapsed span{left:auto}
.media{display:-ms-flexbox;display:inherit;-ms-flex-align:start;align-items:inherit}
.list_carousel--ir234-shape{overflow:hidden}
.IR218-product-details-lists .product-details-lists-v2 .center-diamond-shape .media{width:70px}
.media:nth-child(2){margin:0}
</style>
<script>
$('body').after('<div class="loadingplease" id="loadingplease" style="display: block;position: fixed;width: 100vw;height: 100vh;top: 0;left: 0;background-color: rgba(255, 255, 255, 0.9);display: flex;justify-content: center;align-items: center;display: none;"> <img src="https://thumbs.gfycat.com/AnimatedImpureAmericancicada-max-1mb.gif" style="padding-top: 90px;max-width: 100%;">	</div>');
</script>
<div class="container container1260 container-cyo">
	<ol class="breadcrumb ir218-breadcrumb" role="navigation" data-acsb-bc="true" aria-label="Breadcrumbs">
		<li><a href="<?= SITE_URL ?>diamonds/engagement-rings" class="google-event-tracker"><span>The Star Collection</span></a></li>
		<li class="active"><?= $ringtitle; ?></li>
	</ol>
</div>
<div class="container container1260 ir224-cyo-bar" id="cyo-bar">
	<div class="row">
		<div class="col-md-12 xs-nospace">
			<div class="wizard2-steps">
				<div class="step wizard2-steps-heading" data-acsb-hover="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true">
					<div class="node">
						<div class="node-skin">
							<div class="cont">Create Your Ring</div>
						</div>
					</div>
				</div>
				<div class="cyo-bar-step step step-item active-step acsb-hover" data-acsb-hover="true" data-acsb-navigable="true" data-acsb-now-navigable="false">
					<div class="node" style="cursor: pointer;">
						<div class="node-skin">
							<div class="num" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button">1</div>
							<div class="cont">
								<div class="heading" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button">Setting</div>
								<div class="data" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button"><span class="cyobar_title"><?= $maincate_name; ?></span><span style="padding-left: 4px;">-</span> <span id="top_price">$<?=_nf($retail_price,0)?></span></div>
								<div class="action">
									<a href="<?= SITE_URL ?>diamonds/star-collection" class="td-u bar-action" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true">Change</a>
								</div>
							</div>
							<div class="pho" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="scroll">
								<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Scroll Page " aria-hidden="false" data-acsb-hidden="false"></span><span class="modal-product-superposition">
									<img alt="top setting" src="//image.brilliantearth.com/media/base_product_center_diamond_images/OR/BE1D54_Claw Prong_Round_white_carat_75.jpg" class="img-responsive cyobar_diamond_img mbm-multiply">
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="cyo-bar-step step step-item " data-view-link="/rings/cyorings/add_setting/3821855/?did=" data-acsb-hover="true" data-acsb-navigable="true" data-acsb-now-navigable="false">
					<div class="node" style="cursor: pointer;">
						<div class="node-skin">
							<div class="num" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button">2</div>
							<div class="cont">
								<div class="heading" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button"><h2 class="nostyle-heading">Choose Diamond</h2></div>
								<div class="action help-tips">
									<div class="action help-tips">Select Diamond</div>
								</div>
							</div>
							<div class="pho" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button">
								<img src="//css.brilliantearth.com/static/img/svg/diamond.svg" alt="diamond" role="presentation">
							</div>
						</div>
					</div>
				</div>
				<div class="step step-item invariant-color">
					<div class="node">
						<div class="node-skin">
							<div class="num">3</div>
							<div class="cont">
								<div class="heading"><h2 class="nostyle-heading">Complete Ring</h2></div>
								<div class="action help-tips">Select Ring Size</div>
							</div>
							<div class="pho">
								<img src="//css.brilliantearth.com/static/img/svg/ring.svg" alt="ring" role="presentation">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container container1260 container-cyo">
	<div class="row be-detail-v2 pb-xs-30 ir309-detail ir218-detail">
		<div class="col-md-7 clearfix preview pb-20 pb-xs-0">
			<div id="jCarouselLiteDemo" class="clearfix" role="region" data-acsb-carousel="true" data-acsb-force-visible="true" aria-label="Carousel">
				<div id="id-carousel-thumb" class="jCarouselLiteDemo-body" style="position: relative;" data-shape="Round">
					<div class="position-relative ir309-product-images">
						<div id="thumb-a1" class="top_lg" data-toggle="zoom-all">
							<img class="img-responsive" src="<?php echo $ringimg; ?>" style="margin-left: auto; margin-right:auto; margin-bottom:20px;" alt="<?= $ringtitle; ?>">
						</div>
					</div>
				</div>
				<div id="image_icon" class="vertical" style="position: relative;">
					<div class="carousel nonCircular" data-acsb-overflower="true">
						<button class="prev disabled" style="outline:none;" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button"> &lt;&lt;</button>
						<div class="jCarouselLite" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 476px;" data-acsb-overflower="true">
							<ul class="clearfix nav" id="product_thumb_images" style="margin: 0px; padding: 0px; position: relative; list-style: none; z-index: 1; height: 476px; top: 0px; display: inherit;">
								<?php echo $product_thums; ?>
							</ul>
						</div>
						<button style="outline: none; visibility: hidden;" class="next" id="next" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button">&gt;&gt;</button>
						<div class="clear" aria-hidden="true" data-acsb-hidden="true"></div>
					</div>
				</div>
			</div>
		</div>
		<script>
		function chang_img(img_src){
			$("#thumb-a1 img").attr("src", img_src);
		}
		</script>
		<div class="col-md-5 ir218-detail-property pb-30 pb-xs-0">
			<div class="row">
				<div class="col-lg-10 col-md-12 ir218-explanation" id="ir309-explanation" data-acsb-main="true" role="main">
					<h1 class="heading"><?= $ringtitle; ?></h1>
					<div class="ir218-snippet-property mb-xs-15">
						<span class="ir218-snippet-stars" data-acsb-possible-star="true">
							<a href="javascript:void(0);" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Review " aria-hidden="false" data-acsb-hidden="false"></span></a>
						</span>
						<span class="ir218-write-read">
							<span class="ir218-snippet-read-reviews">
								<a class="text-33" href="javascript:void(0);" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true">(187)</a>
							</span>
						</span>
					</div>
					<p class="normal-statement mb20 mt5 ir309-description" data-acsb-overflower="true">
						This beautiful ring features a shimmering strand of pavé diamonds entwined with a lustrous ribbon of precious metal.
						<a class="ir309-description-read-more" href="javascript:void(0);" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Product Description|Read More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true"> <span class="display-ib td-n2 text-33"> ... </span>Read More</a>
					</p>
					<div class="view-with--shapes ">
						<p class="view-with__title title_shape">
							<span>View with Diamond Shape: </span><?php echo $rowsring['recommended_diamond_shapes'];?>
						</p>
						<div class="list_carousel--ir234-shape responsive" role="region" data-acsb-carousel="true" data-acsb-force-visible="true" aria-label="Carousel">
							<a class="prev disabled" id="prev1" href="#" style="display: inline;" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Previous" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Previous " aria-hidden="false" data-acsb-hidden="false"></span><i class="icons-chevron-left-black" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></a>
							<div class="caroufredsel_wrapper" style="text-align: start; float: none; position: relative; inset: auto; z-index: auto; width: 369px; height: 32px; margin: 0px; overflow: hidden;" data-acsb-overflower="true">
								<div class="caroufredsel_wrapper" style="display: block; text-align: left; float: none; position: absolute; inset: 0px auto auto 0px; z-index: auto; width: 369px; height: 32px; margin: 0px; overflow: hidden;">
									<ul id="ir234-shop-diamond" class="nav ir309-pdp-view-diamondShapes navclearfix" data-circular="false" style="text-align: left; float: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; width: 1189px; height: 32px;">
										<li style="width: 41px;" rel="1" class="shape-li" data-shape="Round">
											<div data-shape="Round" class="ir309-shape-thumbnails active fore1" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Round" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Round</span>
											</div>
										</li>
										<li style="width: 41px;" rel="2" class="shape-li" data-shape="Oval">
											<div data-shape="Oval" class="ir309-shape-thumbnails fore6" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Oval" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Oval</span>
											</div>
										</li>
										<li style="width: 41px;" rel="3" class="shape-li" data-shape="Cushion">
											<div data-shape="Cushion" class="ir309-shape-thumbnails fore3" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Cushion" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Cushion</span>
											</div>
										</li>
										<li style="width: 41px;" rel="4" class="shape-li" data-shape="Princess">
											<div data-shape="Princess" class="ir309-shape-thumbnails fore2" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Princess" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Princess</span>
											</div>
										</li>
										<li style="width: 41px;" rel="5" class="shape-li" data-shape="Pear">
											<div data-shape="Pear" class="ir309-shape-thumbnails fore8" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Pear" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Pear</span>
											</div>
										</li>
										<li style="width: 41px;" rel="6" class="shape-li" data-shape="Emerald">
											<div data-shape="Emerald" class="ir309-shape-thumbnails fore9" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Emerald" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Emerald</span>
											</div>
										</li>
										<li style="width: 41px;" rel="7" class="shape-li" data-shape="Marquise">
											<div data-shape="Marquise" class="ir309-shape-thumbnails fore5" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Marquise" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Marquise</span>
											</div>
										</li>
										<li style="width: 41px;" rel="8" class="shape-li" data-shape="Asscher">
											<div data-shape="Asscher" class="ir309-shape-thumbnails fore4" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Asscher" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Asscher</span>
											</div>
										</li>
										<li style="width: 41px;" rel="9" class="shape-li" data-shape="Radiant">
											<div data-shape="Radiant" class="ir309-shape-thumbnails fore7" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Radiant" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;" aria-hidden="false" data-acsb-hidden="false" class="acsb-sr-only" data-acsb-given-sr-only="true" data-acsb-sr-only="true" data-acsb-force-visible="true">Radiant</span>
											</div>
										</li>
										<li style="width: 41px;" rel="10" class="shape-li" data-shape="Heart" aria-hidden="true" data-acsb-hidden="true">
											<div data-shape="Heart" class="ir309-shape-thumbnails fore10" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Heart" data-noninteract="true">
												<i data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-textual-ops="cart"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Cart " aria-hidden="false" data-acsb-hidden="false"></span></i>
												<span style="text-transform:Capitalize !important;">Heart</span>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="clearfix" aria-hidden="true" data-acsb-hidden="true"></div>
							<a class="next" id="next1" href="#" style="display: inline;" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Diamond Shape|Next" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next " aria-hidden="false" data-acsb-hidden="false"></span><i class="icons-chevron-right-black" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></a>
						</div>
					</div>
					<script type="text/javascript" src="//script.brilliantearth.com/static/js/jquery.carouFredSel-6.2.1-packed.js"></script>
					<script type="text/javascript">
					if($('.ir309-description').height() > 40){
						$('.ir309-description').removeClass('expanded')
					}
					$('.ir309-description-read-more').click(function () {
						$(this).parent().addClass('expanded');
					});
					$('#ir234-shop-diamond').carouFredSel({
						auto:false,
						circular:false,
						infinite:false,
						prev: '#prev1',
						next: '#next1',
						pagination: "#pager1"
					});
					</script>

					<div class="ir309-select-container" role="navigation" aria-label="Page Menu">
						<p id="pdp_metal" class="select__title">
							<span class="avenir-medium">Select Metal: </span> 
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
							?>
						</p>
						<ul class="list-inline ir249-pdp-metals-select mb0 ir309-pdp-metals-select" style="margin-left:-5px;" data-acsb-menu="ul">
							<li data-acsb-menu="li" data-acsb-menu-root="true"><a class="value active change_track_info" data-metal="18K White Gold" data-balance="18K White Gold" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Metal|18KW" style="background-color:#dedede" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-tooltip="Use ←/→ to navigate" data-acsb-hover="true">18kw</a></li>
							<li data-acsb-menu="li" data-acsb-menu-root="true"><a class="value change_track_info" data-metal="18K Yellow Gold" data-balance="18K Yellow Gold" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Metal|18KY" style="background-color:#efd9a7" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-hover="true">18ky</a></li>
							<li data-acsb-menu="li" data-acsb-menu-root="true"><a class="value change_track_info" data-metal="14K Rose Gold" data-balance="14K Rose Gold" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Metal|14KR" style="background-color:#f0bd9e" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-hover="true">14kr</a></li>
							<li data-acsb-menu="li" data-acsb-menu-root="true"><a class="value change_track_info" data-metal="Platinum" data-balance="Platinum" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Metal|PT" style="background-color:#dedede" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-hover="true">pt</a></li>
						</ul>
					</div>
					<script type="text/javascript">
					$("#pdp_metal").parent().find('.value').hover(function(){
						$("#pdp_metal").html('<span class="avenir-medium" >Select Metal: </span> '+ $(this).attr('data-metal'));
					},function(){
						$("#pdp_metal").html('<span  class="avenir-medium" >Select Metal: </span> 18K White Gold');
					});
					</script>
					<p class="mt0 setting-only-price">
						$<?=_nf($retail_price+$get_diamond_price,0)?><small>(Setting Only)</small>
					</p>
					<input type="hidden" class="product_id" value="<?=trim($rowsring['ring_id'])?>" />
					<script>
					function sort_item(){
						var metal_type = $('#metal_type').val();
						if(metal_type == 'PALLADIUM' || metal_type == 'PLATINUM'){
							var meta_color = '';
						}else{
							var meta_color = $('#metal_color').val();
						}
						var finish_level = $('#finish_option').val();
						var diamond_quality = $('#metal_quality').val();
						var product_id = $('.product_id').val();
						$("#loadingplease").css("display", "block");
						$.ajax({
							url:"<?=base_url();?>diamonds/setStarCollectionFilters",
							type:"post",
							data:{metal_type:metal_type,metal_color:meta_color,finish_level:finish_level,diamond_quality:diamond_quality,product_id:product_id},
							cache: false,
							dataType:"json",
							success:function(res){
								if(res.msg == 'Value set'){
								}else{
									if(res.retail_price !="0"){
										$('.toppric').text('$'+res.retail_price);
										$('#semi_price').text('$'+res.retail_price);
										$('#setting_price1').text('$'+res.retail_price);
										$('#top_price').text('$'+res.retail_price);
										$('.setting-only-price').html('$'+res.retail_price+'<small>(Setting Only)</small>');
									}
									if(res.wire_price !="0"){
										$('#setting_price2').text('$'+res.wire_price);
									}
									if(res.price !="0"){
										$('#main_price').val(res.price);
										$('#site_price').val(res.price);
										$('#3ez_price').val(res.tez);
										$('#5ez_price').val(res.fez);
										$('.3ez_price').val(res.tez);
										$('.5ez_price').val(res.fez);
										$('#main_ez_price').val(res.price);
									}
								}
								$("#loadingplease").css("display", "none");
							}
						});
					}
					function metalTypeProduct(v){
						if(v == 'PALLADIUM' || v == 'PLATINUM'){
							$("#pdp_metal").html('<span class="avenir-medium" >Select Metal: </span> '+v+'');
							$("#showhideclr").hide();
						}else{
							$("#pdp_metal").html('<span class="avenir-medium" >Select Metal: </span> '+v+' '+$('#metal_color').val()+'');
							$("#showhideclr").show();
						}
						$('.metlvalue1').text('Metal - '+v);
						$('.metlvalue2').text(v);
						sort_item();
					}
					</script>
					<div class="variation-filters">
						<div class="further_dtcols metalsection ringsize">
							<span>Metal Type:</span>
							<span>
								<select name="metal_type" id="metal_type" onchange="metalTypeProduct(this.value);">
									<?php
									if(!empty($ringsmetail)){
										echo $ringsmetail;
									}else{
										echo '<option value="'.$rowsring['matalType'].'">'.$rowsring['matalType'].'</option>';
									}
									?>
								</select>
							</span>
						</div>
						<script>
						function metalColorProduct(v){
							$("#pdp_metal").html('<span class="avenir-medium" >Select Metal: </span> '+$('#metal_type').val()+' '+v+'');
							sort_item();
						}
						</script>
						<div class="further_dtcols metalsection ringsize" id="showhideclr">
							<span>Metal Color:</span>
							<span>
								<select name="metal_color" id="metal_color" onchange="metalColorProduct(this.value)">
									<?php
									if(!empty($ringsMetalColor)){
										echo $ringsMetalColor;
									}else{
										echo '<option value="'.$rowsring['metal_color'].'">'.$rowsring['metal_color'].'</option>';
									}
									?>
								</select>
							</span>
						</div>
						<script>
						function finishLevelProduct(v){
							sort_item();
						}
						</script>
						<div class="further_dtcols metalsection ringsize">
							<span>Finish option:</span>
							<span>
								<select name="finish_option" id="finish_option" onchange="finishLevelProduct(this.value)">
									<?php
									if(!empty($ringsFinishoption)){
										echo $ringsFinishoption;
									}else{
										echo '<option value="'.$rowsring['finish_option'].'">'.$rowsring['finish_option'].'</option>';
									}
									?>
								</select>
							</span>
						</div>
						<script>
						function diamondQualityProduct(v){
							sort_item();
						}
						</script>
						<div class="further_dtcols metalsection ringsize">
							<span>Diamond Quality:</span>
							<span>
								<select name="metal_quality" id="metal_quality" onchange="diamondQualityProduct(this.value)">
									<?php
									if(!empty($ringsQuality)){
										echo $ringsQuality;
									}else{
										echo '<option value="'.$rowsring['quality'].'">'.$rowsring['quality'].'</option>';
									}
									?>
								</select>
							</span>
						</div>
					</div>
					<div class="clear"></div>
					<form name="form1_detail" id="form1_detail" method="post" action="">
						<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $setingtype; ?>">
						<input type="hidden" name="3ez_price" class="3ez_price" value="<?= isset($ez3)?intval(number_format($ez3,0,'.','')):''; ?>">
						<input type="hidden" name="5ez_price" class="5ez_price" value="<?= isset($ez5)?intval(number_format($ez5,0,'.','')):''; ?>">
						<input type="hidden" name="main_price" id='main_price' value="<?php echo $retail_price + $get_diamond_price; ?>" />
						<input type="hidden" name="price" id="site_price" value="<?php echo $retail_price+$get_diamond_price; ?>" />
						<input type="hidden" name="vender" value="unique">
						<input type="hidden" name="url" value="<?php echo $ringimg; ?>">
						<input type="hidden" name="prodname" value="<?php echo $rowsring['product']?>">
						<input type="hidden" name="diamnd_count" value="<?php echo $rowsring['number_side_stone'];?>">
						<input type="hidden" name="ring_shape" value="<?php echo $suport_shape;?>">
						<input type="hidden" name="ring_carat" value="<?php echo $rowsring['side_stone_total_weight']; ?>">
						<input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['ring_id'];?>">
						<input type="hidden" name="stock_number" id="stock_number" value="<?php echo $rowsring['product']; ?>">
						<input type="hidden" name="diamond_cert_no" id="diamond_cert_no" value="<?php echo $get_cert_no; ?>">
						<input type="hidden" name="txt_ringtype" value="generic_ring">
						<input type="hidden" name="txt_ringsize" value="<?php if(isset($_GET['ring_size'])){ echo $_GET['ring_size']; }else{ echo  $set_ring_size; };?>" />
						<input type="hidden" name="txt_metal" value="<?php echo $default_metal;?>" />
						<input type="hidden" name="metals_weight" value="<?php echo $rowsring['side_stone_total_weight']; ?>" />
						<input type="hidden" name="vendors_name" value="Unique Setting" />
						<input type="hidden" name="vendor_number" value="716-889-4803" />
						<input type="hidden" name="table_name" value="us_product" />
						<input type="hidden" name="item_title" value="<?php if(isset($_GET['carat'])){ echo str_replace(' CT.','',$rowsring['side_stone_total_weight']) + $_GET['carat']; }else{ echo str_replace(' CT.','',$rowsring['side_stone_total_weight']) + $get_carat_value_d_i; } ?> carat <?php  if($rowsring['matalType'] == 'PLAT'){  echo 'Platinum';    }else{  echo $rowsring['matalType']; }?> Color <?php echo $get_color; ?> Clarity <?php   echo $get_clarity; ?> <?php echo $get_cert_no; ?> by <?php echo $get_lab; ?> Diamond Engagement Ring" />
						<input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
						<input type="hidden" name="product_type" value="Star Collection" />
						<input type="hidden" name="center_stone_id" id="center_stone_id" />
						<input type="hidden" name="txt_qty" value="1" />
						<div class="form-group mb5 ir309-choose-setting">
							<a class="btn btn-lg btn-block btn-success add_cyoring add_button" href="#javascript" rel="nofollow" onclick="addcartsubmit('<?php echo $addtoring_link; ?>')" id="addtoshopping">CHOOSE THIS SETTING</a>
						</div>
					</form>
					<ul class="ir218-social-contact ir309-social-contact text-33 clearfix" data-acsb-menu="ul" role="navigation" aria-label="Page Menu">
						<li class="fore1" id="drop_hint" data-acsb-menu="li" data-acsb-menu-root="true">
							<a href="javascript:void(0);" id="email_to_friend" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Lead Behavior|Drop Hint" data-noninteract="false" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" role="button" data-acsb-menu-root-link="true" data-acsb-tooltip="Use ←/→ to navigate" data-acsb-hover="true"><i class="iconfont iconfont-mail" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"><span class="glyphicon glyphicon-heart" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span></i>drop hint</a>
						</li>
						<li class="fore3" data-acsb-menu="li" data-acsb-menu-root="true">
							<a href="javascript:void(0);" class="request-info" rel="nofollow" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Lead Behavior|Email" data-noninteract="false" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" role="button" data-acsb-menu-root-link="true" data-acsb-hover="true"><i class="iconfont iconfont-mail" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i>email Us</a>
						</li>
						<li class="fore4" data-acsb-menu="li" data-acsb-menu-root="true">
							<a href="/contact/" id="pdp_telephone_text" class="phone_click" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Lead Behavior|Call" data-noninteract="false" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-menu="a" data-acsb-menu-root-link="true" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Contact " aria-hidden="false" data-acsb-hidden="false"></span><i class="iconfont iconfont-tel3" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i>678-949-5349</a>
						</li>
					</ul>
					<div class="divider-line"></div>
					<div class="ir309-shipping-and-delivery">
						<div class="free-shipping-text mb15 fs-15">
							<img width="40" src="https://image.brilliantearth.com/static/img/icon/svg/icon-speedy-diamond.svg" alt="Processing the data, please give it a few seconds..." data-acsb-alt-candidate="Icon speedy diamond">
							<p>
								<a href="/shipping/" class="text-33" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Details|Free Shipping" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">Free Shipping,</a>
								<a href="/30-Day-Returns/" class="text-33" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Details|Free 30 Day Returns" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">Free 30 Day Returns</a>
							</p>
						</div>
						<div class="dilivery-text fs-15">
							<img width="30" src="https://image.brilliantearth.com/static/img/icon/svg/calendar-icon.svg" alt="Processing the data, please give it a few seconds..." data-acsb-alt-candidate="Calendar icon">
							<p class="">Order now and your order ships by<span class="avenir-medium text-green"><?php echo date("l, F d",strtotime("+11 days")); ?></span>, depending on centerdiamond.</p>
						</div>
					</div>

					<div class="divider-line"></div>
					<div class="mb-xs-0 mb-20 product-detail-promo-feature mt0" style="border:0;">
						<a href="javascript:void(0);" data-link="/Green-on-the-Inside/" class="promotion-bar" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-hover="true"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Gift Promotion " aria-hidden="false" data-acsb-hidden="false"></span><img class="img-responsive" src="//image.brilliantearth.com/media/cache/9e/3f/9e3f426674228e36e7af319023b1e15d.jpg" srcset="//image.brilliantearth.com/media/promotion/PDP_DT_Diamond_Bar_-_Last_Day_New1.jpg 2x" alt="9e3f426674228e36e7af319023b1e15d" role="presentation"></a>
					</div>

					<div class="ir312-product-details-wrapper">
						<div class="IR218-product-details-lists ir312-product-details">
							<div class="product-details-lists-v2">
								<div class="panel">
									<div class="panel-title">
										<h2 class="heading-1 mt0 ir218-collapse-heading"><a href="#JS-Diamond-details" class="td-n2 collapsed" onclick="ring_details_recommended_click(this,'Ring Details')" data-toggle="collapse" aria-expanded="true" role="button" aria-controls="JS-Diamond-details">Ring Details<span class="iconfont iconfont-uparrow"></span></a></h2>
									</div>
									<div class="collapse" id="JS-Diamond-details" style="height: 0px;">
										<div class="ir218-collapse-body">
											<div class="break-visible">
												<h3 class="h5 tr-u">Ring Information</h3>
												<dl>
													<dt>Ring Stock Number:</dt>
													<dd><?php echo $rowsring['product']; ?></dd>
												</dl>
												<dl>
													<dt>TYPE:</dt>
													<dd>Diamond</dd>
												</dl>
												<dl>
													<dt>Side Diamond Shape:</dt>
													<dd><?php echo $rowsring['recommended_diamond_shapes'];?></dd>
												</dl>
												<dl>
													<dt>Side Diamond Carats:</dt>
													<dd><?php echo $rowsring['side_stone_total_weight']; ?></dd>
												</dl>
												<dl>
													<dt>Metal:</dt>
													<dd>
														<?php 
														if($rowsring['matalType'] == 'PLAT'){
															echo 'Platinum';  
														}else{
															echo $rowsring['matalType'];  
														}
														$cur_stones1 = explode(',',$rowsring['supplied_stones']);
														?>
													</dd>
												</dl>
												<dl>
													<dt>Total Diamonds:</dt>
													<dd><?php echo $rowsring['number_side_stone']+1;?></dd>
												</dl>
												<dl>
													<dt>Setting Price:</dt>
													<dd id="semi_price" data-semi="<?php echo _nf($retail_price, 0); ?>">$<?php echo _nf($retail_price, 0); ?></dd>
												</dl>
											</div>
											<div class="fore3">
												<h3 class="h5 tr-u">ITEM INFORMATION</h3>
												<div class="row">
													<div class="col-sm-12">
														<div class="accent-gemstones">
															<dl>
																<dt class="position-relative">Item Code</dt>
																<dd><?php echo $rowsring['sku']; ?></dd>
															</dl>
															<dl>
																<dt class="position-relative">Approx. Weight</dt>
																<dd><?php echo $rowsring['side_stone_total_weight']; ?></dd>
															</dl>
															<dl>
																<dt class="position-relative">Measurements</dt>
																<dd><?php echo 'Top Width: '.$rowsring['top_width'].' mm, Bottom Width: '.$rowsring['bottom_width'].' mm, <br>Top Height: '.$rowsring['top_height'].' mm, Bottom Height: '.$rowsring['bottom_height'].' mm'; ?></dd>
															</dl>
															<dl>
																<dt class="position-relative">Style Name</dt>
																<dd><?php echo $rowsring['product']; ?></dd>
															</dl>
															<dl>
																<dt class="position-relative">Style Group Name</dt>
																<dd><?php echo $rowsring['sku']; ?></dd>
															</dl>
															<dl>
																<dt class="position-relative">Supplied Stones</dt>
																<dd><?php echo $rowsring['supplied_side_stone']; ?></dd>
															</dl>
															<dl>
																<dt class="position-relative">Supplied Stone Weight</dt>
																<dd><?php echo $rowsring['side_stone_total_weight']; ?></dd>
															</dl>
														</div>
													</div>
													<div class="clearfix visible-sm"></div>
												</div>
											</div>
											<div class="fore3">
												<h3 class="h5 tr-u">DIAMOND INFORMATION</h3>
												<div class="row">
													<div class="col-sm-12">
														<div class="accent-gemstones">
															<dl class="item_rows">
																<dt>Setting Type</dt>
																<dd><?php echo $maincate_name; ?></dd>
															</dl>
															<dl class="item_rows">
																<dt>Supplied Stones</dt>
																<dd><?php echo $rowsring['supplied_side_stone']; ?></dd>
															</dl>
															<dl class="item_rows">
																<dt>Supplied Stone Weight</dt>
																<dd><?php echo $rowsring['side_stone_total_weight']; ?></dd>
															</dl>
															<dl class="item_rows">
																<dt>Diamond Shapes</dt>
																<dd><?php echo $suport_shape; ?></dd>
															</dl>
															<dl class="item_rows">
																<dt>Center Stone Sold Separately</dt>
																<dd><?php echo $rowsring['additional_stones']; ?></dd>
															</dl>
															<?php
															$itemInformation = '';
															if( !empty( $suported_shapes) ) {  
																$itemInformation .= '<dl class="item_rows">
																<dt>Diamond Shapes View</dt>
																<dd>'.$suported_shapes.'</dd>
																</dl>';
															}
															echo $itemInformation;
															?>
															<dl class="item_rows">
																<dt>Clarity</dt>
																<dd>VS</dd>
															</dl>
															<dl class="item_rows">
																<dt>Color</dt>
																<dd>GH</dd>
															</dl>
														</div>
													</div>
													<div class="clearfix visible-sm"></div>
												</div>
											</div>
											<script type="text/javascript">
											var dl_num = $('.dl-one dl').length / 2 - 1;
											var _html = $('.dl-one dl:gt(' + dl_num + ')').html();
											$('.dl-one dl:gt(' + dl_num + ')').remove();
											$('#gemstone_details_two').html(_html)
											</script>
											<div class="">
												<h3 class="h5 tr-u">Center Diamond</h3>
												<p class="mt10">This ring can be set with:</p>
												<div class="center-diamond-shape clearfix">
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-round media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Round</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-princess media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Princess</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-cushion media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Cushion</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-oval media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Oval</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-emerald media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Emerald</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-pear media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Pear</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-radiant media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Radiant</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-asscher media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Asscher</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-marquise media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Marquise</div>
														</div>
													</div>
													<div class="media">
														<div class="media-img">
															<span class="ico-diamond-shap-heart media-object"></span>
														</div>
														<div class="media-body">
															<div class="h3 media-heading">Heart</div>
														</div>
													</div>
												</div>
												<p class="visible-xs mt10">Note: This setting is available only with purchase of a diamond.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
					function ring_details_recommended_click(event, label){
						$('#JS-Diamond-details').css('height','auto');
						$('#JS-Diamond-details').addClass('show');
					}
					</script>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container container1260 luxury-consience-container forever-highlight pt-30 pb-30">
	<div class="row">
		<div class="col-sm-6">
			<div class="luxury-consience-left center-block">
				<h2 class="ir251-headline h2 text-left">Made Just for You</h2>
				<div class="">
					<p class="luxury-consience-text">
						At our New York design studio, our team designs every ring to delight you, from the first time you see it and every day after. We carefully consider the entire piece—obsessing over comfort, quality, and durability so you can cherish it for a lifetime.
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="pdp-collapse-wrapper" id="Design-Crafts" role="tablist">
				<div class="pdp-collapse-panel panel">
					<div class="panel-title fore1" role="tab">
						<div class="h5">
							<a class="collapsed" onclick="setting_ga_click(this, 'Beyond Conflict Free')" role="button" data-toggle="collapse" href="#JS-beyond-conflict" data-parent="#Design-Crafts" aria-expanded="true" aria-controls="JS-beyond-conflict" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
								<h3 class="fs-18 h3 mb0 mt0">Beyond Conflict Free<sup>TM</sup></h3>
								<small>Setting a higher ethical standard</small>
								<span class="iconfont iconfont-uparrow" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
							</a>
						</div>
					</div>
					<div id="JS-beyond-conflict" class="collapse" aria-hidden="true" data-acsb-hidden="true">
						<div class="pdp-collapse-body">
							At Godstone Diamonds we’ve set a new standard in diamond sourcing: Beyond Conflict Free™. We only accept diamonds from specific mine operations and countries that follow internationally recognized labor, trade, and environmental standards. While the Kimberly Process has made advancements in reducing conflict diamonds, it remains flawed and still leaves diamonds tainted by human rights abuses and environmental degradation in the supply chain.
						</div>
					</div>
				</div>
				<div class="pdp-collapse-panel panel">
					<div class="collapsed panel-title fore2-v2" role="tab">
						<div class="h5">
							<a class="collapsed" onclick="setting_ga_click(this, 'Recycled Metal')" role="button" data-toggle="collapse" href="#JS-beyond-conflict2" data-parent="#Design-Crafts" aria-expanded="true" aria-controls="JS-beyond-conflict2" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
								<h3 class="fs-18 h3 mb0 mt0">Recycled Precious Metals</h3><small>High quality and responsibly sourced</small>
							<span class="iconfont iconfont-uparrow" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span></a></div>

					</div>
					<div id="JS-beyond-conflict2" class="collapse" aria-hidden="true" data-acsb-hidden="true">
						<div class="pdp-collapse-body">
							Our metals are created from existing gold jewelry and excess production metal, sourced from refiners that have been audited by the Responsible Jewellery Council, Responsible Mining Initiative, and London Bullion Market Association.
						</div>
					</div>
				</div>
				<div class="pdp-collapse-panel panel">
					<div class="collapsed panel-title fore3" role="tab">
						<div class="h5">
							<a class="collapsed" onclick="setting_ga_click(this, 'Giving Back')" role="button" data-toggle="collapse" href="#JS-beyond-conflict3" data-parent="#Design-Crafts" aria-expanded="true" aria-controls="JS-beyond-conflict3" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
								<h3 class="fs-18 h3 mb0 mt0">Giving Back</h3>
								<small>Support for causes that matter</small>
							<span class="iconfont iconfont-uparrow" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span></a></div>
					</div>
					<div id="JS-beyond-conflict3" class="collapse" aria-hidden="true" data-acsb-hidden="true">
						<div class="pdp-collapse-body">
							Godstone Diamonds gives back to help build a brighter future in mining communities and in the communities we operate. We also donate to programs that are dedicated to improving human rights and environmental practices in our industry, including Feeding America, the Rainforest Alliance, and the NAACP Legal Defense and Educational Fund.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function setting_ga_click(event, label){
	$('#JS-beyond-conflict2').css('height','0');
	$('#JS-beyond-conflict2').removeClass('show');
	$('#JS-beyond-conflict2').css('height','0');
	$('#JS-beyond-conflict2').removeClass('show');
	$('#JS-beyond-conflict3').css('height','0');
	$('#JS-beyond-conflict3').removeClass('show');
	if(label == "Beyond Conflict Free"){
		$('#JS-beyond-conflict').css('height','auto');
		$('#JS-beyond-conflict').addClass('show');
	}
	if(label == "Recycled Metal"){
		$('#JS-beyond-conflict2').css('height','auto');
		$('#JS-beyond-conflict2').addClass('show');
	}
	if(label == "Giving Back"){
		$('#JS-beyond-conflict3').css('height','auto');
		$('#JS-beyond-conflict3').addClass('show');
	}
}
</script>
<div class="ir298-customer-reviews pt-60 pt-xs-0 mb-30 mb-xs-0 pb-60 box-gray1 pb-xs-0" id="ReviewHeader">
	<div class="container">
		<div class="row">
			<div class="indented-slickbox col-md-12" id="customer-reviews-slidebox">
				<header class="carat-comparisons">
					<h2 class="ir298-pdp-heading mt0">Reviews</h2>
					<!--<a href="/engagement-ring-settings/" class="ir251-link-text ml-auto hidden-xs">Shop All</a>-->
					<div class="slick-control"><span class="iconfont iconfont-left slick-disabled" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image|Previous" data-noninteract="true" style="" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span><span class="iconfont iconfont-right" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image|Next" data-noninteract="true" style="" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-textual-ops="next"><span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next " aria-hidden="false" data-acsb-hidden="false"></span></span></div>
				</header>
				<div class="position-relative mb-30 ir309-review-slicks">
					<div class="cr-leading">
						<div class="ir218-total-score ir298-total-score">
						<div class="title" data-rating="5.0">5.0</div>
						<div class="ir218-snippet-stars ir298-snippet-stars" data-acsb-possible-star="true"> <span class="ir218-stars" style="background-position:left -200.0px;" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span> </div>
						</div>
						<div class="ir218-snippet-read-write ir298-snippet-read-write">
						<span class="ir218-snippet-write-review">187 Reviews</span>
						</div>
						<div class="extra-action">
						<div class="hidden-xs-inline">
						<a class="text-66 tt-n td-u2" href="https://www.brilliantearth.com/review/?pr_page_id=BE1D54-18KW" onclick="track_event('Product Detail Page','CYO Rings','Setting|Diamond|Reviews|Leave Review', true)" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-scrape-url="https://brilliantearth.com/review/" data-acsb-hover="true">Leave a Review</a></div>
						</div>
					</div>
					<div class="indented-slick shop-by-style-slide slick-initialized slick-slider" id="customer-reviews-slide" data-acsb-overflower="true" role="region" data-acsb-carousel="true" data-acsb-force-visible="true" aria-label="Carousel">
						<div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 6768px; transform: translate3d(0px, 0px, 0px);"><div data-slide="9955x1" class="image-popup-slide slick-slide slick-active" data-slick-index="0" style="width: 144px;">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 1" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/xg7mcptd0rrdas6apvr0.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="9773x1" class="image-popup-slide slick-slide slick-active" data-slick-index="1" style="width: 144px;">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 2" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/cwyocyoc7ky9fzchppan.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="9446x1" class="image-popup-slide slick-slide slick-active" data-slick-index="2" style="width: 144px;">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 3" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/pk04v1dvwkwsd2yyx0fl.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="9136x1" class="image-popup-slide slick-slide slick-active" data-slick-index="3" style="width: 144px;">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 4" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/wdwpucuzjilzzozk2dcy.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8790x1" class="image-popup-slide slick-slide slick-active" data-slick-index="4" style="width: 144px;">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 5" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/grlazjla8bht9z5073he.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8790x2" class="image-popup-slide slick-slide slick-active" data-slick-index="5" style="width: 144px;">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-overflower="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="0" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 6" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/amhbdahk6zzvlef0nl2v.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8790x3" class="image-popup-slide slick-slide" data-slick-index="6" style="width: 144px;" aria-hidden="false" data-acsb-hidden="false">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true" data-acsb-overflower="true" tabindex="0">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 7" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/is0zvkpl7jdeucwku7zb.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8675x1" class="image-popup-slide slick-slide" data-slick-index="7" style="width: 144px;" aria-hidden="false" data-acsb-hidden="false">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true" data-acsb-overflower="true" tabindex="0">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 8" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/jwot0nzrp1hz3bobuk6e.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8665x1" class="image-popup-slide slick-slide" data-slick-index="8" style="width: 144px;" aria-hidden="false" data-acsb-hidden="false">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true" data-acsb-overflower="true" tabindex="0">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 9" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zdr44xzlr6dwe2qj3ert.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8499x1" class="image-popup-slide slick-slide" data-slick-index="9" style="width: 144px;" aria-hidden="false" data-acsb-hidden="false">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button" data-acsb-carousel-paging="true" data-acsb-overflower="true" tabindex="0">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 10" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/tanxpgimbtb0zhkiodxf.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8499x2" class="image-popup-slide slick-slide" data-slick-index="10" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 11" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/lxil8svqa62qw3kn57tu.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8355x1" class="image-popup-slide slick-slide" data-slick-index="11" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 12" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/uprxo258ul3ruygtobld.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8299x1" class="image-popup-slide slick-slide" data-slick-index="12" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 13" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/vmppooppvliilrrhalwk.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8285x1" class="image-popup-slide slick-slide" data-slick-index="13" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 14" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/k1oukeqkifag8nsixmoa.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8285x2" class="image-popup-slide slick-slide" data-slick-index="14" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 15" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/aicedpa8hodzoccxpzb6.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8140x1" class="image-popup-slide slick-slide" data-slick-index="15" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 16" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/eqnxonebgnfyawqqlf7s.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8140x2" class="image-popup-slide slick-slide" data-slick-index="16" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 17" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zpnygdaic0fcaseuhhyn.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8140x3" class="image-popup-slide slick-slide" data-slick-index="17" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 18" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/tptfj3rq9cojes8ff5aq.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8140x4" class="image-popup-slide slick-slide" data-slick-index="18" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 19" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/hruidxdtuywpdpdsbdxr.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8114x1" class="image-popup-slide slick-slide" data-slick-index="19" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 20" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/lz2ctwefiqfc9efud8fi.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="8057x1" class="image-popup-slide slick-slide" data-slick-index="20" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 21" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/bz0buyczkebflfynhvac.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="7828x1" class="image-popup-slide slick-slide" data-slick-index="21" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 22" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/i6jxrlyqjepbjkvk4lih.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="7587x1" class="image-popup-slide slick-slide" data-slick-index="22" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 23" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/plldapobyh9j3rv81myp.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="7588x1" class="image-popup-slide slick-slide" data-slick-index="23" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 24" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/ixmbu4ke1d99jubop104.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="7469x1" class="image-popup-slide slick-slide" data-slick-index="24" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 25" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/dai6bi4soqvukqqbhfsh.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="7144x1" class="image-popup-slide slick-slide" data-slick-index="25" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 26" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/ksjhamjul5vntynkuhh6.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="7109x1" class="image-popup-slide slick-slide" data-slick-index="26" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 27" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/ftutkmtdz68xhvvclvt3.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="7087x1" class="image-popup-slide slick-slide" data-slick-index="27" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 28" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/tuburhubhhp6yjmf91g4.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="6274x1" class="image-popup-slide slick-slide" data-slick-index="28" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 29" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zfymtclmrhfhsoyn9qor.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="5431x1" class="image-popup-slide slick-slide" data-slick-index="29" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 30" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/md1meqpuzohhsgw83t8r.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="4788x1" class="image-popup-slide slick-slide" data-slick-index="30" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 31" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zlepdvtolbs3zeuz438m.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="4788x2" class="image-popup-slide slick-slide" data-slick-index="31" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 32" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/cia3iutjzuifmgsdjjgy.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="4734x1" class="image-popup-slide slick-slide" data-slick-index="32" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 33" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/qskrrmconyecs6a3oa8d.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="4609x1" class="image-popup-slide slick-slide" data-slick-index="33" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 34" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/zyilgjzmt3k83px5dpug.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="4531x1" class="image-popup-slide slick-slide" data-slick-index="34" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 35" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/f_auto,w_576,h_768/prod/iyqsg9xsxv9j38h1xdpw.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="3829x1" class="image-popup-slide slick-slide" data-slick-index="35" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 36" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/qmjt517prceankc9zmpp.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="3723x1" class="image-popup-slide slick-slide" data-slick-index="36" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 37" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/euvlu1cg4eletwxxwavq.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="3628x1" class="image-popup-slide slick-slide" data-slick-index="37" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 38" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/epgbd4eag5is21y1y4vj.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="3624x1" class="image-popup-slide slick-slide" data-slick-index="38" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 39" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/y7gm2fulcfyz3gum6beq.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="3608x1" class="image-popup-slide slick-slide" data-slick-index="39" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 40" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/bg2wifz6w7esfdmknram.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="3274x1" class="image-popup-slide slick-slide" data-slick-index="40" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 41" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/a4cq4jpexohxxomvoirn.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="2849x1" class="image-popup-slide slick-slide" data-slick-index="41" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 42" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/qqzorvzkhn2quruilw8r.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="2801x1" class="image-popup-slide slick-slide" data-slick-index="42" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 43" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/sfmk9w4gy0iyyptwrokc.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="2801x2" class="image-popup-slide slick-slide" data-slick-index="43" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 44" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/poa9ps8trqxwo5hamvpt.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="2703x1" class="image-popup-slide slick-slide" data-slick-index="44" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 45" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/rrswu2b85wauvau4pohi.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="654x1" class="image-popup-slide slick-slide" data-slick-index="45" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 46" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/jfhgwfvqltwhbrw7zrer.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div><div data-slide="655x1" class="image-popup-slide slick-slide" data-slick-index="46" style="width: 144px;" aria-hidden="true" data-acsb-hidden="true">
						<div class="thumbnail thumbnail--slick-lovely" data-toggle="modal" data-target="#popup-reviews-images" data-slide-to="0" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="false" role="button" data-acsb-carousel-paging="true">
						<span class="acsb-sr-only" data-acsb-sr-only="true" data-acsb-force-visible="true" aria-label=" Next carousel slide 47" aria-hidden="false" data-acsb-hidden="false"></span><div>
						<img alt="Oval diamond ring on hand" src="//res.cloudinary.com/powerreviews/image/upload/f_auto,q_auto,h_768,w_auto/d_portal-no-product-image_ttlfpi.svg/prod/hpxabairmcyq0vxt2b82.jpg" class="img-fluid" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Customer Image" data-noninteract="true">
						</div>
						</div>
						</div></div><i class="c1" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i><i class="c2" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i><i class="c" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></i></div>
					</div>
					<div class="dropdown ir218-dropdown-sort-by">
						<a id="sort" data-target="#" href="#" class="dropdown-toggle tt-c" data-toggle="dropdown" role="button" aria-expanded="false" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" data-acsb-hover="true">
							<span>sort:</span>
							<span class="sort-result" id="sort_by_btn" data-value="" data-init="">highest rating</span>
							<span class="caret" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true"></span>
						</a>
						<div class="dropdown-content" aria-labelledby="sort" aria-hidden="true" data-acsb-hidden="true">
							<dl class="sort-by" id="sort_by">
							<dd>
							<a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="newest" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">newest</a>
							</dd>
							<dd>
							<a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="oldest" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">oldest</a>
							</dd>
							<dd>
							<a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="highest rating" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">highest rating</a>
							</dd>
							<dd>
							<a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="lowest rating" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">lowest rating</a>
							</dd>
							<dd>
							<a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="most helpful" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">most helpful</a>
							</dd>
							<dd>
							<a class="sort-option google-event-tracker" href="javascript:void(0);" data-value="least helpful" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" role="button" data-acsb-hover="true">least helpful</a>
							</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 cr-body">
				<div class="cr-content" id="customer-reviews-post">
					<div class="pb-30">
						<div class="reviews-post-section" data-acsb-overflower="true">
							<div class="author"><div class="pull-right">June 8, 2021</div>Kelsey
							</div>
							<ul class="list-inline pull-right reviews-post-section_thumbnail" aria-hidden="true" data-acsb-hidden="true" role="presentation">

							</ul>
							<div style="overflow:hidden;" data-acsb-overflower="true">
							<span class="ir218-snippet-stars" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true" data-acsb-possible-star="true">
							<span style="background-position:left -130.0px;" class="ir218-stars ir218-stars-small" aria-label="Review"></span>
							</span>
							<div class="author-headline">Perfect</div>
							<p class="author-commit expanded">
							LOVE everything about the ring and the process. Love getting to choose the particular stone, when I needed customer service they were quick and pleasant to deal with. Extremely happy with the final product!!
							<a href="javascript:void(0);" data-toggle="customer_review_read_more" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Read More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true">...Read More</a>
							</p>
							</div>
						</div>

						<div class="reviews-post-section" data-acsb-overflower="true">
							<div class="author"><div class="pull-right">June 7, 2021</div>JR
							</div>
							<ul class="list-inline pull-right reviews-post-section_thumbnail" aria-hidden="true" data-acsb-hidden="true" role="presentation">

							</ul>
							<div style="overflow:hidden;" data-acsb-overflower="true">
							<span class="ir218-snippet-stars" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true" data-acsb-possible-star="true">
							<span style="background-position:left -130.0px;" class="ir218-stars ir218-stars-small" aria-label="Review"></span>
							</span>
							<div class="author-headline">Exceeded Expectations</div>
							<p class="author-commit expanded">
							Was hesitant to purchase jewelry online for a special occasion, but with the Covid-19 pandemic determined it was most practical for our needs.  The results were exceptional and I would readily order again.
							<a href="javascript:void(0);" data-toggle="customer_review_read_more" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Read More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true">...Read More</a>
							</p>
							</div>
						</div>

						<div class="reviews-post-section" data-acsb-overflower="true">
							<div class="author"><div class="pull-right">June 7, 2021</div>Brandon
							</div>
							<ul class="list-inline pull-right reviews-post-section_thumbnail" aria-hidden="true" data-acsb-hidden="true" role="presentation">

							</ul>
							<div style="overflow:hidden;" data-acsb-overflower="true">
							<span class="ir218-snippet-stars" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true" data-acsb-possible-star="true">
							<span style="background-position:left -130.0px;" class="ir218-stars ir218-stars-small" aria-label="Review"></span>
							</span>
							<div class="author-headline">Great prouct!</div>
							<p class="author-commit expanded">
							Proposed to my girlfriend with this, absolutely beautiful ring!
							<a href="javascript:void(0);" data-toggle="customer_review_read_more" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Read More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button" data-acsb-hover="true">...Read More</a>
							</p>
							</div>
						</div>
						<script type="text/javascript">
						//加载更多按钮显示的信息
						var load_more_info = "(Showing 3 of 187)";
						//是否已经加载全部
						var is_last = "False";

						$(".author-commit").each(function() {
						if($(this).height() > 40 && !$(this).hasClass('old-item')){
						$(this).addClass('old-item');
						$(this).removeClass('expanded')
						}
						})
						</script>
					</div>
				</div>
				<div class="text-center">
					<button class="btn btn-lg btn-default ir218-load-more-reviews" style="display: none" data-acsb-clickable="true" data-acsb-navigable="true" tabindex="-1" data-acsb-now-navigable="false" aria-hidden="true" data-acsb-hidden="true" role="button">loading ...</button>
					<button class="btn btn-lg btn-default ir218-load-more-reviews" id="load-more-reviews" data-category="Product Detail Page" data-action="CYO Rings" data-label="Setting|Diamond|Reviews|Load More" data-noninteract="true" data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button">load more</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function addcartsubmit(pageURL){
	document.getElementById('form1_detail').action = pageURL;
	document.getElementById('form1_detail').submit();
}
</script>