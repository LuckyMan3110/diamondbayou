<script type="text/javascript">
$.ajax({
		type	:	'POST',
		url	:	'<?php echo config_item('base_url')?>index.php/diamonds/get_fancy/'+id,	
		success: function(html){
$('#bDiv').html(html);	
			
				}
		});
</script>




<style type="text/css">
.ui-slider .ui-slider-handle {
	margin-top: -2px;
	height: 23px;
    width: 11px; 
}
</style>
<?php 

$shapes = array();
if(($this->session->userdata('shape'))) $shapes = explode('.' , strtoupper($this->session->userdata('shape')));

$dbminprice = ($this->session->userdata('dbminprice')!=null)?($this->session->userdata('dbminprice')):0;
$dbmaxprice = ($this->session->userdata('dbmaxprice')!=null)?($this->session->userdata('dbmaxprice')):2130000;
$dbmincarat = ($this->session->userdata('dbmincarat')!=null)?($this->session->userdata('dbmincarat')):0;
$dbmincarat = ($this->session->userdata('dbmaxcarat')!=null)?($this->session->userdata('dbmaxcarat')):9.99;
/*	
if(($this->session->userdata('caratmin')!=null)) $caratmin = $this->session->userdata('caratmin');else $caratmin = 0.17;
if(($this->session->userdata('caratmax')!=null)) $caratmax = $this->session->userdata('caratmax');else $caratmax = 9.99;
if(($this->session->userdata('cutmin')!=null)) $cutmin = $this->session->userdata('cutmin');else $cutmin = 0;
if(($this->session->userdata('cutmax')!=null)) $cutmax = $this->session->userdata('cutmax');else $cutmax = 3;
if(($this->session->userdata('colormin')!=null)) $colormin = $this->session->userdata('colormin');else $colormin = 0;
if(($this->session->userdata('colormax')!=null)) $colormax = $this->session->userdata('colormax');else $colormax = 6;
if(($this->session->userdata('claritymin')!=null)) $claritymin = $this->session->userdata('claritymin');else $claritymin = 0;
if(($this->session->userdata('claritymax')!=null)) $claritymax = $this->session->userdata('claritymax');else $claritymax = 8;

if(false) $caratmin = $this->session->userdata('caratmin');else $caratmin = 0.17;
if(false) $caratmax = $this->session->userdata('caratmax');else $caratmax = 9.99;
if(false) $cutmin = $this->session->userdata('cutmin');else $cutmin = 0;
if(false) $cutmax = $this->session->userdata('cutmax');else $cutmax = 3;
if(false) $colormin = $this->session->userdata('colormin');else $colormin = 0;
if(false) $colormax = $this->session->userdata('colormax');else $colormax = 6;
if(false) $claritymin = $this->session->userdata('claritymin');else $claritymin = 0;
if(false) $claritymax = $this->session->userdata('claritymax');else $claritymax = 8;
*/

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

<div id="main-body-a">
  <table align="center" style="margin: 0px auto; width: 1px;"> 
    <tr>
        <td valign="top">
            <!--       SLIDERS        -->
            <div class="boxdiv w195px p10">
                <h1>Narrow Your Results</h1>
                <div class="dbr"></div>
                <table>
                    <tr>
                        <td colspan="2">Diamonds shape</td>
                    </tr>
                    <tr><td colspan="2">
                        <div id="shape-slider-container" class="slider-container-disabled large-disabled" style="width: 227px;">
                            <ul id="shape">
                                <li<?php if(in_array('B', $shapes)) echo ' class="selected"'; ?>>
                                <span data-shapeid="RD" id="RD_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_RD_OFF">
                                    <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/round.jpg" id="RD" />
                                    <input type="checkbox" name="shape" value="RD" id="shapeRD">
                                    <label for="shapeRD">Round</label>
                                </span>
                            </li>
                            <li<?php if(in_array('PR', $shapes)) echo ' class="selected"'; ?>>
                            <span data-shapeid="PR" id="PR_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_PR_OFF">
                                <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/princess.jpg" id="PR" />
                                <input type="checkbox" name="shape" value="PR" id="shapePR">
                                <label for="shapePR">Princess</label>
                            </span>
                        </li>
                        <li<?php if(in_array('E', $shapes)) echo ' class="selected"'; ?>>
                        <span data-shapeid="EC" id="EC_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_EC_OFF">
                            <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/emerald.jpg" id="EC" />
                            <input type="checkbox" name="shape" value="EC" id="shapeEC" checked="checked">
                            <label for="shapeEC">Emerald</label>
                        </span>
                    </li>
                    <?php if($option != 'tothreestone' && $option != 'addpendantsetings3stone') { ?>
                    <li<?php if(in_array('AS', $shapes)) echo ' class="selected"'; ?>>
                    <span data-shapeid="AS" id="AS_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_AS_OFF">
                        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/asscher.jpg" id="AS" />
                        <input type="checkbox" name="shape" value="AS" id="shapeAS" checked="checked">
                        <label for="shapeAS">Asscher</label>
                    </span>
                </li>
                <li<?php if(in_array('C', $shapes)) echo ' class="selected"'; ?>>
                <span data-shapeid="CU" id="CU_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_CU_OFF">
                    <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/cushion.jpg" id="CU" />
                    <input type="checkbox" name="shape" value="CU" id="shapeCU">
                    <label for="shapeCU">Cushion</label>
                </span>
            </li>
            <?php if(!$this->session->userdata('ispremium')) { ?>
            <li<?php if(in_array('M', $shapes)) echo ' class="selected"'; ?>>
            <span data-shapeid="MQ" id="MQ_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_MQ_OFF">
                <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/marquise.jpg" id="MQ" />
                <input type="checkbox" name="shape" value="MQ" id="shapeMQ" checked="checked">
                <label for="shapeMQ">Marquise</label>
            </span>
        </li>
        <li<?php if(in_array('O', $shapes)) echo ' class="selected"'; ?>>
        <span data-shapeid="OV" id="OV_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_OV_OFF">
            <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/oval.jpg" id="OV" />
            <input type="checkbox" name="shape" value="OV" id="shapeOV" checked="checked">
            <label for="shapeOV">Oval</label>
        </span>
    </li>
    <li<?php if(in_array('R', $shapes)) echo ' class="selected"'; ?>>
    <span data-shapeid="RA" id="RA_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_RA_OFF">
        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/radiant.jpg" id="RA" />
        <input type="checkbox" name="shape" value="RA" id="shapeRA" checked="checked">
        <label for="shapeRA">Radiant</label>
    </span>
</li>
<li<?php if(in_array('P', $shapes)) echo ' class="selected"'; ?>>
<span data-shapeid="PS" id="PS_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_PS_OFF">
    <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/pear.jpg" id="PS" />
    <input type="checkbox" name="shape" value="PS" id="shapePS" checked="checked">
    <label for="shapePS">Pear</label>
</span>
</li>
<li<?php if(in_array('H', $shapes)) echo ' class="selected"'; ?>>
<span data-shapeid="HS" id="HS_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_HS_OFF">
    <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/heart.jpg" id="HS" />
    <input type="checkbox" name="shape" value="HS" id="shapeHS" checked="checked">
    <label for="shapeHS">Heart</label>
</span>
</li>
<?php } }?>
</ul>
</div>
</td></tr>
<!--          END SHAPES        -->
<tr>
    <td colspan="2">Select your price range</td>
</tr>
<tr>
    <td  colspan="2">
        <div id='pricerange' class='ui-slider-2'>
            <div class='ui-slider-handle'></div>
            <div class='ui-slider-handle' style="left: 205px;"></div>	
        </div>
    </td>
</tr>
<tr>
    <td align="left"><small>Min</small>
	<input type="text" value="<?php echo $dbminprice; ?>" id="pricerange1" name="pricerange1" class="w50px price" onchange="modifyresult('searchminprice',this.value)"> </td>
    <td align="right"><small>Max</small><input type="text" value="<?php echo $dbmaxprice; ?>" id="pricerange2" name="pricerange2" class="w50px price" onchange="modifyresult('searchmaxprice',this.value)"></td>
</tr>
<tr>
    <td colspan="2">Select your Carat</td>
</tr>
<tr>
    <td colspan="2">
        <div id='carat' class='ui-slider-2'>
            <div class='ui-slider-handle'></div>
            <div class='ui-slider-handle' style="left: 205px;"></div>
        </div>
    </td>
</tr>
<tr>
    <td align="left"><small>Min</small><input type="text" value="0" id="caratmin" class="w50px" onchange="modifyresult('caratmin',this.value)"> </td>
    <td align="right"><small>Max</small><input type="text" value="9.99" id="caratmax" class="w50px" onchange="modifyresult('caratmax',this.value)"></td>
</tr>
<tr>
    <tr>
        <td colspan="2">  Select your Cut</div></td>
    </tr>
    <tr>
        <td colspan="2">
            <div id='cut' class='ui-slider-2'>
                <div class='ui-slider-handle'></div>
                <div class='ui-slider-handle' style="left: 205px;"></div>	
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table style="font-size:10px;">
                <tr align="center">						   	  				
                    <td width="50px" style="color: #000000;">Good</td>
                    <td width="50px" style="color: #000000;">Very<br>Good</td>
                    <td width="50px" style="color: #000000;">Ideal</td>
                    <td width="50px" style="color: #000000;">Excellent</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="left"><input type="hidden" value="0" id="cutmin" class="w50px" onchange="modifyresult('cutmin',this.value)"></td>
        <td align="right"><input type="hidden" value="3" id="cutmax" class="w50px" onchange="modifyresult('cutmax',this.value)"></td>
    </tr>
    <tr>
        <td colspan="2">Select your Color</td>
    </tr>
            <div id='color' class='ui-slider-3'>
                <div class='ui-slider-handle'></div>
                <div class='ui-slider-handle' style="left: 205px;"></div>
            </div>
            
            <table style="font-size:9px">
                <tr align="center">
                    <td width="27px" style="color: #000000;">D</td><td width="27px" style="color: #000000;">E</td><td width="27px" style="color: #000000;">F</td><td width="27px" style="color: #000000;">G</td><td width="27px" style="color: #000000;">H</td><td width="27px" style="color: #000000;">I</td><td width="27px" style="color: #000000;">J</td>                                                        
                </tr>
            </table>
    <tr>
        <td align="left"><input type="hidden" value="0" id="colormin" class="w50px" onchange="modifyresult('colormin',this.value)"></td>
        <td align="right"><input type="hidden" value="6" id="colormax" class="w50px" onchange="modifyresult('colormax',this.value)"></td>
    </tr>
	
	<tr>
		<td colspan="2">Select Clarity</td>
	</tr>
    <tr>
        <td colspan="2">
            <table style="font-size:8px"><tr>
                <td style="width:24px;">FL</td>
                <td style="width:24px;">IF</td>
                <td style="width:24px;">VVS1</td>
                <td style="width:24px;">VVS2</td>
                <td style="width:24px;">VS1</td>
                <td style="width:24px;">VS2</td>
                <td style="width:24px;">SI1</td>
                <td style="width:24px;">SI2</td>
                <td style="width:24px;">SI3</td>
            </tr></table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div id='clarity' class='ui-slider-3'>
                <div class='ui-slider-handle'></div>
                <div class='ui-slider-handle' style="left: 205px;"></div>	
            </div>
        </td>
    </tr>
	
    <tr>
        <td colspan="2">Select Fancy color Diamonds</td>
    </tr>
    <tr>
        <td colspan="2">
            <table style="font-size:10px; width:100%" id="fancycolor">
                <tr >						   	  				
                    <td width="53px"><input style="vertical-align: super;" type="checkbox" name="fancy[]" value="yellow" <?php if(in_array("yellow", $fancycolor)) { echo "checked"; }?>>&nbsp;<img src="/images/yellow.png" title="Yellow" alt="yellow" height="25px"></td>
                    <td width="53px"><input style="vertical-align: super;" type="checkbox" name="fancy[]" value="pink" <?php if(in_array("pink", $fancycolor)) { echo "checked"; }?>>&nbsp;<img src="/images/pink.png" alt="pink" title="Pink" height="25px"></td>
                    <td width="53px"><input style="vertical-align: super;" type="checkbox" name="fancy[]" value="blue" <?php if(in_array("blue", $fancycolor)) { echo "checked";} ?>>&nbsp;<img src="/images/blue.png" alt="blue" title="Blue" height="25px"></td>                                                                                    
                </tr>
                <tr>						   	  				
                    <td width="53px"><input style="vertical-align: super;" type="checkbox" name="fancy[]" value="green" <?php if(in_array("green", $fancycolor)) { echo "checked";} ?>>&nbsp;<img src="/images/green.png" alt="green" title="Green" height="25px"></td>
                    <td width="53px"><input style="vertical-align: super;" type="checkbox" name="fancy[]" value="orange" <?php if(in_array("orange", $fancycolor)) { echo "checked";} ?>>&nbsp;<img src="/images/orange.png" alt="orange" title="Orange" height="25px"></td>
                    <td width="53px"><input style="vertical-align: super;" type="checkbox" name="fancy[]" value="brown" <?php if(in_array("brown", $fancycolor)) { echo "checked";} ?>>&nbsp;<img src="/images/brown.png" alt="brown" title="Brown" height="25px"></td>                                                                                    
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">Select Color Intensity</td>
    </tr>
    <tr>
        <td colspan="2">
            <table style="font-size:10px; width:100%" id="colorintensity">
                <tr >						   	  				
                    <td width="53px"><input type="checkbox" name="intensity[]" value="fancy" <?php if(in_array("fancy", $colorintensity)) { echo "checked";} ?>>&nbsp;Fancy</td>                                                                                                                                                                       
                    <td width="53px"><input type="checkbox" name="intensity[]" value="fancyintense" <?php if(in_array("fancyintense", $colorintensity)) { echo "checked";} ?>>&nbsp;Fancy Intense</td>                                                                                                                                                                       
                </tr>
                <tr >						   	  				
                    <td width="53px"><input type="checkbox" name="intensity[]" value="fancyvivid" <?php if(in_array("fancyvivid", $colorintensity)) { echo "checked";} ?>>&nbsp;Fancy Vivid</td>                                                                                                                                                                       
                    <td>&nbsp;</td>
                </tr>

            </table>
        </td>
    </tr>
	    
    <tr>
        <td align="left"><input type="hidden" value="0" id="claritymin" class="w50px" onchange="modifyresult('claritymin',this.value)"></td>
        <td align="right"><input type="hidden" value="8" id="claritymax" class="w50px" onchange="modifyresult('claritymax',this.value)"></td>
    </tr>
