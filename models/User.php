<?php  
class User extends CI_Model {
	function __construct(){
		parent::__construct();
   	}

	function loginhtml($page = ''){
		$loginlink  = '';
		if($this->session->isLoggedin()) {
			$user = $this->session->userdata('user');
			if($page =='admin')$loginlink = 'Welcome, <a href="' .config_item('base_url') . 'account/myaccount">'. ucfirst(substr($user->fname , 0, 30)) .'</a> [<a href="' .config_item('base_url') . 'account/signout"><strong> logout </strong></a>] | <a href="'.config_item('base_url').'">View Site</a>';
			else {
				$loginlink = 'Welcome, <a href="' .config_item('base_url') . 'account/myaccount">'. ucfirst(substr($user->fname , 0, 30)) .'</a> [<a href="' .config_item('base_url') . 'account/signout"><strong> logout </strong></a>] | <a href="'.config_item('base_url').'addtocart">Shopping Basket</a>';
				if($this->session->userdata('usertype') == 'admin')$loginlink .= ' | <a href="' . config_item('base_url') . 'admin">Site Admin</a>'; 
			}
		}else {
			$loginlink = '<a href="' .config_item('base_url') . 'account/signin">Sign In</a> | <a href="'.config_item('base_url').'addtocart">Shopping Basket</a>';
		}
		return $loginlink;
   }     

