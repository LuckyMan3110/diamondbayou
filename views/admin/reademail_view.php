<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Readmail</h1>
        <h2 class="">Subtitle goes here...</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">EMAIL</a></li>
          <li class="active">Readmail</li>
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
            <div class="pull-right">
              <div class="btn-group">
                <button title="" data-toggle="tooltip" type="button" class="btn btn-white tooltips" data-original-title="Archive"><i class="glyphicon glyphicon-hdd"></i></button>
                <button title="" data-toggle="tooltip" type="button" class="btn btn-white tooltips" data-original-title="Report Spam"><i class="glyphicon glyphicon-exclamation-sign"></i></button>
                <button title="" data-toggle="tooltip" type="button" class="btn btn-white tooltips" data-original-title="Delete"><i class="glyphicon glyphicon-trash"></i></button>
              </div>
              <div class="btn-group">
                <div class="btn-group nomargin">
                  <button title="" type="button" class="btn btn-white dropdown-toggle tooltips inbox_btn" data-toggle="dropdown" data-original-title="Move to Folder"> <i class="glyphicon glyphicon-folder-close"></i> <span class="caret"></span> </button>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="glyphicon glyphicon-folder-open"></i> Conference</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-folder-open"></i> Newsletter</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-folder-open"></i> Invitations</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-folder-open"></i> Promotions</a></li>
                  </ul>
                </div>
                <div class="btn-group nomargin">
                  <button title="" type="button" class="btn btn-white dropdown-toggle tooltips inbox_btn" data-toggle="dropdown" data-original-title="Label"> <i class="glyphicon glyphicon-tag"></i> <span class="caret"></span> </button>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="glyphicon glyphicon-tag"></i> Web</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-tag"></i> Photo</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-tag"></i> Video</a></li>
                  </ul>
                </div>
              </div>
              <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><i class="fa fa-reply"></i><span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu" style="margin:5px auto auto -105px;">
                  <li><a href="<?php echo $reply_link; ?>">Reply to All</a></li>
                  <li><a href="<?php echo $reply_link; ?>">Forward</a></li>
                  <li><a href="#">Print</a></li>
                  <li><a href="<?php echo $delete_email; ?>">Delete Message</a></li>
                  <li><a href="#">Report Spam</a></li>
                </ul>
              </div>
            </div>
            <!-- pull-right -->
            
            <div class="btn-group">
              <button title="" data-toggle="tooltip" type="button" class="btn btn-white tooltips" data-original-title="Read Previous Email"><i class="glyphicon glyphicon-chevron-left"></i></button>
              <button title="" data-toggle="tooltip" type="button" class="btn btn-white tooltips" data-original-title="Read Next Email"><i class="glyphicon glyphicon-chevron-right"></i></button>
            </div>
            <div class="read-panel">
              <div class="media">
                <div class="media-body"> <span class="media-meta pull-right">Yesterday at 1:30am</span>
                  <h4 class="text-primary"><?php echo $fullName; ?></h4>
                  <small class="text-muted">From: <?php echo $fromEmail; ?></small> </div>
              </div>
              <h4 class="email-subject"><?php echo $rowem->em_subject; ?></h4>
              <?php echo $rowem->em_message	; ?>
              
              <br>
              <div class="media">
                <div class="media-body">
                  <!--<textarea placeholder="Reply here..." class="form-control"></textarea>-->
                  <a class="btn btn-success" href="<?php echo $reply_link; ?>">Reply</a>
                </div>
              </div>
              <!-- /media --> 
              
            </div>
            <!--/ read-panel --> 
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
<script src="<?php echo ADMIN_LIB; ?>js/jquery-2.1.0.js"></script> 

<script>
    $(function(){
    $('#world-map').vectorMap();
    });
    </script> 
<script src="<?php echo ADMIN_LIB; ?>js/jPushMenu.js"></script> 
<script src="<?php echo ADMIN_LIB; ?>js/side-chats.js"></script>