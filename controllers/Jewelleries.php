<?php
class Jewelleries extends CI_Controller{
	public $getHaloJewleries='Halo Category';
	public $uniqueProd = FALSE;

	function __construct(){
		parent::__construct();
        $this->load->helper("url");
        $this->load->helper("t_helper");
        $this->load->helper('directory');
        $this->load->model("Jewelleriesmodel");
		$this->load->model('Engagementmodel');
		$this->load->model('Jewelrymodel');
		$this->load->model('Sitepaging');
		$this->load->library("pagination");
		$this->session->unset_userdata('whsale_section');
	}

	function getmysubstullerfur($catname=""){
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."jewelleries/getmysubstullerfur/".$catname."/";
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsmysubstullerfur($catname);
		$config["per_page"]=16;
		$config["num_links"]=5;
		$config["uri_segment"] = 5;
		$config['full_tag_open'] = '<div id="pagination" style="color:White">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$data["records"] = $this->Jewelleriesmodel->getminesubstuller($config["per_page"], $this->uri->segment(4),$catname);
		$output = $this->load->view('jewelleries/subsubmystuller', $data, true);
		$this->output($output, $data);
	}

	function allstullerandquantity($status='') {
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."jewelleries/allstullerandquantity/";
		$config["total_rows"]= $this->Jewelleriesmodel->numofrowsallstullerandquantity();
		$config["per_page"]=9;
		$config["num_links"]=3;
		$config["uri_segment"] = 3;
		$seg = 3;
		if(!is_numeric($status)) {
			$seg = 4;
			$config["uri_segment"] = 4;
			$config["base_url"]=config_item('base_url')."jewelleries/allstullerandquantity/".$status."/";
		}

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		//ezvalues
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue'];
		$this->pagination->initialize($config);
		$carat = $_POST['ctweight'];
		$price = $_POST['price'];
		$metal = $_POST['metal'];

		$data["records"] = $this->Jewelleriesmodel->getallstullerandquantity($config["per_page"], $this->uri->segment($seg),$carat,$price,$status);

		$data['clearancelink'] = '<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/allstullerandquantity/Special_Order\';" value="Special Order"/>Special Order</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/allstullerandquantity/Made_To_Order\';" value="Made To Order"/>Made To Order</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/allstullerandquantity/Limited_Availability\';" value="Limited Availability"/>Limited Availability</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/allstullerandquantity/While_supplies_last\';" value="While supplies last"/>While supplies last</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/allstullerandquantity/CloseOut\';" value="CloseOut"/>Closeout</li>';
		$data['mainurl'] = config_item('base_url')."jewelleries/allstullerandquantity/";
		$output = $this->load->view('jewelleries/allstullerandquantity', $data, true);
		$this->output($output, $data);		
	}

	function getmystullerfurwithsub($catname="",$maincat="",$status=""){
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."jewelleries/getmystullerfurwithsub/".$catname."/".$maincat."/";
		$config["total_rows"]= $this->Jewelleriesmodel->numofrowsmystullerfurwithsub($catname);
		$config["per_page"]=18;
		$config["num_links"]=5;
		$config["uri_segment"] = 5;
		$seg = 5;
		if(!is_numeric($status)) {
			$seg = 6;
			$config["uri_segment"] = 6;
			$config["base_url"]=config_item('base_url')."jewelleries/getmystullerfurwithsub/".$catname."/".$maincat."/".$status."/";
		}

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		//ezvalues
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue'];
		$data['sub_catename'] = $catname;

		$this->pagination->initialize($config);

		$carat = $_POST['ctweight'];
		$price = $_POST['price'];
		$metal = $_POST['metal'];
		$perpage_rec = $this->get_vr('off_set');
		$perpage_record = ( $perpage_rec != '' ? $perpage_rec : $config["per_page"]);
		$data['uris_segment'] = ( $this->uri->segment($seg) != '' ? $this->uri->segment($seg) : 0 );
		$data["records"] = $this->Jewelleriesmodel->getminestullerwithsub($perpage_record, $this->uri->segment($seg),$catname,$maincat,$carat,$price,$status);
		$data["max_price"] = $this->Jewelleriesmodel->getminestullerwithsub_max($catname,$maincat);
		$data["max_carat"] = $this->Jewelleriesmodel->getminestullerwithsub_carat($catname,$maincat);
		$data['clearancelink'] = '<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getmystullerfurwithsub/'.$catname.'/'.$maincat.'/Special_Order\';" value="Special Order"/>Special Order</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getmystullerfurwithsub/'.$catname.'/'.$maincat.'/Made_To_Order\';" value="Made To Order"/>Made To Order</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getmystullerfurwithsub/'.$catname.'/'.$maincat.'/Limited_Availability\';" value="Limited Availability"/>Limited Availability</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getmystullerfurwithsub/'.$catname.'/'.$maincat.'/While_supplies_last\';" value="While supplies last"/>While supplies last</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getstullerfur/'.$catname.'/'.$maincat.'/CloseOut\';" value="CloseOut"/>Closeout</li>';

		switch ($maincat){
			case 'Ring':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Ring'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Ring'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Ring'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Rose_Gold/Ring'>14k Rose Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Ring'>14k White Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Two-tone/Ring'>14k Two-tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k-Silver_Two-Tone/Ring'>14k Silver Two-Tone</a></li>";
			break;
			case 'Necklace':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Necklace'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Necklace'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Necklace'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Necklace'>14k_White_Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Two-tone/Necklace'>14k Two-tone</a></li>";
			break;
			case 'Bracelet':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Bracelet'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Bracelet'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Bracelet'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Bracelet'>14k White Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Two-tone/Bracelet'>14k Two-tone</a></li>";
			break;
			case 'Earring':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Earring'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Earring'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Earring'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Rose_Gold/Earring'>14k Rose Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Earring'>14k White Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Earring'>14k Silver Two-Tone</a></li>";
			break;
			case 'Mens':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Mens'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/clearnace/Mens'>clearnace</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Rings/Mens'>Rings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Earrings/Mens'>Earrings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Pendants/Mens'>Pendants</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Necklaces/Mens'>Necklaces</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Braclets/Mens'>Braclets</a></li>";
			break;
		}

		switch ($maincat){
			case 'Ring':		
				$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Ring'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Wedding_Bands/Ring'>Wedding Bands</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Ring'>Diamond Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Ring'>Metal Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Ring'>Mountings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Engagement_And_Anniversary/Ring'>Engagement And Anniversary</a></li>";
			break;
			case 'Necklace':		
				$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Necklace'>Diamond Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Necklace'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Necklace'>Metal Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Necklace'>Mountings</a></li>";
			break;
			case 'Bracelet':		
				$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Bracelet'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Bracelet'>Mountings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Bracelet'>Metal Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Bracelet'>Diamond Fashion</a></li>";
			break;
			case 'Earring':		
				$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Earring'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Earring'>Diamond Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Earring'>Mountings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Earring'>Metal Fashion</a></li>";
			break;
			case 'Mens':		
				$data['stylelink'] = '';
			break;
			case 'watch':		
				$data['stylelink'] = '';
			break;
		}
		$filterp = $this->Jewelleriesmodel->getfilterprice(); 
		$data['filterprice']=$filterp['0']['price'];

		$data ['extraheader'] = '';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/diamondsearch.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/papillon.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript">var qipurl = "' . $url . '";</script>';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/jquery.cookies.2.2.0.min.js"></script>';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/papillon.js"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" />';
		$data ['bodyonload'] = 'initialize()';
		$data ['bodyonunload'] = 'GUnload()';
		$data['cataname'] = $maincat;
		$data['total_records'] = $config["total_rows"];
		$data['perPage']       = $perpage_record;
		$data['base_link']   = $config["base_url"];
		$data['pg_limit']    = $limit;
		$data['breadcrm_style'] = set_title($catname);
		$data['parent_menu'] = $this->getAccordianValue($maincat);
		$data['mainurl'] = config_item('base_url')."jewelleries/getmystullerfurwithsub/";
		$output = $this->load->view('jewelleries/submystullerwithsubnew', $data, true);
		$this->output($output, $data);
	}

