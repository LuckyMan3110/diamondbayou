<?php

/**
 * @author teks6491
 * @see Ebay Manager Class , this class connected to ebay api method.
 * @copyright 2010 www.directloosediamonds.com
 * @name EbayManager
 *
 */

include_once(config_item('base_path').'system/application/helpers/eBaySOAP.php');

class EbayManager extends CI_Model{

    protected $eb_config;

    function  __construct() {
        parent::__construct();
        //$this->eb_config = parse_ini_file(config_item('base_path').'system/application/helpers/ebay.ini', true); // production
        $this->eb_config     = parse_ini_file(config_item('base_path').'system/application/libraries/ebaysoap/ebay.ini', true); // sandbox
        
    }

    function _getStoreInfo(){
       
       include_once(config_item('base_path').'system/application/helpers/eBaySOAP.php');

       $config              = parse_ini_file(config_item('base_path').'system/application/helpers/ebay.ini', true);
       $site                = $config['settings']['site'];
       $compatibilityLevel  = $config['settings']['compatibilityLevel'];
       $dev                 = $config[$site]['devId'];
       $app                 = $config[$site]['appId'];
       $cert                = $config[$site]['cert'];
       $token               = $config[$site]['authToken'];
       $location            = $config[$site]['gatewaySOAP'];
       $session             = new eBaySession($dev, $app, $cert);
       $session->token      = $token;
       $session->site       = 0; // 0 = US;
       $session->location   = $location;

        try {

            $client                     = new eBaySOAP($session);
            $params['Version']          = $compatibilityLevel;
            $results                    = $client->GetStore($params);
            if($results->Ack == 'Success'){
                    $response = $results->Store;
            }else{
                    $response = $results->Ack;
            }
            
        } catch (SOAPFault $f) {
            //print $f; // error handling
            $response = 'API Error.. please check the documentation';
        }
        return $response;
    }

    function _setStoreCategories($args){

        $config              = $this->eb_config;
        $site                = $config['settings']['site'];
        $compatibilityLevel  = $config['settings']['compatibilityLevel'];
        $dev                 = $config[$site]['devId'];
        $app                 = $config[$site]['appId'];
        $cert                = $config[$site]['cert'];
        $token               = $config[$site]['authToken'];
        $location            = $config[$site]['gatewaySOAP'];
        $session             = new eBaySession($dev, $app, $cert);
        $session->token      = $token;
        $session->site       = 0;
        $session->location   = $location;
        
        try {

        $client                     = new eBaySOAP($session);
        $params['Version']          = $compatibilityLevel;
        $params['WarningLevel']     = 'High';
        $params['Action']           = $args['Action'];
        $actions = array('Add','Delete','Move');
        if(in_array($params['Action'] , $actions)){
            if(empty ($args['SC_CC_CategoryID'])) {
                $dest_cat_id = '-999';
                $params['ItemDestinationCategoryID']    = $dest_cat_id;
                } else {
                $dest_cat_id = $args['SC_CC_CategoryID'];
                $params['DestinationParentCategoryID']  = $dest_cat_id;
            }
        }
        
         $params['StoreCategories']['CustomCategory']['CategoryID']   = $args['SC_CC_CategoryID'];
         $params['StoreCategories']['CustomCategory']['Name']         = $args['SC_CC_Name'];
         
         $results = $client->SetStoreCategories($params);
         if($results->Ack == 'Success'){
             $response['RespStatus'] = (string) $results->Status;
             $response['RespCode']   = 0;
             $response['RespMsg']    = $params['Action'] . ' Category Successfully ' ;
         }else{
             $response['RespStatus'] = (string) $results->Status;
             $response['RespCode']   = 1;
             $response['RespMsg']    = (string) $results->Errors->ShortMessage;
         }

        } catch (SOAPFault $f) {
          exit;
        }
        
        return $response;

    }

    function _getStoreCategories(){
       
       $config              = $this->eb_config;
       $site                = $config['settings']['site'];
       $compatibilityLevel  = $config['settings']['compatibilityLevel'];
       $dev                 = $config[$site]['devId'];
       $app                 = $config[$site]['appId'];
       $cert                = $config[$site]['cert'];
       $token               = $config[$site]['authToken'];
       $location            = $config[$site]['gatewaySOAP'];
       $session             = new eBaySession($dev, $app, $cert);
       $session->token      = $token;
       $session->site       = 0; // 0 = US;
       $session->location   = $location;

        try {

            $client                     = new eBaySOAP($session);
            $params['Version']          = $compatibilityLevel;
            $results                    = $client->GetStore($params);
            if($results->Ack == 'Success'){
                    $response = $results->Store->CustomCategories->CustomCategory;
            }else{
                    $response = $results->Ack;
            }

        } catch (SOAPFault $f) {
            //print $f; // error handling
            $response = 'API Error.. please check the documentation';
        }
        return $response;
    }

    /**
     * @param string $catId category id
     * @method _getSellerList($catId);
     * @see this method will return product items in 120 days backward.
     * @return array
     *
     */

    function _getSellerList($catId){

       $config              = $this->eb_config;
       $site                = $config['settings']['site'];
       $compatibilityLevel  = $config['settings']['compatibilityLevel'];
       $dev                 = $config[$site]['devId'];
       $app                 = $config[$site]['appId'];
       $cert                = $config[$site]['cert'];
       $token               = $config[$site]['authToken'];
       $location            = $config[$site]['gatewaySOAP'];
       $session             = new eBaySession($dev, $app, $cert);
       $session->token      = $token;
       $session->site       = 0; // 0 = US;
       $session->location   = $location;

        try {

            $client                     = new eBaySOAP($session);
            $end_time_from              = gmdate("Y-m-d H:i:s", time() - (60 * 60 * 24 * 120));
            $end_time_to                = gmdate("Y-m-d H:i:s", time());
            $params['Version']          = '689';
            $params['DetailLevel']      = 'ReturnAll';
            $params['StartTimeFrom']    = $end_time_from;
            $params['StartTimeTo']      = $end_time_to;
            $params['Pagination']['EntriesPerPage'] = '30';
            $params['UserID']                       = 'alan-g-jewelers';

            if(!empty ($catId)){
                $params['CategoryID']               = (int) $catId;
            }
            //echo '<pre>'; print_r($params); echo '</pre>'; exit;
            $results                                = $client->GetSellerList($params);

            if($results->Ack == 'Success'){
                    $response = $results;
            }else{
                    $response = $results->Ack;
            }

        } catch (SOAPFault $f) {
            //print $f; // error handling
            $response = 'API Error.. please check the documentation';
            
        }
        return $results;

    }

    function _findProducts(){

       $config              = $this->eb_config;
       $site                = $config['settings']['site'];
       $compatibilityLevel  = $config['settings']['compatibilityLevel'];
       $dev                 = $config[$site]['devId'];
       $app                 = $config[$site]['appId'];
       $cert                = $config[$site]['cert'];
       $token               = $config[$site]['authToken'];
       $location            = $config[$site]['gatewaySOAP'];
       $session             = new eBaySession($dev, $app, $cert);
       $session->token      = $token;
       $session->site       = 0; // 0 = US;
       $session->location   = $location;

        try {

            $client                     = new eBaySOAP($session);
            $params['Version']          = $compatibilityLevel;
            $params['Pagination']['EntriesPerPage'] = '30';
            $params['UserID']                       = 'alan-g-jewelers';
            $params['CategoryID']                   = (int) $catId;
            $results                                = $client->findItemsByCategory($params);

            if($results->Ack == 'Success'){
                    $response = $results;
            }else{
                    $response = $results->Ack;
            }

        } catch (SOAPFault $f) {
            //print $f; // error handling
            $response = 'API Error.. please check the documentation';

        }
        return $results;

    }

    function _getCategoryListings($catId){

       $config              = $this->eb_config;
       $site                = $config['settings']['site'];
       $compatibilityLevel  = $config['settings']['compatibilityLevel'];
       $dev                 = $config[$site]['devId'];
       $app                 = $config[$site]['appId'];
       $cert                = $config[$site]['cert'];
       $token               = $config[$site]['authToken'];
       $location            = $config[$site]['gatewaySOAP'];
       $session             = new eBaySession($dev, $app, $cert);
       $session->token      = $token;
       $session->site       = 0; // 0 = US;
       $session->location   = $location;

        try {

            $client                     = new eBaySOAP($session);
            $end_time_from              = gmdate("Y-m-d H:i:s", time() - (60 * 60 * 24 * 120));
            $end_time_to                = gmdate("Y-m-d H:i:s", time());

            $params['Version']          = $compatibilityLevel;
            $params['Pagination']['EntriesPerPage'] = '30';
            $params['UserID']                       = 'alan-g-jewelers';
            if(!empty ($catId)){
                $params['CategoryID']               = (int) $catId;
            }

            $results                                = $client->GetCategoryListings($params);

            if($results->Ack == 'Success'){
                    $response = $results;
            }else{
                    $response = $results->Ack;
            }

        } catch (SOAPFault $f) {
            //print $f; // error handling
            $response = 'API Error.. please check the documentation';

        }
        return $results;

    }

    function _getCategory2CS($catId){

       $config              = $this->eb_config;
       $site                = $config['settings']['site'];
       $compatibilityLevel  = $config['settings']['compatibilityLevel'];
       $dev                 = $config[$site]['devId'];
       $app                 = $config[$site]['appId'];
       $cert                = $config[$site]['cert'];
       $token               = $config[$site]['authToken'];
       $location            = $config[$site]['gatewaySOAP'];
       $session             = new eBaySession($dev, $app, $cert);
       $session->token      = $token;
       $session->site       = 0; // 0 = US;
       $session->location   = $location;

        try {

            $client                     = new eBaySOAP($session);
            $end_time_from              = gmdate("Y-m-d H:i:s", time() - (60 * 60 * 24 * 120));
            $end_time_to                = gmdate("Y-m-d H:i:s", time());

            $params['Version']          = $compatibilityLevel;
            //$params['Pagination']['EntriesPerPage'] = '30';
            $params['DetailLevel']                       = 'ReturnAll';
            $params['CategoryID']               = (int) $catId;

            $results                                = $client->GetCategory2CS($params);

            if($results->Ack == 'Success'){
                    $response = $results;
            }else{
                    $response = $results->Ack;
            }

        } catch (SOAPFault $f) {
            //print $f; // error handling
            $response = 'API Error.. please check the documentation';

        }
        return $results;

    }

