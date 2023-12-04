<div id="main-body-a">
<div class="bodytop"></div>
<div class="mainPageHeading"><h2>Build Your Own Pendant</h2></div>
<article class="container_12"> 
<div class="">
  <div class="bodymid2">
  
  			<div class="topdiv">
				<?php //echo $top_ads;?>
			</div>
			<div class="dbr"></div>
  			 
  
  			<?php $img = file_exists($details['small_image']) ? config_item('base_url').$details['small_image'] : config_item('base_url').'images/rings/noimage_sm.jpg';  ?>
  			<div class="column floatl">
  					<center> <img src="<?php echo $img;?>" width="250px"></center>
  			</div>
  			  			
  			<div class="column floatl">
	  			 <p class="newtileheader">Pendant</p><br>
	  			 <p><?php echo $details['description'];?></p>
	  			 <br>
  			  <p>
	  			 
	  			 		<table width="300">
	  			 				<tr>
	  			 						<td><b>Diamond Price:</b></td>
	  			 						<td align="right">$<?php echo floatval($diamondprice);?></td>
	  			 				</tr>
	  			 				<tr>
	  			 						<td><b>Settings Price:</b></td>
	  			 						<td align="right">$<?php echo floatval($settingsprice);?></td>
	  			 				</tr>
	  			 				<?php if($side1price != 0 || $side2price != 0){?>
	  			 				<tr>
	  			 						<td><b>Stone1 Price:</b> </td>
	  			 						<td align="right">$<?php echo floatval($side1price);?></td>
	  			 				</tr>
	  			 				<tr>
	  			 						<td><b>Stone2 Price:</b></td>
	  			 						<td align="right">$<?php echo floatval($side2price);?></td>
	  			 				</tr>
	  			 				<?php }?>
	  			 				<tr>
	  			 						<td colspan="2"> </td> 
	  			 				</tr>
	  			 				<tr>
	  			 						<td><b>Total:</b></td>
	  			 						<td align="right">$<b><?php echo floatval($totalprice);?></b></td>
	  			 				</tr>
	  			 				<tr>
	  			 				  <td colspan="2"><br><div style="float:left; width:50%; margin-right:0px;">
                            <a href="<?php echo $nexturl;?>" onclick="<?php echo ($nexturl == '#') ? $onclickfunction : '';?>" class="linkButton">Add To Basket</a>                           
                            </div>
                            <div><a href="#" onclick="$.facebox.close()" class="linkButton">back to search</a></div>
                            <div class="clear"></div>
                            </td>
		 				  </tr>
	  			 		</table>
	  			 
	  			 </p>
	  			  
  			  <div class="dbr"></div>
	  			  
  			</div>
  			<div class="clear"></div>
  
  
   </div>
   <div class="clear"></div>
 <div class="bodybottom"></div><div class="clearfix"></div>
</div>
</article>
</div>
<div class="clear"></div>