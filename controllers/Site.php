<?php 
class Site extends CI_Controller {
	public $sign_upform = '';
	public function __construct(){
		parent::__construct();
		$this->load->model('Jewelleriesmodel');
		$this->load->model('Jewelrymodel');
		$this->load->model('Diamondmodel');
		$this->load->model('Engagementmodel');
		$this->load->model('Commonmodel');
		$this->load->model('Catemodel');
		$this->load->model('User');
		$this->sign_upform = signup_form();
		$this->session->unset_userdata('whsale_section');
		$this->load->helper('ringsection');
	}

	function Site(){
		parent::__construct();
	}

	function index(){
		$data = $this->getCommonData(); 
		$data['title'] = "Buy Diamond Ring|Earrings|Pendant|Three Stone Ring|Online Jewellary Store|Jewellary Ring Online";
		$data['meta_tags'] = '<meta name="title" content="Buy Diamond Ring|Earrings|Pendant|Three Stone Ring|Online Jewellary Store|Jewellary Ring Online">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Online Jewellary Store offers to Buy Discounted Rate Engagement Diamond Ring, Earings, Three Stone Ring, Diamond Pendant, Loose Diamonds, Premium Diamond. Build your own Ring, Earrings, Three Stone Ring, Diamond Pendant Online. Purchase Engagement Ring at Discounted Price at Intercarts.">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Online Jewellary Store, Engagement Diamond Ring, Earings, Three Stone Ring, Diamond Pendant, Loose Diamonds, Premium Diamond. Build your own Ring, Diamond Pendant Online, Purchase Engagement Ring">
		<meta name="author" content="'.get_site_contact_info('sites_title').'">
		<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
		<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">';

	    $output = $this->load->view('diamond/index' , $data , true);
		$this->output($output , $data);		
	}

	function pick_bling(){
		$data = $this->getCommonData(); 
		$data['title'] = "Pick Your Bling";
		$fileName = $this->config->item('template').'pick_bling';

		$output = $this->load->view($fileName, $data , true); 		
		$this->output($output , $data);
	}

	function pick_cause(){
		$data = $this->getCommonData(); 
		$data['title'] = "Pick Your Cause";
		$fileName = $this->config->item('template').'pick_cause';

		$output = $this->load->view($fileName, $data , true); 		
		$this->output($output , $data);
	}

	/* Set pick cause SING UP */
	function managPickCauseSubs() {
		$saveSubsForm  = $this->Jewelrymodel->manageCauseSubs();
		if($saveSubsForm != '') {
			
			$to = $this->input->post('pcfirstname', TRUE);
			$subject = "SING UP Successfully!";

			$this->Commonmodel->managedEmails($saveSubsForm, '', 'subscriber', 'Subscriber Signup Successfully!', 'New subscriber has subscribed successfully!');
			$subsc_name = $this->input->post('pcfirstname', TRUE).' '.$this->input->post('pclastname', TRUE);
			$message = '<html>
				<head></head>
				<body>
					<div>Dear '.$subsc_name.'</div>
					<div>Thank You for Subscribing to '.getadmin_contact_info().' Pick Causes.</div>
				</body>
			</html>';

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: '.SITE_ADDRESS.'<'.SITE_EMAIL.'>' . "\r\n";
			mail($to,$subject,$message,$headers);
			echo 1;
		} else {
			echo 2;
		}
	}

	function purchase_help(){
		$data = $this->getCommonData(); 
		$data['title'] = "Purchase Help";
		$fileName = $this->config->item('template').'purchase_help';

		$output = $this->load->view($fileName, $data , true); 		
		$this->output($output , $data);
	}

	private function getCommonData($banner=''){   
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();

		return $data;
	}

