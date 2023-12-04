<?php
/*  � 2013 eBay Inc., All Rights Reserved */ 
/* Licensed under CDDL 1.0 -  http://opensource.org/licenses/cddl1.php */
 
   //show all errors
    error_reporting(E_ALL);

    
// these keys can be obtained by registering at 
http://developer.ebay.com
    
    
$production         = true;   // toggle to true if going against production
   
 $compatabilityLevel = 717;    
// eBay API version
    
   
 if ($production) {
        

//1 Main
$devID = 'c28f5152-60fb-45f2-b9e1-9df5f98d19c7';
        // these prod keys are different from sandbox keys
       
 $appID = 'LakishaI-ApiSet-PRD-2134e8f72-e7aa69e9';
        
$certID = 'PRD-134e8f72d358-606d-47a8-a729-72e6';
        //set the Server to use (Sandbox or Production)
       
 $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
 

       
//the token representing the eBay user to assign the call with
        
$userToken = 'AgAAAA**AQAAAA**aAAAAA**/raFWg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AFkoqhCpOAqQudj6x9nY+seQ**0iYEAA**AAMAAA**dHOpQDnhrfWgqByBXf6qo1XQsFiumkPnx+rCl8SVH4IB1J1MYE1rugJNPE4/v++d+X6JMO+gp423w+zMoOC8mkSQzD9kypRUOJitpCfxa+tZae77s9wRxDim0+znAz+jv5iOrkMUACtorGyGATMGH2z3YZYQorBREf6+CCNCg+jgu65BX0enMRgtnlty6ENNzvo/bClb9MlR+nMYWWLKgg35DmJUbCRr50LR+nGnpQlLC5ufqQa5sY9a+aNqUSFo2k6F9/t9mY2IHDYu8UZ2GWOX5lNvI0MqR7PcjbC5w8ZmGG3bnKkWR/towm5e3qFYrBhG3NSJ7Jc6rpH0BTQiZr6YCI66DV/jZvmXc9u4bUnmCBrmtvZv3kVueb/4cO3Civ0dtcyxYV+lCSNZyeuaIIT/09fTJatz8S+a6gZa5A0E+UxgWP3rMrg8TPqJYKaprY0ZshjI2VeOu19DPKvmUJVwpeHNAReSw09wds4ZrS8Z9j9yMBl6Dn+YUT4byM2k2olDU0qVfVPTAGRfGdhIgpk4g8+aTwJl3zu04RY3alEa5brg8XSJa4jkapeEetn5EFaU0LIba34b+INyY9CdXZBmHy82zjiL2FXKh0VWqCBnSC3u0gUAnf4SkDDAyL5SZ6Ee4Bm4Dpo7LQFxN2+HpHpmD4YPzX+yt6B0WqJzVJ9aQph4xvJlfJEccxTIEyx/7VRNRaQGaLhXy/nP8snMsyAfAAY2o0raGD86SQFrB2ZG/QezGpl+M796cN4WnA9B';          
	
$ebay_paypal_email="thegoldsource2009@gmail.com";
        
$shipping_salestax_and_jurisdiction="NY";
        
$location='Deer Park,New York';        
    } 

else {  
        // sandbox (test) environment
       
 $devID = 'xxxxxxxx';   // these SB keys are different from prod keys
       
 $appID = 'xxxxxxxxx';
       
 $certID = 'xxxxxxxxxxxxxx';
        //set the Server to use (Sandbox or Production)
        
$serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        
// this token is a long string - don't insert new lines - different from prod token
        $userToken = '*************';          
    }
    
    
?>