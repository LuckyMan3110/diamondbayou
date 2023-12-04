<style>
.jewlry_price{text-align:center;}
</style>
<article class="container_12" id="main-body-a"> 
  <!--<section id="sub"> </section>-->
  <section id="main" class="engagement">
  
    <div id="containt" class="jwDetail">
      <div class="content dmPendantSection">
                 
        <div class="engagement-right"> 
          <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
          <div class="breakcrum_bk">
                <ul>
                  <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
                  <li><a href="#">Diamonds</a></li>
                  <li>Create Your Own Earrings</li>
                </ul>
            </div>
            <div class="clear"></div>
          <?= isset($pendan_stepsbar)?$pendan_stepsbar:'' ;?>
          <br />
          <div class="pagesub_label">CREATE YOUR OWN DIAMOND Earrings</div><br>
			<div class="earingBoxRow">
				<div class="earboxCol">1. Choose your diamonds</div>
            	<div class="earboxCol earboxActive">2. Choose your setting</div>
                <div class="earboxCol">3. Complete Your Earring</div>
                <div class="clear"></div>
            </div>
          <br><br>
          <!--<div class="pendant_mainhead">Build your own diamond pendant</div>
          <div class="pdhead_label">Review Your Pendant</div><br>-->
          <div>
          <div class="pendantshape_imgrview"><img src="<?php echo $earing_dimglink;?>" width="280"  alt="choose_02"></div>
          <div class="pendant_reviewbk">
          	<div><?php echo $earing_metal;?> </div>
            <div class="pendant_mainhead">Diamond Stud Earrings<?php //echo $earing_dtdesc;?><br>$<?php echo _nf($row_earing['price']);?></div>
            <br>
            <div class="price_style"><?= isset($total_dmprice)?$total_dmprice:''; ?></div><br><br>
            <div class="order_loosedm">ORDER Now FOR DELIVERY BY <?php echo $next_date; ?></div>
            <div class="free_shipst">FREE SHIPPING</div><div class="clear"></div><br>
            <div><a href="<?php echo $earing_detilink;?>" class="choosedm_style">Choose This Setting</a></div>
            <!--<div class="dropa_hint">
                <span>Want</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>Drop a Hint</span>
            </div>-->
            <br>
            <div>
            	<div class="need_assidcl">
                <!--<div><span>- NEED ASSISTANCE?</span> CLICK TO COLLAPSE</div><br>-->
                <div>We're here for you. Our specialists are available to assist you in finding the perfect ring.</div>
                </div>
                
                <div class="contact_column">
                	<!--<div class="liveChat">Live Chat</div>-->
                    <div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
                    <div class="emailUs">Email Us</div>
                </div>
                <div class="clear"></div>
            </div>
            <br><br>
          </div>
          <div class="clear"></div>
          </div>
          <div class="clear"></div><br><br>
          <!--<div class="stepstabs_row pendant_subtabs">          	
              <div class="steps_box activeBg">
                  <div>Diamond Details</div>
              </div>
              <div class="steps_box">
                  <div>Similar Settings</div>
              </div>
              <div class="steps_box">
                  <div>Polices</div>
              </div>
              <div class="clear"></div>
          </div>-->
          <div class="stepstabs_row pendant_subtabs">          	
              <div id="dmdetail" class="steps_box activeBg" onclick="setDiamondTabs('diamondDetail','dmdetail')">
                  <div>Diamond Details</div>
              </div>
              <div id="smdiamond" class="steps_box" onclick="setDiamondTabs('similarDiamod','smdiamond')">
                  <div>Similar Settings</div>
              </div>
              <div id="dmpolicies" class="steps_box" onclick="setDiamondTabs('diamondPolicies','dmpolicies')">
                  <div>Polices</div>
              </div>
              <div class="clear"></div>
          </div>
           <div class="clear"></div>
          <div id="diamondDetail"> 
          <div class="diamond_tbdetail">
        <div class="sutab_col1">
        	<div class="setcols_height">
            <div class="pendant_mainhead">Product Details</div>
            <div><?= isset($earing_mrdesc)?$earing_mrdesc:''; ?></div><br>
        </div>
        <div class="clear"></div>
        <br><br>
        </div>
        <div class="sutab_col2">	
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
        </div>
        <div id="similarDiamod" style="display:none">
         <div class="diamond_tbdetail">
       	 	<?php echo $similar_settings; ?>
            </div>
        </div>
        <div id="diamondPolicies" style="display:none">
        	<div class="diamond_tbdetail">
       	 		<?php echo policiesTabs(); ?>
            </div>
        </div>
        <div class="bottom_line"></div>
        
        <div class="clear"></div><br><br>
        <div class="showpiece_row">
        	<div class="showpiec_leftcl">
            	<div class="showpc_lflabel">EXQUISITE<br>
						<span>CRAFTSMANSHIP</span><br>
                        Each piece is handcrafted to order <br>with
                        the highest quality and beauty.<br>
                        
                        <a href="#">LEARN MORE</a></div>
                <div class="showpc_rglabel"><img src="<?php echo config_item('base_url');?>img/page_img/viewshape_ring.jpg" alt="Learn More" /></div>
                
                <div class="clear"></div>
            </div>
            <div class="showpiec_leftcl showpiec_rgcl">
            	<div class="showpc_lflabel">JEWELRY WITH<br>
						<span><?php echo get_site_title(); ?></span><br>
                        Your finest in custom diamonds. and replace that image of woman with box to pendant image i gave you.<br>
						</div>
                <div class="showpc_rglabel"><img src="<?php echo config_item('base_url');?>img/page_img/box_shapebg.jpg" alt="Learn More" /></div>
                
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div><br>
        <div class="showpiece_row">
        	<div class="showpiec_sbcl">
                OUR<br>
                <span><span>COMMITMENT</span><br>
                TO YOU</span><br>
                Free Shipping Both Way<br>
                30 Day Returns<br>
                Manufacturing Warranty<br>
            </div>
            <div class="showpiec_sbcl">
                HELPFUL<br>
                <span><span>GUIDANCE</span></span><br><br>
                
                Diamond Guide<br>
                Our Ethical Practices<br>
                Find your Ring Size<br>
            </div>
            <div class="showpiec_leftcl showpiec_rgcl">
            <br><br><br>
            	<div class="showpiec_rgsbcl">
                    NEED<br>
                    <span>ASSISTANCE?</span><br>
                    
                    We're here for you. Our<br>
                    specialists are available to<br>
                    assist you in finding the <br>
                    perfect ring.<br>
                </div>
                <div class="showpiece_rgsbcl">
                    <div class="contact_column">
                       <!-- <div class="liveChat">Live Chat</div>-->
                        <div class="contactNo"><?php echo get_site_title('contact_info'); ?></div>
                        <div class="emailUs">Email Us</div>
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
  </section>
</article>
<!--End #Content-->

</body>
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
</html>