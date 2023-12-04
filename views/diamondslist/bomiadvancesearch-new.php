<!--<link href="<?php echo SITE_URL; ?>css/loose-diamond-search-skinny.css" type="text/css" rel="stylesheet" />-->
<link href="<?php echo SITE_URL; ?>css/diamond_search_style.css" type="text/css" rel="stylesheet" />

<style type="text/css">
<?php
if(strcmp('toearring', $addoption) === 0) {
	echo '.cols_box:nth-of-type(2):after{content: url("'.SITE_URL.'img/page_img/side_sticon.png"); width:75px; height:35px;position: absolute;right: 32px;top: 5px;}';
}
$tothre_stone = array('tothreestone', 'tothree_stone');

if(in_array($addoption, $tothre_stone)) {
	echo '.cols_box:nth-of-type(4):after{content: url("'.SITE_URL.'img/page_img/engage_ring.jpg"); width:39px; height:39px;position: absolute;right: 3px;top: 0px;}';
}
$contacts_info = get_site_title('contact_info');
?>

</style>
<?php if($this->uri->segment(2) == 'search') : ?>
<style>
#con {
	margin: 28px 0 0 -86px!important;
}
</style>
<?php endif; ?>

<script>        
    function checkPriceValue(fieldid) {
        var val = document.getElementById(fieldid).value;
        /*if(checknum) {
            document.getElementById(fieldid).innerHTML = val;
        } else {
            document.getElementById(fieldid).innerHTML = 0;
        }*/
    }
function isPositiveInteger(s)
{
    var i = +s; // convert to a number
    if (i < 0) return false; // make sure it's positive
    if (i != ~~i) return false; // make sure there's no decimal part
    return true;
}

$(document).ready(function () {

var seconds = 3000; // time in milliseconds
//var reload = function() {
//   $.ajax({
//      url: base_url+'diamonds/getDiamondCount',
//      cache: false,
//      success: function(data) {
//          $('#show_diamond, .diamdcount').html(data+' Diamonds');
//          if(data == 0) {
//              seconds = 500;
//              setsession('shape', '');
//              setsession('fluro_mins', '0');
//              setsession('fluro_maxs', '4');
//              setsession('polismin_mins', '0');
//              setsession('polismax_maxs', '4');
//              setsession('symmet_mins', '0');
//              setsession('symmet_maxs', '4');
//              //window.location = base_url+'diamonds/search/true';
//              //couplesearchdiamonds();
//          }
//          setTimeout(function() {
//             reload();
//          }, seconds);
//      }
//   });
//   
//    set_input_fields_value('depth_minx', 'depth_maxs');
//    set_input_fields_value('table_mins', 'table_maxs');
// };
// reload();
 
 $('#diamondList').submit(function() {
       return false;
 });
 
 $("[name='my-checkbox']").bootstrapSwitch();
 
 setTimeout(get_diamond_shape, 4000);
 
});
</script>
<style>
   #searchresult tr:hover #ds_details_tip12{display: none !important;}
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
            <ul class="bread_crumb_list">
                <li><a href="<?php echo SITE_URL; ?>wholesale">Home</a></li> >
                <li><a href="#">Diamond</a></li>
            </ul>
        </div>
<div>
	<?php //echo $pendan_stepsbar; ?>
