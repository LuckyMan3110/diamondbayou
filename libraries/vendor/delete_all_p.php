<?php
session_start();
include("config.php");
define('API_KEY','irdmq2mj1tn2nslwx7vx2xp8');
$access_token = $_SESSION['oauth_token'];
$access_token_secret = $_SESSION['oauth_token_secret'];
$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu');
$oauth->setToken($access_token, $access_token_secret);
$data1 = array();
echo "<pre>";
if(isset($_POST['submit']) && isset($_POST['checkbox'])){
	foreach($_POST['checkbox'] as $checkbox){
			$data_query = "SELECT * FROM product where id='".$checkbox."'";
			$data_result  = mysqli_query($conn,$data_query);
			while($apidata = mysqli_fetch_assoc($data_result)){
					$listing_id = $apidata['listing_id'];
					try {
							$data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings/".$listing_id,null,OAUTH_HTTP_METHOD_DELETE);		
							$json = $oauth->getLastResponse();
							$array = json_decode($json,true); 
							print_r($array);					
							}
						catch (OAuthException $e) {
								error_log($e->getMessage());
								error_log(print_r($oauth->getLastResponse(), true));
								error_log(print_r($oauth->getLastResponseInfo(), true));
								exit;
								
								print $oauth->getLastResponse()."\n";
								print_r($oauth->debugInfo);
								die($e->getMessage());									
						}
					}
				}
echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Succesfully Deleted')
							window.location.href='etsy.php';
							</SCRIPT>");
}
else {
	echo "please select any products to delete";
	echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Please select any products to delete')
							window.location.href='delete_all.php';
							</SCRIPT>");
	}
?>
