<article class="container_12">
<div>
  		<div class="bodytop"></div>
	  	<div class="mainPageHeading"><h2>Build Your Own Diamond Jewelry</h2></div>
        <div class="bodymid2">
	  	
	  		<div class="topdiv">
				<!--<p class="txtcenter"></p>-->
				<?php //echo $top_ads;?>
			</div>
            <div class="tabsBg"><?php echo $tabhtml;?></div>
			<div class="dbr"></div>
			<div class="clear"></div><br>
			<div class="divheader txtright pad10">Choose Diamond For Earring</div>
			<div class="dbr"></div> 
			
			<div>	

					  <div class="floatl bigcontainerL">
			  				<center> <img src="<?php echo config_item('base_url')?>/images/ruman/small_diamond stud earrings.jpg"></center>
			  		  </div>			
			  		  <div class="floatl bigcontainerR">
						      <p class="fakaline pad10">Enter a price range for your diamond pair, then proceed to further narrow your search with the four Cs. To speak to an experienced jewelry professional, call <? echo $this->config->item('site_owner_number')?></p>						     						     
				      </div>  		  
				      <div class="clear"></div> 
				       
			</div>
			
			<div class="hr"></div>
			 
			
			<form action="<?php echo config_item('base_url');?>diamonds/search/true/false/toearring/false/<?php echo $settingsid;?>" method="POST">
				      <div>      
				            
				            <br>
				            <!--<div>
					            <div class="floatl  w50px vsmall txtcenter"><label for="B">Round<img src="<?php echo config_item('base_url');?>images/diamonds/round.jpg" alt="round" /></label><input type="checkbox" value="round" name="diamondshape" id="B" onclick="toggleopacity(this, false)"></div>					      		
					      		<div class="floatl  w50px vsmall txtcenter"><label for="E">Emerald<img src="<?php echo config_item('base_url');?>images/diamonds/emerald.jpg" alt="emerald" /></label><input type="checkbox" value="emerald" name="diamondshape" id="E" onclick="toggleopacity(this, false)"></div>
					      		<div class="floatl  w50px vsmall txtcenter"><label for="PR">Princess<img src="<?php echo config_item('base_url');?>images/diamonds/princess.jpg" alt="princess" /></label><input type="checkbox" value="princess" name="diamondshape" id="PR" onclick="toggleopacity(this, false)"></div>
					      		<div class="clear"></div>
				      		</div>  -->		
				      </div>
				      
				        
				       		      			
				      <div>
				            <div class="dbr"></div>
				            <p class="newtileheader fakaline pad10">Select Price range(Optional)</p>
				            <br>
				            <span class="floatl">
				            	Price From <input type="text" name="minprice" id='minprice' value="<?php echo $minprice;?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'maxprice',<?php echo $minprice, ",",$maxprice.",'min'";?>)">-to-<input type="text" name="maxprice" id="maxprice" value="<?php echo $maxprice; ?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'minprice',<?php echo $minprice, ",",$maxprice.",'max'";?>)"><input type="submit" value="Search" class="searchdiamondbtn" name="searchdiamonds" title="Start Search">
				            </span>
				            <span class="floatl">
				            	<span> we have over <b> round diamonds ranging</b> $<?php echo number_format($minprice);?> to $<?php echo number_format($maxprice);?> in price </span>
				            </span>
				             <div class="clear"></div>
				      </div>
				      
		      		  <div class="dbr hr"></div>
		      	      <br /><br />
		      	      
		      	      <!--<div class="txtcenter">
		      			<input type="submit" value="Search" class="searchdiamondbtn" name="searchdiamonds" title="Start Search">		      			
		      		</div>-->  
		      		<div class="dbr"></div>
		      		<div class="hr"></div>	      	      
		      	     
		    </form>
			
		</div>
	  	<div class="bodybottom"></div>
</div>
</article><div class="clearfix"></div>
