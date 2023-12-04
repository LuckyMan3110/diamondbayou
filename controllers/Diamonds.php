<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Diamonds extends CI_Controller {
	public $sign_upform = '';

	function __construct() {
		parent::__construct();
		$this->sign_upform = signup_form();
		$this->load->helper('diamond_section');
		$this->load->model('Commonmodel');
		$this->load->model('Diamondmodel');
		$this->load->model('Catemodel');
		$this->load->model('Jewelleriesmodel');
		$this->load->model('Sitepaging');
		$this->load->model('Adminmodel');
	    $this->load->library('pagination');
		$this->session->unset_userdata('whsale_section');
	}



    	function index() {
        $data['top_bar_option']             = 1;
        $data['bottom_bar_option']          = 1;
        $data['image_background_option']    = 1;
		$data['page'] = 'home';
		$this->load->model('Coverpagemodel');
		$data['get_overnight_categories']=$this->Coverpagemodel->get_overnight_categories();
		$data['content'] = $this->Coverpagemodel->make_content_page_return('home');
		
		
		$data ['loginlink'] = $this->User->loginhtml();
	
        // $output = $this->load->view($this->config->item('template') . 'header_demo', $data, true);
        $output	.= $this->load->view('cover_pages/copy', $data, true);
        // $output .= $this->load->view($this->config->item('template') . 'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }  
	function index112() {
        $data['top_bar_option']             = 1;
        $data['bottom_bar_option']          = 1;
        $data['image_background_option']    = 1;
		$data['page'] = 'home';
		$this->load->model('Coverpagemodel');
		$data['content'] = $this->Coverpagemodel->make_content_page_return('home');
		
		
		$data ['loginlink'] = $this->User->loginhtml();
	
        $output = $this->load->view($this->config->item('template') . 'header_demo', $data, true);
        $output	.= $this->load->view('cover_pages/home_cover', $data, true);
        $output .= $this->load->view($this->config->item('template') . 'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }
	function test() {
        $data['top_bar_option']             = 1;
        $data['bottom_bar_option']          = 1;
        $data['image_background_option']    = 1;
		$data['page'] = 'home';
		$this->load->model('Coverpagemodel');
		$data['content'] = $this->Coverpagemodel->make_content_page_return('home');
		
		
		$data ['loginlink'] = $this->User->loginhtml();
	
        // $output = $this->load->view($this->config->item('template') . 'header_demo', $data, true);
        $output	.= $this->load->view('cover_pages/test', $data, true);
        // $output .= $this->load->view($this->config->item('template') . 'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }
    
    	function copy() {
        $data['top_bar_option']             = 1;
        $data['bottom_bar_option']          = 1;
        $data['image_background_option']    = 1;
		$data['page'] = 'home';
		$this->load->model('Coverpagemodel');
		$data['content'] = $this->Coverpagemodel->make_content_page_return('home');
		
		
		$data ['loginlink'] = $this->User->loginhtml();
	
        // $output = $this->load->view($this->config->item('template') . 'header_demo', $data, true);
        $output	.= $this->load->view('cover_pages/copy', $data, true);
        // $output .= $this->load->view($this->config->item('template') . 'footer_demo', $data, true);
        $this->output->set_output($output);
		$this->output->cache(n);
    }
    
    
	function new_home_page() {
		$data = $this->getCommonData();
        reset_diamond_filters();

        $data['title'] = "Diamond Engagement & Wedding Rings";
        $output = $this->load->view('diamond/heart_home_page', $data, true);
        $this->output($output, $data, true);
		$this->output->cache(60);
	}

	function diamonds_search($page_name='',$page2='') {
		if($page_name == ''){
			$data['diamond_page_name'] = 'clarity-enhanced-diamonds';
        }else{
			$data['diamond_page_name'] = $page_name;
        }
        $data['title'] = "Diamond Engagement & Wedding Rings";
		if($page_name == 'asscher-ldcut' || $page_name == 'cushion-ldcut' || $page_name == 'emerald-ldcut' || $page_name == 'heart-ldshaped' || $page_name == 'marquise-ldcut' || $page_name == 'oval-ldcut' || $page_name == 'pear-ldshaped' || $page_name == 'radiant-ldcut' || $page_name == 'round-ldcut' || $page_name == 'princess-ldcut'){
			$output = $this->load->view('diamond/lab_diamonds_search', $data, true);
		}else{
			
			$output = $this->load->view('diamond/diamonds_search', $data, true);
		}
        $this->output($output, $data, true);
		$this->output->cache(120);
    }

    function diamonds_search_realtime($page_name=''){
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start']; 
		}else{
			$limit  = 21;
			$offset = 0;
		}

        $where_diamonds =  array('price >=' => 1);

		//------------------------------Shape-----------------------------------
		$sqlClr = "SELECT shape FROM dev_index WHERE fcolor_value = '' AND shape != '' GROUP BY shape ORDER BY shape";
		$queryClr = $this->db->query($sqlClr);
		$resultClr = $queryClr->result_array();
		foreach($resultClr as $colr){
			$shp = str_replace(' ', '_', $colr['shape']);
			if(isset($_POST['shape_'.$shp]) AND !empty($_POST['shape_'.$shp])){
				$where_shape	= array('shape LIKE' => str_replace('_', ' ', $_POST['shape_'.$shp]));
				$where_diamonds	= array_merge($where_diamonds, $where_shape);
			}
		}

        //------------------------------Clarity-----------------------------------
        if( isset($_POST['clarity_I1']) AND !empty($_POST['clarity_I1']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_I1']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_IF']) AND !empty($_POST['clarity_IF']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_IF']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI1']) AND !empty($_POST['clarity_SI1']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_SI1']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI2']) AND !empty($_POST['clarity_SI2']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_SI2']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI3']) AND !empty($_POST['clarity_SI3']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_SI3']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VS1']) AND !empty($_POST['clarity_VS1']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_VS1']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VS2']) AND !empty($_POST['clarity_VS2']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_VS2']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VVS1']) AND !empty($_POST['clarity_VVS1']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_VVS1']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VVS2']) AND !empty($_POST['clarity_VVS2']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_VVS2']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_FL']) AND !empty($_POST['clarity_FL']) ){
            $where_clarity		    = array( 'clarity LIKE' => $this->get_clarity_name($_POST['clarity_FL']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }

        //------------------------------Color-----------------------------------
        if( isset($_POST['color_D']) AND !empty($_POST['color_D']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_D']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_E']) AND !empty($_POST['color_E']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_E']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_F']) AND !empty($_POST['color_F']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_F']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_G']) AND !empty($_POST['color_G']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_G']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_H']) AND !empty($_POST['color_H']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_H']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_I']) AND !empty($_POST['color_I']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_I']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_J']) AND !empty($_POST['color_J']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_J']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_K']) AND !empty($_POST['color_K']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_K']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_L']) AND !empty($_POST['color_L']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_L']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_M']) AND !empty($_POST['color_M']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_M']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_N']) AND !empty($_POST['color_N']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_N']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Z']) AND !empty($_POST['color_Z']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_Z']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Fancy_Color']) AND !empty($_POST['color_Fancy_Color']) ){
            $where_color		    = array( 'color LIKE' => $this->get_color_name($_POST['color_Fancy_Color']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		//------------------------------Cut-----------------------------------
        if( isset($_POST['cut_Excellent']) AND !empty($_POST['cut_Excellent']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Excellent'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Very_Good']) AND !empty($_POST['cut_Very_Good']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Very_Good'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Good']) AND !empty($_POST['cut_Good']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Good'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
		if( isset($_POST['cut_Ideal']) AND !empty($_POST['cut_Ideal']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Ideal'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Fair']) AND !empty($_POST['cut_Fair']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Fair'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Poor']) AND !empty($_POST['cut_Poor']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Poor'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		if( isset($_POST['diamond_type_V']) AND !empty($_POST['diamond_type_V']) ){
            $where_type		    = array( 'vdbapp_id =' => '99999' );
            $where_diamonds			= array_merge($where_diamonds, $where_type);
        }
        if( isset($_POST['diamond_type_S']) AND !empty($_POST['diamond_type_S']) ){
            $where_type		    = array( 'vdbapp_id !=' => '99999' );
            $where_diamonds			= array_merge($where_diamonds, $where_type);
        }

        //------------------------------Carat-----------------------------------
        if( isset($_POST['carat_min']) AND !empty($_POST['carat_min']) ){
            $where_color		    =  array( 'ABS(carat) >=' => $_POST['carat_min'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['carat_max']) AND !empty($_POST['carat_max']) ){
            $where_color		    =  array( 'ABS(carat) <=' => $_POST['carat_max'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }
		$claritys = array('I1','SI3','SI2','SI1','VS2','VS1','VVS2','VVS1','FL','IF');
		$clarity = '';  
		$claritymin = 0;
		$claritymax = count($claritys);
		if(isset($_POST['clarity_min']) AND !empty($_POST['clarity_min'])){
			$claritymin = $_POST['clarity_min'];
        }
		if(isset($_POST['clarity_max']) AND !empty($_POST['clarity_max'])){
			$claritymax = $_POST['clarity_max'];
        }
		if($claritymin <= $claritymax) {
			$cont = '';
			for($i= $claritymin; $i<=$claritymax; $i++){
				if($i > 0){
					if($i == 100){ $cont = 11; }else{ $cont = str_replace("0","",$i)-1; }
					if(isset($claritys[$cont]) && $claritys[$cont] != '')$clarity .= "'".$claritys[$cont]."',";
				}
				$cont--;
			}
		}

		//------------------------------Color-----------------------------------
        if( isset($_POST['color_min']) AND !empty($_POST['color_min']) ){
            $where_color		    = array( 'color <=' => $this->get_color_name($_POST['color_min']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		if( isset($_POST['color_max']) AND !empty($_POST['color_max']) ){
            $where_color		    = array( 'color >=' => $this->get_color_name($_POST['color_max']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('Stock_n LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price';
			$sortby = 'ASC';
		}else{
			$sort = 'cut';
			$sortby = 'DESC';
		}

        $get_toal_data	=  $this->Diamondmodel->count_white_diamonds_table($where_diamonds, $clarity, 'dev_index');
		$get_diamond_list	=  $this->Diamondmodel->getdata_white_diamonds('dev_index', $where_diamonds, $clarity, $limit, $offset, $sort, $sortby);
		$nameArr = array();
        foreach($get_diamond_list as $diamonds){
			if($diamonds['image_url'] != ''){
				$view_shapeimage = $diamonds['image_url'];
				$diamond_shape      = $diamonds['shape'];
			}else{
				if($diamonds['shape'] == 'Round'){
					$view_shapeimage = "". SITE_URL ."resize.php/actual-dime.jpg?width=240&height=183&image=/images/shapes_images/actual-dime.jpg";
					$diamond_shape      = 'Round';
				}else if($diamonds['shape'] == 'Princess'){
					$view_shapeimage = "". SITE_URL ."resize.php/princesss.jpg?width=240&height=183&image=/images/shapes_images/princesss.jpg";
					$diamond_shape      = 'Princess';
				}else if($diamonds['shape'] == 'Cushion'){
					$view_shapeimage = "". SITE_URL ."resize.php/cushion_cut_diamond.jpg?width=240&height=183&image=/images/shapes_images/cushion_cut_diamond.jpg";
					$diamond_shape      = 'Cushion';
				}else if($diamonds['shape'] == 'Radiant'){
					$view_shapeimage = "". SITE_URL ."resize.php/radiant.jpg?width=240&height=183&image=/images/shapes_images/radiant.jpg";
					$diamond_shape      = 'Radiant';
				}else if($diamonds['shape'] == 'Emerald'){
					$view_shapeimage = "". SITE_URL ."resize.php/emeraled.jpg?width=240&height=183&image=/images/shapes_images/emeraled.jpg";
					$diamond_shape      = 'Emerald';
				}else if($diamonds['shape'] == 'Pear'){
					$view_shapeimage = "". SITE_URL ."resize.php/pear.jpg?width=240&height=183&image=/images/shapes_images/pear.jpg";
					$diamond_shape      = 'Pear';
				}else if($diamonds['shape'] == 'Oval'){
					$view_shapeimage = "". SITE_URL ."resize.php/oval.jpg?width=240&height=183&image=/images/shapes_images/oval.jpg";
					$diamond_shape      = 'Oval';
				}else if($diamonds['shape'] == 'Asscher'){
					$view_shapeimage = "". SITE_URL ."resize.php/asscher.jpg?width=240&height=183&image=/images/shapes_images/asscher.jpg";
					$diamond_shape      = 'Asscher';
				}else if($diamonds['shape'] == 'Marquise'){
					$view_shapeimage = "". SITE_URL ."resize.php/marquise.jpg?width=240&height=183&image=/images/shapes_images/marquise.jpg";
					$diamond_shape      = 'Marquise';
				}else if($diamonds['shape'] == 'Heart'){
					$view_shapeimage = "". SITE_URL ."resize.php/heart.jpg?width=240&height=183&image=/images/shapes_images/heart.jpg";
					$diamond_shape      = 'Heart';
				}else{
					$view_shapeimage = "". SITE_URL ."resize.php/dm_noimage.jpg?width=240&height=183&image=/img/diamond_shapes/dm_noimage.jpg";
					$diamond_shape      = '';
				}
			}
			$crts = !empty($diamonds['carat'])?$diamonds['carat']:'0.00';

            $make_html	= '<div class="diamond_result_content">
				<div class="col-sm-12 hover-jewelery-img-area" id="hover'.$diamonds['uid'].'">
					<a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false">
						<img src="'.$view_shapeimage.'" alt="'.$diamonds['lot'].' Diamond" class="detl-img1" />
						<img src="'.$view_shapeimage.'" alt="'.$diamonds['lot'].' Diamond" class="detl-img2" />
					</a>
				</div>
				<script>
				$(document).ready(function() {
					$("#hover'.$diamonds['uid'].'").on("mouseenter", function() {
						$("#hover'.$diamonds['uid'].' img.detl-img2").css("display", "inline-block");
						$("#hover'.$diamonds['uid'].' img.detl-img1").css("display", "none");
					}).on("mouseleave", function() {
						$("#hover'.$diamonds['uid'].' img.detl-img1").css("display", "inherit");
						$("#hover'.$diamonds['uid'].' img.detl-img2").css("display", "none");
					});
				});
				</script>
				<div class="col-sm-12" style="padding:0px 10px;text-align:center;">
					<div style="line-height: 16px;"><a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" style="color: #0a2b49;"><b>'. $crts .'-Carat '.$diamonds['shape'].' Diamond</b></a></div>
					<div style="line-height: 16px;">';
						if($diamonds['cut'] != ''){
							$nameArr[] = $diamonds['cut'];
						}
						if($diamonds['clarity'] != ''){
							$nameArr[] = $diamonds['clarity'];
						}
						if($diamonds['color'] != ''){
							$nameArr[] = $diamonds['color'];
						}
						if(!empty($nameArr)){
							$make_html	.= implode(", ",$nameArr);
						}
					$make_html	.= '</div>
					<div style="line-height: 16px;"><b>SKU:</b> <a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" style="color: #0a2b49;"> '.$diamonds['lot'].'</a></div>
					<div class="add_tocart_btn">
						<span class="main_item_price">$'._nf($diamonds['price']).'</span>
						<span><a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" class="addToCartBtn">View Details</a></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>';
			$make_array  = array(
				'0'	=> $make_html
			); 
			$data[] = $make_array;
			$nameArr = array();
        }

		$json_data = array(
			"draw"            => isset($params['draw'])?intval($params['draw']):'',
			"recordsTotal"    => intval($get_toal_data),
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data
		);
	    echo json_encode($json_data);
    }

	function lab_diamonds_search_realtime($page_name=''){
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start']; 
		}else{
			$limit  = 21;
			$offset = 0;
		}

        $where_diamonds =  array('is_lab_diamond =' => '1','price >=' => 1);

		//------------------------------Shape-----------------------------------
		$sqlClr = "SELECT shape FROM dev_index WHERE is_lab_diamond = '1' AND fcolor_value = '' AND shape != '' GROUP BY shape ORDER BY shape";
		$queryClr = $this->db->query($sqlClr);
		$resultClr = $queryClr->result_array();
		foreach($resultClr as $colr){
			$shp = str_replace(' ', '_', $colr['shape']);
			if(isset($_POST['shape_'.$shp]) AND !empty($_POST['shape_'.$shp])){
				$where_shape	= array('shape LIKE' => str_replace('_', ' ', $_POST['shape_'.$shp]));
				$where_diamonds	= array_merge($where_diamonds, $where_shape);
			}
		}

        //------------------------------Clarity-----------------------------------
        if( isset($_POST['clarity_I1']) AND !empty($_POST['clarity_I1']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_I1']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_IF']) AND !empty($_POST['clarity_IF']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_IF']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI1']) AND !empty($_POST['clarity_SI1']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_SI1']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI2']) AND !empty($_POST['clarity_SI2']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_SI2']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI3']) AND !empty($_POST['clarity_SI3']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_SI3']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VS1']) AND !empty($_POST['clarity_VS1']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_VS1']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VS2']) AND !empty($_POST['clarity_VS2']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_VS2']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VVS1']) AND !empty($_POST['clarity_VVS1']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_VVS1']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VVS2']) AND !empty($_POST['clarity_VVS2']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_VVS2']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_FL']) AND !empty($_POST['clarity_FL']) ){
            $where_clarity		    = array( 'clarity LIKE' => $_POST['clarity_FL']);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }

		//------------------------------Color-----------------------------------
        if( isset($_POST['color_D']) AND !empty($_POST['color_D']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_D']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_E']) AND !empty($_POST['color_E']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_E']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_F']) AND !empty($_POST['color_F']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_F']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_G']) AND !empty($_POST['color_G']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_G']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_H']) AND !empty($_POST['color_H']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_H']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_I']) AND !empty($_POST['color_I']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_I']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_J']) AND !empty($_POST['color_J']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_J']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_K']) AND !empty($_POST['color_K']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_K']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_L']) AND !empty($_POST['color_L']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_L']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_M']) AND !empty($_POST['color_M']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_M']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_N']) AND !empty($_POST['color_N']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_N']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Z']) AND !empty($_POST['color_Z']) ){
            $where_color		    = array( 'color LIKE' => $_POST['color_Z']);
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		//------------------------------Cut-----------------------------------
        if( isset($_POST['cut_Excellent']) AND !empty($_POST['cut_Excellent']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Excellent'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Very_Good']) AND !empty($_POST['cut_Very_Good']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Very_Good'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Good']) AND !empty($_POST['cut_Good']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Good'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
		if( isset($_POST['cut_Ideal']) AND !empty($_POST['cut_Ideal']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Ideal'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Fair']) AND !empty($_POST['cut_Fair']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Fair'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Poor']) AND !empty($_POST['cut_Poor']) ){
            $where_color		    = array( 'cut LIKE' => $_POST['cut_Poor'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        //------------------------------Carat-----------------------------------
        if( isset($_POST['carat_min']) AND !empty($_POST['carat_min']) ){
            $where_color		    =  array( 'ABS(carat) >=' => $_POST['carat_min'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['carat_max']) AND !empty($_POST['carat_max']) ){
            $where_color		    =  array( 'ABS(carat) <=' => $_POST['carat_max'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

        //------------------------------Clarity-----------------------------------
		$claritys = array('I1','SI3','SI2','SI1','VS2','VS1','VVS2','VVS1','FL','IF');
		$clarity = '';  
		$claritymin = 0;
		$claritymax = count($claritys);
		if(isset($_POST['clarity_min']) AND !empty($_POST['clarity_min'])){
			$claritymin = $_POST['clarity_min'];
        }
		if(isset($_POST['clarity_max']) AND !empty($_POST['clarity_max'])){
			$claritymax = $_POST['clarity_max'];
        }
		if($claritymin <= $claritymax) {
			$cont = '';
			for($i= $claritymin; $i<=$claritymax; $i++){
				if($i > 0){
					if($i == 100){ $cont = 11; }else{ $cont = str_replace("0","",$i)-1; }
					if(isset($claritys[$cont]) && $claritys[$cont] != '')$clarity .= "'".$claritys[$cont]."',";
				}
				$cont--;
			}
		}

		//------------------------------Color-----------------------------------
        if( isset($_POST['color_min']) AND !empty($_POST['color_min']) ){
            $where_color		    = array( 'color <=' => $this->get_color_name($_POST['color_min']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		if( isset($_POST['color_max']) AND !empty($_POST['color_max']) ){
            $where_color		    = array( 'color >=' => $this->get_color_name($_POST['color_max']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('Stock_n LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

        $get_toal_data	=  $this->Diamondmodel->count_white_diamonds_table($where_diamonds, $clarity, 'dev_index');
		$get_diamond_list	=  $this->Diamondmodel->getdata_white_diamonds('dev_index', $where_diamonds, $clarity, $limit, $offset, $sort, $sortby);
		$nameArr = array();
        foreach($get_diamond_list as $diamonds){
			if($diamonds['image_url'] != ''){
				$view_shapeimage	= $diamonds['image_url'];
				$diamond_shape      = $diamonds['shape'];
			}else{
				$view_shapeimage = "". SITE_URL ."resize.php/dm_noimage.jpg?width=180&height=180&image=/img/diamond_shapes/dm_noimage.jpg";
				//$view_shapeimage    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
				$diamond_shape      = '';
			}

			$crts = !empty($diamonds['carat'])?$diamonds['carat']:'0.00';
            $make_html	= '<div class="diamond_result_content">
				<div class="col-sm-12 hover-jewelery-img-area">
					<a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false">
						<img src="'.$view_shapeimage.'" alt="Lab Diamonds" style="width:176px;height: 182px;" />
						<img src="'.$view_shapeimage.'" alt="Lab Diamonds" class="detl-img2" />
					</a>
				</div>
				<div class="col-sm-12" style="padding:0px 10px;text-align:center;">
					<div style="line-height: 16px;"><b><a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" style="color: #0a2b49;">'. $crts .'-Carat '.$diamonds['shape'].' Diamond</a></b></div>
					<div style="line-height: 16px;">';
						if($diamonds['cut'] != ''){
							$nameArr[] = $diamonds['cut'];
						}
						if($diamonds['clarity'] != ''){
							$nameArr[] = $diamonds['clarity'];
						}
						if($diamonds['color'] != ''){
							$nameArr[] = $diamonds['color'];
						}
						if(!empty($nameArr)){
							$make_html	.= implode(", ",$nameArr);
						}
					$make_html	.= '</div>
					<div style="line-height: 16px;"><b>SKU:</b> <a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" style="color: #0a2b49;">'.$diamonds['lot'].'</a></div>
					<div class="add_tocart_btn">
						<span class="main_item_price">$'._nf($diamonds['price']).'</span>
						<span><a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" class="addToCartBtn">View Details</a></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>';
			$make_array  = array(
				'0'	=> $make_html
			); 
			$data[] = $make_array;
			$nameArr = array();
        }

		$json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data
		);
	    echo json_encode($json_data);
    }

	function color_diamonds_search($page_name='') {
        if($page_name == ''){
            $data['diamond_page_name']          = 'color-diamonds-search';
        }else{
            $data['diamond_page_name']          = $page_name;
        }

        $data['title'] = "Color Diamond Engagement & Wedding Rings";
        $output = $this->load->view('diamond/color_diamonds_search', $data, true);
        $this->output($output, $data, true);
		$this->output->cache(120);
    }

	function color_diamonds_search_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 21;
			$offset = 0;
		}
        $where_diamonds	=  array('fcolor_value !=' => '','price >=' => 1);
		//------------------------------Shape-----------------------------------
		$sqlClr = "SELECT shape FROM dev_index WHERE shape != '' GROUP BY shape ORDER BY shape";
		$queryClr = $this->db->query($sqlClr);
		$resultClr = $queryClr->result_array();
		foreach($resultClr as $colr){
			$shp = str_replace(' ', '_', $colr['shape']);
			if(isset($_POST['shape_'.$shp]) AND !empty($_POST['shape_'.$shp])){
				$where_shape	= array('shape' => str_replace('_', ' ', $_POST['shape_'.$shp]));
				$where_diamonds	= array_merge($where_diamonds, $where_shape);
			}
		}

        //------------------------------Clarity-----------------------------------
        if( isset($_POST['clarity_I1']) AND !empty($_POST['clarity_I1']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_I1']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_IF']) AND !empty($_POST['clarity_IF']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_IF']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI1']) AND !empty($_POST['clarity_SI1']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_SI1']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI2']) AND !empty($_POST['clarity_SI2']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_SI2']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_SI3']) AND !empty($_POST['clarity_SI3']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_SI3']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VS1']) AND !empty($_POST['clarity_VS1']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_VS1']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VS2']) AND !empty($_POST['clarity_VS2']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_VS2']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VVS1']) AND !empty($_POST['clarity_VVS1']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_VVS1']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_VVS2']) AND !empty($_POST['clarity_VVS2']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_VVS2']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }
        if( isset($_POST['clarity_FL']) AND !empty($_POST['clarity_FL']) ){
            $where_clarity		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_FL']) );
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }

        //------------------------------Color-----------------------------------
        if( isset($_POST['color_D']) AND !empty($_POST['color_D']) ){
            $where_color		    = array( 'color' => $_POST['color_D'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_E']) AND !empty($_POST['color_E']) ){
            $where_color		    = array( 'color' => $_POST['color_E'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_F']) AND !empty($_POST['color_F']) ){
            $where_color		    = array( 'color' => $_POST['color_F'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_G']) AND !empty($_POST['color_G']) ){
            $where_color		    = array( 'color' => $_POST['color_G'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_H']) AND !empty($_POST['color_H']) ){
            $where_color		    = array( 'color' => $_POST['color_H'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_I']) AND !empty($_POST['color_I']) ){
            $where_color		    = array( 'color' => $_POST['color_I'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_J']) AND !empty($_POST['color_J']) ){
            $where_color		    = array( 'color' => $_POST['color_J'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_K']) AND !empty($_POST['color_K']) ){
            $where_color		    = array( 'color' => $_POST['color_K'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_L']) AND !empty($_POST['color_L']) ){
            $where_color		    = array( 'color' => $_POST['color_L'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_M']) AND !empty($_POST['color_M']) ){
            $where_color		    = array( 'color' => $_POST['color_M'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_N']) AND !empty($_POST['color_N']) ){
            $where_color		    = array( 'color' => $_POST['color_N'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Z']) AND !empty($_POST['color_Z']) ){
            $where_color		    = array( 'color' => $_POST['color_Z'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Fancy_Color']) AND !empty($_POST['color_Fancy_Color']) ){
            $where_color		    = array( 'color' => $_POST['color_Fancy_Color'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        // Black Brown Yellow Blue Green Gray  Orange Pink Cognac Purple Red White Champagne Other
        if( isset($_POST['color_Black']) AND !empty($_POST['color_Black']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Black'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Brown']) AND !empty($_POST['color_Brown']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Brown'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Yellow']) AND !empty($_POST['color_Yellow']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Yellow'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Blue']) AND !empty($_POST['color_Blue']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Blue'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Green']) AND !empty($_POST['color_Green']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Green'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Gray']) AND !empty($_POST['color_Gray']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Gray'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        // Black Brown Yellow Blue Green Gray  Orange Pink Cognac Purple Red White Champagne Other
        if( isset($_POST['color_Orange']) AND !empty($_POST['color_Orange']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Orange'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Pink']) AND !empty($_POST['color_Pink']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Pink'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Cognac']) AND !empty($_POST['color_Cognac']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Cognac'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Purple']) AND !empty($_POST['color_Purple']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Purple'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Red']) AND !empty($_POST['color_Red']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Red'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_White']) AND !empty($_POST['color_White']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_White'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Champagne']) AND !empty($_POST['color_Champagne']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Champagne'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['color_Other']) AND !empty($_POST['color_Other']) ){
            $where_color		    = array( 'fcolor_value' => $_POST['color_Other'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		//------------------------------Cut-----------------------------------
        if( isset($_POST['cut_Excellent']) AND !empty($_POST['cut_Excellent']) ){
            $where_color		    = array( 'cut' => $_POST['cut_Excellent'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Very_Good']) AND !empty($_POST['cut_Very_Good']) ){
            $where_color		    = array( 'cut' => $_POST['cut_Very_Good'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Good']) AND !empty($_POST['cut_Good']) ){
            $where_color		    = array( 'cut' => $_POST['cut_Good'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
		if( isset($_POST['cut_Ideal']) AND !empty($_POST['cut_Ideal']) ){
            $where_color		    = array( 'cut' => $_POST['cut_Ideal'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Fair']) AND !empty($_POST['cut_Fair']) ){
            $where_color		    = array( 'cut' => $_POST['cut_Fair'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['cut_Poor']) AND !empty($_POST['cut_Poor']) ){
            $where_color		    = array( 'cut' => $_POST['cut_Poor'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        //------------------------------Carat-----------------------------------
        if( isset($_POST['carat_min']) AND !empty($_POST['carat_min']) ){
            $where_color		    =  array( 'ABS(carat) >' => $_POST['carat_min'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }
        if( isset($_POST['carat_max']) AND !empty($_POST['carat_max']) ){
            $where_color		    =  array( 'ABS(carat) <' => $_POST['carat_max'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

        //------------------------------Clarity-----------------------------------
        if( isset($_POST['clarity_min']) AND !empty($_POST['clarity_min']) ){
            $where_color		    = array( 'clarity' => $this->get_clarity_name($_POST['clarity_min']) );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('Stock_n LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

        $get_toal_data		=  $this->Diamondmodel->count_any_table($where_diamonds, 'dev_index');
		$get_diamond_list	=  $this->Diamondmodel->getdata_any_table_limit_order_where_diamonds('dev_index', $where_diamonds, $limit, $offset, $sort, $sortby);
        $color_array		= array('Blue', 'Yellow', 'Green', 'Orange', 'Red');
		if(isset($get_diamond_list) && !empty($get_diamond_list)){
			foreach($get_diamond_list as $diamonds){
				if($diamonds['image_url'] != ''){
					$view_shapeimage = "". SITE_URL ."resize.php/".$diamonds['image_url']."?width=180&height=180&image=/". $diamonds['image_url'] ."";
					$diamond_shape      = $diamonds['shape'];
				}else{
					if($diamonds['shape'] == 'Round'){
						$view_shapeimage = "". SITE_URL ."resize.php/actual-dime.jpg?width=180&height=180&image=/images/shapes_images/actual-dime.jpg";
						$diamond_shape      = 'Round';
					}else if($diamonds['shape'] == 'Princess'){
						$view_shapeimage = "". SITE_URL ."resize.php/princesss.jpg?width=180&height=180&image=/images/shapes_images/princesss.jpg";
						$diamond_shape      = 'Princess';
					}else if($diamonds['shape'] == 'Cushion'){
						$view_shapeimage = "". SITE_URL ."resize.php/cushion_cut_diamond.jpg?width=180&height=180&image=/images/shapes_images/cushion_cut_diamond.jpg";
						$diamond_shape      = 'Cushion';
					}else if($diamonds['shape'] == 'Radiant'){
						$view_shapeimage = "". SITE_URL ."resize.php/radiant.jpg?width=180&height=180&image=/images/shapes_images/radiant.jpg";
						$diamond_shape      = 'Radiant';
					}else if($diamonds['shape'] == 'Emerald'){
						$view_shapeimage = "". SITE_URL ."resize.php/emeraled.jpg?width=180&height=180&image=/images/shapes_images/emeraled.jpg";
						$diamond_shape      = 'Emerald';
					}else if($diamonds['shape'] == 'Pear'){
						$view_shapeimage = "". SITE_URL ."resize.php/pear.jpg?width=180&height=180&image=/images/shapes_images/pear.jpg";
						$diamond_shape      = 'Pear';
					}else if($diamonds['shape'] == 'Oval'){
						$view_shapeimage = "". SITE_URL ."resize.php/oval.jpg?width=180&height=180&image=/images/shapes_images/oval.jpg";
						$diamond_shape      = 'Oval';
					}else if($diamonds['shape'] == 'Asscher'){
						$view_shapeimage = "". SITE_URL ."resize.php/asscher.jpg?width=180&height=180&image=/images/shapes_images/asscher.jpg";
						$diamond_shape      = 'Asscher';
					}else if($diamonds['shape'] == 'Marquise'){
						$view_shapeimage = "". SITE_URL ."resize.php/marquise.jpg?width=180&height=180&image=/images/shapes_images/marquise.jpg";
						$diamond_shape      = 'Marquise';
					}else if($diamonds['shape'] == 'Heart'){
						$view_shapeimage = "". SITE_URL ."resize.php/heart.jpg?width=180&height=180&image=/images/shapes_images/heart.jpg";
						$diamond_shape      = 'Heart';
					}else{
						$view_shapeimage = "". SITE_URL ."resize.php/dm_noimage.jpg?width=180&height=180&image=/img/diamond_shapes/dm_noimage.jpg";
						$diamond_shape      = '';
					}
				}
				$crts = !empty($diamonds['carat'])?$diamonds['carat']:'0.00';
				$make_html	= '<div class="diamond_result_content">
					<div class="col-sm-12 hover-jewelery-img-area">
						<a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false">
							<img src="'.$view_shapeimage.'" alt="Engagement Ring" style="width:176px;border:solid 1px #ECECEC;height: 182px;" />
							<img src="'.$view_shapeimage.'" alt="Engagement Ring" class="detl-img2" />
						</a>
					</div>
					<div class="col-sm-12" style="padding:0px 10px;text-align:center;">
						<div><b><a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" style="color: #0a2b49;">'. $crts .'-Carat '.$diamonds['shape'].' Diamond</a></b></div>
						<div>';
							if($diamonds['cut'] != ''){
								$nameArr[] = $diamonds['cut'];
							}
							if($diamonds['clarity'] != ''){
								$nameArr[] = $diamonds['clarity'];
							}
							if($diamonds['color'] != ''){
								$nameArr[] = $diamonds['color'];
							}
							if(!empty($nameArr)){
								$make_html	.= implode(", ",$nameArr);
							}
						$make_html	.= '</div>
						<div style="line-height: 16px;"><b>SKU:</b> <a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" style="color: #0a2b49;">'.$diamonds['lot'].'</a></div>
						<div class="add_tocart_btn">
							<span class="main_item_price">$'._nf($diamonds['price']).'</span>
							<span><a href="'.SITE_URL.'diamonds/diamond_detail/'.$diamonds['Stock_n'].'/false" class="addToCartBtn">View Details</a></span>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>';
				$make_array  = array(
					'0'	=> $make_html
				); 
				$data[] = $make_array;
				$nameArr = array();
			}
		}
		$json_data = array(
			"draw"            => intval($params['draw']),
			"recordsTotal"    => intval($get_toal_data),
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data
		);
		echo json_encode($json_data);
	}

	function gemstones_search($page_name='',$page2=''){
		if($page_name == ''){
			$data['diamond_page_name'] = 'clarity-enhanced-diamonds';
        }else{
			$data['diamond_page_name'] = $page_name;
        }
        $data['title'] = "Gemstones";
		$output = $this->load->view('diamond/gemstones_search', $data, true);
        $this->output($output, $data, true);
		$this->output->cache(120);
    }

    function gemstones_search_realtime($page_name=''){
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start']; 
		}else{
			$limit  = 21;
			$offset = 0;
		}

        $where_diamonds =  array('price >=' => 1);
		$sqlClr = "SELECT shape FROM dev_index_gemstones WHERE fcolor_value = '' AND shape != '' GROUP BY shape ORDER BY shape";
		$queryClr = $this->db->query($sqlClr);
		$resultClr = $queryClr->result_array();
		$wherein1 = array();
		foreach($resultClr as $colr){
			$shp = str_replace(' ', '_', $colr['shape']);
			if(isset($_POST['shape_'.$shp]) AND !empty($_POST['shape_'.$shp])){
				$wherein1[] = str_replace('_', ' ', $_POST['shape_'.$shp]);
			}
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('Stock_n LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price';
			$sortby = 'ASC';
		}else{
			$sort = 'cut';
			$sortby = 'DESC';
		}

        $get_toal_data =  $this->Diamondmodel->count_gemstones_table($where_diamonds, $wherein1, 'dev_index_gemstones');
		$get_diamond_list =  $this->Diamondmodel->getdata_gemstones('dev_index_gemstones', $where_diamonds, $wherein1, $limit, $offset, $sort, $sortby);
		$nameArr = array();
        foreach($get_diamond_list as $diamonds){
			if($diamonds['image_url'] != ''){
				$view_shapeimage = $diamonds['image_url'];
				$diamond_shape      = $diamonds['shape'];
			}else{
				if($diamonds['shape'] == 'Round'){
					$view_shapeimage = "". SITE_URL ."resize.php/actual-dime.jpg?width=240&height=183&image=/images/shapes_images/actual-dime.jpg";
					$diamond_shape      = 'Round';
				}else if($diamonds['shape'] == 'Princess'){
					$view_shapeimage = "". SITE_URL ."resize.php/princesss.jpg?width=240&height=183&image=/images/shapes_images/princesss.jpg";
					$diamond_shape      = 'Princess';
				}else if($diamonds['shape'] == 'Cushion'){
					$view_shapeimage = "". SITE_URL ."resize.php/cushion_cut_diamond.jpg?width=240&height=183&image=/images/shapes_images/cushion_cut_diamond.jpg";
					$diamond_shape      = 'Cushion';
				}else if($diamonds['shape'] == 'Radiant'){
					$view_shapeimage = "". SITE_URL ."resize.php/radiant.jpg?width=240&height=183&image=/images/shapes_images/radiant.jpg";
					$diamond_shape      = 'Radiant';
				}else if($diamonds['shape'] == 'Emerald'){
					$view_shapeimage = "". SITE_URL ."resize.php/emeraled.jpg?width=240&height=183&image=/images/shapes_images/emeraled.jpg";
					$diamond_shape      = 'Emerald';
				}else if($diamonds['shape'] == 'Pear'){
					$view_shapeimage = "". SITE_URL ."resize.php/pear.jpg?width=240&height=183&image=/images/shapes_images/pear.jpg";
					$diamond_shape      = 'Pear';
				}else if($diamonds['shape'] == 'Oval'){
					$view_shapeimage = "". SITE_URL ."resize.php/oval.jpg?width=240&height=183&image=/images/shapes_images/oval.jpg";
					$diamond_shape      = 'Oval';
				}else if($diamonds['shape'] == 'Asscher'){
					$view_shapeimage = "". SITE_URL ."resize.php/asscher.jpg?width=240&height=183&image=/images/shapes_images/asscher.jpg";
					$diamond_shape      = 'Asscher';
				}else if($diamonds['shape'] == 'Marquise'){
					$view_shapeimage = "". SITE_URL ."resize.php/marquise.jpg?width=240&height=183&image=/images/shapes_images/marquise.jpg";
					$diamond_shape      = 'Marquise';
				}else if($diamonds['shape'] == 'Heart'){
					$view_shapeimage = "". SITE_URL ."resize.php/heart.jpg?width=240&height=183&image=/images/shapes_images/heart.jpg";
					$diamond_shape      = 'Heart';
				}else{
					$view_shapeimage = "". SITE_URL ."resize.php/dm_noimage.jpg?width=240&height=183&image=/img/diamond_shapes/dm_noimage.jpg";
					$diamond_shape      = '';
				}
			}
			$crts = !empty($diamonds['carat'])?$diamonds['carat']:'0.00';

            $make_html	= '<div class="diamond_result_content">
				<div class="col-sm-12 hover-jewelery-img-area" id="hover'.$diamonds['uid'].'">
					<a href="'.SITE_URL.'diamonds/gemstone_detail/'.$diamonds['Stock_n'].'/false">
						<img src="'.$view_shapeimage.'" alt="'.$diamonds['lot'].' Gemstone" class="detl-img1" />
						<img src="'.$view_shapeimage.'" alt="'.$diamonds['lot'].' Gemstone" class="detl-img2" />
					</a>
				</div>
				<script>
				$(document).ready(function() {
					$("#hover'.$diamonds['uid'].'").on("mouseenter", function() {
						$("#hover'.$diamonds['uid'].' img.detl-img2").css("display", "inline-block");
						$("#hover'.$diamonds['uid'].' img.detl-img1").css("display", "none");
					}).on("mouseleave", function() {
						$("#hover'.$diamonds['uid'].' img.detl-img1").css("display", "inherit");
						$("#hover'.$diamonds['uid'].' img.detl-img2").css("display", "none");
					});
				});
				</script>
				<div class="col-sm-12" style="padding:0px 10px;text-align:center;">
					<div style="line-height: 16px;"><a href="'.SITE_URL.'diamonds/gemstone_detail/'.$diamonds['Stock_n'].'/false" style="color: #0a2b49;"><b>'. $crts .'-Carat '.$diamonds['shape'].' Gemstone</b></a></div>
					<div style="line-height: 16px;">';
						if($diamonds['cut'] != ''){
							$nameArr[] = $diamonds['cut'];
						}
						if($diamonds['clarity'] != ''){
							$nameArr[] = $diamonds['clarity'];
						}
						if($diamonds['color'] != ''){
							$nameArr[] = $diamonds['color'];
						}
						if(!empty($nameArr)){
							$make_html	.= implode(", ",$nameArr);
						}
					$make_html	.= '</div>
					<div style="line-height: 16px;"><b>SKU:</b> <a href="'.SITE_URL.'diamonds/gemstone_detail/'.$diamonds['Stock_n'].'/false" style="color: #0a2b49;"> '.$diamonds['lot'].'</a></div>
					<div class="add_tocart_btn">
						<span class="main_item_price">$'._nf($diamonds['price']).'</span>
						<span><a href="'.SITE_URL.'diamonds/gemstone_detail/'.$diamonds['Stock_n'].'/false" class="addToCartBtn">View Details</a></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>';
			$make_array  = array(
				'0'	=> $make_html
			); 
			$data[] = $make_array;
			$nameArr = array();
        }

		$json_data = array(
			"draw"            => isset($params['draw'])?intval($params['draw']):'',
			"recordsTotal"    => intval($get_toal_data),
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data
		);
	    echo json_encode($json_data);
    }

	function engagement_rings($page_name='') {
		
        $data['diamond_page_name'] = 'engagement-rings';
        $data['title'] = "Engagement Rings";
		
		if($page_name == 'bridal-shanksNsettings' || $page_name == 'everNever' || $page_name == 'platinum-styles'){
		$output = $this->load->view('diamond/engagement-ring-style', $data, true);
		}else{
		$output = $this->load->view('diamond/engagement-rings', $data, true);
		}
        $this->output($output, $data, true);
		$this->output->cache(120);
    }

    function engagement_rings_realtime($page_name='') {
		
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 20;
			$offset = 0;
		}

		$where_diamonds	=  array('ABS(id) >' => 0);
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }
		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}
		if(isset($_POST['stoneShapeArr']) && !empty($_POST['stoneShapeArr']) ){
            $wherein2 = $_POST['stoneShapeArr'];
        }else{
			$wherein2 = array();
		}
		if(isset($_POST['metalArr']) && !empty($_POST['metalArr']) ){
            $wherein3 = $_POST['metalArr'];
        }else{
			$wherein3 = array();
		}
		if(isset($_POST['settingStyleArr']) && !empty($_POST['settingStyleArr']) ){
            $wherein4 = $_POST['settingStyleArr'];
        }else{
			$wherein4 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('item_number LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

        $get_toal_data =  $this->Diamondmodel->countengagedring($where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, 'dev_engagement_rings', 'id');
		$get_diamond_list =  $this->Diamondmodel->getengagedringData('dev_engagement_rings', $where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $limit, $offset, $sort, $sortby);
		$main_amount = 0; $offer_price = 0; $view1_shapeimage = ''; $view_shapeimage = ''; $view_shapeimagepop = '';
        foreach($get_diamond_list as $diamonds){
			$ringName = !empty($diamonds['description'])?$diamonds['description']:$diamonds['name'];
			if(!empty($diamonds['image'])){
				$images = explode(";",$diamonds['image']);
				$view1_shapeimage = '';
				if(isset($images[0]) && $images[0] != ''){
					$view1_shapeimage = $images[0];
				}elseif(isset($images[1]) && $images[1] != ''){
					$view1_shapeimage = $images[1];
				}
				if($view1_shapeimage == ''){
					$view1_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
				$view_shapeimagepop = '';
				if(isset($images[1]) && $images[1] != ''){
					$view_shapeimagepop = $images[1];
				}elseif(isset($images[2]) && $images[2] != ''){
					$view_shapeimagepop = $images[2];
				}
				if($view_shapeimagepop == ''){
					$view_shapeimagepop = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
				$view_shapeimage = '';
				if(isset($images[2]) && $images[2] != ''){
					$view_shapeimage = $images[2];
				}elseif(isset($images[3]) && $images[3] != ''){
					$view_shapeimage = $images[3];
				}elseif(isset($images[4]) && $images[4] != ''){
					$view_shapeimage = $images[4];
				}
				if($view_shapeimage == ''){
					$view_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
			}else{
				$view1_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				$view_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				$view_shapeimagepop = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
			}
			$view1_shapeimage = str_replace("xlarge","standard",$view1_shapeimage);
			$view_shapeimage = str_replace("xlarge","standard",$view_shapeimage);
			$view_shapeimagepop = str_replace("xlarge","standard",$view_shapeimagepop);
			if($diamonds['dev_us_id'] > 0){
				$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$diamonds['name']."' AND id = '".$diamonds['dev_us_id']."' ";
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
				$main_amount = $finalsemiMountprce;
				$offer_price = $main_amount+225;
			}else{
				$main_amount = $diamonds['price'];
				$offer_price = $diamonds['price'];
			}

			$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['id'].')" onmouseout="showoverlayout('.$diamonds['id'].')">
				<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['id'].'" style="height: 394px;">
					<div class="thumbnail" id="thumbnail_'.$diamonds['id'].'">
						<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
							<span class="ir218-snippet-stars">
								<a href="'.SITE_URL.'selection/engagement-rings-detail/'.$diamonds['id'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
							</span>
						</div>
						<span class="heart niwl" onclick="addwhishlist('.$diamonds['id'].')" data-toggle="wishlist" data-product="'.$diamonds['id'].'" data-remove-related="true">
							<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
						</span>
						<span></span>
						<div class="item-dis">
							<div class="gl-jCarouselLite5">
								<div class="custom-container widget nonCircular">
									<div class="mid">
										<a href="'.SITE_URL.'selection/engagement-rings-detail/'.$diamonds['id'].'" class="clk_through top_lg pdp_url" data-image="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" data-side-image="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Engagement Ring|Click to PDP">
											<span class="modal-product-superposition load-sync load-overlay load-base">
												<img alt="'.$ringName.'" data-original="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
												<img alt="'.$ringName.'" id="img_'.$diamonds['id'].'" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" data-load="load-overlay">
											</span>
										</a>
									</div>
									<div class="thumbnail-list">
										<div class="carousel jCarouselLite">
											<ul>
												<li><a href="javascript:void(0)" class="active is_top_pic" onmouseover="bigImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img alt="'.$ringName.'" data-big-img="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'"></a></li>
												<li><a class="is_hand_pic" href="javascript:void(0)" onmouseover="bigImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimagepop.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img style="width: 100%; height: 100%;" alt="'.$ringName.'" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimagepop.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimagepop.'">
												</a></li>
												<li><a href="javascript:void(0)" class="is_side_pic" onmouseover="bigImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimage.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img alt="product thumbnail side image" class="lazyload loaded" data-big-img="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimage.'" data-original="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimage.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimage.'" style=""></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="caption">
								<a href="'.SITE_URL.'selection/engagement-rings-detail/'.$diamonds['id'].'" class="clk_through">
									<small class="firstline"></small>
									<div class="limit">
										<span class="h3 title1">'.$ringName.'</span>
										<small class="old_splite">Engagement Ring <span class="metal">('.$diamonds['diamond_weight'].')</span> </small>
										<div style="line-height: 16px;"><b>SKU:</b> <a href="'. SITE_URL .'selection/engagement-rings-detail/'.$diamonds['id'].'" style="color: #0a2b49;">'.$diamonds['item_number'].'</a></div>
									</div>
								</a>
								<span class="money">$'._nf($offer_price).'</span>
							</div>
						</div>
					</div>
				</div>
			</div>';

			$make_array  = array(
				'0'	=> $make_html
			); 
	        $data[] = $make_array;	
        }

		$json_data = array(
			"draw"				=> intval($params['draw']),
			"recordsTotal"		=> intval($get_toal_data),
			"recordsFiltered"	=> intval($get_toal_data),
			"data"				=> $data
		);
	    echo json_encode($json_data);
    }

    function engagement_ring_style_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 20;
			$offset = 0;
		}

        $where_diamonds	=  array('ABS(id) >' => 0);
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }
		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}
		if(isset($_POST['stoneShapeArr']) && !empty($_POST['stoneShapeArr']) ){
            $wherein2 = $_POST['stoneShapeArr'];
        }else{
			$wherein2 = array();
		}
		if(isset($_POST['metalArr']) && !empty($_POST['metalArr']) ){
            $wherein3 = $_POST['metalArr'];
        }else{
			$wherein3 = array();
		}
		if(isset($_POST['settingStyleArr']) && !empty($_POST['settingStyleArr']) ){
            $wherein4 = $_POST['settingStyleArr'];
        }else{
			$wherein4 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('item_number LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

        $get_toal_data =  $this->Diamondmodel->countengagedringStyle($where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, 'dev_engagement_rings', 'id');
		$get_diamond_list =  $this->Diamondmodel->getengagedringDataStyle('dev_engagement_rings', $where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $limit, $offset, $sort, $sortby);
		$offer_price = 0; $view1_shapeimage = ''; $view_shapeimage = ''; $view_shapeimagepop = '';
        foreach($get_diamond_list as $diamonds){
			$ringName = !empty($diamonds['description'])?$diamonds['description']:$diamonds['name'];
			if(!empty($diamonds['image'])){
				$images = explode(";",$diamonds['image']);
			
				$view1_shapeimage = '';
				if(isset($images[0]) && $images[0] != ''){
					$view1_shapeimage = $images[0];
				}elseif(isset($images[1]) && $images[1] != ''){
					$view1_shapeimage = $images[1];
				}
				if($view1_shapeimage == ''){
					$view1_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
				$view_shapeimagepop = '';
				if(isset($images[1]) && $images[1] != ''){
					$view_shapeimagepop = $images[1];
				}elseif(isset($images[2]) && $images[2] != ''){
					$view_shapeimagepop = $images[2];
				}
				if($view_shapeimagepop == ''){
					$view_shapeimagepop = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
				$view_shapeimage = '';
				if(isset($images[2]) && $images[2] != ''){
					$view_shapeimage = $images[2];
				}elseif(isset($images[3]) && $images[3] != ''){
					$view_shapeimage = $images[3];
				}
				if($view_shapeimage == ''){
					$view_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
			}else{
				$view1_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				$view_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				$view_shapeimagepop = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
			}
			$view1_shapeimage = str_replace("xlarge","standard",$view1_shapeimage);
			$view_shapeimage = str_replace("xlarge","standard",$view_shapeimage);
			$view_shapeimagepop = str_replace("xlarge","standard",$view_shapeimagepop);
			$offer_price = $diamonds['price'];
 echo "%%%%%%%%%%%".$view1_shapeimage;
			$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['id'].')" onmouseout="showoverlayout('.$diamonds['id'].')">
				<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['id'].'" style="height: 394px;">
					<div class="thumbnail" id="thumbnail_'.$diamonds['id'].'">
						<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
							<span class="ir218-snippet-stars">
								<a href="'.SITE_URL.'selection/wedding-band-detail/'.$diamonds['id'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
							</span>
						</div>
						<span class="heart niwl" data-toggle="wishlist" data-product="'.$diamonds['id'].'" data-remove-related="true">
							<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
						</span>
						<span></span>
						<div class="item-dis">
							<div class="gl-jCarouselLite6">
								<div class="custom-container widget nonCircular">
									<div class="mid">
										<a href="'.SITE_URL.'selection/wedding-band-detail/'.$diamonds['id'].'" class="clk_through top_lg pdp_url" data-image="'.$view1_shapeimage.'" data-side-image="'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Engagement Ring|Click to PDP">
											<span class="modal-product-superposition load-sync load-overlay load-base">
												<img alt="'.$ringName.'" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
												<img alt="'.$ringName.'" id="img_'.$diamonds['id'].'" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" data-load="load-overlay">
											</span>
										</a>
									</div>
									<div class="thumbnail-list">
										<div class="carousel jCarouselLite">
											<ul>
												<li><a href="javascript:void(0)" class="active is_top_pic" onmouseover="bigImg(\''.$view1_shapeimage.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img alt="'.$ringName.'" data-big-img="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'"></a></li>
												<li><a href="javascript:void(0)" class="is_side_pic" onmouseover="bigImg(\''.$view_shapeimage.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img alt="product thumbnail side image" class="lazyload loaded" data-big-img="'.$view_shapeimage.'" data-original="'.$view_shapeimage.'" src="'.$view_shapeimage.'" style=""></a></li>
												<li><a class="is_hand_pic" href="javascript:void(0)" onmouseover="bigImg(\''.$view_shapeimagepop.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img style="width: 100%; height: 100%;" alt="'.$ringName.'" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="'.$view_shapeimagepop.'" src="'.$view_shapeimagepop.'">
												</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="caption">
								<a href="'.SITE_URL.'selection/wedding-band-detail/'.$diamonds['id'].'" class="clk_through">
									<small class="firstline"></small>
									<div class="limit">
										<span class="h3 title1">'.$ringName.'</span>
										<div style="line-height: 16px;"><b>SKU:</b> <a href="'. SITE_URL .'selection/wedding-band-detail/'.$diamonds['id'].'" style="color: #0a2b49;">'.$diamonds['item_number'].'</a></div>
									</div>
								</a>
								<span class="money">$'._nf($offer_price).'</span>
							</div>
						</div>
					</div>
				</div>
			</div>';

			$make_array  = array(
				'0'	=> $make_html
			); 
	        $data[] = $make_array;	
        }

		$json_data = array(
			"draw"				=> intval($params['draw']),
			"recordsTotal"		=> intval($get_toal_data),
			"recordsFiltered"	=> intval($get_toal_data),
			"data"				=> $data
		);
	    echo json_encode($json_data);
    }

	function setFilters(){
        if(isset($_POST)){
            $temp = [];
            if(array_key_exists('variant',$_POST) && $_POST['variant'] != Null){
                $temp['variation'] = $_POST['variant'];
            }
            if(array_key_exists('metal_type',$_POST) && $_POST['metal_type'] != Null){
                $temp['metal_type'] = $_POST['metal_type'];
            }
            if(array_key_exists('metal_color',$_POST) && $_POST['metal_color'] != Null){
                $temp['metal_color'] = $_POST['metal_color'];
            }
			if(array_key_exists('finish_level',$_POST) && $_POST['finish_level'] != Null){
                $temp['finish_level'] = $_POST['finish_level'];
            }
			if(array_key_exists('diamond_quality',$_POST) && $_POST['diamond_quality'] != Null){
                $temp['diamond_quality'] = $_POST['diamond_quality'];
            }
            
            $product_id = $_POST['product_id'];
            $ht =''; $ht1 ='';
            $i=0;
            foreach($temp as $k=>$v){
				if($k == 'finish_level'){
					$ht .= "( a.finish = '".trim($v)."')";
				}elseif($k == 'diamond_quality'){
					$ht .= "( a.quality = '".trim($v)."')";
				}else{
					if($k != 'variation'){
						$ht .= "( a.".$k." = '".trim($v)."')";
					}
				}
                $ht1 .= "( a.".$k." = '".trim($v)."')";
                if($i<count($temp)-1){
                    $ht .=" and ";
					$ht1 .=" and ";
                }
                $i++;
            }
			
			$this->db->select('a.price_website');
            $this->db->from('dev_jewelries_new a');
            $this->db->where($ht);
            $this->db->where('a.stock_real_number LIKE',$product_id);
            $resulted = $this->db->get()->row();
			if(!empty($resulted)){
				$retailPrice = $resulted->price_website;

				$data = array();
				$data['retail_price'] = _nf($retailPrice,0);
				$data['price'] = _nf($retailPrice,0);
				$data['price'] =  ($data['price']==null)?0:$data['price'];
				$ezvalue_row = $this->Commonmodel->getEzOptionValues();
				$first_ez_value = $ezvalue_row[0]['ezvalue'];
				$second_ez_value = $ezvalue_row[1]['ezvalue'];
				$data['3ez'] = _nf($retailPrice/$first_ez_value, 2);
				$data['5ez'] = _nf($retailPrice/$second_ez_value, 2);
				echo json_encode(['type'=>'success','tez'=> $data['3ez'],'fez'=>$data['5ez'],'msg'=>$data,'price'=> str_replace(",","",$data['price']),'retail_price'=>$data['retail_price']]);
			}else{
				$this->db->select('a.retail_pricing');
				$this->db->from('dev_overnight_variant a');
				$this->db->where($ht1);
				$this->db->where('a.product_id LIKE',$product_id);
				$result = $this->db->get()->row();
				$retailPrices = str_replace("$","",$result->retail_pricing);
				$retailPrice = $retailPrices/2;

				$data = array();
				$data['retail_price'] = _nf($retailPrice,0);
				$data['price'] = _nf($retailPrice,0);
				$data['price'] =  ($data['price']==null)?0:$data['price'];
				$ezvalue_row = $this->Commonmodel->getEzOptionValues();
				$first_ez_value = $ezvalue_row[0]['ezvalue'];
				$second_ez_value = $ezvalue_row[1]['ezvalue'];
				$data['3ez'] = _nf($retailPrice/$first_ez_value, 2);
				$data['5ez'] = _nf($retailPrice/$second_ez_value, 2);
				echo json_encode(['type'=>'success','tez'=> $data['3ez'],'fez'=>$data['5ez'],'msg'=>$data,'price'=> str_replace(",","",$data['price']),'retail_price'=>$data['retail_price']]);
			}
		}else{
			echo json_encode(['type'=>'success','msg'=>'value set']);
		}
	}

	function star_collection($page_name='') {
        $data['diamond_page_name'] = 'star-collection';
        $data['title'] = "The Star Collection";

        $output = $this->load->view('diamond/star-collection', $data, true);
        $this->output($output, $data, true);
		$this->output->cache(120);
    }

	function star_collection_realtime($page_name=''){
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 21;
			$offset = 0;
		}

        $where_diamonds	=  array('ABS(ur.final_price) >' => 0);
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(ur.final_price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(ur.final_price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(ur.final_price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }
		$wherein0 = $this->uri->segment(3);
		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('p.product LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'ur.final_price';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'ur.final_price';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}
        $get_toal_data =  $this->Diamondmodel->countStarCollection($where_diamonds, $wherein0, $wherein1, 'us_product', 'id');
		$get_diamond_list =  $this->Diamondmodel->getStarCollectionData('us_product', $where_diamonds, $wherein0, $wherein1, $limit, $offset, $sort, $sortby);
        foreach($get_diamond_list as $diamonds){
			$getImages =  $this->Diamondmodel->getStarCollectionImages($diamonds['product']);
			if(!empty($getImages)){
				if(!empty($getImages[0]->ImagePath) && file_exists('scrapper/imgs/'. $getImages[0]->ImagePath.'')){
					$view1_shapeimage = SITE_URL.'scrapper/imgs/'.$getImages[0]->ImagePath;
				}elseif(!empty($getImages[1]->ImagePath) && file_exists('scrapper/imgs/'. $getImages[1]->ImagePath.'')){
					$view1_shapeimage = SITE_URL.'scrapper/imgs/'.$getImages[1]->ImagePath;
				}else{
					$view1_shapeimage = SITE_URL.'images/no_image.jpeg';
				}
				if(!empty($getImages[1]->ImagePath) && file_exists('scrapper/imgs/'. $getImages[1]->ImagePath .'')){
					$view_shapeimage = SITE_URL.'scrapper/imgs/'.$getImages[1]->ImagePath;
				}elseif(!empty($getImages[2]->ImagePath) && file_exists('scrapper/imgs/'. $getImages[2]->ImagePath.'')){
					$view_shapeimage = SITE_URL.'scrapper/imgs/'.$getImages[2]->ImagePath;
				}else{
					$view_shapeimage = SITE_URL.'images/no_image.jpeg';
				}
				if(!empty($getImages[2]->ImagePath) && file_exists('scrapper/imgs/'. $getImages[2]->ImagePath .'')){
					$view_shapeimagepop = SITE_URL.'scrapper/imgs/'.$getImages[2]->ImagePath;
				}elseif(!empty($getImages[3]->ImagePath) && file_exists('scrapper/imgs/'. $getImages[3]->ImagePath.'')){
					$view_shapeimagepop = SITE_URL.'scrapper/imgs/'.$getImages[3]->ImagePath;
				}else{
					$view_shapeimagepop = SITE_URL.'images/no_image.jpeg';
				}
			}else{
				$view_shapeimage = SITE_URL.'images/no_image.jpeg';
				$view1_shapeimage = SITE_URL.'images/no_image.jpeg';
				$view_shapeimagepop = SITE_URL.'images/no_image.jpeg';
			}

			$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['id'].')" onmouseout="showoverlayout('.$diamonds['id'].')">
				<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['id'].'" style="height: 394px;">
					<div class="thumbnail" id="thumbnail_'.$diamonds['id'].'">
						<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
							<span class="ir218-snippet-stars">
								<a href="'.SITE_URL.'selection/star-collection-detail/'.$diamonds['id'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
							</span>
						</div>
						<span class="heart niwl" data-toggle="wishlist" data-product="'.$diamonds['id'].'" data-remove-related="true">
							<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
						</span>
						<span></span>
						<div class="item-dis">
							<div class="gl-jCarouselLite7">
								<div class="custom-container widget nonCircular">
									<div class="mid">
										<a href="'.SITE_URL.'selection/star-collection-detail/'.$diamonds['id'].'" class="clk_through top_lg pdp_url" data-image="'.$view1_shapeimage.'" data-side-image="'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Engagement Ring|Click to PDP">
											<span class="modal-product-superposition load-sync load-overlay load-base">
												<img alt="Twisted Engagement Ring" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
												<img alt="Twisted Engagement Ring" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="'.$view_shapeimage.'" src="'.$view_shapeimage.'" data-load="load-overlay">
											</span>
										</a>
									</div>
									<div class="thumbnail-list">
										<div class="carousel jCarouselLite">
											<ul>
												<li><a href="javascript:void(0)" class="active is_top_pic"><img alt="product thumbnail top image" data-big-img="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'"></a></li>
												<li><a href="javascript:void(0)" class="is_side_pic"><img alt="product thumbnail side image" class="lazyload loaded" data-big-img="'.$view_shapeimage.'" data-original="'.$view_shapeimage.'" src="'.$view_shapeimage.'" style=""></a></li>
												<li><a class="is_hand_pic" href="javascript:void(0)"><img style="width: 100%; height: 100%;" alt="product thumbnail hand image" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="'.$view_shapeimagepop.'" src="'.$view_shapeimagepop.'">
												</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="caption">
								<a href="'.SITE_URL.'selection/star-collection-detail/'.$diamonds['id'].'" class="clk_through">
									<small class="firstline"></small>
									<div class="limit">
										<span class="h3 title1">'.$diamonds['product'].'</span>
										<small class="old_splite">Diamond Ring <span class="metal">('.$diamonds['side_stone_total_weight'].')</span> </small>
									</div>
								</a>
								<span class="money">$'._nf($diamonds['final_price']).'</span>
							</div>
						</div>
					</div>
				</div>
			</div>';
			$make_array  = array(
				'0'	=> $make_html
			); 
	        $data[] = $make_array;
        }

		$json_data = array(
			"draw"				=> intval($params['draw']),
			"recordsTotal"		=> intval($get_toal_data),
			"recordsFiltered"	=> intval($get_toal_data),
			"data"				=> $data
		);
	    echo json_encode($json_data);
    }

	function setStarCollectionFilters(){
        if(isset($_POST)){
			$product_id = $_POST['product_id'];
			$sqlring = "SELECT id FROM us_configuration WHERE 1 = 1";
            if(array_key_exists('metal_type',$_POST) && $_POST['metal_type'] != Null){
				$sqlring .= ' AND metal_type LIKE "'.$_POST['metal_type'].'"';
            }
            if(array_key_exists('metal_color',$_POST) && $_POST['metal_color'] != Null){
                $sqlring .= ' AND metal_color LIKE "'.$_POST['metal_color'].'"';
            }
			if(array_key_exists('finish_level',$_POST) && $_POST['finish_level'] != Null){
                $sqlring .= ' AND finish_option LIKE "'.$_POST['finish_level'].'"';
            }
			if(array_key_exists('diamond_quality',$_POST) && $_POST['diamond_quality'] != Null){
                $sqlring .= ' AND quality LIKE "'.$_POST['diamond_quality'].'"';
            }
			$rsring = $this->db->query($sqlring);
			$resut = $rsring->result_array();
			$results = count($resut[0]);
			if($results > 0){
				$this->db->select('final_price');
				$this->db->from('us_price');
				$this->db->where('id_config',$resut[0]['id']);
				$this->db->where('id_item',$product_id);
				$resulted = $this->db->get()->row();
				$retailPrice = $resulted->final_price*1.5;
				$wirePrice = $retailPrice*0.03;
				$wirePrices =  _nf($retailPrice-$wirePrice, 0);
				$data['retail_price'] = _nf($retailPrice,0);
				$data['3ez'] = _nf($retailPrice/3, 2);
				$data['5ez'] = _nf($retailPrice/5, 2);
				echo json_encode(['type'=>'success','msg'=>'New Value','tez'=> $data['3ez'],'fez'=>$data['5ez'],'price' => $retailPrice,'retail_price'=>$data['retail_price'],'wire_price'=>$wirePrices]);
			}else{
				echo json_encode(['type'=>'success','msg'=>'Value set']);
			}
		}else{
			echo json_encode(['type'=>'success','msg'=>'Value set']);
		}
	}

	function wedding_bands($page_name='') {
        $data['diamond_page_name'] = 'wedding-bands';
        $data['title'] = "Wedding Bands";
        $output = $this->load->view('diamond/wedding-bands', $data, true);
        $this->output($output, $data, true);
		$this->output->cache(120);
    }

    function wedding_bands_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 20;
			$offset = 0;
		}

        $where_diamonds	=  array('ABS(ud.id) >' => 0); $where_diamondc	=  array('ABS(ud.id) >' => 0);
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(ur.priceRetail) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(ur.priceRetail) <' => 999990);
			}else{
				$amount_max	=  array('ABS(ur.priceRetail) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }
		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}
		if(isset($_POST['stoneShapeArr']) && !empty($_POST['stoneShapeArr']) ){
            $wherein2 = $_POST['stoneShapeArr'];
        }else{
			$wherein2 = array();
		}
		if(isset($_POST['metalArr']) && !empty($_POST['metalArr']) ){
            $wherein3 = $_POST['metalArr'];
        }else{
			$wherein3 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('ud.product_id_set LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
			$where_diamondc	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'ur.priceRetail';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'ur.priceRetail';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}
		$get_diamond_list =  $this->Diamondmodel->getWeddingbandsData('dev_us', $where_diamonds, $wherein1, $wherein2, $wherein3, $limit, $offset, $sort, $sortby);
		$main_amount = 0; $offer_price = 0; $count = 0;
        foreach($get_diamond_list as $diamonds){
			$ringName = !empty($diamonds['description'])?$diamonds['description']:$diamonds['name'];
			$sqlthumb = "SELECT ImagePath, ImagePathThumb FROM images WHERE ItemNumber LIKE '".$diamonds['name']."' ORDER BY `SortOrder` DESC";
			$resulthumb = $this->db->query($sqlthumb);
			$arthumb = $resulthumb->result_array();
			$imgArr = array();
			foreach($arthumb as $imgs){
				$imgArr[] = $imgs['ImagePath'];
			}

			if(!empty($imgArr)){
				$images = $imgArr;
				if(isset($images[0]) && $images[0] != ''){
					$view1_shapeimage = $images[0];
				}elseif(isset($images[1]) && $images[1] != ''){
					$view1_shapeimage = $images[1];
				}elseif(isset($images[2]) && $images[2] != ''){
					$view1_shapeimage = $images[2];
				}
				if($view1_shapeimage == ''){
					$view1_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
				if(isset($images[1]) && $images[1] != ''){
					$view_shapeimagepop = $images[1];
				}elseif(isset($images[2]) && $images[2] != ''){
					$view_shapeimagepop = $images[2];
				}elseif(isset($images[3]) && $images[3] != ''){
					$view_shapeimagepop = $images[3];
				}
				if($view_shapeimagepop == ''){
					$view_shapeimagepop = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
				if(isset($images[2]) && $images[2] != ''){
					$view_shapeimage = $images[2];
				}elseif(isset($images[3]) && $images[3] != ''){
					$view_shapeimage = $images[3];
				}elseif(isset($images[4]) && $images[4] != ''){
					$view_shapeimage = $images[4];
				}
				if($view_shapeimage == ''){
					$view_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
			}else{
				$view1_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				$view_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				$view_shapeimagepop = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
			}
			$view1_shapeimage = str_replace("xlarge","standard",$view1_shapeimage);
			$view_shapeimage = str_replace("xlarge","standard",$view_shapeimage);
			$view_shapeimagepop = str_replace("xlarge","standard",$view_shapeimagepop);
			$main_amount = $diamonds['priceRetail'];
			$offer_price = $diamonds['priceRetail'];
			if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){ $amountmin = $_POST['amount_min']; }else{ $amountmin = 1; }
			if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
				if($_POST['amount_max'] == 9999){ $amountmax = 999990; }else{ $amountmax = $_POST['amount_max']; }
			}else{ $amountmax = 999990; }
			if($offer_price >= $amountmin && $offer_price <= $amountmax){
				$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['ring_id'].')" onmouseout="showoverlayout('.$diamonds['ring_id'].')">
					<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['ring_id'].'" style="height: 394px;">
						<div class="thumbnail" id="thumbnail_'.$diamonds['ring_id'].'">
							<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
								<span class="ir218-snippet-stars">
									<a href="'.SITE_URL.'selection/wedding-bands-detail/'.$diamonds['ring_id'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
								</span>
							</div>
							<span class="heart niwl" data-toggle="wishlist" data-product="'.$diamonds['ring_id'].'" data-remove-related="true">
								<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
							</span>
							<span></span>
							<div class="item-dis">
								<div class="gl-jCarouselLite8">
									<div class="custom-container widget nonCircular">
										<div class="mid">
											<a href="'.SITE_URL.'selection/wedding-bands-detail/'.$diamonds['ring_id'].'" class="clk_through top_lg pdp_url" data-image="'.$view1_shapeimage.'" data-side-image="'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Engagement Ring|Click to PDP">
												<span class="modal-product-superposition load-sync load-overlay load-base">
													<img alt="'.$ringName.'" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
													<img alt="'.$ringName.'" id="img_'.$diamonds['ring_id'].'" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" data-load="load-overlay">
												</span>
											</a>
										</div>
										<div class="thumbnail-list">
											<div class="carousel jCarouselLite">
												<ul>
													<li><a href="javascript:void(0)" class="active is_top_pic" onmouseover="bigImg(\''.$view1_shapeimage.'\',\''.$diamonds['ring_id'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['ring_id'].'\')"><img alt="'.$ringName.'" data-big-img="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'"></a></li>
													<li><a href="javascript:void(0)" class="is_side_pic" onmouseover="bigImg(\''.$view_shapeimage.'\',\''.$diamonds['ring_id'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['ring_id'].'\')"><img alt="product thumbnail side image" class="lazyload loaded" data-big-img="'.$view_shapeimage.'" data-original="'.$view_shapeimage.'" src="'.$view_shapeimage.'" style=""></a></li>
													<li><a class="is_hand_pic" href="javascript:void(0)" onmouseover="bigImg(\''.$view_shapeimagepop.'\',\''.$diamonds['ring_id'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['ring_id'].'\')"><img style="width: 100%; height: 100%;" alt="'.$ringName.'" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="'.$view_shapeimagepop.'" src="'.$view_shapeimagepop.'">
													</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="caption">
									<a href="'.SITE_URL.'selection/wedding-bands-detail/'.$diamonds['ring_id'].'" class="clk_through">
										<small class="firstline"></small>
										<div class="limit">
											<span class="h3 title1">'.$ringName.'</span>
											<small class="old_splite">Wedding Ring <span class="metal">('.$diamonds['stone_weight'].')</span> </small>
										</div>
									</a>
									<span class="money">$'._nf($offer_price).'</span>
								</div>
							</div>
						</div>
					</div>
				</div>';

				$make_array  = array('0'=> $make_html); 
				$data[] = $make_array;
				$count++;
			}
        }
		$get_toal_data =  $this->Diamondmodel->countWeddingbands($where_diamondc, $wherein1, $wherein2, 'dev_us', 'ud.id');
		$json_data = array(
			"draw"				=> intval($params['draw']),
			"recordsTotal"		=> intval($count),
			"recordsFiltered"	=> intval($get_toal_data),
			"data"				=> $data
		);
	    echo json_encode($json_data);
    }

	function fine_jewelry($page_name='') {
        if($page_name == ''){
            $data['diamond_page_name']	= 'fine-jewelry';
        }else{
            $data['diamond_page_name']	= $page_name;
        }
        $data['title'] = "Fine Jewelry";
		$output = $this->load->view('diamond/fine_jewelry_stuller', $data, true);
		$this->output($output, $data, true);
		$this->output->cache(n);
    }

	function fine_jewelry_stuller_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 20;
			$offset = 0;
		}
        $where_diamonds	=  array('price_website >' => 0);
        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price_website) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price_website) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price_website) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}
		if(isset($_POST['stoneShapeArr']) && !empty($_POST['stoneShapeArr']) ){
            $wherein2 = $_POST['stoneShapeArr'];
        }else{
			$wherein2 = array();
		}
		if(isset($_POST['stoneMetalArr']) && !empty($_POST['stoneMetalArr']) ){
            $wherein3 = $_POST['stoneMetalArr'];
        }else{
			$wherein3 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('stock_real_number LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price_website';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price_website';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

		$get_toal_data = $this->Diamondmodel->countfinejewelar($where_diamonds, $wherein1, $wherein2, $wherein3, 'dev_jewelries_new');
        $get_diamond_list = $this->Diamondmodel->getfinejewelarData('dev_jewelries_new', $where_diamonds, $wherein1, $wherein2, $wherein3, $limit, $offset, $sort, $sortby);
		$img = '';
        foreach($get_diamond_list as $diamonds){
			if($diamonds['image1'] != ""){
				$view1_shapeimage = $diamonds['image1'];
			}elseif($diamonds['image2'] != ""){
				$view1_shapeimage = $diamonds['image2'];
			}elseif($diamonds['image3'] != ""){
				$view1_shapeimage = $diamonds['image3'];
			}else{
				$view1_shapeimage	= SITE_URL .'images/no_image.jpeg';
			}

			if($diamonds['image2'] != ""){
				$view_shapeimage = $diamonds['image2'];
			}elseif($diamonds['image3'] != ""){
				$view_shapeimage = $diamonds['image3'];
			}elseif($diamonds['image4'] != ""){
				$view_shapeimage = $diamonds['image4'];
			}else{
				$view_shapeimage	= SITE_URL .'images/no_image.jpeg';
			}

			if($diamonds['image3'] != ""){
				$view_shapeimagepop = $diamonds['image3'];
			}elseif($diamonds['image4'] != ""){
				$view_shapeimagepop = $diamonds['image4'];
			}elseif($diamonds['image5'] != ""){
				$view_shapeimagepop = $diamonds['image5'];
			}else{
				$view_shapeimagepop	= SITE_URL .'images/no_image.jpeg';
			}
			$view1_shapeimage = str_replace("xlarge","standard",$view1_shapeimage);
			$view_shapeimage = str_replace("xlarge","standard",$view_shapeimage);
			$view_shapeimagepop = str_replace("xlarge","standard",$view_shapeimagepop);
			$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['stock_number'].')" onmouseout="showoverlayout('.$diamonds['stock_number'].')">
				<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['stock_number'].'" style="height: 394px;">
					<div class="thumbnail" id="thumbnail_'.$diamonds['stock_number'].'">
						<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
							<span class="ir218-snippet-stars">
								<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
							</span>
						</div>
						<span class="heart niwl" data-toggle="wishlist" data-product="'.$diamonds['stock_number'].'" data-remove-related="true">
							<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
						</span>
						<span></span>
						<div class="item-dis">
							<div class="gl-jCarouselLite1">
								<div class="custom-container widget nonCircular">
									<div class="mid">
										<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" class="clk_through top_lg pdp_url" data-image="'.$view1_shapeimage.'" data-side-image="'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Engagement Ring|Click to PDP">
											<span class="modal-product-superposition load-sync load-overlay load-base">
												<img alt="'.$diamonds['item_title'].'" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
												<img alt="'.$diamonds['item_title'].'" id="img_'.$diamonds['stock_number'].'" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" data-load="load-overlay">
											</span>
										</a>
									</div>
									<div class="thumbnail-list">
										<div class="carousel jCarouselLite">
											<ul>
												<li><a href="javascript:void(0)" class="active is_top_pic" onmouseover="bigImg(\''.$view1_shapeimage.'\',\''.$diamonds['stock_number'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['stock_number'].'\')"><img alt="'.$diamonds['item_title'].'" data-big-img="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'"></a></li>
												<li><a href="javascript:void(0)" class="is_side_pic" onmouseover="bigImg(\''.$view_shapeimage.'\',\''.$diamonds['stock_number'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['stock_number'].'\')"><img alt="'.$diamonds['item_title'].'" class="lazyload loaded" data-big-img="'.$view_shapeimage.'" data-original="'.$view_shapeimage.'" src="'.$view_shapeimage.'" style=""></a></li>
												<li><a class="is_hand_pic" href="javascript:void(0)" onmouseover="bigImg(\''.$view_shapeimagepop.'\',\''.$diamonds['stock_number'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['stock_number'].'\')"><img style="width: 100%; height: 100%;" alt="'.$diamonds['item_title'].'" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="'.$view_shapeimagepop.'" src="'.$view_shapeimagepop.'">
												</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="caption">
								<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" class="clk_through">
									<small class="firstline"></small>
									<div class="limit">
										<span class="h3 title1">'.$diamonds['item_title'].'</span>
										<small class="old_splite">Fine Jewelry <span class="metal">('.$diamonds['carat_weight'].')</span> </small>
										<div style="line-height: 16px;"><b>SKU:</b> <a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" style="color: #0a2b49;">'.$diamonds['item_sku'].'</a></div>
									</div>
								</a>
								<span class="money">$'._nf($diamonds['price_website'], 0).'</span>
							</div>
						</div>
					</div>
				</div>
			</div>';

			$make_array  = array(
				'0'	=> $make_html
			); 
			$data[] = $make_array;
        }

        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data // total data array
		);
	    echo json_encode($json_data);  // send data as json format
    }

	function fine_jewelry_carol_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 20;
			$offset = 0;
		}
        $where_diamonds	=  array('price_website >' => 0);
        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price_website) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price_website) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price_website) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}
		if(isset($_POST['caratWeightArr']) && !empty($_POST['caratWeightArr']) ){
            $wherein2 = $_POST['caratWeightArr'];
        }else{
			$wherein2 = array();
		}
		if(isset($_POST['stoneShapeArr']) && !empty($_POST['stoneShapeArr']) ){
            $wherein3 = $_POST['stoneShapeArr'];
        }else{
			$wherein3 = array();
		}
		if(isset($_POST['stoneSizeArr']) && !empty($_POST['stoneSizeArr']) ){
            $wherein4 = $_POST['stoneSizeArr'];
        }else{
			$wherein4 = array();
		}
		if(isset($_POST['subCategoryArr']) && !empty($_POST['subCategoryArr']) ){
            $wherein5 = $_POST['subCategoryArr'];
        }else{
			$wherein5 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('stock_real_number LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price_website';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price_website';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

		$get_toal_data = $this->Diamondmodel->countCarolfinejewelar($where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, 'dev_jewelries_new');
        $get_diamond_list = $this->Diamondmodel->getCarolfinejewelarData('dev_jewelries_new', $where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, $limit, $offset, $sort, $sortby);
		$img = '';
        foreach($get_diamond_list as $diamonds){
			if($diamonds['image1'] != "" && file_exists($diamonds['image1'])){
				$view1_shapeimage = "". SITE_URL ."resize.php/".$diamonds['image1']."?width=220&height=220&image=/". $diamonds['image1'] ."";
			}elseif($diamonds['image2'] != "" && file_exists($diamonds['image2'])){
				$view1_shapeimage = "". SITE_URL ."resize.php/".$diamonds['image2']."?width=220&height=220&image=/". $diamonds['image2'] ."";
			}elseif($diamonds['image3'] != "" && file_exists($diamonds['image3'])){
				$view1_shapeimage = "". SITE_URL ."resize.php/".$diamonds['image3']."?width=220&height=220&image=/". $diamonds['image3'] ."";
			}else{
				$view1_shapeimage	= "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
			}

			if($diamonds['image2'] != "" && file_exists($diamonds['image2'])){
				$view_shapeimage = "". SITE_URL ."resize.php/".$diamonds['image2']."?width=220&height=220&image=/". $diamonds['image2'] ."";
			}elseif($diamonds['image3'] != "" && file_exists($diamonds['image3'])){
				$view_shapeimage = "". SITE_URL ."resize.php/".$diamonds['image3']."?width=220&height=220&image=/". $diamonds['image3'] ."";
			}elseif($diamonds['image4'] != "" && file_exists($diamonds['image4'])){
				$view_shapeimage = "". SITE_URL ."resize.php/".$diamonds['image4']."?width=220&height=220&image=/". $diamonds['image4'] ."";
			}else{
				$view_shapeimage	= "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
			}

			if($diamonds['image3'] != "" && file_exists($diamonds['image3'])){
				$view_shapeimagepop = "". SITE_URL ."resize.php/".$diamonds['image3']."?width=220&height=220&image=/". $diamonds['image3'] ."";
			}elseif($diamonds['image4'] != "" && file_exists($diamonds['image4'])){
				$view_shapeimagepop = "". SITE_URL ."resize.php/".$diamonds['image4']."?width=220&height=220&image=/". $diamonds['image4'] ."";
			}elseif($diamonds['image5'] != "" && file_exists($diamonds['image5'])){
				$view_shapeimagepop = "". SITE_URL ."resize.php/".$diamonds['image5']."?width=220&height=220&image=/". $diamonds['image5'] ."";
			}else{
				$view_shapeimagepop	= "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
			}

			$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['stock_number'].')" onmouseout="showoverlayout('.$diamonds['stock_number'].')">
				<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['stock_number'].'" style="height: 394px;">
					<div class="thumbnail" id="thumbnail_'.$diamonds['stock_number'].'">
						<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
							<span class="ir218-snippet-stars">
								<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
							</span>
						</div>
						<span class="heart niwl" data-toggle="wishlist" data-product="'.$diamonds['stock_number'].'" data-remove-related="true">
							<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
						</span>
						<span></span>
						<div class="item-dis">
							<div class="gl-jCarouselLite2">
								<div class="custom-container widget nonCircular">
									<div class="mid">
										<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" class="clk_through top_lg pdp_url" data-image="'.$view1_shapeimage.'" data-side-image="'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Fine Jewelry">
											<span class="modal-product-superposition load-sync load-overlay load-base">
												<img alt="Fine Jewelry" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
												<img alt="Fine Jewelry" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" data-load="load-overlay">
											</span>
										</a>
									</div>
									<div class="thumbnail-list">
										<div class="carousel jCarouselLite">
											<ul>
												<li><a href="javascript:void(0)" class="active is_top_pic"><img alt="product thumbnail top image" data-big-img="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'"></a></li>
												<li><a href="javascript:void(0)" class="is_side_pic"><img alt="product thumbnail side image" class="lazyload loaded" data-big-img="'.$view_shapeimage.'" data-original="'.$view_shapeimage.'" src="'.$view_shapeimage.'" style=""></a></li>
												<li><a class="is_hand_pic" href="javascript:void(0)"><img style="width: 100%; height: 100%;" alt="product thumbnail hand image" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="'.$view_shapeimagepop.'" src="'.$view_shapeimagepop.'">
												</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="caption">
								<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" class="clk_through">
									<small class="firstline"></small>
									<div class="limit">
										<span class="h3 title1">'.$diamonds['item_title'].'</span>
										<small class="old_splite">Fine Jewelry <span class="metal">('.$diamonds['carat_weight'].')</span> </small>
									</div>
								</a>
								<span class="money">$'. number_format($diamonds['price_website'], 2).'</span>
							</div>
						</div>
					</div>
				</div>
			</div>';

			$make_array  = array(
				'0'	=> $make_html
			); 
			$data[] = $make_array;
        }

        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data // total data array
		);
	    echo json_encode($json_data);  // send data as json format
    }

	function fine_jewelry_oneil_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 20;
			$offset = 0;
		}
        $where_diamonds	=  array('price_website >' => 0);
        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price_website) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price_website) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price_website) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}
		if(isset($_POST['caratWeightArr']) && !empty($_POST['caratWeightArr']) ){
            $wherein2 = $_POST['caratWeightArr'];
        }else{
			$wherein2 = array();
		}
		if(isset($_POST['stoneShapeArr']) && !empty($_POST['stoneShapeArr']) ){
            $wherein3 = $_POST['stoneShapeArr'];
        }else{
			$wherein3 = array();
		}
		if(isset($_POST['stoneSizeArr']) && !empty($_POST['stoneSizeArr']) ){
            $wherein4 = $_POST['stoneSizeArr'];
        }else{
			$wherein4 = array();
		}
		if(isset($_POST['subCategoryArr']) && !empty($_POST['subCategoryArr']) ){
            $wherein5 = $_POST['subCategoryArr'];
        }else{
			$wherein5 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('stock_real_number LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price_website';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price_website';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

		$get_toal_data = $this->Diamondmodel->countOneiljewelar($where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, 'dev_jewelries_new');
        $get_diamond_list = $this->Diamondmodel->getOneiljewelarData('dev_jewelries_new', $where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, $limit, $offset, $sort, $sortby);
		$img = '';
        foreach($get_diamond_list as $diamonds){
			if(file_exists(str_replace("THUMBNAIL/","",$diamonds['image1']))){
				$view1_shapeimage = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image1'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image1']) ."";
			}elseif(file_exists(str_replace("THUMBNAIL/","",$diamonds['image2']))){
				$view1_shapeimage = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image2'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image2']) ."";
			}elseif(file_exists(str_replace("THUMBNAIL/","",$diamonds['image3']))){
				$view1_shapeimage = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image3'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image3']) ."";
			}else{
				$view1_shapeimage	= '';
			}

			if(file_exists(str_replace("THUMBNAIL/","",$diamonds['image2']))){
				$view_shapeimage = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image2'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image2']) ."";
			}elseif(file_exists(str_replace("THUMBNAIL/","",$diamonds['image3']))){
				$view_shapeimage = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image3'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image3']) ."";
			}elseif(file_exists(str_replace("THUMBNAIL/","",$diamonds['image4']))){
				$view_shapeimage = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image4'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image4']) ."";
			}else{
				$view_shapeimage	= '';
			}

			if(file_exists(str_replace("THUMBNAIL/","",$diamonds['image3']))){
				$view_shapeimagepop = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image3'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image3']) ."";
			}elseif(file_exists(str_replace("THUMBNAIL/","",$diamonds['image4']))){
				$view_shapeimagepop = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image4'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image4']) ."";
			}elseif(file_exists(str_replace("THUMBNAIL/","",$diamonds['image5']))){
				$view_shapeimagepop = "". SITE_URL ."resize.php/".str_replace("THUMBNAIL/","",$diamonds['image5'])."?width=220&height=220&image=/". str_replace("THUMBNAIL/","",$diamonds['image5']) ."";
			}else{
				$view_shapeimagepop	= '';
			}

			$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['stock_number'].')" onmouseout="showoverlayout('.$diamonds['stock_number'].')">
				<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['stock_number'].'" style="height: 394px;">
					<div class="thumbnail" id="thumbnail_'.$diamonds['stock_number'].'">
						<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
							<span class="ir218-snippet-stars">
								<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
							</span>
						</div>
						<span class="heart niwl" data-toggle="wishlist" data-product="'.$diamonds['stock_number'].'" data-remove-related="true">
							<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
						</span>
						<span></span>
						<div class="item-dis">
							<div class="gl-jCarouselLite3">
								<div class="custom-container widget nonCircular">
									<div class="mid">
										<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" class="clk_through top_lg pdp_url" data-image="'.$view1_shapeimage.'" data-side-image="'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Fine Jewelry">
											<span class="modal-product-superposition load-sync load-overlay load-base">
												<img alt="Fine Jewelry" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
												<img alt="Fine Jewelry" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" data-load="load-overlay">
											</span>
										</a>
									</div>
									<div class="thumbnail-list">
										<div class="carousel jCarouselLite">
											<ul>
												<li><a href="javascript:void(0)" class="active is_top_pic"><img alt="product thumbnail top image" data-big-img="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'"></a></li>
												<li><a href="javascript:void(0)" class="is_side_pic"><img alt="product thumbnail side image" class="lazyload loaded" data-big-img="'.$view_shapeimage.'" data-original="'.$view_shapeimage.'" src="'.$view_shapeimage.'" style=""></a></li>
												<li><a class="is_hand_pic" href="javascript:void(0)"><img style="width: 100%; height: 100%;" alt="product thumbnail hand image" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="'.$view_shapeimagepop.'" src="'.$view_shapeimagepop.'">
												</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="caption">
								<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" class="clk_through">
									<small class="firstline"></small>
									<div class="limit">
										<span class="h3 title1">'.$diamonds['item_title'].'</span>
										<small class="old_splite">Fine Jewelry <span class="metal">('.$diamonds['carat_weight'].')</span> </small>
									</div>
								</a>
								<span class="money">$'._nf($diamonds['price_website'], 2).'</span>
							</div>
						</div>
					</div>
				</div>
			</div>';

			$make_array  = array(
				'0'	=> $make_html
			); 
			$data[] = $make_array;
        }

        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data // total data array
		);
	    echo json_encode($json_data);  // send data as json format
    }

	function fine_jewelry_cannon_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 20;
			$offset = 0;
		}
        $where_diamonds	=  array('price_website >' => 0);
        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price_website) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price_website) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price_website) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}
		if(isset($_POST['caratWeightArr']) && !empty($_POST['caratWeightArr']) ){
            $wherein2 = $_POST['caratWeightArr'];
        }else{
			$wherein2 = array();
		}
		if(isset($_POST['stoneShapeArr']) && !empty($_POST['stoneShapeArr']) ){
            $wherein3 = $_POST['stoneShapeArr'];
        }else{
			$wherein3 = array();
		}
		if(isset($_POST['stoneSizeArr']) && !empty($_POST['stoneSizeArr']) ){
            $wherein4 = $_POST['stoneSizeArr'];
        }else{
			$wherein4 = array();
		}
		if(isset($_POST['subCategoryArr']) && !empty($_POST['subCategoryArr']) ){
            $wherein5 = $_POST['subCategoryArr'];
        }else{
			$wherein5 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('stock_real_number LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price_website';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price_website';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

		$get_toal_data = $this->Diamondmodel->countCannonfinejewelar($where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, 'dev_jewelries_new');
        $get_diamond_list = $this->Diamondmodel->getCannonfinejewelarData('dev_jewelries_new', $where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, $limit, $offset, $sort, $sortby);
		$img = '';
        foreach($get_diamond_list as $diamonds){
			if($diamonds['image1'] != ""){
				$view1_shapeimage = $diamonds['image1'];
			}elseif($diamonds['image2'] != ""){
				$view1_shapeimage = $diamonds['image2'];
			}elseif($diamonds['image3'] != ""){
				$view1_shapeimage = $diamonds['image3'];
			}else{
				$view1_shapeimage	= SITE_URL .'images/no_image.jpeg';
			}

			if($diamonds['image2'] != ""){
				$view_shapeimage = $diamonds['image2'];
			}elseif($diamonds['image3'] != ""){
				$view_shapeimage = $diamonds['image3'];
			}elseif($diamonds['image4'] != ""){
				$view_shapeimage = $diamonds['image4'];
			}else{
				$view_shapeimage	= SITE_URL .'images/no_image.jpeg';
			}
			
			if($diamonds['image3'] != ""){
				$view_shapeimagepop = $diamonds['image3'];
			}elseif($diamonds['image4'] != ""){
				$view_shapeimagepop = $diamonds['image4'];
			}elseif($diamonds['image5'] != ""){
				$view_shapeimagepop = $diamonds['image5'];
			}else{
				$view_shapeimagepop	= SITE_URL .'images/no_image.jpeg';
			}
			$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['stock_number'].')" onmouseout="showoverlayout('.$diamonds['stock_number'].')">
				<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['stock_number'].'" style="height: 394px;">
					<div class="thumbnail" id="thumbnail_'.$diamonds['stock_number'].'">
						<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
							<span class="ir218-snippet-stars">
								<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
							</span>
						</div>
						<span class="heart niwl" data-toggle="wishlist" data-product="'.$diamonds['stock_number'].'" data-remove-related="true">
							<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
						</span>
						<span></span>
						<div class="item-dis">
							<div class="gl-jCarouselLite4">
								<div class="custom-container widget nonCircular">
									<div class="mid">
										<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" class="clk_through top_lg pdp_url" data-image="'.$view1_shapeimage.'" data-side-image="'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Fine Jewelry">
											<span class="modal-product-superposition load-sync load-overlay load-base">
												<img alt="Fine Jewelry" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
												<img alt="Fine Jewelry" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'" data-load="load-overlay">
											</span>
										</a>
									</div>
									<div class="thumbnail-list">
										<div class="carousel jCarouselLite">
											<ul>
												<li><a href="javascript:void(0)" class="active is_top_pic"><img alt="product thumbnail top image" data-big-img="'.$view1_shapeimage.'" src="'.$view1_shapeimage.'"></a></li>
												<li><a href="javascript:void(0)" class="is_side_pic"><img alt="product thumbnail side image" class="lazyload loaded" data-big-img="'.$view_shapeimage.'" data-original="'.$view_shapeimage.'" src="'.$view_shapeimage.'" style=""></a></li>
												<li><a class="is_hand_pic" href="javascript:void(0)"><img style="width: 100%; height: 100%;" alt="product thumbnail hand image" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="'.$view_shapeimagepop.'" src="'.$view_shapeimagepop.'">
												</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="caption">
								<a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'" class="clk_through">
									<small class="firstline"></small>
									<div class="limit">
										<span class="h3 title1">'.$diamonds['item_title'].'</span>
										<small class="old_splite">Fine Jewelry <span class="metal">('.$diamonds['carat_weight'].')</span> </small>
									</div>
								</a>
								<span class="money">$'._nf($diamonds['price_website'], 2).'</span>
							</div>
						</div>
					</div>
				</div>
			</div>';

			$make_array  = array(
				'0'	=> $make_html
			); 
			$data[] = $make_array;
        }

        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data // total data array
		);
	    echo json_encode($json_data);  // send data as json format
	}

	function refine_search() {
		$data['title'] = "Shop Diamond Engagement Rings and More Styles | ". SITES_NAME ."";
		$data['page'] = 'search';
		$searchField = $this->input->get('search_field');
		$search_field = trim(urldecode($searchField));
		$data['searchField'] = $search_field;
		$data['getAllShaped'] = $this->getAllShaped();
		$data['getAllStyle'] = $this->getAllStyle($search_field);
		$output = $this->load->view('diamond/refine_search', $data, true);
        $this->output($output, $data, true);
		$this->output->cache(n);
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
				$resultrowb = $this->Catemodel->getSearchResultForDev_Index($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyindex);
				$totalCountb = count($resultrowb);
				if(!empty($resultrowb)){
					foreach($resultrowb as $rowb){
						if($rowb['is_lab_diamond'] == 1){
							$view_shapeimage	= $rowb['image_url'];
						}elseif($rowb['image_url'] != ''){
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
							<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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

				$resultrow1 = $this->Catemodel->countSearchResultForDev_Index($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
				$totalCount1 = count($resultrow1);
				$totalCount = $totalCount1;
			}elseif(!empty($style) && !in_array("Diamonds", $style) && !in_array("Bracelets", $style) && !in_array("Earrings", $style) && !in_array("Necklaces", $style) && !in_array("Wedding Bands", $style) && !in_array("Color Fashion", $style) && !in_array("Diamond Fashion", $style) && !in_array("Bridal Completes", $style) && !in_array("New Arrivals", $style) && in_array("Enagagement_rings", $style)){
				$resultrowd = $this->Catemodel->getSearchResultForEngagementRings($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyring);
				$totalCountd = count($resultrowd);
				if(!empty($resultrowd)){
					foreach($resultrowd as $rowd){
						if(!empty($rowd['image'])){
							$images = explode(";",$rowd['image']);
							if(isset($images[0]) && $images[0] != ''){
								$ringimage = $images[0];
							}elseif(isset($images[1]) && $images[1] != ''){
								$ringimage = $images[1];
							}elseif(isset($images[2]) && $images[2] != ''){
								$ringimage = $images[2];
							}elseif(isset($images[3]) && $images[3] != ''){
								$ringimage = $images[3];
							}
						}else{
							$ringimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
						}
						$offer_price = $rowd['price'];
						$ringName = !empty($rowd['description'])?$rowd['description']:$rowd['name'];
						$detaillinkd = SITE_URL . 'selection/engagement-rings-detail/'.$rowd['id'];
						$make_html = '<div class="product-block OnlyD">
							<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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

				$resultrow1 = $this->Catemodel->countSearchResultForEngagementRings($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
				$totalCount1 = count($resultrow1);
				$totalCount = $totalCount1;
			}elseif(!empty($style) && !in_array("Enagagement_rings", $style) && !in_array("Diamonds", $style) && !in_array("Wedding Bands", $style) && (in_array("Bracelets", $style) || in_array("Earrings", $style) || in_array("Necklaces", $style) || in_array("Color Fashion", $style) || in_array("Diamond Fashion", $style) || in_array("Bridal Completes", $style) || in_array("New Arrivals", $style))){
				$resultrowc = $this->Catemodel->getSearchResultForJewelries($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyjew);
				$totalCountc = count($resultrowc);
				if(!empty($resultrowc)){
					foreach($resultrowc as $rowc){
						if($rowc['image1'] != ""){
							$imgPath = $rowc['image1'];
						}elseif($rowc['image2'] != ""){
							$imgPath = $rowc['image2'];
						}elseif($rowc['image3'] != ""){
							$imgPath = $rowc['image3'];
						}elseif($rowc['image4'] != ""){
							$imgPath = $rowc['image4'];
						}elseif($rowc['image5'] != ""){
							$imgPath = $rowc['image5'];
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
						$proname = $rowc['name'];
						$detaillinkc = SITE_URL . 'collection/collection-detail/'.$rowc['stock_number'];
						$make_html = '<div class="product-block OnlyC">
							<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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

				$resultrows1 = $this->Catemodel->countSearchResultForJewelries($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
				$totalCounts1 = count($resultrows1);
				$totalCount = $totalCounts1;
			}elseif(!empty($style) && !in_array("Diamonds", $style) && !in_array("Bracelets", $style) && !in_array("Earrings", $style) && !in_array("Necklaces", $style) && !in_array("Color Fashion", $style) && !in_array("Diamond Fashion", $style) && !in_array("Bridal Completes", $style) && !in_array("New Arrivals", $style) && !in_array("Enagagement_rings", $style) && in_array("Wedding Bands", $style)){
				$resultrowa = $this->Catemodel->getSearchResultForDev_US($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$limit,$offset,$sortbyus);
				if(!empty($resultrowa)){
					foreach($resultrowa as $rowa){
						$sql = "SELECT ImagePath FROM images WHERE ItemNumber LIKE '".$rowa['name']."' LIMIT 0,1";
						$rsring = $this->db->query($sql);
						$imgrsult = $rsring->row();
						$imgurl = '';
						if($imgrsult->ImagePath != ""){
							$imgurl = $imgrsult->ImagePath;
						}else{
							$imgurl = SITE_URL ."img/no_image_found.jpg";
						}
						$offer_price = $rowa['priceRetail'];
						$detaillinka = SITE_URL . 'selection/wedding-bands-detail/'.$rowa['ring_id'];
						$make_htmlf = '<div class="product-block OnlyA">
							<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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
				$resultrow1 = $this->Catemodel->countSearchResultForDev_US($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape);
				$totalCount1 = count($resultrow1);
				$totalCount = $totalCount1;
			}else{
				if($search_field == 'ring' || $search_field == 'rings' || $search_field == 'engagement' || $search_field == 'engagement ring' || $search_field == 'engagement rings'){
					$searchfields = '';
					$resultrowd = $this->Catemodel->getSearchResultForEngagementRings($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyring);
					$totalCountd = count($resultrowd);
					if(!empty($resultrowd)){
						foreach($resultrowd as $rowd){
							if(!empty($rowd['image'])){
								$images = explode(";",$rowd['image']);
								if($images[0] != ""){
									$ringimage = $images[0];
								}elseif($images[1] != ""){
									$ringimage = $images[1];
								}elseif($images[2] != ""){
									$ringimage = $images[2];
								}elseif($images[3] != ""){
									$ringimage = $images[3];
								}elseif($images[4] != ""){
									$ringimage = $images[4];
								}else{
									$ringimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
								}
							}else{
								$ringimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
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
								<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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

					$resultrow1 = $this->Catemodel->countSearchResultForEngagementRings($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount1 = count($resultrow1);
					$totalCount = $totalCount1;
				}elseif($search_field == 'wedding' || $search_field == 'bands' || $search_field == 'band' || $search_field == 'wedding bands' || $search_field == 'Wedding Bands'){
					$searchfields = '';
					$resultrowa = $this->Catemodel->getSearchResultForDev_US($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$limit,$offset,$sortbyus);
					if(!empty($resultrowa)){
						foreach($resultrowa as $rowa){
							$sql = "SELECT ImagePath FROM images WHERE ItemNumber LIKE '".$rowa['name']."' LIMIT 0,1";
							$rsring = $this->db->query($sql);
							$imgrsult = $rsring->row();
							$imgurl = '';
							if($imgrsult->ImagePath != ""){
								$imgurl = $imgrsult->ImagePath;
							}else{
								$imgurl = SITE_URL ."img/no_image_found.jpg";
							}
							$offer_price = $rowa['priceRetail'];
							$detaillinka = SITE_URL . 'selection/wedding-bands-detail/'.$rowa['id'];
							$make_htmlf = '<div class="product-block OnlyA">
								<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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
					$resultrow1 = $this->Catemodel->countSearchResultForDev_US($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape);
					$totalCount1 = count($resultrow1);
					$totalCount = $totalCount1;
				}elseif($search_field == 'diamond' || $search_field == 'diamonds'){
					$searchfields = '';
					$resultrowb = $this->Catemodel->getSearchResultForDev_Index($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyindex);
					$totalCountb = count($resultrowb);
					if(!empty($resultrowb)){
						foreach($resultrowb as $rowb){
							if($rowb['is_lab_diamond'] == 1){
								$view_shapeimage	= $rowb['image_url'];
							}elseif($rowb['image_url'] != ''){
								$view_shapeimage	= $rowb['image_url'];
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
								<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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

					$resultrow1 = $this->Catemodel->countSearchResultForDev_Index($searchfields,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount1 = count($resultrow1);
					$totalCount = $totalCount1;
				}else{
					$resultrowd = $this->Catemodel->getSearchResultForEngagementRings($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyring);
					$totalCountd = count($resultrowd);
					if(!empty($resultrowd)){
						foreach($resultrowd as $rowd){
							if(!empty($rowd['image'])){
								$images = explode(";",$rowd['image']);
								if($images[0] != ""){
									$ringimage = $images[0];
								}elseif($images[1] != ""){
									$ringimage = $images[1];
								}elseif($images[2] != ""){
									$ringimage = $images[2];
								}elseif($images[3] != ""){
									$ringimage = $images[3];
								}elseif($images[4] != ""){
									$ringimage = $images[4];
								}else{
									$ringimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
								}
							}else{
								$ringimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
							}
							$offer_price = $rowd['price'];
							$ringName = !empty($rowd['description'])?$rowd['description']:$rowd['name'];
							$detaillinkd = SITE_URL . 'selection/engagement-rings-detail/'.$rowd['id'];
							$make_html = '<div class="product-block D">
								<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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
						$resultrowb = $this->Catemodel->getSearchResultForDev_Index($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyindex);
						$totalCountb = count($resultrowb);
						if(!empty($resultrowb)){
							foreach($resultrowb as $rowb){
								if($rowb['is_lab_diamond'] == 1){
									$view_shapeimage	= $rowb['image_url'];
								}elseif($rowb['image_url'] != ''){
									$view_shapeimage	= $rowb['image_url'];
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
									<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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
						$resultrowc = $this->Catemodel->getSearchResultForJewelries($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyjew);
						$totalCountc = count($resultrowc);
						if(!empty($resultrowc)){
							foreach($resultrowc as $rowc){
								if($rowc['image1'] != ""){
									$imgPath = $rowc['image1'];
								}elseif($rowc['image2'] != ""){
									$imgPath = $rowc['image2'];
								}elseif($rowc['image3'] != ""){
									$imgPath = $rowc['image3'];
								}elseif($rowc['image4'] != ""){
									$imgPath = $rowc['image4'];
								}elseif($rowc['image5'] != ""){
									$imgPath = $rowc['image5'];
								}else{
									$imgPath = SITE_URL ."img/no_image_found.jpg";
								}
								$proname = '#'.$rowc['name'];
								$detaillinkc = SITE_URL . 'collection/collection-detail/'.$rowc['stock_number'];
								$make_html = '<div class="product-block C">
									<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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
					$resultrow1 = $this->Catemodel->countSearchResultForEngagementRings($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount1 = count($resultrow1);
					$resultrow2 = $this->Catemodel->countSearchResultForJewelries($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount2 = count($resultrow2);
					$resultrow3 = $this->Catemodel->countSearchResultForDev_Index($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
					$totalCount3 = count($resultrow3);
					$totalCount = (!empty($totalCount1)?$totalCount1:0)+(!empty($totalCount2)?$totalCount2:0)+(!empty($totalCount3)?$totalCount3:0);
					
					if(empty($totalCount)){
						$resultrowz = $this->Catemodel->getSearchResultForDevIndex($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style,$limit,$offset,$sortbyindex);
						if(!empty($resultrowz)){
							foreach($resultrowz as $rowb){
								if($rowb['is_lab_diamond'] == 1){
									$view_shapeimage	= $rowb['image_url'];
								}elseif($rowb['image_url'] != ''){
									$view_shapeimage	= $rowb['image_url'];
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
									<span class="product-block__badge" style="display:none;"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
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
						$resultrowsz = $this->Catemodel->countSearchResultForDevIndex($search_field,$carat,$greaterThan_price,$lessThan_price,$stone_shape,$style);
						$totalCount = count($resultrowsz);
					}
				}
			}
		}

        $json_data = array(
			"sort"            => $_POST['sort_by'],
			"draw"            => intval($params['draw']),
			"recordsTotal"    => intval($totalCount),
			"recordsFiltered" => intval($totalCount),
			"data"            => $data
		);
	    echo json_encode($json_data);
	}

	function getAllShaped() {
		$resultshpa = $this->Catemodel->getshapeForDev_Index();
		$resultshpb = $this->Catemodel->getshapeForJewelries();
		$resultshpc = $this->Catemodel->getshapeForEngagementRings();
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
		$resultshpb = $this->Catemodel->getstyleForEngagementRings($search_field);
		$resultshpc = $this->Catemodel->getstyleForJewelries($search_field);
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

	function engagement_ring_settings($page_name='') {
        $data['diamond_page_name'] = 'engagement-ring-settings';
        $data['title'] = "Engagement Rings";

        $output = $this->load->view('diamond/engagement-ring-settings', $data, true);
        $this->output($output, $data, true);
		$this->output->cache(120);
    }

	function engagement_ring_details($page_name='') {
        $data['diamond_page_name'] = 'engagement-ring-details';
        $data['title'] = "Engagement Ring Detail";

        $output = $this->load->view('diamond/engagement-ring-details', $data, true);
        $this->output($output, $data, true);
		$this->output->cache(120);
    }

	function diamond_detail($lot, $add_option='', $setting_id='') {
        //$lot		= urldecode($lot);
        //$setting_id	= urldecode($setting_id);
        $data['lot'] 	= $lot;
        $data['addoption']  = $add_option;
        $data['settingsid'] = $setting_id;
        $data['suplied_stone_link'] = '';
        
        if( !empty($setting_id) ) {
            $rowrings = $this->Catemodel->getRingsDetailViaId($setting_id);
            if( !empty($rowrings['supplied_stones']) ) {
                $data['suplied_stone_link'] = SITE_URL . 'jewelry/build_three_supplied_stone_ring/'.$lot.'/'.$add_option.'/'.$setting_id;
            }            
        }
       
        $row_detail = $this->Diamondmodel->getDetailsByLot($lot);
		if(empty($row_detail)){
			redirect(base_url().'diamonds/diamonds-search');
		}
        $data['row_detail'] = $row_detail;
        $data['row_sdiamond'] = $this->Diamondmodel->getNewSimilarDiamonds($row_detail);
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
        $data['setting_ring_id']   = $this->session->userdata('ringID');
        $ring_cate_id   = $this->session->userdata('ring_cate_id');
		$ringrq_fields = $this->session->userdata('rqring_fields');
        if(isset($ringrq_fields['image_vurl']) && !empty($ringrq_fields['image_vurl'])) {
            $data['setting_image'] = $ringrq_fields['image_vurl'];
        } else {
            $data['setting_image'] = SITE_URL.'img/page_img/no_image.jpg';
        }
		if(isset($ringrq_fields['ring_price']) && !empty($ringrq_fields['ring_price']) ) {
            $data['setting_price'] = _nf($ringrq_fields['ring_price'], 2);
        } else {
            $data['setting_price'] = '0.00';
        }
        $hearts_collection = $this->session->userdata('hearts_collection');
        if(isset($hearts_collection) && !empty($hearts_collection) ) {
            $data['view_link'] = SITE_URL . 'heartdiamond/collection_ring_detail/'.$data['setting_ring_id'];
        } else {
            $data['view_link'] = SITE_URL . 'site/engagementRingDetail/'.$ring_cate_id.'/'.$data['setting_ring_id'];
        }
        if( $add_option == 'addtoring' ) {
            $this->session->set_userdata('build_ring', 'addtoring');
        }

		$query4 = $this->db->query("SELECT id,name,image,image_path,price,description,costar_id,overnight_id,dev_us_id,stuller_id FROM `dev_engagement_rings` WHERE price >= 1 ORDER BY RAND() LIMIT 3");
		$data['section3']  = $query4->result_array();

        $output = $this->load->view('diamond/viewdiamond_detail', $data, true);
        $this->output($output, $data);
		$this->output->cache(120);
    }

	function gemstone_detail($lot, $add_option='', $setting_id='') {
		$lot		= urldecode($lot);
		$setting_id	= urldecode($setting_id);
		$data['lot'] 	= $lot;
		$data['addoption']  = $add_option;
		$data['settingsid'] = $setting_id;
		$data['suplied_stone_link'] = '';
        if( !empty($setting_id) ) {
            $rowrings = $this->Catemodel->getRingsDetailViaId($setting_id);
            if( !empty($rowrings['supplied_stones']) ) {
                $data['suplied_stone_link'] = SITE_URL . 'jewelry/build_three_supplied_stone_ring/'.$lot.'/'.$add_option.'/'.$setting_id;
            }            
        }

        $row_detail = $this->Diamondmodel->getGemstoneDetailsByLot($lot);
		if(empty($row_detail)){
			redirect(base_url().'diamonds/gemstones-search');
		}
        $data['row_detail'] = $row_detail;
        $data['row_sdiamond'] = $this->Diamondmodel->getNewSimilarGemstones($row_detail);
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
        $data['setting_ring_id']   = $this->session->userdata('ringID');
        $ring_cate_id   = $this->session->userdata('ring_cate_id');
		$ringrq_fields = $this->session->userdata('rqring_fields');
        if(isset($ringrq_fields['image_vurl']) && !empty($ringrq_fields['image_vurl'])) {
            $data['setting_image'] = $ringrq_fields['image_vurl'];
        } else {
            $data['setting_image'] = SITE_URL.'img/page_img/no_image.jpg';
        }
		if(isset($ringrq_fields['ring_price']) && !empty($ringrq_fields['ring_price']) ) {
            $data['setting_price'] = _nf($ringrq_fields['ring_price'], 2);
        } else {
            $data['setting_price'] = '0.00';
        }
        $hearts_collection = $this->session->userdata('hearts_collection');
        if(isset($hearts_collection) && !empty($hearts_collection) ) {
            $data['view_link'] = SITE_URL . 'heartdiamond/collection_ring_detail/'.$data['setting_ring_id'];
        } else {
            $data['view_link'] = SITE_URL . 'site/engagementRingDetail/'.$ring_cate_id.'/'.$data['setting_ring_id'];
        }
        if( $add_option == 'addtoring' ) {
            $this->session->set_userdata('build_ring', 'addtoring');
        }

		$query4 = $this->db->query("SELECT id,name,image,image_path,price,description,costar_id,overnight_id,dev_us_id,stuller_id FROM `dev_engagement_rings` WHERE price >= 1 ORDER BY RAND() LIMIT 3");
		$data['section3']  = $query4->result_array();

        $output = $this->load->view('diamond/viewgemstone_detail', $data, true);
        $this->output($output, $data);
		$this->output->cache(120);
    }

	function deleteDuplicateentry() {
		exit;
		$sqls = "SELECT * FROM `dev_jewelries_new` WHERE `category` LIKE 'Wedding Bands'";
		$queryvar = $this->db->query($sqls);
		$resultVar = $queryvar->result_array();
		$maincatid = 0; $catid = 0;
		foreach($resultVar as $diamond){
			if($diamond['is_carol'] == 1){
				$maincatid = 63;
				$catid = 335;
			}else{
				$maincatid = 63;
				$catid = 336;
			}
			$isinsert = $this->db->insert('dev_us', array(
				'ezstatus' => '0',
				'main_catid' => $maincatid,
				'catid' => $catid,
				'name' => !empty($diamond['name'])?$diamond['name']:'',
				'style_group' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
				'metal_weight' => '',
				'stone_weight' => !empty($diamond['carat'])?$diamond['carat'].' CT.':'',
				'supplied_stones' => '',
				'additional_stones' => '',
				'top_width' => '',
				'bottom_width' => '',
				'top_height' => '',
				'bottom_height' => '',
				'ring_size' => !empty($diamond['ring_size'])?$diamond['ring_size']:'',
				'availblesize' => !empty($diamond['available_size'])?$diamond['available_size']:'',
				'measurements' => !empty($diamond['measurements'])?$diamond['measurements']:'',
				'product_id_set' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
				'metal_weight_bk' => '',
				'stone_weight_bk' => !empty($diamond['carat'])?$diamond['carat']:'',
				'supplied_stones_shape' => !empty($diamond['shape'])?$diamond['shape']:'',
				'product_name_id' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
				'found_diamond' => 'Y',
			));
			$isinsert = $this->db->insert('dev_us_prices', array(
				'product_id' => '0',
				'productId' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
				'matalType' => !empty($diamond['metal_type'])?$diamond['metal_type']:'',
				'ringSize' => !empty($diamond['ring_size'])?$diamond['ring_size']:'',
				'price' => !empty($diamond['price'])?$diamond['price']:'',
				'polishOn' => '1',
				'priceRetail' => !empty($diamond['price_website'])?$diamond['price_website']:'',
				'product_id_set' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
			));

			if (strpos($diamond['image1'], '.jpg') !== false) {
				$isinsert = $this->db->insert('images', array(
					'ItemNumber' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
					'ImagePath' => !empty($diamond['image1'])?$diamond['image1']:'',
				));
			}
			if (strpos($diamond['image2'], '.jpg') !== false) {
				$isinsert = $this->db->insert('images', array(
					'ItemNumber' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
					'ImagePath' => !empty($diamond['image2'])?$diamond['image2']:'',
				));
			}
			if (strpos($diamond['image3'], '.jpg') !== false) {
				$isinsert = $this->db->insert('images', array(
					'ItemNumber' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
					'ImagePath' => !empty($diamond['image3'])?$diamond['image3']:'',
				));
			}
			if (strpos($diamond['image4'], '.jpg') !== false) {
				$isinsert = $this->db->insert('images', array(
					'ItemNumber' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
					'ImagePath' => !empty($diamond['image4'])?$diamond['image4']:'',
				));
			}
			if (strpos($diamond['image5'], '.jpg') !== false) {
				$isinsert = $this->db->insert('images', array(
					'ItemNumber' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
					'ImagePath' => !empty($diamond['image5'])?$diamond['image5']:'',
				));
			}
			if (strpos($diamond['image6'], '.jpg') !== false) {
				$isinsert = $this->db->insert('images', array(
					'ItemNumber' => !empty($diamond['stock_real_number'])?$diamond['stock_real_number']:'',
					'ImagePath' => !empty($diamond['image6'])?$diamond['image6']:'',
				));
			}
		}
		echo 'FINISHED';
		exit;
	}

	function updatesdaimondsPrice() {
		exit;
		$getdiamonds =  $this->Diamondmodel->getallDaimonds('dev_jewelries_new');
		$newpricect = 0;
		foreach($getdiamonds as $diamond){
			$newpricect = $diamond->price/2;
			$update_query = 'UPDATE dev_jewelries_new SET `price_website` = "'. $newpricect .'" WHERE stock_number = "'. $diamond->stock_number .'"';
			$this->db->query($update_query);
		}
		echo 'FINISHED';
		exit;
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

		if(empty($search)){
			header('Location:'.SITE_URL.'diamonds/search/true');
		} else {
			return true;
		}
    }

	function viewCenterStone($ring_id=0) {
		$data['stones_list'] = $this->getCenterStoneList( $ring_id );
		$this->load->view('engagementringstrial/view_center_stone_list', $data);
    }

	function ViewDiamondResult($ring_id=0) {
		$data['stones_list'] = $this->getCenterStoneList( $ring_id );
		$data['row_detail'] = $data['stones_list'][0];

		$this->load->view('engagementringstrial/view_diamond_result_list', $data);
    }

	function getDiamondResultDetail($ring_id=0, $type='ring') {
		$data['stones_list'] = $this->getCenterStoneList( $ring_id );
		if( $type === 'diamond' ) {
			$lotid = urldecode($ring_id);
			$lot_id = str_replace('_slash_', '/', $lotid);

			$data['row_detail'] = $this->Diamondmodel->getDetailsByLot($lot_id);
		} else {
			$data['row_detail'] = $data['stones_list'][0];
		}        

		$this->load->view('engagementringstrial/view_diamond_result_detail', $data);
    }

	/* Get the ring diamond detail */
    function getDiamondListDetail($lot_id=0) {
        $lot_id = urldecode($lot_id);
        $lot_id = str_replace('_slash_', '/', $lot_id);
        $data['row_detail'] = $this->Diamondmodel->getDetailsByLot($lot_id);

        $this->load->view('engagementringstrial/ring_diamond_detail', $data);
    }

	function videos($page_name='') {
		$data = $this->getCommonData();
        $data['diamond_page_name'] = 'videos';
		$data['title'] = "Videos";

        $output = $this->load->view('diamond/engagement-videos', $data, true);
        $this->output($output, $data, true);
	}

	function engagement_videos_realtime($page_name='') {
		$params = $_REQUEST; $data = array();
        if(isset($params['start']) && isset($params['length'])){
			$limit 	= intval($params['start'])+$params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 10;
			$offset = 0;
		}

		$youtubeurl = 'https://www.googleapis.com/youtube/v3/search?part=id&channelId=UCYeXz9iE_lkICG2JqXTuiMw&maxResults='.$limit.'&order=date&key=AIzaSyDnw23D--GJ1VgCEYGuosC_FSGfyrg_1Pw';

		$curl = curl_init($youtubeurl);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$return = curl_exec($curl);
		curl_close($curl);
		$getlist = json_decode($return, true);
		$get_toal_data = $getlist['pageInfo']['totalResults']-1;

		$i=1;
		foreach($getlist['items'] as $video){
			if(!empty($video['id']['videoId'])){
				if($offset < $i){
					$response = $this->get_youtube_title($video['id']['videoId']);
					$make_html = '<div class="diamond_result_content"><div class="col-sm-6" style="padding:0px;"><iframe width="350" height="350" src="https://www.youtube.com/embed/'.$video['id']['videoId'].'" frameborder="0" allowfullscreen></iframe></div><div class="col-sm-6"><h4 style="text-align:center;">Make an Offer</h4><div  id="offerblock_'.$i.'"><form id="make_offer_'.$i.'"><div class="form-group"><input type="email" class="form-control" id="email_address_'.$i.'" name="email_address" placeholder="Email: " required="required"></div><div class="form-group"><input type="text" class="form-control" id="price_'.$i.'" name="price" placeholder="Offer Price:" required="required"></div><div class="form-group"><select class="form-control" id="color_'.$i.'" name="color" required="required"><option value="">Select Color</option><option value="d">D</option><option value="e">E</option><option value="f">F</option><option value="g">G</option><option value="h">H</option><option value="i">I</option><option value="j">J</option></select></div><div class="form-group"><select class="form-control" id="cut_'.$i.'" name="cut" required="required"><option value="">Select Cut</option><option value="Excellent">Excellent</option><option value="Very Good">Very Good</option><option value="Good">Good</option><option value="Fair">Fair</option></select></div><div class="form-group"><select class="form-control" id="clairty_'.$i.'" name="clairty" required="required"><option value="">Select Clairty</option><option value="IF">IF</option><option value="FL">FL</option><option value="VVS1">VVS1</option><option value="VVS2">VVS2</option><option value="VS1">VS1</option><option value="VS2">VS2</option><option value="SI">SI</option><option value="SI2">SI2</option><option value="I1">I1</option><option value="I2">I2</option><option value="I3">I3</option></select></div><div class="form-group"><textarea class="form-control" rows="3" id="message_'.$i.'" name="message" placeholder="Message:"></textarea></div><input type="hidden" id="video_id_'.$i.'" name="video_id" value="'.$video['id']['videoId'].'"><input type="hidden" id="video_name_'.$i.'" name="video_name" value="'.$response.'"><button type="button" class="btn btn-default" onclick="sendOffer('.$i.')">Send</button></form></div><div class="offer-message" id="viewmessage_'.$i.'"></div></div><div class="clear"></div>';

					$make_array  = array(
						'0'	=> $make_html
					); 
					$data[] = $make_array;
				}
				$i++;
			}
		}

		$json_data = array(
			"draw"				=> intval($params['draw']),
			"recordsTotal"		=> intval($get_toal_data),  
			"recordsFiltered"	=> intval($get_toal_data),
			"data"				=> $data
		);
	    echo json_encode($json_data);
    }

	function get_youtube_title($video_id){
		$html = 'https://www.googleapis.com/youtube/v3/videos?id='.$video_id.'&key=AIzaSyDnw23D--GJ1VgCEYGuosC_FSGfyrg_1Pw&part=snippet';
		$response = file_get_contents($html);
		$decoded = json_decode($response, true);
		foreach ($decoded['items'] as $items) {
			$title= $items['snippet']['title'];
			return $title;
		}
	}

	function get_diamond_shape_image($diamond_shape, $diamond_color, $default_shapeimage){    
        $where_shape		= array( 'diamondshape' => $diamond_shape);
        $get_diamond_shape	= $this->Diamondmodel->getdata_any_table_limit_order_where('dev_pictures_new', $where_shape, 1, 0, 'pic_id');

        if($diamond_color == 'White'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['White'], $default_shapeimage);
        }else if($diamond_color == 'Yellow'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Yellow'], $default_shapeimage);
        }else if($diamond_color == 'Purple'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Purple'], $default_shapeimage);
        }else if($diamond_color == 'Green'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Green'], $default_shapeimage);
        }else if($diamond_color == 'Orange'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Orange'], $default_shapeimage);
        }else if($diamond_color == 'Blue'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Blue'], $default_shapeimage);
        }else if($diamond_color == 'Black'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Black'], $default_shapeimage);
        }else if($diamond_color == 'Gray'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Gray'], $default_shapeimage);
        }else if($diamond_color == 'Pink'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Pink'], $default_shapeimage);
        }else if($diamond_color == 'Brown'){
            $view_shapeimage    = $this->checkShpapeImage_Controller($get_diamond_shape[0]['Brown'], $default_shapeimage);
        }else{
            $view_shapeimage    = $default_shapeimage;
        }

        return $view_shapeimage;
    }

	function checkShpapeImage_Controller($getV1, $default_shapeimage){
		if( isset($getV1) ){
			if (strpos($getV1, 'heartsanddiamonds') !== false) {
				$change_img_url = str_replace('heartsanddiamonds', 'diamondbayou', $getV1);
                $noShapeImge = $change_img_url;
            }else{
                $noShapeImge = SITE_URL.$getV1;
            }
        }else{
            $noShapeImge = $default_shapeimage;
        }
        return $noShapeImge;
    }

	function men_diamond_rings($page_name='') {
        $data = $this->getCommonData();
        if($page_name == ''){
            $data['diamond_page_name']	= 'men-diamond-rings';
        }else{
            $data['diamond_page_name']	= $page_name;
        }

        $data['title'] = "Men Diamond Rings";
        $output = $this->load->view('diamond/men_products', $data, true);
        $this->output($output, $data, true);
    }

	function men_diamond_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 32;
			$offset = 0;
		}
        $where_diamonds	=  array('product_price_off !=' => '','product_price_off >=' => 500,'product_category NOT LIKE' => 'Mens Sterling Silver Rings');
        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(product_price_off) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(product_price_off) <' => 999990);
			}else{
				$amount_max	=  array('ABS(product_price_off) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

        $wh_like = array();
		if(isset($_POST)){
			$i1 = 0;
			foreach($_POST as $key => $value){
			    if($key !='amount_max' && $key!='amount_min'){
    				$key1 = explode('M1_',$key);
    				$key2 = explode('M2_',$key);
    				if(!empty($key1[1]) && !empty($value) && empty($key2[1])){
						$where_diamonds =    $this->get_post_data_array_1($where_diamonds,$key);
    				}
    				if(!empty($key2[1]) && !empty($value)){
						$wh_like[$i1] = $value;
						$i1++;
			    	}
			    }
			}
		}

		$get_toal_data		=  $this->Diamondmodel->count_men_table($where_diamonds,$wh_like, 'itshot_products');
        $get_diamond_list	=  $this->Diamondmodel->getdata_men_table_limit_order_where('itshot_products', $where_diamonds,$wh_like, $limit, $offset, 'rand()');
        foreach($get_diamond_list as $diamonds){
            $more_imgs = ''; $view1_shapeimage = $diamonds['product_main_img'];
            if(!empty($diamonds['product_gallery_imges'])){
            	$gallery_imgs = explode("||",$diamonds['product_gallery_imges']);
            	$gal_id  = "'p_".$diamonds['product_sku']."'";
            	if(!empty($gallery_imgs)){
            		foreach($gallery_imgs as $gallery_img1){
						$org_img = explode('56x',$gallery_img1);
            			$gal_org1 = $org_img[0].$org_img[1];
            			$gal_org = "'".$gal_org1."'";
            			$more_imgs .= '<li><a href="javscript:void(0)" onclick="get_img('.$gal_id.','.$gal_org.')"><img src="'.$gal_org1.'" style="width:55px;height:55px;" alt="'.$diamonds['product_name'].'" /></li></a>';
            		}
					$view1_shapeimage = !empty($gallery_imgs[2])?$gallery_imgs[2]:(!empty($gallery_imgs[1])?$gallery_imgs[1]:$gallery_imgs[0]);
            	}else{
					$org_img = explode('56x',$diamonds['product_gallery_imges']);
					$gal_org1 = $org_img[0].$org_img[1];
					$gal_org = "'".$gal_org1."'";
            		$more_imgs .= '<li><a href="javscript:void(0)" onclick="get_img('.$gal_id.','.$gal_org.')"><img src="'.$gal_org1.'" style="width:55px;height:55px;" alt="'.$diamonds['product_name'].'" /></li></a>';
            	}
            }
            if($diamonds['item_chart'] != ''){ 
                $req_item = '';
                $rs_strins = explode('<td class="data">',$diamonds['item_chart']);
                $rs_strins_lab = explode('<th class="label">',$diamonds['item_chart']);
                if(!empty($rs_strins)){
                    $i1 = 0;
                    foreach($rs_strins as $rs_sting_1){
                        $rs_string_2 = explode('</th>',$rs_strins_lab[$i1]);
                        if(!empty($rs_sting_1) && $i1!=0){
							$rs_string_1 = explode('</td>',$rs_sting_1);
                            $req_item .= $this->get_single_item_name_table($rs_string_1[0],$rs_string_2[0]);
                        }
                        $i1++;
                    }
                }
            } 
            $offer_price = $diamonds['product_price_off'];

            $make_html = '<div class="diamond_result_content">
				<div class="col-sm-12 hover-jewelery-img-area">
					<a href="javascript:void(0);">
						<img src="'.str_replace("56x/","",$view1_shapeimage).'" alt="Mens Diamonds" style="width:180px;border:solid 1px #ECECEC;height:150px" />
						<img src="'.$diamonds['product_main_img'].'" alt="Engagement Ring" class="detl-img2" />
					</a>
					<div class="overlay-quick-view-show overlay-quick-view quickViewModal-'.$diamonds['id'].'">Quick View</div>
					<div class="overlay-quick-view-show overlay-details-view"><a href="'.base_url().'collection/collection_men_detail/'.$diamonds['id'].'">View Details</a></div>
					<div class="overlay-quick-view-show overlay-more-details-view" style="display:none;">
						<h4>'.$diamonds['product_name'].'</h4>
						<div class="hover-price">
							<div class="popup-prices">
								<p class="old-price-qv" style="margin-bottom:0px;line-height: 15px;">
									<span class="price-label-qv">Retail Price:</span>
									<span class="price-qv">$'.number_format($offer_price,2).'</span>
								</p>    
								<p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;">    
									<span class="price-label-qv">OUR PRICE:</span>
									<span class="new-price-qv">$'.number_format($diamonds['product_price_old'],2).'</span>
									<span class="special-price-label-qv">(Savings: 41.18%)</span>
								</p>
							</div>
						</div>    
						<b>Item Information</b>
						<table id="more-details-view" width="100%">
							<tr><td width="40%" style="color:#ff0000;font-weight:bold;border-right: 1px solid #c4c1bc !important;">Sku</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['product_sku'].'</td></tr>
							'.$this->get_single_item_name_table($diamonds['product_gender'], 'Type').$req_item.'
						</table>
					</div>
					<style>
					.viewModal-'.$diamonds['id'].' {
						position: absolute;
						z-index: 10000; /* 1 */
						top: 0;
						left: 0;
						visibility: hidden;
						width: 100%;
						height: 100%;
					}
					.viewModal-'.$diamonds['id'].'.is-visible {
						visibility: visible;
					}
					.viewModal-'.$diamonds['id'].'.is-visible .modal-overlay {
						opacity: 1;
						visibility: visible;
						transition-delay: 0s;
					}
					.viewModal-'.$diamonds['id'].'.is-visible .modal-transition {
						transform: translateY(0);
						opacity: 1;
					}
					#lightSlider'.$diamonds['id'].'{
						height:350px !important;
					}
					</style>
					<div class="viewModal-'.$diamonds['id'].'">
						<div class="modal-overlay modal-toggle"></div>
						<div class="modal-wrapper modal-transition">
							<div class="modal-header">
								<button class="modal-close modal-close-'.$diamonds['id'].' modal-toggle">X</button>
								<h4>'.$diamonds['product_name'].'</h4>
							</div>
							<div class="view-diamond-modal-body">
								<div class="view-diamond-modal-content">
									<div id="diamond-slider-box" class="col-sm-6" style="height: 450px;">
										<div id="diamond-slider-area">
											<ul id="lightSlider'.$diamonds['stock_number'].'">
												'.$this->get_diamond_image_slider_1($diamonds['product_main_img'],'p_'.$diamonds['product_sku']).$more_imgs.'
											</ul>
										</div>
									</div>
                                    <script type="text/javascript">
									$(document).ready(function() {
										$("#lightSlider'.$diamonds['id'].'").lightSlider({
											gallery: true,
                                            item: 1,
                                            loop:true,
                                            slideMargin: 0
										});
									});
									</script>
                                    <div class="col-sm-6 pull-right">
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Sku:</span>
                                            <span class="new-price-qv">'.$diamonds['product_sku'].'</span>
                                            <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                        </p>
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Retail Price:</span>
                                            <span class="new-price-qv">$'.number_format($offer_price,2).'</span>
                                        </p>
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Our Price:</span>
                                            <span class="new-price-qv">$'.number_format($diamonds['product_price_old'],2).'</span>
                                            <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                        </p>
                                        <form id="form_'.$diamonds['id'].'" action="'.SITE_URL.'jewelleries/addtoshoppingcart/" method="">
											<div class="col-sm-6">
												<label for="qty">QUANTITY:</label>
												<input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
												<div class="product-options-bottom">
													<div class="add-to-cart-1">
														<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="">
														<input type="hidden" name="3ez_price" value="$'.number_format($offer_price,2).'">
														<input type="hidden" name="5ez_price" value="$'.number_format($offer_price,2).'">
														<input type="hidden" name="main_price" value="$'.number_format($diamonds['product_price_old'],2).'">
														<input type="hidden" name="price" value="$'.number_format($diamonds['product_price_old'],2).'">
														<input type="hidden" name="vender" value="Yadegar Diamonds">
														<input type="hidden" name="url" value="'.$diamonds['product_main_img'].'">
														<input type="hidden" name="prodname" value="'.$diamonds['product_name'].'">
														<input type="hidden" name="diamnd_count" value="">
														<input type="hidden" name="ring_shape" value="">
														<input type="hidden" name="ring_carat" value="">
														<input type="hidden" name="prid" id="prid" value="'.$diamonds['product_sku'].'">
														<input type="hidden" name="stock_number" id="stock_number" value="'.$diamonds['product_sku'].'">
														<input type="hidden" name="txt_ringtype" value="generic_ring">
														<input type="hidden" name="txt_ringsize" value="">
														<input type="hidden" name="txt_metal" value="Sterling Silver">
														<input type="hidden" name="metals_weight" value="">
														<input type="hidden" name="vendors_name" value="Quality Gold">
														<input type="hidden" name="vendor_number" value="800.354.9833">
														<input type="hidden" name="table_name" value="dev_jewelries">
														<input type="hidden" name="item_title" value="'.$diamonds['product_name'].'">
														<input type="hidden" name="item_url" value="">
														<input type="hidden" name="product_type" value="Serpentine">
														<input type="hidden" name="txt_addoption" value="diamond_agency_jewelers_collection">
														<input type="hidden" name="center_stone_id" id="center_stone_id">
														<input type="hidden" name="txt_qty" value="1">
														<table><thead><tr>
														<th><input type="submit" class="add_to_cart_btn_new" value="Add To Cart"></th>
														<th><a href="javascript:void(0);"><input type="button" class="add_to_cart_btn_new" value="Add to wishlist"></a></th>
														<th><a href="javascript:void(0);"><input type="button" class="add_to_cart_btn_new" value="More Details"></a></th>
														<th><a href="mailto:"><input type="button" class="add_to_cart_btn_new" value="Email to a Friend"></a></th>
														</tr></thead></table>
													</div>
												</div>
											</div>
										</form>
										<div style="display: inline-block;width:100%;"><b>Item Information</b></div>
                                        <table id="more-details-view" width="100%" style="margin-bottom:30px;">
											<tr><td width="40%" style="color:#ff0000;font-weight:bold;border-right: 1px solid #c4c1bc !important;">Sku</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['product_sku'].'</td></tr>
                                            '.$this->get_single_item_name_table($diamonds['product_category'], 'Type').$req_item.'
                					    </table>
                                    </div>
								</div>
							</div>
						</div>
					</div>
					<script>
					$(document).ready(function(){
						$(".quickViewModal-'.$diamonds['id'].'").on("click", function(e) {
							e.preventDefault();
							$(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
						});
						$(".modal-close-'.$diamonds['id'].'").on("click", function(e) {
							e.preventDefault();
							$(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
						});
					});    
					</script>
				</div>
				<div class="col-sm-12" style="padding:0px 10px;text-align: center;">
					<h4>'.$diamonds['product_name'].'</h4>
					<div class="add_tocart_btn">
						<span class="main_item_price">$'.number_format($offer_price,2).'</span>
						<span><a href="'.base_url().'collection/collection_men_detail/'.$diamonds['id'].'" class="addToCartBtn">View Details</a></span>
					</div>
				</div>    
				<div class="col-sm-12">    
					<div class="col-sm-12"></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
					<!-- Modal -->
					<div id="quickViewModal'.$diamonds['product_sku'].'" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Modal Header</h4>
								</div>
								<div class="modal-body">
									<p>Some text in the modal.</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>'; 
			$make_array  = array(
				'0'	=> $make_html
			); 
			$data[] = $make_array;
		}

		$json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data
		);
	    echo json_encode($json_data);
	}

	function hip_hop_jewelry($page_name='') {
		$data = $this->getCommonData();
		if($page_name == ''){
			$data['diamond_page_name']	= 'Jewelry';
		}else{
			$data['diamond_page_name']	= $page_name;
        }

        $data['title'] = "Jewelry";
        $output = $this->load->view('diamond/women_products', $data, true);
        $this->output($output, $data, true);
    }

	function women_diamond_realtime($page_name='') {
        // initilize all variable
    	$params = $columns = $totalRecords = $data = array();
    
    	$params = $_REQUEST;
        
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 32;
			$offset = 0;
		}
		
        $where_diamonds	=  array('product_sub_category NOT LIKE' => 'Sterling Silver Chains','product_price >=' => 500);
        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(product_price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(product_price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(product_price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

		$wh_like = array();
		if(isset($_POST)){
		   $i1 = 0; 
			foreach($_POST as $key => $value){
			    if($key !='amount_max' && $key!='amount_min'){
    				$key1 = explode('M',$key);
    				$key2 = explode('_',$key1[1]);
    				if(!empty($key2[1]) && !empty($value) && $value!='Jesus Pendants'){
    					 $where_diamonds =    $this->get_post_data_array_3($where_diamonds,$key);
    				}
    				if(!empty($value) && $value=='Jesus Pendants'){
				    	 //$where_diamonds =    $this->get_post_data_array_2($where_diamonds,$key);
				    	 $wh_like[$i1] = 'jesus';
					     $i1++;
			    	}
			    }
			}
		}

		$get_toal_data =  $this->Diamondmodel->count_any_table_2($where_diamonds,$wh_like, 'jewelry_unlimited_products');
		$get_diamond_list =  $this->Diamondmodel->getdata_any_table_limit_order_where_2('jewelry_unlimited_products', $where_diamonds,$wh_like, $limit, $offset, 'rand()');
        foreach($get_diamond_list as $diamonds){
            if($diamonds['product_specification'] != ''){ 
                $rs_strins_labs = explode('<th class="col label" scope="row">',$diamonds['product_specification']);
                 if(!empty($rs_strins_labs)){
                     $i1 = 0;
                     $req_item = '';
                     foreach($rs_strins_labs as $rs_strins_lab_1){
                        $rs_string_2 = explode('</th>',$rs_strins_lab_1);
						$rs_sting_1 = explode('<td class="col data" data-th="'.$rs_string_2[0].'">',$diamonds['product_specification']);
                        if(!empty($rs_sting_1)){
                            $rs_string_1 = explode('</td>',$rs_sting_1[1]);
                            $req_out1 = $rs_string_1[0];
                            $req_item .= $this->get_single_item_name_table($req_out1,$rs_string_2[0]);
                        }
                        $i1++;
                    }
                }
            }

            $offer_price = $diamonds['product_price'];
            $more_imgs   = ''; $view1_shapeimage = $diamonds['product_main_img'];
            if(!empty($diamonds['product_gallery_imges'])){
				$gallery_imgs = explode("||",$diamonds['product_gallery_imges']);
				$gal_id  = "'".$diamonds['product_sku']."'";
				if(!empty($gallery_imgs)){
					foreach($gallery_imgs as $gallery_img1){
					    $gal_org = "'".$gallery_img1."'";
				    	$more_imgs .= '<li><a href="javscript:void(0)" onclick="get_img('.$gal_id.','.$gal_org.')"><img src="'.$gallery_img1.'" style="width:55px;height:55px;" alt="'.$diamonds['product_name'].'" /></li></a>';
					}
					$view1_shapeimage = $gallery_imgs[2];
				}else{
					$more_imgs .= '<li><a href="javscript:void(0)" onclick="get_img('.$gal_id.','.$gal_org.')"><img src="'.$diamonds['product_gallery_imges'].'" style="width:55px;height:55px;" alt="'.$diamonds['product_name'].'" /></li></a>';
				}
			}

            $make_html	= '<div class="diamond_result_content">
				<div class="col-sm-12 hover-jewelery-img-area">
					<a href="javascript:void(0);">
						<img src="'.$view1_shapeimage.'" alt="Mens Diamonds" style="width:180px;border:solid 1px #ECECEC;height:150px" />
						<img src="'.$diamonds['product_main_img'].'" alt="Engagement Ring" class="detl-img2" />
					</a>
					<div class="overlay-quick-view-show overlay-quick-view quickViewModal-'.$diamonds['id'].'">Quick View</div>
					<div class="overlay-quick-view-show overlay-details-view"><a href="'.base_url().'collection/collection_women_detail/'.$diamonds['id'].'">View Details</a></div>
					<div class="overlay-quick-view-show overlay-more-details-view" style="display:none;">
						<h4>'.$diamonds['product_name'].'</h4>
						<div class="hover-price">
							<div class="popup-prices">
								<p class="old-price-qv" style="margin-bottom:0px;line-height: 15px;">
									<span class="price-label-qv">Retail Price:</span>
									<span class="price-qv">$'.number_format($offer_price,2).'</span>
								</p> 
							</div>
						</div>    
						<b>Item Information</b>
						<table id="more-details-view" width="100%">
							<tr><td width="40%" style="color:#ff0000;font-weight:bold;border-right: 1px solid #c4c1bc !important;">Sku</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['product_sku'].'</td></tr>
							'.$this->get_single_item_name_table($diamonds['product_sub_category'], 'Type').'
							'.$this->get_single_item_name_table($diamonds['product_brand'], 'Brand').'
							'.$this->get_single_item_name_table($diamonds['product_gender'], 'Gender').$req_item.'
						</table>
					</div>
					<style>
					.viewModal-'.$diamonds['id'].' {
						position: absolute;
						z-index: 10000;
						top: 0;
						left: 0;
						visibility: hidden;
						width: 100%;
						height: 100%;
					}
					.viewModal-'.$diamonds['id'].'.is-visible {
						visibility: visible;
					}
					.viewModal-'.$diamonds['id'].'.is-visible .modal-overlay {
					  opacity: 1;
					  visibility: visible;
					  transition-delay: 0s;
					}
					.viewModal-'.$diamonds['id'].'.is-visible .modal-transition {
					  transform: translateY(0);
					  opacity: 1;
					}
					#lightSlider'.$diamonds['id'].'{
						height:350px !important;
					}
                    </style>
					<div class="viewModal-'.$diamonds['id'].'">
						<div class="modal-overlay modal-toggle"></div>
						<div class="modal-wrapper modal-transition">
							<div class="modal-header">
								<button class="modal-close modal-close-'.$diamonds['id'].' modal-toggle">X</button>
								<h4>'.$diamonds['product_name'].'</h4>
							</div>
							<div class="view-diamond-modal-body">
                                <div class="view-diamond-modal-content">
                                    <div id="diamond-slider-box" class="col-sm-6" style="height: 450px;">
                                        <div id="diamond-slider-area">
                                            <ul id="lightSlider'.$diamonds['product_sku'].'">
                                                '.$this->get_diamond_image_slider_1($diamonds['product_main_img'],$diamonds['product_sku']).$more_imgs.'
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                      $(document).ready(function() {
                                        $("#lightSlider'.$diamonds['id'].'").lightSlider({
                                            gallery: true,
                                            item: 1,
                                            loop:true,
                                            slideMargin: 0
                                        });
                                      });
                                    </script>
                                    
                                    <div class="col-sm-6 pull-right">
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Sku:</span>
                                            <span class="new-price-qv">'.$diamonds['product_sku'].'</span>
                                            <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                        </p>
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Retail Price:</span>
                                            <span class="new-price-qv">$'.number_format($offer_price,2).'</span>
                                        </p>
                                        <form id="form_'.$diamonds['id'].'" action="'.SITE_URL.'jewelleries/addtoshoppingcart/" method="">
                                            <div class="col-sm-6">
                                              <label for="qty">QUANTITY:</label>
                                              <input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
                                              <div class="product-options-bottom">
                                                <div class="add-to-cart-1">
                                                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="">
                                                    <input type="hidden" name="3ez_price" value="$'.number_format($offer_price,2).'">
                                                    <input type="hidden" name="5ez_price" value="$'.number_format($offer_price,2).'">
                                                    <input type="hidden" name="main_price" value="$'.number_format($offer_price,2).'">
                                                    <input type="hidden" name="price" value="$'.number_format($diamonds['product_price'],2).'">
                                                    <input type="hidden" name="vender" value="Yadegar Diamonds">
                                                    <input type="hidden" name="url" value="'.$diamonds['product_main_img'].'">
                                                    <input type="hidden" name="prodname" value="'.$diamonds['product_name'].'">
                                                    <input type="hidden" name="diamnd_count" value="">
                                                    <input type="hidden" name="ring_shape" value="">
                                                    <input type="hidden" name="ring_carat" value="">
                                                    <input type="hidden" name="prid" id="prid" value="'.$diamonds['sku'].'">
                                                    <input type="hidden" name="stock_number" id="stock_number" value="'.$diamonds['product_sku'].'">
                                                    <input type="hidden" name="txt_ringtype" value="generic_ring">
                                                    <input type="hidden" name="txt_ringsize" value="">
                                                    <input type="hidden" name="txt_metal" value="Sterling Silver">
                                                    <input type="hidden" name="metals_weight" value="">
                                                    <input type="hidden" name="vendors_name" value="Quality Gold">
                                                    <input type="hidden" name="vendor_number" value="800.354.9833">
                                                    <input type="hidden" name="table_name" value="dev_jewelries">
                                                    <input type="hidden" name="item_title" value="'.$diamonds['product_name'].'">
                                                    <input type="hidden" name="item_url" value="">
                                                    <input type="hidden" name="product_type" value="Serpentine">
                                                    <input type="hidden" name="txt_addoption" value="diamond_agency_jewelers_collection">
                                                    <input type="hidden" name="center_stone_id" id="center_stone_id">
                                                    <input type="hidden" name="txt_qty" value="1">
                                                    <table><thead><tr>
                                                    <th><input type="submit" class="add_to_cart_btn_new" value="Add To Cart"></th>
                                                    <th><a href="javascript:void(0);"><input type="button" class="add_to_cart_btn_new" value="Add to wishlist"></a></th>
                                                    <th><a href="javascript:void(0);"><input type="button" class="add_to_cart_btn_new" value="More Details"></a></th>
                                                    <th><a href="mailto:"><input type="button" class="add_to_cart_btn_new" value="Email to a Friend"></a></th>
                                                    </tr></thead></table>
                                                </div>
											</div>
										</div>
									</form>
									<div style="display: inline-block;width:100%;"><b>Item Information</b></div>
                                        <table id="more-details-view" width="100%" style="margin-bottom:30px;">
											<tr><td width="40%" style="color:#ff0000;font-weight:bold;border-right: 1px solid #c4c1bc !important;">Sku</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['product_sku'].'</td></tr>
                                            '.$this->get_single_item_name_table($diamonds['product_category'], 'Type').$req_item.'
										</table>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<script>
					$(document).ready(function(){
						$(".quickViewModal-'.$diamonds['id'].'").on("click", function(e) {
						  e.preventDefault();
						  $(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
						});
						
						$(".modal-close-'.$diamonds['id'].'").on("click", function(e) {
						  e.preventDefault();
						  $(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
						});
					});
					</script>
				</div>
                <div class="col-sm-12" style="padding:0px 10px;text-align: center;">
					<h4>'.$diamonds['product_name'].'</h4>
					<div class="add_tocart_btn">
						<span class="main_item_price">$'.number_format($offer_price,2).'</span>
						<span><a href="'.base_url().'collection/collection_women_detail/'.$diamonds['id'].'" class="addToCartBtn">View Details</a></span>
					</div>
				</div>    
				<div class="col-sm-12">    
					<div class="col-sm-12">
						'.$this->get_single_item_name($diamonds['sku'], 'Sku').'
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<!-- Modal -->
				<div id="quickViewModal'.$diamonds['sku'].'" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Modal Header</h4>
							</div>
							<div class="modal-body">
								<p>Some text in the modal.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>'; 
			$make_array  = array(
				'0'	=> $make_html
			); 

			$data[] = $make_array;	
        }

        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data // total data array
		);

	    echo json_encode($json_data);  // send data as json format
    }

	function pre_owned_luxury_diamond_timepieces($page_name='') {
        $data = $this->getCommonData();
        if($page_name == ''){
            $data['diamond_page_name']          = 'Watches';
        }else{
            $data['diamond_page_name']          = $page_name;
        }

        $data['title'] = "Watches";
        $output = $this->load->view('diamond/watch_products', $data, true);
        $this->output($output, $data, true);
    }

    function watch_diamond_realtime($page_name='') {
        // initilize all variable
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;

        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 10;
			$offset = 0;
		}

        $where_diamonds =  array('product_category' => 'Watches','product_price >=' => 0);
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(product_price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(product_price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(product_price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

		if(isset($_POST)){
			foreach($_POST as $key => $value){
			    if($key !='amount_max' && $key!='amount_min'){
    				$key1 = explode('M',$key);
    				$key2 = explode('_',$key1[1]);
    				if(!empty($key2[1]) && !empty($value)){
    					 $where_diamonds =    $this->get_post_data_array_3($where_diamonds,$key);
    				}
			    }
			}
		}
        $get_toal_data		=  $this->Diamondmodel->count_any_table($where_diamonds, 'mall_elady_products');
        $get_diamond_list	=  $this->Diamondmodel->getdata_any_table_limit_order_where('mall_elady_products', $where_diamonds, $limit, $offset, 'product_price');
        foreach($get_diamond_list as $diamonds){
            $more_imgs   = '';
            if(!empty($diamonds['product_gallery_imges'])){
    			$gallery_imgs = explode(",",$diamonds['product_gallery_imges']);
    			$gal_id  = "'".$diamonds['sku']."'";
    			if(!empty($gallery_imgs)){
    				foreach($gallery_imgs as $gallery_img1){
    				    $gal_org = "'".$gallery_img1."'";
    			    	$more_imgs .= '<li><a href="javscript:void(0)" onclick="get_img('.$gal_id.','.$gal_org.')"><img src="'.$gallery_img1.'" style="width:55px;height:55px;" alt="'.$diamonds['product_name'].'" /></li></a>';
    				}
    			}
    			else{
    			    $gal_org = "'".$diamonds['product_gallery_imges']."'";
    				$more_imgs .= '<li><a href="javscript:void(0)" onclick="get_img('.$gal_id.','.$gal_org.')"><img src="'.$diamonds['product_gallery_imges'].'" style="width:55px;height:55px;" alt="'.$diamonds['product_name'].'" /></li></a>';
    		    }
    		 }
    		 $req_item = '';
                if($diamonds['information'] != ''){ 
                	$rs_strins_labs = explode('<td class="y">',$diamonds['information']);
                	 if(!empty($rs_strins_labs)){
                		 $i1 = 0;
                		 foreach($rs_strins_labs as $rs_strins_lab_1){
                			$rs_string_2 = explode('</td>',$rs_strins_lab_1);
                			$rs_sting_1 = explode('<td class="y">'.$rs_string_2[0].'</td>        <td class="x" height="30">',$diamonds['information']);
                			if(!empty($rs_sting_1)){
                				$rs_string_1 = explode('</td>',$rs_sting_1[1]);
                				$req_out1 = $rs_string_1[0];
                				$req_item .= $this->get_single_item_name_table($req_out1,$rs_string_2[0]);
                			}
                			$i1++;
                		}
                	}
                }
                
                if($diamonds['additional_info'] != ''){ 
                	$rs_strins_labs = explode('<td class="y">',$diamonds['additional_info']);
                	 if(!empty($rs_strins_labs11)){
                		 $i1 = 0;
                		 foreach($rs_strins_labs11 as $rs_strins_lab_12){
                			$rs_string_21 = explode('</td>',$rs_strins_lab_12);
                			$rs_sting_11 = explode('<td class="y">'.$rs_string_21[0].'</td>        <td class="x" height="30">',$diamonds['additional_info']);
                			if(!empty($rs_sting_11)){
                				$rs_string_1 = explode('</td>',$rs_sting_11[1]);
                				$req_out1 = $rs_string_11[0];
                				$req_item .= $this->get_single_item_name_table($req_out1,$rs_string_21[0]);
                			}
                			$i1++;
                		}
                	}
                }
            $offer_price = $diamonds['product_price'];
            
            $make_html	= '
				<div class="diamond_result_content">
					<div class="col-sm-5 hover-jewelery-img-area" style="padding: 0px 10px 10px 15px;">
					    <a href="javascript:void(0);">
					    <img src="'.$diamonds['product_main_img'].'" alt="Mens Diamonds" style="width:290px;border:solid 1px #ECECEC;" />
					    </a>
					    <div class="overlay-quick-view-show overlay-quick-view quickViewModal-'.$diamonds['id'].'">Quick View</div>
					    <div class="overlay-quick-view-show overlay-details-view"><a href="'.base_url().'collection/collection_watch_detail/'.$diamonds['id'].'">View Details</a></div>
					    <div class="overlay-quick-view-show overlay-more-details-view">
					        <h4>'.$diamonds['product_name'].'</h4>
					        <div class="hover-price">
                                <div class="popup-prices">
                                    <p class="old-price-qv" style="margin-bottom:0px;line-height: 15px;">
                                        <span class="price-label-qv">Retail Price:</span>
                                        <span class="price-qv">'.$offer_price.'</span>
                                    </p> 
                                </div>
                            </div>    
                            <b>Item Information</b>
    					    <table id="more-details-view" width="100%">
    					        <tr><td width="40%" style="color:#ff0000;font-weight:bold;
            border-right: 1px solid #c4c1bc !important;">Sku</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['sku'].'</td></tr>
                                '.$this->get_single_item_name_table($diamonds['product_sub_category'], 'Type').$req_item.'
    					    </table>
					    </div>
					    
					    <style>
					    /**
                         * Modals ($modals)
                         */
                        .viewModal-'.$diamonds['id'].' {
                            position: absolute;
                            z-index: 10000; /* 1 */
                            top: 0;
                            left: 0;
                            visibility: hidden;
                            width: 100%;
                            height: 100%;
                        }
                        .viewModal-'.$diamonds['id'].'.is-visible {
                            visibility: visible;
                        }
                        .viewModal-'.$diamonds['id'].'.is-visible .modal-overlay {
                          opacity: 1;
                          visibility: visible;
                          transition-delay: 0s;
                        }
                        .viewModal-'.$diamonds['id'].'.is-visible .modal-transition {
                          transform: translateY(0);
                          opacity: 1;
                        }
                        #lightSlider'.$diamonds['id'].'{
                            height:350px !important;
                        }
                    </style>
                    
                        <div class="viewModal-'.$diamonds['id'].'">
                            <div class="modal-overlay modal-toggle"></div>
                            <div class="modal-wrapper modal-transition">
                              <div class="modal-header">
                                <button class="modal-close modal-close-'.$diamonds['id'].' modal-toggle">X</button>
                                <h4>'.$diamonds['product_name'].'</h4>
                              </div>
                              
                              <div class="view-diamond-modal-body">
                                <div class="view-diamond-modal-content">
                                    
                                    <div id="diamond-slider-box" class="col-sm-6" style="height: 450px;">
                                        <div id="diamond-slider-area">
                                            <ul id="lightSlider'.$diamonds['sku'].'">
                                                '.$this->get_diamond_image_slider($diamonds['product_main_img'],$diamonds['sku']).$more_imgs.'
                                            </ul>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                      $(document).ready(function() {
                                        $("#lightSlider'.$diamonds['id'].'").lightSlider({
                                            gallery: true,
                                            item: 1,
                                            loop:true,
                                            slideMargin: 0
                                        });
                                      });
                                    </script>
                                    
                                    <div class="col-sm-6 pull-right">
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Sku:</span>
                                            <span class="new-price-qv">'.$diamonds['product_sku'].'</span>
                                            <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                        </p>
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Retail Price:</span>
                                            <span class="new-price-qv">'.$offer_price.'</span>
                                        </p>
                                        <form id="form_'.$diamonds['id'].'" action="'.SITE_URL.'jewelleries/addtoshoppingcart/" method="">
                                            <div class="col-sm-6">
                                              <label for="qty">QUANTITY:</label>
                                              <input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
                                              <div class="product-options-bottom">
                                                <div class="add-to-cart-1">
                                                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="">
                                                    <input type="hidden" name="3ez_price" value="'.$offer_price.'">
                                                    <input type="hidden" name="5ez_price" value="'.$offer_price.'">
                                                    <input type="hidden" name="main_price" value="'.$offer_price.'">
                                                    <input type="hidden" name="price" value="'.$diamonds['product_price'].'">
                                                    <input type="hidden" name="vender" value="Yadegar Diamonds">
                                                    <input type="hidden" name="url" value="'.$diamonds['product_main_img'].'">
                                                    <input type="hidden" name="prodname" value="'.$diamonds['product_name'].'">
                                                    <input type="hidden" name="diamnd_count" value="">
                                                    <input type="hidden" name="ring_shape" value="">
                                                    <input type="hidden" name="ring_carat" value="">
                                                    <input type="hidden" name="prid" id="prid" value="'.$diamonds['sku'].'">
                                                    <input type="hidden" name="stock_number" id="stock_number" value="'.$diamonds['sku'].'">
                                                    <input type="hidden" name="txt_ringtype" value="generic_ring">
                                                    <input type="hidden" name="txt_ringsize" value="">
                                                    <input type="hidden" name="txt_metal" value="Sterling Silver">
                                                    <input type="hidden" name="metals_weight" value="">
                                                    
                                                    <input type="hidden" name="vendors_name" value="Quality Gold">
                                                    <input type="hidden" name="vendor_number" value="800.354.9833">
                                                    <input type="hidden" name="table_name" value="dev_jewelries">
                                                    <input type="hidden" name="item_title" value="'.$diamonds['product_name'].'">
                                                    <input type="hidden" name="item_url" value="">
                                                    <input type="hidden" name="product_type" value="Serpentine">
                                                    
                                                    <input type="hidden" name="txt_addoption" value="diamond_agency_jewelers_collection">
                                                    <input type="hidden" name="center_stone_id" id="center_stone_id">
                                                    <input type="hidden" name="txt_qty" value="1">
                                                    
                                                    <table><tr>
                                                    <td><input type="submit" class="add_to_cart_btn_new" value="Add To Cart"></td>
                                                    <td><a href="javascript:void(0);"><input type="button" class="add_to_cart_btn_new" value="Add to wishlist"></a></td>
                                                    <td><a href="javascript:void(0);"><input type="button" class="add_to_cart_btn_new" value="More Details"></a></td>
                                                    <td><a href="mailto:"><input type="button" class="add_to_cart_btn_new" value="Email to a Friend"></a></td>
                                                    <tr></table>
                                                              
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        
                                        <div style="display: inline-block;width:100%;"><b>Item Information</b></div>
                                        <table id="more-details-view" width="100%" style="margin-bottom:30px;">
                					        <tr><td width="40%" style="color:#ff0000;font-weight:bold;
                        border-right: 1px solid #c4c1bc !important;">Sku</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['product_sku'].'</td></tr>
                                            '.$this->get_single_item_name_table($diamonds['product_category'], 'Type').$req_item.'
                					    </table>
                                        
                                    </div>
                                    
                                </div>
                              </div>
                            </div>
                        </div>
                      
					    <script>
					        $(document).ready(function(){
    					        $(".quickViewModal-'.$diamonds['id'].'").on("click", function(e) {
                                  e.preventDefault();
                                  $(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
                                });
                                
                                $(".modal-close-'.$diamonds['id'].'").on("click", function(e) {
                                  e.preventDefault();
                                  $(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
                                });
					        });    
					    </script>
					    
					</div>
                    <div class="col-sm-7 pull-right">
                        <h4>'.$diamonds['product_name'].'</h4>
                        <div class="add_tocart_btn text-right">
                            <span class="main_item_price">'.$offer_price.'</span>
                            <span><a href="'.base_url().'collection/collection_watch_detail/'.$diamonds['id'].'" class="addToCartBtn">View Details</a></span>
                        </div>
                        
                        './*$this->get_single_item_name($diamonds['sku'], 'Sku').'
                        '.$this->get_single_item_name($diamonds['product_category'], 'Category').'
                        '.$this->get_single_item_name($diamonds['product_sub_category'], 'Sub Category').*/'
                    </div>    
                    
                    <div class="col-sm-12">    
                        <div class="col-sm-12">
                            '/*.$this->get_single_item_name($diamonds['sku'], 'Sku')*/.'
                        </div>
                                        
                        <div class="clear"></div>
                    </div>
                        <div class="clear"></div>
                        <!-- Modal -->
                        <div id="quickViewModal'.$diamonds['sku'].'" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                              </div>
                              <div class="modal-body">
                                <p>Some text in the modal.</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
				</div>
					'; 
					
				$make_array  = array(
						'0'	=> $make_html
					); 

		        $data[] = $make_array;	
            
        }
        
        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data // total data array
			);

	    echo json_encode($json_data);  // send data as json format
	
        
    }

	function pre_owned_luxury_bag_diamond($page_name='') {
        $data = $this->getCommonData();
        if($page_name == ''){
            $data['diamond_page_name']          = 'Bags';
        }else{
            $data['diamond_page_name']          = $page_name;
        }

        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 10;
			$offset = 0;
		}
        $where_diamonds				        =  array();
		$get_diamond_list			        =  $this->Diamondmodel->getdata_any_table_limit_order_where('mall_elady_products', $where_diamonds, $limit, $offset, 'created_on');

        $data['title'] = "Bags";
        $output = $this->load->view('diamond/bag_products', $data, true);
        $this->output($output, $data, true);
        
    }

    function bag_diamond_realtime($page_name='') {
        // initilize all variable
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 10;
			$offset = 0;
		}

        $where_diamonds	=  array('product_category' => 'Bags','product_price >=' => 0);
        if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(product_price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(product_price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(product_price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }
		if(isset($_POST)){
			foreach($_POST as $key => $value){
			    if($key !='amount_max' && $key!='amount_min'){
    				$key1 = explode('M',$key);
    				$key2 = explode('_',$key1[1]);
    				if(!empty($key1[1]) && !empty($value)){
    					 $where_diamonds =    $this->get_post_data_array_3($where_diamonds,$key);
    				}
			    }
			}
		}
        $get_toal_data		=  $this->Diamondmodel->count_any_table($where_diamonds, 'mall_elady_products');
        $get_diamond_list	=  $this->Diamondmodel->getdata_any_table_limit_order_where('mall_elady_products', $where_diamonds, $limit, $offset, 'product_price');
        foreach($get_diamond_list as $diamonds){
            $more_imgs   = '';
            if(!empty($diamonds['product_gallery_imges'])){
    			$gallery_imgs = explode(",",$diamonds['product_gallery_imges']);
    			$gal_id  = "'".$diamonds['sku']."'";
    			if(!empty($gallery_imgs)){
    				foreach($gallery_imgs as $gallery_img1){
    				    $gal_org = "'".$gallery_img1."'";
    			    	$more_imgs .= '<li><a href="javscript:void(0)" onclick="get_img('.$gal_id.','.$gal_org.')"><img src="'.$gallery_img1.'" style="width:55px;height:55px;" alt="'.$diamonds['product_name'].'" /></li></a>';
    				}
    			}
    			else{
    				$more_imgs .= '<li><a href="javscript:void(0)" onclick="get_img('.$gal_id.','.$gal_org.')"><img src="'.$diamonds['product_gallery_imges'].'" style="width:55px;height:55px;" alt="'.$diamonds['product_name'].'" /></li></a>';
    		    }
    		 }
    		 $req_item = '';
                if($diamonds['information'] != ''){ 
                	$rs_strins_labs = explode('<td class="y">',$diamonds['information']);
                	 if(!empty($rs_strins_labs)){
                		 $i1 = 0;
                		 foreach($rs_strins_labs as $rs_strins_lab_1){
                			$rs_string_2 = explode('</td>',$rs_strins_lab_1);
                			$rs_sting_1 = explode('<td class="y">'.$rs_string_2[0].'</td>        <td class="x" height="30">',$diamonds['information']);
                			if(!empty($rs_sting_1)){
                				$rs_string_1 = explode('</td>',$rs_sting_1[1]);
                				$req_out1 = $rs_string_1[0];
                				$req_item .= $this->get_single_item_name_table($req_out1,$rs_string_2[0]);
                			}
                			$i1++;
                		}
                	}
                }
                
                if($diamonds['additional_info'] != ''){ 
                	$rs_strins_labs = explode('<td class="y">',$diamonds['additional_info']);
                	 if(!empty($rs_strins_labs11)){
                		 $i1 = 0;
                		 foreach($rs_strins_labs11 as $rs_strins_lab_12){
                			$rs_string_21 = explode('</td>',$rs_strins_lab_12);
                			$rs_sting_11 = explode('<td class="y">'.$rs_string_21[0].'</td>        <td class="x" height="30">',$diamonds['additional_info']);
                			if(!empty($rs_sting_11)){
                				$rs_string_1 = explode('</td>',$rs_sting_11[1]);
                				$req_out1 = $rs_string_11[0];
                				$req_item .= $this->get_single_item_name_table($req_out1,$rs_string_21[0]);
                			}
                			$i1++;
                		}
                	}
                }
            $offer_price = $diamonds['product_price'];
            
            $make_html	= '
				<div class="diamond_result_content">
					<div class="col-sm-5 hover-jewelery-img-area" style="padding: 0px 10px 10px 15px;">
					    <a href="javascript:void(0);">
					    <img src="'.$diamonds['product_main_img'].'" alt="Bags" style="width:290px;border:solid 1px #ECECEC;" />
					    </a>
					    <div class="overlay-quick-view-show overlay-quick-view quickViewModal-'.$diamonds['id'].'">Quick View</div>
					    <div class="overlay-quick-view-show overlay-details-view"><a href="'.base_url().'collection/collection_bag_detail/'.$diamonds['id'].'">View Details</a></div>
					    <div class="overlay-quick-view-show overlay-more-details-view">
					        <h4>'.$diamonds['product_name'].'</h4>
					        <div class="hover-price">
                                <div class="popup-prices">
                                    <p class="old-price-qv" style="margin-bottom:0px;line-height: 15px;">
                                        <span class="price-label-qv">Retail Price:</span>
                                        <span class="price-qv">'.$offer_price.'</span>
                                    </p> 
                                </div>
                            </div>    
                            <b>Item Information</b>
    					    <table id="more-details-view" width="100%">
    					        <tr><td width="40%" style="color:#ff0000;font-weight:bold;
            border-right: 1px solid #c4c1bc !important;">Sku</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['sku'].'</td></tr>
                                '.$this->get_single_item_name_table($diamonds['product_sub_category'], 'Type').$req_item.'
    					    </table>
					    </div>
					    
					    <style>
					    /**
                         * Modals ($modals)
                         */
                        .viewModal-'.$diamonds['id'].' {
                            position: absolute;
                            z-index: 10000; /* 1 */
                            top: 0;
                            left: 0;
                            visibility: hidden;
                            width: 100%;
                            height: 100%;
                        }
                        .viewModal-'.$diamonds['id'].'.is-visible {
                            visibility: visible;
                        }
                        .viewModal-'.$diamonds['id'].'.is-visible .modal-overlay {
                          opacity: 1;
                          visibility: visible;
                          transition-delay: 0s;
                        }
                        .viewModal-'.$diamonds['id'].'.is-visible .modal-transition {
                          transform: translateY(0);
                          opacity: 1;
                        }
                        #lightSlider'.$diamonds['id'].'{
                            height:350px !important;
                        }
                    </style>
                    
                        <div class="viewModal-'.$diamonds['id'].'">
                            <div class="modal-overlay modal-toggle"></div>
                            <div class="modal-wrapper modal-transition">
                              <div class="modal-header">
                                <button class="modal-close modal-close-'.$diamonds['id'].' modal-toggle">X</button>
                                <h4>'.$diamonds['product_name'].'</h4>
                              </div>
                              
                              <div class="view-diamond-modal-body">
                                <div class="view-diamond-modal-content">
                                    
                                    <div id="diamond-slider-box" class="col-sm-6" style="height: 450px;">
                                        <div id="diamond-slider-area">
                                            <ul id="lightSlider'.$diamonds['sku'].'">
                                                '.$this->get_diamond_image_slider_1($diamonds['product_main_img'],$diamonds['sku']).$more_imgs.'
                                            </ul>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                      $(document).ready(function() {
                                        $("#lightSlider'.$diamonds['id'].'").lightSlider({
                                            gallery: true,
                                            item: 1,
                                            loop:true,
                                            slideMargin: 0
                                        });
                                      });
                                    </script>
                                    
                                    <div class="col-sm-6 pull-right">
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Sku:</span>
                                            <span class="new-price-qv">'.$diamonds['product_sku'].'</span>
                                            <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                        </p>
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Retail Price:</span>
                                            <span class="new-price-qv">'.$offer_price.'</span>
                                        </p>
                                        <form id="form_'.$diamonds['id'].'" action="'.SITE_URL.'jewelleries/addtoshoppingcart/" method="">
                                            <div class="col-sm-6">
                                              <label for="qty">QUANTITY:</label>
                                              <input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
                                              <div class="product-options-bottom">
                                                <div class="add-to-cart-1">
                                                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="">
                                                    <input type="hidden" name="3ez_price" value="'.$offer_price.'">
                                                    <input type="hidden" name="5ez_price" value="'.$offer_price.'">
                                                    <input type="hidden" name="main_price" value="'.$offer_price.'">
                                                    <input type="hidden" name="price" value="'.$diamonds['product_price'].'">
                                                    <input type="hidden" name="vender" value="Yadegar Diamonds">
                                                    <input type="hidden" name="url" value="'.$diamonds['product_main_img'].'">
                                                    <input type="hidden" name="prodname" value="'.$diamonds['product_name'].'">
                                                    <input type="hidden" name="diamnd_count" value="">
                                                    <input type="hidden" name="ring_shape" value="">
                                                    <input type="hidden" name="ring_carat" value="">
                                                    <input type="hidden" name="prid" id="prid" value="'.$diamonds['sku'].'">
                                                    <input type="hidden" name="stock_number" id="stock_number" value="'.$diamonds['sku'].'">
                                                    <input type="hidden" name="txt_ringtype" value="generic_ring">
                                                    <input type="hidden" name="txt_ringsize" value="">
                                                    <input type="hidden" name="txt_metal" value="Sterling Silver">
                                                    <input type="hidden" name="metals_weight" value="">
                                                    
                                                    <input type="hidden" name="vendors_name" value="Quality Gold">
                                                    <input type="hidden" name="vendor_number" value="800.354.9833">
                                                    <input type="hidden" name="table_name" value="dev_jewelries">
                                                    <input type="hidden" name="item_title" value="'.$diamonds['product_name'].'">
                                                    <input type="hidden" name="item_url" value="">
                                                    <input type="hidden" name="product_type" value="Serpentine">
                                                    
                                                    <input type="hidden" name="txt_addoption" value="diamond_agency_jewelers_collection">
                                                    <input type="hidden" name="center_stone_id" id="center_stone_id">
                                                    <input type="hidden" name="txt_qty" value="1">
                                                    
                                                    <table><tr>
                                                    <td><input type="submit" class="add_to_cart_btn_new" value="Add To Cart"></td>
                                                    <td><a href="javascript:void(0);"><input type="button" class="add_to_cart_btn_new" value="Add to wishlist"></a></td>
                                                    <td><a href="javascript:void(0);"><input type="button" class="add_to_cart_btn_new" value="More Details"></a></td>
                                                    <td><a href="mailto:"><input type="button" class="add_to_cart_btn_new" value="Email to a Friend"></a></td>
                                                    <tr></table>
                                                              
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        
                                        <div style="display: inline-block;width:100%;"><b>Item Information</b></div>
                                        <table id="more-details-view" width="100%" style="margin-bottom:30px;">
                					        <tr><td width="40%" style="color:#ff0000;font-weight:bold;
                        border-right: 1px solid #c4c1bc !important;">Sku</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['product_sku'].'</td></tr>
                                            '.$this->get_single_item_name_table($diamonds['product_category'], 'Type').$req_item.'
                					    </table>
                                        
                                    </div>
                                    
                                </div>
                              </div>
                            </div>
                        </div>
                      
					    <script>
					        $(document).ready(function(){
    					        $(".quickViewModal-'.$diamonds['id'].'").on("click", function(e) {
                                  e.preventDefault();
                                  $(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
                                });
                                
                                $(".modal-close-'.$diamonds['id'].'").on("click", function(e) {
                                  e.preventDefault();
                                  $(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
                                });
					        });    
					    </script>
					    
					</div>
                    <div class="col-sm-7 pull-right">
                        <h4>'.$diamonds['product_name'].'</h4>
                        <div class="add_tocart_btn text-right">
                            <span class="main_item_price">'.$offer_price.'</span>
                            <span><a href="'.base_url().'collection/collection_bag_detail/'.$diamonds['id'].'" class="addToCartBtn">View Details</a></span>
                        </div>
                        
                        './*$this->get_single_item_name($diamonds['sku'], 'Sku').'
                        '.$this->get_single_item_name($diamonds['product_category'], 'Category').'
                        '.$this->get_single_item_name($diamonds['product_sub_category'], 'Sub Category').*/'
                    </div>    
                    
                    <div class="col-sm-12">    
                        <div class="col-sm-12">
                            './*$this->get_single_item_name($diamonds['sku'], 'Sku').*/'
                        </div>
                                        
                        <div class="clear"></div>
                    </div>
                        <div class="clear"></div>
                        <!-- Modal -->
                        <div id="quickViewModal'.$diamonds['sku'].'" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                              </div>
                              <div class="modal-body">
                                <p>Some text in the modal.</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
				</div>
					'; 
					
				$make_array  = array(
						'0'	=> $make_html
					); 

		        $data[] = $make_array;	
            
        }
        
        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data // total data array
		);
		echo json_encode($json_data);  // send data as json format
	}

	function getSubcategory(){
		$this->db->select('subcategory');
		$this->db->from('dev_jewelries_new');
		$this->db->where('category LIKE',$this->input->get('cName'));
		$this->db->where('is_carol',1);
		$this->db->group_by('subcategory');
        $query = $this->db->get();
		$results = $query->result();

		$catgry = strtolower(str_replace(" ","-",$this->input->get('cName')));
		$html = '';
		if(!empty($results)){
			foreach ($results as $value){
				$count = $this->getCountResult('dev_jewelries_new', 'subcategory', $value->subcategory);
				$html .= '<div class="fiter_item_row '.$catgry.' sub_filter">
					<label><span><input class="sub_category" type="checkbox" id="sub_category" value="'.$value->subcategory.'" /></span><span><b>'.$value->subcategory.'</b> ('. $count .')</span></label>
				</div>';
			}
		}else{
			$html .= '<div class="fiter_item_row '.$catgry.' sub_filter"></div>';
		}
		$data['allProducts'] = $html;

		echo json_encode($data);
	}

	function getCountResult($getTable,$fieldName,$value){
		$qfinal = "SELECT DISTINCT(stock_number) FROM ".$getTable." WHERE ".$fieldName." LIKE '".$value."'";
		$result = $this->db->query($qfinal);
		return $result->num_rows();
	}

    function quality_gold($page_name='') {
        $data = $this->getCommonData();
        if($page_name == ''){
            $data['diamond_page_name']          = 'quality-gold';
        }else{
            $data['diamond_page_name']          = $page_name;
        }

        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 10;
			$offset = 0;
		}

        $where_diamonds				        =  array('ABS(stock_number) >' => 0);
		$get_diamond_list			        =  $this->Diamondmodel->getdata_any_table_limit_order_where('dev_jewelries', $where_diamonds, $limit, $offset, 'price');
        $data['title'] = "Quality Gold";
        $output = $this->load->view('diamond/quality_gold', $data, true);
        $this->output($output, $data, true);
    }

    function quality_gold_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 10;
			$offset = 0;
		}

        $where_diamonds				=  array('ABS(price_website) >' => 0);
        $where_vendor_name		    =  array( 'vendor_name' => 'Quality Gold' );
        $where_diamonds			    = array_merge($where_diamonds, $where_vendor_name);

        //------------------------------Price-----------------------------------
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price_website) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price_website) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price_website) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }

        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Bracelets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Chains');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Necklaces');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Rings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Pendants');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Bangles');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Anklets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White Gold', 'M1_Toe_Rings');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold', 'M2_Pendants');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold', 'M2_Chains');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold', 'M2_Bangles');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold', 'M2_Necklaces');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold', 'M2_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold', 'M2_Bracelets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold', 'M2_Rings');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Sterling Silver', 'M3_Necklaces');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Sterling Silver', 'M3_Bracelets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Sterling Silver', 'M3_Pendants');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Sterling Silver', 'M3_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Sterling Silver', 'M3_Toe_Rings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Sterling Silver', 'M3_Bangles');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Sterling Silver', 'M3_Chains');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Sterling Silver', 'M3_Rings');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Necklaces');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Chains');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Bracelets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Bangles');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Pendants');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Anklets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Rings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Toe_Rings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold', 'M4_Charms');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Bracelets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Pendants');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Necklaces');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Rings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Toe_Rings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Bangles');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Chains');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Two-Tone Gold', 'M5_Anklets');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold & Sterling Silver', 'M6_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold & Sterling Silver', 'M6_Rings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold & Sterling Silver', 'M6_Bangles');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold & Sterling Silver', 'M6_Bracelets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold & Sterling Silver', 'M6_Pendants');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold & Sterling Silver', 'M6_Necklaces');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Yellow Gold & Sterling Silver', 'M6_Anklets');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Brass', 'M7_Bangles');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Tri-Color Gold', 'M8_Anklets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Tri-Color Gold', 'M8_Bracelets');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Tri-Color Gold', 'M8_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Tri-Color Gold', 'M8_Pendants');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Tri-Color Gold', 'M8_Necklaces');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Stainless Steel', 'M9_Bangles');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White & Rose Gold', 'M10_Rings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White & Rose Gold', 'M10_Necklaces');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White & Rose Gold', 'M10_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'White & Rose Gold', 'M10_Anklets');
        
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold Plated Silver', 'M11_Earrings');
        $where_diamonds			    =    $this->get_post_data_array($where_diamonds, 'Rose Gold & Sterling Silver', 'M12_Bracelets');
        
        
        $get_toal_data 	            =  $this->Diamondmodel->count_any_table($where_diamonds, 'dev_jewelries');
        $get_diamond_list			=  $this->Diamondmodel->getdata_any_table_limit_order_where('dev_jewelries', $where_diamonds, $limit, $offset, 'price');
        
        
        // category => Fine bracelets = 740520211, fine chains = 740520129, fine necklace = 740520272, Fine Pendant = 740520271
        
        foreach($get_diamond_list as $diamonds){
            
            $offer_price = $diamonds['price_website']+60;
            
            if($diamonds['category'] == '740520211' OR $diamonds['category'] == '740520129' OR $diamonds['category'] == '740520272' OR $diamonds['category'] == '740520271'){
            }
            
            $make_html	= '
				<div class="diamond_result_content">
					<div class="col-sm-5 hover-jewelery-img-area" style="padding: 0px 10px 10px 15px;">
					    <a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'/">
					    <img src="'.SITE_URL.'images/'.$diamonds['image1'].'" alt="Fine Jewelry" style="width:290px;border:solid 1px #ECECEC;" />
					    </a>
					    <div class="overlay-quick-view-show overlay-quick-view quickViewModal-'.$diamonds['stock_number'].'">Quick View</div>
					    <div class="overlay-quick-view-show overlay-details-view"><a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'/">View Details</a></div>
					    <div class="overlay-quick-view-show overlay-more-details-view">
					        <h4>'.$diamonds['item_title'].'</h4>
					        <div class="hover-price">
                                <div class="popup-prices">
                                    <p class="old-price-qv" style="margin-bottom:0px;line-height: 15px;">
                                        <span class="price-label-qv">Retail Price:</span>
                                        <span class="price-qv">$'.$offer_price.'</span>
                                    </p>    
                                     <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;">    
                                        <span class="price-label-qv">OUR PRICE:</span>
                                        <span class="new-price-qv">$'.$diamonds['price_website'].'</span>
                                        <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                    </p>
                                </div>
                            </div>    
                            <b>Item Information</b>
    					    <table id="more-details-view" width="100%">
    					        <tr><td width="40%" style="color:#ff0000;font-weight:bold;
            border-right: 1px solid #c4c1bc !important;">Stock Number</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['stock_real_number'].'</td></tr>
                                '.$this->get_single_item_name_table($diamonds['category_type'], 'Type').'
                                '.$this->get_single_item_name_table($diamonds['shape'], 'Shape').'
                                '.$this->get_single_item_name_table($diamonds['style'], 'Style').'
                                '.$this->get_single_item_name_table($diamonds['carat'], 'Carat').'
                                '.$this->get_single_item_name_table($diamonds['metal'], 'Metal').'
                                '.$this->get_single_item_name_table($diamonds['category'], 'Category').'
                                '.$this->get_single_item_name_table($diamonds['productSKU'], 'Product SKU').'
                                '.$this->get_single_item_name_table($diamonds['metal_type'], 'Metal Type').'
                                '.$this->get_single_item_name_table($diamonds['metal_color'], 'Metal Color').'
                                '.$this->get_single_item_name_table($diamonds['ring_size'], 'Size').'
                                '.$this->get_single_item_name_table($diamonds['width'], 'Width').'
                                '.$this->get_single_item_name_table($diamonds['chain_type'], 'Chain Type').'
                                '.$this->get_single_item_name_table($diamonds['clasp_type'], 'Clasp Type').'
                                '.$this->get_single_item_name_table($diamonds['RhodiumPolish'], 'Polish').'
                                '.$this->get_single_item_name_table($diamonds['clarity'], 'Clarity').'
                                '.$this->get_single_item_name_table($diamonds['setting_type'], 'Setting Type').'
    					    </table>
					    </div>
					    
					    <style>
					    /**
                         * Modals ($modals)
                         */
                        .viewModal-'.$diamonds['stock_number'].' {
                            position: absolute;
                            z-index: 10000; /* 1 */
                            top: 0;
                            left: 0;
                            visibility: hidden;
                            width: 100%;
                            height: 100%;
                        }
                        .viewModal-'.$diamonds['stock_number'].'.is-visible {
                            visibility: visible;
                        }
                        .viewModal-'.$diamonds['stock_number'].'.is-visible .modal-overlay {
                          opacity: 1;
                          visibility: visible;
                          transition-delay: 0s;
                        }
                        .viewModal-'.$diamonds['stock_number'].'.is-visible .modal-transition {
                          transform: translateY(0);
                          opacity: 1;
                        }
                        #lightSlider'.$diamonds['stock_number'].'{
                            height:350px !important;
                        }
                    </style>
                    
                        <div class="viewModal-'.$diamonds['stock_number'].'">
                            <div class="modal-overlay modal-toggle"></div>
                            <div class="modal-wrapper modal-transition">
                              <div class="modal-header">
                                <button class="modal-close modal-close-'.$diamonds['stock_number'].' modal-toggle">X</button>
                                <h4>'.$diamonds['item_title'].'</h4>
                              </div>
                              
                              <div class="view-diamond-modal-body">
                                <div class="view-diamond-modal-content">
                                    
                                    <div id="diamond-slider-box" class="col-sm-6" style="height: 450px;">
                                        <div id="diamond-slider-area">
                                            <ul id="lightSlider'.$diamonds['stock_number'].'">
                                                '.$this->get_diamond_image_qg_slider($diamonds['image1']).'
                                                '.$this->get_diamond_image_qg_slider($diamonds['image2']).'
                                                '.$this->get_diamond_image_qg_slider($diamonds['image3']).'
                                                '.$this->get_diamond_image_qg_slider($diamonds['image4']).'
                                                '.$this->get_diamond_image_qg_slider($diamonds['image5']).'
                                                '.$this->get_diamond_image_qg_slider($diamonds['image6']).'
                                            </ul>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                      $(document).ready(function() {
                                        $("#lightSlider'.$diamonds['stock_number'].'").lightSlider({
                                            gallery: true,
                                            item: 1,
                                            loop:true,
                                            slideMargin: 0
                                        });
                                      });
                                    </script>
                                    
                                    <div class="col-sm-6 pull-right">
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Item Code:</span>
                                            <span class="new-price-qv">'.$diamonds['stock_real_number'].'</span>
                                            <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                        </p>
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Retail Price:</span>
                                            <span class="new-price-qv">$'.$offer_price.'</span>
                                        </p>
                                        <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                            <span class="price-label-qv">Our Price:</span>
                                            <span class="new-price-qv">$'.$diamonds['price_website'].'</span>
                                            <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                        </p>
                                        <form id="form_'.$diamonds['stock_number'].'" action="'.SITE_URL.'jewelleries/addtoshoppingcart/" method="">
                                            <div class="col-sm-6">
                                              <label for="qty">QUANTITY:</label>
                                              <input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
                                              <div class="product-options-bottom">
                                                <div class="add-to-cart-1">
                                                    <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="">
                                                    <input type="hidden" name="3ez_price" value="">
                                                    <input type="hidden" name="5ez_price" value="">
                                                    <input type="hidden" name="main_price" value="'.$diamonds['price_website'].'">
                                                    <input type="hidden" name="price" value="'.$diamonds['price_website'].'">
                                                    <input type="hidden" name="vender" value="Yadegar Diamonds">
                                                    <input type="hidden" name="url" value="'.$diamonds['image1'].'">
                                                    <input type="hidden" name="prodname" value="'.$diamonds['item_title'].'">
                                                    <input type="hidden" name="diamnd_count" value="">
                                                    <input type="hidden" name="ring_shape" value="">
                                                    <input type="hidden" name="ring_carat" value="">
                                                    <input type="hidden" name="prid" id="prid" value="'.$diamonds['stock_number'].'">
                                                    <input type="hidden" name="stock_number" id="stock_number" value="'.$diamonds['stock_real_number'].'">
                                                    <input type="hidden" name="txt_ringtype" value="generic_ring">
                                                    <input type="hidden" name="txt_ringsize" value="">
                                                    <input type="hidden" name="txt_metal" value="Sterling Silver">
                                                    <input type="hidden" name="metals_weight" value="">
                                                    
                                                    <input type="hidden" name="vendors_name" value="Quality Gold">
                                                    <input type="hidden" name="vendor_number" value="800.354.9833">
                                                    <input type="hidden" name="table_name" value="dev_jewelries">
                                                    <input type="hidden" name="item_title" value="'.$diamonds['item_title'].'">
                                                    <input type="hidden" name="item_url" value="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'/">
                                                    <input type="hidden" name="product_type" value="Serpentine">
                                                    
                                                    <input type="hidden" name="txt_addoption" value="diamond_agency_jewelers_collection">
                                                    <input type="hidden" name="center_stone_id" id="center_stone_id">
                                                    <input type="hidden" name="txt_qty" value="1">
                                                    
                                                    <table><tr>
                                                    <td><input type="submit" class="add_to_cart_btn_new" value="Add To Cart"></td>
                                                    <td><a href="'.SITE_URL.'account/account_wishlist/'.$diamonds['stock_number'].'/add/dev_jewelries_new"><input type="button" class="add_to_cart_btn_new" value="Add to wishlist"></a></td>
                                                    <td><a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'/"><input type="button" class="add_to_cart_btn_new" value="More Details"></a></td>
                                                    <td><a href="mailto:"><input type="button" class="add_to_cart_btn_new" value="Email to a Friend"></a></td>
                                                    <tr></table>
                                                              
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        
                                        <div style="display: inline-block;width:100%;"><b>Item Information</b></div>
                                        <table id="more-details-view" width="100%" style="margin-bottom:30px;">
                					        <tr><td width="40%" style="color:#ff0000;font-weight:bold;
                        border-right: 1px solid #c4c1bc !important;">Stock Number</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['stock_real_number'].'</td></tr>
                                            '.$this->get_single_item_name_table($diamonds['category_type'], 'Type').'
                                            '.$this->get_single_item_name_table($diamonds['shape'], 'Shape').'
                                            '.$this->get_single_item_name_table($diamonds['style'], 'Style').'
                                            '.$this->get_single_item_name_table($diamonds['carat'], 'Carat').'
                                            '.$this->get_single_item_name_table($diamonds['metal'], 'Metal').'
                                            '.$this->get_single_item_name_table($diamonds['category'], 'Category').'
                                            '.$this->get_single_item_name_table($diamonds['productSKU'], 'Product SKU').'
                                            '.$this->get_single_item_name_table($diamonds['metal_type'], 'Metal Type').'
                                            '.$this->get_single_item_name_table($diamonds['metal_color'], 'Metal Color').'
                                            '.$this->get_single_item_name_table($diamonds['ring_size'], 'Size').'
                                            '.$this->get_single_item_name_table($diamonds['width'], 'Width').'
                                            '.$this->get_single_item_name_table($diamonds['chain_type'], 'Chain Type').'
                                            '.$this->get_single_item_name_table($diamonds['clasp_type'], 'Clasp Type').'
                                            '.$this->get_single_item_name_table($diamonds['RhodiumPolish'], 'Polish').'
                                            '.$this->get_single_item_name_table($diamonds['clarity'], 'Clarity').'
                                            '.$this->get_single_item_name_table($diamonds['setting_type'], 'Setting Type').'
                					    </table>
                                        
                                    </div>
                                    
                                </div>
                              </div>
                            </div>
                        </div>
                      
					    <script>
					        $(document).ready(function(){
    					        $(".quickViewModal-'.$diamonds['stock_number'].'").on("click", function(e) {
                                  e.preventDefault();
                                  $(".viewModal-'.$diamonds['stock_number'].'").toggleClass("is-visible");
                                });
                                
                                $(".modal-close-'.$diamonds['stock_number'].'").on("click", function(e) {
                                  e.preventDefault();
                                  $(".viewModal-'.$diamonds['stock_number'].'").toggleClass("is-visible");
                                });
					        });    
					    </script>
					    
					</div>
                    <div class="col-sm-7 pull-right">
                        <h4>'.$diamonds['item_title'].'</h4>
                        <div class="add_tocart_btn text-right">
                            <span class="main_item_price">$'._nf($diamonds['price_website'], 2).'</span>
                            <span><a href="'.SITE_URL.'collection/collection-detail/'.$diamonds['stock_number'].'/" class="addToCartBtn">View Details</a></span>
                        </div>
                        
                        '.$this->get_single_item_name($diamonds['stock_real_number'], 'Stock Number').'
                        '.$this->get_single_item_name($diamonds['category_type'], 'Type').'
                        '.$this->get_single_item_name($diamonds['shape'], 'Shape').'
                    </div>    
                    
                    <div class="col-sm-12">    
                        <div class="col-sm-7">
                            '.$this->get_single_item_name($diamonds['style'], 'Style').'
                            '.$this->get_single_item_name($diamonds['carat'], 'Carat').'
                            '.$this->get_single_item_name($diamonds['metal'], 'Metal').'
                            '.$this->get_single_item_name($diamonds['category'], 'Category').'
                            '.$this->get_single_item_name($diamonds['productSKU'], 'Product SKU').'
                            '.$this->get_single_item_name($diamonds['metal_type'], 'Metal Type').'
                            '.$this->get_single_item_name($diamonds['metal_color'], 'Metal Color').'
                        </div>
                        
                        <div class="col-sm-5 pull-right">
                            '.$this->get_single_item_name($diamonds['ring_size'], 'Size').'
                            '.$this->get_single_item_name($diamonds['width'], 'Width').'
                            '.$this->get_single_item_name($diamonds['chain_type'], 'Chain Type').'
                            '.$this->get_single_item_name($diamonds['clasp_type'], 'Clasp Type').'
                            '.$this->get_single_item_name($diamonds['RhodiumPolish'], 'Polish').'
                            '.$this->get_single_item_name($diamonds['clarity'], 'Clarity').'
                            '.$this->get_single_item_name($diamonds['setting_type'], 'Setting Type').'
                        </div>
                    
                        <div class="clear"></div>
                    </div>
                        <div class="clear"></div>
                        <!-- Modal -->
                        <div id="quickViewModal'.$diamonds['stock_number'].'" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                              </div>
                              <div class="modal-body">
                                <p>Some text in the modal.</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
				</div>
					'; 
					
            
            
				$make_array  = array(
						'0'	=> $make_html
					); 

		        $data[] = $make_array;	
            
        }
        
        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data // total data array
			);
	    echo json_encode($json_data);  // send data as json format
    }

    function get_diamond_image_qg_slider($data){
        if($data){ 
            $return_data = '<li data-thumb="'.$data.'">
				<img src="'.SITE_URL.'images/'.$data.'" alt="Fine Jewelry" />
			</li>';
        }else{
            $return_data = '';
        }

        return $return_data;
    }

	function get_diamond_image_slider($data){
        if($data AND $data != "http://www.jewelryimg.com/productimages/original/0080801.jpg"){ 
            $return_data = '<li data-thumb="'.$data.'">
				<img src="'.$data.'" alt="Fine Jewelry" />
			</li>';
        }else{
            $return_data = '';
        }

        return $return_data;
    }

	function get_diamond_image_slider_1($data,$cur_id){
        if($data AND $data != "http://www.jewelryimg.com/productimages/original/0080801.jpg"){ 
            $return_data = '<li data-thumb="'.$data.'">
				<img src="'.$data.'" alt="Fine Jewelry" id="'.$cur_id.'"/>
			</li>';
        }else{
            $return_data = '';
        }

        return $return_data;
    }

    function get_single_item_name_table($data, $title){
        if($data){ 
            $return_data = '<tr><td style="border-right: 1px solid #c4c1bc !important;">'.$title.'</td><td>'.$data.'</td></tr>';
        }else{
            $return_data = '';
        }
        
        return $return_data;
    }

    function get_post_data_array($where_diamonds, $metal, $field){
        if( isset($_POST[$field]) AND !empty($_POST[$field]) ){
        	$where_data		        = array( 'metal' => $metal, 'category' => $_POST[$field] );
        	$where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        
        return $where_diamonds;
    }

	function get_post_data_array_1($where_diamonds,$field){
        
        if( isset($_POST[$field]) AND !empty($_POST[$field]) ){
        	$where_data		        = array('product_category' => $_POST[$field] );
        	$where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        
        return $where_diamonds;
    }

    function get_post_data_array_3($where_diamonds,$field){
        
        if( isset($_POST[$field]) AND !empty($_POST[$field]) ){
        	$where_data		        = array('product_sub_category' => $_POST[$field] );
        	$where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        
        return $where_diamonds;
    }

    function get_post_data_array_2($where_diamonds,$field){
        if( isset($_POST[$field]) AND !empty($_POST[$field]) ){
        	$where_data		        = array('gold_color' => $_POST[$field] );
        	$where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        return $where_diamonds;
    }

    function get_single_item_name($data, $title){
        if($data){ 
            $return_data = '<div class="item_detail_row" style="overflow-wrap:break-word;"><div class="col-sm-6"> '.$title.' :</div><div class="col-sm-6"> '.$data.' </div><div class="clear"></div></div>';
        }else{
            $return_data = '';
        }
        
        return $return_data;
    }

	function get_color_name($color){
		if($color == '10'){
            $color_val    = 'L';
        }else if($color == '20'){
            $color_val    = 'K';
        }else if($color == '30'){
            $color_val    = 'J';
        }else if($color == '40'){
            $color_val    = 'I';
        }else if($color == '50'){
            $color_val    = 'H';
        }else if($color == '60'){
            $color_val    = 'G';
        }else if($color == '70'){
            $color_val    = 'F';
        }else if($color == '80'){
            $color_val    = 'E';
        }else if($color == '90'){
            $color_val    = 'D';
        }

        return $color_val;
    }

    function get_clarity_name($clarity){
		if($clarity == '10'){
            $clarity_val    = 'I1';
        }else if($clarity == '20'){
            $clarity_val    = 'SI3';
        }else if($clarity == '30'){
            $clarity_val    = 'SI2';
        }else if($clarity == '40'){
            $clarity_val    = 'SI1';
        }else if($clarity == '50'){
            $clarity_val    = 'VS2';
        }else if($clarity == '60'){
            $clarity_val    = 'VS1';
        }else if($clarity == '70'){
            $clarity_val    = 'VVS2';
        }else if($clarity == '80'){
            $clarity_val    = 'VVS1';
        }else if($clarity == '90'){
            $clarity_val    = 'FL';
        }else if($clarity == '100'){
            $clarity_val    = 'IF';
        }

        return $clarity_val;
    }

    function solitaires_and_halos($page_name='') {
        $data = $this->getCommonData();

        $data['diamond_page_name'] = 'solitaires-and-halos';
        if(isset($_GET['limit']) AND isset($_GET['offset'])){
			$limit 	= $_GET['limit'];
			$offset = $_GET['offset'];
		}else{
			$limit  = 1000;
			$offset = 0;
		}

        if( isset($_GET['clarity']) AND !empty($_GET['clarity']) ){
            $clarity                = $_GET['clarity'];
            if($clarity == '10'){
                $clarity_val    = 'I1';
            }else if($clarity == '20'){
                $clarity_val    = 'SI3';
            }else if($clarity == '30'){
                $clarity_val    = 'SI2';
            }else if($clarity == '40'){
                $clarity_val    = 'SI1';
            }else if($clarity == '50'){
                $clarity_val    = 'VS2';
            }else if($clarity == '60'){
                $clarity_val    = 'VS1';
            }else if($clarity == '70'){
                $clarity_val    = 'VVS2';
            }else if($clarity == '80'){
                $clarity_val    = 'VVS1';
            }else if($clarity == '90'){
                $clarity_val    = 'FL';
            }else if($clarity == '100'){
                $clarity_val    = 'IF';
            }
            $where_clarity		    = array( 'clarity' => $clarity_val);
            $where_diamonds			= array_merge($where_diamonds, $where_clarity);
        }

        if( isset($_GET['shape']) AND !empty($_GET['shape']) ){
            $where_shape		    =  array( 'shape' => $_GET['shape'] );
            $where_diamonds			= array_merge($where_diamonds, $where_shape);
        }

        if( isset($_GET['color']) AND !empty($_GET['color']) ){
            $where_color		    =  array( 'color' => $_GET['color'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        if( isset($_GET['carat']) AND !empty($_GET['carat']) ){
            $where_color		    =  array( 'ABS(carat) >' => $_GET['carat'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        if( isset($_GET['price']) AND !empty($_GET['price']) ){
            $where_color		    = array( 'ABS(price) >' => $_GET['price'] );
            $where_diamonds			= array_merge($where_diamonds, $where_color);
        }

        $category_ids         = array(103);
		$get_all_diamond_list       = array();
		foreach($category_ids as $category){
		    $where_diamonds			= array();
		    $get_diamond_list		= $this->Diamondmodel->getdata_any_table_limit_order_where('itshot_products', $where_diamonds, $limit, $offset, 'product_price_off'); 
		    $get_all_diamond_list	= array_merge($get_all_diamond_list, $get_diamond_list);
		}

        $data['diamonds_results'] = $get_all_diamond_list;
        $data['title'] = "Solitaires and Halos & Wedding Rings";

        $output = $this->load->view('diamond/solitaires-and-halos', $data, true);
        $this->output($output, $data, true);
        
    }

    function solitaires_and_halos_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 10;
			$offset = 0;
		}
		
        $where_diamonds				=  array('ABS(id) >' => 0);

        $amount_min                 = 0;
        $amount_max                 = 999990;

        if( isset($_POST['amount_min']) AND !empty($_POST['amount_min']) ){
            $amount_min		        = $_POST['amount_min'];
        }
        if( isset($_POST['amount_max']) AND !empty($_POST['amount_max']) ){
            $amount_max		        = $_POST['amount_max'];
        }
        if( isset($_POST['settings_52']) AND !empty($_POST['settings_52']) ){
            $where_data		        = array( 'main_catid' => $_POST['settings_52'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['settings_8']) AND !empty($_POST['settings_8']) ){
            $where_data		        = array( 'catid' => $_POST['settings_8'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['settings_40']) AND !empty($_POST['settings_40']) ){
            $where_data		        = array( 'main_catid' => $_POST['settings_40'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['settings_39']) AND !empty($_POST['settings_39']) ){
            $where_data		        = array( 'catid' => $_POST['settings_39'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['settings_179']) AND !empty($_POST['settings_179']) ){
            $where_data		        = array( 'main_catid' => $_POST['settings_179'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['settings_9']) AND !empty($_POST['settings_9']) ){
            $where_data		        = array( 'main_catid' => $_POST['settings_9'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_1']) AND !empty($_POST['ring_size_1']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_1'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_2']) AND !empty($_POST['ring_size_2']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_2'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_3']) AND !empty($_POST['ring_size_3']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_3'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_4']) AND !empty($_POST['ring_size_4']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_4'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_5']) AND !empty($_POST['ring_size_5']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_5'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_6']) AND !empty($_POST['ring_size_6']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_6'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_7']) AND !empty($_POST['ring_size_7']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_7'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_8']) AND !empty($_POST['ring_size_8']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_8'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }
        if( isset($_POST['ring_size_9']) AND !empty($_POST['ring_size_9']) ){
            $where_data		        = array( 'ring_size' => $_POST['ring_size_9'] );
            $where_diamonds			= array_merge($where_diamonds, $where_data);
        }

        $get_toal_data 	            =  $this->Diamondmodel->count_any_table_distinct($where_diamonds, 'dev_us', 'style_group');
        $get_diamond_list			=  $this->Diamondmodel->getdata_any_table_limit_order_where_distinct('dev_us', $where_diamonds, $limit, $offset, 'id', 'style_group');
        foreach($get_diamond_list as $diamonds){
            $where_ItemNumber	=  array('ItemNumber' => $diamonds['name']);
            $get_images_list	=  $this->Diamondmodel->getdata_any_table_where_orderby_desc('images', $where_ItemNumber, 'id');
            $view_shapeimage    = SITE_URL.'scrapper/imgs/'.$get_images_list[1]->ImagePath;
            $where_productId	=  array('productId' => $diamonds['name'], 'ABS(priceRetail) >' => 100);
            $get_prices_list	=  $this->Diamondmodel->getdata_any_table_where_orderby_asc('dev_us_prices', $where_productId, 'priceRetail');
            $main_amount        = $get_prices_list['0']->priceRetail*1.7;
            if($main_amount > $amount_min AND $main_amount < $amount_max){
                $offer_price = $main_amount+60;
                $make_html	= '
    				<div class="diamond_result_content">
    					<div class="col-sm-5 hover-jewelery-img-area" style="padding: 0px 10px 10px 15px;">
    					    <a href="'.SITE_URL.'selection/engagement-ring-detail/'.$diamonds['id'].'/">
    					    <img src="'.$view_shapeimage.'" alt="Fine Jewelry" style="width:290px;border:solid 1px #ECECEC;" />
    					    </a>
    					    
    					    <div class="overlay-quick-view-show overlay-quick-view quickViewModal-'.$diamonds['id'].'">Quick View</div>
					        <div class="overlay-quick-view-show overlay-details-view"><a href="'.SITE_URL.'selection/engagement-ring-detail/'.$diamonds['id'].'/">View Details</a></div>
					        
					        <div class="overlay-quick-view-show overlay-more-details-view">
    					        <h4>'.$diamonds['name'].'</h4>
    					        <div class="hover-price">
                                    <div class="popup-prices">
                                        <p class="old-price-qv" style="margin-bottom:0px;line-height: 15px;">
                                            <span class="price-label-qv">Retail Price:</span>
                                            <span class="price-qv">$'.$offer_price.'</span>
                                        </p>    
                                         <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;">    
                                            <span class="price-label-qv">OUR PRICE:</span>
                                            <span class="new-price-qv">$'.$main_amount.'</span>
                                            <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                        </p>
                                    </div>
                                </div>    
                                <b>Item Information</b>
        					    <table id="more-details-view" width="100%">
        					        <tr><td width="40%" style="color:#ff0000;font-weight:bold; 
        					        border-right: 1px solid #c4c1bc !important;">Stock Number</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['style_group'].'</td></tr>
                                    '.$this->get_single_item_name_table($diamonds['stone_weight'], 'Stone Weight').'
                                    '.$this->get_single_item_name_table($diamonds['supplied_stones'], 'Supplied Stones').'
                                    '.$this->get_single_item_name_table($diamonds['additional_stones'], 'Additional Stones').'
                                    '.$this->get_single_item_name_table($diamonds['top_width'], 'Top Width').'
                                    '.$this->get_single_item_name_table($diamonds['bottom_width'], 'Bottom Width').'
                                    '.$this->get_single_item_name_table($diamonds['top_height'], 'Top Height').'
                                    '.$this->get_single_item_name_table($diamonds['bottom_height'], 'Bottom Height').'
                                    '.$this->get_single_item_name_table($diamonds['ring_size'], 'Size').'
                                    '.$this->get_single_item_name_table($diamonds['product_id_set'], 'Product Set').'
                                    '.$this->get_single_item_name_table($diamonds['metal_weight_bk'], 'Metal Weight').'
                                    '.$this->get_single_item_name_table($diamonds['found_diamond'], 'Found Diamond').'
                                    '.$this->get_single_item_name_table($diamonds['Flour'], 'Flourescence').'
                                    '.$this->get_single_item_name_table($diamonds['Meas'], 'Measurements').'
                                    '.$this->get_single_item_name_table($diamonds['crown_angle'], 'Crown Angle').'
                                    '.$this->get_single_item_name_table($diamonds['pavilion_angle'], 'Pavilion Depth').'
                                    '.$this->get_single_item_name_table($diamonds['Hearts'], 'Hearts').'
        					    </table>
    					    </div>
    					    
					        <style>
        					    /**
                                 * Modals ($modals)
                                 */
                                .viewModal-'.$diamonds['id'].' {
                                    position: absolute;
                                    z-index: 10000; /* 1 */
                                    top: 0;
                                    left: 0;
                                    visibility: hidden;
                                    width: 100%;
                                    height: 100%;
                                }
                                .viewModal-'.$diamonds['id'].'.is-visible {
                                    visibility: visible;
                                }
                                .viewModal-'.$diamonds['id'].'.is-visible .modal-overlay {
                                  opacity: 1;
                                  visibility: visible;
                                  transition-delay: 0s;
                                }
                                .viewModal-'.$diamonds['id'].'.is-visible .modal-transition {
                                  transform: translateY(0);
                                  opacity: 1;
                                }
                                #lightSlider'.$diamonds['id'].'{
                                    height:350px !important;
                                }
                            </style>
                            
                            <div class="viewModal-'.$diamonds['id'].'">
                                <div class="modal-overlay modal-toggle"></div>
                                <div class="modal-wrapper modal-transition">
                                  <div class="modal-header">
                                    <button class="modal-close modal-close-'.$diamonds['id'].' modal-toggle">X</button>
                                    <h4>'.$diamonds['name'].'</h4>
                                  </div>
                                  
                                  <div class="view-diamond-modal-body">
                                    <div class="view-diamond-modal-content">
                                        
                                        <div id="diamond-slider-box" class="col-sm-6" style="height: 450px;">
                                            <div id="diamond-slider-area">
                                                <ul id="lightSlider'.$diamonds['id'].'">
                                                    '.$this->get_diamond_image_slider($view_shapeimage).'
                                                </ul>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                          $(document).ready(function() {
                                            $("#lightSlider'.$diamonds['id'].'").lightSlider({
                                                gallery: true,
                                                item: 1,
                                                loop:true,
                                                slideMargin: 0
                                            });
                                          });
                                        </script>
                                        
                                        <div class="col-sm-6 pull-right">
                                            <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                                <span class="price-label-qv">Item Code:</span>
                                                <span class="new-price-qv">'.$diamonds['id'].'</span>
                                                <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                            </p>
                                            <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                                <span class="price-label-qv">Retail Price:</span>
                                                <span class="new-price-qv">$'.$offer_price.'</span>
                                            </p>
                                            <p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
                                                <span class="price-label-qv">Our Price:</span>
                                                <span class="new-price-qv">$'.$main_amount.'</span>
                                                <span class="special-price-label-qv">(Savings: 41.18%)</span>
                                            </p>
                                            <form id="form_'.$diamonds['id'].'" action="'.SITE_URL.'jewelleries/addtoshoppingcart/" method="">
                                                <div class="col-sm-6">
                                                  <label for="qty">QUANTITY:</label>
                                                  <input type="number" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
                                                  <div class="product-options-bottom">
                                                    <div class="add-to-cart-1">
                                                        <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="">
                                                        <input type="hidden" name="3ez_price" value="">
                                                        <input type="hidden" name="5ez_price" value="">
                                                        <input type="hidden" name="main_price" value="'.$main_amount.'">
                                                        <input type="hidden" name="price" value="'.$main_amount.'">
                                                        <input type="hidden" name="vender" value="Yadegar Diamonds">
                                                        <input type="hidden" name="url" value="'.$view_shapeimage.'">
                                                        <input type="hidden" name="prodname" value="'.$diamonds['name'].'">
                                                        <input type="hidden" name="diamnd_count" value="">
                                                        <input type="hidden" name="ring_shape" value="">
                                                        <input type="hidden" name="ring_carat" value="">
                                                        <input type="hidden" name="prid" id="prid" value="'.$diamonds['id'].'">
                                                        <input type="hidden" name="stock_number" id="stock_number" value="'.$diamonds['style_group'].'">
                                                        <input type="hidden" name="txt_ringtype" value="generic_ring">
                                                        <input type="hidden" name="txt_ringsize" value="">
                                                        <input type="hidden" name="txt_metal" value="Sterling Silver">
                                                        <input type="hidden" name="metals_weight" value="">
                                                        
                                                        <input type="hidden" name="vendors_name" value="Quality Gold">
                                                        <input type="hidden" name="vendor_number" value="800.354.9833">
                                                        <input type="hidden" name="table_name" value="dev_jewelries">
                                                        <input type="hidden" name="item_title" value="'.$diamonds['name'].'">
                                                        <input type="hidden" name="item_url" value="'.SITE_URL.'selection/engagement-ring-detail/'.$diamonds['id'].'/">
                                                        <input type="hidden" name="product_type" value="Serpentine">
                                                        
                                                        <input type="hidden" name="txt_addoption" value="diamond_agency_jewelers_collection">
                                                        <input type="hidden" name="center_stone_id" id="center_stone_id">
                                                        <input type="hidden" name="txt_qty" value="1">
                                                        
                                                        <table><tr>
                                                        <td><input type="submit" class="add_to_cart_btn_new" value="Add To Cart"></td>
                                                        <td><a href="'.SITE_URL.'account/account_wishlist/'.$diamonds['id'].'/add/dev_us"><input type="button" class="add_to_cart_btn_new" value="Add to wishlist"></a></td>
                                                        <td><a href="'.SITE_URL.'selection/engagement-ring-detail/'.$diamonds['id'].'/"><input type="button" class="add_to_cart_btn_new" value="More Details"></a></td>
                                                        <td><a href="mailto:"><input type="button" class="add_to_cart_btn_new" value="Email to a Friend"></a></td>
                                                        <tr></table>
                                                                  
                                                    </div>
                                                  </div>
                                                </div>
                                            </form>
                                            
                                            <div style="display: inline-block;width:100%;"><b>Item Information</b></div>
                                            <table id="more-details-view" width="100%" style="margin-bottom:30px;">
                    					        <tr><td width="40%" style="color:#ff0000;font-weight:bold; 
                    					        border-right: 1px solid #c4c1bc !important;">Stock Number</td><td width="60%" style="color:#ff0000;font-weight:bold;">'.$diamonds['style_group'].'</td></tr>
                                                '.$this->get_single_item_name_table($diamonds['stone_weight'], 'Stone Weight').'
                                                '.$this->get_single_item_name_table($diamonds['supplied_stones'], 'Supplied Stones').'
                                                '.$this->get_single_item_name_table($diamonds['additional_stones'], 'Additional Stones').'
                                                '.$this->get_single_item_name_table($diamonds['top_width'], 'Top Width').'
                                                '.$this->get_single_item_name_table($diamonds['bottom_width'], 'Bottom Width').'
                                                '.$this->get_single_item_name_table($diamonds['top_height'], 'Top Height').'
                                                '.$this->get_single_item_name_table($diamonds['bottom_height'], 'Bottom Height').'
                                                '.$this->get_single_item_name_table($diamonds['ring_size'], 'Size').'
                                                '.$this->get_single_item_name_table($diamonds['product_id_set'], 'Product Set').'
                                                '.$this->get_single_item_name_table($diamonds['metal_weight_bk'], 'Metal Weight').'
                                                '.$this->get_single_item_name_table($diamonds['found_diamond'], 'Found Diamond').'
                                                '.$this->get_single_item_name_table($diamonds['Flour'], 'Flourescence').'
                                                '.$this->get_single_item_name_table($diamonds['Meas'], 'Measurements').'
                                                '.$this->get_single_item_name_table($diamonds['crown_angle'], 'Crown Angle').'
                                                '.$this->get_single_item_name_table($diamonds['pavilion_angle'], 'Pavilion Depth').'
                                                '.$this->get_single_item_name_table($diamonds['Hearts'], 'Hearts').'
                    					    </table>
                                            
                                        </div>
                                        
                                    </div>
                                  </div>
                                </div>
                            </div>
                          
    					    <script>
    					        $(document).ready(function(){
        					        $(".quickViewModal-'.$diamonds['id'].'").on("click", function(e) {
                                      e.preventDefault();
                                      $(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
                                    });
                                    
                                    $(".modal-close-'.$diamonds['id'].'").on("click", function(e) {
                                      e.preventDefault();
                                      $(".viewModal-'.$diamonds['id'].'").toggleClass("is-visible");
                                    });
    					        });    
    					    </script>
    					    
    					    
					    
    					</div>
    					
    					
                        <div class="col-sm-7 pull-right">
                            <h4>'.$diamonds['name'].'</h4>
                            <div class="add_tocart_btn text-right">
                                <span class="main_item_price">$'._nf($get_prices_list['0']->priceRetail*1.7).'</span>
                                <span><a href="'.SITE_URL.'selection/engagement-ring-detail/'.$diamonds['id'].'/" class="addToCartBtn">View Details</a></span>
                            </div>
                            
                            '.$this->get_single_item_name($diamonds['style_group'], 'Stock Number').'
                            '.$this->get_single_item_name($diamonds['stone_weight'], 'Stone Weight').'
                            '.$this->get_single_item_name($diamonds['supplied_stones'], 'Supplied Stones').'
                            '.$this->get_single_item_name($diamonds['additional_stones'], 'Additional Stones').'
                        </div>    
                        
                        <div class="col-sm-12">    
                            <div class="col-sm-7">
                                '.$this->get_single_item_name($diamonds['top_width'], 'Top Width').'
                                '.$this->get_single_item_name($diamonds['bottom_width'], 'Bottom Width').'
                                '.$this->get_single_item_name($diamonds['top_height'], 'Top Height').'
                                '.$this->get_single_item_name($diamonds['bottom_height'], 'Bottom Height').'
                                '.$this->get_single_item_name($diamonds['ring_size'], 'Size').'
                                '.$this->get_single_item_name($diamonds['product_id_set'], 'Product Set').'
                            </div>
                            
                            <div class="col-sm-5 pull-right">
                                '.$this->get_single_item_name($diamonds['metal_weight_bk'], 'Metal Weight').'
                                '.$this->get_single_item_name($diamonds['found_diamond'], 'Found Diamond').'
                                '.$this->get_single_item_name($diamonds['Flour'], 'Flourescence').'
                                '.$this->get_single_item_name($diamonds['Meas'], 'Measurements').'
                                '.$this->get_single_item_name($diamonds['crown_angle'], 'Crown Angle').'
                                '.$this->get_single_item_name($diamonds['pavilion_angle'], 'Pavilion Depth').'
                                '.$this->get_single_item_name($diamonds['Hearts'], 'Hearts').'
                            </div>
                        
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
    				</div>
					'; 
            }		
			$make_array  = array(
					'0'	=> $make_html
				); 

	        $data[] = $make_array;	
        }   
        
        $json_data = array(
			"draw"            => intval($params['draw']),   
			"recordsTotal"    => intval($get_toal_data),  
			"recordsFiltered" => intval($get_toal_data),
			"data"            => $data
		);

	    echo json_encode($json_data);
    }

	function merge_costar_engagement_rings() {
		exit;
		$getrings =  $this->Diamondmodel->getengRingData('dev_costar_diamonds');
		foreach($getrings as $ring){
			preg_match_all('/(\d+.?\d+)/',$ring->carat_weight,$carats);
			$isinsert = $this->db->insert('dev_jewelries_new', array(
				'stock_real_number' => !empty($ring->stock_number)?$ring->stock_number:'',
				'ebayid' => '',
				'seller_id' => 0,
				'company_id' => 0,
				'price_amazon' => !empty($ring->price)?$ring->price:'',
				'price_ebay' => !empty($ring->price)?$ring->price:'',
				'price_website' => !empty($ring->price)?$ring->price:'',
				'price' => !empty($ring->price)?$ring->price:'',
				'carat' => !empty($carats[1][0])?$carats[1][0]:'',
				'carat_weight' => !empty($ring->carat_weight)?$ring->carat_weight:'',
				'shape' => !empty($ring->center_stone_shape)?$ring->center_stone_shape:'',
				'metal' => str_replace("Collection","",str_replace(",","",$ring->subcategory)),
				'finger_size' => '',
				'diamond_count' => '',
				'diamond_size' => '',
				'total_carats' => '',
				'description' => !empty($ring->desc)?$ring->desc:'',
				'description2' => !empty($ring->sdesc)?$ring->sdesc:'',
				'style' => '',
				'white_gold_price' => 0,
				'yellow_gold_price' => 0,
				'platinum_price' => 0,
				'name' => !empty($ring->stock_number)?$ring->stock_number:'',
				'ringtype' => '',
				'category' => !empty($ring->category)?$ring->category:'',
				'subcategory' => !empty($ring->subcategory)?$ring->subcategory:'',
				'subcategory2' => !empty($ring->subcategory2)?$ring->subcategory2:'',
				'metal_purity' => '',
				'item_title' => !empty($ring->stock_number)?$ring->stock_number:'',
				'vendor_name' => 'Carol',
				'vendor_sku' => 1,
				'item_sku' => !empty($ring->stock_number)?$ring->stock_number .'||'.$ring->id:'',
				'productSKU' => '',
				'quantity' => 0,
				'metal_type' => !empty($ring->metal_type)?$ring->metal_type:'',
				'metal_color' => '',
				'finish' => '',
				'category_type' => 'Gold',
				'ring_size' => '',
				'ring_style' => '',
				'available_size' => '',
				'measurements' => '',
				'weight' => '',
				'length' => '',
				'width' => '',
				'chain_type' => '',
				'back_type' => '',
				'hoop_diameter' => '',
				'chain_style' => '',
				'chain_length' => '',
				'chain_purity' => '',
				'chain_weight' => '',
				'stone' => '',
				'gemstone_type' => '',
				'image1' => !empty($ring->image1)?$ring->image1:'',
				'image2' => !empty($ring->image2)?$ring->image2:'',
				'image3' => !empty($ring->image3)?$ring->image3:'',
				'image4' => !empty($ring->image4)?$ring->image4:'',
				'image5' => !empty($ring->image5)?$ring->image5:'',
				'image6' => !empty($ring->image6)?$ring->image6:'',
				'diamond_number' => '',
				'made_in' => '',
				'quality' => !empty($ring->side_stone_quality)?$ring->side_stone_quality:'',
				'ring_model' => '',
				'heart_width' => '',
				'ring_height' => '',
				'head_dimensions' => !empty($ring->center_stone_dimension)?$ring->center_stone_dimension:'',
				'center_stone_sizes' => !empty($ring->center_stone_size)?$ring->center_stone_size:'',
				'have_img' => 'N',
				'jm_ebay_id' => '',
				'RhodiumPolish' => '',
				'clarity' => '',
				'cut' => '',
				'setting_type' => '',
				'heart_height' => '',
				'chain_metal' => '',
				'chain_width' => '',
				'item_width' => '',
				'item_height' => '',
				'color' => '',
				'date' => date('Y-m-d H:i:s'),
			));
		}
	}

	function merge_overnight_variant() {
		exit;
		$tableName = 'engagement_rings_vintage';
		$getrings =  $this->Diamondmodel->getengRingData2($tableName);
		foreach($getrings as $ring){
			$isinsert = $this->db->insert('dev_overnight_variant', array(
				'product_id' => !empty($ring->style)?preg_replace('/\s+/', '', $ring->style):'',
				'variation' => !empty($ring->variation)?$ring->variation:'',
				'retail_pricing' => !empty($ring->retail_pricing)? str_replace("$","",$ring->retail_pricing):'',
				'metal_type' => !empty($ring->metal_type)?$ring->metal_type:'',
				'metal_color' => !empty($ring->metal_color)?$ring->metal_color:'',
				'finish_level' => !empty($ring->finish_level)?$ring->finish_level:'',
				'diamond_quality' => !empty($ring->diamond_quality)?$ring->diamond_quality:'',
				'category' => !empty($ring->category)?$ring->category:'',
				'subcategory' => !empty($ring->sub_category_1)?$ring->sub_category_1:'',
				'subcategory2' => !empty($ring->sub_category_2)?$ring->sub_category_2:'',
			));
		}
		echo 'FINISHED'.$tableName;
		exit;
	}

	function merge_overnight_data() {
		exit;
		$tableName = 'engagement_rings_vintage';
		$imagePath = 'overnightmount/engagement-rings/vintage';
		$allowed_ext = array('.jpg', '.jpeg', 'gif', 'png');
		$getrings =  $this->Diamondmodel->getengRingData($tableName);
		$part2 = ''; $image = ''; $img1 = ''; $img2 = ''; $img3 = ''; $img4 = ''; $img5 = ''; $img6 = ''; $img7 = ''; $img8 = ''; $img9 = ''; $img10 = ''; $img11 = ''; $img12 = ''; $img13 = ''; $img14 = ''; $img15 = ''; $img16 = ''; $img17 = ''; $img18 = ''; $img19 = ''; $img20 = ''; $video = ''; $video1 = ''; $video2 = ''; $video3 = '';
		foreach($getrings as $ring){
			if(!empty($ring->sub_category_2) && $ring->sub_category_2 != 'Null'){
				$part2 = $ring->sub_category_2;
			}else{
				$part2 = $ring->id;
			}
			$isinsert = $this->db->insert('dev_jewelries', array(
				'ebayid' => '-2',
				'seller_id' => 0,
				'company_id' => 0,
				'category' => !empty($ring->category)?$ring->category:'',
				'subcategory' => !empty($ring->sub_category_1)?$ring->sub_category_1:'',
				'subcategory2' => !empty($ring->sub_category_2)?$ring->sub_category_2:'',
				'item_title' => !empty($ring->style)?preg_replace('/\s+/', '', $ring->style):'',
				'vendor_name' => 'Overnight Mountings',
				'vendor_sku' => '990991',
				'item_sku' => !empty($ring->style)?preg_replace('/\s+/', '', $ring->style).'||'.$part2:'',
				'price_amazon' => !empty($ring->retail_pricing)? str_replace("$","",$ring->retail_pricing):'',
				'price_ebay' => !empty($ring->retail_pricing)? str_replace("$","",$ring->retail_pricing):'',
				'price_website' => !empty($ring->retail_pricing)? str_replace("$","",$ring->retail_pricing):'',
				'category_type' => !empty($ring->category)?$ring->category:'',
				'image1' => !empty($ring->images1)?$imagePath.$ring->images1:'',
				'image2' => !empty($ring->images2)?$imagePath.$ring->images2:'',
				'image3' => !empty($ring->images3)?$imagePath.$ring->images3:'',
				'image4' => !empty($ring->images4)?$imagePath.$ring->images4:'',
				'image5' => !empty($ring->images5)?$imagePath.$ring->images5:'',
				'image6' => !empty($ring->images6)?$imagePath.$ring->images6:'',
				'metal_type' => !empty($ring->metal_type)?$ring->metal_type:'',
				'metal_color' => !empty($ring->metal_color)?$ring->metal_color:'',
				'finish' => !empty($ring->finish_level)?$ring->finish_level:'',
				'quality' => !empty($ring->diamond_quality)?$ring->diamond_quality:'',
				'total_carats' => !empty($ring->total_weight)?$ring->total_weight:'',
				'description' => !empty($ring->product_description)?$ring->product_description:'',
				'approximate_polished_dwt' => !empty($ring->approximate_polished_dwt)?$ring->approximate_polished_dwt:'',
				'components_qty_quality' => !empty($ring->components_qty_quality)?$ring->components_qty_quality:'',
				'semi_mounted' => !empty($ring->total_weight_of_diamonds)?$ring->total_weight_of_diamonds:'',
				'video1' => !empty($ring->videos1)?$ring->videos1:'',
				'video2' => !empty($ring->videos2)?$ring->videos2:'',
				'video3' => !empty($ring->videos3)?$ring->videos3:'',
				'add_date' => date('Y-m-d'),
			));

			if(in_array(strtolower(strrchr($ring->images1,'.')), $allowed_ext)){ $img1 = $ring->images1; }
			if(in_array(strtolower(strrchr($ring->images2,'.')), $allowed_ext)){ $img2 = ';'.$ring->images2; }
			if(in_array(strtolower(strrchr($ring->images3,'.')), $allowed_ext)){ $img3 = ';'.$ring->images3; }
			if(in_array(strtolower(strrchr($ring->images4,'.')), $allowed_ext)){ $img4 = ';'.$ring->images4; }
			if(in_array(strtolower(strrchr($ring->images5,'.')), $allowed_ext)){ $img5 = ';'.$ring->images5; }
			if(in_array(strtolower(strrchr($ring->images6,'.')), $allowed_ext)){ $img6 = ';'.$ring->images6; }
			if(in_array(strtolower(strrchr($ring->images7,'.')), $allowed_ext)){ $img7 = ';'.$ring->images7; }
			if(in_array(strtolower(strrchr($ring->images8,'.')), $allowed_ext)){ $img8 = ';'.$ring->images8; }
			if(in_array(strtolower(strrchr($ring->images9,'.')), $allowed_ext)){ $img9 = ';'.$ring->images9; }
			if(in_array(strtolower(strrchr($ring->images10,'.')), $allowed_ext)){ $img10 = ';'.$ring->images10; }
			if(in_array(strtolower(strrchr($ring->images11,'.')), $allowed_ext)){ $img11 = ';'.$ring->images11; }
			if(in_array(strtolower(strrchr($ring->images12,'.')), $allowed_ext)){ $img12 = ';'.$ring->images12; }
			if(in_array(strtolower(strrchr($ring->images13,'.')), $allowed_ext)){ $img13 = ';'.$ring->images13; }
			if(in_array(strtolower(strrchr($ring->images14,'.')), $allowed_ext)){ $img14 = ';'.$ring->images14; }
			if(in_array(strtolower(strrchr($ring->images15,'.')), $allowed_ext)){ $img15 = ';'.$ring->images15; }
			if(in_array(strtolower(strrchr($ring->images16,'.')), $allowed_ext)){ $img16 = ';'.$ring->images16; }
			if(in_array(strtolower(strrchr($ring->images17,'.')), $allowed_ext)){ $img17 = ';'.$ring->images17; }
			if(in_array(strtolower(strrchr($ring->images18,'.')), $allowed_ext)){ $img18 = ';'.$ring->images18; }
			if(in_array(strtolower(strrchr($ring->images19,'.')), $allowed_ext)){ $img19 = ';'.$ring->images19; }
			if(in_array(strtolower(strrchr($ring->images20,'.')), $allowed_ext)){ $img20 = ';'.$ring->images20; }
			$image = $img1.$img2.$img3.$img4.$img5.$img6.$img7.$img8.$img9.$img10.$img11.$img12.$img13.$img14.$img15.$img16.$img17.$img18.$img19.$img20;
			if(in_array(strtolower(strrchr($ring->videos1,'.')), $allowed_ext)){ $video1 = $ring->videos1; }
			if(in_array(strtolower(strrchr($ring->videos2,'.')), $allowed_ext)){ $video2 = ';'.$ring->videos2; }
			if(in_array(strtolower(strrchr($ring->videos3,'.')), $allowed_ext)){ $video3 = ';'.$ring->videos3; }
			$video = $video1.$video2.$video3;
			if($ring->sub_category_1 == '3 stone'){ $category = 'Three Stone'; }elseif($ring->sub_category_1 == 'MultiRow'){ $category = 'Multi Row'; }else{ $category = $ring->sub_category_1; }

			$isinsert = $this->db->insert('dev_engagement_rings', array(
				'category' => !empty($category)?$category:'',
				'sub_category' => !empty($ring->sub_category_2)?$ring->sub_category_2:'',
				'name' => !empty($ring->product_description)?$ring->product_description .' #'.$ring->style:'',
				'image' => $image,
				'image_path' => $imagePath,
				'video_link' => $video,
				'price' => !empty($ring->retail_pricing)? str_replace("$","",$ring->retail_pricing):'',
				'price_temp' => !empty($ring->retail_pricing)? str_replace("$","",$ring->retail_pricing):'',
				'retail_price' => !empty($ring->retail_pricing)? str_replace("$","",$ring->retail_pricing):'',
				'ring_size' => !empty($ring->ring_size)?$ring->ring_size:'',
				'description' => !empty($ring->product_description)?$ring->product_description .' #'.$ring->style:'',
				'descriptionNdetails' => !empty($ring->product_description)?$ring->product_description .' #'.$ring->style:'',
				'diamond_weight' => !empty($ring->total_weight)?$ring->total_weight:'',
				'diamond_weight_temp' => !empty($ring->total_weight)?$ring->total_weight:'',
				'stone_shape' => !empty($ring->finish_level)?$ring->finish_level:'',
				'side_stone_weight' => '',
				'metal' => !empty($ring->metal_type)?$ring->metal_type:'',
				'setting' => '',
				'item_number' => !empty($ring->style)?$ring->style:'',
				'stone' => 'Diamond',
				'stone_number' => '',
				'diamond_quality' => !empty($ring->components_qty_quality)?$ring->components_qty_quality:'',
				'clarity' => !empty($ring->components_qty_quality)?$ring->components_qty_quality:'',
				'color' => !empty($ring->metal_color)?$ring->metal_color:'',
				'status' => 1,
				'overnight_id' => !empty($ring->style)?$ring->style:'',
				'created_date' => date('Y-m-d H:i:s'),
			));

			$sql = "DELETE FROM ".$tableName." WHERE id = '". $ring->id ."'";
            $this->db->query($sql);
		}
		echo 'FINISHED'.$tableName;
		exit;
	}

	function addvideo_overnight_engagement_rings() {
		exit;
		$image = ''; $img1 = ''; $img2 = ''; $img3 = '';
		$getrings =  $this->Diamondmodel->getengRingData('dev_jewelries');
		foreach($getrings as $ring){
			if(!empty($ring->video1)){ $img1 = $ring->video1; }
			if(!empty($ring->video2)){ $img2 = ';'.$ring->video2; }
			if(!empty($ring->video3)){ $img3 = ';'.$ring->video3; }
			$image = $img1.$img2.$img3;

			$update_query = 'UPDATE dev_engagement_rings SET `video_link` = "'. $image .'" WHERE overnight_id = "'. $ring->stock_number .'"';
			$this->db->query($update_query);
		}
		exit;
	}

	function merge_Unique_Settings_engagement_rings() {
		exit;
		$imagePath = 'scrapper/imgs/'; 
		$image = '';
		$getrings =  $this->Diamondmodel->getuniqueengRingData('dev_us');
		foreach($getrings as $ring){
			print_r($ring);
			if($ring->main_catid == 8){ $category = 'Fancy Shape'; }elseif($ring->main_catid == 9){ $category = 'Semi Mount'; }elseif($ring->main_catid == 39){ $category = 'Antique'; }elseif($ring->main_catid == 40){ $category = 'Halo'; }elseif($ring->main_catid == 52){ $category = 'Solitaire'; }elseif($ring->main_catid == 179){ $category = 'Petite'; }else{ $category = ''; }

			$getcats =  $this->Diamondmodel->getuniqueCatData($ring->main_catid,$ring->catid);
			$getimges =  $this->Diamondmodel->getuniqueImgData(trim($ring->name));
			if(!empty($getimges)){
				$imgArr = array();
				foreach($getimges as $imgs){
					$imgArr[] = $imgs->ImagePath;
				}
				$image = implode(";",$imgArr);
			}
			$getprices =  $this->Diamondmodel->getuniquepriceData(trim($ring->name));
			$isinsert = $this->db->insert('dev_engagement_rings', array(
				'category' => !empty($category)?$category:'',
				'sub_category' => !empty($getcats->catname)?$getcats->catname:'',
				'name' => !empty($ring->name)?trim($ring->name):'',
				'image' => $image,
				'image_path' => $imagePath,
				'price' => !empty($getprices->price)?$getprices->price:'0.00',
				'price_temp' => !empty($getprices->price)?$getprices->price:'0.00',
				'retail_price' => !empty($getprices->priceRetail)?$getprices->priceRetail:'0.00',
				'ring_size' => !empty($ring->ring_size)?$ring->ring_size:'',
				'description' => !empty($ring->name)?trim($ring->name):'',
				'descriptionNdetails' => '',
				'diamond_weight' => '',
				'diamond_weight_temp' => '',
				'stone_shape' => '',
				'side_stone_weight' => !empty($ring->stone_weight)?str_replace(" CT.","",$ring->stone_weight):'',
				'metal' => !empty($ring->metal_weight)?$ring->metal_weight:'',
				'setting' => '',
				'item_number' => !empty($ring->name)?trim($ring->name):'',
				'stone' => 'Diamond',
				'stone_number' => '',
				'diamond_quality' => '',
				'clarity' => '',
				'status' => 1,
				'dev_us_id' => !empty($ring->id)?$ring->id:'',
				'created_date' => date('Y-m-d H:i:s'),
			));
		}
	}

    function inner_page() {
        $data = $this->getCommonData();
   
        $data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
        
        reset_diamond_filters();
        
        $data['home_products'] = file_get_contents(SITE_URL . 'hdering_collections/newArrivalHomeProducts');
        
        $data['page'] = 'home';
        if (strpos($_SERVER["REQUEST_URI"], "diamonds")) {
            //$data['title'] = "Engagement Rings|Diamond|Gold Diamond|Princess|Pink|Blue|Antique Diamond Rings of Engagement";

            $data['meta_tags'] = '
<meta name="title" content="Engagement Rings|Diamond|Gold Diamond|Princess|Pink|Blue|Antique Diamond Rings of Engagement">
<meta name="ROBOTS" content="INDEX,FOLLOW">
<meta name="description" content="Discover the perfect wedding rings & diamond engagement rings for your partner and family at Hearts And Diamonds. Order online or visit us in store today!">
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
';
        } else {
            //$data['title'] = " Buy Diamond Ring|Earrings|Pendant|Three Stone Ring|Online Jewellary Store|Jewellary Ring Online";
            $data['title'] = "Diamond Engagement & Wedding Rings";

            $data['meta_tags'] = '
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
';
        }
		
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'testimonial_id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : '';
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : '';

        $data['results'] = $this->Adminmodel->gettestimonials($page, 2, $sortname, $sortorder, $query, $qtype);
        $rings_cate                 = $this->category_cols_list_view(40);
        $data['ring_categoies']     = $rings_cate['cate_list_view'];

        $perpage_no = $this->input->get('per_page');
        $metal_value = ( !empty($metal_val) ? urldecode($metal_val) : '' );
        $sort_option =  ( ( isset($sort) && !empty($sort) ) ? $sort : 'ASC' );
        $config["per_page"] = ( $perpage > 0 ? $perpage : 10 );     
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );


        $ringresults = $this->Catemodel->getRingsByCateory(39, $startFrom, 10, '', $metal_value, $sort_option); //print_ar($ringresults);
        
        $ring_result = $this->get_unique_ring_listing($ringresults['results']);
        
        $data['ring_listings'] = '<ul class="products-grid prduct-list first last odd">'.$ring_result['ring_listing'].'</ul>';
        
		
        //$output = $this->load->view('diamond/index', $data, true);
        //$output = $this->load->view('diamond/home_page_view', $data, true);
        $output = $this->load->view('diamond/inner_page', $data, true);
        $this->output($output, $data, true);
    }

    function getDiamondCount() {
        $tt_diamond =  $this->session->userdata('total_diamonds');
        echo _nf($tt_diamond);
    }

    ///// get rings listings view according to the category id
    function get_unique_ring_listing( $results = array()) {
        $ringlistings = '';
        
        if( count($results) == 0 ) {
            $ringlistings .= '<div>NO Ring List Found!</div>';
            
            return $ringlistings;
        }
        $total_records  = count( $results );
        $i              = 1;
        $popup_block    = '';
        
        foreach( $results as $rowrings ) {

            $ringlistings .= $this->rings_block( $rowrings );

            $i++;
        }

        $return['ring_listing'] = $ringlistings;
        
        return $return;
    }

    //// rings block
    function rings_block($rowrings=array()) {
        $ringDetail = SITE_URL . 'selection/engagement_ring_detail/' . $rowrings['ring_id'];
        $ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];

        $priceMargin = $this->Commonmodel->inventoryPriceMargin($rowrings['catid'], UNIQUE_OPTION);
        $rowrings['priceRetail'] = $rowrings['priceRetail'] * $priceMargin;
        $retailPrice = _nf($rowrings['priceRetail'] * PRICE_PERCENT, 2);
        $ourPrice = _nf($rowrings['priceRetail'], 2);
        $rid = $rowrings['ring_id'];
        $saving_percent = calc_save_percent( $rowrings['priceRetail'] );
        $cate = $this->getCateName( $rowrings['catid'] );
        $ringTitle = $rowrings['matalType'].' '.$cate['main_cname'] . ' ' . $rowrings['stone_weight'] . ' ' . $cate['sub_cname'] . ' Style';
        //$ringTitle = $this->getRingTitle($rowrings);
        $popupLink = SITE_URL . 'selection/product_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=850&height=600&modal=false';
        $results['item_thumbs'] = $this->Catemodel->getRingThumbs( $rowrings['name'] );
        $product_circle = $this->getProductThumb( $results, 'listing', $rowrings['name'], $ringTitle);
            
                
        $ringlistings = '<li>
                <div class="agile_events_top_grid"> 
                    <div class="w3_agileits_evets_text_img">
                        <a href="#" class="lsb-preview" data-lsb-group="header">
                            <div class="view view-eighth">
                                <a href="'.$ringDetail.'" title="'.$ringTitle.'">
                                    '.$product_circle['thumb_image'].'
                                </a>    
                            </div>
                        </a>
                    </div>
                    <div class="agileits_w3layouts_events_text port_info_agile">
                        <h3><br><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3> 
                        <p><br>$ ' . _nf($rowrings['priceRetail'], 2) . '<p>
                    </div>
                </div>
            </li>';
            
        return $ringlistings;
    }

	///// get category name
    function getCateName( $cid=0 ) {
        $catevalue = array();

        $subparent = $this->Catemodel->getparentCateID( $cid );
        $parent_cid = $this->Catemodel->get_unique_main_cate_id( $cid );
        $catevalue['main_cname'] = $this->Catemodel->getRingCategoryName( $cid );
        $catevalue['sub_cname'] = $this->Catemodel->getRingCategoryName($subparent);        
        $catevalue['main_cid'] = $cid;
        
        $catevalue['sub_cid']  = $subparent;
        if( $cid == 40 || $subparent == 40 ) {
            $catevalue['main_cate_name'] = 'Engagement Rings';
            $catevalue['main_cate_id'] = 40;
        } else if( $cid == 57 || $subparent == 57 ) {
            $catevalue['main_cate_name'] = 'Necklace and Pendants';
            $catevalue['main_cate_id'] = 57;
        } else if( $parent_cid == 63 ) {
            $catevalue['main_cate_name'] = 'Bands';
            $catevalue['main_cate_id'] = 63;
        } else if( $parent_cid == 7 ) {
            $catevalue['main_cate_name'] = 'Engagement Rings';
            $catevalue['main_cate_id'] = 7;
        } else {
            $catevalue['main_cate_name'] = '';
            $catevalue['main_cate_id'] = 0;
        }
        $catevalue['parent_cid'] = $parent_cid;
        //print_ar($catevalue);
        
        return $catevalue;
    }

	/// get product thumb
    function getProductThumb($rowaray=array(), $popup='', $item_id='', $item_title='', $width=215, $height=215, $detail='') {
        $getRingsThumb  = '';
        $check_thumb    = array();
        $ring_title     = $this->getRingTitle( $rowaray );
        $i              = 1;
        $itemID         = trim( $item_id );
        $set_ring_thumb = '';
        $set_popup_thumb = '';
        
        if( count($rowaray['item_thumbs']) > 0 ) {
            foreach( $rowaray['item_thumbs'] as $rng_thumb ) {
                $unique_id = 'bk_'.$i.'_'.$item_id;
                $ringsThumb = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
                $ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
                
                if( !in_array($rng_thumb['ImagePathThumb'], $check_thumb) ) {
                                
                    $active_class = ( $i == 1 ? 'active_view' : 'hide_imgbk' );
                    
                    if( empty($detail) ) { //// check unique detail page
                       $set_ring_thumb = '<img src="'.$ringsView.'" class="img-responsive" alt="'.$item_title.'" />';     
                    } else {
                        $set_ring_thumb = '<img src="'.$ringsView.'" class="img-responsive" alt="'.$item_title.'" />';
                        
                        if( $i == 1 ) {
                            $set_popup_thumb .= '<a href="'.$ringsView.'"><img src="'.SITE_URL.'img/search_plus_ic.png" alt="" width="28" /></a>';
                        } else {
                            $set_popup_thumb .= '<a href="'.$ringsView.'"></a>';
                        }
                    }
                                
                }
                        
                $check_thumb[] = $rng_thumb['ImagePathThumb'];
                            
                $i++;
            }
        } else {
         $getRingsThumb .= '';
        }
        
        $return['thumb_circle'] = $getRingsThumb;
        $return['thumb_image']  = $set_ring_thumb;
        $return['thumbs_popup'] = $set_popup_thumb;
        
        return $return;
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

	function category_cols_list_view($cid=0) {
        
        $ringresults = $this->Catemodel->getSubCategory($cid);
        //print_ar($ringresults);
        
        $catelist_view = '';
        $cateID = array();
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowcate ) {
                $cateImgLink = $this->unique_cate_image( $rowcate['image'] );
                //$detaiLink = SITE_URL.'selection/engagement_ring_listings/'.$rowcate['id']; <img src="'.$cateImgLink.'" alt="'.$ringTitle.'" class="img-responsive" />
                
                $detaiLink = SITE_URL.'selection/engagementrings/'.$rowcate['id'];
                $ringTitle = $rowcate['catname'] . ' Diamond Engagement Rings';
                //$cateImgLink = SITE_URL.'uploads/111_sitelg_6b95b216-059b-43de-9e23-f3f38cf5d086.jpg';
                
                $catelist_view .= '<li>
                    <div class="agile_events_top_grid">
                        <div class="w3_agileits_evets_text_img">
                            <a href="#" class="lsb-preview" data-lsb-group="header">
                                <div class="view view-eighth">
                                    <center>
                                        <a href="'.$detaiLink.'" class="img_block">
                                            <img src="'.$cateImgLink.'" alt="'.$ringTitle.'" class="img-responsive" />
                                        </a>
                                    </center>
                                    <a href="'.$detaiLink.'" class="img_block">
                                        <div class="mask">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </div>
                                    </a>    
                                </div>
                            </a>
                        </div>
                        <div class="agileits_w3layouts_events_text">
                            <h3>'.$ringTitle.'</h3>
                            <p>ENGAGEMENT RINGS</p>
                        </div>
                    </div>
                </li>';

                $cateID[] = $rowcate['id'];
            }
        } else {
            $catelist_view .= 'false';
        }
        
        $catelist['cate_list_view'] = $catelist_view;
        $catelist['cateid'] = $cateID;
                
        return $catelist;
    }

    function unique_cate_image($ring_image='') {
        $cate_img_link = RINGS_IMAGE.'crone/'.$ring_image;
        if( !empty($ring_image) ) {
            $cateImgLink = ( getimagesize($cate_img_link) ? $cate_img_link : SITE_URL.'images/no_img_found.jpg' );
        } else {
            $cateImgLink = SITE_URL.'images/no_img_found.jpg';
        }
        return $cateImgLink;
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
            $data['meta_tags'] = '
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
	';
	    $data['radomprodects'] = $this->Jewelleriesmodel->getrandomproduct($settingsid);//for random product display on right
            $output = $this->load->view('diamond/bomiadvancesearch-new', $data, true);
            $this->output($output, $data, false, false);
        } else {
            $data['title'] = "diamond anniversary band|diamond bridal sets|diamond solitaire pendant| blue diamond jewelry";
            $data['meta_tags'] = '
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
	';

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

    function get_fancy($color){
        $all_pro = $this->Commonmodel->select_where('*','dev_index',array('Fancy_Color'=>$color));
        print $all_pro; exit;
    }
    
    function output($layout = null, $data = array(), $isleft = false, $isright = true) {
        $data ['loginlink'] = $this->User->loginhtml();
        $output = $this->load->view($this->config->item('template') . 'header', $data, true);
        if ($isleft)
            $output .= $this->load->view($this->config->item('template') . 'left', $data, true);
        $output .= $layout;
        if ($isright)
            $output .= $this->load->view($this->config->item('template') . 'right', $data, true);
        $output .= $this->load->view($this->config->item('template') . 'footer', $data, true);
        $this->output->set_output($output);
		//$this->output->cache(120);
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

	function search($details = false, $shape = '', $option = '', $ispremium = true, $settingsid = '') {
		$this->session->unset_userdata('diamonds_type');
		$this->session->set_userdata('claritymax', 9);
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
        $data['max_depth'] = 89;
        $data['min_carat'] = (!empty($caratCol['mins']) ? $caratCol['mins'] : 0.07 ); //45;
        $data['max_carat'] = 15; //$caratCol['maxs']; //80;
        $data['min_table'] = (!empty($tablePrce['mins']) ? $$tablePrce['mins'] : 0 );
        $data['max_table'] = (!empty($tablePrce['maxs']) ? $$tablePrce['maxs'] : 83 );
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
        if( in_array ($option, $adoptionSet) ) { /// 3 stone rings paired seting
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
		//// pendant link
		$arpendant_link = array('addpendantsetings','addpendantsetings3stone','tothreestone');
		$sidestone_option = array('toearring','tothree_stone','addpendantsetings_3stone');
		$url_position = strpos($curr_urlink, 'inner_Diamonds_10');
		$curent_link = ( ( $url_position === false ) ? $curr_urlink : '' );
		
		$setingID = ( is_numeric($settingsid) ? $settingsid : 'HELLO' );
		
		if( is_numeric($settingsid) ) {
			//echo 'true';
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
				$data['pendan_stepsbar'] = '<br>' . stepsBuildToThrestone($step_no, 'tothreestone', $settingsid);
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

        $page_file_name = 'bomiadvancesearch-new';
        switch ($option) {
            case 'tothreestone' :
                $this->session->set_userdata('caratmin', .5);
                $this->session->set_userdata('caratmax', 3.50);
                $minprice = (($this->session->userdata('searchminprice')) ? $this->session->userdata('searchminprice') : 250);
                $maxprice = (($this->session->userdata('searchmaxprice')) ? $this->session->userdata('searchmaxprice') : 1000000);
                $page_file_name = 'diamond_search_new_page';

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
                    'ispremium' => false);
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
        
        $set_page_title = $this->session->userdata('set_page_title');
        $pageTitle = "Diamond Anniversary Band";
        $data['title'] = ( !empty($set_page_title) ? $set_page_title : $pageTitle );
        $metaTags = diamond_set_meta_tags($shape); // diamond section helper
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
			'.$metaTags.'
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
            $output = $this->load->view('diamond/'.$page_file_name, $data, true);
            $this->output($output, $data, false, false);
        } else {
			$data['meta_tags'] = '<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
			<meta name="title" content="diamond anniversary band|diamond bridal sets|diamond solitaire pendant| blue diamond jewelry">
			<meta name="ROBOTS" content="INDEX,FOLLOW">
			<meta name="description" content="Buy online fair trade diamond, loose gia diamond, wholesale certified diamonds,
			diamond anniversary band, diamond bridal sets, diamond solitaire pendant, blue diamond jewelry. Purchase discounted rate diamond anniversary band, diamond bridal sets, diamond solitaire pendant, blue diamond jewelry">
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

	/* view diamond pendant details */
	function viewPendantsDiamondDetail($lot='',$add_option='',$setting_id='', $lot2='') {
		$lot 				= urldecode($lot);
		$lot2 				= urldecode($lot2);
		$data['lot'] 		= $lot;
		$data['addoption']  = $add_option;
		$data['settingsid'] = $setting_id;
		$row_detail = $this->Diamondmodel->getDetailsByLot($lot);
		$data['row_detail'] = $row_detail;
		/* $data['row_sdiamond'] = $this->Diamondmodel->getSimilarDiamonds($lot,$row_detail['shape'],$row_detail['clarity'],$row_detail['Cert']); */
		$data['row_sdiamond'] = $this->Diamondmodel->getSimilarDiamonds($row_detail);
		$image_path = config_item('base_url').'images/shapes_images/';
		$coloredm_imgpath = config_item('base_url').'img/diamond_shapes/';
		$data['diamond_shape'] = view_shape_value($view_diamondimg, $row_detail['shape']);
		$image_dmshape = strtolower($data['diamond_shape']);
		$image_cltype = getDiamondColr($row_detail['fcolor_value']);

		if($row_detail['fcolor_value'] != '' && $setting_id === 'fancy_color') {
			$data['diamond_type'] = 'Colored Diamond';
			$shape_image = $coloredm_imgpath.$image_cltype.'_'.$image_dmshape.'.jpg';
			$data['view_shapeimage'] = ( getimagesize($shape_image) ? $shape_image : $coloredm_imgpath.'dm_noimage.jpg' );
		} else {
			$data['diamond_type'] = 'White Diamond';
			if($row_detail['is_lab_diamond'] == 1){
				$data['view_shapeimage']	= $row_detail['image_url'];
				$data['diamond_shape'] = $row_detail['shape'];
			}elseif($row_detail['image_url'] != ''){
				$data['view_shapeimage']	= $row_detail['image_url'];
				$data['diamond_shape'] = $row_detail['shape'];
			}else{
				if($row_detail['shape'] == 'Round'){
					$data['view_shapeimage']	= $image_path.'actual-dime.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Princess'){
					$data['view_shapeimage']	= $image_path.'princesss.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Cushion'){
					$data['view_shapeimage']	= $image_path.'cushion_cut_diamond.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Radiant'){
					$data['view_shapeimage']	= $image_path.'radiant.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Emerald'){
					$data['view_shapeimage']	= $image_path.'emeraled.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Pear'){
					$data['view_shapeimage']	= $image_path.'pear.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Oval'){
					$data['view_shapeimage']	= $image_path.'pear.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Asscher'){
					$data['view_shapeimage']	= $image_path.'asscher.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Marquise'){
					$data['view_shapeimage']	= $image_path.'marquise.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else if($row_detail['shape'] == 'Heart'){
					$data['view_shapeimage']	= $image_path.'heart.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}else{
					$data['view_shapeimage']	= $image_path.'dm_noimage.jpg';
					$data['diamond_shape'] = $row_detail['shape'];
				}
			}
		}

		if($lot2 != '') {
			$data['row_detail2'] = $this->Diamondmodel->getDetailsByLot($lot2);
			$data['bothdm_price'] = '$'._nf( $data['row_detail']['price'] + $data['row_detail2']['price'] );
			$option_setting = resetOptionValue($add_option);
			$data['moredt_link'] = config_item('base_url').'diamonds/diamondpair_moredetail/'.$lot.'/'.$option_setting.'/'.$setting_id.'/'.$lot2;
			$data['moredt_link2'] = config_item('base_url').'diamonds/diamondpair_moredetail/'.$lot.'/'.$option_setting.'/'.$setting_id.'/'.$lot2;
			//$data['diamond_shape2'] = view_shape_value($view_diamondimg, $data['row_detail2']['shape']);
			if($data['row_detail2']['is_lab_diamond'] == 1){
				$data['view_shapeimage2']	= $data['row_detail2']['image_url'];
				$data['diamond_shape2'] = $data['row_detail2']['shape'];
			}elseif($data['row_detail2']['image_url'] != '' && file_exists($data['row_detail2']['image_url'])){
				$data['view_shapeimage2']	= SITE_URL . $data['row_detail2']['image_url'];
				$data['diamond_shape2'] = $data['row_detail2']['shape'];
			}else{
				if($data['row_detail2']['shape'] == 'Round'){
					$data['view_shapeimage2']	= $image_path.'actual-dime.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Princess'){
					$data['view_shapeimage2']	= $image_path.'princesss.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Cushion'){
					$data['view_shapeimage2']	= $image_path.'cushion_cut_diamond.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Radiant'){
					$data['view_shapeimage2']	= $image_path.'radiant.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Emerald'){
					$data['view_shapeimage2']	= $image_path.'emeraled.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Pear'){
					$data['view_shapeimage2']	= $image_path.'pear.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Oval'){
					$data['view_shapeimage2']	= $image_path.'pear.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Asscher'){
					$data['view_shapeimage2']	= $image_path.'asscher.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Marquise'){
					$data['view_shapeimage2']	= $image_path.'marquise.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else if($data['row_detail2']['shape'] == 'Heart'){
					$data['view_shapeimage2']	= $image_path.'heart.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}else{
					$data['view_shapeimage2']	= $image_path.'dm_noimage.jpg';
					$data['diamond_shape2'] = $data['row_detail2']['shape'];
				}
			}
			$data['sidestone_carat'] = $row_detail['carat'] + $data['row_detail2']['carat'];
			$page_filename = 'view3stone_pendantdetail';
		} else {
			$settings_ar = array('','fancy_color','addtoring','addpendantsetings3stone','tothreestone');
			$pagerdLink = ( ( in_array($setting_id,$settings_ar) || in_array($add_option,$settings_ar)) ? 'diamonds/diamond_detail/' : 'jewelry/build_owndiamond_pendant/');
			$data['detail_pglink'] = config_item('base_url').$pagerdLink.$row_detail['lot'].'/'.$add_option.'/'.$setting_id;
			$data['addto_dmlink']  = $data['detail_pglink'];
			$page_filename = 'viewpendants_detail';
		}
		$output = $this->load->view('diamond/'.$page_filename, $data, true);
        $this->output->set_output($output);
	}

	////// diamond paire more detail page
	function diamondpair_moredetail($lot='', $addoption='', $settingid='', $lot2='') {
		//$data = $this->getCommonData();	
		$lot 				= urldecode($lot);
		$lot2 				= urldecode($lot2);
		$settingid			= urldecode($settingid);
		$data['dmrow_detail'] = $this->Diamondmodel->getDetailsByLot($lot);
		$data['dmrow_detail2'] = $this->Diamondmodel->getDetailsByLot($lot2);
		$image_path = config_item('base_url').'images/shapes_images/';
		$data['diamond1_detail'] = getCutValue($data['dmrow_detail']['cut']).' CUT . '.$data['dmrow_detail']['color'].' COLOR . '.$data['dmrow_detail']['clarity'].' CLARITY';
		$data['diamond2_detail'] = getCutValue($data['dmrow_detail2']['cut']).' CUT . '.$data['dmrow_detail2']['color'].' COLOR . '.$data['dmrow_detail2']['clarity'].' CLARITY';
		$data['total_dmprice'] = '$ '._nf($data['dmrow_detail']['price'] + $data['dmrow_detail2']['price']);
		$data['next_date'] = nextDate();
		if($data['dmrow_detail']['shape'] == 'Round'){
			$data['pair_image']	= $image_path.'actual-dime.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Princess'){
			$data['pair_image']	= $image_path.'princesss.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Cushion'){
			$data['pair_image']	= $image_path.'cushion_cut_diamond.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Radiant'){
			$data['pair_image']	= $image_path.'radiant.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Emerald'){
			$data['pair_image']	= $image_path.'emeraled.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Pear'){
			$data['pair_image']	= $image_path.'pear.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Oval'){
			$data['pair_image']	= $image_path.'pear.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Asscher'){
			$data['pair_image']	= $image_path.'asscher.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Marquise'){
			$data['pair_image']	= $image_path.'marquise.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else if($data['dmrow_detail']['shape'] == 'Heart'){
			$data['pair_image']	= $image_path.'heart.jpg';
			$data['diamond1_shape'] = $data['dmrow_detail']['shape'];
		}else{
			$data['pair_image']	= $image_path.'dm_noimage.jpg';
			$data['diamond1_shape'] = $row_detail['shape'];
		}
		//$data['diamond1_shape'] = view_shape_value($view_diamondimg, $data['dmrow_detail']['shape']);
		$data['diamond2_shape'] = $data['dmrow_detail2']['shape'];
		$data['clarity_box'] = $this->clarityBox($data['dmrow_detail']['clarity']);
		$data['clarity2_box'] = $this->clarityBox($data['dmrow_detail2']['clarity']);
		$data['color_box'] = $this->setColor($data['dmrow_detail']['color']);
		$data['color2_box'] = $this->setColor($data['dmrow_detail2']['color']);
		$data['cut_box'] = $this->cutBox($data['dmrow_detail']['cut']);
		$data['cut2_box'] = $this->cutBox($data['dmrow_detail2']['cut']);
		//$data['pair_image'] = config_item('base_url').pair_shape_value($data['dmrow_detail']['shape']);
		$data['total_carat'] = $data['dmrow_detail']['carat'] + $data['dmrow_detail2']['carat'];
		$data['addoption'] = $addoption;
		
		if(strcmp($addoption,'toearring') === 0) {
			$choose_dmlink = 'jewelry/search/'.$settingid.'/'.$lot.'/'.$lot2.'/'.$addoption;
			//$choose_dmlink = 'jewelry/complete_earings/'.$settingid.'/'.$lot.'/'.$lot2.'/'.$addoption;
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
		$options_ar = array('addpendantsetings_3stone', 'addpendantsetings3stone');
		if(in_array($addoption, $options_ar)) {
			$data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant(3, 'threestone');
		} else if(strcmp($addoption,'tothreestone') === 0) {
			$data['pendan_stepsbar'] = '<br>' . stepsBuildToThrestone(3, 'tothreestone', $settingid, 0, $lot, $settingid, $lot2);
		} else {
			$solitair = ( $addoption == 'toearring' ? 'toearring' : 'solitaire' );
			$data['pendan_stepsbar'] = '<br>' . stepsRowBuildPendant(3, $solitair);
		}
		
		$data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/jquery.min.js" type="text/javascript"></script>';
		$data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/accordian_tabsjs.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
		
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';	
		
		//$data['simlars_diamondpair'] = getSimilarDiamondsListRows($lot, $lot2, $addoption, $settingid, 'diamond');
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
		 /*
          echo($details."&nbsp;<br />");
          echo($shape."&nbsp;testshape<br />");
          echo($option."&nbsp;option<br />");
          echo($ispremium."&nbsp;premium<br />");
          echo($settingsid);
         */
		 //echo current_url();
		 
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
            $data['meta_tags'] = '
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
	';
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
			
			$fancy_color_intens = ( count($fcolor_listinten) > 0 ? $fcolor_listinten : $fancy_colorIntens );
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
		if(count($fancyColorOverTone) > 0) {
			foreach($fancyColorOverTone as $row_ot) {
				$listFancyColorOT .= '<option value="'.$row_ot['fancy_color_ot'].'" '.selectedOption($row_ot['fancy_color_ot'],$diamond_overtone).'>'.$row_ot['fancy_color_ot'].'</option>';
			}
		} else {
			$listFancyColorOT .= '<option value="">No Overtone Found</option>';
		}		
		$listFancyColorIntens = '<option value="">Select Intensity</option>';
		if(count($fancy_color_intens) > 0) {
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
            $data['meta_tags'] = '
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
	';

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
		//echo 'intes:'.$this->session->userdata('diamond_intensity').' : overtone:'.$over_tone.' : color : '.$colrName;
		
		$rdLink = explode('demo.jewelercart.com',$redirectLink);
		
		echo str_replace('/?', '', $rdLink[1]);
		//redirect($rdLink[1], 'refresh');
	}
	
	function getRapnetColAray($column_ar, $field) {
		$fancy_colist = array();
		if(count($column_ar) > 0) {
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
        $rp = isset($_POST ['rp']) ? $_POST ['rp'] : 50;
        $sortname = isset($_POST ['sortname']) ? $_POST ['sortname'] : 'price';
        $sortorder = ( ( isset($_POST ['sortorder']) && !empty($_POST ['sortorder']) ) ? $_POST ['sortorder'] : 'asc' );
	    $sort_order = ( $sortname == 'price' && $sortorder == 'asc' ? 'asc' : $sortorder );
        $query = isset($_POST ['query']) ? $_POST ['query'] : '';
        $qtype = isset($_POST ['qtype']) ? $_POST ['qtype'] : 'title';
		$page_name = ( $settingsid === 'fancy_color' ? '' : 'search' );
        $results = $this->Diamondmodel->getSearch($page, $rp, $sortname, $sort_order, $settingsid, $query, $qtype, '', $addoption, $page_name,$fcolr);
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

		$options_arlist = array('toearring','tothree_stone','addpendantsetings_3stone');
		if(in_array($addoption, $options_arlist)) {
            $rc = false;
            $result = array_chunk($results ['result'], 2);
            foreach ($results ['result'] as $row) {
                $matchstone = $this->Diamondmodel->getEarRingSideStone($row);
                if ($matchstone) {
                    $row2 = $matchstone;
					$cimage = trim($row ['certimage']);
                    $cimage2 = trim($row2 ['certimage']);
                    $shape = $this->getShape($row ['shape']);
                    $settingsid = ($settingsid != '') ? $settingsid : 'false';
                    if ($rc)
                    $json .= ",";
                    $json .= "\n {";
                    $json .= "lot:'" . $row ['lot'] . "',";
                    $json .= "cell:['<input type=\'checkbox\' name=\'products[]\' onclick=\"earing_compare_diamond_list(\'".$row ['lot']."\', \'false\', \'".$addoption."\', \'".$settingsid."\', \'".$row2['lot']."\')\" value=\'" . $row ['lot'] . "\'>'";
					
					$json .= ",'" . $shape . "'";
					$json .= ",'" . addslashes( _nf($row['carat']+$row2['carat'], 2) ) . "'";
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
                    $json .= ",'$" . addslashes (number_format(round($row ['price']+$row2['price']))) . "'";
                    $json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamonds\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\',\'". $row2 ['lot']."\')\">" . "Details" . "</a>'";	
                    $json .= ",'" . addslashes($row ['pricepercrt']) . '<br>' . addslashes($row2 ['pricepercrt']) . "'";
                    $json .= ",'']";
                    $json .= "}";
                    $rc = true;
                }
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

				if($addoption == 'addtoring'){
					$settingsid = ($settingsid != '') ? $settingsid : 'false';
					if ($rc)
						$json .= ",";
						$json .= "\n {";
						$json .= "lot:'" . $row ['lot'] . "',";
						$json .= "cell:['<input type=\'checkbox\' onclick=\"listComparedDimaond(\'".$row ['lot']."\', \'false\', \'".$addoption."\', \'".$settingsid."\')\" name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(" . $row ['lot'] . ",\'" . $addoption . "\'," . $settingsid . ")\" ></a>'";
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
							$json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamonds\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\', \'\')\">" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
						} else {
							$json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamonds\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\', \'\')\">" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
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
				}else{
					$settingsid = ($settingsid != '') ? $settingsid : 'false';
					if ($rc)
						$json .= ",";
						$json .= "\n {";
						$json .= "lot:'" . $row ['lot'] . "',";
						$json .= "cell:['<input type=\'checkbox\' onclick=\"listComparedDimaond(\'".$row ['lot']."\', \'false\', \'".$addoption."\', \'".$settingsid."\')\" name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(" . $row ['lot'] . ",\'" . $addoption . "\'," . $settingsid . ")\" ></a>'";
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
							$json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamonds\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\', \'\')\">" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
						} else {
							$json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamonds\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\', \'\')\">" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
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
            }
            $json .= "]\n";
            $json .= "}";

            echo $json;
        }
    }
	
	function BKUPRKgetsearchresult($addoption = '', $settingsid = '',$fcolr='') {
        $page = isset($_POST ['page']) ? $_POST ['page'] : 1;
        $rp = isset($_POST ['rp']) ? $_POST ['rp'] : 50;
        $sortname = isset($_POST ['sortname']) ? $_POST ['sortname'] : 'price';
        $sortorder = ( ( isset($_POST ['sortorder']) && !empty($_POST ['sortorder']) ) ? $_POST ['sortorder'] : 'asc' );
	    $sort_order = ( $sortname == 'price' && $sortorder == 'asc' ? 'asc' : $sortorder );
        $query = isset($_POST ['query']) ? $_POST ['query'] : '';
        $qtype = isset($_POST ['qtype']) ? $_POST ['qtype'] : 'title';
		$page_name = ( $settingsid === 'fancy_color' ? '' : 'search' );
        $results = $this->Diamondmodel->getSearch($page, $rp, $sortname, $sort_order, $settingsid, $query, $qtype, '', $addoption, $page_name,$fcolr);
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

		$options_arlist = array('toearring','tothree_stone','addpendantsetings_3stone');
		if(in_array($addoption, $options_arlist)) {
            $rc = false;
            $result = array_chunk($results ['result'], 2);
            foreach ($results ['result'] as $row) {
                $matchstone = $this->Diamondmodel->getEarRingSideStone($row);
                if ($matchstone) {
                    $row2 = $matchstone;
					$cimage = trim($row ['certimage']);
                    $cimage2 = trim($row2 ['certimage']);
                    $shape = $this->getShape($row ['shape']);
                    $settingsid = ($settingsid != '') ? $settingsid : 'false';
                    if ($rc)
                    $json .= ",";
                    $json .= "\n {";
                    $json .= "lot:'" . $row ['lot'] . "',";
                    $json .= "cell:['<input type=\'checkbox\' name=\'products[]\' onclick=\"earing_compare_diamond_list(\'".$row ['lot']."\', \'false\', \'".$addoption."\', \'".$settingsid."\', \'".$row2['lot']."\')\" value=\'" . $row ['lot'] . "\'>'";
					
					$json .= ",'" . $shape . "'";
					$json .= ",'" . addslashes( _nf($row ['carat'], 2) ) . "'";
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
                    $json .= ",'$" . addslashes (number_format(round($row ['price']))) . "'";
                    $json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamonds\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\',\'". $row2 ['lot']."\')\">" . "Details" . "</a>'";	
                    $json .= ",'" . addslashes($row ['pricepercrt']) . '<br>' . addslashes($row2 ['pricepercrt']) . "'";
                    $json .= ",'']";
                    $json .= "}";
                    $rc = true;
                }
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
                    $json .= "cell:['<input type=\'checkbox\' onclick=\"listComparedDimaond(\'".$row ['lot']."\', \'false\', \'".$addoption."\', \'".$settingsid."\')\" name=\'products[]\' value=\'" . $row ['lot'] . "\'><a href=\"#\" onclick=\"viewDiamondDetails(" . $row ['lot'] . ",\'" . $addoption . "\'," . $settingsid . ")\" ></a>'";
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
						$json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamonds\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\', \'\')\">" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
					} else {
						$json .= ",'<a href=\"#vdiamond_detail\" onclick=\"viewPendantDiamondDetail(\'diamonds\', \'" . $row ['lot'] . "\',\'" . $addoption . "\',\'" . $settingsid . "\', \'\')\">" . "<img src=\"".IMGSRC_LINK."view_detail.jpg\" alt=\"Details\" />" . "</a>'";
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

	/////// list down the diamond for comparison
	function listComparedDimaond($diamond_id='', $returns='', $adoption='', $seting='', $side_stone2='') {
		$return = ( ( $returns == 'false' || empty($returns) ) ? '' : $returns );
		$lots_id = urldecode( $diamond_id ); //$this->input->post('products', TRUE);
		if(isset($_POST['products']) && !empty($_POST['products'])) {
			$this->session->set_userdata('lots_id', $_POST['products']);	
		}

		$lotid_list = $this->session->userdata('lots_id');
		$compare_list = '';
		$options_list = array('toearring');
		$diamLot = array();

		if(!empty($lotid_list)){
			foreach($lotid_list as $dmlot) {
				$dmlot = urldecode( trim($dmlot) );
				$diamLot[] = $dmlot;
				$row_dt = $this->Diamondmodel->getDetailsByLot($dmlot);
				
				if( empty($return) ) {
					if(in_array($adoption, $options_list)) {
						$viewDetaiLink = '<a href="#vdiamond_detail" onclick="viewPendantDiamondDetail(\'diamonds\', \''.$row_dt['lot'].'\',\'toearring\',\''.$seting.'\',\''.$side_stone2.'\')">Details</a>';
					} else {
						if( empty($row_dt['fcolor_value']) ) {
							$viewDetaiLink = '<a href="#vdiamond_detail" onclick="viewPendantDiamondDetail(\'diamonds\', \''.$row_dt['lot'].'\', \''.$adoption.'\', \''.$seting.'\', \'\')">Details</a>';
							} else {
								$viewDetaiLink = '<a href="#vdiamond_detail" onclick="viewPendantDiamondDetail(\'diamonds\', \''.$row_dt['lot'].'\',\'addtoring\',\'fancy_color\', \'\')">Details</a>';
							}
					}
					
					$compareLink = '';
						
				} else {
					$adoption = ( $adoption != '' ? $adoption : 'false' );
					$setting_id = ( $seting != '' ? $seting : 'false' );
					if( $return == 'search') {
						$viewDetaiLink = '<a href="#vdiamond_detail" onclick="viewPendantDiamondDetail(\'diamonds\', \''.$row_dt['lot'].'\',\'\',\'false\', \'\')">Details</a>';
						$compareLink = '';
					} else {
						$viewDetaiLink = '<a href="'.config_item('base_url').'diamonds/diamond_detail/'.$dmlot.'/'.$adoption.'/'.$setting_id.'">Details</a>';
						$compareLink = '<td width="10%" align="center"><a href="'.config_item('base_url').'diamonds/search/true/'.$row_dt['shape'].'">Compare</a></td>';	
					}
				}
				if( $adoption === 'toearring' ) {
					$compare_list .= $this->get_earring_diamond_detail_row($row_dt, $compareLink, $viewDetaiLink, $side_stone2);
				} else {
					$compare_list .= $this->get_diamond_detail_row($row_dt, $compareLink, $viewDetaiLink);
				}
			}
			$this->Diamondmodel->save_diamond_comparison( $diamLot );
		} else {
			//$compare_list = '<div class="clear"></div><div class="chDiamond">Choose Diamonds to Compare</div>';
		}
		
		if($return == '' && $return != 'search') {
			echo $compare_list;
		} else {
			return $compare_list;
		}
	}

    function get_earring_diamond_detail_row($row_dt=[], $compareLink='', $viewDetaiLink='', $side_stone2='') {
        $diamond_shape = view_shape_value($view_diamondimg, $row_dt['shape']);
        $diamondType = ( $row_dt['fcolor_value'] == '' ? 'White' : 'Color' );
        $rowdt2 = $this->Diamondmodel->getDetailsByLot($side_stone2);
        $total_price = $row_dt['price'] + $rowdt2['price'];
        $wirePrice = _nf( wire_price($total_price) );
        //$compare_list = '';
        
        $compare_list .= '<tr>';
        $compare_list .= '<td width="7%">'.$diamondType.'</td>
                            <td width="10%">'.$diamond_shape.'</td>
                            <td width="8%">'._nf($row_dt['carat'], 2) . '<br>' . _nf($rowdt2['carat'], 2) .'</td>
                            <td width="8%" align="center">'.$row_dt['color'] . '<br>' . $rowdt2['color'] .'</td>
                            <td width="9%" align="center">'.$row_dt['clarity'] . '<br>' . $rowdt2['clarity'] .'</td>
                            <td width="7%" align="center">'.$row_dt['Cert'] . '<br>' . $rowdt2['Cert'] .'</td>
                            <td width="10%" align="center">'.$row_dt['cut'] . '<br>' . $rowdt2['cut'] .'</td>
                            <td width="11%" align="center">$'. _nf($total_price) .'</td>
                            <td width="11%" align="center">$'.$wirePrice.'</td>
                            <td width="9%" align="center">'.$viewDetaiLink.'</td>';
        $compare_list .= $compareLink.'</tr>';
        
        return $compare_list;                                        
    }

    function get_diamond_detail_row($row_dt=[], $compareLink='', $viewDetaiLink='') {
        $diamond_shape = view_shape_value($view_diamondimg, $row_dt['shape']);
        $diamondType = ( $row_dt['fcolor_value'] == '' ? 'White' : 'Color' );
        $wirePrice = _nf( wire_price($row_dt['price']) );
        //$compare_list = '';
        
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
        
        return $compare_list;                                        
    }

    //// empty compare list
    function emptyCompareList() {
		$this->session->unset_userdata('lots_id');
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
        $data ['extraheader'] = '<script src="' . config_item('base_url') . 'js/interface.js" type="text/javascript"></script>
								<script src="' . config_item('base_url') . 'js/swfobject.js" type="text/javascript"></script>';
        $data ['onloadextraheader'] = "$('#fisheye').Fisheye(
				{
					maxWidth: 50,
					items: 'a',
					itemsText: 'span',
					container: '.fisheyeContainter',
					itemWidth: 40,
					proximity: 90,
					halign : 'center'
				}
			) ;
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
			so = new SWFObject(\"" . config_item('base_url') . "flash/3-58-172.swf\", \"test\", \"240\", \"190\", \"8\", \"#fff\");

			";
        $data ['title'] = "Diamond Wedding Ring|Wedding Ring Sets|Loose Diamond Wholesale|Discount Loose Diamonds";
        $data['meta_tags'] = '
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
	';

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
                //$data['nexturl'] = config_item('base_url').'/diamonds/addthisdiamond/'.$addoption.'/'.$lot.'/'.$settingsid;
                $data ['nexturl'] = config_item('base_url') . 'jewelry/pendantdetailsview/' . $addoption . '/' . $lot . '/' . $settingsid;
                //$data['onclickfunction'] = 'addtocart(\''.$addoption.'\','.$lot.',false,false,'.$settingsid.',false)';
                //$this->session->set_userdata('addoption',$addoption);
                $data ['linkhtml'] = '';
                break;
            case 'addpendantsetings3stone' :
                $data ['pageheader'] = 'Build Your Own Diamond Pendant';
                $data ['nexturl'] = config_item('base_url') . '/diamonds/searchsidestone/' . $lot . '/' . $addoption . '/' . $settingsid;
                $this->session->set_userdata('addoption', $addoption);
                $data ['linkhtml'] = '';
                break;
            /* case 'toearring':
              $data['pageheader'] = 'Build Your Earring';
              $data['nexturl'] = '#';
              $this->session->set_userdata('addoption',$addoption);
              $data['linkhtml']='';
              break; */

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
				      	      		 </div>

									';
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
        //$centerstone = $basket['threestonering']['centerstone'];
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
        //$centerstone = $basket['threestonering']['centerstone'];
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
					echo $row->lot; 
					$count = $count + 1;
					echo "<br>"; 
				}
			}
			echo $count;
		}
    }

    function searchbylot($lot) {
        $start = ($page == 'undefined') ? 0 : $page;
        $data ['diamond'] = $this->Diamondmodel->getDetailsByLot($lot);
        print_r($data['diamond']);
        $data ['sidestones'] = $this->Diamondmodel->getAllSideStonesNew($data ['diamond'], $start);
        print_r($data['sidestones']);

        $alldamnstones = $data ['sidestones'];
        
        return $data ['sidestones'];

    }

	function getDetailsByLot($lot){
		$qry = "SELECT * FROM ".config_item('table_perfix')."index WHERE lot = '".$lot."'";
		$result = 	$this->db->query($qry);
		$return = $result->result_array();
		var_dump($return);
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
		if(count($newTempResults['result']) > 0) {
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
		if(isset($shapelist) && empty($clarity)) $clarity = " 1=1"; 
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

    function getsidestoneresult($lot, $page = 0, $pendantsettingsid = '', $addoption = '') {
        //echo '<pre>';
        $start = ($page == 'undefined') ? 0 : $page;
        $data ['diamond'] = $this->Diamondmodel->getDetailsByLot($lot);
        $data ['sidestones'] = $this->Diamondmodel->getAllSideStonesNew($data ['diamond'], $start);

        $alldamnstones = $data ['sidestones'];
        //print_r($data ['sidestones']);
        $allsidestones = $this->Diamondmodel->getAllSideStonesNew($data ['diamond'], $start);

        //$addoption = ($pendantsettingsid == '') ? 'tosidestone' : 'addpendantsetings3stone';

        $returnhtml = '';
        $data ['result'] = $allsidestones;
        $paginlinks = $this->Sitepaging->getPageing(floor($allsidestones ['count'] / 2), 'sidestones', $start, 'lot', 10);
        $returnhtml .= $paginlinks . '<div class="hr"></div>';

        $sidestones = isset ($alldamnstones['result'])?$alldamnstones['result']:"";
        //echo '<pre>';
        //echo $start;
        //print_r($sidestones);
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
            //print_r($sidestones);
            /*
              echo("<pre>");
              //print_r($allsidestones);

              foreach($mysidestones as $mytwosidestone)
              {
              if(isset($mytwosidestone[1]) && isset($mytwosidestone[0]))
              print_r($mytwosidestone[0]);
              }
              echo("</pre>"); */

            foreach ($sidestones as $sidestone) {
                if (isset($sidestone[0]) && isset($sidestone[1])) {
                    $sidestone1 = $sidestone[0];
                    $sidestone2 = $sidestone[1];
                    $totalWeight = floatval($sidestone1['carat']) + floatval($sidestone2['carat']);
                    // $totalSideStoneWeight = $sidestone1['carat'] + $sidestone2['carat'];

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
        } else {
            $returnhtml .= '<tr>
		 						<td colspan="8">No side stone found</td>
		 					</tr>';
        }
        $returnhtml .= '	</table>
						</div>';

        echo $returnhtml;
    }

    function sidestonedetailsajax($sidelot1 = '', $sidelot2 = '', $addoption = '', $centerlot = '', $pendantsettingsid = '') {
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
                header('location:' . config_item('base_url') . 'addtocart/' . $lot . '/false/false/' . $pendantsettingsid . '/false/false/' . $addoption);
                break;
            case 'addpendantsetings3stone' :
                header('location:' . config_item('base_url') . 'addtocart/' . $lot . '/false/false/' . $pendantsettingsid . '/' . $sidelot1 . '/' . $sidelot2 . '/' . $addoption);
                break;
            default :
                $addoption = 'addloosediamond';
                header('location:' . config_item('base_url') . 'addtocart/' . $lot . '/false/false/false/false/false/' . $addoption);
                break;
        }

        //$output = $this->load->view('diamond/index' , $data , true);
        print_r($data);
        $this->output($output, $data);
    }

    function viewchart($lot) {
        //get_
        $data = $this->Diamondmodel->getDetailsByLot($lot);
        $chart = trim($data['certimage']);
        $linktype = explode('.', $chart);
        $imagetype = array('jpg', 'jpeg', 'png', 'gif', 'pjpeg');
        $imgext = $linktype[(count($linktype) - 1)];
        // exit;
        if (!in_array($imgext, $imagetype)) {
            $chart = @file_get_contents($chart);
        } else {
            $chart = '<img src="' . $chart . '"  />';
        }
        ?>
        <div class="infobox01 floatl width830px">Diamond Certificate Information</div>
        <div class="clear"></div>
        <div class="smallheight"></div>
        <div class="brownback width830px" style="overflow:scroll"> <?= $chart ?> &nbsp;</div>
        <div><br></div>
        <div class="clear"></div>
        <?php
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

        //$output = $this->load->view('diamond/thanks' , $data , true);
        $this->output ( $output, $data,true );

        }
		
		function overnight($page_name='') {
		
        $data['diamond_page_name'] = 'overnight';
        $data['title'] = 'Overnight';
		
		
		$output = $this->load->view('overnight/engagement-rings', $data, true);
		
        $this->output($output, $data, true);
		$this->output->cache(120);
    }
	
	
	
	
    function overnight_realtime($page_name='') {
		
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 20;
			$offset = 0;
		}

		$where_diamonds	=  array('ABS(id) >' => 0);
		if(isset($_POST['amount_min']) && !empty($_POST['amount_min'])){
			$amount_min	= array('ABS(price) >' => $_POST['amount_min']);
            $where_diamonds	= array_merge($where_diamonds, $amount_min);
        }
        if(isset($_POST['amount_max']) && !empty($_POST['amount_max'])){
			if($_POST['amount_max'] == 9999){
				$amount_max	=  array('ABS(price) <' => 999990);
			}else{
				$amount_max	=  array('ABS(price) <' => $_POST['amount_max']);
			}
            $where_diamonds	= array_merge($where_diamonds, $amount_max);
        }
		if(isset($_POST['categoryArr']) && !empty($_POST['categoryArr']) ){
            $wherein1 = $_POST['categoryArr'];
        }else{
			$wherein1 = array();
		}
		if(isset($_POST['stoneShapeArr']) && !empty($_POST['stoneShapeArr']) ){
            $wherein2 = $_POST['stoneShapeArr'];
        }else{
			$wherein2 = array();
		}
		if(isset($_POST['metalArr']) && !empty($_POST['metalArr']) ){
            $wherein3 = $_POST['metalArr'];
        }else{
			$wherein3 = array();
		}
		if(isset($_POST['settingStyleArr']) && !empty($_POST['settingStyleArr']) ){
            $wherein4 = $_POST['settingStyleArr'];
        }else{
			$wherein4 = array();
		}

		if(isset($params['search']) && $params['search']['value'] != ""){
			$search	= array('item_number LIKE' => $params['search']['value']);
            $where_diamonds	= array_merge($where_diamonds, $search);
        }

		$sort = '';$sortby = '';
		if(isset($_POST['sort_by']) && !empty($_POST['sort_by'])){
			$sort = 'price';
			$sortby = $_POST['sort_by'];
        }elseif(isset($_POST['amount_min']) && $_POST['amount_min'] > 0){
			$sort = 'price';
			$sortby = 'ASC';
		}else{
			$sort = 'rand()';
			$sortby = '';
		}

       // $get_toal_data =  $this->Diamondmodel->countengagedring($where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, 'dev_overnight_new', 'id');
		//$get_diamond_list =  $this->Diamondmodel->getovernightData('dev_overnight_new', $where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $limit, $offset, $sort, $sortby);
		
		
		$sql = "SELECT * FROM `dev_overnight_new` WHERE `category_id`=6";
		
	
		$result = $this->db->query($sql);
		 $get_diamond_list = $result->result_array();
		 
		 echo "<pre>";
		 print_r($get_diamond_list);
		 die();
		 
		
		
		$main_amount = 0; $offer_price = 0; $view1_shapeimage = ''; $view_shapeimage = ''; $view_shapeimagepop = '';
        foreach($get_diamond_list as $diamonds){
			$ringName = !empty($diamonds['description'])?$diamonds['description']:$diamonds['name'];
			if(!empty($diamonds['image'])){
				$images = explode(";",$diamonds['image']);
				$view1_shapeimage = '';
				if(isset($images[0]) && $images[0] != ''){
					$view1_shapeimage = $images[0];
				}elseif(isset($images[1]) && $images[1] != ''){
					$view1_shapeimage = $images[1];
				}
				if($view1_shapeimage == ''){
					$view1_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
				$view_shapeimagepop = '';
				if(isset($images[1]) && $images[1] != ''){
					$view_shapeimagepop = $images[1];
				}elseif(isset($images[2]) && $images[2] != ''){
					$view_shapeimagepop = $images[2];
				}
				if($view_shapeimagepop == ''){
					$view_shapeimagepop = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
				$view_shapeimage = '';
				if(isset($images[2]) && $images[2] != ''){
					$view_shapeimage = $images[2];
				}elseif(isset($images[3]) && $images[3] != ''){
					$view_shapeimage = $images[3];
				}elseif(isset($images[4]) && $images[4] != ''){
					$view_shapeimage = $images[4];
				}
				if($view_shapeimage == ''){
					$view_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				}
			}else{
				$view1_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				$view_shapeimage = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
				$view_shapeimagepop = "". SITE_URL ."resize.php/images/no_image.jpeg?width=220&height=220&image=/images/no_image.jpeg";
			}
			$view1_shapeimage = str_replace("xlarge","standard",$view1_shapeimage);
			$view_shapeimage = str_replace("xlarge","standard",$view_shapeimage);
			$view_shapeimagepop = str_replace("xlarge","standard",$view_shapeimagepop);
			if($diamonds['dev_us_id'] > 0){
				$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$diamonds['name']."' AND id = '".$diamonds['dev_us_id']."' ";
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
				$main_amount = $finalsemiMountprce;
				$offer_price = $main_amount+225;
			}else{
				$main_amount = $diamonds['price'];
				$offer_price = $diamonds['price'];
			}

			$make_html	= '<div class="per-product" onmouseover="showoverlayin('.$diamonds['id'].')" onmouseout="showoverlayout('.$diamonds['id'].')">
				<div class="thumbnail-out had-matchheight" data-pid="'.$diamonds['id'].'" style="height: 394px;">
					<div class="thumbnail" id="thumbnail_'.$diamonds['id'].'">
						<div class="ir218-snippet-property google-event-tracker review-star clk_through" data-toggle="review-star" data-category="Listing Page" data-action="Click" data-label="Click Review Stars">
							<span class="ir218-snippet-stars">
								<a href="'.SITE_URL.'selection/engagement-rings-detail/'.$diamonds['id'].'" style="background-position:left -130px;" class="ir218-stars ir218-stars-small" aria-label="Review"></a>
							</span>
						</div>
						<span class="heart niwl" onclick="addwhishlist('.$diamonds['id'].')" data-toggle="wishlist" data-product="'.$diamonds['id'].'" data-remove-related="true">
							<span class="iconfont iconfont-heart"></span><span class="txt">want</span>
						</span>
						<span></span>
						<div class="item-dis">
							<div class="gl-jCarouselLite5">
								<div class="custom-container widget nonCircular">
									<div class="mid">
										<a href="'.SITE_URL.'selection/engagement-rings-detail/'.$diamonds['id'].'" class="clk_through top_lg pdp_url" data-image="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" data-side-image="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" data-category="Listing Page" data-action="Click" data-label="Engagement Ring|Click to PDP">
											<span class="modal-product-superposition load-sync load-overlay load-base">
												<img alt="'.$ringName.'" data-original="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" width="250" height="250" class="img-responsive center-block lazyload loaded" style="width:250px;height:250px; display: block; opacity: 1;" data-load="load-base">
												<img alt="'.$ringName.'" id="img_'.$diamonds['id'].'" class="img-responsive upper lazyload loaded" style="width:250px;height:250px;" data-original="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" data-load="load-overlay">
											</span>
										</a>
									</div>
									<div class="thumbnail-list">
										<div class="carousel jCarouselLite">
											<ul>
												<li><a href="javascript:void(0)" class="active is_top_pic" onmouseover="bigImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\''.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img alt="'.$ringName.'" data-big-img="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'"></a></li>
												<li><a class="is_hand_pic" href="javascript:void(0)" onmouseover="bigImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimagepop.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img style="width: 100%; height: 100%;" alt="'.$ringName.'" class="lazyload loaded" data-big-img="'.$view_shapeimagepop.'" data-original="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimagepop.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimagepop.'">
												</a></li>
												<li><a href="javascript:void(0)" class="is_side_pic" onmouseover="bigImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimage.'\',\''.$diamonds['id'].'\')" onmouseout="normalImg(\'https://images.jewelercart.com/scrapper/imgs/'.$view1_shapeimage.'\',\''.$diamonds['id'].'\')"><img alt="product thumbnail side image" class="lazyload loaded" data-big-img="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimage.'" data-original="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimage.'" src="https://images.jewelercart.com/scrapper/imgs/'.$view_shapeimage.'" style=""></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="caption">
								<a href="'.SITE_URL.'selection/engagement-rings-detail/'.$diamonds['id'].'" class="clk_through">
									<small class="firstline"></small>
									<div class="limit">
										<span class="h3 title1">'.$ringName.'</span>
										<small class="old_splite">Engagement Ring <span class="metal">('.$diamonds['diamond_weight'].')</span> </small>
										<div style="line-height: 16px;"><b>SKU:</b> <a href="'. SITE_URL .'selection/engagement-rings-detail/'.$diamonds['id'].'" style="color: #0a2b49;">'.$diamonds['item_number'].'</a></div>
									</div>
								</a>
								<span class="money">$'._nf($offer_price).'</span>
							</div>
						</div>
					</div>
				</div>
			</div>';

			$make_array  = array(
				'0'	=> $make_html
			); 
	        $data[] = $make_array;	
        }

		$json_data = array(
			"draw"				=> intval($params['draw']),
			"recordsTotal"		=> intval($get_toal_data),
			"recordsFiltered"	=> intval($get_toal_data),
			"data"				=> $data
		);
	    echo json_encode($json_data);
    }
	
}
