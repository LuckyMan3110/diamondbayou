<script type="text/javascript">
  $(document).ready(function() {
        //move he last list item before the first item. The purpose of this is if the user clicks to slide left he will be able to see the last item.
        $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
        
        
        //when user clicks the image for sliding right        
        $('#right_scroll img').click(function(){
        
            //get the width of the items ( i like making the jquery part dynamic, so if you change the width in the css you won't have o change it here too ) '
            var item_width = $('#carousel_ul li').outerWidth() + 10;
            
            //calculae the new left indent of the unordered list
            var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;
            
            //make the sliding effect using jquery's anumate function '
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
                
                //get the first list item and put it after the last list item (that's how the infinite effects is made) '
                $('#carousel_ul li:last').after($('#carousel_ul li:first')); 
                
                //and get the left indent to the default -210px
                $('#carousel_ul').css({'left' : '-210px'});
            }); 
        });
        
        //when user clicks the image for sliding left
        $('#left_scroll img').click(function(){
            
            var item_width = $('#carousel_ul li').outerWidth() + 10;
            
            /* same as for sliding right except that it's current left indent + the item width (for the sliding right it's - item_width) */
            var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;
            
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
            
            /* when sliding to left we are moving the last item before the first list item */            
            $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
            
            /* and again, when we make that change we are setting the left indent of our unordered list to the default -210px */
            $('#carousel_ul').css({'left' : '-210px'});
            });
            
            
        });
  });
</script>
<script>
	function intensSubmit(colr) {
		/*var intens = document.getElementById(id).value;
		var ot = document.getElementById(overtone).value;
		var rd_url = base_url+'diamonds/selectIntensityOptions/'+intens;
		
		window.location.href = rd_url;*/
		var intens = $('#cmb_intensity').val();
		var ot = $('#cmb_fcolorot').val();
		intens = ( intens != '' ? intens : false );
		ot 	   = ( ot != '' ? ot : false );
		
		var urllink = base_url+'diamonds/selectIntensityOptions/'+intens+'/'+ot+'/'+colr;
		//var colr_name = ( colr != '' ? '/'+colr : '' );
		
		$.ajax({
			 type: "POST",
			 url: urllink,
			 success: function(response) {
				//$("#vdiamonds_detail").html(response);
				//alert(response);
				window.location.href = base_url+response;
			},
			error: function(){alert('Error ');}
		 });
	}
</script>
<style type="text/css">
#carousel_inner {
	float:left; /* important for inline positioning */
	width:405px; /* important (this width = width of list item(including margin) * items shown */
	overflow: hidden;  /* important (hide the items outside the div) *//* non-important styling bellow */
}
#carousel_ul {
	position:relative;
	left:28px; /* important (this should be negative number of list items width(including margin) */
	list-style-type: none; /* removing the default styling for unordered list items */
	margin: 0px;
	padding: 0px;
	width:9999px; /* important */
	/* non-important styling bellow */
	padding-bottom:10px;
}
#carousel_ul li {
	float: left;
	height: 65px;
	margin: 5px 46px 10px -18px;
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
.ui_slider3 { width:370px !important;}
.ui_slider4 { width:425px !important;}
.ui_slider5 { width:370px !important;}
.setcut_slider{float:left !important; margin-left:10px;}
.maxCt {
  float: right; margin-right: 10px;
  width: 25px;
}
.carat_max, .priceRange {
  background: #191B1A;
  border: 1px solid #fff;
  width: 50px;
  text-align: center;
  padding: 3px 2px;
  font-size: 12px;  border-radius: 0px;
  color: white;
}
.clrTb{color:#fff !important;font-size: 12px;  width: auto; border-spacing: 18px; margin: -12px 0px 0px -16px;}
.optionList{  width: 395px;}
#CutLabels{  font-size: 12px; margin-left: -34px; border-spacing: 13px; margin-top: -8px;}
<?php
if(strcmp('toearring', $addoption) === 0) {
	echo '.cols_box:nth-of-type(2):after{content: url("'.config_item('base_url').'img/page_img/side_sticon.png"); width:75px; height:35px;position: absolute;right: 32px;top: 5px;}';
}
$tothre_stone = array('tothreestone', 'tothree_stone');

if(in_array($addoption, $tothre_stone)) {
	echo '.cols_box:nth-of-type(4):after{content: url("'.config_item('base_url').'img/page_img/engage_ring.jpg"); width:39px; height:39px;position: absolute;right: 3px;top: 0px;}';
}
?>
</style>
    
<? if($this->uri->segment(2) == 'search') : ?>


<style>
#con {
    margin: 28px 0 0 -86px!important;
}
</style>