<div class="mainwrap">
        <div class="inner_container">
            <div class="shapes_section diamond-shape">
            <ul class="diamond_shapes">
                <?php
                    
                    $shapes_list = array(
                        'B'=>array('one','round', 'round_sic', 'round_sh'),
                        'PR'=>array('two','princess', 'princes_sic', 'princess_sh'),
                        'C'=>array('ten','cushion', 'cushion_sic', 'cushion_sh'),
                        'R'=>array('seven','radiant', 'radiant_sic', 'radiant_sh'),
                        'E'=>array('three','emerald', 'emearld_sic', 'emerald_sh'),
                        'P'=>array('eight','pear', 'pear_sic', 'pear_sh'),
                        'O'=>array('six','oval', 'oval_sic', 'oval_sh'),
                        'AS'=>array('four','asscher', 'asscher_sic', 'asscher_sh'),
                        'M'=>array('five','marquise', 'marquise_sic', 'marquise_sh'),
                        'H'=>array('nine','heart', 'heart_sic', 'heart_sh')
                        );
                    
                    $ahpeview = '';
                    $i = 1;
                    foreach( $shapes_list as $shkey => $keyvalue) {
                        $diamond_shape = view_shape_value($shapeimg, $shkey);
                        $imgeOverIcon = str_replace('_sic', '_sic_ov', $keyvalue[2]);
                        $active_class = ( $i == 1 ? 'class=""' : '' );
                        
                        $ahpeview .= '<li id="'.$shkey.'" '.$active_class.' onclick="setDiamdShape(\''.$shkey.'\', \''.$keyvalue[2].'.jpg\', \''.$imgeOverIcon.'.jpg\')">
                                        <div><a href="#javascript"><img src="'.SITE_URL.'img/david_home/'.$keyvalue[3].'.jpg" alt="'.$diamond_shape.'" /></a></div>
                                        <div><a href="#javascript">'.$diamond_shape.'</a></div>                    
                                    </li>';
                        $i++;
                    }
                    
                    echo $ahpeview;
                    
                ?>
            </ul>
        </div>
            <div class="sliderFilters row-fluid">
                <div class="filterCols col-sm-4">
                    <div class="pull-left"><label>Shape</label><img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt="quest_mark"></div>
                    <div class="pull-right" id="view_diamond_shape"><?php echo $diamonds_shape; ?> Shape Diamond</div>
                    <div class="clear"></div>
                    <div class="smalShapes">
                       <ul id="shape"> 
                        <?php
                        
                        $smallShape = array('B' => 'round_sic.jpg',
                                                'PR' => 'princes_sic.jpg',
                                                'C' => 'cushion_sic.jpg',
                                                'R' => 'radiant_sic.jpg',
                                                'E' => 'emearld_sic.jpg',
                                                'P' => 'pear_sic.jpg',
                                                'O' => 'oval_sic.jpg',
                                                'AS' => 'asscher_sic.jpg',
                                                'M' => 'marquise_sic.jpg',
                                                'H' => 'heart_sic.jpg'
                                                );
                        $smalShapeList = '';
                        foreach($smallShape as $sshap => $shimage) 
                            {
                            $imgOverIcon = str_replace('_sic', '_sic_ov', $shimage);
                            if( $shape_value === $sshap ) {
                               $setShapeImage = $imgOverIcon;
                               $active_class = 'class="'.str_replace('.jpg', '', $shimage).'"';
                            } else {
                                $setShapeImage = $shimage;
                                $active_class = '';
                            }
                            
                            $smalShapeList .= '<li id="'.$sshap.'" '.$active_class.'><a class="'.$keyvalue[0].'" href="#javascript;" onclick="setDiamdShape(\''.$sshap.'\', \''.$shimage.'\', \''.$imgOverIcon.'\')" title="'.view_shape_value($dmShape, $sshap).'"><img src="'.UNITED_IMGSV.$setShapeImage.'" alt="setShapeImage" /></a></li>';
                        }
                           echo $smalShapeList; 
                        ?>
                           </ul>
                    </div>
                    <div class="setlabelst"><label>Cut</label> <img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt="quest_mark"></div>
                       <div class="setSliderBlock">
                            <table id="CutLabels">
                                  <tr>						   	  				
                                      <td>Good</td>
                                      <td>Very Good</td>
                                      <td>Excellent</td>
                                      <td>Signature <br>Ideal</td>
                                  </tr>
                              </table>
                          </div>
                    <ul class="cutslider_lines">
                        <li style="margin-right: 49px"></li>
                        <li></li>
                        <li></li>
                    </ul>
                       <div id="cutv_slider"></div>
                </div>
                <div class="filterCols col-sm-4">
                    <div class="sliderSetRow">
                    <div><label>Price</label> <img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt="quest_mark"></div>
                    <table class="optionList">
                        <tr>
                          <td colspan="2"><div class="minPr"><!--<small>Min</small>-->
                            <input type="text" value="$<?php echo $price_start; ?>"  id="searchminprice" name="pricerange1" class="priceRange"/>
                            </div>
                            <div class="maxCt max_price_cols"><!--<small>Max</small>-->
                              <input type="text" value="$<?php echo $price_end; ?>"  id="searchmaxprice" class="priceRange" name="pricerange2" />
                            </div></td>
                        </tr>
                      </table>
                    <div id="pricesv_slder"></div>
                    </div> <br>
                    <div class="sliderSetRow">
                    <label>Color</label> <img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt="">
                    <div>
