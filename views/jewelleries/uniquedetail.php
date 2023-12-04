<div  class="pad10">
   <h1 style="color:#FFFFFF;" class="hr pageheader">Jewellery Detail ( <div class="jprice" style="color:RED;"><strong>Call  414-810-2050  For Prices</strong> </div>) </h1>
   <div class="pad10">
     <h3 class="newtileheader"><?php echo $details['data'][0]['style_group ']; ?></h3><br />
      <table class="popup"  width="100%"> 
             <tr >
	        	<td colspan="2" width="100%" >
			<?php	if($details['data'][0]['image']!=""){
				$src="http://www.uniquesettings.com".$details['data'][0]['image'];
				}
				else{
				$src="http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";				
				}?>
                 <img src="<?php echo $src; ?>" style="height:210px;width:325px;" />                </td>
	        </tr>
	        <tr >
	        	<td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Description:</strong></td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10" style="color:white;">
		         		   <?php echo $details['data'][0]['style_group']; ?>				</p>	        	</td>
	        </tr>
	      <tr>
	       <td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Available Sizes:</strong></td>
	        </tr>
	        <tr>
	        <td>
	        <?php  echo $details['data'][0]['availblesize'];?>
	        </td>
	        </tr>
	          <tr>
	       <td width="100%"  colspan="2" class="pad2 infobox01" ><strong>Measurements:</strong></td>
	        </tr>
	         <tr>
	        <td>
	        <?php  echo $details['data'][0]['measurements'];?>
	        </td>
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
	        	<td style="width:20px;"><img src="<?php echo config_item('base_url')?>/images/ruman/engagement/truck.jpg"></td>
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
		        <td colspan="2" align="right"><br> 
		        										<div>
															<div class="floatr w100px">
																	<div class="floatr blueright"></div>
																	<div class="floatr bluemiddle"><a  onclick=" addtocart('addjewellery',<?php echo $details['data'][0]['qg_id'];?>,false,false,5124,<?php echo $details['data'][0]['price_website'];?>,4)" href="#">add to basket</a></div>
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
	     
      											
						    
     		
				
   </div>
</div>
 