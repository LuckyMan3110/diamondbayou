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
    $cert_id  = isset($details['cert_id']) ? $details['cert_id']  : '';
    $cert_name = isset($details['cert_name']) ? $details['cert_name'] : '';
    $cert_img  = isset($details['cert_img']) ? $details['cert_img'] : '';
    $cert_adddate  = isset($details['cert_adddate']) ?  $details['cert_addate']  : '';            
    
    }else{
    $cert_id  =  '';
    $cert_name =   '';
    $cert_img  =  '';
    $cert_adddate  =  '';
    }
    $id         	= isset($cert_id) ? $cert_id : '';
    ?>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>Rapnet Certificates Manager</h1>
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
              <form name="" action="<?php echo config_item('base_url');?>admin/cert/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  
                  <tr>
                    <td width="20%" align="right">Certifiate Name</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="cert_name" value="<?php echo $cert_name ;?>" size="30"  id="cert_name"  />
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Certifiate IMG</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="file" name="cert_img"  id="cert_img" size="40" />
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