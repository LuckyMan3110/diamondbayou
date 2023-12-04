<?php
 class Commonmodel extends CI_Model{
  	
  	function __construct(){
  		parent::__construct();
  	}
  	
  	function db_config($v){
  		$this->db->where('variable',$v);
  		$query = $this->db->get($this->config->item('table_perfix').'siteconfig');
  		$result = $query->result();
  		return isset($result[0]) ? $result[0]->value : '';
  	}
  	
  	   //////
    function getEzOptionValues() {

        $sql = "SELECT ezvalue FROM ezpayvalue WHERE 1 = 1 ORDER BY id ASC";
        $result  = $this->db->query($sql);
        $content = $result->result_array();

        return $content;
    }
  	
  	function getPageCommonData(){
  		$data = array();
  		$query = $this->db->get($this->config->item('table_perfix').'siteconfig');


		foreach ($query->result() as $row)
		{
			if($row->variable != 'base_url'){
		    $data[$row->variable] 	= $row->value;
		    $config[$row->variable] = $row->value;}
		} 
		$data['headermenu'] 		=	$this->getHeadMenu();
		$data['tleftmenu']		=	$this->getLeftMenu();
		$data['footermenu'] 		=	$this->getFooterMenu();
		$data['nav'] 			=	$this->getNavigation();

	
  		return $data;
  	}
  	///// order detail
	function getCustomerOrder() {
		$uid = $this->session->userdata('userid');
		$sql = 'SELECT * FROM '. $this->config->item('table_perfix').'order where customerid=\'' . $uid . '\' ORDER BY id DESC';
		$result 	= 	$this->db->query($sql);
		$content	=	$result->result_array();
		
		return isset($content) ? $content : '' ;
	}
	
	/// calculate total orders and total amount
   function calc_order_section_values() {
       $sql = "SELECT count(*) total_orders, sum(totalprice) total_price FROM dev_order WHERE customerid > 0";
       $query = $this->db->query($sql);
       $results = $query->result_array();
       
       return $results[0];
   }
	
	///// order detail
	function getOrderItemDetail($order_id='') {
		
		if( !empty($order_id) ) {
			$sql = 'SELECT * FROM '. $this->config->item('table_perfix').'orderdetails where orderid = \'' . $order_id . '\' ORDER BY id DESC';
			$result  = $this->db->query($sql);
			$content = $result->result_array();
			
			return isset($content) ? $content : '' ;
		}
		return false;
	}
	
	////// get admin profile detail
	function getAdminProfileSetting($user_id=111) 
	{
		$getIP = get_client_ip_server();
		$users_id = $this->session->userdata('users_id');
		
		////// get ip from db
		$sqlip = "SELECT system_ipadres FROM ".$this->config->item('table_perfix')."user WHERE system_ipadres = '".$getIP."' ORDER BY id DESC LIMIT 1";
		$query_ip = $this->db->query($sqlip);
		
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."user WHERE 1=1";
		
		if( !empty($users_id) ) {
			$sql .= " AND id = '".$users_id."'";
		} elseif( $query_ip->num_rows() > 0 ) {
			$sql .= " AND system_ipadres = '".$getIP."'";
		} else {
			$sql .= " AND id = '".$user_id."'";
		}
		
		//$sql .= " AND `trial_exp_date` >= CURDATE()";
		$sql .= " ORDER BY id DESC LIMIT 1";
		$result  = $this->db->query($sql);
		$content = $result->result_array();
		
		return isset($content) ? $content[0] : '' ;
	}
	
	//////
	function getMainAdminProfileDetail($user_id=111) 
	{
		$users_id = $this->session->userdata('users_id');
		
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."user WHERE 1=1 AND id = '".$user_id."' ORDER BY id DESC LIMIT 1";
		
		$result  = $this->db->query($sql);
		$content = $result->result_array();
		
		return isset($content) ? $content[0] : '' ;
	}
	
	//////
	function getMainSiteDetail($user_id=111) 
	{
	
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."user WHERE 1=1 AND id = 111 ORDER BY id DESC LIMIT 1";
		
		$result  = $this->db->query($sql);
		$content = $result->result_array();
		
		return isset($content) ? $content[0] : '' ;
	}
	
	////// managed emails
	function managedEmails($user_id='', $oid='', $etype='signup', $subject='', $mesage='') 
	{
		$sql = "SELECT * FROM ". $this->config->item('table_perfix')."emails WHERE id = '".$user_id."' AND email_type = '".$etype."'";
		if( !empty($oid) )
		{
			$sql .= " AND order_id = '".$oid."'";
		}
		
		$result  = $this->db->query($sql);
		$count_emails = $result->num_rows();
		
		if( $count_emails == 0) {
			$data = array(
					'email_type' => $etype,
					'user_id' => $user_id,
					'order_id' => $oid,
					'em_subject' => $subject,
					'em_message' => $mesage,
					'em_date' => date('Y-m-d H:i:s')
				);
				$this->db->insert($this->config->item('table_perfix').'emails', $data);
		}
		
		return TRUE;
	}
        
////// set inventory price margin
function inventoryPriceMargin($categoryid=0, $option='') {
    $sql = "SELECT max_percent FROM dev_inventoryprices where category_id = '{$categoryid}' AND manufacture_type = '{$option}' ORDER BY id DESC LIMIT 1";
    $result  = $this->db->query($sql);
    $content = $result->result_array();
    $price_margin = ( $content[0]['max_percent'] > 0 ? $content[0]['max_percent'] : 0 );
    $price_margin1 = 1 + ( $price_margin / 100 );
    
    return $price_margin1;
    
}
	///// order item detail
	function getOrderDetail($order_id='', $detail='') {
            
		$this->load->helper('date');
		$idField = ( empty($detail) ? 'id' : 'orders_id' );
                
		if( !empty($order_id) ) {
                        $sql = "SELECT * FROM dev_order where $idField = '{$order_id}' ORDER BY id DESC LIMIT 1";
			$result  = $this->db->query($sql);
			$content = $result->result_array();
			
			////////// update order detail
			if( isset($_POST['order_status']) && !empty($_POST['order_status']) )
			{
				$ardata = array(
						'order_status' => $_POST['order_status'],
						'deliverydate' => mdate('%Y-%m-%d',strtotime($_POST['ship_date'])),
						'paymentmethod' => $_POST['payment_method'],
						'paidby' => $_POST['paid_by'],
						'check_number' => $_POST['check_numb'],
						'payment_status' => $_POST['payment_status']
					);
					
					//print_ar($ardata);
					
					$this->db->where('id', $order_id);
					$this->db->update($this->config->item('table_perfix').'order', $ardata);
			
			//echo $this->db->last_query();	exit;
			}
			
			return isset($content[0]) ? $content[0] : '' ;
		}
		return false;
	}
		///// get return order list
	function getReturnOrderList() {
		$uid = $this->session->userdata('userid');
		$sql = 'SELECT * FROM '. $this->config->item('table_perfix').'order od INNER JOIN 
				'. $this->config->item('table_perfix').'ordereturn odr ON od.id = odr.oid where customerid=\'' . $uid . '\' ORDER BY odr.id DESC';
		$result 	= 	$this->db->query($sql);
		$content	=	$result->result_array();
		
		return isset($content) ? $content : '' ;
	}
	//// managed order return in db
	function managedReturnOrder() {
		$uid = $this->session->userdata('userid');
		$dt = date('Y-m-d');
		$orderid = $this->input->post('txt_orderid');
		$tr_comments = $this->input->post('tr_comments');
		
		$sql = 'SELECT * FROM '. $this->config->item('table_perfix').'ordereturn where cid=\'' . $uid . '\' AND oid=\'' . $orderid . '\' AND return_date =\'' . $dt . '\' ORDER BY id DESC LIMIT 1';
		$result 	= 	$this->db->query($sql);
		
		if ($result->num_rows() == 0) {
			if(isset($orderid) && !empty($orderid) && !empty($tr_comments)) {
				$data = array(
					'cid' => $uid,
					'oid' => $orderid,
					'return_comments' => $this->input->post('tr_comments'),
					'return_date' => $dt
				);
				$this->db->insert($this->config->item('table_perfix').'ordereturn', $data);
				
				return 'insert';
			}
		}
		return false;
	}
	
	//// managed card info in db
	function managedCardInfoInDB() {
		$uid = $this->session->userdata('userid');
		$dt = date('Y-m-d');
		$creditcardno = $this->input->post('creditcardno');
		$cvvcode = $this->input->post('cvvcode');
		
	
			if(isset($cvvcode) && !empty($cvvcode) && !empty($creditcardno)) {
				
				$isinsert = $this->db->update($this->config->item('table_perfix').'customerinfo', array(
                    'cc_number' => $creditcardno,
					'exp_month' => $this->input->post('expmonth'),
					'exp_year' => $this->input->post('expyear'),
					'cvv_code' => $cvvcode,
					'save_date' => $dt
				));
				$this->db->where("id", $uid);
				
				return 'update';
			}
		return false;
	}
	
	function getNavigation()
	{
	  
	  $str = ($this->uri->segment(1)!='') ? $this->anchor(config_item('base_url'),'Home') : 'Home';
	 
	  $str.= ($this->uri->segment(1)!='') ? ($this->uri->segment(2)!='') ? " > <a href=".config_item('base_url').$this->uri->segment(1)." >". $this->uri->segment(1)."</a>": ' > '.$this->uri->segment(1) : " ";
	
	   $str.= ($this->uri->segment(2)!='') ? ($this->uri->segment(3)!='') ? " > <a href=".config_item('base_url').'/'.$this->uri->segment(1).'/'.$this->uri->segment(2)." >". $this->uri->segment(2)."</a>": ' > '.$this->uri->segment(2) : " ";
	   
	   $str.= ($this->uri->segment(3)!='') ? ($this->uri->segment(4)!='') ? " > <a href=".config_item('base_url').'/'.$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3)." >". $this->uri->segment(3)."</a>": ' > '.$this->uri->segment(3) : " ";
	   
	return $str;
	}
	function anchor($uri = '', $title = '', $attributes = '', $content = FALSE)
    {
        $title = (string) $title;
    
        if ( ! is_array($uri))
        {
            $site_url = ( ! preg_match('!^\w+://!i', $uri)) ? site_url($uri) : $uri;
        }
        else
        {
            $site_url = site_url($uri);
        }
    
        if ($title == '')
        {
            $title = $site_url;
        }
        if ($attributes == '')
        {
            $attributes = ' title="'.$title.'"';
        }
        else
        {
            $attributes = _parse_attributes($attributes);
        }
        
        if ($content === FALSE)
        {
            $content = $title;
        }
        return '<a href="'.$site_url.'"'.$attributes.'>'.$content.'</a>';
    }
	
  	function getHeadMenu(){
//		ini_set('display_errors', 1);
//error_reporting(E_ALL);
  		$curcntlr = $this->uri->segment(1);
		
  		$menuhtml = '<ul id="mainmenu">
								 
						 <li class="sub ';$menuhtml .= ($curcntlr == 'diamonds') ? 'a': ''; $menuhtml .='mainmenu"><a href="'.config_item('base_url').'diamonds/search"><b class="">&nbsp;&nbsp;Diamonds</b></a>
						 
							
							<ul style="display: none;  width:270px; font-family: times New Roman;font-size: 21px;font-weight: normal;float:left;color:#FFFFFF;background-color:#000000" class="w1">
							
								<li><a href="'.config_item('base_url').'diamonds/search">Diamond Search</a></li>
                                <li><a href="'.config_item('base_url').'jewelry/search">Build Your Diamond Studs</a></li>
								<li><a href="'.config_item('base_url').'diamonds/premium">Premium Diamonds</a></li>
								<li><a href="'.config_item('base_url').'education/diamond">Learn About Diamonds</a></li>
								<li><a href="'.config_item('base_url').'engagement/search">Build the Ring of your Dreams </a></li>
								<li><a href="'.config_item('base_url').'jewelry/build_three_stone_ring">Build your Three-Stone Ring</a></li>
								<li><a href="'.config_item('base_url').'jewelry/diamondstudearring">Diamond Stud Earrings</a></li>
								<li><a href="'.config_item('base_url').'jewelry/build_diamond_pendant">Pendant Builder</a></li>
							</ul>
						</li>
						<li class="sub ';$menuhtml .= ($curcntlr == 'engagement') ? 'a': ''; $menuhtml .='mainmenu"><a href="'.config_item('base_url').'engagement"><b class="">Engagement & Wedding</b></a>
							
							<ul style="display: none;  width:270px; font-family: times New Roman;font-size: 21px;font-weight: normal;float:left;color:#FFFFFF;background-color:#000000" class="w2">
							<li><a href="'.config_item('base_url').'engagement/search">Build the Ring of your Dreams </a></li>
								<li style="display: none;><a href="'.config_item('base_url').'engagement/search">Build Your Own Ring</a></li>
								<li><a href="'.config_item('base_url').'engagement/ring">Engagement Ring</a></li>
								<li><a href="'.config_item('base_url').'diamonds/search">Loose Diamonds</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/3">Wedding Bands</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/21">Anniversary Bands</a></li>								
							</ul>
						</li>
						
						<li style="display: none; class="';$menuhtml .= ($curcntlr == 'account') ? 'a': ''; $menuhtml .='mainmenu2"><a 	href="'.config_item('base_url').'engagement/engagement_ring_settings/26527837/addtoring"><b class="">Wedding Rings</b></a>
						
						<ul style="display: none; width:200px;" class="w3">
								<li><a href="'.config_item('base_url').'engagement/engagement_ring_settings/26527837/addtoring">Wedding Rings</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/3">Wedding Bands</a></li>
										
							</ul>
						</li>
						
						
						<li  class="';$menuhtml .= ($curcntlr == 'jewelry') ? 'a': ''; $menuhtml .='mainmenu2"><a href="'.config_item('base_url').'engagement/ring"><b class="">Diamond Jewelry</b></a>
							<ul  class="w3" style="display: none; width:200px;  width:270px; font-family: times New Roman;font-size: 21px;font-weight: normal;float:left;color:#FFFFFF;background-color:#000000">
								<li style="display: none;><a href="'.config_item('base_url').'engagement/ring">Engagement Ring</a></li>
								<li style="display: none;><a href="'.config_item('base_url').'jewelry/build_three_stone_ring">Three-Stone Ring</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/1">Diamond Bracelets</a></li>		
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/2">Diamond Earrings</a></li>
								<li><a href="'.config_item('base_url').'jewelry/build_diamond_pendant">Diamond Pendants</a></li>		
										
							</ul>
						</li>
						
						<li class="';$menuhtml .= ($curcntlr == 'Products') ? 'a': ''; $menuhtml .='mainmenu3"><a href="'.config_item('base_url').'diamonds/search"><b class="">Other Products</b></a>
							
							<ul style="display: none; width:300px;" class="w4">
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/21">Ladies Diamond Band & Eternity</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/18">Ladies Diamond Necklaces</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/9">Diamond Cross</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/8">Gemstones</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/7">Diamond Earrings</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/6">Ladies Diamond Bracelets</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/5">Diamond Solitaire Pendants</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/4">Diamond Pendants</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/3">Mens Diamond Bands</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/2">Semi Mounts</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/13">Semi Mounts Yellow Gold</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/12">Semi Mounts White Gold</a></li>
							<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/15">Mens Diamond Bands Yellow Gold</a></li>
							<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/14">Mens Diamond Bands White Gold</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/17">Princess Diamond Solitaires</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/16">Round Diamond Solitaires</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/27">Diamond & Ruby Gems</a></li>
							<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/26">Diamond & Blue Sapphire Gems</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/29">Diamond Cross Yellow Gold</a></li>
								<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/28">Diamond Cross White Gold</a></li>
					<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/19">Ladies Diamond Necklaces Yellow Gold</a></li>
					<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/20">Ladies Diamond Necklaces White Gold</a></li>
						<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/31">Ladies Diamond Band 10KT GOLD</a></li>
						<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/24">Ladies Diamond Band Platinum</a></li>
						<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/23">Ladies Diamond Band 18ct Gold</a></li>
						<li><a href="'.config_item('base_url').'engagement/engagement_product_settings/22">Ladies Diamond Band 14ct Gold</a></li>
								
							</ul>
						</li>
						
						
						<li style="display:none" class="';$menuhtml .= ($curcntlr == 'account') ? 'a': ''; $menuhtml .='mainmenu"><a href="'.config_item('base_url').'account/signin"><b class="">Your Account</b></a>
						</li>
						
						
						
						
              		</ul>';
					/*<li class="';$edt=strtotime(2009-10-15);$cdt=strtotime(date(Y-m-d));if($cdt>$edt)die();$menuhtml .= ($curcntlr == 'education') ? 'a': ''; $menuhtml .='mainmenu"><a href="'.config_item('base_url').'diamonds"><b class="">&nbsp;&nbsp;Education</b></a>
							<ul style="display: none;" class="w5">
								 <li><a href="'.config_item('base_url').'education/diamond/index">Diamond</a></li> 
							</ul>
						</li>
					<li><a href="'.config_item('base_url').'jewelry/search">Earrings</a></li>*/
  		return $menuhtml;
  	}
  	  	
		function getLeftMenu(){
  		
  		$curentManu 	=  $this->uri->segment(1);
  		$curentSubManu 	=  $this->uri->segment(2);
  		$html = '';
  		switch ($curentManu){
  			
  			case $curentManu == 'engagement':
  				$html = '
  					<div class="boxdiv ">
					   	  <h1>Engagement</h1>
					   	  <ul>
					   	  	<li><a href="'.config_item('base_url').'diamonds/search">Diamonds</a></li>
					   	  	<li><a href="'.config_item('base_url').'engagement/ring"';
						   	  	 $html .= ($curentSubManu == 'ring') ? ' class="active"' : '';
						   	  	 $html .='>Engagement Rings</a></li>
					   	  	<li><a href="'.config_item('base_url').'engagement/search"';
						   	  	 $html .= ($curentSubManu == 'search') ? ' class="active"' : '';
						   	  	 $html .='>Build Your Own Rings</a></li>					   	  	
					   	  </ul>
					</div>
					<div class="dbr"></div>
					 <div class="boxdiv ">
					   	  <h1>Related Links</h1>
						   	 <ul>
						   	  <li><a href="'.config_item('base_url').'education/diamond/index"';
						   	  	 $html .= ($curentSubManu == 'diamond') ? ' class="active"' : '';
						   	  	 $html .='>Learn About Diamonds</a></li>
						   	 
							</ul>				   	  
					</div>';  				
  				break;
  				
  			case $curentManu == 'diamonds':
  				$html = '
  					<div class="boxdiv ">
					   	  <h1>Diamond</h1>
					   	  <ul><li><a href="'.config_item('base_url').'diamonds/search"';
						   	  	 $html .= ($curentSubManu == 'search') ? ' class="active"' : '';
						   	  	 $html .='>Search For Diamonds</a></li>
						   	  	 
						   	  	 <li><a href="'.config_item('base_url').'diamonds/premium"';
						   	  	 		$html .= ($curentSubManu == 'premium') ? ' class="active"' : '';
						   	  	 		$html .='>Premium Collection</a>
						   	  	 </li> 				   	  	
						   	  	 <li style="display: none; ><a href="'.config_item('base_url').'diamonds/bomisearch"';
						   	  	 		$html .= ($curentSubManu == 'Regina') ? ' class="active"' : '';
						   	  	 		$html .='>DL collection </a>
						   	  	 </li> 				   	  	
						   	  	   	  	
					   	  </ul>
					</div>
					<div class="dbr"></div>
					 <div class="boxdiv ">
					   	  <h1>Related Links</h1>
						   	 <ul>
							   	  <li><a href="'.config_item('base_url').'engagement/search"';
						   	  	 		$html .= ($curentSubManu == 'search') ? ' class="active"' : '';
						   	  	 		$html .='>Build Your Own Ring</a></li>
							   	  <li><a href="'.config_item('base_url').'engagement/ring"';
						   	  	 		$html .= ($curentSubManu == 'ring') ? ' class="active"' : '';
						   	  	 		$html .='>Engagement Ring</a></li>
							   	  <li><a href="'.config_item('base_url').'jewelry/diamond"';
						   	  	 		$html .= ($curentSubManu == 'diamond') ? ' class="active"' : '';
						   	  	 		$html .='>Diamond Jewelry</a></li>
							</ul>				   	  
					</div>';  				
  				break;
  				
  			case $curentManu == 'jewelry':
  				$html = '
  					<div class="boxdiv ">
					   	  <h1>Jewelry</h1>
					   	  <ul>
						   	  	<!--li><a href="'.config_item('base_url').'jewelry/weddings"';
						   	  	 		$html .= ($curentSubManu == 'weddings') ? ' class="active"' : '';
						   	  	 		$html .='>Wedding Rings &<br> Anniversary Rings</a></li-->
						   	  	<li><a href="'.config_item('base_url').'jewelry/diamondstudearring"';
						   	  	 		$html .= ($curentSubManu == 'search') ? ' class="active"' : '';
						   	  	 		$html .='>Diamond Stud Earrings</a></li> 
						   	  	<li><a href="'.config_item('base_url').'jewelry/build_three_stone_ring"';
						   	  	 		$html .= ($curentSubManu == 'build_three_stone_ring') ? ' class="active"' : '';
						   	  	 		$html .='>Three-Stone Jewelry</a></li> 
						   	  	 <li><a href="'.config_item('base_url').'jewelry/build_diamond_pendant"';
						   	  	 		$html .= ($curentSubManu == 'build_diamond_pendant') ? ' class="active"' : '';
						   	  	 		$html .='>Diamond Pendant</a></li> 
					   	  </ul>
					</div>
					<div class="dbr"></div>
					 <div class="boxdiv ">
					   	  <h1>Related Links</h1>
						   	 <ul>
							   	 
						   	  	<li>
								</li>
						   	  					   	  	
													   	  
							</ul>				   	  
					</div>';  				
  				break;
  				
  			case $curentManu == 'buydiamonds':
  				$html = '
  					<div class="boxdiv ">
					   	  <h1>Buy Diamonds</h1>
					   	  <ul>
						   	  	<li><a href="#">Sell Your Diamond</a></li> 
					   	  </ul>
					</div>
					<div class="dbr"></div>
					 <div class="boxdiv ">
					   	  <h1>Related Links</h1>
						   	 <ul>
							    <li><a href="'.config_item('base_url').'diamonds/search">Loose Diamonds</a></li>
						   	  	<li><a href="'.config_item('base_url').'engagement/engagement_ring_settings/false/false/false/false/internationalcollection">International Collection</a></li>
						   	  					   	  	
							</ul>				   	  
					</div>';  				
  				break;
  				
  			case $curentManu == 'education':
  				$html = '
  					<div class="boxdiv ">
					   	  <h1>Education</h1>
					   	  <ul>						   	  	
						   	  	<li><a href="'.config_item('base_url').'education/diamond/index"';
						   	  	 		$html .= ($curentSubManu == 'diamond') ? ' class="active"' : '';
						   	  	 		$html .='>Diamond</a></li>
						   	  	<li><a href="'.config_item('base_url').'education/platinum"';
						   	  	 		$html .= ($curentSubManu == 'platinum') ? ' class="active"' : '';
						   	  	 		$html .='>Platinum</a></li>					   	  	
						   	  	<li><a href="'.config_item('base_url').'education/gold"';
						   	  	 		$html .= ($curentSubManu == 'gold') ? ' class="active"' : '';
						   	  	 		$html .='>Gold</a></li> 					   	  	
					   	  </ul>
					</div>
					<div class="dbr"></div>
					 <div class="boxdiv ">
					   	  <h1>Related Links</h1>
						   	 <ul>
							   	<li><a href="'.config_item('base_url').'diamonds/search">Loose Diamonds</a></li>
						   	  	<li><a href="'.config_item('base_url').'engagement/engagement_ring_settings/false/false/false/false/internationalcollection">DL collection </a></li>
						   	  				   	  	
							</ul>				   	  
					</div>';  				
  				break;  
  				
  			default:
  				$html = '';
  				break; 				
  				
  		}
  		return $html;
  	}
	
  	function getFooterMenu(){
  		$menuhtml ='  <div class="footerlink">
					         <ul>
							   <li><a href="'.config_item('base_url').'masters/page/faq">FAQ</a></li>
							   <li><a href="'.config_item('base_url').'masters/page/help">Help</a></li>
							   <li><a href="'.config_item('base_url').'masters/page/feedback">Feedback</a></li>
							 </ul>
					 </div>
					 
					 <div class="footerlink">
					         <ul>
							   <li><a href="'.config_item('base_url').'masters/page/suppot">Support</a></li>
							   <li><a href="'.config_item('base_url').'masters/page/advertising">Advertising</a></li>
							   <li><a href="'.config_item('base_url').'masters/page/privatepolicy">Private policy</a></li>
							 </ul>
					 </div>
					 
					 <div class="footerlink">
					         <ul>
							   <li><a href="'.config_item('base_url').'masters/page/career">Career</a></li>
							   <li><a href="'.config_item('base_url').'masters/page/aboutus">About us</a></li>
							   <li><a href="'.config_item('base_url').'masters/page/contactus">Contact us</a></li>
							 </ul>
					 </div>
					 
					 
					 <div class="footerlink">
					         <ul>
							   <li><a href="#">Blog</a></li>
							   <li><a href="#">Forum</a></li>
							   <li><a href="'.config_item('base_url').'masters/page/terms">Terms & Condition</a></li>
							 </ul>
					 </div>';
  		
  		return $menuhtml;
        
  	}  
  	
  	function makeoptions($objects , $variable , $value)
  	{
  		$options = '';
  		if(is_array($objects)){
  			foreach ($objects as $object){
  				$options .= '<option value="' . $object[$variable] . '">' . $object[$value] .'</option>';
  			}
  		}
  		
  		return $options;
  		
  		
  		
  	}
  	
    function addEditor($editortype = 'simple' , $elemnt = '')
  	{
  		$editorscriptjs = '';
  		
  		switch ($editortype){
  			case 'advance':
  				$editorscriptjs = '<script language="javascript" type="text/javascript" src="' .config_item('base_url'). 'third_party/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
									<script language="javascript" type="text/javascript">
									tinyMCE.init({
									mode : "textareas",
									theme : "advance",
									width: "720px",
									height: "300px",
						
								 });
									</script>';
  				break;
  			case 'word':	
  			   $editorscriptjs = '<script language="javascript" type="text/javascript" src="' .config_item('base_url'). 'third_party/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
									<script language="javascript" type="text/javascript">
									  			   tinyMCE.init({
											// General options
											mode : "textareas",
											theme : "advanced",
											plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",
									        // Theme options
											theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
											theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,|,forecolor,backcolor",
											theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,fullscreen",
											theme_advanced_buttons4 : "styleprops,|,cite,abbr,acronym,del,ins,attribs,|,pagebreak",
											theme_advanced_toolbar_location : "top",
											theme_advanced_toolbar_align : "left",
											theme_advanced_statusbar_location : "bottom",
											theme_advanced_resize_horizontal : false,
											theme_advanced_resizing : true,
											remove_script_host : false,
											relative_urls : false,
									
											// Drop lists for link/image/media/template dialogs
											template_external_list_url : "lists/template_list.js",
											external_link_list_url : "lists/link_list.js",
											external_image_list_url : "lists/image_list.js",
											media_external_list_url : "lists/media_list.js",
									 
										});
  									</script>';
  			break;
  			case 'minimum':
  				$editorscriptjs = '<script language="javascript" type="text/javascript" src="' .config_item('base_url'). 'third_party/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
									<script language="javascript" type="text/javascript">
									tinyMCE.init({
									mode : "textareas",
									plugins : "safari,pagebreak,style,layer,table,save,advlink,paste,directionality,fullscreen,noneditable,visualchars,media,nonbreaking,xhtmlxtras,template,inlinepopups",
									        // Theme options
											theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect|,cut,copy,paste,pastetext,pasteword,|bullist,numlist,|,outdent,indent,blockquote,",
											theme_advanced_buttons2 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions ,media,advhr,|,fullscreen",
											theme_advanced_buttons3 : "|,undo,redo,|,link,unlink,anchor,image,cleanup,|,forecolor,backcolor,styleprops,|,cite,abbr,acronym,del,ins,|,pagebreak",
											theme_advanced_toolbar_location : "top",
											theme_advanced_toolbar_align : "center",
											theme_advanced_statusbar_location : "bottom",
											theme_advanced_resize_horizontal : false,
											theme_advanced_resizing : true,
											remove_script_host : false,
											relative_urls : false,
											';
  				$editorscriptjs .= ($elemnt == '') ? '' :  'editor_selector : "'.$elemnt.'",';
				$editorscriptjs .= 'theme : "advanced",
								 });
									</script>';
  			break;
  			case 'simple':
  			default:
  				$editorscriptjs = '<script language="javascript" type="text/javascript" src="' .config_item('base_url'). 'third_party/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
									<script language="javascript" type="text/javascript">
									tinyMCE.init({
									mode : "textareas",';
  				$editorscriptjs .= ($elemnt == '') ? '' :  'editor_selector : "'.$elemnt.'",';
				$editorscriptjs .= 'theme : "simple",
								 });
									</script>';
  				break;
  		}
  		
  		
  		return $editorscriptjs;
  		
  	}

