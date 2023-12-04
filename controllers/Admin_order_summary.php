<?php
ini_set('display_errors',1); 
class Admin_order_summary extends CI_Controller {
	private $totalEmails;
	function __construct() {
		parent::__construct();
		$this->load->helper('admin_mainmenu');
		$this->load->helper('admin_libs');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('ordrs_detail');
		$this->load->model('Adminmodel');
		$this->load->model('Adminsectionmodels');
		$this->load->model('Commonmodel');

		$ttEmail = $this->Adminmodel->getEmailsReceivedList();
		$this->totalEmails = $ttEmail['count'];

		$cu = current_url();
		$url = explode('/', $cu);
		$uri = ( isset($url[4]) ? $url[4] : '' );
		$this->session->set_userdata('pages_name', $uri);
	}

	function index(){
		die('You are not allowed to access this page directly!'); exit;
	}

	private function getCommonData($banner=''){
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();
		return $data;
	}

	function getAdminDetails() {
		if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
			return 'Administrator';
		} else {
			return '-1';
		}
	}

    function order_summary_details() {
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        if ($this->isadminlogin()) {
            $data['order_details'] = $this->Commonmodel->calc_order_section_values();
            $data['date_from'] = $this->input->post('date_from');
            $data['date_to']   = $this->input->post('date_to');
            $data['order_list_rows'] = $this->getOrderListingRows($_POST);
            $output = $this->load->view('admin/order_summary_details_view', $data, true);
        } else {
            $output = $this->load->view('admin/login', $data, true);
        }

        $this->output($output, $data);
    }

    function getOrderListingRows($post=[]) {
        $results = $this->Adminsectionmodels->getOrderResults($post);
        $order_rows = '';
        $i = 1;
        if( count($results) ) {
            foreach( $results as $rows ) {
                $order_total_price = view_order_details_content($rows['orders_id'], '', '', '', 'price'); //ordrs detail helper
                $order_rows .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$rows['orders_id'].'</td>
                        <td>'.$rows['shiping_method'].'</td>
                        <td>'.$rows['orderdate'].'</td>
                        <td>$ '._nf($order_total_price, 2).'</td>
                        <td>
                            <a href="'.SITE_URL.'admin/sendContact/'.$rows['customerid'].'/'.$rows['id'].'">IContact</a> | 
                            <a href="'.SITE_URL.'admin/getorderdetail_view/'.$rows['id'].'">Detail</a>                            
                        </td>
                    </tr>';
                
                $i++;
            }
        } else {
            $order_rows .= '<tr><td colspan="6"><b>No Order Rows Found</b></td></tr>';
        }

        return $order_rows;
    }

    private function output($layout = null, $data = array()) {
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        $data['loginlink'] = $this->User->loginhtml('admin');
        $output = $this->load->view('admin/header', $data, true);
        if ($this->session->isLoggedin() && ($this->session->userdata('usertype') == 'admin')) {
                $output .= $layout;
        } else {
                $output .= $this->load->view('admin/login', $data, true);
        }
        $output .= $this->load->view('admin/footer', $data, true);
        $this->output->set_output($output);
    }

    function isadminlogin() {
        if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
                return true;
        } else {
                return false;
        }
    }
}
