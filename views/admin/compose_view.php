<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>compose</h1>
        <h2 class="">Subtitle goes here...</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
          <li><a href="<?php echo SITE_URL; ?>admin/inbox">EMAIL</a></li>
          <li class="active">Compose</li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix"> 
      <!--\\\\\\\ container  start \\\\\\-->
      
      <div class="row">
        <div class="col-sm-3 col-lg-2"> <a class="btn btn-danger btn-block btn-compose-email" href="<?php echo SITE_URL; ?>admin/compose">Compose Email</a>
          <ul class="nav nav-pills nav-stacked nav-email">
            <li class="active"> <a href="<?php echo SITE_URL; ?>admin/inbox"> <span class="badge pull-right"><?php echo $totalEmails; ?></span> <i class="glyphicon glyphicon-inbox"></i> Inbox </a> </li>
            <li><a href="#"><i class="glyphicon glyphicon-star"></i> Starred</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-send"></i> Sent Mail</a></li>
            <li> <a href="#"> <span class="badge pull-right">3</span> <i class="glyphicon glyphicon-pencil"></i> Draft </a> </li>
            <li><a href="#"><i class="glyphicon glyphicon-trash"></i> Trash</a></li>
          </ul>
          <div class="mb30"></div>
          <h5 class="subtitle">Folders</h5>
          <ul class="nav nav-pills nav-stacked nav-email mb20">
            <li> <a href="email.html"> <span class="badge pull-right">2</span> <i class="glyphicon glyphicon-folder-open"></i> Conference </a> </li>
            <li><a href="#"><i class="glyphicon glyphicon-folder-open"></i> Newsletter</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-folder-open"></i> Invitations</a></li>
            <li> <a href="#"> <i class="glyphicon glyphicon-folder-open"></i> Promotions </a> </li>
          </ul>
        </div>
        <!-- col-sm-3 -->
        
        <div class="col-sm-9 col-lg-10">
          <div class="block-web">
          <?php echo $email_msg; ?>
            <div class="compose-mail">
              <form method="post" action="<?php echo $email_link; ?>" role="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="" for="to">To:</label>
                  <input type="text" class="form-control" required="required" name="from_email" id="to" value="<?php echo $fromEmail; ?>" tabindex="1">
                  <div class="compose-options"> <a href="compose-mail" onclick="$(this).hide(); $('#cc').parent().removeClass('hidden'); $('#cc').focus();">Cc</a> <a href="javascript:;" onclick="$(this).hide(); $('#bcc').parent().removeClass('hidden'); $('#bcc').focus();">Bcc</a> </div>
                </div>
                <div class="form-group hidden">
                  <label class="" for="cc">Cc:</label>
                  <input type="text" class="form-control" name="cc_email" id="cc" tabindex="2">
                </div>
                <div class="form-group hidden">
                  <label class="" for="bcc">Bcc:</label>
                  <input type="text" class="form-control" name="bcc_email" id="bcc" tabindex="2">
                </div>
                <div class="form-group">
                  <label class="" for="subject">Subject:</label>
                  <input type="text" required="required" class="form-control" value="<?php echo $email_subject; ?>" name="email_subject" id="subject" tabindex="1">
                  <input type="hidden" value="<?php echo $email_id; ?>" name="email_id" id="email_id" />
                  <input type="hidden" value="<?php echo $email_type; ?>" name="email_type" id="email_id" />
                </div>
                <div class="compose-editor" style="margin-top:10px;">
                  <textarea id="text-editor" required class="compose-editor2 col-xs-12" name="email_message" placeholder="Enter text ..." rows="25"><?php echo $email_mesage; ?></textarea>
                </div>
                <div class="compose-editor">
                  <input type="file" name="email_file" class="default" />
                </div>
                <br>
                <div class="bottom">
              <button class="btn btn-success" name="reset" type="reset">Reset</button>
              <button class="btn btn-primary" type="submit" name="btn_submit">Send</button>
            </div>
              </form>
            </div>
          </div>
          <!--/ block-web --> 
        </div>
        <!-- /col-sm-9 --> 
      </div>
      <!--/row--> 
      
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

<div class="demo"><span id="demo-setting"><i class="fa fa-cog txt-color-blueDark"></i></span>
  <form>
    <legend class="no-padding margin-bottom-10" style="color:#6e778c;">Layout Options</legend>
    <section>
      <label>
        <input type="checkbox" class="checkbox style-0" id="smart-fixed-header" name="subscription">
        <span>Fixed Header</span></label>
      <label>
        <input type="checkbox" class="checkbox style-0" id="smart-fixed-navigation" name="terms">
        <span>Fixed Navigation</span></label>
      <label>
        <input type="checkbox" class="checkbox style-0" id="smart-rigth-navigation" name="terms">
        <span>Right Navigation</span></label>
      <label>
        <input type="checkbox" class="checkbox style-0" id="smart-boxed-layout" name="terms">
        <span>Boxed Layout</span></label>
      <span id="smart-bgimages" style="display: none;"></span></section>
    <section>
      <h6 class="margin-top-10 semi-bold margin-bottom-5">Clear Localstorage</h6>
      <a id="reset-smart-widget" class="btn btn-xs btn-block btn-primary" href="javascript:void(0);"><i class="fa fa-refresh"></i> Factory Reset</a></section>
    <h6 class="margin-top-10 semi-bold margin-bottom-5">Ultimo Skins</h6>
    <section id="smart-styles"><a style="background-color:#23262F;" class="btn btn-block btn-xs txt-color-white margin-right-5" id="dark_theme" href="javascript:void(0);"><i id="skin-checked" class="fa fa-check fa-fw"></i> Dark Theme</a><a style="background:#E35154;" class="btn btn-block btn-xs txt-color-white" id="red_thm" href="javascript:void(0);">Red Theme</a><a style="background:#34B077;" class="btn btn-xs btn-block txt-color-darken margin-top-5" id="green_thm" href="javascript:void(0);">Green Theme</a><a style="background:#56A5DB" class="btn btn-xs btn-block txt-color-white margin-top-5" data-skinlogo="img/logo-pale.png" id="blue_thm" href="javascript:void(0);">Blue Theme</a><a style="background:#9C6BAD" class="btn btn-xs btn-block txt-color-white margin-top-5" id="magento_thm" href="javascript:void(0);">Magento Theme</a><a style="background:#FFFFFF" class="btn btn-xs btn-block txt-color-black margin-top-5" id="light_theme" href="javascript:void(0);">Light Theme</a></section>
  </form>
</div>
    <script src="<?php echo ADMIN_LIB; ?>plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script> 
    <script src="<?php echo ADMIN_LIB; ?>plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>  
<script>
    $(document).ready(function() {
    $('#text-editor').wysihtml5();	
    $("#quick-access").css("bottom","0px");				
    });		
    </script>