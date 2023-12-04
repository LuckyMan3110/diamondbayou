<?php 
class affiliate extends CI_Controller {
	function __construct(){
		parent::__construct();
		$menuArr = !empty($this->uri->segment_array())?$this->uri->segment_array():array();
		$ch_menu = end($menuArr);
		if($ch_menu != 'account_signup'){
			if($ch_menu != 'account_signin'){
				check_whuser_login();
			}
		}
		$this->load->helper('wholesaler');
		$this->load->model('commonmodel');
		$this->load->model('user');
		$this->load->model('Wholesalermodel', 'wholesale');
		$this->load->model('cartmodel');
		$this->load->model('Catemodel', 'catemodel');
		$this->load->helper('date');
	}

	function affiliatepage(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$data['contact_title'] = getadmin_contact_info().' Authorize Reseller';
		$searchField = $this->input->get('search_field');
		$search_field = isset($searchField)?trim(urldecode($searchField)):'rings';
		$data['searchField'] = $search_field;
		$data['getAllShaped'] = $this->getAllShaped();
		$data['getAllStyle'] = $this->getAllStyle($search_field);
		$this->load->view('affiliate/wholesaler_page' , $data);
	}

	private function getCommonData($banner=''){
		$data = array();
		$data = $this->commonmodel->getPageCommonData();

		return $data;
	}

	function output($layout = null , $data = array() , $isleft = true , $isright = true){
		$data['loginlink'] = $this->user->loginhtml();
		$output = $this->load->view($this->config->item('template').'wsale_header' , $data , true);
		if($isleft)$output .= $this->load->view($this->config->item('template').'left' , $data , true);
		$output .= $layout;
		$output .= $this->load->view($this->config->item('template').'wsale_footer', $data , true);
		$this->output->set_output($output);
	}

	function index(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$data['contact_title'] = getadmin_contact_info().' Authorize Reseller';
		$searchField = $this->input->get('search_field');
		$search_field = isset($searchField)?trim(urldecode($searchField)):'rings';
		$data['searchField'] = $search_field;
		$data['getAllShaped'] = $this->getAllShaped();
		$data['getAllStyle'] = $this->getAllStyle($search_field);
		$this->load->view('affiliate/wholesaler_page' , $data);
	}

	function account_login($action_type='account'){
		$data = $this->getCommonData();
		$data['title'] = SITES_NAME;
		$output = $this->load->view('affiliate/account_mgmt', $data, true);
		$this->output($output , $data);	
	}

