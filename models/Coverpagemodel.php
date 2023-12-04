<?php
class Coverpagemodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function make_content_page_return($where = ''){
		$this->db->select('section_content');
		$this->db->where('page_name LIKE',$where);
		$this->db->from('dev_cover_pages');
		$query = $this->db->get();
	
		if ( $query->num_rows() > 0 ){
			return $query->row();
		}
	}
	
	
	function get_overnight_categories(){
		$this->db->select('*');
		
		$this->db->from('dev_overnight_cate_new');
		$query = $this->db->get();
	
		if ( $query->num_rows() > 0 ){
			return $query->result();
		}
		
	}

}  	