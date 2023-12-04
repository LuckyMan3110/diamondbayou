<?php 
 class Rolexmodel_new extends CI_Model {
 	
    function __construct(){
            parent::__construct();
    }

    function getRolexProductsList($cate_id=0){

            $qry = "SELECT * FROM qgold_products_rolex WHERE 1 = 1 AND price > 0";

            if( $cate_id > 0 ) {
               $qry .= " AND catid = '{$cate_id}'"; 
            }

            $qry .= " ORDER BY id DESC"; 

            $return = 	$this->db->query($qry);
            $result = $return->result_array();	
            return isset($result) ? $result : false;
    }
    
    function getRolexWatchDetail($pid=0){

            $qry = "SELECT * FROM qgold_products_rolex WHERE id = '{$pid}' AND price > 0 ORDER BY id DESC LIMIT 1";

            $return = 	$this->db->query($qry);
            $result = $return->result_array();	
            return isset($result) ? $result[0] : false;
    }
 }
