<?php
class Heart_collection_import extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        $this->load->model('heart_collection_importmodel');
        $phone_from_admin = get_site_contact_info('contact_info'); 
        define('CONTACT_NO', $phone_from_admin);
    }
    
        function index() {
            die('You are not allowed to access this page!');
        }
        
    //// link: heartsanddiamonds.com/heart_collection_import/import_jewelry_collection
        
	public function import_jewelry_collection()
	{
            ini_set('max_execution_time', 20000);
            ini_set('max_input_time', 20000);
            ini_set('memory_limit', '1024M');
            
    //$table_name = 'dev_rapproduct';       
    ///// truncate table before inserting
    //$this->db->query("TRUNCATE TABLE $table_name");
            
    $time_start = microtime(true);
    //$import_file = $this->getRapnetCSVFile();
    $import_file = 'http://173.230.130.50:8888/bom_export.csv';
    //$import_file = 'import/dstern_diamonds.csv';
		
    $file = fopen($import_file,"r");
	//echo '<pre>';
	$i=1;
	$cols_value = array();
        $cols_label = array();
        $labels_data = array();
			
	while(! feof($file)) {
                
		$data = array_filter(fgetcsv($file));
                
                if( $i == 1 ) {
                    for($in = 27; $in < count($data); $in++) {
                       if( !empty($data[$in]) ) {
                            $cols_label[] = array('index' => $in, 'label' => $data[$in]);
                        } 
                    }                    
                }
               //print_ar( $cols_label );
               //print_ar( $data );
                
//                echo '<pre>';
//                print_r( $cols_label );
//                echo '</pre>';
                $not_in_array = array('G14-WHOLESALE-PRICE', 'G18-WHOLESALE-PRICE', 'PLAT-WHOLESALE-PRICE', 'M-G14-GR', 'M-G14-PRICE', 'M-G18-GR', 'M-G18-PRICE', 'M-PLAT-GR', 'M-PLAT-PRICE', 'DESCRIPTION', 'DESCRIPTION 2');
                
        if( empty($data) || empty($data[0]) || count($data) == 0) { break; }
                                
		if($i > 1) {
                    $j = 1;
                    foreach($cols_label as $index) {
                        if( !empty($data[$index['index']]) ) {
                            if( !in_array($index['label'], $not_in_array) ) {
                                $labels_data[] = array($index['label'], str_replace("'", "", $data[$index['index']]) ); 
                            }
                            $j++;
                        }
                   
                   if( $j == 153 ) { break; }
                }
                
                //print_ar($imgcols_data);
                
                //print_ar( $labels_data, 'ex' );
                
                $global_fields = $this->set_serialize( $labels_data ); //echo $global_fields . '<br><br><br>';
                
			if($data[0] != '') {		
				$cols_value[] =	$this->heart_collection_importmodel->save_collection_data($data, $global_fields);
                                $labels_data = array();
                //print_ar($data);
            } 
            else {
                //break;
            }
            
            //print_ar($cols_value);   
            }
                //if( $i == 50 ) { break; }
                
		$i++;
	}
        
	fclose($file);
	array_filter($cols_value); //print_ar($cols_value);
        
        $insert_values = implode(', ', $cols_value);
        $insers_values = str_replace(", ,", ",", $insert_values);
        
       $in = "INSERT INTO dev_jewelries (`item_sku`, `style`, `metal`, `metal_color`, `carat`, `description`, `description2`, `gender`, `category`, `subcategory`, `quality`, `ring_model`, `made_in`, `jew_design`, `band_width`, `weight`, `head_dimensions`, `center_stone_sizes`, `shape`, `available_size`, `sizeable`, `comment`, `g14_wh_price`, `g18_wh_price`, `plat_wh_price`, `mg14_gr`, `mg14_price`, `mg18_gr`, `mg18_price`, `mplat_gr`, `mplat_price`, `add_date`, `global_fields`) VALUES ".rtrim($insers_values, ',')." ON DUPLICATE KEY UPDATE `item_sku` = VALUES(`item_sku`), `style` = VALUES(`style`), `metal` = VALUES(`metal`), `metal_color` = VALUES(`metal_color`), `carat` = VALUES(`carat`), `description` = VALUES(`description`), `description2` = VALUES(`description2`), `quality` = VALUES(`quality`), `ring_model` = VALUES(`ring_model`), `made_in` = VALUES(`made_in`), `jew_design` = VALUES(`jew_design`), `band_width` = VALUES(`band_width`), `weight` = VALUES(`weight`), `head_dimensions` = VALUES(`head_dimensions`), `center_stone_sizes` = VALUES(`center_stone_sizes`), `shape` = VALUES(`shape`), `available_size` = VALUES(`available_size`), `sizeable` = VALUES(`sizeable`), `comment` = VALUES(`comment`), `mg14_gr` = VALUES(`mg14_gr`), `mg14_price` = VALUES(`mg14_price`), `mg18_gr` = VALUES(`mg18_gr`), `mg18_price` = VALUES(`mg18_price`), `mplat_gr` = VALUES(`mplat_gr`), `mplat_price` = VALUES(`mplat_price`), `g14_wh_price` = VALUES(`g14_wh_price`), `g18_wh_price` = VALUES(`g18_wh_price`), `plat_wh_price` = VALUES(`plat_wh_price`), `global_fields` = VALUES(`global_fields`)";
    
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
    
    /// set serialize fields data
    function set_serialize($serList=array()) {
        $serLists = array_filter($serList);
        $global_fields = ( count($serLists) > 0 ? serialize($serLists) : '' );
        return $global_fields;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */