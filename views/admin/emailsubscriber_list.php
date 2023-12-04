<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Site Management</h1>
        <h2 class="">Email Subscriber</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li class="active">Email Subscriber</li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix">
      <div>
        <?php if($action == 'add' || $action == 'edit'){
    $this->load->helper('custom','form');
    
    if(isset($details)){
    
    $brand_link 		= isset($details['brand_link']) ?  $details['brand_link'] : '';
    $content 	= isset($details['brand_content']) ?  $details['brand_content'] : '';
    $brand_name 	= isset($details['brand_name']) ?  $details['brand_name'] : '';
    
    
    }else{                            
    
    $image_type =  '';
    $content =  '';
    $brand_link =  '';
    $brand_name =  '';
    //$asin_price = '0.00';
    
    }
    $id         	= isset($id) ? $id : '';
    
    ?>
        <div class="blue_man">
          <div class="blue_admin_box1">
            <div class="addcountry_box">
              <div class="heading">
                <h1>Email Subscriber</h1>
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
                <form name="watchform" action="<?php echo config_item('base_url');?>admin/manage_comments/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
                  <table class="table_border">
                    <!--Warning Class--> 
                    <!--end of displaying warning class-->
                    
                    <tr>
                      <td width="20%" align="right">Full Name</td>
                      <td colspan="3">
                        <dd id="account_name-element">
                          <input type="text" name="fullName" id="fullName" readonly="readonly" value="<?php echo $details['full_name']; ?>" />
                          <input type="hidden" name="comments_id"  id="comments_id" value ="<?php echo $id;  ?>"  style="width:120px;"/>
                        </dd></td>
                    </tr>
                    <tr>
                      <td align="right">Email Address</td>
                      <td colspan="3">
                        <dd id="account_name-element">
                          <input type="text" name="email_adres" readonly="readonly" value="<?php echo $details['email_adress']; ?>" />
                        </dd></td>
                    </tr>
                    <tr>
                      <td align="right">Comments Status</td>
                      <td colspan="3">
                        <dd id="account_name-element">
                          <select name="cmb_status">
                          <?php
						  	echo '<option value="UP" '.selectedOption($details['status'], 'UP').'>Under Process</option>
                            	  <option value="AP" '.selectedOption($details['status'], 'AP').'>Approved</option>';
						  ?>
                          </select>
                        </dd></td>
                    </tr>
                    <tr>
                      <td width="20%" align="right">Post Comments</td>
                      <td colspan="3">
                        <dd id="account_name-element">
                          <textarea name="coment_content" id="coment_content" style="width:400px;height:200px;"><?=$details['post_comments']; ?></textarea>
                        </dd></td>
                    </tr>
                    <tr>
                      <td align="right">&nbsp;</td>
                      <td width="3%" align="left" valign="top"><dt id="edit-label">&nbsp;</dt>
                        <dd id="edit-element">
                          <input type="submit" name="<?=$action;?>btn" id="edit" value="Save" class="btn btn-primary">
                        </dd>
                        &nbsp;</td>
                      <td width="74%" align="left" valign="top"><dt id="back-label">&nbsp;</dt>
                        <dd id="back-element">
                          <button name="back" id="back" type="button" class="btn btn-primary" onclick="history.go(-1);">Back</button>
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
      <!--\\\\\\\ container  end \\\\\\--> 
    </div>
    <!--\\\\\\\ content panel end \\\\\\--> 
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>