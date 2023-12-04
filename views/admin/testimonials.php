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
    
    $testimonial_message 		= isset($details['testimonial_message']) ?  $details['testimonial_message'] : '';
    $testimonial_author_name 	= isset($details['testimonial_author_name']) ?  $details['testimonial_author_name'] : '';
    $testimonial_id 	= isset($details['testimonial_id']) ?  $details['testimonial_id'] : '';
    
    
    }else{                            
    
    $testimonial_message =  '';
    $testimonial_author_name = '';
    }
    $id         	= isset($id) ? $id : '';
    
    ?>
      <div class="blue_man">
        <div class="blue_admin_box1">
          <div class="addcountry_box">
            <div class="heading">
              <h1>
                <?=ucfirst($action) ?>
                Testimonials</h1>
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
              <form name="watchform" action="<?php echo config_item('base_url');?>admin/testimonial/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
                <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
                  <!--Warning Class--> 
                  <!--end of displaying warning class-->
                  
                  <tr>
                    <td width="20%" align="right">Author name</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <input type="text" name="testimonial_author_name" id="testimonial_author_name" value="<?=$testimonial_author_name; ?>"  style="width:250px;"/>
                      </dd></td>
                  </tr>
                  <tr>
                    <td width="20%" align="right">Message</td>
                    <td colspan="3"><dt id="account_name-label">&nbsp;</dt>
                      <dd id="account_name-element">
                        <textarea name="testimonial_message" id="testimonial_message" value="<?=$testimonial_message; ?>"  style="width:350px;height:200px;"></textarea>
                      </dd></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                      <dd id="edit-element">
                        <input type="submit" name="addbtn" id="addbtn" value="Save" class="search_but">
                      </dd>
                      &nbsp;</td>
                    <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt>
                      <dd id="back-element">
                        <button name="back" id="back" type="button" class="search_but" onclick="window.location.href='<?=config_item('base_url');?>admin/testimonial'">Back</button>
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
    $a = config_item('base_url')."admin/updaterolexgroup";
    ?>
      <form name="mywatchfrm" id="mywatchfrm" action="<?php echo $a; ?>" method="post">
        <div>
          <table id="results" style="display:none; ">
          </table>
        </div>
      </form>
      <?php }?>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>