 <?php
 
 
 $details = $products;
 $link  = config_item('base_url'); 
 $image1 = $link."stuller_image/".trim($details["image"]);
 $des = $details['Description'];
 $des_array = explode(" ",trim($des)); 
 $model = $des_array[0];
 $f_des =trim(str_replace($model,"",$des));
 
 ?>
 <script language="javascript" src="jquery.js"></script>
<script language="javascript" src="modal.popup.js"></script>
<div  class="pad10">


   <h3 style="color:#FFFFFF;"><?php ///echo $details['Description']?>
   
   
   Unmatched in pure elegance, this piece of jewelry model number <?echo $model." ";?>
is set in  a substantial <?php echo $f_des;?>, 
a truly iconic gift shipped to you directly from diamondengagementringsnyc.com
   
   
   </h3>
   
   
   <div class="pad10">
     <h3 class="newtileheader"><? echo($details["level1"]) ?></h3><br />
      
	        
	        <table class="popup"  width="100%"> 
             <tr >
	        	<td >
                
                    <img src="<? echo $image1;  ?>" width="250px" height="250" />
                
                </td>
				<td>
				   <button class="search_but"  onclick="senditem('<?php echo $details["ItemNumber"]; ?>')" type="button" id="back" name="back" >Send to eBay</button>
				   <button class="search_but" type="button" id="back" name="back" style="disable:disable;">Send to Amazon</button>
                </td>
	        </tr>
			<tr><td colspan="2" style="margin-top:10px;">&nbsp;</td></tr>
			<tr>
			    <td>
				<table>
				<tr>
			    <?
				   if($details["thumb1"]!="")
				  
				 {	
				  $thumb1 = $link."stuller_image/".trim($details["thumb1"]);
				   ?>
						 <td style="margin-right:10px;"><img  src='<?php echo $thumb1;?>' ></td>
				 <?
			       }?>
				 
				
				    <?
				   if($details["thumb2"]!="")
				  
				 {	
				  $thumb2 = $link."stuller_image/".trim($details["thumb2"]);
				   ?>
						 <td style="margin-right:10px;"><img  src='<?php echo $thumb2;?>' ></td>
				 <?
			       }?>
				    <?
				   if($details["thumb3"]!="")
				  
				 {	
				  $thumb3 = $link."stuller_image/".trim($details["thumb3"]);
				   ?>
						 <td style="margin-right:10px;"><img  src='<?php echo $thumb3;?>' ></td>
				 <?
			       }?>
				       <?
				   if($details["thumb4"]!="")
				  
				 {	
				  $thumb4 = $link."stuller_image/".trim($details["thumb4"]);
				   ?>
						 <td style="margin-right:10px;"><img  src='<?php echo $thumb4;?>' ></td>
				 <?
			       }?>
				        <?
				   if($details["thumb5"]!="")
				  
				 {	
				  $thumb5 = $link."stuller_image/".trim($details["thumb5"]);
				   ?>
						 <td style="margin-right:10px;"><img  src='<?php echo $thumb5;?>' ></td>
				 <?
			       }?>
				 </tr>
				 </table>
				 </td>
				 <td>&nbsp;</td>
                  				 
			</tr>
	        <tr >
	        	<td  colspan="2" width="100%" class="infobox01 pad2" >Description</td>
	        </tr>
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10">
		         		    <?php //echo $details['Description'];?>
							   Unmatched in pure elegance, this piece of jewelry model number <?echo $model." ";?>
								is set in  a substantial <?php echo $f_des;?>, 
								a truly iconic gift shipped to you directly from diamondengagementringsnyc.com
								   
								   
				</p>

														
													
	        	</td>
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
                     ii.      The ring Will arrive in 2-4 Business Days.<font color="red">Arrival depends on the specific diamond selected.</font><br />

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


																	<div class="floatr blurleft"></div>
																	<div class="clear"></div>
															</div>
												      		<div class="clear"></div>
														</div>
		        </td>
	        </tr>
      </table>
	     
      											
						    
     		
				
   </div>
