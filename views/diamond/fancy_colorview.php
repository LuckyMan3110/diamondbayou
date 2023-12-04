<?
	/*
	var_dump($this->session->userdata('colormin'));
	var_dump($this->session->userdata('colormax'));
	
	var_dump($this->session->userdata('cutmin'));
	var_dump($this->session->userdata('cutmax'));
	
	
	var_dump($this->session->userdata('caratmin'));
	var_dump($this->session->userdata('caratmax'));
	*/
	?>

<style type="text/css">
#carousel_inner {
	/*float:left;*/ /* important for inline positioning */
	/*width:405px;*/ /* important (this width = width of list item(including margin) * items shown */
	/*overflow: hidden;*/  /* important (hide the items outside the div) *//* non-important styling bellow */
}
#carousel_ul {
	position:relative;
	left:-210px; /* important (this should be negative number of list items width(including margin) */
	list-style-type: none; /* removing the default styling for unordered list items */
	margin: 0px;
	padding: 0px;
	width:9999px; /* important */
	/* non-important styling bellow */
	padding-bottom:10px;
}
#carousel_ul li {
	float: left;
	margin: 5px 46px 24px -18px;
	padding: 0;
	width: 210px;
}
#carousel_ul li img {
 .margin-bottom:-4px; /* IE is making a 4px gap bellow an image inside of an anchor (<a href...>) so this is to fix that*/
	/* styling */
	cursor:pointer;
	cursor: hand;
	border:0px;
}
#left_scroll {
	float: left;
	margin: 80px 0 0 -10px;
	position: absolute;
}
#right_scroll {
	float: right;
	margin: 81px 0 0 209px;
	position: absolute;
}
#left_scroll img, #right_scroll img {
	/*styling*/
	cursor: pointer;
	cursor: hand;
}
#sign_up1 {
	margin:0px auto;
	width:1024px !important;
	float:none;
}

.ui_slider1 { width:425px !important;}
.ui_slider2 { width:370px !important;}
.ui_slider3 { width:396px !important;}
.ui_slider4 { width:425px !important;}
.ui_slider5 { width:370px !important;}
.setcut_slider{float:left !important; margin-left:10px;}
.maxCt {
  float: right; margin-right: 10px;
  width: 25px;
}
.carat_max, .priceRange {
  background: #fff;
  border: 1px solid #fff;
  width: 50px;
  text-align: center;
  padding: 3px 2px;
  font-size: 12px;  border-radius: 0px;
  color: #000;
}
.clrTb{color:#fff !important;font-size: 12px; max-width:434px; width:100%; border-spacing: 18px; margin: -8px 0px 0px -28px;}
.optionList{ max-width: 350px; width:100%; margin: 6px 0px 0px -3px;}
#CutLabels{ font-size: 12px; width: 470px; margin:8px 0px 0px -12px;}
<?php
if(strcmp('toearring', $addoption) === 0) {
	echo '.cols_box:nth-of-type(2):after{content: url("'.config_item('base_url').'img/page_img/side_sticon.png"); width:75px; height:35px;position: absolute;right: 32px;top: 5px;}';
}
$tothre_stone = array('tothreestone', 'tothree_stone');

if(in_array($addoption, $tothre_stone)) {
	echo '.cols_box:nth-of-type(4):after{content: url("'.config_item('base_url').'img/page_img/engage_ring.jpg"); width:39px; height:39px;position: absolute;right: 3px;top: 0px;}';
}
$contacts_info = get_site_title('contact_info');
?>

</style>
<? if($this->uri->segment(2) == 'search') : ?>
<style>
#con {
	margin: 28px 0 0 -86px!important;
}
</style>
<? endif; ?>
<?php /*?><script type="text/javascript">
	$.ajax({
	type	:	'POST',
	url	:	'<?php echo config_item('base_url')?>index.php/diamonds/get_fancy/'+id,	
	success: function(html){
	$('#bDiv').html(html);	
	
	}
	});
	</script><?php */?>
