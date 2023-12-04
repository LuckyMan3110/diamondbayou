<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <div>
<style>
    .cbp-spmenu-push div#page-wrapper {
        margin: 0 0 0 16em;
    }
    .form-horizontal .control-label {
        margin-bottom: 5px;
        text-align: left;
    }
</style>
       
<div class="search_box">
    
<form class="form-horizontal" action="" method="post">
<fieldset>

<!-- Form Name -->
<legend>EDIT PRODUCT - <?= $rowsring['item_title'] ?></legend>

<?php if ($msg_notify == 0){
  // nothing
}else if ($msg_notify == 1){ ?>
  <div class="alert alert-success alert-dismissable">
      <a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>    
        <?= $msg ?>
    </div>
    <hr>
<?php 
}else if ($msg_notify == 2){ ?>
  <div class="alert alert-danger alert-dismissable">
      <a class="close" href="#" data-dismiss="alert" aria-label="close">&times;</a>    
        <?= $msg ?>
    </div>
    <hr>
<?php
} 
?>

<div class="col-md-6">
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="item_title">Item Title</label>  
      <div class="col-md-12">
      <input id="product_name" name="item_title" placeholder="Item Title" class="form-control input-md" required="" value="<?= $rowsring['item_title'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="stock_real_number">Stock Number</label>  
      <div class="col-md-12">
      <input id="product_name" name="stock_real_number" placeholder="Stock Number" readonly="readonly" class="form-control input-md" required="" value="<?= $rowsring['stock_real_number'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="diamond_size">Diamond Size</label>  
      <div class="col-md-12">
      <input id="diamond_size" name="diamond_size" placeholder="Diamond Size" class="form-control input-md" value="<?= $rowsring['diamond_size'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="total_carats">Total Carats</label>  
      <div class="col-md-12">
      <input id="total_carats" name="total_carats" placeholder="Total Carats" class="form-control input-md" value="<?= $rowsring['total_carats'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="gender">Gender</label>  
      <div class="col-md-12">
      <input id="gender" name="gender" placeholder="Gender" class="form-control input-md" value="<?= $rowsring['gender'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="vendor_name">Vendor Name</label>  
      <div class="col-md-12">
      <input id="vendor_name" name="vendor_name" placeholder="Vendor Name" class="form-control input-md" value="<?= $rowsring['vendor_name'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="vendor_sku">Vendor SKU</label>  
      <div class="col-md-12">
      <input id="vendor_sku" name="vendor_sku" placeholder="Vendor SKU" class="form-control input-md" value="<?= $rowsring['vendor_sku'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="item_sku">Item SKU</label>  
      <div class="col-md-12">
      <input id="item_sku" name="item_sku" placeholder="Item SKU" class="form-control input-md" value="<?= $rowsring['item_sku'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="price_website">Price</label>  
      <div class="col-md-12">
      <input id="price_website" name="price_website" placeholder="Price" class="form-control input-md" value="<?= $rowsring['price_website'] ?>" type="text">
        
      </div>
    </div>
    
    
</div>

<div class="col-md-6">
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="metal_type">Metal Type</label>  
      <div class="col-md-12">
      <input id="metal_type" name="metal_type" placeholder="Metal Type" class="form-control input-md" value="<?= $rowsring['metal_type'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="category_type">Category Type</label>  
      <div class="col-md-12">
      <input id="category_type" name="category_type" placeholder="Category Type" class="form-control input-md" value="<?= $rowsring['category_type'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="weight">Weight</label>  
      <div class="col-md-12">
      <input id="weight" name="weight" placeholder="Weight" class="form-control input-md" value="<?= $rowsring['weight'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="chain_weight">Chain Weight</label>  
      <div class="col-md-12">
      <input id="chain_weight" name="chain_weight" placeholder="Chain Weight" class="form-control input-md" value="<?= $rowsring['chain_weight'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="quality">Quality</label>  
      <div class="col-md-12">
      <input id="quality" name="quality" placeholder="Quality" class="form-control input-md" value="<?= $rowsring['quality'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="center_stone_sizes">Center Stone Sizes</label>  
      <div class="col-md-12">
      <input id="center_stone_sizes" name="center_stone_sizes" placeholder="Center Stone Sizes" class="form-control input-md" value="<?= $rowsring['center_stone_sizes'] ?>" type="text">
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="avail_size">Avail Size</label>  
      <div class="col-md-12">
      <input id="avail_size" name="avail_size" placeholder="Avail Size" class="form-control input-md" value="<?= $rowsring['avail_size'] ?>" type="text">
      </div>
    </div>
    
    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="description">Description</label>
      <div class="col-md-12">                     
        <textarea class="form-control" id="description" name="description"><?= $rowsring['description'] ?></textarea>
      </div>
    </div>
    
    
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <button id="singlebutton" name="produbt_edit_action" class="btn btn-primary">Save</button>
  </div>
  </div>

</fieldset>
</form>
    

      
    </div>
</div>    
