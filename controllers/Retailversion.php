<?php 
class Retailversion extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data = $this->getCommonData(); 
		$data['title'] = 'Education';
		$output = $this->load->view('education/index' , $data , true);
		$this->output($output , $data);
	}

	private function getCommonData($banner=''){
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();

		return $data;
	}

	function output($layout = null , $data = array() , $isleft = true , $isright = true){
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'wh_header' , $data , true);
		if($isleft)$output .= $this->load->view($this->config->item('template').'left' , $data , true);
		$output .= $layout;
		if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
		$output .= $this->load->view($this->config->item('template').'wh_footer', $data , true);
		$this->output->set_output($output);
	}

	function retailer_version() {
		$data = $this->getCommonData();

		$data['page_title'] = 'Yadegar Diamonds Wholesaller and Rtailer Version';
		$output = $this->load->view('retailversions/wholsaler_view', $data, true);
		$this->output($output, $data, true);
	}

	function free_trials_account() {
		$data = $this->getCommonData();

		$data['page_title'] = 'Yadegar Diamonds Wholesaller and Rtailer Version';
		$output = $this->load->view('retailversions/freetrails_view', $data);
		//$this->output($output, $data, true);
	}

	function sbmitTrialForm() {
		$this->load->model('retailversionmodel');
		$txt_email = $_POST['txt_email'];
		$full_name = $_POST['txt_fname'];
		$loginPass = rand(999999,999);
		$returns = $this->retailversionmodel->saveTrialFormData($loginPass);
		$mesage = '';
		if($returns == 'fail') {
			echo 'This email address is already registered here!'; exit;
		}
		if($returns == 'empty') {
			echo 'Please enter your email address!'; exit;
		}
		if($returns == 'pass') {
			$to = $txt_email;
			$subject = "Yadegardiamonds.com 7 Day Free Trial Activation Email";
			$message = '<html>
				<body>
				<div>Hi '.$full_name.'</div>
				<div>'."\t\t".' You are successfully registered for Jewelercart.com 5.0 Free 7 day Trial software for Diamond & Jewelry Retailers, Brokers and Wholesalers.<br>What does Jewelercart.com 5.0 Software do?<br><br>
				1.Turn key Complete Web E-Solution for Jewelers, Diamond Dealers and Wholesalers that installs within 5 seconds.<br><br>
				2.Build your own Suite,ring builder , Earring builder, Pendant Builder, three stone ring builder and Loose Diamond Integration<br><br>
				3.Api Integrations with major Jewelry manufactures and diamond trade portals<br><br>
				4.Competetive Framework that allows your website to compete with companies like Bluenile and Jamesallen<br><br>
				5.Complete Back office to Manage all orders and Inventory<br><br>
				6.Complete integration with market places such as amazon.com, ebay.com and sears.<br><br>
				7.Responsive webdesign for Smart Devices and Phones along with Modrewrite to increase Search Engine Visibility<br><br>
				8.Custom Diamond and Jewelry App Modules to develop customized applications unique to your business practices<br><br>
				Your trial account login detail is listed below:<br><br>
				Front End of Software<br>
				<a href="'.SITE_URL.'">Click Here</a> to View 7 day Trial Version <br><br>
				Back Office<br>
				<a href="'.SITE_URL.'admin">Click here</a> to Login to Backoffice of your Trial Software<br><br>
				<table width="100%" border="0" cellspacing="2" cellpadding="2">
					<tr>
						<td width="12%">Login Email:</td>
						<td width="88%">'.$txt_email.'</td>
					</tr>
					<tr>
						<td>Login Password:</td>
						<td>'.$loginPass.'</td>
					</tr>
				</table>
				<br><br>
				During this 7 day Free Trial Yadegardiamonds\'s Project Manager Ms. Shine Dedoroy will be following up to answer any questions.<br><br>
				Project Manager Shine Dedoroy<br>
				260 Peachtree Street Suite 2200<br>
				Atlanta , Georgia<br>
				30303 <br>
				Direct:415-626-5035 <br>
				Company:415-626-5035<br>
				orders@godstonediamonds.com <br>
				https://www.godstonediamonds.com<br></div>
			</body>
			</html>';

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$rowuser = $this->Commonmodel->getMainAdminProfileDetail();
			$headers .= 'From: Yadegardiamonds.com 7 Day Free Trial Activation Email <'.$rowuser['email'].'>' . "\r\n";
			mail($to,$subject,$message,$headers);

			echo 'Please check your email for login detail!'; exit;
		}
	}
}