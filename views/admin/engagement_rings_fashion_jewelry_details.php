<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
        
<div class="search_box">
    <h1>Send Collection Item To 
    
    <?php if( isset($_GET['sendTo']) AND $_GET['sendTo'] == 'etsy'){
        echo 'Etsy';
        $action_url = '';
    }else{
        echo 'eBay';
        $action_url = SITE_URL.'send_itemjewelry_to_ebay/send_item_jewelry_JCart_toebay/';
    }
    ?>
    <h4>
    <?php
    if($response_etsy){
        if($response_etsy[title]){
        ?>
        Successfully Added a Item <a href="<?= $response_etsy[url] ?>" target="_blank"><?= $response_etsy[title] ?></a> to Etsy
        <?php
        }else{
            echo 'Item Did Note Send to Etsy! Some things Problem Here!';
        }
    }

if($rowrings['additional_stones'] == ''){
    $where_dev_index             = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
    $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
}else{

    $additional_stones_ex = explode('/', $rowrings['additional_stones']);
    $additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
    $additional_stones_first_item2   = $additional_stones_first_item['1']; 
    
    $check_count = 0;
    for($i=1; $i<5; $i++){
        $where_dev_index             = array('price !=' => '', 'color !=' => '');
        $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_by_where_like_after('dev_index', $where_dev_index, $i, $check_count, $additional_stones_first_item2, 'Meas');
        
        $additional_meas_ex         = explode('x', $get_dev_index_info->Meas);
        $dev_index_meas             = str_replace('.', 'x', $additional_meas_ex['0']);
        $result_new_index_meas      = substr($dev_index_meas['0'], 0, 3);
        
        $check_count = $check_count + 1;
        
        if($additional_stones_first_item2 == $result_new_index_meas){
            break;
        }
        
    } 
    
    if(empty($get_dev_index_info)){
        $where_dev_index             = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
        $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
    }
}    

$get_diamond_price      = $get_dev_index_info['0']->price * 1.10;    
$get_carat_value_d_i    = str_replace(' CT.', '', $get_dev_index_info['0']->carat);    
$get_carat_value_d_i    = str_replace(' ', '', $get_carat_value_d_i);    
    
    
$title_category_name = $row_cate['sub_cname'];
if($row_cate['sub_cname'] == 'Solitaires'){
    $title_category_name = 'Solitaire';
}else if($row_cate['sub_cname'] == 'Engagement Rings'){
    $title_category_name = $row_cate['main_cname'];
}

if($rowsring['matalType'] == 'PLAT'){
   $matalType = 'Platinum';  
}else{
   $matalType = $rowsring['matalType'];  
}

$stone_weight = $rowsring['stone_weight'] + $get_carat_value_d_i;

if($title_category_name == 'Wedding Band Sets' OR $title_category_name == 'Wedding Bands' OR $title_category_name == 'Eternity Wedding Bands'){
    $main_title_make = $title_category_name.' '.$ringtitleMain.' GIA Diamond Platinum Engagement Ring'; 
}else{
    $main_title_make = $title_category_name.' '.$ringtitleMain. $stone_weight. ' Carat Center Stone '.$matalType. ' GIA Diamond Platinum Engagement Ring'; 
}


