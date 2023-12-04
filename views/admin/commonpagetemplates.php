<?php	
    $this->load->helper('custom');
?>
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
        <h2 class="">Page Manager</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">PAGE</a></li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix"> 
      <!--\\\\\\\ container  start \\\\\\-->
      <?php if(isset($success) && !empty($success)){ ?>
      <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success;   ?> </div>
      <?php } ?>
      <form action="<?php echo config_item('base_url');?>admin/commonpagetemplate" method="POST" name="templateidchooser" id="templateidchooser" class="form-horizontal row-border">
        <div class="form-group">
          <label class="col-sm-3 control-label">Template Page:</label>
          <div class="col-sm-9">
            <select name="templateid" id="templateid" class="form-control" onchange="document.templateidchooser.submit()">
              <?php 
					$pages .= '<option value="">Select template</option>';
					echo makeOptionSelected($pages , $templateid);
				?>
            </select>
          </div>
        </div>
        <!--/form-group-->
      </form>
      
      <form action="<?php echo config_item('base_url');?>admin/commonpagetemplate" method="POST" class="form-horizontal row-border">
        <div class="form-group">
          <label class="col-sm-3 control-label">Page Analytic Code:</label>
          <div class="col-sm-9">
            <input name="analytic_code" value="<?= isset($content['analytic_code'])?$content['analytic_code']:''; ?>" type="text" class="field_style" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Content:</label>
          <div class="col-sm-9">
            <textarea class="form-control ckeditor" name="page_content" id="page_content" rows="6"><?= isset($content['content'])?$content['content']:''; ?></textarea>
            <input type="hidden" name="templateid" value="<?php echo $templateid;?>">
          </div>
        </div>
        <!--/form-group-->
        <div class="bottom">
          <input type="submit" name="submit" id="edit" value="Save" class="btn btn-primary">
          <button name="back" id="back" type="button" class="btn btn-primary" onclick="history.go(-1);">Back</button>
        </div>
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
<script type="text/javascript" src="<?php echo ADMIN_LIB; ?>plugins/ckeditor/ckeditor.js"></script> 
<!-- /sidebar chats --> 