	function output($layout = null , $data = array() , $isleft = true , $isright = true){
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);
		if($isleft)$output .= $this->load->view($this->config->item('template').'left' , $data , true);
		$output .= $layout;
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
	}

	function output2($layout = null , $data = array() , $isleft = true , $isright = true){
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);
		if($isleft)$output .= $this->load->view($this->config->item('template').'siteleft' , $data , true);
		$output .= '<div class="col-sm-6">'.$layout.'</div>';
		if($isright)$output .= $this->load->view($this->config->item('template').'siteright' , $data , true);
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
	}

	function setPageLocatoinsLists() {
		$rows = $this->Commonmodel->getLocationsList();
		$page_list = '<ul>';
			foreach( $rows as $row ) {
				$page_list .= '<li><a href="'.SITE_URL.'site/page/'.$row['topicid'].'/view">'.$row['description'].'</a></li>';
			}
		$page_list .= '</ul>';

		return $page_list;
	}
	
	function page($topic = 'aboutus', $type=''){
		$this->load->helper('content_page');

		$data = $this->getCommonData($topic);
		$row_content = $this->Commonmodel->getCompanyInfoRow($topic);
		$data['content'] = check_empty($row_content['content'], 'Coming Soon');
		$data['content_title'] = check_empty($row_content['description'], 'Coming Soon');
		$data['analytic_code'] = $row_content['analytic_code'];
		$data['collection_cate_id'] = ''; // this variable is define in heartdiamond file

		if( !empty($row_content['head_title']) ) {
			$data['title'] = $row_content['head_title'];
		} elseif( !empty($row_content['description']) ) {
			$data['title'] = $row_content['description'];
		} else {
			$data['title'] = getadmin_contact_info('sites_title');
		}

		$data['page_left_menus'] = '';//( empty($type) ? content_page_left_menu() : $this->setPageLocatoinsLists() );
		$meta_keywords    = check_empty($row_content['meta_keywords'], $data['title']);
		$meta_description = check_empty($row_content['meta_description'], $data['title']);

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cont_fname', 'First Name', 'required');
		$this->form_validation->set_rules('cont_lname', 'Last Name', 'required');
		$this->form_validation->set_rules('cont_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('cont_desc', 'Description', 'required');
		$this->form_validation->set_rules('cont_pno', 'Phone Number', 'required');

		if($topic == 'aboutus') {
			$data['title'] = "3 Stone Diamond Ring|Antique Diamond Ring|Set Engagement Ring|Pave Diamond Rings";
		} else {
			$data['meta_tags'] = '<meta name="description" content="'.$meta_description.'"><meta name="keywords" content="'.$meta_keywords.'">';
		}

		$data['signup_form'] = $this->sign_upform;
	
		$link_last_seg           = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $link_array_last_seg     = explode('/',$link_last_seg);
        $page_last_seg           = end($link_array_last_seg);
        $page_last_seg           = ucwords(str_replace('-',' ',$page_last_seg));
		
		$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$page_last_seg.'">
		<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$page_last_seg.'">
		<meta name="author" content="'.get_site_contact_info('sites_title').'">
		<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
		<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">';

		if($topic  === 'contactus') {
			$data['title'] = 'Contact Us';
                        
			$error_message = ( ($this->form_validation->run() == FALSE) ? 'error' : 'sent' );
			$cont_fname = $this->input->post('cont_fname', TRUE);
			$cont_lname = $this->input->post('cont_lname', TRUE);
			$fullName = $cont_fname.' '.$cont_lname;
			
			$cont_email = $this->input->post('cont_email', TRUE);
			$cont_pno   = $this->input->post('cont_pno', TRUE);
			$cont_hear  = $this->input->post('cont_hear', TRUE);
			$cont_desc  = $this->input->post('cont_desc', TRUE);
			$data['error_message'] = '';
			
			if(isset($cont_fname) && $error_message == 'sent') {
				
				$data['error_message'] = $error_message;
			
			$tomail = SITE_EMAIL;
			$subject = "Contact Us Inquiry";
			
				$message = '
				<html>
				<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
				<title></title>
				</head>
				<body>
					<table width="100%" border="0" cellspacing="2" cellpadding="2">
					<tr>
					<td width="20%"><strong>Contact Name:</strong></td>
					<td width="80%">'.$fullName.'</td>
					</tr>
					<tr>
					<td><strong>Email :</strong></td>
					<td>'.$cont_email.'</td>
					</tr>
					<tr>
					<td><strong>Phone No.</strong></td>
					<td>'.$cont_pno.'</td>
					</tr>
					<tr>
					<td><strong>Hear From:</strong></td>
					<td>'.$cont_hear.'</td>
					</tr>
					<tr>
					<td><strong>Description:</strong></td>
					<td>'.$cont_desc.'</td>
					</tr>
					</table>
				</body>
				</html>';
				
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				
				// More headers
				$headers .= 'From: <'.$cont_email.'>' . "\r\n";
			
				mail(SITE_EMAIL,$subject,$message,$headers);
			}
			$fileName = $this->config->item('template').'contact_us';
						
		} else {
			$fileName = $this->config->item('template').'printcontent';
		}
		$output = $this->load->view($fileName, $data , true); 		
		$this->output($output , $data);		
	}

	function jewelary($page) {
		if($page == 'engagement'){
			$output = $this->load->view('pages/engagement', $data, true);
			$this->output($output, $data, false);
		}
		if($page == 'diamond'){
			$output = $this->load->view('pages/diamond', $data, true);
			$this->output($output, $data, false);
		}
		if($page == 'wedding'){
			$output = $this->load->view('pages/wedding', $data, true);
			$this->output($output, $data, false);
		}
		if($page == 'custom'){
			$data['title'] = 'Custom Design';
			$data['email_send'] = '';
			$data['submit_link'] = SITE_URL . 'site/jewelary/custom';
			$submit_req_btn = $this->input->post('submit_req_btn', TRUE);
			if( !empty($submit_req_btn) ) {
				$this->customDesignEmailSent();
				$data['email_sent'] = '<div class="submit_inquiry">Your Inquiry has submitted successfully!</div>';
			}
			$output = $this->load->view('pages/custom_design_page_view', $data, true);
			$this->output2($output, $data, true, true);
		}
    	if($page == 'jewelary'){
			$output = $this->load->view('pages/jewelary', $data, true);
			$this->output($output, $data, false);
		}
    	if($page == 'resources'){
			$output = $this->load->view('pages/resources', $data, true);
			$this->output($output, $data, false);
		}
	}

	/* custom design email sent */
	function customDesignEmailSent() {
		$full_name      = $this->input->post('full_name', TRUE);
		$req_date       = $this->input->post('req_date', TRUE);
		$phone_number   = $this->input->post('telephone_number', TRUE);
		$email_address  = $this->input->post('email_address', TRUE);
		$mail_address   = $this->input->post('mailing_address', TRUE);
		$fax_number     = $this->input->post('fax_number', TRUE);
		$item_budget    = $this->input->post('item_budget', TRUE);
		$size_width     = $this->input->post('size_width', TRUE);
		$size_height    = $this->input->post('size_height', TRUE);
		$item_size      = $size_width . ' x ' . $size_height;
		$item_carat_kt  = $this->input->post('item_carat_kt', TRUE);
		$metal_color    = $this->input->post('metal_color', TRUE);
		$metal_weight   = $this->input->post('metal_weight', TRUE);
		$diamond_stone  = $this->input->post('diamond_stone', TRUE);
		$diamond_color  = $this->input->post('diamond_color', TRUE);
		$saphire_stones_color = $this->input->post('saphire_stones_color', TRUE);
		$diamond_quality = $this->input->post('diamond_quality', TRUE);
		$message_sumry  = $this->input->post('message_sumry', TRUE);
		$today_date = date('Y-m-d');

		$design_img = '';
		if($_FILES['uploadFileLLogo']['tmp_name']!=''){	
			$fileF			= $_FILES['uploadFileLLogo']['name'];
			$thumb_file		= $_FILES['uploadFileLLogo']['name'];
			$filepathF		= 'assets/ring_design/'.$fileF;
			$thumb_filepath = 'assets/ring_design/thumb/'.$thumb_file;
			$i=0;
			while(file_exists($filepathF)) {
				$i++;
				$fileF		= $i.basename($_FILES['uploadFileLLogo']['name']);
				$thumb_file = $i.basename($_FILES['uploadFileLLogo']['name']);
				$filepathF	= 'assets/ring_design/'.$fileF;
				$thumb_filepath	= 'assets/ring_design/thumb/'.$thumb_file;
			}

			if(!move_uploaded_file($_FILES['uploadFileLLogo']['tmp_name'] , $filepathF)){
				$this->session->set_flashdata('alert_msg', array('failure', 'Update Setting', 'Problem occured during loading the file!'));
				redirect(base_url() . 'site/jewelary/custom');
				die();
			}else{
				if (!file_exists('assets/ring_design/thumb')) {
					mkdir('assets/ring_design/thumb', 0777, true);
				}
				$this->createThumbs($thumb_file,'assets/ring_design/thumb/',$width,$height,'assets/ring_design/');
				$design_img = $fileF;
			}
		}

		$insert_data = array(
			'contact_name'			=> $this->input->post('full_name', TRUE),
			'contact_email'			=> $this->input->post('email_address', TRUE),
			'contact_phone'			=> $this->input->post('telephone_number', TRUE),
			'custom_desc'			=> $this->input->post('message_sumry', TRUE),
			'req_date'				=> $this->input->post('req_date', TRUE),
			'mailing_address'		=> $this->input->post('mailing_address', TRUE),
			'fax_number'			=> $this->input->post('fax_number', TRUE),
			'item_budget'			=> $this->input->post('item_budget', TRUE),
			'size_width'			=> $this->input->post('size_width', TRUE),
			'size_height'			=> $this->input->post('size_height', TRUE),
			'item_carat_kt'			=> $this->input->post('item_carat_kt', TRUE),
			'metal_color'			=> $this->input->post('metal_color', TRUE),
			'metal_weight'			=> $this->input->post('metal_weight', TRUE),
			'diamond_stone'			=> $this->input->post('diamond_stone', TRUE),
			'diamond_color'			=> $this->input->post('diamond_color', TRUE),
			'saphire_stones_color'	=> $this->input->post('saphire_stones_color', TRUE),
			'diamond_quality'		=> $this->input->post('diamond_quality', TRUE),
			'message_sumry'			=> $this->input->post('message_sumry', TRUE),
			'design_img1'			=> $design_img,
			'request_date'			=> $today_date
		);

		/* insert_into_any_table  dev_custom_designs */
		$this->Jewelrymodel->insert_into_any_table($insert_data, 'dev_custom_designs');

        $to = getadmin_contact_info('email');
        $subject = "Custom Design Inquiry";

		$message = '<html>
			<head>
				<style>
				table tr th, table tr td{vertical-align:top;}
				</style>
			</head>
			<body>
				<p>New Custom Design Inquiry has received in  '.getadmin_contact_info().'. <br>Custom Design Inquiry info has listed below:</p>
				<table width="100%" border="0" cellspacing="2" cellpadding="5" style="text-align:left;">
					<tr>
						<th width="40%">Full Name:</th>
						<td width="60%">'.$full_name.'</td>
					</tr>
					<tr>
						<th>Date:</th>
						<td>'.$req_date.'</td>
					</tr>
					<tr>
						<th>Telephone Number:</th>
						<td>'.$phone_number.'</td>
					</tr>
					<tr>
						<th>Email Address:</th>
						<td>'.$email_address.'</td>
					</tr>
					<tr>
						<th>Mailing Address:</th>
						<td>'.$mail_address.'</td>
					</tr>
					<tr>
						<th>Fax Number:</th>
						<td>'.$fax_number.'</td>
					</tr>
					<tr>
						<th>Budget:</th>
						<td>'.$item_budget.'</td>
					</tr>
					<tr>
						<th>Size:</th>
						<td>'.$item_size.'</td>
					</tr>
					<tr>
						<th>Color:</th>
						<td>'.$metal_color.'</td>
					</tr>
					<tr>
						<th>KT Size:</th>
						<td>'.$item_carat_kt.'</td>
					</tr>
					<tr>
						<th>Weight:</th>
						<td>'.$metal_weight.'</td>
					</tr>
					<tr>
						<th>DIAMONDS OR SAPHIRE STONES (MAN MADE DIAMONDS) SELECT ONE:</th>
						<td>'.$diamond_stone.'</td>
					</tr>
					<tr>
						<th>DIAMOND COLOR : WHAT COLOR DIAMONDS WOULD YOU LIKE USED IN YOUR CUSTOM JEWELRY?:</th>
						<td>'.$diamond_color.'</td>
					</tr>
					<tr>
						<th>*OUR SAPHIRE STONES COME IN ALL COLORS SO PLEASE LIST WHICH COLORS YOU WOULD LIKE TO USE:</th>
						<td>'.$saphire_stones_color.'</td>
					</tr>
					<tr>
						<th>DIAMOND QUALITY: THE COST INCREASES THE HIGHER THE QUALITY:</th>
						<td>'.$diamond_quality.'</td>
					</tr>
					<tr>
						<th>Summary:</th>
						<td>'. str_replace("\n", "<br>", $message_sumry).'</td>
					</tr>
				</table><br /><br />
				<div>Regards,</div>
			</body>
		</html>';
		
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: ".$full_name." ".$email_address."\n";
		$headers .= "Content-type: text/html\r\n";
		$headers .= 'Bcc: support@godstonediamonds.com\r\n';
		$headers .= "Reply-To: $email_address";

        mail($to,$subject,$message,$headers);

        return 'Email has sent successfully!';
	}

	public function createThumbs($file, $pathToThumbs, $thumbWidth ,$thumbHeight =0,$filepath=''){
		$pathToImages = $filepath.$file;
		$info = pathinfo($pathToImages);
		if(strtolower($info['extension']) == 'jpg'  or  strtolower($info['extension']) == 'jpeg'){
			$img = imagecreatefromjpeg($pathToImages);
			$width = imagesx( $img );
			$height = imagesy( $img );
			if($thumbWidth >0){
				$new_width = $thumbWidth;
			}else{
				$new_width = floor( $width * ( $thumbHeight / $height ) );
			}

			if($thumbHeight >0){
				$new_height = $thumbHeight;
			}else{
				$new_height = floor( $height * ( $thumbWidth / $width ) );
			}

			$tmp_img = imagecreatetruecolor( $new_width, $new_height );
			imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			imagejpeg( $tmp_img, $pathToThumbs.$file );
		}else if(strtolower($info['extension']) == 'gif'){
			$img = imagecreatefromgif($pathToImages);
			$width = imagesx( $img );
			$height = imagesy( $img );

			if($thumbWidth >0){
				$new_width = $thumbWidth;
			}else{
				$new_width = floor( $width * ($thumbHeight / $height));
			}
			if($thumbHeight >0){
				$new_height = $thumbHeight;
			}else{
				$new_height = floor( $height * ($thumbWidth / $width));
			}

			$tmp_img = imagecreatetruecolor( $new_width, $new_height );
			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			imagegif( $tmp_img, $pathToThumbs.$file );
		}elseif(strtolower($info['extension']) == 'png'){
			$img = imagecreatefrompng($pathToImages);
			$width = imagesx( $img );
			$height = imagesy( $img );

			if($thumbWidth >0){
				$new_width = $thumbWidth;
			}else{
				$new_width = floor( $width * ( $thumbHeight / $height ) );	
			}
			if($thumbHeight >0){
				$new_height = $thumbHeight;
			}else{
				$new_height = floor( $height * ( $thumbWidth / $width ) );
			}

			$tmp_img = imagecreatetruecolor( $new_width, $new_height );
			imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
			imagepng( $tmp_img, $pathToThumbs.$file );
		}
	}

	/* function setsession($sessionvar = 'temp', $session_value = ''){
		$sessionvalue = urldecode($session_value);
		$sessionvalue = str_ireplace('_' , '.' , $sessionvalue);
		$this->session->set_userdata($sessionvar,$sessionvalue);
	} */

	function setsession($sessionvar = 'temp', $session_value = ''){
		$sessionvalue = urldecode($session_value);
		$sessionvalue = str_ireplace('_' , '.' , $sessionvalue);
		$this->session->set_userdata($sessionvar,$sessionvalue);
	}

	function clearsessions(){
	    $this->session->sess_destroy();
	}

	function ringdetails($stockno = '', $ringoption='',$lot = ''){
		$data = $this->getCommonData();
		$lot	= ($lot == 'undefined') ? 0 : $lot ;
		
		$data['products'] = $this->Diamondmodel->getDetailsByLot($lot);
		$data['details'] = $this->Jewelrymodel->getAllByStock($stockno);				
		$data['stockno'] = $stockno;
		$data['ringoption'] = $ringoption;
		$data['lot'] = $lot;
		$data['flashfiles']	= $this->Engagementmodel->getFlashByStockId($stockno);
		if($data['details']){
			$output = $this->load->view('erd/ringdetails' , $data , true);
			echo $output;
		}	
   }

	///// calculate ring price
	function calculateRingPrice($id, $ring_mtype, $ring_msize) {
		$metal_type = str_replace('_',' ', $ring_mtype);
		$ring_msize  = str_replace('_',' ', $ring_msize);
		$ring_msize  = str_replace('-','/', $ring_msize);
		$cuprice = $this->Jewelleriesmodel->getUniqueRingPrice($id,$metal_type,$ring_msize);
		
		$org_price=$cuprice;
		$cuprice= $cuprice*2.5;
		$cuprice1=$cuprice;
		$cuprice15=$cuprice*15/100;
		$cuprice=$cuprice-$cuprice15;
	
		echo '$'.number_format($cuprice,2);
	}
   function productdetails($stockno = '', $ringoption='',$lot = ''){
	
	$data = $this->getCommonData();
		$lot 		= ($lot == 'undefined') ? 0 : $lot ;
		$data['products'] = $this->Diamondmodel->getDetailsByLotproduct($stockno);
		$data['details'] = $this->Jewelrymodel->getAllByStock($stockno);				
		$data['stockno'] = $stockno;
		$data['ringoption'] = $ringoption;
		$data['lot'] = $lot;
		$data['type'] = 'product';
		$data['flashfiles']	= $this->Engagementmodel->getFlashByStockId($stockno);			
//						print_r();
		if($data['products']){
			$output = $this->load->view('erd/ringdetails' , $data , false);
			echo $output;
		}	
	 
   }
   
   ///// post a comments
   function postRingComents() {
		$full_name = $_POST['full_name'];
		$email_adres = $_POST['email_adres'];
		$cmb_rating = $_POST['cmb_rating'];
		$tr_comments = $_POST['tr_comments'];
		
		if($this->session->isLoggedin()){
			
			$return = $this->Jewelleriesmodel->saveRingComments($_POST);
			
			if($return) {
				echo 'Your comments has saved successfully!'; 	
			} else {
				echo 'Your already add the comments of this ring'; 	
			}
		} else {
			echo 'Plz login to your account first to comments this product!';
			exit;
		}
	}

	function threestoneringdetails($stockno = '', $centerid = '',$sidestone1 = '',$sidestoen2 = ''){
		$data = $this->getCommonData();
		$data['details'] = $this->Jewelrymodel->getAllByStock($stockno);
		$data['stockno'] = $stockno;
		//$data['ringoption'] = $ringoption;
		$data['centreid'] = $centerid;
		$data['sidestoneid1'] = $sidestone1;
		$data['sidestoneid2'] = $sidestoen2;
		$data['flashfiles']	= $this->Engagementmodel->getFlashByStockId($stockno);	
		$data['centerStoneDetails']  = $this->Jewelrymodel->getDetailsByLot($centerid);
		$data['sideStone1Details']  = $this->Jewelrymodel->getDetailsByLot($sidestone1);
		$data['sideStone2Details']  = $this->Jewelrymodel->getDetailsByLot($sidestoen2);

		if($data['details']){
			$output = $this->load->view('erd/threestoneringdetails' , $data , true);
			echo $output;
		}	
	}

	function errormsg() {
		$msg = ($this->Commonmodel->errordb());
		echo $msg[0]->msg;
	}

	/* set email subscription */
	function managEmailSubs() {
		$saveSubsForm  = $this->Jewelrymodel->manageEmailSubs();
		if($saveSubsForm != '') { 
			$to = $this->input->post('subsc_email', TRUE);
			$subject = "Subscription Successfully!";

			if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
				echo 'Plz Enter the valid email address!'; exit;
			}
			$this->Commonmodel->managedEmails($saveSubsForm, '', 'subscriber', 'Subscriber Signup Successfully!', 'New subscriber has subscribed successfully!');
			$subsc_name = $this->input->post('subsc_fname', TRUE).' '.$this->input->post('subsc_lname', TRUE);
			$toEmail = getadmin_contact_info('email');
			$message = '<html>
				<head></head>
				<body>
					<div>Dear '.$subsc_name.'</div>
					<div>Thank You for Subscribing to '.getadmin_contact_info().' Exclusive news and product updates. </div>
				</body>
			</html>';

			$headers .= "Reply-To: ". getadmin_contact_info()." <".$toEmail.">\r\n"; 
			$headers .= "Return-Path: ". getadmin_contact_info()." <".$toEmail.">\r\n"; 
			$headers .= "From: ". getadmin_contact_info()." <".$toEmail.">\r\n";  
			$headers .= "Organization: ". getadmin_contact_info()."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
			mail($to,$subject,$message,$headers);

			$headers2 = $headers;
			mail($toEmail,$subject,$message,$headers2);

			echo 'You are Subscribed successfully!';
		} else {
			echo 'This email address is already Subscribed here';
		}
	}

	///// post ask friend form and sent email
	function askFriendToSentEmail() {
		$frien_fname = $this->input->post('frien_fname', TRUE);
		$frien_lname = $this->input->post('frien_lname', TRUE);
		$frien_email = $this->input->post('frien_email', TRUE);
		$frien_frfname = $this->input->post('frien_frfname', TRUE);
		$frien_frlname = $this->input->post('frien_frlname', TRUE);
		$frien_fremail = $this->input->post('frien_fremail', TRUE);
		$frein_desc = $this->input->post('frein_desc', TRUE);
		$rings_id = $this->input->post('details_link', TRUE);
		$productDtLink = SITE_URL.$rings_id;

		$full_name   = $frien_fname.' '.$frien_lname;
		$friend_name = $frien_frfname.' '.$frien_frlname;
	 
		$to = $frien_fremail.', support@godstonediamonds.com';
		$subject = "Ask a Friend";
		
		$message = '<html>
		<head></head>
		<body>
		<p>You friend '.$full_name.' has suggested you a following ring in  '.getadmin_contact_info().' :</p>
		<table width="100%" border="0" cellspacing="2" cellpadding="5" style="text-align:left;">
		  <tr>
			<th width="18%">Full Name:</th>
			<td width="82%">'.$full_name.'</td>
		  </tr>
		  <tr>
			<th>Email Address:</th>
			<td>'.$frien_email.'</td>
		  </tr>
		  <tr>
			<th>Friend Name:</th>
			<td>'.$friend_name.'</td>
		  </tr>
		  <tr>
			<th>Friend Email:</th>
			<td>'.$frien_fremail.'</td>
		  </tr>
		  <tr>
			<td  colspan="2"><a href="'.$productDtLink.'">Click here to see product details</a></td>
		  </tr>
		  <tr>
			<th>Description:</th>
			<td>'.$frein_desc.'</td>
		  </tr>
		</table><br /><br />
		<div>Regards,</div>
		</body>
		</html>';
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: '.getadmin_contact_info().'<'.getadmin_contact_info('email').'>' . "\r\n";
		$headers .= 'Bcc: '. getadmin_contact_info('email'). "\r\n";
		
		mail($to,$subject,$message,$headers);
		
		echo 'Email has sent successfully!';
		
		return true;
   }
    ///// post ask friend form and sent email
   function askExpertToSentEmail() {
	  $exprt_fname = $this->input->post('exprt_fname', TRUE);
	  $exprt_lname = $this->input->post('exprt_lname', TRUE);
	  $exprt_email = $this->input->post('exprt_email', TRUE);
	  $exprt_pno = $this->input->post('exprt_pno', TRUE);
	  $exprt_hear = $this->input->post('exprt_hear', TRUE);
	  $exprt_desc = $this->input->post('exprt_desc', TRUE);
	  $rings_id = $this->input->post('details_link', TRUE);
	  $productDtLink = SITE_URL.$rings_id;
	  
	  $exper_fullname = $exprt_fname.' '.$exprt_lname;
	 
		$to = getadmin_contact_info('email');
		$subject = "Email Us / Ask an Expert";
		
		$message = '<html>
		<head></head>
		<body>
		<p>Following query is come form '.getadmin_contact_info().' Site</p>
		<table width="100%" border="0" cellspacing="2" cellpadding="5" style="text-align:left;">
		  <tr>
			<th width="19%">Full Name:</th>
			<td width="81%">'.$exper_fullname.'</td>
		  </tr>
		  <tr>
			<th>Email Address:</th>
			<td>'.$exprt_email.'</td>
		  </tr>
		  <tr>
			<th>Phone No.:</th>
			<td>'.$exprt_pno.'</td>
		  </tr>
		  <tr>
			<th>Where From to Here:</th>
			<td>'.$exprt_hear.'</td>
		  </tr>
		  <tr>
			<td  colspan="2"><a href="'.$productDtLink.'">Click here to see product details</a></td>
		  </tr>
		  <tr>
			<th>Query / Description:</th>
			<td>'.$exprt_desc.'</td>
		  </tr>
		</table><br /><br />
		<div>Regards,</div>
		</body>
		</html>';
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: '.getadmin_contact_info().'<'.$exprt_email.'>' . "\r\n";
		$headers .= 'Bcc: support@godstonediamonds.com' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		
		echo 'Email has sent successfully!';
		
		return true;
   }
   ///////////
   function qualitydetail($id, $accord_style='', $subcate='', $maincate){
   
   	$data = $this->getCommonData();
   	$data['details'] = $this->Jewelleriesmodel->getqualitydetail($id);
	
	if(isset($data['details']['data'][0]['Item_Type'])){
		$data['itemtype'] = $data['details']['data'][0]['Item_Type'];
	}else{
		$data['itemtype'] = '';
	}
	$data['radomprodects'] = $this->Jewelleriesmodel->getrandomproduct($id);//for random product display on right
   	//$data['userdetail'] = $this->Jewelleriesmodel->getUserdetailByID($data['details']['data'][0]['seller_id']);
   	//$output = $this->load->view('jewelleries/qualitydetail' , $data , false);//old
		//ezvalues
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue'];
		$data['sign_upform'] = $this->sign_upform;
		$data['accord_style'] = $accord_style;
		$data['main_dmcate'] = $maincate;
		$data['dm_subcate'] = $subcate;
		$data['subcate_view'] = str_replace('_', ' ', $subcate);
		$data['diamond_similarprod'] = $this->Jewelleriesmodel->getDiaondSimilarProd($id,$data['subcate_view'],$maincate);//get similar products
		
 /* 	echo '<pre>';
	print_r($data);
	exit;  */  
	$data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.min.js" type="text/javascript"></script>';
	$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
	$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
	$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
	$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
	$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
	$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
	$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
	$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
	$data ['extraheader'] .='<script language="javascript" src="' . config_item('base_url') . 'js/jquery.elevatezoom.js" type="text/javascript"></script>';
	$this->load->view($this->config->item('template').'header' , $data);
	$this->load->view('jewelleries/qualitydetailview-new' , $data);
	$this->load->view($this->config->item('template').'footer', $data);
   	//$this->output($out , $data);
   }
   function uniquedetail($id){
   	 
   	$data = $this->getCommonData();
   	$data['details'] = $this->Jewelleriesmodel->getuniquedetail($id);
   	//$data['userdetail'] = $this->Jewelleriesmodel->getUserdetailByID($data['details']['data'][0]['seller_id']);
   	//$output = $this->load->view('jewelleries/uniquedetail' , $data , false);
	$output = $this->load->view('jewelleries/uniquedetail' , $data , false);
   	echo $output;
   }
   
   function stullerdetail($id, $st='', $cate_name='', $maincate){
   	 
   	$data = $this->getCommonData();
   	$data['details'] = $this->Jewelleriesmodel->getstullerdetail($id);
	$row_stuler = $data['details']['data'][0];
	
	if(isset($data['details']['data'][0]['Item_Type'])){
		$data['itemtype'] = $data['details']['data'][0]['MerchandisingCategory2'];
	}else{
		$data['itemtype'] = '';
	}
	$data['radomprodects'] = $this->Jewelleriesmodel->getrandomproductstuller($id);//for random product display on right
   	//$data['userdetail'] = $this->Jewelleriesmodel->getUserdetailByID($data['details']['data'][0]['seller_id']);
   	//$output = $this->load->view('jewelleries/stullerdetail' , $data , false);//old
/* 	echo '<pre>';
	print_r($data);
	exit; */ 
		//ezvalues
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue'];
		$data['subcate_name'] = $cate_name;
		$data['maincate'] = $maincate;
		$data['accord_style'] = $st;
		$data['cate_name'] = str_replace('_', ' ', $cate_name);
		///// for similar products
		$data['rowdm_prod'] = $this->Jewelleriesmodel->getSimillarStuller($id, $data['cate_name'], $maincate);
		
		$data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.min.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
	
	
	$this->load->view($this->config->item('template').'header' , $data);
	$this->load->view('jewelleries/stullerdetailview-new' , $data);
	$this->load->view($this->config->item('template').'footer', $data);
   	echo $output;
   }
      function jewellerydetails($id){
		$data = $this->getCommonData();
		
		$data['details'] = $this->Jewelleriesmodel->getJewellerydetailByID($id);
		$data['userdetail'] = $this->Jewelleriesmodel->getUserdetailByID($data['details']['data'][0]['seller_id']);	
		$output = $this->load->view('jewelleries/jewellerydetail' , $data , false);
		echo $output;
	}
	
   function enagagementqualitydetail($id,$cuprice, $st=''){
   
   	$data = $this->getCommonData();
   	$detail = $this->Jewelleriesmodel->getuniquedetail2($id);
	
	$data['details'] = $detail['data'][0];
	$data['seting_type'] = 'Setting Type';
	$data['style_group'] = $st;
	$data['ring_id'] = $id;
	$this->session->set_userdata('ringID',$id);
	$d_id = $this->session->userdata('diamnd_id');
	$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
	$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$d_id.'/'.$id.'/addtoring/');
	
	if(!empty($st)) {
		$data['seting_type'] = ucwords( str_replace('_', ' ', $st) );
	}
	
	//// get similar products
	$startLimit = 0;
	switch($st) {
		case 'classic' :
			$cate_value = 171;
			break;
		case 'vintage' :
			$cate_value = 213;
			break;
		case 'sidestone' :
			$cate_value = 'Engagement Rings';
			$startLimit = 18;
			break;
		case 'bridal_rings' :
			$cate_value = 'Bridal Rings';
			break;
		case 'three_stone' :
			$cate_value = 69;
			break;
		case 'halo' :
			$cate_value = 'Engagement Rings';
			break;
		default :
			$cate_value = 171;
			break;		
	}
	if(is_numeric($cate_value)) {
		$data["records"] = $this->Jewelleriesmodel->getuniqueproduct(4, 0,$cate_value);
	} else{
		$data["records"] = $this->Jewelleriesmodel->getallengagementQuality(4, $startLimit,$cate_value,'');
	}
	
	if(is_numeric($id) && $cuprice != 'images' && $st != 'inner_Diamonds_25.jpg') {
		$this->session->set_userdata('unique_ringid',current_url());
	}
	///////////
   	$data['uniqueprice'] = $this->Jewelleriesmodel->getUniquePrice($data['details']['style_group']);
	$data['ring_sizes'] = $this->Jewelleriesmodel->getAllRingSize($data['details']['style_group']);
   	//echo $data['details']['data'][0]['style_group'];
	$data['radomprodects'] = $this->Jewelleriesmodel->getrandomproduct($id);//for random product display on right
	$data['cuprice'] = $cuprice;
	
   	//$data['userdetail'] = $this->Jewelleriesmodel->getUserdetailByID($data['details']['data'][0]['seller_id']);
   	//$output = $this->load->view('jewelleries/qualitydetail' , $data , false);//old
		//ezvalues
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue']; 
		//$data['ez3value'] = $data['ez5value'] = 12;
		
		$data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.min.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
		/*$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/main_jsfunction.js" type="text/javascript"></script>';*/
		/*$data ['extraheader'] .= '<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>';*/
	//echo 'true';exit;
	$data['result_rsize'] = $this->Jewelleriesmodel->getRingSizes($data['details']['style_group']);
	
	$measurements = $data['details']['measurements'];
	
	$doc = new DOMDocument();
	$doc->loadHTML($measurements);
	$tables = $doc->getElementsByTagName('table');
	$rows = $tables->item(0)->getElementsByTagName('td');
	$i = 0;
	$measurementvalues = array();
	foreach ($rows as $cell) {
		$r = utf8_decode('Ã,');
		$measurementvalues[$i] = str_replace($r, '', $cell->textContent);
		$i++;
	}
	
	$data['details']['top_width'] = $measurementvalues[0];
	$data['details']['bottom_width'] = $measurementvalues[1];
	$data['details']['top_height'] = $measurementvalues[2];
	$data['details']['bottom_height'] = $measurementvalues[3];
	
		
	
	
	
	$this->load->view($this->config->item('template').'header' , $data);
	$this->load->view('jewelleries/uniquedetailview-new' , $data);
	$this->load->view($this->config->item('template').'footer', $data);
	
   	//$this->output($out , $data);
   }
   
   function getCurlResponse($link, $dc='') {
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $link,
		CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		
		return ( empty($dc) ? json_decode($resp) : $resp );	
	}

	/* set rings detail rngsize : Ring Size */
	function engagementRingDetail($catid='',$id, $metal='14KP', $rngsize='1', $avsizes=''){
		$unset_fields = array('shape', 'hearts_collection', 'heart_metal');
		$this->session->unset_userdata($unset_fields);
        $burl = config_item('base_url');
        reset_diamond_filters();
		$data = $this->getCommonData();

		$rowrings_test = $this->Catemodel->getRingsDetailViaId($id, $metal, $rngsize);
		$subparent = $this->Catemodel->getparentCateID($rowrings_test['catid']);
		$sbparent_catename = $this->Catemodel->getRingCategoryName($subparent);
		$getring_shape = getSuppliedStoneShape( $rowrings_test['supplied_stones'] );
		$aditional_ratios = getAdditonalStonesRatio( $rowrings_test['additional_stones'] );
		$data["getparent_cate"] = getMainCatParentCateID($catid);
        $cate = $this->getCateName( $rowrings_test['catid'] );
        $data['ringtitle'] = $rowrings_test['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring '.$rowrings_test['stone_weight'];
        $data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowrings_test['ImagePath'];
        $data['setingtype']   = $cate['sub_cname'];
        $data['maincate_name'] = $cate['main_cname'];
        $data['title'] = $data['ringtitle'];
        $data['retail_price'] = $rowrings_test['priceRetail'] * 1.7;
        $data['saving_percent'] = $rowrings_test['priceRetail'] / $data['retail_price'] * 100;
        $diamond_shape = get_unique_ring_diamond_shape( $rowrings_test['additional_stones'] ); // ringsection helper
        $item_shape = getDiamondShape( $cate['main_cname'] );
        $set_diamond_shape = check_empty($diamond_shape, $item_shape);

        $data['subcate_link'] = '<a href="'.SITE_URL.'testengagementrings/engagement_ring_listings/'.$rowrings_test['catid'].'" title="">'.$cate['main_cname'].' Diamond Engagement Rings</a>';
        $data['similar_items'] = $this->ringSimilarItems($rowrings_test['catid'], $id);
        $data['similar_products'] = $this->ringSimilarItems($rowrings_test['catid'], $id, 4);
        $data['popular_listings'] = $this->popularListings($rowrings_test['catid'], $id, 4);
        $data['more_engagement_listings'] = $this->popularListings($rowrings_test['catid'], $id, 4);
        $data['rings_thumb'] = $this->getProductThumb( $rowrings_test );
        $data['suported_shapes'] = $this->getDimaondShapeImage( $rowrings_test );  /// get supplied stones shapes

		if( !empty($getring_shape) ) {
			$this->session->set_userdata('shape', $getring_shape.'.');
		}	
		if($id != '') {
			$this->session->set_userdata('setings_id', $id);
		}
		if( empty($rowrings_test['additional_stones']) ) {
			$this->session->set_userdata('shape', $getring_shape.'.');
			$this->session->unset_userdata('length');
			$this->session->unset_userdata('width');
			$this->session->unset_userdata('carat');
		} else {
			$this->session->set_userdata('shape', $aditional_ratios['size_shape'].'.');
			$this->session->set_userdata('length', $aditional_ratios['length']);
			$this->session->set_userdata('width', $aditional_ratios['width']);
			$this->session->set_userdata('ringcarat', $aditional_ratios['carat']);
		}
        if( !empty($catid) ) {
            $this->session->set_userdata('ring_cate_id', $catid);
        }
        if( !empty($rowrings_test['supplied_stones']) ) {
            $this->session->set_userdata('supplied_stones', 'tothree_supplied_stone');
        }

		$rowrings = $rowrings_test; //json_decode ( file_get_contents($webservice_link) );
		$ringsMetal = $rowrings['ringsMetal'];
		$rings_size = $rowrings['ringsSizes'];
		$ringThumbs = $rowrings['item_thumbs'];
		$available_sizes = $rowrings['availblesize'];
		$setsizes = explode('|', $available_sizes);

		$data['seting_type'] = 'Setting Type';
		//$data['style_group'] = $st;
		$data['style_group'] = '';
		$data['ring_id'] = $id;
		$this->session->set_userdata('ringID',$id);
		$d_id = $this->session->userdata('diamnd_id');
		$dm_id = ( !empty($d_id) ? $d_id : 'false' );

		$data['sbparent_catename'] = '';
		$data['sbparent_style'] = '';

		if( strcmp( $sbparent_catename, $rowrings_test['parent_cate'] ) !== 0 ) {
			$data['sbparent_catename'] = '<li><a href="'.$burl.'jewelleries/engagmentRingsView/'.$subparent.'">'.$sbparent_catename.'</a></li>';
			$data['sbparent_style'] = $sbparent_catename;
		}
		if( strcmp( 'Three Stones', $sbparent_catename ) === 0 ) {
			$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'diamonds/search/true/'.$set_diamond_shape.'/tothreestone/true/'.$id);
			$this->session->set_userdata('build_3stone', 'unique');
		} else {
			$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$id.'/addtoring/');
		}
		$data['catgory_id'] = $catid;
		$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
		if(!empty($st)) {
			$data['seting_type'] = ucwords( str_replace('_', ' ', $st) );
		}

		/* get similar products */
		$startLimit = 0;
		/* switch($st) {
			case 'classic' :
				$cate_value = 171;
				break;
			case 'vintage' :
				$cate_value = 213;
				break;
			case 'sidestone' :
				$cate_value = 'Engagement Rings';
				$startLimit = 18;
				break;
			case 'bridal_rings' :
				$cate_value = 'Bridal Rings';
				break;
			case 'three_stone' :
				$cate_value = 69;
				break;
			case 'halo' :
				$cate_value = 'Engagement Rings';
				break;
			default :
				$cate_value = 171;
				break;
		} */
		$cate_value = 171;
		if(is_numeric($cate_value)) {
			$data["records"] = $this->Jewelleriesmodel->getuniqueproduct(4, 0,$cate_value);
		} else{
			$data["records"] = $this->Jewelleriesmodel->getallengagementQuality(4, $startLimit,$cate_value,'');
		}

		if(is_numeric($id)) {
			$this->session->set_userdata('unique_ringid',current_url());
		}

		$data['uniqueprice'] = $this->Jewelleriesmodel->getUniquePrice(isset($data['details']->style_group)?$data['details']->style_group:'');
		$data['ring_sizes'] = $this->Jewelleriesmodel->getAllRingSize(isset($data['details']->style_group)?$data['details']->style_group:'');
		$data['radomprodects'] = $this->Jewelleriesmodel->getrandomproduct($id);//for random product display on right
		$data['cuprice'] = '';
		$data['subparent_id'] = $subparent;

		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue']; 

		$data ['extraheader'] = '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';	
		/*$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery-1.8.3.min.js" type="text/javascript"></script>';*/
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.elevatezoom.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jscmagnifier.js" type="text/javascript"></script>';		
		$data['result_rsize'] = $this->Jewelleriesmodel->getRingSizes(isset($data['details']->style_group)?$data['details']->style_group:'');

		$measurements = isset($data['details']->measurements)?$data['details']->measurements:'';
		$i = 0;
		$measurementvalues = array();
		/* get rings metal list */
		$getRingsMetal = '';
		if( count($ringsMetal) > 0 ) {
			foreach($ringsMetal as $rings_metal) {
				$metal_rdlink = $burl.'site/engagementRingDetail/'.$catid.'/'.$id.'/'.trim($rings_metal['matalType']).'/'.trim($rngsize).'/'.$avsizes;
				$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $metal).'>'.set_ring_metal($rings_metal['matalType']).'</option>';
			}
		} else {
			$getRingsMetal .= '<option value="">Metal Type</option>';
		}
	
		$getRingsSize = '';
		$reset_rgsize = resetRingSize($rngsize);
		$defaultMetal = ( !empty( $metal )  ? $metal : $ringsMetal[0]['matalType'] );
		$defaultRingSz = ( !empty( $rngsize )  ? $rngsize : $rowrings_test['ringSize'] );
		$metal_list = array('14KP', '14KW', '14KY', '18KP', '18KW', '18KY', 'PDIUM', 'PLAT');

		if( in_array($metal, $metal_list) ) {
			$this->session->set_userdata('default_metal', $metal);
			$this->session->set_userdata('default_ringsize', $rngsize);  
		}

		if( count($rings_size) > 0 ) {
			foreach($rings_size as $rng_size) {
				$rgsz = setRingSize($rng_size['ringSize']);
				$rings_rdlink = $burl.'site/engagementRingDetail/'.$catid.'/'.$id.'/'.trim($defaultMetal).'/'.trim($rgsz).'/'.$avsizes;
				$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $rngsize).'>'.$rng_size['ringSize'].'</option>';
			}
		} else {
			$getRingsSize .= '<option value="">Ring Sizes</option>';
		}

		/* available sizes */
		$trimmedArray = array_map('trim', $setsizes);

		array_filter($trimmedArray);
		$ringWeight = '';
		$metaList = array();
		$testar = array();
		$availableSizs = array();
		$available_insizes = ''; 
		foreach($trimmedArray as $rows_avsize) {
			if( !empty($rows_avsize) ) :
				$metailWeight = $this->Catemodel->getMetalRingWeight($rows_avsize);
				$availableSizs[] = $rows_avsize;
				if(!in_array($metailWeight['metal_weight'], $testar)) {
					$metaList[] = array('ring_id'=>$metailWeight['id'], 'ring_metal'=>$metailWeight['metal_weight']);
					$testar[]  = $metailWeight['metal_weight'];
				}
			endif;
		}
		if( empty($avsizes) ) {
			$this->session->set_userdata('setmetal_list', $metaList);
		}
		$currMetalSizes = $this->session->userdata('setmetal_list'); //print_ar($currMetalSizes);
		if( count($currMetalSizes) > 0 ) {
			$ringWeight .= '<option value="">Available Sizes</option>';
			foreach($currMetalSizes as $rows_avsize) {
				$metaLink = $burl.'site/engagementRingDetail/'.$catid.'/'.trim($rows_avsize['ring_id']).'/'.$defaultMetal.'/'.$defaultRingSz.'/'.$id;
				$ringWeight .= '<option value="'.$metaLink.'" '.selectedOption($rows_avsize['ring_id'], $id).'>'.$rows_avsize['ring_metal'].'</option>';
				$available_insizes .= '<div class="tabsRow">
					<div class="metaLeft">Size:
						<span class="sizeBlock"><a href="'.$metaLink.'">'.$rows_avsize['ring_metal'].'</a></span>
					</div>
				</div>';
			}
		} else {
			$ringWeight .= '<option value="">Available Sizes</option>';
		}

		$data['default_metal'] = $metal;
		$data['set_ring_size'] = resetRingSize($rngsize);
		$data['ringsmetail'] = $getRingsMetal;
		$data['ringsize_option'] = $getRingsSize;
		$data['ring_weight'] = $ringWeight;
		$data['available_insizes'] = $available_insizes;
		$data['rowsring'] = $rowrings; //$this->apcache->getData('rings_dtail');
		$data['ringPriceView'] = isset($data['details']['priceRetail'])?$data['details']['priceRetail']:'';
		$setAvailableSize = implode("','", $availableSizs);

		$getSimilarProd = $this->Catemodel->getSimilarRingsList($catid, $id, $setAvailableSize);
		$similarProdList = '';
		if( count($getSimilarProd) > 0 ) {
			foreach($getSimilarProd as $rowsimilar) {
				$ringsImage = $this->Catemodel->getRingsImgViaId($rowsimilar['name']);
				$category_name = $this->Catemodel->getRingCategoryName($rowsimilar['catid']);
				$detailRingLink = config_item('base_url').'site/engagementRingDetail/'.$rowsimilar['catid'].'/'.$rowsimilar['ring_id'];
				$imageUrLink = config_item('base_url').'scrapper/imgs/'.$ringsImage['ImagePath'];
				$similarProdList .= '<div class="prodBlock col-sm-4">
					<div class="imgBlock"><a href="'.$detailRingLink.'"><img src="'.$imageUrLink.'" alt="'.$rowsimilar['name'].'" width="155" hight="144"></a></div>
					<div class="prodLable">'.$category_name.' - '.$rowsimilar['name'].'<br />
						<span>';
						if($rowsimilar['priceRetail'] > 0) {
							$unPrice = 'Price: $ '.$rowsimilar['priceRetail'];
						} else {
							$unPrice = 'Call: 415.626.5035 For Price';
						}
						$similarProdList .= $unPrice .'</span> 
					</div>
				</div>';
			}
		} else {
			$similarProdList .= '<div></div>';
		}

		/* center stond shapes list */
		$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
		$view_ctshape = '';
		$shapPath = config_item('base_url').'img/diamond_shapes/';
		$ctstone_shape = isset($data['details']['additional_stones'])?$data['details']['additional_stones']:''; 
		$find_ctsahpe = getCenterStoneShape($ctstone_shape);

		$getsp_shpe = unrings_diamond_shape($getring_shape);
		$getsp_shape = $center_stshapes[$getring_shape];

		/* supported shapes */
		$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
		$spstone_arlist = array($getsp_shape);

		$i=0;
		foreach($center_stshapes as $sid => $shap_list) {
			$shap_img = 'ct_'.$shap_list.'.jpg';
			$altitle = strtoupper($shap_list);

			if( !empty($ctstone_shape) ) {
				if(in_array($shap_list, $find_ctsahpe))
					$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
			} else {
				$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
			}
		}

		/* get user comments */
		$rings_coments = $this->Catemodel->getComentsListView($id);
		$parentCate = isset($data['details']['parent_cate'])?$data['details']['parent_cate']:'';
		$view_coments = '';
		if( count($rings_coments) > 0 ) {
			foreach($rings_coments as $row_coments) {
				$view_coments .= '<div class="reviews_block">
					<div class="reviews_label">
						<div><img src="'.SITE_URL.'img/page_img/stars_icon.png" /></div>
						<div class="dateLabel">'.date('d M, Y', strtotime($row_coments['coment_date'])).',</div>
					</div>
					<br />
					<div class="reviewHeading">This is comments review about '.$parentCate.'</div>
					<div class="reviewData">'.$row_coments['post_comments'].'</div>
				</div>';
			}
		} else {
			$view_coments = '<div class="reviewData">NO COMMENTS LIST ADDED</div>';
		}

		/* get customer info */
		
		$data['row_cust'] = $this->User->saveCustomerInfo('view'); 
		$data['view_coments'] = $view_coments;
		$data['view_ctshape'] = $view_ctshape;
		$data['similarProdList'] = $similarProdList;
		$data['buildring'] = $this->session->userdata('buildring');
		$this->session->set_userdata('claritymin', 0);
		$this->session->set_userdata('claritymax', 9);
		$this->session->set_userdata('symmet_mins', 0);
		$this->session->set_userdata('symmet_maxs', 3);
        $output = $this->load->view('jewelleries/uniquedetail_ringsview' , $data , true);
        $this->output($output, $data);
	}

	/// get product thumb
	function getProductThumb($rowaray=array(), $popup='') {
        $getRingsThumb = '';
		$check_thumb = array();
		if( count($rowaray['item_thumbs']) > 0 ) {
		foreach( $rowaray['item_thumbs'] as $rng_thumb ) {
			$ringsThumb = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
			$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
			
			if( !in_array($rng_thumb['ImagePathThumb'], $check_thumb) ) {
                            if( empty($popup) ) {
				$getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$ringsView.'\')">
			<img src="'.$ringsThumb.'" alt=""></a></div>';
                            } else {
                                $getRingsThumb .= '<li><a href="javascript://" onclick="imageshow(\''.$ringsView.'\');" title="'.$ring_title.'"><img src="'.$ringsThumb.'" width="31" alt="'.$ring_title.'"></a> </li>';
                            }
			}
					
			$check_thumb[] = $rng_thumb['ImagePathThumb'];
		}
	} else {
         $getRingsThumb .= '';
        }
        
        return $getRingsThumb;
    }
    
    function getDimaondShapeImage($rowshape=array()) {
        
        $getring_shape = getSuppliedStoneShape( $rowshape['supplied_stones'] );
    $center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
    //// center stond shapes list
	$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
	$view_ctshape = '';
        
        $shapPath = SITE_URL.'img/diamond_shapes/';
	$ctstone_shape = $rowshape['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
	
	//$getsp_shpe = unrings_diamond_shape($getring_shape);
	$getsp_shape = $center_stshapes[$getring_shape];
	//print_r($find_ctsahpe);
	//// supported shapes
	$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
	$spstone_arlist = array($getsp_shape);
	
	$i=0;
	foreach($center_stshapes as $sid => $shap_list) {
		$shap_img = 'ct_'.$shap_list.'.jpg';
		$altitle = strtoupper($shap_list);
		
		if( !empty($ctstone_shape) ) {
			if(in_array($shap_list, $find_ctsahpe))
			$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
		} else {
			$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
		}
	}
        
        return $view_ctshape;
    }
    
    ///// rings similar items
    function ringSimilarItems($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->Catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        $similar_rings = '';
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $detaiLink = SITE_URL . 'testengagementrings/engagement_ring_detail/' . $rowring['ring_id'];
               $ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
               $ring_title = $this->getRingTitle($rowring);
               $retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['priceRetail'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               
            if( empty($listing) ) {
               $similar_rings .= '<div class="prdSection col-sm-3" id="'.$rowring['ring_id'].'">
                                    <a href="'.$detaiLink.'" class="alsoviwed-product-img">
                                            <img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
                                    </a>
                                    <a class="prdName" title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a>
                                    <div class="price-box">
                                            <p class="old-price"><span>Retail Price:</span>
                                            <span style="text-decoration: line-through;"> $'._nf($retail_price, 2).'</span></p>
                                            <p class="our-price"><span>Our Price:</span><span> $'._nf($ring_ourprice, 2).'</span></p>
                                            <!-- <a class="viewItem" href="">View Item</a> -->
                                    </div>
				</div>'; 
                } else {
                   $similar_rings .= '<li class="item first">
			<div class="product-grid-quick" onmouseover="showTopQuickView('.$rowring['ring_id'].');" onmouseout="hideTopQuickView('.$rowring['ring_id'].');" style="overflow:hidden;">
				<div id="top-quickview'.$rowring['ring_id'].'" style="display: none; position: relative;">
					<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\', \'Quick View\', \'nofollow\');" title="Quick View'.$ring_title.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
				</div>
				<a title="'.$ring_title.'" href="'.$detaiLink.'"><img alt="'.$ring_title.'" class="" src="'.$ringImageLink.'" width="200" style="display: inline;"></a>
				<h2 class="product-name"><a title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a></h2>
				<div class="price-box">
                                    <p class="old-price"><span class="price-label">Retail Price:</span> 
                                    <span id="old-price-802865" class="price">$'._nf($retail_price, 2).'</span></p>
				<p class="our-price"><span class="price-label">Our Price:</span> 
                                <span id="product-price-'.$rowring['ring_id'].'">$'._nf($ring_ourprice, 2).'</span>
                                    </p>
				</div>
				<ul class="add-to-links-details">
					<li><a class="view-item" href="'.$detaiLink.'">View Item</a></li>
				</ul>
			</div>
			<!-- Mouse Hover DIV STARTS here -->
			<div class="box-detail-over right-box" id="top-box-detail-over-'.$rowring['ring_id'].'" style="display: none;">
				<div class="column3">
					<p>'.$ring_title.'</p>
					<div class="hover-price">
						<div class="popup-prices">
                                                <p class="old-price-qv"><span class="price-label-qv">Retail Price:</span> 
                                                <span id="old-price-'.$rowring['ring_id'].'" class="price-qv">$'._nf($retail_price, 2).'</span></p>
							<p class="old-price-qv"><span class="price-label-qv">Our Price:</span> <span id="product-price-'.$rowring['ring_id'].'" class="new-price-qv">$'._nf($ring_ourprice, 2).'</span> <span class="special-price-label-qv">(Savings: '.round($saving_percent).'%)</span></p>
</div>
					</div>
					<div id="top-product_additional_data_'.$rowring['ring_id'].'"></div>
				</div>
			</div>
			<!-- Mouse Hover DIV ENDS here -->
		</li>';     
                }
            }
        }
        
        return $similar_rings;
    }
    
