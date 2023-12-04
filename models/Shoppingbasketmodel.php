<?php
class Shoppingbasketmodel extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->model('adminmodel');
 	}

	function saveCustomerinfo($fname = '',$lname = '',$email = '',$phone = '',$address = '',$tablename='customerinfo'){
		$qry = "SELECT id FROM ".$this->config->item('table_perfix').$tablename." WHERE email = '".$email."'"; 
		$return = 	$this->db->query($qry);
		$result = $return->result_array();	
		$cudtomer =  isset($result[0]) ? $result[0] : false;
		if($cudtomer == false){
			$isinsert = $this->db->insert($this->config->item('table_perfix').$tablename,
			array(
			'fname'		=> $fname,
			'lname'		=> $lname,
			'email'		=> $email,
			'phone'		=> $phone,
			'address'	=> $address
			));
			$cudtomer['id'] = $this->db->insert_id();
		}
		return $cudtomer;
	}

	function saveOrder($customerid = '', $totalprice = '',$paymentmethod= '', $orderdate = '',$deliverydate = '', $order_type='R'){
		if($customerid == ''){
			return;
		}
		$qry = "SELECT id FROM ".$this->config->item('table_perfix')."order WHERE customerid = '".$customerid."' AND session = '".$this->session->session_data['session_id']."'"; 
		$return = 	$this->db->query($qry);
		$result = $return->result_array();
		$orderexist =  isset($result[0]) ? $result[0] : false;

		/* get maximum order id */
		$sql_oid = "SELECT max(id)+1 maxorder_id FROM `dev_order` ORDER BY id DESC LIMIT 1";
		$query_oid = $this->db->query($sql_oid);
		$result    = $query_oid->result_array();
		$seqorder_id = generate_order_id($result[0]['maxorder_id']);
		$inovice_numb = $result[0]['maxorder_id']+100;
		$ponumb = uniqueRandomeNumber();

		if($orderexist == false){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'order',
				array(
					'orders_id'		=> $seqorder_id,
					'customerid'	=> $customerid,
					'totalprice'	=> $totalprice,
					'paymentmethod'	=> $paymentmethod,
					'orderdate'		=> $orderdate,
					'order_type'	=> $order_type,
					'deliverydate'	=> $deliverydate,
					'po_number'		=> $ponumb,
					'invoice_no'	=> $inovice_numb,
					'session'	=> $this->session->session_data['session_id']
				)
			);
			$orderexist['id'] = $this->db->insert_id();
		}else{			
			$where = "customerid = ".$customerid." AND session = '".$this->session->session_data['session_id']."'";
			$value = array('totalprice' => $totalprice);
			$isinsert = $this->db->update($this->config->item('table_perfix').'order',$value,$where);
		}

		if($isinsert){ return $orderexist; } 
		else 'No order found';
	}

	function get_order_pk_id($o_id=0) {
        $sql = "SELECT id FROM dev_order WHERE orders_id = '{$o_id}'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $set_ship_method = $this->session->userdata('set_ship_method');
        $ship_options = shipping_option_price($set_ship_method); // ringsection helper
        //// update shipping mehtod and shipping price        
        $this->db->query("UPDATE dev_order set `shiping_method` = '{$ship_options['ship_method']}', `shiping_price` = '{$ship_options['ship_price']}' WHERE id = '{$result[0]['id']}' ");  

        return $result[0]['id'];
    }

	function CustomerByID($customerid){ 
		$sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'customerinfo where 1=1 and id='.$customerid;
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function saveShippinginfo($orderid = '',$customerid = '',$paymentmethod = '',$creditcardname = '',$creditcardno = '',$cvvcode = '',$cardexpirydate = '',$toname = '',$tophone = '',$tophonecodecountry = '',$toext = '',$tocompany ='',$toaddress = '',$tocity = '', $tostate = '', $tocountry = '',$topostcode = '',$referenceno = '',$giftcertificate = '',$howdidyouknow = '', $fname = '', $lname = '', $company = '', $adress = '', $city = '',  $state ='', $country = '', $postcode = '', $phonecodecountry = '', $phone = '',  $ext = '', $shippingmethod, $shippingamount,$issamedestination = 0,$isdeliverd = 0){
		$qry2 = "SELECT * FROM ".$this->config->item('table_perfix')."shippinginfo WHERE orderid = '".$orderid."'";
		$result2 = $this->db->query($qry2);
		$orderexist = $result2->result_array();

		if($orderexist > 0){
			$sql = "DELETE FROM ".$this->config->item('table_perfix')."shippinginfo WHERE orderid = '".$orderid."'";
			$result = $this->db->query($sql);
		}
		$isinsert = $this->db->insert($this->config->item('table_perfix').'shippinginfo',
			array(
				'orderid' 			=> $orderid,
				'customerid'		=> $customerid,
				'paymentmethod'		=> $paymentmethod,
				'creditcardname'	=> $creditcardname,
				'creditcardno'		=> $creditcardno,
				'cvvcode'			=> $cvvcode,
				'cardexpirydate'	=> $cardexpirydate,
				'shippingmethod'	=> $shippingmethod,
				'shipping_amount'	=> $shippingamount,
				'issamedestination'	=> $issamedestination,
				'toname'			=> $toname,
				'tophone'			=> $tophone,
				'tocountryphncode'	=> $tophonecodecountry,
				'tophnext'			=> $toext,
				'tocompany'			=> $tocompany,
				'toaddress'			=> $toaddress,
				'tocity'			=> $tocity, 
				'tostate'			=> $tostate, 
				'tocountry'			=> $tocountry, 
				'topostcode'		=> $topostcode, 
				'isdelivered'		=> $isdeliverd,
				'referencecode'		=> $referenceno,
				'giftcertificateno'	=> $giftcertificate,
				'howdidyouknow'		=> $howdidyouknow,
				'billfname' 		=> $fname,
				'billlname'			=> $lname,
				'billcompany'		=> $company,
				'billaddress'		=> $adress,
				'billcity'			=> $city,
				'billstate'			=> $state,
				'billcountry'		=> $country,
				'billpostcode'		=> $postcode,
				'billphone'			=> $phone,
				'billcountryphncode'=> $phonecodecountry,
				'billphnext'		=>  $ext
			)
		);
	}

	function saveOrderdetails($orderid = '', $isconfirmed = 0, $salestax=0){
		$qry2 = "SELECT * FROM ".$this->config->item('table_perfix')."orderdetails WHERE orderid = '".$orderid."'";
		$result2 = $this->db->query($qry2);
		$orderexist = $result2->result_array();

		if($orderexist > 0){
			$sql = "DELETE FROM ".$this->config->item('table_perfix')."orderdetails WHERE orderid = '".$orderid."'";
			$result = $this->db->query($sql);
		}

		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."cart WHERE sessionid = '".$this->session->session_data['session_id']."'";
		$result = $this->db->query($qry);
		$carts = $result->result_array();
		$paymentMethod = $this->session->userdata('payment_method');
		$procesing_fees = ( $paymentMethod == 'payment_bankwire' ? PROCESSING_FEE : 0 ); //// constants in constant.php
		$this->db->query("UPDATE dev_order SET processingfee = '{$procesing_fees}', salestax_percent = '{$salestax}' WHERE orders_id = '{$orderid}'"); 

		/* update order processing fee in order table */
		if(isset($cart['image_url']) && $cart['image_url']){
			$item_picture_url = $cart['image_url'];
		}else{
			$item_picture_url = 'N/A';
		}

		if(sizeof($carts)>0){
			foreach ($carts as $cart){
				$dm_size = ( is_null($cart['dsize']) ? 0 : $cart['dsize'] );
				$this->db->insert($this->config->item('table_perfix').'orderdetails',
					array(
						'card_id' 		=> $cart['id'],
						'stock_number' 	=> $cart['stock_number'],
						'table_name' 	=> $cart['table_name'],
						'item_title' 	=> $cart['item_title'],
						'item_url' 	    => $cart['item_url'],
						'item_picture_url' 	    => $item_picture_url,
						'vendor_number' => $cart['vendor_number'],
						'orderid' 		=> $orderid,
						'venderinfo'	=> $cart['venderinfo'],
						'ezpay'			=> $cart['ezpay'],
						'lot'			=> $cart['lot'],
						'sidestone1'	=> $cart['sidestone1'],
						'sidestone2'	=> $cart['sidestone2'],
						'ringsetting'	=> $cart['ringsetting'],
						'earringsetting'=> $cart['earringsetting'],
						'pendantsetting'=> $cart['pendantsetting'],
						'studearring'	=> $cart['studearring'],
						'watchid'	    => $cart['watchid'],
						'price'			=> $cart['price'],
						'orderdate'		=> date("Y-m-d"),
						'quantity'		=> $cart['quantity'],
						'totalprice'	=> $cart['totalprice'],
						'addoption'		=> $cart['addoption'],
						'dsize'		    => $dm_size,
						'isconfirmed'	=> $isconfirmed,
						'stone_type'	=> $cart['stone_type'],
						'default_metal'		=> $cart['default_metal'],
						'default_ringsize'	=> $cart['default_ringsize'],
						'engraved_text'		=> $cart['engraved_text'],
						'engraved_font'		=> $cart['engraved_font'],
						'vendorname'		=> $cart['vendorname'],
						'item_metal'		=> $cart['item_metal'],
						'item_type'		    => $cart['item_type'],
						'finish_level'		=> $cart['finish_level'],
						'metal_weight'		=> $cart['metal_weight'],
						'earing_type'	    => $cart['earing_type']
					)
				);
			}
		}
	}

	function confirmOrder($orderid, $value){
 		$where = "orderid = '".$orderid."'";
		$tablevalue = array('isconfirmed'=>$value);
		$t = $this->db->update($this->config->item('table_perfix').'orderdetails',$tablevalue,$where);		
		if($t){
			$where2 = "id = '".$orderid."'";
			$tablevalue2 = array('isconfirmed' => $value);
			$this->db->update($this->config->item('table_perfix').'order', $tablevalue2, $where2);
			return true;
		}else {
			return false;
		}
	}

	function sendConfirmEmail($orderid = '') {
		if($orderid!='') {
			$this->CI =& get_instance();
			$adminmodel = new Adminmodel();

			$data['order'] = $adminmodel->orderinfo($orderid); 
			$data['orderdetails'] = $adminmodel->orderdetails($orderid);
			$customerid = (isset($data['order']['0']['customerid'])) ? $data['order']['0']['customerid'] : '';
			$lot = (isset($data['order']['0']['lot'])) ? $data['order']['0']['lot'] : '';
			if($customerid!='') {
				$data['customer'] = $adminmodel->getCustomerByID($customerid);
				$customeremail = $data['customer'][0]['email'];
			}else{
				$data['customer']=array();
			}
			
			if($lot!=''){
				$data['product'] = $adminmodel->getProductByLot($lot);
			}else{
				$data['product']=array();
			}

			$data['shipping'] = $adminmodel->getShippingByID($orderid);
		    $output = $this->load->view('shoppingbasket/emailorder' , $data , true);
			$message='<meta http-equiv="Content-Type" content="text/html; charset="utf-8">
			<style>
			.w950px{width: 950px;}
			.w600px{width: 600px;}
			.w700px{width: 700px; }
			.w400px{width: 400px; }
			.w195px{width: 195px;}
			.pad10{padding: 10px 10px 0px 10px;}
			.pad5{padding:5px;}
			.pad05{padding:0px 5px 5px 5px;}
			.m10,.footer img{ margin: 10px 10px 0px 10px; }
			.mcontent{ min-height: 750px; }
			.floatr{float:right;}
			.floatl{float: left;}
			.clear{clear: both;}
			*{font-family:Verdana, Arial, Helvetica, sans-serif;color:#555555;font-size:12px;}
			.bodytop{background: url(http://www.intercarats.com/images/bodytop.jpg) no-repeat;width: 720px; height: 12px;}
			.bodymid{background: url(http://www.intercarats.com/images/bodymid.jpg) repeat-y; width: 710px; padding: 0px 5px;}
			.bodymid a{color:#006600;}
			.bodybottom{background:url(http://www.intercarats.com/images/bodybottom.jpg) no-repeat;width: 720px; height: 12px;}
			.dbr{height: 20px;}
			.txtcenter{text-align: center;} 
			.txtleft{text-align: left;} 
			.txtright{text-align: right;} 
			.w20px{width:20px;}
			.w25px{width:25px;}
			.w35px{width:35px;}
			.w50px{width:50px;}
			.w60px{width:60px;margin-left:5px;}
			.w80px{width:80px;}
			.w85px{width:85px;}
			.w100px{width:100px;}
			.w125px{width:125px;}
			.w150px{width:150px;}
			.w200px{width:200px;}
			.w350px{width:350px;}
			.inboxcolumn{width:240px;}
			.column{width:255px;}
			.center{margin: 0px auto; padding: 0px; }
			.m2{margin: 2px 2px 0px;}
			.m5{margin: 5px 5px 0px;}
			.m7{margin:7px 7px 0px;}
			.m10{margin:10px 10px 0px 10px;}
			.ml4{margin-left:4px;}
			.commonheader{background-color:#81ae33; font-weight:bold; height:20px; padding-left:5px; padding-top:6px;margin-top:5px;}
			</style>'.$output;
			$message = str_replace('<form method="POST" action="#">','',$message);
			$message = str_replace('</form>','',$message);

			$this->load->library('email');
			$config['protocol'] = 'mail';
			$config['wordwrap'] = false;
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";

			$this->email->initialize($config);
			$this->email->from('orders@godstonediamonds.com', 'Godstone Diamonds');
			$this->email->to('jewelercart@gmail.com');
			$this->email->cc($customeremail);
			$this->email->subject('New Order Information');
			$this->email->message($message);
			$this->email->send();
		}
	}

	function sendConfirmEmail2($orderid = '',$output2) {
		if($orderid!='') {
			$this->CI =& get_instance();
			$adminmodel = new Adminmodel();

			$data['order'] = $adminmodel->orderinfo($orderid); 
			$data['orderdetails'] = $adminmodel->orderdetails($orderid);
			$customerid = (isset($data['order']['0']['customerid'])) ? $data['order']['0']['customerid'] : '';
			$lot = (isset($data['order']['0']['lot'])) ? $data['order']['0']['lot'] : '';
			if($customerid!='') {
				$data['customer'] = $adminmodel->getCustomerByID($customerid);
				$customeremail = $data['customer'][0]['email'];
			}
			else
				$data['customer']=array();

			if($lot!='')
				$data['product'] = $adminmodel->getProductByLot($lot);
			else
				$data['product']=array();

			$data['shipping'] = $adminmodel->getShippingByID($orderid);
			$this->load->library('email');
			$config['protocol'] = 'mail';
			$config['wordwrap'] = false;
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['crlf'] = "\r\n";
			$config['newline'] = "\r\n";

			$this->email->initialize($config);
			$this->email->from('orders@godstonediamonds.com', 'Godstone Diamonds');
			$this->email->to('jewelercart@gmail.com');
			$this->email->cc($customeremail);
			$this->email->subject('New Order Information');
			$this->email->message($output2);
			$this->email->send();
		}
	}  

	function output($layout=''){
		$data['loginlink'] = $this->user->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);
		$output .= $layout;
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);

		return $output;
	}	

	function getShippingInfo($orderid, $customerid) {
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."shippinginfo WHERE orderid = '".$orderid."' AND customerid = '".$customerid."' order by id desc LIMIT 0, 1"; 
		$result = $this->db->query($qry);
		$shippinginfo = $result->result_array();

		return isset($shippinginfo[0]) ? $shippinginfo[0] : false;
	}

	function getDetailsByLot($lotid,$orderid) {
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."orderdetails WHERE orderid = '".$orderid."' AND lot = '".$lotid."'"; 
		$result = $this->db->query($qry);
		$shippinginfo = $result->result_array();

		return isset($shippinginfo[0]) ? $shippinginfo[0] : false;
	}

	function transactionmode(){
		$qry = "SELECT * FROM ".$this->config->item('table_perfix') . "transaction_mode";
		$result = $this->db->query($qry);
		$shippinginfo = $result->result_array();

		return isset($shippinginfo[0]) ? $shippinginfo[0]['webmode'] : false;
	}
}
?>