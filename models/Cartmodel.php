<?php 
class Cartmodel extends CI_Model {

 	function __construct(){
		parent::__construct();
 	}

	function addloosediamond($lot,$addoption,$price,$dsize){
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE lot = '".$lot."' AND sessionid = '".$this->session->session_data['session_id']."'";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();	

 		if(sizeof($isexist) < 1){ 
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',array('sessionid' => $this->session->session_data['session_id'],'lot' => $lot,'addoption' => $addoption,'price' => $price,'totalprice'=> $price,'dsize'=> $dsize));

	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';

 		return $return;
 	}

	function adddiamondpendant($lot,$settings,$addoption,$price,$dsize,$chsize){
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE lot = '".$lot."' AND sessionid = '".$this->session->session_data['session_id']."' AND pendantsetting = '".$settings."'";
		$result = 	$this->db->query($qry);
		$isexist = $result->result_array();	

		if(sizeof($isexist) < 1){ 
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',array('sessionid' => $this->session->session_data['session_id'],'lot'=> $lot,'pendantsetting' => $settings,'addoption' => $addoption,'price'=> $price,'totalprice'=> $price,'dsize'=> $dsize,'chain_size'=> $chsize));
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
		}
 		else $return = 'exist';

 		return $return;
 	}

	/* get diamond detail */
	function getrapnet_diamond_detail($id) {
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."rapproduct WHERE lot = '".$id."' limit 1";
		$qry = 	$this->db->query($sql);
		$result = $qry->result_array();

		return $result;
	}

	function add3stonediamondpendant($lot,$sidestone1,$sidestone2,$settings,$addoption,$price,$size,$chain_size){
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE lot = '".$lot."' AND pendantsetting = '".$settings."' AND sidestone1 = '".$sidestone1."' AND sidestone2 = '".$sidestone2."' AND sessionid = '".$this->session->session_data['session_id']."'";
		$result = 	$this->db->query($qry);
		$isexist = $result->result_array();
		$vendorname = $this->session->userdata('vendorname');
		$vendorsname =  ( !empty($vendorname) ? $vendorname : '' );

		if(sizeof($isexist) < 1){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',
				array(
				'sessionid' => $this->session->session_data['session_id'],
				'lot' 		=> $lot,
				'sidestone1'=> $sidestone1,
				'sidestone2'=> $sidestone2,
				'pendantsetting' => $settings,
				'addoption' => $addoption,
				'price'		=> $price,
				'totalprice'=> $price,
				'chain_size'=> $chain_size,
				'vendorname'=> $vendorsname,
				'dsize'=> $dsize
				)
			);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';

 		return $return;
 	}

 	function addring($lot,$stockno,$addoption,$price,$dsize,$item_metal,$sett_price){
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE lot = '".$lot."' AND ringsetting = '".$stockno."' AND sessionid = '".$this->session->session_data['session_id']."'";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
 		$vendorname = $this->session->userdata('vendorname');
		$vendor_name = ( !empty($vendorname) ? $vendorname : '' );

 		if(sizeof($isexist) < 1){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',
				array(
				'sessionid' => $this->session->session_data['session_id'],
				'lot' 		=> $lot,
				'ringsetting' => $stockno,
				'addoption' => $addoption,
				'price'		=> $price,
				'setting_price'	=> $sett_price,
				'totalprice'=> $price,
				'dsize'=> $dsize,
				'vendorname'=> $vendor_name,
				'item_metal'=> $item_metal
				)
			);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';

 		return $return;
 	}

	function addproduct($lot,$stockno,$addoption,$price,$dsize){
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE lot = '".$lot."' AND sessionid = '".$this->session->session_data['session_id']."'";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();

 		if(sizeof($isexist) < 1){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',
				array(
				'sessionid' => $this->session->session_data['session_id'],
				'lot' 		=> $lot,
				'addoption' => $addoption,
				'price'		=> $price,
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

	function addearring($lot,$stockno,$addoption,$price,$sidestone1,$sidestone2,$dsize){
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE lot = '".$lot."' AND sidestone1 = '".$sidestone1."' AND sidestone2 = '".$sidestone2."' AND earringsetting = '".$stockno."' AND sessionid = '".$this->session->session_data['session_id']."'";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();

		$uniqu_finding = $this->session->userdata('unique_finding');
		$unique_finding = ( !empty($uniqu_finding) ? $uniqu_finding : '' );
 		if(sizeof($isexist) < 1){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',
				array(
					'sessionid' => $this->session->session_data['session_id'],
					'lot' 		=> $lot,
					'earringsetting' => $stockno,
					'addoption' => $addoption,
					'price'		=> $price,
					'totalprice'=> $price,
					'sidestone1'=> $sidestone1,
					'sidestone2'=> $sidestone2,
					'dsize'=> $dsize,
					'earing_type'=> $unique_finding
				)
			);
	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';

 		return $return;
 	}

	function adddiamondstudearring($stockno,$addoption,$price,$dsize){
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE studearring = ".$stockno." AND sessionid = '".$this->session->session_data['session_id']."'";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();

 		if(sizeof($isexist) < 1){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',
				array(
					'sessionid' => $this->session->session_data['session_id'],
					'studearring' => $stockno,
					'addoption' => $addoption,
					'price'		=> $price,
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

	function add3stonering($lot, $sidestoen1, $sidestone2, $stockno,$addoption,$price,$dsize,$imgURL,$iteMetal,$chsize){
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE lot = '".$lot."' AND ringsetting = '".$stockno."' AND sidestone1 = '".$sidestoen1."' AND sidestone2 = '".$sidestone2."' AND sessionid = '".$this->session->session_data['session_id']."'";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();
		$build_3stone = $this->session->userdata('build_3stone');
		$stoneType = ( !empty($build_3stone) ? $build_3stone : '3D' );
		$vendorname = $this->session->userdata('vendorname');
		$vendorsname =  ( !empty($vendorname) ? $vendorname : '' );

 		if(sizeof($isexist) < 1){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',
				array(
				'sessionid' => $this->session->session_data['session_id'],
				'lot' 		=> $lot,
				'sidestone1'=> $sidestoen1,
				'sidestone2'=> $sidestone2,
				'ringsetting'=> $stockno,
				'addoption' => $addoption,
				'price'		=> $price,
				'totalprice'=> $price,
				'image_url'=> $imgURL,
				'item_metal'=> $iteMetal,
				'item_type'=> '',
				'chain_size'=> $chsize,
				'dsize'=> $dsize,
				'stone_type'=> $stoneType,
				'vendorname'=> $vendorsname,
				'default_metal'=> $this->session->userdata('default_metal'),
				'default_ringsize'=> $this->session->userdata('default_ringsize')
				)
			);
			$this->session->unset_userdata('build_3stone');
			$this->session->unset_userdata('default_metal');
			$this->session->unset_userdata('default_ringsize');

	 		if($isinsert) $return =  'success';
	 		else $return = 'fail';
 		}
 		else $return = 'exist';

 		return $return;
	}

 	function clearinvalidcart(){
 		//delete FROM `dev_cart` WHERE `sessionid` NOT IN (select session_id from dev_sessions)
 		//$this->db->delete
 	}

	function getitemsbysessionid($confirm=''){
		$sessionid = $this->session->session_data['session_id'];
		$item_status = ( !empty($confirm) ? 'B' : 'C' );

		$qry = "SELECT * FROM ".config_item('table_perfix')."cart WHERE sessionid = '".$sessionid."' AND buy_status = '{$item_status}'";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();

		return isset($result) ? $result : false;
	}

	function update_cart_status() {
		$sessionid = $this->session->session_data['session_id'];

		$this->db->query( "UPDATE dev_cart SET buy_status = 'B' WHERE sessionid = '{$sessionid}'" );
	}

	function updatecartbyid($id,$price,$qty,$dsize=''){ 
 		$this->db->where('id',$id);
		if( !empty($dsize) ) {
			$update_array = array('totalprice'=> $price, 'quantity' => $qty, 'dsize'=> $dsize);
		} else {
			$update_array = array('quantity' => $qty);
		}
		$success = $this->db->update($this->config->item('table_perfix').'cart',$update_array);
		if($success){
			return true;
		}else {
			return false;
		}
 	}

 	function deletcartitembyid($id){
		$qry = "DELETE FROM ".$this->config->item('table_perfix')."cart WHERE id = ".$id;
		$result = $this->db->query($qry);
		return $result;
 	}

	function addwatch($stockno,$addoption,$price,$dsize){
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE watchid = ".$stockno." AND sessionid = '".$this->session->session_data['session_id']."'";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();

 		if(sizeof($isexist) < 1){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',
				array(
				'sessionid' => $this->session->session_data['session_id'],
				'watchid' => $stockno,
				'addoption' => $addoption,
				'price'		=> $price,
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

	/** 23-09-2013**/
	function addjewellery($stockno,$addoption,$price,$dsize){
 		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE jeweleryid = ".$stockno." AND sessionid = '".$this->session->session_data['session_id']."'";
 		$result = 	$this->db->query($qry);
 		$isexist = $result->result_array();

 		if(sizeof($isexist) < 1){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'cart',
				array(
				'sessionid' => $this->session->session_data['session_id'],
				'jeweleryid' => $stockno,
				'addoption' => $addoption,
				'price'		=> $price,
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

}
?>