</table>
</div>

<!-- END SLIDERS -->

<!-- POPUP DETAIL DIAMOND -->

<div id="ds_details_tip12_cursor" style="position: absolute;display:none;"><img src="http://icejeweler.seowebdirect.com/images/cursor.png" alt="cursor" /></div>
<div id="ds_details_tip12" style="background-color: white; float: left; height: 200px; left:1204px;height: 426px;position: absolute;top: 756px;width: 160px;display:none;z-index:10000;">
    <div id="ds_details_content" class="ds_details_content">
        <div>
            <h5 class="ds_details_header" style="font-weight: bold;">DIAMOND DETAILS</h5>
            <div id="detail_sku" class="ds_detail_item"><span class="label">Stock Number: </span><br /><span class="value" id="dstkn">1333776403</span></div>
            <div id="detail_depth" class="ds_detail_item"><span class="label">Shape: </span><span class="value" id="dshape">Marquise</span></div>
            <div id="detail_table" class="ds_detail_item"><span class="label">Carat: </span><span class="value" id="dcarat">0.43</span></div>
            <div id="detail_girdle" class="ds_detail_item"><span class="label">Color: </span><span class="value" id="dcolor">M</span></div>
            <div id="detail_symmetry" class="ds_detail_item"><span class="label">Clarity: </span><span class="value" id="dslarity">I1</span></div>
            <div id="detail_polish" class="ds_detail_item"><span class="label">Price: </span><span class="value" id="dprice">$193</span></div>
            <div id="detail_culet" class="ds_detail_item"><span class="label">Ratio: </span><span class="value" id="dratio">1.66</span></div>
            <div id="detail_fluorescence" class="ds_detail_item"><span class="label">Cut: </span><span class="value" id="dcut">Good</span></div>
            <div id="detail_measurements" class="ds_detail_item"><span class="label">Culet: </span><span class="value OneLinkNoTx" id="dculet">53.4</span></div>
            <div id="detail_lxw" class="ds_detail_item"><span class="label">Cert: </span><span class="value OneLinkNoTx" id="dcert">Good</span></div>
        </div>
        <div id="detail_certlab" class="ds_detail_report_container">
            <span class="value" id="cert-file-not-available"></span>
        </div>
        <div class="ds_detail_button_container">
            <a id="detail_view_button" class="view_link floatLeft ds_sprite_icons sprite-but_sm_b_viewdetails" href="#" data-baseurl="/diamonds_details.jsp" data-sku="#"><span>View Details</span></a>
            <div class="cb"></div>
            <!--a id="detail_add_button" class="ajax-transition floatLeft ds_sprite_icons sprite-but_sm_g_addtoring" href="#" rel="ajax-transition" data-baseurl="#" data-action="add" data-sku="#"><span>Add to Ring</span></a>
            <div class="cb"></div>
            <a id="detail_compare_button" class="compare-button floatLeft ds_sprite_icons sprite-but_sm_g_addtocompare" href="javascript:;" data-sku="#" ><span>Add to Compare</span></a>
            <div class="cb"></div-->
        </div>        
        <div id="detail_certlab" class="ds_detail_report_container">
            <h5 id="ds_details_certification_header" class="ds_details_header">CERTIFICATION</h5>

            <span class="value" id="cert-file-not-available" style="display: none; "></span>
            <div class="cert_link">
                <a id="main-cert-selection" class="main-cert-selection ds_overlay_cert_link" href="#" data-sku="LD02499724" data-certnumber="1" data-buildertype="">View <span id="cert_lab_span"> GIA Report</span></a>
            </div>
        </div>
        <div class="ds_detail_shipping_container">
            <h5 id="detail_shipping_details_header" class="ds_details_header">SHIPPING DETAILS</h5>
            <div class="ds_detail_item" id="detail_shippingloose">
                <span class="label">Loose diamond: </span><span id="detail_shippingloose_value" class="value">Call</span>
            </div>
            <div class="ds_detail_item" id="detail_shippingjewelry"><span class="label">Set in jewelry: </span>
                <span id="detail_shippingjewelry_value" class="value">Call</span>
            </div>
            <div style="text-align:left;font-size:14px;"><? echo $this->config->item('site_owner_number')?></div>
        </div>
    </div>