    function _additem($args){

        $config              = $this->eb_config;
        $site                = $config['settings']['site'];
        $compatibilityLevel  = $config['settings']['compatibilityLevel'];
        $dev                 = $config[$site]['devId'];
        $app                 = $config[$site]['appId'];
        $cert                = $config[$site]['cert'];
        $token               = $config[$site]['authToken'];
        $location            = $config[$site]['gatewaySOAP'];
        $session             = new eBaySession($dev, $app, $cert);
        $session->token      = $token;
        $session->site       = 0;
        $session->location   = $location;

        try {

        $client                     = new eBaySOAP($session);
        $params['Version']          = $compatibilityLevel;
        $params['WarningLevel']     = 'High';
        $params['Action']           = $args['Action'];
        
        $params['Item']['Title']            = $args['Title'];
        $params['Item']['Description']      = $args['Description'];
        $params['Item']['PrimaryCategory']['CategoryID']    = $args['CategoryID'];
        $params['Item']['StartPrice']                       = $args['StartPrice'];
        $params['Item']['ConditionID']                      = $args['ConditionID'];
        $params['Item']['CategoryMappingAllowed']           = true;
        $params['Item']['Country']                          = $args['Country'];
        $params['Item']['Currency']                         = $args['Currency'];
        $params['Item']['DispatchTimeMax']                  = $args['DispatchTimeMax'];
        $params['Item']['ListingDuration']                  = $args['ListingDuration'];
        $params['Item']['ListingType']                      = $args['ListingType'];
        $params['Item']['PayPalEmailAddress']               = $args['PayPalEmailAddress'];
        $params['Item']['PostalCode']                       = $args['PostalCode'];
        $params['Item']['Quantity']                         = $args['Quantity'];

        if(count($args['PaymentMethods']) > 1){
            foreach($args['PaymentMethods'] as $valPayments){
                $params['Item']['PaymentMethods'][]         = $valPayments['PaymentMethods'];
            }
        }else{
            $params['Item']['PaymentMethods']               = $args['PaymentMethods'];
        }

        if(count( $args['PictureURL']) > 1){
            foreach($args['PictureURL'] as $valPictureURL){
                $params['Item']['PictureDetails']['PictureURL'][]         = $valPictureURL;
            }
        }else{
            $params['Item']['PictureDetails']['PictureURL']     = $args['PictureURL'];
        }
        if(count($args['ItemSpecifics']) > 1){
            foreach($args['ItemSpecifics'] as $valuelist){
                $params['Item']['ItemSpecifics'][] = array('NameValueList' => array(
                                                                                     'Name' => $valuelist['NameValueList']['Name'],
                                                                                     'Value' => $valuelist['NameValueList']['Value']
                                                                                    )
                                                           );
            }
        }else{
            $params['Item']['ItemSpecifics']['NameValueList']['Name']   = $args['ItemSpecifics']['NameValueList']['Name'];
            $params['Item']['ItemSpecifics']['NameValueList']['Value']  = $args['ItemSpecifics']['NameValueList']['Value'];
        }
        
        $params['Item']['ReturnPolicy']['ReturnsAcceptedOption']    = $args['ReturnsAcceptedOption'];
        $params['Item']['ReturnPolicy']['RefundOption']             = $args['RefundOption'];
        $params['Item']['ReturnPolicy']['ReturnsWithinOption']      = $args['ReturnsWithinOption'];
        $params['Item']['ReturnPolicy']['Description']              = $args['Description'];
        $params['Item']['ReturnPolicy']['ShippingCostPaidByOption'] = $args['ShippingCostPaidByOption'];

        $params['Item']['ShippingDetails']['ShippingType']          = $args['ShippingType'];
        $params['Item']['ShippingDetails']['ShippingServiceOptions']['ShippingServicePriority'] = $args['ShippingServicePriority'];
        $params['Item']['ShippingDetails']['ShippingServiceOptions']['ShippingService']['ShippingServiceCost'] = $args['ShippingServiceCost'];
        $params['Item']['Site']   = $args['Site'];

         $results = $client->AddItem($params);
         if($results->Ack == 'Success'){
             $response['RespStatus'] = (string) $results->Status;
             $response['RespCode']   = 0;
             $response['RespMsg']    = $params['Action'] . ' Category Successfully ' ;
         }else{
             $response['RespStatus'] = (string) $results->Status;
             $response['RespCode']   = 1;
             $response['RespMsg']    = (string) $results->Errors->ShortMessage;
         }

        } catch (SOAPFault $f) {
          exit;
        }

        return $response;

    }

}

?>
