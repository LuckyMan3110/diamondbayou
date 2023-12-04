<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
      <?php
    if($action == 'add' || $action == 'edit'){
    $this->load->helper('custom','form');
    
    if(isset($details)){
    $item_number = isset($details['item_number']) ? $details['item_number'] : '';
    
    $itemid    = isset($details['itemid']) ? $details['itemid']       : '';							 	
    $level1 	= isset($details['level1']) ? $details['level1'] 	: '';
    $level2 	= isset($details['level2']) ? $details['level2'] 	: '';
    $level3 	= isset($details['level3']) ? $details['level3'] 	: '';
    $level4 	= isset($details['level4']) ? $details['level4'] 	: '';
    $level5 	= isset($details['level5']) ? $details['level5'] 	: '';
    $level6 	= isset($details['level6']) ? $details['level6'] 	: '';
    $level7 	= isset($details['level7']) ? $details['level7'] 	: '';
    $level8 	= isset($details['level8']) ? $details['level8'] 	: '';
    $level9 	= isset($details['level9']) ? $details['level9'] 	: '';
    $level10 	= isset($details['level10']) ? $details['level10'] 	: '';
    $series 	= isset($details['series'])   ? $details['series']      :  '';
    $descr 	= isset($details['descr'])   ? $details['descr']      :  '';
    $quality 	= isset($details['quality'])   ? $details['quality']      :  '';
    $measurement 	= isset($details['measurement'])   ? $details['measurement']      :  '';
    $total_carat 	= isset($details['total_carat'])   ? $details['total_carat']      :  '';
    $metal 	= isset($details['metal'])   ? $details['metal']      :  '';
    $avg_piece_weight 	= isset($details['avg_piece_weight'])   ? $details['avg_piece_weight']      :  '';
    $weight_unit 	= isset($details['weight_unit'])   ? $details['weight_unit']      :  '';
    $wholesale_price 	= isset($details['wholesale_price'])   ? $details['wholesale_price']     :  '';
    $retail_price 	= isset($details['retail_price'])   ? $details['retail_price']      :  '';
    $unit_of_sale 	= isset($details['unit_of_sale'])   ? $details['unit_of_sale']      :  '';
    $resizeable 	= isset($details['resizeable'])   ? $details['resizeable']      :  '';
    $base_size 	= isset($details['base_size'])   ? $details['base_size']      :  '';
    $exact_size 	= isset($details['exact_size'])   ? $details['exact_size']     :  '';
    $min_size 	= isset($details['min_size'])   ? $details['min_size']      :  '';
    $max_size 	= isset($details['max_size'])   ? $details['max_size']      :  '';
    $stock_status 	= isset($details['stock_status'])   ? $details['stock_status']      : '';
    $stonemap_img 	= isset($details['stonemap_img'])   ? $details['stonemap_img']      :  '';
    $img1 	= isset($details['img1'])   ? $details['img1']      :  '';
    $img2 	= isset($details['img2'])   ? $details['img2']      :  '';
    $img3 	= isset($details['img3'])   ? $details['img3']      :  '';
    $img4 	= isset($details['img4'])   ? $details['img4']      :  '';
    $img5 	= isset($details['img5'])   ? $details['img5']      :  '';
    $img6 	= isset($details['img6'])   ? $details['img6']      :  '';
    $img7 	= isset($details['img7'])   ? $details['img7']      :  '';
    /*       
    $on_ebay 	= ($details['on_ebay'] == '1')  ? $details['on_ebay']  : '0';  
    $on_amazon 	= ($details['on_amazon'] == '1')  ? $details['on_amazon']  : '0';
    $on_website 	= ($details['on_website'] == '1')  ? $details['on_website']  : '0';
    * 
    */
    }else{
    
    $item_number = isset($details['item_number']) ? $details['item_number'] : '';
    $itemid    = isset($details['itemid']) ? $details['itemid']       : '';							 	
    $level1 	= isset($details['level1']) ? $details['level1'] 	: '';
    $level2 	= isset($details['level2']) ? $details['level2'] 	: '';
    $level3 	= isset($details['level3']) ? $details['level3'] 	: '';
    $level4 	= isset($details['level4']) ? $details['level4'] 	: '';
    $level5 	= isset($details['level5']) ? $details['level5'] 	: '';
    $level6 	= isset($details['level6']) ? $details['level6'] 	: '';
    $level7 	= isset($details['level7']) ? $details['level7'] 	: '';
    $level8 	= isset($details['level8']) ? $details['level8'] 	: '';
    $level9 	= isset($details['level9']) ? $details['level9'] 	: '';
    $level10 	= isset($details['level10']) ? $details['level10'] 	: '';
    $series 	= isset($details['series'])   ? $details['series']      :  '';
    $descr 	= isset($details['descr'])   ? $details['descr']      :  '';
    $quality 	= isset($details['quality'])   ? $details['quality']      :  '';
    $measurement 	= isset($details['measurement'])   ? $details['measurement']      :  '';
    $total_carat 	= isset($details['total_carat'])   ? $details['total_carat']      :  '';
    $metal 	= isset($details['metal'])   ? $details['metal']      :  '';
    $avg_piece_weight 	= isset($details['avg_piece_weight'])   ? $details['avg_piece_weight']      :  '';
    $weight_unit 	= isset($details['weight_unit'])   ? $details['weight_unit']      :  '';
    $wholesale_price 	= isset($details['wholesale_price'])   ? $details['wholesale_price']     :  '';
    $retail_price 	= isset($details['retail_price'])   ? $details['retail_price']      :  '';
    $unit_of_sale 	= isset($details['unit_of_sale'])   ? $details['unit_of_sale']      :  '';
    $resizeable 	= isset($details['resizeable'])   ? $details['resizeable']      :  '';
    $base_size 	= isset($details['base_size'])   ? $details['base_size']      :  '';
    $exact_size 	= isset($details['exact_size'])   ? $details['exact_size']     :  '';
    $min_size 	= isset($details['min_size'])   ? $details['min_size']      :  '';
    $max_size 	= isset($details['max_size'])   ? $details['max_size']      :  '';
    $stock_status 	= isset($details['stock_status'])   ? $details['stock_status']      : '';
    $stonemap_img 	= isset($details['stonemap_img'])   ? $details['stonemap_img']      :  '';
    $img1 	= isset($details['img1'])   ? $details['img1']      :  '';
    $img2 	= isset($details['img2'])   ? $details['img2']      :  '';
    $img3 	= isset($details['img3'])   ? $details['img3']      :  '';
    $img4 	= isset($details['img4'])   ? $details['img4']      :  '';
    $img5 	= isset($details['img5'])   ? $details['img5']      :  '';
    $img6 	= isset($details['img6'])   ? $details['img6']      :  '';
    $img7 	= isset($details['img7'])   ? $details['img7']      :  '';
    /*    $on_ebay 	= ($details['on_ebay'] == '1')  ? $details['on_ebay']  : '0';
    $on_amazon 	= ($details['on_amazon'] == '1')  ? $details['on_amazon']  : '0';
    $on_website 	= ($details['on_website'] == '1')  ? $details['on_website']  : '0';
    */ 
    }
    
    $id         	= isset($id) ? $id : '';
    if(isset($details['img1']) && !empty($details['img1'])){
    $filename  = config_item('base_url')."images/povada/".$details['img1'];
    }else{
    $filename = '';
    }
    
    ?>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>Send Stuller Jewellry To eBay</h1>
            </div>
            <!-- Message Part -->
            <div style="width:100%;"></div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
              <form name="stullerform" action="<?php echo config_item('base_url');?>admin/stuller/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
                <dl class="zend_form">
                </dl>
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  <tr>
                    <td width="20%" align="right">Item Number</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="item_number" id="item_number" value="<?=$item_number; ?>" disabled="disabled" >
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
                    <td width="20%" align="right">Item id</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="itemid" id="itemid" value="<?=$itemid; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Level1</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="level1" id="level1" value="<?=$level1; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Series</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="series" id="series" value="<?=$series; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Description</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="descr" id="descr" value="<?=$descr; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Quality</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="quality" id="quality" value="<?=$quality; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Measurement</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="measurement" id="measurement" value="<?=$measurement; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Total Carat</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="total_carat" id="total_carat" value="<?=$total_carat; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Wholesale Price</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="wholesale_price" id="wholesale_price" value="<?=$wholesale_price; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Retail Price</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="retail_price" id="retail_price" value="<?=$retail_price; ?>" disabled="disabled" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                        <input type="submit" name="edit" id="edit" value="Send" class="search_but">
                      </dd>
                      &nbsp;</td>
                    <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt>
                      <dd id="back-element">
                        <button name="back" id="back" type="button" class="search_but" onclick="history.go(-1);">Back</button>
                      </dd></td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
        <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
      </div>
      <?php   } else {
          
      ?>
      <div>
        <table id="results" style="display:none; ">
        </table>
      </div>
      <?php 		  }
    ?>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>