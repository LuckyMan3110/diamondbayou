<div class="floatl pad05 body">
  		<div class="bodytop"></div>
	  	<div class="bodymid">
	  	
	  		<div class="topdiv">
				<p class="txtcenter">Build Your Own Diamond Jewelry</p>
				<?php echo $top_ads;?>
			</div>
			
			<?php echo $tabhtml;?>
			<div class="dbr"></div>
			
			<div class="divheader txtright pad10">
					Choose Diamond For Earring
			</div>
			<div class="dbr"></div> 
			
			<div>	

					  <div class="floatl bigcontainerL">
			  				<center> <img src="<?php echo config_item('base_url')?>/images/ruman/small_diamond stud earrings.jpg" alt="platinum_01"></center>
			  		  </div>			
			  		  <div class="floatl bigcontainerR">
						      <p class="fakaline pad10">Enter a price range for your diamond pair, then proceed to further narrow your search with the four Cs. To speak to an experienced jewelry professional, call 877.271.0001.</p>						     						     
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
				            	Price From <input type="text" name="minprice" id='minprice' value="<?php echo number_format($minprice,',');?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'maxprice',<?php echo $minprice, ",",$maxprice.",'min'";?>)">-to-<input type="text" name="maxprice" id="maxprice" value="<?php echo number_format($maxprice,','); ?>" class="w100px price" maxlength="9" onchange="checkMinMaxPrice(this,'minprice',<?php echo $minprice, ",",$maxprice.",'max'";?>)">
				            </span>
				            <span class="floatl">
				            	<span> we have over <b><?=number_format($totaldiamond,',') ?> round diamonds ranging</b> in price from $<?=number_format($minprice,',')?> to $<?=number_format($maxprice,',')?>.</span>
				            </span>
				             <div class="clear"></div>
				      </div>
				      
		      		  <div class="dbr hr"></div>
		      	      <br /><br />
		      	      
		      	      <div class="txtcenter">
		      			<input type="submit" value="" class="searchdiamondbtn" name="searchdiamonds" title="Start Search">		      			
		      		</div>  
		      		<div class="dbr"></div>
		      		<div class="hr"></div>
		      		<div>
		      			<p class="newtileheader fakaline pad10">Questions?</p>
		      			<p class="fakaline pad10">If you are having trouble with this application please use our  <a href="#">standard setting finder</a>.</p>
		      		</div>		      	      
		      	     
		    </form>
			
		</div>
	  	<div class="bodybottom"></div>
</div>