<div  class="pad10">
   <h1 style="color:#FFFFFF;" class="hr pageheader">Jewellery Detail ( Price : $<?php echo $details['data'][0]['MSRP']; ?>) </h1>
   <div class="pad10">
     <h3 class="newtileheader"><?php echo $details['data'][0]['Metal_Desc ']; ?></h3><br />
	<form id="form1" name="form1" method="post" action="<?php echo config_item('base_url') ?>jewelleries/addtoshoppingcart">
      <table class="popup"  width="100%"> 
             <tr >
	        	<td colspan="2" width="100%" >
			<?php	if($details['data'][0]['ImageLink_500']!=""){
				$src="http://".$details['data'][0]['ImageLink_500'];
				}
				else{
				$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
				}?>
                 <img src="<?php echo $src; ?>" style="height:210px;width:325px;" alt="Noimage"/>                </td>
	        </tr>
	        <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Price : </strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         <input type="radio" name="price" value="<?php echo $details['data'][0]['MSRP']?>,normal">Best : <?php echo $details['data'][0]['MSRP']; if($details['data'][0]['ezstatus'] == true){ ?><br>
				<input type="radio" name="price" value="<?php $ez3 = $details['data'][0]['MSRP']+(($this->config->item('ez3value')*$details['data'][0]['MSRP'])/100); echo number_format($ez3,2)?>,3EZ">3EZ : $ <?php echo number_format($ez3,2);?><br>
				<input type="radio" name="price" value="<?php $ez5 =  $details['data'][0]['MSRP']+(($this->config->item('ez5value')*$details['data'][0]['MSRP'])/100); echo number_format($ez5,2); ?>,5EZ">5EZ :$ <?php echo number_format($ez5,2); }?>				</p>	        	</td>
	        </tr><input type="hidden" name="prid" value="<?php echo $details['data'][0]['qg_id'];?>">
	        <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Description:</strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         		   <?php echo $details['data'][0]['Description']; ?>				</p>	        	</td>
	        </tr>
	         <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Attributes:</strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         		   <?php echo $details['data'][0]['Attributes']; ?>				</p>	        	</td>
	        </tr>
	        <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>ProductLine:</strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         		   <?php echo $details['data'][0]['ProductLine']; ?>				</p>	        	</td>
	        </tr>
	        <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>MSRP:</strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         		   <?php echo $details['data'][0]['MSRP']; ?>				</p>	        	</td>
	        </tr>
	        
	         <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Metal_Price:</strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         		   <?php echo $details['data'][0]['Metal_Price']; ?>				</p>	        	</td>
	        </tr>
	        
	         <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Qty_Avail:</strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         		   <?php echo $details['data'][0]['Qty_Avail']; ?>				</p>	        	</td>
	        </tr>
	         <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Metal_Desc:</strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         		   <?php echo $details['data'][0]['Metal_Desc']; ?>				</p>	        	</td>
	        </tr>
	        <tr>
	          <td>&nbsp;</td>
        </tr>
	        <!--  <tr>
	          <td><table width="100%" border="0">
                <tr>
                  <td width="28%"><strong>Seller Name:</strong></td>
                  <td width="72%"><p  class="detaails brownback pad10" style="padding:0px 10px 0;"><?php //if($userdetail['data'][0]['name']!="") { echo $userdetail['data'][0]['name']; } else { echo "Not available";} ?></p></td>
                </tr>-->

              </table></td>
        </tr>
	         </table>
	         <br>
			  <table  width="100%">
	        <tr >
	        	<td style="width:20px;"><img src="<?php echo config_item('base_url')?>/images/ruman/engagement/truck.jpg" alt="truck"></td>
	        	<td   class="infobox01 pad2" >Shipping Information </td>
	       </tr>
	       <tr>
	       <td  colspan="2" class="brownback pad10">
		        <p  class="pad10">
		              i.      Fed-x <br>
                     ii.      The ring Will arrive in 2-4 Business Days.<font color="red">Arrival depends on the specific item selected. All orders are custom made.</font><br />

                                                            iii.      always offers Free Shipping via FedEX.
				 <a href="<?php echo config_item('base_url');?>site/page/freefedEx">
				<b >FedEx Priority Overnight</b></a> <br><br>
				</p>
	        </td>
	        </tr>
	        <tr>
		        <td colspan="2" align="right"><input type="submit" name="submit" id="submit" value="Add to Basket" /><br> 
		        										<div>
															<div class="floatr w100px">
																	<div class="floatr blueright"></div>
																	<div class="floatr bluemiddle"></div>
																	<div class="floatr blurleft"></div>
																	<div class="clear"></div>
															</div>
															<div class="floatl w100px">
																	<div class="floatr brownright"></div>
												      				<div class="floatr brownmiddle"><a  href="#" onclick="$.facebox.close()">back to search</a></div>
												      				<div class="floatr brownleft"></div>
												      				<div class="clear"></div>
												      		</div>
												      		<div class="clear"></div>
														</div>
		        </td>
	        </tr>
	        
      </table>
	     </form>
      											
						    
     		
				
   </div>
</div>
 
