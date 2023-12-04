<?php
class Adminsectionmodels extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getOrderResults($post=[]) {
        $date_from = isset($post['date_from'])?$post['date_from']:'';
        $date_to   = isset($post['date_to'])?$post['date_to']:'';
        $sql = "SELECT * FROM dev_order WHERE 1 = 1";
        $sql .= " AND `order_type` = 'R'";
        if( !empty($date_from) && !empty($date_to) ) {
            $sql .= " AND `orderdate` >= '$date_from' AND `orderdate` <= '$date_to'";
        }        

        $sql .= " ORDER BY id DESC";
        $query = $this->db->query($sql);
        $results = $query->result_array();

        return $results;
    }    

    function getCategoryNameViaManufact($cate_id=0, $manufact_type='') {
        $returns = array();
        if( $manufact_type == 'quality' ) {
            $quality = $this->db->query("SELECT `title` FROM `qgold_categories` WHERE `id` = '{$cate_id}' ORDER BY `id` DESC LIMIT 1");
            $quality_result = $quality->result_array();
            $returns[$manufact_type] = $quality_result[0]['title'];  /// quality category name
        }
        
        if( $manufact_type == 'unique' ) {
            $unique = $this->db->query("SELECT `catname` FROM `dev_us_catagories` WHERE `id` = '{$cate_id}' ORDER BY `id` DESC LIMIT 1");
            $unique_query = $unique->result_array();
            $returns[$manufact_type] = $unique_query[0]['catname'];  /// unique category name
            //echo $returns[$manufact_type];
        }
        
        if( $manufact_type == 'overnight' ) {
            $overnight = $this->db->query("SELECT `cate_name` FROM `dev_overnight_cate` WHERE `id` = '{$cate_id}' ORDER BY `id` DESC LIMIT 1");
            $overnight_query = $overnight->result_array();
            $returns[$manufact_type] = $overnight_query[0]['cate_name'];  /// overnight category name
        }
        
        if( $manufact_type == 'tvjohny' ) {
            $sqlquery = "SELECT `sub_cate_name`, `sub_sub_cate` FROM `dev_tvjohny_categories` WHERE `id` = '{$cate_id}' ORDER BY `id` DESC LIMIT 1";
            $tvjohny = $this->db->query( $sqlquery );
            $tvjohnysql = $tvjohny->result_array();
            $returns[$manufact_type] = check_empty($tvjohnysql[0]['sub_sub_cate'], $tvjohnysql[0]['sub_cate_name']);  /// tvjohny category name
        }
        
        return $returns;
    }
}