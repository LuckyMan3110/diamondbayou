<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Code Igniter
*/
class Apcache {

	var $iTtl = 600; // Time To Live
    var $bEnabled = false; // APC enabled?
 	
	function test() {
		echo 'welcome to APC cache!';	
	}
    // constructor
    function CacheAPC() {
        $this->bEnabled = extension_loaded('apc');
    }

    // get data from memory
    function getData($sKey) {
        $bRes = false;
        if(function_exists('apc_fetch')) {
			$vData = apc_fetch($sKey, $bRes);
			return ($bRes) ? $vData :NULL;
		}
		return false;
    }

    // save data to memory
    function setData($sKey, $vData) {
		if(function_exists('apc_store')) {
        	return apc_store($sKey, $vData, $this->iTtl);
		}
		return false;
    }

    // delete data from memory
    function delData($sKey) {
        return (apc_exists($sKey)) ? apc_delete($sKey) : true;
    }
}
?>