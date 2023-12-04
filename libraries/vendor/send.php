<?php
session_start();
//phpinfo();die;
include("config.php");
define('API_KEY','irdmq2mj1tn2nslwx7vx2xp8');
$access_token           = $_SESSION['oauth_token'];
$access_token_secret    = $_SESSION['oauth_token_secret'];

$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu');
$oauth->setVersion("1.1");
$oauth->enableDebug();
$oauth->setToken($access_token, $access_token_secret);
$data1 = array();

if(isset($_POST['submit']) && isset($_POST['checkbox'])){
	$shippingTemplateId = '53031263588';
	foreach($_POST['checkbox'] as $checkbox){
			$data_query = "SELECT * FROM product where id='".$checkbox."'";
			$data_result  = mysqli_query($conn,$data_query);
			while($apidata = mysqli_fetch_assoc($data_result)){
				$tags = $apidata['tags'];
                $tags = str_replace(' ', '', $tags);
                
                echo '<pre>'; print_r($tags); exit();
                
				$arr  = Array(
						  'quantity' => $apidata['quantity'],
						  'title' => $apidata['title'],
						  'description' => $apidata['description'],
						  'price' => $apidata['price'],
						  'who_made' => $apidata['who_made'],                                                        
						  'is_supply' => $apidata['is_supply'],
						  'when_made' =>$apidata['when_made'],
						  'shipping_template_id'=>(int)$shippingTemplateId
						);	
				try {
						$data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings?tags=".$tags,$arr,OAUTH_HTTP_METHOD_POST);		
						$json = $oauth->getLastResponse();
						$array = json_decode($json,true); 
						echo "<pre>";
						print_r($array);
						
						//exit();
						foreach($array['results'] as $r1){
							$listing_id = $r1['listing_id'];
							
							$insert_query = "UPDATE product SET `listing_id`='".$listing_id."' WHERE id='".$checkbox."'";
							$result = mysqli_query($conn,$insert_query);
							
							
							$source_file = 'https://www.thegoldsourcejewelry.com/images/uploads/image1_904.jpg'; //dirname(realpath(__FILE__)) . "/image1_981.jpg";
                            $response = ListImage($listing_id, $source_file);
                            echo '<pre>'; print_r($response); echo '</pre>';
                            
						}
						
					}
					
				catch (OAuthException $e) {
					error_log($e->getMessage());
					error_log(print_r($oauth->getLastResponse(), true));
					error_log(print_r($oauth->getLastResponseInfo(), true));
					
					print $oauth->getLastResponse()."\n";
					print_r($oauth->debugInfo);
					//die($e->getMessage());
							
													
					}
				
				}			
		}
echo ("<SCRIPT LANGUAGE='JavaScript'>
									window.alert('Succesfully Listed')
									window.location.href='etsy.php';
									</SCRIPT>");
}
else{
	echo "please select any product";
 }
 
 
 
 
 function ListImage($EtsyItemId, $RPath) {
    $url = "https://openapi.etsy.com/v2/listings/$EtsyItemId/images";
    $imageSize = getImageSize($RPath);
    $imageWidth = $imageSize[0];
    $imageHeight = $imageSize[1];
    if ($imageWidth > 10000 | $imageHeight > 10000) {
        resize_image($RPath, 9000);
    }
    $source_file = $RPath;
    $mimeType = 'image/jpeg';
    $filename = basename($source_file);
    $source_file = new CurlFile($source_file, $mimeType, $filename);
    $data = array("image" => $source_file, "filename" => $filename);

    $response = CurlEtsy('POST', $url, null, $data);
    return $response;
}

function resize_image($file, $w) {
    $imageSize = getImageSize($file);
    $imageWidth = $imageSize[0];
    $imageHeight = $imageSize[1];

    $DESIRED_WIDTH = $w;
    $proportionalHeight = round(($DESIRED_WIDTH * $imageHeight) / $imageWidth);

    $originalImage = imageCreateFromJPEG($file);

    $resizedImage = imageCreateTrueColor($DESIRED_WIDTH, $proportionalHeight);

    imageCopyResampled($resizedImage, $originalImage, 0, 0, 0, 0, $DESIRED_WIDTH + 1, $proportionalHeight + 1, $imageWidth, $imageHeight);
    imageJPEG($resizedImage, $file);

    imageDestroy($originalImage);
    imageDestroy($resizedImage);
}

function CurlEtsy($method, $url, $param = null, $data = null) {
    $consumer_key = 'irdmq2mj1tn2nslwx7vx2xp8';
    $consumer_secret = '8nqfek62cu';
    $TokenSecret = '8d4a7b80a1';
    $Access_token = '4523e6f3eb64508e8e4fab079286d7';
    $nonce = mt_rand();
    $timestamp = time();
    $params = array(
        'oauth_consumer_key' => $consumer_key,
        'oauth_nonce' => $nonce,
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_timestamp' => $timestamp,
        'oauth_version' => '1.0',
        'oauth_token' => $Access_token,
    );
    if ($method == 'GET') {
        if (isset($param)) {
            $query = http_build_query($param);
            $Geturl = $url . '?' . $query;
            foreach ($param as $key => $value) {
                $params[$key] = $value;
            }
        } else {
            $Geturl = $url;
        }
    } else if ($method == 'PUT') {
        foreach ($param as $key => $value) {
            $params[$key] = $value;
        }

        $data = http_build_query($param, '', '&');
    }
    ksort($params);
    $sortedParamsByKeyEncodedForm = array();
    foreach ($params as $key => $value) {
        $sortedParamsByKeyEncodedForm[] = rawurlencode($key) . '=' . rawurlencode($value);
    }
    $strParams = implode('&', $sortedParamsByKeyEncodedForm);
    $signatureData = strtoupper($method)
            . '&'
            . rawurlencode($url)
            . '&'
            . rawurlencode($strParams);

    $key = rawurlencode($consumer_secret) . '&' . rawurlencode($TokenSecret);
    $signature = base64_encode(hash_hmac('SHA1', $signatureData, $key, 1));
    $arrHeaders = array(
        'Authorization: OAuth '
        . 'oauth_consumer_key="' . $params['oauth_consumer_key'] . '",'
        . 'oauth_nonce="' . $params['oauth_nonce'] . '",'
        . 'oauth_signature_method="' . $params['oauth_signature_method'] . '",'
        . 'oauth_signature="' . rawurlencode($signature) . '",'
        . 'oauth_timestamp="' . $params['oauth_timestamp'] . '",'
        . 'oauth_version="' . $params['oauth_version'] . '",'
        . 'oauth_token="' . rawurlencode($params['oauth_token']) . '",'
    );
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeaders);
//    curl_setopt($curl, CURLOPT_CAINFO, public_path() . "/ssl/cacert.pem");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    if ($method !== 'GET') {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    } else {
        $url = $Geturl;
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    $mxdResponse = curl_exec($curl);
    echo curl_error($curl);
    echo $mxdResponse;
    $array = json_decode($mxdResponse, true);
    return $array;
}
 
 
?>
