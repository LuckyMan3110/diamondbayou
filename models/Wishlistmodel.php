<?php 
 class Wishlistmodel extends CI_Model {
 	
 	function __construct(){
 		parent::__construct();
 	}
 	
 	function addloosediamond($lot,$addoption,$price,$dsize,$wishlist=""){
 		
 		echo 'Addloosediamond Function = '.$price;
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist 
 				WHERE lot = ".$lot." AND userid = '".$this->session->userdata('user')->id."'
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();	
 		 		
 		if(sizeof($isexist) < 1){ 
 			
			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
	 										array(
	 												'userid' => $this->session->userdata('user')->id,
	 												'lot' 		=> $lot,
	 												'addoption' => $addoption,
	 												'price'		=> $price,
	 												'totalprice'=> $price,
													'url'=>$wishlist,
													'dsize'=> $dsize
													
	 											)	
	 		);
	 		 
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		
 		
 		return $return;
 	}
 	
 	function adddiamondpendant($lot,$settings,$addoption,$price,$dsize,$wishlist=""){
 		
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist 
 				WHERE lot = ".$lot." 
 				AND userid = '".$this->session->userdata('user')->id."' 
 				AND pendantsetting = ".$settings."
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();	
 		
 		if(sizeof($isexist) < 1){ 
 			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
 										array(
 												'userid' => $this->session->userdata('user')->id,
 												'lot' 		=> $lot,
 												'pendantsetting' => $settings,
 												'addoption' => $addoption,
 												'price'		=> $price,
												'url'=>$wishlist,
 												'totalprice'=> $price,
												'dsize'=> $dsize
 											)	
	 		);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		
 		
 		return $return;
 	}
 	
 	function add3stonediamondpendant($lot,$sidestone1,$sidestone2,$settings,$addoption,$price,$size,$wishlist=""){
 		
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist 
 				WHERE lot = ".$lot." 
 				AND pendantsetting = ".$settings."
 				and sidestone1 = ".$sidestone1."
 				and sidestone2 = ".$sidestone2."
 				AND userid = '".$this->session->userdata('user')->id."' 				
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
 		
 		if(sizeof($isexist) < 1){
 			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
 										array(
 												'userid' => $this->session->userdata('user')->id,
 												'lot' 		=> $lot,
 												'sidestone1'=> $sidestone1,
 												'sidestone2'=> $sidestone2,
 												'pendantsetting' => $settings,
 												'addoption' => $addoption,
 												'price'		=> $price,
 												'totalprice'=> $price,
												'url'=>$wishlist,
												'dsize'=> $dsize
 											)	
	 		);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		
 		return $return;
 	}
 	
 	function addring($lot,$stockno,$addoption,$price,$dsize,$wishlist=""){
 		
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist 
 				WHERE lot = ".$lot." 
 				AND ringsetting = ".$stockno." 				
 				AND userid = '".$this->session->userdata('user')->id."' 				
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
 		
 		if(sizeof($isexist) < 1){
 			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
 										array(
 												'userid' => $this->session->userdata('user')->id,
 												'lot' 		=> $lot,
 												'ringsetting' => $stockno,
 												'addoption' => $addoption,
 												'price'		=> $price,
 												'totalprice'=> $price,
												'url'=>$wishlist,
												'dsize'=> $dsize
 											)	
	 		);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		
 		return $return;
 	}
 	
	function addproduct($lot,$stockno,$addoption,$price,$dsize,$wishlist="", $qualitycategory){
 		
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist 
 				WHERE lot = '".$lot."' 
 				AND userid = '".$this->session->userdata('user')->id."' 				
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
 		$uid= $this->session->userdata('user')->id ;
	 if($uid=="")
		    $return ="login";
 	 else if(sizeof($isexist) < 1){
		    
 			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
 										array(
 												'userid' => $uid,
 												'lot' 		=> $lot,
 												'addoption' => $addoption,
 												'price'		=> $price,
 												'totalprice'=> $price,
												'url'=>$wishlist,
												'dsize'=> $dsize,
												'cateid'=> $qualitycategory
 											)	
	 		);
	 	 if($isinsert) $return =  'success';
		
	 	 else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		
 		return $return;
 	}
 	
	
 	function addearring($lot,$stockno,$addoption,$price,$sidestone1,$sidestone2,$dsize,$wishlist=""){
 		
 		 
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist 
 				WHERE lot = ".$lot." 
 				and sidestone1 = ".$sidestone1."
 				and sidestone2 = ".$sidestone2."
 				and earringsetting = ".$stockno."
 				AND userid = '".$this->session->userdata('user')->id."' 				
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
 		
 		if(sizeof($isexist) < 1){
 			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
 										array(
 												'userid' => $this->session->userdata('user')->id,
 												'lot' 		=> $lot,
 												'earringsetting' => $stockno,
 												'addoption' => $addoption,
 												'price'		=> $price,
 												'totalprice'=> $price,
 												'sidestone1'=> $sidestone1,
 												'sidestone2'=> $sidestone2,
												'url'=>$wishlist,
												'dsize'=> $dsize
 											)	
	 		);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		
 		return $return;
 	}
 	
 	function adddiamondstudearring($stockno,$addoption,$price,$dsize,$wishlist=""){
 		
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist  
 				WHERE studearring = ".$stockno."
 				AND userid = '".$this->session->userdata('user')->id."' 				
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
 		
 		if(sizeof($isexist) < 1){
 			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
 										array(
 												'userid' => $this->session->userdata('user')->id,
 												'studearring' => $stockno,
 												'addoption' => $addoption,
 												'price'		=> $price,
 												'totalprice'=> $price,
												'url'=>$wishlist,
												'dsize'=> $dsize
 											)	
	 		);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		
 		return $return;
	}
	
	function add3stonering($lot, $sidestoen1, $sidestone2, $stockno,$addoption,$price,$dsize,$wishlist=""){
		
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist 
 				WHERE lot = ".$lot." 
 				AND ringsetting = ".$stockno."
 				and sidestone1 = ".$sidestoen1."
 				and sidestone2 = ".$sidestone2."
 				AND userid = '".$this->session->userdata('user')->id."' 				
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
		
 		if(sizeof($isexist) < 1){
 			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
 										array(
 												'userid' => $this->session->userdata('user')->id,
 												'lot' 		=> $lot,
 												'sidestone1'=> $sidestoen1,
 												'sidestone2'=> $sidestone2,
 												'ringsetting'=> $stockno,
 												'addoption' => $addoption,
 												'price'		=> $price,
												'url'=>$wishlist,
 												'totalprice'=> $price,
												'dsize'=> $dsize
 											)	
	 		);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		return $return;
	}
 
 	function clearinvalidwishlist(){
 		//delete FROM `dev_wishlist` WHERE `userid` NOT IN (select session_id from dev_sessions)
 		//$this->db->delete
 	}
 	
 	function getitemsbyuserid($offset="",$per_pg=""){
 		
 		$userid = $this->session->userdata('user')->id;
 		
 		$qry = "SELECT *, DATE_FORMAT(updatedate, '%D %M %Y %H:%i') as insertdate
				FROM ".config_item('table_perfix')."wishlist
				WHERE userid = '".$userid."' LIMIT ".$offset.", ".$per_pg;
		
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		return isset($result) ? $result : false;
 	}
 	
 	function updatewishlistbyid($id,$price,$qty,$dsize){
 		$this->db->where('id',$id);
		$success = $this->db->update($this->config->item('table_perfix').'wishlist',
									array('totalprice'			=> $price,
										   'quantity'		=> $qty	,
										   'dsize'=> $dsize
									));
		if($success){
				return true;
			}else {
				return false;
			}
 	}
 	
 	function deletwishlistitembyid($id){
 		$qry = "DELETE FROM ".$this->config->item('table_perfix')."wishlist WHERE id = ".$id;
		$result = $this->db->query($qry);
		return $result;
 	}

	 function addwatch($stockno,$addoption,$price,$dsize,$wishlist=""){
 		
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."wishlist  
 				WHERE watchid = ".$stockno."
 				AND userid = '".$this->session->userdata('user')->id."' 				
 				";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
 		
 		if(sizeof($isexist) < 1){
 			$isinsert = $this->db->insert($this->config->item('table_perfix').'wishlist',
 										array(
 												'userid' => $this->session->userdata('user')->id,
 												'watchid' => $stockno,
 												'addoption' => $addoption,
 												'price'		=> $price,
 												'totalprice'=> $price,
												'url'=>$wishlist,
												'dsize'=> $dsize
 											)	
	 		);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';
 		
 		
 		return $return;
	}
	
	function getWishListRecord()
	{
		$userid = $this->session->userdata('user')->id;
		$query	=	"SELECT * FROM ".config_item('table_perfix')."wishlist WHERE userid = '".$userid."' ORDER BY id DESC";
		$return = 	$this->db->query($query);
		return $return->result_array();
	}
	function countItemsByUserId()
	{
		$userid = $this->session->userdata('user')->id;
		$query	=	"SELECT COUNT(*) as total FROM ".config_item('table_perfix')."wishlist WHERE userid = '".$userid."'";
		$return = 	$this->db->query($query);
		return $return->result_array();
	}
 	 
 }
 ?>