<style>
.glyphicon {
	top: -9px!important;
}
.col-md-11 section1-bg {
	top: 15px!important;
}
.padding-1 {
	padding-bottom: 11px;
	padding-left: 38px;
	padding-top: 23px;
}
.padding-2 {
	padding-left: 22px;
}
.ui-slider .ui-slider-handle {
	margin: 2px 0 0 -1px!important;
}
.ui-slider {
	height: 31px!important;
}
.ui-slider-handle {
/* background-image: url("<?php echo config_item('base_url')?>images/right-dir-arow.png")!important;*/
	}
.ui-slider a + a .ui-slider-handle {
	/*background-image: url("<?php echo config_item('base_url')?>images/left-dir-arow.png")!important;*/
	height: 26px;
}
.flexigrid {
	max-width:860px!important; width:100% !important;
}
.right-add-p {
	padding-bottom:70px;
}
.rightBox {
	min-height:680px;
}
.clrTb tbody tr td{width:24px;}
#CutLabels tbody tr td{width:90px; padding-right:85px;}
#CutLabels tbody tr td:last-child{padding-right:0px;}
</style>
<?php 
	//echo $this->session->userdata('sort_dmid');
	$shapes = array();
	if(($this->session->userdata('shape'))) $shapes = explode('.' , strtoupper($this->session->userdata('shape')));
	
	$dbminprice = ($this->session->userdata('dbminprice')!=null)?($this->session->userdata('dbminprice')):0;
	$dbmaxprice = ($this->session->userdata('dbmaxprice')!=null)?($this->session->userdata('dbmaxprice')):2130000;
	$dbmincarat = ($this->session->userdata('dbmincarat')!=null)?($this->session->userdata('dbmincarat')):0;
	$dbmincarat = ($this->session->userdata('dbmaxcarat')!=null)?($this->session->userdata('dbmaxcarat')):9.99;
	
	$this->session->set_userdata('caratmin', isset($_COOKIE['caratmin'])?$_COOKIE['caratmin']:0.17);
	$this->session->set_userdata('caratmax', isset($_COOKIE['caratmax'])?$_COOKIE['caratmax']:9.99);
	$this->session->set_userdata('cutmin', isset($_COOKIE['cutmin'])?$_COOKIE['cutmin']:0);
	$this->session->set_userdata('cutmax', isset($_COOKIE['cutmax'])?$_COOKIE['cutmax']:3);
	$this->session->set_userdata('colormin', isset($_COOKIE['colormin'])?$_COOKIE['colormin']:0);
	$this->session->set_userdata('colormax', isset($_COOKIE['colormax'])?$_COOKIE['colormax']:6);
	$this->session->set_userdata('claritymin', isset($_COOKIE['claritymin'])?$_COOKIE['claritymin']:0);
	$this->session->set_userdata('claritymax', isset($_COOKIE['claritymax'])?$_COOKIE['claritymax']:8);
	
	//file_put_contents("somefile.sql.txt",$caratmin . "," . $caratmax . "," . $cutmin . "," . $cutmax . "," . $colormin . "," . $colormax . "," . $claritymin . "," . $claritymax . "," . $shape . "\n",FILE_APPEND);
	
	?>

<div>
	<?php echo $pendan_stepsbar; ?>
