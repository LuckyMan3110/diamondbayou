<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_diamonds extends CI_Controller {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        //$this->load->helper('common');
        $this->table_name = 'dev_rapproduct';
        //$this->load->model('testmodel');
        //$this->load->model('csvjewelrys_model');
    }
    
        function index() {
            die('You are not allowed to see this page!');
        }
     
    function importStullerDiamondIntoDB() {
        
        $this->db->query("DELETE FROM " . $this->table_name . " WHERE diamond_type IN ('dstern_diamonds', 'signature_diamonds')"); /// delete old stuller diamonds
        
        $this->importDiamondIntoDB('dstern');   //// dstern diamonds
        $this->importDiamondIntoDB('signature_diamond');        //// signature diamonds
        
        $this->fixalldb(); //// fixing the cut, sym, shape, etc oclumn values for filters
        
        echo '<br><br>Dstern and Signature Diamonds are imported suceesfully!';
        
    }
    public function importDiamondIntoDB($typeoption='')
    {
        ini_set('max_execution_time', 20000);
        ini_set('max_input_time', 20000);
        ini_set('memory_limit', '1024M');

        $this->load->helper('stuller_diamond');
            
    $table_name = '" . $this->table_name . "';       
    ///// truncate table before inserting
    //$this->db->query("TRUNCATE TABLE $table_name");
        
    $time_start = microtime(true);
    //$import_file = $this->getRapnetCSVFile();
    if( $typeoption == 'dstern' ) {
	$import_file = 'import/dstern_diamonds_1.csv';
    } else {
	//$import_file = 'import/signature_gemstones.csv';
	$import_file = 'import/signature_diamonds_1.csv';
    }
		
    $file = fopen($import_file,"r");
	//echo '<pre>';
	$i=1;
	$cols_value = array();
			
	while(! feof($file)) {
                
		$data = fgetcsv($file); //print_ar($data);
                
                
                
        if( empty($data) || empty($data[0]) || count($data) == 0) { break; }
                                
		if($i > 1) {
                
                    if($data[0] != '') {
                        if( $typeoption == 'dstern' ) {
                            $cols_value[] =	$this->get_columns_values($data, 'dstern_diamonds'); //// dstern diamonds
                        } else {
                            $cols_value[] =	signatureDiamond($data, 'signature_diamonds'); //// signature diamonds
                        }
                        //$cols_value[] =	signatureGemstones($data, 'signature_gemstones'); //// signature gemstones
                    }
		}
                //if( $i == 50 ) { break; }
                
		$i++;
	}
        
	fclose($file);
	array_filter($cols_value);
        
    $insert_values = implode(', ', $cols_value);
    $insers_values = str_replace(", ,", ",", $insert_values);
    
    if( $typeoption == 'dstern' ) {
        $in = $this->dsternDiamondQuery( $insers_values ); //// dstern diamond
    } else {
        $in = $this->signatureDiamondQuery( $insers_values );  //// signature diamonds
    }
    //$in = $this->signatureGemstonesQuery( $insers_values );  //// signature gemstones
    
    //echo $in; exit;
                
	//$in = "";
	$this->db->query($in);
        
        //$this->fixalldb();
		
	echo 'Record inserted successfully!';
    
     // Display Script End time
    $time_end = microtime(true);

    //dividing with 60 will give the execution time in minutes other wise seconds
    $execution_time = ($time_end - $time_start)/60;

    //execution time of the script
    echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
    
    }
    
    function dsternDiamondQuery($inserts_values='') {
        $in = "INSERT INTO `" . $this->table_name . "` (`lot`, `shape`, `carat`, `color`, `clarity`, `cut`, `Cert`, `price`, `Depth`, `TablePercent`, `Girdle`, `Culet`, `Polish`, `Sym`, `Flour`, `crown`, `pavilion`, `Meas`, `Comment`, `Stones`, `Cert_n`, `certimage`, `Stock_n`, `pair_no`, `pair_separable`, `enhancement`, `Country`, `price_incsv`, `diamond_type`) VALUES ".rtrim($inserts_values, ',')." ON DUPLICATE KEY UPDATE `lot` = VALUES(`lot`)";
        
        return $in;
        
    }
    
    ///// signature diamond query
   function signatureDiamondQuery($inserts_values='') {
        $in = "INSERT INTO `" . $this->table_name . "` (`lot`, `Stock_n`, `shape`, `clarity`, `carat`, `color`, `Cert`, `Cert_n`, `Culet`, `Depth`, `TablePercent`, `Flour`, `Girdle`, `Make`, `Polish`, `Sym`, `mmsize`, `pricepercrt`, `percentOfRapnet`, `rapnetPrice`, `price`, `Date`, `Comment`, `minDiameter`, `maxDiameter`, `agta`, `ideal_cut`, `russian_cut`, `image_url`, `certimage`, `web_address`, `image_path2`, `image_path3`, `cut`, `Meas`, `Country`, `price_incsv`, `diamond_type`) VALUES ".rtrim($inserts_values, ',')." ON DUPLICATE KEY UPDATE `lot` = VALUES(`lot`)";
        
        return $in;
        
    }
    
    ///// signature diamond query
   function signatureGemstonesQuery($inserts_values='') {
        $in = "INSERT INTO `" . $this->table_name . "` (`lot`, `Stock_n`, `type_value`, `shape`, `cut`, `clarity`, `carat`, `color`, `Cert`, `Cert_n`, `Depth`, `Flour`, `Girdle`, `Make`, `Polish`, `Sym`, `mmsize`, `pricepercrt`, `price`, `Date`, `Comment`, `agta`, `color_code`, `image_url`, `certimage`, `web_address`, `color_desc`, `image_path2`, `image_path3`, `Meas`, `price_incsv`, `diamond_type`) VALUES ".rtrim($inserts_values, ',')." ON DUPLICATE KEY UPDATE `lot` = VALUES(`lot`)";
        
        return $in;
        
    }
    //// get diamond columns values
    function get_columns_values($cols=array(), $diamond_type='') {
        $lot      = '2'.trim($cols[21]);
        $shape      = trim($cols[0]);
        $size       = trim($cols[1]);
        $color      = trim($cols[2]);
        $clarity    = trim($cols[3]);
        $cut        = trim($cols[4]);
        $cert       = trim($cols[5]);
        $price      = trim($cols[6]);
        $depth      = trim($cols[7]);
        $table      = trim($cols[8]);
        $girdle     = trim($cols[9]);
        $culet      = trim($cols[10]);
        $polish     = trim($cols[11]);
        $symmetry   = trim($cols[12]);
        $flour      = trim($cols[13]);
        $crown      = trim($cols[14]);
        $pavillion  = trim($cols[15]);
        $measurements = trim($cols[16]);
        $coments    = trim($cols[17]);
        $stones     = trim($cols[18]);
        $cert_no    = trim($cols[19]);
        $diamond_image = trim($cols[20]);
        $stock_no   = trim($cols[21]);
        $pair       = trim($cols[22]);
        $pairseparable  = trim($cols[23]);
        $enhancement    = trim($cols[24]);
        $country_origion = trim($cols[25]);
        
        $insert_values = "('{$lot}', '{$shape}', '{$size}', '{$color}', '{$clarity}', '{$cut}', '{$cert}', '{$price}', '{$depth}', '{$table}', '{$girdle}', '{$culet}', '{$polish}', '{$symmetry}', '{$flour}', '{$crown}', '{$pavillion}', '{$measurements}', '{$coments}', '{$stones}', '{$cert_no}', '{$diamond_image}', '{$stock_no}', '{$pair}', '{$pairseparable}', '{$enhancement}', '{$country_origion}', '{$price}', '{$diamond_type}')";
        
        return $insert_values;
        
    }
    
    
    function fixalldb(){
	
	    // Fixing Shape 
	    echo "Fixing Shape table<br>";
	
	    $sql = "UPDATE " . $this->table_name . " SET shape='B' WHERE shape='ROUND'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET shape='PR' WHERE shape='PRINCES'";
	    //$this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
		
		$sql = "UPDATE " . $this->table_name . " SET shape='PR' WHERE shape='Princess'";
	   // $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
		
		$sql = "UPDATE " . $this->table_name . " SET shape='PR' WHERE shape='Princess'";
	  //  $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET shape='C' WHERE shape IN ('Cushion', 'Cushion Modified', 'COUSHION')";
	   // $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
		
		$sql = "UPDATE " . $this->table_name . " SET shape='E' WHERE shape='EMERALD'";
	    //$this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET shape='AS' WHERE shape='ASSCHER'";
	    //$this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET shape='M' WHERE shape='MARQUISE'";
	   // $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET shape='O' WHERE shape='OVAL'";
	  //  $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET shape='R' WHERE shape='RADIANT'";
	  //  $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET shape='P' WHERE shape='PEAR'";
	   // $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET shape='H' WHERE shape='HEART'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
	    
	    
	    // Fixing Polish
	    
	    echo "Fixing Polish table<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Polish='EX' WHERE Polish='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Polish='VG' WHERE Polish='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Polish='GD' WHERE Polish='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Polish='F' WHERE Polish='Fair'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Polish='ID' WHERE Polish='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
	    
	    // Fixing Symmentry 
	    
	    echo "Fixing Polish table<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Sym='EX' WHERE Sym='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Sym='VG' WHERE Sym='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Sym='GD' WHERE Sym='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Sym='F' WHERE Sym='Fair'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Sym='ID' WHERE Sym='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
	    
	    // Fixing Flour
	    
	    echo "Fixing Flour table<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Flour='EX' WHERE Flour='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Flour='VG' WHERE Flour='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Flour='GD' WHERE Flour='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Flour='F' WHERE Flour='Fair'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET Flour='ID' WHERE Flour='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
	    
	    
	    echo "Fixing Cut table<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET cut='EX' WHERE cut='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET cut='VG' WHERE cut='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET cut='GD' WHERE cut='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET cut='F' WHERE cut='Fair'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE " . $this->table_name . " SET cut='ID' WHERE cut='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
            
            $this->db->query("UPDATE " . $this->table_name . " set Flour = 'F' WHERE Flour = 'Faint'");
            $this->db->query("UPDATE " . $this->table_name . " set Flour = 'M' WHERE Flour = 'Medium'");
            $this->db->query("UPDATE " . $this->table_name . " set Flour = 'S' WHERE Flour = 'Strong'");
            $this->db->query("UPDATE " . $this->table_name . " set Flour = 'VS' WHERE Flour = 'Very Strong'");
            $this->db->query("UPDATE " . $this->table_name . " set Flour = 'S' WHERE Flour = 'Slight'");
            $this->db->query("UPDATE " . $this->table_name . " set Flour = 'VS' WHERE Flour = 'Very Slight'");
            $this->db->query("UPDATE " . $this->table_name . " set Flour = 'N' WHERE Flour = 'None'");
            $this->db->query("UPDATE " . $this->table_name . " set Flour = 'F' WHERE Flour = 'Faint'");
            $this->db->query("UPDATE " . $this->table_name . " set Polish = 'F' WHERE Polish = 'Fair'");
            $this->db->query("UPDATE " . $this->table_name . " set Polish = 'F' WHERE Polish = 'Fair-Good'");
            $this->db->query("UPDATE " . $this->table_name . " set Polish = 'G' WHERE Polish = 'GD'");
            $this->db->query("UPDATE " . $this->table_name . " set Polish = 'G' WHERE Polish = 'Good-Very Good'");
            $this->db->query("UPDATE " . $this->table_name . " set Sym = 'F' WHERE  Sym = 'Fair'");
            $this->db->query("UPDATE " . $this->table_name . " set Sym = 'F' WHERE Sym = 'Fair-Good'");
            $this->db->query("UPDATE " . $this->table_name . " set Sym = 'G' WHERE Sym = 'GD'");
            $this->db->query("UPDATE " . $this->table_name . " set Sym = 'G' WHERE Sym = 'Good-Very Good'");
            $this->db->query("UPDATE " . $this->table_name . " SET Sym='VG' WHERE Sym='Very Good'");
            $this->db->query("UPDATE " . $this->table_name . " SET Sym='EX' WHERE Sym='Excellent'");
            $this->db->query("UPDATE " . $this->table_name . " SET Sym='GD' WHERE Sym='Good'");
            $this->db->query("UPDATE " . $this->table_name . " SET Sym='F' WHERE Sym='Fine'");
            $this->db->query("UPDATE " . $this->table_name . " SET Sym='ID' WHERE Sym='Ideal'");
            $this->db->query("UPDATE " . $this->table_name . " set cut = 'G' WHERE  cut = 'GD'");
            $this->db->query("UPDATE " . $this->table_name . " set cut = 'N' WHERE  cut = 'None'");
            $this->db->query("UPDATE " . $this->table_name . " SET cut='EX' WHERE cut='Excellent'");
            $this->db->query("UPDATE " . $this->table_name . " SET cut='VG' WHERE cut='Very Good'");
            $this->db->query("UPDATE " . $this->table_name . " SET cut='GD' WHERE cut='Good'");
            $this->db->query("UPDATE " . $this->table_name . " SET cut='F' WHERE cut='Fair'");
            $this->db->query("UPDATE " . $this->table_name . " SET cut='ID' WHERE cut='Ideal'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='B' WHERE shape='ROUND'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='PR' WHERE shape='PRINCES'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='PR' WHERE shape='Princess'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='PR' WHERE shape='Princess'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='C' WHERE shape IN ('Cushion', 'Cushion Modified', 'COUSHION')");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='E' WHERE shape='EMERALD'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='AS' WHERE shape='ASSCHER'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='M' WHERE shape='MARQUISE'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='O' WHERE shape='OVAL'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='R' WHERE shape='RADIANT'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='P' WHERE shape='PEAR'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='H' WHERE shape='HEART'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='H' WHERE shape='HEART SHAPE'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='E' WHERE shape='EMERALD CUT'");
            $this->db->query("UPDATE " . $this->table_name . " SET shape='P' WHERE shape='PS'");
            
            $shape_label_ar = array(
                'C' => 'CU',
                'E' => 'EMERALD CUT',
                'H' => 'HEART SHAPE',
                'E' => 'EC',
                'H' => 'HS',
                'P' => 'PS',
                'M' => 'MQ',
                'O' => 'OV',
                'P' => 'PEAR SHAPE',
                'B' => 'RD',
                'R' => 'RA'
            );
            
            foreach( $shape_label_ar as $shape_value => $shap_val ) {
                $this->db->query("UPDATE " . $this->table_name . " SET shape = '{$shape_value}' WHERE shape = '{$shap_val}'");
            }
            
	  echo $this->db->affected_rows(). "<br>";
	    
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */