<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      
    <script>
        //// list the quality sub categories
        function getDetailsByStockNumber() {
        	
        	var enter_stock_number = $("#enter_stock_number").val();
        	
        	if(enter_stock_number == ''){
        	    alert('Enter a Stock Number');
        	    $("#enter_stock_number").focus();
        	    return false;
        	}else{
                
        	    $("#show_details_by_stock").html('Please Wait. Data Loading.......');
        	    
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>admin/get_details_by_stock_id?stock_id='+enter_stock_number,
                    success: function(data) {
    
                        $("#show_details_by_stock").html(data).fadeIn();
    
                    }
                });
        	    
        	}
        	
        	
        }
    </script>
      
     <!-- main menu start -->
    <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
    <!-- main menu end -->
    
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Inventory Price Management</h1>
        <h2 class="">Reset Wholesale Price</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li class="active">Inventory Mgmt.</li>
        </ol>
      </div>
    </div>
            
    <style type="text/css">
    .options { margin: 20px 0px 0px 30px; float:left; }
	select{ width:170px !important;}
    </style>
    
    
        
    <?php if ($msg_notify == 0){
      // nothing
    }else if ($msg_notify == 1){ ?>
      <div class="alert alert-success alert-dismissable">
          <a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>    
            <?= $msg ?>
        </div>
        <hr>
    <?php }else if ($msg_notify == 2){ ?>
      <div class="alert alert-danger alert-dismissable">
          <a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>    
            <?= $msg ?>
        </div>
        <hr>
    <?php } ?> 
            
    <div id="uniqueMesage"></div>
    <div class="options">

         <form class="form-inline" action="">
          <div class="form-group">
            <label for="email">Enter Stock Number:</label>
            <input type="text" class="form-control" id="enter_stock_number">
          </div>
          <button type="button" class="btn btn-default" onclick="getDetailsByStockNumber();">Get Details</button>
        </form> 
        
        <br><br>
        <div id="show_details_by_stock">
            
            <?php
            
            if( isset($_GET['old_stock_number']) ){
                $search_result = '
                    <form class="form" action="">
                      <h4>Update Wholesale Price in This Item</h4><br>
                      <div class="form-group">
                        <label for="email">Stock Number:</label>
                        <input type="text" class="form-control" id="old_stock_number" readonly="readonly" name="old_stock_number" value="'.$_GET['old_stock_number'].'">
                      </div>
                      <div class="form-group">
                        <label for="email">Enter Wholesale Price:</label>
                        <input type="text" class="form-control" id="enter_wholesale_price" name="enter_wholesale_price" required="required">
                      </div>
                      <button type="submit" class="btn btn-default" name="update_wholesale_price_btn">Submit</button>
                    </form>';
            
                echo $search_result;
            }
            
            ?>
            
        </div>

      
    </div>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<div class="clearfix"></div>

<?php echo popupsOtherBlockData(); ?>