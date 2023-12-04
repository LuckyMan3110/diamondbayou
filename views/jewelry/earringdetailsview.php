<?php 
			//$this->load->helper('t');

			
	   		$diamondprice =  round($sidestone1['price']) + round($sidestone2['price']);
			$totalprice = round($settingsdetails['price']) + $diamondprice;//number_format(($settingsdetails['price'] + $diamondprice),',');	
		/*
		 $totalprice = number_format(($settingsdetails['price'] + $diamondprice),',');
		  if(empty($totalprice))
		  {
			  $totalprice = 0;
			
		  }
		  if(empty($diamondprice))
		  {
			  $diamondprice = 0;
			
		  }
		*/
?>
<article class="container_12s">
<div class="auto-height" id="main-body-a">
  <div class="bodytop"></div>
  <div class="mainPageHeading"><h2>Diamond Jewelry Detail</h2></div>
  <div class="bodymid2">
	  	
	  			
	  		 
		  			<div class="column floatl">
			  				<p class="newtileheader">Your Diamond Pair has a Total Carat Weight of [<?=($sidestone1['carat'] + $sidestone2['carat']) ?>] Carat</p><br>
			  				<p>These carefully selected diamonds work well together because of their near-identical cut, color, clarity and size. To compare the specific diamond details, see the charts and information below.</p><br>
			  			<!--	<p><b>Settings Price:</b> $<?php // echo $settingsdetails['price'];?></p> -->
			  		<!--		<p><b>Total Price:</b> $</p> -->
		  			</div>
		  			<div class="column floatl jewelry_img">
			  				<img src="<?php echo config_item('base_url');?>images/tamal/choose_02.jpg" />
			  				<!--<div class="floatl">
			  	      				<div class="floatl blurleft"></div>
			  	      				<div class="floatl bluemiddle"></div>
			  	      				<div class="floatl blueright"></div>
			  	      				<div class="clear"></div>
		  	      			</div>-->		
		  	      			<!--<div class="floatla">
		  	      				<div class="brownleft" style="float:left;"></div>
	      	      				<div class="brownmiddle" style="float:left;"></div>
	      	      				<div class="brownright" style="float:left;"></div>
	      	      				<div class="clear"></div>
		  	      			</div>-->
		  	      			<div class="clear"></div>
		  			</div>
		  			<div class="clear"></div>
		  			<div class="dbr"></div>
		  				<div class="buttons_block">
                                <div class="button_link"><a href="<?php echo config_item('base_url');?>jewelry/search" onclick="$.facebox.close()">Back to search</a></div>
                                <div class="button_link"><a href="#" onclick="addtocart(<?php echo "'".$addoption."'";?>,'<?php echo $lot;?>','<?php echo $sidestone1['lot'];?>','<?php echo (empty($sidestone2['lot']) ? "false" : $sidestone2['lot']) ;?>',<?php echo $settingsid;?>,'<?php echo $totalprice;?>')">Add to basket</a></div>
                            </div>
                    	<div class="clear"></div><br><br>
                        <div><b>Diamond Price:</b>$<?php echo number_format($diamondprice,0);?>(<small><i>including both diamonds</i></small>)</div><br>
                        
		  			<div>
		  			
		  				
		  				<table class="dmjewelry_table">
		  				 	<tr class="tablaheader">
		  						<td>Details</td>
		  						<td>Diamond 1</td>
		  						<td>Diamond 2</td>
		  					</tr>
		  					
		  					
		  					<tr class="brownback">
		  						<td>Stock No.</td>
		  						<td><?php echo $sidestone1['lot']?></td>
		  						<td><?php echo $sidestone2['lot']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Price</td>
		  						<td>$<?php echo number_format($sidestone1['price'],2)?></td>
		  						<td>$<?php echo number_format($sidestone2['price'],2)?></td>
		  					</tr>
		  					<tr class="brownback" style="display:none;">
		  						<td>Price per carat:</td>
		  						<td><?php echo $sidestone1['pricepercrt']?></td>
		  						<td><?php echo $sidestone2['pricepercrt']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Carat weight:</td>
		  						<td><?php echo $sidestone1['carat']?></td>
		  						<td><?php echo $sidestone2['carat']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Cut:</td>
		  						<td><?php echo $sidestone1['cut']?></td>
		  						<td><?php echo $sidestone2['cut']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Color:</td>
		  						<td><?php echo $sidestone1['color']?></td>
		  						<td><?php echo $sidestone2['color']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Clarity:</td>
		  						<td><?php echo $sidestone1['clarity']?></td>
		  						<td><?php echo $sidestone2['clarity']?></td>
		  					</tr>
		  					<tr><td colspan="3"><br></td> </tr>
		  					<tr class="brownback">
		  						<td>Depth %:</td>
		  						<td><?php echo $sidestone1['Depth']?></td>
		  						<td><?php echo $sidestone2['Depth']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Table %:</td>
		  						<td><?php echo $sidestone1['TablePercent']?></td>
		  						<td><?php echo $sidestone2['TablePercent']?></td>
		  					</tr>		  					
		  					<tr class="brownback">
		  						<td>Polish:</td>
		  						<td><?php echo $sidestone1['Polish']?></td>
		  						<td><?php echo $sidestone2['Polish']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Symmetry:</td>
		  						<td><?php echo $sidestone1['Sym']?></td>
		  						<td><?php echo $sidestone2['Sym']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Girdle:</td>
		  						<td><?php echo $sidestone1['Girdle']?></td>
		  						<td><?php echo $sidestone2['Girdle']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Culet:</td>
		  						<td><?php echo $sidestone1['Culet']?></td>
		  						<td><?php echo $sidestone2['Culet']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Fluorescence:</td>
		  						<td><?php echo $sidestone1['Flour']?></td>
		  						<td><?php echo $sidestone2['Flour']?></td>
		  					</tr>
		  					<tr class="brownback">
		  						<td>Measurements:</td>
		  						<td><?php echo $sidestone1['Meas']?> mm</td>
		  						<td><?php echo $sidestone2['Meas']?> mm</td>
		  					</tr>
		  					
		  				</table>		  			
		  			</div>
			   
	  	
	  	</div>
   <div class="clear"></div>
 <div class="bodybottom"></div>
</div>
</article>
<div class="clear"></div>