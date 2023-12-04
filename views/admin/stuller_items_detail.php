
<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
        
<div class="search_box" style="padding-left: 30px;">
    <h4>Send Collection Item To 
    
    <?php if( isset($_GET['sendTo']) AND $_GET['sendTo'] == 'etsy'){
        echo 'Etsy'; 
    }else{
        echo 'eBay';
    }
    ?>
    </h4>
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
    
    
     <?php echo $return_msg; ?>

      <form name="itemjewleryform" action="<?php if( isset($_GET['sendTo']) AND $_GET['sendTo'] == 'etsy'){  echo '';} else{ ?> <?php echo SITE_URL; ?>send_itemjewelry_to_ebay/send_item_jewelry_JCart_toebay/ <?php } ?>" method="post" enctype="multipart/form-data">
            
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
            <td colspan="3"><?php echo $rowsring['metal_purity']; ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Retail Price :</td>
            <td colspan="3">$<?php echo _nf($retail_price, 2); ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Our Price :</td>
            <td colspan="3">US $<?php echo _nf($rowsring['price_website'], 2) ; ?></td>
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
                    $item_img_list = SITE_URL .'images/'.addslashes($rowsring['image1']);
                    $ringimg = $item_img_list; 
                    
                    $get_gender = $rowsring['gender'];
                    if($get_gender == 'M'){
                        $get_full_gender = 'Male';
                    }else{
                        $get_full_gender = 'Female';
                    }
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
                  <input type="hidden" name="jewelry_item_id" id="unique_ring_id" value="<?php echo $rowsring['stock_number']; ?>" />
                  Update Price: <input type="text" class="form-control" name="ring_price" value="<?php echo $rowsring['price_website']; ?>" />
                  <input type="hidden" name="ring_image" value="<?php echo $ringimg; ?>" />
                  Update Title: <input type="text" name="item_title" class="form-control" value="<?php echo $rowsring['item_title']; ?>" />
                  <input type="hidden" name="ring_title" value="<?php echo $ringtitle; ?>" />
                  Update Descriptions:  <input type="text" class="form-control" name="ring_descriptions" value="<?php echo $rowsring['item_title']; ?>. <?php echo $ringtitle; ?> <?php echo $rowsring['ring_size']; ?>" />
                  <input type="hidden" name="ring_cate_id" value="<?php echo $rowsring['metal_purity']; ?>" />
                  <input type="hidden" name="ring_item_tags" value="<?php echo $rowsring['category_type']; ?>,<?php echo $get_full_gender; ?>" />
                  <br>
                  <?php if( empty($view_type) ) { ?>
                  <input type="submit" name="btn_submit" id="btn_submit" value="Send" class="search_but btn btn-primary">&nbsp;&nbsp;
                  <?php } ?>
                  <?php if( !empty($rowsring['etsy_id']) ) { ?>
                  <input type="hidden" name="etsy_id" value="<?php echo $rowsring['etsy_id']; ?>" />
                  <input type="submit" name="btn_revise_submit" id="btn_revise_submit" value="Revise" class="search_but btn btn-primary">&nbsp;&nbsp;
                  <?php } ?>
                  <button name="back" id="back" type="button" class="search_but btn btn-primary" onclick="history.go(-1);">Back</button>
                  <br><br>
              </dd>
        </td>
            <td width="74%" align="left" valign="top">&nbsp;</td>
          </tr>
        </table>
      </form>
    </div>
</div>    
