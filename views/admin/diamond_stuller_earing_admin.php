<div class="inner">
<script>
function submit_stuller_form() {

        var dataString = $('#addEditForm').serialize();

        $.ajax({
         type: "POST",
         url: base_url+'admin/managed_stuller_page/<?php echo $page_option; ?>',
         data: dataString,
         success: function(response) {
                $("#view_stuller_form").html('<div class="success_msg"> ' + response + ' </div>');
        },
                    error: function(){alert('Error ');}
     });
}
function update_stuller_form(stuller_id) {

        var dataString = $('#addEditForm').serialize();

        $.ajax({
         type: "POST",
         url: base_url+'admin/update_stuller_page/<?php echo $page_option; ?>/' + stuller_id,
         data: dataString,
         success: function(response) {
                $("#view_stuller_form").html('<div class="success_msg"> ' + response + ' </div>');
        },
                    error: function(){ return true;}
     });
}

function view_options_block(blockID) {
    $("#"+blockID).show();
}
function detail_price_update(pid, detail_id) {

        var dataString = $('#addEditForm').serialize();

        $.ajax({
         type: "POST",
         url: base_url+'admin/update_stuller_detial/' + pid + '/' + detail_id + '/<?php echo $page_option; ?>',
         data: dataString,
         success: function(response) {
                $("#view_stuller_form").html('<div class="success_msg"> ' + response + ' </div>');
        },
                    error: function(){ return true;}
     });
}
</script>
<!--\\\\\\\ inner start \\\\\\-->
<div class="contentpanel">
    <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
<div class="blue_man content_area">
<div class="blue_admin_box1">
<div class="addcountry_box">
  <div class="heading">
    <h1 class="hbb"><?php echo $stuller_title; ?></h1>
    <br/>
  </div>
  <!-- Message Part -->
  <div style="width:100%;">
    <?php if(isset($submit_option) && !empty($submit_option)){ ?>
    <div class="success_msg"> <?php echo $submit_option; ?> </div>
    <?php } ?>
  </div>
  <div style="clear:both"></div>
  <div id="view_stuller_form"></div>
  <!-- End -->
  <div class="search_box">
    <form name="addEditForm" id="addEditForm" action="" method="post" enctype="multipart/form-data" >       
<!--        <div class="submit_btn"><input type="submit" name="btn_submit" value="Submit <?php echo $stuller_title; ?>" /></div><br>-->
        <div><b>Search Item # &nbsp;&nbsp;</b>
          <input type="text" name="item_number" value="" />  
          <input type="submit" name="btn_submit" value="Submit" />  
        </div><br>
        <div class="">
            <table class="form_table stuller_table_view">
                <?php echo $stuller_rows; ?>
            </table>
        </div>
    </form>
 </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>