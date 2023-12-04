<div>

<?php if($action == 'add' || $action == 'edit'){
                
	       	$this->load->helper('custom','form');

						
			$parentidoptions = '<option value=""> Select Brand </option>';
			 
			
			 if(isset($details)){
                	  
				$category_label         = isset($details['category_label']) ? $details['category_label'] 		: '';
				$category_description   = isset($details['category_description']) ? $details['category_description'] 	:'';
                                
				$image                  = isset($details['image']) ? $details['image'] 	: '';
							   
			        if(!empty ($details['segmentparam'])){

                                    foreach ($details['segmentparam'] as $key => $value ){
                                        $segment .= '/'.$key.'/'.$value;
                                    }
                                    $ebay_cat_id	        = end($details['segmentparam']);

                                }
			 }else{
			 	$category_name 	=  '';
				$category_description 	= '';
				$image 		= '';
			 }
			  		$id         	= isset($ebay_cat_id) ? $ebay_cat_id : '';

			
			?>
			<div>
					<h1 class="hbb" align="center">
								<?=ucfirst($action) ?> Category
					
					</h1>

                                         <?php
                                              if(!empty ($details['parent_label'])){
                                                  echo "<h1>{$details['parent_label']}</h1>";
                                              }

                                              if(!empty ($details['child_label'])){
                                                  echo "<h1>{$details['child_label']}</h1>";
                                              }


                                         ?>
					
					<br/>
					<div align="center">
					 
						 <form name="" action="<?php echo config_item('base_url');?>admin/category/<?=$details['urlaction'];?>/<?php echo $action; echo $segment;?>" method="post" enctype="multipart/form-data" >
							
						 			<div class="lebelfield floatl">Category Name:</div>
									<div class="inputfield floatl">
											<input type="text" name="category_label" value="<?php echo $category_label;?>" style="width: 390px; height: 20px; padding: 5px;"  />
                                                                                        <input type="hidden" name="ebay_cat_id" value="<?php echo $ebay_cat_id;?>"  /><?php echo form_error('category_label'); ?>
									</div>
									<div class="clear"></div>

									<div class="lebelfield floatl">Parent Category:</div>
									<div class="inputfield floatl">
											<select class="commondropdown" name="parentid" id="parentid" >												
                                                                                            <?php echo '<option value="'.$category['id'].'">'.$category['category_label'].'</option>';?>
											</select> 
																				
									</div>
									<div class="clear"></div>
									
									<div class="lebelfield floatl">Category Description:</div>
									<div class="inputfield floatl">
											<textarea name="category_description" style="width: 400px;height: 60px;"><?php echo $category_description;?></textarea> 
									</div>
									<div class="clear"></div>
								
									<div class="lebelfield floatl">Category Image:</div>
									<div class="inputfield floatl">
											<input type="file" name="image"  />
									<?php if($details['image'] != '') {
										$link = config_item('base_url').$details['image'];
										echo $field	.=  "<a class=\"blue\"  href='".$link."' target='_blank' >Click Here to View</a>";
									} ?>
									</div>
									<div class="clear"></div>		
									
									
						 
						 
						 	
						 
						 	<table 	 border="0" align="left" width="100%"/>
							<!--      
							   
							 
							  
							  
							  <tr>
								<td colspan="2"> 
									<table width="100%"><tr><td valign="top">
												<fieldset style="background: #fff;">
												<legend>Small Image ( 80 x 80 px)</legend>
													<center>
												 <?php  {
												  
												    	if(file_exists(config_item('base_path').'images/watches/'.$small_img) && $small_img !='')echo '<img width="120" height="120" src="'.config_item('base_url').'images/watches/'.$small_img.'" style="width: 80px; height: 80px;"><br />';
												    	else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
												    	echo '<small>Upload new image will replace the old image</small><br />'; 
												    }   
												 ?>
													<input type="file" name="image_small" id="file1" value=""  /> 
													</center>
												</fieldset>	
											</td>
										<td>
												<fieldset style="background: #fff;">
												<legend>Big Image( 80 x 80 px)</legend>
													<center>
												 <?php  {
												  
												    	if(file_exists(config_item('base_path').'images/rings/carat'.$carat_image) && $carat_image !='')echo '<img src="'.config_item('base_url').'images/rings/carat'.$carat_image.'" style="width: 80px; height: 80px;"><br />';
												    	else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
												    	echo '<small>Upload new image will replace the old image</small><br />'; 
												    }   
												 ?>
													<input type="file" name="big_image" id="big_image" value=""  /> 
													</center>
												</fieldset>	
										</td>
									  </tr>
							  		</table>
							  </td></tr> -->
							  
							  
							   <tr>
								<td colspan="2">
								</td>
							  </tr>
							  <tr>
							  <td></td><td><br>
							   <input type="submit"  name="<?=$action;?>btn" value="<?=ucfirst($action);?>" class="adminbutton"  /> <a href="<?php echo config_item('base_url');?>admin/<?=$details['urlaction'];?><?php echo $segment;?>" class="adminbutton"> Cancel</a>
										 
							  </td>
							  </tr>
							</table>
							 
						</form>
					</div>
			</div>
			<?php }else{?>
			<div>
					<table id="results" style="display:none; "></table>
			</div>
			<?php }?>
</div>
 

 
