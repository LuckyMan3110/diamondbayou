<style type="text/css">
.bodymid2 .smalltabheader{width:200px; }
</style>
<div id="main-body-a">
		<div class="bodytop"></div>
		<div class="bodymid2" style="margin:0 auto; width:970px;">
		
				<div class="topdiv">
					<?php //echo $top_ads;?>
				</div>
		 		<?php echo $tabhtml;?>
		 		<div class="dbr"></div>
				
				<!-- <a href="#" onclick="viewRingsDetails(<?php // echo $threestone['stock_number'];?>,false)">									
									<img style="width: 120px; height: 122px;" id="ringbigimage<?php echo $threestone['stock_number']?>" src="<?php  //echo file_exists(config_item('base_path').'images/rings/'.$threestone['small_image']) ? config_item('base_url').'images/rings/'.$threestone['small_image'] : config_item('base_url').'images/rings/noimage.jpg';?>" width="70" >
							</a> -->
				
				<?php if(isset($threestonerings)){
					foreach ($threestonerings as $threestone){ 
					
							if( trim($threestone['small_image'])!='' &&  file_exists('images/rings/'.$threestone['small_image']) )
								$ring_image =config_item('base_url').'images/rings/'.$threestone['small_image'];															
							else	
								$ring_image = config_item('base_url').'images/rings/noimage.jpg';
					?>
						<div style="height: 224px; margin-left: 12px; margin-top: 30px; width: 170px;" class="floatl ringbox txtcenter">							
							
							<a href="#" onclick="viewThreestoneRingsDetails('<?php echo $threestone['stock_number'];?>','<?php echo $centerstoneid;?>','<?php echo $sidestoneid1;?>','<?php echo $sidestoneid2;?>')">									
								<img style="width: 120px; height: 122px;" id="ringbigimage<?php echo $threestone['stock_number']?>" src="<?=$ring_image;?>" alt="ringbigimage"> <!-- width="70" -->
							</a>
							<div class="innerp"><?php echo substr($threestone['description'],0,60);?>......</div><br>
							<p style="color:#000000">Price: $<?php echo $threestone['price'];?></p>
							<!--<p><a href="javascript:void(0)" class="search" onclick="viewRingsDetails(<php echo $threestone['stock_number'];>,false)">View Details</a></p>-->
                            <p style="color:#000000"><a style="color:#000000" href="#" onclick="viewThreestoneRingsDetails('<?php echo $threestone['stock_number'];?>','<?php echo $centerstoneid;?>','<?php echo $sidestoneid1;?>','<?php echo $sidestoneid2;?>')">View Details</a></p>
                            
						</div>
				<?php }}?>
				<div class="clear"></div>
		
		</div>
		<div class="bodybottom"></div><div class="clear"></div>
</div>
	   	 