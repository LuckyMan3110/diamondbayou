<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
        
<div class="search_box">
    <h1>Send Collection Item To 
    
    <?php
    
    if( isset($_GET['sendTo']) AND $_GET['sendTo'] == 'etsy'){
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
    ?>
    </h4>
    
    </h1>
     <?php echo $return_msg; ?>

      <form name="itemjewleryform" action="<?php echo $action_url; ?>" method="post" enctype="multipart/form-data">
            
        <dl class="zend_form">
        </dl>
        <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
          <!--Warning Class--> 
          <!--end of displaying warning class-->
          <tr>
            <td width="20%" align="right">Item Name :</td>
            <td colspan="3"><?php echo $ringtitle; ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Item Category :</td>
            <td colspan="3"><?php echo $category_name; ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Retail Price :</td>
            <td colspan="3">$<?php echo _nf($retail_price, 2); ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Our Price :</td>
            <td colspan="3">US $<?php echo _nf($price, 2) ; ?></td>
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
                    /*$item_img_list = SITE_URL .'scrapper/imgs/'.addslashes($rowsring['ImagePath']);
                    $ringimg = $item_img_list; 
                    
                    $get_gender = $rowsring['gender'];
                    if($get_gender == 'M'){
                        $get_full_gender = 'Male';
                    }else{
                        $get_full_gender = 'Female';
                    }*/
                    
                    
                    /*• '.$specifications.'
                    • '.$details.'
                    • '.$comes_set_with.'*/
                    
                    $specifications_details1 = '';
                    $specifications_details2 = '';
                    $specifications_details3 = '';
                    $specifications_details4 = '';
                    $specifications_details5 = '';
                    $specifications_details6 = '';
                    $specifications_details7 = '';
                    $specifications_details8 = '';
                    $specifications_details9 = '';
                    $specifications_details10 = '';
                    $specifications_details11 = '';
                    $specifications_details12 = '';
                    $specifications_details13 = '';
                    $specifications_details14 = '';
                    $specifications_details15 = '';
                    
                    $specifications_arr = explode(';', $specifications);
                    $incc = 1;
                    foreach($specifications_arr as $specificat){
                        if($specificat){

                            if($incc == 1){ $specifications_details1 = '• '.$specificat; }
                            if($incc == 2){ $specifications_details2 = '• '.$specificat; }
                            if($incc == 3){ $specifications_details3 = '• '.$specificat; }
                            if($incc == 4){ $specifications_details4 = '• '.$specificat; }
                            if($incc == 5){ $specifications_details5 = '• '.$specificat; }
                            if($incc == 6){ $specifications_details6 = '• '.$specificat; }
                            if($incc == 7){ $specifications_details7 = '• '.$specificat; }
                            if($incc == 8){ $specifications_details8 = '• '.$specificat; }
                            if($incc == 9){ $specifications_details9 = '• '.$specificat; }
                            if($incc == 10){ $specifications_details10 = '• '.$specificat; }
                            if($incc == 11){ $specifications_details11 = '• '.$specificat; }
                            if($incc == 12){ $specifications_details12 = '• '.$specificat; }
                            if($incc == 13){ $specifications_details13 = '• '.$specificat; }
                            if($incc == 14){ $specifications_details14 = '• '.$specificat; }
                            if($incc == 15){ $specifications_details15 = '• '.$specificat; }

                            $incc++;
                        }
                    }
                    
                    $main_title_make_desc = 'This '.$title.' is customized in our San Francisco show room. All of our custom pieces are over seen by our Gemologist and Master Jeweler. Our ultimate goal is to gain your trust and satisfaction for a lifetime. We take pride in providing professional guidance and promise you to work hard to gain your confidence and exceed your expectations with each purchase.';
                    
                    
                    $details_description = '
                    '.$main_title_make_desc.'
                    
                    
                    • Item Number: '.$item_number.'
                    • Quality: '.$quality.'
                    • Finger Size: '.$finger_size.'
                    • '.$description.'
                    '.$specifications_details1.'
                    '.$specifications_details2.'
                    '.$specifications_details3.'
                    '.$specifications_details4.'
                    '.$specifications_details5.'
                    '.$specifications_details6.'
                    '.$specifications_details7.'
                    '.$specifications_details8.'
                    '.$specifications_details9.'
                    '.$specifications_details10.'
                    '.$specifications_details11.'
                    '.$specifications_details12.'
                    '.$specifications_details13.'
                    '.$specifications_details14.'
                    '.$specifications_details15.'
                    
                    
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
                  <input type="hidden" name="jewelry_item_id" id="unique_ring_id" value="<?php echo $item_number; ?>" />
                  <input type="hidden" name="ring_price" value="<?php echo $price; ?>" />
                  <input type="hidden" name="ring_image" value="<?php echo $item_img_list; ?>" />
                  <input type="hidden" name="item_img_link" value="<?php echo $item_img_link; ?>" />
                  
                  <input type="hidden" name="ring_title" value="<?php echo $ringtitle; ?>" />
                  <input type="hidden" name="ring_descriptions" value="<?php echo $details_description; ?>" />
                  <input type="hidden" name="ring_cate_id" value="<?php echo $item_number; ?>" />
                  
                  <?php if( !empty($rowsring['etsy_id']) ) { ?>
                    Update Title: <input type="text" name="item_title" class="form-control" value="<?php echo $ringtitle; ?>" style="width: 100%;" />
                    <br>
                  <?php }else{ ?>
                    <input type="hidden" name="item_title" value="<?php echo $ringtitle; ?>" />
                  <?php } ?>
                  
                  <input type="hidden" name="ring_item_tags" value="yadegardiamonds" />
                  <input type="submit" name="btn_submit" id="btn_submit" value="Send" class="search_but btn btn-primary">
                  <?php if( !empty($rowsring['etsy_id']) ) { ?>
                  <input type="hidden" name="etsy_id" value="<?php echo $rowsring['etsy_id']; ?>" />
                  <input type="submit" name="btn_revise_submit" id="btn_revise_submit" value="Revise" class="search_but btn btn-primary">&nbsp;&nbsp;
                  <?php } ?>
                  <button name="back" id="back" type="button" class="search_but btn btn-primary" onclick="history.go(-1);">Back</button>
              </dd>
        </td>
            <td width="74%" align="left" valign="top">&nbsp;</td>
          </tr>
        </table>
      </form>
    </div>
</div>    