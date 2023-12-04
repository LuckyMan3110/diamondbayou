<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>Modules</h1>
      <h2 class="">Manage Rappnet Logins</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
        <li>Rappnet Login</li>
      </ol>
    </div>
  </div>
   <div class="orderdt_block">
   <h4>Set Rappent Login Details</h4>
   <form method="post" action="<?php echo htmlspecialchars($action_link); ?>" name="rappnetForm">
   <?php
	 //echo setForm($action_link, 'customerForm')?>
      <table class="order_info">
            <tr>
              <td width="25%">User Name</td>
              <td><input type="text" name="rapp_user" id="rapp_user" required="required" value="<?php echo $results['rappnet_user'];?>" />
			  <?php echo form_error('fname');?></td>
            </tr>
            <tr>
              <td>Rappnet Password</td>
              <td><input type="password" name="rapp_pass" id="rapp_pass" required="required" value="<?php echo $results['rappnet_pass'];?>"></td>
            </tr>
            <tr>
              <td colspan="2"><div class="accountButton"><input type="submit" name="btn_prefsubmit" value="Submit" class="accountBtn" /></div></td>
            </tr>
            </table>
    </form>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>