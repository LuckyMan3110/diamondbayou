<style>
    .table_border td{padding-right: 20px !important;}
</style>
<script>
    function check_input_fields() {
        var d_id = document.getElementById('center_stone_id');
        if( d_id.value == '' ) {
            alert('Plz select center stone first before send an item to eBay!');
            return false;
        } else {
            return true;
        }
    }
</script>
<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading content_heading">
              <h1>Send Unique & Gold Jewellry To eBay</h1>
              <?php echo $return_msg; ?>
            </div>
            <!-- Message Part -->
            <div style="width:100%;"></div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
                <form name="qualityform" action="<?php echo SITE_URL; ?>send_unique_to_ebay/sendUniqueRingToEbay/" method="post" enctype="multipart/form-data" onsubmit="return check_input_fields()">
                <dl class="zend_form">
                </dl>
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  <tr>
                    <td width="20%" align="right">Item Code :</td>
                    <td colspan="3"><?php echo $rowsring['name']; ?></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Item Name :</td>
                    <td colspan="3"><?php echo $ringtitle; ?></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Retail Price :</td>
                    <td colspan="3">$<?php echo _nf($retail_price, 2); ?></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Our Price :</td>
                    <td colspan="3">$<?php echo _nf($rowsring['priceRetail'], 2) ; ?></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Metal :</td>
                    <td colspan="3">14K WHITE GOLD</td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Carat Weight :</td>
                    <td colspan="3"><?php echo $rowsring['stone_weight']; ?></td>
                  </tr>
                  <tr>
                      <td width="20%" valign="top"><div><b>ITEM INFORMATION</b></div><br></td>
                      <td width="80%">
                          <div class="details_tab_right col-sm-5">
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Item Code</span>
                                <span><?php echo $rowsring['style_group']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Approx. Weight</span>
                                <span><?php echo $rowsring['metal_weight']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Measurements</span>
                                <span><?php echo 'Top Width: '.$rowsring['top_width'].' mm, Bottom Width: '.$rowsring['bottom_width'].' mm, <br>Top Height: '.$rowsring['top_height'].' mm, Bottom Height: '.$rowsring['bottom_height'].' mm'; ?></span>
                                <div class="clear"></div><br>
                            </div>
                            <div class="item_rows">
                                <span>Style Name</span>
                                <span><?php echo $rowsring['name']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Style Group Name</span>
                                <span><?php echo $rowsring['style_group']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stones</span>
                                <span><?php echo $rowsring['supplied_stones']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stone Weight</span>
                                <span><?php echo $rowsring['stone_weight']; ?></span>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div><br>
                    </div>
                      </td>
                  </tr>
                  <tr>
                      <td width="20%" valign="top"><div><b>DIAMOND INFORMATION</b></div><br></td>
                      <td width="80%">
                          <div class="details_tab_right col-sm-5">
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Setting Type</span>
                                <span><?php echo $maincate_name; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stones</span>
                                <span><?php echo $rowsring['supplied_stones']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stone Weight</span>
                                <span><?php echo $rowsring['stone_weight']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Diamond Shapes</span>
                                <span><?php echo $suport_shape; ?></span>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="item_rows">
                                <span>Center Stone Sold Separately</span>
                                <span><?php echo $rowsring['additional_stones']; ?></span>
                                <div class="clear"></div>
                            </div>                            
                            <?php
                                $itemInformation = '';
                                if( !empty( $suported_shapes) ) {  
                                    $itemInformation .= '<div class="item_rows">
                                                        <span>Diamond Shapes View</span>
                                                        <span>'.$suported_shapes.'</span>
                                                        <div class="clear"></div>
                                                    </div>';
                                }

                                echo $itemInformation;

                            ?>
                            <div class="item_rows">
                                <span>Clarity</span>
                                <span>VVS1 to SI2</span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Color</span>
                                <span>D to L</span>
                                <div class="clear"></div>
                            </div>
                            
                        </div>
                    </div>
                      </td>
                  </tr>
                  <tr>
                    <td width="20%">Center Stone List:</td>
                    <td colspan="3">
                        <div id="center_diamond_list"><?php echo $center_stones; ?></div>
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
                        <img src="<?php echo $ringimg; ?>" alt="<?php echo $ringtitle; ?>" width="400" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                          <input type="hidden" name="center_stone_id" id="center_stone_id" value="" />
                          <input type="hidden" name="unique_ring_id" id="unique_ring_id" value="<?php echo $rowsring['ring_id']; ?>" />
                          <input type="hidden" name="ring_price" value="<?php echo $rowsring['priceRetail']; ?>" />
                          <input type="hidden" name="ring_image" value="<?php echo $ringimg; ?>" />
                          <input type="hidden" name="ring_title" value="<?php echo $ringtitle; ?>" />
                          <input type="hidden" name="ring_title" value="<?php echo $ringtitle; ?>" />
                          <input type="hidden" name="ring_cate_id" value="<?php echo $rowsring['catid']; ?>" />
                          <input type="submit" name="btn_submit" id="btn_submit" value="Send" class="search_but">&nbsp;&nbsp;
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
<?php echo popupsOtherBlockData(); ?>