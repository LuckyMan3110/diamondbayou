<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/css/lightslider.min.css' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/js/lightslider.min.js"></script>
<style>
#diamond_grid_filter input[type="search"]{height:35px;border:solid 1px #ccc;padding:5px}
table.dataTable thead th,table.dataTable thead td{border-bottom:1px solid #ccc!important}
table.dataTable tfoot th,table.dataTable tfoot td{border-top:1px solid #ccc!important}
table.dataTable tbody th,table.dataTable tbody td{padding:0!important}
#loader{border:16px solid #f3f3f3;border-radius:50%;border-top:16px solid #3498db;width:120px;height:120px;-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite;margin-left:200px;margin-top:30px;position:absolute!important;top:50%;left:35%}
.dataTables_wrapper .dataTables_processing{position:absolute!important;top:3%!important;left:25%!important;width:100%!important;height:40px;margin-left:-50%;margin-top:-25px;padding-top:20px;background-color:transparent!important;background:transparent!important}
#diamond_grid_length{margin-bottom:10px}
.icon{display:inline-block;width:16px;height:16px;vertical-align:middle;fill:currentcolor}
.modal-overlay{position:fixed;z-index:10;top:0;left:0;width:100%;height:100%;background:hsla(0,0%,0%,0.5);visibility:hidden;opacity:0;transition:visibility 0 linear 0.3s,opacity .3s}
.modal-wrapper{position:fixed;z-index:9999;top:10%;left:30%;min-height:450px;width:850px;margin-left:-16em;background-color:#fff;box-shadow:0 0 1.5em hsla(0,0%,0%,0.35)}
.add_to_cart_btn{margin:10px 0;border:solid 1px #E6A431}
.modal-transition{transition:all .3s .12s;transform:translateY(-10%);opacity:0}
.modal-header,.modal-content{padding:1em}
.view-diamond-modal-body{padding:15px}
.modal-header{position:relative;background-color:#fff;box-shadow:0 1px 2px hsla(0,0%,0%,0.06);border-bottom:1px solid #e8e8e8}
.modal-header h4{letter-spacing:0;text-align:left;font-weight:700;font-size:15px;margin:.5em 0}
.modal-close{position:absolute;top:-27px;right:-20px;padding:10px 15px;color:#fff;background:none;border:0;background-color:#E6A431;font-size:20px;border-radius:50px}
.modal-close:hover{color:#fff;color:#777}
.modal-heading{font-size:1.125em;margin:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
.modal-content > :first-child{margin-top:0}
.modal-content > :last-child{margin-bottom:0}
#more-details-view{border-color:#c4c1bc;border-image:none;border-style:solid solid none;border-width:1px 1px medium!important;font:11px Arial,Helvetica,sans-serif;border:1px solid #c4c1bc!important}
#more-details-view td{padding:2px!important;border-top:0 solid #c4c1bc!important;border-bottom:1px solid #c4c1bc!important}
#diamond-slider-area{width:350px;height:450px}
#diamond-slider-box,.view-diamond-modal-content{height:450px!important}
#diamond-slider-area ul{list-style:none outside none;padding-left:0;margin-bottom:0}
#diamond-slider-area li{display:block;float:left;margin-right:6px;cursor:pointer}
#diamond-slider-area img{display:block;height:auto;max-width:100%;border:solid 1px #ccc}
.lSGallery{width:350px!important}
.lSGallery li{width:60px!important;padding:3px}
</style>
<?php
function getCountResult($getTable,$where){
	$CI =& get_instance();
	$CI->db->where( $where );
	$CI->db->from($getTable);
	return number_format($CI->db->count_all_results());
}
function getCountResult1($getTable,$field,$where){
	$CI =& get_instance();
	$CI->db->like($field,$where,'both');
	$CI->db->from($getTable);
	return number_format($CI->db->count_all_results());
}
function filterCheckedOut($getKey, $getKeyName){
	if( isset($_GET[$getKey]) AND !empty($_GET[$getKey]) AND $_GET[$getKey] == $getKeyName ){
		return 'checked="checked"';
	}
}
function filterCheckedClassRect($getKey, $getKeyName){
	if( isset($_GET[$getKey]) AND !empty($_GET[$getKey]) AND $_GET[$getKey] == $getKeyName ){
		return 'class="active-reactectgular"';
	}
}

function filterCheckedSetClass($getKey, $getKeyName, $getClass){
	if( isset($_GET[$getKey]) AND !empty($_GET[$getKey]) AND $_GET[$getKey] == $getKeyName ){
		return 'class="'.$getClass.'"';
	}
}
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="sliderFilters row-fluid">
	<div class="filterCols col-sm-12 filter_show_hide" style="padding:15px 30px;">
		<table width="100%"  style="margin-top:20px;">
			<tr>
				<td width="15%" style="vertical-align: top;"><label>Price</label></td>
				<td width="85%" style="vertical-align: top;"> 
					<div id="price_slider_range"></div>
					<table width="100%">
						<tr>
							<td width="50%" style="text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="amount" class="diamond-search-input amount" value="<?php if($_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>"> <span class="filter_field_info">MIN</span><td>
							<td width="50%" style="text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input amount2" id="amount2" value="9999"><td>
						</tr>
					</table>
				</td>
			</tr>
		</table> 
	</div>
	<div class="clear"></div>
</div>
<div class="event_list_right_area" style="position: relative;">
	<h2 style="cursor: pointer;  text-align: right;  top: -10px;  position: absolute;  line-height: 0;  z-index: 90;  right: 0;font-size: 40px;color:#999;" onclick="eventFilterShowHideFunc()"><span class="show-hide-filter-icon"><i class="fa fa-angle-down"></i></span></h2>
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
				<div class="filter_block_section" style="display:;">
					<div class="inner_sub_heading">
						<?php echo 'Men Styles';?>
                        <div class="clear"></div>
                    </div>
                    <?php 
                    $make_dynamic_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('itshot_products', array(), 'product_category', 'product_price_off');
					$incree = 1;
                    foreach($make_dynamic_fields as $fields){
						if($fields['product_category']){
							$ch_id = "M".$incree."_".str_replace(' ','_',$fields['product_category']);
							$ch_id1 = str_replace("'",'_',$ch_id);
							if($fields['product_category'] != 'Mens Sterling Silver Rings'){
							?>
							<div class="fiter_item_row">
								<label>
									<span><input name="clarity" type="checkbox" id="<?= $ch_id1 ?>" class="<?= $ch_id1 ?>" value="<?= $fields['product_category'] ?>" /></span>
									<span><b><?= $fields['product_category'] ?></b> (<?php echo getCountResult('itshot_products', array('product_category' => $fields['product_category']) ); ?>)</span>
								</label>
							</div>
							<?php
							}
						}
					} ?>
					<div class="bottom_line"></div><br>
					<div class="clear"></div>                    
				</div>
				<div class="filter_block_section" style="display:;">
					<div class="inner_sub_heading">
						<?php echo 'Metals'; ?>
                        <div class="clear"></div>
                    </div>
                    <?php 
					$incree =2;
					$make_dynamic_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('itshot_products', array(), 'item_chart', 'product_price_off');
					$ch_array = array();
					$i = 0;
					foreach($make_dynamic_fields as $fields){
						$ch_id = explode('Metal</th><td class="data">',$fields['item_chart']);
						$ch_val = explode('</td>',$ch_id[1]);
						$ch_id = "M".$incree."_".str_replace(' ','_',$ch_val[0]);
						$ch_id1 = str_replace("'",'_',$ch_id);
						if($fields['item_chart'] && !in_array($ch_val[0],$ch_array)  && !empty($ch_val[0])){
							$ch_array[$i] = $ch_val[0];
							$i++;
							?>
							<div class="fiter_item_row">
								<label>
								<span><input name="clarity" type="checkbox" id="<?= $ch_id1 ?>" class="<?= $ch_id1 ?>" value="<?= $ch_val[0] ?>" /></span>
								<span><b><?= $ch_val[0] ?></b> (<?php echo getCountResult1('itshot_products', 'item_chart',$ch_val[0] ); ?>)</span>
								</label>
							</div>
						<?php
						}
					} ?>
                    <div class="bottom_line"></div><br>
                    <div class="clear"></div>                    
                </div>
                <?php $incree++; ?>
            </div>
        </div>
		<style>
		table#diamond_grid tbody tr{width:25%;float:left;min-height:350px;height:100%;max-height:350px;background:#fff;}
		table#diamond_grid .diamond_result_content{padding:0px;margin:5px;}
		table#diamond_grid .diamond_result_content h4{font-size:12px;padding:5px 0px;height:65px;}
		table#diamond_grid tbody tr{background-color:transparent;}
		table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd{background-color:transparent;}
		table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1{background-color:#fff;}
		.overlay-quick-view{left:30%;font-size: 12px;}
		.overlay-details-view{left:20%;font-size: 12px;font-weight: bold;padding:15px 5px;}
		.hover-jewelery-img-area{padding:5px 0px}
		table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td{border-top:none;}
		img.detl-img2{width:180px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0px;left:0;}
		img.detl-img2:hover{width:180px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:150px;}
		table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
		table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		table#diamond_grid .add_tocart_btn {padding: 5px 10px;}
		table#more-details-view tbody tr{width: initial;float: none;height: unset;}
		@media only screen and (device-width: 768px) {
			.result_page_right{width:100%;}
			table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2{width:180px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0px;left:0;}
			img.detl-img2:hover{width:180px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:150px;}
			table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}
		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
			.result_page_right{width:100%;}
			table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2:hover{width:180px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:150px;}
			table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}

		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
			.result_page_right{width:100%;}
			table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2:hover{width:180px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:150px;}
			table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}
		@media (max-width: 767px){
			.result_page_right{width:100%;}
			table#diamond_grid tbody tr{width:100%;float:none;min-height:auto;height:auto;max-height:auto;background:#fff;}
			img.detl-img2:hover{width:180px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:150px;}
			table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
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
		<div class="clear"></div>
	</div>
</section>
<script>
$( document ).ready(function() {
	var dataTable = $('#diamond_grid').DataTable({
		"serverSide": true,
		'processing': true,
		"pageLength": 32,
		'oLanguage': {sProcessing: "<div id='loader'></div>"},
		"ajax":{
			url :"<?php echo SITE_URL; ?>diamonds/men_diamond_realtime/",
			type: "post",
			'data' : function(data){
				// Read values.......................................................
				//------------------------------Amount-----------------------------------
				var amount_min      = $('.amount').val();
				var amount_max      = $('.amount2').val();
				<?php 
				$incree = 1;
				$make_dynamic_main_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('itshot_products', array(), 'product_category', 'product_price_off');
				foreach($make_dynamic_main_fields as $fields){
					if($fields['product_category']){
					?>
						var M<?= $incree ?>_<?= str_replace("'",'_',str_replace(' ','_',$fields['product_category'])) ?>         = '';
						if ($('#M<?= $incree ?>_<?= str_replace("'",'_',str_replace(' ','_',$fields['product_category'])) ?>').is(":checked")){ M<?= $incree ?>_<?= str_replace("'",'_',str_replace(' ','_',$fields['product_category'])) ?> = $('#M<?= $incree ?>_<?= str_replace("'",'_',str_replace(' ','_',$fields['product_category'])) ?>').val(); }
						data.M<?= $incree ?>_<?= str_replace("'",'_',str_replace(' ','_',$fields['product_category'])) ?>        = M<?= $incree ?>_<?= str_replace("'",'_',str_replace(' ','_',$fields['product_category'])) ?>;
					<?php 
					}
				}
				$incree = 2;
				$ch_array = array();
				$i = 0;
				$make_dynamic_main_fields1	=  $this->diamondmodel->getdata_any_table_distinct_order_where('itshot_products', array(), 'item_chart', 'product_price_off');
				foreach($make_dynamic_main_fields1 as $fields1){
					$ch_id = explode('Metal</th><td class="data">',$fields1['item_chart']);
					$ch_val = explode('</td>',$ch_id[1]);
					$ch_id = "M".$incree."_".str_replace(' ','_',$ch_val[0]);
					$ch_id1 = str_replace("'",'_',$ch_id);
					if($fields1['item_chart'] && !in_array($ch_val[0],$ch_array) && !empty($ch_val[0])){
						$ch_array[$i] = $ch_val[0];
						$i++;
						?>
						var <?= $ch_id1 ?>   = '';
						if ($('#<?= $ch_id1 ?>').is(":checked")){ <?= $ch_id1 ?> = $('#<?= $ch_id1 ?>').val(); }
						data.M<?= $ch_id1 ?>    = <?= $ch_id1 ?>;
					<?php 
					}
				}
				?>
				// Append to data.......................................................
				//------------------------------Amount-----------------------------------
				data.amount_min     = amount_min;
				data.amount_max     = amount_max;
			},
			error: function(){
				$("#diamond_grid_processing").css("display","none");
			}
		}
	}); 

	$('#btn-reload').on('click', function(){
		dataTable.ajax.reload();
	});

    <?php 
	$incree = 1;
	$make_dynamic_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('itshot_products', array(), 'product_category', 'product_price_off');
	foreach($make_dynamic_fields as $fields){
		if($fields['product_category']){
		?>
			$(".M<?= $incree ?>_<?= str_replace("'",'_',str_replace(' ','_',$fields['product_category'])) ?>").click(function(){  dataTable.draw(); });
        <?php 
        }
    }
    $incree++;
    $ch_array = array();
	$i = 0;
	$make_dynamic_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('itshot_products', array(), 'item_chart', 'product_price_off');
    foreach($make_dynamic_fields as $fields){
		$ch_id = explode('Metal</th><td class="data">',$fields['item_chart']);
		$ch_val = explode('</td>',$ch_id[1]);
		$ch_id = "M".$incree."_".str_replace(' ','_',$ch_val[0]);
		$ch_id1 = str_replace("'",'_',$ch_id);  
        if($fields1['item_chart'] && !in_array($ch_val[0],$ch_array) && !empty($ch_val[0])){
			$ch_array[$i] = $ch_val[0];
			$i++;
			?>
			$(".<?= $ch_id1 ?>").click(function(){  dataTable.draw(); });
		<?php 
        }
    }
    ?>
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
});

function searchDiamondFunc(key, value){
    if(key == 'shape'){ 
        var checkBoxes = $("#shape_"+value);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        $(".shape_"+value).toggleClass('diamond-shape-active-box');
    }
    if(key == 'color'){ 
        var checkBoxes = $("#color_"+value);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        $(".color_"+value).toggleClass('active-reactectgular');
    }
    if(key == 'clarity'){ 
        $( "#btn-reload" ).trigger( "click" );
    }
    if(key == 'price'){ 
        $( "#btn-reload" ).trigger( "click" );
    }
    if(key == 'carat'){ 
        $( "#btn-reload" ).trigger( "click" );
    }
}

// price_slider_range
$( "#price_slider_range" ).slider({
	range: true,
	min: 0,
	max: 9999,
	values: [ <?php if($_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>, 9999 ],
	step: 200,
	start: function( event, ui ) {
        $(ui.handle).find('.ui-slider-tooltip').fadeIn();
    },
	slide: function( event, ui ) {
		$( ".amount" ).val( ui.values[0] );
		$( ".amount2" ).val( ui.values[1] );
		if(ui.values[0] > 0){
		    searchDiamondFunc( 'price', ui.values[0] );
		}
	}
});

$(".amount").change(function() {
    $("#price_slider_range").slider('values',0,$(this).val());
    dataTable.draw();
});
$(".amount2").change(function() {
    $("#price_slider_range").slider('values',1,$(this).val());
    dataTable.draw();
});
function get_img(cur_id,img_src){
    $("#"+cur_id).attr("src", img_src);
}
</script>
<?php
$segment = explode("/",$_SERVER['REQUEST_URI']);
if(!empty($segment)){
	if(!empty($segment[4])){
		$srchShape = $segment[4];
	}else{
		$srchShape = $segment[3];
	}
	if($srchShape == 'diamond_rings'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Mens_Diamond_Rings").trigger("check");
			$("#M1_Mens_Diamond_Rings").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'luxurman_diamond_rings'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Luxurman_Men_s_Diamond_Rings").trigger("check");
			$("#M1_Luxurman_Men_s_Diamond_Rings").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'wedding_rings'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Mens_Wedding_Rings").trigger("check");
			$("#M1_Mens_Wedding_Rings").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'black_onyx_rings'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Mens_Black_Onyx_Rings").trigger("check");
			$("#M1_Mens_Black_Onyx_Rings").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'diamond_eternity_bands'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Men_s_Diamond_Eternity_Bands").trigger("check");
			$("#M1_Men_s_Diamond_Eternity_Bands").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'gold_rings'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Mens_Gold_Rings").trigger("check");
			$("#M1_Mens_Gold_Rings").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'diamond_engagement_rings'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Diamond_Engagement_Rings").trigger("check");
			$("#M1_Diamond_Engagement_Rings").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'luxurman_diamond_wedding_bands'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Luxurman_Diamond_Wedding_Bands").trigger("check");
			$("#M1_Luxurman_Diamond_Wedding_Bands").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'three_stone_engagement_rings'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Three_Stone_Engagement_Rings").trigger("check");
			$("#M1_Three_Stone_Engagement_Rings").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'mens_sterling_slver_rings'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Mens_Sterling_Silver_Rings").trigger("check");
			$("#M1_Mens_Sterling_Silver_Rings").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}elseif($srchShape == 'bridal_ring_sets'){ 
	?>
		<script>
		$(window).on('load', function (){
			$("#M1_Bridal_Ring_Sets").trigger("check");
			$("#M1_Bridal_Ring_Sets").attr("checked","checked");
			$("#btn-reload").trigger("click");
		});
		</script>
	<?php
	}
}
?>