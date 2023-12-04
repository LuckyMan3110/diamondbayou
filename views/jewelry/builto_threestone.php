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
             <div class="threston_section">
             	<div class="filter_row">
                	<span class="filtericon">Filter by : Price, Metal</span>
                    <span class="reset_filter"><a href="#">Reset Filters</a></span>
                </div>
                <div class="filter_row" id="pricerow">Price</div>
                <div class="filter_row" id="priceSlide">
                	<div><input type="text" name="min_price" value="$400" /></div>
                    <div><img src="<?php echo config_item('base_url')?>img/threstone/a_slider.jpg" alt="" /></div>
                    <div><input type="text" name="max_price" value="$1,400" /></div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="filter_row" id="pricerow">Metal</div>
                <div class="filter_row" id="mtlist_row">
                	<span>Platinum (4)</span> 
                    <span>14k White Gold (1)</span>	
                    <span>18k Yellow Gold (2)</span>
                 </div>
                <div class="filter_row">
                	<span class="filtericon">Sort by : Signature</span>
                </div>
                <div class="filterBox_row">
                	<span>Price : Low to High</span>
                    <span>Price : High to Low</span>
                    <span class="activeslidebg">Signature</span>
                    <span>3D Rings</span>
                    <span>Newest</span>
                </div>
             </div>
            <div class="clear"></div><br><br>
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
                	<div class="product_imgcols">
                    <!--<a href="#" onclick="viewThreestoneRingsDetails('<?php echo $threestone['stock_number'];?>','<?php echo $centerstoneid;?>','<?php echo $sidestoneid1;?>','<?php echo $sidestoneid2;?>')">-->
                    <a href="<?php echo config_item('base_url')?>jewelry/tothree_stonedetail/<?php echo $threestone['stock_number'];?>">
                    <img src="<?=$ring_image;?>" alt="Ring Title" /></a></div>
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
<?php /*?><style type="text/css">
.w85px{width: 125px !important;margin: 0px !important;padding-left: 10px;font-size: 13px; color:#fff;}
.w50px{width:60px !important;}
.tabsBg .smalltabheader{width:215px !important; font-size:13px !important;}
.tabsBg .gold{font-size:13px; color:#fff;}
.tabsBg .floatl img{padding-right:10px !important;}
#Text_field{font-size:13px;}
.newtileheader {font-size: 16px;}
</style>
<div class="less-height" id="main-body-a">
  		<div class="bodytop"></div>
        <div class="mainPageHeading"><h2>Build Your Own Three-Stone Ring (Diamond Jewelry)</h2></div>
	  	<div class="bodymid2">
	  	
	  		<!--<div class="topdiv">
				<p class="txtcenter">Build Your Own Diamond Jewelry</p>
				<?php // echo $top_ads;?>
			</div>
			
			<div style=" float: left;padding-bottom: 12px;text-align: center;width: 629px;" class="divheader txtright pad10">
					Build Your Own Three-Stone Ring
			</div>-->
            
			<div class="dbr"></div>
			<div class="tabsBg"><?php echo $tabhtml;?></div>
            <div class="clear"></div><br>			
			<div>			  			
			  <div class="floatlmy bigcontainerR">
				<p class="fakaline pad10"><? echo $this->config->item('full_site_name') ?> &reg; make it easy to design your own three stone ring. Follow the three-step process to find the perfect diamond and settings.</p>						     						     
				      </div>
				      <div class="floatlmy bigcontainerL">
			  				<img src="<?php echo config_item('base_url')?>/images/tamal/threestonering_bg.jpg">
			  		  </div>			  		  
				      <div class="clear"></div>
				      
				      <!--<div>			  		  		
				  		  <table width="95%" class="bgblue" cellpadding="5px" cellspacing="5px" style="font-size:10px;">
					  		  	<tr>
					  		  		<td>1.Pick a Center Diamond</td>
					  		  		<td>2.Select Your Sidestones</td>
					  		  		<td>3.Choose Your Settings</td>
					  		  		<td>4.Add To Basket</td>
					  		  	</tr>					  		  	
				  		  </table>
				      </div>-->
			</div>
			
			<div class="hr"></div>
			 
			<p class="newtileheader fakaline pad10">Select one or more diamond shapes</p>
				            <br>
			<form action="<?php echo config_item('base_url');?>diamonds/search/true/false/tothreestone" method="POST">
                      <div class="diamond_option">
				            <div class="dbr"></div>
				            <div>
					          <div class="floatlmy  w50px vsmall txtcenter" style="width:52px;"><label for="B"><img src="<?php echo config_item('base_url');?>images/diamonds/round.jpg" alt="round" /></label><br><input type="checkbox" value="round" name="diamondshape" id="B" onclick="toggleopacity(this, false)">Round</div>
					      		<!--<div class="floatlmy  w50px vsmall txtcenter"><label for="H">Heart<img src="<?php echo config_item('base_url');?>images/diamonds/heart.jpg" alt="heart" /></label><input type="checkbox" value="heart" name="diamondshape" id="H" onclick="toggleopacity(this, false)"></div>-->
					      		<div class="floatlmy  w50px vsmall txtcenter" style="width:52px;"><label for="E"><img src="<?php echo config_item('base_url');?>images/diamonds/emerald.jpg" alt="emerald" /></label><br><input type="checkbox" value="emerald" name="diamondshape" id="E" onclick="toggleopacity(this, false)">Emerald</div>
					      		<div class="floatlmy  w50px vsmall txtcenter" style="width:52px;"><label for="PR"><img src="<?php echo config_item('base_url');?>images/diamonds/princess.jpg" alt="princess" /></label><br><input type="checkbox" value="princess" name="diamondshape" id="PR" onclick="toggleopacity(this, false)">Princess</div>
					      		<!--<div class="floatlmy  w50px vsmall txtcenter"><label for="R">Radiant<img src="<?php echo config_item('base_url');?>images/diamonds/radiant.jpg" alt="radiant" /></label><input type="checkbox" value="radiant" name="diamondshape" id="R" onclick="toggleopacity(this, false)"></div>-->
					      		<!--<div class="floatlmy  w50px vsmall txtcenter"><label for="O">Oval<img src="<?php echo config_item('base_url');?>images/diamonds/oval.jpg" alt="oval" /></label><input type="checkbox" value="oval" name="diamondshape" id="O" onclick="toggleopacity(this, false)"></div>-->
					      		<!--<div class="floatlmy  w50px vsmall txtcenter"><label for="M">Marquise<img src="<?php echo config_item('base_url');?>images/diamonds/marquise.jpg" alt="marquise" /></label><input type="checkbox" value="marquise" name="diamondshape" id="M" onclick="toggleopacity(this, false)"></div>-->
					      		<!--<div class="floatlmy  w50px vsmall txtcenter"><label for="AS">Asscher<img src="<?php echo config_item('base_url');?>images/diamonds/asscher.jpg" alt="asscher" /></label><input type="checkbox" value="asscher" name="diamondshape" id="AS" onclick="toggleopacity(this, false)"></div>-->      		
					      		<!--<div class="floatlmy  w50px vsmall txtcenter"><label for="P">Pear<img src="<?php echo config_item('base_url');?>images/diamonds/pear.jpg" alt="pear" /></label><input type="checkbox" value="pear" name="diamondshape" id="P" onclick="toggleopacity(this, false)"></div>-->      		
					      		<!--<div class="floatlmy  w50px vsmall txtcenter"><label for="C">Cushion<img src="<?php echo config_item('base_url');?>images/diamonds/cushion.jpg" alt="cushion" /></label><input type="checkbox" value="cushion" name="diamondshape" id="C" onclick="toggleopacity(this, false)"></div>-->
					      		<div class="clear"></div>
				      		</div>  		
				      </div>
				      
				       <div class="hr"></div>
				      <div class="clear"></div> 		      			
				      <div id="Text_field">
				            <div class="dbr"></div>
				            <p class="newtileheader fakaline pad10">Select Price range(Optional)</p>
				            <br>
				            <span class="floatlmy">
Price From <input type="text" name="minprice" id='minprice' value="<?php echo $minprice;?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'maxprice',<?php echo $minprice, ",",$maxprice.",'min'";?>)">-to-<input type="text" name="maxprice" id="maxprice" value="<?php echo $maxprice; ?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'minprice',<?php echo $minprice, ",",$maxprice.",'max'";?>)"><input type="submit" value="Search" class="searchdiamondbtn" name="searchdiamonds" title="Start Search">
				            </span>
				             <div class="clear"></div>
				      </div>
				      <div class="clear"></div>
		      		  <div class="dbr hr"></div>
		      	      <br /><br />
                        
		      		<div class="dbr"></div>
		      		<div class="hr"></div>
		      		<!--<div class="txtcenter"><input type="submit" value="Search Diamonds" class="button" name="searchdiamonds"></div> -->
            </form>
			<div class="clear"></div>
		</div>
	  	<div class="bodybottom"></div><div class="clear"></div>
</div><?php */?>