<? endif; ?>

<script type="text/javascript">
$.ajax({
		type	:	'POST',
		url	:	'<?php echo config_item('base_url')?>index.php/diamonds/get_fancy/'+id,	
		success: function(html){
$('#bDiv').html(html);	
			
				}
		});
</script>


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
    padding-left: 42px;
}
.ui-slider .ui-slider-handle {
    margin: 3px 0 0 -1px!important;

}
.ui-slider {
    height: 31px!important;

}

.ui-slider-handle {
    /*background-image: url("<?php echo config_item('base_url')?>images/right-dir-arow.png")!important;*/
}
.ui-slider a + a .ui-slider-handle {
    /*background-image: url("<?php echo config_item('base_url')?>images/left-dir-arow.png")!important;*/
    height: 26px;
}
.flexigrid{
    width:794px!important;
}

.right-add-p{
     padding-bottom:70px;
}
.searchBox .leftBox{ padding:20px 65px 20px 5px;}
.rightBox{width: 17% !important;min-height: 672px;}
.compare_section{border-bottom:0px;margin-right: -66px;}
.dlHead {
padding-left: 12px;
}
.setdropdown{}
.slideSection1{padding:0px !important; width:auto !important;}
.slideSection1 select{}
</style>

<?php 

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
<div id="main-body-a">
<div class="searchBox">
	<div class="dmList">
    	<div class="breadCrumList">
        	<ul>
            	<li><a href="">Home</a></li>
                <li><a href="">Fancy Colored Diamonds</a></li>
            </ul>
        </div>
        <div class="lastLink"><a href="">Looking for Colorless Diamonds?</a></div>
        <div class="clear"></div>
        <div class="fancycList">
        	<ul>
            <?php echo $viewfancy_colrs; ?>
        	</ul>
            <div class="clear"></div>
        </div>
    	<div class="clear"></div>
    </div>
    <div class="dmList">
    <ul id="shape">
    <?php
		if($check_triplex === 'NA' || $check_triplex > 0) {
	?>
    <li><a href="<?php echo config_item('base_url')?>diamonds/search/true/SG"><img src="<?php echo config_item('base_url')?>img/page_img/sgnatur.png" alt=""></a></li>
       <?php
		}
	   		if( !empty($vfancy_shlist) ) {
				echo $vfancy_shlist;
				
			} else {
	   ?>
        <!--<li><a href="<?php echo config_item('base_url')?>diamonds/search/true/SG"><img src="<?php echo config_item('base_url')?>img/page_img/sgnatur.png" alt=""></a></li>-->
        <li>
        <span data-shapeid="RD" id="RD_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_RD_OFF">
        <img src="<?php echo SHAPES_PATH?>round.jpg" alt="" /><br>
        <span class="shview_title">Round</span>
        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/cushion.jpg" id="RD">
        </span>
        </li>
        <li>
        <span data-shapeid="CU" id="CU_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_CU_OFF">
        <img src="<?php echo SHAPES_PATH?>cushion.jpg" alt="" /><br>
        <span class="shview_title">Cushion</span>
        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/cushion.jpg" id="CU">
        </span>
        </li>
        <li>
        <span data-shapeid="PR" id="PR_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_PR_OFF">
        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/princess.jpg" id="PR">
        <img src="<?php echo SHAPES_PATH?>princess.jpg" alt="" /><br>
        <span class="shview_title">Princess</span>
        </span></li>
        <li>
        <span data-shapeid="AS" id="AS_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_AS_OFF">
        <img src="<?php echo SHAPES_PATH?>asscher.jpg" alt="" /><br>
        <span class="shview_title">Ascher</span>
        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/asscher.jpg" id="AS">
        </span>
        </li>
        <li>
        <span data-shapeid="EC" id="EC_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_EC_OFF">
        <img src="<?php echo SHAPES_PATH?>emerald.jpg" alt="" /><br>
        <span class="shview_title">Emerald</span>
        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/emerald.jpg" id="EC">
        </span>
        </li>
        <li>
        <span data-shapeid="RA" id="RA_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_RA_OFF">
        <img src="<?php echo SHAPES_PATH?>radiant.jpg" alt="" /><br>
        <span class="shview_title">Radiant</span>
        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/radiant.jpg" id="RA">
    </span>
        </li>
        <li>
        <span data-shapeid="OV" id="OV_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_OV_OFF">
        <img src="<?php echo SHAPES_PATH?>oval.jpg" alt="" /><br>
        <span class="shview_title">Oval</span>
            <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/oval.jpg" id="OV">
        </span>
        </li>
        <li>
        <span data-shapeid="PS" id="PS_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_PS_OFF">
        <img src="<?php echo SHAPES_PATH?>pear.jpg" alt="" /><br>
        <span class="shview_title">Pear</span>
        <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/pear.jpg" id="PS">
        </span>
        </li>
        <li>
        <span data-shapeid="MQ" id="MQ_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_MQ_OFF">
                <img src="<?php echo SHAPES_PATH?>marquise.jpg" alt="" /><br>
        		<span class="shview_title">Marquise</span>
                <input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/marquise.jpg" id="MQ">
            </span>
        </li>
        <li><img src="<?php echo SHAPES_PATH?>heart.jpg" alt="" /><br>
        <span class="shview_title">Heart</span>
        </li>
        <?php } ?>
    </ul>
    <div class="clear"></div>
    </div>
    <div class="textlable-cols">
        <div class="signat-bk lbk2">
        <input type="checkbox" id="signat_seting" name="signat_seting" value="Y">
        &nbsp;&nbsp; <span class="">Loose Diamonds</span> 
        </div>
        <div class="signat-bk lbk2">
        <input type="checkbox" id="signat_seting" name="signat_seting" value="Y">
        &nbsp;&nbsp; <span class="">Pairs</span> 
        </div>
        <div class="slideSection1 setdropdown">
        	Intensity : &nbsp;&nbsp;<select name="cmb_intensity" id="cmb_intensity" onchange="intensSubmit('')" class="ddbox-st">
                 <?php echo $listFancyColorIntens; ?>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;
                Overtone: &nbsp;&nbsp;<select name="cmb_fcolorot" id="cmb_fcolorot" onchange="intensSubmit('')" class="ddbox-st">
                  <?php echo $listFancyColorOT; ?>
                </select>
        </div>
        <div class="clear"></div>
    </div>
     <div class="clear"></div>
       <div class="slider_block">
    	<div class="slider_left">
        	<div class="slider_bkview">
            <label>color :</label>
            <div id='carousel_container'>
          <div id='carousel_inner'>
            <ul id='carousel_ul'>
              <li>
                <div id='color' class='ui-slider-3 ui_slider2'>
                  <div class='ui-slider-handle'></div>
                  <div class='ui-slider-handle' style="left: 350px;"></div>
                </div>
                <table>
                  <tr>
                    <td colspan="2"><table style="font-size:12px">
                        <tr align="center" style="position: absolute; border-spacing: 4px; margin: -7px 0px 0px -32px;">
                          <td width="54px">D</td>
                          <td width="54px">E</td>
                          <td width="54px">F</td>
                          <td width="54px">G</td>
                          <td width="54px">H</td>
                          <td width="54px">I</td>
                          <td width="54px">J</td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td align="left"><input type="hidden" value="0" id="colormin" class="w50px" onchange="modifyresult('colormin',this.value)"></td>
                    <td align="right"><input type="hidden" value="6" id="colormax" class="w50px" onchange="modifyresult('colormax',this.value)"></td>
                  </tr>
                </table>
              </li>
              <li> </li>
            </ul>
          </div>
        </div>
        	</div>
            <div class="clear"></div>
            <div class="slider_bkview">
            <label>Clarity :</label>
            	<div class="col-md-3 setcut_slider">
          <div id='clarity' class='ui-slider-3 ui_slider3'>
            <div class='ui-slider-handle'></div>
            <div class='ui-slider-handle' style="left: 347px;"></div>
          </div>
          <table class="clrTb">
            <tr>
              <td style="width:24px;">FL</td>
              <td style="width:24px;">IF</td>
              <td style="width:24px;">VVS1</td>
              <td style="width:24px;">VVS2</td>
              <td style="width:24px;">VS1</td>
              <td style="width:24px;">VS2</td>
              <td style="width:24px;">SI1</td>
              <td style="width:24px;">SI2</td>
              <td style="width:24px;">SI3</td>
            </tr>
            <tr>
              <td align="left"><input type="hidden" value="0" id="claritymin" class="w50px" onchange="modifyresult('claritymin',this.value)"></td>
              <td align="right"><input type="hidden" value="8" id="claritymax" class="w50px" onchange="modifyresult('claritymax',this.value)"></td>
            </tr>
          </table>
        </div>
      		</div>
            <div class="clear"></div><br><br><br>
            <div class="slider_bkview">
            <label>Cut :</label>
            	<div class="col-md-3 setcut_slider">
          <div id='cut' class='ui-slider-2 ui_slider5'>
                <div class='ui-slider-handle'></div>
                <div class='ui-slider-handle' style="left: 350px;"></div>	
            </div>
          <table id="CutLabels">
                <tr align="center">						   	  				
                    <td width="90px">Good</td>
                    <td width="90px">Very Good</td>
                    <td width="90px">Ideal</td>
                    <td width="90px">Excellent</td>
                </tr>
            </table>
        </div>
      		</div>
        </div>
        <div class="slider_right">
        <div class="slider_bkview">
        	<label>Price:</label>
        	<div class="col-md-3">
          <div id='pricerange' class="ui-slider-2 ui_slider4">
            <div class='ui-slider-handle'></div>
            <div class='ui-slider-handle' style="left: 400px;"></div>
          </div>
          <table class="optionList">
            <tr>
              <td colspan="2"><div class="minPr"><!--<small>Min</small>-->
                  <input type="text" value="<?php echo $dbminprice; ?>" id="pricerange1" name="pricerange1" class="priceRange" readonly="readonly" onchange="modifyresult('searchminprice',this.value)" />
                </div>
                <div class="maxCt"><!--<small>Max</small>-->
                  <input type="text" value="<?php echo $dbmaxprice; ?>" id="pricerange2" readonly="readonly" class="priceRange" name="pricerange2" onchange="modifyresult('searchmaxprice',this.value)" />
                </div></td>
            </tr>
          </table>
        </div>
      	</div>
        <div class="clear"></div><br>
        <div class="slider_bkview">
        <label>Carat:</label>
        <div class="col-md-3">
          <div id='carat' class='ui-slider-2 ui_slider1'>
            <div class='ui-slider-handle'></div>
            <div class='ui-slider-handle' style="left: 400px;"></div>
          </div>
          <table class="optionList">
            <tr>
              <td colspan="2"><!--<small>Min</small>-->
                
                <div class="minPr">
                  <input type="text" value="0" id="caratmin" class="carat_max" onchange="modifyresult('caratmin',this.value)" readonly="readonly" />
                </div>
                
                <!--<small style="margin: 0px 0px 0px 45px;">Max</small>-->
                
                <div class="maxCt">
                  <input type="text" value="9.99" id="caratmax" class="carat_max" readonly="readonly" onchange="modifyresult('caratmax',this.value)">
                </div>
                <div class="clear"></div></td>
            </tr>
          </table>
        </div>
        <div class="clear"></div>
      </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div><br>
    <div class="viewadvance_options">
      <div id="advancesearch">
        <div id="polishrow" style="display:none;">
          <div class="col-md-3 padding-2">
            <table>
              <tr>
                <td colspan="2"><span class="glyphicon glyphicon-play ply-icn">POLISH</span></td>
              </tr>
              <tr>
                <td colspan="2"><div id='polis' class='ui-slidern'>
                    <div class='ui-slider-handle'></div>
                    <div class='ui-slider-handle' style="left: 157px;"></div>
                  </div></td>
              </tr>
              <tr>
                <td colspan="2"><table style="font-size:8px;">
                    <tr align="center">
                      <td width="42px">ID/EX</td>
                      <td width="42px">VG</td>
                      <td width="42px">GD</td>
                      <td width="42px">F</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td align="left"><input type="hidden" maxlength="1" value="0" id="polismin" class="w50px" onchange="modifyresult('polismin',this.value)"></td>
                <td align="right"><input type="hidden" maxlength="1" value="4" id="polismax" class="w50px" onchange="modifyresult('polismax',this.value)"></td>
              </tr>
            </table>
          </div>
        </div>
        <div id="symmetryrow" style="display:none;">
          <div class="col-md-3 padding-2">
            <table>
              <tr>
                <td colspan="2"><span class="glyphicon glyphicon-play ply-icn">SYMMETRY</span></td>
              </tr>
              <tr>
                <td colspan="2"><div id='symmet' class='ui-slidern'>
                    <div class='ui-slider-handle'></div>
                    <div class='ui-slider-handle' style="left: 162px;"></div>
                  </div></td>
              </tr>
              <tr>
                <td colspan="2"><table style="font-size:8px;">
                    <tr align="center">
                      <td width="42px">ID/EX</td>
                      <td width="42px">VG</td>
                      <td width="42px">GD</td>
                      <td width="42px">F</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td align="left"><input type="hidden" maxlength="1" value="10" id="symmetmin" class="w50px" onchange="modifyresult('symmetmin',this.value)"></td>
                <td align="right"><input type="hidden" maxlength="1" value="100" id="symmetmax" class="w50px" onchange="modifyresult('symmetmax',this.value)"></td>
              </tr>
            </table>
          </div>
        </div>
        <div id="depthrow" style="display:none;">
          <div class="col-md-3 padding-2">
            <table>
              <tr>
                <td colspan="2"><span class="glyphicon glyphicon-play ply-icn">DEPTH</span></td>
              </tr>
              <tr>
                <td colspan="2"><div id='depth' class='ui-slidern'>
                    <div class='ui-slider-handle'></div>
                    <div class='ui-slider-handle' style="left: 157px;"></div>
                  </div></td>
              </tr>
              <?  ?>
              <tr>
                <td align="left"><small>Min%</small>
                  <input type="text" value="<?=$depthmin?>" id="depthmin" class="w50px" onchange="modifyresult('depthmin',this.value)"></td>
                <td align="right"><small>Max%</small>
                  <input type="text" value="<?=$depthmax?>" id="depthmax" class="w50px" onchange="modifyresult('depthmax',this.value)"></td>
              </tr>
            </table>
          </div>
        </div>
        <div id="tablerow" style="display:none;">
          <div class="col-md-3 padding-2">
            <table>
              <tr>
                <td colspan="2"><span class="glyphicon glyphicon-play ply-icn">TABLE</span></td>
              </tr>
              <tr>
                <td colspan="2"><div id='tablerange' class='ui-slidern'>
                    <div class='ui-slider-handle'></div>
                    <div class='ui-slider-handle' style="left: 157px;"></div>
                  </div></td>
              </tr>
              <tr>
                <td align="left"><small>Min%</small>
                  <input type="text" value="<?=$tablemin?>" id="tablemin" class="w50px" onchange="modifyresult('tablemin',this.value)"></td>
                <td align="right"><small>Max%</small>
                  <input type="text" value="<?=$tablemax?>" id="tablemax" class="w50px" onchange="modifyresult('tablemax',this.value)"></td>
              </tr>
            </table>
          </div>
        </div>
        <div id="flurorow" style="display:none;">
          <div class="col-md-3 padding-2">
            <table>
              <tr>
                <td colspan="2"><span class="glyphicon glyphicon-play ply-icn">FLOUORESCENCE</span></td>
              </tr>
              <tr>
                <td colspan="2"><div id='fluro' class='ui-slidern'>
                    <div class='ui-slider-handle'></div>
                    <div class='ui-slider-handle' style="left: 157px;"></div>
                  </div></td>
              </tr>
              <tr>
                <td colspan="2"><table style="font-size:8px;">
                    <tr align="left">
                      <td width="30px">None</td>
                      <td width="30px">Faint<br>
                        Slight</td>
                      <td width="30px">Medium<br>
                        Moderate</td>
                      <td width="30px">Strong</td>
                      <td width="30px">Very Strong</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td align="left"><input type="hidden" value="0" id="fluromin" class="w50px" onchange="modifyresult('fluromin',this.value)"></td>
                <td align="right"><input type="hidden" value="5" id="fluromax" class="w50px" onchange="modifyresult('fluromax',this.value)"></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clear"></div>
      <div class="row bg advancedOptions" style="padding: 10px; display:none;">
        <div style="float: left; margin: 0px;">
          <div class="chksty"> <span>
            <input type="checkbox" name="polish" id="polish" onclick="showhiderow('polish','polishrow', 'polis',0,4,8)" >
            <label for="polish">Polish</label>
            </span> <span>
            <input type="checkbox" name="symmetry" id="symmetry" onclick="showhiderow('symmetry','symmetryrow','symmet',0,4,9)"  >
            <label for="symmetry">Symmetry</label>
            </span> <br>
          </div>
          <div class="chksty"> <span>
            <input type="checkbox" name="depthx" id="depthx" onclick="showhiderow('depthx','depthrow','depth',0,100,13)" >
            <label for="depthx">Depth</label>
            </span> <span>
            <input type="checkbox" name="tablex" id="tablex" onclick="showhiderow('tablex','tablerow','table',0,100,14)" >
            <label for="tablex">Table</label>
            </span> <br>
          </div>
          <div class="chksty"> <span>
            <input type="checkbox" name="fluorescence" id="fluorescence" onclick="showhiderow('fluorescence','flurorow','fluro',0,4,15)"   >
            <label for="fluorescence">Fluorescence</label>
            </span> <br>
          </div>
        </div>
        <a href="" onclick="clearsessions()"><span class="cler_filter">Clear Filter</span></a> </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="adOption"><a href="#javascript;" id="viewAvanceOption" onclick="showhide('advancesearch', 'true')">View Advanced Options</a>
    <!--<a href="#javascript;" onclick="showhide('advancesearch', 'false')">Hide Advanced Options</a>-->
    </div>
