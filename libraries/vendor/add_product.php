<?php
session_start();
include("config.php");
define('API_KEY','irdmq2mj1tn2nslwx7vx2xp8');
if(isset($_POST['submit1'])){
	//echo "<pre>";
	//print_r($_POST);
	$quantity = $_POST['quantity'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$who_made = $_POST['who_made'];
	$is_supply = $_POST['is_supply'];
	$when_made = $_POST['when_made'];
	$tags = $_POST['tags'];
	$insert_query = "INSERT INTO product (quantity,title,description,price,who_made,is_supply,when_made,tags) VALUES ('$quantity','$title','$description','$price','$who_made','$is_supply','$when_made','$tags')";
	$result = mysqli_query($conn,$insert_query);
	//var_dump($result);
	//echo mysqli_num_rows($result);die;
	if($result){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Succesfully Inserted')
				window.location.href='etsy.php';
				</SCRIPT>");
		//header('Location:etsy.php');
		//header('Location:etsy.php');
	}
	
    $access_token = $_SESSION['oauth_token'];// get from db
	$access_token_secret = $_SESSION['oauth_token_secret'];// get from db
	$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu');
	$oauth->setToken($access_token, $access_token_secret);
	$shippingTemplateId = '41612124102';
	try {
		$request_data = Array(
						  'quantity' => $quantity,
						  'title' => $title,
						  'description' => $description,
						  'price' => $price,
						  'who_made' => $who_made,                                                                 
						  'is_supply' => $is_supply,
						  'when_made' => $when_made,
						  'shipping_template_id'=>(int)$shippingTemplateId,
						);								
	//$data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings", $request_data, OAUTH_HTTP_METHOD_POST);		
	//$data = $oauth->fetch("https://openapi.etsy.com/v2/private/shipping/templates", $request_data1, OAUTH_HTTP_METHOD_POST);
	// $data = $oauth->fetch("https://openapi.etsy.com/v2/private/countries", null, OAUTH_HTTP_METHOD_GET);
    $json = $oauth->getLastResponse();
    $array = json_decode($json,true);						
	$reques1= Array(
		  'title' => 'testtest11',
		  'origin_country_id' =>  $array['results'][0]['country_id'],
		  'primary_cost' => '100.00',
		  'secondary_cost' => '30.00',                                                                 
		);													
}
catch (OAuthException $e) {
	error_log($e->getMessage());
	error_log(print_r($oauth->getLastResponse(), true));
	error_log(print_r($oauth->getLastResponseInfo(), true));
	exit;
}
}
?>
<html>
	<head></head>
	<title>Add Product Page</title>
	<body>
		<form action="" method="post">
		<input type="text" name="quantity" placeholder="enter quantity"><br><br>
		<input type="text" name="title" placeholder="enter title"><br><br>
		<input type="text" name="description" placeholder="enter description"><br><br>
		<input type="text" name="price" placeholder="enter price"><br><br>
		<input type="text" name="tags" placeholder="enter comma separated tags"><br><br>
		<span>enter who_made</span><br>
		 <select name="who_made">
			  <option value="i_did">i_did</option>
			  <option value="collective">collective</option>
			  <option value="someone_else">someone_else</option>
		</select> 
		<br><br>
		<span>enter is_supply</span><br>
		<select name="is_supply">
			  <option value="0">no</option>
			  <option value="1">yes</option>
		</select>
		<br><br>
		<span>enter when_made</span><br>
		<select name="when_made">
			  <option value="made_to_order">made_to_order</option>
			  <option value="2010_2017">2010_2017</option>
			  <option value="2000_2009">2000_2009</option>
		</select> <br><br>
		<input type="submit" value="submit" name="submit1">
		</form>
	</body>
</html>