</div>


<!-- END POPUP DETAIL DIAMOND -->

<!-- ADVANCED SEARCH -->
<div class="boxdiv w195px p10">
    <div>
        <div class="floatl"><h1> Advance Search</h1></div>
        <div class="floatr">
            <img src="<?php echo config_item('base_url')?>/images/tamal/expand.jpg" alt="expand" id="expand" onclick="showhide('advancesearch', 'true')">
            <img src="<?php echo config_item('base_url')?>/images/tamal/minimize.jpg" alt="minimize" id="minimize" style="display:none;" onclick="showhide('advancesearch', 'false')">
        </div>
        <div class="clear"></div>
        <div class="dbr"></div>
    </div>
    <table width="180" class="tilecontainer" style="display:none;" id="advancesearch">
        <tr>
            <td valign="top">
                <input type="checkbox" name="polish" id="polish" onclick="showhiderow('polish','polishrow', 'polis',0,4,9)" ><label for="polish">Polish</label> <br>
                <input type="checkbox" name="symmetry" id="symmetry" onclick="showhiderow('symmetry','symmetryrow','symmet',0,4,13)"  ><label for="symmetry">Symmetry</label> <br>
                <input type="checkbox" name="depthx" id="depthx" onclick="showhiderow('depthx','depthrow','depth',0,100,8)" ><label for="depthx">Depth</label> <br>

            </td>
            <td valign="top">
                <input type="checkbox" name="tablex" id="tablex" onclick="showhiderow('tablex','tablerow','table',0,100,10)" ><label for="tablex">Table</label> <br>
                <input type="checkbox" name="fluorescence" id="fluorescence" onclick="showhiderow('fluorescence','flurorow','fluro',0,5,11)"   ><label for="fluorescence">Fluorescence</label> <br>

            </td>
        </tr>

        <tr><td colspan="2"></td> </tr>


        <tr id="polishrow" style="display:none;">
            <td colspan="2">
                <table>
                    <tr>
                        <td colspan="2">Select Polish</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id='polis' class='ui-slider-2'>
                                <div class='ui-slider-handle'></div>
                                <div class='ui-slider-handle' style="left: 168px;"></div>	
                            </div>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="2">
                            <table style="font-size:8px;">
                                <tr align="center">
                                    <td width="42px">EX</td>
                                    <td width="42px">VG</td>
                                    <td width="42px">GD</td>
                                    <td width="42px">F</td>
                                </tr>
                                <tr align="center">
                                    <td width="42px" class="polisbrow">ID</td>
                                    <td width="42px" class="polisbrow">EX</td>
                                    <td width="42px" class="polisbrow">VG</td>
                                    <td width="42px" class="polisbrow">GD</td>

                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td align="left"><input type="hidden" maxlength="1" value="0" id="polismin" class="w50px" onchange="modifyresult('polismin',this.value)"></td>
                        <td align="right"><input type="hidden" maxlength="1" value="4" id="polismax" class="w50px" onchange="modifyresult('polismax',this.value)"></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr id="symmetryrow" style="display:none;">
            <td colspan="2">
                <table>
                    <tr>
                        <td colspan="2">Select Symmetry</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id='symmet' class='ui-slider-2'>
                                <div class='ui-slider-handle'></div>
                                <div class='ui-slider-handle' style="left: 168px;"></div>	
                            </div>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="2">
                            <table style="font-size:8px;">
                                <tr align="center">
                                    <td width="42px">EX</td>
                                    <td width="42px">VG</td>
                                    <td width="42px">GD</td>
                                    <td width="42px">F</td>									   	  				
                                </tr>
                                <tr align="center">
                                    <td width="42px" class="polisbrow">ID</td>
                                    <td width="42px" class="polisbrow">EX</td>
                                    <td width="42px" class="polisbrow">VG</td>
                                    <td width="42px" class="polisbrow">GD</td>									   	  				
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td align="left"><input type="hidden" maxlength="1" value="10" id="symmetmin" class="w50px" onchange="modifyresult('symmetmin',this.value)"></td>
                        <td align="right"><input type="hidden" maxlength="1" value="100" id="symmetmax" class="w50px" onchange="modifyresult('symmetmax',this.value)"></td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr id="depthrow" style="display:none;">
            <td colspan="2">
                <table>
                    <tr>
                        <td colspan="2">Select Depth</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id='depth' class='ui-slider-2'>
                                <div class='ui-slider-handle'></div>
                                <div class='ui-slider-handle' style="left: 168px;"></div>	
                            </div>
                        </td>
                    </tr>
                    <?  ?>
                    <tr>
                        <td align="left"><small>Min%</small><input type="text" value="<?=$depthmin?>" id="depthmin" class="w50px" onchange="modifyresult('depthmin',this.value)"> </td>
                        <td align="right"><small>Max%</small><input type="text" value="<?=$depthmax?>" id="depthmax" class="w50px" onchange="modifyresult('depthmax',this.value)"></td>
                    </tr>							   	   
                </table>
            </td>
        </tr>

        <tr id="tablerow" style="display:none;">
            <td colspan="2">
                <table>
                    <tr>
                        <td colspan="2">Select Table</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id='tablerange' class='ui-slider-2'>
                                <div class='ui-slider-handle'></div>
                                <div class='ui-slider-handle' style="left: 168px;"></div>	
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left"><small>Min%</small><input type="text" value="<?=$tablemin?>" id="tablemin" class="w50px" onchange="modifyresult('tablemin',this.value)"> </td>
                        <td align="right"><small>Max%</small><input type="text" value="<?=$tablemax?>" id="tablemax" class="w50px" onchange="modifyresult('tablemax',this.value)"></td>
                    </tr>							   	   
                </table>
            </td>
        </tr>


        <tr id="flurorow" style="display:none;">
            <td colspan="2">
                <table>
                    <tr>
                        <td colspan="2">Select Fluroscence</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id='fluro' class='ui-slider-2'>
                                <div class='ui-slider-handle'></div>
                                <div class='ui-slider-handle' style="left: 168px;"></div>	
                            </div>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="2">
                            <table style="font-size:8px;">
                                <tr align="left">
                                    <td width="30px">NO</td>
                                    <td width="30px">F Blue</td>
                                    <td width="30px">Med Blue</td>
                                    <td width="30px">Moderate</td>
                                    <td width="30px">ST Blue</td>
                                    <td width="30px">VST Blue</td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td align="left"><input type="hidden" value="0" id="fluromin" class="w50px" onchange="modifyresult('fluromin',this.value)"></td>
                        <td align="right"><input type="hidden" value="5" id="fluromax" class="w50px" onchange="modifyresult('fluromax',this.value)"></td>
                    </tr>
                </table>
            </td>
        </tr>



        <tr id="pricePerCaratrow" style="display:none;">
            <td colspan="2">
                <table>
                    <tr>
                        <td colspan="2">Select Price/Carat</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id='pricePerCaratRange' class='ui-slider-2'>
                                <div class='ui-slider-handle'></div>
                                <div class='ui-slider-handle' style="left: 168px;"></div>	
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left"><small>Min</small><input type="text" value="<?php echo $minpricepercrt ?>" id="pricePerCaratmin" class="w50px price" onchange="modifyresult('pricePerCaratmin',this.value)"> </td>
                        <td align="right"><small>Max</small><input type="text" value="<?php echo $maxpricepercrt ?>" id="pricePerCaratmax" class="w50px price" onchange="modifyresult('pricePerCaratmax',this.value)"></td>
                    </tr>
                </table>
            </td>
        </tr>


    </table>
</div>


</td>
<td valign="top">
    <table id="searchresult" style="display:none; " style="width:770px"></table>
</td>
</tr>



</table>
</div>