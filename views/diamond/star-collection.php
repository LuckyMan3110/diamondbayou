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
$srchCat = '';
if(!empty($srchShape) && $srchShape == 'antique'){
	$srchShape	= 'engagement-rings';
	$srchCat	= '3043';
}elseif(!empty($srchShape) && $srchShape == 'three-stone'){
	$srchShape	= 'engagement-rings';
	$srchCat	= '3049';
}elseif(!empty($srchShape) && $srchShape == 'oval'){
	$srchShape	= 'color-stone-rings';
	$srchCat	= '2947';
}elseif(!empty($srchShape) && $srchShape == 'halo'){
	$srchShape	= 'engagement-rings';
	$srchCat	= '3065';
}elseif(!empty($srchShape) && $srchShape == 'emerald'){
	$srchShape	= 'color-stone-rings';
	$srchCat	= '2949';
}elseif(!empty($srchShape) && $srchShape == 'vintage'){
	$srchShape	= 'fancy-rings';
	$srchCat	= '2888';
}elseif(!empty($srchShape) && $srchShape == 'men-wedding-bands'){
	$srchShape	= 'mens-rings';
	$srchCat	= '2943';
}elseif(!empty($srchShape) && $srchShape == 'solitaire'){
	$srchShape	= 'mens-rings';
	$srchCat	= '2944';
}elseif(!empty($srchShape) && $srchShape == 'fancy-styles'){
	$srchShape	= 'mens-rings';
	$srchCat	= '2945';
}elseif(!empty($srchShape) && $srchShape == 'diamond-bands'){
	$srchShape	= 'wedding-bands';
	$srchCat	= '3167';
}elseif(!empty($srchShape) && $srchShape == 'band-sets'){
	$srchShape	= 'wedding-bands';
	$srchCat	= '3186';
}elseif(!empty($srchShape) && $srchShape == 'traditional-bands'){
	$srchShape	= 'wedding-bands';
	$srchCat	= '3190';
}elseif(!empty($srchShape) && $srchShape == 'eternity-bands'){
	$srchShape	= 'wedding-bands';
	$srchCat	= '3212';
}
?>
<input type="hidden" class="category" id="category" value="Bypass" <?php if($srchShape == 'bypass'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Classic" <?php if($srchShape == 'classic'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Cluster Sides" <?php if($srchShape == 'cluster-sides'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Emerald" <?php if($srchShape == 'emerald'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Fancy Shape" <?php if($srchShape == 'fancy-shape'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Heads" <?php if($srchShape == 'heads'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Heart" <?php if($srchShape == 'heart'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Infinity" <?php if($srchShape == 'infinity'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Marquise" <?php if($srchShape == 'marquise'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Multi Row" <?php if($srchShape == 'multi-row'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="New Bridal" <?php if($srchShape == 'new-bridal'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Non Halo" <?php if($srchShape == 'non-halo'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Oval" <?php if($srchShape == 'oval'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Pear" <?php if($srchShape == 'pear'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Petite" <?php if($srchShape == 'petite'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Remounts" <?php if($srchShape == 'remounts'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Semi Mount" <?php if($srchShape == 'semi-mount'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Solitaires" <?php if($srchShape == 'solitaires'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Solitaires Plus" <?php if($srchShape == 'solitaires-plus'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Split Shank" <?php if($srchShape == 'split-shank'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Stackable" <?php if($srchShape == 'stackable'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Trellis" <?php if($srchShape == 'trellis'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Twisted Shank" <?php if($srchShape == 'twisted-shank'){ echo 'checked="checked"'; } ?>>

<input type="hidden" class="stone_shape" id="stone_shape" value="Complete" <?php if($srchShape == 'complete' || $srchShape == 'complete-cut' || $srchShape == 'complete-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Cushion" <?php if($srchShape == 'cushion' || $srchShape == 'cushion-cut' || $srchShape == 'cushion-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Emerald Cut" <?php if($srchShape == 'emerald' || $srchShape == 'emerald-cut' || $srchShape == 'emerald-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Heart" <?php if($srchShape == 'heart' || $srchShape == 'heart-cut' || $srchShape == 'heart-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Marquise" <?php if($srchShape == 'marquise' || $srchShape == 'marquise-cut' || $srchShape == 'marquise-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Oval Cut" <?php if($srchShape == 'oval' || $srchShape == 'oval-cut' || $srchShape == 'oval-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Pear Shape" <?php if($srchShape == 'pear' || $srchShape == 'pear-cut' || $srchShape == 'pear-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Polished Blank (no stones)" <?php if($srchShape == 'polished' || $srchShape == 'polished-cut' || $srchShape == 'polished-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Princess" <?php if($srchShape == 'princess' || $srchShape == 'princess-cut' || $srchShape == 'princess-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Round" <?php if($srchShape == 'round' || $srchShape == 'round-cut' || $srchShape == 'round-cut-rings'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="stone_shape" id="stone_shape" value="Semi-mount" <?php if($srchShape == 'semi-mount' || $srchShape == 'semi-mount-cut' || $srchShape == 'semi-mount-cut-rings'){ echo 'checked="checked"'; } ?>>
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
#ring_grid_length{display:none}
#sort_by{display:none}
#ring_grid_filter{display:none}
table#ring_grid tbody tr{width:25%;float:left;padding:0;margin:0;background:none}
table#ring_grid tbody tr td{background:none;padding:0;margin:0;border:none}
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
.listpage-lists-v2 .thumbnail-out{min-height:280px!important;height:100%!important}
}
</style>
<div class="container container1170 ">
	<ol class="breadcrumb">
		<li><a href="<?= SITE_URL ?>diamonds/engagement-rings"><span>Engagement Rings</span></a></li>
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
			<div data-qa="Solitaire" class="single-button-container--3t7nn <?php if($srchShape == 'solitaire'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-solitaire font-competability"></div>
				<span class="label--3ytQP">Solitaire</span>
				<input type="hidden" class="category" id="category" value="Solitaire" <?php if($srchShape == 'solitaire'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="Pave" class="single-button-container--3t7nn <?php if($srchShape == 'pave'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-pave font-competability"></div>
				<span class="label--3ytQP">Pavé</span>
				<input type="hidden" class="category" id="category" value="Pave" <?php if($srchShape == 'pave'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="Single Row" class="single-button-container--3t7nn <?php if($srchShape == 'single-row'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-channel font-competability"></div>
				<span class="label--3ytQP">Single Row</span>
				<input type="hidden" class="category" id="category" value="Single Row" <?php if($srchShape == 'single-row'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="Side Stone" class="single-button-container--3t7nn <?php if($srchShape == 'side-stones'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-side-stone font-competability"></div>
				<span class="label--3ytQP">Side-Stone</span>
				<input type="hidden" class="category" id="category" value="Side Stone" <?php if($srchShape == 'side-stones'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="Three-Stone" class="single-button-container--3t7nn <?php if($srchShape == 'three-stone'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-tree-stone font-competability"></div>
				<span class="label--3ytQP">Three-Stone</span>
				<input type="hidden" class="category" id="category" value="Three Stone" <?php if($srchShape == 'three-stone'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="Tension" class="single-button-container--3t7nn <?php if($srchShape == 'tension'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-tension font-competability"></div>
				<span class="label--3ytQP">Tension</span>
				<input type="hidden" class="category" id="category" value="Tension" <?php if($srchShape == 'tension'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="Halo" class="single-button-container--3t7nn <?php if($srchShape == 'halo'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-halo font-competability"></div>
				<span class="label--3ytQP">Halo</span>
				<input type="hidden" class="category" id="category" value="Halo" <?php if($srchShape == 'halo'){ echo 'checked="checked"'; } ?>>
			</div>
			<div data-qa="Vintage" class="single-button-container--3t7nn <?php if($srchShape == 'vintage'){ echo 'filteractive'; } ?>">
				<div class="single-image--12J3l icon-vintage font-competability"></div>
				<span class="label--3ytQP">Vintage</span>
				<input type="hidden" class="category" id="category" value="Vintage" <?php if($srchShape == 'vintage'){ echo 'checked="checked"'; } ?>>
			</div>
			<div class="designers-wrapper--22ISL">
				<div data-qa="designers-filter" class="single-button-container--3t7nn">
					<div class="background-css--WFvgz icon-designers--1f9vt font-competability"></div>
					<span class="label--3ytQP">Special Collections</span>
				</div>
			</div>
		</div>
	</div>
	<div class="metal-filter-container--21LkY">
		<div style="display:flex;width:564px;margin-bottom:20px;position:relative">
			<div data-qa="14k-white-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-14k-white--1jIYY font-competability"></div>
				<span class="label--3ytQP">14K White</span>
			</div>
			<div data-qa="18k-white-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-18k-white--13d4n font-competability"></div>
				<span class="label--3ytQP">18K White</span>
			</div>
			<div data-qa="14k-yellow-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-14k-yellow--3O8uJ font-competability"></div>
				<span class="label--3ytQP">14K Yellow</span>
			</div>
			<div data-qa="18k-yellow-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-18k-yellow--3ffN4 font-competability"></div>
				<span class="label--3ytQP">18K Yellow</span>
			</div>
			<div data-qa="platinum-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-platinum--i5KLQ font-competability"></div>
				<span class="label--3ytQP">Platinum</span>
			</div>
			<div data-qa="rose-gold-filter" class="single-button-container--3t7nn">
				<div class="background-css--WFvgz bg-metal-rose--33syK font-competability"></div>
				<span class="label--3ytQP">Rose Gold</span>
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
<?php
$seg1 = $this->uri->segment(3); $wherein0 = 0;
if(isset($seg1) && !empty($seg1) && $seg1 == 'new-arrivals'){
	$wherein0 = 3149;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'best-sellers'){
	$wherein0 = 3148;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'color-stone-rings'){
	$wherein0 = 2946;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'engagement-rings'){
	$wherein0 = 3042;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'engagement-sets'){
	$wherein0 = 3000;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'fancy-rings'){
	$wherein0 = 2886;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'fashion'){
	$wherein0 = 3230;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'findings'){
	$wherein0 = 2955;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'mens-rings'){
	$wherein0 = 2942;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'pendants'){
	$wherein0 = 2932;
}elseif(isset($seg1) && !empty($seg1) && $seg1 == 'wedding-bands'){
	$wherein0 = 3085;
}
?>
<script>
$( document ).ready(function() {
	var dataTable = $('#ring_grid').DataTable({
		"serverSide": true,
		'processing': true,
		"lengthMenu": [[10, 20, 30, 40, 50, 100, 200], [10, 20, 30, 40, 50, 100, 200]],
		"pageLength": 20,
		'oLanguage': {"sSearch": "Enter Sku Number:", sProcessing: '<div class="loadingplease" id="loadingplease" style="position: fixed;width: 100vw;height: 100vh;top: 0;left: 0;background-color: rgba(255, 255, 255, 0.9);justify-content: center;align-items: center;"> <img src="https://thumbs.gfycat.com/AnimatedImpureAmericancicada-max-1mb.gif" style="padding-top: 90px;max-width: 100%;"></div>'},
		"ajax":{
			url :"<?php echo SITE_URL; ?>diamonds/star_collection_realtime/<?php echo $wherein0;?>",
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

				var sort_by	= '';
				if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

				data.categoryArr	= categoryArr;
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
		if ($(this).find("input#category").prop('checked')==true){ 
			$(this).find("input#category").removeAttr('checked');
			$(this).removeClass(" filteractive");
		}else{
			$(this).find("input#category").attr('checked','checked');
			$(this).addClass(" filteractive");
		}
		dataTable.draw();
	});

	/* price_slider_range */
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

	$(".cell--2wUTj").click(function(){
		if ($(this).find("input#category").prop('checked')==true){ 
			$(this).find("input#category").removeAttr('checked');
			$(this).removeClass(" filteractive");
		}else{
			$(this).find("input#category").attr('checked','checked');
			$(this).addClass(" filteractive");
		}
		dataTable.draw();
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
				<div data-qa="Solitaire" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'solitaire'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-solitaire cell-icon--q1gZD"></div>
						<div data-qa="12_select_shape_popup" class="cell-text--2iwl8">Solitaire</div>
						<input type="hidden" class="category" id="category" value="Solitaire" <?php if($srchShape == 'solitaire'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Pave" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'pave'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-pave  cell-icon--q1gZD"></div>
						<div data-qa="263_select_shape_popup" class="cell-text--2iwl8">Pavé</div>
						<input type="hidden" class="category" id="category" value="Pave" <?php if($srchShape == 'pave'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Single Row" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'single-row'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-channel  cell-icon--q1gZD"></div>
						<div data-qa="265_select_shape_popup" class="cell-text--2iwl8">Single Row</div>
						<input type="hidden" class="category" id="category" value="Single Row" <?php if($srchShape == 'single-row'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Side Stone" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'side-stones'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-side-stone  cell-icon--q1gZD"></div>
						<div data-qa="13_select_shape_popup" class="cell-text--2iwl8">Side-Stone</div>
						<input type="hidden" class="category" id="category" value="Side Stone" <?php if($srchShape == 'side-stones'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Three-Stone" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'three-stone'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-tension  cell-icon--q1gZD"></div>
						<div data-qa="345_select_shape_popup" class="cell-text--2iwl8">Tension</div>
						<input type="hidden" class="category" id="category" value="Three Stone" <?php if($srchShape == 'three-stone'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Tension" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'tension'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-tree-stone  cell-icon--q1gZD"></div>
						<div data-qa="122_select_shape_popup" class="cell-text--2iwl8">Three-Stone</div>
						<input type="hidden" class="category" id="category" value="Tension" <?php if($srchShape == 'tension'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Halo" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'halo'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-halo  cell-icon--q1gZD"></div>
						<div data-qa="491_select_shape_popup" class="cell-text--2iwl8">Halo</div>
						<input type="hidden" class="category" id="category" value="Halo" <?php if($srchShape == 'halo'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div data-qa="Vintage" class="cell--2wUTj style-icon-style--nVX2r <?php if($srchShape == 'vintage'){ echo 'filteractive'; } ?>">
					<div>
						<div class="icon-vintage  cell-icon--q1gZD"></div>
						<div data-qa="492_select_shape_popup" class="cell-text--2iwl8">Vintage</div>
						<input type="hidden" class="category" id="category" value="Vintage" <?php if($srchShape == 'vintage'){ echo 'checked="checked"'; } ?>>
					</div>
				</div>
				<div style="font-size: 11px; color: rgb(101, 101, 101); margin-top: 14px; margin-left: 3px; text-align: center;">Designer Collections</div>
				<div class="cell--2wUTj style-icon-style--nVX2r"><div><div class="cell-icon--q1gZD bg-verragio--3USMD"></div><div data-qa="534_select_shape_popup" class="cell-text--2iwl8">Verragio</div></div></div>
				<div class="cell--2wUTj style-icon-style--nVX2r"><div><div class="cell-icon--q1gZD bg-danhov--2nC-1"></div><div data-qa="531_select_shape_popup" class="cell-text--2iwl8">Danhov</div></div></div>
				<div class="cell--2wUTj style-icon-style--nVX2r"><div><div class="cell-icon--q1gZD bg-martin-flyer--3GYeW"></div><div data-qa="533_select_shape_popup" class="cell-text--2iwl8">Martin Flyer</div></div></div>
				<div class="cell--2wUTj style-icon-style--nVX2r"><div><div class="cell-icon--q1gZD bg-jeff-cooper--p7acm"></div><div data-qa="532_select_shape_popup" class="cell-text--2iwl8">Jeff Cooper</div></div></div>
				<div class="cell--2wUTj style-icon-style--nVX2r"><div><div class="cell-icon--q1gZD bg-unique--1Xwmz"></div><div data-qa="493_select_shape_popup" class="cell-text--2iwl8">Unique</div></div></div>
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
				<div class="cell--2wUTj metaltype-icon-style--39YUT">
					<div>
						<div class="cell-icon--q1gZD bg-metal-14k-white--3Yr3o"></div>
						<div data-qa="wg14_select_shape_popup" class="cell-text--2iwl8">14K White</div>
					</div>
				</div>
				<div class="cell--2wUTj metaltype-icon-style--39YUT"><div><div class="cell-icon--q1gZD bg-metal-18k-white--p50JW"></div><div data-qa="wg18_select_shape_popup" class="cell-text--2iwl8">18K White</div></div></div>
				<div class="cell--2wUTj metaltype-icon-style--39YUT"><div><div class="cell-icon--q1gZD bg-metal-14k-yellow--Q_Od6"></div><div data-qa="y14_select_shape_popup" class="cell-text--2iwl8">14K Yellow</div></div></div>
				<div class="cell--2wUTj metaltype-icon-style--39YUT"><div><div class="cell-icon--q1gZD bg-metal-18k-yellow--3TmCQ"></div><div data-qa="y_select_shape_popup" class="cell-text--2iwl8">18K Yellow</div></div></div>
				<div class="cell--2wUTj metaltype-icon-style--39YUT"><div><div class="cell-icon--q1gZD bg-metal-platinum--3SaPb"></div><div data-qa="p_select_shape_popup" class="cell-text--2iwl8">Platinum</div></div></div>
				<div class="cell--2wUTj metaltype-icon-style--39YUT"><div><div class="cell-icon--q1gZD bg-metal-rose--134Mo"></div><div data-qa="rg_select_shape_popup" class="cell-text--2iwl8">Rose Gold</div></div></div>
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