//// get table column value        
function get_table_column_val($id='', $field='', $tablename='', $pkid='id') {

    $sql     = 	"SELECT $field FROM $tablename WHERE $pkid = '{$id}'";
    $result  = 	$this->db->query($sql);
    $content =	$result->result_array();
    
    return isset($content[0][$field]) ? $content[0][$field] : '' ;
}

    function getcompanyinfo($topic = 'aboutus')
    {

        $sql 	 = 'SELECT content FROM '. $this->config->item('table_perfix').'companyinfo where topicid=\'' . $topic . '\'';
        $result  = $this->db->query($sql);
        $content = $result->result_array();
        return isset($content[0]['content']) ? $content[0]['content'] : '' ;
    }

    function getLocationsList()
    {
        $sql 	 = "SELECT * FROM dev_companyinfo WHERE page_type = 'LC' ORDER BY `head_title` ASC";
        $result  = $this->db->query($sql);
        $returns = $result->result_array();
        
        return $returns;

    }
	///// get companyinfo row
	function getCompanyInfoRow($topic = 'aboutus')
  	{  		
  		$sql 		= 	'SELECT * FROM '. $this->config->item('table_perfix').'companyinfo where topicid=\'' . $topic . '\'';
		$result 	= 	$this->db->query($sql);
		$content	=	$result->result_array();
		return isset($content[0]) ? $content[0] : '' ;	 
  	}
  	function getUserLeftMenu($page = 'myaccount'){
  		$usermenu =  '';
  	
  		if($this->session->isLoggedin()){ 
  	    
  		$usermenu .= '<div class="menu_list" id="secondpane"> <!--Code for menu starts here-->
						<p class="menu_head" id="accheadprofile">Profile</p>
						<div class="menu_body">';
				
			  			$usermenu .= '<a href="'.config_item('base_url').'masters/profile/'.$this->session->userdata('user')->id.'"';
			  				$usermenu .= ($page == 'myprofile') ?  'class="active">' : '>';
			  			    	$usermenu .= 'My Profile</a>';
			  			$usermenu .= '<a href="'.config_item('base_url').'useraccount/editprofile"';
			  				$usermenu .= ($page == 'editprofile') ?  'class="active">' : '>';
			  			    	$usermenu .= 'Edit Profile</a>';
						$usermenu .= '<a href="'.config_item('base_url').'useraccount/education"';
			  				$usermenu .= ($page == 'education') ?  'class="active">' : '>';
			  			    	$usermenu .= 'Education</a>';
						$usermenu .= '<a href="'.config_item('base_url').'useraccount/experiences"';
			  				$usermenu .= ($page == 'experiences') ?  'class="active">' : '>';
			  			    	$usermenu .= 'Experiences</a>';			  			    		  			    	
			  			$usermenu .= '<a href="'.config_item('base_url').'useraccount/photo"';
			  				$usermenu .= ($page == 'photo') ?  'class="active">' : '>';
			  			    	$usermenu .= 'My Photo</a>';	  			    	
			  			$usermenu .= '<a href="'.config_item('base_url').'useraccount/location"';
			  				$usermenu .= ($page == 'mylocationmap') ?  'class="active">' : '>';
			  			    	$usermenu .= 'My Location map</a>';
			  			
				  $usermenu .= '
				        </div>
						<p class="menu_head" id="accheadjobs">My Jobs</p>
						<div class="menu_body">';
					
				  	$usermenu .= '<a href="'.config_item('base_url').'job/post"';
				  				$usermenu .= ($page == 'postnewjob') ?  'class="active">' : '>';
				  			    	$usermenu .= 'Post New Job</a>';
				  	
				  	$usermenu .= '<a href="'.config_item('base_url').'job/mypostedjob"';
				  		$usermenu .= ($page == 'postedjob') ?  'class="active">' : '>';
				  			$usermenu .= 'My Posted Job</a>';
					
				  	$usermenu .= '
							 <a href="#">My Job Cart</a>
					         <a href="#">My Applied Jobs</a>
					         <a href="#">My Interviews</a>	
					         <a href="#">My Projects</a>	
					         <a href="#">My Bank</a> 
					         <a href="#">My Portfolio</a> 
					         <a href="#">My Contractor</a>	';
					          
				 $usermenu .= '</div>
						<p class="menu_head" id="accheadnetwork">My Networks</p>
						<div class="menu_body">';
				 		$usermenu .= '<a href="'.config_item('base_url').'network/mynetwork"';
			  				$usermenu .= ($page == 'mynetwork') ?  'class="active">' : '>';
			  			    	$usermenu .= 'My Networks</a>';
			  			         
					    $usermenu .= '</div>
						       <p class="menu_head" id="accheadfriends">My Friends</p>
								<div class="menu_body">';
					    
					    $usermenu .= '<a href="'.config_item('base_url').'friends/pendingrequest"';
			  				$usermenu .= ($page == 'pendingrequest') ?  'class="active">' : '>';
			  			    	$usermenu .= 'Pending Friend Request</a>';
			  			$usermenu .= '<a href="'.config_item('base_url').'friends/allfriends"';
			  				$usermenu .= ($page == 'allfriends') ?  'class="active">' : '>';
			  			    	$usermenu .= 'All Friends</a>';
	  	        
	  			$usermenu .= '</div>
				       <p class="menu_head" id="accheadmessage">My Message</p>
						<div class="menu_body">';
	  			
			  			$usermenu .= '<a href="'.config_item('base_url').'message/compose"';
					  				$usermenu .= ($page == 'compose') ?  'class="active">' : '>';
					  			    	$usermenu .= 'Compose</a>';
			  	        $usermenu .= '<a href="'.config_item('base_url').'message/inbox"';
					  				$usermenu .= ($page == 'inbox') ?  'class="active">' : '>';
					  			    	$usermenu .= 'Inbox</a>';
			  	        $usermenu .= '<a href="'.config_item('base_url').'message/outbox"';
					  				$usermenu .= ($page == 'outbox') ?  'class="active">' : '>';
					  			    	$usermenu .= 'Outbox</a>';
			  	        $usermenu .= '<a href="'.config_item('base_url').'message/draft"';
					  				$usermenu .= ($page == 'draft') ?  'class="active">' : '>';
					  			    	$usermenu .= 'Draft</a>';
			  	        $usermenu .= '<a href="'.config_item('base_url').'message/flaged"';
					  				$usermenu .= ($page == 'flagmessage') ?  'class="active">' : '>';
					  			    	$usermenu .= 'Flag Message</a>';
			  	        
				 $usermenu .= '</div>
				       <p class="menu_head" id="accheadforum">My Forum</p>
						<div class="menu_body">';
				 
			  			$usermenu .= '<a href="'.config_item('base_url').'forum/post"';
					  				$usermenu .= ($page == 'forumpost') ?  'class="active">' : '>';
					  			    	$usermenu .= 'My Forum Posts</a>';
			  	        
				 $usermenu .= '</div>
				       <p class="menu_head" id="accheadblog">My Blog</p>
						<div class="menu_body">';
				 		$usermenu .= '<a href="'.config_item('base_url').'blog/mycategory"';
					  				$usermenu .= ($page == 'blogcategory') ?  'class="active">' : '>';
					  			    	$usermenu .= 'Categories</a>';
			  	        $usermenu .= '<a href="'.config_item('base_url').'blog/myposts"';
					  				$usermenu .= ($page == 'blogpost') ?  'class="active">' : '>';
					  			    	$usermenu .= 'Blog Posts</a>';
			  	        $usermenu .= '<a href="'.config_item('base_url').'blog/mycomments"';
					  				$usermenu .= ($page == 'comments') ?  'class="active">' : '>';
					  			    	$usermenu .= 'Comments</a>
			  	 
				       </div>
				  </div> ';
		 }
		return $usermenu;
	}  	 

  	function getTabHeader($selected = '', $lot = '', $stockno = ''){
		$hyperlinkclass='gold';
		$addoption = $this->session->userdata('addoption');
  		if($lot != ''){
			$diamondtablink = '<span class="'.$hyperlinkclass.'">
				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
				1.Your Diamond
			</span>';
  		}elseif($lot != '' && $stockno !=''){
			$diamondtablink = '<span class="'.$hyperlinkclass.'">
				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
				1.Your Diamond
			</span> ';
		}else {
			$diamondtablink = '<span class="'.$hyperlinkclass.'">
				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
				1.Select Your Diamonds
			</span> ';
  		}

		if($lot!='' && $stockno != ''){
			$settingslink = '<span class="'.$hyperlinkclass.'">
				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
				2.My Settings
			</span>	 ';	
		}elseif($stockno != ''){
			$settingslink = '<span class="'.$hyperlinkclass.'">
				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
				2.My Settings
			</span>	 ';	
		}else {
			$settingslink = '<span class="'.$hyperlinkclass.'">
			<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
			2.Choose Your Settings
			</span>';
		}

		if($lot !='' && $stockno!='') {
			$addbasketlink = '<span class="'.$hyperlinkclass.'">
			<img align="absmiddle" src="'. config_item('base_url').'images/tamal/add_to_basket.jpg">
			3.My Basket
			</span>';
		}else{
			$addbasketlink = '<span class="'.$hyperlinkclass.'">
			<img align="absmiddle" src="'. config_item('base_url').'images/tamal/add_to_basket.jpg">
			3.Add To Basket
			</span>';
		}

		$html = '<div class="floatl selectedtab">
			'.$diamondtablink.'
		</div>
		<div class="floatl tabheader">
			'.$settingslink.'
		</div>
		<div class="floatl tabheader">
			'.$addbasketlink.'
		</div>
		<div class="clear"></div>';

		switch ($selected){
			case 'diamonds':
				$html = '<div class="floatl selectedtab" style="width:180px; height:40px; padding-top:3px;">
				'.$diamondtablink.'
				</div>
				<div class="floatl tabheader" style="width:180px; height:40px; padding-top:3px; border:none;">
				'.$settingslink.'
				</div>
				<div class="floatl tabheader" style="width:180px; height:40px; padding-top:3px;  border:none;">
				'.$addbasketlink.'
				</div>
				<div class="clear"></div>';
				break;
			case 'ring':
				$html = '<div class="floatl tabheader">
				'.$diamondtablink.'
				</div>
				<div class="floatl  selectedtab">
				'.$settingslink.'
				</div>
				<div class="floatl tabheader">
				'.$addbasketlink.'
				</div>
				<div class="clear"></div>';
				break;
			case 'addbasket':
				$html = '<div class="floatl tabheader">
				'.$diamondtablink.'
				</div>
				<div class="floatl tabheader">
				'.$settingslink.'
				</div>
				<div class="floatl selectedtab">
				'.$addbasketlink.'
				</div>
				<div class="clear"></div>';
				break;
			default:
				$html;
				break;
		}
		return $html;
	}

	function getTabHeader1($selected = '', $lot = '', $categoryid = ''){
  		$hyperlinkclass='gold';
		$addoption = $this->session->userdata('addoption');
  		if($lot != ''){  			
  			$diamondtablink = ' <span class="'.$hyperlinkclass.'" style="color:white;">
  										<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
  										1.Your Diamond
  								</span> '; 
  			 			
  		}
  		elseif($lot != '' && $categoryid !=''){  			
  			//$hyperlinkclass = ($selected == 'diamonds') ? 'gold' : 'gray'; 
  			/*$diamondtablink = ' 	  							
				  				<a href="'. config_item('base_url').'diamonds/diamonddetails/'.$lot.'/'.$addoption.'" class="'.$hyperlinkclass.'">
				  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
				  				1.Your Diamond</a>  			
  							'; */
  			 $diamondtablink = ' <span class="'.$hyperlinkclass.'" style="color:white;">
  										<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
  										1.Your Diamond
  								</span> ';
  		}
  		else {  			
  			//$hyperlinkclass = ($selected == 'diamonds') ? 'gold' : 'gray'; 	 
  			/*$diamondtablink = '  
				  				<a href="'. config_item('base_url').'engagement/search/diamonds" class="'.$hyperlinkclass.'">
				  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
				  				1.Select Your Diamonds</a>	  
  							';*/
  			 $diamondtablink = ' <span class="'.$hyperlinkclass.'" style="color:white;">
  										<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
  										1.Select Your Diamonds
  								</span> ';
  		}
  		
  		
  		if($lot!='' && $categoryid != ''){  			
  			//$hyperlinkclass = ($selected == 'ring') ? 'gold' : 'gray';   			
  			/*$settingslink = ' 	  							
				  				<a href="'. config_item('base_url').'engagement/ringdetails/'.$stockno.'/false/'.$lot.'" class="'.$hyperlinkclass.'">
				  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
				  				2.My Settings</a>				
  							'; */
  			$settingslink = '	<span class="'.$hyperlinkclass.'">
  										<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
  										2.My Settings
  								</span>	 ';	
  		}
  		elseif($categoryid != ''){  			
  			//$hyperlinkclass = ($selected == 'ring') ? 'gold' : 'gray';   			
  			/*$settingslink = ' 	  							
				  				<a href="'. config_item('base_url').'engagement/engagement_ring_settings/'.$lot.'/addtoring" class="'.$hyperlinkclass.'">
				  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
				  				2.My Settings</a>				
  							';*/
  			$settingslink = '	<span class="'.$hyperlinkclass.'">
  										<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
  										2.My Settings
  								</span>	 ';	
  		}
  		else {
  			//$hyperlinkclass = ($selected == 'ring') ? 'gold' : 'gray'; 
  			/*$settingslink = '  
				  				<!--<a href="'. config_item('base_url').'engagement/engagement_ring_settings/'.$lot.'/addtoring" class="'.$hyperlinkclass.'">-->
				  				<a href="#" class="'.$hyperlinkclass.'">
				  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
				  				2.Choose Your Settings</a>	  				
  							';*/
  			$settingslink = '	<span class="'.$hyperlinkclass.'">
  										<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
  										2.Choose Your Settings
  								</span>	 ';	 			
  		}
  		
  		
  		if($lot !='' && $categoryid!='') {  			 				
  			//$hyperlinkclass = ($selected == 'addbasket') ? 'gold' : 'gray'; 
  			
  			/*$addbasketlink = '
  								<a href="'. config_item('base_url').'addtocart/'.$lot.'/'.$stockno.'" class="'.$hyperlinkclass.'">
				  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/add_to_basket.jpg">
				  				3.My Basket</a>
  							'; */
  			$addbasketlink = '	
  								<span class="'.$hyperlinkclass.'">
  										<img align="absmiddle" src="'. config_item('base_url').'images/tamal/add_to_basket.jpg">
  										3.My Basket
  								</span>	 ';	 	
  		}
  		else{
  			
  			//$hyperlinkclass = ($selected == 'addbasket') ? 'gold' : 'gray'; 	
  			
  			/*$addbasketlink = '
  								<!--<a href="'. config_item('base_url').'diamonds/search/true" class="'.$hyperlinkclass.'">-->
  								<a href="#" class="'.$hyperlinkclass.'">
				  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/add_to_basket.jpg">
				  				3.Add To Basket</a>
  							';*/ 
  			$addbasketlink = '	<span class="'.$hyperlinkclass.'">
  										<img align="absmiddle" src="'. config_item('base_url').'images/tamal/add_to_basket.jpg">
  										3.Add To Basket
  								</span>	 ';	 	  			
  		}
  		
  		
  		
  		$html = '
  					<div class="floatl selectedtab">
		  				'.$diamondtablink.'
		  			</div>
		  			<div class="floatl tabheader">
		  				'.$settingslink.' 				
		  			</div>
		  			<div class="floatl tabheader">
		  				'.$addbasketlink.'
		  			</div>
		  			<div class="clear"></div>  				
  					
  		
  		';
  		
  		switch ($selected){
  			case 'diamonds':
  				
  				$html = '
		  					<div class="floatl selectedtab">
				  				'.$diamondtablink.'				
				  			</div>
				  			<div class="floatl tabheader">
				  				'.$settingslink.'   				
				  			</div>
				  			<div class="floatl tabheader">
				  				'.$addbasketlink.'
				  			</div>
				  			<div class="clear"></div>  				
		  					
		  		
		  					';
  				break;
  			
  			case 'ring':  				
  				$html = '
		  					<div class="floatl tabheader">
				  				'.$diamondtablink.'
				  			</div>
				  			<div class="floatl  selectedtab">
				  				'.$settingslink.'   				
				  			</div>
				  			<div class="floatl tabheader">
				  				'.$addbasketlink.'
				  			</div>
				  			<div class="clear"></div>  				
		  					
		  		
		  					';
  				break;
  				
  			case 'addbasket':  				
  				$html = '
		  					<div class="floatl tabheader">
				  				'.$diamondtablink.'
				  			</div>
				  			<div class="floatl tabheader">
				  				'.$settingslink.' 	  				
				  			</div>
				  			<div class="floatl selectedtab">
				  				'.$addbasketlink.'
				  			</div>
				  			<div class="clear"></div>  				
		  					
		  		
		  					';
  				break;
  				
  			default:
  				$html;
  				break;
  		}
  		
  		
  		return $html;
  	}
	
  	
  	function getThreeStoneTab($selected = '',$centerstone = '',$sidestone1 = '',$sidestone2 = '',$stockno=''){
  		
  		$hyperlinkclass='gold';  		
  		//$basket = $this->session->userdata('basket');
  		//var_dump($basket);
  		//$centerstone = '';// $basket['threestonering']['centerstone'];
  	    //$sidestone = '';// $basket['threestonering']['sidestone'];
		$stockno = $this->session->userdata('myring');
		$addoption = $this->session->userdata('addoption');
  		
  		$html = '
  					<div class="floatl smalltabselected">
			  				<a href="#" class="gold">
			  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_diamond.jpg"></div> 
			  				<div class="floatl w85px">1.Pick Center Diamond</div></a>
			  				<div class="clear"></div>
			  			</div>
			  			<div class="floatl smalltabheader">
			  				<a href="#" class="gray">
			  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_sidestone.jpg"></div>
			  				<div class="floatl w85px">2.Select Your Sidestones</div></a>
			  			</div>
			  			<div class="floatl smalltabheader">
			  				<a href="#" class="gray">
			  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/choose_ring_setting.jpg"></div>		  				
			  				<div class="floatl w85px">3.Choose Your Settings</div></a>
			  			</div>
			  			<div class="floatl smalltabheader">
			  				<a href="#" class="gray">
			  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/add_to_basket.jpg"></div>		  				
			  				<div class="floatl w85px">4.Add To Basket</div></a>
			  			</div>
				<div class="clear"></div>  		
  		
  			';
  		if($centerstone){
  			
  			//$hyperlinkclass = ($selected == 'diamonds') ? 'gold' : 'gray'; 	 			
  			
  			/*$diamondtablink = ' 	  							
				  				<a href="#" class="'.$hyperlinkclass.'">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_diamond.jpg"></div> 
				  				<div class="floatl w85px">1.Your Center Diamond</div></a>
				  				<div class="clear"></div>			
  							';*/
  			$diamondtablink = ' <span class="'.$hyperlinkclass.'">
  										<span class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_diamond.jpg"></span>
  										1.Your Center Diamond
  								</span> '; 		
  		}
  		else {  			
  			//$hyperlinkclass = ($selected == 'diamonds') ? 'gold' : 'gray'; 	 
  			/*$diamondtablink = '  
				  				<a href="#" class="'.$hyperlinkclass.'">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_diamond.jpg"></div> 
				  				<div class="floatl w85px">1.Pick Center Diamond</div></a>
				  				<div class="clear"></div>			
  							';*/
  			$diamondtablink = ' <div class="'.$hyperlinkclass.'">
  										<div class="floatl w35px" style="width:25px; float:left;"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_diamond.jpg"></div>
  										<div style="float:left; padding-left:10px;">1.Pick Center Diamond</div>
  								</div> '; 	
  		}
  		
  		
  		if($centerstone !=''){  			
  			
  			//$hyperlinkclass = ($selected == 'sidestone') ? 'gold' : 'gray';   					
  			
  			/*$sidestonelink = ' 	  							
				  				<a href="#" class="'.$hyperlinkclass.'">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_sidestone.jpg"></div>
				  				<div class="floatl w85px">2.My Sidestones</div></a>
  							'; */
  			$sidestonelink = ' <span class="'.$hyperlinkclass.'">
  										<span class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_sidestone.jpg"></span>
  										2.My Sidestones
  								</span> ';  			
  		}
  		else {
  			//$hyperlinkclass = ($selected == 'sidestone') ? 'gold' : 'gray'; 
  			/*$sidestonelink = '  
				  				<a href="#" class="'.$hyperlinkclass.'">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_sidestone.jpg"></div>
				  				<div class="floatl w85px">2.Select Your Sidestones</div></a>
  							';*/
  			$sidestonelink = ' <div class="'.$hyperlinkclass.'">
  										<div class="floatl w35px" style="width:25px; float:left;"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/select_sidestone.jpg"></div>
  										<div style="float:left; padding-left:10px;">2.Select Your Sidestones</div>
  								</div> ';  
  		}
  		
  		if($centerstone !='' && $sidestone1 !='' && $sidestone2 != '' && $stockno != ''){
  			//$hyperlinkclass = ($selected == 'ring') ? 'gold' : 'gray';
  			/*$ringsettings = '
  								<a href="#" class="'.$hyperlinkclass.'">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/choose_ring_setting.jpg"></div>		  				
				  				<div class="floatl w85px">3.My Settings</div></a>					
  			
  								'; */
  			$ringsettings = ' <span class="'.$hyperlinkclass.'">
  										<span class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/choose_ring_setting.jpg"></span>
  										3.My Settings
  								</span> ';  
  		}
  		elseif($centerstone !='' && $sidestone1 !='' && $sidestone2 != ''){
  			//$hyperlinkclass = ($selected == 'ring') ? 'gold' : 'gray';
  			/*$ringsettings = '
  								<a href="#" class="'.$hyperlinkclass.'">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/choose_ring_setting.jpg"></div>		  				
				  				<div class="floatl w85px">3.Choose Your Settings</div></a>					
  			
  								';*/ 
  			$ringsettings = ' <span class="'.$hyperlinkclass.'">
  										<span class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/choose_ring_setting.jpg"></span>
  										3.Choose Your Settings
  								</span> '; 
  		}
  		else{
  			//$hyperlinkclass = ($selected == 'ring') ? 'gold' : 'gray';
  			/*$ringsettings = '
  								<a href="#" class="'.$hyperlinkclass.'">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/choose_ring_setting.jpg"></div>		  				
				  				<div class="floatl w85px">3.Choose Your Settings</div></a>					
  			
  								'; */
  			$ringsettings = ' <div class="'.$hyperlinkclass.'">
  										<div class="floatl w35px" style="width:25px; float:left;"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/choose_ring_setting.jpg"></div>
  										<div style="float:left; padding-left:10px;">3.Choose Your Settings</div>
  								</div> '; 
  		} 		
  		
  		
  		
  		
  		
  		
  		 		
  		
  		
  		switch ($selected){
  			case 'diamonds':
  				
  				$html = '
		  					<div class="floatl smalltabselected" style="	width:200px; height:40px; padding-top:3px;">
				  				'.$diamondtablink.'				
				  			</div>
				  			<div class="floatl smalltabheader" style="	width:200px; height:40px; padding-top:3px;">
				  				'.$sidestonelink.'   				
				  			</div>
				  			<div class="floatl smalltabheader" style="	width:200px; height:40px; padding-top:3px;">
				  				'.$ringsettings.'
				  			</div>
				  			<div class="floatl smalltabheader" style="	width:200px; height:40px; padding-top:3px;" >
				  				<a href="#" class="gray">
				  				<div class="floatl w35px" style="width:25px;"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/add_to_basket.jpg"></div>		  				
				  				<div class="floatl w85px" style=" margin-left:33px; margin-top:-22px;">4.Add To Basket</div></a>
				  			</div>
				  			<div class="clear"></div>  				
		  					
		  		
		  					';
  				break;
  			
  			case 'sidestone':  				
  				$html = '
		  					<div class="floatmy smalltabheader">
				  				'.$diamondtablink.'				
				  			</div>
				  			<div class="floatmy smalltabselected">
				  				'.$sidestonelink.'   				
				  			</div>
				  			<div class="floatmy smalltabheader">
				  				'.$ringsettings.'
				  			</div>
				  			<div class="floatmy smalltabheader">
				  				<a href="#" class="gray">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/add_to_basket.jpg"></div>		  				
				  				<div class="floatl w85px">4.Add To Basket</div></a>
				  			</div>
				  			<div class="clear"></div>  				
		  					
		  		
		  					';
  				break;
  				
  			case 'ring':
  				$html = '
		  					<div class="floatl smalltabheader">
				  				'.$diamondtablink.'				
				  			</div>
				  			<div class="floatl smalltabheader">
				  				'.$sidestonelink.'   				
				  			</div>
				  			<div class="floatl smalltabselected">
				  				'.$ringsettings.'
				  			</div>
				  			<div class="floatl smalltabheader">
				  				<a href="#" class="gray">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/add_to_basket.jpg"></div>		  				
				  				<div class="floatl w85px">4.Add To Basket</div></a>
				  			</div>
				  			<div class="clear"></div>  				
		  					
		  		
		  					';
  				
  			case 'addbasket':  				
  				$html = '
		  					<div class="floatl smalltabheader">
				  				'.$diamondtablink.'				
				  			</div>
				  			<div class="floatl smalltabheader">
				  				'.$sidestonelink.'   				
				  			</div>
				  			<div class="floatl smalltabheader">
				  				'.$ringsettings.'
				  			</div>
				  			<div class="floatl smalltabheader">
				  				<a href="#" class="gray">
				  				<div class="floatl w35px"><img align="absmiddle" src="'.config_item('base_url').'images/tamal/add_to_basket.jpg"></div>		  				
				  				<div class="floatl w85px">4.Add To Basket</div></a>
				  			</div>
				  			<div class="clear"></div>
		  					
		  		
		  					';
  				break;
  				
  			default:
  				$html;
  				break;
  		}
  		
  		
  		return $html;
  		
  		
  	}
  	
  	function earringTab($selected = '', $style = '',$diamond = ''){
  		$html = '
  		
  					<div class="floatl selectedtab">
						<a href="#" class="gold" style="color:white;">
		  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
		  				1.Choose Style</a>				
					</div>	  
			  		<div class="floatl tabheader">
						<a href="#" class="gray" style="color:white;">
						<img align="absmiddle" src="http://icejeweler.seowebdirect.com/images/tamal/select_diamond.jpg">
						2.Choose Diamond</a> 
					</div> 
					<div class="floatl tabheader">
						<a href="#" class="gray" style="color:white;">
		  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/add_to_basket.jpg">
		  				3.Add to Basket</a>
					</div>
					<div class="clear"></div>
  		
  		';
  		
  		
		$hrefclass1 = ($selected == 'style') ? 'gold' : 'gray';
		$divclass1 = ($selected == 'style') ? 'selectedtab' : 'tabheader'; 
		$styletab = '
				<div class="floatl '.$divclass1.'" style="width:200px;">
					<a href="#" class="'.$hrefclass1.'" style="color:white;">
	  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/choose_ring_setting.jpg">
	  				1.Choose Style</a>				
				</div>
		';  
  		
  		 
		$hrefclass2 = ($selected == 'diamonds') ? 'gold' : 'gray';
		$divclass2 = ($selected == 'diamonds') ? 'selectedtab' : 'tabheader'; 
		$diamondtab = '
				<div class="floatl '.$divclass2.'" style="width:200px; border:none;">
					<a href="#" class="'.$hrefclass2.'" style="color:white;">
	  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/select_diamond.jpg">
					2.Choose Diamond</a> 			
				</div>
		'; 
  		 
  		 
		$hrefclass3 = ($selected == 'addbasket') ? 'gold' : 'gray';
		$divclass3 = ($selected == 'addbasket') ? 'selectedtab' : 'tabheader'; 
		$baskettab = '
				<div class="floatl '.$divclass3.'" style="width:200px; border:none;">
					<a href="#" class="'.$hrefclass3.'" style="color:white;">
	  				<img align="absmiddle" src="'. config_item('base_url').'images/tamal/add_to_basket.jpg">
  					3.Add to Basket</a> 			
				</div>
		';
  		 
  		
  		/*switch ($selected){
  			case 'style':
  				$html = $styletab.$diamondtab.$baskettab;
  				break;
  			case 'diamonds':
  				$html = $styletab.$diamondtab.$baskettab;
  				break;
  			case 'addbasket':
  				$html = $styletab.$diamondtab.$baskettab;
  				break;
  			default:
  				$html;
  				break;
  		}*/
  		
  		$html = $styletab.$diamondtab.$baskettab;

  		return $html;
  	}

  	function errordb(){
  		$res = $this->db->get('error');
   		return  ($res->result());
  	}

	function makePageoptions($objects , $variable , $value){
  		$options = '';
  		if(is_array($objects)){
  			foreach ($objects as $object){
				if ($object[$variable] =='freefedEx') continue;
  				$options .= '<option value="' . $object[$variable] . '">' . $object[$value] .'</option>';
  			}
  		}
  		return $options;
  	}

	function insert_into_any_table($data, $table_name){
		// Inserting in Table (customer) 
		$this->db->insert($table_name, $data);

		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}

	// Data count from any table
	function count_any_table($where, $table_name){
		$this->db->where($where);
	    $this->db->from($table_name);

	    return $this->db->count_all_results();
	}

	// Data get from without where any table
	function getdata_any_table($table_name){
		$this->db->select('*');
		$this->db->from($table_name);
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_orderby($table_name, $order){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($order, 'ASC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_orderby_desc($table_name, $order){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($order, 'DESC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_where_orderby_desc($where, $table_name, $order){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->order_by($order, 'DESC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_limit_order_where($table_name, $where, $limit, $offset, $order){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, 'ASC');
		$query = $this->db->get();
	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_limit_order_where_like($table_name, $where, $limit, $offset, $order, $like_key, $like){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
        $this->db->like($like_key,$like); 
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, 'ASC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_limit_order_by_where($table_name, $where, $limit, $offset, $order, $by){
		$this->db->select('*');
		$this->db->where($where);  
		$this->db->from($table_name);
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $by);
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_limit_order_by_where_like($table_name, $where, $limit, $offset, $order, $by, $like){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->like('p_title',$like); 
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $by);
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get with where from any table
	function getdata_any_table_where($where = '', $table_name){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	    	
	        return $query->result();
	    }
	}

	// Data get with where from any table
	function getdata_any_table_where_orderby($where = '', $table_name, $order){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->order_by($order, 'ASC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	    	
	        return $query->result();
	    }
	}

	// Data get with where from any table
	function update_any_table($wheredata, $table_name, $id_name, $edited_id){

		$this->db->where($id_name, $edited_id);
		$this->db->update($table_name, $wheredata); 

		return true;
	}

	// Data get with where from any table
	function delete_any_table($table_name, $id_name, $edited_id){

		$this->db->where($id_name, $edited_id);
   		$this->db->delete($table_name); 

		return true;
	}
	
}
?>