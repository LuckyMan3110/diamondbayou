<div class="inner"> 
  <!--\\\\\\\left_nav end \\\\\\-->
  <div class="contentpanel"> 
  
  <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
  
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Site Management</h1>
        <h2 class="">Manage Home Page Content</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li class="active">Manage Home Page Content</li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix">
        <div class="heading"><h1>Manage Home Page Content</h1></div>
        <div class="body_content_bk">
            <form name="page_content_form" method="post" action="" enctype="multipart/form-data">
                <div class="set_submit_btn pull-right"><input type="submit" name="btn_submit" value="Submit Page" /></div>
                <div class="clear"></div><br>
            <table class="set_admin_table">
                <tr>
                    <th width="26%">Title</th>
                    <th>Upload Image File</th>
                    <th>Image Label</th>
                    <th>Page Link</th>
                </tr>
                <?php echo $content_rows; ?>              
            </table>
            </form>
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