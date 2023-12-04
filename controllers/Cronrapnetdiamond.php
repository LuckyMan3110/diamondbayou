<?php
class Cronrapnetdiamond extends CI_Controller {
    
	function __construct() {
            parent::__construct();
            $this->load->model('adminmodel');
            $this->load->model('cronrapnetmodel');	
	}

	function index() {
		echo "test!!!"; die();
	}
	
///// svae rappnet into db
public function saveRapnetIntoDatabase() {			
    ini_set('max_execution_time', 20000);
    ini_set('max_input_time', 20000);
    ini_set('memory_limit', '1024M');
            
    $table_name = 'dev_rapproduct';       
    ///// truncate table before inserting
    //$this->db->query("TRUNCATE TABLE $table_name");
        
    $time_start = microtime(true);
    //$import_file = $this->getRapnetCSVFile();
	$import_file = 'rapnet_csv/24542_sells.csv';
	//$import_file = 'rapnet_csv/uniteddiamonds.csv';
		
    $file = fopen($import_file,"r");
	//echo '<pre>';
	$i=1;
	$cols_value = array();
			
	while(! feof($file)) {
		//print_r(fgetcsv($file));
		$data = fgetcsv($file);
        if( empty($data) || empty($data[0]) || count($data) == 0) { break; }
                                
		if($i > 1) {
			if($data[0] != '') {		
				$cols_value[] =	$this->cronrapnetmodel->SaveRapnetRingsDiamondIntoDB($data, $i);
                //print_ar($data);
            } 
            else {
                //break;
            }
		}	
	//  if( $i % 10000 == 0 ) { 
	//      sleep(10);                                     
	//  }
	//if($i == 55000) {
	    // break;
	//}
		$i++;
	}
	
	//echo '</pre>';
	echo $i;
	fclose($file);
	array_filter($cols_value);


	$insert_values = implode(', ', $cols_value);
    $insers_values = str_replace(", ,", ",", $insert_values);
                
	$in = "INSERT INTO $table_name (`lot`, `owner`, `name_code`, `shape`, `carat`, `color`, `fancy_color`, `fancy_color_ot`, `clarity`, `price`, `price_incsv`, `Rap`, `Cert`, `Depth`, `TablePercent`, `Girdle`, `Culet`, `Polish`, `Sym`, `Flour`, `Meas`, `Comment`, `Stones`, `Cert_n`, `Stock_n`, `Make`, `Date`, `City`, `State`, `Country`, `ratio`, `cut`, `tbl`, `pricepercrt`, `certimage`, `length`, `width`, `height`, `lab`, `fancy_color_intens`, `crown`, `crown_angle`, `pavilion`, `pavilion_angle`, `floursence_color`, `culet_size`, `culet_condition`, `member_comments`, `is_matched`, `ismatched_separable`, `image_url`, `pavilion_depth`, `suplier_country`, `depth_percent`, `girdle_condition`) VALUES ".rtrim($insers_values, ',')." ON DUPLICATE KEY UPDATE `owner` = VALUES(`owner`), `shape` = VALUES(`shape`), `carat` = VALUES(`carat`), `color` = VALUES(`color`), `fancy_color` = VALUES(`fancy_color`), `fancy_color_ot` = VALUES(`fancy_color_ot`), `clarity` = VALUES(`clarity`), `price` = VALUES(`price`), `Rap` = VALUES(`Rap`), `Cert` = VALUES(`Cert`), `Depth` = VALUES(`Depth`), `TablePercent` = VALUES(`TablePercent`), `Girdle` = VALUES(`Girdle`), `Culet` = VALUES(`Culet`), `Polish` = VALUES(`Polish`), `Sym` = VALUES(`Sym`), `Flour` = VALUES(`Flour`), `Meas` = VALUES(`Meas`), `Comment` = VALUES(`Comment`),  `Stones` = VALUES(`Stones`), `Cert_n` = VALUES(`Cert_n`), `Stock_n` = VALUES(`Stock_n`), `Make` = VALUES(`Make`), `Date` = VALUES(`Date`), `City` = VALUES(`City`), `State` = VALUES(`State`),  `Country` = VALUES(`Country`), `ratio` = VALUES(`ratio`), `cut` = VALUES(`cut`), `tbl` = VALUES(`tbl`), `pricepercrt` = VALUES(`pricepercrt`), `certimage` = VALUES(`certimage`), `length` = VALUES(`length`), `width` = VALUES(`width`), `height` = VALUES(`height`), `lab` = VALUES(`lab`), `fancy_color_intens` = VALUES(`fancy_color_intens`), `crown` = VALUES(`crown`), `crown_angle` = VALUES(`crown_angle`), `pavilion` = VALUES(`pavilion`), `pavilion_angle` = VALUES(`pavilion_angle`)";
	$this->db->query($in);
		
	echo 'Record inserted successfully!';
	$this->fixalldb();
 	$this->fixColorColum();
 	$this->setOtherColumnsValue();
    
     // Display Script End time
    $time_end = microtime(true);

    //dividing with 60 will give the execution time in minutes other wise seconds
    $execution_time = ($time_end - $time_start)/60;

    //execution time of the script
    echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
}
        
//// set cut, sym, polish, etc column values
function setOtherColumnsValue() {
    $this->db->query("UPDATE dev_rapproduct set Flour = 'F' WHERE Flour = 'Faint'");
    $this->db->query("UPDATE dev_rapproduct set Flour = 'M' WHERE Flour = 'Medium'");
    $this->db->query("UPDATE dev_rapproduct set Flour = 'S' WHERE Flour = 'Strong'");
    $this->db->query("UPDATE dev_rapproduct set Flour = 'VS' WHERE Flour = 'Very Strong'");
    $this->db->query("UPDATE dev_rapproduct set Flour = 'S' WHERE Flour = 'Slight'");
    $this->db->query("UPDATE dev_rapproduct set Flour = 'VS' WHERE Flour = 'Very Slight'");
    $this->db->query("UPDATE dev_rapproduct set Flour = 'N' WHERE Flour = 'None'");
    $this->db->query("UPDATE dev_rapproduct set Flour = 'F' WHERE Flour = 'Faint'");
    $this->db->query("UPDATE dev_rapproduct set Polish = 'F' WHERE Polish = 'Fair'");
    $this->db->query("UPDATE dev_rapproduct set Polish = 'F' WHERE Polish = 'Fair-Good'");
    $this->db->query("UPDATE dev_rapproduct set Polish = 'G' WHERE Polish = 'GD'");
    $this->db->query("UPDATE dev_rapproduct set Polish = 'G' WHERE Polish = 'Good-Very Good'");
    $this->db->query("UPDATE dev_rapproduct set Sym = 'F' WHERE  Sym = 'Fair'");
    $this->db->query("UPDATE dev_rapproduct set Sym = 'F' WHERE Sym = 'Fair-Good'");
    $this->db->query("UPDATE dev_rapproduct set Sym = 'G' WHERE Sym = 'GD'");
    $this->db->query("UPDATE dev_rapproduct set Sym = 'G' WHERE Sym = 'Good-Very Good'");
    $this->db->query("UPDATE dev_rapproduct set cut = 'G' WHERE  cut = 'GD'");
    $this->db->query("UPDATE dev_rapproduct set cut = 'N' WHERE  cut = 'None'");
    //$this->db->query("UPDATE `dev_rapproduct` set price = price * carat");
    //$this->db->query("UPDATE `dev_rapproduct` set price = price * 1.05");   /// make the 1.05 dynamic   
}

function fixalldb(){
	
	    // Fixing Shape 
	    
	    echo "Fixing Shape table<br>";
	
	    $sql = "UPDATE dev_rapproduct SET shape='B' WHERE shape='ROUND'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET shape='PR' WHERE shape='PRINCES'";
	    //$this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
		
		$sql = "UPDATE dev_rapproduct SET shape='PR' WHERE shape='Princess'";
	   // $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
		
		$sql = "UPDATE dev_rapproduct SET shape='PR' WHERE shape='Princess'";
	  //  $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET shape='C' WHERE shape IN ('Cushion', 'Cushion Modified', 'COUSHION')";
	   // $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
		
		$sql = "UPDATE dev_rapproduct SET shape='E' WHERE shape='EMERALD'";
	    //$this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET shape='AS' WHERE shape='ASSCHER'";
	    //$this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET shape='M' WHERE shape='MARQUISE'";
	   // $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET shape='O' WHERE shape='OVAL'";
	  //  $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET shape='R' WHERE shape='RADIANT'";
	  //  $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET shape='P' WHERE shape='PEAR'";
	   // $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET shape='H' WHERE shape='HEART'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
	    
	    
	    // Fixing Polish
	    
	    echo "Fixing Polish table<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Polish='EX' WHERE Polish='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Polish='VG' WHERE Polish='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Polish='GD' WHERE Polish='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Polish='F' WHERE Polish='Fair'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Polish='ID' WHERE Polish='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
	    
	    // Fixing Symmentry 
	    
	    echo "Fixing Polish table<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Sym='EX' WHERE Sym='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Sym='VG' WHERE Sym='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Sym='GD' WHERE Sym='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Sym='F' WHERE Sym='Fair'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Sym='ID' WHERE Sym='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
	    
	    // Fixing Flour
	    
	    echo "Fixing Flour table<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Flour='EX' WHERE Flour='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Flour='VG' WHERE Flour='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Flour='GD' WHERE Flour='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Flour='F' WHERE Flour='Fair'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET Flour='ID' WHERE Flour='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
	    
	    
	    echo "Fixing Cut table<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET cut='EX' WHERE cut='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET cut='VG' WHERE cut='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET cut='GD' WHERE cut='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET cut='F' WHERE cut='Fair'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    $sql = "UPDATE dev_rapproduct SET cut='ID' WHERE cut='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";
	    
	    echo "Done";
            
            $this->db->query("UPDATE dev_rapproduct set Flour = 'F' WHERE Flour = 'Faint'");
            $this->db->query("UPDATE dev_rapproduct set Flour = 'M' WHERE Flour = 'Medium'");
            $this->db->query("UPDATE dev_rapproduct set Flour = 'S' WHERE Flour = 'Strong'");
            $this->db->query("UPDATE dev_rapproduct set Flour = 'VS' WHERE Flour = 'Very Strong'");
            $this->db->query("UPDATE dev_rapproduct set Flour = 'S' WHERE Flour = 'Slight'");
            $this->db->query("UPDATE dev_rapproduct set Flour = 'VS' WHERE Flour = 'Very Slight'");
            $this->db->query("UPDATE dev_rapproduct set Flour = 'N' WHERE Flour = 'None'");
            $this->db->query("UPDATE dev_rapproduct set Flour = 'F' WHERE Flour = 'Faint'");
            $this->db->query("UPDATE dev_rapproduct set Polish = 'F' WHERE Polish = 'Fair'");
            $this->db->query("UPDATE dev_rapproduct set Polish = 'F' WHERE Polish = 'Fair-Good'");
            $this->db->query("UPDATE dev_rapproduct set Polish = 'G' WHERE Polish = 'GD'");
            $this->db->query("UPDATE dev_rapproduct set Polish = 'G' WHERE Polish = 'Good-Very Good'");
            $this->db->query("UPDATE dev_rapproduct set Sym = 'F' WHERE  Sym = 'Fair'");
            $this->db->query("UPDATE dev_rapproduct set Sym = 'F' WHERE Sym = 'Fair-Good'");
            $this->db->query("UPDATE dev_rapproduct set Sym = 'G' WHERE Sym = 'GD'");
            $this->db->query("UPDATE dev_rapproduct set Sym = 'G' WHERE Sym = 'Good-Very Good'");
            $this->db->query("UPDATE dev_rapproduct SET Sym='VG' WHERE Sym='Very Good'");
            $this->db->query("UPDATE dev_rapproduct SET Sym='EX' WHERE Sym='Excellent'");
            $this->db->query("UPDATE dev_rapproduct SET Sym='GD' WHERE Sym='Good'");
            $this->db->query("UPDATE dev_rapproduct SET Sym='F' WHERE Sym='Fine'");
            $this->db->query("UPDATE dev_rapproduct SET Sym='ID' WHERE Sym='Ideal'");
            $this->db->query("UPDATE dev_rapproduct set cut = 'G' WHERE  cut = 'GD'");
            $this->db->query("UPDATE dev_rapproduct set cut = 'N' WHERE  cut = 'None'");
            $this->db->query("UPDATE dev_rapproduct SET cut='EX' WHERE cut='Excellent'");
            $this->db->query("UPDATE dev_rapproduct SET cut='VG' WHERE cut='Very Good'");
            $this->db->query("UPDATE dev_rapproduct SET cut='GD' WHERE cut='Good'");
            $this->db->query("UPDATE dev_rapproduct SET cut='F' WHERE cut='Fair'");
            $this->db->query("UPDATE dev_rapproduct SET cut='ID' WHERE cut='Ideal'");
            $this->db->query("UPDATE dev_rapproduct SET shape='B' WHERE shape='ROUND'");
            $this->db->query("UPDATE dev_rapproduct SET shape='PR' WHERE shape='PRINCES'");
            $this->db->query("UPDATE dev_rapproduct SET shape='PR' WHERE shape='Princess'");
            $this->db->query("UPDATE dev_rapproduct SET shape='PR' WHERE shape='Princess'");
            $this->db->query("UPDATE dev_rapproduct SET shape='C' WHERE shape IN ('Cushion', 'Cushion Modified', 'COUSHION')");
            $this->db->query("UPDATE dev_rapproduct SET shape='E' WHERE shape='EMERALD'");
            $this->db->query("UPDATE dev_rapproduct SET shape='AS' WHERE shape='ASSCHER'");
            $this->db->query("UPDATE dev_rapproduct SET shape='M' WHERE shape='MARQUISE'");
            $this->db->query("UPDATE dev_rapproduct SET shape='O' WHERE shape='OVAL'");
            $this->db->query("UPDATE dev_rapproduct SET shape='R' WHERE shape='RADIANT'");
            $this->db->query("UPDATE dev_rapproduct SET shape='P' WHERE shape='PEAR'");
            $this->db->query("UPDATE dev_rapproduct SET shape='H' WHERE shape='HEART'");
            
	  echo $this->db->affected_rows(). "<br>";
	    
	}
	/// update color columns
	function fixColorColum() {	
	    // Fixing Shape 
	    
	    echo "Fixing Black color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value='Black' WHERE fancy_color='Black'");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Blue color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Blue' WHERE fancy_color IN ('Blue', 'Blue Green')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Brown color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Brown' WHERE fancy_color IN ('Brown','Brown Cognac','Brown Green','Brown Orange','Brown Pink','Brown Yellow')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Chameleon color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Chameleon' WHERE fancy_color IN ('Chameleon','Chameleon Green','Chameleon Yellow')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Champagne color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Champagne' WHERE fancy_color IN ('Champagne')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Cognac color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Cognac' WHERE fancy_color IN ('Cognac')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Gray color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Gray' WHERE fancy_color IN ('Gray','Gray Blue','Gray Green')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Green color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Green' WHERE fancy_color IN ('Green','Green Blue','Green Yellow')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Orange color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Orange' WHERE fancy_color IN ('Orange','Orange Brown','Orange Pink','Orange Yellow')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Other color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Other' WHERE fancy_color IN ('Other','Other Gray')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Pink color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Pink' WHERE fancy_color IN ('Pink','Pink Purple')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Red color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'Red' WHERE fancy_color IN ('Red')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing White color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET fcolor_value = 'White' WHERE fancy_color IN ('White')");
	    echo $this->db->affected_rows(). "<br>";
		
