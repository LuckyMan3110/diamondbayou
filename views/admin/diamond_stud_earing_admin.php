<div class="inner">
    <style>
        .main_form_heading{background: #282828; color: #fff; padding: 4px 2px 6px 6px; font-size: 20px; font-weight: bold;}
        .form_table{width:100%; border-collapse: collapse;}
        .form_table tr td input[type=text]{width:70px; border: 1px solid #ccc; padding: 2px 5px; margin-bottom: 5px;}
        .table_abov_heading{font-size: 22px;}
        .content_area{padding: 20px;}
        .submit_btn{text-align: right;}
        .submit_btn input[type=submit]{width: 130px; padding: 7px; text-transform: uppercase; font-weight: bold;}
    </style>
<!--\\\\\\\ inner start \\\\\\-->
<div class="contentpanel">
    <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
<div class="blue_man content_area">
<div class="blue_admin_box1">
<div class="addcountry_box">
  <div class="heading">
    <h1 class="hbb"><?php echo $page_name; ?></h1>
    <br/>
  </div>
  <!-- Message Part -->
  <div style="width:100%;">
    <?php if(isset($success) && !empty($success)){ ?>
    <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <?php echo $success; ?> </div><br>
    <?php } ?>
  </div>
  <div style="clear:both"></div>
  <!-- End -->
  <div class="search_box">
    <form name="addEditForm" id="addEditForm" action="" method="post" enctype="multipart/form-data" >
        <?php echo $stullers_stud_lists; ?>
    </form>
 </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>