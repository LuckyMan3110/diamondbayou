<?php

class Csvjewelrys_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save_jewelry_data($data1 = array(), $globalField='') {
        $data2 = str_replace("'", "", $data1);
        $data3 = str_replace(" ", "", $data2);
        $data4 = str_replace("$", "", $data3);
        $data = str_replace("/", "_slash_", $data4);
        
        $item_sku       = $data[0]; 
        $vendor_name    = $data[1]; 
        $vendor_sku     = $data[2]; 
        $item_title     = $data[3]; 
        $ebay           = str_replace(",", "", $data[4]); 
        $cost           = str_replace(",", "", $data[5]); 
        $amazon         = str_replace(",", "", $data[6]); 
        $price_amazon   = str_replace(",", "", $data[7]); 
        $retail_price   = str_replace(",", "", $data[8]); 
        $price_ebay     = str_replace(",", "", $data[9]); 
        $price_website  = str_replace(",", "", $data[10]); 
        $wire           = str_replace(",", "", $data[11]); 
        $gendor         = $data[12]; 
        $parent_category = $data[13]; 
        $sub_category    = $data[14];
        $ring_style      = $data[16];
        $invoice_number      = $data[17];
        
        /*$insert = "INSERT INTO dev_jewelries (`item_sku`, `vendor_name`, `vendor_sku`, `item_title`, `marketplace_on_ebay`, `cost`, `marketplace_on_amazon`, `price_amazon`, `price`, `price_ebay`, `price_website`, `wire_price`, `gender`, `category`, `subcategory`, `ring_style`) VALUES ('{$item_sku}', '{$vendor_name}', '{$vendor_sku}', '{$item_title}', '{$ebay}', '{$cost}', '{$amazon}', '{$price_amazon}', '{$retail_price}', '{$price_ebay}', '{$price_website}', '{$wire}', '{$gendor}', '{$parent_category}', '{$sub_category}', '{$ring_style}')"; */
        
        $insert = "('{$item_sku}', '{$vendor_name}', '{$vendor_sku}', '{$item_title}', '{$ebay}', '{$cost}', '{$amazon}', '{$price_amazon}', '{$retail_price}', '{$price_ebay}', '{$price_website}', '{$wire}', '{$gendor}', '{$parent_category}', '{$sub_category}', '{$ring_style}', '{$invoice_number}' ,'{$globalField}')";
        
        return $insert;
        
    }
    
    function get_jewelry_row($id=0) {
        $query= $this->db->query( "SELECT * FROM dev_jewelries WHERE stock_number = '{$id}' ORDER BY stock_number DESC LIMIT 1" );
        $results = $query->result_array();
        
        return $results[0];
    }

}