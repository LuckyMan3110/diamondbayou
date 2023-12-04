<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<style>
#diamond_grid_filter input[type="search"]{height:35px;border:solid 1px #ccc;padding:5px}
table.dataTable thead th,table.dataTable thead td{border-bottom:1px solid #ccc!important}
table.dataTable tfoot th,table.dataTable tfoot td{border-top:1px solid #ccc!important}
table.dataTable tbody th,table.dataTable tbody td{padding:0!important}
#loader{border:16px solid #f3f3f3;border-radius:50%;border-top:16px solid #3498db;width:120px;height:120px;-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite;margin-left:200px;margin-top:30px;position:absolute!important;top:50%;left:35%}
.dataTables_wrapper .dataTables_processing{position:absolute!important;top:3%!important;left:25%!important;width:100%!important;height:40px;margin-left:-50%;margin-top:-25px;padding-top:20px;background-color:transparent!important;background:transparent!important}
#diamond_grid_length{margin-bottom:10px}
.slider_cut{width:100%;}
select:focus{color:#000 !important;background-color:#ffffff !important;}
#sort_by{width:16%;float:left;background-color:#ffffff;color:#000;margin-left:20px;text-align:center;padding-left:10px;}
@media (max-width: 768px){
input, .uneditable-input{width: 50px;text-align: center;}
}
.clrtable ul.colorslide_lines{width:90%;}
.clrtable ul.colorslide_lines li{margin: 0px 0px 0px 50px !important;}
.clrtable ul.clarityslide_lines{width:90%;}
.clrtable ul.clarityslide_lines li{margin:0px 1px 0px 45px !important;}
table#clarity_table_new_list td {font-size:12px;padding:0px 4px 5px 14px}
table#clarity_table_new_list tbody tr td:first-child{padding:5px 10px 5px 5px !important}
table#clarity_table_new_list tbody tr td:last-child{padding:10px 10px 5px 2px !important}

table#color_table_new_list tbody tr td{padding: 10px 0px 10px 0px;width: 11%;text-align: right;vertical-align: bottom;position: relative;left: 12px;}
table#color_table_new_list tbody tr td:first-child{padding:5px 10px 5px 5px !important}
table#color_table_new_list tbody tr td:last-child{padding:10px 10px 5px 2px !important}
</style>
<?php
function getCountResult($getTable,$fieldName,$value){
	$CI =& get_instance();
	$CI->db->where( array($fieldName => $value,'fcolor_value' => '') );
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
$sqlClr = "SELECT shape FROM dev_index WHERE vdbapp_id > '0' AND fcolor_value = '' AND shape != '' GROUP BY shape ORDER BY shape";
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

		$shape_view_list = '';
		foreach ( $shape_list  as $shkey => $keyvalue ) {
			$diamond_shape = view_shape_value($shapeimg, $shkey);
			$imgeOverIcon = str_replace('_sic', '_sic_ov', $keyvalue[2]);
			$active_class = ( $i == 1 ? 'class=""' : '' );
			$shape_name      = 'shape';
			?>
			<li class="shape_<?= $shkey ?>" onclick="searchDiamondFunc('shape', '<?= $shkey ?>')" <?php echo filterCheckedSetClass('shape', ''.$shkey.'', 'diamond-shape-active-box'); ?>>
				<div><a href="javascript:void(0);"><img src="<?= SITE_URL ?>assets/site_images/<?= $keyvalue[3] ?>" alt="<?= $keyvalue[4] ?>" /></a></div>
				<div><a href="javascript:void(0);"><span><?= $keyvalue[4] ?></span></a></div>   
			</li>
			<?php            
			$i++;
		}
		echo $shape_view_list;
		?>                        
	</ul>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<div class="sliderFilters row-fluid">
	<div class="filterCols col-sm-12 filter_show_hide" style="padding:15px 30px;">
		<style>
		.set_color_field ul li {padding: 6px 7px;}
		</style>
		<div class="col-sm-6">
			<table width="100%" style="<?php if($diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?>" >
				<tr>
					<td width="100%" style="vertical-align: top;padding-bottom: 10px;"><label>Carat</label></td>
				</tr>
				<tr>
					<td width="100%" style="vertical-align: top;"> 
						<div id="carat_slider_range"></div>
						<table width="100%">
							<tr>
								<td width="50%" style="text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="carat_min" class="diamond-search-input" value="<?php if($_GET['carat']){ echo $_GET['carat']; }else{ echo 0; } ?>"> <span class="filter_field_info">MIN</span><td>
								<td width="50%" style="text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input" id="carat_max" value="15"><td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<?php if($diamond_page_name != 'colored-diamond' AND $diamond_page_name != 'solitaires-and-halos' AND $diamond_page_name != 'watches'){ ?>
			<div class="col-sm-6">
				<table width="100%" class="clrtable"  style="<?php if($diamond_page_name == 'colored-diamond' OR $diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
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
										<td align="left"><input type="hidden" value="<?php echo $clarity_start; ?>" id="claritymin" class="w50px" onchange="modifyresult('claritymin',this.value)"></td>
										<td align="right"><input type="hidden" value="<?php echo $clarity_end; ?>" id="claritymax" class="w50px" onchange="modifyresult('claritymax',this.value)"></td>
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
		<div class="col-sm-12"></div>
		<div class="col-sm-6">
			<table width="100%" class="clrtable" style="<?php if($diamond_page_name == 'colored-diamond' OR $diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
                    <tr>
                        <td width="100%" style="vertical-align: top;padding-bottom: 10px;"><label>Color</label></td>
                    </tr>
                    <tr>
						<td width="100%" style="vertical-align: top;"> 
							<div>
								<ul class="cutslider_lines colorslide_lines">
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
							<div id="color_slider_range"></div>
							<div>
								<table id="color_table_new_list" style="width:100%;">
									<tr>
										<td>L</td>
										<td>K</td>
										<td>J</td>
										<td>I</td>
										<td>H</td>
										<td>G</td>
										<td>F</td>
										<td>E</td>
										<td>D</td>
									</tr>
									<tr>
										<td align="left"><input type="hidden" value="<?php echo $color_start; ?>" id="colormin" class="w50px" onchange="modifyresult('colormin',this.value)"></td>
										<td align="right"><input type="hidden" value="<?php echo $color_end; ?>" id="colormax" class="w50px" onchange="modifyresult('colormax',this.value)"></td>
									</tr>
								</table>
								<table width="100%">
									<tr>
										<td width="50%" style="display:none;text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="color_min" class="diamond-search-input" value=""> <span class="filter_field_info">MIN</span><td>
										<td width="50%" style="display:none;text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input" id="color_max" value=""><td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
				</table>
		</div>
		<div class="col-sm-6" style="display:none">
			<table width="100%" style="margin-top:0px; <?php if($diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
				<tr>
					<td width="100%" style="vertical-align: top;padding-bottom: 10px;"><label>Color</label></td>
				</tr>
				<tr>
					<td width="100%" style="vertical-align: top;"> 
						<div class="slider_set_view">
							<div class="set_color_field">
								<ul>
									<li <?php echo filterCheckedClassRect('color', 'D'); ?> onclick="searchDiamondFunc('color', 'D')" class="color_D"  style="display:none;">D</li>
									<li <?php echo filterCheckedClassRect('color', 'E'); ?> onclick="searchDiamondFunc('color', 'E')" class="color_E"  style="display:none;">E</li>
									<li <?php echo filterCheckedClassRect('color', 'F'); ?> onclick="searchDiamondFunc('color', 'F')" class="color_F"  style="display:none;">F</li>
									<li <?php echo filterCheckedClassRect('color', 'G'); ?> onclick="searchDiamondFunc('color', 'G')" class="color_G"  style="display:none;">G</li>
									<li <?php echo filterCheckedClassRect('color', 'H'); ?> onclick="searchDiamondFunc('color', 'H')" class="color_H"  style="display:none;">H</li>
									<li <?php echo filterCheckedClassRect('color', 'I'); ?> onclick="searchDiamondFunc('color', 'I')" class="color_I"  style="display:none;">I</li>
									<li <?php echo filterCheckedClassRect('color', 'J'); ?> onclick="searchDiamondFunc('color', 'J')" class="color_J"  style="display:none;">J</li>
									<li <?php echo filterCheckedClassRect('color', 'K'); ?> onclick="searchDiamondFunc('color', 'K')" class="color_K"  style="display:none;">K</li>
									<li <?php echo filterCheckedClassRect('color', 'L'); ?> onclick="searchDiamondFunc('color', 'L')" class="color_L"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_1.jpg" alt="Round" /></li>
									<li <?php echo filterCheckedClassRect('color', 'M'); ?> onclick="searchDiamondFunc('color', 'M')" class="color_M"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_2.jpg" alt="Round" /></li>
									<li <?php echo filterCheckedClassRect('color', 'N'); ?> onclick="searchDiamondFunc('color', 'N')" class="color_N"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_3.jpg" alt="Round" /></li>
									<li <?php echo filterCheckedClassRect('color', 'Z'); ?> onclick="searchDiamondFunc('color', 'Z')" class="color_Z"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_4.jpg" alt="Round" /></li>
									<li <?php echo filterCheckedClassRect('color', 'Z'); ?> onclick="searchDiamondFunc('color', 'Z')" class="color_Z"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_5.jpg" alt="Round" /></li>
									<li <?php echo filterCheckedClassRect('color', 'Z'); ?> onclick="searchDiamondFunc('color', 'Z')" class="color_Z"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_6.jpg" alt="Round" /></li>
									<li <?php echo filterCheckedClassRect('color', 'Z'); ?> onclick="searchDiamondFunc('color', 'Z')" class="color_Z"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_7.jpg" alt="Round" /></li>
									<li <?php echo filterCheckedClassRect('color', 'Z'); ?> onclick="searchDiamondFunc('color', 'Z')" class="color_Z"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_8.jpg" alt="Round" /></li>
									<li <?php echo filterCheckedClassRect('color', 'Z'); ?> onclick="searchDiamondFunc('color', 'Z')" class="color_Z"><img src="<?php echo SITE_URL; ?>assets/site_images/round_color_9.jpg" alt="Round" /></li>
								</ul>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-sm-6" style="display:none">
			<table width="100%"  style="margin-top:0px;">
				<tr>
					<td width="100%" style="vertical-align: top;padding-bottom: 10px;"><label>Price</label></td>
				</tr>
				<tr>
					<td width="100%" style="vertical-align: top;"> 
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
		<?php if($diamond_page_name == 'white-diamond'){ ?>
			<div class="col-sm-6">
				<table width="100%" style="margin-top:15px; <?php if($diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
					<tr>
						<td width="15%" style="vertical-align: top;"><label>Color</label></td>
                        <td width="85%" style="vertical-align: top;"> 
                            <div class="slider_set_view">
                                <div class="set_color_field">
                                    <ul>
                                        <li <?php echo filterCheckedClassRect('color', 'D'); ?> onclick="searchDiamondFunc('color', 'D')" class="color_D">D</li>
                                        <li <?php echo filterCheckedClassRect('color', 'E'); ?> onclick="searchDiamondFunc('color', 'E')" class="color_E">E</li>
                                        <li <?php echo filterCheckedClassRect('color', 'F'); ?> onclick="searchDiamondFunc('color', 'F')" class="color_F">F</li>
                                        <li <?php echo filterCheckedClassRect('color', 'G'); ?> onclick="searchDiamondFunc('color', 'G')" class="color_G">G</li>
                                        <li <?php echo filterCheckedClassRect('color', 'H'); ?> onclick="searchDiamondFunc('color', 'H')" class="color_H">H</li>
                                        <li <?php echo filterCheckedClassRect('color', 'I'); ?> onclick="searchDiamondFunc('color', 'I')" class="color_I">I</li>
                                        <li <?php echo filterCheckedClassRect('color', 'J'); ?> onclick="searchDiamondFunc('color', 'J')" class="color_J">J</li>
                                        <li <?php echo filterCheckedClassRect('color', 'K'); ?> onclick="searchDiamondFunc('color', 'K')" class="color_K"  style="display:none;">K</li>
                                        <li <?php echo filterCheckedClassRect('color', 'L'); ?> onclick="searchDiamondFunc('color', 'L')" class="color_L"  style="display:none;">L</li>
                                        <li <?php echo filterCheckedClassRect('color', 'M'); ?> onclick="searchDiamondFunc('color', 'M')" class="color_M"  style="display:none;">M</li>
                                        <li <?php echo filterCheckedClassRect('color', 'N'); ?> onclick="searchDiamondFunc('color', 'N')" class="color_N"  style="display:none;">N</li>
                                        <li <?php echo filterCheckedClassRect('color', 'Z'); ?> onclick="searchDiamondFunc('color', 'Z')" class="color_Z"  style="display:none;">Z</li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
		<?php } ?>
		<div class="col-sm-6">
			<table width="100%" style="margin-top:10px;display:; <?php if($diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
				<tr>
					<td width="100%" style="vertical-align: top;padding-bottom: 10px;"><label>Cut</label></td>
				</tr>
				<tr>
					<td style="vertical-align: top;">
						<div class="slider_set_view slider_cut">
							<div class="set_color_field">
								<ul>
									<li onclick="searchDiamondFunc('cut', 'Excellent')" class="cut_Excellent filtrCut ">Excellent</li>
									<li onclick="searchDiamondFunc('cut', 'Very_Good')" class="cut_Very_Good filtrCut ">Very Good</li>
									<li onclick="searchDiamondFunc('cut', 'Good')" class="cut_Good filtrCut ">Good</li>
									<li onclick="searchDiamondFunc('cut', 'Ideal')" class="cut_Ideal filtrCut ">Ideal</li>
									<li onclick="searchDiamondFunc('cut', 'Fair')" class="cut_Fair filtrCut ">Fair</li>
									<li onclick="searchDiamondFunc('cut', 'Poor')" class="cut_Poor filtrCut ">Poor</li>
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
					<label><span><input name="cut" type="checkbox" id="cut_Excellent" class="cut_Excellent filtrCut " value="Excellent" /></span>
                        <span><b>Excellent</b> (<?php echo getCountResult('dev_index', 'cut', 'Excellent'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="cut" type="checkbox" id="cut_Very_Good" class="cut_Very_Good filtrCut " value="Very Good" /></span>
                        <span><b>Very Good</b> (<?php echo getCountResult('dev_index', 'cut', 'Very Good'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="cut" type="checkbox" id="cut_Good" class="cut_Good filtrCut " value="Good" /></span>
                        <span><b>Good</b> (<?php echo getCountResult('dev_index', 'cut', 'Good'); ?>)</span></label>
                    </div>
					<div class="fiter_item_row">
                        <label><span><input name="cut" type="checkbox" id="cut_Ideal" class="cut_Ideal filtrCut " value="Ideal" /></span>
                        <span><b>Ideal</b> (<?php echo getCountResult('dev_index', 'cut', 'Ideal'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="cut" type="checkbox" id="cut_Fair" class="cut_Fair filtrCut " value="Fair" /></span>
                        <span><b>Fair</b> (<?php echo getCountResult('dev_index', 'cut', 'Fair'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="cut" type="checkbox" id="cut_Poor" class="cut_Poor filtrCut " value="Poor" /></span>
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
                    <div class="fiter_item_row">
                        <label><span><input name="" type="checkbox" id="color_D" class="color_D" value="D" /></span>
                        <span><b>D</b> (<?php echo getCountResult('dev_index', 'color', 'D'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="" type="checkbox" id="color_E" class="color_E" value="E" /></span>
                        <span><b>E</b> (<?php echo getCountResult('dev_index', 'color', 'E'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="" type="checkbox" id="color_F" class="color_F" value="F" /></span>
                        <span><b>F</b> (<?php echo getCountResult('dev_index', 'color', 'F'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="" type="checkbox" id="color_G" class="color_G" value="G" /></span>
                        <span><b>G</b> (<?php echo getCountResult('dev_index', 'color', 'G'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="" type="checkbox" id="color_H" class="color_H" value="H" /></span>
                        <span><b>H</b> (<?php echo getCountResult('dev_index', 'color', 'H'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="" type="checkbox" id="color_I" class="color_I" value="I" /></span>
                        <span><b>I</b> (<?php echo getCountResult('dev_index', 'color', 'I'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="" type="checkbox" id="color_J" class="color_J" value="J" /></span>
                        <span><b>J</b> (<?php echo getCountResult('dev_index', 'color', 'J'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row"  style="display:none;">
                        <label><span><input name="" type="checkbox" id="color_K" class="color_K" value="K" /></span>
                        <span><b>K</b> (<?php echo getCountResult('dev_index', 'color', 'K'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row"  style="display:none;">
                        <label><span><input name="" type="checkbox" id="color_L" class="color_L" value="L" /></span>
                        <span><b>L</b> (<?php echo getCountResult('dev_index', 'color', 'L'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row"  style="display:none;">
                        <label><span><input name="" type="checkbox" id="color_M" class="color_M" value="M" /></span>
                        <span><b>M</b> (<?php echo getCountResult('dev_index', 'color', 'M'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row"  style="display:none;">
                        <label><span><input name="" type="checkbox" id="color_N" class="color_N" value="N" /></span>
                        <span><b>N</b> (<?php echo getCountResult('dev_index', 'color', 'N'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row"  style="display:none;">
                        <label><span><input name="" type="checkbox" id="color_Z" class="color_Z" value="Z" /></span>
                        <span><b>Z</b> (<?php echo getCountResult('dev_index', 'color', 'Z'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row"  style="display:none;">
                        <label><span><input name="" type="checkbox" id="color_Fancy_Color" class="color_Fancy_Color" value="Fancy Color" /></span>
                        <span><b>Fancy Color</b> (<?php echo getCountResult('dev_index', 'color', 'Fancy Color'); ?>)</span></label>
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
		table#diamond_grid tbody tr{width:25%;float:left;min-height:350px;height:100%;max-height:350px;background:#fff;}
		table#diamond_grid .diamond_result_content{padding:0px;margin:5px;}
		table#diamond_grid .diamond_result_content h4{font-size:12px;padding:5px 0px;height:65px;}
		table#diamond_grid tbody tr{background-color:transparent;}
		table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd{background-color:transparent;}
		table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1{background-color:#fff;}
		.overlay-quick-view{left:30%;font-size: 12px;}
		.overlay-details-view{left:20%;font-size: 12px;font-weight: bold;padding:15px 5px;}
		.hover-jewelery-img-area{padding:5px 0px;text-align:center}
		table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td{border-top:none;}
		img.detl-img2{width:182px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0px;left:0;height: 182px;}
		img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:182px;}
		table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
		table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		table#diamond_grid .add_tocart_btn {padding: 5px 10px;}
		.main_item_price{padding: 10px;}
		@media only screen and (device-width: 768px) {
			.result_page_right{width:100%;}
			table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2{width:182px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0px;left:0;}
			img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:182px;}
			table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}
		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
			.result_page_right{width:100%;}
			table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:182px;}
			table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}

		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
			.result_page_right{width:100%;}
			table#diamond_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:182px;}
			table#diamond_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#diamond_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}
		@media (max-width: 767px){
			.result_page_right{width:100%;}
			table#diamond_grid tbody tr{width:100%;float:none;min-height:auto;height:auto;max-height:auto;background:#fff;}
			img.detl-img2:hover{width:182px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;height:182px;}
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
	</div>
	<div class="clear"></div>
</section>
<script>
$( document ).ready(function() {
	var dataTable = $('#diamond_grid').DataTable({
		"serverSide": true,
		'processing': true,
		"lengthMenu": [[20, 30, 32, 50, 100, 200], [20, 30, 32, 50, 100, 200]],
		"pageLength": 20,
		'oLanguage': {"sSearch": "Enter Sku Number:", sProcessing: "<div id='loader'></div>"},
		"ajax":{
			url :"<?php echo SITE_URL; ?>diamonds/diamonds_search_realtime/",
			type: "post",
			'data' : function(data){
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
				if ($('#color_D').is(":checked")){ color_D = $('#color_D').val(); }
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

				//------------------------------Cut-----------------------------------
				var cut_Excellent         = '';
				if ($('#cut_Excellent').is(":checked")){ cut_Excellent = $('#cut_Excellent').val(); }
				var cut_Very_Good         = '';
				if ($('#cut_Very_Good').is(":checked")){ cut_Very_Good = $('#cut_Very_Good').val(); }
				var cut_Good         = '';
				if ($('#cut_Good').is(":checked")){ cut_Good = $('#cut_Good').val(); }
				var cut_Ideal         = '';
				if ($('#cut_Ideal').is(":checked")){ cut_Ideal = $('#cut_Ideal').val(); }
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
				
				var color_min     = $('#color_min').val();
				var color_max     = $('#color_max').val();

				// Append to data
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
				data.color_min      = color_min;
				data.color_max      = color_max;
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
				data.color_Fancy_Color	= color_Fancy_Color;

				//------------------------------Cut-----------------------------------
				data.cut_Excellent   = cut_Excellent;
				data.cut_Very_Good   = cut_Very_Good;
				data.cut_Good        = cut_Good;
				data.cut_Ideal		 = cut_Ideal
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
	}, 2000);

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

	$('.cut_Excellent').click(function(){  dataTable.draw(); });
	$('.cut_Very_Good').click(function(){  dataTable.draw(); });
	$('.cut_Good').click(function(){  dataTable.draw(); });
	$('.cut_Ideal').click(function(){  dataTable.draw(); });
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
	$('.clarity_100').click(function(){  dataTable.draw(); });

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
	
	$("#color_min").change(function() {
		$("#color_slider_range").slider('values',0,$(this).val());
		dataTable.draw();
	});

	$("#color_max").change(function() {
		$("#color_slider_range").slider('values',1,$(this).val());
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
    if(key == 'color'){
		$( "#btn-reload" ).trigger( "click" );
		/* var checkBoxes = $("#color_"+value);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        $(".color_"+value).toggleClass('active-reactectgular'); */
    }
    if(key == 'cut'){
		$( ".filtrCut" ).prop( "checked", false );
		$(".filtrCut").removeClass("active-reactectgular");
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

//carat_slider_range
$( "#carat_slider_range" ).slider({
	range: true,
	value:0.15,
	min: 0.15,
	max: 15,
	values: [ <?php if($_GET['carat']){ echo $_GET['carat']; }else{ echo 0.15; } ?>, 15 ],
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
	values: [ <?php if($_GET['clarity']){ echo $_GET['clarity']; }else{ echo 0; } ?>, 100],
	step: 10,
	slide: function( event, ui ) {
		$( "#clarity_min" ).val( ui.values[0] );
		$( "#clarity_max" ).val( ui.values[1] );
		var get_clarity = ui.values[0];
		if(get_clarity > 0){
			searchDiamondFunc( 'clarity', get_clarity );
		}
	}
});

// clarity_slider_range    
$( "#color_slider_range" ).slider({
	range: true,
	min: 0,
	max:90,
	values: [ <?php if($_GET['color']){ echo $_GET['color']; }else{ echo 0; } ?>, 90],
	step: 10,
	slide: function( event, ui ) {
		$( "#color_min" ).val( ui.values[0] );
		$( "#color_max" ).val( ui.values[1] );
		var get_color = ui.values[0];
		if(get_color > 0){
			searchDiamondFunc( 'color', get_color );
		}
	}
});

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
</script>
<?php
$segment = explode("/",$_SERVER['REQUEST_URI']);
if(!empty($segment)){
	if(!empty($segment[4])){
		$srchShape = $segment[4];
	}else{
		$srchShape = $segment[3];
	}
	if($srchShape == 'round-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Round');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'princess-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Princess');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'cushion-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Cushion');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'radiant-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Radiant');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'emerald-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Emerald');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'pear-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Pear');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'oval-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Oval');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'asscher-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Asscher');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'marquise-cut'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Marquise');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}elseif($srchShape == 'heart-shaped'){ 
	?>
		<script>
		$(window).on('load', function (){
			searchDiamondFunc('shape', 'Heart');
			$( "#btn-reload" ).trigger( "click" );
		});
		</script>
	<?php
	}
}
?>