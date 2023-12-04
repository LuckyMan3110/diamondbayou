<?php
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
<input type="hidden" class="category" id="category" value="Color Fashion" <?php if($srchShape == 'color-fashion'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Diamond Fashion" <?php if($srchShape == 'diamond-fashion'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Bridal Completes" <?php if($srchShape == 'finished-bridal'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Wedding Bands" <?php if($srchShape == 'wedding-bands'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="New Arrivals" <?php if($srchShape == 'new-arrivals'){ echo 'checked="checked"'; } ?>>
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
.filteractive{border:1px solid #8e1010 !important}
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
.galleryContainer--1hbna{display:none}
}
</style>
<div class="container container1170 ">
	<ol class="breadcrumb">
		<li><a href="<?= SITE_URL ?>"><span>Home</span></a></li>
		<li class="active">FINE JEWELRY COLLECTION</li>
	</ol>
</div>

<div class="galleryContainer--1hbna">
	<div class="header-image--3l9rh"></div>
	<div class="header-description-wrapper--Lksq6">
		<div class="header-first--3qUms">THE MUST-HAVES</div>
		<div class="header-second--1eMl0">FINE JEWELRY COLLECTION</div>
		<div style="display:flex;align-items:center;flex-direction:column;max-width:1280px;min-width:960px">
			<div style="display:flex">
				<div data-qa="earring_filter-fine_jewelry" class="buttonContainer--3pdft">
					<div class="icon-filtered filtered--2tEj0"></div>
					<div class="icon--10LqF icon-Studs2--1Saqn"></div>
					<h2 class="label--2C0aM">Earrings</h2>
					<input type="hidden" class="category" id="category" value="Earrings">
				</div>
				<div data-qa="necklaces_filter-fine_jewelry" class="buttonContainer--3pdft">
					<div class="icon--10LqF icon-Pendants--2RN9E"></div>
					<h2 class="label--2C0aM">Necklaces</h2>
					<input type="hidden" class="category" id="category" value="Necklaces">
				</div>
				<div data-qa="bracelets_filter-fine_jewelry" class="buttonContainer--3pdft">
					<div class="icon--10LqF icon-Bracelets--1xQWS"></div>
					<h2 class="label--2C0aM">Bracelets</h2>
					<input type="hidden" class="category" id="category" value="Bracelets">
				</div>
				<div data-qa="rings_filter-fine_jewelry" class="buttonContainer--3pdft">
					<div class="icon--10LqF icon-Royal_ring--2wUwo"></div>
					<h2 class="label--2C0aM">Rings</h2>
					<input type="hidden" class="category" id="category" value="Rings">
				</div>
			</div>
			<div style="display:flex;margin-top:46px;margin-bottom:43px">
				<div class="pairs-filters--2bpAS">
					<ul class="pairs-filters-list--1Jrzy">
						<div class="spacing--3jzJB">
							<div data-qa="stones_filter" class="container--1ysjl">
								<span style="width:122px" class="wideButtonContainer--3vgEq">Stones<!-- --> </span>
								<div id="stones_filter" style="position: relative; width: 122px;opacity: 0;">
									<div class="dropdownContentContainer--3yyfC startFromLeft--2gHMC" style="height:500px; width: 540px;">
										<div data-qa="all_stone_types-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;">
											<div style="display: flex; align-items: center;">
												<span class="checkbox--oY5L5"></span>
												<span class="checkboxLabel--1FU0f">All Stone Types</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;">
											<div style="display: flex; align-items: center;">
												<span class="checkbox--oY5L5"></span>
												<span class="checkboxLabel--1FU0f">Diamond</span>
											</div>
											<div class="icon--2K1-Y icon-diamond--T9Roa"></div>
										</div>
										<div data-qa="amethyst-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;">
											<div style="display: flex; align-items: center;">
												<span class="checkbox--oY5L5"></span>
												<span class="checkboxLabel--1FU0f">Amethyst</span>
											</div>
											<div class="icon--2K1-Y icon-amethyst-gemstone--fM9AL"></div>
										</div>
										<div data-qa="aquamarine-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;">
											<div style="display: flex; align-items: center;">
												<span class="checkbox--oY5L5"></span>
												<span class="checkboxLabel--1FU0f">Aquamarine</span>
											</div>
											<div class="icon--2K1-Y icon-aquamarine-gemstone--1PlST"></div>
										</div>
										<div data-qa="blue_sapphire-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;">
											<div style="display: flex; align-items: center;">
												<span class="checkbox--oY5L5"></span>
												<span class="checkboxLabel--1FU0f">Blue Sapphire</span>
											</div>
											<div class="icon--2K1-Y icon-sapphire-gemstone--26eaQ"></div>
										</div>
										<div data-qa="blue_topaz-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Blue Topaz</span></div><div class="icon--2K1-Y icon-blueTopaz-gemstone--1cS9a"></div></div>
										<div data-qa="citrine-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Citrine</span></div><div class="icon--2K1-Y icon-citrine-gemstone--2tyTP"></div></div>
										<div data-qa="emerald-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Emerald</span></div><div class="icon--2K1-Y icon-emerald-gemstone--HDFsL"></div></div>
										<div data-qa="garnet-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Garnet</span></div><div class="icon--2K1-Y icon-garnet-gemstone--1CqUq"></div></div>
										<div data-qa="moon_quartz-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Moon Quartz</span></div><div class="icon--2K1-Y icon-moonQuartz-gemstone--IQCSk"></div></div>
										<div data-qa="morganite-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Morganite</span></div><div class="icon--2K1-Y icon-morganite-gemstone--3z8pP"></div></div>
										<div data-qa="opal-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Opal</span></div><div class="icon--2K1-Y icon-opal-gemstone--1-k87"></div></div>
										<div data-qa="peridot-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Peridot</span></div><div class="icon--2K1-Y icon-peridot-gemstone--1gYxk"></div></div>
										<div data-qa="pink_sapphire-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Pink Sapphire</span></div><div class="icon--2K1-Y icon-pinkSapphire-gemstone--3Kwo6"></div></div>
										<div data-qa="pink_tourmaline-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Pink Tourmaline</span></div><div class="icon--2K1-Y icon-pinkTourmaline-gemstone--3PnCK"></div></div>
										<div data-qa="prasiolite-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Prasiolite</span></div><div class="icon--2K1-Y icon-prasiolite-gemstone--1TpP2"></div></div>
										<div data-qa="ruby-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Ruby</span></div><div class="icon--2K1-Y icon-ruby-gemstone--HdPyj"></div></div>
										<div data-qa="tanzanite_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Tanzanite</span></div><div class="icon--2K1-Y icon-tanzanite-gemstone--WlVVE"></div></div>
										<div data-qa="tsavorite_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Tsavorite</span></div><div class="icon--2K1-Y icon-tsavorite-gemstone--1GE--"></div></div>
										<div data-qa="turquoise-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Turquoise</span></div><div class="icon--2K1-Y icon-turquoise-gemstone--1bBVS"></div></div>
										<div data-qa="multi-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Multi</span></div><div class="icon--2K1-Y icon-multi-gemstone--1OnY9"></div></div>
										<div data-qa="others-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Others</span></div><div class="icon--2K1-Y icon-others-gemstone--2bUhV"></div></div>
										<div data-qa="no-stone-stones_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 50px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">No Stone</span></div><div class="icon--2K1-Y icon-no-stone--2pRCc"></div></div>
									</div>
								</div>
							</div>
						</div>
						<div class="spacing--3jzJB">
							<div data-qa="metal_filter" class="container--1ysjl">
								<span style="width:122px" class="wideButtonContainer--3vgEq">Metal<!-- --> </span>
								<div id="metal_filter" style="position: relative; width: 122px;opacity: 0;">
									<div class="dropdownContentContainer--3yyfC" style="height:280px; width: 250px;">
										<div data-qa="wg14-metal_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 0px;">
											<div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">14K White Gold</span></div>
											<div class="icon--2K1-Y bg-metal-14k-white--1H1OH"></div>
										</div>
										<div data-qa="wg18-metal_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 0px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">18K White Gold</span></div><div class="icon--2K1-Y bg-metal-18k-white--2cjrn"></div></div>
										<div data-qa="y14-metal_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 0px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">14K Yellow Gold</span></div><div class="icon--2K1-Y bg-metal-14k-yellow--3OF3x"></div></div>
										<div data-qa="y18-metal_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 0px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">18K Yellow Gold</span></div><div class="icon--2K1-Y bg-metal-18k-yellow--2GWIs"></div></div>
										<div data-qa="platinum-metal_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 0px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Platinum</span></div><div class="icon--2K1-Y bg-metal-platinum--1LFhI"></div></div>
										<div data-qa="rose_gold-metal_filter" class="item--1o26L" style="width: 222px; height: 38px; margin-right: 0px;"><div style="display: flex; align-items: center;"><span class="checkbox--oY5L5"></span><span class="checkboxLabel--1FU0f">Rose Gold</span></div><div class="icon--2K1-Y bg-metal-rose--1KdBC"></div></div>
									</div>
								</div>
							</div>
						</div>
						<div class="spacing--3jzJB">
							<div data-qa="price_filter" class="container--1ysjl">
								<span style="width:122px" class="wideButtonContainer--3vgEq">Price<!-- --> </span>
								<div id="price_filter" style="position: relative; width: 122px;opacity: 0;">
									<div class="dropdownContentContainer--3yyfC" style="height:145px;width:360px;">
										<div>
											<div class="dropdownContentTitle--1lJ5Y">Price Range</div>
											<div class="sliderContainer">
												<div id="price_slider_range"></div>
												<div class="sliderInputsHolder ">
													<span class="inputContainer notNumberType"><input type="tel" id="amount" class="min-input amount" value="<?php if(isset($_GET['price']) && $_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>" step="0.01" min="100" max="10000"></span>
													<span class="inputContainer notNumberType"><input type="tel" class="max-input amount2" id="amount2" step="0.01" min="100" max="10000" value="9999"></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$(".container--1ysjl").click(function(){
		$("#stones_filter").css("opacity", "0");
		$("#metal_filter").css("opacity", "0");
		$("#price_filter").css("opacity", "0");
		if($(this).attr("data-qa") == "stones_filter"){
			if($("#stones_filter").css("opacity") == "1"){
				$("#stones_filter").css("opacity", "0");
			}else{
				$("#stones_filter").css("opacity", "1");
			}
		}else if($(this).attr("data-qa") == "metal_filter"){
			if($("#metal_filter").css("opacity") == "1"){
				$("#metal_filter").css("opacity", "0");
			}else{
				$("#metal_filter").css("opacity", "1");
			}
		}else if($(this).attr("data-qa") == "price_filter"){
			if($("#price_filter").css("opacity") == "1"){
				$("#price_filter").css("opacity", "0");
			}else{
				$("#price_filter").css("opacity", "1");
			}
		}
	});
});
</script>

