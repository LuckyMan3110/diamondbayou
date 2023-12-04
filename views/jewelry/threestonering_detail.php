<div id="main-body-a" class="tothree_stone">
	<div class="bread-crumb">
            <ul>
              <li><a href="<?php echo config_item('base_url')?>">Home</a></li>
              <li><a href="<?php echo config_item('base_url')?>">Pendant</a></li>
              <li>BUILD YOUR OWN THREE-STONE RING</li>
            </ul>
          </div>          
  <div class="bodytop"></div>
  <!--<div class="mainPageHeading"><h2>Build Your Own Diamond Jewelry</h2></div>-->
  <div class="bodymid2"> 
  <?php echo stepsBuildToThrestone(); ?>
  	<div class="earing_heading">BUILD YOUR OWN THREE-STONE RING</div>
     
             <br><br>
             <div class="view_seting">< View All Settings</div><br>
             <div class="pgHeading">Three-Stone Pave Diamond Engagement Ring <span>in 18k Yellow Gold (1/4 ct. tw.)</span></div>
             <div>
             	<div class="leftcols">See Details</div>
                <div class="rightcols">
                	<div><img src="<?php echo config_item('base_url')?>img/threstone/a_boxview.jpg" alt="List View" />&nbsp;(60)</div>
                    <div>
                    	<a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_p.jpg" alt="" /></a>&nbsp;
                        <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_t.jpg" alt="" /></a>&nbsp;
                        <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_g.jpg" alt="" /></a>&nbsp;
                        <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_f.jpg" alt="" /></a>&nbsp;
                        <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_save.jpg" alt="" /></a>&nbsp;
                        <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/r2_leter.jpg" alt="" /></a>&nbsp;
                    </div>
                </div>
             </div>
            <div class="clear"></div><br><br>
            
            <div class="colsblock">
            	<div class="left_cols">
                	<img src="<?php echo config_item('base_url')?>img/threstone/r2_ringimg.jpg" alt="" />
                </div>
                <div class="right_cols">
                <div class="pendant_reviewbk">
          <div class="image_icons">
          <a href="#javascript" onclick="pagPrint()"><img src="http://yadegardiamonds.com/img/page_img/printx_ic.jpg" alt="Print Page" width=""></a>&nbsp;
          <a href="#" class="letter_imglink"><img src="http://yadegardiamonds.com/img/page_img/leter_ic.jpg" width=""></a>
          </div><br>
          <div class="ordernwRow">Order now for free delivery on Thursday, March 19.</div><br>
          <!--<div class="available_itemst">This item will ship in time for Valentine's Day.</div><br>-->
          <div class="chain_block">
          	<div class="chain_mainhead">SELECT Length</div>
            <div class="chain_boxst">
            	<div class="chain_rowst" onclick="showChainRow()">Chain Length</div>
                <input type="hidden" name="chain_field" id="chain_field" value="">
                <div class="chain_valuest" id="chainRow" style="display: block;">
                	<span class="chain_colst"><a href="#javascript;" onclick="setChainSize('16')">16 in</a></span>
                    <span class="chain_colst"><a href="#javascript;" onclick="setChainSize('18')">18 in</a></span>
                    <span class="chain_colst"><a href="#javascript;" onclick="setChainSize('24')">24 in</a></span>
                    <span class="chain_colst bgwhite">&nbsp;</span>
                    <span class="chain_colst bgwhite">&nbsp;</span>
                    <span class="chain_colst bgwhite">&nbsp;</span>
                    <span class="chain_colst bgwhite">&nbsp;</span>
                </div><br>
                <div class="chain_desctext">
                    <div class="chlength_label">Learn about chain length</div>
                    <div>If you don't see your chain length, please call 415.626.5035. We may still be able to help you.</div>
                </div>
            </div>
          </div>
          <div class="clear"></div><br>
          <div class="pendant_detail">
          	<div>
                The total diamond carat weight of your earrings is 6.040.<br><br>
                
               <div> <span class="green_text">Excellent-cut, G-color, VS1-clarity, Round, 6.040-carat Diamond</span> <span class="price_sectionbk">$293,429</span>               <div class="clear"></div>
                Stock #: 8939 </div><br>
                
                <!--<div><span class="green_text">Very Good-cut, E-color, VS2-clarity, Round, 0.23-carat Diamond</span> <span class="price_sectionbk">$354</span>
                <div class="clear"></div>
                Stock #: LD04233361</div><br>-->
                
                <div><span class="green_text">Double-Bail Solitaire Pendant Setting in Platinum</span><span class="price_sectionbk">$400</span>
                <div class="clear"></div> 
                Stock #: 16 </div><br>
            </div>
                	<div class="subtotal_price">Subtotal : <span>$293,829</span></div><br><br>
                    
                    <div class="descBox"><a href="http://yadegardiamonds.com/account/membersignin" class="btnLinkStyle">Add To Wishlist</a></div>
                    <div class="descBox"><a href="#" onclick="addtocart('addpendantsetings','8939',false,false,'1','293829.24')" class="btnLinkStyle">Add To basket</a></div>
                </div>
                
        <div class="clear"></div><br>
          </div>
                </div>
            </div>
            
            <div class="viewtype_option">
            <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/a_boxview.jpg" alt="List View" /></a>&nbsp;&nbsp;
            <a href="#"><img src="<?php echo config_item('base_url')?>img/threstone/a_dtview.jpg" alt="Detail View" /></a>
            </div>
             <div class="clear"></div><br>
             <div class="product_block">
             <?php 
			 $i = 1;
			 if(isset($threestonerings)){
					foreach ($threestonerings as $threestone){ 
					
							if( trim($threestone['small_image'])!='' &&  file_exists('images/rings/'.$threestone['small_image']) )
								$ring_image =config_item('base_url').'images/rings/'.$threestone['small_image'];															
							else	
								$ring_image = config_item('base_url').'images/rings/noimage.jpg';
					?>
             	<div class="product_column">
                	<div class="product_imgcols"><a href="#" onclick="viewThreestoneRingsDetails('<?php echo $threestone['stock_number'];?>','<?php echo $centerstoneid;?>','<?php echo $sidestoneid1;?>','<?php echo $sidestoneid2;?>')"><img src="<?=$ring_image;?>" alt="Ring Title" /></a></div>
                    <div class="desc_seting">
                    <div><?php echo substr($threestone['description'],0,45);?> </div>
                    <span class="rgrating"><img src="<?php echo config_item('base_url')?>img/threstone/a_asterik.jpg" alt="Product Rating" /></span><br>
                    <span class="price_label">$<?php echo _nf($threestone['price']);?></span>
                    </div>
                </div>
                <?php 
				if( $i%4 == 0) { echo '<div class="clear"></div>'; }
				//} ?>
               <?php $i++; }}?>
                <div class="clear"></div>
             </div>
            
	   		<div class="clear"></div><br><br><br><br>
            <div>Average Product Rating : <img src="<?php echo config_item('base_url')?>img/threstone/a_asterik.jpg" alt="Product Rating" />  4.8 out of 5 (based on 691 ratings)</div>
           
            <br><br>
           
  </div>
 <div class="bodybottom"></div>
 <?php echo signup_form(); ?>
</div></div>