<?php
class Engagement extends CI_Controller {
	public $sign_upform = '';

    function __construct() {
        parent::__construct();
		$this->sign_upform = signup_form();
		$this->load->helper('url');
		$this->load->helper('content_page');
		$this->load->helper('contentsection');
		$this->load->helper('stullering');
		$this->load->helper('ringsection');
		$this->load->helper('diamond_section');
		$this->load->model('Commonmodel');
		$this->load->model('Jewelrymodel');
		$this->load->model('Diamondmodel');
		$this->load->model('Jewelleriesmodel');
		$this->load->model('Davidsternmodel');
		$this->load->model('Stulleringsmodel');
		$this->load->model('Engagementmodel');
		$this->load->model('Sitepaging');
		$this->load->model('Searchresultmodel');
		$this->load->model('Braceletmodel');
		$this->load->model('Hderingitemsmodel');
		$this->load->library("pagination");
		$this->session->set_userdata('buildring', 'rings');
    }

    function index() {
        $data = $this->getCommonData();
        $data['title'] = 'Engagement';
        $output = $this->load->view('engagement/index', $data, true);
        $this->output($output, $data);
    }

    private function getCommonData($banner = '') {
        $data = array();
        $data = $this->Commonmodel->getPageCommonData();
        return $data;
    }

    function output($layout = null, $data = array(), $isleft = true, $isright = true) {
        $data['loginlink'] = $this->User->loginhtml();
        $output = $this->load->view($this->config->item('template') . 'header', $data, true);
        $curentSubManu = $this->uri->segment(2);
        if ($isleft)
            $output .= $this->load->view($this->config->item('template') . 'left', $data, true);
        $output .= $layout;
        if ($isright)
            $output .= $this->load->view($this->config->item('template') . 'right', $data, true);
        $output .= $this->load->view($this->config->item('template') . 'footer', $data, true);
        $this->output->set_output($output);
		$this->output->cache(120);
    }

	/* diamond menu page */
	function engagement_rings() {
		$data['sign_upform'] = $this->sign_upform;
		$data['title'] = 'Custom Engagement Rings';

		$row_content = $this->Commonmodel->getCompanyInfoRow('engagement-rings');
		$data['page_contents'] = str_replace('[CONTACT_NO]', getadmin_contact_info('contact_info'), $row_content['content']);
		$output = $this->load->view('engagement/viewengage_rings', $data, true);
		$this->output($output, $data, true);
	}

	function search_item_result() {
        $searchField = $this->input->get('search_field');
        $search_field = trim(urldecode($searchField));

        $resultrows = $this->Catemodel->get_unique_rings_search_result( $search_field );
        $search_result = '';
		$search_result .= $this->diamond_search_result( $search_field );
		$search_result .= $this->fine_jewelry_search_result( $search_field );
		$search_result .= $this->engagement_rings_category_search_result( $search_field );
		$search_result .= $this->jewelery_category_search_result( $search_field );

        if( count($resultrows) ) {
            foreach ( $resultrows as $rows ) {
                $detail_link = SITE_URL . 'selection/engagement_ring_detail/'.$rows['id'];
                $cate_title = $this->Catemodel->getRingCategoryName($rows['pid']);
                if( !empty($cate_title) ) {
                    $category_title = $cate_title . ' ' . $rows['name'];
                } else {
                    $category_title = $rows['name'];
                }
                $search_result .= '<li>';
                $search_result .= '<span><a href="'.$detail_link.'">' . $category_title . '</a></span>'
                . '</li>';
            }
        }

        if( !empty($search_result) ) {
            echo $search_result;
        } else {
            echo '<li style="padding:30px 20px;text-align:center;color:#000">NO Matched Link has found!</li>';
        }
    }

    function jewelery_category_search_result($search_field='') {
        $caterows = $this->Catemodel->get_jewelery_cate_result( $search_field );  // unique rings search

        $search_result = '';
        if( count($caterows) ) {
            foreach ( $caterows as $cate_rows ) {
                $details_link = SITE_URL . 'goldsourcediamond/collection-detail/'.$cate_rows['stock_number'];
                $search_result .= '<li>';                
                $search_result .= '<span><a href="'.$details_link.'">'.$cate_rows['stock_number'].'</a></span>'
                . '</li>';
            }
        }
        return $search_result;
    }

	function diamond_search_result($search_field='') {
        $diam = $this->Catemodel->get_diamond_result($search_field);

        $search_result = '';
        if( count($diam) ) {
            foreach ( $diam as $catrows ) {
                $details_link = SITE_URL . 'diamonds/diamond_detail/'.$catrows['lot'];
                $search_result .= '<li>';                
                $search_result .= '<span><a href="'.$details_link.'">'.$catrows['carat'].'-Carat Round Diamond</a></span>'
                . '</li>';
            }
        }
        return $search_result;
    }

	function fine_jewelry_search_result($search_field='') {
        $diam = $this->Catemodel->get_fine_jewelry_result($search_field);

        $search_result = '';
        if( count($diam) ) {
            foreach ( $diam as $catrows ) {
                $details_link = SITE_URL . 'collection/collection-detail/'.$catrows['stock_number'];
                $search_result .= '<li>';                
                $search_result .= '<span><a href="'.$details_link.'">'.$catrows['item_title'].'</a></span>'
                . '</li>';
            }
        }
        return $search_result;
    }

	function hip_hop_jewelry_search_result($search_field='') {
        $diam = $this->Catemodel->get_hip_hop_jewelry_result($search_field);

        $search_result = '';
        if( count($diam) ) {
            foreach ( $diam as $catrows ) {
                $details_link = SITE_URL . 'collection/collection_women_detail/'.$catrows['id'];
                $search_result .= '<li>';                
                $search_result .= '<span><a href="'.$details_link.'">'.$catrows['product_name'].'</a></span>'
                . '</li>';
            }
        }
        return $search_result;
    }

	function men_diamond_rings_search_result($search_field='') {
        $diam = $this->Catemodel->get_men_diamond_rings_result($search_field);

        $search_result = '';
        if( count($diam) ) {
            foreach ( $diam as $catrows ) {
                $details_link = SITE_URL . 'collection/collection_men_detail/'.$catrows['id'];
                $search_result .= '<li>';                
                $search_result .= '<span><a href="'.$details_link.'">'.$catrows['product_name'].'</a></span>'
                . '</li>';
            }
        }
        return $search_result;
    }

	function engagement_rings_category_search_result($search_field='') {
        $caterows = $this->Catemodel->get_engagement_cate_result( $search_field );

        $search_result = '';
        if( count($caterows) ) {
            foreach ( $caterows as $cate_rows ) {
                $details_link = SITE_URL . 'selection/engagement-rings-detail/'.$cate_rows['id'];
                $search_result .= '<li>';                
                $search_result .= '<span><a href="'.$details_link.'">'.$cate_rows['name'].'</a></span>'
                . '</li>';
            }
        }
        return $search_result;
    }

    function watches_category_search_result($search_field='') {
        $caterows = $this->Catemodel->get_watches_cate_result( $search_field );  // unique rings search

        $search_result = '';
        if( count($caterows) ) {
            foreach ( $caterows as $cate_rows ) {
                $details_link = SITE_URL . 'goldsourcediamond/watch-collection-detail/'.$cate_rows['productID'];
                $search_result .= '<li>';                
                $search_result .= '<span><a href="'.$details_link.'">'.$cate_rows['stock_real_number'].'</a></span>'
                . '</li>';
            }
        }
        return $search_result;
    }

	function stuller_wbands_search($str_search='') {
		$stuller_list = array(
			'stuller_new_rings/wedding_bands_diamond' => 'Diamond Wedding Bands',
			'stuller_new_rings/wedding_bands_ladies' => 'Ladies Wedding Bands',
			'stuller_new_rings/wedding_bands_platinum' => 'Wedding Bands',
			'stuller_new_rings/classic_wedding_bands_view' => 'Classic Wedding Bands',
			'stuller_new_rings/wedding_bands_mens' => 'Mens Wedding Bands',
			'stuller_new_rings/diamond_stud_earrings' => 'Diamond Stud Earrings',
			'stuller_new_rings/diamond_hoop_earings' => 'Diamond Hoops',
			'stuller_new_rings/gemstone_earings' => 'Gemstone Earrings',
			'stuller_new_rings/rolex_rings_listing' => 'Rolex Quality Gold',
			'rolexrings/rolex_rings_listing' => 'Pre-Owned Rolex Watch',
			'engagement/search' => 'Build Your Own Ring',
			'jewelry/build_earings' => 'Build Your Own Earrings',
			'jewelry/buildiamond_pendan' => 'Build Your Own Diamond Pendant',
			'jewelry/buildthree_stonesring' => 'Build Your Own Three-Stone Ring'
		);
		$search_list = '';

		foreach( $stuller_list as $search_key => $search_label) {
			$detail_link = SITE_URL . $search_key;
			$search_str = strripos($search_label, $str_search);   /// check last occurence of string case insensitive
			$search_str1 = stristr($search_label, $str_search);  // check first occurence of string case insensitive        
			if( !empty($search_str) || !empty($search_str1) ) {
				$search_list .= '<li><span><a href="'.$detail_link.'">'.$search_label.'</a></span></li>';
			}
		}

        return $search_list;
    }

	function unique_category_search_result($search_field='') {
        $caterows = $this->Catemodel->get_unique_cate_result( $search_field );  // unique rings search

        $search_result = '';
        if( count($caterows) ) {
            foreach ( $caterows as $cate_rows ) {
                $details_link = SITE_URL . 'testengagementrings/engagementrings/'.$cate_rows['id'];
                $search_result .= '<li>';                
                $search_result .= '<span><a href="'.$details_link.'">'.$cate_rows['catname'].'</a></span>'
                . '</li>';
            }
        }
        return $search_result;
    }

	/* diamond menu page */
	function preselect_engagement() {
		$data['sign_upform'] = $this->sign_upform;
		$output = $this->load->view('engagement/preselected_engagement', $data, true);
		$this->output($output, $data, true);
	}

	function ring() {
		$data = $this->getCommonData();
		$data['title'] = "Create Your Own Ring, Design Your Own Ring Online, Mens Titanium Rings,Fancy Colored Diamonds";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Create Your Own Ring, Design Your Own Ring Online, Mens Titanium Rings,Fancy Colored Diamonds">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy diamond promise rings, mens titanium ring, mens titanium rings, fancy colored diamonds, create your own ring, design your own ring online. Purchase discounted rate mens titanium rings, fancy colored diamonds online">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Buy diamond promise rings, mens titanium ring, mens titanium rings, fancy colored diamonds, create your own ring, design your own ring online. Purchase discounted rate mens titanium rings, fancy colored diamonds online">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        $output = $this->load->view('engagement/ringguide', $data, true);
        $this->output($output, $data);
	}

