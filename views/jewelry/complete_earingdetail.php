<div id="" class="jwDetail earingComp">
  <div class="dmPendantSection">
             
    <div class=""> 
      <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
        <div class="bread-crumb">
          <div class="breakcrum_bk">
            <ul>
                <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                <li><a href="#">Diamonds</a></li>
                <li><a href="<?php echo config_item('base_url')?>jewelry/build_earings">Build Your Own Earrings</a></li>
              </ul>
            </div>
          <div class="clear"></div>
          </div>
        <div class="clear"></div>
      <?= isset($pendan_stepsbar)?$pendan_stepsbar:'';?>
      <br />
      <div class="pagesub_label">CREATE YOUR OWN DIAMOND Earrings</div><br>
        <div class="earingBoxRow">
            <div class="earboxCol">1. Choose your diamonds - <?php echo $total_dmprice; ?>
            <div><a href="#">View</a> | <a href="#">Change</a></div>
            </div>
			<div class="earboxCol">2. Choose your setting - <?php echo $earing_price; ?>
            <div><a href="#">View</a> | <a href="#">Change</a></div>
            </div>
            <div class="earboxCol earboxActive">3. Complete Your Earring - <?php echo $total_earprice; ?></div>
            <div class="clear"></div>
        </div>
      <br><br>
      <!--<div class="pendant_mainhead">Build your own diamond pendant</div>
      <div class="pdhead_label">Review Your Pendant</div><br>-->
      <div class="row-fluid">
      <div class="pendantshape_imgrview col-sm-4"><img src="<?php echo $earing_dimglink;?>" width="280"  alt="more"></div>
      <div class="pendant_reviewbk col-sm-7 pull-right">
        <div><?php echo $earing_metal;?> </div>
        <div class="pendant_mainhead">Diamond Stud Earrings<?php //echo $earing_dtdesc;?><br><?php echo $earing_price;?></div>
        <br>
        <div class="price_style"><?php echo $total_dmprice; ?></div><br>
        <br><br>
        <div class="order_loosedm">ORDER Now FOR DELIVERY BY <?php echo $next_date; ?></div>
        <div class="free_shipst">FREE SHIPPING</div><div class="clear"></div><br>
        <!--<div class="order_deldate">ORDER IN THE NEXT 4 HOURS 50 MINUTES FOR FREE DELIVERY ON FRIDAY, FEBRUARY 6.</div>-->
        <div class="dropa_hint">
           <label> THIS ITEM WILL SHIPS FREE VIA FEDEX</label>
        </div>
        <br><br><br>
        <div>
            <div class="pendant_detail">
        <div>
            The total diamond carat weight of your earrings is <?php echo $total_carat; ?>.<br><br>
            
           <div> <span class="green_text"><?php echo $diamond1_detail; ?></span> <span class="price_sectionbk">$<?php echo _nf($dmrow_detail['price']); ?></span>               
           <div class="clear"></div>
            Stock #: <?php echo $dmrow_detail['Stock_n']; ?> </div><br>
            
            <div><span class="green_text"><?php echo $diamond2_detail; ?></span> <span class="price_sectionbk">$<?php echo _nf($dmrow_detail2['price']); ?></span>
            <div class="clear"></div>
            Stock #: <?php echo $dmrow_detail2['Stock_n']; ?></div><br>
            
            <div><span class="green_text"><?php echo $earing_desc; ?></span><span class="price_sectionbk"><?php echo $earing_price; ?></span>
            <div class="clear"></div> 
            Style #: <?php echo $earing_style; ?> </div><br>
        </div>
                <div class="subtotal_price">Subtotal : <span><?php echo $total_earprice; ?></span></div><br><br>
            </div>
            <div class="clear"></div>
            <div><a href="#javascript;" onclick="addtocart(<?php echo "'".$addoption."'";?>,'<?php echo $lot;?>','<?php echo $dmrow_detail['lot'];?>','<?php echo (empty($dmrow_detail2['lot']) ? "false" : $dmrow_detail2['lot']) ;?>','<?php echo $earingid;?>','<?php echo $totalear_price;?>')" class="choosedm_style">Add to bag</a></div>
        </div>
        <div class="dropa_hint">
            <span>Want</span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span>Drop a Hint</span>
        </div>
        <br>
        <div>
            <div class="need_assidcl">
            <div><span>- NEED ASSISTANCE?</span> CLICK TO COLLAPSE</div><br>
            <div>We're here for you. Our specialists are available to assist you in finding the perfect ring.</div>
            </div>
            
            <div class="contact_column">
                <!--<div class="liveChat">Live Chat</div>-->
                <div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
                <div class="emailUs">Email Us</div>
            </div>
            <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
      
        <br><br>
      </div>
      <div class="clear"></div><br><br>
      <div class="stepstabs_row pendant_subtabs">          	
          <div id="dmdetail" class="steps_box activeBg" onclick="setDiamondTabs('diamondDetail','dmdetail')">
              <div>Diamond Details</div>
          </div>
          <div id="smdiamond" class="steps_box" onclick="setDiamondTabs('similarDiamod','smdiamond')">
              <div>Similar Diamonds</div>
          </div>
          <div id="dmpolicies" class="steps_box" onclick="setDiamondTabs('diamondPolicies','dmpolicies')">
              <div>Polices</div>
          </div>
          <div class="clear"></div>
      </div>
       <div class="clear"></div>
     <div id="diamondDetail"> 
     <div class="diamond_tbdetail row-fluid">
    <div class="sutab_col1 col-sm-4">
        <div class="setcols_height">
        <div class="pendant_mainhead">Product Details</div>
        <div class="paragraph"><?php echo $earing_mrdesc; ?></div><br>
        <!--<div class="imgeBlock">
        <a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $row_earing['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank"><img src="<?php echo config_item('base_url');?>img/page_img/report_img1.jpg" alt="GIA Report" /><br>GIA Report</a>
        <a href="#"><img src="<?php echo config_item('base_url');?>img/page_img/report_img.jpg" alt="Origin Country Certificate" /><br>Verify Report</a>
    </div>-->
    </div>
    <div class="clear"></div>
    <br><br>
    </div>
    <div class="sutab_col2 col-sm-4">	
        <div class="dmrow_leftcolum">
            <div><span>Style Number:</span><br><?php echo check_empty($earing_style); ?></div><br>
            <div><span>Recycled Metal:</span><br><?php echo check_empty($earing_metal); ?></div><br>
            <div><span>Shape :</span><br><?php echo check_empty($earing_dshape); ?></div><br>
            <div><span>Backling:</span><br>NA<?php //echo $diamond1_shape; ?></div><br>
            <div><span>Rhodium Finish:</span><br>NA<?php //echo $row_earing['cut']; ?></div><br>
            <div><span>Setting Type:</span><br>NA<?php //echo $earing_style; ?></div>
            <div><span>Diamond shapes can be set with:</span><br><img src="<?php echo config_item('base_url');?>/images/shapes_images/<?php echo $earing_dshapimg; ?>" width="29" alt="Round Shape" /></div><br>
        </div>
    </div>
    
    
    <div class="clear"></div><br><br>
    </div>
    
    <div class="diamond_tbdetail row-fluid">
    <div class="sutab_col2 col-sm-4">
    <div class="column_heading">Diamond Information</div>	
        <div class="dmrow_leftcolum">
            <div><span>Stock Number:</span><br><?php echo $dmrow_detail['Stock_n']; ?></div><br>
            <div><span>Carat Weight:</span><br><?php echo $dmrow_detail['carat']; ?></div><br>
            <div><span>Shape:</span><br><?php echo check_empty($diamond1_shape); ?></div><br>
            <div><span>Cut:</span><br><?php echo check_empty($dmrow_detail['cut']); ?></div><br>
            <div><span>Color:</span><br><?php echo check_empty($dmrow_detail['color']); ?></div><br>
            <div><span>Clarity:</span><br><?php echo check_empty($dmrow_detail['clarity']); ?></div><br>
            <div><span>Measurements:</span><br><?php echo check_empty($dmrow_detail['Meas']); ?></div><br>
        </div>
        <div class="dmrow_rightcolum">
            <div><span>Table:</span><br><?php echo $dmrow_detail['tbl']; ?></div><br>
            <div><span>Depth:</span><br><?php echo $dmrow_detail['Depth']; ?></div><br>
            <div><span>Symmetry:</span><br><?php echo getCutValue($dmrow_detail['Sym']); ?></div><br>
            <div><span>Polish:</span><br><?php echo getCutValue($dmrow_detail['Polish']); ?></div><br>
            <div><span>Fluorescence:</span><br><?php echo check_empty($dmrow_detail['Flour']); ?></div><br>
        </div>		
    <div class="clear"></div>
    </div>
    <div class="sutab_col2 col-sm-4">
    <div class="column_heading">Diamond Certification</div>	
        <div class="dmrow_leftcolum">
            <div><span>Report:</span><br><a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $dmrow_detail['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank">GIA Report</a><?php //echo check_empty($earing_style); ?></div><br>
            <div><span>Origion Certificatoin:</span><br><?php echo check_empty($dmrow_detail['Country']); ?></div><br>
        </div>
    </div>
    
    
    <div class="clear"></div><br><br>
    </div>
    <div class="diamond_tbdetail row-fluid">
    <div class="sutab_col2 col-sm-4">
    <div class="column_heading">Diamond2 Information</div>	
        <div class="dmrow_leftcolum">
            <div><span>Stock Number:</span><br><?php echo $dmrow_detail2['Stock_n']; ?></div><br>
            <div><span>Carat Weight:</span><br><?php echo $dmrow_detail2['carat']; ?></div><br>
            <div><span>Shape:</span><br><?php echo check_empty($diamond2_shape); ?></div><br>
            <div><span>Cut:</span><br><?php echo check_empty($dmrow_detail2['cut']); ?></div><br>
            <div><span>Color:</span><br><?php echo check_empty($dmrow_detail2['color']); ?></div><br>
            <div><span>Clarity:</span><br><?php echo check_empty($dmrow_detail2['clarity']); ?></div><br>
            <div><span>Measurements:</span><br><?php echo check_empty($dmrow_detail2['Meas']); ?></div><br>
        </div>
        <div class="dmrow_rightcolum">
            <div><span>Table:</span><br><?php echo $dmrow_detail2['tbl']; ?></div><br>
            <div><span>Depth:</span><br><?php echo $dmrow_detail2['Depth']; ?></div><br>
            <div><span>Symmetry:</span><br><?php echo getCutValue($dmrow_detail2['Sym']); ?></div><br>
            <div><span>Polish:</span><br><?php echo getCutValue($dmrow_detail2['Polish']); ?></div><br>
            <div><span>Fluorescence:</span><br><?php echo check_empty($dmrow_detail2['Flour']); ?></div><br>
        </div>		
    <div class="clear"></div>
    </div>
    <div class="sutab_col2 col-sm-4">
    <div class="column_heading">Diamond Certification</div>	
        <div class="dmrow_leftcolum">
            <div><span>Report:</span><br><a href="http://www.gia.edu/cs/Satellite?reportno=<?php echo $dmrow_detail2['Cert_n'] ?>&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank">GIA Report</a><?php //echo check_empty($earing_style); ?></div><br>
            <div><span>Origion Certificatoin:</span><br><?php echo check_empty($dmrow_detail2['Country']); ?></div><br>
        </div>
    </div>
    
    
    <div class="clear"></div><br><br>
    </div>
    </div>
    <div id="similarDiamod" style="display:none">
     <div class="diamond_tbdetail">
        <table class="diamondListTable">
            <thead>
                <tr>
                    <th scope="col">Shape</th>
                    <th scope="col">Carat</th>
                    <th scope="col">Color</th>
                    <th scope="col">Clarity</th>
                    <th scope="col">Ratio</th>
                    <th scope="col">Cut</th>
                    <th scope="col">Cert</th>
                    <th scope="col">Polish</th>
                    <th scope="col">Sym</th>
                    <th scope="col">Flour</th>
                    <th scope="col">Price</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
                <tbody>
                    <?php echo $simlars_diamondpair; ?>
                </tbody>
        </table>
        </div>
    </div>
    <div id="diamondPolicies" style="display:none">
        <div class="diamond_tbdetail">
            <?php echo policiesTabs(); ?>
        </div>
    </div>
    <div class="bottom_line"></div>
    
    <div class="clear"></div><br><br>
    <div class="showpiece_row row-fluid">
    <div class="showpiec_leftcl col-sm-6">
        <div class="showpc_lflabel col-sm-8">EXQUISITE<br>
                <span>CRAFTSMANSHIP</span><br>
                Each piece is handcrafted to order <br>with
                the highest quality and beauty.<br>
                
                <a href="#">LEARN MORE</a></div>
        <div class="showpc_rglabel col-sm-4"><img src="<?php echo config_item('base_url');?>img/page_img/viewshape_ring.jpg" alt="Learn More" /></div>
        
        <div class="clear"></div>
    </div>
    
    <div class="showpiec_leftcl showpiec_rgcl col-sm-6 pull-right">
        <div class="row-fluid">
        	<div class="showpc_lflabel col-sm-8">JEWELRY WITH<br>
                <span><?php echo get_site_title(); ?></span><br>
                Your finest in custom diamonds. and replace that image of woman with box to pendant image i gave you.<br>
                </div>
        	<div class="showpc_rglabel col-sm-4"><img src="<?php echo config_item('base_url');?>img/page_img/box_shapebg.jpg" alt="Learn More" /></div>
         </div>
        
        <div class="clear"></div>
    </div>
</div>
	<div class="clear"></div><br>
	<div class="showpiece_row row-fluid">
    <div class="showpiec_sbcl col-sm-3">
        OUR<br>
        <span><span>COMMITMENT</span><br>
        TO YOU</span><br>
        Free Shipping Both Way<br>
        30 Day Returns<br>
        Manufacturing Warranty<br>
    </div>
    <div class="showpiec_sbcl col-sm-3">
        HELPFUL<br>
        <span><span>GUIDANCE</span></span><br><br>
        
        Diamond Guide<br>
        Our Ethical Practices<br>
        Find your Ring Size<br>
    </div>
    <div class="showpiec_leftcl showpiec_rgcl col-sm-6 pull-right">
    <br><br>
        <div class="row-fluid">
        	<div class="showpiec_rgsbcl col-sm-7">
            NEED<br>
            <span>ASSISTANCE?</span><br>
            
            We're here for you. Our<br>
            specialists are available to<br>
            assist you in finding the <br>
            perfect ring.<br>
        </div>
        	<div class="showpiece_rgsbcl col-sm-7">
            <div class="contact_column">
               <!-- <div class="liveChat">Live Chat</div>-->
                <div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
                <div class="emailUs"><a href="mailto:<?php echo SITE_EMAIL; ?>">Email Us</a></div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
    <br>
     </div><br><br>     
       
    <div class="clear"></div>
    
  </div>
</div>   
    <div class="clear"></div>
<!--End #Content-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.mins.js"></script>
<script type="text/javascript" src="<?php echo config_item('base_url'); ?>js/organictabs.jquery.js"></script>
<link type="text/css" href="<?php echo config_item('base_url'); ?>css/tabs_pendantstyle.css" rel="stylesheet" />

<script type="text/javascript">
function submitform()
{
	document.getElementById('form1').submit();
}
</script>
<script>
        $(function() {
            
            $("#example-two").organicTabs({
                "speed": 200
            });
    
        });
    </script>
<script type="text/javascript">
window.onload = function() {
var radios = document.getElementsByName('ctweight');
};
</script>-->
<script type="text/javascript">stLight.options({publisher: "7a6efe38-c4d4-4f64-a105-5247ba606425", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>