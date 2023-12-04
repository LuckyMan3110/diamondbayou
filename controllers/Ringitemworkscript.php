<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ringitemworkscript extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->model('user');
		$this->load->model('sitepaging');
		$this->load->model('commonmodel');
		$this->load->model('davidsternmodel');
		$this->load->helper('admin_libs');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('item_jewelry_section');
		$this->load->model('itemjewelrymodel');
	}

	function index() {
		die('You are not allowed to access this page directly!');
	}

	function update_jewelryitem_prodname() { 
		$results = $this->itemjewelrymodel->getItemEbayDetailResult();
        foreach( $results as $row ) {
			$rowitem = $this->itemjewelrymodel->getItemDetailViaID($row['pid']);
			$str1 = explode('ct', $rowitem['product_name']);
			$prod_name = str_replace($str1[0], $row['diamond_weight'], $rowitem['product_name']);
			$this->itemjewelrymodel->updateItemProductName($row['pid'], $prod_name);
		}
        echo 'Product name has updated successfully!';
	}

}