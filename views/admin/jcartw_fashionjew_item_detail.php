<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
        
<div class="search_box">
    <h1>Send Collection Item To eBay</h1>
     <?php echo $return_msg; ?>
        <form name="itemjewleryform" action="<?php echo SITE_URL; ?>send_itemjewelry_to_ebay/send_item_jewelry_JCartw_toebay/" method="post" enctype="multipart/form-data">
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
            <td width="20%" align="right">Item Brand :</td>
            <td colspan="3"><?php echo $rowsring['brand']; ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Retail Price :</td>
            <td colspan="3">$<?php echo _nf($rowsring['price1'], 2); ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Our Price :</td>
            <td colspan="3">US $<?php echo _nf($rowsring['price1'], 2) ; ?></td>
          </tr>
          <tr>
            <td width="20%" align="right">Product Description :</td>
            <td colspan="3"><?php echo $rowsring['productDescription']; ?></td>
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
                    $item_img_list = SITE_URL .''.addslashes($rowsring['thumb']);
                    $ringimg = $item_img_list;
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
                  <input type="hidden" name="jewelry_item_id" id="unique_ring_id" value="<?php echo $rowsring['productID']; ?>" />
                  <input type="hidden" name="ring_price" value="<?php echo $rowsring['productID']; ?>" />
                  <input type="hidden" name="ring_image" value="<?php echo $ringimg; ?>" />
                  <input type="hidden" name="ring_title" value="<?php echo $ringtitle; ?>" />
                  <input type="hidden" name="ring_title" value="<?php echo $ringtitle; ?>" />
                  <input type="hidden" name="ring_cate_id" value="<?php echo $rowsring['brand']; ?>" />
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