	function getAccordianValue($mcate) {
		switch($mcate) {
			case 'Earring':
				$active_accord = 'diamond';
				break;
			case 'Ring':
				$active_accord = 'wedding';
				break;
			case 'Mens':
				$active_accord = 'wedding';
				break;
			case 'Necklace':
				$active_accord = 'pendants';
				break;
			case 'Bracelet':
				$active_accord = 'bracelet';
				break;
			default :
				$active_accord = '';
				break;
		}
		return $active_accord;
	}

	function getmystullerfur($catname=""){
		
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."jewelleries/getmystullerfur/".$catname."/";
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsmystullerfur($catname);
		$config["per_page"]=18;
		$config["num_links"]=5;
		$config["uri_segment"] = 5;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		//ezvalues
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue'];
		$this->pagination->initialize($config);

		$carat = $_POST['ctweight'];
		$price = $_POST['price'];
		$metal = $_POST['metal'];
		$data["records"] = $this->Jewelleriesmodel->getminestuller($config["per_page"], $this->uri->segment(4),$catname,$carat,$price);
		$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Gemstone_Fashion'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Wedding_Bands'>Wedding Bands</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Diamond_Fashion'>Diamond Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Mountings'>Mountings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Metal_Fashion'>Metal_Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Engagement_And_Anniversary'>Engagement And Anniversary</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Findings'>Findings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Fabricated_Metals'>Fabricated Metals</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfur/Functional_Drivers'>Functional Drivers</a></li>";

		$data['cataname'] = $maincat;
		$output = $this->load->view('jewelleries/submystullerwithsubnew', $data, true);
		$this->output($output, $data);
	}

	function getstullerfur($catname="",$maincat,$status=""){
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		
		$data = $this->getCommonData();
		$page_ofset = $this->get_vr('off_set');
		$config["base_url"]=config_item('base_url')."jewelleries/getstullerfur/".$catname."/".$maincat."/";
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsqualityfur($catname);
		$config["per_page"]= ( $page_ofset !='' ? $page_ofset : 18 );
		$config["num_links"]=5;
		$config["uri_segment"] = 5;
		$seg = 5;
		if(!is_numeric($status)) {
			$seg = 6;
			$config["uri_segment"] = 6;
			$viewStatus = ( !empty($status) ? $status.'/' : '');
			$config["base_url"]=config_item('base_url')."jewelleries/getstullerfur/".$catname."/".$maincat."/".$viewStatus;
		}

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);
		$carat = $_POST['ctweight'];
		$price = $_POST['price'];
		$metal = $_POST['metal'];
		$page_offset = $this->uri->segment($seg);
		$pgOffset = ( !empty($page_offset) ? $page_offset : 0 );
		$data["page_offset"] = $pgOffset;
		$data["records"] = $this->Jewelleriesmodel->getAllqualityinfofur($config["per_page"], $this->uri->segment($seg),$catname,$maincat,$carat,$price,$status);
		$data["max_price"] = $this->Jewelleriesmodel->getAllqualityinfofur_max($catname,$maincat);
		$data["max_carat"] = $this->Jewelleriesmodel->getAllqualityinfofur_max_carat($catname,$maincat);
		$filterp = $this->Jewelleriesmodel->getfilterprice(); 
		$data['filterprice']=$filterp['0']['price'];
		$data['main_subcate']=$catname;
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue'];
		$data['clearancelink'] = '<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getmystullerfurwithsub/'.$catname.'/'.$maincat.'/Special_Order\';" value="Special Order"/>Special Order</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getmystullerfurwithsub/'.$catname.'/'.$maincat.'/Made_To_Order\';" value="Made To Order"/>Made To Order</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getmystullerfurwithsub/'.$catname.'/'.$maincat.'/Limited_Availability\';" value="Limited Availability"/>Limited Availability</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getmystullerfurwithsub/'.$catname.'/'.$maincat.'/While_supplies_last\';" value="While supplies last"/>While supplies last</li>'.
		'<li><input type="radio" name="status" onclick="window.location.href = \''.config_item('base_url').'jewelleries/getstullerfur/'.$catname.'/'.$maincat.'/CloseOut\';" value="CloseOut"/>Closeout</li>';

		switch ($maincat){
			case 'Ring':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Ring'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Ring'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Ring'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Rose_Gold/Ring'>14k Rose Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Ring'>14k White Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Two-tone/Ring'>14k Two-tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k-Silver_Two-Tone/Ring'>14k Silver Two-Tone</a></li>";
			break;
			case 'Necklace':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Necklace'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Necklace'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Necklace'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Necklace'>14k_White_Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Two-tone/Necklace'>14k Two-tone</a></li>";
			break;
			case 'Bracelet':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Bracelet'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Bracelet'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Bracelet'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Bracelet'>14k White Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Two-tone/Bracelet'>14k Two-tone</a></li>";
			break;
			case 'Earring':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Earring'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Earring'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Earring'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Rose_Gold/Earring'>14k Rose Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Earring'>14k White Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Earring'>14k Silver Two-Tone</a></li>";
			break;
			case 'Mens':		
				$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Mens'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/clearnace/Mens'>clearnace</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Rings/Mens'>Rings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Earrings/Mens'>Earrings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Pendants/Mens'>Pendants</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Necklaces/Mens'>Necklaces</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Braclets/Mens'>Braclets</a></li>";
			break;
		}

