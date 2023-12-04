<?php  
    class Davidsternmodel extends CI_Model {

    function __construct()
    {
            parent::__construct();

    }
    
    //// quality product detail
    function sternProductDetail($id=0, $cid=0, $search='') {
        $sql = "SELECT * FROM dev_overnight ov INNER JOIN dev_overnight_temp tp ON ov.id = tp.product_id WHERE 1 = 1";
        
//        if( $id > 0 ) {
//            $sql .= " AND id = '{$id}'";
//        }
        
        if( $cid > 0 ) {
            $sql .= " AND category_id = '{$cid}'";
        } else {
            if( !empty($search) ) {
                $sql .= " AND item_id = '" . urldecode( trim( $id ) ) . "'";
            } else {
                $sql .= " AND id = '{$id}'";
            }            
        }
        
        $sql .= " AND ov.stone_breakdown != 'No stones'";
        $sql .= " ORDER BY gold_polished_1300 ASC LIMIT 1";
        
        $prod    = $this->db->query($sql);
        $results = $prod->result_array();

        return isset($results[0])?$results[0]:array();
    }
    
    function getRingListing($cateid='', $offset=0, $limit=15, $sort='ASC', $metal='', $metal_colr='') 
    {
        $sql = "SELECT * FROM dev_overnight ov INNER JOIN dev_overnight_temp tp ON ov.id = tp.product_id WHERE 1 = 1";
        
        if( !empty($cateid) ) {
            //$catename = resetsSlugTitle( $cateid );
            //$sql .= " AND categories_name LIKE '{$catename}%'";
            $sql .= " AND ov.category_id = '{$cateid}'";
        }
        
         $sql .= " AND ov.gold_polished_1300 > 0";
         $sql .= " AND ov.stone_breakdown != 'No stones'";
         
        $count_sql = $this->db->query($sql);
        $return['total'] = $count_sql->num_rows();
        
        
        if( !empty($metal) ) {
            $sql .= " AND ov.default_metal =  '{$metal}'";
        }
        if( !empty($metal_colr) ) {
            $sql .= " AND ov.default_color =  '{$metal_colr}'";
        }
        
        if( !empty($sort) ) {
            $sql .= " ORDER BY ov.gold_polished_1300 $sort";
        } else {
            //$sql .= " ORDER BY ov.categories_name ASC";
            $sql .= " ORDER BY ov.gold_polished_1300 ASC";
        }
        $sql .= " LIMIT $offset, $limit";
        $sqlrings = $this->db->query($sql);
        $return['results'] = $sqlrings->result_array();

        return $return;
    }
    
    //// quality product detail
    function getCollectionCateName($id=0) {
        $sql = "SELECT * FROM dev_ebaycategories WHERE category_id = '{$id}'";
        
        $prod    = $this->db->query($sql);
        $results = $prod->result_array();
        $cate_name = ( count($results) > 0 ? $results[0]['category_name'] : $id );
        
        return $cate_name;
    }
    
    function getEbayCateRow($cid=0) {
        $sql = "SELECT * FROM dev_ebaycategories WHERE category_id = '{$cid}' ORDER BY cat_id DESC LIMIT 1";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        
        return $return[0];
    }
    
    function get_ebay_cat_name($cid=0) {
        $sql = "SELECT category_name FROM dev_ebaycategories WHERE category_id = '{$cid}' ORDER BY cat_id DESC LIMIT 1";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        return isset($return[0]['category_name'])?$return[0]['category_name']:'';
    }
    
    function get_ebay_parent_cateid($id=0) {
        $sql = "SELECT parent_id FROM dev_ebaycategories WHERE category_id = '{$id}' ORDER BY cat_id DESC LIMIT 1";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        
        return isset($return[0]['parent_id'])?$return[0]['parent_id']:'';
    }
    
    function get_ebay_subcategory_list($id=0) {
        $sql = "SELECT eb.category_id, eb.category_name FROM dev_ebaycategories eb INNER JOIN dev_jewelries_new jw ON eb.category_id = jw.subcategory WHERE eb.parent_id = '{$id}' group by jw.subcategory ORDER BY eb.category_name ASC";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        
        return $return;
    }
    
    function get_ebay_category($gender='') {
        $sql = "SELECT category FROM dev_jewelries_new WHERE gender = '{$gender}' AND category != '' GROUP BY category";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        
        return $return;
    }


    function get_main_listing_category($gender='') {
        $sql = "SELECT gender FROM dev_jewelries_new WHERE gender != '' AND category != '' GROUP BY gender";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        
        return $return;
    }
    
    function get_ebay_subcategory($gender='', $cid=0) {
        $sql = "SELECT subcategory FROM dev_jewelries_new WHERE gender = '{$gender}' AND category = '{$cid}' AND subcategory != '' GROUP BY subcategory";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
         
        return $return;
    }
    
    function get_watch_category($gender='') {
        $sql = "SELECT * FROM dev_watches WHERE brand != '' GROUP BY brand";
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        
        return $return;
    }
    
    
    function get_collection_id($ring_style='', $metal='', $carat='') {
        $sql = "SELECT stock_number FROM dev_jewelries_new WHERE ring_style = '{$ring_style}'";
        
        if( !empty($metal) ) {
            $sql .= " AND metal = '{$metal}'";
        }
        if( !empty($carat) ) {
            $sql .= " AND carat = '{$carat}'";
        }
        $sql .= " ORDER BY stock_number DESC LIMIT 1";
        
        $sqlrings = $this->db->query($sql);
        $return   = $sqlrings->result_array();
        
        return ( $return[0]['stock_number'] > 0 ? $return[0]['stock_number'] : 0 );
    }
    
    //// metal list
function sterMetalOptions($cateid=0) {
     $sql = "SELECT ov.default_metal FROM dev_overnight ov INNER JOIN dev_overnight_temp tp ON ov.id = tp.product_id WHERE 1 = 1";
     
     if( !empty($cateid) ) {
            $sql .= " AND ov.category_id = '{$cateid}'";
        }
     
     $sql .= " AND ov.stone_breakdown != 'No stones'";   
     $sql .= " GROUP BY default_metal ORDER BY default_metal ASC";
     $sqlrings = $this->db->query($sql);
     $return = $sqlrings->result_array();
     
     return $return;
        
}
    //// ring color options
function sternColorsList($cateid=0) {
     $sql = "SELECT ov.default_color FROM dev_overnight ov INNER JOIN dev_overnight_temp tp ON ov.id = tp.product_id WHERE ov.default_color != '' AND ov.category_id = '{$cateid}' AND ov.stone_breakdown != 'No stones' GROUP BY default_color ORDER BY ov.default_color ASC";
     
     $query = $this->db->query($sql);
     $results = $query->result_array();
     
     return $results;
        
}
//// check product list according to the category
function checkProductList($cateid=0) {
     $sql = "SELECT ov.id, ov.category_id FROM dev_overnight ov INNER JOIN dev_overnight_temp tp ON ov.id = tp.product_id WHERE 1 = 1 AND ov.stone_breakdown != 'No stones' AND ov.category_id = '{$cateid}' OR category_id IN (SELECT id FROM dev_overnight_cate ct WHERE sub_cateid = '{$cateid}') LIMIT 1";
     
     $sqlrings = $this->db->query($sql);
     
     return $sqlrings->num_rows();
        
}
    //// quality similar products
function sternSimilartProduct($id=0, $ringCate='', $limit=3) {
        
        $sql = "SELECT * FROM dev_overnight ov INNER JOIN dev_overnight_temp tp ON ov.id = tp.product_id WHERE 1 = 1";
        
        if( !empty($id) && $id > 0 ) {
           $sql .= " AND ov.id != '{$id}'";
        }
        
        if( !empty($ringCate) ) {
            $sql .= " AND ov.category_id = '{$ringCate}'";
        }
        
        $sql .= " AND ov.stone_breakdown != 'No stones'";
        $sql .= " AND ov.gold_polished_1300 > 0";
        $sql .= " ORDER BY RAND() LIMIT $limit";
        //echo $sql;
        
        $query = $this->db->query($sql);
        $results = $query->result_array();
        
//        $s = 1;
//        $return = array();
//        
//        foreach( $results as $rows ) {
//            $ringImageLink = STERN_IMGS.$rows['item_id'].'.jpg';
//               
//            if( getimagesize( $ringImageLink ) ) {
//                $return[] = $rows;
//                
//                if( $s == $limit ) { break; }
//                $s++;
//            }
//        }

        return $results;
    }
    //// get category list
    function getCateList($id=0) {
       $sql  = "SELECT id, sub_cateid, cate_name FROM dev_overnight_cate WHERE sub_cateid = '{$id}' ORDER BY sort_colmn ASC";
       $cate = $this->db->query($sql);

        return $cate->result_array();
    }

	function getShapeList() {
       $sql  = "SELECT uid, shape FROM dev_index WHERE 1 GROUP BY shape";
       $cate = $this->db->query($sql);

        return $cate->result_array();
    }

    //// get category name
    function getCateName($id) {
       $sql     = "SELECT id, sub_cateid, cate_name FROM dev_overnight_cate WHERE id IN ( '{$id}' ) ORDER BY cate_name ASC";
       $prod    = $this->db->query($sql);
       $results = $prod->result_array();

        return $results[0]; 
    }
    
    //// get category parent id
    function getParentCateID($id) {
       $sql     = "SELECT id, sub_cateid FROM dev_overnight_cate WHERE id IN ( '{$id}' ) ORDER BY id ASC LIMIT 1";
       $prod    = $this->db->query($sql);
       $results = $prod->result_array();

        return $results[0]['sub_cateid'];
    }
    ///// check sub category
    function checkSubCategory($id) {
       $sql     = "SELECT id, sub_cateid FROM dev_overnight_cate WHERE sub_cateid IN ( '{$id}' ) ORDER BY id ASC LIMIT 1";
       $prod    = $this->db->query($sql);
       $results = $prod->result_array();

        return $results[0]['id'];
    }
    
    //// jewelry list
    function get_jewelry_list($catid=3292598018, $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
        $sql  = "SELECT *, jw.price AS ring_price FROM dev_jewelries_new jw";
        $goup_by = '';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' AND jw.category= '{$recent}' ";
         $goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        }        
        $sql .= " AND jw.have_img = 'Y'";
        
        if( $catid != 'newarrivals' ) {
            if( empty($type) ) {
                 $sql .= " AND jw.category IN ( '{$catid}' )";
            } else {
                 $sql .= " AND jw.category IN ( '{$catid}', '3292605018' )";
            }
            $sql .= " OR jw.subcategory = '{$catid}' AND jw.have_img = 'Y'";
        } else {
            //$sql .= " AND have_img = 'Y'";
        }
        
        $sort = 'ASC';
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
       $sort_list = array('ASC', 'DESC');
       //$sql .= " GROUP BY ring_style";
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY jw.g14_wh_price $sort_val, jw.price $sort_val";
        } else {
            $sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        //echo $sql; exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    
    //// jewelry list
    function get_jewelry_categorywise_list($catid=3292598018, $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
        $sql  = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        $goup_by = '';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' AND jw.category= '{$recent}' ";
         $goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        }        
        /*$sql .= " AND jw.have_img = 'Y'";*/
/*        
        if( $catid != 'newarrivals' ) {
            if( empty($type) ) {
                 $sql .= " AND jw.category IN ( '{$catid}' )";
            } else {
                 $sql .= " AND jw.category IN ( '{$catid}', '3292605018' )";
            }
            $sql .= " OR jw.subcategory = '{$catid}' AND jw.have_img = 'Y'";
        } else {
            //$sql .= " AND have_img = 'Y'";
        }*/
        
        $sql .= " AND ( jw.category  = '{$catid}' OR jw.subcategory  = '{$catid}' ) ";
        
        $sort = 'ASC';
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
       $sort_list = array('ASC', 'DESC');
       //$sql .= " GROUP BY ring_style";
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY jw.price_website $sort_val";
        } else {
            $sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        //echo $sql; exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    
    
    
    //// jewelry list
    function get_jewelry_categorywise_360_item_list($catid=3292598018, $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='', $style='', $metal_type='', $quality='', $carat_item = '') {
        
        if( empty($style) AND empty($metal_type) AND empty($quality) AND empty($carat_item) ){
            $sql   = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        }else{
            $sql   = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        }
        
        $goup_by    = ' GROUP BY jw.ring_style_bk';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' AND jw.category= '{$recent}' ";
         //$goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        } 
        
        if( empty($style) AND empty($metal_type) AND empty($quality) AND empty($carat_item) ){
            $sql .= " AND ( jw.category  = '{$catid}' OR jw.subcategory  = '{$catid}' ) ";
        }
        
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
        
        $sort = 'ASC';
        
        if( !empty($metal_type) ) {
             $sql .= " AND jw.metal_type = '{$metal_type}' ";
        }
        
        if( !empty($style) ) {
             $sql .= " AND jw.subcategory = '{$style}' ";
        }
        
        if( !empty($quality) ) {
             $sql .= " AND jw.quality = '{$quality}' ";
        }
        
        if( !empty($carat_item) ) {
             $sql .= " AND jw.center_stone_sizes = '{$carat_item}' ";
        }
        
       $sort_list = array('ASC', 'DESC');
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY jw.price_website $sort_val";
        } else {
            $sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        //echo $sql; //exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        
        $query              = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    
    //// jewelry list
    function get_jewelry_categorywise_360_item_list_diamond_finder($catid='', $metal_type='', $quality='', $carat_item = '') {
        
        if( empty($catid) AND empty($metal_type) AND empty($quality) AND empty($carat_item) ){
            $sql   = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        }else{
            $sql   = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        }
        
        $goup_by    = ' GROUP BY jw.ring_style_bk';
        
        $sql .= " WHERE 1 = 1";
        
        $sort = 'ASC';
        
        if( !empty($metal_type) ) {
             //$sql .= " AND jw.metal_type = '{$metal_type}' ";
        }
        
        if( !empty($catid) ) {
             $sql .= " AND jw.subcategory = '{$catid}' ";
        }
        
        if( !empty($quality) ) {
            // $sql .= " AND jw.quality = '{$quality}' ";
        }
        
        if( !empty($carat_item) ) {
             //$sql .= " AND jw.center_stone_sizes = '{$carat_item}' ";
        }
        
        $sql .= " AND jw.price_website != '' ";
        
       $sort_list = array('ASC', 'DESC');
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            //$sql .= " ORDER BY jw.price_website $sort_val";
        } else {
            //$sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        
        $sql .= " ORDER BY jw.center_stone_sizes ASC";
        
        //echo $sql; //exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        
        $query              = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    
    
    //// jewelry list
    function get_jewelry_new_list($catid='', $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
        $sql  = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        $goup_by = '';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' ";
         $goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        }        
        /*$sql .= " AND jw.have_img = 'Y'";
        
        if( $catid != 'newarrivals' ) {
            if( empty($type) ) {
                 $sql .= " AND jw.category IN ( '{$catid}' )";
            } else {
                 $sql .= " AND jw.category IN ( '{$catid}', '3292605018' )";
            }
            $sql .= " OR jw.subcategory = '{$catid}' AND jw.have_img = 'Y'";
        } else {
            //$sql .= " AND have_img = 'Y'";
        }
        */
        if( !empty($catid) ) {
            $sql .= " AND jw.category IN ( '{$catid}' )";
        }
        
        
        $sort = 'ASC';
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
       $sort_list = array('ASC', 'DESC');
       //$sql .= " GROUP BY ring_style";
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY jw.g14_wh_price $sort_val, jw.price $sort_val";
        } else {
            $sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        //echo $sql; exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    
    //// jewelry list
    function get_jewelry_new_similler_list($catid='', $subcatid='', $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
        $sql  = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        $goup_by = '';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' ";
         $goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        }        
        /*$sql .= " AND jw.have_img = 'Y'";
        
        if( $catid != 'newarrivals' ) {
            if( empty($type) ) {
                 $sql .= " AND jw.category IN ( '{$catid}' )";
            } else {
                 $sql .= " AND jw.category IN ( '{$catid}', '3292605018' )";
            }
            $sql .= " OR jw.subcategory = '{$catid}' AND jw.have_img = 'Y'";
        } else {
            //$sql .= " AND have_img = 'Y'";
        }
        */
        if( !empty($catid) ) {
            $sql .= " AND jw.category IN ( '{$catid}' )";
            $sql .= " AND jw.subcategory IN ( '{$subcatid}' )";
        }
        
        
        $sort = 'ASC';
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
       $sort_list = array('ASC', 'DESC');
       //$sql .= " GROUP BY ring_style";
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY jw.g14_wh_price $sort_val, jw.price $sort_val";
        } else {
            $sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        //echo $sql; exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    
    function get_jewelry_new_similler_list_360_items($catid='', $subcatid='', $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='', $style, $metal_type, $quality, $ring_size) {
        
        /*if( empty($style) AND empty($metal_type) AND empty($quality) ){
            $sql   = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        }else{
            $sql   = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        }
        
        $goup_by    = ' GROUP BY jw.ring_style_bk';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' AND jw.category= '{$recent}' ";
         //$goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        } 
        
        if( empty($style) AND empty($metal_type) AND empty($quality) ){
            $sql .= " AND ( jw.category  = '{$catid}' OR jw.subcategory  = '{$catid}' ) ";
        }
        
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
        
        $sort = 'ASC';
        
        if( !empty($metal_type) ) {
             $sql .= " AND jw.metal_type = '{$metal_type}' ";
        }
        
        if( !empty($style) ) {
             $sql .= " AND jw.subcategory = '{$style}' ";
        }
        
        if( !empty($quality) ) {
             $sql .= " AND jw.quality = '{$quality}' ";
        }*/
        
        
        $sql  = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        $goup_by = '';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' ";
         $goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        }   
        
        
        /*if( empty($style) AND empty($metal_type) AND empty($quality) ){
            if( !empty($catid) ) {
                $sql .= " AND jw.category IN ( '{$catid}' )";
                $sql .= " AND jw.subcategory IN ( '{$subcatid}' )";
            }
        }*/
       
        
        
        /*if( !empty($metal_type) ) {
             $sql .= " AND jw.metal_type = '{$metal_type}' ";
        }*/
        
        if( !empty($subcatid) ) {
             $sql .= " AND jw.subcategory = '{$subcatid}' ";
        }
        
        /*if( !empty($quality) ) {
             $sql .= " AND jw.quality = '{$quality}' "; $ring_size
        }*/
        
        
        $sort = 'ASC';
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
       $sort_list = array('ASC', 'DESC');
       //$sql .= " GROUP BY ring_style";
       
       $goup_by    = ' GROUP BY jw.ring_style_bk';
       
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY jw.g14_wh_price $sort_val, jw.price $sort_val";
        } else {
            $sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        //echo $sql; exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    //// jewelry list
    function get_jewelry_new_count($catid=3292598018, $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
        $sql  = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        $goup_by = '';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' ";
         $goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        }        
        /*$sql .= " AND jw.have_img = 'Y'";
        
        if( $catid != 'newarrivals' ) {
            if( empty($type) ) {
                 $sql .= " AND jw.category IN ( '{$catid}' )";
            } else {
                 $sql .= " AND jw.category IN ( '{$catid}', '3292605018' )";
            }
            $sql .= " OR jw.subcategory = '{$catid}' AND jw.have_img = 'Y'";
        } else {
            //$sql .= " AND have_img = 'Y'";
        }
        */
        $sort = 'ASC';
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
       $sort_list = array('ASC', 'DESC');
       //$sql .= " GROUP BY ring_style";
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY jw.g14_wh_price $sort_val, jw.price $sort_val";
        } else {
            $sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        //echo $sql; exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    
    //// watch list
    function get_jewelry_new_watch($catid=3292598018, $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
        
        $sql  = "SELECT *, wat.retail_price AS ring_price FROM dev_watches wat";
       
        $watch_brand = base64_decode($catid);  
        $sql .= " WHERE 1 = 1 AND brand = '$watch_brand'";
           

        $sort = 'ASC';
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND wat.image_small2 != ''";
             $sort = 'ASC';
        }
        $sort_list = array('ASC', 'DESC');

        //echo $sql; exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    //// watch list
    function get_jewelry_new_watch_count($catid=3292598018, $start=0, $limit=4, $type='', $empty='', $sort_val='', $recent='') {
        $sql  = "SELECT *, jw.price_website AS ring_price FROM dev_jewelries_new jw";
        $goup_by = '';
        
        if( !empty($recent) ) {
         $sql .= " INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' ";
         $goup_by = " GROUP BY ct.lot";
        } else {
            $sql .= " WHERE 1 = 1";
        }        
        /*$sql .= " AND jw.have_img = 'Y'";
        
        if( $catid != 'newarrivals' ) {
            if( empty($type) ) {
                 $sql .= " AND jw.category IN ( '{$catid}' )";
            } else {
                 $sql .= " AND jw.category IN ( '{$catid}', '3292605018' )";
            }
            $sql .= " OR jw.subcategory = '{$catid}' AND jw.have_img = 'Y'";
        } else {
            //$sql .= " AND have_img = 'Y'";
        }
        */
        $sort = 'ASC';
        if( !empty($empty) && $catid != 'newarrivals' ) {
             $sql .= " AND jw.image1 != ''";
             $sort = 'ASC';
        }
       $sort_list = array('ASC', 'DESC');
       //$sql .= " GROUP BY ring_style";
       $sql .= $goup_by;
       
        if( !empty($sort_val) && in_array($sort_val, $sort_list) ) {
            $sql .= " ORDER BY jw.g14_wh_price $sort_val, jw.price $sort_val";
        } else {
            $sql .= " ORDER BY jw.stock_number DESC, jw.add_date DESC";
        }
        //echo $sql; exit;
        $querys    = $this->db->query($sql);
        $return['total']  = $querys->num_rows();
        $start_record = ( $start == 1 ? 0 : $start );
        if( !empty($limit) ) {
            $sql .= " LIMIT $start_record, $limit";
        }
        //echo $sql; exit;
        
        $query    = $this->db->query($sql);
        $return['results']  = $query->result_array();
        
        return $return;
    }
    
    
    
    //// jewelry list
    function get_collection_list_via_cate($catid=0, $page_limit=9) {
        $sql      = "SELECT * FROM dev_jewelries_new WHERE subcategory = '{$catid}' AND have_img = 'Y' ORDER BY item_title ASC LIMIT 0, $page_limit";
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results;
    }
    
    //// jewelry detail
    function getSternCollectionDetail($product_id=0, $metal='', $search='') {
        $sql      = "SELECT * FROM dev_jewelries_new WHERE 1 = 1";
        
        if( !empty($search) ) {
            $sql .= " AND item_sku LIKE '{$product_id}'";
        } else {
            $sql .= " AND stock_number = '{$product_id}'";
        }
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return isset($results[0])?$results[0]:array();
    }
   
    function getmenCollectionDetail($product_id,$table) {
        $sql      = "SELECT * FROM ".$table." WHERE id = '".$product_id."'";
        $query    = $this->db->query($sql);
        $results  = $query->result_array();     
        return isset($results[0])?$results[0]:array();
    }
	function getmen_more($product_id,$table) {
        $sql      = "SELECT * FROM ".$table." WHERE id != '".$product_id."' limit 0,8";
        $query    = $this->db->query($sql);
        $results  = $query->result_array();     
        return $results;
    }
    
    function getSternCollectionDetail360Item($style=0, $metal_type='', $quality='', $carat_item='', $ring_size='',  $gender='', $diamond_size = '', $chain_weight, $avail_size) {
        $sql      = "SELECT * FROM dev_jewelries_new WHERE 1 = 1";
        
        if( !empty($style) ) {
            $sql .= " AND subcategory = '{$style}'";
        }
        
        if( !empty($metal_type)) {
            $sql .= " AND metal_type = '{$metal_type}'";
        }
        
        if( !empty($quality) ) {
            $sql .= " AND quality = '{$quality}'";
        }
        
        if( !empty($ring_size) ) {
            $sql .= " AND ring_size = '{$ring_size}'";
        }
        
        if( !empty($carat_item) ) {
            $sql .= " AND center_stone_sizes = '{$carat_item}'";
        }
        
        if( !empty($gender) ) {
            $sql .= " AND gender = '{$gender}'";
        }
        
        if( !empty($diamond_size) ) {
            $sql .= " AND diamond_size = '{$diamond_size}'";
        }
        
        if( !empty($chain_weight) ) {
            $sql .= " AND chain_weight = '{$chain_weight}'";
        }
        
        if( !empty($avail_size) ) {
            $sql .= " AND avail_size = '{$avail_size}'";
        }
        
        $sql    .= ' GROUP BY ring_style_bk';
        
        //echo $sql; exit();
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results[0];
    }
    
    function getSternDistinctCollectionDetail360Item($subcategory='', $center_stone_sizes='', $quality='', $gender='', $diamond_size='', $chain_weight='', $ring_size) {
        
        $sql      = "SELECT DISTINCT(metal_type) FROM dev_jewelries_new WHERE 1 = 1";
        
        if( !empty($subcategory) ) { $sql .= " AND subcategory = '{$subcategory}'"; }
        if( !empty($gender) ) { $sql .= " AND gender = '{$gender}'"; }
        /*if( !empty($center_stone_sizes) ) { $sql .= " AND center_stone_sizes = '{$center_stone_sizes}'"; }
        if( !empty($quality) ) { $sql .= " AND quality = '{$quality}'"; }
        if( !empty($gender) ) { $sql .= " AND gender = '{$gender}'"; }
        if( !empty($diamond_size) ) { $sql .= " AND diamond_size = '{$diamond_size}'"; }
        if( !empty($chain_weight) ) { $sql .= " AND chain_weight = '{$chain_weight}'"; }
        if( !empty($ring_size) ) { $sql .= " AND ring_size = '{$ring_size}'"; }*/
        
        $sql    .= ' GROUP BY ring_style_bk';
        
        //echo $sql; exit();
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results;
    }
    
    
        //// watch detail
    function getWatchCollectionDetail($product_id=0, $metal='', $search='') {
        $sql   = "SELECT * FROM dev_watches WHERE 1 = 1";
        
        $sql    .= " AND productID = '{$product_id}'";
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results[0];
    }
    
    //// collection similar jewelry product
    function colectionSimilarProduct($cid=0, $product_id=0, $limit=4) {
        $sql      = "SELECT * FROM dev_jewelries_new WHERE stock_number != '{$product_id}' AND category = '{$cid}' AND have_img = 'Y' ORDER BY RAND() LIMIT $limit";
        /// AND price_website > 0
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results;
    }
    //// collection similar jewelry product
    function recentlyPurchaseProducts($c_id=0) {
        $sql      = "SELECT * FROM dev_jewelries_new jw INNER JOIN dev_cart ct ON jw.stock_number = ct.lot WHERE ct.addoption = 'heart_diamond_collection' AND jw.category= '{$c_id}' AND jw.have_img = 'Y' GROUP BY ct.lot ORDER BY ct.id DESC LIMIT 4";
        /// AND price_website > 0
        
        $query    = $this->db->query($sql);
        $results  = $query->result_array();
        
        return $results;
    }
}