<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Master Management</h1>
        <h2 class="">Watches Management</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">PAGES</a></li>
          <li class="active">blankpage</li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix">
    <?php 
		$pth = FCPATH; //substr(FCPATH,0,-10);
	?>
<div>
  <?php if($action == 'add' || $action == 'edit'){
	$this->load->helper('custom','form');
	$shapeoptions = '<option value=""> Select Shape </option>
	<option value="Asscher">Asscher </option>
	<option value="Cushion">Cushion </option>
	<option value="Emerald">Emerald </option>
	<option value="Heart">Heart </option>
	<option value="Marquise">Marquise </option>
	<option value="Oval">Oval </option>
	<option value="Pear">Pear </option>
	<option value="Princess">Princess </option>
	<option value="Radiant">Radiant </option>
	<option value="Round">Round </option>
	';
	
	//$collectionoptions = '<option value=""> Select Collection </option>'.$collectionoptions;			
	$sectionoptions = '<option value=""> Select Section </option>
	<option value="EngagementRings">Engagement Rings </option>
	<option value="Jewelry">Jewelry</option>
	'; 
	
	$metaloptions = '<option value=""> Select Metal </option>
	<option value="Platinum">Platinum </option>
	<option value="WhiteGold">White Gold </option>
	<option value="YellowGold">Yellow Gold </option>
	'; 
	$styleoptions      = '<option value=""> Select Style </option>
	<option value="Sidestones">Side Stones</option>
	<option value="Pave">Pave </option>
	<option value="Solitaire">Solitaire </option>
	<option value="Three Stones">Three stones</option>
	<option value="Wedding Bands">Wedding Bands </option>
	<option value="MatchingSet">Matching Set</option>
	<option value="Anniversary Ring">Anniversary Ring</option>
	<option value="Bridal Set">Bridal Set </option>
	<option value="Channel">Channel</option>
	<option value="Halo">Halo</option>
	';
	
	
	if(isset($details)){
	$name 			= isset($details['name']) 			? $details['name'] 		: '';
	$price 			= isset($details['price']) 			? $details['price'] 		: 0;
	$section 		= isset($details['section']) 		? $details['section'] 		: '';
	$collection   	= isset($details['collection']) 	? $details['collection'] 	: '';
	$carat   		= isset($details['carat']) 			? $details['carat'] 		: '';
	$shape   		= isset($details['shape']) 			? $details['shape'] 		: '';
	$metal   		= isset($details['metal']) 			? $details['metal'] 		: '';
	//	$finger_size   	= isset($details['finger_size']) 	? $details['finger_size'] 	: '';
	$diamond_count  = isset($details['diamond_count']) 	? $details['diamond_count'] : '';
	$diamond_size   = isset($details['diamond_size']) 	? $details['diamond_size'] 	: '';
	$total_carats   = isset($details['total_carats']) 	? $details['total_carats'] 	: '';
	$pearl_lenght  	= isset($details['pearl_lenght']) 	? $details['pearl_lenght'] 	: '';
	$pearl_mm   	= isset($details['pearl_mm']) 		? $details['pearl_mm'] 		: '';
	$semi_mounted   = isset($details['semi_mounted']) 	? $details['semi_mounted'] 	: '';
	$side  			= isset($details['side']) 			? $details['side'] 			: '';
	$description 	= isset($details['description']) 	? $details['description'] 	: '';
	$small_img 		= isset($details['small_image'])   	? $details['small_image'] 	: '';
	$big_img 		= isset($details['big_image'])   	? $details['big_image'] 	: '';
	$carat_image	= isset($details['carat_image']) 	? $details['carat_image'] 	: '';
	$style          = isset($details['style'])			? $details['style'] 		: '';
	$ringtype		= isset($details['ringtype'])		? $details['ringtype'] 		: '';
	$platinum_price	= isset($details['platinum_price'])	? $details['platinum_price'] : '';
	$white_gold_price = isset($details['white_gold_price'])	? $details['white_gold_price'] : '';
	$yellow_gold_price = isset($details['yellow_gold_price']) ? $details['yellow_gold_price'] : '';
	
	
	if(isset($animations)){
	$image45	= isset($animations['image45']) 	? $animations['image45'] : '';
	$image90	= isset($animations['image90']) 	? $animations['image90'] : '';
	$image180	= isset($animations['image180']) 	? $animations['image180'] : '';
	
	$image45_bg	= isset($animations['image45_bg']) 			? $animations['image45_bg'] : '';
	$image90_bg	= isset($animations['image90_bg']) 			? $animations['image90_bg'] : '';
	$image180_bg	= isset($animations['image180_bg']) 	? $animations['image180_bg'] : '';
	
	$animation1 = isset($animations['flash1']) 		? $animations['flash1'] : '';
	$animation2 = isset($animations['flash2']) 		? $animations['flash2'] : '';
	$animation3 = isset($animations['flash3']) 		? $animations['flash3'] : '';
	
	}else {
	$image45 	=  '';
	$image90 	=  '';
	$image180 	=  '';
	
	$image45_bg 	=  '';
	$image90_bg 	=  '';
	$image180_bg 	=  '';
	
	$animation1 =  '';
	$animation2 =  '';
	$animation3 =  '';
	}
	
	
	}else{
	$name 			= '';
	$price 			= 0;
	$section 		= '';
	$collection   	= '';
	$carat   		= '';
	$shape   		= '';
	$metal   		= '';
	$finger_size   	= '';
	$diamond_count  = '';
	$diamond_size   = '';
	$total_carats   = '';
	$pearl_lenght  	= '';
	$pearl_mm   	= '';
	$semi_mounted   = '';
	$side  			= '';
	$description 	= '';
	$small_img 		= '';
	$big_img 		= '';
	$carat_image	= '';
	$style			= '';
	$ringtype		= '';
	$platinum_price = 0;
	$white_gold_price = 0;
	$yellow_gold_price = 0;
	
	$image45 		=  '';
	$image90 		=  '';
	$image180 		=  '';
	
	$image45_bg 	=  '';
	$image90_bg 	=  '';
	$image180_bg 	=  '';
	
	$animation1 	=  '';
	$animation2 	=  '';
	$animation3 	=  '';
	
	}
	$id         	= isset($id) ? $id : '';
	
	?>
  <style>
	.lebelfield
	{
	width:30%;
	float:left;
	margin-left:20%;
	
	}
	.inputfield
	{
	width:50%;float:left;
	
	}
	.floatl
	{
	float:left;
	}
	
	</style>
  <div>
    <h1 class="hbb" align="center">
      <?=ucfirst($action) ?>
      Rings </h1>
    <br/>
    <div >
      <form name="jewelryForm" action="<?php echo config_item('base_url');?>admin/jewelries/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data">
      
      <table class="imgUploadTable">
  <tr>
    <td>Price:</td>
    <td><input type="text" name="price" value="<?php echo $price;?>" maxlength="15" class="price" />
          <?php echo form_error('price'); ?></td>
  </tr>
  <tr>
    <td>Diamond Name:</td>
    <td><input type="text" name="name" value="<?php echo $name;?>" maxlength="15" />
          <?php echo form_error('name'); ?></td>
  </tr>
  <tr>
    <td>Section:</td>
    <td><select class="commondropdown" name="section" id="section" onchange="setcollection(); setringtype()">
            <?php echo makeOptionSelected($sectionoptions , $section);?>
          </select>
          <?php echo form_error('section'); ?></td>
  </tr>
  <tr>
    <td>Collection:</td>
    <td><select class="commondropdown" name="collection" id="collection" onchange="setringtype()">
            <option value="Milano Collection">DL collection</option>
            <?php //echo  makeOptionSelected($collections,$collection);?>
          </select>
          <?php echo form_error('collection'); ?></td>
  </tr>
  <tr>
    <td colspan="2"><div id="typediv" <?php echo ($collection == 'WomensAnniversaryRing' ? 'style="display:block;"' : 'style="display:none;"')?>>
          <div class="lebelfield floatl">Type:</div>
          <div class="inputfield floatl">
            <select class="commondropdown" name="ringtype" id="ringtype">
              <option value="<?php echo $ringtype;?>"><?php echo $ringtype;?></option>
            </select>
            <?php echo form_error('ringtype'); ?> </div>
          <div class="clear"></div>
        </div></td>
  </tr>
  <tr>
    <td>shape:</td>
    <td><select class="commondropdown" name="shape">
              <?php echo makeOptionSelected($shapeoptions , $shape);?>
            </select>
            <?php echo form_error('shape'); ?></td>
  </tr>
  <tr>
    <td>Metal:</td>
    <td><select class="commondropdown" name="metal">
            <?php echo makeOptionSelected($metaloptions , $metal);?>
          </select>
          <?php echo form_error('metal'); ?></td>
  </tr>
  <tr>
    <td>Style:</td>
    <td><select class="commondropdown" name="style">
            <?php echo makeOptionSelected($styleoptions , $style);?>
          </select>
          <?php echo form_error('style'); ?></td>
  </tr>
  <tr>
    <td>Platinum Price:</td>
    <td><input type="text" name="platinum_price" value="<?php echo $platinum_price;?>" maxlength="50"  /></td>
  </tr>
  <tr>
    <td>White Gold Price:</td>
    <td><input type="text" name="white_gold_price" value="<?php echo $white_gold_price;?>" maxlength="50"  /></td>
  </tr>
  <tr>
    <td>Yellow Gold Price:</td>
    <td><input type="text" name="yellow_gold_price" value="<?php echo $yellow_gold_price;?>" maxlength="50"  /></td>
  </tr>
  <tr>
    <td>Diamond Count:</td>
    <td><input type="text" name="diamond_count" value="<?php echo $diamond_count;?>"  /></td>
  </tr>
  <tr>
    <td>Total Side Carat:</td>
    <td><input type="text" name="total_carats" value="<?php echo $total_carats;?>" maxlength="50"  /></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name="description" style="width: 400px;height: 60px;"><?php echo $description;?></textarea></td>
  </tr>
  <tr>
    <td>Small Image ( 80 x 80 px)</td>
    <td><?php  {
	
	if(file_exists($pth.'/images/rings/'.$small_img) && $small_img !='')echo '<img width="120" height="120" src="'.config_item('base_url').'images/rings/'.$small_img.'" style="width: 80px; height: 80px;"><br />';
	else echo '<img src="'.config_item('base_url').'images/rings/noimage.jpg" style="width: 80px; height: 80px;"><br />';
	echo '<small>Upload new image will replace the old image</small><br />'; 
	}   
	?>
                      <input type="file" name="image_small" id="file1" value=""  /></td>
  </tr>
  <tr>
    <td>Gold Image( 80 x 80 px)</td>
    <td><?php  {
	$path = FCPATH; //substr(FCPATH,0,-10);
	if(file_exists($pth.'/images/rings/carat'.$carat_image) && $carat_image !='')echo '<img src="'.config_item('base_url').'images/rings/carat'.$carat_image.'" style="width: 80px; height: 80px;"><br />';
	else echo '<img src="'.config_item('base_url').'images/rings/noimage.jpg" style="width: 80px; height: 80px;"><br />';
	echo '<small>Upload new image will replace the old image</small><br />'; 
	}  
	?>
                      <input type="file" name="carat_image" id="carat_image" value=""  /></td>
  </tr>
  <tr>
    <td>Rings Animations Icons ( 55 x 55 px)</td>
    <td><div><?php  {
	
	if(file_exists($pth.'/images/rings/icons/45/'.$image45) && $image45 !='')echo '<img width="58" height="58" src="'.config_item('base_url').'images/rings/icons/45/'.$image45.'"><br />';
	else echo '<img src="'.config_item('base_url').'images/rings/icons/45/45degree.jpg"><br />';
	echo '<small>Upload new image will replace the old image</small><br />'; 
	}   
	?>
                      <input type="file" name="image45" id="image45" value=""  /></div>
                      <div><?php  {
	
	if(file_exists($pth.'/images/rings/icons/90/'.$image90) && $image90 !='')echo '<img width="58" height="58" src="'.config_item('base_url').'images/rings/icons/90/'.$image90.'"><br />';
	else echo '<img src="'.config_item('base_url').'images/rings/icons/90/90degree.jpg"><br />';
	echo '<small>Upload new image will replace the old image</small><br />'; 
	}   
	?>
                      <input type="file" name="image90" id="image90" value=""  /></div>
                      <div><?php  {
	
	if(file_exists($pth.'/images/rings/icons/180/'.$image180) && $image180 !='')echo '<img width="58" height="58" src="'.config_item('base_url').'images/rings/icons/180/'.$image180.'"><br />';
	else echo '<img src="'.config_item('base_url').'images/rings/icons/180/180degree.jpg"><br />';
	echo '<small>Upload new image will replace the old image</small><br />'; 
	}   
	?>
                      <input type="file" name="image180" id="image180" value=""  /></div>
                      </td>
  </tr>
  <tr>
    <td>Rings Images (Bigger)</td>
    <td><div><?php  {
	
	if(file_exists($pth.'/images/rings/icons/45/'.$image45_bg) && $image45_bg !='')echo '<img width="158" height="158" src="'.config_item('base_url').'images/rings/icons/45/'.$image45_bg.'"><br />';
	else echo '<img src="'.config_item('base_url').'images/rings/icons/45/45.jpg" width="158" height="158" ><br />';
	echo '<small>Upload image of the ring from 45&deg; angle</small><br />'; 
	}   
	?>
                      <input type="file" name="image45_bg" id="image45_bg" value=""  /></div>
                      <div><?php  {
	
	if(file_exists($pth.'/images/rings/icons/90/'.$image90_bg) && $image90_bg !='')echo '<img width="158" height="158" src="'.config_item('base_url').'images/rings/icons/90/'.$image90_bg.'"><br />';
	else echo '<img src="'.config_item('base_url').'images/rings/icons/90/90.jpg" width="158" height="158" ><br />';
	echo '<small>Upload image of the ring from 90&deg; angle</small><br />'; 
	}   
	?>
                      <input type="file" name="image90_bg" id="image90_bg" value=""  /></div>
                      <div><?php  {
	
	if(file_exists($pth.'/images/rings/icons/180/'.$image180_bg) && $image180_bg !='')echo '<img width="158" height="158" src="'.config_item('base_url').'images/rings/icons/180/'.$image180_bg.'"><br />';
	else echo '<img src="'.config_item('base_url').'images/rings/icons/180/180.jpg" width="158" height="158" ><br />';
	echo '<small>Upload image of the ring from 180&deg; angle</small><br />'; 
	}   
	?>
                      <input type="file" name="image180_bg" id="image180_bg" value=""  /></div>
                      </td>
  </tr>
  <tr>
    <td>Rings Animations</td>
    <td>
    <div id="animation2"></div>
    	<div><script> 
	<?php 
	
	if(file_exists($pth.'/'.$animation2) && $animation2 != '')
	echo "so = new SWFObject(\"".config_item('base_url').$animation2."\", \"Animation2\", \"205\", \"150\", \"8\", \"#fff\"); ";
	else echo "so = new SWFObject(\"".config_item('base_url')."flash/90.swf\", \"Animation2\", \"205\", \"150\", \"8\", \"#fff\"); ";
	echo "so.write(\"animation2\");</script><br />
                    ";
                    echo '<small>Upload small animated picture of the ring</small><br />
                    '; 
                    
                    ?> 
                    </script>
                    <input type="file" name="animation2" id="animation2" value=""  />
                    </div><br>
                    <div id="animation3"></div>
                    <div>
					<script>
					<?php 
	
	if(file_exists($pth.'/'.$animation3) && $animation3 != '')
	echo "so = new SWFObject(\"".config_item('base_url').$animation3."\", \"Animation3\", \"405\", \"290\", \"8\", \"#fff\"); ";
	else echo "so = new SWFObject(\"".config_item('base_url')."flash/180.swf\", \"Animation3\", \"405\", \"290\", \"8\", \"#fff\"); ";
	echo "so.write(\"animation3\");</script><br />
                    ";
                    echo '<small>Upload Larger animated picture of the ring</small><br />
                    '; 
                    
                    ?></script>
                    <input type="file" name="animation3" id="animation3" value=""  /></div>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
       
        <div class="clear"></div>
       
                  <!--<td align="center">
	
	<div id="animation3"></div>
	<script> 
	<?php 
	
	//    	if(file_exists(config_item('base_path').$animation3) && $animation3 != '')
	//	echo "so = new SWFObject(\"".config_item('base_url').//$animation3."\", \"Animation3\", \"205\", \"150\", \"8\", \"#fff\"); ";
	// 	else echo "so = new SWFObject(\"".config_item('base_url')."flash/180.swf\", \"Animation3\", \"205\", \"150\", \"8\", \"#fff\"); ";
	//	    	echo "so.write(\"animation3\");</script><br />"
	
	
	?></script>
	<input type="file" name="animation3" id="animation3" value=""  /> 
	</td> --> 
                  
                </tr>
              </table>
              <?php if($action == 'edit'){?>
              <small><font color="Red"> Upload new image will replace the old Animation -- Please refresh your browser (Ctrl+R) / clear your cache to view changes if u show the old image after upload</small><br />
              </font>
              <?php }?>
            </fieldset></td>
        </tr>
        <tr>
          <td></td>
          <td><br>
            <input type="submit"  name="<?=$action;?>btn" value="<?=ucfirst($action);?>" class="adminbutton"  />
            <a href="<?php echo config_item('base_url')?>admin/jewelries" class="adminbutton"> Cancel</a></td>
        </tr>
        </table>
      </form>
    </div>
  </div>
  <?php }else{?>
  <div>
    <table id="results" style="display:none; ">
    </table>
  </div>
  <?php }?>
</div>

  <!--\\\\\\\ content panel end \\\\\\--> 
  </form>
</div>
<!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>