		echo "Fixing Yellow color<br>";
		$this->db->query("UPDATE dev_rapproduct SET fcolor_value='Yellow' WHERE fancy_color IN ('Yellow','Yellow Brown','Yellow Gray','Yellow Green','Yellow Orange','Yellow Other','Yellow Yellow')");
	    echo $this->db->affected_rows(). "<br>";
	    	
	}
	///// update diamond price
	function updateRapnetPriceHelixRate() {
		$result = $this->adminmodel->getRapnetProductsList();
		
		if(!empty($result)) {
			echo $result;
		} else {
			echo 'Query not executed!';
		}
	}

	function GetRapetDiamondsToDBTempOnly() {
		ini_set('memory_limit', '1024M');
    	ini_set('max_execution_time', '7200');				

    	$time_start = microtime(true);    	

        $owners = $this->adminmodel->getAllowners();
        //var_dump($owners);        

        if (empty($owners) || sizeof($owners) == 0) {
            $data = array("visit" => 0);                
            $this->db->update("dev_owners", $data);
            echo 'test0';
            exit();
        }        

        foreach ($owners['result'] as $owner) {
            $ownerString .= $owner['company_id'] . ",";
            $company_id_array[] = $owner['company_id'];
			$company_name_array[] = $owner['company_name'];

            $ownerarray[] = $owner;
        }

        $ownerString = substr($ownerString, 0, -1);

        $auth_url = "https://technet.rapaport.com/HTTP/Authenticate.aspx";
        $post_string = "username=41887&password=" . urlencode("bookmark");        
        
        set_time_limit(0);
        //create HTTP POST request with curl:
        $request = curl_init($auth_url); // initiate curl object
        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
        $auth_ticket = curl_exec($request); // execute curl post and store results in $auth_ticket
        curl_close($request);		        

		$feed_url = "http://technet.rapaport.com/HTTP/DLS/GetFile.aspx";
		$feed_url .= "?ticket=".$auth_ticket; //add authentication ticket:		
						
		//prepare to save response as file.
		$fp = fopen('import/DLS_41887.csv', 'wb');
		if ($fp == FALSE) {		
			echo "File not opened";
			exit;
		}
		fclose($fp); //close file;
		
        $csv = file_get_contents($feed_url);
        $csvdata = explode("\n", $csv);
        $csv_handler = fopen('import/DLS_41887.csv', 'w');
        fwrite($csv_handler, $csv);
        fclose($csv_handler);				
        
		if(count($company_id_array) > 0) {
			$owners_compname = "('".implode("', '", $company_name_array)."')";
			
			$file = "import/DLS_41887.csv";
			$fp = fopen($file, "r");
	
			$this->db->query("TRUNCATE TABLE dev_rapproduct_temp");

			$i = 0;
			$count=array();
			while (!feof($fp)) {
				//$data = fgetcsv($fp, filesize($file));
				$data = fgetcsv($fp);
	
				if ($i > 0) {	
					$count[] = $this->cronrapnetmodel->SaveEngagementRingsInDBCustom($data, $i);
				}
	
				$i++;				
			}
			fclose($fp);
			echo ($i-1)." records<br>";

			// $this->CarryDataFromTempTable();
			
			// $this->adminmodel->delete_remaining_owners($owners_compname);
			// $this->fixalldb(); // Fixing naming in all table in db

			// $this->fixColorColum();              // new!!!
   			// $this->setOtherColumnsValue();		 // new!!!            
		}
		
		echo(count($count));		
		echo ' Records Processed Successfully!';		

		$time_end = microtime(true);                
        $execution_time = round(($time_end - $time_start)/60, 2);
        echo '<br>Total Execution Time: '.$execution_time.' minutes';		
	}
	
	function GetRapetDiamondsToDB($mode = 0) {
		ini_set('memory_limit', '1024M');
    	ini_set('max_execution_time', '7200');				

    	$time_start = microtime(true);        	        
    	
        $owners = $this->adminmodel->getAllowners();
        //var_dump($owners);        

        if (empty($owners) || sizeof($owners) == 0) {
            $data = array("visit" => 0);                
            $this->db->update("dev_owners", $data);
            echo 'test0';
            exit();
        }        

        foreach ($owners['result'] as $owner) {
            $ownerString .= $owner['company_id'] . ",";
            $company_id_array[] = $owner['company_id'];
			$company_name_array[] = $owner['company_name'];

            $ownerarray[] = $owner;
        }

        $ownerString = substr($ownerString, 0, -1);

        $auth_url = "https://technet.rapaport.com/HTTP/Authenticate.aspx";
        //$post_string = "username=41887&password=" . urlencode("bookmark");
        $post_string = "username=24542&password=" . urlencode("rapaport123");
        
        set_time_limit(0);
        //create HTTP POST request with curl:
        $request = curl_init($auth_url); // initiate curl object
        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
        $auth_ticket = curl_exec($request); // execute curl post and store results in $auth_ticket
        curl_close($request);        
		
        //var_dump($auth_ticket); 
        //die();

        //2 - prepare HTTP request for data. Copy the URL from the RapLink Feed page in RapNet.com:
        // go to: http://www.rapnet.com/RapNet/DownloadListings/Download.aspx, choose your parameters, and click
        // generate code. Make sure to specify the columns wanted. This can produce a very long URL.

        //$feed_url = "https://technet.rapaport.com/HTTP/RapLink/download.aspx?SellerLogin=" . $ownerString . "&SortBy=Owner&White=1&Fancy=1&Programmatically=yes&Version=1.0";
        //$feed_url .= "&ticket=" . $auth_ticket; //add authentication ticket:        
        //By Dianuj         
		
		 //2 - prepare HTTP request for data.

		$feed_url = "http://technet.rapaport.com/HTTP/DLS/GetFile.aspx";
		$feed_url .= "?ticket=".$auth_ticket; //add authentication ticket:		
						
		//prepare to save response as file.
		$fp = fopen('import/DLS_41887.csv', 'wb');
		if ($fp == FALSE) {		
			echo "File not opened";
			exit;
		}
		fclose($fp); //close file;		
		
        $csv = file_get_contents($feed_url);
        $csvdata = explode("\n", $csv);
        $csv_handler = fopen('import/DLS_41887.csv', 'w');
        fwrite($csv_handler, $csv);
        fclose($csv_handler);	        

  		// if($mode == 'test') {
		// 	die('Done.');
		// }			

		//create HTTP GET request with curl 
		/*$request = curl_init($feed_url); // initiate curl object
		curl_setopt($request, CURLOPT_FILE, $fp); //Ask cURL to write the contents to a file
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_TIMEOUT, 300); //set timeout to 5 mins
		curl_exec($request); // execute curl post
		// additional options may be required depending upon your server configuration
		// you can find documentation on curl options at http://www.php.net/curl_setopt
		curl_close ($request); // close curl object 
		fclose($fp); //close file;*/
        
		if(count($company_id_array) > 0) {
			$owners_compname = "('".implode("', '", $company_name_array)."')";
			
			$file = "import/DLS_41887.csv";
			$fp = fopen($file, "r");
	
			$this->db->query("TRUNCATE TABLE dev_rapproduct_temp");

			$i = 0;
			$count=array();
			while (!feof($fp)) {
				//$data = fgetcsv($fp, filesize($file));
				$data = fgetcsv($fp);
	
				if ($i > 0) {	
					$count[] = $this->cronrapnetmodel->SaveEngagementRingsInDBCustom($data, $i);
				}
	
				$i++;				
			}
			fclose($fp);
			echo ($i-1)." records<br>";			

			//die();

			$this->CarryDataFromTempTable();
			
			//$this->adminmodel->delete_remaining_owners($owners_compname);			

			$this->fixalldb(); // Fixing naming in all table in db
			$this->fixColorColum();            
            $this->setOtherColumnsValue();		
            
		}

		//print_r(array_count_values($count));		
		echo(count($count));		
		echo ' Records Processed Successfully!';		

		$time_end = microtime(true);
                $this->fixalldb();
                
        $execution_time = round(($time_end - $time_start)/60, 2);
        echo '<br>Total Execution Time: '.$execution_time.' minutes';
    }

    function CarryDataFromTempTable() {
        $this->db->query("TRUNCATE TABLE dev_rapproduct");

    	$sql = "INSERT INTO dev_rapproduct SELECT * FROM dev_rapproduct_temp t 
    			WHERE price <> 0 AND lab IS NOT null AND lab <> 'NONE' AND cert IS NOT null AND cert <> 'NONE'
    			ON DUPLICATE KEY UPDATE `owner`=t.`owner`, `shape`=t.`shape`, `carat`=t.`carat`, `color`=t.`color`, `fancy_color`=t.`fancy_color`, `fancy_color_ot`=t.`fancy_color_ot`, `clarity`=t.`clarity`, `price`=t.`price`, `Rap`=t.`Rap`, `Cert`=t.`Cert`, `Depth`=t.`Depth`, `TablePercent`=t.`TablePercent`, `Girdle`=t.`Girdle`, `Culet`=t.`Culet`, `Polish`=t.`Polish`, `Sym`=t.`Sym`, `Flour`=t.`Flour`, `Meas`=t.`Meas`, `Comment`=t.`Comment`, `Stones`=t.`Stones`, `Cert_n`=t.`Cert_n`, `Stock_n`=t.`Stock_n`, `Make`=t.`Make`, `Date`=t.`Date`, `City`=t.`City`, `State`=t.`State`, `Country`=t.`Country`, `ratio`=t.`ratio`, `cut`=t.`cut`, `tbl`=t.`tbl`, `pricepercrt`=t.`pricepercrt`, `certimage`=t.`certimage`, `length`=t.`length`, `width`=t.`width`, `height`=t.`height`, `name_code`=t.`name_code`, `fancy_color_intens`=t.`fancy_color_intens`, `floursence_color`=t.`floursence_color`, `lab`=t.`lab`, `diamond_availability`=t.`diamond_availability`, `culet_size`=t.`culet_size`, `culet_condition`=t.`culet_condition`, `crown`=t.`crown`, `pavilion`=t.`pavilion`, `member_comments`=t.`member_comments`, `is_matched`=t.`is_matched`, `ismatched_separable`=t.`ismatched_separable`, `image_url`=t.`image_url`, `rapsepec`=t.`rapsepec`, `pavilion_depth`=t.`pavilion_depth`, `pavilion_angle`=t.`pavilion_angle`, `suplier_country`=t.`suplier_country`, `depth_percent`=t.`depth_percent`, `crown_angle`=t.`crown_angle`, `girdle_condition`=t.`girdle_condition`";
    	$this->db->query($sql);
    }

	function insert_rappnet_intodb() {
		
		$owners = $this->adminmodel->getAllowners();


        if (empty($owners) || sizeof($owners) == 0) {
            $data = array(
                "visit" => 0);
            $this->db->update("dev_owners", $data);
            exit();
        }

        foreach ($owners['result'] as $owner) {

            $ownerString .= $owner['company_id'] . ",";
            $company_id_array[] = $owner['company_id'];
			$company_name_array[] = $owner['company_name'];

            $ownerarray[] = $owner;

        }
		
		ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', '3600');
        
		$file = "import/DLS_41887.csv";
        $fp = fopen($file, "r");
        $i = 1;
		/*while(! feof($fp))
		{
		echo '<pre>';
		print_r(fgetcsv($fp));
		}
		echo '</pre>';
		fclose($fp);
		exit;*/
		$i = 1;
		//print_r($company_name_array);
        $count=array();
        while (!feof($fp)) {
            $data = fgetcsv($fp, filesize($file));
			print_ar($data);
			
			if(in_array($data[0], $company_name_array)) {
				$count[] = $this->cronrapnetmodel->SaveEngagementRingsInDBCustom($data, $i);
			}
			
			//print_r($data);echo '</pre>';
			//echo "<pre>";
			//var_dump($data);exit;
            //if ($i > 0) {
 			//echo 'true';exit;
            //    $count[] = $this->cronrapnetmodel->SaveEngagementRingsInDBCustom($data, $i);
            //}
		
            $i++;
        }
		fclose($fp);
		$owners_compname = "('".implode("', '", $company_name_array)."')";
		//$this->adminmodel->delete_remaining_owners($owners_compname);
		$this->fixalldb(); // Fixing naming in all table in db
        //print_r(array_count_values($count));
		echo 'Records Saved Successfully!';
		
	}
	function get_field()
		{
		$result = $this->db->list_fields('dev_qg');
		foreach($result as $field)
		{
		$data[] = $field;
		}
		print_ar($data);
	}
	function getnw_field()
		{
		$result = $this->db->list_fields('dev_stuller');
		foreach($result as $field)
		{
		$data[] = $field;
		}
		print_ar($data);
	}
	function readCSVOnly(){
    $file = "import/DLS_41887.csv";
    $fp = fopen($file, "r");
    ini_set('memory_limit', '1024M');
    ini_set('max_execution_time', '3600');
    $i = 0;
    $count=array();
    try{
    while (!feof($fp)) {
        $data = fgetcsv($fp, filesize($file));
		if ($i > 0) {

            $count[] = $this->cronrapnetmodel->SaveEngagementRingsInDBCustom($data, $i);
        }

        $i++;
    }
}
catch(Exception $e)
    {
         trigger_error( $e->getMessage(),E_USER_NOTICE);

    }
    //print_r(array_count_values($count));
    $this->fixalldb();
}

