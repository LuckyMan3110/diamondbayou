<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Manage Users</h1>
        <h2 class="">Trial Users</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li class="active">Manage Trial Users</li>
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
                <h1>Manage Trial Users</h1>
              </div>
              <!-- Message Part -->
              <div style="width:100%;">
                <? if(isset($success) && !empty($success)){ ?>
                <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success;   ?> </div>
                <? } ?>
              </div>
              <div style="clear:both"></div>
              <!-- End -->
              <div class="orderdt_block">
              <?php echo $rturn_msg; ?>
                <form method="post" action="<?php echo htmlspecialchars($action_link); ?>" enctype="multipart/form-data" name="customerForm">
   <?php
	 //echo setForm($action_link, 'customerForm')?>
      <table class="order_info">
            <tr>
              <td width="25%">First Name*</td>
              <td><input type="text" name="fname" id="fname" value="<?php echo $fname;?>" />
			  <?php echo form_error('fname');?></td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td><input type="text" name="lname" id="lname" value="<?php echo $lname;?>">
                <?php echo form_error('lname');?></td>
            </tr>
            <tr>
              <td>Phone No. </td>
              <td><input type="text" name="phone_no" id="phone_no" value="<?php echo $phone_no;?>" />
                <?php echo form_error('phone_no');?><b></b><br></td>
            </tr>
            <tr>
              <td>Username </td>
              <td><input type="text" name="txt_uname" id="txt_uname" value="<?php echo $user_name;?>" /></td>
            </tr>
            <tr>
              <td>Email Address</td>
              <td><input type="email" name="txt_email" id="txt_email" value="<?php echo $email_adres;?>" />
              <?php echo form_error('txt_email');?><b></b><br></td>
            </tr>
            <tr>
              <td>Login Password</td>
              <td><input type="text" name="login_pass" id="login_pass" maxlength="14" required="required" value="<?php echo $login_pass;?>" /></td>
            </tr>
            <tr>
              <td>Industry</td>
              <td>
              	<select name="cmb_industry">
                <option value="">Select An Industry</option>
                    <?php echo $option_induslist; ?>
            	</select>
              </td>
            </tr>
            <tr>
              <td>Account Type:</td>
              <td>
              	<select name="account_type">
                    <?php echo $acount_type; ?>
            	</select>
              </td>
            </tr>
             <tr>
              <td>Job Title</td>
              <td><input type="text" name="job_title" id="job_title" value="<?php echo $job_title;?>" /></td>
            </tr>
            <tr>
              <td>Company Name</td>
              <td><input type="text" name="company_name" value="<?php echo $company_name;?>" /></td>
            </tr>
            <tr>
              <td>Company Logo</td>
              <td><input type="file" name="site_logo" />
              <div>
              	<?php echo $companys_logo; ?>
              </div>
              </td>
            </tr>
            <tr>
              <td colspan="2"><div class="accountButton"><input type="submit" name="btn_prefsubmit" value="Submit" class="btn btn-primary" />
              <a href="<?php echo $resent_link; ?>" class="btn btn-primary">Resent Email</a>
              </div></td>
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