<div class="mainwrap">
        <div class="inner_container">
                <div class="filter_links">
                    <ul class="setlinksbg">
                        <li><a href="#">Standard</a></li>
                        <li><a href="#" class="activelink">Advanced</a></li>
                        <li><a href="#">Fancy Colored</a></li>
                        <li><a href="#">Request</a></li>
                        <li><a href="#">Compare</a></li>
                        <li><a href="#">Reset</a></li>
                        <li><a href="#">Save Search</a></li>
                    </ul>                    
                </div>
            <div class="shapes_section">
            <ul class="diamond_shapes">
                <li class="active_shape">
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/round_sh.jpg" alt="Round"></a></div>
                    <div><a href="#">Round</a></div>                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/princess_sh.jpg" alt="Princess"></a></div>
                    <div><a href="#">Princess</a></div>                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/emerald_sh.jpg" alt="Emerald"></a></div>
                    <div><a href="#">Emerald</a></div>                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/asscher_sh.jpg" alt="Asscher"></a></div>
                    <div><a href="#">Asscher</a></div>
                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/marquise_sh.jpg" alt="Marquise"></a></div>
                    <div><a href="#">Marquise</a></div>                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/oval_sh.jpg" alt="Oval"></a></div>
                    <div><a href="#">Oval</a></div>                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/radiant_sh.jpg" alt="Radiant"></a></div>
                    <div><a href="#">Radiant</a></div>                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/pear_sh.jpg" alt="Pear"></a></div>
                    <div><a href="#">Pear</a></div>                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/heart_sh.jpg" alt="Heart"></a></div>
                    <div><a href="#">Heart</a></div>                    
                </li>
                <li>
                    <div><a href="#"><img src="<?php echo SITE_URL; ?>img/david_home/cushion_sh.jpg" alt="Cushion"></a></div>
                    <div><a href="#">Cushion</a></div>                    
                </li>
            </ul>
        </div>
            <div class="carat_bar">Carat</div>
            <div class="carat_slide"><img src="<?php echo SITE_URL; ?>img/david_home/diamond_search/carat_filter.jpg" alt="Carat"></div>
            <div class="filter_blocs">
                <div class="filterleft">
                    <div class="carat_bar">Color</div>
                    <div class="cutblock colorbk_box">
                     <?php
                     $fancyColor = '';
                     
                        for( $f = 1; $f <= 11; $f++) {
                            $activeBox = ( $f == 1 ? ' activecutbox' : '');
                            $fancyColor .= '<div class="cutboxs'.$activeBox.'"><img src="'.IMGSRC_LINK.'fcolor_'.$f.'.jpg" alt="Fancy Color" /></div>';
                        }
                        echo $fancyColor;
                     ?>
                        <div class="clear"></div>
                    </div>
                    <!-- clarity filter block start -->
                    <div class="clarity_block">
                        <div class="carat_bar">Clarity</div>
                    <div class="cutblock">
                        <div class="cutboxs activecutbox">FL</div>
                        <div class="cutboxs">IF</div>
                        <div class="cutboxs">VVS1</div>
                        <div class="cutboxs">VVS2</div>
                        <div class="cutboxs">VS1</div>
                        <div class="cutboxs">VS2</div>
                        <div class="cutboxs">SI1</div>
                        <div class="cutboxs">SI2</div>
                        <div class="clear"></div>
                    </div>
                    </div>
                    <!-- clarity filter block end here -->                    
                </div>
                <div class="filterright">
                    <!-- color filter block start here -->   
                    <div class="carat_bar">Intensity</div>
                    <div class="cutblock intensitybk_box">
                        <div class="cutboxs activecutbox">Faint</div>
                        <div class="cutboxs">V.Light</div>
                        <div class="cutboxs">Light</div>
                        <div class="cutboxs">F.Light</div>
                        <div class="cutboxs">Fancy</div>
                        <div class="cutboxs">Intense</div>
                        <div class="cutboxs">Vivid</div>
                        <div class="cutboxs">Deep</div>
                        <div class="cutboxs">Dark</div>
                        <div class="clear"></div>
                    </div>
                    <!-- color filter block end here -->
                    
                    <!-- price filter block start here -->
                    <div>
                        <div class="carat_bar">Price</div>
                    <div class="pricefilter_bk">
                        <div class="pricebkview"><img src="<?php echo SITE_URL; ?>img/david_home/diamond_search/price_filters.jpg" alt="Price Filter"></div>
                        <div class="clear"></div>
                    </div>
                    </div>
                    <!-- price filter block end here -->
                </div>
                <div class="clear"></div><br>
                    <div class="carat_bar"></div><br>
            </div>
            </div>
        <div class="clear"></div>
        </div>
    
  <div class="clear"></div>
  <div class="searchBox row-fluid">
    <div class="col-sm-9 diamondbg_block">
      <div class="dlHead">14, 014 AGS and GIA GRADED DIAMONDS</div>
      <div class="diamond_search">
          <form name="searchForm" id="searchForm" method="post" action="#">
              <input type="text" name="diamnd_search" placeholder="Search Sku" />
              <input type="image" src="<?php echo SITE_URL; ?>img/david_home/diamond_search/search_filter_ic.jpg" />
          </form>  
      </div>
      <div class="clear"></div>
      <br />
      <!--Table Area Start-->
      <form name="diamondList" id="diamondList" method="post" action="<?php echo config_item('base_url')?>diamonds/listComparedDimaond">
