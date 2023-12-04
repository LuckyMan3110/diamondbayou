<style>
.txtsmall{color:#fff;font-weight:700}
.search{color:#fff;font-weight:700}
.ringbox a{color:#fff;font-weight:700}
.norings_found{padding:20px 0 20px 20px;font-size:20px}
.rightbox_head{margin:9px 0 10px}
[type=radio]:checked, [type=radio]:not(:checked){position:relative;left:0px;}
</style>
<link type="text/css" href="<?php echo SITE_URL; ?>css/steps_bar_section.css" rel="stylesheet" />
 <?php
$shape = view_shape_value($imgname, isset($details['shape'])?$details['shape']:'');
$view_shapeimg = view_shape_value($shape_image, isset($details['shape'])?$details['shape']:'');
$viewshape_image = SITE_URL .'images/shapes_images/'.$shape_image;
?>
<script>
function setCheckBox() {
	$('input#solitairechk').removeAttr('checked');	
}
$(document).ready(function() {
	getringresults();
	get_ring_results();
});
</script>
<div class="clr"></div>
<div class="diamond_block ringsettings row-fluid">
	<?php if(!empty($setting_ring_id)){ ?>
		<br>
		<div id="Filters">
			<div id="Funnel">
				<ul class="funnel-container" data-share-link="">
					<li class="funnel-step">
						<?php if(!empty($setting_image) && file_exists($setting_image)){ ?>
							<div class="funnel-step-container">
								<span class="funnel-step-content">1<span class="title_1"><a id="SettingFunnel" style="text-decoration:none;cursor:pointer" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br>SETTING</a></span>
								<span class="edit_1"></span>
								<span class="img_1"><a href="<?= isset($view_link)?$view_link:''; ?>" id="SettingFunnel_ImageView" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane"><img class="steps_img" src="<?php if(!empty($setting_image) && file_exists($setting_image)){ echo $setting_image; }else{ echo SITE_URL.'img/page_img/no_image.jpg'; } ?>"></a></span>
								<span class="price_1"><span class=""><?isset($setting_price)?'$'.$setting_price:''; ?></span></span>
								<span class="change_1"><span style=""><a id="SettingFunnel_View" class="viewchange" href="<?= isset($view_link)?$view_link:''; ?>" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">View</a> | <a id="SettingFunnel_Remove" href="<?php echo SITE_URL; ?>engagement/remove_unique_setting" class="viewchange"container="#WidePane">Remove</a></span></span></span>
							</div>
						<?php }else{ ?>
							<div class="funnel-step-container"><span class="funnel-step-content">1<a id="SettingFunnel" style="cursor:pointer" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane" href="#"><span class="title_1"><span style="padding-left:0px !important">CHOOSE A</span><br>SETTING</span></a><span class="noring1"></span></span></div>
						<?php } ?>
					</li>
					<li class="funnel-step">
						<?php if(!empty($diamond_shapes) && file_exists($diamond_shapes)){ ?>
							<div class="funnel-step-container">
							<span class="funnel-step-content">2<span class="title_2">
							<a id="DiamondFunnel" style="text-decoration:none" container="#WidePane" href="#">
							<span style="padding-left:0px !important">CHOOSE A</span><br>DIAMOND</a></span>
							<span class="edit_2"></span>
							<a id="DiamondFunnel_ImageView" href="<?= isset($diamond_view_link)?$diamond_view_link:''; ?>" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane"><span class="img_2"><img class="steps_img" src="<?= isset($diamond_shapes)?$diamond_shapes:''; ?>" /></span></a>
							<span class="price_2"><?= isset($diamond_price)?'$'.$diamond_price:''; ?></span>
							<span class="change_2"><span>
							<a id="DiamondFunnel_View" class="viewchange" href="<?= isset($diamond_view_link)?$diamond_view_link:''; ?>" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane">View</a> |
							<a id="DiamondFunnel_Remove" href="<?php echo SITE_URL; ?>engagement/remove_diamond_detail" class="viewchange" container="#WidePane">
							Remove
							</a></span></span></span></div>
						<?php }else{ ?>
							<div class="funnel-step-container"><span class="funnel-step-content">2<span class="title_2"><a id="DiamondFunnel" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br> DIAMOND</a></span><span class="nodiamond2"></span></span></div>
						<?php } ?>
					</li>
					<li class="funnel-step step-active set_active_img complete_step">
						<div class="funnel-step-container"> <span class="funnel-step-content">3</span><span class="complete-ring completeFunnel"></span>
						<span class="title_3">
						<a id="CompleteFunnel" container="#WidePane" href="#"><span style="padding-left:0px !important">REVIEW</span><br>
						COMPLETE    
						RING <span class="price_3"><span class=""><?= isset($ring_total_price)?'$'.$ring_total_price:''; ?></span></span></a></span><span class="img_3"></span><span class="price_3"></span> 
						</div>
					</li>
				</ul>
			</div>
		</div>
		<br>
	<?php } else { ?>
		<div id="Filters">
			<div id="Funnel">
				<ul class="funnel-container" data-share-link="">
					<li data-shipping-date="" class="funnel-step step-active step_active_bk">
					<div class="funnel-step-container"><span class="funnel-step-content">1<a id="SettingFunnel" style="cursor:pointer" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane" href="#"><span class="title_1"><span style="padding-left:0px !important">CHOOSE A</span><br>
					SETTING</span></a><span class="noring1"></span></span></div>
					</li>
					<li data-shipping-date="" class="funnel-step">
					<div class="funnel-step-container"><span class="funnel-step-content">2<span class="title_2"><a id="DiamondFunnel" beforeprocessfn="JamesAllen.Engagement.DeletePagePosition" container="#WidePane" href="#"><span style="padding-left:0px !important">CHOOSE A</span><br>
					DIAMOND</a></span><span class="nodiamond2"></span></span></div>
					</li>
					<li class="funnel-step">
					<div class="funnel-step-container"><span class="funnel-step-content">3</span><span onClick="JSite.Hijax.Manager.Load('/complete-ring/');" class="complete-ring completeFunnel"></span><span class="title_3"><a id="CompleteFunnel" container="#WidePane" style="cursor:default"><span style="padding-left:0px !important">REVIEW</span><br>
					COMPLETE

					RING </a></span><span class="img_3"></span><span class="price_3"></span></div>
					</li>
				</ul>
			</div>
		</div>
	<?php } ?>
	<div class="clear"></div><br>
	<div class="col-sm-9">
		<div class="breadcrumb_list">
			<span></span><a href="<?php echo SITE_URL; ?>">Home</a>
			<span></span><a href="#">Diamonds</a>
			<span></span><a href="<?php echo SITE_URL; ?>engagement/search">Build Your Own Ring</a>
			<span></span><a href="#">Choose a Setting</a>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div class="leftbox_content">
			<div class="leftbox_heading">My Workbench</div>
            <div class="clear"></div>
            <div class="image_blocks">
				<ul>
					<li>
						<span>Halo Setting</span><br />
						<label for="style_opt4"><img src="<?php echo SITE_URL; ?>img/page_img/halo_setting.jpg" alt="Halo Setting" /></label>
						<input id="style_opt4" type="radio" value="40" checked="checked" name="styles_option" onclick="getringresults(); get_ring_results()" />
					</li>
					<li>
						<span>Accented</span><br />
						<label for="style_opt5"><img src="<?php echo SITE_URL; ?>img/page_img/truth-colection.jpg" alt="Accented" /></label>
						<input id="style_opt5" type="radio" value="39" name="styles_option" onclick="getringresults(); get_ring_results()" />
					</li>
					<li>
						<span>Three Stone</span><br />
						<label for="style_opt3"><img src="<?php echo SITE_URL; ?>img/page_img/three-stne.jpg" alt="Three Stone" /></label>
						<input id="style_opt3" type="radio" value="56" name="styles_option" onclick="getringresults(); get_ring_results()" />
					</li>
					<li>
						<span>Solitaire</span><br />
						<label for="style_opt1"><img src="<?php echo SITE_URL; ?>img/page_img/solitair-img.jpg" alt="Solitaire" /></label>
						<input id="style_opt1" name="styles_option" type="radio" value="52" onclick="getringresults(); get_ring_results()" />
					</li>
					<li>
						<span>Sculptural</span><br />
						<label for="style_opt2"><img src="<?php echo SITE_URL; ?>img/page_img/pave_sidest.jpg" alt="Sculptural" /></label>
						<input id="style_opt2" name="styles_option" value="8" type="radio" onclick="getringresults(); get_ring_results()" />
					</li>
					<li>
						<span>Vintage</span><br />
						<label for="style_opt6"><img src="<?php echo SITE_URL; ?>img/page_img/novela-colection.jpg" alt="Vintage" /></label>
						<input id="style_opt6" type="radio" value="179" name="styles_option" onclick="getringresults(); get_ring_results()" />
					</li>
				</ul>
			</div>
            <div class="clear"></div>
            <div class="pricebox_section">
				<div class="seting-box">
					<div class="box-row">
						<div class="signat-bk col-sm-4">
							<input type="checkbox" id="signat_seting" name="signat_seting" onclick="getringresults()" value="Y">
							&nbsp; <span class="sgicons"><label for="signat_seting">Rings that Support Specific Shapes</label></span>
						</div>
						<div class="signat-bk1 col-sm-4">
							<input type="checkbox" id="suport_anyshape" name="yadegar_select" onclick="getringresults()" value="Y">
							&nbsp; <span class="sgicon1s"><label for="suport_anyshape">Rings that Support any shape</label></span>
						</div>
						<div class="signat-bk col-sm-4">
							<input type="checkbox" id="other_designer" name="other_designer" onclick="getringresults()" value="Y">
							&nbsp; <span class="sgicon2s"><label for="other_designer">Rings that Support Specific Ranges</label></span>
						</div>
					</div>
					<div class="clear"></div>
					<br>
					<div class="box-row">
						<div class="signat-bk"> Price : <a href="#">Low To High</a>&nbsp;&nbsp;<a href="#">High To Low</a> </div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="paginat_st" id="paginat_st">
				<div class="paginate_left col-sm-5">
					Page <span class="previous_ar"></span>&nbsp;
					<select name="paginat_box" id="paginat_box" onchange="rdLink('paginat_box')" class="ddbox-st1">
						<option value="">1</option>
						<option value="">2</option>
						<option value="">3</option>
						<option value="">4</option>
						<option value="">5</option>
					</select>
					&nbsp;<span class="next_ar"></span>&nbsp; of 5 pages &nbsp;&nbsp;&nbsp;&nbsp;
				</div>
				<div class="paginate_right col-sm-3" id="vprod_page_limit">
					View Products: <a href="#javascript">9</a> | <a href="#javascript">27</a> | <a href="#javascript">54</a>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div>
			<div id="searchresult"></div>
		</div>
	</div>
    <div class="col-sm-3 workbench_section">
        <div class="rightbox_head">&nbsp;</div>
        <div class="workbench_block">
            <div class="rightbox_head">Workbench</div>
            <?php echo $work_bench; ?>
        </div>
        <div style="float:left; padding-left:18px; display:none; font-size:" class="left_select_ring_menu">
				<?php if(isset($details) && !empty($details)){?>
					<div>
						<h4 class="textcenter"><font class="bgblue">Your Diamond</font></h4>
					</div>
					<div>
						<table width="220" cellpadding="0" cellspacing="0" style="border: 1px solid #e9e9e9;">
							<tbody>
								<tr>
									<td width="60">
									    <img src="<?php echo SITE_URL; ?>images/diamonds/<?php echo strtolower($shape);?>.jpg">
									</td>
									<td width="160">
										<table cellpadding="0" cellspacing="0" border="0" width="100%">
											<tbody>
												<tr class=" font9px"><td align="right">Lot #: </td><td align="left">&nbsp;<?php echo $details['lot'] ;?></td></tr>
												<tr class=" font9px"><td align="right">Shape : </td><td align="left">&nbsp;<?php echo $shape; ?></td></tr>
												<tr class=" font9px"><td align="right">Carat : </td><td align="left">&nbsp;<?php echo $details['carat']; ?></td></tr>
												<tr class=" font9px"><td align="right">Price : </td><td align="left">&nbsp;<?php echo $details['price']; ?></td></tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						
						</table>
						
					</div>
					<div class="dbr"></div>
					<?php }?> 
					
					
					<div style=" padding-bottom: 20px;  font-size: 15px;"  class="textcenter font12 "><font style="    float: left; font-size: 22px;padding-bottom: 20px;padding-top: 10px;text-decoration: underline; color:#FFFFFF;" >Select Your Ring:</font></div>
					<div class="dbr"></div>
					<div class="bigcontainerL marginauto"> 
					
						<div class="floatmy Pave">
							<input id="marktchk" type="checkbox" onclick="getringresults();viewZkorStyle()" >
							<label for="marktchk"><a class="hiddendiv" ></a></label>
						</div>	
											
						<div class="clear"></div>
						<div class="floatmy w60px textcenter"><label for="marktchk">Zkor Collection </label> </div>
						
						<div class="clear"></div>
						<!--
						<div class="floatmy w60px textcenter"><label for="daussichk">Demo</label></div>
						<div class="floatmy w60px textcenter"><label for="antiquechk">Demo</label></div> -->
						<div class="clear"></div>
						
					</div>
                    
                    <div class="bigcontainerL marginauto">
					
						<div class="floatmy Pave">
							<input id="markUnchk" type="checkbox" onclick="getringresults();viewZkorStyle()" />
							<label for="markUnchk"><a class="hiddendiv" ></a></label>
						</div>	
											
						<div class="clear"></div>
						<div class="floatmy w60px textcenter"><label for="markUnchk">Unique Collection </label> </div>
						
						<div class="clear"></div>
						<!--
						<div class="floatmy w60px textcenter"><label for="daussichk">Demo</label></div>
						<div class="floatmy w60px textcenter"><label for="antiquechk">Demo</label></div> -->
						<div class="clear"></div>
						
					</div>
<style>
.floatmy {
    color: #FFFFFF;
    float: left;
    font-family: verdana;
    font-size: 12px;
    padding-left: 0;
}
</style>					
					
					
					<div class="dbr"></div>
					<div style="padding-bottom: 20px; font-size: 15px; padding-top: 10px;" class="textcenter font12 "><font style="float:left; font-size:16px; padding-bottom:10px;"  class="bgblue1">Select setting style(s)</font></div>
					<div class="dbr"></div>
					<div id="zkrCollection" class="bigcontainerL marginauto">
					
						<div  class="floatmy Pave">
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
						<div class="floatmy w60px textcenter"><label for="pavsechk">Pave</label> </div>
						<div class="floatmy w60px textcenter"><label for="solitairechk">Solitaire</label></div>
						<div class="floatmy w60px textcenter"><label for="sidestoneschk">Sidestone</label></div>
						<div class="clear"></div>
						
						
						
						
						<div  class="floatmy Threestone">
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
						<div style=" color:#666666" class="floatmy w60px textcenter"><label for="threestonechk">Three Stone Rings</label> </div>
						<div class="floatmy w60px textcenter"><label for="halochk">Halo</label></div>
						<div class="floatmy w60px textcenter"><label for="mathingchk">Matching Sets</label></div>
						<div class="clear"></div>
						
						<div  class="floatmy halo">
							<input id="anniversarychk" type="checkbox" onclick="getringresults()" checked >
							<label for="anniversarychk"><a class="hiddendiv" ></a></label>
						</div>	
						<div  class="floatmy weddingband">
							<input id="weddingbandchk" type="checkbox" onclick="getringresults()" checked >
							<label for="weddingbandchk"><a class="hiddendiv" ></a></label>
						</div>
						<div class="clear"></div>
						<div class="floatmy w60px textcenter"><label for="anniversarychk">Annive-<br />rsary</label> </div>
						<div class="floatmy w60px textcenter"><label for="weddingbandchk">Wedding Band</label> </div>
						<div class="clear"></div>
					</div>
                    
                    <div id="uniqueCollection" class="bigcontainerL marginauto" style="display:none;">
					
						<div  class="floatmy Pave">
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
						<div class="floatmy w60px textcenter"><label for="classick">Classic</label> </div>
						<div class="floatmy w60px textcenter"><label for="sidestck">Sidestone</label></div>
						<div class="floatmy w60px textcenter"><label for="petite">Petite</label></div>
						<div class="clear"></div>
						
						
						
						
						<div  class="floatmy halo">
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
						<div style=" color:#666666" class="floatmy w60px textcenter"><label for="halock">Halo</label> </div>
						<div class="floatmy w60px textcenter"><label for="thstoneck">Three Stone</label></div>
						<div class="floatmy w60px textcenter"><label for="bridalck">Bridal</label></div>
						<div class="clear"></div>
                        
                        <div  class="floatmy solitaire">
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
						<div style=" color:#666666" class="floatmy w60px textcenter"><label for="solitairck">Solitaire</label> </div>
						<div class="floatmy w60px textcenter"><label for="antiquck">Antique</label></div>
						<div class="floatmy w60px textcenter"><label for="colorstck">Color Stones</label></div>
						<div class="clear"></div>
                        
                        <div  class="floatmy Threestone">
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
						<div style=" color:#666666" class="floatmy w60px textcenter"><label for="fancyck">Fancy</label> </div>
						<div class="floatmy w60px textcenter"><label for="semimountck">Semi Mount</label></div>
						<div class="floatmy w60px textcenter"><label for="engragck">Engraved</label></div>
						<div class="clear"></div>
					</div>
					
					
					<br>
					<div class="textcenter font12 "><font style="float:left; font-size:16px; padding-bottom:10px; color:#000000" class="bgblue1">Select Metal Type(s)</font></div>
					<div><br></div>
					<div class="bigcontainerL marginauto">	
										
						<div  class="floatmy patinum">
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
						<div class="floatmy w60px textcenter"><label for="patinumchk">Platinum</label></div>
						<div class="floatmy w60px textcenter"><label for="goldchk">Gold</label></div>
						<div class="floatmy w60px textcenter"><label for="whitegoldchk">White Gold</label></div>
						<div class="clear"></div>
					</div>
					
					<br>
					<div class="textcenter font12 "><font class="bgblue1">Setting Price</font></div>
					<br>
					<div class="bigcontainerL marginauto">
						<table>
				 			<tr>
					   	     <td colspan="2">
					   	     	<div id='pricerange' class='ui-slider-2'>
									<div class='ui-slider-handle'></div>
									<div class='ui-slider-handle' style="left: 168px;"></div>	
								</div>
							 </td>
							</tr>
							<tr>
							   	  <td align="left"><small>Min</small><input type="text" value="<?php echo $minprice;?>" id="pricerange1" name="pricerange1" class="w50px price"> </td>
							   	  <td align="right"><small>Max</small><input type="text" value="<?php echo $maxprice;?>" id="pricerange2" name="pricerange2" class="w50px price"></td>
					   	    </tr>
				 		</table>
						
					</div>
					
					<br>
					 
					<div style="color:#FFFFFF" class="">
						Select Shape <select name="shape" id="ringshape" onchange="getringresults()">
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
</div>
<div style="margin:0 auto; width:970px;">
                    <div style="float:left; padding-left:03px;" id="line_3"></div>
                     <div id="free_left"></div>
             
                     <div id="free_right"></div>

				<input type="hidden" id="hlot" name="hlot" value="<?php echo isset($lot) ? $lot : 0 ;?>"/>
				
				<div class="clear"></div>
			
	  	</div>