</div>
	<div class="clear"></div>
    <div class="searchBox">
    <div class="leftBox">
    <div class="dlHead">AGS and GIA Graded Diamond</div>
    <br />
    <!--Table Area Start-->
    <form name="diamondList" id="diamondList" method="post" action="<?php echo config_item('base_url')?>diamonds/listComparedDimaond">
    <div class="col-md-11 col-mdmy">
    <td valign="top">
        <table id="searchresult" style="display:none; width:735px"></table>
    </td>
    </div>
    </form>
    <!--Table Area END-->
    <div class="clear"></div><br><br>
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
                    <th width="7%"><a href="">Type</a></th>
                    <th width="10%"><a href="">Shape</a></th>
                    <th width="8%"><a href="">Carat</a></th>
                    <th width="8%"><a href="">Color</a></th>
                    <th width="9%"><a href="">Clarity</a></th>
                    <th width="7%"><a href="">Lab</a></th>
                    <th width="10%"><a href="">Cut</a></th>
                    <th width="11%"><a href="">Price</a></th>
                    <th width="11%"><a href="">Wire</a></th>
                    <th width="9%"><a href="">Details</a></th>
              </tr>
			</thead>
              <tbody>
                  <tr>
                    <td colspan="11">
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
    <div class="rightBox">
    <div id="vdiamond_detail" class="fancycolorBk"> 
        <!--<div class="view_pdetail">Plz Click On Detail To View From Left</div>-->
        <div id="sorting_box">
        	<?php echo defaultView(); ?>
        </div>
      </div>
      <div class="clear"></div>
      <div id="defaults_button" style="display:none;">
      <?php echo defaultView(); ?>
        <div class="clear"></div>
      </div>
    <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <?php echo $signup_form; ?>
      <div class="clear"></div>