<!--                        <table class="setColrTable">
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
                        </table>-->
                        <div class="color_set_list">
                            <ul>
                                <li>L</li>
                                <li>K</li>
                                <li>J</li>
                                <li>I</li>
                                <li>H</li>
                                <li>G</li>
                                <li>F</li>
                                <li>E</li>
                                <li>D</li>
                            </ul>
                        </div>
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
                    <div id="colrs_slider"></div>
                    </div>
                </div>
                <div class="filterCols col-sm-4">
                    <div class="sliderSetRow">
                    <div><label>Carat</label> <img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt=""></div>
                    <div>
                        <table class="optionList">
                        <tr>
                          <td colspan="2"><!--<small>Min</small>-->

                            <div class="minPr">
                            <?php
                            echo '<input type="text" value="0.07" name="caratmin" id="caratmin" class="carat_max" />';
                            ?>                              
                            </div>

                            <div class="maxCt">
                                <?php
                                echo '<input type="text" value="15" name="caratmax" id="caratmax" class="carat_max" />';
                                ?>
                            </div>
                            <div class="clear"></div></td>
                        </tr>
                      </table>
                        </div>
                    <div id="carat_vslider"></div>
                    </div><br>
                    <div class="sliderSetRow">
                    <div><label>Clarity</label> <img src="<?php echo UNITED_IMGSV; ?>quest_mark.jpg" alt=""></div>
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
                    <div id="sliders"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="filter_blocs">
                <div class="clear"></div><br>
                <div  id="advanced_search">
                    <div class="viewadvance_options">
      <div id="advancesearch">
          <div id="polishrow" class="filterCols col-sm-4 set_filter_margin" style="display:none;">
          <div>
            <table>
              <tr>
                <td colspan="2">
                    <span class="advance_filter_lable">Polish</span>
                    <div class="toggle_box_bk">
                        <div class="toggle btn btn-default off polish_slider" onclick="show_on_off('polish_slider'); remove_slider_bgclass('polish_slider'); show_diamond_cols('8')" data-toggle="toggle" style="width: 58px; height: 24px !important;">
                            <div class="toggle btn btn-danger" data-toggle="toggle" style="width: 58px; height: 24px !important;">
                                <input type="checkbox" checked="" onclick="showhiderow('polish','polishrow', 'polis',0,4,8)" data-toggle="toggle" data-width="40" data-height="20px" data-onstyle="danger"><div class="toggle-group">
                                    <label class="btn btn-danger toggle-on">On</label><label class="btn btn-default active toggle-off">Off</label>
                                    <span class="toggle-handle btn btn-default"></span></div></div><div class="toggle-group">
                                        <label class="btn btn-danger toggle-on">On</label><label class="btn btn-default active toggle-off">Off</label>
                                        <span class="toggle-handle btn btn-default"></span></div>
                        </div>
                        <div class="toggle btn btn-danger polish_slider" onclick="show_on_off('polish_slider');  add_slider_bgclass('polish_slider'); hide_diamond_cols('polis',0,4,'hide')" data-toggle="toggle" style="width: 58px; height: 24px !important; display: none;">
                            <div class="toggle btn btn-danger" data-toggle="toggle" style="width: 58px; height: 24px !important;">
                                <input type="checkbox" checked="" data-toggle="toggle" onclick="showhiderow('polish','polishrow', 'polis',0,4,8)" data-width="40" data-height="20px" data-onstyle="danger"><div class="toggle-group">
                                    <label class="btn btn-danger toggle-on">On</label><label class="btn btn-default active toggle-off">Off</label>
                                    <span class="toggle-handle btn btn-default"></span></div></div><div class="toggle-group">
                                        <label class="btn btn-danger toggle-on">On</label><label class="btn btn-default active toggle-off">Off</label>
                                        <span class="toggle-handle btn btn-default"></span></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </td>
              </tr>              
              <tr>
                <td colspan="2"><table class="setValueTable">
                    <tr align="center">