//// save diamond owner data into db
function insertOwnerIntoDB() {
    $sql = $this->db->query("SELECT `owner`, `Rap`, `City`,`State`, `Country` FROM dev_rapproduct GROUP BY `Rap`");
    $results = $sql->result_array();
    $datalist = array();
    $addate = date('Y-m-d');
    
    foreach ($results as $rows) {
        if($rows['Rap'] != '')
        $datalist[] = "('".cleans($rows['owner'])."', '".cleans($rows['Rap'])."', '".cleans($rows['City'])."', '".cleans($rows['State'])."', '".cleans($rows['Country'])."')";
    }
    array_filter($datalist);
                
		$insert_values = implode(', ', $datalist);
                $insers_values = str_replace(", ,", ",", $insert_values);
		$in = "INSERT INTO dev_owners (`company_name`, `company_id`, `city`, `state`, `country`) VALUES $insers_values ON DUPLICATE KEY UPDATE `company_id` = VALUES(`company_id`)";
                
		$this->db->query($in);
                
                echo 'Owner data is inserted / updated successfully!'; exit;
}
        
	function testrapner(){
	
		$owners = $this->adminmodel->getAllowners();
		
		
	         if(empty($owners)  || sizeof($owners) == 0 ){
			$data=array(
				"visit"=>0);
			$this->db->update("dev_owners",$data);
			break;
		}
		foreach($owners['result'] as $owner){
					   
			$ownerString .= $owner['company_id'].",";
			$company_id_array[] = $owner['company_id'];
							
			$ownerarray[] = $owner;                
					  
		}
				   
		echo $ownerString =  substr($ownerString, 0,-1);
					
    
	      //1 - Authenticate with TechNet. The authentication ticket will be stored in $auth_ticket. Note this MUST be HTTPS.
	      $auth_url = "https://technet.rapaport.com/HTTP/Authenticate.aspx";
	      $post_string = "username=45516&password=" . urlencode("devang69");

	      //create HTTP POST request with curl:
	      $request = curl_init($auth_url); // initiate curl object
	      curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
	      curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
	      curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
	      curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
	      $auth_ticket = curl_exec($request); // execute curl post and store results in $auth_ticket
	      curl_close ($request);
	      
	      var_dump($auth_ticket);

	      //2 - prepare HTTP request for data. Copy the URL from the RapLink Feed page in RapNet.com:
	      // go to: http://www.rapnet.com/RapNet/DownloadListings/Download.aspx, choose your parameters, and click
	      // generate code. Make sure to specify the columns wanted. This can produce a very long URL.

	      $feed_url = "https://technet.rapaport.com/HTTP/RapLink/download.aspx?SellerLogin=66506&SortBy=Owner&White=1&Fancy=1&Programmatically=yes&Version=1.0";
	      $feed_url .= "&ticket=".$auth_ticket; //add authentication ticket:

	      //prepare to save response as file.
	      $fp = fopen('import/45516_sells.csv', 'wb');
	      if ($fp == FALSE)
	      {
	      echo "File not opened";
	      exit;
	      }

	      //create HTTP GET request with curl
	      $request = curl_init($feed_url); // initiate curl object
	      curl_setopt($request, CURLOPT_FILE, $fp); //Ask cURL to write the contents to a file
	      curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
	      curl_setopt($request, CURLOPT_TIMEOUT, 300); //set timeout to 5 mins
	      curl_exec($request); // execute curl post
	      // additional options may be required depending upon your server configuration
	      // you can find documentation on curl options at http://www.php.net/curl_setopt
	      curl_close ($request); // close curl object
	      fclose($fp); //close file;

	      //$rows = explode("\n",$curldata);
	      $file = "import/45516_sells.csv";
	      //Special thanks to David Meyers for helping me to create the sample file. \\ :-) // 
	 // if(sizeof($rows) > 0) {                  
                    $fp = fopen($file,"r");
              //   $this->cronrapnetmodel->Lemptyhelix();
      		   while (!feof($fp) ) {
					$data = fgetcsv($fp, filesize($file));
					echo '---'.$i."<br>";
					if($i >= 2) $v = $this->cronrapnetmodel->SaveEngagementRingsInDBCustom($data, $i);
					$i++;
      			  }
      		  fclose($fp);
      		  
      		  $this->fixalldb(); // Fixing naming in all table in db 
          //}
    

    }
    
