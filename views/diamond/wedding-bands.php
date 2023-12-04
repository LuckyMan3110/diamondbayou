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
<input class="category" type="hidden" id="category" value="338" <?php if($srchShape == 'classic'){ echo 'checked="checked"'; }?>>
<input class="category" type="hidden" id="category" value="339" <?php if($srchShape == 'anniversary'){ echo 'checked="checked"'; }?>>
<input class="category" type="hidden" id="category" value="340" <?php if($srchShape == 'mens'){ echo 'checked="checked"'; }?>>
<input class="category" type="hidden" id="category" value="341" <?php if($srchShape == 'womens'){ echo 'checked="checked"'; }?>>
<input class="category" type="hidden" id="category" value="342" <?php if($srchShape == '3C-bands'){ echo 'checked="checked"'; }?>>
<input class="category" type="hidden" id="category" value="343" <?php if($srchShape == 'contemporary-metal'){ echo 'checked="checked"'; }?>>
<input class="category" type="hidden" id="sub_category" value="Anniversary Band" <?php if($srchShape == 'anniversary_band'){ echo 'checked="checked"'; }?>>
<input class="sub_category" type="hidden" id="sub_category" value="Classic Band" <?php if($srchShape == 'classic_band'){ echo 'checked="checked"'; }?>>
<input class="sub_category" type="hidden" id="sub_category" value="Eternity Band" <?php if($srchShape == 'eternity_band'){ echo 'checked="checked"'; }?>>
<input class="sub_category" type="hidden" id="sub_category" value="Fancy Bands" <?php if($srchShape == 'fancy_band'){ echo 'checked="checked"'; }?>>
<input class="sub_category" type="hidden" id="sub_category" value="Matching Band" <?php if($srchShape == 'matching_band'){ echo 'checked="checked"'; }?>>
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
.listpage-lists-v2 .thumbnail,.listpage-lists-v2 .thumbnail-out .thumbnail{padding:0 15px;min-height:310px;max-height:310px;height:100%}
}
</style>
<div class="container container1170 ">
	<ol class="breadcrumb">
		<li><a href="<?= SITE_URL ?>"><span>Home</span></a></li>
		<li class="active">Wedding rings</li>
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
								<span>Wedding rings</span>
							</h1>
						</div>
						<div class="banner-tro hidden-xs">
							<p class="tro-txt max-w768 center-block">Our Wedding rings are handcrafted from recycled precious metals and set with <br> Beyond Conflict Free Diamonds™ and vibrant gemstones.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="panel-container--Hqviv">
	<button type="button" style="display:none;" id="btn-reload">Reload</button>
	<?php /* <div style="display:flex;justify-content:space-between">
		<div style="width:43%;text-align:center">
			<div style="font-size:24px">WOMEN</div>
			<div style="display:flex;width:100%;margin-bottom:20px;position:relative;color:#1b1b1b">
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
				<div data-qa="shape-filter" class="single-button-container--3t7nn <?php if($srchShape == 'marquise' || $srchShape == 'marquise-cut' || $srchShape == 'marquise-cut-rings'){ echo 'filteractive'; } ?>">
					<div class="single-image--12J3l icon-marquise font-competability"></div>
					<span class="label--3ytQP">Marquise</span>
					<input type="hidden" class="stone_shape" id="stone_shape" value="Marquise" <?php if($srchShape == 'marquise' || $srchShape == 'marquise-cut' || $srchShape == 'marquise-cut-rings'){ echo 'checked="checked"'; } ?>>
				</div>
			</div>
		</div>
		<div style="width:33%;text-align:center">
			<div style="font-size:24px">MEN</div>
			<div style="display:flex;width:100%;margin-bottom:20px;position:relative">
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
				<input type="hidden" class="metal" id="metal" value="P">
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
				<div class="background-css--WFvgz bg-metal-rose--33syK font-competability"></div>
				<span class="label--3ytQP">Rose Gold</span>
				<input type="hidden" class="metal" id="metal" value="G">
			</div>
		</div>
		<div class="price-filter-container--1oAAC">
			<div class="tooltips--1t3E9">
				<div class="filter-container--3YZym">
					<h2 class="label--3hZu9"><span class="split-label--3OxV3"><span>Price</span></span></h2>
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
			</div>
		</div>
	</div>
</div>
<div class="wedding-filters">
	<div class="control-panel-container">
		<div class="galleries-title">
			<div data-type="Women" class="title-container selected-title">
				<span>Women</span>
			</div>
			<span>
				<div data-type="Men" class="title-container">
					<span>Men</span>
				</div>
			</span>
		</div>
		<div style="height: 70px;">
			<div class="gallery-filters">
				<div class="buttons-container" style="max-width:286px">
					<div class="button-wrapper">
						<div id="galleryPage_styleFilter" class="big-button--3u7a- filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Style</div>
							<div class="hor-abs filter-cut--3_FOA">Classic</div>
						</div>
					</div>
					<div class="button-wrapper">
						<div id="galleryPage_metaltypeFilter" class="big-button--3u7a- filter-button--wapdu" data-bottom-modal="true">
							<div class="hor-abs filter-name--3izko">Metal</div>
							<div class="hor-abs filter-cut--3_FOA">All</div>
						</div>
					</div>
					<div class="button-wrapper">
						<div id="galleryPage_priceFilter" class="big-button--3u7a- filter-button--wapdu" data-bottom-modal="true">
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
			url :"<?php echo SITE_URL; ?>diamonds/wedding_bands_realtime/",
			cache: false,
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

				var subcategoryArr = []
				$("input:hidden[id=sub_category]:checked").each(function(){
					subcategoryArr.push($(this).val());
				});

				var stoneShapeArr = []
				$("input:hidden[id=stone_shape]:checked").each(function(){
					stoneShapeArr.push($(this).val());
				});

				var metalArr = []
				$("input:hidden[id=metal]:checked").each(function(){
					metalArr.push($(this).val());
				});

				var sort_by	= '';
				if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

				data.categoryArr	= categoryArr;
				data.subcategoryArr	= subcategoryArr;
				data.stoneShapeArr	= stoneShapeArr;
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
		if ($(this).find("input#stone_shape").prop('checked')==true){ 
			$(this).find("input#stone_shape").removeAttr('checked');
			$(this).removeClass(" filteractive");
		}else{
			$(this).find("input#stone_shape").attr('checked','checked');
			$(this).addClass(" filteractive");
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

function bigImg(img,did) {
	$('#img_'+did).attr('src',img);
}

function normalImg(img,did) {
	$('#img_'+did).attr('src',img);
}
</script>
<div class="bm-container--1ejdV" id="style_model_women" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 10px;">
		<div class="justify-align ">
			<div class="close-button--2iqUq">
				<a data-qa="close-filters" class="icon-close" style="font-size: 13px; position: relative; top: -1.5px; width: 65px; height: 25px; display: inline-block;"><span>Close</span></a>
			</div>
			<div class="reset-button">
				<a data-qa="reset-filters" class="icon-reset" style="width: 65px; height: 25px; display: inline-block; direction: rtl;"><span>Reset</span></a>
			</div>
		</div>
		<div style="font-size: 18px; text-align: left; text-transform: uppercase; font-weight: bold; margin-top: 4px; text-indent: 8px; color: rgb(101, 101, 101);">
			<span>Style</span>
		</div>
		<div style="display: flex; flex-flow: column wrap; padding: 10px; margin: 0px 10px; max-height: calc(83vh - 93px); overflow: auto;">
			<div style="position: relative;">
				<div class="cell--2wUTj selected--4cisI typewedding-icon-style--2e2LH">
					<div>
						<div class="icon-wed_classic  cell-icon--q1gZD"></div>
						<div data-qa="336_select_shape_popup" class="cell-text--2iwl8">Classic</div>
						<input class="stone_shape" type="hidden" id="stone_shape" value="Classic">
					</div>
				</div>
				<div class="cell--2wUTj typewedding-icon-style--2e2LH">
					<div>
						<div class="icon-wed_diamond_w  cell-icon--q1gZD"></div>
						<div data-qa="338_select_shape_popup" class="cell-text--2iwl8">Diamond</div>
						<input class="stone_shape" type="hidden" id="stone_shape" value="Diamond">
					</div>
				</div>
				<div class="cell--2wUTj typewedding-icon-style--2e2LH">
					<div>
						<div class="icon-wed_stack_w  cell-icon--q1gZD"></div>
						<div data-qa="337_select_shape_popup" class="cell-text--2iwl8">Stackable</div>
						<input class="stone_shape" type="hidden" id="stone_shape" value="Stackable">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bm-container--1ejdV" id="style_model_men" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 10px;">
		<div class="justify-align ">
			<div class="close-button--2iqUq">
				<a data-qa="close-filters" class="icon-close" style="font-size: 13px; position: relative; top: -1.5px; width: 65px; height: 25px; display: inline-block;"><span>Close</span></a>
			</div>
			<div class="reset-button">
				<a data-qa="reset-filters" class="icon-reset" style="width: 65px; height: 25px; display: inline-block; direction: rtl;">
					<span>Reset</span>
				</a>
			</div>
		</div>
		<div style="font-size: 18px; text-align: left; text-transform: uppercase; font-weight: bold; margin-top: 4px; text-indent: 8px; color: rgb(101, 101, 101);"><span>Style</span></div>
		<div style="display: flex; flex-flow: column wrap; padding: 10px; margin: 0px 10px; max-height: calc(83vh - 93px); overflow: auto;">
			<div style="position: relative;">
				<div class="cell--2wUTj selected--4cisI typewedding-icon-style--2e2LH">
					<div>
						<div class="icon-wed_classic  cell-icon--q1gZD"></div>
						<div data-qa="524_select_shape_popup" class="cell-text--2iwl8">Classic</div>
						<input class="stone_shape" type="hidden" id="stone_shape" value="Classic">
					</div>
				</div>
				<div class="cell--2wUTj typewedding-icon-style--2e2LH">
					<div>
						<div class="icon-wed_carved_m  cell-icon--q1gZD"></div>
						<div data-qa="341_select_shape_popup" class="cell-text--2iwl8">Carved</div>
						<input class="stone_shape" type="hidden" id="stone_shape" value="Carved">
					</div>
				</div>
				<div class="cell--2wUTj typewedding-icon-style--2e2LH">
					<div>
						<div class="icon-wed_diamond_m  cell-icon--q1gZD"></div>
						<div data-qa="342_select_shape_popup" class="cell-text--2iwl8">Diamond</div>
						<input class="stone_shape" type="hidden" id="stone_shape" value="Diamond">
					</div>
				</div>
				<div class="cell--2wUTj typewedding-icon-style--2e2LH">
					<div>
						<div class="icon-wed_alternative  cell-icon--q1gZD"></div>
						<div data-qa="1343_select_shape_popup" class="cell-text--2iwl8">Alternative</div>
						<input class="stone_shape" type="hidden" id="stone_shape" value="Alternative">
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
	$(".title-container").click(function() {
		$(".title-container").removeClass("selected-title");
		$(this).addClass("selected-title");
		$("#metal_model").css("display", "none");
		$("#style_model_women").css("display", "none");
		$("#style_model_men").css("display", "none");
		$("#price_model").css("display", "none");
	});

	$("#galleryPage_styleFilter").click(function(){
		$("#metal_model").css("display", "none");
		$("#price_model").css("display", "none");
		if($(".selected-title").attr("data-type") == "Women"){
			$("#style_model_men").css("display", "none");
			if($("#style_model_women").css("display") == "none"){
				$("#style_model_women").css("display", "block");
			}else{
				$("#style_model_women").css("display", "none");
			}
		}else{
			$("#style_model_women").css("display", "none");
			if($("#style_model_men").css("display") == "none"){
				$("#style_model_men").css("display", "block");
			}else{
				$("#style_model_men").css("display", "none");
			}
		}
	});
	$("#galleryPage_metaltypeFilter").click(function(){
		$("#price_model").css("display", "none");
		$("#style_model_women").css("display", "none");
		$("#style_model_men").css("display", "none");
		if($("#metal_model").css("display") == "none") { 
			$("#metal_model").css("display", "block");
		}else{
			$("#metal_model").css("display", "none");
		}
	});
	$("#galleryPage_priceFilter").click(function(){
		$("#metal_model").css("display", "none");
		$("#style_model_women").css("display", "none");
		$("#style_model_men").css("display", "none");
		if($("#price_model").css("display") == "none") { 
			$("#price_model").css("display", "block");
		}else{
			$("#price_model").css("display", "none");
		}
	});
	$(".close-button--2iqUq").click(function(){
		$("#metal_model").css("display", "none");
		$("#style_model_women").css("display", "none");
		$("#style_model_men").css("display", "none");
		$("#price_model").css("display", "none");
	});
});
</script>
