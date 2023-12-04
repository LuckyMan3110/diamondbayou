<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_csv extends CI_Controller {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->model('csvjewelrys_model');
    }
    
        function index() {
            die('You are not allowed this page!');
        }
        
	public function read_csv_file()
	{
            ini_set('max_execution_time', 20000);
            ini_set('max_input_time', 20000);
            ini_set('memory_limit', '1024M');
            
    $table_name = 'dev_rapproduct';       
    ///// truncate table before inserting
    //$this->db->query("TRUNCATE TABLE $table_name");
        
    $time_start = microtime(true);
    //$import_file = $this->getRapnetCSVFile();
	$import_file = 'import/collection_csv/wo dia em ringuse this.csv';
		
    $file = fopen($import_file,"r");
	//echo '<pre>';
	$i=1;
	$cols_value = array();
        $cols_label = array();
        $labels_data = array();
			
	while(! feof($file)) {
                
		$data = fgetcsv($file);
                
                if( $i == 1 ) {
                    for($in = 17; $in < count($data); $in++) {
                       if( !empty($data[$in]) ) {
                            $cols_label[] = array('index' => $in, 'label' => $data[$in]);
                        } 
                    }                    
                }
                //print_ar( $data );
                
//                echo '<pre>';
//                print_r( $cols_label );
//                echo '</pre>';
                
        if( empty($data) || empty($data[0]) || count($data) == 0) { break; }
                                
		if($i > 1) {
                    $j = 1;
                    foreach($cols_label as $index) {
                        if( !empty($data[$index['index']]) && count($index) > 0 ) {
                            $labels_data[] = array($index['label'], $data[$index['index']] ); 
                        
                            $j++;
                        }
                   
                   
                   
                   if( $j == 9 ) { break; }
                }
                
                $labels_data = array_filter($labels_data);
                
                //print_ar( $labels_data, 'ex' );
                
                $global_fields = ( count($labels_data) > 0 ? serialize($labels_data) : '' ); //echo $global_fields . '<br><br><br>';
                
			if($data[0] != '' && !empty($data[5]) && $data[5] != '$' ) {		
				$cols_value[] =	$this->csvjewelrys_model->save_jewelry_data($data, $global_fields);
                                $labels_data = array();
                //print_ar($data);
            } 
            else {
                //break;
            }
		}
                //if( $i == 50 ) { break; }
                
		$i++;
	}
        
	fclose($file);
	array_filter($cols_value);
        
    $insert_values = implode(', ', $cols_value);
    $insers_values = str_replace(", ,", ",", $insert_values);
    
    $in = "INSERT INTO `dev_jewelries` (`item_sku`, `vendor_name`, `vendor_sku`, `item_title`, `marketplace_on_ebay`, `cost`, `marketplace_on_amazon`, `price_amazon`, `price`, `price_ebay`, `price_website`, `wire_price`, `gender`, `category`, `subcategory`, `ring_style`, `invoice_number`, `global_fields`) VALUES ".rtrim($insers_values, ',')." ON DUPLICATE KEY UPDATE `item_sku` = VALUES(`item_sku`)";
    
    //echo $in; exit;
                
	//$in = "";
	$this->db->query($in);
		
	echo 'Record inserted successfully!';
    
     // Display Script End time
    $time_end = microtime(true);

    //dividing with 60 will give the execution time in minutes other wise seconds
    $execution_time = ($time_end - $time_start)/60;

    //execution time of the script
    echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
    
    }
    
    function get_jewelry_data($id=50) {
        $row =	$this->jewelrysmodel->csvjewelrys_model($id);
        $globalField = unserialize( $row['global_fields'] );
        
        print_ar($globalField);
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

///// import csv url link: http://davidsternfinejewelry.com/import_csv/read_csv_file