<?php
session_start();

$_SESSION['oauth_token'] = $_GET['oauth_token'];
$_SESSION['oauth_token_secret'] = $_SESSION['aman'];

include('autoload.php');
$request_token = $_GET['oauth_token'];
$request_token_secret = $_SESSION['aman']; 
$verifier = $_GET['oauth_verifier'];
$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');
$oauth->setToken($request_token, $request_token_secret);
try {
     $acc_token = $oauth->getAccessToken("https://openapi.etsy.com/v2/oauth/access_token", null, $verifier);
     $_SESSION['oauth_token']=$access_token = $acc_token['oauth_token'];// get from db
		$_SESSION['oauth_token_secret']=$access_token_secret = $acc_token['oauth_token_secret'];// get from db
		$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu',
						   OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
		$oauth->setToken($access_token, $access_token_secret);
		try {
			$data = $oauth->fetch("https://openapi.etsy.com/v2/users/__SELF__", null, OAUTH_HTTP_METHOD_GET);
			$json = $oauth->getLastResponse();
			echo "<pre>";
		} catch (OAuthException $e) {
			error_log($e->getMessage());
			error_log(print_r($oauth->getLastResponse(), true));
			error_log(print_r($oauth->getLastResponseInfo(), true));
			exit;
		}

		print_r($_SESSION);
	//	die;
    	echo "<pre>";
	
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Authenticated')
    window.location.href='etsy.php';
    </SCRIPT>");

} catch (OAuthException $e) {
}

?>