/*
 * @ Added by Pardeep Singal
 * @ 11/12/2011 4:32 PM
 */
    function GetEngagementRingsDiamonds(){             
     
        $emailContent='';
        $helixinclude = '';
        $owners = $this->adminmodel->getAllowners(0);
                //echo "<pre>";
              //  print_r($owners); exit();
        
	  //1 - Authenticate with TechNet. The authentication ticket will be stored in $auth_ticket. Note this MUST be HTTPS.
	  $auth_url = "https://technet.rapaport.com/HTTP/Authenticate.aspx";
	  $post_string = "username=45516&password=" . urlencode("devang69");

	  //create HTTP POST request with curl:
	  $request = curl_init($auth_url); // initiate curl object
	  curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
	  curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
	  curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
	  //curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
	  $auth_ticket = curl_exec($request); // execute curl post and store results in $auth_ticket
	  
	  var_dump($auth_ticket);
	  
	  curl_close ($request);
	  
		//$product=0;
		//$start=0;
		//while(1){			
		  //  $owners = $this->adminmodel->getAllowners($start);
		    //echo "<pre>";
		    // print_r($owners); exit();
		//	if(empty($owners)  || sizeof($owners) == 0 ){
		//		$data=array(
		//			"visit"=>0);
		//		$this->db->update("dev_owners",$data);
		//		break;
		//	}
			foreach($owners['result'] as $owner){
						  
				$ownerString .= $owner['company_id'].",";
				$company_id_array[] = $owner['company_id'];
				
				$ownerarray[] = $owner;                
						  
			}
				   
			echo $ownerString =  substr($ownerString, 0,-1); 
			//exit;
			//$url='http://technet.rapaport.com/HTTP/RapLink/download.aspx?SellerLogin=67100,30697,24019&SortBy=Owner&White=1&Fancy=1&Programmatically=yes&Version=1.0&UseCheckedCulommns=1&cCT=1&cCERT=1&cCLAR=1&cCOLR=1&cCRTCM=1&cCountry=1&cCITY=1&cCulet=1&cCuletSize=1&cCuletCondition=1&cCUT=1&cDPTH=1&cFLR=1&cGIRDLE=1&cLOTNN=1&cMEAS=1&cPOL=1&cPX=1&cDPX=1&cRapSpec=1&cOWNER=1&cAct=1&cNC=1&cSHP=1&cSTATE=1&cSTOCK_NO=1&cSYM=1&cTBL=1&cSTONES=1&cCertificateImage=1&cCertID=1&cDateUpdated=1';
			$url = "http://technet.rapaport.com/HTTP/RapLink/download.aspx?SellerLogin=".$ownerString."&SortBy=Owner&White=1&Fancy=1&Programmatically=yes&Version=1.0";
			$url .= "&ticket=".$auth_ticket;
			$file = "import/".date("Y-m-d").".csv";
			
			//var_dump($auth_ticket);
			
			$fu = fopen("$file", 'wb');
			if ($fu == FALSE){
				echo "File not opened";
				exit;
			}
			//create HTTP GET request with curl
			$request = curl_init($url); // initiate curl object
			curl_setopt($request, CURLOPT_FILE, $fu); //Ask cURL to write the contents to a file
			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
			curl_setopt($request, CURLOPT_TIMEOUT, 300); //set timeout to 5 mins
			curl_exec($request); // execute curl post
			$res = curl_exec($request); // execute curl post
			var_dump($res);
			// additional options may be required depending upon your server configuration
			// you can find documentation on curl options at http://www.php.net/curl_setopt
			curl_close ($request); // close curl object
			fclose($fu); //close file;
			$rows = explode("\n",$curldata);
			$product= $product + count($rows);
			$i = 0;
			//echo '<pre>ss';
					
			if(sizeof($rows) > 0) {

				$fp = fopen($file,"r");
				$headers = "From: ATLAS Engagment Rings \r\n";
				$headers .= "Reply-To: thebdcoder@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$content = "<table border='1' style='border-collapse:collapse;'><tr>
								<th>Lot Number</th>
								<th>Owner</th>
								<th>Shape</th>
								<th>Rapnet Price</th>
								<th>Certficate</th>
								<th>Cert Image</th>
								</tr>";
			    // $this->cronrapnetmodel->Remptyhelix(); 
				$i=1;
				
				while (!feof($fp) ) {
				
					$data = fgetcsv($fp, filesize($file));
					//echo "<pre>";
					//var_dump($data);
					echo '---'.$i."<br>";
					if($i >= 2) $v = $this->cronrapnetmodel->SaveEngagementRingsInDBCustom($data, $i);
					//if($i == 11) die;
					if($v != -1){
						$content = $content.$v;
					}
					$i++;
				}
				fclose($fp);
				$this->fixalldb(); // Fixing naming in all table in db 
				//$data=array(
				//      "visit"=>1
				//);
			      //foreach($company_id_array  as $company_id ){
				//$this->db->update("dev_owners",$data,array("company_id"=>$company_id ));
			     // }
				
			    
				//mail("myregistercd@gmail.com", "Testing Engagment Rings Download from Rapnet Cron Email", $content, $headers);
				//@mail("jcart@gmail.com", "ATLAS Engagment Rings Download from Rapnet Cron Email", $content, $headers);

			}
		//break;	   
                //$start+=1;
					
				
       // }
		
		//echo "Final= ".$start." Final"; 
		//echo "product= ".$product." Final";
    }
