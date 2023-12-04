<?php
class Home_page_mgmt extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('user');
        $this->load->model('commonmodel');
        $this->load->model('homepage_content_model');
        $this->load->helper('admin_mainmenu');
        $this->load->helper('admin_libs');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index() {
        die('You are not allowed to access this page directly!');
    }

    function manage_home_page() {
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        
        if($this->isadminlogin()) {
            $btn_submit = $this->input->post('btn_submit');
            if( !empty($btn_submit) ) {
                $this->homepage_content_model->save_page_content_rows(); /// save home page content in db
            }

            $data['content_rows'] = $this->content_rows_listings();
            $output = $this->load->view('admin/home_page_content_mgmt', $data, true);
			$this->output($output, $data);
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }

	function manage_cover_page() {
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        if($this->isadminlogin()) {
			$btn_submit = $this->input->post('btn_submit');
			$pageName = $this->input->post('page_name');
			if(!empty($btn_submit) && $pageName == 'home') {
                $this->homepage_content_model->save_home_content();
				redirect(base_url().'home_page_mgmt/manage_cover_page');
            }elseif(!empty($btn_submit) && $pageName == 'diamonds') {
                $this->homepage_content_model->save_diamonds_content();
				redirect(base_url().'home_page_mgmt/manage_cover_page');
            }elseif(!empty($btn_submit) && $pageName == 'engagement') {
                $this->homepage_content_model->save_engagement_content();
				redirect(base_url().'home_page_mgmt/manage_cover_page');
            }elseif(!empty($btn_submit) && $pageName == 'wedding') {
                $this->homepage_content_model->save_wedding_content();
				redirect(base_url().'home_page_mgmt/manage_cover_page');
            }elseif(!empty($btn_submit) && $pageName == 'jewelry') {
                $this->homepage_content_model->save_jewelry_content();
				redirect(base_url().'home_page_mgmt/manage_cover_page');
            }elseif(!empty($btn_submit) && $pageName == 'learn') {
                $this->homepage_content_model->save_learn_content();
				redirect(base_url().'home_page_mgmt/manage_cover_page');
            }

            $data['content_rows'] = $this->homepage_content_model->cover_content_rows();
            $output = $this->load->view('admin/cover_page_content_mgmt', $data, true);
			$this->output($output, $data);
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }

	function manage_cover_page2() {
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        if($this->isadminlogin()) {
            $btn_submit = $this->input->post('btn_submit');
            if( !empty($btn_submit) ) {
                $this->homepage_content_model->save_page_content_rows();
            }
            
            $data['content_rows'] = $this->content_rows_listings();
            $output = $this->load->view('admin/cover_page_content_mgmt2', $data, true);
			$this->output($output, $data);
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }

    function content_rows_listings() {
        $results = $this->homepage_content_model->home_page_content_rows();
        $table_rows = '';
        
        if( count($results) > 0 ) {
            foreach( $results as $rows ) {
                $id = $rows['id'];
                
                $table_rows .= '<tr>
                    <th>'.$rows['block_label'].'</th>
                    <td><input type="file" name="file_name_'.$id.'" />
                        <div class="set_dimension">Dimension: '.$rows['img_dimension'].'</div>
                    </td>
                    <td><input type="text" name="content_label_'.$id.'" value="'.$rows['block_label'].'" /></td>
                    <td><input type="text" name="page_link_'.$id.'" value="'.$rows['block_link'].'" /></td>
                </tr>';
            }
        } else {
            $table_rows .= '<tr><td colspan="4"></td></tr>';
        }
        
        return $table_rows;
    }

    function isadminlogin() {
        if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
                return true;
        } else {
                return false;
        }
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

	function getAdminDetails() {
        if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
                return 'Administrator';
        } else {
                return '-1';
        }
	}

	private function getCommonData() {
        $data = $this->commonmodel->getPageCommonData();
        return $data;
	}

}