<!--                      <td>F</td>-->
                      <td>G</td>
                      <td>VG</td>	
                      <td>EX</td>
                      <td>ID</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td colspan="2">
                <ul class="cutslider_lines">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                    <div id="polish_slider"></div>
                  </td>
              </tr>
              <tr>
                <td align="left"><input type="hidden" maxlength="1" value="0" id="polismin" class="w50px" onchange="modifyresult('polismin',this.value)"></td>
                <td align="right"><input type="hidden" maxlength="1" value="4" id="polismax" class="w50px" onchange="modifyresult('polismax',this.value)"></td>
              </tr>
            </table>
          </div>
        </div>
        <div id="symmetryrow" class="filterCols col-sm-4 set_filter_margin" style="display:none;">
          <div>
            <table>
              <tr>
                <td colspan="2"><span class="advance_filter_lable">Symmetry</span>
                <?php echo on_off_features('symtry_slider', 'symmet',0,4,9); // diamond_section_helper ?>
                </td>
              </tr>              
              <tr>
                <td colspan="2"><table class="setValueTable">
                    <tr align="center">
<!--                      <td>F</td>-->
                      <td>G</td>
                      <td>VG</td>
                      <td>EX</td>
                      <td>ID</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td colspan="2">
                    <ul class="cutslider_lines">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                <div id="symtry_slider"></div>
                  </td>
              </tr>
              <tr>
                <td align="left"><input type="hidden" maxlength="1" value="10" id="symmetmin" class="w50px" onchange="modifyresult('symmetmin',this.value)"></td>
                <td align="right"><input type="hidden" maxlength="1" value="100" id="symmetmax" class="w50px" onchange="modifyresult('symmetmax',this.value)"></td>
              </tr>
            </table>
          </div>
        </div>
        <div id="depthrow" class="filterCols col-sm-4 set_filter_margin" style="display:none;">
          <div>
            <table>
              <tr>
                <td colspan="2"><span class="advance_filter_lable set_filter_label">Depth</span>
                <?php echo on_off_features('depth_vslider','depth',0,100,10); // diamond_section_helper ?>
                </td>
              </tr>
              
              <tr>
                <td align="left">
                <input type="text" value="<?php echo $min_depth?>" id="depth_minx" class="w50px left_min" ></td>
                <td align="right">
                <input type="text" value="<?php echo $max_depth?>" id="depth_maxs" class="w50px right_max" ></td>
              </tr>
              <tr>
                <td colspan="2">
                	<div id="depth_vslider"></div>
                  </td>
              </tr>
            </table>
          </div>
        </div>
        <div id="tablerow" class="filterCols col-sm-4 set_filter_margin" style="display:none;">
          <div>
            <table>
              <tr>
                <td colspan="2"><span class="advance_filter_lable set_filter_label">Table</span>
                <?php echo on_off_features('table_vslider','table',0,100,11); // diamond_section_helper ?>
                </td>
              </tr>
              <tr>
                <td align="left">
                  <input type="text" value="<?php echo $min_table?>" id="table_mins" class="w50px left_min" ></td>
                <td align="right">
                  <input type="text" value="<?php echo $max_table?>" id="table_maxs" class="w50px right_max"></td>
              </tr>
              <tr>
                <td colspan="2">
                    <div id="table_vslider"></div>
                  </td>
              </tr>
            </table>
          </div>
        </div>
        <div id="flurorow" class="filterCols col-sm-4 set_filter_margin" style="display:none;">
          <div>
              <table class="slideUprTable">
              <tr>
                <td colspan="2"><span class="advance_filter_lable">Fluorescence</span>
                <?php echo on_off_features('floursence_slider','fluro',0,4,15); // diamond_section_helper ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <table class="flourValueTable">
                    <tr align="center">
                      <td>V. Strong</td>
                      <td>Strong</td>
                      <td>Medium</td>
                      <td>Faint</td>
                      <td>None</td>
                    </tr>
                 </table>                      
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <ul class="cutslider_lines flourslider_lines">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                <div id="floursence_slider"></div>
                  </td>
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
      <div class="adOption">
    	<a href="#javascript;" id="viewAvanceOption">View Advanced Search</a>
     </div>
      <div class="advancedOptions" style="display:none;">
        <div>
          <div class="chksty"> <span>
            <input type="checkbox" name="polish" id="polish" onclick="showhiderow('polish','polishrow', 'polis',0,4,8)" />
            <label for="polish">Polish</label>
            </span> <span>
            <input type="checkbox" name="symmetry" id="symmetry" onclick="showhiderow('symmetry','symmetryrow','symmet',0,4,9)" />
            <label for="symmetry">Symmetry</label>
            </span> <br>
          </div>
          <div class="chksty"> <span>
            <input type="checkbox" name="depthx" id="depthx" onclick="showhiderow('depthx','depthrow','depth',0,100,10)" />
            <label for="depthx">Depth</label>
            </span> <span>
            <input type="checkbox" name="tablex" id="tablex" onclick="showhiderow('tablex','tablerow','table',0,100,11)" />
            <label for="tablex">Table</label>
            </span> <br>
          </div>
          <div class="chksty"> <span>
            <input type="checkbox" name="fluorescence" id="fluorescence" onclick="showhiderow('fluorescence','flurorow','fluro',0,4,15)" />
            <label for="fluorescence">Fluorescence</label>
            </span> <br>
          </div>
        </div>
        <a href="" onclick="clearsessions()"><span class="cler_filter">Clear Filter</span></a> </div>
      <div class="clear"></div>
    </div>
                </div>
                    <div class="clear"></div>
