<?php
class Shbasket_Wholesale extends CI_Controller {
	function __construct() {
		parent::__construct();
		check_whuser_login();
		$this->load->helper('security');
		$this->load->helper('stullering');
		$this->load->model('Shoppingbasketmodel');
		$this->load->model('Transaction');
		$this->load->model('Adminmodel');
		$this->load->model('Commonmodel');
		$this->load->model('User');
		$this->load->model('Jewelleriesmodel');
		$this->load->model('Cartmodel');
	}

	function index(){
		$data = $this->getCommonData();
		$data['title'] = 'Engagement';
		$output = $this->load->view('engagement/index' , $data , true);
		$this->output($output , $data);
	}

	private function getCommonData($banner=''){
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();
		return $data;
	}

	function output($layout = null , $data = array() , $isleft = true , $isright = true){
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'wsale_header' , $data , true);
		if($isleft)$output .= $this->load->view($this->config->item('template').'left' , $data , true);
		$output .= $layout;
		if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
		$output .= $this->load->view($this->config->item('template').'wsale_footer', $data , true);
		$this->output->set_output($output);
	}	

	function addtoshoppingcart(){
		$this->Jewelleriesmodel->addtoshoppingcartmode($_POST, 'W');
		$_SESSION['5ez_price'] = $_POST['5ez_price'];
		$_SESSION['3ez_price'] = $_POST['3ez_price'];
		$_SESSION['main_price'] = $_POST['main_price'];
		echo "<script>
		window.location.href = '".config_item('base_url')."Affiliate/shopping_cart';
		</script>";
	}

	function mybasket($isajax = false){	
		$this->load->helper('custome');
		$data = $this->getCommonData();
		$allitems = '';
		$price = '';
		$items = '';
		$allitems = $this->Cartmodel->getitemsbysessionid(); 
		$data['mycartitems'] = $allitems;
		$data['contr_name'] = $this->router->fetch_class();
		if( !empty($allitems) ) {
			$this->session->set_userdata('myallitmes',$allitems);
		}
		$this->session->unset_userdata('unique_finding');
		$this->session->unset_userdata('build_3stone');
		$data['onloadextraheader'] = "getcarthtml('".$data['contr_name']."');";
		$data['title'] = 'My Shopping Basket';
		$data['sign_upform'] = signup_form();
		$data['imgurl_path'] = config_item('base_url').'img/page_img/';
		if($isajax) $data['ajax'] = true; 
		$data['title'] = "solitaire diamond rings|gemstone engagement rings|irish engagement rings|marquise engagement rings";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="solitaire diamond rings|gemstone engagement rings|irish engagement rings|marquise engagement rings">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy gold diamond ring, diamond ring sale, sell diamond ring, unique diamond rings, 
		custom diamond rings, diamond ring design, diamond rings online, marquise diamond rings, pink diamond rings, solitaire diamond rings, gemstone engagement rings, irish engagement rings, marquise engagement rings online">
		<meta name="abstract" content="Diamond Rings, Affiliate Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="gold diamond ring, diamond ring sale, sell diamond ring, unique diamond rings, 
		custom diamond rings, diamond ring design, diamond rings online, marquise diamond rings, pink diamond rings, solitaire diamond rings, gemstone engagement rings, irish engagement rings, marquise engagement rings online">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
		if(isset($_POST['checkout'])) {
			$this->orderinformation($_POST);
			$output = $this->load->view('shbasket_wholesale/orderinformation' , $data , true); 
		}else {
			$output = $this->load->view('shbasket_wholesale/basket' , $data , true);
		}
		if($isajax) { 
			echo $output;
		} else {
			$this->output($output , $data); 
		}
	}

	function orderinformation($bilview=''){
		$data = $this->getCommonData();
		$data['title'] = 'Order Information'; 
		$data['totalprice'] = isset($_POST['totalprice']) ? $_POST['totalprice'] : 0; 
		$allitems = $this->session->userdata('myallitmes');
		$data['myallitems'] = $allitems;
		$data['paymt_method'] = $this->session->userdata('payment_method');
		$allitems = $this->Cartmodel->getitemsbysessionid();
		$data['mycartitems'] = $allitems;
		$row_cust = $this->User->getCustomerInfo('', 'retailerlist');
		$data['row_cust'] = $row_cust;
		if($_POST){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			if(isset($_POST['continueorder'])){ 
				$this->form_validation->set_rules('fname', 'First Name', 'required');		
				$this->form_validation->set_rules('lname', 'Last Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');		
				$this->form_validation->set_rules('phone', 'Phone number', 'required');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			}
			$fname 		= $this->input->post('fname', TRUE);
			$lname 		= $this->input->post('lname', TRUE);
			$address1 	= $this->input->post('address1', TRUE);
			$address2 	= $this->input->post('address2', TRUE);
			$cmb_country = $this->input->post('cmb_country', TRUE);
			$city 		= $this->input->post('city', TRUE);
			$dastateta  = $this->input->post('state', TRUE);
			$zipcode 	= $this->input->post('zipcode', TRUE);
			$phone 		= $this->input->post('phone', TRUE);
			$email 		= $this->input->post('email', TRUE);
			$reemail	= $this->input->post('reemail', TRUE);

			$data['fname'] 	= check_empty($fname, $row_cust->fname);
			$data['lname'] 	= check_empty($lname, $row_cust->lname);
			$data['address1'] = check_empty($address1, $row_cust->address);
			$data['address2'] = check_empty($address2, $row_cust->address2);
			$data['country'] = check_empty($cmb_country, $row_cust->country);
			$data['city']	  = check_empty($city, $row_cust->city);
			$data['province'] = check_empty($dastateta, $row_cust->province);
			$data['postcode']  = check_empty($zipcode, $row_cust->postcode);
			$data['phone']    = check_empty($phone, $row_cust->phone);
			$data['email']    = check_empty($email, $row_cust->email);
			$data['reemail']  = check_empty($reemail, '');

			$data['biling_fname'] 	= check_empty($this->input->post('biling_fname', TRUE), $row_cust->billing_fname);
			$data['biling_lname'] 	= check_empty($this->input->post('biling_lname', TRUE), $row_cust->billing_lname);
			$data['biling_address1'] = check_empty($this->input->post('biling_address1', TRUE), $row_cust->billing_adres1);
			$data['biling_address2'] = check_empty($this->input->post('biling_address2', TRUE), $row_cust->billing_adres2);
			$data['biling_country'] = check_empty($this->input->post('biling_country', TRUE), $row_cust->billing_country);
			$data['biling_city']	  = check_empty($this->input->post('biling_city', TRUE), $row_cust->billing_city);
			$data['biling_state'] = check_empty($this->input->post('biling_state', TRUE), $row_cust->billing_province);
			$data['biling_zipcode']  = check_empty($this->input->post('biling_zipcode', TRUE), $row_cust->billing_postcode);
			$data['biling_phone']    = check_empty($this->input->post('biling_phone', TRUE), $row_cust->billing_phone);
			$data['biling_email']    = check_empty($this->input->post('biling_email', TRUE), $row_cust->billing_email);

			$salesTaxCount = getSalesTaxCount();
			$country_listar = array('USA','Canada',$salesTaxCount,'Australia','UK');
			$option_ctlist = '';
			$optoins_bilcont = '';

			foreach($country_listar as $coun_name) {
				$option_ctlist .= '<option '.selectedOption($coun_name,$data['country']).'>'.$coun_name.'</option>';
			}
			foreach($country_listar as $coun_name) {
				$optoins_bilcont .= '<option '.selectedOption($coun_name,$data['biling_country']).'>'.$coun_name.'</option>';
			}
			$data['option_ctlist'] = $option_ctlist;
			$data['optoins_bilcont'] = $optoins_bilcont;

			if ($this->form_validation->run() == FALSE){
				$output = $this->load->view('shbasket_wholesale/orderinformation' , $data , true); 
				$this->output($output , $data);
			}else{ 
				$_SESSION['useremail'] = $data['email'];
				if( (isset($_POST) && sizeof($_POST)>0)){
					$data['totalprice'] = $_POST['totalprice'];
					//$data = $this->security->xss_clean($data);
					if(isset($_POST['paymentmethod'])){ 
						switch ($_POST['paymentmethod']){
							case 'creditcard':
								$this->billingandshipping($_POST); 
								break;
							case 'phone': 
							case 'moneyorder':
								$this->billingandshipping($_POST); 
								break;
							case 'paypal':
								$this->billingandshipping($_POST);  
								$output = $this->load->view('shbasket_wholesale/paypal' , $data , true);
								$this->output($output , $data);
								break;
							case 'furtherprocess':
								$this->paymentmethod($_POST);
								echo "<script>
								window.location.href = '".config_item('base_url')."shbasket_wholesale/selectpaymentmethod';
								</script>";
								break;
							default: 
								$output = $this->load->view('shbasket_wholesale/orderinformation' , $data , true);
								$this->output($output , $data);
								break;
						}
					}else {
						$output = $this->load->view('shbasket_wholesale/orderinformation' , $data , true);
					}
				}else{
					echo "<script>
					window.location.href = '".config_item('base_url')."Affiliate';
					</script>";
					//header('location:'.config_item('base_url').'diamonds');
				}
			}
		} else {
			echo "<script>
			window.location.href = '".config_item('base_url')."Affiliate';
			</script>";
			//header('location:'.config_item('base_url').'diamonds');
		}
	}

	function paymentmethod($post){
		$data['cardtype'] = $this->input->post('cardtype');
		$data['creditcardno'] = $this->input->post('creditcardno');
		$data['expmonth'] = $this->input->post('expmonth');
		$data['expyear'] = $this->input->post('expyear'); 
		$data['cvvcode'] = $this->input->post('cvvcode');
		$data['fname'] = $this->input->post('fname');
		$data['lname'] = $this->input->post('lname');
		$data['address1'] = $this->input->post('address1');
		$data['address2'] = $this->input->post('address2');
		$data['city'] = $this->input->post('city'); 
	}

	function selectpaymentmethod() {
		$data = $this->getCommonData();
		$data['title'] = 'Choose Your Payment';
		$allitems = $this->Cartmodel->getitemsbysessionid();
		$data['mycartitems'] = $allitems;
		$totalprice = $this->input->post('totalprice',TRUE);
		$customerid = $this->session->userdata('wh_user_id');
		$paymentmethod = $this->input->post('payment_method', TRUE);
		$data['payment_method'] = $paymentmethod;
		$orderdate = date("Y-m-d");
		$deliverydate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));	
		$ship_arlist = array('payment_card','payment_bankwire','payment_byphone');
		$cust_info = $this->User->getCustomerInfo('view', 'retailerlist');
		$data['rowcust_info'] = $cust_info;
		$netOrderPrice = $this->input->post('totalprice',TRUE);
		$totalprice = ( $paymentmethod === 'payment_bankwire' ? 35 : 0 );
		$finalOrderPrice = $netOrderPrice + $totalprice;
		$data['finalOrderPrice'] = $totalprice;
		if(in_array($data['payment_method'], $ship_arlist)) {
			$this->session->set_userdata('payment_method',$data['payment_method']);
			$s_order = array(
				'customerid' 	=>$customerid,
				'totalprice' 	=>$totalprice,
				'paymentmethod' =>$data['payment_method'],
				'orderdate' 	=>$orderdate,
				'deliverydate' 	=>$deliverydate
			);
			$creditcardname	= 'Card Name';
			$creditcardno	= $_POST['creditcardno'];
			$expdate		= date("Y-m-d",mktime(0, 0, 0, $_POST['expmonth'], '01', $_POST['expyear']));

			$this->session->set_userdata('svar_order',$s_order);
			$order = $this->Shoppingbasketmodel->saveOrder($customerid,$finalOrderPrice,$paymentmethod,$orderdate,$deliverydate,'W');
			$data['orderid'] = generate_order_id( $order['id'] );
			$data['totalprice'] = (int) $totalprice;
			$this->session->set_userdata('svar_orderid',$data['orderid']);

			$orderid 	 = $this->session->userdata('svar_orderid');
			$customerid = $cust_info->id;
			$data['orderid'] = $orderid;
			$data['customerid'] = $customerid;
			$order = $this->session->userdata('svar_order');
			$paymentmethod	= $data['payment_method'];
			$creditcardname	= isset($_POST['cardtype']) ? $_POST['cardtype'] : '';
			$creditcardno	= $_POST['creditcardno'];
			$expdate		= date("Y-m-d",mktime(0, 0, 0, $_POST['expmonth']  , '01', $_POST['expyear']));
			$cvvcode		= $_POST['cvvcode'];
			$fname 			= $cust_info->fname;
			$lname 			= $cust_info->lname;
			$company		= '';
			$adress			= $cust_info->address.' '.$cust_info->address2;
			$city			= $cust_info->city;
			$state 			= $cust_info->province;
			$country		= $cust_info->country;
			$postcode		= $cust_info->postcode;
			$phonecodecountry	= '';
			$phone 				= '';
			$ext 				= '';
			$issamedestination	= ($cust_info->billing_address == 'Y') ? 1 : 0;
			$rcvname 			= '';
			$rcvcompany			= '';
			$rcvaddress 		= $adress;
			$rcvcity 			= $cust_info->city;
			$rcvstate 			= $cust_info->province;
			$rcvcountry 		= $cust_info->country;
			$rcvpostcode 		= $cust_info->postcode;
			$rcvphonecodecountry= '';
			$rcvphone 			= $cust_info->phone;
			$rcvext 			= '';
			$referencecode		= '';
			$giftcertificate 	= '';
			$howdidyouknow		= '';
			$shippingmethod 	= 'Fedex';
			$shippingamoount	= 0.00;
			$oinfo['creditcardname'] = $creditcardname;
			$oinfo['creditcardno']	 = $creditcardno;
			$oinfo['expdate']		 = $expdate;
			$this->session->set_userdata('ccinfo', $_POST) ;
			$this->Shoppingbasketmodel->saveOrderdetails($orderid);
			$this->Shoppingbasketmodel->saveShippinginfo($orderid, $customerid, $paymentmethod, $creditcardname, $creditcardno, $cvvcode, $expdate, $rcvname, $rcvphone, $rcvphonecodecountry, $rcvext, $rcvcompany, $rcvaddress, $rcvcity, $rcvstate, $rcvcountry, $rcvpostcode, $referencecode, $giftcertificate, $howdidyouknow, $fname, $lname, $company, $adress, $city, $state, $country, $postcode, $phonecodecountry, $phone,  $ext, $shippingmethod, $shippingamoount, $issamedestination);
			echo "<script>
			window.location.href = '".config_item('base_url')."shbasket_wholesale/order_confirmation';
			</script>";
			//header('location:'.config_item('base_url').'shbasket_wholesale/order_confirmation');
		}
		//$data = $this->security->xss_clean($data);
		$output = $this->load->view('shbasket_wholesale/paymentmethod_view' , $data , true);
		$this->output($output , $data);
	}

	function order_confirmation($confirm='') {
		$data = $this->getCommonData();
		$data['title'] = 'Confirm and Submit Order';

		$allitems = $this->Cartmodel->getitemsbysessionid();
		$data['mycartitems'] = $allitems;
		$data['payment_mthod'] = $this->session->userdata('payment_method');
		$data['payment_method'] = view_payment_method( $data['payment_mthod'] );
		$data['cust_info'] = $this->User->getCustomerInfo('', 'retailerlist');
		$full_name = $data['cust_info']->fname.' '.$data['cust_info']->lname;
		$data['billing_fullname'] = $data['cust_info']->billing_fname.' '.$data['cust_info']->billing_lname;

		$data['full_name'] = ( !empty($full_name) ? $full_name : $data['cust_info']->name );
		$province = ( !empty($data['cust_info']->province) ? $data['cust_info']->province.', ' : '');
		$data['postal_adress'] = $data['cust_info']->postcode.' '.$data['cust_info']->city.' '.$province.$data['cust_info']->country;
		$data['billing_postal'] = $data['cust_info']->billing_postcode.' '.$data['cust_info']->billing_city.' '.$province.$data['cust_info']->billing_country;
		$data['confirm_order'] = config_item('base_url').'shbasket_wholesale/order_confirmation/true';
		$data['orderid'] = $this->session->userdata('svar_orderid');
		$data['procesing_fees'] = ( $data['payment_mthod'] == 'payment_bankwire' ? 35 : 0 );
		if( !empty($confirm) ) {
			$orderid = $this->session->userdata('svar_orderid');
			$this->orderconfirmation($orderid);	
			$data['cart_message'] = $confirm;
		}
		//$data = $this->security->xss_clean($data);
		$output = $this->load->view('shbasket_wholesale/orderconfirm_view' , $data , true);
		$this->output($output , $data);
	}

	function usaepay(){
		$tran=new Transaction;
		$tran->key="897asdfjha98ds6f76324hbmnBZc9769374ybndfs876";
		$tran->usesandbox=true;
		$tran->card=$_POST['creditcardno'];
		$tran->exp=$_POST['expmonth'].$_POST['expyear'];
		$tran->amount=$_POST['totalprice'];
		$tran->invoice="1234";
		$tran->cardholder=$_POST['fname']." ".$_POST['lname'];
		$tran->street=$_POST['address1'];
		$tran->zip="90036";
		$tran->description="Online Order";
		$tran->cvv2=$_POST['cvvcode'];
		flush();
			
		if($tran->Process()){
			echo "approved";
		} else {
			echo "<b>Card Declined</b> (" . $tran->result . ")<br>";
			echo "<b>Reason:</b> " . $tran->error . "<br>";
			if($tran->curlerror) echo "<b>Curl Error:</b> " . $tran->curlerror . "<br>";
		}
	}

	function billingandshipping($post = ''){
		$data = $this->getCommonData();
		$data['title'] = 'Billing & Shipping'; 
		$data['post'] = '';
		$data['totalprice'] = 0;
		$data['orderid'] = '<small><i>(not exist)</i></small>';
		$s_order = $this->session->userdata('svar_order');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		if(isset($_POST['continueorder'])){
			$this->session->set_userdata('ccinfo',$_POST) ;		
			$data['cardtype'] = $this->input->post('cardtype');
			$data['creditcardno'] = $this->input->post('creditcardno');
			$data['expmonth'] = $this->input->post('expmonth');
			$data['expyear'] = $this->input->post('expyear'); 
			$data['cvvcode'] = $this->input->post('cvvcode');
			$data['fname'] = $this->input->post('fname');
			$data['lname'] = $this->input->post('lname');
			$data['address1'] = $this->input->post('address1');
			$data['address2'] = $this->input->post('address2');
			$data['city'] = $this->input->post('city'); 
			$data['state'] = $this->input->post('state');
			$data['statex'] = ($this->input->post('country') == 'US') ? $this->input->post('state') : $this->input->post('statetxt'); 
			$data['countryx'] = $this->input->post('country');
			$data['postcode'] = $this->input->post('postcode'); 
			$data['postcode2'] = $this->input->post('zipcode'); 
			$data['phonecode'] = $this->input->post('phonecode'); 
			$data['phone'] = $this->input->post('phone'); 
			$data['extension'] = $this->input->post('extension'); 
			$data['rcvname'] = $this->input->post('rcvname');
			$data['rcvaddress1'] = $this->input->post('rcvaddress1'); 
			$data['rcvaddress2'] = $this->input->post('rcvaddress2'); 
			$data['rcvcity'] = $this->input->post('rcvcity');
			$data['rcvstatex'] = ($this->input->post('rcvcountry') == 'US') ? $this->input->post('rcvstate') : $this->input->post('rcvstatetxt'); 
			$data['rcvcountry'] = $this->input->post('rcvcountry'); 
			$data['rcvphone'] = $this->input->post('rcvphone'); 
			$data['rcvphonecode'] = $this->input->post('rcvphonecode'); 
			$data['rcvextension'] = $this->input->post('rcvextension'); 
		}
		$allitems = $this->session->userdata('myallitmes');
		$data['myallitems'] = $allitems; 
		if(isset($post) && sizeof($post)>0){ 
			if(isset($post['paymentmethod'])){ 
				$fname = $post['fname'];
				$lname = $post['lname'];
				$email = $post['email'];
				$_SESSION['ccinfo']['email'] = $email;
				$phone = $post['phone'];
				$address = $post['address1'].', '.$post['address2'].','.$post['city'].', '.$post['state'].','.$post['zipcode'];
				$totalprice =  (int) $post['totalprice'];
				$paymentmethod = $post['paymentmethod'];
				if(strcmp($post['paymentmethod'],'creditcard')===0)
				$totalprice = round(($totalprice + (($totalprice*3)/100)),'0');
				$orderdate = date("Y-m-d");
				$deliverydate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")));	
				$customer = $this->Shoppingbasketmodel->saveCustomerinfo($fname,$lname,$email,$phone,$address,'retailerlist');
				$customerid = $this->session->userdata('wh_user_id');
				$this->session->set_userdata('svar_customerid',$customerid);
				if($customerid){
					$s_order = array(
						'customerid' 	=>$customerid,
						'totalprice' 	=>$totalprice,
						'paymentmethod' =>$paymentmethod,
						'orderdate' 	=>$orderdate,
						'deliverydate' 	=>$deliverydate
					);
					$this->session->set_userdata('svar_order',$s_order);
				}
				$order = $this->Shoppingbasketmodel->saveOrder($customerid,$totalprice,$paymentmethod,$orderdate,$deliverydate,'W');
				$data['orderid'] = generate_order_id($order['id']);
				$data['totalprice'] = (int) $totalprice;
				$this->session->set_userdata('svar_orderid',$data['orderid']);
				//$data = $this->security->xss_clean($data);
				switch ($post['paymentmethod']){
					case 'payment_card': 
						$orderid 	 = $this->session->userdata('svar_orderid');
						$this->Shoppingbasketmodel->saveOrderdetails ($orderid);
						$this->Shoppingbasketmodel->confirmOrder($orderid, true);
						$output = $this->load->view('shbasket_wholesale/billingandshipping' , $data , true);
						$this->output($output , $data);
						break;
					case 'payment_bankwire':
					case 'payment_byphone':
						$orderid 	 = $this->session->userdata('svar_orderid');
						$this->Shoppingbasketmodel->saveOrderdetails ($orderid);
						$this->Shoppingbasketmodel->confirmOrder($orderid, true);
						$data['orderid']=$orderid ;
						$output = $this->load->view('shbasket_wholesale/phoneorder' , $data , true);
						$this->output($output , $data);
						break;
					case 'moneyorder':						
						$orderid 	 = $this->session->userdata('svar_orderid');
						$this->Shoppingbasketmodel->saveOrderdetails ($orderid);
						$this->Shoppingbasketmodel->confirmOrder($orderid, true);
						$data['orderid']=$orderid ;
						$output = $this->load->view('shbasket_wholesale/phoneorder' , $data , true);
						$this->output($output , $data);
						break;
					case 'paypal': 
						$output = $this->load->view('shbasket_wholesale/paypal' , $data , true);
						$this->output($output , $data);
						break;
					default:							
						$output = $this->load->view('shbasket_wholesale/orderinformation' , $data , true);
						$this->output($output , $data);
						break;
				}
			}elseif(isset($_POST['continuebillingandshipping'])){				
				$this->form_validation->set_rules('cardtype', 'Crdit card', 'required');	
				$this->form_validation->set_rules('creditcardno', 'Crdit card no', 'required');		
				$this->form_validation->set_rules('expmonth', 'Expiry month', 'required');				
				$this->form_validation->set_rules('expyear', 'Expiry year', 'required');
				$this->form_validation->set_rules('cvvcode', 'CVV code', 'required');				
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('lname', 'Last Name', 'required');				
				$this->form_validation->set_rules('address1', 'Address', 'required');
				$this->form_validation->set_rules('country', 'Country', 'required');
				$this->form_validation->set_rules('postcode', 'Post code', 'required');				
				$this->form_validation->set_rules('phone', 'Phone number', 'required');
				$this->form_validation->set_rules('city', 'City', 'required');
				if($_POST['country'] != 'US'){
					$this->form_validation->set_rules('statetxt', 'State', 'required');		
				}

				if($_POST['shipaddress'] == 'no'){
					$this->form_validation->set_rules('rcvname', 'Receiver name', 'required');				
					$this->form_validation->set_rules('rcvaddress1', 'Receiver address', 'required');
					$this->form_validation->set_rules('rcvcity', 'Receiver city', 'required');				
					if($_POST['rcvcountry'] == 'US'){
						$this->form_validation->set_rules('rcvstatetxt', 'Receiver State', 'required');		
					} 
					$this->form_validation->set_rules('rcvcountry', 'Receiver country', 'required');
					$this->form_validation->set_rules('rcvphone', 'Reciever phone', 'required');
				} 

				if($_POST['country'] != 'US'){
					$this->form_validation->set_rules('intshipping', 'Shipping policy', 'required');
				}
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');			
				if ($this->form_validation->run() == FALSE){
					$output = $this->load->view('shbasket_wholesale/billingandshipping' , $data , true);
					$this->output($output , $data);
				}else{
					$orderid 	 = $this->session->userdata('svar_orderid');
					$customerid = $this->session->userdata('svar_customerid') ;
					$data['orderid'] = $orderid;
					$data['customerid'] = $customerid;
					$order = $this->session->userdata('svar_order');
					$paymentmethod	= $order['paymentmethod'];
					$creditcardname	= isset($_POST['cardtype']) ? $_POST['cardtype'] : '';
					$creditcardno	= $_POST['creditcardno'];
					$expdate		= date("Y-m-d",mktime(0, 0, 0, $_POST['expmonth']  , '01', $_POST['expyear']));	
					$cvvcode		= $_POST['cvvcode'];
					$fname 			= $_POST['fname'];
					$lname 			= $_POST['lname'];
					$company		= $_POST['company'];
					$adress			= $_POST['address1'].' '.$_POST['address2'];	
					$city			= $_POST['city'];
					$state 			= ($_POST['country'] == 'US') ? $_POST['state'] : $_POST['statetxt'];
					$country		= $_POST['country'];
					$postcode		= $_POST['postcode'];
					$phonecodecountry	= $_POST['phonecode'];
					$phone				= $_POST['phone'];
					$ext				= $_POST['extension'];
					$issamedestination	= ($_POST['shipaddress'] == 'yes') ? 1 : 0;
					$rcvname 			= $_POST['rcvname'];
					$rcvcompany			= $_POST['rcvcompany']; 
					$rcvaddress 		= $_POST['rcvaddress1'].' '.$_POST['rcvaddress2'];
					$rcvcity 			= $_POST['rcvcity'];
					$rcvstate 			= ($_POST['rcvcountry'] == 'US') ? $_POST['rcvstate'] : $_POST['rcvstatetxt'];
					$rcvcountry 		= $_POST['rcvcountry'];
					$rcvpostcode 		= $_POST['rcvpostcode'];
					$rcvphonecodecountry= $_POST['rcvphonecode']; 
					$rcvphone 			= $_POST['rcvphone'];
					$rcvext 			= $_POST['rcvextension'];
					$referencecode 		= $_POST['referencecode'];
					$giftcertificate 	= $_POST['giftcertificate'];
					$howdidyouknow 		= $_POST['howdidyouknow'];
					$shippingmethod 	= $_POST['shippingmethod'];
					$shippingamoount	= $_POST['shipping_amoount'];
					$oinfo['creditcardname']= $creditcardname;
					$oinfo['creditcardno']	= $creditcardno;
					$oinfo['expdate']		= $expdate;
					$this->session->set_userdata('ccinfo', $_POST) ;
					$this->Shoppingbasketmodel->saveOrderdetails($orderid);
					$this->Shoppingbasketmodel->saveShippinginfo($orderid, $customerid, $paymentmethod, $creditcardname, $creditcardno, $cvvcode, $expdate, $rcvname, $rcvphone, $rcvphonecodecountry, $rcvext, $rcvcompany, $rcvaddress, $rcvcity, $rcvstate, $rcvcountry, $rcvpostcode, $referencecode, $giftcertificate, $howdidyouknow, $fname, $lname, $company, $adress, $city, $state, $country, $postcode, $phonecodecountry, $phone,  $ext, $shippingmethod, $shippingamoount, $issamedestination);
					$data = $this->security->xss_clean($data);
					$output = $this->load->view('shbasket_wholesale/revieworder' , $data , true);
					$this->output($output , $data);
				}
			}elseif($_POST['confirmorder']){							
				$orderid = $this->session->userdata('svar_orderid');
				$this->orderconfirmation($orderid);
			}else{
				$output = $this->load->view('shbasket_wholesale/orderinformation' , $data , true);
				$this->output($output , $data);
			}
		}else{
			header('location:'.config_item('base_url').'Affiliate');
		}
	}

	function orderconfirmation($orderid = '',$mail=''){
		$data = $this->getCommonData();
		$data['title'] = 'Order Confirmation';
		$allitems = $this->session->userdata('myallitmes');
		$ccinfo=$this->session->userdata('ccinfo');
		$data['myallitems']=$allitems;
		$data['ccinfo']=$ccinfo;
		$orderid = $this->session->userdata('svar_orderid');
		$data['orderid'] = $orderid;

		$customerid = $this->session->userdata('wh_user_id');
		$data['customerid'] = $customerid;
		$this->Shoppingbasketmodel->confirmOrder($orderid, true);
		$mode = $this->Shoppingbasketmodel->Transactionmode();
		//$data = $this->security->xss_clean($data);
		$this->load->helper('ordrs_detail');
		$customerid = $this->session->userdata('wh_user_id');
		$row_cust = $this->User->getCustomerInfo('', 'retailerlist');
		$customr_name = $row_cust->fname.' '.$row_cust->lname;
		$output = '';
		$output .= "<div style='font:14px Arial, Helvetica, sans-serif;'>
			<div style='background:#444; color:#fff; padding-top:40px;'>
				<table style=\"width:90%; margin:0px auto; border-collapse:collapse; padding-top:30px;\">
					<tr>
						<td width=\"56%\">".get_trial_user_logo(280)."</td>
						<td width=\"44%\" class='contact_info'>
						<div style='font-size:18px; text-decoration:underline; padding-bottom:5px;'>24 / 7 Support: ".getadmin_contact_info('contact_info')."</div>
						<div>".$customr_name." &ndash; Customer Number: ".$customerid." </div>
						</td>
					</tr>
				</table><br>
			</div><br>
			<div style='width:100%; height:20px; background: #444;'></div><br><br><br>
			<div style='text-transform:uppercase;   font-size: 3em; line-height: 1.2em; margin-left: 40px; font-weight: bold; padding-left:40px;'>THANK YOU FOR YOUR BUSINESS.<br> Lets get started.</div><br><br>
			<div style=\"margin-left:5.5em;\">
				<div style=\"font-size:24px; text-transform:uppercase;\"><a href=\"".SITE_URL."Affiliate/account_login\">My Account</a></div><br><br>
				<div>
					<table border=\"0\" cellspacing=\"0\" cellpadding=\"10\" style=\"width:30%; font-size:16px;\">
						<tr>
							<td width=\"25%\"><b>Username:</b> </td>
							<td width=\"75%\">".$row_cust->username."</td>
						</tr>
						<tr>
							<td><b>Password:</b> </td>
							<td>".$row_cust->userpass_view."</td>
						</tr>
					</table>
				</div>
			</div>
    		<br><br>
			<div style='background: #0C0; padding:20px;'><br>
				<div style='width:95%; margin:0px auto;'>
					<div style='background:#fff;'><br><br>
						<div style='font-size:24px; font-weight:bold; line-height:26px; padding-bottom: 8px; padding-left: 1em;'>Your Order Confirmation</div>
					</div><br>
					<div style='background:#fff;'>
						<div style='font-weight:bold;  padding: 8px 10px 7px 2em;'>Order Number: ".$orderid."</div>
					</div><br>
					<div style='background:#fff;padding:20px 20px 10px 20px;'>".view_order_details_content($orderid, 'email')."</div><br>
				</div>
			</div>
		</div>";

		$customeremail = $row_cust->email;
		$emailstyle = "";
		$mailsub = "<html><head>".$emailstyle."</head><body>".$output."</body></html>";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$toEmail = getadmin_contact_info('email');

		$headers .= 'To: '.getadmin_contact_info().' <'.$toEmail.'>' . "\r\n";
		$headers .= 'From: '.$customr_name.' <'.$customeremail.'>' . "\r\n";
		$headers .= "Cc: ".$customeremail . "\r\n";
		$mailSubject = 'New Order Information From Affiliate';

		$this->Commonmodel->managedEmails($customerid, $orderid, 'orders', $mailSubject, $mailsub);
		mail ($toEmail, $mailSubject, $mailsub, $headers);
		//mail ('rakshitpatel50@gmail.com', $mailSubject, $mailsub, $headers);	
	} 

	function orderconfirmed(){
		$data = $this->getCommonData();
		$data['title'] = 'Order Confirmation'; 		
		$allitems = $this->session->userdata('myallitmes');
		$ccinfo=$this->session->userdata('ccinfo');
		$data['myallitems']=$allitems;
		$data['ccinfo']=$ccinfo;
		$orderid = $this->session->userdata('svar_orderid');
		$data['orderid'] = $orderid;
		$customerid = $this->session->userdata('svar_customerid') ;
		$data['customerid'] = $customerid;
		$data = $this->security->xss_clean($data);
		$output = $this->load->view('shbasket_wholesale/conf' , $data , true);
		$this->output($output , $data);
	}

	function getOrderInfoByID($orderid = ''){
		if($orderid!=''){
			$data['order'] = $this->Adminmodel->orderinfo($orderid);
			$data['orderdetails'] = $this->Adminmodel->orderdetails($orderid);
			$customerid = (isset($data['order']['0']['customerid'])) ? $data['order']['0']['customerid'] : '';
			$lot = (isset($data['order']['0']['lot'])) ? $data['order']['0']['lot'] : '';
			if($customerid!='')
				$data['customer'] = $this->Adminmodel->getCustomerByID($customerid);
			else
				$data['customer']=array();
			if($lot!='')
				$data['product'] = $this->Adminmodel->getProductByLot($lot);
			else
				$data['product']=array();
				$data['shipping'] = $this->Adminmodel->getShippingByID($orderid);
				$output = $this->load->view('shbasket_wholesale/vieworder' , $data , true);
				$this->Shoppingbasketmodel->sendConfirmEmail($orderid);
				echo $output;
		}
	} 

	function estimateShipping($service='', $country='', $zipcode='', $state='', $city='', $street_address='' ){
		require_once(config_item('base_path').'system/application/libraries/library/fedex-common.php5');
		$newline = "<br />";
		//The WSDL is not included with the sample code.
		//Please include and reference in $path_to_wsdl variable.
		$path_to_wsdl = config_item('base_path').'system/application/libraries/wsdl/RateService_v7.wsdl';
		//$path_to_wsdl = "../wsdl/RateService_v3.wsdl";
		ini_set("soap.wsdl_cache_enabled", "0");
		
		$allitems = $this->Cartmodel->getitemsbysessionid();
		//print_r($allitems);
		$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information
		$request['WebAuthenticationDetail'] = array('UserCredential' =>
											  array('Key' => 'AVdBxcwx47pVsZe9', 'Password' => 'koNvuiSexsIxgevPnu4nwYnm9')); // Replace 'XXX' and 'YYY' with FedEx provided credentials 
		$request['ClientDetail'] = array('AccountNumber' => '114790990', 'MeterNumber' => '101727405');// Replace 'XXX' with your account and meter number
		$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Rate Request v7 using PHP ***');
		$request['Version'] = array('ServiceId' => 'crs', 'Major' => '7', 'Intermediate' => '0', 'Minor' => '0');
		$request['ReturnTransitAndCommit'] = true;
		$request['RequestedShipment']['DropoffType'] = 'REGULAR_PICKUP'; // valid values REGULAR_PICKUP, REQUEST_COURIER, ...
		$request['RequestedShipment']['ShipTimestamp'] = date('c');
		//$request['RequestedShipment']['ServiceType'] = 'PRIORITY_OVERNIGHT'; // valid values STANDARD_OVERNIGHT, PRIORITY_OVERNIGHT, FEDEX_GROUND, ...
		$request['RequestedShipment']['ServiceType'] = $service;
		$request['RequestedShipment']['PackagingType'] = 'YOUR_PACKAGING'; // valid values FEDEX_BOX, FEDEX_PAK, FEDEX_TUBE, YOUR_PACKAGING, ...
		$request['RequestedShipment']['Shipper'] = array('Address' => array(
												  'StreetLines' => array('10 Fed Ex Pkwy'), // Origin details
												  'City' => 'Los Angeles',
												  'StateOrProvinceCode' => 'TN',
												  'PostalCode' => '38115',
												  'CountryCode' => 'US'));
		if($country == 'US') {
			$request['RequestedShipment']['Recipient'] = array('Address' => array (
														   'StreetLines' => array($street_address), // Destination details
														   'City' => $city,
														   'StateOrProvinceCode' => $state,
														   'PostalCode' => $zipcode,
														   'CountryCode' => $country));
		} else{
			$request['RequestedShipment']['Recipient'] = array('Address' => array (
													   'StreetLines' => array($street_address), // Destination details
													   'City' => $city,
													   'PostalCode' => $zipcode,
													   'CountryCode' => $country));
		}
		$request['RequestedShipment']['ShippingChargesPayment'] = array('PaymentType' => 'SENDER',
																'Payor' => array('AccountNumber' => '114790990', // Replace 'XXX' with payor's account number
																			 'CountryCode' => 'US'));
		$request['RequestedShipment']['RateRequestTypes'] = 'ACCOUNT'; 
		$request['RequestedShipment']['RateRequestTypes'] = 'LIST'; 
		$request['RequestedShipment']['PackageCount'] = '2';
		$request['RequestedShipment']['PackageDetail'] = 'INDIVIDUAL_PACKAGES';  //  Or PACKAGE_SUMMARY
	//	echo '<pre>';
		$i=0;
		foreach($allitems AS $index=>$value) {
		
		 if($value['addoption']=='addwatch') {
			$weight = '3.0';
			$length = 11;
			$width = 9;
			$height = 6;
		 } else {
			$weight = '1.0';
			$length = 14;
			$width = 12;
			$height = 6;
		 }
		
		$request['RequestedShipment']['RequestedPackageLineItems'][$i]['Weight'] =  array('Value' => 2.0,
																					'Units' => 'LB');
																							
		$request['RequestedShipment']['RequestedPackageLineItems'][$i]['Dimensions'] =	 array('Length' => 10,																																'Width' => 10,
																								'Height' => 3,
																								'Units' => 'IN');
		$i++;
	 }
	// print_r($request['RequestedShipment']['RequestedPackageLineItems']);
	/*$request['RequestedShipment']['RequestedPackageLineItems'] = array('0' => array('Weight' => array('Value' => 2.0,
																							'Units' => 'LB'),
																							'Dimensions' => array('Length' => 10,
																								'Width' => 10,
																								'Height' => 3,
																								'Units' => 'IN')),
																		   '1' => array('Weight' => array('Value' => 5.0,
																							'Units' => 'LB'),
																							'Dimensions' => array('Length' => 20,
																								'Width' => 20,
																								'Height' => 10,
																								'Units' => 'IN')));*/
	//	print_r($request['RequestedShipment']['RequestedPackageLineItems']);
		try 
		{
			$response = $client ->getRates($request);
			#print_r($response);
			$severity = (string)$response->HighestSeverity;
			if ($severity != 'FAILURE' && $severity != 'ERROR')
		   {
				//echo '<pre>';
				//printRequestResponse($client);
				//echo $response->RateReplyDetails->DeliveryTimestamp;
				//$delvery_date_arr = explode('T', $response->RateReplyDetails->DeliveryTimestamp);
				//echo $response->RateReplyDetails->DeliveryTimestamp;
				//$delvery_date = explode('-', $delvery_date_arr[0]);
				$amount = (string)$response->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount;
				//print_r($response->RateReplyDetails->RatedShipmentDetails);
				//echo 'Amount'.$response->RateReplyDetails->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount;
				echo '<B><font color ="red">Estimated Shipping cost would be $'.$amount.'.</font></B>~'.$amount;
			}
			else
			{
				echo '<B><font color ="red">Error in processing Transaction.'. $newline; 
				foreach ($response -> Notifications as $notification)
				{           
					if(is_array($response -> Notifications))
					{              
					   echo $notification -> Severity;
					   echo ': ';           
					   echo $notification -> Message;
					}
					else
					{
						echo $notification;
					}
				} 
				echo '</font></b>';
			} 
			
			#writeToLog($client);    // Write to log file   
			
		} catch (SoapFault $exception) {
		   printFault($exception, $client);        
		}
		
	} 

	function estimateCurlShipping($country='', $zipcode='', $state='', $city='' ){
		$allitems = $this->Cartmodel->getitemsbysessionid();
		//print_r($allitems);
		if($country == '') {
			$destination = '<StateOrProvinceCode>'.$state.'</StateOrProvinceCode>
							<PostalCode>'.$zipcode.'</PostalCode>
							<CountryCode>'.$country.'</CountryCode>';
 
		} else {
			$destination = '<PostalCode>'.$zipcode.'</PostalCode>
			<CountryCode>'.$country.'</CountryCode>';
		}
		
		$request = '<?xml version="1.0" encoding="UTF-8" ?>
		  <FDXRateAvailableServicesRequest xmlns:api="http://www.fedex.com/fsmapi"
		  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
		  xsi:noNamespaceSchemaLocation="FDXRateRequest.xsd">
	  <RequestHeader>
			<CustomerTransactionIdentifier>1</CustomerTransactionIdentifier>
			<AccountNumber>510087160</AccountNumber>
			<MeterNumber>118507130</MeterNumber>
			<CarrierCode>FDXE</CarrierCode>
		  </RequestHeader>
		  <ShipDate>2010-03-27</ShipDate>
		<DropoffType>REGULARPICKUP</DropoffType>
	    <Service>INTERNATIONALECONOMY</Service>
	    <Packaging>YOURPACKAGING</Packaging>';
	 foreach($allitems AS $index=>$value) {
		 $request.=  '<WeightUnits>LBS</WeightUnits>';
		 if($value['addoption']=='addwatch') {
			$weight = '3.0';
			$length = 11;
			$width = 9;
			$height = 6;
		 } else {
			$weight = '1.0';
			$length = 14;
			$width = 12;
			$height = 6;
		 }
		//$total
		$request.= '<Weight>'.$weight.'</Weight>';	
		$request .= '<Dimensions>
						<Length>'.$length.'</Length>
						<Width>'.$width.'</Width>
						<Height>'.$height.'</Height>
						<Units>IN</Units>
					  </Dimensions>';
	 }
	 // <WeightUnits>LBS</WeightUnits>
	 // <Weight>10.0</Weight>
	  $request .= '<OriginAddress>
		<StateOrProvinceCode>TN</StateOrProvinceCode>
		<PostalCode>37115</PostalCode>
		<CountryCode>US</CountryCode>
		</OriginAddress>
		<DestinationAddress>'.$destination.'</DestinationAddress>
		<Payment>
		<PayorType>SENDER</PayorType>
		</Payment>
		<PackageCount>1</PackageCount>
</FDXRateAvailableServicesRequest>';
		echo "<h3>Request</h3>\n";
		echo "<pre>\n";
		print_r(simplexml_load_string($request));
		echo "</pre>\n";
		echo "<h3>Response</h3>\n";
		$response = $this->callFedEx($request);
		foreach ($response->Entry AS $service)
		{
		  echo "It would cost \${$service->EstimatedCharges->DiscountedCharges->NetCharge}
			to mail the package with " . $serviceOptions["{$service->Service}"] . ' ';
		  echo "Which has an estimated delivery date of " . date('l dS \of F',
			strtotime($service->DeliveryDate)) . "<br>";
		}
		echo "<pre>";
		print_r($response);
		echo "</pre>";
		
	} 

	function callFedEx($request){
		  $endpoint = "https://gatewaybeta.fedex.com:443/GatewayDC";
		  $agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";
		  $reffer = "https://gatewaybeta.fedex.com";
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_URL, $endpoint);
		  curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		  curl_setopt($ch, CURLOPT_POST, 1);
		  curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		  curl_setopt($ch, CURLOPT_REFERER, $reffer);
		  
		  $response = curl_exec($ch);
		  if (curl_error($ch))
		  {
			echo "<br>\n";
			echo "Errors were encountered:";
			echo curl_errno($ch);
			echo curl_error($ch);
			curl_close($ch);
			return NULL;
		  }else
		  {
			curl_close($ch);
			$xml = simplexml_load_string($response);
			return $xml;
		  }
	}

	function usepaymentProcessing($allitems, $ccinfo){
		$icard = $ccinfo['creditcardno'];
		$iexpmonth = $ccinfo['expmonth'];
		$iexpyear = $ccinfo['expyear'];
		$icvv2 = $ccinfo['cvvcode'];
		$ifname = $ccinfo['fname'];
		$ilname = $ccinfo['lname'];
		$istreet = $ccinfo['address1'];
		$izip = $ccinfo['address1'];
		foreach($allitems as $item) {
			// Instantiate USAePay client object
			//$tran=new umTransaction;
			// Merchants Source key must be generated within the console
			$this->$tran->key="897asdfjha98ds6f76324hbmnBZc9769374ybndfs876";
			// Send request to sandbox server not production.  Make sure to comment or remove this line before
			//  putting your code into production
			$this->$tran->usesandbox=true;    
			$this->$tran->card="4005562233445564";		
			$this->$tran->exp="0312";			
			$this->$tran->amount="1.00";			
			$this->$tran->invoice="1234";   		
			$this->$tran->cardholder="Test T Jones"; 	
			$this->$tran->street="1234 Main Street";	
			$this->$tran->zip="90036";			
			$this->$tran->description="Online Order";	
			$this->$tran->cvv2="435";				
			echo "<h1>Please Wait One Moment While We process your card.<br>\n";
			flush();
			if($this->$tran->Process())
			{
				echo "<b>Card approved</b><br>";
				echo "<b>Authcode:</b> " . $this->$tran->authcode . "<br>";
				echo "<b>AVS Result:</b> " . $this->$tran->avs_result . "<br>";
				echo "<b>Cvv2 Result:</b> " . $this->$tran->cvv2_result . "<br>";
			} else {
				echo "<b>Card Declined</b> (" . $this->$tran->result . ")<br>";
				echo "<b>Reason:</b> " . $this->$tran->error . "<br>";	
				if($this->$tran->curlerror) echo "<b>Curl Error:</b> " . $this->$tran->curlerror . "<br>";	
			}
		}
	}
}
?>