<div style="margin:0 auto;width:970px;background:#F0FBFF;">

<div class="clearfix"></div>

</div>

</div>
<!--Main Container Column 1 END-->

<!--Main Container Column 2 Start-->

<!--Main Container Column 2 Start-->

<!-- POPUP DETAIL DIAMOND -->
<!--
<div id="ds_details_tip12_cursor" style="position: absolute;display:none;left: 302 px;top: 612 px;"><img src="http://icejeweler.seowebdirect.com/images/cursor.png" /></div> -->
<div id="ds_details_tip12" style="display:none;z-index:10000;float:left;left: 302 px;height: 426px;position: absolute;top: 212 px;">
    <div id="ds_details_content" class="ds_details_content">
        <div>
            <h5 class="ds_details_header" style="font-weight: bold;">DIAMOND DETAILS</h5>
            <div id="detail_sku" class="ds_detail_item"><span class="label">Stock Number: </span><br /><span class="value" id="dstkn">1333776403</span></div>
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
                <a id="main-cert-selection" class="main-cert-selection ds_overlay_cert_link" href="#" data-sku="LD02499724" data-certnumber="1" data-buildertype="">View Report <!-- <span id="cert_lab_span"> --> GIA Report</span></a>
            </div>
        </div>
        <div class="ds_detail_shipping_container">
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


<div class="clear"></div>
