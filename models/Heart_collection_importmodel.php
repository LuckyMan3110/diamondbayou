<?php

class Heart_collection_importmodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save_collection_data($data1 = array(), $globalField='') {
        $data2 = str_replace("'", "", $data1);
        //$data3 = str_replace(" ", "", $data2);
        $data4 = str_replace("$", "", $data2);
        $data5 = str_replace(",", "", $data4);
        $data6 = str_replace("’", "", $data5);
        $data = str_replace("/", "_slash_", $data6);
        
        $style_no    = $data[0];
        $item_sku    = $data[0];
        $metal       = $data[1];
        $color       = $data[2];
        $karat       = $data[3];
        $description = $data[4];
        $description2 = $data[5];
        $gender       = $data[6];
        $category     = $data[7];
        $subcategory  = $data[8];
        $quality      = $data[9];
        $model        = $data[10];
        $made_in      = $data[11];
        $design       = trim($data[12]);
        $bandwidth    = $data[13];
        $ring_weight  = $data[14];
        $head_dimensions     = $data[15];
        $center_stone_size   = $data[16];
        $center_stone_shapes = $data[17];
        $available_sizes     = $data[18];
        $size_able     = $data[19];
        $comment       = $data[20];
        $mg14_gr       = $data[21];
        $mg14_price    = $data[22];
        $mg18_gr       = $data[23];
        $mg18_price    = $data[24];
        $mplat_gr      = $data[25];
        $mplat_price   = $data[26];
        $g14_wh_price   = $data[129];
        $g18_wh_price   = $data[130];
        $plat_wh_price  = $data[131];
        
        $gender_cate = $this->gender_category_id($gender);
        $main_cate_id   = $this->get_jew_cateid($gender_cate['id'], $category);
        $sub_cate_id    = $this->get_jew_cateid($main_cate_id, $subcategory);
        
        $to_date   = date('Y-m-d');
        
        $insert = "('{$item_sku}', '{$style_no}', '{$metal}', '{$color}', '{$karat}', '{$description}', '{$description2}', '{$gender_cate['title']}', '{$main_cate_id}', '{$sub_cate_id}', '{$quality}', '{$model}', '{$made_in}', '{$design}', '{$bandwidth}', '{$ring_weight}', '{$head_dimensions}', '{$center_stone_size}', '{$center_stone_shapes}', '{$available_sizes}', '{$size_able}', '{$comment}', '{$g14_wh_price}', '{$g18_wh_price}', '{$plat_wh_price}', '{$mg14_gr}', '{$mg14_price}', '{$mg18_gr}', '{$mg18_price}', '{$mplat_gr}', '{$mplat_price}', '{$to_date}', '{$globalField}')";
        
        return $insert;
        
    }
    
    function get_jew_cateid($genderID=0, $cate_name='') {
        $sql = "SELECT category_id FROM `dev_ebaycategories` WHERE `parent_id` = '{$genderID}' AND category_name LIKE '{$cate_name}' ORDER BY cat_id ASC LIMIT 1";
        
        $result  = $this->db->query($sql);
	$content = $result->result_array();
        $categoryID = ( !empty($content[0]['category_id']) ? $content[0]['category_id'] : $cate_name );
        
        return $categoryID;
    }
    
    /// get gender category ID
    function gender_category_id($genders='') {
        switch( $genders ) {
            case 'Women':
            case 'Womens':
            case 'WOMEN':
            case 'WOMENS':
                $gender_id = 3292596018;
                $gender_title = 'F';
                break;
            case 'Men':
            case 'Mens':
            case 'MEN':
            case 'MENS':
                $gender_id = 3291859018;
                $gender_title = 'M';
                break;
                default :
                $gender_id    = $genders;
                $gender_title = $genders;
                break;
        }
        
        $returns['id']    = $gender_id;
        $returns['title'] = $gender_title;
        
        return $returns;
    }
    
//    function get_jewelry_row($id=0) {
//        $query= $this->db->query( "SELECT * FROM dev_jewelries WHERE stock_number = '{$category}' ORDER BY stock_number DESC LIMIT 1" );
//        $results = $query->result_array();
//        
//        return $results[0];
//    }

}