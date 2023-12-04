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
    $email		= isset($details['email']) ?  $details['email'] : '';
    $content 	= isset($details['description']) ?  $details['description'] : '';
    $status 	= isset($details['status']) ?  $details['status'] : '';
    
    
    }else{
    
    $status =  '';
    $content =  '';
    $email =  '';
    }
    $id         	= isset($id) ? $id : '';
    
    ?>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>
                <?=ucfirst($action) ?>
                Feedback Manager</h1>
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
              <form name="watchform" action="<?php echo config_item('base_url');?>admin/feedbacks/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
                <table width="95%" align="center" cellpadding="10" cellspacing="10">
                  <tr>
                    <td width="20%" align="right">Email:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="email" id="email" value="<?=$email; ?>"  style="width:150px;"/>
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Status:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <?
    $status_arr = array('new' => 'New' , 'accepted' => 'Accepted' ,'rejected' => 'Rejected');
    ?>
                        <select name='status' id="status">
                          <?
    foreach($status_arr as $key => $v):
    if($key == $status){
    echo "<option value='".$key."' selected='selected'>".$v."</option>";
    }else{
    echo "<option value='".$key."' >".$v."</option>";
    }
    endforeach;
    ?>
                        </select>
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Feedback:</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <textarea  name="description" id="description" style="width:280px;height:100px;"> <?=$content; ?>
</textarea>
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
      <?php }else{    
    ?>
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