<?php
/**
 * class used to managed diamond list display according to the unique rings 
 * 
 */
class Uniquejewelry extends CI_Controller{
	
	function __construct(){
		
	parent::__construct();
        $this->load->library("pagination");
        $this->load->model("jewelleriesmodel");
        $this->load->helper("url");
        $this->load->helper("t_helper");
        $this->load->helper('directory');
	$this->session->unset_userdata('whsale_section');
    }
    
    /// dispaly diamond list
    function getRapnetList() {
        
        $dmshape  = $this->session->userdata('shape');
        $dmlength = $this->session->userdata('length');
        $dmwidth  = $this->session->userdata('width');
        $dmcarat  = $this->session->userdata('ringcarat');
        
        $sql = "SELECT * FROM dev_rapproduct WHERE 1 = 1";
        if( !empty($dmshape) ) {
            $sql .= " AND shape ='{$dmshape}'";
        }
        if( !empty($dmlength) ) {
            $sql .= " AND length ='{$dmlength}'";
        }
        if( !empty($dmwidth) ) {
            $sql .= " AND width ='{$dmwidth}'";
        }
        if( !empty($dmcarat) ) {
            $sql .= " AND carat ='{$dmcarat}'";
        }
        
        echo $this->session->userdata('shape') . 'test';
        echo $sql;
        
        $query = $this->db->query($sql);
        $results = $query->result_array();
    }
}