<div class="fine-jewel-filters">
	<div data-qa="galleryTitleContainer" class="headerContainer--3L0NZ">
		<div class="titleContainer--3_wji"><h1>Fine Jewelry </h1></div>
	</div>
	<div class="control-panel-container">
		<div style="height: 120px;">
			<div class="gallery-filters">
				<div class="buttons-container" style="max-width:286px">
					<div class="button-wrapper abc">
						<div id="galleryPage_componentidsFilter" class="big-button--3u7a- filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Jewelry</div>
							<div class="hor-abs filter-cut--3_FOA">All</div>
						</div>
					</div>
					<div class="button-wrapper abc">
						<div id="galleryPage_stonesFilter" class="big-button--3u7a- filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Stone</div>
							<div class="hor-abs filter-cut--3_FOA">All</div>
						</div>
					</div>
					<div class="button-wrapper abc">
						<div id="galleryPage_metalidsFilter" class="big-button--3u7a- filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Metal</div>
							<div class="hor-abs filter-cut--3_FOA">All</div>
						</div>
					</div>
					<div class="button-wrapper abc">
						<div id="galleryPage_priceFilter" class="big-button--3u7a- filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Price</div>
							<div class="hor-abs filter-cut--3_FOA">All</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
			url :"<?php echo SITE_URL; ?>diamonds/fine_jewelry_carol_realtime/",
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

				var caratWeightArr = []
				$("input:checkbox[id=carat_weight]:checked").each(function(){
					caratWeightArr.push($(this).val());
				});

				var stoneShapeArr = []
				$("input:checkbox[id=stone_shape]:checked").each(function(){
					stoneShapeArr.push($(this).val());
				});

				var stoneSizeArr = []
				$("input:checkbox[id=stone_size]:checked").each(function(){
					stoneSizeArr.push($(this).val());
				});

				var subCategoryArr = []
				$("input:checkbox[id=sub_category]:checked").each(function(){
					subCategoryArr.push($(this).val());
				});

				var sort_by	= '';
				if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

				data.categoryArr	= categoryArr;
				data.caratWeightArr	= caratWeightArr;
				data.stoneShapeArr	= stoneShapeArr;
				data.stoneSizeArr	= stoneSizeArr;
				data.subCategoryArr = subCategoryArr;
				data.sort_by		= sort_by;
			},
			error: function(){
				$("#ring_grid_processing").css("display","none");
			}
		}
	});

	$(".buttonContainer--3pdft").click(function(){
		if ($(this).find("input#category").prop('checked')==true){ 
			$(this).find("input#category").removeAttr('checked');
			$(this).removeClass(" filteractive");
		}else{
			$(this).find("input#category").attr('checked','checked');
			$(this).addClass(" filteractive");
		}
		dataTable.draw();
	});

	$('#btn-reload').on('click', function(){
		dataTable.ajax.reload();
	});

	$(".category").on('change', function(){
		dataTable.draw(); 
	});

	$(".carat_weight").on('change', function(){
		dataTable.draw(); 
	});
	
	$(".stone_shape").on('change', function(){
		dataTable.draw(); 
	});

	$(".stone_size").on('change', function(){
		dataTable.draw(); 
	});

	$(".sub_category").on('change', function(){
		dataTable.draw(); 
	});

	$('#price_from').keyup(function(){  
		var price_from = $('#price_from').val();
		$('#amount').val(price_from);
		dataTable.draw(); 
	});

	$('#price_to').keyup(function(){  
		var price_to = $('#price_to').val();
		$('#amount2').val(price_to);
		dataTable.draw();
	});

	$('#amount').keyup(function(){ 
		var amount = $('#amount').val();
		$('#price_from').val(amount);
		dataTable.draw(); 
	});

	$('#amount2').keyup(function(){ 
		var amount2 = $('#amount2').val();
		$('#price_to').val(amount2);
		dataTable.draw(); 
	});

	$("#sort_by").change(function() {
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
			$( ".amount" ).val( ui.values[0] );
			$( ".amount2" ).val( ui.values[1] );
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
			$( ".amount" ).val( ui.values[0] );
			$( ".amount2" ).val( ui.values[1] );
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

<div class="bm-container--1ejdV" id="style_bottom_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 10px;">
		<div class="justify-align "><div class="close-button--2iqUq"><a data-qa="close-filters" class="icon-close" style="font-size: 13px; position: relative; top: -1.5px; width: 65px; height: 25px; display: inline-block;"><span>Close</span></a></div> <div class="reset-button"><a data-qa="reset-filters" class="icon-reset" style="width: 65px; height: 25px; display: inline-block; direction: rtl;"><span>Reset</span></a></div> </div><div class="filter-text--28JsY"><span>Jewelry</span></div><div class="" style="display: flex; flex-flow: column wrap; padding: 10px 20px;"><div style="position: relative;"><div class="cell--2wUTj componentids-icon-style--27Uky"><div><div class="icon-Studs2  cell-icon--q1gZD"></div><div data-qa="2_select_shape_popup" class="cell-text--2iwl8">Earrings</div></div></div><div class="cell--2wUTj componentids-icon-style--27Uky"><div><div class="icon-Pendants  cell-icon--q1gZD"></div><div data-qa="4,5,6_select_shape_popup" class="cell-text--2iwl8">Necklaces</div></div></div><div class="cell--2wUTj componentids-icon-style--27Uky"><div><div class="icon-Bracelets  cell-icon--q1gZD"></div><div data-qa="3_select_shape_popup" class="cell-text--2iwl8">Bracelets</div></div></div><div class="cell--2wUTj componentids-icon-style--27Uky"><div><div class="icon-Royal_ring  cell-icon--q1gZD"></div><div data-qa="1_select_shape_popup" class="cell-text--2iwl8">Rings</div></div></div></div></div>
	</div>
</div>

<div class="bm-container--1ejdV" id="stone_bottom_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 0px 10px 10px;">
		<div style="padding-top: 10px;"><div class="justify-align "><div class="close-button--2iqUq"><a data-qa="close-filters" class="icon-close" style="font-size: 13px; position: relative; top: -1.5px; width: 65px; height: 25px; display: inline-block;"><span>Close</span></a></div> <div class="reset-button"><a data-qa="reset-filters" class="icon-reset" style="width: 65px; height: 25px; display: inline-block; direction: rtl;"><span>Reset</span></a></div> </div></div><div class="filter-text--28JsY"><span>Stone</span></div><div class="touch scroll-flex--3roTF" style="padding-right: 0px; padding-left: 0px;"><div class="container--OWEjt"><div data-qa="stones_all_stone_types" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><span class="checkboxLabel--3qHPE">All Stone Types</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_diamond" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-diamond--2-EG1" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Diamond</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_amethyst" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-amethyst--EfD29" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Amethyst</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_aquamarine" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-aquamarine--3Cmcq" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Aquamarine</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_blue_sapphire" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-sapphire--1IQ9K" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Blue Sapphire</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_blue_topaz" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-blueTopaz--EsQoK" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Blue Topaz</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_citrine" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-cirtine--17BiF" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Citrine</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_emerald" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-greenEmerald-gemstone--qZdVM" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Emerald</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_garnet" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-garnet--1O75t" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Garnet</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_moon_quartz" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-moonQuartz-gemstone--2XIkx" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Moon Quartz</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_morganite" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-morganite-gemstone--2gLIN" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Morganite</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_opal" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-opal--hAyrz" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Opal</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_peridot" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-peridot--3fh9e" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Peridot</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_pink_sapphire" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-pinkSapphire-gemstone--2UNRR" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Pink Sapphire</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_pink_tourmaline" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-pinkTourmaline-gemstone--3G_2C" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Pink Tourmaline</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_prasiolite" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-prasiolite-gemstone--ftZUD" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Prasiolite</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_ruby" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-ruby-gemstone--2LGk0" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Ruby</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_tanzanite" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-tanzanite-gemstone--G_F6n" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Tanzanite</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_tsavorite" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-tsavorite-gemstone--2E2i9" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Tsavorite</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_turquoise" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-turquoise-gemstone--19rFr" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Turquoise</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_multi" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-multi--2WNq-" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Multi</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_others" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-others--nsOBW" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">Others</span></div><span class="checkbox--2yElh"></span></div><div data-qa="stones_no_stone" class="item--3unSw" style="height: 40px;"><div style="display: flex; align-items: center; margin-left: 10px;"><div class="icon--1uTgt bg-no-stone--2au-9" style="margin-right: 10px;"></div><span class="checkboxLabel--3qHPE">No Stone</span></div><span class="checkbox--2yElh"></span></div></div></div>
	</div>
</div>

<div class="bm-container--1ejdV" id="metal_bottom_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 10px;">
		<div class="justify-align "><div class="close-button--2iqUq"><a data-qa="close-filters" class="icon-close" style="font-size: 13px; position: relative; top: -1.5px; width: 65px; height: 25px; display: inline-block;"><span>Close</span></a></div> <div class="reset-button"><a data-qa="reset-filters" class="icon-reset" style="width: 65px; height: 25px; display: inline-block; direction: rtl;"><span>Reset</span></a></div> </div><div class="filter-text--28JsY"><span>Metal</span></div><div class="" style="display: flex; flex-flow: column wrap; padding: 10px 20px;"><div style="position: relative;"><div class="cell--2wUTj metalids-icon-style--3nHP-"><div><div class="cell-icon--q1gZD bg-metal-14k-white--3Yr3o"></div><div data-qa="1,9,8,17_select_shape_popup" class="cell-text--2iwl8">14K White Gold</div></div></div><div class="cell--2wUTj metalids-icon-style--3nHP-"><div><div class="cell-icon--q1gZD bg-metal-18k-white--p50JW"></div><div data-qa="4,10,18_select_shape_popup" class="cell-text--2iwl8">18K White Gold</div></div></div><div class="cell--2wUTj metalids-icon-style--3nHP-"><div><div class="cell-icon--q1gZD bg-metal-14k-yellow--Q_Od6"></div><div data-qa="2_select_shape_popup" class="cell-text--2iwl8">14K Yellow Gold</div></div></div><div class="cell--2wUTj metalids-icon-style--3nHP-"><div><div class="cell-icon--q1gZD bg-metal-18k-yellow--3TmCQ"></div><div data-qa="5,10,11,16,17,18_select_shape_popup" class="cell-text--2iwl8">18K Yellow Gold</div></div></div><div class="cell--2wUTj metalids-icon-style--3nHP-"><div><div class="cell-icon--q1gZD bg-metal-platinum--3SaPb"></div><div data-qa="7_select_shape_popup" class="cell-text--2iwl8">Platinum</div></div></div><div class="cell--2wUTj metalids-icon-style--3nHP-"><div><div class="cell-icon--q1gZD bg-metal-rose--134Mo"></div><div data-qa="3,6,18,16,17_select_shape_popup" class="cell-text--2iwl8">Rose Gold</div></div></div></div></div>
	</div>
</div>

<div class="bm-container--1ejdV" id="price_bottom_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
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
	$("#galleryPage_componentidsFilter").click(function(){
		$("#stone_bottom_model").css("display", "none");
		$("#metal_bottom_model").css("display", "none");
		$("#price_bottom_model").css("display", "none");
		if($("#style_bottom_model").css("display") == "none") { 
			$("#style_bottom_model").css("display", "block");
		}else{
			$("#style_bottom_model").css("display", "none");
		}
	});

	$("#galleryPage_stonesFilter").click(function(){
		$("#style_bottom_model").css("display", "none");
		$("#metal_bottom_model").css("display", "none");
		$("#price_bottom_model").css("display", "none");
		if($("#stone_bottom_model").css("display") == "none") { 
			$("#stone_bottom_model").css("display", "block");
		}else{
			$("#stone_bottom_model").css("display", "none");
		}
	});

	$("#galleryPage_metalidsFilter").click(function(){
		$("#style_bottom_model").css("display", "none");
		$("#stone_bottom_model").css("display", "none");
		$("#price_bottom_model").css("display", "none");
		if($("#metal_bottom_model").css("display") == "none") { 
			$("#metal_bottom_model").css("display", "block");
		}else{
			$("#metal_bottom_model").css("display", "none");
		}
	});

	$("#galleryPage_priceFilter").click(function(){
		$("#style_bottom_model").css("display", "none");
		$("#stone_bottom_model").css("display", "none");
		$("#metal_bottom_model").css("display", "none");
		if($("#price_bottom_model").css("display") == "none") { 
			$("#price_bottom_model").css("display", "block");
		}else{
			$("#price_bottom_model").css("display", "none");
		}
	});

	$(".close-button--2iqUq").click(function(){
		$("#style_bottom_model").css("display", "none");
		$("#stone_bottom_model").css("display", "none");
		$("#metal_bottom_model").css("display", "none");
		$("#price_bottom_model").css("display", "none");
	});
});
</script>
