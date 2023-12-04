<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <style type="text/css">
    .options {
    margin-left: 400px;
    }
    </style>
    <div class="options" style="   height: 200px;    margin-top: 100px;">
      <form id="form1" name="form1" method="post" action="">
        <label for="stuller">Price : </label>
        <input type="price" name="price" value="<?=$price?>" >
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>