<?php
class Wholesalermodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function saveNewUserAccount() {
		
		$txt_email 	= trim( $_POST['txt_email'] );
		$login_pass = trim( $_POST['login_pass'] );
		$getsIP = get_client_ip_server();
		
		$sqlemail = "SELECT * FROM dev_retailerlist WHERE email = '".$txt_email."' ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sqlemail);
		
		if( !empty($txt_email) ) {
			if ($query->num_rows() <= 0) 
			{
				$dateFields = array(
                                                        'fname' => $_POST['txt_fname'],
                                                        'lname' => $_POST['txt_lname'],
                                                        'email' => $txt_email,
                                                        'phone' => $_POST['phone_no'],
                                                        'address' => $_POST['living_adres'],
                                                        'user_name' => $_POST['user_name'],							
                                                        'password' => md5($login_pass),
                                                        'ipaddress' => $getsIP,
                                                        'city' => $_POST['user_city'],
                                                        'state' => $_POST['user_state'],
                                                        'zipcode' => $_POST['user_zip_code'],
                                                        'ref1_company_name' => $_POST['ref1_comp_name'],
                                                        'ref1_contact_no' => $_POST['ref1_contact_no'],
                                                        'ref2_company_name' => $_POST['ref2_comp_name'],
                                                        'ref2_contact_no' => $_POST['ref2_contact_no'],
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
		//file_put_contents('test_query.txt', $sqlemail.'=count='.$query->num_rows().'=test='.$test);
	}
	
	///// count trial days
	function loginuser($user, $pass) 
	{	
		$loginreturn['error'] = '';
		
		if( !empty($user) && !empty($pass) ) 
		{
		$sql = "SELECT * FROM dev_retailerlist WHERE user_name = '".$user."' AND password = '".md5($pass)."' ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		
			$user = $query->result();
			if($query->num_rows())
			{
				$this->session->set_userdata('wh_user',$user[0]);
				$this->session->set_userdata('wh_user_id',$user[0]->id);
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
	
	///// get order list
	function getOrderList() {
		$date_from = $this->input->post('date_from', TRUE);
		$date_to = $this->input->post('date_to', TRUE);
		$ponumb_field = $this->input->post('ponumb_field', TRUE);
		$check_value = $this->input->post('check_value', TRUE);
		
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."order WHERE customerid = '".$this->session->userdata('wh_user_id')."' AND order_type = 'W'";
		
		if( !empty($date_from) && !empty($date_to) )
		{
			$sql .= " AND orderdate BETWEEN '".$date_from."' AND '".$date_to."'";
		}
		if( !empty($ponumb_field) )
		{
			$sql .= " AND po_number = '".$ponumb_field."'";
		}
		if( !empty($check_value) )
		{
			$sql .= " AND check_number = '".$check_value."'";
		}
		
		$sql .= " ORDER BY id DESC";
		
		//echo $sql;
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
	
	///// chnage account password
	function updateAccountPassword() {
		
		if( !empty($_POST['newlogin_pass']) ) 
		{				
				$data = array(
						   'password' => md5($_POST['newlogin_pass'])
						);
						
			$this->db->where('id', $this->session->userdata('wh_user_id') );
			$this->db->update($this->config->item('table_perfix')."retailerlist", $data);
		}
		
			//echo $this->db->last_query(); exit;
			
		return true;
	}
	
	////// save wholesaler info
	function getWholesalerInfo($view='') {
		$user_ID = $this->session->userdata('wh_user_id');
		
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."retailerlist WHERE id = ?";
		$query = $this->db->query($sql, array($user_ID));
		$row   = $query->row();
		
		if( empty($view) )
		{
			if( !empty($_POST['submit_btn']) ) {
				///// update customer info
				$data = array(
					   'company_name' => $_POST['company_name'],
					   'account_title' => $_POST['contact_title'],
					   'name' => $_POST['contact_name'],
					   'phone' => $_POST['phone_number'],
					   'ship_faxno' => $_POST['fax_number'],
					   'email' => $_POST['comp_email'],
					   'payment_terms' => $_POST['payment_terms'],
					   'billing_fname' => $_POST['bill_fname'],
					   'billing_lname' => $_POST['bill_lname'],
					   'billing_phone' => $_POST['bill_phone'],
					   'bill_faxno' => $_POST['bill_fax'],
					   'billing_email' => $_POST['bill_email'],					   
					   'billing_city' => $_POST['bill_city'],
					   'billing_province' => $_POST['bill_province'],
					   'billing_postcode' => $_POST['bill_postcode'],
					   'billing_country' => $_POST['bill_country'],
					   'billing_adres1' => $_POST['bill_adres'],				   			   
					   'fname' => $_POST['ship_fname'],
					   'lname' => $_POST['ship_lname'],					   
					   'city' => $_POST['ship_city'],
					   'province' => $_POST['ship_postcode'],
					   'postcode' => $_POST['ship_province'],
					   'country' => $_POST['ship_country'],					   
					   'address' => $_POST['ship_adres'],
					   'cc_number' => $_POST['card_number'],
					   'exp_month' => $_POST['cmb_month'],
					   'exp_year' => $_POST['cmb_year'],
					   'cvv_code' => $_POST['secret_code'],
					   'card_holder_name' => $_POST['card_holder_name'],
					    'cc_notes' => $_POST['cc_notes'],
						'cc_address' => $_POST['cc_address']
					);
					
					$this->db->where('id', $user_ID);
					$this->db->update($this->config->item('table_perfix')."retailerlist", $data);
			}
		}
			//echo $this->db->last_query(); exit;
			
		return $row;
	}
	
	///// save custom design request
	function saveCustomDesign() {
		$submit = '';
		
		if( isset($_POST['style_number']) && !empty($_POST['style_number']) )
		{	
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
	
	//// get custom design detail
	function getCustomDesignDetail($id) {
		
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."custom_designs WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$row   = $query->row();
		
		return $row;
		
	}
	
	////// managed virtual webstore
	function managedVirtualWebstore() {
		$user_ID = $this->session->userdata('wh_user_id');
		
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."retailerlist WHERE id = ?";
		$query = $this->db->query($sql, array($user_ID));
		$row   = $query->row();
		
		if( !empty($_POST['vitrual_wbstore']) ) {
				///// update customer info
				$data = array(
					   'company_name' => $_POST['comp_name'],
					   'phone' => $_POST['phone_number']
					);
					
					$this->db->where('id', $user_ID);
					$this->db->update($this->config->item('table_perfix')."retailerlist", $data);
			
			upload_file('comp_logo', 'wb', $ar=array('retailerlist', 'comp_logo', 'id', $user_ID));
		}
		
		return $row;
	}
}
?>