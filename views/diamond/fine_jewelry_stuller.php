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
<input type="hidden" class="category" id="category" value="3C Collections" <?php if($srchShape == '3c-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Beads & Charms" <?php if($srchShape == 'beadsNcharms'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Birthstone Jewelry" <?php if($srchShape == 'birthstone-jewelry'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Bracelets Collections" <?php if($srchShape == 'bracelets-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Bridal Collections" <?php if($srchShape == 'bridal-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Brooches & Pins" <?php if($srchShape == 'broochesNpins'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Chain & Cord" <?php if($srchShape == 'chainNcord'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Earrings Collections" <?php if($srchShape == 'earrings-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Family Collections" <?php if($srchShape == 'family-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Family Jewelry" <?php if($srchShape == 'family-jewelry'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Men's Jewelry" <?php if($srchShape == 'mens-jewelry'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Mens Collections" <?php if($srchShape == 'mens-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Neckwear" <?php if($srchShape == 'neckwear-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Pearl Jewelry" <?php if($srchShape == 'pearl-jewelry'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Personalization" <?php if($srchShape == 'personalization'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Religious" <?php if($srchShape == 'religious-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Religious & Symbolic" <?php if($srchShape == 'religiousNsymbolic'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Rings Collections" <?php if($srchShape == 'rings-collections'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Roses" <?php if($srchShape == 'roses-jewelry'){ echo 'checked="checked"'; } ?>>
<input type="hidden" class="category" id="category" value="Youth Jewelry" <?php if($srchShape == 'youth-jewelry'){ echo 'checked="checked"'; } ?>>
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
input#stone_shape{margin:0;margin-right:10px;width:19px;height:20px}
input#stone_metal{margin:0;margin-right:10px;width:19px;height:20px}
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
.galleryContainer--1hbna{display:none}
.listpage-lists-v2 .thumbnail,.listpage-lists-v2 .thumbnail-out .thumbnail{padding:0 15px;min-height:310px;max-height:310px;height:100%}
.cell--2wUTj{width:calc(24% - 6px)}
.metalcls .cell--2wUTj{width:calc(29% - 6px)}
.item--3unSw{width:49%}
.cell--2wUTj>div{display:initial}
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
		<div class="header-third--1eMl0">
			<div style="display:flex">
				<div data-qa="earring_filter-fine_jewelry" class="buttonContainer--3pdft <?php if($srchShape == 'earrings-jewelry' || $srchShape == 'earrings-collections'){ echo 'filteractive'; } ?>">
					<div class="icon-filtered filtered--2tEj0"></div>
					<div class="icon--10LqF icon-Studs2--1Saqn"></div>
					<h2 class="label--2C0aM">Earrings</h2>
					<input type="hidden" class="category" id="category" value="Earrings" <?php if($srchShape == 'earrings-jewelry'){ echo 'checked="checked"'; } ?>>
				</div>
				<div data-qa="necklaces_filter-fine_jewelry" class="buttonContainer--3pdft <?php if($srchShape == 'necklacesNpendants' || $srchShape == 'neckwear-collections'){ echo 'filteractive'; } ?>">
					<div class="icon--10LqF icon-Pendants--2RN9E"></div>
					<h2 class="label--2C0aM">Necklaces</h2>
					<input type="hidden" class="category" id="category" value="Necklaces & Pendants" <?php if($srchShape == 'necklacesNpendants'){ echo 'checked="checked"'; } ?>>
				</div>
				<div data-qa="bracelets_filter-fine_jewelry" class="buttonContainer--3pdft <?php if($srchShape == 'bracelets-jewelry' || $srchShape == 'bracelets-collections'){ echo 'filteractive'; } ?>">
					<div class="icon--10LqF icon-Bracelets--1xQWS"></div>
					<h2 class="label--2C0aM">Bracelets</h2>
					<input type="hidden" class="category" id="category" value="Bracelets" <?php if($srchShape == 'bracelets-jewelry'){ echo 'checked="checked"'; } ?>>
				</div>
				<div data-qa="rings_filter-fine_jewelry" class="buttonContainer--3pdft <?php if($srchShape == 'rings-jewelry' || $srchShape == 'rings-collections'){ echo 'filteractive'; } ?>">
					<div class="icon--10LqF icon-Royal_ring--2wUwo"></div>
					<h2 class="label--2C0aM">Rings</h2>
					<input type="hidden" class="category" id="category" value="Rings" <?php if($srchShape == 'rings-jewelry'){ echo 'checked="checked"'; } ?>>
				</div>
			</div>
			<div style="display:flex;margin-top:46px;margin-bottom:43px">
				<div class="pairs-filters--2bpAS">
					<ul class="pairs-filters-list--1Jrzy">
						<div class="spacing--3jzJB">
							<div data-qa="stones_filter" class="container--1ysjl">
								<span style="width:122px" class="wideButtonContainer--3vgEq">Shape<!-- --> </span>
								<div id="stones_filter" style="position: relative; width: 122px;opacity: 0;">
									<div class="dropdownContentContainer--3yyfC startFromLeft--2gHMC" style="height:325px;width:650px;">
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Asscher">
												<span class="checkboxLabel--1FU0f">Asscher</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Briolette">
												<span class="checkboxLabel--1FU0f">Briolette</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Briolette">
												<span class="checkboxLabel--1FU0f">Briolette</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Cushion">
												<span class="checkboxLabel--1FU0f">Cushion</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Emerald">
												<span class="checkboxLabel--1FU0f">Emerald</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Fancy">
												<span class="checkboxLabel--1FU0f">Fancy</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Heart">
												<span class="checkboxLabel--1FU0f">Heart</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Marquise">
												<span class="checkboxLabel--1FU0f">Marquise</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Oval">
												<span class="checkboxLabel--1FU0f">Oval</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Pear">
												<span class="checkboxLabel--1FU0f">Pear</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Pearl">
												<span class="checkboxLabel--1FU0f">Pearl</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Radiant">
												<span class="checkboxLabel--1FU0f">Radiant</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Rectangle">
												<span class="checkboxLabel--1FU0f">Rectangle</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Round">
												<span class="checkboxLabel--1FU0f">Round</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Square">
												<span class="checkboxLabel--1FU0f">Square</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Star">
												<span class="checkboxLabel--1FU0f">Star</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Straight Baguette">
												<span class="checkboxLabel--1FU0f">Straight Baguette</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Tapered Baguette">
												<span class="checkboxLabel--1FU0f">Tapered Baguette</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Triangle">
												<span class="checkboxLabel--1FU0f">Triangle</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="Trillion">
												<span class="checkboxLabel--1FU0f">Trillion</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="N/A">
												<span class="checkboxLabel--1FU0f">N/A</span>
											</div>
										</div>
										<div data-qa="diamond-stones_filter" class="item--1o26L" style="width:200px;height:35px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_shape" id="stone_shape" value="All Shapes">
												<span class="checkboxLabel--1FU0f">All Shapes</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="spacing--3jzJB">
							<div data-qa="metal_filter" class="container--1ysjl">
								<span style="width:122px" class="wideButtonContainer--3vgEq">Metal<!-- --> </span>
								<div id="metal_filter" style="position: relative; width: 122px;opacity: 0;">
									<div class="dropdownContentContainer--3yyfC" style="height:275px;width:915px;">
										<div data-qa="wg10-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="10KR">
												<span class="checkboxLabel--1FU0f">10K Rose Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-10k-rose--1H1OH"></div>
										</div>
										<div data-qa="wg10-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="10KW">
												<span class="checkboxLabel--1FU0f">10K White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-10k-white--1H1OH"></div>
										</div>
										<div data-qa="wg10-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="10KX1">
												<span class="checkboxLabel--1FU0f">10K X1 White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-10k-white--1H1OH"></div>
										</div>
										<div data-qa="y10-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="10KY">
												<span class="checkboxLabel--1FU0f">10K Yellow Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-10k-yellow--3OF3x"></div>
										</div>
										<div data-qa="wg10-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="10PW">
												<span class="checkboxLabel--1FU0f">10K Palladium White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-10k-palladium-white--1H1OH"></div>
										</div>
										<div data-qa="platinum-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="PLAT">
												<span class="checkboxLabel--1FU0f">Platinum</span>
											</div>
											<div class="icon--2K1-Y bg-metal-platinum--1LFhI"></div>
										</div>
										<div data-qa="wg14-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="14KR">
												<span class="checkboxLabel--1FU0f">14K Rose Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-14k-rose--1H1OH"></div>
										</div>
										<div data-qa="wg14-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="14KW">
												<span class="checkboxLabel--1FU0f">14K White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-14k-white--1H1OH"></div>
										</div>
										<div data-qa="wg14-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="14KX1">
												<span class="checkboxLabel--1FU0f">14K X1 White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-14k-white--1H1OH"></div>
										</div>
										<div data-qa="wg14-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="14KY">
												<span class="checkboxLabel--1FU0f">14K Yellow Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-14k-white--1H1OH"></div>
										</div>
										<div data-qa="wg14-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="14PW">
												<span class="checkboxLabel--1FU0f">14K Palladium White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-14k-white--1H1OH"></div>
										</div>
										<div data-qa="sterling_silver-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="STER">
												<span class="checkboxLabel--1FU0f">Sterling Silver</span>
											</div>
											<div class="icon--2K1-Y bg-metal-sterling-silver--1KdBC"></div>
										</div>
										<div data-qa="wg18-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="18KR">
												<span class="checkboxLabel--1FU0f">18K Rose Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-18k-rose--2cjrn"></div>
										</div>
										<div data-qa="wg18-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="18KW">
												<span class="checkboxLabel--1FU0f">18K White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-18k-white--2cjrn"></div>
										</div>
										<div data-qa="wg18-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="18KX1">
												<span class="checkboxLabel--1FU0f">18K X1 White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-18k-white--2cjrn"></div>
										</div>
										<div data-qa="wg18-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="18KY">
												<span class="checkboxLabel--1FU0f">18K Yellow Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-18k-yellow--2cjrn"></div>
										</div>
										<div data-qa="wg18-metal_filter" class="item--1o26L" style="width:290px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="18PW">
												<span class="checkboxLabel--1FU0f">18K Palladium White Gold</span>
											</div>
											<div class="icon--2K1-Y bg-metal-18k-white--2cjrn"></div>
										</div>
										<div data-qa="sterling_silver-metal_filter" class="item--1o26L" style="width:300px;height:38px;margin-right:0px;">
											<div style="display: flex; align-items: center;">
												<input type="checkbox" class="stone_metal" id="stone_metal" value="CONTSTER">
												<span class="checkboxLabel--1FU0f">Continuum Sterling Silver</span>
											</div>
											<div class="icon--2K1-Y bg-metal-sterling-silver--1KdBC"></div>
										</div>
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
			url :"<?php echo SITE_URL; ?>diamonds/fine_jewelry_stuller_realtime/",
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
				$("input:checkbox[id=stone_shape]:checked").each(function(){
					stoneShapeArr.push($(this).val());
				});

				var stoneMetalArr = []
				$("input:checkbox[id=stone_metal]:checked").each(function(){
					stoneMetalArr.push($(this).val());
				});

				var sort_by	= '';
				if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

				data.categoryArr	= categoryArr;
				data.stoneShapeArr	= stoneShapeArr;
				data.stoneMetalArr = stoneMetalArr;
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
			$(".buttonContainer--3pdft").removeClass(" filteractive");
			$("input#category").removeAttr('checked');
			$(this).find("input#category").attr('checked','checked');
			$(this).addClass(" filteractive");
		}
		dataTable.draw();
	});

	$(".cell--2wUTj").click(function(){
		if ($(this).find("input#category").prop('checked')==true){ 
			$(this).find("input#category").removeAttr('checked');
			$(this).removeClass(" filteractive");
		}else{
			$(".cell--2wUTj").removeClass(" filteractive");
			$("input#category").removeAttr('checked');
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

	$(".stone_shape").on('change', function(){
		if($(this).is(":checked")) {
            $(this).attr('checked','checked');
        }else{
			$(this).removeAttr('checked');
		}
		dataTable.draw(); 
	});

	$(".stone_metal").on('change', function(){
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

function bigImg(img,did) {
	$('#img_'+did).attr('src',img);
}

function normalImg(img,did) {
	$('#img_'+did).attr('src',img);
}

</script>
<div class="bm-container--1ejdV" id="style_bottom_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 10px;">
		<div class="justify-align "><div class="close-button--2iqUq"><a data-qa="close-filters" class="icon-close" style="font-size: 13px; position: relative; top: -1.5px; width: 65px; height: 25px; display: inline-block;"><span>Close</span></a></div> <div class="reset-button"><a data-qa="reset-filters" class="icon-reset" style="width: 65px; height: 25px; display: inline-block; direction: rtl;"><span>Reset</span></a></div> </div>
		<div class="filter-text--28JsY"><span>Jewelry</span></div>
		<div class="" style="display: flex; flex-flow: column wrap; padding: 10px 20px;">
			<div style="position: relative;">
				<div class="cell--2wUTj componentids-icon-style--27Uky <?php if($srchShape == 'earrings-jewelry' || $srchShape == 'earrings-collections'){ echo 'filteractive'; } ?>">
					<div><div class="icon-Studs2  cell-icon--q1gZD"></div><div data-qa="2_select_shape_popup" class="cell-text--2iwl8">Earrings</div></div>
					<input type="hidden" class="category" id="category" value="Earrings" <?php if($srchShape == 'earrings-jewelry'){ echo 'checked="checked"'; } ?>>
				</div>
				<div class="cell--2wUTj componentids-icon-style--27Uky <?php if($srchShape == 'necklacesNpendants' || $srchShape == 'neckwear-collections'){ echo 'filteractive'; } ?>">
					<div><div class="icon-Pendants  cell-icon--q1gZD"></div><div data-qa="4,5,6_select_shape_popup" class="cell-text--2iwl8">Necklaces</div></div>
					<input type="hidden" class="category" id="category" value="Necklaces & Pendants" <?php if($srchShape == 'necklacesNpendants'){ echo 'checked="checked"'; } ?>>
				</div>
				<div class="cell--2wUTj componentids-icon-style--27Uky <?php if($srchShape == 'bracelets-jewelry' || $srchShape == 'bracelets-collections'){ echo 'filteractive'; } ?>">
					<div><div class="icon-Bracelets  cell-icon--q1gZD"></div><div data-qa="3_select_shape_popup" class="cell-text--2iwl8">Bracelets</div></div>
					<input type="hidden" class="category" id="category" value="Bracelets" <?php if($srchShape == 'bracelets-jewelry'){ echo 'checked="checked"'; } ?>>
				</div>
				<div class="cell--2wUTj componentids-icon-style--27Uky <?php if($srchShape == 'rings-jewelry' || $srchShape == 'rings-collections'){ echo 'filteractive'; } ?>">
					<div><div class="icon-Royal_ring  cell-icon--q1gZD"></div><div data-qa="1_select_shape_popup" class="cell-text--2iwl8">Rings</div></div>
					<input type="hidden" class="category" id="category" value="Rings" <?php if($srchShape == 'rings-jewelry'){ echo 'checked="checked"'; } ?>>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bm-container--1ejdV" id="stone_bottom_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 0px 10px 10px;">
		<div style="padding-top: 10px;">
			<div class="justify-align ">
				<div class="close-button--2iqUq"><a data-qa="close-filters" class="icon-close" style="font-size: 13px; position: relative; top: -1.5px; width: 65px; height: 25px; display: inline-block;"><span>Close</span></a></div>
				<div class="reset-button"><a data-qa="reset-filters" class="icon-reset" style="width: 65px; height: 25px; display: inline-block; direction: rtl;"><span>Reset</span></a></div>
			</div>
		</div>
		<div class="filter-text--28JsY"><span>Shape</span></div>
		<div class="touch scroll-flex--3roTF" style="padding-right: 0px; padding-left: 0px;">
			<div class="container--OWEjt">
				<div data-qa="shape_Asscher" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Asscher">
						<span class="checkboxLabel--3qHPE">Asscher</span>
					</div>
				</div>
				<div data-qa="shape_Briolette" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Briolette">
						<span class="checkboxLabel--3qHPE">Briolette</span>
					</div>
				</div>
				<div data-qa="shape_Cushion" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Cushion">
						<span class="checkboxLabel--3qHPE">Cushion</span>
					</div>
				</div>
				<div data-qa="shape_Emerald" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Emerald">
						<span class="checkboxLabel--3qHPE">Emerald</span>
					</div>
				</div>
				<div data-qa="shape_Fancy" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Fancy">
						<span class="checkboxLabel--3qHPE">Fancy</span>
					</div>
				</div>
				<div data-qa="shape_Heart" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Heart">
						<span class="checkboxLabel--3qHPE">Heart</span>
					</div>
				</div>
				<div data-qa="shape_Marquise" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Marquise">
						<span class="checkboxLabel--3qHPE">Marquise</span>
					</div>
				</div>
				<div data-qa="shape_Oval" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Oval">
						<span class="checkboxLabel--3qHPE">Oval</span>
					</div>
				</div>
				<div data-qa="shape_Pear" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Pear">
						<span class="checkboxLabel--3qHPE">Pear</span>
					</div>
				</div>
				<div data-qa="shape_Pearl" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Pearl">
						<span class="checkboxLabel--3qHPE">Pearl</span>
					</div>
				</div>
				<div data-qa="shape_Radiant" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Radiant">
						<span class="checkboxLabel--3qHPE">Radiant</span>
					</div>
				</div>
				<div data-qa="shape_Rectangle" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Rectangle">
						<span class="checkboxLabel--3qHPE">Rectangle</span>
					</div>
				</div>
				<div data-qa="shape_Round" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Round">
						<span class="checkboxLabel--3qHPE">Round</span>
					</div>
				</div>
				<div data-qa="shape_Square" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Square">
						<span class="checkboxLabel--3qHPE">Square</span>
					</div>
				</div>
				<div data-qa="shape_Star" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Star">
						<span class="checkboxLabel--3qHPE">Star</span>
					</div>
				</div>
				<div data-qa="shape_Straight_Baguette" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Straight Baguette">
						<span class="checkboxLabel--3qHPE">Straight Baguette</span>
					</div>
				</div>
				<div data-qa="shape_Tapered_Baguette" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Tapered Baguette">
						<span class="checkboxLabel--3qHPE">Tapered Baguette</span>
					</div>
				</div>
				<div data-qa="shape_Triangle" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Triangle">
						<span class="checkboxLabel--3qHPE">Triangle</span>
					</div>
				</div>
				<div data-qa="shape_Trillion" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="Trillion">
						<span class="checkboxLabel--3qHPE">Trillion</span>
					</div>
				</div>
				<div data-qa="shape_Mabe" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="N/A">
						<span class="checkboxLabel--3qHPE">N/A</span>
					</div>
				</div>
				<div data-qa="shape_All_Shapes" class="item--3unSw" style="height: 40px;">
					<div style="display: flex; align-items: center; margin-left: 10px;">
						<input type="checkbox" class="stone_shape" id="stone_shape" value="All Shapes">
						<span class="checkboxLabel--3qHPE">All Shapes</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bm-container--1ejdV" id="metal_bottom_model" data-qa="bottom-modal" style="position: fixed; bottom: 0px; left: 0px; right: 0px; border-radius: 10px; background-color: rgb(255, 255, 255); font-family: &quot;Nunito Sans&quot;; box-shadow: rgba(11, 11, 11, 0.25) 0px -10px 20px 0px; overflow: hidden; z-index: 1900; width: 100%; max-height: 100%; box-sizing: border-box;">
	<div style="padding: 10px;">
		<div class="justify-align ">
			<div class="close-button--2iqUq">
				<a data-qa="close-filters" class="icon-close" style="font-size: 13px; position: relative; top: -1.5px; width: 65px; height: 25px; display: inline-block;"><span>Close</span></a>
			</div>
			<div class="reset-button">
				<a data-qa="reset-filters" class="icon-reset" style="width: 65px; height: 25px; display: inline-block; direction: rtl;"><span>Reset</span></a>
			</div>
		</div>
		<div class="filter-text--28JsY">
			<span>Metal</span>
		</div>
		<div style="display: flex; flex-flow: column wrap; padding: 10px 20px;">
			<div class="metalcls" style="position: relative;">
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="10KR">
						<div class="cell-text--2iwl8">10K Rose Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="14KR">
						<div class="cell-text--2iwl8">14K Rose Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="18KR">
						<div class="cell-text--2iwl8">18K Rose Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="10KW">
						<div class="cell-text--2iwl8">10K White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="14KW">
						<div class="cell-text--2iwl8">14K White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="18KW">
						<div class="cell-text--2iwl8">18K White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="10KX1">
						<div class="cell-text--2iwl8">10K X1 White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="14KX1">
						<div class="cell-text--2iwl8">14K X1 White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="18KX1">
						<div class="cell-text--2iwl8">18K X1 White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="10KY">
						<div class="cell-text--2iwl8">10K Yellow Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="14KY">
						<div class="cell-text--2iwl8">14K Yellow Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="18KY">
						<div class="cell-text--2iwl8">18K Yellow Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="10PW">
						<div class="cell-text--2iwl8">10K Palladium White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="14PW">
						<div class="cell-text--2iwl8">14K Palladium White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="18PW">
						<div class="cell-text--2iwl8">18K Palladium White Gold</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="PLAT">
						<div class="cell-text--2iwl8">Platinum</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="STER">
						<div class="cell-text--2iwl8">Sterling Silver</div>
					</div>
				</div>
				<div class="cell--2wUTj metalids-icon-style--3nHP-">
					<div>
						<input type="checkbox" class="stone_metal" id="stone_metal" value="CONTSTER">
						<div class="cell-text--2iwl8">Continuum Sterling Silver</div>
					</div>
				</div>
			</div>
		</div>
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
