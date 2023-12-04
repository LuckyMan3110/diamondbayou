<?php
session_start();
include("config.php");
include('autoload.php');
$_SESSION['listing_id'] = $_REQUEST['listing_id'];
$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');
$req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_d", 'https://market.heartsanddiamonds.com/etsy-goldsource/vendor/oauth1.php');
$_SESSION['aman']= $req_token['oauth_token_secret'];
header('Location:'.$req_token['login_url']);
?>
