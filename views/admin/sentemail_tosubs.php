<div class="inner">
<!--\\\\\\\ inner start \\\\\\-->
<div class="contentpanel">
    <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>Site Management</h1>
      <h2 class="">Send Message to Subscriber</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
        <li><a href="<?php echo SITE_URL; ?>admin/emails_subscriber">Send Message </a></li>
      </ol>
    </div>
  </div>
  <div class="orderdt_block">
    <h4>Email Content:</h4>
    <br>
    <?php echo $mesage; ?>
    <br>
    <div>
      <form name="emailForm" method="post" action="<?php echo htmlspecialchars($actionURL); ?>">
        <table>
          <tr>
            <th>Subscriber Name:</th>
            <td><input type="text" required="" value="<?php echo $details['first_name'].' '.$details['last_name']; ?>" name="subs_name" parsley-type="name" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>City:</th>
            <td><input type="text" required="" value="<?php echo $details['subs_city']; ?>" name="subs_city" parsley-type="country" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>State:</th>
            <td><input type="text" required="" value="<?php echo $details['subs_state']; ?>" name="subs_state" parsley-type="country" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
          <tr>
            <th>Country:</th>
            <td><input type="text" required="" value="<?php echo $details['subs_country']; ?>" name="subs_country" parsley-type="country" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>Contact No:</th>
            <td><input type="text" required="" value="<?php echo $details['phone_no']; ?>" name="subs_contact" parsley-type="country" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>Email Address:</th>
            <td><input type="email" required="" value="<?php echo $details['email_adres']; ?>" name="email_adres" parsley-type="email" class="form-control parsley-validated" id="inputEmail3" /></td>
          </tr>
          <tr>
            <th>From Email:</th>
            <td><input type="text" required="" value="<?php echo SITE_EMAIL; ?>" name="from_email" parsley-type="email" class="form-control parsley-validated" id="inputEmail3" /></td>
          </tr>
          <tr>
            <th>Subject:</th>
             <td><input type="text" value="Subscriber Email" name="email_subject" parsley-type="country" class="form-control parsley-validated" /></td>
          </tr>
          <tr>
            <th>Message:</th>
            <td><textarea class="form-control ckeditor" name="email_mesage" id="email_mesage" rows="6"></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><br><button type="submit" class="btn btn-primary">Send Email</button>
              &nbsp;
              <button class="btn btn-default">Cancel</button></td>
          </tr>
        </table>
      </form>
      
      <!-- End order detail -->
      <div class="clear"></div>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>
<script type="text/javascript" src="<?php echo ADMIN_LIB; ?>plugins/ckeditor/ckeditor.js"></script> 