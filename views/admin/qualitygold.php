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
    $itemid = isset($details['itemid']) ? $details['itemid'] : '';    
    $description    = isset($details['description']) ? $details['description']       : '';							 	
    $weight 	= isset($details['weight']) ? $details['weight'] 	: '';
    $image		=	isset($details['folder']) ? $details['folder'] 	: '';
    $book 	= isset($details['book']) ? $details['book'] 	: '';
    $category 	= isset($details['category']) ? $details['category'] 	: '';
    $page 	= isset($details['page']) ? $details['page'] 	: '';
    $status 	= isset($details['status']) ? $details['status'] 	: '';
    $size 	= isset($details['size']) ? $details['size'] 	: '';
    $metal 	= isset($details['metal']) ? $details['metal'] 	: '';
    $cost_40 	= isset($details['cost_40']) ? $details['cost_40'] 	: '';
    $cost_45 	= isset($details['cost_50']) ? $details['cost_50'] 	: '';
    $current_status 	= isset($details['current_status']) ? $details['current_status'] 	: '';
    $rank 	= isset($details['rank'])   ? $details['rank']      :  '';
    
    /*       
    $on_ebay 	= ($details['on_ebay'] == '1')  ? $details['on_ebay']  : '0';  
    $on_amazon 	= ($details['on_amazon'] == '1')  ? $details['on_amazon']  : '0';
    $on_website 	= ($details['on_website'] == '1')  ? $details['on_website']  : '0';
    * 
    */
    }else{
    
    $itemid = isset($details['itemid']) ? $details['itemid'] : '';    
    $description    = isset($details['description']) ? $details['description']       : '';							 	
    $weight 	= isset($details['weight']) ? $details['weight'] 	: '';
    $book 	= isset($details['book']) ? $details['book'] 	: '';
    $image		=	isset($details['folder']) ? $details['folder'] 	: '';
    $category 	= isset($details['category']) ? $details['category'] 	: '';
    $page 	= isset($details['page']) ? $details['page'] 	: '';
    $status 	= isset($details['status']) ? $details['status'] 	: '';
    $size 	= isset($details['size']) ? $details['size'] 	: '';
    $metal 	= isset($details['metal']) ? $details['metal'] 	: '';
    $cost_40 	= isset($details['cost_40']) ? $details['cost_40'] 	: '';
    $cost_45 	= isset($details['cost_50']) ? $details['cost_50'] 	: '';
    $current_status 	= isset($details['current_status']) ? $details['current_status'] 	: '';
    $rank 	= isset($details['rank'])   ? $details['rank']      :  '';
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
              <h1>Send Quality & Gold Jewellry To eBay</h1>
            </div>
            <!-- Message Part -->
            <div style="width:100%;"></div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
              <form name="qualityform" action="<?php echo config_item('base_url');?>admin/qualitygold/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
                <dl class="zend_form">
                </dl>
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  <tr>
                    <td width="20%" align="right">Item ID</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="itemid" id="itemid" value="<?= $itemid; ?>" disabled="disabled"  size="30" >
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
                    <td width="20%" align="right">Descriptions</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="description" id="description" value="<?=$description; ?>" disabled="disabled"  size="30" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Weight</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="weight" id="weight" value="<?=$weight; ?>" disabled="disabled"  size="30" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Book</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="book" id="book" value="<?=$book; ?>" disabled="disabled"  size="30" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Page</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="page" id="page" value="<?=$page; ?>" disabled="disabled"  size="30" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Category</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="category" id="category" value="<?=$category; ?>" disabled="disabled"  size="30" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Status</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="status" id="status" value="<?=$status; ?>" disabled="disabled"  size="30" >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Size</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="size" id="size" value="<?=$size; ?>" disabled="disabled"  size="30"  >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Metal</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="metal" id="metal" value="<?=$metal; ?>" disabled="disabled"  size="30"  >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Jewellry @40</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="cost_40" id="cost_40" value="<?=$cost_40; ?>" disabled="disabled"  size="30"  >
                      </dd></td>
                  </tr>
                  <!--  -->
                  <tr>
                    <td width="20%" align="right">Jewellry @45</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="cost_45" id="cost_45" value="<?=$cost_45; ?>" disabled="disabled"  size="30"  >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Jewellry @50</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="cost_50" id="cost_50" value="<?=$cost_50; ?>" disabled="disabled"  size="30"  >
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Rank</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="rank" id="rank" value="<?=$rank; ?>" disabled="disabled"   size="30"  >
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
      <?php   } else { ?>
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