//// get ring title
function getRingTitle($rowring=array(), $similar='') {
    $cate   = $this->getCateName( $rowring['catid'] ); 
    if( empty($similar) ) {
        $rtitle = $rowring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring '.$rowring['stone_weight'].' '.$cate['sub_cname'] .' Style';
    } else {
      $rtitle = $rowring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique <br>Engagement Ring '.$rowring['stone_weight'].' '.$cate['sub_cname'] .' Style';
    }

    return $rtitle;
}

///// get category name
    function getCateName( $cid=0 ) {
        $catevalue = array();
        
        $catevalue['main_cname'] = $this->Catemodel->getRingCategoryName( $cid );
        $subparent = $this->Catemodel->getparentCateID( $cid );
        $catevalue['sub_cname'] = $this->Catemodel->getRingCategoryName($subparent);
        
        return $catevalue;
    }
    //// popular listings
    function popularListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->Catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        $similar_rings = '';
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $detaiLink = SITE_URL . 'testengagementrings/engagement_ring_detail/' . $rowring['ring_id'];
               $ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
               $ring_title = $this->getRingTitle($rowring, 'similar');
               $retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['priceRetail'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               $detailDesc = 'Metal '. $rowring['matalType'] . ' ' . $rowring['metal_weight']. ' Stone '. $rowring['stone_weight'];
               
            $similar_rings .= '<div class="product_colsbk col-sm-3">
                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"></a></div>
                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg" alt=""><span class="reviewlabel">(86 Review)</span></div><br>
                        <div>$ '. _nf($ring_ourprice, 2).'</div>
                        <div class="setcolor_label">+ Engagement Ring</div><br>
                        <div class="centerLabel"><a href="'.$detaiLink.'">'.$ring_title.'</a></div>
                        <div class="setcolor_label">'.$detailDesc.'</div>
                    </div>';
            
            }
        }
        
        return $similar_rings;
    }

	function settingDesc($rows) {
		$seting_dmshape = view_shape_value( $imgs, $rows['shape'] );
		$seting_metal   = metal_label( $rows['metal'] );
		$seting_style = ucwords( str_replace('-',' ',$rows['style']) );
		$seting_desc = $seting_metal.' '.$seting_style.' '.$seting_dmshape.' Diamond Stud Earrings';
		return $seting_desc;
	}

	//// rngsize : Ring Size
	function uniquefindings_detail($catid='',$id) {
		$this->output->cache(5);
		$data = $this->getCommonData();
		$detail = $this->findingsmodel->getFindingsRingDetails($id);
		$data['findingdetails'] = $detail;
		$data['title'] = 'Create Your Own Diamond Earrings';
		$data['earing_detilink'] = config_item('base_url').'diamonds/search/true/false/toearring/false/'.$id;
		$findings_shape = diamond_shape_value($detail['stone_type']);
		$similar_findings = $this->findingsmodel->getSimilarFindingsEaring($detail);
		$this->session->set_userdata('unique_finding','findings');
		$this->session->set_userdata('shape',$findings_shape);
		$row_earing = $this->Jewelrymodel->getEarringSettingsById($id);
		$data['earing_dimglink'] = config_item('base_url').$row_earing['small_image'];
		$similar_earing = $this->Jewelrymodel->getSimilarEarringSettings($row_earing);

		$similar_settings = '';
		if( count($similar_findings) > 0 ) {
			foreach($similar_findings as $rowseting) {

				$seting_dtlink = config_item('base_url').'site/uniquefindings_detail/'.$catid.'/'.$rowseting['findings_id'];
				$seting_image = RINGS_IMAGE.'crone/imgs/'.$rowseting['ImagePath'];
				$setings_desc = $this->settingDesc($rowseting);
				$similar_settings .= '<div class="engagement-product col-sm-4">
					<div class="image-engagement"><a href="'.$seting_dtlink.'"><img style="width:130px;height:130px" src="'.$seting_image.'"></a></div>
					<div class="prodDescLabel">'.$rowseting['product_id'].' </div>
					<div class="jewlry_price">$'.$rowseting['priceRetail'].'</div>
				</div>';
			}
			$similar_settings .= '<div class="clear"></div>';
		}		
		$data['similar_settings'] = $similar_settings;
		$data['dimonddetails']=$row_earing;
		$data['next_date'] = nextDate();
		$rowrings = $rowrings_test;
		$ringsMetal = $rowrings['ringsMetal'];
		$rings_size = $rowrings['ringsSizes'];
		$ringThumbs = $rowrings['item_thumbs'];
		$available_sizes = $rowrings['availblesize'];
		$setsizes = explode('|', $available_sizes);

		$burl = config_item('base_url');
		$data['seting_type'] = 'Setting Type';
		$data['style_group'] = $st;
		$data['ring_id'] = $id;
		$this->session->set_userdata('ringID',$id);
		$d_id = $this->session->userdata('diamnd_id');
		$data['catgory_id'] = $catid;
		$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$d_id.'/'.$id.'/addtoring/');

		if(!empty($st)) {
			$data['seting_type'] = ucwords( str_replace('_', ' ', $st) );
		}
		if(is_numeric($cate_value)) {
			$data["records"] = $this->Jewelleriesmodel->getuniqueproduct(4, 0,$cate_value);
		} else{
			$data["records"] = $this->Jewelleriesmodel->getallengagementQuality(4, $startLimit,$cate_value,'');
		}
		if(is_numeric($id) && $cuprice != 'images' && $st != 'inner_Diamonds_25.jpg') {
			$this->session->set_userdata('unique_ringid',current_url());
		}

		$data['uniqueprice'] = $this->Jewelleriesmodel->getUniquePrice($data['details']->style_group);
		$data['ring_sizes'] = $this->Jewelleriesmodel->getAllRingSize($data['details']->style_group);

		$data['radomprodects'] = $this->Jewelleriesmodel->getrandomproduct($id);
		$data['cuprice'] = $cuprice;

		//ezvalues
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue']; 

		$data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.min.js" type="text/javascript"></script>';
		$data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/accordian_tabsjs.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
		$data['result_rsize'] = $this->Jewelleriesmodel->getRingSizes($data['details']->style_group);

		$measurements = $data['details']->measurements;

		$i = 0;
		$measurementvalues = array();

		////// get rings metal list
		$getRingsMetal = '';
		if( count($ringsMetal) > 0 ) {
			foreach($ringsMetal as $rings_metal) {
				$metal_rdlink = $burl.'site/engagementRingDetail/'.$catid.'/'.$id.'/'.trim($rings_metal['matalType']).'/'.trim($rngsize).'/'.$avsizes;
				$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $metal).'>'.$rings_metal['matalType'].'</option>';
			}
		} else {
			$getRingsMetal .= '<option value="">Metal Type</option>';
		}

		$getRingsSize = '';
		$reset_rgsize = resetRingSize($rngsize);
		$defaultMetal = ( !empty( $metal )  ? $metal : $ringsMetal[0]['matalType'] );
		$defaultRingSz = ( !empty( $rngsize )  ? $rngsize : $rowrings_test['ringSize'] );

		if( count($rings_size) > 0 ) {
			foreach($rings_size as $rng_size) {
				$rgsz = setRingSize($rng_size['ringSize']);
				$rings_rdlink = $burl.'site/engagementRingDetail/'.$catid.'/'.$id.'/'.trim($defaultMetal).'/'.trim($rgsz).'/'.$avsizes;
				$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $rngsize).'>'.$rng_size['ringSize'].'</option>';
			}
		} else {
			$getRingsSize .= '<option value="">Ring Sizes</option>';
		}

		////// item thumbs
		$getRingsThumb = '';
		if( count($ringThumbs) > 0 ) {
			foreach($ringThumbs as $rng_thumb) {
				$ringsThumb = $burl.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
				$ringsView = $burl.'scrapper/imgs/'.$rng_thumb['ImagePath'];
				$getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.$ringsView .'\')"><img src="'.$ringsThumb.'" alt="" /></a>';
			}
		} else {
			$getRingsThumb .= '';
		}

		$trimmedArray = array_map('trim', $setsizes);

		array_filter($trimmedArray);
		$ringWeight = '';
		$metaList = array();
		$testar = array();
		$availableSizs = array();
		$available_insizes = ''; 
		foreach($trimmedArray as $rows_avsize) {
			if( !empty($rows_avsize) ) :
				$metailWeight = $this->Catemodel->getMetalRingWeight($rows_avsize);
				$availableSizs[] = $rows_avsize;
				if(!in_array($metailWeight['metal_weight'], $testar)) {
					$metaList[] = array('ring_id'=>$metailWeight['id'], 'ring_metal'=>$metailWeight['metal_weight']);
					$testar[]  = $metailWeight['metal_weight'];
				}
			endif;
		}

		if( empty($avsizes) ) {
			$this->session->set_userdata('setmetal_list', $metaList);
		}

		$currMetalSizes = $this->session->userdata('setmetal_list'); //print_ar($currMetalSizes);
		if( count($currMetalSizes) > 0 ) {
			$ringWeight .= '<option value="">Available Sizes</option>';
			foreach($currMetalSizes as $rows_avsize) {
				$metaLink = $burl.'site/engagementRingDetail/'.$catid.'/'.trim($rows_avsize['ring_id']).'/'.$defaultMetal.'/'.$defaultRingSz.'/'.$id;			
				$ringWeight .= '<option value="'.$metaLink.'" '.selectedOption($rows_avsize['ring_id'], $id).'>'.$rows_avsize['ring_metal'].'</option>';
				$available_insizes .= '<div class="tabsRow">
				<div class="metaLeft">Size:
				<span class="sizeBlock"><a href="'.$metaLink.'">'.$rows_avsize['ring_metal'].'</a></span>
				</div>
				</div>';
			}
		} else {
			$ringWeight .= '<option value="">Available Sizes</option>';
		}

		$data['ringsmetail'] = $getRingsMetal;
		$data['ring_vsizes'] = $getRingsSize;
		$data['ring_thumbs'] = $getRingsThumb;
		$data['ring_weight'] = $ringWeight;
		$data['defaultMetal'] = $defaultMetal;
		$data['available_insizes'] = $available_insizes;
		$data['details'] = $rowrings; //$this->apcache->getData('rings_dtail');
		$data['ringPriceView'] = $data['details']['priceRetail'];
		$setAvailableSize = implode("','", $availableSizs);
		$getSimilarProd = $this->Catemodel->getSimilarRingsList($catid, $id, $setAvailableSize);
		$similarProdList = '';

		if( count($getSimilarProd) > 0 ) {
			foreach($getSimilarProd as $rowsimilar) {
				$ringsImage = $this->Catemodel->getRingsImgViaId($rowsimilar['name']);
				$category_name = $this->Catemodel->getRingCategoryName($rowsimilar['catid']);

				$detailRingLink = config_item('base_url').'site/engagementRingDetail/'.$rowsimilar['catid'].'/'.$rowsimilar['ring_id'];
				$imageUrLink = config_item('base_url').'scrapper/imgs/'.$ringsImage['ImagePath'];

				$similarProdList .= '<div class="prodBlock">
					<div class="imgBlock"><a href="'.$detailRingLink.'"><img src="'.$imageUrLink.'" alt="'.$rowsimilar['name'].'" width="155" hight="144"></a></div>
					<div class="prodLable">'.$category_name.' - '.$rowsimilar['name'].'<br />
					<span>';
					if($rowsimilar['priceRetail'] > 0) {
						$unPrice = 'Price: $ '.$rowsimilar['priceRetail'];
					} else {
						$unPrice = 'Call: 415.626.5035 For Price';
					}
					$similarProdList .= $unPrice .'</span> 
					</div>
				</div>';
			}
		} else {
			$similarProdList .= '<div></div>';
		}

		$this->session->set_userdata('set_page_title', $data['title']);
		$data['similarProdList'] = $similarProdList;
		$this->load->view($this->config->item('template').'header' , $data);
		$this->load->view('jewelleries/uniquefindings_detailview' , $data);
		$this->load->view($this->config->item('template').'footer', $data);
	}

	function array_unique_multidimensional($input){
		$serialized = array_map('serialize', $input);
		$unique = array_unique($serialized);
		return array_intersect_key($input, $unique);
	}

	function uniqeDetailMetalAjax(){
		$ringsizes = $this->Jewelleriesmodel->uniqeDetailMetalAjax($_POST['metal'],$_POST['product']);
		$value = '';
		foreach($ringsizes as $ringsize) {
			$value .= "<option value='".$ringsize['ringSize']."'>".$ringsize['ringSize']."</option>";
		}
		echo $value;
	}

	function uniqeDetailPriceAjax(){
		$ez = $_POST['ez'];
		$price = $this->Jewelleriesmodel->getUniquePriceAjax($_POST['metal'],$_POST['ring'],$_POST['product']);
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$ez3value = $ezvalues[0]['ezvalue'];
		$ez5value = $ezvalues[1]['ezvalue'];
		if($ez){
			$org_price= $price['price'];
			$cuprice = $org_price*2.5;
			$cuprice1=$cuprice;
			$cuprice15=$cuprice*15/100;
			$cuprice=$cuprice-$cuprice15;

			$ez3 = $org_price+(($org_price*$ez3value)/100); $fez3=$ez3; $ez3=$cuprice1-$ez3; 
			$ez3s=$ez3/2;
			$ez5=$org_price+(($ez5value*$org_price)/100); $fez5=$ez5; $ez5=$cuprice1-$ez5;
			$ez5s=$ez5/4;
			$priceout = "Item Price : ". number_format($cuprice1,0)."<br>
			<input type='radio' name='price' value='".intval(number_format($cuprice,0,'.','')).",normal'>
			BEST VALUE - $".number_format($cuprice,0)." Price after 15% discount when paid by Visa/MC. 
			<br/><input type='radio' name='price' value='". intval(number_format($ez3,0,'.','')).",3EZ'>
			3 EZ Pay - $".number_format($cuprice1,0)." Price $".number_format($fez3,0)." payment then 2 EZ payments of ".number_format($ez3s,0)." monthly
			<br/> 
			<input type='radio' name='price' value='". intval(number_format($fez5,0,'.','')).",5EZ'>
			5 EZ Pay - $".number_format($cuprice1,0)." Price $".number_format($fez5,0)." payment then 4 EZ payments of $".number_format($ez5s,0)."monthly.
			<input type='hidden' name='3ez_price' value='". intval(number_format($ez3,0,'.',''))."'>
			<input type='hidden' name='5ez_price' value='". intval(number_format($ez5,0,'.',''))."'>
			<input type='hidden' name='main_price' value='". intval(number_format($cuprice1,0,'.',''))."'>";
		}else {
			$priceout = "Item Price : ".number_format($cuprice1,0)."<br>
			<input type='radio' name='price' value='".number_format($cuprice,0).",normal'>
			BEST VALUE - $".number_format($cuprice,0)." Price after 15% discount when paid by Visa/MC. 
			<br/><input type='radio' name='price' value='".$fez3.",3EZ>";
		}
		echo $priceout;
	}

	function sendOfferEmail(){
		$saveSubsForm  = $this->Jewelrymodel->manageOfferEmail();
		if($saveSubsForm != '') {
			$emailAddress = $this->input->post('email_address');
			$price = $this->input->post('price');
			$color = $this->input->post('color');
			$cut = $this->input->post('cut');
			$clairty = $this->input->post('clairty');
			$omessage = $this->input->post('message');
			$videoId = $this->input->post('video_id');
			$videoName = $this->input->post('video_name');

			$to = SITE_EMAIL;
			$subject = "Make an Offer successfully!";

			$message = '<html>
				<head></head>
				<body>
					<div>Make an Offer Details:</div><br/>
					<div><b>Email:</b> '.$emailAddress.'</div><br/>
					<div><b>Price:</b> '.$price.'</div><br/>
					<div><b>Color:</b> '.$color.'</div><br/>
					<div><b>Cut:</b> '.$cut.'</div><br/>
					<div><b>Clairty:</b> '.$clairty.'</div><br/>
					<div><b>Message:</b> '.$omessage.'</div><br/>
					<div><b>VideoId:</b> '.$videoId.'</div><br/>
					<div><b>Video Name:</b> '.$videoName.'</div>
				</body>
			</html>';

			$messageUser = '<html>
				<head></head>
				<body>
					<div>Make an Offer Details:</div><br/>
					<div><b>Email:</b> '.$emailAddress.'</div><br/>
					<div><b>Price:</b> '.$price.'</div><br/>
					<div><b>Color:</b> '.$color.'</div><br/>
					<div><b>Cut:</b> '.$cut.'</div><br/>
					<div><b>Clairty:</b> '.$clairty.'</div><br/>
					<div><b>Message:</b> '.$omessage.'</div><br/>
					<div><b>Video Name:</b> '.$videoName.'</div>
				</body>
			</html>';

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: '.SITE_ADDRESS.'<'.SITE_EMAIL.'>' . "\r\n";

			mail($to,$subject,$message,$headers);
			mail($emailAddress,$subject,$messageUser,$headers);
			echo 'You made an Offer successfully please allow up to 24 hours for a qoute!';
		} else {
			echo 'With this email address is Make and Offer already here.';
		}
	}
}
?>