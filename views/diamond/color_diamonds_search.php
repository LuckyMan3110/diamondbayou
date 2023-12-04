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
.filter_show_hide .col-sm-6{min-height:125px}
.color-diamonds-icon-area li{text-align:center;min-width:65px}
.slider_cut{width:100%}
select:focus{color:#000!important;background-color:#fff!important}
#sort_by{width:16%;float:left;background-color:#fff;color:#000;margin-left:20px;text-align:center;padding-left:10px}
.clrtable ul.colorslide_lines{width:90%}
.clrtable ul.clarityslide_lines{width:90%}
.colorslide_lines li{margin:5px 5px 0 46px !important}
.clarityslide_lines li:first-child{margin-left:45px!important;margin-right:24px!important}
.clarityslide_lines li{margin:0 20px 0 24px !important}
.hover-jewelery-img-area{text-align:center}
@media (max-width: 768px) {
input#carat_min{width:50px;height:25px}
input#carat_max{width:50px;height:25px}
input#amount{width:50px;height:25px}
input#amount2{width:50px;height:25px}
.ui-slider.ui-slider-horizontal .ui-slider-handle{top:-2px}
.hover-jewelery-img-area{text-align:center}
}
</style>
<?php
function getCountResult($getTable,$fieldName,$value){
	$CI =& get_instance();
	$CI->db->where( array($fieldName => $value,'fcolor_value !=' => '','price >=' => 1) );
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
$sqlClr = "SELECT shape FROM dev_index WHERE fcolor_value != '' AND shape != '' GROUP BY shape ORDER BY shape";
$queryClr = $this->db->query($sqlClr);
$resultClr = $queryClr->result_array();
?>
<div class="tabs_content_area">
	<ul class="set_diamond_shapes_list">
		<?php
		$shape_list = array(
			'Round'=>array('one','round', 'round_sic', 'round_sh_ic.jpg', 'Round'),
			'Princess'=>array('two','princess', 'princes_sic', 'princess_sh_ic.jpg', 'Princess'),
			'Cushion'=>array('ten','cushion', 'cushion_sic', 'cushion_sh_ic.jpg', 'Cushion'),
			'Radiant'=>array('seven','radiant', 'radiant_sic', 'radiant_sh_ic.jpg', 'Radiant'),
			'Emerald'=>array('three','emerald', 'emearld_sic', 'emerald_sh_ic.jpg', 'Emerald'),
			'Pear'=>array('eight','pear', 'pear_sic', 'pear_sh_ic.jpg', 'Pear'),
			'Oval'=>array('six','oval', 'oval_sic', 'oval_sh_ic.jpg', 'Oval'),
			'Asscher'=>array('four','asscher', 'asscher_sic', 'asscher_sh_ic.jpg', 'Asscher'),
			'Marquise'=>array('five','marquise', 'marquise_sic', 'marquise_sh_ic.jpg', 'Marquise'),
			'Heart'=>array('nine','heart', 'heart_sic', 'heart_sh_ic.jpg', 'Heart')
		);

		$shape_view_list = ''; $i = 0;
		foreach ( $shape_list  as $shkey => $keyvalue ) {
			$diamond_shape = view_shape_value($shapeimg, $shkey);
			$imgeOverIcon = str_replace('_sic', '_sic_ov', $keyvalue[2]);
			$active_class = ( $i == 1 ? 'class=""' : '' );
			$shape_name      = 'shape';
			?>
			<li class="shape_<?= $shkey ?>" onclick="searchDiamondFunc('shape', '<?= $shkey ?>')" <?php echo filterCheckedSetClass('shape', ''.$shkey.'', 'diamond-shape-active-box'); ?>>
				<div><a href="#javascript"><img src="<?= SITE_URL ?>assets/site_images/<?= $keyvalue[3] ?>" alt="<?= $keyvalue[4] ?>" /></a></div>
				<div><a href="#javascript"><span><?= $keyvalue[4] ?></span></a></div>   
			</li>
			<?php
			$i++;
		}
		echo $shape_view_list;
		?>                        
	</ul>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="sliderFilters row-fluid">
	<div class="filterCols col-sm-12 filter_show_hide" style="padding:15px 30px;">
		<style>
		.set_color_field ul li{padding: 6px 7px;}
		</style>
		<div class="col-sm-12">
			<table width="100%" style="margin-top:0px;">
				<tr>
					<td width="100%" style="vertical-align: top;padding-bottom: 10px;"><label>Color</label></td>
				</tr>
				<tr>
					<td width="100%" style="vertical-align: top;"> 
						<!--Black Brown Yellow Blue Green Gray  Orange Pink Cognac Purple Red White Champagne Other-->
						<div class="slider_set_view_diamond_icon">
							<div class="set_color_field color-diamonds-icon-area">
								<ul>
									<li <?php echo filterCheckedClassRect('color', 'Black'); ?> onclick="searchDiamondFunc('color', 'Black')" class="color_Black"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Black.png" alt="Black" /><br>Black</li>
									<li <?php echo filterCheckedClassRect('color', 'Brown'); ?> onclick="searchDiamondFunc('color', 'Brown')" class="color_Brown"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Brown.png" alt="Brown" /><br>Brown</li>
									<li <?php echo filterCheckedClassRect('color', 'Yellow'); ?> onclick="searchDiamondFunc('color', 'Yellow')" class="color_Yellow"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Yellow.png" alt="Yellow" /><br>Yellow</li>
									<li <?php echo filterCheckedClassRect('color', 'Blue'); ?> onclick="searchDiamondFunc('color', 'Blue')" class="color_Blue"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Blue.png" alt="Blue" /><br>Blue</li>
									<li <?php echo filterCheckedClassRect('color', 'Green'); ?> onclick="searchDiamondFunc('color', 'Green')" class="color_Green"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Green.png" alt="Green" /><br>Green</li>
									<li <?php echo filterCheckedClassRect('color', 'Gray'); ?> onclick="searchDiamondFunc('color', 'Gray')" class="color_Gray"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Gray.png" alt="Gray" /><br>Gray</li>
									<li <?php echo filterCheckedClassRect('color', 'Orange'); ?> onclick="searchDiamondFunc('color', 'Orange')" class="color_Orange"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Orange.png" alt="Orange" /><br>Orange</li>
									<li <?php echo filterCheckedClassRect('color', 'Pink'); ?> onclick="searchDiamondFunc('color', 'Pink')" class="color_Pink"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Pink.png" alt="Pink" /><br>Pink</li>
									<li <?php echo filterCheckedClassRect('color', 'Cognac'); ?> onclick="searchDiamondFunc('color', 'Cognac')" class="color_Cognac"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Cognac.png" alt="Cognac" /><br>Cognac</li>
									<li <?php echo filterCheckedClassRect('color', 'Purple'); ?> onclick="searchDiamondFunc('color', 'Purple')" class="color_Purple"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Purple.png" alt="Purple" /><br>Purple</li>
									<li <?php echo filterCheckedClassRect('color', 'Red'); ?> onclick="searchDiamondFunc('color', 'Red')" class="color_Red"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Red.png" alt="Red" /><br>Red</li>
									<li <?php echo filterCheckedClassRect('color', 'White'); ?> onclick="searchDiamondFunc('color', 'White')" class="color_White"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/white.png" alt="White" /><br>White</li>
									<li <?php echo filterCheckedClassRect('color', 'Champagne'); ?> onclick="searchDiamondFunc('color', 'Champagne')" class="color_Champagne"><img src="<?php echo SITE_URL; ?>assets/colored-diamonds/Champagne.png" alt="Champagne" /><br>Champagne</li>
								</ul>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</td>
				</tr>
			</table>
		</div>

		<div class="col-sm-6">
			<table width="100%" style="margin-top:20px;<?php if($diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?>" >
				<tr>
					<td width="100%" style="vertical-align: top;padding-bottom: 10px;"><label>Carat</label></td>
				</tr>
				<tr>
					<td width="100%" style="vertical-align: top;"> 
						<div id="carat_slider_range"></div>
						<table width="100%">
							<tr>
								<td width="50%" style="text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="carat_min" class="diamond-search-input" value="<?php if(isset($_GET['carat']) && $_GET['carat']){ echo $_GET['carat']; }else{ echo 0; } ?>"> <span class="filter_field_info">MIN</span><td>
								<td width="50%" style="text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input" id="carat_max" value="15"><td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>

		<?php if($diamond_page_name != 'color-diamonds-search' && $diamond_page_name != 'solitaires-and-halos' && $diamond_page_name != 'watches'){ ?>
			<div class="col-sm-6">
				<table width="100%" class="clrtable" style="margin-top:20px;<?php if($diamond_page_name == 'color-diamonds-search' || $diamond_page_name == 'solitaires-and-halos' || $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
					<tr>
						<td width="100%" style="vertical-align: top;padding-bottom: 10px;"><label>Clarity</label></td>
                    </tr>
                    <tr>
						<td width="100%" style="vertical-align: top;">
							<div>
								<ul class="cutslider_lines clarityslide_lines">
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
									<li></li>
								</ul>
							</div>
							<div id="clarity_slider_range"></div>
							<div>
								<table id="clarity_table_new_list" style="width:100%;">
									<tr>
										<td>I1</td>
										<td>SI3</td>
										<td>SI2</td>
										<td>SI1</td>
										<td>VS2</td>
										<td>VS1</td>
										<td>VVS2</td>
										<td>VVS1</td>
										<td>FL</td>
										<td>IF</td>
									</tr>
									<tr>
										<td align="left"><input type="hidden" value="<?= isset($clarity_start)?$clarity_start:''; ?>" id="claritymin" class="w50px" onchange="modifyresult('claritymin',this.value)"></td>
										<td align="right"><input type="hidden" value="<?= isset($clarity_end)?$clarity_end:''; ?>" id="claritymax" class="w50px" onchange="modifyresult('claritymax',this.value)"></td>
									</tr>
								</table>
								<table width="100%">
									<tr>
										<td width="50%" style="display:none;text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="clarity_min" class="diamond-search-input" value=""> <span class="filter_field_info">MIN</span><td>
										<td width="50%" style="display:none;text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input" id="clarity_max" value=""><td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
			</div>
		<?php } ?>

		<div class="col-sm-6">
			<table width="100%">
				<tr>
					<td width="100%" style="vertical-align:top;padding-bottom: 10px;"><label>Price</label></td>
				</tr>
				<tr>
					<td width="100%" style="vertical-align:top;">
						<div id="price_slider_range"></div>
						<table width="100%">
							<tr>
								<td width="50%" style="text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="amount" class="diamond-search-input amount" value="<?php if(isset($_GET['price']) && $_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>"> <span class="filter_field_info">MIN</span><td>
								<td width="50%" style="text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input amount2" id="amount2" value="9999"><td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>

		<div class="col-sm-6">
			<table width="100%" style="margin-top:10px;display:; <?php if($diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
				<tr>
					<td width="10%" style="vertical-align: top;padding-bottom: 10px;"><label>Cut</label></td>
					<td width="90%" style="vertical-align: top;">
						<div class="slider_set_view slider_cut">
							<div class="set_color_field">
								<ul>
									<li onclick="searchDiamondFunc('cut', 'Excellent')" class="cut_Excellent">Excellent</li>
									<li onclick="searchDiamondFunc('cut', 'Very_Good')" class="cut_Very_Good">Very Good</li>
									<li onclick="searchDiamondFunc('cut', 'Good')" class="cut_Good">Good</li>
									<li onclick="searchDiamondFunc('cut', 'Ideal')" class="cut_Ideal">Ideal</li>
									<li onclick="searchDiamondFunc('cut', 'Fair')" class="cut_Fair">Fair</li>
									<li onclick="searchDiamondFunc('cut', 'Poor')" class="cut_Poor">Poor</li>
								</ul>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</td>
				</tr>
			</table> 
		</div>

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

				<div class="filter_block_section">
					<div class="inner_sub_heading">
						Cut
						<span><a href="#" onclick="searchDiamondFunc('color', '')">See All</a></span>
						<div class="clear"></div>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="cut" type="checkbox" id="cut_Excellent" class="cut_Excellent" value="Excellent" /></span>
						<span><b>Excellent</b> (<?php echo getCountResult('dev_index', 'cut', 'Excellent'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="cut" type="checkbox" id="cut_Very_Good" class="cut_Very_Good" value="Very Good" /></span>
						<span><b>Very Good</b> (<?php echo getCountResult('dev_index', 'cut', 'Very Good'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="cut" type="checkbox" id="cut_Good" class="cut_Good" value="Good" /></span>
						<span><b>Good</b> (<?php echo getCountResult('dev_index', 'cut', 'Good'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
                        <label><span><input name="cut" type="checkbox" id="cut_Ideal" class="cut_Ideal" value="Ideal" /></span>
                        <span><b>Ideal</b> (<?php echo getCountResult('dev_index', 'cut', 'Ideal'); ?>)</span></label>
                    </div>
					<div class="fiter_item_row">
						<label><span><input name="cut" type="checkbox" id="cut_Fair" class="cut_Fair" value="Fair" /></span>
						<span><b>Fair</b> (<?php echo getCountResult('dev_index', 'cut', 'Fair'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="cut" type="checkbox" id="cut_Poor" class="cut_Poor" value="Poor" /></span>
						<span><b>Poor</b> (<?php echo getCountResult('dev_index', 'cut', 'Poor'); ?>)</span></label>
					</div>
					<div class="bottom_line"></div><br>
					<div class="clear"></div>
				</div>

				<div class="filter_block_section">
					<div class="inner_sub_heading">
						Clarity
						<span><a href="#" onclick="searchDiamondFunc('clarity', '')">See All</a></span>
						<div class="clear"></div>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_IF" class="clarity_20" value="20" /></span>
						<span><b>IF</b> (<?php echo getCountResult('dev_index', 'clarity', 'IF'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_FL" class="clarity_100" value="100" /></span>
						<span><b>FL</b> (<?php echo getCountResult('dev_index', 'clarity', 'FL'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_VVS1" class="clarity_80" value="80" /></span>
						<span><b>VVS1</b> (<?php echo getCountResult('dev_index', 'clarity', 'VVS1'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_VVS2" class="clarity_90" value="90" /></span>
						<span><b>VVS2</b> (<?php echo getCountResult('dev_index', 'clarity', 'VVS2'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_VS1" class="clarity_60" value="60" /></span>
						<span><b>VS1</b> (<?php echo getCountResult('dev_index', 'clarity', 'VS1'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_VS2" class="clarity_70" value="70" /></span>
						<span><b>VS2</b> (<?php echo getCountResult('dev_index', 'clarity', 'VS2'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_SI1" class="clarity_30" value="30" /></span>
						<span><b>SI1</b> (<?php echo getCountResult('dev_index', 'clarity', 'SI1'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_SI2" class="clarity_40" value="40" /></span>
						<span><b>SI2</b> (<?php echo getCountResult('dev_index', 'clarity', 'SI2'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input name="clarity" type="checkbox" id="clarity_SI3" class="clarity_50" value="50" /></span>
						<span><b>SI3</b> (<?php echo getCountResult('dev_index', 'clarity', 'SI3'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label>
						<span><input name="clarity" type="checkbox" id="clarity_I1" class="clarity_10" value="10" /></span>
						<span><b>I1</b> (<?php echo getCountResult('dev_index', 'clarity', 'I1'); ?>)</span>
						</label>
					</div>
					<div class="bottom_line"></div><br>
					<div class="clear"></div>
				</div>

				<div class="filter_block_section">
					<div class="inner_sub_heading">
						Diamond Color
						<span><a href="#" onclick="searchDiamondFunc('color', '')">See All</a></span>
						<div class="clear"></div>
					</div>
					<div class="fiter_item_row" style="display:none;">
						<label><span><input name="" type="checkbox" id="color_D" class="color_D" value="D" /></span>
						<span><b>D</b> (<?php echo getCountResult('dev_index', 'color', 'D'); ?>)</span></label>
					</div>
					<div class="fiter_item_row" style="display:none;">
						<label><span><input name="" type="checkbox" id="color_E" class="color_E" value="E" /></span>
						<span><b>E</b> (<?php echo getCountResult('dev_index', 'color', 'E'); ?>)</span></label>
					</div>
					<div class="fiter_item_row" style="display:none;">
						<label><span><input name="" type="checkbox" id="color_F" class="color_F" value="F" /></span>
						<span><b>F</b> (<?php echo getCountResult('dev_index', 'color', 'F'); ?>)</span></label>
					</div>
					<div class="fiter_item_row" style="display:none;">
						<label><span><input name="" type="checkbox" id="color_G" class="color_G" value="G" /></span>
						<span><b>G</b> (<?php echo getCountResult('dev_index', 'color', 'G'); ?>)</span></label>
					</div>
					<div class="fiter_item_row" style="display:none;">
						<label><span><input name="" type="checkbox" id="color_H" class="color_H" value="H" /></span>
						<span><b>H</b> (<?php echo getCountResult('dev_index', 'color', 'H'); ?>)</span></label>
					</div>
					<div class="fiter_item_row" style="display:none;">
						<label><span><input name="" type="checkbox" id="color_I" class="color_I" value="I" /></span>
						<span><b>I</b> (<?php echo getCountResult('dev_index', 'color', 'I'); ?>)</span></label>
					</div>
					<div class="fiter_item_row" style="display:;">
						<label><span><input name="" type="checkbox" id="color_Black" class="color_Black" value="Black" /></span>
						<span><b>Black</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Black'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Brown" class="color_Brown" value="Brown" /></span>
						<span><b>Brown</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Brown'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Yellow" class="color_Yellow" value="Yellow" /></span>
						<span><b>Yellow</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Yellow'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:none;">
						<label><span><input name="" type="checkbox" id="color_Blue" class="color_Blue" value="Blue" /></span>
						<span><b>Blue</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Blue'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Green" class="color_Green" value="Green" /></span>
						<span><b>Green</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Green'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Gray" class="color_Gray" value="Gray" /></span>
						<span><b>Gray</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Gray'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Orange" class="color_Orange" value="Orange" /></span>
						<span><b>Orange</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Orange'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Pink" class="color_Pink" value="Pink" /></span>
						<span><b>Pink</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Pink'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Cognac" class="color_Cognac" value="Cognac" /></span>
						<span><b>Cognac</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Cognac'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Purple" class="color_Purple" value="Purple" /></span>
						<span><b>Purple</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Purple'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Red" class="color_Red" value="Red" /></span>
						<span><b>Red</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Red'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_White" class="color_White" value="White" /></span>
						<span><b>White</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'White'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Champagne" class="color_Champagne" value="Champagne" /></span>
						<span><b>Champagne</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Champagne'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:;">
						<label><span><input name="" type="checkbox" id="color_Other" class="color_Other" value="Other" /></span>
						<span><b>Other</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Other'); ?>)</span></label>
					</div>
					<div class="fiter_item_row"  style="display:none;">
						<label><span><input name="" type="checkbox" id="color_Fancy_Color" class="color_Fancy_Color" value="Fancy Color" /></span>
						<span><b>Fancy Color</b> (<?php echo getCountResult('dev_index', 'fcolor_value', 'Fancy Color'); ?>)</span></label>
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
							<span><b><?php echo $colr['shape'];?></b> (<?php echo getCountResult('dev_index', 'shape', ''.$colr['shape'].''); ?>)</span></label>
						</div>
					<?php } ?>
					<div class="bottom_line"></div><br>
					<div class="clear"></div>
				</div>

                <div class="filter_block_section" style="display:none;">
                    <div class="inner_sub_heading">
                        Total Carat Weight
                        <span><a href="#">See All</a></span>
                        <div class="clear"></div>
                    </div>
                    <div class="fiter_item_row">
                        <span><input name="" type="checkbox" <?php echo filterCheckedOut('carat', '0|0.24'); ?> onclick="searchDiamondFunc('carat', '0|0.24')" value="0.24" /></span>
                        <span><b>0.24 & Under</b> (21,008)</span>
                    </div>
                    <div class="fiter_item_row">
                        <span><input name="" type="checkbox" <?php echo filterCheckedOut('carat', '0.50|0.74'); ?> onclick="searchDiamondFunc('carat', '0.50|0.74')" value="Y" /></span>
                        <span><b>0.50 - 0.74</b> (16,262)</span>
                    </div>
                    <div class="fiter_item_row">
                        <span><input name="" type="checkbox" <?php echo filterCheckedOut('carat', '100|1.24'); ?> onclick="searchDiamondFunc('carat', '100|1.24')" value="Y" /></span>
                        <span><b>100 - 1.24</b> (37,727)</span>
                    </div>
                    <div class="fiter_item_row">
                        <span><input name="" type="checkbox" <?php echo filterCheckedOut('carat', '1.25|1.49'); ?> onclick="searchDiamondFunc('carat', '1.25|1.49')" value="Y" /></span>
                        <span><b>1.25 - 1.49</b> (7,612)</span>
                    </div>
                    <div class="fiter_item_row">
                        <span><input name="" type="checkbox" <?php echo filterCheckedOut('carat', '1.50|1.74'); ?> onclick="searchDiamondFunc('carat', '1.50|1.74')" value="Y" /></span>
                        <span><b>1.50 0 1.74</b> (15,181)</span>
                    </div>
                    <div class="fiter_item_row">
                        <span><input name="" type="checkbox" <?php echo filterCheckedOut('carat', '1.75|1.99'); ?> onclick="searchDiamondFunc('carat', '1.75|1.99')" value="Y" /></span>
                        <span><b>1.75 - 1.99</b> (3,388)</span>
                    </div>
                    <div class="fiter_item_row">
                        <span><input name="" type="checkbox" <?php echo filterCheckedOut('carat', '2.00|4.99'); ?> onclick="searchDiamondFunc('carat', '2.00|4.99')" value="Y" /></span>
                        <span><b>2.00 - 4.99</b> (22,311)</span>
                    </div>
                    <div class="fiter_item_row">
                        <span><input name="" type="checkbox" <?php echo filterCheckedOut('carat', '5.00|9.99'); ?> onclick="searchDiamondFunc('carat', '5.00|9.99')" value="Y" /></span>
                        <span><b>5.00 - 9.99</b> (2,346)</span>
                    </div>
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
		.hover-jewelery-img-area{padding:5px 0}
		table.dataTable.row-border tbody th,table.dataTable.row-border tbody td,table.dataTable.display tbody th,table.dataTable.display tbody td{border-top:none}
		img.detl-img2{width:182px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0;left:30px;height:186px;text-align:center}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:30px;height:186px}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		table#diamond_grid .add_tocart_btn{padding:5px 10px}
		.main_item_price{padding:10px}
		@media only screen and (device-width: 768px) {
		.result_page_right{width:100%}
		table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
		img.detl-img2{width:182px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0;left:0}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0;height:186px}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		}
		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
		.result_page_right{width:100%}
		table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0;height:186px}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		}
		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
		.result_page_right{width:100%}
		table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0;height:186px}
		table#diamond_grid .modal-header h4{font-size:initial;padding:initial;height:auto}
		table#diamond_grid .add-to-cart-1 table thead tr{width:initial;float:none;height:unset}
		}
		@media (max-width: 767px) {
		table#diamond_grid .diamond_result_content{border:1px solid #cacc0c}
		.result_page_right{width:100%}
		table#diamond_grid tbody tr{width:100%;float:none;min-height:auto;height:auto;max-height:auto;background:#fff}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0;left:0;height:186px}
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
		<div class="clear"></div>
	</div>
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
			url :"<?php echo SITE_URL; ?>diamonds/color_diamonds_search_realtime/",
			type: "post",
			'data' : function(data){
				//------------------------------Shape-----------------------------------
				<?php foreach($resultClr as $colr){ ?>
				var shape_<?php echo str_replace(' ', '_', $colr['shape']);?>	= '';
				if ($("#shape_<?php echo str_replace(' ', '_', $colr['shape']);?>").is(":checked")){ shape_<?php echo str_replace(' ', '_', $colr['shape']);?> = $("#shape_<?php echo str_replace(' ', '_', $colr['shape']);?>").val(); }
				<?php } ?>

				//------------------------------Clarity-----------------------------------
				var clarity_I1         = '';
				if ($('#clarity_I1').is(":checked")){ clarity_I1 = $('#clarity_I1').val(); }
				var clarity_IF         = '';
				if ($('#clarity_IF').is(":checked")){ clarity_IF = $('#clarity_IF').val(); }
				var clarity_SI1         = '';
				if ($('#clarity_SI1').is(":checked")){ clarity_SI1 = $('#clarity_SI1').val(); }
				var clarity_SI2         = '';
				if ($('#clarity_SI2').is(":checked")){ clarity_SI2 = $('#clarity_SI2').val(); }
				var clarity_SI3         = '';
				if ($('#clarity_SI3').is(":checked")){ clarity_SI3 = $('#clarity_SI3').val(); }
				var clarity_VS1         = '';
				if ($('#clarity_VS1').is(":checked")){ clarity_VS1 = $('#clarity_VS1').val(); }
				var clarity_VS2         = '';
				if ($('#clarity_VS2').is(":checked")){ clarity_VS2 = $('#clarity_VS2').val(); }
				var clarity_VVS1         = '';
				if ($('#clarity_VVS1').is(":checked")){ clarity_VVS1 = $('#clarity_VVS1').val(); }
				var clarity_VVS2         = '';
				if ($('#clarity_VVS2').is(":checked")){ clarity_VVS2 = $('#clarity_VVS2').val(); }
				var clarity_FL         = '';
				if ($('#clarity_FL').is(":checked")){ clarity_FL = $('#clarity_FL').val(); }

				//------------------------------Color-----------------------------------
				var color_D         = '';
				if ($('#color_D').is(":checked")){ clarity_I1 = $('#color_D').val(); }
				var color_E         = '';
				if ($('#color_E').is(":checked")){ color_E = $('#color_E').val(); }
				var color_F         = '';
				if ($('#color_F').is(":checked")){ color_F = $('#color_F').val(); }
				var color_G         = '';
				if ($('#color_G').is(":checked")){ color_G = $('#color_G').val(); }
				var color_H         = '';
				if ($('#color_H').is(":checked")){ color_H = $('#color_H').val(); }
				var color_I         = '';
				if ($('#color_I').is(":checked")){ color_I = $('#color_I').val(); }
				var color_J         = '';
				if ($('#color_J').is(":checked")){ color_J = $('#color_J').val(); }
				var color_K         = '';
				if ($('#color_K').is(":checked")){ color_K = $('#color_K').val(); }
				var color_L         = '';
				if ($('#color_L').is(":checked")){ color_L = $('#color_L').val(); }
				var color_M         = '';
				if ($('#color_M').is(":checked")){ color_M = $('#color_M').val(); }
				var color_N         = '';
				if ($('#color_N').is(":checked")){ color_N = $('#color_N').val(); }
				var color_Z         = '';
				if ($('#color_Z').is(":checked")){ color_Z = $('#color_Z').val(); }
				var color_Fancy_Color         = '';
				if ($('#color_Fancy_Color').is(":checked")){ color_Fancy_Color = $('#color_Fancy_Color').val(); }

				// Black Brown Yellow Blue Green Gray  Orange Pink Cognac Purple Red White Champagne Other
				var color_Black         = '';
				if ($('#color_Black').is(":checked")){ color_Black = $('#color_Black').val(); }
				var color_Brown         = '';
				if ($('#color_Brown').is(":checked")){ color_Brown = $('#color_Brown').val(); }
				var color_Yellow         = '';
				if ($('#color_Yellow').is(":checked")){ color_Yellow = $('#color_Yellow').val(); }
				var color_Blue         = '';
				if ($('#color_Blue').is(":checked")){ color_Blue = $('#color_Blue').val(); }
				var color_Green         = '';
				if ($('#color_Green').is(":checked")){ color_Green = $('#color_Green').val(); }
				var color_Gray         = '';
				if ($('#color_Gray').is(":checked")){ color_Gray = $('#color_Gray').val(); }
				var color_Orange         = '';
				if ($('#color_Orange').is(":checked")){ color_Orange = $('#color_Orange').val(); }
				var color_Pink         = '';
				if ($('#color_Pink').is(":checked")){ color_Pink = $('#color_Pink').val(); }
				var color_Cognac         = '';
				if ($('#color_Cognac').is(":checked")){ color_Cognac = $('#color_Cognac').val(); }
				var color_Purple         = '';
				if ($('#color_Purple').is(":checked")){ color_Purple = $('#color_Purple').val(); }
				var color_Red         = '';
				if ($('#color_Red').is(":checked")){ color_Red = $('#color_Red').val(); }
				var color_White         = '';
				if ($('#color_White').is(":checked")){ color_White = $('#color_White').val(); }
				var color_Champagne         = '';
				if ($('#color_Champagne').is(":checked")){ color_Champagne = $('#color_Champagne').val(); }
				var color_Other        = '';
				if ($('#color_Other').is(":checked")){ color_Other = $('#color_Other').val(); }

				//------------------------------Cut-----------------------------------
				var cut_Excellent         = '';
				if ($('#cut_Excellent').is(":checked")){ cut_Excellent = $('#cut_Excellent').val(); }
				var cut_Very_Good         = '';
				if ($('#cut_Very_Good').is(":checked")){ cut_Very_Good = $('#cut_Very_Good').val(); }
				var cut_Good         = '';
				if ($('#cut_Good').is(":checked")){ cut_Good = $('#cut_Good').val(); }
				var cut_Fair         = '';
				if ($('#cut_Fair').is(":checked")){ cut_Fair = $('#cut_Fair').val(); }
				var cut_Poor         = '';
				if ($('#cut_Poor').is(":checked")){ cut_Poor = $('#cut_Poor').val(); }

				var sort_by         = '';
				if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

				var carat_min       = $('#carat_min').val();
				var carat_max       = $('#carat_max').val();

				var amount_min      = $('.amount').val();
				var amount_max      = $('.amount2').val();

				var clarity_min     = $('#clarity_min').val();
				var clarity_max     = $('#clarity_max').val();

				//------------------------------Carat-----------------------------------
				data.carat_min      = carat_min;
				data.carat_max      = carat_max;

				//------------------------------Amount-----------------------------------
				data.amount_min     = amount_min;
				data.amount_max     = amount_max;

				//------------------------------Clarity-----------------------------------
				data.clarity_min    = clarity_min;
				data.clarity_max    = clarity_max;

				//------------------------------Sort by-----------------------------------
				data.sort_by		= sort_by;

				//------------------------------Color-----------------------------------
				data.color_D        = color_D;
				data.color_E        = color_E;
				data.color_F        = color_F;
				data.color_G        = color_G;
				data.color_H        = color_H;
				data.color_I        = color_I;
				data.color_J        = color_J;
				data.color_K        = color_K;
				data.color_L        = color_L;
				data.color_M        = color_M;
				data.color_N        = color_N;
				data.color_Z        = color_Z;
				data.color_Fancy_Color        = color_Fancy_Color;

				// Black Brown Yellow Blue Green Gray  Orange Pink Cognac Purple Red White Champagne Other
				data.color_Black	= color_Black;
				data.color_Brown	= color_Brown;
				data.color_Yellow	= color_Yellow;
				data.color_Blue		= color_Blue;
				data.color_Green	= color_Green;
				data.color_Gray		= color_Gray;
				data.color_Orange	= color_Orange;
				data.color_Pink		= color_Pink;
				data.color_Cognac	= color_Cognac;
				data.color_Purple	= color_Purple;
				data.color_Red		= color_Red;
				data.color_White	= color_White;
				data.color_Champagne= color_Champagne;
				data.color_Other	= color_Other;

				//------------------------------Cut-----------------------------------
				data.cut_Excellent   = cut_Excellent;
				data.cut_Very_Good   = cut_Very_Good;
				data.cut_Good        = cut_Good;
				data.cut_Fair        = cut_Fair;
				data.cut_Poor        = cut_Poor;

				//------------------------------Shape-----------------------------------
				<?php foreach($resultClr as $colr){ ?>
				data.shape_<?php echo str_replace(' ', '_', $colr['shape']);?>	= shape_<?php echo str_replace(' ', '_', $colr['shape']);?>;
				<?php } ?>

				//------------------------------Clarity-----------------------------------
				data.clarity_I1     = clarity_I1;
				data.clarity_IF     = clarity_IF;
				data.clarity_SI1    = clarity_SI1;
				data.clarity_SI2    = clarity_SI2;
				data.clarity_SI3    = clarity_SI3;
				data.clarity_VS1    = clarity_VS1;
				data.clarity_VS2    = clarity_VS2;
				data.clarity_VVS1   = clarity_VVS1;
				data.clarity_VVS2   = clarity_VVS2;
				data.clarity_FL     = clarity_FL;
			},
			error: function(){
				$("#diamond_grid_processing").css("display","none");
			}
		}
	});

	setTimeout(function(){ 
		var html_input='<select class="form-control" id="sort_by" onchange="sortFunction()"><option value="">Default</option><option value="ASC">Low to High</option><option value="DESC">High to Low</option></select>';
		$('#diamond_grid_length').after(html_input);
	}, 5000);

	$('#btn-reload').on('click', function(){
		dataTable.ajax.reload();
	});

    $('.color_D').click(function(){  dataTable.draw(); });
    $('.color_E').click(function(){  dataTable.draw(); });
    $('.color_F').click(function(){  dataTable.draw(); });
    $('.color_G').click(function(){  dataTable.draw(); });
    $('.color_H').click(function(){  dataTable.draw(); });
    $('.color_I').click(function(){  dataTable.draw(); });
    $('.color_J').click(function(){  dataTable.draw(); });
    $('.color_K').click(function(){  dataTable.draw(); });
    $('.color_L').click(function(){  dataTable.draw(); });
    $('.color_M').click(function(){  dataTable.draw(); });
    $('.color_N').click(function(){  dataTable.draw(); });
    $('.color_Z').click(function(){  dataTable.draw(); });
    $('.color_Fancy_Color').click(function(){  dataTable.draw(); });

    // Black Brown Yellow Blue Green Gray  Orange Pink Cognac Purple Red White Champagne Other
    $('.color_Black').click(function(){  dataTable.draw(); });
    $('.color_Brown').click(function(){  dataTable.draw(); });
    $('.color_Yellow').click(function(){  dataTable.draw(); });
    $('.color_Blue').click(function(){  dataTable.draw(); });
    $('.color_Green').click(function(){  dataTable.draw(); });
    $('.color_Gray').click(function(){  dataTable.draw(); });
    $('.color_Orange').click(function(){  dataTable.draw(); });
    $('.color_Pink').click(function(){  dataTable.draw(); });
    $('.color_Cognac').click(function(){  dataTable.draw(); });
    $('.color_Purple').click(function(){  dataTable.draw(); });
    $('.color_Red').click(function(){  dataTable.draw(); });
    $('.color_White').click(function(){  dataTable.draw(); });
    $('.color_Champagne').click(function(){  dataTable.draw(); });
    $('.color_Other').click(function(){  dataTable.draw(); });

    $('.cut_Excellent').click(function(){  dataTable.draw(); });
    $('.cut_Very_Good').click(function(){  dataTable.draw(); });
    $('.cut_Good').click(function(){  dataTable.draw(); });
    $('.cut_Fair').click(function(){  dataTable.draw(); });
    $('.cut_Poor').click(function(){  dataTable.draw(); });

    $('.clarity_10').click(function(){  dataTable.draw(); });
    $('.clarity_20').click(function(){  dataTable.draw(); });
    $('.clarity_30').click(function(){  dataTable.draw(); });
    $('.clarity_40').click(function(){  dataTable.draw(); });
    $('.clarity_50').click(function(){  dataTable.draw(); });
    $('.clarity_60').click(function(){  dataTable.draw(); });
    $('.clarity_70').click(function(){  dataTable.draw(); });
    $('.clarity_80').click(function(){  dataTable.draw(); });
    $('.clarity_90').click(function(){  dataTable.draw(); });
    $('.clarity_100').click(function(){ dataTable.draw(); });

    <?php foreach($resultClr as $colr){ ?>
	$(".shape_<?php echo str_replace(' ', '_', $colr['shape']);?>").click(function(){  dataTable.draw(); });
	<?php } ?>

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

	$("#carat_min").keyup(function() {
		$("#carat_slider_range").slider('values',0,$(this).val());
		dataTable.draw();
	});

	$("#carat_max").keyup(function() {
		$("#carat_slider_range").slider('values',1,$(this).val());
		dataTable.draw();
	});

	$("#clarity_min").change(function() {
		$("#clarity_slider_range").slider('values',0,$(this).val());
		dataTable.draw();
	});

	$("#clarity_max").change(function() {
		$("#clarity_slider_range").slider('values',1,$(this).val());
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

	$("#sort_by").change(function() {
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
    if(key == 'color'){ 
        var checkBoxes = $("#color_"+value);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        $(".color_"+value).toggleClass('active-reactectgular');
    }
    if(key == 'cut'){ 
        var checkBoxes = $("#cut_"+value);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        $(".cut_"+value).toggleClass('active-reactectgular');
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

// carat_slider_range
$( "#carat_slider_range" ).slider({
	range: true,
	value:0.15,
	min: 0.15,
	max: 15,
	values: [ <?php if(isset($_GET['carat']) && $_GET['carat']){ echo $_GET['carat']; }else{ echo 0.15; } ?>, 15 ],
	step: 0.15,
	slide: function( event, ui ) {
		$( "#carat_min" ).val( ui.values[0] );
		$( "#carat_max" ).val( ui.values[1] );
		if(ui.values[0] > 0){
			searchDiamondFunc( 'carat', ui.values[0] );
		}
	}
});
 
// clarity_slider_range    
$( "#clarity_slider_range" ).slider({
	range: true,
	min: 0,
	max:100,
	values: [ <?php if(isset($_GET['clarity']) && $_GET['clarity']){ echo $_GET['clarity']; }else{ echo 0; } ?>, 100],
	step: 10,
	slide: function( event, ui ) {
		$( "#clarity_min" ).val( ui.values[0] );
		$( "#clarity_max" ).val( ui.values[1] );
		var get_clarity = ui.values[ 0 ];
		if(get_clarity > 0){
			searchDiamondFunc( 'clarity', get_clarity );
		}
	}
});

// price_slider_range
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
			searchDiamondFunc( 'price', ui.values[0] );
		}
	}
});
</script>
<?php
$segment = explode("/",$_SERVER['REQUEST_URI']);
if(!empty($segment)){
	if(isset($segment[4]) && !empty($segment[4])){
		$srchShape = $segment[4];
	}else{
		$srchShape = isset($segment[3])?$segment[3]:'';
	}
	if($srchShape == 'yellow-color'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('color', 'Yellow');
			//$( "#btn-reload" ).trigger( "click" );
			$("#color_Yellow").prop("checked", true);
			$(".color_Yellow").addClass(" active-reactectgular");
			sortFunction();
		});
		</script>
	<?php
	}elseif($srchShape == 'pink-color'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('color', 'Pink');
			//$( "#btn-reload" ).trigger( "click" );
			$("#color_Pink").prop("checked", true);
			$(".color_Pink").addClass(" active-reactectgular");
			sortFunction();
		});
		</script>
	<?php
	}elseif($srchShape == 'purple-color'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('color', 'Purple');
			//$( "#btn-reload" ).trigger( "click" );
			$("#color_Purple").prop("checked", true);
			$(".color_Purple").addClass(" active-reactectgular");
			sortFunction();
		});
		</script>
	<?php
	}elseif($srchShape == 'blue-color'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'P');
			//$( "#btn-reload" ).trigger( "click" );
			$("#color_Blue").prop("checked", true);
			$(".color_Blue").addClass(" active-reactectgular");
			sortFunction();
		});
		</script>
	<?php
	}elseif($srchShape == 'green-color'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('color', 'Green');
			//$( "#btn-reload" ).trigger( "click" );
			$("#color_Green").prop("checked", true);
			$(".color_Green").addClass(" active-reactectgular");
			sortFunction();
		});
		</script>
	<?php
	}elseif($srchShape == 'orange-color'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('color', 'Orange');
			//$( "#btn-reload" ).trigger( "click" );
			$("#color_Orange").prop("checked", true);
			$(".color_Orange").addClass(" active-reactectgular");
			sortFunction();
		});
		</script>
	<?php
	}elseif($srchShape == 'brown-color'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('color', 'Brown');
			//$( "#btn-reload" ).trigger( "click" );
			$("#color_Brown").prop("checked", true);
			$(".color_Brown").addClass(" active-reactectgular");
			sortFunction();
		});
		</script>
	<?php
	}elseif($srchShape == 'black-color'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('color', 'Black');
			$("#color_Black").prop("checked", true);
			$(".color_Black").addClass(" active-reactectgular");
			sortFunction();
		});
		</script>
	<?php
	}
}
?>