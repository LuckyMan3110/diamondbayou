<?php
class Adminjewelry extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('commonmodel');
        $this->load->model('jewelrymodel');
        $this->load->model('adminjewelrymodel');
        $this->load->model('adminmodel');
        $this->load->model('qualitymodel');
    }
    
    function index() {
        die('Page Not Found');
    }
    
    //// manipulate the jewelry sub categories
    function managedSubCategory() {
        
        $data = $this->getCommonData();
        $data['options_list'] = $this->mainCategoryList();
        $btn_submit   = $this->input->post('btn_submit', TRUE);
        $data['submit_form'] = '';
        
        if( isset($btn_submit) && !empty($btn_submit) ) {
          $results = $this->adminjewelrymodel->saveJewCategory();     ///// save category data into db 
          if( $results == 'true' ) {
            $data['submit_form'] = 'Category has saved successfully!';
          }
        }
        
        $this->load->view('admin/jewelry_sub_cateview', $data);
    }
   
    /////////////// get order detail list
    function order_invoice_detail($id)
    {

        $this->load->helper('date');
        //$data = $results;
        $data = array();
        $myorder = $this->adminmodel->getorderonly($id);
        $data['paymentmethord'] = $myorder->paymentmethod;
        $data['ordersatus'] = $myorder->isconfirmed;

        $data['orderdetail'] = $this->adminmodel->getorderdetail_or_or($id);
        $data['customer'] = $this->adminmodel->getCustomerByID_or($myorder->customerid);
        $data['shippment'] = $this->adminmodel->getShippingInfo_ro($id,$myorder->customerid);
        //var_dump($data['shippment']);
        $data['orderid'] = $id;
        $data['full_name'] = $data['customer']->fname.' '.$data['customer']->lname;
        $data['billing_fullname'] = $data['customer']->billing_fname.' '.$data['customer']->billing_lname;
        $data['payment_mthod'] = $this->session->userdata('payment_method');
        $data['procesing_fees'] = ( $data['payment_mthod'] == 'payment_bankwire' ? 35 : 0 );
        $data['authcode'] = $this->adminmodel->getorderinfo($id);

        ////// get order detail
        $data['row_ordt'] = $this->commonmodel->getOrderDetail($id);
        //$rowitemdt = $this->commonmodel->getOrderItemDetail($id);

        $order_stats  = $data['row_ordt']['order_status'];
        $pymentMethod = $data['row_ordt']['paymentmethod'];
        $pymentStatus = $data['row_ordt']['payment_status'];

        $data['pmtmethod'] 	= $pymentMethod; //$this->getOptionsList(getPaymntMode(), $pymentMethod);
        $data['order_status']   = $order_stats; //$this->getOptionsList(getOrdrStatus(), $order_stats);;
        $data['payment_status'] = $pymentStatus; //$this->getOptionsList(getPaymntStatus(), $pymentStatus);
        $data['shipeDate']  = $data['row_ordt']['deliverydate'];
        $data['paid_by']    = $data['row_ordt']['paidby'];
        $data['check_numb'] = $data['row_ordt']['check_number'];

        $this->load->helper('ordrs_detail');

        $data['itemDetails'] = view_order_details_content($data['row_ordt']['orders_id']); //$itemDetails;
        
        //var_dump($data['orderdetail']);
        $this->load->view('admin/order_invoice_details', $data);
        
    }
        
    function mainCategoryList($parentid=0, $sub='') {
        $cate_parent_id = urlencode($parentid);
        $results = $this->adminjewelrymodel->getJewCategory( $cate_parent_id );
        
        $optionslist = '';
        if( count($results) > 0 ) {
            $optionslist .= '<option value=""> ---------- </option>';
            foreach( $results as $rows ) {
                $optionslist .= '<option value="'.$rows['category_id'].'">'.$rows['category_name'].'</option>';
            }
        }
        if( empty($sub) ) {
            return $optionslist;
        } else {
            echo $optionslist;
        }        
    }
    
    //// get quality category options list
    function getQualityCateList($pid=0) {
        $results = $this->qualitymodel->qualityGoldCateList( $pid );
        $quality_cate = '';
        
        if( count($results) > 0 ) {
            $quality_cate .= '<option value="">----------</option>';
            foreach( $results as $rows ) {
                $quality_cate .= '<option value="'.$rows['id'].'">'.$rows['title'].'</option>';
            }
        } else {
            $quality_cate .= '<option value="">NO Category Found</option>';
        }
        
        return $quality_cate;
    }
    
    //// check import excel file
    function getExeclFileRows() {
        
            //$excelFile = $excel_file_path.$_FILES['import_xlfile']['name'];
            //move_uploaded_file($_FILES['import_xlfile']['tmp_name'], $excelFile);
            //echo $_FILES['import_xlfile']['tmp_name']; 
            echo 'import excel file';
            
            error_reporting(E_ALL ^ E_NOTICE);
            
            require_once 'excel_libs/reader.php';
            // ExcelFile($filename, $encoding);
            $data = new Spreadsheet_Excel_Reader();
            // Set output Encoding.
            //$data->setOutputEncoding('CP1251');            
            
            $data->read( 'excel_libs/test_excel_file.xls' );
            
            print_ar($data->sheets[0]['cells']);
            
            error_reporting(E_ALL ^ E_NOTICE);

            for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                    for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                            echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                    }
                    echo "\n";

            }
            
            echo 'Excel File read here!';
            exit;
            
            //unlink( $excelFile );
    }
    private function getCommonData() {
        $data = array();
        $data = $this->commonmodel->getPageCommonData();
        return $data;
    }
}