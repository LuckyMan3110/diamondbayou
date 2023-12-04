<?php
class Footer_category_page_manager extends CI_Controller {
	private $totalEmails;
	function __construct() {
            parent::__construct();
            $this->load->model('adminmodel');
            $this->load->model('user');
            $this->load->model('sitepaging');
            $this->load->model('commonmodel');
            $this->load->model('helixmodel');
            $this->load->model('cronmodel');                
            $this->load->model('davidsternmodel');
            $this->load->helper('admin_libs');
            $this->load->helper('admin_mainmenu');
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->model('catemodel');

            $ttEmail = $this->adminmodel->getEmailsReceivedList();
            $this->totalEmails = $ttEmail['count']; 

            $cu = current_url();
            $url = explode('/', $cu);
            $uri = ( isset($url[4]) ? $url[4] : '' );
            $this->session->set_userdata('pages_name', $uri);
		
	}
	function index() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
		    
		    // Delete Item
			if(isset($_GET['delete_page_id'])){

				$delete_page_id 		    = $_GET['delete_page_id'];
				$data['get_product_cart']	= $this->adminmodel->delete_any_table('content_man_page', 'page_id', $delete_page_id);
				$data['msg'] 		        = 'Successfully deleted one item from page list.';
				$data['msg_notify']         = 1;
				
			}
		    
		    
		    if(isset($_GET['limit']) AND isset($_GET['offset'])){
				$limit 	= $_GET['limit'];
				$offset = $_GET['offset'];
			}else{
				$limit  = 20;
				$offset = 0;
			}
			
			$where_csc_id						=  array('page_id >' => '0');
			$data['get_category_list_count'] 	=  $this->adminmodel->count_any_table($where_csc_id, 'content_man_page');
			$data['get_category_list']			=  $this->adminmodel->getdata_any_table_limit_order_where('content_man_page', $where_csc_id, $limit, $offset, 'page_id');

			
			$output = $this->load->view('admin/footer_category_page_manager', $data, true);
		} else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	
	
	function add() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
		    
				
			$data['msg_notify'] = 0;
		    $data['msg'] 		= '';
		    
		    // Edit Options
			if(isset($_POST['edit_page'])){

				$today_date 		        = date('Y-m-d');
				$edited_page_id		        = $this->input->post('edited_page_id');
				$insertdata['status']		= 'Active';
				$insertdata['entry_date']	= date("Y-m-d");

				$updateData = array(
					'title'		=> $this->input->post('title'),
					'page_slug'		=> $this->input->post('page_slug'),
					'content'	=> $this->input->post('content'),
					'footer_column'	=> $this->input->post('footer_column'),
					'status'	=> $this->input->post('status'),
					'page_order'	=> $this->input->post('page_order'),
				);

				$where_count		=  array('title' => $this->input->post('title'));
				$get_res_count 		=  $this->adminmodel->count_any_table($where_count, 'content_man_page');

				if($get_res_count > 1){
					$data['msg'] 		= '<b>Sorry! This Category " '.$this->input->post('title').' " Already Used Another.';
					$data['msg_notify'] = 2;
				}else{
					$this->adminmodel->update_any_table($updateData, 'content_man_page', 'page_id', $edited_page_id);
					$data['msg'] = 'Successfully Updated The Page <b>'.$this->input->post('title').'</b>.';
					$data['msg_notify'] = 1;
				}
			}
		    
		    if(isset($_POST['add_page'])){
				$today_date =	date('Y-m-d');

				$insertdata['title']	    = $this->input->post('title');
				$insertdata['page_slug']	    = $this->input->post('page_slug');
				$insertdata['content']	    = $this->input->post('content');
				$insertdata['footer_column']	    = $this->input->post('footer_column');
				$insertdata['page_order']	    = $this->input->post('page_order');

				$insertdata['status']	    = $this->input->post('status');
				$insertdata['entry_date']	= date("Y-m-d");

				$where_count		        =  array('title' => $insertdata['title']);
				$get_res_count 		        =  $this->adminmodel->count_any_table($where_count, 'content_man_page');

				if($get_res_count > 0){
					$data['msg'] 		= '<b>Sorry! This Page Title " '.$insertdata['title'].' " Already Used.';
					$data['msg_notify'] = 2;
				}else{
					$this->adminmodel->insert_into_any_table($insertdata, 'content_man_page');
					$data['msg'] = 'Successfully Added New Page <b>'.$insertdata['title'].'</b>.';
					$data['msg_notify'] = 1;
				}
				
			}
			
			$data['edit_option']	= 0;	
			$data['get_cat']		= array();
			if(isset($_GET['edit_page_id'])){

				$data['edit_option']	= 1;
				$edit_page_id 		    = $_GET['edit_page_id'];
				$where_cat_id		    = array('page_id' => $edit_page_id);
				$data['get_cat']        = $this->adminmodel->getdata_any_table_where($where_cat_id, 'content_man_page');

			}
		    

			
			$output = $this->load->view('admin/add_footer_category_page_manager', $data, true);
		} else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	
	
	private function getCommonData() {
		$data = array();
		$data = $this->commonmodel->getPageCommonData();
		return $data;
	}
	
	function getAdminDetails() {
		if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
			return 'Administrator';
		} else {
			return '-1';
		}
	}
	
	function isadminlogin() {
		if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
			return true;
		} else {
			return false;
		}
	}
	
	//// view important task list
	function viewImportanTaskList() {
		$rowtask = $this->adminmodel->getTaskList('imptask', '');
		$viewTask = '';
		
		if( $rowtask['count'] > 0 ) {
			foreach($rowtask['results'] as $results) {
				$viewTask .= '<li class="list-group-item">
                    <label class="label-checkbox inline">
                      <input type="checkbox" class="task-finish">
                      <span class="custom-checkbox"></span> </label>
                    '.$results['task_heading'].' <span class="pull-right"> <a class="task-del" href="#javascript;" onclick="deleteImpTask(\''.$results['id'].'\')"><i class="fa fa-times"></i></a> </span> </li>';
			}
		} else {
			$viewTask .= '<li class="list-group-item green-light-bg-color">No Task List Found</li>';	
		}
		
		return $viewTask;	
	}
	
	private function output($layout = null, $data = array()) {
		$this->load->model('user');
		$this->load->model('adminmodel');
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$data['loginlink'] = $this->user->loginhtml('admin');
		$output = $this->load->view('admin/header', $data, true);
		if ($this->session->isLoggedin() && ($this->session->userdata('usertype') == 'admin')) {
			$output .= $layout;
		} else {
			$output .= $this->load->view('admin/login', $data, true);
		}
		$output .= $this->load->view('admin/footer', $data, true);
		$this->output->set_output($output);
	}
        
    
}
?>
