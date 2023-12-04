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
              <h1>Send Watch / Jewelry To eBay</h1>
              <?php echo $add_watch_msg; ?>
            </div>
            <!-- Message Part -->
            <div style="width:100%;"></div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
                <form name="qualityform" action="<?php echo SITE_URL; ?>admin_jewelry_rings/sendWatchesToEbay/" method="post" enctype="multipart/form-data" onsubmit="return check_input_fields()">
                <dl class="zend_form">
                </dl>
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  <tr>
                    <td width="20%" align="right">Item Code :</td>
                    <td colspan="3"><?php echo $rowsring['style']; ?></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Item Name :</td>
                    <td colspan="3"><?php echo $rowsring['title']; ?></td>
                  </tr>
<!--                  <tr>
                    <td width="20%" align="right">Retail Price :</td>
                    <td colspan="3">$<?php echo _nf($retail_price, 2); ?></td>
                  </tr>-->
                  <tr>
                    <td width="20%" align="right">Our Price :</td>
                    <td colspan="3">$<?php echo _nf($rowsring['price'], 2) ; ?></td>
                  </tr>
                  <?php
                    $item_list = array(
                        'Item Length' => $rowsring['item_length'],
                        'Average Weight' => $rowsring['average_weight'],
                        'Item Length' => $rowsring['item_length'],
                        'Status' => $rowsring['status'],
                        'Country' => $rowsring['country'],
                        'Metal' => $rowsring['metal'],
                        'Product Type' => $rowsring['product_type'],
                        'Jewelry Type' => $rowsring['jewelry_type'],
                        'Primary Material' => $rowsring['material_primary'],
                        'Primary Material Color' => $rowsring['material_primary_color'],
                        'Material Purity' => $rowsring['material_purity'],
                        'Length of Item' => $rowsring['length_of_item']
                    );
                    
                    $view_list = '';
                    foreach ( $item_list as $label => $field_value ) {
                        if( !empty($field_value) && $field_value != 'null' ) {
                            $view_list .= '<tr>
                                            <td width="20%" align="right">'.$label.' :</td>
                                            <td colspan="3">'.$field_value.'</td>
                                          </tr>';
                        }
                    }
                    echo $view_list;
                  ?>
                  <tr>
                    <td width="20%">Item Image:</td>
                    <td colspan="3" valign="top">
                        <img src="<?php echo $item_image; ?>" alt="<?php echo $rowsring['title']; ?>" width="400" />
                    </td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                          <input type="hidden" name="watch_id" id="watch_id" value="<?php echo $rowsring['id']; ?>" />
                          <input type="hidden" name="watch_price" value="<?php echo $rowsring['price']; ?>" />
                          <input type="hidden" name="watch_image" value="<?php echo $item_image; ?>" />
                          <input type="hidden" name="watch_title" value="<?php echo $rowsring['title']; ?>" />
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