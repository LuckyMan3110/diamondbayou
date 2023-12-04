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
#containt{width:1050px}
.content{padding:0px}
.engagement-right{width:100%}
.search-result .container{padding:0px}
.search-result .product-listing{margin:0px;max-width:100%}
#ring_grid_filter input[type="search"]{height:35px;border:solid 1px #ccc;padding:5px}
table.dataTable thead th,table.dataTable thead td{border-bottom:1px solid #ccc!important}
table.dataTable tfoot th,table.dataTable tfoot td{border-top:1px solid #ccc!important}
table.dataTable tbody th,table.dataTable tbody td{padding:0!important}
#loader{border:16px solid #f3f3f3;border-radius:50%;border-top:16px solid #3498db;width:120px;height:120px;-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite;margin-left:200px;margin-top:30px;position:absolute!important;top:50%;left:35%}
.dataTables_wrapper .dataTables_processing{position:absolute!important;top:3%!important;left:25%!important;width:100%!important;height:40px;margin-left:-50%;margin-top:-25px;padding-top:20px;background-color:transparent!important;background:transparent!important}
#diamond_grid_length{margin-bottom:10px}
table#ring_grid tbody tr{width:33.33%;float:left;min-height:500px;height:100%;max-height:500px;background:#fff;text-align:center}
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
<article class="container_12" id="main-body-a"> 
	<section id="main" class="engagement">
		<div id="containt">
			<div class="content">
				<div class="engagement-right">
					<div class="bread-crumb">
						<div class="breakcrum_bk">
							<ul>
								<li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
								<li><a href="#javascript;"><?php echo $maincate_name; ?></a></li>
								<input type="hidden" id="searchField" value="<?= isset($maincate_id)?$maincate_id:'';?>">
							</ul>
						</div>
						<div class="clear"></div>
					</div>
					<div style="background-color: #fff;">
						<div class="search-result">
							<div class="container">
								<div class="container__row">
									<main class="product-listing">
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
								"lengthMenu": [[10, 20, 30, 40, 50, 100, 200], [10, 20, 30, 40, 50, 100, 200]],
								"pageLength": 30,
								'oLanguage': {sProcessing: "<div id='loader'></div>"},
								"ajax":{
									url :"<?php echo SITE_URL; ?>Rings/getcatsearchresult/",
									type: "post",
									'data' : function(data){
										var searchField	= '';
										if ($("#searchField").val() != ""){ searchField = $('#searchField').val(); }
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
						});

						function sortFunction(){
							$( "#btn-reload" ).trigger( "click" );
						}
						</script>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</section>
</article>