<?php
session_start();
/*-------------------------------------------------------------------------------------*/
include("config.php");
define('API_KEY','irdmq2mj1tn2nslwx7vx2xp8');
$access_token = $_SESSION['oauth_token'];// get from db
$access_token_secret = $_SESSION['oauth_token_secret'];// get from db
$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu');
$oauth->setToken($access_token, $access_token_secret);
$data1 = array();
echo "<pre>";
print_r($_POST['checkbox']);
if(isset($_POST['submit']) && isset($_POST['checkbox'])){
	$all_array = array();
	foreach($_POST['checkbox'] as $checkbox){
			$data_query = "SELECT * FROM product where id='".$checkbox."'";
			$data_result  = mysqli_query($conn,$data_query);
			$data= mysqli_fetch_assoc($data_result);
			$data1[] = $data; 
		}
		$shippingTemplateId = '41612124102';
		foreach($data1 as $apidata)
		{
			$arr  = Array(
						  'quantity' => $apidata['quantity'],
						  'title' => $apidata['title'],
						  'description' => $apidata['description'],
						  'price' => $apidata['price'],
						  'who_made' => $apidata['who_made'],                                                        
						  'is_supply' => $apidata['is_supply'],
						  'when_made' =>$apidata['when_made'],
						  'shipping_template_id'=>(int)$shippingTemplateId,
						);								   
	$shippingTemplateId = '41612124102';
	try {
	$data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings", $arr, OAUTH_HTTP_METHOD_POST);		
	//$data = $oauth->fetch("https://openapi.etsy.com/v2/private/shipping/templates", $request_data1, OAUTH_HTTP_METHOD_POST);
	// $data = $oauth->fetch("https://openapi.etsy.com/v2/private/countries", null, OAUTH_HTTP_METHOD_GET);
    $json = $oauth->getLastResponse();
    $array = json_decode($json,true);

    $all_array[] = $array; 
    echo "<pre>";
    foreach($_POST['checkbox'] as $checkbox){
		$i = 0;
		foreach($array['results'] as $r1){
			$listing_id = $r1['listing_id'];
			$insert_query = "UPDATE product SET `listing_id`='".$listing_id."' WHERE id='".$checkbox."'";
			$result = mysqli_query($conn,$insert_query);
			}
	}	
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Creted Listing on Etsy')
    window.location.href='etsy.php';
    </SCRIPT>");	
 }
	catch (OAuthException $e) {
		error_log($e->getMessage());
		error_log(print_r($oauth->getLastResponse(), true));
		error_log(print_r($oauth->getLastResponseInfo(), true));
		exit;
	
}	
 
}	
	
	
}
else{
	echo "please select any product";
 }
?>