</div>
 
  <div  class="pad10">
   <h1  class="hr pageheader">Details ( Price : $ <?php echo number_format($details['RetailPrice'],2);?>) </h1>
   <div class="pad10">
  
   </div>
		         </td> 
		         <td valign="top">
		         	 
						<table>
						       <tr>
						        <td valign="top">
						        		<div class="floatl detailcontainers padl10">
													<div class="floatl">
													<img src="<?php echo config_item('base_url')?>/images/tamal/expand.jpg" id="expand" style="display:none;" onclick="showhide('productdetails', 'true')">
														<img src="<?php echo config_item('base_url')?>/images/tamal/minimize.jpg" id="minimize" onclick="showhide('productdetails', 'false')">
														</div>
													<div  class="infobox01 floatl bigcontainerL">Product Details</div>
													<div class="clear"></div>
													
													<div id="productdetails" style="display:block;">
														<div  class="divheader font12 padt10">Setting information</div>
														<table  cellpadding="0" cellspacing="0" border="0">
															<tbody>
															   
															    <tr>
																	<td  width="120" class="brownback">Level1</td>
																	<td   width="120" class="brownback"><?php echo $details['Level1']; ?></td>
																</tr>
																
																<tr>
																	<td  width="120" class="brownback">Lot #</td>
																	<td  width="120" class="brownback"><?php echo "sk".$details['ItemNumber']; ?></td>
																</tr>
																 
																	 <?php if(isset($details['PrimaryMetalComposition'])){?>
																<tr>
																	<td  width="120" class="brownback">Metal</td>
																	<td  width="120" class="brownback"><?php echo $details['PrimaryMetalComposition'];?><br /></td>
																</tr>
																<?php }?>
																
																
																<?php if(isset($details['series'])){?>
																<tr>
																	<td  width="120" class="brownback">Series</td>
																	<td  width="120" class="brownback"><?php echo $details['Series'];?><br /></td>
																</tr>
																<?php }?>
																
																<?php if(isset($details['Quality'])){?>
																<tr>
																	<td  width="120" class="brownback">Quality</td>
																	<td  width="120" class="brownback">
																	<?php $q_arr =explode("|",$details['Quality']);
																	    
																	 ?>
																	        <select name="Quality">
																		     <?for($i=0;$i<count($q_arr);$i++){?>
																		     <option value="<?=$q_arr[$i];?>"><?=$q_arr[$i];?></option>
																			 <?}?>
																		  </select>
																	
																	<br /></td>
																</tr>
																<?php }?>
																
																 <?php if(isset($details['retail_price'])){?>
																<tr>
																	<td  width="120" class="brownback">Retail Price</td>
																	<td  width="120" class="brownback"><?php echo $details['RetailPrice'];?><br /></td>
																</tr>
																<?php }?>	
																
																 <?php 
																 
																// print_r($details);
																 if(isset($details['MaxSize']) && $details['Level1']=='Jewelry'&& ($details['Level2']=='Wedding & Engagement'|| $details['Level2']=='Rings' )){?>
																 <tr>
																	<td  width="120" class="brownback">Finger Size</td>
																	<td   width="120" class="brownback">
																	    <select name="size">
																		     <?for($i=3;$i<=9;$i++){?>
																		     <option value="<?=$i;?>"><?=$i;?></option>
																			 <?}?>
																		</select>
																	  
																	</td>
																 </tr>
																 <?php }?>
																
															</tbody>
														</table>
														<br>
													</div>
												</div>
						        </td></tr>
						        </table>
						        			
						 
		         </td>
	        </tr>
	        </table>
	        
	        <table width="100%"> 
	        <tr>
	        <td>  
				 
				<p  class="detaails brownback pad10">
		         		    <?php echo $details['descr'];?>
				</p>
		 
														
													
	        	</td>
	        </tr>
	         </table>
	         <br>		
   </div>
</div>
 