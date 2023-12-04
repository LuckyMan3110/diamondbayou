<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<style>
.loadingplease{background:none repeat scroll 0 0 #fff;display:block;height:380px;opacity:.7;position:absolute;text-align:center;width:400px;z-index:99999}
#diamond_grid_filter input[type="search"]{height:35px;border:solid 1px #ccc;padding:5px}
table.dataTable thead th,table.dataTable thead td{border-bottom:1px solid #ccc!important}
table.dataTable tfoot th,table.dataTable tfoot td{border-top:1px solid #ccc!important}
table.dataTable tbody th,table.dataTable tbody td{padding:0!important}
#loader{border:16px solid #f3f3f3;border-radius:50%;border-top:16px solid #3498db;width:120px;height:120px;-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite;margin-left:200px;margin-top:30px;position:absolute!important;top:50%;left:35%}
.dataTables_wrapper .dataTables_processing{position:absolute!important;top:3%!important;left:25%!important;width:100%!important;height:40px;margin-left:-50%;margin-top:-25px;padding-top:20px;background-color:transparent!important;background:transparent!important}
#diamond_grid_length{margin-bottom:10px}
.slider_cut{width:100%}
select:focus{color:#000!important;background-color:#fff!important}
#sort_by{width:16%;float:left;background-color:#fff;color:#000;margin-left:20px;text-align:center;padding-left:10px}
.clrtable ul.colorslide_lines{width:90%}
.clrtable ul.colorslide_lines li{margin:0 0 0 50px !important}
.clrtable ul.clarityslide_lines{width:90%}
.clrtable ul.clarityslide_lines li{margin:0 1px 0 45px !important}
table#clarity_table_new_list td{font-size:12px;padding:0 4px 5px 14px}
table#clarity_table_new_list tbody tr td:first-child{padding:5px 10px 5px 5px !important}
table#clarity_table_new_list tbody tr td:last-child{padding:10px 10px 5px 2px !important}
table#color_table_new_list tbody tr td{padding:10px 0;width:11%;text-align:right;vertical-align:bottom;position:relative;left:12px}
table#color_table_new_list tbody tr td:first-child{padding:5px 10px 5px 5px !important}
table#color_table_new_list tbody tr td:last-child{padding:10px 10px 5px 2px !important}
.set_color_field ul li {padding: 6px 7px;}
@media (max-width: 768px) {
input,.uneditable-input{width:50px;text-align:center}
.ui-slider.ui-slider-horizontal .ui-slider-handle{top:1px}
table#clarity_table_new_list td{padding:11px 0}
}
</style>
<?php
function getCountResult($getTable,$fieldName,$value){
	$CI =& get_instance();
	$CI->db->where( array($fieldName => $value,'fcolor_value' => '','price >=' => '1') );
	$CI->db->from($getTable);

	return number_format($CI->db->count_all_results());
}
$sqlClr = "SELECT shape FROM dev_index_gemstones WHERE fcolor_value = '' AND shape != '' GROUP BY shape ORDER BY shape";
$queryClr = $this->db->query($sqlClr);
$resultClr = $queryClr->result_array();
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<div class="event_list_right_area" style="position: relative;">
	<h2 style="cursor:pointer;text-align:right;top:-10px;position:absolute;line-height:0;z-index:90;right:0;font-size:40px;color:#999;" onclick="eventFilterShowHideFunc()"><span class="show-hide-filter-icon"><i class="fa fa-angle-down"></i></span></h2>
</div>
<script>
function eventFilterShowHideFunc(){
	jQuery(".filter_show_hide").toggle();
	jQuery(".show-hide-filter-icon").find('i').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
}
</script>
<section class="main_content_bg">
	<div class="container set_col_pading">
		<div class="col-sm-4 result_page_left">
			<div class="set_page_subhead">Refine Your Search <button type="button" style="display:none;" id="btn-reload">Reload</button></div>
			<div class="result_page_content">
				<div class="filter_block_section">
                    <div class="inner_sub_heading">
                        Price
                        <span><a href="#">See All</a></span>
                        <div class="clear"></div>
                    </div>
                    <div class="fiter_item_row price_fiedl_filter">
                        <span>From $ <input type="text" name="price_from" class="amount" id="price_from" /></span>
                        <span>To $ <input type="text" name="price_to" class="amount2" id="price_to" /></span>
                    </div>
                    <div class="bottom_line"></div><br>
                    <div class="clear"></div>                    
                </div>
                <div class="filter_block_section">
                    <div class="inner_sub_heading">
                        Shape
                        <span><a href="#" onclick="searchDiamondFunc('shape', '')">See All</a></span>
                        <div class="clear"></div>
                    </div>
					<?php foreach($resultClr as $colr){ ?>
						<div class="fiter_item_row">
							<label><span><input name="shape" type="checkbox" id="shape_<?php echo str_replace(' ', '_', $colr['shape']);?>" class="shape_<?php echo str_replace(' ', '_', $colr['shape']);?>" value="<?php echo str_replace(' ', '_', $colr['shape']);?>" /></span>
							<span><b><?php echo $colr['shape'];?></b> (<?php echo getCountResult('dev_index_gemstones', 'shape', ''.$colr['shape'].''); ?>)</span></label>
						</div>
					<?php } ?>
                    <div class="bottom_line"></div><br>
                    <div class="clear"></div>                    
                </div>
            </div>
        </div>
		<style>
		table#diamond_grid tbody tr{width:33.33%;float:left;min-height:350px;height:100%;max-height:350px;background:#fff}
		table#diamond_grid .diamond_result_content{padding:0;margin:5px}
		table#diamond_grid .diamond_result_content h4{font-size:12px;padding:5px 0;height:65px}
		table#diamond_grid tbody tr{background-color:transparent}
		table.dataTable.stripe tbody tr.odd,table.dataTable.display tbody tr.odd{background-color:transparent}
		table.dataTable.display tbody tr.odd>.sorting_1,table.dataTable.order-column.stripe tbody tr.odd>.sorting_1{background-color:#fff}
		.overlay-quick-view{left:30%;font-size:12px}
		.overlay-details-view{left:20%;font-size:12px;font-weight:700;padding:15px 5px}
		.hover-jewelery-img-area{padding:5px 0;text-align:center;min-height:193px}
		table.dataTable.row-border tbody th,table.dataTable.row-border tbody td,table.dataTable.display tbody th,table.dataTable.display tbody td{border-top:none}
		img.detl-img1{width:190px;height:183px}
		img.detl-img2{width:190px;height:183px;display:none}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		table#diamond_grid .add_tocart_btn{padding:5px 10px}
		.main_item_price{padding:10px}
		@media only screen and (device-width: 768px) {
		.result_page_right{width:100%}
		table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
		img.detl-img2{width:182px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0;left:0}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0;height:182px}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		}
		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
		.result_page_right{width:100%}
		table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0;height:182px}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		}
		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
		.result_page_right{width:100%}
		table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0;height:182px}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		}
		@media (max-width: 767px) {
		table#diamond_grid .diamond_result_content{border:1px solid #cacc0c}
		.result_page_right{width:100%}
		table#diamond_grid tbody tr{width:100%;float:none;min-height:auto;height:auto;max-height:auto;background:#fff}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0;height:182px}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		}
		</style>
		<div class="col-sm-8 result_page_right pull-right">
			<div class="col-sm-5 set_page_subhead"></div>
			<div class="col-sm-5 pull-right text-right"></div>
			<div class="clear"></div>
			<table id="diamond_grid" class="display" style="width:100%">
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
	<div class="clear"></div>
</section>
<script>
$( document ).ready(function() {
	var dataTable = $('#diamond_grid').DataTable({
		"serverSide": true,
		'processing': true,
		"lengthMenu": [[15, 21, 30, 32, 50, 100, 200], [15, 21, 30, 32, 50, 100, 200]],
		"pageLength": 21,
		'oLanguage': {"sSearch": "Enter Sku Number:", sProcessing: '<div class="loadingplease" id="loadingplease" style="position: fixed;width: 100vw;height: 100vh;top: 0;left: 0;background-color: rgba(255, 255, 255, 0.9);justify-content: center;align-items: center;"> <img src="https://thumbs.gfycat.com/AnimatedImpureAmericancicada-max-1mb.gif" style="padding-top: 90px;max-width: 100%;"></div>'},
		"ajax":{
			url :"<?php echo SITE_URL; ?>diamonds/gemstones_search_realtime/",
			type: "post",
			'data' : function(data){
				<?php foreach($resultClr as $colr){ ?>
				var shape_<?php echo str_replace(' ', '_', $colr['shape']);?>	= '';
				if ($("#shape_<?php echo str_replace(' ', '_', $colr['shape']);?>").is(":checked")){ shape_<?php echo str_replace(' ', '_', $colr['shape']);?> = $("#shape_<?php echo str_replace(' ', '_', $colr['shape']);?>").val(); }
				<?php } ?>

				var sort_by         = '';
				if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

				var amount_min      = $('.amount').val();
				var amount_max      = $('.amount2').val();

				data.amount_min     = amount_min;
				data.amount_max     = amount_max;
				data.sort_by		= sort_by;
				<?php foreach($resultClr as $colr){ ?>
				data.shape_<?php echo str_replace(' ', '_', $colr['shape']);?>	= shape_<?php echo str_replace(' ', '_', $colr['shape']);?>;
				<?php } ?>
			},
			error: function(){
				$("#diamond_grid_processing").css("display","none");
			}
		}
	});

	setTimeout(function(){ 
		var html_input='<select class="form-control" id="sort_by" onchange="sortFunction()"><option value="">Default</option><option value="ASC">Low to High</option><option value="DESC">High to Low</option></select>';
		$('#diamond_grid_length').after(html_input);
	}, 2000);

	$('#btn-reload').on('click', function(){
		dataTable.ajax.reload();
	});

	<?php foreach($resultClr as $colr){ ?>
	$(".shape_<?php echo str_replace(' ', '_', $colr['shape']);?>").click(function(){  dataTable.draw(); });
	<?php } ?>

	$("#sort_by").change(function() {
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

	$(".amount").change(function() {
		$("#price_slider_range").slider('values',0,$(this).val());
		dataTable.draw();
	});

	$(".amount2").change(function() {
		$("#price_slider_range").slider('values',1,$(this).val());
		dataTable.draw();
	});
});

function sortFunction(){
	$( "#btn-reload" ).trigger( "click" );
}

function searchDiamondFunc(key, value){
    if(key == 'shape'){ 
        var checkBoxes = $("#shape_"+value);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        $(".shape_"+value).toggleClass('diamond-shape-active-box');
    }
    if(key == 'price'){ 
        $( "#btn-reload" ).trigger( "click" );
    }
}
</script>