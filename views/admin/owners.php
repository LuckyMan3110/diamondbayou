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
    $owners_id  = isset($details['owner_id']) ? $details['owner_id']  : '';
    $company_id = isset($details['company_id']) ? $details['company_id'] : 0;
    $company_name  = isset($details['company_name']) ?  $details['company_name']  : '';            
    
    }else{
    $owners_id  =  '';
    $company_id =   0;
    $company_name  =  '';
    }
    $id         	= isset($owners_id) ? $owners_id : '';
    ?>
      <style type="text/css">
    div.hDivBox table tr th,div.hDivBox table tr td{color:#000 !important;}
    div.flexigrid table tr th, div.flexigrid table tr td{color:#000 !important;}
    .flexigrid, .flexigrid div.bDiv td div{color:#000 !important;}
    table#results tbody tr td{color:#000 !important;}
    </style>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>Rapnet Companies Manager</h1>
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
              <form name="" action="<?php echo config_item('base_url');?>admin/owners/<?php echo $action; echo ($action == 'edit') ? '/' .$owners_id : '';?>" method="post" enctype="multipart/form-data" >
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  
                  <tr>
                    <td width="20%" align="right">Company ID</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="company_id" value="<?php echo $company_id;?>" size="30"   />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Company name</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="company_name" value="<?php echo $company_name;?>"  size="40" />
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