<link href="<?php echo SITE_URL; ?>css/steps_bar_section.css" type="text/css" rel="stylesheet" />
<style>
.txtsmall{color:#000;font-weight:700}
.search{color:#000;font-weight:700}
.ringbox a{color:#000;font-weight:700}
.ui-slider{height:25px}
.maxCt{margin:0 -62px 5px 0}
.minPr{margin:0 0 0 -10px}
.sliderSetRow label{margin-bottom:15px}
.clrTb{width:100%;margin:20px 0 20px 0px;position:static}
.w50px{border:1px solid #ccc;padding:2px;text-align:center}
.flexigrid div.bDiv table.autoht{width:840px!important}
#advancesearch table{width:100%}
#polishrow,#symmetryrow,#depthrow,#tablerow,#flurorow{float:left;width:30%;margin:0 28px 10px 0;height:100px}
.set_filter_margin{margin:0 39px 0 6px !important}
.setValueTable tbody tr td{width:100px;display:inline-block}
.setValueTable{font-size:12px;margin:6px -10px 8px -11px}
.setValueTable tbody tr td:first-child{text-align:left;width:12px;float:left;margin-left:7px}
.setValueTable tbody tr td:last-child{text-align:right;width:12px;float:right;margin-right:-16px}
.left_min{margin:-4px 0 10px -6px}
.right_max{margin:0 -9px 3px 0}
.flourValueTable{font-size:12px;margin:0 0 4px -18px}
.flourValueTable tr td{padding:0 6px 6px 2px;text-align:left}
.flourValueTable tbody tr td:last-child{text-align:right;width:12px;float:right;margin-right:-6px}
.flourValueTable tbody tr td:first-child{display:inline-block;margin:-7px 0 0}
.toggle_box_bk{float:right;width:50%;text-align:right;margin:-10px -10px 0 0}
.slider_handle_bg{background:#ccc!important}
.set_slider_bg{background:transparent!important}
.cutslider_lines{z-index:999;position:absolute}
.cutslider_lines li{display:inline-block;border-right:1px solid #F9999B;width:1px;height:8px;margin:0 40px 7px}
.colorslide_lines li{margin:0px 12px 5px 14px !important}
.clarity_slide_lines li{margin:0 12px 5px 10px !important}
.flourslider_lines li{margin:0 24px -3px 38px !important}
.flourslider_lines{margin:-8px 0 0 -5px}
.carat_max{border:1px solid #ccc}
.sliderSetRow .clrTb tr td{padding:0 12px 0 0}
.sliderSetRow .clrTb tr td:nth-of-type(4){padding:0 9px 0 0}
.sliderSetRow .clrTb tr td:nth-of-type(5){padding:0 7px 0 0}
.sliderSetRow .clrTb tr td:nth-of-type(6){padding:0 4px 0 0}
.sliderSetRow .clrTb tr td:nth-of-type(7){padding:0 4px 0 0}
.sliderSetRow .clrTb tr td:nth-of-type(8){padding:0 8px 0 0}
.choose_dmbody .sliderSetRow {width: 32%;margin: 0 5px 0 5px;}
.setColrTable {width: 100%;margin: 19px 0px 19px 0px;}
#sliders {margin-top: 0px;}
.steps_img {border: 1px solid #cccccc;width: 45px;height: 45px;}
</style>
<?php $shape = view_shape_value($img, isset($details['shape'])?$details['shape']:'');?>
<script>
$(document).ready(function () {
	set_input_fields_value('depth_minx', 'depth_maxs');
	set_input_fields_value('table_mins', 'table_maxs');
});
</script>
<div class="clr"></div>
<div id="main-body-a" class="choose_dmbody">
	<div class="diamond_block">
		<?php if(!empty($setting_ring_id)){ ?>
			<br>
			<div id="Filters">
				<div id="Funnel">
					<ul class="funnel-container" data-share-link="">
						<li class="funnel-step">
							<div class="funnel-step-container">
								<span class="funnel-step-content">1<span class="title_1"><a id="SettingFunnel" style="text-decoration:none;cursor:pointer" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br>SETTING</a></span>
								<span class="edit_1"></span>
								<span class="img_1">
								<a href="<?php echo $view_link; ?>" id="SettingFunnel_ImageView" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">
								<img class="steps_img" src="<?php echo $setting_image; ?>" alt="setting_image"></a>
								</span>
								<span class="price_1"><span class="">$<?php echo $setting_price; ?></span></span>
								<span class="change_1"><span style=""><a id="SettingFunnel_View" class="viewchange" href="<?php echo $view_link; ?>" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">View</a> | <a id="SettingFunnel_Remove" href="<?php echo SITE_URL; ?>engagement/remove_unique_setting" class="viewchange"container="#WidePane">Remove</a></span></span></span>
							</div>
						</li>
						<li data-shipping-date="" class="funnel-step">
							<div class="funnel-step-container"><span class="funnel-step-content">2<span class="title_2"><a id="DiamondFunnel" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br>
							DIAMOND</a></span><span class="nodiamond2"></span></span></div>
						</li>
						<li class="funnel-step">
							<div class="funnel-step-container"><span class="funnel-step-content">3</span><span onClick="JSite.Hijax.Manager.Load('/complete-ring/');" class="complete-ring completeFunnel"></span><span class="title_3"><a id="CompleteFunnel" container="#WidePane" style="cursor:default"><span style="padding-left:0px !important">REVIEW</span><br>
							COMPLETE RING </a></span><span class="img_3"></span><span class="price_3"></span></div>
						</li>
					</ul>
				</div>
			</div>
			<br><br>
		<?php } ?>
		<div class="leftdm_box chooseblock_left">
			<div class="breadcrumb_list">
				<span></span><a href="<?php echo SITE_URL; ?>">Home</a>
				<span></span><a href="#">Diamonds</a>
				<span></span><a href="<?php echo SITE_URL; ?>engagement/search">Build Your Own Ring</a>
				<span></span><a href="#">Choose a Diamond</a>
				<div class="clear"></div>        
			</div>
			<div class="clear"></div>
			<div class="leftbox_content">
				<div class="leftbox_heading">My Workbench</div>
				<div class="clear"></div>
				<div class="slideBlock">
					<div class="sliderSetRow col-sm-4">
						<div style="padding-bottom: 20px;"><label>Carat</label> <img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt="quest_mark"></div>
						<div>
							<table class="optionList">
								<tr>
									<td colspan="2">
										<div class="minPr">
											<input type="text" value="<?php echo $carat_mstart; ?>" id="caratmin" class="carat_max" onchange="modifyresult('caratmin',this.value)" />
										</div>
										<div class="maxCt">
											<input type="text" value="<?php echo $carat_mend; ?>" id="caratmax" class="carat_max" onchange="modifyresult('caratmax',this.value)">
										</div>
										<div class="clear"></div>
									</td>
								</tr>
							</table>
						</div>
						<div id="carat_vslider"></div>
					</div>
					<div class="sliderSetRow col-sm-4">
						<label>Color</label> <img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt="quest_mark">
						<div>
							<table class="setColrTable">
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
							</table>
							<input type="hidden" value="<?php echo $grid_pageno; ?>" id="grid_pageno" />
							<input type="hidden" value="1" id="setgrid_page" />
							<input type="hidden" value="<?php echo $color_start; ?>" id="colormin" class="w50px" onchange="modifyresult('colormin',this.value)">
							<input type="hidden" value="<?php echo $color_end; ?>" id="colormax" class="w50px" onchange="modifyresult('colormax',this.value)">
						</div>
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
						<div id="colrs_slider1"></div>
					</div>
					<div class="sliderSetRow col-sm-4">
						<div><label>Clarity</label> <img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt="quest_mark"></div>
						<div>
							<table class="clrTb">
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
						</div>
						<ul class="cutslider_lines clarity_slide_lines">
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
						<div id="sliders"></div>
					</div>
				</div>
				<div class="clear"></div><br><br>
				<div id="advanced_search">
					<div class="viewadvance_options">
						<div id="advancesearch">
							<div class="clearfix"></div>
						</div>
						<div class="clear"></div>
						<div class="adOption">
							<a href="#javascript;" id="viewAvanceOption">View Advanced Options</a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="rightdm_box">
			<div class="rightbox_head">Workbench</div>
			<?php echo $work_bench; ?> <br>
			<div style="float:left; padding-left:18px; display:none; font-size:" class="left_select_ring_menu">
				<?php if(isset($details) && $details){ ?>
					<div>
						<h4 class="textcenter"><font class="bgblue">Your Diamond</font></h4>
					</div>
					<div>
						<table width="220" cellpadding="0" cellspacing="0" style="border: 1px solid #e9e9e9;">
							<tbody>
								<tr>
									<td width="60"><img src="<?php echo config_item('base_url')?>images/diamonds/<?php echo strtolower($shape);?>.jpg"></td>
									<td width="160">
										<table cellpadding="0" cellspacing="0" border="0" width="100%">
											<tbody>
												<tr class=" font9px">
													<td align="right">Lot #: </td>
													<td align="left">&nbsp;<?php echo $details['lot'] ;?></td>
												</tr>
												<tr class=" font9px">
													<td align="right">Shape : </td>
													<td align="left">&nbsp;<?php echo $shape; ?></td>
												</tr>
												<tr class=" font9px">
													<td align="right">Carat : </td>
													<td align="left">&nbsp;<?php echo $details['carat']; ?></td>
												</tr>
												<tr class=" font9px">
													<td align="right">Price : </td>
													<td align="left">&nbsp;<?php echo $details['price']; ?></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="dbr"></div>
				<?php } ?>
				<div style=" padding-bottom: 20px;  font-size: 15px;"  class="textcenter font12 "><font style="    float: left; font-size: 22px;padding-bottom: 20px;padding-top: 10px;text-decoration: underline; color:#FFFFFF;" >Select Your Ring:</font></div>
				<div class="dbr"></div>
				<div class="bigcontainerL marginauto">
					<div class="floatmy Pave">
						<input id="marktchk" type="checkbox" onclick="getringresults();viewZkorStyle()" >
						<label for="marktchk"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div class="floatmy w60px textcenter">
						<label for="marktchk">Zkor Collection </label>
					</div>
					<div class="clear"></div>
					<div class="clear"></div>
				</div>
				<div class="bigcontainerL marginauto">
					<div class="floatmy Pave">
						<input id="markUnchk" type="checkbox" onclick="getringresults();viewZkorStyle()" />
						<label for="markUnchk"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div class="floatmy w60px textcenter">
						<label for="markUnchk">Unique Collection </label>
					</div>
					<div class="clear"></div>
					<div class="clear"></div>
				</div>
				<style>
				.floatmy{color:#FFF;float:left;font-family:verdana;font-size:12px;padding-left:0}
				</style>
				<div class="dbr"></div>
				<div style="padding-bottom: 20px; font-size: 15px; padding-top: 10px;" class="textcenter font12 "><font style="float:left; font-size:16px; padding-bottom:10px;"  class="bgblue1">Select setting style(s)</font></div>
				<div class="dbr"></div>
				<div id="zkrCollection" class="bigcontainerL marginauto">
					<div class="floatmy Pave">
						<input id="pavsechk" type="checkbox" onclick="getringresults()" checked >
						<label for="pavsechk"><a class="hiddendiv" ></a></label>
					</div>
					<div id="solitaire" class="floatmy solitaire">
						<input id="solitairechk" type="checkbox" onclick="getringresults()" checked>
						<label for="solitairechk"><a class="hiddendiv" ></a></label>
					</div>
					<div id="sidestones" class="floatmy sidestones">
						<input id="sidestoneschk" type="checkbox" onclick="getringresults()" checked>
						<label for="sidestoneschk"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div class="floatmy w60px textcenter">
						<label for="pavsechk">Pave</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="solitairechk">Solitaire</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="sidestoneschk">Sidestone</label>
					</div>
					<div class="clear"></div>
					<div class="floatmy Threestone">
						<input id="threestonechk" type="checkbox" onclick="getringresults()" checked >
						<label for="threestonechk"><a class="hiddendiv" ></a></label>
					</div>
					<div id="halo" class="floatmy halo">
						<input id="halochk" type="checkbox" onclick="getringresults()" checked>
						<label for="halochk"><a class="hiddendiv" ></a></label>
					</div>
					<div id="mathing" class="floatmy mathing">
						<input id="mathingchk" type="checkbox" onclick="getringresults()" checked="checked">
						<label for="mathingchk"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div style=" color:#666666" class="floatmy w60px textcenter">
						<label for="threestonechk">Three Stone Rings</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="halochk">Halo</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="mathingchk">Matching Sets</label>
					</div>
					<div class="clear"></div>
					<div class="floatmy halo">
						<input id="anniversarychk" type="checkbox" onclick="getringresults()" checked >
						<label for="anniversarychk"><a class="hiddendiv" ></a></label>
					</div>
					<div class="floatmy weddingband">
						<input id="weddingbandchk" type="checkbox" onclick="getringresults()" checked >
						<label for="weddingbandchk"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div class="floatmy w60px textcenter">
						<label for="anniversarychk">Annive-<br />
						rsary</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="weddingbandchk">Wedding Band</label>
					</div>
					<div class="clear"></div>
				</div>
				<div id="uniqueCollection" class="bigcontainerL marginauto" style="display:none;">
					<div class="floatmy Pave">
						<input id="classick" type="checkbox" onclick="getringresults()" checked >
						<label for="classick"><a class="hiddendiv" ></a></label>
					</div>
					<div id="solitaire" class="floatmy sidestones">
						<input id="sidestck" type="checkbox" onclick="getringresults()" checked>
						<label for="sidestck"><a class="hiddendiv" ></a></label>
					</div>
					<div id="sidestones" class="floatmy sidestones">
						<input id="petite" type="checkbox" onclick="getringresults()" checked>
						<label for="petite"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div class="floatmy w60px textcenter">
						<label for="classick">Classic</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="sidestck">Sidestone</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="petite">Petite</label>
					</div>
					<div class="clear"></div>
					<div class="floatmy halo">
						<input id="halock" type="checkbox" onclick="getringresults()" checked >
						<label for="halock"><a class="hiddendiv" ></a></label>
					</div>
					<div id="halo" class="floatmy Threestone">
						<input id="thstoneck" type="checkbox" onclick="getringresults()" checked>
						<label for="thstoneck"><a class="hiddendiv" ></a></label>
					</div>
					<div id="mathing" class="floatmy mathing">
						<input id="bridalck" type="checkbox" onclick="getringresults()" checked="checked">
						<label for="bridalck"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div style=" color:#666666" class="floatmy w60px textcenter">
						<label for="halock">Halo</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="thstoneck">Three Stone</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="bridalck">Bridal</label>
					</div>
					<div class="clear"></div>
					<div class="floatmy solitaire">
						<input id="solitairck" type="checkbox" onclick="getringresults()" checked >
						<label for="solitairck"><a class="hiddendiv" ></a></label>
					</div>
					<div id="halo" class="floatmy halo">
						<input id="antiquck" type="checkbox" onclick="getringresults()" checked>
						<label for="antiquck"><a class="hiddendiv" ></a></label>
					</div>
					<div id="mathing" class="floatmy mathing">
						<input id="colorstck" type="checkbox" onclick="getringresults()" checked="checked">
						<label for="colorstck"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div style=" color:#666666" class="floatmy w60px textcenter">
						<label for="solitairck">Solitaire</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="antiquck">Antique</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="colorstck">Color Stones</label>
					</div>
					<div class="clear"></div>
					<div class="floatmy Threestone">
						<input id="fancyck" type="checkbox" onclick="getringresults()" checked >
						<label for="fancyck"><a class="hiddendiv" ></a></label>
					</div>
					<div id="halo" class="floatmy halo">
						<input id="semimountck" type="checkbox" onclick="getringresults()" checked>
						<label for="semimountck"><a class="hiddendiv" ></a></label>
					</div>
					<div id="mathing" class="floatmy mathing">
						<input id="engragck" type="checkbox" onclick="getringresults()" checked="checked">
						<label for="engragck"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div style=" color:#666666" class="floatmy w60px textcenter">
						<label for="fancyck">Fancy</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="semimountck">Semi Mount</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="engragck">Engraved</label>
					</div>
					<div class="clear"></div>
					<div class="clear"></div>
					<div class="clear"></div>
				</div>
				<br>
				<div class="textcenter font12 "><font style="float:left; font-size:16px; padding-bottom:10px; color:#000000" class="bgblue1">Select Metal Type(s)</font></div>
				<div><br></div>
				<div class="bigcontainerL marginauto">
					<div class="floatmy patinum">
						<input id="patinumchk" type="checkbox"  onclick="getringresults()" checked >
						<label for="patinumchk"><a class="hiddendiv" ></a></label>
					</div>
					<div id="gold" class="floatmy goldring">
						<input id="goldchk" type="checkbox"  onclick="getringresults()">
						<label for="goldchk"><a class="hiddendiv" ></a></label>
					</div>
					<div id="whitegold" class="floatmy whitegold">
						<input id="whitegoldchk" type="checkbox"  onclick="getringresults()" checked>
						<label for="whitegoldchk"><a class="hiddendiv" ></a></label>
					</div>
					<div class="clear"></div>
					<div class="floatmy w60px textcenter">
						<label for="patinumchk">Platinum</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="goldchk">Gold</label>
					</div>
					<div class="floatmy w60px textcenter">
						<label for="whitegoldchk">White Gold</label>
					</div>
					<div class="clear"></div>
				</div>
				<br>
				<div class="textcenter font12 "><font class="bgblue1">Setting Price</font></div>
				<br>
				<div class="bigcontainerL marginauto">
					<table>
						<tr>
							<td colspan="2"><div id='pricerange' class='ui-slider-2'>
							<div class='ui-slider-handle'></div>
							<div class='ui-slider-handle' style="left: 168px;"></div>
							</div></td>
						</tr>
						<tr>
							<td align="left"><small>Min</small>
							<input type="text" value="<?php echo $minprice;?>" id="pricerange1" name="pricerange1" class="w50px price"></td>
							<td align="right"><small>Max</small>
							<input type="text" value="<?php echo $maxprice;?>" id="pricerange2" name="pricerange2" class="w50px price"></td>
						</tr>
					</table>
				</div>
				<br>
				<div style="color:#FFFFFF" class=""> Select Shape
					<select name="shape" id="ringshape" onchange="getringresults()">
						<option value="all" selected>All Shapes</option>
						<option value="Round">Round</option>
						<option value="Princess">Princess</option>
						<option value="Radiant">Radiant</option>
						<option value="Emerald">Emerald</option>
						<option value="Ascher">Ascher</option>
						<option value="Oval">Oval</option>
						<option value="Marquise">Marquise</option>
						<option value="Pear shape">Pear shape</option>
						<option value="Heart">Heart</option>
						<option value="Cushion">Cushion</option>
					</select>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="col-sm-9">
			<div class="searchBox">
				<div class="leftBox">
					<div class="dlHead">AGS and GIA Graded Diamond</div>
					<div class="clear"></div>
					<br />
					<div class="col-md-11 col-mdmy">
						<td valign="top">
							<table id="searchresult" style="display:none; width:735px"></table>
						</td>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="compare_section leftBox">
					<div class="dlHead">Diamond Comparison</div>
					<div class="rmall_st">Remove ALL &nbsp;
						<input type="checkbox" id="remov_all" name="remov_all" value="Y">
					</div>
					<ul id="compList">
						<li><a href="">Type</a></li>
						<li><a href="">Shape</a></li>
						<li><a href="">Carat</a></li>
						<li><a href="">Color</a></li>
						<li><a href="">Clarity</a></li>
						<li><a href="">Lab Cut Grade</a></li>
						<li><a href="">Price</a></li>
						<li><a href="">Wire</a></li>
						<li><a href="">Details</a></li>
						<li><a href="">Compare</a></li>
					</ul>
					<div class="clear"></div>
					<div class="chDiamond">Choose Diamonds to Compare</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div>
				<div id="searchresult"></div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="detaildmBk"><br>
				<div id="vdiamond_detail" class="fancycolorBk"> 
					<div id="sorting_box"> <?php echo defaultView(); ?></div>
				</div>
				<div class="clear"></div>
				<div id="defaults_button" style="display:none;">
					<?php echo defaultView(); ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div style="margin:0 auto; width:970px;">
		<div style="float:left; padding-left:03px;" id="line_3"></div>
		<div id="free_left"></div>
		<div id="free_right"></div>
		<input type="hidden" id="hlot" name="hlot" value="<?php echo isset($lot) ? $lot : 0 ;?>"/>
		<div class="clear"></div>
	</div>
	<script src="<?php echo SITE_URL; ?>js/noslider_js_function.js?v=0.4"></script>
	<script>
	window.onload = getRangeSliderView2('sliders', 'claritymin', 'claritymax', 0, 18, <?php echo $clarity_start; ?>, <?php echo $clarity_end; ?>);
	window.onload = getRangeSliderView1('colrs_slider1', 'colormin', 'colormax', 0, 18, <?php echo $color_start; ?>, <?php echo $color_end; ?>);
	window.onload = getRangeDecimalValue('carat_vslider', 'caratmin', 'caratmax', <?php echo !empty($min_carat)?$min_carat:0.07; ?>, <?php echo $max_carat; ?>, <?php echo $carat_mstart; ?>, <?php echo $carat_mend; ?>);
	window.onload = getRangeSliderViewFloursence1('floursence_slider1', 'fluro_mins', 'fluro_maxs', 0, 8, 0, 4);
	window.onload = getRangeSliderViewPolish1('polish_slider1', 'polismin_mins', 'polismax_maxs', 0, 6, 0, 3);
	window.onload = getRangeSliderViewSymetry1('symtry_slider1', 'symmet_mins', 'symmet_maxs', 0, 6, 0, 3);
	window.onload = getRangeDecimalValue('depth_vslider', 'depth_minx', 'depth_maxs', <?php echo $min_depth; ?>, <?php echo $max_depth; ?>, <?php echo $min_depth; ?>, <?php echo $max_depth; ?>);
	window.onload = getRangeDecimalValue('table_vslider', 'table_mins', 'table_maxs', <?php echo !empty($min_table)?$min_table:0; ?>, <?php echo !empty($max_table)?$max_table:83; ?>, <?php echo !empty($min_table)?$min_table:0; ?>, <?php echo !empty($max_table)?$max_table:83; ?>);
	</script>
</div>