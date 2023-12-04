<?php
class Wholesalermodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function saveNewUserAccount() {
		$txt_email 	= trim( $_POST['txt_email'] );
		$login_pass = trim( $_POST['login_pass'] );
		$getsIP = get_client_ip_server();

		$sqlemail = "SELECT * FROM dev_retailerlist WHERE email = '".$txt_email."' ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sqlemail);
		if( !empty($txt_email) ) {
			if ($query->num_rows() <= 0) {
				$dateFields = array(
					'fname' => isset($_POST['newMemberParams_memberPersonalInfoParams_firstName'])?$_POST['newMemberParams_memberPersonalInfoParams_firstName']:'',
					'lname' => isset($_POST['newMemberParams_memberPersonalInfoParams_lastName'])?$_POST['newMemberParams_memberPersonalInfoParams_lastName']:'',
					'email' => isset($_POST['newMemberParams_emailAddress1'])?$_POST['newMemberParams_emailAddress1']:'',
					'phone' => isset($_POST['phoneNumberParams_domesticNumber'])?$_POST['phoneNumberParams_domesticNumber']:'',
					'address' => isset($_POST['street1'])?$_POST['street1']:'',
					'user_name' => isset($_POST['newMemberParams_userName'])?$_POST['newMemberParams_userName']:'',
					'username' => isset($_POST['newMemberParams_userName'])?$_POST['newMemberParams_userName']:'',
					'password' => md5($_POST['newMemberParams_password1']),
					'password_text' => $_POST['newMemberParams_password1'],
					'lang' => isset($_POST['lang'])?$_POST['lang']:'',
					'affiliate_name' => isset($_POST['name'])?$_POST['name']:'',
					'websiteUrl' => isset($_POST['websiteUrl_protocol'])?$_POST['websiteUrl_protocol']:''.isset($_POST['websiteUrl_address'])?$_POST['websiteUrl_address']:'',
					'country' => isset($_POST['country'])?$_POST['country']:'',
					'bankLocation' => isset($_POST['bankLocation'])?$_POST['bankLocation']:'',
					'currency' => isset($_POST['currency'])?$_POST['currency']:'',
					'timeZone' => isset($_POST['timeZone'])?$_POST['timeZone']:'',
					'street1' => isset($_POST['street1'])?$_POST['street1']:'',
					'street2' => isset($_POST['street2'])?$_POST['street2']:'',
					'city' => isset($_POST['city'])?$_POST['city']:'',
					'countrySubdivision' => isset($_POST['countrySubdivision'])?$_POST['countrySubdivision']:'',
					'postcode' => isset($_POST['postCode'])?$_POST['postCode']:'',
					'country_code' => isset($_POST['phoneNumberParams_country'])?$_POST['phoneNumberParams_country']:'',
					'phoneNumber' => isset($_POST['phoneNumberParams_domesticNumber'])?$_POST['phoneNumberParams_domesticNumber']:'',
					'shortPromo' => isset($_POST['publisherParams_shortPromo'])?$_POST['publisherParams_shortPromo']:'',
					'primaryPromotionalMethod' => isset($_POST['publisherParams_primaryPromotionalMethod'])?$_POST['publisherParams_primaryPromotionalMethod']:'',
					'secondaryPromotionalMethod' => '',
					'promoting_countries' => isset($_POST['publisherParams_countries'])?implode(" ",$_POST['publisherParams_countries']):'',
					'property_type' => '',
					'property_name' => '',
					'property_url' => '',
					'property_description' => '',
					'ipaddress' => $getsIP,
					'affiliate_url' => 'affiliate/ref/'.strtolower($_POST['newMemberParams_userName']),
					'save_date' => date('Y-m-d')
				);
				$isinsert = $this->db->insert('dev_retailerlist',$dateFields);
				return 'pass';
			} else {
				return 'fail';	
			}
		} else {
			return 'empty';
		}
	}

	function loginuser($user, $pass){
		$loginreturn['error'] = '';
		if( !empty($user) && !empty($pass) ) {
			$sql = "SELECT * FROM dev_retailerlist WHERE user_name = '".$user."' AND password = '".md5($pass)."' ORDER BY id DESC LIMIT 1";
			$query = $this->db->query($sql);
			$user = $query->result();
			if($query->num_rows()){
				$this->session->set_userdata('wh_user',$user[0]);
				$this->session->set_userdata('wh_user_id',$user[0]->id);
				$this->session->set_userdata('wh_user_url',strtolower($user[0]->fname));
				$this->session->set_userdata('pyment_terms',$user[0]->payment_terms);
				$loginreturn['login'] = 'true';
			} else {
				$this->session->set_userdata('user',$user);
				$this->session->set_userdata('loggedin','0');
				$this->session->set_userdata('usertype','guest');
				$loginreturn['error'] = '<b>User ID</b> / <b>Password</b> was incorrect<br>Unable to login';
				$loginreturn['login'] = '';
			}
		}
		return $loginreturn;
	}

	/* get order list */
	function getOrderList() {
		$date_from = $this->input->post('date_from', TRUE);
		$date_to = $this->input->post('date_to', TRUE);
		$ponumb_field = $this->input->post('ponumb_field', TRUE);
		$check_value = $this->input->post('check_value', TRUE);
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."order WHERE customerid = '".$this->session->userdata('wh_user_id')."' AND order_type = 'W'";
		if( !empty($date_from) && !empty($date_to) ){
			$sql .= " AND orderdate BETWEEN '".$date_from."' AND '".$date_to."'";
		}
		if( !empty($ponumb_field)){
			$sql .= " AND po_number = '".$ponumb_field."'";
		}
		if( !empty($check_value)){
			$sql .= " AND check_number = '".$check_value."'";
		}
		$sql .= " ORDER BY id DESC";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	/* Change account password */
	function updateAccountPassword() {
		if(!empty($_POST['newlogin_pass'])){				
			$data = array('password' => md5($_POST['newlogin_pass']));
			$this->db->where('id', $this->session->userdata('wh_user_id') );
			$this->db->update($this->config->item('table_perfix')."retailerlist", $data);
		}
		return true;
	}

	/* save wholesaler info */
	function getWholesalerInfo($view='') {
		$user_ID = $this->session->userdata('wh_user_id');
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."retailerlist WHERE id = ?";
		$query = $this->db->query($sql, array($user_ID));
		$row   = $query->row();
		if(empty($view)){
			if(isset($_POST['submit_btn']) &&!empty($_POST['submit_btn'])){
				$data = array(
					'company_name' => isset($_POST['company_name'])?$_POST['company_name']:'',
					'account_title' => isset($_POST['contact_title'])?$_POST['contact_title']:'',
					'name' => isset($_POST['contact_name'])?$_POST['contact_name']:'',
					'phone' => isset($_POST['phone_number'])?$_POST['phone_number']:'',
					'ship_faxno' => isset($_POST['fax_number'])?$_POST['fax_number']:'',
					'email' => isset($_POST['comp_email'])?$_POST['comp_email']:'',
					'username' => isset($_POST['user_name'])?$_POST['user_name']:'',
					'user_name' => isset($_POST['user_name'])?$_POST['user_name']:'',
					'password' => isset($_POST['password'])?md5($_POST['password']):'',
					'password_text' => isset($_POST['password'])?$_POST['password']:'',
					'payment_terms' => isset($_POST['payment_terms'])?$_POST['payment_terms']:'',
					'billing_fname' => isset($_POST['bill_fname'])?$_POST['bill_fname']:'',
					'billing_lname' => isset($_POST['bill_lname'])?$_POST['bill_lname']:'',
					'billing_phone' => isset($_POST['bill_phone'])?$_POST['bill_phone']:'',
					'bill_faxno' => isset($_POST['bill_fax'])?$_POST['bill_fax']:'',
					'billing_email' => isset($_POST['bill_email'])?$_POST['bill_email']:'',
					'billing_city' => isset($_POST['bill_city'])?$_POST['bill_city']:'',
					'billing_province' => isset($_POST['bill_province'])?$_POST['bill_province']:'',
					'billing_postcode' => isset($_POST['bill_postcode'])?$_POST['bill_postcode']:'',
					'billing_country' => isset($_POST['bill_country'])?$_POST['bill_country']:'',
					'billing_adres1' => isset($_POST['bill_adres'])?$_POST['bill_adres']:'',
					'fname' => isset($_POST['ship_fname'])?$_POST['ship_fname']:'',
					'lname' => isset($_POST['ship_lname'])?$_POST['ship_lname']:'',
					'city' => isset($_POST['ship_city'])?$_POST['ship_city']:'',
					'province' => isset($_POST['ship_postcode'])?$_POST['ship_postcode']:'',
					'postcode' => isset($_POST['ship_province'])?$_POST['ship_province']:'',
					'country' => isset($_POST['ship_country'])?$_POST['ship_country']:'',
					'address' => isset($_POST['ship_adres'])?$_POST['ship_adres']:'',
					'cc_number' => isset($_POST['card_number'])?$_POST['card_number']:'',
					'exp_month' => isset($_POST['cmb_month'])?$_POST['cmb_month']:'',
					'exp_year' => isset($_POST['cmb_year'])?$_POST['cmb_year']:'',
					'cvv_code' => isset($_POST['secret_code'])?$_POST['secret_code']:'',
					'card_holder_name' => isset($_POST['card_holder_name'])?$_POST['card_holder_name']:'',
					'cc_notes' => isset($_POST['cc_notes'])?$_POST['cc_notes']:'',
					'cc_address' => isset($_POST['cc_address'])?$_POST['cc_address']:''
				);
				$this->db->where('id', $user_ID);
				$this->db->update($this->config->item('table_perfix')."retailerlist", $data);
			}
		}
		return $row;
	}

	/* save custom design request */
	function saveCustomDesign() {
		$submit = '';
		if(isset($_POST['style_number']) && !empty($_POST['style_number'])){	
			$fieldsList = array(
				'user_id' => $this->session->userdata('wh_user_id'),
				'style_number' => $_POST['style_number'],
				'metal_requested' => $_POST['metal_requested'],
				'finger_size' => $_POST['finger_size'],
				'custom_desc' => $_POST['request_message'],
				'contact_name' => $_POST['contact_numb'],
				'contact_email' => $_POST['contact_email'],
				'contact_phone' => $_POST['contact_phone'],
				'request_date' => date('Y-m-d')
			);
			$this->db->insert('dev_custom_designs', $fieldsList);
			$cid = $this->db->insert_id();
			upload_file('file_upload1', 'cs1', array('custom_designs', 'design_img1', 'id', $cid));
			upload_file('file_upload2', 'cs2', array('custom_designs', 'design_img2', 'id', $cid));
			upload_file('file_upload3', 'cs3', array('custom_designs', 'design_img3', 'id', $cid));

			$submit = 'true';
		}
		return $cid;
	}

	/* get custom design detail */
	function getCustomDesignDetail($id) {
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."custom_designs WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$row   = $query->row();

		return $row;
	}

	/* managed virtual webstore */
	function managedVirtualWebstore() {
		$user_ID = $this->session->userdata('wh_user_id');
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."retailerlist WHERE id = ?";
		$query = $this->db->query($sql, array($user_ID));
		$row   = $query->row();
		if(!empty($_POST['vitrual_wbstore'])){
			$data = array(
				'company_name' => $_POST['comp_name'],
				'phone' => $_POST['phone_number'],
				'affiliate_url' => $_POST['affiliate_url'],
				'affiliate_commission' => $_POST['affiliate_commission']
			);
			$this->db->where('id', $user_ID);
			$this->db->update($this->config->item('table_perfix')."retailerlist", $data);
			upload_file('comp_logo', 'wb', $ar=array('retailerlist', 'comp_logo', 'id', $user_ID));
		}
		return $row;
	}
}
?>