/*
 * Close Function
 *
 */


/*
 * @Method for fetch the Loose Diamodns lists and Stored in Our Database
 * @ Author: Pardeep Singal (habib.cse.sust@gmail.com)
 * @ Dated: 21 May 2012
 */
    function GetLooseDiamonds()
    {
        $owners = $this->adminmodel->getAllowners();
        if(empty($owners)  || sizeof($owners) == 0 )
				{
						  exit();
				}
     //  $j=100;
        foreach($owners['result'] as $owner){
     //        if($j < 154 ){
          $ownerString .= $owner['company_id'].",";
          
           //  }
            // $j++;
        }       
        $ownerString =  substr($ownerString, 0,-1);        
 
 $emailContent='';
 $helixinclude = '';
 $urls = 'https://technet.rapaport.com/HTTP/Authenticate.aspx';
 //$post_string = "username=atlas&password=".urlencode("zevika11234");
 $post_string = "username=78672&password=".urlencode("Crete@Begun");
 $ch = curl_init(); // initiate curl object
 curl_setopt($ch, CURLOPT_URL, $urls);
 curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
 curl_setopt($ch, CURLOPT_SSLVERSION,3);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
 $auth_ticket = curl_exec($ch); // execute curl post and store results in $auth_ticket
 curl_close ($ch);
$url = "http://technet.rapaport.com/HTTP/RapLink/download.aspx?SellerLogin=".$ownerString."&SortBy=Owner&White=1&Fancy=1&Programmatically=yes&Version=1.0&UseCheckedCulommns=1&cCT=1&cCERT=1&cCLAR=1&cCOLR=1&cCRTCM=1&cCountry=1&cCITY=1&cCulet=1&cCuletSize=1&cCuletCondition=1&cCUT=1&cDPTH=1&cFLR=1&cGIRDLE=1&cLOTNN=1&cMEAS=1&cPOL=1&cPX=1&cDPX=1&cRapSpec=1&cOWNER=1&cAct=1&cNC=1&cSHP=1&cSTATE=1&cSTOCK_NO=1&cSYM=1&cTBL=1&cSTONES=1&cCertificateImage=1&cCertID=1&cDateUpdated=1";
 $url .= "&ticket=".$auth_ticket;
$file = "import/".date("Y-m-d").".csv";
$fu = fopen("$file", 'wb');
if ($fu == FALSE){
  // echo "File not opened";
  exit;
}
          $ch = curl_init($url);
	  curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_FILE, $fu);
    //    curl_setopt($ch, CURLOPT_HEADER, 1);
    //    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_USERPWD, 'atlas:zevika11234');
          $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
	  curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	  $curldata = curl_exec($ch);
          fwrite($fu,$curldata);
