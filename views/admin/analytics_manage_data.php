<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Master Management</h1>
        <h2 class="">Manage Analytics Code</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li class="active"><a href="<?php echo SITE_URL; ?>analytic_sections/manage_analytics">Manage Analytics Code</a></li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix">
    <div>
    <?php if($action == 'add' || $action == 'edit') {
        $this->load->helper('custom','form');
    
        if(isset($details)){
    
            $brand_link = isset($details['brand_link']) ?  $details['brand_link'] : '';
            $content 	= isset($details['brand_content']) ?  $details['brand_content'] : '';
            $brand_name = isset($details['brand_name']) ?  $details['brand_name'] : '';
        } else {                      
            $image_type =  '';
            $content =  '';
            $brand_link =  '';
            $brand_name =  '';
            //$asin_price = '0.00';                                
        }
        
        $id = isset($id) ? $id : '';
                            
        ?>
<div class="blue_man">
   <div class="blue_admin_box1">			
      <div class="addcountry_box">
        <div class="heading">
          <h1><?=ucfirst($action) ?> Analytics Code</h1>
        </div>
            <!-- Message Part -->
            <div style="width:100%;">
             <? if(isset($success) && !empty($success)){ ?>
                <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold">
               
                      <? echo $success;   ?>
                 
                </div>
                <? } ?>
            </div>
            <div class="clear"></div>
            <!-- End -->
            <div class="search_box">
                 <form name="analyticCodeForm" action="<?php echo SITE_URL; ?>analytic_sections/manage_analytics/<?php echo $action; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
           <table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" class="table_border">
  <!--Warning Class-->
<!--end of displaying warning class-->          
  <tr>
      <td width="20%" align="right">Page Name :</td>
      <td colspan="3">
          <select name="page_name_id" required="">
              <option value="">--- Select Page Name ---</option>
              <?php echo $page_name_options; ?>
          </select>
      </td>
    </tr>
  <tr>
      <td width="20%" align="right">Analytic Code : </td>
      <td colspan="3">
<!--      <input name="analytic_code" required="" value="<?php echo $details['analytic_code']; ?>" type="text" style="width:350px;height:35px; padding: 0px 10px;" />-->
          <textarea name="analytic_code" required="" style="width:350px;height:150px; padding: 10px 10px; resize: none;"><?php echo $details['analytic_code']; ?></textarea>
        <input type="hidden" name="analytic_id" value ="<?php echo $id;  ?>" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><br>
          <input type="submit" name="<?=$action;?>btn" id="edit" value="Save" class="btn btn-primary">
          <button name="back" id="back" type="button" class="btn btn-primary" onclick="history.go(-1);">Back</button>
      </td>
    </tr>                     
     </table>
      </form>
</div>
   </div>		
 </div>
      <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
    </div>       
       
             
                
    <?php } else {
        $a = SITE_URL."admin/updaterolexgroup";
    ?>
    <form name="mywatchfrm" id="mywatchfrm" action="<?php echo $a; ?>" method="post">
    <div>
        <table id="results" style="display:none; "></table>
    </div>
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