<!--                    <br>
                    <div class="carat_bar" id="view_diamond_shape"><?php echo $diamonds_shape; ?> Shape Diamond</div><br>-->
            </div>
            </div>
        <div class="clear"></div>
        </div>
    
  <div class="clear"></div>
  <div class="searchBox row-fluid">
    <div class="col-sm-9 diamondbg_block">
        <div class="dlHead" id="total_diamond_count"> DIAMONDS</div>
      <div class="diamond_search">
<!--          <form name="searchForm" id="searchForm" method="post" action="">-->
              <input type="text" name="diamnd_search" id="diamnd_search" placeholder="Search" />
              <input type="image" src="<?php echo SITE_URL; ?>img/david_home/diamond_search/search_filter_ic.jpg" onclick="search_diamond_via_id()" />
<!--          </form>  -->
      </div>
      <div class="clear"></div>
      <br />
      <!--Table Area Start-->
<!--      <form name="diamondList" id="diamondList" method="post" action="<?php echo config_item('base_url')?>diamonds/listComparedDimaond">-->
      <form name="diamondList" id="diamondList" method="post">
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
        <div class="quest_icon"><img src="<?php echo config_item('base_url')?>img/page_img/no-info50x50.png" alt="no-info5"/></div>
        <div class="rgHead">Hover over and click diamond details to see further details and shipping information.</div>
        </div>
      </div>
      <div class="clear"></div>
      <div id="defaults_button" style="display:none;">
      <div class="quest_icon"><img src="<?php echo config_item('base_url')?>img/page_img/no-info50x50.png" alt="no-info5"/></div>
        <div class="rgHead">Hover over and click diamond details to see further details and shipping information.</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
    <br />
    <br />
  </div>
  <div class="clear"></div>
  <script src="<?php echo SITE_URL; ?>js/noslider_js_function123767.js"></script>
  <script>
