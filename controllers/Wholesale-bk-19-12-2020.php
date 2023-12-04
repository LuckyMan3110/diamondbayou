<?php 
class Wholesale extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		check_whuser_login();
		
		$this->load->model('commonmodel');
		$this->load->model('user');
		$this->load->model('wholesalermodel', 'wholesale');
		$this->load->helper('wholesaler');
		$this->load->helper('date');
                $this->load->helper('ringsection');
                $this->load->helper('stullering');
                $this->load->model('davidsternmodel');
	}
	
	private function getCommonData($banner='')
	{
            $data = array();
            $data = $this->commonmodel->getPageCommonData();
            return $data;
	 
	}
	
	function output($layout = null , $data = array() , $isleft = true , $isright = true)
	{
		$data['loginlink'] = $this->user->loginhtml();
		$output = $this->load->view($this->config->item('template').'wsale_header' , $data , true);
	   	if($isleft)$output .= $this->load->view($this->config->item('template').'left' , $data , true);
		$output .= $layout;
		//if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
		$output .= $this->load->view($this->config->item('template').'wsale_footer', $data , true);
		$this->output->set_output($output);
	}
	
	function index()
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Jeweler Cart';
		$data['contact_title'] = getadmin_contact_info();
	    /*$output = $this->load->view('wholesaler/wholesaler_page' , $data , true);
		$this->output($output , $data);*/
		$this->load->view('wholesaler/wholesaler_page' , $data);
	}
	
    function signup_successfully()
    {
        $data = $this->getCommonData(); 
        $data['title'] = 'Welcome to Jeweler Cart';

        $output = $this->load->view('wholesaler/signup_successfully_view' , $data , true);
        $this->output($output , $data);	
    }
    
    function account_information()
    {
        $data = $this->getCommonData(); 
        $data['title'] = 'Jeweler Cart';
        $data['cust_info'] = $this->wholesale->getWholesalerInfo('view');
        $data['cc_info'] = $data['cust_info']->exp_month.'/'.$data['cust_info']->exp_year.' - '.$data['cust_info']->cvv_code;
        $data['contact_name'] = $data['cust_info']->fname.' '.$data['cust_info']->lname;
        $data['bill_contact'] = $data['cust_info']->billing_fname.' '.$data['cust_info']->billing_lname;

        $output = $this->load->view('wholesaler/account_info' , $data , true);
        $this->output($output , $data);	
    }
	
	function edit_account_info()
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Jeweler Cart';
		$cust_info = $this->wholesale->getWholesalerInfo();		
		$data['cust_info'] = $cust_info;
		
		$monthList = '';
		$yearList = '';
		for($m=1; $m<=12; $m++) 
		{
			$month = ( $m < 10 ? '0'.$m : $m );
			$monthList .= '<option value="'.$month.'" '.selectedOption($month, date('m')).'>'.$month.'</option>';
		}
		for($y=date('Y'); $y<=2030; $y++) 
		{
			$yearList .= '<option value="'.$y.'" '.selectedOption($y, date('Y')).'>'.$y.'</option>';
		}
		
		$data['monthList'] = $monthList;
		$data['yearList'] = $yearList;
		
		if( isset($_POST['submit_btn']) && !empty($_POST['submit_btn']) ) {
			header('Location:'.SITE_URL.'wholesale/account_information'); exit;
		}
		
	    $output = $this->load->view('wholesaler/edit_account_info' , $data , true);
		$this->output($output , $data);	
	}
	
	function shopping_cart()
	{
		$this->load->model('cartmodel');
		
		$data = $this->getCommonData();
		$data['title'] = 'Jeweler Cart';
		
		$allitems = $this->cartmodel->getitemsbysessionid(); 
		$data['mycartitems'] = $allitems;
		$data['contr_name'] = 'shbasket_wholesale'; //$this->router->fetch_class();
		
	    $output = $this->load->view('wholesaler/shopping_carts' , $data , true);
		$this->output($output , $data);	
	}
	
	function custom_design($msg='')
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Jeweler Cart';
		$data['action'] = htmlspecialchars(SITE_URL.'wholesale/submitCustomDesign');		
		$data['custDesign'] = ( !empty($msg) ? 'Your request has submitted successfully!<br>' : '' );
		
	    $output = $this->load->view('wholesaler/custom_design_request' , $data , true);
		$this->output($output , $data);	
	}
	
	//// submit custom design request
	function submitCustomDesign() 
	{	
		if(isset($_POST['submit_request']) && !empty($_POST['submit_request'])) 
		{
			$cid = $this->wholesale->saveCustomDesign(); ///// save custom design request
			$results = $this->wholesale->getCustomDesignDetail($cid); ///// get custom design detail
			
			$return = '';
			
			$to = getadmin_contact_info('email'); 
			//$to = "msafdar78@gmail.com";
			
			$subject = "Custom Design Rquests";
			$designPath = SITE_URL.'uploads/';
			$cs_design1 = $designPath.$results->design_img1;
			$cs_design2 = $designPath.$results->design_img2;
			$cs_design3 = $designPath.$results->design_img3;
				
			$message = '<html>
				<head></head>
				<body>
				<div>Hi</div><br>
					<table width="100%" border="1" cellspacing="2" cellpadding="10" style="border:1px solid #ccc; border-collapse:collapse; vertical-align:top;">
					  <tr>
						<td width="20%">Custom Request:</td>
						<td width="80%">'.$_POST['request_message'].'</td>
					  </tr>
					  <tr>
						<td>Unique Style #</td>
						<td>'.$_POST['style_number'].'</td>
					  </tr>
					  <tr>
						<td>Metal Rquested:</td>
						<td>'.$_POST['metal_requested'].'</td>
					  </tr>
					  <tr>
						<td>Finger Size:</td>
						<td>'.$_POST['finger_size'].'</td>
					  </tr>
					  <tr>
						<td>Contact Name:</td>
						<td>'.$_POST['contact_numb'].'</td>
					  </tr>
					  <tr>
						<td>Email Address:</td>
						<td>'.$_POST['contact_email'].'</td>
					  </tr>
					  <tr>
						<td>Phone Number:</td>
						<td>'.$_POST['contact_phone'].'</td>
					  </tr>';
				
				if($_FILES['file_upload1']['name'] && getimagesize($cs_design1) )
				{	  
					$message .= '<tr>
							<td>Design 1:</td>
							<td><div><a href="'.$cs_design1.'"><img src="'.$cs_design1.'" width="100" alt="Custom Design1" /></a><br></div></td>
						  </tr>';
				}
				if($_FILES['file_upload2']['name'] && getimagesize($cs_design2) )
				{	  
					$message .= '<tr>
							<td>Design 2:</td>
							<td><div><a href="'.$cs_design2.'"><img src="'.$cs_design2.'" width="100" alt="Custom Design2" /></a><br></div></td>
						  </tr>';
				}
				if($_FILES['file_upload3']['name'] && getimagesize($cs_design3) )
				{	  
					$message .= '<tr>
							<td>Design 3:</td>
							<td><div><a href="'.$cs_design3.'"><img src="'.$cs_design3.'" width="100" alt="Custom Design3" /></a></div></td>
						  </tr>';
				}
						
					$message .= '
					</table>
				</body>
				</html>';
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: '.$_POST['contact_numb'].'<'.$_POST['contact_email'].'>' . "\r\n";
			$headers .= 'Cc: msafdar78@gmail.com' . "\r\n";
			$reurn = 'true';
			
			//echo $message;exit;
			
			mail($to,$subject,$message,$headers);
		}
		
		redirect('wholesale/custom_design/true');
	}
	
	function wh_orders()
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Jeweler Cart';
		
		$data['date_from'] = $this->input->post('date_from', TRUE);
		$data['date_to'] = $this->input->post('date_to', TRUE);
		$data['ponumb_field'] = $this->input->post('ponumb_field', TRUE);
		$ordersList = $this->wholesale->getOrderList();
		
		$viewOrderList = '';
		
		if( count($ordersList) > 0 )
		{
			foreach($ordersList as $roworder)  //// print order list
			{
			$viewOrderList .= '<tr>
                    <td>'._df($roworder['orderdate']).'</td>
                    <td>'.$roworder['orders_id'].'</td>
                    <td>'.check_empty($roworder['po_number']).'</td>
                    <td>'.check_empty($roworder['invoice_no'], 'n/a').'</td>
                    <td>$'._nf($roworder['totalprice'],2).'</td>
                    <td>'.getOrdrStatus($roworder['order_status']).'</td>
                    <td>'._df($roworder['deliverydate']).'</td>
                  </tr>';
			}
		} 
		else 
		{
			$viewOrderList .= '<tr><td colspan="7"><h4 class="norecord">No Records Found!</h4></td></tr>';
		}
		$data['viewOrderList'] = $viewOrderList;
		
	    $output = $this->load->view('wholesaler/orders_page' , $data , true);
		$this->output($output , $data);	
	}
	
	function wh_invoices()
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Jeweler Cart';
		$data['date_from'] = $this->input->post('date_from', TRUE);
		$data['date_to'] = $this->input->post('date_to', TRUE);
		$pyment_terms = $this->session->userdata('pyment_terms');
		
		$ordersInvList = $this->wholesale->getOrderList();
		$viewInvoiceLIst = '';
		$grandTotal = 0;
		$amount_due = 0;
		
		if( count($ordersInvList) > 0 )
		{
			foreach($ordersInvList as $roworder)  //// print order list
			{
				$amountDue = $roworder['totalprice'] - $roworder['amount_paid'];
			$viewInvoiceLIst .= '<tr>
                    <td>'._df($roworder['orderdate']).'</td>
                    <td>'.$roworder['invoice_no'].'</td>
                    <td>'.check_empty($roworder['po_number']).'</td>
                    <td>'.$pyment_terms.'</td>
					<td>'._df($roworder['deliverydate']).'</td>
                    <td>$'._nf($roworder['totalprice'],2).'</td>
                    <td>$'._nf($amountDue,2).'</td>
                  </tr>';
				
				$grandTotal = $grandTotal + $roworder['totalprice'];
				$amount_due = $amount_due + $amountDue;
			}
			
			$viewInvoiceLIst .= '<tr>
                    <td colspan="5"><div class="setalign">Grand Total:</div></td>
                    <td>$'._nf($grandTotal,2).'</td>
                    <td>$'._nf($amount_due,2).'</td>
                  </tr>';
		} 
		else 
		{
			$viewInvoiceLIst .= '<tr><td colspan="7"><h4 class="norecord">No Records Found!</h4></td></tr>';
		}
		$data['viewInvoiceLIst'] = $viewInvoiceLIst;
		
	    $output = $this->load->view('wholesaler/invoices_page' , $data , true);
		$this->output($output , $data);	
	}
	
	function wh_payments()
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Jeweler Cart';
		
		$data['date_from'] = $this->input->post('date_from', TRUE);
		$data['date_to'] = $this->input->post('date_to', TRUE);
		$data['check_value'] = $this->input->post('check_value', TRUE);
		
		$ordersPmtList = $this->wholesale->getOrderList();
		$viewPaymtLIst = '';
		$pi = 1;
		
		if( count($ordersPmtList) > 0 )
		{
			foreach($ordersPmtList as $roworder)  //// print order list
			{
				
			$viewPaymtLIst .= '<tr>
                    <td>'._df($roworder['orderdate']).'</td>
                    <td>'.check_empty($roworder['paidby']).'</td>
                    <td>'.check_empty($roworder['check_number']).'</td>
                    <td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>'.getPaymntStatus($roworder['payment_status']).'</td>
                    <td>$'._nf($roworder['totalprice'],2).'</td>
					<td><a href="#javascript;" onClick="viewOrderDt('.$pi.')"><img src="'.WHSITE_IMGURL.'detail_icon.jpg" alt="detail_icon" /></a></td>
                  </tr>';
				  
			$viewPaymtLIst .= '<tr id="block_'.$pi.'" style="display:none;">
                    <td colspan="8">
                    	<table class="setsbTable">
                          <tr>
                            <td>Pmt. Date</td>
                            <td>Status</td>
                            <td>Amount</td>
                          </tr>
                          <tr>
                            <td>'._df($roworder['orderdate']).'</td>
                            <td>'.getPaymntStatus($roworder['payment_status']).'</td>
                            <td>$'._nf($roworder['totalprice'],2).'</td>
                          </tr>
                        </table>
                    </td>
                  </tr>';
			
			$pi++;
			}
		} 
		else 
		{
			$viewPaymtLIst .= '<tr><td colspan="8"><h4 class="norecord">No Records Found!</h4></td></tr>';
		}
		$data['viewPaymtLIst'] = $viewPaymtLIst;
		
	    $output = $this->load->view('wholesaler/payments_views' , $data , true);
		$this->output($output , $data);	
	}
	
	function change_password()
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Jeweler Cart';
		
		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
		$data['return_eror2'] = '';
		$data['action_link'] = htmlspecialchars(SITE_URL.'wholesale/change_password');
		$curr_pass 		= $this->input->post('curr_pass');
		$newlogin_pass	= $this->input->post('newlogin_pass');
		$confirm_pass 	= $this->input->post('confirm_pass');
				
		if( isset($curr_pass) && !empty($curr_pass) )
			{
				$loginreturn = $this->user->check_correctpass($curr_pass,'retailerlist','wh_user_id');
				
				if( !empty($curr_pass) ) {
					$this->form_validation->set_rules('curr_pass', 'Current Password', 'required');
					$this->form_validation->set_rules('newlogin_pass', 'New Password', 'required|min_length[5]|max_length[12]');
					$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
					
					if ($this->form_validation->run() == FALSE) {
						$data['return_eror2'] .= validation_errors();
					}
					if($loginreturn['error'] == 'error') {
						$data['return_eror2'] .= 'Plz enter the correct login password';
					}
					if($newlogin_pass != $confirm_pass) {
						$data['return_eror2'] .= 'Confirm password is not matched with New password';
					}
				}
				
				if( empty($data['return_eror2']) && !empty($newlogin_pass) ) {
					$data['return_eror2'] = 'Your Account password has updtatd successfully!';
					$this->wholesale->updateAccountPassword();
				}
			}
		
	    $output = $this->load->view('wholesaler/change_password' , $data , true);
		$this->output($output , $data);	
	}
	
	function virtual_webstore()
	{
		$data = $this->getCommonData(); 
		$data['title'] = 'Jeweler Cart';
		$rowinfo = $this->wholesale->managedVirtualWebstore();
		$data['comp_name'] 	  = check_post_field('comp_name', $rowinfo->company_name);
		$data['phone_number'] = check_post_field('phone_number', $rowinfo->phone);
		
	    $output = $this->load->view('wholesaler/virtual_website' , $data , true);
		$this->output($output , $data);	
	}
	
	function account_login($action_type='account')
	{
		$data = $this->getCommonData();
		$data['account_link'] = htmlspecialchars( SITE_URL.'wholesale/account_login/account' );
		$data['login_link']   = htmlspecialchars( SITE_URL.'wholesale/account_login/login' );
		$user = $this->input->post('user_name', TRUE);
		$pass = $this->input->post('login_pass', TRUE);
		$cpass = $this->input->post('login_cpass', TRUE);
		$submit_btn = $this->input->post('submit_btn', TRUE);
		$login_btn = $this->input->post('login_btn', TRUE);
		$data['account_eror'] = '';
				
		if($action_type == 'account') {
			if( !empty($submit_btn))
				if( $pass != $cpass ) 
				{
					$data['account_eror'] = 'Confirm password is not matched';	
				} else {
				
					$user_acount = $this->wholesale->saveNewUserAccount();
					$return_eror = '';
					if( $user_acount == 'fail') 
					{
						$data['account_eror'] = 'This email is already registered here!';
						
					} else {
                                                $this->account_email_sent($_POST);  //// sent email
						//$login_verify = $this->wholesale->loginuser($user, $pass);
                                                header('Location:'.SITE_URL.'wholesale/signup_successfully'); exit;
					}
				}
				$data['login_error'] = '';
		} else {
		  
		  if( !empty($login_btn))
			$login_verify = $this->wholesale->loginuser($user, $pass);
			$data['login_error'] = $login_verify['error'];
		}
		
		if( !empty($login_verify['login']) ) 
		{
			$this->load->model('cartmodel');
			$allitems = $this->cartmodel->getitemsbysessionid();
		
			if( count($allitems) > 0 ) {
				//header('Location:'.SITE_URL.'shbasket_wholesale/mybasket'); exit;
				header('Location:'.SITE_URL.'wholesale/account_information'); exit;
			}
			
			//header('Location:'.SITE_URL.'wholesale/account_information'); exit;
			header('Location:'.SITE_URL.'wholesale/signup_successfully'); exit;
		}	
		$data['logins_error'] = ( $action_type == 'logout' ? 'Logout Successfully!' : $data['login_error'] );
		$data['title'] = 'Jeweler Cart';
	    $output = $this->load->view('wholesaler/account_mgmt' , $data , true);
		$this->output($output , $data);	
	}
        
    function account_email_sent($posts=[]) {
        //$full_name = $posts['txt_fname'] . ' ' . $posts['txt_lname'];
        $message = '<html>
                    <head></head>
                    <body>
                    <div>Hi</div><br>
                    <table width="100%" border="1" cellspacing="2" cellpadding="10" style="border:1px solid #ccc; border-collapse:collapse; vertical-align:top;">
                      <tr>
                            <td width="20%">First Name:</td>
                            <td width="80%">'.$posts['txt_fname'].'</td>
                      </tr>
                      <tr>
                            <td>Last Name</td>
                            <td>'.$posts['txt_lname'].'</td>
                      </tr>
                      <tr>
                            <td>Phone No:</td>
                            <td>'.$posts['phone_no'].'</td>
                      </tr>
                      <tr>
                            <td>Living Address:</td>
                            <td>'.$posts['living_adres'].'</td>
                      </tr>
                      <tr>
                            <td>City:</td>
                            <td>'.$posts['user_city'].'</td>
                      </tr>
                      <tr>
                            <td>State:</td>
                            <td>'.$posts['user_state'].'</td>
                      </tr>
                      <tr>
                            <td>Zip Code:</td>
                            <td>'.$posts['user_zip_code'].'</td>
                      </tr>
                      <tr>
                            <td>Email Address:</td>
                            <td>'.$posts['txt_email'].'</td>
                      </tr>
                      <tr>
                            <td>Username:</td>
                            <td>'.$posts['user_name'].'</td>
                      </tr>
                      <tr>
                            <td><b>Reference 1</b></td>
                            <td></td>
                      </tr>
                      <tr>
                            <td>Company Name:</td>
                            <td>'.$posts['ref1_comp_name'].'</td>
                      </tr>
                      <tr>
                            <td>Contact No:</td>
                            <td>'.$posts['ref1_contact_no'].'</td>
                      </tr>
                      <tr>
                            <td><b>Reference 2</b></td>
                            <td></td>
                      </tr>
                      <tr>
                            <td>Company Name:</td>
                            <td>'.$posts['ref2_comp_name'].'</td>
                      </tr>
                      <tr>
                            <td>Contact No:</td>
                            <td>'.$posts['ref2_contact_no'].'</td>
                      </tr>';
						
            $message .= '</table></body></html>';
			
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: Heart and Diamonds Wholesaler'.'<'.$posts['txt_email'].'>' . "\r\n";
        $headers .= 'Bcc: msafdar78@gmail.com' . "\r\n";
        $headers .= 'Bcc: jewelercart@gmail.com' . "\r\n";
        
        $toEmail = 'sales@heartsanddiamonds.com';
        $subject = 'Wholesaler Account Information!';

        //echo $message;exit;

        mail($toEmail,$subject,$message,$headers);
    }
	
	function logout()
	{
		$this->session->unset_userdata('wh_user');
		$this->session->unset_userdata('wh_user_id');
				
		header('Location:'.SITE_URL.'wholesale/account_login/logout');
	}
}