<?php
/**
* class used for displaying jewelleries entered by the sellers...
* @param string
* @return string
* @since 24, March 2013
* @Author Maninder Singh
*/
class Qualitygold extends CI_Controller{
	
	function __construct(){
		
        parent::__construct();
        $this->load->library("pagination");
        $this->load->model("qualitymodel");
        $this->load->helper("url");
        $this->load->helper("t_helper");
        $this->load->helper('directory');
        
        $this->session->unset_userdata('buildring');
        
	}
        
    //// view rings via category list
    function qgold_cate($cates_id="", $start=0)
    {
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        
        $data = $this->getCommonData();
        //$perPage = get_var('per_page');
        $quality_catelist  = $this->qualitymodel->qualityGoldCateList( $cates_id );
        
        $data['leftring_category'] = accordian_left_menu('quality');
        
        $quality_cate = '';
        $qgImage = get_trial_user_logo();
        
        if( count($quality_catelist) > 0 ) {
         foreach( $quality_catelist as $rowcate ) {
             $detaiLink = SITE_URL.'qualitygold/qgold_cate/'.$rowcate['id'];
             $qgringImage = ( !empty($rowcate['image']) ? QUALITY_IMGS . $rowcate['image'] : SITE_URL.'images/noimage_found.jpg' );
             
        $quality_cate .= '<div class="engagement-product col-sm-4">
            <div class="image-engagement">
			<div class="setringsbg_bk">'.$qgImage.'</div>
			<a href="'.$detaiLink.'">&nbsp;<img src="'.$qgringImage.'" alt="'.$rowcate['title'].'" width="155" hight="144"></a>
            <meta class="desc" content="">
            </div>
            <div class="dw-arrow"><img src="'.SITE_URL.'images/down-ar.png" align="Down Arrow"></div>
            <div class="price-product ringprice-section">
              <p class="ring-engagement"><a href="'.$detaiLink.'">'.$rowcate['title'].'</a></p>
              <div></div>
              </div>
          </div>';
         }
       } else {
           $qgoldprod  = $this->qualitymodel->qualityGoldProdList( $cates_id );
           if( count($qgoldprod['results']) > 0 ) {
               header('Location:'.SITE_URL.'qualitygold/qgold_product/'.$cates_id);
           } else {
                $quality_cate = 'No Quality Gold Category / products Found';                
           }
       }
        //echo $quality_cate; exit;
       $data['quality_rings_cate'] = $quality_cate;
       $data['cate_name'] = $this->product_cate_list_link( $cates_id );
       
        $output = $this->load->view('qualitygold/qgoldcategory', $data, true);//new
        $this->output($output, $data);
    }
    
    //// show the quality product list
    function qgold_product($cates_id="", $start=0)
    {
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
        //$this->output->cache(5); // Will expire in 60 minutes	
        
        $data = $this->getCommonData();
        $perPage = get_var('per_page');
        $data['parentcate_name'] = '';
        $data['leftring_category'] = accordian_left_menu('quality');
        $cate_name = $this->qualitymodel->getCateName( $cates_id );
        $data['cate_name'] = $this->product_cate_list_link( $cates_id );

        $this->session->unset_userdata('buildring');

        $config["per_page"] = 12;
        $config["num_links"] = 5;
        $config["uri_segment"] = 5;
        $config['use_page_numbers'] = TRUE;
        $startListing = ( !empty($perPage) ? $perPage * $config["per_page"] : 0 );
        $ringresults = $this->qualitymodel->qualityGoldProdList($cates_id, $startListing, $config["per_page"]);
        
        $config["total_rows"] = $ringresults['total'];
        $config["base_url"] = SITE_URL."qualitygold/qgold_product/".$cates_id."/?s=1";
        $config['display_pages'] = TRUE;
        
        $getparent_cate = '';
        $style_cateid = '';
        $data["maincate_name"] = '';
        $data["cates_name"] = '';
        $data["cates_stnam"] = '';
        $data["cates_stname"] = '';
        $data["ttpages"] = '';
        $data["getparent_cate"] = '';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        ////// unique collections fields and functionality
        $offs_se = $this->session->set_userdata('some_name', $off_set);

        $data['results_rings'] = $ringresults['results'];

        $data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/hover_prodetail.js"></script>';
        $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
        $this->pagination->initialize($config); 
        $data['pagination_links'] = '';
        $data['paginate_links'] = $this->pagination->create_links();
        
        $this->session->unset_userdata('search_string');
        $output = $this->load->view('qualitygold/qgold_listings', $data, true);//new
        $this->output($output, $data);
    }
    