	function userExist($userid = ''){
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."user WHERE userid= '$userid'";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			return true;
		}else {
			return false;
		}
	}

	function giveuserid($userid){
		$sql = "SELECT userid FROM ".$this->config->item('table_perfix')."user WHERE id= '$userid'";
		$query = $this->db->query($sql);
		$user = $query->result();

		return  ($query->num_rows()) ? $user[0]->userid : '';
	}

	function user_save($username, $fname, $lname, $email ,$password, $options, $edit){
		$sha1_password = md5($password);
		$allow_options = serialize($options);
		$return_otpion = '';
		if($edit != '') {
			$sql = "UPDATE dev_customerinfo set username = '$username', email = '$email', fname = '$fname', lname = '$lname', allow_options = '$allow_options' WHERE id = '$edit'";
			$return_otpion = 'Edit';
		} else {
			$sql = "INSERT INTO dev_customerinfo (username, password, email, fname, lname, allow_options) VALUES (".$this->db->escape($username).", '$sha1_password', ".$this->db->escape($email).", '$fname', '$lname', '$allow_options')";
			$return_otpion = 'Add';
		}				
		$this->db->query($sql);
		return $return_otpion;
	}

	function get_user_info($id) {
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."customerinfo WHERE id='".$id."'";
		$query = $this->db->query($sql);
		$user = $query->result_array();
		return $user[0];
	}

	function get_affiliateuser_info($id) {
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."retailerlist WHERE id='".$id."'";
		$query = $this->db->query($sql);
		$user = $query->result_array();
		return $user[0];
	}

	function adduser($post , $regtype ='')	{
		$regretuen  = array();
		$regretuen['error'] = '';
		$userid 	= $this->input->post('email');
		$name 		= $this->input->post('name');
		$password 	= md5($this->input->post('password'));
		$now = date('Y-m-d H:s:i');
		$ip =  $this->input->ip_address();
		if($regretuen['error'] == ''){
			$isinsert = $this->db->insert($this->config->item('table_perfix').'user',
				array('userid' 		=>$userid,
				'usertype'	=> 'user',
				'fname'		=> $name,
				'lname'		=> '',
				'password' 	=> $password,
				'lastlogintime'	=>$now,
				'lastloginip'	=>$ip,
				'status'	=> 'activationwaiting')
			);
			if(!$isinsert)  $regretuen['error'] .= '<br>User Information not saved.';
			$isinsert = $this->db->insert($this->config->item('table_perfix').'profile',array('userid' 		=>$userid,'country'     => $post['country']));
			$regretuen['error'] .= $this->sendactivationkey($userid,$name);
		}
		return $regretuen;
	}

	function sendactivationkey($userid ='shahinbdboy@yahoo.com' ,$fname = 'shahin'){
		$regretuen  = '';
		$activationkey 		  = md5(microtime());
		$isinsert 			  = $this->db->insert($this->config->item('table_perfix').'activation',array('email' =>$userid,'activationkey' =>$activationkey ));
		if(!$isinsert) {
			$regretuen  .= '<br>Activation key not stored';  
		}else{
			$this->load->library('email');
			$this->email->set_mailtype('html');
			$this->email->from(config_item('site_email'), config_item('site_name'));
			$this->email->to($userid,$fname);
			$this->email->subject(config_item('site_name').'  - User account Activation ');
			$this->email->message('Thank you for registration with '.config_item('site_name').'. Click on the following link for activating your user account. <br><br><br><br> <a href="' . config_item('base_url') . 'useraccount/activate/' . str_ireplace('.' , '_omasters_newuser_',str_ireplace('@' , '_at_the_rate_omasters_',$userid)) . '/' .$activationkey . '" target="_blank">Activate Your Account </a><br><br><br><br><br><br>Your User ID: ' . $userid . ' <br><br>Regards<br>oMasters Team');
			$this->email->send();
		}
		return $regretuen;
	}

	function resendactivationkey($id){
		$regretuen		= '';
		$activationkey	= md5(microtime());
		$userid = $this->giveuserid($id);
		if($userid != ''){
			$sql = "SELECT * FROM ".$this->config->item('table_perfix')."activation  WHERE   email= ?";
			$binds = array($userid);
			$query = $this->db->query($sql, $binds);

			if($query->num_rows()){
				$this->db->where('email', $userid);
				$this->db->update($this->config->item('table_perfix').'activation',array('activationkey' =>$activationkey ));
			}else {
				$isinsert	= $this->db->insert($this->config->item('table_perfix').'activation',array('email'=>$userid, 'activationkey' =>$activationkey));
				if(!$isinsert) {
					$regretuen  .= 'Activation key not stored';
				}
			}
			$this->load->library('email');
			$this->email->set_mailtype('html');
			$this->email->from(config_item('site_email'), config_item('site_name'));
			$this->email->to($userid,'');
			$this->email->subject(config_item('site_name').'  - User account Activation ');
			$this->email->message('Thank you for registration with '.config_item('site_name').'. Click on the following link for activating your user account. <br><br><br><br> <a href="' . config_item('base_url') . 'useraccount/activate/' . str_ireplace('.' , '_omasters_newuser_',str_ireplace('@' , '_at_the_rate_omasters_',$userid)) . '/' .$activationkey . '" target="_blank">Activate Your Account </a><br><br><br><br><br><br>Your User ID: ' . $userid . ' <br><br>Regards<br>oMasters Team');
			$this->email->send();
		} else $regretuen  .= 'No user found';  

		return $regretuen; 
	}

	function login($username ='' , $userpass = ''){
		$loginreturn = array();
		$loginreturn['error'] = '';
		$checkEmail = strchr($username,"@");
		if (!empty($checkEmail)) {
			$sql = "SELECT * FROM ".$this->config->item('table_perfix')."user WHERE  email= ? AND password  = ?";
			$binds = array($username, (md5($userpass)));
		} else {
			$sql = "SELECT * FROM ".$this->config->item('table_perfix')."user WHERE  userid= ? AND password  = ?";
			$binds = array($username, (md5($userpass)));
		}
		$query = $this->db->query($sql, $binds);
		echo $query;exit;
		if($query->num_rows()){
			$user = $query->result();
			switch ($user[0]->status){
				case 'active':
					$now = date('Y-m-d H:s:i');
					$ip =  $this->input->ip_address();
					$this->db->where('userid',$user[0]->userid);
					$t = $this->db->update($this->config->item('table_perfix').'user',array('lastlogintime'=>$now,'lastloginip'=>$ip));
					$this->session->set_userdata('user',$user[0]);
					$this->session->set_userdata('loggedin','1');
					$this->session->set_userdata('login_full_name',$user[0]->fname.' '.$user[0]->lname);
					$this->session->set_userdata('usertype',$user[0]->usertype);
					$this->session->set_userdata('users_id',$user[0]->id);
					$this->session->set_userdata('user_status',$user[0]->user_status);
					break;
				case 'block':
					$user = array();
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('loggedin','0');
					$this->session->set_userdata('usertype','guest');
					$loginreturn['error'] .= '<b>Your account is blocked.</b> ';
					break;
				case 'suspended':
					$user = array();
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('loggedin','0');
					$this->session->set_userdata('usertype','guest');
					$loginreturn['error'] .= '<b>Your Account is suspended .<br /> Contact System administration for more details.</b> ';
					break;
				case 'activationwaiting':
					$id = $user[0]->id;
					$user = array();
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('loggedin','0');
					$this->session->set_userdata('usertype','guest');
					$loginreturn['error'] .= '<b>Account need to activate <br />Please check your email for activation link.</b><br> <a href="'.config_item('base_url').'useraccount/resendactivationkey/'.$id.'">Resend Activation Key</a> ';
					break;
				default:
					$user = array();
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('loggedin','0');
					$this->session->set_userdata('usertype','guest');
					$loginreturn['error'] .= '<b>User ID</b> / <b>Password</b> was incorrect<br>Unable to login';
					break;
			}
		}else {
			$user = array();
	        $this->session->set_userdata('user',$user);
			$this->session->set_userdata('loggedin','0');
			$this->session->set_userdata('usertype','guest');
			$loginreturn['error'] .= '<b>User ID</b> / <b>Password</b> was incorrect<br>Unable to login';
		}
		return $loginreturn;
	}

	function logout(){
		$user = array();
		$this->session->set_userdata('user',$user);
		$this->session->set_userdata('loggedin','0');
		$this->session->set_userdata('usertype','guest');
		$this->session->destroy();
	}

	function isactivate($userid = '' , $activationkey = ''){
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."activation  WHERE   email= ? AND activationkey  = ? ";
		$binds = array($userid, $activationkey);
		$query = $this->db->query($sql, $binds);
		if($query->num_rows()){
			$user = $query->result();
			$now = date('Y-m-d H:s:i');
			$this->db->where('userid',$user[0]->email);
			$updated = $this->db->update($this->config->item('table_perfix').'user',array('activation_date'=>$now,'status'=>'active'));
			if($updated)$this->db->delete($this->config->item('table_perfix').'activation', array('email' => $user[0]->email)); 
			return true;
		}else {
			return false;
		}
	}

	function forgotpassword($userid){
		$ret     = array('error' => '' , 'success' => '');
		$activationkey 		  = md5(microtime());
		$msg = 'This is an email to reset your password. To reset
		your password click on the following link.  <br><br><br><br> 
		<a href="' . config_item('base_url') . 'masters/resetpassword/' . str_ireplace('.' , '_omasters_forgotpass_',str_ireplace('@' , '_at_the_rate_omasters_',$userid)) . '/' .$activationkey . '" target="_blank"> Reset your password </a><br><br>If you are not requesting then plz let us contact about account security or simply do nothing, this link will be invalid after 24hours';
		$now = date('Y-m-d');
		$ip =  $this->input->ip_address();
		$this->db->query("DELETE FROM ".$this->config->item('table_perfix')."forgotpasswordkey WHERE reqdate < ".$now);
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."user WHERE email= '$userid'";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			$sql1 = "SELECT * FROM ".$this->config->item('table_perfix')."forgotpasswordkey WHERE email= '$userid'";
			$query1 = $this->db->query($sql1);
			if($query1->num_rows()){
				$this->db->where('email',$userid);
				$t = $this->db->update($this->config->item('table_perfix').'forgotpasswordkey',array('reqdate'=>$now,'reqip'=>$ip ,'reqkey' => $activationkey));
				if($t){
					$this->send_email($userid , 'Forgot Password' , $msg);
					$ret['success'] = 'An Email has been sent. Please check your email inbox / bulk';
				}else{
					$ret['error'] .= '<br>Error ! User id / email is invalid.';	   
				}
			}else{
				$isinsert	= $this->db->insert($this->config->item('table_perfix').'forgotpasswordkey',array('email'=> $userid , 'reqdate'=>$now, 'reqip'=>$ip ,'reqkey' => $activationkey));
				if($isinsert){
					$this->send_email($userid , 'Forgot Password' , $msg);
					$ret['success'] = 'An Email has been sent to user.Please check your email inbox / bulk';
				}else{
					$ret['error'] .= '<br>Error Sending forgot password email.';	   
				}
			}
		}else {
			$ret['error'] = 'Invalid User. Please  <a href="'.config_item('base_url').'masters/register">Register</a>';
		}
		return $ret;	
	}

	function varifyforgotpass($userid ='' , $key = ''){
		$now = date('Y-m-d');
		$ip =  $this->input->ip_address();
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."forgotpasswordkey WHERE email= '$userid' AND reqdate ='$now' AND reqip='$ip' AND reqkey='$key'";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			$newpassword = substr(md5(microtime()),0,8);
			$password    = md5($newpassword);
			$this->db->where('email',$userid);
			$t = $this->db->update($this->config->item('table_perfix').'user',array('password'=>$password));
			if($t){
				$msg = 'Your Password has been succefully reset. Your new reset password is <br><br><br>User ID :'.$userid . '<br>Password: ' . $newpassword .' <br><br> Thanks <br>'. config_item('site_name') .' Team';
				$this->send_email($userid , 'Your New Password' , $msg);
				$this->db->query("DELETE FROM ".$this->config->item('table_perfix')."forgotpasswordkey WHERE email = '$userid' ");
				return true;
			}else{
				return false;
			}
		}else {
			return false;
		}
	}

	function getprofile($id){
		$profile = array();
		$sql = 'SELECT u.id,
		u.fname ,
		u.lname,
		u.lastlogintime ,
		u.usertype,
		u.status ,
		u.activation_date ,
		u.rating ,
		p.sex,
		p.url,
		p.imageurl,
		p.businessname ,
		p.personaladdress ,
		p.f_paddress,
		p.businessaddress ,
		p.f_baddress,
		p.country ,
		p.state ,
		p.city ,
		p.street ,
		p.f_location,
		p.phoneno ,
		p.f_phoneno,
		p.pphone,
		p.f_pphone,
		p.busnesshour ,
		p.description,
		p.f_getemailfromuser,
		p.fax,
		p.dateofbirth,
		p.f_dateofbirth,
		p.latitude,
		p.longitude,
		p.gmapzoom FROM '
		. $this->config->item('table_perfix').'user as u join '. $this->config->item('table_perfix').'profile as p on u.userid = p.userid 
		where u.id=\''. $id .'\' and u.status =\'active\' and  u.userid != \'admin@omasters.com\'';
		$result = $this->db->query($sql);
		$profile  = $result->result_array();	

    	return $profile[0];
	}

	function send_email($to = 'shahinbdboy@gmail.com' , $subject = 'oMasters Email Fails' , $msg = ''){
		$this->load->library('email');
		$this->email->set_mailtype('html');
		$this->email->from(config_item('site_email'), config_item('site_name'));
		$this->email->to($to,'');
		$this->email->subject(config_item('site_name').$subject);
		$this->email->message($msg);
		$this->email->send();
	}

	function uploadphoto($post){
		$ret     = array('error' => '' , 'success' => '');
		if($this->session->isLoggedin()){
			$user     = $this->session->userdata('user');
			$extsupport = 'jpeg,gif,jpg,bmp,png'; 
			$maxuploadSize = 5500000; // max file site in bytes
			$attachExtension = '';
			$max_file = "1148576";	// Approx 1MB
			$max_width = "100";	// Max width allowed for the large image
			if($_FILES['mfile']['name'] != ''){
				$supportExt = explode(',',$extsupport);
				$fileExt = explode('.',$_FILES['mfile']['name']);
				if($_FILES['mfile']['size'] <= $maxuploadSize && $_FILES['mfile']['size'] > 0){
					if(in_array(strtolower($fileExt[1]),$supportExt)){
						$attachFileName = $_FILES['mfile']['tmp_name'];
						$attachExtension = strtolower($fileExt[1]);
						$saveTo = config_item('base_path') . 'uploads/userprofile/' .$user->id . '.' . $attachExtension; 
						$imageurl =  config_item('base_url') . 'uploads/userprofile/' .$user->id . '.' . $attachExtension; 
						$ismove = move_uploaded_file($attachFileName, $saveTo);
						chmod($saveTo, 0777);
						$width = $this->getWidth($saveTo);
						$height = $this->getHeight($saveTo);
						if ($width > $max_width){
							$scale = $max_width/$width;
							$uploaded = $this->resizeImage($saveTo,$width,$height,$scale , $attachExtension );
						}else{
							$scale = 1;
							$uploaded = $this->resizeImage($saveTo,$width,$height,$scale , $attachExtension);
						}
						if($ismove){
							$this->db->where('userid',$user->userid);
							$t = $this->db->update($this->config->item('table_perfix').'profile',array('imageurl' => $imageurl));
							if($t){
								$ret['success'] = $imageurl;
							}else{
								$ret['error'] = 'ERROR ! Image/avatar Not saved';
							} 
						}else {
							$ret['error'] =  '<br><b>ERROR ! </b>File Can\t upload to server';
						}
					}else{
						$ret['error'] =  '<br> Invalid File Type : <b>'.$fileExt[1] . '</b>';
					}
				}else{
					$ret['error'] = '<br>File size too big (' . $_FILES['mfile']['size'] . ')';
				}
			}
		}
		return $ret;
	}

	function resizeImage($image,$width,$height,$scale,$type) {
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch ($type){
			case 'gif':
				$source = imagecreatefromgif($image);
				imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
				imagejpeg($newImage,$image,90);//imagegif($newImage,$image,90);
				break;

			case 'png':
				$source = imagecreatefrompng($image);
				imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
				imagejpeg($newImage,$image,90);//imagepng($newImage,$image,90);
				break;

			case 'bmp':
				$source = imagecreatefromwbmp($image);
				imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
				imagejpeg($newImage,$image,90);//imagewbmp($newImage,$image,90);
				break;

			case 'jpeg':
			default:
				$source = imagecreatefromjpeg($image);
				imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
				imagejpeg($newImage,$image,90);
				break;
		}
		chmod($image, 0777);
		return $image;
	}

	function getHeight($image) {
		$sizes = getimagesize($image);
		$height = $sizes[1];
		return $height;
	}

	function getWidth($image) {
		$sizes = getimagesize($image);
		$width = $sizes[0];
		return $width;
	}

	function getprofiles($start = 0 , $limit = 18 , $orderby = 'activation_date'){
		$profile = array();
		$sql = 'SELECT u.id,
		u.fname ,
		u.lname,
		u.usertype,
		u.status ,
		u.activation_date ,
		u.rating ,
		p.sex,
		p.url,
		p.imageurl,
		p.businessname ,
		p.personaladdress ,
		p.f_paddress,
		p.businessaddress ,
		p.f_baddress,
		p.country ,
		p.state ,
		p.city ,
		p.street ,
		p.f_location,
		p.pphone,
		p.f_pphone,
		p.busnesshour ,
		p.f_getemailfromuser,
		p.fax,
		p.dateofbirth,
		p.f_dateofbirth,
		p.latitude,
		p.longitude FROM '
		. $this->config->item('table_perfix').'user as u join '. $this->config->item('table_perfix').'profile as p on u.userid = p.userid where u.status =\'active\' and u.userid != \'admin@omasters.com\' 
		order by '. $orderby . ' limit '. $start . ', '. $limit;
		$result = $this->db->query($sql);
		$profile  = $result->result_array();	

		return $profile;
	}

	function savelocation($post){
		$regretuen  = array();
		$regretuen['error'] = '';
		$regretuen['success'] = '';
		if(is_array($post)){
			$lat = isset($post['latbox']) ? $post['latbox'] : '0';
			$lng = isset($post['lngbox']) ? $post['lngbox'] : '0';
			$zoom = isset($post['gmapzoom']) ? $post['gmapzoom'] : '1';
			$user     = $this->session->userdata('user');
			$this->db->where('userid',$user->userid);
			$t = $this->db->update($this->config->item('table_perfix').'profile',array('latitude'  => $lat, 'longitude' => $lng , 'gmapzoom' => $zoom));
			if($t){
				$regretuen['success'] = 'New Location Saved';
			}else{
				$regretuen['error'] = 'ERROR ! Location Not saved';
			}
		}
		return $regretuen;
	}

	function editprofile($post){
		$retuen  = array();
		$retuen['error'] = '';
		$retuen['success'] = '';
		if(is_array($post)){
			$fname 				= $post['fname'];
			$lname 				= $post['lname'];
			$sex 				= $post['sex'];
			$businessname 		= $post['businessname'];
			$businessaddress 	= $post['businessaddress'];
			$f_baddress 		= $post['f_baddress'];
			$personaladdress 	= $post['personaladdress'];
			$f_paddress			= $post['f_paddress'];
			$country 			= $post['country'];
			$city 				= $post['city'];
			$street 			= $post['street'];
			$phone 				= $post['phone'];
			$pphone 			= $post['pphone'];
			$description    	= $post['description'];
			$busnesshour    	= $post['busnesshour'];
			$url           		= $post['url'];
			$dateofbirth    	= $post['dateofbirth'] ;
			$f_dateofbirth  	= $post['f_dateofbirth'] ;
			$f_paddress     	= $post['f_paddress'] ;
			$f_baddress     	= $post['f_baddress'] ;
			$f_location     	= $post['f_location'] ;
			$f_phoneno    		= $post['f_phoneno'] ;
			$f_pphone     		= $post['f_pphone'] ;
			$fax 				= $post['fax'];
			$f_getemailfromuser = isset($post['f_getemailfromuser']) ? '1' : '0' ;
			$user     = $this->session->userdata('user');
			$this->db->where('userid',$user->userid);
			$t = $this->db->update($this->config->item('table_perfix').'user',array('fname'=> $fname,'lname'=> $lname));
			$this->db->where('userid',$user->userid);
			$t = $this->db->update($this->config->item('table_perfix').'profile',
			array(
				'sex'		=> $sex,
				'businessname' 	=> $businessname,
				'businessaddress'	=> $businessaddress,
				'f_baddress'		=> $f_baddress,
				'personaladdress'	=> $personaladdress,
				'f_paddress' 		=> $f_paddress,
				'country' 			=> $country,
				'city' 				=> $city,
				'street' 			=> $street,
				'phoneno' 			=> $phone,
				'description' 		=> $description,
				'busnesshour'  		=> $busnesshour,
				'url' 				=> $url,
				'f_dateofbirth' 	=> $f_dateofbirth,
				'f_paddress' 		=> $f_paddress,
				'f_baddress' 		=> $f_baddress,
				'f_location' 		=> $f_location,
				'f_phoneno' 		=> $f_phoneno,
				'f_pphone' 			=> $f_pphone,
				'dateofbirth' 		=> $dateofbirth)
			);
			if($t){
				$retuen['success'] = 'Your Information has been saved';
			}else{
				$retuen['error'] = 'ERROR ! Information not saved';
			}
    	}
		return $retuen;
	}

	function getEducation($id = '', $page =1, $rp = 10,$sortname = 'todate',$sortorder = 'desc',$query= '', $qtype = 'school', $eduid = ''){
		$results = array();
		$sort = "ORDER BY $sortname $sortorder";
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		$qwhere = "";
		if ($query) $qwhere .= " AND e.$qtype LIKE '%$query%' ";
		if($eduid != '') $qwhere .= " AND e.id = $eduid";
		$sql = 'SELECT e.id,e.fromdate, e.todate, e.school,e.degree, e.areaofstudy,e.result, e.details FROM '. $this->config->item('table_perfix').'user as u join '. $this->config->item('table_perfix').'education as e on u.id = e.userid where e.userid=\''. $id .'\' and u.status =\'active\' and  u.userid != \'admin@omasters.com\' '. $qwhere . ' ' . $sort . ' '. $limit;
		$result = $this->db->query($sql);
		$results['education']  = $result->result_array();
		$sql2 = 'SELECT e.id FROM '. $this->config->item('table_perfix').'user as u join '. $this->config->item('table_perfix').'education as e on u.id = e.userid where e.userid=\''. $id .'\' and u.status =\'active\' and  u.userid != \'admin@omasters.com\' '. $qwhere;
		$result2 = $this->db->query($sql2);
		$results['count']  = $result2->num_rows();

    	return $results;
	}

	function addEditEducation($post , $action = '' , $id = ''){
		$retuen  = array();
		$retuen['error'] = '';
		$retuen['success'] = '';
		if($action == 'delete'){
			$items = rtrim($_POST['items'],",");
			$sql = "DELETE FROM ".$this->config->item('table_perfix')."education WHERE  id IN ($items) and userid = ".$this->session->userdata('user')->id ;
			$total = count(explode(",",$items)); 
			$result = $this->db->query($sql);
			$retuen['total'] = $total;
		}else{
			if(is_array($post)){
				$user 			= $this->session->userdata('user');
				$fromdate		= isset($post['fromdate']) 	? $post['fromdate'] : '';
				$todate 		= isset($post['todate']) 	? $post['todate'] : '';
				$school 		= isset($post['school'])  	? $post['school'] : '';
				$areaofstudy 	= isset($post['areaofstudy']) ? $post['areaofstudy'] : '';
				$result 		= isset($post['result']) 	? $post['result'] : '';
				$degree 		= isset($post['degree']) 	? $post['degree'] : '';
				$details 		= isset($post['details']) 	? $post['details'] : '';
				if($action == 'edit'){
					$this->db->where('userid',$user->id);
					$this->db->where('id',$id);
					$t = $this->db->update($this->config->item('table_perfix').'education',
					array('fromdate' 		=> $fromdate,
					'todate' 			=> $todate,
					'school' 			=> $school,
					'result'			=> $result,
					'degree' 			=> $degree,
					'areaofstudy' 	=> $areaofstudy,
					'details' 		=> $details
					));
				}
				if($action == 'add'){
					$t = $this->db->insert($this->config->item('table_perfix').'education',
					array('userid' 			=> $user->id,
					'fromdate' 		=> $fromdate,
					'todate' 			=> $todate,
					'school' 			=> $school,
					'result'			=> $result,
					'degree' 			=> $degree,
					'areaofstudy' 	=> $areaofstudy,
					'details' 		=> $details
					));
				}										  
				if($t){
					$retuen['success'] .= 'Your Information has been saved';
				}else{
					$retuen['error'] .= 'ERROR ! Information not saved';
				}
			}
		}
		return $retuen;
	}

	function getExperiences($id = '' , $page =1 , $rp = 10 ,$sortname = 'todate' ,$sortorder = 'desc' ,$query= '' , $qtype = 'school' , $eduid = ''){
		$results = array();
		$sort = "ORDER BY $sortname $sortorder";
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		$qwhere = "";
		if ($query) $qwhere .= " AND e.$qtype LIKE '%$query%' ";
		if($eduid != '') $qwhere .= " AND e.id = $eduid";

		$sql = 'SELECT e.id,e.fromdate, e.todate, e.companyname,e.companyurl, e.position,e.industry, e.details,e.iscurrent,e.experiencetype FROM '. $this->config->item('table_perfix').'user as u join '. $this->config->item('table_perfix').'experiences as e on u.id = e.userid where e.userid=\''. $id .'\' and u.status =\'active\' and  u.userid != \'admin@omasters.com\' '. $qwhere . ' ' . $sort . ' '. $limit;
		$result = $this->db->query($sql);
		$results['experience']  = $result->result_array();

		$sql2 = 'SELECT e.id FROM '. $this->config->item('table_perfix').'user as u join '. $this->config->item('table_perfix').'experiences as e on u.id = e.userid where e.userid=\''. $id .'\' and u.status =\'active\' and  u.userid != \'admin@omasters.com\' '. $qwhere ;
		$result2 = $this->db->query($sql2);
    	$results['count']  = $result2->num_rows();

    	return $results;
	}

	function addEditExperiences($post , $action = '' , $id = ''){
		$retuen  = array();
		$retuen['error'] = '';
		$retuen['success'] = '';
		if($action == 'delete'){
			$items = rtrim($_POST['items'],",");
			$sql = "DELETE FROM ".$this->config->item('table_perfix')."experiences WHERE  id IN ($items) and userid = ".$this->session->userdata('user')->id;
			$total = count(explode(",",$items)); 
			$result = $this->db->query($sql);
			$retuen['total'] = $total;
		}else{
			if(is_array($post)){
				$user 			= $this->session->userdata('user');
				$fromdate		= isset($post['fromdate']) 	? $post['fromdate'] : '';
				$todate 		= isset($post['todate']) 	? $post['todate'] : '';
				$companyname 	= isset($post['companyname'])  	? $post['companyname'] : '';
				$companyurl 	= isset($post['companyurl']) ? $post['companyurl'] : '';
				$position 		= isset($post['position']) 	? $post['position'] : '';
				$industry 		= isset($post['industry']) 	? $post['industry'] : '';
				$details 		= isset($post['details']) 	? $post['details'] : '';
				$iscurrent     = isset($post['iscurrent']) ? true : false;
				$experiencetype= isset($post['experiencetype']) ? $post['experiencetype'] : '';

				if($action == 'edit'){
					$this->db->where('userid',$user->id);
					$this->db->where('id',$id);
					$t = $this->db->update($this->config->item('table_perfix').'experiences',
					array('fromdate' 		=> $fromdate,
					'todate' 			=> $todate,
					'companyname' 	=> $companyname,
					'companyurl'		=> $companyurl,
					'position' 		=> $position,
					'industry' 		=> $industry,
					'details' 		=> $details,
					'iscurrent'		=> $iscurrent,
					'experiencetype'  => $experiencetype
					));
				}
				if($action == 'add'){
					$t = $this->db->insert($this->config->item('table_perfix').'experiences',
					array('userid' 			=> $user->id,
					'fromdate' 		=> $fromdate,
					'todate' 			=> $todate,
					'companyname' 	=> $companyname,
					'companyurl'		=> $companyurl,
					'position' 		=> $position,
					'industry' 		=> $industry,
					'details' 		=> $details,
					'iscurrent'		=> $iscurrent,
					'experiencetype'  => $experiencetype
					));
				}
				if($t){
					$retuen['success'] .= 'Your Information has been saved';
				}else{
					$retuen['error'] .= 'ERROR ! Information not saved';
				}
			}
		}
		return $retuen;
	}

	function user_register($username , $name , $email , $password , $activation_code){
		$sha1_password = md5($password);
		$query_str = "INSERT INTO ".$this->config->item('table_perfix')."user (userid , password , email , fname , status) VALUES (? , ? ,? ,? ,? )";
		$this->db->query($query_str , array($username , $sha1_password , $email , $name , $activation_code ));
		header('location:'.config_item('base_url').'account/successfully_registered');
	}	

	function getCustInfoDetail($id='') {
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."customerinfo WHERE id = '".$id."'";
		$query = $this->db->query($sql);
		$row   = $query->row();
		return $row;
	}

	function user_register2($username , $name , $email , $password , $activation_code){
		$sha1_password = md5($password);
		$query_str = "INSERT INTO dev_customerinfo (username , password , email , name , status, userpass_view) VALUES (? , ? ,? ,? ,?, ? )";
		$this->db->query($query_str , array($username , $sha1_password , $email , $name , $activation_code, $password ));
		header('location:'.config_item('base_url').'account/successfully_registered/');
	}

	function getCustomerInfo($view='', $table_name='customerinfo') {
		$usersID = $this->session->userdata('userid');
		$user_ID = $this->session->userdata('wh_user_id');
		$userID = ( $table_name == 'customerinfo' ? $usersID : $user_ID );

		$sql = "SELECT * FROM ".$this->config->item('table_perfix').$table_name." WHERE id = ?";
		$query = $this->db->query($sql, array($userID));
		$row   = $query->row();
		if(empty($view)) {
			$data = array(
				'email' => isset($_POST['email'])?$_POST['email']:'',
				'phone' => isset($_POST['phone'])?$_POST['phone']:'',
				'address' => isset($_POST['address1'])?$_POST['address1']:'',
				'fname' => isset($_POST['fname'])?$_POST['fname']:'',
				'lname' => isset($_POST['lname'])?$_POST['lname']:'',
				'address2' => isset($_POST['address2'])?$_POST['address2']:'',
				'country' => isset($_POST['cmb_country'])?$_POST['cmb_country']:'',
				'city' => isset($_POST['city'])?$_POST['city']:'',
				'province' => isset($_POST['state'])?$_POST['state']:'',
				'postcode' => isset($_POST['zipcode'])?$_POST['zipcode']:'',
				'newsletter_subs' => isset($_POST['news_signup'])?$_POST['news_signup']:'',
				'billing_address' => isset($_POST['billing_adres'])?$_POST['billing_adres']:'',
				'billing_fname' => isset($_POST['biling_fname'])?$_POST['biling_fname']:'',
				'billing_lname' => isset($_POST['biling_lname'])?$_POST['biling_lname']:'',
				'billing_adres1' => isset($_POST['biling_address1'])?$_POST['biling_address1']:'',
				'billing_adres2' => isset($_POST['biling_address2'])?$_POST['biling_address2']:'',
				'billing_country' => isset($_POST['biling_country'])?$_POST['biling_country']:'',
				'billing_city' => isset($_POST['biling_city'])?$_POST['biling_city']:'',
				'billing_province' => isset($_POST['biling_state'])?$_POST['biling_state']:'',
				'billing_postcode' => isset($_POST['biling_zipcode'])?$_POST['biling_zipcode']:'',
				'billing_phone' => isset($_POST['biling_phone'])?$_POST['biling_phone']:'',
				'billing_email' => isset($_POST['biling_email'])?$_POST['biling_email']:'',
			);
			$carData = array(
				'cc_number' => isset($_POST['creditcardno'])?$_POST['creditcardno']:'',
				'exp_month' => isset($_POST['expmonth'])?$_POST['expmonth']:'',
				'exp_year' => isset($_POST['expyear'])?$_POST['expyear']:'',
				'cvv_code' => isset($_POST['cvvcode'])?$_POST['cvvcode']:'',
				'payment_terms' => isset($_POST['payment_terms'])?$_POST['payment_terms']:''
			);
			$dateArFeilds = (isset($_POST['creditcardno']) && !empty($_POST['creditcardno']) ? array_merge($carData, $data) : $data );
			if(isset($_POST['continueorder']) && !empty($_POST['continueorder'])) {	
				$this->db->where('id', $userID);
				$this->db->update($this->config->item('table_perfix').$table_name, $dateArFeilds);	
			}
		}
		return $row;
	}

	function saveCustomerInfo($view='', $field='') {
		$userID = $this->session->userdata('userid');
		$fields = ( $field == '' ? '*' : $field );

		$sql = "SELECT $fields FROM ".$this->config->item('table_perfix')."customerinfo WHERE id = ?";
		$query = $this->db->query($sql, array($userID));
		$row   = $query->row();
		if(empty($view)) {
			if(isset($_POST)){
				$data = array(
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'address' => $_POST['address1'],
					'fname' => $_POST['fname'],
					'lname' => $_POST['lname'],
					'address2' => $_POST['address2'],
					'country' => $_POST['cmb_country'],
					'city' => $_POST['city'],
					'province' => $_POST['state'],
					'postcode' => $_POST['zipcode'],
					'default_ship' => $_POST['default_ship'],
					'default_bill' => $_POST['default_bill'],
					'billing_address' => $_POST['billing_adres'],
					'billing_fname' => $_POST['biling_fname'],
					'billing_lname' => $_POST['biling_lname'],
					'billing_adres1' => $_POST['biling_address1'],
					'billing_adres2' => $_POST['biling_address2'],
					'billing_country' => $_POST['biling_country'],
					'billing_city' => $_POST['biling_city'],
					'billing_province' => $_POST['biling_state'],
					'billing_postcode' => $_POST['biling_zipcode'],
					'billing_phone' => $_POST['biling_phone'],
					'billing_email' => $_POST['biling_email']
				);
				if(isset($_POST['email']) && !empty($_POST['email'])) {
					$this->db->where('id', $userID);
					$this->db->update($this->config->item('table_perfix')."customerinfo", $data);
				}
			}
		}
		return $row;
	}

	function manageCustomerInfo($user_id='') {
		$row = false;
		if(!empty($user_id)) {
			$sql = "SELECT * FROM ".$this->config->item('table_perfix')."customerinfo WHERE id = ?";
			$query = $this->db->query($sql, array($user_id));
			$row   = $query->row();
		}

		if(isset($_POST)){
			$login_pass = $this->input->post('login_pass', TRUE);
			$data = array(
				'email' => $this->input->post('email', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'address' => $this->input->post('address1', TRUE),
				'fname' => $this->input->post('fname', TRUE),
				'lname' => $this->input->post('lname', TRUE),
				'address2' => $this->input->post('address2', TRUE),
				'country' => $this->input->post('cmb_country', TRUE),
				'city' => $this->input->post('city', TRUE),
				'province' => $this->input->post('state', TRUE),
				'postcode' => $this->input->post('zipcode', TRUE),
				'username' => $this->input->post('login_user', TRUE),
				'password' => md5($login_pass)
			);
			if(isset($_POST['email']) && !empty($_POST['email'])) {
				if( empty($user_id) ) {
					$isinsert = $this->db->insert($this->config->item('table_perfix').'customerinfo', $data);
					if(!$isinsert)  $regretuen['error'] .= '<br>User Information not saved.';
				} else {
					$this->db->where('id', $user_id);
					$this->db->update($this->config->item('table_perfix')."customerinfo", $data);
				}
			}
		}
		return $row;
	}

	function manageaffiliateCustomerInfo($user_id='') {
		$row = false;
		if(!empty($user_id)) {
			$sql = "SELECT * FROM ".$this->config->item('table_perfix')."retailerlist WHERE id = ?";
			$query = $this->db->query($sql, array($user_id));
			$row   = $query->row();
		}

		if(isset($_POST)){
			$login_pass = $this->input->post('login_pass', TRUE);
			$data = array(
				'email' => $this->input->post('email', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'address' => $this->input->post('address1', TRUE),
				'fname' => $this->input->post('fname', TRUE),
				'lname' => $this->input->post('lname', TRUE),
				'address2' => $this->input->post('address2', TRUE),
				'country' => $this->input->post('cmb_country', TRUE),
				'city' => $this->input->post('city', TRUE),
				'state' => $this->input->post('state', TRUE),
				'province' => $this->input->post('state', TRUE),
				'postcode' => $this->input->post('zipcode', TRUE),
				'username' => $this->input->post('login_user', TRUE),
				'user_name' => $this->input->post('login_user', TRUE),
				'password' => md5($login_pass),
				'password_text' => $login_pass
			);
			if(isset($_POST['email']) && !empty($_POST['email'])) {
				if( empty($user_id) ) {
					$isinsert = $this->db->insert($this->config->item('table_perfix').'retailerlist', $data);
					if(!$isinsert)  $regretuen['error'] .= '<br>User Information not saved.';
				} else {
					$this->db->where('id', $user_id);
					$this->db->update($this->config->item('table_perfix')."retailerlist", $data);
				}
			}
		}
		return $row;
	}

	function manageTrialUsers($user_id='') {
		$row = false;
		if(!empty($user_id)) {
			$sql = "SELECT * FROM ".$this->config->item('table_perfix')."user WHERE id = ?";
			$query = $this->db->query($sql, array($user_id));
			$row   = $query->row();
		}

		$pass_field = $this->input->post('login_pass', TRUE);
		$account_type = $this->input->post('account_type', TRUE);
		if($account_type == 'P' && $row->demo_active == 'N') {
			require_once('paid_account_vsections.php');
			$this->db->query("UPDATE dev_user SET demo_active = 'Y' WHERE id = '".$user_id."'");
			$directoryName = make_copyof_demosoft($user_id); /// call a function to create an copy of demo software for paid user
		}
		if(isset($_POST)){
			$login_pass = $this->input->post('login_pass', TRUE);
			$data = array(
				'fname' => $this->input->post('fname', TRUE),
				'lname' => $this->input->post('lname', TRUE),
				'contact_info' => $this->input->post('phone_no', TRUE),
				'userid' => $this->input->post('txt_uname', TRUE),
				'email' => $this->input->post('txt_email', TRUE),
				'industry_name' => $this->input->post('cmb_industry', TRUE),
				'job_title' => $this->input->post('job_title', TRUE),
				'password' => md5($pass_field),
				'visible_pasview' => $pass_field,
				'soft_status' => $account_type,
				'directory_name' => $directoryName['dirname']
			);
			if(isset($_POST['txt_email']) && !empty($_POST['txt_email'])) {
				$this->db->where('id', $user_id);
				$this->db->update($this->config->item('table_perfix')."user", $data);
				if(isset($_FILES['site_logo']['name']) && !empty($_FILES['site_logo']['name'])){	
					$this->uploads_file('site_logo', 'sitelg', $ar=array('user', 'sites_logo', 'id', $user_id));
				}
			}
		}
		return $row;
	}

	function uploads_file($field, $hint='showth', $ar=array('shows', 'upload_img', 'id', '0'), $path='uploads/') {
		$rd = rand(99,999);
		$fileName = '';
		$tableName 	  = $ar[0];
		$updatedField = $ar[1];
		$pkID 		  = $ar[2];
		$id_value     = $ar[3];
		if($_FILES[$field]['name'] != '') {
			$fileName = $id_value.'_'.$hint.'_'.$_FILES[$field]['name'];
			$row_list = $this->getsTableRowLine($id_value, $tableName);
			if( !empty($row_list[$updatedField]) ) {
				unlink($path.$row_list[$updatedField]);
			}
			$sql = "UPDATE " . $this->config->item('table_perfix') . "$tableName set $updatedField = '".$fileName."' WHERE $pkID = '".$id_value."'";
			$result = $this->db->query($sql);
			move_uploaded_file($_FILES[$field]['tmp_name'], $path.$fileName);
		}
		return $fileName;
	}

	function getsTableRowLine($id='', $table='shows'){
		$qry = "SELECT * FROM ".config_item('table_perfix')."$table WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();
		return isset($result) ? $result[0] : false;
	}

	function updateAccountSetting() {
		$userID = $this->session->userdata('userid');
		if(!empty($_POST['name_section']) || !empty($_POST['email_section'])){
			if(!empty($_POST['name_section'])) {
				$data = array(
					'fname' => $_POST['first_name'],
					'lname' => $_POST['last_name']
				);
			}
			if( !empty($_POST['email_section']) ) {
				$data = array(
					'email' => $_POST['email_adres'],
					'password' => md5($_POST['newlogin_pass'])
				);
			}
			$this->db->where('id', $userID);
			$this->db->update($this->config->item('table_perfix')."customerinfo", $data);
		}
		return true;
	}

	/* check email address in db */
	function check_email_address($email){
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."customerinfo WHERE  email LIKE '%".$email."%' ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		$results = $query->result_array();
		return $results[0];
	}

	function update_forgot_pass($id, $pass){
		$sql = "UPDATE ".$this->config->item('table_perfix')."customerinfo SET password  = '".md5($pass)."' WHERE  id = '".$id."'";
		$this->db->query($sql);
		return 'true';
	}

	function loginsiteuser2($username ='' , $userpass = '', $usertype=''){
		$loginreturn = array();
		$loginreturn['error'] = '';
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."customerinfo WHERE  username='".$username."' AND password  = '".md5($userpass)."' ";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			$user = $query->result();
			switch ($user[0]->status){
				case '1':
					$now = date('Y-m-d H:s:i');
					$ip =  $this->input->ip_address();
					$this->db->where('id',$user[0]->id);
					$t = $this->db->update($this->config->item('table_perfix').'customerinfo',array('lastlogintime'=>$now,'lastloginip'=>$ip));
					$this->session->set_userdata('user',$user[0]);
					$this->session->set_userdata('loggedin','1');
					$this->session->set_userdata('usertype','customer');
					$this->session->set_userdata('userid',$user[0]->id);
					break;
				case '2':
					$user = array();
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('loggedin','0');
					$this->session->set_userdata('usertype','guest');
					$loginreturn['error'] .= '<b>Your account is blocked.</b> ';
					break;
				case '3':
					$user = array();
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('loggedin','0');
					$this->session->set_userdata('usertype','guest');
					$loginreturn['error'] .= '<b>Your Account is suspended .<br /> Contact System administration for more details.</b> ';
					break;
				case '4':
					$id = $user[0]->id;
					$user = array();
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('loggedin','0');
					$this->session->set_userdata('usertype','guest');
					$loginreturn['error'] .= '<b>Account need to activate <br />Please check your email for activation link.</b><br> <a href="'.config_item('base_url').'useraccount/resendactivationkey/'.$id.'">Resend Activation Key</a> ';
					break;
				default:
					echo ($this->session->userdata('usertype'));
					exit();
					$user = array();
					$this->session->set_userdata('user',$user);
					$this->session->set_userdata('loggedin','0');
					$this->session->set_userdata('usertype','guest');
					$loginreturn['error'] .= 'Unable to login, <b>User ID</b> / <b>Password</b> was incorrect';
					break;
			}
		}else {
			$user = array();
	        $this->session->set_userdata('user',$user);
			$this->session->set_userdata('loggedin','0');
			$this->session->set_userdata('usertype','guest');
			$loginreturn['error'] .= 'Unable to login, <b>User ID</b> / <b>Password</b> was incorrect<br>';
		}
		return $loginreturn;
	}

	/* check password */
	function check_correctpass($userpass = '', $tablename='customerinfo', $u_id='userid'){
		$loginreturn = array();
		$userID = $this->session->userdata($u_id);
		$loginreturn['error'] = '';
		$sql = "SELECT * FROM ".$this->config->item('table_perfix').$tablename." WHERE password  = '".md5($userpass)."' AND id = '".$userID."'";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0 && !empty($userpass)){
			$loginreturn['error'] = '';
		} else {
			$loginreturn['error'] = 'error';			
		}
		return $loginreturn;
	}

	function getOrderdetails($orderid){
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."order WHERE  id='$orderid'";
        $qresult = $this->db->query($sql);
        $result['order'] = $qresult->result_array();
        $sql = "SELECT * FROM ".$this->config->item('table_perfix')."customerinfo WHERE  id='{$result['order'][0]['customerid']}'";
        $qresult = $this->db->query($sql);
        $result['customer'] = $qresult->result_array();
        return $result;
	}

	function user_guest_register2($username , $name , $email , $password , $activation_code){
		$sha1_password = md5($password);
		$query_str = "INSERT INTO dev_customerinfo (username , password , email , name , status, userpass_view) VALUES (? , ? ,? ,? ,?, ? )";
		$this->db->query($query_str , array($username , $sha1_password , $email , $name , $activation_code, $password ));
	}

}
?>