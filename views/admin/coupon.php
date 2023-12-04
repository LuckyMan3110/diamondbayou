<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
      <?php if($action == 'add' || $action == 'edit'){
    $this->load->helper('custom','form');
    if(isset($details)){
    $code  = isset($details['code'])? $details['code'] 		: 0;
    $discount 	= isset($details['discount']) ? $details['discount'] : 0;
    } else {
    $code  =  0;
    $discount 	=  0;                                                                       
    }
    $id = isset($id) ? $id : '';
    
    ?>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>
                <?=ucfirst($action) ?>
                Coupon Manager</h1>
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
              <form name="" action="<?php echo config_item('base_url');?>admin/coupon/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post">
                <table width="95%" align="center" cellpadding="10" cellspacing="10">
                  <tr>
                    <td width="20%" align="right">Coupon Code:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="code" value="<?php echo $code;?>" maxlength="15" class="code" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Discount(%):</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="discount" value="<?php echo $discount;?>" maxlength="15" class="discount" />
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
      <?php }else{?>
      <div>
        <table id="results" style="display:none; ">
        </table>
      </div>
      <?php }?>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>