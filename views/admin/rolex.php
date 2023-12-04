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
          <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
          <li class="active">Watches Management</li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix">
      <!--\\\\\\\ container  start \\\\\\-->
      <?php
    if($action == 'add' || $action == 'edit')
    {
    $this->load->helper('custom','form');
    
    $genderoptions = '<option value=""> Select Gender </option>
    <option value="KIDS">KIDS</option><option value="YOUTH">YOUTH</option>
    <option value="men">Male</option>
    <option value="ladies">Ladies </option>';
    $metaloptions = '<option value=""> Select Metal </option>
    <option value="ss">Stainless Steel </option>
    <option value="gold_ss">Stainless Steel and Gold</option>
    <option value="gold">Gold</option>
    <OPTION VALUE="PLASTIC">PLASTIC</OPTION>
    <option value="other">Other</option>';
    $styleoptions      = '<option value=""> Select Style </option><option value="CASUAL">CASUAL</option><option value="DRESSY">DRESSY</option><option value="FASHION">FASHION</option><option value="LUXURY">LUXURY</option><option value="SPORT">SPORT</option>';
    if(isset($details)){
    
    $name 			= isset($details['productName']) 			? $details['productName'] 		: '';
    $price 			= isset($details['price1']) 			? $details['price1'] 		: 0;
    $lowest_price 		= isset($details['lowest_price']) 			? $details['lowest_price'] 		: 0;
    $highest_price 		= isset($details['highest_price']) 			? $details['highest_price'] 		: 0;
    $retail_price 		= isset($details['retail_price']) 			? $details['retail_price'] 		: 0;
    $condition          = isset($details['condition'])			? $details['condition'] 	: 'new';
    $qty 			= isset($details['qty']) 			? $details['qty'] 		: 1;
    $upc 			= isset($details['upc']) 			? $details['upc'] 		: '';
    $per_dis_amt 	= isset($details['per_dis_amt']) 			? $details['per_dis_amt'] 		: '';
    $uprice 		= isset($details['price2']) 		? $details['price2'] 		: '';
    $sku   			= isset($details['SKU']) 	? $details['SKU'] 	: '';
    $gender   		= isset($details['gender']) 			? $details['gender'] 		: '';
    $brand   		= isset($details['brand']) 			? $details['brand'] 		: '';
    $metal   		= isset($details['metal']) 			? $details['metal'] 		: '';
    $description 	= isset($details['productDescription']) 	? $details['productDescription'] 	: '';
    $small_img 		= isset($details['thumb'])   	? $details['thumb'] 	: '';
    $big_img 		= isset($details['large'])   	? $details['large'] 	: '';
    $small_img2 	= isset($details['image_small2']) ? $details['image_small2'] 	: '';
    $big_img2 		= isset($details['image_big2'])   	? $details['image_big2'] 	: '';
    
    $image5 		= isset($details['image5'])   	? $details['image5'] 	: '';
    $image6 		= isset($details['image6'])   	? $details['image6'] 	: '';
    
    $carat_image	= isset($details['carat_image']) 	? $details['carat_image'] 	: '';
    $style          = isset($details['style'])			? $details['style'] 		: '';
    $model_number          = isset($details['model_number'])			? $details['model_number'] 	: '';
    
    $warranty          = isset($details['warranty'])			? $details['warranty'] 	: '';
    $lowprice         = isset($details['lowprice'])			? $details['lowprice'] 	: '';
    $papers          = isset($details['papers'])			? $details['papers'] 	: '';
    $box          = isset($details['box'])			? $details['box'] 	: '';
    $lugwidth          = isset($details['lugwidth'])			? $details['lugwidth'] 	: '';
    $thickness          = isset($details['thickness'])			? $details['thickness'] 	: '';
    $height          = isset($details['height'])			? $details['height'] 	: '';
    $width          = isset($details['width'])			? $details['width'] 	: '';
    $calibre          = isset($details['calibre'])			? $details['calibre'] 	: '';
    $movement          = isset($details['movement'])			? $details['movement'] 	: '';
    $crystal          = isset($details['crystal'])			? $details['crystal'] 	: '';
    $features          = isset($details['features'])			? $details['features'] 	: '';
    $bezel          = isset($details['bezel'])			? $details['bezel'] 	: '';
    $markers          = isset($details['markers'])			? $details['markers'] 	: '';
    $hands          = isset($details['hands'])			? $details['hands'] 	: '';
    $dial          = isset($details['dial'])			? $details['dial'] 	: '';
    $band          = isset($details['band'])			? $details['band'] 	: '';
    $case_diameter          = isset($details['case_diameter'])			? $details['case_diameter'] 	: '';
    $clasp          = isset($details['clasp'])			? $details['clasp'] 	: '';
    $part          = isset($details['part'])			? $details['part'] 	: '';
    $band_length         = isset($details['band_length'])			? $details['band_length'] 	: '';
    $band_color         = isset($details['band_color'])			? $details['band_color'] 	: '';
    $pid_type         = isset($details['id_type'])			? $details['id_type'] 	: '';
    $highest_amazon_price   = isset($details['highest_amazon_price'])	? $details['highest_amazon_price'] 	: '';
    $amazon_listing_price =         isset($details['amazon_listed_price'])	? $details['amazon_listed_price'] 	: '';
    $amazon_ca_price =         isset($details['amazon_ca_price'])	? $details['amazon_ca_price'] 	: '';
    $amazon_ca_id =         isset($details['amazon_ca_id'])	? $details['amazon_ca_id'] 	: '';
    $ca_id_type = isset($details['ca_id_type'])	? $details['ca_id_type'] 	: '';
    $diamond =         isset($details['diamond'])	? $details['diamond'] 	: '';
    $diamond_width =    isset($details['diamond_width'])	? $details['diamond_width'] : '';
    $ebay_upload_type = isset($details['ebay_upload_type'])	? $details['ebay_upload_type'] : '';
    
    if(isset($animations)){
    $image45	= isset($animations['image45']) 	? $animations['image45'] : '';
    $image90	= isset($animations['image90']) 	? $animations['image90'] : '';
    $image180	= isset($animations['image180']) 	? $animations['image180'] : '';
    
    $image45_bg	= isset($animations['image45_bg']) 			? $animations['image45_bg'] : '';
    $image90_bg	= isset($animations['image90_bg']) 			? $animations['image90_bg'] : '';
    $image180_bg	= isset($animations['image180_bg']) 	? $animations['image180_bg'] : '';
    
    //$animation1 = isset($animations['flash1']) 		? $animations['flash1'] : '';
    $animation2 = isset($animations['flash2']) 		? $animations['flash2'] : '';
    $animation3 = isset($animations['flash3']) 		? $animations['flash3'] : '';
    }else {
    $image45 	=  '';
    $image90 	=  '';
    $image180 	=  '';
    
    $image45_bg 	=  '';
    $image90_bg 	=  '';
    $image180_bg 	=  '';
    
    //$animation1 =  '';
    $animation2 =  '';
    $animation3 =  '';
    $image5 = '';
    $image6 = '';
    }
    
    $on_amzon 		= ($details['on_amzon'] == '1' ) ?  '1' : '0';
    $on_ebay 		= ($details['on_ebay'] == '1' ) ?  '1' : '0';
    $on_website 	=  ($details['on_website'] == '1' ) ?  '1' : '0';
    $on_amazon_ca 	=  ($details['on_amazon_ca'] == '1' ) ?  '1' : '0';
    // $asin_price 	=  ($details['price']) ?  $details['price'] : '0';
    $apprisal 		= ($details['apprisal']) ?  $details['apprisal'] : '0';
    //  echo $diamond; exit();
    
    }else{
    
    $case_diameter  =  '';
    $clasp          =  '';
    $part          =  '';
    $band_length   =  '';
    $band_color   =  '';
    $per_dis_amt = '';
    $name 			= '';
    $price 			= 0;
    $lowest_price 			= 0;
    $highest_price 			= 0;
    $retail_price 			= 0;
    $pid_type= "1";
    $section 		= '';
    $collection   	= '';
    $carat   		= '';
    $shape   		= '';
    $metal   		= '';
    //	$finger_size   	= '';
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
    $highest_amazon_price = '';
    $style			= '';
    $ringtype		= '';
    $platinum_price = 0;
    $white_gold_price = 0;
    $yellow_gold_price = 0;
    
    $qty = 1;
    $upc = '';
    $image45 		=  '';
    $image90 		=  '';
    $image180 		=  '';
    
    $image45_bg 	=  '';
    $image90_bg 	=  '';
    $image180_bg 	=  '';
    
    //$animation1 	=  '';
    $animation2 	=  '';
    $animation3 	=  '';
    $condition 	=  'new';
    $amazon_listing_price =  '';
    
    $diamond =  '';
    $diamond_width =  '';
    $ebay_upload_type =  '';
    //$asin_price = '0.00';
    
    $apprisal = '';
    $amazon_ca_price = '';
    $amazon_ca_id = '';
    $ca_id_type = '';
    }
    
    $id         	= isset($id) ? $id : '';
    
    ?>
      <div class="heading">
        <h1>
          <?=ucfirst($action) ?>
          Watch</h1>
      </div>
      <div style="width:100%;">
        <? if(isset($success) && !empty($success)){ ?>
        <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success;   ?> </div>
        <? } ?>
        <div style="clear:both"></div>
        <!-- End -->
        <div class="search_box">
          <form name="rolexform" action="<?php echo config_item('base_url');?>admin/rolex/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
            <table width="80%" border="0" class="table" align="center" cellpadding="5" cellspacing="0" >
              <!--Warning Class--> 
              <!--end of displaying warning class-->
              
              <tr>
                <td width="20%" align="right">Amazon, Ebay Price:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="price" class="form-control" value="<?php echo $price;?>" maxlength="15" class="price" />
                    <?php echo form_error('price'); ?> </dd></td>
              </tr>
              <?php if($lowprice > 0){ ?>
              <tr>
                <td width="20%" align="right">Amazon.com Low Price:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="lowprice" class="form-control" value="<?php echo $lowprice;?>" maxlength="15" class="lowprice" />
                  </dd></td>
              </tr>
              <?php } ?>
              <?php if($highest_amazon_price > 0){ ?>
              <tr>
                <td width="20%" align="right">Amazon.com Highest Price:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="highest_amazon_price" value="<?php echo $highest_amazon_price;?>" maxlength="15" class="form-control price" />
                    <?php echo form_error('price'); ?> </dd></td>
              </tr>
              <?php } ?>
              <?php if($amazon_listing_price > 0){ ?>
              <tr>
                <td width="20%" align="right">Your Amazon Listed Price:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="amazon_listing_price" value="<?php echo $amazon_listing_price;?>" maxlength="15" class="form-control price" />
                    <?php echo form_error('price'); ?> </dd></td>
              </tr>
              <?php } ?>
              <tr>
                <td width="20%" align="right">Amazon Lowest Price:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="lowest_price" value="<?php echo $lowest_price;?>" maxlength="15" class="form-control price" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Amazon Highest Price:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="highest_price" id="highest_price"  value="<?php echo $highest_price;?>" maxlength="15" class="form-control price" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Diamond:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="diamomd" id="diamomd" class="form-control " value="<?php echo $diamond; ?>" maxlength="15"  />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Marketplace on:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element"> Amazon
                    <input type="checkbox" name="amazon_chk" id="amazon_chk"  value="1" <? if($on_amzon == '1'){ echo 'checked="checked"'; } ?>  />
                    &nbsp;&nbsp;Ebay
                    <input type="checkbox" name="ebay_chk" id="ebay_chk"  value="1"  <? if($on_ebay == '1'){ echo 'checked="checked"'; } ?>  />
                    &nbsp;&nbsp;Website
                    <input type="checkbox" name="website_chk" id="website_chk"  value="1"  <? if($on_website == '1'){ echo 'checked="checked"'; } ?> />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Diamond weight:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="diamond_width" class="form-control" id="diamond_width"  value="<?php echo $diamond_width ;?>" maxlength="15"  />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Ebay Listed For:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <select name="ebay_upload_type" class="form-control" id="ebay_upload_type">
                      <?php if($ebay_upload_type == 'buy') {  ?>
                      <option value="buy" selected>Buy Only</option>
                      <?php } else {  ?>
                      <option value="buy">Buy Only</option>
                      <?   } if($ebay_upload_type == 'bestoffer') {  ?>
                      <option value="bestoffer" selected>Best Offer</option>
                      <? } else { ?>
                      <option value="bestoffer">Best Offer</option>
                      <? } ?>
                    </select>
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Retail Price:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="retail_price" id="retail_price"  value="<?php echo $retail_price;?>" maxlength="15" class="price form-control" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Appraisal Value:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="apprisal" id="apprisal" class="form-control"  value="<?php echo $apprisal;?>" maxlength="15" class="apprisal" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Condition (For Amazon):</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <select name="condition" id ="condition" class="price form-control">
                      <?php if($condition == 'new' or $condition == ''){ ?>
                      <option value="new" selected="selected">New</option>
                      <option value="used">Used</option>
                      <option value="preowned">Pre-owned</option>
                      <?php } elseif($condition == 'user') { ?>
                      <option value="new">New</option>
                      <option value="used" selected="selected">Used</option>
                      <option value="preowned">Pre-owned</option>
                      <?php }else { ?>
                      <option value="new">New</option>
                      <option value="used">Used</option>
                      <option value="preowned"  selected="selected">Pre-owned</option>
                      <?php } ?>
                    </select>
                  </dd>
                  <br>
                  <span style="font-size:xx-small;color:red;">preowned is concern as a new condition on amazon</span></td>
              </tr>
              <tr>
                <td width="20%" align="right"> Quantity: </td>
                <td colspan="3"><dt id="account_name-label">&nbsp; </dt>
                  <dd id="account_name-element">
                    <input type="text" name="qty" value="<?php echo $qty;?>" maxlength="15" class="price form-control" />
                    <?php // echo form_error('qty'); ?>
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right"> Product Id Type: </td>
                <td colspan="3"><dt id="account_name-label">&nbsp; </dt>
                  <dd id="account_name-element">
                    <select name="id_type" id="id_type">
                      <?php if($pid_type=='1'){ ?>
                      <option value="1" selected>ASIN</option>
                      <? }  else {   ?>
                      <option value="1">ASIN</option>
                      <? } ?>
                      <?php if($pid_type=='2'){ ?>
                      <option value="2" selected>ISBN</option>
                      <? }  else {   ?>
                      <option value="2">ISBN</option>
                      <? } ?>
                      <?php if($pid_type=='3'){ ?>
                      <option value="3" selected>UPC(12)</option>
                      <? }  else {   ?>
                      <option value="3">UPC(12)</option>
                      <? } ?>
                      <?php if($pid_type=='4'){ ?>
                      <option value="4" selected>EAN(13)</option>
                      <? }  else {   ?>
                      <option value="4">EAN(13)</option>
                      <? } ?>
                    </select>
                  </dd>
                  <small style="color:black;"><b>Warning:</b> for ASIN number your amazon price list does not search lowest and highest price Range so keep those 2 fields blank or else it will not work.</small></td>
              </tr>
              <tr>
                <td width="20%" align="right">Choosed Id Value:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="upc" value="<?php echo $upc;?>" maxlength="15" class="price form-control" />
                    <?php // echo form_error('qty'); ?>
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Percent of retail applied to lowest Amazon Price:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="per_dis_amt" value="<?php echo $per_dis_amt; ?>" maxlength="15" class="price form-control" />
                    <?php echo form_error('per_dis_amt'); ?>% <br>
                    <span><font  style="font-size:xx-small;color:red;">item listed by entered percentage discount</font></span> </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Watch Name:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="name" value="<?php echo $name;?>" maxlength="80" class="form-control"  style="width:560px;"/>
                    <?php echo form_error('name'); ?> </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Model Number:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="model_number" value="<?php echo $model_number;?>" class="form-control" maxlength="15" />
                    <?php echo form_error('model_number'); ?> </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Brand Name:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <select class="commondropdown" name="brand" id="brand" class="form-control" onchange="displayother(this.value);">
                      <option value='-1'>Choose Brand</option>
                      <?php 
    foreach($brandoptions as $brands):
    if($brands['brand_name'] == $brand){
    echo "<option value='".$brands['brand_name']."' selected='selected'>".$brands['brand_name']."</option>";
    
    }else {
    echo "<option value='".$brands['brand_name']."'>".$brands['brand_name']."</option>";
    }
    endforeach;
    ?>
                    </select>
                    <?php echo form_error('brand'); ?>
                    <div id="otherbrand" style='display:none;'>
                      <input type="text" name="otherbrandname" id = 'otherbrandname' class="form-control" maxlength="15" />
                    </div>
                    <br/>
                    <strong><small>Make sure in your brand name has not minus(-) special sign.</small></strong> </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Case:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <select class="commondropdown" name="metal" class="form-control">
                      <?php
    $metaloptions = array("ss" => "Stainless Steel" , "gold_ss" => "Stainless Steel and Gold" ,  "gold" => "Gold" , "Plastic" => "Plastic" ,"Resin" => "Resin" ,  "other" => "Other" );
    
    foreach($metaloptions as $key => $value){
    if($key == $metal){
    echo "<option value='".$key."' selected='selected'>".$value."</option>";
    } else {
    echo "<option value='".$key."'>".$value."</option>";
    }
    
    }
    ?>
                    </select>
                    <?php echo form_error('metal'); ?> </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Grade:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <select class="commondropdown" name="style" class="form-control">
                      <?php echo makeOptionSelected($styleoptions , $style);?>
                    </select>
                    <?php echo form_error('style'); ?> </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Type:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <select class="commondropdown" name="gender" id="gender" class="form-control">
                      <?php echo makeOptionSelected($genderoptions , $gender);?>
                    </select>
                    <?php echo form_error('gender'); ?> </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Band:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="band" value="<?php echo $band;?>" maxlength="50"  class="form-control" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Dial Color:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="dial" value="<?php echo $dial;?>" maxlength="50"  class="form-control" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Band Material:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="bezel" value="<?php if(!empty($bezel)) { echo $bezel; }   ?>" class="form-control" maxlength="150"  />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Part Number:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="part" value="<?php echo $part;?>" class="form-control" maxlength="50"  />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Clasp:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="clasp" value="<?php echo $clasp;?>" class="form-control" maxlength="50"  />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Case Diameter:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="case_diameter" value="<?php echo $case_diameter;?>" class="form-control" maxlength="50"  />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Band Length:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="band_length" value="<?php echo $band_length;?>" maxlength="50"  class="form-control" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Band Color:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="band_color" value="<?php echo $band_color;?>" maxlength="50"  class="form-control" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Movement:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="movement" value="<?php echo $movement;?>" maxlength="50"  class="form-control" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Band Width:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="width" value="<?php echo $width;?>" maxlength="50"  class="form-control" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Warranty:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="text" name="warranty" value="<?php echo $warranty;?>" maxlength="50"  class="form-control" />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Watch Image:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <input type="file" name="watch_image"  />
                  </dd></td>
              </tr>
              <tr>
                <td width="20%" align="right">Description:</td>
                <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                  <dd id="account_name-element">
                    <textarea name="description"  class="form-control" style="width:300px;height: 60px;"><?php echo $description;?></textarea>
                  </dd></td>
              </tr>
              
              <!-- Rolex Images-->
              
              <tr>
                <td width="100%" colspan="4">
                <div class="clear"></div><br><br>
                <table class="imgUploadTable">
                  <tr>
                    <td>Image 1</td>
                    <td><?php  {
                    
                    if(file_exists(config_item('base_path').$small_img) && $small_img !='')echo '<img width="120" height="120" src="'.config_item('base_url').$small_img.'" style="width: 80px; height: 80px;"><br />';
                    else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
                    echo '<small>Upload new image will replace the old image</small><br />';
                    }
                    ?>
               <input type="file" name="image_small" id="file1" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Image 2</td>
                    <td><?php  {
                    
                    if(file_exists(config_item('base_path').$big_img) && $big_img !='')echo '<img src="'.config_item('base_url').$big_img.'" style="width: 80px; height: 80px;"><br />';
                    else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
                    echo '<small>Upload new image will replace the old image</small><br />';
                    }
                    ?>
               <input type="file" name="big_image" id="big_image" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Image 3</td>
                    <td><?php  {
                    
                    if(file_exists(config_item('base_path').$small_img2) && $small_img2 !='')echo '<img width="120" height="120" src="'.config_item('base_url').$small_img2.'" style="width: 80px; height: 80px;"><br />';
                    else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
                    echo '<small>Upload new image will replace the old image</small><br />';
                    }
                    ?>
                     <input type="file" name="image_small2" id="file3" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Image 4</td>
                    <td><?php  {
                    
                    if(file_exists(config_item('base_path').$big_img2) && $big_img2 !='')echo '<img src="'.config_item('base_url').$big_img2.'" style="width: 80px; height: 80px;"><br />';
                    else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
                    echo '<small>Upload new image will replace the old image</small><br />';
                    }
                    ?>
                     <input type="file" name="big_image2" id="file4" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Image 5</td>
                    <td><?php  {
                    
                    if(file_exists(config_item('base_path').$image5) && $image5 !='')echo '<img width="120" height="120" src="'.config_item('base_url').$image5.'" style="width: 80px; height: 80px;"><br />';
                    else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
                    echo '<small>Upload new image will replace the old image</small><br />';
                    }
                    ?>
                     <input type="file" name="image5" id="file5" value=""  /></td>
                  </tr>
                  <tr>
                    <td>Image 6</td>
                    <td><?php  {
                    
                    if(file_exists(config_item('base_path').$image6) && $image6 !='')echo '<img src="'.config_item('base_url').$image6.'" style="width: 80px; height: 80px;"><br />';
                    else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
                    echo '<small>Upload new image will replace the old image</small><br />';
                    }
                    ?>
                     <input type="file" name="image6" id="file6" value=""  /></td>
                  </tr>
                </table>
            </td>
            </tr>
            
            <!-- Rolex Image -->
            <tr>
              <td align="right">&nbsp;</td>
              <td colspan="2">
              <br>
              	<input type="submit" name="<?=$action;?>btn" id="edit" value="Save" class="search_but btn btn-primary">
                <input type="submit" name="saveandeditbtn" id="edit" value="Save & Continue edit" onclick="document.rolexform.submit();" class="search_but btn btn-primary">
                <button name="back" id="back" type="button" class="search_but btn btn-primary" onclick="history.go(-1);">Back</button>
                <input type="hidden" value="<?php echo $id; ?>" name="rolex_id" id="rolex_id" /><br><br><br><br>
              </td>
            </tr>
            </table>
          </form>
        </div>
        <?php }else{
    $a = config_item('base_url')."admin/updaterolexgroup";
    ?>
        <form name="mywatchfrm" id="mywatchfrm" action="<?php echo $a; ?>" method="post">
          <div>
            <table id="results" style="display:none; ">
            </table>
          </div>
        </form>
        <?php }?>
      </div>
    </div>
    <!--\\\\\\\ container  end \\\\\\--> 
  </div>
  <!--\\\\\\\ content panel end \\\\\\--> 
</div>
<!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal --> 
<?php echo popupsOtherBlockData(); ?>> 