    function engagement_ring_settings($diamondid = '', $addoption = '', $sidestone1 = '', $sidestone2 = '', $extraoption = '') {
        $data = $this->getCommonData();
        $data['title'] = 'Engagement Ring Settings';
        $data['page'] = 'engagement';
        $data['addoption'] = $addoption;
        $data['lot'] = $diamondid;
        $data['setting_ring_id']   = $this->session->userdata('ringID');
        $ring_cate_id   = $this->session->userdata('ring_cate_id');
        $ringrq_fields = $this->session->userdata('rqring_fields');
        $data['d_id']  = $this->session->userdata('diamnd_id');
        if(isset($data['setting_ring_id']) && !empty($data['setting_ring_id'])) {
            $data['setting_image'] = $ringrq_fields['image_vurl'];
        } else {
            $data['setting_image'] = SITE_URL.'img/page_img/no_image.jpg';
        }
        if( !empty($data['d_id']) ) {
            $data['setting_price'] = _nf($ringrq_fields['ring_price'], 2);
            $data['view_link'] = SITE_URL . 'site/engagementRingDetail/'.$ring_cate_id.'/'.$data['setting_ring_id'];
            $row_diamond = $this->Diamondmodel->getDetailsByLot($data['d_id']);
            $diamond_shape = view_shape_value($shape_image, $row_diamond['shape']);
            $data['diamond_shapes'] = SITE_URL.'images/shapes_images/'.$shape_image;
            $data['diamond_price'] = _nf($row_diamond['price'], 2);
            $data['diamond_view_link'] = SITE_URL . 'diamonds/diamond_detail/'.$data['d_id'].'/addtoring/'.$data['setting_ring_id'];
            $data['ring_total_price'] = _nf( ($ringrq_fields['ring_price'] + $row_diamond['price']), 2 );
        }

        $minprice = 0; //$this->Jewelrymodel->getMinPrice();
        $maxprice = 1000000; //$this->Jewelrymodel->getMaxPrice();
		$data['work_bench'] = $this->workbenchRighSidebar();
		$data['extraheader'] = '';
        if (isset($_POST['min'])) {
            $minprice = $_POST['min'];
        }
        if (isset($_POST['max'])) {
            $maxprice = $_POST['max'];
        }
        $category = '';
        $cert = '';
        $cut = '';
		if(is_numeric($diamondid)) {
			$this->session->set_userdata('diamond_id', $diamondid);
		}
		$ringID = $this->session->userdata('ringID');
		$build_ring = $this->session->userdata('build_ring');

		if( isset($ringID) && !empty($ringID) ) {       
			if( !empty($build_ring) ) {
				redirect('engagement/complete_youring/'.$diamondid.'/'.$ringID.'/'.$addoption, 'refresh');   
			}
		}

        $unset_data = array('cut' => '', 'category' => '', 'cert' => '');
        $this->session->unset_userdata($unset_data);
        if (isset($_POST['category'])) {
            $category = $_POST['category'];
            $this->session->set_userdata('category', $category);
        }
        if (isset($_POST['cert'])) {
            $cert = $_POST['cert'];
            $this->session->set_userdata('cert', $cert);
        }
        if (isset($_POST['cut'])) {
            $cut = $_POST['cut'];
            $this->session->set_userdata('cut', $cut);
        }
        $data['category'] = $category;
        $data['minprice'] = $minprice;
        $data['maxprice'] = $maxprice;
        $data['addoption'] = $addoption;
        $this->session->set_userdata('addoption', $addoption);
		//$aa = $this->Commonmodel->getTabHeader('ring', $diamondid);

		$data['extraoption'] = '';
        $data['tabhtml'] = '';
        if ($diamondid != 'false') {
            if ($addoption == 'addtoring')
                $data['tabhtml'] = $this->Commonmodel->getTabHeader('ring', $diamondid);
            if ($addoption == 'tothreestone')
                $data['tabhtml'] = $this->Commonmodel->getThreeStoneTab('sidestone');
            $this->session->set_userdata('mydiamondid', $diamondid);
            $data['onloadextraheader'] = "getringresults();";
            $data['usetips'] = true;
            $output = $this->load->view('engagement/ring_settings', $data, true);
            $this->output($output, $data, false, false);
        }elseif ($extraoption != '') {
            $data['extraoption'] = $extraoption;
            $data['extraheader'] = '';
            $data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
            $data['onloadextraheader'] = "";
            if ($extraoption == "solitaire") {
                $data['onloadextraheader'] .= "$('#pavsechk').attr('checked',false);
				$('#solitairechk').attr('checked',true);
				$('#sidestoneschk').attr('checked',false);
				$('#threestonechk').attr('checked',false); 
				$('#mathingchk').attr('checked',false); ";
            }
            if ($extraoption == "sidestones") {
                $data['onloadextraheader'] .= "$('#pavsechk').attr('checked',false);
				$('#solitairechk').attr('checked',false);
				$('#sidestoneschk').attr('checked',true);
				$('#threestonechk').attr('checked',false); 
				$('#mathingchk').attr('checked',false); ";
            }
            if ($extraoption == "pave") {
                $data['onloadextraheader'] .= "$('#pavsechk').attr('checked',true);
				$('#solitairechk').attr('checked',false);
				$('#sidestoneschk').attr('checked',false);
				$('#threestonechk').attr('checked',false); 
				$('#mathingchk').attr('checked',false); ";
            }
            if ($extraoption == "threestone") {
                $data['onloadextraheader'] .= "$('#pavsechk').attr('checked',false);
				$('#solitairechk').attr('checked',false);
				$('#sidestoneschk').attr('checked',false);
				$('#threestonechk').attr('checked',true); 
				$('#mathingchk').attr('checked',false); ";
            }
            if ($extraoption == "matching") {
                $data['onloadextraheader'] .= "$('#pavsechk').attr('checked',false);
				$('#solitairechk').attr('checked',false);
				$('#sidestoneschk').attr('checked',false);
				$('#threestonechk').attr('checked',false); 
				$('#mathingchk').attr('checked',true); ";
            }
            $data['onloadextraheader'] .= "$('#anniversarychk').attr('checked',false);	
			$('#weddingbandchk').attr('checked',false); 
			$('#halochk').attr('checked',false); 
			$('#patinumchk').attr('checked',false);
			$('#whitegoldchk').attr('checked',false);
			$('#solitairechk').attr('checked',false);
			$('#sidestoneschk').attr('checked',false);
			$('#threestonechk').attr('checked',false);
			$('#mathingchk').attr('checked',false);
			$('#pavsechk').attr('checked',false);
			$('#ringshape').val();
			$('#pricerange1').val();
			$('#pricerange2').val();
			$('#marktchk').attr('checked',true); 
			$('#erdchk').attr('checked',true); 
			$('#vatchechk').attr('checked',true); 
			$('#daussichk').attr('checked',true); 
			$('#antiquechk').attr('checked',true); 
			$('#goldchk').attr('checked',false); 
			getringresults();
			$('#pricerange').slider({ 
				steps: 100, range: true, minValue : 1, slide:function(e,ui) {  	
					$('#pricerange1').val((parseInt($('#pricerange').slider('value', 0)))* ((" . $maxprice . "-" . $minprice . ")/100));
					$('#pricerange2').val(parseInt($('#pricerange').slider('value', 1)) * ((" . $maxprice . "-" . $minprice . ")/100));
				}, change: function(e,ui) { 
					$('#pricerange1').val((parseInt($('#pricerange').slider('value', 0)))* ((" . $maxprice . "-" . $minprice . ")/100));
					$('#pricerange2').val(parseInt($('#pricerange').slider('value', 1)) * ((" . $maxprice . "-" . $minprice . ")/100));
					getringresults();
				}
			});
			var so;";
            $data['usetips'] = true;
            $output = $this->load->view('engagement/ring_settings', $data, true);
            $this->output($output, $data, false, false);
		} else {
            header('location:' . config_item('base_url') . 'diamonds/search/true/false/addtoring');
        }
    }

	/* remove diamond */
	function remove_dimaond($id) {
		$this->session->unset_userdata('diamnd_id', '');
		redirect('engagement/choose_urdiamond', 'refresh');
	}

	/* remove ring */
	function remove_diam_ring($id) {
		$required_sfield = array('lot_id'=>'','image_vurl'=>'','metal_type'=>'','ring_size'=>'','ring_price'=>'','diam_count'=>'','rings_shape'=>'','rings_carat'=>'','prodct_name'=>'');
		$this->session->unset_userdata('ringID', '');
		$this->session->unset_userdata('rqring_fields', '');
		$pageLink = config_item('base_url');

		redirect('engagement/choose_urdiamond', 'refresh');
	}

	function get_minmax_value($dbcols='price', $addoption='') {
        if( $dbcols == 'price' ) {
            $minsField = "floor(min(price))";
            $maxsField = "ceil(max($dbcols))";
        } elseif( $dbcols == 'carat' ) {
            $minsField = "min(carat)";
            $maxsField = "max(carat)";
        } else {
           $minsField = "floor(min($dbcols))";
           $maxsField = "ceil(max($dbcols))";
        }
        $mc = $this->session->userdata('caratmin');
		$query = "SELECT $minsField mins, $maxsField maxs FROM dev_index WHERE price <> 0 AND fcolor_value = '' AND shape in ('PR','AS','E','R','O','M','P','H','B','C','CMB', '') AND cut in ('G','VG','EX','ID', '') AND color in ('D','E','F','G','H','I','J','K','L', '') AND clarity in ('IF','FL','VVS1','VVS2','VS1','VS2','SI1','SI2','SI3','I1', '') AND Flour in ('N','F','M','S','VS', '') AND Polish IN ('ID','EX','VG','G','F', '') AND Sym in ('ID','EX','VG','G','F', '')";
		$pairedOptions = array('tothree_stone', 'addpendantsetings_3stone', 'toearring');

		if( $mc > 0 &&  $addoption != 'toearring' ) {
			$minCarat = ( in_array($addoption, $pairedOptions) ? $mc / 2 : $mc );
			$query .= " AND carat >= '{$minCarat}'";
		}
		$sql = $this->db->query($query);
		$result = $sql->result_array();
		return $result[0];
	}

