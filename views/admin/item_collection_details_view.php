<style>
    .table_border td{padding-right: 20px !important;}
</style>
<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list();?></div>
        <!-- main menu end -->
    <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading content_heading">
              <h1>Send Collection Item To eBay</h1>
              <?php echo $return_msg; ?>
            </div>
            <!-- Message Part -->
            <div style="width:100%;"></div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
                <form name="itemjewleryform" action="<?php echo SITE_URL; ?>send_itemjewelry_to_ebay/send_item_jewelry_toebay/" method="post" enctype="multipart/form-data">
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
                    <td colspan="3"><?php echo $rowsring['category']; ?></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Retail Price :</td>
                    <td colspan="3">$<?php echo _nf($retail_price, 2); ?></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Our Price :</td>
                    <td colspan="3">US $<?php echo _nf($rowsring['price'], 2) ; ?></td>
                  </tr>
                  <tr>
                      <td width="20%" valign="top"><div><b>ITEM Specification</b></div><br></td>
                      <td width="80%">
                          <div class="details_tab_right col-sm-5">
                        <div class="item_detail_bk">
                            <?php echo $item_specifition; ?>
                        </div>
                        <div class="clear"></div><br>
                    </div>
                      </td>
                  </tr>
                  <tr>
                      <td width="20%" valign="top"><div><b>Item Details</b></div><br></td>
                      <td width="80%">
                          <div class="details_tab_right col-sm-5">
                        <div class="item_detail_bk">
                            <?php echo $item_details; ?>
                        </div>
                    </div>
                      </td>
                  </tr>
                  <tr>
                      <td width="20%" valign="top"><div><b>Featrued Description</b></div><br></td>
                      <td width="80%">
                          <div class="details_tab_right col-sm-5">
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Item ID</span>
                                <span><?php echo $feature_desc['item_id']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Description</span>
                                <span><?php echo $feature_desc['desc']; ?></span>
                                <div class="clear"></div>
                            </div>
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
                  <tr>
                    <td width="20%">Item Image:</td>
                    <td colspan="3">
<!--                        <img src="<?php echo $ringimg; ?>" alt="<?php echo $ringtitle; ?>" width="400" />-->
                        <div>
                            <?php echo $item_img_list; ?>
                        </div>
                        <div class="clear"></div>
                    </td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                          <input type="hidden" name="jewelry_item_id" id="unique_ring_id" value="<?php echo $rowsring['id']; ?>" />
                          <input type="hidden" name="ring_price" value="<?php echo $rowsring['price']; ?>" />
                          <input type="hidden" name="ring_image" value="<?php echo $ringimg; ?>" />
                          <input type="hidden" name="ring_title" value="<?php echo $ringtitle; ?>" />
                          <input type="hidden" name="ring_title" value="<?php echo $ringtitle; ?>" />
                          <input type="hidden" name="ring_cate_id" value="<?php echo $rowsring['category']; ?>" />
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
        </div>
        <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
      </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockDataii(); ?>