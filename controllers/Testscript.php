<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testscript extends CI_Controller {
    
    function __construct(){
	parent::__construct();
        
        $this->load->helper('ordrs_detail');
        $this->load->model('diamondmodel');

    }
    
    function index() {
        die('You are not allowed to access this page directly!');
    }
    
    function unique_rows_list() {
        $result = $this->diamondmodel->get_uniqueitem_results();
        
        foreach( $result as $rows ) {
            if( !empty($rows['additional_stones']) ) {
                $diamonds = $this->diamondmodel->get_idex_diamond_id( $rows['id'] );
//                if( !empty($diamonds) ) {
//                    echo $rows['id'] . '=' . $diamonds . '<br>';
//                }
            }
        }
        echo 'Rows are updated successfully!'; exit;
    }
        
	function get_order_detail($oid=0)
	{
            $order_details = view_order_details_content($oid); //// ordrs detail helper
            
            //echo $oid; exit; 
            echo $order_details;
        
	}
        
        function update_collection_category() {
            $sql = "SELECT parent_id, category_id, category_name FROM dev_ebaycategories eb WHERE parent_id IN ( SELECT category FROM dev_jewelries WHERE subcategory = eb.category_name AND category = eb.parent_id AND parent_id != '')";
            $prod    = $this->db->query($sql);
            $results = $prod->result_array(); //print_ar($results);
            
            foreach( $results as $rows ) {
                if( !empty($rows['category_id']) ) {
                    $update = "UPDATE dev_jewelries set subcategory = '{$rows['category_id']}' WHERE category = '{$rows['parent_id']}' AND subcategory = '{$rows['category_name']}'";
                    //echo $update; exit;
                    $this->db->query($update);
                }
            }
            
            echo 'Sub Category is updated successfully!';
        }
        
        function updateFingerSize() {
            $results = $this->catemodel->getFingerSizeResult();
            
            foreach( $results as $rows ) {
                $ring_size_value = $this->getFingerSizeValue( $rows['ring_size'] );
                $this->db->query("UPDATE dev_fingersize_temp SET ring_size_value = '{$ring_size_value}' WHERE id = '{$rows['id']}'");
            }
            
            echo 'Ring size value is updated successfully!';
        }
        
    function getFingerSizeValue($finger_szie=0) {
        $ring_size = explode(' ', $finger_szie);
        $second_value = explode('/', $ring_size[1]);
        
        if( $finger_szie == 'STK' ) {
            $size_value = 0;
        } else {
            if( $second_value[1] > 0 ) {
            $size_value = $ring_size[0] + ( ( $second_value[0] / $second_value[1] ) );
          } else {
            $size_value = $ring_size[0];
          }
        }
        return $size_value;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */