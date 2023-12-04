<?php
header('Access-Control-Allow-Origin: *');
$segment = explode("/",$_SERVER['REQUEST_URI']);
if(!empty($segment)){
	if(isset($segment[4]) && !empty($segment[4])){
		$srchShape = $segment[4];
	}else{
		$srchShape = isset($segment[3])?$segment[3]:'';
	}
}else{
	$srchShape = '';
}
?>
<input type="hidden" class="category" id="category" value="Bridal Shanks & Settings" <?php if($srchShape == 'bridal-shanksNsettings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Engagement Rings" <?php if($srchShape == 'bridal-rings' || $srchShape == 'asscher' || $srchShape == 'cushion' || $srchShape == 'emerald' || $srchShape == 'oval' || $srchShape == 'pear' || $srchShape == 'round' || $srchShape == 'square' || $srchShape == 'all-shapes'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Ever & Ever" <?php if($srchShape == 'everNever'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="New Products" <?php if($srchShape == 'new-products'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Platinum Styles" <?php if($srchShape == 'platinum-styles'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="N/A" <?php if($srchShape == 'all-shapes' || $srchShape == 'all-shapes-cut' || $srchShape == 'all-shapes-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="N/A" <?php if($srchShape == 'n-a' || $srchShape == 'n-a-cut' || $srchShape == 'n-a-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Straight Baguette" <?php if($srchShape == 'straight-baguette' || $srchShape == 'straight-baguette-cut' || $srchShape == 'straight-baguette-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Tapered Baguette" <?php if($srchShape == 'tapered-baguette' || $srchShape == 'tapered-baguette-cut' || $srchShape == 'tapered-baguette-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Triangle" <?php if($srchShape == 'triangle' || $srchShape == 'triangle-cut' || $srchShape == 'triangle-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Radiant" <?php if($srchShape == 'radiant' || $srchShape == 'radiant-cut' || $srchShape == 'radiant-cut-rings'){ echo 'checked="checked"'; } ?>>
<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/css/lightslider.min.css' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/js/lightslider.min.js"></script>
<script type="text/javascript" src="<?= SITE_URL ?>js/assets/search_product_with_infinite_scroll.min.js"></script>
<link href="<?= SITE_URL ?>css/assets/global-mini01.css" rel="stylesheet">
<link href="<?= SITE_URL ?>css/assets/cyo.css" rel="stylesheet">
<link href="<?= SITE_URL ?>css/assets/listing-mini.css" rel="stylesheet">
<link href="<?= SITE_URL ?>css/assets/listing-custom.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
.loadingplease{background:none repeat scroll 0 0 #fff;display:block;height:380px;opacity:.7;position:absolute;text-align:center;width:400px;z-index:99999}
.filteractive{border:1px solid #8e1010!important}
.filteractive .single-image--12J3l{color:#8e1010}
.filteractive .label--3ytQP{color:#8e1010}
.ui-slider.ui-slider-horizontal .ui-slider-handle{width:22px;background:url(https://ion.r2net.com/Images/JewelGallery/slider-handle-new.png) center center no-repeat;overflow:hidden;position:absolute;top:-4px;border:1px solid #d6d6d6;margin-left:-13px;height:22px!important;border-radius:50%!important}
#ring_grid{margin-bottom:30px}
#ring_grid_length{display:none}
#sort_by{display:none}
#ring_grid_filter{display:none}
table#ring_grid tbody tr{width:25%;float:left;padding:0;margin:0;background:none}
table#ring_grid tbody tr td{background:none;padding:0;margin:0;border:none}
.single-button-container--3t7nn .single-image--12J3l{font-size:48px}
@media only screen and (device-width: 768px) {
table#ring_grid tbody tr{width:50%}
}
@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
.result_page_right{width:100%}
table#ring_grid tbody tr{width:50%}
}
@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
.result_page_right{width:100%}
table#ring_grid tbody tr{width:50%}
}
@media (max-width: 767px) {
.result_page_right{width:100%}
table#ring_grid tbody tr{width:50%}
.listpage-lists-v2 .thumbnail,.listpage-lists-v2 .thumbnail-out .thumbnail{padding:0 15px;min-height:310px;max-height:310px;height:100%}
.cell--2wUTj.style-icon-style--nVX2r .cell-icon--q1gZD {
    font-size: 26px;
    line-height: unset;
    padding-top: 12px;
}
}
</style>
<div class="container container1170 ">
	<ol class="breadcrumb">
		<li><a href="<?= SITE_URL ?>diamonds/engagement-rings"><span>Overnight</span></a></li>
		<li class="active">Create Your Own Engagement Ring</li>
	</ol>
</div>
<div class="ir231-listing-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="imitate-table">
					<div class="hero-meta">
						<div class="ad-title-larger">
							<h1 class="h1">
								<span>Engagement Ring</span>
								<span>Settings</span>
							</h1>
						</div>
						<div class="banner-tro hidden-xs">
							<p class="tro-txt max-w768 center-block">Our engagement rings are handcrafted from recycled precious metals and set with <br> Beyond Conflict Free Diamonds™ and vibrant gemstones.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container container1260 ir224-cyo-bar" id="cyo-bar">
	<div class="row">
		<div class="col-md-12 xs-nospace">
			<div class="wizard2-steps">
				<div class="step wizard2-steps-heading">
					<div class="node">
						<div class="node-skin">
							<div class="cont">
								<h2 class="nostyle-heading">Create Your Ring</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="cyo-bar-step step step-item active-step keep-left ">
					<div class="node" style="cursor: pointer;">
						<div class="node-skin">
							<div class="num">1</div>
							<div class="cont">
								<div class="heading"><h2 class="nostyle-heading">Choose Setting</h2></div>
							</div>
							<div class="pho">
								<img src="<?= SITE_URL ?>images/assets/setting.svg" alt="setting">
							</div>
						</div>
					</div>
				</div>
				<div class="cyo-bar-step step step-item ">
					<div class="node" style="cursor: pointer;">
						<div class="node-skin">
							<div class="num">2</div>
							<div class="cont">
								<div class="heading"><h2 class="nostyle-heading">Choose Diamond</h2></div>
								<div class="action help-tips">
									<a href="<?= SITE_URL ?>diamonds/diamonds-search" class="td-u bar-action">Browse Diamonds</a>
								</div>
							</div>
							<div class="pho">
								<img src="<?= SITE_URL ?>images/assets/diamond.svg" alt="diamond">
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
								<img src="<?= SITE_URL ?>images/assets/ring.svg" alt="ring">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="panel-container--3-uH2">
	<button type="button" style="display:none;" id="btn-reload">Reload</button>
	<div>
		<div style="display:flex;width:100%;margin-bottom:20px;position:relative">
			<div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'halo' || $srchShape == 'halo-style' || $srchShape == 'halo-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-halo font-competability"></div>
				<span class="label--3ytQP">Halo</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Halo-Style" <?php if($srchShape == 'halo' || $srchShape == 'halo-style' || $srchShape == 'halo-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'accented' || $srchShape == 'accented-style' || $srchShape == 'accented-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-side-stone font-competability"></div>
				<span class="label--3ytQP">Accented</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Accented" <?php if($srchShape == 'accented' || $srchShape == 'accented-style' || $srchShape == 'accented-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'three-stone' || $srchShape == 'three-stone-style' || $srchShape == 'three-stone-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-tree-stone font-competability"></div>
				<span class="label--3ytQP">Three-Stone</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Three-Stone" <?php if($srchShape == 'three-stone' || $srchShape == 'three-stone-style' || $srchShape == 'three-stone-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'solitaire' || $srchShape == 'solitaire-style' || $srchShape == 'solitaire-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-solitaire font-competability"></div>
				<span class="label--3ytQP">Solitaire</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Solitaire" <?php if($srchShape == 'solitaire' || $srchShape == 'solitaire-style' || $srchShape == 'solitaire-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'sculptural' || $srchShape == 'sculptural-style' || $srchShape == 'sculptural-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-tension font-competability"></div>
				<span class="label--3ytQP">Sculptural</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Sculptural" <?php if($srchShape == 'sculptural' || $srchShape == 'sculptural-style' || $srchShape == 'sculptural-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'vintage' || $srchShape == 'vintage-style' || $srchShape == 'vintage-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-vintage font-competability"></div>
				<span class="label--3ytQP">Vintage</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Vintage" <?php if($srchShape == 'vintage' || $srchShape == 'vintage-style' || $srchShape == 'vintage-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<?php /* <div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'infinity' || $srchShape == 'infinity-style' || $srchShape == 'infinity-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-infinity font-competability"></div>
				<span class="label--3ytQP">Infinity</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Infinity" <?php if($srchShape == 'infinity' || $srchShape == 'infinity-style' || $srchShape == 'infinity-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'bypass' || $srchShape == 'bypass-style' || $srchShape == 'bypass-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-bypass font-competability"></div>
				<span class="label--3ytQP">Bypass</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Bypass" <?php if($srchShape == 'bypass' || $srchShape == 'bypass-style' || $srchShape == 'bypass-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="style-filter" class="single-button-container--3t7nn <?php if($srchShape == 'pave' || $srchShape == 'pave-style' || $srchShape == 'pave-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-pave font-competability"></div>
				<span class="label--3ytQP">Pave</span>
				<input type="hidden" class="setting_style" id="setting_style" value="Pave" <?php if($srchShape == 'pave' || $srchShape == 'pave-style' || $srchShape == 'pave-rings'){ echo 'checked="checked"'; } ?>>
			</div> */ ?>
		</div>
	</div>
	<?php /* <div>
		<div style="display:flex;width:100%;margin-bottom:20px;position:relative">
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'asscher'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-asscher font-competability"></div>
				<span class="label--3ytQP">Asscher</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Asscher" <?php if($srchShape == 'asscher'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'cushion' || $srchShape == 'cushion-cut' || $srchShape == 'cushion-cut-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-cushion font-competability"></div>
				<span class="label--3ytQP">Cushion</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Cushion" <?php if($srchShape == 'cushion' || $srchShape == 'cushion-cut' || $srchShape == 'cushion-cut-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'emerald' || $srchShape == 'emerald-cut' || $srchShape == 'emerald-cut-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-emerald font-competability"></div>
				<span class="label--3ytQP">Emerald</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Emerald" <?php if($srchShape == 'emerald' || $srchShape == 'emerald-cut' || $srchShape == 'emerald-cut-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'heart' || $srchShape == 'heart-cut' || $srchShape == 'heart-cut-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-heart2 font-competability"></div>
				<span class="label--3ytQP">Heart</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Heart" <?php if($srchShape == 'heart' || $srchShape == 'heart-cut' || $srchShape == 'heart-cut-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'marquise' || $srchShape == 'marquise-cut' || $srchShape == 'marquise-cut-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-marquise font-competability"></div>
				<span class="label--3ytQP">Marquise</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Marquise" <?php if($srchShape == 'marquise' || $srchShape == 'marquise-cut' || $srchShape == 'marquise-cut-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'oval' || $srchShape == 'oval-cut' || $srchShape == 'oval-cut-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-oval font-competability"></div>
				<span class="label--3ytQP">Oval</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Oval" <?php if($srchShape == 'oval' || $srchShape == 'oval-cut' || $srchShape == 'oval-cut-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'pear' || $srchShape == 'pear-cut' || $srchShape == 'pear-cut-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-pear font-competability"></div>
				<span class="label--3ytQP">Pear</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Pear" <?php if($srchShape == 'pear' || $srchShape == 'pear-cut' || $srchShape == 'pear-cut-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'round' || $srchShape == 'round-cut' || $srchShape == 'round-cut-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-round font-competability"></div>
				<span class="label--3ytQP">Round</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Round" <?php if($srchShape == 'round' || $srchShape == 'round-cut' || $srchShape == 'round-cut-rings'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'square' || $srchShape == 'square-cut' || $srchShape == 'square-cut-rings' || $srchShape == 'princess' || $srchShape == 'princess-cut' || $srchShape == 'princess-cut-rings'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-princess font-competability"></div>
				<span class="label--3ytQP">Princess</span>
				<input type="hidden" class="stone_shape" id="stone_shape" value="Square" <?php if($srchShape == 'square' || $srchShape == 'square-cut' || $srchShape == 'square-cut-rings' || $srchShape == 'princess' || $srchShape == 'princess-cut' || $srchShape == 'princess-cut-rings'){ echo 'checked="checked"'; } ?>>
			</div>
		</div>
	</div> */ ?>
	<div class="metal-filter-container--21LkY">
		<div style="display:flex;width:564px;margin-bottom:20px;position:relative">
			<div data-qa="metal-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-14k-white--1jIYY font-competability"></div>
				<span class="label--3ytQP">14K White</span>
				<input type="hidden" class="metal" id="metal" value="14KW">
			</div>
			<div data-qa="metal-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-18k-white--13d4n font-competability"></div>
				<span class="label--3ytQP">18K White</span>
				<input type="hidden" class="metal" id="metal" value="18KW">
			</div>
			<div data-qa="metal-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-14k-yellow--3O8uJ font-competability"></div>
				<span class="label--3ytQP">14K Yellow</span>
				<input type="hidden" class="metal" id="metal" value="14KY">
			</div>
			<div data-qa="metal-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-18k-yellow--3ffN4 font-competability"></div>
				<span class="label--3ytQP">18K Yellow</span>
				<input type="hidden" class="metal" id="metal" value="18KY">
			</div>
			<div data-qa="metal-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-platinum--i5KLQ font-competability"></div>
				<span class="label--3ytQP">Platinum</span>
				<input type="hidden" class="metal" id="metal" value="PLAT">
			</div>
			<div data-qa="metal-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-14k-rose-gold--3O8uJ font-competability"></div>
				<span class="label--3ytQP">Rose Gold</span>
				<input type="hidden" class="metal" id="metal" value="14KR">
			</div>
		</div>
		<div class="price-filter-container--1oAAC">
			<div class="tooltips--1t3E9">
				<div class="filter-container--3YZym">
					<h2 class="label--3hZu9"><span class="split-label--3OxV3"><span>Price</span><span>(Setting)</span></span></h2>
					<ul class="action-area--KG5gZ">
						<div>
							<div class="sliderContainer">
								<div id="price_slider_range"></div>
								<div class="sliderInputsHolder ">
									<span class="inputContainer notNumberType"><input type="tel" id="amount" class="min-input amount" value="<?php if(isset($_GET['price']) && $_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>" step="0.01" min="100" max="10000"></span>
									<span class="inputContainer notNumberType"><input type="tel" class="max-input amount2" id="amount2" step="0.01" min="100" max="10000" value="9999"></span>
								</div>
							</div>
						</div>
					</ul>
				</div>
				<span style="left:calc(50% + 44px);bottom:72px" class="title-content--mywkl">The price slider is for the SETTING only.</span>
			</div>
		</div>
	</div>
</div>
<div class="settings-filters">
	<div class="control-panel-container">
		<div style="height: 70px;">
			<div class="gallery-filters">
				<div class="buttons-container" style="max-width:286px">
					<div class="button-wrapper">
						<div id="galleryPage_styleFilter" class="filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Style</div>
							<div class="hor-abs filter-cut--3_FOA">All</div>
						</div>
					</div>
					<div class="button-wrapper">
						<div id="galleryPage_metaltypeFilter" class="filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Metal</div>
							<div class="hor-abs filter-cut--3_FOA">All</div>
						</div>
					</div>
					<div class="button-wrapper">
						<div id="galleryPage_priceFilter" class="filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Price</div>
							<div class="hor-abs filter-cut--3_FOA">All</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="gallery-modals"></div>
</div>
<div id="product_results" class="container container1260 xs-noapace listpage-lists-v2-wrap mt-xs-20">
	<div class="listpage-lists-v2 listpage-lists-v2-plus">
		<div class="row cs-row">
			<div class="col-sm-12 result_page_right ">
				<div class="col-sm-5 set_page_subhead"></div>
				<div class="col-sm-5 pull-right text-right"></div>
				<div class="clear"></div>
				<table id="ring_grid" class="display" style="width:100%">
					<thead>
						<tr>
							<th width="100%" style="display:none;">Details</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th style="display:none;">Details</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
$( document ).ready(function() {
	var dataTable = $('#ring_grid').DataTable({
		"serverSide": true,
		'processing': true,
		"lengthMenu": [[10, 20, 30, 40, 50, 100, 200], [10, 20, 30, 40, 50, 100, 200]],
		"pageLength": 20,
		'oLanguage': {"sSearch": "Enter Sku Number:", sProcessing: '<div class="loadingplease" id="loadingplease" style="position: fixed;width: 100vw;height: 100vh;top: 0;left: 0;background-color: rgba(255, 255, 255, 0.9);justify-content: center;align-items: center;"> <img src="https://thumbs.gfycat.com/AnimatedImpureAmericancicada-max-1mb.gif" style="padding-top: 90px;max-width: 100%;"></div>'},
		"ajax":{
			url :"<?php echo SITE_URL; ?>diamonds/overnight_realtime/",
			type: "post",
			'data' : function(data){
				/* Amount */
				var amount_min      = $('#amount').val();
				var amount_max      = $('#amount2').val();

				/* Append to data */
				data.amount_min     = amount_min;
				data.amount_max     = amount_max;

				var categoryArr = []
				$("input:hidden[id=category]:checked").each(function(){
					categoryArr.push($(this).val());
				});

				var stoneShapeArr = []
				$("input:hidden[id=stone_shape]:checked").each(function(){
					stoneShapeArr.push($(this).val());
				});

				var settingStyleArr = []
				$("input:hidden[id=setting_style]:checked").each(function(){
					settingStyleArr.push($(this).val());
				});

				var metalArr = []
				$("input:hidden[id=metal]:checked").each(function(){
					metalArr.push($(this).val());
				});

				var sort_by	= '';
				if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

				data.categoryArr	= categoryArr;
				data.stoneShapeArr	= stoneShapeArr;
				data.settingStyleArr= settingStyleArr;
				data.metalArr		= metalArr;
				data.sort_by		= sort_by;
			},
			error: function(){
				$("#diamond_grid_processing").css("display","none");
			}
		}
	});

    $('#btn-reload').on('click', function(){
    	dataTable.ajax.reload();
    });

	$(".category").on('change', function(){
		dataTable.draw(); 
	});

	$(".stone_shape").on('change', function(){
		if($(this).is(":checked")) {
            $(this).attr('checked','checked');
        }else{
			$(this).removeAttr('checked');
		}
		dataTable.draw(); 
	});

	$(".setting_style").on('change', function(){
		if($(this).is(":checked")) {
            $(this).attr('checked','checked');
        }else{
			$(this).removeAttr('checked');
		}
		dataTable.draw(); 
	});

	$(".metal").on('change', function(){
		if($(this).is(":checked")) {
            $(this).attr('checked','checked');
        }else{
			$(this).removeAttr('checked');
		}
		dataTable.draw(); 
	});

	$('#price_from').keyup(function(){  
		var price_from = $('#price_from').val();
		$('#amount').val(price_from);
		$('#amount').attr('value',price_from);
		dataTable.draw(); 
	});

	$('#price_to').keyup(function(){  
		var price_to = $('#price_to').val();
		$('#amount2').val(price_to);
		$('#amount2').attr('value',price_to);
		dataTable.draw();
	});

	$('#amount').keyup(function(){ 
		var amount = $('#amount').val();
		$('#price_from').val(amount);
		$('#price_from').attr('value',amount);
		dataTable.draw(); 
	});

	$('#amount2').keyup(function(){ 
		var amount2 = $('#amount2').val();
		$('#price_to').val(amount2);
		$('#price_to').attr('value',amount2);
		dataTable.draw(); 
	});

	$("#sort_by").change(function() {
		dataTable.draw();
	});

	$(".amount").change(function() {
		$("#price_slider_range").slider('values',0,$(this).val());
		dataTable.draw();
	});

	$(".amount2").change(function() {
		$("#price_slider_range").slider('values',1,$(this).val());
		dataTable.draw();
	});

	$(".single-button-container--3t7nn").click(function(){
		if($(this).attr('data-qa') == 'metal-filter'){
			if ($(this).find("input#metal").prop('checked')==true){ 
				$(this).find("input#metal").removeAttr('checked');
				$(this).removeClass(" filteractive");
			}else{
				$(this).find("input#metal").attr('checked','checked');
				$(this).addClass(" filteractive");
			}
		}else if($(this).attr('data-qa') == 'style-filter'){	
			if ($(this).find("input#setting_style").prop('checked')==true){ 
				$(this).find("input#setting_style").removeAttr('checked');
				$(this).removeClass(" filteractive");
			}else{
				$(this).find("input#setting_style").attr('checked','checked');
				$(this).addClass(" filteractive");
			}
		}else{
			if ($(this).find("input#stone_shape").prop('checked')==true){ 
				$(this).find("input#stone_shape").removeAttr('checked');
				$(this).removeClass(" filteractive");
			}else{
				$(this).find("input#stone_shape").attr('checked','checked');
				$(this).addClass(" filteractive");
			}
		}
		dataTable.draw();
	});

	$(".cell--2wUTj").click(function(){
		if($(this).attr('data-qa') == 'metal-filter'){
			if ($(this).find("input#metal").prop('checked')==true){ 
				$(this).find("input#metal").removeAttr('checked');
				$(this).removeClass(" filteractive");
			}else{
				$(this).find("input#metal").attr('checked','checked');
				$(this).addClass(" filteractive");
			}
		}else{
			if ($(this).find("input#stone_shape").prop('checked')==true){ 
				$(this).find("input#stone_shape").removeAttr('checked');
				$(this).removeClass(" filteractive");
			}else{
				$(this).find("input#stone_shape").attr('checked','checked');
				$(this).addClass(" filteractive");
			}
		}
		dataTable.draw();
	});

	$( "#price_slider_range" ).slider({
		range: true,
		min: 0,
		max: 9999,
		values: [ <?php if(isset($_GET['price']) && $_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>, 9999 ],
		step: 200,
		start: function( event, ui ) {
			$(ui.handle).find('.ui-slider-tooltip').fadeIn();
		},
		slide: function( event, ui ) {
			$(".amount").val(ui.values[0]);
			$(".amount2").val(ui.values[1]);
			$('.amount').attr('value',ui.values[0]);
			$('.amount2').attr('value',ui.values[1]);
			if(ui.values[0] > 0){
				dataTable.draw();
			}
		}
	});
	$( "#price_slider_range2" ).slider({
		range: true,
		min: 0,
		max: 9999,
		values: [ <?php if(isset($_GET['price']) && $_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>, 9999 ],
		step: 200,
		start: function( event, ui ) {
			$(ui.handle).find('.ui-slider-tooltip').fadeIn();
		},
		slide: function( event, ui ) {
			$(".amount").val(ui.values[0]);
			$(".amount2").val(ui.values[1]);
			$('.amount').attr('value',ui.values[0]);
			$('.amount2').attr('value',ui.values[1]);
			if(ui.values[0] > 0){
				dataTable.draw();
			}
		}
	});
});

function sortFunction(){
	$( "#btn-reload" ).trigger( "click" );
}

function showoverlayin(id){
	$("#thumbnail_"+id).addClass(" active active2");
}

function showoverlayout(id){
	$("#thumbnail_"+id).removeClass(" active active2");
}

function searchDiamondFunc(key, value){
	if(key == 'price'){ 
		$( "#btn-reload" ).trigger( "click" );
	}
}
function bigImg(img,did) {
	$('#img_'+did).attr('src',img);
}

function normalImg(img,did) {
	$('#img_'+did).attr('src',img);
}

function addwhishlist(did) {
	window.location.href = '<?php echo SITE_URL; ?>account/account_wishlist/'+did+'/add/dev_engagement_rings';
}
</script>
<div class="bm-container--1ejdV" id="style_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 0px 10px 10px;">
		<div style="padding-top: 10px;">
			<div class="justify-align ">
				<div class="close-button--2iqUq">
					<a data-qa="close-filters" class="icon-close close-icon--JjGdQ"><span>Close</span></a>
				</div>
				<div data-qa="galleryFilter_resetButton" class="reset-button--5qpIS">
					<a class="icon-reset reset-icon2--1yFZl"><span>Reset</span></a>
				</div>
			</div>
		</div>
		<div class="filter-text--3TADO"><span>Style</span></div>
		<div class="touch scroll-flex">
			<div style="position: relative;">
				<div data-qa="Asscher" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'asscher'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-asscher cell-icon--q1gZD"></div>
						<div data-qa="12_select_shape_popup" class="cell-text--2iwl8">Asscher</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Asscher" <?php if($srchShape == 'asscher'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Cushion" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'cushion' || $srchShape == 'cushion-cut' || $srchShape == 'cushion-cut-rings'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-cushion cell-icon--q1gZD"></div>
						<div data-qa="263_select_shape_popup" class="cell-text--2iwl8">Cushion</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Cushion" <?php if($srchShape == 'cushion' || $srchShape == 'cushion-cut' || $srchShape == 'cushion-cut-rings'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Emerald" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'emerald' || $srchShape == 'emerald-cut' || $srchShape == 'emerald-cut-rings'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-emerald cell-icon--q1gZD"></div>
						<div data-qa="265_select_shape_popup" class="cell-text--2iwl8">Emerald</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Emerald" <?php if($srchShape == 'emerald' || $srchShape == 'emerald-cut' || $srchShape == 'emerald-cut-rings'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Heart" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'heart' || $srchShape == 'heart-cut' || $srchShape == 'heart-cut-rings'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-heart2 cell-icon--q1gZD"></div>
						<div data-qa="13_select_shape_popup" class="cell-text--2iwl8">Heart</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Heart" <?php if($srchShape == 'heart' || $srchShape == 'heart-cut' || $srchShape == 'heart-cut-rings'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Marquise" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'marquise' || $srchShape == 'marquise-cut' || $srchShape == 'marquise-cut-rings'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-marquise cell-icon--q1gZD"></div>
						<div data-qa="345_select_shape_popup" class="cell-text--2iwl8">Marquise</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Marquise" <?php if($srchShape == 'marquise' || $srchShape == 'marquise-cut' || $srchShape == 'marquise-cut-rings'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Oval" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'oval' || $srchShape == 'oval-cut' || $srchShape == 'oval-cut-rings'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-oval cell-icon--q1gZD"></div>
						<div data-qa="122_select_shape_popup" class="cell-text--2iwl8">Oval</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Oval" <?php if($srchShape == 'oval' || $srchShape == 'oval-cut' || $srchShape == 'oval-cut-rings'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Pear" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'pear' || $srchShape == 'pear-cut' || $srchShape == 'pear-cut-rings'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-pear cell-icon--q1gZD"></div>
						<div data-qa="491_select_shape_popup" class="cell-text--2iwl8">Pear</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Pear" <?php if($srchShape == 'pear' || $srchShape == 'pear-cut' || $srchShape == 'pear-cut-rings'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Round" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'round' || $srchShape == 'round-cut' || $srchShape == 'round-cut-rings'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-round cell-icon--q1gZD"></div>
						<div data-qa="492_select_shape_popup" class="cell-text--2iwl8">Round</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Round" <?php if($srchShape == 'round' || $srchShape == 'round-cut' || $srchShape == 'round-cut-rings'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Princess" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'square' || $srchShape == 'square-cut' || $srchShape == 'square-cut-rings' || $srchShape == 'princess' || $srchShape == 'princess-cut' || $srchShape == 'princess-cut-rings'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-princess cell-icon--q1gZD"></div>
						<div data-qa="492_select_shape_popup" class="cell-text--2iwl8">Princess</div>
						<input type="hidden" class="stone_shape" id="stone_shape" value="Square" <?php if($srchShape == 'square' || $srchShape == 'square-cut' || $srchShape == 'square-cut-rings' || $srchShape == 'princess' || $srchShape == 'princess-cut' || $srchShape == 'princess-cut-rings'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bm-container--1ejdV" id="metal_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 10px;">
		<div class="justify-align ">
			<div class="close-button--2iqUq">
				<a data-qa="close-filters" class="icon-close close-icon--JjGdQ"><span>Close</span></a>
			</div>
			<div data-qa="galleryFilter_resetButton" class="reset-button--5qpIS">
				<a class="icon-reset reset-icon2--1yFZl"><span>Reset</span></a>
			</div>
		</div>
		<div class="filter-text--3TADO"><span>Metal</span></div>
		<div class="flex-style--2kyhW">
			<div style="position: relative;">
				<div data-qa="metal-filter" class="cell--2wUTj metaltype-icon-style--39YUT">
					<div>
						<div class="cell-icon--q1gZD bg-metal-14k-white--3Yr3o"></div>
						<div data-qa="wg14_select_shape_popup" class="cell-text--2iwl8">14K White</div>
						<input type="hidden" class="metal" id="metal" value="14KW">
					</div>
				</div>
				<div data-qa="metal-filter" class="cell--2wUTj metaltype-icon-style--39YUT">
					<div>
						<div class="cell-icon--q1gZD bg-metal-18k-white--p50JW"></div>
						<div data-qa="wg18_select_shape_popup" class="cell-text--2iwl8">18K White</div>
						<input type="hidden" class="metal" id="metal" value="18KW">
					</div>
				</div>
				<div data-qa="metal-filter" class="cell--2wUTj metaltype-icon-style--39YUT">
					<div>
						<div class="cell-icon--q1gZD bg-metal-14k-yellow--Q_Od6"></div>
						<div data-qa="y14_select_shape_popup" class="cell-text--2iwl8">14K Yellow</div>
						<input type="hidden" class="metal" id="metal" value="14KY">
					</div>
				</div>
				<div data-qa="metal-filter" class="cell--2wUTj metaltype-icon-style--39YUT">
					<div>
						<div class="cell-icon--q1gZD bg-metal-18k-yellow--3TmCQ"></div>
						<div data-qa="y_select_shape_popup" class="cell-text--2iwl8">18K Yellow</div>
						<input type="hidden" class="metal" id="metal" value="18KY">
					</div>
				</div>
				<div data-qa="metal-filter" class="cell--2wUTj metaltype-icon-style--39YUT">
					<div>
						<div class="cell-icon--q1gZD bg-metal-platinum--3SaPb"></div>
						<div data-qa="p_select_shape_popup" class="cell-text--2iwl8">Platinum</div>
						<input type="hidden" class="metal" id="metal" value="PLAT">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bm-container--1ejdV" id="price_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 10px;">
		<div class="justify-align ">
			<div class="close-button--2iqUq">
				<a data-qa="close-filters" class="icon-close close-icon--JjGdQ"><span>Close</span></a>
			</div>
			<div data-qa="galleryFilter_resetButton" class="reset-button--5qpIS"><a class="icon-reset reset-icon2--1yFZl"><span>Reset</span></a></div>
		</div>
		<div class="filter-text--3TADO"><span>Setting Price</span></div>
		<div class="filter-padding">
			<div>
				<div class="sliderContainer">
					<div class="sliderInputsHolder ">
						<span class="inputContainer notNumberType"><input type="tel" id="amount" class="min-input amount" value="<?php if(isset($_GET['price']) && $_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>" step="0.01" min="100" max="10000"></span>
						<span class="inputContainer notNumberType"><input type="tel" class="max-input amount2" id="amount2" step="0.01" min="100" max="10000" value="9999"></span>
					</div>
					<div id="price_slider_range2"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#galleryPage_styleFilter").click(function(){
		$("#metal_model").css("display", "none");
		$("#price_model").css("display", "none");
		if($("#style_model").css("display") == "none") { 
			$("#style_model").css("display", "block");
		}else{
			$("#style_model").css("display", "none");
		}
	});
	$("#galleryPage_metaltypeFilter").click(function(){
		$("#price_model").css("display", "none");
		$("#style_model").css("display", "none");
		if($("#metal_model").css("display") == "none") { 
			$("#metal_model").css("display", "block");
		}else{
			$("#metal_model").css("display", "none");
		}
	});
	$("#galleryPage_priceFilter").click(function(){
		$("#metal_model").css("display", "none");
		$("#style_model").css("display", "none");
		if($("#price_model").css("display") == "none") { 
			$("#price_model").css("display", "block");
		}else{
			$("#price_model").css("display", "none");
		}
	});
	$(".close-button--2iqUq").click(function(){
		$("#metal_model").css("display", "none");
		$("#style_model").css("display", "none");
		$("#price_model").css("display", "none");
	});
});
</script>