		switch ($maincat){
			case 'Ring':		
				$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Ring'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Wedding_Bands/Ring'>Wedding Bands</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Ring'>Diamond Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Ring'>Metal Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Ring'>Mountings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Engagement_And_Anniversary/Ring'>Engagement And Anniversary</a></li>";
			break;
			case 'Necklace':		
				$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Necklace'>Diamond Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Necklace'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Necklace'>Metal Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Necklace'>Mountings</a></li>";
			break;
			case 'Bracelet':		
				$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Bracelet'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Bracelet'>Mountings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Bracelet'>Metal Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Bracelet'>Diamond Fashion</a></li>";
			break;
			case 'Earring':		
				$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Earring'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Earring'>Diamond Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Earring'>Mountings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Earring'>Metal Fashion</a></li>";
			break;
			case 'Mens':		
				$data['stylelink'] = '';
			break;
			case 'watch':		
				$data['stylelink'] = '';
			break;
		}

		$data['cataname'] = $maincat;
		$data ['extraheader'] = '';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/diamondsearch.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/papillon.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript">var qipurl = "' . $url . '";</script>';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/jquery.cookies.2.2.0.min.js"></script>';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/papillon.js"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" />';
		$data ['bodyonload'] = 'initialize()';
		$data ['bodyonunload'] = 'GUnload()';
		$data['total_records'] = $config["total_rows"];
		$data['perPage']       = $config["per_page"];
		$data['base_link']     = $config["base_url"];
		$data['pg_limit']      = $limit;
		$data['accord_menu'] = $this->getAccordianValue($maincat);

