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
<legend>EDIT PRODUCT - <?= $rowsring['name'] ?></legend>

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
      <label class="col-md-12 control-label" for="name">Name</label>  
      <div class="col-md-12">
      <input id="product_name" name="name" placeholder="Name" readonly="readonly" class="form-control input-md" required="" value="<?= $rowsring['name'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="style_group">Style Group</label>  
      <div class="col-md-12">
      <input id="style_group" name="style_group" placeholder="Style Group" class="form-control input-md" value="<?= $rowsring['style_group'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="metal_weight">Metal Weight</label>  
      <div class="col-md-12">
      <input id="metal_weight" name="metal_weight" placeholder="Metal Weight" class="form-control input-md" value="<?= $rowsring['metal_weight'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="stone_weight">Stone Weight</label>  
      <div class="col-md-12">
      <input id="stone_weight" name="stone_weight" placeholder="Stone Weight" class="form-control input-md" value="<?= $rowsring['stone_weight'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="supplied_stones">Supplied Stones</label>  
      <div class="col-md-12">
      <input id="supplied_stones" name="supplied_stones" placeholder="Supplied Stones" class="form-control input-md" value="<?= $rowsring['supplied_stones'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="additional_stones">Additional Stones</label>  
      <div class="col-md-12">
      <input id="additional_stones" name="additional_stones" placeholder="Additional Stones" class="form-control input-md" value="<?= $rowsring['additional_stones'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="top_width">Top Width</label>  
      <div class="col-md-12">
      <input id="top_width" name="top_width" placeholder="Top Width" class="form-control input-md" value="<?= $rowsring['top_width'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="bottom_width">Bottom Width</label>  
      <div class="col-md-12">
      <input id="bottom_width" name="bottom_width" placeholder="Bottom Width" class="form-control input-md" value="<?= $rowsring['bottom_width'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="top_height">Top Height</label>  
      <div class="col-md-12">
      <input id="top_height" name="top_height" placeholder="Top Height" class="form-control input-md" value="<?= $rowsring['top_height'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="bottom_height">Bottom Height</label>  
      <div class="col-md-12">
      <input id="bottom_height" name="bottom_height" placeholder="Bottom Height" class="form-control input-md" value="<?= $rowsring['bottom_height'] ?>" type="text">
        
      </div>
    </div>
    
</div>

<div class="col-md-6">

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="ring_size">Ring Size</label>  
      <div class="col-md-12">
      <input id="ring_size" name="ring_size" placeholder="Ring Size" class="form-control input-md" value="<?= $rowsring['ring_size'] ?>" type="text">
        
      </div>
    </div>
    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="availblesize">Availblesize</label>
      <div class="col-md-12">                     
        <textarea class="form-control" id="availblesize" name="availblesize"><?= $rowsring['availblesize'] ?></textarea>
      </div>
    </div>
    <!-- Textarea -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="measurements">Measurements</label>
      <div class="col-md-12">                     
        <textarea class="form-control" id="measurements" name="measurements"><?= $rowsring['measurements'] ?></textarea>
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="product_id_set">Product ID Set</label>  
      <div class="col-md-12">
      <input id="product_id_set" name="product_id_set" placeholder="Product ID Set" class="form-control input-md" value="<?= $rowsring['product_id_set'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="metal_weight_bk">Metal Weight BK</label>  
      <div class="col-md-12">
      <input id="metal_weight_bk" name="metal_weight_bk" placeholder="metal_weight_bk" class="form-control input-md" value="<?= $rowsring['metal_weight_bk'] ?>" type="text">
        
      </div>
    </div>
    
    
    <script>
     function set_option_sub_category_lists(){
         
        var product_name            = $('#ring_id').val();
        var ringsMetal              = $('#ringsMetal').val();

        $.ajax({
            type: 'post',
            dataType : 'html',
            url: '<?php echo base_url(); ?>engagement_rings_fashion_jewelry/get_prive_retail_by_metal_wise/?product_name='+product_name+'&ringsMetal='+ringsMetal,
            success: function (data) {
                // DO WHAT YOU WANT WITH THE RESPONSE
                var result = data.split('|');
                $("#price").val(result[0]);
                $("#priceRetail").val(result[1]);

            }
        });
         
         
     }
    </script>
    <input id="ring_id" name="ring_id" placeholder="ring_id" value="<?= $rowsring['ring_id'] ?>" type="hidden">
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="ringsMetal">Metal Types</label>  
      <div class="col-md-12">
        <select id="ringsMetal" name="ringsMetal" onchange="set_option_sub_category_lists(this.value)" placeholder="ringsMetal" class="form-control input-md" type="text">
            <option value="PLAT">Select Metal Type (Default is PLAT)</option>
            <?php
                foreach($rowsring['ringsMetal'] as $ringsMetal){ ?>
                    <option value="<?= $ringsMetal['matalType'] ?>" <?php if($rowsring['matalType'] == $ringsMetal['matalType']){ echo 'selected'; } ?> ><?= $ringsMetal['matalType'] ?></option>
            <?php }
            ?>
        </select>  
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="price">Price</label>  
      <div class="col-md-12">
      <input id="price" name="price" placeholder="Price" class="form-control input-md" value="<?= $rowsring['price'] ?>" type="text">
        
      </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-12 control-label" for="priceRetail">Price Retail</label>  
      <div class="col-md-12">
      <input id="priceRetail" name="priceRetail" placeholder="Price Retail" class="form-control input-md" value="<?= $rowsring['priceRetail'] ?>" type="text">
        
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