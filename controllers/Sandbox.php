<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

class sandbox extends CI_Controller {

    function __construct(){
        parent::__construct();
        //$this->load->model('cronmodel');
        $this->load->model('EbayManager');
    }

    function index(){
        echo 'SandBox.....';
        exit;
    }

    function products(){
       //$catid = (int) 118477;
        
        $res  = $this->EbayManager->_getSellerList($catid);
        echo '<pre>'; print_r($res->ItemArray); echo '</pre>';

    }

    function categories(){
        
        $res  = $this->EbayManager->_getStoreCategories();
        echo '<pre>'; print_r($res); echo '</pre>';
    }

    function listing(){
       $catid = (int) 18253467;
       $res =  $this->EbayManager->_getCategory2CS($catid);
          echo '<pre>'; print_r($res); echo '</pre>';
    }

    function add(){

        //$params['Action']   = 'Add';
        //$params['Action']     = 'Rename';
        $params['Action'] ='Delete';
        $params['SC_CC_CategoryID'] = '290534';
        $params['SC_CC_Name'] = 'ryan test';

        
        $res  = $this->EbayManager->_setStoreCategories($params);
        echo '<pre>'; print_r($res); echo '</pre>';
    }


    function find(){
     $catid = (int) 18253467;
       $res =  $this->EbayManager->_findProducts($catid);
          echo '<pre>'; print_r($res); echo '</pre>';
    }

}

?>