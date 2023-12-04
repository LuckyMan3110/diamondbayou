<?php  
    class Adminjewelrymodel extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }
    
    function getJewCategory($cid=0) {
        $sql = "SELECT * FROM dev_ebaycategories WHERE parent_id = '{$cid}' AND cat_id NOT IN (78, 189, 199, 101) ORDER BY category_name ASC";
        $result  = $this->db->query($sql);
        $content = $result->result_array();
        
        return $content;
    }
    function getMaxCateId() {
        $sql = "SELECT max(category_id), max(category_id) + 1 maxcate_id FROM dev_ebaycategories LIMIT 1";
        $result  = $this->db->query($sql);
        $content = $result->result_array();
        
        return $content[0]['maxcate_id'];
    }
   ///// get tattribute list 
    function getAttributeList($category_id=0, $listing='') {
        $sql = "SELECT * FROM dev_jewelry_attribute WHERE 1 = 1";
        
        if( empty($listing) ) {
            $sql .= " AND sub_category = '{$category_id}' OR sub_category = ''";
        }
        $result  = $this->db->query($sql);
        $content = $result->result_array();
        
        return $content;
    }
   ///// get tattribute list 
    function getCategoryName($id=0) {
        $result  = $this->db->query( "SELECT category_name FROM `dev_ebaycategories` WHERE category_id = '{$id}'" );
        $content = $result->result_array();
        
        return $content[0]['category_name'];
    }
    
    //// get attribute row
    function getAttributeRow($id=0) {
        
        $contentrow = '';
        
        if( !empty($id) ) {
            $result  = $this->db->query( "SELECT * FROM `dev_jewelry_attribute` WHERE id = '{$id}'" );
            $content = $result->result_array();

            $contentrow = $content[0];
        }
        
        return $contentrow;
    }
    //// save category data into db
    function saveJewCategory() {
            $category_id    = $this->getMaxCateId();
            $cmb_subcate    = $this->input->post('cmb_subcate', TRUE);
            $sub_catename   = $this->input->post('sub_catename', TRUE);
            
            if( empty($cmb_subcate) ) {
                $parent_category_id = $this->input->post('cmb_parentcate', TRUE);
            } else {
                $parent_category_id = $cmb_subcate;
            }
            $add_date = date('Y-m-d');
            
            if( !empty($sub_catename) ) {
                $sql = "INSERT INTO dev_ebaycategories(`category_id`, `category_name`, `parent_id`, `category_adddate`) VALUES('{$category_id}', '{$sub_catename}', '{$parent_category_id}', '{$add_date}')";

                $this->db->query( $sql );
                
                return 'true';
            }
            
            
        return 'false';
    }
    
    //// save jewelry attributes data into db
    function saveJewAttriubte($id=0, $action='') {
            $cmb_parentcate    = $this->input->post('cmb_parentcate', TRUE);
            $parent_sub_cate   = $this->input->post('parent_sub_cate', TRUE);
            $subcate_options   = $this->input->post('subcate_options', TRUE);
            $attribute_name    = $this->input->post('attribute_name', TRUE);
            $btn_submit   = $this->input->post('btn_submit', TRUE);
            $attr_type   = ( empty($cmb_parentcate) ? 'global' : '' );
            
            if( $action === 'delete' ) {
                $this->db->query( "DELETE FROM `dev_jewelry_attribute` WHERE id = '{$id}'" );
            }
            
            if( !empty($btn_submit) ) {
                if( empty($id) ) {
                    $sql = "INSERT INTO `dev_jewelry_attribute`(`attribute_label`, `parent_category`, `parent_sub_category`, `sub_category`, `attribute_type`) VALUES('{$attribute_name}', '{$cmb_parentcate}', '{$parent_sub_cate}', '{$subcate_options}', '{$attr_type}')";
                } else {
                    $sql = "UPDATE `dev_jewelry_attribute` SET `attribute_label` = '{$attribute_name}' WHERE id = '{$id}'";
                }
                //echo $sql; exit;

                $this->db->query( $sql );
                
                return 'true';
            }
            
            
        return 'false';
    }
}