	function account_signup($action_type='account'){
		$data = $this->getCommonData();
		$data['account_link'] = htmlspecialchars( SITE_URL.'affiliate/account_signup');
		$user = $this->input->post('userName', TRUE);
		$pass = $this->input->post('password1', TRUE);
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$user_acount = $this->wholesale->saveNewUserAccount();
			if( $user_acount == 'fail') {
				$data['account_eror'] = 'This email is already registered here!';
			} else {
				$login_verify = $this->wholesale->loginuser($user, $pass);
			}
		}
		if(!empty($login_verify['login']) ) {
			$allitems = $this->Cartmodel->getitemsbysessionid();
			if( count($allitems) > 0 ) {
				header('Location:'.SITE_URL.'shbasket_wholesale/mybasket'); exit;
			}
			header('Location:'.SITE_URL.'Affiliate/account_information'); exit;	
		}
		$data['title'] = 'Signup Affiliate Program | Diamond BAYOU';
		$output = $this->load->view('affiliate/account_signup', $data, true);
		$this->output($output , $data);	
	}

	function account_signin($action_type='account'){
		$data = $this->getCommonData();
		$data['login_link']   = htmlspecialchars( SITE_URL.'affiliate/account_signin/login');
		$user = $this->input->post('user_name', TRUE);
		$pass = $this->input->post('login_pass', TRUE);
		$login_btn = $this->input->post('login_btn', TRUE);
		$data['login_error'] = '';
		if( !empty($login_btn)){
			$login_verify = $this->wholesale->loginuser($user, $pass);
			$data['login_error'] = isset($login_verify['error'])?$login_verify['error']:'';
		}
		if( !empty($login_verify['login']) ) {
			$allitems = $this->cartmodel->getitemsbysessionid();
			if( count($allitems) > 0 ) {
				header('Location:'.SITE_URL.'shbasket_wholesale/mybasket'); exit;
			}
			header('Location:'.SITE_URL.'affiliate/account_information'); exit;	
		}	
		$data['logins_error'] = $data['login_error'];
		$data['title'] = SITES_NAME;
		$output = $this->load->view('affiliate/account_signin' , $data , true);
		$this->output($output , $data);	
	}

	function account_information(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$data['cust_info'] = $this->wholesale->getWholesalerInfo('view');
		$data['cc_info'] = $data['cust_info']->exp_month.'/'.$data['cust_info']->exp_year.' - '.$data['cust_info']->cvv_code;
		$data['contact_name'] = $data['cust_info']->fname.' '.$data['cust_info']->lname;
		$data['bill_contact'] = $data['cust_info']->billing_fname.' '.$data['cust_info']->billing_lname;

		$output = $this->load->view('affiliate/account_info' , $data , true);
		$this->output($output , $data);	
	}

	function edit_account_info(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$cust_info = $this->wholesale->getWholesalerInfo();		
		$data['cust_info'] = $cust_info;

		$monthList = '';
		$yearList = '';
		for($m=1; $m<=12; $m++) {
			$month = ( $m < 10 ? '0'.$m : $m );
			$monthList .= '<option value="'.$month.'" '.selectedOption($month, date('m')).'>'.$month.'</option>';
		}
		for($y=date('Y'); $y<=2030; $y++) {
			$yearList .= '<option value="'.$y.'" '.selectedOption($y, date('Y')).'>'.$y.'</option>';
		}
		$data['monthList'] = $monthList;
		$data['yearList'] = $yearList;
		if( isset($_POST['submit_btn']) && !empty($_POST['submit_btn']) ) {
			header('Location:'.SITE_URL.'affiliate/account_information'); exit;
		}
	    $output = $this->load->view('affiliate/edit_account_info' , $data , true);
		$this->output($output , $data);	
	}

	function shopping_cart(){
		$data = $this->getCommonData();
		$data['title'] = SITES_NAME;
		$allitems = $this->cartmodel->getitemsbysessionid(); 
		$data['mycartitems'] = $allitems;
		$data['contr_name'] = 'shbasket_wholesale';
		$output = $this->load->view('affiliate/shopping_carts' , $data , true);
		$this->output($output , $data);	
	}

	function custom_design($msg=''){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$data['action'] = htmlspecialchars(SITE_URL.'affiliate/submitCustomDesign');		
		$data['custDesign'] = ( !empty($msg) ? 'Your request has submitted successfully!<br>' : '' );
	    $output = $this->load->view('affiliate/custom_design_request' , $data , true);
		$this->output($output , $data);	
	}

	/* submit custom design request */
	function submitCustomDesign() {	
		if(isset($_POST['submit_request']) && !empty($_POST['submit_request'])) {
			$cid = $this->wholesale->saveCustomDesign();
			$results = $this->wholesale->getCustomDesignDetail($cid);
			$return = '';
			$to = getadmin_contact_info('email'); 
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
						if($_FILES['file_upload1']['name'] && getimagesize($cs_design1) ){	  
							$message .= '<tr>
								<td>Design 1:</td>
								<td><div><a href="'.$cs_design1.'"><img src="'.$cs_design1.'" width="100" alt="Custom Design1" /></a><br></div></td>
							</tr>';
						}
						if($_FILES['file_upload2']['name'] && getimagesize($cs_design2) ){	  
							$message .= '<tr>
								<td>Design 2:</td>
								<td><div><a href="'.$cs_design2.'"><img src="'.$cs_design2.'" width="100" alt="Custom Design2" /></a><br></div></td>
							</tr>';
						}
						if($_FILES['file_upload3']['name'] && getimagesize($cs_design3) ){	  
							$message .= '<tr>
								<td>Design 3:</td>
								<td><div><a href="'.$cs_design3.'"><img src="'.$cs_design3.'" width="100" alt="Custom Design3" /></a></div></td>
							</tr>';
						}
					$message .= '</table>
				</body>
			</html>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: '.$_POST['contact_numb'].'<'.$_POST['contact_email'].'>' . "\r\n";
			$headers .= 'Cc: orders@godstonediamonds.com' . "\r\n";
			$reurn = 'true';
			mail($to,$subject,$message,$headers);
		}
		redirect('affiliate/custom_design/true');
	}

	function wh_orders(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;

		$data['date_from'] = $this->input->post('date_from', TRUE);
		$data['date_to'] = $this->input->post('date_to', TRUE);
		$data['ponumb_field'] = $this->input->post('ponumb_field', TRUE);
		$ordersList = $this->wholesale->getOrderList();

		$viewOrderList = '';
		if( count($ordersList) > 0 ){
			foreach($ordersList as $roworder){
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
		} else {
			$viewOrderList .= '<tr><td colspan="7"><h4 class="norecord">No Records Found!</h4></td></tr>';
		}
		$data['viewOrderList'] = $viewOrderList;

	    $output = $this->load->view('affiliate/orders_page' , $data , true);
		$this->output($output , $data);	
	}

	function wh_invoices(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$data['date_from'] = $this->input->post('date_from', TRUE);
		$data['date_to'] = $this->input->post('date_to', TRUE);
		$pyment_terms = $this->session->userdata('pyment_terms');
		$ordersInvList = $this->wholesale->getOrderList();
		$viewInvoiceLIst = '';
		$grandTotal = 0;
		$amount_due = 0;
		if( count($ordersInvList) > 0 ){
			foreach($ordersInvList as $roworder){
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
		} else {
			$viewInvoiceLIst .= '<tr><td colspan="7"><h4 class="norecord">No Records Found!</h4></td></tr>';
		}
		$data['viewInvoiceLIst'] = $viewInvoiceLIst;

	    $output = $this->load->view('affiliate/invoices_page' , $data , true);
		$this->output($output , $data);	
	}

	function wh_payments(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$data['date_from'] = $this->input->post('date_from', TRUE);
		$data['date_to'] = $this->input->post('date_to', TRUE);
		$data['check_value'] = $this->input->post('check_value', TRUE);
		$ordersPmtList = $this->wholesale->getOrderList();
		$viewPaymtLIst = '';
		$pi = 1;
		if( count($ordersPmtList) > 0 ){
			foreach($ordersPmtList as $roworder){
				$viewPaymtLIst .= '<tr>
                    <td>'._df($roworder['orderdate']).'</td>
                    <td>'.check_empty($roworder['paidby']).'</td>
                    <td>'.check_empty($roworder['check_number']).'</td>
                    <td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>'.getPaymntStatus($roworder['payment_status']).'</td>
                    <td>$'._nf($roworder['totalprice'],2).'</td>
					<td><a href="#javascript;" onClick="viewOrderDt('.$pi.')"><img src="'.WHSITE_IMGURL.'detail_icon.jpg" alt="" /></a></td>
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
		} else {
			$viewPaymtLIst .= '<tr><td colspan="8"><h4 class="norecord">No Records Found!</h4></td></tr>';
		}
		$data['viewPaymtLIst'] = $viewPaymtLIst;

	    $output = $this->load->view('affiliate/payments_views' , $data , true);
		$this->output($output , $data);	
	}

	function change_password(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
		$data['return_eror2'] = '';
		$data['action_link'] = htmlspecialchars(SITE_URL.'affiliate/change_password');
		$curr_pass 		= $this->input->post('curr_pass');
		$newlogin_pass	= $this->input->post('newlogin_pass');
		$confirm_pass 	= $this->input->post('confirm_pass');
		if( isset($curr_pass) && !empty($curr_pass) ){
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
	    $output = $this->load->view('affiliate/change_password' , $data , true);
		$this->output($output , $data);	
	}

	function virtual_webstore(){
		$data = $this->getCommonData(); 
		$data['title'] = SITES_NAME;
		$rowinfo = $this->wholesale->managedVirtualWebstore();
		if(isset($rowinfo) && !empty($rowinfo)){
			$data['comp_name'] 	  = check_post_field('comp_name', $rowinfo->company_name);
			$data['phone_number'] = check_post_field('phone_number', $rowinfo->phone);
			$data['affiliate_url'] 	  = check_post_field('affiliate_url', $rowinfo->affiliate_url);
			$data['affiliate_commission'] = check_post_field('affiliate_commission', $rowinfo->affiliate_commission);
		}else{
			$data['comp_name']		= '';
			$data['phone_number']	= '';
			$data['affiliate_url']	= '';
			$data['affiliate_commission'] = '';
		}
	    $output = $this->load->view('affiliate/virtual_website' , $data , true);
		$this->output($output , $data);	
	}

	function logout(){
		$this->session->unset_userdata('wh_user');
		$this->session->unset_userdata('wh_user_id');
		header('Location:'.SITE_URL.'affiliate/account_login/logout');
	}

	function getAllShaped() {
		$resultshpa = $this->catemodel->getshapeForDev_Index();
		$resultshpb = $this->catemodel->getshapeForJewelries();
		$resultshpc = $this->catemodel->getshapeForEngagementRings();
		$allshpe = array_merge($resultshpa,$resultshpb,$resultshpc);
		$shapeArr = array();
		foreach($allshpe as $shped){
			foreach($shped as $row){
				if(!in_array($row, $shapeArr)){
					$shapeArr[] = $row;
				}
			}
		}
		return $shapeArr;
	}

	function getAllStyle($search_field) {
		$resultshpb = $this->catemodel->getstyleForEngagementRings($search_field);
		$resultshpc = $this->catemodel->getstyleForJewelries($search_field);
		$allstl = array_merge($resultshpb,$resultshpc);
		$styleArr = array();
		foreach($allstl as $style){
			foreach($style as $rows){
				if(!in_array($rows, $styleArr)){
					$styleArr[] = $rows;
				}
			}
		}
		return $styleArr;
	}

	function getrefinesearchresult(){
		$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start']; 
		}else{
			$limit  = 21;
			$offset = 0;
		}
		if(isset($_POST['sort_by']) && $_POST['sort_by'] == 'nowPriceValue_usd_double_Ascending'){
            $sortbyindex = 'price ASC';
			$sortbyus = 'ur.priceRetail ASC';
			$sortbyjew = 'price_website ASC';
			$sortbyring = 'price ASC';
        }elseif(isset($_POST['sort_by']) && $_POST['sort_by'] == 'nowPriceValue_usd_double_Descending'){
            $sortbyindex = 'price DESC';
			$sortbyus = 'ur.priceRetail DESC';
			$sortbyjew = 'price_website DESC';
			$sortbyring = 'price DESC';
        }else{
			$sortbyindex = 'RAND()';
			$sortbyus = 'RAND()';
			$sortbyjew = 'RAND()';
			$sortbyring = 'RAND()';
		}

		$search_field = $_POST['searchField'];
		$greaterThan_price = $_POST['amount_min'];
		$lessThan_price = $_POST['amount_max'];
		if(isset($_POST['shapeArr']) && !empty($_POST['shapeArr'])){
            $stone_shape = $_POST['shapeArr'];
        }else{
			$stone_shape = array();
		}
		if(isset($_POST['caratArr']) && !empty($_POST['caratArr'])){
            $carat = $_POST['caratArr'];
        }else{
			$carat = array();
		}
		if(isset($_POST['typeArr']) && !empty($_POST['typeArr'])){
            $style = $_POST['typeArr'];
        }else{
			$style = array();
		}
		if(!empty($search_field)){
			$totalCount1 = 0; $totalCount2 = 0; $totalCount3 = 0;
			if(!empty($style) && !in_array("Enagagement_rings", $style) && !in_array("Bracelets", $style) && !in_array("Earrings", $style) && !in_array("Necklaces", $style) && !in_array("Wedding Bands", $style) && !in_array("Color Fashion", $style) && !in_array("Diamond Fashion", $style) && !in_array("Bridal Completes", $style) && !in_array("New Arrivals", $style) && in_array("Diamonds", $style)){
				$resultrowb = $this->catemodel->getSearchResultForDev_Index($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyindex);
				$totalCountb = count($resultrowb);
				if(!empty($resultrowb)){
					foreach($resultrowb as $rowb){
						if($rowb['is_lab_diamond'] == 1){
							$view_shapeimage	= $rowb['image_url'];
						}elseif($rowb['image_url'] != '' && file_exists($rowb['image_url'])){
							$view_shapeimage	= SITE_URL . $rowb['image_url'];
						}else{
							if($rowb['shape'] == 'B' || $rowb['shape'] == 'Round'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
							}else if($rowb['shape'] == 'PR' || $rowb['shape'] == 'Princess'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
							}else if($rowb['shape'] == 'C' || $rowb['shape'] == 'Cushion'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
							}else if($rowb['shape'] == 'R' || $rowb['shape'] == 'Radiant'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
							}else if($rowb['shape'] == 'E' || $rowb['shape'] == 'Emerald'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
							}else if($rowb['shape'] == 'P' || $rowb['shape'] == 'Pear'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/pear.jpg';
							}else if($rowb['shape'] == 'P' || $rowb['shape'] == 'Oval'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/oval.jpg';
							}else if($rowb['shape'] == 'AS' || $rowb['shape'] == 'Asscher'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
							}else if($rowb['shape'] == 'M' || $rowb['shape'] == 'Marquise'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
							}else if($rowb['shape'] == 'H' || $rowb['shape'] == 'Heart'){
								$view_shapeimage    = ''.SITE_URL.'images/shapes_images/heart.jpg';
							}else{
								$view_shapeimage    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
							}
						}
						$proname = $rowb['carat'].'-Carat '.$rowb['shape'].' Diamond';
						$detaillinkb = SITE_URL . 'diamonds/diamond_detail/'.$rowb['lot'];
						$make_html = '<div class="product-block OnlyB">
							<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
							<a href="'.$detaillinkb.'" class="product-block__img"><img src="'.$view_shapeimage.'" alt="'.$proname.'" /></a>
							<div class="product-block__pricing">
								<div class="old-pricing">$'. _nf($rowb['price']* 1.25) .'</div>
								<div class="sale-pricing">$'. _nf($rowb['price']) .' <small>(25% off)</small></div>
								<p><b>Stock Number:</b> '.$rowb['lot'].'</p>
							</div>
							<h3 class="product-block__heading"><a href="'.$detaillinkb.'">'.$proname.'</a></h3>
							<div class="product-block__stock product-in-stock">Online Only</div>
							<div class="product-block__ratings">
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
							</div>
						</div>';
						$make_array  = array('0' => $make_html);
						$data[] = $make_array;
					}
				}

				$resultrow1 = $this->catemodel->countSearchResultForDev_Index($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
				$totalCount1 = count($resultrow1);
				$totalCount = $totalCount1;
			}elseif(!empty($style) && !in_array("Diamonds", $style) && !in_array("Bracelets", $style) && !in_array("Earrings", $style) && !in_array("Necklaces", $style) && !in_array("Wedding Bands", $style) && !in_array("Color Fashion", $style) && !in_array("Diamond Fashion", $style) && !in_array("Bridal Completes", $style) && !in_array("New Arrivals", $style) && in_array("Enagagement_rings", $style)){
				$resultrowd = $this->catemodel->getSearchResultForEngagementRings($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyring);
				$totalCountd = count($resultrowd);
				if(!empty($resultrowd)){
					foreach($resultrowd as $rowd){
						if(!empty($rowd['image'])){
							$images = explode(";",$rowd['image']);
							if($rowd['costar_id'] > 0){
								if(file_exists('images/'. $rowd['image_path'].$images[0].'')){
									$ringimage = SITE_URL ."images/". $rowd['image_path'].$images[0];
								}else{
									$ringimage = SITE_URL ."images/". $rowd['image_path'].$images[1];
								}
							}elseif($rowd['overnight_id'] > 0){
								if(file_exists('images/'. $rowd['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
									$ringimage = SITE_URL ."images/". $rowd['image_path'].str_replace("THUMBNAIL/","",$images[0]);
								}else{
									$ringimage = SITE_URL ."images/". $rowd['image_path'].str_replace("THUMBNAIL/","",$images[1]);
								}
							}elseif($rowd['dev_us_id'] > 0){
								if(file_exists(''. $rowd['image_path'].$images[0].'')){
									$ringimage = SITE_URL . $rowd['image_path'].$images[0];
								}else{
									$ringimage = SITE_URL . $rowd['image_path'].$images[1];
								}
							}else{
								if(file_exists('images/'. $rowd['image_path'].$images[0].'')){
									$ringimage = SITE_URL ."images/".$rowd['image_path'].$images[0];
								}else{
									$ringimage = SITE_URL ."images/".$rowd['image_path'].$images[1];
								}
							}
						}else{
							$ringimage = '';
						}
						if($rowd['dev_us_id'] > 0){
							$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$rowd['name']."' AND id = '".$rowd['dev_us_id']."' ";
							$queryClr = $this->db->query($sqlClr);
							$resultClr = $queryClr->row();
							$cur_stones1 = explode(',',$resultClr->supplied_stones);
							$req_tot = 0;
							if(!empty($cur_stones1)){
								foreach($cur_stones1 as $cur_stone1){
									$req_data = explode('-',$cur_stone1);
									$req_tot = $req_tot + (int)$req_data[0];
								}
								$req_tot = $req_tot +1;
							}
							$weightigrm = str_replace(" grams","",$resultClr->metal_weight);
							$metalprc = 70*$weightigrm;
							$stonprc = 14*$req_tot;
							$semiMountprce = $metalprc+$stonprc;
							$finalsemiMountprce = $semiMountprce*1.5;
							$offer_price = $finalsemiMountprce+225;
						}else{
							$offer_price = $rowd['price'];
						}
						$ringName = !empty($rowd['description'])?$rowd['description']:$rowd['name'];
						$detaillinkd = SITE_URL . 'selection/engagement-rings-detail/'.$rowd['id'];
						$make_html = '<div class="product-block OnlyD">
							<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
							<a href="'.$detaillinkd.'" class="product-block__img"><img src="'.$ringimage.'" alt="'.$ringName.'" /></a>
							<div class="product-block__pricing">
								<div class="old-pricing">$'. _nf($offer_price* 1.25) .'</div>
								<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
								<div>Setting price</div>
								<p><b>Stock Number:</b> '.$rowd['item_number'].'</p>
							</div>
							<h3 class="product-block__heading"><a href="'.$detaillinkd.'">'.$ringName.'</a></h3>
							<div class="product-block__stock product-in-stock">Online Only</div>
							<div class="product-block__ratings">
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
							</div>
						</div>';
						$make_array  = array('0' => $make_html);
						$data[] = $make_array;
					}
				}

				$resultrow1 = $this->catemodel->countSearchResultForEngagementRings($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
				$totalCount1 = count($resultrow1);
				$totalCount = $totalCount1;
			}elseif(!empty($style) && !in_array("Enagagement_rings", $style) && !in_array("Diamonds", $style) && !in_array("Wedding Bands", $style) && (in_array("Bracelets", $style) || in_array("Earrings", $style) || in_array("Necklaces", $style) || in_array("Color Fashion", $style) || in_array("Diamond Fashion", $style) || in_array("Bridal Completes", $style) || in_array("New Arrivals", $style))){
				$resultrowc = $this->catemodel->getSearchResultForJewelries($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyjew);
				$totalCountc = count($resultrowc);
				if(!empty($resultrowc)){
					foreach($resultrowc as $rowc){
						if($rowc['is_carol'] == 1){
							if(file_exists($rowc['image1'])){
								$imgPath = SITE_URL .$rowc['image1'];
							}else{
								$imgPath = SITE_URL ."img/no_image_found.jpg";
							}
						}elseif($rowc['is_oneil'] == 1){
							if(file_exists(str_replace("THUMBNAIL/","",$rowc['image1']))){
								$imgPath = SITE_URL .str_replace("THUMBNAIL/","",$rowc['image1']);
							}else{
								$imgPath = SITE_URL ."img/no_image_found.jpg";
							}
						}else{
							if(file_exists($rowc['image1'])){
								$imgPath = $rowc['image1'];
							}else{
								$imgPath = SITE_URL ."img/no_image_found.jpg";
							}
						}
						$proname = '#'.$rowc['name'];
						$detaillinkc = SITE_URL . 'collection/collection-detail/'.$rowc['stock_number'];
						$make_html = '<div class="product-block OnlyC">
							<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
							<a href="'.$detaillinkc.'" class="product-block__img"><img src="'.$imgPath.'" alt="'.$proname.'" /></a>
							<div class="product-block__pricing">
								<div class="old-pricing">$'. _nf($rowc['price_website']*1.25) .'</div>
								<div class="sale-pricing">$'. _nf($rowc['price_website']) .' <small>(25% off)</small></div>
								<p><b>Stock Number:</b> '.$rowc['stock_real_number'].'</p>
							</div>
							<h3 class="product-block__heading"><a href="'.$detaillinkc.'">'.$proname.'</a></h3>
							<div class="product-block__stock product-in-stock">Online Only</div>
							<div class="product-block__ratings">
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
							</div>
						</div>';
						$make_array  = array('0' => $make_html);
						$data[] = $make_array;
					}
				}

				$resultrows1 = $this->catemodel->countSearchResultForJewelries($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
				$totalCounts1 = count($resultrows1);
				$totalCount = $totalCounts1;
			}elseif(!empty($style) && !in_array("Diamonds", $style) && !in_array("Bracelets", $style) && !in_array("Earrings", $style) && !in_array("Necklaces", $style) && !in_array("Color Fashion", $style) && !in_array("Diamond Fashion", $style) && !in_array("Bridal Completes", $style) && !in_array("New Arrivals", $style) && !in_array("Enagagement_rings", $style) && in_array("Wedding Bands", $style)){
				$resultrowa = $this->catemodel->getSearchResultForDev_US($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$limit,$offset,$sortbyus);
				if(!empty($resultrowa)){
					foreach($resultrowa as $rowa){
						$sql = "SELECT ImagePath FROM images WHERE ItemNumber LIKE '".$rowa['name']."' LIMIT 0,1";
						$rsring = $this->db->query($sql);
						$imgrsult = $rsring->row();
						$imgurl = '';
						if($rowa['catid'] == 335 || $rowa['catid'] == 336){
							if(file_exists($imgrsult->ImagePath)){
								$imgurl = SITE_URL .str_replace("THUMBNAIL/","",$imgrsult->ImagePath);
							}
							$offer_price = $rowa['priceRetail'];
						}else{
							if(file_exists('scrapper/imgs/'. $imgrsult->ImagePath .'')){
								$imgurl = SITE_URL .'scrapper/imgs/'. $imgrsult->ImagePath;
							}
							$cur_stones1 = explode(',',$rowa['supplied_stones']);
							$req_tot = 0;
							if(!empty($cur_stones1)){
								foreach($cur_stones1 as $cur_stone1){
									$req_data = explode('-',$cur_stone1);
									$req_tot = $req_tot + (int)$req_data[0];
								}
								$req_tot = $req_tot +1;
							}
							$weightigrm = str_replace(" grams","",$rowa['metal_weight']);
							$metalprc = 70*$weightigrm;
							$stonprc = 85*$req_tot;
							$semiMountprce = $metalprc+$stonprc;
							$finalsemiMountprce = $semiMountprce*1.5;
							$offer_price = $finalsemiMountprce;
						}
						$detaillinka = SITE_URL . 'selection/wedding-bands-detail/'.$rowa['id'];
						$make_htmlf = '<div class="product-block OnlyA">
							<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
							<a href="'.$detaillinka.'" class="product-block__img"><img src="'.$imgurl.'" alt="'.$rowa['name'].'" /></a>
							<div class="product-block__pricing">
								<div class="old-pricing">$'. _nf($offer_price*1.25) .'</div>
								<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
								<p><b>Stock Number:</b> '.$rowa['name'].'</p>
							</div>
							<h3 class="product-block__heading"><a href="'.$detaillinka.'">'. get_site_contact_info('dashboard_title').' #'.$rowa['name'].'</a></h3>
							<div class="product-block__stock product-in-stock">Online Only</div>
							<div class="product-block__ratings">
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
								<div class="product-rating-star is--filled">
									<div></div>
								</div>
							</div>
						</div>';
						$make_array  = array('0' => $make_htmlf);
						$data[] = $make_array;
					}
				}
				$resultrow1 = $this->catemodel->countSearchResultForDev_US($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape);
				$totalCount1 = count($resultrow1);
				$totalCount = $totalCount1;
			}else{
				if($search_field == 'ring' || $search_field == 'rings' || $search_field == 'engagement' || $search_field == 'engagement ring' || $search_field == 'engagement rings'){
					$searchfields = '';
					$resultrowd = $this->catemodel->getSearchResultForEngagementRings($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyring);
					$totalCountd = count($resultrowd);
					if(!empty($resultrowd)){
						foreach($resultrowd as $rowd){
							if(!empty($rowd['image'])){
								$images = explode(";",$rowd['image']);
								if($rowd['costar_id'] > 0){
									if(file_exists('images/'. $rowd['image_path'].$images[0].'')){
										$ringimage = SITE_URL ."images/". $rowd['image_path'].$images[0];
									}else{
										$ringimage = SITE_URL ."images/". $rowd['image_path'].$images[1];
									}
								}elseif($rowd['overnight_id'] > 0){
									if(file_exists('images/'. $rowd['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
										$ringimage = SITE_URL ."images/". $rowd['image_path'].str_replace("THUMBNAIL/","",$images[0]);
									}else{
										$ringimage = SITE_URL ."images/". $rowd['image_path'].str_replace("THUMBNAIL/","",$images[1]);
									}
								}elseif($rowd['dev_us_id'] > 0){
									if(file_exists(''. $rowd['image_path'].$images[0].'')){
										$ringimage = SITE_URL . $rowd['image_path'].$images[0];
									}else{
										$ringimage = SITE_URL . $rowd['image_path'].$images[1];
									}
								}else{
									if(file_exists('images/'. $rowd['image_path'].$images[0].'')){
										$ringimage = SITE_URL ."images/".$rowd['image_path'].$images[0];
									}else{
										$ringimage = SITE_URL ."images/".$rowd['image_path'].$images[1];
									}
								}
							}else{
								$ringimage = '';
							}
							if($rowd['dev_us_id'] > 0){
								$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$rowd['name']."' AND id = '".$rowd['dev_us_id']."' ";
								$queryClr = $this->db->query($sqlClr);
								$resultClr = $queryClr->row();
								$cur_stones1 = explode(',',$resultClr->supplied_stones);
								$req_tot = 0;
								if(!empty($cur_stones1)){
									foreach($cur_stones1 as $cur_stone1){
										$req_data = explode('-',$cur_stone1);
										$req_tot = $req_tot + (int)$req_data[0];
									}
									$req_tot = $req_tot +1;
								}
								$weightigrm = str_replace(" grams","",$resultClr->metal_weight);
								$metalprc = 70*$weightigrm;
								$stonprc = 14*$req_tot;
								$semiMountprce = $metalprc+$stonprc;
								$finalsemiMountprce = $semiMountprce*1.5;
								$offer_price = $finalsemiMountprce+225;
							}else{
								$offer_price = $rowd['price'];
							}
							$ringName = !empty($rowd['description'])?$rowd['description']:$rowd['name'];
							$detaillinkd = SITE_URL . 'selection/engagement-rings-detail/'.$rowd['id'];
							$make_html = '<div class="product-block OnlyD">
								<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
								<a href="'.$detaillinkd.'" class="product-block__img"><img src="'.$ringimage.'" alt="'.$ringName.'" /></a>
								<div class="product-block__pricing">
									<div class="old-pricing">$'. _nf($offer_price*1.25) .'</div>
									<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
									<div>Setting price</div>
									<p><b>Stock Number:</b> '.$rowd['item_number'].'</p>
								</div>
								<h3 class="product-block__heading"><a href="'.$detaillinkd.'">'.$ringName.'</a></h3>
								<div class="product-block__stock product-in-stock">Online Only</div>
								<div class="product-block__ratings">
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
								</div>
							</div>';
							$make_array  = array('0' => $make_html);
							$data[] = $make_array;
						}
					}

					$resultrow1 = $this->catemodel->countSearchResultForEngagementRings($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount1 = count($resultrow1);
					$totalCount = $totalCount1;
				}elseif($search_field == 'wedding' || $search_field == 'bands' || $search_field == 'band' || $search_field == 'wedding bands' || $search_field == 'Wedding Bands'){
					$searchfields = '';
					$resultrowa = $this->catemodel->getSearchResultForDev_US($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$limit,$offset,$sortbyus);
					if(!empty($resultrowa)){
						foreach($resultrowa as $rowa){
							$sql = "SELECT ImagePath FROM images WHERE ItemNumber LIKE '".$rowa['name']."' LIMIT 0,1";
							$rsring = $this->db->query($sql);
							$imgrsult = $rsring->row();
							$imgurl = '';
							if($rowa['catid'] == 335 || $rowa['catid'] == 336){
								if(file_exists($imgrsult->ImagePath)){
									$imgurl = SITE_URL .str_replace("THUMBNAIL/","",$imgrsult->ImagePath);
								}
								$offer_price = $rowa['priceRetail'];
							}else{
								if(file_exists('scrapper/imgs/'. $imgrsult->ImagePath .'')){
									$imgurl = SITE_URL .'scrapper/imgs/'. $imgrsult->ImagePath;
								}
								$cur_stones1 = explode(',',$rowa['supplied_stones']);
								$req_tot = 0;
								if(!empty($cur_stones1)){
									foreach($cur_stones1 as $cur_stone1){
										$req_data = explode('-',$cur_stone1);
										$req_tot = $req_tot + (int)$req_data[0];
									}
									$req_tot = $req_tot +1;
								}
								$weightigrm = str_replace(" grams","",$rowa['metal_weight']);
								$metalprc = 70*$weightigrm;
								$stonprc = 85*$req_tot;
								$semiMountprce = $metalprc+$stonprc;
								$finalsemiMountprce = $semiMountprce*1.5;
								$offer_price = $finalsemiMountprce;
							}
							$detaillinka = SITE_URL . 'selection/wedding-bands-detail/'.$rowa['id'];
							$make_htmlf = '<div class="product-block OnlyA">
								<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
								<a href="'.$detaillinka.'" class="product-block__img"><img src="'.$imgurl.'" alt="'.$rowa['name'].'" /></a>
								<div class="product-block__pricing">
									<div class="old-pricing">$'. _nf($offer_price*1.25) .'</div>
									<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
									<p><b>Stock Number:</b> '.$rowa['name'].'</p>
								</div>
								<h3 class="product-block__heading"><a href="'.$detaillinka.'">'. get_site_contact_info('dashboard_title').' #'.$rowa['name'].'</a></h3>
								<div class="product-block__stock product-in-stock">Online Only</div>
								<div class="product-block__ratings">
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
								</div>
							</div>';
							$make_array  = array('0' => $make_htmlf);
							$data[] = $make_array;
						}
					}
					$resultrow1 = $this->catemodel->countSearchResultForDev_US($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape);
					$totalCount1 = count($resultrow1);
					$totalCount = $totalCount1;
				}elseif($search_field == 'diamond' || $search_field == 'diamonds'){
					$searchfields = '';
					$resultrowb = $this->catemodel->getSearchResultForDev_Index($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyindex);
					$totalCountb = count($resultrowb);
					if(!empty($resultrowb)){
						foreach($resultrowb as $rowb){
							if($rowb['is_lab_diamond'] == 1){
								$view_shapeimage	= $rowb['image_url'];
							}elseif($rowb['image_url'] != '' && file_exists($rowb['image_url'])){
								$view_shapeimage	= SITE_URL . $rowb['image_url'];
							}else{
								if($rowb['shape'] == 'B' || $rowb['shape'] == 'Round'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
								}else if($rowb['shape'] == 'PR' || $rowb['shape'] == 'Princess'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
								}else if($rowb['shape'] == 'C' || $rowb['shape'] == 'Cushion'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
								}else if($rowb['shape'] == 'R' || $rowb['shape'] == 'Radiant'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
								}else if($rowb['shape'] == 'E' || $rowb['shape'] == 'Emerald'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
								}else if($rowb['shape'] == 'P' || $rowb['shape'] == 'Pear'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/pear.jpg';
								}else if($rowb['shape'] == 'P' || $rowb['shape'] == 'Oval'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/oval.jpg';
								}else if($rowb['shape'] == 'AS' || $rowb['shape'] == 'Asscher'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
								}else if($rowb['shape'] == 'M' || $rowb['shape'] == 'Marquise'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
								}else if($rowb['shape'] == 'H' || $rowb['shape'] == 'Heart'){
									$view_shapeimage    = ''.SITE_URL.'images/shapes_images/heart.jpg';
								}else{
									$view_shapeimage    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
								}
							}
							$proname = $rowb['carat'].'-Carat '.$rowb['shape'].' Diamond';
							$detaillinkb = SITE_URL . 'diamonds/diamond_detail/'.$rowb['lot'];
							$make_html = '<div class="product-block OnlyB">
								<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
								<a href="'.$detaillinkb.'" class="product-block__img"><img src="'.$view_shapeimage.'" alt="'.$proname.'" /></a>
								<div class="product-block__pricing">
									<div class="old-pricing">$'. _nf($rowb['price']* 1.25) .'</div>
									<div class="sale-pricing">$'. _nf($rowb['price']) .' <small>(25% off)</small></div>
									<p><b>Stock Number:</b> '.$rowb['lot'].'</p>
								</div>
								<h3 class="product-block__heading"><a href="'.$detaillinkb.'">'.$proname.'</a></h3>
								<div class="product-block__stock product-in-stock">Online Only</div>
								<div class="product-block__ratings">
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
								</div>
							</div>';
							$make_array  = array('0' => $make_html);
							$data[] = $make_array;
						}
					}

					$resultrow1 = $this->catemodel->countSearchResultForDev_Index($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount1 = count($resultrow1);
					$totalCount = $totalCount1;
				}else{
					$resultrowd = $this->catemodel->getSearchResultForEngagementRings($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyring);
					$totalCountd = count($resultrowd);
					if(!empty($resultrowd)){
						foreach($resultrowd as $rowd){
							if(!empty($rowd['image'])){
								$images = explode(";",$rowd['image']);
								if($rowd['costar_id'] > 0){
									if(file_exists('images/'. $rowd['image_path'].$images[0].'')){
										$ringimage = SITE_URL ."images/". $rowd['image_path'].$images[0];
									}else{
										$ringimage = SITE_URL ."images/". $rowd['image_path'].$images[1];
									}
								}elseif($rowd['overnight_id'] > 0){
									if(file_exists('images/'. $rowd['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
										$ringimage = SITE_URL ."images/". $rowd['image_path'].str_replace("THUMBNAIL/","",$images[0]);
									}else{
										$ringimage = SITE_URL ."images/". $rowd['image_path'].str_replace("THUMBNAIL/","",$images[1]);
									}
								}elseif($rowd['dev_us_id'] > 0){
									if(file_exists(''. $rowd['image_path'].$images[0].'')){
										$ringimage = SITE_URL . $rowd['image_path'].$images[0];
									}else{
										$ringimage = SITE_URL . $rowd['image_path'].$images[1];
									}
								}else{
									if(file_exists('images/'. $rowd['image_path'].$images[0].'')){
										$ringimage = SITE_URL ."images/".$rowd['image_path'].$images[0];
									}else{
										$ringimage = SITE_URL ."images/".$rowd['image_path'].$images[1];
									}
								}
							}else{
								$ringimage = '';
							}
							if($rowd['dev_us_id'] > 0){
								$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$rowd['name']."' AND id = '".$rowd['dev_us_id']."' ";
								$queryClr = $this->db->query($sqlClr);
								$resultClr = $queryClr->row();
								$cur_stones1 = explode(',',$resultClr->supplied_stones);
								$req_tot = 0;
								if(!empty($cur_stones1)){
									foreach($cur_stones1 as $cur_stone1){
										$req_data = explode('-',$cur_stone1);
										$req_tot = $req_tot + (int)$req_data[0];
									}
									$req_tot = $req_tot +1;
								}
								$weightigrm = str_replace(" grams","",$resultClr->metal_weight);
								$metalprc = 70*$weightigrm;
								$stonprc = 14*$req_tot;
								$semiMountprce = $metalprc+$stonprc;
								$finalsemiMountprce = $semiMountprce*1.5;
								$offer_price = $finalsemiMountprce+225;
							}else{
								$offer_price = $rowd['price'];
							}
							$ringName = !empty($rowd['description'])?$rowd['description']:$rowd['name'];
							$detaillinkd = SITE_URL . 'selection/engagement-rings-detail/'.$rowd['id'];
							$make_html = '<div class="product-block D">
								<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
								<a href="'.$detaillinkd.'" class="product-block__img"><img src="'.$ringimage.'" alt="'.$ringName.'" /></a>
								<div class="product-block__pricing">
									<div class="old-pricing">$'. _nf($offer_price*1.25) .'</div>
									<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
									<div>Setting price</div>
									<p><b>Stock Number:</b> '.$rowd['item_number'].'</p>
								</div>
								<h3 class="product-block__heading"><a href="'.$detaillinkd.'">'.$ringName.'</a></h3>
								<div class="product-block__stock product-in-stock">Online Only</div>
								<div class="product-block__ratings">
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
									<div class="product-rating-star is--filled">
										<div></div>
									</div>
								</div>
							</div>';
							$make_array  = array('0' => $make_html);
							$data[] = $make_array;
						}
					}
					if($totalCountd < 22){
						$resultrowb = $this->catemodel->getSearchResultForDev_Index($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyindex);
						$totalCountb = count($resultrowb);
						if(!empty($resultrowb)){
							foreach($resultrowb as $rowb){
								if($rowb['is_lab_diamond'] == 1){
									$view_shapeimage	= $rowb['image_url'];
								}elseif($rowb['image_url'] != '' && file_exists($rowb['image_url'])){
									$view_shapeimage	= SITE_URL . $rowb['image_url'];
								}else{
									if($rowb['shape'] == 'B' || $rowb['shape'] == 'Round'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
									}else if($rowb['shape'] == 'PR' || $rowb['shape'] == 'Princess'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
									}else if($rowb['shape'] == 'C' || $rowb['shape'] == 'Cushion'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
									}else if($rowb['shape'] == 'R' || $rowb['shape'] == 'Radiant'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
									}else if($rowb['shape'] == 'E' || $rowb['shape'] == 'Emerald'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
									}else if($rowb['shape'] == 'P' || $rowb['shape'] == 'Pear'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/pear.jpg';
									}else if($rowb['shape'] == 'P' || $rowb['shape'] == 'Oval'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/oval.jpg';
									}else if($rowb['shape'] == 'AS' || $rowb['shape'] == 'Asscher'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
									}else if($rowb['shape'] == 'M' || $rowb['shape'] == 'Marquise'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
									}else if($rowb['shape'] == 'H' || $rowb['shape'] == 'Heart'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/heart.jpg';
									}else{
										$view_shapeimage    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
									}
								}
								$proname = $rowb['carat'].'-Carat '.$rowb['shape'].' Diamond';
								$detaillinkb = SITE_URL . 'diamonds/diamond_detail/'.$rowb['lot'];
								$make_html = '<div class="product-block B">
									<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
									<a href="'.$detaillinkb.'" class="product-block__img"><img src="'.$view_shapeimage.'" alt="'.$proname.'" /></a>
									<div class="product-block__pricing">
										<div class="old-pricing">$'. _nf($rowb['price']* 1.25) .'</div>
										<div class="sale-pricing">$'. _nf($rowb['price']) .' <small>(25% off)</small></div>
										<p><b>Stock Number:</b> '.$rowb['lot'].'</p>
									</div>
									<h3 class="product-block__heading"><a href="'.$detaillinkb.'">'.$proname.'</a></h3>
									<div class="product-block__stock product-in-stock">Online Only</div>
									<div class="product-block__ratings">
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
									</div>
								</div>';
								$make_array  = array('0' => $make_html);
								$data[] = $make_array;
							}
						}
					}
					if($totalCountb < 22){
						$resultrowc = $this->catemodel->getSearchResultForJewelries($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyjew);
						$totalCountc = count($resultrowc);
						if(!empty($resultrowc)){
							foreach($resultrowc as $rowc){
								if($rowc['is_carol'] == 1){
									if(file_exists($rowc['image1'])){
										$imgPath = SITE_URL .$rowc['image1'];
									}else{
										$imgPath = SITE_URL ."img/no_image_found.jpg";
									}
								}elseif($rowc['is_oneil'] == 1){
									if(file_exists(str_replace("THUMBNAIL/","",$rowc['image1']))){
										$imgPath = SITE_URL .str_replace("THUMBNAIL/","",$rowc['image1']);
									}else{
										$imgPath = SITE_URL ."img/no_image_found.jpg";
									}
								}else{
									if(file_exists($rowc['image1'])){
										$imgPath = $rowc['image1'];
									}else{
										$imgPath = SITE_URL ."img/no_image_found.jpg";
									}
								}
								$proname = '#'.$rowc['name'];
								$detaillinkc = SITE_URL . 'collection/collection-detail/'.$rowc['stock_number'];
								$make_html = '<div class="product-block C">
									<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
									<a href="'.$detaillinkc.'" class="product-block__img"><img src="'.$imgPath.'" alt="'.$proname.'" /></a>
									<div class="product-block__pricing">
										<div class="old-pricing">$'. _nf($rowc['price_website']*1.25) .'</div>
										<div class="sale-pricing">$'. _nf($rowc['price_website']) .' <small>(25% off)</small></div>
										<p><b>Stock Number:</b> '.$rowc['stock_real_number'].'</p>
									</div>
									<h3 class="product-block__heading"><a href="'.$detaillinkc.'">'.$proname.'</a></h3>
									<div class="product-block__stock product-in-stock">Online Only</div>
									<div class="product-block__ratings">
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
									</div>
								</div>';
								$make_array  = array('0' => $make_html);
								$data[] = $make_array;
							}
						}
					}
					$resultrow1 = $this->catemodel->countSearchResultForEngagementRings($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount1 = count($resultrow1);
					$resultrow2 = $this->catemodel->countSearchResultForJewelries($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount2 = count($resultrow2);
					$resultrow3 = $this->catemodel->countSearchResultForDev_Index($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount3 = count($resultrow3);
					$totalCount = (!empty($totalCount1)?$totalCount1:0)+(!empty($totalCount2)?$totalCount2:0)+(!empty($totalCount3)?$totalCount3:0);
					
					if(empty($totalCount)){
						$resultrowz = $this->catemodel->getSearchResultForDevIndex($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyindex);
						if(!empty($resultrowz)){
							foreach($resultrowz as $rowb){
								if($rowb['is_lab_diamond'] == 1){
									$view_shapeimage	= $rowb['image_url'];
								}elseif($rowb['image_url'] != '' && file_exists($rowb['image_url'])){
									$view_shapeimage	= SITE_URL . $rowb['image_url'];
								}else{
									if($rowb['shape'] == 'B' || $rowb['shape'] == 'Round'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
									}else if($rowb['shape'] == 'PR' || $rowb['shape'] == 'Princess'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
									}else if($rowb['shape'] == 'C' || $rowb['shape'] == 'Cushion'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
									}else if($rowb['shape'] == 'R' || $rowb['shape'] == 'Radiant'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
									}else if($rowb['shape'] == 'E' || $rowb['shape'] == 'Emerald'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
									}else if($rowb['shape'] == 'P' || $rowb['shape'] == 'Pear'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/pear.jpg';
									}else if($rowb['shape'] == 'P' || $rowb['shape'] == 'Oval'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/oval.jpg';
									}else if($rowb['shape'] == 'AS' || $rowb['shape'] == 'Asscher'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
									}else if($rowb['shape'] == 'M' || $rowb['shape'] == 'Marquise'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
									}else if($rowb['shape'] == 'H' || $rowb['shape'] == 'Heart'){
										$view_shapeimage    = ''.SITE_URL.'images/shapes_images/heart.jpg';
									}else{
										$view_shapeimage    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
									}
								}
								$proname = $rowb['carat'].'-Carat '.$rowb['shape'].' Diamond';
								$detaillinkb = SITE_URL . 'diamonds/diamond_detail/'.$rowb['lot'];
								$make_html = '<div class="product-block B">
									<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
									<a href="'.$detaillinkb.'" class="product-block__img"><img src="'.$view_shapeimage.'" alt="'.$proname.'" /></a>
									<div class="product-block__pricing">
										<div class="old-pricing">$'. _nf($rowb['price']* 1.25) .'</div>
										<div class="sale-pricing">$'. _nf($rowb['price']) .' <small>(25% off)</small></div>
										<p><b>Stock Number:</b> '.$rowb['lot'].'</p>
									</div>
									<h3 class="product-block__heading"><a href="'.$detaillinkb.'">'.$proname.'</a></h3>
									<div class="product-block__stock product-in-stock">Online Only</div>
									<div class="product-block__ratings">
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
										<div class="product-rating-star is--filled">
											<div></div>
										</div>
									</div>
								</div>';
								$make_array  = array('0' => $make_html);
								$data[] = $make_array;
							}
						}
						$resultrowsz = $this->catemodel->countSearchResultForDevIndex($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
						$totalCount = count($resultrowsz);
					}
				}
			}
		}

        $json_data = array(
			"draw"            => intval($params['draw']),
			"recordsTotal"    => intval($totalCount),
			"recordsFiltered" => intval($totalCount),
			"data"            => $data
		);
	    echo json_encode($json_data);
	}
}