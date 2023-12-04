<?php

class Lodingdatabase extends CI_Controller {

	public function index()
	{
		$fp = fopen('data.csv', "r");
		$row = 1;
		while (!feof($fp)) {
			$data = fgetcsv($fp);
			if ($row > 1) {
				//if (!empty($data[0])) {
					//$this->lodingdatabasemodel->addQualityData($data);
					var_dump($data);
					//echo $row;
				//}
			}
			$row++;
		}
		fclose($fp);
		
	}
}

