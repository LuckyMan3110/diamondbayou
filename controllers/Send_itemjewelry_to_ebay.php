<?php 
class Send_itemjewelry_to_ebay extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model( 'sendjewelryitemmodel' );
		$this->load->model( 'sendjcartitemmodel' );
		$this->load->model( 'sendjcartwitemmodel' );
		$this->load->helper('url');
	}

    function index() {
        die('You are not allowed to access this page directly!');
    }

    function send_item_jewelry_toebay(){
        $item_id = $this->input->post('jewelry_item_id');
        $ret = $this->sendjewelryitemmodel->sendJewItemToEbay($item_id);
        $this->session->set_userdata('return_message', $ret);

        header('Location:'.SITE_URL.'admin_listings/item_collection_detail/'.$item_id);
    }

    function send_item_jewelry_JCart_toebay(){
        $item_id = $this->input->post('jewelry_item_id');
        $ret = $this->sendjcartitemmodel->sendJewItemToEbay($item_id);
        $this->session->set_userdata('return_message', $ret);

        header('Location:'.SITE_URL.'jcart_fashion_jewelry/stuller_items_detail/'.$item_id);
    }

    function send_item_jewelry_JCartw_toebay(){
        $item_id = $this->input->post('jewelry_item_id');
        $ret = $this->sendjcartwitemmodel->sendJewItemToEbay($item_id);
        $this->session->set_userdata('return_message', $ret);

        header('Location:'.SITE_URL.'jcartw_fashion_jewelry/stuller_items_detail/'.$item_id);
    }

	function send_bulk_item_jewelry_toebay(){
		$posted = array();
		if ($this->isadminlogin()) {
			$posted["ids"]        = $this->input->post("ids",TRUE);
			$posted["cash_limit"] = $this->input->post("cash_limit",TRUE);
			$ids = explode(",", $posted["ids"]);
			$ret_response = '';
			$r = 1;
            foreach ( $ids as $item_id ) {
				if( $r%10 == 0 ) { sleep(30); }
                $ret_response .= $this->sendjewelryitemmodel->sendJewItemToEbay($item_id, 'bulk');
                $r++;
            }
            print $ret_response;
        }
    }

}