<?php

$oauth = new OAuth("irdmq2mj1tn2nslwx7vx2xp8", "8nqfek62cu");

$oauth->enableDebug();
$oauth->setToken("4523e6f3eb64508e8e4fab079286d7", "8d4a7b80a1");

try {
    $source_file = dirname(realpath(__FILE__)) ."/b.jpg";
  $new=curl_file_create($source_file, 'image/jpeg', 'b.jpg');
//
////$url = "https://openapi.etsy.com/v2/listings/277895742/images";
////$data = array('image' =>'@/b.jpg'); // also tried to provide full path from /wwwroot
//$headers = array("Content-Type" => "application/x-www-form-urlencoded"); // also tried to add Content-Length
////$oauth->fetch($url, $data, OAUTH_HTTP_METHOD_POST, $headers);
//// $oauth->setRequestEngine( OAUTH_REQENGINE_CURL );
    $url = "https://openapi.etsy.com/v2/listings/598820237/images";
//    
//    $params = array('image' => array(
//            "name"=>"course-page-banner.png",
//            "type"=>"image/png",
//            "tmp_name"=>"/var/tmp/php6z3YP4",
//            "error"=>0,
//            "size"=>471598
//        ));
//        print_r($params);die;
////    $params = array('image' => array('file' => '@'.$source_file));
//
//    $oauth->fetch($url, $params, OAUTH_HTTP_METHOD_POST,$headers);
//
//    $json = $oauth->getLastResponse();
//    print_r(json_decode($json, true));
   $source_file = dirname(realpath(__FILE__)) ."/b.jpg";
 
//   $source_file=curl_file_create($source_file, 'image/jpeg', 'b.jpg');
        $mimeType = 'image/jpeg';
        $filename = basename($source_file);
        $source_file = new CurlFile($source_file, $mimeType, $filename);
        $data = array("image" => "{$source_file}", "filename" => $filename);
        

 
// Assign POST data
//$data = array('image' => $cfile);
//    $url = "https://openapi.etsy.com/v2/listings/598820237/images";
//    $params = array('image' => $source_file);
//    

    $oauth->fetch($url, $data, OAUTH_HTTP_METHOD_POST);

//    $json = $oauth->getLastResponse();
//    print_r(json_decode($json, true));
} catch (OAuthException $e) {
    // You may want to recover gracefully here...
    print $oauth->getLastResponse()."\n";
    print_r($oauth->debugInfo);
    die($e->getMessage());
}































die;
//session_start();
//$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');
//$req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", 'https://market.heartsanddiamonds.com/etsy-goldsource/vendor/oauth1.php');
//
//$_SESSION['aman']= $req_token['oauth_token_secret'];
////die;



$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu');
$oauth->setVersion("1.1");
$oauth->enableDebug();
$oauth->setToken('4523e6f3eb64508e8e4fab079286d7', '8d4a7b80a1');
//
//$data = $oauth->fetch("https://openapi.etsy.com/v2/users/__SELF__", null, OAUTH_HTTP_METHOD_GET);
//			$json = $oauth->getLastResponse();
//                        print_r($json);
//die;
$source_file = "etsy.png";

$url = "https://openapi.etsy.com/v2/listings/598820237/images";
$params = array('image' => '@' . $source_file . ';type=MIME');
$data=$oauth->fetch($url, $params, OAUTH_HTTP_METHOD_POST);

echo $json = $oauth->getLastResponse();
die();

//~ $tags  = 'testing,justtesting,againtest';
//~ $tags  = $_POST['tags'];
//print_r($_POST['checkbox']);
if (isset($_POST['submit']) && isset($_POST['checkbox'])) {
    $shippingTemplateId = '53031263588';
    foreach ($_POST['checkbox'] as $checkbox) {
        $data_query = "SELECT * FROM product where id='" . $checkbox . "'";
        $data_result = mysqli_query($conn, $data_query);
        while ($apidata = mysqli_fetch_assoc($data_result)) {
            $tags = $apidata['tags'];
            $tags = str_replace(' ', '', $tags);
            $arr = Array(
                'quantity' => $apidata['quantity'],
                'title' => $apidata['title'],
                'description' => $apidata['description'],
                'price' => $apidata['price'],
                //~ 'tags' => $apidata['tags'],
                'who_made' => $apidata['who_made'],
                'is_supply' => $apidata['is_supply'],
                'when_made' => $apidata['when_made'],
                'shipping_template_id' => (int) $shippingTemplateId
            );
            try {
                $data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings?tags=" . $tags, $arr, OAUTH_HTTP_METHOD_POST);
                $json = $oauth->getLastResponse();
                $array = json_decode($json, true);
                echo "<pre>";
                print_r($array);

                //exit();
                foreach ($array['results'] as $r1) {
                    $listing_id = $r1['listing_id'];
                    $insert_query = "UPDATE product SET `listing_id`='" . $listing_id . "' WHERE id='" . $checkbox . "'";
                    $result = mysqli_query($conn, $insert_query);


                    /* Code to image upload starts here */
                    //~ $source_file = dirname(realpath(__FILE__)) ."/$filename";
                    //~ $source_file = "etsy.png";
                    //~ $url = "https://openapi.etsy.com/v2/listings/".$listing_id."/images";
                    //~ $params = array('@image' => '@'.$source_file.';type=MIME');
                    //~ $oauth->fetch($url, $params, OAUTH_HTTP_METHOD_POST);
                    //~ $json = $oauth->getLastResponse();

                    $oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu');
                    $oauth->setVersion("1.1");
                    $oauth->enableDebug();
                    $oauth->setToken($access_token, $access_token_secret);


                    try {
                        $filename = 'test-etsy-listing-image.jpg';
                        $source_file = dirname(realpath(__FILE__)) . "/$filename";

                        $mimetype = mime_content_type($source_file);
                        $now_time = time();
                        $url = "https://openapi.etsy.com/v2/listings/" . $listing_id . "/images";
                        $params = array('@image' => '@' . $source_file . ';type=' . $mimetype . ';listing_image_id=' . $now_time);
                        echo '<pre>';
                        print_r($params);
                        echo '<pre>';
                        //$headers["Content-Type"] = 'multipart/form-data';
                        $oauth->fetch($url, $params, OAUTH_HTTP_METHOD_POST);

                        $json = $oauth->getLastResponse();
                        print_r(json_decode($json, true));
                        exit();
                    } catch (OAuthException $e) {
                        // You may want to recover gracefully here...
                        print $oauth->getLastResponse() . "\n";
                        print_r($oauth->debugInfo);
                        die($e->getMessage());
                        exit();
                    }

                    /* Code to image upload ends here */
                }
            } catch (OAuthException $e) {
                error_log($e->getMessage());
                error_log(print_r($oauth->getLastResponse(), true));
                error_log(print_r($oauth->getLastResponseInfo(), true));

                print $oauth->getLastResponse() . "\n";
                print_r($oauth->debugInfo);
                //die($e->getMessage());
            }
        }
    }
    echo ("<SCRIPT LANGUAGE='JavaScript'>
									window.alert('Succesfully Listed')
									window.location.href='etsy.php';
									</SCRIPT>");
} else {
    echo "please select any product";
}
?>
