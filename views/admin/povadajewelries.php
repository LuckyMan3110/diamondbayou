<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>Manage Bulk Povada Inventory</h1>
            </div>
            <!-- Message Part -->
            <div style="width:100%;">
              <? if(isset($message) && !empty($message)){ ?>
              <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $message;   ?> </div>
              <? } ?>
            </div>
            <div style="clear:both"></div>
            <!-- End -->
            <div class="search_box">
              <form name="inventoryForm" action="<?php echo config_item('base_url');?>admin/povadajewelries" method="post" enctype="multipart/form-data">
                <table width="95%" align="center" cellpadding="10" cellspacing="10">
                  <tr>
                    <td align="center" colspan="2"><?  if(isset($message) && !empty($message) ){ echo $message; } ?></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Template file:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="file" name="template_file" id="template_file" />
                      </dd></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                        <input type="submit" name="submit" id="edit" value="Upload" class="search_but">
                      </dd>
                      &nbsp;</td>
                    <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt>
                      <dd id="back-element">
                        <button name="back" id="back" type="button" class="search_but" onclick="history.go(-1);">Back</button>
                      </dd></td>
                  </tr>
                  <tr>
                    <td align="right" colspan="2"><a href="<?php echo config_item('base_url');?>upload/povadatemplate.csv" style="color:red;font-weight:bold;">Download Sample Template</a></td>
                  </tr>
                </table>
                <div align="left" style="color:#642284;font-size:small;">
                  <ul type="square">
                    <li>1. Maximum 1000 records are add at a time.</li>
                    <li>2. download the latest template file and then paste the item in downloaded template and entered records must less than or equal to 1000.</li>
                  </ul>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
      </div>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>