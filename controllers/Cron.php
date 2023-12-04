<?php 
class Cron extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->model('cronmodel');
	}

	function fixalldb(){
		/* Fixing Shape */
	    echo "Fixing Shape table<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='B' WHERE shape='ROUND'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='PR' WHERE shape='PRINCES'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

		$sql = "UPDATE dev_rapproduct SET shape='PR' WHERE shape='Princess'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

		$sql = "UPDATE dev_rapproduct SET shape='PR' WHERE shape='Princess'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='C' WHERE shape IN ('Cushion', 'Cushion Modified', 'COUSHION')";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

		$sql = "UPDATE dev_rapproduct SET shape='E' WHERE shape='EMERALD'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='AS' WHERE shape='ASSCHER'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='M' WHERE shape='MARQUISE'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='O' WHERE shape='OVAL'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='R' WHERE shape='RADIANT'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='P' WHERE shape='PEAR'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET shape='H' WHERE shape='HEART'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";

	    /* Fixing Polish */
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

	    $sql = "UPDATE dev_rapproduct SET Polish='F' WHERE Polish='Fine'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET Polish='ID' WHERE Polish='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";

	    /* Fixing Symmentry */
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

	    $sql = "UPDATE dev_rapproduct SET Sym='F' WHERE Sym='Fine'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET Sym='ID' WHERE Sym='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";

	    /* Fixing Flour */
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

	    $sql = "UPDATE dev_rapproduct SET Flour='F' WHERE Flour='Fine'";
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

	    $sql = "UPDATE dev_rapproduct SET cut='F' WHERE cut='Fine'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_rapproduct SET cut='ID' WHERE cut='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";
	}

	/* Update color columns */
	function fixColorColum() {	
		/* Fixing Shape */
	    echo "Fixing Black color<br>";
	    $this->db->query("UPDATE dev_rapproduct SET shape='Black' WHERE fancy_color='Black'");
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

	/* Update diamond price */
	function updateRapnetPriceHelixRate() {
		$result = $this->adminmodel->getRapnetProductsList();
		if(!empty($result)) {
			echo $result;
		} else {
			echo 'Query not executed!';
		}
	}

	function GetRapetDiamondsToDB(){
		ini_set('memory_limit', '1024M');
		ini_set('max_execution_time', '3600');

		$owners = $this->adminmodel->getAllowners();
		if (empty($owners) || sizeof($owners) == 0) {
			$data = array("visit" => 0);
			$this->db->update("dev_owners", $data);
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
        $request = curl_init($auth_url); // initiate curl object
        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
        $auth_ticket = curl_exec($request); // execute curl post and store results in $auth_ticket
        curl_close($request);

		$feed_url = "http://technet.rapaport.com/HTTP/DLS/GetFile.aspx";
		$feed_url .= "?ticket=".$auth_ticket; //add authentication ticket:		
		$fp = fopen('import/DLS_41887.csv', 'wb');
		if ($fp == FALSE){
			echo "File not opened";
			exit;
		}
		fclose($fp);
        $csv = file_get_contents($feed_url);
        $csvdata = explode("\n", $csv);
        $csv_handler = fopen('import/DLS_41887.csv', 'w');
        fwrite($csv_handler, $csv);
        fclose($csv_handler);

		if(count($company_id_array) > 0) {
			$owners_compname = "('".implode("', '", $company_name_array)."')";
			$file = "import/DLS_41887.csv";
			$fp = fopen($file, "r");

			$i = 0;
			$count=array();
			while (!feof($fp)) {
				$data = fgetcsv($fp);
				if ($i > 1) {
					$count[] = $this->cronmodel->SaveEngagementRingsInDBCustom($data, $i);
				}
				$i++;
			}
			fclose($fp);
			$this->adminmodel->delete_remaining_owners($owners_compname);
			$this->fixalldb();
		}
		print_r(array_count_values($count));
		echo 'Records Saved Successfully!';
    }

	function insert_rappnet_intodb() {
		$owners = $this->adminmodel->getAllowners();
        if (empty($owners) || sizeof($owners) == 0) {
            $data = array("visit" => 0);
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
        $count=array();
        while (!feof($fp)) {
            $data = fgetcsv($fp, filesize($file));
			print_ar($data);
			if(in_array($data[0], $company_name_array)) {
				$count[] = $this->cronmodel->SaveEngagementRingsInDBCustom($data, $i);
			}
            $i++;
        }
		fclose($fp);
		$owners_compname = "('".implode("', '", $company_name_array)."')";
		$this->fixalldb();
		echo 'Records Saved Successfully!';
	}

	function get_field(){
		$result = $this->db->list_fields('dev_qg');
		foreach($result as $field){
			$data[] = $field;
		}
		print_ar($data);
	}

	function getnw_field(){
		$result = $this->db->list_fields('dev_stuller');
		foreach($result as $field){
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
					$count[] = $this->cronmodel->SaveEngagementRingsInDBCustom($data, $i);
				}
				$i++;
			}
		}catch(Exception $e){
			trigger_error( $e->getMessage(),E_USER_NOTICE);
		}
		$this->fixalldb();
	}

	/* save rappnet into db */
	public function saveRapnetIntoDatabase(){
		ini_set('max_execution_time', 20000);
		ini_set("memory_limit", "1024M");

		$import_file = 'import/DLS_41887.csv';
		$file = fopen($import_file,"r");
			$i=1;
			$cols_value = array();
			while(! feof($file)) {
				$data = fgetcsv($file);
				if($i > 1) {
					if($data[22] != '')		
					$cols_value[] =	$this->cronmodel->SaveRapnetRingsDiamondIntoDB($data, $i);
				}
				if($i == 30000) {
						break;
				}
				$i++;
			}
			fclose($file);
		
		$insers_values = implode(', ', $cols_value);
		$in = "INSERT INTO dev_rapproduct (`lot`, `owner`, `shape`, `carat`, `color`, `fancy_color`, `fancy_color_ot`, `clarity`, `price`, `Rap`, `Cert`, `Depth`, `TablePercent`, `Girdle`, `Culet`, `Polish`, `Sym`, `Flour`, `Meas`, `Comment`, `Stones`, `Cert_n`, `Stock_n`, `Make`, `Date`, `City`, `State`, `Country`, `ratio`, `cut`, `tbl`, `pricepercrt`, `certimage`, `length`, `width`, `height`, `lab`, `fancy_color_intens`, `crown`, `crown_angle`, `pavilion`, `pavilion_angle`) VALUES $insers_values ON DUPLICATE KEY UPDATE `owner` = VALUES(`owner`), `shape` = VALUES(`shape`), `carat` = VALUES(`carat`), `color` = VALUES(`color`), `fancy_color` = VALUES(`fancy_color`), `fancy_color_ot` = VALUES(`fancy_color_ot`), `clarity` = VALUES(`clarity`), `price` = VALUES(`price`), `Rap` = VALUES(`Rap`), `Cert` = VALUES(`Cert`), `Depth` = VALUES(`Depth`), `TablePercent` = VALUES(`TablePercent`), `Girdle` = VALUES(`Girdle`), `Culet` = VALUES(`Culet`), `Polish` = VALUES(`Polish`), `Sym` = VALUES(`Sym`), `Flour` = VALUES(`Flour`), `Meas` = VALUES(`Meas`), `Comment` = VALUES(`Comment`),  `Stones` = VALUES(`Stones`), `Cert_n` = VALUES(`Cert_n`), `Stock_n` = VALUES(`Stock_n`), `Make` = VALUES(`Make`), `Date` = VALUES(`Date`), `City` = VALUES(`City`), `State` = VALUES(`State`),  `Country` = VALUES(`Country`), `ratio` = VALUES(`ratio`), `cut` = VALUES(`cut`), `tbl` = VALUES(`tbl`), `pricepercrt` = VALUES(`pricepercrt`), `certimage` = VALUES(`certimage`), `length` = VALUES(`length`), `width` = VALUES(`width`), `height` = VALUES(`height`), `lab` = VALUES(`lab`), `fancy_color_intens` = VALUES(`fancy_color_intens`), `crown` = VALUES(`crown`), `crown_angle` = VALUES(`crown_angle`), `pavilion` = VALUES(`pavilion`), `pavilion_angle` = VALUES(`pavilion_angle`)";
		$this->db->query($in);
		
		echo 'Record inserted successfully!';
		$this->fixalldb();
	}

	function testrapner(){
		$owners = $this->adminmodel->getAllowners();
		if(empty($owners)  || sizeof($owners) == 0 ){
			$data=array("visit"=>0);
			$this->db->update("dev_owners",$data);
			exit();
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

		$feed_url = "https://technet.rapaport.com/HTTP/RapLink/download.aspx?SellerLogin=66506&SortBy=Owner&White=1&Fancy=1&Programmatically=yes&Version=1.0";
		$feed_url .= "&ticket=".$auth_ticket; //add authentication ticket:

		//prepare to save response as file.
		$fp = fopen('import/45516_sells.csv', 'wb');
		if ($fp == FALSE){
			echo "File not opened";
			exit;
		}

		//create HTTP GET request with curl
		$request = curl_init($feed_url); // initiate curl object
		curl_setopt($request, CURLOPT_FILE, $fp); //Ask cURL to write the contents to a file
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_TIMEOUT, 300); //set timeout to 5 mins
		curl_exec($request); // execute curl post
		curl_close ($request); // close curl object
		fclose($fp); //close file;

		$file = "import/45516_sells.csv";
		$fp = fopen($file,"r");
		while (!feof($fp) ) {
			$data = fgetcsv($fp, filesize($file));
			echo '---'.$i."<br>";
			if($i >= 2) $v = $this->cronmodel->SaveEngagementRingsInDBCustom($data, $i);
				$i++;
		}
		fclose($fp);
		$this->fixalldb();
	}

    function GetEngagementRingsDiamonds(){             
		$emailContent='';
		$helixinclude = '';
		$owners = $this->adminmodel->getAllowners(0);
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

		foreach($owners['result'] as $owner){
		$ownerString .= $owner['company_id'].",";
		$company_id_array[] = $owner['company_id'];
		$ownerarray[] = $owner;
		}
		echo $ownerString =  substr($ownerString, 0,-1); 
		$url = "http://technet.rapaport.com/HTTP/RapLink/download.aspx?SellerLogin=".$ownerString."&SortBy=Owner&White=1&Fancy=1&Programmatically=yes&Version=1.0";
		$url .= "&ticket=".$auth_ticket;
		$file = "import/".date("Y-m-d").".csv";
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
			$i=1;
			while (!feof($fp) ) {
				$data = fgetcsv($fp, filesize($file));
				echo '---'.$i."<br>";
				if($i >= 2) $v = $this->cronmodel->SaveEngagementRingsInDBCustom($data, $i);
				if($v != -1){
					$content = $content.$v;
				}
				$i++;
			}
			fclose($fp);
			$this->fixalldb();
		}
    }

	function GetLooseDiamonds(){
        $owners = $this->adminmodel->getAllowners();
        if(empty($owners)  || sizeof($owners) == 0 ){
			exit();
		}

        foreach($owners['result'] as $owner){
			$ownerString .= $owner['company_id'].",";
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
			while (!feof($fp) ) {
				$data = fgetcsv($fp, filesize($file));

				$v = $this->cronmodel->saveLooseDiamondsInDB($data);
				if($v != -1){
					$content = $content.$v;
				} 
			}
			fclose($fp);
		}
	}

	function addDiamonds($details){
		$this->adminmodel->addDiamondtoEbay($details[0],30);
	}

	function idexonline(){
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '1536M');
		$dir = FCPATH.'zips/';

		$download_url = 'http://idexonline.com/Idex_Feed_API-Full_Inventory?String_Access=Y3VIFR646FBJEM52FZX6UPZ0Y';
		$file_extension = '.zip';
		$file_name = time().'-full';

		$zip_file_name = $file_name.$file_extension;
		$file_string = file_get_contents($download_url);
		file_put_contents($dir.$zip_file_name, $file_string);
		$this->Cronmodel->unZipFile($dir.$zip_file_name,$dir.$file_name);

		if(file_exists($dir.$zip_file_name)){
			unlink($dir.$zip_file_name);
		}

		$xml_file = scandir($dir.$file_name, 1);
		if(!isset($xml_file[0])){
			echo 'Something want wrong';exit;
		}
		$xml_file_name = $xml_file[0];
		$xml_file_full_path = $dir.$file_name.DIRECTORY_SEPARATOR.$xml_file_name;

		$reader = new XmlReader;
		$reader->open($xml_file_full_path);
		while( $reader->read()) {
			if( $reader->localName === 'item' && $reader->nodeType === 1 ) {
				$row = $this->db->from('dev_index')->where('lot', $reader->getAttribute('id'))->get()->row();
				$data = [
					'lot'=>$reader->getAttribute('id'),
					'Stock_n'=>$reader->getAttribute('id'),
					'supplier_stock_reference'=>$reader->getAttribute('sr'),
					'shape'=>$reader->getAttribute('cut'),
					'carat'=>$reader->getAttribute('ct'),
					'color'=>$reader->getAttribute('col'),
					'clarity'=>$reader->getAttribute('cl'),
					'lab'=>$reader->getAttribute('lab'),
					'Cert'=>$reader->getAttribute('lab'),
					'Cert_n'=>$reader->getAttribute('cn'),
					'cut'=>$reader->getAttribute('cut'),
					'pricepercrt'=>$reader->getAttribute('ap'),
					'price'=>$reader->getAttribute('tp'),
					'Polish'=>$reader->getAttribute('pol'),
					'Sym'=>$reader->getAttribute('sym'),
					'Meas'=>$reader->getAttribute('mes'),
					'TablePercent'=>$reader->getAttribute('tb'),
					'crown'=>$reader->getAttribute('cr'),
					'pavilion_depth'=>$reader->getAttribute('pv'),
					'Girdle'=>$reader->getAttribute('gd'),
					'culet_size'=>$reader->getAttribute('cs'),
					'Flour'=>$reader->getAttribute('fl'),
					'supplier'=>$reader->getAttribute('sup'),
					'Country'=>$reader->getAttribute('cty'),
					'State'=>$reader->getAttribute('st'),
					'Comment'=>$reader->getAttribute('rm'),
					'Phone'=>$reader->getAttribute('tel'),
					'email'=>$reader->getAttribute('eml'),
					'idxl_price_report'=>$reader->getAttribute('idxl')
				];
				if(empty($row)){
					$this->db->insert('dev_index', $data);
				}else{
					$this->db->where('lot', $id);
					$this->db->update('dev_index', $data);
				}
			}
		}
		unlink($dir.$file_name);

		$this->update_table_fields_values();
		echo 'done';exit;
	}

    function update_table_fields_values() {
        $this->setOtherColumnsValueidex();
        $this->fixalldbidex();
        $this->fixColorColumidex();
    }

    function setOtherColumnsValueidex() {
        $this->db->query("UPDATE dev_index set Flour = 'F' WHERE Flour = 'Faint'");
        $this->db->query("UPDATE dev_index set Flour = 'M' WHERE Flour = 'Medium'");
        $this->db->query("UPDATE dev_index set Flour = 'S' WHERE Flour = 'Strong'");
        $this->db->query("UPDATE dev_index set Flour = 'VS' WHERE Flour = 'Very Strong'");
        $this->db->query("UPDATE dev_index set Flour = 'S' WHERE Flour = 'Slight'");
        $this->db->query("UPDATE dev_index set Flour = 'VS' WHERE Flour = 'Very Slight'");
        $this->db->query("UPDATE dev_index set Flour = 'N' WHERE Flour = 'None'");
        $this->db->query("UPDATE dev_index set Flour = 'F' WHERE Flour = 'Faint'");
        $this->db->query("UPDATE dev_index set Polish = 'F' WHERE Polish = 'Fair'");
        $this->db->query("UPDATE dev_index set Polish = 'F' WHERE Polish = 'Fair-Good'");
        $this->db->query("UPDATE dev_index set Polish = 'G' WHERE Polish = 'GD'");
        $this->db->query("UPDATE dev_index set Polish = 'G' WHERE Polish = 'Good-Very Good'");
        $this->db->query("UPDATE dev_index set Sym = 'F' WHERE  Sym = 'Fair'");
        $this->db->query("UPDATE dev_index set Sym = 'F' WHERE Sym = 'Fair-Good'");
        $this->db->query("UPDATE dev_index set Sym = 'G' WHERE Sym = 'GD'");
        $this->db->query("UPDATE dev_index set Sym = 'G' WHERE Sym = 'Good-Very Good'");
        $this->db->query("UPDATE dev_index set cut = 'G' WHERE  cut = 'GD'");
        $this->db->query("UPDATE dev_index set cut = 'N' WHERE  cut = 'None'");
    }

	function fixalldbidex(){
		/* Fixing Shape */
	    echo "Fixing Shape table<br>";
	    $sql = "UPDATE dev_index SET shape='B' WHERE shape='ROUND'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET shape='PR' WHERE shape='PRINCES'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

		$sql = "UPDATE dev_index SET shape='PR' WHERE shape='Princess'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

		$sql = "UPDATE dev_index SET shape='PR' WHERE shape='Princess'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET shape='C' WHERE shape IN ('Cushion', 'Cushion Modified', 'COUSHION')";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

		$sql = "UPDATE dev_index SET shape='E' WHERE shape='EMERALD'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET shape='AS' WHERE shape='ASSCHER'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET shape='M' WHERE shape='MARQUISE'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET shape='O' WHERE shape='OVAL'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET shape='R' WHERE shape='RADIANT'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET shape='P' WHERE shape='PEAR'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET shape='H' WHERE shape='HEART'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";

		/* Fixing Polish */
	    echo "Fixing Polish table<br>";

	    $sql = "UPDATE dev_index SET Polish='EX' WHERE Polish='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Polish='VG' WHERE Polish='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Polish='GD' WHERE Polish='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Polish='F' WHERE Polish='Fine'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Polish='ID' WHERE Polish='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";

		/* Fixing Symmentry */
	    echo "Fixing Polish table<br>";

	    $sql = "UPDATE dev_index SET Sym='EX' WHERE Sym='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Sym='VG' WHERE Sym='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Sym='GD' WHERE Sym='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Sym='F' WHERE Sym='Fine'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Sym='ID' WHERE Sym='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";

	    /* Fixing Flour */
	    echo "Fixing Flour table<br>";

	    $sql = "UPDATE dev_index SET Flour='EX' WHERE Flour='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Flour='VG' WHERE Flour='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Flour='GD' WHERE Flour='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Flour='F' WHERE Flour='Fine'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET Flour='ID' WHERE Flour='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";

	    echo "Fixing Cut table<br>";

	    $sql = "UPDATE dev_index SET cut='EX' WHERE cut='Excellent'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET cut='VG' WHERE cut='Very Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET cut='GD' WHERE cut='Good'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET cut='F' WHERE cut='Fine'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    $sql = "UPDATE dev_index SET cut='ID' WHERE cut='Ideal'";
	    $this->db->query($sql);
	    echo $this->db->affected_rows(). "<br>";

	    echo "Done";

		$this->db->query("UPDATE `dev_index` set `shape` = 'AS' WHERE `shape` = 'Asscher'");
		$this->db->query("UPDATE `dev_index` set `shape` = 'C' WHERE `shape` = 'Cushion'");
		$this->db->query("UPDATE `dev_index` set `shape` = 'E' WHERE `shape` = 'Emerald'");
		$this->db->query("UPDATE `dev_index` set `shape` = 'M' WHERE `shape` = 'Marquise'");
		$this->db->query("UPDATE `dev_index` set `shape` = 'O' WHERE `shape` = 'Oval'");
		$this->db->query("UPDATE `dev_index` set `shape` = 'P' WHERE `shape` = 'Pear'");
		$this->db->query("UPDATE `dev_index` set `shape` = 'PR' WHERE `shape` IN ('Prince', 'Princess')");
		$this->db->query("UPDATE `dev_index` set `shape` = 'R' WHERE `shape` = 'Radiant'");
		$this->db->query("UPDATE `dev_index` set `shape` = 'B' WHERE `shape` = 'Round'");
		$this->db->query("UPDATE `dev_index` set `shape` = 'H' WHERE `shape` = 'Heart'");
		$this->db->query("UPDATE dev_index set Flour = 'F' WHERE Flour = 'Faint'");
		$this->db->query("UPDATE dev_index set Flour = 'M' WHERE Flour = 'Medium'");
		$this->db->query("UPDATE dev_index set Flour = 'S' WHERE Flour = 'Strong'");
		$this->db->query("UPDATE dev_index set Flour = 'VS' WHERE Flour = 'Very Strong'");
		$this->db->query("UPDATE dev_index set Flour = 'S' WHERE Flour = 'Slight'");
		$this->db->query("UPDATE dev_index set Flour = 'VS' WHERE Flour = 'Very Slight'");
		$this->db->query("UPDATE dev_index set Flour = 'N' WHERE Flour = 'None'");
		$this->db->query("UPDATE dev_index set Flour = 'F' WHERE Flour = 'Faint'");
		$this->db->query("UPDATE dev_index set Polish = 'F' WHERE Polish = 'Fair'");
		$this->db->query("UPDATE dev_index set Polish = 'F' WHERE Polish = 'Fair-Good'");
		$this->db->query("UPDATE dev_index set Polish = 'G' WHERE Polish = 'GD'");
		$this->db->query("UPDATE dev_index set Polish = 'G' WHERE Polish = 'Good-Very Good'");
		$this->db->query("UPDATE dev_index set Sym = 'F' WHERE  Sym = 'Fair'");
		$this->db->query("UPDATE dev_index set Sym = 'F' WHERE Sym = 'Fair-Good'");
		$this->db->query("UPDATE dev_index set Sym = 'G' WHERE Sym = 'GD'");
		$this->db->query("UPDATE dev_index set Sym = 'G' WHERE Sym = 'Good-Very Good'");
		$this->db->query("UPDATE dev_index SET Sym='VG' WHERE Sym='Very Good'");
		$this->db->query("UPDATE dev_index SET Sym='EX' WHERE Sym='Excellent'");
		$this->db->query("UPDATE dev_index SET Sym='GD' WHERE Sym='Good'");
		$this->db->query("UPDATE dev_index SET Sym='F' WHERE Sym='Fine'");
		$this->db->query("UPDATE dev_index SET Sym='ID' WHERE Sym='Ideal'");
		$this->db->query("UPDATE dev_index set cut = 'G' WHERE  cut = 'GD'");
		$this->db->query("UPDATE dev_index set cut = 'N' WHERE  cut = 'None'");
		$this->db->query("UPDATE dev_index SET cut='EX' WHERE cut='Excellent'");
		$this->db->query("UPDATE dev_index SET cut='VG' WHERE cut='Very Good'");
		$this->db->query("UPDATE dev_index SET cut='GD' WHERE cut='Good'");
		$this->db->query("UPDATE dev_index SET cut='F' WHERE cut='Fair'");
		$this->db->query("UPDATE dev_index SET cut='ID' WHERE cut='Ideal'");
		$this->db->query("UPDATE dev_index SET shape='B' WHERE shape='ROUND'");
		$this->db->query("UPDATE dev_index SET shape='PR' WHERE shape='PRINCES'");
		$this->db->query("UPDATE dev_index SET shape='PR' WHERE shape='Princess'");
		$this->db->query("UPDATE dev_index SET shape='PR' WHERE shape='Princess'");
		$this->db->query("UPDATE dev_index SET shape='C' WHERE shape IN ('Cushion', 'Cushion Modified', 'COUSHION')");
		$this->db->query("UPDATE dev_index SET shape='E' WHERE shape='EMERALD'");
		$this->db->query("UPDATE dev_index SET shape='AS' WHERE shape='ASSCHER'");
		$this->db->query("UPDATE dev_index SET shape='M' WHERE shape='MARQUISE'");
		$this->db->query("UPDATE dev_index SET shape='O' WHERE shape='OVAL'");
		$this->db->query("UPDATE dev_index SET shape='R' WHERE shape='RADIANT'");
		$this->db->query("UPDATE dev_index SET shape='P' WHERE shape='PEAR'");
		$this->db->query("UPDATE dev_index SET shape='H' WHERE shape='HEART'");
	}

	/* Update color columns */
	function fixColorColumidex() {	
		/* Fixing Shape */
	    echo "Fixing Black color<br>";
	    $this->db->query("UPDATE dev_index SET shape='Black' WHERE fancy_color='Black'");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Blue color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Blue' WHERE fancy_color IN ('Blue', 'Blue Green')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Brown color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Brown' WHERE fancy_color IN ('Brown','Brown Cognac','Brown Green','Brown Orange','Brown Pink','Brown Yellow')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Chameleon color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Chameleon' WHERE fancy_color IN ('Chameleon','Chameleon Green','Chameleon Yellow')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Champagne color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Champagne' WHERE fancy_color IN ('Champagne')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Cognac color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Cognac' WHERE fancy_color IN ('Cognac')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Gray color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Gray' WHERE fancy_color IN ('Gray','Gray Blue','Gray Green')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Green color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Green' WHERE fancy_color IN ('Green','Green Blue','Green Yellow')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Orange color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Orange' WHERE fancy_color IN ('Orange','Orange Brown','Orange Pink','Orange Yellow')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Other color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Other' WHERE fancy_color IN ('Other','Other Gray')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Pink color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Pink' WHERE fancy_color IN ('Pink','Pink Purple')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Red color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'Red' WHERE fancy_color IN ('Red')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing White color<br>";
	    $this->db->query("UPDATE dev_index SET fcolor_value = 'White' WHERE fancy_color IN ('White')");
	    echo $this->db->affected_rows(). "<br>";

		echo "Fixing Yellow color<br>";
		$this->db->query("UPDATE dev_index SET fcolor_value='Yellow' WHERE fancy_color IN ('Yellow','Yellow Brown','Yellow Gray','Yellow Green','Yellow Orange','Yellow Other','Yellow Yellow')");
	    echo $this->db->affected_rows(). "<br>";
	}

}
?>