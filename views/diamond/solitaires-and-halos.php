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
    
        function getCountResult($getTable,$fieldName,$value){
                    
            $CI =& get_instance();
            $CI->db->where( array($fieldName => $value) );
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
    
    <div class="tabs_content_area"  style="display:none;">
        <ul class="set_diamond_shapes_list">
            <?php
                $shape_list = array(
                    
                    'B'=>array('one','round', 'round_sic', 'round_sh_ic.jpg', 'Round'),
                    'PR'=>array('two','princess', 'princes_sic', 'princess_sh_ic.jpg', 'Princess'),
                    'C'=>array('ten','cushion', 'cushion_sic', 'cushion_sh_ic.jpg', 'Cushion'),
                    'R'=>array('seven','radiant', 'radiant_sic', 'radiant_sh_ic.jpg', 'Radiant'),
                    'E'=>array('three','emerald', 'emearld_sic', 'emerald_sh_ic.jpg', 'Emerald'),
                    'P'=>array('eight','pear', 'pear_sic', 'pear_sh_ic.jpg', 'Pear'),
                    'O'=>array('six','oval', 'oval_sic', 'oval_sh_ic.jpg', 'Oval'),
                    'AS'=>array('four','asscher', 'asscher_sic', 'asscher_sh_ic.jpg', 'Asscher'),
                    'M'=>array('five','marquise', 'marquise_sic', 'marquise_sh_ic.jpg', 'Marquise'),
                    'H'=>array('nine','heart', 'heart_sic', 'heart_sh_ic.jpg', 'Heart')
                );

                $shape_view_list = '';
                foreach ( $shape_list  as $shkey => $keyvalue ) {
                    
                    $diamond_shape = view_shape_value($shapeimg, $shkey);
                    $imgeOverIcon = str_replace('_sic', '_sic_ov', $keyvalue[2]);
                    $active_class = ( $i == 1 ? 'class=""' : '' );
                    
                    $shape_name      = 'shape';
                    ?>
                    
                    <li class="shape_<?= $shkey ?>" onclick="searchDiamondFunc('shape', '<?= $shkey ?>')" <?php echo filterCheckedSetClass('shape', ''.$shkey.'', 'diamond-shape-active-box'); ?>>
                        <div><a href="#javascript"><img src="<?= SITE_URL ?>assets/site_images/<?= $keyvalue[3] ?>" alt="<?= $keyvalue[4] ?>" /></a></div>
                        <div><a href="#javascript"><span><?= $keyvalue[4] ?></span></a></div>   
                    </li>
                                
                    <?php            
                    $i++;
                    
                }
                echo $shape_view_list;
            ?>                        
        </ul>
    </div>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="sliderFilters row-fluid">
        
        <div class="filterCols col-sm-12 filter_show_hide" style="padding:15px 30px;">
            
            <table width="100%" style="<?php if($diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?>" >
                <tr>
                    <td width="15%" style="vertical-align: top;"><label>Carat</label></td>
                    <td width="85%" style="vertical-align: top;"> 
                    
                        <div id="carat_slider_range"></div>
                        <table width="100%">
                            <tr>
                                <td width="50%" style="text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="carat_min" class="diamond-search-input" value="<?php if($_GET['carat']){ echo $_GET['carat']; }else{ echo 0.15; } ?>"> <span class="filter_field_info">MIN</span><td>
                                <td width="50%" style="text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input" id="carat_max" value="15"><td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table width="100%"  style="margin-top:20px; <?php if($diamond_page_name == 'colored-diamond' OR $diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
                <tr>
                    <td width="15%" style="vertical-align: top;"><label>Clarity</label></td>
                    <td width="85%" style="vertical-align: top;"> 
                    
                        <div id="clarity_slider_range"></div>
                        <div>
                            <table id="clarity_table_new_list" style="width:100%;">
                            <tr>
                              <td>I1</td>
                              <td>IF</td>
                              <td>SI1</td>
                              <td>SI2</td>
                              <td>SI3</td>
                              <td>VS1</td>
                              <td>VS2</td>
                              <td>VVS1</td>
                              <td>VVS2</td>
                              <td>FL</td>
                            </tr>
                            <tr>
                              <td align="left"><input type="hidden" value="<?php echo $clarity_start; ?>" id="claritymin" class="w50px" onchange="modifyresult('claritymin',this.value)"></td>
                              <td align="right"><input type="hidden" value="<?php echo $clarity_end; ?>" id="claritymax" class="w50px" onchange="modifyresult('claritymax',this.value)"></td>
                            </tr>
                          </table>
                          <table width="100%">
                            <tr>
                                <td width="50%" style="display:none;text-align:left;vertical-align: bottom;height: 35px;"><input type="text" id="clarity_min" class="diamond-search-input" value=""> <span class="filter_field_info">MIN</span><td>
                                <td width="50%" style="display:none;text-align:right;vertical-align: bottom;height: 35px;"><span class="filter_field_info">MAX</span> <input type="text" class="diamond-search-input" id="clarity_max" value=""><td>
                            </tr>
                        </table>
                        </div>
            
                    </td>
                </tr>
            </table> 
            
            <table width="100%" style="margin-top:15px; <?php if($diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
                <tr>
                    <td width="15%" style="vertical-align: top;"><label>Color</label></td>
                    <td width="85%" style="vertical-align: top;"> 
                        
                        <div class="slider_set_view">
                            <div class="set_color_field">
                                <ul>
                                    <li <?php echo filterCheckedClassRect('color', 'D'); ?> onclick="searchDiamondFunc('color', 'D')" class="color_D">D</li>
                                    <li <?php echo filterCheckedClassRect('color', 'E'); ?> onclick="searchDiamondFunc('color', 'E')" class="color_E">E</li>
                                    <li <?php echo filterCheckedClassRect('color', 'F'); ?> onclick="searchDiamondFunc('color', 'F')" class="color_F">F</li>
                                    <li <?php echo filterCheckedClassRect('color', 'G'); ?> onclick="searchDiamondFunc('color', 'G')" class="color_G">G</li>
                                    <li <?php echo filterCheckedClassRect('color', 'H'); ?> onclick="searchDiamondFunc('color', 'H')" class="color_H">H</li>
                                    <li <?php echo filterCheckedClassRect('color', 'I'); ?> onclick="searchDiamondFunc('color', 'I')" class="color_I">I</li>
                                    <li <?php echo filterCheckedClassRect('color', 'J'); ?> onclick="searchDiamondFunc('color', 'J')" class="color_J">J</li>
                                    <li <?php echo filterCheckedClassRect('color', 'K'); ?> onclick="searchDiamondFunc('color', 'K')" class="color_K">K</li>
                                    <li <?php echo filterCheckedClassRect('color', 'L'); ?> onclick="searchDiamondFunc('color', 'L')" class="color_L">L</li>
                                    <li <?php echo filterCheckedClassRect('color', 'M'); ?> onclick="searchDiamondFunc('color', 'M')" class="color_M">M</li>
                                    <li <?php echo filterCheckedClassRect('color', 'N'); ?> onclick="searchDiamondFunc('color', 'N')" class="color_N">N</li>
                                    <li <?php echo filterCheckedClassRect('color', 'Z'); ?> onclick="searchDiamondFunc('color', 'Z')" class="color_Z">Z</li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                    </td>
                </tr>
            </table>
            
            <table width="100%" style="margin-top:20px;display:none; <?php if($diamond_page_name == 'colored-diamond' OR $diamond_page_name == 'solitaires-and-halos' OR $diamond_page_name == 'watches'){ echo 'display:none;'; } ?> ">
                <tr>
                    <td width="15%" style="vertical-align: top;"><label>Cut</label></td>
                    <td width="85%" style="vertical-align: top;">
                        <div class="slider_set_view">
                            <div class="set_color_field">
                                <ul>
                                    <li>Excellent</li>
                                    <li>Very Good</li>
                                    <li>Good</li>
                                    <li>Fair</li>
                                    <li>Poor</li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </td>
                </tr>
            </table>  
            
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
                
                <div class="filter_block_section">
                    <div class="inner_sub_heading">
                        Ring Size
                        <div class="clear"></div>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_1" class="ring_size_1" value="1" /></span>
                        <span><b>1</b> (<?php echo getCountResult('dev_us', 'ring_size', '1'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row" style="display:none;" >
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_2" class="ring_size_2" value="2" /></span>
                        <span><b>2</b> (<?php echo getCountResult('dev_us', 'ring_size', '2'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row" style="display:none;" >
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_3" class="ring_size_3" value="3" /></span>
                        <span><b>3</b> (<?php echo getCountResult('dev_us', 'ring_size', '3'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_4" class="ring_size_4" value="4" /></span>
                        <span><b>4</b> (<?php echo getCountResult('dev_us', 'ring_size', '4'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_5" class="ring_size_5" value="5" /></span>
                        <span><b>5</b> (<?php echo getCountResult('dev_us', 'ring_size', '5'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_6" class="ring_size_6" value="6" /></span>
                        <span><b>6</b> (<?php echo getCountResult('dev_us', 'ring_size', '6'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_7" class="ring_size_7" value="7" /></span>
                        <span><b>7</b> (<?php echo getCountResult('dev_us', 'ring_size', '7'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_8" class="ring_size_8" value="8" /></span>
                        <span><b>8</b> (<?php echo getCountResult('dev_us', 'ring_size', '8'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="ring_size" type="checkbox" id="ring_size_9" class="ring_size_9" value="9" /></span>
                        <span><b>9</b> (<?php echo getCountResult('dev_us', 'ring_size', '9'); ?>)</span></label>
                    </div>
                    <div class="bottom_line"></div><br>
                    <div class="clear"></div>                    
                </div>
                
                <div class="filter_block_section">
                    <div class="inner_sub_heading">
                        Settings
                        <div class="clear"></div>
                    </div>
                    
                    <div class="fiter_item_row">
                        <label><span><input name="settings" type="checkbox" id="settings_52" class="settings_52" value="52" /></span>
                        <span><b>Solitaire Engagement Rings</b> (<?php echo getCountResult('dev_us', 'main_catid', '52'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="settings" type="checkbox" id="settings_8" class="settings_8" value="8" /></span>
                        <span><b>Fancy Engagement Rings</b> (<?php echo getCountResult('dev_us', 'catid', '8'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="settings" type="checkbox" id="settings_40" class="settings_40" value="40" /></span>
                        <span><b>Halo Engagement Rings</b> (<?php echo getCountResult('dev_us', 'main_catid', '40'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="settings" type="checkbox" id="settings_39" class="settings_39" value="39" /></span>
                        <span><b>Antique Engagement Rings</b> (<?php echo getCountResult('dev_us', 'catid', '39'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="settings" type="checkbox" id="settings_179" class="settings_179" value="179" /></span>
                        <span><b>Petite Engagement rings</b> (<?php echo getCountResult('dev_us', 'main_catid', '179'); ?>)</span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="settings" type="checkbox" id="settings_9" class="settings_9" value="9" /></span>
                        <span><b>Semi Mount</b> (<?php echo getCountResult('dev_us', 'main_catid', '9'); ?>)</span></label>
                    </div>
                    
                    <div class="bottom_line"></div><br>
                    <div class="clear"></div> 
                </div>
                
                <div class="filter_block_section">
                    <div class="inner_sub_heading">
                        Color
                        <div class="clear"></div>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="color" type="checkbox" id="color_14KP" class="color_14KP" value="14KP" /></span>
                        <span><b>14 Karat Pink</b></span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="color" type="checkbox" id="color_14KW" class="color_14KW" value="14KW" /></span>
                        <span><b>Karat White</b></span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="color" type="checkbox" id="color_14KY" class="color_14KY" value="14KY" /></span>
                        <span><b>14 Karat Yellow</b></span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="color" type="checkbox" id="color_18KP" class="color_18KP" value="18KP" /></span>
                        <span><b>18 Karat Pink</b></span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="color" type="checkbox" id="color_18KW" class="color_18KW" value="18KW" /></span>
                        <span><b>18 Karat White</b></span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="color" type="checkbox" id="color_18KY" class="color_18KY" value="18KY" /></span>
                        <span><b>18 Karat Yellow</b></span></label>
                    </div>
                    <div class="fiter_item_row">
                        <label><span><input name="color" type="checkbox" id="color_PLAT" class="color_PLAT" value="PLAT" /></span>
                        <span><b>Platinum</b></span></label>
                    </div>
                    
                    <div class="bottom_line"></div><br>
                    <div class="clear"></div> 
                </div>
                
                
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
          url :"<?php echo SITE_URL; ?>diamonds/solitaires_and_halos_realtime/",
          type: "post",
          'data' : function(data){
            //------------------------------Settings-----------------------------------
            var settings_52         = '';
            if ($('#settings_52').is(":checked")){ settings_52 = $('#settings_52').val(); }
            var settings_8         = '';
            if ($('#settings_8').is(":checked")){ settings_8 = $('#settings_8').val(); }
            var settings_40         = '';
            if ($('#settings_40').is(":checked")){ settings_40 = $('#settings_40').val(); }
            var settings_39         = '';
            if ($('#settings_39').is(":checked")){ settings_39 = $('#settings_39').val(); }
            var settings_179         = '';
            if ($('#settings_179').is(":checked")){ settings_179 = $('#settings_179').val(); }
            var settings_9         = '';
            if ($('#settings_9').is(":checked")){ settings_9 = $('#settings_9').val(); }
            
            //------------------------------Size-----------------------------------
            var ring_size_1         = '';
            if ($('#ring_size_1').is(":checked")){ ring_size_1 = $('#ring_size_1').val(); }
            var ring_size_2         = '';
            if ($('#ring_size_2').is(":checked")){ ring_size_2 = $('#ring_size_2').val(); }
            var ring_size_3         = '';
            if ($('#ring_size_3').is(":checked")){ ring_size_3 = $('#ring_size_3').val(); }
            var ring_size_4         = '';
            if ($('#ring_size_4').is(":checked")){ ring_size_4 = $('#ring_size_4').val(); }
            var ring_size_5         = '';
            if ($('#ring_size_5').is(":checked")){ ring_size_5 = $('#ring_size_5').val(); }
            var ring_size_6         = '';
            if ($('#ring_size_6').is(":checked")){ ring_size_6 = $('#ring_size_6').val(); }
            var ring_size_7         = '';
            if ($('#ring_size_7').is(":checked")){ ring_size_7 = $('#ring_size_7').val(); }
            var ring_size_8         = '';
            if ($('#ring_size_8').is(":checked")){ ring_size_8 = $('#ring_size_8').val(); }
            var ring_size_9         = '';
            if ($('#ring_size_9').is(":checked")){ ring_size_9 = $('#ring_size_9').val(); }
            
            //------------------------------Amount-----------------------------------
            var amount_min      = $('.amount').val();
            var amount_max      = $('.amount2').val();
            
            // Append to data
            
            //------------------------------Amount-----------------------------------
            data.amount_min     = amount_min;
            data.amount_max     = amount_max;
            
            //------------------------------Settings-----------------------------------
            data.settings_52     = settings_52;
            data.settings_8      = settings_8;
            data.settings_40      = settings_40;
            data.settings_39     = settings_39;
            data.settings_179    = settings_179;
            data.settings_9      = settings_9;
            
            //------------------------------Size-----------------------------------
            data.ring_size_1     = ring_size_1;
            data.ring_size_2     = ring_size_2;
            data.ring_size_3     = ring_size_3;
            data.ring_size_4     = ring_size_4;
            data.ring_size_5     = ring_size_5;
            data.ring_size_6     = ring_size_6;
            data.ring_size_7     = ring_size_7;
            data.ring_size_8     = ring_size_8;
            data.ring_size_9     = ring_size_9;

          },
          error: function(){
            $("#diamond_grid_processing").css("display","none");
          }
        }
    }); 
    
    
    $('#btn-reload').on('click', function(){
    	dataTable.ajax.reload();
    });
    
    $('.settings_52').click(function(){  dataTable.draw(); });
    $('.settings_8').click(function(){  dataTable.draw(); });
    $('.settings_40').click(function(){  dataTable.draw(); });
    $('.settings_39').click(function(){  dataTable.draw(); });
    $('.settings_179').click(function(){  dataTable.draw(); });
    $('.settings_9').click(function(){  dataTable.draw(); });
    
    $('.ring_size_1').click(function(){  dataTable.draw(); });
    $('.ring_size_2').click(function(){  dataTable.draw(); });
    $('.ring_size_3').click(function(){  dataTable.draw(); });
    $('.ring_size_4').click(function(){  dataTable.draw(); });
    $('.ring_size_5').click(function(){  dataTable.draw(); });
    $('.ring_size_6').click(function(){  dataTable.draw(); });
    $('.ring_size_7').click(function(){  dataTable.draw(); });
    $('.ring_size_8').click(function(){  dataTable.draw(); });
    $('.ring_size_9').click(function(){  dataTable.draw(); });
    
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


    // carat_slider_range
    $( "#carat_slider_range" ).slider({
		range: true,
		value:0.15,
		min: 0.15,
		max: 15,
		values: [ <?php if($_GET['carat']){ echo $_GET['carat']; }else{ echo 0.15; } ?>, 15 ],
		step: 0.15,
		slide: function( event, ui ) {
			$( "#carat_min" ).val( ui.values[0] );
			$( "#carat_max" ).val( ui.values[1] );
			if(ui.values[0] > 0){
			    searchDiamondFunc( 'carat', ui.values[0] );
			}
		}
	});

	$("#carat_min").change(function() {
	    $("#carat_slider_range").slider('values',0,$(this).val());
	    dataTable.draw();
	});
	$("#carat_max").change(function() {
	    $("#carat_slider_range").slider('values',1,$(this).val());
	    dataTable.draw();
	});
    
    // clarity_slider_range    
    $( "#clarity_slider_range" ).slider({
        range: true,
        min: 0,
        max:100,
        values: [ <?php if($_GET['clarity']){ echo $_GET['clarity']; }else{ echo 0; } ?>, 100],
        step: 10,
		slide: function( event, ui ) {
		    $( "#clarity_min" ).val( ui.values[0] );
			$( "#clarity_max" ).val( ui.values[1] );
			var get_clarity = ui.values[ 0 ];
			if(get_clarity > 0){
			    searchDiamondFunc( 'clarity', get_clarity );
			}
		}
	});
    $("#clarity_min").change(function() {
	    $("#clarity_slider_range").slider('values',0,$(this).val());
	    dataTable.draw();
	});
	$("#clarity_max").change(function() {
	    $("#clarity_slider_range").slider('values',1,$(this).val());
	    dataTable.draw();
	});
    
    
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