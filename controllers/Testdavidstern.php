<?php
class Testdavidstern extends CI_Controller {
    private $finish;
    function __construct(){
            parent::__construct();
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->model('qualitymodel');
            $this->load->model('davidsternmodel');
            $this->load->helper('ringsection');
            $this->finish = '';
            
            error_reporting(E_ALL);
    }	
    function index()
    {
        echo 'welcome!';	
    }
    
    /// get product categories
    function stern_listing_view($category_id='') {
        ini_set('max_execution_time', 200000000);
        ini_set("memory_limit", "512M");
                        
       $ringresults = $this->davidsternmodel->getRingListing($category_id, 0, 20000); //print_ar($ringresults);
        
        $viewlisting = '';
        $item_id = array();
        
        foreach( $ringresults['results'] as $rowrings ) {
            $ringsImg = STERN_IMGS . $rowrings['item_id'].'.jpg';
            //if( getimagesize( $ringsImg ) !== FALSE ) {
            if( file_exists( 'overmts/images/'.$rowrings['item_id'].'.jpg' ) ) {
                $item_id[] = $rowrings['id'];
                $viewlisting .= '<div><img src="'.$ringsImg.'" width="100" /><br>'.$rowrings['item_id'].'</div>';
            }
                
        }
        $i = 1;
        $total_item = count($item_id);
        $remaining = $total_item % 500;
        $startFrom = $total_item - $remaining;
        
        $item_list = array();
        $items_list = array();
        
        //print_ar($item_id);
        
        foreach($item_id as $itemid) {
            $item_list[] = "('".$itemid."')";
            
            if( $i % 500 == 0 ) {
                $insert_id = implode(",", $item_list);
                $this->db->query("INSERT INTO dev_overnight_temp (product_id) VALUES $insert_id ON DUPLICATE KEY UPDATE `product_id` = VALUES(`product_id`)");
                $item_list = array();
            }
            
            if( $i > $startFrom ) {
                 $items_list[] = "('".$itemid."')";
            }
            
            $i++;
        }
        
        
        if( count($items_list) > 0 ) {
            $inserts_id = implode(",", $items_list);
            $qry = "INSERT INTO dev_overnight_temp (product_id) VALUES $inserts_id ON DUPLICATE KEY UPDATE `product_id` = VALUES(`product_id`)";
            $this->db->query( $qry );
        }
        echo 'Total Items inserted successfully! '.count($item_id) . '<br>';
        
        //echo $viewlisting;
        
        
    }
}