//	  curl_setopt($ch, CURLOPT_FILE, $fs); //Ask cURL to write the contents to a file
	  curl_setopt($ch, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
	  curl_setopt($ch, CURLOPT_TIMEOUT, 300); //set timeout to 5 mins
	  curl_exec($ch); // execute curl post
          fclose($fu);
 	  curl_close($ch);		
 	  $rows = explode("\n",$curldata);
	  $i = 0;
	  if(sizeof($rows) > 0) {                  
                    $fp = fopen($file,"r");
                    $headers = "From: ATLAS \r\n";
                    $headers .= "Reply-To: habib.cse.sust@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    $content = "<table border='1' style='border-collapse:collapse;'><tr>
                            <th>Lot Number</th>
                            <th>Owner</th>
                            <th>Shape</th>
                            <th>Rapnet Price</th>
                            <th>Certficate</th>
                            <th>Cert Image</th>
                            </tr>";
              //   $this->cronrapnetmodel->Lemptyhelix();
      		   while (!feof($fp) ) {
					$data = fgetcsv($fp, filesize($file));
					
					$v = $this->cronrapnetmodel->saveLooseDiamondsInDB($data);
                                        if($v != -1){
                                            $content = $content.$v;
                                        } 
      			  }
      		  fclose($fp);
          }
    }

/*
 * @function: To Prepair the requestXml Data Array
 * @function : To Pass the array in eBayRequst Method
 */
		 function addDiamonds($details)
		{
			$this->adminmodel->addDiamondtoEbay($details[0],30);
		}
} // class end
?>