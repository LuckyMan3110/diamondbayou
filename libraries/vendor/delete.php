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
$_SESSION['listing_id'] = $listing_id;
try {
		$data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings/".$listing_id,null,OAUTH_HTTP_METHOD_DELETE);		
		$json = $oauth->getLastResponse();
		$array = json_decode($json,true); 
		echo "<pre>";
		print_r($array);
		echo "yes";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Succesfully Deleted')
		window.location.href='etsy.php';
		</SCRIPT>");			
		}
		
	catch (OAuthException $e) {
			error_log($e->getMessage());
			error_log(print_r($oauth->getLastResponse(), true));
			error_log(print_r($oauth->getLastResponseInfo(), true));
			
				echo "<pre>";
		print_r($e->getMessage());
		print_r($oauth->getLastResponse());
	echo "</pre>";
		
		
			exit;
			
			print $oauth->getLastResponse()."\n";
			print_r($oauth->debugInfo);
			die($e->getMessage());									
	}
?>