<div>
        <td valign="top"><table id="searchresult" style="display:none; max-width:840px; width:100%;">
          </table></td>
      </div>
	</form>
      
      <!--Table Area END-->
      <div class="clear"></div>
      <br>
      <br>
      <div class="compare_section">
        <div class="dlHead">Diamond Comparison</div>
        <form name="comprForm" id="comprForm" method="post" action="">
			<div class="rmall_st"><label for="remov_all">Remove ALL &nbsp;</label>
          <input type="checkbox" id="remov_all" name="remov_all" onclick="emptyCompareList()" value="Y">
        </div>
		</form>
        <div class="comparList">
        	<table>
              <thead>
				<tr>
                    <th width="8%"><a href="">Type</a></th>
                    <th width="11%"><a href="">Shape</a></th>
                    <th width="9%"><a href="">Carat</a></th>
                    <th width="9%"><a href="">Color</a></th>
                    <th width="10%"><a href="">Clarity</a></th>
                    <th width="8%"><a href="">Lab</a></th>
                    <th width="11%"><a href="">Cut</a></th>
                    <th width="12%"><a href="">Price</a></th>
                    <th width="13%"><a href="">Wire</a></th>
                    <th width="9%"><a href="">Details</a></th>
              </tr>
			</thead>
              <tbody>
                  <tr>
                    <td colspan="10">
                    <div>
                    <table width="100%" id="comparedResult">
                    	  <?php 
						  if( !empty($listComparedDimaond) ) {
								echo $listComparedDimaond;  
						  } else {
							  echo '<tr> <td><div class="compmesg_view">
                    <h3>Choose a diamond to Compare</h3></div></td></tr>';
						  }
						  ?>
                    </table>
                    </div>
                    </td>
                  </tr>
				</tbody>
            </table>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div id="vdiamond_detail"> 
        <!--<div class="view_pdetail">Plz Click On Detail To View From Left</div>-->
        <div id="sorting_box">
        <div class="quest_icon"><img src="<?php echo config_item('base_url')?>img/page_img/no-info50x50.png" alt="no-info"/></div>
        <div class="rgHead">Hover over and click diamond details to see further details and shipping information.</div>
        </div>
      </div>
      <div class="clear"></div>
      <div id="defaults_button" style="display:none;">
      <div class="quest_icon"><img src="<?php echo config_item('base_url')?>img/page_img/no-info50x50.png" alt="no-info"/></div>
        <div class="rgHead">Hover over and click diamond details to see further details and shipping information.</div>
        <!--<div class="bkSection">
          <div><a href="" class="price_ic">&nbsp;</a></div>
          <div><a href="" class="color_ic">&nbsp;</a></div>
          <div><a href="" class="clarity_ic">&nbsp;</a></div>
          <div abbr="carat" axis="col2"><a href="#javascript;" id="carat" class="carat_ic">&nbsp;</a></div>
          <div><a href="" class="cutpr_ic">&nbsp;</a></div>
        </div>-->
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
    <br />
    <br />
  </div>
  <div class="clear"></div>
  <script src="<?php echo SITE_URL; ?>js/noslider_js_function.js"></script>
  <script>
//// call functions to active the diamond sliders
$(document).ready(function(){
    $("#fluorescence").click(function(){ //// call a flouresence slider
       getRangeSliderView('floursence_slider', 'fluro_mins', 'fluro_maxs', 0, 4);
    });
	$("#polish").click(function(){ //// call a polish slider
       getRangeSliderView('polish_slider', 'polismin_mins', 'polismax_maxs', 0, 4);
    });
	$("#symmetry").click(function(){ //// call a symmetry slider
       getRangeSliderView('symtry_slider', 'symmet_mins', 'symmet_maxs', 0, 4);
    });
	$("#depthx").click(function(){ //// call a depth slider
       getRangeDecimalValue('depth_vslider', 'depth_minx', 'depth_maxs', 40, 90);
    });
	$("#tablex").click(function(){ //// call a table slider
       getRangeDecimalValue('table_vslider', 'table_mins', 'table_maxs', <?php echo $tablemin; ?>, <?php echo $tablemax; ?>);
    });
	
	getRangeSliderView('sliders', 'claritymin', 'claritymax', 0, 7);
	getRangeSliderView('colrs_slider', 'colormin', 'colormax', 0, 6);
	getRangeSliderView('cutv_slider', 'cutmin', 'cutmax', 0, 3);
	getRangeSliderView('pricesv_slder', 'searchminprice', 'searchmaxprice', <?php echo $dbminprice; ?>, <?php echo $dbmaxprice; ?>);
	getRangeDecimalValue('carat_vslider', 'caratmin', 'caratmax', 0, 9.99);
});

