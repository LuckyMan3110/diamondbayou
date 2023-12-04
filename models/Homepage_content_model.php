<?php 
class Homepage_content_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->model('uploadimgmodel');
    }

    function home_page_content_rows() {
        $qry = "SELECT * FROM `dev_home_page_content` ORDER BY `id` ASC";
        $return = $this->db->query($qry);
        $result = $return->result_array();

        return $result;
    }

    function home_content_row($id=0) {
        $qry = "SELECT * FROM `dev_home_page_content` WHERE id = '{$id}' ORDER BY `id` DESC LIMIT 1";
        $return = $this->db->query($qry);
        $result = $return->result_array();

        return $result[0];
    }

    function save_page_content_rows() {
        $contents = $this->home_page_content_rows();
        if( count($contents) > 0 ) {
            foreach( $contents as $rows ) {
                $block_label = $this->input->post('content_label_'.$rows['id']);
                $block_link  = $this->input->post('page_link_'.$rows['id']);
                if( !empty($block_label) ) {
                    $sql = "UPDATE `dev_home_page_content` set block_label = '{$block_label}'";
                    if( !empty($block_link) ) {
                        $sql .= " , block_link = '{$block_link}'";
                    } else {
                        $sql .= " , block_link = '#'";
                    }
                    $sql .= " WHERE `id` = '{$rows['id']}'";
                    $this->db->query($sql);  /// execute sql query
                    $file_field = 'file_name_' . $rows['id'];
                    $this->uploadimgmodel->upload_img_file($_FILES, $file_field, '', 'jpg,jpeg,png', 'uploads/home_page_img', '', 'dev_home_page_content', 'id', $rows['id'], 'block_img');
                }
            }
        }
    }

	function cover_content_rows() {
		$qry = "SELECT * FROM `dev_cover_pages` ORDER BY `id` ASC";
		$return = $this->db->query($qry);
		$result = $return->result_array();

        return $result;
    }

	function save_home_content() {
		$sort_order = $this->input->post('sort_order');
		$content  = htmlspecialchars($this->input->post('editor1'), ENT_QUOTES);
		if(!empty($content)){
			$sql = "UPDATE `dev_cover_pages` set section_content = '".$content."', sort_order = '".$sort_order."'";
			$sql .= " WHERE page_name LIKE 'home'";
			$this->db->query($sql);
		}
    }

	function save_diamonds_content() {
		$sort_order = $this->input->post('sort_order');
		$content  = htmlspecialchars($this->input->post('editor2'), ENT_QUOTES);
		if(!empty($content)){
			$sql = "UPDATE `dev_cover_pages` set `section_content` = '".$content."', sort_order = '".$sort_order."'";
			$sql .= " WHERE page_name LIKE 'diamonds'";
			$this->db->query($sql);
		}
    }

	function save_engagement_content() {
		$sort_order = $this->input->post('sort_order');
		$content  = htmlspecialchars($this->input->post('editor3'), ENT_QUOTES);
		if(!empty($content)){
			$sql = "UPDATE `dev_cover_pages` set section_content = '".$content."', sort_order = '".$sort_order."'";
			$sql .= " WHERE page_name LIKE 'engagement'";
			$this->db->query($sql);
		}
    }

	function save_wedding_content() {
		$sort_order = $this->input->post('sort_order');
		$content  = htmlspecialchars($this->input->post('editor4'), ENT_QUOTES);
		if(!empty($content)){
			$sql = "UPDATE `dev_cover_pages` set section_content = '".$content."', sort_order = '".$sort_order."'";
			$sql .= " WHERE page_name LIKE 'wedding'";
			$this->db->query($sql);
		}
    }

	function save_jewelry_content() {
		$sort_order = $this->input->post('sort_order');
		$content  = htmlspecialchars($this->input->post('editor5'), ENT_QUOTES);
		if(!empty($content)){
			$sql = "UPDATE `dev_cover_pages` set section_content = '".$content."', sort_order = '".$sort_order."'";
			$sql .= " WHERE page_name LIKE 'jewelry'";
			$this->db->query($sql);
		}
    }

	function save_learn_content() {
		$sort_order = $this->input->post('sort_order');
		$content  = htmlspecialchars($this->input->post('editor6'), ENT_QUOTES);
		if(!empty($content)){
			$sql = "UPDATE `dev_cover_pages` set section_content = '".$content."', sort_order = '".$sort_order."'";
			$sql .= " WHERE page_name LIKE 'learn'";
			$this->db->query($sql);
		}
    }

}