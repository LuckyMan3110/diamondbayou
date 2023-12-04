<?php
$segment = explode("/",$_SERVER['REQUEST_URI']);
if(!empty($segment)){
	if(!empty($segment[4])){
		$srchShape = $segment[4];
	}else{
		$srchShape = $segment[3];
	}
}else{
	$srchShape = '';
}
?>
<!-- Datatable CSS -->
<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/css/lightslider.min.css' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/js/lightslider.min.js"></script>
<style rel='stylesheet' type='text/css'>
#ring_grid_filter input[type="search"]{height:35px;border:solid 1px #ccc;padding:5px}
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
.filter_block_section{max-height:455px;overflow:hidden}
#showmore1{font-weight:bold;font-size:14px;line-height:50px;text-align:center;margin-left:15px;text-decoration:underline;color: #000000;}
#showmore2{font-weight:bold;font-size:14px;line-height:50px;text-align:center;margin-left:15px;text-decoration:underline;color: #000000;}
#showmore3{font-weight:bold;font-size:14px;line-height:50px;text-align:center;margin-left:15px;text-decoration:underline;color: #000000;}
#showmore4{font-weight:bold;font-size:14px;line-height:50px;text-align:center;margin-left:15px;text-decoration:underline;color: #000000;}
#showless1{display:none;font-weight:bold;font-size:14px;line-height:50px;text-align:center;margin-left:15px;text-decoration:underline;color:#000000;}
#showless2{display:none;font-weight:bold;font-size:14px;line-height:50px;text-align:center;margin-left:15px;text-decoration:underline;color:#000000;}
#showless3{display:none;font-weight:bold;font-size:14px;line-height:50px;text-align:center;margin-left:15px;text-decoration:underline;color:#000000;}
#showless4{display:none;font-weight:bold;font-size:14px;line-height:50px;text-align:center;margin-left:15px;text-decoration:underline;color:#000000;}
.moreinfo{max-height:100%;overflow:visible}
.slider_cut{width:100%;}
select:focus{color:#000 !important;background-color:#ffffff !important;}
#sort_by{width:15%;float:left;background-color:#ffffff;color:#000;margin-left:20px;text-align:center;padding-left:10px;}
</style>
<?php
function getCountResult($getTable,$fieldName,$value){
	$CI =& get_instance();
	$CI->db->where( array($fieldName => $value));
	$CI->db->from($getTable);

	return number_format($CI->db->count_all_results());
}

function getCountResult2($getTable,$fieldName,$value1,$value2){
	$CI =& get_instance();
	$CI->db->where("".$fieldName." BETWEEN '".$value1."' AND '".$value2."'");
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
<div class="tabs_content_area"  style="display:none;">
	<ul class="set_diamond_shapes_list">
		<?php
		$shape_list = array(
			'B'=>array('one','round', 'round_sic', 'round_sh_ic.jpg', 'Round'),
			'PR'=>array('two','princess', 'princes_sic', 'princess_sh_ic.jpg', 'Princess'),
			'C'=>array('ten','cushion', 'cushion_sic', 'cushion_sh_ic.jpg', 'Cushion'),
			'R'=>array('seven','radiant', 'radiant_sic', 'radiant_sh_ic.jpg', 'Radiant'),
			'E'=>array('three','emerald', 'emearld_sic', 'emerald_sh_ic.jpg', 'Emerald'),
			'P'=>array('eight','pear', 'pear_sic', 'pear_sh_ic.jpg', 'Pear'),
			'O'=>array('six','oval', 'oval_sic', 'oval_sh_ic.jpg', 'Oval'),
			'AS'=>array('four','asscher', 'asscher_sic', 'asscher_sh_ic.jpg', 'Asscher'),
			'M'=>array('five','marquise', 'marquise_sic', 'marquise_sh_ic.jpg', 'Marquise'),
			'H'=>array('nine','heart', 'heart_sic', 'heart_sh_ic.jpg', 'Heart')
		);

		$shape_view_list = '';
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
                </div>
				<div class="bottom_line"></div><br>
				<div class="clear"></div>
				<div class="filter_block_section block1">
                    <div class="inner_sub_heading">
                        Style
                        <div class="clear"></div>
                    </div>
					<?php /* <div class="fiter_item_row">
						<label><span><input class="category" type="checkbox" id="category" value="Side Stone" <?php if($srchShape == 'side-stones'){ echo 'checked="checked"'; } ?> /></span><span><b>Side Stone</b> (<?php echo getCountResult('dev_engagement_rings', 'category', 'Side Stone'); ?>)</span></label>
					</div> */ ?>
					<div class="fiter_item_row">
						<label><span><input class="category" type="checkbox" id="category" value="Halo" <?php if($srchShape == 'halo'){ echo 'checked="checked"'; } ?> /></span><span><b>Halo</b> (<?php echo getCountResult('dev_engagement_rings', 'category', 'Halo'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="category" type="checkbox" id="category" value="Vintage" <?php if($srchShape == 'vintage'){ echo 'checked="checked"'; } ?> /></span><span><b>Vintage</b> (<?php echo getCountResult('dev_engagement_rings', 'category', 'Vintage'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="category" type="checkbox" id="category" value="Three Stone" <?php if($srchShape == 'three-stone'){ echo 'checked="checked"'; } ?> /></span><span><b>Three Stone</b> (<?php echo getCountResult('dev_engagement_rings', 'category', 'Three Stone'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="category" type="checkbox" id="category" value="Solitaire" <?php if($srchShape == 'solitaire'){ echo 'checked="checked"'; } ?> /></span><span><b>Solitaire</b> (<?php echo getCountResult('dev_engagement_rings', 'category', 'Solitaire'); ?>)</span></label>
					</div>
					<?php
					$sqlCat = "SELECT category FROM dev_engagement_rings WHERE `category` NOT IN ('Side Stone','Halo','Vintage','Three Stone','Solitaire') AND category != '' GROUP BY category ORDER BY category";
					$queryCat = $this->db->query($sqlCat);
					$resultCat = $queryCat->result_array();
					$q=6;
					foreach($resultCat as $cats){ 
						if($q==17){
							echo '<span id="showmore1">More options</span>';
						}else{
						?>
							<div class="fiter_item_row">
								<label><span><input class="category" type="checkbox" id="category" value="<?php echo $cats[category];?>" <?php if(str_replace('%20', ' ', $srchShape) == $cats[category]){ echo 'checked="checked"'; } ?> /></span><span><b><?php echo $cats[category];?></b> (<?php echo getCountResult('dev_engagement_rings', 'category', $cats[category]); ?>)</span></label>
							</div>
						<?php 
						}
						$q++;
					}
					if($q >=18){
						echo '<span id="showless1">Less options</span>';
					}
					?>
                </div>
				<div class="bottom_line"></div><br>
				<div class="clear"></div>
				
				<div class="filter_block_section block9">
                    <div class="inner_sub_heading">
                        Carat Weight
                        <div class="clear"></div>
                    </div>
					<div class="fiter_item_row">
						<label><span><input class="carat_weight" type="checkbox" id="carat_weight" value="0.25 Carat" /></span><span><b>.25</b> (<?php echo getCountResult2('dev_engagement_rings', 'diamond_weight', '0 Carat', '0.25 Carat'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="carat_weight" type="checkbox" id="carat_weight" value="0.50 Carat" /></span><span><b>.50</b> (<?php echo getCountResult2('dev_engagement_rings', 'diamond_weight', '0.26 Carat', '0.50 Carat'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="carat_weight" type="checkbox" id="carat_weight" value="0.75 Carat" /></span><span><b>.75</b> (<?php echo getCountResult2('dev_engagement_rings', 'diamond_weight', '0.51 Carat', '0.75 Carat'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="carat_weight" type="checkbox" id="carat_weight" value="1.00 Carat" /></span><span><b>1ct</b> (<?php echo getCountResult2('dev_engagement_rings', 'diamond_weight', '0.76 Carat', '1.00 Carat'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="carat_weight" type="checkbox" id="carat_weight" value="1.50 Carat" /></span><span><b>1.5 ct</b> (<?php echo getCountResult2('dev_engagement_rings', 'diamond_weight', '1.02 Carat', '1.50 Carat'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="carat_weight" type="checkbox" id="carat_weight" value="2.00 Carat" /></span><span><b>2ct</b> (<?php echo getCountResult2('dev_engagement_rings', 'diamond_weight', '1.51 Carat', '2.00 Carat'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="carat_weight" type="checkbox" id="carat_weight" value="9.00 Carat" /></span><span><b>3+ct</b> (<?php echo getCountResult2('dev_engagement_rings', 'diamond_weight', '2.01 Carat', '9.00 Carat'); ?>)</span></label>
					</div>
                </div>
				<div class="bottom_line"></div><br>
				<div class="clear"></div>

				<div class="filter_block_section block5">
                    <div class="inner_sub_heading">
                        Shape
                        <div class="clear"></div>
                    </div>
					<div class="fiter_item_row">
						<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="Round" <?php if($srchShape == 'round-cut-rings'){ echo 'checked="checked"'; } ?> /></span><span><b>Round</b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', 'Round'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="Radiant" <?php if($srchShape == 'radiant-cut-rings'){ echo 'checked="checked"'; } ?> /></span><span><b>Radiant</b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', 'Radiant'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="Princess" <?php if($srchShape == 'princess-cut-rings'){ echo 'checked="checked"'; } ?> /></span><span><b>Princess</b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', 'Princess'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="Pear" <?php if($srchShape == 'pear-cut-rings'){ echo 'checked="checked"'; } ?> /></span><span><b>Pear</b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', 'Pear'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="Oval" <?php if($srchShape == 'oval-cut-rings'){ echo 'checked="checked"'; } ?> /></span><span><b>Oval</b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', 'Oval'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="Marquise" <?php if($srchShape == 'marquise-cut-rings'){ echo 'checked="checked"'; } ?> /></span><span><b>Marquise</b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', 'Marquise'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="Emerald" <?php if($srchShape == 'emerald-cut-rings'){ echo 'checked="checked"'; } ?> /></span><span><b>Emerald</b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', 'Emerald'); ?>)</span></label>
					</div>
					<div class="fiter_item_row">
						<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="Cushion" <?php if($srchShape == 'cushion-cut-rings'){ echo 'checked="checked"'; } ?> /></span><span><b>Cushion</b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', 'Cushion'); ?>)</span></label>
					</div>
					<?php
					$sqlShp = "SELECT stone_shape FROM dev_engagement_rings WHERE `stone_shape` NOT IN ('Round','Radiant','Princess','Pear','Oval','Marquise','Emerald','Cushion') AND stone_shape != '' GROUP BY stone_shape ORDER BY stone_shape";
					$queryShp = $this->db->query($sqlShp);
					$resultShp = $queryShp->result_array();
					$q=9;
					foreach($resultShp as $shap){ 
						if($q==17){
							echo '<span id="showmore5">More options</span>';
						}else{
						?>
							<div class="fiter_item_row">
								<label><span><input class="stone_shape" type="checkbox" id="stone_shape" value="<?php echo $shap[stone_shape];?>" <?php if(str_replace('%20', ' ', $srchShape) == $shap[stone_shape]){ echo 'checked="checked"'; } ?> /></span><span><b><?php echo $shap[stone_shape];?></b> (<?php echo getCountResult('dev_engagement_rings', 'stone_shape', $shap[stone_shape]); ?>)</span></label>
							</div>
						<?php 
						}
						$q++;
					}
					if($q >=18){
						echo '<span id="showless5">Less options</span>';
					}
					?>
                </div>
				<div class="bottom_line"></div><br>
				<div class="clear"></div>

				<div class="filter_block_section block6">
                    <div class="inner_sub_heading">
                        Color
                        <div class="clear"></div>
                    </div>
					<?php
					$sqlClr = "SELECT color FROM dev_engagement_rings WHERE color != '' GROUP BY color ORDER BY color";
					$queryClr = $this->db->query($sqlClr);
					$resultClr = $queryClr->result_array();
					$p=1;
					foreach($resultClr as $colr){
						if($p==17){
							echo '<span id="showmore6">More options</span>';
						}else{
						?>
							<div class="fiter_item_row">
								<label><span><input class="color" type="checkbox" id="color" value="<?php echo $colr[color];?>" <?php if(str_replace('%20', ' ', $srchShape) == $colr[color]){ echo 'checked="checked"'; } ?> /></span><span><b><?php echo $colr[color];?></b> (<?php echo getCountResult('dev_engagement_rings', 'color', $colr[color]); ?>)</span></label>
							</div>
						<?php 
						}
						$p++;
					}
					if($p >=18){
						echo '<span id="showless6">Less options</span>';
					}
					?>
                </div>
				<div class="bottom_line"></div><br>
				<div class="clear"></div>

				<div class="filter_block_section block7">
                    <div class="inner_sub_heading">
                        Clarity
                        <div class="clear"></div>
                    </div>
					<?php
					$sqlClrt = "SELECT clarity FROM dev_engagement_rings WHERE clarity != '' GROUP BY clarity ORDER BY clarity";
					$queryClrt = $this->db->query($sqlClrt);
					$resultClrt = $queryClrt->result_array();
					$p=1;
					foreach($resultClrt as $clrty){
						if($p==17){
							echo '<span id="showmore7">More options</span>';
						}else{
						?>
							<div class="fiter_item_row">
								<label><span><input class="clarity" type="checkbox" id="clarity" value="<?php echo $clrty[clarity];?>" <?php if(str_replace('%20', ' ', $srchShape) == $clrty[clarity]){ echo 'checked="checked"'; } ?> /></span><span><b><?php echo $clrty[clarity];?></b> (<?php echo getCountResult('dev_engagement_rings', 'clarity', $clrty[clarity]); ?>)</span></label>
							</div>
						<?php 
						}
						$p++;
					}
					if($p >=18){
						echo '<span id="showless7">Less options</span>';
					}
					?>
                </div>
				<div class="bottom_line"></div><br>
				<div class="clear"></div>

				<div class="filter_block_section block4">
					<div class="inner_sub_heading">
						Carat weight
						<div class="clear"></div>
					</div>
					<?php
					$sqlSize = "SELECT ring_size FROM dev_engagement_rings WHERE ring_size != '' GROUP BY ring_size ORDER BY ring_size";
					$querySize = $this->db->query($sqlSize);
					$resultSize = $querySize->result_array();
					$s=1;
					foreach($resultSize as $size){
						if($s==17){
							echo '<span id="showmore4">More options</span>';
						}else{
						?>
							<div class="fiter_item_row">
								<label><span><input class="ring_size" type="checkbox" id="ring_size" value="<?php echo $size[ring_size];?>" <?php if(str_replace('%20', ' ', $srchShape) == $size[ring_size]){ echo 'checked="checked"'; } ?> /></span><span><b><?php echo $size[ring_size];?></b> (<?php echo getCountResult('dev_engagement_rings', 'ring_size', $size[ring_size]); ?>)</span></label>
							</div>
						<?php 
						}
						$s++;
					}
					if($s >=18){
						echo '<span id="showless4">Less options</span>';
					}
					?>
					<div class="clear"></div>
				</div>
				<div class="bottom_line"></div><br>
				<div class="clear"></div>

				<div class="filter_block_section block2">
                    <div class="inner_sub_heading">
                        Metal
                        <div class="clear"></div>
                    </div>
					<?php
					$sqlMet = "SELECT metal FROM dev_engagement_rings WHERE metal != '' GROUP BY metal ORDER BY metal";
					$queryMet = $this->db->query($sqlMet);
					$resultMet = $queryMet->result_array();
					$p=1;
					foreach($resultMet as $mets){
						if($p==17){
							echo '<span id="showmore2">More options</span>';
						}else{
						?>
							<div class="fiter_item_row">
								<label><span><input class="metal" type="checkbox" id="metal" value="<?php echo $mets[metal];?>" <?php if($mets[metal] == '14k White Gold' && $srchShape == 'white-gold'){ echo 'checked="checked"'; }elseif($mets[metal] == '14k Yellow Gold' && $srchShape == 'yellow-gold'){ echo 'checked="checked"'; }elseif($mets[metal] == 'Platinum' && $srchShape == 'platinum'){ echo 'checked="checked"'; }elseif($mets[metal] == $srchShape){ echo 'checked="checked"'; } ?> /></span><span><b><?php echo $mets[metal];?></b> (<?php echo getCountResult('dev_engagement_rings', 'metal', $mets[metal]); ?>)</span></label>
							</div>
						<?php 
						}
						$p++;
					}
					if($p >=18){
						echo '<span id="showless2">Less options</span>';
					}
					?>
                </div>
				<div class="clear"></div>

            </div>
        </div>
		<style>
		table#ring_grid tbody tr{width:25%;float:left;min-height:350px;height:100%;max-height:350px;background:#fff;}
		table#ring_grid .diamond_result_content{padding:0px;margin:5px;}
		table#ring_grid .diamond_result_content h4{font-size:12px;padding:5px 0px;height:65px;}
		table#ring_grid tbody tr{background-color:transparent;}
		table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd{background-color:transparent;}
		table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1{background-color:#fff;}
		.overlay-quick-view{left:30%;font-size: 12px;}
		.overlay-details-view{left:20%;font-size: 12px;font-weight: bold;padding:15px 5px;}
		.hover-jewelery-img-area{padding:5px 0px}
		table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td{border-top:none;}
		img.detl-img2{width:280px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0px;left:0;}
		img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;}
		table#ring_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
		table#ring_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		@media only screen and (device-width: 768px) {
			.result_page_right{width:100%;}
			table#ring_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2{width:280px;border:solid 1px #ECECEC;opacity:0;position:absolute;top:0px;left:0;}
			img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;}
			table#ring_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#ring_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}
		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
			.result_page_right{width:100%;}
			table#ring_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;}
			table#ring_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#ring_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}

		@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
			.result_page_right{width:100%;}
			table#ring_grid tbody tr{width:50%;min-height:100%;height:100%;max-height:100%;}
			img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;}
			table#ring_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#ring_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}
		@media (max-width: 767px){
			.result_page_right{width:100%;}
			table#ring_grid tbody tr{width:100%;float:none;min-height:auto;height:auto;max-height:auto;background:#fff;}
			img.detl-img2:hover{width:280px;border:solid 1px #ECECEC;opacity:1;position:absolute;top:0px;left:0;}
			table#ring_grid .modal-header h4 {font-size: initial;padding: initial;height: auto;}
			table#ring_grid .add-to-cart-1 table thead tr{width: initial;float: none;height: unset;}
		}
		</style>
		<div class="col-sm-8 result_page_right pull-right">
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
		<div class="clear"></div>
	</section>
<script>
$( document ).ready(function() {
	var dataTable = $('#ring_grid').DataTable({
		"serverSide": true,
		'processing': true,
		"lengthMenu": [[20, 30, 32, 50, 100, 200, 500, 1000], [20, 30, 32, 50, 100, 200, 500, 1000]],
		"pageLength": 32,
		'oLanguage': {sProcessing: "<div id='loader'></div>"},
		"ajax":{
			url :"<?php echo SITE_URL; ?>engagementringsbeta/engagement_rings_realtime/",
			type: "post",
			'data' : function(data){
				/* Amount */
				var amount_min      = $('#amount').val();
				var amount_max      = $('#amount2').val();

				/* Append to data */
				data.amount_min     = amount_min;
				data.amount_max     = amount_max;

				var categoryArr = []
				$("input:checkbox[id=category]:checked").each(function(){
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

				var colorsArr = []
				$("input:checkbox[id=color]:checked").each(function(){
					colorsArr.push($(this).val());
				});

				var clarityArr = []
				$("input:checkbox[id=clarity]:checked").each(function(){
					clarityArr.push($(this).val());
				});

				var ringsizeArr = []
				$("input:checkbox[id=ring_size]:checked").each(function(){
					ringsizeArr.push($(this).val());
				});

				var settingsArr = []
				$("input:checkbox[id=settings]:checked").each(function(){
					settingsArr.push($(this).val());
				});

				var settingStyleArr = []
				$("input:checkbox[id=setting_style]:checked").each(function(){
					settingStyleArr.push($(this).val());
				});

				var metalArr = []
				$("input:checkbox[id=metal]:checked").each(function(){
					metalArr.push($(this).val());
				});

				var sort_by	= '';
				if ($("#sort_by option:selected").val() != ""){ sort_by = $('#sort_by').val(); }

				data.categoryArr	= categoryArr;
				data.caratWeightArr	= caratWeightArr;
				data.stoneShapeArr	= stoneShapeArr;
				data.colorsArr		= colorsArr;
				data.clarityArr		= clarityArr;
				data.ringsizeArr	= ringsizeArr;
				data.settingsArr	= settingsArr;
				data.settingStyleArr= settingStyleArr;
				data.metalArr		= metalArr;
				data.sort_by		= sort_by;
			},
			error: function(){
				$("#diamond_grid_processing").css("display","none");
			}
		}
	});

	var html_input='<select class="form-control" id="sort_by"><option value="">Defualt</option><option value="ASC">Low to High</option><option value="DESC">High to Low</option></select>';
	$('#ring_grid_length').after(html_input);

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

	$(".color").on('change', function(){
		dataTable.draw(); 
	});

	$(".clarity").on('change', function(){
		dataTable.draw(); 
	});

	$(".ring_size").on('change', function(){
		dataTable.draw(); 
	});

	$(".settings").on('change', function(){
		dataTable.draw(); 
	});

	$(".setting_style").on('change', function(){
		dataTable.draw(); 
	});

	$(".metal").on('change', function(){
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
});

$(document).ready(function(){
	$("#showmore1").click(function(){
		$("#showmore1").hide();
		$("#showless1").show();
		$(".block1").addClass(" moreinfo");
	});

	$("#showless1").click(function(){
		$("#showless1").hide();
		$("#showmore1").show();
		$(".block1").removeClass(" moreinfo");
	});

	$("#showmore2").click(function(){
		$("#showmore2").hide();
		$("#showless2").show();
		$(".block2").addClass(" moreinfo");
	});

	$("#showless2").click(function(){
		$("#showless2").hide();
		$("#showmore2").show();
		$(".block2").removeClass(" moreinfo");
	});

	$("#showmore3").click(function(){
		$("#showmore3").hide();
		$("#showless3").show();
		$(".block3").addClass(" moreinfo");
	});

	$("#showless3").click(function(){
		$("#showless3").hide();
		$("#showmore3").show();
		$(".block3").removeClass(" moreinfo");
	});

	$("#showmore4").click(function(){
		$("#showmore4").hide();
		$("#showless4").show();
		$(".block4").addClass(" moreinfo");
	});

	$("#showless4").click(function(){
		$("#showless4").hide();
		$("#showmore4").show();
		$(".block4").removeClass(" moreinfo");
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

/* carat_slider_range */
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

$("#carat_min").change(function() {
	$("#carat_slider_range").slider('values',0,$(this).val());
	dataTable.draw();
});

$("#carat_max").change(function() {
	$("#carat_slider_range").slider('values',1,$(this).val());
	dataTable.draw();
});

/* clarity_slider_range */
$( "#clarity_slider_range" ).slider({
	range: true,
	min: 0,
	max:100,
	values: [ <?php if($_GET['clarity']){ echo $_GET['clarity']; }else{ echo 0; } ?>, 100],
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

$("#clarity_min").change(function() {
	$("#clarity_slider_range").slider('values',0,$(this).val());
	dataTable.draw();
});

$("#clarity_max").change(function() {
	$("#clarity_slider_range").slider('values',1,$(this).val());
	dataTable.draw();
});

/* price_slider_range */
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
		$(".amount").val(ui.values[0]);
		$(".amount2").val(ui.values[1]);
		$('.amount').attr('value',ui.values[0]);
		$('.amount2').attr('value',ui.values[1]);
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
</script>