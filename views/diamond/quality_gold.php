    <!-- Datatable CSS -->
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Datatable JS -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <link href='https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/css/lightslider.min.css' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/js/lightslider.min.js"></script>

    <style>
       #diamond_grid_filter input[type="search"]{ height: 35px; border: solid 1px #ccc;padding: 5px; }
       table.dataTable thead th, table.dataTable thead td { border-bottom: 1px solid #ccc !important; }
       table.dataTable tfoot th, table.dataTable tfoot td {border-top: 1px solid #ccc !important;}
       table.dataTable tbody th, table.dataTable tbody td { padding: 0px 0px !important;}
        #loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #3498db;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
          margin-left:200px;
          margin-top:30px;
          position:absolute !important;
          top:50%;
          left:35%;
        }
        .dataTables_wrapper .dataTables_processing {
            position: absolute !important;
            top: 3% !important;
            left: 25% !important;
            width: 100% !important;
            height: 40px;
            margin-left: -50%;
            margin-top: -25px;
            padding-top: 20px;
            background-color:transparent !important;
            background:transparent !important;
        }
        #diamond_grid_length{
            margin-bottom: 10px;
        }
        
         
        
        /* Icons */
        .icon {
          display: inline-block;
          width: 16px;
          height: 16px;
          vertical-align: middle;
          fill: currentcolor;
        }                
        .modal-overlay {
          position: fixed;
          z-index: 10;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: hsla(0, 0%, 0%, 0.5);
          visibility: hidden;
          opacity: 0;
          transition: visibility 0s linear 0.3s, opacity 0.3s;
        }               
        .modal-wrapper {
          position: fixed;
          z-index: 9999;
          top: 10%;
          left: 30%;
          min-height:450px;
          width: 850px;
          margin-left: -16em;
          background-color: #fff;
          box-shadow: 0 0 1.5em hsla(0, 0%, 0%, 0.35);
        }
        .add_to_cart_btn{
            margin:10px 0px;
            border:solid 1px #E6A431;
        }
        .modal-transition {
          transition: all 0.3s 0.12s;
          transform: translateY(-10%);
          opacity: 0;
        }
        .modal-header,
        .modal-content {
          padding: 1em;
        }
        .view-diamond-modal-body{
            padding:15px;
        }
        .modal-header {
          position: relative;
          background-color: #fff;
          box-shadow: 0 1px 2px hsla(0, 0%, 0%, 0.06);
          border-bottom: 1px solid #e8e8e8;
        }
        .modal-header h4 {
            letter-spacing: 0px;
            text-align: left;
            font-weight: 700;
            font-size: 15px;
            margin: 0.5em 0;
        }
        .modal-close {
            position: absolute;
            top: -27px;
            right: -20px;
            padding: 10px 15px;
            color: #fff;
            background: none;
            border: 0;
            background-color: #E6A431;
            font-size: 20px;
            border-radius: 50px;
        }
        .modal-close:hover{
            color: #fff;
        }
        
        .modal-close:hover {
          color: #777;
        }
        
        .modal-heading {
          font-size: 1.125em;
          margin: 0;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
        }
        
        .modal-content > *:first-child {
          margin-top: 0;
        }
        .modal-content > *:last-child {
          margin-bottom: 0;
        }
        #more-details-view{
            border-color: #c4c1bc;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 1px medium !important;
            font: 11px Arial, Helvetica, sans-serif;
            border: 1px solid #c4c1bc !important;
        }
        #more-details-view td{
            padding:2px !important;
            border-top: 0px solid #c4c1bc !important;
            border-bottom: 1px solid #c4c1bc !important;
        }
        #diamond-slider-area{
            width:350px;
            height:450px;
        }
        #diamond-slider-box, .view-diamond-modal-content{
            height:450px !important;
        }
        #diamond-slider-area ul {
            list-style: none outside none;
            padding-left: 0;
            margin-bottom:0;
        }
        #diamond-slider-area li {
            display: block;
            float: left;
            margin-right: 6px;
            cursor:pointer;
        }
        #diamond-slider-area img {
            display: block;
            height: auto;
            max-width: 100%;
            border:solid 1px #ccc;
        }
        .lSGallery{
            width:350px !important;
        }
        .lSGallery li{
            width:60px !important;
            padding:3px;
        }
    </style>
    
    <?php
    
        function getCountResult($getTable,$where){
                    
            $CI =& get_instance();
            $CI->db->where( $where );
    	    $CI->db->from($getTable);
    	    
            return number_format($CI->db->count_all_results());
        }
         
        function filterCheckedOut($getKey, $getKeyName){
            if( isset($_GET[$getKey]) AND !empty($_GET[$getKey]) AND $_GET[$getKey] == $getKeyName ){
                return 'checked="checked"';
            }    
        }
        
        function filterCheckedClassRect($getKey, $getKeyName){
            if( isset($_GET[$getKey]) AND !empty($_GET[$getKey]) AND $_GET[$getKey] == $getKeyName ){
                return 'class="active-reactectgular"';
            }    
        }
        
        function filterCheckedSetClass($getKey, $getKeyName, $getClass){
            if( isset($_GET[$getKey]) AND !empty($_GET[$getKey]) AND $_GET[$getKey] == $getKeyName ){
                return 'class="'.$getClass.'"';
            }    
        }
    
    ?>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="sliderFilters row-fluid">
        
        <div class="filterCols col-sm-12 filter_show_hide" style="padding:15px 30px;">
            
            <table width="100%"  style="margin-top:20px;">
                <tr>
                    <td width="15%" style="vertical-align: top;"><label>Price</label></td>
                    <td width="85%" style="vertical-align: top;"> 
                    
                        <div id="price_slider_range"></div>
                        <table width="100%">
                            <tr>
                                <td width="50%" style="text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="amount" class="diamond-search-input amount" value="<?php if($_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>"> <span class="filter_field_info">MIN</span><td>
                                <td width="50%" style="text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input amount2" id="amount2" value="9999"><td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table> 
            
        </div>
        <div class="clear"></div>
    </div>
    <div class="event_list_right_area" style="position: relative;">
        <h2 style="cursor: pointer;  text-align: right;  top: -10px;  position: absolute;  line-height: 0;  z-index: 90;  right: 0;font-size: 40px;color:#999;" onclick="eventFilterShowHideFunc()"><span class="show-hide-filter-icon"><i class="fa fa-angle-down"></i></span></h2>
    </div>
    
    <script>
        function eventFilterShowHideFunc(){
            jQuery(".filter_show_hide").toggle();
            jQuery(".show-hide-filter-icon").find('i').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
        }
    </script>

    <section class="main_content_bg">
        <div class="container set_col_pading">
            <div class="col-sm-4 result_page_left">
                <div class="set_page_subhead">Refine Your Search <button type="button" style="display:none;" id="btn-reload">Reload</button></div>
                <div class="result_page_content">
                    
                <?php 
                //array('White Gold','Rose Gold','Sterling Silver','Yellow Gold','Two-Tone Gold','Yellow Gold & Sterling Silver','Brass','Tri-Color Gold','Stainless Steel','White & Rose Gold','Rose Gold Plated Silver','Rose Gold & Sterling Silver');
                $incree = 1;
                $make_dynamic_main_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('dev_jewelries', array('stock_number >' => 0), 'metal', 'stock_number');
                foreach($make_dynamic_main_fields as $main_fields){
                    
                     if($main_fields['metal']){
                ?>        
        
                <div class="filter_block_section" style="display:;">
                    <div class="inner_sub_heading">
                        <?php 
                            echo $metal_name = $main_fields['metal'];
                        ?>
                        <div class="clear"></div>
                    </div>
                    <?php 
                    
                    $make_dynamic_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('dev_jewelries', array('metal' => $metal_name), 'category', 'stock_number');
                    foreach($make_dynamic_fields as $fields){
                        if($fields['category']){
                            
                        $where_category         = array('category_id' => $fields['category']);
                        $get_category_data      = $this->catemodel->getdata_any_table_where($where_category, 'dev_ebaycategories');
                    ?>
                    <div class="fiter_item_row">
                        <label>
                        <span><input name="clarity" type="checkbox" id="M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?>" class="M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?>" value="<?= $fields['category'] ?>" /></span>
                        <span><b><?= $get_category_data[0]->category_name ?></b> (<?php echo getCountResult('dev_jewelries', array('metal' => $metal_name, 'category' => $fields['category'], 'ABS(price_website) >' => 0) ); ?>)</span>
                        </label>
                    </div>
                    <?php }
                        } ?>
                    <div class="bottom_line"></div><br>
                    <div class="clear"></div>                    
                </div>
                
                <?php 
                $incree++;
                     }
                } ?>
                
                <div class="filter_block_section">
                    <div class="inner_sub_heading">
                        Price
                        <span><a href="#">See All</a></span>
                        <div class="clear"></div>
                    </div>
                    <div class="fiter_item_row price_fiedl_filter">
                        <span>From $ <input type="text" name="price_from" class="amount" id="price_from" /></span>
                        <span>To $ <input type="text" name="price_to" class="amount2" id="price_to" /></span>
                    </div>
                    <div class="bottom_line"></div><br>
                    <div class="clear"></div>                    
                </div>
            </div>
        </div>
        
            <div class="col-sm-8 result_page_right pull-right">
                
                <div class="col-sm-5 set_page_subhead"></div>
                <div class="col-sm-5 pull-right text-right">
                </div>
                <div class="clear"></div>
                
                
                <table id="diamond_grid" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th width="100%" style="display:none;">Details</th>
                        </tr>
                    </thead>
                    
                    <tfoot>
                        <tr>
                            <th style="display:none;">Details</th>
                        </tr>
                    </tfoot>
                </table>
                
            </div>
            
            <div class="clear"></div>
    </section>

<script>

$( document ).ready(function() {
    
    var dataTable = $('#diamond_grid').DataTable({
        "serverSide": true,
        'processing': true,
        'oLanguage': {sProcessing: "<div id='loader'></div>"},
        "ajax":{
          url :"<?php echo SITE_URL; ?>diamonds/quality_gold_realtime/",
          type: "post",
          'data' : function(data){

            // Read values.......................................................
            
            //------------------------------Amount-----------------------------------
            var amount_min      = $('.amount').val();
            var amount_max      = $('.amount2').val();
            
            <?php 
            $incree = 1;
            $make_dynamic_main_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('dev_jewelries', array('stock_number >' => 0), 'metal', 'stock_number');
            foreach($make_dynamic_main_fields as $main_fields){
                if($main_fields['metal']){
                    $metal_name = $main_fields['metal'];
                    
                    $make_dynamic_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('dev_jewelries', array('metal' => $metal_name), 'category', 'stock_number');
                    foreach($make_dynamic_fields as $fields){
                        if($fields['category']){
                    ?>
                    var M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?>         = '';
                    if ($('#M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?>').is(":checked")){ M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?> = $('#M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?>').val(); }
                    <?php 
                        }
                    } 
                $incree++;
                }
            } 
            ?>
            
            // Append to data.......................................................
            
            //------------------------------Amount-----------------------------------
            data.amount_min     = amount_min;
            data.amount_max     = amount_max;
            
            <?php 
            $incree = 1;
            $make_dynamic_main_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('dev_jewelries', array('stock_number >' => 0), 'metal', 'stock_number');
            foreach($make_dynamic_main_fields as $main_fields){
                if($main_fields['metal']){
                    $metal_name = $main_fields['metal'];
            
                    $make_dynamic_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('dev_jewelries', array('metal' => $metal_name), 'category', 'stock_number');
                    foreach($make_dynamic_fields as $fields){
                        if($fields['category']){
                    ?>
                    data.M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?>        = M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?>;
                    <?php 
                        }
                    } 
                    $incree++;
                }
            } 
            ?>

          },
          error: function(){
            $("#diamond_grid_processing").css("display","none");
          }
        }
    }); 
    
    $('#btn-reload').on('click', function(){
    	dataTable.ajax.reload();
    });
    
    <?php 
    $incree = 1;
    $make_dynamic_main_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('dev_jewelries', array('stock_number >' => 0), 'metal', 'stock_number');
    foreach($make_dynamic_main_fields as $main_fields){
        if($main_fields['metal']){
            $metal_name = $main_fields['metal'];
    
            $make_dynamic_fields	=  $this->diamondmodel->getdata_any_table_distinct_order_where('dev_jewelries', array('metal' => $metal_name), 'category', 'stock_number');
            foreach($make_dynamic_fields as $fields){
                if($fields['category']){
            ?>
            $('.M<?= $incree ?>_<?= str_replace(' ','_',$fields['category']) ?>').click(function(){  dataTable.draw(); });
            <?php 
                }
            } 
            $incree++;
        }    
    } 
    ?>
    
    $('#price_from').keyup(function(){  
        var price_from = $('#price_from').val();
        $('#amount').val(price_from);
        dataTable.draw(); 
    });
    $('#price_to').keyup(function(){  
        var price_to = $('#price_to').val();
        $('#amount2').val(price_to);
        dataTable.draw();
    });
    
    $('#amount').keyup(function(){ 
        var amount = $('#amount').val();
        $('#price_from').val(amount);
        dataTable.draw(); 
    });
    $('#amount2').keyup(function(){ 
        var amount2 = $('#amount2').val();
        $('#price_to').val(amount2);
        dataTable.draw(); 
    });
    
});

    
function searchDiamondFunc(key, value){
    
    if(key == 'shape'){ 
        var checkBoxes = $("#shape_"+value);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        $(".shape_"+value).toggleClass('diamond-shape-active-box');
    }
    
    if(key == 'color'){ 
        var checkBoxes = $("#color_"+value);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        $(".color_"+value).toggleClass('active-reactectgular');
    }
    
    if(key == 'clarity'){ 
        $( "#btn-reload" ).trigger( "click" );
    }
    
    if(key == 'price'){ 
        $( "#btn-reload" ).trigger( "click" );
    }
    
    if(key == 'carat'){ 
        $( "#btn-reload" ).trigger( "click" );
    }
    
}
    
// price_slider_range
$( "#price_slider_range" ).slider({
	range: true,
	min: 0,
	max: 9999,
	values: [ <?php if($_GET['price']){ echo $_GET['price']; }else{ echo 0; } ?>, 9999 ],
	step: 200,
	start: function( event, ui ) {
        $(ui.handle).find('.ui-slider-tooltip').fadeIn();
    },
	slide: function( event, ui ) {
		$( ".amount" ).val( ui.values[0] );
		$( ".amount2" ).val( ui.values[1] );
		if(ui.values[0] > 0){
		    searchDiamondFunc( 'price', ui.values[0] );
		}
	}
});

$(".amount").change(function() {
    $("#price_slider_range").slider('values',0,$(this).val());
    dataTable.draw();
});
$(".amount2").change(function() {
    $("#price_slider_range").slider('values',1,$(this).val());
    dataTable.draw();
});
	
</script>

