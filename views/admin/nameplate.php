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
    
    $product_name   = isset($details[0]['product_name']) ?  $details[0]['product_name'] : '';
    $product_price  = isset($details[0]['product_price']) ? $details[0]['product_price'] : 0;
    $product_code   =  isset($details[0]['product_code']) 			? $details[0]['product_code'] 		: 0;
    $description 	= isset($details[0]['description']) 	? $details[0]['description'] 	: '';
    $product_image  = isset($details[0]['product_image'])   	? $details[0]['product_image'] 	: '';
    }else {
    
    $product_name   = '';
    $product_price  =  0;
    $product_code = '' ;
    $description 	=  '';
    $product_image 	=  '';			    
    }
    $id         	= isset($id) ? $id : '';
    
    ?>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>
                <?=ucfirst($action) ?>
                Name Plate Section</h1>
            </div>
            <!-- Message Part -->
            <div style="width:100%;">
              <? if(isset($success) && !empty($success)){ ?>
              <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success;   ?> </div>
              <? } ?>
            </div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
              <form name="nameplate" action="<?php echo config_item('base_url');?>admin/nameplate/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  <tr>
                    <td width="20%" align="right">Product Name:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="product_name" value="<?php echo $product_name;?>" size="50" class="product_name" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Product Price:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="product_price" value="<?php echo $product_price;?>" size="20" class="product_price" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Product Code:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="product_code" value="<?php echo $product_code;?>" size="50" class="product_code" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Description:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <textarea name="description"  style="width: 400px;height: 60px;"><?php echo $description;?></textarea>
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Product Image:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <div class="inputfield floatl">
                          <?php
    
    if(file_exists(config_item('base_path')."images/".$product_image) && $product_image !='') {
    echo '<img width="120" height="120" src="'.config_item('base_url')."images/".$product_image.'" style="width: 80px; height: 80px;"><br />';
    }
    
    ?>
                          <input type="file" name="product_image" id="file1"  value=""  />
                        </div>
                      </dd></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                        <input type="submit" name="<?=$action;?>btn" id="edit" value="Save" class="search_but">
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
      <? } else { ?>
      <div>
        <table id="results" style="display:none; ">
        </table>
      </div>
      <? }  ?>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>