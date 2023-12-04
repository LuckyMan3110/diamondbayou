<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $contact_title; ?> Wholesaller and Rtailer Version</title>
		<link type="text/css" href="<?php echo SITE_URL; ?>css/wh_styles.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo SITE_URL; ?>css/whsale_styles.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo SITE_URL; ?>css/site-menu.css" rel="stylesheet" />
		<link type="text/css" href="<?php echo SITE_URL; ?>css/site-style.css" rel="stylesheet" />
		<style>
		.main_wraper{width:1048px !important;}
		#main-menu{color: #fff;}
		.tophheadr_bk{background: #000000;}
		.header_top_logo{padding: 15px 0px 10px 0px;}
		</style>
	</head>
	<body>
		<div class="main_wraper">
			<div class="tophheadr_bk">
				<div class="header_top_logo">
					<a href="<?php echo SITE_URL; ?>affiliate"><img src="<?php echo SITE_URL; ?>assets/images/godstonelogo.png" alt="<?php echo $contact_title; ?>" style="width:200px" /></a>
				</div>
				<br>
				<div id="main-menu">
					<ul class="main-nav whmenu">
						<li class="margin"> <a href="#javascrip;">Collections</a>
							<div>
								<div class="main-nav-column">
									<div class="devide">
										<ul>
											<?php
											echo '<li><a href="'.SITE_URL.'rings/ringCollections/1401">Engagement Rings</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1402">Wedding Bands</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1403">Mens Wedding Bands</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1404">Tennis Bracelet</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1405">Diamond Stud Earrings</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1406">Fashion Rings</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1407">Tennis Necklace</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1408">Diamond Hoop Earrings</a></li>';
											?>
										</ul>
									</div>
									<div class="devide">
										<ul>
											<?php
											echo '<li><a href="'.SITE_URL.'rings/ringCollections/1409">Eternity Bands</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1410">Diamond Wedding Bands</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1411">Stackable Rings</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1412">Mens Diamond Wedding Bands</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1415">Men Styles</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1416">Jewelry</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1413">Diamonds</a></li>
											<li><a href="'.SITE_URL.'rings/ringCollections/1414">Lab Diamonds</a></li>';
											?>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="margin_none"> <a href="#javascrip;">Diamonds</a>
							<div>
								<div class="main-nav-column">
									<div class="devide">
										<ul>
											<li><a href="<?php echo SITE_URL?>diamondslist/search/true/W">White Diamonds</a></li>
											<li><a href="<?php echo SITE_URL?>diamondslist/search/true/L">Lab Diamonds</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li>
							<form autocomplete="on" action="<?php echo SITE_URL?>affiliate" class="search_formbk" name="f_search" method="get">
								<span class="setsearch_field"><input type="text" value="<?php echo (isset($searchField) && !empty($searchField))?$searchField:'Rings';?>" class="" onblur="if (this.value==''){this.value='search'}" onfocus="this.value=''" name="search_field" /></span>
								<span><input type="image" src="<?php echo SITE_WHURL; ?>baner_serach.jpg" name="btn_submit" class="" /></span>
							</form>
						</li>
					</ul>
				</div>
			</div>
			<div class="mainbv_baner">
				<div class="bannr_block">
					<div><img src="<?php echo SITE_URL.'images/dealers.jpg?v=0.1'; ?>" alt="Authorize Reseller" /></div>
					<br><br><br><br><br>
					<div class="clear"></div><br><br><br>
					<div style="text-align: center;"><a href="<?php echo SITE_URL; ?>affiliate/account_login"><img src="<?php echo WHSITE_IMGURL; ?>sign_inbtn.jpg" alt="Sign In" /></a></div>
					<div style="text-align: center;"><a href="<?php echo SITE_URL; ?>affiliate/account_login"><img src="<?php echo WHSITE_IMGURL; ?>create_acbtn.jpg" alt="Create Account" /></a></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div style="background-color: #fff;">
				<!-- Datatable CSS -->
				<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
				<!-- jQuery Library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<!-- Datatable JS -->
				<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
				<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" rel="stylesheet" />
				<link href="<?=SITE_URL?>css/search.css" rel="stylesheet" />
				<style rel='stylesheet' type='text/css'>
				#ring_grid_filter input[type="search"]{height:35px;border:solid 1px #ccc;padding:5px}
				table.dataTable thead th,table.dataTable thead td{border-bottom:1px solid #ccc!important}
				table.dataTable tfoot th,table.dataTable tfoot td{border-top:1px solid #ccc!important}
				table.dataTable tbody th,table.dataTable tbody td{padding:0!important}
				#loader{border:16px solid #f3f3f3;border-radius:50%;border-top:16px solid #3498db;width:120px;height:120px;-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite;margin-left:200px;margin-top:30px;position:absolute!important;top:50%;left:35%}
				.dataTables_wrapper .dataTables_processing{position:absolute!important;top:3%!important;left:25%!important;width:100%!important;height:40px;margin-left:-50%;margin-top:-25px;padding-top:20px;background-color:transparent!important;background:transparent!important}
				#diamond_grid_length{margin-bottom:10px}
				table#ring_grid tbody tr{width:33.33%;float:left;min-height:495px;height:100%;max-height:495px;background:#fff;text-align:center}
				table#ring_grid .diamond_result_content{padding:0;margin:5px}
				table#ring_grid .diamond_result_content h4{font-size:12px;padding:5px 0}
				table#ring_grid tbody tr{background-color:transparent}
				table.dataTable.stripe tbody tr.odd,table.dataTable.display tbody tr.odd{background-color:transparent}
				table.dataTable.display tbody tr.odd>.sorting_1,table.dataTable.order-column.stripe tbody tr.odd>.sorting_1{background-color:#fff}
				.overlay-quick-view{left:30%;font-size:12px}
				.overlay-details-view{left:20%;font-size:12px;font-weight:700;padding:15px 5px}
				.hover-jewelery-img-area{padding:5px 0}
				table.dataTable.row-border tbody th,table.dataTable.row-border tbody td,table.dataTable.display tbody th,table.dataTable.display tbody td{border-top:none}
				img.detl-img2{width:280px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0;left:30px;text-align:center}
				img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:5px;left:0;text-align:center}
				table#ring_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
				table#ring_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
				@media only screen and (device-width: 768px) {
				.result_page_right{width:100%}
				table#ring_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
				img.detl-img2{width:280px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0;left:0}
				img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0}
				table#ring_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
				table#ring_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
				}
				@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
				.result_page_right{width:100%}
				table#ring_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
				img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0}
				table#ring_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
				table#ring_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
				}
				@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
				.result_page_right{width:100%}
				table#ring_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
				img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0}
				table#ring_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
				table#ring_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
				}
				@media (max-width: 767px) {
				table#ring_grid .diamond_result_content{border:1px solid #cacc0c}
				.result_page_right{width:100%}
				table#ring_grid tbody tr{width:100%;float:none;min-height:auto;height:auto;max-height:fit-content;background:#fff}
				img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0}
				table#ring_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
				table#ring_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
				}
				.dataTables_length{display:none}
				.dataTables_filter{display:none}
				table.dataTable.display tbody tr:hover>.sorting_1, table.dataTable.order-column.hover tbody tr:hover>.sorting_1{background:transparent!important}
				#ring_grid_wrapper{width:100%}
				</style>
				<div class="search-result">
					<div class="container">
						<div class="container__row">
							<aside class="search__filter">
								<h3 class="search__filter-header">Select Refinements</h3>
								<div class="search__filter-content">
									<form id="search_filter_form" action="<?php echo SITE_URL; ?>search" method="get">
										<input type="hidden" name="search_field" id="searchField" value="<?= isset($searchField)?$searchField:'';?>">
										<div class="search__filter-block">
											<h4 class="search__filter-block-heading <?php if((isset($pricelow) && $pricelow > 0) || (isset($pricehigh) && $pricehigh > 0)){ echo 'is--active'; } ?>"><span class="search__filter-block-arrow"><img src="<?=SITE_URL?>images/chevron-down.svg" alt="Icon"></span>PRICE</h4>
											<div class="search__filter-block-content" <?php if((isset($pricelow) && $pricelow > 0) || (isset($pricehigh) && $pricehigh > 0)){ echo 'style="display:block"'; } ?>>
												<div class="product__price-range">
													<div class="product__price-range-input">
														<div class="product__price-range-input-icon">$</div>
														<input type="text" name="low_range" value="<?= isset($pricelow)?$pricelow:'';?>" class="low_range" placeholder="low">
													</div>
													<div class="product__price-range-divider">-</div>
													<div class="product__price-range-input">
														<div class="product__price-range-input-icon">$</div>
														<input type="text" name="high_range" value="<?= isset($pricehigh)?$pricehigh:'';?>" class="high_range" placeholder="high">
													</div>
													<input type="button" class="product__price-range-btn" value="Go">
												</div>
											</div>
										</div>
										<?php if(isset($getAllShaped) && !empty($getAllShaped)){ ?>
											<!-- STONE SHAPE-->
											<div class="search__filter-block">
												<h4 class="search__filter-block-heading"><span class="search__filter-block-arrow"><img src="<?=SITE_URL?>images/chevron-down.svg" alt="Icon" /></span>STONE SHAPE</h4>
												<div class="search__filter-block-content">
													<?php foreach($getAllShaped as $shped){ ?>
														<div class="form-check">
															<input type="checkbox" class="form-check__input shape" id="shape" name="shape" value="<?php echo $shped;?>" />
															<label class="form-check__label"><span class="form-check__name"><?php echo $shped;?></span> <span class="form-check__number"></span></label>
														</div>
													<?php } ?>
												</div>
											</div>
											<!-- STONE SHAPE -->
										<?php } ?>
										<div class="search__filter-block">
											<h4 class="search__filter-block-heading"><span class="search__filter-block-arrow"><img src="<?=SITE_URL?>images/chevron-down.svg" alt="Icon" /></span>Carat</h4>
											<div class="search__filter-block-content">
												<div class="form-check">
													<input type="checkbox" class="form-check__input carat" id="carat" name="carat" value="1" />
													<label class="form-check__label"><span class="form-check__name">.25 - 1</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input carat" id="carat" name="carat" value="2.00" />
													<label class="form-check__label"><span class="form-check__name">1 - 2</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input carat" id="carat" name="carat" value="3.00" />
													<label class="form-check__label"><span class="form-check__name">2 - 3</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input carat" id="carat" name="carat" value="4.00" />
													<label class="form-check__label"><span class="form-check__name">3 - 4</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input carat" id="carat" name="carat" value="5.00" />
													<label class="form-check__label"><span class="form-check__name">4 - 5</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input carat" id="carat" name="carat" value="11" />
													<label class="form-check__label"><span class="form-check__name">5+</span> <span class="form-check__number"></span></label>
												</div>
											</div>
										</div>
										<div class="search__filter-block">
											<h4 class="search__filter-block-heading"><span class="search__filter-block-arrow"><img src="<?=SITE_URL?>images/chevron-down.svg" alt="Icon" /></span>Type</h4>
											<div class="search__filter-block-content">
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Diamonds" />
													<label class="form-check__label"><span class="form-check__name">Diamonds</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Enagagement_rings" />
													<label class="form-check__label"><span class="form-check__name">Enagagement rings</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Bracelets" />
													<label class="form-check__label"><span class="form-check__name">Bracelets</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Earrings" />
													<label class="form-check__label"><span class="form-check__name">Earrings</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Necklaces" />
													<label class="form-check__label"><span class="form-check__name">Necklaces</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Wedding Bands" />
													<label class="form-check__label"><span class="form-check__name">Wedding Bands</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Color Fashion" />
													<label class="form-check__label"><span class="form-check__name">Color Fashion</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Diamond Fashion" />
													<label class="form-check__label"><span class="form-check__name">Diamond Fashion</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="Bridal Completes" />
													<label class="form-check__label"><span class="form-check__name">Bridal Completes</span> <span class="form-check__number"></span></label>
												</div>
												<div class="form-check">
													<input type="checkbox" class="form-check__input jewelary_type" id="jewelary_type" name="jewelary_type" value="New Arrivals" />
													<label class="form-check__label"><span class="form-check__name">New Arrivals</span> <span class="form-check__number"></span></label>
												</div>
											</div>
										</div>
									</form>
								</div>
							</aside>
							<main class="product-listing">
								<div class="info-box">
									<div class="info-box__header">Related Search Terms</div>
									<div class="info-box__content">
										<ul class="info-box__list">
											<?php 
											foreach($getAllStyle as $style){
												if($style == 'Bracelets'){
													$links = SITE_URL .'diamonds/fine-jewelry/bracelets';
												}elseif($style == 'Earrings'){
													$links = SITE_URL .'diamonds/fine-jewelry/earrings';
												}elseif($style == 'Color Fashion'){
													$links = SITE_URL .'diamonds/fine-jewelry/color-fashion';
												}elseif($style == 'Bridal Completes'){
													$links = SITE_URL .'diamonds/fine-jewelry/finished-bridal';
												}elseif($style == 'New Arrivals'){
													$links = SITE_URL .'diamonds/fine-jewelry/new-arrivals';
												}elseif($style == 'Wedding Bands'){
													$links = SITE_URL .'diamonds/wedding-bands';
												}elseif($style == 'Diamond Fashion'){
													$links = SITE_URL .'diamonds/fine-jewelry/diamond-fashion';
												}elseif($style == 'Pendants'){
													$links = SITE_URL .'diamonds/fine-jewelry/pendants';
												}elseif($style == 'Necklaces'){
													$links = SITE_URL .'diamonds/fine-jewelry/necklaces';
												}else{
													$links = SITE_URL .'diamonds/engagement-rings/'.$style;
												}
												?>
												<li><a href="<?= $links?>"><?= $style?></a></li>
											<?php } ?>
										</ul>
									</div>
								</div>
								<div class="product-tabs">
									<div class="product-tabs__content">
										<div class="products-list product-tabs__pane is--active">
											<div class="product-listing__content">
												<div class="product-wrapper">
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
								</div>
							</main>
						</div>
					</div>
				</div>
				<section class="main_content_bg">
					<div class="container set_col_pading">
						<div class="col-sm-12">
							
						</div>
						<div class="clear"></div>
					</div>
				</section>
				<script>
				$( document ).ready(function() {
					var dataTable = $('#ring_grid').DataTable({
						"serverSide": true,
						'processing': true,
						"lengthMenu": [[15, 21, 30, 32, 50, 100, 200], [15, 21, 30, 32, 50, 100, 200]],
						"pageLength": 21,
						'oLanguage': {sProcessing: "<div id='loader'></div>"},
						"ajax":{
							url :"<?php echo SITE_URL; ?>diamonds/getrefinesearchresult",
							type: "post",
							'data' : function(data){
								/* Amount */
								var amount_min      = $('.low_range').val();
								var amount_max      = $('.high_range').val();

								/* Append to data */
								data.amount_min     = amount_min;
								data.amount_max     = amount_max;

								var shapeArr = []
								$("input:checkbox[id=shape]:checked").each(function(){
									shapeArr.push($(this).val());
								});

								var caratArr = []
								$("input:checkbox[id=carat]:checked").each(function(){
									caratArr.push($(this).val());
								});

								var typeArr = []
								$("input:checkbox[id=jewelary_type]:checked").each(function(){
									typeArr.push($(this).val());
								});

								var sort_by	= '';
								if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

								var searchField	= '';
								if ($("#searchField").val() != ""){ searchField = $('#searchField').val(); }

								data.shapeArr	= shapeArr;
								data.caratArr	= caratArr;
								data.typeArr	= typeArr;
								data.sort_by	= sort_by;
								data.searchField= searchField;
							},
							error: function(){
								$("#diamond_grid_processing").css("display","none");
							}
						}
					});

					$('#btn-reload').on('click', function(){
						dataTable.ajax.reload();
					});

					$(".shape").on('change', function(){
						dataTable.draw(); 
					});

					$(".carat").on('change', function(){
						dataTable.draw(); 
					});
					
					$(".jewelary_type").on('change', function(){
						dataTable.draw(); 
					});

					$('.low_range').keyup(function(){
						dataTable.draw(); 
					});

					$('.high_range').keyup(function(){
						dataTable.draw(); 
					});

					$(".sort_by").on('change', function(){
						dataTable.draw(); 
					});
				});

				function sortFunction(){
					$( "#btn-reload" ).trigger( "click" );
				}
				</script>
				<script>
				$( document ).ready(function() {
					$(".search__filter-block-heading").on('click', function() {
						let $this = $(this);
						$this.toggleClass('is--active');
						$this.next().slideToggle();
					});

					$('.product-tabs__header-item').on('click', function() {
						let $parent, $this, $target;
						$this = $(this);
						$parent = $this.closest('.product-tabs');
						$target = $this.data('target');
						$parent.find('.product-tabs__header-item, .product-tabs__pane').removeClass('is--active');
						$this.addClass('is--active');
						$($target).addClass('is--active');
					});

					$('.product-filters-toggle').on('click', function() {
						$('.search__filter').addClass('is--active');
					});

					$('.filter-close').on('click', function() {
						$('.search__filter').removeClass('is--active');
					});
				});
				</script>
			</div>
		</div> 
	</body>
</html>