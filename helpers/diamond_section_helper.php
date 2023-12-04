<?php
function on_off_features($mainClass='polish_slider', $svar='', $svalmin='', $svalmax='', $colid=0) {
	$features = '<div class="toggle_box_bk">
		<div class="toggle btn btn-default on_off_size off '.$mainClass.'" onclick="show_on_off(\''.$mainClass.'\'); remove_slider_bgclass(\''.$mainClass.'\'); show_diamond_cols(\''.$colid.'\')" data-toggle="toggle">
			<div class="toggle btn btn-danger on_off_size" data-toggle="toggle">
				<input type="checkbox" checked="" onclick="" data-toggle="toggle" data-width="40" data-height="20px" data-onstyle="danger">
				<div class="toggle-group">
					<label class="btn btn-danger toggle-on">On</label>
					<label class="btn btn-default active toggle-off">Off</label>
					<span class="toggle-handle btn btn-default"></span>
				</div>
			</div>
			<div class="toggle-group">
				<label class="btn btn-danger toggle-on">On</label>
				<label class="btn btn-default active toggle-off">Off</label>
				<span class="toggle-handle btn btn-default"></span>
			</div>
		</div>
		<div class="toggle btn btn-danger on_off_size hide_block '.$mainClass.'" onclick="show_on_off(\''.$mainClass.'\');  add_slider_bgclass(\''.$mainClass.'\'); hide_diamond_cols(\''.$svar.'\',\''.$svalmin.'\',\''.$svalmax.'\',\''.$colid.'\')" data-toggle="toggle">
			<div class="toggle btn btn-danger on_off_size" data-toggle="toggle">
				<input type="checkbox" checked="" data-toggle="toggle" onclick="" data-width="40" data-height="20px" data-onstyle="danger">
				<div class="toggle-group">
					<label class="btn btn-danger toggle-on">On</label>
					<label class="btn btn-default active toggle-off">Off</label>
					<span class="toggle-handle btn btn-default"></span>
				</div>
			</div>
			<div class="toggle-group">
				<label class="btn btn-danger toggle-on">On</label>
				<label class="btn btn-default active toggle-off">Off</label>
				<span class="toggle-handle btn btn-default"></span>
			</div>
		</div>
	</div>';
	return $features;
}

function diamond_set_meta_tags($shape='') {
	switch ($shape) {
		case 'AS' :
			$meta_tags = '<meta name="description" content="search">';
		break;
		default :
			$meta_tags = '<meta name="description" content="Buy online fair trade diamond, loose gia diamond, wholesale certified diamonds, diamond anniversary band, diamond bridal sets, diamond solitaire pendant, blue diamond jewelry. Purchase discounted rate diamond anniversary band, diamond bridal sets, diamond solitaire pendant, blue diamond jewelry">';
		break;
	}
	return $meta_tags;
}