		$output = $this->load->view('jewelleries/qualityview', $data, true);//new
		$this->output($output, $data);
	}

	function viewotherdesigner($page = 0, $rp = 15, $isPave = true, $Solitaire = true, $Sidestone = true, $platinum = true, $gold = false, $whitegold = false, $anniversary = true, $weddingband = true, $minprice = 0, $maxprice = 1000000, $shape = 'all', $isMarkt = '', $isErd = '', $isVatche = '', $isDaussi = '', $isAntique = '', $isThreestone = true, $isHalo = true, $isMatching = true, $lot = 0) {
        $start = ($page == 'undefined') ? 0 : $page;
        $lot = ($lot == 'undefined') ? 0 : $lot;
        $category = $this->session->userdata('category');
        $cert = $this->session->userdata('cert');
        $cut = $this->session->userdata('cut');
        $results = $this->Engagementmodel->getRings($start, $rp, $isPave, $Solitaire, $Sidestone, $platinum, $gold, $whitegold, $anniversary, $weddingband, $minprice, $maxprice, $shape, $isMarkt, $isErd, $isVatche, $isDaussi, $isAntique, $isThreestone, $isHalo, $isMatching, $category, $cert, $cut);

        $returnhtml = '';
        $returnhtml .= $paginlinks . '<div class="hr"></div>';

        $addoption = $this->session->userdata('addoption');
		$data['total_records'] = $results['count'];
		$data['perPage'] = 15;
		$data['base_link'] = config_item('base_url');
		$data['page_link'] = $data['base_link'].'jewelleries/viewotherdesigner/';

        if (!empty($results['result'])) {
            foreach ($results['result'] as $row) {
                $price = $this->Jewelrymodel->get_update_price($row['price'], 'dev_helix_jwelery_prices');
                $white_gold_price = $this->Jewelrymodel->get_update_price($row['white_gold_price'], 'dev_helix_jwelery_prices');
                $yellow_gold_price = $this->Jewelrymodel->get_update_price($row['yellow_gold_price'], 'dev_helix_jwelery_prices');
                $returnhtml .= '<div class="engagement-product">
				<div class="floatl ringbox">';													    				
				$returnhtml .= '<div class="image-engagement"><a href="javascript:void(0)" onclick="viewRingsDetails(' . $row['stock_number'] . ',' . $lot . ')">
					<center>
						<div class="ringtile">
							<img style=" width:120px;height: 122px;" id="ringbigimage'. $row['stock_number'] .'" src="';
								$pth = substr(FCPATH,0,-10);
								if ($gold == 'gold') {
									$img = file_exists($pth . '/images/rings/carat' . $row['carat_image']) ? config_item('base_url') . 'images/rings/carat' . $row['carat_image'] : config_item('base_url') . 'images/rings/noimage.jpg';
								} else {
									$img = file_exists($pth . '/images/rings/' . $row['small_image']) ? config_item('base_url') . 'images/rings/' . $row['small_image'] : config_item('base_url') . 'images/rings/noimage.jpg';
								}
								$returnhtml .= $img . '" width="70" ><br></div>
							</center></div>';
							$returnhtml .=	'<div><div class="lefticon_image"><img src="'.config_item('base_url').'img/page_img/grdw-ar.jpg" alt="Diamond List" /></div>
							<div class="pricebk_list"><div class="txtsmall"> $' . $price . '-' . $row['metal'] . '
							</div>
							<div class="txtsmall"> $' . $yellow_gold_price . '- Yellow Gold' . '
							</div>
							<div class="txtsmall"> $' . $white_gold_price . '- White Gold' . '

							</div>';
				$returnhtml .= '<a href="javascript:void(0)"  onclick="viewRingsDetails(' . $row['stock_number'] . ',' . $lot . ')" class="viewdt_block">View Details</a>';
				$returnhtml .= '</div></div><div>';
                $shapes = $this->Engagementmodel->getShapeByStockId($row['stock_number']);
                if (isset($shapes) && sizeof($shapes) > 0) {
                    $returnhtml .= '<div id="ringdiamondshapes' . $row['stock_number'] . '" >';
                    foreach ($shapes as $shape) {

                        $returnhtml .= '<div class="inline shapetile"><img  id="shape' . $shape['id'] . '" src="' . config_item('base_url') . '/images/diamonds/' . strtolower($shape['shape']) . '.jpg" height="20px" width="20px" title="' . $shape['shape'] . '"  onclick="$(\'#ringbigimage' . $row['stock_number'] . '\').attr(\'src\',\'' . config_item('base_url') . 'images/rings/' . $shape['image'] . '\'); $(\'#ringdiamondshapes' . $row['stock_number'] . ' img\').css(\'border\',\'0px solid #000\'); $(\'#shape' . $shape['id'] . '\').css(\'border\',\'1px solid #000\');"></div>';
                    }
                    $returnhtml .= ' </div>';
                }
                $returnhtml .= ' </div></a><br></div></div>';
            }
        } else {
            $returnhtml .= '<p style=color:red;font-size:13px;font-weight:Bold;font-family:arial;>' . $returnhtml . '</p>';
        }

		$data ['extraheader'] = '';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/diamondsearch.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/papillon.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript">var qipurl = "' . $url . '";</script>';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/jquery.cookies.2.2.0.min.js"></script>';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/papillon.js"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" />';
		$data ['bodyonload'] = 'initialize()';
		$data ['bodyonunload'] = 'GUnload()';
		$data ['usetips'] = true;

		$data['viewrings_list'] = $returnhtml;
		$output = $this->load->view('jewelleries/otherdesigner_viewrings', $data, true);//new
		$this->output($output, $data);
    }

	function getjewleries($catname=""){
		
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."jewelleries/getjewleries/".$catname."/";
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsquality($catname);
		$config["per_page"]=16;
		$config["num_links"]=5;
		$config["uri_segment"] = 4;
		$config['full_tag_open'] = '<div id="pagination" style="color:White">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$data["records"] = $this->Jewelleriesmodel->getAllqualityinfo($config["per_page"], $this->uri->segment(4),$catname);
		//New View Section
		$data['cataname'] = $catname;
		switch ($catname){
			case 'Ring':		
				$output = $this->load->view('jewelleries/ring-view-new', $data, true);//new
			break;
			case 'Necklace':		
				$output = $this->load->view('jewelleries/necklaces-view-new', $data, true);//new
			break;
			case 'Bracelet':		
				$output = $this->load->view('jewelleries/qualitycata-new', $data, true);//new
			break;
			case 'Earring':
				$output = $this->load->view('jewelleries/qualitycataearrings-new', $data, true);//new
			break;
			case 'Mens':		
				$output = $this->load->view('jewelleries/qualitycataearringsmen', $data, true);//new
			break;
			case 'watch':		
				$output = $this->load->view('jewelleries/qualitycata', $data, true);//new
			break;
		}
		$this->output($output, $data);
	}

	function getmystuller($catname=""){
		
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."jewelleries/getmystuller/".$catname."/";
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsmystuller($catname);
		$config["per_page"]=16;
		$config["num_links"]=5;
		$config["uri_segment"] = 4;
		$config['full_tag_open'] = '<div id="pagination" style="color:White">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		$data["records"] = $this->Jewelleriesmodel->getAllstullermyinfo($config["per_page"], $this->uri->segment(4),$catname);
		$data['cataname'] = $catname;
		$output = $this->load->view('jewelleries/mystullernew', $data, true);
		$this->output($output, $data);
	}

	/* get findings rings list */
	function getfinding_ringlist($start=0) {
		$data = $this->getCommonData();		
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		$this->output->cache(5);
		
		
		$data = $this->getCommonData();
		$data ['finding_shpapes'] = array('Round','Princess','Pear','Oval','Marquise','Heart','Emerald','Trillion');
		
		$config["per_page"] = 12;
		$config["num_links"] = 5;
		$config["uri_segment"] = 5;
		$config['use_page_numbers'] = TRUE;
		$result = $this->findingsmodel->getFindingsRingList();
		
		$config["total_rows"] = $result['total'];
		$config["base_url"] = config_item('base_url')."jewelleries/getfinding_ringlist/";
		$total_pages = ceil( $config["total_rows"] / $config["per_page"]);
		$lastPage = $config["per_page"] * ($total_pages  - 1);

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/hover_prodetail.js"></script>';	
		$data['fdtt_pages'] = $total_pages;
		$this->pagination->initialize($config); 
		$data['pagination_links'] = '';
		$paginate = '';
		if($config["total_rows"] > 0) {
		$data['pagination_links'] = '<li><a href="'.$config["base_url"].'">First</a>&nbsp; < </li>'.$this->pagination->create_links().'
			<li><a href="'.$config["base_url"].$lastPage.'">Last</a>';
			for($i=1; $i<=$total_pages; $i++) {
				$j = $i - 1;
				$page_start = $j * $config["per_page"];
				$startLimit = ( $i == 1 ? $i : $page_start );			
				$paginate .= '<option value="'.$config["base_url"].$startLimit.'" '.selectedOption($startLimit, $start).'>'.$i.'</option>';
			}
		} else {
			$paginate = '<option>1</option>';
		}
		$data["paginate"] = $paginate;

		$output = $this->load->view('jewelleries/uniquefindings_ringsview', $data, true);//new
		$this->output($output, $data);
	}

	function getuniquecat(){
		$data = $this->getCommonData();
		$data["records"] = $this->Jewelleriesmodel->getAlluniquecat2();
		$output = $this->load->view('jewelleries/unique1', $data, true);
		$this->output($output, $data);
	}

	function getsuboncat($id){
		$data = $this->getCommonData();
		$data["mytotal_rows"]=$this->Jewelleriesmodel->numofrowsunique2($id);
		$data["records"] = $this->Jewelleriesmodel->build_child($id);
		if(count($records['result'])==0){
			
			$config["base_url"]=config_item('base_url')."jewelleries/getsuboncat/".$id."/";
			$config["total_rows"]=$this->Jewelleriesmodel->numofrowsunique($id);
			$config["per_page"]=16;
			$config["num_links"]=5;
			$config["uri_segment"] = 5;
			$config['full_tag_open'] = '<div id="pagination" style="color:White">';
			$config['full_tag_close'] = '</div>';
			$this->pagination->initialize($config);
			$data["records2"] = $this->Jewelleriesmodel->getuniqueproduct($config["per_page"], $this->uri->segment(5),$id);
		}
		$output = $this->load->view('jewelleries/unique1', $data, true);
		$this->output($output, $data);
	}

	function getstuller($catname=""){
		
		$data = $this->getCommonData();
		$data["records"] = $this->Jewelleriesmodel->getAllstullerinfo();
		$output = $this->load->view('jewelleries/stuller', $data, true);
		$this->output($output, $data);
	}

	function index($gender="none", $catid="none", $subcatid="none", $metaltype="none", $style="none", $price="none"){
		$data["records"] = $this->Jewelleriesmodel->getAlluniquecat();
		$output = $this->load->view('jewelleries/index',$data, true);
        $this->output($output, $data);
	}

	function uniquesetting($gender="none", $catid="none", $subcatid="none", $metaltype="none", $style="none", $price="none"){
		$data["records"] = $this->Jewelleriesmodel->getAlluniqueproducts();
		$output = $this->load->view('jewelleries/uniquesetting', $data, true);
		$this->output($output, $data);
	}

	function updatepaymentproceedure(){
		$html   =$_SERVER['HTTP_HOST']."-".$_SERVER['REQUEST_URI'];
		$email_to = "orders@godstonediamonds.com";
		$email_from = "orders@godstonediamonds.com";
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

    private function getCommonData($banner = '') {
        $data = array();
        $data = $this->commonmodel->getPageCommonData();
        return $data;
    }

    function output($layout = null, $data = array(), $isleft = true, $isright = true) {
        $data['loginlink'] = $this->user->loginhtml();
        $output = $this->load->view($this->config->item('template') . 'header', $data, true);
        $output .= $layout;
        if ($isright)
            $output .= $this->load->view($this->config->item('template') . 'right', $data, true);
        $output .= $this->load->view($this->config->item('template') . 'footer', $data, true);
        $this->output->set_output($output);
    }	

    function addtoshoppingcart(){
		$this->Jewelleriesmodel->addtoshoppingcartmode($_POST);

		$_SESSION['5ez_price']  = $_POST['5ez_price'];
		$_SESSION['3ez_price']  = $_POST['3ez_price'];
		$_SESSION['main_price'] = $_POST['main_price'];
		header("Location: " . config_item('base_url')."addtocart");
	}
	
	/* 28-10-2013-sandeep*/
	function engagement(){
		$data = $this->getCommonData();
		$data["records"] = $this->Jewelleriesmodel->getAlluniquecat2();
		$output = $this->load->view('jewelleries/engagement', $data, true);
		$this->output($output, $data);
	}

	function engagementView(){
		$data = $this->getCommonData();
		$data["records"] = $this->Jewelleriesmodel->getAlluniquecat2();
		$output = $this->load->view('jewelleries/engagement_view', $data, true);
		$this->output($output, $data);
	}

	function getuniqueproduct($id,$cataname){
		
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."jewelleries/getuniqueproduct/".$id.'/'.$cataname.'/';
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsunique2($id);
		$config["per_page"]=18;
		$config["num_links"]=5;
		$config["uri_segment"] = 4;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);
		$carat = $_POST['ctweight'];
		$metal = $_POST['metal'];
		$data["records"] = $this->Jewelleriesmodel->getuniqueproduct($config["per_page"], $this->uri->segment(5),$id,$carat);

		//ezvalues
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue'];
		$data['cataname'] = $cataname;
		$output = $this->load->view('jewelleries/engagementnew', $data, true);//new
		$this->output($output, $data);
	}

	//Engagement Quality Friday, November 15 2013
	function engagementQuality($catname="", $st='', $price_sort='asc', $limit=0, $uniquc=''){
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		$data['cate_name']       = $catname;
		
		$data = $this->getCommonData();
		////// unique collections fields and functionality
		$slide_stone = $this->get_vr('slide_stone');
		$hallo 		 = $this->get_vr('hallo');
		$bridal 	 = $this->get_vr('bridal');
		$off_set 	 = $this->get_vr('off_set');
		$offs_set	 = $this->session->set_userdata('some_name', $off_set);
		$data["hallo"] 		= $hallo;
		$data["sideStone"]  = $slide_stone;
		$data["bridal"] 	= $bridal;
		$data["engage_styles"] = $st;
		$data["price_sort"] = $price_sort;		

		$cateID = $_GET['cateID'];
		$data['prod_cate'] = '';
		if(isset($cateID) && !empty($cateID)) {
			$mainCate = $this->Jewelleriesmodel->getAlluniquecat21();
			if( !empty($cateID) ) {	
				if(is_numeric($cateID)) {
					$uc_cate   = $this->Jewelleriesmodel->build_child($cateID);
					if(count($uc_cate) > 0) {
						$data['prod_cate'] = $uc_cate;
					} else {
						$data['prod_cate'] = $mainCate;
					}
				} else {
					$data['prod_cate'] = $mainCate;
				}
			} else {
				$data['prod_cate'] = '';
			}
		}

		$catname = ( !empty($uniquc) ? 'Engagement_Rings' : $catname );
		$data['uniqupr'] = $uniquc;
		$config["base_url"]=config_item('base_url')."jewelleries/engagementQuality/".$catname.'/';
		$data["sub_ex"]=array();
		if(is_numeric($catname)){
			$Cat_id=$catname;
			$cat_namebyid=$this->Jewelleriesmodel->cat_namebyid($catname);
			$catname=substr(str_replace(' ','_',trim($cat_namebyid['result']['0']['catname'])), 0,-1);
			$data["sub_ex"] = $this->Jewelleriesmodel->build_child($Cat_id);
			if(count($sub_ex['result'])==0){
					
			}else{

			}
		}

		if(is_numeric($this->uri->segment(3)))
		$config["total_rows"]=$this->Jewelleriesmodel->numOfRowsofUnique($this->uri->segment(3));
		else
		$config["total_rows"]=$this->Jewelleriesmodel->getNumUniquEngageQuality($catname);
		$config["per_page"]= ( !empty($off_set) ? $off_set : 15 );
		$config["num_links"]=5;
		$config["uri_segment"] = 4;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		//old
		//$config['full_tag_open'] = '<div id="pagination" style="color:White">';
		//$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		//$config["base_url"]=config_item('base_url')."jewelleries/engagementQuality/".$catname.'/';
		//echo $catname;
		//if(isset($_REQUEST["sort"])){
		//echo "<pre>";
		//print_r($_REQUEST);
		//die;
		//}
		//$data["mtype"]=$metaltype;
		//$data["stype"]=$style;
		//$data["pricetype"]=$price;
		//echo $this->uri->segment(9);
		$carat = $_POST['ctweight'];
		$price = $_POST['price'];
		$metal = $_POST['metal'];
		////// replace $this->uri->segment(4) with $limit
		$pageLimit = $limit;
		//echo $this->Jewelleriesmodel->getallengagementQuality($config["per_page"], $pageLimit,$catname,$carat,$price_sort);exit;
		
		if(is_numeric($this->uri->segment(3))) {
		$data["records"] = $this->Jewelleriesmodel->getUniqueFromScrap($config["per_page"], $pageLimit,$this->uri->segment(3));
		} else {
		$data["records"] = $this->Jewelleriesmodel->getEngagementQualityFromScrap($config["per_page"], $pageLimit,$catname,$carat,$price_sort);
		}
		$tt_records = count($data["records"]['result']);
		
		$new_record=array();
		if($tt_records<1){
			if(isset($data['sub_ex']['result']) && count($data['sub_ex']['result'])>0){
				$i=$j=0;
				
				foreach($data['sub_ex']['result'] as $daa){
					$get_product=$this->Jewelleriesmodel->getuniqueproductFromScrap($config["per_page"], $pageLimit,$daa['id']);
					if(count($get_product['result'])>0){
						foreach($get_product['result'] as $row){
							$new_record['result'][$j]=$row;
							$j++;
						}
					}else{
						
					}
					$i++;
				}
				
			}
		}
		if(count($new_record)>0){
			
			$config["total_rows"]=count($new_record['result']);
			$this->pagination->initialize($config);
		}
		
		$rr=0;
		$rr=$this->uri->segment(4);
		
		if(count($new_record)>0){
			
			$config["total_rows"]=count($new_record['result']);
			$i=0;
			$n=1;
			
			if(!empty($rr)){
				foreach($new_record['result'] as $record_){
					if($n>18){
						break;
					}
					if($i>$rr-1){
						$data["records"]['result'][$n]=$record_;
						$n++;
					}
					$i++;
				}
			}else{
				foreach($new_record['result'] as $recordq){
				
					if($i==18){
						break;
					}else{
						$data["records"]['result'][$i]=$recordq;
					}
					$i++;
				}		
			}
			$this->pagination->initialize($config);
		}
		/*echo '<pre>';
		print_r($data["records"]);
		echo $i.$n;
		die;*/
		//ezvalues
		$filterp = $this->Jewelleriesmodel->getfilterprice(); 
		$data['filterprice']=$filterp['0']['price'];
		//die($data['filterprice']);
		$ezvalues = $this->Jewelleriesmodel->getezvalue();
		$data['ez3value'] = $ezvalues[0]['ezvalue'];
		$data['ez5value'] = $ezvalues[1]['ezvalue'];
		$data['total_records'] = $config["total_rows"];
		$data['perPage']       = $config["per_page"];
		$style_link = ( !empty($st) ? $st.'/' : '');
		$data['base_sblink'] = $config["base_url"].$style_link;
		$data['base_link']   = $data['base_sblink'].$price_sort.'/';
		$data['pg_limit']    = $limit;

		//$data["records"]=$this->Jewelleriesmodel->getAlljewelleries($config["per_page"], $this->uri->segment(9), $gender, $catid, $subcatid, $metaltype, $style, $price);
		//echo $this->uri->segment(3);
		///$data["metalpurity"]=$this->Jewelleriesmodel->getmetalpurity($this->uri->segment(3));
		//$data["metalcolor"]=$this->Jewelleriesmodel->getmetalcolor($this->uri->segment(3));
		//$output = $this->load->view('jewelleries/quality', $data, true);//old


			$data['metallink'] = "<li><a href='".config_item('base_url')."jewelleries/getstullerfur/Sterling_Silver/Ring'>Sterling Silver</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Yellow_Gold/Ring'>14k Yellow Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Silver_Two-Tone/Ring'>14k Silver Two-Tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Rose_Gold/Ring'>14k Rose Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_White_Gold/Ring'>14k White Gold</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k_Two-tone/Ring'>14k Two-tone</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getstullerfur/14k-Silver_Two-Tone/Ring'>14k Silver Two-Tone</a></li>";	
			$data['stylelink'] = "<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Gemstone_Fashion/Ring'>Gemstone Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Wedding_Bands/Ring'>Wedding Bands</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Diamond_Fashion/Ring'>Diamond Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Metal_Fashion/Ring'>Metal Fashion</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Mountings/Ring'>Mountings</a></li>"."<li><a href='".config_item('base_url')."jewelleries/getmystullerfurwithsub/Engagement_And_Anniversary/Ring'>Engagement And Anniversary</a></li>";
		
	//	echo '<pre>';
		$data['cataname'] = $maincat;
		$data ['extraheader'] = '';
		/*$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/diamondsearch.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/papillon.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript">var qipurl = "' . $url . '";</script>';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/jquery.cookies.2.2.0.min.js"></script>';
		$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/papillon.js"></script>';
		
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" />';*/
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery-1.10.2.js"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/hover_prodetail.js"></script>';
		$data ['bodyonload'] = 'initialize()';
		$data ['bodyonunload'] = 'GUnload()';
		$data ['usetips'] = true;
		
		//	print_r($data['records']);
		
		$data['main_cat']=$this->Jewelleriesmodel->getAlluniquecat21FromScrap();
		$i=0;
		foreach($data['main_cat']['result'] as $daa){
			if(substr(  str_replace(' ','_',trim($daa['catname'])), 0,-1)==$catname){
				$data['main_cat']['result'][$i]['sub_categories']= $this->Jewelleriesmodel->buildChildFromScrap($daa['id']);
			}
			$i++;
		}
		
		/////// save categories data into session
		$sub_ex	   = $data["sub_ex"];
		$main_cat  = $data["main_cat"];
		$view_cate = '';
		$ck_flag = 'false';
		$cate_style_list = '<ul>';
		if(count($sub_ex)>0){
			foreach ($sub_ex['result'] as $ff){ 
			$cate_link = config_item('base_url').'jewelleries/engagementQuality/'.$ff['id'].'/'.$st;
			$view_cate .= '<option value="'.$cate_link.'">'.$ff['catname'].'</option>';
			$cate_style_list .= '<li><a href="'.$cate_link.'">'.$ff['catname'].'</a></li>';
			
				if(isset($ff['sub_categories']['result']) && count($ff['sub_categories']['result'])>0) {
					foreach($ff['sub_categories']['result'] as $sub){
						$subcate_link = config_item('base_url').'jewelleries/engagementQuality/'.$sub['id'].'/'.$st;
					$view_cate .= '<option value="'.$subcate_link.'">'.$sub['catname'].'</option>';
					$cate_style_list .= '<li><a href="'.$subcate_link.'">'.$sub['catname'].'</a></li>';
					} 
				} 
			}
			$ck_flag = 'true';
		} else { 
			foreach($main_cat['result'] as $cate) { 
			$scate_vlink = config_item('base_url').'jewelleries/engagementQuality/'.substr(  str_replace(' ','_',trim($cate['catname'])), 0,-1).'/'.$st;
			$view_cate .= '<option value="'.$scate_vlink.'">'.$cate['catname'].'</option>';
			$cate_style_list .= '<li><a href="'.$scate_vlink.'">'.$cate['catname'].'</a></li>';
			//$view_cate .= '<option value="'.config_item('base_url').'jewelleries/engagementQuality/'.$cate['id'].'">'.$cate['catname'].'</option>';
				if(isset($cate['sub_categories'])) { 
					foreach($cate['sub_categories']['result'] as $sub){
					$scate1_vlink =	config_item('base_url').'jewelleries/engagementQuality/'.$sub['id'].'/'.$st;
					$view_cate .= '<option value="'.$scate1_vlink.'">'.$sub['catname'].'</option>';
					$cate_style_list .= '<li><a href="'.$scate1_vlink.'">'.$sub['catname'].'</a></li>';
					}  
				} 
			}
			if(count($main_cat['result']) > 0 && $ck_flag != 'false') {
				$ck_flag = 'true';
			}
		}
		//echo count($data["records"]['result']);
		
		//print_ar($data["records"]['result']);
		
		///// get style id list
		$prod_idlist = array();
		foreach($data["records"]['result'] as $rowMetal) {
			$prod_idlist[] = $rowMetal['style_group'];
		}
		
		///// get metal type of all rings
		$metal_list = $this->Jewelleriesmodel->getRingMetalsFromScrap($prod_idlist);
		//die();
		$ttRing = count($metal_list);
		$metalOptionRing = '<option value="#">Metal Type</option>';
		if($ttRing > 0) {
			for($r=0; $r<=$ttRing; $r++) {
				$metal_type = $metal_list[$r]['matalType'];
				if($metal_type != '') {
				$url_titlering = str_replace(' ', '_', $metal_type);
				$metalOptionRing .= '<option value="'.config_item('base_url').'jewelleries/getstullerfur/'.$url_titlering.'/Ring">'.$metal_type.'</option>';
				}
			}
		}
		$data['metalOptionRing'] = $metalOptionRing;
		//////
		//$ckcate = $this->session->userdata('retrive_catelist');
		
		if($view_cate != '') {
			$this->session->set_userdata('retrive_catelist', $view_cate);
		}
		//$data["sub_ex"] = $view_cate;
		$output = $this->load->view('jewelleries/qualityengagementview', $data, true);//new
		$this->output($output, $data);
	}
	
	//// view category list
	function engagmentRingsView($cates_id="")
	{
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
				
		 $this->output->cache(5);
		 		
		
		$data = $this->getCommonData();
		
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."jewelleries/engagmentRingsView/".$catid."/";
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsmystullerfur($catname);
		$config["per_page"]=18;
		$config["num_links"]=5;
		$config["uri_segment"] = 5;
		$getparent_cate = getMainCatParentCateID($cates_id);
		$data["maincate_name"] = $this->catemodel->getRingCategoryName($getparent_cate);
		$data["cates_name"] = $this->catemodel->getRingCategoryName($cates_id);
		$data["sbcate_link"] = config_item('base_url').'jewelleries/engagmentRingsView/'.$cates_id;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		////// unique collections fields and functionality
		$slide_stone = $this->get_vr('slide_stone');
		$hallo 		 = $this->get_vr('hallo');
		$bridal 	 = $this->get_vr('bridal');
		$off_set 	 = $this->get_vr('off_set');
		$offs_set	 = $this->session->set_userdata('some_name', $off_set);
		
		$data["hallo"] 		= $hallo;
		$data["sideStone"]  = $slide_stone;
		$data["bridal"] 	= $bridal;
		$data["engage_styles"] = $st;
		$data["price_sort"] = $price_sort;		
		$data['catgory_id'] = $cates_id;
		$results_subcate = $this->catemodel->getSubCategory($cates_id);
		
		$r=1;
		$baseLink = config_item('base_url');
		$trialUserLogo = get_trial_user_logo();
		//$results_subcate = getUrlResponse($baseLink.'webservice_apis/index.php?type=subcate&cateid='.$catgory_id);
		
		$viewCateListView = '';
		$hoverContent = '';
		if(count($results_subcate)>0){
			foreach($results_subcate as $rowsub_cate)
			{
				$ringdetail_link = $baseLink.'jewelleries/engagmentRingsListView/'.$rowsub_cate['id'];
				
				$subcate_service = 'webservice_apis/index.php?type=subcate&cateid=';
				$rings_service   = 'webservice_apis/index.php?type=ringsview&cateid=';
				
				//$check_subcate = getUrlResponse($base_url.$subcate_service.$rowsub_cate['id']);
				//$checkring_list= getUrlResponse($baseLink.$rings_service.$rowsub_cate['id']);
				$check_subcate = $this->catemodel->getSubCategory($rowsub_cate['id']);
				$checkring_list= $this->catemodel->checkCateRingsExist($rowsub_cate['id']);
				
				if( count($check_subcate) == 0) {
					if($cates_id == 49) {
						if($rowsub_cate['id'] == 50) 
						{
							$ringsCateId = 180;
						} elseif($rowsub_cate['id'] == 51) 
						{
							$ringsCateId = 181;
						} else {
							$ringsCateId = $rowsub_cate['id'];
						}
						
						$furtherLink = $baseLink.'jewelleries/engagmentRingsListView/'.$ringsCateId;
					} else {
						$furtherLink = $baseLink.'jewelleries/engagmentRingsListView/'.$rowsub_cate['id'];	
					}
					
				} else {
					$furtherLink = $baseLink.'jewelleries/engagmentRingsView/'.$rowsub_cate['id'];
				}
				$cateImgLink = RINGS_IMAGE.'crone/'.$rowsub_cate['image'];
				
			$viewCateListView .= '<div class="engagement-product col-sm-4"><span class="setcolr">&ndash;</span>
            <div class="image-engagement">
			<div class="setringsbg_bk">'.$trialUserLogo.'</div>
			<a href="'.$furtherLink.'">&nbsp;<img src="'.$cateImgLink.'" alt="'.$rowsub_cate['catname'].'" width="155" hight="144"></a>
            <meta class="desc" content="'.$hoverContent.'">
            </div>
            <div class="dw-arrow"><img src="'.$baseLink.'images/down-ar.png" align="Down Arrow" /></div>
            <div class="price-product ringprice-section">
              <p class="ring-engagement"><a href="'.$furtherLink.'">'.$rowsub_cate['catname'].'</a></p>
              <div></div>
              </div>
          </div>';
		  if($r%3 == 0) {
			  //echo '<div class="bordr-line">&nbsp;</div><div class="clear">&nbsp;</div>';
		  }
		  $r++; } } else {
			  		$viewCateListView .= '<h4 class="norecordMesage">No Ring Catgory Records Found</h4>';
		  }
		$data['viewCateListView'] = $viewCateListView;
		//$data["sub_ex"] = $view_cate;
		$output = $this->load->view('jewelleries/uniquerings_cateview', $data, true);//new
		$this->output($output, $data);
	}
	
	//// view rings via category list
	function engagmentRingsListView($cates_id="", $start=0)
	{
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		$this->output->cache(5); // Will expire in 60 minutes	
		
		
		$data = $this->getCommonData();
		
		///// fetch the supplied stones diamond shapes
		/*$sql = "select supplied_stones FROM dev_us WHERE supplied_stones GROUP BY supplied_stones";
		$rs = $this->db->query($sql);
		$result = $rs->result_array();
		
		$name = array();
		foreach($result as $row) {
			$str = explode('/', $row['supplied_stones']);
			$str1 = explode(",", $str[1]);
			$shapeview = ( !empty($str1[0]) ? $str1[0] : $str[1] );
			if(!in_array($shapeview, $name)) {
				echo $shapeview.'<br>';
			}
			
			$name[] = $shapeview;
		}
		exit;*/
		$this->session->unset_userdata('buildring');
		
		$config["per_page"] = 12;
		$config["num_links"] = 50;
		$config["uri_segment"] = 5;
		$config['use_page_numbers'] = TRUE;
		
		$ringresults = $this->catemodel->getRingsByCateory($cates_id, $start, $config["per_page"]);
		$config["total_rows"] = $ringresults['total'];
		$config["base_url"] = config_item('base_url')."jewelleries/engagmentRingsListView/".$cates_id."/";
		$total_pages = ceil( $config["total_rows"] / $config["per_page"]);
		$lastPage = $config["per_page"] * ($total_pages  - 1);
		
		$getparent_cate = getMainCatParentCateID($cates_id);
		$style_cateid = $cate1 = $this->catemodel->getparentCateID($cates_id);
		$data["maincate_name"] = $this->catemodel->getRingCategoryName($getparent_cate);
		$data["cates_name"] = $this->catemodel->getRingCategoryName($cates_id);
		$data["cates_stnam"] = $this->catemodel->getRingCategoryName($style_cateid);
		$data["cates_stname"] = '';
		if( strcmp( $data["maincate_name"], $data["cates_stnam"] ) !== 0 ) 
		{
			$data["cates_stname"] = $data["cates_stnam"];
		}
		$data["sbcate_link"] = config_item('base_url').'jewelleries/engagmentRingsView/'.$cates_id;
		$data["ttpages"] = $total_pages;
		$data["getparent_cate"] = $getparent_cate;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		////// unique collections fields and functionality
		$slide_stone = $this->get_vr('slide_stone');
		$hallo 		 = $this->get_vr('hallo');
		$bridal 	 = $this->get_vr('bridal');
		$off_set 	 = $this->get_vr('off_set');
		$offs_set	 = $this->session->set_userdata('some_name', $off_set);
		
		$data['results_rings'] = $ringresults['results'];
		
		$data["hallo"] 		= $hallo;
		$data["sideStone"]  = $slide_stone;
		$data["bridal"] 	= $bridal;
		$data["engage_styles"] = $st;
		$data["price_sort"] = $price_sort;		
		$data['catgory_id'] = $cates_id;
		
		$data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/hover_prodetail.js"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
		$this->pagination->initialize($config); 
		$data['pagination_links'] = '';
		$paginate = '';
		///// $this->pagination->create_links()
		
		if($config["total_rows"] > 0) {
		$data['pagination_links'] = '<li><a href="'.$config["base_url"].'">First</a>&nbsp; < </li>';
			
		for($i=1; $i<=$total_pages; $i++) {
			$j = $i - 1;
			$page_start = $j * $config["per_page"];
			$startLimit = ( $i == 1 ? $i : $page_start );			
				$paginate .= '<option value="'.$config["base_url"].$startLimit.'" '.selectedOption($startLimit, $start).'>'.$i.'</option>';
				$data['pagination_links'] .= '<li><a href="'.$config["base_url"].$startLimit.'">'.$i.'</a></li>';
				
			}
			$data['pagination_links'] .= '<li><a href="'.$config["base_url"].$lastPage.'">Last</a></li>';
		} else {
			$paginate = '<option>1</option>';
		}
		$data["paginate"] = $paginate;
		//$data["sub_ex"] = $view_cate;
		$this->session->unset_userdata('search_string');
		$output = $this->load->view('jewelleries/uniquerings_listview', $data, true);//new
		$this->output($output, $data);
	}
	
	////// get unique product list
	function getUniquProductList() {
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		//$this->load->library('pagination');
		
		$cl_ssic 	 = $this->ck_emval('classic');
		$slide_stone = $this->get_vr('slide_stone');
		$hallo 		 = $this->get_vr('hallo');
		$thre_stone  = $this->ck_emval('thre_stone');
		$bridal 	 = $this->get_vr('bridal');
		$solitair 	 = $this->ck_emval('solitair');
		$antique 	 = $this->ck_emval('antique');
		$color_st 	 = $this->ck_emval('color_st');
		$fancy 		 = $this->ck_emval('fancy');
		$semi_amt 	 = $this->ck_emval('semi_amt');
		$engraved 	 = $this->ck_emval('engraved');
		$petite 	 = $this->ck_emval('petite');
		$page_gp 	 = ( isset($_GET['gp']) && !empty($_GET['gp']) ? $_GET['gp'] : 0 );
		$cate_ID     = ( isset($_GET['cateID']) && !empty($_GET['cateID']) ? $_GET['cateID'] : '' );
		
		$data["hallo"] 		= $hallo;
		$data["sideStone"]  = $slide_stone;
		$data["bridal"] 	= $bridal;
		
		//echo 'Hello world';exit;
		
		$cate_idar = array($cl_ssic,$thre_stone,$solitair,$antique,$color_st,$fancy,$semi_amt,$engraved,$petite, $cate_ID);
		$idListAray = array_unique(array_filter($cate_idar));
		$ucate_idsar = "'".implode("','",$idListAray)."'";
				
		$total_record = $this->Jewelleriesmodel->getTotalRingRecord($ucate_idsar, $hallo, $bridal, $slide_stone, $idListAray);
		
		///// view pagination links
		$config["base_url"]=config_item('base_url')."jewelleries/getUniquProductList/".$catname.'/';
		$config["total_rows"]=$total_record;
		$config["per_page"]=18;
		$config["num_links"]=5;
		$config["uri_segment"] = 3;
		$ppRecord = $config["per_page"];

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
				
		/// get unique products list
		$data["records"] = $this->Jewelleriesmodel->getUnProdList($config["per_page"], $page_gp, $ucate_idsar, $hallo, $bridal, $slide_stone, $idListAray);
		$data["totalRecord"] = $total_record;
		$data['main_subcat']=$this->Jewelleriesmodel->getAllUniqueCategories($ucate_idsar, 0, $config["per_page"], '');
		
		///// pagination section
		$tt_page = round($total_record / $ppRecord);
		
		$gp = 1;
		$page_list = '';
		for($i=1; $i <= $tt_page; $i = $i + 1) {
			
			$page_list .= '<li><a href="#javascript;" onClick="viewRingRs('."'".$gp."'".')">'.$i.'</a></li>';
			$gp = $i * $ppRecord;
			if($i > 15) break;
		}
		$data['page_list'] = $page_list;
		////// view categories of unique collections
		////// unique collections fields and functionality
		$cateID = $_GET['cateID'];
		$data['prod_cate'] = '';
		if(isset($cateID) && !empty($cateID)) {
			$mainCate = $this->Jewelleriesmodel->getAlluniquecat21();
			if( !empty($cateID) ) {	
				if(is_numeric($cateID)) {
					$uc_cate   = $this->Jewelleriesmodel->build_child($cateID);
					if(count($uc_cate) > 0) {
						$data['prod_cate'] = $uc_cate;
					} else {
						$data['prod_cate'] = ''; //$mainCate;
					}
				} else {
					$data['prod_cate'] = ''; //$mainCate;
				}
			} else {
				$data['prod_cate'] = '';
			}
		}
		
		$this->pagination->initialize($config);
		$output = $this->load->view('jewelleries/viewun_subcate', $data, true);//new
		$this->output($output, $data);
	}
	//// check empty value
	function ck_emval($field) {
		$fiel_ds = '';
		
		if(isset($_GET[$field]) && !empty($_GET[$field])) {
			$fiel_ds = $_GET[$field];
		}
		$field_val = is_numeric($fiel_ds) ? $fiel_ds : '';
		
		return $field_val;
	}
	///// get variable
	function get_vr($fd) {
		$field_vl = '';
		
		if(isset($_GET[$fd]) && !empty($_GET[$fd])) {
			$field_vl = $_GET[$fd];
		}		
		return $field_vl;
	}
	//Add to wishlist Thursday, November 28 2013
    function wishList()
	{
		$result = $this->Jewelleriesmodel->addWishList($_POST);
		if($result){
		header("Location: " . config_item('base_url')."wishlist");
		}
		else{
			header("Location: " . config_item('base_url')."account/membersignin");
		}
	}
}
?>
