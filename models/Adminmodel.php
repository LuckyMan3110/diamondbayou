<?php
class Adminmodel extends CI_Model {
    function __construct() {
        parent::__construct();
    }

	function adminmenuhtml($page = 'myaccount') {
		$usermenu = '';
		if ($this->session->isLoggedin()) {
			$usermenu .= '<div class="menu_list" id="secondpane"><p class="menu_head" id="sitemanage">Site Manage</p><div class="menu_body">';
			$usermenu .= '<a href="' . config_item('base_url') . 'admin/commonpagetemplate"';
			$usermenu .= ( $page == 'staticpage') ? 'class="active">' : '>';
			$usermenu .= 'Static Pages</a>';
			$usermenu .= '<a href="https://sellercentral.amazon.com/gp/item-manager/ezdpc/uploadInventory.html?ie=UTF8&ref_=ag_invfile_dnav_xx_"';
			$usermenu .= ' target="_blank">';
			$usermenu .= 'Inventory file Status</a>';
			$usermenu .= '<a href="https://sellercentral.amazon.com/gp/ezdpc-gui/inventory-status/status.html/ref=ag_invmgr_dnav_xx_"';
			$usermenu .= '	 target="_blank" >';
			$usermenu .= 'Manage Invetory(Amazon)</a>';
			$usermenu .= '</div><p class="menu_head" id="jewelrymanage">Manage Database</p><div class="menu_body">';

			$usermenu .= '<a href="' . config_item('base_url') . 'admin/rolex"';
			$usermenu .= ( $page == 'rolex') ? 'class="active">' : '>';
			$usermenu .= 'Watch Database</a>';

			$usermenu .= '<a href="' . config_item('base_url') . 'admin/jewelries"';
			$usermenu .= ($page == 'mens') ? 'class="active">' : '>';
			$usermenu .= 'Jewelry Database</a>';

			$usermenu .= '<a href="' . config_item('base_url') . 'admin/attribute"';
			$usermenu .= ($page == 'attribute') ? 'class="active">' : '>';
			$usermenu .= 'Diamond Attributes</a>';
			$usermenu .= '<a href="' . config_item('base_url') . 'admin/nameplate"';
			$usermenu .= ( $page == 'nameplate') ? 'class="active">' : '>';
			$usermenu .= 'Name Plate Module</a>';

			$usermenu .= '</div><p class="menu_head" id="rapnet">Rap-net</p><div class="menu_body">';
			$usermenu .= '<a href="' . config_item('base_url') . 'admin/helixprice"';
			$usermenu .= ( $page == 'helixprice') ? 'class="active">' : '>';
			$usermenu .= 'Helix Price Rules</a>';

			$usermenu .= '<a href="' . config_item('base_url') . 'admin/uniqueprice_setting"';
			$usermenu .= ( $page == 'uniqueprice') ? 'class="active">' : '>';
			$usermenu .= 'Unique Price Rules</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/coupon"';
            $usermenu .= ( $page == 'coupon') ? 'class="active">' : '>';
            $usermenu .= 'Discount Coupon</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/brands"';
            $usermenu .= ( $page == 'brands') ? 'class="active">' : '>';
            $usermenu .= 'Manage Watch Brands</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/feedbacks"';
            $usermenu .= ( $page == 'feedbacks') ? 'class="active">' : '>';
            $usermenu .= 'Feedbacks</a>';

            $usermenu .= '</div><p class="menu_head" id="ecommerce">E-commerce</p><div class="menu_body">';
            $usermenu .= '<a href="' . config_item('base_url') . 'admin/customers"';
            $usermenu .= ( $page == 'Customers') ? 'class="active">' : '>';
            $usermenu .= 'Customers</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/order"';
            $usermenu .= ( $page == 'Order') ? 'class="active">' : '>';
            $usermenu .= 'Website Orders</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/inventory"';
            $usermenu .= ( $page == 'inventory') ? 'class="active">' : '>';
            $usermenu .= 'Watches bulk upload</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/jewelriesinventory"';
            $usermenu .= ( $page == 'jewelriesinventory') ? 'class="active">' : '>';
            $usermenu .= 'jewelries bulk upload</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/povada"';
            $usermenu .= ( $page == 'povadajewelries') ? 'class="active">' : '>';
            $usermenu .= 'Povada jewelries</a>';

            $usermenu .= '</div><p class="menu_head" id="fullfillments">Orders</p><div class="menu_body">';
            $usermenu .= '<a href="' . config_item('base_url') . 'admin/orders"';
            $usermenu .= ( $page == 'aorders') ? 'class="active">' : '>';
            $usermenu .= 'Amazon Fullfillment</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/canadaorders"';
            $usermenu .= ( $page == 'canadaorders') ? 'class="active">' : '>';
            $usermenu .= 'Canada Fullfillment</a>';

            $usermenu .= '<a href="' . config_item('base_url') . 'admin/ebayorders"';
            $usermenu .= ( $page == 'ebayorders') ? 'class="active">' : '>';
            $usermenu .= 'eBay Fullfillment</a>';

            $usermenu .= '</div><p class="menu_head" id="configuration">Configuration</p><div class="menu_body">';
            $usermenu .= '<a href="' . config_item('base_url') . 'admin/cronjobs"';
            $usermenu .= ( $page == 'cronjobs') ? 'class="active">' : '>';
            $usermenu .= 'CronJobs</a>';

            $usermenu .= '</div></div> ';
        }
        return $usermenu;
	}

	/* Get stuller stud earring list */
    function get_stud_earring_result($start=0, $limit=7) {
		$sql = "SELECT * FROM stuller_products_studearrings ORDER BY id ASC LIMIT $start, $limit";    
		$query    = $this->db->query($sql);
		$results  = $query->result_array();

		return $results;
    }

	/* Get comments list */
	function getRingCommentList( $page =1 , $rp = 10 ,$sortname = 'full_name' ,$sortorder = 'DESC' ,$query= '' , $qtype = 'full_name'){
		$results = array();
		$sort = "ORDER BY $sortname $sortorder";
		$start = (($page-1) * $rp);
		$limit = "LIMIT $start, $rp";
		$qwhere = "";
		if ($query) $qwhere .= " AND $qtype LIKE '%$query%' ";

		$sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'comments where 1=1 '. $qwhere . ' ' . $sort . ' '. $limit;

		$result = $this->db->query($sql);
		$results['result']  = $result->result_array();	
		$sql2 = 'SELECT id FROM  '. $this->config->item('table_perfix').'comments  where 1=1 '. $qwhere;
		$result2 = $this->db->query($sql2);
		$results['count']  = $result2->num_rows();

		return $results;
	}

	/* managed rappent logins */
	function managedRapnetLogins(){
		$usersList = getTrialUserDetail();
		$rapp_user = $this->input->post('rapp_user', TRUE);
		$rapp_pass = $this->input->post('rapp_pass', TRUE);
		if( !empty($rapp_user) && !empty($rapp_pass) ){
 			$sql = "UPDATE  `dev_user` SET  `rappnet_user` =  '".$rapp_user."', `rappnet_pass` =  '".$rapp_pass."' WHERE  `dev_user`.`id` = '".$usersList['id']."'";
			$this->db->query($sql);
		}

    	return $usersList;
	}

    function getCustomerDetailViaID($cid) {
    	$select = "SELECT * FROM dev_customerinfo where 1 = 1 and id = '{$cid}'";
    	$result = $this->db->query($select);
    	$row = $result->result_array();

    	return $row[0];
    }

    function getCustomerResults() {
    	$select = "SELECT * FROM dev_customerinfo where 1 = 1 ORDER BY id DESC";
    	$result = $this->db->query($select);
    	$rows = $result->result_array();

    	return $rows;
    }

    function amzorders($post, $action = 'view', $id = 0) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if (is_array($post)) {
            require_once(config_item('base_path') . 'application/libraries/fedex.php');
            $order_item_id = isset($post['order-item-id']) ? $post['order-item-id'] : 0;
            $orderid = isset($post['orderid']) ? $post['orderid'] : 0;
            $fedex_service = isset($post['shipped_fedex']) ? $post['shipped_fedex'] : '';
            $fedex = new Fedex;
            $fedex->setServer("https://gatewaybeta.fedex.com/GatewayDC");
            $fedex->setAccountNumber(114790990); //Get your own - this will not work...  284501713
            $fedex->setMeterNumber(101727405);    //Get your own - this will not work...
            $fedex->setCarrierCode("FDXE");
            $fedex->setDropoffType("REGULARPICKUP");
            $fedex->setService($fedex_service, $fedex_service);
            $fedex->setPackaging("YOURPACKAGING");
            $fedex->setBuyer($post['buyername'], $post['buyeremail'], $post['buyeraddress1'], $post['buyeraddress2'], $post['buyercity'], $post['buyerstate'], $post['buyerzip'], $post['buyercountry']);
            $fedex->setPayorType("SENDER");
            $res = $fedex->sendOrder(114790990, 101727405);
            if ($res['status'] == 'success') {
                $sql = "Update orders set fedex-service  =  '" . $fedex_service . "' , fedex_tracking_code = '" . mysql_real_escape_string($res['code']) . "'   where orderid = '" . $orderid . "'";
                $isinsert = $this->db->query($sql);
            }
        }
        $retuen['success'] .= '<h1 class="success">' . $res['message'] . '</h1><br /><br />';
        return $retuen;
    }

	function rapnetimport($data) {
		$query = $this->db->query("SELECT * FROM dev_index WHERE lot = '".$data[28]."'");
		if( !empty($data[28]) ){
			$insertValues = "('".$data[28]."', '-2', '3942', '".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[23]."', 'test', '".$data[3]."', '".$data[7]."', '0.00', '".$data[6]."', '".$data[8]."', '".$data[9]."', '".$data[12]."', '".$data[13]."', '".$data[15]."', '".$data[16]."', '', '".$data[4]."', '".$data[25]."', '', '".$data[27]."', '".$data[28]."', '', '', '".$data[29]."', '".$data[30]."', '".$data[31]."', '', '".$data[5]."', '', '0', '', '', '', '', '', '".$data[6]."', '".$data[24]."', '', '', '', '', '".$data[18]."', '', '".$data[5]."', '".$data[10]."', '".$data[11]."', '".$data[14]."', '', '".$data[32]."', '".$data[33]."', '".$data[34]."', '".$data[35]."', '".$data[36]."', '".$data[37]."', '".$data[38]."', '".$data[25]."', '', '', '', '', '".$data[41]."', '".$data[18]."')";
		}else{
			$insertValues = '';
		}
		return $insertValues;
	}

	function polygonimport($data) {
		$query = $this->db->query("SELECT * FROM dev_rapproduct WHERE lot = '".$data[6]."'");
		if($query->num_rows() == 0){
			if(empty($data[39])){
				$cut = 'NA';
			}else{
				$cut = $data[39];
			}	
            $isinsert = $this->db->insert($this->config->item('table_perfix') . 'rapproduct', array(
				'lot' => $data[6],
				'ebayid' => '-2',
				'owner' => '3942',
                'shape' => $data[0],
				'carat' => $data[1],
                'color' => $data[2],
				'fancy_color' => '',
				'fancy_color_ot' => '',
                'clarity' => $data[3],
				'price' => $data[4],
				'Rap' => '0.00',
				'Cert' => $data[7],
				'Depth' => $data[11],
				'TablePercent' =>$data[13],
                'Girdle' => $data[20],
                'Culet' => $data[21],
                'Polish' => $data[23],
				'Sym' => $data[24],
				'Flour' => $data[26],
				'Meas' => $data[11],
                'Comment' => '',				
				'Stones' => '',
                'Cert_n' => $data[8],
                'Stock_n' => $data[6],
				'Make' => '',
				'Date' => '',
                'City' => 'Great Neck',
                'State' => 'NY',
				'Country' => 'USA',
				'ratio' => '',
                'cut' => $cut,
				'tbl' => '',
                'pricepercrt' => '0',
				'certimage' => '',
				'length' => '',
				'width' => '',
				'height' => '',
				'category' => '',
				'lab' => $data[7],
				'fancy_color_intens' => $data[26],
				'crown' => $data[15],
                'pavilion' => $data[16],
				'pavilion_angle' => $data[17],
				'crown_angle' => $data[14],
				'fcolor_value' => $data[18],
				'price_incsv' => '',
				'cutgrade' => $data[39],
				'girdle_thin' => $data[18],
				'girdle_thick' => $data[19],
				'culet_condition' => $data[22],
				'parcelStoneCount' => '',
				'pair_separable' => $data[35],
				'pair_no' => $data[34],
				'keyto_symb' => '',
				'shade' => '',
				'star_length' => '',
				'center_inclusion' => '',
				'black_inclusion' => '',
				'member_coment' => '',
				'have_image' => '',
				'remarks' => $data[28],
				'memo' => '',
				'inventory_id' => '',
				'location' => '',
				'floursence_color' => ''
			));
		}
	}

	function ideximport($data) {
		$query = $this->db->query("SELECT * FROM dev_rapproduct WHERE lot = '".$data[6]."'");
		if($query->num_rows() == 0){
			if(empty($data[39])){
				$cut = 'NA';
			}else{
				$cut = $data[39];
			}
            $isinsert = $this->db->insert($this->config->item('table_perfix') . 'rapproduct', array(
				'lot' => $data[6],
				'ebayid' => '-2',
				'owner' => '3942',
                'shape' => $data[0],
				'carat' => $data[1],
                'color' => $data[2],
				'fancy_color' => '',
				'fancy_color_ot' => '',
                'clarity' => $data[3],
				'price' => $data[4],
				'Rap' => '0.00',
				'Cert' => $data[7],
				'Depth' => $data[11],
				'TablePercent' =>$data[13],
                'Girdle' => $data[20],
                'Culet' => $data[21],
                'Polish' => $data[23],
				'Sym' => $data[24],
				'Flour' => $data[26],
				'Meas' => $data[11],
                'Comment' => '',				
				'Stones' => '',
                'Cert_n' => $data[8],
                'Stock_n' => $data[6],
				'Make' => '',
				'Date' => '',
                'City' => 'Great Neck',
                'State' => 'NY',
				'Country' => 'USA',
				'ratio' => '',
                'cut' => $cut,
				'tbl' => '',
                'pricepercrt' => '0',
				'certimage' => '',
				'length' => '',
				'width' => '',
				'height' => '',
				'category' => '',
				'lab' => $data[7],
				'fancy_color_intens' => $data[26],
				'crown' => $data[15],
                'pavilion' => $data[16],
				'pavilion_angle' => $data[17],
				'crown_angle' => $data[14],
				'fcolor_value' => $data[18],
				'price_incsv' => '',
				'cutgrade' => $data[39],
				'girdle_thin' => $data[18],
				'girdle_thick' => $data[19],
				'culet_condition' => $data[22],
				'parcelStoneCount' => '',
				'pair_separable' => $data[35],
				'pair_no' => $data[34],
				'keyto_symb' => '',
				'shade' => '',
				'star_length' => '',
				'center_inclusion' => '',
				'black_inclusion' => '',
				'member_coment' => '',
				'have_image' => '',
				'remarks' => $data[28],
				'memo' => '',
				'inventory_id' => '',
				'location' => '',
				'floursence_color' => ''
			));
		}
	}

	function ringimport($data) {
		$queried = $this->db->query('SELECT uid FROM dev_index WHERE Stock_n LIKE "'.$data['A'].'"');
		if($queried->num_rows() == 0){
			if($data['B'] == 'ASSCHER'){
				$shaped = 'Asscher';
			}elseif($data['B'] == 'CUSHION'){
				$shaped = 'Cushion';
			}elseif($data['B'] == 'ROUND'){
				$shaped = 'Round';
			}elseif($data['B'] == 'EMERALD CUT'){
				$shaped = 'Emerald';
			}elseif($data['B'] == 'SQUARE'){
				$shaped = 'Square';
			}elseif($data['B'] == 'OVAL'){
				$shaped = 'Oval';
			}elseif($data['B'] == 'HEART SHAPE'){
				$shaped = 'Heart';
			}elseif($data['B'] == 'MARQUISE'){
				$shaped = 'Marquise';
			}elseif($data['B'] == 'RADIANT'){
				$shaped = 'Radiant';
			}elseif($data['B'] == 'PEAR SHAPE'){
				$shaped = 'Pear';
			}else{
				$shaped = $data['B'];
			}
			$isinsert = $this->db->insert('dev_index', array(
				'lot' => !empty($data['A'])?$data['A']:'',
				'Stock_n' => !empty($data['A'])?$data['A']:'',
				'ebayid' => '-2',
				'shape' => !empty($shaped)?$shaped:'',
				'clarity' => !empty($data['C'])?$data['C']:'',
				'carat' => !empty($data['D'])?$data['D']:'',
				'color' => !empty($data['E'])?$data['E']:'',
				'Cert' => !empty($data['G'])?$data['G']:'',
				'Cert_n' => !empty($data['H'])?$data['H']:'',
				'Culet' => !empty($data['I'])?$data['I']:'',
				'Depth' => !empty($data['J'])?$data['J']:'',
				'TablePercent' => !empty($data['K'])?$data['K']:'',
				'Flour' => !empty($data['L'])?$data['L']:'',
				'Girdle' => !empty($data['M'])?$data['M']:'',
				'Make' => !empty($data['N'])?$data['N']:'',
				'Polish' => !empty($data['O'])?$data['O']:'',
				'Sym' => !empty($data['P'])?$data['P']:'',
				'pricepercrt' => !empty($data['R'])?$data['R']:'',
				'percentOfRapnet' => !empty($data['S'])?$data['S']:'',
				'percentOfRapnet' => !empty($data['T'])?$data['T']:'',
				'price' => !empty($data['U'])?$data['U']:'',
				'Comment' => !empty($data['W'])?$data['W']:'',
				'minDiameter' => !empty($data['X'])?$data['X']:'',
				'maxDiameter' => !empty($data['Y'])?$data['Y']:'',
				'agta' => !empty($data['Z'])?$data['Z']:'',
				'ideal_cut' => !empty($data['AA'])?$data['AA']:'',
				'russian_cut' => !empty($data['AB'])?$data['AB']:'',
				'image_url' => !empty($data['AC'])?$data['AC']:'',
				'certimage' => !empty($data['AD'])?$data['AD']:'',
				'web_address' => !empty($data['AE'])?$data['AE']:'',
				'image_path2' => !empty($data['AF'])?$data['AF']:'',
				'image_path3' => !empty($data['AG'])?$data['AG']:'',
				'cut' => !empty($data['AH'])?$data['AH']:'',
				'Meas' => !empty($data['AI'])?$data['AI']:'',
				'video_url' => !empty($data['AK'])?$data['AK']:'',
				'culet_size' => !empty($data['I'])?$data['I']:'',
				'lab' => !empty($data['G'])?$data['G']:'',
				'fcolor_value' => ''
			));
		}
	}

	/* Get stuller rings details */
	function getStulleRingResult($tableName='stuller_products_wb_diamonds'){
		$item_number = $this->input->post('item_number');
		$qry = "SELECT * FROM $tableName WHERE title <> ''";
		if( !empty($item_number) ) {
			$qry .= " AND item_number = '{$item_number}'";
		}
		$qry .= " ORDER BY title ASC";
		$return = $this->db->query($qry);
		$result = $return->result_array();

		return isset($result) ? $result : false;
	}

	//// managed stuller price data
	function update_stuller_db_rows($pageOption='', $db_table='') {
		$query = $this->db->query("SELECT * FROM dev_audit_data WHERE audit_type = '{$pageOption}' ORDER BY id DESC LIMIT 1");
		$result = $query->result_array();
		$product_id     = unserialize( $result[0]['column_id_list'] );
		$product_price  = unserialize( $result[0]['column_price'] );

		if( count($product_id) > 0 ) {
			$i = 0;
			$cols_values = array();
			foreach( $product_id as $p_id ) {
				$cols_values[] = "('{$p_id}', '{$product_price[$i]}')";
				$i++;
			}

			$cols_rows = implode(", ", $cols_values);

			$update_query = "INSERT INTO $db_table (id, price) VALUES $cols_rows ON DUPLICATE KEY UPDATE id = VALUES(id), price = VALUES(price)";
			$this->db->query( $update_query );
		}
	}

	//// managed stuller price data
	function update_stuller_detail_table($pid='', $detail_id='', $price=0, $db_table='') {
		if( $price > 0 ) {
			$update_query = "UPDATE $db_table SET `price` = '{$price}' WHERE `id` = '{$detail_id}' AND `pid` = '{$pid}'";
			$this->db->query( $update_query );
		}
	}

	//// managed stuller price data
	function update_stuller_table($sid='', $price=0, $db_table='') {
		if( $price > 0 ) {
			$update_query = "UPDATE $db_table SET `price` = '{$price}' WHERE `id` = '{$sid}'";
			$this->db->query( $update_query );
		}
	}

	//// managed stud audit data
	function managed_stud_audit($option='', $pageOption='stud_option') {
		$query = $this->db->query("SELECT * FROM dev_audit_data WHERE audit_type = '{$pageOption}' ORDER BY id DESC LIMIT 1");
		$check_option = $query->result_array();
		$product_list_id = serialize( $this->input->post('product_list_id', TRUE) );
		$product_list_price = serialize( $this->input->post('product_list_price', TRUE) );

		if( empty($option) ) {
			if( count($check_option) > 0 ) {
				$sqlquery = "UPDATE dev_audit_data SET `column_id_list` = '{$product_list_id}', `column_price` = '{$product_list_price}' WHERE `audit_type` = '{$pageOption}'";
			} else {
				$sqlquery = "INSERT INTO dev_audit_data(`column_id_list`, `column_price`, `audit_type`) VALUES ('{$product_list_id}', '{$product_list_price}', '{$pageOption}')";
			}
			$this->db->query( $sqlquery );
			return true;
		} else {
			return $check_option[0];
		}
	}

	//// managed inventory prices
	function managedInventoryPrices($cid=0, $minpercent=0, $maxpercent=0, $manufact='') {
		$sql = "SELECT * FROM dev_inventoryprices WHERE category_id = '{$cid}'";
		$query = $this->db->query($sql);
		$check_cate = $query->result_array();
		if( !empty($cid) ) {
			if( count($check_cate) > 0 ) {
				$sqlquery = "UPDATE dev_inventoryprices SET `min_percent` = '{$minpercent}', `max_percent` = '{$maxpercent}' WHERE `category_id` = '{$cid}'";
			} else {
				$sqlquery = "INSERT INTO dev_inventoryprices(`category_id`, `min_percent`, `max_percent`, `manufacture_type`) VALUES ('{$cid}', '{$minpercent}', '{$maxpercent}', '{$manufact}')";
			}
			$this->db->query( $sqlquery );
		}
		return true;
	}

	function managedInventoryDiamondPrices($cid=0,$incresamt=0){
		if(!empty($cid) && $cid > 0){
			$sql = "SELECT uid,price FROM dev_index WHERE shape LIKE '".$cid."'";
			$query = $this->db->query($sql);
			$check_cate = $query->result_array();
		}else{
			$sql = "SELECT uid,price FROM dev_index WHERE 1";
			$query = $this->db->query($sql);
			$check_cate = $query->result_array();
		}
		foreach($check_cate as $rowshp){
			$oldprice = $rowshp['price'];
			$newprice = $rowshp['price']*$incresamt;
			$sqlquery = "UPDATE dev_index SET `price` = '".$newprice."' WHERE `uid` = '".$rowshp['uid']."'";
			$this->db->query($sqlquery);
		}
		return true;
	}

	function managedRevertDiamondPrices($cid=0){
		if(!empty($cid) && $cid > 0){
			$sql = "SELECT uid,price_incsv FROM dev_index WHERE shape LIKE '".$cid."' AND vdbapp_id > 0";
			$query = $this->db->query($sql);
			$check_cate = $query->result_array();
		}else{
			$sql = "SELECT uid,price_incsv FROM dev_index WHERE vdbapp_id > 0";
			$query = $this->db->query($sql);
			$check_cate = $query->result_array();
		}
		foreach($check_cate as $rowshp){
			$newprice = $rowshp['price_incsv'];
			$sqlquery = "UPDATE dev_index SET `price` = '".$newprice."' WHERE `uid` = '".$rowshp['uid']."'";
			$this->db->query($sqlquery);
		}
		return true;
	}

	//// check diamond type
	function getDiamondType($lot_id){
		$arayreturn = array();

		$colorquery = "SELECT * FROM " . $this->config->item('table_perfix') . "index WHERE fancy_color != '' AND lot= ".$lot_id;
		$colorresult = $this->db->query($colorquery);
		$arayreturn['colorresult'] = $colorresult->num_rows();    
		$clarityquery = "SELECT * FROM " . $this->config->item('table_perfix') . "index WHERE member_coment = 'CLARITY ENHANCED' AND lot= ".$lot_id;
		$clarityresult = $this->db->query($clarityquery);
		$arayreturn['clarityresult'] = $clarityresult->num_rows();    
		$whitequery = "SELECT * FROM dev_index WHERE fancy_color = '' AND member_coment != 'CLARITY ENHANCED' AND lot= ".$lot_id;
		$whiteresult = $this->db->query($whitequery);
		$arayreturn['whiteresult'] = $whiteresult->num_rows();
		$arayreturn['diamnd_type'] = '';

		if($arayreturn['colorresult'] > 0) {
			$arayreturn['diamnd_type'] = 'Fancy Diamond';
		} else if($arayreturn['clarityresult'] > 0) {
			$arayreturn['diamnd_type'] = 'Clarity Diamond';
		} else if($arayreturn['whiteresult'] > 0) {
			$arayreturn['diamnd_type'] = 'White Diamond';
		}
		return $arayreturn;
	}

	/////// save admin settings
	function mangerUserSettings() {	
		$users_id = $this->session->userdata('users_id');
		$login_pass = $this->input->post('login_pass', TRUE);
		$login_username = $this->input->post('login_username', TRUE);

		///// get admin detail
		$sql = "SELECT * FROM " . $this->config->item('table_perfix') . "user WHERE id = '".$users_id."'";
		$query = $this->db->query($sql);
		$results = $query->result_array();

		if(isset($login_username) && !empty($login_username)){
			$profile_fields = $user_ardata = array(
				'userid' => $login_username,
				'email' => $this->input->post('txt_email', TRUE),
				'fname' => $this->input->post('first_name', TRUE),
				'lname' => $this->input->post('last_name', TRUE),
				'sites_title' => $this->input->post('sites_title', TRUE),
				'contact_info' => $this->input->post('contacts_info', TRUE),
				'dashboard_title' => $this->input->post('dashboard_title', TRUE),
				'salestax_city' => $this->input->post('salestax_city', TRUE),
				'salestax_percent' => $this->input->post('salestax_percent', TRUE),
				'google_analytics_id' => $this->input->post('google_analytics_id', TRUE)
			);
			$user_ardata = $profile_fields;

			if( !empty($login_pass) ) {
				$passfield_aray = array('password' => md5($login_pass));
				$user_ardata = array_merge($profile_fields, $passfield_aray);
			}

			$this->db->where("id", $users_id);
			$this->db->update($this->config->item('table_perfix').'user', $user_ardata);
			$this->upload_file('site_logo', 'sitelg', $ar=array('user', 'sites_logo', 'id', $users_id));
		}
		$this->db->last_query();

		return $results[0];
	}

	//// upload file
	function upload_file($field, $hint='showth', $ar=array('shows', 'upload_img', 'id', '0'), $path='uploads/') {
		$rd = rand(99,999);
		$fileName = '';
		$tableName 	  = $ar[0];
		$updatedField = $ar[1];
		$pkID 		  = $ar[2];
		$id_value     = $ar[3];

		if($_FILES[$field]['name'] != '') {
			$fileName = $id_value.'_'.$hint.'_'.$_FILES[$field]['name'];

			//// deleted old uploaded file
			$row_list = $this->getTableRowLine($id_value, $tableName);
			if( !empty($row_list[$updatedField]) ) {
				unlink($path.$row_list[$updatedField]);
			}

			$sql = "UPDATE " . $this->config->item('table_perfix') . "$tableName set $updatedField = '".$fileName."' WHERE $pkID = '".$id_value."'";
			$result = $this->db->query($sql);

			move_uploaded_file($_FILES[$field]['tmp_name'], $path.$fileName);
		}
		return $fileName;
	}

	function getTableRowLine($id='', $table='shows'){
		$qry = "SELECT * FROM ".config_item('table_perfix')."$table WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
		$return = 	$this->db->query($qry);
		$result = $return->result_array();

		return isset($result) ? $result[0] : false;
	}

	/////// save unique category percent
	function saveUniqueCatePercent() {
		$cateID = $this->input->post('unique_sbcate');
		$cate_ID = $this->input->post('uniques_sbcate1');
		$cate_id = ( !empty($cate_ID) ? $cate_ID : $cateID );
		$catePercent = $this->input->post('unique_percent');

		$isinsert = $this->db->update($this->config->item('table_perfix').'us_catagories', array(
		'unique_percent' => $catePercent,
		'unique_maxpercent' => $this->input->post('uniquemax_percent')
		));
		$this->db->where("id", $cate_id);

		return true;
	}

	///// save task detail
	function saveTaskData($impt='') {
		$task_heading = $this->input->post('task_heading', TRUE);
		$task_title = $this->input->post('task_title', TRUE);

		if(empty($impt)){
			$dateFields =  array(
				'task_heading' => $task_heading,
				'task_desc' => $this->input->post('task_detail', TRUE),
				'importnat_task' => $this->input->post('cb_imptask', TRUE),
				'task_date' => date('Y-m-d')
			);
		} else {
			$dateFields =  array( 
				'task_heading' => $task_title,
				'importnat_task' => 'Y',
				'task_date' => date('Y-m-d')
			);
		}
		if( !empty($task_heading) || !empty($task_title) ){
			$isinsert = $this->db->insert('dev_taskdata',$dateFields);
		}

		return true;
	}

	///// caculate total earnings
	function calcTotalEarnings($today='') {
		$toDate = date('Y-m-d');

		$sql = "SELECT sum(`totalprice`) AS total_amount FROM `" . $this->config->item('table_perfix') . "order`";
		if( !empty($today) ){
			$sql .= " WHERE `orderdate` = '".$toDate."'";
		}
		$query = $this->db->query($sql);
		$rows = $query->row();
		$total_amount = _nf( $rows->total_amount, 2);

		return $total_amount;
	}

	//// get task list
	function getTaskList($action='', $task_id='') {
		$sql = "SELECT id, task_heading, task_desc, task_date from " . $this->config->item('table_perfix') . "taskdata";

		if($action == 'imptask'){
			$sql .= " WHERE importnat_task = 'Y'";
		}
		$sql .= " ORDER BY id DESC LIMIT 10";

		$query = $this->db->query($sql);
		$result['results'] = $query->result_array();
		$result['count'] = count( $query->result_array() );		
		$result['message'] = '';

		if($action == 'delete') {
			$sql_delte = "DELETE FROM " . $this->config->item('table_perfix') . "taskdata WHERE id = '".$task_id."'";
			$this->db->query($sql_delte);
			$result['message'] = 'Task has deleted successfully!';			
		}

		return $result;
	}

    function uspsorders($post, $action = 'view', $id = 0) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if (is_array($post)) {
            require_once('UspsOrder.php');
            $order_item_id = isset($post['order-item-id']) ? $post['order-item-id'] : 0;
            $usps_service = isset($post['shipped_usps']) ? $post['shipped_usps'] : '';

            $weightinpounds = isset($post['weightinpounds']) ? $post['weightinpounds'] : '22';
            $comments = isset($post['comments']) ? $post['comments'] : '';
            $weightinounces = isset($post['weightinounces']) ? $post['weightinounces'] : '10';
            $permitzip = isset($post['permit_zip']) ? $post['permit_zip'] : '21718';
            $tarifNumber = isset($post['tarif']) ? $post['tarif'] : '123456';
            $height = isset($post['height']) ? $post['height'] : '15';
            $len = isset($post['len']) ? $post['len'] : '20.5';
            $width = isset($post['width']) ? $post['width'] : '7';
            $girth = isset($post['girth']) ? $post['girth'] : '40';


            //$usps = new USPS('952MYDEP4424');
            $USPS_USERID = '529TEST03556';
            $USPS_PASSWORD = '991VK65LX321';
            $API_ENDPOINT = 'https://secure.shippingapis.com/ShippingAPI.dll';
            $Usps = new UspsOrder($USPS_USERID, $USPS_PASSWORD, $API_ENDPOINT);
            $originzip = '';
            if ($post['shipped_usps'] == 'StandardB' || $post['shipped_usps'] == 'StandardB') {
                $Response = $Usps->uploadOrder(array('OriginZip' => $originzip, 'DestinationZip' => $post['buyerzip']), 'StandardB');
            }
            if ($post['shipped_usps'] == 'ExpressMailCommitment' || $post['shipped_usps'] == 'ExpressMailCommitment') {
                $Response = $Usps->uploadOrder(array('OriginZip' => $originzip, 'DestinationZip' => $post['buyerzip']), 'StandardB');
            }
            if ($post['shipped_usps'] == 'ExpressMailIntlCertify' || $post['shipped_usps'] == 'ExpressMailIntl' || $post['shipped_usps'] == 'PriorityMailIntlCertify' ||
                    $post['shipped_usps'] == 'PriorityMailIntl' || $post['shipped_usps'] == 'FirstClassMailIntl' || $post['shipped_usps'] == 'FirstClassMailIntlCertify') {
                $orderObject = array();
                $orderObject['FromFirstName'] = $FromFirstName;
                $orderObject['FromMiddleInitial'] = '';
                $orderObject['FromLastName'] = $FromLastName;
                $orderObject['FromAddress1'] = $FromAddress1;
                $orderObject['FromAddress2'] = $FromAddress2;
                $orderObject['FromCity'] = $FromCity;
                $orderObject['FromState'] = $FromState;
                $orderObject['FromZip5'] = $FromZip;
                $orderObject['FromZip4'] = $FromZip;
                $orderObject['FromPhone'] = $FromPhone;
                $orderObject['ToName'] = $post['buyername'];
                $orderObject['ToFirm'] = '';
                $orderObject['ToAddress1'] = $post['buyeraddress1'];
                ;
                $orderObject['ToAddress2'] = $post['buyeraddress2'];
                ;
                $orderObject['ToAddress3'] = '';
                $orderObject['ToCity'] = $post['buyercity'];
                $orderObject['ToProvince'] = $post['buyerstate'];
                $orderObject['ToCountry'] = $post['buyercountry'];
                $orderObject['ToPostalCode'] = $post['buyerzip'];
                $orderObject['ToPOBoxFlag'] = 'N';
                $orderObject['ToPhone'] = $post['$buyer_phone'];
                $orderObject['ToFax'] = '';
                $orderObject['ToEmail'] = $post['$buyer_email'];
                ;
                $orderObject['NonDeliveryOption'] = 'Return';
                $orderObject['Container'] = 'NONRECTANGULAR';
                $orderObject['ShippingContents'] = array();
                $ShippingContents[0]['ItemDetail']['Description'] = $post['item_name'];
                $ShippingContents[0]['ItemDetail']['Quantity'] = $post['item_qty'];
                $ShippingContents[0]['ItemDetail']['Value'] = $post['item_price'];
                $ShippingContents[0]['ItemDetail']['NetPounds'] = '1';
                $ShippingContents[0]['ItemDetail']['NetOunces'] = '1';
                $ShippingContents[0]['ItemDetail']['HSTariffNumber'] = $tarifNumber;
                $ShippingContents[0]['ItemDetail']['CountryOfOrigin'] = $post['buyercountry'];
                $orderObject['ShippingContents'] = $ShippingContents;
                $orderObject['GrossPounds'] = $weightinpounds;   // '17';
                $orderObject['GrossOunces'] = $weightinounces;   // '2';
                $orderObject['ContentType'] = 'Documents';
                $orderObject['Agreement'] = 'Y';
                $orderObject['Comments'] = $comments; //'ExpressMailIntlCertify Comments';
                $orderObject['ImageType'] = 'TIF';
                $orderObject['ImageLayout'] = 'ALLINONEFILE';
                $orderObject['POZipCode'] = $FromPOZipCode;
                $orderObject['HoldForManifest'] = 'N';
                $orderObject['Size'] = 'LARGE';
                $orderObject['Length'] = $len;  // '20.5';
                $orderObject['Width'] = $width; // '7';
                $orderObject['Height'] = $height;   // ' 15';
                $orderObject['Girth'] = $girth;   // '40';
                $Response = $Usps->uploadOrder($orderObject, $post['shipped_usps']);
            }

            if ($post['shipped_usps'] == 'ExpressMailLabelCertify' || $post['shipped_usps'] == 'ExpressMailLabel') {
                $orderObject = array();
                $orderObject['FromFirstName'] = $FromFirstName;
                $orderObject['FromLastName'] = $FromLastName;
                $orderObject['FromFirm'] = $fromFirm;
                $orderObject['FromAddress1'] = $FromAddress1;
                $orderObject['FromAddress2'] = $FromAddress2;
                $orderObject['FromCity'] = $FromCity;
                $orderObject['FromState'] = $FromState;
                $orderObject['FromZip5'] = $FromZip;
                $orderObject['FromZip4'] = '';
                $orderObject['FromPhone'] = $FromPhone;
                $orderObject['ToFirstName'] = $post['buyername'];
                $orderObject['ToLastName'] = '';
                $orderObject['ToFirm'] = '';
                $orderObject['ToAddress1'] = $post['buyeraddress1'];
                $orderObject['ToAddress2'] = $post['buyeraddress2'];
                $orderObject['ToAddress3'] = '';
                $orderObject['ToCity'] = $post['buyercity'];
                $orderObject['ToState'] = $post['buyerstate'];
                $orderObject['ToZip5'] = '';
                $orderObject['ToZip4'] = $post['buyerzip'];
                $orderObject['ToPhone'] = $post['buyerphone'];
                $orderObject['WeightInOunces'] = '';
                $orderObject['ShipDate'] = date("d/m/y");   //'0/0/00';
                $orderObject['FlatRate'] = 'false';
                $orderObject['SundayHolidayDelivery'] = 'false';
                $orderObject['StandardizeAddress'] = 'true';
                $orderObject['WaiverOfSignature'] = 'true';
                $orderObject['NoHoliday'] = 'false';
                $orderObject['NoWeekend'] = 'false';
                $orderObject['SeparateReceiptPage'] = 'false';
                $orderObject['POZipCode'] = '';
                $orderObject['FacilityType'] = 'DDU';
                $orderObject['ImageType'] = 'PDF';
                $orderObject['LabelDate'] = '0/0/00';
                $orderObject['CustomerRefNo'] = 'CustomerRefNo0';
                $orderObject['SenderName'] = 'Gemnile';
                $orderObject['SenderEMail'] = 'sugarskarats@gmail.com';
                $orderObject['RecipientName'] = $post['buyer-name'];
                $orderObject['RecipientEMail'] = $post['buyer-email'];
                $orderObject['HoldForManifest'] = 'N';
                $orderObject['SenderEMail'] = 'gemile@yahoo.com';
                $orderObject['CommercialPrice'] = 'false';
                $orderObject['InsuredAmount'] = '0.0';
                $Response = $Usps->uploadOrder($orderObject, $post['shipped_usps']);
            }
            if ($post['shipped_usps'] == 'OpenDistributePriority') {
                $orderObject = array();
                $orderObject['PermitNumber'] = '1';
                $orderObject['PermitIssuingPOZip5'] = $permitzip;
                $orderObject['FromName'] = $FromFirstName . $FromLastName;
                $orderObject['FromFirm'] = $fromFirm;
                $orderObject['FromAddress1'] = $FromAddress1;
                $orderObject['FromAddress2'] = $FromAddress2;
                $orderObject['FromCity'] = $FromCity;
                $orderObject['FromState'] = $FromState;
                $orderObject['FromZip5'] = $FromZip;
                $orderObject['FromZip4'] = '';
                $orderObject['POZipCode'] = $FromPOZipCode;
                $orderObject['ToFacilityName'] = $post['buyername'];
                $orderObject['ToFacilityAddress1'] = $post['buyeraddress1'];
                $orderObject['ToFacilityAddress2'] = $post['buyeraddress2'];
                $orderObject['ToFacilityCity'] = $post['buyercity'];
                $orderObject['ToFacilityState'] = $post['buyerstate'];
                $orderObject['ToFacilityZip4'] = $post['buyerzip'];
                $orderObject['FacilityType'] = 'DDU';
                $orderObject['MailClassEnclosed'] = 'Other';
                $orderObject['MailClassOther'] = 'Free Samples';
                $orderObject['WeightInPounds'] = $weightinpounds;
                $orderObject['WeightInOunces'] = $weightinounces;
                $orderObject['ImageType'] = 'PDF';
                $orderObject['SeparateReceiptPage'] = 'false';
                $orderObject['AllowNonCleansedFacilityAddr'] = 'false';
                $Response = $Usps->uploadOrder($orderObject, 'OpenDistributePriority');
            }
            if ($Response['ACK'] == 'Success') {
                $ResponseObject = simplexml_load_string($Response['Message']);
                if ($ResponseObject->error) {
                    /// print $ResponseObject->Error->Number . "--" . $ResponseObject->Error->Source . "--" . $ResponseObject->Error->Description;
                    $messsge = ($ResponseObject->Description) . "<br>This error means that your USPS user ID is not confirmed yet. You should call USPS to activate yourself on the production servers. It will not work until you do this. You need to call 800-344-7779.";
                } else {

                    $messsge = ($ResponseObject->Description) . "<br>This error means that your USPS user ID is not confirmed yet. You should call USPS to activate yourself on the production servers. It will not work until you do this. You need to call 800-344-7779.";
                }
            } else {

                $isinsert = $this->db->update('orders', array(
                    'usps-service' => $usps_service,
                    'usps_tracking_code' => mysql_real_escape_string($usps_tracking_code),
                        ));
                $this->db->where("orderid", $order_item_id);
                $messsge = "Order Successfully Shipped to USPS.";
            }
        }
        $retuen['success'] .= '<h1 class="success" style="font-size:15px;">Alert:' . $messsge . '</h1><br /><br />';
        return $retuen;
    }

    function getCommonPages() {
        $sql = "select * from " . $this->config->item('table_perfix') . "companyinfo ORDER BY topicid ASC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function saveorder($record) {
        $billingAddress = $record[4];
        $billingCity = $record[7];
        $billingCountry = $record[9];
        $billingFirstName = $record[10];
        $billingLastName = $record[12];
        $billingPhone = $record[13];
        $billingState = $record[14];
        $billingZip = $record[15];
        /*
         * @ Buyer
         */
        $buyerAddress = $record[18];
        $buyerId = $record[19];
        $buyerEbayId = $record[22];
        $buyerFirstName = $record[25];
        $buyerLastName = $record[27];
        $buyerPhone = $record[29];

        $shipDate = $record[71];
        $soldDate = $record[72];
        $ebayItem = $record[76];
        $itemCost = $record[86];
        $itemId = $record[87];
        $orderid = $record[94];
        $qtySold = $record[103];
        $salePrice = $record[106];
        $shipAddress = $record[112];
        $shipCity = $record[115];
        $shipCountry = $record[117];
        $shipFirst = $record[118];
        $shipLast = $record[120];
        $shipPhone = $record[121];
        $shipState = $record[122];
        $shipZip = $record[123];
        $productName = $record[140];
        $trackingNumber = $record[143];
        $transactionID = $record[144];
        $paymentMethod = $record[145];

        $query = $this->db->query("select order_id  from  ebay_order  where  order_id = '" . $orderid . "'");
        $rows = $query->result_array();
        list($ebayItem, $r) = explode("-", $orderid);
        if ($rows[0]['order_id'] == '' || $rows[0]['order_id'] == '0') {
            $isinsert = $this->db->insert('ebay_order', array(
                'billing_address1' => trim($billingAddress),
                'billing_city' => mysql_real_escape_string($billingCity),
                'billing_country' => mysql_real_escape_string($billingCountry),
                'billing_firstname' => $billingFirstName,
                'billing_lastname' => $billingLastName,
                'billing_phone' => $billingPhone,
                'billing_state' => $billingState,
                'billing_zip' => $billingZip,
                'buyer_address' => mysql_real_escape_string($buyerAddress),
                'buyer_buyerid' => $buyerId,
                'buyer_ebayid' => $buyerEbayId,
                'buyer_firstname' => mysql_real_escape_string($buyerFirstName),
                'buyer_lastname' => $buyerLastName,
                'buyer_phone' => $buyerPhone,
                'shipping_date' => date("Y-m-d H:i:s", strtotime($shipDate)),
                'sold_date' => date("Y-m-d H:i:s", strtotime($soldDate)),
                'ebay_item' => $ebayItem,
                'item_cost' => $itemCost,
                'item_id' => $itemId,
                'order_id' => $orderid,
                'qty_sold' => $qtySold,
                'sale_price' => $salePrice,
                'shipping_address1' => mysql_real_escape_string($shipAddress),
                'ship_city' => mysql_real_escape_string($shipCity),
                'ship_country' => $shipCountry,
                'ship_firstname' => mysql_real_escape_string($shipFirst),
                'ship_lastname' => mysql_real_escape_string($shipLast),
                'ship_phone' => $shipPhone,
                'ship_state' => mysql_real_escape_string($shipState),
                'ship_zip' => $shipZip,
                'product_name' => mysql_real_escape_string($productName),
                'tracking_number' => $trackingNumber,
                'transaction_id' => $paymentMethod,
                'payment_method' => $paymentMethod,
			));

            if ($ebayItem) {
                $query = $this->db->query("select * from " . $this->config->item('table_perfix') . "watches  where  ebayid = '" . $ebayItem . "'  LIMIT 1");
                $data = $query->result_array();
                $AfterReduceQty = $data[0]['qty'] - $qtySold;
                if ($data[0]['qty'] > 0) {
                    if ($AfterReduceQty <= 0) {
                        $sql = "Update dev_watches set qty  =  0   where ebayid = '" . $ebayItem . "'";
                        $result = $this->db->query($sql);
                        $q = $this->endFixedPriceBid($ebayItem);
                    } else {

                        $productArr = $this->getAllByWatchID($data[0]['productID']);
                        $productArr['qty'] = $AfterReduceQty;
                        $this->addWatchtoEbay($productArr, $action = 'edit');
                    }
                } else {
                    $this->endFixedPriceBid($ebayItem);
                }
            }
            return $insert_id;
        }
    }

    function saveimg($action = 'view', $data, $id) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';

        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $itemDetail = $this->getAllByWatchID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM main_images WHERE image_id = $id";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            if (is_array($data)) {
                if ($action == 'add') {
                    $isinsert = $this->db->insert('main_images', array(
                        'image_title' => $data['image_title'],
                        'content' => $data['content'],
                        'image_type' => $data['image_type'],
                        'image_link' => $data['image_link'],
                        'image' => $data['image'],
                        'image_date' => date("Y-m-d H:i:s")
					));
                    $rid = $this->db->insert_id();
                } else {
                    $rid = $id;
                    $this->db->where('image_id', $id);
                    $isinsert = $this->db->update('main_images', array(
                        'image_title' => $data['image_title'],
                        'content' => $data['content'],
                        'image_type' => $data['image_type'],
                        'image_link' => $data['image_link'],
                        'image' => $data['image'],
                        'image_date' => date("Y-m-d H:i:s")
					));
                }
            }
            $retuen['success'] .= '<h1 class="success">Watch brand Successfully ' . ucfirst($action) . 'ed .</h1><br /><br /><small> <a href="' . config_item('base_url') . 'admin/showimage/' . $rid . '">Click Here </a> To View/Edit</small>';
        }
        return $retuen;
    }

    function savecoupon($data, $action, $id = 0) {
        $retuen['success'] = '';
        if ($action == 'add') {
            $query = "insert into coupons (`code` , `discount` ,  `add_date`)  values ('" . $data['code'] . "' ,  '" . $data['discount'] . "' , '" . date('Y-m-d') . "')";
            $query = $this->db->query($query);
            $id = mysqli_insert_id();
            $retuen['success'] .= 'Coupon has been ' . ucfirst($action) . 'ed successfully. ';
        }
        if ($action == 'edit' && !empty($id)) {
			$query = "Update  coupons  set  `code` =  '" . $data['code'] . "' ,`discount` =  '" . $data['discount'] . "'  WHERE coupon_id = '" . $id . "'";
			$query = $this->db->query($query);
            $retuen['success'] .= 'Coupon has been ' . ucfirst($action) . 'ed successfully. ';
        }
        if ($action == 'delete' && !empty($id)) {
            $query = "delete  from  coupons  WHERE coupon_id = '" . $id . "'";
            $query = $this->db->query($query);
            $retuen['success'] .= 'Coupon has been ' . ucfirst($action) . 'ed successfully. ';
        }

        return $retuen;
    }

    function getCoupon($sid) {
        $qry = "SELECT * FROM coupons WHERE coupon_id = '" . $sid . "'";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function getCommonPageTemplate($pageid) {
        $sql = "select content, analytic_code from " . $this->config->item('table_perfix') . "companyinfo where topicid ='$pageid'";
        $query = $this->db->query($sql);
        $result = $query->result_array();

        if ($query->num_rows()) {
            return $result[0];
        } else {
            return '';
        }
    }

    function saveCommonPageTemplate($data=[], $pageid = '', $content = '', $title = '') {
        $analytic_code = str_replace(array('[removed]', ''), '', $data['analytic_code']);
        
        $this->db->where('topicid', $pageid);
        $t = $this->db->update($this->config->item('table_perfix') . 'companyinfo', array('content' => $content, 'analytic_code' => trim($analytic_code)));
        if ($t) {
            return true;
        } else {
            return false;
        }
    }

    function getjewelries($page = 1, $rp = 10, $sortname = 'price', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {
        $results = array();

        $sort = "ORDER BY price $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'jewelries where small_image!="" ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT    	stock_number FROM  ' . $this->config->item('table_perfix') . 'jewelries  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }

    function jewelries($post, $action = 'view', $id = 0, $imageSmall = '', $imageBig = '') {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            //$items = rtrim($_POST['items'],",");
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $itemDetail = $this->getAllByStockID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "jewelries WHERE stock_number = $value";
                    $result = $this->db->query($sql);
                    if ($itemDetail['ebayid'] != '' && $itemDetail['ebayid'] != 0) {
                        $status = $this->endFixedPriceBid($itemDetail['ebayid']);
                    }
                }
            }
            $items = rtrim($_POST['items'], ",");
            /* $sql = "DELETE FROM ".$this->config->item('table_perfix')."jewelries WHERE stock_number IN ($items)";
              $result = $this->db->query($sql); */
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "ringanimation WHERE stock_num IN ($items)";
            $result = $this->db->query($sql);
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "ringimages WHERE stock_number IN ($items)";
            $result = $this->db->query($sql);
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {


            if (is_array($post)) {
                $name = isset($post['name']) ? $post['name'] : 0;
                $price = isset($post['price']) ? $post['price'] : 0;
                $section = isset($post['section']) ? $post['section'] : '';
                $collection = isset($post['collection']) ? $post['collection'] : '';
                $carat = isset($post['carat']) ? $post['carat'] : '';
                $shape = isset($post['shape']) ? $post['shape'] : '';
                $metal = isset($post['metal']) ? $post['metal'] : '';
                //$finger_size   	= isset($post['finger_size']) 	? $post['finger_size'] : '';
                $diamond_count = isset($post['diamond_count']) ? $post['diamond_count'] : '';
                $diamond_size = isset($post['diamond_size']) ? $post['diamond_size'] : '';
                $total_carats = isset($post['total_carats']) ? $post['total_carats'] : '';
                $pearl_lenght = isset($post['pearl_lenght']) ? $post['pearl_lenght'] : '';
                $pearl_mm = isset($post['pearl_mm']) ? $post['pearl_mm'] : '';
                $semi_mounted = isset($post['semi_mounted']) ? $post['semi_mounted'] : '';
                $side = isset($post['side']) ? $post['side'] : '';
                $description = isset($post['description']) ? $post['description'] : '';
                $small_img = isset($post['small_image']) ? $post['small_image'] : '';
                $carat_image = isset($post['carat_image']) ? $post['carat_image'] : '';
                $style = isset($post['style']) ? $post['style'] : '';
                $ringtype = isset($post['ringtype']) ? $post['ringtype'] : '';
                $platinum_price = isset($post['platinum_price']) ? $post['platinum_price'] : 0;
                $white_gold_price = isset($post['white_gold_price']) ? $post['white_gold_price'] : 0;
                $yellow_gold_price = isset($post['yellow_gold_price']) ? $post['yellow_gold_price'] : 0;
                $yellow_gold_price = isset($post['yellow_gold_price']) ? $post['yellow_gold_price'] : 0;
                $yellow_gold_price = isset($post['yellow_gold_price']) ? $post['yellow_gold_price'] : 0;




                if ($action == 'add') {

                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'jewelries', array(
                        'price' => $price,
                        'section' => $section,
                        'collection' => $collection,
                        'carat' => $carat,
                        'shape' => $shape,
                        'metal' => $metal,
                        //'finger_size'		=> $finger_size,
                        'diamond_count' => $diamond_count,
                        'diamond_size' => $diamond_size,
                        'total_carats' => $total_carats,
                        'pearl_lenght' => $pearl_lenght,
                        'pearl_mm' => $pearl_mm,
                        'semi_mounted' => $semi_mounted,
                        'side' => $side,
                        'description' => $description,
                        'style' => $style,
                        'ringtype' => $ringtype,
                        'name' => $name,
                        'yellow_gold_price' => $yellow_gold_price,
                        'white_gold_price' => $white_gold_price,
                        'platinum_price' => $platinum_price
                            ));
                    $rid = $this->db->insert_id();
                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'ringanimation', array('stock_num' => $rid));
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('stock_number', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'jewelries', array(
                        'price' => $price,
                        'section' => $section,
                        'collection' => $collection,
                        'carat' => $carat,
                        'shape' => $shape,
                        'metal' => $metal,
                        //'finger_size'		=> $finger_size,
                        'diamond_count' => $diamond_count,
                        'diamond_size' => $diamond_size,
                        'total_carats' => $total_carats,
                        'pearl_lenght' => $pearl_lenght,
                        'pearl_mm' => $pearl_mm,
                        'semi_mounted' => $semi_mounted,
                        'side' => $side,
                        'description' => $description,
                        'style' => $style,
                        'ringtype' => $ringtype,
                        'name' => $name,
                        'yellow_gold_price' => $yellow_gold_price,
                        'white_gold_price' => $white_gold_price,
                        'platinum_price' => $platinum_price
                            ));
                }
                $qry = 'select * from ' . $this->config->item('table_perfix') . 'ringanimation where stock_num=' . $rid;
                $return = $this->db->query($qry);
                // $result = $return->result_array();	
                if ($return->num_rows() <= 0) {
                    //$ranimerexist =  isset($result[0]) ? $result[0] : false;
                    // if(!$ranimerexist)
                    $isinsertringanim = $this->db->insert($this->config->item('table_perfix') . 'ringanimation', array('stock_num' => $rid));
                }

                if ($_FILES['image_small']['name'] != '')
                    $this->uploadfile($_FILES, 'image_small', 'uploads', 'jpeg,gif,jpg,bmp,png', 'images/uploads', $rid, 'jewelries', 'stock_number', $rid, 'small_image');

                if ($_FILES['carat_image']['name'] != '')
                    $this->uploadfile($_FILES, 'carat_image', '', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/carat', $rid, 'jewelries', 'stock_number', $rid, 'carat_image');

                if ($_FILES['image45']['name'] != '')
                    $this->uploadfile($_FILES, 'image45', '', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/icons/45', $rid, 'ringanimation', 'stock_num', $rid, 'image45');

                if ($_FILES['image90']['name'] != '')
                    $this->uploadfile($_FILES, 'image90', '', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/icons/90', $rid, 'ringanimation', 'stock_num', $rid, 'image90');

                if ($_FILES['image180']['name'] != '')
                    $this->uploadfile($_FILES, 'image180', '', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/icons/180', $rid, 'ringanimation', 'stock_num', $rid, 'image180');



                if ($_FILES['image45_bg']['name'] != '')
                    $this->uploadfile($_FILES, 'image45_bg', '', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/icons/45', $rid . 'b', 'ringanimation', 'stock_num', $rid, 'image45_bg');

                if ($_FILES['image90_bg']['name'] != '')
                    $this->uploadfile($_FILES, 'image90_bg', '', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/icons/90', $rid . 'b', 'ringanimation', 'stock_num', $rid, 'image90_bg');

                if ($_FILES['image180_bg']['name'] != '')
                    $this->uploadfile($_FILES, 'image180_bg', '', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/icons/180', $rid . 'b', 'ringanimation', 'stock_num', $rid, 'image180_bg');


                //  if($_FILES['animation1']['name'] != '') 															
                //    $this->uploadfile($_FILES, 'animation1', 'flash/45', 'swf' , config_item('base_path').'flash/45' , $rid , 'ringanimation', 'stock_num' , $rid , 'flash1');                      
                //$_FILES['animation2']['name'] != ''
                if ($_FILES['animation2']['name'] != '')
                    $this->uploadfile($_FILES, 'animation2', 'flash/90', 'swf', config_item('base_path') . 'flash/90', $rid, 'ringanimation', 'stock_num', $rid, 'flash2');
                if ($_FILES['animation3']['name'] != '')
                    $this->uploadfile($_FILES, 'animation3', 'flash/180', 'swf', config_item('base_path') . 'flash/180', $rid, 'ringanimation', 'stock_num', $rid, 'flash3');

                $productArr = $this->getAllByStockID($rid);
                $this->addRingtoEbay($productArr);

                if ($isinsert)
                    $retuen['success'] .= '<h1 class="success">Ring info Successfully ' . ucfirst($action) . 'ed .</h1><br /><br /><small> <a href="' . config_item('base_url') . 'admin/jewelries/edit/' . $rid . '">Click Here </a> To View/Edit</small>';
            }
        }

        return $retuen;
    }

    function jewelries_prev($post, $action = 'view', $id = 0) {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            //$items = rtrim($_POST['items'],",");
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $itemDetail = $this->getAllByStockID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "jewelries WHERE stock_number = $value";
                    $result = $this->db->query($sql);
                    if ($itemDetail['ebayid'] != '' && $itemDetail['ebayid'] != 0) {
                        $status = $this->endFixedPriceBid($itemDetail['ebayid']);
                    }
                }
            }
            $items = rtrim($_POST['items'], ",");
            /* $sql = "DELETE FROM ".$this->config->item('table_perfix')."jewelries WHERE stock_number IN ($items)";
              $result = $this->db->query($sql); */
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "gemstones WHERE jew_id IN ($items)";
            $result = $this->db->query($sql);
            //$sql = "DELETE FROM " . $this->config->item('table_perfix') . "ringimages WHERE stock_number IN ($items)";
            //$result = $this->db->query($sql);
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {

            if (is_array($post)) {


                $item_sku = isset($post['item_sku']) ? $post['item_sku'] : '';
                $ebayid = isset($post['ebayid']) ? $post['ebayid'] : 0;
                $vendor_name = isset($post['vendor_name']) ? $post['vendor_name'] : '';
                $vendor_sku = isset($post['vendor_sku']) ? $post['vendor_sku'] : '';
                $item_title = isset($post['item_title']) ? $post['item_title'] : '';
                $marketplace_on_amazon = isset($post['marketplace_on_amazon']) ? $post['marketplace_on_amazon'] : '';
                $marketplace_on_ebay = isset($post['marketplace_on_ebay']) ? $post['marketplace_on_ebay'] : '';
                $marketplace_on_website = isset($post['marketplace_on_website']) ? $post['marketplace_on_website'] : '';
                $price_amazon = isset($post['price_amazon']) ? $post['price_amazon'] : '';
                $price_ebay = isset($post['price_ebay']) ? $post['price_ebay'] : '';
                $price_website = isset($post['price_website']) ? $post['price_website'] : '';
                $quantity = isset($post['quantity']) ? $post['quantity'] : '';
                $gender = isset($post['gender']) ? $post['gender'] : '';
                $category = isset($post['category']) ? $post['category'] : '';
                $subcategory = isset($post['subcategory']) ? $post['subcategory'] : '';
                $metal_type = isset($post['metal_type']) ? $post['metal_type'] : '';
                $metal_purity = isset($post['metal_purity']) ? $post['metal_purity'] : '';
                $metal_color = isset($post['metal_color']) ? $post['metal_color'] : '';
                $finish = isset($post['finish']) ? $post['finish'] : '';
                $category_type = isset($post['category_type']) ? $post['category_type'] : '';
                $description = isset($post['description']) ? strip_tags($post['description']) : '';
                $chain_included = isset($post['chain_included']) ? $post['chain_included'] : 0;
                $ring_size = isset($post['ring_size']) ? $post['ring_size'] : '';
                $avail_size = isset($post['avail_size']) ? $post['avail_size'] : '';
                $retail = isset($post['retail']) ? $post['retail'] : '';

                if ($category_type == 'ring') {
                    $measurements = isset($post['ring_measurements']) ? $post['ring_measurements'] : '';
                } elseif ($category_type == 'earrings') {
                    $measurements = isset($post['earring_measurements']) ? $post['earring_measurements'] : '';
                } else {
                    $measurements = '';
                }

                if ($category_type == 'bracelet') {
                    $weight = isset($post['bracelet_weight']) ? $post['bracelet_weight'] : '';
                } elseif ($category_type == 'earrings') {
                    $weight = isset($post['earring_weight']) ? $post['earring_weight'] : '';
                } elseif ($category_type == 'pendant') {
                    $weight = isset($post['pendant_weight']) ? $post['pendant_weight'] : '';
                } elseif ($category_type == 'ring') {
                    $weight = isset($post['ring_weight']) ? $post['ring_weight'] : '';
                } else {
                    $weight = '';
                }

                if ($category_type == 'bracelet') {
                    $style = isset($post['bracelet_style']) ? $post['bracelet_style'] : '';
                } elseif ($category_type == 'chain') {
                    $style = isset($post['main_chain_style']) ? $post['main_chain_style'] : '';
                } elseif ($category_type == 'earrings') {
                    $style = isset($post['earring_style']) ? $post['earring_style'] : '';
                } elseif ($category_type == 'pendant') {
                    $style = isset($post['pendant_style']) ? $post['pendant_style'] : '';
                } elseif ($category_type == 'ring') {
                    $style = isset($post['ring_style']) ? $post['ring_style'] : '';
                } else {
                    $style = '';
                }

                if ($category_type == 'bracelet') {
                    $length = isset($post['bracelet_length']) ? $post['bracelet_length'] : '';
                } elseif ($category_type == 'earrings') {
                    $length = isset($post['post_length']) ? $post['post_length'] : '';
                } elseif ($category_type == 'pendant') {
                    $length = isset($post['pendant_length']) ? $post['pendant_length'] : '';
                } else {
                    $length = '';
                }

                if ($category_type == 'bracelet') {
                    $width = isset($post['bracelet_width']) ? $post['bracelet_width'] : '';
                } elseif ($category_type == 'chain') {
                    $width = isset($post['chain_width']) ? $post['chain_width'] : '';
                } elseif ($category_type == 'earrings') {
                    $width = isset($post['earring_width']) ? $post['earring_width'] : '';
                } elseif ($category_type == 'pendant') {
                    $width = isset($post['pendant_width']) ? $post['pendant_width'] : '';
                } else {
                    $width = '';
                }

                if ($category_type == 'chain') {
                    $chain_style = isset($post['main_chain_style']) ? $post['main_chain_style'] : '';
                    $chain_weight = isset($post['main_chain_weight']) ? $post['main_chain_weight'] : '';
                    $chain_length = isset($post['main_chain_length']) ? $post['main_chain_length'] : '';
                    $chain_clasp = isset($post['main_chain_clasp']) ? $post['main_chain_clasp'] : '';
                } else {
                    $chain_style = isset($post['chain_style']) ? $post['chain_style'] : '';
                    $chain_weight = isset($post['chain_weight']) ? $post['chain_weight'] : '';
                    $chain_length = isset($post['chain_length']) ? $post['chain_length'] : '';
                    $chain_clasp = isset($post['chain_clasp']) ? $post['chain_clasp'] : '';
                }



                $chain_type = isset($post['chain_type']) ? $post['chain_type'] : '';
                $clasp_type = isset($post['clasp_type']) ? $post['clasp_type'] : '';
                $back_type = isset($post['back_type']) ? $post['back_type'] : '';
                $hoop_diameter = isset($post['hoop_diameter']) ? $post['hoop_diameter'] : '0';
                $is_included = isset($post['is_included']) ? $post['is_included'] : '';
                $chain_purity = isset($post['chain_purity']) ? $post['chain_purity'] : '';
                $gift_pkg = isset($post['gift_pkg']) ? $post['gift_pkg'] : '';
                $image1 = isset($post['image1']) ? $post['image1'] : '';
                $image2 = isset($post['image2']) ? $post['image2'] : '';
                $image3 = isset($post['image3']) ? $post['image3'] : '';
                $image4 = isset($post['image4']) ? $post['image4'] : '';
                $image5 = isset($post['image5']) ? $post['image5'] : '';
                $image6 = isset($post['image6']) ? $post['image6'] : '';
                $stone = isset($post['stone']) ? $post['stone'] : '';
                $type = isset($post['type']) ? $post['type'] : '';
                $ring_size = isset($post['ring_size']) ? $post['ring_size'] : 0;
                if ($action == 'add') {
                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'jewelries', array(
                        'item_title' => $item_title,
                        'marketplace_on_amazon' => $marketplace_on_amazon,
                        'marketplace_on_ebay' => $marketplace_on_ebay,
                        'marketplace_on_website' => $marketplace_on_website,
                        'vendor_name' => $vendor_name,
                        'vendor_sku' => $vendor_sku,
                        'item_sku' => $item_sku,
                        'price_amazon' => $price_amazon,
                        'price_ebay' => $price_ebay,
                        'price_website' => $price_website,
                        'quantity' => $quantity,
                        'gender' => $gender,
                        'category' => $category,
                        'subcategory' => $subcategory,
                        'metal_type' => $metal_type,
                        'metal_purity' => $metal_purity,
                        'metal_color' => $metal_color,
                        'finish' => $finish,
                        'category_type' => $category_type,
                        'description' => $description,
                        'style' => $style,
                        'ring_size' => $ring_size,
                        'avail_size' => $avail_size,
                        'measurements' => $measurements,
                        'weight' => $weight,
                        'length' => $length,
                        'width' => $width,
                        'chain_type' => $chain_type,
                        'clasp_type' => $clasp_type,
                        'back_type' => $back_type,
                        'hoop_diameter' => $hoop_diameter,
                        'is_included' => $is_included,
                        'chain_style' => $chain_style,
                        'chain_length' => $chain_length,
                        'chain_purity' => $chain_purity,
                        'chain_clasp' => $chain_clasp,
                        'chain_weight' => $chain_weight,
                        'gift_pkg' => $gift_pkg,
                        'is_included' => $chain_included,
                        'stone' => $stone,
                        'gemstone_type' => $type, 'retail' => $retail,
                        'date' => date("Y-m-d H:i:s")
                            ));
                    $rid = $this->db->insert_id();
                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'gemstones', array('jew_id' => $rid));
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('stock_number', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'jewelries', array(
                        'item_title' => $item_title,
                        'marketplace_on_amazon' => $marketplace_on_amazon,
                        'marketplace_on_ebay' => $marketplace_on_ebay,
                        'marketplace_on_website' => $marketplace_on_website,
                        'vendor_name' => $vendor_name,
                        'vendor_sku' => $vendor_sku,
                        'item_sku' => $item_sku,
                        'price_amazon' => $price_amazon,
                        'price_ebay' => $price_ebay,
                        'price_website' => $price_website,
                        'quantity' => $quantity,
                        'gender' => $gender,
                        'category' => $category,
                        'subcategory' => $subcategory,
                        'metal_type' => $metal_type,
                        'metal_purity' => $metal_purity,
                        'metal_color' => $metal_color,
                        'finish' => $finish,
                        'category_type' => $category_type,
                        'description' => $description,
                        'style' => $style,
                        'ring_size' => $ring_size,
                        'avail_size' => $avail_size,
                        'measurements' => $measurements,
                        'weight' => $weight,
                        'length' => $length,
                        'width' => $width,
                        'chain_type' => $chain_type,
                        'clasp_type' => $clasp_type,
                        'back_type' => $back_type,
                        'hoop_diameter' => $hoop_diameter,
                        'is_included' => $is_included,
                        'chain_style' => $chain_style,
                        'chain_length' => $chain_length,
                        'chain_purity' => $chain_purity,
                        'chain_clasp' => $chain_clasp,
                        'chain_weight' => $chain_weight,
                        'stone' => $stone,
                        'gemstone_type' => $type,
                        'gift_pkg' => $gift_pkg,
                        'is_included' => $chain_included, 'retail' => $retail,
                        'date' => date("Y-m-d H:i:s")
                            ));
                }
                if ($stone > 0) {

                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "gemstones WHERE jew_id = $rid ";
                    $result = $this->db->query($sql);
                    for ($s = 0; $s < $stone; $s++) {
                        $isinsert = $this->db->insert($this->config->item('table_perfix') . 'gemstones', array(
                            'gemstone' => $post["gemstone$s"],
                            'class' => $post["gemstoneClass$s"],
                            'color' => $post["gemstoneColor$s"],
                            'birthstone_month' => $post["birthstone$s"],
                            'shape' => $post["gemstoneShape$s"],
                            'stone_size' => $post["stoneSize$s"],
                            'number_of_gemstones' => $post["stone_count$s"],
                            'total_weight' => $post["stone_weight$s"],
                            'settings' => $post["setting$s"],
                            'jew_id' => $rid,
                            'add_date' => date("Y-m-d")
                                ));
                    }
                }

                if ($_FILES['image1']['name'] != '')
                    $this->uploadfile($_FILES, 'image1', 'uploads', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/uploads', $rid, 'jewelries', 'stock_number', $rid, 'image1');

                if ($_FILES['image2']['name'] != '')
                    $this->uploadfile($_FILES, 'image2', 'uploads', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/uploads', $rid, 'jewelries', 'stock_number', $rid, 'image2');


                if ($_FILES['image3']['name'] != '')
                    $this->uploadfile($_FILES, 'image3', 'uploads', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/uploads', $rid, 'jewelries', 'stock_number', $rid, 'image3');

                if ($_FILES['image4']['name'] != '')
                    $this->uploadfile($_FILES, 'image4', 'uploads', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/uploads', $rid, 'jewelries', 'stock_number', $rid, 'image4');

                if ($_FILES['image5']['name'] != '')
                    $this->uploadfile($_FILES, 'image5', 'uploads', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/uploads', $rid, 'jewelries', 'stock_number', $rid, 'image5');

                if ($_FILES['image6']['name'] != '')
                    $this->uploadfile($_FILES, 'image6', 'uploads', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/uploads', $rid, 'jewelries', 'stock_number', $rid, 'image6');


                $productArr = $this->getAllByStockID($rid);
                $ebayCatQuery = "SELECT  primary_cat_id ,  ebay_cat_id  FROM  " . $this->config->item('table_perfix') . "category where id = '" . $productArr['category'] . "'";
                $result = $this->db->query($ebayCatQuery);
                $data = $result->result_array();
                $productArr['store_cat_id'] = $data[0]['ebay_cat_id'];
                $productArr['primary_cat_id'] = $data[0]['primary_cat_id'];

                $this->addRingtoEbay($productArr);


                /*
                 * Start Amazon code
                 */

                /*
                 * @ Add item on amazon */
                /*
                  $id_type = '3';
                  $amazon_chk='1';
                  $upc='729367444790';
                  if($amazon_chk == '1')  {
                  if($id_type == '1'){
                  $upcid  = $upc."%2C";
                  $upcid .= $upc;
                  $type =  'ASIN';
                  }
                  if($id_type == '2'){
                  $upcid  = $upc."%2C";
                  $upcid .= $upc;
                  $type =  'ISBN';
                  }
                  if($id_type == '3'){
                  $upcid  = $upc."%2C";
                  $upcid .= $upc;
                  $type  = 'UPC';
                  }
                  if($id_type == '4'){
                  $upcid  = $upc."%2C";
                  $upcid .= $upc;
                  $type =  'EAN';
                  }
                 *
                 */
                /*
                  $lowestPrice = $lowest_price;
                  if($per_dis_amt  > 0 && !empty($per_dis_amt)){
                  $lowestPrice = $retail_price - (($retail_price * $per_dis_amt)/100);
                  }

                  $highestPrice = $highest_price;
                  // $updatedLowprice = $products['lowprice'];
                  $updatedLowprice = '0.00';
                 *
                 */
                include_once(config_item('base_path') . "amazon/Amazon.php");
                /*
                 * Update Amazon lowest price on website
                 */
                /*
                  $amazon = new Amazon();
                  if($type != 'ASIN'){
                  $request = $amazon->itemlookup($upcid,$type);
                  $xml = $amazon->getCurlResponse($request);
                  $data = '';
                  $data = simplexml_load_string($xml);

                  if($data){
                  if($data->Items->Request->Errors->Error->Message){
                  $errorMessage = (string)($data->Items->Request->Errors->Error->Message);
                  }
                  $totalitems =  sizeof($data->Items->Item->Offers->Offer);
                  $LastValue = $totalitems -1 ;
                  $list = ($data->Items->Item->Offers->Offer[$LastValue]);
                  $listprice =  trim($list->OfferListing->Price->FormattedPrice[0]);
                  $listprice =  substr($listprice,1);
                  $prices = array();
                  echo $totalitems;

                  for($j=0;$j<$totalitems;$j++){
                  $Amazonlist = ($data->Items->Item->Offers->Offer[$j]);
                  $amazonItemprices =  trim($Amazonlist->OfferListing->Price->FormattedPrice[0]);
                  $amazonItemprices =  substr($amazonItemprices,1);
                  echo "<hr>";
                  print_r($data);
                  echo "<hr>";
                  echo $amazonItemprices;
                 */
                /*
                 * @ Here the logic we need to check the price is between the highest and lowest valeu
                 * @ Price should be included with shipping costs
                 */
                /*
                  if($amazonItemprices > $lowestPrice && $amazonItemprices < $highestPrice){
                  $updatedLowprice = $amazonItemprices;
                  //      echo 'Our Lowest Item Price:'.$updatedLowprice;
                  break;
                  // }
                 * 
                 */
                //	$prices[] = $amazonItemprices;
                /*  if($data->Items->Item->OfferSummary->LowestNewPrice->CurrencyCode == 'USD'){
                  $lowPrice = (float)($data->Items->Item->OfferSummary->LowestNewPrice->Amount);
                  }
                  //$updatedLowprice = ($lowPrice)/100;
                  }
                 */
                //// close for loop
                /*
                  $updatedLowprice = $amazonItemprices;
                  $amazon_listed_price = ($updatedLowprice) - '0.01';
                  echo "<br>Price".$amazon_listed_price;
                  //exit;
                  }
                  }  else {
                  $asin_price = $_POST['price'];
                  $amazon_listed_price = $asin_price;
                  }
                  if($updatedLowprice > 0 || $type != 'ASIN'){
                  echo $amazon_listed_price."----------------".$rid;
                 */
                // exit;

                /*
                  $qry = "Update dev_watches set `lowprice` = '".mysql_real_escape_string($updatedLowprice)."' ,
                  `amazon_listed_price` = '".mysql_real_escape_string($amazon_listed_price)."' ,
                  `highest_amazon_price` = '".mysql_real_escape_string($listprice)."' ,
                  `price_updated` = '1' where `productID` =  '".trim($rid)."'";
                  $this->db->query($qry);
                 * 
                 */
                /*
                 * @ Add Item on amazon
                 */
                /*
                  if(!empty($brand)){
                  $vendor_sku = "Diamonds"."-".$rid;
                  }else{
                  $vendor_sku = "Diamonds-".$rid;
                  }
                  if($condition == 'used'){
                  $cond = '2';
                  }else{
                  $cond = '11';
                  }
                  $price = $amazon_listed_price;
                 */
                //echo "<hr>".$price."----------------".$vendor_sku."---".$qty;
                /*
                 * Create csv and upload on amazon
                 */
                /*
                  $filePath = config_item('base_path')."amazon/diamond_qty_upc.txt";
                  $fp = fopen($filePath,"w");
                  $fileText = "product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
                  fwrite($fp,$fileText);
                  $fileText ="\n".$upc."\t";
                  $fileText .=$id_type ."\t";
                  //$fileText .="11\t";
                  $fileText .=$cond."\t";
                  $fileText .=$price."\t";
                  $fileText .=$vendor_sku."\t";
                  $fileText .=$qty."\t";
                  $fileText .="a\t";
                  $fileText .="n\t";
                  $fileText .="y\t";
                  $fileText .="This diamond is Brand NEW!!!!!!!!! . Factory Authorized Dealer 100% New In Box Customer Satisfaction Guaranteed or Money Back. Shop With Confidence.In Stock Same Day Shipping.\t";
                  fwrite($fp,$fileText);
                  fclose($fp);
                  $batchID = simplexml_load_string($amazon->AmazonListing($filePath));
                  echo $batchID;
                  exit;
                  $this->db->insert('upload_report', array(
                  'batchID' => trim($batchID),
                  'status' => 'open',
                  'dateofmodification' => date('Y-m-d H:i:s') ,
                  ));
                 */
                //$this->db->where("productID", trim($isinsert));
            }

            /*
             * End csv upload code
             */
            /*
              }


             */



            /*
             * @End Amazon code
             */

            //}
        }

        if ($isinsert)
            $retuen['success'] .= '<h1 class="success">Ring info Successfully ' . ucfirst($action) . 'ed .</h1><br /><br /><small> <a href="' . config_item('base_url') . 'admin/jewelries/edit/' . $rid . '">Click Here </a> To View/Edit</small>';
        return $retuen;
    }

    function getAllByStockID($sid) {
        $qry = "SELECT * FROM " . config_item('table_perfix') . "jewelries
                                WHERE stock_number = '" . $sid . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function uploadfile($files, $formfilenvar = 'myfile', $imageurlbase = '', $extsupport = 'jpeg,gif,jpg,bmp,png,swf', $base_savepath = 'uploads/', $filename = 'error.error', $dbtable = 'error', $idfield = 'id', $idvalue = '1', $tablefield = 'msg') {
        $attachExtension = '';
        if ($files[$formfilenvar]['name'] != '') {
            $supportExt = explode(',', $extsupport);
             $fileExt = end(explode('.', $files[$formfilenvar]['name']));
            if (in_array(strtolower($fileExt), $supportExt)) {
            //if (TRUE) {
               $attachFileName = $files[$formfilenvar]['tmp_name'];
                //$attachFileName = $_FILES['image_small']['tmp_name'];
                $attachExtension = strtolower($fileExt);
               $saveTo = $base_savepath . '/' . $idvalue.'_'.$files[$formfilenvar]['name'];
               $imageurl = $imageurlbase . '/' . $idvalue.'_'.$files[$formfilenvar]['name'];
               //echo $imageurl; exit();
						if (file_exists($saveTo)) {
							unlink($saveTo);
						}	  		
				//echo $saveTo;die;
                //chmod($base_savepath, 0777);
                $ismove = move_uploaded_file($attachFileName, $imageurl);
                //chmod($base_savepath, 0655);
               if ($ismove) {
			
                    $this->db->where($idfield, $idvalue);
                    $t = $isinsert = $this->db->update($this->config->item('table_perfix') . $dbtable, array($tablefield => $imageurl));
                    if ($t) {
                        $ret['success'] = $imageurl;
                    } else {
                        $ret['error'] = 'ERROR ! Image not uploaded';
                    }
                } else {
                    $ret['error'] = '<br><b>ERROR ! </b>File Can\t upload to server';
                }
            } else {
                $ret['error'] = '<br> Invalid File Type : <b>' . $fileExt[1] . '</b>';
            }
            return $ret;
        }
    }

    function getglobalvariable() {
        $sql = "select * from " . $this->config->item('table_perfix') . "siteconfig";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getglobalvariableByid($id) {
        $sql = "select value from " . $this->config->item('table_perfix') . "siteconfig where id ='$id'";
        $query = $this->db->query($sql);
        $result = $query->result();

        if ($query->num_rows()) {
            return $result[0]->value;
        } else {
            return '';
        }
    }

    function saveglobalvariableByid($id = '', $content = '') {
        $this->db->where('id', $id);
        $t = $this->db->update($this->config->item('table_perfix') . 'siteconfig', array('value' => $content));
        if ($t) {
            return true;
        } else {
            return false;
        }
    }

    function getFlashByStockId($stockid) {
        $qry = "SELECT id,flash1, flash2 , flash3 ,image45 , image90, image180, image45_bg , image90_bg, image180_bg
                                FROM " . config_item('table_perfix') . "ringanimation
                                WHERE stock_num = '" . $stockid . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        //return $result;
        return isset($result[0]) ? $result[0] : false;
    }

    function getcollections() {
        /*  $qry = "SELECT collection
          FROM " . config_item('table_perfix') . "jewelries
          Group by collection
          ";
          $return = $this->db->query($qry);
          $result = $return->result_array();
         * 
         */
        $result = '';
        return $result;
    }

    function getsections() {
        $qry = "SELECT section
                                FROM " . config_item('table_perfix') . "jewelries
                                GROUP By section
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return $result;
    }

    function getOrderByOrderId($order_id) {
        //$order_id = '103-3861413-8182668';
        $qry = "SELECT * FROM orders where orderid = '" . $order_id . "'";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return $result;
    }

    function gethomeimages($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {
        $results = array();
        $sort = '';
        $start = (($page - 1) * $rp);
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        $sql = 'SELECT  * FROM   main_images   where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;

        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $results['count'] = $result->num_rows();
        return $results;
    }

    function getcoupons($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {
        $results = array();
        $sort = '';
        $start = (($page - 1) * $rp);
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        $sql = 'SELECT  * FROM   coupons   where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $results['count'] = $result->num_rows();
        return $results;
    }

    function gethomeimage($id) {
        //$results = array();

        $sql = mysql_query("SELECT  * FROM   main_images   where image_id = '" . $id . "'");
        $data = mysql_fetch_assoc($sql);

        //var_dump($sql);
        //$results['result']  = mysql_fetch_assoc($sql);
        return $data;
    }

    /*
      function gettestimonials($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {
      $results = array();

      $sort = "ORDER BY $sortname $sortorder,adddate desc";

      $start = (($page - 1) * $rp);

      $limit = "LIMIT $start, $rp";

      $qwhere = "";
      if ($query)
      $qwhere .= " AND $qtype LIKE '%$query%' ";
      if ($oid != '')
      $qwhere .= " AND id = $oid";


      $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'feedbacks where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
      //var_dump($sql);
      $result = $this->db->query($sql);
      $results['result'] = $result->result_array();
      $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'feedbacks  where 1=1 ' . $qwhere;
      $result2 = $this->db->query($sql2);
      $results['count'] = $result2->num_rows();

      return $results;
      }

      function testimonials($post, $action = 'view', $id = 0) {

      $retuen = array();
      $retuen['error'] = '';
      $retuen['success'] = '';
      if ($action == 'delete') {
      $items = rtrim($_POST['items'], ",");
      $sql = "DELETE FROM " . $this->config->item('table_perfix') . "feedbacks WHERE id IN ($items)";
      $result = $this->db->query($sql);
      $total = count(explode(",", $id));
      $retuen['total'] = $total;
      }
      if ($action == 'accept') {
      $items = rtrim($_POST['items'], ",");
      $sql = "UPDATE " . $this->config->item('table_perfix') . "feedbacks SET status='accepted' WHERE id IN ($items)";
      $result = $this->db->query($sql);
      $total = count(explode(",", $id));
      $retuen['total'] = $total;
      }
      if ($action == 'reject') {
      $items = rtrim($_POST['items'], ",");
      $sql = "UPDATE " . $this->config->item('table_perfix') . "feedbacks SET status='rejected' WHERE id IN ($items)";
      $result = $this->db->query($sql);
      $total = count(explode(",", $id));
      $retuen['total'] = $total;
      } else {

      }

      return $retuen;
      }
     */

    function newfeedbacks() {
        $sql2 = 'SELECT    	id FROM  ' . $this->config->item('table_perfix') . 'feedbacks  where status=\'*new\' ';
        $result2 = $this->db->query($sql2);
        return $result2->num_rows();
    }

    function getdiamondsmap($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '', $module = 'jewelry') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";

        $sql = 'SELECT * FROM ' . $this->config->item('table_perfix') . 'site_map where 1=1 and pagemodule=\'' . $module . '\' ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $results['count'] = $result->num_rows();

        return $results;
    }

    function editpagedata($id) {
        $sql = 'SELECT * FROM ' . $this->config->item('table_perfix') . 'site_map WHERE `pageid`=\'' . $id . '\'';
        $result = $this->db->query($sql);
        $results = $result->result_array();
        return $results;
    }

    function updatepagedata($id) {
        $pagetitle = $_POST['pagetitle'];
        $siteurl = $_POST['httpaddress'];
        $sql = "UPDATE " . $this->config->item('table_perfix') . "site_map SET pagetitle='$pagetitle' , httpaddress = '$siteurl' WHERE pageid='$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    function getgetpageinfodata($id) {
        $results = array();
        $sql = 'SELECT * FROM ' . $this->config->item('table_perfix') . 'pageinfo where `pageid`=\'' . $id . '\'';
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $results['count'] = $result->num_rows();

        return $results;
    }

    //--------------------------Tamal-------------------------

    function getAllSearch() {
        $sql = "SELECT *
                                FROM " . $this->config->item('table_perfix') . "search
                        ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getSearchById($id) {
        $sql = "SELECT *
                                FROM " . $this->config->item('table_perfix') . "search
                                WHERE id = " . $id . "

                        ";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    //--------------------------end tamal-------------------

    function getrightadd() {
        $sql = "select * from " . $this->config->item('table_perfix') . "rightads";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getrightaddcontent($pageid) {
        $sql = 'SELECT description FROM ' . $this->config->item('table_perfix') . 'rightads where id=\'' . $pageid . '\'';
        $query = $this->db->query($sql);
        $result = $query->result();

        if ($query->num_rows()) {
            return $result[0]->description;
        } else {
            return '';
        }
    }

    function saverightaddcontent($pageid = '', $content = '') {
        $this->db->where('id', $pageid);
        $t = $this->db->update($this->config->item('table_perfix') . 'rightads', array('description' => $content));
        if ($t) {
            return true;
        } else {
            return false;
        }
    }

    function editpageinfodata($id, $position) {
        $sql = 'SELECT * FROM ' . $this->config->item('table_perfix') . 'pageinfo WHERE `pageid`=\'' . $id . '\' AND `pageposition`=\'' . $position . '\'';
        $result = $this->db->query($sql);
        $results = $result->result_array();
        return $results;
    }

    function updatepageinfodata($id, $position) {
        $pageid = $_POST['pagedescription'];
        $sql = "UPDATE " . $this->config->item('table_perfix') . "pageinfo SET description='$pageid' WHERE pageid='$id' AND pageposition='$position'";
        $result = $this->db->query($sql);
        var_dump($result);
        return $result;
    }

    function customers($post, $action = 'view', $id = 0) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = rtrim($_POST['items'], ",");
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "orderdetails WHERE orderid IN (select id FROM " . $this->config->item('table_perfix') . "order WHERE customerid IN($items))";
            $result = $this->db->query($sql);

            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "order WHERE customerid IN ($items)";
            $result = $this->db->query($sql);

            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "customerinfo WHERE id IN ($items)";
            $result = $this->db->query($sql);


            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        }
        return $retuen;
    }

	function affiliateCustomers($post, $action = 'view', $id = 0) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = rtrim($_POST['items'], ",");
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "orderdetails WHERE orderid IN (select id FROM " . $this->config->item('table_perfix') . "order WHERE customerid IN($items) AND order_type = 'W')";
            $result = $this->db->query($sql);

            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "order WHERE customerid IN ($items)";
            $result = $this->db->query($sql);

            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "retailerlist WHERE id IN ($items)";
            $result = $this->db->query($sql);
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        }
        return $retuen;
    }

	////////////// delete trial users
	function deleteTrialUser($post, $action = 'view', $id = 0) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = rtrim($_POST['items'], ",");
           $sql = "DELETE FROM " . $this->config->item('table_perfix') . "user WHERE id IN ($items)";
            $result = $this->db->query($sql);

            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        }
		
		return $retuen;
    }

	function getaffiliateCustomers($page = 1,$rp = 10,$sortname = 'title',$sortorder = 'desc',$query = '',$qtype = 'title',$oid = ''){
        $results = array();
        $sort = "ORDER BY $sortname $sortorder";
        $start = (($page - 1) * $rp);
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";

        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'retailerlist where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        $result = $this->db->query($sql);
        $sql2 = 'SELECT * FROM  ' . $this->config->item('table_perfix') . 'retailerlist  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        $results['result'] = $result->result_array();

        return $results;
    }

    function getcustomers($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {

        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'customerinfo where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $sql2 = 'SELECT * FROM  ' . $this->config->item('table_perfix') . 'customerinfo  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        $results['result'] = $result->result_array();

        return $results;
    }
	
	///// get trial users list
	function getrialUsersList($page = 1, $rp = 10, $sortname = 'fname', $sortorder = 'desc', $query = '', $qtype = 'fname', $oid = '') {

        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = " AND id <> '111'";
        /*if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";*/


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'user where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $sql2 = 'SELECT * FROM  ' . $this->config->item('table_perfix') . 'user  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        $results['result'] = $result->result_array();

        return $results;
    }

    //------------------Orders ------------//
    /*
     * Website Orders Script
     */
    function getordercat($custid)
    {
    	$results = array();
    	$select = "SELECT * FROM dev_us_catagories WHERE id=".$custid;
    	$result = $this->db->query($select);
    	$row = $result->row();
    	return $row;
    }
    function getordercustid($custid)
    {
    	$results = array();
    	$select = "SELECT * FROM ".$this->config->item('table_perfix') . "customerinfo WHERE id=".$custid;
    	$result = $this->db->query($select);
    	$row = $result->row();
    	return $row;
    }
    function getorderdetail_or_or($orderid)
    {
    	$results = array();
    	$select = "SELECT * FROM ".$this->config->item('table_perfix') . "orderdetails WHERE orderid=".$orderid;
    	$result2 = $this->db->query($select);
    	//$results['count'] = $result2->num_rows();
    	
    	$results = $result2->result_array();
    	//$result = $this->db->query($select);
    	//$row = $result->row();
    	 
    	return $results;
    }
    function getCustomerByID_or($customerid) {
    	$select = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'customerinfo where 1=1 and id=' . $customerid;
    	//var_dump($sql);
    	$result = $this->db->query($select);
    	$row = $result->row();
    	//$result = $this->db->query($sql);
    
    	return $row;
    }
    function getShippingInfo_ro($orderid, $customerid) {
    
    
    	/*$qry = "SELECT *
    
    	FROM ".$this->config->item('table_perfix')."shippinginfo
    
    	WHERE orderid = '".$order[0]['id']."' AND customerid = '".$order[0]['customerid']."' order by id GROUP BY orderid, customerid"; */
    
    	$qry = "SELECT *
				FROM ".$this->config->item('table_perfix')."shippinginfo
				WHERE orderid = '".$orderid."' AND customerid = '".$customerid."' order by id desc LIMIT 0, 1";
    	$result = $this->db->query($qry);
    	$row = $result->row();
    	
    	return $row;
    
    
    
    }
    function getorderonly($orderid)
    {
    	$results = array();
    	$select = "SELECT * FROM ".$this->config->item('table_perfix') . "order WHERE id=".$orderid;
    	$result = $this->db->query($select);
    	$row = $result->row();
    
    	return $row;
    }
    function getorderdetail_or($orderid)
    {
    	$results = array();
    	 $select = "SELECT *,COUNT(*) AS totproducts FROM ".$this->config->item('table_perfix') . "orderdetails WHERE orderid=".$orderid;
    	$result = $this->db->query($select);
    	$row = $result->row();
    	
    	return $row;
    }
    function getorder_or($page = 1, $rp = 10, $sortname = 'id', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '', $otype='')
    {
    	$results = array();
    	$sort = "ORDER BY $sortname $sortorder";
    	// $sort = '';
    	$start = (($page - 1) * $rp);
    	$limit = "LIMIT $start, $rp";
    	$qwhere = "";
		$qwhere .= " AND order_type = '".$otype."'";
		
    	if ($query)
    		$qwhere .= " AND $qtype LIKE '%$query%' ";
    	//	if($oid != '') $qwhere .= " AND id = $oid";
    	$sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'order where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
    	//$sql = 'SELECT  * FROM   orders  where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
    	//var_dump($sql);
    	$result = $this->db->query($sql);
    	$results['result'] = $result->result_array();
    	$results['count'] = $result->num_rows();
    	return $results;
    }
    function getorder($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {

        $results = array();
        $sort = "ORDER BY $sortname $sortorder";
        // $sort = '';
        $start = (($page - 1) * $rp);
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        //	if($oid != '') $qwhere .= " AND id = $oid";
        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'orderdetails where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //$sql = 'SELECT  * FROM   orders  where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $results['count'] = $result->num_rows();
        return $results;
    }

    /*
     * End Website Order Script
     */

    function getorders($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {

        $results = array();

        ///$sort = "ORDER BY $sortname $sortorder";
        $sort = '';



        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        //	if($oid != '') $qwhere .= " AND id = $oid";
        //$sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'order where 1=1 '. $qwhere . ' ' . $sort . ' '. $limit;
        $sql = 'SELECT  * FROM   orders  where 1=1 ' . $qwhere . '' . " order by `purchase-date` DESC " . ' ' . $limit;

        $query1 = mysql_query("select count(*) as total from orders");
        $total = mysql_fetch_assoc($query1);
        //$this->db->query($query1);
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $results['count'] = $total['total'];
        // $results['count'] = 2000;
        return $results;
    }

    function getebayorders($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {
        $results = array();
        $sort = '';
        $start = (($page - 1) * $rp);
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        $sql = 'SELECT  * FROM    ebay_order   where 1=1 ' . $qwhere . ' order by sold_date DESC ' . $limit;
        //var_dump($sql);
        $qry1 = mysql_query("select count(*) as total from ebay_order ");
        $total = mysql_fetch_assoc($qry1);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        //$results['count'] = $result->num_rows();
        $results['count'] = $total['total'];
        return $results;
    }

    function diamonds($post, $action = 'view', $id = 0, $table = 'products') {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = rtrim($_POST['items'], ",");
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . $table . " WHERE lot IN ($items)";
            $result = $this->db->query($sql);
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        }


        return $retuen;
    }

    function getdiamonds($page = 1, $rp = 10, $sortname = 'lot', $sortorder = 'desc', $query = '', $qtype = 'lot', $oid = '', $table = 'products') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . $table . ' where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT    	lot FROM  ' . $this->config->item('table_perfix') . $table . ' where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }

    function syncronizerapnet() {
        $ret = array();
        $ret['error'] = '';
        $ret['success'] = '';
        $r = $this->db->query('DROP TABLE IF EXISTS ' . $this->config->item('table_perfix') . 'products');
        $r = $this->db->query('create TABLE IF NOT EXISTS ' . $this->config->item('table_perfix') . 'products as select * from ' . $this->config->item('table_perfix') . 'helix_products');
        if ($r)
            $ret['success'] = '<table width="100%" align="center"><tr><td width = "60"><img src="' . config_item('base_url') . '/images/ok.jpg"></td><td>Transection Success</td></tr>  </table>';
        else
            $ret['error'] = '<table width="100%" align="center"><tr><td width = "60"><img src="' . config_item('base_url') . '/images/error.gif"></td><td>ERROR !! </td></tr>  </table>';
        return $ret;
    }

    function diamondscountbysellerswithshape() {
        $qry = "SELECT count(*) as total, owner,shape FROM " . config_item('table_perfix') . "products group by owner,shape order by owner,shape";
        $result = $this->db->query($qry);
        return $result->result_array();
    }

    function diamondscountbysellers() {
        $qry = "SELECT count(*) as total, owner,shape FROM " . config_item('table_perfix') . "products group by owner order by owner";
        $result = $this->db->query($qry);
        return $result->result_array();
    }

    function getminmaxForShape($shape = 'B', $filed = 'color', $isminmax = false) {
        if (!$isminmax)
            $qry = "SELECT " . $filed . " as fields FROM " . config_item('table_perfix') . "products where shape = '" . $shape . "' group by $filed order by $filed";
        else {
            $qry = "SELECT MIN(" . $filed . "1) as min, MAX(" . $filed . "2) as max FROM " . config_item('table_perfix') . "pricescopebasic where shape = '" . $shape . "'";
        }
        $result = $this->db->query($qry);
        return $result->result_array();
    }
	function updatemymode($mode)
	{
		 $qry = "UPDATE ".$this->config->item('table_perfix') . "transaction_mode SET webmode='".$mode."'";
		$result = $this->db->query($qry);
	}
	function getpaymentmode()
	{
		$results = array();
		$select = "SELECT * FROM ".$this->config->item('table_perfix') . "transaction_mode";
		$result = $this->db->query($select);
		$row = $result->row();
		return $row;
	}
    function orders($post, $action = 'view', $id = 0) {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = rtrim($_POST['items'], ",");
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "orderdetails WHERE orderid IN (select id FROM " . $this->config->item('table_perfix') . "order WHERE id IN($items))";
            $result = $this->db->query($sql);

            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "order WHERE id IN ($items)";
            $result = $this->db->query($sql);


            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        }




        return $retuen;
    }

    function getPriceScopeStructure($orderby = 'id') {
        $qry = "SELECT * FROM " . config_item('table_perfix') . "pricescopest order by " . $orderby;
        $result = $this->db->query($qry);
        return $result->result_array();
    }

    function savePriceScopeStructure($post) {
        $ret = array();
        $ret['error'] = '';
        $ret['success'] = '';

        $stack = array();
        for ($i = 0; $i < $post['totalrows']; $i++) {
            if (isset($post['isexport' . $i])) {
                array_push($stack, $post['exportorder' . $i]);
            }
        }

        $stack2 = array_unique($stack);

        if (sizeof($stack) != sizeof($stack2)) {
            $ret['error'] = '<table width="100%" align="center"><tr><td width = "60"><img src="' . config_item('base_url') . '/images/error.gif"></td><td>ERROR !! Export Order Must be Unique</td></tr>  </table>';
        } else {
            for ($i = 0; $i < $post['totalrows']; $i++) {
                if (isset($post['isexport' . $i])) {
                    $this->db->where('id', $i + 1);
                    $t = $this->db->update($this->config->item('table_perfix') . 'pricescopest', array('isexport' => '1', 'exportorder' => $post['exportorder' . $i], 'exportname' => $post['exportname' . $i]));
                    if (!$t)
                        $ret['error'] .= '<br>ERROR !';
                }else {
                    $this->db->where('id', $i + 1);
                    $t = $this->db->update($this->config->item('table_perfix') . 'pricescopest', array('isexport' => '0', 'exportorder' => '', 'exportname' => ''));
                    if (!$t)
                        $ret['error'] .= '<br>ERROR !';
                }
            }

            if ($ret['error'] == '')
                $ret['success'] = '<table width="100%" align="center"><tr><td width = "60"><img src="' . config_item('base_url') . '/images/ok.jpg"></td><td>Price Scope Structure has been saved</td></tr>  </table>';
            else
                $ret['error'] = '<table width="100%" align="center"><tr><td width = "60"><img src="' . config_item('base_url') . '/images/error.gif"></td><td>ERROR !! </td></tr>  </table>';
        }
        return $ret;
    }

    function getPriceScopeCSV($qry = 'id', $where = '') {
        $where = ($where == '') ? '1  = 0' : $where;
        $qry = "SELECT " . $qry . " FROM " . config_item('table_perfix') . "products where " . $where;
        $result = $this->db->query($qry);
        return $result->result_array();
    }

    function savePriceScopeBasic($query = '') {
        if ($query != '') {
            $result = $this->db->query($query);
        }
    }

    function PricescopeExport($shape = 'B') {
        $qry = "SELECT * FROM " . config_item('table_perfix') . "pricescopebasic where shape = '" . $shape . "'";
        $result = $this->db->query($qry);
        return $result->result_array();
    }

    function gettemplate($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {

        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'templates where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'templates  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        $results['result'] = $result->result_array();

        return $results;
    }

    function getaddedittemplate($action = 'view', $post = array(), $id = '') {
        if ($action == 'get' && $id != '') {
            $qry = "SELECT * FROM " . config_item('table_perfix') . "templates
                                WHERE id = '" . $id . "'
                                ";
            $return = $this->db->query($qry);
            $result = $return->result_array();
            return isset($result[0]) ? $result[0] : false;
        }
    }

    /*    Shahadat */

    function orderdetails($orderid) {
        /*
          $sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'order where 1=1 and id='.$orderid;
          ///var_dump($sql);
          $result = $this->db->query($sql);
          $results['order']  = $result->result_array();
          return $results;
         */
        $this->db->select('*');
        $this->db->from($this->config->item('table_perfix') . 'order');
        $this->db->join($this->config->item('table_perfix') . 'orderdetails', $this->config->item('table_perfix') . 'order.id= ' . $this->config->item('table_perfix') . 'orderdetails.orderid  where ' . $this->config->item('table_perfix') . 'order.id=' . $orderid);
        // WHERE id = $id ... goes here somehow...
        //$this->db->where($this->config->item('table_perfix').'order.id='.$orderid);
        $result = $this->db->get();
        return $result->result_array();
    }

    function orderinfo($orderid) {

        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'order where 1=1 and id=' . $orderid;
        ///var_dump($sql);
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getShippingInfo($orderid, $customerid) {
    
    
    	/*$qry = "SELECT *
    
    	FROM ".$this->config->item('table_perfix')."shippinginfo
    
    	WHERE orderid = '".$order[0]['id']."' AND customerid = '".$order[0]['customerid']."' order by id GROUP BY orderid, customerid"; */
    
    	$qry = "SELECT *
				FROM ".$this->config->item('table_perfix')."shippinginfo
				WHERE orderid = '".$orderid."' AND customerid = '".$customerid."' order by id desc LIMIT 0, 1";
    
    	$result = $this->db->query($qry);
    	$shippinginfo = $result->result_array();
    	return isset($shippinginfo[0]) ? $shippinginfo[0] : false;
    
    
    
    }
    function getCustomerByID($customerid) {
        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'customerinfo where 1=1 and id=' . $customerid;
        //var_dump($sql);
        $result = $this->db->query($sql);

        return $result->result_array();
    }

    function getShippingByID($orderid) {
        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'shippinginfo where 1=1 and orderid=' . $orderid;
        //var_dump($sql);
        $result = $this->db->query($sql);

        return $result->result_array();
    }

    function getProductByLot($lotnumber) {
        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'products where 1=1 and lot=' . $lotnumber;
        //var_dump($sql);
        $result = $this->db->query($sql);

        return $result->result_array();
    }

    /**/

    function uploadCSVFile() {
        $file = config_item('base_url') . "rings.csv";
        $qry = "LOAD DATA INFILE " . $file . "
             INTO TABLE " . config_item('table_perfix') . "jewelries
                         FIELDS TERMINATED BY ','
                         OPTIONALLY ENCLOSED BY '\"\"'
                         LINES TERMINATED BY '\r\n';
                    ";
        $return = $this->db->query($qry);
    }

    function uploadCSVFile2() {
        $file = config_item('base_url') . "rings.csv";
        $fcontents = file($file);
        for ($i = 0; $i < sizeof($fcontents); $i++) {
            $line = trim($fcontents[$i]);
            echo "$line<BR>";
            $arr = explode("\"", $line);
            echo "$arr";
            $qry = "insert into " . config_item('table_perfix') . "jewelries values (" . implode("'", $arr)
                    . ")";
            $this->db->query($qry);
        }
    }

    function downloadCSV() {
        $sql = "SELECT * FROM " . config_item('table_perfix') . "jewelries";
        $values = $this->db->query($sql);
        $result = $values->result_array();
        //print_r($result);
        foreach ($result as $key => $value) {
            foreach ($value as $k => $v) {
                $csv_output .= $v . ", ";
            }
            $csv_output .= "\n";
        }
        file_put_contents(config_item('base_url') . 'csv.csv', $csv_output);
        $filename = $file . "_" . date("Y-m-d_H-i", time());
        header("Content-type: application/vnd.ms-excel");
        header("Content-disposition: csv" . date("Y-m-d") . ".csv");
        header("Content-disposition: filename=" . $filename . ".csv");
        print $csv_output;
        exit;
    }

    function rolex($post, $action = 'view', $id = 0, $imageSmall = '', $imageBig = '') {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $_POST['items'];
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $itemDetail = $this->getAllByWatchID($value);
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "watches WHERE productID = $value";
                    $result = $this->db->query($sql);
                    if ($itemDetail['ebayid'] != '' && $itemDetail['ebayid'] != 0) {
                        $status = $this->endFixedPriceBid($itemDetail['ebayid']);
                    }
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {

            if (is_array($post)) {
                $name = isset($post['name']) ? $post['name'] : 0;
                $price = isset($post['price']) ? $post['price'] : 0;

                $lowest_price = isset($post['lowest_price']) ? $post['lowest_price'] : 0;
                $highest_price = isset($post['highest_price']) ? $post['highest_price'] : 0;
                $retail_price = isset($post['retail_price']) ? $post['retail_price'] : 0;


                $case_diameter = isset($post['case_diameter']) ? $post['case_diameter'] : '';
                $clasp = isset($post['clasp']) ? $post['clasp'] : '';
                $part = isset($post['part']) ? $post['part'] : '';
                $band_length = isset($post['band_length']) ? $post['band_length'] : '';
                $band_color = isset($post['band_color']) ? $post['band_color'] : '';

                $uprice = isset($post['uprice']) ? $post['uprice'] : '';
                $model_number = isset($post['model_number']) ? $post['model_number'] : '';
                $tempbrand = isset($post['brand']) ? $post['brand'] : '';
                $gender = isset($post['gender']) ? $post['gender'] : '';
                $metal = isset($post['metal']) ? $post['metal'] : '';
                $qty = isset($post['qty']) ? $post['qty'] : '';
                $upc = isset($post['upc']) ? $post['upc'] : '';
                //$finger_size   	= isset($post['finger_size']) 	? $post['finger_size'] : '';
                $sku = isset($post['sku']) ? $post['sku'] : '';
                $description = isset($post['description']) ? $post['description'] : '';
                $small_img = isset($post['small_image']) ? $post['small_image'] : '';
                $big_image = isset($post['big_image']) ? $post['big_image'] : '';
                $style = isset($post['style']) ? $post['style'] : '';
                $amazon_chk = isset($post['amazon_chk']) ? $post['amazon_chk'] : '0';
                $ebay_chk = isset($post['ebay_chk']) ? $post['ebay_chk'] : '0';
                $website_chk = isset($post['website_chk']) ? $post['website_chk'] : '0';
                $amazonca_chk = isset($post['amazonca_chk']) ? $post['amazonca_chk'] : '0';
                $amazon_ca_price = isset($post['amazon_ca_price']) ? $post['amazon_ca_price'] : '0';
                $amazon_ca_id = isset($post['amazon_ca_id']) ? $post['amazon_ca_id'] : '0';
                $ca_id_type = isset($post['ca_id_type']) ? $post['ca_id_type'] : '0';
                $apprisal = isset($post['apprisal']) ? $post['apprisal'] : '0';
                if ($tempbrand == '-1') {
                    $brand = $post['otherbrandname'];
                } else {
                    $brand = $tempbrand;
                }

                $image5 = isset($post['image5']) ? $post['image5'] : '';
                $image6 = isset($post['image6']) ? $post['image6'] : '';
                $condition = isset($post['condition']) ? $post['condition'] : 'new';
                $warranty = isset($post['warranty']) ? $post['warranty'] : '';
                $papers = isset($post['papers']) ? $post['papers'] : '';
                $box = isset($post['box']) ? $post['box'] : '';
                $lugwidth = isset($post['lugwidth']) ? $post['lugwidth'] : '';
                $thickness = isset($post['thickness']) ? $post['thickness'] : '';
                $height = isset($post['height']) ? $post['height'] : '';
                $width = isset($post['width']) ? $post['width'] : '';
                $movement = isset($post['movement']) ? $post['movement'] : '';
                $calibre = isset($post['calibre']) ? $post['calibre'] : '';
                $crystal = isset($post['crystal']) ? $post['crystal'] : '';
                $features = isset($post['features']) ? $post['features'] : '';
                $bezel = isset($post['bezel']) ? $post['bezel'] : '';
                $markers = isset($post['markers']) ? $post['markers'] : '';
                $hands = isset($post['hands']) ? $post['hands'] : '';
                $dial = isset($post['dial']) ? $post['dial'] : '';
                $band = isset($post['band']) ? $post['band'] : '';
                $id_type = isset($post['id_type']) ? $post['id_type'] : '';
                $highest_amazon_price = isset($post['highest_amazon_price']) ? $post['highest_amazon_price'] : '';
                $per_dis_amt = isset($post['per_dis_amt']) ? $post['per_dis_amt'] : '';

                $diamond = isset($post['diamomd']) ? $post['diamomd'] : '';
                $diamond_width = isset($post['diamond_width']) ? $post['diamond_width'] : '';
                $ebay_upload_type = isset($post['ebay_upload_type']) ? $post['ebay_upload_type'] : '';


                $asin_price = isset($post['asin_price']) ? $post['asin_price'] : '';

                if ($action == 'add') {
                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'watches', array(
                        'productName' => $name,
                        'productDescription' => $description,
                        'price1' => $price,
                        'price2' => $uprice,
                        'lowest_price' => $lowest_price,
                        'highest_price' => $highest_price,
                        'retail_price' => $retail_price,
                        'condition' => $condition,
                        'SKU' => $sku,
                        'metal' => $metal,
                        'qty' => $qty,
                        'upc' => $upc,
                        'style' => $style,
                        'gender' => $gender,
                        'model_number' => $model_number,
                        'brand' => $brand,
                        'band' => $band,
                        'dial' => $dial,
                        'hands' => $hands,
                        'markers' => $markers,
                        'bezel' => $bezel,
                        'features' => $features,
                        'crystal' => $crystal,
                        'movement' => $movement,
                        'calibre' => $calibre,
                        'width' => $width,
                        'height' => $height,
                        'thickness' => $thickness,
                        'lugwidth' => $lugwidth,
                        'box' => $box,
                        'papers' => $papers,
                        'warranty' => $warranty,
                        'image5' => $image5,
                        'case_diameter' => $case_diameter,
                        'image6' => $image6,
                        'clasp' => $clasp,
                        'part' => $part,
                        'band_length' => $band_length,
                        'band_color' => $band_color,
                        'id_type' => $id_type,
                        'highest_amazon_price' => $highest_amazon_price,
                        'is_amaz_uploaded' => '0',
                        'per_dis_amt' => $per_dis_amt,
                        'diamond' => $diamond,
                        'diamond_width' => $diamond_width,
                        'ebay_upload_type' => $ebay_upload_type,
                        'on_amzon' => $amazon_chk,
                        'on_ebay' => $ebay_chk,
                        'on_website' => $website_chk,
                        'on_amazon_ca' => $amazonca_chk,
                        'amazon_ca_price' => $amazon_ca_price,
                        'amazon_ca_id' => $amazon_ca_id,
                        'ca_id_type' => $ca_id_type,
                        'apprisal' => $apprisal,
                            ));
                    $rid = $this->db->insert_id();
                }
                if ($action == 'edit') {

                    $rid = $id;
                    $this->db->where('productID', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'watches', array(
                        'productName' => $name,
                        'productDescription' => $description,
                        'price1' => $price,
                        'price2' => $uprice,
                        'lowest_price' => $lowest_price,
                        'highest_price' => $highest_price,
                        'retail_price' => $retail_price,
                        'condition' => $condition,
                        'qty' => $qty,
                        'upc' => $upc,
                        'SKU' => $sku,
                        'metal' => $metal,
                        'style' => $style,
                        'gender' => $gender,
                        'brand' => $brand,
                        'model_number' => $model_number,
                        'band' => $band,
                        'dial' => $dial,
                        'hands' => $hands,
                        'markers' => $markers,
                        'bezel' => $bezel,
                        'features' => $features,
                        'crystal' => $crystal,
                        'movement' => $movement,
                        'calibre' => $calibre,
                        'width' => $width,
                        'height' => $height,
                        'thickness' => $thickness,
                        'lugwidth' => $lugwidth,
                        'box' => $box,
                        'papers' => $papers,
                        'warranty' => $warranty,
                        'is_upload' => '0',
                        'is_amaz_uploaded' => '0',
                        'per_dis_amt' => $per_dis_amt,
                        'image5' => $image5,
                        'image6' => $image6,
                        'case_diameter' => $case_diameter,
                        'clasp' => $clasp,
                        'part' => $part,
                        'band_length' => $band_length,
                        'band_color' => $band_color,
                        'id_type' => $id_type,
                        'highest_amazon_price' => $highest_amazon_price,
                        'is_amaz_uploaded' => '0',
                        'diamond' => $post['diamomd'],
                        'diamond_width' => $post['diamond_width'],
                        'ebay_upload_type' => $post['ebay_upload_type'],
                        'on_amzon' => $amazon_chk,
                        'on_ebay' => $ebay_chk,
                        'on_website' => $website_chk,
                        'amazon_ca_price' => $amazon_ca_price,
                        'amazon_ca_id' => $amazon_ca_id,
                        'on_amazon_ca' => $amazonca_chk,
                        'apprisal' => $apprisal,
                            ));
                
				if ($_FILES['watch_image']['name'] != '') {
					$this->uploadfile($_FILES, 'watch_image', 'images/watches', 'jpeg,gif,jpg,bmp,png,swf', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'thumb');
					}
				
				}
				

                if ($_FILES['image_small']['name'] != '')
                    $this->uploadfile($_FILES, 'image_small', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'thumb');


                if ($_FILES['big_image']['name'] != '')
                    $this->uploadfile($_FILES, 'big_image', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'large');

                if ($_FILES['image_small2']['name'] != '')
                    $this->uploadfile($_FILES, 'image_small2', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'image_small2');

                if ($_FILES['big_image2']['name'] != '')
                    $this->uploadfile($_FILES, 'big_image2', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'image_big2');

                if ($_FILES['image5']['name'] != '')
                    $this->uploadfile($_FILES, 'image5', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'image5');

                if ($_FILES['image6']['name'] != '')
                    $this->uploadfile($_FILES, 'image6', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'image6');

                $productArr = $this->getAllByWatchID($rid);
                if ($ebay_chk == '1') {
                    if ($qty < 1) {
                        //    $status = $this->endFixedPriceBid($productArr['ebayid']);
                    } else {
                        /// $this->addWatchtoEbay($productArr);
                    }
                }
                /*
                 * @ Add item on amazon */

                if ($amazon_chk == '1' || $amazonca_chk == '1') {
                    if ($id_type == '1') {
                        $upcid = $upc . "%2C";
                        $upcid .= $upc;
                        $type = 'ASIN';
                    }
                    if ($id_type == '2') {
                        $upcid = $upc . "%2C";
                        $upcid .= $upc;
                        $type = 'ISBN';
                    }
                    if ($id_type == '3') {
                        $upcid = $upc . "%2C";
                        $upcid .= $upc;
                        $type = 'UPC';
                    }
                    if ($id_type == '4') {
                        $upcid = $upc . "%2C";
                        $upcid .= $upc;
                        $type = 'EAN';
                    }
                    $lowestPrice = $lowest_price;
                    if ($per_dis_amt > 0 && !empty($per_dis_amt)) {
                        $lowestPrice = $retail_price - (($retail_price * $per_dis_amt) / 100);
                    }

                    $highestPrice = $highest_price;
                    
                    $not_show = 2;
                    if ($amazon_chk == '1') {
                        //nothing
                    }else if($not_show == 1){
                        
                        // $updatedLowprice = $products['lowprice'];
                        $updatedLowprice = '0.00';
                        include_once(config_item('base_path') . "amazon/Amazon.php");
                        /*
                         * Update Amazon lowest price on website
                         */
    
                        $amazon = new Amazon();
                    
                    
                        if ($type != 'ASIN') {
                            $request = $amazon->itemlookup($upcid, $type);
                            $xml = $amazon->getCurlResponse($request);
                            $data = '';
                            $data = simplexml_load_string($xml);



                            if ($data) {

                                if ($data->Items->Request->Errors->Error->Message) {
                                    $errorMessage = (string) ($data->Items->Request->Errors->Error->Message);
                                }
                                if (!isset($data->Items->Item->Offers->Offer) || empty($data->Items->Item->Offers->Offer)) {
                                    $totalitems = sizeof($data->Items->Item[1]->Offers->Offer);
                                    $start = 1;
                                } else {
                                    $totalitems = sizeof($data->Items->Item->Offers->Offer);
                                    $start = 0;
                                }


                                $LastValue = $totalitems - 1;
                                $list = ($data->Items->Item[$start]->Offers->Offer[$LastValue]);
                                $listprice = trim($list->OfferListing->Price->FormattedPrice[0]);
                                $listprice = substr($listprice, 1);
                                $prices = array();
                                //echo $lowestPrice."-----------".$highestPrice;

                                for ($j = 0; $j < $totalitems; $j++) {
                                    $Amazonlist = ($data->Items->Item[$start]->Offers->Offer[$j]);
                                    if (isset($Amazonlist->OfferListing->SalePrice->FormattedPrice[0]) && !empty($Amazonlist->OfferListing->SalePrice->FormattedPrice[0])) {
                                        $amazonItemprices = trim($Amazonlist->OfferListing->SalePrice->FormattedPrice[0]);
                                        $amazonItemprices = substr($amazonItemprices, 1);
                                    } else {
                                        $amazonItemprices = trim($Amazonlist->OfferListing->Price->FormattedPrice[0]);
                                        $amazonItemprices = substr($amazonItemprices, 1);
                                    }
                                    if (isset($amazonItemprices) && $amazonItemprices > 0) {
                                        /*
                                         * @ Here the logic we need to check the price is between the highest and lowest valeu
                                         * @ Price should be included with shipping costs
                                         */
                                        /*     echo $amazonItemprices;
                                          echo "<br>";
                                          exit;
                                         * 
                                         */

                                        if ($amazonItemprices > $lowestPrice && $amazonItemprices < $highestPrice) {
                                            $updatedLowprice = $amazonItemprices;

                                            // echo 'Our Lowest Item Price:'.$updatedLowprice;
                                            break;
                                        }
                                        //	$prices[] = $amazonItemprices;
                                        if ($data->Items->Item[$start]->OfferSummary->LowestNewPrice->CurrencyCode == 'USD') {
                                            $lowPrice = (string) ($data->Items->Item[$start]->OfferSummary->LowestNewPrice->FormattedPrice);
                                        }
                                    }
                                } // close for loop
//                        echo "<hr>";
//                        echo "LowPrice:". $lowPrice;
//                        echo "<hr>";
//                        echo $updatedLowprice;
//                        exit;

                                $amazon_listed_price = $updatedLowprice - 0.01;
                            }
                        } else {
                            $asin_price = $_POST['price'];
                            $amazon_listed_price = $asin_price;
//$listprice = ''
///$updatedLowprice = '0.00';
                        }


//                                  echo "<hr>";
//                        echo "LowPrice:". $lowPrice;
//                        echo "<hr>";
//                        echo "ada".$updatedLowprice;
//                        exit;

                        if ($updatedLowprice > 0 || $type == 'ASIN') {
                            $qry = "Update dev_watches set `lowprice` = '" . mysql_real_escape_string($updatedLowprice) . "' ,
                        `amazon_listed_price` = '" . mysql_real_escape_string($amazon_listed_price) . "' ,
                        `highest_amazon_price` = '" . mysql_real_escape_string($listprice) . "' ,
                        `price_updated` = '1' where `productID` =  '" . trim($rid) . "'";

                            $this->db->query($qry);
                        }
                        $price = $amazon_listed_price;

                        /*
                         * @ Add Item
                         */

                        if (!empty($brand)) {
                            $vendor_sku = $brand . "-" . $rid;
                        } else {
                            $vendor_sku = "watch-" . $rid;
                        }
                        if ($condition == 'used') {
                            $cond = '2';
                        } else {
                            $cond = '11';
                        }


                        /*
                         * Create csv and upload on amazon
                         */
                        if ($price > 0) {
                            $filePath = config_item('base_path') . "amazon/price_qty_upc.txt";
                            $fp = fopen($filePath, "w");
                            $fileText = "product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
                            fwrite($fp, $fileText);
                            $fileText = "\n" . trim($upc) . "\t";
                            $fileText .=trim($id_type) . "\t";
                            //$fileText .="11\t";
                            $fileText .=trim($cond) . "\t";
                            $fileText .=trim($price) . "\t";
                            $fileText .=trim($vendor_sku) . "\t";
                            $fileText .=trim($qty) . "\t";
                            $fileText .="a\t";
                            $fileText .="n\t";
                            $fileText .="y\t";
                            $fileText .="This watch is Brand NEW!!!!!!!!!. Factory Authorized Dealer 100% New In Box Customer Satisfaction Guaranteed or Money Back. Shop With Confidence.In Stock Same Day Shipping.\t";
                            fwrite($fp, $fileText);

                            fclose($fp);
                            // $batchID = simplexml_load_string($amazon->AmazonListing($filePath,'com'));

                            $this->db->insert('upload_report', array(
                                'batchID' => trim($batchID),
                                'status' => 'open',
                                'dateofmodification' => date('Y-m-d H:i:s'),
                            ));
                        }
                        /*
                         * # End Amazon integration
                         * 
                         */
                    }
                    
                    


                    /*
                     * End csv upload code
                     */
                }

                if ($isinsert)
                    $retuen['success'] .= 'Watch Details has been ' . ucfirst($action) . 'ed successfully. ';
            }
        }
        return $retuen;
    }

    function getAllByWatchID($pid) {
        $qry = "SELECT * FROM " . config_item('table_perfix') . "watches
                                WHERE productID = '" . $pid . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }
	
	///// get comments list	
	function getSubscriberList($page = 1, $rp = 100, $sortname = 'id', $sortorder = 'desc', $query = '', $qtype = 'first_name') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";
        $qwhere = "";
		
        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'emailsubs ' . $qwhere . ' ' . $sort . ' ' . $limit;
    
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'emailsubs where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }
	///// get comments list	
	function getComentsList($page = 1, $rp = 100, $sortname = 'id', $sortorder = 'desc', $query = '', $qtype = 'full_name') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        // $rp=100;
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        /*if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";*/


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'comments ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'comments where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }
	
	///// get comments list	
	function getCustomDesignList($page = 1, $rp = 100, $sortname = 'id', $sortorder = 'desc', $query = '', $qtype = 'full_name') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        // $rp=100;
        $limit = "LIMIT $start, $rp";
        $qwhere = "";

        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'custom_designs ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'custom_designs where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }
	
	//// manipulate comments list
	function manipulateComents($data, $action, $id) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $data['items'];
            $itemsArr = explode(',', $items);
            foreach ($itemsArr as $index => $value) {
                if ($value != '') {
                    // $itemDetail = $this->getAllByWatchID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM dev_comments WHERE id = $value ";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($data['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            if (is_array($data)) {
                if ($action == 'add') {
                    $isinsert = $this->db->insert('dev_comments', array(
                        'post_comments' => $data['coment_content'],
						   'status' => $data['cmb_status']
                            ));

                    $rid = $this->db->insert_id();
                } else {

                    $rid = $id;
                    $this->db->where('id', $id);
                   $isinsert = $this->db->update('dev_comments', array(
                           'post_comments' => $data['coment_content'],
						   'status' => $data['cmb_status']
                                ));
                }
            }
            $retuen['success'] .= 'Comments has been ' . ucfirst($action) . 'ed successfully';
        }

        return $retuen;
    }
	
	//////// manipulate custom design requests
	//// manipulate comments list
	function manipulateCustomRequest($data, $action, $id) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') 
		{
			$designPath = SITE_URL.'uploads/';
            $items = $data['items'];
            $itemsArr = explode(',', $items);
            foreach ($itemsArr as $index => $value) {
                if ($value != '') {
					$rowdt = $this->getCustomDetail($value);
					$cs_design1 = $designPath.$rowdt->design_img1;
					$cs_design2 = $designPath.$rowdt->design_img2;
					$cs_design3 = $designPath.$rowdt->design_img3;
					
					if(getimagesize($cs_design1)) {
						unlink($cs_design1);
					}
					if(getimagesize($cs_design2)) {
						unlink($cs_design2);
					}
					if(getimagesize($cs_design3)) {
						unlink($cs_design3);
					}
			
                    $sql = "DELETE FROM dev_custom_designs WHERE id = $value ";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($data['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            if (is_array($data)) {
                if ($action == 'add') {
                    $isinsert = $this->db->insert('dev_custom_designs', array(
                        'style_number' => $data['coment_content'],
						   'metal_requested' => $data['cmb_status']
                            ));

                    $rid = $this->db->insert_id();
                } else {

                    $rid = $id;
                    $this->db->where('id', $id);
                   $isinsert = $this->db->update('dev_custom_designs', array(
                           'style_number' => $data['coment_content'],
						   'metal_requested' => $data['cmb_status']
                                ));
                }
            }
            $retuen['success'] .= 'Custom Design Request has been ' . ucfirst($action) . 'ed successfully';
        }

        return $retuen;
    }
	
	//// get custom design detail
	function getCustomDetail($id) {
		
		$sql = "SELECT * FROM ".$this->config->item('table_perfix')."custom_designs WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		$row   = $query->row();
		
		return $row;
		
	}
	
	//// manipulate subscriber list
	function manipulateSubscribers($data, $action, $id) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $data['items'];
            $itemsArr = explode(',', $items);
            foreach ($itemsArr as $index => $value) {
                if ($value != '') {
                    $sql = "DELETE FROM dev_emailsubs WHERE id = $value ";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($data['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            if (is_array($data)) {
                if ($action == 'add') {
                    $isinsert = $this->db->insert('dev_emailsubs', array(
                        'first_name' => '',
						 'last_name' => ''
                            ));

                    $rid = $this->db->insert_id();
                } else {

                    $rid = $id;
                    $this->db->where('id', $id);
                   $isinsert = $this->db->update('dev_emailsubs', array(
                           'first_name' => '',
						   'last_name' => ''
                                ));
                }
            }
            $retuen['success'] .= 'Subscriber has been ' . ucfirst($action) . 'ed successfully';
        }

        return $retuen;
    }
	/// get brand by ID
	function getCommentsByID($id='') {
		$qry = "SELECT * FROM " . config_item('table_perfix') . "comments WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return $result[0];
	}
	/// get subscriber by id
	function getSubscriberByID($id='') 
	{
		if( !empty($id) )
		{
			$qry = "SELECT * FROM " . config_item('table_perfix') . "emailsubs WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
			$return = $this->db->query($qry);
			$result = $return->result_array();
			return $result[0];	
		} else {
			return false;	
		}
		
	}
	/// get emails list
	function getEmailsReceivedList($id='', $limit='') {
		$qry = "SELECT * FROM " . config_item('table_perfix') . "emails ORDER BY id DESC";
		/*if( !empty($limit) )
		{
			$qry .= " LIMIT $limit";	
		}*/
	
        $return = $this->db->query($qry);
        $result['results'] = $return->result_array();
		$result['count'] = count($result['results']);
        
		return $result;
	}
	
	/// get emails list
	function getReceivedEmailDetail($id='', $action='') {
		
		if($action == 'delete') {
			$this->db->query("DELETE FROM " . config_item('table_perfix') . "emails WHERE id = '".$id."'");
			return true;
		} else {
			$qry = "SELECT * FROM " . config_item('table_perfix') . "emails WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
			$return = $this->db->query($qry);
			$result = $return->row();
			
			return $result;
		}		
	}
	
	///// save sent email
	function composeSentEmail() {
		$from_email = $this->input->post('from_email', TRUE);
		$email_subject = $this->input->post('email_subject', TRUE);
		$email_message = $this->input->post('email_message', TRUE);
		$email_id = $this->input->post('email_id', TRUE);
		$email_type = $this->input->post('email_type', TRUE);
		
		$sql = "SELECT * FROM  " . $this->config->item('table_perfix') . "emailsent where email_id = '".$email_id."' AND email_type = '".$email_type."'";		
		$result = $this->db->query($sql);
		$results = $result->num_rows();	
		
		if( $results == 0 || $email_id == 0)
		{
			if(isset($from_email) && !empty($from_email)) {
			$isinsert = $this->db->insert($this->config->item('table_perfix') . 'emailsent', 
						array(
						'email_id' => $email_id,
						'email_type' => $email_type,
						'email_adres' => $from_email,
						'email_subject' => $email_subject,
						'email_message' => $email_message,
						'status' => 'S',
						'sent_date' => date('Y-m-d H:i:s'),
						));
						
			//////////// email sent
			$to = $from_email;
			$subject = $email_subject;
			
			$message = '<html>
					<body>
					'.$email_message.'
					</body>
					</html>';
			
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: '.SITES_NAME.'<'.SITE_EMAIL.'>' . "\r\n";
			//$headers .= 'Cc: myboss@example.com' . "\r\n";
			
			mail($to,$subject,$message,$headers);
			
			return 'Email has sent successfully!';
			
			}
		} else {
			return 'Email has already sent to this user';
		}
	}
	
	///// get customer info
	function getCustomerRowView($id='') {
		
		if( !empty($id) )
		{
			$sql = 'SELECT * FROM  ' . $this->config->item('table_perfix') . 'customerinfo where id = ' . $id .' ORDER BY id DESC LIMIT 1';
			$result = $this->db->query($sql);
			$results = $result->result_array();	
			return $results[0];	
		}
		return false;
	}
	///////////////////////////////////////////////
	
    function getWatchBrand() {
        /*       $qry = "SELECT brand 
          FROM " . config_item('table_perfix') . "watches
          Group by brand
          ";
         */
        $qry = "SELECT brand_name FROM " . config_item('table_perfix') . "brands  Group by brand_name";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return $result;
    }

    function getrolex($page = 1, $rp = 100, $sortname = 'lot', $sortorder = 'desc', $query = '', $qtype = 'lot', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        // $rp=100;
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'watches where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT productID FROM  ' . $this->config->item('table_perfix') . 'watches where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }

    function getRolexCategoryID($gender) {

        switch ($gender) {
            case 'men':
                $storeCategoryID = 1027754010;
                break;
            case 'ladies':
                $storeCategoryID = 1027755010;
                break;
            default:
                $storeCategoryID = 1027754010;
                break;
        }
        return $storeCategoryID;
    }

    function addWatchtoEbay($detail, $action = 'Add') {
        switch ($detail['brand']) {
            case'Rolex':
                $catgoryStoreID = $this->getRolexCategoryID($detail['gender']);
                break;
            case'CONCORD':
                $catgoryStoreID = 952190010;
                break;
            case'CHOPARD':
                $catgoryStoreID = 2857141;
                break;
            case'PANERAI':
                $catgoryStoreID = 2857142;
                break;
            case'OMEGA':
                $catgoryStoreID = 5653330;
                break;
            case'ANTIQUE':
                $catgoryStoreID = 5653331;
                break;
            case'FRANCK MULLER':
                $catgoryStoreID = 462196010;
                break;
            case'PATEK PHILIPPE':
                $catgoryStoreID = 462197010;
                break;
            case'IWC':
                $catgoryStoreID = 462198010;
                break;
            default:
                $catgoryStoreID = 952189010;
                break;
        }

        //$priceAfterDiscount = ($detail['price1'] - (($detail['price1'] * $detail['per_dis_amt'])/100));
        $priceAfterDiscount = $detail['price1'];
        $requestArray['listingType'] = 'StoresFixedPrice';
        // 'StoresFixedPrice';
        $requestArray['diamond'] = $detail['diamond'];
        $requestArray['diamond_width'] = $detail['diamond_width'];
        $requestArray['ebay_upload_type'] = $detail['ebay_upload_type'];

        $requestArray['storeCategoryID'] = '3103634018';  //'3237127018';
        $requestArray['primaryCategory'] = '31387';

        $metalarray = array('gold_ss' => 'SS & Gold', 'ss' => 'SS', 'gold' => 'Gold');
        $requestArray['itemTitle'] = $detail['productName'];
        //.' '.ucfirst($detail['brand']).' '.$detail['productName'].' '.$metalarray[$detail['metal']].' '.ucfirst($detail['style']);
        $requestArray['productID'] = $detail['productID'];
        $watchdetails = '<link href="http://diamondsforlife.info/ebaystore/tmp.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE]>
<link href="http://diamondsforlife.info/ebaystore/tmp_iefix.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<table cellpadding="0" cellspacing="0" align="center" class="pagewidth2">
  <tr>
    <td align="center"><table cellpadding="0" cellspacing="0" align="center" class="pageminwidth2">
        <tr>
          <td><!-- header start -->
            <map name="Map" id="Map">
              <area shape="rect" coords="1,1,16,12"   />
            </map>
            <table id="HeaderWarp" cellpadding="0" cellspacing="0" align="center" border="0" style="height:103px;">
              <tr>
                <td id="headerLeft" valign="top" align="left"><div id="logoWrap"><a href="http://stores.ebay.com/sugarskarats"><img alt="sugarskarats" title="sugarskarats" src="http://gemnile.com/iimg/logo.png" border="0" style="height:73px;" /></a></div></td>
                <td id="headerRight" valign="top"><div id="phone" align="right" style="color:white;"></div></td>
              </tr>
            </table>
            <table id="topnavg" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="topnavgl"><div id="topnavlinks"><a href="http://stores.ebay.com/sugarskarats">Diamonds</a> <a href="#">Diamonds Jewelry</a><a href="#">Jewelry</a> <a href="#">Watches</a></div></td>
                <td id="topnavgr" align="left"><div id="searchWrap">
                    <form style="display:inline;" name="search" method="get" action="http://search.stores.ebay.com/search/search.dll?GetResult">
                      <table cellpadding="0" cellspacing="0" align="left" border="0">
                        <tr>
                          <td align="left" width="200"><input class="srField" type="text" name="query" size="25" maxlength="300" value="Enter keywords here..." onFocus="if (this.value == \'Enter keywords here...\') this.value = \'\';" />
                            <input type="hidden" name="sid" value="126131195" />
                            <input type="hidden" name="store" value="sugarkarats" />
                            <input type="hidden" name="colorid" value="-1" />
                            <input type="hidden" name="fp" value="0" />
                            <input type="hidden" name="st" value="1" />
                            <input type="hidden" name="fsoo" value="1" />
                            <input type="hidden" name="fsop" value="1" /></td>
                          <td align="right" width="33"><div id="searchbutton">
                              <input type="image" src="http://diamondsforlife.info/ebaystore/search.gif" value="Search" align="right" alt="Search" title="Search" />
                            </div></td>
                        </tr>
                      </table>
                    </form>
                  </div></td>
              </tr>
            </table>
            <!-- header end -->
            <!-- landing page start -->
            <table id="homePage" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td valign="top" align="left" id="leftcolumn"><div class="lefttitles"><img alt="Browse by Category" title="Browse by Category" src="http://diamondsforlife.info/ebaystore/title_cats.gif" /></div>
                  <div class="menu">
                    <ul>
					 <li><a class="hide" href="http://stores.ebay.com/Gemnile/Watches1-/_i.html?_fsub=3237127018&_lns=1&_sid=1044403878&_trksid=p4634.c0.m322">Watches</a></li>

 					 <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292663018">Women\'s Rings</a></li>
					  <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292691018">Women\'s Chains</a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292603018">Women\'s Diamond pendants </a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292605018">Women\'s necklaces</a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292607018">Women\'s bracelets</a></li>
                        <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292601018">Women\'s Earrings</a></li>
					 <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292663018">Men\'s Rings</a></li>
					  <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3291875018">Men\'s Chains</a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292498018">Men\'s Diamond pendants </a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292605018">Men\'s necklaces</a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292607018">Men\'s bracelets</a></li>
                        <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292601018">Men\'s Earrings</a></li>
                       <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292598018">Gemstones</a></li>
                       <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292598018">Sterling Silver</a></li>
						<li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292663018">Stainless Steel Pendants</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/Gemnile" style="background-image:none; margin-bottom:1px;">View All Products</a></li>
                    </ul>
                  </div>
<!--
				  <div class="lefttitles"><img alt="Certified Diamond Jewelry" title="Certified Diamond Jewelry" src="http://diamondsforlife.info/ebaystore/title_certified.gif" /></div>
                  <div id="AdvSearch" align="center">
                    <form name="custsearch" method="get" id="form2" action="http://search.stores.ebay.com/search/search.dll?GetResult">
                      <input type="hidden" name="srchdesc" value="n" />
                      <input type="hidden" name="sid" value="126131195" />
                      <input type="hidden" name="store" value="Gemnile" />
                      <input type="hidden" name="colorid" value="0" />
                      <input type="hidden" name="st" value="1" />
                      <input type="hidden" name="query" />
                      <select name="carti" class="drop_downs_text" size="1" onChange="keysr()">
                        <option value="" disabled="disabled" selected="selected">Select Certificate</option>
                        <option value="GIA">GIA Certificate</option>
                        <option value="EGL">EGL Certificate</option>
                        <option value="Diamond -(GIA, EGL)">Certified Jewelry</option>
                      </select>
                      <select name="categ" class="drop_downs_text" size="1" onClick="keysr()">
                        <option value="" disabled="disabled" selected="selected">Select Category</option>
                        <option value="Engagement Ring*">Diamond Engagement Rings</option>
                        <option value="Three-Stone Ring*">Three-Stone Engagement Rings</option>
                        <option value="Ring Accent*">Engagement Rings with Accents</option>
                        <option value="Loose Diamond*">Loose Diamonds</option>
                        <option value="Earrings">Diamond Earrings</option>
                        <option value="Pendant*">Diamond Pendants</option>
                        <option value="Bracelet*">Diamond Bracelets</option>
                      </select>
                      <select name="cut" class="drop_downs_text" size="1" onClick="keysr()">
                        <option value="" disabled="disabled" selected="selected">Select Diamond Cut</option>
                        <option value="Asscher">Asscher Cut</option>
                        <option value="Baguette">Baguette Cut</option>
                        <option value="Cushion">Cushion Cut</option>
                        <option value="Emerald">Emerald Cut</option>
                        <option value="Heart">Heart Cut</option>
                        <option value="Marquise">Marquise Cut</option>
                        <option value="Oval">Oval Cut</option>
                        <option value="Pear">Pear Cut</option>
                        <option value="Princess -(Round)">Princess Cut</option>
                        <option value="Radiant">Radiant Cut</option>
                        <option value="Round -(Princess)">Round Cut</option>
                        <option value="Triangle">Triangle Cut</option>
                      </select>
                      <div class="advsearchbutton">
                        <input type="image" src="http://gemnile.com/new_design/ebay/new/images/mywatchdepot-button.jpg" alt="Search Entire Store" title="Search Entire Store" value="Search Entire Store" name="submit" id="sbmit">
                      </div>
                    </form>
                    <script type="text/jaevascript">
function keysr() {
document.custsearch.query.value =  document.custsearch.carti.value + " "  + document.custsearch.categ.value + " "  + document.custsearch.cut.value;}
</script>
                  </div>
-->
                  
                  </td>
                  
                <td align="right" valign="top" id="middlecontent"><div class="content_Box1">
                    <div class="PrTitle" align="center"><span class="PrTitle2">' . $detail['productName'] . '!</span></div>
                    <div style="clear:both;"></div>
                    <div class="content_Box2">
                      <div id="MainPhoto"><img src="' . config_item('base_url') . $detail['thumb'] . '" border="0" align="middle" alt="" name="rollimg"   /></div>
                        <div id="ThumbsProd" align="left">';

        if ($detail['thumb'] != '') {
            // $destFile = $detail['thumb'];
            $destFile = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['thumb'] . "&h=365&w=365&zc=1";
            $destFile1 = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['thumb'] . "&h=62&w=62&zc=1";
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $destFile . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $destFile1 . '" border="0" alt="" />
                        </a>';
        }
        if ($detail['large'] != '') {
            // $destFile = $detail['large'];
            $destFile = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['large'] . "&h=365&w=365&zc=1";
            $destFile1 = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['large'] . "&h=62&w=62&zc=1";
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $destFile . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $destFile1 . '" border="0" alt="" />
                        </a>';
        }

        if ($detail['image_small2'] != '') {
            // $destFile = $detail['image_small2'];
            $destFile = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['image_small2'] . "&h=365&w=365&zc=1";
            $destFile1 = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['image_small2'] . "&h=62&w=62&zc=1";
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $destFile . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $destFile . '" border="0" alt="" />
                        </a>';
        }

        if ($detail['image_big2'] != '') {
            // $destFile = $detail['image_big2'];
            $destFile = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['image_big2'] . "&h=365&w=365&zc=1";
            $destFile1 = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['image_big2'] . "&h=62&w=62&zc=1";
            //      $destFile = config_item('base_url')."/scripts/timthumb.php?src=".$detail['image_small2']."&h=365&w=365&zc=1";                        
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $destFile . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $destFile1 . '" border="0" alt="" />
                        </a>';
        }

        if ($detail['image5'] != '') {
            //	$destFile = $detail['image5'];
            $destFile = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['image5'] . "&h=365&w=365&zc=1";
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $destFile . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $destFile . '" border="0" alt="" />
                        </a>';
        }

        if ($detail['image6'] != '') {
            // $destFile = $detail['image5'];
            $destFile = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['image6'] . "&h=365&w=365&zc=1";
            $destFile1 = config_item('base_url') . "/scripts/timthumb.php?src=" . $detail['image6'] . "&h=62&w=62&zc=1";
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $destFile . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $destFile1 . '" border="0" alt="" />
                        </a>';
        }
        if (trim($detail['metal']) == 'ss') {
            $metal = 'Stainless Steel';
        } else {
            $metal = $detail['metal'];
        }
        $watchdetails.= '</div>
               
                    </div>
         

                    <div class="content_Box3">
                      <table class="product_data_wrap" border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td class="settTitle">Watch Specifications:</td>
                        </tr>
                        <tr>
                          <td align="center">
                           <table border="0" class="product_data" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                             <td class="chartleft wborder tborder">Style</td>
                             <td class="chartright wborder tborder">' . $detail['style'] . '&nbsp;Certified!!!</td>
                             </tr>
                             
                            <tr>
                             <td class="chartleft wborder tborder">Gender</td>
                             <td class="chartright wborder tborder">' . $detail['gender'] . '</td>
                             </tr>
                              
                              <tr>
                             <td class="chartleft wborder">Metal</td>
                             <td class="chartright wborder"><span style="text-decoration: none;">' . $metal . '</span></td>
                             
                             </tr>
                             
                              <tr>
                             <td class="chartleft wborder">Model Number</td>
                             <td class="chartright wborder">' . $detail['model_number'] . '</td>
                             </tr>
  
                              <tr>
                             <td class="chartleft">Brand:</td>
                             <td class="chartright">' . $detail['brand'] . '</td>
                             </tr>

                              <tr>
                             <td class="chartleft">Band:</td>
                             <td class="chartright">' . $detail['band'] . '</td>
                             </tr>

                              <tr>
                             <td class="chartleft">Dial:</td>
                             <td class="chartright">' . $detail['dial'] . '&nbsp;</td>
                             </tr>


                              <tr>
                             <td class="chartleft">Movement:</td>
                             <td class="chartright">' . $detail['movement'] . '&nbsp;</td>
                             </tr>

                              <tr>
                             <td class="chartleft">Case Diameter:</td>
                             <td class="chartright">' . $detail['case_diameter'] . '&nbsp;</td>
                             </tr>

                              <tr>
                             <td class="chartleft">Clasp:</td>
                             <td class="chartright">' . $detail['clasp'] . '</td>
                             </tr>

                              <tr>
                             <td class="chartleft">Part:</td>
                             <td class="chartright">"' . $detail['part'] . '"</td>
                             </tr>

                              <tr>
                             <td class="chartleft">Band length:</td>
                             <td class="chartright">' . $detail['band_length'] . '</td>
                             </tr>
                             
                             <tr>
                             <td class="chartleft">Band Color:</td>
                             <td class="chartright">' . $detail['band_color'] . '</td>
                             </tr>
                             
                              <tr>
                             <td class="chartleft">Retail Value:</td>
                             <td class="chartright">$' . number_format($detail['retail_price'], 2) . '</td>
                             </tr>
                             
                              <tr>
                             <td class="chartleft">Appraisal Value:</td>
                             <td class="chartright" style="text-decoration: line-through;">$' . ($detail['apprisal']) . '</td>
                             </tr>
                             
                               <tr>
                             <td class="chartleft">Our Price:</td>
                             <td class="chartright" style="color: rgb(204, 0, 0); font-weight: bold;">$' . number_format($detail['price1'], 2) . '</td>
                             </tr>
                             
                             
                        <tr>
                          <td colspan="2"><img alt="" src="http://diamondsforlife.info/ebaystore/settings_bottom1.gif"></td>
                        </tr>
                            </table>

                         </td>  
                      </tr>                        
                      </table>
                    </div>';
        $watchdetails.= "<div style='margin-top:5px;padding:10px 10px 20pxcolor:#444444;font:12px/19px Arial,Helvetica,sans-serif' align='justify'>" . substr(strip_tags($detail['productDescription']), 0, 800) . '</div>';
        $watchdetails.= '
                    <div style="clear:both;"></div>
                  </div>
                  <!-- policies //start -->
                  <div class="content_Box4">
                    <div class="tabbed_area">
                      <ul class="tabs">
                        <li><a href="javascript:tabSwitch(\'tab_1\', \'content_1\');" id="tab_1" class="active">Appraisal</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_2\', \'content_2\');" id="tab_2">Payment &amp; Shipping</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_3\', \'content_3\');" id="tab_3">Returns</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_4\', \'content_4\');" id="tab_4">Clarity &amp; Color</a></li>
						<li><a href="javascript:tabSwitch(\'tab_5\', \'content_5\');" id="tab_5">Why Gemnile ?</a></li>
                      </ul>

      <div id="content_1" class="content">Certificate of Authenticity (IGS)
We at Diamonds Gemnile have taken the fear factor out of Buying Diamonds online.
To guarantee the reliable quality of this item and give you the ultimate peace of mind and confidence.
Each item purchased will arrive along with IGS certificate which is Independent Gemological Lab located in the Diamonds Market District in Israel.
Every Certificate of Authenticity will contain a detailed grading report, FREE OF CHARGE!
Every certificate includes detailed information about the 4 important characteristics of a diamond (the 4 C\'s): color, cut, clarity and carat weight; a picture of the item (for items sold 4500$ and above) and appraisal value.
By combining the certificate and our full refund policy, this assures buyers are getting the quality that they are paying for.
</div>

<div id="content_2" class="content">
<p><b>Payment &amp; Shipping</b></p>
<p>We accepted Pay pal / Master Cart / Visa / American Express / Discover</p> 
<p><b>Customs</b></p>
<p>We accepted Pay pal / Master Cart / Visa / American Express / Discover</p>
<p>All International Custom fees are the responsibility of all customers who purchases any item from the sugarskarats ebay store.</p>
</div>

<div id="content_3" class="content">Return Policy

IF I\'M NOT SATISFIED CAN I GET MY MONEY BACK?
Even if you are very satisfied you can send the item for FULL REFUND.
We will never ask you why you want to return the item, If you want your money back you get it!! simple as that.
Not satisfied? Satisfied but you actually need the money for more important things? Not a problem! You\'ll get your money back same day as the item received and inspected by us.
We pride ourselves in carrying high quality items and we hope that you will be pleased with your order. We want you to be 100% happy with the products you receive! If you are not satisfied with your purchase call us at 1-800.874.3541 anytime. Our customer support team work 24/7.
We offer a 14 days return policy from the day you receive the item with NO restocking fee. 100% Satisfaction Guaranteed. You will get full refund.
Call us and we will issue a Return Authorization Number (RAN). This number must be marked clearly on the front of the package.
</div>

<div id="content_4" class="content"><p><strong>Clarity &amp; Color</strong><br><br>
Diamond clarity is the gauge of how clear and flawless a gem is. Very few stones are perfectly flawless and most contain at least minor mineral inclusions or tiny cracks. The more visible those flaws are, the less valuable the stone is considered.<br><br>
<b>VVS1/VVS2</b><br>
Rare. Minute inclusions only seen under 10x magnification<br><br>
<b>VS1/VS2</b><br>
Very Slightly included (two grades). Minute inclusions very hard to detect with the naked eye.<br><br>
<b>SI1-SI2</b><br>

Slightly included (three grades). Small inclusions only sometimes visible to the naked eye. Fantastic diamonds.<br><br>
<b>I1-I2</b><br>
Inclusions visible to the naked eye yet lots of life and sparkle. Great value and still stunning.<br><br>
<b>I3</b><br>
More heavily included and easily visible with the eye often milky stone with little sparkle. <br></p>
</div>


<div id="content_5" class="content">
<p><strong>Why buy from us?</strong><br>
</p><ul>
<li>Our customers are our most important asset and we will do our best to exceed the full satisfaction of every one of you.</li>
<li>We have a no-risk 14 day money back guarantee - always satisfy or your money back. We are paypal verified.</li>
<li>We are manufacture of diamonds, We buy rough natural diamonds and make them into polished diamonds.. That\'s right and you buy directly from the source!!</li>
<li>We offer great deals best styles, quality. and highest value on all of our merchandise.</li>
<li>You get the opportunity of buying jewelry at wholesale prices.</li>
<li>Offering wide range of Fine Jewelry and Certified Diamonds.</li>

<li>All of our items are brand new.</li>
<li>All of our Gemstones &amp; Diamonds are 100% genuine and natural.</li>
<li>All our items are 100% accurately graded by a GIA diamond graduate.</li>
<li>24/7 Email and Phone support !! CALL US TOLL FREE 1-800.874.35411.</li>
</ul>
<br><br><p></p></div>
 </div>



</div>
                    <script type="text/javascript">
function tabSwitch(new_tab, new_content) {

	document.getElementById(\'content_1\').style.display = \'none\';
	document.getElementById(\'content_2\').style.display = \'none\';
	document.getElementById(\'content_3\').style.display = \'none\';
	document.getElementById(\'content_4\').style.display = \'none\';
	document.getElementById(\'content_5\').style.display = \'none\';
	document.getElementById(new_content).style.display = \'block\';

	document.getElementById(\'tab_1\').className = \'\';
	document.getElementById(\'tab_2\').className = \'\';
	document.getElementById(\'tab_3\').className = \'\';
	document.getElementById(\'tab_4\').className = \'\';
document.getElementById(\'tab_5\').className = \'\';

	document.getElementById(new_tab).className = \'active\';

}
</script>
                  </div>
                  <!-- policies //end -->
                </td>
              </tr>
            </table>
            <!-- landing page end -->
            <!-- footer start -->
            <div id="leftsealbox">
              <div class="leftsealboxwrap"><a href="http://stores.ebay.com/Gemnile/Our-Store-Policy.html"><img alt="100% Satisfaction Guaranteed or your Money Back" title="100% Satisfaction Guaranteed or your Money Back" src="http://diamondsforlife.info/ebaystore/seal_moneyback.png" border="0" /></a></div>
              <div style="clear:both;"></div>
            </div>
            <table id="FooterWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="footerleft" valign="top" align="left"><div id="footertitle"><img alt="Can\'t find what you are looking for?" title="Can\'t find what you are looking for?" src="http://diamondsforlife.info/ebaystore/title_cantfind.gif" /></div>
                  <div id="footerinfo" align="left"><img align="left" alt="" src="http://diamondsforlife.info/ebaystore/cust_serv.png" />Gemnile, Inc. deals with all kinds of jewelry and diamonds.<br />
                    We are available 24/7.You can either e-mail us or
                    call us toll-free <span>1-800.874.3541</span> with the exact specifications of the diamond you are
                    looking for. We will gladly contact you with a price within the same working day. </div></td>
                <td id="footerright" valign="top">
                <img alt="100% Positive Feedback" title="100% Positive Feedback" src="http://diamondsforlife.info/ebaystore/seal_blue.png" />
               <img alt="Copyright Exclusive Design" title="Copyright Exclusive Design" src="http://diamondsforlife.info/ebaystore/seal_red.png" /><img alt="Free Overnight Shipping" title="Free Overnight Shipping" src="http://diamondsforlife.info/ebaystore/seal_yellow.png" /> </td>
              </tr>
              <tr>
                <td colspan="2" id="footerbottom" align="left" valign="top"><img alt="GIA - Gemological Institute of America" title="GIA - Gemological Institute of America" src="http://diamondsforlife.info/ebaystore/seal_gia.png" /><img alt="EGL - European Gemological Laboratory" title="EGL - European Gemological Laboratory" src="http://diamondsforlife.info/ebaystore/seal_egl.png" /><img class="bldia" alt="Stop Blood Diamonds" title="Stop Blood Diamonds" src="http://diamondsforlife.info/ebaystore/seal_blooddiamonds.png" /><img alt="Paypal Verified" title="Paypal Verified" src="http://diamondsforlife.info/ebaystore/seal_paypalverified.png" /></td>
              </tr>
            </table>
            <!-- footer end -->
            <div align="center" id="credit">All Contents are &copy;copyright 2010 By Gemnile</div></td>
        </tr>
      </table></td>
  </tr>
</table>
';

        if (get_magic_quotes_gpc()) {
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }

        $requestArray['listingDuration'] = 'GTC';
        $requestArray['startPrice'] = $priceAfterDiscount;

        $requestArray['buyItNowPrice'] = 0.0;

        $requestArray['quantity'] = $detail['qty']; //'1';

        $requestArray['ItemSpecification'] = $this->getItemWatchSpecification($detail);
        $requestArray['dispatchTime'] = '3';
        $requestArray['packageDepth'] = 4;
        $requestArray['packageLength'] = 16;
        $requestArray['packageWidth'] = 12;
        $requestArray['weightMajor'] = 3;
        $requestArray['weightMinor'] = 4;

        $requestArray['itemID'] = $detail['ebayid'];
        if (!empty($detail['thumb'])) {
            $requestArray['image1'] = $detail['thumb'];
        } else {
            $requestArray['image1'] = '';
        }
        if (!empty($detail['large'])) {
            $requestArray['image2'] = config_item('base_path') . $detail['large'];
        } else {
            $requestArray['image2'] = '';
        }
        if (!empty($detail['image_small2'])) {
            $requestArray['image3'] = config_item('base_path') . $detail['image_small2'];
        } else {
            $requestArray['image3'] = '';
        }
        if (!empty($detail['image_big2'])) {
            $requestArray['image4'] = config_item('base_path') . $detail['image_big2'];
        } else {
            $requestArray['image4'] = '';
        }
        if (!empty($detail['image5'])) {
            $requestArray['image5'] = config_item('base_path') . $detail['image5'];
        } else {
            $requestArray['image5'] = '';
        }

        if (!empty($detail['image6'])) {
            $requestArray['image6'] = config_item('base_path') . $detail['image6'];
        } else {
            $requestArray['image6'] = '';
        }


        if ($detail['thumb']) {
            $requestArray['ebayimg1'] = $this->sendImagetoEbay($detail['productName'], config_item('base_path') . $requestArray['image1']);
        }
        if ($detail['large']) {
            $requestArray['ebayimg2'] = $this->sendImagetoEbay($detail['productName'], $requestArray['image2']);
        }
        if ($detail['image_small2']) {
            $requestArray['ebayimg3'] = $this->sendImagetoEbay($detail['productName'], $requestArray['image3']);
        }
        if ($detail['image_big2']) {
            $requestArray['ebayimg4'] = $this->sendImagetoEbay($detail['productName'], $requestArray['image4']);
        }
        if ($detail['image5']) {
            $requestArray['ebayimg5'] = $this->sendImagetoEbay($detail['productName'], $requestArray['image5']);
        }
        if ($detail['image6']) {
            $requestArray['ebayimg6'] = $this->sendImagetoEbay($detail['productName'], $requestArray['image6']);
        }
        $requestArray['replace_gurantee'] = 'Days_14';

        if ($detail['ebayid'] == '' || $detail['ebayid'] == 0) {
            $itemID = $this->sendRequestEbay($requestArray);
        } else {
            //$itemID = $this->updateEbayItem($requestArray);
            $itemID = $this->updateRequestEbay($requestArray);
        }
        return $itemID;
    }

    function sendImagetoEbay($picturename, $file) {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;

        include_once(config_item('base_path') . 'application/helpers/eBaySessionHeader.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        $siteID = 0;
        $verb = 'UploadSiteHostedPictures';
        $compatabilityLevel = 517;
        //$file =  '/home/mywatch/public_html/beta/images/'.$file;
        // do a binary read of image
        $handle = fopen($file, 'r');
        $multiPartImageData = fread($handle, filesize($file));
        fclose($handle);


        $xmlReq = '<?xml version="1.0" encoding="utf-8"?>';
        $xmlReq .= '<UploadSiteHostedPicturesRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $xmlReq .= "<Version>$compatabilityLevel</Version>";
        $xmlReq .= "<PictureName>$picturename</PictureName>";
        $xmlReq .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $xmlReq .= '</UploadSiteHostedPicturesRequest>';


        $boundary = "MIME_boundary";
        $CRLF = "\r\n";

        // The complete POST consists of an XML request plus the binary image separated by boundaries
        $firstPart = '';
        $firstPart .= "--" . $boundary . $CRLF;
        $firstPart .= 'Content-Disposition: form-data; name="XML Payload"' . $CRLF;
        $firstPart .= 'Content-Type: text/xml;charset=utf-8' . $CRLF . $CRLF;
        $firstPart .= $xmlReq;
        $firstPart .= $CRLF;

        $secondPart .= "--" . $boundary . $CRLF;
        $secondPart .= 'Content-Disposition: form-data; name="casio"; filename="casio"' . $CRLF;
        $secondPart .= "Content-Transfer-Encoding: binary" . $CRLF;
        $secondPart .= "Content-Type: application/octet-stream" . $CRLF . $CRLF;
        $secondPart .= $multiPartImageData;
        $secondPart .= $CRLF;
        $secondPart .= "--" . $boundary . "--" . $CRLF;
        $fullPost = $firstPart . $secondPart;

        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySessionHeader($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
        //send the request and get response
        $responseXml = $session->sendHttpRequestHeader($fullPost);


        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');
        //Xml string is parsed and creates a DOM Document object
        $data = simplexml_load_string($responseXml);
        $string = (string) ($data->SiteHostedPictureDetails->FullURL);
        return $string;
        //$responseDoc = new DomDocument();
        //$responseDoc->loadXML($responseXml);
    }

	function sendIIRequestEbay($requestArray, $section = 'watches') {
		global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
		include_once(config_item('base_path') . 'system/application/helpers/eBaySession.php');
		include_once(config_item('base_path') . 'system/application/helpers/keys.php');
		$requestArray['replace_gurantee'] = "Days_14";
		$siteID = 0;
		$verb = 'AddItem';
		$compatabilityLevel = 601;
		$requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
		$requestXmlBody .= '<AddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
		$requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
		$requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
		$requestXmlBody .= "<Version>$compatabilityLevel</Version>";
		$requestXmlBody .= '<Item>';
		$requestXmlBody .= '<Country>US</Country>';
		$requestXmlBody .= '<Currency>USD</Currency>';
		$requestXmlBody .= "<Description><![CDATA[" . $requestArray['itemDescription'] . "]]></Description>";
		if ($requestArray['ebay_upload_type'] == 'bestoffer') {
			$requestArray['minimumbestofferprice'] = round($requestArray['startPrice'] * .85);
			$requestXmlBody .= '<ListingDetails>';
			$requestXmlBody .= '<MinimumBestOfferPrice currencyID="USD">' . $requestArray['minimumbestofferprice'] . '</MinimumBestOfferPrice>';
			$requestXmlBody .= '</ListingDetails>';
			$requestXmlBody .= '<DispatchTimeMax>1</DispatchTimeMax>';
		}
		$requestXmlBody .= "<ListingType>" . $requestArray['listingType'] . "</ListingType>";
		$requestXmlBody .= "<ListingDuration>" . $requestArray['listingDuration'] . "</ListingDuration>";
		$requestXmlBody .= '<Location><![CDATA[US]]></Location>';
		$requestXmlBody .= '<PaymentMethods>PayPalCredit</PaymentMethods>';
		$requestXmlBody .= '<PaymentMethods>VisaMC</PaymentMethods>';
		$requestXmlBody .= '<PaymentMethods>Discover</PaymentMethods>';
		$requestXmlBody .= '<PaymentMethods>AmEx</PaymentMethods>';
		$requestXmlBody .= '<PaymentMethods>CreditCard</PaymentMethods>';
		$requestXmlBody .= '<PrimaryCategory>';
		$requestXmlBody .= "<CategoryID>" . $requestArray['primaryCategory'] . "</CategoryID>";
		$requestXmlBody .= '</PrimaryCategory>';
		$requestXmlBody .= '<PrivateListing>true</PrivateListing>';
		$min = round($requestArray['startPrice'] * .85);
		if ($requestArray['ebay_upload_type'] == 'bestoffer') {
			$requestXmlBody .= '<ListingDetails>
				<ConvertedBuyItNowPrice currencyID="USD">0.00</ConvertedBuyItNowPrice>
				<ConvertedStartPrice currencyID="USD">' . $requestArray['startPrice'] . '</ConvertedStartPrice>
				<ConvertedReservePrice currencyID="USD">0.0</ConvertedReservePrice>
				<MinimumBestOfferPrice currencyID="USD">' . $min . '</MinimumBestOfferPrice>
			</ListingDetails>';
		}
		$requestXmlBody .= $requestArray['ItemSpecification'];
		$requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">0.00</BuyItNowPrice>";
		$requestXmlBody .= "<Quantity>" . $requestArray['quantity'] . "</Quantity>";
		$requestXmlBody .= '<DispatchTimeMax>1</DispatchTimeMax>';
		if ($requestArray['ebay_upload_type'] == 'bestoffer') {
			$requestXmlBody .= '<BestOfferDetails>
				<BestOfferCount>1</BestOfferCount>
				<BestOfferEnabled>true</BestOfferEnabled>
			</BestOfferDetails>';
		} else {
			$requestXmlBody .= '<BestOfferDetails>
				<BestOfferCount>1</BestOfferCount>
				<BestOfferEnabled>false</BestOfferEnabled>
			</BestOfferDetails>';
		}
        if ($requestArray['startPrice'] > 10000) {
            $requestXmlBody .= '<AutoPay>True</AutoPay>';
        }
        $requestXmlBody .= "<StartPrice>".$requestArray['startPrice']."</StartPrice>";
        if (strlen($requestArray['itemTitle']) > 80) {
            $title = substr($requestArray['itemTitle'], 0, 80);
        } else {
            $title = $requestArray['itemTitle'];
            $length = strlen($requestArray['itemTitle']);
            $loop = 80 - $length;
            $title = $requestArray['itemTitle'];
            $string1 = '';
            $loop = $loop / 6;
            for ($k = 0; $k < $loop - 1; $k++) {
                $string1 = $string1 . "      ";
            }
            $title = $title . $string1;
        }
        $requestXmlBody .= "<Title><![CDATA[" . ($title) . "]]></Title>";
        $requestXmlBody .= "<SKU>" . (string) $requestArray['productID'] . "</SKU>";
        $requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
        $requestXmlBody .= '<ShippingType>FlatDomesticCalculatedInternational</ShippingType><ThirdPartyCheckout>false</ThirdPartyCheckout>';
        $requestXmlBody .= '<ReturnPolicy>
			<ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
			<RefundOption>MoneyBack</RefundOption>
			<ReturnsWithinOption>' . $requestArray['replace_gurantee'] . '</ReturnsWithinOption>
			<Description>PLEASE VISIT OUR EBAY STORE FOR A DETAILED RETURN POLICY.</Description>
			<ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
			<ShippingCostPaidBy>Buyer</ShippingCostPaidBy>
		</ReturnPolicy>
		<ShippingDetails>
			<ApplyShippingDiscount>false</ApplyShippingDiscount>
			<SalesTax>
				<SalesTaxPercent>8.875</SalesTaxPercent>
				<SalesTaxState>NY</SalesTaxState>
				<ShippingIncludedInTax>true</ShippingIncludedInTax>
			</SalesTax>
			<ShippingServiceOptions>
				<ShippingService>USPSFirstClass</ShippingService>
				<ShippingServiceCost>0.00</ShippingServiceCost>
				<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
				<ShippingServicePriority>1</ShippingServicePriority>
				<FreeShipping>true</FreeShipping>
				<ExpeditedService>false</ExpeditedService>
				<ShippingTimeMin>1</ShippingTimeMin>
				<ShippingTimeMax>6</ShippingTimeMax>
				<FreeShipping>true</FreeShipping>
			</ShippingServiceOptions>
			<ShippingServiceOptions>
				<ShippingService>USPSPriority</ShippingService>
				<ShippingServiceCost>8.99</ShippingServiceCost>
				<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
				<ShippingServicePriority>2</ShippingServicePriority>
				<ExpeditedService>false</ExpeditedService>
				<ShippingTimeMin>1</ShippingTimeMin>
				<ShippingTimeMax>3</ShippingTimeMax>
			</ShippingServiceOptions>
			<ShippingServiceOptions>
				<ShippingService>USPSExpressMail</ShippingService>
				<ShippingServicePriority>3</ShippingServicePriority>
				<ShippingServiceCost>29.99</ShippingServiceCost>
				<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
				<ExpeditedService>false</ExpeditedService>
				<ShippingTimeMin>1</ShippingTimeMin>
				<ShippingTimeMax>6</ShippingTimeMax>
			</ShippingServiceOptions>
			<InternationalShippingServiceOption>
				<ShippingService>USPSExpressMailInternational</ShippingService>
				<ShippingServiceCost>55.00</ShippingServiceCost>
				<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
				<ShippingServicePriority>1</ShippingServicePriority>
				<ShipToLocation>Europe</ShipToLocation>
				<ShipToLocation>Asia</ShipToLocation>
				<ShipToLocation>CA</ShipToLocation>
				<ShipToLocation>GB</ShipToLocation>
				<ShipToLocation>AU</ShipToLocation>
				<ShipToLocation>DE</ShipToLocation>
				<ShipToLocation>JP</ShipToLocation>
			</InternationalShippingServiceOption>
			<TaxTable>  
				<TaxJurisdiction>
					<JurisdictionID>CA</JurisdictionID>
					<SalesTaxPercent>0.00</SalesTaxPercent>
					<ShippingIncludedInTax>true</ShippingIncludedInTax>
				</TaxJurisdiction>
			</TaxTable>
		</ShippingDetails>';
        if (!empty($requestArray['image1'])) {
            $requestXmlBody .= '<PictureDetails><GalleryType>Gallery</GalleryType><GalleryURL>' . $requestArray['image1'] . '</GalleryURL>';
            $requestXmlBody .= '<PictureURL>' . $requestArray['image1'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg1']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg1'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg2']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg2'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg3']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg3'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg4']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg4'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg5']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg5'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg6']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg6'] . '</PictureURL>';
        }
        if (!empty($requestArray['image1'])) {
            $requestXmlBody .= '</PictureDetails>';
        }
        $requestXmlBody .= '<Storefront>
			<StoreCategoryID>' . $requestArray['storeCategoryID'] . '</StoreCategoryID>
		</Storefront>';
        $requestXmlBody .= '<RegionID>0</RegionID>';
        $requestXmlBody .= '</Item>';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= '</AddItemRequest>';
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');
        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        $responses = $responseDoc->getElementsByTagName("AddItemResponse");
        foreach ($responses as $response) {
            $acks = $response->getElementsByTagName("Ack");
            $ack = $acks->item(0)->nodeValue;
        }
        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');
        if ($ack == 'Failure') {
            foreach ($errors AS $error) {
                $SeverityCode = $error->getElementsByTagName('SeverityCode');
                if ($SeverityCode->item(0)->nodeValue == 'Error') {
                    $status = '<P><B>eBay returned the following error(s):</B>';
                    $code = $error->getElementsByTagName('ErrorCode');
                    $shortMsg = $error->getElementsByTagName('ShortMessage');
                    $longMsg = $error->getElementsByTagName('LongMessage');
                    //Display code and shortmessage
                    $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
                    //if there is a long message (ie ErrorLevel=1), display it
                    if (count($longMsg) > 0)
                        $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
                }
            }
            echo $status;
        } else {
            $responses = $responseDoc->getElementsByTagName("AddItemResponse");
            foreach ($responses as $response) {
                $acks = $response->getElementsByTagName("Ack");
                $ack = $acks->item(0)->nodeValue;
                echo "Ack = $ack <BR />\n";
                $endTimes = $response->getElementsByTagName("EndTime");
                $endTime = $endTimes->item(0)->nodeValue;
                echo "endTime = $endTime <BR />\n";
                $itemIDs = $response->getElementsByTagName("ItemID");
                $itemID = $itemIDs->item(0)->nodeValue;
                $linkBase = "http://cgi.sandbox.ebay.com/ws/eBayISAPI.dll?ViewItem&item=";
                $status = "<a href=$linkBase" . $itemID . ">" . $requestArray['itemTitle'] . "</a> <BR />";
                $feeNodes = $responseDoc->getElementsByTagName('Fee');
                foreach ($feeNodes as $feeNode) {
                    $feeNames = $feeNode->getElementsByTagName("Name");
                    if ($feeNames->item(0)) {
                        $feeName = $feeNames->item(0)->nodeValue;
                        $fees = $feeNode->getElementsByTagName('Fee');  // get Fee amount nested in Fee
                        $fee = $fees->item(0)->nodeValue;
                        if ($fee > 0.0) {
                            if ($feeName == 'ListingFee') {
                                $status .= "<B>$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                            } else {
                                $status .= "$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                            }
                        }
                    }
                }
            }
            if ($section == 'qg') {
                $this->db->where('itemid', $requestArray['productID']);
                $isinsert = $this->db->update('dev_qg', array(
                    'ebayid' => $itemID,
                        ));
                $href = config_item('base_url') . "admin/categorymanagement?msg=success&item=$itemID";
                echo "<script>window.location.href='$href'</script>";
            } else if ($section == 'stuller') {
                $this->db->where('ItemNumber', $requestArray['productID']);
                $isinsert = $this->db->update('stullerdata_new', array(
                    'ebayid' => $itemID,
                        ));
                $href = config_item('base_url') . "admin/categorymanagement?msg=success&item=$itemID";
                echo "<script>window.location.href='$href'</script>";
            } else if ($section == 'pendants') {
                $this->db->where('lot', $requestArray['productID']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'index', array(
                    'ebayid' => $itemID,
                        ));
            } else if ($section == 'rapnet') {
                $this->db->where('lot', $requestArray['productID']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'index', array(
                    'ebayid' => $itemID,
                        ));
            } else if ($section == 'watches') {
                $this->db->where('productID', $requestArray['productID']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'watches', array(
                    'ebayid' => $itemID,
				));
            } else if ($section == 'povada') {
                $this->db->where('id', $requestArray['id']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'diamond_items', array(
                    'ebay_id' => $itemID,
				));
            } else {
                $this->db->where('stock_number', $requestArray['productID']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'jewelries', array(
                    'ebayid' => $itemID,
				));
            }
        }
    }

    function sendRequestEbay($requestArray, $section = 'watches') {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        $requestArray['replace_gurantee'] = "Days_14";

        $siteID = 0;
        $verb = 'AddItem';
        $compatabilityLevel = 601;
        //$requestArray['listingType'] = " FixedPriceItem";
        ///Build the request Xml string
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        $requestXmlBody .= '<AddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
        $requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
        $requestXmlBody .= "<Version>$compatabilityLevel</Version>";
        $requestXmlBody .= '<Item>';
        $requestXmlBody .= '<Country>US</Country>';
        $requestXmlBody .= '<Currency>USD</Currency>';
        $requestXmlBody .= "<Description><![CDATA[" . $requestArray['itemDescription'] . "]]></Description>";

        if ($requestArray['ebay_upload_type'] == 'bestoffer') {
            $requestArray['minimumbestofferprice'] = round($requestArray['startPrice'] * .85);
            $requestXmlBody .= '<ListingDetails>';
            $requestXmlBody .= '<MinimumBestOfferPrice currencyID="USD">' . $requestArray['minimumbestofferprice'] . '</MinimumBestOfferPrice>';
            $requestXmlBody .= '</ListingDetails>';
            $requestXmlBody .= '<DispatchTimeMax>1</DispatchTimeMax>';
        }
        $requestXmlBody .= "<ListingType>" . $requestArray['listingType'] . "</ListingType>";
        $requestXmlBody .= "<ListingDuration>" . $requestArray['listingDuration'] . "</ListingDuration>";

        $requestXmlBody .= '<Location><![CDATA[US]]></Location>';
        //
        //$requestXmlBody .= '<PaymentMethods>AmEx</PaymentMethods>';
        //
      //  $requestArray['primaryCategory'] = '164331';
        //$requestXmlBody .= '<PaymentMethods>VisaMC</PaymentMethods>';
        //$requestXmlBody .= '<PaymentMethods>Discover</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>PayPal</PaymentMethods>';
        $requestXmlBody .= '<PayPalEmailAddress>abraham@zkordiamonds.com</PayPalEmailAddress>';
        $requestXmlBody .= '<PrimaryCategory>';
        $requestXmlBody .= "<CategoryID>" . $requestArray['primaryCategory'] . "</CategoryID>";
        $requestXmlBody .= '</PrimaryCategory>';
        $requestXmlBody .= '<PrivateListing>true</PrivateListing>';
        //$min = $requestArray['startPrice'] - 1;
        //$min = round($requestArray['startPrice'] * .85);
        //  $min = $requestArray['startPrice'];
        //$min = round($requestArray['startPrice'] * .85);
        $min = round($requestArray['startPrice'] * .85);
        if ($requestArray['ebay_upload_type'] == 'bestoffer') {

            $requestXmlBody .= '<ListingDetails>
                                <ConvertedBuyItNowPrice currencyID="USD">0.00</ConvertedBuyItNowPrice>
                                <ConvertedStartPrice currencyID="USD">' . $requestArray['startPrice'] . '</ConvertedStartPrice>
                                <ConvertedReservePrice currencyID="USD">0.0</ConvertedReservePrice>
                                <MinimumBestOfferPrice currencyID="USD">' . $min . '</MinimumBestOfferPrice>
                            </ListingDetails>';
        }

        $requestXmlBody .= $requestArray['ItemSpecification'];
        $requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">0.00</BuyItNowPrice>";
        $requestXmlBody .= "<Quantity>" . $requestArray['quantity'] . "</Quantity>";
        $requestXmlBody .= '<DispatchTimeMax>1</DispatchTimeMax>';
        if ($requestArray['ebay_upload_type'] == 'bestoffer') {
            $requestXmlBody .= '<BestOfferDetails>
                                                <BestOfferCount>1</BestOfferCount>
                                                <BestOfferEnabled>true</BestOfferEnabled>
                            </BestOfferDetails>';
        } else {
            $requestXmlBody .= '<BestOfferDetails>
                                                <BestOfferCount>1</BestOfferCount>
                                                <BestOfferEnabled>false</BestOfferEnabled>
                            </BestOfferDetails>';
        }
        if ($requestArray['startPrice'] > 10000) {
            $requestXmlBody .= '<AutoPay>True</AutoPay>';
        }
        $requestXmlBody .= "<StartPrice>".$requestArray['startPrice']."</StartPrice>";
        if (strlen($requestArray['itemTitle']) > 80) {
            $title = substr($requestArray['itemTitle'], 0, 80);
        } else {
            $title = $requestArray['itemTitle'];
            $length = strlen($requestArray['itemTitle']);
            $loop = 80 - $length;
            $title = $requestArray['itemTitle'];
            $string1 = '';
            $loop = $loop / 6;
            for ($k = 0; $k < $loop - 1; $k++) {
                $string1 = $string1 . "      ";
            }
            $title = $title . $string1;
        }


        //$requestXmlBody .= "<Title><![CDATA[".($requestArray['itemTitle'])."]]></Title>";
        $requestXmlBody .= "<Title><![CDATA[" . ($title) . "]]></Title>";
        $requestXmlBody .= "<SKU>" . (string) $requestArray['productID'] . "</SKU>";
        $requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
        $requestXmlBody .= '<ShippingType>FlatDomesticCalculatedInternational</ShippingType><ThirdPartyCheckout>false</ThirdPartyCheckout>';
        $requestXmlBody .= '<ReturnPolicy>
                                                                <ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
                                                                <RefundOption>MoneyBack</RefundOption>
                                                                <ReturnsWithinOption>' . $requestArray['replace_gurantee'] . '</ReturnsWithinOption>
                                                                <Description>PLEASE VISIT OUR EBAY STORE FOR A DETAILED RETURN POLICY.</Description>
                                                                  <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
                                                                  <ShippingCostPaidBy>Buyer</ShippingCostPaidBy>
                                                        </ReturnPolicy>
                                                        <ShippingDetails>
                                                                <ApplyShippingDiscount>false</ApplyShippingDiscount>
													<SalesTax>
													<SalesTaxPercent>8.875</SalesTaxPercent>
													<SalesTaxState>NY</SalesTaxState>
													<ShippingIncludedInTax>true</ShippingIncludedInTax>
													</SalesTax>

													<ShippingServiceOptions>
													<ShippingService>USPSFirstClass</ShippingService>
													<ShippingServiceCost>0.00</ShippingServiceCost>
													<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
													<ShippingServicePriority>1</ShippingServicePriority>
													<FreeShipping>true</FreeShipping>
													<ExpeditedService>false</ExpeditedService>
													<ShippingTimeMin>1</ShippingTimeMin>
													<ShippingTimeMax>6</ShippingTimeMax>
													<FreeShipping>true</FreeShipping>
													</ShippingServiceOptions>

													<ShippingServiceOptions>
													<ShippingService>USPSPriority</ShippingService>
													<ShippingServiceCost>8.99</ShippingServiceCost>
													<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
													<ShippingServicePriority>2</ShippingServicePriority>
													<ExpeditedService>false</ExpeditedService>
													<ShippingTimeMin>1</ShippingTimeMin>
													<ShippingTimeMax>3</ShippingTimeMax>
													</ShippingServiceOptions>

													<ShippingServiceOptions>
													<ShippingService>USPSExpressMail</ShippingService>
													<ShippingServicePriority>3</ShippingServicePriority>
													<ShippingServiceCost>29.99</ShippingServiceCost>
													<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
													<ExpeditedService>false</ExpeditedService>
													<ShippingTimeMin>1</ShippingTimeMin>
													<ShippingTimeMax>6</ShippingTimeMax>
													</ShippingServiceOptions>

													<InternationalShippingServiceOption>
													<ShippingService>USPSExpressMailInternational</ShippingService>
													<ShippingServiceCost>55.00</ShippingServiceCost>
													<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
													<ShippingServicePriority>1</ShippingServicePriority>
													<ShipToLocation>Europe</ShipToLocation>
													<ShipToLocation>Asia</ShipToLocation>
													<ShipToLocation>CA</ShipToLocation>
													<ShipToLocation>GB</ShipToLocation>
													<ShipToLocation>AU</ShipToLocation>
													<ShipToLocation>DE</ShipToLocation>
													<ShipToLocation>JP</ShipToLocation>
													</InternationalShippingServiceOption>

													<TaxTable>  
														  <TaxJurisdiction>
																<JurisdictionID>CA</JurisdictionID>
																<SalesTaxPercent>0.00</SalesTaxPercent>
																<ShippingIncludedInTax>true</ShippingIncludedInTax>
														 </TaxJurisdiction>
													</TaxTable>

                                                </ShippingDetails>';
        if (!empty($requestArray['image1'])) {
            $requestXmlBody .= '<PictureDetails><GalleryType>Gallery</GalleryType>
                                          <GalleryURL>' . config_item('base_url') . $requestArray['image1'] . '</GalleryURL>';
            $requestXmlBody .= '<PictureURL>' . $requestArray['image1'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg1']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg1'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg2']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg2'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg3']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg3'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg4']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg4'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg5']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg5'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg6']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg6'] . '</PictureURL>';
        }

        if (!empty($requestArray['image1'])) {
            $requestXmlBody .= '</PictureDetails>';
        }
        $requestXmlBody .= '<Storefront>
          <StoreCategoryID>' . $requestArray['storeCategoryID'] . '</StoreCategoryID>
          </Storefront>';

        $requestXmlBody .= '<RegionID>0</RegionID>';
        $requestXmlBody .= '</Item>';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= '</AddItemRequest>';


        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);


        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);

        $responses = $responseDoc->getElementsByTagName("AddItemResponse");


        foreach ($responses as $response) {
            $acks = $response->getElementsByTagName("Ack");
            $ack = $acks->item(0)->nodeValue;
            //echo "Ack = $ack <BR />\n";   // Success if successful
        }
        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');

        //if there are error nodes
        //if($errors->length > 0)
        if ($ack == 'Failure') { //echo '<br>'.die('xyz');
            foreach ($errors AS $error) {
                $SeverityCode = $error->getElementsByTagName('SeverityCode');
                //echo '<br>'.$SeverityCode->item(0)->nodeValue;
                if ($SeverityCode->item(0)->nodeValue == 'Error') {
                    $status = '<P><B>eBay returned the following error(s):</B>';
                    //display each error
                    //Get error code, ShortMesaage and LongMessage
                    $code = $error->getElementsByTagName('ErrorCode');
                    $shortMsg = $error->getElementsByTagName('ShortMessage');
                    $longMsg = $error->getElementsByTagName('LongMessage');

                    //Display code and shortmessage
                    $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
                    //if there is a long message (ie ErrorLevel=1), display it
                    if (count($longMsg) > 0)
                        $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
                }
            }
            echo $status;
        } else { //no errors
            //   echo '<br>'.die('ppt');
            //get results nodes
            $responses = $responseDoc->getElementsByTagName("AddItemResponse");
            foreach ($responses as $response) {
                $acks = $response->getElementsByTagName("Ack");
                $ack = $acks->item(0)->nodeValue;
                echo "Ack = $ack <BR />\n";   // Success if successful

                $endTimes = $response->getElementsByTagName("EndTime");
                $endTime = $endTimes->item(0)->nodeValue;
                echo "endTime = $endTime <BR />\n";

                $itemIDs = $response->getElementsByTagName("ItemID");
                $itemID = $itemIDs->item(0)->nodeValue;
                // echo "itemID = $itemID <BR />\n";

                $linkBase = "http://cgi.sandbox.ebay.com/ws/eBayISAPI.dll?ViewItem&item=";
                $status = "<a href=$linkBase" . $itemID . ">" . $requestArray['itemTitle'] . "</a> <BR />";

                $feeNodes = $responseDoc->getElementsByTagName('Fee');
                foreach ($feeNodes as $feeNode) {
                    $feeNames = $feeNode->getElementsByTagName("Name");
                    if ($feeNames->item(0)) {
                        $feeName = $feeNames->item(0)->nodeValue;
                        $fees = $feeNode->getElementsByTagName('Fee');  // get Fee amount nested in Fee
                        $fee = $fees->item(0)->nodeValue;
                        if ($fee > 0.0) {
                            if ($feeName == 'ListingFee') {
                                $status .= "<B>$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                            } else {
                                $status .= "$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                            }
                        }  // if $fee > 0
                    } // if feeName
                } // foreach $feeNode
            } // foreach response

            if ($section == 'qg') {
                $this->db->where('itemid', $requestArray['productID']);
                $isinsert = $this->db->update('dev_qg', array(
                    'ebayid' => $itemID,
                        ));
                $href = config_item('base_url') . "admin/categorymanagement?msg=success&item=$itemID";
                echo "<script>window.location.href='$href'</script>";
            } else if ($section == 'stuller') {
                $this->db->where('ItemNumber', $requestArray['productID']);
                $isinsert = $this->db->update('stullerdata_new', array(
                    'ebayid' => $itemID,
                        ));
                $href = config_item('base_url') . "admin/categorymanagement?msg=success&item=$itemID";
                echo "<script>window.location.href='$href'</script>";
            } else if ($section == 'pendants') {
                $this->db->where('lot', $requestArray['productID']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'index', array(
                    'ebayid' => $itemID,
                        ));
            } else if ($section == 'rapnet') {
                $this->db->where('lot', $requestArray['productID']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'index', array(
                    'ebayid' => $itemID,
                        ));
            } else if ($section == 'watches') {
                //echo $itemID;
                //echo $requestArray['productID'];
                $this->db->where('productID', $requestArray['productID']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'watches', array(
                    'ebayid' => $itemID,
                        ));
            } else if ($section == 'povada') {
                //echo $itemID;
                //echo $requestArray['productID'];
                $this->db->where('id', $requestArray['id']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'diamond_items', array(
                    'ebay_id' => $itemID,
                        ));
            } else {

                $this->db->where('stock_number', $requestArray['productID']);
                $isinsert = $this->db->update($this->config->item('table_perfix') . 'jewelries', array(
                    'ebayid' => $itemID,
                        ));
            }
        } // if $errors->length > 0
        //echo $status;
    }

    function updateEbayItem($requestArray, $section = 'watches') {
        //	echo config_item('base_path').'application/helpers/eBaySOAP.php';
        include config_item('base_path') . 'application/helpers/eBaySOAP.php';

        $config = parse_ini_file(config_item('base_path') . 'application/helpers/ebay.ini', true);

        $site = $config['settings']['site'];
        $compatibilityLevel = $config['settings']['compatibilityLevel'];

        $dev = $config[$site]['devId'];
        $app = $config[$site]['appId'];
        $cert = $config[$site]['cert'];
        $token = $config[$site]['authToken'];
        $location = $config[$site]['gatewaySOAP'];

        // Create and configure session
        $session = new eBaySession($dev, $app, $cert);
        $session->token = $token;
        $session->site = 0; // 0 = US;
        $session->location = $location;

        try {
            $client = new eBaySOAP($session);

            $PrimaryCategory = array('CategoryID' => $requestArray['primaryCategory']);

            /* $Item = array('ListingType' => $requestArray['listingType']
              'Currency' => 'USD',
              'Country' => 'US',
              'PaymentMethods' => 'PaymentSeeDescription',
              'RegionID' => 0,
              'ListingDuration' => $requestArray['listingDuration'],
              'Title' => $requestArray['itemTitle'],
              'SubTitle' => 'The new item subtitle',
              'Description' => $requestArray['itemDescription'],
              'Location' => "San Jose, CA",
              'Quantity' => $requestArray['quantity'],
              'StartPrice' => $requestArray['startPrice'],
              'BuyItNowPrice' => $requestArray['buyItNowPrice'],
              'PrimaryCategory' => $PrimaryCategory,
              ); */

            // Get it to confirm
            $params = array('Version' => $compatibilityLevel, 'ItemID' => $requestArray['itemID']);
            $results = $client->GetItem($params);
            //print_r($results);
            //die('pp');
            if ($results->Errors->ErrorCode == '17') {
                // Revise it and change the Title and raise the BuyItNowPrice
                $status = $this->sendRequestEbay($requestArray, $section);
            } else if ($results->Errors) {
                $status = '<b>' . $results->Errors->ShortMessage . '<br>' . $results->Errors->LongMessage . '</b>';
            } else {
                $Item = array('Title' => $requestArray['itemTitle'],
                    'Description' => $requestArray['itemDescription'],
                    'Quantity' => $requestArray['quantity'],
                    'StartPrice' => $requestArray['startPrice'],
                    'BuyItNowPrice' => $requestArray['buyItNowPrice'],
                );


                $params = array('Version' => $compatibilityLevel,
                    'Item' => $Item
                );

                $results = $client->ReviseItem($params);
                //print_r($results);
                if ($results->Errors) {
                    // Revise it and change the Title and raise the BuyItNowPrice
                    $status = '<b>' . $results->Errors->ShortMessage . '<br>' . $results->Errors->LongMessage . '</b>';
                } else {
                    $status = '<b>Item Updated Successfully!</b>';
                }
            }
            echo $status;
        } catch (SOAPFault $f) {
            print $f; // error handling
        }
    }

    function endFixedPriceBid($itemID) {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        //SiteID must also be set in the Request's XML
        //SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
        //SiteID Indicates the eBay site to associate the call with
        $siteID = 0;
        //the call being made:
        $verb = 'EndFixedPriceItem';
        //echo 'devid'.$devID;
        ///Build the request Xml string

        $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>';
        $requestXmlBody .= '<EndFixedPriceItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<ItemID>$itemID</ItemID>";
        $requestXmlBody .= "<EndingReason>Incorrect</EndingReason>";
        $requestXmlBody .= '<RequesterCredentials><eBayAuthToken>' . $userToken . '</eBayAuthToken></RequesterCredentials>';
        $requestXmlBody .= '</EndFixedPriceItemRequest>';

        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);


        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        //print_r($responseXml);
        //die('ppt');
        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');

        //if there are error nodes
        if ($errors->length > 0) {
            $status = '<P><B>eBay returned the following error(s):</B>';
            //display each error
            //Get error code, ShortMesaage and LongMessage
            $code = $errors->item(0)->getElementsByTagName('ErrorCode');
            $shortMsg = $errors->item(0)->getElementsByTagName('ShortMessage');
            $longMsg = $errors->item(0)->getElementsByTagName('LongMessage');
            //Display code and shortmessage
            $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
            //if there is a long message (ie ErrorLevel=1), display it
            if (count($longMsg) > 0)
                $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
        } else { //no errors
            $responses = $responseDoc->getElementsByTagName("SetStoreCategoriesResponse");
            // print_r($responses);

            foreach ($responses as $response) {

                $status = $response->getElementsByTagName('Ack');
                $status = $status->item(0)->nodevalue;
            }
        }

        return $status;
    }
    ////// end ebay item
    function endEbayItemById($itemID) {
        
        include_once 'ebaylib/eBaySession.php';
        include_once 'ebaylib/keys.php';
        
        $siteID = 0;
        //the call being made:
        $verb = 'EndItem';
                
        ///Build the request Xml string
        $requestXmlBody = '';
        
            $requestXmlBody .= '
            <?xml version="1.0" encoding="utf-8"?>
            <EndItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
              <RequesterCredentials>
                <eBayAuthToken>'.$userToken.'</eBayAuthToken>
              </RequesterCredentials>
              <ItemID>'.$itemID.'</ItemID>
              <EndingReason>NotAvailable</EndingReason>
            </EndItemRequest>';


        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);


        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');
        $response = simplexml_import_dom($responseDoc);
        //print_ar($response);
        //$entries = $response->PaginationResult->TotalNumberOfEntries;
        
        return $response->Ack;        
    }
    
    ///// ebay connection call
    function ebayConnectionCall($verb, $requestXmlBody='') {
        include_once 'ebaylib/eBaySession.php';
        include_once 'ebaylib/keys.php';
        
        $siteID = 0;
        //the call being made:


        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);


        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');
        $response = simplexml_import_dom($responseDoc);
        //print_ar($response);
        //$entries = $response->PaginationResult->TotalNumberOfEntries;
        
        return $response->Ack;
    }

    function getGemstonesByStockId($stock) {
        $sql = "SELECT  * FROM  dev_gemstones where jew_id = '$stock' ";
        $result = $this->db->query($sql);
        $results = $result->result_array();
        return $results;
    }

    function addRingtoEbay($detail, $action = 'Add') {
        $gemstonesArray = $this->getGemstonesByStockId($detail['stock_number']);

        if ($detail['image1'] != '') {
            $requestArray['ebayimg1'] = $this->sendImagetoEbay($detail['image1'], config_item('base_path') . 'images/' . $detail['image1']);
        }
        if ($detail['image2'] != '') {
            $requestArray['ebayimg2'] = $this->sendImagetoEbay($detail['image2'], config_item('base_path') . 'images/' . $detail['image2']);
        }
        if ($detail['image3'] != '') {
            $requestArray['ebayimg3'] = $this->sendImagetoEbay($detail['image3'], config_item('base_path') . 'images/' . $detail['image3']);
        }
        if ($detail['image4'] != '') {
            $requestArray['ebayimg4'] = $this->sendImagetoEbay($detail['image4'], config_item('base_path') . 'images/' . $detail['image4']);
        }
        if ($detail['image5'] != '') {
            $requestArray['ebayimg5'] = $this->sendImagetoEbay($detail['image5'], config_item('base_path') . 'images/' . $detail['image5']);
        }
        if ($detail['image6'] != '') {
            $requestArray['ebayimg6'] = $this->sendImagetoEbay($detail['image6'], config_item('base_path') . 'images/' . $detail['image6']);
        }
        $requestArray['image1'] = 'images/' . $detail['image1'];
        $remArr = array(" ", "ct.", 'ct..', "ct tw");
        $total_carats = str_replace($remArr, "", $detail['total_carats']);
        $requestArray['listingType'] = 'StoresFixedPrice';
        $requestArray['primaryCategory'] = 31387; // $detail['primary_cat_id'];
        $requestArray['storeCategoryID'] = $detail['subcategory'];  // $detail['store_cat_id'];
        $requestArray['itemTitle'] = $detail['item_title'];
        $requestArray['productID'] = $detail['stock_number'];
        $watchdetails = '<link href="http://diamondsforlife.info/ebaystore/tmp.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE]>
<link href="http://diamondsforlife.info/ebaystore/tmp_iefix.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<table cellpadding="0" cellspacing="0" align="center" class="pagewidth2">
  <tr>
    <td align="center"><table cellpadding="0" cellspacing="0" align="center" class="pageminwidth2">
        <tr>
          <td><!-- header start -->
 <map name="Map" id="Map">
              <area shape="rect" coords="1,1,16,12" href="http://contact.ebay.com/ws/eBayISAPI.dll?FindAnswers&frm=284&requested=nektadiamonds" target="_blank" alt="Contact Us" title="Contact Us" />
            </map>
            <table id="HeaderWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="headerLeft" valign="top" align="left"><div id="logoWrap"><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m"><img alt="DIAMOND ENGAGEMENT RING SNYC" title="DIAMOND ENGAGEMENT RING SNYC" src="http://zkordiamonds.com/images/new/logo.jpg" border="0" /></a></div></td>
                <td id="headerRight" valign="top"><div id="phone" align="right" style="color:white;">(212) 302-7327</div>
</td>
              </tr>
            </table>
            <table id="topnavg" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="topnavgl"><div id="topnavlinks"><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Our-Policy.html">Our Policy</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/14-Day-Return-Policy.html">Return Policy</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Newly-Listed.html">News Listed</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Diamond-Education.html">Diamond Education</a><a href="http://cgi3.ebay.com/ws/eBayISAPI.dll?ViewUserPage&userid=nektadiamonds">About Us</a></div></td>
                <td id="topnavgr" align="left"><div id="searchWrap">
                    <form style="display:inline;" name="search" method="get" action="http://search.stores.ebay.com/search/search.dll?GetResult">
                      <table cellpadding="0" cellspacing="0" align="left" border="0">
                        <tr>
                          <td align="left" width="200"><input class="srField" type="text" name="query" size="25" maxlength="300" value="Enter keywords here..." onFocus="if (this.value == \'Enter keywords here...\') this.value = \'\';" />
                            <input type="hidden" name="sid" value="126131195" />
                            <input type="hidden" name="store" value="DiamondEngagementRingsNYC" />
                            <input type="hidden" name="colorid" value="-1" />
                            <input type="hidden" name="fp" value="0" />
                            <input type="hidden" name="st" value="1" />
                            <input type="hidden" name="fsoo" value="1" />
                            <input type="hidden" name="fsop" value="1" /></td>
                          <td align="right" width="33"><div id="searchbutton">
                              <input type="image" src="http://diamondsforlife.info/ebaystore/search.gif" value="Search" align="right" alt="Search" title="Search" />
                            </div></td>
                        </tr>
                      </table>
                    </form>
                  </div></td>
              </tr>
            </table>
            <!-- header end -->
            <!-- landing page start -->
            <table id="homePage" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td valign="top" align="left" id="leftcolumn"><div class="lefttitles"><img alt="Browse by Category" title="Browse by Category" src="http://diamondsforlife.info/ebaystore/title_cats.gif" /></div>
                  <div class="menu">

                    <ul>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_DIAMOND-ENGAGEMENT-RINGS_W0QQfsubZ2">Diamond Engagement Rings</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_LOOSE-DIAMONDS_W0QQfsubZ1448802015">Loose Diamonds</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_DIAMOND-EARRINGS_W0QQfsubZ1450533015">Diamond Earrings</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_THE-SIGNATURE-COLLECTION_W0QQfsubZ1450534015">The Signature Collection</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_W0QQfsubZ0" style="background-image:none; margin-bottom:1px;">View All Products</a></li>
                    </ul>
                  </div>
                  </td>
                <td align="right" valign="top" id="middlecontent"><div class="content_Box1">
                    <div class="PrTitle" align="center"><span class="PrTitle2">' . $requestArray['itemTitle'] . '!</span></div>
                    <div style="clear:both;"></div>
                    <div class="content_Box2">
                      <div id="MainPhoto"><img src="' . config_item('base_url') . "images/" . $detail['image1'] . '" border="0" align="middle" alt="" name="rollimg" style="width:400px;" /></div>
                        <div id="ThumbsProd" align="left">';
        if ($requestArray['ebayimg1'] != '') {
            $destFile = $requestArray['ebayimg1'];
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $destFile . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $requestArray['ebayimg1'] . '" border="0" alt="" />
                        </a>';
        }
        if ($requestArray['ebayimg2'] != '') {
            $destFile = $requestArray['ebayimg2'];
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $requestArray['ebayimg2'] . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $requestArray['ebayimg2'] . '" border="0" alt="" />
                        </a>';
        }
        if ($requestArray['ebayimg3'] != '') {
            $destFile = $requestArray['ebayimg3'];
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $requestArray['ebayimg3'] . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $requestArray['ebayimg3'] . '" border="0" alt="" />
                        </a>';
        }

        if ($requestArray['ebayimg4'] != '') {
            $destFile = $requestArray['ebayimg4'];
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $requestArray['ebayimg4'] . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $requestArray['ebayimg4'] . '" border="0" alt="" />
                        </a>';
        }

        if ($requestArray['ebayimg5'] != '') {
            $destFile = $requestArray['ebayimg5'];
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $requestArray['ebayimg5'] . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $requestArray['ebayimg5'] . '" border="0" alt="" />
                        </a>';
        }
        if ($requestArray['ebayimg6'] != '') {
            $destFile = $requestArray['ebayimg6'];
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $requestArray['ebayimg6'] . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $requestArray['ebayimg6'] . '" border="0" alt="" />
                        </a>';
        }

        $watchdetails.= '</div>';

        if (sizeof($gemstonesArray) > 0 && !empty($gemstone[0]["gemstone"])) {
            $watchdetails.= '<div><table border="1" style="border-collapse:collapse;width:720px;" >';
            $watchdetails.= '<tr><th>Gem.</th><th>Class</th><th>Color</th><th>Month</th><th>Shape</th><th>#</th><th>weight</th><th>Setting</th></tr>';
            for ($j = 0; $j < sizeof($gemstonesArray); $j++) {
                $watchdetails.= '<tr><td align="center">' . $gemstonesArray[$j]["gemstone"] . '</td><td align="center">' . $gemstonesArray[$j]["class"] . '</td><td align="center">' . $gemstonesArray[$j]["color"] . '</td><td align="center">' . $gemstonesArray[$j]["birthstone_month"] . '</td><td align="center">' . $gemstonesArray[$j]["shape"] . '</td><td align="center">' . $gemstonesArray[$j]["number_of_gemstones"] . '</td><td align="center">' . $gemstonesArray[$j]["total_weight"] . '</td><td align="center">' . $gemstonesArray[$j]["settings"] . '</td></tr>';
            }
            $watchdetails.= '</table></div>';
        }
        $watchdetails.= '</div>
         

                    <div class="content_Box3">
                                            <table class="product_data_wrap" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="settTitle">Product Details:</td>
                        </tr>
                        <tr>
                          <td align="center">
                                  <table border="0" class="product_data" border="0" cellpadding="0" cellspacing="0">
                           
                         ';

        if (!empty($detail['item_sku'])) {
            $watchdetails.= '     <tr>
                             <td class="chartleft wborder">Item Sku:</td>
                             <td class="chartright wborder">' . $detail['item_sku'] . '</td>
                             </tr>';
        }
        if (!empty($detail['metal_type'])) {
            $watchdetails.= '   <tr>
                             <td class="chartleft">Metal:</td>
                             <td class="chartright">' . $detail['metal_type'] . '</td>
                             </tr>';
        }
        if (!empty($detail['metal_purity'])) {
            $watchdetails.= ' <tr>
                             <td class="chartleft">Metal Purity:</td>
                             <td class="chartright">' . $detail['metal_purity'] . '</td>
                             </tr>';
        }
        if (!empty($detail['metal_color'])) {
            $watchdetails.= '    <tr>
                             <td class="chartleft">Metal Color:</td>
                             <td class="chartright">' . $detail['metal_color'] . '</td>
                             </tr>';
        }
        if (!empty($detail['finish'])) {
            $watchdetails.= '  
                              <tr>
                             <td class="chartleft">Finish:</td>
                             <td class="chartright">' . $detail['finish'] . '</td>
                             </tr>';
        }
        if (!empty($detail['style'])) {

            $watchdetails.= '  
                              <tr>
                             <td class="chartleft">Style:</td>
                             <td class="chartright">' . $detail['style'] . '</td>
                             </tr>';
        }
        if (!empty($detail['ring_size'])) {
            $watchdetails.= '                            
                             <tr>
                             <td class="chartleft">Ring Size:</td>
                             <td class="chartright">' . $detail['ring_size'] . '</td>
                             </tr>';
        }
        if (!empty($detail['avail_size'])) {
            $watchdetails.= '                            
                               <tr>
                             <td class="chartleft">Available Sizes:</td>
                             <td class="chartright">' . $detail['avail_size'] . '</td>
                             </tr>';
        }
        if (!empty($detail['weight'])) {
            $watchdetails.= '                            
                               <tr>
                             <td class="chartleft">Weight:</td>
                             <td class="chartright">' . $detail['weight'] . '</td>
                             </tr>';
        }
        if (!empty($detail['measurements'])) {
            $watchdetails.= '                            
                               <tr>
                             <td class="chartleft">Measurements:</td>
                             <td class="chartright">' . $detail['measurements'] . '</td>
                             </tr>';
        }


        $watchdetails.= '    
                           
                               <tr>
                             <td class="chartleft">Our Price:</td>
                             <td class="chartright" style="color: rgb(204, 0, 0); font-weight: bold;">$' . number_format($detail['price_ebay'], 2) . '</td>
                             </tr>';
        if (!empty($detail['retail'])) {
            $watchdetails.= '<tr>
                             <td class="chartleft">Retail Price:</td>
                             <td class="chartright">' . number_format($detail['retail'], 2) . '</td>
                             </tr>                          ';
        }
        if (!empty($detail['length'])) {
            $watchdetails.= '<tr>
                             <td class="chartleft">length:</td>
                             <td class="chartright">' . $detail['length'] . '</td>
                             </tr>                          ';
        }
        if (!empty($detail['width'])) {
            $watchdetails.= '<tr>
                             <td class="chartleft">Width:</td>
                             <td class="chartright">' . $detail['width'] . '</td>
                             </tr>                          ';
        }

        if (!empty($detail['chain_type'])) {
            $watchdetails.= '<tr>
                             <td class="chartleft">Chain Type:</td>
                             <td class="chartright">' . $detail['chain_type'] . '</td>
                             </tr>                          ';
        }
        if (!empty($detail['chain_type'])) {
            $watchdetails.= '<tr>
                             <td class="chartleft">Chain Type:</td>
                             <td class="chartright">' . $detail['chain_type'] . '</td>
                             </tr>                          ';
        }
        if (!empty($detail['clasp_type'])) {
            $watchdetails.= '<tr>
                             <td class="chartleft">Clasp Type:</td>
                             <td class="chartright">' . $detail['clasp_type'] . '</td>
                             </tr>                          ';
        }
        if (!empty($detail['chain_weight'])) {
            $watchdetails.= '<tr>
                             <td class="chartleft">Chain Weight:</td>
                             <td class="chartright">' . $detail['chain_weight'] . '</td>
                             </tr>                          ';
        }
        if (!empty($detail['description'])) {
            $watchdetails.= '<tr>
                             <td class="chartleft">Description:</td>
                             <td class="chartright">' . $detail['description'] . '</td>
                             </tr>                          ';
        }

        $watchdetails.= '    
                        <tr>
                          <td colspan="2"><img alt="" src="http://diamondsforlife.info/ebaystore/settings_bottom1.gif"></td>
                        </tr>
                            </table>
                          </td>
        </tr></table>            
                    
                    </div>
                    <div style="clear:both;"></div>
                  </div>
               <div class="content_Box4">
                    <div class="tabbed_area">
                      <ul class="tabs">
                        <li><a href="javascript:tabSwitch(\'tab_1\', \'content_1\');" id="tab_1" class="active">Diamond Grading Information</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_2\', \'content_2\');" id="tab_2">Payment &amp; Shipping</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_3\', \'content_3\');" id="tab_3">Return Policy</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_4\', \'content_4\');" id="tab_4">About Us</a></li>
                      </ul>
                      <div id="content_1" class="content"> When purchasing an EGL, European Gemological Laboratory, certified diamond, you get what you pay for. EGL is one of the most trusted and respected diamond grading companies in the world. EGL was founded in Europe in 1974. Internationally known for its state-of-the art technology and innovative services, EGL, responds to the needs of all consumers and the jewelry industry. EGL certified grading is recognized by all major jewelers and diamond trading companies in the United States. EGL conducts business in the most unbiased manner, without influence from commercial interests or sales organizations.<div style="padding-top:10px;"></div><strong>We have access to the largest suppliers in the world. If we can\'t find the diamond you want, it does not exist!</strong></div>
                      <div id="content_2" class="content"> We only accept PayPal payments in US funds (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). Sorry, we DO NOT accept personal checks.
                        <div style="margin-top:8px;"></div>
                        Payment must be received within 4 days of end of auction. California residents must pay 8.75% sales tax.
                        <div align="left" style="margin-top:5px;"><img alt="" src="http://diamondsforlife.info/ebaystore/paypalcreditcards.gif"></div>
                        <div class="polheadings">Shipping: United States</div>
                        We ship all orders using FedEx or UPS Overnight. We process, insure and ship all orders within 2 business days of receipt of payment. For custom designs, and alterations, such as sizing, please allow up to an additional 5 business days. Longer delivery times are experienced during the holidays.
                        <div class="polheadings">Shipping: International</div>
                        We only accept international orders from the United Kingdom, Canada, Europe, Australia and Asia at this time. Shipping to these countries is $65 and such international residents can only pay with PayPal (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). IMPORT TAXES, DUTIES AND CHARGES ARE NOT INCLUDED IN THE ITEM PRICE. THESE CHARGES ARE THE BUYER\'S RESPONSIBILITY. PLEASE CHECK WITH YOUR COUNTRY\'S CUSTOMS OFFICE TO DETERMINE WHAT THESE ADDITIONAL COSTS WILL BE PRIOR TO BIDDING/BUYING. Thank you.</div>
                      <div id="content_3" class="content"> We offer a 100% unconditional 30 day money-back guarantee. We are so confident in the quality of our merchandise that if, for any reason, you are not satisfied with your purchase, we will reimburse you 100% of your purchase price.  We accept returns or exchanges within 30 days of the items receipt, with no restocking fee!  Any exchange, credit or refund will be for the original price paid.  Items must be in their original condition, and must not be altered in any way.  You must call us to obtain a return authorization PRIOR to shipping the item back to us. No packages will be accepted without a return authorization. This is especially important as we will also be giving you specific shipping instructions for your protection. Refunds will be processed through PayPal. All returns are guaranteed by Ebay and PayPal through the <a href="http://pages.ebay.com/paypal/buyer/protection.html" target="_blank">Buyer Protection Program</a>.</div>
                      <div id="content_4" class="content"> <img align="left" src="http://zkordiamonds.com/images/diamonddistrict.jpg" width="390" height="144">All of our diamonds come with a certificate of authenticity and have an unconditional 30 day full money-back guarantee. We can either have your diamond set and designed to your preference or sent to you loosely. We hope to ease any of your concerns you may have about purchasing diamonds on the internet. We pride ourselves in being dedicated to excellent customer service while selling our diamonds at the lowest prices possible. All of our diamonds are guaranteed to be 100% natural, with no artificial enhancements or treatments of any kind.
                      <div style="margin-top:8px;"></div>Diamond Engagement Rings NyC, Inc. allows you to bid with confidence. We have a reputation of being honest about our products and delivering quality diamonds at true wholesale prices. Our resourceful website can help you find the answers you are looking for. If your questions are not answered on our website, please Click Here to contact us or call us Toll-Free 1-(212) 302-7327. Our team is standing by waiting to serve you.</div>
                    </div>
                    <script type="text/javascript">
function tabSwitch(new_tab, new_content) {

	document.getElementById(\'content_1\').style.display = \'none\';
	document.getElementById(\'content_2\').style.display = \'none\';
	document.getElementById(\'content_3\').style.display = \'none\';
	document.getElementById(\'content_4\').style.display = \'none\';
	document.getElementById(new_content).style.display = \'block\';

	document.getElementById(\'tab_1\').className = \'\';
	document.getElementById(\'tab_2\').className = \'\';
	document.getElementById(\'tab_3\').className = \'\';
	document.getElementById(\'tab_4\').className = \'\';
	document.getElementById(new_tab).className = \'active\';		

}
</script>
                  </div>
                  <!-- policies //end -->
                </td>
              </tr>
            </table>
            <!-- landing page end -->
            <!-- footer start -->
            <div id="leftsealbox">
              <div class="leftsealboxwrap"><a href="#"><img alt="100% Satisfaction Guaranteed or your Money Back" title="100% Satisfaction Guaranteed or your Money Back" src="http://diamondsforlife.info/ebaystore/seal_moneyback.png" border="0" /></a></div>
              <div style="clear:both;"></div>
            </div>
            <table id="FooterWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="footerleft" valign="top" align="left"><div id="footertitle"><img alt="Can\'t find what you are looking for?" title="Can\'t find what you are looking for?" src="http://diamondsforlife.info/ebaystore/title_cantfind.gif" /></div>
                  <div id="footerinfo" align="left"><img align="left" alt="" src="http://diamondsforlife.info/ebaystore/cust_serv.png" />DiamondEngagementRingsNYC- deals with all kinds of jewelry and diamonds.<br />
                    We are available 24/7. <a href="http://contact.ebay.com/ws/eBayISAPI.dll?FindAnswers&frm=284&requested=nektadiamonds/" target="_blank">Click Here</a> to contact us or 
                    call us toll-free <span>(212) 302-7327</span> with the exact specifications of the diamond you are 
                    looking for. We will gladly contact you with a price within the same working day. </div></td>
                <td id="footerright" valign="top"><img alt="100% Positive Feedback" title="100% Positive Feedback" src="http://diamondsforlife.info/ebaystore/seal_blue.png" /><img alt="30 Day Money Back Guarantee" title="30 Day Money Back Guarantee" src="http://diamondsforlife.info/ebaystore/seal_green.png" /><img alt="Copyright Exclusive Design" title="Copyright Exclusive Design" src="http://diamondsforlife.info/ebaystore/seal_red.png" /><img alt="Free Overnight Shipping" title="Free Overnight Shipping" src="http://diamondsforlife.info/ebaystore/seal_yellow.png" /> </td>
              </tr>
              <tr>
                <td colspan="2" id="footerbottom" align="left" valign="top"><img alt="GIA - Gemological Institute of America" title="GIA - Gemological Institute of America" src="http://diamondsforlife.info/ebaystore/seal_gia.png" /><img alt="EGL - European Gemological Laboratory" title="EGL - European Gemological Laboratory" src="http://diamondsforlife.info/ebaystore/seal_egl.png" /><img class="bldia" alt="Stop Blood Diamonds" title="Stop Blood Diamonds" src="http://diamondsforlife.info/ebaystore/seal_blooddiamonds.png" /><img alt="Paypal Verified" title="Paypal Verified" src="http://diamondsforlife.info/ebaystore/seal_paypalverified.png" /></td>
              </tr>
            </table>
            <!-- footer end -->
            <div align="center" id="credit">All Imagery & Content &copy;2010 DIAMOND ENGAGEMENT RING SNYC</a></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<div class="scrollgal" align="center">

</div>
';


        //die('ppt');
        if (get_magic_quotes_gpc()) {
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }

        $requestArray['ItemSpecification'] = $this->getItemRingSpecification($detail);
        $requestArray['listingDuration'] = 'GTC';
        $requestArray['dispatchTime'] = '10';
        $requestArray['startPrice'] = $detail['price_ebay'];
        $requestArray['buyItNowPrice'] = '0.0';

        if (empty($detail['quantity']) || $detail['quantity'] == 0) {
            $detail['quantity'] = 1;
        }
        $requestArray['quantity'] = $detail['quantity'];

        $requestArray['packageDepth'] = 3;
        $requestArray['packageLength'] = 12;
        $requestArray['packageWidth'] = 10;
        $requestArray['weightMajor'] = 1;
        $requestArray['weightMinor'] = 2;

        //  $requestArray['ebay_upload_type'] = $detail['ebay_upload_type'];
        $requestArray['width'] = $detail['width'];
        $requestArray['length'] = $detail['length'];
        $requestArray['weight'] = $detail['weight'];

        $requestArray['clasp'] = $detail['clasp_type'];

        $requestArray['itemID'] = $detail['ebayid'];
        $requestArray['image'] = $ringImage;
        $requestArray['replace_gurantee'] = 'Days_30';

        if ($detail['ebayid'] == '' || $detail['ebayid'] == 0) {
            $itemID = $this->sendRequestEbay($requestArray, 'rings');
        } else {
            $itemID = $this->updateRequestEbay($requestArray, 'rings');
        }
        return $itemID;
    }

    function getItemRingSpecification($detail) {

        $remArr = array(" ", "ct.", "ct tw");
        $total_carats = str_replace($remArr, "", $detail['total_carats']);
        $specification = '<ItemSpecifics>

                                          <NameValueList>
                                                <Name>Metal</Name>
                                                <Value>' . $detail['metal_type'] . '</Value>
                                          </NameValueList>
                                          <NameValueList>
                                                <Name>Exact Carat Total Weight</Name>
                                                <Value>' . $total_carats . '</Value>
                                          </NameValueList>
                                          <NameValueList>
                                                <Name>Main Stone Treatment</Name>
                                                <Value>Not Enhanced</Value>
                                          </NameValueList>
                                         <NameValueList>
                                                <Name>Metal Purity</Name>
                                                <Value>' . $detail['metal_purity'] . '</Value>
                                          </NameValueList>
                                </ItemSpecifics>';
        $specification .= '<ConditionID>1000</ConditionID>';

        return $specification;
    }

    function getItemWatchSpecification($detail) {
        $remArr = array(" ", "ct.", "ct tw");
        $total_carats = str_replace($remArr, "", $detail['total_carats']);
        $gender = ($detail['gender'] == 'men') ? "Men's" : "Women's";
        $metalarray = array('gold_ss' => 'Stainless Steel &amp; Gold', 'ss' => 'Stainless Steel', 'gold' => 'Gold');
        $style = ($detail['style'] == 'preowned') ? "Used" : "New";
        $specification = '<ItemSpecifics>
                                          <NameValueList>
                                                <Name>Type</Name>
                                                <Value>Na</Value>
                                          </NameValueList>
                                          <NameValueList>
                                                <Name>Brand</Name>
                                                <Value>' . $detail['brand'] . '</Value>
                                          </NameValueList>
                                          <NameValueList>
                                                <Name>Gender</Name>
                                                <Value>' . $gender . '</Value>
                                          </NameValueList>
                                          <NameValueList>
                                                <Name>Age</Name>
                                                <Value>Na</Value>
                                          </NameValueList>
                                          <NameValueList>
                                                <Name>Movement</Name>
                                                <Value>Na</Value>
                                          </NameValueList>
                                         <NameValueList>
                                                <Name>Band Material</Name>
                                                <Value>' . $metalarray[$detail['metal']] . '</Value>
                                          </NameValueList>
                                </ItemSpecifics>';
        if ($style == 'Used')
            $specification .= '<ConditionID>3000</ConditionID>';
        else
            $specification .= '<ConditionID>1000</ConditionID>';

        return $specification;
    }

    function updateRequestEbay($requestArray, $section = 'watches') {

        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        $siteID = 0;
        $verb = 'ReviseItem';

        $requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        $requestXmlBody .= '<ReviseItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
        $requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
        $requestXmlBody .= "<Version>$compatabilityLevel</Version>";
        $requestXmlBody .= '<Item>';
        $requestXmlBody .= '<ItemID>' . $requestArray['itemID'] . '</ItemID>';
        $requestXmlBody .= '<Storefront>
                                  <StoreCategoryID>' . $requestArray['storeCategoryID'] . '</StoreCategoryID>
                                    </Storefront>';
        //$requestXmlBody .= "<Quantity>".$requestArray['quantity']."</Quantity>";
        if (strlen($requestArray['itemTitle']) > 80) {
            $title = substr($requestArray['itemTitle'], 0, 80);
        } else {
            $title = $requestArray['itemTitle'];
            $length = strlen($requestArray['itemTitle']);
            $loop = 79 - $length;
            $title = $requestArray['itemTitle'];
            $string1 = '';
            $loop = $loop / 6;
            for ($k = 0; $k < $loop - 1; $k++) {
                $string1 = $string1 . "      ";
            }
            $title = $title . $string1;
        }

        $requestXmlBody .= "<Title><![CDATA[" . $title . "]]></Title>";
        $requestXmlBody .= "<Description><![CDATA[" . $requestArray['itemDescription'] . "]]></Description>";
        if ($requestArray['ebay_upload_type'] == 'bestoffer') {
            $requestXmlBody .= '<ListingDetails>
                  <ConvertedBuyItNowPrice currencyID="USD">0.00</ConvertedBuyItNowPrice>
                  <ConvertedStartPrice currencyID="USD">' . $requestArray['startPrice'] . '</ConvertedStartPrice>
                  <ConvertedReservePrice currencyID="USD">0.0</ConvertedReservePrice>
                  <MinimumBestOfferPrice currencyID="USD">' . round($requestArray['startPrice'] * .85) . '</MinimumBestOfferPrice>
                           </ListingDetails>';
        }
        $requestXmlBody .= '<Quantity>' . $requestArray['quantity'] . '</Quantity>';
        $requestXmlBody .= $requestArray['ItemSpecification']; //$requestArray['AttributeArray'];
        $requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">0.00</BuyItNowPrice>";
        if ($requestArray['startPrice'] > 10000) {
            $requestXmlBody .= '<AutoPay>True</AutoPay>';
        }
        $requestXmlBody .= "<StartPrice>" . $requestArray['startPrice'] . "</StartPrice>";
        $requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
        if ($requestArray['ebay_upload_type'] == 'bestoffer') {
            $requestXmlBody .= '<BestOfferDetails>
                                         <BestOfferCount>1</BestOfferCount>
                                           <BestOfferEnabled>ture</BestOfferEnabled>
                                   </BestOfferDetails>';
        } else {

            $requestXmlBody .= '<BestOfferDetails>
                                         <BestOfferCount>1</BestOfferCount>
                                           <BestOfferEnabled>false</BestOfferEnabled>
                                   </BestOfferDetails>';
        }

        $requestXmlBody .= '<ReturnPolicy>
                                                                <ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
                                                                <RefundOption>MoneyBack</RefundOption>
                                                                <ReturnsWithinOption>' . $requestArray['replace_gurantee'] . '</ReturnsWithinOption>
                                                                <Description>PLEASE VISIT OUR EBAY STORE FOR A DETAILED RETURN POLICY.</Description>
                                                                  <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
                                                                  <ShippingCostPaidBy>Buyer</ShippingCostPaidBy>
                                                        </ReturnPolicy>
                                                        <ShippingDetails>
                                                                <ApplyShippingDiscount>false</ApplyShippingDiscount>
<!--                                                                <CalculatedShippingRate>
                                                                          <OriginatingPostalCode>11201</OriginatingPostalCode>

                                                                          <PackageDepth unit="in" measurementSystem="English">' . $requestArray['packageDepth'] . '</PackageDepth>
                                                                          <PackageLength unit="in" measurementSystem="English">' . $requestArray['packageLength'] . '</PackageLength>
                                                                          <PackageWidth unit="in" measurementSystem="English">' . $requestArray['packageWidth'] . '</PackageWidth>
                                                                          <PackagingHandlingCosts currencyID="USD">5.99</PackagingHandlingCosts>
                                                                          <ShippingIrregular>false</ShippingIrregular>
                                                                          <ShippingPackage>PackageThickEnvelope</ShippingPackage>
                                                                          <WeightMajor unit="lbs" measurementSystem="English">' . $requestArray['weightMajor'] . '</WeightMajor>
                                                                          <WeightMinor unit="oz" measurementSystem="English">' . $requestArray['weightMinor'] . '</WeightMinor>

                                                                          <PackageDepth unit="in" measurementSystem="English">3</PackageDepth>
                                                                          <PackageLength unit="in" measurementSystem="English">12</PackageLength>
                                                                          <PackageWidth unit="in" measurementSystem="English">10</PackageWidth>
                                                                          <PackagingHandlingCosts currencyID="USD">5.99</PackagingHandlingCosts>
                                                                          <ShippingIrregular>true</ShippingIrregular>
                                                                          <ShippingPackage>LargeEnvelope</ShippingPackage>
                                                                          <WeightMajor unit="lbs" measurementSystem="English">0</WeightMajor>
                                                                          <WeightMinor unit="oz" measurementSystem="English">2</WeightMinor>
                                                                          <InternationalPackagingHandlingCosts currencyID="USD">55.99</InternationalPackagingHandlingCosts>
                                                                </CalculatedShippingRate>
-->
													<SalesTax>
													<SalesTaxPercent>8.875</SalesTaxPercent>
													<SalesTaxState>NY</SalesTaxState>
													<ShippingIncludedInTax>true</ShippingIncludedInTax>
													</SalesTax>

													<ShippingServiceOptions>
													<ShippingService>USPSFirstClass</ShippingService>
													<ShippingServiceCost>0.00</ShippingServiceCost>
													<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
													<ShippingServicePriority>1</ShippingServicePriority>
													<FreeShipping>true</FreeShipping>
													<ExpeditedService>false</ExpeditedService>
													<ShippingTimeMin>1</ShippingTimeMin>
													<ShippingTimeMax>6</ShippingTimeMax>
													<FreeShipping>true</FreeShipping>
													</ShippingServiceOptions>

													<ShippingServiceOptions>
													<ShippingService>USPSPriority</ShippingService>
													<ShippingServiceCost>8.99</ShippingServiceCost>
													<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
													<ShippingServicePriority>2</ShippingServicePriority>
													<ExpeditedService>false</ExpeditedService>
													<ShippingTimeMin>1</ShippingTimeMin>
													<ShippingTimeMax>3</ShippingTimeMax>
													</ShippingServiceOptions>

													<ShippingServiceOptions>
													<ShippingService>USPSExpressMail</ShippingService>
													<ShippingServicePriority>3</ShippingServicePriority>
													<ShippingServiceCost>29.99</ShippingServiceCost>
													<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
													<ExpeditedService>false</ExpeditedService>
													<ShippingTimeMin>1</ShippingTimeMin>
													<ShippingTimeMax>6</ShippingTimeMax>
													</ShippingServiceOptions>

													<InternationalShippingServiceOption>
													<ShippingService>USPSExpressMailInternational</ShippingService>
													<ShippingServiceCost>55.00</ShippingServiceCost>
													<ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
													<ShippingServicePriority>1</ShippingServicePriority>
													<ShipToLocation>Europe</ShipToLocation>
													<ShipToLocation>Asia</ShipToLocation>
													<ShipToLocation>CA</ShipToLocation>
													<ShipToLocation>GB</ShipToLocation>
													<ShipToLocation>AU</ShipToLocation>
													<ShipToLocation>DE</ShipToLocation>
													<ShipToLocation>JP</ShipToLocation>
													</InternationalShippingServiceOption>

													<TaxTable>  
														  <TaxJurisdiction>
																<JurisdictionID>CA</JurisdictionID>
																<SalesTaxPercent>0.00</SalesTaxPercent>
																<ShippingIncludedInTax>true</ShippingIncludedInTax>
														 </TaxJurisdiction>
													</TaxTable>
                                                </ShippingDetails>';
        if (!empty($requestArray['image1'])) {
            $requestXmlBody .= '<PictureDetails><GalleryType>Gallery</GalleryType>
                  <GalleryURL>' . config_item('base_url') . $requestArray['image1'] . '</GalleryURL>';
        }

        if ($requestArray['ebayimg1']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg1'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg2']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg2'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg3']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg3'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg4']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg4'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg5']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg5'] . '</PictureURL>';
        }
        if ($requestArray['ebayimg6']) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg6'] . '</PictureURL>';
        }
        if (!empty($requestArray['image1'])) {
            $requestXmlBody .= '</PictureDetails>';
        }
        $requestXmlBody .= '</Item>';
        $requestXmlBody .= '</ReviseItemRequest>';


        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);

        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);

        $responses = $responseDoc->getElementsByTagName("ReviseItemResponse");



        foreach ($responses as $response) {
            $acks = $response->getElementsByTagName("Ack");
            $ack = $acks->item(0)->nodeValue;
            //echo "Ack = $ack <BR />\n";   // Success if successful
        }
        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');

        //if there are error nodes
        //if($errors->length > 0)
        if ($ack == 'Failure') { //echo '<br>'.die('xyz');
            foreach ($errors AS $error) {
                $SeverityCode = $error->getElementsByTagName('SeverityCode');
                //echo '<br>'.$SeverityCode->item(0)->nodeValue;
                if ($SeverityCode->item(0)->nodeValue == 'Error') {
                    $status = '<P><B>eBay returned the following error(s) while updating an item:</B>';
                    //display each error
                    //Get error code, ShortMesaage and LongMessage
                    $code = $error->getElementsByTagName('ErrorCode');
                    $shortMsg = $error->getElementsByTagName('ShortMessage');
                    $longMsg = $error->getElementsByTagName('LongMessage');
                    $errorCode = $code->item(0)->nodeValue;
                    if ($errorCode == 291 || $errorCode == 17) {
                        $status = $this->sendRequestEbay($requestArray, $section);
                    } else {
                        //Display code and shortmessage
                        $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
                        //if there is a long message (ie ErrorLevel=1), display it
                        if (count($longMsg) > 0)
                            $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
                    }
                }
            }
            echo $status;
        } else { //no errors
            //get results nodes
            $responses = $responseDoc->getElementsByTagName("ReviseItemResponse");

            foreach ($responses as $response) {
                $acks = $response->getElementsByTagName("Ack");
                $ack = $acks->item(0)->nodeValue;
                //echo "Ack = $ack <BR />\n";   // Success if successful

                $endTimes = $response->getElementsByTagName("EndTime");
                $endTime = $endTimes->item(0)->nodeValue;
                //echo "endTime = $endTime <BR />\n";

                $itemIDs = $response->getElementsByTagName("ItemID");
                $itemID = $itemIDs->item(0)->nodeValue;
                // echo "itemID = $itemID <BR />\n";

                $linkBase = "http://cgi.sandbox.ebay.com/ws/eBayISAPI.dll?ViewItem&item=";
                $status = "<a href=$linkBase" . $itemID . ">" . $requestArray['itemTitle'] . "</a> <BR />";

                $feeNodes = $responseDoc->getElementsByTagName('Fee');
                foreach ($feeNodes as $feeNode) {
                    $feeNames = $feeNode->getElementsByTagName("Name");
                    if ($feeNames->item(0)) {
                        $feeName = $feeNames->item(0)->nodeValue;
                        $fees = $feeNode->getElementsByTagName('Fee');  // get Fee amount nested in Fee
                        $fee = $fees->item(0)->nodeValue;
                        if ($fee > 0.0) {
                            if ($feeName == 'ListingFee') {
                                $status .= "<B>$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                            } else {
                                $status .= "$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                            }
                        }  // if $fee > 0
                    } // if feeName
                } // foreach $feeNode
            } // foreach response
        } // if $errors->length > 0
        //echo $status;
    }

    function getmounts($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'modules where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT    	stock_number FROM  ' . $this->config->item('table_perfix') . 'modules  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }

    function product($post, $action = 'view', $rootparentname, $id = 0) {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        //$rootparentname = $post['rootparentname'];
        if ($action == 'delete') {
            /* $items = rtrim($_POST['items'],",");
              $itemsArr = explode(',',$items);
              foreach($itemsArr AS $index=>$value) {
              $itemDetail = $this->getAllByProductID($value);

              //$itemDetail = $this->getAllByProductID(67706);
              $sql = "DELETE FROM ".$this->config->item('table_perfix')."new_product WHERE id = $value";
              $result = $this->db->query($sql);
              if($itemDetail['ebay_product_id'] != '' && $itemDetail['ebay_product_id'] !=0) {
              $status = $this->endFixedPriceBid($itemDetail['ebay_product_id']);
              }
              } */
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $itemDetail = $this->getAllByProductID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "new_product WHERE id = $value";
                    $result = $this->db->query($sql);
                    if ($itemDetail['ebay_product_id'] != '' && $itemDetail['ebay_product_id'] != 0) {
                        $status = $this->endFixedPriceBid($itemDetail['ebay_product_id']);
                    }
                }
            }

            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {


            if (is_array($post)) {
                //print_r($post);
                $skipField = array('0' => 'thumbnail_pic', '1' => 'main_pic');
                foreach ($post as $index => $value) {

                    if ($index == $action . 'btn')
                        continue;

                    if ($action == 'edit') {
                        if (in_array($value, $skipField))
                            continue;
                    }

                    $field[$index] = $value;
                }
                if ($post['is_featured']) {
                    $is_featured = 1;
                } else {
                    $is_featured = 0;
                }
                $field['is_featured'] = $is_featured;

                if ($post['is_on_clearance']) {
                    $is_on_clearance = 1;
                    $clearance_price = $post['clearance_price'];
                } else {
                    $is_on_clearance = 0;
                    $clearance_price = '';
                }
                $field['is_on_clearance'] = $is_on_clearance;
                $field['clearance_price'] = $clearance_price;

                if ($action == 'add') {

                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'new_product', $field
                    );
                    $rid = $this->db->insert_id();
                    //$productArr = $this->getAllByProductID($rid);
                    //$this->addProducttoEbay($productArr);
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('id', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'new_product', $field
                    );
                    //$productArr = $this->getAllByProductID($rid);
                    // $this->addProducttoEbay($productArr);
                }

                if ($_FILES['thumbnail_pic']['name'] != '') {
                    $file = $rid . '_thumb';
                    $this->uploadfile($_FILES, 'thumbnail_pic', 'images/products', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/products', $file, 'new_product', 'id', $rid, 'thumbnail_pic');
                }

                if ($_FILES['main_pic']['name'] != '') {
                    $file = $rid . '_main';
                    $this->uploadfile($_FILES, 'main_pic', 'images/products', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/products', $file, 'new_product', 'id', $rid, 'main_pic');
                }
                $productArr = $this->getAllByProductID($rid);
                $this->addProducttoEbay($productArr);

                if ($isinsert)
                    $retuen['success'] .= '<h1 class="success">Product info Successfully ' . ucfirst($action) . 'ed .</h1><br /><br /><small> <a href="' . config_item('base_url') . 'admin/product/edit/' . $post['categoryid'] . '/' . $rid . '">Click Here </a> To View/Edit</small>';
            }
        }

        return $retuen;
    }

    function getcategory($page = 1, $rp = 10, $sortname = 'category_name', $sortorder = 'desc', $query = '', $qtype = 'category_name', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND parentid = $oid";


        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'category where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'category where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }

    function getProductCount($categoryid, $section) {

        switch ($section) {
            case 'Loose_Diamonds':
                $sql = 'SELECT  count(*) as total FROM  ' . $this->config->item('table_perfix') . 'products where 1=1 ';
                break;
            case 'Featured_Collection':
                $sql = 'SELECT  count(*) as total FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1 and is_featured = 1';
                break;
            case 'Clearance_Vault':
                $sql = 'SELECT  count(*) as total FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1 and is_on_clearance=1';
                break;
            default :
                $sql = 'SELECT  count(*) as total FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1 and categoryid=' . $categoryid;
                break;
        }


        //var_dump($sql);
        $result = $this->db->query($sql);

        $return = $result->result_array();
        return $return[0];
    }

    function getProduct($page = 1, $rp = 10, $sortname = 'id', $sortorder = 'desc', $query = '', $qtype = 'categoryid', $oid = '', $section) {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype = '$query' ";
        //if($oid != '') $qwhere .= " AND id = $oid";

        switch ($section) {
            case 'Loose_Diamonds' :
                $sort = "ORDER BY lot $sortorder";

                $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'products where 1=1 ' . $sort . ' ' . $limit;
                // $sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'products where 1=1 '.' ' . $sort . ' '. $limit;
                //var_dump($sql);
                $result = $this->db->query($sql);
                $results['result'] = $result->result_array();
                $sql2 = 'SELECT lot FROM  ' . $this->config->item('table_perfix') . 'products where 1=1 ';
                // $sql2 = 'SELECT lot FROM  '. $this->config->item('table_perfix').'products where 1=1 ';
                $result2 = $this->db->query($sql2);
                $results['count'] = $result2->num_rows();
                break;
            case 'Featured_Collection':
                $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1  AND is_featured = 1 ' . $sort . ' ' . $limit;
                // $sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'products where 1=1 '.' ' . $sort . ' '. $limit;
                //var_dump($sql);
                $result = $this->db->query($sql);
                $results['result'] = $result->result_array();
                $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1 AND is_featured = 1';
                // $sql2 = 'SELECT lot FROM  '. $this->config->item('table_perfix').'products where 1=1 ';
                $result2 = $this->db->query($sql2);
                $results['count'] = $result2->num_rows();
                break;
            case 'Clearance_Vault':
                $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1 AND is_on_clearance = 1 ' . $sort . ' ' . $limit;
                // $sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'products where 1=1 '.' ' . $sort . ' '. $limit;
                //var_dump($sql);
                $result = $this->db->query($sql);
                $results['result'] = $result->result_array();
                $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1 AND is_on_clearance = 1';
                // $sql2 = 'SELECT lot FROM  '. $this->config->item('table_perfix').'products where 1=1 ';
                $result2 = $this->db->query($sql2);
                $results['count'] = $result2->num_rows();
                break;
            default:
                $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
                // $sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'products where 1=1 '.' ' . $sort . ' '. $limit;
                //var_dump($sql);
                $result = $this->db->query($sql);
                $results['result'] = $result->result_array();
                $sql2 = 'SELECT id FROM  ' . $this->config->item('table_perfix') . 'new_product where 1=1 ' . $qwhere;
                // $sql2 = 'SELECT lot FROM  '. $this->config->item('table_perfix').'products where 1=1 ';
                $result2 = $this->db->query($sql2);
                $results['count'] = $result2->num_rows();
                break;
        }
        return $results;
    }

    function getCategoryCount($categoryid) {

        $sql = 'SELECT  count(*) as total FROM  ' . $this->config->item('table_perfix') . 'category where 1=1 and parentid=' . $categoryid;
        //var_dump($sql);
        $result = $this->db->query($sql);

        $return = $result->result_array();
        return $return[0];
    }

    function category($post, $action = 'view', $rootparentname, $id = 0) {
        //print_r($_GET);
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        //$rootparentname = $post['rootparentname'];
        if ($action == 'delete') {

            $items = rtrim($_POST['items'], ",");
            $itemsArray = explode(',', $items);
            foreach ($itemsArray AS $index => $value) {
                $catDetail = $this->getAllByCategoryID($value);
                //$catDetail = $this->getAllByCategoryID(54);
                $itemString .= $catDetail['id'] . '#' . $catDetail['ebay_cat_id'] . '~';
                //$itemString .= $this->getAllCategories(54);
                $itemString = $this->getAllCategories($catDetail['id']);
            }
            $strArray = explode('~', $itemString);
            foreach ($strArray As $strIndex => $strValue) {
                $cat_ebay_array = explode('#', $strValue);
                $cat_id .= $cat_ebay_array[0] . ',';
                if ($cat_ebay_array[1] != '' && $cat_ebay_array[1] != 0) {
                    $ebay_id .= $cat_ebay_array[1] . ',';
                }
            }

            $catid = rtrim($cat_id, ',');
            //print_r($catArray);
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "new_product WHERE categoryid IN ($catid)";
            $result = $this->db->query($sql);
            $sql = "DELETE FROM " . $this->config->item('table_perfix') . "category WHERE id IN ($catid)";
            //die('pp');
            $result = $this->db->query($sql);
            $total = count(explode(",", $cat_id));
            if ($ebay_id != '') {
                $ebay_id = rtrim($ebay_id, ',');
                $this->deleteEbayCategory($ebay_id);
            }
            $retuen['total'] = $total;
        } else {


            if (is_array($post)) {

                $parentid = ($post['parentid'] != '') ? $post['parentid'] : 0;
                $image = isset($post['image']) ? $post['image'] : 0;
                $category_description = isset($post['category_description']) ? $post['category_description'] : '';
                $category_label = isset($post['category_label']) ? $post['category_label'] : '';
                $find = array(" ", "-");
                $replace = '_';
                $category_name = str_replace($find, $replace, $category_label);

                if ($action == 'add') {

                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'category', array(
                        'category_label' => $category_label,
                        'category_description' => $category_description,
                        'parentid' => $parentid,
                        'image' => $image,
                        'category_name' => $category_name,
                            )
                    );
                    $rid = $this->db->insert_id();

                    //$catArr = $this->getAllByCategoryID($rid);
                    //$ebay_cat_id = $this->addCustomEbayCategory($catArr);
                }
                if ($action == 'edit') {
                    $rid = $id;

                    $this->db->where('id', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'category', array(
                        'category_label' => $category_label,
                        'category_description' => $category_description,
                        'parentid' => $parentid,
                            )
                    );
                }

                if ($_FILES['image']['name'] != '') {

                    $file = str_replace($find, $replace, $category_label) . '_' . $rid;
                    $this->uploadfile($_FILES, 'image', 'images/category', 'jpeg,gif,jpg,bmp,png', 'images/category', $file, 'category', 'id', $rid, 'image');
                }
                $catArr = $this->getAllByCategoryID($rid);

                if ($catArr['ebay_cat_id'] == '' || $catArr['ebay_cat_id'] == 0) {
                    $ebay_cat_id = $this->addCustomEbayCategory($catArr);
                } else {
                    $ebay_cat_id = $this->updateCustomEbayCategory($catArr);
                }
                if ($isinsert)
                    $retuen['success'] .= '<h1 class="success">Category info Successfully ' . ucfirst($action) . 'ed .</h1><br /><br /><small> <a href="' . config_item('base_url') . 'admin/category/edit/' . $parentid . '/' . $rid . '">Click Here </a> To View</small>';
            }
        }

        return $retuen;
    }

    function addCustomEbayCategory($detailArr) {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        //SiteID must also be set in the Request's XML
        //SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
        //SiteID Indicates the eBay site to associate the call with
        $siteID = 0;
        //the call being made:
        $verb = 'SetStoreCategories';
        //echo 'devid'.$devID;
        ///Build the request Xml string
        if ($detailArr['parentid'] == 0) {
            $dest_cat_id = '-999';
        } else {
            $catArr = $this->getAllByCategoryID($detailArr['parentid']);
            $dest_cat_id = $catArr['ebay_cat_id'];
        }
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>';
        $requestXmlBody .= '<SetStoreCategoriesRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= "<Version>551</Version>";
        $requestXmlBody .= '<Action>Add</Action>';
        //$requestXmlBody .= '<ItemDestinationCategoryID>14122</ItemDestinationCategoryID>';
        $requestXmlBody .= '<DestinationParentCategoryID>' . $dest_cat_id . '</DestinationParentCategoryID>';
        $requestXmlBody .= '<StoreCategories>';
        $requestXmlBody .= '<CustomCategory>';
        $requestXmlBody .= "<Name>" . $detailArr['category_label'] . "</Name>";
        $requestXmlBody .= '</CustomCategory>';
        $requestXmlBody .= '</StoreCategories>';
        $requestXmlBody .= "</SetStoreCategoriesRequest>";

        //echo $requestXmlBody;
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        //print_r($responseXml);
        //die('tt');
        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');

        //if there are error nodes
        if ($errors->length > 0) {
            $status = '<P><B>eBay returned the following error(s):</B>';
            //display each error
            //Get error code, ShortMesaage and LongMessage
            $code = $errors->item(0)->getElementsByTagName('ErrorCode');
            $shortMsg = $errors->item(0)->getElementsByTagName('ShortMessage');
            $longMsg = $errors->item(0)->getElementsByTagName('LongMessage');
            //Display code and shortmessage
            $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
            //if there is a long message (ie ErrorLevel=1), display it
            if (count($longMsg) > 0)
                $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
            echo $status;
        } else { //no errors
            $responses = $responseDoc->getElementsByTagName("SetStoreCategoriesResponse");
            // print_r($responses);

            foreach ($responses as $response) {

                $customNodes = $response->getElementsByTagName('CustomCategory');
                foreach ($customNodes as $custom) {
                    $customCategories = $custom->getElementsByTagName("CustomCategory");
                    foreach ($customCategories AS $customCategory) {
                        //$catNames = $customCategory->getElementsByTagName("Name");
                        $catIDS = $customCategory->getElementsByTagName("CategoryID");
                        //echo 'Category'.$catNames->item(0)->nodeValue.'<br>';
                        //echo 'Category ID'.$catIDS->item(0)->nodeValue.'<br>';
                        $ebay_cat_id = $catIDS->item(0)->nodeValue;
                    }
                }
            }

            $this->db->where('id', $detailArr['id']);
            $isinsert = $this->db->update($this->config->item('table_perfix') . 'category', array(
                'ebay_cat_id' => $ebay_cat_id,
                    )
            );
        }
    }

    function updateCustomEbayCategory($detailArr) {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        //SiteID must also be set in the Request's XML
        //SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
        //SiteID Indicates the eBay site to associate the call with
        $siteID = 0;
        //the call being made:
        $verb = 'SetStoreCategories';
        //echo 'devid'.$devID;
        ///Build the request Xml string

        $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>';
        $requestXmlBody .= '<SetStoreCategoriesRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= "<Version>551</Version>";
        $requestXmlBody .= '<Action>Rename</Action>';
        $requestXmlBody .= '<StoreCategories>';
        $requestXmlBody .= '<CustomCategory>';
        $requestXmlBody .= '<CategoryID>' . $detailArr['ebay_cat_id'] . '</CategoryID>';
        $requestXmlBody .= "<Name>" . $detailArr['category_label'] . "</Name>";
        $requestXmlBody .= '</CustomCategory>';
        $requestXmlBody .= '</StoreCategories>';
        $requestXmlBody .= "</SetStoreCategoriesRequest>";

        //echo $requestXmlBody;
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        //print_r($responseXml);
        //die('pp');
        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');

        //if there are error nodes
        if ($errors->length > 0) {
            $status = '<P><B>eBay returned the following error(s):</B>';
            //display each error
            //Get error code, ShortMesaage and LongMessage
            $code = $errors->item(0)->getElementsByTagName('ErrorCode');
            $shortMsg = $errors->item(0)->getElementsByTagName('ShortMessage');
            $longMsg = $errors->item(0)->getElementsByTagName('LongMessage');
            //Display code and shortmessage
            $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
            //if there is a long message (ie ErrorLevel=1), display it
            if (count($longMsg) > 0)
                $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
            echo $status;
        } else { //no errors
            $responses = $responseDoc->getElementsByTagName("SetStoreCategoriesResponse");
            // print_r($responses);

            foreach ($responses as $response) {

                $customNodes = $response->getElementsByTagName('CustomCategory');
                foreach ($customNodes as $custom) {
                    $customCategories = $custom->getElementsByTagName("CustomCategory");
                    foreach ($customCategories AS $customCategory) {
                        //$catNames = $customCategory->getElementsByTagName("Name");
                        $catIDS = $customCategory->getElementsByTagName("CategoryID");
                        //echo 'Category'.$catNames->item(0)->nodeValue.'<br>';
                        //echo 'Category ID'.$catIDS->item(0)->nodeValue.'<br>';
                        $ebay_cat_id = $catIDS->item(0)->nodeValue;
                    }
                }
            }
        }
    }

    function getAllByCategoryID($catid) {
        $qry = "SELECT * FROM " . config_item('table_perfix') . "category
                                WHERE id = '" . $catid . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function getAllByProductID($pid) {
        $qry = "SELECT * FROM " . config_item('table_perfix') . "new_product
                                WHERE id = '" . $pid . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function getRootCategory($categoryarray) {

        if ($categoryarray['parentid'] == 0) {
            return $categoryarray['category_name'];
        } else {
            //$category_name = $this->getRootParent($categoryarray['parentid']);
            //$section = $category_name;

            $qry = "SELECT * FROM " . config_item('table_perfix') . "category
                                        WHERE id = '" . $categoryarray[parentid] . "'
                                        ";
            $return = $this->db->query($qry);
            $result = $return->result_array();
            foreach ($result as $key => $value) {
                if ($value['parentid'] == 0) {
                    return $value['category_name'];
                } else {
                    getRootParent($value);
                }
            }
        }
    }

    function getInfoFieldEbay($parent) {
        switch ($parent) {

            case 'Colored_Diamond_Studs':
                $viewField = array('0' => array('label' => 'ITEM NAME', 'field' => 'product_name'),
                    '1' => array('label' => 'TOTAL WEIGHT', 'field' => 'total_weight'),
                    '2' => array('label' => 'OUR PRICE', 'field' => 'price')
                );
                break;
            case 'Black_Diamond_Studs':
                $viewField = array('0' => array('label' => 'ITEM NAME', 'field' => 'product_name'),
                    '1' => array('label' => 'SETTING', 'field' => 'setting'),
                    '2' => array('label' => 'METAL', 'field' => 'metal'),
                    '3' => array('label' => 'SHAPE', 'field' => 'shape'),
                    '4' => array('label' => 'TOTAL WEIGHT', 'field' => 'total_weight'),
                    '5' => array('label' => 'CENTER DIAMOND WEIGHT', 'field' => 'center_diamond_weight'),
                    '6' => array('label' => 'OUR PRICE', 'field' => 'price')
                );
                break;
            case 'Margarita_Studs':
                $viewField = array('0' => array('label' => 'ITEM NAME', 'field' => 'product_name'),
                    '1' => array('label' => 'TOTAL WEIGHT', 'field' => 'total_weight'),
                    '2' => array('label' => 'SETTING', 'field' => 'setting'),
                    '3' => array('label' => 'CLARITY', 'field' => 'clarity'),
                    '4' => array('label' => 'COLOR', 'field' => 'color'),
                    '5' => array('label' => 'SHAPE', 'field' => 'shape'),
                    '6' => array('label' => 'OUR PRICE', 'field' => 'price')
                );
                break;
            case 'Diamond_Hoops':
                $viewField = array('0' => array('label' => 'ITEM NAME', 'field' => 'product_name'),
                    '1' => array('label' => 'TOTAL WEIGHT', 'field' => 'total_weight'),
                    '2' => array('label' => 'OUR PRICE', 'field' => 'price')
                );
                break;
            case 'Black_Diamond_Necklaces':
                $viewField = array('0' => array('label' => 'ITEM NAME', 'field' => 'product_name'),
                    '1' => array('label' => 'TOTAL WEIGHT', 'field' => 'total_weight'),
                    '2' => array('label' => 'METAL', 'field' => 'metal'),
                    '3' => array('label' => 'OUR PRICE', 'field' => 'price')
                );
                break;
            case 'Earring_Accessories':
                $viewField = array('0' => array('label' => 'ITEM NAME', 'field' => 'product_name'),
                    '1' => array('label' => 'OUR PRICE', 'field' => 'price')
                );
                break;
        }
        return $viewField;
    }

    function addProducttoEbay($detail, $action = 'Add') {
        //print_r($detail);
        $requestArray['listingType'] = 'FixedPriceItem'; // 'StoresFixedPrice';
        $requestArray['primaryCategory'] = '31387';
        $requestArray['itemTitle'] = substr($detail['product_name'], 0, 55);
        $requestArray['productID'] = $detail['id'];
        $watchDetail = '<div border=1><p>' . $detail['product_description'] . '</p></div>';
        $storeImage = config_item('base_url') . 'images/upperbar02.jpg';
        $colorImage = config_item('base_url') . 'images/Color_Profile.jpg';
        $watchImage = config_item('base_url') . $detail['main_pic'];
        $categoryArr = $this->getAllByCategoryID($detail['categoryid']);
        $parent = $this->getRootCategory($categoryArr);
        $fieldsArray = $this->getInfoFieldEbay($parent);
        if ($detail['shape'] != '') {
            switch ($detail['shape']) {
                case 'B':
                    $shape = 'Round';
                    $destFile = $destFolder . 'round.jpg';
                    break;
                case 'PR':
                    $shape = 'Princess';
                    $destFile = $destFolder . 'princessrings.jpg';
                    break;
                case 'R':
                    $shape = 'Radiant';
                    $destFile = $destFolder . 'radiantring.jpg';
                    break;
                case 'E':
                    $shape = 'Emerald';
                    $destFile = $destFolder . 'emeraldring.jpg';
                    break;
                case 'AS':
                    $shape = 'Asscher';
                    $destFile = $destFolder . 'asscherring.jpg';
                    break;
                case 'O':
                    $shape = 'Oval';
                    $destFile = $destFolder . 'round.jpg';
                    break;
                case 'M':
                    $shape = 'Marquise';
                    $destFile = $destFolder . 'marquisering.jpg';
                    break;
                case 'P':
                    $shape = 'Pear';
                    $destFile = $destFolder . 'pear_ring.jpg';
                    break;
                case 'H':
                    $shape = 'Heart';
                    $destFile = $destFolder . 'heartring.jpg';
                    break;
                case 'C':
                    $shape = 'Cushion';
                    $destFile = $destFolder . 'cushionring.jpg';
                    break;
                default:
                    $shape = $detail['shape'];
                    break;
            }
            $detail['shape'] = $shape;
        }

        $watchDetail .='<div>
                        <TABLE width=598 align=center border=0>
                        <TBODY>
                        <TR>
                        <TD align=middle width=626>
                        <MARQUEE><FONT face=Verdana size=5><B>WELCOME TO Gemnile, YOUR SOURCE FOR CERTIFIED GIA &amp; EGL DIAMONDS </B></FONT></MARQUEE>
                        <P>
                        <MARQUEE><FONT face=Verdana size=3><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (877)425-2645 1-800-874-3541</B></FONT></MARQUEE>
                        <MARQUEE><A href="mailto:alangjewelers@aol.com?subject=ebay auction">alangjewelers@aol.com</A></MARQUEE><BR></P>&nbsp;</TD></TR>

                        <TR>
                        <TD vAlign=top width=626 height=2309>
                        <DIV align=center>
                        <TABLE height=2479 width="99%" border=0>
                        <TBODY>
                        <TR>
                        <TD vAlign=top align=right width="99%" height=1457>
                        <TABLE height=560 width=625 align=center border=0>
                        <TBODY>
                        <TR vAlign=top align=left>
                        <TD width=252 height=853>
                        <TABLE height=236 cellSpacing=1 cellPadding=1 width=513 border=0>
                        <TBODY>
                        <TR>
                        <TD align=middle width=509 bgColor=black height=17><B><FONT face="Georgia, Times New Roman, Times, serif" color=#ffffff size=2>Information</FONT></B></TD></TR>';
        $i = 1;
        foreach ($fieldsArray AS $index => $value) {
            $offset = $value['field'];
            if ($detail[$offset] != '') {
                if ($offset == 'price') {
                    $price = ($detail[$offset] + ($detail[$offset] * 10 / 100));
                    $watchDetail .= '<TR>
                                                                                        <TD width=509 bgColor=yellow height=18>' . $value['label'] . ':<B> </B><FONT color=#ff0000>$' . $price . '</FONT>&nbsp; &amp;&nbsp; No Reserve <FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></TD></TR>';
                } else {
                    $bgcolor = ($i % 2 != 0) ? '' : 'bgColor=silver';
                    $watchDetail .= '<TR>
                                                                                        <TD width=509 height=18 ' . $bgcolor . ' >&nbsp;' . $value['label'] . ':&nbsp;' . $detail[$offset] . '</TD></TR>
                                                                                ';
                    $i++;
                }
            }
        }

        /* <DIV style="WIDTH: 338px; HEIGHT: 521px" align=center>
          <TABLE height=1 width=364 border=0>
          <TBODY>
          <TR>
          <TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width="100%"><FONT color=black>&nbsp;*************************************************</FONT><FONT face=Verdana size=2>&nbsp;</FONT></TD></TR>

          <TR>
          <TD vAlign=top width=358 height=289>*<FONT color=#0000ff>Lady\'s Three Stone Ring;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </FONT>
          <P><FONT color=#0000ff>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</FONT><I><B><FONT color=#0000ff size=6>APPRAISED VALUE</FONT></B></I></P>
          <P align=center><I><B><FONT color=#000080 size=5>$'.$price.'</FONT></B></I></P>
          <P align=justify><FONT face=Verdana size=2>This auction is for a <I><B><FONT color=#008080>BRAND NEW</FONT></B></I> lady\'s three stone diamond&nbsp; ring.&nbsp; Total weight of diamonds and gems in this engagement ring is 0.90 carats.&nbsp;&nbsp; </FONT></P>

          <P align=justify><FONT face=Verdana size=2>The center diamond\'s weight is .50 carats.&nbsp; Color grade of the of the diamond is&nbsp; E (colorless), E color is colorless.&nbsp; The clarity is graded as SI1 by EGL.&nbsp; SI1 clarity is explained as inclusions are viewable under 10 power magnification.&nbsp;&nbsp; </FONT></P>
          <P align=justify><FONT face=Verdana size=2>The total weight of pink sapphires are .40 carats.&nbsp; They are round shape and are set in a prong setting.&nbsp;&nbsp;</FONT></P>

          <P align=justify><FONT face=Verdana size=2>The diamond and pink sapphires have excellent cut, polish and symmetry and is simply incredible.&nbsp; They are clear and bright with exceptional brilliance and fire.&nbsp; The clarity is truly amazing, and this diamonds sparkle immensely the shape and cut are perfect.&nbsp; They have been selected, gauged and measured for the best fit in this ring.&nbsp; &nbsp; </FONT></P>
          <P align=justify><FONT face=Verdana size=2>Please email me with your questions or comments.&nbsp; You may visit my store to find more selection of certified <SPAN style="BACKGROUND-COLOR: #ff00ff">GIA &amp; EGL diamonds</SPAN>. A certificate appraisal will accompany this diamond BAND.&nbsp; The estimated retail value of this BAND&nbsp; is $11,100.00 The highest bidder will win this beauty.&nbsp; Bid with full confidence. </FONT></P>

          <P align=justify><FONT color=#ff0000>These diamonds are all guaranteed to be 100% natural, with no enhancements or treatments.&nbsp; All items have been examined by a GIA gemologist.</FONT></P>
          <P align=justify><FONT face=Arial color=black size=1>Descriptions of quality are inherently subjective. The quality descriptions we provide, are to the best of&nbsp;our certified gemologists&nbsp;ability, and are&nbsp;her honest opinion. Disagreements with quality descriptions may occur.&nbsp; &nbsp;</FONT><FONT face=Arial size=1>Appraisal value is given at high retail value for insurance purposes only.&nbsp; Appraisal value is subjective and may vary from one gemologist to another.&nbsp; </FONT><FONT face=Arial color=black size=1>Opinions of appraisers may vary up to 25%. Diamond grading is subjective and may vary greatly. If the lowest color or clarity grades we specify are determined to be more than one grade lower than indicated. you may return the item for a full refund less shipping and insurance.&nbsp; We are not responsible for lost diamonds or gems.</FONT></P></TD></TR></TBODY></TABLE></DIV></TD> */
        $watchDetail .= '</TBODY></TABLE>
                        <TD width=365 height=853>
                        <TABLE height=670 cellSpacing=1 cellPadding=1 width=389 align=center border=0>
                        <TBODY>
                        <TR bgColor=#000000>
                        <TD width=414 height=212><!--<IMG height=262 src="' . $watchImage . '" width=535 border=0>--><IMG src="' . $watchImage . '" border=0></TD></TR>
                        <TR>
                        <TD vAlign=center width=348 bgColor=black height=20>
                        <P align=center><B><FONT face="Georgia, Times New Roman, Times, serif" color=white size=2>Your Free Gift</FONT></B></P></TD></TR>
                        <TR>
                        <TD vAlign=top width=348 height=454>
                        <UL>
                        <LI><FONT face=Verdana size=2>Jewelry Box </FONT></LI>
                        <LI><FONT face=Verdana size=2>Guaranteed to be 100% genuine diamond</FONT></LI>
                        <LI><FONT face=Verdana size=2>Guaranteed to be 100% genuine 14kt gold</FONT></LI>
                        <LI><FONT face=Verdana size=2>Free appraisal for the estimated retail value of the item with every purchase. </FONT></LI>
                        <LI><FONT face=Verdana,Arial color=#000000 size=2>Items will be shipped 5-7 days as payment is received.&nbsp; (shipping cut off time is 1:00 PM pacific standard time)</FONT>
                        <P>Gemnile. Jewelers has been dedicated to excellent customer satisfaction and lowest prices in the jewelry business for nearly 20 years. We are a direct diamond importer and all of our diamonds and gemstones are guaranteed to appraise for twice the amount of purchase price. Our merchandise is being offered on EBAY in order to provide the same exceptional quality and value to the general public. <FONT color=#ff0000>These diamonds are all guaranteed to be natural, with no enhancements or treatments.</FONT> Our goal is to reach the highest customer satisfaction rate possible. We welcome the opportunity to serve you.<BR></FONT></B></FONT></P>

                        <P></P>
                        <P><FONT face=Verdana color=#ff0000 size=4>Please review our feedback for your Confidence.&nbsp; Lay away plan is available, please click here for additional information </FONT>&nbsp;<FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></P></LI></UL>
                        <P>&nbsp;</P></TD></TR>
                        <TR>
                        <TD width=414 height=124></TD></TR>
                        <TR>
                        <TD width=414 height=259>
                        <P align=center><FONT face="Arial, Helvetica, sans-serif" color=#000033 size=3><IMG height=177 src="http://images.channeladvisor.com/Sell/SSProfiles/30055276/Images/powerseller.gif" width=209><BR></FONT><FONT face=Verdana>BID WITH CONFIDENCE!</FONT> </P>
                        <P align=center><I><B><FONT color=#008080 size=5>PLATINUM POWER SELLER</FONT></B></I></P>
                        <P dir=rtl align=center><FONT face=Verdana size=2><FONT color=#800000>Gemnile Jewelers Guarantees all our <BR>diamonds to be 100% natural <BR></FONT></P></FONT></TD></TR></TBODY></TABLE></TD>

                        <TR vAlign=top align=left>
                        <TD width=617 colSpan=2 height=243>
                        <P>&nbsp;<U><B><FONT face=Verdana size=3>About us</FONT></B></U> </P>
                        <P class=text><FONT face=Verdana size=2>We invite you to read our <A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT>page to obtain information on:
                        <UL type=circle>
                        <LI>
                        <P class=text>Gemnile Jewelers</P></LI>
                        <LI>
                        <P class=text>Store Policy</P></LI>

                        <LI>
                        <P class=text>Shipping </P></LI>
                        <LI>
                        <P class=text>Return Policy</P></LI></UL>
                        <P class=fontblack><U><B><FONT face=Verdana size=3>Payment Information </FONT></B></U></P>
                        <P align=justify><FONT face=Verdana size=2>We accept ELECTRONIC BANK <FONT color=red>Wire Transfer</FONT> and <FONT color=red>PAYPAL.</FONT></FONT></P>
                        <P align=justify><FONT face=Verdana size=2><IMG height=34 src="http://images.andale.com/f2/103/108/10035456/1054817181174_creditcard.jpg" width=379 border=0></FONT> <IMG height=24 src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width=50 border=0></P>
                        <P align=justify></P>

                        <P></P></TD>
                        <TR vAlign=top align=left>
                        <TD width=617 colSpan=2 height=369>&nbsp;<U><B><FONT face=Verdana size=3>Helpful Information </FONT></B></U>
                        <P class=text><FONT face=Verdana size=2>GIA stands for Gemological Institute of America and EGL stands for European Gemological Laboratory. GIA and EGL certification are prepared by a third independent party not affiliated to sugarkarats Jewelers for your protection. The certifications state the color and clarity of diamonds greater than .50cts. They are both well respected in the jewelry industry. If you need any more information regarding these laboratories, you may visit EGL at <A href="http://www.eglusa.com/customerlogin.html">www.eglusa.com</A> </FONT>
                        <P class=text><U><B><FONT face=Verdana>Satisfied Client</FONT><FONT face=Verdana size=3>\'s Letter </FONT></B></U>
                        <P class=text>
                        <DIV>dated July 13, 2004:
                        <P>"Gemnile,</P></DIV>
                        <DIV>&nbsp;</DIV>
                        <DIV>I received your diamond and its a beauty.&nbsp; Thank you so much for your patience and help, you were a dream come true and I know my future wife will appreciate the care you took.</DIV>

                        <DIV><BR>&nbsp;<BR>Jeffery Ned"</DIV><FONT face=Verdana size=2>
                        <P class=fontblack><U><B><FONT face=Verdana size=3>Clarity </FONT></B></U></P>
                        <P align=justify><FONT face=Verdana size=2>The following table explains the diamond clarity (inside the diamond):<BR>
                        <P>
                        <TABLE width="80%" border=1>
                        <TBODY>
                        <TR>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>IF</FONT> </TD>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>VVS1</FONT> </TD>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>VVS2</FONT> </TD>

                        <TD align=middle><FONT face=Arial color=#586479 size=1>VS1</FONT> </TD>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>VS2</FONT> </TD>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>SI1</FONT> </TD>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>SI2</FONT> </TD>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>SI3</FONT> </TD>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>I1</FONT> </TD>

                        <TD align=middle><FONT face=Arial color=#586479 size=1>I2</FONT> </TD>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>I3</FONT> </TD></TR>
                        <TR>
                        <TD align=middle><FONT face=Arial color=#586479 size=1>FLAWLESS</FONT> </TD>
                        <TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>EXTREMELY DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
                        <TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
                        <TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE UNDER 10X MAGNIFICATION </FONT></TD>

                        <TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE TO NAKED EYE</FONT> </TD></TR></TBODY></TABLE>
                        <P>
                        <P class=fontblack><U><B><FONT face=Verdana size=3>Color </FONT></B></U></P>
                        <P align=justify><FONT face=Verdana size=2></FONT></P></FONT></FONT>
                        <TR>
                        <TD class=basic10 colSpan=2 height=394>While many diamonds appear colorless, or white, they may actually have subtle yellow or brown tones that can be detected when comparing diamonds side by side. Diamonds were formed under intense heat and pressure, and traces of other elements may have been incorporated into their atomic structure accounting for the variances in color. <BR><BR>Diamond color grades start at D and continue down through the alphabet. Colorless diamonds, graded D, are extremely rare and very valuable. The closer a diamond is to being colorless, the more valuable and rare it is. <BR><BR>The color of a diamond is graded with the diamond upside down before it is set in a mounting. The first three colors D, E, F are often called collection color. The subtle changes in collection color are so minute that it is difficult to identify them in the smaller sizes. Although the presence of color makes a diamond less rare and valuable, some diamonds come out of the ground in vivid "fancy" colors - well defined reds, blues, pinks, greens, and bright yellows. These are highly priced and extremely rare.<BR><BR>
                        <DIV align=center><IMG height=200 src="' . $colorImage . '" width=600> </DIV></TD></TR></TBODY></TABLE>
                        <DIV></DIV></TD></TR></TBODY></TABLE></DIV>
        </div>';

        if (get_magic_quotes_gpc()) {
            // print "stripslashes!!! <br>\n";
            $requestArray['itemDescription'] = stripslashes($watchDetail);
        } else {
            $requestArray['itemDescription'] = $watchDetail;
        }

        $requestArray['listingDuration'] = 'GTC';
        $requestArray['startPrice'] = $price;
        $requestArray['buyItNowPrice'] = '0.0';
        //$requestArray['quantity']        = $detail['quantity'];
        $requestArray['quantity'] = '1';
//        if ($requestArray['listingType'] == 'StoresFixedPrice') {
        if ($requestArray['listingType'] == 'FixedPriceItem') {
            $requestArray['buyItNowPrice'] = 0.0;   // don't have BuyItNow for SIF
            $requestArray['listingDuration'] = 'GTC';
        }

        if ($listingType == 'Dutch') {
            $requestArray['buyItNowPrice'] = 0.0;   // don't have BuyItNow for Dutch
        }

        $catArray = $this->getAllByCategoryID($detail['categoryid']);
        if ($catArray['ebay_cat_id'] == '') {
            $this->addCustomEbayCategory($catArray);
            $catArray = $this->getAllByCategoryID($detail['categoryid']);
            $store_cat_id = $catArray['ebay_cat_id'];
        } else {
            $store_cat_id = $catArray['ebay_cat_id'];
        }

        $requestArray['itemID'] = $detail['ebay_product_id'];
        $requestArray['store_cat_id'] = $store_cat_id;
        $requestArray['image'] = config_item('base_url') . $detail['main_pic'];
        $requestArray['replace_gurantee'] = 'Days_14';
        //print_R($requestArray);
        //die('tt');
        //if($action=='Add') {
        if ($detail['ebay_product_id'] == '' || $detail['ebay_product_id'] == 0) {
            $itemID = $this->sendRequestEbay($requestArray);
        } else {
            //$itemID = $this->updateEbayItem($requestArray);
            $itemID = $this->updateRequestEbay($requestArray);
        }
        return $itemID;
    }

    function getAllCategories($catid, &$offset = '') {

        $qry = "SELECT * FROM dev_category WHERE parentid = $catid";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        if (count($result) > 0) {
            foreach ($result AS $index => $value) {
                $offset .= $value['id'] . '#' . $value['ebay_cat_id'] . '~';
                # Add the child to the list of children, and get its subchildren
                // $children[$offset] = $this->getAllCategories($value['id']);
                $offset = $this->getAllCategories($value['id'], $offset);
            }
        }

        return $offset;
    }

    function deleteEbayCategory($ebayCatArr) {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        //SiteID must also be set in the Request's XML
        //SiteID = 0  (US) - UK = 3, Canada = 2, Australia = 15, ....
        //SiteID Indicates the eBay site to associate the call with
        $siteID = 0;
        //the call being made:
        $verb = 'SetStoreCategories';
        //echo 'devid'.$devID;
        ///Build the request Xml string

        $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>';
        $requestXmlBody .= '<SetStoreCategoriesRequest xmlns="urn:ebay:apis:eBLBaseComponents">';

        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= "<Version>551</Version>";
        $requestXmlBody .= '<Action>Delete</Action>';
        //$requestXmlBody .= '<ItemDestinationCategoryID>14122</ItemDestinationCategoryID>';
        //$requestXmlBody .= '<DestinationParentCategoryID>'.$dest_cat_id.'</DestinationParentCategoryID>';
        $requestXmlBody .= '<StoreCategories>';
        $ebayArray = explode(',', $ebayCatArr);
        if (is_array($ebayArray)) {
            foreach ($ebayArray As $index => $value) {
                $requestXmlBody .= '<CustomCategory>
                                                                 <CategoryID>' . $value . '</CategoryID>
                                                                </CustomCategory>';
            }
        }
        $requestXmlBody .= '</StoreCategories>';
        $requestXmlBody .= "</SetStoreCategoriesRequest>";

        //echo $requestXmlBody;
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        //print_r($responseXml);
        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');

        //if there are error nodes
        if ($errors->length > 0) {
            $status = '<P><B>eBay returned the following error(s):</B>';
            //display each error
            //Get error code, ShortMesaage and LongMessage
            $code = $errors->item(0)->getElementsByTagName('ErrorCode');
            $shortMsg = $errors->item(0)->getElementsByTagName('ShortMessage');
            $longMsg = $errors->item(0)->getElementsByTagName('LongMessage');
            //Display code and shortmessage
            $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
            //if there is a long message (ie ErrorLevel=1), display it
            if (count($longMsg) > 0)
                $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
        } else { //no errors
            $responses = $responseDoc->getElementsByTagName("SetStoreCategoriesResponse");
            // print_r($responses);

            foreach ($responses as $response) {

                $status = $response->getElementsByTagName('Status');
                echo '<br>' . $status = $status->item(0)->nodevalue;
            }
        }
    }

    /*
     * Added by pardeep
     * update the inventory
     */

    function updateorders($record) {
        /*
         * Read the records
         */
        $billingAddress = $record[4];
        $billingCity = $record[7];
        $billingCountry = $record[9];
        $billingFirstName = $record[10];
        $billingLastName = $record[12];
        $billingPhone = $record[13];
        $billingState = $record[14];
        $billingZip = $record[15];
        $buyerAddress = $record[18];
        $buyerId = $record[19];
        $buyerEbayId = $record[22];
        $buyerFirstName = $record[25];
        $buyerLastName = $record[27];
        $buyerPhone = $record[29];
        $shipDate = $record[71];
        $soldDate = $record[72];
        $ebayItem = $record[76];
        $itemCost = $record[86];
        $itemId = $record[87];
        $orderid = $record[94];
        $qtySold = $record[103];
        $salePrice = $record[106];
        $shipAddress = $record[112];
        $shipCity = $record[115];
        $shipCountry = $record[117];
        $shipFirst = $record[118];
        $shipLast = $record[120];
        $shipPhone = $record[121];
        $shipState = $record[122];
        $shipZip = $record[123];
        $productName = $record[140];
        $trackingNumber = $record[143];
        $transactionID = $record[144];
        $paymentMethod = $record[145];

        $sql = "select transaction_id  from  `ebay_order` where  `transaction_id` = '" . $transactionID . "'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if (empty($data)) {
            list($ebayItem, $rid) = explode("-", $orderid);
            $isinsert = $this->db->insert('ebay_order', array(
                'billing_address1' => trim($billingAddress),
                'billing_city' => mysql_real_escape_string($billingCity),
                'billing_country' => mysql_real_escape_string($billingCountry),
                'billing_firstname' => $billingFirstName,
                'billing_lastname' => $billingLastName,
                'billing_phone' => $billingPhone,
                'billing_state' => $billingState,
                'billing_zip' => $billingZip,
                'buyer_address' => mysql_real_escape_string($buyerAddress),
                'buyer_buyerid' => $buyerId,
                'buyer_ebayid' => $buyerEbayId,
                'buyer_firstname' => mysql_real_escape_string($buyerFirstName),
                'buyer_lastname' => $buyerLastName,
                'buyer_phone' => $buyerPhone,
                'shipping_date' => date("Y-m-d H:i:s", strtotime($shipDate)),
                'sold_date' => date("Y-m-d H:i:s", strtotime($soldDate)),
                'ebay_item' => $ebayItem,
                'item_cost' => $itemCost,
                'item_id' => $itemId,
                'order_id' => $orderid,
                'qty_sold' => $qtySold,
                'sale_price' => $salePrice,
                'shipping_address1' => mysql_real_escape_string($shipAddress),
                'ship_city' => mysql_real_escape_string($shipCity),
                'ship_country' => $shipCountry,
                'ship_firstname' => mysql_real_escape_string($shipFirst),
                'ship_lastname' => mysql_real_escape_string($shipLast),
                'ship_phone' => $shipPhone,
                'ship_state' => mysql_real_escape_string($shipState),
                'ship_zip' => $shipZip,
                'product_name' => mysql_real_escape_string($productName),
                'tracking_number' => $trackingNumber,
                'transaction_id' => $transactionID,
                'payment_method' => $paymentMethod,
                    ));
            if ($ebayItem) {
                $query = $this->db->query("select * from " . $this->config->item('table_perfix') . "watches  where  ebayid = '" . $ebayItem . "'  LIMIT 1");
                $data = $query->result_array();
                $AfterReduceQty = $data[0]['qty'] - $qtySold;
                if ($data[0]['qty'] > 0) {
                    if ($AfterReduceQty <= 0) {
                        $sql = "Update dev_watches set qty  =  0   where ebayid = '" . $ebayItem . "'";
                        $result = $this->db->query($sql);
                        $q = $this->endFixedPriceBid($ebayItem);
                    } else {
                        $productArr = $this->getAllByWatchID($data[0]['productID']);
                        $productArr['qty'] = $AfterReduceQty;
                        $this->addWatchtoEbay($productArr, $action = 'edit');
                    }
                } else {
                    $this->endFixedPriceBid($ebayItem);
                }
                /*
                 * Amazon update
                 */
                $id_type = $data[0]['id_type'];
                $upc = $data[0]['upc'];
                $brand = $data[0]['brand'] . "-" . $data[0]['productID'];
                $rid = $data[0]['productID'];
                $condition = $data[0]['condition'];
                $amazon_listed_price = $data[0]['amazon_listed_price'];
                if ($AfterReduceQty > 0) {
                    $qty = $AfterReduceQty;
                } else {
                    $qty = 0;
                }
                if ($id_type == '1') {
                    $upcid = $upc . "%2C";
                    $upcid .= $upc;
                    $type = 'ASIN';
                }
                if ($id_type == '2') {
                    $upcid = $upc . "%2C";
                    $upcid .= $upc;
                    $type = 'ISBN';
                }
                if ($id_type == '3') {
                    $upcid = $upc . "%2C";
                    $upcid .= $upc;
                    $type = 'UPC';
                }
                if ($id_type == '4') {
                    $upcid = $upc . "%2C";
                    $upcid .= $upc;
                    $type = 'EAN';
                }
                /*
                 * @ Add Item on amazon
                 */
                if (!empty($brand)) {
                    $vendor_sku = $brand . "-" . $rid;
                } else {
                    $vendor_sku = "watch-" . $rid;
                }
                if ($condition == 'used') {
                    $cond = '2';
                } else {
                    $cond = '11';
                }
                $price = $amazon_listed_price;
                /*
                 * Create csv and upload on amazon
                 */
                $fileCsv = config_item('base_path') . "amazon/price_qty_upc.txt";
                $fp = fopen($fileCsv, "w");
                $fileText = "product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
                fwrite($fp, $fileText);
                $fileText = "\n" . $upc . "\t";
                $fileText .=$id_type . "\t";
                //$fileText .="11\t";
                $fileText .=$cond . "\t";
                $fileText .=$price . "\t";
                $fileText .=$vendor_sku . "\t";
                $fileText .=$qty . "\t";
                $fileText .="a\t";
                $fileText .="n\t";
                $fileText .="y\t";
                $fileText .="This watch is Brand NEW!!!!!!!!! . Factory Authorized Dealer 100% New In Box Customer Satisfaction Guaranteed or Money Back. Shop With Confidence.In Stock Same Day Shipping.\t";
                fwrite($fp, $fileText);

                fclose($fp);
                $batchID = simplexml_load_string($amazon->AmazonListing($fileCsv));
                $this->db->insert('upload_report', array(
                    'batchID' => trim($batchID),
                    'status' => 'open',
                    'dateofmodification' => date('Y-m-d H:i:s'),
                ));
                //$this->db->where("productID", trim($isinsert));
            }
        }
    }

    /*
      function getAttributes($page = 1, $rp = 10, $sortname = 'option_name', $sortorder = 'desc', $query= '', $qtype = 'option_name', $oid = '') {
      $results = array();

      $sort = "ORDER BY $sortname $sortorder";

      //$start = (($page - 1) * $rp);
      $start = 0 ;

      $limit = "LIMIT $start, $rp";

      $qwhere = "";
      if ($query)
      $qwhere .= " AND $qtype LIKE '%$query%' ";
      if ($oid != '')
      $qwhere .= " AND parentid = $oid";


      $sql = 'SELECT  pa.* , (select name from '. $this->config->item('table_perfix').'jewelries where stock_number = pa.product_id) as product_name  FROM  ' . $this->config->item('table_perfix').'productattribute_controller  as pa where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
      //var_dump($sql);
      $result = $this->db->query($sql);
      $results['result'] = $result->result_array();
      $sql2 = mysql_query('SELECT count(*) as total  FROM  ' . $this->config->item('table_perfix') . 'productattribute_controller  where 1=1 ');
      $result2 = mysql_fetch_assoc($sql2);
      $results['count'] = $result2['total'];
      return $results;
      }
     */

    function nameplate($post, $action = 'view', $id = 0, $productimage = '') {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';

        if ($action == 'delete') {
            $items = $_POST['items'];
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "nameplate  WHERE product_id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {

            if (is_array($post)) {

                $product_name = isset($post['product_name']) ? $post['product_name'] : '';
                $product_price = isset($post['product_price']) ? $post['product_price'] : 0;
                $product_code = isset($post['product_code']) ? $post['product_code'] : '';
                $description = isset($post['description']) ? $post['description'] : '';
                $product_image = isset($productimage['product_image']['name']) ? $productimage['product_image']['name'] : '';
                $dateofmodification = date("Y-m-d H:i:s");

                if ($action == 'add') {

                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'nameplate', array(
                        'product_name' => $product_name,
                        'product_price' => $product_price,
                        'product_code' => $product_code,
                        'description' => $description,
                        'product_image' => $product_image,
                        'dateofmodification' => $dateofmodification,
                            ));

                    $rid = $this->db->insert_id();
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('product_id', $id);
                    if (!empty($product_image)) {
                        $isinsert = $this->db->update($this->config->item('table_perfix') . 'nameplate', array(
                            'product_name' => $product_name,
                            'product_price' => $product_price,
                            'product_code' => $product_code,
                            'description' => $description,
                            'product_image' => $product_image,
                            'dateofmodification' => $dateofmodification,
                                ));
                    } else {
                        $isinsert = $this->db->update($this->config->item('table_perfix') . 'nameplate', array(
                            'product_name' => $product_name,
                            'product_price' => $product_price,
                            'product_code' => $product_code,
                            'description' => $description,
                            'dateofmodification' => $dateofmodification,
                                ));
                    }
                }
                if ($productimage['product_image']['name'] != '') {
                    $this->uploadfile($productimage, 'product_image', 'nameplate', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/nameplate', $rid, 'nameplate', 'product_id', $rid, 'product_image');
                }
            }
        }
        if ($isinsert)
            $retuen['success'] .= 'NamePlate Item info Successfully ' . ucfirst($action) . 'ed .';
        return $retuen;
    }

    function getnameplate($page = 1, $rp = 10, $sortname = 'dateofmodification', $sortorder = 'desc', $query = '', $qtype = 'option_name', $oid = '') {
        $results = array();
        $sort = "ORDER BY $sortname $sortorder";
        $start = (($page - 1) * $rp);
        if ($start < 0) {
            $start = 0;
        }
        $limit = "LIMIT $start, $rp";
        $qwhere = "";

        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";

        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'nameplate  where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = mysql_query('SELECT count(*) as total  FROM  ' . $this->config->item('table_perfix') . 'nameplate where 1=1');
        $result2 = mysql_fetch_assoc($sql2);
        $results['count'] = $result2['total'];
        return $results;
    }

    function attribute($post, $action = 'view', $id = 0, $imageSmall = '', $imageBig = '') {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            /* $items = rtrim($_POST['items'],",");
              $sql = "DELETE FROM ".$this->config->item('table_perfix')."watches WHERE watches IN ($items)";
              $result = $this->db->query($sql);
              $total = count(explode(",",$items));
              $retuen['total'] = $total; */
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "productattribute_controller  WHERE id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {

            if (is_array($post)) {
                $option_name = isset($post['option_name']) ? $post['option_name'] : 0;
                $option_value = isset($post['option_value']) ? $post['option_value'] : 0;
                $option_price = isset($post['option_price']) ? $post['option_price'] : 0;
                $dateofmodification = date("Y-m-d H:i:s");

                if ($action == 'add') {
                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'productattribute_controller', array(
                        'option_name' => $option_name,
                        'option_value' => $option_value,
                        'option_price' => $option_price,
                        'dateofmodification' => $dateofmodification,
                            ));
                    $rid = $this->db->insert_id();
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('id', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'productattribute_controller', array(
                        'option_name' => $option_name,
                        'option_value' => $option_value,
                        'option_price' => $option_price,
                        'dateofmodification' => $dateofmodification,
                            ));
                }
            }
        }
        if ($isinsert)
            $retuen['success'] .= 'Attribute info Successfully ' . ucfirst($action) . 'ed .';
        return $retuen;
    }

    function getattribute($page = 1, $rp = 10, $sortname = 'dateofmodification', $sortorder = 'desc', $query = '', $qtype = 'option_name', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";
        $start = (($page - 1) * $rp);
        if ($start < 0) {
            $start = 0;
        }
        $limit = "LIMIT $start, $rp";
        $qwhere = "";

        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";

        $sql = 'SELECT  * FROM  ' . $this->config->item('table_perfix') . 'productattribute_controller  where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = mysql_query('SELECT count(*) as total  FROM  ' . $this->config->item('table_perfix') . 'productattribute_controller where 1=1');
        $result2 = mysql_fetch_assoc($sql2);
        $results['count'] = $result2['total'];
        return $results;
    }

    function getattributeById($id) {
        $results = array();
        $sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "productattribute_controller  where id = '$id' ";
        $result = $this->db->query($sql);
        $results = $result->result_array();
        return $results;
    }

    function getnameplateById($id) {
        $results = array();
        $sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "nameplate  where product_id = '$id' ";
        $result = $this->db->query($sql);
        $results = $result->result_array();
        return $results;
    }

    function updateRolex($post) {
        //$total = 10 ;
        $total = $post['rp'];
        if ($total < 10 || empty($total)) {
            $total = 10;
        }

        global $fp;
        $filePath = config_item('base_path') . "amazon/qty_upc.txt";
        $fp = fopen($filePath, "w");
        $fileText = "product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
        fwrite($fp, $fileText);
        fclose($fp);

        //echo $total;
        for ($j = 0; $j < $total; $j++) {
            // echo $j."<br>";
            // echo "<hr>";

            $id = stripslashes($post["pid_$j"]);
            $price1 = stripslashes($post["price1_$j"]);
            $brand = stripslashes($post["brand_$j"]);
            $upc = stripslashes($post["upc_$j"]);
            $qty = stripslashes($post["qty_$j"]);
            if (empty($qty)) {
                $qty = 0;
            }
            $model = stripslashes($post["model_$j"]);
            $lowest_price = stripslashes($post["lowest_$j"]);
            $highest_price = stripslashes($post["highest_$j"]);
            $this->db->where('productID', $id);
            $isinsert = $this->db->update($this->config->item('table_perfix') . 'watches', array(
                'price1' => $price1,
                'qty' => $qty,
                'lowest_price' => $lowest_price,
                'highest_price' => $highest_price,
                'upc' => $upc,
                'brand' => $brand,
                'model_number' => $model,
                    ));

            $productArr = $this->getAllByWatchID($id);
            //   $lowest_price = isset($productArr['lowest_price']) ? $productArr['lowest_price'] : 0;
            //   $highest_price = isset($productArr['highest_price']) ? $productArr['highest_price'] : 0;
            $retail_price = isset($productArr['retail_price']) ? $productArr['retail_price'] : 0;
            $uprice = isset($productArr['price2']) ? $productArr['price2'] : '';
            $model_number = isset($productArr['model_number']) ? $productArr['model_number'] : '';
            $tempbrand = isset($productArr['brand']) ? $productArr['brand'] : '';
            $qty = isset($productArr['qty']) ? $productArr['qty'] : 0;
            $upc = isset($productArr['upc']) ? $productArr['upc'] : '';
            //$finger_size   	= isset($post['finger_size']) 	? $post['finger_size'] : '';
            $sku = isset($productArr['AKU']) ? $productArr['SKU'] : '';
            $amazon_chk = isset($productArr['on_amzon']) ? $productArr['on_amzon'] : '0';
            $ebay_chk = isset($productArr['on_ebay']) ? $productArr['on_ebay'] : '0';
            $website_chk = isset($productArr['on_website']) ? $productArr['on_website'] : '0';
            if ($tempbrand == '-1') {
                $brand = $productArr['otherbrandname'];
            } else {
                $brand = $tempbrand;
            }
            $condition = isset($productArr['condition']) ? $productArr['condition'] : 'new';
            $warranty = isset($productArr['warranty']) ? $productArr['warranty'] : '';
            $band = isset($productArr['band']) ? $productArr['band'] : '';
            $id_type = isset($productArr['id_type']) ? $productArr['id_type'] : '';
            $highest_amazon_price = isset($productArr['highest_amazon_price']) ? $productArr['highest_amazon_price'] : '';
            $per_dis_amt = isset($productArr['per_dis_amt']) ? $productArr['per_dis_amt'] : '';
            $diamond_width = isset($productArr['diamond_width']) ? $productArr['diamond_width'] : '';
            $ebay_upload_type = isset($productArr['ebay_upload_type']) ? $productArr['ebay_upload_type'] : '';
            $asin_price = isset($productArr['asin_price']) ? $productArr['asin_price'] : '';
            if ($ebay_chk == '1') {
                if ($qty < 1) {
                    $status = $this->endFixedPriceBid($productArr['ebayid']);
                } else {
                    $this->addWatchtoEbay($productArr);
                }
            }
            if ($amazon_chk == '1') {
                if ($id_type == '1') {
                    $upcid = $upc . "%2C";
                    $upcid .= $upc;
                    $type = 'ASIN';
                }
                if ($id_type == '2') {
                    $upcid = $upc . "%2C";
                    $upcid .= $upc;
                    $type = 'ISBN';
                }
                if ($id_type == '3') {
                    $upcid = $upc . "%2C";
                    $upcid .= $upc;
                    $type = 'UPC';
                }
                if ($id_type == '4') {
                    $upcid = $upc . "%2C";
                    $upcid .= $upc;
                    $type = 'EAN';
                }
                $lowestPrice = $lowest_price;
                if ($per_dis_amt > 0 && !empty($per_dis_amt)) {
                    $lowestPrice = $retail_price - (($retail_price * $per_dis_amt) / 100);
                }
                $highestPrice = $highest_price;
                if (!empty($brand)) {
                    $vendor_sku = $brand . "-" . $id;
                } else {
                    $vendor_sku = "watch-" . $id;
                }
                if ($condition == 'used') {
                    $cond = '2';
                } else {
                    $cond = '11';
                }
                $fileText = $this->sendToAmazon($upcid, $type, $price, $vendor_sku, $cond, $id_type, $productArr['amazon_listed_price'], $upc, $lowest_price, $highest_price, $qty);
                // global $fp;
                $fp = fopen($filePath, "a");
                fwrite($fp, $fileText);
                fclose($fp);
            }
        }
        include_once(config_item('base_path') . "amazon/Amazon.php");
        global $amazon;
        $amazon = new Amazon();
        $batchID = simplexml_load_string($amazon->AmazonListing($filePath));
        if ($batchID) {
            echo "<p>Imported Sucessfully!!</p>";
            echo "<p><a href='" . config_item('base_url') . "amazon/qty_upc.txt' >Download Report</p>";
        }
        /*        if ($batchID){
          $action  = config_item('base_url')."admin/rolex";
          //echo "<script>window.location.href='".$action."'</script>";
          $retuen['success'] .= '<h1 class="success">Watch info Successfully updated .</h1>';
          }
         * 
         */
        return $retuen;
    }

    function sendToAmazon($upcid, $type, $price, $vendor_sku, $cond, $id_type, $amazonPrice, $upc, $lowestPrice, $highestPrice, $qty) {
        /*
         * @ Add item on amazon 
         */
        //     echo $upcid."88888888".$type;
        include_once(config_item('base_path') . "amazon/Amazon.php");
        global $amazon;
        $amazon = new Amazon();
        $request = $amazon->itemlookup($upcid, $type);
        $xml = $amazon->getCurlResponse($request);
        $data = '';
        $data = simplexml_load_string($xml);
        if ($data) {
            if ($data->Items->Request->Errors->Error->Message) {
                $errorMessage = (string) ($data->Items->Request->Errors->Error->Message);
            }
            $totalitems = sizeof($data->Items->Item->Offers->Offer);
            $LastValue = $totalitems - 1;
            $list = ($data->Items->Item->Offers->Offer[$LastValue]);
            $listprice = trim($list->OfferListing->Price->FormattedPrice[0]);
            $listprice = substr($listprice, 1);
            $prices = array();
            for ($j = 0; $j < $totalitems; $j++) {
                /*
                  $Amazonlist = ($data->Items->Item->Offers->Offer[$j]);
                  $amazonItemprices =  trim($Amazonlist->OfferListing->Price->FormattedPrice[0]);
                  $amazonItemprices =  substr($amazonItemprices,1);
                 */


                $Amazonlist = ($data->Items->Item->Offers->Offer[$j]);
                if (isset($Amazonlist->OfferListing->SalePrice->FormattedPrice[0]) && !empty($Amazonlist->OfferListing->SalePrice->FormattedPrice[0])) {
                    $amazonItemprices = trim($Amazonlist->OfferListing->SalePrice->FormattedPrice[0]);
                    $amazonItemprices = substr($amazonItemprices, 1);
                } else {
                    $amazonItemprices = trim($Amazonlist->OfferListing->Price->FormattedPrice[0]);
                    $amazonItemprices = substr($amazonItemprices, 1);
                }

                /*
                 * @ Here the logic we need to check the price is between the highest and lowest valeu
                 * @ Price should be included with shipping costs
                 */
                if ($amazonItemprices > $lowestPrice && $amazonItemprices < $highestPrice) {
                    $updatedLowprice = $amazonItemprices;
                    //      echo 'Our Lowest Item Price:'.$updatedLowprice;
                    break;
                }
                //	$prices[] = $amazonItemprices;
                if ($data->Items->Item->OfferSummary->LowestNewPrice->CurrencyCode == 'USD') {
                    $lowPrice = (string) ($data->Items->Item->OfferSummary->LowestNewPrice->FormattedPrice);
                }
            } // close for loop
            $amazon_listed_price = $updatedLowprice - 0.01;
        }

        if ($updatedLowprice > 0) {
            $qry = "Update dev_watches set `lowprice` = '" . mysql_real_escape_string($updatedLowprice) . "' ,
          `amazon_listed_price` = '" . mysql_real_escape_string($amazon_listed_price) . "' ,
          `highest_amazon_price` = '" . mysql_real_escape_string($listprice) . "' ,
           `price_updated` = '1' where `productID` =  '" . trim($rid) . "'";
            $this->db->query($qry);
            $price = $amazon_listed_price;
        } else {
            $price = $amazonPrice;
        }

        /*
         * @ Add Item on amazon
         */

        /*
         * Create csv and upload on amazon
         */
        if ($price > 0) {

            $fileText = "\n" . $upc . "\t";
            $fileText .=$id_type . "\t";
            //$fileText .="11\t";
            $fileText .=$cond . "\t";
            $fileText .=$price . "\t";
            $fileText .=$vendor_sku . "\t";
            $fileText .=$qty . "\t";
            $fileText .="a\t";
            $fileText .="n\t";
            $fileText .="y\t";
            $fileText .="This watch is Brand NEW!!!!!!!!! . Factory Authorized Dealer 100% New In Box Customer Satisfaction Guaranteed or Money Back. Shop With Confidence.In Stock Same Day Shipping.\t";
        }
        return $fileText;
    }

    function getordersById($id) {
        $sql = "SELECT  * FROM   orders  where orderid = '" . mysql_real_escape_string(trim($id)) . "'";
        $result = $this->db->query($sql);
        $results = $result->result_array();
        return $results[0];
    }

    function notification() {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        $siteID = 0;
        $notification_url = config_item('base_url') . 'admin/managenotification';
        $eventArr = array('FixedPriceTransaction');
        //FixedPriceEndOfTransaction
        //Sent to a seller when a fixed-price item of ListingType StoresFixedPrice is sold and the buyer completes the checkout process. Not sent when a fixed-price item's duration expires without purchase.

        $verb = 'SetNotificationPreferences';
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        $requestXmlBody .= '<SetNotificationPreferencesRequest  xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= "<DetailLevel>ReturnAll</DetailLevel>"; //get the entire tree
        $requestXmlBody .= "<ErrorLanguage>en_US</ErrorLanguage>";
        $requestXmlBody .= "<WarningLevel>High</WarningLevel>";
        $requestXmlBody .= "<ApplicationDeliveryPreferences>";
        $requestXmlBody .= "<AlertEmail>mailto://pardeepsingal1@gmail.com</AlertEmail>";
        $requestXmlBody .= "<AlertEnable>Enable</AlertEnable>";
        $requestXmlBody .= "<ApplicationEnable>Enable</ApplicationEnable>";
        $requestXmlBody .= "<ApplicationURL>$notification_url</ApplicationURL>";
        $requestXmlBody .= "<DeliveryURLDetails>";
        $requestXmlBody .= "<DeliveryURLName>eBayCheckout</DeliveryURLName>";
        $requestXmlBody .= "<DeliveryURL>$notification_url</DeliveryURL>";
        $requestXmlBody .= "<Status>Enable</Status>";
        $requestXmlBody .= "</DeliveryURLDetails>";
        $requestXmlBody .= "<DeviceType>Platform</DeviceType>";
        $requestXmlBody .= "</ApplicationDeliveryPreferences>";
        $requestXmlBody .= "<UserDeliveryPreferenceArray>";
        foreach ($eventArr as $event) {
            $requestXmlBody .= "<NotificationEnable>";
            $requestXmlBody .= "<EventType>$event</EventType>";
            $requestXmlBody .= "<EventEnable>Enable</EventEnable>";
            $requestXmlBody .= "</NotificationEnable>";
        }
        $requestXmlBody .= "</UserDeliveryPreferenceArray>";
        $requestXmlBody .= '</SetNotificationPreferencesRequest>';

        //echo $requestXmlBody;
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
    }

    function AddOrderDataInDB($OrderArr) {
        $sql = $this->db->query("select id from ebay_order where transaction_id = '" . trim($OrderArr['order']['transaction_id']) . "'");
        $transactionData = $sql->result_array();
        if (empty($transactionData[0]['id'])) {
            $billingAddress = isset($OrderArr['order']['s_address']) ? $OrderArr['order']['s_address'] : '';
            $billingCity = isset($OrderArr['order']['s_city']) ? $OrderArr['order']['s_city'] : '';
            $billingCountry = isset($OrderArr['order']['s_country']) ? $OrderArr['order']['s_country'] : '';
            $billingFirstName = isset($OrderArr['order']['firstname']) ? $OrderArr['order']['firstname'] : '';
            $billingLastName = isset($OrderArr['order']['lastname']) ? $OrderArr['order']['lastname'] : '';
            $billingPhone = isset($OrderArr['order']['phone']) ? $OrderArr['order']['phone'] : '';
            $billingState = isset($OrderArr['order']['s_state']) ? $OrderArr['order']['s_state'] : '';
            $billingZip = isset($OrderArr['order']['s_zipcode']) ? $OrderArr['order']['s_zipcode'] : '';
            $buyerAddress = isset($OrderArr['order']['s_address']) ? $OrderArr['order']['s_address'] : '';
            $buyerId = isset($OrderArr['order']['buyerid']) ? $OrderArr['order']['buyerid'] : '';
            //$buyerEbayId =$OrderArr['order']['login'];
            if (!empty($OrderArr['order']['login']) && isset($OrderArr['order']['login'])) {
                $buyerEbayId = $OrderArr['order']['login'];
            } else {
                $buyerEbayId = $buyerId;
            }
            $buyerFirstName = isset($OrderArr['order']['firstname']) ? $OrderArr['order']['firstname'] : '';
            $buyerLastName = isset($OrderArr['order']['lastname']) ? $OrderArr['order']['lastname'] : '';
            $buyerPhone = isset($OrderArr['order']['phone']) ? $OrderArr['order']['phone'] : '';
            $shipDate = isset($OrderArr['order']['last_modified']) ? $OrderArr['order']['last_modified'] : '';
            $soldDate = isset($OrderArr['order']['last_modified']) ? $OrderArr['order']['last_modified'] : '';
            $ebayItem = isset($OrderArr['order']['ebay_item_id']) ? $OrderArr['order']['ebay_item_id'] : '';
            $itemCost = isset($OrderArr['order']['price']) ? $OrderArr['order']['price'] : '';
            $itemId = isset($OrderArr['order']['ebay_item_id']) ? $OrderArr['order']['ebay_item_id'] : '';
            //   $orderid = $OrderArr['order']['login'];
            if (!empty($OrderArr['order']['login']) && isset($OrderArr['order']['login'])) {
                $orderid = $OrderArr['order']['login'];
            } else {
                $orderid = $buyerId;
            }
            $qtySold = isset($OrderArr['order_detail']['qty']) ? $OrderArr['order_detail']['qty'] : '';
            $salePrice = isset($OrderArr['order']['total']) ? $OrderArr['order']['total'] : '';
            $shipAddress = isset($OrderArr['order']['s_address']) ? $OrderArr['order']['s_address'] : '';
            $shipCity = isset($OrderArr['order']['s_city']) ? $OrderArr['order']['s_city'] : '';
            $shipCountry = isset($OrderArr['order']['s_country']) ? $OrderArr['order']['s_country'] : '';
            $shipFirst = isset($OrderArr['order']['firstname']) ? $OrderArr['order']['firstname'] : '';
            $shipLast = isset($OrderArr['order']['lastname']) ? $OrderArr['order']['lastname'] : '';
            $shipPhone = isset($OrderArr['order']['phone']) ? $OrderArr['order']['phone'] : '';
            $shipState = isset($OrderArr['order']['s_state']) ? $OrderArr['order']['s_state'] : '';
            $shipZip = isset($OrderArr['order']['s_zipcode']) ? $OrderArr['order']['s_zipcode'] : '';
            $productName = '';
            $trackingNumber = isset($OrderArr['order']['transaction_siteid']) ? $OrderArr['order']['transaction_siteid'] : '';
            $transactionID = isset($OrderArr['order']['transaction_id']) ? $OrderArr['order']['transaction_id'] : '';
            $paymentMethod = isset($OrderArr['order']['payment_method']) ? $OrderArr['order']['payment_method'] : '';
            $amazon_sku = '-1';
            $listing_sql = $this->db->query("select brand,productID from dev_watches where ebayid = '" . trim($itemId) . "'");
            $listingarray = $listing_sql->result_array();
            if (!empty($listingarray[0]['productID'])) {
                $amazon_sku = $listingarray[0]['brand'] . "-" . $listingarray[0]['productID'];
            }
            $isinsert = $this->db->insert('ebay_order', array(
                'billing_address1' => trim($billingAddress),
                'billing_city' => mysql_real_escape_string($billingCity),
                'billing_country' => mysql_real_escape_string($billingCountry),
                'billing_firstname' => $billingFirstName,
                'billing_lastname' => $billingLastName,
                'billing_phone' => $billingPhone,
                'billing_state' => $billingState,
                'billing_zip' => $billingZip,
                'buyer_address' => mysql_real_escape_string($buyerAddress),
                'buyer_buyerid' => $buyerId,
                'buyer_ebayid' => $buyerEbayId,
                'buyer_firstname' => mysql_real_escape_string($buyerFirstName),
                'buyer_lastname' => $buyerLastName,
                'buyer_phone' => $buyerPhone,
                'shipping_date' => date("Y-m-d H:i:s", strtotime($shipDate)),
                'sold_date' => date("Y-m-d H:i:s", strtotime($soldDate)),
                'ebay_item' => $ebayItem,
                'item_cost' => $itemCost,
                'item_id' => $itemId,
                'order_id' => $orderid,
                'qty_sold' => $qtySold,
                'sale_price' => $salePrice,
                'shipping_address1' => mysql_real_escape_string($shipAddress),
                'ship_city' => mysql_real_escape_string($shipCity),
                'ship_country' => $shipCountry,
                'ship_firstname' => mysql_real_escape_string($shipFirst),
                'ship_lastname' => mysql_real_escape_string($shipLast),
                'ship_phone' => $shipPhone,
                'ship_state' => mysql_real_escape_string($shipState),
                'ship_zip' => $shipZip,
                'product_name' => mysql_real_escape_string($productName),
                'transaction_siteid' => $trackingNumber,
                'transaction_id' => $transactionID,
                'payment_method' => $paymentMethod,
                'amazon_sku' => $amazon_sku,
                    ));

            /*
              $sql = "INSERT INTO ebay_order (   `billing_address1`, `billing_city`, `billing_country`, `billing_firstname`, `billing_lastname`,
              `billing_phone`, `billing_state`, `billing_zip`, `buyer_address`, `buyer_buyerid`, `buyer_ebayid`, `buyer_firstname`, `buyer_lastname`,
              `buyer_phone`, `shipping_date`, `sold_date`, `ebay_item`, `item_cost`, `item_id`, `order_id`, `qty_sold`, `sale_price`, `shipping_address1`,
              `ship_city`, `ship_country`, `ship_firstname`, `ship_lastname`, `ship_phone`, `ship_state`, `ship_zip`,
              `product_name`, `tracking_number`, `transaction_id`, `payment_method`) VALUES
              (   '" . trim($billingAddress) . "', '" . mysql_real_escape_string($billingCity) . "', '" . mysql_real_escape_string($billingCountry) . "', '" . $billingFirstName . "', '" . $billingLastName . "',
              '" . $billingPhone . "', '" . $billingState . "', '" . $billingZip . "', '" . mysql_real_escape_string($buyerAddress) . "', '" . $buyerId . "', '" . $buyerEbayId . "', '" . mysql_real_escape_string($buyerFirstName) . "',
              '" . $buyerLastName . "', '" . $buyerPhone . "', '" . date("Y-m-d H:i:s", strtotime($shipDate)) . "', '" . date("Y-m-d H:i:s", strtotime($soldDate)) . "',
              '" . $ebayItem . "', '" . $itemCost . "', '" . $itemId . "', '" . $orderid . "', '" . $qtySold . "', '" . $salePrice . "', '" . mysql_real_escape_string($shipAddress) . "',
              '" . mysql_real_escape_string($shipCity) . "', '" . $shipCountry . "', '" . mysql_real_escape_string($shipFirst) . "', '" . mysql_real_escape_string($shipLast) . "', '" . $shipPhone . "', '" . mysql_real_escape_string($shipState) . "', '" . $shipZip . "', '" . mysql_real_escape_string($productName) . "', '" . $trackingNumber . "', '" . $transactionID . "','" . $paymentMethod . "')";
              //$sql =  "insert into orders ".$this->config->item('table_perfix')."companyinfo";
              mysql_query($sql);
              $insert_id = mysql_insert_id();
             *
             */
            if ($ebayItem) {
                $query = $this->db->query("select * from " . $this->config->item('table_perfix') . "watches  where  ebayid = '" . $ebayItem . "'  LIMIT 1");
                $data = $query->result_array();
                $AfterReduceQty = $data[0]['qty'] - $qtySold;
                if ($data[0]['qty'] > 0) {
                    if ($AfterReduceQty <= 0) {
                        $sql = "Update dev_watches set qty  =  0   where ebayid = '" . $ebayItem . "'";
                        $result = $this->db->query($sql);
                        $q = $this->endFixedPriceBid($ebayItem);
                        $this->updateamzinventory($data, 0);
                    } else {
                        $productArr = $this->getAllByWatchID($data[0]['productID']);
                        $productArr['qty'] = $AfterReduceQty;
                        $sql = "Update dev_watches set qty  =  '" . $AfterReduceQty . "'   where ebayid = '" . $ebayItem . "'";
                        $result = $this->db->query($sql);
                        //  $this->addWatchtoEbay($productArr, $action='edit');
                        $this->updateamzinventory($productArr, $AfterReduceQty);
                    }
                } else {
                    $this->endFixedPriceBid($ebayItem);
                }
            }
        }
    }

    function updateamzinventory($data, $qty) {
        if (isset($data[0]['id_type']) && !empty($data[0]['id_type'])) {
            $id_type = $data[0]['id_type'];
        } else {
            $id_type = $data['id_type'];
        }
        if (isset($data[0]['upc']) && !empty($data[0]['upc'])) {
            $upc = $data[0]['upc'];
        } else {
            $upc = $data['upc'];
        }
        if (isset($data[0]['brand']) && !empty($data[0]['brand'])) {
            $brand = $data[0]['brand'];
        } else {
            $brand = $data['brand'];
        }
        if (isset($data[0]['productID']) && !empty($data[0]['productID'])) {
            $rid = $data[0]['productID'];
        } else {
            $rid = $data['productID'];
        }
        if ($id_type == '1') {
            $upcid = $upc . "%2C";
            $upcid .= $upc;
            $type = 'ASIN';
        }
        if ($id_type == '2') {
            $upcid = $upc . "%2C";
            $upcid .= $upc;
            $type = 'ISBN';
        }
        if ($id_type == '3') {
            $upcid = $upc . "%2C";
            $upcid .= $upc;
            $type = 'UPC';
        }
        if ($id_type == '4') {
            $upcid = $upc . "%2C";
            $upcid .= $upc;
            $type = 'EAN';
        }
        include_once(config_item('base_path') . "amazon/Amazon.php");
        /*
         * Update Amazon lowest price on website
         */

        $amazon = new Amazon();
        if ($type != 'ASIN') {
            if (!empty($brand)) {
                $vendor_sku = $brand . "-" . $rid;
            } else {
                $vendor_sku = "watch-" . $rid;
            }
            $filePath = config_item('base_path') . "amazon/price_qty_upc.txt";
            $fp = fopen($filePath, "w");
            $fileText = "product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
            fwrite($fp, $fileText);
            $fileText = "\n" . $upc . "\t";
            $fileText .=$id_type . "\t";
            //$fileText .="11\t";
            $fileText .="\t";
            $fileText .="\t";
            $fileText .=$vendor_sku . "\t";
            $fileText .=$qty . "\t";
            $fileText .="a\t";
            $fileText .="n\t";
            $fileText .="y\t";
            $fileText .="This watch is Brand NEW!!!!!!!!! . Factory Authorized Dealer 100% New In Box Customer Satisfaction Guaranteed or Money Back. Shop With Confidence.In Stock Same Day Shipping.\t";
            fwrite($fp, $fileText);
            fclose($fp);
            $batchID = simplexml_load_string($amazon->AmazonListing($filePath));
            $this->db->insert('upload_report', array(
                'batchID' => trim($batchID),
                'status' => 'open',
                'dateofmodification' => date('Y-m-d H:i:s'),
            ));
            //$this->db->where("productID", trim($isinsert));
        }
    }

    function saverolex($post, $action = 'view', $id = 0, $imageSmall = '', $imageBig = '') {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';

        $watchResult = $this->getAllByWatchID($post['rolex_id']);

        $post['thumb'] = $watchResult['thumb'];
        $post['large'] = $watchResult['large'];
        $post['image_small2'] = $watchResult['image_small2'];
        $post['image_big2'] = $watchResult['image_big2'];
        $post['image5'] = $watchResult['image5'];
        $post['image6'] = $watchResult['image6'];
        if (is_array($post)) {

            $name = isset($post['name']) ? $post['name'] : 0;
            $price = isset($post['price']) ? $post['price'] : 0;

            $lowest_price = isset($post['lowest_price']) ? $post['lowest_price'] : 0;
            $highest_price = isset($post['highest_price']) ? $post['highest_price'] : 0;
            $retail_price = isset($post['retail_price']) ? $post['retail_price'] : 0;


            $case_diameter = isset($post['case_diameter']) ? $post['case_diameter'] : '';
            $clasp = isset($post['clasp']) ? $post['clasp'] : '';
            $part = isset($post['part']) ? $post['part'] : '';
            $band_length = isset($post['band_length']) ? $post['band_length'] : '';
            $band_color = isset($post['band_color']) ? $post['band_color'] : '';

            $uprice = isset($post['uprice']) ? $post['uprice'] : '';
            $model_number = isset($post['model_number']) ? $post['model_number'] : '';
            $tempbrand = isset($post['brand']) ? $post['brand'] : '';
            $gender = isset($post['gender']) ? $post['gender'] : '';
            $metal = isset($post['metal']) ? $post['metal'] : '';
            $qty = isset($post['qty']) ? $post['qty'] : '';
            $upc = isset($post['upc']) ? $post['upc'] : '';
            //$finger_size   	= isset($post['finger_size']) 	? $post['finger_size'] : '';
            $sku = isset($post['sku']) ? $post['sku'] : '';
            $description = isset($post['description']) ? $post['description'] : '';
            $small_img = isset($post['small_image']) ? $post['small_image'] : '';
            $big_image = isset($post['big_image']) ? $post['big_image'] : '';
            $style = isset($post['style']) ? $post['style'] : '';
            $amazon_chk = isset($post['amazon_chk']) ? $post['amazon_chk'] : '0';
            $ebay_chk = isset($post['ebay_chk']) ? $post['ebay_chk'] : '0';
            $website_chk = isset($post['website_chk']) ? $post['website_chk'] : '0';

            if ($tempbrand == '-1') {
                $brand = $post['otherbrandname'];
            } else {
                $brand = $tempbrand;
            }

            $image5 = isset($post['image5']) ? $post['image5'] : '';
            $image6 = isset($post['image6']) ? $post['image6'] : '';

            $condition = isset($post['condition']) ? $post['condition'] : 'new';
            $warranty = isset($post['warranty']) ? $post['warranty'] : '';
            $papers = isset($post['papers']) ? $post['papers'] : '';
            $box = isset($post['box']) ? $post['box'] : '';
            $lugwidth = isset($post['lugwidth']) ? $post['lugwidth'] : '';
            $thickness = isset($post['thickness']) ? $post['thickness'] : '';
            $height = isset($post['height']) ? $post['height'] : '';
            $width = isset($post['width']) ? $post['width'] : '';
            $movement = isset($post['movement']) ? $post['movement'] : '';
            $calibre = isset($post['calibre']) ? $post['calibre'] : '';
            $crystal = isset($post['crystal']) ? $post['crystal'] : '';
            $features = isset($post['features']) ? $post['features'] : '';
            $bezel = isset($post['bezel']) ? $post['bezel'] : '';
            $markers = isset($post['markers']) ? $post['markers'] : '';
            $hands = isset($post['hands']) ? $post['hands'] : '';
            $dial = isset($post['dial']) ? $post['dial'] : '';
            $band = isset($post['band']) ? $post['band'] : '';
            $id_type = isset($post['id_type']) ? $post['id_type'] : '';
            $highest_amazon_price = isset($post['highest_amazon_price']) ? $post['highest_amazon_price'] : '';
            $per_dis_amt = isset($post['per_dis_amt']) ? $post['per_dis_amt'] : '';

            $diamond = isset($post['diamomd']) ? $post['diamomd'] : '';
            $diamond_width = isset($post['diamond_width']) ? $post['diamond_width'] : '';
            $ebay_upload_type = isset($post['ebay_upload_type']) ? $post['ebay_upload_type'] : '';
            $asin_price = isset($post['asin_price']) ? $post['asin_price'] : '';


            $isinsert = $this->db->insert($this->config->item('table_perfix') . 'watches', array(
                'productName' => $name,
                'productDescription' => $description,
                'price1' => $price,
                'price2' => $uprice,
                'lowest_price' => $lowest_price,
                'highest_price' => $highest_price,
                'retail_price' => $retail_price,
                'condition' => $condition,
                'SKU' => $sku,
                'metal' => $metal,
                //'finger_size'		=> $finger_size,
                'qty' => $qty,
                'upc' => $upc,
                'style' => $style,
                'gender' => $gender,
                'model_number' => $model_number,
                'brand' => $brand,
                'band' => $band,
                'dial' => $dial,
                'hands' => $hands,
                'markers' => $markers,
                'bezel' => $bezel,
                'features' => $features,
                'crystal' => $crystal,
                'movement' => $movement,
                'calibre' => $calibre,
                'width' => $width,
                'height' => $height,
                'thickness' => $thickness,
                'lugwidth' => $lugwidth,
                'box' => $box,
                'papers' => $papers,
                'warranty' => $warranty,
                //   'image5'  => $watchResult['image5'],
                'case_diameter' => $case_diameter,
                //    'image6'  => $watchResult['image6'],
                'clasp' => $clasp,
                'part' => $part,
                'band_length' => $band_length,
                'band_color' => $band_color,
                'id_type' => $id_type,
                'highest_amazon_price' => $highest_amazon_price,
                'is_amaz_uploaded' => '0',
                'per_dis_amt' => $per_dis_amt,
                'diamond' => $diamond,
                'diamond_width' => $diamond_width,
                'ebay_upload_type' => $ebay_upload_type,
                'on_amzon' => $amazon_chk,
                'on_ebay' => $ebay_chk,
                'on_website' => $website_chk,
                    /* 		'thumb' => $watchResult['thumb'],
                      'large' => $watchResult['large'],
                      'image_small2' => $watchResult['image_small2'],
                      'image_big2'  => $watchResult['image_big2'],
                     */

                    //'insertionDate'		=> 'now()'
                    ));
            $rid = $this->db->insert_id();
			
			if ($_FILES['watch_image']['name'] != '') {
					$this->uploadfile($_FILES, 'watch_image', 'images/watches', 'jpeg,gif,jpg,bmp,png,swf', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'thumb');
				}
        }

        return $rid;
    }

    function getBrands($page = 1, $rp = 10, $sortname = 'brand_name', $sortorder = 'desc', $query = '', $qtype = 'brand_name', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";


        $sql = 'SELECT  * FROM  dev_brands where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT  brand_id FROM  dev_brands  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }

    function brands($data, $action, $id) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $data['items'];
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    // $itemDetail = $this->getAllByWatchID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM dev_brands WHERE brand_id = $value ";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($data['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            if (is_array($data)) {
                if ($action == 'add') {
                    $isinsert = $this->db->insert('dev_brands', array(
                        'brand_name' => $data['brand_name'],
                        'brand_content' => $data['brand_content'],
//                    			'brand_link' => $data['brand_link'],
                        'brand_image' => $data['image'],
                        'brand_date' => date("Y-m-d H:i:s")
                            ));

                    $rid = $this->db->insert_id();
                } else {

                    $rid = $id;
                    $this->db->where('brand_id', $id);
                    if (!empty($data['image'])) {

                        $isinsert = $this->db->update('dev_brands', array(
                            'brand_name' => $data['brand_name'],
                            'brand_content' => $data['brand_content'],
//                                        'image_type' => $data['image_type'],
//                    			'image_link' => $data['brand_'],
                            'brand_image' => $data['image'],
                            'brand_date' => date("Y-m-d H:i:s")
                                ));
                    } else {

                        $isinsert = $this->db->update('dev_brands', array(
                            'brand_name' => $data['brand_name'],
                            'brand_content' => $data['brand_content'],
//                                        'image_type' => $data['image_type'],
//                    			'image_link' => $data['brand_'],                          		
                            'brand_date' => date("Y-m-d H:i:s")
                                ));
                    }
                }
            }
            $retuen['success'] .= 'Watch Brand has been ' . ucfirst($action) . 'ed successfully';
        }

        return $retuen;
    }

    function getBrandsByID($sid) {
        $qry = "SELECT * FROM `dev_brands`
                                WHERE brand_id = '" . $sid . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function getfeedbacksByID($sid) {
        $qry = "SELECT * FROM `dev_feedbacks`
                                WHERE id = '" . $sid . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function feedbacks($data, $action, $id) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $data['items'];
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    // $itemDetail = $this->getAllByWatchID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM dev_feedbacks WHERE id = $value ";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($data['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            if (is_array($data)) {
                if ($action == 'add') {
                    $isinsert = $this->db->insert('dev_feedbacks', array(
                        'email' => $data['email'],
                        'description' => $data['description'],
                        'status' => $data['status'],
                        'adddate' => date("Y-m-d H:i:s")
                            ));

                    $rid = $this->db->insert_id();
                } else {
                    $rid = $id;
                    $this->db->where('id', $id);
                    $isinsert = $this->db->update('dev_feedbacks', array(
                        'email' => $data['email'],
                        'description' => $data['description'],
                        'status' => $data['status'],
                        'adddate' => date("Y-m-d H:i:s")
                            ));
                }
            }
            $retuen['success'] .= 'Feedback Info has been ' . ucfirst($action) . 'ed  successfully. ';
        }

        return $retuen;
    }

    function getfeedbacks($page = 1, $rp = 10, $sortname = 'email', $sortorder = 'desc', $query = '', $qtype = 'email', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";


        $sql = 'SELECT  * FROM  dev_feedbacks where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT  id FROM  dev_feedbacks  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();

        return $results;
    }

    function CsvHandler($data) {

        /*     if ($_FILES['image_small']['name'] != '')
          $this->uploadfile($_FILES, 'image_small', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'thumb');


          if ($_FILES['big_image']['name'] != '')
          $this->uploadfile($_FILES, 'big_image', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'large');

          if ($_FILES['image_small2']['name'] != '')
          $this->uploadfile($_FILES, 'image_small2', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'image_small2');

          if ($_FILES['big_image2']['name'] != '')
          $this->uploadfile($_FILES, 'big_image2', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'image_big2');

          if ($_FILES['image5']['name'] != '')
          $this->uploadfile($_FILES, 'image5', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'image5');

          if ($_FILES['image6']['name'] != '')
          $this->uploadfile($_FILES, 'image6', 'images/watches', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/watches', $rid, 'watches', 'productID', $rid, 'image6');
         */
        $sql = "SELECT  productID  FROM  " . $this->config->item('table_perfix') . "watches where  productName = '" . trim($data[0]) . "'";
        $result = $this->db->query($sql);
        $is_ItemAlreadyListed = $result->result_array();

        if (trim($data[29]) == 'UPC') {
            $id_type = '3';
        } elseif (trim($data[29]) == 'ISBN') {
            $id_type = '2';
        } elseif (trim($data[29]) == 'EAN') {
            $id_type = '4';
        } elseif (trim($data[29]) == 'ASIN') {
            $id_type = '1';
        }
        $smallImage = '';
        $smallImage2 = '';
        $bigImage = '';
        $bigImage2 = '';
        $image5 = '';
        $image6 = '';
        if (!isset($is_ItemAlreadyListed['productID']) && empty($is_ItemAlreadyListed['productID'])) {
            $isinsert = $this->db->insert($this->config->item('table_perfix') . 'watches', array(
                'productName' => $data[0],
                'productDescription' => $data[1],
                'price1' => $data[2],
                'price2' => '',
                'retail_price' => $data[23],
                'condition' => $data[31],
                'SKU' => $data[3],
                'metal' => $data[8],
                'qty' => $data[4],
                'upc' => $data[22],
                'style' => $data[6],
                'gender' => $data[7],
                'model_number' => $data[9],
                'brand' => $data[10],
                'band' => $data[11],
                'dial' => $data[12],
                'hands' => $data[13],
                'markers' => '',
                'bezel' => $data[18],
                'features' => '',
                'crystal' => '',
                'movement' => $data[19],
                'calibre' => '',
                'width' => $data[20],
                'height' => '',
                'thickness' => '',
                'lugwidth' => '',
                'box' => '',
                'papers' => '',
                'warranty' => $data[21],
                'case_diameter' => $data[24],
                'thumb' => $smallImage,
                'large' => $bigImage,
                'image_small2' => $smallImage2,
                'image_big2 ' => $bigImage2,
                'image5' => $image5,
                'image6' => $image6,
                'clasp' => $data[25],
                'part' => $data[26],
                'band_length' => $data[27],
                'band_color' => $data[28],
                'id_type' => $id_type,
                'diamond_width' => '',
                'ebay_upload_type' => $data[30],
                'on_amzon' => 1,
                'on_ebay' => 1,
                'on_website' => 1,
                'on_amazon_ca' => 1,
                'apprisal' => '',
                    //'insertionDate'=> 'now()'
                    ));
            $rid = $this->db->insert_id();
        } else {
            $rid = $is_ItemAlreadyListed['productID'];
            $this->db->where('productID', $id);
            $isinsert = $this->db->update($this->config->item('table_perfix') . 'watches', array(
                'productName' => $data[0],
                'productDescription' => $data[1],
                'price1' => $data[2],
                'price2' => '',
                'retail_price' => $data[23],
                'condition' => $data[31],
                'SKU' => $data[3],
                'metal' => $data[8],
                'qty' => $data[4],
                'upc' => $data[22],
                'style' => $data[6],
                'gender' => $data[7],
                'model_number' => $data[9],
                'brand' => $data[10],
                'band' => $data[11],
                'dial' => $data[12],
                'hands' => $data[13],
                'markers' => '',
                'bezel' => $data[18],
                'features' => '',
                'crystal' => '',
                'movement' => $data[19],
                'calibre' => '',
                'width' => $data[20],
                'height' => '',
                'thickness' => '',
                'lugwidth' => '',
                'box' => '',
                'papers' => '',
                'warranty' => $data[21],
                'case_diameter' => $data[24],
                'thumb' => $smallImage,
                'large' => $bigImage,
                'image_small2' => $smallImage2,
                'image_big2 ' => $bigImage2,
                'image5' => $image5,
                'image6' => $image6,
                'clasp' => $data[25],
                'part' => $data[26],
                'band_length' => $data[27],
                'band_color' => $data[28],
                'id_type' => $id_type,
                'diamond_width' => '',
                'ebay_upload_type' => $data[30],
                'on_amzon' => 1,
                'on_ebay' => 1,
                'on_website' => 1,
                'on_amazon_ca' => 1,
                'apprisal' => '',
                    //'insertionDate'=> 'now()'
                    ));
        }
        $productArr = $this->getAllByWatchID($rid);

        if ($data[4] < 1) {
            $status = $this->endFixedPriceBid($productArr['ebayid']);
        } else {
            $this->addWatchtoEbay($productArr);
        }
        /*
         * Add Item To Amazon
         *
         */
        $this->addItemToAmazonByCsv($productArr);
    }

    function addItemToAmazonByCsv($productArr) {
        $id_type = $productArr['id_type'];
        $upc = $productArr['upc'];
        $rid = $productArr['productID'];
        $condition = $productArr['condition'];
        $brand = $productArr['brand'];
        $price = $productArr['price1'];
        $qty = $productArr['qty'];
        if ($id_type == '1') {
            $upcid = $upc . "%2C";
            $upcid .= $upc;
            $type = 'ASIN';
        }
        if ($id_type == '2') {
            $upcid = $upc . "%2C";
            $upcid .= $upc;
            $type = 'ISBN';
        }
        if ($id_type == '3') {
            $upcid = $upc . "%2C";
            $upcid .= $upc;
            $type = 'UPC';
        }
        if ($id_type == '4') {
            $upcid = $upc . "%2C";
            $upcid .= $upc;
            $type = 'EAN';
        }
        include_once(config_item('base_path') . "amazon/Amazon.php");
        /*
         * Update Amazon lowest price on website
         */

        $amazon = new Amazon();
        $qry = "Update dev_watches set  `amazon_listed_price` = '" . mysql_real_escape_string($price) . "'   where `productID` =  '" . trim($rid) . "'";
        $this->db->query($qry);
        /*
         * @ Add Item on amazon
         */
        if (!empty($brand)) {
            $vendor_sku = $brand . "-" . $rid;
        } else {
            $vendor_sku = "watch-" . $rid;
        }
        if ($condition == 'used') {
            $cond = '2';
        } else {
            $cond = '11';
        }

        /*
         * Create csv and upload on amazon
         */
        $filePath = config_item('base_path') . "amazon/csv_qty_upc.txt";
        $fp = fopen($filePath, "a");
//                            $fileText = "product-id\tproduct-id-type\titem-condition\tprice\tsku\tquantity\tadd-delete\twill-ship-internationally\texpedited shipping\titem-note";
        //                          fwrite($fp,$fileText);
        $fileText = "\n" . trim($upc) . "\t";
        $fileText .=trim($id_type) . "\t";
        //$fileText .="11\t";
        $fileText .=trim($cond) . "\t";
        $fileText .=trim($price) . "\t";
        $fileText .=trim($vendor_sku) . "\t";
        $fileText .=trim($qty) . "\t";
        $fileText .="a\t";
        $fileText .="n\t";
        $fileText .="y\t";
        $fileText .="This watch is Brand NEW!!!!!!!!!. Factory Authorized Dealer 100% New In Box Customer Satisfaction Guaranteed or Money Back. Shop With Confidence.In Stock Same Day Shipping.\t";
        fwrite($fp, $fileText);
        fclose($fp);

        /*
          $batchID = simplexml_load_string($amazon->AmazonListing($filePath,'com'));
          $this->db->insert('upload_report', array(
          'batchID' => trim($batchID),
          'status' => 'open',
          'dateofmodification' => date('Y-m-d H:i:s') ,
          ));
         */

        /* $batchID = simplexml_load_string($amazon->AmazonListing($filePath,'ca'));

          $this->db->insert('upload_report', array(
          'batchID' => trim($batchID),
          'status' => 'open',
          'dateofmodification' => date('Y-m-d H:i:s') ,
          ));
         */
    }

    function UploadOnAmazon($filePath) {
        include_once(config_item('base_path') . "amazon/Amazon.php");
        $amazon = new Amazon();
        $batchID = simplexml_load_string($amazon->AmazonListing($filePath, 'com'));
        $this->db->insert('upload_report', array(
            'batchID' => trim($batchID),
            'status' => 'open',
            'dateofmodification' => date('Y-m-d H:i:s'),
        ));
        return $batchID;
//$retuen['success'] .= '<h1 class="success">Watch info Successfully ' . ucfirst($action) . 'ed .</h1><br /><br /><small> <a href="' . config_item('base_url') . 'admin/rolex/edit/' . $rid . '">Click Here </a> To View/Edit</small>';
    }

    function jewelriesinventory($data) {
		//print_r($data);die;
        /*$sql = "SELECT  id  FROM  " . $this->config->item('table_perfix') . "diamond_items  where  SKU = '" . trim($data[0]) . "'";
        $result = $this->db->query($sql);
        $is_ItemAlreadyListed = $result->result_array();*/

        //if (!isset($is_ItemAlreadyListed['id']) && empty($is_ItemAlreadyListed['id'])) {
            $isinsert = $this->db->insert($this->config->item('table_perfix') . 'index', array(
                'shape' => $data[1],
                'color' => $data[4],
                'clarity' => $data[5],
                'cut' => $data[7],
                'Polish' => $data[9],
                'fancy_color' => $data[13],
                'Comment' => $data[14],
                'certimage' => $data[16],
                'Cert_n' => $data[17],
                'Stock_n' => $data[18],
                'price' => $data[19],
                'pricepercrt' => $data[20],
                'Depth' => $data[22],
                'Girdle' => $data[23],
                'Culet' => $data[25],
                'City' => $data[28],
                'State' => $data[29],
				'Country' => $data[30],
				'TablePercent' =>$data[31]
                    ));
            //$rid = $this->db->insert_id();
        /*} else {
            $rid = $is_ItemAlreadyListed['id'];
            $this->db->where('id', $id);
            $isinsert = $this->db->update($this->config->item('table_perfix') . 'index', array(
                'SKU' => $data[0],
                'Product_title' => $data[1],
                'Description' => $data[2],
                'Category' => $data[3],
                'Ring_sizes_available' => $data[4],
                'Price' => $data[5],
                'Retail_price' => $data[6],
                'Wholesale_price' => $data[7],
                'Current_stock' => $data[8],
                'Main_material' => $data[9],
                'Main_stone' => $data[10],
                'Color' => $data[11],
                'Details' => $data[12],
                'Diamond_information' => $data[13],
                'Gemstone_information' => $data[14],
                'Meta_title' => $data[15],
                'Meta_desc' => $data[16],
                    ));
        }*/
        /*
          @ End Jew. Data
         */
    }
    
    
    function jewelriesinventoryCustom2($data , $row) {
        $sql = "SELECT  Stock_n  FROM  " . $this->config->item('table_perfix') . "rapproduct  where  Stock_n = '" . trim($data[37]) . "'";
        $result = $this->db->query($sql);
        $is_ItemAlreadyListed = $result->result_array();
        
         //echo "<pre>"; var_dump($is_ItemAlreadyListed);
         
        $lotid = 0;
        
        if(isset($is_ItemAlreadyListed[0]['Stock_n'])){
	    $id = $is_ItemAlreadyListed[0]['Stock_n'];
	    
	    echo "<pre>"; var_dump($id);
	    var_dump($row);
	    
            $this->db->where('Stock_n', $id);
            $isinsert = $this->db->update($this->config->item('table_perfix') . 'rapproduct', array(
		'lot' => $row,
		'owner' => 'ZKOR DIAMONDS',
                'shape' => $data[1],
                'carat' => $data[2],
                'color' => $data[3],
                'fancy_color' => $data[30],
                'fancy_color_ot' => $data[32],
                'clarity' => $data[4],
                'price' => $data[10],
                'Rap' => $data[33],
                'Cert' => $data[7],
                'Depth' => $data[12],
                'TablePercent' => $data[13],
                'Girdle' => $data[19],
                'Culet' => $data[18],
                'Polish' => $data[20],
                'Sym' => $data[21],
                'Flour' => $data[22],
                'Meas' => $data[5],
                'Comment' => $data[31],
                'Cert_n' => $data[34],
                'Stock_n' => $data[37],
                'Date' => $data[48],
                'City' => $data[40],
                'State' => $data[41],
                'Country' => $data[42],
                'cut' => $data[6],
                'certimage' => $data[35],
                'pricepercrt' => $data[10]));
        
        }else{
	    echo "<pre>"; var_dump($is_ItemAlreadyListed[0]['Stock_n']);
            $isinsert = $this->db->insert($this->config->item('table_perfix') . 'rapproduct', array(
		'lot' => $row,
		'owner' => 'ZKOR DIAMONDS',
                'shape' => $data[1],
                'carat' => $data[2],
                'color' => $data[3],
                'fancy_color' => $data[30],
                'fancy_color_ot' => $data[32],
                'clarity' => $data[4],
                'price' => $data[10],
                'Rap' => $data[33],
                'Cert' => $data[7],
                'Depth' => $data[12],
                'TablePercent' => $data[13],
                'Girdle' => $data[19],
                'Culet' => $data[18],
                'Polish' => $data[20],
                'Sym' => $data[21],
                'Flour' => $data[22],
                'Meas' => $data[5],
                'Comment' => $data[31],
                'Cert_n' => $data[34],
                'Stock_n' => $data[37],
                'Date' => $data[48],
                'City' => $data[40],
                'State' => $data[41],
                'Country' => $data[42],
                'cut' => $data[6],
                'certimage' => $data[35],
                'pricepercrt' => $data[10]
                    ));
            $rid = $this->db->insert_id();
	  }
        /*
          @ End Jew. Data
         */
    }
    
    
    function jewelriesinventoryCustom($data) {
        $sql = "SELECT  lot  FROM  " . $this->config->item('table_perfix') . "rapproduct  where  lot = '" . trim($data[18]) . "'";
        $result = $this->db->query($sql);
        $is_ItemAlreadyListed = $result->result_array();

        if (!isset($is_ItemAlreadyListed['lot']) && empty($is_ItemAlreadyListed['lot'])) {
            $isinsert = $this->db->insert($this->config->item('table_perfix') . 'rapproduct', array(
		'lot' => $data[18],
		'owner' => 'ZKOR DIAMONDS',
                'shape' => $data[1],
                'carat' => $data[2],
                'color' => $data[3],
                'fancy_color' => $data[13],
                'fancy_color_ot' => $data[15],
                'clarity' => $data[4],
                'price' => $data[19],
                'Rap' => $data[33],
                'Cert' => $data[12],
                'Depth' => $data[22],
                'TablePercent' => $data[31],
                'Girdle' => $data[19],
                'Culet' => $data[24],
                'Polish' => $data[8],
                'Sym' => $data[9],
                'Flour' => $data[10],
                'Meas' => $data[11],
                'Comment' => $data[14],
                'Cert_n' => $data[17],
                'Stock_n' => $data[18],
                'Date' => $data[34],
                'City' => $data[28],
                'State' => $data[29],
                'Country' => $data[30],
                'cut' => $data[6],
                'certimage' => $data[16],
                'pricepercrt' => $data[20]
                    ));
            $rid = $this->db->insert_id();
        } else {
            $id = $is_ItemAlreadyListed['lot'];
            $this->db->where('lot', $id);
            $isinsert = $this->db->update($this->config->item('table_perfix') . 'rapproduct', array(
            	'lot' => $data[18],
		'owner' => 'ZKOR DIAMONDS',
                'shape' => $data[1],
                'carat' => $data[2],
                'color' => $data[3],
                'fancy_color' => $data[13],
                'fancy_color_ot' => $data[15],
                'clarity' => $data[4],
                'price' => $data[19],
                'Rap' => $data[33],
                'Cert' => $data[12],
                'Depth' => $data[22],
                'TablePercent' => $data[18],
                'Girdle' => $data[19],
                'Culet' => $data[20],
                'Polish' => $data[8],
                'Sym' => $data[9],
                'Flour' => $data[10],
                'Meas' => $data[11],
                'Comment' => $data[14],
                'Cert_n' => $data[17],
                'Stock_n' => $data[18],
                'Date' => $data[34],
                'City' => $data[28],
                'State' => $data[29],
                'Country' => $data[30],
                'cut' => $data[6],
                'certimage' => $data[16],
                'pricepercrt' => $data[20]
                    ));
        }
        /*
          @ End Jew. Data
         */
    }

    function povadaupload($data) {
        $isinsert = $this->db->insert($this->config->item('table_perfix') . 'diamond_items', array(
            'SKU' => $data[0],
            'Product_title' => $data[1],
            'Description' => $data[2],
            'Category' => $data[3],
            'Ring_sizes_available' => $data[4],
            'Price' => $data[5],
            'Retail_price' => $data[6],
            'Wholesale_price' => $data[7],
            'Current_stock' => $data[8],
            'Main_material' => $data[9],
            'Main_stone' => $data[10],
            'Color' => $data[11],
            'Details' => $data[12],
            'Diamond_information' => $data[13],
            'Gemstone_information' => $data[14],
            'Meta_title' => $data[15],
            'Meta_desc' => $data[16],
                //'insertionDate'=> 'now()'
                ));
        $rid = $this->db->insert_id();
    }

    function getstuller($page = 0, $rp = 10, $sortname = 'itemid', $sortorder = 'desc', $query = '', $qtype = 'item_number', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        // $start = (($page - 1) * $rp);
        $start = $page;

        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        
          $qwhere = "";
          if (!empty($query)){
		  $results['count'] = 1;
		  mysql_query("RESET QUERY CACHE");
			$result = mysql_query("SELECT * FROM `dev_stuller` WHERE `stuller_id`='".$query."'");
			if(mysql_num_rows($result)){
				$results['result'][]=mysql_fetch_array($result);
			}
		  return $results;
		  } else
		  
		  //$qwhere .= " AND $qtype LIKE '%$query%' ";
		  
          if ($oid != '')
          $qwhere .= " AND id = $oid";
         
        /// $oid = str_replace("*","/",$oid);
        if (!empty($oid)) {

            $qwhere .= "  AND level1 LIKE '" . urldecode($oid) . "%'";
        }

        $sql = 'SELECT  * FROM  dev_stuller where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;
        //var_dump($sql);
        //echo $sql; exit();
        $result = $this->db->query($sql);
		$results['result'] = $result->result_array();
        $sql2 = 'SELECT  stuller_id FROM  dev_stuller  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);

        $results['count'] = $result2->num_rows();

        return $results;
    }

    function getstullerByID($id) {
        $qry = "SELECT * FROM `dev_stuller`
                                WHERE stuller_id = '" . $id . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function stuller($post, $action = 'view', $id = 0, $imageSmall = '', $imageBig = '') {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';

        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $itemDetail = $this->getAllByWatchID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "stuller WHERE stuller_id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {

            if (is_array($post)) {
                $SKU = isset($post['SKU']) ? $post['SKU'] : '';
                $Product_title = isset($post['Product_title']) ? $post['Product_title'] : '';
                $Description = isset($post['Description']) ? $post['Description'] : '';
                $Category = isset($post['Category']) ? $post['Category'] : 0;
                $Ring_sizes_available = isset($post['Ring_sizes_available']) ? $post['Ring_sizes_available'] : 0;
                $Price = isset($post['Price']) ? $post['Price'] : 0;
                $Retail_price = isset($post['Retail_price']) ? $post['Retail_price'] : '';
                $Wholesale_price = isset($post['Wholesale_price']) ? $post['Wholesale_price'] : 1;
                $Current_stock = isset($post['Current_stock']) ? $post['Current_stock'] : '';
                $Main_material = isset($post['Main_material']) ? $post['Main_material'] : '';
                $Main_stone = isset($post['Main_stone']) ? $post['Main_stone'] : '';
                $Color = isset($post['Color']) ? $post['Color'] : '';
                $Details = isset($post['Details']) ? $post['Details'] : '';
                $Diamond_information = isset($post['Diamond_information']) ? $post['Diamond_information'] : '';
                $Gemstone_information = isset($post['Gemstone_information']) ? $post['Gemstone_information'] : '';
                $Meta_title = isset($post['Meta_title']) ? $post['Meta_title'] : '';
                $Meta_desc = isset($post['Meta_desc']) ? $post['Meta_desc'] : '';
                if ($action == 'add') {
                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'diamond_items', array(
                        'SKU' => $SKU,
                        'Product_title' => $Product_title,
                        'Description' => $Description,
                        'Category' => $Category,
                        'Ring_sizes_available' => $Ring_sizes_available,
                        'Price' => $Price,
                        'Retail_price' => $Retail_price,
                        'Wholesale_price' => $Wholesale_price,
                        'Current_stock' => $Current_stock,
                        'Main_material' => $Main_material,
                        'Main_stone' => $Main_stone,
                        'Color' => $Color,
                        'Details' => $Details,
                        'Diamond_information' => $Diamond_information,
                        'Gemstone_information' => $Gemstone_information,
                        'Meta_title' => $Meta_title,
                        'Meta_desc' => $Meta_desc,
                            ));
                    $rid = $this->db->insert_id();
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('id', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'diamond_items', array(
                        'SKU' => $SKU,
                        'Product_title' => $Product_title,
                        'Description' => $Description,
                        'Category' => $Category,
                        'Ring_sizes_available' => $Ring_sizes_available,
                        'Price' => $Price,
                        'Retail_price' => $Retail_price,
                        'Wholesale_price' => $Wholesale_price,
                        'Current_stock' => $Current_stock,
                        'Main_material' => $Main_material,
                        'Main_stone' => $Main_stone,
                        'Color' => $Color,
                        'Details' => $Details,
                        'Diamond_information' => $Diamond_information,
                        'Gemstone_information' => $Gemstone_information,
                        'Meta_title' => $Meta_title,
                        'Meta_desc' => $Meta_desc,
                            ));
                }


                if ($_FILES['image']['name'] != '') {
                    $this->uploadfile($_FILES, 'image', 'povada', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/povada', $rid, 'diamond_items', 'id', $rid, 'image');
                }
                $details = $this->getpovadaByID($rid);
                $this->addDiamondtoEbay($details, 'povada');
            }
        }
    }

    function addDiamondtoEbay($detail, $section = 'ring') {

        $duration = 30;
        $storeCategoryId = '3103634018';
        $requestArray['primaryCategory'] = '31387';
        $requestArray['listingType'] = 'StoresFixedPrice';
        $requestArray['productID'] = $detail['SKU'];
        $requestArray['id'] = $detail['id'];
        $requestArray['itemTitle'] = $detail['Product_title'];
        //.' '.ucfirst($detail['brand']).' '.$detail['productName'].' '.$metalarray[$detail['metal']].' '.ucfirst($detail['style']);

        if (!empty($detail['Diamond_information'])) {
            list( $weight, $color, $clarity, $shape) = explode("#", $detail['Diamond_information']);
        } else {
            list( $weight, $color, $clarity, $shape) = explode("#", $detail['Gemstone_information']);
        }

        if (!empty($detail['Details'])) {
            list( $metal, $width, $weight, $ringSize) = explode("#", $detail['Details']);
        }

        $m = explode(":", $metal);
        $requestArray['metal'] = $m[1];
        $detail['metal'] = $m[1];

        $weight = explode(":", $weight);
        $requestArray['weight'] = $weight[1];
        $detail['weight'] = $weight[1];

        $ringSize = explode(":", $ringSize);
        $requestArray['ringsize'] = $ringSize[1];
        $detail['ringsize'] = $ringSize[1];


        if (!empty($width)) {
            $width = explode(":", $width);
            $requestArray['width'] = $width[1];
            $detail['width'] = $w[1];
        } else {
            $w = explode(":", $weight);
            $requestArray['width'] = $w[1];
            $detail['width'] = $w[1];
        }


        $col = explode(":", $color);
        $requestArray['color'] = $col[1];
        $detail['color'] = $col[1];

        $clarity = explode(":", $clarity);
        $requestArray['clarity'] = $clarity[1];
        $detail['clarity'] = $clarity[1];

        $s = explode(":", $shape);
        $requestArray['shape'] = $s[1];
        $detail['shape'] = $s[1];

        if (isset($detail['image']) && !empty($detail['image'])) {
            $ringimg = config_item('base_url') . "images/" . $detail['image'];
            $requestArray['image1'] = "images/" . $detail['image'];
        } else {
            $ringimg = config_item('base_url') . "images/povada/" . $detail['SKU'] . ".jpg";
            $requestArray['image1'] = "images/povada/" . $detail['SKU'] . ".jpg";
        }

        $watchdetails = '';
        $watchdetails = '<link href="http://diamondsforlife.info/ebaystore/tmp.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE]>
<link href="http://diamondsforlife.info/ebaystore/tmp_iefix.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<table cellpadding="0" cellspacing="0" align="center" class="pagewidth2">
  <tr>
    <td align="center"><table cellpadding="0" cellspacing="0" align="center" class="pageminwidth2">
        <tr>
          <td><!-- header start -->
            <map name="Map" id="Map">
              <area shape="rect" coords="1,1,16,12"  />
            </map>
            <table id="HeaderWarp" cellpadding="0" cellspacing="0" align="center" border="0" style="height:103px;">
              <tr>
                <td id="headerLeft" valign="top" align="left"><div id="logoWrap"><a href="http://stores.ebay.com/sugarskarats"><img alt="sugarskarats" title="Gemnile" src="http://www.sugarkarats.seowebdirect.com/iimg/logo.jpg" border="0" style="height:73px;" /></a></div></td>
                <td id="headerRight" valign="top"><div id="phone" align="right" style="color:white;"></div>
</td>
              </tr>
            </table>
            <table id="topnavg" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="topnavgl"><div id="topnavlinks"><a href="http://stores.ebay.com/sugarskarats">Diamonds</a> <a href="#">Diamonds Jewelry</a> <a href="#">Jewelry</a> <a href="#">Watches</a></div></td>
                <td id="topnavgr" align="left"><div id="searchWrap">
                    <form style="display:inline;" name="search" method="get" action="http://search.stores.ebay.com/search/search.dll?GetResult">
                      <table cellpadding="0" cellspacing="0" align="left" border="0">
                        <tr>
                          <td align="left" width="200"><input class="srField" type="text" name="query" size="25" maxlength="300" value="Enter keywords here..." onFocus="if (this.value == \'Enter keywords here...\') this.value = \'\';" />
                            <input type="hidden" name="sid" value="126131195" />
                            <input type="hidden" name="store" value="sugarskarats" />
                            <input type="hidden" name="colorid" value="-1" />
                            <input type="hidden" name="fp" value="0" />
                            <input type="hidden" name="st" value="1" />
                            <input type="hidden" name="fsoo" value="1" />
                            <input type="hidden" name="fsop" value="1" /></td>
                          <td align="right" width="33"><div id="searchbutton">
                              <input type="image" src="http://diamondsforlife.info/ebaystore/search.gif" value="Search" align="right" alt="Search" title="Search" />
                            </div></td>
                        </tr>
                      </table>
                    </form>
                  </div></td>
              </tr>
            </table>
            <!-- header end -->
            <!-- landing page start -->
            <table id="homePage" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td valign="top" align="left" id="leftcolumn"><div class="lefttitles"><img alt="Browse by Category" title="Browse by Category" src="http://diamondsforlife.info/ebaystore/title_cats.gif" /></div>
                  <div class="menu">
                    <ul>
					 <li><a class="hide" href="http://stores.ebay.com/sugarskarats/Watches1-/_i.html?_fsub=3237127018&_lns=1&_sid=1044403878&_trksid=p4634.c0.m322">Watches</a></li>

 					 <li><a class="hide" href="http://stores.ebay.com/sugarskarats/_i.html?_lns=1&_sid=3292663018">Women\'s Rings</a></li>
					  <li><a class="hide" href="http://stores.ebay.com/sugarskarats/_i.html?_lns=1&_sid=3292691018">Women\'s Chains</a></li>
					   <li><a class="hide" href="http://stores.ebay.com/sugarskarats/_i.html?_lns=1&_sid=3292603018">Women\'s Diamond pendants </a></li>
					   <li><a class="hide" href="http://stores.ebay.com/sugarskarats/_i.html?_lns=1&_sid=3292605018">Women\'s necklaces</a></li>
					   <li><a class="hide" href="http://stores.ebay.com/sugarskarats/_i.html?_lns=1&_sid=3292607018">Women\'s bracelets</a></li>
                        <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292601018">Women\'s Earrings</a></li>
					 <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292663018">Men\'s Rings</a></li>
					  <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3291875018">Men\'s Chains</a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292498018">Men\'s Diamond pendants </a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292605018">Men\'s necklaces</a></li>
					   <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292607018">Men\'s bracelets</a></li>
                        <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292601018">Men\'s Earrings</a></li>
                       <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292598018">Gemstones</a></li>
                       <li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292598018">Sterling Silver</a></li>
						<li><a class="hide" href="http://stores.ebay.com/Gemnile/_i.html?_lns=1&_sid=3292663018">Stainless Steel Pendants</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/Gemnile" style="background-image:none; margin-bottom:1px;">View All Products</a></li>
                    </ul>
                  </div>
<!--
				  <div class="lefttitles"><img alt="Certified Diamond Jewelry" title="Certified Diamond Jewelry" src="http://diamondsforlife.info/ebaystore/title_certified.gif" /></div>
                  <div id="AdvSearch" align="center">
                    <form name="custsearch" method="get" id="form2" action="http://search.stores.ebay.com/search/search.dll?GetResult">
                      <input type="hidden" name="srchdesc" value="n" />
                      <input type="hidden" name="sid" value="126131195" />
                      <input type="hidden" name="store" value="Gemnile" />
                      <input type="hidden" name="colorid" value="0" />
                      <input type="hidden" name="st" value="1" />
                      <input type="hidden" name="query" />
                      <select name="carti" class="drop_downs_text" size="1" onChange="keysr()">
                        <option value="" disabled="disabled" selected="selected">Select Certificate</option>
                        <option value="GIA">GIA Certificate</option>
                        <option value="EGL">EGL Certificate</option>
                        <option value="Diamond -(GIA, EGL)">Certified Jewelry</option>
                      </select>
                      <select name="categ" class="drop_downs_text" size="1" onClick="keysr()">
                        <option value="" disabled="disabled" selected="selected">Select Category</option>
                        <option value="Engagement Ring*">Diamond Engagement Rings</option>
                        <option value="Three-Stone Ring*">Three-Stone Engagement Rings</option>
                        <option value="Ring Accent*">Engagement Rings with Accents</option>
                        <option value="Loose Diamond*">Loose Diamonds</option>
                        <option value="Earrings">Diamond Earrings</option>
                        <option value="Pendant*">Diamond Pendants</option>
                        <option value="Bracelet*">Diamond Bracelets</option>
                      </select>
                      <select name="cut" class="drop_downs_text" size="1" onClick="keysr()">
                        <option value="" disabled="disabled" selected="selected">Select Diamond Cut</option>
                        <option value="Asscher">Asscher Cut</option>
                        <option value="Baguette">Baguette Cut</option>
                        <option value="Cushion">Cushion Cut</option>
                        <option value="Emerald">Emerald Cut</option>
                        <option value="Heart">Heart Cut</option>
                        <option value="Marquise">Marquise Cut</option>
                        <option value="Oval">Oval Cut</option>
                        <option value="Pear">Pear Cut</option>
                        <option value="Princess -(Round)">Princess Cut</option>
                        <option value="Radiant">Radiant Cut</option>
                        <option value="Round -(Princess)">Round Cut</option>
                        <option value="Triangle">Triangle Cut</option>
                      </select>
                      <div class="advsearchbutton">
                        <input type="image" src="http://gemnile.com/new_design/ebay/new/images/mywatchdepot-button.jpg" alt="Search Entire Store" title="Search Entire Store" value="Search Entire Store" name="submit" id="sbmit">
                      </div>
                    </form>
                    <script type="text/javascript">
function keysr() {
document.custsearch.query.value =  document.custsearch.carti.value + " "  + document.custsearch.categ.value + " "  + document.custsearch.cut.value;}
</script>
                  </div>
-->
                  </td>
                <td align="right" valign="top" id="middlecontent"><div class="content_Box1">
                    <div class="PrTitle" align="center"><span class="PrTitle2">' . $detail['Product_title'] . '!</span></div>
                    <div style="clear:both;"></div>
                    <div class="content_Box2">
                      <div id="MainPhoto"><img src="' . $ringimg . '" border="0" align="middle" alt="" name="rollimg" style="width:400px;" /></div>
                        <div id="ThumbsProd" align="left">';

        if (file_exists($ringimg)) {
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $ringimg . "'\"  href='#' ;=''>";
            $watchdetails .= '<img src="' . $ringimg . '" border="0" alt="" />
                        </a>';
        }

        $watchdetails.=
                '</div>
               
                    </div>
         

                    <div class="content_Box3">
                                            <table class="product_data_wrap" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="settTitle">Product Details:</td>
                        </tr>
                        <tr>
                          <td align="center">
                                  <table border="0" class="product_data" border="0" cellpadding="0" cellspacing="0">';

        if (!empty($detail['SKU'])) {
            $watchdetails .= '<tr>
                             <td class="chartleft wborder">SKU:</td>
                             <td class="chartright wborder">' . $detail['SKU'] . '</td>
                             </tr>';
        }

        if (!empty($detail['clarity'])) {
            $watchdetails .= ' <tr>
                             <td class="chartleft wborder">Clarity:</td>
                             <td class="chartright wborder">' . $detail['clarity'] . '</td>
                             </tr>';
        }
        if (!empty($detail['metal'])) {
            $watchdetails .= ' <tr>
                             <td class="chartleft wborder">Metal Type:</td>
                             <td class="chartright wborder">' . $detail['metal'] . '</td>
                             </tr>';
        }

        $watchdetails .= '<tr>
                             <td class="chartleft">Ring Options:</td>
                             <td class="chartright">Available in 14k Yellow Gold - NO COST!
				<div style="margin-top: 8px;">
					&nbsp;</div>
				Available in 18k White/Yellow Gold - $145.00 extra
				<div style="margin-top: 8px;">
					&nbsp;</div>
				Available in 950 Platinum - $395.00 extra
				<div style="margin-top: 8px;">
					&nbsp;</div>
				<span class="calltb">You may also call us to customize your ring</span></td>
                             </tr>';
        if (!empty($detail['weight'])) {
            $watchdetails .='
                              <tr>
                             <td class="chartleft">Carat Weight:</td>
                             <td class="chartright">' . $detail['weight'] . '</td>
                             </tr>';
        }

        $watchdetails .='<tr>
                             <td class="chartleft">Type:</td>
                             <td class="chartright">100% Natural Diamond; No Artificial Enhancement of Any Kind!</td>
                             </tr>';
        if (!empty($detail['shape'])) {
            $watchdetails .=' <tr>
                             <td class="chartleft">Shape:</td>
                             <td class="chartright">' . $detail['shape'] . '</td>
                             </tr>';
        }
        $watchdetails .='
                              <tr>
                             <td class="chartleft">Set Type:</td>
                             <td class="chartright">Prong</td>
                             </tr>
                             
                             <tr>
                             <td class="chartleft">Ring Size:</td>
                             <td class="chartright">This ring can be altered to any size, FREE!</td>
                             </tr>';
        if (!empty($detail['Price'])) {
            $watchdetails .='   <tr>
                             <td class="chartleft">Appraisal Value:</td>
                             <td class="chartright" style="text-decoration: line-through;">$' . number_format(round($detail['Price'] * 5), 2) . '</td>
                             </tr>';
        }

        if (!empty($detail['Retail_price'])) {
            $watchdetails .=' <tr>
                             <td class="chartleft">Our Price:</td>
                             <td class="chartright" style="color: rgb(204, 0, 0); font-weight: bold;">$' . number_format(round($detail['Retail_price']), 2) . '</td>
                             </tr>';
        }

        if (!empty($detail['Wholesale_price'])) {
            $watchdetails .= '<tr>
                             <td class="chartleft">Wholesale Price:</td>
                             <td class="chartright" style="color: rgb(204, 0, 0); font-weight: bold;">$' . number_format(round($detail['Wholesale_price']), 2) . '</td>
                             </tr>';
        }

        if (!empty($detail['Main_material'])) {
            $watchdetails .= '<tr>
                             <td class="chartleft">Material:</td>
                             <td class="chartright" >' . $detail['Main_material'] . '</td>
                             </tr>';
        }
        if (!empty($detail['Color'])) {
            $watchdetails .=
                    '<tr>
                             <td class="chartleft">Color:</td>
                             <td class="chartright" >' . $detail['Color'] . '</td>
                             </tr>';
        }
        $watchdetails .= '
                               <tr>
                             <td class="chartleft">Description:</td>
                             <td class="chartright">This diamond engagement ring is beautiful & elegant. It is 100% natural, perfectly set in 14k White Gold!</td>
                             </tr>                          
                             
                              
                        <tr>
                          <td colspan="2"><img alt="" src="http://diamondsforlife.info/ebaystore/settings_bottom1.gif"></td>
                        </tr>
                            </table>
                          </td>
        </tr></table>            
                    
                    </div>
                    <div style="clear:both;"></div>
                  </div>
                  <!-- policies //start -->
                  <div class="content_Box4">
                    <div class="tabbed_area">
                      <ul class="tabs">
                        <li><a href="javascript:tabSwitch(\'tab_1\', \'content_1\');" id="tab_1" class="active">Appraisal</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_2\', \'content_2\');" id="tab_2">Payment &amp; Shipping</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_3\', \'content_3\');" id="tab_3">Returns</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_4\', \'content_4\');" id="tab_4">Clarity &amp; Color</a></li>
						<li><a href="javascript:tabSwitch(\'tab_5\', \'content_5\');" id="tab_5">Why Gemnile ?</a></li>
                      </ul>

      <div id="content_1" class="content">Certificate of Authenticity (IGS)
We at Diamonds Gemnile have taken the fear factor out of Buying Diamonds online.
To guarantee the reliable quality of this item and give you the ultimate peace of mind and confidence.
Each item purchased will arrive along with IGS certificate which is Independent Gemological Lab located in the Diamonds Market District in Israel.
Every Certificate of Authenticity will contain a detailed grading report, FREE OF CHARGE!
Every certificate includes detailed information about the 4 important characteristics of a diamond (the 4 C\'s): color, cut, clarity and carat weight; a picture of the item (for items sold 4500$ and above) and appraisal value.
By combining the certificate and our full refund policy, this assures buyers are getting the quality that they are paying for.
</div>

<div id="content_2" class="content">
<p><b>Payment &amp; Shipping</b></p>
<p>We accepted Pay pal / Master Cart / Visa / American Express / Discover</p> 
<p><b>Customs</b></p>
<p>We accepted Pay pal / Master Cart / Visa / American Express / Discover</p>

</div>

<div id="content_3" class="content">Return Policy

IF I\'M NOT SATISFIED CAN I GET MY MONEY BACK?
Even if you are very satisfied you can send the item for FULL REFUND.
We will never ask you why you want to return the item, If you want your money back you get it!! simple as that.
Not satisfied? Satisfied but you actually need the money for more important things? Not a problem! You\'ll get your money back same day as the item received and inspected by us.
We pride ourselves in carrying high quality items and we hope that you will be pleased with your order. We want you to be 100% happy with the products you receive! If you are not satisfied with your purchase call us at 1-800.874.3541 anytime. Our customer support team work 24/7.
We offer a 14 days return policy from the day you receive the item with NO restocking fee. 100% Satisfaction Guaranteed. You will get full refund.
Call us and we will issue a Return Authorization Number (RAN). This number must be marked clearly on the front of the package.
</div>

<div id="content_4" class="content"><p><strong>Clarity &amp; Color</strong><br><br>
Diamond clarity is the gauge of how clear and flawless a gem is. Very few stones are perfectly flawless and most contain at least minor mineral inclusions or tiny cracks. The more visible those flaws are, the less valuable the stone is considered.<br><br>
<b>VVS1/VVS2</b><br>
Rare. Minute inclusions only seen under 10x magnification<br><br>
<b>VS1/VS2</b><br>
Very Slightly included (two grades). Minute inclusions very hard to detect with the naked eye.<br><br>
<b>SI1-SI2</b><br>

Slightly included (three grades). Small inclusions only sometimes visible to the naked eye. Fantastic diamonds.<br><br>
<b>I1-I2</b><br>
Inclusions visible to the naked eye yet lots of life and sparkle. Great value and still stunning.<br><br>
<b>I3</b><br>
More heavily included and easily visible with the eye often milky stone with little sparkle. <br></p>
</div>


<div id="content_5" class="content">
<p><strong>Why buy from us?</strong><br>
</p><ul>
<li>Our customers are our most important asset and we will do our best to exceed the full satisfaction of every one of you.</li>
<li>We have a no-risk 14 day money back guarantee - always satisfy or your money back. We are paypal verified.</li>
<li>We are manufacture of diamonds, We buy rough natural diamonds and make them into polished diamonds.. That\'s right and you buy directly from the source!!</li>
<li>We offer great deals best styles, quality. and highest value on all of our merchandise.</li>
<li>You get the opportunity of buying jewelry at wholesale prices.</li>
<li>Offering wide range of Fine Jewelry and Certified Diamonds.</li>

<li>All of our items are brand new.</li>
<li>All of our Gemstones &amp; Diamonds are 100% genuine and natural.</li>
<li>All our items are 100% accurately graded by a GIA diamond graduate.</li>
<li>24/7 Email and Phone support !! CALL US TOLL FREE 1-800.874.35411.</li>
</ul>
<br><br><p></p></div>
 </div>



</div>
                    <script type="text/javascript">
function tabSwitch(new_tab, new_content) {

	document.getElementById(\'content_1\').style.display = \'none\';
	document.getElementById(\'content_2\').style.display = \'none\';
	document.getElementById(\'content_3\').style.display = \'none\';
	document.getElementById(\'content_4\').style.display = \'none\';
	document.getElementById(\'content_5\').style.display = \'none\';
	document.getElementById(new_content).style.display = \'block\';

	document.getElementById(\'tab_1\').className = \'\';
	document.getElementById(\'tab_2\').className = \'\';
	document.getElementById(\'tab_3\').className = \'\';
	document.getElementById(\'tab_4\').className = \'\';
document.getElementById(\'tab_5\').className = \'\';

	document.getElementById(new_tab).className = \'active\';

}
</script>
                  </div>
                  <!-- policies //end -->
                </td>
              </tr>
            </table>
            <!-- landing page end -->
            <!-- footer start -->
            <div id="leftsealbox">
              <div class="leftsealboxwrap"><a href="http://stores.ebay.com/sugarskarats/Our-Store-Policy.html"><img alt="100% Satisfaction Guaranteed or your Money Back" title="100% Satisfaction Guaranteed or your Money Back" src="http://diamondsforlife.info/ebaystore/seal_moneyback.png" border="0" /></a></div>
              <div style="clear:both;"></div>
            </div>
            <table id="FooterWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="footerleft" valign="top" align="left"><div id="footertitle"><img alt="Can\'t find what you are looking for?" title="Can\'t find what you are looking for?" src="http://diamondsforlife.info/ebaystore/title_cantfind.gif" /></div>
                  <div id="footerinfo" align="left"><img align="left" alt="" src="http://diamondsforlife.info/ebaystore/cust_serv.png" />Gemnile, Inc. deals with all kinds of jewelry and diamonds.<br />
                    We are available 24/7.You can either e-mail us or
                    call us toll-free <span>1-800.874.3541</span> with the exact specifications of the diamond you are
                    looking for. We will gladly contact you with a price within the same working day. </div></td>
                <td id="footerright" valign="top"><img alt="100% Positive Feedback" title="100% Positive Feedback" src="http://diamondsforlife.info/ebaystore/seal_blue.png" /><img alt="Copyright Exclusive Design" title="Copyright Exclusive Design" src="http://diamondsforlife.info/ebaystore/seal_red.png" /><img alt="Free Overnight Shipping" title="Free Overnight Shipping" src="http://diamondsforlife.info/ebaystore/seal_yellow.png" /> </td>
              </tr>
              <tr>
                <td colspan="2" id="footerbottom" align="left" valign="top"><img alt="GIA - Gemological Institute of America" title="GIA - Gemological Institute of America" src="http://diamondsforlife.info/ebaystore/seal_gia.png" /><img alt="EGL - European Gemological Laboratory" title="EGL - European Gemological Laboratory" src="http://diamondsforlife.info/ebaystore/seal_egl.png" /><img class="bldia" alt="Stop Blood Diamonds" title="Stop Blood Diamonds" src="http://diamondsforlife.info/ebaystore/seal_blooddiamonds.png" /><img alt="Paypal Verified" title="Paypal Verified" src="http://diamondsforlife.info/ebaystore/seal_paypalverified.png" /></td>
              </tr>
            </table>
            <!-- footer end -->
            <div align="center" id="credit">� 2000-2012 Sugars Karats, Inc.. All rights Reserved.</div></td>
        </tr>
      </table></td>
  </tr>
</table>';
        if (get_magic_quotes_gpc()) {
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }

        $requestArray['ItemSpecification'] = $this->getItemSpecification($detail);
        $requestArray['AttributeArray'] = $this->get_attribute($detail);


        $requestArray['startPrice'] = round($detail['Price']);
        $requestArray['buyItNowPrice'] = 0.0;
        $requestArray['quantity'] = 1;
        $requestArray['storeCategoryID'] = $storeCategoryId;


        $requestArray['listingDuration'] = 'GTC';
        $requestArray['dispatchTime'] = '3';
        $requestArray['packageDepth'] = 4;
        $requestArray['packageLength'] = 16;
        $requestArray['packageWidth'] = 12;
        $requestArray['weightMajor'] = 3;
        $requestArray['weightMinor'] = 4;
        $requestArray['replace_gurantee'] = 'Days_14';
        if (!empty($detail['ebay_id'])) {
            $requestArray['itemID'] = $detail['ebay_id'];
            $itemID = $this->updateRequestEbay($requestArray, 'ring');
        } else {
            $itemID = $this->sendRequestEbay($requestArray, $section);
        }
    }

    function get_attribute($detail) {
        $requestXmlBody .= '<AttributeSetArray> 
							  <AttributeSet attributeSetID="2426"> 
								<Attribute attributeID="10244"> 
								  <Value> 
									<ValueID>10425</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="26177"> 
								  <Value> 
									<ValueID>93464</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="26176"> 
								  <Value> 
									<ValueID>26247</ValueID> 
								  </Value> 
								</Attribute>

								<Attribute attributeID="47013"> 
								  <Value> 
									<ValueID>46802</ValueID> 
								  </Value> 
								</Attribute>

								 
								<Attribute attributeID="26350"> 
								  <Value> 
									<ValueID>-3</ValueID> 
								  </Value> 
								</Attribute>
 
							  </AttributeSet> 
							</AttributeSetArray>';

        return $requestXmlBody;
    }

    function getItemSpecification($detail) {


        $specification = '<ItemSpecifics> 
                                          <NameValueList> 
						<Name>Stone Shape</Name> 
						<Value>' . $detail['shape'] . '</Value> 
					  </NameValueList>
                                          <NameValueList>
					  <Name>Main Stone Treatment</Name> 
					  <Value>Not Enhanced</Value> 
                                        </NameValueList>
                                         <NameValueList> 
						<Name>Carat Total Weight</Name> 
						<Value>' . $detail['weight'] . '</Value> 
					  </NameValueList>
                                        
                                          
                                          <NameValueList> 
						<Name>Clarity</Name> 
						<Value>' . $detail['clarity'] . '</Value> 
					  </NameValueList> 
                                            <NameValueList> 
						<Name>Color</Name> 
						<Value>' . $detail['color'] . '</Value> 
					  </NameValueList>
                                         <NameValueList> 
						<Name>Metal</Name> 
						<Value>White Gold</Value> 
					  </NameValueList> 
                                          <NameValueList> 
						<Name>Metal Purity</Name> 
						<Value>14k</Value> 
					  </NameValueList>
					  <NameValueList> 
						<Name>Ring Size</Name> 
						<Value>Size Selectable</Value> 
					  </NameValueList> 
                                          <NameValueList> 
						<Name>Main Stone</Name> 
						<Value>100% Natural Diamond</Value> 
					  </NameValueList>
					</ItemSpecifics>';
        $specification .= '<ConditionID>1000</ConditionID>';
        return $specification;
    }

    function getStullerItemSpecification($detail) {


        $specification = '<ItemSpecifics>  
                                         <NameValueList> 
						<Name>Metal</Name> 
						<Value>White Gold</Value> 
					  </NameValueList> 
                                          <NameValueList> 
						<Name>Metal Purity</Name> 
						<Value>14k</Value> 
					  </NameValueList>
					  <NameValueList> 
						<Name>Ring Size</Name> 
						<Value>Size Selectable</Value> 
					  </NameValueList> 
                                          <NameValueList> 
						<Name>Main Stone</Name> 
						<Value>100% Natural Diamond</Value> 
					  </NameValueList>
					</ItemSpecifics>';
        $specification .= '<ConditionID>1000</ConditionID>';
        return $specification;
    }

    function getcanadaorders($page = 1, $rp = 10, $sortname = 'title', $sortorder = 'desc', $query = '', $qtype = 'title', $oid = '') {

        $results = array();

        $sort = '';



        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        //	if($oid != '') $qwhere .= " AND id = $oid";
        //$sql = 'SELECT  * FROM  '. $this->config->item('table_perfix').'order where 1=1 '. $qwhere . ' ' . $sort . ' '. $limit;
        $sql = 'SELECT  * FROM canda_orders  where 1=1 ' . $qwhere . '' . " order by `purchase-date` DESC " . ' ' . $limit;

        $query1 = mysql_query("select count(*) as total from canda_orders");
        $total = mysql_fetch_assoc($query1);
        //$this->db->query($query1);
        //var_dump($sql);
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $results['count'] = $total['total'];
        // $results['count'] = 2000;
        return $results;
    }

    /* @ Category fetchign from eBay
     * 
     * 
     */

    function getebaycategories() {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        $siteID = 0;
        $verb = 'GetStore';

        //Build the request Xml string
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        $requestXmlBody .= '<GetStoreRequest  xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= "<DetailLevel>ReturnAll</DetailLevel>"; //get the entire tree
        $requestXmlBody .= "<ErrorLanguage>en_US</ErrorLanguage>";
        $requestXmlBody .= "<WarningLevel>High</WarningLevel>";
        $requestXmlBody .= "<LevelLimit>3</LevelLimit>";
        $requestXmlBody .= '</GetStoreRequest>';

        //echo $requestXmlBody;
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        $responseObj = @simplexml_load_string($responseXml) or die(htmlspecialchars($responseXml));
        $categoryArray = $responseObj->Store->CustomCategories->CustomCategory;

        for ($i = 0; $i < sizeof($categoryArray); $i++) {
            $catID = $categoryArray[$i]->CategoryID;
            $catName = $categoryArray[$i]->Name;
            $this->savedthecategory($catID, $catName, 0);
            echo "|--" . $catID . "--------" . $catName . "--------------" . "0<br>";
            if (isset($categoryArray[$i]->ChildCategory) && sizeof($categoryArray[$i]->ChildCategory) > 0) {
                $this->Getebaychildcat($categoryArray[$i]->ChildCategory, "main", $catID);
            }
        }
    }

    function Getebaychildcat($categoryArray, $f, $parentcat) {
        for ($i = 0; $i < sizeof($categoryArray); $i++) {
            $catID = $categoryArray[$i]->CategoryID;
            $catName = $categoryArray[$i]->Name;

            if ($f == "again") {
                $this->savedthecategory($catID, $catName, $parentcat);
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--" . $catID . "--------" . $catName . "----------" . $parentcat . "<br>";
            } else {
                echo "&nbsp;&nbsp;|--" . $catID . "--------" . $catName . "----------" . $parentcat . "<br>";
                $this->savedthecategory($catID, $catName, $parentcat);
            }
            if (isset($categoryArray[$i]->ChildCategory) && sizeof($categoryArray[$i]->ChildCategory) > 0) {
                $this->Getebaychildcat($categoryArray[$i]->ChildCategory, "again", $catID);
            }
        }
    }

    function savedthecategory($categoryid, $categoryname, $parent_category) {
        $this->db->insert($this->config->item('table_perfix') . 'ebaycategories', array(
            "category_id" => "$categoryid",
            "category_name" => "$categoryname",
            "parent_id" => $parent_category,
        ));
    }

    function getCategoryByID($id) {
        $sql = "select * from " . $this->config->item('table_perfix') . "ebaycategories where parent_id = '" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function savequalitygold($itemNumber, $image, $description, $weight, $book, $page, $category, $status, $size, $metal, $cost_40, $cost_45, $cost_50, $current_status, $rank, $folder, $cost_30, $cost_35, $length, $width, $totalweight, $gemstonewt, $catalog, $cost_15, $cost_20) {
        $this->db->insert($this->config->item('table_perfix') . 'qg', array(
            "itemid" => "$itemNumber",
            "description" => "$description",
            "weight" => $weight,
            "book" => $book,
            "page" => $page,
            "category" => $category,
            "status" => $status,
            "size" => $size,
            "metal" => $metal,
            "cost_30" => $cost_30,
            "cost_35" => $cost_35,
            "cost_15" => $cost_15,
            "cost_20" => $cost_20,
            "cost_40" => $cost_40,
            "cost_45" => $cost_45,
            "cost_50" => $cost_50,
            "catalog_price" => $catalog,
            "current_status" => $current_status,
            "rank" => $rank,
            "image_name" => $image,
            "width" => $width,
            "length" => $length,
            "total_weight" => $totalweight,
            "gemstone_weight" => $gemstonewt,
            "folder" => $folder,
        ));
    }

    function getqualitygold($page = 1, $rp = 8, $sortname = 'itemid', $sortorder = 'desc', $query = '', $qtype = 'itemid', $oid = '') {
        $results = array();
		$qwhere = '';

        $sort = "ORDER BY $sortname $sortorder";

        //$start = (($page - 1) * $rp);
        //$start = (int)($page /8);
        //$start = $start
        $start = $page;
        $limit = "LIMIT $start, $rp";

          if ($query){
           $results['count'] = 1;
		  mysql_query("RESET QUERY CACHE");
			$result = mysql_query("SELECT * FROM `dev_qg` WHERE `qg_id`='".$query."'");
			if(mysql_num_rows($result)){
				$results['result'][]=mysql_fetch_array($result);
			}
		  return $results;
		  }
          if ($oid != '')
          $qwhere .= " AND qg_id = $oid";
         

        $oid = str_replace("*", "/", $oid);

        if (!empty($oid)) {
            $qwhere .= "  AND folder LIKE '" . $oid . "%'";
        }
        $sql = 'SELECT  * FROM  dev_qg where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;

        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT  qg_id FROM  dev_qg  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }


    function getuniquesettings($page = 1, $rp = 8, $sortname = 'itemid', $sortorder = 'desc', $query = '', $qtype = 'itemid', $oid = '') {
        $results = array();
		$qwhere = '';

        $sort = "ORDER BY $sortname $sortorder";

        //$start = (($page - 1) * $rp);
        //$start = (int)($page /8);
        //$start = $start
        $start = $page;
        $limit = "LIMIT $start, $rp";

        /*      $qwhere = "";
          if ($query)
          $qwhere .= " AND $qtype LIKE '%$query%' ";
          if ($oid != '')
          $qwhere .= " AND qg_id = $oid";
         */

       // $oid = str_replace("*", "/", $oid);

       // if (!empty($oid)) {
           // $qwhere .= "  AND folder LIKE '" . $oid . "%'";
       // }
	   
	   if($query){
		           $results['count'] = 1;
		  mysql_query("RESET QUERY CACHE");
			$result = mysql_query("SELECT * FROM `dev_us` WHERE `id`='".$query."'");
			if(mysql_num_rows($result)){
				$results['result'][]=mysql_fetch_array($result);
			}
		  return $results;

	   }
        $sql = 'SELECT  * FROM  dev_us where 1=1 ' . $qwhere . ' ' . $sort . ' ' . $limit;

        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = 'SELECT  id FROM  dev_us  where 1=1 ' . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }
    
    function getqualitygoldByID($id) {
        $qry = "SELECT * FROM `dev_qg`
                                WHERE qg_id = '" . $id . "'
                                ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return isset($result[0]) ? $result[0] : false;
    }

    function qualitygold($post, $action = 'view', $id = 0, $imageSmall = '', $imageBig = '') {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';

        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $itemDetail = $this->getAllByWatchID($value);
                    //$itemDetail = $this->getAllByProductID(67706);
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "qg  WHERE qg_id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {

            if (is_array($post)) {
                $itemid = isset($post['itemid']) ? $post['itemid'] : '';
                $description = isset($post['description']) ? $post['description'] : '';
                $weight = isset($post['weight']) ? $post['weight'] : '';
                $book = isset($post['book']) ? $post['book'] : 0;
                $page = isset($post['page']) ? $post['page'] : 0;
                $category = isset($post['category']) ? $post['category'] : 0;
                $status = isset($post['status']) ? $post['status'] : '';
                $size = isset($post['size']) ? $post['size'] : 1;
                $metal = isset($post['metal']) ? $post['metal'] : '';
                $cost_40 = isset($post['cost_40']) ? $post['cost_40'] : '';
                $cost_45 = isset($post['cost_45']) ? $post['cost_45'] : '';
                $cost_50 = isset($post['cost_50']) ? $post['cost_50'] : '';
                $current_status = isset($post['current_status']) ? $post['current_status'] : '';
                $rank = isset($post['rank']) ? $post['rank'] : '';

                if ($action == 'add') {
                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'qg', array(
                        'itemid' => $itemid,
                        'description' => $description,
                        'weight' => $weight,
                        'book' => $book,
                        'page' => $page,
                        'category' => $category,
                        'status' => $status,
                        'size' => $size,
                        'metal' => $metal,
                        'cost_40' => $cost_40,
                        'cost_45' => $cost_45,
                        'cost_50' => $cost_50,
                        'current_status' => $current_status,
                        'rank' => $rank,
                            ));
                    $rid = $this->db->insert_id();
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('id', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'qg', array(
                        'itemid' => $itemid,
                        'description' => $description,
                        'weight' => $weight,
                        'book' => $book,
                        'page' => $page,
                        'category' => $category,
                        'status' => $status,
                        'size' => $size,
                        'metal' => $metal,
                        'cost_40' => $cost_40,
                        'cost_45' => $cost_45,
                        'cost_50' => $cost_50,
                        'current_status' => $current_status,
                        'rank' => $rank,
                            ));
                }

                /*
                  if ($_FILES['image']['name'] != '')
                  {
                  $this->uploadfile($_FILES, 'image', 'povada', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/povada', $rid, 'diamond_items', 'id', $rid, 'image');
                  }
                  $details = $this->getpovadaByID($rid);
                  $this->addDiamondtoEbay($details,'povada');
                 * 
                 */
            }
        }
    }

    function getqualityFolders() {
        $sql = "SELECT DISTINCT (`folder`) as folder  FROM `dev_qg` ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getRapnetStonesById($id) {
        $sql = "SELECT * FROM " . $this->config->item('table_perfix') . "index  WHERE lot = '" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function rapnetstones($post, $action = 'view', $id = 0) {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $itemDetail = $this->getRapnetStonesById($value);
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "index WHERE lot = $value";
                    $result = $this->db->query($sql);

                    if ($itemDetail[0]['ebayid'] != '-1' && $itemDetail[0]['ebayid'] != '-2') {

                        $status = $this->endFixedPriceBid($itemDetail[0]['ebayid']);
                    }
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            if (is_array($post)) {
                $action = '';
                if ($action == 'add') {
                    $sql = "update " . $this->config->item('table_perfix') . "index  set  category = '" . $_POST['category'] . "' WHERE lot = $id";
                    $result = $this->db->query($sql);

                    $details = $this->getRapnetStonesById($id);
                    //  $GetResponse =  $this->addDiamondtoEbay($details[0],30,'','-1');
                    $retuen["success"] = "Item Successfully Added on eBay";
                } else {
                    /*
                      $sql = "update " . $this->config->item('table_perfix') . "index  set  category = '" . $_POST['category'] . "' WHERE lot = $id";
                      $result = $this->db->query($sql);
                      if ($_FILES['image1']['name'] != '') {
                      $query = $this->db->query("select id  from  dev_rapnet  where type= 'image1' and  lot = '" . $id . "'");
                      $rows = $query->result_array();
                      if ($rows[0]['id']) {
                      $isinsert = $rows[0]['id'];
                      } else {
                      $isinsert = $this->db->insert('dev_rapnet', array(
                      'type' => 'image1',
                      'name' => $_FILES['image1']['name'],
                      'lot' => trim($id),
                      ));
                      }

                      $this->uploadfile($_FILES, 'image1', 'images/rapnet', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/rapnet', $isinsert . "DD", 'rapnet', 'id', $isinsert, 'name');
                      }

                      if ($_FILES['image2']['name'] != '') {
                      $query = $this->db->query("select id  from  dev_rapnet  where type= 'image2' and  lot = '" . $id . "'");
                      $rows = $query->result_array();
                      if ($rows[0]['id']) {
                      $isinsert = $rows[0]['id'];
                      } else {
                      $isinsert = $this->db->insert('dev_rapnet', array(
                      'type' => 'image2',
                      'name' => $_FILES['image2']['name'],
                      'lot' => trim($id),
                      ));
                      }

                      $this->uploadfile($_FILES, 'image2', 'images/rapnet', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/rapnet', $isinsert . "B", 'rapnet', 'id', $isinsert, 'name');
                      }
                      if ($_FILES['image3']['name'] != '') {
                      $query = $this->db->query("select id  from  dev_rapnet  where type= 'image3' and  lot = '" . $id . "'");
                      $rows = $query->result_array();
                      if ($rows[0]['id']) {
                      $isinsert = $rows[0]['id'];
                      } else {
                      $isinsert = $this->db->insert('dev_rapnet', array(
                      'type' => 'image3',
                      'name' => $_FILES['image3']['name'],
                      'lot' => trim($id),
                      ));
                      }

                      $this->uploadfile($_FILES, 'image3', 'images/rapnet', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/rapnet', $isinsert . "A", 'rapnet', 'id', $isinsert, 'name');
                      }
                      if ($_FILES['image4']['name'] != '') {
                      $query = $this->db->query("select id  from  dev_rapnet  where type= 'image4' and  lot = '" . $id . "'");
                      $rows = $query->result_array();
                      if ($rows[0]['id']) {
                      $isinsert = $rows[0]['id'];
                      } else {
                      $isinsert = $this->db->insert('dev_rapnet', array(
                      'type' => 'image4',
                      'name' => $_FILES['image4']['name'],
                      'lot' => trim($id),
                      ));
                      }

                      $this->uploadfile($_FILES, 'image4', 'images/rapnet', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/rapnet', $isinsert . "C", 'rapnet', 'id', $isinsert, 'name');
                      } */
                    $details = $this->getRapnetStonesById($id);
                    $GetResponse = $this->addRapnetStoneToeBay($details[0], 30, '', '-1');
                    if (isset($GetResponse) && !empty($GetResponse)) {
                        $retuen["success"] = "Item Successfully Update on eBay";
                    } else {
                        $retuen["success"] = $GetResponse;
                    }
                }
            }
        }
        return $retuen;
    }

    function getRapnetStones($id_array, $page = 1, $rp = 10, $sortname = 'price', $sortorder = 'ASC', $query = '', $qtype = 'lot', $oid = '', $custom_filter = '') {
        $results = array();
        $custom_filter_string = "";
        //var_dump($custom_filter);
        //exit;
        if ($custom_filter) {
            //echo '<pre>';
            //var_dump($custom_filter);
            foreach ($custom_filter as $key => $value) {
                if ($value == "") {
                } else {
                    //echo $key."=>".$value;
                    if ($key == 'color') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND color IN (" . $v . ") ";
                    }
                    if ($key == 'shape') {
                        //echo "-" . $value . "- ";
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND shape IN (" . $v . ") ";
                    }
                    if ($key == 'cut') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND cut IN (" . $v . ") ";
                    }
                    if ($key == 'clarity') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND clarity IN(" . $v . ") ";
                    }
                    if ($key == 'caratmin' && $value != "") {
                        $custom_filter_string.=" AND carat > '" . $value . "' ";
                    }
                    if ($key == 'caratmax' && $value != "") {
                        $custom_filter_string.=" AND carat < '" . $value . "' ";
                    }
                }
            }
        }
        
        //echo "".$custom_filter_string;
        //$sort = "ORDER BY $sortname $sortorder";
        $start = (($page - 1) * $rp);
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query) {
            if($qtype == 'dmtype') {
                $query = ucwords($query);
                $white_str   = strchr("White Diamonds", $query);
                $clarity_str = strchr("Clarity Diamonds", $query);
                $color_str   = strchr("Colored Diamonds", $query);
                
                if( !empty($white_str) ) {
                   $qwhere .= " AND fancy_color = '' AND member_coment != 'CLARITY ENHANCED'"; 
                } 
                else if( !empty($clarity_str) ) 
                {
                   $qwhere .= " AND member_coment = 'CLARITY ENHANCED'";
                } 
                else if( !empty($color_str) ) 
                {
                   $qwhere .= " AND fancy_color != ''"; 
                }
                
            } else {
                $qwhere .= " AND $qtype LIKE '%$query%' ";                
            }
        }
        if ($oid != '')
            $qwhere .= " AND id = $oid";
        $sort = " ORDER BY ourprice ASC";
        if ($id_array != "")
            $qwhere .= " AND owner in  ($id_array)";
        //   $sql = "SELECT  *  , (price * carat) as re  FROM  " . $this->config->item('table_perfix') . "rings where  Cert IN ('GIA','EGL U','EGL I') " . $qwhere . " " . $sort . " " . $limit;
        //$qwhere .= " AND price > 100";
       $sql = "SELECT *, (price*carat*6) ourprice FROM  " . $this->config->item('table_perfix') . "index where 1 = 1 " . $qwhere . " " . $custom_filter_string . " " . $sort . " " . $limit;
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        
        /*$sql2 = "SELECT lot FROM  " . $this->config->item('table_perfix') . "index where Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P','NONE','EGL ISRAEL','HRD','EGL NY','EGL USA')  " . $qwhere . " " . $custom_filter_string . " ";*/
        $sql2 = "SELECT lot  FROM  " . $this->config->item('table_perfix') . "index where 1 = 1 " . $qwhere . " " . $custom_filter_string;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }

    function cert($post, $action = 'view', $id = 0) {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {

                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "cert WHERE cert_id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {


            if (is_array($post)) {
                $cert_id = isset($post['cert_id']) ? $post['cert_id'] : '';
                $cert_name = isset($post['cert_name']) ? $post['cert_name'] : '';
                $cert_img = isset($post['cert_img']) ? $post['cert_img'] : '';
                if ($action == 'add') {

                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'cert', array(
                        'cert_name' => $cert_name,
                        'cert_adddate' => date("Y-m-d H:i:s"),
                            ));
                    $rid = $this->db->insert_id();
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('cert_id', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'cert', array(
                        'cert_name' => $cert_name,
                        'cert_adddate' => date("Y-m-d H:i:s"),
                            ));
                }

                if ($_FILES['cert_img']['name'] != '')
                    $this->uploadfile($_FILES, 'cert_img', SITE_URL().'images/cert', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/cert', $rid, 'cert', 'cert_id', $rid, 'cert_img');
                    
                    


                if ($isinsert)
                    $retuen['success'] .= '<h1 class="success">Certificated details added</h1></small>';
            }
        }

        return $retuen;
    }

    function getcerts($page = 1, $rp = 10, $sortname = 'cert_id', $sortorder = 'desc', $query = '', $qtype = 'cert_id', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND cert_id = $oid";


        $sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "cert where 1=1 " . $qwhere . " " . $sort . " " . $limit;
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = "SELECT cert_id FROM  " . $this->config->item('table_perfix') . "cert where 1=1 " . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }

    function owners($post, $action = 'view', $id = 0) {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {

                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "owners WHERE owner_id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {


            if (is_array($post)) {
                $company_id = isset($post['company_id']) ? $post['company_id'] : 0;
                $company_name = isset($post['company_name']) ? $post['company_name'] : 0;
                if ($action == 'add') {
                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'owners', array(
                        'company_id' => $company_id,
                        'company_name' => $company_name,
                        'company_adddate' => date("Y-m-d H:i:s"),
                            ));
                    $rid = $this->db->insert_id();
                    //$isinsert = $this->db->insert($this->config->item('table_perfix').'ringanimation',array('stock_num' => $rid));
                }
                if ($action == 'edit') {
                    $rid = $id;
                    $this->db->where('owner_id', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'owners', array(
                        'company_id' => $company_id,
                        'company_name' => $company_name,
                        'company_adddate' => date("Y-m-d H:i:s"),
                            ));
                }
                if ($isinsert)
                    $retuen['success'] .= 'Owners ' . $action . 'ed ';
            }
        }

        return $retuen;
    }

    function getOwnerById($id) {
        $sql = "SELECT * FROM " . $this->config->item('table_perfix') . "owners  WHERE owner_id = '" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getcertsById($id) {
        $sql = "SELECT * FROM " . $this->config->item('table_perfix') . "cert  WHERE cert_id = '" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getAllowners($start = 0) {
       // $sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "owners where 1=1 and visit=0 order  by owner_id asc limit 0 ,1";
		$sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "owners where 1=1 and visit=0 order by owner_id ASC";
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        return $results;
    }
	
	//// get owners id or company name
	function getOwnersColumn($field='company_name') {
		$detail = $this->getAllowners();
		
		foreach ($detail['result'] as $owner) {			
			$company_field[] = $owner[$field];
        }
		
		$owners_field = "('".implode("', '", $company_field)."')";
		
		return $owners_field;
	}
	
	///// get rapnet products
	function getRapnetProductsList() {
		$owners_list = $this->getOwnersColumn();
		
		$sql = "SELECT * FROM " . $this->config->item('table_perfix') . "index  WHERE owner IN  $owners_list";
        $query = $this->db->query($sql);
        $result = $query->result_array();
		
		foreach($result as $row_rapnet) {
			$rapnet_price = $row_rapnet['price'];
			$rapnet_lotno = $row_rapnet['lot'];
			
			$qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$rapnet_price'  and  priceto > '$rapnet_price' ORDER BY pricefrom ASC LIMIT 0,1";
			$result_helix = $this->db->query($qry);
			$pret = $result_helix->result_array();
			$rate = $pret[0]['rate'];
			if (!isset($rate) || empty($rate)) {
				$rate = 1;
			}
			
			$rapnetItemPrice = $rapnet_price  * $rate;
			$sql_update = "UPDATE dev_index set price = '".$rapnetItemPrice."' WHERE lot = '".$rapnet_lotno."'";
			$this->db->query($sql_update);
		}
			
		
        return 'Pirces Updated Successfully!';
	}
	
	///// delete diamonds from list whose owners does not exists in db
	function delete_remaining_owners($owners_name) {
		$sql = "DELETE FROM  " . $this->config->item('table_perfix') . "index WHERE owner NOT IN $owners_name";
        $result = $this->db->query($sql);
		return true;
	}
    function getowners($page = 1, $rp = 10, $sortname = 'owner_id', $sortorder = 'desc', $query = '', $qtype = 'owner_id', $oid = '') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND owners_id = $oid";


        $sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "owners where 1=1 " . $qwhere . " " . $sort . " " . $limit;
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = "SELECT owner_id FROM  " . $this->config->item('table_perfix') . "owners where 1=1 " . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }




function getShapesOfPicture($pic_id=null){
	
	 if($pic_id==null)return false;
	   $query= "SELECT diamondshape FROM  " . $this->config->item('table_perfix') . "loosepictures WHERE pic_id = $pic_id";
       $result = $this->db->query($query);
	   $data = $result->result_array();
	   
	   if(count($data)>0){
		   return $data[0]['diamondshape'];
		 }else{
			 return false;
		 }

	}



    function diamondshapes($post, $action = 'view', $id = 0) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
					$shapeName=$this->getShapesOfPicture($value);
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "loosepictures  WHERE pic_id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            $action = '';
            if (is_array($post)) {
                if ($action == 'add') {
                    
                } else {
                    $sql = "select pic_id from " . $this->config->item('table_perfix') . "pictures where diamondshape = '" . $post['diamondshape'] . "'";
                    $query = $this->db->query($sql);
                    $result = $query->result_array();
                    if (empty($result['pic_id']) || !isset($result['pic_id'])) {
                        $isinsertringanim = $this->db->insert($this->config->item('table_perfix') . 'pictures', array('diamondshape' => $post['diamondshape']));
                    }



                    if ($_FILES['picture1']['name'] != '') {
                        $ret = $this->uploadfile($_FILES, 'picture1', 'images/pictures', 'JPEG,jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'pictures', 'diamondshape', $post['diamondshape'], 'picture1');
                    }

                    if ($_FILES['picture2']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture2', 'images/pictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'pictures', 'diamondshape', $post['diamondshape'], 'picture2');
                    }

                    if ($_FILES['picture3']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture3', 'images/pictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'pictures', 'diamondshape', $post['diamondshape'], 'picture3');
                    }

                    if ($_FILES['picture4']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture4', 'images/pictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'pictures', 'diamondshape', $post['diamondshape'], 'picture4');
                    }
                    if ($_FILES['picture5']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture5', 'images/pictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'pictures', 'diamondshape', $post['diamondshape'], 'picture5');
                    }
                    if ($_FILES['picture6']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture6', 'images/pictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'pictures', 'diamondshape', $post['diamondshape'], 'picture6');
                    }
                }
            }
        }
        return $retuen;
    }

    function diamondshapesByID($id) {
        $sql = "select * from " . $this->config->item('table_perfix') . "pictures where pic_id = '" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getdiamondshapes($page = 1, $rp = 10, $sortname = 'pic_id', $sortorder = 'desc', $query = '', $qtype = 'pic_id') {
        $results = array();
        $sort = "ORDER BY $sortname $sortorder";
        $start = (($page - 1) * $rp);
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND pic_id = $oid";
        $sort = "order by pic_id ASC";
        $sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "pictures where   1=1  " . $qwhere . " " . $sort . " " . $limit;
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = "SELECT pic_id FROM  " . $this->config->item('table_perfix') . "pictures where 1=1 " . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }

    function getstullerCategories() {
        $qry = "SELECT distinct(level1) FROM `dev_stuller` ";
        $return = $this->db->query($qry);
        $result = $return->result_array();
        return $result;
    }

    function getPendantById($id) {
        $sql = "SELECT * FROM `dev_index` WHERE lot in (" . $id . ")";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
//// revised an items on ebay
function revisedEbayItem($item_lotid) {
    include_once 'ebaylib/eBaySession.php';
    include_once 'ebaylib/keys.php';
        
        $daimodt = $this->getPendantById($item_lotid);
        $diamondRow = $this->reapnetFieldsColsValue($daimodt[0]);
        
        $otherimg = $this->db->query("SELECT * FROM dev_rappimages WHERE diamond_id = '" . trim($daimodt[0]['lot']) . "'");
        $rsothrimg = $otherimg->result_array();
      
        $verb = 'ReviseItem';
        $dmdShape = viewDmShapes($daimodt[0]['shape']);
        
        $imgColsValue = $this->getColorImgColmn($daimodt[0]['fancy_color'], $dmdShape, $daimodt[0]['lot']);
        $certImages = $this->certsImage($daimodt[0]['Cert']);
        
        $diamondPrice = ( ( $daimodt[0]['price'] * $daimodt[0]['carat'] ) * 6 );
        $salesPrice = $this->getLooseFiltersDiscount($diamondPrice, 'eBay');
        //print_ar($daimodt[0]);
        
        $itemDescription = $this->ebayHTMLTemplate($daimodt[0], 'pendants', $salesPrice, $diamondPrice, $imgColsValue, $certImages);
        $requestXmlBody = '';
        
        $requestXmlBody .= '
                    <?xml version="1.0" encoding="utf-8"?>
                <ReviseItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                  <RequesterCredentials>
                    <eBayAuthToken>'.$userToken.'</eBayAuthToken>
                  </RequesterCredentials>
                  <ErrorLanguage>en_US</ErrorLanguage>
                  <WarningLevel>High</WarningLevel>
                  <Item>
                    <ItemID>'.$daimodt[0]['ebayid'].'</ItemID>
                    <StartPrice>'.$salesPrice.'</StartPrice>';
        $ebay_main_image = $imgColsValue;
        
        if (!empty($ebay_main_image)) { 
            $requestXmlBody .= '<PictureDetails><GalleryType>Gallery</GalleryType>
                                          <GalleryURL>' . $ebay_main_image . '</GalleryURL>';
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';
        }
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';
        }
        if (!empty($rsothrimg[0]['ebay_img1'])) {
            $requestXmlBody .= '<PictureURL>' . $rsothrimg[0]['ebay_img1'] . '</PictureURL>';
        }
        if (!empty($rsothrimg[0]['ebay_img2'])) {
            $requestXmlBody .= '<PictureURL>' . $rsothrimg[0]['ebay_img2'] . '</PictureURL>';
        }
        if (!empty($rsothrimg[0]['ebay_img3'])) {
            $requestXmlBody .= '<PictureURL>' . $rsothrimg[0]['ebay_img3'] . '</PictureURL>';
        }
        if (!empty($rsothrimg[0]['ebay_img4'])) {
            $requestXmlBody .= '<PictureURL>' . $rsothrimg[0]['ebay_img4'] . '</PictureURL>';
        }
        if (!empty($rsothrimg[0]['ebay_img5'])) {
            $requestXmlBody .= '<PictureURL>' . $rsothrimg[0]['ebay_img5'] . '</PictureURL>';
        }
        if (!empty($rsothrimg[0]['ebay_img6'])) {
            $requestXmlBody .= '<PictureURL>' . $rsothrimg[0]['ebay_img6'] . '</PictureURL>';
        }
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '</PictureDetails>';
        }
        $requestXmlBody .= "<Description><![CDATA[" . $itemDescription . "]]></Description>";
        $requestXmlBody .= $this->getItemSpecificationp($diamondRow);
        $requestXmlBody .= "<Title><![CDATA[" . wordwrap($diamondRow['title'],80," ") . "]]></Title>";
        $requestXmlBody .= '</Item>
                </ReviseItemRequest>';
        
         //$ret = $this->adminmodel->ebayConnectionCall('ReviseItem', $xmlrequest); 

        $siteID = 0;
        //the call being made:
        //file_put_contents("revise_request.txt",$requestXmlBody,FILE_APPEND);
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);

        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');
        $response = simplexml_import_dom($responseDoc);
        //file_put_contents("revise_response.txt",'Revise Ack:'.$response->Timestamp,FILE_APPEND);
        return $response->Ack;
}
//// revised an items on ebay
function discountPriceToEbayItem() {
    include_once 'ebaylib/eBaySession.php';
    include_once 'ebaylib/keys.php';
        
        //$daimodt = $this->getPendantById($item_lotid);
      
        $verb = 'SetPromotionalSale'; 
        $promotionalSaleName = 'Discount';
        //$diamondPrice = ( ( $daimodt[0]['price'] * $daimodt[0]['carat'] ) * 6 );
        $salesStartTime = date('Y-m-d').'T'.date('H:i:s').'.000Z';
        $salesEndTime   = date('Y-m-d', strtotime("+30 days")).'T00:15:00.000Z';
        
        $requestXmlBody = '';
        
        $requestXmlBody .= '<?xml version="1.0" encoding="utf-8"?>
                    <SetPromotionalSaleRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                      <RequesterCredentials>
                        <eBayAuthToken>'.$userToken.'</eBayAuthToken>
                      </RequesterCredentials>
                      <WarningLevel>High</WarningLevel>
                      <Action>Add</Action>
                      <PromotionalSaleDetails>
                        <PromotionalSaleName>'.$promotionalSaleName.'</PromotionalSaleName>
                        <DiscountType>Price</DiscountType>
                        <DiscountValue>25</DiscountValue>
                        <PromotionalSaleType>PriceDiscountOnly</PromotionalSaleType>
                         <PromotionalSaleStartTime>2016-03-05T19:15:04.440Z</PromotionalSaleStartTime>
                         <PromotionalSaleEndTime>2015-05-10T00:15:00.000Z</PromotionalSaleEndTime>
                      </PromotionalSaleDetails>
                    </SetPromotionalSaleRequest>';

        $siteID = 0;
        //the call being made:

        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');

        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);

        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');
        $response = simplexml_import_dom($responseDoc);
        
        return $response;
        //return $response->Ack;
}
/////// ebay HTML template of diamond
function ebayHTMLTemplate($detail, $type='pendants', $diamond_price=2000, $ourdmprice=0, $diamond_shpe='', $certs_imge='') 
    {   
        if(!empty($details['Meas'])){
        list($w,$b,$h) = explode("x",$details['Meas']);
        $meas = $w." x ".$b." x ".$h;
        } else {
         $meas = '';   
        }
        $detail['cert'] = ( !empty($detail['cert']) ? $detail['cert'] : $detail['Cert']);    
        $checkdm_type = $this->getDiamondType($detail['lot']);
        $details_dm = $this->getPendantById($detail['lot']);
        $clarityEnhanc = '';

       if($checkdm_type['colorresult'] > 0)
       {
               $typeDescription = "100% Natural Colored Diamond";
       }
       if($checkdm_type['clarityresult'] > 0)
       {
               $typeDescription = "100% Natural Diamond; Artificial Clarity Enhancement!";
               $clarityEnhanc = ' Clarity Enhanced ';
       }
       if($checkdm_type['whiteresult'] > 0)
       {
               $typeDescription = "100% Natural Diamond";
       }	
        
        $polish = getPolish($detail['Polish']);
        $sym = getSym($detail['Sym']);
        $detail['carat'] = number_format($detail['carat'], 2);
        $detail['girdle'] = $detail['girdle'];
        $color = getColor($detail['color']);
        
        if (isset($detail['cut']) && !empty($detail['cut'])) {
            $cut = trim($detail['cut']) . "&nbsp;Cut!";
        } else {
            $cut = '';
        }
        if (!empty($detail['certimage'])) {
            $detail['certimage'] = $detail['certimage'];
        }
//Get the images
        $pictTable = ( $type == 'pendants' ? 'loosepictures' : 'pictures' );
         $ssql = "SELECT picture1,picture2,picture3,picture4,picture5,picture6 FROM " . $this->config->item('table_perfix') . "$pictTable  WHERE diamondshape = '" . $shape . "'";
            $squery = $this->db->query($ssql);
            $pictureslist = $squery->result_array();
            $pictures = $pictureslist[0];
            $diamondpic = $pictureslist[0]["picture1"];
        
        $diamondpic = $diamond_shpe;
        $detail['certimage'] = $certs_imge;
        if ($detail['clarity'] == 'SI1' || $detail['clarity'] == 'SI2') {
            $clarityRange = $detail['clarity'] . ' (clean to the naked eye)';
        }
        if ($detail['clarity'] == 'FL' || $detail['clarity'] == 'IF') {
            if ($detail['clarity'] == 'IF') {
                $clarityRange = $detail['clarity'] . ' (internally flawless)';
            } else {
                $clarityRange = $detail['clarity'] . ' (flawless)';
            }
        }
        if ($detail['clarity'] == 'VS1' || $detail['clarity'] == 'VS2') {
            $clarityRange = $detail['clarity'] . ' (very clean under 10x magnification; clean to the naked eye)';
        }
        if ($detail['clarity'] == 'VVS1' || $detail['clarity'] == 'VVS2') {
            $clarityRange = $detail['clarity'] . ' (completely clean under 10x magnification; clean to the naked eye)';
        }
        if ($detail['clarity'] == 'I1' || $detail['clarity'] == 'I3') {
            $clarityRange = $detail['clarity'];
        }
        if ($detail['clarity'] == 'SI3') {
            $clarityRange = $detail['clarity'];
        }
        if (empty($clarityRange)) {
            $clarityRange = $detail['clarity'];
        }
        
        $caratRange = getCarat($detail['carat']);
        $price = $diamond_price;
        //$retail_price = $detail['retail_price'];
        $watchdetails = '';
        
        if( $detail['cert'] == 'GIA' ) {
            $link = 'http://www.gia.edu/cs/Satellite?reportno='.$detail['Cert_n'].'&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C';
        } else if( $detail['cert'] == 'IGI' ) {
           $link = 'http://www.igiworldwide.com/verify.php?r='.$detail['Cert_n']; 
        } else if( $detail['cert'] == 'EGL USA' || $detail['cert'] == 'EGL NY' ) {
           $link = 'http://www.eglusa.com/verify-a-report-results/?st_num='.$detail['Cert_n']; 
        } else {
            $link = '#';
        }
        $certCertified = ( ( !empty($details_dm[0]['Cert']) && $details_dm[0]['Cert'] != 'NONE' ) ? $details_dm[0]['Cert'] . ' Diamond Report!' : '' );
        $detail['stocknum'] = ( !empty($detail['stocknum']) ? $detail['stocknum'] : $detail['Stock_n'] );
	$verifyLabLink = $link;
        $shaper = viewDmShapes( $details_dm[0]['shape'] );
        $titleShape = $shaper;
        
        if ($type == 'pendants') {
            if( !empty($details_dm[0]['fancy_color']) ) 
                {
                $viewhtmlTitle = $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['clarity'] . ' '.getFancyColorName($details_dm[0]['fancy_color']).' Fancy Loose Diamond! ' . $certCertified;
                
                } else {                
                
                  $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' '.$clarityEnhanc.'Loose Diamond! ' . $certCertified;
            }
        } else {
            $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND ENGAGEMENT RING! ' . $certCertified;
        }

            $watchdetails = '<!-- Include jQuery Mobile stylesheets -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

<link rel="stylesheet" type="text/css" href="http://www.elandiamondimporters.com/css/font-awesome.min.css"/>
<link type="text/css" href="http://www.elandiamondimporters.com/css/ruman.css" rel="stylesheet" />

<link type="text/css" href="http://www.elandiamondimporters.com/css/site-style.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/site-body.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/site-page.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/site-menu.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/main.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/js-image-slider.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/tamal.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/tabs.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/whsale_styles.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="http://www.elandiamondimporters.com/css/fonts.css" />
<link type="text/css" rel="stylesheet" href="http://www.elandiamondimporters.com/css/cd_styles.css?v=1" />
<link type="text/css" rel="stylesheet" href="http://www.elandiamondimporters.com/css/styles_elan.css" />
<link rel="stylesheet" href="http://www.elandiamondimporters.com/css/meanmenu_styles.css" media="all" />

<link rel="stylesheet" type="text/css" href="http://www.elandiamondimporters.com/css/jquery-ui.css"/>
<link type="text/css" href="http://www.elandiamondimporters.com/css/wh_styles.css" rel="stylesheet" />

<link rel="stylesheet" href="http://www.elandiamondimporters.com/css/bootstrap.css"  type="text/css"/>
<link href="http://www.elandiamondimporters.com/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://www.elandiamondimporters.com/css/bootstrap-responsive.css">
<link href="http://www.elandiamondimporters.com/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="http://www.elandiamondimporters.com/css/united_style.css" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/tabs_style.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/jquery.popup.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/nanoscroller.css" rel="stylesheet" />
<link type="text/css" href="http://www.elandiamondimporters.com/css/popup_nw_style.css" rel="stylesheet" />
<style>
body
{
	background: #ffffff;
}
#example-two .list-wrap {
  margin: 19px 0 0 0 !important;
  padding: 0 0;
}
#example-two .nav li a {
  padding: 5px 5px 0 !important;
}
.list-wrap .labelHeading {
  color: #000000;
  display: table-cell !important;
}
.tabBox {
  margin-left: 25px;
  width: 29.5% !important;
}
.list-wrap .metalTp {
  float: none !important;	
  display: table-cell  !important;
  padding-left: 14px  !important;
  text-align: left  !important;
  width: 100% !important;
}
#content_2
{
	display: none;
}
#content_3
{
	display: none;
}
#content_4
{
	display: none;
}
#content_5
{
	display: none;
}
.content {
  float: left;
  font-size: 13px !important;
  margin: 0;
  padding: 0 0 10px 10px;
  text-align: justify  !important;
  width: 62%  !important;
  line-height: 26px !important;
}
.content img {
  margin: 15px 0 15px 0;
}
</style>



			  <div class="contentTb contb_bk setpadd">
      <div class="row-fluid">
        <div class="imageColumn col-sm-4"><img src="' . $diamondpic . '" border="0" align="left" alt="" name="rollimg" /></br>Sample Image Only for any questions call David Marketplace Diamonds 516-482-3101 Located in Florida.</div>
        <div class="col-sm-5">
         
            <div class="centerCol">
              <div class="whHead"><span class="dwar-icon"></span>' . $viewhtmlTitle .'</div>';
               if ($type != 'pendants') {
			  $watchdetails .=' <div class="textList dmDescription">'.$typeDescription.'</div>';
			   } else {
				   $watchdetails .=' <div class="textList dmDescription">'.$typeDescription.'</div>';
			   }
			   
              $watchdetails .= ' <div class="textList">
                <label>ID#:&nbsp;&nbsp;</label>';
               $watchdetails .= " <span><a href='$link' target='_BLANK'>" . $detail['Cert_n'] . "</a></span> </div>";
				$watchdetails .= ' <div class="textList">
                <label>Stock#</label>
                <span>' . $detail['stocknum'] . '</span> </div>';
				
			   $watchdetails .= ' <div class="textList">
                <label>Measurements:&nbsp;&nbsp;</label>
                <span>' . $detail['meas'] . '&nbsp;mm</span> </div>';

				 $watchdetails .= ' 
              <div class="textList">
                <label>Price:&nbsp;&nbsp;</label>';
                $watchdetails .='<span>$' . number_format($price, 2) . '</span> </div>';
       $watchdetails .='<div class="wirePr"><span style="text-decoration: line-through;">Retail Price: $' . number_format($ourdmprice, 2) . '</span></div>';
              $watchdetails .= '<div class="clear"></div>
            </div>
          
        </div>
        <div class="rightCol col-sm-3">

        </div>
        <div class="clear"></div>
      </div>
      
      <div class="clear"></div>';
	  $watchdetails .= ' <div class="collectionBlock row-fluid">';
	  $imgring = $diamondpic;

if (!empty($diamondpic)) {
			$watchdetails .= '<div class="imageColect col-sm-2">';
                $url = "http://diamondsforlife.com/beta/scripts/timthumb.php?src=" . $diamondpic . "&h=380&w=365&zc=1&ALLOW_EXTERNAL=true";
                $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $url . "'\"  href='#' ;=''  style=\"width:60px;\">";
                $watchdetails .= '<img src="' . $imgring . '" border="0" alt="" /></a>';
				//$watchdetails .= '<label>Lab Report</label></div>';
				$watchdetails .= '</div>';
            }
            if (!empty($detail['certimage']) && $detail['cert'] != 'NONE') {
		$watchdetails .= '<div class="imageColect col-sm-2">';
            $setCert = array('GIA','IGI','EGL USA','EGL NY');
            //$viewCertImg = $this->getCertImage( trim($detail['cert']) );
                if( in_array($detail['cert'], $setCert) ) {    
                        $watchdetails .= '<a href="'.$verifyLabLink.'" target="_blank"><img src="'.$detail['certimage'].'" border="0" alt=""  />';
                        $watchdetails .= '<label>Verify Lab Report</label></a>';
                    } else {
                        $watchdetails .= '<img src="' . $detail['certimage'] . '" border="0" alt=""  />';
                        $watchdetails .= '<label>Lab Report</label>';
                    }
            $watchdetails .= '</div>';
            }
            if ($type != 'pendants') {
            }
			
            $watchdetails .= '</div>';

      $watchdetails .= '<div class="diamondTabs">
        <div id="example-two">
          <ul class="nav">
            <li class="nav-one"><a href="javascript:tabSwitch(\'tab_1\', \'content_1\');" id="tab_1" class="active">More Details</a></li>
            <li class="nav-two"><a href="javascript:tabSwitch(\'tab_2\', \'content_2\');" id="tab_2">Diamond Grading Information</a></li>
            <li class="nav-three"><a href="javascript:tabSwitch(\'tab_3\', \'content_3\');" id="tab_3">Payment &amp; Shipping</a></li>
			<li class="nav-three"><a href="javascript:tabSwitch(\'tab_4\', \'content_4\');" id="tab_4">About Us</a></li>
            <li class="nav-four last"><a href="javascript:tabSwitch(\'tab_5\', \'content_5\');" id="tab_5">Return Policy</a></li>
          </ul>
          <div class="list-wrap">
            <div class="diamondDetailTabs row-fluid" id="content_1" class="content">
              <div class="tabBox">
                <div class="tabsRow">';
      if($detail['cert'] == 'GIA') {
          $watchdetails .= '<div class="metaLeft"><span class="labelHeading">Certificate:</span> <span class="metalTp"><a href="'.$verifyLabLink.'" target="_blank">' . $detail['cert'] . '&nbsp;Certified!!!</span> </a></div>';
      } else if($detail['cert'] == 'NONE') {
         $watchdetails .= '<div class="metaLeft"><span class="labelHeading">Certificate:</span> <span class="metalTp">None Certified</span> </div>';
      } else {
         $watchdetails .= '<div class="metaLeft"><span class="labelHeading">Certificate:</span> <span class="metalTp">' . $detail['cert'] . '&nbsp;Certified!!!</span> </div>'; 
      }
        
        $watchdetails .= '</div>
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Stock#:</span> <span class="metalTp">' . $detail['stocknum'] . '</span> </div>
                </div>
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">ID#:</span> <span class="metalTp">';
				  $watchdetails .= "<strong><a href='".$link."' target='_BLANK'>" . $detail['Cert_n'] . "</a></strong>";
				  $watchdetails .= '</span> </div>
                </div>';
    if ($type != 'pendants') {
//                $watchdetails .=' <div class="tabsRow">
//                  <div class="metaLeft"><span class="labelHeading">Metal Type:</span> <span class="metalTp"> 14k White Gold</span> </div>
//                </div>';
				$watchdetails .= ' <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Carat Weight:</span> <span class="metalTp">' . $detail['carat'] . '&nbsp;carat</span> </div>
                </div>';
				}
				if (!empty($detail['depth'])) {
                $watchdetails .=' <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Depth:</span> <span class="metalTp">' . $detail['depth'] . '%</span> </div>
                </div>';
				}
				if (!empty($detail['table'])) {
               $watchdetails .='<div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Table:</span> <span class="metalTp">' . $detail['table'] . '%</span> </div>
                </div>';
				}
                $watchdetails .='<div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Measurements:</span> <span class="metalTp">' . $detail['meas'] . '&nbsp;mm</span> </div>
                </div>
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Type:</span> <span class="metalTp">100% Natural Diamond</span> </div>
                </div>';
	if (!empty($cut)) {
                $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Cut:</span> <span class="metalTp">' . $cut . '</span> </div>
                </div>';
				}
              $watchdetails .='</div>
              <div class="tabBox tbrow2">';
	if( empty($details_dm[0]['fancy_color']) ) {
              $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Color Grade:</span> <span class="metalTp">' . $color . '</span> </div>
                </div>';
              
        } else 
            {      
              $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Fancy Color:</span> <span class="metalTp">' . getFancyColorName($details_dm[0]['fancy_color']) . '</span> </div>
                </div>';
              $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Fancy Color Intensity:</span> <span class="metalTp">' . $details_dm[0]['fancy_color_intens'] . '</span> </div>
                </div>';
              $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Member comments:</span> <span class="metalTp">' . $details_dm[0]['member_coment'] . '</span> </div>
                </div>';
        }
        
        $watchdetails .='<div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Clarity Grade:</span> <span class="metalTp">' . $clarityRange . '</span> </div>
                </div>';
	if (!empty($polish) && !empty($sym)) {
                $watchdetails .= '
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Polish/Symmetry:</span> <span class="metalTp">' . $polish . '/' . $sym . ' </span> </div>
                </div>';
				}
				if (!empty($detail['girdle'])) {
                $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Girdle:</span> <span class="metalTp">' . $detail['girdle'] . ' </span> </div>
                </div>';
				}
				if (!empty($detail['flour'])) {
                $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Fluorescence:</span> <span class="metalTp">' . $detail['flour'] . '</span> </div>
                </div>';
				}
				$watchdetails .= '
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Culet:</span> <span class="metalTp">' . (!empty($detail['culet']) ? $detail['culet'] : 'None') . ' </span> </div>
                </div>';
            $watchdetails .= '
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Shape</span> <span class="metalTp">'.$shaper.'</span> </div>
                </div>';		
                
              $watchdetails .= '</div>
              <div class="clear"></div>
            </div>
            <div id="content_2" class="content">
               Buying a diamond does not have to be an uncomfortable experience. David Marketplace Diamonds Corporation is 
designed to give you the tools and information you need to properly evaluate diamond quality and value with confidence.
Every diamond is unique, and there are a variety of factors which affect the price of a diamond. 
Focus on those factors most important to you, and choose a diamond that satisfies 
your individual standards for beauty and value. This might be a very different diamond than someone else with a similar budget would choose. 
At David Marketplace Diamonds, we want to help find the best diamond for you.
You also have access to a personal diamond consultant; who can walk you through the diamond selection process or answer any questions you have.<div style="padding-top:10px;"></div><strong>We have access to the largest suppliers in the world. If we can\'t find the diamond you want, it does not exist!</strong>
            </div>
            <div id="content_3" class="content">
              We only accept PayPal payments in US funds (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). Sorry, we DO NOT accept personal checks.
                        <div style="margin-top:8px;"></div>
                        Payment must be received within 4 days of end of auction. Florida residents must pay 8.875% sales tax.
                        <div align="left" style="margin-top:5px;"><img alt="" src="http://diamondsforlife.info/ebaystore/paypalcreditcards.gif"></div>
                        <div class="polheadings">Shipping: United States</div>
                        We ship all orders using FedEx or UPS Overnight. We process, insure and ship all orders within 2 business days of receipt of payment. For custom designs, and alterations, such as sizing, please allow up to an additional 5 business days. Longer delivery times are experienced during the holidays.
                        <div class="polheadings">Shipping: International</div>
                        We only accept international orders from the United Kingdom, Canada, Europe, Australia and Asia at this time. Shipping to these countries is $65 and such international residents can only pay with PayPal (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). IMPORT TAXES, DUTIES AND CHARGES ARE NOT INCLUDED IN THE ITEM PRICE. THESE CHARGES ARE THE BUYER\'S RESPONSIBILITY. PLEASE CHECK WITH YOUR COUNTRY\'S CUSTOMS OFFICE TO DETERMINE WHAT THESE ADDITIONAL COSTS WILL BE PRIOR TO BIDDING/BUYING. Thank you.
            </div>
            
		  <div id="content_4" class="content">David Marketplace Diamonds carries a large variety of certified stones of all shapes and sizes. 
Sure to carry exactly what you’re looking for, David Marketplace Diamonds is your most affordable online diamond source. 
                      <div style="margin-top:8px;"></div>Each of the diamonds in our large inventory has been hand selected to meet the high standards of our company. 
Our knowledgeable staff knows the extent of finding the prefect diamond for that special occasion.  
At David Marketplace Diamonds, we strive to make this daunting task as simple as possible.  
No matter the occasion or order, we hope you continue to choose David Marketplace Diamonds for all your certified diamond needs.
          </div>
		  <div id="content_5" class="content">  We offer a 100% unconditional 30 day money-back guarantee. We are so confident in the quality of our merchandise that if, for any reason, you are not satisfied with your purchase, we will reimburse you 100% of your purchase price.  We accept returns or exchanges within 30 days of the items receipt, with no restocking fee!  Any exchange, credit or refund will be for the original price paid.  Items must be in their original condition, and must not be altered in any way.  You must call us to obtain a return authorization PRIOR to shipping the item back to us. No packages will be accepted without a return authorization. This is especially important as we will also be giving you specific shipping instructions for your protection. Refunds will be processed through PayPal. All returns are guaranteed by Ebay and PayPal through the <a href="http://pages.ebay.com/paypal/buyer/protection.html" target="_blank">Buyer Protection Program</a>.
          </div>
          <!-- END List Wrap --> 
          
        </div>
		
		<script type="text/javascript">
function tabSwitch(new_tab, new_content) {
	document.getElementById(\'content_1\').style.display = \'none\';
	document.getElementById(\'content_2\').style.display = \'none\';
	document.getElementById(\'content_3\').style.display = \'none\';
	document.getElementById(\'content_4\').style.display = \'none\';
	document.getElementById(\'content_5\').style.display = \'none\';
	document.getElementById(new_content).style.display = \'block\';
	document.getElementById(\'tab_1\').className = \'\';
	document.getElementById(\'tab_2\').className = \'\';
	document.getElementById(\'tab_3\').className = \'\';
	document.getElementById(\'tab_4\').className = \'\';
	document.getElementById(\'tab_5\').className = \'\';
	document.getElementById(new_tab).className = \'active\';		
}
</script>
		
        <!--<img src="http://www.elandiamondimporters.com/images/tabs-image.jpg" alt="" />--> 
      </div>
    </div>
	</div></div><div class="clear"></div>';
            $watchdetails .= '
			<!-- landing page end -->
            <!-- footer start -->
            <div id="leftsealbox">
              <div class="leftsealboxwrap"><a href="#"><img alt="100% Satisfaction Guaranteed or your Money Back" title="100% Satisfaction Guaranteed or your Money Back" src="http://diamondsforlife.info/ebaystore/seal_moneyback.png" border="0" /></a></div>
              <div style="clear:both;"></div>
            </div>
            <table id="FooterWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="footerleft" valign="top" align="left"><div id="footertitle"><img alt="Can\'t find what you are looking for?" title="Can\'t find what you are looking for?" src="http://diamondsforlife.info/ebaystore/title_cantfind.gif" /></div>
                  <div id="footerinfo" align="left"><img align="left" alt="" src="http://diamondsforlife.info/ebaystore/cust_serv.png" />David Marketplace Diamonds- deals with all kinds of jewelry and diamonds.<br />
                    We are available 24/7.
                    Call us toll-free <span>516-482-3101</span> with the exact specifications of the diamond you are 
                    looking for. We will gladly contact you with a price within the same working day. </div></td>
                <td id="footerright" valign="top"><img alt="100% Positive Feedback" title="100% Positive Feedback" src="http://diamondsforlife.info/ebaystore/seal_blue.png" /><img alt="30 Day Money Back Guarantee" title="30 Day Money Back Guarantee" src="http://diamondsforlife.info/ebaystore/seal_green.png" /><img alt="Copyright Exclusive Design" title="Copyright Exclusive Design" src="http://diamondsforlife.info/ebaystore/seal_red.png" /><img alt="Free Overnight Shipping" title="Free Overnight Shipping" src="http://diamondsforlife.info/ebaystore/seal_yellow.png" /> </td>
              </tr>
              <tr>
                <td colspan="2" id="footerbottom" align="left" valign="top"><img alt="GIA - Gemological Institute of America" title="GIA - Gemological Institute of America" src="http://diamondsforlife.info/ebaystore/seal_gia.png" /><img alt="EGL - European Gemological Laboratory" title="EGL - European Gemological Laboratory" src="http://diamondsforlife.info/ebaystore/seal_egl.png" /><img class="bldia" alt="Stop Blood Diamonds" title="Stop Blood Diamonds" src="http://diamondsforlife.info/ebaystore/seal_blooddiamonds.png" /><img alt="Paypal Verified" title="Paypal Verified" src="http://diamondsforlife.info/ebaystore/seal_paypalverified.png" /></td>
              </tr>
            </table>
            <!-- footer end -->
            <div align="center" id="credit">All Imagery & Content &copy;2015 David Marketplace Diamonds</a></div></td>
<div class="scrollgal" align="center">';


        if (get_magic_quotes_gpc()) {
            // print "stripslashes!!! <br>\n";
            $itemDescription = stripslashes($watchdetails);
        } else {
            $itemDescription = $watchdetails;
        }
        return $itemDescription;
    }
    //// get cert image from db
function getCertImage($certval='') 
    {
        if($certval == '') { return false; }
        
        $sql = "SELECT cert_img FROM dev_cert WHERE cert_name = '".$certval."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        
        return $result[0]['cert_img'];
    }
    function pendantstones($post, $action = 'view', $id = 0) {
        $id = trim($id);
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        $retuen['viewupdate'] = '';
        $viewupdate = '';
        if ($action == 'Delete' || $action == 'Revise') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr as $index => $value) {
                if ($value != '') {
                    
                $itemDetail = $this->getPendantById($value);
                if($action == 'Revise') {
                     if ($itemDetail[0]['ebayid'] != '-2') {
                        $retrn = $this->revisedEbayItem($value);
                        //$retrn = $this->reviseEbayItemRequests($value);
                        $viewupdate .= '<div style="border:1px solid red;">Stock No('.$itemDetail[0]['lot'].')<br>Item successfully updated to Ebay.<br><a href="http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&amp;item='.$itemDetail[0]['ebayid'].'" target="_blank">click here to view this</a> <br></div>';
                     }
                } else {
                    ///// end an item on ebay
                 if ($itemDetail[0]['ebayid'] != '-2') {
                        $status = $this->endEbayItemById($itemDetail[0]['ebayid']);
                    }
                    $this->deleteDiamondImage($value); ///// unlink ebay diamond shape img
                    $sql = "DELETE FROM dev_index WHERE lot = $value";
                    $result = $this->db->query($sql);
                    $this->db->query("DELETE FROM dev_rappimages WHERE diamond_id = '$value'");
                    }                   
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
        if($action == 'Revise') {
            echo $viewupdate; exit;
            //$retuen['total'] = $viewupdate;
        } else {
           $retuen['total'] = $total; 
        }
           
        } else {
            if (is_array($post)) {
                if ($action == 'edit'&& isset($_POST['editbtn'])) { 
                    $data_to_update = array(
                        'carat' => isset($_POST['carat']) ? trim($_POST['carat']) : '',
                        'color' => isset($_POST['color']) ? trim($_POST['color']) : '',
                        'clarity' => isset($_POST['clarity']) ? trim($_POST['clarity']) : '',
                        //'retail_price' => isset($_POST['retail_price']) ? trim($_POST['retail_price']) : '',
                        'Depth' => isset($_POST['depth']) ? trim($_POST['depth']) : '',
                        'TablePercent' => isset($_POST['table']) ? trim($_POST['table']) : '',
                        'Girdle' => isset($_POST['girdle']) ? trim($_POST['girdle']) : '',
                        'Polish' => isset($_POST['polish']) ? trim($_POST['polish']) : '',
                        'Sym' => isset($_POST['sym']) ? trim($_POST['sym']) : '',
                        'Flour' => isset($_POST['flour']) ? trim($_POST['flour']) : '',
                        'Meas' => isset($_POST['meas']) ? trim($_POST['meas']) : '',
                        'Stones' => isset($_POST['stones']) ? trim($_POST['stones']) : '',
                        'Cert_n' => isset($_POST['certnum']) ? trim($_POST['certnum']) : '',
                        'Stock_n' => isset($_POST['stocknum']) ? trim($_POST['stocknum']) : '',
                        'length' => isset($_POST['length']) ? trim($_POST['length']) : '',
                        'width' => isset($_POST['width']) ? trim($_POST['width']) : '',
                        'height' => isset($_POST['height']) ? trim($_POST['height']) : ''
                    );
                    $this->db->where('lot', $id);
                    $this->db->update('dev_index', $data_to_update);
                    $loosediamonds_details = $this->getPendantById($id); 
                    $details[0] = $_POST;
                    $details[0] = array_merge($details[0], array(
                                                                'ebayid' => trim($loosediamonds_details[0]['ebayid'])
                                                        ));
//echo "<pre>"; print_r($_POST); echo "</pre>";
                    //$GetResponse = $this->addLooseDiamondtoEbay($details, 'pendants', '-1');
                    $GetResponse = $this->addRapnetStoneToeBay($details[0], 30, 'pendants', '-1');
                    if ($GetResponse) {
                        $retuen["success"] = $GetResponse;
                    } else {
                        $retuen["error"] = "Could not connect to ebay";
                    }
                } else {
		            $details = $this->getPendantById($id);
                    $GetResponse = $this->addRapnetStoneToeBay($details[0], 30, 'pendants', '-1');
                    if (isset($GetResponse) && !empty($GetResponse)) {
                        $retuen["success"] = "Item has been Updated Successfully!!";
                    } else {
                        $retuen["success"] = "Error occured!!";
                    }
                }
            }
        }
        $retuen["success"] = ( empty($retuen["success"]) ? 'Jewelercart.com is Processing your Diamonds to Ebay.com Please Standby.' : $retuen["success"] );
        return $retuen;
    }
    //// delete image by id
    function deleteImageById($colsn=1, $id=0) {
        $colsname = 'ebay_img'.$colsn;
        $sqlimg = $this->db->query("SELECT $colsname FROM dev_rappimages WHERE diamond_id = '$id'");
        $resultimg = $sqlimg->result_array();
        $imageName = explode('images', $resultimg[0][$colsname]);
        if( !empty($imageName[1]) ) {
                 unlink('images'.$imageName[1]);
            }
        $this->db->query("UPDATE dev_rappimages SET $colsname = '' WHERE diamond_id = '$id'");
        
        return true;
    }
    
////// get diamond image name
    function deleteDiamondImage($id=0) {
        $sql = "SELECT * FROM dev_rappimages WHERE diamond_id in ('" . $id . "')";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        
        for($i=1; $i<=6; $i++) {
            $ebay_img = explode('images', $result[0]['ebay_img'.$i]);
            if( !empty($ebay_img[1]) ) {
                 unlink('images'.$ebay_img[1]);
            }
        }
        
    }

	function fancyColorList() {
		$sql = "SELECT fancy_color FROM ".$this->config->item('table_perfix')."index WHERE fancy_color != '' GROUP BY fancy_color ORDER BY fancy_color";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

    ////// get imge according to the diamond shape
    function getColorImgColmn($colr, $shape, $lotid='', $marketplace='') {
        switch($colr) {
            case 'Y':
                $imgColmn = 'picture2';
                break;
            case 'PL':
                $imgColmn = 'picture3';
                break;
            case 'G':
                $imgColmn = 'picture4';
                break;
            case 'O':
                $imgColmn = 'picture5';
                break;
            case 'R':
                $imgColmn = 'picture6';
                break;
            case 'B':
                $imgColmn = 'blue_shape';
                break;
            case 'BN':
                $imgColmn = 'brown_shape';
                break;
            case 'BK':
                $imgColmn = 'black_shape';
                break;
            case 'CHAMELEON':
                $imgColmn = 'chameleon_sh';
                break;
            case 'CM':
            case 'CHAMPAGNE':
                $imgColmn = 'champagne_sh';
                break;
            case 'GY':
                $imgColmn = 'gray_shape';
                break;
            case 'P':
                $imgColmn = 'pink_shape';
                break;
            default:
                $imgColmn = 'picture1';
        }
        
        $whitePictColumn = ( !empty($marketplace) ? 'white_background' : 'picture1' );
        
        $sql = "SELECT * FROM " . $this->config->item('table_perfix') . "pictures  WHERE  diamondshape LIKE '" . $shape . "' ORDER BY pic_id DESC LIMIT 1";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            
            if( !empty($colr) ) {
                $imgColValue = $result[0][$imgColmn];
                $imgColsValue = ( ( !empty($imgColValue) && $colorImgCols != 'picture1') ? $imgColValue : SITE_URL.'images/noringimage.png' );
            } else {
               $imgColsValue = ( !empty($result[0][$whitePictColumn]) ? $result[0][$whitePictColumn] : SITE_URL.'images/noringimage.png' );                
            }
    $viweDmShape = $imgColsValue;
     
    if( !empty($lotid) ) {
      $otherimg = $this->db->query("SELECT ebay_img1 FROM dev_rappimages  WHERE diamond_id = '" . trim($lotid) . "'");
      $result_othrimg = $otherimg->result_array();
      $viweDmShape = ( !empty($result_othrimg[0]['ebay_img1']) ? $result_othrimg[0]['ebay_img1'] : $imgColsValue );
    }
        
            
        return $viweDmShape;
}
    
    function getPendants($page = 1, $rp = 10, $sortname = 'lot', $sortorder = 'desc', $query = '', $qtype = 'lot', $id_array = 0, $oid = '', $custom_filter = "") {
        /* $results = array();

          $sort = "ORDER BY $sortname $sortorder";

          $start = (($page - 1) * $rp);

          $limit = "LIMIT $start, $rp";

          $qwhere = "";
          if ($query)
          $qwhere .= " AND $qtype LIKE '%$query%' ";
          if ($oid != '')
          $qwhere .= " AND id = $oid";
          $qwhere = " ";
          $sort = " ORDER BY re ASC";
          $sql = "SELECT  * , (price * carat) as re FROM   dev_index  where  Cert IN ('GIA','EGL U','EGL I') " . $qwhere . " " . $sort . " " . $limit;
          $result = $this->db->query($sql);
          $results['result'] = $result->result_array();
          $sql2 = "SELECT lot FROM   dev_index  where 1=1 " . $qwhere;
          $result2 = $this->db->query($sql2);
          $results['count'] = $result2->num_rows();
          return $results;
         */

        $results = array();
        $custom_filter_string = "";
        //var_dump($custom_filter);
        //exit;
        if ($custom_filter) {

            //echo '<pre>';
            //var_dump($custom_filter);
            foreach ($custom_filter as $key => $value) {
                if ($value == "") {
                    
                } else {
                    //echo $key."=>".$value;
                    if ($key == 'color') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND color IN (" . $v . ") ";
                    }
                    if ($key == 'shape') {
                        //echo "-" . $value . "- ";
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND shape IN (" . $v . ") ";
                    }
                    if ($key == 'cut') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND cut IN (" . $v . ") ";
                    }
                    if ($key == 'clarity') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND clarity IN(" . $v . ") ";
                    }
                    if ($key == 'caratmin' && $value != "") {
                        $custom_filter_string.=" AND carat > '" . $value . "' ";
                    }
                    if ($key == 'caratmax' && $value != "") {
                        $custom_filter_string.=" AND carat < '" . $value . "' ";
                    }
                }
            }
        }
        //echo "".$custom_filter_string;


        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = " LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";

        $sort = " ORDER BY re ASC";
        if (($id_array != "") && ($id_array != 0)) {
            $qwhere .= " AND owner in  ($id_array)";
        }

        //   $sql = "SELECT  *  , (price * carat) as re  FROM  " . $this->config->item('table_perfix') . "rings where  Cert IN ('GIA','EGL U','EGL I') " . $qwhere . " " . $sort . " " . $limit;
        //echo  $sql = "SELECT  *  , (price * carat) as re  FROM  " . $this->config->item('table_perfix') . "loosediamonds where  Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P') " . $qwhere . " " . $custom_filter_string . " " . $sort . " " . $limit;
		//test Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P')
		
		
        $sql = "SELECT  *  FROM  " . $this->config->item('table_perfix') . "index WHERE Cert='' or Cert!='' " . $qwhere . " " . $custom_filter_string . $limit;

        //file_put_contents('jewelry_query', $sql);
         
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        //$sql2 = "SELECT lot FROM  " . $this->config->item('table_perfix') . "loosediamonds where  Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P')  " . $qwhere . " " . $custom_filter_string;
		//Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P')  
        $sql2 = "SELECT lot FROM  " . $this->config->item('table_perfix') . "index WHERE Cert='' or Cert!='' " . $qwhere . " " . $custom_filter_string;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }

    function view_cert_verify_links($details=array()) {
        if( strchr($details['online_report'], 'http') === FALSE ) {
            $verify_link = $details['certimage'];
        } else {
            $verify_link = $details['online_report'];
        }
        
        if( file_exists($verify_link) || file_get_contents($verify_link) ) {
            $file_contents = file_get_contents($verify_link);
        } else {
            $file_contents = 'Image';
        }
        
        if( strchr($file_contents, 'Image') === FALSE ) {
            $verifyLabLink = $verify_link;
            $view_certificate = '<a href="'.$verifyLabLink.'" target="_blank">'.$details['Cert_n'].'</a> <a href="'.$verifyLabLink.'" target="_blank">(View Certificate)</a>';
        } else {
            $verifyLabLink = '#';
            $view_certificate = $details['Cert_n'];
        }
        $returns['verify_link'] = $verifyLabLink;
        $returns['view_cert']   = $view_certificate;
        
        return $returns;
    }
    
    function addRapnetStoneToeBay($detail, $duration, $type, $index, $ebayRequest='AddItem') {
        $duration = 30;
        $destFolder = 'images/diamonds/shape/';
 if(!empty($details['Meas'])){
 list($w,$b,$h) = explode("x",$details['Meas']);
 $meas = $w." x ".$b." x ".$h;
 } else {
  $meas = '';   
 }
 
 $checkdm_type = $this->getDiamondType($detail['lot']);
 $details_dm = $this->getPendantById($detail['lot']);
 $clarityEnhanc = '';
 
if($checkdm_type['colorresult'] > 0)
{
	$typeDescription = "100% Natural Colored Diamond!";
}
if($checkdm_type['clarityresult'] > 0)
{
	$typeDescription = "100% Natural Diamond; Artificial Clarity Enhancement!";
        $clarityEnhanc = ' Clarity Enhanced ';
}
if($checkdm_type['whiteresult'] > 0)
{
	$typeDescription = "100% Natural Diamond";
}
	
 
        if ($type == 'pendants') {
            
        if($checkdm_type['clarityresult'] > 0) {
            //$storeCategoryId = '7271193017';
            $storeCategoryId = '13525436017';
            $requestArray['primaryCategory'] = '152810';
        } 
        else if($checkdm_type['colorresult'] > 0) 
            {
                $storeCategoryId = '7271194017';
                $requestArray['primaryCategory'] = '3824';
        } else {
            $storeCategoryId = '7271193017';
            //$requestArray['primaryCategory'] = '3824';
            $requestArray['primaryCategory'] = '152810';
        }
            $destFolder = 'images/diamonds/pendants/';
            switch ($detail['shape']) {
                case 'Round':
                    $shape = 'Round';
                    ///$destFile = $destFolder.'round.jpg';				 
                    break;
                case 'Trilliant':
                    $shape = 'Trilliant';
                    break;
                case 'Princess':
                    $shape = 'Princess';
                    break;
                case 'Radiant':
                    $shape = 'Radiant';
                    break;
                case 'Emerald':
                    $shape = 'Emerald';
                    break;
                case 'Asscher':
                case 'Sq. Emerald':
                    $shape = 'Asscher';
                    break;
                case 'Oval':
                    $shape = 'Oval';
                    break;
                case 'Marquise':
                    $shape = 'Marquise';
                    break;
                case 'Pear':
                    $shape = 'Pear';
                    break;
                case 'Heart':
                    $shape = 'Heart';
                    break;
                case 'Cushion':
                    $shape = 'Cushion';
                    break;
                case 'Cushion Modified':
                    $shape = 'Cushion';
                    break;
                default:
                    $shape = $detail['shape'];
                    //$storeCategoryId = '7271193017';
                    //$requestArray['primaryCategory'] = '3824';
                    break;
            }
        } else {
            switch ($detail['shape']) {
                case 'Round':
                    $shape = 'Round';
                    //	$destFile = $destFolder.'round.jpg';
                    //$storeCategoryId = $this->getRoundStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '11234095';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '11234116';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Princess':
                    $shape = 'Princess';
                    //	$destFile = $destFolder.'princessrings.jpg';
                    //$storeCategoryId = $this->getPrincessStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '11234096';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '11234117';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Radiant':
                    $shape = 'Radiant';
                    //	$destFile = $destFolder.'radiantring.jpg';
                    //$storeCategoryId = $this->getRadiantStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '11234097';    // '2395095015';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '11234118';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Emerald':
                    $shape = 'Emerald';
                    //	$destFile = $destFolder.'emeraldring.jpg';
                    //$storeCategoryId = $this->getEmeraldStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '11234100';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '11234121';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Asscher':
                case 'Sq. Emerald':
                    $shape = 'Asscher';
                    //	$destFile = $destFolder.'asscherring.jpg';
                    //$storeCategoryId = $this->getAsscherStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '11234101';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '11234122';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Oval':
                    $shape = 'Oval';
                    //	$destFile = $destFolder.'oval.jpg';                                
                    //$storeCategoryId = $this->getOvalStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '740520015';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '740519015';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Marquise':
                    $shape = 'Marquise';
                    //	$destFile = $destFolder.'marquisering.jpg';
                    //$storeCategoryId = $this->getMarquiseStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '1557797015';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '1373417015';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Pear':
                    $shape = 'Pear';
                    //	$destFile = $destFolder.'pear_ring.jpg';
                    //$storeCategoryId = $this->getPearStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '11234099';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '11234120';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Heart':
                    $shape = 'Heart';
                    //	$destFile = $destFolder.'heartring.jpg';
                    //$storeCategoryId = $this->getHeartStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '11234098';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '11234119';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Cushion':
                    $shape = 'Cushion';
                    //	$destFile = $destFolder.'cushionring.jpg';                                
                    //$storeCategoryId = $this->getCushionStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '687738015';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '687737015';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                case 'Cushion Modified':
                    $shape = 'Cushion';
                    //	$destFile = $destFolder.'cushionring.jpg';                                
                    //$storeCategoryId = $this->getCushionStoreCategoryID($detail['carat']);
                    if ($detail['cert'] == 'GIA') {
                        $storeCategoryId = '687738015';
                        $requestArray['primaryCategory'] = '152899';
                    } else {
                        $storeCategoryId = '687737015';
                        $requestArray['primaryCategory'] = '152899';
                    }
                    break;
                default:
                    $shape = $detail['shape'];
                    $storeCategoryId = '687737015';
                    $requestArray['primaryCategory'] = '31387';
                    break;
            }
        }
        switch ($detail['polish']) {
            case 'VG':
                $polish = 'Very Good';
                break;
            case 'GD':
                $polish = 'Good';
                break;
            case 'EX':
                $polish = 'Excellent';
                break;
            case 'ID':
                $polish = 'Ideal';
                break;
            default:
                $polish = $detail['Polish'];
                break;
        }
        switch ($detail['sym']) {
            case 'VG':
                $sym = 'Very Good';
                break;
            case 'GD':
                $sym = 'Good';
                break;
            case 'EX':
                $sym = 'Excellent';
                break;
            case 'ID':
                $sym = 'Ideal';
                break;
            case 'P':
                $sym = 'Premium';
                break;
            default:
                $sym = $detail['Sym'];
                break;
        }
        //$detail['carat'] = number_format($detail['carat'], 2);
        $detail['girdle'] = $detail['girdle'];
        if ($detail['color'] == 'D') {
            $color = $detail['color'] . ' (colorless)';
        } elseif ($detail['color'] == 'E') {
            $color = $detail['color'] . ' (colorless)';
        } elseif ($detail['color'] == 'F') {
            $color = $detail['color'] . ' (colorless)';
        } elseif ($detail['color'] == 'G') {
            $color = $detail['color'] . ' (very white)';
        } elseif ($detail['color'] == 'H') {
            $color = $detail['color'] . ' (white)';
        } elseif ($detail['color'] == 'I') {
            $color = $detail['color'] . ' (white)';
        } elseif ($detail['color'] == 'J') {
            $color = $detail['color'] . ' (white face up)';
        } else {
            $color = $detail['color'];
        }
        if (isset($detail['cut']) && !empty($detail['cut'])) {
            $cut = trim($detail['cut']) . "&nbsp;Cut!";
        } else {
            $cut = '';
        }
        if (!empty($detail['certimage'])) {
            $detail['certimage'] = $detail['certimage'];
        }
//Get the images               
        if ($type == 'pendants') {
            $ssql = "SELECT picture1,picture2,picture3,picture4,picture5,picture6 FROM " . $this->config->item('table_perfix') . "loosepictures  WHERE diamondshape = '" . $shape . "'";
            $squery = $this->db->query($ssql);
            $pictureslist = $squery->result_array();
            $pictures = $pictureslist[0];
            $diamondpic = $pictureslist[0]["picture1"];
        } else {
            $ssql = "SELECT picture1,picture2,picture3,picture4,picture5,picture6 FROM " . $this->config->item('table_perfix') . "pictures  WHERE diamondshape = '" . $shape . "'";
            $squery = $this->db->query($ssql);
            $pictureslist = $squery->result_array();
            $pictures = $pictureslist[0];
            $diamondpic = $pictureslist[0]["picture1"];
        }
        $diamondpic = $detail['image2'];
        if ($detail['clarity'] == 'SI1' || $detail['clarity'] == 'SI2') {
            $clarityRange = $detail['clarity'] . ' (clean to the naked eye)';
        }
        if ($detail['clarity'] == 'FL' || $detail['clarity'] == 'IF') {
            if ($detail['clarity'] == 'IF') {
                $clarityRange = $detail['clarity'] . ' (internally flawless)';
            } else {
                $clarityRange = $detail['clarity'] . ' (flawless)';
            }
        }
        if ($detail['clarity'] == 'VS1' || $detail['clarity'] == 'VS2') {
            $clarityRange = $detail['clarity'] . ' (very clean under 10x magnification; clean to the naked eye)';
        }
        if ($detail['clarity'] == 'VVS1' || $detail['clarity'] == 'VVS2') {
            $clarityRange = $detail['clarity'] . ' (completely clean under 10x magnification; clean to the naked eye)';
        }
        if ($detail['clarity'] == 'I1' || $detail['clarity'] == 'I3') {
            $clarityRange = $detail['clarity'];
        }
        if ($detail['clarity'] == 'SI3') {
            $clarityRange = $detail['clarity'];
        }
        if (empty($clarityRange)) {
            $clarityRange = $detail['clarity'];
        }
        if ($detail['carat'] <= '0.29') {
            $caratRange = ' 0.29 &amp; Under';
        }
        if ($detail['carat'] >= '0.30' && $detail['carat'] <= '0.45') {
            $caratRange = ' 0.30 - 0.45';
        }
        if ($detail['carat'] >= '0.46' && $detail['carat'] <= '0.69') {
            $caratRange = ' 0.46 - 0.69';
        }
        if ($detail['carat'] >= '0.70' && $detail['carat'] <= '0.89') {
            $caratRange = ' 0.70 - 0.89';
        }
        if ($detail['carat'] >= '0.90' && $detail['carat'] <= '1.39') {
            $caratRange = ' 0.90 - 1.39';
        }
        if ($detail['carat'] >= '1.40' && $detail['carat'] <= '1.79') {
            $caratRange = ' 1.40 - 1.79';
        }
        if ($detail['carat'] >= '1.80' && $detail['carat'] <= '2.79') {
            $caratRange = ' 1.80 - 2.79';
        }
        if ($detail['carat'] >= '2.80') {
            $caratRange = ' 2.80 &amp; Larger';
        }
        if ($detail['cert'] != 'GIA') {
            // $detail['Cert'] = 'EGL';
        }
        $requestArray['listingType'] = 'StoresFixedPrice'; //'FixedPriceItem';
        $requestArray['productID'] = $detail['lot'];
        $price = $detail['diamond_ourprice'];
        $diamondSalePrice = $price;
        $salesPrice = $this->getLooseFiltersDiscount($price, 'eBay');
        $daimondSalePrice = round($salesPrice,2);
        $retail_price = $detail['retail_price'];
        $watchdetails = '';
            //$link = "https://myapps.gia.edu/ReportCheckPortal/getReportData.do?&reportno=" . $detail['certnum'] . "&weight=" . $detail['carat'];
        //$eglcert = array('EGL USA', 'EGL NY', 'EGL ISRAEL');
        //$eglcert = explode(' ', $details_dm[0]['Cert']);
        
        if( $detail['cert'] == 'GIA' ) {
            $link = 'http://www.gia.edu/cs/Satellite?reportno='.$detail['Cert_n'].'&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C';
        } else if( $detail['cert'] == 'IGI' ) {
           $link = 'http://www.igiworldwide.com/verify.php?r='.$detail['Cert_n']; 
        } else if( $detail['cert'] == 'EGL USA' || $detail['cert'] == 'EGL NY' ) {
           $link = 'http://www.eglusa.com/verify-a-report-results/?st_num='.$detail['Cert_n']; 
        } else {
            $link = '#';
        }
        
        $verifyLabs = $this->view_cert_verify_links($details_dm[0]);
        
        $shaper = viewDmShape( $details_dm[0]['shape'] );
        $titleShape = $shaper;
        //$detail['carat'] = number_format($test['carat'],2);
        $certCertified = ( ( !empty($detail['cert']) && $detail['cert'] != 'NONE' ) ? $detail['cert'] : '' );
        $color_overtone = ( !empty($details_dm[0]['fancy_color_ot']) ? $details_dm[0]['fancy_color_ot'] . ' ' : '' );
        
        if ($type == 'pendants') {
            if( !empty($details_dm[0]['fancy_color']) ) 
                {
                $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['clarity'] . ' ' . $color_overtone . getFancyColorName($details_dm[0]['fancy_color']) . ' Fancy Loose Diamond! ' . $certCertified;
            
                
                } else {
                
                $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' '.$clarityEnhanc.'Loose Diamond! ' . $certCertified;
            }
        } else {
            $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND ENGAGEMENT RING! ' . $certCertified;
        }        
        $templateTitle = $detail['carat'] . 'ct ' . $detail['color'] . ' color / ' . $detail['clarity'] . ' clarity ' . $titleShape . ' Diamonds';
        
        $watchdetails .= '<html><head></head><body>
<link rel="stylesheet" href="https://market.heartsanddiamonds.com/ebayimages/store/css/store-style.css">
<link rel="stylesheet" href="https://market.heartsanddiamonds.com/ebayimages/tmp/css/sty.css">
<div class="pagewidth"><div class="pageminwidth"><div class="pagelayout"><div class="pagecontainer"><table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody><tr><td><!--header start--><table border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td><table cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td colspan="1" rowspan="1"><div id="seo"><a href="http://www.ebaystoreprofessionals.com">Advanced eBay design, eBay store design, eBay shop design, eBay template design, eBay listing design</a></div><table cellspacing="0" cellpadding="0" border="0" width="1104"><tbody><tr><td><table width="1104" border="0"><tbody><tr><td><a href="http://stores.ebay.com/Petrosyan-Jewelry?_rdc=1"><img src="https://market.heartsanddiamonds.com/ebayimages/store/images/logo.jpg" width="" style="display:none;"></a></td><td></td></tr></tbody></table></td></tr><tr><td><table width="1104" border="0"> <tbody><tr><td><table border="0" class="navo" cellpadding="4" cellspacing="0" width="1150"><tbody><tr><td><a href="http://stores.ebay.com/Petrosyan-Jewelry">Home</a></td><td><a href="http://stores.ebay.com/Petrosyan-Jewelry/About-Us.html">About Us</a></td> <td><a href="http://stores.ebay.com/Petrosyan-Jewelry/Shipping.html">Shipping</a></td><td><a href="http://stores.ebay.com/Petrosyan-Jewelry/Returns.html">Returns</a></td> <td><a href="http://stores.ebay.com/Petrosyan-Jewelry/Policies.html">store policies</a></td><td><a href="http://stores.ebay.com/Petrosyan-Jewelry/Education.html">education center</a></td> <td align="right" class="clrblk"><a href="http://stores.ebay.com/Petrosyan-Jewelry/all">View All listings</a></td> <td width="210"><div id="x-hd-srch"><form method="get" name="search" action="http://stores.ebay.com/Petrosyan-Jewelry"><input id="x-hd-sbtn" name="submit" type="image" src="https://market.heartsanddiamonds.com/ebayimages/store/images/search.png" size="" 30=""><input id="x-hd-sbox" onblur="if (this.value == \'\') this.value = \'Store Search ...\';" onfocus="if (this.value == \'Store Search ...\') this.value = \'\';" value="Store Search ..." class="v4sbox" size="13" maxlength="300" name="_nkw" type="text"></form></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><!-- header end --></td></tr><!-- content start --><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0">

<tbody><tr><td align="center"><br></td></tr>

<tr><td align="center">
	
Presenting this Breath-Taking, Vintage Pave Style Setting set with Hand-Selected<br>
'.$templateTitle.' <br>
(100% Clean, with amazing spark and NO Visible inclusions!!!)<br>
<br>
Highest quality, 100% Natural, Authentic diamonds at Special Wholesale Price.<br>
Offers Welcomed - Let\'s Deal!
	
	</td></tr>
	
<tr><td align="center"><br></td></tr>
<tr><td>
<table align="center" border="0">
<tbody><tr>
<td align="center">Click on Thumbnail to View Image</td>
</tr>
<tr>
<td><div class="image-galleryxxx">
  <div class="big-image"> 
  <img id="image1" src="'.$diamondpic.'" width="550" height="550"> 
  <img id="image2" src="'.$detail['certimage'].'" width="550" height="550"> </div>
  <ul>
    <li class="format"><a href="#image1"><img src="'.$diamondpic.'" width="150" height="150"></a></li>
    <li class="format"><a href="#image2"><img src="'.$detail['certimage'].'" width="150" height="150"></a></li>
  </ul>
</div></td>
</tr>
</tbody></table>

</td></tr>

<tr><td>	

<table width="1089" border="0" align="center">
<tbody><tr>
<td colspan="3" align="center" class="headingx-2">Product Specifications</td>
</tr>
</tbody></table><table width="100%" border="0">

<tbody><tr><td bgcolor="#f2f2f2" class="tddeco">ID #:</td><td bgcolor="#f2f2f2" class="tddeco">'.$details_dm[0]['lot'].'</td></tr>
<tr><td class="tddeco" width="">Diamond Shape:</td><td class="tddeco">'.$shaper.'</td></tr>

<tr><td bgcolor="#f2f2f2" class="tddeco">Diamond Carat:</td><td bgcolor="#f2f2f2" class="tddeco">'.$details_dm[0]['carat'].'</td></tr>
<tr><td class="tddeco" width="">Clarity:</td><td class="tddeco">'.$details_dm[0]['clarity'].'</td></tr>

<tr><td bgcolor="#f2f2f2" class="tddeco">Color:</td><td bgcolor="#f2f2f2" class="tddeco">'.$details_dm[0]['color'].'</td></tr>
<tr><td class="tddeco" width="">Polish:</td><td class="tddeco">'.$details_dm[0]['Polish'].'</td></tr>

<tr><td bgcolor="#f2f2f2" class="tddeco">Certificate #:	</td><td bgcolor="#f2f2f2" class="tddeco">
'.$verifyLabs['view_cert'].'</td></tr>
<tr><td class="tddeco">Retail Price :</td><td class="tddeco">$'. number_format($price,2) . '</a></td></tr>
<tr><td bgcolor="#f2f2f2" class="tddeco">Our Price : </td><td bgcolor="#f2f2f2" class="tddeco">$'.number_format($salesPrice, 2).'</a></td></tr>
</tbody></table>
	
</td></tr>

</tbody></table>

</td></tr>

<tr><td><br></td></tr>

<!-- video code here -->

<tr><td><br></td></tr>

<tr><td align="center" class="headingx-2">Featured Item Description: Engagement Ring</td></tr>

<tr><td> <table width="100%" border="0">   <tbody><tr>     <td colspan="2" align="center">Total Carat Weight: '.$details_dm[0]['carat'].'ct</td>   </tr>   <tr>     <td align="center">
<br></td>     <td><img src="https://static.pexels.com/photos/5390/sunset-hands-love-woman.jpg" width="273"></td>   </tr> </tbody></table>  </td></tr>
<BR>
<tr><td><BR></td></tr>
<tr><td><div style="border-top:3px solid #0dadad"><br /></div></td></tr>

<tr><td align="center">

All diamonds are hand selected and professionally matched by our team of GIA certified Gemologists to ensure the high quality and excellent craftsmanship.<BR>
All of our purchases are 100% RISK FREE, backed by our 100% money back guarantee and lifetime upgrade policies.<BR><BR>
We only carry 100% natural diamonds that are non-enhanced by any shape or form.<BR><BR>
Buy with confidence. We will not let you down!
</td></tr> 
<tr><td><BR></td></tr>
<tr><td><div style="border-top:3px solid #0dadad"><br /></div></td></tr>
<tr><td align="center" class="headingx-2">The California Jewelers Guaranteed Value & Assurance:</td></tr>

<tr><td>

<table width="100%" border="0">
  <tr>
    <td align="center"><img src="https://market.heartsanddiamonds.com/ebayimages/tmp/images/1.jpg" width="200" /> </td>
    <td align="center"><img src="https://market.heartsanddiamonds.com/ebayimages/tmp/images/article_gemologist.jpg" width="150" /></td>
    <td align="center"><img src="https://market.heartsanddiamonds.com/ebayimages/tmp/images/sampleappraisal.jpg" width="150" /></td>
    <td align="center"><img src="https://ae01.alicdn.com/kf/HTB1OsNoOVXXXXbVXXXXq6xXFXXXY.jpg" width="200" /></td>
    <td align="center"><img src="https://market.heartsanddiamonds.com/ebayimages/tmp/images/14477647.png" width="200" /></td>
  </tr>
  <tr>
    <td align="center">Conflict-Free Diamonds</td>
    <td align="center">GIA Gemologist On-Staff </td>
    <td align="center">Professional Appraisal</td>
    <td align="center">Elegant Ring Box</td>
    <td align="center">FREE Resizing & Engraving</td>
	</tr>
	<tr><td><BR></td></tr>
	   <tr><td align="center" colspan="5">Diamond Full Report (click cert to enlarge)</td></tr>		
	   
	   <tr><td align="center" colspan="5"><a href="'.$verifyLabs['verify_link'].'" target="_blank"><img src="'.$detail['certimage'].'" alt="" /></a></td></tr>		
 	
	<tr><td><BR></td></tr>
  </tr>
</table>
</td></tr>
<!-- content end -->
<!-- tabs  -->
<tr>
	<td><main>
<input class="inputfix" id="tab1" type="radio" name="tabs" checked="">
<label for="tab1">General information</label>
<input class="inputfix" id="tab2" type="radio" name="tabs">
<label for="tab2">Payment</label>
<input class="inputfix" id="tab3" type="radio" name="tabs">
<label for="tab3">Sales Tax / Int\'l Duties & Customs</label>
<input class="inputfix" id="tab4" type="radio" name="tabs">
<label for="tab4">Shipping</label>
<input class="inputfix" id="tab5" type="radio" name="tabs">
<label for="tab5">Refund Policy / Exchanges</label>
<input class="inputfix" id="tab6" type="radio" name="tabs">
<label for="tab6">Upgrades / Trade-ins</label>
<input class="inputfix" id="tab7" type="radio" name="tabs">
<label for="tab7">Contact info</label>

<section id="content1">
<h3 class="setting">General information</h3>
<p>All of our diamonds are 100% natural; with no enhancements or treatments of any kind.<BR><BR>
We cut round, princess, emerald & asscher diamonds exclusively in out cutting house located in Belguim and Israel<BR><BR>
Please note: all items are considered custom and are not ready to be shipped at time of purchase. Please allow 3-7 business days for production / shipping of any item. For rush delivery <BR><BR>
All purchases come with a free independent appraisal.<BR><BR>
Most items are available in white or yellow gold; please ask about platinum upgrades.<BR><BR>
Ring purchases come in an elegant hardwood ring box<BR><BR>
Free custom sizing - at time of purchase, it is buyer\'s responsibility to provide us with ring size(s) and gold preference. Most rings are available in either white or yellow gold. Same price!!!</p>
</section>
<section id="content2">
<h3 class="setting">Payment</h3>
<p>We accept the following forms of payments:<BR><br /><img src="http://www.wonderjewelers.com/images/bizcard1.gif" alt="" /><BR>
For US/Canada::<BR><BR>
PayPal, Direct Credit Card payment<BR><BR>
For all other countries:<BR><BR>
PayPal only! <BR><BR>
Please note, we will only ship to a Paypal confirmed address with NO exceptions!
</p>
<br>

</section>
<section id="content3">
<h3 class="setting">Sales Tax / Int\'l Duties & Customs</h3>
<p>CA STATE RESIDENTS MUST PAY 9% SALES TAX<BR><BR>
WE ARE NOT RESPONSIBLE FOR ANY DUTIES, TAXES OR PENALTIES <BR><BR>
INCURRED BY ANY BUYER WHEN WE SHIP OUTSIDE OF THE UNITED STATES.<BR><BR>
PLEASE CONTACT YOUR CUSTOMS BUREAU FOR ANY DUTIES OR <BR><BR>
TAXES THAT MAY APPLY IN YOUR HOME COUNTRY.</p>
</section>
<section id="content4">
<h3 class="setting">Shipping</h3>
<p>

We exclusively use federal experess or ups for shipment within the U.S. We use a specialized Diamond Shipping Company for Europe and Australia. Fees include insurance (required with every shipment). All packages require signatures.<br /><br />
$29 USD FOR U.S. DOMESTIC (50 STATES) FED EX 2-DAY SHIPPING<br />
$39 USD FOR U.S. DOMESTIC FED EX OVERNIGHT SHIPPING<br />
$59 USD FOR U.S. DOMESTIC FED EX SATURDAY DELIVERY<br />
$89 USD FOR CANADA FED EX SHIPPING<br />
$99 USD FOR EUROPE AND AUSTRALIA<br />
Please contact us if you wish to make alternative shipping arrangements.<br />
<br />
We are respectful of all events and occasions and try to meet all deadlines. Please indicate to us if you have special plans or an event.<br />
<br />
<b>DISCLAIMER:</b><BR>
Items are not ready to be shipped at time of purchase. In order to maintain the highest quality of craftmanship, we consider every order to be custom. Please allow for 5-10 business to receive item(s). Customized items may take longer.

</p>
</section>
<section id="content5">
<h3 class="setting">Refund Policy / Exchanges</h3>
<p>
WE STAND BY OUR MERCHANDISE 100% AND OFFER 100% MONEY BACK WITHOUT A RESTOCKING FEE (UNLESS THE ITEM HAS BEEN CUSTOM MADE AND/OR MODIFIED - CHECK BELOW) BUYER HAS SEVEN (7) DAYS TO NOTIFY CALIFORNIA JEWELERS OF THEIR DESIRE TO RETURN AND OR FIX THEIR ITEM(S)<BR><br />
BUYER IS RESPONSIBLE FOR PACKING THEIR OWN PACKAGES AND RETURNING THE ITEM IN THE SAME CONDITION IT WAS SHIPPED. ITEMS THAT HAVE BEEN DAMAGED WILL NOT BE REFUNDED<BR><br />
RESIZING AND ENGRAVING WILL NOT BE CONSIDERED DAMAGING TO THE PRODUCT AND ARE ELIGIBLE FOR REFUNDS<BR><br />
PLEASE NOTE: ITEMS THAT HAVE BEEN COSTUMED AND/OR MODIFIED ARE SUBJECTED TO A 20% RESTOCKING FEE.

</p>
</section>
<section id="content6">
<h3 class="setting">Upgrades / Trade-ins</h3>
<p>We are diamond cutters and wholesalers, we have many more stones to choose from that are not listed on the internet. 99% Of our stones are EGL or GIA certified.<BR><br />
If you want to trade-in a purchase made with us for an upgrade, we will buy back your item for what you paid for it and charge the difference
Please ask about upgrades to Platinum<BR><br />
Earrings are availble in screw-back or push-back posts . Same price!!!</p>
</section>
<section id="content7">
<h3 class="setting">Contact info</h3>
<p>
Didn\'t find what you are looking for?<BR><BR>
We carry over 50,000 diamonds in stock. Call us for a quote! <BR><BR>
Please call us if you have any questions on any of our item(s) on Ebay<BR><BR>
Our business hours are 7 AM - 9 PM PST.<BR><BR>
</p>
</section>
</main></td>
</tr>
<!-- tabs  -->
</tbody></table></div></div></div></div></body></html>';

        if (get_magic_quotes_gpc()) {
            // print "stripslashes!!! <br>\n";
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }
        if ($type == 'pendants') {
            $requestArray['ItemSpecification'] = $this->getItemSpecificationp($detail);
        } else {
            $type = "rapnet";
            $requestArray['ItemSpecification'] = $this->getItemSpecification($detail);
        }
        $detail['title'] = $viewhtmlTitle;
        $requestArray['AttributeArray'] = $this->get_attribute($detail);
        $listing_duration = 'Days_' . $duration;
        $requestArray['listingDuration'] = $listing_duration;
        $requestArray['startPrice'] = round($salesPrice); //round($salesPrice);
        $requestArray['buyItNowPrice'] = round($salesPrice); //round($salesPrice);
        $requestArray['quantity'] = '1';
        $requestArray['storeCategoryID'] = $storeCategoryId;
        $requestArray['lot'] = $detail['lot'];
        $requestArray['itemID'] = $detail['ebayid'];
        $requestArray['itemTitle'] = $detail['title'];
        $requestArray['replace_gurantee'] = 'Days_14';
        //$requestArray['image1'] = config_item('base_url') . $diamondpic;
        $requestArray['image2'] = $detail['image2'];
//echo "</pre>"; print_r($requestArray); echo "<br>Type".$type."</pre>";
        if (!empty($detail['ebayid']) && $detail['ebayid'] != '-2' && $ebayRequest != 'ReviseItem') {
            $itemID = $this->updateRequestEbay1($requestArray, $type);
        } else {
            $itemID = $this->sendRequestEbay1($requestArray, $type, 'accent', $ebayRequest);
        }
        return $itemID;
    }
    
    function updateRequestEbay1($requestArray, $section = 'watches') {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel,$production,$ebay_paypal_email,$shipping_salestax_and_jurisdiction,$location;
        include_once 'system/application/helpers/eBaySession.php' ;
        include_once 'system/application/helpers/keys.php' ;
        //pr, 17July,2015
        $this->validateTestUserRegistration();
        $siteID = 0;
        //for AddItemRequest, specify "AddItem" (without "Request") in this call name header.
        $verb = 'ReviseItem';
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        $requestXmlBody .= '<ReviseItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
        $requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
        $requestXmlBody .= "<Version>$compatabilityLevel</Version>";
        ///Remove fields on update
        ///update paypal email address. 
        /*if($requestArray['update_paypal_email']) {
            $requestXmlBody .= '<DeletedField>Item.PayPalEmailAddress</DeletedField>';
        }*/
        $requestXmlBody .= '<DeletedField>Item.SubTitle</DeletedField>';
        $requestXmlBody .= '<Item>';
        $requestXmlBody .= '<ItemID>' . $requestArray['itemID'] . '</ItemID>';
        ///update paypal email address.
        if($requestArray['update_paypal_email']) {
            //$requestXmlBody .= '<PaymentMethods>PayPal</PaymentMethods>';
            //$requestXmlBody .= '<PayPalEmailAddress>'.$ebay_paypal_email.'</PayPalEmailAddress>';
            $requestXmlBody .= '<PaymentMethods>PayPalCredit</PaymentMethods>';
            $requestXmlBody .= '<PaymentMethods>VisaMC</PaymentMethods>';
            $requestXmlBody .= '<PaymentMethods>Discover</PaymentMethods>';
            $requestXmlBody .= '<PaymentMethods>AmEx</PaymentMethods>';
            $requestXmlBody .= '<PaymentMethods>CreditCard</PaymentMethods>';
        }
        $requestXmlBody .= '<Storefront>
                                  <StoreCategoryID>' . $requestArray['storeCategoryID'] . '</StoreCategoryID>
                            </Storefront>';
        if (strlen($requestArray['itemTitle']) > 80) {
            $title = substr($requestArray['itemTitle'], 0, 80);
        } else {
            $title = $requestArray['itemTitle'];
            $length = strlen($requestArray['itemTitle']);
            $loop = 79 - $length;
            $title = $requestArray['itemTitle'];
            $string1 = '';
            $loop = $loop / 6;
            for ($k = 0; $k < $loop - 1; $k++) {
                $string1 = $string1 . "      ";
            }
            $title = $title . $string1;
        }
        $requestXmlBody .= "<Title><![CDATA[" . $title . "]]></Title>";
        if(!empty($requestArray['subTitle'])) {
            $subtitle=substr(strip_tags($requestArray['subTitle']),0,55);
            $requestXmlBody .= "<SubTitle><![CDATA[" . $subtitle . "]]></SubTitle>";
        }
        $requestXmlBody .= "<Description><![CDATA[" . $requestArray['itemDescription'] . "]]></Description>";
        $requestXmlBody .= '<Location><![CDATA[1500 Market Street,Philadelphia,PA,19102]]></Location>';
        /*if ($requestArray['ebay_upload_type'] == 'bestoffer') {
            $requestXmlBody .= '<ListingDetails>
                  <ConvertedBuyItNowPrice currencyID="USD">0.00</ConvertedBuyItNowPrice>
                  <ConvertedStartPrice currencyID="USD">' . $requestArray['startPrice'] . '</ConvertedStartPrice>
                  <ConvertedReservePrice currencyID="USD">0.0</ConvertedReservePrice>
                  <MinimumBestOfferPrice currencyID="USD">' . round($requestArray['startPrice'] * .85) . '</MinimumBestOfferPrice>
                           </ListingDetails>';
        }*/
        $requestXmlBody .= '<Quantity>' . $requestArray['quantity'] . '</Quantity>';
        $requestXmlBody .= $requestArray['ItemSpecification']; //$requestArray['AttributeArray'];
        $requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">0.00</BuyItNowPrice>";
        if ($requestArray['startPrice'] < 10000) {
            $requestXmlBody .= '<AutoPay>True</AutoPay>';
        }
        $requestXmlBody .= "<StartPrice>" . round($requestArray['startPrice']) . "</StartPrice>";
        $requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
        $requestXmlBody .= '<DispatchTimeMax>3</DispatchTimeMax>';
        /*if ($requestArray['ebay_upload_type'] == 'bestoffer') {
            $requestXmlBody .= '<BestOfferDetails>
                                         <BestOfferCount>1</BestOfferCount>
                                           <BestOfferEnabled>ture</BestOfferEnabled>
                                   </BestOfferDetails>';
        } else {
            $requestXmlBody .= '<BestOfferDetails>
                                         <BestOfferCount>1</BestOfferCount>
                                           <BestOfferEnabled>false</BestOfferEnabled>
                                   </BestOfferDetails>';
        }*/
        $requestXmlBody .= '
            <ReturnPolicy>
                <ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
                <RefundOption>MoneyBack</RefundOption>
                <ReturnsWithinOption>' . $requestArray['replace_gurantee'] . '</ReturnsWithinOption>
                <Description>PLEASE VISIT OUR EBAY STORE FOR A DETAILED RETURN POLICY.</Description>
                <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
                <ShippingCostPaidBy>Buyer</ShippingCostPaidBy>
            </ReturnPolicy>
            <ShippingDetails>
            <GlobalShipping>true</GlobalShipping>
            <ApplyShippingDiscount>false</ApplyShippingDiscount>
            <SalesTax>
            <SalesTaxPercent>8</SalesTaxPercent>
            <SalesTaxState>PA</SalesTaxState>
            <ShippingIncludedInTax>true</ShippingIncludedInTax>
            </SalesTax>
            <ShippingServiceOptions>
            <ShippingService>USPSFirstClass</ShippingService>
            <ShippingServiceCost>0.00</ShippingServiceCost>
            <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
            <ShippingServicePriority>1</ShippingServicePriority>
            <FreeShipping>true</FreeShipping>
            <ExpeditedService>false</ExpeditedService>
            <ShippingTimeMin>1</ShippingTimeMin>
            <ShippingTimeMax>6</ShippingTimeMax>
            <FreeShipping>true</FreeShipping>
            </ShippingServiceOptions>
            <ShippingServiceOptions>
            <ShippingService>USPSPriority</ShippingService>
            <ShippingServiceCost>8.99</ShippingServiceCost>
            <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
            <ShippingServicePriority>2</ShippingServicePriority>
            <ExpeditedService>false</ExpeditedService>
            <ShippingTimeMin>1</ShippingTimeMin>
            <ShippingTimeMax>3</ShippingTimeMax>
            </ShippingServiceOptions>
            <ShippingServiceOptions>
            <ShippingService>USPSExpressMail</ShippingService>
            <ShippingServicePriority>3</ShippingServicePriority>
            <ShippingServiceCost>29.99</ShippingServiceCost>
            <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
            <ExpeditedService>false</ExpeditedService>
            <ShippingTimeMin>1</ShippingTimeMin>
            <ShippingTimeMax>6</ShippingTimeMax>
            </ShippingServiceOptions>
            <InternationalShippingServiceOption>
            <ShippingService>USPSExpressMailInternational</ShippingService>
            <ShippingServiceCost>55.00</ShippingServiceCost>
            <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
            <ShippingServicePriority>1</ShippingServicePriority>
            <ShipToLocation>Europe</ShipToLocation>
            <ShipToLocation>Asia</ShipToLocation>
            <ShipToLocation>CA</ShipToLocation>
            <ShipToLocation>GB</ShipToLocation>
            <ShipToLocation>AU</ShipToLocation>
            <ShipToLocation>DE</ShipToLocation>
            <ShipToLocation>JP</ShipToLocation>
            </InternationalShippingServiceOption>
            <TaxTable>  
                <TaxJurisdiction>
                    <JurisdictionID>PA</JurisdictionID>
                    <SalesTaxPercent>0.00</SalesTaxPercent>
                    <ShippingIncludedInTax>true</ShippingIncludedInTax>
                </TaxJurisdiction>
            </TaxTable>
        </ShippingDetails>';
        ///$requestArray['image2'] is the large image
        $ebay_main_image=(!empty($requestArray['image2'])?$requestArray['image2']:$requestArray['image1']);  
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '<PictureDetails><GalleryType>Gallery</GalleryType>
                  <GalleryURL>' . $ebay_main_image . '</GalleryURL>';
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';      
        }
        if (!empty($requestArray['ebayimg1'])) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg1'] . '</PictureURL>';
        }
        if (!empty($requestArray['ebayimg2'])) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg2'] . '</PictureURL>';
        }
        if (!empty($requestArray['ebayimg3'])) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg3'] . '</PictureURL>';
        }
        if (!empty($requestArray['ebayimg4'])) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg4'] . '</PictureURL>';
        }
        if (!empty($requestArray['ebayimg5'])) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg5'] . '</PictureURL>';
        }
        if (!empty($requestArray['ebayimg6'])) {
            $requestXmlBody .= '<PictureURL>' . $requestArray['ebayimg6'] . '</PictureURL>';
        }
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '</PictureDetails>';
        }
        $requestXmlBody .= '</Item>';
        $requestXmlBody .= '</ReviseItemRequest>';
//echo '<pre>'; print_r($requestXmlBody); echo '</pre>';
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');
        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        $responses = $responseDoc->getElementsByTagName("ReviseItemResponse");
        foreach ($responses as $response) {
            $acks = $response->getElementsByTagName("Ack");
            $ack = $acks->item(0)->nodeValue;
            //echo "Ack = $ack <BR />\n";   // Success if successful
        }
        //get any error nodes
        $errors = $responseDoc->getElementsByTagName('Errors');
        //if there are error nodes
        //if($errors->length > 0)
        if ($ack == 'Failure') { //echo '<br>'.die('xyz');
            foreach ($errors AS $error) {
                $SeverityCode = $error->getElementsByTagName('SeverityCode');
                //echo '<br>'.$SeverityCode->item(0)->nodeValue;
                if ($SeverityCode->item(0)->nodeValue == 'Error') {
                    $status = '<P><B>eBay returned the following error(s) while updating an item:</B>';
                    //display each error
                    //Get error code, ShortMesaage and LongMessage
                    $code = $error->getElementsByTagName('ErrorCode');
                    $shortMsg = $error->getElementsByTagName('ShortMessage');
                    $longMsg = $error->getElementsByTagName('LongMessage');
                    $errorCode = $code->item(0)->nodeValue;
                    if ($errorCode == 291 || $errorCode == 17) {
                        //$status = $this->sendRequestEbay1($requestArray, $section);
                        $status="Item ".$requestArray['itemTitle']."(".$requestArray['itemID'].")"." has been deleted";
                    } else {
                        //Display code and shortmessage
                        $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
                        //if there is a long message (ie ErrorLevel=1), display it
                        if (count($longMsg) > 0)
                            $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
                    }
                }
            }
        } else { //no errors
            //get results nodes
            $responses = $responseDoc->getElementsByTagName("ReviseItemResponse");
            foreach ($responses as $response) { 
                $acks = $response->getElementsByTagName("Ack");
                $ack = $acks->item(0)->nodeValue;
                //echo "Ack = $ack <BR />\n";   // Success if successful
                $endTimes = $response->getElementsByTagName("EndTime");
                $endTime = $endTimes->item(0)->nodeValue;
                //echo "endTime = $endTime <BR />\n";
                $itemIDs = $response->getElementsByTagName("ItemID");
                $itemID = $itemIDs->item(0)->nodeValue;
                // echo "itemID = $itemID <BR />\n";
                if(!$production) {
                   $linkBase = "http://cgi.sandbox.ebay.com/ws/eBayISAPI.dll?ViewItem&item="; 
                }
                else{
                    $linkBase = "http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item="; 
                }                
                $status = "<a href=$linkBase" . $itemID . " target='_blank'>" . $requestArray['itemTitle'] . "</a> <BR />";
                $feeNodes = $responseDoc->getElementsByTagName('Fee');
                foreach ($feeNodes as $feeNode) {
                    $feeNames = $feeNode->getElementsByTagName("Name");
                    if ($feeNames->item(0)) {
                        $feeName = $feeNames->item(0)->nodeValue;
                        $fees = $feeNode->getElementsByTagName('Fee');  // get Fee amount nested in Fee
                        $fee = $fees->item(0)->nodeValue;
                        if ($fee > 0.0) {
                            if ($feeName == 'ListingFee') {
                                $status .= "<B>$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                            } else {
                                $status .= "$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                            }
                        }  // if $fee > 0
                    } // if feeName
                } // foreach $feeNode
            } // foreach response
            $status = "Item has been successfully updated to Ebay.<br>Click Here to view this: ".$status;
        } // if $errors->length > 0
        return $status;
    }
    
    function validateTestUserRegistration() {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel,$production,$ebay_paypal_email,$shipping_salestax_and_jurisdiction,$location;
        include_once 'application/helpers/eBaySession.php';
        include_once 'application/helpers/keys.php';
        if($production){    //ebay live
            return FALSE;
        }
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>';
        $requestXmlBody .= '<ValidateTestUserRegistrationRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<RequesterCredentials><eBayAuthToken>'.$userToken.'</eBayAuthToken></RequesterCredentials>';
        $requestXmlBody .= '<FeedbackScore>1000</FeedbackScore>';
        $requestXmlBody .= '<SubscribeSMPro>true</SubscribeSMPro>';
        $requestXmlBody .= '</ValidateTestUserRegistrationRequest>';
        ///send to ebay 
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb); 
        $responseXml = '';
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');
        //pr($responseXml);
        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        $response= '';
        $response = $responseDoc->getElementsByTagName("Ack");
        $ack = $response->item(0)->nodeValue;
        if($ack == "Success") {
            return true;
        } else {
            return false;
        }
        //pr($responses);
    }
    function sendRequestEbay1($requestArray, $section = 'watches', $category = 'accent', $ebayRequests) { 
        //echo "<pre>"; print_r($requestArray); echo "</pre>";
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel,$production,$ebay_paypal_email,$shipping_salestax_and_jurisdiction,$location;
        include_once 'system/application/helpers/eBaySession.php';
        include_once 'system/application/helpers/keys.php';
        //pr, 17July,2015
        $this->validateTestUserRegistration();
        $requestArray['replace_gurantee'] = "Days_30";
        //pr("@sendRequestEbay1--include","exit");
        $siteID = 0;
        //for AddItemRequest, specify "AddItem" (without "Request") in this call name header.
        $verb = $ebayRequests; /// AddItem or ReviseItem 
        $addItemsRequest = $ebayRequests.'Request';
        ////// Autopaye : True: immediate payemnt is on and False: immediate payment is off
        $setAutoPay = 'false'; //( $requestArray['startPrice'] < 10000 ? 'true' : 'false' );
        $compatabilityLevel = 601;
        $requestXmlBody = '';
        $requestArray['listingType'] = "FixedPriceItem";
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        //$requestXmlBody .= '<AddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<'.$addItemsRequest.' xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
        $requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
        $requestXmlBody .= "<Version>$compatabilityLevel</Version>";
        $requestXmlBody .= '<Item>';
        $requestXmlBody .= '<Country>US</Country>';
        $requestXmlBody .= '<Currency>USD</Currency>';
        $requestXmlBody .= "<Description><![CDATA[" . $requestArray['itemDescription'] . "]]></Description>";
        $requestArray['ebay_upload_type'] = 'bestoffer';
        //$requestArray['listingDuration'] = 'Days_30';
        //$requestArray['minimumbestofferprice'] = '10';
        /*
                if (isset($requestArray['ebay_upload_type']) == 'bestoffer') {
                    $requestArray['minimumbestofferprice'] = round($requestArray['our_price'] * .85);
                    $requestXmlBody .= '<ListingDetails>';
                    $requestXmlBody .= '<MinimumBestOfferPrice currencyID="USD">' . $requestArray['minimumbestofferprice'] . '</MinimumBestOfferPrice>';
                    $requestXmlBody .= '</ListingDetails>';
                    $requestXmlBody .= '<DispatchTimeMax>1</DispatchTimeMax>';
                }*/
        $requestXmlBody .= "<ListingType>" . $requestArray['listingType'] . "</ListingType>";
        $requestXmlBody .= "<ListingDuration>" . $requestArray['listingDuration'] . "</ListingDuration>";
        $requestXmlBody .= '<Location><![CDATA[US]]></Location>';
        //
        //$requestXmlBody .= '<PaymentMethods>AmEx</PaymentMethods>';
        //
        //$requestArray['primaryCategory'] = '164331';
        //$requestXmlBody .= '<PaymentMethods>VisaMC</PaymentMethods>';
        //$requestXmlBody .= '<PaymentMethods>Discover</PaymentMethods>';
        //$requestXmlBody .= '<PaymentMethods>PayPal</PaymentMethods>';
        $requestXmlBody .= '<PayPalEmailAddress>'.$ebay_paypal_email.'</PayPalEmailAddress>';
//        $requestXmlBody .= '<PaymentMethods>PayPalCredit</PaymentMethods>';
//        $requestXmlBody .= '<PaymentMethods>VisaMC</PaymentMethods>';
//        $requestXmlBody .= '<PaymentMethods>Discover</PaymentMethods>';
//        $requestXmlBody .= '<PaymentMethods>AmEx</PaymentMethods>';
//        $requestXmlBody .= '<PaymentMethods>CreditCard</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>PayPal</PaymentMethods>';
        $requestXmlBody .= '<PrimaryCategory>';
        $requestXmlBody .= '<CategoryID>' . $requestArray['primaryCategory'] . '</CategoryID>';
        $requestXmlBody .= '</PrimaryCategory>';
        $requestXmlBody .= '<PrivateListing>true</PrivateListing>';
        //$min = $requestArray['startPrice'] - 1;
        //$min = round($requestArray['startPrice'] * .85);
        //$min = $requestArray['startPrice'];
        //$min = round($requestArray['startPrice'] * .85);
        //$min = round($requestArray['our_price'] * .85);
        $requestArray['ebay_upload_type'] = '';
//echo '<pre>';print_r(($requestArray['startPrice'] * .85) );echo '</pre>';
//echo '<pre>';print_r(($requestArray['our_price'] * .85) );echo '</pre>';
        /*if (isset($requestArray['ebay_upload_type']) == 'bestoffer') {
            $requestXmlBody .= '<ListingDetails>
                                <ConvertedBuyItNowPrice currencyID="USD">0.00</ConvertedBuyItNowPrice>
                                <ConvertedStartPrice currencyID="USD">' . round($requestArray['our_price']) . '</ConvertedStartPrice>
                                <ConvertedReservePrice currencyID="USD">0.0</ConvertedReservePrice>
                                <MinimumBestOfferPrice currencyID="USD">' . $min . '</MinimumBestOfferPrice>
                            </ListingDetails>';
        }*/
        $requestXmlBody .= $requestArray['ItemSpecification'];
        $requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">0.00</BuyItNowPrice>";
        $requestXmlBody .= "<Quantity>" . $requestArray['quantity'] . "</Quantity>";
        //$requestXmlBody .= '<DispatchTimeMax>1</DispatchTimeMax>';
        $requestXmlBody .= '<DispatchTimeMax>3</DispatchTimeMax>';
        /*if (isset($requestArray['ebay_upload_type']) == 'bestoffer') {
            $requestXmlBody .= '<BestOfferDetails>
                                                <BestOfferCount>1</BestOfferCount>
                                                <BestOfferEnabled>true</BestOfferEnabled>
                            </BestOfferDetails>';
        } else {
            $requestXmlBody .= '<BestOfferDetails>
                                                <BestOfferCount>1</BestOfferCount>
                                                <BestOfferEnabled>false</BestOfferEnabled>
                            </BestOfferDetails>';
        }*/
        $requestXmlBody .= '<AutoPay>'.$setAutoPay.'</AutoPay>';
        $requestXmlBody .= "<StartPrice>" . round($requestArray['startPrice']) . "</StartPrice>";
        if (strlen($requestArray['itemTitle']) > 80) {
            $title = substr($requestArray['itemTitle'], 0, 80);
        } else {
            $title = $requestArray['itemTitle'];
            $length = strlen($requestArray['itemTitle']);
            $loop = 80 - $length;
            $title = $requestArray['itemTitle'];
            $string1 = '';
            $loop = $loop / 6;
            for ($k = 0; $k < $loop - 1; $k++) {
                $string1 = $string1 . "      ";
            }
            $title = $title . $string1;
        }
        //$requestXmlBody .= "<Title><![CDATA[".($requestArray['itemTitle'])."]]></Title>";
        $requestXmlBody .= "<Title><![CDATA[" . ($title) . "]]></Title>";
        if(!empty($requestArray['subTitle'])) {
            $subtitle=substr(strip_tags($requestArray['subTitle']),0,55);
            $requestXmlBody .= "<SubTitle><![CDATA[" . $subtitle . "]]></SubTitle>";
        }
        $requestXmlBody .= "<SKU>" . (string)$requestArray['productID'] . "</SKU>";
        $requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
        $requestXmlBody .= '<ShippingType>FlatDomesticCalculatedInternational</ShippingType><ThirdPartyCheckout>false</ThirdPartyCheckout>';
        $requestXmlBody .= '<ReturnPolicy>
            <ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
            <RefundOption>MoneyBack</RefundOption>
            <ReturnsWithinOption>' . $requestArray['replace_gurantee'] . '</ReturnsWithinOption>
            <Description>PLEASE VISIT OUR EBAY STORE FOR A DETAILED RETURN POLICY.</Description>
              <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
              <ShippingCostPaidBy>Buyer</ShippingCostPaidBy>
    </ReturnPolicy>
    <ShippingDetails>
          <GlobalShipping>true</GlobalShipping>
          <ApplyShippingDiscount>false</ApplyShippingDiscount>
          <SalesTax>
          <SalesTaxPercent>8</SalesTaxPercent>
          <SalesTaxState>'.$shipping_salestax_and_jurisdiction.'</SalesTaxState>
          <ShippingIncludedInTax>true</ShippingIncludedInTax>
          </SalesTax>
          <ShippingServiceOptions>
          <ShippingService>USPSFirstClass</ShippingService>
          <ShippingServiceCost>0.00</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <FreeShipping>true</FreeShipping>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>6</ShippingTimeMax>
          <FreeShipping>true</FreeShipping>
          </ShippingServiceOptions>
          <ShippingServiceOptions>
          <ShippingService>USPSPriority</ShippingService>
          <ShippingServiceCost>8.99</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>2</ShippingServicePriority>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>3</ShippingTimeMax>
          </ShippingServiceOptions>
          <ShippingServiceOptions>
          <ShippingService>USPSExpressMail</ShippingService>
          <ShippingServicePriority>3</ShippingServicePriority>
          <ShippingServiceCost>29.99</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>6</ShippingTimeMax>
          </ShippingServiceOptions>
          <InternationalShippingServiceOption>
          <ShippingService>USPSExpressMailInternational</ShippingService>
          <ShippingServiceCost>55.00</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <ShipToLocation>Europe</ShipToLocation>
          <ShipToLocation>Asia</ShipToLocation>
          <ShipToLocation>CA</ShipToLocation>
          <ShipToLocation>GB</ShipToLocation>
          <ShipToLocation>AU</ShipToLocation>
          <ShipToLocation>DE</ShipToLocation>
          <ShipToLocation>JP</ShipToLocation>
          </InternationalShippingServiceOption>
          <TaxTable>
                <TaxJurisdiction>
                  <JurisdictionID>'.$shipping_salestax_and_jurisdiction.'</JurisdictionID>
                  <SalesTaxPercent>0.00</SalesTaxPercent>
                  <ShippingIncludedInTax>true</ShippingIncludedInTax>
                </TaxJurisdiction>
          </TaxTable>
         </ShippingDetails>';
        ///$requestArray['image2'] is the large image
        $ebay_main_image=(!empty($requestArray['image2']) ? $requestArray['image2'] : $requestArray['image1']); 
        //$ebay_main_image='http://certeddiamonds.jewelercart.com/images/pictures/white.jpg';
        $rowOtherImg = $this->getDiamondShapeRow($requestArray['lot']);
        
        if (!empty($ebay_main_image)) { 
            $requestXmlBody .= '<PictureDetails><GalleryType>Gallery</GalleryType>
                                          <GalleryURL>' . $ebay_main_image . '</GalleryURL>';
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';
        }
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img1'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img1'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img2'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img2'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img3'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img3'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img4'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img4'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img5'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img5'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img6'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img6'] . '</PictureURL>';
        }
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '</PictureDetails>';
        }
        if ($category == "accent") {
            $ccid = 4520584010;
        } else {
            $ccid = 4520584010;
        }
        //$ccid='640142919';
        //echo "category ID".$ccid;
        $requestXmlBody .= '<Storefront>
          <StoreCategoryID>' . $requestArray['storeCategoryID'] . '</StoreCategoryID>
          </Storefront>';
        $requestXmlBody .= '<RegionID>0</RegionID>';
        $requestXmlBody .= '</Item>';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= '</'.$addItemsRequest.'>';
        //file_put_contents("additem_requests.txt",$requestXmlBody,FILE_APPEND);
        //$requestXmlBody .= '</'.$addItemRequest.'>';
        //echo '<pre>'; print_r($requestXmlBody); echo '</pre>';
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');
        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml);
        
    if($ebayRequests != 'ReviseItem') {
            $responses = $responseDoc->getElementsByTagName("AddItemResponse");
            //echo '<pre>';
            //print_r($responseXml);
            //echo '</pre>';
            foreach ($responses as $response) {
                $acks = $response->getElementsByTagName("Ack");
                $ack = $acks->item(0)->nodeValue;
                //echo "Ack = $ack <BR />\n"; // Success if successful
            }
            //get any error nodes
            $errors = $responseDoc->getElementsByTagName('Errors');
            //if there are error nodes
            //if($errors->length > 0)
            if ($ack == 'Failure') { //echo '<br>'.die('xyz');
                foreach ($errors AS $error) {
                    $SeverityCode = $error->getElementsByTagName('SeverityCode');
                    //echo '<br>'.$SeverityCode->item(0)->nodeValue;
                    if ($SeverityCode->item(0)->nodeValue == 'Error') {
                        $status = '<P><B>eBay returned the following error(s):</B>';
                        //display each error
                        //Get error code, ShortMesaage and LongMessage
                        $code = $error->getElementsByTagName('ErrorCode');
                        $shortMsg = $error->getElementsByTagName('ShortMessage');
                        $longMsg = $error->getElementsByTagName('LongMessage');
                        //Display code and shortmessage
                        $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
                        //if there is a long message (ie ErrorLevel=1), display it
                        if (count($longMsg) > 0)
                            $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
                    }
                }
                return $status;
            } else { //no errors
                //   echo '<br>'.die('ppt');
                //get results nodes
                $responses = $responseDoc->getElementsByTagName("AddItemResponse");
                //file_put_contents("additem_response.txt",$responses,FILE_APPEND);
                
                foreach ($responses as $response) {
                    $acks = $response->getElementsByTagName("Ack");
                    $ack = $acks->item(0)->nodeValue;
                    //echo "Ack = $ack <BR />\n";   // Success if successful
                    $endTimes = $response->getElementsByTagName("EndTime");
                    $endTime = $endTimes->item(0)->nodeValue;
                    //echo "endTime = $endTime <BR />\n";
                    $itemIDs = $response->getElementsByTagName("ItemID");
                    $itemID = $itemIDs->item(0)->nodeValue;
                    $itemID = trim($itemID);
                    // echo "itemID = $itemID <BR />\n";
                    if(!$production) {
                       $linkBase = "http://cgi.sandbox.ebay.com/ws/eBayISAPI.dll?ViewItem&item="; 
                    }
                    else{
                        $linkBase = "http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item="; 
                    }
                    $status = "<a href=$linkBase" . $itemID . " target='_blank'>" . $requestArray['itemTitle'] . "</a> <BR />";
                    $feeNodes = $responseDoc->getElementsByTagName('Fee');
                    foreach ($feeNodes as $feeNode) {
                        $feeNames = $feeNode->getElementsByTagName("Name");
                        if ($feeNames->item(0)) {
                            $feeName = $feeNames->item(0)->nodeValue;
                            $fees = $feeNode->getElementsByTagName('Fee'); // get Fee amount nested in Fee
                            $fee = $fees->item(0)->nodeValue;
                            if ($fee > 0.0) {
                                if ($feeName == 'ListingFee') {
                                    $status .= "<B>$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                                } else {
                                    $status .= "$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                                }
                            } // if $fee > 0
                        } // if feeName
                    } // foreach $feeNode
                    $status = "Item successfully added to Ebay.<br>click here to view this: ".$status;
                    
                } // foreach response
//                if( !empty($itemID) ) {
//                        $this->addDiscountToEbayListing( $itemID );
//                }
                if ($section == 'qg') {
                    $this->db->where('itemid', $requestArray['productID']);
                    $isinsert = $this->db->update('dev_qg', array(
                        'ebayid' => $itemID,
                    ));
                    $href = config_item('base_url') . "admin/categorymanagement?msg=success&item=$itemID";
                    echo "<script>window.location.href='$href'</script>";
                } else if ($section == 'stuller') {
                    /*$this->db->where('ItemNumber', $requestArray['productID']);
                    $isinsert = $this->db->update('stullerdata_new', array(
                        'ebayid' => $itemID,
                    ));
                    $href = config_item('base_url') . "admin/categorymanagement?msg=success&item=$itemID";
                    echo "<script>window.location.href='$href'</script>";*/
                } else if ($section == 'pendants') {
                    $this->db->where('lot', $requestArray['productID']);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'index', array(
                        'ebayid' => $itemID,
                        'ebay_sent_date' => date('Y-m-d'),
                    ));
                    
                } else if ($section == 'rapnet') {
                    $this->db->where('lot', $requestArray['productID']);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'index', array(
                        'ebayid' => $itemID,
                        'ebay_sent_date' => date('Y-m-d'),
                    ));
                    
                } else if ($section == 'watches') {
                    //echo $itemID;
                    //echo $requestArray['productID'];
                    $this->db->where('productID', $requestArray['productID']);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'watches', array(
                        'ebayid' => $itemID,
                    ));
                } else if ($section == 'povada') {
                    //echo $itemID;
                    //echo $requestArray['productID'];
                    $this->db->where('id', $requestArray['id']);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'diamond_items', array(
                        'ebay_id' => $itemID,
                    ));
                } else if ($section == 'book') {
                    //echo $itemID;
                    //echo $requestArray['productID'];
                    $tbl=$this->config->item('table_perfix') .'books';
                    $this->db->where('id', $requestArray['book_id']);
                    $isinsert = $this->db->update($tbl, array(
                        'ebayid' => $itemID,
                    ));
                } else {
                    $this->db->where('stock_number', $requestArray['productID']);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'jewelries', array(
                        'ebayid' => $itemID,
                    ));
                }
            }
        }
        //if $errors->length > 0
        return $status;
        //return 'Request: <br>'.$requestXmlBody.'<br>Response:'.print_r($responses);
    }
    
    ///// select diamond shape row
    function getDiamondShapeRow($id) {
       $query  = $this->db->query("SELECT * FROM dev_rappimages WHERE diamond_id = '".$id."'");
       $result = $query->result_array();
       
       return $result[0];
    }
    function loosediamondshapes($post, $action = 'view', $id = 0) {

        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {

                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "loosepictures  WHERE pic_id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
        } else {
            $action = '';
            if (is_array($post)) {
                if ($action == 'add') {
                    
                } else {
                    $sql = "select pic_id from " . $this->config->item('table_perfix') . "loosepictures where diamondshape = '" . $post['diamondshape'] . "'";
                    $query = $this->db->query($sql);
                    $result = $query->result_array();
                    if (empty($result['pic_id']) || !isset($result['pic_id'])) {
                        $isinsertringanim = $this->db->insert($this->config->item('table_perfix') . 'loosepictures', array('diamondshape' => $post['diamondshape']));
                    }

                    if ($_FILES['picture1']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture1', 'images/loosepictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/loosepictures', $post['diamondshape'], 'loosepictures', 'diamondshape', $post['diamondshape'], 'picture1');
                    }

                    if ($_FILES['picture2']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture2', 'images/loosepictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/loosepictures', $post['diamondshape'], 'loosepictures', 'diamondshape', $post['diamondshape'], 'picture2');
                    }

                    if ($_FILES['picture3']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture3', 'images/loosepictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'loosepictures', 'diamondshape', $post['diamondshape'], 'picture3');
                    }

                    if ($_FILES['picture4']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture4', 'images/loosepictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'loosepictures', 'diamondshape', $post['diamondshape'], 'picture4');
                    }
                    if ($_FILES['picture5']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture5', 'images/loosepictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'loosepictures', 'diamondshape', $post['diamondshape'], 'picture5');
                    }
                    if ($_FILES['picture6']['name'] != '') {
                        $this->uploadfile($_FILES, 'picture6', 'images/loosepictures', 'jpeg,gif,jpg,bmp,png', config_item('base_path') . 'images/pictures', $post['diamondshape'], 'loosepictures', 'diamondshape', $post['diamondshape'], 'picture6');
                    }
                }
            }
        }
        return $retuen;
    }

    function loosediamondshapesByID($id) {
        $sql = "select * from " . $this->config->item('table_perfix') . "loosepictures where pic_id = '" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function getloosediamondshapes($page = 1, $rp = 10, $sortname = 'pic_id', $sortorder = 'desc', $query = '', $qtype = 'pic_id') {
        $results = array();

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND pic_id = $oid";

        $sort = "order by pic_id ASC";
        $sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "loosepictures where   1=1  " . $qwhere . " " . $sort . " " . $limit;
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();
        $sql2 = "SELECT pic_id FROM  " . $this->config->item('table_perfix') . "loosepictures where 1=1 " . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }

    function getItemSpecificationp($detail) {

        switch ($detail['shape']) {
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
                $shape = 'Asscher';
                break;
            case 'O':
                $shape = 'Oval';
                break;
            case 'M':
                $shape = 'Marquise';
                break;
            case 'P':
                $shape = 'Pear';
                break;
            case 'H':
                $shape = 'Heart';
                break;
            case 'C':
                $shape = 'Cushion';
                break;
            case 'Cushion Modified':
                $shape = 'Cushion';
                break;
            case 'Sq. Emerald':
                $shape = 'Asscher';
                break;
            default:
                $shape = $detail['shape'];
                break;
        }

        if ($detail['clarity'] == 'VS1' || $detail['clarity'] == 'VS2') {
            $clarityRange = 'VS1 - VS2 (very clean under 10x magnification; clean to the naked eye)';
            $clarityRange1 = 'VS1 - VS2';
        }
        if ($detail['clarity'] == 'SI1' || $detail['clarity'] == 'SI2') {
            $clarityRange = 'SI1 - SI2 (clean to the naked eye)';
            $clarityRange1 = 'SI1 - SI2';
        }
        if ($detail['clarity'] == 'FL' || $detail['clarity'] == 'IF') {


            if ($detail['clarity'] == 'IF') {
                $clarityRange = 'FL - IF (internally flawless)';
                $clarityRange1 = 'FL - IF';
            } else {
                $clarityRange = 'FL - IF (flawless)';
                $clarityRange1 = 'FL - IF';
            }
        }
        if ($detail['clarity'] == 'VVS1' || $detail['clarity'] == 'VVS2') {
            $clarityRange = 'VVS1 - VVS2 (completely clean under 10x magnification; clean to the naked eye)';
            $clarityRange1 = 'VVS1 - VVS2';
        }
        if ($detail['clarity'] == 'I1' || $detail['clarity'] == 'I3') {
            $clarityRange = 'I1 - I3';
            $clarityRange1 = 'I1 - I3';
        }
        if ($detail['clarity'] == 'SI3') {
            $clarityRange = $detail['clarity'];
            $clarityRange1 = $detail['clarity'];
        }


        if ($detail['carat'] < '0.29') {
            $caratRange = ' Less than 0.29 carats';
        }
        if ($detail['carat'] >= '0.29' && $detail['carat'] <= '0.45') {
            $caratRange = ' 0.29 to 0.45 carats';
        }
        if ($detail['carat'] >= '0.46' && $detail['carat'] <= '0.69') {
            $caratRange = ' 0.46 to 0.69 carats';
        }
        if ($detail['carat'] >= '0.70' && $detail['carat'] <= '0.99') {
            $caratRange = ' 0.70 to 0.99 carats ';
        }
        if ($detail['carat'] >= '1.00' && $detail['carat'] <= '1.49') {
            $caratRange = ' 1.00 to 1.49 carats';
        }
        if ($detail['carat'] >= '1.50' && $detail['carat'] <= '1.99') {
            $caratRange = ' 1.50 to 1.99 carats ';
        }
        if ($detail['carat'] >= '2.00' && $detail['carat'] <= '2.99') {
            $caratRange = ' 2.00 to 2.99 carats';
        }
        if ($detail['carat'] >= '3.00') {
            $caratRange = ' 3.00 carats and larger ';
        }

        if ($detail['cert'] == 'GIA') {
            $cert = $detail['cert'];
        } elseif ($detail['cert'] == 'EGL U') {
            $cert = "EGL " . $detail['Country'];
        } else {
            //$cert =   $detail['Cert']."EGL ".$detail['Country'];
            $cert = "EGL ";
        }

        /*
          if($detail['Cert'] ==  'GIA' ){
          $cert = $detail['Cert'];
          }else {
          //$cert =   $detail['Cert']." ".$detail['Country'];
          $cert =   "EGL ".$detail['Country'];
          }
         * 
         */
        $specification = '<ItemSpecifics> 
                                          <NameValueList> 
						<Name>Shape</Name> 
						<Value>' . $shape . '</Value> 
					  </NameValueList>
                                          <NameValueList>
					  <Name>Main Stone Treatment</Name> 
					  <Value>Not Enhanced</Value> 
                                        </NameValueList>
                                         <NameValueList> 
						<Name>Total Carat Weight</Name> 
						<Value>' . $caratRange . '</Value> 
					  </NameValueList>
                                          <NameValueList> 
						<Name>Exact Carat Weight</Name> 
						<Value>' . $detail['carat'] . '</Value> 
					  </NameValueList> 
                                          <NameValueList>
						<Name>Certification/Grading</Name> 
						<Value>' . $cert . '</Value> 
					  </NameValueList> 
                                          <NameValueList> 
						<Name>Clarity</Name> 
						<Value>' . $detail['clarity'] . '</Value> 
					  </NameValueList> 
                                            <NameValueList> 
						<Name>Color</Name> 
						<Value>' . $detail['color'] . '</Value> 
					  </NameValueList>
                                          <NameValueList> 
						<Name>Main Stone</Name> 
						<Value>100% Natural Diamond</Value> 
					  </NameValueList>';
        if (!empty($detail['cut'])) {
            $specification .= '<NameValueList> 
						<Name>Cut</Name> 
						<Value>' . $detail['cut'] . '</Value> 
					  </NameValueList>';
        }
        $specification .= '</ItemSpecifics>';
        $specification .= '<ConditionID>1000</ConditionID>';
        return $specification;
    }

	function getItemSpecificationpii($detail) {
		switch ($detail['shape']) {
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
                $shape = 'Asscher';
                break;
            case 'O':
                $shape = 'Oval';
                break;
            case 'M':
                $shape = 'Marquise';
                break;
            case 'P':
                $shape = 'Pear';
                break;
            case 'H':
                $shape = 'Heart';
                break;
            case 'C':
                $shape = 'Cushion';
                break;
            case 'Cushion Modified':
                $shape = 'Cushion';
                break;
            case 'Sq. Emerald':
                $shape = 'Asscher';
                break;
            default:
                $shape = $detail['shape'];
                break;
        }

        if ($detail['clarity'] == 'VS1' || $detail['clarity'] == 'VS2') {
            $clarityRange = 'VS1 - VS2 (very clean under 10x magnification; clean to the naked eye)';
            $clarityRange1 = 'VS1 - VS2';
        }
        if ($detail['clarity'] == 'SI1' || $detail['clarity'] == 'SI2') {
            $clarityRange = 'SI1 - SI2 (clean to the naked eye)';
            $clarityRange1 = 'SI1 - SI2';
        }
        if ($detail['clarity'] == 'FL' || $detail['clarity'] == 'IF') {
            if ($detail['clarity'] == 'IF') {
                $clarityRange = 'FL - IF (internally flawless)';
                $clarityRange1 = 'FL - IF';
            } else {
                $clarityRange = 'FL - IF (flawless)';
                $clarityRange1 = 'FL - IF';
            }
        }
        if ($detail['clarity'] == 'VVS1' || $detail['clarity'] == 'VVS2') {
            $clarityRange = 'VVS1 - VVS2 (completely clean under 10x magnification; clean to the naked eye)';
            $clarityRange1 = 'VVS1 - VVS2';
        }
        if ($detail['clarity'] == 'I1' || $detail['clarity'] == 'I3') {
            $clarityRange = 'I1 - I3';
            $clarityRange1 = 'I1 - I3';
        }
        if ($detail['clarity'] == 'SI3') {
            $clarityRange = $detail['clarity'];
            $clarityRange1 = $detail['clarity'];
        }
        if ($detail['carat'] < '0.29') {
            $caratRange = ' Less than 0.29 carats';
        }
        if ($detail['carat'] >= '0.29' && $detail['carat'] <= '0.45') {
            $caratRange = ' 0.29 to 0.45 carats';
        }
        if ($detail['carat'] >= '0.46' && $detail['carat'] <= '0.69') {
            $caratRange = ' 0.46 to 0.69 carats';
        }
        if ($detail['carat'] >= '0.70' && $detail['carat'] <= '0.99') {
            $caratRange = ' 0.70 to 0.99 carats ';
        }
        if ($detail['carat'] >= '1.00' && $detail['carat'] <= '1.49') {
            $caratRange = ' 1.00 to 1.49 carats';
        }
        if ($detail['carat'] >= '1.50' && $detail['carat'] <= '1.99') {
            $caratRange = ' 1.50 to 1.99 carats ';
        }
        if ($detail['carat'] >= '2.00' && $detail['carat'] <= '2.99') {
            $caratRange = ' 2.00 to 2.99 carats';
        }
        if ($detail['carat'] >= '3.00') {
            $caratRange = ' 3.00 carats and larger ';
        }
        if ($detail['cert'] == 'GIA') {
            $cert = $detail['cert'];
        } elseif ($detail['cert'] == 'EGL U') {
            $cert = "EGL " . $detail['Country'];
        } else {
            $cert = "EGL ";
        }

		$dmtype = $this->getDiamondType($detail['lot']);
		if( $dmtype['clarityresult'] > 0 ) {
			$clarty_enahnce = 'Enhanced';
			$mains_stone    = 'Enhanced Natural Diamond';
		} else {
			$clarty_enahnce = 'Not Enhanced';
			$mains_stone = '100% Natural Diamond';
		}

        $specification = '<ItemSpecifics> 
			<NameValueList> 
				<Name>Shape</Name> 
				<Value>' . $shape . '</Value> 
			</NameValueList>
			<NameValueList>
				<Name>Main Stone Treatment</Name> 
				<Value>'.$clarty_enahnce.'</Value> 
			</NameValueList>
			<NameValueList> 
				<Name>Total Carat Weight</Name> 
				<Value>' . $caratRange . '</Value> 
			</NameValueList>
			<NameValueList> 
				<Name>Exact Carat Weight</Name> 
				<Value>' . $detail['carat'] . '</Value> 
			</NameValueList> 
			<NameValueList>
				<Name>Certification/Grading</Name> 
				<Value>' . $detail['cert'] . '</Value> 
			</NameValueList> 
			<NameValueList> 
				<Name>Clarity</Name> 
				<Value>' . $detail['clarity'] . '</Value> 
			</NameValueList> 
			<NameValueList> 
				<Name>Color</Name> 
				<Value>' . $detail['color'] . '</Value> 
			</NameValueList>
			<NameValueList> 
				<Name>Main Stone</Name> 
				<Value>'.$mains_stone.'</Value> 
			</NameValueList>';
			if (!empty($detail['cut'])) {
				$specification .= '<NameValueList> 
					<Name>Cut</Name> 
					<Value>' . $detail['cut'] . '</Value> 
				</NameValueList>';
			}
			if (!empty($detail['Comment'])) {
				$specification .= '<NameValueList> 
					<Name>Comments</Name> 
					<Value>' . $detail['Comment'] . '</Value> 
				</NameValueList>';
			}
		$specification .= '</ItemSpecifics>';
		$specification .= '<ConditionID>1000</ConditionID>';
		return $specification;
    }

	function getItemSpecificationii($detail) {
		$specification = '<ItemSpecifics> 
			<NameValueList> 
				<Name>Stone Shape</Name> 
				<Value>' . $this->getDiamndShape($detail['shape']) . '</Value> 
			</NameValueList>
			<NameValueList>
				<Name>Main Stone Treatment</Name> 
				<Value>Enhanced</Value> 
			</NameValueList>
			<NameValueList> 
				<Name>Carat Total Weight</Name> 
				<Value>' . $detail['weight'] . '</Value> 
			</NameValueList>
			<NameValueList> 
				<Name>Clarity</Name> 
				<Value>' . $detail['clarity'] . '</Value> 
			</NameValueList> 
			<NameValueList> 
				<Name>Color</Name> 
				<Value>' . $detail['color'] . '</Value> 
			</NameValueList>';
			$specification .= '<NameValueList> 
				<Name>Main Stone</Name> 
				<Value>100% Natural Diamond</Value> 
			</NameValueList>
		</ItemSpecifics>';
		$specification .= '<ConditionID>1000</ConditionID>';
		return $specification;
    }

    function GetProductDetail($lot) {
        $stullerFirstLevelSql = "SELECT sd.*,sdi.* FROM StullerData sd , Images as sdi  where sd.itemnumber = sdi.ItemNumber  and  sd.itemnumber = '" . urldecode($lot) . "'";
        $StullerFirstLevelArray = $this->db->query($stullerFirstLevelSql);
        $StullerFirstLevelArray = $StullerFirstLevelArray->row_array();
        return isset($StullerFirstLevelArray) ? $StullerFirstLevelArray : false;
    }

    function testimonialByID($id) {
        $sql = "select * from " . $this->config->item('table_perfix') . "testimonials where testimonial_id = '" . $id . "'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    function gettestimonials($page = 1, $rp = 10, $sortname = 'testimonial_id', $sortorder = 'desc', $query = '', $qtype = 'testimonial_id') {
        $results = array();
        $sort = "ORDER BY $sortname $sortorder";
        $start = (($page - 1) * $rp);
        $limit = "LIMIT $start, $rp";
        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
         //if ($oid != '')
            //$qwhere .= " AND testimonial_id = $oid";

        $sort = "order by testimonial_id ASC";

        $sql = "SELECT  * FROM  " . $this->config->item('table_perfix') . "testimonials where   1=1  " . $qwhere . " " . $sort . " " . $limit;
        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();

        $sql2 = "SELECT testimonial_id  FROM  " . $this->config->item('table_perfix') . "testimonials where 1=1 " . $qwhere;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }

    function testimonials($post, $action = 'view', $id = 0) {
        $retuen = array();
        $retuen['error'] = '';
        $retuen['success'] = '';
        if ($action == 'delete') {
            $items = $_POST['items']; //rtrim($_POST['items'],",");
            $itemsArr = explode(',', $items);
            foreach ($itemsArr AS $index => $value) {
                if ($value != '') {
                    $sql = "DELETE FROM " . $this->config->item('table_perfix') . "testimonials  WHERE testimonial_id = $value";
                    $result = $this->db->query($sql);
                }
            }
            $items = rtrim($_POST['items'], ",");
            $total = count(explode(",", $items));
            $retuen['total'] = $total;
            $retuen['success'] .= 'Deleted successfully. ';
        } else {

            if (is_array($post)) {
                if ($action == 'add') {

                    $isinsert = $this->db->insert($this->config->item('table_perfix') . 'testimonials', array(
                        'testimonial_message' => $post["testimonial_message"],
                        'testimonial_author_name' => $post["testimonial_author_name"],
                        'testimonial_adddate' => date("Y-m-d H:i:s")
                            ));



                    $rid = $this->db->insert_id();
                } else {


                    $this->db->where('testimonial_id', $id);
                    $isinsert = $this->db->update($this->config->item('table_perfix') . 'testimonials', array(
                        'testimonial_message' => $post["testimonial_message"],
                        'testimonial_author_name' => $post["testimonial_author_name"],
                        'testimonial_adddate' => date("Y-m-d H:i:s")
                            ));
                }
            }
            return $retuen;
        }
    }

    function getAllDiamonds() {
        $qry = "SELECT lot
				FROM " . config_item('table_perfix') . "index WHERE price !='0.0' AND shape != ''  AND ebayid =  '-2' AND Cert IN ('GIA','EGL U','EGL I') AND  shape NOT IN('European Cut','Trilliant','Octagonal','Pentagonal','Sq. Emerald','Marquise','Emerald','Trilliant','Baguette')   ORDER BY RAND()   ";
        $return = $this->db->query($qry);
        $result = $return->result_array();

        return $result;
    }

    function getStullerlevel2() {
        $level2Sql = "SELECT distinct(`Level2`) as category , is_checked  FROM  stullerdata_new where 1 = 1 ";
        $stullerLevel2Stmt = $this->db->query($level2Sql);
        $stullerLevel2Array = $stullerLevel2Stmt->result_array();
        return $stullerLevel2Array;
    }

    function getStullerlevel3($category) {
        $level3Sql = "SELECT distinct(`Level3`) as category ,is_checked FROM  stullerdata_new where 1 = 1   and  Level2 = '" . $category . "'";
        $stullerLevel3Stmt = $this->db->query($level3Sql);
        $stullerLevel3Array = $stullerLevel3Stmt->result_array();

        return $stullerLevel3Array;
    }

    function getProductsByCategory($category) {
        //$productSql = "SELECT *  FROM  stullerdata_new where 1 = 1   and  Level3 = '".$category."'";
        $productSql = "SELECT sd.*,sdi.* FROM stullerdata_new  sd , images_new as sdi  where sd.ItemNumber = sdi.ItemNumber  and  sd.Level3 = '" . $category . "'";
        $stullerprodStmt = $this->db->query($productSql);
        $stulerProductsArray = $stullerprodStmt->result_array();
        return $stulerProductsArray;
    }

    function addStullerToEbay($detail, $duration, $type) {
        $duration = 30;
        $requestArray['itemTitle'] = $detail['Description'];
        $detail['metal'] = number_format($detail['carat'], 2);
        $detail['metal'] = trim($detail["PrimaryMetalComposition"]);
        $detail['series'] = trim($detail["PrimaryMetalComposition"]);
        $detail['weight'] = trim($detail["weight"]);
        $requestArray['listingType'] = 'StoresFixedPrice'; //'FixedPriceItem';

        $requestArray['productID'] = $detail['ItemNumber'];
        $price = round($detail['RetailPrice']);

        $qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
        $result = $this->db->query($qry);
        $pret = $result->result_array();
        $rate = $pret[0]['rate'];
        if (!isset($rate) || empty($rate)) {
            $rate = 1;
        }
        $diamondpic = "stuller_image/" . $detail["image"];

        // $price = round($price * $rate) + 500;

        $watchdetails = '<link href="http://diamondsforlife.info/ebaystore/tmp.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE]>
<link href="http://diamondsforlife.info/ebaystore/tmp_iefix.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<table cellpadding="0" cellspacing="0" align="center" class="pagewidth2">
  <tr>
    <td align="center"><table cellpadding="0" cellspacing="0" align="center" class="pageminwidth2">
        <tr>
          <td><!-- header start -->
 <map name="Map" id="Map">
              <area shape="rect" coords="1,1,16,12" href="http://contact.ebay.com/ws/eBayISAPI.dll?FindAnswers&frm=284&requested=nektadiamonds" target="_blank" alt="Contact Us" title="Contact Us" />
            </map>
            <table id="HeaderWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="headerLeft" valign="top" align="left"><div id="logoWrap"><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m"><img alt="DIAMOND ENGAGEMENT RING SNYC" title="DIAMOND ENGAGEMENT RING SNYC" src="http://zkordiamonds.com/images/new/logo.jpg" border="0" /></a></div></td>
                <td id="headerRight" valign="top"><div id="phone" align="right" style="color:white;">(212) 302-7327</div>
</td>
              </tr>
            </table>
            <table id="topnavg" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="topnavgl"><div id="topnavlinks"><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Our-Policy.html">Our Policy</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/14-Day-Return-Policy.html">Return Policy</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Newly-Listed.html">News Listed</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Diamond-Education.html">Diamond Education</a><a href="http://cgi3.ebay.com/ws/eBayISAPI.dll?ViewUserPage&userid=nektadiamonds">About Us</a></div></td>
                <td id="topnavgr" align="left"><div id="searchWrap">
                    <form style="display:inline;" name="search" method="get" action="http://search.stores.ebay.com/search/search.dll?GetResult">
                      <table cellpadding="0" cellspacing="0" align="left" border="0">
                        <tr>
                          <td align="left" width="200"><input class="srField" type="text" name="query" size="25" maxlength="300" value="Enter keywords here..." onFocus="if (this.value == \'Enter keywords here...\') this.value = \'\';" />
                            <input type="hidden" name="sid" value="126131195" />
                            <input type="hidden" name="store" value="DiamondEngagementRingsNYC" />
                            <input type="hidden" name="colorid" value="-1" />
                            <input type="hidden" name="fp" value="0" />
                            <input type="hidden" name="st" value="1" />
                            <input type="hidden" name="fsoo" value="1" />
                            <input type="hidden" name="fsop" value="1" /></td>
                          <td align="right" width="33"><div id="searchbutton">
                              <input type="image" src="http://diamondsforlife.info/ebaystore/search.gif" value="Search" align="right" alt="Search" title="Search" />
                            </div></td>
                        </tr>
                      </table>
                    </form>
                  </div></td>
              </tr>
            </table>
            <!-- header end -->
            <!-- landing page start -->
            <table id="homePage" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td valign="top" align="left" id="leftcolumn"><div class="lefttitles"><img alt="Browse by Category" title="Browse by Category" src="http://diamondsforlife.info/ebaystore/title_cats.gif" /></div>
                  <div class="menu">
                    <ul>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_DIAMOND-ENGAGEMENT-RINGS_W0QQfsubZ2">Diamond Engagement Rings</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_LOOSE-DIAMONDS_W0QQfsubZ1448802015">Loose Diamonds</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_DIAMOND-EARRINGS_W0QQfsubZ1450533015">Diamond Earrings</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_THE-SIGNATURE-COLLECTION_W0QQfsubZ1450534015">The Signature Collection</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_W0QQfsubZ0" style="background-image:none; margin-bottom:1px;">View All Products</a></li>
                    </ul>
                  </div>
                  </td>
                <td align="right" valign="top" id="middlecontent"><div class="content_Box1" >
                    <div class="PrTitle" align="center"><span class="PrTitle2">' . $requestArray['itemTitle'] . '!</span></div>
                    <div style="clear:both;"></div>
                    <div class="content_Box2" style="width:415px;float:left;">
                      <div id="MainPhoto" style="margin-left: 0px !important;"><img src="' . config_item('base_url') . $diamondpic . '" border="0" align="left" alt="" name="rollimg" /></div>';

        $watchdetails .= '<div id="ThumbsProd" align="left">';
        $imgring = config_item('base_url') . $diamondpic;

        if (!empty($diamondpic)) {
            $url = "http://diamondsforlife.com/beta/scripts/timthumb.php?src=" . config_item('base_url') . $diamondpic . "&h=380&w=365&zc=1&ALLOW_EXTERNAL=true";
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $url . "'\"  href='#' ;=''  style=\"width:60px;\">";
            $watchdetails .= '<img src="' . $imgring . '" border="0" alt="" /></a>';
        }

        $watchdetails .= '</div>';

        $watchdetails .= '
<div class="extras"> <img alt="" src="' . config_item('base_url') . "images/diamonds/shape/gia.gif" . '"> </div>			
</div>        

                    <div class="content_Box3" >
                      <table class="product_data_wrap" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="settTitle">Product Details:</td>
                        </tr>         <tr>
                          <td align="center"><table border="0" class="product_data" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                             <td class="chartleft wborder tborder">Metal :</td>
                             <td class="chartright wborder tborder">' . trim($detail["PrimaryMetalComposition"]) . '&nbsp;</td>
                             </tr>
                             
                            <tr>
                             <td class="chartleft wborder tborder">Lot#</td>
                             <td class="chartright wborder tborder">' . $detail['ItemNumber'] . '</td>
                             </tr>';


        $watchdetails .= '<tr>
                             <td class="chartleft">Ring Options:</td>
                             <td class="chartright" style="padding-right:10px;">Available in 14k Yellow Gold - NO COST!<div style="margin-top: 8px;">&nbsp;</div>Available in 18k White/Yellow Gold - $145.00 extra<div style="margin-top: 8px;">&nbsp;</div>Available in 950 Platinum - $395.00 extra<div style="margin-top: 8px;">&nbsp;</div><span class="calltb">You may also call us to customize your ring</span></td>
                             </tr>';

        $watchdetails .= '<tr>
                             <td class="chartleft">Ring Options:</td>
                             <td class="chartright">Available in 14k White/Yellow Gold - $195.00 extra
				<div style="margin-top: 8px;">
					&nbsp;</div>
				Available in 18k White/Yellow Gold - $340.00 extra
				<div style="margin-top: 8px;">
					&nbsp;</div>
				Available in 950 Platinum - $590.00 extra
				<div style="margin-top: 8px;">
					&nbsp;</div>
				<span class="calltb">You may also call us to customize your ring</span></td></tr>';

        $watchdetails .= '<tr>
                             <td class="chartleft">Carat Weight:</td>
                             <td class="chartright">' . $detail['weight'] . '&nbsp;carat</td>
                             </tr>
                             </tr>';

        $watchdetails .='  
                              <tr>
                             <td class="chartleft">Type:</td>
                             <td class="chartright">100% Natural Diamond; No Artificial Enhancement of Any Kind!</td>
                             </tr>';


        $watchdetails .='    <tr>
                             <td class="chartleft">Retail Price:</td>
                             <td class="chartright" style="text-decoration: line-through;">$' . number_format($retail_price, 2) . '</td>
                             </tr>
                             
                             ';

        $watchdetails .='   <tr>
                             <td class="chartleft">Description:</td>
                             <td class="chartright">' . $detail['Description'] . '</td>
                             </tr>';

        $watchdetails .='   <tr>
                                      <td class="chartleft">Description:</td>
                                     <td class="chartright">This diamond is beautiful & elegant. It is 100% natural & sparkles!</td>
                                  </tr>';

        $watchdetails .='
                            </table>
                                
                         </td>  
                      </tr><tr>
                          <td><img alt="" src="http://diamondsforlife.info/ebaystore/settings_bottom1.gif"></td>
                        </tr>                        
                      </table>
                    </div>
                    <div style="clear:both;"></div>
                  </div>
                  <!-- policies //start -->        
                  <div class="content_Box4">
                    <div class="tabbed_area">
                      <ul class="tabs">
                        <li><a href="javascript:tabSwitch(\'tab_1\', \'content_1\');" id="tab_1" class="active">Diamond Grading Information</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_2\', \'content_2\');" id="tab_2">Payment &amp; Shipping</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_3\', \'content_3\');" id="tab_3">Return Policy</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_4\', \'content_4\');" id="tab_4">About Us</a></li>
                      </ul>
                      <div id="content_1" class="content"> When purchasing an EGL, European Gemological Laboratory, certified diamond, you get what you pay for. EGL is one of the most trusted and respected diamond grading companies in the world. EGL was founded in Europe in 1974. Internationally known for its state-of-the art technology and innovative services, EGL, responds to the needs of all consumers and the jewelry industry. EGL certified grading is recognized by all major jewelers and diamond trading companies in the United States. EGL conducts business in the most unbiased manner, without influence from commercial interests or sales organizations.<div style="padding-top:10px;"></div><strong>We have access to the largest suppliers in the world. If we can\'t find the diamond you want, it does not exist!</strong></div>
                      <div id="content_2" class="content"> We only accept PayPal payments in US funds (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). Sorry, we DO NOT accept personal checks.
                        <div style="margin-top:8px;"></div>
                        Payment must be received within 4 days of end of auction. California residents must pay 8.75% sales tax.
                        <div align="left" style="margin-top:5px;"><img alt="" src="http://diamondsforlife.info/ebaystore/paypalcreditcards.gif"></div>
                        <div class="polheadings">Shipping: United States</div>
                        We ship all orders using FedEx or UPS Overnight. We process, insure and ship all orders within 2 business days of receipt of payment. For custom designs, and alterations, such as sizing, please allow up to an additional 5 business days. Longer delivery times are experienced during the holidays.
                        <div class="polheadings">Shipping: International</div>
                        We only accept international orders from the United Kingdom, Canada, Europe, Australia and Asia at this time. Shipping to these countries is $65 and such international residents can only pay with PayPal (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). IMPORT TAXES, DUTIES AND CHARGES ARE NOT INCLUDED IN THE ITEM PRICE. THESE CHARGES ARE THE BUYER\'S RESPONSIBILITY. PLEASE CHECK WITH YOUR COUNTRY\'S CUSTOMS OFFICE TO DETERMINE WHAT THESE ADDITIONAL COSTS WILL BE PRIOR TO BIDDING/BUYING. Thank you.</div>
                      <div id="content_3" class="content"> We offer a 100% unconditional 30 day money-back guarantee. We are so confident in the quality of our merchandise that if, for any reason, you are not satisfied with your purchase, we will reimburse you 100% of your purchase price.  We accept returns or exchanges within 30 days of the items receipt, with no restocking fee!  Any exchange, credit or refund will be for the original price paid.  Items must be in their original condition, and must not be altered in any way.  You must call us to obtain a return authorization PRIOR to shipping the item back to us. No packages will be accepted without a return authorization. This is especially important as we will also be giving you specific shipping instructions for your protection. Refunds will be processed through PayPal. All returns are guaranteed by Ebay and PayPal through the <a href="http://pages.ebay.com/paypal/buyer/protection.html" target="_blank">Buyer Protection Program</a>.</div>
                      <div id="content_4" class="content"> <img align="left" src="http://zkordiamonds.com/images/diamonddistrict.jpg" width="390" height="144">All of our diamonds come with a certificate of authenticity and have an unconditional 30 day full money-back guarantee. We can either have your diamond set and designed to your preference or sent to you loosely. We hope to ease any of your concerns you may have about purchasing diamonds on the internet. We pride ourselves in being dedicated to excellent customer service while selling our diamonds at the lowest prices possible. All of our diamonds are guaranteed to be 100% natural, with no artificial enhancements or treatments of any kind.
                      <div style="margin-top:8px;"></div>Diamond Engagement Rings NyC, Inc. allows you to bid with confidence. We have a reputation of being honest about our products and delivering quality diamonds at true wholesale prices. Our resourceful website can help you find the answers you are looking for. If your questions are not answered on our website, please Click Here to contact us or call us Toll-Free 1-(212) 302-7327. Our team is standing by waiting to serve you.</div>
                    </div>
                    <script type="text/javascript">
function tabSwitch(new_tab, new_content) {

	document.getElementById(\'content_1\').style.display = \'none\';
	document.getElementById(\'content_2\').style.display = \'none\';
	document.getElementById(\'content_3\').style.display = \'none\';
	document.getElementById(\'content_4\').style.display = \'none\';
	document.getElementById(new_content).style.display = \'block\';

	document.getElementById(\'tab_1\').className = \'\';
	document.getElementById(\'tab_2\').className = \'\';
	document.getElementById(\'tab_3\').className = \'\';
	document.getElementById(\'tab_4\').className = \'\';
	document.getElementById(new_tab).className = \'active\';		

}
</script>
                  </div>
                  <!-- policies //end -->
                </td>
              </tr>
            </table>
            <!-- landing page end -->
            <!-- footer start -->
            <div id="leftsealbox">
              <div class="leftsealboxwrap"><a href="#"><img alt="100% Satisfaction Guaranteed or your Money Back" title="100% Satisfaction Guaranteed or your Money Back" src="http://diamondsforlife.info/ebaystore/seal_moneyback.png" border="0" /></a></div>
              <div style="clear:both;"></div>
            </div>
            <table id="FooterWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="footerleft" valign="top" align="left"><div id="footertitle"><img alt="Can\'t find what you are looking for?" title="Can\'t find what you are looking for?" src="http://diamondsforlife.info/ebaystore/title_cantfind.gif" /></div>
                  <div id="footerinfo" align="left"><img align="left" alt="" src="http://diamondsforlife.info/ebaystore/cust_serv.png" />DiamondEngagementRingsNYC- deals with all kinds of jewelry and diamonds.<br />
                    We are available 24/7. <a href="http://contact.ebay.com/ws/eBayISAPI.dll?FindAnswers&frm=284&requested=nektadiamonds/" target="_blank">Click Here</a> to contact us or 
                    call us toll-free <span>(212) 302-7327</span> with the exact specifications of the diamond you are 
                    looking for. We will gladly contact you with a price within the same working day. </div></td>
                <td id="footerright" valign="top"><img alt="100% Positive Feedback" title="100% Positive Feedback" src="http://diamondsforlife.info/ebaystore/seal_blue.png" /><img alt="30 Day Money Back Guarantee" title="30 Day Money Back Guarantee" src="http://diamondsforlife.info/ebaystore/seal_green.png" /><img alt="Copyright Exclusive Design" title="Copyright Exclusive Design" src="http://diamondsforlife.info/ebaystore/seal_red.png" /><img alt="Free Overnight Shipping" title="Free Overnight Shipping" src="http://diamondsforlife.info/ebaystore/seal_yellow.png" /> </td>
              </tr>
              <tr>
                <td colspan="2" id="footerbottom" align="left" valign="top"><img alt="GIA - Gemological Institute of America" title="GIA - Gemological Institute of America" src="http://diamondsforlife.info/ebaystore/seal_gia.png" /><img alt="EGL - European Gemological Laboratory" title="EGL - European Gemological Laboratory" src="http://diamondsforlife.info/ebaystore/seal_egl.png" /><img class="bldia" alt="Stop Blood Diamonds" title="Stop Blood Diamonds" src="http://diamondsforlife.info/ebaystore/seal_blooddiamonds.png" /><img alt="Paypal Verified" title="Paypal Verified" src="http://diamondsforlife.info/ebaystore/seal_paypalverified.png" /></td>
              </tr>
            </table>
            <!-- footer end -->
            <div align="center" id="credit">All Imagery & Content &copy;2010 DIAMOND ENGAGEMENT RING SNYC</a></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<div class="scrollgal" align="center">
</div>';
        if (get_magic_quotes_gpc()) {
            // print "stripslashes!!! <br>\n";
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }

        $requestArray['ItemSpecification'] = $this->getStullerItemSpecification();

        $requestArray['AttributeArray'] = ''; // $this->get_attribute($detail);
        $listing_duration = 'Days_' . $duration;
        $requestArray['listingDuration'] = $listing_duration;
        $requestArray['startPrice'] = round($price);
        $requestArray['buyItNowPrice'] = round($price);
        $requestArray['quantity'] = '1';
        $requestArray['storeCategoryID'] = $detail['sub_cat_id']; //primaryCategory
        $requestArray['primaryCategory'] = '164344';
        //$requestArray['itemID'] = $detail['ebayid'];
        $requestArray['image1'] = config_item('base_url') . $diamondpic;
        // echo "<pre>------------------";
        //print_r($requestArray);exit();


        if ($detail['ebayid'] != '-1' || $detail['ebayid'] == '-2') {
            if (!empty($diamondpic)) {
                $itemID = $this->sendRequestEbay($requestArray, 'stuller');
                $href = config_item('base_url') . "admin/categorymanagement?msg=success&item=$itemID";
                echo "<script>window.location.href='$href'</script>";
            }
        }
        return $itemID;
    }

    function addQualityGoldToEbay($detail, $duration, $type) {
        $duration = 30;


        $requestArray['itemTitle'] = $detail['description'];


        $detail['metal'] = trim($detail["metal"]);
        $detail['series'] = trim($detail["PrimaryMetalComposition"]);
        $detail['weight'] = trim($detail["weight"]);


        $requestArray['listingType'] = 'StoresFixedPrice'; //'FixedPriceItem';

        $requestArray['productID'] = $detail['itemid'];


        if (!empty($details['catalog_price'])) {
            $p = $details['catalog_price'];
        } else if (!empty($details['cost_45'])) {
            $p = $details['cost_45'];
        } else if (!empty($details['cost_50'])) {
            $p = $details['cost_50'];
        } else if (!empty($details['cost_35'])) {
            $p = $details['cost_35'];
        } else if (!empty($details['cost_15'])) {
            $p = $details['cost_15'];
        }


        $price = round($p);

        $qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
        $result = $this->db->query($qry);
        $pret = $result->result_array();
        $rate = $pret[0]['rate'];
        if (!isset($rate) || empty($rate)) {
            $rate = 1;
        }


        if (stripos($detail['folder'], 'product')) {
            $diamondpic = "https://images.qgold.com/0/275/" . $detail['image_name'];
            //  $image2 = "https://images.qgold.com/0/100/".$details['image_name'];
        }
        else
            $diamondpic = "http://qgold.com/product/275/" . $detail['image_name'] . ".jpg";


        //  $diamondpic =  "stuller_image/".$detail["image"];
        // $price = round($price * $rate) + 500;

        $watchdetails = '<link href="http://diamondsforlife.info/ebaystore/tmp.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE]>
<link href="http://diamondsforlife.info/ebaystore/tmp_iefix.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<table cellpadding="0" cellspacing="0" align="center" class="pagewidth2">
  <tr>
    <td align="center"><table cellpadding="0" cellspacing="0" align="center" class="pageminwidth2">
        <tr>
          <td><!-- header start -->
 <map name="Map" id="Map">
              <area shape="rect" coords="1,1,16,12" href="http://contact.ebay.com/ws/eBayISAPI.dll?FindAnswers&frm=284&requested=nektadiamonds" target="_blank" alt="Contact Us" title="Contact Us" />
            </map>
            <table id="HeaderWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="headerLeft" valign="top" align="left"><div id="logoWrap"><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m"><img alt="DIAMOND ENGAGEMENT RING SNYC" title="DIAMOND ENGAGEMENT RING SNYC" src="http://zkordiamonds.com/images/new/logo.jpg" border="0" /></a></div></td>
                <td id="headerRight" valign="top"><div id="phone" align="right" style="color:white;">(212) 302-7327</div>
</td>
              </tr>
            </table>
            <table id="topnavg" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="topnavgl"><div id="topnavlinks"><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Our-Policy.html">Our Policy</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/14-Day-Return-Policy.html">Return Policy</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Newly-Listed.html">News Listed</a><a href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m/Diamond-Education.html">Diamond Education</a><a href="http://cgi3.ebay.com/ws/eBayISAPI.dll?ViewUserPage&userid=nektadiamonds">About Us</a></div></td>
                <td id="topnavgr" align="left"><div id="searchWrap">
                    <form style="display:inline;" name="search" method="get" action="http://search.stores.ebay.com/search/search.dll?GetResult">
                      <table cellpadding="0" cellspacing="0" align="left" border="0">
                        <tr>
                          <td align="left" width="200"><input class="srField" type="text" name="query" size="25" maxlength="300" value="Enter keywords here..." onFocus="if (this.value == \'Enter keywords here...\') this.value = \'\';" />
                            <input type="hidden" name="sid" value="126131195" />
                            <input type="hidden" name="store" value="DiamondEngagementRingsNYC" />
                            <input type="hidden" name="colorid" value="-1" />
                            <input type="hidden" name="fp" value="0" />
                            <input type="hidden" name="st" value="1" />
                            <input type="hidden" name="fsoo" value="1" />
                            <input type="hidden" name="fsop" value="1" /></td>
                          <td align="right" width="33"><div id="searchbutton">
                              <input type="image" src="http://diamondsforlife.info/ebaystore/search.gif" value="Search" align="right" alt="Search" title="Search" />
                            </div></td>
                        </tr>
                      </table>
                    </form>
                  </div></td>
              </tr>
            </table>
            <!-- header end -->
            <!-- landing page start -->
            <table id="homePage" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td valign="top" align="left" id="leftcolumn"><div class="lefttitles"><img alt="Browse by Category" title="Browse by Category" src="http://diamondsforlife.info/ebaystore/title_cats.gif" /></div>
                  <div class="menu">
                    <ul>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_DIAMOND-ENGAGEMENT-RINGS_W0QQfsubZ2">Diamond Engagement Rings</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_LOOSE-DIAMONDS_W0QQfsubZ1448802015">Loose Diamonds</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_DIAMOND-EARRINGS_W0QQfsubZ1450533015">Diamond Earrings</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_THE-SIGNATURE-COLLECTION_W0QQfsubZ1450534015">The Signature Collection</a></li>
                      <li><a class="hide" href="http://stores.ebay.com/DiamondEngagementRingsNYC-C0m_W0QQfsubZ0" style="background-image:none; margin-bottom:1px;">View All Products</a></li>
                    </ul>
                  </div>
                  </td>
                <td align="right" valign="top" id="middlecontent"><div class="content_Box1" >
                    <div class="PrTitle" align="center"><span class="PrTitle2">' . $requestArray['itemTitle'] . '!</span></div>
                    <div style="clear:both;"></div>
                    <div class="content_Box2" style="width:415px;float:left;">
                      <div id="MainPhoto" style="margin-left: 0px !important;"><img src="' . config_item('base_url') . $diamondpic . '" border="0" align="left" alt="" name="rollimg" /></div>';

        $watchdetails .= '<div id="ThumbsProd" align="left">';
        $imgring = $diamondpic;

        if (!empty($diamondpic)) {
            $url = $diamondpic;
            $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $imgring . "'\"  href='#' ;=''  style=\"width:60px;\">";
            $watchdetails .= '<img src="' . $imgring . '" border="0" alt="" /></a>';
        }

        $watchdetails .= '</div>';

        $watchdetails .= '
<div class="extras"> <img alt="" src="' . config_item('base_url') . "images/diamonds/shape/gia.gif" . '"> </div>			
</div>        

                    <div class="content_Box3" >
                      <table class="product_data_wrap" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="settTitle">Product Details:</td>
                        </tr>         <tr>
                          <td align="center"><table border="0" class="product_data" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                             <td class="chartleft wborder tborder">Metal :</td>
                             <td class="chartright wborder tborder">' . trim($detail["itemid"]) . '&nbsp;</td>
                             </tr>
                             
                            <tr>
                             <td class="chartleft wborder tborder">Lot#</td>
                             <td class="chartright wborder tborder">' . $detail['itemid'] . '</td>
                             </tr>';


        $watchdetails .= '<tr>
                             <td class="chartleft">Ring Options:</td>
                             <td class="chartright" style="padding-right:10px;">Available in 14k Yellow Gold - NO COST!<div style="margin-top: 8px;">&nbsp;</div>Available in 18k White/Yellow Gold - $145.00 extra<div style="margin-top: 8px;">&nbsp;</div>Available in 950 Platinum - $395.00 extra<div style="margin-top: 8px;">&nbsp;</div><span class="calltb">You may also call us to customize your ring</span></td>
                             </tr>';

        $watchdetails .= '<tr>
                             <td class="chartleft">Ring Options:</td>
                             <td class="chartright">Available in 14k White/Yellow Gold - $195.00 extra
				<div style="margin-top: 8px;">
					&nbsp;</div>
				Available in 18k White/Yellow Gold - $340.00 extra
				<div style="margin-top: 8px;">
					&nbsp;</div>
				Available in 950 Platinum - $590.00 extra
				<div style="margin-top: 8px;">
					&nbsp;</div>
				<span class="calltb">You may also call us to customize your ring</span></td></tr>';


        $watchdetails .='  
                              <tr>
                             <td class="chartleft">Type:</td>
                             <td class="chartright">100% Natural Diamond; No Artificial Enhancement of Any Kind!</td>
                             </tr>';


        $watchdetails .='    <tr>
                             <td class="chartleft">Price:</td>
                             <td class="chartright" style="text-decoration: line-through;">$' . number_format($p, 2) . '</td>
                             </tr>
                             
                             ';


        $watchdetails .='   <tr>
                                      <td class="chartleft">Description:</td>
                                     <td class="chartright">This diamond is beautiful & elegant. It is 100% natural & sparkles!</td>
                                  </tr>';

        $watchdetails .='
                            </table>
                                
                         </td>  
                      </tr><tr>
                          <td><img alt="" src="http://diamondsforlife.info/ebaystore/settings_bottom1.gif"></td>
                        </tr>                        
                      </table>
                    </div>
                    <div style="clear:both;"></div>
                  </div>
                  <!-- policies //start -->        
                  <div class="content_Box4">
                    <div class="tabbed_area">
                      <ul class="tabs">
                        <li><a href="javascript:tabSwitch(\'tab_1\', \'content_1\');" id="tab_1" class="active">Diamond Grading Information</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_2\', \'content_2\');" id="tab_2">Payment &amp; Shipping</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_3\', \'content_3\');" id="tab_3">Return Policy</a></li>
                        <li><a href="javascript:tabSwitch(\'tab_4\', \'content_4\');" id="tab_4">About Us</a></li>
                      </ul>
                      <div id="content_1" class="content"> When purchasing an EGL, European Gemological Laboratory, certified diamond, you get what you pay for. EGL is one of the most trusted and respected diamond grading companies in the world. EGL was founded in Europe in 1974. Internationally known for its state-of-the art technology and innovative services, EGL, responds to the needs of all consumers and the jewelry industry. EGL certified grading is recognized by all major jewelers and diamond trading companies in the United States. EGL conducts business in the most unbiased manner, without influence from commercial interests or sales organizations.<div style="padding-top:10px;"></div><strong>We have access to the largest suppliers in the world. If we can\'t find the diamond you want, it does not exist!</strong></div>
                      <div id="content_2" class="content"> We only accept PayPal payments in US funds (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). Sorry, we DO NOT accept personal checks.
                        <div style="margin-top:8px;"></div>
                        Payment must be received within 4 days of end of auction. California residents must pay 8.75% sales tax.
                        <div align="left" style="margin-top:5px;"><img alt="" src="http://diamondsforlife.info/ebaystore/paypalcreditcards.gif"></div>
                        <div class="polheadings">Shipping: United States</div>
                        We ship all orders using FedEx or UPS Overnight. We process, insure and ship all orders within 2 business days of receipt of payment. For custom designs, and alterations, such as sizing, please allow up to an additional 5 business days. Longer delivery times are experienced during the holidays.
                        <div class="polheadings">Shipping: International</div>
                        We only accept international orders from the United Kingdom, Canada, Europe, Australia and Asia at this time. Shipping to these countries is $65 and such international residents can only pay with PayPal (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). IMPORT TAXES, DUTIES AND CHARGES ARE NOT INCLUDED IN THE ITEM PRICE. THESE CHARGES ARE THE BUYER\'S RESPONSIBILITY. PLEASE CHECK WITH YOUR COUNTRY\'S CUSTOMS OFFICE TO DETERMINE WHAT THESE ADDITIONAL COSTS WILL BE PRIOR TO BIDDING/BUYING. Thank you.</div>
                      <div id="content_3" class="content"> We offer a 100% unconditional 30 day money-back guarantee. We are so confident in the quality of our merchandise that if, for any reason, you are not satisfied with your purchase, we will reimburse you 100% of your purchase price.  We accept returns or exchanges within 30 days of the items receipt, with no restocking fee!  Any exchange, credit or refund will be for the original price paid.  Items must be in their original condition, and must not be altered in any way.  You must call us to obtain a return authorization PRIOR to shipping the item back to us. No packages will be accepted without a return authorization. This is especially important as we will also be giving you specific shipping instructions for your protection. Refunds will be processed through PayPal. All returns are guaranteed by Ebay and PayPal through the <a href="http://pages.ebay.com/paypal/buyer/protection.html" target="_blank">Buyer Protection Program</a>.</div>
                      <div id="content_4" class="content"> <img align="left" src="http://zkordiamonds.com/images/diamonddistrict.jpg" width="390" height="144">All of our diamonds come with a certificate of authenticity and have an unconditional 30 day full money-back guarantee. We can either have your diamond set and designed to your preference or sent to you loosely. We hope to ease any of your concerns you may have about purchasing diamonds on the internet. We pride ourselves in being dedicated to excellent customer service while selling our diamonds at the lowest prices possible. All of our diamonds are guaranteed to be 100% natural, with no artificial enhancements or treatments of any kind.
                      <div style="margin-top:8px;"></div>Diamond Engagement Rings NyC, Inc. allows you to bid with confidence. We have a reputation of being honest about our products and delivering quality diamonds at true wholesale prices. Our resourceful website can help you find the answers you are looking for. If your questions are not answered on our website, please Click Here to contact us or call us Toll-Free 1-(212) 302-7327. Our team is standing by waiting to serve you.</div>
                    </div>
                    <script type="text/javascript">
function tabSwitch(new_tab, new_content) {

	document.getElementById(\'content_1\').style.display = \'none\';
	document.getElementById(\'content_2\').style.display = \'none\';
	document.getElementById(\'content_3\').style.display = \'none\';
	document.getElementById(\'content_4\').style.display = \'none\';
	document.getElementById(new_content).style.display = \'block\';

	document.getElementById(\'tab_1\').className = \'\';
	document.getElementById(\'tab_2\').className = \'\';
	document.getElementById(\'tab_3\').className = \'\';
	document.getElementById(\'tab_4\').className = \'\';
	document.getElementById(new_tab).className = \'active\';		

}
</script>
                  </div>
                  <!-- policies //end -->
                </td>
              </tr>
            </table>
            <!-- landing page end -->
            <!-- footer start -->
            <div id="leftsealbox">
              <div class="leftsealboxwrap"><a href="#"><img alt="100% Satisfaction Guaranteed or your Money Back" title="100% Satisfaction Guaranteed or your Money Back" src="http://diamondsforlife.info/ebaystore/seal_moneyback.png" border="0" /></a></div>
              <div style="clear:both;"></div>
            </div>
            <table id="FooterWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="footerleft" valign="top" align="left"><div id="footertitle"><img alt="Can\'t find what you are looking for?" title="Can\'t find what you are looking for?" src="http://diamondsforlife.info/ebaystore/title_cantfind.gif" /></div>
                  <div id="footerinfo" align="left"><img align="left" alt="" src="http://diamondsforlife.info/ebaystore/cust_serv.png" />DiamondEngagementRingsNYC- deals with all kinds of jewelry and diamonds.<br />
                    We are available 24/7. <a href="http://contact.ebay.com/ws/eBayISAPI.dll?FindAnswers&frm=284&requested=nektadiamonds/" target="_blank">Click Here</a> to contact us or 
                    call us toll-free <span>(212) 302-7327</span> with the exact specifications of the diamond you are 
                    looking for. We will gladly contact you with a price within the same working day. </div></td>
                <td id="footerright" valign="top"><img alt="100% Positive Feedback" title="100% Positive Feedback" src="http://diamondsforlife.info/ebaystore/seal_blue.png" /><img alt="30 Day Money Back Guarantee" title="30 Day Money Back Guarantee" src="http://diamondsforlife.info/ebaystore/seal_green.png" /><img alt="Copyright Exclusive Design" title="Copyright Exclusive Design" src="http://diamondsforlife.info/ebaystore/seal_red.png" /><img alt="Free Overnight Shipping" title="Free Overnight Shipping" src="http://diamondsforlife.info/ebaystore/seal_yellow.png" /> </td>
              </tr>
              <tr>
                <td colspan="2" id="footerbottom" align="left" valign="top"><img alt="GIA - Gemological Institute of America" title="GIA - Gemological Institute of America" src="http://diamondsforlife.info/ebaystore/seal_gia.png" /><img alt="EGL - European Gemological Laboratory" title="EGL - European Gemological Laboratory" src="http://diamondsforlife.info/ebaystore/seal_egl.png" /><img class="bldia" alt="Stop Blood Diamonds" title="Stop Blood Diamonds" src="http://diamondsforlife.info/ebaystore/seal_blooddiamonds.png" /><img alt="Paypal Verified" title="Paypal Verified" src="http://diamondsforlife.info/ebaystore/seal_paypalverified.png" /></td>
              </tr>
            </table>
            <!-- footer end -->
            <div align="center" id="credit">All Imagery & Content &copy;2010 DIAMOND ENGAGEMENT RING SNYC</a></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<div class="scrollgal" align="center">
</div>';
        if (get_magic_quotes_gpc()) {
            // print "stripslashes!!! <br>\n";
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }

        $requestArray['ItemSpecification'] = '';

        $requestArray['AttributeArray'] = ''; // $this->get_attribute($detail);
        $listing_duration = 'Days_' . $duration;
        $requestArray['listingDuration'] = $listing_duration;
        if ($price <= 0) {
            $price = 100.00;
        }
        $requestArray['startPrice'] = round($price);
        $requestArray['buyItNowPrice'] = round($price);
        $requestArray['quantity'] = '1';
        $requestArray['storeCategoryID'] = $storeCategoryId;

        //$requestArray['itemID'] = $detail['ebayid'];
        $requestArray['image1'] = config_item('base_url') . $diamondpic;



        if ($detail['ebayid'] != '-1' || $detail['ebayid'] == '-2') {
            if (!empty($diamondpic)) {
                $itemID = $this->sendRequestEbay($requestArray, 'qg');
            }
        }
        return $itemID;
    }

    function addEbayCategory($categoryName, $parentCategoryId) {

        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel;
        include_once(config_item('base_path') . 'application/helpers/eBaySession.php');
        include_once(config_item('base_path') . 'application/helpers/keys.php');
        $siteID = 0;

        $verb = 'SetStoreCategories';
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>';
        $requestXmlBody .= '<SetStoreCategoriesRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<RequesterCredentials><eBayAuthToken>' . $userToken . '</eBayAuthToken></RequesterCredentials>';
        $requestXmlBody .= "<Action>Add</Action><DetailLevel>ReturnAll</DetailLevel>";

        // <ItemDestinationCategoryID>14122</ItemDestinationCategoryID>";

        if ($parentCategoryId != '-1') {
            $requestXmlBody .= "<DestinationParentCategoryID>" . $parentCategoryId . "</DestinationParentCategoryID>";
        }

        $requestXmlBody .= "<StoreCategories>";
        $requestXmlBody .= "<CustomCategory>";
        $requestXmlBody .= "<Name>" . $categoryName . "</Name>";
        $requestXmlBody .= "<Order>1</Order>";
        $requestXmlBody .= "</CustomCategory>";

        /*
          $requestXmlBody .= "<CustomCategory>";
          $requestXmlBody .= "<Name>GPS Devices</Name>";
          $requestXmlBody .= "<Order>2</Order>";
          $requestXmlBody .= "</CustomCategory>";
         * 
         */
        $requestXmlBody .= "</StoreCategories>";
        $requestXmlBody .= '</SetStoreCategoriesRequest>';
        //Create a new eBay session with all details pulled in from included keys.php
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);




        /*
          $requestXmlBody = '<setstorecategoriesresponse xmlns="urn:ebay:apis:eBLBaseComponents">
          <timestamp>2012-06-30T05:47:16.165Z</timestamp>
          <ack>Success</ack>
          <version>779</version>
          <build>E779_CORE_BUNDLED_14979379_R1</build>
          <taskid>0</taskid>
          <status>Complete</status>
          <customcategory>
          <customcategory>
          <categoryid>3343910012</categoryid>
          <name>MP3 Players and Accessories</name>
          </customcategory>
          </customcategory>
          </setstorecategoriesresponse>';
         */

        //send the request and get response
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        /*
          echo "<pre>";
          echo $requestXmlBody;
          echo "<hr>";
          echo $responseXml;
          echo "<hr><br>";
         */

        $response = simplexml_load_string($responseXml);
        $action = (string) $response->Ack;
        if (trim($action) == 'Failure') {
            $error = (string) $response->Errors->ShortMessage;
            return -1;
        } else {
            //no errors
            //  $responses = simplexml_load_string($requestXmlBody);            
            $categoryID = (string) $response->CustomCategory->CustomCategory->CategoryID;
            return $categoryID;
        }
    }

    function saveSearchCriteria($post) {
        unset($post['submit_search']);
        $data = serialize($post);
        $sql = "INSERT INTO dev_savesearch (name, search_string, date) VALUES ('" . mysql_real_escape_string($post['search_name']) . "','" . mysql_real_escape_string($data) . "','" . date('Y-m-d H:i:s') . "')";
        $isinsert = $this->db->query($sql);
    }

    function getSaveSearch() {
        $productSql = "SELECT id, name, date FROM dev_savesearch";
        $stullerprodStmt = $this->db->query($productSql);
        $stulerProductsArray = $stullerprodStmt->result_array();
        //echo "<pre>"; print_r($stulerProductsArray);exit;
        return $stulerProductsArray;
    }

    function getSaveSearchData($id) {
        $productSql = "SELECT * FROM dev_savesearch where id =" . $id;
        $stullerprodStmt = $this->db->query($productSql);
        $stulerProductsArray = $stullerprodStmt->result_array();
        //echo "<pre>"; print_r($stulerProductsArray);exit;
        return $stulerProductsArray;
    }

    function savelooseSearchCriteria($post) {
        unset($post['submit_search']);
        $data = serialize($post);
        $sql = "INSERT INTO dev_saveloosesearch (name, search_string, date) VALUES ('" . mysqli_real_escape_string($post['search_name']) . "','" . mysqli_real_escape_string($data) . "','" . date('Y-m-d H:i:s') . "')";
        $isinsert = $this->db->query($sql);
    }

    function getSavelooseSearch($disc="") {
        $productSql = "SELECT * FROM dev_saveloosesearch WHERE 1 = 1";
        if( !empty($disc) ) {
            $productSql .= " AND manufact_name != ''";
        } else {
            $productSql .= " AND manufact_name IS NULL OR manufact_name = ''";
        }
        $stullerprodStmt = $this->db->query($productSql);
        $stulerProductsArray = $stullerprodStmt->result_array();

        return $stulerProductsArray;
    }

    ///// get single row of loose search
    function getSinglelooseSearch($id) {
        $sql_sr = "SELECT id, name, search_string, manufact_name, discount_options FROM dev_saveloosesearch WHERE id = '".$id."' ORDER BY id DESC LIMIT 1";
        $search_filtr = $this->db->query($sql_sr);
        $results = $search_filtr->result_array();

        return $results[0];
    }

    ///// get single row of loose search
    function getLooseFiltersDiscount($amount=0, $market='', $discPercnts='') {
        $sql_sr = "SELECT id, name, search_string, manufact_name, discount_options FROM dev_saveloosesearch WHERE manufact_name != ''";
        if( !empty($market) ) {
            $sql_sr .= " AND manufact_name = '{$market}'";
        }
        $sql_sr .= " ORDER BY id DESC";
        $search_filtr = $this->db->query($sql_sr);
        $results = $search_filtr->result_array();
        
        //$results = $this->adminmodel->getLooseSearchRows($market);
         $discPercent = 0;
        
        if( count($results) > 0 ) {
         foreach($results as $rowloose) { //// get all filters rows set manufacture
             $discoption = unserialize($rowloose['discount_options']);   ///// unserialzie discount option and convert it into simple array
             if( count($discoption['mins_price']) > 0 ) {
                 $i = 0;
                foreach($discoption['mins_price'] as $minsprice) {
                        if( $amount >= $minsprice && $amount <= $discoption['maxs_price'][$i] ) {
                            $discPercent = $discoption['rapnet_discount'][$i];
                            break;
                        }
                    $i++;
                } ///// end discount option foreach loop
             }   /// end if of discount count
           }  //// end loose search foreach
        }
        
        $disc = $discPercent / 100;
        $disc_amount = $amount - ( $amount * $disc );
        
        if( !empty($discPercnts) ) {  /// return the discount percentage according to the amount
            return $discPercent;
        } else {
            return $disc_amount;
        }
    }
    function getSavelooseSearchData($id) {
        $productSql = "SELECT * FROM dev_saveloosesearch where id =" . $id;
        $stullerprodStmt = $this->db->query($productSql);
        $stulerProductsArray = $stullerprodStmt->result_array();

        return $stulerProductsArray;
    }

	function getPendantsWithoutLimit($page = 1, $rp = 10, $sortname = 'lot', $sortorder = 'desc', $query = '', $qtype = 'lot', $id_array = 0, $oid = '', $custom_filter = "") {
		$results = array();
		$custom_filter_string = "";

		if ($custom_filter) {
			foreach ($custom_filter as $key => $value) {
				if ($value == "") {
                } else {
					if ($key == 'color') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND color IN (" . $v . ") ";
                    }
                    if ($key == 'shape') {
                        //echo "-" . $value . "- ";
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND shape IN (" . $v . ") ";
                    }
                    if ($key == 'cut') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND cut IN (" . $v . ") ";
                    }
                    if ($key == 'clarity') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND clarity IN(" . $v . ") ";
                    }
                    if ($key == 'caratmin' && $value != "") {
                        $custom_filter_string.=" AND carat > '" . $value . "' ";
                    }
                    if ($key == 'caratmax' && $value != "") {
                        $custom_filter_string.=" AND carat < '" . $value . "' ";
                    }
                }
            }
        }
        //echo "".$custom_filter_string;


        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = " LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";

        $sort = " ORDER BY re ASC";
        if (($id_array != "") && ($id_array != 0)) {
            $qwhere .= " AND owner in  ($id_array)";
        }

        $sql = "SELECT  *  FROM  " . $this->config->item('table_perfix') . "index WHERE Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P') AND ebayid < 0 " . $qwhere . " " . $custom_filter_string;

        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();

        $sql2 = "SELECT lot FROM  " . $this->config->item('table_perfix') . "index WHERE Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P')  " . $qwhere . " " . $custom_filter_string;
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }

    function getRapnetStonesWithoutLimit($id_array, $page = 1, $rp = 10, $sortname = 'lot', $sortorder = 'desc', $query = '', $qtype = 'lot', $oid = '', $custom_filter = '') {
        $results = array();
        $custom_filter_string = "";
        //var_dump($custom_filter);
        //exit;
        if ($custom_filter) {

            //echo '<pre>';
            //var_dump($custom_filter);
            foreach ($custom_filter as $key => $value) {
                if ($value == "") {
                    
                } else {
                    //echo $key."=>".$value;
                    if ($key == 'color') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND color IN (" . $v . ") ";
                    }
                    if ($key == 'shape') {
                        //echo "-" . $value . "- ";
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND shape IN (" . $v . ") ";
                    }
                    if ($key == 'cut') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND cut IN (" . $v . ") ";
                    }
                    if ($key == 'clarity') {
                        $val = explode(',', $value);
                        $v = implode("','", $val);
                        $v = "'" . $v . "'";
                        $custom_filter_string.=" AND clarity IN(" . $v . ") ";
                    }
                    if ($key == 'caratmin' && $value != "") {
                        $custom_filter_string.=" AND carat > '" . $value . "' ";
                    }
                    if ($key == 'caratmax' && $value != "") {
                        $custom_filter_string.=" AND carat < '" . $value . "' ";
                    }
                }
            }
        }
        //echo "".$custom_filter_string;

        $sort = "ORDER BY $sortname $sortorder";

        $start = (($page - 1) * $rp);

        $limit = "LIMIT $start, $rp";

        $qwhere = "";
        if ($query)
            $qwhere .= " AND $qtype LIKE '%$query%' ";
        if ($oid != '')
            $qwhere .= " AND id = $oid";

        $sort = " ORDER BY re ASC";
        if ($id_array != "")
            $qwhere .= " AND owner in  ($id_array)";

        $sql = "SELECT  *  , (price * carat) as re  FROM  " . $this->config->item('table_perfix') . "index where  Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P') AND ebayid < 0 " . $qwhere . " " . $custom_filter_string . " " . $sort;

        $result = $this->db->query($sql);
        $results['result'] = $result->result_array();

        $sql2 = "SELECT lot FROM  " . $this->config->item('table_perfix') . "index where Cert IN ('GIA','EGL U','EGL I','EGL H','OTHER','EGL P')  " . $qwhere . " " . $custom_filter_string . " ";
        $result2 = $this->db->query($sql2);
        $results['count'] = $result2->num_rows();
        return $results;
    }

	function ezstatusmedit($id, $status){
		if($status == 'disable'){
			$sql = "UPDATE dev_stuller SET ezstatus = false WHERE stuller_id = $id";
			$this->db->query($sql);
		}elseif($status == 'enable'){
			$sql = "UPDATE dev_stuller SET ezstatus = true WHERE stuller_id = $id";
			$this->db->query($sql);
		}
	}

	function ezqualitygoldstatusedit($id, $status){
		if($status == 'disable'){
			$sql = "UPDATE dev_qg SET ezstatus = false WHERE qg_id = $id";
			$this->db->query($sql);
		}elseif($status == 'enable'){
			$sql = "UPDATE dev_qg SET ezstatus = true WHERE qg_id = $id";
			$this->db->query($sql);
		}
	}

	function ezuniquestatusedit($id, $status){
		if($status == 'disable'){
			$sql = "UPDATE dev_us SET ezstatus = false WHERE id = $id";
			$this->db->query($sql);
		}elseif($status == 'enable'){
			$sql = "UPDATE dev_us SET ezstatus = true WHERE id = $id";
			$this->db->query($sql);
		}
	}

	function ezpaymodelcontrol($cata, $status){
		($status == 'enable') ? $st = true : $st = false;
		if($cata == 'stuller'){
			$sql = "UPDATE dev_stuller SET ezstatus = '$st'";
			$this->db->query($sql);
		}elseif($cata == 'quality'){
			$sql = "UPDATE dev_qg SET ezstatus = '$st'";
			$this->db->query($sql);
		}elseif($cata == 'unique'){
			$sql = "UPDATE dev_us SET ezstatus = '$st'";
			$this->db->query($sql);
		}
	}

	function addezvalue($ez3='', $ez5=''){	
		if($ez3 !='' || $ez5 !=''){
			$ez3= trim($ez3);
		    $ez5= trim($ez5);	
			if($ez3 != ''){
				$sql = "UPDATE ezpayvalue SET ezvalue = '$ez3' WHERE eztype = 'ez3' ";
				$this->db->query($sql);
			}
			if($ez5 != ''){
				$sql = "UPDATE ezpayvalue SET ezvalue = '$ez5' WHERE eztype = 'ez5' ";
				$this->db->query($sql);
			} 
		}
	}

	function getezvalue(){
		$sql = "SELECT * FROM ezpayvalue";
		$result = $this->db->query($sql);
		$data=$result->result_array();
		 return $data;
	}

	function getcatamanagerinfo(){
		$sql = 'SELECT DISTINCT `Metal_Desc` FROM `dev_qg`';
		$result = $this->db->query($sql);
		$catain['quality'] = $result->result_array();

		$sql = 'SELECT DISTINCT `MerchandisingCategory1`, `MerchandisingCategory2` FROM `dev_stuller`';
		$result = $this->db->query($sql);
		$catain['stuller'] = $result->result_array();

		$sql = 'SELECT DISTINCT `catname`,`id` FROM `dev_us_catagories`';
		$result = $this->db->query($sql);
		$catain['unique'] = $result->result_array();

$catain['test'] = 'test';

		return $catain;
	}

	function setcatamanagersta($cata,$cata2,$cata3, $status){
		($status == 'enable') ? $st = true : $st = false;
		if($cata == 'stuller'){
			$sql = "UPDATE dev_stuller SET ezstatus = '$st' WHERE MerchandisingCategory1 LIKE '%$cata2%' and MerchandisingCategory2 LIKE '%$cata3%'";
			$this->db->query($sql);
		}elseif($cata == 'quality'){
			$sql = "UPDATE dev_qg SET ezstatus = '$st' WHERE Metal_Desc LIKE '%$cata2%'";
			$this->db->query($sql);
		}elseif($cata == 'unique'){
			$sql = "UPDATE dev_us SET ezstatus = '$st' WHERE catid LIKE '%$cata2%'";
			$this->db->query($sql);
		}
	}
	
	function getcustomerDetailforIContact($custid){
		$results = array();
		$select = "SELECT * FROM ".$this->config->item('table_perfix') . "customerinfo JOIN ".$this->config->item('table_perfix') . "shippinginfo ON dev_shippinginfo.customerid=dev_customerinfo.id WHERE dev_shippinginfo.customerid=".$custid;
		$result = $this->db->query($select);
		$row = $result->row();
		return $row;
	}

	function getorderinfo($id){
		$select = "SELECT * FROM ".$this->config->item('table_perfix') . "order WHERE id = ".$id;
    	$result = $this->db->query($select);
    	$results = $result->result_array();
    	return $results[0]['preauth'];
	}

	function getDetailsByLot($lotid,$orderid) {
		$qry = "SELECT * FROM ".$this->config->item('table_perfix')."orderdetails WHERE orderid = '".$orderid."' AND lot = '".$lotid."'"; 

		$result = $this->db->query($qry);
		$shippinginfo = $result->result_array();
		return isset($shippinginfo[0]) ? $shippinginfo[0] : false;
 	}

	function getfilterprice(){
		$sql = "SELECT * FROM dev_price_filter";
		$result = $this->db->query($sql);
		$data=$result->result_array();
		 return $data['0']['price'];
	}

	function editfilterprice($price){
		$sql = "update dev_price_filter set price='".$price."'";
		 $this->db->query($sql);
	}

	function loosediamonds($post, $action = 'view', $id = 0) {
		$retuen = array();
		$retuen['error'] = '';
		$retuen['success'] = '';
		$postedCategory=isset($_POST['category'])?$_POST['category']:'';
		if($action!='delete'){
			if (is_array($post)) {
				$action = '';
				$details = $this->getPendantById($id);
				$GetResponse = $this->addLosseDiamondsToEbay($details[0], 30, $type, '-1');
				if (isset($GetResponse) && !empty($GetResponse)) {
					$retuen['response'] = $GetResponse;
					$retuen["success"] = "Item Successfully Update on eBay";
				} else {
					echo $GetResponse;die;
					$retuen["success"] = $GetResponse;
				}
			}
		}
		return $retuen;
	}
	
	function loosediamondsii($post, $action = 'view', $id = 0) {
		$retuen = array();
		$retuen['error'] = '';
		$retuen['success'] = '';
		$postedCategory = isset($_POST['category'])?$_POST['category']:'';
		if($action!='delete'){
			if (is_array($post)) {
				$action = '';
				$details = $this->getPendantById($id);
				$GetResponse = $this->addLosseDiamondsIIToEbay($details[0], 30, $type, '-1');
				if (isset($GetResponse) && !empty($GetResponse)) {
					$retuen['response'] = $GetResponse;
					$retuen["success"] = "Item Successfully Update on eBay";
				} else {
					echo $GetResponse;die;
					$retuen["success"] = $GetResponse;
				}
			}
		}
		return $retuen;
	}
	
	function addLosseDiamondsIIToEbay($detail, $duration, $type, $index){
		$duration = 30;
		$destFolder = 'images/loosepictures/';
		$detail['Meas'] = str_replace("-", "x", $detail['Meas']);
		list($w, $b, $h) = explode("*", $detail['Meas']);
		$detail['Meas'] = $w . " x " . $b . " x " . $h;
		switch ($detail['shape']) {
			case 'R':
				$shape = 'round';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'Pr':
				$shape = 'princess';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'R':
				$shape = 'radiant';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';    // '2395095015';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'E':
				$shape = 'emerald';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'AS':
				$shape = 'asscher';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'O':
				$shape = 'oval';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'M':
				$shape = 'marquise';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'P':
				$shape = 'pear';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'H':
				$shape = 'heart';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'C':
				$shape = 'cushion';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			case 'Cushion Modified':
				$shape = 'cushion';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
				break;
			default:
				$shape = $detail['shape'];
				$storeCategoryId = '4946247016';
				$requestArray['primaryCategory'] = '164306';
				break;
		}
		switch ($detail['Polish']) {
			case 'VG':
				$polish = 'Very Good';
				break;
			case 'G':
				$polish = 'Good';
				break;
			case 'EX':
				$polish = 'Excellent';
				break;
			case 'ID':
				$polish = 'Ideal';
				break;
			default:
				$polish = $detail['Polish'];
				break;
		}
		switch ($detail['Sym']) {
			case 'VG':
				$sym = 'Very Good';
				break;
			case 'G':
				$sym = 'Good';
				break;
			case 'EX':
				$sym = 'Excellent';
				break;
			case 'ID':
				$sym = 'Ideal';
				break;
			case 'P':
				$sym = 'Premium';
				break;
			default:
				$sym = $detail['Sym'];
				break;
		}
		$detail['carat'] = number_format($detail['carat'], 2);
		if (trim($detail['Cert']) == 'GIA') {
			$requestArray['itemTitle'] = $detail['carat'] . ' CT ' . strtoupper($shape) . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND! GIA! ' . $detail['Meas'] . ' MM!';
		} elseif (trim($detail['Cert']) == 'EGL U') {
			$requestArray['itemTitle'] = $detail['carat'] . ' CT ' . strtoupper($shape) . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND! EGL' . ' ' . $detail['Country'] . '! ' . $detail['Meas'] . ' MM!';
		} else {
			$requestArray['itemTitle'] = $detail['carat'] . ' CT ' . strtoupper($shape) . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND! EGL! ' . $detail['Meas'] . ' MM!';
		}
        if ($detail['color'] == 'D') {
            $color = $detail['color'] . ' (colorless)';
        } elseif ($detail['color'] == 'E') {
            $color = $detail['color'] . ' (colorless)';
        } elseif ($detail['color'] == 'F') {
            $color = $detail['color'] . ' (colorless)';
        } elseif ($detail['color'] == 'G') {
            $color = $detail['color'] . ' (very white)';
        } elseif ($detail['color'] == 'H') {
            $color = $detail['color'] . ' (white)';
        } elseif ($detail['color'] == 'I') {
            $color = $detail['color'] . ' (white)';
        } elseif ($detail['color'] == 'J') {
            $color = $detail['color'] . ' (white face up)';
        } else {
            $color = $detail['color'];
        }
        if (isset($detail['cut']) && !empty($detail['cut'])) {
            $cut = trim($detail['cut']) . "&nbsp;Cut!";
        } else {
            $cut = '';
        }
        if (empty($detail['certimage'])) {
            $sql = "SELECT cert_img FROM " . $this->config->item('table_perfix') . "cert  WHERE cert_name = '" . $detail['Cert'] . "'";
            $query = $this->db->query($sql);
            $result = $query->result_array();
			if(count($result)>0){
				$detail['certimage'] = config_item('base_url') . $result[0]['cert_img'];
			} 
        } else {
            $detail['certimage'] = $detail['certimage'];
        }
        if ($detail['clarity'] == 'SI1' || $detail['clarity'] == 'SI2') {
            $clarityRange = $detail['clarity'] . ' (clean to the naked eye)';
        }
        if ($detail['clarity'] == 'FL' || $detail['clarity'] == 'IF') {
            if ($detail['clarity'] == 'IF') {
                $clarityRange = $detail['clarity'] . ' (internally flawless)';
            } else {
                $clarityRange = $detail['clarity'] . ' (flawless)';
            }
        }
        if ($detail['clarity'] == 'VS1' || $detail['clarity'] == 'VS2') {
            $clarityRange = $detail['clarity'] . ' (very clean under 10x magnification; clean to the naked eye)';
        }
        if ($detail['clarity'] == 'VVS1' || $detail['clarity'] == 'VVS2') {
            $clarityRange = $detail['clarity'] . ' (completely clean under 10x magnification; clean to the naked eye)';
        }
        if ($detail['clarity'] == 'I1' || $detail['clarity'] == 'I3') {
            $clarityRange = $detail['clarity'];
        }
        if ($detail['clarity'] == 'SI3') {
            $clarityRange = $detail['clarity'];
        }
        if (empty($clarityRange)) {
            $clarityRange = $detail['clarity'];
        }
        if ($detail['carat'] <= '0.29') {
            $caratRange = ' 0.29 &amp; Under';
        }
        if ($detail['carat'] <= '0.45' && $detail['carat'] >= '0.30') {
            $caratRange = ' 0.30 - 0.45';
        }
        if ($detail['carat'] <= '0.69' && $detail['carat'] >= '0.46') {
            $caratRange = ' 0.46 - 0.69';
        }
        if ($detail['carat'] <= '0.89' && $detail['carat'] >= '0.70') {
            $caratRange = ' 0.70 - 0.89';
        }
        if ($detail['carat'] <= '1.39' && $detail['carat'] >= '0.90') {
            $caratRange = ' 0.90 - 1.39';
        }
        if ($detail['carat'] <= '1.79' && $detail['carat'] >= '1.40') {
            $caratRange = ' 1.40 - 1.79';
        }
        if ($detail['carat'] <= '2.79' && $detail['carat'] >= '1.80') {
            $caratRange = ' 1.80 - 2.79';
        }
        if ($detail['carat'] >= '2.80') {
            $caratRange = ' 2.80 &amp; Larger';
        }
        if ($detail['Cert'] != 'GIA') {
            // $detail['Cert'] = 'EGL';
        }
        $requestArray['listingType'] = 'FixedPriceItem';
        $requestArray['productID'] = $detail['lot'];
        $price = round($detail['price'] * $detail['carat']);
        $qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
        $result = $this->db->query($qry);
        $pret = $result->result_array();
        $rate = $pret[0]['rate'];
        if (!isset($rate) || empty($rate)) {
            $rate = 1;
        }
        if ($type == 'pendants') {
            $price = round($price * $rate);
        } else {
			$price = number_format($detail['our_price'], 2);
        }
		if($detail['category']=="accent"){
			$dn = $detail['side_stone_count'];
		} else {
			$dn = '1';
		}
        $retail_price = round($price * 1.65);
        $watchdetails = '';
		$final_price = $detail['price'];
        if (trim($detail['Cert']) == 'GIA') {
            $link = "https://myapps.gia.edu/ReportCheckPortal/getReportData.do?&reportno=" . $detail['Cert_n'] . "&weight=" . $detail['carat'];
            if ($type == 'pendants') {
                $flag = '&nbsp;100% DIAMOND!&nbsp;';
            } else {
                $flag = '&nbsp;DIAMOND ENGAGEMENT RING!&nbsp;';
            }
            $watchdetails = '<link rel="stylesheet" type="text/css" href="'.config_item('base_url').'/ebaystore/style.css" />';
			$watchdetails .= '<div class="wrapper">
				<div id="main-body-bg">
					<!-- Header Start here -->
					<div id="header">
						<h3 id="cus">CUSTOMER SERVICE: 212-840-7680</h3>
						<div id="logo"><a href="#"><img src="'.config_item('base_url').'/images/logo.png" /></a></div>
						<h3 id="ctr">'.$detail['carat'].' CT '.$requestArray['itemTitle'].' </h3>
						<img id="ring" src="'.config_item('base_url').$destFolder.$shape.'.jpg"  style="margin:-14px 0 0 350px;max-height:312px;" />
					</div><!-- header end here-->
					<!-- Header End here -->
					<!-- Home Content Start here -->     
					<div id="main">
						<div id="main-left">
							<h2 class="title">PRODUCT DETAILS</h2>
							<div id="p-1">
								<p class="gem">GEM TYPE: <br /> CUT: <br /> COLOR: <br /> CLARITY: <br /> NUMBER OF DIAMONDS: <br /> GRAM WEIGHT: <br /> ESTIMATED RETAIL PRICE: </p>
							</div><!--P-1 END -->
							<div id="p-2">
								<p class="gem-2"> Diamond ('.$detail['lot'].') <br /> '.$cut.' <br /> '.$color.' <br /> '.$detail['clarity'].' <br /> 1 <br /> '.$detail['carat_weight'].' GRAMS <br /> $'.$final_price.' </p>
							</div><!-- P-2 END -->
						</div><!--MAIN-LEFT END HERE-->
						<!--<div id="main-right">
							<img id="img" src="'.config_item('base_url').'ebaystore/images/img-1.jpg" /> 
							<h3 id="inc"> Included with your purchase: </h3>
							<h4 class="ful"><a href="javascript:void(0);">Fully insured shipping</a></h4> 
							<h4 class="ful"><a href="javascript:void(0);">A complimentary jewelry packaging </a></h4>
							<h4 class="ful"><a href="javascript:void(0);">14 day money back guarantee</a></h4>
						</div>--><!--main right end -->
					</div><!--main end here-->    
					<!-- Home Content End here -->
					<!-- Footer Start here -->                             
					<div id="footer">
						<h2 class="title-2">PRODUCT DESCRIPTION</h2>
					</div><!-- Footer End here -->
				</div><!--main-body-bg end here-->
			</div><!--wrapper end here-->';
		}else{
			$watchdetails .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>ZKOR DIAMONDS</title>
					<link rel="stylesheet" type="text/css" href="'.config_item('base_url').'ebaystore/style.css" />
				</head>
				<body>
					<div class="wrapper">
						<div id="main-body-bg">
							<!-- Header Start here -->
							<div id="header">
								<h3 id="cus">CUSTOMER SERVICE: 212-840-7680</h3>
								<div id="logo"><a href="javascript:void(0);"><img src="'.config_item('base_url').'/images/logo.png" /></a></div>
								<h3 id="ctr">'.$requestArray['itemTitle'].'</h3>
								<img id="ring" src="'.config_item('base_url').$destFolder.$shape.'.jpg"  style="margin:-14px 0 0 350px;max-height:312px;" />
							</div>
							<!-- Header End here -->
							<!-- Home Content Start here -->
							<div id="main">
								<div id="main-left">
									<h2 class="title">PRODUCT DETAILS</h2>
									<div id="p-1">
										<p class="gem" style="width:500px">GEM TYPE: <br />
										CUT: <br />
										COLOR: <br />
										SHAPE: <br />
										CLARITY: <br />
										METAL TYPE:<br /> 
										NUMBER OF DIAMONDS: <br />
										ESTIMATED RETAIL PRICE: </p>
									</div>
									<!--P-1 END -->
									<div id="p-2">
										<p class="gem-2"> Diamond<br />
										'.$detail['cut'].' <br />
										'.$color.' <br />
										'.$this->get_shape($detail['lot']).' <br />
										'.$detail['clarity'].' <br />
										14k White Gold<br />
										'.$dn.' <br />
										$'.$final_price.' </p>
									</div>
									<!-- P-2 END -->
								</div>
								<!--MAIN-LEFT END HERE-->
								<!--<div id="main-right"> <img id="img" src="'.config_item('base_url').'ebaystore/images/img-1.jpg" />
								<h3 id="inc"> Included with your purchase: </h3>
								<h4 class="ful"><a href="javascript:void(0);">Fully insured shipping</a></h4>
								<h4 class="ful"><a href="javascript:void(0);">A complimentary jewelry packaging </a></h4>
								<h4 class="ful"><a href="javascript:void(0);">14 day money back guarantee</a></h4>
								</div>-->
								<!--main right end -->
							</div>
							<!--main end here-->
							<!-- Home Content End here -->
							<!-- Footer Start here -->
							<div id="footer">
								<h2 class="title-2">PRODUCT DESCRIPTION</h2>
								<p id="para">'.$detail['description'].'</br>'.$pd.'</br>'.$pd1.'</p>
							</div>
							<!-- Footer End here -->
						</div>
						<!--main-body-bg end here-->
					</div>
					<!--wrapper end here-->
				</body>
			</html>';
		}
        if (get_magic_quotes_gpc()) {
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }
        if ($type == 'pendants') {
            $requestArray['ItemSpecification'] = $this->getItemSpecificationpii($detail);
        } else {
            $type = "rapnet";
            $requestArray['ItemSpecification'] = $this->getItemSpecificationii($detail);
        }
        $requestArray['AttributeArray'] = $this->get_attribute($detail);
        $listing_duration = 'Days_' . $duration;
        $requestArray['listingDuration'] = $listing_duration;
        $requestArray['startPrice'] = "".$detail['price']."";
        $requestArray['buyItNowPrice'] = "".$detail['price']."";
        $requestArray['quantity'] = '1';
        $requestArray['storeCategoryID'] = $storeCategoryId;
        $requestArray['itemID'] = $detail['ebayid'];
		$destFolder = 'images/loosepictures/';
		$requestArray['image1'] = config_item('base_url').$destFolder.$shape.'.jpg';
        if ($detail['ebayid'] != '-1' || $detail['ebayid'] == '-2') {
			$itemID = $this->sendIIRequestEbay($requestArray, $type, $detail['category']);
			return $itemID;
		    if (!empty($diamondpic)) {
				 return $itemID;
            }
        }
	}

	function addLosseDiamondsToEbay($detail, $duration, $type, $index){
		$duration = 30;
		$destFolder = 'images/loosepictures/';
		$detail['Meas'] = str_replace("-", "x", $detail['Meas']);
		list($w, $b, $h) = explode("*", $detail['Meas']);
		$detail['Meas'] = $w . " x " . $b . " x " . $h;
		switch ($detail['shape']) {
			case 'R':
				$shape = 'round';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'Pr':
				$shape = 'princess';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'R':
				$shape = 'radiant';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'E':
				$shape = 'emerald';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'AS':
				$shape = 'asscher';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'O':
				$shape = 'oval';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'M':
				$shape = 'marquise';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'P':
				$shape = 'pear';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'H':
				$shape = 'heart';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'C':
				$shape = 'cushion';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			case 'Cushion Modified':
				$shape = 'cushion';
				if ($detail['Cert'] == 'GIA') {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				} else {
					$storeCategoryId = '4946247016';
					$requestArray['primaryCategory'] = '152899';
				}
			break;
			default:
				$shape = $detail['shape'];
				$storeCategoryId = '4946247016';
				$requestArray['primaryCategory'] = '164306';
			break;
		}

		switch ($detail['Polish']) {
			case 'VG':
				$polish = 'Very Good';
			break;
			case 'G':
				$polish = 'Good';
			break;
			case 'EX':
				$polish = 'Excellent';
			break;
			case 'ID':
				$polish = 'Ideal';
			break;
			default:
				$polish = $detail['Polish'];
			break;
		}

		switch ($detail['Sym']) {
			case 'VG':
				$sym = 'Very Good';
			break;
			case 'G':
				$sym = 'Good';
			break;
			case 'EX':
				$sym = 'Excellent';
			break;
			case 'ID':
				$sym = 'Ideal';
			break;
			case 'P':
				$sym = 'Premium';
			break;
			default:
				$sym = $detail['Sym'];
			break;
		}

		$detail['carat'] = number_format($detail['carat'], 2);
		if (trim($detail['Cert']) == 'GIA') {
			$requestArray['itemTitle'] = $detail['carat'] . ' CT ' . strtoupper($shape) . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND! GIA! ' . $detail['Meas'] . ' MM!';
		} elseif (trim($detail['Cert']) == 'EGL U') {
			$requestArray['itemTitle'] = $detail['carat'] . ' CT ' . strtoupper($shape) . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND! EGL' . ' ' . $detail['Country'] . '! ' . $detail['Meas'] . ' MM!';
		} else {
			$requestArray['itemTitle'] = $detail['carat'] . ' CT ' . strtoupper($shape) . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND! EGL! ' . $detail['Meas'] . ' MM!';
		}

		if ($detail['color'] == 'D') {
			$color = $detail['color'] . ' (colorless)';
		} elseif ($detail['color'] == 'E') {
			$color = $detail['color'] . ' (colorless)';
		} elseif ($detail['color'] == 'F') {
			$color = $detail['color'] . ' (colorless)';
		} elseif ($detail['color'] == 'G') {
			$color = $detail['color'] . ' (very white)';
		} elseif ($detail['color'] == 'H') {
			$color = $detail['color'] . ' (white)';
		} elseif ($detail['color'] == 'I') {
			$color = $detail['color'] . ' (white)';
		} elseif ($detail['color'] == 'J') {
			$color = $detail['color'] . ' (white face up)';
		} else {
			$color = $detail['color'];
		}

		if (isset($detail['cut']) && !empty($detail['cut'])) {
			$cut = trim($detail['cut']) . "&nbsp;Cut!";
		} else {
			$cut = '';
		}

		if (empty($detail['certimage'])) {
			$sql = "SELECT cert_img FROM " . $this->config->item('table_perfix') . "cert  WHERE cert_name = '" . $detail['Cert'] . "'";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			if(count($result)>0){
				$detail['certimage'] = config_item('base_url') . $result[0]['cert_img'];
			} 
		} else {
			$detail['certimage'] = $detail['certimage'];
		}

		if ($detail['clarity'] == 'SI1' || $detail['clarity'] == 'SI2') {
			$clarityRange = $detail['clarity'] . ' (clean to the naked eye)';
		}
		if ($detail['clarity'] == 'FL' || $detail['clarity'] == 'IF') {
			if ($detail['clarity'] == 'IF') {
				$clarityRange = $detail['clarity'] . ' (internally flawless)';
			} else {
				$clarityRange = $detail['clarity'] . ' (flawless)';
			}
		}
		if ($detail['clarity'] == 'VS1' || $detail['clarity'] == 'VS2') {
			$clarityRange = $detail['clarity'] . ' (very clean under 10x magnification; clean to the naked eye)';
		}

		if ($detail['clarity'] == 'VVS1' || $detail['clarity'] == 'VVS2') {
			$clarityRange = $detail['clarity'] . ' (completely clean under 10x magnification; clean to the naked eye)';
		}
		if ($detail['clarity'] == 'I1' || $detail['clarity'] == 'I3') {
			$clarityRange = $detail['clarity'];
		}

		if ($detail['clarity'] == 'SI3') {
			$clarityRange = $detail['clarity'];
		}

		if (empty($clarityRange)) {
			$clarityRange = $detail['clarity'];
		}

		if ($detail['carat'] <= '0.29') {
			$caratRange = ' 0.29 &amp; Under';
		}
		if ($detail['carat'] <= '0.45' && $detail['carat'] >= '0.30') {
			$caratRange = ' 0.30 - 0.45';
		}
		if ($detail['carat'] <= '0.69' && $detail['carat'] >= '0.46') {
			$caratRange = ' 0.46 - 0.69';
		}
		if ($detail['carat'] <= '0.89' && $detail['carat'] >= '0.70') {

			$caratRange = ' 0.70 - 0.89';
		}
		if ($detail['carat'] <= '1.39' && $detail['carat'] >= '0.90') {
			$caratRange = ' 0.90 - 1.39';
		}
		if ($detail['carat'] <= '1.79' && $detail['carat'] >= '1.40') {
			$caratRange = ' 1.40 - 1.79';
		}
		if ($detail['carat'] <= '2.79' && $detail['carat'] >= '1.80') {
			$caratRange = ' 1.80 - 2.79';
		}
		if ($detail['carat'] >= '2.80') {
			$caratRange = ' 2.80 &amp; Larger';
		}

		if ($detail['Cert'] != 'GIA') {
			// $detail['Cert'] = 'EGL';
		}
		$requestArray['listingType'] = 'FixedPriceItem';//'StoresFixedPrice'; 
	
		$requestArray['productID'] = $detail['lot'];
		$price = round($detail['price'] * $detail['carat']);
		$qry = "SELECT rate FROM " . config_item('table_perfix') . "helix_prices WHERE pricefrom <= '$price'  and  priceto > '$price' ORDER BY pricefrom ASC LIMIT 0,1";
		$result = $this->db->query($qry);
		$pret = $result->result_array();
		$rate = $pret[0]['rate'];
		if (!isset($rate) || empty($rate)) {
			$rate = 1;
		}
		if ($type == 'pendants') {
			$price = round($price * $rate);
		} else {
			$price = number_format($detail['our_price'], 2);
		}
		if($detail['category']=="accent"){
			$dn = $detail['side_stone_count'];
		} else {
			$dn = '1';
		}

		$retail_price = round($price * 1.65);
		$watchdetails = '';
		$final_price = $detail['price'];

		if (trim($detail['Cert']) == 'GIA') {
			$link = "https://myapps.gia.edu/ReportCheckPortal/getReportData.do?&reportno=" . $detail['Cert_n'] . "&weight=" . $detail['carat'];
			if ($type == 'pendants') {
				$flag = '&nbsp;100% DIAMOND!&nbsp;';
			} else {
				$flag = '&nbsp;DIAMOND ENGAGEMENT RING!&nbsp;';
			}
			$watchdetails = '<link rel="stylesheet" type="text/css" href="'.config_item('base_url').'/ebaystore/style.css" />';
			$watchdetails .= '<div class="wrapper">
			<div id="main-body-bg">
				<!-- Header Start here -->
				<div id="header">
					<h3 id="cus">CUSTOMER SERVICE: 212-840-7680</h3>
					<div id="logo"><a href="#"><img src="'.config_item('base_url').'/images/logo.png" /></a></div>
					<h3 id="ctr">'.$detail['carat'].' CT '.$requestArray['itemTitle'].' </h3>
					<img id="ring" src="'.config_item('base_url').$destFolder.$shape.'.jpg"  style="margin:-14px 0 0 350px;max-height:312px;" />
				</div><!-- header end here-->
				<!-- Header End here -->
				<!-- Home Content Start here -->     
				<div id="main">
					<div id="main-left">
						<h2 class="title">PRODUCT DETAILS</h2>
						<div id="p-1">
							<p class="gem">GEM TYPE: <br /> CUT: <br /> COLOR: <br /> CLARITY: <br /> NUMBER OF DIAMONDS: <br /> GRAM WEIGHT: <br /> ESTIMATED RETAIL PRICE: </p>
						</div><!--P-1 END --> <div id="p-2">
							<p class="gem-2"> Diamond ('.$detail['lot'].') <br /> '.$cut.' <br /> '.$color.' <br /> '.$detail['clarity'].' <br /> 1 <br /> '.$detail['carat_weight'].' GRAMS <br /> $'.$final_price.' </p>
						</div><!-- P-2 END -->
					</div><!--MAIN-LEFT END HERE-->
					<!--<div id="main-right">
						<img id="img" src="'.config_item('base_url').'ebaystore/images/img-1.jpg" /> 
						<h3 id="inc"> Included with your purchase: </h3>
						<h4 class="ful"><a href="javascript:void(0);">Fully insured shipping</a></h4> 
						<h4 class="ful"><a href="javascript:void(0);">A complimentary jewelry packaging </a></h4>
						<h4 class="ful"><a href="javascript:void(0);">14 day money back guarantee</a></h4>
					</div>--><!--main right end -->
				</div><!--main end here-->    
				<!-- Home Content End here -->
				<!-- Footer Start here -->                             
				<div id="footer">
					<h2 class="title-2">PRODUCT DESCRIPTION</h2>
				</div><!-- Footer End here -->
			</div><!--main-body-bg end here-->
		</div><!--wrapper end here-->';
		}else{
			$watchdetails .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>ZKOR DIAMONDS</title>
			<link rel="stylesheet" type="text/css" href="'.config_item('base_url').'ebaystore/style.css" />
			</head>
			<body>
			<div class="wrapper">
			<div id="main-body-bg">
			<!-- Header Start here -->
			<div id="header">
			<h3 id="cus">CUSTOMER SERVICE: 212-840-7680</h3>
			<div id="logo"><a href="javascript:void(0);"><img src="'.config_item('base_url').'/images/logo.png" /></a></div>
			<h3 id="ctr">'.$requestArray['itemTitle'].'</h3>
			<img id="ring" src="'.config_item('base_url').$destFolder.$shape.'.jpg"  style="margin:-14px 0 0 350px;max-height:312px;" /> </div>
			<!-- Header End here -->
			<!-- Home Content Start here -->
			<div id="main">
			<div id="main-left">
			<h2 class="title">PRODUCT DETAILS</h2>
			<div id="p-1">
			<p class="gem" style="width:500px">GEM TYPE: <br />
			CUT: <br />
			COLOR: <br />
			SHAPE: <br />
			CLARITY: <br />
			METAL TYPE:<br /> 
			NUMBER OF DIAMONDS: <br />
			ESTIMATED RETAIL PRICE: </p>
			</div>
			<!--P-1 END -->
			<div id="p-2">
			<p class="gem-2"> Diamond<br />
			'.$detail['cut'].' <br />
			'.$color.' <br />
			'.$this->get_shape($detail['lot']).' <br />
			'.$detail['clarity'].' <br />
			14k White Gold<br />
			'.$dn.' <br />
			$'.$final_price.' </p>
			</div>
			<!-- P-2 END -->
			</div>
			<!--MAIN-LEFT END HERE-->
			<!--<div id="main-right"> <img id="img" src="'.config_item('base_url').'ebaystore/images/img-1.jpg" />
			<h3 id="inc"> Included with your purchase: </h3>
			<h4 class="ful"><a href="javascript:void(0);">Fully insured shipping</a></h4>
			<h4 class="ful"><a href="javascript:void(0);">A complimentary jewelry packaging </a></h4>
			<h4 class="ful"><a href="javascript:void(0);">14 day money back guarantee</a></h4>
			</div>-->
			<!--main right end -->
			</div>
			<!--main end here-->
			<!-- Home Content End here -->
			<!-- Footer Start here -->
			<div id="footer">
			<h2 class="title-2">PRODUCT DESCRIPTION</h2>
			<p id="para">'.$detail['description'].'</br>'.$pd.'</br>'.$pd1.'</p>
			</div>
			<!-- Footer End here -->
			</div>
			<!--main-body-bg end here-->
			</div>
			<!--wrapper end here-->
			</body>
			</html>';
		}
		if (get_magic_quotes_gpc()) {
			$requestArray['itemDescription'] = stripslashes($watchdetails);
		} else {
			$requestArray['itemDescription'] = $watchdetails;
		}

		if ($type == 'pendants') {
			$requestArray['ItemSpecification'] = $this->getItemSpecificationp($detail);
		} else {
			$type = "rapnet";
			$requestArray['ItemSpecification'] = $this->getItemSpecification($detail);
		}

		$requestArray['AttributeArray'] = $this->get_attribute($detail);
		$listing_duration = 'Days_' . $duration;
		$requestArray['listingDuration'] = $listing_duration;
		$requestArray['startPrice'] = "".$detail['price']."";
		$requestArray['buyItNowPrice'] = "".$detail['price']."";
		$requestArray['quantity'] = '1';
		$requestArray['storeCategoryID'] = $storeCategoryId;
		$requestArray['itemID'] = $detail['ebayid'];
		$destFolder = 'images/loosepictures/';
		$requestArray['image1'] = config_item('base_url').$destFolder.$shape.'.jpg';

		if ($detail['ebayid'] != '-1' || $detail['ebayid'] == '-2') {
			$itemID = $this->sendRequestEbay($requestArray, $type, $detail['category']);
			return $itemID;

			if (!empty($diamondpic)) {
				return $itemID;
			}
		}
	}

    function get_diamond_img_src($v=array(), $diamond_shape='') {
        $imgColsValue = '';
        if( !empty($v['image_path']) ) {
            if( getimagesize($v['image_path']) ) {
                $imgColsValue = $v['image_path'];
            } else {
                $imgColsValue = $this->getColorImgColmn($v['fancy_color'], $diamond_shape);
            }                
        } else {
            $imgColsValue = $this->getColorImgColmn($v['fancy_color'], $diamond_shape);
        }

        return $imgColsValue;
    }

    // Data insert into any table
	function insert_into_any_table($data, $table_name){
		// Inserting in Table (customer) 
		$this->db->insert($table_name, $data);

		$insert_id = $this->db->insert_id();
   		return  $insert_id;
	}

	// Data count from any table
	function count_any_table($where, $table_name){
		$this->db->where($where);
	    $this->db->from($table_name);

	    return $this->db->count_all_results();
	}

	// Data get from without where any table
	function getdata_any_table($table_name){
		$this->db->select('*');
		$this->db->from($table_name);
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_orderby($table_name, $order){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($order, 'ASC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_orderby_desc($table_name, $order){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->order_by($order, 'DESC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_where_orderby_desc($where, $table_name, $order){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->order_by($order, 'DESC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_limit_order_where($table_name, $where, $limit, $offset, $order){
		$this->db->select('*');

		/*if($table_name=='post_info'){
			$this->db->order_by('p_id', 'RANDOM');
		}else{
			$this->db->where($where);
		}*/
		$this->db->where($where);  

		$this->db->from($table_name);
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, 'ASC');
		$query = $this->db->get();

		//echo $this->db->last_query();
		
	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

       // Data get from without where any table
	function getdata_any_table_limit_order_where_like($table_name, $where, $limit, $offset, $order, $like_key, $like){

		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
        $this->db->like($like_key,$like); 
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, 'ASC');
		$query = $this->db->get();

		//echo $this->db->last_query();exit();
		
	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}


		// Data get from without where any table
	function getdata_any_table_limit_order_by_where($table_name, $where, $limit, $offset, $order, $by){
		$this->db->select('*');
		$this->db->where($where);  
		$this->db->from($table_name);
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $by);
		$query = $this->db->get();

		//echo $this->db->last_query(); exit();
		
	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get from without where any table
	function getdata_any_table_limit_order_by_where_like($table_name, $where, $limit, $offset, $order, $by, $like){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
                $this->db->like('p_title',$like); 
		$this->db->limit($limit, $offset);
		$this->db->order_by($order, $by);
		$query = $this->db->get();

		//echo $this->db->last_query();exit();
		
	    if ( $query->num_rows() > 0 ){
	        return $query->result();
	    }
	}

	// Data get with where from any table
	function getdata_any_table_where($where = '', $table_name){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	    	
	        return $query->result();
	    }
	}

	// Data get with where from any table
	function getdata_any_table_where_orderby($where = '', $table_name, $order){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->from($table_name);
		$this->db->order_by($order, 'ASC');
		$query = $this->db->get();

	    if ( $query->num_rows() > 0 ){
	    	
	        return $query->result();
	    }
	}

	// Data get with where from any table
	function update_any_table($wheredata, $table_name, $id_name, $edited_id){
		$this->db->where($id_name, $edited_id);
		$this->db->update($table_name, $wheredata); 
		return true;
	}

	// Data get with where from any table
	function delete_any_table($table_name, $id_name, $edited_id){
		$this->db->where($id_name, $edited_id);
   		$this->db->delete($table_name); 

		return true;
	}

	function getrapdiamondCashLimit($Climit = 0, $ids = array(), $checkbox_type = '') {
		if ($Climit == 0){
			return false;
        }
        $tbl=$this->config->item('table_perfix') .'rapproduct';
        $response = '';
        $err=FALSE;
        $total = 0;
        $count=0;
        $c = 1;
        if ($checkbox_type == '') {
			foreach ($ids as $row) {
                if( $c%10 == 0 ) { sleep(30); }
				$rs = $this->db->get_where($tbl, array('lot' => $row/*,"ebayid"=>"-2"*/));
				$result = $rs->row_array();
				$total = $total + $result['price'];
				$details = $result;
				$rapnet_details = $this->getRapnetStonesById($row);

				$v = $rapnet_details[0];
				$details[0] = $rapnet_details;
				$shape = $v['shape'];

				$carat = $v['carat'];
				$color = $v['color'];
				$clarity = $v['clarity'];
				$meas = $v['Meas'];
				if(!empty($v['Meas'])){
					list($w,$b,$h) = 	explode("x",$v['Meas']);
					$meas = $w." x ".$b." x ".$h;
				} else {
					$meas = '';
				}

				$diamondsShape = viewDmShape( $v['shape'] );
				$egl_cert = array( 'EGL USA', 'EGL NY', 'EGL ISRAEL' );
				$dmtype = $this->getDiamondType($v['lot']);
				$clarity_enhance = ( $dmtype['clarityresult'] > 0 ? ' Clarity Enhanced ' : '' );
				$getDmShape = viewDmShape($v['shape']);

				if( !empty($v['fancy_color']) ) {
					$color_overton = ( !empty($v['fancy_color_ot']) ? ' ' . $v['fancy_color_ot'] : '' );
					$title = $v['carat'].' CT '.$getDmShape.' '.$v['clarity']. getFancyColorName($v['fancy_color']) . $color_overton . ' Fancy Loose Diamond! '.' '.$v['cert'].'! ';
				} else {
					$title = $v['carat'].' CT '.$getDmShape.' '.$v['color']. ' '.$v['clarity'].' '.$clarity_enhance.'Loose Diamond!'.' '.$v['cert'].'! ';
				}
				$certName = $v['cert'];

				$row['shapeimage'] = $this->getColorImgColmn($v['fancy_color'], $diamondsShape);
				$cert_name = explode(' ', $v['Cert']);
				$sqlcert   = "SELECT cert_img FROM ". $this->config->item('table_perfix')."cert  WHERE cert_name = '".$cert_name[0]."'";
				$querycert = $this->db->query($sqlcert);
				$resultcert = $querycert->result_array();
				$certs_image =  $resultcert[0]['cert_img'];

				$diamondPrice = ( ($v['price'] * $v['carat']) * 6 );
				$imgColsValue = $this->get_diamond_img_src($v, $getDmShape);

				$details = array(
					'lot' => $v['lot'],
					'title' => $title,
					'shape' => $shape,
					'carat' => $carat,
					'color' => $color,
					'clarity' => $clarity,
					'price' => $v['price'],
					'diamond_ourprice' => $diamondPrice,
					'cert' => $v['Cert'],
					'Cert_n' => $v['Cert_n'],
					'depth' => $v['Depth'],
					'table' => $v['TablePercent'],
					'girdle' =>  $v['Girdle'],
					'polish' => $v['Polish'],
					'sym' => $v['sym'],
					'flour' => $v['Flour'], 
					'meas' => $meas,
					'stones' => $v['Stones'],
					'certnum' => $v['Cert_n'],
					'stocknum' => $v['Stock_n'],
					'length' => $v['length'],
					'Comment' => $v['Comment'],
					'country' => $v['suplier_country'],
					'width' => $v['width'],
					'height' => $v['height'],
					'image1' => $imgColsValue,
					'image2' => $imgColsValue,
					'certimage' => $certs_image,
					'bulkitem' => 'bulk_item',
					'editbtn' => 'Continue to Send'
				);
				$GetResponse = $this->addRapnetStoneToeBay($details, 30, 'pendants', '-1');

				if (isset($GetResponse) && !empty($GetResponse)) {
					$count++;
					$response .= "<div style=\"border: 1px solid red;display:block;\">Stock No($row)</br>";
					$response .= $GetResponse."</div>";
				} else {
					$response .="<div style=\"border: 1px solid red;display:block;\">Item Failed to Update on eBay Stock No($row)</div>";
				}
				$c++;
			}
			$response = "<h1>Total " . $count . " diamond(s) added/updated. </h1></br>" . $response;
			return $response;
		}
    }

	function getEngagementrings() {
		$qry = "SELECT * FROM " . config_item('table_perfix') . "engagement_rings ORDER BY id DESC";
        $return = $this->db->query($qry);
        $result['results'] = $return->result_array();
		$result['count'] = count($result['results']);

		return $result;
	}

	function getOvernightmountingProducts() {
		$sql2 = "SELECT stock_number FROM  dev_jewelries  WHERE `vendor_name` LIKE 'Overnight Mountings'";
		$result2 = $this->db->query($sql2);
		$results['count'] = $result2->num_rows();

		return $result;
	}

	function overnightmountingimport($data,$count) {
		if(!empty($data['A'])){
			$imagPath = 'overnightmount/engagement-rings/solitaires-plus';
			$isinsert = $this->db->insert('dev_jewelries', array(
				'ebayid' => '-2',
				'seller_id' => 0,
				'company_id' => 0,
				'category' => !empty($data['H'])?$data['H']:'',
				'subcategory' => !empty($data['I'])?$data['I']:'',
				'subcategory2' => !empty($data['J'])?$data['J']:'',
				'item_title' => !empty($data['A'])?$data['A']:'',
				'vendor_name' => 'Overnight Mountings',
				'vendor_sku' => !empty($data['A'])?$data['A']:'',
				'item_sku' => !empty($data['A'])?$data['A'].'-'.$count:'',
				'price_amazon' => !empty($data['C'])? str_replace("$","",$data['C']):'',
				'price_ebay' => !empty($data['C'])? str_replace("$","",$data['C']):'',
				'price_website' => !empty($data['C'])? str_replace("$","",$data['C']):'',
				'category_type' => 'Overnight Mountings',
				'image1' => !empty($data['U'])?$imagPath.$data['U']:'',
				'image2' => !empty($data['V'])?$imagPath.$data['V']:'',
				'image3' => !empty($data['W'])?$imagPath.$data['W']:'',
				'image4' => !empty($data['X'])?$imagPath.$data['X']:'',
				'image5' => !empty($data['Y'])?$imagPath.$data['Y']:'',
				'image6' => !empty($data['Z'])?$imagPath.$data['Z']:'',
				'metal_type' => !empty($data['D'])?$data['D']:'',
				'metal_color' => !empty($data['E'])?$data['E']:'',
				'finish' => !empty($data['F'])?$data['F']:'',
				'quality' => !empty($data['G'])?$data['G']:'',
				'weight' => !empty($data['K'])?$data['K']:'',
				'description' => !empty($data['L'])?$data['L']:'',
				'approximate_polished_dwt' => !empty($data['M'])?$data['M']:'',
				'components_qty_quality' => !empty($data['N'])?$data['N']:'',
				'semi_mounted' => !empty($data['O'])?$data['O']:'',
				'video1' => !empty($data['R'])?$imagPath.$data['R']:'',
				'video2' => !empty($data['S'])?$imagPath.$data['S']:'',
				'video3' => !empty($data['T'])?$imagPath.$data['T']:'',
				'add_date' => date('Y-m-d'),
			));
		}
	}

}