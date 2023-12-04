<?php
/**
* model class used for displaying braclets imported from quality gold via excel file...
* @param string
* @return string
* @since 29, June 2016
* @Author Muhammad Safdar
 * 
*/
class Braceletmodel extends CI_Model {
    function __construct(){

            parent::__construct();
    }
    
    function getBraceleteListings($cateid=0, $offset=0, $limit=15, $similar='', $pid='', $metal='', $color='', $sort='')
    {          
        $sql = "SELECT * FROM dev_bracelet_data WHERE 1 = 1";
             
        if( $cateid > 0 ) {
            $sql .= " AND category_id = '{$cateid}'";
        }
        if( !empty($metal) ) {
            $sql .= " AND default_metal LIKE '%{$metal}%'";
        }
        if( !empty($color) ) {
            $sql .= " AND default_color LIKE '%{$color}%'";
        }
        if( !empty($pid) && $pid > 0 ) {
            $sql .= " AND id != '{$pid}'";
        }
        
        $count_sql = $this->db->query($sql);
        $return['total'] = $count_sql->num_rows();
        
        if( !empty($sort) ) {
            $sql .= " ORDER BY gold_polished_1300 $sort";
        }
        
        $sql .= ( empty($similar) ? " LIMIT $offset, $limit" : " ORDER BY RAND() LIMIT 15" );
        //echo $sql;
        
        $sqlrings = $this->db->query($sql);
        $return['results'] = $sqlrings->result_array();

        return $return;
    }
    
    ////// get bracelet details
    function getBraceleteDetail($id=0)
    {
            $sql = "SELECT * FROM dev_bracelet_data WHERE id = '{$id}'";
            $result = $this->db->query($sql);
            $results = $result->result_array();
            return $results[0];
    }
    ////// get bracelet id search options
    function getColumnID($table_name='', $column_name='', $column_value='')
    {
            $sql = "SELECT * FROM $table_name WHERE $column_name = '{$column_value}' LIMIT 1";
            $result = $this->db->query($sql);
            $results = $result->result_array();
            return $results[0];
    }
    
    ////// get bracelet metal
    function getBraceletMetal($field='default_metal')
    {
            $sql = "SELECT $field FROM dev_bracelet_data WHERE $field <> '' GROUP BY $field ORDER BY $field ASC";
            $result = $this->db->query($sql);
            $results = $result->result_array();
            return $results;
    }
    
    ////// get bracelet category
    function getBraceletCategory($cateid=0)
    {
            $sql = "SELECT * FROM dev_bracelet_category WHERE pid = '{$cateid}' ORDER BY category_name ASC";
            $result = $this->db->query($sql);
            $results = $result->result_array();
            return $results;
    }
    
    ////// get category parent id
    function getBraceletParentCateId($cateid=0)
    {
            $sql = "SELECT pid FROM dev_bracelet_category WHERE id = '{$cateid}' ORDER BY id DESC LIMIT 1";
            $result = $this->db->query($sql);
            $results = $result->result_array();
            
            return $results[0]['pid'];
    }
}

