<?php 
class Account extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Commonmodel');
		$this->load->model('Jewelrymodel');
		$this->load->model('User');
		$this->load->model('Cartmodel');
		$this->load->model('Diamondmodel');
		$this->load->model('Catemodel');
		$this->load->model('Wishlistmodel');
		$this->load->model('Qualitymodel');
		$this->load->library('form_validation');
	}

	private function getCommonData($banner=''){
	 	$data = array();
		$data = $this->Commonmodel->getPageCommonData();
		return $data;
	}

	public function output($layout = null , $data = array() , $isleft = true , $isright = true){
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);
	   	if($isleft)$output .= $this->load->view($this->config->item('template').'left' , $data , true);
		$output .= $layout;
		if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
	}

	public function index(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Your Account';
	    $output = $this->load->view('account/index' , $data , true);
		$this->output($output , $data);		
	}

	public function signin($msg = ''){
		if($this->session->isLoggedin()){
			$this->load->helper('url'); redirect('/account/myaccount' , 'refresh');
		}
		$data = $this->getCommonData(); 
		$data['title'] = 'Login';
		if(($msg != ''))$data['loginerror'] =  $msg ;
		$this->form_validation->set_rules('username', 'User ID', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[35]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['title'] = "Emerald Cut Diamonds|Princess Cut Diamonds|Trillion Cut Diamonds|Asscher Cut Diamonds";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Emerald Cut Diamonds|Princess Cut Diamonds|Trillion Cut Diamonds|Asscher Cut Diamonds">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy online Emerald Cut Diamonds, Princess Cut Diamonds, Trillion Cut Diamonds, Asscher Cut Diamonds, wholesale diamonds rings, tension set diamond ring, wholesale diamonds rings, asscher cut diamonds, emerald cut diamonds, princess cut diamonds, trillion cut diamonds, diamond wedding rings">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Buy online Emerald Cut Diamonds, Princess Cut Diamonds, Trillion Cut Diamonds, Asscher Cut Diamonds, wholesale diamonds rings, tension set diamond ring, wholesale diamonds rings, asscher cut diamonds, emerald cut diamonds, princess cut diamonds, trillion cut diamonds, diamond wedding rings">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
		if ($this->form_validation->run() == FALSE){
			$output = $this->load->view('admin/login' , $data , true); 	
			$this->output($output , $data , false , false);
		}else {
			$loginreturn 	= $this->User->login($data['username'] , $data['password']);
			if($loginreturn['error'] !=''){
				$data['loginerror']  = $loginreturn['error'];
				$output = $this->load->view('admin/login' , $data , true); 	
				$this->output($output , $data , false , false);
			}else{
				$user = $this->session->userdata('user');
				echo "<script>
				window.location.href = '".config_item('base_url')."admin';
				</script>";
				//header('location:'.config_item('base_url').'admin');
			}
		}
	}

	/*my code*/
	public function register2() {
		$data = $this->getCommonData();
		$data['userid'] = $this->session->userdata("userid");
		$data['title'] = "Account registration";
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[5]|xss_clean|strtolower|callback_username_not_exists');
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[5]|xss_clean|callback_name_not_exists');
		$this->form_validation->set_rules('e_mail', 'Email', 'trim|required|valid_email|xss_clean|callback_email_not_exists');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric|min_length[5]|xss_clean');
		$this->form_validation->set_rules('cnf_password', 'Confirm Password', 'trim|required|alpha_numeric|min_length[5]|matches[password]|xss_clean');
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('account/register', $data);
        } else {
            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $password = $this->input->post('password');
            $email = $this->input->post('e_mail');
            $activation_code = 1;
            $this->User->user_register($username, $name, $email, $password, $activation_code);
        }
		$output = $this->load->view('account/register', $data, true);
		$this->output($output, $data, false);
	}

    /*my code*/
	public function signout(){
		$this->User->logout();
		$array_items = array('myallitmes'=>'');
		$this->session->unset_userdata($array_items);
		echo "<script>
		window.location.href = '".config_item('base_url')."account/membersignin';
		</script>";
		//header('location:'.config_item('base_url').'account/membersignin'); 
	}

	public function forgotpassword(){
		echo 'Sorry You forgot password ? we forgot constracting this page ....please keep waiting till we develop this forgot password page. : ! <a href="'.config_item('base_url').'"> Go Back to site</a>';
	}

	/* account management section */
    public function myaccount(){
        $data = $this->getCommonData();
        $data['title'] = 'My Account';
        if($this->session->isLoggedin()){ 
            $data['orders_list'] = $orders_list = $this->Commonmodel->getCustomerOrder();
            $output = $this->load->view('account/myaccount' , $data , true);
            $this->output($output , $data , true ,false);	
		} else {
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
        }	
    }

	/* get order detail */
	public function order_detail($oid=''){
		if($this->session->isLoggedin()){
			$this->load->helper('ordrs_detail');
			$data = $this->getCommonData(); 
			$data['title'] = 'Your Account';
			$data['row_ordt'] = $this->Commonmodel->getOrderDetail($oid);
			$data['itemDetails'] = view_order_details_content($data['row_ordt']['orders_id'], '', 'customer');
		    $output = $this->load->view('account/order_detail' , $data , true);
			$this->output($output , $data , true ,false);	
		}else{
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
		}	
	}

	public function order_returns(){
		if($this->session->isLoggedin()){
			$data = $this->getCommonData(); 
			$data['title'] = 'Your Account';
			$data['returnList'] = $this->Commonmodel->getReturnOrderList();
		    $output = $this->load->view('account/ordereturns_view' , $data , true);
			$this->output($output , $data , true ,false);	
		}else{
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
		}	
	}

	public function managed_returns($id=''){
		if($this->session->isLoggedin()){
			$data = $this->getCommonData(); 
			$data['title'] = 'Your Account';
			$data['orderid'] = $id;
			$data['orders_list'] = $this->Commonmodel->getCustomerOrder();
			$data['row_ordt'] = $this->Commonmodel->getOrderDetail($id);
			$submtOrder = $this->Commonmodel->managedReturnOrder();
			$data['sbquery'] = ( $submtOrder == 'insert' ? '<div class="sucssmsg">Your query has submitted successfully, we will be contact you shortly</div>' : '' );
		    $output = $this->load->view('account/managed_returns' , $data , true);
			$this->output($output , $data , true ,false);	
		}else{
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
		}	
	}

	/* save wishlist data */
	public function account_wishlist($rid='', $action='add', $adoption='addjewelry', $qualitycate=''){
		if( !empty($rid) && $action == 'add' ){
			$this->Wishlistmodel->addproduct(urlencode($rid), 'stock', $adoption, '0', 'size', '', $qualitycate);
			echo "<script>
			window.location.href = '".config_item('base_url')."wishlist';
			</script>";
			//header('location:'.config_item('base_url').'wishlist');
		}

		if($this->session->isLoggedin()){
			$data = $this->getCommonData();
			$data['title'] = 'Wishlist';
			$data['rtMesage'] = '';
			if( !empty($rid) && $action == 'delete' ) {
				$data['rtMesage'] = '<div class="sucssmsg">Ring has deleted successfully from your wishlist</div>';
				$this->Wishlistmodel->deletwishlistitembyid($rid);
			}

			$wishlist_record = $this->Wishlistmodel->getWishListRecord();
			$vwishList = '';
			$vwishList .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th scope="col">Sr #</th>
					<th scope="col">Setting Type</th>
					<th scope="col">Product ID</th>
					<th scope="col">Price</th>
					<th scope="col" class="setalign">Action</th>
				</tr>';
				$i=0;
				$s=1;
				if(count($wishlist_record) > 0) {
					foreach($wishlist_record as $rowishlist) {
						if( $rowishlist['addoption'] == 'stullerings' ) {
							$stuller = $this->Qualitymodel->stullerRingsDetail( $rowishlist['lot'] );
							$seting_type = $stuller['Description'];
							$productID   = $stuller['Sku'];
							$prodPrice   = $stuller['Price'];
							$prodLink = SITE_URL.'qualitystuller/stullerringsdetail/'.$rowishlist['lot'].'?cate=1';
						}elseif($rowishlist['addoption'] == 'qualityrings'){
							$quality = $this->Qualitymodel->qualityProductDetail($rowishlist['lot']);
							$seting_type = $quality['title'];
							$productID   = $quality['style'];
							$prodPrice   = _nf($quality['price'],2);
							$prodLink = SITE_URL.'qualitygold/quality_detail/'.$rowishlist['lot'];
						}elseif($rowishlist['addoption'] == 'addjewelry') {
							$rowrings = $this->Catemodel->getRingsDetailViaId($rowishlist['lot'], '', '');
							$seting_type = $rowrings['category_name'];
							$productID   = $rowrings['style_group'];
							$prodPrice   = _nf($rowrings['priceRetail'],2);
							$prodLink = SITE_URL.'site/engagementRingDetail/'.$rowrings['catid'].'/'.$rowrings['ring_id'];
						} elseif($rowishlist['addoption'] == 'addwatch') {
							$rowrings = $this->Jewelrymodel->getWatchByStock($rowishlist['lot']);
							$seting_type = $rowrings['productName'].' '.getWatchIdType($rowrings['id_type']).' '.$rowrings['case_diameter'];
							$productID   = $rowrings['upc'];
							$prodPrice   = _nf($rowrings['price1'],2);
							$prodLink = SITE_URL.'watches/watches_detail/'.$rowrings['productID'];
						} else {
							$rapnet = $this->Diamondmodel->getDetailsByLot($rowishlist['lot']);
							$seting_type = 'This -cut '.$rapnet['cut'].', '.$rapnet['color'].'-color and '.$rapnet['clarity'].'-clarity diamond comes accompanied by a diamond grading report from the '.$rapnet['Cert'].'.';
							$productID   = $rapnet['Stock_n'];
							$prodPrice   = _nf($rapnet['price'],2);
							$prodLink = SITE_URL.'diamonds/diamond_detail/'.$rowishlist['lot'].'/'.$rowishlist['addoption'].'/'.$rowishlist['cateid'];
						}
						$vwishList .= '<tr>
							<td>'.$s.'</td>
							<td>'.$seting_type.'</td>
							<td>'.$productID.'</td>
							<td>$'.$prodPrice.'</td>
							<td class="setalign"><a href="'.$prodLink.'">View Detail</a>
							| <a href="'.SITE_URL.'wishlist/'.$rowishlist['id'].'/delete'.'">Remove</a>
							</td>
						</tr>';
						$i++;
						$s++;
					}
				} else {
					$vwishList .= '<tr><td colspan="5"><strong>There is currently no wishlist record in your account</strong></td></tr>';
				}
			$vwishList .= '</table>';
			$data['vwishList'] = $vwishList;

			$output = $this->load->view('account/wishlist_views' , $data , true);
			$this->output($output , $data , true ,false);	
		}else{
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
		}
	}

	public function diamond_compare(){
		if($this->session->isLoggedin()){
			$data = $this->getCommonData(); 
			$data['title'] = 'Your Account';
			$dmcompare_list = $this->User->saveCustomerInfo('views', 'diamond_compare');
			$comparList = json_decode($dmcompare_list->diamond_compare);
			$compares_list = '';

			if( count($comparList) > 0 ) {
				foreach($comparList as $dmlot) {
					$diamond_shape = view_shape_value($view_diamondimg, $row_dt['shape']);
					$diamondType = ( $row_dt['fcolor_value'] == '' ? 'White' : 'Color' );
					$wirePrice = _nf( wire_price($row_dt['price']) );
					$row_dt = $this->Diamondmodel->getDetailsByLot($dmlot);
					$compares_list .= '<tr>';
						$compares_list .= '<td width="7%">'.$diamondType.'</td>
						<td width="10%">'.$diamond_shape.'</td>
						<td width="8%">'.$row_dt['carat'].'</td>
						<td width="8%" align="center">'.$row_dt['color'].'</td>
						<td width="9%" align="center">'.$row_dt['clarity'].'</td>
						<td width="7%" align="center">'.$row_dt['Cert'].'</td>
						<td width="10%" align="center">'.$row_dt['cut'].'</td>
						<td width="11%" align="center">$'. _nf($row_dt['price']) .'</td>
						<td width="11%" align="center">$'.$wirePrice.'</td>
						<td width="9%" align="center"><a href="'.config_item('base_url').'diamonds/search/true/'.$row_dt['shape'].'">Compare</a></td>';
					$compares_list .= '</tr>';
				}
			} else {
				$compares_list .= '<tr><td colspan="10"><strong>There is currently no diamond comparison list found</strong></td></tr>';
			}
			$data['compares_list'] = $compares_list;
		    $output = $this->load->view('account/diamond_comparison' , $data , true);
			$this->output($output , $data , true ,false);	
		}else{
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
		}	
	}

	public function address_book(){
		if($this->session->isLoggedin()){
			$data = $this->getCommonData(); 
			$data['title'] = 'Your Account';
			$salesTaxCount = getSalesTaxCount();
			$country_listar = array('USA','Canada',$salesTaxCount,'Australia','UK');
			$option_ctlist = '';
			$optoins_bilcont = '';
			$this->form_validation->set_rules('fname', 'First Name', 'required');		
			$this->form_validation->set_rules('lname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');		
			$this->form_validation->set_rules('phone', 'Phone number', 'required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$row_cust = $this->User->saveCustomerInfo();
			$fname 		= $this->input->post('fname');
			$lname 		= $this->input->post('lname');
			$address1 	= $this->input->post('address1');
			$address2 	= $this->input->post('address2');
			$cmb_country = $this->input->post('cmb_country');
			$city 		= $this->input->post('city');
			$state  	= $this->input->post('state');
			$zipcode 	= $this->input->post('zipcode');
			$phone 		= $this->input->post('phone');
			$email 		= $this->input->post('email');
			$default_ship = $this->input->post('default_ship');
			$default_bill = $this->input->post('default_bill');
			$data['fname'] 	= check_empty($fname, $row_cust->fname);
			$data['lname'] 	= check_empty($lname, $row_cust->lname);
			$data['address1'] = check_empty($address1, $row_cust->address);
			$data['address2'] = check_empty($address2, $row_cust->address2);
			$data['country'] = check_empty($cmb_country, $row_cust->country);
			$data['city']	  = check_empty($city, $row_cust->city);
			$data['province'] = check_empty($state, $row_cust->province);
			$data['postcode']  = check_empty($zipcode, $row_cust->postcode);
			$data['phone']    = check_empty($phone, $row_cust->phone);
			$data['email']    = check_empty($email, $row_cust->email);
			$data['dfship']  = check_empty($default_ship, $row_cust->default_ship);
			$data['dfbill']  = check_empty($default_bill, $row_cust->default_bill);
			$data['biling_fname'] 	= check_empty($this->input->post('biling_fname'), $row_cust->billing_fname);
			$data['biling_lname'] 	= check_empty($this->input->post('biling_lname'), $row_cust->billing_lname);
			$data['biling_address1'] = check_empty($this->input->post('biling_address1'), $row_cust->billing_adres1);
			$data['biling_address2'] = check_empty($this->input->post('biling_address2'), $row_cust->billing_adres2);
			$data['biling_country'] = check_empty($this->input->post('biling_country'), $row_cust->billing_country);
			$data['biling_city']	  = check_empty($this->input->post('biling_city'), $row_cust->billing_city);
			$data['biling_state'] = check_empty($this->input->post('biling_state'), $row_cust->billing_province);
			$data['biling_zipcode']  = check_empty($this->input->post('biling_zipcode'), $row_cust->billing_postcode);
			$data['biling_phone']    = check_empty($this->input->post('biling_phone'), $row_cust->billing_phone);
			$data['biling_email']    = check_empty($this->input->post('biling_email'), $row_cust->billing_email);

			foreach($country_listar as $coun_name) {
				$option_ctlist .= '<option '.selectedOption($coun_name,$data['country']).'>'.$coun_name.'</option>';
			}
			foreach($country_listar as $coun_name) {
				$optoins_bilcont .= '<option '.selectedOption($coun_name,$data['biling_country']).'>'.$coun_name.'</option>';
			}

			$data['option_ctlist'] = $option_ctlist;
			$data['optoins_bilcont'] = $optoins_bilcont;

		    $output = $this->load->view('account/address_book' , $data , true);
			$this->output($output , $data , true ,false);	
		}else{
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
		}	
	}

	public function account_setting($frm=''){
		$data['return_eror']  = '';
		$data['return_eror2'] = '';
		if($this->session->isLoggedin()){
			$data = $this->getCommonData(); 
			$data['title'] = 'Account Setting';
			if(isset($_POST)){	
				$first_name 	= $this->input->post('first_name');
				$last_name 		= $this->input->post('last_name');
				$curr_pass 		= $this->input->post('curr_pass');
				$email_adres 	= $this->input->post('email_adres');
				$newlogin_pass	= $this->input->post('newlogin_pass');
				$confirm_pass 	= $this->input->post('confirm_pass');
				$name_section 	= $this->input->post('name_section');
				$email_section 	= $this->input->post('email_section');
				$row_cust = $this->User->saveCustomerInfo('view');

				$data['first_name']  = check_empty($first_name, $row_cust->fname);
				$data['last_name']   = check_empty($last_name, $row_cust->lname);
				$data['email_adres'] = check_empty($email_adres, $row_cust->email);
				$loginreturn = $this->User->check_correctpass($curr_pass);
				if( !empty($name_section) ) {
					$this->form_validation->set_rules('first_name', 'First Name', 'required');		
					$this->form_validation->set_rules('first_name', 'Last Name', 'required');
					$this->form_validation->set_rules('curr_pass', 'Current Password', 'required');
					if ($this->form_validation->run() == FALSE) {
						$data['return_eror'] = validation_errors();;
					}
					if($loginreturn['error'] == 'error') {
						$data['return_eror'] = 'Please enter the correct login password';
					}
				}
				if( !empty($email_section) ) {
					$this->form_validation->set_rules('email_adres', 'Email', 'trim|required|valid_email');
					$this->form_validation->set_rules('curr_pass', 'Current Password', 'required');
					$this->form_validation->set_rules('newlogin_pass', 'New Password', 'required|min_length[5]|max_length[12]');
					$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');

					if ($this->form_validation->run() == FALSE) {
						$data['return_eror2'] .= validation_errors();;
					}
					if($loginreturn == 'error') {
						$data['return_eror2'] .= 'Plz enter the correct login password';
					}
					if($newlogin_pass != $confirm_pass) {
						$data['return_eror2'] .= 'Confirm password is not matched with New password';
					}
				}

				if( empty($data['return_eror']) && !empty($first_name) ) {
					$this->User->updateAccountSetting();
					$data['return_eror'] = 'Name Preferences are updtatd successfully!';
				}
				if( empty($data['return_eror2']) && !empty($email_adres) ) {
					$data['return_eror2'] = 'Email address and password are updtatd successfully!';
					$this->User->updateAccountSetting();
				}
			}
		    $output = $this->load->view('account/accountsetting_view' , $data , true);
			$this->output($output , $data , true ,false);	
		} else {
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
		}	
	}

	public function account_payment(){
		if($this->session->isLoggedin()){
			$data = $this->getCommonData(); 
			$data['title'] = 'Your Account';
			$submtCard = $this->Commonmodel->managedCardInfoInDB();
			$data['sbquerys'] = ( $submtCard == 'update' ? '<div class="sucssmsg">Your card info has updated successfully!</div>' : '' );
			$data['row_cust'] = $this->User->saveCustomerInfo();
		    $output = $this->load->view('account/account_payments' , $data , true);
			$this->output($output , $data , true ,false);	
		}else{
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
			//header('location:'.config_item('base_url').'account/membersignin');
		}	
	}

	/* account management end */
    public function membersignin2($msg = '') {
        if ($this->session->isLoggedin()) {
            $this->load->helper('url');
            redirect('/account/useraccount', 'refresh');
        }
        $data = $this->getCommonData();
        $data['title'] = 'Login';
        if (($msg != ''))
		$data['loginerror'] = $msg;

		$this->form_validation->set_rules('username', 'User ID', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[35]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['title'] = "User login";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Emerald Cut Diamonds|Princess Cut Diamonds|Trillion Cut Diamonds|Asscher Cut Diamonds">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy online Emerald Cut Diamonds, Princess Cut Diamonds, Trillion Cut Diamonds, Asscher Cut Diamonds, wholesale diamonds rings, tension set diamond ring, wholesale diamonds rings, asscher cut diamonds, emerald cut diamonds, princess cut diamonds, trillion cut diamonds, diamond wedding rings">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Buy online Emerald Cut Diamonds, Princess Cut Diamonds, Trillion Cut Diamonds, Asscher Cut Diamonds, wholesale diamonds rings, tension set diamond ring, wholesale diamonds rings, asscher cut diamonds, emerald cut diamonds, princess cut diamonds, trillion cut diamonds, diamond wedding rings">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        if ($this->form_validation->run() == FALSE) {
            $output = $this->load->view('account/memmbersignin', $data, true);
            $this->output($output, $data, false, false);
        } else {
            $loginreturn = $this->User->loginsiteuser($data['username'], $data['password']);
            if ($loginreturn['error'] != '') {
                $data['errors'] = "Sorry - Wrong Username & Password";
                $output = $this->load->view('account/memmbersignin', $data, true);
                $this->output($output, $data, false, false);
            } else {
                $user = $this->session->userdata('user');
				echo "<script>
				window.location.href = '".config_item('base_url')."account/useraccount';
				</script>";
				//header('location:' . config_item('base_url') . 'account/useraccount/');
            }
        }
    }

    public function trackorder() {
        $data = $this->getCommonData();
        $data['title'] = 'Track Order';
        $data['page'] = 'track';
        if ($_POST) {
            $this->form_validation->set_rules('order_no', 'Order Number', 'trim|required');
            $this->form_validation->set_error_delimiters('<span>', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $data['message'] = '<p style="color:red;">'.validation_errors().'</p>';
            } else {
                $get_order_info = $this->User->getOrderdetails($this->input->post('order_no'));
                if ($get_order_info) {
                    $data['orderInfo'] = $get_order_info['order'];
                    $data['customerInfo'] = $get_order_info['customer'];
                } else {
                    $data['orderInfo'] = FALSE;
                    $data['message'] = '<p style="color:red;">No order found with this email/order#</p>';
                }
            }
        }
        $output = $this->load->view('account/trackorder', $data, true);
        $this->output($output, $data, false);
    }

	public function successfully_registered() {
        $data = $this->getCommonData();
        $data['title'] = "registered successfully";
		redirect('addtocart', 'refresh'); exit;
        $output = $this->load->view('account/successfully_registered', $data, true);
        $this->output($output, $data, false, false);
    }

    public function useraccount() {
        if ($this->session->isLoggedin()) {
            $data = $this->getCommonData();
            $data['title'] = 'Your Account';
            $output = $this->load->view('account/myaccount', $data, true);
            $this->output($output, $data, false, false);
        } else {
			echo "<script>
			window.location.href = '".config_item('base_url')."account/membersignin';
			</script>";
            //header('location:' . config_item('base_url') . 'account/membersignin');
        }
    }

	public function register(){
		$data = $this->getCommonData();
		$data['userid'] = $this->session->userdata("userid");
		$data['title']="Account registration";
		$this->form_validation->set_rules('username', 'Username','trim|required|alpha_numeric|min_length[5]|xss_clean|strtolower|callback_username_not_exists');
		$this->form_validation->set_rules('name', 'Full Name','trim|required|min_length[5]|xss_clean|callback_name_not_exists');
		$this->form_validation->set_rules('e_mail', 'Email', 'trim|required|valid_email|xss_clean|callback_email_not_exists');
		$this->form_validation->set_rules('password', 'Password','trim|required|alpha_numeric|min_length[5]|xss_clean');
		$this->form_validation->set_rules('cnf_password', 'Confirm Password','trim|required|alpha_numeric|min_length[5]|matches[password]|xss_clean');
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Build Diamond Pendant|Build Your Own Diamond Pendant|Buy Diamond Pendant Online">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Build Diamond Pendant, Build Your Own Diamond Pendant, Buy Diamond Pendant Online, cubic zirconia engagement ring, discount engagement ring, engagement ring mountings, engagement rings cheap, mens engagement rings, pave engagement ring online">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('account/register', $data);
		}else{
			$username = $this->input->post('username', TRUE);
			$name = $this->input->post('name', TRUE);
			$password = $this->input->post('password', TRUE);
			$email = $this->input->post('e_mail', TRUE);
			$activation_code = 1;
			$this->User->user_register2($username , $name , $email , $password , $activation_code);
			$loginreturn = $this->User->loginsiteuser2($username, $password);

			/////////// sent email to customer
			$to = $email;
			$subject = 'Signup Successfully!';
			$message = '<html>
				<body>
					<div>Dear '.$name.'</div><br>
					<div>You are registered successfully! at '.SITES_NAME.'</div>
					<div>You can login to <a href="'.SITE_URL.'account/membersignin">click here</a></div><br>
					<div>Regards</div>
					<div>Administrator '.SITES_NAME.'</div>
				</body>
			</html>';

		    // Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: '.SITES_NAME.'<'.SITE_EMAIL.'>' . "\r\n";
			$userid = $this->session->userdata('userid');
			////// save email into db
			$this->Commonmodel->managedEmails($userid, '', 'signup', $subject, $message);
			mail($to,$subject,$message,$headers);

			redirect('addtocart', 'refresh'); exit;
		}  
		$output = $this->load->view('account/register' , $data , true);
		//header('location:'.config_item('base_url').'shoppingbasket/successfully_registered/');
		$this->output($output , $data,false);	
	}

	/* forgot password */
	public function forgetpass($msg='') {
        $this->load->helper('url');
        $data = $this->getCommonData();
        $data['title'] = 'Forgot Password';
		$data['forget_id'] = $id;
        if (($msg != '')) {
            $data['loginerror'] = $msg;
		}
        $this->form_validation->set_rules('txt_email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$data['txt_email'] = $this->input->post('txt_email');
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Forgot Password">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        if ($this->form_validation->run() == FALSE) {
			$data['errors'] = validation_errors();
            $output = $this->load->view('account/forgot_passview', $data, true);
            $this->output($output, $data, false, false);
        } else {
			$rowck_email = $this->User->check_email_address($data['txt_email']);
			if( count($rowck_email) > 0 ) {
				$data['txt_email'] = '';
				$data['errors'] = 'Please check your email to reset your Login Password';
				$to = $rowck_email['email'];
				$subject = "Forgot Password";
				$sid = session_id();
				$message = "<html>
					<head>
						<title>".config_item('base_url')."</title>
					</head>
					<body>
						<div>Dear ".$rowck_email['name']."</div><br>
						<div><a href='".config_item('base_url')."account/password_recover/".$rowck_email['id'].'/'.$sid."'>Click here</a> to reset your passwords</div><br>
						<div>Regards</div>
						<div>".getadmin_contact_info()."</div>
					</body>
				</html>";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: '.getadmin_contact_info().'<'.getadmin_contact_info('email').'>' . "\r\n";
				//$headers .= 'Cc: myboss@example.com' . "\r\n";
				mail($to,$subject,$message,$headers);
			} else {
				$data['errors'] = 'This email address is not register in our account';
			}
            $output = $this->load->view('account/forgot_passview', $data, true);
            $this->output($output, $data, false, false);
		}
	}

	/* forgot password */
	public function password_recover($id = '', $session_id='') {
        $this->load->helper('url');

        $data = $this->getCommonData();
        $data['title'] = 'Forgot Password';
		$data['forget_id'] = $id;
		$data['s_id'] = session_id();
        if (($msg != '')) {
            $data['loginerror'] = $msg;
		}
        $this->form_validation->set_rules('txt_pass', 'New Password', 'trim|required|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$data['txt_pass'] = $this->input->post('txt_pass');
		$data['txt_cpass'] = $this->input->post('confirm_password');
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Forgot Password">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        if ($this->form_validation->run() == FALSE) {
			$data['errors'] = validation_errors();
            $output = $this->load->view('account/forgotpass_recover', $data, true);
            $this->output($output, $data, false, false);
        } else {
			$this->User->update_forgot_pass($id, $data['txt_pass']);
			$custrow = $this->User->getCustInfoDetail($id);
			$to = $custrow->email;
			$subject = "Password Changed Successfully!";
			$message = "<html>
				<head>
					<title>".config_item('base_url')."</title>
				</head>
				<body>
					<div>Dear ".$custrow->name."</div><br>
					<div>Login password has changed successfully!</div><br>
					<div><strong>Login Details :</strong></div><br>
					<div>Usernaem: ".$custrow->username."</div>
					<div>Password: ".$data['txt_pass']."</div><br>
					<div><a href='".config_item('base_url')."account/membersignin'>Click here to login</a></div><br>
					<div>Regards</div>
					<div>".getadmin_contact_info()."</div>
				</body>
			</html>";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: '.getadmin_contact_info().'<'.getadmin_contact_info('email').'>' . "\r\n";
			//$headers .= 'Cc: myboss@example.com' . "\r\n";

			mail($to,$subject,$message,$headers);

			$data['errors'] = 'Password has changed successfully!';
			$data['txt_pass']  = '';
			$data['txt_cpass'] = '';
            $output = $this->load->view('account/forgotpass_recover', $data, true);
            $this->output($output, $data, false, false);
        }
    }

	public function membersignin($msg = '') {
		if ($this->session->isLoggedin()) {
			$this->load->helper('url');
			redirect(SITE_URL.'account/myaccount', 'refresh');	
		}
		$data = $this->getCommonData();
		$data['title'] = 'Member Signin';
		$data['title'] = 'Login';
		if (($msg != '')) {
			$data['loginerror'] = $msg;
		}
		$this->form_validation->set_rules('username', 'User ID', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[35]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$data['username'] = $this->input->post('username', TRUE);
		$data['password'] = $this->input->post('password', TRUE);

		if(isset( $_POST['guest_login_register'])){
			$username = $this->input->post('username_guest', TRUE);
			$name = $this->input->post('name_guest', TRUE);
			$password = $this->input->post('password_guest', TRUE);
			$email = $this->input->post('email_guest', TRUE);
			$activation_code = 1;
			$registerreturn = $this->User->user_guest_register2($username , $name , $email , $password , $activation_code);
			$loginreturn = $this->User->loginsiteuser2($username, $password);

			if ($loginreturn['error'] != '') {
                $data['errors'] = "Sorry - Wrong Username & Password";
                $output = $this->load->view('account/memmbersignin', $data, true);
                $this->output($output, $data, false, false);
            } else {
                $user = $this->session->userdata('user');
				
				$cart_items = $this->Cartmodel->getitemsbysessionid();
				header('location:'.config_item('base_url').'addtocart');exit;
				header('location:' . config_item('base_url') . 'account/useraccount/');
			}
		}

		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Emerald Cut Diamonds|Princess Cut Diamonds|Trillion Cut Diamonds|Asscher Cut Diamonds">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy online Emerald Cut Diamonds, Princess Cut Diamonds, Trillion Cut Diamonds, Asscher Cut Diamonds, wholesale diamonds rings, tension set diamond ring, wholesale diamonds rings, asscher cut diamonds, emerald cut diamonds, princess cut diamonds, trillion cut diamonds, diamond wedding rings">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Buy online Emerald Cut Diamonds, Princess Cut Diamonds, Trillion Cut Diamonds, Asscher Cut Diamonds, wholesale diamonds rings, tension set diamond ring, wholesale diamonds rings, asscher cut diamonds, emerald cut diamonds, princess cut diamonds, trillion cut diamonds, diamond wedding rings">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
		if ($this->form_validation->run() == FALSE) {
			$output = $this->load->view('account/memmbersignin', $data, true);
			$this->output($output, $data, false, false);
		} else {
			$loginreturn = $this->User->loginsiteuser2($data['username'], $data['password']);
            if ($loginreturn['error'] != '') {
				$data['errors'] = "Sorry - Wrong Username & Password";
				$output = $this->load->view('account/memmbersignin', $data, true);
				$this->output($output, $data, false, false);
			} else {
				$user = $this->session->userdata('user');
				$cart_items = $this->Cartmodel->getitemsbysessionid();
				header('location:'.config_item('base_url').'addtocart');exit;
                header('location:' . config_item('base_url') . 'account/useraccount/');
			}
		}
	}

}
?>