	/* choose your diamond */
	function choose_urdiamond($details=true, $shape=false, $option = 'addtoring', $ispremium=true, $settingsid = ''){
		$this->session->set_userdata('claritymax', 9);
		$data = $this->getCommonData();
		$data['signup_form'] = $this->sign_upform;
		$data ['title'] = 'Diamonds';
		if($details == false) {
			$this->session->unset_userdata('shape');
		}
		$ringtype = $this->Diamondmodel->checkRingType($this->session->userdata('ringID'));
		if(isset($ringtype->costar_id) && $ringtype->costar_id > 0){
			$data['work_bench'] = $this->workbenchRingCostarSidebar();
		}elseif(isset($ringtype->overnight_id) && $ringtype->overnight_id > 0){
			$data['work_bench'] = $this->workbenchRingOvernightSidebar();
		}else{
			$data['work_bench'] = $this->workbenchRighSidebar();
		}
		$data['setting_ring_id']   = $this->session->userdata('ringID');
		$ring_cate_id   = $this->session->userdata('ring_cate_id');
		$ringrq_fields = $this->session->userdata('rqring_fields');
		if(isset($data['setting_ring_id']) && !empty($data['setting_ring_id'])) {
			$data['setting_image'] = $ringrq_fields['image_vurl'];
		} else {
			$data['setting_image'] = SITE_URL.'img/page_img/no_image.jpg';
		}
		$data['setting_price'] = _nf($ringrq_fields['ring_price'], 2);
		$hearts_collection = $this->session->userdata('hearts_collection');
		if(isset($ringtype->costar_id) && $ringtype->costar_id > 0){
			$data['view_link'] = SITE_URL .'selection/engagement-rings-detail/'.$data['setting_ring_id'];
		}elseif(isset($ringtype->overnight_id) && $ringtype->overnight_id > 0){
			$data['view_link'] = SITE_URL .'selection/engagement-rings-detail/'.$data['setting_ring_id'];
		}else{
			if( !empty($hearts_collection) ) {
				$data['view_link'] = SITE_URL .'heartdiamond/collection_ring_detail/'.$data['setting_ring_id'];
			} else {
				$data['view_link'] = SITE_URL .'selection/engagement-rings-detail/'.$ring_cate_id.'/'.$data['setting_ring_id'];
			}
		}

        $shapearray = array(
			'B',
			'H',
			'M',
			'AS',
			'PR',
			'P',
			'E',
			'C',
			'R',
			'O'
		);
        if (in_array($shape, $shapearray)) {
            $this->session->set_userdata('shape', $shape);
            $this->session->set_userdata('cutmin', 0);
            $this->session->set_userdata('cutmax', 4);
        }
        if ($ispremium)
            $this->session->set_userdata('ispremium', true);
        else
            $this->session->set_userdata('ispremium', false);
        $minprice = 250;
        $maxprice = 1000000;
        switch ($option) {
            case 'tothreestone' :
                $this->session->set_userdata('caratmin', .5);
                $this->session->set_userdata('caratmax', 3.50);
                $minprice = (($this->session->userdata('searchminprice')) ? $this->session->userdata('searchminprice') : 250);
                $maxprice = (($this->session->userdata('searchmaxprice')) ? $this->session->userdata('searchmaxprice') : 1000000);
                $caratminmax = array(
                    'min' => 0.5,
                    'max' => '3.50'
				);
                break;
            case 'addpendantsetings3stone' :
                $this->session->set_userdata('caratmin', .5);
                $this->session->set_userdata('caratmax', 3.50);
                $caratminmax = array(
                    'min' => 0.5,
                    'max' => '3.50');
                break;
            case 'toearring' :
                $this->session->set_userdata('caratmin', 0);
                $this->session->set_userdata('caratmax', 3.5);
                $caratminmax = array(
                    'min' => 0,
                    'max' => 3.5);
                $minprice = (($this->session->userdata('searchminprice')) ? $this->session->userdata('searchminprice') : 250);
                $maxprice = (($this->session->userdata('searchmaxprice')) ? $this->session->userdata('searchmaxprice') : 1000000);
                break;
            default :
                $caratminmax = $this->Diamondmodel->getMinMaxCarat();
                $this->session->set_userdata('caratmin', $caratminmax['min']);
                $this->session->set_userdata('caratmax', $caratminmax['max']);
                $minprice = (($this->session->userdata('searchminprice')) ? $this->session->userdata('searchminprice') : 250);
                $maxprice = (($this->session->userdata('searchmaxprice')) ? $this->session->userdata('searchmaxprice') : 1000000);
                break;
        }
        $data ['caratminmax'] = $caratminmax;
        $data ['option'] = $option;
        $data ['addoption'] = $option;
        $data ['settingsid'] = $settingsid;
        $depthminmax = $this->Jewelleriesmodel->getDepthMinMax();
        $data ['depthmin'] = $depthminmax [0];
        $data ['depthmax'] = $depthminmax [1];
        $tableminmax = $this->Jewelleriesmodel->getTableMinMax();
        $data ['tablemin'] = $tableminmax [0];
        $data ['tablemax'] = $tableminmax [1];
        if (strcmp($option, 'tothreestone') === 0) {
            $minpricepercrt = .5;
            $maxpricepercrt = 3.5;
        } else {
            $minpricepercrt = $this->Diamondmodel->getMinPricePerCarat();
            $maxpricepercrt = $this->Diamondmodel->getMaxPricePerCarat();
        }

        $data ['totaldiamond'] = $this->Diamondmodel->getCountDiamond($minprice, $maxprice);
        if (isset($_POST ['resumesearch'])) {
            $details = true;
        }
        $this->session->unset_userdata('clarity_list');
        $this->session->unset_userdata('colrs_valist');
        $this->session->unset_userdata('advanced_search');
        $carat_min = $this->session->userdata('caratmin');
        $carat_max = $this->session->userdata('caratmax');
        $mins_price = $this->session->userdata('searchminprice');
        $maxs_price = $this->session->userdata('searchmaxprice');
        $cuts_min = round($this->session->userdata('cutmin'));
        $cuts_max = round($this->session->userdata('cutmax'));
        $colrs_min = $this->session->userdata('colormin');
        $colrs_max = $this->session->userdata('colormax');
        $clarity_min = $this->session->userdata('claritymin');
        $clarity_max = $this->session->userdata('claritymax');
        $pairedOptions = array('tothree_stone', 'addpendantsetings_3stone', 'toearring');

        $caratCol = $this->get_minmax_value('carat', $option);
        $priceCol = $this->get_minmax_value('price', $option);
        $tablePrce = $this->get_minmax_value('TablePercent', $option);

        $data['min_depth'] = 49;
        $data['max_depth'] = 89;
        $data['min_carat'] = $caratCol['mins']; //45;
        $data['max_carat'] = 15; //$caratCol['maxs']; //80;
        $data['min_table'] = $tablePrce['mins']; //50; //$filter_value['mintable'];
        $data['max_table'] = $tablePrce['maxs']; //83; //$filter_value['maxtable'];
        $data['minm_price']  = $priceCol['mins'];
        $data['maxim_price'] = $priceCol['maxs'];
        $adoptionSet = array('toearring','addpendantsetings_3stone', 'tothree_stone');
        $ringcarat = $this->session->userdata('ringcarat');
        if( $option == 'toearring' ) {
            $data['carat_mstart'] = 0.36;
        } elseif( $option == 'tothreestone' ) {
            $data['carat_mstart'] = ( $ringcarat > 0 ? $ringcarat : 0.36 );
        } elseif(in_array ($option, $adoptionSet) ) {
            $data['carat_mstart'] = 0.46;
        } else {
            $data['carat_mstart'] = ( !empty($carat_min) ? $carat_min : $caratCol['mins'] );
        }        
        $data['carat_mend']  = ( !empty($carat_max) ? $carat_max : $caratCol['maxs'] );
        $price_start = ( !empty($mins_price) ? $mins_price : $priceCol['mins'] );
        if( in_array ($option, $adoptionSet) ) { /// 3 stone rings paired seting
            $data['price_start'] = $priceCol['mins'];
        } elseif( in_array($option, $pairedOptions) ) {
            $data['price_start'] = $price_start / 3; /// when there are paired diamond then the sum of prices be shown that is why it is divided
        } else {
            $data['price_start'] = $price_start;
        }
        $data['price_end']   = ( !empty($maxs_price) ? $maxs_price : $priceCol['maxs'] );
        $data['cut_start']   = ( !empty($cuts_min) ? $cuts_min : 0 );
        $data['cut_end']     = ( !empty($cuts_max) ? $cuts_max : 3 );
        $data['color_start'] = ( !empty($colrs_min) ? $colrs_min : 0 );
        $data['color_end']   = ( !empty($colrs_max) ? $colrs_max : 8 );
        $data['clarity_start'] = ( !empty($clarity_min) ? $clarity_min : 0 );
        $data['clarity_end']   = ( !empty($clarity_max) ? $clarity_max : 9 );
        $data['grid_pageno']   = $this->session->userdata('grid_pageno');
        $data['shape_value'] = $shape;
        $data ['diamonds_shape'] = view_shape_value($diamondimg, $shape);
        $data ['details_search'] = ( $details == 'false' ? '' : 'true' );

        if ($details == 'true') {
            if (isset($_POST ['searchdiamonds'])) {
                $this->session->set_userdata('searchminprice', $minprice);
                $this->session->set_userdata('searchmaxprice', $maxprice);
                $array_items = array(
                    'depthmin' => '',
                    'depthmax' => '',
                    'tablemin' => '',
                    'tablemax' => '',
                    'cutmin' => '',
                    'cutmax' => '',
                    'colormin' => '',
                    'colormax' => '',
                    'fluromin' => '',
                    'fluromax' => '',
                    'polismin' => '',
                    'polismax' => '',
                    'symmetmin' => '',
                    'symmetmax' => '',
                    'pricePerCaratmin' => '',
                    'pricePerCaratmax' => '',
                    'claritymin' => '',
                    'claritymax' => '',
                    'mydiamond' => '',
                    'ispremium' => false
				);
                $this->session->unset_userdata($array_items);
            } else {
                $array_items = array(
                    'depthmin' => '',
                    'depthmax' => '',
                    'tablemin' => '',
                    'tablemax' => '',
                    'cutmin' => '',
                    'cutmax' => '',
                    'colormin' => '',
                    'colormax' => '',
                    'fluromin' => '',
                    'fluromax' => '',
                    'polismin' => '',
                    'polismax' => '',
                    'symmetmin' => '',
                    'symmetmax' => '',
                    'pricePerCaratmin' => '',
                    'pricePerCaratmax' => '',
                    'claritymin' => '',
                    'claritymax' => '',
                    'mydiamond' => '',
                    'ispremium' => false
				);
                $this->session->unset_userdata($array_items);
            }
            $minprice = ($this->session->userdata('searchminprice') && ($this->session->userdata('searchminprice') > $minprice) && ($this->session->userdata('searchminprice') < $maxprice)) ? ($this->session->userdata('searchminprice')) : $minprice;
            $maxprice = ($this->session->userdata('searchmaxprice') && ($this->session->userdata('searchmaxprice') < $maxprice) && ($this->session->userdata('searchmaxprice') > $minprice)) ? ($this->session->userdata('searchmaxprice')) : $maxprice;
            $minpricepercrt = ($this->session->userdata('caratmin') && ($this->session->userdata('caratmin') > $minpricepercrt) && ($this->session->userdata('caratmin') < $maxpricepercrt)) ? ($this->session->userdata('caratmin')) : $minpricepercrt;
            $maxpricepercrt = ($this->session->userdata('caratmax') && ($this->session->userdata('caratmax') < $maxpricepercrt) && ($this->session->userdata('caratmax') > $minpricepercrt)) ? ($this->session->userdata('caratmax')) : $maxpricepercrt;
            $data ['minprice'] = $minprice;
            $data ['maxprice'] = $maxprice;
            $data ['minpricepercrt'] = $minpricepercrt;
            $data ['maxpricepercrt'] = $maxpricepercrt;
        } else {
            $data ['minprice'] = $minprice;
            $data ['maxprice'] = $maxprice;

            $lastsearchMin = $this->session->userdata('searchminprice');
            $lastsearchMax = $this->session->userdata('searchmaxprice');
            $this->session->set_userdata('lastsearchMin', $lastsearchMin);
            $this->session->set_userdata('lastsearchMax', $lastsearchMax);
            $data ['lastminpr'] = ($lastsearchMin == '') ? $data ['minprice'] : $lastsearchMin;
            $data ['lastmaxpr'] = ($lastsearchMax == '') ? $data ['maxprice'] : $lastsearchMax;
            $data ['diashape'] = $this->session->userdata('shape');
            $data ['shapename'] = $this->getShapeName($data ['diashape']);
        }

        $url = '';
        if ($option != '' && $settingsid != '') {
            $url = config_item('base_url') . "diamonds/getsearchresult/" . $option . "/" . $settingsid;
        } elseif ($option != '') {
            $url = config_item('base_url') . "diamonds/getsearchresult/" . $option;
        } else {
            $url = config_item('base_url') . "diamonds/getsearchresult";
        }
        if ($details && $details == 'true') {
			$data ['onloadextraheader'] = "";
			$data ['extraheader'] = '';
			$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/diamondsearch.css" rel="stylesheet" />';
			$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/papillon.css" rel="stylesheet" />';
			$data ['extraheader'] .= '<script language="javascript" type="text/javascript">var qipurl = "' . $url . '";</script>';
			$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/jquery.cookies.2.2.0.min.js"></script>';
			$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/papillon.js"></script>';
			$data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/common_function.js"></script>';
			$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script>';
			$data ['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
			$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" />';
			$data ['bodyonload'] = 'initialize()';
			$data ['bodyonunload'] = 'GUnload()';
			$data ['usetips'] = true;
            $data['title'] = "diamond anniversary band|diamond bridal sets|diamond solitaire pendant| blue diamond jewelry";
            $data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
			<meta name="title" content="diamond anniversary band|diamond bridal sets|diamond solitaire pendant| blue diamond jewelry">
			<meta name="ROBOTS" content="INDEX,FOLLOW">
			<meta name="description" content="Buy online fair trade diamond, loose gia diamond, wholesale certified diamonds, 
			diamond anniversary band, diamond bridal sets, diamond solitaire pendant, blue diamond jewelry. Purchase discounted rate diamond anniversary band, diamond bridal sets, diamond solitaire pendant,  blue diamond jewelry">
			<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
			<meta name="keywords" content="fair trade diamond, loose gia diamond, wholesale certified diamonds, 
			diamond anniversary band, diamond bridal sets, diamond solitaire pendant, blue diamond jewelry. Purchase discounted rate diamond anniversary band, diamond bridal sets, diamond solitaire pendant,  blue diamond jewelry">
			<meta name="author" content="Heartsanddiamonds">
			<meta name="publisher" content="Heartsanddiamonds">
			<meta name="copyright" content="Heartsanddiamonds">
			<meta http-equiv="Reply-to" content="">
			<meta name="creation_Date" content="12/12/2008">
			<meta name="expires" content="">
			<meta name="revisit-after" content="7 days">
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';

			$data['radomprodects'] = $this->Jewelleriesmodel->getrandomproduct($settingsid);//for random product display on right
			$output = $this->load->view('engagement/choose_urdiamond', $data, true);
			$this->output($output, $data, false, false);
        } else {
			$data['title'] = "diamond anniversary band|diamond bridal sets|diamond solitaire pendant| blue diamond jewelry";
			$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
			<meta name="title" content="diamond anniversary band|diamond bridal sets|diamond solitaire pendant| blue diamond jewelry">
			<meta name="ROBOTS" content="INDEX,FOLLOW">
			<meta name="description" content="Buy online fair trade diamond, loose gia diamond, wholesale certified diamonds,
			diamond anniversary band, diamond bridal sets, diamond solitaire pendant, blue diamond jewelry. Purchase discounted rate diamond anniversary band, diamond bridal sets, diamond solitaire pendant,  blue diamond jewelry">
			<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
			<meta name="keywords" content="fair trade diamond, loose gia diamond, wholesale certified diamonds,
			diamond anniversary band, diamond bridal sets, diamond solitaire pendant, blue diamond jewelry. Purchase discounted rate diamond anniversary band, diamond bridal sets, diamond solitaire pendant,  blue diamond jewelry">
			<meta name="author" content="Heartsanddiamonds">
			<meta name="publisher" content="Heartsanddiamonds">
			<meta name="copyright" content="Heartsanddiamonds">
			<meta http-equiv="Reply-to" content="">
			<meta name="creation_Date" content="12/12/2008">
			<meta name="expires" content="">
			<meta name="revisit-after" content="7 days">
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
			$output = $this->load->view('engagement/choose_urdiamond', $data, true);
			$this->output($output, $data);
		}
	}

    function remove_unique_setting() {
        $this->session->unset_userdata('diamnd_id');
        $this->session->unset_userdata('ring_type');
        $this->session->unset_userdata('ringID');
        $this->session->unset_userdata('shape');
        $this->session->unset_userdata('ring_cate_id');
        $this->session->unset_userdata('rqring_fields');

        redirect('engagement/engagement_ring_settings/0/addtoring', 'refresh');
    }

    function engagement_product_settings($id, $addoption = '', $sidestone1 = '', $sidestone2 = '', $extraoption = '') {
        $data = $this->getCommonData();
        $data['title'] = 'Engagement Product Settings';
        $data['addoption'] = $addoption;
        $data['lot'] = $id;
        $minprice = 0; //$this->Jewelrymodel->getMinPrice();
        $maxprice = 1000000; //$this->Jewelrymodel->getMaxPrice();
        $data['minprice'] = $minprice;
        $data['maxprice'] = $maxprice;
        $data['addoption'] = $addoption;
        $this->session->set_userdata('addoption', $addoption);
        $data['details'] = $this->Diamondmodel->getDetailsByLotproduct($id);
        $data['extraoption'] = '';
        $data['tabhtml'] = '';
        if ($id != '') {
            if ($addoption == 'addtoring')
                $data['tabhtml'] = $this->Commonmodel->getTabHeader('ring', $id);
            if ($addoption == 'tothreestone')
                $data['tabhtml'] = $this->Commonmodel->getThreeStoneTab('sidestone');

            $this->session->set_userdata('mydiamondid', $id);
            $data['extraheader'] = '';
            $data['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script><script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
            $data['onloadextraheader'] = "getproductresults('" . $id . "');
			$('#pricerange').slider({
				steps: 100, range: true, minValue : 1, slide:   function(e,ui) { 
					if($('#pricerange').slider('value',0) <= 30) {
						val = ($('#pricerange').slider('value',0)*25+(" . $minprice . "));
						$('#pricerange1').val(val);
					}else if($('#pricerange').slider('value',0) > 30 && $('#pricerange').slider('value',0) <= 50) {
						val = ($('#pricerange').slider('value',0)*75+(" . $minprice . "));
						$('#pricerange1').val(val);
					}else if($('#pricerange').slider('value',0) > 50 && $('#pricerange').slider('value',0) <= 70) {
						val = ($('#pricerange').slider('value',0)*250+(" . $minprice . "));
						$('#pricerange1').val(val);
					}else if($('#pricerange').slider('value',0) > 70 && $('#pricerange').slider('value',0) <= 80) {
						val = ($('#pricerange').slider('value',0)*1000+(" . $minprice . "));
						$('#pricerange1').val(val);
					}else if($('#pricerange').slider('value',0) > 80 && $('#pricerange').slider('value',0) <= 90) {
						val = ($('#pricerange').slider('value',0)*10000+(" . $minprice . "));
						$('#pricerange1').val(val);
					}else if($('#pricerange').slider('value',0) > 90 && $('#pricerange').slider('value',0) < 98){
						val = ($('#pricerange').slider('value',0)*20000+(" . $minprice . "));
						$('#pricerange1').val(val);
					}else{
						$('#pricerange1').val(" . $maxprice . ");
					}
					// pricerange2
					if($('#pricerange').slider('value',1) <= 30 && $('#pricerange').slider('value',1) >1){
						val = ((-1)*$('#pricerange').slider('value',1)*25+(" . $maxprice . "));
						$('#pricerange2').val(val);
					}else if($('#pricerange').slider('value',1) > 30 && $('#pricerange').slider('value',1) <= 50) {
						val = ((-1)*$('#pricerange').slider('value',1)*75+(" . $maxprice . "));
						$('#pricerange2').val(val);
					}else if($('#pricerange').slider('value',1) > 50 && $('#pricerange').slider('value',1) <= 70){
						val = ((-1)*$('#pricerange').slider('value',1)*250+(" . $maxprice . "));
						$('#pricerange2').val(val);
					}else if($('#pricerange').slider('value',1) > 70 && $('#pricerange').slider('value',1) <= 80){
						val = ((-1)*$('#pricerange').slider('value',1)*1000+(" . $maxprice . "));
						$('#pricerange2').val(val);
					}else if($('#pricerange').slider('value',1) > 80 && $('#pricerange').slider('value',1) <= 90){
						val = ((-1)*$('#pricerange').slider('value',1)*10000+(" . $maxprice . "));
						$('#pricerange2').val(val);
					}else if($('#pricerange').slider('value',1) > 90 && $('#pricerange').slider('value',1) < 98) {
						val = ((-1)*$('#pricerange').slider('value',1)*20000+(" . $maxprice . "));
						$('#pricerange2').val(val);
					}else if($('#pricerange').slider('value',1)==1) {
						$('#pricerange2').val(" . $minprice . ");
					}else {
						$('#pricerange2').val(" . $maxprice . ");
					}
				}, change: function(e,ui) { 
					getringresults1();	 
				}
			});
			var so;";
            $data['usetips'] = true;
            $output = $this->load->view('engagement/ring_settings1', $data, true);
            $this->output($output, $data, false, false);
		}else {
            header('location:' . config_item('base_url') . 'diamonds/search/true/false/addtoring');
        }
    }

	function getRingsByCate($id='', $pageLimit=9) {
		$results = $this->Catemodel->getRingsByCateory($id, 0, $pageLimit, '', '', '', '', 'build');
		$trialUserLogo = get_trial_user_logo();
		$returnhtml = '';
		if( count($results['results']) > 0 ) {
			foreach($results['results'] as $row_gn) {
				$cuprice = $row_gn['priceRetail'];
				/* $ringPrice = 'Please Call '.CONTACT_NO.' for Price Quote'; */
				$cur_stones1 = explode(',',$row_gn['supplied_stones']);
				$req_tot = 0;
				if(!empty($cur_stones1)){
					foreach($cur_stones1 as $cur_stone1){
						$req_data = explode('-',$cur_stone1);
						$req_tot = $req_tot + (int)$req_data[0];
					}
					$req_tot = $req_tot +1;
				}
				$weightigrm = str_replace(" grams","",$row_gn['metal_weight']);
				$metalprc = 70*$weightigrm;
				$stonprc = 14*$req_tot;
				$semiMountprce = $metalprc+$stonprc;
				$finalsemiMountprce = $semiMountprce*1.5;
				$ringPrice = _nf($finalsemiMountprce,2);
				//$uniqueprice = $this->Jewelleriesmodel->getUniquePrice($data['details']->style_group);
				$ringsImage = $this->Catemodel->getRingsImgViaId($row_gn['name']);
				$ringImage = config_item('base_url').'scrapper/imgs/'.$ringsImage['ImagePath'];
				$detailPageLink = config_item('base_url').'site/engagementRingDetail/'.$row_gn['catid'].'/'.$row_gn['ring_id'];
				$returnhtml .= '<div class="engagement-product col-sm-4">
				<a href="'.$detailPageLink.'" target="_blank">
					 <div class="ringtile">
					 <div class="setringsbg_bk">'.$trialUserLogo.'</div>
					 <img style=" width:160px;height: 160px;" id="ringbigimage10267" src="'.$ringImage.'" /><br></div></a>
					 <div><a href="'.$detailPageLink.'" target="_blank">
					 <div class="lefticon_image"><img src="'.config_item('base_url').'img/page_img/grdw-ar.jpg" alt="Diamond List"></div></a>
					 <div class="pricebk_list"><a href="'.$detailPageLink.'" target="_blank">
					 <div class="txtsmall"> '.$row_gn['name'].'</div>
					 <div class="txtsmall">$'.$ringPrice.'</div></a>
				<a href="'.$detailPageLink.'" target="_blank" class="viewdt_block">View Details</a></div></div><div> </div>
				<br></div>';
			}
		} else {
			$returnhtml .= '<div class="norings_found">No Rings Found</div>';
		}
		echo $returnhtml;
	}

    function getringresults($isPave = true, $Solitaire = true, $Sidestone = true, $platinum = true, $gold = true, $whitegold = true, $anniversary = true, $weddingband = true, $minprice = 0, $maxprice = 1000000, $shape = 'all', $page = 0, $isMarkt = '', $isErd = '', $isVatche = '', $isDaussi = '', $isAntique = '', $isThreestone = true, $isHalo = true, $isMatching = true,$lot = 0,$signat_sett='signat_seting',$other_design=false,$rings_sshape='false') {
        $start = ($page == 'undefined') ? 0 : $page;
        $lot = ($lot == 'undefined') ? 0 : $lot;
        $category = $this->session->userdata('category');
        $cert = $this->session->userdata('cert');
        $cut = $this->session->userdata('cut');
        $rp = 15;
        $results = $this->Engagementmodel->getRings($start, $rp, $isPave, $Solitaire, $Sidestone, $platinum, $gold, $whitegold, $anniversary, $weddingband, $minprice, $maxprice, $shape, $isMarkt, $isErd, $isVatche, $isDaussi, $isAntique, $isThreestone, $isHalo, $isMatching, $category, $cert, $cut);
		$trialUserLogo = get_trial_user_logo();

        $returnhtml = '';
        $paginlinks = $this->Sitepaging->getPageing($results['count'], 'rings', $start, 'price', $rp);
        $addoption = $this->session->userdata('addoption');
		
		$row_gn = $this->Engagementmodel->getGenericProducts($Solitaire, $signat_sett, $rings_sshape, $other_design);
		if(isset($row_gn['cate']) && count($row_gn['cate']) > 0 ) {
			foreach($row_gn['cate'] as $rowcate) {
				$cateRingImage = RINGS_IMAGE.'crone/'.$rowcate['image'];
				$returnhtml .= '<div class="engagement-product col-sm-4">
					<a href="#javascript;" onclick="getRingsByCate(\''.$rowcate['id'].'\', \'9\')">
					 <div class="ringtile">
					 <div class="setringsbg_bk">'.$trialUserLogo.'</div>
					 <img style=" width:160px;height: 160px;" id="ringbigimage10267" src="'.$cateRingImage.'" /><br></div></a>
					 <div>
					 <div class="lefticon_image"><img src="'.config_item('base_url').'img/page_img/grdw-ar.jpg" alt="'.$rowcate['catname'].'"></div>
					 <div class="pricebk_list">
					 <div class="txtsmall"> '.$rowcate['catname'].'</div>
					<a href="#javascript" onclick="getRingsByCate(\''.$rowcate['id'].'\', \'9\')" class="viewdt_block">View Rings</a></div></div><div> </div>
				<br></div>';
			}
			echo $returnhtml;
			exit;
		}

		if($Solitaire) {
			if (!empty($row_gn['result'])) {
				for($i=0;$i<count($row_gn['result']);$i++) {
					$cuprice = $row_gn['result'][$i]['priceRetail'];
					$ringPrice = ( $cuprice > 0 ? '$'._nf($cuprice).' Price' : 'Call: '.CONTACT_NO.'  for Prices' );
					$ringsImage = $this->Catemodel->getRingsImgViaId($row_gn['result'][$i]['name']);
					$ringImage = config_item('base_url').'scrapper/imgs/'.$ringsImage['ImagePath'];
					$detailPageLink = config_item('base_url').'site/engagementRingDetail/'.$row_gn['result'][$i]['catid'].'/'.$row_gn['result'][$i]['ring_id'];
					$returnhtml .= '<div class="engagement-product col-sm-4">
					<a href="'.$detailPageLink.'" target="_blank">
						 <div class="ringtile">
						 <div class="setringsbg_bk">'.$trialUserLogo.'</div>
						 <img style=" width:160px;height: 160px;" id="ringbigimage10267" src="'.$ringImage.'" /><br></div></a>
						 <div><a href="'.$detailPageLink.'" target="_blank">
						 <div class="lefticon_image"><img src="'.config_item('base_url').'img/page_img/grdw-ar.jpg" alt="Diamond List"></div></a>
						 <div class="pricebk_list"><a href="'.$detailPageLink.'" target="_blank">
						 <div class="txtsmall"> '.$row_gn['result'][$i]['name'].'</div>
						 <div class="txtsmall"> '.$ringPrice.'</div></a>
					<a href="'.$detailPageLink.'" target="_blank" class="viewdt_block">View Details</a></div></div><div> </div>
					<br></div>';
				}
			}
		} else {
			if (!empty($results['result'])) {
				foreach ($results['result'] as $row) {
					$price = $this->Jewelrymodel->get_update_price($row['price'], 'dev_helix_jwelery_prices');
					$white_gold_price = $this->Jewelrymodel->get_update_price($row['white_gold_price'], 'dev_helix_jwelery_prices');
					$yellow_gold_price = $this->Jewelrymodel->get_update_price($row['yellow_gold_price'], 'dev_helix_jwelery_prices');
					$detail_pglink = config_item('base_url').'engagement/build_ring_detail/'.$row['stock_number'];
					$returnhtml .= '<div class="engagement-product col-sm-4" >';
					$returnhtml .= '<a href="'.$detail_pglink.'">
											<div class="ringtile">
												 <div class="setringsbg_bk"><img src="'.$trialUserLogo.'" alt="'.$row_gn['name'].'"></div>
												 <img  style=" width:160px;height: 160px;" id="ringbigimage' . $row['stock_number'] . '" src="';
					$pth = substr(FCPATH,0,-10);
					if ($gold == 'gold') {
						$img = file_exists($pth . '/images/rings/carat' . $row['carat_image']) ? config_item('base_url') . 'images/rings/carat' . $row['carat_image'] : config_item('base_url') . 'images/rings/noimage.jpg';
						// $img = '';	
					} else {
						$img = file_exists($pth . '/images/rings/' . $row['small_image']) ? config_item('base_url') . 'images/rings/' . $row['small_image'] : config_item('base_url') . 'images/rings/noimage.jpg';
						// $img = '';
					}
					$returnhtml .= $img . '" /><br></div>';			
					 $returnhtml .=	'<div><div class="lefticon_image"><img src="'.config_item('base_url').'img/page_img/grdw-ar.jpg" alt="Diamond List" /></div>
									 <div class="pricebk_list"><div class="txtsmall"> $' . $price . '-' . $row['metal'] . '</div>
										  <div class="txtsmall"> $' . $yellow_gold_price . '- Yellow Gold' . '</div>
										  <div class="txtsmall"> $' . $white_gold_price . '- White Gold' . '</div>';
					//$returnhtml .= '<a href="javascript:void(0)"  onclick="viewRingsDetails(' . $row['stock_number'] . ',' . $lot . ')" class="viewdt_block">View Details</a>';
					$returnhtml .= '<a href="'.$detail_pglink.'" class="viewdt_block">View Details</a>';
					$returnhtml .= '</div></div><div>';
	
					$shapes = $this->Engagementmodel->getShapeByStockId($row['stock_number']);
					if(isset($shapes) && !empty($shapes)){
						$returnhtml .= '<div id="ringdiamondshapes' . $row['stock_number'] . '" >';
						foreach ($shapes as $shape) {
	
							$returnhtml .= '<div class="inline shapetile"><img  id="shape' . $shape['id'] . '" src="' . config_item('base_url') . '/images/diamonds/' . strtolower($shape['shape']) . '.jpg" height="20px" width="20px" title="' . $shape['shape'] . '"  onclick="$(\'#ringbigimage' . $row['stock_number'] . '\').attr(\'src\',\'' . config_item('base_url') . 'images/rings/' . $shape['image'] . '\'); $(\'#ringdiamondshapes' . $row['stock_number'] . ' img\').css(\'border\',\'0px solid #000\'); $(\'#shape' . $shape['id'] . '\').css(\'border\',\'1px solid #000\');"></div>';
						}
						//echo '<div class="clear"></div>';
						$returnhtml .= ' </div>';
					}
					$returnhtml .= ' </div></a>
										 <br></div>';
				}
			} else {
				$returnhtml .= '<p style=color:red;font-size:13px;font-weight:Bold;font-family:arial;>' . $returnhtml . '</p>';
			} //// end second else
		} //// end firset else
        //<div class="hr clear"></div>
        //$returnhtml .= '' . $paginlinks;
		$returnhtml .= '<div class="clear"></div><br>';
		
		echo $returnhtml;
    }

	function get_ring_result($isPave = true, $Solitaire = true, $Sidestone = true, $platinum = true, $gold = true, $whitegold = true, $anniversary = true, $weddingband = true, $minprice = 0, $maxprice = 1000000, $shape = 'all', $page = 0, $isMarkt = '', $isErd = '', $isVatche = '', $isDaussi = '', $isAntique = '', $isThreestone = true, $isHalo = true, $isMatching = true,$lot = 0,$signat_sett='signat_seting',$other_design=false) {
		
        $start = ($page == 'undefined') ? 0 : $page;
        $lot = ($lot == 'undefined') ? 0 : $lot;
        $category = $this->session->userdata('category');
        $cert = $this->session->userdata('cert');
        $cut = $this->session->userdata('cut');
        $rp = 15;
        $results = $this->Engagementmodel->getRings($start, $rp, $isPave, $Solitaire, $Sidestone, $platinum, $gold, $whitegold, $anniversary, $weddingband, $minprice, $maxprice, $shape, $isMarkt, $isErd, $isVatche, $isDaussi, $isAntique, $isThreestone, $isHalo, $isMatching, $category, $cert, $cut);
		
		//print_r($resultsgn);
        $returnhtml = '';
        $paginlinks = $this->Sitepaging->getPageing($results['count'], 'rings', $start, 'price', $rp);
        $addoption = $this->session->userdata('addoption');
				
		$row_gn = $this->Engagementmodel->getGenericProducts();
		
		//print_ar($row_gn);
		
		if($signat_sett == 'signat_seting') { //// view generice products
			//$i=0;
			if (!empty($row_gn['result'])) {
				//foreach ($resultsgn['result'] as $row_gn) { 
				$j=1;
				for($i=0;$i<count($row_gn['result']);$i++) {
					$uniqueprice = $this->Jewelleriesmodel->getPricesUnique($row_gn['result'][$i]['style_group']);
					$cuprice=$org_price=$uniqueprice['price'];
                    $cuprice= $cuprice*2.5;
                    $cuprice1=$cuprice;
                    $cuprice15=$cuprice*15/100;
                    $cuprice=$cuprice-$cuprice15;
					$margin = ( ($i+3)%3 == 0 ? '' : ' margin-left: 12px;' );
					
					$ringPrice = ( $cuprice > 0 ? '$'._nf($cuprice).' Price' : 'Call: '.CONTACT_NO.'  for Prices' );
					$ringsImage = $this->Catemodel->getRingsImgViaId($row_gn['result'][$i]['name']);
					$ringImage = config_item('base_url').'scrapper/imgs/'.$ringsImage['ImagePath'];
					$detailPageLink = config_item('base_url').'site/engagementRingDetail/'.$row_gn['result'][$i]['catid'].'/'.$row_gn['result'][$i]['id'];
					
					$returnhtml .= '<div style="'.$margin.'" class="engagement-product col-sm-4">
					<a href="'.$detailPageLink.'" target="_blank">
							    		 <center>
								    		 <div class="ringtile">
								    		 <img style=" width:120px;height: 122px;" id="ringbigimage10267" src="'.$ringImage.'" width="70"><br></div>
											 </center></a>
											 <div>
											 <div class="pricebk_list"><a href="'.$detailPageLink.'" target="_blank">';
						$returnhtml .= '<br><br><div class="txtsmall"></div>';
						$returnhtml .= '<div class="pricebk"><span>'.$ringPrice.'</span></div>';
						/*$returnhtml .= '<div class="pricebk1"><span>$'.$ringPrice.'</span> Yellow Gold</div>';
						$returnhtml .= '<div class="pricebk"><span>$'.$ringPrice.'</span> White Gold</div>';*/
						$returnhtml .= '<a href="'.$detailPageLink.'" target="_blank" class="viewdt_block">View Details</a></div></div><div> </div>
						    		 <br></div>';
				$returnhtml.'inside loop';
				$j++;
				} //// end foreach
			}
			
		} else { //// view 3d products
			if (!empty($results['result'])) {
				foreach ($results['result'] as $row) {
	
					$price = $this->Jewelrymodel->get_update_price($row['price'], 'dev_helix_jwelery_prices');
					$white_gold_price = $this->Jewelrymodel->get_update_price($row['white_gold_price'], 'dev_helix_jwelery_prices');
					$yellow_gold_price = $this->Jewelrymodel->get_update_price($row['yellow_gold_price'], 'dev_helix_jwelery_prices');
					$detail_pglink = config_item('base_url').'engagement/build_ring_detail/'.$row['stock_number'];
					$returnhtml .= '<div class="engagement-product col-sm-4" >';
								
					//$returnhtml .= '<span style="  color: #929295;float: left;font-family: Times New Roman;font-size: 14px;font-weight: bold;margin-bottom: 9px;padding-left: 30px;">' . $row['style'] . ' collection</span>';									    				
						//$returnhtml .= '<a href="javascript:void(0)" onclick="viewRingsDetails(' . $row['stock_number'] . ',' . $lot . ')">
						$returnhtml .= '<a href="'.$detail_pglink.'">
											 <center>
												 <div class="ringtile">
												 <img  style=" width:120px;height: 122px;" id="ringbigimage' . $row['stock_number'] . '" src="';
	$pth = substr(FCPATH,0,-10);
					if ($gold == 'gold') {
						$img = file_exists($pth . '/images/rings/carat' . $row['carat_image']) ? config_item('base_url') . 'images/rings/carat' . $row['carat_image'] : config_item('base_url') . 'images/rings/noimage.jpg';
						// $img = '';	
					} else {
						$img = file_exists($pth . '/images/rings/' . $row['small_image']) ? config_item('base_url') . 'images/rings/' . $row['small_image'] : config_item('base_url') . 'images/rings/noimage.jpg';
						// $img = '';
					}
					$returnhtml .= $img . '" width="70" ><br></div></center>';			
					 $returnhtml .=	'<div>
									 <div class="pricebk_list"><div class="txtsmall"> $' . $price . '-' . $row['metal'] . '</div>
										  <div class="txtsmall"> $' . $yellow_gold_price . '- Yellow Gold' . '</div>
										  <div class="txtsmall"> $' . $white_gold_price . '- White Gold' . '</div>';
					//$returnhtml .= '<a href="javascript:void(0)"  onclick="viewRingsDetails(' . $row['stock_number'] . ',' . $lot . ')" class="viewdt_block">View Details</a>';
					$returnhtml .= '<a href="'.$detail_pglink.'" class="viewdt_block">View Details</a>';
					$returnhtml .= '</div></div><div>';
	
					$shapes = $this->Engagementmodel->getShapeByStockId($row['stock_number']);
					if(isset($shapes) && !empty($shapes)){
						$returnhtml .= '<div id="ringdiamondshapes' . $row['stock_number'] . '" >';
						foreach ($shapes as $shape) {
	
							$returnhtml .= '<div class="inline shapetile"><img  id="shape' . $shape['id'] . '" src="' . config_item('base_url') . '/images/diamonds/' . strtolower($shape['shape']) . '.jpg" height="20px" width="20px" title="' . $shape['shape'] . '"  onclick="$(\'#ringbigimage' . $row['stock_number'] . '\').attr(\'src\',\'' . config_item('base_url') . 'images/rings/' . $shape['image'] . '\'); $(\'#ringdiamondshapes' . $row['stock_number'] . ' img\').css(\'border\',\'0px solid #000\'); $(\'#shape' . $shape['id'] . '\').css(\'border\',\'1px solid #000\');"></div>';
						}
						//echo '<div class="clear"></div>';
						$returnhtml .= ' </div>';
					}
					$returnhtml .= ' </div></a>
										 <br></div>';
				}
			} else {
				$returnhtml .= '<p style=color:red;font-size:13px;font-weight:Bold;font-family:arial;>' . $returnhtml . '</p>';
			} //// end second else
		} //// end firset else
        //<div class="hr clear"></div>
        //$returnhtml .= '' . $paginlinks;
		$returnhtml .= '<div class="clear"></div><br>';
		
		echo $returnhtml;
    }
	
	/* build a ring detail */
	function build_ring_detail($stockno) {
		$data = $this->getCommonData();
		$data['details'] = $this->Jewelrymodel->getAllByStock($stockno);	
		$data['stockno'] = $stockno;
		$data['src'] = config_item('base_url').'images/rings/icons/180/image180_bg_'.$data['details']['stock_number'].'b.jpg';
		$data['flash_filelink'] = config_item('base_url').'flash/90/flash2_'.$data['details']['stock_number'].'.swf';
		$diamondID = $this->session->userdata('diamond_id');
		$data['buynow_link']  = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
		$data['addring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$diamondID.'/'.$stockno.'/addtoring/');
		$data['flashfiles']	= $this->Engagementmodel->getFlashByStockId($stockno);
		$data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.min.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';

		$output = $this->load->view('engagement/ringview_detail', $data, true);
        $this->output($output, $data, true);
	}

	function getproductresults($id, $page = 0, $lot = 0) {
        $start = ($page == 'undefined') ? 0 : $page;
        $lot = ($lot == 'undefined') ? 0 : $lot;
        $rp = 16;
        $results = $this->Engagementmodel->getproduct($id, $start, $rp);
        $returnhtml = '';
        $paginlinks = '';
        $returnhtml .= $paginlinks . '<div class="hr"></div>';
        $addoption = $this->session->userdata('addoption');
        foreach ($results['result'] as $row) {
            $returnhtml .= '<div class="engagement-product col-sm-4">
									<span style="color:#000000;">
				    				' . $row['Name'] . '
									</span>
									<br>				    				
						    		 <a href="javascript:void(0)" onclick="viewproductDetails2(' . $row['ProductID'] . ',' . $lot . ')">
							    		 <center>
								    		 <div class="ringtile">
								    		 <img style=" width:100px;height:150px;" id="ringbigimage' . $row['Name'] . '" src="';
            if ($gold == 'gold') {
                $img = config_item('base_url') . 'images/products/' . $row['main_pic'];
            } else {
                $img = config_item('base_url') . 'images/leaderimages/' . $row['ProductID'] . ".jpg";
            }
            $returnhtml .= $img . '" width="70" ><br>															
								    		 <!-- <img src="http://www.engagementringsdirect.com/images/rings/' . $row['small_image'] . '" width="70" ></a> <br>-->
								    		 </div>
							    		 </center>
									
						    		 <div style="color:#000000;" class="txtsmall"> $' . $row['SalePriceProduct'] . '
						    		 </div>
									  <div style="color:#000000;" class="txtsmall"> ' . $row['metal'] . '
						    		 </div>
						    		  <div style="color:#000000;" class="txtsmall"> ' . $row['item_info'] . '
						    		 </div>
						    		  <div style="color:#000000;" class="txtsmall"> ' . $row['color'] . '
						    		 </div>
						    		 
						    		 
						    		 
						    		 
						    		 <a  style="color:#000000;"  href="javascript:void(0)" class="search" onclick="viewproductDetails2(' . $row['ProductID'] . ',' . $lot . ')">View Details</a>
						    		 <div >';
            $shapes = $this->Engagementmodel->getShapeBycatId($row['categoryid']);
			if(isset($shapes) && !empty($shapes)){
                $returnhtml .= '<div class="hr"></div><div id="ringdiamondshapes' . $row['categoryid'] . '" >';
                foreach ($shapes as $shape) {
                    $returnhtml .= '<div class="inline shapetile"><img  id="shape' . $shape['id'] . '" src="' . config_item('base_url') . '/images/diamonds/' . strtolower($shape['shape']) . '.jpg" height="20px" width="20px" title="' . $shape['shape'] . '"  onclick="$(\'#ringbigimage' . $row['stock_number'] . '\').attr(\'src\',\'' . config_item('base_url') . 'images/rings/' . $shape['image'] . '\'); $(\'#ringdiamondshapes' . $row['stock_number'] . ' img\').css(\'border\',\'0px solid #000\'); $(\'#shape' . $shape['id'] . '\').css(\'border\',\'1px solid #000\');"></div>';
                }
                //echo '<div class="clear"></div>';
                $returnhtml .= ' </div>';
            }
            $returnhtml .= ' </div>
					                 
						    		 </a>
						    		 <br>
						    		 
				    </div>
				    ';
        }
        $returnhtml .= '<div class="hr clear"></div>' . $paginlinks;
        echo $returnhtml;
    }

	/* complete ring page */
    function complete_youring($d_id=false, $ring_id, $option) {
		$d_id	 = urldecode($d_id);
		$ring_id = urldecode($ring_id);
		$data['signup_form'] = signup_form();
		$data['d_id'] 	 = $d_id;
		$data['ring_id'] = $ring_id;
		$data['add_option'] = $option;        
		$data['row_diamond'] = $this->Diamondmodel->getDetailsByLot($d_id);
		$hearts_collection = $this->session->userdata('hearts_collection');
		if( !empty($hearts_collection) ) {
			$data['row_ring'] = $this->Davidsternmodel->getSternCollectionDetail($ring_id);
			$data['odring_id'] = $data['row_ring']['item_sku'];
			$data['rings_carat'] = check_empty($data['row_ring']['carat'], 'NA');
		} else {
			$data['odring_id'] = $this->Catemodel->getUniqueRingID( $this->session->userdata('ringID') );
			$data['row_ring'] = $this->Jewelrymodel->getAllByStock($ring_id);
			$data['rings_carat']  = isset($data['row_diamond']['carat'])?$data['row_diamond']['carat']:'';
		}
		$data['heart_collection'] = $hearts_collection;
		$data['heart_metal'] = $this->session->userdata('heart_metal');
		$data['item_metaltp'] = $this->input->post('txt_metal', true);
		$data['item_rsize']  = $this->input->post('txt_ringsize', true);
		$data['dm_price'] = _nf(isset($data['row_diamond']['price'])?$data['row_diamond']['price']:0);
		$data['dm_shape'] = view_shape_value($shape_image, isset($data['row_diamond']['shape'])?$data['row_diamond']['shape']:'');
		$data['shape_image'] = config_item('base_url').'images/shapes_images/'.$shape_image;
		$data['rings_image']  = $this->input->post('url', true);
		$rtype = $this->input->post('txt_ringtype', true);
		$prid = $this->input->post('prid', true);
		$ringImgLink = $this->input->post('url', true);
		$rtype = $this->input->post('txt_ringtype', true);
		$main_price = $this->input->post('main_price', true);
		$diamnd_count = $this->input->post('diamnd_count', true);
		$ring_shape = $this->input->post('ring_shape', true);
		$ring_carat = $this->input->post('ring_carat', true);
		$prod_name = $this->input->post('prodname', true);
		$diamond_carat = $this->input->post('diamond_carat', true);

		$required_sfield = array('lot_id'=>$prid,'image_vurl'=>$ringImgLink,'metal_type'=>$data['item_metaltp'],'ring_size'=>$data['item_rsize'],'ring_price'=>$main_price,'diam_count'=>get_diamond_count($diamnd_count),'rings_shape'=>$ring_shape,'rings_carat'=>$ring_carat,'prodct_name'=>$prod_name,'diamond_carat'=>$diamond_carat);

		if(isset($rtype) && !empty($rtype)) {
			$this->session->set_userdata('ringID',$ring_id);
			$this->session->set_userdata('ring_type', $rtype);
			$this->session->set_userdata('rqring_fields', $required_sfield);
		}

		$sess_array = $this->session->userdata('rqring_fields');
		$data['vring_image']  = $sess_array['image_vurl'];
		$data['main_price']   = $sess_array['ring_price'];
		$data['item_metaltp'] = str_replace('_',' ',$sess_array['metal_type']);
		$data['item_rsize']   = $sess_array['ring_size'];
		$data['diam_count']   = $sess_array['diam_count'];
		$data['rings_shape']  = view_shape_value($ringimg, isset($data['row_diamond']['shape'])?$data['row_diamond']['shape']:'');
		$data['prodct_name']  = $sess_array['prodct_name'];
		$data['rings_id']  = $this->session->userdata('ringID');
		$data['total_rprice'] = (isset($data['main_price'])?$data['main_price']:0)+(isset($data['row_diamond']['price'])?$data['row_diamond']['price']:0);
		$ringtype = $this->Diamondmodel->checkRingType($ring_id);
		if(!empty($ringtype) && $ringtype->costar_id > 0){
			$data['work_bench'] = $this->workbenchRingCostarSidebar();
		}elseif(!empty($ringtype) && $ringtype->overnight_id > 0){
			$data['work_bench'] = $this->workbenchRingOvernightSidebar();
		}else{
			$data['work_bench'] = $this->workbenchRighSidebar();
		}

		if( empty($data['row_diamond']['lot']) ) {
			$ringDiamShape = $this->session->userdata('shape');
			$ring_diamond_shape = ( ( !empty($ringDiamShape) && $ringDiamShape != '.' ) ? $ringDiamShape : 'false' );
			$urlink = 'engagement/choose_urdiamond/true/'.$ring_diamond_shape.'/'.$option.'/true/'.$ring_id;
			redirect($urlink, 'refresh'); exit;
		}
		$this->session->set_userdata('vendorname', 'Unique and Rapnet');

		/* steps section data start */
		$data['setting_ring_id']   = $this->session->userdata('ringID');
		$ring_cate_id   = $this->session->userdata('ring_cate_id');
		$ringrq_fields = $this->session->userdata('rqring_fields');
		if(isset($data['setting_ring_id']) && !empty($data['setting_ring_id'])) {
			$data['setting_image'] = $ringrq_fields['image_vurl'];
		} else {
			$data['setting_image'] = SITE_URL.'img/page_img/no_image.jpg';
		}
		if( !empty($data['d_id']) ) {
			$data['setting_price'] = _nf($ringrq_fields['ring_price'], 2);
			if((isset($ringtype->costar_id) && $ringtype->costar_id > 0) || (isset($ringtype->overnight_id) && $ringtype->overnight_id > 0)){
				$data['view_link'] = SITE_URL .'selection/engagement-rings-detail/'.$data['setting_ring_id'];
			}else{
				if( !empty($hearts_collection) ) {
					$data['view_link'] = SITE_URL . 'heartdiamond/collection_ring_detail/'.$data['setting_ring_id'];
				} else {
					$data['view_link'] = SITE_URL . 'site/engagementRingDetail/'.$ring_cate_id.'/'.$data['setting_ring_id'];
				}
			}
			$row_diamond = $this->Diamondmodel->getDetailsByLot($data['d_id']);
			$diamond_shape = view_shape_value($shape_image, $row_diamond['shape']);
			if($row_diamond['is_lab_diamond'] == 1){
				$data['diamond_shapes']	= $row_diamond['image_url'];
			}elseif($row_diamond['image_url'] != ''){
				$data['diamond_shapes']	= $row_diamond['image_url'];
			}else{
				$data['diamond_shapes'] = SITE_URL.'images/shapes_images/'.$shape_image;
			}
			$data['diamond_price'] = _nf($row_diamond['price'], 2);
			$data['diamond_view_link'] = SITE_URL . 'diamonds/diamond_detail/'.$data['d_id'].'/addtoring/'.$data['setting_ring_id'];
			$data['ring_total_price'] = _nf( ($ringrq_fields['ring_price'] + $row_diamond['price']), 2 );
		}
		/* steps data end */

		$output = $this->load->view('engagement/complete_ring', $data, true);
		$this->output($output, $data);
    }

    function remove_diamond_detail() {
        $this->session->unset_userdata('diamnd_id');
        $ring_id   = $this->session->userdata('ringID');
        redirect('engagement/choose_urdiamond/true/false/addtoring/true/'.$ring_id, 'refresh');
    }

	/* workbench right sidebar for Costar */
	function workbenchRingCostarSidebar() {
        $data['d_id'] = $this->session->userdata('diamnd_id');
        $ringType = $this->session->userdata('ring_type');
        $ringID   = $this->session->userdata('ringID');
        $hearts_collection   = $this->session->userdata('hearts_collection');
        $row_diamond = $this->Diamondmodel->getRingDetailsByLot($ringID);
        $view_shapeimg = view_shape_value($shape_image, $row_diamond->stone_shape);
        $ringrq_fields = $this->session->userdata('rqring_fields');
        $ringDmShape =  $this->session->userdata('shape');
        $ringdm_shape = str_replace('.','',$ringDmShape);
        $view_ringdmsh = view_shape_value($ringimg, $ringdm_shape);
        $rowdetail = $this->Diamondmodel->getDetailsByLot($data['d_id']);
		$prodRing_id    = $this->Catemodel->getOvrmountRingID($ringID); 
		$prodRing_metal = $row_diamond->metal;
		$item_sizes     = $row_diamond->ring_size;
		$prodRing_size  = resetRingSize($item_sizes);
		$prodRing_price = $row_diamond->price;

		/* diamond section */
		if(isset($data['d_id']) && !empty($data['d_id'])) {
			if($rowdetail['is_lab_diamond'] == 1){
				$shapes1_image	= $rowdetail['image_url'];
			}elseif($rowdetail['image_url'] != '' && file_exists($rowdetail['image_url'])){
				$shapes1_image	= SITE_URL . $rowdetail['image_url'];
			}else{
				$shapes1_image = config_item('base_url').'images/shapes_images/'.$shape_image;
			}
			$redirect_link = config_item('base_url').'engagement/remove_dimaond/'.$data['d_id'];
			$link_option = '<a href="'.$redirect_link.'">Remove</a>';
			$subtt_price = $rowdetail['price'];
		} else {
			$shapes1_image = config_item('base_url').'img/page_img/no_image.jpg';
			$link_option = '<a href="'.config_item('base_url').'"engagement/choose_urdiamond">Select</a>';
			$subtt_price = '0.00';
		}

		/* ring section */
		if(isset($ringID) && !empty($ringID)) {
			$prodRing_image = $ringrq_fields['image_vurl'];
		} else {
			$prodRing_image = config_item('base_url').'img/page_img/no_image.jpg';
		}
        $right_sidebar = ''; 
		$right_sidebar .= '<div class="rightbox_content">
			<div class="setting_bk">
				<h4>Select Your Setting</h4>
				<div class="leftimg"><img src="'.$prodRing_image.'" width="60" alt="" /></div>
				<div class="right_chosen">';		  
					if(isset($ringID) && !empty($ringID)) {
						$rmLink = config_item('base_url').'engagement/remove_unique_setting';
						$selectLink = '<a href="'.$rmLink.'">Remove</a>'; 
						$right_sidebar .= '<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody>
								<tr class=" font9px"><td align="right">Ring #: </td><td align="left">&nbsp;'.$prodRing_id.'</td></tr>
								<tr class=" font9px"><td align="right">Metal : </td><td align="left">&nbsp;'.$prodRing_metal.'</td></tr>
								<tr class=" font9px"><td align="right">Size : </td><td align="left">&nbsp;'.$prodRing_size.'</td></tr>
								<tr class=" font9px"><td align="right">Total Diamonds: </td><td align="left">&nbsp;'.$ringrq_fields['diam_count'].'</td></tr>
								<tr class=" font9px"><td align="right">Shape : </td><td align="left">&nbsp;'.$view_ringdmsh.'</td></tr>
								<tr class=" font9px"><td align="right">Price : </td><td align="left">&nbsp;$'._nf($prodRing_price,2).'</td></tr>
							</tbody>
						</table>';
					} else {
						$selectLink = '<a href="'.config_item('base_url').'engagement/engagement_ring_settings/0/addtoring">Select</a>';
						$right_sidebar .= 'No Choosen';	
					}
				$right_sidebar .= '</div>
				<div class="clear"></div>
				<div class="select_img">'.$selectLink.'</div>
			</div>
			<div class="setting_bk">
				<h4>Select Your Diamond</h4>
				<div class="leftimg"><img src="'.$shapes1_image.'" width="60" alt="'.$view_shapeimg.'" /></div>
				<div class="right_chosen">';
					if(isset($data['d_id']) && !empty($data['d_id'])) {  
						$right_sidebar .= '<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody>
								<tr class=" font9px"><td align="right">Lot #: </td><td align="left">&nbsp;'.$rowdetail['lot'] .'</td></tr>
								<tr class=" font9px"><td align="right">Shape : </td><td align="left">&nbsp;'.$view_shapeimg.'</td></tr>
								<tr class=" font9px"><td align="right">Carat : </td><td align="left">&nbsp;'.$rowdetail['carat'] .'</td></tr>
								<tr class=" font9px"><td align="right">Price : </td><td align="left">&nbsp;$'._nf($subtt_price,2).'</td></tr>
							</tbody>
						</table>';
					} else {
						$right_sidebar .= 'No Choosen';	
					}
				$right_sidebar .= '</div>
				<div class="clear"></div>
				<div class="select_img">'.$link_option.'</div>
			</div>
			<div class="subtt_amount">Sub Total: $'._nf($subtt_price+$prodRing_price,2).'</div>
			<div class="clear"></div>
		</div>';
		return $right_sidebar;
	}

	/* workbench right sidebar for Overnight */
	function workbenchRingOvernightSidebar() {
        $data['d_id'] = $this->session->userdata('diamnd_id');
        $ringType = $this->session->userdata('ring_type');
        $ringID   = $this->session->userdata('ringID');
        $hearts_collection   = $this->session->userdata('hearts_collection');
        $row_diamond = $this->Diamondmodel->getRingDetailsByLot($ringID);
        $view_shapeimg = view_shape_value($shape_image, $row_diamond->stone_shape);
        $ringrq_fields = $this->session->userdata('rqring_fields');
        $ringDmShape =  $this->session->userdata('shape');
        $ringdm_shape = str_replace('.','',$ringDmShape);
        $view_ringdmsh = view_shape_value($ringimg, $ringdm_shape);
		$rowdetail = $this->Diamondmodel->getDetailsByLot($data['d_id']);
		$prodRing_id    = $this->Catemodel->getOvrmountRingID($ringID); 
		$prodRing_metal = $row_diamond->metal;
		$item_sizes     = $row_diamond->ring_size;
		$prodRing_size  = resetRingSize($item_sizes);
		$prodRing_price = $row_diamond->price;

		/* diamond section */
		if(isset($data['d_id']) && !empty($data['d_id'])) {
			if($rowdetail['is_lab_diamond'] == 1){
				$shapes1_image	= $rowdetail['image_url'];
			}elseif($rowdetail['image_url'] != '' && file_exists($rowdetail['image_url'])){
				$shapes1_image	= SITE_URL . $rowdetail['image_url'];
			}else{
				$shapes1_image = config_item('base_url').'images/shapes_images/'.$shape_image;
			}
			$redirect_link = config_item('base_url').'engagement/remove_dimaond/'.$data['d_id'];
			$link_option = '<a href="'.$redirect_link.'">Remove</a>';
			$subtt_price = $rowdetail['price'];
		} else {
			$shapes1_image = config_item('base_url').'img/page_img/no_image.jpg';
			$link_option = '<a href="'.config_item('base_url').'"engagement/choose_urdiamond">Select</a>';
			$subtt_price = '0.00';
		}

		/* ring section */
		if(isset($ringID) && !empty($ringID)) {
			$prodRing_image = $ringrq_fields['image_vurl'];
		} else {
			$prodRing_image = config_item('base_url').'img/page_img/no_image.jpg';
		}
        $right_sidebar = ''; 
		$right_sidebar .= '<div class="rightbox_content">
			<div class="setting_bk">
				<h4>Select Your Setting</h4>
				<div class="leftimg"><img src="'.$prodRing_image.'" width="60" alt="" /></div>
				<div class="right_chosen">';		  
					if(isset($ringID) && !empty($ringID)) {
						$rmLink = config_item('base_url').'engagement/remove_unique_setting';
						$selectLink = '<a href="'.$rmLink.'">Remove</a>'; 
						$right_sidebar .= '<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody>
								<tr class=" font9px"><td align="right">Ring #: </td><td align="left">&nbsp;'.$prodRing_id.'</td></tr>
								<tr class=" font9px"><td align="right">Metal : </td><td align="left">&nbsp;'.$prodRing_metal.'</td></tr>
								<tr class=" font9px"><td align="right">Size : </td><td align="left">&nbsp;'.$prodRing_size.'</td></tr>
								<tr class=" font9px"><td align="right">Total Diamonds: </td><td align="left">&nbsp;'.$ringrq_fields['diam_count'].'</td></tr>
								<tr class=" font9px"><td align="right">Shape : </td><td align="left">&nbsp;'.$view_ringdmsh.'</td></tr>
								<tr class=" font9px"><td align="right">Price : </td><td align="left">&nbsp;$'._nf($prodRing_price,2).'</td></tr>
							</tbody>
						</table>';
					} else {
						$selectLink = '<a href="'.config_item('base_url').'engagement/engagement_ring_settings/0/addtoring">Select</a>';
						$right_sidebar .= 'No Choosen';	
					}
				$right_sidebar .= '</div>
				<div class="clear"></div>
				<div class="select_img">'.$selectLink.'</div>
			</div>
			<div class="setting_bk">
				<h4>Select Your Diamond</h4>
				<div class="leftimg"><img src="'.$shapes1_image.'" width="60" alt="'.$view_shapeimg.'" /></div>
				<div class="right_chosen">';
					if(isset($data['d_id']) && !empty($data['d_id'])) {  
						$right_sidebar .= '<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody>
								<tr class=" font9px"><td align="right">Lot #: </td><td align="left">&nbsp;'.$rowdetail['lot'] .'</td></tr>
								<tr class=" font9px"><td align="right">Shape : </td><td align="left">&nbsp;'.$view_shapeimg.'</td></tr>
								<tr class=" font9px"><td align="right">Carat : </td><td align="left">&nbsp;'.$rowdetail['carat'] .'</td></tr>
								<tr class=" font9px"><td align="right">Price : </td><td align="left">&nbsp;$'._nf($subtt_price,2).'</td></tr>
							</tbody>
						</table>';
					} else {
						$right_sidebar .= 'No Choosen';	
					}
				$right_sidebar .= '</div>
				<div class="clear"></div>
				<div class="select_img">'.$link_option.'</div>
			</div>
			<div class="subtt_amount">Sub Total: $'._nf($subtt_price+$prodRing_price,2).'</div>
			<div class="clear"></div>
		</div>';
		return $right_sidebar;
	}	

	/* workbench right sidebar */
	function workbenchRighSidebar() {
        $data['d_id'] = $this->session->userdata('diamnd_id');
        $ringType = $this->session->userdata('ring_type');
        $ringID   = $this->session->userdata('ringID');
        $hearts_collection   = $this->session->userdata('hearts_collection');
        $row_diamond = $this->Diamondmodel->getDetailsByLot($data['d_id']);
        $view_shapeimg = view_shape_value($shape_image, isset($row_diamond['shape'])?$row_diamond['shape']:'');
        $ringrq_fields = $this->session->userdata('rqring_fields');
        $ringDmShape =  $this->session->userdata('shape');
        $ringdm_shape = str_replace('.','',$ringDmShape);
        $view_ringdmsh = view_shape_value($ringimg, $ringdm_shape);
        $rowdetail = $this->Diamondmodel->getDetailsByLot($data['d_id']);

        if( !empty($hearts_collection) ) {
            $rowring = $this->Davidsternmodel->getSternCollectionDetail($ringrq_fields['lot_id']);
            $prodRing_id    = $rowring['item_sku']; 
            $prodRing_metal = '';
            $item_sizes     = 'NA';
            $prodRing_size  = 'NA';
            $prodRing_price = $ringrq_fields['ring_price'];
        } else {
			if(isset($ringrq_fields['lot_id'])){
				$prodRing_id    = $this->Catemodel->getUniqueRingID($ringrq_fields['lot_id']);
			}
			if(isset($ringrq_fields['metal_type'])){
				$prodRing_metal = setURLValue($ringrq_fields['metal_type'], 7);
			}
			if(isset($ringrq_fields['ring_size'])){
				$item_sizes     = setURLValue($ringrq_fields['ring_size'], 8);
				$prodRing_size  = resetRingSize($item_sizes);
			}
			if(isset($ringrq_fields['ring_price'])){
				$prodRing_price = $ringrq_fields['ring_price'];
			}
        }

		/* diamond section */
		if(isset($data['d_id']) && !empty($data['d_id'])) {
			if(isset($row_diamond['is_lab_diamond']) && $row_diamond['is_lab_diamond'] == 1){
				$shapes1_image	= $row_diamond['image_url'];
			}elseif($row_diamond['image_url'] != '' ){
				$shapes1_image	= $row_diamond['image_url'];
			}else{
				$shapes1_image = config_item('base_url').'images/shapes_images/'.$shape_image;
			}
			$redirect_link = config_item('base_url').'engagement/remove_dimaond/'.$data['d_id'];
			$link_option = '<a href="'.$redirect_link.'">Remove</a>';
			$subtt_price = $row_diamond['price'];
		} else {
			$shapes1_image = config_item('base_url').'img/page_img/no_image.jpg';
			$link_option = '<a href="'.config_item('base_url').'"engagement/choose_urdiamond">Select</a>';
			$subtt_price = '0.00';
		}

		/* ring section */
		if(isset($ringID) && !empty($ringID)) {
			$prodRing_image = $ringrq_fields['image_vurl'];
		} else {
			$prodRing_image = config_item('base_url').'img/page_img/no_image.jpg';
		}
        $right_sidebar = ''; 
		$right_sidebar .= '<div class="rightbox_content">
			<div class="setting_bk">
				<h4>Select Your Setting</h4>
				<div class="leftimg"><img src="'.$prodRing_image.'" width="60" alt="" /></div>
				<div class="right_chosen">';		  
					if(isset($ringID) && !empty($ringID)) {
						$rmLink = config_item('base_url').'engagement/remove_unique_setting';
						$selectLink = '<a href="'.$rmLink.'">Remove</a>'; 
						$right_sidebar .= '<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody>
								<tr class=" font9px"><td align="right">Ring #: </td><td align="left">&nbsp;'.$prodRing_id.'</td></tr>
								<tr class=" font9px"><td align="right">Metal : </td><td align="left">&nbsp;'.$prodRing_metal.'</td></tr>
								<tr class=" font9px"><td align="right">Size : </td><td align="left">&nbsp;'.$prodRing_size.'</td></tr>
								<tr class=" font9px"><td align="right">Total Diamonds: </td><td align="left">&nbsp;'.$ringrq_fields['diam_count'].'</td></tr>
								<tr class=" font9px"><td align="right">Shape : </td><td align="left">&nbsp;'.$view_ringdmsh.'</td></tr>
								<tr class=" font9px"><td align="right">Price : </td><td align="left">&nbsp;$'._nf($prodRing_price,2).'</td></tr>
							</tbody>
						</table>';
					} else {
						$selectLink = '<a href="'.config_item('base_url').'engagement/engagement_ring_settings/0/addtoring">Select</a>';
						$right_sidebar .= 'No Choosen';	
					}
				$right_sidebar .= '</div>
				<div class="clear"></div>
				<div class="select_img">'.$selectLink.'</div>
			</div>
			<div class="setting_bk">
				<h4>Select Your Diamond</h4>
				<div class="leftimg"><img src="'.$shapes1_image.'" width="60" alt="'.$view_shapeimg.'" /></div>
				<div class="right_chosen">';
					if(isset($data['d_id']) && !empty($data['d_id'])) {  
						$right_sidebar .= '<table cellpadding="0" cellspacing="0" border="0" width="100%">
							<tbody>
								<tr class=" font9px"><td align="right">Lot #: </td><td align="left">&nbsp;'.$row_diamond['lot'].'</td></tr>
								<tr class=" font9px"><td align="right">Shape : </td><td align="left">&nbsp;'.$view_shapeimg.'</td></tr>
								<tr class=" font9px"><td align="right">Carat : </td><td align="left">&nbsp;'.$row_diamond['carat'].'</td></tr>
								<tr class=" font9px"><td align="right">Price : </td><td align="left">&nbsp;$'._nf($subtt_price,2).'</td></tr>
							</tbody>
						</table>';
					} else {
						$right_sidebar .= 'No Choosen';	
					}
				$right_sidebar .= '</div>
				<div class="clear"></div>
				<div class="select_img">'.$link_option.'</div>
			</div>
			<div class="subtt_amount">Sub Total: $'._nf((isset($subtt_price)?$subtt_price:0)+(isset($prodRing_price)?$prodRing_price:0),2).'</div>
			<div class="clear"></div>
		</div>';
		return $right_sidebar;
	}

    function threestoneringsettings($centrestoneid = '', $sidestoneid1 = '', $sidestoneid2 = '', $addoption = '') {
        $data = $this->getCommonData();
        $data['title'] = 'Three-Stone Rings';
        $data['tabhtml'] = $this->Commonmodel->getThreeStoneTab('ring', $centrestoneid, $sidestoneid1, $sidestoneid2);
        $data['centerstoneid'] = $centrestoneid;
        $data['sidestoneid1'] = $sidestoneid1;
        $data['sidestoneid2'] = $sidestoneid2;
        $data['addoption'] = $addoption;
        $data['extraheader'] = '';
        $data['extraheader'] .= '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
        $data['threestonerings'] = $this->Jewelrymodel->getAllThreestoneRing();
        $output = $this->load->view('engagement/threestonerings', $data, true);
        $this->output($output, $data);
    }

    function ringdetails($stockno = '', $ringoption = '', $lotno = '') {
        $data = $this->getCommonData();
        $data['title'] = 'Engagement Ring Details';
        $this->session->set_userdata('stocknumber', $stockno);
        $data['details'] = $this->Jewelrymodel->getAllByStock($stockno);
        $data['tabhtml'] = $this->Commonmodel->getTabHeader('ring', $lotno, $stockno);
        $data['lotno'] = $lotno; //$this->session->userdata('mydiamondid');
        $data['stockno'] = $stockno;
        if ($data['lotno'] && $data['details']) {
            $output = $this->load->view('engagement/ringdetails', $data, true);
            $this->output($output, $data);
        }
    }

    function productdetails($categoryid = '', $ringoption = '', $lotno = '') {
        $data = $this->getCommonData();
        $data['title'] = 'Engagement Ring Details';
        $this->session->set_userdata('categoryid', $categoryid);
        $data['details'] = $this->Jewelrymodel->getAllBycategoryid($categoryid);
        $data['tabhtml'] = $this->Commonmodel->getTabHeader1('ring', $lotno, $categoryid);
        $data['lotno'] = $lotno; //$this->session->userdata('mydiamondid');
        $data['categoryid'] = $categoryid;
        if ($data['lotno'] && $data['details']) {
            $output = $this->load->view('engagement/ringdetails', $data, true);
            $this->output($output, $data);
        }
    }

	function addtobasket($diamondlotno = '', $stockno = '', $addoption = '', $sidestone1 = '', $sidestone2 = '', $dsize = '', $metaltype = '') {
        $data = $this->getCommonData();
        $data['title'] = 'Shopping Basket';
        $data['tabhtml'] = '';
        $data['addoption'] = $addoption;
        $data['lotno'] = $diamondlotno;
        $data['stockno'] = $stockno;
        $data['sidestone1'] = ($sidestone1 == 'false') ? '' : $sidestone1;
        $data['sidestone2'] = ($sidestone2 == 'false') ? '' : $sidestone2;
        //$data['sidestone2']	= $sidestone2;
        $data['dsize'] = $dsize;
        $data['metaltype'] = $metaltype;
        $data['side1'] = '';
        $data['side2'] = '';
        if ($sidestone1 != '' && $sidestone2 != '') {
            $data['side1'] = $this->Diamondmodel->getDetailsByLot($sidestone1);
            $data['side2'] = $this->Diamondmodel->getDetailsByLot($sidestone2);
        }
        if ($addoption == 'addtoring') {
            $data['tabhtml'] = $this->Commonmodel->getTabHeader('addbasket', $diamondlotno, $stockno);
        }
        if ($addoption == 'tothreestone') {
            $data['tabhtml'] = $this->Commonmodel->getTabHeader('addbasket', $diamondlotno, $stockno);
        }
        $data['ringdetails'] = $this->Jewelrymodel->getAllByStock($stockno);
        $data['diamonddetails'] = $this->Diamondmodel->getDetailsByLot($diamondlotno);
        $basket = $this->session->userdata('basket');
        $basket['ring']['diamond'] = $diamondlotno;
        $basket['ring']['setting'] = $stockno;
        $basket['ring']['metaytype'] = $metaltype;
        $basket['ring']['dsize'] = $dsize;
        $data['extraheader'] = ' <script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
        $data['flashfiles'] = $this->Engagementmodel->getFlashByStockId($stockno);
        $this->session->set_userdata('basket', $basket);
        $output = $this->load->view('engagement/addbasket', $data, true);
        $this->output($output, $data);
    }

	function test() {
        echo config_item('base_path') . '--------------' . dirname(__FILE__);
    }

    private function getShapeName($shapelist) {
        $shapename = '';
        $shapestr = '';
        if (($this->session->userdata('shape'))) {
            $shapes = $this->session->userdata('shape');
            $shapelist = explode('.', $shapes);
            if(isset($shapelist) && !empty($shapelist)){
                foreach ($shapelist as $val) {
                    if ($val != '') {
                        switch ($val) {
                            case 'B':
                                $shapename = 'Round';
                                break;
                            case 'PR':
                                $shapename = 'Princess';
                                break;
                            case 'R':
                                $shapename = 'Radiant';
                                break;
                            case 'E':
                                $shapename = 'Emerald';
                                break;
                            case 'AS':
                                $shapename = 'Ascher';
                                break;
                            case 'O':
                                $shapename = 'Oval';
                                break;
                            case 'M':
                                $shapename = 'Marquise';
                                break;
                            case 'P':
                                $shapename = 'Pear shape';
                                break;
                            case 'H':
                                $shapename = 'Heart';
                                break;
                            case 'C':
                                $shapename = 'Cushion';
                                break;
                            default:
                                $shapename = '';
                                break;
                        }
                        $shapestr .= $shapename . ", ";
                    }
                }
                $shapestr = substr($shapestr, 0, (strlen($shapestr) - 2));
            }
        }
        return $shapestr;
    }

	function searchresult(){
		$data = $this->getCommonData();
		$inputvalue = trim($this->input->post('search_field', true));
		$data['inputvalue'] = $inputvalue;
		$row_detail = $this->Diamondmodel->getDetailsByLot($inputvalue);
		$rowjewelery = $this->Jewelleriesmodel->getQualityItemDetail($inputvalue);
        $uniquesRow = $this->Catemodel->getRingsDetailViaId($inputvalue, '', '', 'search');
        $jewSearch = $this->Davidsternmodel->getSternCollectionDetail($inputvalue, '', 'search');
        $heart_market = $this->Hderingitemsmodel->getEbayItemDetailsViaID($inputvalue, 'search');
        $ebay_item_cateid = $this->Hderingitemsmodel->get_ebay_items_cate_id($inputvalue);
        $match_found = '';

        if( !empty($ebay_item_cateid) ) {
            $match_found = 'found';
            header('Location:'.SITE_URL.'hdering_collections/heart-collection-listing/'.$ebay_item_cateid);exit;
        }
        if( !empty($heart_market['pid']) ) {
            $match_found = 'found';
            header('Location:'.SITE_URL.'hdering_collections/collection-detail/'.$heart_market['pid']);exit;
        }
        if( !empty($stuller_opt['stuller_id']) ) {
            $match_found = 'found';
            header('Location:'.SITE_URL.'stuller_new_rings/wbands_diamond_detail/'.$stuller_opt['stuller_id'].'/'.$stuller_opt['stuller_option']);exit;
        }
        if( !empty($jewSearch['stock_number']) ) {
            $match_found = 'found';
            header('Location:'.SITE_URL.'heartdiamond/collection_detail/'.$jewSearch['stock_number']);exit;
        }
        if(!empty($row_detail['lot'])) {
            $match_found = 'found';
            header('Location:'.SITE_URL.'diamonds/diamond_detail/'.$row_detail['lot'].'/false/');exit;
        }
        if(!empty($uniquesRow['ring_id'])) {
            $match_found = 'found';
            header('Location:'.SITE_URL.'testengagementrings/engagement_ring_detail/'.$uniquesRow['ring_id']);exit;
        }
        if( empty($match_found) ) {
            header('Location:'.SITE_URL.'hdering_collections/hdring_search_result/');exit;
        }
        if(!empty($rowjewelery['Item'])) {
            header('Location:'.SITE_URL.'site/qualitydetail/'.$rowjewelery['qg_id']);
        }
        if(is_numeric($inputvalue)){
			$data ['details'] = $this->Diamondmodel->getDetailsByLot($inputvalue);
			$output = $this->load->view('engagement/searchdetails', $data, true);
			$this->output($output, $data);
        } else {
			$config["per_page"] = ( $_POST['pageper']!='' ? $_POST['pageper'] : 25 );
			$config["num_links"]=10;
			$config["uri_segment"] = 3;
			$pricerange = $_POST['pricerange'];
			$sort = $_POST['sortby'];
			//$config['num_tag_open'] = '<li>';
			//$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<a class="active" href="#">';
			$config['cur_tag_close'] = '</a>';
			$config["base_url"]=config_item('base_url')."engagement/searchresult/";

			$stuller = $this->Jewelleriesmodel->getStullerRecordsList($config["per_page"], $this->uri->segment(3), $inputvalue);
			$unique = $this->Jewelleriesmodel->getUniqueInSearchList($config["per_page"], $this->uri->segment(3), $inputvalue);

			//ezvalue
			$ezvalues = $this->Searchresultmodel->getezvalue();
			$data['ez3value'] = $ezvalues[0]['ezvalue'];
			$data['ez5value'] = $ezvalues[1]['ezvalue'];
			if($stuller['total_records'] > 0) {
				$data['query_view'] = 'stuller';
				$data['results'] = $stuller['results'];
				$config["total_rows"]=$stuller['total_records'];
			}else{
				if($unique['total_records'] > 0) {
					$data['query_view'] = 'unique';
					$data['results'] = $unique['results'];
					$config["total_rows"]=$unique['total_records'];
				}else {
					$data['query_view'] = 'ringsview';
					$data['results'] = $this->Searchresultmodel->getSearchResult($config["per_page"], $this->uri->segment(3),$inputvalue, $pricerange, $sort);
					$config["total_rows"]=$this->Searchresultmodel->numofrowsquality($inputvalue);
				}
			}
			$this->pagination->initialize($config);
			$data['totalresult'] = $config["total_rows"];
			$data['numresults'] = $config["per_page"];
			$data['totalresult'] = $config["total_rows"];

			$output = $this->load->view('engagement/searchresultnew', $data, true);
			$this->output($output, $data);
        }
    }

	function get_stuller_bands_item_id_options($item_number='') {
        $bands_options = array('wb_ladies', 'wb_platinum', 'wb_mens', 'wb_studs', 'wb_hoops', 'gemstone', 'wb_diamond');
        $return['stuller_id']      = '';
        $return['stuller_option'] = '';

        foreach ( $bands_options as $options ) {
            $tables  = getStulerTable($options);
            $stuller_id = $this->Stulleringsmodel->get_stuller_rings_detail_id($item_number, $tables['product'], $tables['details']);
            if( !empty($stuller_id) ) {
                $return['stuller_id']      = $stuller_id;
                $return['stuller_option']  = $options;
                break;
            }
        }
        
        return $return;
    }
        
	function get_stuller_options_value($id_value='') {
		$wb_ladies   = $this->Braceletmodel->getColumnID('stuller_products_wb_ladies', 'item_number', $id_value);
		$wb_studs    = $this->Braceletmodel->getColumnID('stuller_products_studearrings', 'item_number', $id_value);
		$wb_hoops    = $this->Braceletmodel->getColumnID('stuller_products_dhoops', 'item_number', $id_value);
		$wb_diamond  = $this->Braceletmodel->getColumnID('stuller_products_wb_diamonds', 'item_number', $id_value);

		$return['stuller_id'] = '';
		$return['stuller_option'] = '';
		if( count($wb_ladies) > 0 ) {
			$return['stuller_id'] = $wb_ladies['id'];
			$return['stuller_option'] = 'wb_ladies';
		}
		if( count($wb_studs) > 0 ) {
			$return['stuller_id'] = $wb_studs['id'];
			$return['stuller_option'] = 'wb_studs';
		}
		if( count($wb_hoops) > 0 ) {
			$return['stuller_id'] = $wb_hoops['id'];
			$return['stuller_option'] = 'wb_hoops';
		}
		if( count($wb_diamond) > 0 ) {
			$return['stuller_id'] = $wb_diamond['id'];
			$return['stuller_option'] = 'wb_diamond';
		}
		return $return;
	}

	/* new function added */
    function products($l1, $l2) {
        $data = $this->getCommonData();
        $products = $this->Jewelrymodel->GetProductsByLevels($l1, l2);
        $data['all_sub_category'] = $this->Jewelrymodel->getstuller_cat_level();
        $data["products"] = $products;
        $data["page"] = "stuller";
        $output = $this->load->view('engagement/products', $data, true);
        $this->output($output, $data, false);
    }

    function newproducts($l1, $l2) {
        $data = $this->getCommonData();
        $products = $this->Jewelrymodel->GetProductsByLevels_new($l1, l2);
        $data['all_sub_category'] = $this->Jewelrymodel->getstuller_cat_level_new();
        $data["products"] = $products;
        $data["page"] = "stuller";
        $output = $this->load->view('engagement/new_products', $data, true);
        $this->output($output, $data, false);
    }

    function stullerinventory() {
        $data = $this->getCommonData();
        $data['title'] = 'Browse Stuller Jewellry';
        $data["page"] = "stuller";
        $data["all_category"] = $this->Jewelrymodel->getstullerlevel1();
        $output = $this->load->view('engagement/stullerinventory', $data, true);
        $this->output($output, $data, false);
    }

    function newstullerinventory() {
        $data = $this->getCommonData();
        $data['title'] = 'Browse Stuller Jewellry';
        $data["page"] = "stuller";
        $data["all_category"] = $this->Jewelrymodel->getstullerlevel1_new();
        $output = $this->load->view('engagement/new_stullerinventory', $data, true);
        $this->output($output, $data, false);
    }

    function qualityandgold($folder = 'Gold11', $page = '1') {
        $data = $this->getCommonData();
        $data['page'] = 'home';
        $data['usetips'] = true;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 8;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'qg_id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';
        $query = isset($_POST['query']) ? $_POST['query'] : '';
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'itemid';
        if (is_numeric($this->uri->segment(4)) && $this->uri->segment(4) != '')
            $page = $this->uri->segment(4);
        if ($this->uri->segment(4) == '' && is_numeric($this->uri->segment(3)) && $this->uri->segment(3) != '')
            $page = $this->uri->segment(3);
        $folder = $this->uri->segment(3);
        if ($folder == '' || is_numeric($folder))
            $folder = "";
        $result_array = $data['results'] = $this->Jewelrymodel->getqualitygold($page, $rp, $sortname, $sortorder, $query, $qtype, $folder);
        $data['paginlinks'] = $this->Sitepaging->getPageing1($folder, $result_array['count'], 'dev_qg', $page, 'qg_id', $rp);
        $output = $this->load->view('engagement/qualityandgold', $data, true);
        $this->output($output, $data, false);
    }

	function search($option = '', $details = false) {
        $data = $this->getCommonData();
        $data['title'] = 'Create Your Own Ring';
        $this->session->unset_userdata('build_ring');
        $minprice = 0;
        $maxprice = 1000000;
        $data['totaldiamond'] = $this->Diamondmodel->getCountDiamond($minprice, $maxprice);
        if ($details || $details == 'true') {
            $minprice = ($this->session->userdata('searchminprice') && ($this->session->userdata('searchminprice') > $minprice) && ($this->session->userdata('searchminprice') < $maxprice)) ? ($this->session->userdata('searchminprice')) : $minprice;
            $maxprice = ($this->session->userdata('searchmaxprice') && ($this->session->userdata('searchmaxprice') < $maxprice) && ($this->session->userdata('searchmaxprice') > $minprice)) ? ($this->session->userdata('searchmaxprice')) : $maxprice;
            $data['minprice'] = $minprice;
            $data['maxprice'] = $maxprice;
        } else {
            $data['minprice'] = $minprice;
            $data['maxprice'] = $maxprice;
            $lastsearchMin = $this->session->userdata('searchminprice');
            $lastsearchMax = $this->session->userdata('searchmaxprice');
            $this->session->set_userdata('lastsearchMin', $lastsearchMin);
            $this->session->set_userdata('lastsearchMax', $lastsearchMax);
            $data['lastminpr'] = $lastsearchMin;
            $data['lastmaxpr'] = $lastsearchMax;
            $data['diashape'] = $this->session->userdata('shape');
            $data['shapename'] = $this->getShapeName($data['diashape']);
        }
		$data['sign_upform'] = $this->sign_upform;

        switch ($option) {
            case $option == 'diamonds':
                $data['tabhtml'] = $this->Commonmodel->getTabHeader('diamonds');
                $output = $this->load->view('engagement/build_your_own_ring', $data, true);
                break;
            case $option == 'addbasket':
                $data['tabhtml'] = $this->Commonmodel->getTabHeader('addbasket');
                $output = $this->load->view('engagement/addbasket', $data, true);
                break;
            default:
                $data['tabhtml'] = $this->Commonmodel->getTabHeader();
                $output = $this->load->view('engagement/build_your_own_ring', $data, true);
                break;
        }
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Diamonds Engagement Ring|Diamond Solitaire|White Gold|Antique Engagement Ring|Three Stone">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy Online asscher cut engagement rings, diamond solitaire engagement ring, white gold engagement ring, antique engagement ring, discount diamond engagement rings, cheap diamond engagement rings, wholesale diamond engagement rings, unique diamond engagement rings, three stone engagement rings">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="asscher cut engagement rings, diamond solitaire engagement ring, white gold engagement ring, antique engagement ring, discount diamond engagement rings, cheap diamond engagement rings, wholesale diamond engagement rings, unique diamond engagement rings, three stone engagement rings">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
		$this->output($output, $data, false);
    }

}