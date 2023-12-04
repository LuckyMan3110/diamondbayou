<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Diamondslist extends CI_Controller {
	public $sign_upform = '';

	function __construct() {
		parent::__construct();
		$this->sign_upform = signup_form();
		$this->load->helper('diamond_section');
		$this->load->model('Diamondmodel');
		$this->load->model('Adminmodel');
		$this->load->model('Jewelleriesmodel');
		$this->load->model('Sitepaging');
		$this->load->model('Commonmodel');
		$this->session->unset_userdata('whsale_section');
	}

	/* reset diamond filters */
	function resetDiamondFilter($search='') {
		$array_items = array(
			'depthmin' => '',
			'shape' => '',
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
			'caratmin' => '',
			'caratmax' => '',
			'claritymin' => '',
			'claritymax' => '',
			'mydiamond' => '',
			'searchminprice' => '',
			'searchmaxprice' => '',
			'length' => '',
			'width' => '',
			'backs_page' => '',
			'last_pgno' => '',
			'diamnd_listid' => '',
			'curr_pageno' => '',
			'grid_pageno' => '',
			'filter_page' => '',
			'ringcarat' => '',
			'cut_value' => '',
			'clarity_value' => '',
			'color_value' => '',
			'polish_value' => '',
			'symtry_value' => '',
			'flour_name' => '',
			'ispremium' => false
		);
		$this->session->unset_userdata($array_items);
		if( empty($search) ) {    
			header('Location:'.SITE_URL.'diamonds/search/true');
		} else {
			return true;
		}
	}

	function index() {
		$data = $this->getCommonData();
		$data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
		reset_diamond_filters();
		$data['page'] = 'home';
        if (strpos($_SERVER["REQUEST_URI"], "diamonds")) {
			$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
			<meta name="title" content="Engagement Rings|Diamond|Gold Diamond|Princess|Pink|Blue|Antique Diamond Rings of Engagement">
			<meta name="ROBOTS" content="INDEX,FOLLOW">
			<meta name="description" content="Buy online antique diamond engagement rings, White,Yellow, Pink, Blue diamond engagement rings, emerald cut rings, pave diamond rings, princess cut engagement rings
			white gold rings, yellow diamond engagement rings, gold diamond engagement ring, white gold diamond engagement ring
			.">
			<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
			<meta name="keywords" content="antique diamond engagement rings, White, Yellow, Pink, Blue diamond engagement rings, emerald cut rings, pave diamond rings, princess cut engagement rings
			white gold rings, yellow diamond engagement rings, gold diamond engagement ring, white gold diamond engagement ring">
			<meta name="author" content="Heartsanddiamonds">
			<meta name="publisher" content="Heartsanddiamonds">
			<meta name="copyright" content="Heartsanddiamonds">
			<meta http-equiv="Reply-to" content="">
			<meta name="creation_Date" content="12/12/2008">
			<meta name="expires" content="">
			<meta name="revisit-after" content="7 days">
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
		} else {
			$data['title'] = "Diamond Engagement & Wedding Rings";
			$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
			<meta name="title" content="Diamond Engagement & Wedding Rings | Hearts And Diamonds">
			<meta name="ROBOTS" content="INDEX,FOLLOW">
			<meta name="description" content="Discover the perfect wedding rings & diamond engagement rings for your partner and family at Hearts And Diamonds. Order online or visit us in store today!">
			<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
			<meta name="keywords" content="Engagement Rings, diamond rings for women, online wedding rings, diamond rings online, diamond engagement rings online, Mens diamond Rings, Mens diamond wedding Rings, diamond wedding rings, 
			diamond engagement rings, jewelry stores">
			<meta name="author" content="Heartsanddiamonds">
			<meta name="publisher" content="Heartsanddiamonds">
			<meta name="copyright" content="Heartsanddiamonds">
			<meta http-equiv="Reply-to" content="">
			<meta name="creation_Date" content="12/12/2008">
			<meta name="expires" content="">
			<meta name="revisit-after" content="7 days">
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
		}
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'testimonial_id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : '';
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';
        $data['results'] = $this->Adminmodel->gettestimonials($page, 2, $sortname, $sortorder, $query, $qtype);

        $output = $this->load->view('diamond/home_page_view', $data, true);
        $this->output($output, $data, true);
    }

    function get_diamond_shape() {
        $shape = $this->session->userdata('shape');
        $shapes_list = explode(".", $shape);
        $shape_list = array_filter($shapes_list);
        if( is_array($shape_list) ) {
            foreach ( $shape_list as $sh ) {
                $shape_ar[] = view_shape_value($img, $sh);
            }
            $shapes_ar = array_unique($shape_ar);            
            $shape_name = implode(", ", $shapes_ar);
        } else {
            $shape_name = $shape_list;
        }
        echo $shape_name . ' Shape Diamond';
    }

    //// get total diamond number
    function get_total_diamond_count() {
        $total_diamond = $this->session->userdata( 'total_diamond_count');
        
        echo _nf($total_diamond) . ' Diamonds';
    }
//// set new home page
function homepage() {
   $data['title'] = 'Welcome to hearts and diamond Fine Jewelry';
    
   $this->load->view('erd/header_new', $data);
   $this->load->view('diamond/home_page_view', $data);
   $this->load->view('erd/footer_new', $data);
   
}
	function retailer_version() {
		$data['title'] = 'Retailer View';
		
		$this->load->view('diamond/wholsaler_view');	
	}
	////// diamond menu page
	function heart_arrow() {

		$data['sign_upform'] = $this->sign_upform;
		$output = $this->load->view('diamond/heart_arrowview', $data, true);
		$this->output($output, $data, true);
	}
	/////////////	
    function update() {
        $data = "";
        $output = $this->load->view('diamond/update', $data, true);
        $this->output($output, $data, true);
    }

    function Dlsearchdddddddddddd($details = false, $shape = '', $option = '', $ispremium = false, $settingsid = '') {
        $data = $this->getCommonData();
        $data ['title'] = 'Diamonds';
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
            'O');

        if (in_array($shape, $shapearray)) {
            $this->session->set_userdata('shape', $shape);
            $this->session->set_userdata('cutmin', 0);
            $this->session->set_userdata('cutmax', 3);
        }
        if ($ispremium)
            $this->session->set_userdata('ispremium', true);
        else
            $this->session->set_userdata('ispremium', false);

        $minprice = 250; //$this->Diamondmodel->getMinPrice();
        $maxprice = 1000000; //$this->Diamondmodel->getMaxPrice();	


        switch ($option) {
            case 'tothreestone' :
                $this->session->set_userdata('caratmin', .5);
                $this->session->set_userdata('caratmax', 3.50);
                $minprice = (($this->session->userdata('searchminprice')) ? $this->session->userdata('searchminprice') : 250);
                $maxprice = (($this->session->userdata('searchmaxprice')) ? $this->session->userdata('searchmaxprice') : 1000000);

                $caratminmax = array(
                    'min' => 0.5,
                    'max' => '3.50');
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
                $caratminmax = $this->Diamondmodel->getMinMaxCaratDiamond();
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

        $depthminmax = $this->getDepthMinMax();
        $data ['depthmin'] = $depthminmax [0];
        $data ['depthmax'] = $depthminmax [1];

        $tableminmax = $this->getTableMinMax();
        $data ['tablemin'] = $tableminmax [0];
        $data ['tablemax'] = $tableminmax [1];


        if (strcmp($option, 'tothreestone') === 0) {
            $minpricepercrt = .5;
            $maxpricepercrt = 3.5; //$this->Diamondmodel->getMaxPricePerCarat ();
        } else {
            $minpricepercrt = $this->Diamondmodel->getMinPricePerCaratDiamond();
            $maxpricepercrt = $this->Diamondmodel->getMaxPricePerCaratDiamond();
        }
        $data ['totaldiamond'] = $this->Diamondmodel->getCountDiamondBomi($minprice, $maxprice);

        if (isset($_POST ['resumesearch'])) {
            $details = true;
        }

        if ($details == 'true') {

            /* $minprice =  $this->Diamondmodel->getMinPrice();
              $maxprice =  $this->Diamondmodel->getMaxPrice();

              $minpricepercrt =  $this->Diamondmodel->getMinPricePerCarat();
              $maxpricepercrt =  $this->Diamondmodel->getMaxPricePerCarat(); */

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
                    'ispremium' => false);
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

            /* $minprice =  $this->Diamondmodel->getMinPrice();
              $maxprice =  $this->Diamondmodel->getMaxPrice(); */
            $data ['minprice'] = $minprice;
            $data ['maxprice'] = $maxprice;
            /* $data['totaldiamond'] = $this->Diamondmodel->getCountDiamond($minprice,$maxprice); */

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
            $url = config_item('base_url') . "index.php/diamonds/getsearchresultBomi/" . $option . "/" . $settingsid;
        } elseif ($option != '') {
            $url = config_item('base_url') . "index.php/diamonds/getsearchresultBomi/" . $option;
        } else {
            $url = config_item('base_url') . "index.php/diamonds/getsearchresultBomi";
        }

        //echo $url;


        if ($details && $details == 'true') {

            $data ['onloadextraheader'] = "
			$('body').append('<div id=\"slideblocker\">&nbsp;</div>');
			$(\"#chkD\").click(function(){
											alert(\"test\");		
													
										couplemodifyresult('colormin', parseInt($('this').val()),'colormax', parseInt($('this').val()));
														 
														 });


			
			$('#pricerange').slider({ steps: 100, range: true, minValue : 1,slide :function(e,ui) { 
			if($('#pricerange').slider('value',0) <= 30) {
				val = ($('#pricerange').slider('value',0)*25+(" . $minprice . "));
				$('#pricerange1').val(val);
			}
			else if($('#pricerange').slider('value',0) > 30 && $('#pricerange').slider('value',0) <= 50) {
				val = ($('#pricerange').slider('value',0)*75+(" . $minprice . "));
     			$('#pricerange1').val(val);
			}
			else if($('#pricerange').slider('value',0) > 50 && $('#pricerange').slider('value',0) <= 70) {
				val = ($('#pricerange').slider('value',0)*250+(" . $minprice . "));
				$('#pricerange1').val(val);
			}
			else if($('#pricerange').slider('value',0) > 70 && $('#pricerange').slider('value',0) <= 80) {																																                val = ($('#pricerange').slider('value',0)*1000+(" . $minprice . "));
				$('#pricerange1').val(val);
			}
			else if($('#pricerange').slider('value',0) > 80 && $('#pricerange').slider('value',0) <= 90) {
				val = ($('#pricerange').slider('value',0)*10000+(" . $minprice . "));
	 			$('#pricerange1').val(val);
   		    }
			else if($('#pricerange').slider('value',0) > 90 && $('#pricerange').slider('value',0) < 98) {
				val = ($('#pricerange').slider('value',0)*20000+(" . $minprice . "));
				$('#pricerange1').val(val);
			}
			else {
				$('#pricerange1').val(" . $minprice . ");
			}
								 									 																						            // pricerange2
	 									 																if($('#pricerange').slider('value',1) <= 30 && $('#pricerange').slider('value',1) >1)
									 									 																{
									 									 																	val = ((-1)*$('#pricerange').slider('value',1)*25+(" . $maxprice . "));
									 									 																	$('#pricerange2').val(val);
									 									 																}
									 									 																else if($('#pricerange').slider('value',1) > 30 && $('#pricerange').slider('value',1) <= 50)
									 									 																{
									 									 																	val = ((-1)*$('#pricerange').slider('value',1)*75+(" . $maxprice . "));
									 									 																	$('#pricerange2').val(val);
									 									 																}
									 									 																else if($('#pricerange').slider('value',1) > 50 && $('#pricerange').slider('value',1) <= 70)
									 									 																{
									 									 																	val = ((-1)*$('#pricerange').slider('value',1)*250+(" . $maxprice . "));
									 									 																	$('#pricerange2').val(val);
									 									 																}
									 									 																else if($('#pricerange').slider('value',1) > 70 && $('#pricerange').slider('value',1) <= 80)
									 									 																{
									 									 																	val = ((-1)*$('#pricerange').slider('value',1)*1000+(" . $maxprice . "));
									 									 																	$('#pricerange2').val(val);
									 									 																}
									 									 																else if($('#pricerange').slider('value',1) > 80 && $('#pricerange').slider('value',1) <= 90)
									 									 																{
									 									 																	val = ((-1)*$('#pricerange').slider('value',1)*10000+(" . $maxprice . "));
									 									 																	$('#pricerange2').val(val);
									 									 																}
									 									 																else if($('#pricerange').slider('value',1) > 90 && $('#pricerange').slider('value',1) < 98)
									 									 																{
									 									 																	val = ((-1)*$('#pricerange').slider('value',1)*20000+(" . $maxprice . "));
									 									 																	$('#pricerange2').val(val);
									 									 																}
									 									 																else if($('#pricerange').slider('value',1)==1)
									 									 																{
									 									 																	$('#pricerange2').val(" . $minprice . ");
									 									 																}
									 									 																else
									 									 																{
									 									 																	$('#pricerange2').val(" . $maxprice . ");
									 									 																}


																																	},

								 									 																change: function(e,ui) { 
								 									 																	
								 									 																	
																																		
								 									 																	//modifyresult('searchminprice',parseInt($('#pricerange1').val()));

								 									 																	//modifyresult('searchmaxprice',parseInt($('#pricerange2').val()));

								 									 																	//searchdiamonds();



								 									 																	globalsortname = 'price';
								 									 																	couplemodifyresult('searchminprice',parseInt($('#pricerange1').val()),'searchmaxprice',parseInt($('#pricerange2').val())); 	
															} });
					 									$('#depth').slider({ min:4000,max:9000, range: true, slide : function(e,ui) { 
							 									 																	$('#depthmin').val((parseInt($('#depth').slider('value', 0)))/100);
								 									 																$('#depthmax').val(parseInt($('#depth').slider('value', 1))/100);
					 									}, change: function(e,ui) { 
							 									 																	$('#depthmin').val((parseInt($('#depth').slider('value', 0)))/100);
								 									 																$('#depthmax').val(parseInt($('#depth').slider('value', 1))/100);
								 									 																	//modifyresult('depthmin',parseInt($('#depthmin').val()));
								 									 																	//modifyresult('depthmax',parseInt($('#depthmax').val()));
								 									 																	//searchdiamonds();
								 									 																	couplemodifyresult('depthmin',parseInt($('#depthmin').val()),'depthmax',parseInt($('#depthmax').val()));
					 									 } });
					 									 
					 									 $('#tablerange').slider({  min:4800,max:9000, range: true, slide : function(e,ui) { $('#tablemin').val((parseInt($('#tablerange').slider('value', 0)))/100);
								 									 																$('#tablemax').val(parseInt($('#tablerange').slider('value', 1))/100);
								 									 																},change: function(e,ui) { 
							 									 																	$('#tablemin').val((parseInt($('#tablerange').slider('value', 0)))/100);
								 									 																$('#tablemax').val(parseInt($('#tablerange').slider('value', 1))/100);
								 									 																	//modifyresult('tablemin',parseInt($('#tablemin').val()));
								 									 																	//modifyresult('tablemax',parseInt($('#tablemax').val()));
								 									 																	//searchdiamonds();
								 									 																	couplemodifyresult('tablemin',parseInt($('#valuemin').val()),'tablemax',parseInt($('#tablemax').val()));
					 									 } });
														 
					 									 
										 	 $('#carat').slider({ steps: " . ceil($caratminmax['max'] * 1000) . ", min:0, max:" . ceil($caratminmax['max'] * 100) . ", range: true, slide : function(e,ui) { value = $('#caratmin').val($('#carat').slider('value', 0)/100);
										 						 																$('#caratmax').val($('#carat').slider('value', 1)/100);
										 						 																}, change: function(e,ui) { 
										 					 																	$('#caratmin').val($('#carat').slider('value', 0)/100);
										 						 																$('#caratmax').val($('#carat').slider('value', 1)/100);
										 						 																	//modifyresult('caratmin', ($('#caratmin').val()));
										 						 																	//modifyresult('caratmax', ($('#caratmax').val()));
										 						 																	//searchdiamonds();
										 						 																	globalsortname = 'carat';
										 						 																	couplemodifyresult('caratmin', ($('#caratmin').val()),'caratmax', ($('#caratmax').val()));									
																																	 } });	
					 									 
					 									 $('#cut').slider({ steps: 3, range: true, slide : function(e,ui) { $('#cutmin').val((parseInt(($('#cut').slider('value', 0)))* ((3)/100)));
								 									 																$('#cutmax').val((parseInt(($('#cut').slider('value', 1)))* ((3)/100)));
								 									 																}, change: function(e,ui) { 
							 									 																	$('#cutmin').val((parseInt(($('#cut').slider('value', 0)))* ((3)/100)));
								 									 																$('#cutmax').val((parseInt(($('#cut').slider('value', 1)))* ((3)/100)));
								 									 																	//modifyresult('cutmin',($('#cutmin').val()));
								 									 																	//modifyresult('cutmax',($('#cutmax').val()));
								 									 																	//searchdiamonds();
								 									 																	globalsortname = 'cut';
								 									 																	couplemodifyresult('cutmin',($('#cutmin').val()),'cutmax',($('#cutmax').val()));
					 									 } });
														 
					 								
														 
			 $('#color').slider({ steps: 8, range: true,minValue: 0, maxValue: 8,  slide : function(e,ui) { $('#colormin').val(parseInt(parseInt($('#color').slider('value', 0))*(0.08)));
								 									 																$('#colormax').val((parseInt((($('#color').slider('value', 1)))* ((8)/100))));
								 									 																 },change: function(e,ui) { 
							 									 																	$('#colormin').val(parseInt(parseInt($('#color').slider('value', 0))*(0.08)));
								 									 																$('#colormax').val((parseInt((($('#color').slider('value', 1)))* ((8)/100))));
								 									 																	//modifyresult('colormin', parseInt($('#colormin').val()));
								 									 																	//modifyresult('colormax', parseInt($('#colormax').val()));
								 									 																	//searchdiamonds();
								 									 																	globalsortname = 'color';
								 									 																	couplemodifyresult('colormin', parseInt($('#colormin').val()),'colormax', parseInt($('#colormax').val()));
					 									 } });
														 
					 									 
					 									 $('#clarity').slider({ steps: 7, range: true,minValue: 0, maxValue: 7, slide : function(e,ui) { $('#claritymin').val(parseInt(parseInt($('#clarity').slider('value', 0))*(0.08)));
								 									 																$('#claritymax').val((parseInt((($('#clarity').slider('value', 1)))* ((8)/100))));
								 									 																}, change: function(e,ui) { 
							 									 																	$('#claritymin').val(parseInt(parseInt($('#clarity').slider('value', 0))*(0.08)));
								 									 																$('#claritymax').val((parseInt((($('#clarity').slider('value', 1)))* ((8)/100))));
								 									 																	//modifyresult('claritymin', parseInt($('#claritymin').val()));
								 									 																	//modifyresult('claritymax', parseInt($('#claritymax').val()));
								 									 																	//searchdiamonds();
								 									 																	globalsortname = 'clarity';
								 									 																	couplemodifyresult('claritymin', parseInt($('#claritymin').val()),'claritymax', parseInt($('#claritymax').val()));
					 									 } });
					 									 
					 									 					 									 
					 									 $('#fluro').slider({ steps: 5, range: true, slide : function(e,ui) { $('#fluromin').val((parseInt(($('#fluro').slider('value', 0)))* ((5)/100)));
								 									 																$('#fluromax').val((parseInt(($('#fluro').slider('value', 1)))* ((5)/100)));
								 									 																}, change: function(e,ui) { 
							 									 																	$('#fluromin').val((parseInt(($('#fluro').slider('value', 0)))* ((5)/100)));
								 									 																$('#fluromax').val((parseInt(($('#fluro').slider('value', 1)))* ((5)/100)));
								 									 																	//modifyresult('fluromin', parseInt($('#fluromin').val()));
								 									 																	//modifyresult('fluromax', parseInt($('#fluromax').val()));
		  									 																							//searchdiamonds();
		  									 																							couplemodifyresult('fluromin', parseInt($('#fluromin').val()),'fluromax', parseInt($('#fluromax').val()));
					 									 } });
					 									 
					 									  $('#polis').slider({ steps: 4, range: true, slide : function(e,ui) { $('#polismin').val((parseInt(($('#polis').slider('value', 0)))* ((4)/100)));
								 									 																$('#polismax').val((parseInt(($('#polis').slider('value', 1)))* ((4)/100)));
								 									 																}, change: function(e,ui) { 
							 									 																	$('#polismin').val((parseInt(($('#polis').slider('value', 0)))* ((4)/100)));
								 									 																$('#polismax').val((parseInt(($('#polis').slider('value', 1)))* ((4)/100)));
								 									 																	//modifyresult('polismin', parseInt($('#polismin').val()));
								 									 																	//modifyresult('polismax', parseInt($('#polismax').val()));
								 									 																	//searchdiamonds();
								 									 																	couplemodifyresult('polismin', parseInt($('#polismin').val()),'polismax', parseInt($('#polismax').val()));
					 									 } });
					 									 
					 									 $('#symmet').slider({ steps: 4, range: true, slide : function(e,ui) { $('#symmetmin').val((parseInt(($('#symmet').slider('value', 0)))* ((4)/100)));
								 									 																$('#symmetmax').val((parseInt(($('#symmet').slider('value', 1)))* ((4)/100)));
								 									 																}, change: function(e,ui) { 
							 									 																	$('#symmetmin').val((parseInt(($('#symmet').slider('value', 0)))* ((4)/100)));
								 									 																$('#symmetmax').val((parseInt(($('#symmet').slider('value', 1)))* ((4)/100)));
								 									 																	//modifyresult('symmetmin', parseInt($('#symmetmin').val()));
								 									 																	//modifyresult('symmetmax', parseInt($('#symmetmax').val()));
								 									 																	//searchdiamonds();
								 									 																	couplemodifyresult('symmetmin', parseInt($('#symmetmin').val()),'symmetmax', parseInt($('#symmetmax').val()));
					 									 } });
					 									 
					 									 $('#pricePerCaratRange').slider({ steps: 100, range: true, minValue : 1, slide : function(e,ui) { $('#pricePerCaratmin').val((parseInt($('#pricePerCaratRange').slider('value', 0)))* ((" . $maxpricepercrt . "-" . $minpricepercrt . ")/100));
								 									 																$('#pricePerCaratmax').val(parseInt($('#pricePerCaratRange').slider('value', 1)) * ((" . $maxpricepercrt . "-" . $minpricepercrt . ")/100));
								 									 																}, change: function(e,ui) { 
																																	$('#pricePerCaratmin').val((parseInt($('#pricePerCaratRange').slider('value', 0)))* ((" . $maxpricepercrt . "-" . $minpricepercrt . ")/100));
								 									 																$('#pricePerCaratmax').val(parseInt($('#pricePerCaratRange').slider('value', 1)) * ((" . $maxpricepercrt . "-" . $minpricepercrt . ")/100));
								 									 																	//modifyresult('pricePerCaratmin',parseInt($('#pricePerCaratmin').val()));
								 									 																	//modifyresult('pricePerCaratmax',parseInt($('#pricePerCaratmax').val()));
								 									 																	//searchdiamonds();
								 									 																	couplemodifyresult('pricePerCaratmin',parseInt($('#pricePerCaratmin').val()),'pricePerCaratmax',parseInt($('#pricePerCaratmax').val()));
														 } });
					 									 
					 									 
					 									 
														$(\"#searchresult\").flexigrid
																	(
																	{   	 							
																	url: '" . $url . "',
																	dataType: 'json',
																	colModel : [
																		{display: 'Lot', name : 'lot', width : 110, sortable : false, align: 'left'},
																		{display: 'Shape', name : 'shape', width : 70, sortable : true, align: 'center'},
																		{display: 'Carat', name : 'carat', width : 55, sortable : true, align: 'center'},
																		{display: 'Color', name : 'color', width : 55, sortable : true, align: 'center'},
																		{display: 'Clarity', name : 'clarity', width : 55, sortable : true, align: 'center'},
																		{display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},
																		
																		{display: 'Ratio', name : 'ratio', width : 30, sortable : true, align: 'center'},
																		{display: 'Cut', name : 'cut', width : 70, sortable : true, align: 'center'},																		
																		{display: 'Depth', name : 'Depth', width : 45, sortable : true, align: 'center',hide: true},
																		{display: 'Polish', name : 'Polish', width : 45, sortable : true, align: 'center',hide: true},
																		{display: 'Table%', name : 'TablePercent', width : 45, sortable : true, align: 'center',hide: true},
																		{display: 'Flurosence', name : 'Flour', width : 50, sortable : true, align: 'center',hide: true},
																		{display: 'Culet', name : 'Culet', width : 45, sortable : true, align: 'center'},
																		{display: 'Cert', name : 'Cert', width : 45, sortable : true, align: 'center'},
																		{display: 'Symmetry', name : 'Sym', width : 40, sortable : false, align: 'center',hide: true},
																		{display: 'Price/Carat', name : 'pricepercrt', width : 50, sortable : false, align: 'center',hide: true}
																		],
																	 		
																	sortname: \"price\",
																	sortorder: \"asc\",
																	usepager: true,
																	title: '<h1 class=\"pageheader\">Diamonds Search Result</h1>',
																	useRp: true,
																	rp: 25,
																	showTableToggleBtn: false,
																	striped:false,
																	width: 770,
																	height: \"auto\"
																	}
																	);
														 
																$(\".flexigrid .bDiv\").height(418);
																$(\".flexigrid .nDiv\").height(418);
																$(\".flexigrid .hGrip\").height(418);			
														 
														 ";

            $data ['extraheader'] = '';
            $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script>';
            $data ['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
            $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" /> ';

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
            $output = $this->load->view('diamond/bomiadvancesearch-new', $data, true);
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

            $output = $this->load->view('diamond/bomisearch', $data, true);
            $this->output($output, $data);
        }
    }

    function getsearchresultBomi($addoption = '', $settingsid = '') {
        $page = isset($_POST ['page']) ? $_POST ['page'] : 1;
        $rp = isset($_POST ['rp']) ? $_POST ['rp'] : 15;
        $sortname = isset($_POST ['sortname']) ? $_POST ['sortname'] : 'price';
        $sortorder = isset($_POST ['sortorder']) ? $_POST ['sortorder'] : 'desc';
        $query = isset($_POST ['query']) ? $_POST ['query'] : '';
        $qtype = isset($_POST ['qtype']) ? $_POST ['qtype'] : 'title';


        $results = $this->Diamondmodel->getSearchBomi($page, $rp, $sortname, $sortorder, $query, $qtype, '', $addoption);
        /* echo '<pre>';
          print_r($results);
          echo '</pre>'; */
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: text/x-json");
        $json = "";
        $json .= "{\n";
        $json .= "page: $page,\n";
        $json .= "sortname: \"carat\",\n";
        $json .= "total: " . $results ['count'] . ",\n";
        $json .= "rows: [";


        if (strcmp($addoption, 'toearring') === 0) {



            $rc = false;
            $result = array_chunk($results ['result'], 2);
            foreach ($results ['result'] as $row) {
                //print_r($row);
                $matchstone = $this->Diamondmodel->getEarRingSideStone($row);
                if ($matchstone) {
                    // $row = $pair[0];
                    $row2 = $matchstone;
                    $shape = $this->getShape($row ['shape']);




                    $settingsid = ($settingsid != '') ? $settingsid : 'false';

                    if ($rc)
                        $json .= ",";
                    $json .= "\n {";
                    $json .= "lot:'" . $row ['lot'] . "',";
                    //$json .= "cell:['<input type=\'checkbox\' name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(\'" . $row ['lot'] . "\',\'" . $addoption . "\'," . $settingsid . ",\'" . $row2 ['lot'] . "\')\" class=\"blue search\">View Details</a>'";
                    $json .= "cell:['<input type=\'checkbox\' name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(\'" . $row ['lot'] . "\',\'" . $addoption . "\'," . $settingsid . ",\'" . $row2 ['lot'] . "\')\" >View Details</a>'";

                    $json .= ",'" . $shape . "'";
                    $json .= ",'" . addslashes(($row ['carat'] + $row2 ['carat'])) . "'";
                    $json .= ",'" . addslashes($row ['color']) . '<br>' . addslashes($row2 ['color']) . "'";
                    $json .= ",'" . addslashes($row ['clarity']) . '<br>' . addslashes($row2 ['clarity']) . "'";
                    $json .= ",'" . addslashes("<span style=\"color:red;\">Call for Pricing</span>") . "'";
                    //	$json .= ",'$" . addslashes ( number_format ( round ( (round($row ['price'])+round($row2 ['price'])) ) ) ) . "'";
                    $json .= ",'" . addslashes($row ['ratio']) . '<br>' . addslashes($row2 ['ratio']) . "'";
                    $json .= ",'" . addslashes($row ['cut']) . '<br>' . addslashes($row2 ['cut']) . "'";
                    $json .= ",'" . addslashes($row ['Depth']) . '<br>' . addslashes($row2 ['Depth']) . "'";
                    $json .= ",'" . addslashes($row ['Polish']) . '<br>' . addslashes($row2 ['Polish']) . "'";
                    $json .= ",'" . addslashes($row ['TablePercent']) . '<br>' . addslashes($row2 ['TablePercent']) . "'";
                    $json .= ",'" . addslashes($row ['Flour']) . '<br>' . addslashes($row2 ['Flour']) . "'";
                    $json .= ",'" . addslashes($row ['Culet']) . '<br>' . addslashes($row2 ['Culet']) . "'";
                    $cimage = trim($row ['certimage']);
                    $cimage2 = trim($row2 ['certimage']);
                    if (isset($cimage) && $cimage != '') {
                        $c = "<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes($row ['Cert']) . "</a>";
                    } else {
                        $c = addslashes($row ['Cert']);
                    }
                    if (isset($cimage2) && $cimage2 != '') {
                        $c2 = "<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes($row2 ['Cert']) . "</a>";
                    } else {
                        $c2 = addslashes($row2 ['Cert']);
                    }
                    //$cimage = substr(trim($row['certimage']),7,(strlen(trim($row['certimage']))-7));
                    //'www.rapnet.com/UF/50217/Certs/1087.jpg' ;

                    $json .= ",'" . $c . '<br>' . $c2 . "'";
                    $json .= ",'" . addslashes($row ['Sym']) . '<br>' . addslashes($row2 ['Sym']) . "'";
                    $json .= ",'" . addslashes($row ['pricepercrt']) . '<br>' . addslashes($row2 ['pricepercrt']) . "'";
                    $json .= ",'']";
                    $json .= "}";
                    $rc = true;
                }
                //print_r($matchstone);
                //die('hi');
            }
            $json .= "]\n";
            $json .= "}";
            echo $json;
            /* foreach ( $result as $pair )
              {

              if(isset($pair[0]) && isset($pair[1]))
              {
              $row = $pair[0];
              $row2 = $pair[1];
              $shape = $this->getShape($row ['shape']);




              $settingsid = ($settingsid != '') ? $settingsid : 'false';

              if ($rc)
              $json .= ",";
              $json .= "\n {";
              $json .= "lot:'" . $row ['lot'] . "',";
              $json .= "cell:['<input type=\'checkbox\' name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(\'" . $row ['lot'] . "\',\'" . $addoption . "\'," . $settingsid . ",". $row2 ['lot'].")\" class=\"blue search\">View Details</a>'";
              $json .= ",'" . $shape . "'";
              $json .= ",'" . addslashes ( ($row ['carat']+$row2 ['carat']) ) ."'";
              $json .= ",'" . addslashes ( $row ['color'] ) . '<br>' .addslashes ( $row2 ['color'] )."'";
              $json .= ",'" . addslashes ( $row ['clarity'] ) .'<br>' .addslashes ( $row2 ['clarity'] ). "'";
              $json .= ",'$" . addslashes ( number_format ( round ( (round($row ['price'])+round($row2 ['price'])) ) ) ) . "'";
              $json .= ",'" . addslashes ( $row ['ratio'] ) . '<br>' .addslashes ( $row2 ['ratio'] ). "'";
              $json .= ",'" . addslashes ( $row ['cut'] ) . '<br>' .addslashes ( $row2 ['cut'] ). "'";
              $json .= ",'" . addslashes ( $row ['Depth'] ) .  '<br>' .addslashes ( $row2 ['Depth'] )."'";
              $json .= ",'" . addslashes ( $row ['Polish'] ) . '<br>' .addslashes ( $row2 ['Polish'] ). "'";
              $json .= ",'" . addslashes ( $row ['TablePercent'] ) . '<br>' .addslashes ( $row2 ['TablePercent'] ). "'";
              $json .= ",'" . addslashes ( $row ['Flour'] ) .  '<br>' .addslashes ( $row2 ['Flour'] )."'";
              $json .= ",'" . addslashes ( $row ['Culet'] ) .  '<br>' .addslashes ( $row2 ['Culet'] )."'";
              $cimage = trim ( $row ['certimage'] );
              $cimage2 = trim ( $row2 ['certimage'] );
              if (isset ( $cimage ) && $cimage != '')
              {
              $c = "<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes ( $row ['Cert'] ) . "</a>";
              }
              else
              {
              $c = addslashes ( $row ['Cert'] );
              }
              if (isset ( $cimage2 ) && $cimage2 != '')
              {
              $c2 = "<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes ( $row2 ['Cert'] ) . "</a>";
              }
              else
              {
              $c2 = addslashes ( $row2 ['Cert'] );
              }
              //$cimage = substr(trim($row['certimage']),7,(strlen(trim($row['certimage']))-7));
              //'www.rapnet.com/UF/50217/Certs/1087.jpg' ;

              $json .= ",'" . $c .'<br>' . $c2 ."'";
              $json .= ",'" . addslashes ( $row ['Sym'] ) .'<br>' .addslashes ( $row2 ['Sym'] ). "'";
              $json .= ",'" . addslashes ( $row ['pricepercrt'] ) . '<br>' .addslashes ( $row2 ['pricepercrt'] )."'";
              $json .= ",'']";
              $json .= "}";
              $rc = true;
              }
              }
              $json .= "]\n";
              $json .= "}";
              echo $json; */
        } else {
            //$sort = "ORDER BY $sortname $sortorder";


            $rc = false;


            foreach ($results ['result'] as $row) {
                $shape = '';
                switch ($row ['shape']) {
                    case 'B' :
                        $shape = 'Round';
                        break;
                    case 'PR' :
                        $shape = 'Princess';
                        break;
                    case 'R' :
                        $shape = 'Radiant';
                        break;
                    case 'E' :
                        $shape = 'Emerald';
                        break;
                    case 'AS' :
                        $shape = 'Ascher';
                        break;
                    case 'O' :
                        $shape = 'Oval';
                        break;
                    case 'M' :
                        $shape = 'Marquise';
                        break;
                    case 'P' :
                        $shape = 'Pear shape';
                        break;
                    case 'H' :
                        $shape = 'Heart';
                        break;
                    case 'C' :
                        $shape = 'Cushion';
                        break;
                    default :
                        $shape = $row ['shape'];
                        break;
                }

                /* $url='';
                  if($addoption!=''){
                  $url= config_item('base_url')."diamonds/getsearchresult/".$option;
                  }
                  else {$url= config_item('base_url')."diamonds/getsearchresult";} */

                $settingsid = ($settingsid != '') ? $settingsid : 'false';


                if ($rc)
                    $json .= ",";
                $json .= "\n {";
                $json .= "lot:'" . $row ['lot'] . "',";
                //$json .= "cell:['<input type=\'checkbox\' name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(\'" . $row ['lot'] . "\',\'" . $addoption . "\'," . $settingsid . ")\" class=\"blue search\">View Details</a>'";
                $json .= "cell:['<input type=\'checkbox\' name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(\'" . $row ['lot'] . "\',\'" . $addoption . "\'," . $settingsid . ")\" >View Details</a>'";
                $json .= ",'" . $shape . "'";
                $json .= ",'" . addslashes($row ['carat']) . "'";
                $json .= ",'" . addslashes($row ['color']) . "'";
                $json .= ",'" . addslashes($row ['clarity']) . "'";
                $json .= ",'" . addslashes("<span style=\"color:red;\">Call for Pricing</span>") . "'";
                //		$json .= ",'$" . addslashes ( number_format ( round ( $row ['price'] ) ) ) . "'";
                $json .= ",'" . addslashes($row ['ratio']) . "'";
                ///  cut missing
                $json .= ",'" . addslashes($row ['cut']) . "'";
                $json .= ",'" . addslashes($row ['Depth']) . "'";
                $json .= ",'" . addslashes($row ['Polish']) . "'";
                $json .= ",'" . addslashes($row ['TablePercent']) . "'";
                $json .= ",'" . addslashes($row ['Flour']) . "'";
                $json .= ",'" . addslashes($row ['Culet']) . "'";
                $cimage = trim($row ['certimage']);
                //$cimage = substr(trim($row['certimage']),7,(strlen(trim($row['certimage']))-7));
                //'www.rapnet.com/UF/50217/Certs/1087.jpg' ;
                if (isset($cimage) && $cimage != '') {
                    $json .= ",'<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes($row ['Cert']) . "</a>'";
                } //onclick=\"viewChart(\'".$row['certimage']."\')\"
                else {
                    $json .= ",'" . addslashes($row ['Cert']) . "'";
                }
                $json .= ",'" . addslashes($row ['Sym']) . "'";
                $json .= ",'" . addslashes($row ['pricepercrt']) . "'";
                $json .= ",'']";
                $json .= "}";
                $rc = true;
            }
            $json .= "]\n";
            $json .= "}";
            echo $json;
        }
    }

    private function getCommonData($banner = '') {
        $data = array();
        $data = $this->Commonmodel->getPageCommonData();

        return $data;
    }

function get_fancy($color)
{
$all_pro = $this->Commonmodel->select_where('*','dev_index',array('Fancy_Color'=>$color));
print $all_pro; exit;
}
    function output($layout = null, $data = array(), $isleft = false, $isright = true) {
        $data ['loginlink'] = $this->User->loginhtml();
        $output = $this->load->view($this->config->item('template') . 'wsale_header', $data, true);
        if ($isleft)
            $output .= $this->load->view($this->config->item('template') . 'left', $data, true);
        $output .= $layout;
        if ($isright)
            $output .= $this->load->view($this->config->item('template') . 'right', $data, true);
        $output .= $this->load->view($this->config->item('template') . 'footer', $data, true);
        $this->output->set_output($output);
    }

    private function getShapeName($shapelist) {
        $shapename = '';
        $shapestr = '';
        if (($this->session->userdata('shape'))) {
            $shapes = $this->session->userdata('shape');
            $shapelist = explode('.', $shapes);
			if (isset($shapelist) && !empty($shapelist)) {
                foreach ($shapelist as $val) {
                    if ($val != '') {
                        switch ($val) {
                            case 'B' :
                                $shapename = 'Round';
                                break;
                            case 'PR' :
                                $shapename = 'Princess';
                                break;
                            case 'R' :
                                $shapename = 'Radiant';
                                break;
                            case 'E' :
                                $shapename = 'Emerald';
                                break;
                            case 'AS' :
                                $shapename = 'Ascher';
                                break;
                            case 'O' :
                                $shapename = 'Oval';
                                break;
                            case 'M' :
                                $shapename = 'Marquise';
                                break;
                            case 'P' :
                                $shapename = 'Pear shape';
                                break;
                            case 'H' :
                                $shapename = 'Heart';
                                break;
                            case 'C' :
                                $shapename = 'Cushion';
                                break;
                            default :
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

    function getDepthMinMax($shapelist = '') {
        $shapemax = '';
        $shapemin = '';
        $min = 100;
        $max = 0;
        if (($this->session->userdata('shape'))) {
            $shapes = $this->session->userdata('shape');
            $shapelist = explode('.', $shapes);
			if (isset($shapelist) && !empty($shapelist)) {
                foreach ($shapelist as $val) {
                    if ($val != '') {
                        switch ($val) {
                            case 'B' :
                                $shapemin = '56.5';
                                $shapemax = '67';
                                break;
                            case 'PR' :
                                $shapemin = '55';
                                $shapemax = '86';
                                break;
                            case 'R' :
                                $shapemin = '55';
                                $shapemax = '86';
                                break;
                            case 'E' :
                                $shapemin = '54';
                                $shapemax = '79';
                                break;
                            case 'AS' :
                                $shapemin = '54';
                                $shapemax = '79';
                                break;
                            case 'O' :
                                $shapemin = '50';
                                $shapemax = '74';
                                break;
                            case 'M' :
                                $shapemin = '50';
                                $shapemax = '74';
                                break;
                            case 'P' :
                                $shapemin = '50';
                                $shapemax = '74';
                                break;
                            case 'H' :
                                $shapemin = '45';
                                $shapemax = '65';
                                break;
                            case 'C' :
                                $shapemin = '54';
                                $shapemax = '73';
                                break;
                            default :
                                $shapemin = '10';
                                $shapemax = '100';
                                break;
                        }
                        if ($shapemin < $min)
                            $min = $shapemin;
                        if ($shapemax > $max)
                            $max = $shapemax;
                    }
                }
            } else {
                $min = '10';
                $max = '100';
            }
        } else {
            $min = '10';
            $max = '100';
        }
        return array(
            $min,
            $max);
    }

    function getTableMinMax($shapelist = '') {
        $shapemax = '';
        $shapemin = '';
        $min = 100;
        $max = 0;
        if (($this->session->userdata('shape'))) {
            $shapes = $this->session->userdata('shape');
            $shapelist = explode('.', $shapes);
            if (isset($shapelist) && !empty($shapelist)) {
                foreach ($shapelist as $val) {
                    if ($val != '') {
                        switch ($val) {
                            case 'B' :
                                $shapemin = '50';
                                $shapemax = '67';
                                break;
                            case 'PR' :
                                $shapemin = '51';
                                $shapemax = '89';
                                break;
                            case 'R' :
                                $shapemin = '51';
                                $shapemax = '89';
                                break;
                            case 'E' :
                                $shapemin = '51';
                                $shapemax = '79';
                                break;
                            case 'AS' :
                                $shapemin = '51';
                                $shapemax = '79';
                                break;
                            case 'O' :
                                $shapemin = '50';
                                $shapemax = '71';
                                break;
                            case 'M' :
                                $shapemin = '50';
                                $shapemax = '71';
                                break;
                            case 'P' :
                                $shapemin = '50';
                                $shapemax = '71';
                                break;
                            case 'H' :
                                $shapemin = '51';
                                $shapemax = '70';
                                break;
                            case 'C' :
                                $shapemin = '49';
                                $shapemax = '71';
                                break;
                            default :
                                $shapemin = '10';
                                $shapemax = '100';
                                break;
                        }
                        if ($shapemin < $min)
                            $min = $shapemin;
                        if ($shapemax > $max)
                            $max = $shapemax;
                    }
                }
            } else {
                $min = '10';
                $max = '100';
            }
        } else {
            $min = '10';
            $max = '100';
        }
        return array(
            $min,
            $max);
    }
    
    function getMinMaxVal($dbcols='price', $addoption='') {
        if( $dbcols == 'price' ) 
        {
            $minsField = "floor(min(price))";
            $maxsField = "ceil(max($dbcols))";
        } 
        elseif( $dbcols == 'carat' ) 
        {
            $minsField = "min(carat)";
            $maxsField = "max(carat)";
        } 
        else 
        {
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

	function search($details = false, $shape = '', $addoption = '', $ispremium = true, $settingsid = '') {
		$option = ( empty($addoption) ? 'whsale' : $addoption );
		$this->session->unset_userdata('diamonds_type');

		if( $details === 'signature_diamonds' ) {
			$details = 'true';
			$this->session->set_userdata('diamonds_type', 'signature_diamonds');
		}
		$diamnd_search = check_empty($this->input->post('diamnd_search', true), '');

		if( !empty($diamnd_search) ) {
			$this->session->set_userdata('diamnd_search', $diamnd_search);
		} else {
			$this->session->unset_userdata('diamnd_search');
		}

		$this->session->unset_userdata('setfancy_colr');
		if( strcmp( 'tothreestone', $option ) !== 0 ) {
			$this->session->unset_userdata('length');
			$this->session->unset_userdata('width');
			$this->session->unset_userdata('carat');
		}

		$backs_page = $this->session->userdata('backs_page');
		if( empty($shape) && empty($backs_page) ) {
			$this->resetDiamondFilter('search');
		}
		$data = $this->getCommonData();
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

		$depthCol = $this->getMinMaxVal('Depth', $option);
		$caratCol = $this->getMinMaxVal('carat', $option);
		$priceCol = $this->getMinMaxVal('price', $option);
		$tablePrce = $this->getMinMaxVal('TablePercent', $option);

		$data['min_depth'] = 49;
		$data['max_depth'] = 89; //$depthCol['maxs']; //80; //$filter_value['maxdepth'];
		$data['min_carat'] = $caratCol['mins']; //45;
		$data['max_carat'] = 15; //$caratCol['maxs']; //80;
		$data['min_table'] = $tablePrce['mins']; //50; //$filter_value['mintable'];
		$data['max_table'] = $tablePrce['maxs']; //83; //$filter_value['maxtable'];
		$data['minm_price']  = 150; //$priceCol['mins'];
		$data['maxim_price'] = 999999; //1000000; //$priceCol['maxs'];
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
        if( in_array ($option, $adoptionSet) ) {
            $data['price_start'] = $priceCol['mins'];
        } elseif( in_array($option, $pairedOptions) ) {
            $data['price_start'] = $price_start / 3;
        } else {
            $data['price_start'] = $price_start;
        }
		$data['price_start'] = 150;
		$data['price_end']   = 1000000;
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
        $data ['title'] = 'Diamonds';
		$data ['dm_shape'] = ( $shape == 'SG' ? 'checked' : '' );
		$data ['rd_checked'] = ( $shape == 'B' ? 'checked' : '' );
		$data['signup_form'] = $this->sign_upform;
		$pendant3Stone = str_replace('_', '', $option);
		$curr_urlink = current_url();
		$stepNo = ( $settingsid == '' ? 2 : 3);
		$data['pendanType'] = $this->session->userdata('pendant_option');
		$arpendant_link = array('addpendantsetings','addpendantsetings3stone','tothreestone');
		$sidestone_option = array('toearring','tothree_stone','addpendantsetings_3stone');
		$url_position = strpos($curr_urlink, 'inner_Diamonds_10');
		$curent_link = ( ( $url_position === false ) ? $curr_urlink : '' );
		$setingID = ( is_numeric($settingsid) ? $settingsid : 'HELLO' );
		if( is_numeric($settingsid) ) {
			if(in_array($option, $sidestone_option )) {
				$this->session->set_userdata('sidestone_diamond',$curr_urlink);
			}
			if(in_array($option, $arpendant_link )) {
				$this->session->set_userdata('change_diamond',$curr_urlink);
			}
		}
		$options_ar = array('addpendantsetings_3stone', 'addpendantsetings3stone');
		$tothre_stone = array('tothreestone', 'tothree_stone');
		if($option != '') {
			$step_no = ( ( $option == 'addpendantsetings3stone' || $option == 'tothreestone' ) ? 2 : 3 );
			if(in_array($pendant3Stone, $options_ar)) {
				$data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant($step_no, 'threestone');
			} else if(in_array($option, $tothre_stone)) {
				$data['pendan_stepsbar'] = '<br>' . stepsBuildToThrestone($step_no, 'tothreestone');
			} else {
				$solitair = ( $option == 'toearring' ? 'toearring' : 'solitaire' );
				$data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant(2, $solitair);
			}
		}
		$dmin_price = $this->input->post('minprice',TRUE);
		$dmax_price = $this->input->post('maxprice',TRUE);
		$dmin_price = ( !empty($dmin_price) ? $dmin_price : 0.5 );
		$dmin_price = ( !empty($dmax_price) ? $dmax_price : 3.5 );
        if($details == false) {
            $this->session->unset_userdata('shape');
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
			'SG',
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

        $minprice = 250; //$this->Diamondmodel->getMinPrice();
        $maxprice = 1000000; //$this->Diamondmodel->getMaxPrice();
        switch ($option) {
            case 'tothreestone' :
                $this->session->set_userdata('caratmin', .5);
                $this->session->set_userdata('caratmax', 3.50);
                $minprice = (($this->session->userdata('searchminprice')) ? $this->session->userdata('searchminprice') : 250);
                $maxprice = (($this->session->userdata('searchmaxprice')) ? $this->session->userdata('searchmaxprice') : 1000000);

                $caratminmax = array(
                    'min' => 0.5,
                    'max' => '3.50');
                break;
            case 'addpendantsetings3stone' :
                $this->session->set_userdata('caratmin', $dmin_price);
                $this->session->set_userdata('caratmax', $dmin_price);
                $caratminmax = array(
                    'min' => $dmin_price,
                    'max' => $dmin_price);
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

        $depthminmax = $this->getDepthMinMax();
        $data ['depthmin'] = $depthminmax [0];
        $data ['depthmax'] = $depthminmax [1];

        $tableminmax = $this->getTableMinMax();
        $data ['tablemin'] = $tableminmax [0];
        $data ['tablemax'] = $tableminmax [1];

        if (strcmp($option, 'tothreestone') === 0) {
            $minpricepercrt = .5;
            $maxpricepercrt = 3.5; //$this->Diamondmodel->getMaxPricePerCarat ();
        } else {
            $minpricepercrt = $this->Diamondmodel->getMinPricePerCarat();
            $maxpricepercrt = $this->Diamondmodel->getMaxPricePerCarat();
        }

        $data ['totaldiamond'] = $this->Diamondmodel->getCountDiamond($minprice, $maxprice);
        if (isset($_POST ['resumesearch'])) {
            $details = true;
        }

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
            $url = config_item('base_url') . "diamondslist/getsearchresult/" . $option . "/" . $settingsid;
        } elseif ($option != '') {
            $url = config_item('base_url') . "diamondslist/getsearchresult/" . $option;
        } else {
            $url = config_item('base_url') . "diamondslist/getsearchresult";
        }

        $set_page_title = $this->session->userdata('set_page_title');
        $pageTitle = "Diamond Anniversary Band";
        $data['title'] = ( !empty($set_page_title) ? $set_page_title : $pageTitle );

        if ($details && $details == 'true') {
	    	$data ['onloadextraheader'] = "";
            $data ['extraheader'] = '';
            $data ['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/diamondsearch.css" rel="stylesheet" />';
            $data ['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/bootstrap-switch.css" rel="stylesheet" />';
            $data ['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/papillon.css" rel="stylesheet" />';
            $data ['extraheader'] .= '<script language="javascript" type="text/javascript">var qipurl = "' . $url . '";</script>';
            $data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/jquery.cookies.2.2.0.min.js"></script>';
            $data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/papillon.js"></script>';
		    $data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/common_function.js"></script>';
            $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script>';
            $data ['extraheader'] .= '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';
            $data ['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid.css" rel="stylesheet" />';
            $data ['bodyonload'] = 'initialize()';
            $data ['bodyonunload'] = 'GUnload()';
            $data ['usetips'] = true;

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
			$data['radomprodects'] = $this->Jewelleriesmodel->getrandomproduct($settingsid);
			if(strcmp($option, 'addpendantsetings') === 0 || strcmp($option, 'addpendantsetings3stone') === 0) {
				$this->session->set_userdata('pendant_diamond',$curr_urlink);
			}
			$data ['listComparedDimaond'] = $this->viewCompareListBySesion('search', $option, $settingsid);
            $output = $this->load->view('diamondslist/bomiadvancesearch-new', $data, true);
            $this->output($output, $data, false, false);
		} else {
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

            $output = $this->load->view('diamond/search', $data, true);
            $this->output($output, $data);
        }
    }

	//// view diamond pendant details
	function viewPendantsDiamondDetail($lot='',$add_option='',$setting_id='', $lot2='') {
		$lot 				= urldecode($lot);
		$lot2 				= urldecode($lot2);
		$data['lot'] 		= $lot;
		$data['addoption']  = $add_option;
		$data['settingsid'] = $setting_id;
		$row_detail = $this->Diamondmodel->getDetailsByLot($lot);
		$data['row_detail'] = $row_detail;
		
		$data['row_sdiamond'] = $this->Diamondmodel->getSimilarDiamonds($lot,$row_detail['shape'],$row_detail['clarity'],$row_detail['Cert']);
		
		$image_path = config_item('base_url').'images/shapes_images/';
		$coloredm_imgpath = config_item('base_url').'img/diamond_shapes/';
		$data['diamond_shape'] = view_shape_value($view_diamondimg, $row_detail['shape']);
		
		$image_dmshape = strtolower($data['diamond_shape']);
		$image_cltype = getDiamondColr($row_detail['fcolor_value']);
		
		if($row_detail['fcolor_value'] != '' && $setting_id === 'fancy_color') {
			$data['diamond_type'] = 'Colored Diamond';
			$shape_image = $coloredm_imgpath.$image_cltype.'_'.$image_dmshape.'.jpg'; //echo $shape_image;exit;
			$data['view_shapeimage'] = ( getimagesize($shape_image) ? $shape_image : $coloredm_imgpath.'dm_noimage.jpg' );
			
		} else {
			$data['diamond_type'] = 'White Diamond';
			$data['view_shapeimage'] = $image_path.$view_diamondimg;
		}
		
		if($lot2 != '') {
			$data['row_detail2'] = $this->Diamondmodel->getDetailsByLot($lot2);
			$data['bothdm_price'] = '$'._nf( $data['row_detail']['price'] + $data['row_detail2']['price'] );
			$option_setting = resetOptionValue($add_option);
			$data['moredt_link'] = config_item('base_url').'diamonds/diamondpair_moredetail/'.$lot.'/'.$option_setting.'/'.$setting_id.'/'.$lot2;
			$data['sidestone_carat'] = $row_detail['carat'] + $data['row_detail2']['carat'];
			$page_filename = 'view3stone_pendantdetail';
		} else {
			//config_item('base_url')."diamonds/diamond_detail/".$row ['lot']."/".$addoption."/".$settingsid
			$settings_ar = array('','fancy_color','addtoring','addpendantsetings3stone','tothreestone', 'whsale');
			$pagerdLink = ( ( in_array($setting_id,$settings_ar) || in_array($add_option,$settings_ar)) ? 'diamondslist/diamond_detail/' : 'jewelry/build_owndiamond_pendant/');
			
			$data['detail_pglink'] = config_item('base_url').$pagerdLink.$row_detail['lot'].'/'.$add_option.'/'.$setting_id;
			$data['addto_dmlink']  = $data['detail_pglink']; //config_item('base_url').'jewelry/pendantdetailsview/'.$add_option.'/'.$lot.'/'.$setting_id;
		
			$page_filename = 'viewpendants_detail';
		}
		
		$output = $this->load->view('diamond/'.$page_filename, $data, true);
        $this->output->set_output($output);
			
	}
	////// diamond paire more detail page
	function diamondpair_moredetail($lot='', $addoption='', $settingid='', $lot2='') {
		
		$data = $this->getCommonData();	
		$lot 				= urldecode($lot);
		$lot2 				= urldecode($lot2);
		$settingid			= urldecode($settingid);
		$data['dmrow_detail'] = $this->Diamondmodel->getDetailsByLot($lot);
		$data['dmrow_detail2'] = $this->Diamondmodel->getDetailsByLot($lot2);
		
		$data['diamond1_detail'] = getCutValue($data['dmrow_detail']['cut']).' CUT . '.$data['dmrow_detail']['color'].' COLOR . '.$data['dmrow_detail']['clarity'].' CLARITY';
		$data['diamond2_detail'] = getCutValue($data['dmrow_detail2']['cut']).' CUT . '.$data['dmrow_detail2']['color'].' COLOR . '.$data['dmrow_detail2']['clarity'].' CLARITY';
		$data['total_dmprice'] = '$ '._nf($data['dmrow_detail']['price'] + $data['dmrow_detail2']['price']);
		$data['next_date'] = nextDate();
		$data['diamond1_shape'] = view_shape_value($view_diamondimg, $data['dmrow_detail']['shape']);
		$data['diamond2_shape'] = view_shape_value($view_diamondimg, $data['dmrow_detail2']['shape']);
		$data['clarity_box'] = $this->clarityBox($data['dmrow_detail']['clarity']);
		$data['clarity2_box'] = $this->clarityBox($data['dmrow_detail2']['clarity']);
		$data['color_box'] = $this->setColor($data['dmrow_detail']['color']);
		$data['color2_box'] = $this->setColor($data['dmrow_detail2']['color']);
		$data['cut_box'] = $this->cutBox($data['dmrow_detail']['cut']);
		$data['cut2_box'] = $this->cutBox($data['dmrow_detail2']['cut']);
		$data['pair_image'] = config_item('base_url').pair_shape_value($data['dmrow_detail']['shape']);
		$data['total_carat'] = $data['dmrow_detail']['carat'] + $data['dmrow_detail2']['carat'];
		$data['addoption'] = $addoption;
		
		if(strcmp($addoption,'toearring') === 0) {
			$choose_dmlink = 'jewelry/complete_earings/'.$settingid.'/'.$lot.'/'.$lot2.'/'.$addoption;
		} else {
			$setings_id = $this->session->userdata('setings_id');
			$choose_dmlink = 'jewelry/build_owndiamond_pendant/'.$lot.'/'.$addoption.'/'.$setings_id.'/'.$settingid.'/'.$lot2;	
		}
		
		if( $settingid != 'images' && $lot2 != 'inner_Diamonds_14.jpg' ) {
			$this->session->set_userdata('sidestone_dtview', current_url());
		}
		$data['choose_dmlink'] = config_item('base_url').$choose_dmlink;
		$data['title'] = 'Diamond Pair More Detail';
		
		$pendanType = $this->session->userdata('pendant_option');
		//// show steps bar
		//$data['pendan_stepsbar'] = '';
		$options_ar = array('addpendantsetings_3stone', 'addpendantsetings3stone');
		if(in_array($addoption, $options_ar)) {
			$data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant(3, 'threestone');
		} else if(strcmp($addoption,'tothreestone') === 0) {
			$data['pendan_stepsbar'] = '<br>' . stepsBuildToThrestone(3, 'tothreestone', $settingid, 0, $lot, $settingid, $lot2);
		} else {
			$solitair = ( $addoption == 'toearring' ? 'toearring' : 'solitaire' );
			$data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant($stepNo, $solitair);
		}
		
		$data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/jquery.min.js" type="text/javascript"></script>';
		$data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/accordian_tabsjs.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
		
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';	
		
		$data['simlars_diamondpair'] = getSimilarDiamondsListRows($lot, $lot2, $addoption, $settingid, 'diamond');
        $output = $this->load->view('diamond/diamondpair_moredetail' , $data , true);
		$this->output($output , $data);
	}
	/// set cut box
	function cutBox($cutvalue) {
		$cutvl_ar = array('EX','Fair','GD',$cutvalue, 'ID','Poor','VG');
			
		$view_cut = $this->boxSetting($cutvalue, $cutvl_ar, 5, 'cut');
		
		return $view_cut;
	}
	/// set clarity box
	function clarityBox($clarity) {
		$clarity_ar = array('FL','IF','VVS1',$clarity, 'VVS2','VS1','VS2','S11','S12','SI3','I1','I2','I3');
			
		$view_clarity = $this->boxSetting($clarity, $clarity_ar, 8);
		
		return $view_clarity;
	}
	//// set color box
	function setColor($color) {
		$color_ar = array('D','E','F',$color,'G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
				
		$view_rs = $this->boxSetting($color, $color_ar, 7);
		
		return $view_rs;
	}
	//// view box funciton
	/// $column : column value, $array_rt : set array, $br: limit to break array loop
	function boxSetting($column, $array_rt, $br, $cut='') {
		$color_ar = array_unique ( $array_rt );
		
		$cl = 1;
		$arcolor = array();
		foreach($color_ar as $colr) {
			$arcolor[] = $colr;
		
		if($cl==$br) {
			break;
		}
		$cl++;	
		}
		asort( $arcolor );
		$view_result = '';
		foreach($arcolor as $clor) {
			$selecBg = ( $clor == $column ? 'extrabg' : '' );
			$boxValue = ( $cut != '' ? getCutValue($clor) : $clor);
			$view_result .= '<div class="boxTable_cols '.$selecBg.'">'.$boxValue.'</div>';
		}
		return $view_result;
	}

	////// diamond fancy color page
	function fancy_colors($details = true, $fcolor='', $shape = false, $option = 'addtoring', $ispremium = true, $settingsid = '') {
		 $current_link = explode( '/', current_url() );
			 if( !in_array('images', $current_link) ) {
				$this->session->set_userdata('diamond_pageurl', current_url());
			 }
		 
        $data = $this->getCommonData();
        $this->session->set_userdata('setfancy_colr','colormin');
        //	exit();
        //	print_r($data);
        $data ['title'] = 'Diamonds';
        if($shape == false && $fcolor == '') {
            $this->session->unset_userdata('shape');
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
            'O');

        if (in_array($shape, $shapearray)) {
            $this->session->set_userdata('shape', $shape);
            $this->session->set_userdata('cutmin', 0);
            $this->session->set_userdata('cutmax', 4);
        }
        if ($ispremium)
            $this->session->set_userdata('ispremium', true);
        else
            $this->session->set_userdata('ispremium', false);

        $minprice = 250; //$this->Diamondmodel->getMinPrice();
        $maxprice = 1000000; //$this->Diamondmodel->getMaxPrice();


        switch ($option) {
            case 'tothreestone' :
                $this->session->set_userdata('caratmin', .5);
                $this->session->set_userdata('caratmax', 3.50);
                $minprice = (($this->session->userdata('searchminprice')) ? $this->session->userdata('searchminprice') : 250);
                $maxprice = (($this->session->userdata('searchmaxprice')) ? $this->session->userdata('searchmaxprice') : 1000000);

                $caratminmax = array(
                    'min' => 0.5,
                    'max' => '3.50');
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

        $depthminmax = $this->getDepthMinMax();
        $data ['depthmin'] = $depthminmax [0];
        $data ['depthmax'] = $depthminmax [1];

        $tableminmax = $this->getTableMinMax();
        $data ['tablemin'] = $tableminmax [0];
        $data ['tablemax'] = $tableminmax [1];


        if (strcmp($option, 'tothreestone') === 0) {
            $minpricepercrt = .5;
            $maxpricepercrt = 3.5; //$this->Diamondmodel->getMaxPricePerCarat ();
        } else {
            $minpricepercrt = $this->Diamondmodel->getMinPricePerCarat();
            $maxpricepercrt = $this->Diamondmodel->getMaxPricePerCarat();
        }
        
        $data ['totaldiamond'] = $this->Diamondmodel->getCountDiamond($minprice, $maxprice);

        if (isset($_POST ['resumesearch'])) {
            $details = true;
        }

        if ($details == 'true') {

            /* $minprice =  $this->Diamondmodel->getMinPrice();
              $maxprice =  $this->Diamondmodel->getMaxPrice();

              $minpricepercrt =  $this->Diamondmodel->getMinPricePerCarat();
              $maxpricepercrt =  $this->Diamondmodel->getMaxPricePerCarat(); */

            if (isset($_POST ['searchdiamonds'])) {

		//echo("in here");

                $this->session->set_userdata('searchminprice', $minprice);
                $this->session->set_userdata('searchmaxprice', $maxprice);

                $array_items = array(
		    //'shape' => '',
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
                    'ispremium' => false);
                $this->session->unset_userdata($array_items);
            } else {
            
                //$this->session->set_userdata ( 'searchminprice', $minprice );
                //$this->session->set_userdata ( 'searchmaxprice', $maxprice );

                $array_items = array(
		    //'shape' => '',
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
                    'ispremium' => false);
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

            /* $minprice =  $this->Diamondmodel->getMinPrice();
              $maxprice =  $this->Diamondmodel->getMaxPrice(); */
            $data ['minprice'] = $minprice;
            $data ['maxprice'] = $maxprice;
            /* $data['totaldiamond'] = $this->Diamondmodel->getCountDiamond($minprice,$maxprice); */

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
            $url = config_item('base_url') . "diamonds/getsearchresult/" . $option. "/fancy_color/".$fcolor;
        } else {
            $url = config_item('base_url') . "diamonds/getsearchresult";
        }

        //echo $url;

        if ($details && $details == 'true') {
        
	    $data ['onloadextraheader'] = "";
            $data ['extraheader'] = '';
            $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/diamondsearch.css" rel="stylesheet" />';
            $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/papillon.css" rel="stylesheet" />';
            $data ['extraheader'] .= '<script language="javascript" type="text/javascript">var qipurl = "' . $url . '";</script>';
            $data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/jquery.cookies.2.2.0.min.js"></script>';
           $data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/fancy_papillon.js"></script>';
		   $data ['extraheader'] .= '<script language="javascript" type="text/javascript" src="' . config_item('base_url') . 'js/common_function.js"></script>';

            $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.ui.js" type="text/javascript"></script>';
            $data ['extraheader'] .= '<script src="' . config_item('base_url') . 'third_party/flexigrid/flexigrid.js"></script>';
            $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'third_party/flexigrid/css/flexigrid/fancy_flexigrid.css" rel="stylesheet" />';
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
		$fancyColorOverTone = $this->Jewelleriesmodel->getRappnetColumnValue('fancy_color_ot');
		$fancy_colorIntens = $this->Jewelleriesmodel->getRappnetColumnValue('fancy_color_intens');
		$fancy_color_list = $this->Jewelleriesmodel->getRappnetColumnValue('fcolor_value');
		
		$shapes_array = array('B'=>'round.jpg', 'C'=>'cushion.jpg', 'PR'=>'princess.jpg', 'AS'=>'asscher.jpg', 'E'=>'emerald.jpg', 'R'=>'radiant.jpg', 'O'=>'oval.jpg', 'P'=>'pear.jpg', 'M'=>'marquise.jpg', 'H'=>'heart.jpg');
		$shape_imglink = config_item('base_url').'img/page_img/';
		/// C=CU, E = EC, R=RA, O=OV, P=PS M=MQ
		//print_ar($fancycl_shapes);
		
		$fancy_colist = $this->getRapnetColAray($fancy_color_list, 'fcolor_value');
		
		$vfancy_shlist = '';
		$fcolor_shapeList = '';
		$fcolor_listinten = '';
		if( !empty($fcolor) ) {
			$fcolor_shapeList = $this->Jewelleriesmodel->getRappnetShapesValue('shape', array('fcolor_value',$fcolor), 'true');
			$fancycl_shapes = $this->getRapnetColAray($fcolor_shapeList, 'shape');   /// store all shapes value into single array
			
			foreach($shapes_array as $sh_key => $sh_image) {
			if( in_array($sh_key, $fancycl_shapes))	{
				
				$shape_keys = $this->getShapeValue($sh_key);
				$shape_image_view = ( !empty($fcolor) ? strtolower($fcolor).'_'.$sh_image : $sh_image );
				$shapes_image_view = SHAPES_PATH.$sh_image;
				$imageShapeName = explode( ' ',  trim( $this->getShape($sh_key) ) );
				
				$vfancy_shlist .= '<li>
									<span data-shapeid="'.$shape_keys.'" id="'.$shape_keys.'_icon" class="sprite_byo_shape_icon sprite-but_byo_shape_'.$shape_keys.'_OFF">
									<img src="'.$shapes_image_view.'" alt="" /><br>
									<span class="shview_title">'.$imageShapeName[0].'</span>
									<input type="hidden" value="http://icejeweler.seowebdirect.com/images/diamonds/'.$sh_image.'" id="'.$shape_keys.'">
									</span>
									</li>';
				}
			}
			$fcolor_listinten = $this->Jewelleriesmodel->getRappnetShapesValue('fancy_color_intens', array('fcolor_value',$fcolor));
			$fancy_color_intens = (isset($fcolor_listinten) && count($fcolor_listinten) > 0 ? $fcolor_listinten : $fancy_colorIntens );
			$data['check_triplex'] = $this->Jewelleriesmodel->checkTripleXCut($fcolor);
		} else {
			$fancy_color_intens = $fancy_colorIntens;
			$data['check_triplex'] = 'NA';
		}
		//// manage fancy colors
		$fancy_colors_ar = array('Brown'=>'brown_ic.jpg', 
						'Champagne'=>'champagne_ic.jpg',
						'Yellow'=>'yellow_ic.jpg',
						'Orange'=>'orange_ic.jpg',
						'Pink'=>'pink_ic.jpg',
						'Argyle'=>'argyle_ic.jpg',
						'Red'=>'red_ic.jpg',
						'Blue'=>'blue_ic.jpg',
						'Green'=>'green_ic.jpg',
						'Black'=>'black_ic.jpg',
						'Chameleon'=>'chamelon_ic.jpg',
						'Fancy White'=>'fancy_white.jpg'
							);
							
		$viewfancy_colrs = '';
		$colorimg_link = config_item('base_url').'img/page_img/';
		$fcolor_link = config_item('base_url').'diamonds/fancy_colors/true/';
		
		foreach($fancy_colors_ar as $color_name => $color_image) {
			
			if( in_array($color_name, $fancy_colist) ) {
				$viewfancy_colrs .= '<li>
					<a href="'.SITE_URL.'diamonds/fancy_colors/true/'.$color_name.'"><img src="'.$colorimg_link.$color_image.'" alt="" /><br />
					<span>'.$color_name.'</span>
					</a>
					</li>';
			}
		}
		
		$diamond_intensity = $this->session->userdata('diamond_intensity');
		$diamond_overtone  = $this->session->userdata('diamond_overtone');
		
		$listFancyColorOT = '<option value="">Select Overtone</option>';
		if(isset($fancyColorOverTone) && !empty($fancyColorOverTone)) {
			foreach($fancyColorOverTone as $row_ot) {
				$listFancyColorOT .= '<option value="'.$row_ot['fancy_color_ot'].'" '.selectedOption($row_ot['fancy_color_ot'],$diamond_overtone).'>'.$row_ot['fancy_color_ot'].'</option>';
			}
		} else {
			$listFancyColorOT .= '<option value="">No Overtone Found</option>';
		}		
		$listFancyColorIntens = '<option value="">Select Intensity</option>';
		if(isset($fancy_color_intens) && !empty($fancy_color_intens)) {
			foreach($fancy_color_intens as $row_intens) {
				if(!empty($row_intens['fancy_color_intens']))
				$listFancyColorIntens .= '<option value="'.$row_intens['fancy_color_intens'].'" '.selectedOption($row_intens['fancy_color_intens'],$diamond_intensity).'>'.$row_intens['fancy_color_intens'].'</option>';
			}
		}
		$data['listFancyColorOT'] = $listFancyColorOT;
		$data['viewfancy_colrs']  = $viewfancy_colrs;
		$data['listFancyColorIntens'] = $listFancyColorIntens;
		$data['vfancy_shlist'] = $vfancy_shlist;
		$data['signup_form'] = $this->sign_upform;
		
            $output = $this->load->view('diamond/fancy_colorview', $data, true);
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

            $output = $this->load->view('diamond/search', $data, true);
            $this->output($output, $data);
        }
	}

	///// redirect page after select intensity
	function selectIntensityOptions($intensity=false, $overtone=false, $colr_name=false) {
		$redirectLink = $this->session->userdata('diamond_pageurl');
		$inten_sity = urldecode( trim($intensity));
		$over_tone = urldecode( trim($overtone));
		$colrName = urldecode( trim($colr_name));
		$inten_sity = ( $inten_sity === 'false' ? '' : $inten_sity );
		$over_tone  = ( $over_tone === 'false' ? '' : $over_tone );
		$this->session->set_userdata('diamond_intensity', $inten_sity);	
		$this->session->set_userdata('diamond_overtone', $over_tone);
		if( !empty($colrName) ) {		
			$this->session->set_userdata('diamond_colrname', $colrName);
			$this->session->set_userdata('diamond_intensity', '');	
			$this->session->set_userdata('diamond_overtone', '');
		}
		$rdLink = explode('demo.jewelercart.com',$redirectLink);
		echo str_replace('/?', '', $rdLink[1]);
	}

	function getRapnetColAray($column_ar, $field) {
		$fancy_colist = array();
		if(isset($column_ar) && !empty($column_ar)) {
			foreach($column_ar as $row_clist) {
				$fancy_colist[] = $row_clist[$field];
			}
		}
		return $fancy_colist;
	}

	function getShapeValue($sh) {
		switch($sh) {
			case 'C' :
				$fcol_sh = 'CU';
			break;
			case 'B' :
				$fcol_sh = 'RD';
			break;
			case 'E' :
				$fcol_sh = 'EC';
			break;
			case 'R' :
				$fcol_sh = 'RA';
			break;
			case 'O' :
				$fcol_sh = 'OV';
			break;
			case 'P' :
				$fcol_sh = 'PS';
			break;
			case 'M' :
				$fcol_sh = 'MQ';
			break;
			default :
				$fcol_sh = $sh;
			break;
		}
		return $fcol_sh;
	}

    function getShape($row) {
        $shape = '';
        switch ($row) {
            case 'B' :
                $shape = 'Round';
                break;
            case 'PR' :
                $shape = 'Princess';
                break;
            case 'R' :
                $shape = 'Radiant';
                break;
            case 'E' :
                $shape = 'Emerald';
                break;
            case 'AS' :
                $shape = 'Ascher';
                break;
            case 'O' :
                $shape = 'Oval';
                break;
            case 'M' :
                $shape = 'Marquise';
                break;
            case 'P' :
                $shape = 'Pear shape';
                break;
            case 'H' :
                $shape = 'Heart';
                break;
            case 'C' :
                $shape = 'Cushion';
                break;
            default :
                $shape = $row;
                break;
        }
        return $shape;
    }

    function getsearchresult($addoption = '', $settingsid = '',$fcolr='') {
        $page = isset($_POST ['page']) ? $_POST ['page'] : 1;
        $rp = isset($_POST ['rp']) ? $_POST ['rp'] : 15;
        $sortname = isset($_POST ['sortname']) ? $_POST ['sortname'] : 'price';
        $sortorder = ( ( isset($_POST ['sortorder']) && !empty($_POST ['sortorder']) ) ? $_POST ['sortorder'] : 'asc' );
		$sort_order = ( $sortname == 'price' && $sortorder == 'asc' ? 'asc' : $sortorder );
        $query = isset($_POST ['query']) ? $_POST ['query'] : '';
        $qtype = isset($_POST ['qtype']) ? $_POST ['qtype'] : 'title';
		$page_name = ( $settingsid === 'fancy_color' ? '' : 'search' );
        $results = $this->Diamondmodel->getSearch($page, $rp, $sortname, $sort_order, $query, $qtype, '', $addoption, $page_name,$fcolr);
		$addoption_ar = array('addpendantsetings', 'tothreestone'); //print_ar($results);

		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
		header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
		header("Cache-Control: no-cache, must-revalidate" );
		header("Pragma: no-cache" );
		header("Content-type: text/x-json");
	
        $json = "";
        $json .= "{\n";
        $json .= "page: $page,\n";
        $json .= "sortname: \"carat\",\n";
        $json .= "total: " . $results ['count'] . ",\n";
        $json .= "rows: [";

		if($addoption != 'addpendantsetings_3stone') {
			//$this->session->unset_userdata('ctcart_value');
		}
		$options_arlist = array('toearring','tothree_stone','addpendantsetings_3stone');
		
        //if (strcmp($addoption, 'toearring') === 0 || strcmp($addoption, 'addpendantsetings3stone') === 0) {
		if(in_array($addoption, $options_arlist)) {
            $rc = false;
            $result = array_chunk($results ['result'], 2);
			//echo '<pre>';
		
            foreach ($results ['result'] as $row) {
                //print_r($row);
                $matchstone = $this->Diamondmodel->getEarRingSideStone($row);
                if ($matchstone) {
                    // $row = $pair[0];
                    $row2 = $matchstone;
					$cimage = trim($row ['certimage']);
                    $cimage2 = trim($row2 ['certimage']);
                    $shape = $this->getShape($row ['shape']);

                    $settingsid = ($settingsid != '') ? $settingsid : 'false';

					if ($rc)
						$json .= ",";
					$json .= "\n {";
					$json .= "lot:'" . $row ['lot'] . "',";
					$json .= "cell:['<input type=\'checkbox\' name=\'products[]\' onclick=\"listComparedDimaond(\'".$row ['lot']."\', \'\', \'".$addoption."\', \'".$settingsid."\')\" value=\'" . $row ['lot'] . "\'>'";
					
		    $json .= ",'" . $shape . "'";
                    //$json .= ",'" . addslashes(($row ['carat'] + $row2 ['carat'])) . "'";
		    $json .= ",'" . addslashes( _nf($row ['carat'], 2) ) . '<br>' . addslashes($row2 ['carat']) . "'";
                    $json .= ",'" . addslashes($row ['color']) . '<br>' . addslashes($row2 ['color']) . "'";
                    $json .= ",'" . addslashes($row ['clarity']) . '<br>' . addslashes($row2 ['clarity']) . "'";
                    $json .= ",'" . addslashes( _nf($row ['ratio'], 2) ) . '<br>' . addslashes( _nf($row2 ['ratio'], 2) ) . "'";
					$json .= ",'" . addslashes($row ['cut']) . '<br>' . addslashes($row2 ['cut']) . "'";
					if (isset($cimage2) && $cimage2 != '') {
                        $c2 = "<a class=\"blue\"  onclick=\"viewChart(\'" . $row2 ['lot'] . "\')\"  href=\"#\" >" . addslashes($row2 ['Cert']) . "</a>";
                    } else {
                        $c2 = addslashes($row2 ['Cert']);
                    }
					if (isset($cimage) && $cimage != '') {
                        $c = "<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes($row ['Cert']) . "</a>";
                    } else {
                        $c = addslashes($row ['Cert']);
                    }
                    $json .= ",'" . $c . '<br>' . $c2 . "'";
                    $json .= ",'" . addslashes($row ['Polish']) . '<br>' . addslashes($row2 ['Polish']) . "'";
                    $json .= ",'" . addslashes($row ['Sym']) . '<br>' . addslashes($row2 ['Sym']) . "'";
                    $json .= ",'" . addslashes($row ['Depth']) . '<br>' . addslashes($row2 ['Depth']) . "'";
                    $json .= ",'" . addslashes($row ['Culet']) . '<br>' . addslashes($row2 ['Culet']) . "'";
                    $json .= ",'" . addslashes($row ['Flour']) . '<br>' . addslashes($row2 ['Flour']) . "'";
                    $json .= ",'" . addslashes($row ['TablePercent']) . '<br>' . addslashes($row2 ['TablePercent']) . "'";
                    $json .= ",'$" . addslashes ( number_format ( round ( (round($row ['price'])+round($row2 ['price'])) ) ) ) . "'";   
                    
                    $json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamondslist\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\',\'". $row2 ['lot']."\')\">" . "Details" . "</a>'";	
                    $json .= ",'" . addslashes($row ['pricepercrt']) . '<br>' . addslashes($row2 ['pricepercrt']) . "'";
                    $json .= ",'']";
                    $json .= "}";
                    $rc = true;
                }
                //print_r($matchstone);
                //die('hi');
            }
            $json .= "]\n";
            $json .= "}";
            echo $json;
            
        } else {
            $rc = false;

            foreach ($results ['result'] as $row) {
                $shape = '';
                switch ($row ['shape']) {
                    case 'B' :
                        $shape = 'Round';
                        break;
                    case 'PR' :
                        $shape = 'Princess';
                        break;
                    case 'R' :
                        $shape = 'Radiant';
                        break;
                    case 'E' :
                        $shape = 'Emerald';
                        break;
                    case 'AS' :
                        $shape = 'Ascher';
                        break;
                    case 'O' :
                        $shape = 'Oval';
                        break;
                    case 'M' :
                        $shape = 'Marquise';
                        break;
                    case 'P' :
                        $shape = 'Pear shape';
                        break;
                    case 'H' :
                        $shape = 'Heart';
                        break;
                    case 'C' :
                        $shape = 'Cushion';
                        break;
                    default :
                        $shape = $row ['shape'];
                        break;
                }

                $settingsid = ($settingsid != '') ? $settingsid : 'false';

                if ($rc)
                    $json .= ",";
                    $json .= "\n {";
                    $json .= "lot:'" . $row ['lot'] . "',";
                    $json .= "cell:['<input type=\'checkbox\' onclick=\"listComparedDimaond(\'".$row ['lot']."\')\" name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(" . $row ['lot'] . ",\'" . $addoption . "\'," . $settingsid . ")\" ></a>'";
                    $json .= ",'" . $shape . "'";
                    $json .= ",'" . addslashes( _nf($row ['carat'], 2) ) . "'";
                    $json .= ",'" . addslashes($row ['color']) . "'";
                    $json .= ",'" . addslashes($row ['clarity']) . "'";
                    $json .= ",'" . addslashes( _nf($row ['ratio'], 2) ) . "'";
                    $json .= ",'" . addslashes($row ['cut']) . "'";
                    $json .= ",'" . addslashes($row ['Cert']) . "'";
                    $json .= ",'" . addslashes($row ['Polish']) . "'";
                    $json .= ",'" . addslashes($row ['Sym']) . "'";
                    $json .= ",'" . addslashes(str_replace("%", "", $row ['Depth'])) . "'";
                    //$json .= ",'" . addslashes($row ['fancy_color']) . "'";
                    $json .= ",'" . addslashes($row ['TablePercent']) . "'";
                    $json .= ",'" . addslashes($row ['Flour']) . "'";
                    $json .= ",'" . addslashes($row ['fancy_color_ot']) . "'";
                    $json .= ",'" . addslashes ( '$'.number_format($row ['price'],"0",".",",") ). "'";
                    if($settingsid && $settingsid === 'fancy_color') {
                            $json .= ",'" . addslashes($row ['fcolor_value']) . "'";
                            $json .= ",'" . addslashes($row ['fancy_color_intens']) . "'";
                            $json .= ",'" . addslashes($row ['fancy_color_ot']) . "'";
                    }

                    if( in_array($addoption, $addoption_ar) ) {
						$json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamondslist\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\', \'\')\">" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
						
					} else {
						
						$json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamondslist\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\', \'\')\">" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
					}
					$json .= ",'" . addslashes($row ['TablePercent']) . "'";
					$json .= ",'" . addslashes($row ['Flour']) . "'";
					$json .= ",'" . addslashes(number_format(round($row ['pricepercrt']))) . "'";
					$json .= ",'$" . addslashes(number_format(round($row ['pricepercrt'] * $row ['carat'] ))) . "'";
					$json .= ",'<a href=\"#\" onclick=\"viewDiamondDetails(" . $row ['lot'] . ",\'" . $addoption . "\'," . $settingsid . ")\" >" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
                                        
                if (isset($cimage) && $cimage != '') {
                    $json .= ",'<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes($row ['Cert']) . "</a>'";
                } 
                else {
                    $json .= ",'" . addslashes($row ['Cert']) . "'";
                }
                $json .= ",'" . addslashes($row ['Sym']) . "'";
                $json .= ",'" . addslashes($row ['pricepercrt']) . "'";
                $json .= ",'']";
                $json .= "}";
                $rc = true;
            }
            $json .= "]\n";
            $json .= "}";

            echo $json;
        }
    }

	/* list down the diamond for comparison */
	function listComparedDimaond($diamond_id='', $return='', $adoption='', $seting='') {
		$lots_id = urldecode( $diamond_id ); //$this->input->post('products', TRUE);
		if(isset($_POST['products']) && !empty($_POST['products'])) {
			$this->session->set_userdata('lots_id', $_POST['products']);	
		}
		$lotid_list = $this->session->userdata('lots_id');
		$compare_list = '';
		$options_list = array('toearring');
		$diamLot = array();
		if(isset($lotid_list) && !empty($lotid_list)) {
			foreach($lotid_list as $dmlot) {
				$dmlot = urldecode( trim($dmlot) );
				$diamLot[] = $dmlot;
				$row_dt = $this->Diamondmodel->getDetailsByLot($dmlot);
				$diamond_shape = view_shape_value($view_diamondimg, $row_dt['shape']);
				$diamondType = ( $row_dt['fcolor_value'] == '' ? 'White' : 'Color' );
				$wirePrice = _nf( wire_price($row_dt['price']) );
				if( empty($return) ) {
					if(in_array($adoption, $options_list)) {
						$viewDetaiLink = '<a href="#vdiamond_detail" onclick="viewPendantDiamondDetail(\'diamondslist\', \''.$row_dt['lot'].'\',\'toearring\',\'2\',\'Em 5.30 E Vs1\')">Details</a>';
					} else {
						if( empty($row_dt['fcolor_value']) ) {
							$viewDetaiLink = '<a href="#vdiamond_detail" onclick="viewPendantDiamondDetail(\'diamondslist\', \''.$row_dt['lot'].'\',\'\',\'false\', \'\')">Details</a>';
						} else {
							$viewDetaiLink = '<a href="#vdiamond_detail" onclick="viewPendantDiamondDetail(\'diamondslist\', \''.$row_dt['lot'].'\',\'addtoring\',\'fancy_color\', \'\')">Details</a>';
						}
					}
					$compareLink = '';
				} else {
					$adoption = ( $adoption != '' ? $adoption : 'false' );
					$setting_id = ( $seting != '' ? $seting : 'false' );
					if( $return == 'search') {
						$viewDetaiLink = '<a href="#vdiamond_detail" onclick="viewPendantDiamondDetail(\'diamondslist\', \''.$row_dt['lot'].'\',\'\',\'false\', \'\')">Details</a>';
						$compareLink = '';
					} else {
						$viewDetaiLink = '<a href="'.config_item('base_url').'diamonds/diamond_detail/'.$dmlot.'/'.$adoption.'/'.$setting_id.'">Details</a>';
						$compareLink = '<td width="10%" align="center"><a href="'.config_item('base_url').'diamondslist/search/true/'.$row_dt['shape'].'">Compare</a></td>';	
					}
				}
				$compare_list .= '<tr>';
					$compare_list .= '<td width="7%">'.$diamondType.'</td>
					<td width="10%">'.$diamond_shape.'</td>
					<td width="8%">'.$row_dt['carat'].'</td>
					<td width="8%" align="center">'.$row_dt['color'].'</td>
					<td width="9%" align="center">'.$row_dt['clarity'].'</td>
					<td width="7%" align="center">'.$row_dt['Cert'].'</td>
					<td width="10%" align="center">'.$row_dt['cut'].'</td>
					<td width="11%" align="center">$'. _nf($row_dt['price']) .'</td>
					<td width="11%" align="center">$'.$wirePrice.'</td>
					<td width="9%" align="center">'.$viewDetaiLink.'</td>';
				$compare_list .= $compareLink.'</tr>';
			}
			$this->Diamondmodel->save_diamond_comparison( $diamLot );
		}
		if($return == '' && $return != 'search') {
			echo $compare_list;
		} else {
			return $compare_list;
		}
	}

    function emptyCompareList() {
		$this->session->unset_userdata('lots_id');
    }

    function diamond_detail($lot, $add_option, $setting_id) {
        $lot				= urldecode($lot);
        $setting_id			= urldecode($setting_id);
        $data['lot'] 		= $lot;
        $data['addoption']  = $add_option;
        $data['settingsid'] = $setting_id;
        $row_detail = $this->Diamondmodel->getDetailsByLot($lot);
        $data['row_detail'] = $row_detail;
        $data['row_sdiamond'] = $this->Diamondmodel->getSimilarDiamonds($row_detail);
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'jewelleries/addtoshoppingcart/');
        $addoption_arlist = array('addpendantsetings3stone','tothreestone');
        $data['shipping_row'] = $this->Commonmodel->getCompanyInfoRow('shipping-policy');             
        $data['finance_row']  = $this->Commonmodel->getCompanyInfoRow('finance-policy');             

        if( in_array($add_option,$addoption_arlist)) {
                $this->session->set_userdata('ctcart_value', $row_detail['carat']);
                $this->session->set_userdata('center_dmid', $row_detail['lot']);
                $this->session->set_userdata('shape', $row_detail['shape']);
        }
        $image_path = config_item('base_url').'images/shapes_images/';
        $coloredm_imgpath = config_item('base_url').'img/diamond_shapes/';
        $data['diamond_shape'] = view_shape_value($view_diamondimg, $row_detail['shape']);

        $image_dmshape = strtolower($data['diamond_shape']);
        $image_cltype = getDiamondColr($row_detail['fcolor_value']);

        if($row_detail['fcolor_value'] != '' && $setting_id === 'fancy_color') {
                $data['diamond_type'] = 'Colored Diamond';
                $shape_image = $coloredm_imgpath.$image_cltype.'_'.$image_dmshape.'.jpg'; //echo $shape_image;exit;
                $data['view_shapeimage'] = ( getimagesize($shape_image) ? $shape_image : $coloredm_imgpath.'dm_noimage.jpg' );

        } else {
                $data['diamond_type'] = 'White Diamond';
                $data['view_shapeimage'] = $image_path.$view_diamondimg;
        }
        //// save setting id
        if(isset($setting_id) && !empty($setting_id)) {
                $this->session->set_userdata('setings_id', $setting_id);
        }		
        $data ['extraheader'] = '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';

        $arpendant_option = array('addpendantsetings3stone','tothreestone');

        if(in_array($add_option, $arpendant_option)) {
        $data ['pendanType'] = 'threestone';
        $data ['pendanStep'] = 2;
        $this->session->set_userdata('diamond_view', current_url());
        } else {
        $data ['pendanType'] = $this->session->userdata('pendant_option');
        $data ['pendanStep'] = 2;
        }		

        $data ['listComparedDimaond'] = $this->viewCompareListBySesion('return', $add_option, $setting_id);
        $this->session->set_userdata('diamnd_id', $lot);
        //// steps section data
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
        if( !empty($hearts_collection) ) {
            $data['view_link'] = SITE_URL . 'heartdiamond/collection_ring_detail/'.$data['setting_ring_id'];
        } else {
            $data['view_link'] = SITE_URL . 'site/engagementRingDetail/'.$ring_cate_id.'/'.$data['setting_ring_id'];
        }        
        if( $add_option == 'addtoring' ) {
            $this->session->set_userdata('build_ring', 'addtoring');
        }
        ///////
        $output = $this->load->view('diamondslist/viewdiamond_detail', $data, true);
        $this->output($output, $data);
    }

    function viewCompareListBySesion($return='', $add_option='', $setting_id='') {
		$listComparedDimaond = $this->listComparedDimaond('', $return, $add_option, $setting_id);
		$returnCompare = ( !empty($listComparedDimaond) ? $listComparedDimaond : '' );
		return $returnCompare;
    }

    function setEarringPair($result, $addoption = '', $settingsid = '', $json) {
        $rc = false;
        $json = "";
        foreach ($results ['result'] as $row) {
            $shape = '';
            switch ($row ['shape']) {
                case 'B' :
                    $shape = 'Round';
                    break;
                case 'PR' :
                    $shape = 'Princess';
                    break;
                case 'R' :
                    $shape = 'Radiant';
                    break;
                case 'E' :
                    $shape = 'Emerald';
                    break;
                case 'AS' :
                    $shape = 'Ascher';
                    break;
                case 'O' :
                    $shape = 'Oval';
                    break;
                case 'M' :
                    $shape = 'Marquise';
                    break;
                case 'P' :
                    $shape = 'Pear shape';
                    break;
                case 'H' :
                    $shape = 'Heart';
                    break;
                case 'C' :
                    $shape = 'Cushion';
                    break;
                default :
                    $shape = $row ['shape'];
                    break;
            }

            /* $url='';
              if($addoption!=''){
              $url= config_item('base_url')."diamonds/getsearchresult/".$option;
              }
              else {$url= config_item('base_url')."diamonds/getsearchresult";} */

            $settingsid = ($settingsid != '') ? $settingsid : 'false';

            if ($rc)
                $json .= ",";
            $json .= "\n {";
            $json .= "lot:'" . $row ['lot'] . "',";
            //$json .= "cell:['<input type=\'checkbox\' name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(" . $row ['lot'] . ",\'" . $addoption . "\'," . $settingsid . ")\" class=\"blue search\">View Details</a>'";
            $json .= "cell:['<input type=\'checkbox\' name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(" . $row ['lot'] . ",\'" . $addoption . "\'," . $settingsid . ")\" >View Details</a>'";
            $json .= ",'" . $shape . "'";
            $json .= ",'" . addslashes($row ['carat']) . "'";
            $json .= ",'" . addslashes($row ['color']) . "'";
            $json .= ",'" . addslashes($row ['clarity']) . "'";
            $json .= ",'$" . addslashes(number_format(round($row ['price']))) . "'";
            $json .= ",'" . addslashes($row ['ratio']) . "'";
            $json .= ",'" . addslashes($row ['cut']) . "'";
            $json .= ",'" . addslashes($row ['Depth']) . "'";
            $json .= ",'" . addslashes($row ['Polish']) . "'";
            $json .= ",'" . addslashes($row ['TablePercent']) . "'";
            $json .= ",'" . addslashes($row ['Flour']) . "'";
            $json .= ",'" . addslashes($row ['Culet']) . "'";
            $cimage = trim($row ['certimage']);
            //$cimage = substr(trim($row['certimage']),7,(strlen(trim($row['certimage']))-7));
            //'www.rapnet.com/UF/50217/Certs/1087.jpg' ;
            if (isset($cimage) && $cimage != '') {
                $json .= ",'<a class=\"blue\"  onclick=\"viewChart(\'" . $row ['lot'] . "\')\"  href=\"#\" >" . addslashes($row ['Cert']) . "</a>'";
            } //onclick=\"viewChart(\'".$row['certimage']."\')\"
            else {
                $json .= ",'" . addslashes($row ['Cert']) . "'";
            }
            $json .= ",'" . addslashes($row ['Sym']) . "'";
            $json .= ",'" . addslashes($row ['pricepercrt']) . "'";
            $json .= ",'']";
            $json .= "}";
            $rc = true;
        }
        $json .= "]\n";
        $json .= "}";
        return $json;
    }

	function premium() {
        $data = $this->getCommonData();

        $data ['usetips'] = true;
        $data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/interface.js" type="text/javascript"></script><script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
        $data ['onloadextraheader'] = "$('#fisheye').Fisheye({
			maxWidth: 50,
			items: 'a',
			itemsText: 'span',
			container: '.fisheyeContainter',
			itemWidth: 40,
			proximity: 90,
			halign : 'center'
		});
		var so;
		so = new SWFObject(\"" . config_item('base_url') . "swf/markt.swf\", \"test\", \"205\", \"150\", \"8\", \"#fff\");
		so.addParam(\"wmode\", \"transparent\");
		so.write(\"marktcollectionswf\");
		so = new SWFObject(\"" . config_item('base_url') . "swf/pave.swf\", \"test\", \"205\", \"150\", \"8\", \"#fff\");
		so.addParam(\"wmode\", \"transparent\");
		so.write(\"pavecollectionswf\");
		so = new SWFObject(\"" . config_item('base_url') . "swf/halo.swf\", \"test\", \"205\", \"150\", \"8\", \"#fff\");
		so.addParam(\"wmode\", \"transparent\");
		so.write(\"halocollectionswf\");
		so = new SWFObject(\"" . config_item('base_url') . "swf/matching.swf\", \"test\", \"205\", \"150\", \"8\", \"#fff\");
		so.addParam(\"wmode\", \"transparent\");
		so.write(\"matchingsetswf\");
		so = new SWFObject(\"" . config_item('base_url') . "flash/3-58-172.swf\", \"test\", \"240\", \"190\", \"8\", \"#fff\");";
		$data ['title'] = "Diamond Wedding Ring|Wedding Ring Sets|Loose Diamond Wholesale|Discount Loose Diamonds";
		$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
		<meta name="title" content="Diamond Wedding Ring|Wedding Ring Sets|Loose Diamond Wholesale|Discount Loose Diamonds">
		<meta name="ROBOTS" content="INDEX,FOLLOW">
		<meta name="description" content="Buy diamond wedding ring, wedding ring diamonds, inexpensive wedding rings, cheap wedding rings, discount wedding rings, wedding ring set, wedding ring sets, loose diamonds, loose diamond, cheap loose diamonds, loose diamond wholesale, discount loose diamonds, loose diamonds wholesale">
		<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery">
		<meta name="keywords" content="Buy diamond wedding ring, wedding ring diamonds, inexpensive wedding rings, cheap wedding rings, discount wedding rings, wedding ring set, wedding ring sets, loose diamonds, loose diamond, cheap loose diamonds, loose diamond wholesale, discount loose diamonds, loose diamonds wholesale">
		<meta name="author" content="Heartsanddiamonds">
		<meta name="publisher" content="Heartsanddiamonds">
		<meta name="copyright" content="Heartsanddiamonds">
		<meta http-equiv="Reply-to" content="">
		<meta name="creation_Date" content="12/12/2008">
		<meta name="expires" content="">
		<meta name="revisit-after" content="7 days">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';

		$output = $this->load->view('diamond/premiumdiamonds', $data, true);
		$this->output($output, $data);
	}

    function diamonddetails($lot, $addoption = '', $settingsid = '') {
        $data = $this->getCommonData();
        $data ['title'] = 'Diamonds Details';

        $details = $this->Diamondmodel->getDetailsByLot($lot);	//print_r($details);
        $data['details'] = $details;
        $this->session->set_userdata('addoption', $addoption);
        $this->session->set_userdata('mydiamond', $lot);

        $addoption = $this->session->userdata('addoption');
        $data['addoption'] = $addoption;
        $data['tabhtml'] = '';
        $data['pageheader'] = '';
        $data['onclickfunction'] = '';

        $date ['nexturl'] = '';
		$price = ($details['pricepercrt'] > 0) ? ($details['pricepercrt'] * $details['carat']) : 0; // added for add to cart issue 
        switch ($addoption) {
            case 'addloosediamond' :
                $data ['pageheader'] = 'Diamond Details';
                $data ['nexturl'] = '##';
                $data ['onclickfunction'] = 'addtocart(\'' . $addoption . '\',' . $lot . ',false,false,false,' . $price . ' )';
                $data ['linkhtml'] = '';
                break;
            case 'tothreestone' :
		$data ['pageheader'] = 'Diamond Details';
                $data ['nexturl'] = '##';
                $data ['onclickfunction'] = 'addtocart(\'' . $addoption . '\',' . $lot . ',false,false,false,' . $price . ' )';
                $data ['linkhtml'] = '';
                break;	
            case 'addtoring' :
                $data ['pageheader'] = 'Build Your Own Ring';
                $data ['nexturl'] = config_item('base_url') . 'engagement/engagement_ring_settings/' . $lot . '/addtoring';
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;
            case 'ddd' :
                $data ['pageheader'] = 'Build Your Own Three-Stone Ring';
                $data ['nexturl'] = config_item('base_url') . 'diamonds/searchsidestone/' . $lot . '/addsidestone';
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;
            case 'tosidestone' :
                $data ['pageheader'] = 'Build Your Own Three-Stone Ring';
                $data ['nexturl'] = config_item('base_url') . 'diamonds/sidestonedetails/' . $lot;
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;
            case 'addpendantsetings' :
                $data ['pageheader'] = 'Build Your Own Diamond Pendant';
                $data ['nexturl'] = '##';
                $data ['onclickfunction'] = 'addtocart(\'' . $addoption . '\',' . $lot . ',false,false,' . $settingsid . ',false)';
                $data ['linkhtml'] = '';
                break;
            case 'addpendantsetings3stone' :
                $data ['pageheader'] = 'Build Your Own Diamond Pendant';
                $data ['nexturl'] = config_item('base_url') . '/diamonds/searchsidestone/' . $lot . '/' . $addoption . '/' . $settingsid;
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;

            default :
                $data ['nexturl'] = '#';
                $data ['linkhtml'] = ' <div id="add_diamond_list" class="linkmanunext" style="display:none;">
				      	      				<ul class="textleft">
				      	      					<!--<li><a href="' . config_item('base_url') . 'engagement/engagement_ring_settings/' . $lot . '/addtoring"  class="redd">to ring</a> </li>
				      	      					<li><a href="' . config_item('base_url') . 'diamonds/searchsidestone/' . $lot . '/addsidestone" class="redd">to three stone ring</a> </li>
				      	      					<li><a href="#" onclick="viewearringdiamonddetails(' . $lot . ')" class="redd">to earring</a> </li>
				      	      					<li><a href="#" class="redd">to diamond pendant</a> </li>-->
				      	      					<li><a href="javascript:void(0)" class="redd" onclick="addtocart(\'addloosediamond\',' . $lot . ',false,false,false,false )">to shopping basket</a> </li>
				      	      				</ul>
				      	      		 </div>

									';
                $data ['pageheader'] = 'Details View';
                break;
        }

        if ($addoption = 'addtoring' || $addoption = 'tothreestone') {
            $output = $this->load->view('diamond/viewdiamond', $data, true);
        } else
            $output = $this->load->view('diamond/index', $data, true);

        $this->output($output, $data);
    }

    function diamonddetailsajax($lot, $addoption = '', $settingsid = '') {
        
        $data = $this->getCommonData();
        $data ['title'] = 'Diamonds Details';
        $data ['details'] = $this->Diamondmodel->getDetailsByLot($lot);

        $this->session->set_userdata('addoption', $addoption);
        $this->session->set_userdata('mydiamond', $lot);

        $addoption = $this->session->userdata('addoption');
        $data ['addoption'] = $addoption;
        $data ['settingsid'] = $settingsid;

        $date ['nexturl'] = '';
        $data ['onclickfunction'] = '';
        switch ($addoption) {
            case 'addtoring' :
                $data ['pageheader'] = 'Build Your Own Ring';
                $data ['nexturl'] = config_item('base_url') . 'engagement/engagement_ring_settings/' . $lot . '/addtoring';
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;
            case 'tothreestone' :
                $data ['pageheader'] = 'Build Your Own Three-Stone Ring';
                $data ['nexturl'] = config_item('base_url') . 'diamonds/tothrestone/' . $lot . '/' . $addoption . '/' . $settingsid;
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;
            case 'tosidestone' :
                $data ['pageheader'] = 'Build Your Own Three-Stone Ring';
                $data ['nexturl'] = config_item('base_url') . 'diamonds/sidestonedetails/' . $lot;
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;
            case 'addpendantsetings' :
                $data ['pageheader'] = 'Build Your Own Diamond Pendant';
                $data ['nexturl'] = config_item('base_url') . 'jewelry/pendantdetailsview/' . $addoption . '/' . $lot . '/' . $settingsid;
                $data ['linkhtml'] = '';
                break;
            case 'addpendantsetings3stone' :
                $data ['pageheader'] = 'Build Your Own Diamond Pendant';
                $data ['nexturl'] = config_item('base_url') . '/diamonds/searchsidestone/' . $lot . '/' . $addoption . '/' . $settingsid;
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;
            default :
                $data ['nexturl'] = '#';
                $data ['linkhtml'] = ' <div id="add_diamond_list" class="linkmanunext" style="display:none;">
					<ul class="textleft">
						<!-- <li><a href="' . config_item('base_url') . 'engagement/engagement_ring_settings/' . $lot . '/addtoring"  class="redd">to ring</a> </li>
						<li><a href="' . config_item('base_url') . 'diamonds/searchsidestone/' . $lot . '/addsidestone" class="redd">to three stone ring</a> </li>
						<li><a href="#" onclick="viewearringdiamonddetails(' . $lot . ')" class="redd">to earring</a> </li>
						<li><a href="#" class="redd">to diamond pendant</a> </li>-->
						<li><a href="' . config_item('base_url') . 'diamonds/diamonddetails/' . $lot . '/addloosediamond" class="redd">to shopping basket</a> </li>
					</ul>
				</div>';
				$data ['pageheader'] = 'Details View';
                break;
		}

        if ($addoption = 'addtoring' || $addoption = 'tothreestone') {
            $output = $this->load->view('diamond/diamonddetails', $data, true);
        } else
            header('location: ' . config_item('base_url') . 'diamonds/search');

        echo $output;
    }

    function searchsidestone($lot, $addoption = '', $pendantsettingsid = '') {
        $data = $this->getCommonData();
        $data ['title'] = 'Find Sidestone';

        $basket = $this->session->userdata('basket');
        $data ['tabhtml'] = $this->Commonmodel->getThreeStoneTab('sidestone');
        $data ['addoption'] = $addoption;
        $data ['pendantsettingsid'] = $pendantsettingsid;

        $carat = '';
        $color = '';
        $clarity = '';
        $condition = '';
		$data['onclickfunction'] = '';
        if (isset($lot)) {
            $data ['diamond'] = $this->Diamondmodel->getDetailsByLot($lot);
            $data ['sidestones'] = $this->Diamondmodel->getSidestoneByCenterLot ( $data ['diamond'] );
            $data ['onloadextraheader'] = "getsidestoneresult(0);";
            $data ['hlot'] = $lot;
            $option = $this->getsidestonecondition($data ['diamond']);
            $data['color'] = isset ($option['color'])?$option['color']:"";
            $data['carat'] = isset ($option['carat'])?$option['carat']:"";
            $data['clarity'] = isset ($option['clarity'])?$option['clarity']:"";
            $data['price'] = isset ($option['price'])?$option['price']:"";
			$data['onclickfunction'] = 'addtocart(\''.$addoption.'\',\''.$lot.'\',false,false,\''.$pendantsettingsid.'\',\''.$data ['diamond']['price'].'\')';
        }

        if ($addoption == 'addsidestone' || $addoption == 'addpendantsetings3stone') {
            $output = $this->load->view('diamond/searchsidestone', $data, true);
        } else
            $output = $this->load->view('diamond/searchsidestone', $data, true);

        $this->output($output, $data);
    }

	function tothrestone($lot, $addoption = '', $pendantsettingsid = '') {
        $data = $this->getCommonData();
        $data ['title'] = 'Find Sidestone';
        $basket = $this->session->userdata('basket');
        $data ['tabhtml'] = $this->Commonmodel->getThreeStoneTab('sidestone');
        $data ['addoption'] = $addoption;
        $data ['pendantsettingsid'] = $pendantsettingsid;

        $carat = '';
        $color = '';
        $clarity = '';
        $condition = '';
		$data['onclickfunction'] = '';
        if (isset($lot)) {
            $data ['diamond'] = $this->Diamondmodel->getDetailsByLot($lot);
            $data ['sidestones'] = $this->Diamondmodel->getSidestoneByCenterLot ( $data ['diamond'] );
            $data ['onloadextraheader'] = "getsidestoneresult(0);";
            $data ['hlot'] = $lot;
            $option = $this->getsidestonecondition($data ['diamond']);
            $data['color'] = isset ($option['color'])?$option['color']:"";
            $data['carat'] = isset ($option['carat'])?$option['carat']:"";
            $data['clarity'] = isset ($option['clarity'])?$option['clarity']:"";
            $data['price'] = isset ($option['price'])?$option['price']:"";
			$data['onclickfunction'] = 'addtocart(\''.$addoption.'\',\''.$lot.'\',false,false,\''.$pendantsettingsid.'\',\''.$data ['diamond']['price'].'\')';
        }

        if ($addoption == 'addsidestone' || $addoption == 'addpendantsetings3stone') {
            $output = $this->load->view('diamond/searchsidestone', $data, true);
        } else
            $output = $this->load->view('diamond/searchsidestone', $data, true);

        $this->output($output, $data);
    }

	function getmylot(){
		$sql = 'select lot from dev_index';
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			$count = 0;
			foreach ($query->result() as $row){
				$res = $this->searchbylot($row->lot); 
				if($res['count'] > 1) { 
					$count = $count + 1;
				}
			}
			echo $count;
		}
    }

    function searchbylot($lot) {
        $start = ($page == 'undefined') ? 0 : $page;
        $data ['diamond'] = $this->Diamondmodel->getDetailsByLot($lot);
        $data ['sidestones'] = $this->Diamondmodel->getAllSideStonesNew($data ['diamond'], $start);
        $alldamnstones = $data ['sidestones'];

        return $data ['sidestones'];
    }
    
	function getDetailsByLot($lot){
		$qry = "SELECT * FROM ".config_item('table_perfix')."index WHERE lot = '".$lot."'";
		$result = 	$this->db->query($qry);
		$return = $result->result_array();

		return isset($return[0]) ? $return[0] : false;
	}

	function getAllSideStonesNew($diamond = '',$start = 0){
		$results = array();
		$condition =  $this->sidestoneconditionNew($diamond);		
		$qry2 = "SELECT * FROM ".config_item('table_perfix')."index WHERE ".$condition;
		$result2 = 	$this->db->query($qry2);
		$resultTemp['result'] = 	$result2->result_array();
		$results['count'] = $result2->num_rows();
		if($results['count'] == 0) {
			$condition =  $this->sidestoneconditionNew($diamond, 1);		
			$qry2 = "SELECT * FROM ".config_item('table_perfix')."index WHERE ".$condition;
			$result2 = 	$this->db->query($qry2);
			$resultTemp['result'] = 	$result2->result_array();
			$results['count'] = $result2->num_rows();
		}
		if($results['count'] > 0 ) {
			for($i=0;$i<count($resultTemp['result']);$i++) {
				$k = $i;
				$k++;
				for($j=$k;$j<count($resultTemp['result']); $j++ ) {
					if($i >= $j) {
						continue;
					} else {
						$lengthDiff = $resultTemp['result'][$i]['length'] - $resultTemp['result'][$j]['length'];
						$widthDiff =  $resultTemp['result'][$i]['width'] - $resultTemp['result'][$j]['width'];
						$lengthDiff = ($lengthDiff < 0 ) ? -($lengthDiff) : $lengthDiff;
						$widthDiff = ($widthDiff < 0 ) ? -($widthDiff) : $widthDiff;
						if($widthDiff <= .10 && $lengthDiff  <= .10) {
							$newTempResults['result'][] = $resultTemp['result'][$i];
							$newTempResults['result'][] = $resultTemp['result'][$j];
						}
					}
				}
			}
		}
		$end = $start + 10;
		if(isset($newTempResults['result']) && !empty($newTempResults['result'])) {
			for($i=$start; $i<$end;$i++) {
				$results['result'][] = $newTempResults['result'][$i];
			}
		}
		$results['count'] = count($newTempResults['result']);
		return $resullts;
	}

	function sidestoneconditionNew($diamond, $incFlag = ''){
		if($diamond['carat']) {
			$range  = floatval($diamond['carat'] /4);
			$carat = 'carat >= 0.00 and carat <= '.$range;
		}
		if($incFlag !='') {
			$range  = floatval($diamond['carat'] * 0.40);
			$carat = 'carat >= 0.00 and carat <= '.$range;
		}
		$colorary = array(
			'D' => "color in ('D','E')",
			'E' => "color in ('D','E','F')",
			'F' => "color in ('E','F','G')",
			'G' => "color in ('F','G','H')",
			'H' => "color in ('G','H','I')",
			'I' => "color in ('H','I','J')",
			'J' => "color in ('I','J','K')",
			'K' => "color in ('J','K','L')",
			'L' => "color in ('K','L','M')",
			'M' => "color in ('L','M','N')",
			'N' => "color in ('M','N','O')",
			'O' => "color in ('N','O','P')",
			'P' => "color in ('O','P','Q')",
			'Q' => "color in ('P','Q','R')",
			'R' => "color in ('Q','R','S')",
			'S' => "color in ('R','S','T')",
			'T' => "color in ('S','T','U')",
			'U' => "color in ('T','U','V')",
			'V' => "color in ('U','V','W')",
			'W' => "color in ('V','W','X')",
			'X' => "color in ('W','X','Y')",
			'Y' => "color in ('X','Y','Z')",
			'Z' => "color in ('Y','Z')"
		);
		$color = $colorary[$diamond['color']];
		$clarityary = array(
			'IF' 	=> "clarity in ('IF','VVS1')",
			'VVS1' 	=> "clarity in ('IF','VVS1','VVS2')",
			'VVS2' 	=> "clarity in ('VVS1','VVS2','VS1')",
			'VS1' 	=> "clarity in ('VVS2','VS1','VS2')",
			'VS2' 	=> "clarity in ('VS1','VS2','SI1')",
			'SI1' 	=> "clarity in ('VS2','SI1','SI2')",
			'SI2' 	=> "clarity in ('SI1','SI2','SI3')",
			'SI3' 	=> "clarity in ('SI2','SI3','I1')",
			'I1' 	=> "clarity in ('SI3','I1','I2')",
			'I2' 	=> "clarity in ('I1','I2','I3')",
			'I3' 	=> "clarity in ('I2','I3')"
		);
		$clarity = $clarityary[$diamond['clarity']];
		if(isset($clarity) && empty($clarity)) $clarity = " 1=1"; 
		if($diamond['Cert'] != ''){
		  $certificate = " Cert = '".$diamond['Cert']."' ";
		}

		$lower_depth = (((100-3)/100) * $diamond['Depth']);		
		$upper_depth = (((100+3)/100) * $diamond['Depth']);	
		$depth = " Depth >= '".$lower_depth."' and Depth <='".$upper_depth."' ";
		$lower_table = (((100-3)/100) * $diamond['TablePercent']);		
		$upper_table = (((100+3)/100) * $diamond['TablePercent']);	
		$tablePercent =  " TablePercent >= '".$lower_table."' and TablePercent <='".$upper_table."' ";
		$length = $diamond['length'];
		$lower_length = $length - 0.10;	
		$upper_length = $length + 0.10;	
		$length_cond = " length >= '".$lower_length."' and length <='".$upper_length."' ";
		$width = $diamond['width'];
		$lower_width = $width - 0.10;	
		$upper_width = $width + 0.10;
		$width_cond = " width >= '".$lower_width."' and width <='".$upper_width."' ";
		$condition='';
		if($carat!='' && isset($carat)) {
		  $condition.=  $carat .' and ';
		}
		if($color!=''){
		  $condition.=$color.' and ';
		}
		if($certificate!=''){
		  $condition.=$certificate.' and ';
		}
		if($tablePercent!=''){
		  $condition.=$tablePercent.' and ';
		}
		if($depth!=''){
			$condition.=$depth.' and ';
		}
		$condition.=$clarity;
		return $condition;
	}

    function getsidestonecondition($diamond) {
        if ($diamond['carat'] >= 0.5 && $diamond['carat'] <= 0.69) {
            $carat = '0.25 ~ 0.30';
        } elseif ($diamond['carat'] >= 0.70 && $diamond['carat'] <= 0.99) {
            $carat = '0.31 ~ 0.40';
        } elseif ($diamond['carat'] >= 1 && $diamond['carat'] <= 1.50) {
            $carat = '0.41 ~ 0.55';
        } elseif ($diamond['carat'] >= 1.51 && $diamond['carat'] <= 2) {
            $carat = '0.56 ~ 0.75';
        } elseif ($diamond['carat'] >= 2 && $diamond['carat'] <= 3.50) {
            $carat = '0.75 ~ 0.90';
        }
        else
            $carat = '0.50 ~ 3.50';
        $colorary = array(
            'D' => "D, E",
            'E' => "D, E, F",
            'F' => "E, F , G",
            'G' => "F, G, H",
            'H' => "G, H, I",
            'I' => "H, I, J",
            'J' => "I, J"
        );
        $color = $colorary[$diamond['color']];
        $clarityary = array(
            'IF' => "IF, VVS1",
            'VVS1' => "IF, VVS1, VVS2",
            'VVS2' => "VVS1, VVS2, VS1",
            'VS1' => "VVS2, VS1, VS2",
            'VS2' => "VS2, VS2, VS1",
            'SI1' => "VS2, VS1, SI2",
            'SI2' => "SI1, SI2, I1",
            'I1' => "SI2, I1"
        );
        $clarity = $clarityary[$diamond['clarity']];
        $data['color'] = $color;
        $data['carat'] = $carat;
        $data['clarity'] = $clarity;
        $data['price'] = '$' . $this->session->userdata('searchminprice') . ' ~ $' . $this->session->userdata('searchmaxprice');
        return $data;
    }

	function getsidestoneresult($lot, $page = 0, $pendantsettingsid = '', $addoption = ''){
        $start = ($page == 'undefined') ? 0 : $page;
        $data ['diamond'] = $this->Diamondmodel->getDetailsByLot($lot);
        $data ['sidestones'] = $this->Diamondmodel->getAllSideStonesNew($data ['diamond'], $start);
        $alldamnstones = $data ['sidestones'];
        $allsidestones = $this->Diamondmodel->getAllSideStonesNew($data ['diamond'], $start);
        $returnhtml = '';
        
        $data ['result'] = $allsidestones;
        $paginlinks = $this->Sitepaging->getPageing(floor($allsidestones ['count'] / 2), 'sidestones', $start, 'lot', 10);
        $returnhtml .= $paginlinks . '<div class="hr"></div>';
        $sidestones = isset ($alldamnstones['result'])?$alldamnstones['result']:"";
        $diamond = $data ['diamond'];
        $returnhtml .= '<div>
			<table width="500px" style="text-align:center;">
				<tr class="tablaheader">
					<td width="50px">Weight</td>
					<td width="80px">Cut</td>
					<td>Color</td>
					<td>Clarity</td>
					<td>Polish/<br>Symmetry</td>
					<td>Report</td>
					<td width="90px">Price</td>
					<td width="60px">Details</td>
				</tr>';
				if (isset($sidestones) && is_array($sidestones)) {
					$sidestones = array_chunk($sidestones, 2);
					foreach ($sidestones as $sidestone) {
						if (isset($sidestone[0]) && isset($sidestone[1])) {
							$sidestone1 = $sidestone[0];
							$sidestone2 = $sidestone[1];
							$totalWeight = floatval($sidestone1['carat']) + floatval($sidestone2['carat']);
							$returnhtml .= '<tr>
								<td>' . $totalWeight . '</td>
								<td>' . $sidestone1['cut'] . '</td>
								<td>' . $sidestone1['color'] . '<br>' . $sidestone2['color'] . '</td>
								<td>' . $sidestone1['clarity'] . '<br>' . $sidestone2['clarity'] . '</td>
								<td>' . $sidestone1['Polish'] . '/' . $sidestone1['Sym'] . '<br>' . $sidestone2['Polish'] . '/' . $sidestone2['Sym'] . '</td>
								<td>' . $sidestone1['Cert'] . '<br>' . $sidestone2['Cert'] . '</td>
								<td>' . '$' . number_format(round((floatval($sidestone1['price']) + floatval($sidestone2['price'])))) . '</td>
								<td><a href="#" onclick="viewSidestoneDetails(' . $sidestone1['lot'] . ',' . $sidestone2['lot'] . ',\'' . $addoption . '\',' . $diamond ['lot'] . ',' . $pendantsettingsid . ')" class="underline">Select</a></td>
							</tr>';
						}
					}
				}else{
					$returnhtml .= '<tr>
						<td colspan="8">No side stone found</td>
					</tr>';
				}
			$returnhtml .= '</table>
		</div>';
        echo $returnhtml;
    }

    function sidestonedetailsajax($sidelot1 = '', $sidelot2 = '', $addoption = '', $centerlot = '', $pendantsettingsid = ''){
        $data = $this->getCommonData();
        $data ['title'] = 'Sidestone Details';
        $data ['centerlot'] = $centerlot;
        $data ['pendantsettingsid'] = $pendantsettingsid;
        $data ['addoption'] = $addoption;
        $centerdetails = $this->Diamondmodel->getDetailsByLot($centerlot);
        $data ['centerlotprice'] = $centerdetails ['price'];
        $diamond = $this->Diamondmodel->getDetailsByLot($sidelot1);
        $data['side1'] = $this->Diamondmodel->getDetailsByLot($sidelot1);
        $data['side2'] = $this->Diamondmodel->getDetailsByLot($sidelot2);
        $depth = $diamond ['Depth'];
        $table = $diamond ['TablePercent'];
        $data ['sidestone2'] = $diamond;
        $tablemin = $table - 1;
        $tablemax = $table + 1;
        $depthmin = $depth - 1.5;
        $depthmax = $depth + 1.5;
        $tablecon = " TablePercent >= '" . $tablemin . "' and TablePercent <= '" . $tablemax . "' ";
        $depthcon = " Depth >= '" . $depthmin . "' and Depth <= '" . $depthmax . "' ";
        $data ['pairdiamond'] = $this->Diamondmodel->getPairSidestone($diamond ['carat'], $diamond ['color'], $diamond ['clarity'], $tablecon, $depthcon);

        $output = $this->load->view('diamond/sidestonedetails', $data, true);
        echo $output;
    }

    function sidestonedetails($lot = '') {
        $data = $this->getCommonData();
        $data ['title'] = 'Sidestone Details';
        $output = $this->load->view('diamond/sidestonedetails', $data, true);
        $this->output($output, $data);
    }

    function addthisdiamond($addoption = '', $lot = '', $pendantsettingsid = '', $sidelot1 = '', $sidelot2 = '') {
        $data = $this->getCommonData();
        $data ['title'] = 'Add This Diamond';
        $basket = $this->session->userdata('basket');
        if ($tothreestonering && $tothreestonering != 'false') {
            $basket ['threestonering'] ['centerstone'] = $lot;
            $this->session->set_userdata('basket', $basket);
            $output = $this->load->view('diamond/searchsidestone/addsidestone', $data, true);
        }
        switch ($addoption) {
            case 'addtoring' :
                $basket ['ring'] ['diamond'] = $lot;
                $this->session->set_userdata('basket', $basket);
                header('location:' . config_item('base_url') . 'engagement/engagement_ring_settings/' . $lot);
                break;
            case 'addpendantsetings' :
                header('location:' . config_item('base_url') . 'shoppingbasket/mybasket/' . $lot . '/false/false/' . $pendantsettingsid . '/false/false/' . $addoption);
                break;
            case 'addpendantsetings3stone' :
                header('location:' . config_item('base_url') . 'shoppingbasket/mybasket/' . $lot . '/false/false/' . $pendantsettingsid . '/' . $sidelot1 . '/' . $sidelot2 . '/' . $addoption);
                break;
            default :
                $addoption = 'addloosediamond';
                header('location:' . config_item('base_url') . 'shoppingbasket/mybasket/' . $lot . '/false/false/false/false/false/' . $addoption);
                break;
        }
        $output = $this->load->view('diamond/index' , $data , true);
        $this->output($output, $data);
    }

	function addDiamondStudtoEbay($productID = '') {
		$data = $this->getCommonData();
        if ($productID != '') {
            $data['details'] = $this->Diamondmodel->getStudBySKU($productID);
        } else {
            $data['details'] = $this->Diamondmodel->getAllStuds();
            foreach ($data['details'] AS $index => $value) {
                $status = $this->Diamondmodel->addStudtoEbay($value);
                echo $status;
            }
        }
    }

	function newsletter(){
		$email = $_REQUEST['email'];
		$status = $this->Diamondmodel->addnewsletter($email);

		$data['title'] = 'Subscribe';
		if($status == '1'){
			$data['message'] = "Thanks for Subscribing!";
		}else{
			$data['message'] = "You are already subscribed user!";	
		}
        $output = $this->load->view('diamond/thanks' , $data , true);
        $this->output ( $output, $data,true );
	}
}