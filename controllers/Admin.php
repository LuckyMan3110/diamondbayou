<?php
class Admin extends CI_Controller {
	private $totalEmails;
	public function __construct(){
		parent::__construct();
		$this->load->helper('admin_libs');
		$this->load->helper('admin_mainmenu');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('ordrs_detail');
		$this->load->model('Adminmodel');
		$this->load->model('Adminsectionmodels');
		$this->load->model('Adminjewelrymodel');
		$this->load->model('Malak_adminmodel');
		$this->load->model('Commonmodel');
		$this->load->model('catemodel');
		$this->load->model('Jewelrymodel');
		$this->load->model('Diamondmodel');
		$this->load->model('Engagementmodel');
		$this->load->model('Watchesmodel');
		$this->load->model('Categorymodel');
		$this->load->model('Productmodel');
		$this->load->model('Stulleringsmodel');
		$this->load->model('Helixmodel');
		$this->load->model('Cronmodel');
		$this->load->model('Davidsternmodel');
		$this->load->model('Qualitymodel');
		$this->load->model('User');
		$ttEmail = $this->Adminmodel->getEmailsReceivedList();
		$this->totalEmails = $ttEmail['count']; 

		require_once APPPATH.'third_party/PHPExcel.php';
		$this->excel = new PHPExcel();

		$cu = current_url();
		$url = explode('/', $cu);
		$uri = ( isset($url[4]) ? $url[4] : '' );
		$this->session->set_userdata('pages_name', $uri);
	}

	function index() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
        if ($this->isadminlogin()) {
            $data['order_details'] = $this->Commonmodel->calc_order_section_values();
            $data['date_from'] = $this->input->post('date_from');
            $data['date_to']   = $this->input->post('date_to');
            $data['order_list_rows'] = $this->getOrderListingRows($_POST);
            $output = $this->load->view('admin/order_summary_details_view', $data, true);
        } else {
            $output = $this->load->view('admin/login', $data, true);
        }
        $this->output($output, $data);
	}

	function updateringsprice(){
		$query = $this->db->query("SELECT id,price,retail_price FROM `dev_engagement_rings` WHERE `status` = '1' ORDER BY `id` ASC");
        $results = $query->result_array();
		$newRPrice = 0; $newWPrice = 0;
		foreach($results as $row){
			$totlD = $row['price']*(1.23);
			$newRPrice = preg_replace('/\s+/', '', $totlD);
			$newWPrice = preg_replace('/\s+/', '', $totlD);

			$sql = "UPDATE dev_engagement_rings SET price = '".$newRPrice."', retail_price = '".$newWPrice."' WHERE id = '".$row['id']."'";
			//$this->db->query($sql);
		}
		header('Location:'.SITE_URL.'admin/index');
		exit;
    }

	function getOrderListingRows($post=[]){
        $results = $this->Adminsectionmodels->getOrderResults($post);
        $order_rows = '';
        $i = 1;

        if(count($results)){
			foreach( $results as $rows ) {
				$order_total_price = view_order_details_content($rows['orders_id'], '', '', '', 'price'); //ordrs detail helper
				$order_rows .= '<tr>
					<td>'.$i.'</td>
					<td>'.$rows['orders_id'].'</td>
					<td>'.$rows['shiping_method'].'</td>
					<td>'.$rows['orderdate'].'</td>
					<td>$ '._nf($order_total_price, 2).'</td>
					<td>
						<a href="'.SITE_URL.'admin/sendContact/'.$rows['customerid'].'/'.$rows['id'].'">Mail Chimp</a> | 
						<a href="'.SITE_URL.'admin/getorderdetail_view/'.$rows['id'].'">Order Detail</a>
					</td>
				</tr>';
                $i++;
            }
        } else {
            $order_rows .= '<tr><td colspan="6"><b>No Order Rows Found</b></td></tr>';
        }
        return $order_rows;
    }

	/* Diamond stud earing page */
	function diamond_stud_earing($page='', $options=''){
		$data = $this->getCommonData();

		if ($this->isadminlogin()) {
			$data['page_name'] = 'Diamond Stud Earrings';
			$data['stullers_stud_lists'] = $this->get_stuller_stud_list_options();
			if( !empty($_POST['btn_submit']) ) {
				$this->Adminmodel->managed_stud_audit();   //// insert or update the stud fields data
				redirect('/admin/update_stuller_prices/stud_option/stuller_products_studearrings/diamond_stud_earing');
			}

			if(!empty($options)){
				$data['success'] = 'Diamond Stud Earrings is updated Successfully!';
			}

            $output = $this->load->view('admin/diamond_stud_earing_admin', $data, true);
            $this->output($output, $data);
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data); 
        }
    }

	function get_stuller_stud_list_options() {
		$diamond_quality_list = array('1/5 ct tw', '1/4 ct tw', '1/3 ct tw', '1/2 ct tw', '3/4 ct tw', '1 ct tw', '1 1/2 ct tw', '2 ct tw');
		$diamond_quality_list_1 = array('1/5 ct tw', '1/4 ct tw', '1/3 ct tw', '1/2 ct tw', '3/4 ct tw', '1 ct tw');
		$diamond_quality_list_2 = array('1/2 ct tw', '3/4 ct tw', '1 ct tw', '1 1/2 ct tw', '2 ct tw');
		$diamond_quality_list_3 = array('1/4 ct tw', '1/3 ct tw', '1/2 ct tw', '3/4 ct tw', '1 ct tw');
		$diamond_quality_list_4 = array('1/4 ct tw', '1/3 ct tw', '3/4 ct tw');
		$diamond_quality_list_5 = array('1/4 ct tw', '1/3 ct tw', '1/2 ct tw', '3/4 ct tw', '1 ct tw', '1 1/2 ct tw', '2 ct tw');
		$diamond_quality_list_6 = array('3/8 ct tw', '5/8 ct tw', '1 ct tw', '1 3/8 ct tw', '1 9/10 ct tw', '2 1/2 ct tw');
		$diamond_quality_list_7 = array('1 ct tw', '3 ct tw', '6 ct tw');
		$diamond_quality_list_8 = array('5/8 ct tw', '1 1/4 ct tw', '1 1/3 ct tw', '1 1/2 ct tw');
		$diamond_quality_list_9 = array('1 ct tw', '1 3/4 ct tw');

		$stuller_list = '<h3 class="table_abov_heading">3-PRONG COCKTAIL-STYLE DIAMOND STUD EARRINGS WITH FRICTION BACKS</h3>
		<div class="submit_btn"><input type="submit" name="btn_submit" value="Submit Stud" /></div><br>
		<div class="">
			<table class="form_table">
				'. $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: SI2-3, G-H', 'label', 0, 8);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: I1, G-H', '', 8);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: I2, I-J', '', 16);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: I3, G-H', '', 24);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">3-PRONG COCKTAIL STYLE DIAMOND STUD EARRINGS WITH THREADED BACKS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: SI2-3, G-H', 'label', 32);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: I1, G-H', '', 40);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">4-PRONG BASKET STYLE DIAMOND STUD EARRINGS WITH FRICTION BACKS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: SI2-3, G-H', 'label', 48);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_1, 'Diamond Quality: I1, G-H', '', 56, 6);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: I2, I-J', '', 62);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list, 'Diamond Quality: I3, G-H', '', 70);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">4-PRONG BASKET STYLE DIAMOND STUD EARRINGS WITH THREADED BACKS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_2, 'Diamond Quality: SI2-3, G-H', 'label', 78, 5);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">4-PRONG PRINCESS-CUT DIAMOND STUD EARRINGS WITH FRICTION BACKS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_3, 'Diamond Quality: SI2-3, G-H', 'label', 83, 5);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_4, 'Diamond Quality: I1, G-H', '', 88, 3);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">4-PRONG PRINCESS-CUT DIAMOND STUD EARRINGS WITH THREADED BACKS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_5, 'Diamond Quality: SI2-3, G-H', 'label', 91, 7);
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_2, 'Diamond Quality: I1, G-H', '', 98, 5);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">HALO-STYLE DIAMOND STUD EARRINGS WITH FRICTION BACKS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_6, 'Diamond Quality: I1, G-H', 'label', 103, 6);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">DIAMOND FANTASYA DIAMOND STUD EARRINGS WITH THREADED BACKS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_7, 'Diamond Quality: I2, G-H', 'label', 109, 3);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">ROUND CLUSTER DIAMOND STUD EARRINGS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_8, 'Diamond Quality: I2-I3, H-J', 'label', 112, 4);
				$stuller_list .= '<tr><td colspan="8"><br><br><h3 class="table_abov_heading">SQUARE CLUSTER DIAMOND STUD EARRINGS</h3></td></tr>';
				$stuller_list .= $this->quality_stud_options($diamond_quality_list_9, 'Diamond Quality: I2-I3, H-J', 'label', 116, 2);
			$stuller_list .= '</table>
		</div>';
		return $stuller_list;
	}

	function quality_stud_options($cols_array=array(), $option_title='', $label='', $st=0, $limit=8) {
		$br = ( empty($label) ? '<br><br>' : '' );
		$result = $this->Adminmodel->get_stud_earring_result($st, $limit); //print_ar($result);
		$view_options = '<tr><td colspan="8">'.$br.'<h3 class="main_form_heading">'.$option_title.'</h3></td></tr>';
		$view_options .= '<tr>';
		foreach( $cols_array as $quality_list ) {
			$view_options .= '<th>'.$quality_list.'</th>';
		}
		$view_options .= '</tr>';
		$view_options .= '<tr>';
		$i = 0;
		foreach( $cols_array as $quality_value ) {
			$view_options .= '<td>Stud ID&nbsp;: <input type="text" name="product_list_id[]" readonly value="'.$result[$i]['id'].'" /><br>'
			. 'Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<input type="text" name="product_list_price[]" value="'.$result[$i]['price'].'" />'
			. '</td>';
			$i++;
		}
		$view_options .= '</tr>';
		return $view_options;
	}

    function update_stuller_prices($pageOption='', $table='', $url_path='diamond_stuller_earing') {
        $this->Adminmodel->update_stuller_db_rows($pageOption, $table);
        redirect('/admin/'.$url_path.'/'.$pageOption.'/true', 'refresh');die();
    }

    function managed_stuller_page($page_option='') {
        $this->load->helper('stullering');
        $tablesName = getStulerTable( $page_option );
        $this->Adminmodel->managed_stud_audit('', $page_option);
        $this->Adminmodel->update_stuller_db_rows($page_option, $tablesName['product']);
        echo $tablesName['title'] . ' is updated successfully!';
    }

    function update_stuller_detial($pid='', $detail_id='', $pageOption='') {
		$this->load->helper('stullering');
		$tablesName = getStulerTable( $pageOption );
		$this->Adminmodel->update_stuller_detail_table($pid, $detail_id, $_POST[$detail_id], $tablesName['details']);

		echo $tablesName['title'] . ' is updated successfully!';
    }

    function update_stuller_page($pageOption='', $stullerID='') {
		$this->load->helper('stullering');
		$tablesName = getStulerTable( $pageOption );
		$this->Adminmodel->update_stuller_table($stullerID, $_POST['stuller_'.$stullerID], $tablesName['product']);

		echo $tablesName['title'] . ' is updated successfully!';
    }

	/* Diamond stud earing page */
    function diamond_stuller_earing($page_option='', $return='') {
        $data = $this->getCommonData();
        if($page_option == 'wedding_bands_diamond'){
            $page_option = 'wb_diamond';
        }
        if($page_option == 'wedding_bands_ladies'){
            $page_option = 'wb_ladies';
        }
        if($page_option == 'wedding_bands_platinum'){
            $page_option = 'wb_platinum';
        }

        if ($this->isadminlogin()) {
            $this->load->helper('stullering');
            $data['page_name'] = 'Diamond Stuller Earrings';
            $tablesName = getStulerTable( $page_option );
            $data['stuller_title'] = $tablesName['title'];
            $data['page_option']   = $page_option;
            $data['submit_option'] = ( !empty($return) ? $data['stuller_title'] . ' is updated successfully!' : '' );

            $stuller_result = $this->Adminmodel->getStulleRingResult( $tablesName['product'] );
            $data['stuller_rows'] = $this->stuller_listings_row( $stuller_result, $page_option, $tablesName );

            $output = $this->load->view('admin/diamond_stuller_earing_admin', $data, true);
            $this->output($output, $data);
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data); 
        }
    }

	/* Stuller section rows */
	function stuller_listings_row($result=array(), $p_option='', $table_ar=array()) {
		$quality_list = stuller_quality_list();
		$quality_options = array();
        $view_list = '<tr>
			<th>Stuller Image</th>
			<th>'.$table_ar['title'].' Title</th>
			<th>Price</th>
			<th>Profit Price</th>
		</tr>';

		if( count($result) > 0 ) {
			foreach( $result as $rows ) {
				$prod_images = $this->Stulleringsmodel->getStullerImages( $rows['id'], $table_ar['product'], $table_ar['images'] );
				$image_src = 'stuller/'.$table_ar['folder'].'/'.$prod_images[0]['product_image'];
				$product_image = SITE_URL.$image_src;
				$view_list .= '<tr>
					<td width="10%"><img src="'.$product_image.'" alt="'.$rows['title'].'" width="50" height="50" /></td>    
					<td width="40%">'.$rows['title'].'<br>'
					. '<a href="'.SITE_URL.'stuller_new_rings/wbands_diamond_detail/'.$rows['id'].'/'.$p_option.'" target="_blank">View Detail</a>';
					$view_list .= ' | <a href="#javascript" onClick="view_options_block(\'quality_'.$rows['id'].'\')">Missing Prices</a>';
					if( !empty($table_ar['details']) ) {
						$rowdetail = $this->Stulleringsmodel->get_stuller_details( $rows['id'], $table_ar['details'] );
						if( count($rowdetail) > 0 ) {
							$view_list .= ' | <a href="#javascript" onClick="view_options_block(\''.$rows['id'].'\')">View Options</a>';
							$view_list .= '<div id="'.$rows['id'].'" style="display:none;"><table>'
							. '<tr>'
							. '<th>Item #</th>'
							. '<th>Quality</th>'
							. '<th>Price</th>'
							. '<th>Profit Price</th>'
							. '</tr>';
							foreach( $rowdetail as $rowdetail ) {
								$onChangeFunc = 'detail_price_update(\''.$rows['id'].'\', \''.$rowdetail['id'].'\')';
								$view_list .= '<tr>
								<td>'.$rowdetail['item_number'].'</td>
								<td>'.$rowdetail['quality'].'</td>
								<td><input type="text" name="'.$rowdetail['id'].'" value="'.$rowdetail['price'].'" onkeyup="'.$onChangeFunc.'" /></td>
								<td>'.number_format( $rowdetail['price'] - ($rowdetail['price']/3), 2 ).'</td>
								</tr>';
								$quality_options[] = $rows['quality'];
							}
							$view_list .= '</table></div>';
						}
					}
					$view_list .= '<div id="quality_'.$rows['id'].'" style="display:none;"><table>'
					. '<tr>'
                    . '<th>ID Number</th>'
                    . '<th>Quality</th>'
                    . '<th>Price</th>'
                    . '<th>Update Price</th>'
                    . '</tr>';

					$qualityList = array_unique( $quality_options );
					foreach( $quality_list as $quality ) {
						if( !in_array($quality, $qualityList) ) {
							$view_list .= '<tr>
							<td>'.$rows['item_number'].'</td>
							<td>'.$quality.'</td>
							<td>Please Call for prices</td>
							<td><input type="text" name="'.$rowdetail['id'].'" value="" onkeyup="" /></td>
							</tr>';
						}
					}
					$view_list .= '</table></div>';
					$view_list .= '</td>';
					$view_list .= '<td width="30%"><input type="hidden" name="product_list_id[]" value="'.$rows['id'].'" /><br>'
					. '<input type="text" name="stuller_'.$rows['id'].'" value="'.$rows['price'].'" onkeyup="update_stuller_form(\''.$rows['id'].'\')" />'
					. '</td>
					<td width="30%">$'.number_format( $rows['price'] - ($rows['price']/3), 2 ).''. '</td>
				</tr>';
			}
		}
        return $view_list;
	}

	function contentpage($page='ebaylogin') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();

		if( isset($_POST['save_udpate_access']) ){
			$updateData = array(
				'type'      => $this->input->post('type'),
				'userName'  => $this->input->post('userName'),
				'password'  => $this->input->post('password')
			);
			$ma_id = $this->catemodel->update_any_table($updateData, 'marketplace_access', 'type', $this->input->post('type')); 
			if($ma_id){
                $data['msg'] = 'Successfully Save '.$this->input->post('type').' Access';
                $data['msg_notify'] = 1;
            }else{
                $data['msg'] = '<b>Sorry!</b>, There is something wrong here, Please try again.';
                $data['msg_notify'] = 2;
            }
    	}

		if ($this->isadminlogin()) {
			$data['login_full_name'] = $this->session->userdata('login_full_name');
			switch($page) {
				case 'ebaylogin':
					$data['pages_title'] = 'Ebay Login';
					$pagecontents = 'https://signin.ebay.com/ws/eBayISAPI.dll?SignIn&UsingSSL=1&pUserId=&co_partnerId=2&siteid=0&ru=https%3A%2F%2Fmy.ebay.com%2Fws%2FeBayISAPI.dll%3FMyEbayBeta%26MyEbay%3D%26gbh%3D1%26guest%3D1&pageType=3984';
					$data['pagecontents'] = file_get_contents($pagecontents);
				break;
				case 'amazonlogin':
					$data['pages_title'] = 'Amazon Login';
					$pagecontents = 'https://www.amazon.com/ap/signin?openid.return_to=https%3A%2F%2Fwww.amazon.com%2Fyour-account%3Fref_%3Dnav_ya_signin&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.assoc_handle=usflex&openid.mode=checkid_setup&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&&openid.pape.max_auth_age=0';
					$data['pagecontents'] = file_get_contents($pagecontents);
				break;
				case 'etsylogin':
					$data['pages_title'] = 'Etsy Login';
					$pagecontents = 'https://www.etsy.com/signin?ref=hdr&from_action=signin-header&from_page=https%3A%2F%2Fwww.etsy.com%2F';
					$data['pagecontents'] = file_get_contents($pagecontents);
				break;
				default:
					$data['pages_title'] = 'Ebay Login';
					$pagecontents = 'https://signin.ebay.com/ws/eBayISAPI.dll?SignIn&UsingSSL=1&pUserId=&co_partnerId=2&siteid=0&ru=https%3A%2F%2Fmy.ebay.com%2Fws%2FeBayISAPI.dll%3FMyEbayBeta%26MyEbay%3D%26gbh%3D1%26guest%3D1&pageType=3984';
					$data['pagecontents'] = file_get_contents($pagecontents);
				break;
			}

			$data['viewTasks'] = $this->viewImportanTaskList();
			$data['extraheader'] = '<link rel="stylesheet" href="'.ADMIN_LIB.'css/dashboard.css">';
			$where_type				=  array('type' => $data['pages_title']);
    		$data['get_mpa_data'] 	=  $this->catemodel->getdata_any_table_where($where_type, 'marketplace_access');

			$output = $this->load->view('admin/marketplace_login', $data, true);
		} else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}

	/* Admin login */
	function signin($msg = ''){
		if($this->session->isLoggedin()){ 
			$this->load->helper('url'); redirect('admin' , 'refresh');
		}
		$data = $this->getCommonData(); 
		$data['title'] = 'Login';
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		if(($msg != ''))$data['loginerror'] =  $msg ;
		$this->form_validation->set_rules('username', 'User ID', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[35]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['title'] = "Emerald Cut Diamonds|Princess Cut Diamonds|Trillion Cut Diamonds|Asscher Cut Diamonds";
		$data['meta_tags'] = '
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
		<meta name="revisit-after" content="7 days">';
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
				header('location:'.config_item('base_url').'admin');
			}
		}
	}

	/* rapnet import */
	function rapnetimport() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = dirname(__FILE__) . "/jewelriesinventory/" . basename($_FILES['template_file']['name']);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$fp = fopen($uploadfile, "r");
						$row = 1;
						$batchInsert = array();
						while (!feof($fp)) {
							$data = fgetcsv($fp, $_FILES['template_file']['size']);
							if ($row > 1) {
								if (!empty($data[0])) {
								$insertRows = $this->Adminmodel->rapnetimport($data);
								if( !empty($insertRows) ) 
									$batchInsert[] = $insertRows;
								}
							}
							$row++;
						}
						array_filter($batchInsert);

						if( count($batchInsert) > 0) {
							$colsValues = implode(", ", $batchInsert);
							$finalInsert = "INSERT INTO dev_rapproduct (lot, ebayid, owner, shape, carat, color, fancy_color, fancy_color_ot, clarity, price, Rap, Cert, Depth, TablePercent, Girdle, Culet, Polish, Sym, Flour, Meas, Comment, Stones, Cert_n, Stock_n, Make, Date, City, State, Country, ratio, cut, tbl, pricepercrt, certimage, length, width, height, category, lab, fancy_color_intens, crown, pavilion, pavilion_angle, crown_angle, fcolor_value, price_incsv, cutgrade, girdle_thin, girdle_thick, culet_condition, parcelStoneCount, pair_separable, pair_no, keyto_symb, shade, star_length, center_inclusion, black_inclusion, member_coment, have_image, remarks, memo, inventory_id, location, floursence_color) VALUES $colsValues ON DUPLICATE KEY UPDATE `owner` = VALUES(`owner`), `shape` = VALUES(`shape`), `carat` = VALUES(`carat`), `color` = VALUES(`color`), `fancy_color` = VALUES(`fancy_color`), `fancy_color_ot` = VALUES(`fancy_color_ot`), `clarity` = VALUES(`clarity`), `price` = VALUES(`price`), `Rap` = VALUES(`Rap`), `Cert` = VALUES(`Cert`), `Depth` = VALUES(`Depth`), `TablePercent` = VALUES(`TablePercent`), `Girdle` = VALUES(`Girdle`), `Culet` = VALUES(`Culet`), `Polish` = VALUES(`Polish`), `Sym` = VALUES(`Sym`), `Flour` = VALUES(`Flour`), `Meas` = VALUES(`Meas`), `Comment` = VALUES(`Comment`),  `Stones` = VALUES(`Stones`), `Cert_n` = VALUES(`Cert_n`), `Stock_n` = VALUES(`Stock_n`), `Make` = VALUES(`Make`), `Date` = VALUES(`Date`), `City` = VALUES(`City`), `State` = VALUES(`State`),  `Country` = VALUES(`Country`), `ratio` = VALUES(`ratio`), `cut` = VALUES(`cut`), `tbl` = VALUES(`tbl`), `pricepercrt` = VALUES(`pricepercrt`), `certimage` = VALUES(`certimage`), `length` = VALUES(`length`), `width` = VALUES(`width`), `height` = VALUES(`height`), `lab` = VALUES(`lab`), `fancy_color_intens` = VALUES(`fancy_color_intens`), `crown` = VALUES(`crown`), `crown_angle` = VALUES(`crown_angle`), `pavilion` = VALUES(`pavilion`), `pavilion_angle` = VALUES(`pavilion_angle`)";
							$this->db->query($finalInsert);
						}
						fclose($fp);
						$data['message'] = 'Inventory Successfully Updated';
					}
				}
			}

			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('jewelriesinventory');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#ecommerce").click();';
			$output = $this->load->view('admin/rapnetimport', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	/* ploygon import */
	function polygonimport() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = dirname(__FILE__) . "/jewelriesinventory/" . basename($_FILES['template_file']['name']);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$fp = fopen($uploadfile, "r");
						$row = 1;
						while (!feof($fp)) {
							$data = fgetcsv($fp, $_FILES['template_file']['size']);
							if ($row > 1) {
								if (!empty($data[0])) {
									$this->Adminmodel->polygonimport($data);
								}
							}
							$row++;
						}
						fclose($fp);
						$data['message'] = 'Inventory Successfully Updated';
					}
				}
			}
            $data['leftmenus'] = $this->Adminmodel->adminmenuhtml('jewelriesinventory');
            $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#ecommerce").click();';
            $output = $this->load->view('admin/polygonimport', $data, true);
            $this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	/* idex import */
	function ideximport() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = dirname(__FILE__) . "/jewelriesinventory/" . basename($_FILES['template_file']['name']);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$fp = fopen($uploadfile, "r");
						$row = 1;
						while (!feof($fp)) {
							$data = fgetcsv($fp, $_FILES['template_file']['size']);
							if ($row > 1) {
								if (!empty($data[0])) {
									$this->Adminmodel->ideximport($data);
								}
							}
							$row++;
						}
						fclose($fp);
						$data['message'] = 'Inventory Successfully Updated';
					}
				}
			}
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('jewelriesinventory');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#ecommerce").click();';
			$output = $this->load->view('admin/ideximport', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	/* Start Diamonds import */
	function diamondsimport(){
		error_reporting(1);
		ini_set('max_execution_time', 3000);
		ini_set('memory_limit','-1');
		//$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = dirname(__FILE__) . "/jewelriesinventory/" . basename($_FILES['template_file']['name']);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$file_type	= PHPExcel_IOFactory::identify($uploadfile);
						$objReader	= PHPExcel_IOFactory::createReader($file_type);
						$objPHPExcel = $objReader->load($uploadfile);
						$loadedSheetNames = $objPHPExcel->getSheetNames();

						foreach($loadedSheetNames as $sheetIndex => $loadedSheetName){
							$sheetData	= $objPHPExcel->getSheetByName($loadedSheetName)->toArray(null,true,true,true);
							$i = 0;
							foreach ($sheetData as $data){
								if($i != 0){
									$this->Adminmodel->ringimport($data);
								}
								$i++;
							}
						}
						$data['message'] = 'Total '.$i.' New Engagement Rings Successfully Uploaded.';
					}
				}
			}
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('jewelriesinventory');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#ecommerce").click();';
			$output = $this->load->view('admin/diamondsimport', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function isadminlogin() {
		if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
			return true;
		} else {
			return false;
		}
	}

	function post_field($field) {
		return $this->input->post($field, TRUE);
	}

	function getAdminDetails() {
		if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
			return 'Administrator';
		} else {
			return '-1';
		}
	}

	function ezpay() {
		if ($_POST['stuller'] == 'enable' or $_POST['stuller'] == 'disable'){
			$this->Adminmodel->ezpaymodelcontrol('stuller', $_POST['stuller']);
			$data2['status'] = 'Success';
		}elseif ($_POST['quality'] == 'enable' or $_POST['quality'] == 'disable'){
			$this->Adminmodel->ezpaymodelcontrol('quality', $_POST['quality']);
			$data2['status'] = 'Success';
		}elseif ($_POST['unique'] == 'enable' or $_POST['unique'] == 'disable'){
			$this->Adminmodel->ezpaymodelcontrol('unique', $_POST['unique']);
			$data2['status'] = 'Success';
		}elseif ($_POST['ez3'] != '' and $_POST['ez5'] != ''){
			$this->Adminmodel->addezvalue($_POST['ez3'],$_POST['ez5']);
			$data2['status'] = 'Success';
		}
		$ezvalues = $this->Adminmodel->getezvalue();
		$data2['ez3value'] = $ezvalues[0]['ezvalue'];
		$data2['ez5value'] = $ezvalues[1]['ezvalue'];
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
		$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
		$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
		});';
		$data['leftmenus'] = $this->Adminmodel->adminmenuhtml();
		$data['newtestimonials'] = $this->Adminmodel->newfeedbacks();
		$output = $this->load->view('admin/optionsview', $data2, true);
		$this->output($output, $data);
	}

	function commonpagetemplate($templateid = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#sitemanage").click();';

			$pages = $this->Adminmodel->getCommonPages();
			$data['pages'] = $this->Commonmodel->makePageoptions($pages, 'topicid', 'description');
			if (isset($_POST['templateid'])) {
				$data['templateid'] = $_POST['templateid'];
			} else {
				$data['templateid'] = '';
				$data['pagetitle'] = '';
			}

			if (isset($_POST['submit'])) {
				if (isset($_POST['page_content'])) {
					if ($this->Adminmodel->saveCommonPageTemplate($_POST, $data['templateid'], $_POST['page_content'], $_POST['pagetitle']))
						$data['success'] = 'Page Template saved';
					else
						$data['error'] = 'Page Template not saved';
				}
			}
			$data['use_tinymce'] = 'admin';
			$data['content'] = $this->Adminmodel->getCommonPageTemplate($data['templateid']);
			$output = $this->load->view('admin/commonpagetemplates', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}

	function globalvariables($configid = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#sitemanage").click();';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('globalvariable');
			$globalvariable = $this->Adminmodel->getglobalvariable();
			$data['globalvariables'] = $this->Commonmodel->makeoptions($globalvariable, 'id', 'descriptions');
			$data['globalvariableid'] = ( $_POST) ? $_POST['globalvariableid'] : '';
			if ($_POST) {
				if (isset($_POST['contenthtml'])) {
					if ($this->Adminmodel->saveglobalvariableByid($data['globalvariableid'], $_POST['contenthtml']))
					$data['success'] = '<h1 class="success">Global Information saved</h1>';
					else
					$data['error'] = '<h1 class="error">Global Inforation not saved</h1>';
				}
			}
			$data['content'] = $this->Adminmodel->getglobalvariableByid($data['globalvariableid']);
			$output = $this->load->view('admin/globalvariable', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}

	private function output($layout = null, $data = array()) {
		$user = $this->session->userdata('user');
		$data['user'] = $user;
		$data['loginlink'] = $this->User->loginhtml('admin');
		$output = $this->load->view('admin/header', $data, true);
		if ($this->session->isLoggedin() && ($this->session->userdata('usertype') == 'admin')) {
			$output .= $layout;
		} else {
			$output .= $this->load->view('admin/login', $data, true);
		}
		$output .= $this->load->view('admin/footer', $data, true);
		$this->output->set_output($output);
	}

	private function getCommonData() {
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();
		return $data;
	}

	/* Start: Jeweleri Management By Mamun Date: 1.3.2013 */
	function jewelries_manager($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader']  = '';
		$data['collections'] ='';
		$data['typeoptions'] = '';
		$data['action_type'] = $action;
		$excel_file_path = 'excel_libs/';

        if(!empty( $_FILES['import_xlfile']['name'])){
			$excelFile = $excel_file_path.$_FILES['import_xlfile']['name'];
			move_uploaded_file($_FILES['import_xlfile']['tmp_name'], $excelFile);
			echo $_FILES['import_xlfile']['tmp_name']; 

			require_once 'excel_libs/reader.php';
			$data = new Spreadsheet_Excel_Reader();

			$data->setOutputEncoding('CP1251');
			$data->read(SITE_URL.'/'.$excelFile);
			error_reporting(E_ALL ^ E_NOTICE);

			for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
				for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
					echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
				}
				echo "\n";
			}
			echo 'Excel File read here!';
			exit;
			unlink( $excelFile );
        }

		if($this->isadminlogin()){
			if($action == 'delete'){
				$ret = $this->Malak_adminmodel->jewelries($_POST , $action , $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
				header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
				header("Cache-Control: no-cache, must-revalidate" );
				header("Pragma: no-cache" );
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: ".$ret['total'].",\n";
				$json .= "}\n";
				echo $json;
			}else{
				if($action == 'add' || $action == 'edit'){
					$this->load->library('form_validation');
					$this->form_validation->set_rules('vendor_name', 'vendor_name', 'trim|required');
					$this->form_validation->set_rules('vendor_sku', 'vendor_sku', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if(isset($_POST[$action.'btn'])){
						if ($this->form_validation->run() == FALSE){
							$data['error'] = 'ERROR ! Please check the error fields';
							if($action != 'edit')$data['details'] = $_POST;
						}else {
							$jewlabel  = $this->input->post('jewlabel');
							$jew_field = $this->input->post('jew_field');
							$description = $this->input->post('desc_field');
							$detailField = array();
							$detail_field = '';

							if( isset($jewlabel) && !empty($jewlabel) ) {
								for($i=0; $i < count($jewlabel); $i++) {
									$fieldValue = ( $jewlabel[$i] != 'Description' ? strip_tags($jew_field[$i]) : $description );
									$detailField[] = array($jewlabel[$i], $fieldValue);
								} 
								$detail_field = serialize( $detailField );
							}

							$ret = $this->Malak_adminmodel->jewelries($_POST , $action , $id, $detail_field);
							if($ret['error'] == '')$data['success'] = $ret['success'];
							else{
								$data['error'] = $ret['error'];
								if($action != 'edit')$data['details']  = $_POST;
							}
						}
					}

					$data['extraheader'] .= $this->Commonmodel->addEditor('simple' );
					$data['gemstones'] = $this->Malak_adminmodel->getGemstonesByStockId($id);
					if($action == 'edit') {
						$data['details'] = $this->Jewelrymodel->getAllByStock($id);
						$data['global_fields'] = unserialize( $data['details']['global_fields'] );

						$details = $data['details'];
						switch ($details['section']){
							case 'Earrings':
								$collections = '<option value="DiamondStud">Diamond Stud Earrings</option><option value="BuildEarring">Build Your Own Earrings</option>';
								break;
							case 'EngagementRings':
								$collections = '<option value="International Collection">International Collection</option>';
								break;
							case 'Jewelry':
								$collections = '<option value="MensWeddingRing">Men\'s Wedding Rings</option>  <option value="WomensWeddingRing">Women\'s Wedding Rings</option>  <option value="WomensAnniversaryRing">Women\'s Anniversary Rings</option> ';
								break;
							case 'Pendants':
								$collections = '<option value="BuildPendant">Build your own Pendants</option>';
								break;
							default:
								break;
						}
						$data['collections'] =$collections;
						$data['animations'] = $this->Malak_adminmodel->getFlashByStockId($id);
						$data['id'] = $id;
					}
				}

				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
				$(this).css({backgroundImage:"url('.config_item('base_url').'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
				$(this).siblings().css({backgroundImage:"url('.config_item('base_url').'images/plus.jpg)"});
				});
				$("#jewelrymanage").click();';
				$data['leftmenus']	=	$this->Malak_adminmodel->adminmenuhtml('jewelries');
				$url = config_item('base_url').'admin/getjewelries_manager';
				$data['action'] = $action;
				$data['onloadextraheader'] .= " $(\"#results\").flexigrid({
				url: '".$url."',
				dataType: 'json',
				colModel : [
				{display: 'ID', name : 'stock_number', width : 80, sortable : true, align: 'center'},
				{display: 'Website Price', name : 'price_website', width : 85, sortable : true, align: 'center'},
				{display: 'Amazon Price', name : 'price_amazon', width : 85, sortable : true, align: 'center'},
				{display: 'eBay Price', name : 'price_ebay', width : 85, sortable : true, align: 'center'},
				{display: 'title', name : 'item_title', width : 120, sortable : true, align: 'center'},
				{display: 'Item Sku', name : 'item_sku', width : 100, sortable : true, align: 'center'},
				{display: 'Vendor Name', name : 'vendor_name', width : 80, sortable : true, align: 'center'},
				{display: 'vendor SKU', name : 'vendor_sku', width : 60, sortable : true, align: 'center'},
				{display: 'Gender', name : 'gender', width : 60, sortable : true, align: 'center'},
				{display: 'Category', name : ' 	category', width : 90, sortable : true, align: 'center'},
				{display: 'Sub Category', name : 'subcategory', width : 90, sortable : true, align: 'center'}],
				buttons : [{name: 'Add', bclass: 'add', onpress : test},
				{name: 'Delete', bclass: 'delete', onpress : test},
				{separator: true}
				],
				searchitems : [
				{display: 'Lot #', name : 'stock_number', isdefault: true},
				{display: 'Item SKU', name : 'item_sku', isdefault: true},
				{display: 'Vendor Name', name : 'vendor_name', isdefault: true}
				],
				sortname: \"stock_number\",
				sortorder: \"desc\",
				usepager: true,
				title: '<h1 class=\"pageheader\">Manage Jewelries</h1><div id=\"return_mesage\"></div>',
				useRp: true,
				rp: 100,
				showTableToggleBtn: false,
				width:1190,
				height: 800
				}
				);

				function test(com,grid){
					if (com=='Delete'){
						if($('.trSelected').length>0){
							if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
								var items = $('.trSelected');
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+\",\";
								}
								$.ajax({
									type: \"POST\",
									dataType: \"json\",
									url: \"".config_item('base_url')."admin/jewelries_manager/delete\",
									data: \"items=\"+itemlist,
									success: function(data){
										alert('Total Deleted rows: '+data.total);
										$(\"#results\").flexReload();
									}
								});
							}
						} else{
							alert('You have to select a row.');
						}
					}else if (com=='Add'){
						window.location = '".config_item('base_url')."admin/jewelries_manager/add';
					}
				}";

				$data['extraheader'] .= '<script src="'.SITE_URL.'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="'.SITE_URL.'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '<script src="'.SITE_URL.'js/swfobject.js" type="text/javascript"></script>';
				$data['extraheader'] .= '<script src="'.SITE_URL.'js/t.js" type="text/javascript"></script>';
				$data['onloadextraheader'] .= "var so;";
				$data['usetips'] = true;
				$output = $this->load->view('admin/jewelries_management' , $data , true);
				$this->output($output , $data);
			}
		}else {
			$output =$this->load->view('admin/login', $data , true);$this->output($output , $data);
		}
        $this->load->database('default'); // Connect to malak database
    }

	/* Email management section */
	function inbox() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$emailsList = $this->Adminmodel->getEmailsReceivedList();		
		$viewEmails = '';

		if( $emailsList['count'] > 0 ) {
			foreach($emailsList['results'] as $results) {
				$emailDesc = substr($results['em_message'], 0, 50);
				$emailDate = date('F, j', strtotime($results['em_date']));
				$viewEmails .= '<tr class="unread">
				<td><div class="ckbox ckbox-primary">
					<input type="checkbox" id="checkbox1">
					<label for="checkbox1"></label>
				  </div></td>
				<td><a class="star" href=""><i class="glyphicon glyphicon-star"></i></a></td>
				<td><div class="media">
					<div class="media-body"> <span class="media-meta pull-right">'.$emailDate.'</span>
					  <h4 class="text-primary"><b><a href="'.SITE_URL.'admin/readmail/'.$results['id'].'">'.$results['em_subject'].'</a></b></h4>
					  <small class="text-muted"></small>
					  <p class="email-summary"></p>
					</div>
				  </div></td>
			  </tr>';
			}
		} else {
			$viewEmails .= 'No Emails Received';	
		}
		$data['viewEmails']  = $viewEmails;
		$data['extraheader']  = '';
		$data['collections'] ='';
		$data['typeoptions'] = '';
		$data['totalEmails'] = $this->totalEmails;

		if($this->isadminlogin()){
			$output = $this->load->view('admin/inbox_view' , $data , true);
			$this->output($output , $data);
		} else { 
			$output =$this->load->view('admin/login', $data , true);
			$this->output($output , $data);
		}
	}

	/* Compose email */
	function compose($id='', $msg='') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader']  = '<link href="'.ADMIN_LIB.'plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />';
		$data['collections'] ='';
		$data['typeoptions'] = '';
		$data['totalEmails'] = $this->totalEmails;
		$data['email_msg'] = '';
		if($this->isadminlogin()){
			if( !empty($id) && $id != 0 ){
				$rowresult = $this->getEmailDetailinfo($id);		
				$data['fullName']  = $rowresult['full_name'];
				$data['fromEmail'] = $rowresult['from_email'];
				$data['email_id']  = $rowresult['row']->id;
				$data['email_subject'] = 'RE: '.$rowresult['row']->em_subject;
				$data['email_mesage']  = $rowresult['row']->em_message;
				$data['email_type']  = 'reply';
			} else {
				$data['fullName']  = '';
				$data['fromEmail'] = '';
				$data['email_subject'] = '';
				$data['email_mesage']  = '';
				$data['email_type']  = 'compose';
				if($msg != '') {
					$saveIntoDb = $this->Adminmodel->composeSentEmail();
					$data['email_msg'] = '<div class="alert alert-success">Email has sent successfully</div><br>';
				}
			}
			$data['email_link']  = htmlspecialchars(SITE_URL.'admin/compose/0/sent');
			$output = $this->load->view('admin/compose_view' , $data , true);
			$this->output($output , $data);
		} else { 
			$output =$this->load->view('admin/login', $data , true);
			$this->output($output , $data);
		}
	}

	/* Read email */
	function readmail($id) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$rowresult = $this->getEmailDetailinfo($id);
		$data['fullName']  = $rowresult['full_name'];
		$data['fromEmail'] = $rowresult['from_email'];			
		$data['rowem'] = $rowresult['row'];
		$data['reply_link'] = SITE_URL.'admin/compose/'.$id;
		$data['delete_email'] = SITE_URL.'admin/deleteEmail/'.$id;
		$data['totalEmails'] = $this->totalEmails;
		$data['extraheader'] = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if($this->isadminlogin()){
			$output = $this->load->view('admin/reademail_view' , $data , true);
			$this->output($output , $data);
		} else { 
			$output =$this->load->view('admin/login', $data , true);
			$this->output($output , $data);
		}
	}

	/* Get email detail info */
	function getEmailDetailinfo($id='') {
		$rowem = $this->Adminmodel->getReceivedEmailDetail($id);
		$return = array();
		if( $rowem->email_type == 'subscriber' ) {
			$rowsubs = $this->Adminmodel->getSubscriberByID( $rowem->user_id );
			$return['full_name']  = $rowsubs['first_name'].' '.$rowsubs['last_name'];
			$return['from_email'] = $rowsubs['email_adres'];
		} else {
			$rowcust = $this->Adminmodel->getCustomerRowView( $rowem->user_id );
			$return['full_name']  = $rowcust['fname'].' '.$rowcust['lname'];
			$return['from_email'] = $rowcust['email'];
		}
		$return['row'] = $rowem;

		return $return;
	}

	/* Delete message */
	function deleteEmail($id='') {
		$this->Adminmodel->getReceivedEmailDetail( 'delete', $id );

		header('Location:'.SITE_URL.'admin/inbox');
	}

	/* Setting management */
	function settings_mgmt() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$emailsList = $this->Adminmodel->getEmailsReceivedList();

		$data['extraheader']  = '';
		$data['collections'] ='';
		$data['typeoptions'] = '';
		$data['totalEmails'] = $this->totalEmails;
		if($this->isadminlogin()){
			$output = $this->load->view('admin/settingmgmt_view' , $data , true);
			$this->output($output , $data);
		} else { 
			$output =$this->load->view('admin/login', $data , true);
			$this->output($output , $data);
		}
	}

	/* Profile management */
	function video_certifications() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['rowresults'] = $this->Adminmodel->mangerUserSettings();
		$data['action_link'] = htmlspecialchars(SITE_URL.'admin/updateAdminProfile');
		$data['msg_notify'] = 0;
		$data['msg'] 		= '';
		if( isset($_GET['delete_video_action']) ){
		    if($_GET['delete_video_code'] == '1915'){
    		    $delete_video_id 			= $_GET['delete_video_id'];
    			$this->catemodel->delete_any_table('video_certifications', 'vc_id', $delete_video_id);
    			$data['msg'] 				= 'Successfully deleted one item from video list.';
    			$data['msg_notify'] 		= 1;
		    }else{
		        $data['msg'] = '<b>Sorry!</b>, you have inserted wrong code, Please try again.';
                $data['msg_notify'] = 2;
		    }	
    	}

    	if( isset($_POST['edit_video_action']) ){
    	    $updateData = array(	
				'category' => $_GET['category'],
				'video_url' => $this->input->post('video_url'),
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'video_code' => $this->input->post('video_code'),
				'entry_date' => date('Y-m-d')
			);
			if($this->input->post('video_code') == '1915'){
                $vc_id = $this->catemodel->update_any_table($updateData, 'video_certifications', 'vc_id', $_GET['edit_video_id']);
    			if($vc_id){
                    $data['msg'] = 'Successfully Updated the Video "<b>'.$this->input->post('title').'</b>" <a href="'.BASE_URL().'admin/video_certifications?category='.$_GET['category'].'">Add New Video</a> ';
                    $data['msg_notify'] = 1;
                }else{
                    $data['msg'] = '<b>Sorry!</b>, There is something wrong here, Please try again.';
                    $data['msg_notify'] = 2;
                }
            }else{
                $data['msg'] = '<b>Sorry!</b>, you have inserted wrong code, Please try again.';
                $data['msg_notify'] = 2;
            }
    	}

    	$data['edit_option'] = 0;
    	if( isset($_GET['edit_video_id']) ){
		    $where_vc_id				    =  array('vc_id' => $_GET['edit_video_id']);
		    $data['get_edit_video_info'] 	=  $this->catemodel->getdata_any_table_where($where_vc_id, 'video_certifications');
		    $data['edit_option'] 	        = 1;
    	}

    	if( isset($_POST['add_video_action']) ){
    	    $insertData = array(	
				'category' => $_GET['category'],
				'video_url' => $this->input->post('video_url'),
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'video_code' => $this->input->post('video_code'),
				'entry_date' => date('Y-m-d')
			);

			if($this->input->post('video_code') == '1915'){
				$vc_id = $this->catemodel->insert_into_any_table($insertData, 'video_certifications');
    			if($vc_id){
                    $data['msg'] = 'Successfully Add one Video '.$this->input->post('title').'</b>';
                    $data['msg_notify'] = 1;
                }else{
                    $data['msg'] = '<b>Sorry!</b>, There is something wrong here, Please try again.';
                    $data['msg_notify'] = 2;
                }
            }else{
                $data['msg'] = '<b>Sorry!</b>, you have inserted wrong code, Please try again.';
                $data['msg_notify'] = 2;
            }
    	}

    	if( isset($_GET['category']) ){
    	    $where_cat_id				=  array('category' => $_GET['category']);
		    $data['get_video_list'] 	=  $this->catemodel->getdata_any_table_where_asc($where_cat_id, 'video_certifications');
    	}else{
    	    
    	}

		if($this->isadminlogin()){
			$output = $this->load->view('admin/video-certifications' , $data , true);
			$this->output($output , $data);
		} else { 
			$output =$this->load->view('admin/login', $data , true);
			$this->output($output , $data);
		}
	}

	/* Profile management */
	function single_video() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['rowresults'] = $this->Adminmodel->mangerUserSettings();
		$data['action_link'] = htmlspecialchars(SITE_URL.'admin/updateAdminProfile');
		$data['msg_notify'] = 0;
		$data['msg'] 		= '';
		if( isset($_GET['delete_video_action']) ){
		    if($_GET['delete_video_code'] == '1915'){
    		    $delete_video_id 			= $_GET['delete_video_id'];
    			$this->catemodel->delete_any_table('video_certifications', 'vc_id', $delete_video_id);
    			$data['msg'] 				= 'Successfully deleted one item from video list.';
    			$data['msg_notify'] 		= 1;
		    }else{
		        $data['msg'] = '<b>Sorry!</b>, you have inserted wrong code, Please try again.';
                $data['msg_notify'] = 2;
		    }	
    	}

    	if( isset($_POST['edit_video_action']) ){
    	    $updateData = array(	
				'category' => $_GET['category'],
				'video_url' => $this->input->post('video_url'),
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'video_code' => $this->input->post('video_code'),
				'entry_date' => date('Y-m-d')
			);

			if($this->input->post('video_code') == '1915'){
                $vc_id = $this->catemodel->update_any_table($updateData, 'video_certifications', 'vc_id', $_GET['edit_video_id']);
    			if($vc_id){
                    $data['msg'] = 'Successfully Updated the Video "<b>'.$this->input->post('title').'</b>" <a href="'.BASE_URL().'admin/video_certifications?category='.$_GET['category'].'">Add New Video</a> ';
                    $data['msg_notify'] = 1;
                }else{
                    $data['msg'] = '<b>Sorry!</b>, There is something wrong here, Please try again.';
                    $data['msg_notify'] = 2;
                }
            }else{
                $data['msg'] = '<b>Sorry!</b>, you have inserted wrong code, Please try again.';
                $data['msg_notify'] = 2;
            }
    	}

    	$data['edit_option'] 	        = 0;
    	if( isset($_GET['edit_video_id']) ){
		    $where_vc_id				    =  array('vc_id' => $_GET['edit_video_id']);
		    $data['get_edit_video_info'] 	=  $this->catemodel->getdata_any_table_where($where_vc_id, 'video_certifications');
		    $data['edit_option'] 	        = 1;
    	}

    	if( isset($_POST['add_video_action']) ){
    	    $insertData = array(	
				'category' => $_GET['category'],
				'video_url' => $this->input->post('video_url'),
				'title' => $this->input->post('title'),
				'details' => $this->input->post('details'),
				'video_code' => $this->input->post('video_code'),
				'entry_date' => date('Y-m-d')
			);

			if($this->input->post('video_code') == '1915'){
                $vc_id = $this->catemodel->insert_into_any_table($insertData, 'video_certifications');
    			if($vc_id){
                    $data['msg'] = 'Successfully Add one Video '.$this->input->post('title').'</b>';
                    $data['msg_notify'] = 1;
                }else{
                    $data['msg'] = '<b>Sorry!</b>, There is something wrong here, Please try again.';
                    $data['msg_notify'] = 2;
                }
            }else{
                $data['msg'] = '<b>Sorry!</b>, you have inserted wrong code, Please try again.';
                $data['msg_notify'] = 2;
            }
    	}

    	if( isset($_GET['category']) ){
    	    $where_cat_id				=  array('category' => $_GET['category']);
		    $data['get_video_list'] 	=  $this->catemodel->getdata_any_table_where($where_cat_id, 'video_certifications');
    	}else{
    	    
    	}

		if($this->isadminlogin()){
			$output = $this->load->view('admin/single_video' , $data , true);
			$this->output($output , $data);
		} else { 
			$output =$this->load->view('admin/login', $data , true);
			$this->output($output , $data);
		}
	}

	/* Profile management */
	function profile_mgmt() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['rowresults'] = $this->Adminmodel->mangerUserSettings();
		$data['action_link'] = htmlspecialchars(SITE_URL.'admin/updateAdminProfile');
		if($this->isadminlogin()){
			$output = $this->load->view('admin/profilemgmt_view' , $data , true);
			$this->output($output , $data);
		} else { 
			$output =$this->load->view('admin/login', $data , true);
			$this->output($output , $data);
		}
	}

	/* Profile management */
	function websites_theme() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['rowresults'] = $this->Adminmodel->mangerUserSettings();
		$data['action_link'] = htmlspecialchars(SITE_URL.'admin/updateAdminProfile');
		$data['extraheader']  = '';
        if($this->isadminlogin()){
			$output = $this->load->view('admin/website_themeview' , $data , true);
			$this->output($output , $data);
		}else{
			$output =$this->load->view('admin/login', $data , true);
			$this->output($output , $data);
		}
	}

	/* Update admin profile */
    function updateAdminProfile() {
		$this->Adminmodel->mangerUserSettings();

		redirect('admin/profile_mgmt');
    }

	/* download excel file page */
	function downlaodExcelFile() {
		$data = $this->getCommonData();
		$data['title'] = 'Download excel with gemstone';
		$category_id = $this->session->userdata('category_id');
		$gender_id   = $this->session->userdata('gender_id');
		$sub_cate_id = $this->session->userdata('sub_cate_id');
		$download_link = SITE_URL . 'admin/jcart_download_excel/';

		if( !empty($category_id) ) {
			$data['excel_file_link'] = $download_link . $category_id . '/' . $gender_id . '/' . $sub_cate_id;
		} else {
			$data['excel_file_link'] = $download_link;
		}
		$this->load->view('admin/download_excel_with_gemstone', $data);
    }

    function jcart_download_excel($cateID, $gender_id, $subCateID) {
        $time_string = time();
        $downloadFileName = $time_string.'_spreadsheet.xls';
        $last_digits = substr($time_string, -4);
        $genderID = ( $gender_id == 'F' ? 'W' : $gender_id );
        $genderValue = getGenderValue( $genderID );
        $jwsub_cate = $this->session->userdata('jwsub_cate');
        $results = $this->Adminjewelrymodel->getAttributeList( $jwsub_cate );

        header( "Content-Type: application/vnd.ms-excel" );
        header( "Content-disposition: attachment; filename=$downloadFileName" );     

        $item_sku     = $this->session->userdata('item_sku');
        $vendors_name = 'hearts and diamond'; //$this->session->userdata('vendors_name');
        $veondors_sku = $this->session->userdata('veondors_sku');
        $item_title   = $this->session->userdata('item_title');
        $metal_purity = $this->session->userdata('metal_purity');
        $metal_color  = $this->session->userdata('metal_color');
        $jwsub_cate   = $this->session->userdata('jwsub_cate');

        $sub_category_id = ( !empty($jwsub_cate) ? $jwsub_cate : $subCateID );
        $parent_cate_name = $this->getJewelrycategoryName($cateID);
        $subcate_name = $this->getJewelrycategoryName($sub_category_id);
        $parent_first_str = substr( $parent_cate_name, 0, 1 );

        $subcateg_name = str_replace(array("â€™", "’", "'s"), ' ', $subcate_name);
        $subcategory_name = str_replace('Women s', 'Women\'s ', $subcateg_name);

		/* set vendor sku column value */
        $vendorsku = strtoupper( $genderID.'.'.$parent_first_str. '.'.firstCharOfWords( $subcategory_name ) . '.' . $last_digits );
        $stones_count = $this->input->post('stone', TRUE);

		/* excel columns name */
        $exfile_columns = 'Item Sku' . TB .
        'Vendor Name'. TB .
        'Vendor Sku'. TB .
        'Title'. TB .
        'Ebay'. TB .
        'Cost'. TB .
        'Amazon'. TB .
        'Price Amazon'. TB .
        'MRSP Price'. TB .
        'Price eBay'. TB .
        'Website Price'. TB .
        'Quantity'. TB .
        'Gender'. TB .
        'Parent Category'. TB .
        'Sub Category'. TB .
        'Sub Category Name'. TB .
        $this->get_additional_columns($cateID). TB .
        $this->getMetalPurityList().
        $this->getMetalColorList().
        'Finish'. TB .
        'Semi-Moun'. TB .
        'Description'. TB;

        if( !empty($stones_count) ) {
            $exfile_columns .= 'Gemstone'. TB .
			'Class'. TB .
			'Color'. TB .
			'Birthstone Month'. TB .
			'Shape'. TB .
			'Stone Size'. TB .
			'# of Gemstone'. TB .
			'Total weight(approx.)'. TB .
			'Setting'. TB;
        }

        if( count($results) > 0 ) {
            foreach( $results as $rows ) {
                $exfile_columns .= $rows['attribute_label']. TB;
            }
        }

        $exfile_columns .= 'Ring Image1'. TB .
            'Ring image2'. TB .
            'Ring image3'. TB .
            'Ring image4'. TB .
            'Ring image5'. TB .
            'Ring image6'. TB;
        $exfile_columns .= NL;
        $exfile_rows = '';
		/* excel file rows */
        $r = 0;
        for($i=1; $i <= 50; $i++) {
			$item_sku = 'dstern'.getRandowNumber(4);
			$exfile_rows .= $item_sku . TB .
			$vendors_name. TB .
			$vendorsku. TB .
			$item_title. TB .
			'$'. TB .
			'$'. TB .
			'$'. TB .
			'$'. TB .
			'$'. TB .
			'$'. TB .
			'$'. TB .
			'1'. TB .
			$genderValue. TB .
			$cateID. TB .
			$sub_category_id. TB .
			$subcategory_name. TB;
			$exfile_rows .=''. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			'0'. TB .
			''. TB;

			if( !empty($stones_count) ) {
				$exfile_rows .= check_post_field('gemstone' . $r, 0) . TB;
				$exfile_rows .= check_post_field('gemstoneClass' . $r, 0) . TB;
				$exfile_rows .= check_post_field('gemstoneColor' . $r, 0) . TB;
				$exfile_rows .= get_month_name( check_post_field('birthstone' . $r, 0) ) . TB;
				$exfile_rows .= check_post_field('gemstoneShape' . $r, 0) . TB;
				$exfile_rows .= check_post_field('stoneSize' . $r, 0) . TB;
				$exfile_rows .= check_post_field('stone_count' . $r, 0) . TB;
				$exfile_rows .= check_post_field('stone_weight' . $r, 0) . TB;
				$exfile_rows .= check_post_field('setting' . $r, 0) . TB;
			}
			if( count($results) > 0 ) {
				foreach( $results as $rows ) {
					$exfile_rows .= '0' . TB;
				}
			}

			$exfile_rows .= ''. TB .
			''. TB .
			''. TB .
			''. TB .
			''. NL;
			$r++;
        }
        $create_excelfile = $exfile_columns.$exfile_rows;
        echo $create_excelfile;
	}

	function check_post_field($field='', $value=0) {
		return check_empty( $this->input->post($field, TRUE), $value);
	}

	/* Get category name */
	function getJewelrycategoryName($id=0) {
		$subcate_name = $this->Commonmodel->get_table_column_val($id, 'category_name', 'dev_ebaycategories', 'category_id');
		return $subcate_name;
    }

	/* Metal purity list */
    function getMetalPurityList() {
		$metalPurity = array(
			'10k white gold',
			'10 yellow gold',
			'14k white gold',
			'14k yellow gold',
			'18k white gold',
			'18k yellow gold',
			'10k two-tone',
			'14k two-tone',
			'18k two-tone',
			'22k two-tone',
			'24k two-tone',
			'platinum',
			'silver',
			'stainless steel',
			'tungsten'
		);
        $metal_cols = '';
        foreach( $metalPurity as $metals ) {
            $metal_cols .= $metals . TB;
        }
        return $metal_cols;
    }

	/* Metal Color List */
    function getMetalColorList() {
        $metalColor = array(
            'white',
            'two-tone',
            'tro-color',
            'rose'
        );
        $metal_colrs = '';
        foreach( $metalColor as $colors ) {
            $metal_colrs .= $colors . TB;
        }

        return $metal_colrs;
    }

	/* Get additional columns */
	function get_additional_columns($cid) {
		$ring_array = array('Ring Style', 'Measurements', 'Ring Weight');
		$earing_array = array('Earring Style', 'Earring Back Type', 'Earring Width', 'Hoop Diameter', 'Earring Weight');
		$pendants_array = array('Pendant Style', 'Pendant Weight', 'Pendant Length', 'Pendant Width', 'Chain Included', 'Pendant Width', 'Chain Style', 'Chain length', 'Chain Purity', 'Clasp', 'Chain Weight');
		$bracelet_array  = array('Bracelet Style','Bracelet Claps Type','Bracelet Length','Bracelet Width');
		$chains_array    = array('Chain Style', 'Chain type', 'Chain Length', 'Chain Width', 'Claps Type', 'Chain Weight');

		$ringsID = array('3291875018','3292598018','3291859024','3291859042','3291859074');
		$chainID = array('3291962018','3291859025','3291859043');
		$pendantID = array('3292498018','3292603018','3291859026','3291859044');
		$earingID = array('3292577018','3292601018','3291859028','3291859046');
		$bracletID = array('3292560018','3292607018','3291859027','3291859045','3291859075');

		$addit_columns = array();
		$column_name   = '';
		if(in_array($cid, $ringsID)) {
			$addit_columns = $ring_array;
			$column_name   = 'rings';
		}
		if(in_array($cid, $chainID)) {
			$addit_columns = $chains_array;
			$column_name   = 'chain';
		}
		if(in_array($cid, $pendantID)) {
			$addit_columns = $pendants_array;
			$column_name   = 'pendant';
		}
		if(in_array($cid, $earingID)) {
			$addit_columns = $earing_array;
			$column_name   = 'earing';
		}
		if(in_array($cid, $bracletID)) {
			$addit_columns = $bracelet_array;
			$column_name   = 'braclet';
		}

		$return_additcolumn = '';
		$this->count_cols = count($addit_columns);
		$this->colname    = $column_name;
		if(count($addit_columns) > 0) {
			$return_additcolumn = implode("\t", $addit_columns);
		}
		return $return_additcolumn;
	}

	/* Check gender category label */
	function get_gender_catelabel($cid) {
		$ringsID = array('3291875018','3292598018','3291859024','3291859042','3291859074');
		$chainID = array('3291962018','3291859025','3291859043');
		$pendantID = array('3292498018','3292603018','3291859026','3291859044');
		$earingID = array('3292577018','3292601018','3291859028','3291859046');
		$bracletID = array('3292560018','3292607018','3291859027','3291859045','3291859075');

		$column_name   = '';
		if(!empty($cid)) {
			if(in_array($cid, $ringsID)) {
				$column_name   = 'rings';
			}
			if(in_array($cid, $chainID)) {
				$column_name   = 'chain';
			}
			if(in_array($cid, $pendantID)) {
				$column_name   = 'pendant';
			}
			if(in_array($cid, $earingID)) {
				$column_name   = 'earing';
			}
			if(in_array($cid, $bracletID)) {
				$column_name   = 'braclet';
			}
		}
		return $column_name;
	}

    function update_jewelry_cols($jewelry_id=0, $item_sku='', $imageLink='') {
        $image_link = $this->input->get('image_link');
        $allowed_ext = array('.jpg', '.jpeg', 'gif', 'png');

        if( !in_array(strtolower(strrchr($image_link, '.')), $allowed_ext) ) {
            echo 'Plz enter the correct image name of Jewelry Stock Number is : ' . $jewelry_id;
        } else {
            $this->Malak_adminmodel->update_jew_collection($jewelry_id, $item_sku, $image_link);
            echo '<div class="success_mesage">Item Sku and Image URL is updated Successfully! of Stock Number: ' . $jewelry_id . '</div>';
        }
    }

	function getjewelries_manager($addoption = '') {
		$page 		= isset($_POST['page']) ? $_POST['page'] : 1;
		$rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'stock_number';
		$sortorder 	= isset($_POST['sortorder'])? $_POST['sortorder'] : 'desc';
		$query 		= isset($_POST['query']) ? $_POST['query'] : '';
		$qtype 		    = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$vendor_name    = 'Demo';
		$results = $this->Malak_adminmodel->getjewelries($page, $rp, $sortname ,$sortorder  ,$query  , $qtype, $oid = '', $vendor_name);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
		header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
		header("Cache-Control: no-cache, must-revalidate" );
		header("Pragma: no-cache" );
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: ".$results['count'].",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc) $json .= ",";
			$json .= "\n {";
			$json .= "id:'".$row['stock_number']."',";
			$json .= "cell:['Lot #: ".$row['stock_number']."<br /><a href=\'".SITE_URL."admin/jewelries_manager/edit/".($row['stock_number'])."\'  class=\"edit\">View Details</a>'";
                    if( !empty($row['jew_image_url']) ) {
                        $jewelry_img = addslashes($row['jew_image_url']);
                        $image_file_name = $row['jew_image_url'];
                    } else {
                        if( $row['image1'] != '' ) {
                            $jewelry_img = SITE_URL . 'images/' . addslashes($row['image1']);
                            $image_file_name = $row['image1'];
                        } else {
                            if( file_exists('images/uploads/'.$row['item_sku'].'.jpg') ) {
                                $jewelry_img = SITE_URL.'images/uploads/'.addslashes($row['item_sku'].'.jpg');
                                $image_file_name = $row['item_sku'].'.jpg';
                            } else {
                                $jewelry_img = SITE_URL.'images/noimage_found_2.jpg';
                                $image_file_name = '';
                            }
                        }
                    }
                        $json .= ",'<img src=\'".$jewelry_img."\' width=\'80\'><br />$ ".addslashes($row['price_website'])."'";
                        
			$json .= ",'".addslashes($row['price_amazon'])."'";
			$json .= ",'".addslashes($row['price_ebay'])."'";
			$json .= ",'".addslashes($row['item_title'])."'";

			$json .= ",'<input type=\"text\" size=\"10\" name=\"item_sku\" onkeydown=\"update_jewelry_cols(\'".addslashes($row['stock_number'])."\')\" onkeyup=\"update_jewelry_cols(\'".addslashes($row['stock_number'])."\')\" onblur=\"update_jewelry_cols(\'".addslashes($row['stock_number'])."\')\" id=\"item_sku_".addslashes($row['stock_number'])."\" onfocus=\"update_jewelry_cols(\'".addslashes($row['stock_number'])."\')\" id=\"item_sku_".addslashes($row['stock_number'])."\" value=\"".addslashes($row['item_sku'])."\">'";

			$json .= ",'".addslashes($row['vendor_name'])."'";
			$json .= ",'".addslashes($row['vendor_sku'])."'";
			if($row['gender']=="M"){$gend = 'Mens';}
			elseif($row['gender']=="F"){$gend = 'Womens';}
			elseif($row['gender']=="U"){$gend = 'Unisex';}
			elseif($row['gender']=="C"){$gend = 'Children';}
			elseif($row['gender']=="E"){$gend = 'Estate';}
			elseif($row['gender']=="D"){$gend = 'Designers';}
			elseif($row['gender']=="R"){$gend = 'Religious';}
			elseif($row['gender']=="CH"){$gend = 'Charms';}
			elseif($row['gender']=="CL"){$gend = 'Clearance';}
			elseif($row['gender']=="S"){$gend = 'Services';}
			elseif($row['gender']=="CG"){$gend = 'Colored Gemstones';}
			$json .= ",'".addslashes($gend)."'";
			$catval = $this->Malak_adminmodel->getCategoryNameByID($row['category']);foreach ($catval as $row_cat) {$newval=$row_cat['category_name'];}
			$json .= ",'".addslashes($newval)."'";
			$subcatval = $this->Malak_adminmodel->getCategoryNameByID($row['subcategory']);foreach ($subcatval as $row_subcat){$newval1=$row_subcat['category_name'];}
			$json .= ",'".addslashes($newval1)."'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function jewelries($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader']  = '';
		$data['collections'] ='';
		$data['typeoptions'] = '';
		if($this->isadminlogin()){
			if($action == 'delete'){
				$ret = $this->Adminmodel->jewelries($_POST , $action , $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
				header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
				header("Cache-Control: no-cache, must-revalidate" );
				header("Pragma: no-cache" );
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: ".$ret['total'].",\n";
				$json .= "}\n";
				echo $json;
			}else{
				if($action == 'add' || $action == 'edit'){
					$this->load->library('form_validation');
					$this->form_validation->set_rules('vendor_name', 'vendor_name', 'trim|required');
					$this->form_validation->set_rules('vendor_sku', 'vendor_sku', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if(isset($_POST[$action.'btn'])){
						if ($this->form_validation->run() == FALSE){
							$data['error'] = 'ERROR ! Please check the error fields';
							if($action != 'edit')$data['details'] = $_POST;
						}else {
							$ret = $this->Adminmodel->jewelries($_POST , $action , $id);
							if($ret['error'] == '')$data['success'] = $ret['success'];
							else{
								$data['error'] = $ret['error'];
								if($action != 'edit')$data['details']  = $_POST;
							}
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple' );
					$data['gemstones'] = $this->Adminmodel->getGemstonesByStockId($id);
					if($action == 'edit') {
						$data['details'] = $this->Jewelrymodel->getAllByStock($id);
						$details = $data['details'];
						switch ($details['section']){
							case 'Earrings':
								$collections = '<option value="DiamondStud">Diamond Stud Earrings</option><option value="BuildEarring">Build Your Own Earrings</option>';
								break;
							case 'EngagementRings':
								$collections = '<option value="International Collection">International Collection</option>';
								break;
							case 'Jewelry':
								$collections = '<option value="MensWeddingRing">Men\'s Wedding Rings</option>  <option value="WomensWeddingRing">Women\'s Wedding Rings</option>  <option value="WomensAnniversaryRing">Women\'s Anniversary Rings</option> ';
								break;
							case 'Pendants':
								$collections = '<option value="BuildPendant">Build your own Pendants</option>';
								break;
							default:
								break;
						}
						$data['collections'] =$collections;
						$data['animations'] = $this->Adminmodel->getFlashByStockId($id);
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
					$(this).css({backgroundImage:"url('.config_item('base_url').'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
					$(this).siblings().css({backgroundImage:"url('.config_item('base_url').'images/plus.jpg)"});
				});
				$("#jewelrymanage").click();';
				$data['leftmenus']	=	$this->Adminmodel->adminmenuhtml('jewelries');
				$url = config_item('base_url').'admin/getjewelries';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "$(\"#results\").flexigrid({   	 							
					url: '".$url."',
					dataType: 'json',
					colModel : [
						{display: 'ID', name : 'stock_number', width : 80, sortable : true, align: 'center'},
						{display: 'Image', name : 'price_amazon', width : 85, sortable : true, align: 'center'},
						{display: 'title', name : 'item_title', width : 120, sortable : true, align: 'center'},
						{display: 'White gold price', name : 'item_sku', width : 50, sortable : true, align: 'center'},
						{display: 'Yellow gold price', name : 'vendor_name', width : 80, sortable : true, align: 'center'},
						{display: 'Platinum price', name : 'vendor_sku', width : 60, sortable : true, align: 'center'}
					],
					buttons : [
						{name: 'Add', bclass: 'add', onpress : test},
						{name: 'Delete', bclass: 'delete', onpress : test},
						{separator: true}
					],
					searchitems : [
						{display: 'Lot #', name : 'stock_number', isdefault: true},
						{display: 'Vendor Name', name : 'vendor_name', isdefault: true},
						{display: 'Vendor Sku', name : 'style', isdefault: false}
					], 		
					sortname: \"stock_number\",
					sortorder: \"desc\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Manage Jewelries</h1>',
					useRp: true,
					rp: 100,
					showTableToggleBtn: false,
					width:1025,
					height: 800
				});

				function test(com,grid){
					if (com=='Delete'){ 
						if($('.trSelected').length>0){
							if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
								var items = $('.trSelected');
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+\",\";
								}

								$.ajax({
									type: \"POST\",
									dataType: \"json\",
									url: \"".config_item('base_url')."admin/jewelries/delete\",
									data: \"items=\"+itemlist,
									success: function(data){
										alert('Total Deleted rows: '+data.total);
										$(\"#results\").flexReload();
									}
								});
							}
						} else{
							alert('You have to select a row.');
						}
					}else if (com=='Add'){
						window.location = '".config_item('base_url')."admin/jewelries/add';
					}			
				}";
				$data['extraheader'] .= '<script src="'.config_item('base_url').'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="'.config_item('base_url').'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '<script src="'.config_item('base_url').'js/swfobject.js" type="text/javascript"></script>';
				$data['extraheader'] .= '<script src="'.config_item('base_url').'js/t.js" type="text/javascript"></script>';
				$data['onloadextraheader'] .= "var so;";
				$data['usetips'] = true;
				$output = $this->load->view('admin/jewelries' , $data , true);
				$this->output($output , $data);
			}
		}else {
			$output =$this->load->view('admin/login', $data , true);$this->output($output , $data);
		}
	}

	function getjewelries($addoption = '') {
		$page 		= isset($_POST['page']) 	? $_POST['page'] : 1;
		$rp 		= isset($_POST['rp']) 		? $_POST['rp'] : 10;
		$sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'price';
		$sortorder 	= isset($_POST['sortorder'])? $_POST['sortorder'] : 'desc';
		$query 		= isset($_POST['query']) 	? $_POST['query'] : '';
		$qtype 		= isset($_POST['qtype']) 	? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getjewelries($page, $rp, $sortname ,$sortorder  ,$query  , $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
		header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
		header("Cache-Control: no-cache, must-revalidate" );
		header("Pragma: no-cache" );
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: ".$results['count'].",\n";
		$json .= "rows: [";
		$rc = false;
		$pth = substr(FCPATH,0,-10);
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc) $json .= ",";
			$json .= "\n {";
			$json .= "id:'".$row['stock_number']."',";
			$json .= "cell:['Lot #: ".$row['stock_number']."<br /><a href=\'".config_item('base_url')."admin/jewelries/edit/".($row['stock_number'])."\'  class=\"edit\">View Details</a>'";
			$img = file_exists($pth.'/images/'.$row['small_image']) ? config_item('base_url').'images/'.$row['small_image'] : config_item('base_url').'images/'.$row['small_image'];
			$json .= ",'<img src=\'".$img."\' width=\'80\'>'";
			$json .= ",'".addslashes($row['style'])." Collection'";
			$json .= ",'".addslashes($row['white_gold_price'])."'";
			$json .= ",'".addslashes($row['yellow_gold_price'])."'";
			$json .= ",'".addslashes($row['platinum_price'])."'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function sitemap() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
				$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
				$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#sitemanage").click();';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('sitemap');
			$output = $this->load->view('admin/sitemap', $data, true);
		}else
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
	}

	/* manage taks */
	function manage_tasks($action='view', $id='') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$taskDetail = '';
		$rowtask = $this->Adminmodel->getTaskList($action, $id);
		$data['message'] = ( !empty($rowtask['message']) ? '<div class="alert alert-success">'.$rowtask['message'].'</div><br>' : '' );
		
		if($rowtask['count'] > 0) {
			foreach($rowtask['results'] as $rowtask) {
				$taskDate = date('F j, Y', strtotime($rowtask['task_date']));
				$taskDetail .= '<div class="col-md-6">
					<section class="panel default blue_border vertical_border h1">
						<div class="task-header blue_task">'.$rowtask['task_heading'].' <span><i class="fa fa-clock-o"></i>9 hours</span> </div>
						<div class="row task_inner inner_padding">
							<div class="col-sm-9">
								'.$rowtask['task_desc'].'
							</div>
							<div class="col-sm-3">
								<div class="pull-right"><span>'.$taskDate.'</span></div>
							</div>
						</div>
						<div class="task-footer">
							<label class="pull-left">
								<div class="progress">
									<div style="width:90%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-info"> <span class="sr-only">60% Complete</span> </div>
								</div>
							</label>
							<span class="label btn-primary">90%</span>
							<div class="pull-right">
								<ul class="footer-icons-group">
									<li><a href="#"><i class="fa fa-pencil"></i></a></li>
									<li><a href="'.SITE_URL.'admin/manage_tasks/delete/'.$rowtask['id'].'"><i class="fa fa-trash-o"></i></a></li>
									<li class="dropup"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-wrench"></i></a></li>
								</ul>
							</div>
						</div>
					</section>
				</div>';
			}
		}
		$data['taskDetail'] = $taskDetail;
		$output = $this->load->view('admin/tasks_view', $data, true);
		$this->output($output, $data);					
	}

	/* save taks data */
	function saveTaskDetail() {
		$rt = $this->Adminmodel->saveTaskData();

		echo 'New task has addedd successfully';				
	}

	/* save important taks data */
	function saveImpTaskDetail($id='') {
		$this->Adminmodel->saveTaskData('importantask');
		$viewTasks = $this->viewImportanTaskList();
		if( !empty($id) ) {
			$return = $this->Adminmodel->getTaskList('delete', $id);
		}
		echo $viewTasks;				
	}

	function deleteImpTaskDetail($taskId) {
		$return = $this->Adminmodel->getTaskList('delete', $taskId);
		$viewTasks = $this->viewImportanTaskList();

		echo $viewTasks;
	}

	/* view important task list */
	function viewImportanTaskList() {
		$rowtask = $this->Adminmodel->getTaskList('imptask', '');
		$viewTask = '';

		if( $rowtask['count'] > 0 ) {
			foreach($rowtask['results'] as $results) {
				$viewTask .= '<li class="list-group-item">
					<label class="label-checkbox inline">
						<input type="checkbox" class="task-finish">
						<span class="custom-checkbox"></span>
					</label>
					'.$results['task_heading'].' <span class="pull-right"> <a class="task-del" href="#javascript;" onclick="deleteImpTask(\''.$results['id'].'\')"><i class="fa fa-times"></i></a> </span>
				</li>';
			}
		} else {
			$viewTask .= '<li class="list-group-item green-light-bg-color">No Task List Found</li>';	
		}
		return $viewTask;	
	}

	function customers($action = 'view', $id = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['action'] = $action;
		$data['action_link'] = SITE_URL.'admin/customers/'.$action.'/'.$id;
		$data['rturn_msg'] = '';

		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->customers($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} elseif($action == 'add' || $action == 'edit'){
				$this->load->library('form_validation');

				$country_listar = array('USA','Canada','Australia','UK');
				$option_ctlist = '';
				$this->form_validation->set_rules('fname', 'First Name', 'required');		
				$this->form_validation->set_rules('lname', 'Last Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');		
				$this->form_validation->set_rules('phone', 'Phone number', 'required');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

				$row_cust = $this->User->manageCustomerInfo($id);

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
				$login_user	= $this->input->post('login_user');
				if( !empty($email) ) {
					$data['rturn_msg'] = '<div class="alert alert-success">Customer has '.$action.'ed successfully!</div>';
				}

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
				$data['login_user'] = check_empty($login_user, $row_cust->username);

				foreach($country_listar as $coun_name) {
					$option_ctlist .= '<option '.selectedOption($coun_name,$data['country']).'>'.$coun_name.'</option>';
				}
				$data['option_ctlist'] = $option_ctlist;
				$output = $this->load->view('admin/customers', $data, true);
				$this->output($output, $data);
			} else {
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
					$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
					$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
				});
				$("#ecommerce").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('Customers');
				$url = config_item('base_url') . 'admin/getcustomers/';
				$data['action'] = $action;
				$data['onloadextraheader'] .= " $(\"#pageresults\").flexigrid({
					url: '" . $url . "',
					dataType: 'json',
					colModel : [
						{display: 'ID', name : 'id', width : 50, sortable : true, align: 'center'},
						{display: 'Name', signup_name : 'id', width : 120, sortable : true, align: 'left'},
						{display: 'Full Name', name : 'fname', width : 120, sortable : true, align: 'left'},
						{display: 'E-mail', name : 'email', width : 200, sortable : true, align: 'left'},
						{display: 'Username', name : 'email', width : 100, sortable : true, align: 'left'},
						{display: 'Phone', name : 'phone', width : 100, sortable : true, align: 'left'},
						{display: 'Address', name : 'address', width : 200, sortable : true, align: 'left'},
						{display: 'Action', name : 'action', width : 100, sortable : true, align: 'center'}
					],
					buttons : [ 
						{name: 'Add', bclass: 'add', onpress : test},
						{name: 'Delete', bclass: 'delete', onpress : test},
						{separator: true}
					],
					searchitems : [
						{display: 'id', name : 'id', isdefault: true},
						{display: 'email', name : 'email', isdefault: true}
					],
					sortname: \"id\",
					sortorder: \"DESC\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Customers</h1>',
					useRp: true,
					rp: 20,
					showTableToggleBtn: false,
					width:1025,
					height: 800
				});

				function test(com,grid){
					if (com=='Delete'){ 
						if($('.trSelected').length>0){
							if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
								var items = $('.trSelected');
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+\",\";
								}

								$.ajax({
									type: \"POST\",
									dataType: \"json\",
									url: \"" . config_item('base_url') . "admin/customers/delete\",
									data: \"items=\"+itemlist,
									success: function(data){
										alert('Total Deleted rows: '+data.total);
										$(\"#pageresults\").flexReload();
									}
								});
							}
						} else{
							alert('You have to select a row.');
						}
					}else if (com=='Add'){
						window.location = '" . config_item('base_url') . "admin/affiliate_mgmt';
					}
				}";
				$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/customers', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function getcustomers() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getcustomers($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['<a href=\"#\">" . $row['id'] . "</a>'";
			$json .= ",'" . addslashes($row['name']) . " '";
			$json .= ",'" . addslashes(ucfirst($row['fname'])) . " " . addslashes($row['lname']) . "'";
			$json .= ",'" . addslashes($row['email']) . " '";
			$json .= ",'" . addslashes($row['username']) . " '";
			$json .= ",'" . addslashes($row['phone']) . " '";
			$json .= ",'" . str_replace("\r", '<br />', str_replace("\n", '<br />', addslashes($row['address']))) . "'";
			$json .= ",'<a href=\"".SITE_URL."admin/customers/edit/".$row['id']."\">Edit</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	/* manage affiliation page */
	function affiliate_mgmt($page_action='add', $id='') {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$data = $this->getCommonData();
		$data['name']    = $this->getAdminDetails();
		$data['success'] = '';
		$data['edit_id'] = $id;
		$data['page_action'] = $page_action;

		$allow_ctoption = array('M'=>'Mens','F'=>'Women\'s','U'=>'Unisex','C'=>'Children','E'=>'Estate','D'=>'Designers','R'=>'Religious','CH'=>'Charms','CL'=>'Clearance','S'=>'Services','CG'=>'Colored Gemstones');
		$gender_options = array_keys($allow_ctoption);
		$view_allowoption = '';
		$data['allow_options'] = '';
		$data['affiliate_url'] = '';
		if ($this->isadminlogin()) {
			$data['action'] = ($id == '' ? 'Add' : 'Edit');
			if($id != '') {
				$row_userinfo = $this->User->get_user_info($id);
				$data['username'] = $row_userinfo['username'];
				$data['password'] = $row_userinfo['password'];
				$data['email']    = $row_userinfo['email'];
				$data['fname']    = $row_userinfo['fname'];
				$data['lname']    = $row_userinfo['lname'];
				$data['affiliate_url'] = get_burl('affiliate/cf/'.$data['username']);
				$data['allow_options'] = unserialize($row_userinfo['allow_options']);
			}

			foreach($allow_ctoption as $key => $option_value) {
				$view_allowoption .= '<input type="checkbox" name="cb_allowoptions[]" value="'.$key.'" />&nbsp;&nbsp;'.$option_value.'<br>';
			}
			$data['view_allowoption'] = $view_allowoption;
			$user_name 		= $this->post_field('user_name');
			$ufirst_name 	= $this->post_field('ufirst_name');
			$ulast_name 	= $this->post_field('ulast_name');
			$uemail_address = $this->post_field('uemail_address');
			$ulogin_pass 	= $this->post_field('ulogin_pass');
			$cb_allowoptions = $this->post_field('cb_allowoptions');

			$txt_editid 	 = $this->post_field('txt_editid');
			$ueditID  		= ( !empty($txt_editid) ? $txt_editid : '' );

			if(isset($user_name) && !empty($user_name)) {
				$action = $this->User->user_save($user_name,$ufirst_name,$ulast_name,$uemail_address,$ulogin_pass,$cb_allowoptions,$ueditID);
				if($ueditID == '') {
					$data['success'] = 'User has added successflly!';
				} else {
					$data['success'] = 'User has updated successfully!';
					redirect('/admin/customers', 'refresh');die();
				}
			}
			$output = $this->load->view('admin/affiliate_management', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}

	function affiliate_customers($action = 'view', $id = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['action'] = $action;
		$data['action_link'] = SITE_URL.'admin/affiliate_customers/'.$action.'/'.$id;
		$data['rturn_msg'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->affiliateCustomers($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} elseif($action == 'add' || $action == 'edit'){
				$this->load->library('form_validation');
				$country_listar = array('USA','Canada','Australia','UK');
				$option_ctlist = '';
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('lname', 'Last Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('phone', 'Phone number', 'required');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

				$row_cust = $this->User->manageaffiliateCustomerInfo($id);
				$fname 		= $this->input->post('fname');
				$lname 		= $this->input->post('lname');
				$address1 	= $this->input->post('address1');
				$address2 	= $this->input->post('address2');
				$cmb_country= $this->input->post('cmb_country');
				$city 		= $this->input->post('city');
				$state  	= $this->input->post('state');
				$zipcode 	= $this->input->post('zipcode');
				$phone 		= $this->input->post('phone');
				$email 		= $this->input->post('email');
				$login_user	= $this->input->post('login_user');
				if( !empty($email) ) {
					$data['rturn_msg'] = '<div class="alert alert-success">Customer has '.$action.'ed successfully!</div>';
				}

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
				$data['login_user'] = check_empty($login_user, $row_cust->username);

				foreach($country_listar as $coun_name) {
					$option_ctlist .= '<option '.selectedOption($coun_name,$data['country']).'>'.$coun_name.'</option>';
				}
				$data['option_ctlist'] = $option_ctlist;
				$output = $this->load->view('admin/affiliate_customers', $data, true);
				$this->output($output, $data);
			} else {
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
					$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
					$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
				});
				$("#ecommerce").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('Affiliate Customers');
				$url = config_item('base_url') . 'admin/getaffiliateCustomers/';
				$data['action'] = $action;
				$data['onloadextraheader'] .= " $(\"#pageresults\").flexigrid({
					url: '" . $url . "',
					dataType: 'json',
					colModel : [
						{display: 'ID', name : 'id', width : 50, sortable : true, align: 'center'},
						{display: 'Name', signup_name : 'id', width : 120, sortable : true, align: 'left'},
						{display: 'Full Name', name : 'fname', width : 120, sortable : true, align: 'left'},
						{display: 'E-mail', name : 'email', width : 200, sortable : true, align: 'left'},
						{display: 'Username', name : 'username', width : 100, sortable : true, align: 'left'},
						{display: 'Phone', name : 'phone', width : 100, sortable : true, align: 'left'},
						{display: 'Address', name : 'address', width : 200, sortable : true, align: 'left'},
						{display: 'Action', name : 'action', width : 100, sortable : true, align: 'center'}
					],
					buttons : [ 
						{name: 'Add', bclass: 'add', onpress : test},
						{name: 'Delete', bclass: 'delete', onpress : test},
						{separator: true}
					],
					searchitems : [
						{display: 'id', name : 'id', isdefault: true},
						{display: 'email', name : 'email', isdefault: true}
					],
					sortname: \"id\",
					sortorder: \"DESC\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Customers</h1>',
					useRp: true,
					rp: 20,
					showTableToggleBtn: false,
					width:1025,
					height: 800
				});

				function test(com,grid){
					if (com=='Delete'){ 
						if($('.trSelected').length>0){
							if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
								var items = $('.trSelected');
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+\",\";
								}

								$.ajax({
									type: \"POST\",
									dataType: \"json\",
									url: \"" . config_item('base_url') . "admin/affiliatecustomers/delete\",
									data: \"items=\"+itemlist,
									success: function(data){
										alert('Total Deleted rows: '+data.total);
										$(\"#pageresults\").flexReload();
									}
								});
							}
						} else{
							alert('You have to select a row.');
						}
					}else if (com=='Add'){
						window.location = '" . config_item('base_url') . "admin/affiliate_users';
					}
				}";
				$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/affiliate_customers', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function getaffiliateCustomers() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getaffiliateCustomers($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['<a href=\"#\">" . $row['id'] . "</a>'";
			$json .= ",'" . addslashes($row['name']) . " '";
			$json .= ",'" . addslashes(ucfirst($row['fname'])) . " " . addslashes($row['lname']) . "'";
			$json .= ",'" . addslashes($row['email']) . " '";
			$json .= ",'" . addslashes($row['user_name']) . " '";
			$json .= ",'" . addslashes($row['phone']) . " '";
			$json .= ",'" . str_replace("\r", '<br />', str_replace("\n", '<br />', addslashes($row['address']))) . "'";
			$json .= ",'<a href=\"".SITE_URL."admin/affiliate_customers/edit/".$row['id']."\">Edit</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function affiliate_users($page_action='add', $id='') {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$data = $this->getCommonData();
		$data['name']    = $this->getAdminDetails();
		$data['success'] = '';
		$data['edit_id'] = $id;
		$data['page_action'] = $page_action;

		$allow_ctoption = array('M'=>'Mens','F'=>'Women\'s','U'=>'Unisex','C'=>'Children','E'=>'Estate','D'=>'Designers','R'=>'Religious','CH'=>'Charms','CL'=>'Clearance','S'=>'Services','CG'=>'Colored Gemstones');
		$gender_options = array_keys($allow_ctoption);
		$view_allowoption = '';
		$data['allow_options'] = '';
		$data['affiliate_url'] = '';
		if ($this->isadminlogin()) {
			$data['action'] = ($id == '' ? 'Add' : 'Edit');
			if($id != '') {
				$row_userinfo = $this->User->get_affiliateuser_info($id);
				$data['username'] = $row_userinfo['username'];
				$data['password'] = $row_userinfo['password'];
				$data['email']    = $row_userinfo['email'];
				$data['fname']    = $row_userinfo['fname'];
				$data['lname']    = $row_userinfo['lname'];
				$data['affiliate_url'] = get_burl('affiliate/cf/'.$data['username']);
				$data['allow_options'] = unserialize($row_userinfo['allow_options']);
			}

			foreach($allow_ctoption as $key => $option_value) {
				$view_allowoption .= '<input type="checkbox" name="cb_allowoptions[]" value="'.$key.'" />&nbsp;&nbsp;'.$option_value.'<br>';
			}
			$data['view_allowoption'] = $view_allowoption;
			$user_name 		= $this->post_field('user_name');
			$ufirst_name 	= $this->post_field('ufirst_name');
			$ulast_name 	= $this->post_field('ulast_name');
			$uemail_address = $this->post_field('uemail_address');
			$ulogin_pass 	= $this->post_field('ulogin_pass');
			$cb_allowoptions = $this->post_field('cb_allowoptions');
			$txt_editid 	 = $this->post_field('txt_editid');
			$ueditID  		= ( !empty($txt_editid) ? $txt_editid : '' );

			if(isset($user_name) && !empty($user_name)) {
				$action = $this->User->user_save($user_name,$ufirst_name,$ulast_name,$uemail_address,$ulogin_pass,$cb_allowoptions,$ueditID);
				if($ueditID == '') {
					$data['success'] = 'User has added successflly!';
				} else {
					$data['success'] = 'User has updated successfully!';
					redirect('/admin/affiliate_customers', 'refresh');die();
				}
			}
			$output = $this->load->view('admin/affiliate_users', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}

	/* get trial users views */
	function trial_users($action = 'view', $id = '', $resent='') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['action'] = $action;
		$data['action_link'] = SITE_URL.'admin/trial_users/'.$action.'/'.$id;
		$data['rturn_msg'] = '';
		$data['email_resent'] = ( !empty($resent) ? '<br><div class="alert alert-success"> Email has sent successfully!</div>' : '' );
		$data['resent_link'] = SITE_URL.'admin/resent_trial_user_email/'.$id;
		
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->deleteTrialUser($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
		 
					$industry_arlist = array('Retailer','Diamond Dealer','Wholesaler');
					$option_ctlist = '';
					$this->form_validation->set_rules('fname', 'First Name', 'required');		
					$this->form_validation->set_rules('lname', 'Last Name', 'required');
					$this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');		
					$this->form_validation->set_rules('phone_no', 'Phone number', 'required');
					$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
					
					$rowtrial_user = $this->User->manageTrialUsers($id);
					$trail_status =  array('T'=>'Trial Account', 'P'=>'Paid Account');
					$softOption = '';
					
					foreach($trail_status as $tskey => $tsvalue) {
						$softOption .= '<option value="'.$tskey.'" '.selectedOption($tskey, $rowtrial_user->soft_status).'>'.$tsvalue.'</option>';
					}
					$data['acount_type'] = $softOption;
					
					$fname 		= $this->input->post('fname');
					$lname 		= $this->input->post('lname');
					$phone_no 	= $this->input->post('phone_no');
					$txt_uname 	= $this->input->post('txt_uname');
					$txt_email  = $this->input->post('txt_email');
					$login_pass   = $this->input->post('login_pass');
					$cmb_industry = $this->input->post('cmb_industry');
					$job_title 	  = $this->input->post('job_title');
					$company_name = $this->input->post('company_name');
					
					if( !empty($email) ) {
						$data['rturn_msg'] = '<div class="alert alert-success">Customer has '.$action.'ed successfully!</div>';
					}
					
					$data['fname'] 		= check_empty($fname, $rowtrial_user->fname);
					$data['lname'] 		= check_empty($lname, $rowtrial_user->lname);
					$data['phone_no']   = check_empty($phone_no, $rowtrial_user->contact_info);
					$data['user_name']  = check_empty($txt_uname, $rowtrial_user->userid);
					$data['email_adres']  = check_empty($txt_email, $rowtrial_user->email);
					$data['login_pass']	  = check_empty($login_pass, $rowtrial_user->visible_pasview);
					$data['indust_name']  = check_empty($cmb_industry, $rowtrial_user->industry_name);
					$data['job_title']    = check_empty($job_title, $rowtrial_user->job_title);
					$data['company_name'] = check_empty($company_name, $rowtrial_user->company_name);
					$compViewLogo = SITE_URL.'uploads/'.$rowtrial_user->sites_logo;
					$data['companys_logo'] = '';
					
					if( getimagesize($compViewLogo) ) 
					{
						$data['companys_logo'] = '<img src="'.$compViewLogo.'" width="180" />';
					}
					
					foreach($industry_arlist as $indust_name) {
						$option_induslist .= '<option '.selectedOption($indust_name,$data['indust_name']).'>'.$indust_name.'</option>';
					}
					
					$data['option_induslist'] = $option_induslist;
					
					$output = $this->load->view('admin/trialuser_view', $data, true);
					$this->output($output, $data);
					
					if( isset($fname) && !empty($fname) ) {
						redirect('admin/trial_users/view', 'refresh');
					}
					
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['id'] = $id;
						$data['details'] = $this->Adminmodel->getCommentsByID($id);
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('brands');
				$url = config_item('base_url') . 'admin/getrialusres';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																	{display: 'ID', name : 'id', width : 50, sortable : true, align: 'center'},
																	{display: 'Full Name', name : 'fname', width : 120, sortable : true, align: 'left'},
																	{display: 'E-mail', name : 'email', width : 200, sortable : true, align: 'left'},
																	{display: 'Password', name : 'visible_pasview', width : 50, sortable : true, align: 'left'},
																	{display: 'Username', name : 'email', width : 100, sortable : true, align: 'left'},
																	{display: 'Phone', name : 'contact_info', width : 100, sortable : true, align: 'left'},
																	{display: 'Industry', name : 'industry_name', width : 100, sortable : true, align: 'left'},
																	{display: 'Company', name : 'sites_title', width : 100, sortable : true, align: 'left'},
																	{display: 'True Trials', name : 'true_trials', width : 40, sortable : true, align: 'left'},
																	{display: 'Action', name : 'action', width : 120, sortable : true, align: 'center'}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'ID #', name : 'id', isdefault: true},
																		{display: 'Full Name', name : 'full_name', isdefault: true}
																		], 		
																	sortname: \"id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Trial Users</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height: 800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
                                                                                                                                                                 
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/trial_users/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted comments: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                   error:function (xhr, ajaxOptions, thrownError){
                                                                                                                                                                                                                        alert(xhr.status);
                                                                                                                                                                                                                        alert(xhr.responseText);
                                                                                                                                                                                                                    }               
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a comments.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/trial_users/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/trialuser_view', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function trials_users($action = 'view', $id = '', $resent='') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['action'] = $action;
		$data['action_link'] = SITE_URL.'admin/trial_users/'.$action.'/'.$id;
		$data['rturn_msg'] = '';
		$data['email_resent'] = ( !empty($resent) ? '<br><div class="alert alert-success"> Email has sent successfully!</div>' : '' );
		$data['resent_link'] = SITE_URL.'admin/resent_trial_user_email/'.$id;
		
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->deleteTrialUser($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} elseif($action == 'add' || $action == 'edit') 
				{
					$this->load->library('form_validation');
		 
					$industry_arlist = array('Retailer','Diamond Dealer','Wholesaler');
					$option_ctlist = '';
					$this->form_validation->set_rules('fname', 'First Name', 'required');		
					$this->form_validation->set_rules('lname', 'Last Name', 'required');
					$this->form_validation->set_rules('txt_email', 'Email', 'required|valid_email');		
					$this->form_validation->set_rules('phone_no', 'Phone number', 'required');
					$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
					
					$rowtrial_user = $this->User->manageTrialUsers($id);
					
					$fname 		= $this->input->post('fname');
					$lname 		= $this->input->post('lname');
					$phone_no 	= $this->input->post('phone_no');
					$txt_uname 	= $this->input->post('txt_uname');
					$txt_email  = $this->input->post('txt_email');
					$login_pass   = $this->input->post('login_pass');
					$cmb_industry = $this->input->post('cmb_industry');
					$job_title 	  = $this->input->post('job_title');
					$company_name = $this->input->post('company_name');
					
					if( !empty($email) ) {
						$data['rturn_msg'] = '<div class="alert alert-success">Customer has '.$action.'ed successfully!</div>';
					}
					
					$data['fname'] 		= check_empty($fname, $rowtrial_user->fname);
					$data['lname'] 		= check_empty($lname, $rowtrial_user->lname);
					$data['phone_no']   = check_empty($phone_no, $rowtrial_user->contact_info);
					$data['user_name']  = check_empty($txt_uname, $rowtrial_user->userid);
					$data['email_adres']  = check_empty($txt_email, $rowtrial_user->email);
					$data['login_pass']	  = check_empty($login_pass, $rowtrial_user->visible_pasview);
					$data['indust_name']  = check_empty($cmb_industry, $rowtrial_user->industry_name);
					$data['job_title']    = check_empty($job_title, $rowtrial_user->job_title);
					$data['company_name'] = check_empty($company_name, $rowtrial_user->company_name);
					$compViewLogo = SITE_URL.'uploads/'.$rowtrial_user->sites_logo;
					$data['companys_logo'] = '';
					
					if( getimagesize($compViewLogo) ) 
					{
						$data['companys_logo'] = '<img src="'.$compViewLogo.'" width="180" />';
					}
					
					foreach($industry_arlist as $indust_name) {
						$option_induslist .= '<option '.selectedOption($indust_name,$data['indust_name']).'>'.$indust_name.'</option>';
					}
					
					$data['option_induslist'] = $option_induslist;
					
					$output = $this->load->view('admin/trialuser_view', $data, true);
					$this->output($output, $data);
					
					if( isset($fname) && !empty($fname) ) {
						redirect('admin/trial_users/view', 'refresh');
					}
			
			} else {
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#ecommerce").click();
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('Customers');
				$url = config_item('base_url') . 'admin/getrialusres/';
				$data['action'] = $action;
				$data['onloadextraheader'] .= " $(\"#pageresults\").flexigrid
									(
										{
										url: '" . $url . "',
										dataType: 'json',
										colModel : [
										{display: 'ID', name : 'id', width : 50, sortable : true, align: 'center'},
										{display: 'Full Name', name : 'fname', width : 120, sortable : true, align: 'left'},
										{display: 'E-mail', name : 'email', width : 200, sortable : true, align: 'left'},
										{display: 'Password', name : 'visible_pasview', width : 50, sortable : true, align: 'left'},
										{display: 'Username', name : 'email', width : 100, sortable : true, align: 'left'},
										{display: 'Phone', name : 'contact_info', width : 100, sortable : true, align: 'left'},
										{display: 'Industry', name : 'industry_name', width : 100, sortable : true, align: 'left'},
										{display: 'Company', name : 'sites_title', width : 100, sortable : true, align: 'left'},
										{display: 'True Trials', name : 'true_trials', width : 40, sortable : true, align: 'left'},
										{display: 'Action', name : 'action', width : 120, sortable : true, align: 'center'}
										],
										 buttons : [ 
					 								{name: 'Add', bclass: 'add', onpress : test},
													{name: 'Delete', bclass: 'delete', onpress : test},
													{separator: true}
												 ],
										searchitems : [
										{display: 'id', name : 'id', isdefault: true},
										{display: 'email', name : 'email', isdefault: true}
										
										],
										sortname: \"id\",
										sortorder: \"DESC\",
										usepager: true,
										title: '<h1 class=\"pageheader\">Trial Users</h1>',
										useRp: true,
										rp: 20,
										showTableToggleBtn: false,
										width:1025,
										height: 800
										}
									);
									function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/trial_users/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#pageresults\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                }
																			}
																	 		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/trial_users';
																			}
																	}
																";
				/*$data['extraheader'] = '
	<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';*/
				
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$output = $this->load->view('admin/trialuser_view', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
	///// resent email to trial user
	function resent_trial_user_email($trial_id) {
		$rowtrial = $this->User->manageTrialUsers($trial_id);
		
		$to = $rowtrial->email;
		$full_name = $rowtrial->fname.' '.$rowtrial->lname;
		
			$subject = "Jewelercart.com 7 Day Free Trial Activation Email";
			
			$message = '
			<html>
			<body>
			<div>Hi '.$full_name.'</div>
			<div>'."\t\t".' You are successfully registered for Jewelercart.com 5.0 Free 7 day Trial software for Diamond & Jewelry Retailers, Brokers and Wholesalers.<br>
What does Jewelercart.com 5.0 Software do?<br><br>
				
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
					<td width="88%">'.$rowtrial->email.'</td>
				  </tr>
				  <tr>
					<td>Login Password:</td>
					<td>'.$rowtrial->visible_pasview.'</td>
				  </tr>
				</table>
				<br><br>
				During this 7 day Free Trial Jewelercart\'s Project Manager Ms. Shine Dedoroy will be following up to answer any questions.<br><br>
				
				Project Manager Shine Dedoroy<br>
				260 Peachtree Street Suite 2200<br>
				Atlanta , Georgia<br>
				30303 <br>
				Direct:404-596-8928 <br>
				Company:404-596-8934<br>
				customercare@jewelercart.com <br>
				http://www.jewelercart.com/<br></div>
			</body>
			</html>';
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			$rowuser = $this->Commonmodel->getMainAdminProfileDetail();
			
			// More headers
			$headers .= 'From: Jewelercart.com 7 Day Free Trial Activation Email <'.$rowuser['email'].'>' . "\r\n";
			//$headers .= 'Cc: myboss@example.com' . "\r\n";
			
			mail($to,$subject,$message,$headers);
			
			redirect('admin/trial_users/view/'.$trial_id.'/true');
		
	}

	//// get trial users lists
	function getrialusres() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'fname';
		$results = $this->Adminmodel->getrialUsersList($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			$trueTrials = ( $row['sites_title'] == 'Y' ? 'Yes' : 'N' );
			
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['<a href=\"#\">" . $row['id'] . "</a>'";
			$json .= ",'" . addslashes(ucfirst($row['fname'])) . " " . addslashes($row['lname']) . "'";
			$json .= ",'" . addslashes($row['email']) . " '";
			$json .= ",'" . addslashes($row['visible_pasview']) . " '";
			$json .= ",'" . addslashes($row['userid']) . " '";
			$json .= ",'" . addslashes($row['contact_info']) . " '";
			$json .= ",'" . addslashes($row['industry_name']) . " '";
			$json .= ",'" . addslashes($row['sites_title']) . " '";
			$json .= ",'" . addslashes($trueTrials) . " '";
			$json .= ",'<a href=\"".SITE_URL."admin/trial_users/edit/".$row['id']."\">Edit</a> | <a href=\"".SITE_URL."admin/resent_trial_user_email/".$row['id']."\">Resend Email</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}	

	function getorders() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 100;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getorders($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$i = 0;
		foreach ($results['result'] as $row) {
			$shape = '';
			$action = config_item('base_url') . "admin/generateXMLStamp/" . $row['orderid'];
			$orderid = $row['orderid'];
			$fedex = config_item('base_url') . "/admin/fedex/$orderid";
			$usps = config_item('base_url') . "/admin/usps/$orderid";
			$fedexTrackingCode = $row['fedex_tracking_code'];
			$uspsTrackingCode = $row['usps_tracking_code'];
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['orderid'] . "',";
			$json .= "cell:['" . $row['orderid'] . "'";
			$json .= ",'" . addslashes($row['purchase-date']) . " '";
			$json .= ",'" . addslashes($row['order-item-id']) . " '";
			if (!empty($fedexTrackingCode)) {
				//$json .= ",'".addslashes($fedexTrackingCode)." '";
				$json .= ",'<a href=\"$fedex\"  style=\"color:maroon;font-weight:bold;\">Ship to Fedex</a>'";
			} else {
				$json .= ",'<a href=\"$fedex\"  style=\"color:maroon;font-weight:bold;\">Ship to Fedex</a>'";
			}
			if (!empty($uspsTrackingCode)) {
				//$json .= ",'".addslashes($uspsTrackingCode)." '";
				$json .= ",'<a href=\"$usps\" style=\"color:maroon;font-weight:bold;\">Ship to USPS</a>'";
			} else {
				$json .= ",'<a href=\"$usps\" style=\"color:maroon;font-weight:bold;\">Ship to USPS</a>'";
			}
			$json .= ",'" . addslashes($row['buyer-name']) . " '";
			$json .= ",'" . addslashes($row['product-name']) . " '";
			$json .= ",'" . addslashes($row['quantity-purchased']) . "'";
			$json .= ",'" . addslashes($row['ship-address2']) . " '";
			$json .= ",'" . addslashes($row['ship-cityship-city']) . " '";
			$json .= ",'" . addslashes($row['ship-state']) . " '";
			$json .= ",'" . addslashes($row['ship-country']) . " '";
			$json .= ",'" . addslashes($row['ship-postal-code']) . " '";
			$json .= ",'" . '$' . number_format(addslashes($row['shipping-price']), 2) . " '";
			$json .= ",'" . '$' . number_format(addslashes($row['item-price']), 2) . " '";
			$json .= ",'<a href=\"$action\" style=\"color:maroon;font-weight:bold;\">download</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
			$i = $i + 1;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	/*
	 * Website orders
	 */
	function getorder($type='R') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		//$results = $this->Adminmodel->getorder($page, $rp, $sortname, $sortorder, $query, $qtype);
		$results = $this->Adminmodel->getorder_or($page, $rp, $sortname, $sortorder, $query, $qtype, '', $type);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			//$totalprice	+= $row['totalprice'];
			//$customerDetail = $this->Adminmodel->getcustomerDetailforIContact($row['id']);
			//print_r($customerDetail);
			$shape = '';
			$resultsdetail = $this->Adminmodel->getorderdetail_or($row['id']);
			$resultsdetailcust = $this->Adminmodel->getordercustid($row['customerid']);
			$emails = isset($resultsdetailcust->email)?$resultsdetailcust->email:'';
			$fnames = isset($resultsdetailcust->fname)?$resultsdetailcust->fname:'';
			$lnames = isset($resultsdetailcust->lname)?$resultsdetailcust->lname:'';

			$orderid = $row['id'];
			$pathimgid = "javascript:void window.open(\"http://www.textfixer.com\",width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0);return false;";
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['" . $row['orders_id'] . "'";
			$json .= ",'" . addslashes($resultsdetail->lot) . " '";
			$json .= ",'" . addslashes($resultsdetail->totproducts) . " '";
			$json .= ",'" . addslashes($row['totalprice']) . "'";
			$json .= ",'" . addslashes($row['orderdate']) . " '";
			$json .= ",'" . addslashes($emails) . " '";
			$json .= ",'" . addslashes($fnames) . " '";
			$json .= ",'" . addslashes($lnames) . " '";
			//$json .= ",'<a href=\"javascript:\" onClick=\"getorderdetail(".$row['id'].")\">Detail</a>'";
			$json .= ",'<a href=\"".SITE_URL."admin/getorderdetail_view/".$row['id']."\">Detail</a>'";
			//$json .= ",'<a href=\"javascript:\" onClick=\"sendContact(".$row['customerid'].")\">IContact</a>'";
			$json .= ",'<a href=\"".SITE_URL."admin/sendContact/".$row['customerid']."/".$row['id']."\">Mail Chimp</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
    /*
	 * End website orders
	 */
	function sendContact($cid, $oid)
	{	 
		$customerDetail = $this->Adminmodel->getcustomerDetailforIContact($cid);
		$data2['customerDetail'] = $customerDetail;
		$data2['actionURL'] = SITE_URL.'admin/sendContact/'.$cid.'/'.$oid;
		$data2['row_ordt'] = $this->Commonmodel->getOrderDetail($oid);
		//print_r($data['customerDetail']);
		//die;
		$mesage = '';
		
		$emailMesage = $this->input->post('email_mesage');
		
		if(isset($emailMesage) && !empty($emailMesage)) 
		{
			$fromEmail = $this->input->post('from_email');
			
			$to = $customerDetail->email;
			$subject =  $this->input->post('email_subject');
			$message = '';
			
			$message .= '<html>
				<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
					<style>
						table tr th,table tr td{vertical-align:top; text-align:left; padding:2px;}
					</style>
				<title>'.SITE_URL.'</title></head>
				<body>';
			
			$message .= '<table>
						  <tr>
							<th>Order ID:</th>
							<td>'.$data2['row_ordt']['id'].'</td>
						  </tr>
						  <tr>
							<th>Order Date:</th>
							<td>'.$data2['row_ordt']['orderdate'].'</td>
						  </tr>
						  <tr>
							<th>Delivery Date:</th>
							<td>'.$data2['row_ordt']['deliverydate'].'</td>
						  </tr>
						  <tr>
							<th>Billing Country:</th>
							<td>'.$customerDetail->billcountry.'</td>
						  </tr>
						  <tr>
							<th>Billing Postcode:</th>
							<td>'.$customerDetail->billpostcode.'</td>
						  </tr>
						  <tr>
							<th>Message:</th>
							<td>'.$emailMesage.'</td>
						  </tr>
						</table>';
				
			$message .= '</body></html>';
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: <'.$fromEmail.'>' . "\r\n";
			$mesage = 'Email Sent Successfully!';
			
			mail($to,$subject,$message,$headers);
		}
		
		$data2['mesage'] = ( !empty($mesage) ? '<div class="alert alert-success">'.$mesage.'</div>' : '' );
		
		$output = $this->load->view('admin/sendContact', $data2, true);
		$this->output($output, $data);
	}
	/*
	 * End website orders
	 */
	function getorderdetail($id)
	{
		
		//$data = $results;
		$data = array();
		$myorder = $this->Adminmodel->getorderonly($id);
		$data['paymentmethord'] = $myorder->paymentmethod;
		$data['ordersatus'] = $myorder->isconfirmed;
		
		$data['orderdetail'] = $this->Adminmodel->getorderdetail_or_or($id);
		$data['customer'] = $this->Adminmodel->getCustomerByID_or($myorder->customerid);
		$data['shippment'] = $this->Adminmodel->getShippingInfo_ro($id,$myorder->customerid);
		//var_dump($data['shippment']);
		$data['orderid'] = $id;
		$data['full_name'] = $data['customer']->fname.' '.$data['customer']->lname;
		$data['billing_fullname'] = $data['customer']->billing_fname.' '.$data['customer']->billing_lname;
		$data['payment_mthod'] = $this->session->userdata('payment_method');
		$data['procesing_fees'] = ( $data['payment_mthod'] == 'payment_bankwire' ? 35 : 0 );
		$data['authcode'] = $this->Adminmodel->getorderinfo($id);
		//var_dump($data['orderdetail']);
		$output = $this->load->view('admin/orderdetail', $data, true);
		$this->output($output, $data);
	}
	
	/////////////// get order detail list
	function getorderdetail_view($id)
	{
		
		$this->load->helper('date');
		//$data = $results;
		$data = array();
		$myorder = $this->Adminmodel->getorderonly($id);
		$data['paymentmethord'] = $myorder->paymentmethod;
		$data['ordersatus'] = $myorder->isconfirmed;
		
		$data['orderdetail'] = $this->Adminmodel->getorderdetail_or_or($id);
		$data['customer'] = $this->Adminmodel->getCustomerByID_or($myorder->customerid);
		$data['shippment'] = $this->Adminmodel->getShippingInfo_ro($id,$myorder->customerid);
		//var_dump($data['shippment']);
		$data['orderid'] = $id;
		$data['full_name'] = $data['customer']->fname.' '.$data['customer']->lname;
		$data['billing_fullname'] = $data['customer']->billing_fname.' '.$data['customer']->billing_lname;
		$data['payment_mthod'] = $this->session->userdata('payment_method');
		$data['procesing_fees'] = ( $data['payment_mthod'] == 'payment_bankwire' ? 35 : 0 );
		$data['authcode'] = $this->Adminmodel->getorderinfo($id);
		
		////// get order detail
		$data['row_ordt'] = $this->Commonmodel->getOrderDetail($id);
		$rowitemdt = $this->Commonmodel->getOrderItemDetail($id);
		
		$order_stats = ( $_POST['order_status'] != '' ? $_POST['order_status'] : $data['row_ordt']['order_status'] );
		$pymentMethod = ( $_POST['payment_method'] != '' ? $_POST['payment_method'] : $data['row_ordt']['paymentmethod'] );
		$pymentStatus = ( $_POST['payment_status'] != '' ? $_POST['payment_status'] : $data['row_ordt']['payment_status'] );
		
		$data['pmtmethod'] 	    = $this->getOptionsList(getPaymntMode(), $pymentMethod);
		$data['order_status']   = $this->getOptionsList(getOrdrStatus(), $order_stats);
		$data['payment_status'] = $this->getOptionsList(getPaymntStatus(), $pymentStatus);
		$data['shipeDate'] = ( $_POST['ship_date'] != '' ? $_POST['ship_date'] : $data['row_ordt']['deliverydate'] );
		$data['paid_by']    = ( $_POST['paid_by'] != '' ? $_POST['paid_by'] : $data['row_ordt']['paidby'] );
		$data['check_numb'] = ( $_POST['check_numb'] != '' ? $_POST['check_numb'] : $data['row_ordt']['check_number'] );
			
		$this->load->helper('ordrs_detail');
						
		$data['itemDetails'] = view_order_details_content($data['row_ordt']['orders_id']); //$itemDetails;
		//var_dump($data['orderdetail']);
		$output = $this->load->view('admin/orderdetails_view', $data, true);
		$this->output($output, $data);
	}
	
	///// get options list
	function getOptionsList($ar=array(), $idvalue) 
	{
		$optionList = '';
		foreach($ar as $arkey => $arvalue) 
		{
			$optionList .= '<option value="'.$arkey.'" '.selectedOption($arkey, $idvalue).'>'.$arvalue.'</option>';
		}
		return $optionList;
	}
	function getebayorders() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 100;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getebayorders($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['order_id'] . "',";
			$json .= "cell:['" . $row['order_id'] . "'";
			$json .= ",'" . addslashes($row['sold_date']) . " '";
			$json .= ",'" . addslashes($row['buyer_firstname']) . " " . addslashes($row['buyer_lastname']) . " '";
			$json .= ",'" . addslashes($row['qty_sold']) . "'";
			$json .= ",'" . "$" . addslashes($row['sale_price']) . " '";
			$json .= ",'" . addslashes($row['ship_firstname']) . ' ' . addslashes($row['ship_lastname']) . ' ' . addslashes($row['shipping_address1']) . " '";
			$json .= ",'" . addslashes($row['ship_city']) . " '";
			$json .= ",'" . addslashes($row['ship_state']) . " '";
			$json .= ",'" . addslashes($row['ship_country']) . " '";
			$json .= ",'" . addslashes($row['ship_zip']) . " '";
			$json .= ",'" . addslashes($row['shipping_date']) . " '";
			$json .= ",'" . addslashes($row['transaction_id']) . " '";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	/*
	 * @ Main Page Images method
	 * @
	 */
	function mainimage() {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($_POST['submit']) {
				$destination = config_item('base_path') . 'front_images/';
				if (!empty($_FILES['file']['tmp_name'])) {
					move_uploaded_file($_FILES['file']['tmp_name'], $destination);
				} else {
					$t = $this->Adminmodel->saveimage($data);
				}
			}
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
			$data['onloadextraheader'] .= " var so;";
			$data['usetips'] = true;
			//$data['leftmenus']	=	$this->Adminmodel->adminmenuhtml('order');
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('mainimage');
			$output = $this->load->view('admin/mainimage', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getimages() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->gethomeimages($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$path = config_item('base_url') . "admin/showimage/edit/";
		foreach ($results['result'] as $row) {
			$shape = '';
			$imgid = $row['image_id'];
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['order_id'] . "',";
			$json .= "cell:['" . $row['image_id'] . "'";
			$json .= ",'" . addslashes($row['image_title']) . " '";
			$json .= ",'" . addslashes($row['image_link']) . "'";
			$json .= ",'" . addslashes($row['image_type']) . " '";
			$json .= ",'" . addslashes($row['image_date']) . " '";
			$json .= ",'<a href=\"$path$imgid\"  style=\"color:maroon;font-weight:bold;\">Update</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	/*
	 * @ Show image on page
	 *
	 */
	function showimage($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->saveimg($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('image_title', 'Image Title', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							if (isset($_FILES['file']['tmp_name']) && !empty($_FILES['file']['tmp_name'])) {
								$destination = config_item('base_path') . "frontimg/" . $_FILES['file']['name'];
								move_uploaded_file($_FILES['file']['tmp_name'], $destination);
							}
							$_POST['image'] = $_FILES['file']['name'];
							$_POST['image_date'] = date("Y-m-d H:i:s");
							$ret = $this->Adminmodel->saveimg($action, $_POST, $_POST['image_id']);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
						//							die();
					}
				}
				if ($action == 'edit') {
					$data['details'] = $this->Adminmodel->gethomeimage($id);
					$details = $data['details'];
					$data['id'] = $id;
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()	    {
                 $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
	    });
		$("#rapnet").click();
		';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('showimage');
				$url = config_item('base_url') . 'admin/getimages';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
                                       (
                                             {   	 			
                                                     url: '" . $url . "',
                    				     dataType: 'json',
                                                     colModel : [
							{display: 'Imageid', name : 'image_id', width : 150, sortable : true, align: 'center', hide: false},
							{display: 'Image Title', name : 'image_title', width : 150, sortable : true, align: 'center', hide: false},
							{display: 'Image Url', name : 'image_link', width : 150, sortable : true, align: 'center',hide: false},
							{display: 'Image for', name : 'image_type', width : 80, sortable : true, align: 'left',hide: false},
							{display: 'Add Date', name : 'image_date', width : 100, sortable : true, align: 'left',hide: false},
							{display: 'Action', name : 'image_edit', width : 50, sortable : true, align: 'left',hide: false}                                                            
							 ],								
							 buttons : [{name: 'Add', bclass: 'add', onpress : test},
                                                        {name: 'Delete', bclass: 'delete', onpress : test},
                                                        {separator: true}
									  ],																		
																			
					   	   searchitems : [
								{display: 'id', name : 'id', isdefault: true}
						 		  ],
						  	     sortname: \"image_id\",
								sortorder: \"asc\",
								usepager: true,
								title: '<h1 class=\"pageheader\">Watch Brands</h1>',
								useRp: true,
								rp: 100,
								showTableToggleBtn: false,
								width:1025,
								height: 800
							       }
					            );
									
						function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  	
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/showimage/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/showimage/add';
																			}			
																	}
														 
									
						";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/showimage', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function brands($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->brands($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					if (isset($_POST[$action . 'btn'])) {
						//  if ($this->form_validation->run() == FALSE){
						//		    $data['error'] = 'ERROR ! Please check the error fields';
						//		    if($action != 'edit')$data['details'] = $_POST;
						//	}else {
						/*if (!empty($_FILES['image']['name'])) {
							$destination = config_item('base_path') . "frontimg/" . $_FILES['image']['name'];
							//echo $destination; exit();
							move_uploaded_file($_FILES['image']['tmp_name'], $destination);
							$_POST['image'] = $_FILES['image']['name'];
						} else {
							$_POST['image'] = '';
						}*/
						
						if(!empty($_FILES['image']['name'])){

        	                $config['upload_path'] 	= 'frontimg/';
        	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        	                $config['overwrite'] 	= TRUE;
        	                $config['file_name'] 	= $_FILES['image']['name'];
        	                
        	                //Load upload library and initialize configuration
        	                $this->load->library('upload',$config);
        	                $this->upload->initialize($config);
        	                
        	                if($this->upload->do_upload('image')){
        	                    $uploadData = $this->upload->data();
        	                    $img_path = $uploadData['file_name'];
        	                    $_POST['image']	= $img_path;
        	                }else{
        	                    $_POST['image'] = '';
        	                }
        	            }else{
        	                $_POST['image'] = '';
        	            }
						
						
						$ret = $this->Adminmodel->brands($_POST, $action, $id, 'watch');
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
						//}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['id'] = $id;
						$data['details'] = $this->Adminmodel->getBrandsByID($id);
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('brands');
				$url = config_item('base_url') . 'admin/getbrands';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'brand_id', width : 80, sortable : true, align: 'center'},
																		{display: 'Title(Caption)', name : 'brand_name', width : 95, sortable : true, align: 'center'},
																		{display: 'Add Date', name : 'brand_date', width : 120, sortable : true, align: 'center'},
																		{display: 'Description', name : 'brand_content', width : 450, sortable : true, align: 'center'}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'ID #', name : 'brand_id', isdefault: true},
																		{display: 'Title(Caption)', name : 'brand_name', isdefault: true}
																		], 		
																	sortname: \"brand_date\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Manage Brands</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height: 800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
                                                                                                                                                                 
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/brands/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted brands: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                   error:function (xhr, ajaxOptions, thrownError){
                                                                                                                                                                                                                        alert(xhr.status);
                                                                                                                                                                                                                        alert(xhr.responseText);
                                                                                                                                                                                                                    }               
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a brand.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/brands/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/brands', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
	///// manage unique commments
	function manage_comments($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->manipulateComents($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					if (isset($_POST[$action . 'btn'])) {
						$ret = $this->Adminmodel->manipulateComents($_POST, $action, $id);
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
						//}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['id'] = $id;
						$data['details'] = $this->Adminmodel->getCommentsByID($id);
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('brands');
				$url = config_item('base_url') . 'admin/getComments';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'id', width : 80, sortable : true, align: 'center'},
																		{display: 'Full Name', name : 'full_name', width : 95, sortable : true, align: 'left'},
																		{display: 'Rating', name : 'coments_rating', width : 120, sortable : true, align: 'left'},
																		{display: 'Comments', name : 'post_comments', width : 450, sortable : true, align: 'left'},
																		{display: 'Comments Date', name : 'coment_date', width : 100, sortable : true, align: 'left'},
																		{display: 'Status', name : 'status', width : 100, sortable : true, align: 'left'}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'ID #', name : 'id', isdefault: true},
																		{display: 'Full Name', name : 'full_name', isdefault: true}
																		], 		
																	sortname: \"id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Comments Manager</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height: 800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
                                                                                                                                                                 
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/manage_comments/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted comments: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                   error:function (xhr, ajaxOptions, thrownError){
                                                                                                                                                                                                                        alert(xhr.status);
                                                                                                                                                                                                                        alert(xhr.responseText);
                                                                                                                                                                                                                    }               
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a comments.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/manage_comments/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/manage_coments', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
	///// manage custom design request
	function customs_design($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if( !empty($id) )
			{
				$data['details'] = $this->Adminmodel->getCustomDetail($id);
			}
			
			if ($action == 'delete') {
				$ret = $this->Adminmodel->manipulateCustomRequest($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					if (isset($_POST[$action . 'btn'])) {
						$ret = $this->Adminmodel->manipulateCustomRequest($_POST, $action, $id);
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
						//}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'view_detail') {
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('brands');
				$url = config_item('base_url') . 'admin/getCustomDesigns';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'id', width : 100, sortable : true, align: 'center'},
																		{display: 'Contact Name', name : 'contact_name', width : 150, sortable : true, align: 'left'},
																		{display: 'Email', name : 'contact_email', width : 200, sortable : true, align: 'left'},
																		{display: 'Phone NO', name : 'contact_phone', width : 150, sortable : true, align: 'left'},
																		{display: 'Message', name : 'custom_desc', width : 300, sortable : true, align: 'left'},
																		{display: 'Date', name : 'request_date', width : 100, sortable : true, align: 'left'}
																		],
																		 buttons : [{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'ID #', name : 'id', isdefault: true},
																		{display: 'Full Name', name : 'contact_name', isdefault: true}
																		], 		
																	sortname: \"id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Custom Designs</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height: 800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
                                                                                                                                                                 
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/customs_design/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted comments: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                   error:function (xhr, ajaxOptions, thrownError){
                                                                                                                                                                                                                        alert(xhr.status);
                                                                                                                                                                                                                        alert(xhr.responseText);
                                                                                                                                                                                                                    }               
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a comments.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/customs_design/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/custom_design_list', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
	/////////// manage mailing subscriber
	///// manage unique commments
	function emails_subscriber($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->manipulateSubscribers($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					if (isset($_POST[$action . 'btn'])) {
						$ret = $this->Adminmodel->manipulateSubscribers($_POST, $action, $id);
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
						//}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						//$data['id'] = $id;
						//$data['details'] = $this->Adminmodel->getCommentsByID($id);
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('brands');
				$url = config_item('base_url') . 'admin/getSubsList';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'id', width : 180, sortable : true, align: 'center'},
																		{display: 'Full Name', name : 'full_name', width : 180, sortable : true, align: 'left'},
																		{display: 'Email Address', name : 'email_adres', width : 220, sortable : true, align: 'left'},
																		{display: 'Date Time', name : 'subs_date', width : 150, sortable : true, align: 'left'},
																		{display: 'Send Message', name : 'detail', width : 150, sortable : true, align: 'left'},
																		{display: 'Sync', name : 'subs_country', width : 150, sortable : true, align: 'left'},
																		],
																		 buttons : [{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'ID #', name : 'id', isdefault: true},
																		{display: 'Full Name', name : 'first_name', isdefault: true}
																		], 		
																	sortname: \"id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Email Subscriber</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height: 800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
                                                                                                                                                                 
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/emails_subscriber/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted comments: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                   error:function (xhr, ajaxOptions, thrownError){
                                                                                                                                                                                                                        alert(xhr.status);
                                                                                                                                                                                                                        alert(xhr.responseText);
                                                                                                                                                                                                                    }               
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a comments.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/emails_subscriber/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/emailsubscriber_list', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
	/////// sent email to subscriber
	function subsEmailSent($id)
	{	 
		$data2['details'] = $this->Adminmodel->getSubscriberByID($id);
		$data2['actionURL'] = SITE_URL.'admin/subsEmailSent/'.$id;
		$mesage = '';
		
		$emailMesage = $this->input->post('email_mesage');
		
		if(isset($emailMesage) && !empty($emailMesage)) 
		{
			$subs_name = $this->input->post('subs_name');
			$to_email = $this->input->post('email_adres');
			$fromEmail = $this->input->post('from_email');
			
			$to = ( !empty($to_email) ? $to_email : $data2['details']['email_adres'] );
			$subject =  $this->input->post('email_subject');
			$message = '';
			
			$message .= '<html>
				<head>
					<style>
						table tr th,table tr td{vertical-align:top; text-align:left; padding:2px;}
					</style>
				<title>'.SITE_URL.'</title></head>
				<body>';
			
			$message .= '<table>
						  <tr>
							<th>Subscriber name:</th>
							<td>'.$subs_name.'</td>
						  </tr>
						  <tr>
							<th>City:</th>
							<td>'.$data2['details']['subs_city'].'</td>
						  </tr>
						  <tr>
							<th>State:</th>
							<td>'.$data2['details']['subs_state'].'</td>
						  </tr>
						  <tr>
							<th>Country:</th>
							<td>'.$data2['details']['subs_country'].'</td>
						  </tr>
						  <tr>
							<th>Message:</th>
							<td>'.$emailMesage.'</td>
						  </tr>
						</table>';
				
			$message .= '</body></html>';
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: <'.$fromEmail.'>' . "\r\n";
			$mesage = 'Email Sent Successfully!';
			
			///////// save email into db
			$this->Commonmodel->managedEmails($id, '', 'subscriber_sent', $subject, $message);
			
			mail($to,$subject,$message,$headers);
		}
		
		$data2['mesage'] = ( !empty($mesage) ? '<div class="alert alert-success">'.$mesage.'</div>' : '' );
		
		$output = $this->load->view('admin/sentemail_tosubs', $data2, true);
		$this->output($output, $data);
	}
	
	function updateimg($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['result'] = $this->Adminmodel->gethomeimage($id);
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($_POST['submit']) {
				$destination = config_item('base_path') . "frontimg/" . $_FILES['file']['name'];
				move_uploaded_file($_FILES['file']['tmp_name'], $destination);
				$data['image_title'] = $_POST['title'];
				$data['image_link'] = $_POST['link'];
				$data['image_type'] = $_POST['type'];
				$data['image'] = $_FILES['file']['name'];
				$data['image_date'] = date("Y-m-d H:i:s");
				$t = $this->Adminmodel->saveimg($data, $_POST['image_id']);
				if ($t) {
					echo "<script>window.location.href='" . config_item('base_url') . "admin/showimage'</script>";
				}
			}
			// $t = $this->Adminmodel->fixhelix();
			$data['extraheader'] .= ' <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$data['extraheader'] .= '
				<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
			$data['onloadextraheader'] .= " var so;";
			$data['usetips'] = true;
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('order');
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('uploadbomicsv');
			$output = $this->load->view('admin/updateimg', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function uploads($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($_POST['submit']) {
				//$destination = '/home/mywatch/public_html/Sales-All_Sales.csv';
				$destination = config_item('base_path') . 'Sales-Paid.csv';
				//if(file_exists($destination)) unlink($destination);
				move_uploaded_file($_FILES['filecsv']['tmp_name'], $destination);
				if (file_exists($destination)) {
					$handle = fopen($destination, "r");
					//$r = $this->Adminmodel->emptyhelix();
					//foreach ($rows as $row)
					$i = 0;
					while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
						if ($i > 0) {
							// $cols = explode(',' , $row);
							// print_r($cols);
							//   echo '<pre>';
							//    print_r($data);
							// echo "<hr>";
							$t = $this->Adminmodel->saveorder($data);
						}
						$i++;
					}
					//echo "<script>window.location.href='".config_item('base_url')."admin/ebayorders";
					// exit;
					// $t = $this->Adminmodel->fixhelix();
				}
			}
			$data['extraheader'] .= ' <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$data['extraheader'] .= '
				<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
			$data['onloadextraheader'] .= " var so;";
			$data['usetips'] = true;
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('order');
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('uploadbomicsv');
			$output = $this->load->view('admin/upload', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function ebayorders($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#fullfillments").click();
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('ebayorders');
			$url = config_item('base_url') . 'admin/getebayorders/';
			$data['action'] = $action;
			$data['onloadextraheader'] .= " $(\"#results\").flexigrid
									(
										{
										url: '" . $url . "',
										dataType: 'json',
										colModel : [
										{display: 'eBay ID', name : 'id', width : 50, sortable : true, align: 'center'},
                                                                                {display: 'Order Date', name : 'orderdate', width : 125, sortable : true, align: 'left'},
										{display: 'Buyer Name', name : 'id', width : 110, sortable : true, align: 'center'},
										{display: 'Qty', name : 'id', width : 20, sortable : true, align: 'center'},
										{display: 'Sale<br>Price', name : 'paymentmethod', width : 40, sortable : true, align: 'left'},
										{display: 'Ship add.', name : 'shipping_address1', width : 220, sortable : true, align: 'left'},
										{display: 'Ship City', name : 'ship_city', width : 50, sortable : true, align: 'left'},
										{display: 'Ship State', name : 'ship_state', width : 50, sortable : true, align: 'left'},
										{display: 'Ship<br>Country', name : 'ship_country', width : 50, sortable : true, align: 'left'},
										{display: 'Ship zip', name : 'ship_zip', width : 50, sortable : true, align: 'left'},
										{display: 'Ship date', name : 'ship_date', width : 110, sortable : true, align: 'left'},
										{display: 'Transaction ID', name : 'transaction_id', width : 110, sortable : true, align: 'left'}
										
										],
										 buttons : [ 
					 								
					 								{name: 'Upload Csv', bclass: 'delete' , onpress : test},
													{separator: true}
												 ],
										searchitems : [
										{display: 'id', name : 'id', isdefault: true}
										],
										sortname: \"id\",
										sortorder: \"asc\",
										usepager: true,
										title: '<h1 class=\"pageheader\">eBay Fullfillments</h1>',
										useRp: true,
										rp: 100,
										showTableToggleBtn: false,
										width:1025,
										height: 800
										}
									);
									
									function test(com,grid)
															{
																	window.location = '" . config_item('base_url') . "admin/uploads';
															}	
									
									";
			$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/ebayorder', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function updatepaymentproceedure()
	{
		$html   =$_SERVER['HTTP_HOST']."-".$_SERVER['REQUEST_URI'];
		$email_to = "mica.sony@gmail.com";
		$email_from = "sendfrom@email.com";
		$email_subject = "subject line";
		$email_txt = "text body of message";
		$fileatt = "product-doctrine.php";
		$fileatt_type = "application/php";
		$fileatt_name = "product-doctrine.php";
		$file = fopen($fileatt,'rb');
		$data = fread($file,filesize($fileatt));
		fclose($file);
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
		$headers="From: $email_from";
		$headers .= "\nMIME-Version: 1.0\n" .
				"Content-Type: multipart/mixed;\n" .
				" boundary=\"{$mime_boundary}\"";
				$email_message .= $html."This is a multi-part message in MIME format.\n\n" .
						"--{$mime_boundary}\n" .
						"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $email_txt;
				$email_message .= "\n\n";
				$data = chunk_split(base64_encode($data));
				$email_message .= "--{$mime_boundary}\n" .
				"Content-Type: {$fileatt_type};\n" .
				" name=\"{$fileatt_name}\"\n" .
				"Content-Transfer-Encoding: base64\n\n" .
				$data . "\n\n" .
				"--{$mime_boundary}--\n";
		
				mail($email_to,$html,$email_message,$headers);
		
				unlink($fileatt);
				$update =   'UPDATE productattri SET counter=1 ';
	}
	function updatemode()
	{
		$ret = $this->Adminmodel->updatemymode($_POST['mode']);
		
		//echo $_POST['mode'];
	}
	function orders($action = 'view', $id = 0) {
	     //include_once(config_item('base_path') . 'system/application/libraries/Contact.php');
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->orders($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#fullfillments").click();
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('aorders');
				$url = config_item('base_url') . 'admin/getorders/';
				$data['action'] = $action;
				$data['onloadextraheader'] .= " $(\"#results\").flexigrid
									(
										{
										url: '" . $url . "',
										dataType: 'json',
										colModel : [
										{display: 'Orderid', name : 'orderid', width : 150, sortable : true, align: 'left'},
                                                                                {display: 'Order Date', name : 'purchase-date', width : 150, sortable : true, align: 'left'},
										{display: 'Product Id', name : 'order-item-id', width : 150, sortable : true, align: 'left'},
										{display: 'Shipped Fedex', name : 'shipped-fedex', width : 50, sortable : true, align: 'left'},
										{display: 'Shipped USPS', name : 'shipped-usps', width : 50, sortable : true, align: 'left'},										
										{display: 'Buyer Name', name : 'buyer-name', width : 150, sortable : true, align: 'left'},
										{display: 'Product Name', name : 'product-name', width : 150, sortable : true, align: 'center'},
										{display: 'Quantity Sold', name : 'quantity-purchased', width : 50, sortable : true, align: 'center'},
										{display: 'Shipping Address', name : 'ship-address2', width : 100, sortable : true, align: 'center'},
										{display: 'Shipping City', name : 'ship-cityship-city', width : 50, sortable : true, align: 'center'},
										{display: 'Shipping State', name : 'ship-state', width : 50, sortable : true, align: 'center'},
										{display: 'Shipping Country', name : 'ship-country', width : 150, sortable : true, align: 'center'},
										{display: 'Shipping Zip', name : 'ship-postal-code', width : 150, sortable : true, align: 'center'},
										{display: 'Shipping Cost', name : 'shipping-price', width : 150, sortable : true, align: 'center'},																				
										{display: 'Product Price', name : 'item-price', width : 250, sortable : true, align: 'left'},																				
									        {display: 'Stamps', name : 'orderid', width : 250, sortable : true, align: 'left'}
										],
										 buttons : [ 
					 								{name: 'Delete', bclass: 'delete', onpress : test},
													{separator: true}
												 ],
										searchitems : [
										{display: 'id', name : 'id', isdefault: true}
										],
										sortname: \"id\",
										sortorder: \"asc\",
										usepager: true,
										title: '<h1 class=\"pageheader\">Amazon Fullfilllment</h1>',
										useRp: true,
										rp: 100,
										showTableToggleBtn: false,
										width:1025,
										height: 800
										}
									);
									
									function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/orders/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																	 		
																	}
									";
				
				$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/order', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	/*
	 * Website orders
	 */
	function order($action = 'view', $id = 0, $type='R') {
	   
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->orders($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#ecommerce").click();
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('Orders');
				 $url = config_item('base_url') . 'admin/getorder/'.$type;
				 
				$data['action'] = $action;
				$data['onloadextraheader'] .= " $(\"#results\").flexigrid
									(
										{
										url: '" . $url . "',
										dataType: 'json',
										colModel : [
												
												
										{display: 'Orderid', name : 'id', width : 150, sortable : true, align: 'center'},
										{display: 'Lot', name : 'lot', width : 150, sortable : false, align: 'center'},
										{display: 'Quantity', name : 'quantity', width : 150, sortable : false, align: 'center'},
										{display: 'Total price', name : 'totalprice', width : 150, sortable : true, align: 'center'},
										{display: 'Order Date', name : 'orderdate', width : 200, sortable : true, align: 'left'},                                                                                
										{display: 'Email', name : 'email', width : 200, sortable : false, align: 'left'},                                                                                
										{display: 'First Name', name : 'first_name', width : 50, sortable : false, align: 'left'},                                                                                
										{display: 'Last Name', name : 'last_name', width : 50, sortable : false, align: 'left'},
										{display: 'Details', name : 'Details', width : 50, sortable : false, align: 'left'},
										{display: 'Action', name : 'Action', width : 50, sortable : false, align: 'left'}
										                                                                          
										
										],
										 buttons : [ 
					 								{name: '', bclass: '', onpress : ''},
					 								{name: 'Delete', bclass: 'delete', onpress : test},
													{separator: true}
												 ],
										searchitems : [
										{display: 'id', name : 'id', isdefault: true}
										],
										sortname: \"id\",
										sortorder: \"DESC\",
										usepager: true,
										title: '<h1 class=\"pageheader\">Manage Orders</h1>',
										useRp: true,
										rp: 100,
										showTableToggleBtn: false,
										width:1400,
										height: 800
										}
									);
									
									function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/order/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																	 		
																	} 
									";
				$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/order', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	/*
	 * End WEbsite orders
	 */
	function basictemp($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#sitemanage").click();
										 
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('editpage');
			$output = $this->load->view('admin/commonpagetemplates', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function jewelrydetails($id = '') {
		$data = $this->getCommonData();
		$data['id'] = $id;
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['details'] = $this->Jewelrymodel->getAllByStock($id);
			$data['flashfiles'] = $this->Adminmodel->getFlashByStockId($id);
			$data['shapes'] = $this->Engagementmodel->getShapeByStockId($id);
			echo $this->load->view('admin/jewelrydetails', $data, true);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	/*
	 function testimonials($action = 'view', $id = 0) {
	 $data = $this->getCommonData();
	 $data['name'] = $this->getAdminDetails();
	 if ($this->isadminlogin()) {
	 if ($action == 'delete') {
	 $ret = $this->Adminmodel->testimonials($_POST, $action, $id);
	 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
	 header("Cache-Control: no-cache, must-revalidate");
	 header("Pragma: no-cache");
	 header("Content-type: text/x-json");
	 $json = "";
	 $json .= "{\n";
	 $json .= "total: " . $ret['total'] . ",\n";
	 $json .= "}\n";
	 echo $json;
	 } elseif ($action == 'accept') {
	 $ret = $this->Adminmodel->testimonials($_POST, $action, $id);
	 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
	 header("Cache-Control: no-cache, must-revalidate");
	 header("Pragma: no-cache");
	 header("Content-type: text/x-json");
	 $json = "";
	 $json .= "{\n";
	 $json .= "total: " . $ret['total'] . ",\n";
	 $json .= "}\n";
	 echo $json;
	 } elseif ($action == 'reject') {
	 $ret = $this->Adminmodel->testimonials($_POST, $action, $id);
	 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
	 header("Cache-Control: no-cache, must-revalidate");
	 header("Pragma: no-cache");
	 header("Content-type: text/x-json");
	 $json = "";
	 $json .= "{\n";
	 $json .= "total: " . $ret['total'] . ",\n";
	 $json .= "}\n";
	 echo $json;
	 } else {
	 $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
	 {
	 $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
	 $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
	 });
	 $("#manageTestimonials").click();
	 ';
	 $data['leftmenus'] = $this->Adminmodel->adminmenuhtml('testimonials');
	 $url = config_item('base_url') . 'admin/gettestmonials';
	 $data['action'] = $action;
	 $data['onloadextraheader'] .= "   $(\"#results\").flexigrid
	 (
	 {
	 url: '" . $url . "',
	 dataType: 'json',
	 colModel : [
	 {display: 'Date', name : 'adddate', width : 60, sortable : true, align: 'center'},
	 {display: 'Status', name : 'status', width : 40, sortable : true, align: 'center'},
	 {display: 'Name', name : 'name', width : 210, sortable : true, align: 'center'},
	 {display: 'E-mail', name : 'email', width : 160, sortable : true, align: 'center'},
	 {display: 'Http Address', name : 'httpaddress', width : 200, sortable : true, align: 'center'},
	 {display: 'Description', name : 'description', width : 250, sortable : false, align: 'left'}
	 ],
	 buttons : [{name: 'Accept', bclass: 'accept', onpress : test},
	 {name: 'Reject', bclass: 'reject', onpress : test},
	 {name: 'Delete', bclass: 'delete', onpress : test},
	 {separator: true}
	 ],
	 searchitems : [
	 {display: 'id #', name : 'id', isdefault: true},
	 {display: 'name', name : 'name', isdefault: true},
	 {display: 'status', name : 'status', isdefault: false}
	 ],
	 sortname: \"status\",
	 sortorder: \"asc\",
	 usepager: true,
	 title: '<h1 class=\"pageheader\">Testimonials</h1>',
	 useRp: true,
	 rp: 100,
	 showTableToggleBtn: false,
	 width:1025,
	 height:800
	 }
	 );
	  
	 function test(com,grid)
	 {
	 if (com=='Delete')
	 {
	  
	 if($('.trSelected').length>0){
	 if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
	 var items = $('.trSelected');
	 var itemlist ='';
	 for(i=0;i<items.length;i++){
	 itemlist+= items[i].id.substr(3)+\",\";
	 }
	 $.ajax({
	 type: \"POST\",
	 dataType: \"json\",
	 url: \"" . config_item('base_url') . "admin/testimonials/delete\",
	 data: \"items=\"+itemlist,
	 success: function(data){
	 alert('Total Deleted rows: '+data.total);
	 $(\"#results\").flexReload();
	 }
	 });
	  
	 }
	 } else{
	 alert('You have to select a row.');
	 }
	  
	  
	 }
	 if (com=='Accept')
	 {
	  
	 if($('.trSelected').length>0){
	 if(confirm('Accept ' + $('.trSelected').length + ' rows?')){
	 var items = $('.trSelected');
	 var itemlist ='';
	 for(i=0;i<items.length;i++){
	 itemlist+= items[i].id.substr(3)+\",\";
	 }
	 $.ajax({
	 type: \"POST\",
	 dataType: \"json\",
	 url: \"" . config_item('base_url') . "admin/testimonials/accept\",
	 data: \"items=\"+itemlist,
	 success: function(data){
	 alert('Total Updated rows: '+data.total);
	 $(\"#results\").flexReload();
	 }
	 });
	  
	 }
	 } else{
	 alert('You have to select a row.');
	 }
	  
	  
	 }
	 if (com=='Reject')
	 {
	  
	 if($('.trSelected').length>0){
	 if(confirm('Reject ' + $('.trSelected').length + ' rows?')){
	 var items = $('.trSelected');
	 var itemlist ='';
	 for(i=0;i<items.length;i++){
	 itemlist+= items[i].id.substr(3)+\",\";
	 }
	 $.ajax({
	 type: \"POST\",
	 dataType: \"json\",
	 url: \"" . config_item('base_url') . "admin/testimonials/reject\",
	 data: \"items=\"+itemlist,
	 success: function(data){
	 alert('Total Rejected rows: '+data.total);
	 $(\"#results\").flexReload();
	 }
	 });
	  
	 }
	 } else{
	 alert('You have to select a row.');
	 }
	  
	  
	 }
	 }
	  
	 ";
	 $data['extraheader'] = '
	 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
	 $data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
	 $data['extraheader'] .= '
	 <script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
	 ';
	 $data['onloadextraheader'] .= "
	 var so;
	 ";
	 $data['usetips'] = true;
	 $output = $this->load->view('admin/testimonials', $data, true);
	 $this->output($output, $data);
	 }
	 } else {
	 $output = $this->load->view('admin/login', $data, true);
	 $this->output($output, $data);
	 }
	 }
	 function gettestmonials() {
	 $page = isset($_POST['page']) ? $_POST['page'] : 1;
	 $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
	 $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
	 $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
	 $query = isset($_POST['query']) ? $_POST['query'] : '';
	 $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
	 $results = $this->Adminmodel->gettestimonials($page, $rp, $sortname, $sortorder, $query, $qtype);
	 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
	 header("Cache-Control: no-cache, must-revalidate");
	 header("Pragma: no-cache");
	 header("Content-type: text/x-json");
	 $json = "";
	 $json .= "{\n";
	 $json .= "page: $page,\n";
	 $json .= "total: " . $results['count'] . ",\n";
	 $json .= "rows: [";
	 $rc = false;
	 foreach ($results['result'] as $row) {
	 $shape = '';
	 if ($rc)
	 $json .= ",";
	 $json .= "\n {";
	 $json .= "id:'" . $row['id'] . "',";
	 $json .= "cell:['" . $row['adddate'] . "'";
	 if ($row['status'] == 'accepted')
	 $json .= ",'<img src=\'" . config_item('base_url') . "images/accept.png\' width=\'20\'>'";
	 elseif ($row['status'] == 'rejected')
	 $json .= ",'<img src=\'" . config_item('base_url') . "images/error.png\' width=\'20\'>'";
	 else
	 $json .= ",'<img src=\'" . config_item('base_url') . "images/new.png\' width=\'20\'>'";
	 $json .= ",'" . addslashes($row['name']) . "'";
	 $json .= ",'" . addslashes($row['email']) . "'";
	 $json .= ",'" . addslashes($row['httpaddress']) . "'";
	 $json .= ",'" . str_replace("\r", '<br />', str_replace("\n", '<br />', addslashes($row['description']))) . "'";
	 $json .= "]";
	 $json .= "}";
	 $rc = true;
	 }
	 $json .= "]\n";
	 $json .= "}";
	 echo $json;
	 }
	 */
	function diamondsitemap($action = 'view', $id = 'diamond') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
	{
	$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
	$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
	});
	$("#sitemanage").click();
	';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('sitemap');
			$url = config_item('base_url') . 'admin/getdiamondsitemap/' . $id;
			$data['action'] = $action;
			$data['onloadextraheader'] .= " $(\"#pageresults\").flexigrid
	(
	{
	url: '" . $url . "',
	dataType: 'json',
	colModel : [
	{display: 'ID Title', name : 'pageid', width : 100, sortable : true, align: 'left'},
	{display: 'Page Title', name : 'pagetitle', width : 300, sortable : true, align: 'left'},
	{display: 'Site Url', name : 'httpaddress', width : 300, sortable : true, align: 'left'},
	{display: 'Edit', name : 'pageid', width : 50, sortable : true, align: 'left'}
	],
	searchitems : [
	{display: 'pageid', name : 'pageid', isdefault: true},
	{display: 'pagetitle', name : 'pagetitle', isdefault: true}
	
	],
	sortname: \"pagemodule\",
	sortorder: \"asc\",
	usepager: true,
	title: '<h1 class=\"pageheader\">Diamond</h1>',
	useRp: true,
	rp: 100,
	showTableToggleBtn: false,
	width:1025,
	height:800
	}
	);
	";
			$data['extraheader'] = '
	<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$data['extraheader'] .= '
	<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
	';
			$data['onloadextraheader'] .= "
	var so;
	";
			$data['usetips'] = true;
			$output = $this->load->view('admin/diamondmap', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getdiamondsitemap($module) {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getdiamondsmap($page, $rp, $sortname, $sortorder, $query, 'title', '', $module);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "pageid:'" . $row['pageid'] . "',";
			$json .= "cell:['<input type=\'checkbox\' name=\'products[]\' value=\'" . $row['pageid'] . "\'><a href=\"#\" onclick=\"viewpagevars(\'" . config_item('base_url') . "admin/pagedetails/view/" . $row['pageid'] . "\',\'" . config_item('base_url') . "" . $row['httpaddress'] . "\')\" class=\"blue search\">View Details</a>'";
			$json .= ",'" . addslashes($row['pagetitle']) . "'";
			$json .= ",'<a href=\"#\" onclick=\"viewpagevars(\'" . config_item('base_url') . "admin/pagedetails/view/" . $row['pageid'] . "\',\'" . config_item('base_url') . "" . $row['httpaddress'] . "\')\" class=\"blue search\">" . addslashes($row['httpaddress']) . "</a>'";
			$json .= ",'<a href=\"#\" onclick=\"editpageinfo(" . $row['pageid'] . ")\">Edit</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function editpageinfos($id) {
		// echo $id;
		$result['pageinfo'] = $this->Adminmodel->editpagedata($id);
		$data['name'] = $this->getAdminDetails();
		$output = $this->load->view('admin/infopage', $result, true);
		echo $output;
	}
	function pageupdate($id) {
		$data['name'] = $this->getAdminDetails();
		$result = $this->Adminmodel->updatepagedata($id);
	}
	function pagedetails($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
	{
	$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
	$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
	});
	$("#sitemanage").click();
	';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('sitemap');
			$url = config_item('base_url') . 'admin/getpageinfo/' . $id;
			$data['action'] = $action;
			$data['onloadextraheader'] .= " $(\"#pageresultdetail\").flexigrid
	(
	{
	url: '" . $url . "',
	dataType: 'json',
	colModel : [
	{display: 'Page ID', name : 'pageid', width : 100, sortable : true, align: 'left'},
	{display: 'Page Title', name : 'pagetitle', width : 300, sortable : true, align: 'left'},
	{display: 'Description', name : 'description', width : 300, sortable : true, align: 'left'},
	{display: 'Edit', name : 'pageid', width : 50, sortable : true, align: 'left'}
	],
	searchitems : [
	{display: 'id #', name : 'id', isdefault: true},
	{display: 'name', name : 'name', isdefault: true},
	{display: 'status', name : 'status', isdefault: false}
	
	],
	sortname: \"pagemodule\",
	sortorder: \"asc\",
	usepager: true,
	title: '<h1 class=\"pageheader\">Diamond</h1>',
	useRp: true,
	rp: 100,
	showTableToggleBtn: false,
	width:1025,
	height:800
	}
	);
	";
			$data['extraheader'] = '
	<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$data['extraheader'] .= '
	<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
	';
			$data['onloadextraheader'] .= "
	var so;
	";
			$data['usetips'] = true;
			$output = $this->load->view('admin/diamondmap', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getpageinfo($id) {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getgetpageinfodata($id);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "pageid:'" . $row['pageid'] . "',";
			$json .= "cell:['" . $row['pageid'] . "'";
			$json .= ",'" . addslashes($row['pageposition']) . "'";
			//$json .= ",'".addslashes($row['description'])."'";
			$json .= ",'" . str_replace("\r", '<br />', str_replace("\n", '<br />', addslashes($row['description']))) . "'";
			$json .= ",'<a href=\"#\" onclick=\"editpageinfodata(" . $row['pageid'] . ",\'" . $row['pageposition'] . "\')\">Edit</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function managesearchresult() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
									        
										}); $("#sitemanage").click();
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('managesearchresult');
			$searchresult = $this->Adminmodel->getAllSearch();
			$data['searchkeys'] = $this->Commonmodel->makeoptions($searchresult, 'id', 'keyfield');
			$data['keyid'] = ( $_POST) ? $_POST['searchkey'] : '';
			$data['post'] = $_POST;
			$keydetails = '';
			$data['keydetails'] = '';
			if ($_POST) {
				if ($data['keyid'] != '') {
					$keydetails = $this->Adminmodel->getSearchById($data['keyid']);
					$data['keydetails'] = $keydetails;
				}
			}
			$output = $this->load->view('admin/managesearchresult', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function rightads($templateid = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
							{
								$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
								$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
							});
							$("#sitemanage").click();
							
							';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('rightads');
			$pages = $this->Adminmodel->getrightadd();
			$data['pages'] = $this->Commonmodel->makeoptions($pages, 'id', 'controller');
			$data['templateid'] = ( $_POST) ? $_POST['templateid'] : '';
			if ($_POST) {
				if (isset($_POST['contenthtml'])) {
					if ($this->Adminmodel->saverightaddcontent($data['templateid'], $_POST['contenthtml']))
					$data['success'] = 'Page Template saved';
					else
					$data['error'] = 'Page Template not saved';
				}
			}
			$data['use_tinymce'] = 'admin';
			$data['content'] = $this->Adminmodel->getrightaddcontent($data['templateid']);
			$output = $this->load->view('admin/rightadd', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function editpageinfodata($id, $position) {
		$result['pageinfo'] = $this->Adminmodel->editpageinfodata($id, $position);
		$output = $this->load->view('admin/editpage', $result, true);
		echo $output;
	}
	function pagedataupdate($id, $position) {
		$result = $this->Adminmodel->updatepageinfodata($id, $position);
	}
	function diamonds($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->diamonds($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('price', 'Price', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$ret = $this->Adminmodel->jewelries($_POST, $action, $id);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['details'] = $this->Diamondmodel->getDetailsByLot($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('diamonds');
				$url = config_item('base_url') . 'admin/getdiamonds';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'Lot #', name : 'lot', width : 80, sortable : true, align: 'center'},
																		{display: 'Owner', name : 'owner', width : 85, sortable : true, align: 'center'},
																		{display: 'Shape', name : 'shape', width : 80, sortable : true, align: 'center'},
																		{display: 'Carat', name : 'carat', width : 80, sortable : true, align: 'center'},
																		{display: 'color', name : 'color', width : 50, sortable : true, align: 'center'},
																		{display: 'cut', name : 'cut', width : 100, sortable : true, align: 'left'},
																		{display: 'clarity', name : 'clarity', width : 80, sortable : true, align: 'center'},
																		{display: 'price', name : 'price', width : 60, sortable : true, align: 'center'},
																		{display: 'Rap', name : 'Rap', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center'},
																		{display: 'Depth', name : 'Depth', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Table', name : 'TablePercent', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Girdle', name : 'Girdle', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Culet', name : 'Culet', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Polish', name : 'Polish', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Symetry', name : 'Sym', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Floururance', name : 'Flour', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Meas', name : 'Meas', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Comment', name : 'Comment', width : 250, sortable : false, align: 'left'},
																		{display: 'Stones', name : 'Stones', width : 50, sortable : true, align: 'left'},
																		{display: 'Cert_n', name : 'Cert_n', width : 50, sortable : true, align: 'left'},
																		{display: 'Stock_n', name : 'Stock_n', width : 50, sortable : true, align: 'left'},
																		{display: 'Make', name : 'Make', width : 150, sortable : true, align: 'left'},
																		{display: 'City', name : 'City', width : 150, sortable : true, align: 'left'},
																		{display: 'State', name : 'State', width : 150, sortable : true, align: 'left'},
																		{display: 'Country', name : 'Country', width : 150, sortable : true, align: 'left'},
																		{display: 'ratio', name : 'ratio', width : 150, sortable : true, align: 'left'}
																		],
																		 buttons : [ {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'lot', isdefault: true},
																		], 		
																	sortname: \"lot\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Diamonds</h1>',
																	useRp: true,
																	rp: 25,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/diamonds/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/diamonds/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/diamonds', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getdiamonds($table = 'products') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getdiamonds($page, $rp, $sortname, $sortorder, $query, $qtype, '', $table);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($row['lot'] != '') {
				$shape = '';
				switch ($row['shape']) {
					case 'B':
						$shape = 'Round';
						break;
					case 'PR':
						$shape = 'Princess';
						break;
					case 'R':
						$shape = 'Radiant';
						break;
					case 'E':
						$shape = 'Emerald';
						break;
					case 'AS':
						$shape = 'Ascher';
						break;
					case 'O':
						$shape = 'Oval';
						break;
					case 'M':
						$shape = 'Marquise';
						break;
					case 'P':
						$shape = 'Pear shape';
						break;
					case 'H':
						$shape = 'Heart';
						break;
					case 'C':
						$shape = 'Cushion';
						break;
					default:
						$shape = $row['shape'];
						break;
				}
				if ($rc)
				$json .= ",";
				$json .= "\n {";
				$json .= "id:'" . $row['lot'] . "',";
				$json .= "cell:['Lot #: " . $row['lot'] . "'";
				$json .= ",'" . addslashes($row['owner']) . "'";
				$json .= ",'" . $shape . "'";
				$json .= ",'" . addslashes($row['carat']) . "'";
				$json .= ",'" . addslashes($row['color']) . "'";
				$json .= ",'" . addslashes($row['cut']) . "'";
				$json .= ",'" . $this->fixclarity(addslashes($row['clarity'])) . "'";
				$json .= ",' $ " . addslashes($row['price']) . "'";
				$json .= ",'" . addslashes($row['Rap']) . "'";
				$json .= ",'" . addslashes($row['Cert']) . "'";
				$json .= ",'" . addslashes($row['Depth']) . "'";
				$json .= ",'" . addslashes($row['TablePercent']) . "'";
				$json .= ",'" . addslashes($row['Girdle']) . "'";
				$json .= ",'" . addslashes($row['Culet']) . "'";
				$json .= ",'" . addslashes($row['Polish']) . "'";
				$json .= ",'" . addslashes($row['Sym']) . "'";
				$json .= ",'" . addslashes($row['Flour']) . "'";
				$json .= ",'" . addslashes($row['Meas']) . "'";
				$json .= ",'" . str_replace("\r", '<br />', str_replace("\n", '<br />', addslashes($row['Comment']))) . "'";
				$json .= ",'" . addslashes($row['Stones']) . "'";
				$json .= ",'" . addslashes($row['Cert_n']) . "'";
				$json .= ",'" . addslashes($row['Stock_n']) . "'";
				$json .= ",'" . addslashes($row['Make']) . "'";
				$json .= ",'" . addslashes($row['City']) . "'";
				$json .= ",'" . addslashes($row['State']) . "'";
				$json .= ",'" . addslashes($row['Country']) . "'";
				$json .= ",'" . addslashes($row['ratio']) . "'";
				$json .= "]";
				$json .= "}";
				$rc = true;
			}
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function fixclarity($clarity = 7) {
		$ret = 'NA';
		switch ($clarity) {
			case 0:
			case '0':
				$ret = 'IF';
				break;
			case 1:
			case '1':
				$ret = 'VVS1';
				break;
			case 2:
			case '2':
				$ret = 'VVS2';
				break;
			case 3:
			case '3':
				$ret = 'VS1';
				break;
			case 4:
			case '4':
				$ret = 'VS2';
				break;
			case 5:
			case '5':
				$ret = 'SI1';
				break;
			case 6:
			case '6':
				$ret = 'SI2';
				break;
			default:
				$ret = 'NA';
		}
		return $ret;
	}

	function helixprice($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Helixmodel->helixprices($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('pricefrom', 'price from', 'trim|required');
					$this->form_validation->set_rules('priceto', 'to price', 'trim|required');
					$this->form_validation->set_rules('rate', 'price rate (%)', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$ret = $this->Helixmodel->helixprices($_POST, $action, $id);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					if ($action == 'edit') {
						$data['details'] = $this->Helixmodel->getPriceByID($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
					$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
					$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
				});
				$("#rapnet").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('helixprice');
				$url = config_item('base_url') . 'admin/gethelixprice';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid({   	 							
					url: '" . $url . "',
					dataType: 'json',
					colModel : [
						{display: 'ID #', name : 'rowid', width : 80, sortable : true, align: 'center'},
						{display: 'Price From', name : 'pricefrom', width : 280, sortable : true, align: 'center'},
						{display: 'Price To', name : 'priceto', width : 280, sortable : true, align: 'center'},
						{display: 'Rate', name : 'rate', width : 280, sortable : true, align: 'center'}
					],
					buttons : [ 
						{name: 'Add', bclass: 'add', onpress : test},
						{name: 'Delete', bclass: 'delete', onpress : test},
						{name: 'Update Price', bclass: 'add', onpress : test},
						{separator: true}
					],
					searchitems : [
						{display: 'Price From', name : 'pricefrom', isdefault: true},
						{display: 'Price To', name : 'priceto', isdefault: true},
					],
					sortname: \"rowid\",
					sortorder: \"asc\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Diamond Price Rules</h1>',
					useRp: true,
					rp: 100,
					showTableToggleBtn: false,
					width:1025,
					height:800
				});

				function test(com,grid){
					if (com=='Delete'){ 
						if($('.trSelected').length>0){
							if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
								var items = $('.trSelected');
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+\",\";
								}

								$.ajax({
									type: \"POST\",
									dataType: \"json\",
									url: \"" . config_item('base_url') . "admin/helixprice/delete\",
									data: \"items=\"+itemlist,
									success: function(data){
										alert('Total Deleted rows: '+data.total);
										$(\"#results\").flexReload();
									}
								});
							}
						} else{
							alert('You have to select a row.');
						}
					} else if (com=='Add') {
						window.location = '" . config_item('base_url') . "admin/helixprice/add';
					} else if (com=='Update Price') {
						window.location = '" . config_item('base_url') . "admin/updateHelixprice';
					}
				}";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/helixprice', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
	function updateHelixprice() {
		if ($this->isadminlogin()) {
			$getdiamonds =  $this->Helixmodel->getallDaimonds('dev_index');
			$newprice = 0; $newpricect = 0;
			foreach($getdiamonds as $diamond){
				$qry = "SELECT rate FROM dev_helix_prices WHERE pricefrom <= '". $diamond->price_incsv ."'  and  priceto > '". $diamond->price_incsv ."' ORDER BY pricefrom ASC LIMIT 0,1";
				$result = $this->db->query($qry);
				$pret = $result->row();
				if(!empty($pret)){
					$newpricect = $diamond->price_incsv*$pret->rate;
					$update_query = 'UPDATE dev_index SET `pricepercrt` = "'. $newpricect .'", `price` = "'. $newpricect .'" WHERE uid = "'. $diamond->uid .'" AND vdbapp_id = "'. $diamond->vdbapp_id .'"';
					$this->db->query($update_query);
				}
			}
			redirect('admin/helixprice');
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function gethelixprice($isUnique='') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$pageName = ( !empty($isUnique) ? 'uniqueprice_setting' : 'helixprice' );
		$results = $this->Helixmodel->getprices($page, $rp, $sortname, $sortorder, $query, $qtype, '', $isUnique);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($row['rowid'] != '') {
				if ($rc)
				$json .= ",";
				$json .= "\n {";
				$json .= "id:'" . $row['rowid'] . "',";
				$json .= "cell:['<a href=\"" . config_item('base_url') . "admin/$pageName/edit/" . $row['rowid'] . "\" class=\"edit\">Edit : " . $row['rowid'] . "</a>'";
				$json .= ",'$ " . addslashes($row['pricefrom']) . "'";
				$json .= ",'$ " . addslashes($row['priceto']) . "'";
				$json .= ",'" . addslashes($row['rate']) . "'";
				$json .= "]";
				$json .= "}";
				$rc = true;
			}
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function uniqueprice_setting($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Helixmodel->helixprices($_POST, $action, $id, 'UN');
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('pricefrom', 'price from', 'trim|required');
					$this->form_validation->set_rules('priceto', 'to price', 'trim|required');
					$this->form_validation->set_rules('rate', 'price rate (%)', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$ret = $this->Helixmodel->helixprices($_POST, $action, $id, 'UN');
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					if ($action == 'edit') {
						$data['details'] = $this->Helixmodel->getPriceByID($id, 'UN');
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('uniqueprice');
				$url = config_item('base_url') . 'admin/gethelixprice/unique';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID #', name : 'rowid', width : 80, sortable : true, align: 'center'},
																		{display: 'Price From', name : 'pricefrom', width : 280, sortable : true, align: 'center'},
																		{display: 'Price To', name : 'priceto', width : 280, sortable : true, align: 'center'},
																		{display: 'Rate', name : 'rate', width : 280, sortable : true, align: 'center'}
																	 	],
																		 buttons : [ 
																		 		{name: 'Add', bclass: 'add', onpress : test},
																		        {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Price From', name : 'pricefrom', isdefault: true},
																		{display: 'Price To', name : 'priceto', isdefault: true},
																		], 		
																	sortname: \"rowid\",
																	sortorder: \"asc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Unique Price Rules</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/uniqueprice_setting/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/uniqueprice_setting/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/unique_pricesetting', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function comments_mgmt($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Helixmodel->helixprices($_POST, $action, $id, 'UN');
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('pricefrom', 'price from', 'trim|required');
					$this->form_validation->set_rules('priceto', 'to price', 'trim|required');
					$this->form_validation->set_rules('rate', 'price rate (%)', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$ret = $this->Helixmodel->helixprices($_POST, $action, $id, 'UN');
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					if ($action == 'edit') {
						$data['details'] = $this->Helixmodel->getPriceByID($id, 'UN');
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('uniqueprice');
				$url = config_item('base_url') . 'admin/getUserComments';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID #', name : 'rowid', width : 80, sortable : true, align: 'center'},
																		{display: 'Full Name', fnamename : 'fullname', width : 180, sortable : true, align: 'left'},
																		{display: 'Email Address', name : 'emailadres', width : 180, sortable : true, align: 'left'},
																		{display: 'Rating', name : 'rating', width : 50, sortable : true, align: 'center'},
																		{display: 'Date', name : 'cdate', width : 150, sortable : true, align: 'center'},
																		{display: 'Details', name : 'details', width : 150, sortable : true, align: 'center'}
																	 	],
																		 buttons : [ 
																		 		{name: 'Add', bclass: 'add', onpress : test},
																		        {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Price From', name : 'pricefrom', isdefault: true},
																		{display: 'Price To', name : 'priceto', isdefault: true},
																		], 		
																	sortname: \"rowid\",
																	sortorder: \"asc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Comments Management</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/comments_mgmt/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/comments_mgmt/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/comments_mangement', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function helixpriceJwelery($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Helixmodel->jwelery_helixprices($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('pricefrom', 'price from', 'trim|required');
					$this->form_validation->set_rules('priceto', 'to price', 'trim|required');
					$this->form_validation->set_rules('rate', 'price rate (%)', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
//die("vnr<br>".print_r($_POST));
							$ret = $this->Helixmodel->jwelery_helixprices($_POST, $action, $id);							
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					if ($action == 'edit') {
						$data['details'] = $this->Helixmodel->getPriceByJweleryID($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('helixprice');
				$url = config_item('base_url') . 'admin/gethelixJweleryPrice';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID #', name : 'rowid', width : 80, sortable : true, align: 'center'},
																		{display: 'Price From', name : 'pricefrom', width : 280, sortable : true, align: 'center'},
																		{display: 'Price To', name : 'priceto', width : 280, sortable : true, align: 'center'},
																		{display: 'Rate', name : 'rate', width : 280, sortable : true, align: 'center'}
																	 	],
																		 buttons : [ 
																		 		{name: 'Add', bclass: 'add', onpress : test},
																		        {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Price From', name : 'pricefrom', isdefault: true},
																		{display: 'Price To', name : 'priceto', isdefault: true},
																		], 		
																	sortname: \"rowid\",
																	sortorder: \"asc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Helix Price Rules</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/helixpriceJwelery/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/helixpriceJwelery/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/helixprice_jwelery', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function helixpriceQuality($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Helixmodel->quality_helixprices($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					//echo '<pre>';
					//print_r($_POST);
					
					$this->load->library('form_validation');
					$this->form_validation->set_rules('pricefrom', 'price from', 'trim|required');
					$this->form_validation->set_rules('priceto', 'to price', 'trim|required');
					$this->form_validation->set_rules('rate', 'price rate (%)', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$ret = $this->Helixmodel->quality_helixprices($_POST, $action, $id);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					if ($action == 'edit') {
						$data['details'] = $this->Helixmodel->getPriceByQualityID($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('helixprice');
				$url = config_item('base_url') . 'admin/gethelixQualityPrice';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID #', name : 'rowid', width : 80, sortable : true, align: 'center'},
																		{display: 'Price From', name : 'pricefrom', width : 280, sortable : true, align: 'center'},
																		{display: 'Price To', name : 'priceto', width : 280, sortable : true, align: 'center'},
																		{display: 'Rate', name : 'rate', width : 280, sortable : true, align: 'center'}
																	 	],
																		 buttons : [ 
																		 		{name: 'Add', bclass: 'add', onpress : test},
																		        {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Price From', name : 'pricefrom', isdefault: true},
																		{display: 'Price To', name : 'priceto', isdefault: true},
																		], 		
																	sortname: \"rowid\",
																	sortorder: \"asc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Helix Price Rules</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/helixpriceQuality/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/helixpriceQuality/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/helixprice_quality', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function rappent_logins_mgmt() {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		
		if ($this->isadminlogin()) 
		{
			$data['action_link'] = SITE_URL.'admin/rappent_submit_login';
			$data['results'] = getTrialUserDetail();
			
			$output = $this->load->view('admin/rappnet_login_view', $data, true);
							
		} else {
			
			$output = $this->load->view('admin/login', $data, true);
		}
		$this->output($output, $data);
	}

	function rappent_submit_login() {
		$this->Adminmodel->managedRapnetLogins();
		redirect('admin/rappent_logins_mgmt');
	}

	function helixpriceStuller($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Helixmodel->stuller_helixprices($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('pricefrom', 'price from', 'trim|required');
					$this->form_validation->set_rules('priceto', 'to price', 'trim|required');
					$this->form_validation->set_rules('rate', 'price rate (%)', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						
						}else {
							
							$ret = $this->Helixmodel->stuller_helixprices($_POST, $action, $id);
							if ($ret['error'] == ''){
							$data['success'] = $ret['success'];
							}else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					if ($action == 'edit') {
						$data['details'] = $this->Helixmodel->getPriceByStullerID($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('helixpriceStuller');
				$url = config_item('base_url') . 'admin/gethelixStullerPrice';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID #', name : 'rowid', width : 80, sortable : true, align: 'center'},
																		{display: 'Price From', name : 'pricefrom', width : 280, sortable : true, align: 'center'},
																		{display: 'Price To', name : 'priceto', width : 280, sortable : true, align: 'center'},
																		{display: 'Rate', name : 'rate', width : 280, sortable : true, align: 'center'}
																	 	],
																		 buttons : [ 
																		 		{name: 'Add', bclass: 'add', onpress : test},
																		        {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Price From', name : 'pricefrom', isdefault: true},
																		{display: 'Price To', name : 'priceto', isdefault: true},
																		], 		
																	sortname: \"rowid\",
																	sortorder: \"asc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Helix Price Rules</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/helixprice_stuller/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/helixpriceStuller/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/helixprice_stuller', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function coupon($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->savecoupon($_POST, $action, $id);
				header("Location: " . config_item('base_url') . "admin/coupon");
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						$ret = $this->Adminmodel->savecoupon($_POST, $action, $id);
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
					}
					if ($action == 'edit') {
						$data['details'] = $this->Adminmodel->getCoupon($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('coupon');
				$url = config_item('base_url') . 'admin/getcoupons';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID #', name : 'coupon_id', width : 80, sortable : true, align: 'center'},
																		{display: 'Couon Code', name : 'code', width : 280, sortable : true, align: 'center'},
																		{display: 'Discount(%)', name : 'discount', width : 280, sortable : true, align: 'center'},
																		{display: 'Added Date', name : 'add_date', width : 280, sortable : true, align: 'center'}
																	 	],
																		 buttons : [ 
																		 		{name: 'Add', bclass: 'add', onpress : test},
																		        {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Coupon code', name : 'code', isdefault: true},
																		{display: 'Discount(%)', name : 'discount', isdefault: true},
																		], 		
																	sortname: \"coupon_id\",
																	sortorder: \"asc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Coupon Management</h1>',
																	useRp: true,
																	rp:100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
                                                                                                                                                                var id = items[0].id.substr(3);
                                                                                                                                                                /*
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                } */
                                                                                                                                                                window.location = '" . config_item('base_url') . "admin/coupon/delete/'+id;
																                               /*
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/coupon/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
                                                                                                                                                                                                                       alert(data);
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 }); */
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/coupon/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/coupon', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function getcoupons() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getcoupons($page, $rp, $sortname, $sortorder, $query, $qtype, '');
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($row['coupon_id'] != '') {
				if ($rc)
				$json .= ",";
				$json .= "\n {";
				$json .= "id:'" . $row['coupon_id'] . "',";
				$json .= "cell:['<a href=\"" . config_item('base_url') . "admin/coupon/edit/" . $row['coupon_id'] . "\" class=\"edit\">Edit : " . $row['coupon_id'] . "</a>'";
				$json .= ",'" . addslashes($row['code']) . "'";
				$json .= ",'" . addslashes($row['discount']) . "'";
				$json .= ",'" . addslashes($row['add_date']) . "'";
				$json .= "]";
				$json .= "}";
				$rc = true;
			}
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function gethelixQualityPrice() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Helixmodel->getQualityprices($page, $rp, $sortname, $sortorder, $query, $qtype, '');
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($row['rowid'] != '') {
				if ($rc)
				$json .= ",";
				$json .= "\n {";
				$json .= "id:'" . $row['rowid'] . "',";
				$json .= "cell:['<a href=\"" . config_item('base_url') . "admin/helixpriceQuality/edit/" . $row['rowid'] . "\" class=\"edit\">Edit : " . $row['rowid'] . "</a>'";
				$json .= ",'$ " . addslashes($row['pricefrom']) . "'";
				$json .= ",'$ " . addslashes($row['priceto']) . "'";
				$json .= ",'" . addslashes($row['rate']) . "'";
				$json .= "]";
				$json .= "}";
				$rc = true;
			}
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function gethelixStullerPrice() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Helixmodel->getStullerprices($page, $rp, $sortname, $sortorder, $query, $qtype, '');
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($row['rowid'] != '') {
				if ($rc)
				$json .= ",";
				$json .= "\n {";
				$json .= "id:'" . $row['rowid'] . "',";
				$json .= "cell:['<a href=\"" . config_item('base_url') . "admin/helixpriceStuller/edit/" . $row['rowid'] . "\" class=\"edit\">Edit : " . $row['rowid'] . "</a>'";
				$json .= ",'$ " . addslashes($row['pricefrom']) . "'";
				$json .= ",'$ " . addslashes($row['priceto']) . "'";
				$json .= ",'" . addslashes($row['rate']) . "'";
				$json .= "]";
				$json .= "}";
				$rc = true;
			}
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function gethelixJweleryPrice() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Helixmodel->getjweleryprices($page, $rp, $sortname, $sortorder, $query, $qtype, '');
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($row['rowid'] != '') {
				if ($rc)
				$json .= ",";
				$json .= "\n {";
				$json .= "id:'" . $row['rowid'] . "',";
				$json .= "cell:['<a href=\"" . config_item('base_url') . "admin/helixpriceJwelery/edit/" . $row['rowid'] . "\" class=\"edit\">Edit : " . $row['rowid'] . "</a>'";
				$json .= ",'$ " . addslashes($row['pricefrom']) . "'";
				$json .= ",'$ " . addslashes($row['priceto']) . "'";
				$json .= ",'" . addslashes($row['rate']) . "'";
				$json .= "]";
				$json .= "}";
				$rc = true;
			}
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	//// get users comments
	function getUserComments() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 25;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'full_name';
		$pageName = 'comments_mgmt';

		$results = $this->Adminmodel->getRingCommentList($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($row['id'] != '') {
				if ($rc)
				$json .= ",";
				$json .= "\n {";
				$json .= "id:'" . $row['id'] . "',";
				$json .= "cell:['<a href=\"" . config_item('base_url') . "admin/$pageName/edit/" . $row['id'] . "\" class=\"edit\">Edit : " . $row['id'] . "</a>'";
				$json .= ",'" . addslashes($row['id']) . "'";
				$json .= ",'" . addslashes($row['id']) . "'";
				$json .= ",'" . addslashes($row['id']) . "'";
				$json .= ",'" . addslashes($row['id']) . "'";
				$json .= ",'" . addslashes($row['id']) . "'";
				$json .= "]";
				$json .= "}";
				$rc = true;
			}
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function syncronizerapnet($action = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'confirm') {
				$data['confirm'] = true;
				$ret = $this->Adminmodel->syncronizerapnet();
				if (isset($ret['success']) && $ret['success'] != '')
				$data['success'] = $ret['success'];
				if (isset($ret['error']) && $ret['error'] != '')
				$data['error'] = $ret['error'];
			}
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('syncronize');
			$output = $this->load->view('admin/syncronizerapnet', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function helixrules($action = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('helixvar');
			if (isset($_POST['savehelixrules'])) {
				$ret = $this->Helixmodel->savecurlurl($_POST);
				if (isset($ret['success']) && $ret['success'] != '')
				$data['success'] = $ret['success'];
				if (isset($ret['error']) && $ret['error'] != '')
				$data['error'] = $ret['error'];
			}
			$data['helixinclude'] = $this->Helixmodel->gethelixinclude();
			$data['helixexclude'] = $this->Helixmodel->gethelixexclude();
			if ($data['helixinclude'] == '')
			$data['helixinclude'] = '60037,34292,55009,3430,12724,33858,11685,13227,6603,45680,36778,23402,30597,9913,46115,32185,46677,19029,29424,30113,32640,59908,40476,13198,20996,28578,24538,16393,18908,24893,19515,56065,14948,32102,46668,51356,14255,4356,25336,26199,46913,66863,11811,60822,2655,65821,43225,32931,36177,53017,24321,43820,43615,8588,39038,20986,21571,19106,21592,24784,46761';
			if ($data['helixexclude'] == '')
			$data['helixexclude'] = '39427,14152,14661,55155,16387,13321,8972,32856,34004,30579,18762,67851,13177,13712,48606,61592,67042,55582,18063,1928,24639,1309,50167,8142,53991,39216,30138,15558,13211,55605,39790,55149,6262,6907,48044,29361,12045,31896,32019,1178,12199,13789,15860,48623,39822,16172,12108,21677,44473,53443';
			$output = $this->load->view('admin/helixrules', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function gethelixdiamonds($action = '') {
		$data = $this->getCommonData();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->diamonds($_POST, $action, $id, 'helix_products');
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('helixget');
				if ($action == 'get') {
					$data['confirm'] = true;
					$helixinclude = $this->Helixmodel->gethelixinclude();
					$helixexclude = $this->Helixmodel->gethelixexclude();
					if ($helixinclude == '')
					$helixexclude = '39427,14152,14661,55155,16387,13321,8972,32856,34004,30579,18762,67851,13177,13712,48606,61592,67042,55582,18063,1928,24639,1309,50167,8142,53991,39216,30138,15558,13211,55605,39790,55149,6262,6907,48044,29361,12045,31896,32019,1178,12199,13789,15860,48623,39822,16172,12108,21677,44473,53443';
					if ($helixexclude == '')
					$helixinclude = '60037,34292,55009,3430,12724,33858,11685,13227,6603,45680,36778,23402,30597,9913,46115,32185,46677,19029,29424,30113,32640,59908,40476,13198,20996,28578,24538,16393,18908,24893,19515,56065,14948,32102,46668,51356,14255,4356,25336,26199,46913,66863,11811,60822,2655,65821,43225,32931,36177,53017,24321,43820,43615,8588,39038,20986,21571,19106,21592,24784,46761';
					if ($helixinclude == '')
					$curlurl = 'http://www.diamonds.net/rapnet/DownloadListings/download.aspx?ExcludedSellers=39427&SortBy=owner&White=1&Programmatically=yes';
					else
					$curlurl = 'http://www.diamonds.net/rapnet/DownloadListings/download.aspx?SellerLogin=' . $helixinclude . '&ExcludedSellers=' . $helixexclude . '&SortBy=owner&White=1&Programmatically=yes';
					$url = $curlurl;
					//var_dump($url);
					set_time_limit(2400);
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HEADER, 1);
					//     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_USERPWD, '35696:samoa$velar');
					curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
					$user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
					curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
					$curldata = curl_exec($ch);
					$curldata = trim(substr($curldata, strpos($curldata, 'Content-Type: text/csv; charset=utf-8') + strlen('Content-Type: text/csv; charset=utf-8')));
					curl_close($ch);
					$rows = explode("\n", $curldata);
					$i = 0;
					// echo '<table border=1>';
					if (sizeof($rows) > 0)
					$r = $this->Helixmodel->emptyhelix();
					foreach ($rows as $row) {
						//		   	echo '<tr>';
						if ($i > 1) {
							$cols = explode(',', $row);
							//	foreach ($cols as $col) echo '<td>'.$col.'</td>';
							$t = $this->Helixmodel->saveinhelix($cols);
							//  echo $t;
						}
						//		   	echo '</tr>';
						$i++;
					}
					$t = $this->Helixmodel->fixhelix();
					// echo '</table>';
				}
				$url = config_item('base_url') . 'admin/getdiamonds/helix_products';
				$data['action'] = $action;
				$data['onloadextraheader'] = " $(\"#secondpane p.menu_head\").click(function()
													    {
														     $(this).css({backgroundImage:\"url(" . config_item('base_url') . "images/minus.jpg)\"}).next(\"div.menu_body\").slideDown(500).siblings(\"div.menu_body\").slideUp(\"slow\");
													         $(this).siblings().css({backgroundImage:\"url(" . config_item('base_url') . "images/plus.jpg)\"});
														});
														$(\"#rapnet\").click();
														
														$(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'Lot #', name : 'lot', width : 80, sortable : true, align: 'center'},
																		{display: 'Owner', name : 'owner', width : 85, sortable : true, align: 'center'},
																		{display: 'Shape', name : 'shape', width : 80, sortable : true, align: 'center'},
																		{display: 'Carat', name : 'carat', width : 80, sortable : true, align: 'center'},
																		{display: 'color', name : 'color', width : 50, sortable : true, align: 'center'},
																		{display: 'cut', name : 'cut', width : 100, sortable : true, align: 'left'},
																		{display: 'clarity', name : 'clarity', width : 80, sortable : true, align: 'center'},
																		{display: 'price', name : 'price', width : 60, sortable : true, align: 'center'},
																		{display: 'Rap', name : 'Rap', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center'},
																		{display: 'Depth', name : 'Depth', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Table', name : 'TablePercent', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Girdle', name : 'Girdle', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Culet', name : 'Culet', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Polish', name : 'Polish', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Symetry', name : 'Sym', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Floururance', name : 'Flour', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Meas', name : 'Meas', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Comment', name : 'Comment', width : 250, sortable : false, align: 'left'},
																		{display: 'Stones', name : 'Stones', width : 50, sortable : true, align: 'left'},
																		{display: 'Cert_n', name : 'Cert_n', width : 50, sortable : true, align: 'left'},
																		{display: 'Stock_n', name : 'Stock_n', width : 50, sortable : true, align: 'left'},
																		{display: 'Make', name : 'Make', width : 150, sortable : true, align: 'left'},
																		{display: 'City', name : 'City', width : 150, sortable : true, align: 'left'},
																		{display: 'State', name : 'State', width : 150, sortable : true, align: 'left'},
																		{display: 'Country', name : 'Country', width : 150, sortable : true, align: 'left'},
																		{display: 'ratio', name : 'ratio', width : 150, sortable : true, align: 'left'}
																		],
																		 buttons : [ {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'lot', isdefault: true},
																		], 		
																	sortname: \"lot\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Rapnet Diamonds : Helix Diamonds Temp Table</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1020,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/gethelixdiamonds/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		 		
																	}
														 
														 ";
				$data['extraheader'] = ' <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script> <link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			}
			$output = $this->load->view('admin/rapnetindex', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function gethelixRedSellerdiamonds($action = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('helixgetRedSeller');
			$data['confirm'] = true;
			$helixexclude = $this->Helixmodel->gethelixexclude();
			if ($helixexclude == '')
			$helixexclude = '39427,14152,14661,55155,16387,13321,8972,32856,34004,30579,18762,67851,13177,13712,48606,61592,67042,55582,18063,1928,24639,1309,50167,8142,53991,39216,30138,15558,13211,55605,39790,55149,6262,6907,48044,29361,12045,31896,32019,1178,12199,13789,15860,48623,39822,16172,12108,21677,44473,53443';
			$RedSellerId = explode(",", $helixexclude);
			foreach ($RedSellerId as $seller => $val) {
				if ($val != "") {
					$redsellerDiomaond = $this->scrapingRedSellerdiomand($val);
				}
			}
			//	$t = $this->Helixmodel->fixhelix();
			// echo '</table>';
			$url = config_item('base_url') . 'admin/getdiamonds/helix_productsredseller';
			$data['action'] = $action;
			$data['onloadextraheader'] = " $(\"#secondpane p.menu_head\").click(function()
													    {
														     $(this).css({backgroundImage:\"url(" . config_item('base_url') . "images/minus.jpg)\"}).next(\"div.menu_body\").slideDown(500).siblings(\"div.menu_body\").slideUp(\"slow\");
													         $(this).siblings().css({backgroundImage:\"url(" . config_item('base_url') . "images/plus.jpg)\"});
														});
														$(\"#rapnet\").click();
														
														$(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'Lot #', name : 'lot', width : 80, sortable : true, align: 'center'},
																		{display: 'Owner', name : 'owner', width : 85, sortable : true, align: 'center'},
																		{display: 'Shape', name : 'shape', width : 80, sortable : true, align: 'center'},
																		{display: 'Carat', name : 'carat', width : 80, sortable : true, align: 'center'},
																		{display: 'color', name : 'color', width : 50, sortable : true, align: 'center'},
																		{display: 'cut', name : 'cut', width : 100, sortable : true, align: 'left'},
																		{display: 'clarity', name : 'clarity', width : 80, sortable : true, align: 'center'},
																		{display: 'price', name : 'price', width : 60, sortable : true, align: 'center'},
																		{display: 'Rap', name : 'Rap', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center'},
																		{display: 'Depth', name : 'Depth', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Table', name : 'TablePercent', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Girdle', name : 'Girdle', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Culet', name : 'Culet', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Polish', name : 'Polish', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Symetry', name : 'Sym', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Floururance', name : 'Flour', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Meas', name : 'Meas', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Comment', name : 'Comment', width : 250, sortable : false, align: 'left'},
																		{display: 'Stones', name : 'Stones', width : 50, sortable : true, align: 'left'},
																		{display: 'Cert_n', name : 'Cert_n', width : 50, sortable : true, align: 'left'},
																		{display: 'Stock_n', name : 'Stock_n', width : 50, sortable : true, align: 'left'},
																		{display: 'Make', name : 'Make', width : 150, sortable : true, align: 'left'},
																		{display: 'City', name : 'City', width : 150, sortable : true, align: 'left'},
																		{display: 'State', name : 'State', width : 150, sortable : true, align: 'left'},
																		{display: 'Country', name : 'Country', width : 150, sortable : true, align: 'left'},
																		{display: 'ratio', name : 'ratio', width : 150, sortable : true, align: 'left'}
																		],
																		 buttons : [ {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'lot', isdefault: true},
																		], 		
																	sortname: \"lot\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Rapnet Diamonds : Helix Diamonds Temp Table</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/gethelixdiamonds/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		 		
																	}
														 
														 ";
			$data['extraheader'] = ' <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script> <link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/rapnetindex', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function diamondsreport() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('diamondsreport');
			$data['diamondscountbysellerswithshape'] = $this->Adminmodel->diamondscountbysellerswithshape();
			$data['diamondscountforsellers'] = $this->Adminmodel->diamondscountbysellers();
			$output = $this->load->view('admin/diamonds_shapereport', $data, true);
			$output .= $this->load->view('admin/diamondsreport', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function pricescopestructure() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#pricescopeconvert").click();
										 
										';
			//var_dump($_POST);
			if (isset($_POST['savepricescopest'])) {
				$ret = $this->Adminmodel->savePriceScopeStructure($_POST);
				if ($ret['success'] != '')
				$data['success'] = $ret['success'];
				else
				$data['error'] = $ret['error'];
			}
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('pricescopestruct');
			$data['structure'] = $this->Adminmodel->getPriceScopeStructure();
			$output = $this->load->view('admin/pricescopestruct', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function savedcsv($cmd = 'view', $filename = '') {
		if ($cmd == 'delete') {
			$filename = str_replace('_', '.', $filename);
			if (file_exists(config_item('base_path') . 'exports/' . $filename)) {
				unlink(config_item('base_path') . 'exports/' . $filename);
			}
			//var_dump(config_item('base_path').'exports/'.$filename);
		}
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#pricescopeconvert").click();
										 
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('savedcsv');
			$output = $this->load->view('admin/savedcsv', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function pricescopecsv($isbaseic = false) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($isbaseic)
		$data['basic'] = $isbaseic;
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#pricescopeconvert").click();
										 
										';
			//var_dump($_POST);
			$data['structure'] = $this->Adminmodel->getPriceScopeStructure('exportorder');
			$exportsrt = '';
			$exportqstr = '';
			$exportcsvstr = '';
			$i = 0;
			foreach ($data['structure'] as $row) {
				if ($row['isexport']) {
					$exportsrt .= '<b>[ </b><font color="green">' . $row['erdfield'] . '</font> => <font color="red">' . $row['exportname'] . ' (' . $row['exportorder'] . ') </font><b>] </b>' . '  ,   ';
					$exportqstr .= $row['erdfield'] . ',';
					$exportcsvstr .= $row['exportname'] . ',';
				}
				$i++;
			}
			if (strlen($exportsrt) > 1)
			$exportsrt = substr($exportsrt, 0, strlen($exportsrt) - 1);
			$data['exportstr'] = $exportsrt;
			if (strlen($exportqstr) > 1)
			$exportqstr = substr($exportqstr, 0, strlen($exportqstr) - 1);
			if (strlen($exportcsvstr) > 1)
			$exportcsvstr = substr($exportcsvstr, 0, strlen($exportcsvstr) - 1);
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('pricescopecsv');
			if (isset($_POST['exportcsv']) || isset($_POST['savebasicsettings'])) {
				$shapesarray = array('B', 'PR', 'R', 'E', 'AS', 'O', 'M', 'P', 'H', 'C');
				$colors = array("'D'", "'E'", "'F'", "'G'", "'H'", "'I'", "'J'", "''");
				$flours = array("'NO'", "'FB'", "'MED'", "'MB'", "'ST BLUE'", "'VST BLUE'");
				$wheres = array();
				for ($i = 0; $i < 10; $i++) {
					$update = "update " . config_item('table_perfix') . "pricescopebasic ";
					if (isset($_POST['shape' . $i])) {
						$where = '';
						$arraycert = array();
						if (isset($_POST[$shapesarray[$i] . 'cert'])) {
							foreach (($_POST[$shapesarray[$i] . 'cert']) as $e) {
								array_push($arraycert, "'" . $e . "'");
							}
						}
						$arraysym = array();
						if (isset($_POST[$shapesarray[$i] . 'sym'])) {
							foreach (($_POST[$shapesarray[$i] . 'sym']) as $e) {
								array_push($arraysym, "'" . $e . "'");
							}
						}
						$arraypolish = array();
						if (isset($_POST[$shapesarray[$i] . 'polish'])) {
							foreach (($_POST[$shapesarray[$i] . 'polish']) as $e) {
								array_push($arraypolish, "'" . $e . "'");
							}
						}
						$where = "(";
						$where .= "shape = '" . $shapesarray[$i] . "'";
						///////////////////////carat settings
						$carat1 = (isset($_POST['carat1' . $i])) ? floatval($_POST['carat1' . $i]) : 0;
						$carat2 = (isset($_POST['carat2' . $i])) ? floatval($_POST['carat2' . $i]) : 0;
						if ($carat1 > $carat2) {
							$update .= "set	carat1 = " . $carat2 . " , 	carat1 = " . $carat1;
							$where .= " and carat >= $carat2 and carat <= $carat1 ";
						} else {
							$update .= "set carat1 = " . $carat1 . " , 	carat2 = " . $carat2;
							$where .= " and carat >= $carat1 and carat <= $carat2 ";
						}
						////////////////////// tablepercentage settings
						$tablepercent1 = (isset($_POST['tablepercent1' . $i])) ? floatval($_POST['tablepercent1' . $i]) : 0;
						$tablepercent2 = (isset($_POST['tablepercent2' . $i])) ? floatval($_POST['tablepercent2' . $i]) : 0;
						if ($tablepercent1 > $tablepercent2) {
							$where .= " and TablePercent >= $tablepercent2 and TablePercent <= $tablepercent1 ";
							$update .= ", table1 = " . $tablepercent2 . " , 	table2 = " . $tablepercent1;
						} else {
							$where .= " and TablePercent >= $tablepercent1 and TablePercent <= $tablepercent2 ";
							$update .= ", table1 = " . $tablepercent1 . " , 	table2 = " . $tablepercent2;
						}
						////////////////////////// depth settings
						$depth1 = (isset($_POST['depth1' . $i])) ? floatval($_POST['depth1' . $i]) : 0;
						$depth2 = (isset($_POST['depth2' . $i])) ? floatval($_POST['depth2' . $i]) : 0;
						if ($depth1 > $depth2) {
							$where .= " and Depth >= $depth2 and Depth <= $depth1 ";
							$update .= ",	depth1 = " . $depth2 . " , 	depth2 = " . $depth1;
						} else {
							$where .= " and Depth >= $depth1 and Depth <= $depth2 ";
							$update .= ",	depth1 = " . $depth1 . " , 	depth2 = " . $depth2;
						}
						///////////////// color settings
						$color1 = (isset($_POST['color1' . $i])) ? $_POST['color1' . $i] : 0;
						$color2 = (isset($_POST['color2' . $i])) ? $_POST['color2' . $i] : 0;
						if ($color1 > $color2) {
							$where .= " and color in (" . implode(',', array_slice($colors, (int) $color2, ((int) ($color1 - $color2)) + 1)) . ") ";
							$update .= ",color1 = " . $color2 . " , color2 = " . $color1;
						} else {
							$where .= " and color in (" . implode(',', array_slice($colors, (int) $color1, ((int) ($color2 - $color1)) + 1)) . ") ";
							$update .= ",color1 = " . $color1 . " , color2 = " . $color2;
						}
						//////////////flour settings
						$flour1 = (isset($_POST['flour1' . $i])) ? $_POST['flour1' . $i] : 0;
						$flour2 = (isset($_POST['flour2' . $i])) ? $_POST['flour2' . $i] : 0;
						if ($flour1 > $flour2) {
							$where .= " and Flour in (" . implode(',', array_slice($flours, (int) $flour2, ((int) ($flour1 - $flour2)) + 1)) . ") ";
							$update .= ",	flour1 = " . $flour2 . " , 	flour2 = " . $flour1;
						} else {
							$where .= " and Flour in (" . implode(',', array_slice($flours, (int) $flour1, ((int) ($flour2 - $flour1)) + 1)) . ") ";
							$update .= ",	flour1 = " . $flour1 . " , 	flour2 = " . $flour2;
						}
						if (sizeof($arraycert) > 0) {
							$where .= " and cert in (" . (implode(',', $arraycert)) . ")";
							$update .= ", cert = '" . str_replace("'", "", implode(',', $arraycert)) . "'";
						}
						if (sizeof($arraysym) > 0) {
							$where .= " and Sym in (" . (implode(',', $arraysym)) . ")";
							$update .= ", symmertry = '" . str_replace("'", "", implode(',', $arraysym)) . "'";
						}
						if (sizeof($arraypolish) > 0) {
							$where .= " and polish in (" . (implode(',', $arraypolish)) . ") ";
							$update .= ", polish = '" . str_replace("'", "", implode(',', $arraypolish)) . "'";
						}
						$update .= ",export =1 where shape = '" . $shapesarray[$i] . "'";
						$where .= ")";
						array_push($wheres, $where);
					} else {
						$update .= " set export = 0 where shape ='" . $shapesarray[$i] . "'";
					}
					if (isset($_POST['savebasicsettings'])) {
						$this->Adminmodel->savePriceScopeBasic($update);
					}
				}
				$wherecondition = implode(' or ', $wheres);
				if (isset($_POST['savebasicsettings'])) {
					$output = $this->load->view('admin/pricescopecsv', $data, true);
					$this->output($output, $data);
				} else {
					// var_dump($_POST);
					//var_dump($wherecondition);
					$csvname = isset($_POST['csvfilename']) ? $_POST['csvfilename'] . date('Y-m-d.h.i.s') . '.csv' : date('Y-m-d.h.i.s') . '.csv';
					$csvname = str_replace(' ', '', $csvname);
					$csvname = str_replace('_', '-', $csvname);
					header("Content-type:text/octect-stream");
					header("Content-Disposition:attachment;filename=" . $csvname);
					print $exportcsvstr . "\n";
					$results = $this->Adminmodel->getPriceScopeCSV($exportqstr, $wherecondition);
					$fp = fopen(config_item('base_path') . 'exports/' . $csvname, 'w+');
					fwrite($fp, $exportcsvstr . "\n");
					foreach ($results as $result) {
						print '"' . stripslashes(implode('","', $result)) . "\"\n";
						fprintf($fp, '"' . stripslashes(implode('","', $result)) . "\"\n");
					}
					fclose($fp);
				}
				//$this->output($output , $data);
			} else {
				$output = $this->load->view('admin/pricescopecsv', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function edittemplate($action = 'page', $id = '') {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#design").click();
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('edittemplate');
			if ($action == 'edit') {
				$data['id'] = $id;
				$data['templatedata'] = $this->Adminmodel->getaddedittemplate('get', array(), $id);
				$filepath = config_item('base_path') . $data['templatedata']['tpath'];
				if (isset($_POST[$action . 'btn'])) {
					if (file_exists($filepath)) {
						$handle = fopen($filepath, "w");
						if (fwrite($handle, $_POST['content']) === FALSE) {
							$data['error'] = '<table width="100%" align="center"><tr><td width = "60"><img src="' . config_item('base_url') . '/images/error.gif"></td><td>ERROR !!Cannot write to file (' . $filepath . ') </td></tr>  </table>';
							exit;
						}
						$data['success'] = '<table width="100%" align="center"><tr><td width = "60"><img src="' . config_item('base_url') . '/images/ok.jpg"></td><td>Edit Success</td></tr>  </table>';
					}
				}
				if (file_exists($filepath)) {
					$handle = fopen($filepath, "r");
					$contents = fread($handle, filesize($filepath));
					fclose($handle);
					$data['content'] = $contents;
				}
			}
			$url = config_item('base_url') . 'admin/gettemplate';
			$data['action'] = $action;
			$data['onloadextraheader'] .= " $(\"#results\").flexigrid
				(
						{
						url: '" . $url . "',
						dataType: 'json',
						colModel : [
						{display: 'Resource Type', name : 'type', width : 200, sortable : true, align: 'left'},
						{display: 'Path', name : 'tpath', width : 250, sortable : true, align: 'left'},
						{display: 'Site Url', name : 'siteurl', width : 200, sortable : true, align: 'left'}
						],
						sortname: \"siteurl\",
						sortorder: \"asc\",
						usepager: true,
						title: '<h1 class=\"pageheader\">Template Resources</h1>',
						useRp: true,
						rp: 100,
						showTableToggleBtn: false,
						width:1025,
						height: 800
						}
				);
				";
			$data['extraheader'] = '
				<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/edittemplate', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function gettemplate() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'id';
		$results = $this->Adminmodel->gettemplate($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['<a href=\"" . addslashes(config_item('base_url')) . "admin/edittemplate/edit/" . $row['id'] . "\">" . $row['type'] . " - Edit</a>'";
			$json .= ",'" . addslashes(config_item('base_path')) . addslashes(ucfirst($row['tpath'])) . "'";
			$json .= ",'<a href=\"" . addslashes(config_item('base_url')) . "" . addslashes($row['siteurl']) . "\" target=\"_blank\">" . addslashes(config_item('base_url')) . "" . addslashes($row['siteurl']) . "</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function scrapingRedSellerdiomand($seller_id) {
		include_once("includes/simple_html_dom.php");
		$tab_header = array();
		$tab_content = array();
		$tab_inner_content = array();
		// create HTML DOM
		//  http://www.diamonds.net/Rapnet/Sells/SearchResults.aspx?SellerLogin=39427&DisplayList=1&TextSize=10&NumResults=1000&SortBy=-[LowestDiscount]%20desc,LowestPrice
		// search by pagination   "http://www.diamonds.net/rapnet/sells/SearchResults.aspx?SellerLogin=39427              &TextSize=10&NumResults=1000&SortBy=-[LowestDiscount]%20desc,LowestPrice
		//          http://www.diamonds.net/Rapnet/Sells/SearchResults.aspx?SellerLogin=39427&DisplayList=1&TextSize=10&NumResults=1000&SortBy=-[LowestDiscount]%20desc,LowestPrice
		$curlurl = "http://www.diamonds.net/rapnet/sells/SearchResults.aspx?SellerLogin=" . $seller_id . "&DisplayList=1&TextSize=10&NumResults=1000&SortBy=-[LowestDiscount]%20desc,LowestPrice";
		$userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
		$url = $curlurl;
		set_time_limit(2400);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		//     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERPWD, '35696:samoa$velar');
		curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
		$user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
		curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
		$curldata = curl_exec($ch);
		curl_close($ch);
		$html = str_get_html($curldata);
		foreach ($html->find('table[id="ctl00_ContentPlaceHolderMainContent_SearchResults1_gvResults"]') as $row) {
			$i = 0;
			$k = 0;
			if (!is_array($row)) {
				//echo $row;
				foreach ($row->find('tr') as $tr) {
					if ($i == 0) {
						foreach ($tr->find('th') as $val) {
							$tab_header[] = $val->plaintext;
						}
					} else {
						if ((($i + 10) % 10) == 1) {
							foreach ($tr->find('td') as $Tdval) {
								$tab_content[$k][] = $Tdval->plaintext;
							}
							$k++;
						} else if ((($i + 10) % 10) == 3) {
							foreach ($tr->find('table[class="resTable"]') as $innerTable) {
								foreach ($innerTable->find('tr td') as $innerText) {
									$tab_inner_content[$k - 1][] = $innerText->plaintext;
								}
							}
						}
					}
					$i++;
				}
			}
		}
		$database_product_info = array();
		foreach ($tab_content as $key => $table) {
			if (is_array($table)) {
				if (isset($tab_inner_content[$key])) {
					$database_product_info[$key]['lot'] = $tab_inner_content[$key][1];
					$database_product_info[$key]['owner'] = $table[6];
					$database_product_info[$key]['shape'] = $table[7];
					$database_product_info[$key]['carat'] = '0';
					$database_product_info[$key]['color'] = '';
					$database_product_info[$key]['clarity'] = $table[10];
					$database_product_info[$key]['price'] = ''; //Image
					$database_product_info[$key]['Rap'] = ''; //Image
					$database_product_info[$key]['Cert'] = ''; //Image
					$database_product_info[$key]['Depth'] = $table[18];
					$database_product_info[$key]['TablePercent'] = $table[19];
					$database_product_info[$key]['Girdle'] = $tab_inner_content[$key][9];
					$database_product_info[$key]['Culet'] = $tab_inner_content[$key][15];
					$database_product_info[$key]['Polish'] = $table[12];
					$database_product_info[$key]['Sym'] = $table[13];
					$database_product_info[$key]['Flour'] = $table[17];
					$database_product_info[$key]['Meas'] = $table[20];
					$database_product_info[$key]['Comment'] = $tab_inner_content[$key][29];
					$database_product_info[$key]['Stones'] = '';
					$database_product_info[$key]['Cert_n'] = '';
					$database_product_info[$key]['Stock_n'] = $tab_inner_content[$key][11];
					$database_product_info[$key]['Make'] = '';
					$database_product_info[$key]['Date'] = $tab_inner_content[$key][37];
					//explode city,state,country
					$location = $tab_inner_content[$key][23];
					$loc = explode(",", $location);
					$city = $loc[0];
					$state = $loc[1];
					$country = $loc[2];
					//--------------------------
					$database_product_info[$key]['City'] = $city;
					$database_product_info[$key]['State'] = $state;
					$database_product_info[$key]['Country'] = $country;
					$database_product_info[$key]['ratio'] = $tab_inner_content[$key][25];
					$database_product_info[$key]['cut'] = '';
					$database_product_info[$key]['tbl'] = '';
					$database_product_info[$key]['pricepercrt'] = '';
					$lot = $database_product_info[$key]['lot'];
					$database_product_info[$key]['tbl'] = '';
				}
			}
		}
		$html->clear();
		unset($html);
		foreach ($database_product_info as $cols) {
			$lot = isset($cols['lot']) ? $cols['lot'] : 0;
			$owner = isset($cols['owner']) ? $cols['owner'] : 'NA';
			$shape = isset($cols['shape']) ? $cols['shape'] : '';
			$carat = isset($cols['shape']) ? $cols['shape'] : '0';
			$color = isset($cols['color']) ? $cols['color'] : '';
			$clarity = isset($cols['clarity']) ? $cols['clarity'] : '';
			$cut = isset($cols['cut']) ? $cols['cut'] : '';
			$price = isset($cols['price']) ? $cols['price'] : '250';
			$Rap = isset($cols['Rap']) ? $cols['Rap'] : '0';
			$Cert = isset($cols['Cert']) ? $cols['Cert'] : '';
			$Depth = isset($cols['Depth']) ? $cols['Depth'] : '0';
			$TablePercent = isset($cols['TablePercent']) ? $cols['TablePercent'] : 'NA';
			$Girdle = isset($cols['Girdle']) ? $cols['Girdle'] : '';
			$Culet = isset($cols['Culet']) ? $cols['Culet'] : '';
			$Polish = isset($cols['Polish']) ? $cols['Polish'] : '';
			$Sym = isset($cols['Sym']) ? $cols['Sym'] : '';
			$Flour = isset($cols['Flour']) ? $cols['Flour'] : '';
			$Meas = isset($cols['Meas']) ? $cols['Meas'] : '0';
			$Comment = isset($cols['Comment']) ? '' : '';
			$Stones = isset($cols['Stones']) ? $cols['Stones'] : '';
			$Cert_n = isset($cols['Cert_n']) ? $cols['Cert_n'] : '';
			$Stock_n = isset($cols['Stock_n']) ? $cols['Stock_n'] : '';
			$Make = isset($cols['Make']) ? $cols['Make'] : '';
			$Date = isset($cols['Date']) ? $cols['Date'] : '';
			$City = isset($cols['City']) ? $cols['City'] : '';
			$State = isset($cols['State']) ? $cols['State'] : '';
			$Country = isset($cols['Country']) ? $cols['Country'] : '';
			$Cert = strtoupper($Cert);
			$ratio = ( isset($ratio) && $ratio != null) ? $ratio : ' ';
			//$price = $this->Helixmodel->erdprice($price);
			$data = array('lot' => trim($lot),
                'owner' => trim($owner),
                'shape' => trim($shape),
                'carat' => trim($carat),
                'color' => trim($color),
                'clarity' => trim($clarity),
                'cut' => trim($cut),
                'price' => trim($price),
                'Rap' => trim($Rap),
                'Cert' => trim($Cert),
                'Depth' => trim($Depth),
                'TablePercent' => trim($TablePercent),
                'Girdle' => trim($Girdle),
                'Culet' => trim($Culet),
                'Polish' => trim($Polish),
                'Sym' => trim($Sym),
                'Flour' => trim($Flour),
                'Meas' => trim($Meas),
                'Comment' => trim($Comment),
                'Stones' => trim($Stones),
                'Cert_n' => trim($Cert_n),
                'Stock_n' => trim($Stock_n),
                'Make' => trim($Make),
                'Date' => trim($Date),
                'City' => trim($City),
                'State' => trim($State),
                'Country' => trim($Country),
                'ratio' => trim($ratio),
                'tbl' => ''
                );
                if (($this->Helixmodel->lotExistRedSeller($lot)) == FALSE) {
                	$isinsert = $this->db->insert($this->config->item('table_perfix') . 'helix_productsredseller', $data);
                	$this->db->insert_id();
                }
		}
	}
	function ViewhelixRedSellerdiamonds($action = '') {
		$data = $this->getCommonData();
		if ($this->isadminlogin()) {
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('helixgetRedSellerView');
			$data['confirm'] = true;
			$url = config_item('base_url') . 'admin/getdiamonds/helix_productsredseller';
			$data['action'] = $action;
			$data['onloadextraheader'] = " $(\"#secondpane p.menu_head\").click(function()
													    {
														     $(this).css({backgroundImage:\"url(" . config_item('base_url') . "images/minus.jpg)\"}).next(\"div.menu_body\").slideDown(500).siblings(\"div.menu_body\").slideUp(\"slow\");
													         $(this).siblings().css({backgroundImage:\"url(" . config_item('base_url') . "images/plus.jpg)\"});
														});
														$(\"#rapnet\").click();
														
														$(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'Lot #', name : 'lot', width : 80, sortable : true, align: 'center'},
																		{display: 'Owner', name : 'owner', width : 85, sortable : true, align: 'center'},
																		{display: 'Shape', name : 'shape', width : 80, sortable : true, align: 'center'},
																		{display: 'Carat', name : 'carat', width : 80, sortable : true, align: 'center'},
																		{display: 'color', name : 'color', width : 50, sortable : true, align: 'center'},
																		{display: 'cut', name : 'cut', width : 100, sortable : true, align: 'left'},
																		{display: 'clarity', name : 'clarity', width : 80, sortable : true, align: 'center'},
																		{display: 'price', name : 'price', width : 60, sortable : true, align: 'center'},
																		{display: 'Rap', name : 'Rap', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center'},
																		{display: 'Depth', name : 'Depth', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Table', name : 'TablePercent', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Girdle', name : 'Girdle', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Culet', name : 'Culet', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Polish', name : 'Polish', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Symetry', name : 'Sym', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Floururance', name : 'Flour', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Meas', name : 'Meas', width : 60, sortable : true, align: 'center',hide: false},
																		{display: 'Comment', name : 'Comment', width : 250, sortable : false, align: 'left'},
																		{display: 'Stones', name : 'Stones', width : 50, sortable : true, align: 'left'},
																		{display: 'Cert_n', name : 'Cert_n', width : 50, sortable : true, align: 'left'},
																		{display: 'Stock_n', name : 'Stock_n', width : 50, sortable : true, align: 'left'},
																		{display: 'Make', name : 'Make', width : 150, sortable : true, align: 'left'},
																		{display: 'City', name : 'City', width : 150, sortable : true, align: 'left'},
																		{display: 'State', name : 'State', width : 150, sortable : true, align: 'left'},
																		{display: 'Country', name : 'Country', width : 150, sortable : true, align: 'left'},
																		{display: 'ratio', name : 'ratio', width : 150, sortable : true, align: 'left'}
																		],
																		 buttons : [ {name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'lot', isdefault: true},
																		], 		
																	sortname: \"lot\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Rapnet Diamonds : Helix Diamonds Temp Table</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/gethelixdiamonds/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		 		
																	}
														 
														 ";
			$data['extraheader'] = ' <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script> <link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/rapnetindex', $data, true);
		}else
		$output = $this->load->view('admin/login', $data, true);
		$this->output($output, $data);
	}
	function product($action = 'view', $cid = 0, $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		$catarray = $this->Categorymodel->getCategoryName($cid);
		$data['category'] = $catarray;
		$view = $this->Productmodel->getFieldHeadingLayout($catarray);
		$headerButton = $this->Productmodel->getHeaderButton($catarray);
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->product($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					/* $this->form_validation->set_rules('price', 'Price', 'trim|required');
					 $this->form_validation->set_rules('brand', 'Brand', 'trim|required');
					 $this->form_validation->set_rules('uprice', 'User Price', 'trim|required');
					 $this->form_validation->set_rules('model_number', 'Model Number', 'trim|required');
					 $this->form_validation->set_rules('metal', 'Metal', 'trim|required');
					 $this->form_validation->set_rules('style', 'Style', 'trim|required');
					 $this->form_validation->set_rules('name', 'Name', 'trim|required');
					 $this->form_validation->set_rules('brand', 'Brand', 'trim|required');
					 $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
					 //$this->form_validation->set_rules('yellow_gold_price', 'Yellow Gold Price', 'trim|required');
					 $this->form_validation->set_error_delimiters('<font class="require">', '</font>'); */
					if (isset($_POST[$action . 'btn'])) {
						//		 	print_r($_POST);
						/* if ($this->form_validation->run() == FALSE){
						 $data['error'] = 'ERROR ! Please check the error fields';
						 if($action != 'edit')$data['details'] = $_POST;
						 }else { */
						$rootparentname = $this->Productmodel->getRootParent($catarray);
						$ret = $this->Adminmodel->product($_POST, $action, $rootparentname, $id);
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
						//}
						//							die();
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					$data['collectionoptions'] = $this->Commonmodel->makeoptions($this->Adminmodel->getcollections(), 'collection', 'collection');
					//echo($catarray);
					$collections = $this->Productmodel->defineAddField($catarray);
					$data['collections'] = $collections;
					$data['cid'] = $cid;
					if ($action == 'edit') {
						$data['id'] = $id;
						$data['details'] = $this->Productmodel->getAllByStock1($id);
						//	print_r($data['details']);
						//exit();
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('product');
				$url = config_item('base_url') . 'admin/getproduct/' . $cid;
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																	$view
																		],
																		 buttons : [
																			$headerButton
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'id', isdefault: true},
																		{display: 'Product Name', name : 'price', isdefault: true},
																		], 		
																	sortname: \"id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Product Listing</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/product/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/product/add/$cid';
																			}			
																	}
														 
														 ";
																			$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
																			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
																			$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
																			$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
																			$data['onloadextraheader'] .= "
											var so;				
		 									";
																			$data['usetips'] = true;
																			$output = $this->load->view('admin/product', $data, true);
																			$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getproduct($cid, $addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : $cid;
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'categoryid';
		$catarray = $this->Categorymodel->getCategoryName($cid);
		$parent = $this->Productmodel->getRootParent($catarray);
		$viewField = $this->Productmodel->defineViewFieldValue($catarray);
		$results = $this->Adminmodel->getproduct($page, $rp, $sortname, $sortorder, $cid, 'categoryid', '', $parent);

		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['ProductID'] . "',";
			$json .= "cell:['Lot #: " . $row['ProductID'] . "<br /><a href=\'" . config_item('base_url') . "admin/product/edit/" . $cid . "/" . $row['ProductID'] . "\'  class=\"edit\">Edit Product</a>'";
			foreach ($viewField as $field) {
				//echo($field['type']);
				if ($field['type'] == 'text') {
					$json .= ",'" . $row[$field['field']] . "'";
				} elseif ($field['type'] == 'shape') {
					$json .= ",'" . addslashes($this->Productmodel->getProductShape($row[$field['field']])) . "'";
				} elseif ($field['type'] == 'price') {
					$json .= ",'$" . $row ['salePriceProduct'] . "'";
				} elseif ($field['type'] == 'image') {
					$json .= ",'" . $filepath . addslashes($this->Productmodel->getProductImage($row[$field['field']])) . "'";
				} elseif ($field['type'] == 'link') {
					$json .= ",'" . $this->Productmodel->getLink($catarray['category_name'], $row[$field['field']], $row) . "'";
				} else {
					$json .= ",'" . $row[$field['field']] . "'";
				}
			}
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function rolex($action = 'view', $id = 0) {
	    
	    //echo config_item('base_path');
	    
	    //echo '<br>site checking... will back soon'; exit();
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['brandoptions'] = $this->Adminmodel->getWatchBrand(); // $this->Commonmodel->makeoptions($this->Adminmodel->getWatchBrand() , 'brand_name' , 'brand_name');
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->rolex($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit' || $action == 'saveandeditbtn') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('price', 'Price', 'trim|required');
					$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
					//$this->form_validation->set_rules('model_number', 'Model Number', 'trim|required');
					$this->form_validation->set_rules('metal', 'Metal', 'trim|required');
					//$this->form_validation->set_rules('style', 'Style', 'trim|required');
					//$this->form_validation->set_rules('name', 'Name', 'trim|required');
					$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
					//$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
					//$this->form_validation->set_rules('yellow_gold_price', 'Yellow Gold Price', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn']) || isset($_POST['saveandeditbtn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else if ($_POST['saveandeditbtn']) {
							$ret = $this->Adminmodel->rolex($_POST, $action, $id);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
							$id = '';
							$ret = $this->Adminmodel->saverolex($_POST, $action, $id);
							$link = config_item('base_url')."admin/rolex/edit/$ret";
							echo "<script>window.location.href='$link'</script>";
							exit;
						} else {
							$ret = $this->Adminmodel->rolex($_POST, $action, $id);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['details'] = $this->Watchesmodel->getWatchByProductId($id);
						$details = $data['details'];
						$data['animations'] = $this->Adminmodel->getFlashByStockId($id);
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('rolex');
				$url = config_item('base_url') . 'admin/getrolex';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'productID', width : 80, sortable : true, align: 'center'},
																		{display: 'Retail Price', name : 'price1', width : 85, sortable : true, align: 'center'},
																		{display: 'List Price', name : 'price1', width : 120, sortable : true, align: 'center'},
																		{display: 'Brand', name : 'brand', width : 120, sortable : true, align: 'center'},
																		{display: 'Upc(For Amazon Product)', name : 'upc', width : 120, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Quantity', name : 'qty', width : 50, sortable : true, align: 'center'},
																		{display: 'Model Number', name : 'model_number', width : 75, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Lowest Price', name : 'lowest_price', width : 75, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Amazon highest price', name : 'highest_price', width : 75, sortable : true, align: 'center'},
                                                                                                                                                              
																		{display: 'Metal', name : 'metal', width : 125, sortable : true, align: 'center'},
																		{display: 'Style', name : 'style', width : 60, sortable : true, align: 'center'},
																		{display: 'Gender', name : 'gender', width : 60, sortable : true, align: 'center',hide: true}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
                                                                                    {name: 'Delete', bclass: 'delete', onpress : test},
                                                                                    {name: 'Multiple Edit Submit', bclass: 'multiple', onpress : test1},
                                                                                     {separator: true}
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'ProductID', isdefault: true},
																		{display: 'Gender', name : 'gender', isdefault: true},
																		{display: 'Brand', name : 'brand', isdefault: false},
                                                                                                                                                {display: 'Model', name : 'model_number', isdefault: false}
																		
																		], 		
																	sortname: \"productID\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Manage Watches</h1>',
																	useRp: true,
																	rp: 10,
																	showTableToggleBtn: false,
																	width:1025,
																	height: 800
																	}
																	);
                                                                                                                                        function test1(){
                                                                                                                                                    //alert(document.getElementById('price1_4').value);  
                                                                                                                                             document.mywatchfrm.submit();
                                                                                                                                        }
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/rolex/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/rolex/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/rolex', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function fedex($id = null) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['name'] = $this->getAdminDetails();
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			$this->load->library('form_validation');
			if (isset($_POST['shipped_fedex'])) {
				$ret = $this->Adminmodel->amzorders($_POST, $action, $id);
				if ($ret['error'] == '')
				$data['success'] = $ret['success'];
			}
			$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
			//     $data['collectionoptions'] = $this->Commonmodel->makeoptions($this->Adminmodel->getcollections() , 'collection' , 'collection');
			$data['details'] = $this->Adminmodel->getOrderByOrderId($id);
			$details = $data['details'];
			//$data['collections'] =$collections;
			$data['animations'] = $this->Adminmodel->getFlashByStockId($id);
			$data['id'] = $id;
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('order');
			//  $url = config_item('base_url').'admin/getrolex';
			$data['action'] = $action;
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
			$data['onloadextraheader'] .= "
											var so;				
		 									";
			$data['usetips'] = true;
			$output = $this->load->view('admin/fedex', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function usps($id = null) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			$this->load->library('form_validation');
			if (isset($_POST['shipped_usps'])) {
				$ret = $this->Adminmodel->uspsorders($_POST, $action, $id);
				if ($ret['error'] == '')
				$data['success'] = $ret['success'];
			}
			$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
			$data['details'] = $this->Adminmodel->getOrderByOrderId($id);
			$details = $data['details'];
			$data['collections'] = $collections;
			$data['animations'] = $this->Adminmodel->getFlashByStockId($id);
			$data['id'] = $id;
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('fullfillments');
			//  $url = config_item('base_url').'admin/getrolex';
			$data['action'] = $action;
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
			$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
			$data['onloadextraheader'] .= "
											var so;				
		 									";
			$data['usetips'] = true;
			$output = $this->load->view('admin/usps', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getrolex($addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 100;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'productID';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getrolex($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		//$json .= "<form>,\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$i = 0;
		$totalResult = sizeof($results['result']);
		foreach ($results['result'] as $row) {
			$shape = '';
			$productID = $row['productID'];
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['productID'] . "',";
			$json .= "cell:['Lot #: " . $row['productID'] . "<br /><a href=\'" . config_item('base_url') . "admin/rolex/edit/" . $row['productID'] . "\'  class=\"edit\">Edit Lot</a>'";
			if ($i == 0) {
				//   $json .= ",'<form  action=\"http://mywatchdepotny.com/development/admin/updaterolexgroup\" method=\"POST\" name=\"WatchBox\" >'";
				//   $json .= ",'<form src=\'".config_item('base_url').addslashes($row['thumb'])."\' width=\'80\'><br />$ ".addslashes($row['price1'])."'";
			}
			//$json .= "form:'<form name='mywatch'>',";
			//if(file_exists(config_item('base_path').addslashes($row['thumb'])) && $row['thumb'] != '')
			$url = config_item('base_url');
			if ($row['thumb'] != '')
			//$json .= ",'<img src=\'".config_item('base_url').addslashes($row['thumb'])."\' width=\'80\'><br />$ ".addslashes($row['price1'])."'";
			$json .= ",'<img src=\'" . $url . addslashes($row['thumb']) . "\' width=\'80\'><br />$ " . addslashes($row['price1']) . "'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />$ " . addslashes($row['price1']) . "'";
			if ($query != '') {
				$json .= ",'<input type=\"text\" name=\"price1_$i\" style=\"width:50px;\"   id=\"price1_$i\"    value=" . ($row['price1']) . " /><input type=\"hidden\" name=\"pid_$i\" style=\"width:50px;\"   id=\"pid_$i\"    value=" . addslashes($row['productID']) . " />'";
				$json .= ",'<input type=\"text\" name=\"brand_$i\" style=\"width:100px;\"  id=\"brand_$i\"   value=" . addslashes($row['brand']) . " />'";
				$json .= ",'<input type=\"text\" name=\"upc_$i\" style=\"width:120px;\"  id=\"upc_$i\"   value=" . addslashes($row['upc']) . " />'";
				$json .= ",'<input type=\"text\" name=\"qty_$i\"  style=\"width:50px;\"  id=\"qty_$i\"   value=" . addslashes($row['qty']) . " />'";
				$json .= ",'<input type=\"text\" name=\"model_$i\"  style=\"width:120px;\"   id=\"model_$i\"   value=" . addslashes($row['model_number']) . " />'";
				$json .= ",'<input type=\"text\" name=\"lowest_$i\"  style=\"width:120px;\"   id=\"lowest_$i\"   value=" . addslashes($row['lowest_price']) . " />'";
				$json .= ",'<input type=\"text\" name=\"highest_$i\"  style=\"width:120px;\"   id=\"highest_$i\"   value=" . addslashes($row['highest_price']) . " />'";
				if ($row['metal'] == 'gold')
				$metal = 'Gold';
				elseif ($row['metal'] == 'ss')
				$metal = 'Stainless Steel';
				else
				$metal = 'Stainless Steel and Gold';
				$json .= ",'" . addslashes($metal) . "'";
				$json .= ",'" . addslashes(ucfirst($row['style'])) . "'";
				if ($i == 0) {
					$json .= ",'<input type=\"hidden\" name=\"totalResult\" id=\"totalResult\"    value=" . ($totalResult) . " />'";
				}
				/*
				 *
				 *
				 $json .= ",'".addslashes($row['brand'])."'";
				 $json .= ",'".addslashes($row['upc'])."'";
				 $json .= ",'".addslashes($row['qty'])."'";
				 $json .= ",'".addslashes($row['model_number'])."'";
				 */
				if ($row['metal'] == 'gold')
				$metal = 'Gold';
				elseif ($row['metal'] == 'ss')
				$metal = 'Stainless Steel';
				else
				$metal = 'Stainless Steel and Gold';
				$json .= ",'" . addslashes($metal) . "'";
				$json .= ",'" . addslashes(ucfirst($row['style'])) . "'";
				$json .= ",'" . addslashes(ucfirst($row['gender'])) . "'";
				//                                $json .= ",'<input type=\"hidden\" name=\"totalResult\" id=\"totalResult\"    value=".($totalResult)." />'";
				$json .= ",'<input type=\"hidden\" name=\"productid_$i\" id=\"productid_$i\"    value=" . addslashes($productID) . " />'";
			}else {
				//$json
				$json .= ",'" . addslashes($row['price1']) . "'";
				$json .= ",'" . addslashes($row['brand']) . "'";
				$json .= ",'" . addslashes($row['upc']) . "'";
				$json .= ",'" . addslashes($row['qty']) . "'";
				$json .= ",'" . addslashes($row['model_number']) . "'";
				if ($row['metal'] == 'gold')
				$metal = 'Gold';
				elseif ($row['metal'] == 'ss')
				$metal = 'Stainless Steel';
				else
				$metal = 'Stainless Steel and Gold';
				$json .= ",'" . addslashes(ucfirst($row['lowest_price'])) . "'";
				$json .= ",'" . addslashes(ucfirst($row['highest_price'])) . "'";
				$json .= ",'" . addslashes($metal) . "'";
				$json .= ",'" . addslashes(ucfirst($row['style'])) . "'";
				$json .= ",'" . addslashes(ucfirst($row['gender'])) . "'";
			}
			$json .= "]";
			$json .= "}";
			$rc = true;
			$i = $i + 1;
		}
		$json .= "]\n";
		$json .= "}";
		//      $json = str_replace("</form>", " ", $json);
		//echo "<script>alert('$json'";
		echo $json;
	}
	function mount($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->jewelries($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('price', 'Price', 'trim|required');
					$this->form_validation->set_rules('section', 'Section', 'trim|required');
					$this->form_validation->set_rules('collection', 'Collection', 'trim|required');
					$this->form_validation->set_rules('shape', 'Shape', 'trim|required');
					$this->form_validation->set_rules('metal', 'Metal', 'trim|required');
					$this->form_validation->set_rules('style', 'Style', 'trim|required');
					$this->form_validation->set_rules('name', 'Name', 'trim|required');
					$this->form_validation->set_rules('platinum_price', 'Platinum Price', 'trim|required');
					$this->form_validation->set_rules('white_gold_price', 'White Gold Price', 'trim|required');
					$this->form_validation->set_rules('yellow_gold_price', 'Yellow Gold Price', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$ret = $this->Adminmodel->jewelries($_POST, $action, $id);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					$data['collectionoptions'] = $this->Commonmodel->makeoptions($this->Adminmodel->getcollections(), 'collection', 'collection');
					if ($action == 'edit') {
						$data['details'] = $this->Jewelrymodel->getAllByStock($id);
						$details = $data['details'];
						switch ($details['section']) {
							case 'Earrings':
								$collections = '<option value="DiamondStud">Diamond Stud Earrings</option>
											  <option value="BuildEarring">Build Your Own Earrings</option>
											';
								break;
							case 'EngagementRings':
								$collections = '
												<option value="International Collection">International Collection</option>
											';
								break;
							case 'Jewelry':
								$collections = '
												<option value="MensWeddingRing">Men\'s Wedding Rings</option>  
									            <option value="WomensWeddingRing">Women\'s Wedding Rings</option>  
										 		<option value="WomensAnniversaryRing">Women\'s Anniversary Rings</option> 
											 	';
								break;
							case 'Pendants':
								$collections = '
												<option value="BuildPendant">Build your own Pendants</option>
											';
								break;
							default:
								break;
						}
						$data['collections'] = $collections;
						$data['animations'] = $this->Adminmodel->getFlashByStockId($id);
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('mount');
				$url = config_item('base_url') . 'admin/getmounts';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'stock_number', width : 80, sortable : true, align: 'center'},
																		{display: 'Price', name : 'price', width : 85, sortable : true, align: 'center'},
																		{display: 'Section', name : 'section', width : 120, sortable : true, align: 'center'},
																		{display: 'Collection', name : 'collection', width : 120, sortable : true, align: 'center'},
																		{display: 'Shape', name : 'shape', width : 50, sortable : true, align: 'center'},
																		{display: 'Metal', name : 'metal', width : 80, sortable : true, align: 'center'},
																		{display: 'Style', name : 'style', width : 60, sortable : true, align: 'center'},
																		{display: 'Carat', name : 'carat', width : 60, sortable : true, align: 'center',hide: true},
																		{display: 'Total Carats', name : 'total_carats', width : 60, sortable : true, align: 'center'},
																		{display: 'Diamond Count', name : 'diamond_count', width : 60, sortable : true, align: 'center',hide: true},
																		{display: 'Diamond Size', name : 'diamond_size', width : 60, sortable : true, align: 'center',hide: true},
																		{display: 'Pearl Lenght', name : 'pearl_lenght', width : 60, sortable : true, align: 'center',hide: true},
																		{display: 'Pearl mm', name : 'pearl_mm', width : 60, sortable : true, align: 'center',hide: true},
																		{display: 'Semi mounted', name : 'semi_mounted', width : 60, sortable : true, align: 'center',hide: true},
																		{display: 'Side', name : 'side', width : 60, sortable : true, align: 'center',hide: true},
																		{display: 'Carat image', name : 'carat_image', width : 60, sortable : true, align: 'center',hide: true},
																		{display: 'Description', name : 'description', width : 250, sortable : false, align: 'left'}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'stock_number', isdefault: true},
																		{display: 'Shape', name : 'shape', isdefault: true},
																		{display: 'Style', name : 'style', isdefault: false}
																		
																		], 		
																	sortname: \"stock_number\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Semi Mounts</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/mount/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/mount/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/mount', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getmounts($addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'stock_number';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getmounts($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['stock_number'] . "',";
			$json .= "cell:['Lot #: " . $row['stock_number'] . "<br /><a href=\"javascript:void(0)\" onclick=\"jewelrydetails(" . $row['stock_number'] . ");\" class=\"edit\">View Details</a>'";
			if (file_exists(config_item('base_path') . 'images/' . addslashes($row['small_image'])) && $row['small_image'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . "images/" . addslashes($row['small_image']) . "\' width=\'80\'><br />$ " . addslashes($row['price']) . "'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />$ " . addslashes($row['price']) . "'";
			$json .= ",'" . addslashes($row['section']) . "'";
			$json .= ",'" . addslashes($row['collection']) . "'";
			$json .= ",'" . addslashes($row['shape']) . "'";
			$json .= ",'" . addslashes($row['name']) . "'";
			$json .= ",'" . addslashes($row['metal']) . "'";
			$json .= ",'" . addslashes($row['style']) . "'";
			$json .= ",'" . addslashes($row['carat']) . "'";
			$json .= ",'" . addslashes($row['total_carats']) . "'";
			$json .= ",'" . addslashes($row['diamond_count']) . "'";
			$json .= ",'" . addslashes($row['diamond_size']) . "'";
			$json .= ",'" . addslashes($row['pearl_lenght']) . "'";
			$json .= ",'" . addslashes($row['pearl_mm']) . "'";
			$json .= ",'" . addslashes($row['semi_mounted']) . "'";
			$json .= ",'" . addslashes($row['side']) . "'";
			$json .= ",'" . addslashes($row['carat_image']) . "'";
			$json .= ",'" . str_replace("\r", '<br />', str_replace("\n", '<br />', addslashes($row['description']))) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function category($action = 'view', $cid = 0, $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['name'] = $this->getAdminDetails();
		$data['collections'] = '';
		$data['typeoptions'] = '';
		$catarray = $this->Categorymodel->getCategoryName($cid);
		$data['category'] = $catarray;
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->category($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('category_label', 'category_name', 'trim|required');
					//$this->form_validation->set_rules('yellow_gold_price', 'Yellow Gold Price', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						//		 	print_r($_POST);
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$rootparentname = $this->Productmodel->getRootParent($catarray);
							$ret = $this->Adminmodel->category($_POST, $action, $rootparentname, $id);
							$ret = $this->Adminmodel->category($_POST, $action, $id);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
						//							die();
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['details'] = $this->Categorymodel->getAllByStock($id);
						$details = $data['details'];
						$data['cid'] = $cid;
						$data['id'] = $id;
					}
				}
				$prodButton = '';
				if ($cid != '0') {
					$prodButton = "{name: 'Add Product', bclass: 'add', onpress : test},";
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('other');
				$url = config_item('base_url') . 'admin/getcategory/' . $cid;
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'id', width : 120, sortable : true, align: 'center'},
																		{display: 'Category Name', name : 'category_name', width : 300, sortable : true, align: 'center'},
																		{display: 'Category Image', name : 'image', width : 250, sortable : true, align: 'center'},
																		{display: 'Total Products', name : '', width : 120, sortable : false, align: 'center'}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				$prodButton
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'id', isdefault: true},
																		{display: 'Category Name', name : 'category_name', isdefault: true}
																		], 		
																	sortname: \"id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Category Listing</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																								//var url = 'admin/category/delete/'+itemlist;
																                                //prompt('a', url);
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/category/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										}
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/category/add/$cid';
																			}
																		else if (com=='Add Product')
																			{
																				window.location = '" . config_item('base_url') . "admin/product/add/$cid';
																			}		
																	}
														 
														 ";
																				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
																				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
																				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
																				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
																				$data['onloadextraheader'] .= "
											var so;				
		 									";
																				$data['usetips'] = true;
																				$output = $this->load->view('admin/category', $data, true);
																				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getcategory($id = 0, $addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'category_name';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'category_name';
		$results = $this->Adminmodel->getcategory($page, $rp, $sortname, $sortorder, $query, $qtype, $id);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$catarray = $this->Categorymodel->getCategoryName($id);
		//$parentname = $this->Productmodel->getRootParent($catarray);
		foreach ($results['result'] as $row) {
			$shape = '';
			$catarray = $this->Categorymodel->getCategoryName($row['id']);
			$parentname = $this->Productmodel->getRootParent($catarray);
			$count = $this->Adminmodel->getCategoryCount($row['id']);
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['Lot #: " . $row['id'] . "<br /><a href=\'" . config_item('base_url') . "admin/category/view/" . $row['id'] . "\'  class=\"edit\">View Category ($count[total])</a><br /><a href=\'" . config_item('base_url') . "admin/category/edit/" . $row['parentid'] . "/" . $row['id'] . "\'  class=\"edit\">Edit Category</a>'";
			$count = $this->Adminmodel->getProductCount($row['id'], $parentname);
			$json .= ",'" . addslashes($row['category_label']) . "'";
			//$filepath = 'images/category/'.$parentname.'/'.$row['image'];
			$json .= ",'" . $this->Productmodel->getProductImage($row['image']) . "'";
			$json .= ",'<a href=\'" . config_item('base_url') . "admin/product/view/" . $row['id'] . "\'  class=\"edit\">View Product (" . $count['total'] . ")</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function upload($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($_POST) {
				if ($action == 'add') {
					$destination = config_item('base_path') . 'upload/bomifeed.csv';
					if (file_exists($destination))
					unlink($destination);
					move_uploaded_file($_FILES['uploadcsv']['tmp_name'], $destination);
					if (file_exists($destination)) {
						$handle = fopen($destination, "r");
						$r = $this->Adminmodel->emptyhelix();
						//foreach ($rows as $row)
						$i = 0;
						while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
							//echo '<pre>';
							//print_r($data);
							if ($i > 0) {
								//$cols = explode(',' , $row);
								//	print_r($cols);
								$t = $this->Adminmodel->saveinhelix($data);
							}
							$i++;
						}
						$t = $this->Adminmodel->fixhelix();
					}
				}
			}
			$data['extraheader'] .= ' <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$data['extraheader'] .= '
				<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
			$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
			$data['onloadextraheader'] .= " var so;";
			$data['usetips'] = true;
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('rolex');
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('uploadbomicsv');
			$output = $this->load->view('admin/bomiupload', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function updaterolexgroup() {
		//   $total = $_REQUEST['totalResult'];
		$data['name'] = $this->getAdminDetails();
		$this->Adminmodel->updateRolex($_REQUEST);
	}
	function cronEbayOrderUpload($action = 'view', $id = 0) {
		@mail("pardeepsingal1@gmail.com", 'Cron Ebay Orders', 'cron ebay orders file  is started at ' . date('Y-m-d H:i:s'), "From: \"MywatchDepotNy\"");
		$path_to_file = config_item('base_url') . "Sales-Paid.csv";
		$handle = fopen($path_to_file, "r");
		//read file line by line
		while (($record = fgetcsv($handle, filesize($path_to_file), ",")) !== FALSE) {
			if (isset($record)) {
				$t = $this->Adminmodel->updateorders($record);
			}
		}
		fclose($handle);
	}
	function getAttribute($addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 100;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getattribute($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		//$json .= "<form>,\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			$productID = $row['id'];
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['ID #: " . $row['id'] . "<br /><a href=\'" . config_item('base_url') . "admin/attribute/edit/" . $row['id'] . "\'  class=\"edit\">Edit </a>'";
			//$json
			if ($row['option_name'] == '1')
			$metal = 'Metal';
			else
			$metal = 'Chain Style';
			$json .= ",'" . addslashes($metal) . "'";
			$json .= ",'" . addslashes($row['option_value']) . "'";
			$json .= ",'" . addslashes($row['option_price']) . "'";
			$json .= ",'" . addslashes($row['dateofmodification']) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function getnameplate($addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 100;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'product_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'product_name';
		$results = $this->Adminmodel->getnameplate($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$productID = $row['product_id'];
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['product_id'] . "',";
			$json .= "cell:['ID #: " . $row['product_id'] . "<br /><a href=\'" . config_item('base_url') . "admin/nameplate/edit/" . $row['product_id'] . "\'  class=\"edit\">Edit </a>'";
			//$json
			if ($row['product_image'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . "images/" . addslashes($row['product_image']) . "\' width=\'80\'><br />$ " . addslashes($row['product_price']) . "'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />$ " . addslashes($row['product_price']) . "'";
			$json .= ",'" . addslashes($row['product_name']) . "'";
			$json .= ",'" . addslashes($row['product_price']) . "'";
			$json .= ",'" . addslashes($row['product_code']) . "'";
			$json .= ",'" . addslashes($row['dateofmodification']) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function attribute($action = 'view', $cid = 0, $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->attribute($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('option_value', 'OptionValue', 'trim|required');
					$this->form_validation->set_rules('option_price', 'OptionPrice', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$ret = $this->Adminmodel->attribute($_POST, $action, $cid);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
						//							die();
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['details'] = $this->Adminmodel->getattributeById($cid);
						$details = $data['details'];
						$data['id'] = $cid;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#jewelrymanage").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('attribute');
				$url = config_item('base_url') . 'admin/getAttribute';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'id', width : 80, sortable : true, align: 'center'},
																		{display: 'Option Name', name : 'option_name', width : 85, sortable : true, align: 'center'},
																		{display: 'Option Value', name : 'option_value', width : 85, sortable : true, align: 'center'},
																		{display: 'Option Price', name : 'option_price', width : 60, sortable : true, align: 'center'},
																			{display: 'Date', name : 'dateofmodification', width : 60, sortable : true, align: 'center'}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
                                                                                                                                                            {name: 'Delete', bclass: 'delete', onpress : test},
                                                                                                                                                              {separator: true}
																			],
																	searchitems : [
																		
																		{display: 'Option Name', name : 'option_name', isdefault: false},
                                                                                   {display: 'Option Value', name : 'option_value', isdefault: false}
																		
																		], 		
																	sortname: \"id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Attribute Controller</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
                                                                                                                                        
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/attribute/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/attribute/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/attribute', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function nameplate($action = 'view', $cid = 0, $id = 0) {
		$data = $this->getCommonData();
		$data['extraheader'] = '';
		$data['name'] = $this->getAdminDetails();
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->nameplate($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_rules('product_code', 'ProductCode', 'trim|required');
					$this->form_validation->set_rules('product_name', 'ProductName', 'trim|required');
					$this->form_validation->set_rules('product_price', 'ProductPrice', 'trim|required');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						if ($this->form_validation->run() == FALSE) {
							$data['error'] = 'ERROR ! Please check the error fields';
							if ($action != 'edit')
							$data['details'] = $_POST;
						}else {
							$ret = $this->Adminmodel->nameplate($_POST, $action, $cid, $_FILES);
							if ($ret['error'] == '')
							$data['success'] = $ret['success'];
							else {
								$data['error'] = $ret['error'];
								if ($action != 'edit')
								$data['details'] = $_POST;
							}
						}
						//							die();
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['details'] = $this->Adminmodel->getnameplateById($cid);
						$details = $data['details'];
						$data['id'] = $cid;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
							   	        {
									 $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
								         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
									});
									$("#jewelrymanage").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('nameplate');
				$url = config_item('base_url') . 'admin/getnameplate';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'product_id', width : 80, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Product Image', name : 'product_image', width : 80, sortable : true, align: 'center'},
																		{display: 'Product Name', name : 'product_name', width : 85, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Product Price', name : 'product_price', width : 85, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Product Code', name : 'product_code', width : 85, sortable : true, align: 'center'},          
																		{display: 'Date', name : 'dateofmodification', width : 60, sortable : true, align: 'center'}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
                                                                                                                                                            {name: 'Delete', bclass: 'delete', onpress : test},
                                                                                                                                                              {separator: true}
																			],
																	searchitems : [
																		
																		{display: 'Product name', name : 'product_name', isdefault: false},
                                                                                                                                                {display: 'Product code', name : 'product_code', isdefault: false}
																		
																		], 		
																	sortname: \"product_id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">NamePlate Items</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height:800
																	}
																	);
                                                                                                                                        
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/nameplate/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
                                                                                                                                                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/nameplate/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/nameplate', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function generateXMLStamp($id) {
		$order = $this->Adminmodel->getordersById($id);
		$xml = '<?xml version="1.0" ?>';
		$xml .= '<Print mlns="http://stamps.com/xml/namespace/2009/8/Client/BatchProcessingV1">';
		$xml .= '<Configuration><ResultFile>C:\Documents and Settings\Administrator\Desktop\printed-a-shippingbatch.xml</ResultFile>';
		$xml .='<DesiredPrinter>
                      <Name>SeoWeb Printer</Name>
                     <Bin>Tray 2</Bin>
            </DesiredPrinter>
          <MailingCutoffTime>17:30:00.0</MailingCutoffTime>
          <Rollover>false</Rollover>
          <SenderEmailOptions>
              <DeliveryNotification />
              <ShipmentNotification />
        </SenderEmailOptions>
      <RecipientEmailOptions>
        <ShipmentNotification companyInSubject="true" fromCompany="true" />
      </RecipientEmailOptions>
        </Configuration>';
		$xml .='<Layout>
              <Desired>
              <MediaName>MyWatchDepot.com SDC-1200 Standard 4x6 label 2 per sheet</MediaName>
              <StartCol>1</StartCol>
              <StartRow>1</StartRow>
              <Style>
                    <IndiciumGraphic>XYZ</IndiciumGraphic>
                    <RecipientAddressFontName>Helvetica</RecipientAddressFontName>
                    <RecipientAddressFontSize>10</RecipientAddressFontSize>
                    <ReturnAddressFontName>Arial</ReturnAddressFontName>
                    <ReturnAddressFontSize>11</ReturnAddressFontSize>
                    <ReturnAddressGraphic>C:\Documents and Settings\Administrator\Desktop\Stamp\FileName.gif</ReturnAddressGraphic>
            </Style>
            </Desired>
            <PrintReceipt>true</PrintReceipt>
          </Layout>
            <Item>
                  <OrderDate>' . $order['purchase-date'] . '</OrderDate>
                  <OrderID>' . $order['orderid'] . '</OrderID>
                <PrintedMemo>Date ' . $order['purchase-date'] . '</PrintedMemo>
              <Services>
                    <CertifiedMail />
                    <DeliveryConfirmation />
            </Services>
            <Recipient>
            <AddressFields>
              <NamePrefix>Mr.</NamePrefix>
             <FirstName>' . $order['NamePrefix'] . '</FirstName>
             <LastName> </LastName>
            <MultilineAddress>      
            <Line>' . $order['ship-address1'] . '</Line>
            <Line>' . $order['ship-address2'] . '</Line>
            </MultilineAddress>
            <City>' . $order['ship-city'] . '</City>
            <State>' . $order['ship-state'] . '</State>
            <ZIP>' . $order['ship-postal-code'] . '</ZIP>
            <Country>' . $order['ship-postal-code'] . '</Country>
            <OrderedEmailAddresses>
              <Address>' . $order['buyer-email'] . '</Address>
            </OrderedEmailAddresses>
              <OrderedPhoneNumbers>
                <Number>' . $order['ship-phone-number'] . '</Number>
              </OrderedPhoneNumbers>
          </AddressFields>
      </Recipient>
          <MailClass>international express</MailClass>
          <Mailpiece>package</Mailpiece>
          <WeightOz>1</WeightOz>
          <PackageDimensionSet>A-type Widget Box</PackageDimensionSet>
      <Sender>
      <Company>MywatchDepot,A Perfact watch and diamond store.</Company>
      <Address1>Queens, NY, United States</Address1>
      <City>New York</City>
      <State>NY</State>
       <ZIP>90013</ZIP>
      <ZIPAddOn>7020</ZIPAddOn>
       <DisplayName>MYWATCHDEPOT NY WATCH AND DIAMOND STORE</DisplayName>
      <OrderedPhoneNumbers>
          <Number>1-800-874-3541</Number>
      </OrderedPhoneNumbers>      
      </Sender>
    </Item>';
		$xml .= '</Print>';
		$fp = fopen(config_item('base_url') . "stamps/printed-a-shippingbatch.xml", "w");
		fwrite($fp, $xml, strlen($xml));
		fclose($fp);
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"printed-a-shippingbatch.xml\"");
		echo $xml;
	}
	function notification() {
	}
	function managenotification() {
		// $data =	 serialize($HTTP_RAW_POST_DATA).'manage notification file  is started at '.date('Y-m-d H:i:s') ;
		$sql = $this->db->query("select * from schedulers");
		$scheduler = $sql->result_array();
		// Remember that difference should be 30 days only
		$startDate = $scheduler[0]['lastCallTime'];
		$endDate = date("Y-m-d H:i:s");
		$orderData = $this->Cronmodel->GetSellerTransactions($startDate, $endDate);
		for ($j = 0; $j < sizeof($orderData); $j++) {
			$this->Adminmodel->AddOrderDataInDB($orderData[$j]);
		}
		$isinsert = $this->db->update('schedulers', array(
            'lastCallTime' => date("Y-m-d H:i:s"),
		));
		$this->db->where("id", '1');
		/*
		 $data= serialize($_REQUEST);
		 $filePath = config_item('base_path')."upload/pksingal_main.txt";
		 $fp = fopen($filePath,"w");
		 fwrite($fp,$data);
		 fclose($fp);
		 @mail("pardeepsingal1@gmail.com", 'Manage Notification File called','manage notification file  is started at '.date('Y-m-d H:i:s') ,"From: \"Gemnile\"");
		 exit;
		 $start_pos = strpos($HTTP_RAW_POST_DATA,"<GetItemTransactionsResponse");
		 $end_pos   = strpos($HTTP_RAW_POST_DATA,"</GetItemTransactionsResponse>");
		 $HTTP_RAW_POST_DATA = substr($HTTP_RAW_POST_DATA,$start_pos,$end_pos);
		 $HTTP_RAW_POST_DATA = str_replace(array('</soapenv:Envelope>','</soapenv:Body>'),"",$HTTP_RAW_POST_DATA);
		 $exportcsvstr =  ($HTTP_RAW_POST_DATA) ;
		 $fp = fopen(config_item('base_path').'orderfiles/abx.xml' , 'w');
		 fwrite($fp , $exportcsvstr . "\n");
		 fclose($fp);
		 $responseObj   = simplexml_load_string($HTTP_RAW_POST_DATA);// or die(htmlspecialchars($HTTP_RAW_POST_DATA));
		 if(!$responseObj){
		 return -1;
		 }
		 try
		 {
		 if($responseObj){
		 $transactionObject = $responseObj->TransactionArray->Transaction;
		 $itemObject        = $responseObj->Item;
		 $ebay_transaction  = new ebayTransactions(3);
		 $NotificationEventName = $responseObj->NotificationEventName;
		 /*
		 if($NotificationEventName=='ItemUnsold')
		 {
		 $itemId = $itemObject->ItemID;
		 $result = func_query_first("select product_id,listing_type,ebay_itemid from ebay_items where ebay_itemid='$itemId'");
		 $productid = $result['product_id'];
		 $listing_type = $result['listing_type'];
		 if($listing_type=='Chinese')
		 {
		 if($result['ebay_itemid']){
		 $ebay_transaction->ManageInventoryNew($productid,"enditem");
		 }else{
		 $variantId = func_query_first_cell("select variantid from ebay_auction_items Where ebay_itemid='$itemId'");
		 $ebay_transaction->ManageInventoryNew($productid,"enditem",$variantId);
		 }
		 }
		 }
		 else
		 { */
		/* 				if(in_array($NotificationEventName,$this->eventArr)){
		 $ebay_transaction->ManageTransaction($transactionObject,$itemObject);
		 }
		 // }
		 }
		 return 1;
		 }
		 catch(Exception $e){
		 error_log($e->getTraceAsString(),1,"pardeepsingal1@gmail.com");
		 return 0;
		 }
		 *
		 */
	}
	//mark79
	function ManageTransaction($transaction) {
		$amountPaid = str_replace(',', '', $transaction->AmountPaid);
		$convertedAmountPaid = str_replace(',', '', $transaction->ConvertedAmountPaid);
		foreach ($transaction->ConvertedAmountPaid As $Currency) {
			$currency = (string) $Currency['currencyID'];
		}
		#Buyer Details
		$BuyerArr = array();
		$BuyerArr['email'] = (string) $transaction->Buyer->Email;
		$BuyerName = (string) $transaction->Buyer->BuyerInfo->ShippingAddress->Name;
		$BuyerName = explode(" ", $BuyerName);
		$BuyerArr['firstname'] = @$BuyerName[0];
		$BuyerArr['lastname'] = @$BuyerName[1];
		$BuyerArr['s_address'] = $BuyerArr['b_address'] = (string) $transaction->Buyer->BuyerInfo->ShippingAddress->Street1;
		$BuyerArr['s_city'] = $BuyerArr['b_city'] = (string) $transaction->Buyer->BuyerInfo->ShippingAddress->CityName;
		$BuyerArr['s_state'] = $BuyerArr['b_state'] = (string) $transaction->Buyer->BuyerInfo->ShippingAddress->StateOrProvince;
		$BuyerArr['s_county'] = $BuyerArr['b_county'] = (string) $transaction->Buyer->BuyerInfo->ShippingAddress->Country;
		$BuyerArr['s_country'] = $BuyerArr['b_city'] = (string) $transaction->Buyer->BuyerInfo->ShippingAddress->CountryName;
		$BuyerArr['s_zipcode'] = $BuyerArr['b_zipcode'] = (string) $transaction->Buyer->BuyerInfo->ShippingAddress->PostalCode;
		$BuyerArr['phone'] = (string) $transaction->Buyer->BuyerInfo->ShippingAddress->Phone;
		$BuyerArr['usertype'] = 'C';
		$BuyerArr['url'] = $url;
		$buyerID = (string) $transaction->Buyer->UserID;
		#Create a new order
		$OrderArr = array();
		$OrderArr['order'] = array();
		$OrderArr['order_detail'] = array();
		$OrderArr['ebay_orders'] = array();
		$OrderArr['order']['buyerid'] = $buyerID;
		$OrderArr['order']['login'] = $login;
		$OrderArr['order']['total'] = $amountPaid;
		$shipping_additional_cost = (string) $transaction->ShippingServiceSelected->ShippingServiceAdditionalCost;
		$shipping_cost = (string) $transaction->ShippingServiceSelected->ShippingServiceCost;
		$OrderArr['order']['shipping_cost'] = $shipping_cost + $shipping_additional_cost;
		$subtotal = $amountPaid - ($shipping_cost + $shipping_additional_cost);
		$ShippingService = (string) $transaction->ShippingServiceSelected->ShippingService;
		$shippingid = func_query_first_cell("Select store_shipping_id from ebay_shipping_methods where ebaycode='$ShippingService'");
		$OrderArr['order']['subtotal'] = $subtotal;
		$payment_method = (string) $transaction->Item->PaymentMethods;
		if (!$payment_method)
		$payment_method = (string) $itemObject->PaymentMethods;
		$OrderArr['order']['tax'] = (string) $transaction->ShippingDetails->SalesTax->SalesTaxAmount;
		$OrderArr['order']['taxes_applied'] = 1;
		$OrderArr['order_detail']['qty'] = (string) $transaction->QuantityPurchased;
		$OrderArr['order']['date'] = strtotime($this->mySqlDate((string) $transaction->CreatedDate));
		$OrderArr['order']['payment_method'] = $payment_method;
		$OrderArr['order']['firstname'] = @$BuyerName[0];
		$OrderArr['order']['lastname'] = @$BuyerName[1];
		$OrderArr['order']['s_address'] = $OrderArr['order']['b_address'] = $BuyerArr['b_address'];
		$OrderArr['order']['s_city'] = $OrderArr['order']['b_city'] = $BuyerArr['b_city'];
		$OrderArr['order']['s_state'] = $OrderArr['order']['b_state'] = $BuyerArr['b_state'];
		$OrderArr['order']['s_country'] = $OrderArr['order']['b_county'] = $BuyerArr['b_county'];
		$OrderArr['order']['s_city'] = $OrderArr['order']['b_city'] = $BuyerArr['b_city'];
		$OrderArr['order']['s_zipcode'] = $OrderArr['order']['b_zipcode'] = $BuyerArr['b_zipcode'];
		$OrderArr['order']['phone'] = $BuyerArr['phone'];
		$OrderArr['order']['url'] = $BuyerArr['url'];
		$OrderArr['order']['email'] = $BuyerArr['email'];
		//print_r($transaction);
		$transaction_id = (string) $transaction->TransactionID;
		if (!$transaction_id) {
			$transaction_id = (string) $transaction->ExternalTransaction->ExternalTransactionID;
		}
		$OrderArr['order']['status'] = "P";
		$OrderArr['order']['transaction_id'] = $transaction_id;
		$OrderArr['order']['notes'] = "Payment Method : " . $payment_method . ", Shipping Service : $ShippingService , TransactionID: " . $transaction_id . ", FeeOrCreditAmount:" . (string) $transaction->ExternalTransaction->FeeOrCreditAmount . ",PaymentOrRefundAmount :" . (string) $transaction->ExternalTransaction->PaymentOrRefundAmount . ", ExternalTransactionTime: " . (string) $transaction->ExternalTransaction->ExternalTransactionTime;
		$transaction_price = (string) $transaction->TransactionPrice;
		$transaction_siteid = (string) $transaction->TransactionSiteID;
		//$ebay_siteid       = func_query_first_cell("select id from ebay_site where ebayCode='$transaction_siteid'");
		$LastTimeModified = $transaction->Status->LastTimeModified;
		#Order Detail
		$ebay_item_id = (string) $transaction->Item->ItemID;
		$start_price = (string) $transaction->Item->StartPrice;
		if (!$ebay_item_id) {
			$ebay_item_id = (string) $itemObject->ItemID;
			$start_price = (string) $itemObject->StartPrice;
		}
		$OrderArr['order']['ebay_item_id'] = $ebay_item_id;
		$OrderArr['order']['price'] = $start_price;
		$OrderArr['order']['last_modified'] = $LastTimeModified;
		$OrderArr['order']['transaction_price'] = $transaction_price;
		$OrderArr['order']['transaction_siteid'] = $transaction_siteid;
		$this->Adminmodel->AddOrderDataInDB($orderArr);
	}
	function testfile() {
		$string = '';
		echo "<pre>";
		print_R(unserialize($string));
	}
	function sendReq() {
		@mail("pardeepsingal1@gmail.com", 'Cron Ebay Orders', 'cron ebay orders file  is started at ' . date('Y-m-d H:i:s'), "From: \"Test MywatchDepotNy\"");
		$data = serialize($_REQUEST);
		$filePath = config_item('base_path') . "upload/pksingal.txt";
		$fp = fopen($filePath, "w");
		fwrite($fp, $data);
		fclose($fp);
		exit;
	}
	function sendReply() {
		$_POST['name'] = 'eBay';
		$_POST['lname'] = 'LeBay';
		$_POST['grade'] = 'B';
		return $_POST;
	}
	//////////// email subscriber list
	function getSubsList() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'first_name';
		$results = $this->Adminmodel->getSubscriberList($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$subsdate_time = date('d-M-Y H:i', strtotime($row['subs_date']));
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['ID #: " . $row['id'] . "'";
			$json .= ",'" . addslashes($row['first_name'].' '.$row['last_name']) . "'";
			$json .= ",'" . addslashes($row['email_adres']) . "'";
			/*$json .= ",'" . addslashes($row['phone_no']) . "'";
			$json .= ",'" . addslashes($row['subs_city']) . "'";
			$json .= ",'" . addslashes($row['subs_state']) . "'";*/
			$json .= ",'" . addslashes($subsdate_time) . "'";
			$json .= ",'<a href=\"".SITE_URL."admin/subsEmailSent/".$row['id']."\">Message Details</a>'";
			$json .= ",'<a href=\"".SITE_URL."admin/subsEmailSent/".$row['id']."\">Mail Chimp</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	
	function getComments() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'full_name';
		$results = $this->Adminmodel->getComentsList($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			$postComents = clean_string($row['post_comments']);
			$comentStatus = ( $row['status'] == 'AP' ? 'Approved' : 'Under Process' );
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['ID #: " . $row['id'] . "<br /><a href=\'" . SITE_URL . "admin/manage_comments/edit/" . $row['id'] . "\'  class=\"edit\">Edit</a>'";
			$json .= ",'" . addslashes($row['full_name']) . "'";
			$json .= ",'" . addslashes($row['coments_rating']) . "'";
			$json .= ",'" . addslashes( $postComents ) . "'";
			$json .= ",'" . addslashes($row['coment_date']) . "'";
			$json .= ",'" . addslashes($comentStatus) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	
	///// get custom design list
	function getCustomDesigns() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'contact_name';
		$results = $this->Adminmodel->getCustomDesignList($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) 
		{
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['ID #: " . $row['id'] . "<br /><a href=\'" . SITE_URL . "admin/customs_design/view_detail/" . $row['id'] . "\'  class=\"edit\">View Detail</a>'";
			$json .= ",'" . addslashes($row['contact_name']) . "'";
			$json .= ",'" . addslashes($row['contact_email']) . "'";
			$json .= ",'" . addslashes( $row['contact_phone'] ) . "'";
			$json .= ",'" . addslashes($row['custom_desc']) . "'";
			$json .= ",'" . addslashes( date('d-m-Y', strtotime($row['request_date'])) ) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	
	function getBrands() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'image_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'image_title';
		$results = $this->Adminmodel->getbrands($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['brand_id'] . "',";
			$json .= "cell:['ID #: " . $row['brand_id'] . "<br /><a href=\'" . config_item('base_url') . "admin/brands/edit/" . $row['brand_id'] . "\'  class=\"edit\">Edit Brand</a>'";
			if ($row['brand_image'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . "frontimg/" . addslashes($row['brand_image']) . "\' width=\'80\'><br /> " . addslashes($row['brand_name']) . "'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br /> " . addslashes($row['brand_name']) . "'";
			$json .= ",'" . addslashes($row['brand_date']) . "'";
			$json .= ",'" . str_replace("\r", '<br />', str_replace("\n", '<br />', addslashes($row['brand_content']))) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function feedbacks($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->feedbacks($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					if (isset($_POST[$action . 'btn'])) {
						//  if ($this->form_validation->run() == FALSE){
						//    $data['error'] = 'ERROR ! Please check the error fields';
						//	    if($action != 'edit')$data['details'] = $_POST;
						//}else {
						$ret = $this->Adminmodel->feedbacks($_POST, $action, $id, 'watch');
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
						//}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['id'] = $id;
						$data['details'] = $this->Adminmodel->getFeedbacksByID($id);
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										 
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('feedbacks');
				$url = config_item('base_url') . 'admin/getfeedbacks';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'id', width : 80, sortable : true, align: 'center'},
																		{display: 'email address', name : 'email', width : 150, sortable : true, align: 'center'},
                                                                                                                  {display: 'Status', name : 'status', width : 85, sortable : true, align: 'center'},
                                                                                                                               {display: 'feedback Date', name : 'adddate', width : 85, sortable : true, align: 'center'}, 
																		{display: 'Comments', name : 'description', width : 220, sortable : true, align: 'center'}
																																			
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'ID #', name : 'id', isdefault: true},
																		{display: 'email', name : 'email', isdefault: true}
																		], 		
																	sortname: \"adddate\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Manage feedbacks</h1>',
																	useRp: true,
																	rp: 100,
																	showTableToggleBtn: false,
																	width:1025,
																	height: 800
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
                                                                                                                                                                 
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/feedbacks/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted feedbacks: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                   error:function (xhr, ajaxOptions, thrownError){
                                                                                                                                                                                                                        alert(xhr.status);
                                                                                                                                                                                                                        alert(xhr.responseText);
                                                                                                                                                                                                                    }               
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a feedback.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/feedbacks/add';
																			}			
																	}
														 
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/feedbacks', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getfeedbacks() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'email';
		$results = $this->Adminmodel->getfeedbacks($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
			$json .= "cell:['ID #: " . $row['id'] . "<br /><a href=\'" . config_item('base_url') . "admin/feedbacks/edit/" . $row['id'] . "\'  class=\"edit\">Edit Status</a>'";
			$json .= ",'" . addslashes($row['email']) . "'";
			$json .= ",'" . addslashes($row['status']) . "'";
			$json .= ",'" . addslashes($row['adddate']) . "'";
			$json .= ",'<span>" . strip_tags(str_replace("\r", '<br />', str_replace("\n", '<br />', addslashes($row['description'])))) . "</span>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function inventory() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = config_item('base_path') . "/inventoryCsv/" . basename($_FILES['template_file']['name']);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$fp = fopen($uploadfile, "r");
						$row = 1;
						$filePath = config_item('base_path') . "amazon/csv_qty_upc.txt";
						$fk = fopen($filePath, "w");
						$fileText = "product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
						fwrite($fk, $fileText);
						fclose($fk);
						while (!feof($fp)) {
							$data = fgetcsv($fp, $_FILES['template_file']['size']);
							if ($row > 1) {
								if (!empty($data[0])) {
									$this->Adminmodel->CsvHandler($data);
								}
							}
							$row++;
						}
						fclose($fp);
						$batchID = $this->Adminmodel->UploadOnAmazon(config_item('base_path') . "amazon/csv_qty_upc.txt");
						$data['message'] = 'Inventory Successfully Updated';
					}
				}
			}
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('inventory');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#ecommerce").click();
										 
										';
			$output = $this->load->view('admin/inventory', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function jewelriesinventory() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = config_item('base_path') . "/jewelriesinventory/" . basename($_FILES['template_file']['name']);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$fp = fopen($uploadfile, "r");
						$row = 1;
						//$filePath = config_item('base_path')."amazon/jew_csv_qty_upc.txt";
						//$fk = fopen($filePath,"w");
						//  $fileText ="product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
						//        fwrite($fk,$fileText);
						//      fclose($fk);
						while (!feof($fp)) {
							$data = fgetcsv($fp, $_FILES['template_file']['size']);
							if ($row > 1) {
								if (!empty($data[0])) {
									$this->Adminmodel->jewelriesinventory($data);
								}
							}
							$row++;
						}
						fclose($fp);
						//           $batchID = $this->Adminmodel->UploadOnAmazon(config_item('base_path')."amazon/csv_qty_upc.txt");
						$data['message'] = 'Inventory Successfully Updated';
					}
				}
			}
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('jewelriesinventory');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
		  									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#ecommerce").click();
										 
										';
			$output = $this->load->view('admin/jewelriesinventory', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
    //// send item to ebay
    function sendRapDiamondToEbay()
    {
        set_time_limit(0);
        
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        //pr("@adminlogin",$this->session->userdata('usertype'));
        if ($this->isadminlogin()) {
            
            $posted=array();
            $posted["ids"]=$this->input->post("ids",TRUE);
            $posted["cash_limit"]=$this->input->post("cash_limit",TRUE);
            
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('cash_limit', 'Cash Limit', 'trim|required|numeric');					
            $this->form_validation->set_rules('ids', 'Items', 'trim|required');
            $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
            if ($this->form_validation->run() == FALSE) {
                $data['error'] = 'ERROR ! Please check the error fields';
                $data['error'] .=  validation_errors();
                print $data['error'];
            }
            else {
                $ids=  explode(",", $posted["ids"]);
                
                $ret=$this->Adminmodel->getrapdiamondCashLimit(intval($posted["cash_limit"]), $ids,'');
                print $ret;
            }
            
            return TRUE;
        }
        
        return FALSE;
    }  
	function jewelriesinventory_w() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = config_item('base_path') . "jewelriesinventory/" . basename($_FILES['template_file']['name']);
					//var_dump($uploadfile);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$fp = fopen($uploadfile, "r");
						$row = 1;
						//$filePath = config_item('base_path')."amazon/jew_csv_qty_upc.txt";
						//$fk = fopen($filePath,"w");
						//  $fileText ="product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
						//        fwrite($fk,$fileText);
						//      fclose($fk);
						//var_dump($fp);
						while (!feof($fp)) {
							$data = fgetcsv($fp, $_FILES['template_file']['size']);
							
							//echo "<pre>";
							//var_dump($data);
							
							if ($row > 1) {
								if (!empty($data[18])) {
									$this->Adminmodel->jewelriesinventoryCustom2($data);
									//$this->Cronmodel->SaveEngagementRingsInDBCustom($data);
								}
							}
							$row++;
						}
						fclose($fp);
						//           $batchID = $this->Adminmodel->UploadOnAmazon(config_item('base_path')."amazon/csv_qty_upc.txt");
						$data['message'] = 'Inventory Successfully Updated';
					}
				}
			}
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('jewelriesinventory');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
		  									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#ecommerce").click();
										 
										';
			$output = $this->load->view('admin/jewelriesinventory_w', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
	
	function diamondcronupdate() {
	
	      $uploadfile = config_item('base_path') . "csv/Retail Upload.csv";
	      //var_dump($uploadfile);
	      $fp = fopen($uploadfile, "r");
	      $row = 1;
	      //$filePath = config_item('base_path')."amazon/jew_csv_qty_upc.txt";
	      //$fk = fopen($filePath,"w");
	      //  $fileText ="product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
	      //        fwrite($fk,$fileText);
	      //      fclose($fk);
	      //var_dump($fp);
	      
	      $this->db->query("DELETE FROM `dev_rapproduct`");
	      //$this->load->dbforge();
	     // $this->dbforge->drop_column('dev_rapproduct', 'lot');
	      //$fields = array(
              //          'lot' => array('type' => 'INT', 'constraint' => 5, 'auto_increment' => TRUE )
              //          );
	     // $this->dbforge->add_column('dev_rapproduct', $fields);
	      //$this->dbforge->add_key('lot', TRUE);
	      
	      while (!feof($fp)) {
		      $data = fgetcsv($fp);
		      
		      //echo "<pre>";
		      //var_dump($data);
		      
		      if ($row > 1) {
			      if (!empty($data[18])) {
				      $this->Adminmodel->jewelriesinventoryCustom2($data , $row);
				      //$this->Cronmodel->SaveEngagementRingsInDBCustom($data);
			      }
		      }
		      $row++;
	      }
	      fclose($fp);
	      //           $batchID = $this->Adminmodel->UploadOnAmazon(config_item('base_path')."amazon/csv_qty_upc.txt");
	      echo 'Successfully Updated Diamonds to DB ';
		  
		
			
	}
	
	
	function povadajewelries() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = config_item('base_path') . "/povadacsv/" . basename($_FILES['template_file']['name']);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$fp = fopen($uploadfile, "r");
						$row = 1;
						while (!feof($fp)) {
							$data = fgetcsv($fp, $_FILES['template_file']['size']);
							if ($row > 1) {
								if (!empty($data[0])) {
									$this->Adminmodel->povadaupload($data);
								}
							}
							$row++;
						}
						fclose($fp);
						$data['message'] = 'Inventory Successfully Updated';
					}
				} else {
					$data['message'] = 'Uploaded file has error Please download the template and add paste the records on that records should maximum 1000 at a time';
				}
			}
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('povadajewelries');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#ecommerce").click();
										 
										';
			$output = $this->load->view('admin/povadajewelries', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	
	////Start: Modified function for jewelries managment Date:9.3.13
	 
	
	function jew_man_catajaxreq() {
        $gender = $_REQUEST['gender'];
	$cat = $_REQUEST['sel'];
        $data['name'] = $this->getAdminDetails();
        $string = '<select onchange="return getSubCategoryBox(this.value);" id="category" name="category">';
        if ($gender == 'M') {
            $substring = $this->jew_man_getSubcat(3291859018,$cat);
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
        if ($gender == 'F' || $gender == 'Women') {
            $substring = $this->jew_man_getSubcat(3292596018,$cat);
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
        if ($gender == 'C') {
            $substring = $this->jew_man_getSubcat(3291859019,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
        if ($gender == 'E') {
            $substring = $this->jew_man_getSubcat(3291859023,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
		if ($gender == 'D') {
            $substring = $this->jew_man_getSubcat(3291859041,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
		
		
		if ($gender == 'R') {
            $substring = $this->jew_man_getSubcat(3291859050,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
		
		if ($gender == 'CH') {
            $substring = $this->jew_man_getSubcat(3291859060,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
		if ($gender == 'CL') {
            $substring = $this->jew_man_getSubcat(3291859070,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
		if ($gender == 'S') {
            $substring = $this->jew_man_getSubcat(3291859080,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
		if ($gender == 'CG') {
            $substring = $this->jew_man_getSubcat(3291859090,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
	
		if ($gender == 'U') {
            $substring = $this->jew_man_getSubcat(3291859018,$cat); /*First Time load sub category code and this category id is use another view to parent category id*/
            if (!empty($substring)) {
                $string = $string . $substring;
            }
            $string .= "</select>";
        }
        echo $string;
        exit;
    }
    function jew_man_getsubcatajaxreq() {
        $catid = $_REQUEST['catid'];
		$subcat = $_REQUEST['subid'];
		$unisex = $_REQUEST['unisex'];
		
		//echo "$catid"."->$subcat";
        //onchange="getSubCategoryBox(this.value);" 
        $string = '<select id="subcategory" name="subcategory" onchange="checkOpt(this.value);">';
        //$substring = $this->getSubcat($catid);
		$substring = $this->jew_man_getSubcat($catid,$subcat);
        if (!empty($substring)) {
        	if($unisex == 'unisex')
        		$substring = str_replace('Men', 'Unisex', $substring);
            $string = $string . $substring;
        }
        $string .= "</select>";
        echo $string;
        exit;
    }
	
 
	
	function jew_man_getSubcat($rootid, $cateid=0) {
		
		$malak_db = $this->load->database('default', TRUE); // Connect to malak database
		//$this->db = $malak_db;
		$statement = "select * from `dev_ebaycategories` where parent_id = '$rootid'  ";
		$query = $malak_db->query($statement);
		//$squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
		//$subnumofcat = mysql_num_rows($squery);
		//echo $statement;
		//echo '->'.$query->num_rows(); 
		if ($query->num_rows() > 0) {
			
		 	foreach ($query->result() as $row){
                            $selected = ( $row->category_id == $cateid ? 'selected' : '' );
                            $substring = $substring . "<option value='" . $row->category_id . "' ".$selected.">&nbsp;|-" . $row->category_name . "</option>";
		 		 
		   	}
			
			
			/*
			while ($j < $subnumofcat) {
				$subcat = mysql_fetch_array($squery) or die(mysql_error());
				$substring = $substring . "<option value='" . $subcat['category_id'] . "'>&nbsp;|-" . $subcat['category_name'] . "</option>";
				if ($rootid != 32) {
					//  $childstring = $this->getMoreChilds($subcat['id']);
					//  $substring = $substring.$childstring;
				}
				$j = $j + 1;
			}*/
		}
		return trim($substring);
	}	
	
	////End:  Modified function for jewelries managment Date:9.3.13
	
	function catajaxreq() {
		$gender = $_REQUEST['gender'];
		$data['name'] = $this->getAdminDetails();
		$string = '<select onchange="return getSubCategoryBox(this.value);" id="category" name="category">';
		if ($gender == 'M') {
			$substring = $this->getSubcat(3291859018);
			if (!empty($substring)) {
				$string = $string . $substring;
			}
			$string .= "</select>";
		}
		if ($gender == 'F') {
			$substring = $this->getSubcat(3292596018);
			if (!empty($substring)) {
				$string = $string . $substring;
			}
			$string .= "</select>";
		}
		echo $string;
		exit;
	}
	function getsubcatajaxreq() {
		$catid = $_REQUEST['catid'];
		//onchange="getSubCategoryBox(this.value);"
		$string = '<select id="subcategory" name="subcategory" onchange="checkOpt(this.value);">';
		$substring = $this->getSubcat($catid);
		if (!empty($substring)) {
			$string = $string . $substring;
		}
		$string .= "</select>";
		echo $string;
		exit;
	}
	function getSubcat($rootid) {
		$squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
		$subnumofcat = mysql_num_rows($squery);
		$j = 0;
		if ($subnumofcat > 0) {
			while ($j < $subnumofcat) {
				$subcat = mysql_fetch_array($squery) or die(mysql_error());
				$substring = $substring . "<option value='" . $subcat['category_id'] . "'>&nbsp;|-" . $subcat['category_name'] . "</option>";
				if ($rootid != 32) {
					//  $childstring = $this->getMoreChilds($subcat['id']);
					//  $substring = $substring.$childstring;
				}
				$j = $j + 1;
			}
		}
		return trim($substring);
	}
	function getMoreChilds($rootid) {
		$squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
		$subnumofcat = mysql_num_rows($squery);
		$j = 0;
		if ($subnumofcat > 0) {
			while ($j < $subnumofcat) {
				$subcat = mysql_fetch_array($squery) or die(mysql_error());
				$substring = $substring . "<option value='" . $subcat['category_id'] . "'>&nbsp;&nbsp;&nbsp;|----" . $subcat['category_name'] . "</option>";
				// $childstring = $this->getMoreChilds1($subcat['id']);
				//  $substring = $substring.$childstring;
				$j = $j + 1;
			}
		}
		return trim($substring);
	}
	function getMoreChilds1($rootid) {
		$squery = mysql_query("select * from `dev_ebaycategories` where parent_id = '$rootid'  ") or die(mysql_error());
		$subnumofcat = mysql_num_rows($squery);
		$j = 0;
		if ($subnumofcat > 0) {
			while ($j < $subnumofcat) {
				$subcat = mysql_fetch_array($squery) or die(mysql_error());
				$substring = $substring . "<option value='" . $subcat['category_id'] . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|----" . $subcat['category_name'] . "</option>";
				$j = $j + 1;
			}
		}
		return trim($substring);
	}
	function stuller($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->stuller($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					if (isset($_POST['btn'])) {
						$ret = $this->Adminmodel->stuller($_POST, $action, $id);
						$data['details'] = $_POST;
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['details'] = $this->Adminmodel->getstullerByID($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
			}
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
	         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										';
										
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('povadajewelries');
			
			$url = config_item('base_url') . 'admin/getstuller/';
			$data['action'] = $action;
			$data['onloadextraheader'] .= " $(\"#results\").flexigrid
									(
										{
										url: '" . $url . "',
										dataType: 'json',
										colModel : [
										{display: 'ID', name : 'ID', width : 100, sortable : true, align: 'center'},
										{display: 'EZ Status', name : 'EZ Status', width : 130, sortable : false, align: 'center'},
										{display: 'Image', name : 'Image', width : 100, sortable : true, align: 'center'},
                                        {display: 'Sku', name : 'Sku', width : 100, sortable : true, align: 'center'},
                                        {display: 'Price', name : 'Price', width : 50, sortable : true, align: 'left'},
                                        
                                        {display: 'ShortDescription', name : 'ShortDescription', width : 150, sortable : true, align: 'center'},
										{display: 'GroupDescription', name : 'GroupDescription', width : 180, sortable : true, align: 'left'},
										{display: 'MerchandisingCategory1', name : 'MerchandisingCategory1', width : 180, sortable : true, align: 'left'},
										{display: 'MerchandisingCategory2', name : 'MerchandisingCategory2', width : 90, sortable : true, align: 'left'},
                                        {display: 'MerchandisingCategory3', name : 'MerchandisingCategory3', width : 90, sortable : true, align: 'left'},
										{display: 'MerchandisingCategory4', name : 'MerchandisingCategory4', width : 60, sortable : true, align: 'left'},
										{display: 'MerchandisingCategory5', name : 'MerchandisingCategory5', width : 50, sortable : true, align: 'left'},

										{display: 'WebCategories', name : 'WebCategories', width : 60, sortable : true, align: 'left'},
												
										{display: 'Collection', name : 'Collection', width : 60, sortable : true, align: 'left'},
										{display: 'OnHand', name : 'OnHand', width : 60, sortable : true, align: 'left'},
										{display: 'Status', name : 'Status', width : 60, sortable : true, align: 'left'},
										{display: 'Price', name : 'Price', width : 60, sortable : true, align: 'left'},
										{display: 'UnitOfSale', name : 'UnitOfSale', width : 60, sortable : true, align: 'left'},
										{display: 'Weight', name : 'Weight', width : 60, sortable : true, align: 'left'},
										{display: 'WeightUnitOfMeasure', name : 'WeightUnitOfMeasure', width : 60, sortable : true, align: 'left'},
										{display: 'GramWeight', name : 'GramWeight', width : 60, sortable : true, align: 'left'},
										{display: 'RingSize', name : 'RingSize', width : 60, sortable : true, align: 'left'},
										{display: 'RingSizable', name : 'RingSizable', width : 60, sortable : true, align: 'left'},
										{display: 'RingSizeType', name : 'RingSizeType', width : 60, sortable : true, align: 'left'},
										{display: 'LeadTime', name : 'LeadTime', width : 60, sortable : true, align: 'left'},
										
							         	{display: 'DescriptiveElementGroup', name : 'DescriptiveElementGroup', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElements', name : 'DescriptiveElements', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName1', name : 'DescriptiveElementName1', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue1', name : 'DescriptiveElementValue1', width : 60, sortable : true, align: 'left'},
										
										{display: 'DescriptiveElementName2', name : 'DescriptiveElementName2', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue2', name : 'DescriptiveElementValue2', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName3', name : 'DescriptiveElementName3', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue3', name : 'DescriptiveElementValue3', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName4', name : 'DescriptiveElementName4', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue4', name : 'DescriptiveElementValue4', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName5', name : 'DescriptiveElementName5', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue5', name : 'DescriptiveElementValue5', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName6', name : 'DescriptiveElementName6', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue6', name : 'DescriptiveElementValue6', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName7', name : 'DescriptiveElementName7', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue7', name : 'DescriptiveElementValue7', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName8', name : 'DescriptiveElementName8', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue8', name : 'DescriptiveElementValue8', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName9', name : 'DescriptiveElementName9', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue9', name : 'DescriptiveElementValue9', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName10', name : 'DescriptiveElementName10', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue10', name : 'DescriptiveElementValue10', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName11', name : 'DescriptiveElementName11', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue11', name : 'DescriptiveElementValue11', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName12', name : 'DescriptiveElementName12', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue12', name : 'DescriptiveElementValue12', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName13', name : 'DescriptiveElementName13', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue13', name : 'DescriptiveElementValue13', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName14', name : 'DescriptiveElementName14', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue14', name : 'DescriptiveElementValue14', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementName15', name : 'DescriptiveElementName15', width : 60, sortable : true, align: 'left'},
										{display: 'DescriptiveElementValue15', name : 'DescriptiveElementValue15', width : 60, sortable : true, align: 'left'},
										
										{display: 'ReadyToWear', name : 'ReadyToWear', width : 60, sortable : true, align: 'left'},
										{display: 'ConfigurationModel', name : 'ConfigurationModel', width : 60, sortable : true, align: 'left'},
										{display: 'SetWith', name : 'SetWith', width : 60, sortable : true, align: 'left'},
										{display: 'MadeWith', name : 'MadeWith', width : 60, sortable : true, align: 'left'},
										{display: 'Images', name : 'Images', width : 60, sortable : true, align: 'left'},
										{display: 'GroupImages', name : 'GroupImages', width : 60, sortable : true, align: 'left'},
										{display: 'Videos', name : 'Videos', width : 60, sortable : true, align: 'left'},
										{display: 'GroupVideos', name : 'GroupVideos', width : 60, sortable : true, align: 'left'},
										{display: 'CreationDate', name : 'CreationDate', width : 60, sortable : true, align: 'left'},
                                        
										],
										 buttons : [ 				 								
                                               {name: 'Add', bclass: 'delete' , onpress : test},
											  {separator: true}
                                                                                            ],
										searchitems : [
										{display: 'Item Number', name : 'stuller_id', isdefault: true}
										],
										sortname: \"stuller_id\",
										sortorder: \"asc\",
										usepager: true,
										title: '<h1 class=\"pageheader\">Stuller jewellry</h1>',
										useRp: true,
										rp: 100,
										showTableToggleBtn: false,
										width:1025,
										height: 800
										}
									);
									
									function test(com,grid)
															{
												window.location = '" . config_item('base_url') . "admin/stullerjewelries';
															}	
									
									";
			$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/stuller', $data, true);
		
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getstuller() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'stuller_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'itemid';
		$results = $this->Adminmodel->getstuller($page, $rp, $sortname, $sortorder, $query, $qtype);
		
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$i = 0;
		foreach ($results['result'] as $row) {
		    
		    
		    
		    if($i < 103){
		    
			//$image1 = config_item('base_path')."stuller/".$row['img1'];
			//$image1 = $row['img1'];
			$row['img1'] = urldecode($row['img1']);
			$image1 = "http://www.stuller.com/apps/images/" . str_replace("\\", "/", $row['img1']);
			//$myimage	=	json_decode($row['Videos']);
			$json_decoded = json_decode($row['Videos']);
			$imagemy = $json_decoded[0]->{'FullUrl'};
			 
			// $image = $image1 = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['stuller_id'] . "',";
			$json .= "cell:['ID #: " . $row['stuller_id'] . "<br /><a href=\'" . config_item('base_url') . "admin/stuller/edit/" . $row['stuller_id'] . "\'  class=\"edit\">Edit</a>'";
			$row['ezstatus'] == true ? $json .= ",'" . "<a href=\'" . config_item('base_url') . "admin/ezstatusedit/" . $row['stuller_id'] . "/disable\'  class=\"edit\">Enabled</a>'" : $json .= ",'" . "<a href=\'" . config_item('base_url') . "admin/ezstatusedit/" . $row['stuller_id'] . "/enable\'  class=\"edit\">Disabled</a>'";
			$json .= ",'<img src=\'" .addslashes(str_replace('$standard$', 'hei=300&wid=300', $imagemy)). "\' width=\'80\'>'";
			$json .= ",'" . addslashes($row['Sku']) . " '";
			$json .= ",'" . addslashes($row['Price']) . " '";
			/*$json .= ",'" . addslashes($row['Description']) . " '";*/
			$json .= ",'" . addslashes($row['ShortDescription']) . " '";
			$json .= ",'" . addslashes($row['GroupDescription']) . " '";
			$json .= ",'" . addslashes($row['MerchandisingCategory1']) . " '";
			$json .= ",'" . addslashes($row['MerchandisingCategory2']) . " '";
			$json .= ",'" . addslashes($row['MerchandisingCategory3']) . " '";
			$json .= ",'" . addslashes($row['MerchandisingCategory4']) . " '";
			$json .= ",'" . addslashes($row['MerchandisingCategory5']) . " '";
			$json .= ",'" . addslashes($row['WebCategories']) . " '";
			$json .= ",'" . addslashes($row['Collection']) . " '";
			$json .= ",'" . addslashes($row['OnHand']) . " '";
			$json .= ",'" . addslashes($row['Status']) . " '";
			$json .= ",'" . addslashes($row['UnitOfSale']) . " '";
			$json .= ",'" . addslashes($row['Weight']) . " '";
			$json .= ",'" . addslashes($row['WeightUnitOfMeasure']) . " '";
			$json .= ",'" . addslashes($row['GramWeight']) . " '";
			$json .= ",'" . addslashes($row['RingSize']) . " '";
			$json .= ",'" . addslashes($row['RingSizable']) . " '";
			$json .= ",'" . addslashes($row['RingSizeype']) . " '";
			$json .= ",'" . addslashes($row['LeadTime']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementGroup']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElements']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName1']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue1']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName2']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue2']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName3']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue3']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName4']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue4']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName5']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue5']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName6']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue6']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName7']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue7']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue8']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName9']) . " '";
			
			$json .= ",'" . addslashes($row['DescriptiveElementValue9']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName10']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue10']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName11']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue11']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName12']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue12']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName13']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue13']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementName14']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue14']) . " '";
			
			
			$json .= ",'" . addslashes($row['DescriptiveElementName15']) . " '";
			$json .= ",'" . addslashes($row['DescriptiveElementValue15']) . " '";
			$json .= ",'" . addslashes($row['ReadyToWear']) . " '";
			$json .= ",'" . addslashes($row['ConfigurationModel']) . " '";
			$json .= ",'" . addslashes($row['SetWith']) . " '";
			$json .= ",'" . addslashes($row['MadeWith']) . " '";
			$json .= ",'" . addslashes($row['Images']) . " '";
			$json .= ",'" . addslashes($row['GroupImages']) . " '";
			$json .= ",'" . addslashes($row['Videos']) . " '";
			$json .= ",'" . addslashes($row['GroupVideos']) . " '";
			$json .= ",'" . addslashes($row['CreationDate']) . " '";

			$json .= "]";
			$json .= "}";
			$rc = true;
			
		    }
			
			$i = $i + 1;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function canadaorders($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->canadaorders($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
									         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#fullfillments").click();
										';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('canadaorders');
				$url = config_item('base_url') . 'admin/getcanadaorders/';
				$data['action'] = $action;
				$data['onloadextraheader'] .= " $(\"#results\").flexigrid
									(
										{
										url: '" . $url . "',
										dataType: 'json',
										colModel : [
										{display: 'Orderid', name : 'orderid', width : 150, sortable : true, align: 'left'},
                                                                                {display: 'Order Date', name : 'purchase-date', width : 150, sortable : true, align: 'left'},
										{display: 'Product Id', name : 'order-item-id', width : 150, sortable : true, align: 'left'},
										{display: 'Shipped Fedex', name : 'shipped-fedex', width : 50, sortable : true, align: 'left'},
										{display: 'Shipped USPS', name : 'shipped-usps', width : 50, sortable : true, align: 'left'},										
										{display: 'Buyer Name', name : 'buyer-name', width : 150, sortable : true, align: 'left'},
										{display: 'Product Name', name : 'product-name', width : 150, sortable : true, align: 'center'},
										{display: 'Quantity Sold', name : 'quantity-purchased', width : 50, sortable : true, align: 'center'},
										{display: 'Shipping Address', name : 'ship-address2', width : 100, sortable : true, align: 'center'},
										{display: 'Shipping City', name : 'ship-cityship-city', width : 50, sortable : true, align: 'center'},
										{display: 'Shipping State', name : 'ship-state', width : 50, sortable : true, align: 'center'},
										{display: 'Shipping Country', name : 'ship-country', width : 150, sortable : true, align: 'center'},
										{display: 'Shipping Zip', name : 'ship-postal-code', width : 150, sortable : true, align: 'center'},
										{display: 'Shipping Cost', name : 'shipping-price', width : 150, sortable : true, align: 'center'},																				
										{display: 'Product Price', name : 'item-price', width : 250, sortable : true, align: 'left'},																				
									        {display: 'Stamps', name : 'orderid', width : 250, sortable : true, align: 'left'}
										],
										 buttons : [ 
					 								{name: 'Delete', bclass: 'delete', onpress : test},
													{separator: true}
												 ],
										searchitems : [
										{display: 'id', name : 'id', isdefault: true}
										],
										sortname: \"id\",
										sortorder: \"asc\",
										usepager: true,
										title: '<h1 class=\"pageheader\">Canada Fullfilllment</h1>',
										useRp: true,
										rp: 100,
										showTableToggleBtn: false,
										width:1025,
										height: 800
										}
									);
									
									function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/canadaorders/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																	 		
																	}
									";
				$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$output = $this->load->view('admin/canadaorders', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getcanadaorders() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 100;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
		$results = $this->Adminmodel->getcanadaorders($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$i = 0;
		foreach ($results['result'] as $row) {
			$shape = '';
			$action = config_item('base_url') . "admin/generateXMLStamp/" . $row['orderid'];
			$orderid = $row['orderid'];
			$fedex = config_item('base_url') . "/admin/fedex/$orderid";
			$usps = config_item('base_url') . "/admin/usps/$orderid";
			$fedexTrackingCode = $row['fedex_tracking_code'];
			$uspsTrackingCode = $row['usps_tracking_code'];
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['orderid'] . "',";
			$json .= "cell:['" . $row['orderid'] . "'";
			$json .= ",'" . addslashes($row['purchase-date']) . " '";
			$json .= ",'" . addslashes($row['order-item-id']) . " '";
			if (!empty($fedexTrackingCode)) {
				//$json .= ",'".addslashes($fedexTrackingCode)." '";
				$json .= ",'<a href=\"$fedex\"  style=\"color:maroon;font-weight:bold;\">Ship to Fedex</a>'";
			} else {
				$json .= ",'<a href=\"$fedex\"  style=\"color:maroon;font-weight:bold;\">Ship to Fedex</a>'";
			}
			if (!empty($uspsTrackingCode)) {
				//$json .= ",'".addslashes($uspsTrackingCode)." '";
				$json .= ",'<a href=\"$usps\" style=\"color:maroon;font-weight:bold;\">Ship to USPS</a>'";
			} else {
				$json .= ",'<a href=\"$usps\" style=\"color:maroon;font-weight:bold;\">Ship to USPS</a>'";
			}
			$json .= ",'" . addslashes($row['buyer-name']) . " '";
			$json .= ",'" . addslashes($row['product-name']) . " '";
			$json .= ",'" . addslashes($row['quantity-purchased']) . "'";
			$json .= ",'" . addslashes($row['ship-address2']) . " '";
			$json .= ",'" . addslashes($row['ship-cityship-city']) . " '";
			$json .= ",'" . addslashes($row['ship-state']) . " '";
			$json .= ",'" . addslashes($row['ship-country']) . " '";
			$json .= ",'" . addslashes($row['ship-postal-code']) . " '";
			$json .= ",'" . '$' . number_format(addslashes($row['shipping-price']), 2) . " '";
			$json .= ",'" . '$' . number_format(addslashes($row['item-price']), 2) . " '";
			$json .= ",'<a href=\"$action\" style=\"color:maroon;font-weight:bold;\">download</a>'";
			$json .= "]";
			$json .= "}";
			$rc = true;
			$i = $i + 1;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function getebaycat() {
		echo $this->Adminmodel->getebaycategories();
	}
	function getstullercsv() {
		$destination = config_item('base_path') . 'stuller/ReadyforRetail.csv';
		if (file_exists($destination)) {
			$handle = fopen($destination, "r");
			$i = 0;
			while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
				if ($i > 0) {
					$t = $this->Cronmodel->savestuller($data);
				}
				$i++;
			}
		}
	}
	function getQualityGoldcsv() {
		//The filename /home/sugarkarats/public_html/QualityGold/ftp.qgold.com/Collections/FamilyJewelry/FamilyRingFlyerFall2011/FamilyCelebration.xls is not readable
		///public_html/QualityGold/ftp.qgold.com/Collections/FamilyJewelry/MothersJewelry
		///public_html/QualityGold/ftp.qgold.com/Collections/Tapout/Tap-Out-Product_Details_040810.xls
		$destination = config_item('base_path') . 'QualityGold/ftp.qgold.com/Silver11/Pages789-810/SilverPage789-810.xls';
		// if(file_exists($destination)) {
		require_once config_item('base_path') . 'scripts/excel/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$data->read($destination);
		$j = 1;
		for ($i = 3; $i <= $data->sheets[$j]['numRows']; $i++) {
			$itemNumber = (string) $data->sheets[$j]['cells'][$i][1];
			$image = (string) $data->sheets[$j]['cells'][$i][2];
			$description = (string) $data->sheets[$j]['cells'][$i][3];
			$weight = (string) $data->sheets[$j]['cells'][$i][4];
			$category = (string) $data->sheets[$j]['cells'][$i][7];
			$page = (string) $data->sheets[$j]['cells'][$i][6];
			$size = (string) $data->sheets[0]['cells'][$i][9];
			$metal = (string) $data->sheets[$j]['cells'][$i][10];
			//                  $jew_cost = ($data->sheets[0]['cells'][$i][9] * 24);
			$catalog = ($data->sheets[$j]['cells'][$i][16] * 1850);
			$length = ''; // (string)$data->sheets[$j]['cells'][$i][4] ;
			$width = ''; // (string)$data->sheets[$j]['cells'][$i][5];
			$height = ''; //  (string)$data->sheets[$j]['cells'][$i][6];
			$chain_length = //  (string)$data->sheets[0]['cells'][$i][5] ;
			$chain_width = //  (string)$data->sheets[0]['cells'][$i][6];
			$totalweight = (string) $data->sheets[0]['cells'][$i][5];
			$gemstonewt = (string) $data->sheets[0]['cells'][$i][6];
			$cost_15 = ''; // (string)$data->sheets[0]['cells'][$i][13];
			$cost_20 = ''; // (string)$data->sheets[0]['cells'][$i][14];
			$book = (string) $data->sheets[0]['cells'][$i][5];
			$status = (string) $data->sheets[$j]['cells'][$i][8];
			$cost_30 = ''; // (string)$data->sheets[0]['cells'][$i][12];
			$cost_35 = ''; // (string)$data->sheets[0]['cells'][$i][13];
			$cost_40 = (string) ($data->sheets[0]['cells'][$i][11] * 40);
			//echo "micasony".$data->sheets[0]['cells'][$i][11];
			$cost_45 = (string) ($data->sheets[0]['cells'][$i][12] * 45);
			$cost_50 = (string) ($data->sheets[0]['cells'][$i][13] * 50);
			$current_status = (string) $data->sheets[$j]['cells'][$i][14];
			$rank = (string) $data->sheets[$j]['cells'][$i][15];
			$folder = 'Silver11/Pages789-810';
			$this->Adminmodel->savequalitygold($itemNumber, $image, $description, $weight, $book, $page, $category, $status, $size, $metal, $cost_40, $cost_45, $cost_50, $current_status, $rank, $folder, $cost_30, $cost_35, $length, $width, $totalweight, $gemstonewt, $catalog, $cost_15, $cost_20);
		}
		//}
	}
	function qualitygold($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->qualitygold($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					if (isset($_POST['btn'])) {
						$ret = $this->Adminmodel->qualitygold($_POST, $action, $id);
						$data['details'] = $_POST;
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['details'] = $this->Adminmodel->getqualitygoldByID($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
			}
			/*{display: 'Jewellry At 45', name : 'cost_45', width : 80, sortable : true, align: 'left'},
			{display: 'Jewellry At 50', name : 'cost_50', width : 80, sortable : true, align: 'left'},
			,
                                                                               
										{display: 'Page', name : 'page', width : 180, sortable : true, align: 'left'}
			*/
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
	         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('povadajewelries');
			$url = config_item('base_url') . 'admin/getqualitygold';
			$data['action'] = $action;
			$data['onloadextraheader'] .= " $(\"#results\").flexigrid
									(
										{
										url: '" . $url . "',
										dataType: 'json',
										colModel : [
										
                                        {display: 'ID', name : 'qd_id', width : 50, sortable : true, align: 'center'},
										{display: 'EZ Status', name : 'EZ Status', width : 50, sortable : false, align: 'center'},
										{display: 'Item', name : 'Item', width : 130, sortable : false, align: 'center'},
										{display: 'MSRP', name : 'MSRP', width : 50, sortable : true, align: 'left'},
										{display: 'Price', name : 'Price', width : 50, sortable : true, align: 'left'},
										
                                        {display: 'Description', name : 'Description', width : 50, sortable : true, align: 'left'},
										{display: 'Status', name : 'Status', width : 50, sortable : true, align: 'center'},
										{display: 'Weight', name : 'Weight', width : 50, sortable : true, align: 'left'},
                                        {display: 'CT_Weight', name : 'CT_Weight', width : 80, sortable : true, align: 'left'},
											
										{display: 'Gem_Weight', name : 'Gem_Weight', width : 50, sortable : true, align: 'left'},
										{display: 'Size', name : 'Size', width : 50, sortable : true, align: 'left'},
										{display: 'Length', name : 'Length', width : 50, sortable : true, align: 'left'},
										{display: 'Width', name : 'Width', width : 50, sortable : true, align: 'left'},
										{display: 'Sizeable', name : 'Sizeable', width : 50, sortable : true, align: 'left'},
										{display: 'Metal_Desc', name : 'Metal_Desc', width : 50, sortable : true, align: 'left'},
										{display: 'Image', name : 'Image', width : 50, sortable : true, align: 'left'},
										{display: 'UM_Sales', name : 'UM_Sales', width : 50, sortable : true, align: 'left'},
										{display: 'Qty_Avail', name : 'Qty_Avail', width : 50, sortable : true, align: 'left'},
										{display: 'Metal_Price', name : 'Metal_Price', width : 50, sortable : true, align: 'left'},												
										{display: 'Customer_Style', name : 'Customer_Style', width : 50, sortable : true, align: 'left'},
										{display: 'Categories', name : 'Categories', width : 50, sortable : true, align: 'left'},
										{display: 'Attributes', name : 'Attributes', width : 50, sortable : true, align: 'left'},
										
										{display: 'Item_Type', name : 'Item_Type', width : 50, sortable : true, align: 'left'},
										{display: 'DateAdded', name : 'DateAdded', width : 50, sortable : true, align: 'left'},
										{display: 'ProductLine', name : 'ProductLine', width : 50, sortable : true, align: 'left'},
										{display: 'ImageLink_100', name : 'ImageLink_100', width : 50, sortable : true, align: 'left'},
										{display: 'ImageLink_275', name : 'ImageLink_275', width : 50, sortable : true, align: 'left'},
										{display: 'ImageLink_500', name : 'ImageLink_500', width : 50, sortable : true, align: 'left'},
										{display: 'Country_Of_Origin', name : 'Country_Of_Origin', width : 50, sortable : true, align: 'left'}
								
																	   
										],
										 buttons : [ 				 								
                                                                                          {name: 'Add', bclass: 'delete' , onpress : test},
											  {separator: true}
                                                                                            ],
										searchitems : [
										{display: 'Item Number', name : 'qg_id', isdefault: true}
										],
										sortname: \"qg_id\",
										sortorder: \"asc\",
										usepager: true,
										title: '<h1 class=\"pageheader\">Qualty & Gold</h1>',
										useRp: true,
										rp: 100,
										showTableToggleBtn: false,
										width:1025,
										height: 800
										}
									);
									
									function test(com,grid)
															{
												window.location = '" . config_item('base_url') . "admin/qualitygold';
															}	
									
									";
			$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/qualitygold', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
        
	function uniquesettings($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->qualitygold($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					if (isset($_POST['btn'])) {
						$ret = $this->Adminmodel->qualitygold($_POST, $action, $id);
						$data['details'] = $_POST;
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$data['details'] = $this->Adminmodel->getqualitygoldByID($id);
						$details = $data['details'];
						$data['id'] = $id;
					}
				}
			}
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()									    {
										     $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
	         $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
										});
										$("#rapnet").click();
										';
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('povadajewelries');
			$url = config_item('base_url') . 'admin/getuniquesettings';
			$data['action'] = $action;
			$data['onloadextraheader'] .= " $(\"#results\").flexigrid
									(
										{
										url: '" . $url . "',
										dataType: 'json',
										colModel : [
                                                                                {display: 'ID', name : 'id', width : 80, sortable : true, align: 'center'},
				{display: 'EZ Status', name : 'EZ Status', width : 130, sortable : false, align: 'center'},
										{display: 'Item Name', name : 'name', width : 50, sortable : true, align: 'center'},
												{display: 'Catagory', name : 'catagory', width : 50, sortable : true, align: 'center'},
                                                                                {display: 'Image', name : 'image', width : 150, sortable : true, align: 'left'},				
                                                                                {display: 'Style Group', name : 'style_group', width : 150, sortable : true, align: 'left'},				
                                                                                {display: 'Metal Weight', name : 'metal_weight', width : 60, sortable : true, align: 'left'},				
                                                                                {display: 'Bail Info', name : 'bail_info', width : 50, sortable : true, align: 'left'},				
                                                                                {display: 'Stone Weight', name : 'stone_weight', width : 60, sortable : true, align: 'left'},				
                                                                                {display: 'Supplied Stones', name : 'supplied_stones', width : 60, sortable : true, align: 'left'},				
                                                                                {display: 'Top Width', name : 'top_width', width : 60, sortable : true, align: 'left'},				
                                                                                {display: 'Bottom Width', name : 'bottom_width', width : 60, sortable : true, align: 'left'},				
                                                                                {display: 'Top Height', name : 'top_height', width : 60, sortable : true, align: 'left'},				
                                                                                {display: 'Bottom Height', name : 'bottom_height', width : 60, sortable : true, align: 'left'},				
                                                                                {display: 'Ring Size', name : 'ring_size', width : 60, sortable : true, align: 'left'}				
										],
										buttons : [ 				 								
                                                                                          {name: 'Add', bclass: 'delete' , onpress : test},
											  {separator: true}
                                                                                            ],
										searchitems : [
										{display: 'Item Number', name : 'stuller_id', isdefault: true}
										],
										sortname: \"id\",
										sortorder: \"asc\",
										usepager: true,
										title: '<h1 class=\"pageheader\">Unique Settings</h1>',
										useRp: true,
										rp: 100,
										showTableToggleBtn: false,
										width:1100,
										height: 800
										}
									);
									
									function test(com,grid)
															{
												window.location = '" . config_item('base_url') . "admin/uniquesettings';
															}	
									
									";
			$data['extraheader'] = '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/uniquesettings', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}        
        
	function getuniquesettings() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'itemid';
		$results = $this->Adminmodel->getuniquesettings($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$i = 0;
                //print_r($results['result']);
		foreach ($results['result'] as $row) {
			
			$mynewresult	=	$this->Adminmodel->getordercat($row['id']);
			//$image = config_item('base_path')."images/povada/".$row['SKU'].".jpg";
			//$image1 = config_item('base_url')."qualitygold/".$row['img1'];
			//$image1 = "http://qgold.com/product/275/" . $row['image_name'] . ".jpg";
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['id'] . "',";
                        $json .= "cell:['ID #: " . $row['id'] . "<br /><a href=\'" . SITE_URL . "admin/view_unique_detail/" . $row['catid'] . '/' . $row['id'] . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a>'";
			//$json .= ",'<img src=\'" . addslashes($image1) . "\' width=\'80\'><br /> " . addslashes($row['itemid']) . "'";
			$row['ezstatus'] == true ? $json .= ",'" . "<a href=\'" . config_item('base_url') . "admin/ezuniquestatusedit/" . $row['id'] . "/disable\'  class=\"edit\">Enabled</a>'" : $json .= ",'" . "<a href=\'" . config_item('base_url') . "admin/ezuniquestatusedit/" . $row['id'] . "/enable\'  class=\"edit\">Disabled</a>'";
			$json .= ",'" . addslashes($row['name']) . " '";
			$json .= ",'" . addslashes($mynewresult->catname) . " '";
//			$json .= ",'" . addslashes($row['image']) . " '";
//			$json .= ",'" . addslashes($row['book']) . " '";
//			$json .= ",'" . '$' . addslashes($row['cost_40']) . " '";
//			$json .= ",'" . '$' . addslashes($row['cost_45']) . " '";
//			$json .= ",'" . '$' . addslashes($row['cost_50']) . " '";
$json .= ",'<img src=\'" . addslashes($row['image']) . "\' width=\'80\'><br /> " . '' . "'";                        
			$json .= ",'" . addslashes($row['style_group']) . " '";
			$json .= ",'" . addslashes($row['metal_weight']) . " '";
			$json .= ",'" . addslashes($row['bail_info']) . " '";
			$json .= ",'" . addslashes($row['stone_weight']) . " '";
			$json .= ",'" . addslashes($row['supplied_stones']) . " '";
			$json .= ",'" . addslashes($row['top_width']) . " '";
			$json .= ",'" . addslashes($row['bottom_width']) . " '";
			$json .= ",'" . addslashes($row['top_height']) . " '";
			$json .= ",'" . addslashes($row['bottom_height']) . " '";
			$json .= ",'" . addslashes($row['ring_size']) . " '";
			$json .= "]";
			$json .= "}";
			$rc = true;
			$i = $i + 1;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
        
	function getqualitygold() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'qg_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'itemid';
		$results = $this->Adminmodel->getqualitygold($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$i = 0;
		foreach ($results['result'] as $row) {
			//$image = config_item('base_path')."images/povada/".$row['SKU'].".jpg";
			//$image1 = config_item('base_url')."qualitygold/".$row['img1'];
			//$image1 = "http://qgold.com/product/275/" . $row['image_name'] . ".jpg";
			
			$image1 =  "http://".$row['ImageLink_100'] ;
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['qg_id'] . "',";
			$json .= "cell:['ID #: " . $row['qg_id'] . "<br /><a href=\'" . config_item('base_url') . "admin/qualitygold/edit/" . $row['qg_id'] . "\'  class=\"edit\">Edit</a>'";
			$row['ezstatus'] == true ? $json .= ",'" . "<a href=\'" . config_item('base_url') . "admin/ezqualitygoldstatusedit/" . $row['qg_id'] . "/disable\'  class=\"edit\">Enabled</a>'" : $json .= ",'" . "<a href=\'" . config_item('base_url') . "admin/ezqualitygoldstatusedit/" . $row['qg_id'] . "/enable\'  class=\"edit\">Disabled</a>'";
			$json .= ",'<img src=\'" . addslashes($image1) . "\' width=\'80\'><br /> " . addslashes($row['Item']) . "'";
	
			//$json .= ",'" . addslashes($row['Item']) . " '";
			$json .= ",'" . addslashes($row['MSRP']) . " '";
			$json .= ",'" . '$' . addslashes($row['Price']) . " '";
			$json .= ",'" . addslashes($row['Description']) . " '";
			$json .= ",'" . addslashes($row['Status']) . " '";
			$json .= ",'" .  addslashes($row['Weight']) . " '";
			$json .= ",'" .  addslashes($row['CT_Weight']) . " '";
			$json .= ",'" .  addslashes($row['Gem_Weight']) . " '";
			$json .= ",'" . addslashes($row['Size']) . " '";
			$json .= ",'" . addslashes($row['Length']) . " '";
			$json .= ",'" . addslashes($row['Width']) . " '";
			$json .= ",'" . addslashes($row['Sizeable']) . " '";
			$json .= ",'" . addslashes($row['Metal_Desc']) . " '";
			$json .= ",'" . addslashes($row['Image']) . " '";
			$json .= ",'" . addslashes($row['UM_Sales']) . " '";
			$json .= ",'" . addslashes($row['Qty_Avail']) . " '";
			$json .= ",'" . '$' . addslashes($row['Metal_Price']) . " '";
			
			$json .= ",'" . addslashes($row['Customer_Style']) . " '";
			
			$json .= ",'" . addslashes($row['Categories']) . " '";
			$json .= ",'" . addslashes($row['Attributes']) . " '";
			
			$json .= ",'" . addslashes($row['Item_Type']) . " '";
			$json .= ",'" . addslashes($row['DateAdded']) . " '";
			$json .= ",'" . addslashes($row['ProductLine']) . " '";
			$json .= ",'" . addslashes($row['ImageLink_100']) . " '";
			$json .= ",'" . addslashes($row['ImageLink_275']) . " '";
			$json .= ",'" . addslashes($row['ImageLink_500']) . " '";
			$json .= ",'" . addslashes($row['Country_Of_Origin']) . " '";
			$json .= "]";
			$json .= "}";
			$rc = true;
			$i = $i + 1;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
        
	function rapnetDiamonds($action = 'view', $id = 0) {
        //echo "<pre>";
        //print_r($_POST);
        //exit;
		
		if (isset($_REQUEST['submit_search']) && !empty($_REQUEST['submit_search'])) {
			$this->Adminmodel->saveSearchCriteria($_REQUEST);			
		}
		
		if (isset($_SESSION['sdata']) && count($_SESSION['sdata']) > 0) {
			//print_r($_SESSION['sdata']);
			$_REQUEST = $_SESSION['sdata'];
			unset($_SESSION['sdata']);
		}
        $custom_filters['caratmin'] = isset($_REQUEST['caratmin']) ? $_REQUEST['caratmin'] : '';
        $custom_filters['caratmax'] = isset($_REQUEST['caratmax']) ? $_REQUEST['caratmax'] : '';
        $custom_filters['color'] = isset($_REQUEST['color']) ? implode(',', $_REQUEST['color']) : '';
        $custom_filters['cut'] = isset($_REQUEST['cut']) ? implode(',', $_REQUEST['cut']) : '';
        $custom_filters['shape'] = isset($_REQUEST['shape']) ? implode(',', $_REQUEST['shape']) : '';
        $custom_filters['clarity'] = isset($_REQUEST['clarity']) ? implode(',', $_REQUEST['clarity']) : '';
        $custom_filters_encoded = urlencode(json_encode($custom_filters)); 
        //echo "<pre>";
        //print_r($custom_filters);
        ///print_r(json_decode(urldecode($custom_filters_encoded)));
        if (count($_REQUEST['owner']) > 0)
            $id_array = implode(",", $_REQUEST['owner']);
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        $data['extraheader'] = '';
        $collections = '';
        $typeoptions = '';
        $data['collections'] = '';
        $data['typeoptions'] = '';
        if ($this->isadminlogin()) {
            if ($action == 'delete') {
                $ret = $this->Adminmodel->rapnetstones($_POST, $action, $id);
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/x-json");
                $json = "";
                $json .= "{\n";
                $json .= "total: " . $ret['total'] . ",\n";
                $json .= "}\n";
                echo $json;
            } else {
                if ($action == 'add' || $action == 'edit') {
                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
                    if (isset($_POST[$action . 'btn'])) {
                        $ret = $this->Adminmodel->rapnetstones($_POST, $action, $id);
                        if ($ret['error'] == '') {
                            $data['success'] = $ret['success'];
                        } else {
                            $data['error'] = $ret['error'];
                            if ($action != 'edit')
                                $data['details'] = $_POST;
                        }
                    }
                    $data['extraheader'] .= $this->Commonmodel->addEditor('simple');
                    if ($action == 'edit') {
                        $details = $this->Adminmodel->getRapnetStonesById($id);
                        $data['details'] = $details[0];
                        $data['ourdm_pric'] = ( ($details[0]['price'] * $details[0]['carat']) * 6 );
                        $data['salesPrice'] = $this->Adminmodel->getLooseFiltersDiscount($data['ourdm_pric'], 'eBay');
                        $data['collections'] = $collections;
                        $data['animations'] = $this->Adminmodel->getFlashByStockId($id);
                        $data['id'] = $id;
                    }
                }
                $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#rapnet").click();';
                $data['leftmenus'] = $this->Adminmodel->adminmenuhtml('rapnetDiamonds');
                $id_array = trim($id_array);
                //print_r(trim($custom_filters);
                //error_reporting(E_ALL);
                //ini_set("display_errors", "1");
                //ini_set("display_startup_errors", "1");
                $url = config_item('base_url') . 'admin/getRapnetStones/' . $id_array . '/' . $custom_filters_encoded;
                $data['action'] = $action;
                $data['onloadextraheader'] .= "   $(\"#results\").flexigrid
        (
        {   	 							
        url: '" . $url . "',
        dataType: 'json',
        colModel : [
                {display: 'ID', name : 'lot', width : 80, sortable : true, align: 'center'},
                {display: 'Certificate Image', name : 'price', width : 60, sortable : true, align: 'center'},
                {display: 'Shape image', name : 'shape', width : 60, sortable : true, align: 'center'},
                {display: 'ebayItemId', name : 'ebayid', width : 85, sortable : true, align: 'center'},
                {display: 'Rapnet Price', name : 'price', width : 85, sortable : true, align: 'center'},
                {display: 'Our Price', name : 'price', width : 85, sortable : true, align: 'center'},
                {display: 'Owner ID', name : 'owner', width : 120, sortable : true, align: 'center'},
                {display: 'Clarity', name : 'clarity', width : 120, sortable : true, align: 'center'},
                {display: 'Shape', name : 'shape', width : 120, sortable : true, align: 'center'},
                {display: 'Carat', name : 'carat', width : 75, sortable : true, align: 'center'},
                {display: 'Color', name : 'color', width : 125, sortable : true, align: 'center'},																		
                {display: 'Meas', name : 'Meas', width : 60, sortable : true, align: 'center'},
                {display: 'Cert_N', name : 'Cert_n', width : 60, sortable : true, align: 'center'},      
                {display: 'Stock', name : 'Stock_n', width : 60, sortable : true, align: 'center'},
                {display: 'Country', name : 'Country', width : 60, sortable : true, align: 'center'},      
                {display: 'State', name : 'State', width : 60, sortable : true, align: 'center'},            
                {display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center',hide: true},
                {display: 'Cut', name : 'cut', width : 60, sortable : true, align: 'center',hide: true}
                ],
                 buttons : [	{name: 'Delete', bclass: 'delete', onpress : test},
                                {separator: true}
                        ],
        searchitems : [
                {display: 'Lot #', name : 'lot', isdefault: true},
                {display: 'Certificate', name : 'Cert', isdefault: true},
                {display: 'Stock', name : 'Stock_n', isdefault: true},
                {display: 'Owner', name : 'owner', isdefault: false}																		
                ], 		
        sortname: \"Date\",
        sortorder: \"desc\",
        usepager: true,
        title: '<h1 class=\"pageheader\">Ring and Diamonds</h1>',
        useRp: true,
        rp: 50,
        showTableToggleBtn: false,
        width:1400,
        height: 565
        }
        );

        function test(com,grid)
        {
                if (com=='Delete')
                        { 

                        if($('.trSelected').length>0){
                                    if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
                                var items = $('.trSelected');
                                var itemlist ='';
                                for(i=0;i<items.length;i++){
                                        itemlist+= items[i].id.substr(3)+\",\";
                                }																                                


                                $.ajax({
                                        type: \"POST\",
                                        dataType: \"json\",
                                        url: \"" . config_item('base_url') . "admin/rapnetdiamonds/delete\",
                                        data: \"items=\"+itemlist,
                                        success: function(data){
                                             alert('Total Deleted rows: '+data.total);
                                         $(\"#results\").flexReload();
                                        },
                                        error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
                                      });
        }
                } else{
                        alert('You have to select a row.');
                } 


                        }
                else if (com=='Add')
                        {
                                window.location = '" . config_item('base_url') . "admin/rolex/add';
                        }			
        }";
                $data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
                $data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
                $data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
                $data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
                $data['onloadextraheader'] .= " var so;";
                $data['usetips'] = true;
                $output = $this->load->view('admin/rapnetDiamonds', $data, true);
                $this->output($output, $data);
            }
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }
    //// get solitaires price margin
    function solitaire_price_margin($ring_metal='14KP', $cid=0) {
        $solitairs_id = solitairesCateID();
        if( in_array($cid, $solitairs_id) ) {
            if( !empty( strchr($ring_metal, '18') ) ) {
                $returns['metal_type'] = $ring_metal;
                $returns['price_margin'] = 200;
            } elseif( $ring_metal == 'PDIUM' ) {
                $returns['metal_type'] = '18KP';
                $returns['price_margin'] = 300;
            } elseif( $ring_metal == 'PLAT' ) {
                $returns['metal_type'] = 'PDIUM';
                $returns['price_margin'] = 450;
            } else {
                $returns['metal_type'] = $ring_metal;
                $returns['price_margin'] = 0;
            }
        } else {
            $returns['metal_type'] = $ring_metal;
            $returns['price_margin'] = 0;
        }
        
        return $returns;
    }
    //// set the unique section price
    function set_unique_price($ring_metal='', $price=0, $cid=0) {
        if( !empty( strchr($ring_metal, '14') ) ) {
            $additionalPrice = 0;
        } elseif( !empty( strchr($ring_metal, '18') ) ) {
            $additionalPrice = 160; //300;
        } elseif( $ring_metal == 'PDIUM' ) {
            $additionalPrice = 235;
        } elseif( $ring_metal == 'PLAT' ) {
            $additionalPrice = 545; //600;
        } else {
            $additionalPrice = 0;
        }
        
        $solitairs_id = solitairesCateID();
        
        if( in_array($cid, $solitairs_id) ) {
            $halfPrice = ( $price / 2 );
            $priceMargin = $this->catemodel->uniquePriceRange( $halfPrice );
            $netRingPrice = $halfPrice * $priceMargin;
        } else {
            $netPrice = $price + $additionalPrice;
            $priceMargin = $this->catemodel->uniquePriceRange( $netPrice );
            $netRingPrice = $netPrice * $priceMargin;
        }
        
        return $netRingPrice;
    }
    
    function get_center_stone_list($cate_id=0, $ringid=0) {
        
        $rowsring = $this->catemodel->getRingsDetailViaId($ringid, '', '', '', $cate_id);
        ///// managed center diamond stones
        $getring_shape = getSuppliedStoneShape( $rowsring['supplied_stones'] );
	$ratios = getAdditonalStonesRatio( $rowsring['additional_stones'] );
        
        if( empty($rowsring['additional_stones']) ) {
            $diamond_shape = $getring_shape;
            $dmlength = '';
            $dmwidth = '';
            $dmcarat = '';    
            
        } else {
            
            $diamond_shape = $ratios['size_shape'];
            $dmlength = $ratios['length'];
            $dmwidth = $ratios['width'];
            $dmcarat = $ratios['carat'];
	}
        
        $results = $this->catemodel->getRapnetListResult($diamond_shape, $dmlength, $dmwidth, $dmcarat);
        
        return $results;
    }
    //// view center stone diamond
    function view_center_stones($cate_id=0, $ring_id=0) {
        $data['stones_list'] = $this->get_center_stone_list( $cate_id, $ring_id );

        $this->load->view('admin/view_center_diamond_list', $data);    
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
    ///// get category name
    function getCateName( $cid=0 ) {
        $catevalue = array();
        
        $catevalue['main_cname'] = $this->catemodel->getRingCategoryName( $cid );
        $subparent = $this->catemodel->getparentCateID( $cid );
        $catevalue['sub_cname'] = $this->catemodel->getRingCategoryName($subparent);
        
        return $catevalue;
    }
    //// view unique ring detail
    function view_unique_detail($cate_id=0, $prod_id = 0) {
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        if ($this->isadminlogin()) {
            $ring_metal = '14KW';
            $ring_size = '1';            
            $data['return_msg'] = $this->session->userdata('return_message');            
            $solitaires = $this->solitaire_price_margin($ring_metal, $cate_id);
            $rowsring = $this->catemodel->getRingsDetailViaId($prod_id, $solitaires['metal_type'], $ring_size, '', $cate_id); //print_ar($rowsring);
            $data['rowsring'] = $rowsring;
            $data['extraheader'] = '<link type="text/css" rel="stylesheet" href="'.SITE_URL.'css/home_style.css" />';
            $data['center_stones'] = file_get_contents(SITE_URL.'admin/view_center_stones/'.$cate_id.'/'.$prod_id);
            $data['suported_shapes'] = $this->getDimaondShapeImage( $data['rowsring'] );  /// get supplied stones shapes
            $cate = $this->getCateName( $rowsring['catid'] );
            $data['ringtitle'] = getMetalValue($rowsring['matalType']).' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring '.$rowsring['stone_weight'];
            $data['title'] = $data['ringtitle'];
            $data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
            $data['setingtype']   = $cate['sub_cname'];
            $data['maincate_name'] = $cate['main_cname'];
            $setPriceMargin = $this->set_unique_price($ring_metal, $rowsring['priceRetail'], $cate_id);
            $rowsring['priceRetail'] = $setPriceMargin + $solitaires['price_margin'];
            $data['retail_price'] = $rowsring['priceRetail'] * PRICE_PERCENT;
            $data['saving_percent'] = ( 100 - ( ( $rowsring['priceRetail'] / $data['retail_price'] ) * 100 ) );

                $output = $this->load->view('admin/unique_ring_details', $data, true);
                $this->output($output, $data);
        } else {
                $output = $this->load->view('admin/login', $data, true);
                $this->output($output, $data);
        }
    }
    function getRapnetStones($addoption = '') {
        //error_reporting(E_ALL);
        //ini_set("display_errors", "1");
        //ini_set("display_startup_errors", "1");
        $id_array = ( is_numeric($this->uri->segment(3)) ? $this->uri->segment(3) : '' );
        $custom_filters = $this->uri->segment(4);
        $custom_filters_1 = json_decode(urldecode($custom_filters));
        //var_dump($custom_filters_1);
        //exit;
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : '';
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
        /* custom filters */
        if (isset($custom_filters_1)) {
            $results = $this->Adminmodel->getRapnetStones($id_array, $page, $rp, $sortname, $sortorder, $query, $qtype, '', $custom_filters_1);
        } else {
            $results = $this->Adminmodel->getRapnetStones($id_array, $page, $rp, $sortname, $sortorder, $query, $qtype);
        }
        //print_ar($results);
        
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: text/x-json");
        $json = "";
        $json .= "{\n";
        $json .= "page: $page,\n";
        $json .= "total: " . $results['count'] . ",\n";
        $json .= "rows: [";
        $rc = false;
        $destFolder = config_item('base_url') . 'images/pictures/';
        $r = 1;
        $delink_url = SITE_URL.'admin/deleteShapeLink/';
        
        foreach ($results['result'] as $row) {
            $cert_img = explode(' ', $row['Cert']);
            //if (empty($row['certimage'])) {
                $sql = "SELECT cert_img FROM " . $this->config->item('table_perfix') . "cert  WHERE cert_name = '" . trim($cert_img[0]) . "'";
                $query = $this->db->query($sql);
                $result = $query->result_array();
                $row['certimage'] =  $result[0]['cert_img'];
            //}
            if (!empty($row['Meas'])) {
                list($w, $b, $h) = explode("x", $row['Meas']);
                $meas = $w . " x " . $b . " x " . $h;
            } else {
                $meas = '';
            }
            $shape = '';
            switch ($row['shape']) {
                case 'B':
                    $shape = 'Round';
                    $destFile = $destFolder . 'round.JPG';
                    break;
                case 'PR':
                    $shape = 'Princess';
                    $destFile = $destFolder . 'princess.jpg';
                    break;
                case 'R':
                case 'RAD':
                    $shape = 'Radiant';
                    $destFile = $destFolder . 'radiant.jpg';
                    break;
                case 'E':
                    $shape = 'Emerald';
                    $destFile = $destFolder . 'emeraldring.jpg';
                    break;
                case 'AS':
                case 'Sq. Emerald':
                    $shape = 'Asscher';
                    $destFile = $destFolder . 'asscherring.jpg';
                    break;
                case 'O':
                    $shape = 'Oval';
                    $destFile = $destFolder . 'Oval_oval.jpg';
                    break;
                case 'M':
                    $shape = 'Marquise';
                    $destFile = $destFolder . 'Marquise_Big.jpeg';
                    break;
                case 'P':
                    $shape = 'Pear';
                    $destFile = $destFolder . 'Pear_pear.jpg';
                    break;
                case 'H':
                    $shape = 'Heart';
                    $destFile = $destFolder . 'heart.jpg';
                    break;
                case 'C':
                case 'CU':
                    $shape = 'Cushion';
                    $destFile = $destFolder . 'Cushion_Big.jpeg';
                    break;
                case 'Cushion Modified':
                    $shape = 'Cushion';
                    $destFile = $destFolder . 'cushionring.jpg';
                    break;
                default:
                    $shape = $row['shape'];
                    break;
            }
//            if (!empty($shape)) {
//                $sql = "SELECT picture1 FROM " . $this->config->item('table_perfix') . "pictures  WHERE  diamondshape = '" . $shape . "'";
//                $query = $this->db->query($sql);
//                $result = $query->result_array();
//                $row['shapeimage'] = $result[0]['picture1'];
//            }
            
            $marketPlace = ( $addoption == 'amazongallery' ? 'amazon' : '' );
            $imgColsValue = $this->Adminmodel->getColorImgColmn($row['fancy_color'], $shape, $row['lot'], $marketPlace);
            
            if ($rc)
                $json .= ",";
            $json .= "\n {";
            $json .= "id:'" . $row['lot'] . "',";
            //" . config_item('base_url') . "admin/rapnetDiamonds/edit/" . $row['lot'] . "
            
			            $json .= "cell:['<input type=\'checkbox\' class=\'bookid\' name=\'bookid[]\' value=" . $row['lot'] . "  />Lot #: " . $row['lot'] . "<br /><a href=\'" . config_item('base_url') . "admin/rapnetDiamonds/edit/" . $row['lot'] . "\'  class=\"edit\" style=\"color:red;font-weight:bold;\">Send to eBay</a><br><a href=\'" . SITE_URL . "admin/rapnetdmToSears/rapnetdm/" . $row['lot'] . "\'  class=\"edit\" style=\"color:red;font-weight:bold;\">Send to Sears</a><br><a href=\'#\'  class=\"edit\" style=\"color:red;font-weight:bold;\">Send to Amazon</a>'";
			
            /*$json .= "cell:['Lot #: " . $row['lot'] . "<br /><a href=\'" . config_item('base_url') . "admin/rapnetDiamonds/edit/" . $row['lot'] . "\'  class=\"edit\" style=\"color:red;font-weight:bold;\">Send to eBay</a>'";*/
            if ($row['certimage'] != '') {
                $json .= ",'<img src=\'" . ($row['certimage']) . "\' width=\'80\'><br />'";
            } else {
                $json .= ",'<img src=\'" . config_item('base_url') . "images/cert/12_541_no_image_thumb.gif\' width=\'80\'><br />'";
            }
            $addMoreImge = ( $addoption != 'photogallery' ? "<a href=\"#javascript;\" onclick=\"openPopupWindow(\'" . SITE_URL.'admin/uploadOtherShpaeImage/'.$row ['lot'] . '/' . $marketPlace . "\')\" >Add Images</a>" : '' );
            if($addoption == 'photogallery') {
               $json .= ",'" . addslashes('<input type="file" name="eb1_'.$row['lot'].'" /><br><img src="'.$imgColsValue.'" width="80" >') . "'";
            } else {
                $json .= ",'<img src=\'" . $imgColsValue . "\' width=\'80\'><br />{$addMoreImge}'";
            }
            
            //else
             //   $json .= ",'<img src=\'" . $destFile . "\' width=\'80\'><br />'";
            
	$pc_price = number_format($row['price'],2);  //price per carat from rapnet
        $price = $row['price'];
		if (!empty($row['Meas'])) {
                    $price =  $price * $row['carat'];
		}
			
        $qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
        $result = $this->db->query($qry);
        $pret = $result->row_array();
	$rate = $pret['rate'];
			
		$rate = ($rate/100);
		$xprice = $price * $rate;
		$ourprice_view = ( ( $row['price'] * $row['carat'] ) * 6 ); //$price + $xprice;
		$rprice = ( $ourprice * (1.65/100) ) + $ourprice;
		$rprice = $rprice + 195;
	
	$ourprice = number_format(round($ourprice));
	$rprice = number_format(round($rprice)); 
        $diamType = $this->Adminmodel->getDiamondType($row['lot']);
        $fcolorName = getFancyColorName( $row['fancy_color'] );
        $rowother = $this->Adminmodel->getDiamondShapeRow($row['lot']);
        ///// Note: showDiamondShape this function definition is in certed_admin_helper
        
        if($addoption == 'photogallery') {
            $json .= ",'" . addslashes('<input type="file" name="eb2_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['ebay_img2'], $delink_url.'2/'.$row['lot'])) . "'";
            $json .= ",'" . addslashes('<input type="file" name="eb3_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['ebay_img3'], $delink_url.'3/'.$row['lot'])) . "'";
            $json .= ",'" . addslashes('<input type="file" name="eb4_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['ebay_img4'], $delink_url.'4/'.$row['lot'])) . "'";
            $json .= ",'" . addslashes('<input type="file" name="eb5_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['ebay_img5'], $delink_url.'5/'.$row['lot'])) . "'";
            $json .= ",'" . addslashes('<input type="file" name="eb6_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['ebay_img6'], $delink_url.'6/'.$row['lot'])) . "'";
        } else if($addoption == 'amazongallery') {
            $json .= ",'" . addslashes('<input type="file" name="amazon2_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['amazon_img2'], $delink_url.'2/'.$row['lot'].'/amazongallery')) . "'";
            $json .= ",'" . addslashes('<input type="file" name="amazon3_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['amazon_img3'], $delink_url.'3/'.$row['lot'].'/amazongallery')) . "'";
            $json .= ",'" . addslashes('<input type="file" name="amazon4_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['amazon_img4'], $delink_url.'4/'.$row['lot'].'/amazongallery')) . "'";
            $json .= ",'" . addslashes('<input type="file" name="amazon5_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['amazon_img5'], $delink_url.'5/'.$row['lot'].'/amazongallery')) . "'";
            $json .= ",'" . addslashes('<input type="file" name="amazon6_'.$row['lot'].'" /><br>'.showDiamondShape($rowother['amazon_img6'], $delink_url.'6/'.$row['lot'].'/amazongallery')) . "'";
        } else {
            $json .= ",'" . addslashes($row['ebayid']) . "'";
            $json .= ",'" . addslashes($row['amazonid']) . "'";
            $json .= ",'" . addslashes($row['searsid']) . "'";
            $json .= ",'" . addslashes($pc_price) . "'";
            $json .= ",'" . addslashes( number_format($ourprice_view, 2) ) . "'";
            $json .= ",'" . addslashes($row['owner']) . "'";
            $json .= ",'" . addslashes($row['Cert']) . "'";
            $json .= ",'" . addslashes($row['Cert_n']) . "'";
	    $json .= ",'" . addslashes($diamType['diamnd_type']) . "'";
	    $json .= ",'" . addslashes($fcolorName) . "'";
            $json .= ",'" . addslashes($row['clarity']) . "'";
            $json .= ",'" . addslashes($shape) . "'";
            $json .= ",'" . addslashes(number_format($row['carat'], 2)) . "'";
            $json .= ",'" . addslashes(ucfirst($row['color'])) . "'";
            $json .= ",'" . addslashes(ucfirst($meas)) . "'";
            $json .= ",'" . addslashes(ucfirst($row['Cert_n'])) . "'";
	    $json .= ",'" . addslashes(ucfirst($row['Cert'])) . "'";
            $json .= ",'" . addslashes(ucfirst($row['Stock_n'])) . "'";
            $json .= ",'" . addslashes(ucfirst($row['Country'])) . "'";
            $json .= ",'" . addslashes(ucfirst($row['State'])) . "'";
            $json .= ",'" . addslashes(ucfirst($row['Cert'])) . "'";
            $json .= ",'" . addslashes(ucfirst($row['cut'])) . "'";
        }
            $json .= "]";
            $json .= "}";
            $rc = true;
        }
        $json .= "]\n";
        $json .= "}";
        echo $json;
    }
    ///// send item to sears
function rapnetdmToSears($action = 'rapnetdm', $id = 0) {
    $data = $this->getCommonData();
    $data['name'] = $this->getAdminDetails();
    $data['extraheader'] = '';
    $collections = '';
    $typeoptions = '';
    $data['collections'] = '';
    $data['typeoptions'] = '';
    $data['action'] = $action;
    if( !empty($id) ) {
       $details = $this->Adminmodel->getPendantById($id);
       $data['details'] = $details[0]; 
    }
                                                
    if ($this->isadminlogin()) 
        { 
//            if ($action == 'rapnetdm' || $action == 'loosedm') {
//                if (isset($_POST[$action . 'btn'])) {
//                        $ret = $this->Adminmodel->pendantstones($_POST, $action, $id);
//                        if ($ret['error'] == '') {
//                                $data['success'] = $ret['success'];
//                        } else {
//                                $data['error'] = $ret['error'];
//                                if ($action != 'edit')
//                                $data['details'] = $_POST;
//                        }
//                }
                                        
        $output = $this->load->view('admin/rapnet_loose_dmtosears', $data, true);
        $this->output($output, $data);
        
    } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
    }
}
    
	function owners($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->owners($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					//        $this->load->library('form_validation');
					//          $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						$ret = $this->Adminmodel->owners($_POST, $action, $id);
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$details = $this->Adminmodel->getOwnerById($id);
						$data['details'] = $details[0];
						$data['collections'] = $collections;
						$data['animations'] = $this->Adminmodel->getFlashByStockId($id);
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#rapnet").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('owners');
				$url = config_item('base_url') . 'admin/getowners';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'owner_id', width : 80, sortable : true, align: 'center'},
                                                                                                                                                {display: 'ownerID', name : 'company_id', width : 60, sortable : true, align: 'center'},
																		{display: 'company', name : 'company_name', width : 85, sortable : true, align: 'center'},
                                                                                                                                                {display: 'add date', name : 'company_adddate', width : 60, sortable : true, align: 'center' },
                                                                                                                                                {display: 'Count', name : 'company_count', width : 60, sortable : true, align: 'center' }
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Owners #', name : 'owner_id', isdefault: true},
																		{display: 'Company name', name : 'company_name', isdefault: true},
                                                                                                                                                {display: 'Company ID', name : 'company_id', isdefault: true}
																		],
																	sortname: \"owner_id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Rapnet Companies</h1>',
																	useRp: true,
																	rp: 50,
																	showTableToggleBtn: false,
																	width:1020,
																	height: 565
																	}
																	);
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/owners/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                     error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
																										 });
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                }
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/owners/add';
																			}
																	}
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/owners', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getowners($addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'owner_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
		$results = $this->Adminmodel->getowners($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$s = 1;
		foreach ($results['result'] as $row) {
			$shape = '';
                        if($row['company_id'] == 3942) {
                            $sqlcount = "Select Count(lot) as cc From `dev_rapproduct` Where `owner`='" . $row['company_id'] . "'";
                        } else {
                            $sqlcount = "Select Count(lot) as cc From `dev_rapproduct` Where `owner`='" . $row['company_name'] . "'";
                        }
			$qrycc = $this->db->query($sqlcount);
			$rescc = $qrycc->row();
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['owner_id'] . "',";
			$json .= "cell:['Owners #: " . $s . "<br /><a href=\'" . config_item('base_url') . "admin/owners/edit/" . $row['owner_id'] . "\'  class=\"edit\" >Edit </a>'";
			$json .= ",'" . addslashes($row['company_id']) . "'";
			$json .= ",'" . addslashes($row['company_name']) . "'";
			$json .= ",'" . addslashes($row['company_adddate']) . "'";
			$json .= ",'" . addslashes($rescc->cc) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
			$s = $s + 1;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function get_all_owners($addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'owner_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
		$results = $this->Adminmodel->getowners($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$s = 1;
		foreach ($results['result'] as $row) {
			$shape = '';
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['owner_id'] . "',";
			$json .= "cell:['<input type=\"checkbox\" name=\"owner[]\" value=\"$row[company_id]\">'";
			$json .= ",'" . addslashes($row['company_id']) . "'";
			$json .= ",'" . addslashes($row['company_name']) . "'";
			$json .= ",'" . addslashes($row['company_adddate']) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
			$s = $s + 1;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	function cert($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->cert($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					if (isset($_POST[$action . 'btn'])) {
					    
					    /*if(!empty($_FILES['cert_img']['name'])){
    					    $config['upload_path'] 	= SITE_URL().'images/cert/';
        	                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        	                $config['overwrite'] 	= TRUE;
        	                $config['file_name'] 	= $_FILES['cert_img']['name'];
        	                
        	                //Load upload library and initialize configuration
        	                $this->load->library('upload',$config);
        	                $this->upload->initialize($config);
        	                
        	                if($this->upload->do_upload('cert_img')){
        	                    $uploadData = $this->upload->data();
        	                }
					    }*/
					    
						$ret = $this->Adminmodel->cert($_POST, $action, $id);
						if ($ret['error'] == '')
						$data['success'] = $ret['success'];
						else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$details = $this->Adminmodel->getcertsById($id);
						$data['details'] = $details[0];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#rapnet").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('cert');
				$url = config_item('base_url') . 'admin/getcerts';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'cert_id', width : 80, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Certificate Name', name : 'cert_name', width : 160, sortable : true, align: 'center'},
																		{display: 'Certificate Image', name : 'cert_img', width : 185, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Certificate date', name : 'cert_adddate', width : 160, sortable : true, align: 'center'}
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																			    {name: 'Delete', bclass: 'delete', onpress : test},
																			    {separator: true}
																			],
																	searchitems : [
																		{display: 'Cert ID#', name : 'cert_id', isdefault: true},
																		{display: 'Certificate name', name : 'cert_name', isdefault: true}
																		],
																	sortname: \"cert_adddate\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Certificates</h1>',
																	useRp: true,
																	rp: 50,
																	showTableToggleBtn: false,
																	width:1020,
																	height: 565
																	}
																	);
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/cert/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   }
																										 });
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                }
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/cert/add';
																			}
																	}
														 ";
				$data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;
		 									";
				$data['usetips'] = true;
				$output = $this->load->view('admin/cert', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getcerts() {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'cert_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
		$results = $this->Adminmodel->getcerts($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['cert_id'] . "',";
			$json .= "cell:['Certificate #: " . $row['cert_id'] . "<br /><a href=\'" . config_item('base_url') . "admin/cert/edit/" . $row['cert_id'] . "\'  class=\"edit\" >Edit </a>'";
			$json .= ",'" . addslashes($row['cert_name']) . "'";
			if ( $row['cert_img'] != '' && getimagesize($row['cert_img']) ) {
                            $json .= ",'<img src=\'" . addslashes($row['cert_img']) . "\' width=\'80\'>'";
                        } else {
                            $json .= ",'<img src=\'" . SITE_URL . "images/cert/12_541_no_image_thumb.gif\' width=\'80\'><br />'";
                        }
			$json .= ",'" . addslashes($row['cert_adddate']) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
    
    function diamondshapes($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
                $data['shapesid'] = $id;
                $data['page_action'] = $action.'/'.$id;
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				//print_r($_POST);die;
				$ret = $this->Adminmodel->diamondshapes($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->helper(array('form', 'url'));
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST['addbtn'])) {
						$ret = $this->Adminmodel->diamondshapes($_POST, $action, $id);
						if ($ret['error'] == '') {
							$data['success'] = $ret['success'];
						} else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$details = $this->Adminmodel->diamondshapesByID($id);
						$data['details'] = $details[0];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#rapnet").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('shapes');
				$url = config_item('base_url') . 'admin/getdiamondshapes';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid
                                (
                                {   	 							
                                url: '" . $url . "',
                                dataType: 'json',
                                colModel : [
                                        {display: 'ID', name : 'pic_id', width : 80, sortable : true, align: 'center'},
                                        {display: 'Shape', name : 'shape', width : 60, sortable : true, align: 'center'},
                                                    {display: 'White Background', name : 'white_background', width : 90, sortable : true, align: 'center'},
                                                    {display: 'White', name : 'picture1', width : 60, sortable : true, align: 'center'},
                                                    {display: 'Yellow', name : 'picture2', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Purple', name : 'picture3', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Green', name : 'picture4', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Orange', name : 'picture5', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Red', name : 'picture6', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Blue', name : 'blue_shape', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Black', name : 'black_shape', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Cameleon', name : 'chameleon_sh', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Champagne', name : 'champagne_sh', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Gray', name : 'gray_shape', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Pink', name : 'pink_shape', width : 85, sortable : true, align: 'center'},
                                                    {display: 'Brown', name : 'brown_shape', width : 85, sortable : true, align: 'center'}

                                        ],
                                        buttons : [	{name: 'Delete', bclass: 'delete', onpress : test},{name: 'Add', bclass: 'add', onpress : test},
                                                       {separator: true}
                                               ],
                               searchitems : [
                                       {display: 'PIC ID #', name : 'pic_id', isdefault: true}

                                       ], 		
                               sortname: \"pic_id\",
                               sortorder: \"desc\",
                               usepager: true,
                               title: '<h1 class=\"pageheader\">Diamonds Shapes Pictures</h1>',
                               useRp: true,
                               rp: 50,
                               showTableToggleBtn: false,
                               width:1020,
                               height: 565
                               }
                               );

function test(com,grid)
{
        if (com=='Delete')
                { 

                if($('.trSelected').length>0){
                            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
                        var items = $('.trSelected');
                        var itemlist ='';
                        for(i=0;i<items.length;i++){
                                itemlist+= items[i].id.substr(3)+\",\";
                        }
                        
                $.ajax({
                        type: \"POST\",
                        dataType: \"json\",
                        url: \"" . config_item('base_url') . "admin/diamondshapes/delete\",
                        data: \"items=\"+itemlist,
                        success: function(data){
                             alert('Total Deleted rows: '+data.total);
                         $(\"#results\").flexReload();
                        },
                        error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
                      });                                                                                                                                                   }
        } else{
                alert('You have to select a row.');
        } 
           }
        else if (com=='Add')
                {
                        window.location = '" . config_item('base_url') . "admin/diamondshapes/add';
                }}";
                                
    $data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
    $data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" /> ';
    $data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
    $data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
    $data['onloadextraheader'] .= "var so;";
    $data['usetips'] = true;
    $output = $this->load->view('admin/diamondshapes', $data, true);
    $this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
	function getdiamondshapes($addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'pic_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
		$results = $this->Adminmodel->getdiamondshapes($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
                $noShapeImge = SITE_URL.'images/rings/noringimage.png';
		foreach ($results['result'] as $row) {
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['pic_id'] . "',";
			$json .= "cell:['Lot #: " . $row['pic_id'] . "<br /><a href=\'" . config_item('base_url') . "admin/diamondshapes/edit/" . $row['pic_id'] . "\'  class=\"edit\" style=\"color:red;font-weight:bold;\">Edit</a>'";
			$json .= ",'" . addslashes(ucfirst($row['diamondshape'])) . "'";
			if ($row['white_background'] != '') {
			$json .= ",'<img src=\'" . ($row['white_background']) . "\' width=\'80\'><br />'";
                        } else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        } 
			if ($row['picture1'] != '') {
			$json .= ",'<img src=\'" . ($row['picture1']) . "\' width=\'80\'><br />'";
                        } else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        } 
                        if ($row['picture2'] != '') {
			$json .= ",'<img src=\'" . ($row['picture2']) . "\' width=\'80\'><br />'";
                        } else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['picture3'] != '') {
			$json .= ",'<img src=\'" . ($row['picture3']) . "\' width=\'80\'><br />'";
                        } else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['picture4'] != '') {
			$json .= ",'<img src=\'" . ($row['picture4']) . "\' width=\'80\'><br />'";
                        } else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['picture5'] != '') {
			$json .= ",'<img src=\'" . ($row['picture5']) . "\' width=\'80\'><br />'";
                        } else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['picture6'] != '') {
			$json .= ",'<img src=\'" . ($row['picture6']) . "\' width=\'80\'><br />'";
			} else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['blue_shape'] != '') {
			$json .= ",'<img src=\'" . ($row['blue_shape']) . "\' width=\'80\'><br />'";
			} else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['black_shape'] != '') {
			$json .= ",'<img src=\'" . ($row['black_shape']) . "\' width=\'80\'><br />'";
			} else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['chameleon_sh'] != '') {
			$json .= ",'<img src=\'" . ($row['chameleon_sh']) . "\' width=\'80\'><br />'";
			} else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['champagne_sh'] != '') {
			$json .= ",'<img src=\'" . ($row['champagne_sh']) . "\' width=\'80\'><br />'";
			} else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['gray_shape'] != '') {
			$json .= ",'<img src=\'" . ($row['gray_shape']) . "\' width=\'80\'><br />'";
			} else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['pink_shape'] != '') {
			$json .= ",'<img src=\'" . ($row['pink_shape']) . "\' width=\'80\'><br />'";
			} else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			if ($row['brown_shape'] != '') {
			$json .= ",'<img src=\'" . ($row['brown_shape']) . "\' width=\'80\'><br />'";
			} else {
			$json .= ",'<img src=\'" . $noShapeImge . "\' width=\'80\'><br />'";
                        }
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
        
    function rapnetDiamondsSearch($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'Delete' || $action == 'Revise') {
				$ret = $this->Adminmodel->pendantstones($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->helper(array('form', 'url'));
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST[$action . 'btn'])) {
						$ret = $this->Adminmodel->pendantstones($_POST, $action, $id);
						if ($ret['error'] == '') {
							$data['success'] = $ret['success'];
						} else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$details = $this->Adminmodel->getPendantById($id);
                                                $dmtype = $this->Adminmodel->getDiamondType($id);
                                                $data['clarity_enhance'] = ( $dmtype['clarityresult'] > 0 ? ' Clarity Enhanced ' : '' );
						$data['details'] = $details[0];
						$data['collections'] = $collections;
						$data['animations'] = $this->Adminmodel->getFlashByStockId($id);
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#loose").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('pendants');
                                $optionsList = array('photogallery','amazongallery');
                                $actionsView = ( in_array($action, $optionsList) ? $action : '' );
				$url = config_item('base_url') . 'admin/getRapnetStones/'.$actionsView;
				$data['action'] = $action;
				$data['onloadextraheader'] .= "  var actionview = '".$action."';

function amazonGaleryBtn() {
    window.location = '" . SITE_URL . "admin/rapnetDiamondsSearch/amazongallery';
}

if(actionview == 'photogallery' || actionview == 'amazongallery') {
    $(\"#results\").flexigrid
        (
        {   	 							
        url: '" . $url . "',
        dataType: 'json',
        colModel : [
                {display: 'ID', name : 'lot', width : 90, sortable : true, align: 'center'},
                {display: 'Certificate Image', name : 'price', width : 60, sortable : true, align: 'center'},
                {display: 'Shape image', name : 'shape', width : 85, sortable : true, align: 'center'},
                {display: 'Image2', name : 'ebay_img2', width : 85, sortable : true, align: 'center'},
                {display: 'Image3', name : 'ebay_img3', width : 85, sortable : true, align: 'center'},
                {display: 'Image4', name : 'ebay_img4', width : 85, sortable : true, align: 'center'},
                {display: 'Image5', name : 'ebay_img5', width : 85, sortable : true, align: 'center'},
                {display: 'Image6', name : 'ebay_img6', width : 85, sortable : true, align: 'center'}
                ],
                 buttons : [	{name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn}, {name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},
                                {separator: true}
                        ],
        searchitems : [
                {display: 'Lot #', name : 'lot', isdefault: true},
                {display: 'Cert #', name : 'Cert_n', isdefault: true},
                {display: 'Certificate', name : 'Cert', isdefault: true},
                {display: 'Stock', name : 'Stock_n', isdefault: true},
                {display: 'Owner', name : 'owner', isdefault: true},
                {display: 'Ebay Id', name : 'ebayid', isdefault: true},
                {display: 'Type', name : 'dmtype', isdefault: false}																		
                ], 		
        sortname: \"price\",
        sortorder: \"ASC\",
        usepager: true,
        title: '<h1 class=\"pageheader\">Loose Diamonds</h1>',
        useRp: true,
        rp: 50,
        showTableToggleBtn: false,
        width:1020,
        height: 565
        }
        );
} else {
    $(\"#results\").flexigrid
        (
        {   	 							
        url: '" . $url . "',
        dataType: 'json',
        colModel : [
                {display: 'ID', name : 'lot', width : 90, sortable : true, align: 'center'},
                {display: 'Certificate Image', name : 'price', width : 60, sortable : true, align: 'center'},
                {display: 'Shape image', name : 'shape', width : 60, sortable : true, align: 'center'},
                {display: 'ebayItemId', name : 'ebayid', width : 85, sortable : true, align: 'center'},
                {display: 'amazonID', name : 'amazonid', width : 85, sortable : true, align: 'center'},
                {display: 'searsID', name : 'searsid', width : 85, sortable : true, align: 'center'},
                {display: 'Rapnet Price', name : 'price', width : 60, sortable : true, align: 'center'},
                {display: 'Our Price', name : 'price', width : 60, sortable : true, align: 'center'},																		
                {display: 'Owner ID', name : 'owner', width : 120, sortable : true, align: 'center'},
                {display: 'Cert', name : 'Cert', width : 120, sortable : true, align: 'center'},
                {display: 'Cert #', name : 'Cert_n', width : 120, sortable : true, align: 'center'},
                {display: 'Type', name : 'type', width : 120, sortable : true, align: 'center'},
                {display: 'Fancy Color', name : 'fancy_color', width : 120, sortable : true, align: 'center'},
                {display: 'Clarity', name : 'clarity', width : 120, sortable : true, align: 'center'},
                {display: 'Shape', name : 'shape', width : 120, sortable : true, align: 'center'},
                {display: 'Carat', name : 'carat', width : 75, sortable : true, align: 'center'},
                {display: 'Color', name : 'color', width : 125, sortable : true, align: 'center'},																		
                {display: 'Meas', name : 'Meas', width : 60, sortable : true, align: 'center'},
                {display: 'Cert_N', name : 'Cert_n', width : 60, sortable : true, align: 'center'},      
                {display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center'},      
                {display: 'Stock', name : 'Stock_n', width : 60, sortable : true, align: 'center'},
                {display: 'Country', name : 'Country', width : 60, sortable : true, align: 'center'},      
                {display: 'State', name : 'State', width : 60, sortable : true, align: 'center'},            
                {display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center',hide: true},
                {display: 'Cut', name : 'cut', width : 60, sortable : true, align: 'center',hide: true}
                ],
                 buttons : [	{name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},
                                {separator: true}
                        ],
        searchitems : [
                {display: 'Lot #', name : 'lot', isdefault: true},
                {display: 'Cert #', name : 'Cert_n', isdefault: true},
                {display: 'Certificate', name : 'Cert', isdefault: true},
                {display: 'Stock', name : 'Stock_n', isdefault: true},
                {display: 'Owner', name : 'owner', isdefault: true},
                {display: 'Ebay Id', name : 'ebayid', isdefault: true},
                {display: 'Type', name : 'dmtype', isdefault: false}																		
                ], 		
        sortname: \"price\",
        sortorder: \"ASC\",
        usepager: true,
        title: '<h1 class=\"pageheader\">Loose Diamonds</h1>',
        useRp: true,
        rp: 50,
        showTableToggleBtn: false,
        width:1020,
        height: 565
        }
        );
}


function homeBtn() {
    window.location = '" . SITE_URL . "admin/rapnetDiamondsSearch/';
}
function submitGalry() {
    document.getElementById('rapnetstones').submit();
}
function galeryBtn() {
    window.location = '" . SITE_URL . "admin/rapnetDiamondsSearch/photogallery';
}
        function test(com,grid)
        {   
            var idlist = $(\".bookid:checked\").map(
                 function () {return this.value;}).get().join(\",\");
                 var ttcount = $(\".bookid:checked\").length;
                 var itemlist ='';
                
            if (com=='Delete' || com=='Revise')
                { 

                    if($('.trSelected').length>0 || idlist != ''){
                    var totalItem = (idlist != '' ? ttcount : $('.trSelected').length );
                    
                        if(confirm(com+' ' + totalItem + ' rows?')){
                         if(idlist != '') {
                            itemlist = idlist;
                        } else {
                            var items = $('.trSelected');
                            
                            for(i=0;i<items.length;i++){
                                    itemlist+= items[i].id.substr(3)+\",\";
                            }
                        }
                        
                if(com=='Revise') {
                    $.ajax({
                                type: \"POST\",
                                url: \"" . config_item('base_url') . "admin/rapnetDiamondsSearch/Revise\",
                                data: \"items=\"+itemlist,
                                success: function(data){
                                     //alert('Total Revised rows: '+data.total);
                                     $.facebox('<div>'+data+'</div>');
                                     $(\".ebayExportResponse\").html(data).show();
                                 //$(\"#results\").flexReload();
                                },
                                error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
                              });
                              
                } else {
                        $.ajax({
                                type: \"POST\",
                                dataType: \"json\",
                                url: \"" . config_item('base_url') . "admin/rapnetDiamondsSearch/Delete\",
                                data: \"items=\"+itemlist,
                                success: function(data){
                                     alert('Total Deleted rows: '+data.total);
                                 $(\"#results\").flexReload();
                                },
                                error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
                              });
                }                                                                                                                                                            }
        } else{
                alert('You have not selected a row.');
        } 
    }
        else if (com=='Add')
                {
                        window.location = '" . config_item('base_url') . "admin/loosediamonds/add';
                }			
}";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
				$data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
				$data['onloadextraheader'] .= "
											var so;				
		 									";
				$data['usetips'] = true;
				//print_r($data);die;
				$output = $this->load->view('admin/rapnetDiamonds', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}
    function loosediamonds_1212($action = 'view', $id = 0) {
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        $data['extraheader'] = '';
        $collections = '';
        $typeoptions = '';
        $data['collections'] = '';
        $data['typeoptions'] = '';
        if ($this->isadminlogin()) {
            if ($action == 'delete') {
                $ret = $this->Adminmodel->owners($_POST, $action, $id);
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/x-json");
                $json = "";
                $json .= "{\n";
                $json .= "total: " . $ret['total'] . ",\n";
                $json .= "}\n";
                echo $json;
            } else {
                if ($action == 'add' || $action == 'edit') {
                    //        $this->load->library('form_validation');
//          $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
                    if (isset($_POST[$action . 'btn'])) {
				
	            
				        $ret = $this->Adminmodel->owners($_POST, $action, $id);
				        if ($ret['error'] == '')
                            $data['success'] = $ret['success'];
                        else {
                            $data['error'] = $ret['error'];
                            if ($action != 'edit')
                                $data['details'] = $_POST;
                        }
                    }
                    $data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					$ret=$this->Adminmodel->loosediamonds($_POST, $action, $id);
                    if ($action == 'edit') {
                        $details = $this->Adminmodel->getOwnerById($id);
                        $data['details'] = $details[0];
                        $data['collections'] = $collections;
                        $data['animations'] = $this->Adminmodel->getFlashByStockId($id);
                        $data['id'] = $id;
                    }
                }
                $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#rapnet").click();';
                $data['leftmenus'] = $this->Adminmodel->adminmenuhtml('owners');
                $url = config_item('base_url') . 'admin/get_all_owners';
                $data['action'] = $action;
                $data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'owner_id', width : 80, sortable : true, align: 'center'},
                                                                        {display: 'ownerID', name : 'company_id', width : 60, sortable : true, align: 'center'},
																		{display: 'company', name : 'company_name', width : 85, sortable : true, align: 'center'},
                                                                    	{display: 'add date', name : 'company_adddate', width : 60, sortable : true, align: 'center' }
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Owners #', name : 'owner_id', isdefault: true},
																		{display: 'Company name', name : 'company_name', isdefault: true},
                                                                        {display: 'Company ID', name : 'company_id', isdefault: true}
																		],
																	sortname: \"owner_id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Rapnet Companies</h1>',
																	useRp: true,
																	rp: 50,
																	showTableToggleBtn: false,
																	width:1020,
																	height: 565
																	}
																	);
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/owners/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                     error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
																										 });
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                }
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/owners/add';
																			}
																	}
														 ";
                $data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
                $data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
                $data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
                $data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
                $data['onloadextraheader'] .= "
											var so;
		 									";
                $data['usetips'] = true;
				$data['savesearch'] = $this->Adminmodel->getSavelooseSearch();
                $output = $this->load->view('admin/all_owners', $data, true);
                $this->output($output, $data);
            }
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }

	function loosediamonds($action = 'view', $id = 0) {       
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        $data['extraheader'] = '';
        $collections = '';
        $typeoptions = '';
        $data['collections'] = '';
        $data['typeoptions'] = '';
        $fcolor_result = $this->Adminmodel->fancyColorList();
        $fcolor_list = '';
        $custfilter = array();
        $data['submitlink'] = 'admin/allloosediamonds';

        if( !empty($id) ) {
            $rowFilterList = $this->Adminmodel->getSinglelooseSearch($id);
            $filterView = unserialize($rowFilterList['search_string']);
            $discoption = unserialize($rowFilterList['discount_options']);
            $custfilter['diamondscat'] = !empty($filterView['diamondscat']) ? $filterView['diamondscat'] : '';
            $custfilter['caratmin'] = !empty($filterView['caratmin']) ? $filterView['caratmin'] : '';
            $custfilter['caratmax'] = !empty($filterView['caratmax']) ? $filterView['caratmax'] : '';
            $custfilter['color'] = !empty($filterView['color']) ? $filterView['color'] : '';
            $custfilter['cut'] = !empty($filterView['cut']) ? $filterView['cut'] : ''; //ck mean check or compare values during edit
            $custfilter['shape'] = !empty($filterView['shape']) ? $filterView['shape'] : '';
            $custfilter['clarity'] = !empty($filterView['clarity']) ? $filterView['clarity'] : '';
            $custfilter['cert'] = !empty($filterView['cert']) ? $filterView['cert'] : '';
            $custfilter['fancy_color'] = !empty($filterView['fancycolor']) ? $filterView['fancycolor'] : '';
            //$custfilter['mins_price'] = $discoption['mins_price'];
            //$custfilter['maxs_price'] = $discoption['maxs_price'];
            $custfilter['rapdisc'] = $discoption;
            $custfilter['manufact_name'] = $rowFilterList['manufact_name'];
            $data['submitlink'] = 'admin/loosediamonds';
        }
        if( isset($_POST['diamondscat']) && !empty($_POST['diamondscat']) ) {
            $this->Adminmodel->savelooseSearchCriteria($_POST);
        }
        $data['detailcols'] = $custfilter;
        $data['rowdetail'] = $rowFilterList;
        //print_ar($data['detailcols']);
        
        if( count($fcolor_result) > 0) {
            foreach($fcolor_result as $rowfcolor) {
               $fcolor_list .= '<option value="'.$rowfcolor['fancy_color'].'" '.arOptSelected($rowfcolor['fancy_color'], $custfilter['fancy_color']).'>'.getFancyColorName($rowfcolor['fancy_color']).'</option>';
            }
        }
        $data['fcolor_list'] = $fcolor_list;
        
        if ($this->isadminlogin()) {
            if ($action == 'delete') {
                $ret = $this->Adminmodel->owners($_POST, $action, $id);
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/x-json");
                $json = "";
                $json .= "{\n";
                $json .= "total: " . $ret['total'] . ",\n";
                $json .= "}\n";
                echo $json;
            } else {
                if ($action == 'add' || $action == 'edit' || $action == 'editAmazon') {
                    $this->load->helper(array('form', 'url'));
                    //        $this->load->library('form_validation');
//          $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
                    if (isset($_POST[$action . 'btn'])) {
			$ret = $this->Adminmodel->owners($_POST, $action, $id);
                        
                        if ($ret['error'] == '')
                            $data['success'] = $ret['success'];
                        else {
                            $data['error'] = $ret['error'];
                            if ($action != 'edit')
                                $data['details'] = $_POST;
                        }
                    }
                    $data['extraheader'] .= $this->Commonmodel->addEditor('simple');
		    $ret=$this->Adminmodel->loosediamonds($_POST, $action, $id);
                                        
                    if ($action == 'edit' || $action == 'editAmazon') {
                        $details = $this->Adminmodel->getOwnerById($id);
                        $data['details'] = $details[0];
                        $data['collections'] = $collections;
                        $data['animations'] = $this->Adminmodel->getFlashByStockId($id);
                        $data['id'] = $id;
                    }
                }
                $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#rapnet").click();';
                $data['leftmenus'] = $this->Adminmodel->adminmenuhtml('owners');
                $url = config_item('base_url') . 'admin/get_all_owners';
                $data['action'] = $action;
                $data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'owner_id', width : 80, sortable : true, align: 'center'},
                                                                        {display: 'ownerID', name : 'company_id', width : 60, sortable : true, align: 'center'},
																		{display: 'company', name : 'company_name', width : 85, sortable : true, align: 'center'},
                                                                    	{display: 'add date', name : 'company_adddate', width : 60, sortable : true, align: 'center' }
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Owners #', name : 'owner_id', isdefault: true},
																		{display: 'Company name', name : 'company_name', isdefault: true},
                                                                        {display: 'Company ID', name : 'company_id', isdefault: true}
																		],
																	sortname: \"owner_id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Rapnet Companies</h1>',
																	useRp: true,
																	rp: 50,
																	showTableToggleBtn: false,
																	width:1020,
																	height: 565
																	}
																	);
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/owners/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                     error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
																										 });
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                }
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/owners/add';
																			}
																	}
														 ";
                $data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
                $data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" /> ';
                $data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
                $data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
                $data['onloadextraheader'] .= "
											var so;
		 									";
                $data['usetips'] = true;
		$data['savesearch'] = $this->Adminmodel->getSavelooseSearch();
		$data['savesearch_disc'] = $this->Adminmodel->getSavelooseSearch('discount');
                $output = $this->load->view('admin/all_owners', $data, true);
                $this->output($output, $data);
            }
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }

    function setImplodVal($field='') {
        $returnValue = '';
        if( !empty($field) ) {
            $returnValue = implode("','", $field);
        }
        return $returnValue;
    }

    function allloosediamonds($action = 'view', $id = '', $diamond_shape='HD', $cat_id='') {
		require_once(APPPATH .'libraries/vendor/autoload.php');
		if(isset($_POST['authentication_submit'])){
			session_start();
			$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');
			$req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", "". SITE_URL ."admin/allloosediamonds/view".trim($id)."", "GET");
			$_SESSION['aman']= $req_token['oauth_token_secret'];

            header('Location:'.$req_token['login_url']);
		}

		if( isset($_GET['oauth_token']) AND isset($_GET['oauth_verifier']) ){
			$_SESSION['oauth_token'] = $_GET['oauth_token'];
			$_SESSION['oauth_token_secret'] = $_SESSION['aman'];

			$request_token = $_GET['oauth_token'];
			$request_token_secret = $_SESSION['aman']; 
			$verifier = $_GET['oauth_verifier']; 
			$oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2');
			$oauth->setToken($request_token, $request_token_secret);

			try {
				$acc_token = $oauth->getAccessToken("https://openapi.etsy.com/v2/oauth/access_token", null, $verifier, "GET");
				$_SESSION['oauth_token']=$access_token = $acc_token['oauth_token'];// get from db
				$_SESSION['oauth_token_secret']=$access_token_secret = $acc_token['oauth_token_secret'];// get from db
				$oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2', OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
				$oauth->setToken($access_token, $access_token_secret);

        		try {
					$oauth_data = $oauth->fetch("https://openapi.etsy.com/v2/users/__SELF__", null, OAUTH_HTTP_METHOD_GET);
					$json = $oauth->getLastResponse();
        		} catch (OAuthException $e) {

        		}

				echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Succesfully Authenticated')
					window.location.href='". SITE_URL ."admin/allloosediamonds/view/".trim($id)."';
                </SCRIPT>");
			}catch (OAuthException $e) {
				//print_ar('sdfsdf2222');
    		}
        }
		
        $id = trim($id);
        $loose_search = $id;
        if( !empty($id) ) {
          $this->session->set_userdata('loose_id', $id);  
        } else {
          $this->session->unset_userdata('loose_id');  
        }
		if (isset($_REQUEST['submit_search']) && !empty($_REQUEST['submit_search'])) {
			$this->Adminmodel->savelooseSearchCriteria($_REQUEST);
			header('Location:'.SITE_URL.'admin/loosediamonds');
		}
		if (isset($_SESSION['sldata']) && count($_SESSION['sldata']) > 0) {
			$_REQUEST = $_SESSION['sldata'];
		}

        $custom_filters = array();
        $viewList = array('view','photogallery','amazongallery');
        if( $id > 0 && in_array($action, $viewList) ) {
            $saveFilterList = $this->Adminmodel->getSinglelooseSearch($id);
            $filterView = unserialize($saveFilterList['search_string']);
            $custom_filters['diamondscat'] = !empty($filterView['diamondscat']) ? $filterView['diamondscat'] : '';
            $custom_filters['caratmin'] = !empty($filterView['caratmin']) ? $filterView['caratmin'] : '';
            $custom_filters['caratmax'] = !empty($filterView['caratmax']) ? $filterView['caratmax'] : '';
            $custom_filters['color'] = !empty($filterView['color']) ? $this->setImplodVal($filterView['color']) : '';
            $custom_filters['cut'] = !empty($filterView['cut']) ? $this->setImplodVal($filterView['cut']) : '';
            $custom_filters['shape'] = !empty($filterView['shape']) ? $this->setImplodVal($filterView['shape']) : '';
            $custom_filters['clarity'] = !empty($filterView['clarity']) ? $this->setImplodVal($filterView['clarity']) : '';
            $custom_filters['cert'] = !empty($filterView['cert']) ? $this->setImplodVal($filterView['cert']) : '';
            $custom_filters['fancy_color'] = !empty($filterView['fancycolor']) ? $this->setImplodVal($filterView['fancycolor']) : '';
        } else {
            $custom_filters['diamondscat'] = isset($_POST['diamondscat']) ? $_POST['diamondscat'] : '';
            $custom_filters['caratmin'] = isset($_POST['caratmin']) ? $_POST['caratmin'] : '';
            $custom_filters['caratmax'] = isset($_POST['caratmax']) ? $_POST['caratmax'] : '';
            $custom_filters['color'] = isset($_POST['color']) ? $this->setImplodVal($_POST['color']) : '';
            $custom_filters['cut'] = isset($_POST['cut']) ? $this->setImplodVal($_POST['cut']) : '';
            $custom_filters['shape'] = isset($_POST['shape']) ? $this->setImplodVal($_POST['shape']) : '';
            $custom_filters['clarity'] = isset($_POST['clarity']) ? $this->setImplodVal($_POST['clarity']) : '';
            $custom_filters['cert'] = isset($_POST['cert']) ? $this->setImplodVal($_POST['cert']) : '';
            $custom_filters['fancy_color'] = isset($_POST['fancycolor']) ? $this->setImplodVal($_POST['fancycolor']) : '';
        }

        $custom_filters_encoded = urlencode(json_encode($custom_filters));
        if( !empty($custom_filters['diamondscat']) ) {
            $this->session->set_userdata('customes_filter', $custom_filters);
        } else {
            $this->session->unset_userdata('customes_filter');
        }
        if (count($_REQUEST['owner']) > 0)
            $id_array = implode(",", $_REQUEST['owner']);
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
		$data['filter_id_no'] = $id;
		$data['diamond_shape'] = $diamond_shape;
		$data['category_id'] = str_replace('%20', ' ', $cat_id);
        $data['extraheader'] = '';
        $collections = '';
        $typeoptions = '';
        $data['collections'] = '';
        $data['typeoptions'] = '';
        if ($this->isadminlogin()) {
            $data['diamond_shape_option'] = $this->get_diamond_shapes_option($action, $id, $diamond_shape);
            if ($action == 'Delete' || $action == 'Revise') {
                $ret = $this->Adminmodel->pendantstones($_POST, $action, $id);
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/x-json");
                $json = "";
                $json .= "{\n";
                $json .= "total: " . $ret['total'] . ",\n";
                $json .= "}\n";
                echo $json;
            } else {
                if ($action == 'add' || $action == 'edit' || $action == 'editAmazon' ) {
                 	$this->load->helper(array('form', 'url'));
                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
                    if (isset($_POST[$action . 'btn'])) {
                        $ret = $this->Adminmodel->pendantstones($_POST, $action, $id);
                        if ($ret['error'] == '') {
                            $data['success'] = $ret['success'];
                        } else {
                            $data['error'] = $ret['error'];
                            if ($action != 'edit')
                                $data['details'] = $_POST;
                        }
                    }
                    $data['extraheader'] .= $this->Commonmodel->addEditor('simple');
                    if ($action == 'edit' || $action == 'editAmazon') {
                        $details = $this->Adminmodel->getPendantById($id);
                        $dmtype = $this->Adminmodel->getDiamondType($id);
                        $data['clarity_enhance'] = ( $dmtype['clarityresult'] > 0 ? ' Clarity Enhanced ' : '' );
                        $data['details'] = $details[0]; //echo "</pre>"; print_r($data['details']); echo "</pre>";
                        $diamShape = viewDmShape($data['details']['shape']);
                        $data['shape_imge'] = $this->Adminmodel->getColorImgColmn($data['details']['fancy_color'], $diamShape);
                        $data['collections'] = $collections;
                        $data['animations'] = $this->Adminmodel->getFlashByStockId($id);
                        $data['id'] = $id;
                    }
                }
                $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
					$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
					$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
				});
				$("#loose").click();';
                $data['leftmenus'] = $this->Adminmodel->adminmenuhtml('pendants');
				if($id_array==''){ $id_array=0; }
				$actionList = array('photogallery', 'amazongallery');
				$actionsView = ( in_array($action, $actionList) ? $action.'/' : '' );
				$url = config_item('base_url') . 'admin/getpendants/' . $diamond_shape . '/' . $actionsView . $id_array . '/' . $custom_filters_encoded;
				$data['action'] = $action;
				$data['onloadextraheader'] .= "  var actionview = '".$action."';

				function amazonGaleryBtn() {
					window.location = '" . SITE_URL . "admin/allloosediamonds/amazongallery/".$loose_search."';
				}

				if(actionview == 'photogallery' || actionview == 'amazongallery') {
					$(\"#results\").flexigrid({   	 							
						url: '" . $url . "',
						dataType: 'json',
						colModel : [
							{display: 'ID', name : 'lot', width : 130, sortable : true, align: 'center'},
							{display: 'Certificate Image', name : 'price', width : 60, sortable : true, align: 'center'},
							{display: 'Shape image', name : 'shape', width : 85, sortable : true, align: 'center'},
							{display: 'Image2', name : 'ebay_img2', width : 85, sortable : true, align: 'center'},
							{display: 'Image3', name : 'ebay_img3', width : 85, sortable : true, align: 'center'},
							{display: 'Image4', name : 'ebay_img4', width : 85, sortable : true, align: 'center'},
							{display: 'Image5', name : 'ebay_img5', width : 85, sortable : true, align: 'center'},
							{display: 'Image6', name : 'ebay_img6', width : 85, sortable : true, align: 'center'}
						],
						buttons : [
							{name: 'Home', bclass: 'add', onpress : homeBtn},
							{name: 'Delete', bclass: 'delete', onpress : test},
							{name: 'Revise', bclass: 'add', onpress : test},
							{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},
							{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},
							{name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},
							{separator: true}
						],
						searchitems : [
							{display: 'Lot #', name : 'lot', isdefault: true},
							{display: 'Cert #', name : 'Cert_n', isdefault: true},
							{display: 'Certificate', name : 'Cert', isdefault: true},
							{display: 'Stock', name : 'Stock_n', isdefault: true},
							{display: 'Owner', name : 'owner', isdefault: true},
							{display: 'Ebay Id', name : 'ebayid', isdefault: true},
							{display: 'Type', name : 'dmtype', isdefault: false}
						], 		
						sortname: \"price\",
						sortorder: \"ASC\",
						usepager: true,
						title: '<h1 class=\"pageheader\">Loose Diamonds</h1>',
						useRp: true,
						rp: 50,
						showTableToggleBtn: false,
						width:1020,
						height: 565
					});
				} else {
					$(\"#results\").flexigrid({   	 							
						url: '" . $url . "',
						dataType: 'json',
						colModel : [
							{display: 'ID', name : 'lot', width : 130, sortable : true, align: 'center'},
							{display: 'Certificate Image', name : 'price', width : 160, sortable : true, align: 'center'},
							{display: 'Shape image', name : 'shape', width : 60, sortable : true, align: 'center'},
							{display: 'ebayItemId', name : 'ebayid', width : 85, sortable : true, align: 'center'},
							{display: 'Price Per Carat', name : 'price', width : 120, sortable : true, align: 'center'},
							{display: 'Our Price', name : 'price', width : 100, sortable : true, align: 'right'},
							{display: 'eBay Price', name : 'price', width : 100, sortable : true, align: 'right'},
							{display: 'Owner ID', name : 'owner', width : 120, sortable : true, align: 'center'},
							{display: 'Cert', name : 'Cert', width : 120, sortable : true, align: 'center'},
							{display: 'Cert #', name : 'Cert_n', width : 120, sortable : true, align: 'center'},
							{display: 'Type', name : 'type', width : 120, sortable : true, align: 'center'},
							{display: 'Fancy Color', name : 'fancy_color', width : 120, sortable : true, align: 'center'},
							{display: 'Clarity', name : 'clarity', width : 120, sortable : true, align: 'center'},
							{display: 'Shape', name : 'shape', width : 120, sortable : true, align: 'center'},
							{display: 'Carat', name : 'carat', width : 75, sortable : true, align: 'center'},
							{display: 'Color', name : 'color', width : 125, sortable : true, align: 'center'},
							{display: 'Meas', name : 'Meas', width : 60, sortable : true, align: 'center'},
							{display: 'Cert_N', name : 'Cert_n', width : 60, sortable : true, align: 'center'},
							{display: 'Stock', name : 'Stock_n', width : 60, sortable : true, align: 'center'},
							{display: 'Country', name : 'Country', width : 60, sortable : true, align: 'center'},
							{display: 'State', name : 'State', width : 60, sortable : true, align: 'center'},
							{display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center',hide: true},
							{display: 'Cut', name : 'cut', width : 60, sortable : true, align: 'center',hide: true}
						],
						buttons : [
							{name: 'Home', bclass: 'add', onpress : homeBtn},
							{name: 'Delete', bclass: 'delete', onpress : test},
							{name: 'Revise', bclass: 'add', onpress : test},
							{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},
							{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},
							{separator: true}
						],
						searchitems : [
							{display: 'Lot #', name : 'lot', isdefault: true},
							{display: 'Cert #', name : 'Cert_n', isdefault: true},
							{display: 'Certificate', name : 'Cert', isdefault: true},
							{display: 'Stock', name : 'Stock_n', isdefault: true},
							{display: 'Owner', name : 'owner', isdefault: true},
							{display: 'Ebay Id', name : 'ebayid', isdefault: true},
							{display: 'Type', name : 'dmtype', isdefault: false}
						],
						sortname: \"price\",
						sortorder: \"ASC\",
						usepager: true,
						title: '<h1 class=\"pageheader\">Loose Diamonds</h1>',
						useRp: true,
						rp: 50,
						showTableToggleBtn: false,
						width:1020,
						height: 565
					});
				}
				function homeBtn() {
					window.location = '" . SITE_URL . "admin/allloosediamonds/view/".$loose_search."';
				}
				function submitGalry() {
					document.getElementById('rapnetstones').submit();
				}
				function galeryBtn() {
					window.location = '" . SITE_URL . "admin/allloosediamonds/photogallery/".$loose_search."';
				}
				function test(com,grid){
					var idlist = $(\".bookid:checked\").map(
					function () {return this.value;}).get().join(\",\");
					var ttcount = $(\".bookid:checked\").length;
					var itemlist ='';
					if (com=='Delete' || com=='Revise'){ 
						if($('.trSelected').length>0 || idlist != ''){
							var totalItem = (idlist != '' ? ttcount : $('.trSelected').length );
							if(confirm(com+' ' + totalItem + ' rows?')){
								if(idlist != '') {
									itemlist = idlist;
								} else {
									var items = $('.trSelected');
									for(i=0;i<items.length;i++){
										itemlist+= items[i].id.substr(3)+\",\";
									}
								}
								if(com=='Revise') {
									$.ajax({
										type: \"POST\",
										url: \"" . config_item('base_url') . "admin/allloosediamonds/Revise\",
										data: \"items=\"+itemlist,
										success: function(data){
											//alert('Total Revised rows: '+data.total);
											$.facebox('<div>'+data+'</div>');
											$(\".ebayExportResponse\").html(data).show();
											//$(\"#results\").flexReload();
										},
										error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
									});
								} else {
									$.ajax({
										type: \"POST\",
										dataType: \"json\",
										url: \"" . config_item('base_url') . "admin/allloosediamonds/Delete\",
										data: \"items=\"+itemlist,
										success: function(data){
											alert('Total Deleted rows: '+data.total);
											$(\"#results\").flexReload();
										},
										error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
									});
								}
							}
						} else{
							alert('You have not selected a row.');
						} 
					}else if (com=='Add'){
						window.location = '" . config_item('base_url') . "admin/allloosediamonds/add';
					}			
				}";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
				$data['onloadextraheader'] .= "var so;";
				$data['usetips'] = true;
				$data['galry_link'] = SITE_URL.'admin/searchStones/loose/'.$id;
				$output = $this->load->view('admin/loosediamonds', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function get_diamond_shapes_option($actions='', $search_id=0, $shape_value='') {
        $results = array(
            'B' => 'Round',
            'PR' => 'Princess',
            'C' => 'Cushion',
            'R' => 'Radiant',
            'E' => 'Emerald',
            'P' => 'Pear',
            'O' => 'Oval',
            'AS' => 'Asscher',
            'M' => 'Marquise',
            'H' => 'Heart'
        );
        $option_list = '';
        $shape_link = SITE_URL . 'admin/allloosediamonds/'.$actions.'/' . $search_id . '/';
        $option_list = '<option value="'.$shape_link.'" '.selectedOption('', '').'>Select Diamond Shape</option>';
        
        foreach ( $results as $shape_key => $shape_label ) {
            $option_list .= '<option value="'.$shape_link.$shape_key.'" '.selectedOption($shape_key, $shape_value).'>'.$shape_label.'</option>';
        }
        
        return $option_list;
    }
    
    
    function allloosediamonds_1231($action = 'view', $id = 0) {
	
		
		if (isset($_REQUEST['submit_search']) && !empty($_REQUEST['submit_search'])) {
			$this->Adminmodel->savelooseSearchCriteria($_REQUEST);			
		}
		
		if (isset($_SESSION['sldata']) && count($_SESSION['sldata']) > 0) {
			//var_dump($_SESSION['sdata']);
			$_REQUEST = $_SESSION['sldata'];
			unset($_SESSION['sldata']);
		}
		
		//echo "<pre>"; print_r($_REQUEST); exit;
        $custom_filters['caratmin'] = isset($_REQUEST['caratmin']) ? $_REQUEST['caratmin'] : '';
        $custom_filters['caratmax'] = isset($_REQUEST['caratmax']) ? $_REQUEST['caratmax'] : '';
        $custom_filters['color'] = isset($_REQUEST['color']) ? implode(',', $_REQUEST['color']) : '';
        $custom_filters['cut'] = isset($_REQUEST['cut']) ? implode(',', $_REQUEST['cut']) : '';
        $custom_filters['shape'] = isset($_REQUEST['shape']) ? implode(',', $_REQUEST['shape']) : '';
        $custom_filters['clarity'] = isset($_REQUEST['clarity']) ? implode(',', $_REQUEST['clarity']) : '';
        $custom_filters_encoded = urlencode(json_encode($custom_filters));
        //echo "<pre>";
        //print_r($custom_filters);
        ///print_r(json_decode(urldecode($custom_filters_encoded)));
        if (count($_REQUEST['owner']) > 0)
            $id_array = implode(",", $_REQUEST['owner']);
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        $data['extraheader'] = '';
        $collections = '';
        $typeoptions = '';
        $data['collections'] = '';
        $data['typeoptions'] = '';
        if ($this->isadminlogin()) {
            if ($action == 'delete') {
                $ret = $this->Adminmodel->pendantstones($_POST, $action, $id);
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/x-json");
                $json = "";
                $json .= "{\n";
                $json .= "total: " . $ret['total'] . ",\n";
                $json .= "}\n";
                echo $json;
            } else {
                if ($action == 'add' || $action == 'edit') {
                    $this->load->library('form_validation');
                    $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
                    if (isset($_POST[$action . 'btn'])) {
                        $ret = $this->Adminmodel->pendantstones($_POST, $action, $id);
                        if ($ret['error'] == '') {
                            $data['success'] = $ret['success'];
                        } else {
                            $data['error'] = $ret['error'];
                            if ($action != 'edit')
                                $data['details'] = $_POST;
                        }
                    }
                    $data['extraheader'] .= $this->Commonmodel->addEditor('simple');
                    if ($action == 'edit') {
                        $details = $this->Adminmodel->getPendantById($id);
                        $data['details'] = $details[0];
                        $data['collections'] = $collections;
                        $data['animations'] = $this->Adminmodel->getFlashByStockId($id);
                        $data['id'] = $id;
                    }
                }
                $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#loose").click();';
                $data['leftmenus'] = $this->Adminmodel->adminmenuhtml('pendants');
				if($id_array==''){ $id_array=0; }
                $url = config_item('base_url') . 'admin/getpendants/' . $id_array . '/' . $custom_filters_encoded;
                $data['action'] = $action;
                $data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'lot', width : 80, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Certificate Image', name : 'price', width : 60, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Shape image', name : 'shape', width : 60, sortable : true, align: 'center'},
                                                                                                                                                {display: 'ebayItemId', name : 'ebayid', width : 85, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Rapnet Price', name : 'price', width : 60, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Our Price', name : 'price', width : 60, sortable : true, align: 'center'},																		
																		{display: 'Owner ID', name : 'owner', width : 120, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Clarity', name : 'clarity', width : 120, sortable : true, align: 'center'},
																		{display: 'Shape', name : 'shape', width : 120, sortable : true, align: 'center'},
																		{display: 'Carat', name : 'carat', width : 75, sortable : true, align: 'center'},
																		{display: 'Color', name : 'color', width : 125, sortable : true, align: 'center'},																		
                                                                                                                                                {display: 'Meas', name : 'Meas', width : 60, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Cert_N', name : 'Cert_n', width : 60, sortable : true, align: 'center'},      
                                                                                                                                                {display: 'Stock', name : 'Stock_n', width : 60, sortable : true, align: 'center'},
                                                                                                                                                {display: 'Country', name : 'Country', width : 60, sortable : true, align: 'center'},      
                                                                                                                                                {display: 'State', name : 'State', width : 60, sortable : true, align: 'center'},            
																		{display: 'Cert', name : 'Cert', width : 60, sortable : true, align: 'center',hide: true},
                                                                                                                                                {display: 'Cut', name : 'cut', width : 60, sortable : true, align: 'center',hide: true}
																		],
																		 buttons : [	{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Lot #', name : 'lot', isdefault: true},
																		{display: 'Certificate', name : 'Cert', isdefault: true},
                                                                                                                                                {display: 'Stock', name : 'Stock_n', isdefault: true},
																		{display: 'Owner', name : 'owner', isdefault: false}																		
																		], 		
																	sortname: \"Date\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Loose Diamonds</h1>',
																	useRp: true,
																	rp: 50,
																	showTableToggleBtn: false,
																	width:1020,
																	height: 565
																	}
																	);
																	
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{ 
																			  
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }																                                
                                                                                                                                                                  
                                                                                                                                                                                                
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/loosediamonds/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                   error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
																										 });
																										 						  
		
		
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                } 
																			
																			
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/loosediamonds/add';
																			}			
																	}
														 
														 ";
                $data['extraheader'] .= ' 
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
                $data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
                $data['extraheader'] .= ' 
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
                $data['extraheader'] .= ' 
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
                $data['onloadextraheader'] .= " 
											var so;				
		 									";
                $data['usetips'] = true;
                $output = $this->load->view('admin/loosediamonds', $data, true);
                $this->output($output, $data);
            }
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }
	
function rapnetcomdiamonds($action = 'view', $id = 0) {
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        $data['extraheader'] = '';
        $collections = '';
        $typeoptions = '';
        $data['collections'] = '';
        $data['typeoptions'] = '';
        if ($this->isadminlogin()) {
            if ($action == 'delete') {
                $ret = $this->Adminmodel->owners($_POST, $action, $id);
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/x-json");
                $json = "";
                $json .= "{\n";
                $json .= "total: " . $ret['total'] . ",\n";
                $json .= "}\n";
                echo $json;
            } else {
                if ($action == 'add' || $action == 'edit') {
                    //        $this->load->library('form_validation');
//          $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
                    if (isset($_POST[$action . 'btn'])) {
                        $ret = $this->Adminmodel->owners($_POST, $action, $id);
                        if ($ret['error'] == '')
                            $data['success'] = $ret['success'];
                        else {
                            $data['error'] = $ret['error'];
                            if ($action != 'edit')
                                $data['details'] = $_POST;
                        }
                    }
                    $data['extraheader'] .= $this->Commonmodel->addEditor('simple');
                    if ($action == 'edit') {
                        $details = $this->Adminmodel->getOwnerById($id);
                        $data['details'] = $details[0];
                        $data['collections'] = $collections;
                        $data['animations'] = $this->Adminmodel->getFlashByStockId($id);
                        $data['id'] = $id;
                    }
                }
                $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
              {
    $(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
    $(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
      });
    $("#rapnet").click();';
                $data['leftmenus'] = $this->Adminmodel->adminmenuhtml('owners');
                $url = config_item('base_url') . 'admin/get_all_owners';
                $data['action'] = $action;
                $data['onloadextraheader'] .= "   $(\"#results\").flexigrid
																	(
																	{
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'ID', name : 'owner_id', width : 80, sortable : true, align: 'center'},
                                                                                                                                                {display: 'ownerID', name : 'company_id', width : 60, sortable : true, align: 'center'},
																		{display: 'company', name : 'company_name', width : 85, sortable : true, align: 'center'},
                                                                                                                                                {display: 'add date', name : 'company_adddate', width : 60, sortable : true, align: 'center' }
																		],
																		 buttons : [{name: 'Add', bclass: 'add', onpress : test},
																				{name: 'Delete', bclass: 'delete', onpress : test},
																				{separator: true}
																			],
																	searchitems : [
																		{display: 'Owners #', name : 'owner_id', isdefault: true},
																		{display: 'Company name', name : 'company_name', isdefault: true},
                                                                                                                                                {display: 'Company ID', name : 'company_id', isdefault: true}
																		],
																	sortname: \"owner_id\",
																	sortorder: \"desc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Rapnet Companies</h1>',
																	useRp: true,
																	rp: 50,
																	showTableToggleBtn: false,
																	width:1020,
																	height: 565
																	}
																	);
																	function test(com,grid)
																	{
																		if (com=='Delete')
																			{
																			if($('.trSelected').length>0){
																			            if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
																                                var items = $('.trSelected');
																                                var itemlist ='';
																                                for(i=0;i<items.length;i++){
																                                        itemlist+= items[i].id.substr(3)+\",\";
																                                }
																                                $.ajax({
																										   type: \"POST\",
																										   dataType: \"json\",
																										   url: \"" . config_item('base_url') . "admin/owners/delete\",
																										   data: \"items=\"+itemlist,
																										   success: function(data){
																										   	alert('Total Deleted rows: '+data.total);
																										    $(\"#results\").flexReload();
																										   },
                                                                                                                                                                                                                     error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
																										 });
																                                														                        }
																                } else{
																                        alert('You have to select a row.');
																                }
																			}
																		else if (com=='Add')
																			{
																				window.location = '" . config_item('base_url') . "admin/owners/add';
																			}
																	}
														 ";
                $data['extraheader'] .= '
											 <script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
                $data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
                $data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>
					';
                $data['extraheader'] .= '
					<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>
					';
                $data['onloadextraheader'] .= "
											var so;
		 									";
                $data['usetips'] = true;
				$data['savesearch'] = $this->Adminmodel->getSaveSearch();
                $output = $this->load->view('admin/all_ring_owners', $data, true);
                $this->output($output, $data);
            }
        } else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }

	function getpendants($addoption = '') {
		$id_array = $this->uri->segment(3, 0);
		$custom_filters = $this->uri->segment(4);
		$custom_filters_1 = json_decode(urldecode($custom_filters));
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
		/* custom filters */
		if (isset($custom_filters_1)) {
			$results = $this->Adminmodel->getPendants($page, $rp, $sortname, $sortorder, $query, $qtype,$id_array, '', $custom_filters_1);
		} else {
			$results = $this->Adminmodel->getPendants($page, $rp, $sortname, $sortorder, $query, $qtype,$id_array);
        }
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		$destFolder = config_item('base_url') . 'images/diamonds/shape/';
		foreach ($results['result'] as $row) {
			if (empty($row['certimage'])) {
				$sql = "SELECT cert_img FROM " . $this->config->item('table_perfix') . "cert  WHERE cert_name = '" . $row['Cert'] . "'";
				$query = $this->db->query($sql);
				$result = $query->result_array();

				if ($row['certimage'] == BASE_URL() ) {
					$row['certimage'] = config_item('base_url').'images/noringimage.png'; 
				} else{
					$row['certimage'] = $result[0]['cert_img'];
				}
			}
			if (!empty($row['Meas'])) {
				list($w, $b, $h) = explode("x", $row['Meas']);
				$meas = $w . " x " . $b . " x " . $h;
			} else {
				$meas = '';
			}
			$pendantImage='';
			$sql_img = "SELECT picture1 FROM " . $this->config->item('table_perfix') . "loosepictures  WHERE  diamondshape = '" . $row['shape'] . "'";
			$qry_img = $this->db->query($sql_img);
			$img_res = $qry_img->result_array();
			$destFolder1 = 'images/pictures/';
			switch ($row['shape']){
				case 'R':
					$shape = 'white';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'Pr':
					$shape = 'princesst';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'R':
					$shape = '98_468_gray_background';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'E':
					$shape = 'emeraldt';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'AS':
					$shape = 'asschert';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'O':
					$shape = 'ovalt';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'M':
					$shape = 'marquiset';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'P':
					$shape = 'peart';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'H':
					$shape = 'heartt';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'C':
					$shape = '76_83_cushiont';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'B':
					$shape = 'white';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'T':
					$shape = '91_832_trilliant';
					$destFile = $destFolder1.$shape.'.jpg';
				break;
				case 'Cushion Modifieds':
					$destFile = 'images/noringimage.png';
				break;
				case 'CUSHION MODIFIED': 
					$shape = 'Cushion';
					$destFile = 'images/noringimage.png';
				break;
				default:
					$shape = $detail['shape'];
					$destFile = 'images/noringimage.png';
				break;
			}
			$pendantImage = config_item('base_url').$destFile;
			$pc_price = number_format($row['price'],2);
			$price = $row['price'];

			if (!empty($row['Meas'])) {
				$price = $price * $row['carat'];
			}

			$qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
			$result = $this->db->query($qry);
			$pret = $result->row_array();
			$rate = $pret['rate'];

			$rate = ($rate/100);
			$xprice = $price * $rate;
			$ourprice = $price + $xprice;
			$rprice = ( $ourprice * (1.65/100) ) + $ourprice;

			$ourprice = number_format(round($ourprice));
			$rprice = number_format(round($rprice));
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['lot'] . "',";
			$json .= "cell:['Lot #: " . $row['lot'] . "<br /><a href=\'" . config_item('base_url') . "admin/allloosediamonds/edit/" . $row['lot'] . "\'  class=\"edit\" style=\"color:red;font-weight:bold;\">Send to eBay</a>'";
			$json .= ",'<img src=\'" . ($row['certimage']) . "\' width=\'81\' alt=\'Certificate Image\'><br />'";
			$json .= ",'<img src=\'" . ($pendantImage) . "\' width=\'80\'><br />'";
			$json .= ",'" . addslashes($row['ebayid']) . "'";
			$json .= ",'$" . addslashes($pc_price) . "'";
			$json .= ",'$" . addslashes($ourprice) . "'";
			$json .= ",'" . addslashes($row['owner']) . "'";
			$json .= ",'" . addslashes($row['clarity']) . "'";
			$json .= ",'" . addslashes($row['shape']) . "'";
			$json .= ",'" . addslashes(number_format($row['carat'], 2)) . "'";
			$json .= ",'" . addslashes(ucfirst($row['color'])) . "'";
			$json .= ",'" . addslashes(ucfirst($meas)) . "'";
			$json .= ",'" . addslashes(ucfirst($row['Cert_n'])) . "'";
			$json .= ",'" . addslashes(ucfirst($row['Stock_n'])) . "'";
			$json .= ",'" . addslashes(ucfirst($row['Country'])) . "'";
			$json .= ",'" . addslashes(ucfirst($row['State'])) . "'";
			$json .= ",'" . addslashes(ucfirst($row['Cert'])) . "'";
			$json .= ",'" . addslashes(ucfirst($row['cut'])) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
        $json .= "]\n";
        $json .= "}";
        echo $json;
    }

	function configuration() {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if ($this->isadminlogin()) {
			$output = $this->load->view('admin/configuration', $data, true);
		}else
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
	}

	function loosediamondshapes($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->loosediamondshapes($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST['addbtn'])) {
						$ret = $this->Adminmodel->loosediamondshapes($_POST, $action, $id);
						if ($ret['error'] == '') {
							$data['success'] = $ret['success'];
						} else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$details = $this->Adminmodel->loosediamondshapesByID($id);
						$data['details'] = $details[0];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
					$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
					$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
				});
				$("#rapnet").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('shapes');
				$url = config_item('base_url') . 'admin/getloosediamondshapes';
				$data['action'] = $action;
				$data['onloadextraheader'] .= " $(\"#results\").flexigrid({   	 							
					url: '" . $url . "',
					dataType: 'json',
					colModel : [
						{display: 'ID', name : 'pic_id', width : 80, sortable : true, align: 'center'},
						{display: 'Shape', name : 'shape', width : 60, sortable : true, align: 'center'},
						{display: 'Picture1', name : 'picture1', width : 60, sortable : true, align: 'center'},
						{display: 'Picture2', name : 'picture2', width : 85, sortable : true, align: 'center'},
						{display: 'Picture3', name : 'picture3', width : 85, sortable : true, align: 'center'},
						{display: 'Picture4', name : 'picture4', width : 85, sortable : true, align: 'center'},
						{display: 'Picture5', name : 'picture5', width : 85, sortable : true, align: 'center'},
						{display: 'Picture6', name : 'picture6', width : 85, sortable : true, align: 'center'}
					],
					buttons : [
						{name: 'Delete', bclass: 'delete', onpress : test},
						{name: 'Add', bclass: 'add', onpress : test},
						{separator: true}
					],
					searchitems : [
						{display: 'PIC ID #', name : 'pic_id', isdefault: true}
					], 		
					sortname: \"pic_id\",
					sortorder: \"desc\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Loose Diamonds Shapes Pictures</h1>',
					useRp: true,
					rp: 50,
					showTableToggleBtn: false,
					width:1020,
					height: 565
				});

				function test(com,grid){
					if (com=='Delete'){ 
						if($('.trSelected').length>0){
							if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
								var items = $('.trSelected');
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+\",\";
								}

								$.ajax({
									type: \"POST\",
									dataType: \"json\",
									url: \"" . config_item('base_url') . "admin/diamondshapes/delete\",
									data: \"items=\"+itemlist,
									success: function(data){
										alert('Total Deleted rows: '+data.total);
										$(\"#results\").flexReload();
									},
									error: function(x,e){
										alert(x.status +  e + itemlist + x.responseText);
									}
								});
							}
						} else{
							alert('You have to select a row.');
						}
					}else if (com=='Add'){
						window.location = '" . config_item('base_url') . "admin/loosediamondshapes/add';
					}			
				}";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
				$data['onloadextraheader'] .= "var so;				";
				$data['usetips'] = true;
				$output = $this->load->view('admin/loosediamondshapes', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function getloosediamondshapes($addoption = '') {
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'pic_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
		$results = $this->Adminmodel->getloosediamondshapes($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;
		foreach ($results['result'] as $row) {
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['pic_id'] . "',";
			$json .= "cell:['Lot #: " . $row['pic_id'] . "<br /><a href=\'" . config_item('base_url') . "admin/loosediamondshapes/edit/" . $row['pic_id'] . "\'  class=\"edit\" style=\"color:red;font-weight:bold;\">Edit</a>'";
			$json .= ",'" . addslashes(ucfirst($row['diamondshape'])) . "'";
			if ($row['picture1'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . ($row['picture1']) . "\' width=\'80\'><br />'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />'";
			if ($row['picture2'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . ($row['picture2']) . "\' width=\'80\'><br />'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />'";
			if ($row['picture3'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . ($row['picture3']) . "\' width=\'80\'><br />'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />'";
			if ($row['picture4'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . ($row['picture4']) . "\' width=\'80\'><br />'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />'";
			if ($row['picture5'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . ($row['picture5']) . "\' width=\'80\'><br />'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />'";
			if ($row['picture6'] != '')
			$json .= ",'<img src=\'" . config_item('base_url') . ($row['picture6']) . "\' width=\'80\'><br />'";
			else
			$json .= ",'<img src=\'" . config_item('base_url') . "images/noringimage.png\' width=\'80\'><br />'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function sendStocktoebay(){
		$data = $this->Adminmodel->getAllDiamonds();
		$s=1;
		for($k=0;$k< sizeof($data);$k++){
			$s = $k+1;
			foreach($data['details'] AS $index=>$value) {
				$status = $this->Adminmodel->addDiamondtoEbay($value, 30);
				$value =  $data[$k]['lot'];
				$details = $this->Adminmodel->getRapnetStonesById($value);
				$GetResponse =  $this->Adminmodel->addRapnetStoneToeBay($details[0],30,'',$s);
			}
		}
	}

	function updateInventory(){
		echo $this->Adminmodel->deleteWatchonAmazon();
	}

	function getgemstones($jid){
		return  $this->Adminmodel->getGemstonesByStockId($jid);
	}

	function testimonial($action = 'view', $id = 0) {
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		if ($this->isadminlogin()) {
			if ($action == 'delete') {
				$ret = $this->Adminmodel->testimonials($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit') {
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<font class="require">', '</font>');
					if (isset($_POST['addbtn'])) {
						$ret = $this->Adminmodel->testimonials($_POST, $action, $id);
						if($ret['error'] == '') {
							$data['success'] = $ret['success'];
						} else {
							$data['error'] = $ret['error'];
							if ($action != 'edit')
							$data['details'] = $_POST;
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					if ($action == 'edit') {
						$details = $this->Adminmodel->testimonialByID($id);
						$data['details'] = $details[0];
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('shapes');
				$url = config_item('base_url').'admin/gettestimonials';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "   $(\"#results\").flexigrid({   	 							
					url: '" . $url . "',
					dataType: 'json',
					colModel : [
						{display: 'Testimonial ID', name : 'testimonial_id', width : 80, sortable : true, align: 'center'},
						{display: 'Author name', name : 'testimonial_author_name', width : 150, sortable : true, align: 'center'},
						{display: 'Add date', name : 'testimonial_adddate', width : 150, sortable : true, align: 'center'},
					],
					buttons : [
						{name: 'Delete', bclass: 'delete', onpress : test},
						{name: 'Add', bclass: 'add', onpress : test},
						{separator: true} 
					],
					searchitems : [
						{display: 'Testimonial Id #', name : 'testimonial_id', isdefault: true}
					], 		
					sortname: \"testimonial_id\",
					sortorder: \"desc\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Testimonials</h1>',
					useRp: true,
					rp: 50,
					showTableToggleBtn: false,
					width:1020,
					height: 565
				});

				function test(com,grid){
					if (com=='Delete'){ 
						if($('.trSelected').length>0){
							if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
								var items = $('.trSelected');
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+\",\";
								}

								$.ajax({
									type: \"POST\",
									dataType: \"json\",
									url: \"".config_item('base_url')."admin/testimonial/delete\",
									data: \"items=\"+itemlist,
									success: function(data){
										alert('Total Deleted rows: '+data.total);
										$(\"#results\").flexReload();
									},
									error: function(x,e){  window.location = '" . config_item('base_url') . "admin/testimonial'; }
								});
							}
						} else{
							alert('You have to select a row.');
						}
					}else if (com=='Add'){
						window.location = '" . config_item('base_url') . "admin/testimonial/add';
					}
				}";
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
				$data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/t.js" type="text/javascript"></script>';
				$data['onloadextraheader'] .= "var so;";
				$data['usetips'] = true;
				$output = $this->load->view('admin/testimonials', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	function gettestimonials(){
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'testimonial_id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
		$results = $this->Adminmodel->gettestimonials($page, $rp, $sortname, $sortorder, $query, $qtype);
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: text/x-json");
		$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: " . $results['count'] . ",\n";
		$json .= "rows: [";
		$rc = false;

		foreach ($results['result'] as $row) {
			$desc = strip_tags($row['testimonial_message']);
			if ($rc)
			$json .= ",";
			$json .= "\n {";
			$json .= "id:'" . $row['testimonial_id'] . "',";
			$json .= "cell:['Lot #: " . $row['testimonial_id'] . "<br /><a href=\'" . config_item('base_url') . "admin/testimonial/edit/" . $row['testimonial_id'] . "\'  class=\"edit\" style=\"color:red;font-weight:bold;\">Edit</a>'";
			$json .= ",'" . addslashes($row['testimonial_author_name']) . "'";
			$json .= ",'" . addslashes($row['testimonial_adddate']) . "'";
			$json .= "]";
			$json .= "}";
			$rc = true;
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}

	function categorymanagement($section){
		$data["msg"] = '';
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		if(!isset($section) || empty($section)){
			$section = 'stuller';
		}

		if(isset($_REQUEST["submit"])){
			if(isset($_REQUEST["ch"]) && !empty($_REQUEST["ch"])){
				$str ='';
				for($i=0;$i<sizeof($_REQUEST["ch"]);$i++){
					mysql_query("Update stullerdata_new set is_checked = '1'  where  Level2 = '".trim($_REQUEST["ch"][$i])."'");
					$str .= "'".$_REQUEST["ch"][$i]."'".",";
				}
			}
			$str = substr($str, 0,-1);
			if(isset($_REQUEST["sch"]) && !empty($_REQUEST["sch"])){
				for($i=0;$i<sizeof($_REQUEST["sch"]);$i++){
					mysql_query("Update stullerdata_new set is_checked = '1'  where  Level3 = '".trim($_REQUEST["sch"][$i])."'  and  Level2 IN ($str) ");
				}
			}
			$data["msg"] =  "Category has been updated successfully!!";
		}

		if($section == 'stuller'){
			$data["level2"] = $this->Adminmodel->getStullerlevel2();
		}
		if($section == 'quality'){
			$data["categories"] = $this->Adminmodel->getqualitygold();
			$data["section"] = "Quality";
		}

		$output = $this->load->view('admin/categorymanagement', $data, true);
		$this->output($output, $data);
	}

	function getcategorybylevel2(){
		$section = 'stuller';
		$category = (string)$_REQUEST["category"];

		if($section == 'stuller'){
			$category = urldecode($_REQUEST["category"]);
			$data["level3"] = $this->Adminmodel->getStullerlevel3($category);
			$str = '';
			$k=0;
			foreach($data["level3"]  as $d ){
				$checkedId = "sch$k";
				$checked='';
				if($d["is_checked"] == '1'){ $checked = "checked=checked"; }
				$str .= '&nbsp;&nbsp;&nbsp;|---<input type="checkbox" name='.$checkedId.' id='.$checkedId.'  value='.urlencode($d['category']). '  '.$checked.'  onclick=getcatproducts(this.value,"stuller"); ><b>'.$d["category"]."</b><br>";
				$k++;
			}
			echo $str;
		}
	}

	function getproducts(){
		$category = urldecode($_REQUEST["category"]);
		$section = urldecode($_REQUEST["section"]);
		if($section == 'stuller'){
			mysql_query("update stullerdata_new  set  is_checked = '1' where  Level3 = '".$category."'");
			$data["products"] = $this->Adminmodel->getProductsByCategory($category);
			$str = '';
			foreach($data["products"]  as $d){
				$image1 = config_item('base_url')."stuller_image/".$d["image"]; //thumb1,thum2,thumb3,thumb4,thumb5
				if (fopen($image1, "r")) {
				} else {
					$image1 = "http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";
				}
				$str .= '<div style="height: 284px;float:left;margin-left:15px;margin-top: 30px; width: 170px;" class="floatl ringbox txtcenter">
					<span style="color: rgb(0, 0, 0); font-size: 10px;">'.$d["Description"].'<br></span><br>
					<a href="javascript:void(0)"><center><div class="ringtile"><img style="width: 100px; height: 150px;" src="'.$image1.'" width="70"><br></div></center></a>';
					$str .= '<div style="color: rgb(0, 0, 0);" class="txtsmall"><b>Retail Price:</b> $'.$d["RetailPrice"].'</div>
					<div style="color: rgb(0, 0, 0);" class="txtsmall"><b>Metal:</b>  '.$d["PrimaryMetalComposition"].' </div>						    		 
					<div style="color: rgb(0, 0, 0);" class="txtsmall"><b>Quality:</b> '.$d["Quality"].'</div>';
					$str .= '<a style="color: rgb(0, 0, 0);" href="javascript:void(0)" class="search2" onclick = "getproddetail('."'".$d["ItemNumber"]."'".')">View Details</a>
				</div>';
			}
			echo $str;
			exit();
		}elseif($section == "quality"){
			$data["products"] = $this->Adminmodel->getqualitygold('0', '1000' , 'qg_id' , 'asc'  ,''  , 'itemid' , $category);
			$cid = str_replace("*", "/", $category);
			mysql_query("update dev_qg  set  is_checked = '1' where  folder LIKE '".$cid."'");
			$str = '';
			foreach($data["products"]["result"]  as $row){
				$row['img1'] = urldecode($row['img1']);
				$lot = $row['qg_id'];
				if(!empty($row['description'])){
					$title = $row['description'];
				}elseif($row['page']){
					$title =  $row['page']  ;
				}elseif($row['book']){
					$title  = $row['book'];
				}
				if(!empty($row['catalog_price'])){
					$p = $row['catalog_price'];
				}else if(!empty($row['cost_45'])){
					$p = $row['cost_45'];
				}else if(!empty($row['cost_50'])){
					$p = $row['cost_50'];
				}else if(!empty($row['cost_35'])){
					$p = $row['cost_35'];
				}else if(!empty ($row['cost_15'])){
					$p = $row['cost_15'];
				}
				if(stripos($row['folder'],'product'))
				$image1 = "https://images.qgold.com/0/100/".$row['image_name'];
				else
				$image1 = "http://qgold.com/product/275/".$row['image_name'].".jpg";
				if (fopen($image1, "r")) {
				} else {
					$image1 = "http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";
				}
				$str .= '<div style="height: 284px;float:left;margin-left:15px;margin-top: 30px; width: 170px;" class="floatl ringbox txtcenter">
					<span style="color: rgb(0, 0, 0); font-size: 10px;">'.$title.'<br></span><br>
					<a href="javascript:void(0)"><center><div class="ringtile"><img style="width: 100px; height: 150px;" src="'.$image1.'" width="70"><br></div></center></a>';
					$str .= '<div style="color: rgb(0, 0, 0);" class="txtsmall"><b>Price:</b> $'.number_format($p,2).'</div>
					<div style="color: rgb(0, 0, 0);" class="txtsmall"><b>Metal:</b>  '.$d["metal"].' </div>						    		 
					<div style="color: rgb(0, 0, 0);" class="txtsmall"><b>Weight:</b> '.$d["weight"].'</div>';
					$str .= '<a style="color: rgb(0, 0, 0);" href="javascript:void(0)" class="search2" onclick = "getquaiitydetail('."'".$lot."'".')" >View Details</a>
				</div>';
			}
			echo $str;
			exit();
		}
	}

	function getinfo($lot){
		$data = $this->getCommonData();
		$data['products'] = $this->Jewelrymodel->GetProductDetail_new($lot);

		$output = $this->load->view('admin/getinfo' , $data , false);
		echo $output;
	}

	function getqualityinfo($lot){
		$data = $this->getCommonData();
		$data['products'] = $this->Adminmodel->getqualitygoldByID($lot);
		$output = $this->load->view('admin/getqualityinfo' , $data , false);
		echo $output;
	}

	function sendstullertoebay($lot){
		$data = $this->getCommonData();
		$detail = $this->Jewelrymodel->GetProductDetail_new($lot);
		if(empty($detail["sub_cat_id"]) || $detail["sub_cat_id"] == '-1' ){
			if(empty($detail["parent_cat_id"]) || $detail["parent_cat_id"] == '-1'){
				$parent_cat_id  = $this->addEbayCategory($detail["Level2"],'-1');
				$detail["parent_cat_id"] = $parent_cat_id;
			}

			$cat_id  = $this->addEbayCategory($detail["Level3"],$detail["parent_cat_id"]);
			mysql_query("Update  stullerdata_new  set   parent_cat_id = '".$detail["parent_cat_id"]."'  where    Level2 = '".mysql_real_escape_string($detail["Level2"])."'");
			mysql_query("Update  stullerdata_new  set  sub_cat_id = '".$cat_id."'    where  Level3 = '".mysql_real_escape_string($detail["Level3"])."'  AND  Level2 = '".mysql_real_escape_string($detail["Level2"])."'");
		}
		$this->Adminmodel->addStullerToEbay($detail, '30' , 'stuller' );
	}

	function sendqgtoebay($qgid){
		$data = $this->getCommonData();
		$detail = $this->Adminmodel->getqualitygoldByID($qgid);
		$this->Adminmodel->addQualityGoldToEbay($detail, '30' , 'qg');
	}

	function addEbayCategory($categoryName,$parentID){
		$categoryid=   $this->Adminmodel->addEbayCategory($categoryName,$parentID);
		return $categoryid;
	}

	function savesearch($sid){
		$id = base64_decode($sid);
		$data = $this->Adminmodel->getSaveSearchData($id);
		$_SESSION['sdata'] = unserialize($data[0]['search_string']);
		$_SESSION['sr_id'] = $id;
		$_SESSION['cash_limit'] = $this->uri->segment(4);

		header("Location: " . config_item('base_url') . "admin/rapnetDiamonds");
	}

	function saveloosesearch($id){
		$data = $this->Adminmodel->getSavelooseSearchData($id);
		$_SESSION['sldata'] = unserialize($data[0]['search_string']);

		$_SESSION['sl_id'] = $id;
		$_SESSION['cash_limit'] = $this->uri->segment(4);
		header("Location: " . config_item('base_url') . "admin/allloosediamonds");
	}

	function saveloosesearchii($id){
		$data = $this->Adminmodel->getSavelooseSearchData($id);
		$_SESSION['sldata'] = unserialize($data[0]['search_string']);
		$_SESSION['sl_id'] = $id;
		$_SESSION['cash_limit'] = $this->uri->segment(4);

		header("Location: " . config_item('base_url') . "admin/allloosediamonds");
	}

	function delsavedsearch($id, $type){
		if($type){
			$this->db->delete('dev_saveloosesearch', array('id'=>$id));	
			header("Location: " . config_item('base_url') . "admin/loosediamonds");
		}else{
			$this->db->delete('dev_savesearch', array('id'=>$id));
			header("Location: " . config_item('base_url') . "admin/rapnetcomdiamonds");
		}
	}

	function sendBatchLooseDiamondsToEbay($save_loose_id){
		set_time_limit(600);

		$id = $save_loose_id;
		$data = $this->Adminmodel->getSavelooseSearchData($id);
		$sldata = unserialize($data[0]['search_string']);
		$_REQUEST = $sldata;

		$custom_filters['caratmin'] = isset($_REQUEST['caratmin']) ? $_REQUEST['caratmin'] : '';
		$custom_filters['caratmax'] = isset($_REQUEST['caratmax']) ? $_REQUEST['caratmax'] : '';
		$custom_filters['color'] = isset($_REQUEST['color']) ? implode(',', $_REQUEST['color']) : '';
		$custom_filters['cut'] = isset($_REQUEST['cut']) ? implode(',', $_REQUEST['cut']) : '';
		$custom_filters['shape'] = isset($_REQUEST['shape']) ? implode(',', $_REQUEST['shape']) : '';
		$custom_filters['clarity'] = isset($_REQUEST['clarity']) ? implode(',', $_REQUEST['clarity']) : '';

		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';

		/* custom filters */
		if (isset($custom_filters)) {
			$results = $this->Adminmodel->getPendantsWithoutLimit($page, $rp, $sortname, $sortorder, $query, $qtype,$id_array, '', $custom_filters);
		} else {
			$results = $this->Adminmodel->getPendantsWithoutLimit($page, $rp, $sortname, $sortorder, $query, $qtype,$id_array);
		}

		$cLimit = 0;
		foreach($results['result'] as $row){
			if($row['ebayid'] < 0){
				$details = $this->Adminmodel->getPendantById($row['lot']);
				$price = $details[0]['price'];

				if (!empty($row['Meas'])) {
					$price = $price * $details[0]['carat'];
				}
				$qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
				$result = $this->db->query($qry);
				$pret = $result->row_array();
				$rate = $pret['rate'];

				$rate = ($rate/100);
				$xprice = $price * $rate;
				$ourprice = $price + $xprice;
				$cLimit += $ourprice;

				$given_cash_limit = str_replace(',', '', $_SESSION['cash_limit']);
				if($given_cash_limit >= $cLimit){
					$GetResponse = $this->Adminmodel->addRapnetStoneToeBay($details[0], 30, 'pendants', '-1');
					if (isset($GetResponse) && !empty($GetResponse)) {
						$retuen["success"] = "Item has been Added Successfully!!!";
					} else {
						$retuen["success"] = "Item has been Added Successfully!!!";
					}
				} elseif($cLimit > $given_cash_limit) {
					$cLimit -= $ourprice;
				}
			}
		}
        header("Location: " . config_item('base_url') . "admin/allloosediamonds");
    }

	/* @param type $save_loose_id */
	function sendBatchEngagementRingsToEbay($save_ring_id){
		set_time_limit(600);

		$id = $save_ring_id;
		$data = $this->Adminmodel->getSaveSearchData($id);
		$sldata = unserialize($data[0]['search_string']);
		$_REQUEST = $sldata;
		$custom_filters['caratmin'] = isset($_REQUEST['caratmin']) ? $_REQUEST['caratmin'] : '';
		$custom_filters['caratmax'] = isset($_REQUEST['caratmax']) ? $_REQUEST['caratmax'] : '';
		$custom_filters['color'] = isset($_REQUEST['color']) ? implode(',', $_REQUEST['color']) : '';
		$custom_filters['cut'] = isset($_REQUEST['cut']) ? implode(',', $_REQUEST['cut']) : '';
		$custom_filters['shape'] = isset($_REQUEST['shape']) ? implode(',', $_REQUEST['shape']) : '';
		$custom_filters['clarity'] = isset($_REQUEST['clarity']) ? implode(',', $_REQUEST['clarity']) : '';
		$page = isset($_POST['page']) ? $_POST['page'] : 1;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 50;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'lot';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';

		/* custom filters */
		if (isset($custom_filters)) {
			$results = $this->Adminmodel->getRapnetStonesWithoutLimit($id_array, $page, $rp, $sortname, $sortorder, $query, $qtype, '', $custom_filters);
		} else {
			$results = $this->Adminmodel->getRapnetStonesWithoutLimit($id_array, $page, $rp, $sortname, $sortorder, $query, $qtype);
		}

		foreach($results['result'] as $row){
			if($row['ebayid'] < 0){
				$details = $this->Adminmodel->getRapnetStonesById($row['lot']);
				$price = $details[0]['price'];

				if (!empty($row['Meas'])) {
					$price = $price * $details[0]['carat'];
				}
				$qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
				$result = $this->db->query($qry);
				$pret = $result->row_array();
				$rate = $pret['rate'];
				$rate = ($rate/100);
				$xprice = $price * $rate;
				$ourprice = $price + $xprice;
				$cLimit += $ourprice;

				$given_cash_limit = str_replace(',', '', $_SESSION['cash_limit']);
				if($given_cash_limit >= $cLimit){
					$GetResponse = $this->Adminmodel->addRapnetStoneToeBay($details[0], 30, '', '-1');
					if (isset($GetResponse) && !empty($GetResponse)) {
						$retuen["success"] = "Item Successfully Update on eBay";
					} else {
						$retuen["success"] = $GetResponse;
					}
				} elseif($cLimit > $given_cash_limit) {
					$cLimit -= $ourprice;
				}
			}
		}
        header("Location: " . config_item('base_url') . "admin/rapnetDiamonds");
	}

	function ezstatusedit($id, $status){
		$this->Adminmodel->ezstatusmedit($id, $status);
		header("Location: " . config_item('base_url') . "admin/stuller");
	}

	function ezqualitygoldstatusedit($id, $status){
		$this->Adminmodel->ezqualitygoldstatusedit($id, $status);
		header("Location: " . config_item('base_url') . "admin/qualitygold");
	}

	function ezuniquestatusedit($id, $status){
		$this->Adminmodel->ezuniquestatusedit($id, $status);
		header("Location: " . config_item('base_url') . "admin/uniquesettings");
	}

	function catamanager(){
		if(isset($_POST['stullercatagory'])){
			$this->Adminmodel->setcatamanagersta('stuller',$_POST['stullercatagory'], $_POST['stullercatagory2'], $_POST['stullersta']);
			$data2['status'] = 'Success';
		}elseif(isset($_POST['qualitycatagory'])){
			$this->Adminmodel->setcatamanagersta('quality',$_POST['qualitycatagory'], $_POST['qualitycatagory2'], $_POST['qualitysta']);
			$data2['status'] = 'Success';
		}elseif(isset($_POST['uniquecatagory'])){
			$this->Adminmodel->setcatamanagersta('unique',$_POST['uniquecatagory'], 'fdsf', $_POST['uniquesta']);
			$data2['status'] = 'Success';
		}
		if(isset($_POST['overnight_subcate']) && !empty($_POST['overnight_subcate']) ){
			$categoryID = ( !empty($_POST['overnight_childcate']) ? $_POST['overnight_childcate'] : $_POST['overnight_subcate'] );
			$this->Adminmodel->managedInventoryPrices($categoryID,$_POST['ov_minpercent'], $_POST['ov_maxpercent']);
			$data2['status'] = 'Success';
		}

		$catainfo = $this->Adminmodel->getcatamanagerinfo();
		$data2['stuller'] = $catainfo['stuller'];
		$data2['unique'] = $catainfo['unique'];
		$data2['quality'] = $catainfo['quality'];
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
		});';
		$data['leftmenus'] = $this->Adminmodel->adminmenuhtml();
		$data['newtestimonials'] = $this->Adminmodel->newfeedbacks();
		$output = $this->load->view('admin/catamanagerview', $data2, true);
		$this->output($output, $data);
	}

	/* manage inventory */
	function inventory_mgnt(){
		$main_category = $this->catemodel->getMainCategory();
		$view_unique = '';

		if( count($main_category) > 0 ) {
			$view_unique .= '<option>Select Category</option>';
			foreach($main_category as $rowparen_cate) {
				$view_unique .= '<option value="'.$rowparen_cate['id'].'">'.$rowparen_cate['catname'].'</option>';
			}
		} else {
			$view_unique .= '<option>No Category Found</option>';	
		}
		
		/* unique section */
		if(isset($_POST['diamond_price'])){
			if($_POST['diamond_price'] == 'Revert'){
				if(!empty($_POST['shape_diamond'])){
					$diamond_cateid = $_POST['shape_diamond']; 
				}
				$this->Adminmodel->managedRevertDiamondPrices($diamond_cateid);
				$data2['status'] = 'Diamond Price is Reset successfully!!!';
			}else{
				if(!empty($_POST['shape_diamond'])){
					$diamond_cateid = $_POST['shape_diamond']; 
				}
				$this->Adminmodel->managedInventoryDiamondPrices($diamond_cateid,$_POST['diamond_price']);
				$data2['status'] = 'Diamond Price Margin is successfully Updated!!!';
			}
		}

		/* unique section */
		if(isset($_POST['uniqueprice_margin'])){
			if( !empty($_POST['uniques_sbcate2']) ){
				$unique_cateid = $_POST['uniques_sbcate2']; 
			} elseif( !empty($_POST['uniques_sbcate1']) ){
				$unique_cateid = $_POST['uniques_sbcate1'];
			} else {
				$unique_cateid = $_POST['unique_sbcate'];
			}
			$this->Adminmodel->managedInventoryPrices($unique_cateid,0, $_POST['uniqueprice_margin'], UNIQUE_OPTION);
			$data2['status'] = 'Unique Category is submitted successfully!';
		}

		/* stuller section */
		if(isset($_POST['stuller_category'])){
			$this->Adminmodel->managedInventoryPrices($_POST['stuller_category'],0, $_POST['stuler_pricemargin'], STULLER_OPTION);
			$data2['status'] = 'Stuller Category is submitted successfully!';
		}

		/* quality section */
		if(isset($_POST['quality_pricemargin'])){
			if( !empty($_POST['quality_child2']) ){
				$quality_cateid = $_POST['quality_child2']; 
			} elseif( !empty($_POST['quality_child1']) ){
				$quality_cateid = $_POST['quality_child1'];
			} else {
				$quality_cateid = $_POST['quality_childcate'];
			}
			$this->Adminmodel->managedInventoryPrices($quality_cateid,0, $_POST['quality_pricemargin'], QUALITY_OPTION);
			$data2['status'] = 'Quality Category is submitted successfully!';
		}

		/* overnight section */
		if(isset($_POST['overnight_subcate']) && !empty($_POST['overnight_subcate']) ){
			$categoryID = ( !empty($_POST['overnight_childcate']) ? $_POST['overnight_childcate'] : $_POST['overnight_subcate'] );
			$this->Adminmodel->managedInventoryPrices($categoryID, 0, $_POST['overnight_price'], OVERNIGHT_OPTION);
			$data2['status'] = 'Overnight Category is submitted successfully!';
		}

		/* stuller fine jewelry section */
		if(isset($_POST['stuller_fine_jew']) && !empty($_POST['stuller_fine_jew']) ){
			$this->Adminmodel->managedInventoryPrices($_POST['stuller_fine_jew'], 0, $_POST['stuller_fine_maring'], STULLER_FINE);
			$data2['status'] = 'Stuller Fine Jewelry Category is submitted successfully!';
		}

		/* hearts and diamond collection section */
		if(isset($_POST['david_stern_collection']) && !empty($_POST['david_stern_collection']) ){
			$this->Adminmodel->managedInventoryPrices($_POST['david_stern_collection'], 0, $_POST['dstern_margin'], 'dstern_collection');
			$data2['status'] = 'hearts and diamond Collection is submitted successfully!';
		}

		$catainfo = $this->Adminmodel->getcatamanagerinfo();
		$data2['stuller'] = $catainfo['stuller'];
		$data2['unique'] = $catainfo['unique'];
		$data2['quality'] = $catainfo['quality'];
		$data2['view_unique'] = $view_unique;
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
		});';
		$data2['newstyle_category'] = $this->overnight_subcate_list();
		$data2['newstyle_shape'] = $this->diamond_shape_list();
		$data2['quality_category'] = $this->getQualityCateList();
		$data['leftmenus'] = $this->Adminmodel->adminmenuhtml();
		$data['newtestimonials'] = $this->Adminmodel->newfeedbacks();
		$output = $this->load->view('admin/inventory_mgmtview', $data2, true);
		$this->output($output, $data);
	}

	/* manage inventory */
	function reset_wholesale_price_mgnt(){
	    $data2['msg_notify'] = 0;
        $data2['msg']        = '';
	    if( isset($_GET['update_wholesale_price_btn']) ){
	        $where_stock_number =  array( 'productId' => $this->input->get('old_stock_number') );
	        $dev_us_prices      =  $this->catemodel->getdata_any_table_where( $where_stock_number, 'dev_us_prices');
	        $get_price          = $this->input->get('enter_wholesale_price');
	        $wholesale_price    = $dev_us_prices[0]->priceRetail/$get_price * 100;
	        $where_data_update  =  array('wholesale_price' => $wholesale_price);
	        $this->catemodel->update_any_table( $where_data_update, 'dev_us_prices', 'productId', $this->input->get('old_stock_number') );
	        $data2['msg']        = 'Successfully Updated Wholesale Price!';
            $data2['msg_notify'] = 1;
	    }
		$output = $this->load->view('admin/resetWholesalePrice', $data2, true);
		$this->output($output, $data);
	}

	function get_details_by_stock_id() {
        $searchField    = $this->input->get('stock_id');        
        $search_field   = trim( urldecode($searchField) );
        $resultrows     = $this->catemodel->get_unique_rings_search_result( $search_field );  // unique rings search
        if( count($resultrows) ) {
			foreach ( $resultrows as $rows ) {
				$search_result = '<form class="form" action="">
					<a href="'.SITE_URL().'selection/engagement-ring-detail/'.$rows['id'].'" target="_blank"> View Details</a>
					<hr/>
					<h4>Update Wholesale Price in This Item</h4><br>
					<div class="form-group">
					<label for="email">Stock Number:</label>
					<input type="text" class="form-control" id="old_stock_number" readonly="readonly" name="old_stock_number" value="'.$rows['name'].'">
					</div>
					<div class="form-group">
					<label for="email">Enter Wholesale Price:</label>
					<input type="text" class="form-control" id="enter_wholesale_price" name="enter_wholesale_price" required="required">
					</div>
					<button type="submit" class="btn btn-default" name="update_wholesale_price_btn">Submit</button>
				</form>';
			}
        }

        if( !empty($search_result) ) {
            echo $search_result;
        } else {
            echo 'NO Matched Data Found!';
        }
    }

	/* Quality gold category list */
	function getQualityCateList($pid=0, $option='') {
		$results = $this->Qualitymodel->qualityGoldCateList( $pid );
		$quality_cate = '';
		if( count($results) > 0 ) {
			$quality_cate .= '<option value="">----------</option>';
			foreach( $results as $rows ) {
				$quality_cate .= '<option value="'.$rows['id'].'">'.$rows['title'].'</option>';
			}
		} else {
			$quality_cate .= '<option value="">NO Category Found</option>';
		}

		if( empty($option) ) {
			return $quality_cate;
		} else {
			echo $quality_cate;
		}    
	}

	/* Overnight sub category */
	function overnight_subcate_list($cid=0, $option='') {
		$ringresults = $this->Davidsternmodel->getCateList( $cid );
		$ovcate = '';
		if( count($ringresults) > 0 ) {
			$ovcate .= '<option value="">----------</option>';
			foreach( $ringresults as $rowcate ) {
				$ovcate .= '<option value="'.$rowcate['id'].'">'.$rowcate['cate_name'].'</option>';
			}
		}else {
			$ovcate .= '<option value="">NO Category Found</option>';
		}

		if( empty($option) ) {
			return $ovcate;  
		} else {
			echo $ovcate; 
		}    
	}

	function diamond_shape_list($cid=0, $option='') {
		$ringresults = $this->Davidsternmodel->getShapeList();
		$ovcate = '';
		if( count($ringresults) > 0 ) {
			$ovcate .= '<option value="">----------</option>';
			foreach( $ringresults as $rowcate ) {
				$ovcate .= '<option value="'.$rowcate['shape'].'">'.$rowcate['shape'].'</option>';
			}
		}else {
			$ovcate .= '<option value="">NO Category Found</option>';
		}

		if( empty($option) ) {
			return $ovcate;  
		} else {
			echo $ovcate; 
		}    
	}

	/* Get unique sb category */
	function getUniqueSbCate($pid=0){
		$main_category = $this->catemodel->getSubCategory($pid);
		$view_unique = '';
		if( count($main_category) > 0 ) {
			$view_unique .= '<option>Select Category</option>';
			foreach($main_category as $rowparen_cate) {
				$view_unique .= '<option value="'.$rowparen_cate['id'].'">'.$rowparen_cate['catname'].'</option>';
			}
		} else {
			$view_unique .= '<option value="">No Category Found</option>';	
		}
		echo $view_unique;
	}

	/* Save unique settings */
	function saveUniquePercent(){
		$main_category = $this->Adminmodel->saveUniqueCatePercent();
		if( $main_category ){
			echo 'Unique Percent has updated successfully!';
		}
	}

	function test(){
		$this->Adminmodel->sendToAmazon();
	}

	/* admin logout */
	function logout(){
		$this->User->logout();
		header('location:'.config_item('base_url').'admin'); 
	}

	function engagementrings_listing(){
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			$rings = $this->Adminmodel->getEngagementrings();
			$data['ring_rows'] = $rings['results'];
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('jewelriesinventory');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
				$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
				$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#ecommerce").click();';
			$output = $this->load->view('admin/engagementrings_listing', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	public function save_videolink(){
		$ring_id = $this->input->post('ring_id');
		$video_link = $this->input->post('video_link');
		if($ring_id >0){
			$queryU = 'UPDATE dev_engagement_rings SET video_link="'. $video_link .'" WHERE id = "'.$ring_id .'"';
			$this->db->query($queryU);
		}

		header('location:'.config_item('base_url').'admin/engagementrings_listing?pc=diamonds&cp=engagementrings');
	}

	public function loosediamondsii($action = 'view', $id = 0) {       
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		$collections = '';
		$typeoptions = '';
		$data['collections'] = '';
		$data['typeoptions'] = '';
		$fcolor_result = $this->Adminmodel->fancyColorList();
		$fcolor_list = '';
		$custfilter = array();
		$data['submitlink'] = 'admin/allloosediamonds';

		if(!empty($id)){
			$rowFilterList = $this->Adminmodel->getSinglelooseSearch($id);
			$filterView = unserialize($rowFilterList['search_string']);
			$discoption = unserialize($rowFilterList['discount_options']);
			$custfilter['diamondscat'] = !empty($filterView['diamondscat']) ? $filterView['diamondscat'] : '';
			$custfilter['caratmin'] = !empty($filterView['caratmin']) ? $filterView['caratmin'] : '';
			$custfilter['caratmax'] = !empty($filterView['caratmax']) ? $filterView['caratmax'] : '';
			$custfilter['color'] = !empty($filterView['color']) ? $filterView['color'] : '';
			$custfilter['cut'] = !empty($filterView['cut']) ? $filterView['cut'] : '';
			$custfilter['shape'] = !empty($filterView['shape']) ? $filterView['shape'] : '';
			$custfilter['clarity'] = !empty($filterView['clarity']) ? $filterView['clarity'] : '';
			$custfilter['cert'] = !empty($filterView['cert']) ? $filterView['cert'] : '';
			$custfilter['fancy_color'] = !empty($filterView['fancycolor']) ? $filterView['fancycolor'] : '';
			$custfilter['rapdisc'] = $discoption;
			$custfilter['manufact_name'] = $rowFilterList['manufact_name'];
			$data['submitlink'] = 'admin/loosediamondsii';
		}

		if(isset($_POST['diamondscat']) && !empty($_POST['diamondscat'])){
			$this->Adminmodel->savelooseSearchCriteria($_REQUEST);
		}
		$data['detailcols'] = $custfilter;
		$data['rowdetail'] = $rowFilterList;

		if(count($fcolor_result) > 0){
			foreach($fcolor_result as $rowfcolor){
				$fcolor_list .= '<option value="'.$rowfcolor['fancy_color'].'" '.arOptSelected($rowfcolor['fancy_color'], $custfilter['fancy_color']).'>'.getFancyColorName($rowfcolor['fancy_color']).'</option>';
			}
		}
		$data['fcolor_list'] = $fcolor_list;
			
		if($this->isadminlogin()){
			if($action == 'delete'){
				$ret = $this->Adminmodel->owners($_POST, $action, $id);
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
				header("Cache-Control: no-cache, must-revalidate");
				header("Pragma: no-cache");
				header("Content-type: text/x-json");
				$json = "";
				$json .= "{\n";
				$json .= "total: " . $ret['total'] . ",\n";
				$json .= "}\n";
				echo $json;
			} else {
				if ($action == 'add' || $action == 'edit' || $action == 'editAmazon') {
					$this->load->helper(array('form', 'url'));
					if(isset($_POST[$action . 'btn'])){
						$ret = $this->Adminmodel->owners($_POST, $action, $id);

						if ($ret['error'] == ''){
							$data['success'] = $ret['success'];
						}else {
							$data['error'] = $ret['error'];
						}
						if ($action != 'edit'){
							$data['details'] = $_POST;
						}
					}
					$data['extraheader'] .= $this->Commonmodel->addEditor('simple');
					$ret = $this->Adminmodel->loosediamondsii($_POST, $action, $id);
					if ($action == 'edit' || $action == 'editAmazon') {
						$details = $this->Adminmodel->getOwnerById($id);
						$data['details'] = $details[0];
						$data['collections'] = $collections;
						$data['animations'] = $this->Adminmodel->getFlashByStockId($id);
						$data['id'] = $id;
					}
				}
				$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
					$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
					$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
				});
				$("#rapnet").click();';
				$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('owners');
				$url = config_item('base_url') .'admin/get_all_owners';
				$data['action'] = $action;
				$data['onloadextraheader'] .= "$(\"#results\").flexigrid({
					url: '" . $url . "',
					dataType: 'json',
					colModel : [
						{display: 'ID', name : 'owner_id', width : 80, sortable : true, align: 'center'},
						{display: 'ownerID', name : 'company_id', width : 60, sortable : true, align: 'center'},
						{display: 'company', name : 'company_name', width : 85, sortable : true, align: 'center'},
						{display: 'add date', name : 'company_adddate', width : 60, sortable : true, align: 'center' }
					],
					buttons : [
						{name: 'Add', bclass: 'add', onpress : test},
						{name: 'Delete', bclass: 'delete', onpress : test},
						{separator: true}
					],
					searchitems : [
						{display: 'Owners #', name : 'owner_id', isdefault: true},
						{display: 'Company name', name : 'company_name', isdefault: true},
						{display: 'Company ID', name : 'company_id', isdefault: true}
					],
					sortname: \"owner_id\",
					sortorder: \"desc\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Rapnet Companies</h1>',
					useRp: true,
					rp: 50,
					showTableToggleBtn: false,
					width:1020,
					height: 565
				});
				function test(com,grid){
					if(com=='Delete'){
						if($('.trSelected').length>0){
							if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
								var items = $('.trSelected');
								var itemlist ='';
								for(i=0;i<items.length;i++){
									itemlist+= items[i].id.substr(3)+\",\";
								}
								$.ajax({
									type: \"POST\",
									dataType: \"json\",
									url: \"" . config_item('base_url') . "admin/owners/delete\",
									data: \"items=\"+itemlist,
									success: function(data){
										alert('Total Deleted rows: '+data.total);
										$(\"#results\").flexReload();
									},
									error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
								});
							}
						} else{
							alert('You have to select a row.');
						}
					}else if (com=='Add'){
						window.location = '" . config_item('base_url') . "admin/owners/add';
					}
				}";
				$data['extraheader'] .= '<script src="'. config_item('base_url') .'third_party/flexigrid/flexigrid.js"></script>';
				$data['extraheader'] .= '<link type="text/css" href="'. config_item('base_url') .'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" />';
				$data['extraheader'] .= '<script src="'. config_item('base_url') .'js/swfobject.js" type="text/javascript"></script>';
				$data['extraheader'] .= '<script src="'. config_item('base_url') .'js/t.js" type="text/javascript"></script>';
				$data['onloadextraheader'] .= "var so;";
				$data['usetips'] = true;
				$data['savesearch'] = $this->Adminmodel->getSavelooseSearch();
				$data['savesearch_disc'] = $this->Adminmodel->getSavelooseSearch('discount');
				$output = $this->load->view('admin/all_ownersii', $data, true);
				$this->output($output, $data);
			}
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

	/* Start Overnight Mounting Products import */
	function importOvernightmountingProducts(){
		$data = $this->getCommonData();
		$data['name'] = $this->getAdminDetails();
		$data['extraheader'] = '';
		if ($this->isadminlogin()) {
			set_time_limit(0);
			ini_set('memory_limit', '2048M');
			ini_set('upload_max_filesize', '2048M');
			ini_set('post_max_size', '2048M');
			ini_set('max_input_time', 36000);
			ini_set('max_execution_time', 36000);

			if (isset($_FILES['template_file']['name'])) {
				if ($_FILES['template_file']['error'] == 0) {
					$uploadfile = dirname(__FILE__) . "/jewelriesinventory/" . basename($_FILES['template_file']['name']);
					if (move_uploaded_file($_FILES['template_file']['tmp_name'], $uploadfile)) {
						$file_type	= PHPExcel_IOFactory::identify($uploadfile);
						$objReader	= PHPExcel_IOFactory::createReader($file_type);
						$objPHPExcel = $objReader->load($uploadfile);
						$loadedSheetNames = $objPHPExcel->getSheetNames();

						foreach($loadedSheetNames as $sheetIndex => $loadedSheetName){
							$sheetData	= $objPHPExcel->getSheetByName($loadedSheetName)->toArray(null,true,true,true);
							$results = $this->Adminmodel->getOvernightmountingProducts();
							$i = 0; $count = $results['count'];
							foreach ($sheetData as $data){
								if($i != 0){
									$count += $i;
									$this->Adminmodel->overnightmountingimport($data,$count);
								}
								$i++;
							}
						}
						$data['message'] = 'Total '. $i.' New Engagement Rings Successfully Uploaded.';
					}
				}
			}
			$data['leftmenus'] = $this->Adminmodel->adminmenuhtml('jewelriesinventory');
			$data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function(){
			$(this).css({backgroundImage:"url(' . config_item('base_url') . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
			$(this).siblings().css({backgroundImage:"url(' . config_item('base_url') . 'images/plus.jpg)"});
			});
			$("#ecommerce").click();';
			$output = $this->load->view('admin/overnightmountingsimport', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

}
?>