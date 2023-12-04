<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagecheck extends CI_Controller {
    
    function __construct(){
	parent::__construct();

    }
        
	function setListingRecords()
	{
            
        error_reporting(1);

        set_time_limit(0);
        ini_set('max_execution_time', 2000000);
        ini_set("memory_limit", "512M");
        
            $qry = "SELECT * FROM dev_overnight";
            $query = 	$this->db->query($qry);
            $results = $query->result_array();
            $imgurl = 'http://www.davidfinejewelry6.jewelercart.com/overmts/images/';
            $idlist = array();
            $r = 1;
            
            foreach( $results as $rows ) {
                $imageLink = $imgurl . str_replace('/', '', $rows['item_id']) . '.jpg';
                if( getimagesize( $imageLink ) ) {
                    $idlist[] = "('{$rows['id']}')";
                    
                    $r++;
                    if( $r == 1500 ) { break; }
                }
            }		
            $insert_id = implode(", ", $idlist);
            
            echo 'Total Records: '.$r;
            print_ar($idlist);
            
            $sql = "INSERT INTO `dev_overnight_listing` (`item_pk_id`) VALUES $insert_id ON DUPLICATE KEY UPDATE `item_pk_id` = VALUES(`item_pk_id`)";
            $this->db->query($sql);
            
            echo $r . ' Records inserted successfully!';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */