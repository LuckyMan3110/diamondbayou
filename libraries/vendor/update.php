<?php
session_start();
include("config.php");
define('API_KEY','irdmq2mj1tn2nslwx7vx2xp8');
$access_token = $_SESSION['oauth_token'];
$access_token_secret = $_SESSION['oauth_token_secret'];
$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu');
$oauth->setToken($access_token, $access_token_secret);
$data1 = array();
$listing_id = $_REQUEST['listing_id'];
$shippingTemplateId = '53031263588';
if(isset($_POST['submit'])){
				$tags = $_POST['tags'];
				$arr  = Array(
						  'quantity' => $_POST['quantity'],
						  'title' => $_POST['title'],
						  'description' => $_POST['description'],
						  'price' => $_POST['price'],
						  'shipping_template_id'=>(int)$shippingTemplateId,
						);	
				echo "<pre>";
				//print_r($arr);
				try {
						//$data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings", $arr, OAUTH_HTTP_METHOD_POST);		
						//$data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings/".$listing_id."?state=active&tags=".$tags, $arr, OAUTH_HTTP_METHOD_PUT);		
						$data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings/".$listing_id."?state=active&tags=cccc", $arr, OAUTH_HTTP_METHOD_PUT);		
						$json = $oauth->getLastResponse();
						$array = json_decode($json,true); 
						//print_r($array);
						foreach($array['results'] as $r1){
							$listing_id = $r1['listing_id'];
							//$insert_query = "UPDATE product SET `quantity`='".$_POST['quantity']."', `listing_id`='".$listing_id."',`title`='".$_POST['title']."',`description`='".$_POST['description']."',`price`='".$_POST['price']."' WHERE id='".$checkbox."'";
							
							 $insert = "UPDATE `product` SET `quantity`='".$_POST['quantity']."',`title`='".$_POST['title']."',`description`='".$_POST['description']."',`price`='".$_POST['price']."',`tags`='".$_POST['tags']."' WHERE listing_id='".$listing_id."'"; 
							$result = mysqli_query($conn,$insert);
							}
					echo ("<SCRIPT LANGUAGE='JavaScript'>
						window.alert('Succesfully Updated on Etsy')
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

else{
	echo "please select any product";
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
		<input type="text" name="tags" placeholder="enter tags by comma sepateted"><br><br>
		<input type="submit" value="submit" name="submit">
		</form>
	</body>
</html>