//window.onload = getRangecolorSliderView('sliders', 'claritymin', 'claritymax', 0, 16);
window.onload = getRangeClaritSliderView1('sliders', 'claritymin', 'claritymax', 0, 20, <?php echo $clarity_start; ?>, <?php echo $clarity_end; ?>);
//window.onload = getRangeSliderView('sliders', 'claritymin', 'claritymax', 0, 9);
//window.onload = getRangeclaritySliderView('sliders', 'claritymin', 'claritymax', 0, 18, <?php echo $clarity_start; ?>, <?php echo $clarity_end; ?>);
  window.onload = getRangecolorSliderView('colrs_slider', 'colormin', 'colormax', 0, 17, <?php echo $color_start; ?>, <?php echo $color_end; ?>);
  window.onload = getRangecutSliderView('cutv_slider', 'cutmin', 'cutmax', 0, 5);
  window.onload = getPriceRangeSliderView('pricesv_slder', 'searchminprice', 'searchmaxprice', <?php echo $minm_price; ?>, <?php echo $maxim_price; ?>);
  window.onload = getCaratRangeDecimalValue('carat_vslider', 'caratmin', 'caratmax', <?php echo $min_carat; ?>, <?php echo $max_carat; ?>);
  
  ////// advanced tab sliders
  window.onload = disable_toggle_btn('toggle_box');
//  window.onload = getRangeSliderView('floursence_slider', 'fluro_mins', 'fluro_maxs', 0, 4);
//  window.onload = getRangeclaritySliderView('floursence_slider', 'fluro_mins', 'fluro_maxs', 0, 9);
//  window.onload = getRangeSliderView('polish_slider', 'polismin_mins', 'polismax_maxs', 0, 3);
//  window.onload = getRangeSliderView('polish_slider', 'polismin_mins', 'polismax_maxs', 0, 3);
  window.onload = getRangeSliderViewPolish('polish_slider', 'polismin_mins', 'polismax_maxs', 0, 5);
  window.onload = getRangeSliderViewFluorescence('floursence_slider', 'fluro_mins', 'fluro_maxs', 0, 9);
//  window.onload = getRangeSliderView('symtry_slider', 'symmet_mins', 'symmet_maxs', 0, 3);
//  window.onload = getRangeSliderView('symtry_slider', 'symmet_mins', 'symmet_maxs', 0, 3);
  window.onload = getRangeSliderViewSymetry('symtry_slider', 'symmet_mins', 'symmet_maxs', 0, 5);
  window.onload = getRangeDecimalValue('depth_vslider', 'depth_minx', 'depth_maxs', <?php echo $min_depth; ?>, <?php echo $max_depth; ?>);
  window.onload = getRangeDecimalValueTable('table_vslider', 'table_mins', 'table_maxs', <?php echo $min_table; ?>, <?php echo $max_table; ?>);

</script>
<script src="<?php echo SITE_URL; ?>js/bootstrap-switch.js"></script>
<?php //echo $signup_form; ?>
<div class="clear"></div>


<!-- POPUP DETAIL DIAMOND -->
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
