<style>
    .floatl smallbox txtcenter

    {

      color:black;
    }
</style>
<div id="main-body-a">
  <div class="bodytop"></div>
  <div class="mainPageHeading"><h2>Build Your Own Earrings</h2></div>
	  <div class="bodymid2">
	  		<div class="topdiv">
				<?php //echo $top_ads;?>
			</div>	 
	  		
	  		<div class="tabsBg"><?php echo $tabhtml;?></div>
			<div class="clear"></div>
			
			<div class="dbr"></div>
					
			
			<div class="commonheader">1. Select Diamond Shape</div>
	   		<div>
	   		
	   				<table>
	   				<tr>
	   				<td>
			   		<div class="floatl smallbox txtcenter" style="width:135px;">
			   				<label for="B"><img src="<?php echo config_item('base_url');?>images/tamal/jewelry/sel_shape_r.jpg"></label> <br>
			   				<input type="radio" name="shape" id="B" onclick="getmetalresult(this);  setdiamondshape(this); genericshowhide('buttondiv','false')" ><label for="B"  class="black">Round</label>
			   		</div>
			   		</td>
			   		<td>
			   		<div class="floatl smallbox txtcenter" style="width:135px; margin-left:20px;">
			   				<label for="PR"><img src="<?php echo config_item('base_url');?>images/tamal/jewelry/sel_shape_p.jpg"></label> <br>
			   				<input type="radio" name="shape" id="PR" onclick="getmetalresult(this);  setdiamondshape(this); genericshowhide('buttondiv','false')"><label for="PR"  class="black">Princess-Cut</label> 
			   		</div>
			   		</td>
			   		</tr></table>
			   		
			   		
	   		<!--
			   		<div class="floatl smallbox txtcenter">
			   				<label for="B"><img src="<?php echo config_item('base_url');?>images/tamal/jewelry/sel_shape_r.jpg"></label> <br>
			   				<input type="radio" name="shape" id="B" onclick="getmetalresult(this);  setdiamondshape(this); genericshowhide('buttondiv','false')" ><label for="B">Round</label>
			   		</div>
			   		<div class="floatl smallbox txtcenter">
			   				<label for="PR"><img src="<?php echo config_item('base_url');?>images/tamal/jewelry/sel_shape_p.jpg"></label> <br>
			   				<input type="radio" name="shape" id="PR" onclick="getmetalresult(this);  setdiamondshape(this); genericshowhide('buttondiv','false')"><label for="PR">Princess-Cut</label> 
			   		</div>
			   		<div class="floatl smallbox txtcenter" style="display:none">
			   				<label for="E"><img src="<?php echo config_item('base_url');?>images/tamal/jewelry/sel_shape_as.jpg"></label> <br>
			   				<input type="radio" name="shape" id="E" onclick="getmetalresult(this);  setdiamondshape(this); genericshowhide('buttondiv','false')"><label for="E"> Emerald-Cut</label> 
			   		</div>-->
			   		<div class="clear"></div>
	   		</div>
	   		 
	   		<div id="searchresult"> </div>
			<div class="dbr"></div>
			
			<form name="pricefrm" action="<?php echo config_item('base_url')?>jewelry/searchdiamonds" method="POST">
					<!--<textarea name="hprice"></textarea>	-->
					<input name="hid" id="hid" type="hidden" />  
					<center> 
						 <div id="buttondiv" style="display:none;">
								<div class="floatl"></div> <!-- blurleft-->
								<div class="floatl bluemiddle"><input type="submit" value="add this style to earring" name="submit" class="tbutton" style="float: left; margin-left: 10px;" ></div>
								<div class="floatl"></div><!--blueright-->
								<div class="clear"></div>
						</div> 
					</center>
			
			</form>
	</div>
 <div class="bodybottom"></div><div class="clearfix"></div>
</div>
