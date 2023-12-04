<style>
    .flexigrid div.bDiv td{border: 1px solid #ccc !important; padding: 0px 10px 0px 0px !important;}
    .flexigrid div.hDiv th, div.colCopy{ border: 1px solid #ccc !important; border-bottom: 0px !important; padding: 0px 10px 0px 0px !important;}
</style>
<div class="inner">
<!--\\\\\\\ inner start \\\\\\-->
<div class="contentpanel">
    <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
<div class="blue_man">
<div class="blue_admin_box1">
<div class="addcountry_box">
  <!-- Message Part -->
  <div style="width:100%;">
    <? if(isset($success) && !empty($success)){ ?>
    <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success;   ?> </div>
    <? } ?>
  </div>
  <div style="clear:both"></div>
  <!-- End -->
  <div class="search_box"> 
    <div class="ebayExportResponse"></div>
      <div id="jewelry_update"></div>
    <div>
    <form name="rapnetstones" method="post" action="<?php echo config_item('base_url')?>admin/searchStones" enctype="multipart/form-data" id="rapnetstones">
      <table id="results" style="display:none; "></table>
    </form>
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>