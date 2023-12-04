<?php
class Retailversionmodel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function saveTrialFormData($login_pass='') {
		
		$txt_email = trim( $_POST['txt_email'] );
		$getsIP = get_client_ip_server();
		
		$sqlemail = "SELECT * FROM dev_user WHERE email = '".$txt_email."' ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sqlemail);
		
		if( !empty($txt_email) ) {
			if ($query->num_rows() <= 0) 
			{
				$dateFields = array(
								'fname' => $_POST['txt_fname'],
								'lname' => $_POST['txt_lname'],
								'email' => $txt_email,
								'contact_info' => $_POST['txt_phone'],
								'sites_title' => $_POST['txt_company'],
								'dashboard_title' => $_POST['txt_company'],
								'job_title' => $_POST['txt_jobtitle'],
								'usertype' => 'admin',												
								'password' => md5($login_pass),
								'company_name' => $_POST['txt_company'],
								'industry_name' => $_POST['cmb_industry'],
								'system_ipadres' => $getsIP,
								'user_status' => 'Trial',
								'status' => 'active',
								'activation_date' => date('Y-m-d H:i:s'),
								'trial_exp_date' => date('Y-m-d', strtotime("+7 days")),
								'visible_pasview' => $login_pass,
								'true_trials' => $_POST['cb_trials']
								);
								
				$isinsert = $this->db->insert('dev_user',$dateFields);
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
	function count_trial_user_days() {
		$getsIP = get_client_ip_server();
		$sql = "SELECT datediff(`trial_exp_date`, CURDATE())+1 remaining_days from dev_user WHERE `trial_exp_date` >= CURDATE() AND system_ipadres = '".$getsIP."' ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$rtDays = $row->remaining_days;
		
		return ( ( !empty($rtDays) && $rtDays > 0 ) ? $rtDays : 0 );
	}
}

?>