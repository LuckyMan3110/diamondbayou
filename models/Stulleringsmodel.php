<?php 
 class Stulleringsmodel extends CI_Model {
 	
    function __construct(){
            parent::__construct();
    }

    function getWedingBanDiamond($start=0, $per_page=20, $sort='ASC'){

            $qry = "SELECT wb.*, wi.image FROM stuller_products_wb_diamonds wb INNER JOIN stuller_images_wb_diamonds wi ON wb.id = wi.pid";

            $qry .= " GROUP BY wi.pid";
            if( $sort != 'default' ) {
                $sort_option = ( $sort == 'Name' ? "wb.name ASC" : "wb.price $sort" );
                $qry .= " ORDER BY $sort_option";
            }
            $returns = 	$this->db->query($qry);
            $result['total'] = $returns->num_rows();
            
            $qry .= " LIMIT $start, $per_page";

            $return = $this->db->query($qry);
            $result['results'] = $return->result_array();
            return isset($result) ? $result : false;
    }
    
    function getWedingBandLadies($start=0, $per_page=20, $sort='ASC', $order_by= 'ASC', $field= 'price'){

        $qry = "SELECT wb.*, wi.image FROM stuller_products_wb_ladies wb INNER JOIN stuller_images_wb_ladies wi ON wb.id = wi.pid";

        /*$qry .= " GROUP BY wi.pid";
        if( $sort != 'default' ) {
            $sort_option = ( $sort == 'Name' ? "wb.name ASC" : "wb.price $sort" );
            $qry .= " ORDER BY $sort_option";
        }*/
        
        if($field){
            $qry .= " GROUP BY wi.pid ORDER BY ABS(wb.".$field.") $order_by"; 
        }else{
            $qry .= " GROUP BY wi.pid ORDER BY ABS(wb.price) $order_by"; 
        }

        $returns = 	$this->db->query($qry);
        $result['total'] = $returns->num_rows();

        $qry .= " LIMIT $start, $per_page";

        $return = $this->db->query($qry);
        $result['results'] = $return->result_array();

        return isset($result) ? $result : false;
    }
    
    function get_stuller_rings_detail_id($item_numb='', $main_table='stuller_products_wb_ladies', $detail_table='stuller_details_wb_ladies') {
        $qry = "SELECT id FROM $main_table WHERE item_number = '{$item_numb}' ORDER BY id DESC LIMIT 1";
        $returns = $this->db->query($qry);
        $results = $returns->result_array();
        
        if( !empty($detail_table) ) {
            $qry1 = "SELECT pid FROM $detail_table WHERE item_number = '{$item_numb}' ORDER BY id DESC LIMIT 1";
            $return1 = $this->db->query($qry1);
            $result1 = $return1->result_array();
        } else {
            $result1 = array();
        }
        
        
        return ( !empty($results[0]['id']) ? $results[0]['id'] : $result1[0]['pid']);
    }
    
    function getWedingBandPlatinum($start=0, $per_page=20, $order_by= 'ASC', $field= 'price'){

            $qry = "SELECT wb.*, wi.image FROM stuller_products_wb_platinum wb INNER JOIN stuller_images_wb_platinum wi ON wb.id = wi.pid";
            
            if($field){
                $qry .= " GROUP BY wi.pid ORDER BY ABS(wb.".$field.") $order_by"; 
            }else{
                $qry .= " GROUP BY wi.pid ORDER BY ABS(wb.price) $order_by"; 
            }

            /*$qry .= " GROUP BY wi.pid ORDER BY wb.title ASC";*/ 
            
            $returns = 	$this->db->query($qry);
            $result['total'] = $returns->num_rows();
            
            $qry .= " LIMIT $start, $per_page";

            $return = $this->db->query($qry);
            $result['results'] = $return->result_array();
            
            return isset($result) ? $result : false;
    }
    
    function getWedingBandMens($start=0, $per_page=20, $order_by= 'ASC', $field= 'price'){

            $qry = "SELECT wb.*, wi.image FROM stuller_products_wb_mens wb INNER JOIN stuller_images_wb_mens wi ON wb.id = wi.pid";
            
            if($field){
                $qry .= " GROUP BY wi.pid ORDER BY ABS(wb.".$field.") $order_by"; 
            }else{
                $qry .= " GROUP BY wi.pid ORDER BY ABS(wb.price) $order_by"; 
            }
            
            $returns = 	$this->db->query($qry);
            $result['total'] = $returns->num_rows();
            
            $qry .= " LIMIT $start, $per_page";

            $return = $this->db->query($qry);
            $result['results'] = $return->result_array();
            
            return isset($result) ? $result : false;
    }
    
    function getGemstonEarings($start=0, $per_page=20){

            $qry = "SELECT ge.*, gi.image FROM stuller_products_gemstone ge INNER JOIN stuller_images_gemstone gi ON ge.id = gi.pid";

            $qry .= " GROUP BY gi.pid ORDER BY ge.title ASC";
            $returns = 	$this->db->query($qry);
            $result['total'] = $returns->num_rows();
            
            $qry .= " LIMIT $start, $per_page";

            $return = $this->db->query($qry);
            $result['results'] = $return->result_array();	
            return isset($result) ? $result : false;
    }
    //// get stuller rings details
    function getStulleRingDetail($id=0, $tableName='stuller_products_wb_diamonds'){

            $qry = "SELECT * FROM $tableName WHERE id = '{$id}' ORDER BY id DESC LIMIT 1";

            $return = 	$this->db->query($qry);
            $result = $return->result_array();	
            return isset($result) ? $result[0] : false;
    }
    
    //// get stuller rings details
    function getStullerImages($id=0, $table1='stuller_products_wb_diamonds', $table2='stuller_images_wb_diamonds'){

            $qry = "SELECT im.id image_id, im.pid product_id, im.image product_image FROM $table1 pr INNER JOIN $table2 im ON pr.id = im.pid WHERE im.pid = '{$id}' ORDER BY im.id ASC";

            $return = 	$this->db->query($qry);
            $result = $return->result_array();	
            return isset($result) ? $result : false;
    }
    
    function getDiamondStullerStudEarrings(){

            $qry = "SELECT * FROM stuller_products_studearrings ORDER BY id ASC";

            $return = 	$this->db->query($qry);
            $result = $return->result_array();	
            return isset($result) ? $result : false;
    }
    
    function getDiamondStudEaring($diamond_color='', $metalcolor='', $stoneshape='', $sort='ASC'){

        $qry = "SELECT st.*, si.image FROM stuller_products_studearrings st INNER JOIN stuller_images_studearrings si ON st.id = si.pid WHERE st.title <> ''";
        
        if( $diamond_color != 'NA' ) {
            $qry .= " AND st.diamond_color = '{$diamond_color}'";
        }
        if( !empty($metalcolor) ) {
            $qry .= " AND st.`specifications` LIKE '%Metal Color1:".$metalcolor."%'";
        }
        if( !empty($stoneshape) ) {
            $qry .= " AND st.`specifications` LIKE '%Primary Stone Shape:".$stoneshape."%'";
        }
        $qry .= " GROUP BY si.pid";
        if( $sort != 'default' ) {
            $sort_option = ( $sort == 'Name' ? "st.name ASC" : "st.price $sort" );
            $qry .= " ORDER BY $sort_option";
        }
        //echo $qry;
        $return = 	$this->db->query($qry);
        $result = $return->result_array();	
        return isset($result) ? $result : false;
    }
    
    function getDiamondHoopRings($metalcolor='', $stoneshape='', $sort='ASC'){

        $qry = "SELECT st.*, si.image FROM stuller_products_dhoops st INNER JOIN stuller_images_dhoops si ON st.id = si.pid";
        if( !empty($metalcolor) ) {
        $qry .= " AND st.`specifications` LIKE '%Metal Color1:".urldecode($metalcolor)."%'";
        }
        if( !empty($stoneshape) ) {
            $qry .= " AND st.`specifications` LIKE '%Primary Stone Shape:".$stoneshape."%'";
        }
        $qry .= " GROUP BY si.pid";
        if( $sort != 'default' ) {
            $sort_option = ( $sort == 'Name' ? "st.name ASC" : "st.price $sort" );
            $qry .= " ORDER BY $sort_option";
        }
        //echo $qry;
        $return = 	$this->db->query($qry);
        $result = $return->result_array();	
        return isset($result) ? $result : false;
    }
    
    //// get product details
    function get_stuller_details($pid=0, $table='stuller_details_dhoops') {
        $qry = "SELECT * FROM $table WHERE pid = '{$pid}' AND id != '{$pid}'";
        $return = 	$this->db->query($qry);
        $result = $return->result_array();
        
        return isset($result) ? $result : false;
    }
    
    //// get stuller tables dropdown values
    function stuller_table_cols($id=0, $cols='', $table='') {
        $qry    = "SELECT id, $cols FROM $table WHERE pid = '{$id}' GROUP BY $cols ORDER BY $cols ASC";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        
        return isset($result) ? $result : false;
    }
    //// get stuller tables dropdown values
    function get_stuller_jewelry_price($id=0, $table='', $qulity='', $f_option='', $s_option='', $type) {
        $quality = urldecode($qulity);
        $first_option  = urldecode($f_option);
        $second_option = urldecode($s_option);
        
        $qry = "SELECT price FROM $table WHERE pid = '{$id}'";
        
        if( !empty($quality) ) {
            $qry .= " AND quality = '{$quality}'";
        }
        
        if( $type === 'wb_hoops' ) { /// stuller hoop section
            if( !empty($first_option) ) {
            $qry .= " AND stone_type = '{$first_option}'";
            }
            if( !empty($second_option) ) {
                $qry .= " AND outside_dimension = '{$second_option}'";
            }
        } else {  /// stuller studs section
           if( !empty($first_option) ) {
            $qry .= " AND diamond_carat_weight = '{$first_option}'";
            }
            if( !empty($second_option) ) {
                $qry .= " AND diamond_quality = '{$second_option}'";
            } 
        }
        
        //echo $qry;
        
        $return = $this->db->query($qry);
        $result = $return->result_array();
        
        //print_ar($result);
        
        return $result[0]['price'];
    }
 }