<?php

	function featured_inlinks() {
		/*$featured_in = '<div class="featured_in"> 
			  <span class="setfeature">Featured in</span> 
			  <a href="#"><img src="'.SITE_WHURL.'fi_forbes.jpg" alt="" /></a> 
			  <a href="#"><img src="'.SITE_WHURL.'bn_fox.jpg" alt="" /></a> 
			  <a href="#"><img src="'.SITE_WHURL.'bn_thenewyork.jpg" alt="" /></a> 
			  <a href="#"><img src="'.SITE_WHURL.'bn_fast.jpg" alt="" /></a> 
			  <a href="#"><img src="'.SITE_WHURL.'bn_money.jpg" alt="" /></a> 
			</div>';*/
			
		$featured_in = '<div class="featured_in"> 
			  <span class="setfeature">Featured in</span> 
			  <a href="#"><img src="'.SITE_WHURL.'american_gem.jpg" alt="" /></a> 
			  <a href="#"><img src="'.SITE_WHURL.'gia_wh.jpg" alt="" /></a> 
			  <a href="#"><img src="'.SITE_WHURL.'jeweler_ic_wh.jpg" alt="" /></a>
			</div>';
			
			return $featured_in;
	}
	
	// Function to get the client ip address
	function get_client_ip_server() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'])
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']) && $_SERVER['HTTP_X_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']) && $_SERVER['HTTP_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']) && $_SERVER['HTTP_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'])
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
	 
		return $ipaddress;
	}
	
	///// get trial user data
	function getTrialUserDetail() {
		$CI = & get_instance();
		
		$uid = $CI->session->userdata('users_id');
		$sql = "SELECT * FROM dev_user WHERE id = '".$uid."'";
		$result = $CI->db->query($sql);
		$rs = $result->result_array();
		
		return $rs[0];
	}

?>