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
    <div class="options"> <span>
      <?php if(isset($status)) echo $status?>
      </span>
      <form id="form1" name="form1" method="post" action="<?php echo config_item('base_url') ?>admin/ezpay">
        <label for="stuller">Stuller : </label>
        <select name="stuller" id="stuller">
          <option value="enable">Enable</option>
          <option value="disable">Disable</option>
        </select>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
      <form id="form2" name="form2" method="post" action="<?php echo config_item('base_url') ?>admin/ezpay">
        <label for="quality">Quality : </label>
        <select name="quality" id="stuller">
          <option value="enable">Enable</option>
          <option value="disable">Disable</option>
        </select>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
      <form id="form3" name="form3" method="post" action="<?php echo config_item('base_url') ?>admin/ezpay">
        <label for="unique">Unique : </label>
        <select name="unique" id="stuller">
          <option value="enable">Enable</option>
          <option value="disable">Disable</option>
        </select>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
      <form id="form4" name="form4" method="post" action="<?php echo config_item('base_url') ?>admin/ezpay">
        <label for="ez3">3EZ : </label>
        <input type="text" name="ez3" width="20px" value="<?php echo $ez3value ?>">
        <label for="ez5">5EZ : </label>
        <input type="text" name="ez5" width="20px" value="<?php echo $ez5value ?>">
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>