    ///// quality detail
  function quality_detail($id=0)
   {
   $this->session->unset_userdata('shape');
   //$this->output->cache(5);
   $burl = config_item('base_url');
   
   	$data = $this->getCommonData();
   	$rowquality = $this->qualitymodel->qualityProductDetail($id);
	
	$burl = SITE_URL;
	$data['ring_id'] = $id;
        $rowcate = $this->qualitymodel->getCateName( $rowquality['catid'] );
        $data['prod_cate'] = $rowcate['title'];
        $data['cate_name'] = $this->product_cate_list_link( $rowquality['catid'] );
	$this->session->set_userdata('ringID',$id);
	$d_id = $this->session->userdata('diamnd_id');
	$dm_id = ( !empty($d_id) ? $d_id : 'false' );
        $data['quality_link'] = 'qualitygold/quality_detail/'.$id;
	
	$data['sbparent_catename'] = '';
	$data['sbparent_style'] = '';
	
	if( strcmp( 'Three Stones', $sbparent_catename ) === 0 ) 
	{
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'diamonds/search/true/false/tothreestone/true/'.$id);
		$this->session->set_userdata('build_3stone', 'unique');
	} else {
		$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$id.'/addtoring/');
	}
	$data['catgory_id']  = '';
	$data['buynow_link'] = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
	
	if(!empty($st)) {
            $data['seting_type'] = ucwords( str_replace('_', ' ', $st) );
	}
	
	///////////
   	$data['uniqueprice'] = $rowstuller['Price'];
	$data['ring_sizes'] = '';
   	//echo $data['details']['data'][0]['style_group'];
	//$data['radomprodects'] = $this->jewelleriesmodel->getrandomproduct($id);//for random product display on right
	$data['cuprice'] = $rowstuller['Price'];
	$data['subparent_id'] = $subparent;
        
        $data ['extraheader'] = '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.elevatezoom.js" type="text/javascript"></script>';
        $data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jscmagnifier.js" type="text/javascript"></script>';
        
	////// get rings metal list
	$getRingsMetal = '';	
	$getRingsSize = '';
		
	////// item thumbs
	$getRingsThumb = '';
        
$getRingsThumb .= '<a href="#javascript;" onclick="ringThumbView(\''.QUALITY_IMGS.$rowquality['large_image'] .'\')"><img src="'.QUALITY_IMGS.$rowquality['small_image'].'" alt="" /></a>';

	$data['ring_thumbs'] = $getRingsThumb;
	$data['details'] = $rowquality;
	$data['ringPriceView'] = $rowstuller['price'];
	$getSimilarProd = $this->qualitymodel->qualitySimilartProduct($id, $rowquality['catid']);
	$similarProdList = '';
	
	if( count($getSimilarProd) > 0 ) {
		foreach($getSimilarProd as $rowsimilar) {
		$stulerImage = QUALITY_IMGS.$rowsimilar['small_image'];
			$detailRingLink = SITE_URL.'qualitygold/quality_detail/'.$rowsimilar['id'];
			
			$similarProdList .= '<div class="prodBlock col-sm-4">
                        <div class="imgBlock"><a href="'.$detailRingLink.'"><img src="'.$stulerImage.'" alt="'.$rowsimilar['title'].'" width="155" hight="144"></a></div>
                        <div class="prodLable">'.wordwrap($rowsimilar['title'],25,"<br>\n").'<br />
                          <span>';
						  	if($rowsimilar['price'] > 0) {
								$unPrice = 'Price: $ '.number_format($rowsimilar['price'],2);
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
	
	//// center stond shapes list
	$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
	$view_ctshape = '';
	$shapPath = config_item('base_url').'img/diamond_shapes/';
	$ctstone_shape = $data['details']['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
	
	$getsp_shpe = unrings_diamond_shape($getring_shape);
	$getsp_shape = $center_stshapes[$getring_shape];
	//print_r($find_ctsahpe);
	//// supported shapes
	$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
	$spstone_arlist = array($getsp_shape);
	
	$i=0;
	
	////// get user comments
	$rings_coments = $this->catemodel->getComentsListView($id);
	$view_coments = '';
	
	if( count($rings_coments) > 0 ) {
		foreach($rings_coments as $row_coments) {
			$view_coments .= '<div class="reviews_block">
                                            <div class="reviews_label">
                                              <div><img src="'.SITE_URL.'img/page_img/stars_icon.png" /></div>
                                              <div class="dateLabel">'.date('d M, Y', strtotime($row_coments['coment_date'])).',</div>
                                            </div>
                                            <br />
                                            <div class="reviewHeading">This is comments review about</div>
                                            <div class="reviewData">'.$row_coments['post_comments'].'</div>
                                      </div>';
		}
	} else {
		$view_coments = '<div class="reviewData">NO COMMENTS LIST ADDED</div>';
	}
	
	 //// get customer info
	$this->load->model('user');
	$data['row_cust'] = $this->user->saveCustomerInfo('view'); 
	$data['view_coments'] = $view_coments;
	$data['view_ctshape'] = $view_ctshape;
	$data['similarProdList'] = $similarProdList;
	$data['buildring'] = $this->session->userdata('buildring');
	$this->load->view($this->config->item('template').'header' , $data);
	$this->load->view('qualitygold/qualityrings_details' , $data);
	$this->load->view($this->config->item('template').'footer', $data);
	
   	//$this->output($out , $data);
   }
   
   //// get main and parent category name list
   function product_cate_list_link($cid=0) {
       $cate_name = '<li><a href="' . SITE_URL . 'qualitygold/qgold_cate/4">Quality Gold Jewelry</a></li>';
       
        $rowcate = $this->qualitymodel->getCateName( $cid );
        $parentcate = $this->qualitymodel->getCateName( $rowcate['pid'] );
        if( !empty($parentcate['title']) ) {
            $cate_name .= '<li><a href="' . SITE_URL . 'qualitygold/qgold_cate/'.$parentcate['id'].'">'.$parentcate['title'].'</a></li>';
        } else {
            $cate_name .= '';
        }
        $cate_name .= '<li><a href="' . SITE_URL . 'qualitygold/qgold_cate/'.$cid.'">'.$rowcate['title'].'</a></li>';
        
        return $cate_name;
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
}
