<?php $pth = substr(FCPATH,0,-10); $lotno =  ($this->session->userdata('mydiamondid')) ? $this->session->userdata('mydiamondid') : '';?> 

<?php
	//print_r($details);
?>
<div class="pad10">
   <h1 class="hr pageheader">Ring Details ( Price : $<?php echo $details['price']?>) </h1>
   <div class="pad10">
     <h3 class="newtileheader">Petite Trellis Ring in Platinum</h3><br />
      <table>
	        <tr>
		         <td>
                        <?php
                        $image45 = config_item('base_url') . 'images/rings/icons/45/45degree.jpg';
                        $image90 = config_item('base_url') . 'images/rings/icons/90/90degree.jpg';
                        $image180 = config_item('base_url') . 'images/rings/icons/180/180degree.jpg';

                        $image45_bg = config_item('base_url') . 'images/rings/icons/45/45.jpg';
                        $image90_bg = config_item('base_url') . 'images/rings/icons/90/90.jpg';
                        $image180_bg = config_item('base_url') . 'images/rings/icons/180/180.jpg';

                        $flash1 = config_item('base_url') . 'flash/45.swf';
                        $flash2 = config_item('base_url') . 'flash/90.swf';
                        $flash3 = config_item('base_url') . 'flash/180.swf';

                        if (count($flashfiles) > 0) {
                            if ($flashfiles['image45']) {
                                $image45 = 'images/rings/icons/45' . $flashfiles['image45'];
                                $image45 = (file_exists($pth.'/'. $image45)) ? config_item('base_url') . $image45 : config_item('base_url') . 'images/rings/icons/45/45degree.jpg';
                            }
                            if ($flashfiles['image90']) {
                                $image90 = 'images/rings/icons/90' . $flashfiles['image90'];
                                $image90 = (file_exists($pth.'/'. $image90)) ? config_item('base_url') . $image90 : config_item('base_url') . 'images/rings/icons/90/90degree.jpg';
                            }

                            if ($flashfiles['image180']) {
                                $image180 = 'images/rings/icons/180' . $flashfiles['image180'];
                                $image180 = (file_exists($pth.'/'. $image180)) ? config_item('base_url') . $image180 : config_item('base_url') . 'images/rings/icons/180/180degree.jpg';
                            }

                            if ($flashfiles['image45_bg']) {
                                $image45_bg = 'images/rings/icons/45' . $flashfiles['image45_bg'];
                                $image45_bg = (file_exists($pth.'/'. $image45_bg)) ? config_item('base_url') . $image45_bg : config_item('base_url') . 'images/rings/icons/45/45.jpg';
                            }

                            if ($flashfiles['image90_bg']) {
                                $image90_bg = 'images/rings/icons/90' . $flashfiles['image90_bg'];
                                $image90_bg = (file_exists($pth.'/'. $image90_bg)) ? config_item('base_url') . $image90_bg : config_item('base_url') . 'images/rings/icons/90/90.jpg';
                            }

                            if ($flashfiles['image180_bg']) {
                                $image180_bg = 'images/rings/icons/180' . $flashfiles['image180_bg'];
                                $image180_bg = (file_exists($pth.'/'. $image180_bg)) ? config_item('base_url') . $image180_bg : config_item('base_url') . 'images/rings/icons/180/180.jpg';
                            }

                            if ($flashfiles['flash1']) {
                                $flash1 = $flashfiles['flash1'];
                                $flash1 = (file_exists($pth.'/'. $flash1)) ? config_item('base_url') . $flash1 : config_item('base_url') . 'flash/45.swf';
                            }

                            if ($flashfiles['flash2']) {
                                $flash2 = $flashfiles['flash2'];
                                $flash2 = (file_exists($pth.'/'. $flash2)) ? config_item('base_url') . $flash2 : config_item('base_url') . 'flash/90.swf';
                            }

                            if ($flashfiles['flash3']) {
                                $flash3 = $flashfiles['flash3'];
                                $flash3 = (file_exists($pth.'/'. $flash3)) ? config_item('base_url') . $flash3 : config_item('base_url') . 'flash/180.swf';
                            }

                            /* 	if(isset($flashfiles) & is_array($flashfiles)){
                              $flash1 = (file_exists(config_item('base_path').$flashfiles['flash1']) && ($flashfiles['flash1'] != '')) ? $flashfiles['flash1'] : $flash1;
                              $flash2 = (file_exists(config_item('base_path').$flashfiles['flash2']) && ($flashfiles['flash2'] != '')) ? $flashfiles['flash2'] : $flash2;
                              $flash3 = (file_exists(config_item('base_path').$flashfiles['flash3']) && ($flashfiles['flash3'] != '')) ? $flashfiles['flash3'] : $flash3;

                              $image45 = ((file_exists(config_item('base_path').'images/rings/icons/45/'.$flashfiles['image45']))  && $flashfiles['image45'] !='') ? $flashfiles['image45'] : $image45;
                              $image90 = ((file_exists(config_item('base_path').'images/rings/icons/90/'.$flashfiles['image90']))  && $flashfiles['image90'] !='') ? $flashfiles['image90'] : $image90;
                              $image180 = ((file_exists(config_item('base_path').'images/rings/icons/180/'.$flashfiles['image180']))  && $flashfiles['image180'] !='') ? $flashfiles['image180'] : $image180;

                              $image45_bg = ((file_exists(config_item('base_path').'images/rings/icons/45/'.$flashfiles['image45_bg']))  && $flashfiles['image45_bg'] !='') ? $flashfiles['image45_bg'] :  '/'.$image45_bg;
                              $image90_bg = ((file_exists(config_item('base_path').'images/rings/icons/90/'.$flashfiles['image90_bg']))  && $flashfiles['image90_bg'] !='') ? $flashfiles['image90_bg'] : '/'.$image90_bg;
                              $image180_bg = ((file_exists(config_item('base_path').'images/rings/icons/180/'.$flashfiles['image180_bg']))  && $flashfiles['image180_bg'] !='') ? $flashfiles['image180_bg'] : '/'.$image180_bg;

                              $image45_bg = 'images/rings/icons/45'.$image45_bg;
                              $image90_bg = 'images/rings/icons/90'.$image90_bg;
                              $image180_bg = 'images/rings/icons/180'.$image180_bg;
                             */
                        }
                        ?>
                        
				         <div class="detailcontainer " style="width:395px"> 
							 
							<table >
							      <tr>
							        <td style="width: 140px;" align="right">
                    <img src="<?= $image180 ?>" onclick="writebigimg2(180,'<?= $image180_bg ?>')" alt="180 degree" style="margin: 0px 5px 5px 5px;width:58px;height:58px;border:1px solid #0B81A5;"> 
                    <img src="<?= $image90 ?>" onclick="writebigimg2(90,'<?= $image90_bg ?>')" alt="90 degree"  style="margin: 5px;width:58px;height:58px;border:1px solid #0B81A5;"> 
                    <img src="<?= $image45 ?>" onclick="writebigimg2(45,'<?= $image45_bg ?>')" alt="45 Degree" style="margin: 5px;width:58px;height:58px;border:1px solid #0B81A5;">
							        </td>
							        <td style="width: 250px;" align="left">
							            <div id="flashanimation"></div>
							             
                <script type="text/javascript">
                    // <![CDATA[
											 
                    function writeswf(swfid){
                        if(swfid == 1){
                            so = new SWFObject("<?= $flash2 ?>", "test", "245", "195", "8", "#fff");
                            so.addParam("wmode", "transparent");
                            so.write("flashanimation");
																			 
                        }	
                        if(swfid == 2){
                            so = new SWFObject("<?= $flash3; ?>", "test", "400", "295", "8", "#fff");
                            so.addParam("wmode", "transparent");
                            so.write("bigflash");
																			 
                        }
																	
																	 
                    }
                    writeswf(1); 
											
											
                    // ]]>
                </script>
                                        <script type="text/javascript">
										// <![CDATA[
			     function setSize()
				 {
				    var dsize = $("#dsize").val();
					var metaltype = $("#metaltype").val();
					 window.location.href = "<?php echo config_item('base_url')?>engagement/addtobasket/<?php echo $centreid;?>/<?php echo $stockno;?>/tothreestone/<?php echo $sidestoneid1;?>/<?php echo $sidestoneid2;?>/"+dsize+"/"+metaltype;
					//return false;
					
				 }// ]]>
			 </script>
							        </td>
							      </tr>
							</table>
						</div>
		         </td>
		         <td valign="top">
		         		<p class="detaails">
		         		    <?php echo $details['description'];?>
							
						</p>
						<p>
						<table>
						       <tr>
						        <td valign="top">
						        		<div class="floatl detailcontainers padl10">
													<div class="floatl">
													<img src="<?php echo config_item('base_url')?>/images/tamal/expand.jpg" alt="expand" id="expand" style="display:none;" onclick="showhide('productdetails', 'true')">
														<img src="<?php echo config_item('base_url')?>/images/tamal/minimize.jpg" id="minimize" onclick="showhide('productdetails', 'false')" alt="minimize">
														</div>
													<div class="infobox01 floatl bigcontainerL">Product Details</div>
													<div class="clear"></div>
													
													<div id="productdetails" style="display:block;">
														<div class="divheader font12 padt10">Setting information</div>
														<table cellpadding="0" cellspacing="0" border="0">
															<tbody>
																<tr>
																	<td width="120" class="brownback">Stock number</td>
																	<td width="120" class="brownback"><?php echo $details['stock_number']; ?></td>
																</tr>
																 <?php if(isset($details['section'])){?>
																<tr>
																	<td  width="120" class="brownback">Section</td>
																	<td  width="120" class="brownback"><?php echo $details['section'];?><br /></td>
																</tr>
																<?php }?>
																	 <?php if(isset($details['style'])){?>
																<tr>
																	<td  width="120" class="brownback">Style</td>
																	<td  width="120" class="brownback"><?php echo $details['style'];?><br /></td>
																</tr>
																<?php }?>
																
																
																<?php if(isset($details['platinum_price'])){?>
																<tr>
																	<td  width="120" class="brownback">Platinum Price</td>
																	<td  width="120" class="brownback"><?php echo $details['platinum_price'];?><br /></td>
																</tr>
																<?php }?>
																<?php if(isset($details['white_gold_price'])){?>
																<tr>
																	<td  width="120" class="brownback">White Gold Price</td>
																	<td  width="120" class="brownback"><?php echo $details['white_gold_price'];?><br /></td>
																</tr>
																<?php }?>
																<?php if(isset($details['yellow_gold_price'])){?>
																<tr>
																	<td  width="120" class="brownback">Yellow Gold Price</td>
																	<td  width="120" class="brownback"><?php echo $details['yellow_gold_price'];?><br /></td>
																</tr>
																<?php }?>
																
																 <?php if(isset($details['diamond_count'])){?>
																<tr>
																	<td  width="120" class="brownback">Diamond Count</td>
																	<td  width="120" class="brownback"><?php echo $details['diamond_count'];?><br /></td>
																</tr>
																<?php }?>
																<tr>
																	<td  width="120" class="brownback">Center Stone Carat:</td>
																	<td width="120" class="brownback"><?php echo $centerStoneDetails['carat'];?><br /></td>
																</tr>
																<tr>
																	<td  width="120" class="brownback">Total Side Carats</td>
																	<td width="120" class="brownback"><?php echo $sideStone1Details['carat'] + $sideStone2Details['carat'];?><br /></td>
																</tr>
																<tr>
																	<td  width="120" class="brownback">Total Ring Diamond Weight:</td>
																	<td width="120" class="brownback"><?php echo $centerStoneDetails['carat'] + $sideStone1Details['carat'] + $sideStone2Details['carat'];?><br /></td>
																</tr>
																<?php if(isset($details['metal'])){?>
																<tr>
																	<td  width="120" class="brownback">Metal</td>
																	<td  width="120" class="brownback">  
																	<select id="metaltype" name="metaltype">
																	    <option value="platinum">Platinum</option>
																		<option value="yellowgold">Yellow Gold</option>
																		<option value="whitegold">White Gold</option>
																  </select></td>
																</tr>
																<?php }?>
																<!--<tr>
																	<td width="120" class="brownback">Available in sizes</td>
																	<td width="120" class="brownback">4-8<br /></td>
																</tr>-->
                                                                <tr>
																	<td width="120" class="brownback">Available Sizes</td>
																  <td width="120" class="brownback">
																  <select id="dsize" name="dsize">
																    <option value="4">4</option>
																	<option value="5">5</option>
																	<option value="6">6</option>
																	<option value="7">7</option>
																	<option value="8">8</option>
																	  </select>
																  </td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
						        </td></tr>
						        </table>
						        			
												
						
						</p>
		         </td>
	        </tr>
	        <tr>
	        	<td colspan="2" width="100%">
	        	      <div class="floatl padl10">
														<div class="clear"></div><br>
														
													
	        	</td>
	        </tr>
	        <tr>
		        <td colspan="2" align="right">
		        										<div>
															<div class="floatr w100px">
																	<div class="floatr blueright"></div>
																	<div class="floatr bluemiddle"><a href="#" onclick="setSize();">Select this ring</a></div>
																	<div class="floatr blurleft"></div>
																	<div class="clear"></div>
															</div>
															<div class="floatl w100px">
																	<div class="floatr brownright"></div>
												      				<div class="floatr brownmiddle"><a href="#" onclick="$.facebox.close()">back to search</a></div>
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
  
