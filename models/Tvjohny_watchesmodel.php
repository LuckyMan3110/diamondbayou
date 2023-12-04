<?php 
 class Tvjohny_watchesmodel extends CI_Model {
 	
    function __construct(){
            parent::__construct();
            $this->load->model('uploadimgmodel');
            $this->load->helper('collection_items');
    }

    function getRolexWatchesRows($cate_id=0, $pageLimit=0, $sort='DESC'){

            $qry = "SELECT * FROM `dev_tvjohnny` WHERE 1 = 1";

            if( !empty($cate_id) ) {
               $qry .= " AND `category_id` = '{$cate_id}'"; 
            } else {
                $qry .= " AND Category IN ('Specials', 'Watches', 'JD Exclusive Collection', 'Discontinued Products')"; 
            }
            
            if( $pageLimit > 0 ) {
                $page_limit = " LIMIT $pageLimit, $pageLimit";
            } else {
                $page_limit = " LIMIT 0, 50";
            }
            $qry .= " ORDER BY `Price` $sort $page_limit"; //echo $qry; exit;

            $return = 	$this->db->query($qry);
            $result = $return->result_array();	
            return isset($result) ? $result : false;
    }
    
    function getRolexWatchesSimilarRows($cate_id=0, $pid=0, $limit=4){

            $qry = "SELECT * FROM `dev_tvjohnny` WHERE 1 = 1 AND `id` != '{$pid}'";

            $qry .= " AND `category_id` = '{$cate_id}'"; 
            $qry .= " ORDER BY RAND() LIMIT $limit"; //echo $qry; exit;

            $return = $this->db->query($qry);
            $result = $return->result_array();
            
            return isset($result) ? $result : false;
    }
    
    function rolexWatchesCategoryRows($cateType=''){
        $qry = "SELECT * FROM `dev_tvjohny_categories` WHERE  1 = 1";
        
        if( !empty($cateType) ) {
            $qry .= " AND `cate_type` = '{$cateType}'";
        }
        
        $qry .= " ORDER BY sub_cate_name ASC";

        $return = $this->db->query($qry);
        $result = $return->result_array();
        
        return $result;
    }
    
    function tvJohnnySearchResults($searchField='') {
        
        if( !empty($searchField) ) {
            $qry = "SELECT * FROM `dev_tvjohnny` WHERE 1 = 1";
            $qry .= " AND Title LIKE '%{$searchField}%' OR SKU LIKE '%{$searchField}%' OR Category LIKE '%{$searchField}%'";
            $qry .= " OR Subcategory_1 LIKE '%{$searchField}%' OR Subcategory_2 LIKE '%{$searchField}%' OR Description_1 LIKE '%{$searchField}%'";
            $qry .= " ORDER BY RAND() LIMIT 20"; //echo $qry; exit;
            $return = $this->db->query($qry);
            $result = $return->result_array();
            
        } else {
            $result[] = '';
        }
        
        return $result;
    }
    
    function get_tvjohny_row_details($id=0, $edit_id=0, $post=[], $files=[]) {
        $sql = "SELECT * FROM dev_tvjohnny WHERE id = '{$id}'";
        $result = $this->db->query($sql);
        $results = $result->result_array();
        
        //// edit collection row
        if( $edit_id > 0 ) {
            //print_ar( $post );
            $this->update_collection_items_row( $post, $files );
        }
        
        return $results[0];
    }
    
    function update_collection_items_row($post=[], $files=[]) {
        $fields_list = collection_items_fields();  /// collection_items helper
        $sql = "UPDATE dev_tvjohnny set `dumy_field` = ''";
        
        foreach( $fields_list as $field_label => $field_name ) {
            //if( !empty($post[$field_name]) ) {
                $sql .= ", `$field_name` = '{$post[$field_name]}'";
            //}            
        }
        
        $sql .= " WHERE `id` = '{$post['collection_id']}'";
        $this->db->query($sql);
        /// update img file
         for($f=1; $f <= 10; $f++) {
            $field_name = 'Image_' . $f;
            $file_name = $files[$field_name]['name'];
            $rid = $post['collection_id'];
            if ($file_name != '') {
                $this->uploadimgmodel->upload_img_file($files, $field_name, 'collection_images', 'jpeg,gif,jpg,bmp,png', 'collection_images', 'item_img', 'dev_tvjohnny', 'id', $rid, $field_name);
            }
        }
        
        //echo $sql; exit;
    }
    
    function getTvJohnyRolexRowID($item_sku=''){
        $qry = "SELECT id FROM `dev_tvjohnny` WHERE `SKU` = '{$item_sku}' ORDER BY id DESC LIMIT 1";

        $return = $this->db->query($qry);
        $result = $return->result_array();
        
        return $result[0]['id'];
    }
    
    function getRolexSubCategoryRows($subcate=''){
        $qry = "SELECT * FROM `dev_tvjohny_categories` WHERE 1 = 1 AND sub_cate_name = '{$subcate}'";
        
        $qry .= " ORDER BY sub_sub_cate ASC";

        $return = $this->db->query($qry);
        $result = $return->result_array();
        
        return $result;
    }
    
    function getRolexCategoryRow($category_id=''){
        $qry = "SELECT * FROM `dev_tvjohny_categories` WHERE 1 = 1 AND id = '{$category_id}'";
        
        $qry .= " ORDER BY sub_sub_cate ASC";

        $return = $this->db->query($qry);
        $result = $return->result_array();
        
        return $result[0];
    }
    
    function getRolexWatchesDetail($pid=0){

        $qry = "SELECT * FROM `dev_tvjohnny` WHERE id = '{$pid}' AND Price > 0 ORDER BY id DESC LIMIT 1";

        $return = $this->db->query($qry);
        $result = $return->result_array();	
        return isset($result) ? $result[0] : false;
    }
    
    function getTvJohnnyRows($page = 1, $rp = 10, $sortname = 'Title', $sortorder = 'desc', $query = '', $qtype = 'Title', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query) {
            $qwhere .= " AND $qtype LIKE '%$query%'";
        }
        if ($oid != '') {
            $qwhere .= " AND id = $oid";
        }

        $sql = 'SELECT * FROM  ' . $this->config->item('table_perfix') . 'tvjohnny where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'tvjohnny  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }
    
    function getTvJohnyCateList() {

        $qry = "SELECT id FROM `dev_tvjohny_categories` WHERE `sub_cate_name` IN ('Chains', 'Pendants')";

        $return = $this->db->query($qry);
        $result = $return->result_array();
        $cate_id = array();
        
        foreach( $result as $row ) {
            $cate_id[] = $row['id'];
        }
        
        $set_tvjh_cate = "('" . implode("', '", $cate_id) . "', '1', '2', '17', '0')";
        
        return $set_tvjh_cate;
    }
    
    function getTvJonhyRandomProducts($limit=6, $sub_cate='') {
        $cate_id_list = $this->getTvJohnyCateList();
        
        $qry = "SELECT * FROM dev_tvjohnny WHERE Price > 0 AND Image_1 <> ''";
        
        if( !empty($sub_cate) ) {
          $qry .= " AND `Subcategory_1` = '{$sub_cate}'";  
        }
        
        $qry .= " AND category_id NOT IN $cate_id_list";
        $qry .= " ORDER BY rand() LIMIT $limit"; //echo $qry;

        $return = $this->db->query($qry);
        $result = $return->result_array();
        
        return $result;
    }
    
    function getTvJonhyRandomEarrings($cate='Earrings', $limit=1) {
        
        $qry = "SELECT * FROM dev_tvjohnny WHERE Price > 0 AND Subcategory_1 = '{$cate}'";
        
        $qry .= " ORDER BY rand() LIMIT $limit"; //echo $qry;

        $return = $this->db->query($qry);
        $result = $return->result_array();
        
        return $result[0];
    }
 }
