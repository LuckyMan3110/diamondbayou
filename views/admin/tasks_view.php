<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1>task</h1>
          <h2 class="">Manage Tasks</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
            <li class="active">Manage Tasks</li>
          </ol>
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="task_bar clearfix">
          <div class="task_bar_left">
            <label>Search entries:</label>
            <input name="" type="text" placeholder=" Gallery search..." class="task_form"/>
            <button class="btn btn-primary btn-icon" type="button"><i class="fa fa-search"></i> </button>
          </div>
          <div class="task_bar_right">
            <label>Sorting:</label>
            <input name="" type="text" placeholder="SORT BY DATE" class="task_form"/>
            <button class="btn btn-primary btn-icon" type="button"><i class="fa fa-arrows-v"></i></button>
          </div>
        </div>
        <div class="row">
        <?php echo $message; //// view delte message  ?>
          <!--\\\\\\\ row  start \\\\\\-->
          <?php echo $taskDetail; //// view task list  ?>
          </div>
        <!--\\\\\\\ row  end \\\\\\-->
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>