//window.onload = getRangeSliderView('sliders', 'claritymin', 'claritymax', 0, 8);
//window.onload = getRangeSliderView('colrs_slider', 'colormin', 'colormax', 0, 6);
//window.onload = getRangeSliderView('cutv_slider', 'cutmin', 'cutmax', 0, 3);
//window.onload = getRangeSliderView('pricesv_slder', 'searchminprice', 'searchmaxprice', <?php echo $dbminprice; ?>, <?php echo $dbmaxprice; ?>);
//window.onload = getRangeDecimalValue('carat_vslider', 'caratmin', 'caratmax', 0, 9.99);

</script>
<?php //echo $signup_form; ?>
<div class="clear"></div>


<!-- POPUP DETAIL DIAMOND --> 
<!--
	<div id="ds_details_tip12_cursor" style="position: absolute;display:none;left: 302 px;top: 612 px;"><img src="http://icejeweler.seowebdirect.com/images/cursor.png" /></div> -->
<div id="ds_details_tip12" style="display:none;z-index:10000;float:left;left: 302 px;height: 426px;position: absolute;top: 212 px;">
  <div id="ds_details_content" class="ds_details_content">
    <div>
      <h5 class="ds_details_header" style="font-weight: bold;">DIAMOND DETAILS</h5>
      <div id="detail_sku" class="ds_detail_item"><span class="label">Stock Number: </span><br />
        <span class="value" id="dstkn">1333776403</span></div>
      <div id="detail_depth" class="ds_detail_item"><span class="label">Shape: </span><span class="value" id="dshape">Marquise</span></div>
      <div id="detail_table" class="ds_detail_item"><span class="label">Carat: </span><span class="value" id="dcarat">0.43</span></div>
      <div id="detail_girdle" class="ds_detail_item"><span class="label">Color: </span><span class="value" id="dcolor">M</span></div>
      <div id="detail_symmetry" class="ds_detail_item"><span class="label">Clarity: </span><span class="value" id="dslarity">I1</span></div>
      <div id="detail_price" class="ds_detail_item"><span class="label">Price: </span><span class="value" id="dprice">$193</span></div>
      <div id="detail_culet" class="ds_detail_item"><span class="label">Ratio: </span><span class="value" id="dratio">1.66</span></div>
      <div id="detail_fluorescence" class="ds_detail_item"><span class="label">Cut: </span><span class="value" id="dcut">Good</span></div>
      <div id="detail_measurements" class="ds_detail_item"><span class="label">Fluorescence: </span><span class="value OneLinkNoTx" id="dculet">53.4</span></div>
      <div id="detail_lxw" class="ds_detail_item"><span class="label">Lab: </span><span class="value OneLinkNoTx" id="dcert">Good</span></div>
    </div>
    <div id="detail_certlab" class="ds_detail_report_container"> <span class="value" id="cert-file-not-available"></span> </div>
    <div class="ds_detail_shipping_container">
      <div class="ds_detail_item" id="detail_shippingloose"> <span class="label">Loose diamond: </span><span id="detail_shippingloose_value" class="value">Call</span> </div>
      <div class="ds_detail_item" id="detail_shippingjewelry"><span class="label">Set in jewelry: </span> <span id="detail_shippingjewelry_value" class="value">Call</span> </div>
      <div style="text-align:left;font-size:14px;"><?php  echo $contacts_info ?></div>
    </div>
  </div>
</div>

<!-- END POPUP DETAIL DIAMOND -->

<div class="clear"></div>
</div>