//print_ar($rowsring);   
    ?>
    </h4>
    
     <?php echo $return_msg; ?>

      <form name="itemjewleryform" action="<?php echo $action_url; ?>" method="post" enctype="multipart/form-data">
            
        <dl class="zend_form">
        </dl>
        <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
          <!--Warning Class--> 
          <!--end of displaying warning class-->
          <tr>
            <td width="20%" align="right">Item Name :</td>
            <td colspan="3"><?php echo $main_title_make; ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Item Category :</td>
            <td colspan="3"><?php echo $title_category_name; ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Retail Price :</td>
            <td colspan="3">$<?php echo _nf($retail_price + $get_diamond_price, 2); ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Our Price :</td>
            <td colspan="3">US $<?php echo _nf($rowsring['priceRetail'] + $get_diamond_price, 2) ; ?></td>
          </tr>
          <tr>
              <td width="20%" valign="top"><div><b>Item Details</b></div><br></td>
              <td width="80%">
                  <div class="details_tab_right col-sm-5">
                <div class="item_detail_bk">
                    <?php echo $item_details_list; ?>
                </div>
            </div>
              </td>
          </tr>
          <tr>
              <td width="20%">&nbsp;</td>
            <td colspan="3">
                <br>
                <div id="show_diamond_id"></div>
            </td>
          </tr>
          <?php if( !empty($detail_result['embed_link_code']) ) { ?>
          <tr>
              <td width="20%"><b>Item Video:</b></td>
            <td colspan="3">
                <div>
                    <iframe width="560" height="315" src="<?php echo $detail_result['embed_link_code']; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="clear"></div>
            </td>
          </tr>
          <?php } ?>
          <tr>
              <td width="20%"><b>Item Image:</b></td>
            <td colspan="3">
                <div>
                    <?php //echo $item_img_list; 
                    //echo '<pre>'; print_r($rowsring); 
                    $item_img_list = SITE_URL .'scrapper/imgs/'.addslashes($rowsring['ImagePath']);
                    $ringimg = $item_img_list; 
                    
                    $get_gender = $rowsring['gender'];
                    if($get_gender == 'M'){
                        $get_full_gender = 'Male';
                    }else{
                        $get_full_gender = 'Female';
                    }
                    
                    $get_carat_stone_weight    = str_replace(' CT.', '',$rowsring['stone_weight']);    
                    $get_carat_stone_weight    = str_replace(' ', '', $get_carat_stone_weight);    
                    
                    $get_total_carat_stone_weight    = $get_carat_stone_weight + $get_carat_value_d_i;
                    
                    if($rowsring['matalType'] == 'PLAT'){
                       $matalType  =  'Platinum';  
                    }else{
                       $matalType  =  $rowsring['matalType'];  
                    }
                    
                    
                    if($title_category_name == 'Wedding Band Sets' OR $title_category_name == 'Wedding Bands' OR $title_category_name == 'Eternity Wedding Bands'){
                        $get_carat_stone_weight         = 'N/A'; 
                        $get_total_carat_stone_weight   = 'N/A'; 
                    }
                    
                    
                    $main_title_make_desc = 'This '.$main_title_make.' is customized in our San Francisco show room. All of our custom pieces are over seen by our Gemologist and Master Jeweler. Our ultimate goal is to gain your trust and satisfaction for a lifetime. We take pride in providing professional guidance and promise you to work hard to gain your confidence and exceed your expectations with each purchase.';
                    
                    $details = '
                    
                    '.$main_title_make_desc.'
                    
                    
                    • Style Name: '.$rowsring['name'].'
                    • Metal Weight: '.$rowsring['metal_weight'].'
                    • Center Diamond Weight: '.$get_carat_stone_weight.'
                    • Supplied Stones: '.$rowsring['supplied_stones'].'
                    • Total Diamond Weight: '.$get_total_carat_stone_weight.'
                    • Additional Stones: '.$rowsring['additional_stones'].'
                    • Top Width: '.$rowsring['top_width'].'
                    • Metal Type: '.$matalType.'
                    • Category Name: '.$rowsring['category_name'].'
                    • Type: '.$rowsring['parent_cate'].'
                    
                    
                     ▶ Want to find out more? Check out my shop http://etsy.me/2yBqrUW
                     ▶ Want to find out more Diamond Earrings - http://etsy.me/2AsBCAw
                     
                     
                     Go Directly to My Sections
					 
                     • Estate piece - http://etsy.me/2PSqbri
                     • Engagement Rings - http://etsy.me/2Rangue
                     • Wedding Bands Mens - http://etsy.me/2PXp4X5
                     • Wedding Bands Ladies - http://etsy.me/2CFGK5L
                     • Wedding Bands Platinum - http://etsy.me/2ScAOGZ
                     • Half Diamond Wedding Band  - https://etsy.me/2RoxgQO
                     • Eternity Wedding Bands - https://etsy.me/2ERNVL7
                     • Half Diamond Wedding Band Sets - https://etsy.me/2AzA5Zx
                     • Diamond Stud Earrings - http://etsy.me/2AsBCAw
                     • Diamond Hoop Earrings - http://etsy.me/2SiW51F
                     
					 
                     ❤ ❤ ❤ Share the Love ❤ ❤ ❤
					 
					 
					 ❤ PIN IT on Yelp - https//bit.ly/2EMGMvA
					 ❤ FOLLOW on Twitter - http://bit.ly/2CHBOh3
					 ❤ LOVE IT on Facebook - http://bit.ly/2Aso9sA
					 
					 
					 Thank you for taking the time to look at my shop. I hope you enjoy my designs as much as I enjoyed creating them for you!
                    ';
                 
?>             
                    
                    <img src=' <?php echo $item_img_list; ?>' width='250px'>
                </div>
                <div class="clear"></div>
            </td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
              <dd id="edit-element">
                  <input type="hidden" name="jewelry_item_id" id="unique_ring_id" value="<?php echo $rowsring['ring_id']; ?>" />
                  <input type="hidden" name="ring_price" value="<?php echo $rowsring['priceRetail'] + $get_diamond_price; ?>" />
                  <input type="hidden" name="ring_image" value="<?php echo $ringimg; ?>" />
                  <input type="hidden" name="ring_image_name" value="<?php echo $rowsring['ImagePath']; ?>" />
                  <input type="hidden" name="item_title" value="<?php echo $main_title_make; ?>" />
                  <input type="hidden" name="title_category_name" value="<?php echo $title_category_name; ?>" />
                  <input type="hidden" name="ring_title" value="<?php echo $main_title_make; ?>" />
                  <input type="hidden" name="ring_descriptions" value="<?php echo $details; ?>" />
                  <input type="hidden" name="ring_cate_id" value="<?php echo $rowsring['matalType']; ?>" />
                  <input type="hidden" name="ring_item_tags" value="<?php echo $rowsring['category_name']; ?>,<?php echo $get_full_gender; ?>" />
                  <?php if( empty($view_type) ) { ?>
                  <input type="submit" name="btn_submit" id="btn_submit" value="Send" class="search_but">&nbsp;&nbsp;
                  <?php } ?>
                  <button name="back" id="back" type="button" class="search_but" onclick="history.go(-1);">Back</button>
              </dd>
        </td>
            <td width="74%" align="left" valign="top">&nbsp;</td>
          </tr>
        </table>
      </form>
    </div>
</div>    