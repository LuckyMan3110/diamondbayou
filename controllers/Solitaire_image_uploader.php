<?php
class Solitaire_image_uploader extends CI_Controller {
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
			
			$where_csc_id						=  array('pic_id >' => '0');
			$data['get_category_list_count'] 	=  $this->adminmodel->count_any_table($where_csc_id, 'dev_pictures_new');
			$data['get_category_list']			=  $this->adminmodel->getdata_any_table_limit_order_where('dev_pictures_new', $where_csc_id, $limit, $offset, 'pic_id');

			
			$output = $this->load->view('admin/solitaire-image-uploader', $data, true);
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
				
				//white_background
				$insertdata['white_background']	= $this->input->post('white_background_check');
	            if(!empty($_FILES['white_background']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['white_background']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('white_background')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['white_background']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //White
				$insertdata['White']	= $this->input->post('White_check');
	            if(!empty($_FILES['White']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['White']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('White')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['White']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Yellow
				$insertdata['Yellow']	= $this->input->post('Yellow_check');
	            if(!empty($_FILES['Yellow']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Yellow']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Yellow')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Yellow']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Purple
				$insertdata['Purple']	= $this->input->post('Purple_check');
	            if(!empty($_FILES['Purple']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Purple']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Purple')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Purple']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Green
				$insertdata['Green']	= $this->input->post('Green_check');
	            if(!empty($_FILES['Green']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Green']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Green')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Green']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Orange
				$insertdata['Orange']	= $this->input->post('Orange_check');
	            if(!empty($_FILES['Orange']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Orange']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Orange')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Orange']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Red
				$insertdata['Red']	= $this->input->post('Red_check');
	            if(!empty($_FILES['Red']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Red']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Red')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Red']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Blue
				$insertdata['Blue']	= $this->input->post('Blue_check');
	            if(!empty($_FILES['Blue']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Blue']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Blue')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Blue']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Black
				$insertdata['Black']	= $this->input->post('Black_check');
	            if(!empty($_FILES['Black']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Black']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Black')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Black']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Gray
				$insertdata['Gray']	= $this->input->post('Gray_check');
	            if(!empty($_FILES['Gray']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Gray']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Gray')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Gray']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Pink
				$insertdata['Pink']	= $this->input->post('Pink_check');
	            if(!empty($_FILES['Pink']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Pink']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Pink')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Pink']	= 'images/pictures/'.$img_path;
	                }
	            }
	            
	            //Brown
				$insertdata['Brown']	= $this->input->post('Brown_check');
	            if(!empty($_FILES['Brown']['name'])){
	                
	                $config['upload_path'] 	 = 'images/pictures/';
	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
	                $config['overwrite'] 	 = TRUE;
	                $config['file_name'] 	 = $_FILES['Brown']['name'];
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('Brown')){
	                    $uploadData = $this->upload->data();
	                    $img_path   = $uploadData['file_name'];
	                    $insertdata['Brown']	= 'images/pictures/'.$img_path;
	                }
	            }

				$updateData = array(
					'white_background'	=> $insertdata['white_background'],
					'White'		        => $insertdata['White'],
					'Yellow'		    => $insertdata['Yellow'],
					'Purple'		    => $insertdata['Purple'],
					'Green'		        => $insertdata['Green'],
					'Orange'		    => $insertdata['Orange'],
					'Red'		        => $insertdata['Red'],
					'Blue'		        => $insertdata['Blue'],
					'Black'		        => $insertdata['Black'],
					'Gray'		        => $insertdata['Gray'],
					'Pink'		        => $insertdata['Pink'],
					'Brown'		        => $insertdata['Brown'],
				);
				
				$this->adminmodel->update_any_table($updateData, 'dev_pictures_new', 'pic_id', $edited_page_id);
				$data['msg'] = 'Successfully Updated The Shape <b>'.$this->input->post('diamondshape').'</b>.';
				$data['msg_notify'] = 1;
				
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
				$where_cat_id		    = array('pic_id' => $edit_page_id);
				$data['get_cat']        = $this->adminmodel->getdata_any_table_where($where_cat_id, 'dev_pictures_new');

			}
		    

			
			$output = $this->load->view('admin/add-solitaire-image-uploader', $data, true);
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
