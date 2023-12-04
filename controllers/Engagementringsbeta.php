<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Engagementringsbeta extends CI_Controller {
	public $sign_upform = '';

	function __construct() {
		parent::__construct();
		$this->sign_upform = signup_form();
		$this->load->model('engagementringsbetamodel');
		$this->session->unset_userdata('whsale_section');
		$this->load->helper('diamond_section');
		$this->load->helper('ringsection');
		$this->load->helper('contentsection');
		$phone_from_admin = get_site_contact_info('contact_info'); 
		define('CONTACT_NO', $phone_from_admin);
	}

	function engagement_rings($page_name='') {
        $data['diamond_page_name'] = 'engagement-rings';
        $data['title'] = "Engagement Rings";

        $output = $this->load->view('beta/engagement-rings', $data, true);
        $this->output($output, $data, true);
    }
    function getRingTitle($rowring=array(), $similar='') {
    $cate   = $this->getCateName( $rowring['catid'] ); 
    if( empty($similar) ) {
        $rtitle = $rowring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring '.$rowring['stone_weight'].' '.$cate['sub_cname'] .' Style';
    } else {
      $rtitle = $rowring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique <br>Engagement Ring '.$rowring['stone_weight'].' '.$cate['sub_cname'] .' Style';
    }   
       return $rtitle;
    }
    
    //// popular listings
    function popularListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        $similar_rings = '';
        
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
               $detaiLink = SITE_URL . 'testengagementrings/engagement-ring-detail/' . $rowring['ring_id'];
               $ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
               $ring_title = $this->getRingTitle($rowring, 'similar');
               $retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['priceRetail'];
               //$saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupBlock = $this->product_popup_detail( $rowring['ring_id'] );
               $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
               $cate = $this->getCateName( $rowring['catid'] );
               //$detailDesc = 'Metal '. $rowring['matalType'] . ' ' . $rowring['metal_weight']. ' Stone '. $rowring['stone_weight'];
               $results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowring['name'] );
               $product_circle = $this->getProductThumb( $results, 'listing', $rowring['name'], $ring_title);
              
                if($rowring['additional_stones'] == ''){
                    $where_dev_index             = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
                    $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
                }else{
            
                    $additional_stones_ex = explode('/', $rowring['additional_stones']);
                    $additional_stones_first_item   = explode('-', $additional_stones_ex['0']);
                    $additional_stones_first_item2   = $additional_stones_first_item['1']; 
                    
                    $check_count = 0;
                    for($i=1; $i<5; $i++){
                        $where_dev_index             = array('price !=' => '', 'color !=' => '');
                        $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_by_where_like_after('dev_index', $where_dev_index, $i, $check_count, $additional_stones_first_item2, 'Meas');
                        
                        $additional_meas_ex         = explode('x', $get_dev_index_info->Meas);
                        $dev_index_meas             = str_replace('.', 'x', $additional_meas_ex['0']);
                        $result_new_index_meas      = substr($dev_index_meas['0'], 0, 3);
                        
                        $check_count = $check_count + 1;
                        
                        if($additional_stones_first_item2 == $result_new_index_meas){
                            break;
                        }
                        
                    } 
                    
                    if(empty($get_dev_index_info)){
                        $where_dev_index             = array('carat' => '0.25', 'price !=' => '', 'color !=' => '');
                        $get_dev_index_info          = $this->catemodel->getdata_any_table_limit_order_where('dev_index', $where_dev_index, '1', '0', 'price');
                    }
                } 
                $get_diamond_price  = $get_dev_index_info['0']->price;
                $get_diamond_price  = $get_diamond_price * 1.10;

                $ourPriceNew = _nf($ring_ourprice + $get_diamond_price, 2);
               
//            $similar_rings .= '<div class="product_colsbk">
//                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"></a></div>
//                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg" alt=""><span class="reviewlabel">(86 Review)</span></div><br>
//                        <div>$ '. _nf($ring_ourprice, 2).'</div>
//                        <div class="setcolor_label">+ Engagement Ring</div><br>
//                        <div class="centerLabel"><a href="'.$detaiLink.'">'.$ring_title.'</a></div>
//                        <div class="setcolor_label">'.$detailDesc.'</div>
//                    </div>';
               $similar_rings .= '<div class="ring_cols col-sm-3" onmouseover="show_collection_block(\'hover_'.$rowring['ring_id'].'\')" onmouseout="hide_block(\'hover_'.$rowring['ring_id'].'\')">
                    <div><a href="'.$detaiLink.'">
                    <div class="set_thumb_img" id="'.$rowring['ring_id'].'">
                        '.$product_circle['thumb_image'].'
                    </div>    
                    </a></div>
                    <div class="clear"></div>
                    <div>'.$ring_title.'</div>
                    <div style="display:none;"><img src="'.SITE_URL.'img/heart_diamond/matching_ring_star.jpg" alt="" /></div><br>
                    <div class="ring_price_label">$'. $ourPriceNew.'</div>
                    <div>Complementary Match</div>
                    ' . $this->get_ring_hover_view($rowring, $cate['sub_cname'], $rowring['ring_id'], $ringImageLink, $ring_title, $results, $popupLink) . '
                </div>' . $popupBlock;
            
            }
        }
        
        return $similar_rings;
    }
     function get_ring_hover_view($rowrings=array(), $style_name='', $rid=0, $ringsImg='', $ringTitle='', $results='', $popupLink='') {
        
        
        
        $ring_hover = '<div class="collection_hover_bk" id="hover_'.$rid.'">
        <div class="view_count">1/'.count($results['item_thumbs']).'</div>
        <div class="quick_view"><a href=" '.SITE_URL().'testengagementrings/engagement-ring-detail/'.$rid.'" title="'.$ringTitle.'" rel="nofollow">Quick <br> View</a></div>
        <div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\''.$rowrings['ring_id'].'\'); show_number_count(\'hover_'.$rowrings['ring_id'].'\', \''.count($results['item_thumbs']).'\', \'back\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_icon.jpg" alt="" /></a></div>
        <div class="right_arrow_view"><a href="#javascript" onclick="button_next(\''.$rowrings['ring_id'].'\'); show_number_count(\'hover_'.$rowrings['ring_id'].'\', \''.count($results['item_thumbs']).'\', \'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_icon.jpg" alt="" /></a></div>
             <form name="form1" id="form_'.$rid.'" method="post">
             <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$style_name.'" />
             <input type="hidden" name="3ez_price" value="" />
             <input type="hidden" name="5ez_price" value="" />
             <input type="hidden" name="main_price" value="'.$rowrings['priceRetail'].'" />
             <input type="hidden" name="price" value="'.$rowrings['priceRetail'].'" />
             <input type="hidden" name="vender" value="unique" />
             <input type="hidden" name="url" value="'.$ringsImg.'" />
             <input type="hidden" name="prodname" value="'.$ringTitle.'" />
             <input type="hidden" name="diamnd_count" value="'.$rowrings['supplied_stones'].'" />
             <input type="hidden" name="ring_shape" value="" />
             <input type="hidden" name="ring_carat" value="" />
             <input type="hidden" name="prid" id="prid" value="'.trim($rowrings['ring_id']).'" />
             <input type="hidden" name="txt_ringtype" value="generic_ring" />
             <input type="hidden" name="txt_ringsize" value="" />
             <input type="hidden" name="txt_metal" value="'.$rowrings['metal'].'" />
             <input type="hidden" name="metals_weight" value="'.$rowrings['weight'].'" />
             <input type="hidden" name="vendors_name" value="Unique Jewelry" />
             <input type="hidden" name="center_stone_id" id="center_stone_id" />
             <input type="hidden" name="txt_qty" value="1" />
             </form>
        </div>';
        
        return $ring_hover;
    }
    
    function engagement_rings_realtime($page_name='') {
    	$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start'];
		}else{
			$limit  = 32;
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
		if(isset($_POST['colorsArr']) && !empty($_POST['colorsArr']) ){
            $wherein3 = $_POST['colorsArr'];
        }else{
			$wherein3 = array();
		}
		if(isset($_POST['clarityArr']) && !empty($_POST['clarityArr']) ){
            $wherein4 = $_POST['clarityArr'];
        }else{
			$wherein4 = array();
		}
		if(isset($_POST['ringsizeArr']) && !empty($_POST['ringsizeArr']) ){
            $wherein5 = $_POST['ringsizeArr'];
        }else{
			$wherein5 = array();
		}
		if(isset($_POST['settingsArr']) && !empty($_POST['settingsArr']) ){
            $wherein6 = $_POST['settingsArr'];
        }else{
			$wherein6 = array();
		}
		if(isset($_POST['settingStyleArr']) && !empty($_POST['settingStyleArr']) ){
            $wherein7 = $_POST['settingStyleArr'];
        }else{
			$wherein7 = array();
		}
		if(isset($_POST['metalArr']) && !empty($_POST['metalArr']) ){
            $wherein8 = $_POST['metalArr'];
        }else{
			$wherein8 = array();
		}
		if(isset($_POST['caratWeightArr']) && !empty($_POST['caratWeightArr']) ){
            $wherein9 = $_POST['caratWeightArr'];
        }else{
			$wherein9 = array();
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
    
        $get_toal_data =  $this->engagementringsbetamodel->countengagedring($where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, $wherein6, $wherein7, $wherein8, $wherein9, 'dev_engagement_rings', 'id');
		$get_diamond_list =  $this->engagementringsbetamodel->getengagedringData('dev_engagement_rings', $where_diamonds, $wherein1, $wherein2, $wherein3, $wherein4, $wherein5, $wherein6, $wherein7, $wherein8, $wherein9, $limit, $offset, $sort, $sortby);
        foreach($get_diamond_list as $diamonds){
			$ringName = !empty($diamonds['description'])?$diamonds['description']:$diamonds['name'];
			if(!empty($diamonds['image'])){
				$images = explode(";",$diamonds['image']);
				if($diamonds['costar_id'] > 0){
					if(file_exists('images/'. $diamonds['image_path'].$images[0].'')){
						$view1_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].$images[0];
					}else{
						$view1_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].$images[1];
					}
					if(file_exists('images/'. $diamonds['image_path'].$images[2] .'')){
						$view_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].$images[2];
					}else{
						$view_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].$images[3];
					}
					if(file_exists('images/'. $diamonds['image_path'].$images[2].'')){
						$view_shapeimagepop = SITE_URL .'images/'. $diamonds['image_path'].$images[2];
					}else{
						$view_shapeimagepop = SITE_URL .'images/'. $diamonds['image_path'].$images[3];
					}
				}elseif($diamonds['overnight_id'] > 0){
					if(file_exists('images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
						$view1_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[0]);
					}else{
						$view1_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[1]);
					}
					if(file_exists('images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[2]).'')){
						$view_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[2]);
					}else{
						$view_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[3]);
					}
					if(file_exists('images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[2]).'')){
						$view_shapeimagepop = SITE_URL .'images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[2]);
					}else{
						$view_shapeimagepop = SITE_URL .'images/'. $diamonds['image_path'].str_replace("THUMBNAIL/","",$images[3]);
					}
				}elseif($diamonds['dev_us_id'] > 0){
					if(file_exists(''. $diamonds['image_path'].$images[0].'')){
						$view1_shapeimage = SITE_URL . $diamonds['image_path'].$images[0];
					}else{
						$view1_shapeimage = SITE_URL . $diamonds['image_path'].$images[1];
					}
					if(file_exists(''. $diamonds['image_path'].$images[1] .'')){
						$view_shapeimage = SITE_URL . $diamonds['image_path'].$images[1];
					}else{
						$view_shapeimage = SITE_URL . $diamonds['image_path'].$images[2];
					}
					if(file_exists(''. $diamonds['image_path'].$images[0].'')){
						$view_shapeimagepop = SITE_URL . $diamonds['image_path'].$images[0];
					}else{
						$view_shapeimagepop = SITE_URL . $diamonds['image_path'].$images[1];
					}
				}else{
					if(file_exists('images/'. $diamonds['image_path'].$images[0].'')){
						$view1_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].$images[0];
					}else{
						$view1_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].$images[1];
					}
					if(file_exists('images/'. $diamonds['image_path'].$images[2] .'')){
						$view_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].$images[2];
					}else{
						$view_shapeimage = SITE_URL .'images/'. $diamonds['image_path'].$images[3];
					}
					if(file_exists('images/'. $diamonds['image_path'].'Medium/'.$images[2].'')){
						$view_shapeimagepop = SITE_URL .'images/'. $diamonds['image_path'].'Medium/'.$images[2];
					}else{
						$view_shapeimagepop = SITE_URL .'images/'. $diamonds['image_path'].'Medium/'.$images[3];
					}
				}
			}else{
				$view1_shapeimage = '';
				$view_shapeimage = '';
				$view_shapeimagepop = '';
			}

            /* $main_amount = $diamonds['retail_price']*1.7; */
			$main_amount = $diamonds['retail_price'];
			$offer_price = $main_amount+60;
			$make_html	= '<div class="diamond_result_content">
				<div class="col-sm-12 hover-jewelery-img-area">
					<a href="'.SITE_URL.'engagementringsbeta/engagement-rings-detail/'.$diamonds['id'].'/">
						<img src="'.$view_shapeimage.'" alt="Engagement Ring" style="width:280px;border:solid 1px #ECECEC;" />
						<img src="'.$view1_shapeimage.'" alt="Engagement Ring" class="detl-img2" />
					</a>
					<div class="overlay-quick-view-show overlay-quick-view quickViewModal-'.$diamonds['id'].'">Quick View</div>
					<div class="overlay-quick-view-show overlay-details-view"><a href="'.SITE_URL.'engagementringsbeta/engagement-rings-detail/'.$diamonds['id'].'/">View Details</a></div>
					<div class="overlay-quick-view-show overlay-more-details-view" style="display:none;">
						<h4>'.$ringName.'</h4>
						<div class="hover-price">
							<div class="popup-prices">
								<p class="old-price-qv" style="margin-bottom:0px;line-height: 15px;">
									<span class="price-label-qv">Retail Price:</span>
									<span class="price-qv">$'._nf($diamonds['retail_price']).'</span>
								</p>
								<p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;">    
									<span class="price-label-qv">OUR PRICE:</span>
									<span class="new-price-qv">$'._nf($diamonds['price']).'</span>
									<span class="special-price-label-qv">(Savings: 41.18%)</span>
								</p>
							</div>
						</div>
					</div>
					<style>
					/* Modals ($modals) */
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
								<h4>'.$ringName.'</h4>
							</div>
							<div class="view-diamond-modal-body">
								<div class="view-diamond-modal-content">
									<div id="diamond-slider-box" class="col-sm-6" style="height: 450px;">
										<div id="diamond-slider-area" class="tz-gallery-collection">
											<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">';
											if($diamonds['overnight_id'] > 0){
												if(!empty($diamonds['video_link']) && (strpos($diamonds['video_link'], '.mp4') !== false)){
													$gallery_videos1 = explode(";",$diamonds['video_link']);
													$gallery_videos = array_unique($gallery_videos1);
													if(!empty($gallery_videos)){
														if(file_exists('images/'.$gallery_videos[0])){
															$make_html .= '<a class="lightbox" id="light_a'.$diamonds['id'].'" href="'.$view_shapeimagepop.'"><img alt="diamonds-img" id="light_img'.$diamonds['id'].'" class="" src="'.$view_shapeimagepop.'" style="margin: 0px 0px;width:100%;" /><video width="348" height="348" controls autoplay><source src="'. SITE_URL .'images/'. str_replace("3-stone/","",$gallery_videos[0]) .'" type="video/mp4">Your browser does not support the video tag.</video></a><br>';
														}else{
															$make_html .= '<a class="lightbox" id="light_a'.$diamonds['id'].'" href="'.$view_shapeimagepop.'"><img alt="diamonds-img" id="light_img'.$diamonds['id'].'" class="" src="'.$view_shapeimagepop.'" style="margin: 0px 0px;width:100%;" /><video width="348" height="348" controls autoplay><source src="'. SITE_URL .'images/'. str_replace("3-stone/","",$gallery_videos[1]) .'" type="video/mp4">Your browser does not support the video tag.</video></a><br>';
														}
													}
													$make_html .= '<script type="text/javascript">
													$("a#light_a'.$diamonds['id'].' img").hide();
													</script>';
												}else{
													$make_html .= '<a class="lightbox" id="light_a'.$diamonds['id'].'" href="'.$view_shapeimagepop.'"><img alt="diamonds-img" id="light_img'.$diamonds['id'].'" class="" src="'.$view_shapeimagepop.'" style="margin: 0px 0px;width:100%;" /></a><br>';
												}
											}else{
												$make_html .= '<a class="lightbox" id="light_a'.$diamonds['id'].'" href="'.$view_shapeimagepop.'"><img alt="diamonds-img" id="light_img'.$diamonds['id'].'" class="" src="'.$view_shapeimagepop.'" style="margin: 0px 0px;width:100%;" /></a><br>';
											}
											if(!empty($diamonds['image'])){
												$gallery_imgs1 = explode(";",$diamonds['image']);
												$gallery_imgs = array_unique($gallery_imgs1);
												if(!empty($gallery_imgs)){
													if($diamonds['costar_id'] > 0){
														foreach($gallery_imgs as $gallery_img1){
															if($gallery_img1 != '' && $gallery_img1 != '.'){
																if(file_exists('images/'.$diamonds['image_path'].$gallery_img1)){
																	$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs'.$diamonds['id'].'(\''. SITE_URL .'images/'.$diamonds['image_path'].$gallery_img1 .'\')"> <img src="'. SITE_URL .'images/'.$diamonds['image_path'].$gallery_img1 .'" style="width:55px;height:55px;display: inherit;" alt="'.$diamonds['description'].'" /></a>';
																}
															}
														}
													}elseif($diamonds['overnight_id'] > 0){
														foreach($gallery_imgs as $gallery_img1){
															if (strpos($gallery_img1, '.jpg') !== false) {
																if(file_exists('images/'.$diamonds['image_path'].str_replace("THUMBNAIL/","",$gallery_img1))){
																	$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs'.$diamonds['id'].'(\''. SITE_URL .'images/'.$diamonds['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'\')"> <img src="'. SITE_URL .'images/'.$diamonds['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'" style="width:55px;height:55px;display: inherit;" alt="'.$diamonds['description'].'" /></a>';
																}
															}
														}
													}elseif($diamonds['dev_us_id'] > 0){
														foreach($gallery_imgs as $gallery_img1){
															if (strpos($gallery_img1, '.jpg') !== false) {
																if(file_exists(''.$diamonds['image_path'].$gallery_img1)){
																	$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs'.$diamonds['id'].'(\''. SITE_URL .$diamonds['image_path'].str_replace("THUMBNAIL/","",$gallery_img1) .'\')"> <img src="'. SITE_URL .$diamonds['image_path'].$gallery_img1 .'" style="width:55px;height:55px;display: inherit;" alt="'.$diamonds['description'].'" /></a>';
																}
															}
														}
													}else{
														foreach($gallery_imgs as $gallery_img1){
															if($gallery_img1 != '' && $gallery_img1 != '.'){
																if(file_exists('images/'.$diamonds['image_path'].'Medium/'.$gallery_img1)){
																	$make_html .= '<a href="javascript:void(0);" onclick="ch_imgs'.$diamonds['id'].'(\''. SITE_URL .'images/'.$diamonds['image_path'].'Medium/'.$gallery_img1 .'\')"> <img src="'. SITE_URL .'images/'.$diamonds['image_path'].'Medium/'.$gallery_img1 .'" style="width:55px;height:55px;display: inherit;" alt="'.$diamonds['description'].'" /></a>';
																}
															}
														}
													}
												}
											}
											if(!empty($diamonds['video_link']) && (strpos($diamonds['video_link'], '.mp4') !== false) && $diamonds['overnight_id'] > 0){
												$make_html .= '<a href="javascript:void(0);" onclick="showhidevideo'.$diamonds['id'].'()"><img src="'. SITE_URL .'images/videoimage.jpg" style="width:55px;height:55px;display: inherit;" alt="Show play" /></a>';
											}
										$make_html	.= '</div>
									</div>
									<div class="col-sm-6 pull-right">
										<p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
											<span class="price-label-qv">Item Code:</span>
											<span class="new-price-qv">'.$diamonds['id'].'</span>
											<span class="special-price-label-qv">(Savings: 41.18%)</span>
										</p>
										<p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
											<span class="price-label-qv">Retail Price:</span>
											<span class="new-price-qv">$'._nf($diamonds['retail_price']).'</span>
										</p>
										<p class="old-price-qv" style="margin-bottom:5px;line-height: 15px;font-size:13px;">    
											<span class="price-label-qv">Our Price:</span>
											<span class="new-price-qv">$'._nf($diamonds['price']).'</span>
											<span class="special-price-label-qv">(Savings: 41.18%)</span>
										</p>
										<form id="form_'.$diamonds['id'].'" action="'. SITE_URL .'jewelleries/addtoshoppingcart/" method="">
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
														<input type="hidden" name="vender" value="Diamond Bayou">
														<input type="hidden" name="url" value="'.$view_shapeimage.'">
														<input type="hidden" name="prodname" value="'.$ringName.'">
														<input type="hidden" name="diamnd_count" value="">
														<input type="hidden" name="ring_shape" value="">
														<input type="hidden" name="ring_carat" value="">
														<input type="hidden" name="prid" id="prid" value="'.$diamonds['id'].'">
														<input type="hidden" name="stock_number" id="stock_number" value="">
														<input type="hidden" name="txt_ringtype" value="generic_ring">
														<input type="hidden" name="txt_ringsize" value="">
														<input type="hidden" name="txt_metal" value="Sterling Silver">
														<input type="hidden" name="metals_weight" value="">
														<input type="hidden" name="vendors_name" value="Quality Gold">
														<input type="hidden" name="vendor_number" value="800.354.9833">
														<input type="hidden" name="table_name" value="dev_jewelries">
														<input type="hidden" name="item_title" value="'.$ringName.'">
														<input type="hidden" name="item_url" value="'.SITE_URL.'engagementringsbeta/engagement-rings-detail/'.$diamonds['id'].'/">
														<input type="hidden" name="product_type" value="Serpentine">
														<input type="hidden" name="txt_addoption" value="diamond_agency_jewelers_collection">
														<input type="hidden" name="center_stone_id" id="center_stone_id">
														<input type="hidden" name="txt_qty" value="1">
														<table><thead><tr>
														<th><input type="submit" class="add_to_cart_btn_new" value="Add To Cart"></th>
														<th><a href="'.SITE_URL.'account/account_wishlist/'.$diamonds['id'].'/add/dev_us"><input type="button" class="add_to_cart_btn_new" value="Add to wishlist"></a></th>
														<th><a href="'.SITE_URL.'engagementringsbeta/engagement-rings-detail/'.$diamonds['id'].'/"><input type="button" class="add_to_cart_btn_new" value="More Details"></a></th>
														<th><a href="mailto:"><input type="button" class="add_to_cart_btn_new" value="Email to a Friend"></a></th>
														</tr></thead></table>
													</div>
												</div>
											</div>
										</form>
										<div style="display: inline-block;width:100%;"><b>Item Information</b></div>
											<p>'.$diamonds['descriptionNdetails'].'</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
						<script>
						baguetteBox.run(".tz-gallery-collection");
						</script>
						<script type="text/javascript">
						function ch_imgs'.$diamonds['id'].'(img_src){
							$("a#light_a'.$diamonds['id'].' video").hide();
							$("a#light_a'.$diamonds['id'].' img").show();
							$("#light_img'.$diamonds['id'].'").attr("src", img_src);
							$("#light_a'.$diamonds['id'].'").attr("href",img_src);
						}
						function showhidevideo'.$diamonds['id'].'(){
							if($("a#light_a'.$diamonds['id'].' video").css("display") == "none"){
								$("a#light_a'.$diamonds['id'].' img").hide();
								$("a#light_a'.$diamonds['id'].' video").show();
							} else { 
							   $("a#light_a'.$diamonds['id'].' video").hide();
							   $("a#light_a'.$diamonds['id'].' img").show();
							}
						}
						</script>
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
					<div class="col-sm-12" style="padding:0px 10px;">
						<h4>'.$ringName.'</h4>
						<div class="text-left" style="padding:5px 0px;">';
							if($diamonds['dev_us_id'] > 0){
								$make_html .= '<a href="'.SITE_URL.'selection/engagement-rings-detail/'.$diamonds['id'].'" style="color: #666;font-size: 14px;font-weight: 600;" id="addtoshopping">Please Call for Price Quote</a>';
							}else{
								$make_html .= '<span style="font-size:15px;text-decoration:line-through;">
									<span>Retail Price:</span>
									<span style="font-weight: bold;">$'._nf($diamonds['retail_price']).'</span>
								</span><br>
								<span style="font-size:14px;">
									<span>OUR PRICE:</span>
									<span style="font-weight: bold;">$'._nf($diamonds['price']).'</span>
								</span>';
							}
						$make_html .= '</div>
					</div>
					<div class="col-sm-12">
						<span><a href="'.SITE_URL.'engagementringsbeta/engagement-rings-detail/'.$diamonds['id'].'/" class="addToCartBtn">View Details</a></span>
					</div>
					<div class="clear"></div>
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
    /*
    set filters in session for sorting data 
    such as changing variant 
    */
    function setFilters(){
        if(isset($_POST)){
            $temp = [];
            if(array_key_exists('variant',$_POST)){
                $temp['variation'] = $_POST['variant'];
            }
            if(array_key_exists('metal_type',$_POST)){
                $temp['metal_type'] = $_POST['metal_type'];
            }
            if(array_key_exists('metal_color',$_POST)){
                $temp['metal_color'] = $_POST['metal_color'];
            }
             if(array_key_exists('finish_level',$_POST)){
                $temp['finish_level'] = $_POST['finish_level'];
            }
             if(array_key_exists('diamond_quality',$_POST)){
                $temp['diamond_quality'] = $_POST['diamond_quality'];
            }
            
            $product_id = $_POST['product_id'];
            $overnight_id = $_POST['overnight_id'];
            $ht ='';
            $i=0;
            foreach($temp as $k=>$v){
                $ht .= "( a.".$k." = '".trim($v)."')";
                if($i<count($temp)-1){
                    $ht .=" and ";
                }
                $i++;
            }
          
            $this->db->select('a.*');
            $this->db->from('dev_overnight_variant a');
            $this->db->where($ht);
            $this->db->where('a.product_id',$product_id);
            $query = $this->db->get()->result_array();
            
            $query = (count($query)>0)?$query[0]:[];
            $query['retail_price'] = _nf($query['retail_pricing']*1.4,0);
            $query['price'] = _nf($query['retail_pricing'],0);
            $query['price']=  ($query['price']==null)?0:$query['price'];
            $ezvalue_row = $this->engagementringsbetamodel->getEzOptionValues();
			$first_ez_value = $ezvalue_row[0]['ezvalue'];
			$second_ez_value = $ezvalue_row[1]['ezvalue'];
            $query['3ez'] = _nf($query['retail_pricing']/$first_ez_value, 2);
            $query['5ez'] = _nf($query['retail_pricing']/$second_ez_value, 2);
              echo json_encode(['type'=>'success','tez'=> $query['3ez'],'fez'=>$query['5ez'],'msg'=>$query,'price'=>$query['price'],'retail_price'=>$query['retail_price']]);
        }else{
             echo json_encode(['type'=>'success','msg'=>'value set']);
        }
    }
	function engagement_rings_detail($prod_id=0, $ring_size='6', $ring_metal='14KW', $avsizes=''){
		$product_id = $prod_id;
		
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';

		$ringtype = $this->engagementringsbetamodel->checkRingType($product_id);
//printr($ringtype);
	    
		if(($ringtype->costar_id == 0 && $ringtype->overnight_id == 0 && $ringtype->dev_us_id == 0) || $ringtype->costar_id > 0){
			$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';

			$ezvalue_row = $this->engagementringsbetamodel->getEzOptionValues();
			$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
			$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

			$ringresults = $this->engagementringsbetamodel->getFingerSizeResult();
			$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
			if(count($ringresults) > 0){
				$req_param = '';
				if(!empty($_GET['carat'])){
					if(!empty($_GET)){
						$req_param .= '&carat='.$_GET['carat'];
					}else{
						$req_param = '?carat='.$_GET['carat'];
					}
				}

				foreach($ringresults as $rowsize ){
					$rgsz = setRingSize($rowsize['ring_size']);
					$selected = '';
					$ring_size_link = $base_link.'?diamond_lot='.$data['diamond_lot'].'&ring_size='.$rgsz.$req_param;
					if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }

					$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
				}
			}

			$data['finger_ring_size'] = $finger_size;
			$rowsring = $this->engagementringsbetamodel->getRingsDetails($product_id, $ring_metal, $ring_size);
			$sqlrgsizes = "SELECT style_group,metal_weight as metal_weights,top_width,bottom_width,top_height,bottom_height, supplied_stones,stone_weight,additional_stones FROM `dev_us` WHERE `name` LIKE '".$rowsring[0]['name']."'";
			$resultergsizes = $this->db->query($sqlrgsizes);
			$results2 = $resultergsizes->result_array();
			if(!empty($results2)){
				$data['rowsring'] = array_merge($rowsring[0],$results2);
			}else{
				$data['rowsring'] = $rowsring[0];
			}
			$data['retail_price'] = $rowsring[0]['retail_price'];
			$data['our_price'] = $rowsring[0]['price'];
			$data['saving_percent'] = calc_save_percent($rowsring[0]['retail_price'] * PRICE_PERCENT);
			$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
			$data['setingtype']   = $rowsring[0]['sub_category'];
			$data['maincate_name'] = $rowsring[0]['category'];
			if($rowsring[0]['costar_id'] > 0){
				if(!empty($rowsring[0]['image'])){
					$images = explode(";",$rowsring[0]['image']);
					$data['ringimg'] = SITE_URL .'images/'. $rowsring[0]['image_path'].$images[0];
				}else{
					$data['ringimg'] = '';
				}
				$data['addition_images'] = $rowsring[0]['image'];
				$data['image_path'] =  'images/'. $rowsring[0]['image_path'];
			}else{
				if(!empty($rowsring[0]['image'])){
					$images = explode(";",$rowsring[0]['image']);
					$data['ringimg'] = SITE_URL .'images/'. $rowsring[0]['image_path'].'Large/'.$images[0];
				}else{
					$data['ringimg'] = '';
				}
				$data['addition_images'] = $rowsring[0]['image'];
				$data['image_path'] =  'images/'. $rowsring[0]['image_path'];
			}

			$data['similar_items'] = $this->ringSimilarItems(8, $product_id);
			$data['similar_products'] = $this->ringSimilarItems(8, $product_id, 4);
			$data['popular_listings'] = $this->popularRingListings(8, $product_id, 4);
			$data['more_engagement_listings'] = $this->popularRingListings(8, $product_id, 4);
			$data['row_cate'] = $this->getCateName(8);
			$data['shipping_policy'] = $this->get_page_content('shipping-policy');
			$data['finance_policy'] = $this->get_page_content('finance-policy');
			$ringsMetal = $rowsring['ringsMetal'];
			$defaultMetal = ( !empty( $ring_metal )  ? $ring_metal : $ringsMetal[0]['matalType'] );
			$defaultRingSz = ( !empty( $ring_size )  ? $ring_size : $rowsring['ringSize'] );
			$data['default_metal'] = $defaultMetal;
			$data['set_ring_size'] = resetsSlugTitle($defaultRingSz);

			$setsizes = explode('|', $rowsring['availblesize']);
			$trimmedArray = array_map('trim', $setsizes);
			array_filter($trimmedArray);

			$ringWeight = '';
			$metaList = array();
			$testar = array();
			$availableSizs = array();
			$available_insizes = ''; 
			foreach($trimmedArray as $rows_avsize) {
				if( !empty($rows_avsize) ) :
					$metailWeight = $this->engagementringsbetamodel->getMetalRingWeight($rows_avsize);
					$availableSizs[] = $rows_avsize;
					if(!in_array($metailWeight['metal_weight'], $testar)) {
						$metaList[] = array('ring_id'=>$metailWeight['id'], 'ring_metal'=>$metailWeight['metal_weight']);
						$testar[]  = $metailWeight['metal_weight'];
					}
				endif;
			}

			if( empty($avsizes) ) {
				$this->session->set_userdata('setmetal_list', $metaList);
			}

			$currMetalSizes = $this->session->userdata('setmetal_list');
			if( count($currMetalSizes) > 0 ) {
				$ringWeight .= '<option value="">Available Sizes</option>';
				foreach($currMetalSizes as $rows_avsize) {
					$metaLink = SITE_URL.'selection/engagement-ring-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id;			
					$ringWeight .= '<option value="'.$metaLink.'" '.selectedOption($rows_avsize['ring_id'], $product_id).'>'.$rows_avsize['ring_metal'].'</option>';
					$available_insizes .= '<div class="tabsRow">
						<div class="metaLeft">Size:
							<span class="sizeBlock"><a href="'.$metaLink.'">'.$rows_avsize['ring_metal'].'</a></span>
						</div>
					</div>';
				}
			} else {
				$ringWeight .= '<option value="">Available Sizes</option>';
			}

			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($_GET)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}

			$getRingsSize = '';
			if( count($rowsring['ringsSizes']) > 0 ) {
				foreach($rowsring['ringsSizes'] as $rng_size) {
					$rgsz = setRingSize($rng_size['ringSize']);
					$rings_rdlink = SITE_URL.'selection/engagement-ring-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal.$req_param;
					$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
				}
			} else {
				$getRingsSize .= '<option value="">Ring Sizes</option>';
			}

			$getRingsMetal = '';
			if( count($rowsring['ringsMetal']) > 0 ) {
				$req_param = '';
				if(!empty($_GET['diamond_lot'])){
					$req_param = '?diamond_lot='.$_GET['diamond_lot'];
				}
				if(!empty($_GET['ring_size'])){
					if(!empty($req_param)){
						$req_param .= '&ring_size='.$_GET['ring_size'];
					}else{
						$req_param = '?ring_size='.$_GET['ring_size'];
					}
				}
				if(!empty($_GET['carat'])){
					if(!empty($req_param)){
						$req_param .= '&carat='.$_GET['carat'];
					}else{
						$req_param = '?carat='.$_GET['carat'];
					}
				}
				foreach($rowsring['ringsMetal'] as $rings_metal) {
					$req_add = '';
					if( $rings_metal['matalType'] != 'PLAT' ) {
						$req_add = 'Gold';
					}
					if( $rings_metal['matalType'] != 'PDIUM' ) {
						$metal_rdlink = SITE_URL.'selection/engagement-ring-detail/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
						$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.set_ring_metal($rings_metal['matalType']).' '.$req_add.'</option>';
					}
				}
			} else {
				$getRingsMetal .= '<option value="">Metal Type</option>';
			}

			$data['ringsmetail'] = $getRingsMetal;
			$data['ring_weight']   = $ringWeight;
			$data['defaultMetal']      = $defaultMetal;
			$data['available_insizes'] = $available_insizes;
			$data['title'] = $rowsring[0]['name'];
			
			$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
			<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
			<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
			<meta name="author" content="'.get_site_contact_info('sites_title').'">
			<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
			<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
			<meta http-equiv="Reply-to" content="">
			<meta name="creation_Date" content="12/12/2008">
			<meta name="expires" content="">
			<meta name="revisit-after" content="7 days">';
			$output = $this->load->view('engagementringsbeta/engagement_rings_detail' , $data , true);
			$this->output($output, $data);
		}elseif($ringtype->costar_id == 0 && $ringtype->overnight_id > 0 && $ringtype->dev_us_id == 0){
			$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';

			$ezvalue_row = $this->engagementringsbetamodel->getEzOptionValues();
			$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
			$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

			$ringresults = $this->engagementringsbetamodel->getFingerSizeResult();
		
			$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
			if(count($ringresults) > 0){
				$req_param = '';
				if(!empty($_GET['carat'])){
					if(!empty($_GET)){
						$req_param .= '&carat='.$_GET['carat'];
					}else{
						$req_param = '?carat='.$_GET['carat'];
					}
				}

				foreach($ringresults as $rowsize ){
					$rgsz = setRingSize($rowsize['ring_size']);
					$selected = '';
					$ring_size_link = $base_link.'?diamond_lot='.$data['diamond_lot'].'&ring_size='.$rgsz.$req_param;
					if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }

					$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
				}
			}

			$data['finger_ring_size'] = $finger_size;
			$rowsring = $this->engagementringsbetamodel->getRingsDetails($product_id, $ring_metal, $ring_size);
	
			$data['rowsring'] = $rowsring[0];
			$data['retail_price'] = $rowsring[0]['retail_price'];
			$data['our_price'] = $rowsring[0]['price'];
			$data['saving_percent'] = calc_save_percent($rowsring[0]['retail_price'] * PRICE_PERCENT);
			$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
			$data['setingtype']   = $rowsring[0]['sub_category'];
			$data['maincate_name'] = $rowsring[0]['category'];
			if(!empty($rowsring[0]['image'])){
				$images = explode(";",$rowsring[0]['image']);
				$data['ringimg'] = SITE_URL .'images/'. $rowsring[0]['image_path'].str_replace("THUMBNAIL/","",$images[0]);
			}else{
				$data['ringimg'] = '';
			}
			$data['addition_images'] = $rowsring[0]['image'];
			$data['image_path'] =  'images/'. $rowsring[0]['image_path'];

			$data['similar_items'] = $this->ringSimilarItems($rowsring['catid'], $product_id);
			$data['similar_products'] = $this->ringSimilarItems($rowsring['catid'], $product_id, 4);
			$data['popular_listings'] = $this->popularRingListings($rowsring['catid'], $product_id, 4);
			$data['more_engagement_listings'] = $this->popularRingListings($rowsring['catid'], $product_id, 4);
			$data['row_cate'] = $this->getCateName($rowsring['catid']);
			$data['shipping_policy'] = $this->get_page_content('shipping-policy');
			$data['finance_policy'] = $this->get_page_content('finance-policy');
			$ringsMetal = $rowsring['ringsMetal'];
			$defaultMetal = ( !empty( $ring_metal )  ? $ring_metal : $ringsMetal[0]['matalType'] );
			$defaultRingSz = ( !empty( $ring_size )  ? $ring_size : $rowsring['ringSize'] );
			$data['default_metal'] = $defaultMetal;
			$data['set_ring_size'] = resetsSlugTitle($defaultRingSz);

			$setsizes = explode('|', $rowsring['availblesize']);
			$trimmedArray = array_map('trim', $setsizes);
			array_filter($trimmedArray);

			$ringWeight = '';
			$metaList = array();
			$testar = array();
			$availableSizs = array();
			$available_insizes = ''; 
			foreach($trimmedArray as $rows_avsize) {
				if( !empty($rows_avsize) ) :
					$metailWeight = $this->engagementringsbetamodel->getMetalRingWeight($rows_avsize);
					$availableSizs[] = $rows_avsize;
					if(!in_array($metailWeight['metal_weight'], $testar)) {
						$metaList[] = array('ring_id'=>$metailWeight['id'], 'ring_metal'=>$metailWeight['metal_weight']);
						$testar[]  = $metailWeight['metal_weight'];
					}
				endif;
			}

			if( empty($avsizes) ) {
				$this->session->set_userdata('setmetal_list', $metaList);
			}

			$currMetalSizes = $this->session->userdata('setmetal_list');
			if( count($currMetalSizes) > 0 ) {
				$ringWeight .= '<option value="">Available Sizes</option>';
				foreach($currMetalSizes as $rows_avsize) {
					$metaLink = SITE_URL.'selection/engagement-ring-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id;			
					$ringWeight .= '<option value="'.$metaLink.'" '.selectedOption($rows_avsize['ring_id'], $product_id).'>'.$rows_avsize['ring_metal'].'</option>';
					$available_insizes .= '<div class="tabsRow">
						<div class="metaLeft">Size:
							<span class="sizeBlock"><a href="'.$metaLink.'">'.$rows_avsize['ring_metal'].'</a></span>
						</div>
					</div>';
				}
			} else {
				$ringWeight .= '<option value="">Available Sizes</option>';
			}

			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($_GET)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}

			$getRingsSize = '';
			if( count($rowsring['ringsSizes']) > 0 ) {
				foreach($rowsring['ringsSizes'] as $rng_size) {
					$rgsz = setRingSize($rng_size['ringSize']);
					$rings_rdlink = SITE_URL.'selection/engagement-ring-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal.$req_param;
					$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
				}
			} else {
				$getRingsSize .= '<option value="">Ring Sizes</option>';
			}

			$getRingsMetal = '';
			if( count($rowsring['ringsMetal']) > 0 ) {
				$req_param = '';
				if(!empty($_GET['diamond_lot'])){
					$req_param = '?diamond_lot='.$_GET['diamond_lot'];
				}
				if(!empty($_GET['ring_size'])){
					if(!empty($req_param)){
						$req_param .= '&ring_size='.$_GET['ring_size'];
					}else{
						$req_param = '?ring_size='.$_GET['ring_size'];
					}
				}
				if(!empty($_GET['carat'])){
					if(!empty($req_param)){
						$req_param .= '&carat='.$_GET['carat'];
					}else{
						$req_param = '?carat='.$_GET['carat'];
					}
				}
				foreach($rowsring['ringsMetal'] as $rings_metal) {
					$req_add = '';
					if( $rings_metal['matalType'] != 'PLAT' ) {
						$req_add = 'Gold';
					}
					if( $rings_metal['matalType'] != 'PDIUM' ) {
						$metal_rdlink = SITE_URL.'selection/engagement-ring-detail/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
						$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.set_ring_metal($rings_metal['matalType']).' '.$req_add.'</option>';
					}
				}
			} else {
				$getRingsMetal .= '<option value="">Metal Type</option>';
			}

			$data['ringsmetail'] = $getRingsMetal;
			$data['ring_weight']   = $ringWeight;
			$data['defaultMetal']      = $defaultMetal;
			$data['available_insizes'] = $available_insizes;
			$data['title'] = $rowsring[0]['name'];
			$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
			<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
			<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
			<meta name="author" content="'.get_site_contact_info('sites_title').'">
			<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
			<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
			<meta http-equiv="Reply-to" content="">
			<meta name="creation_Date" content="12/12/2008">
			<meta name="expires" content="">
			<meta name="revisit-after" content="7 days">';
			
			$output = $this->load->view('engagementringsbeta/overnight_engagement_rings_detail', $data, true);
			$this->output($output, $data);
		}elseif($ringtype->costar_id == 0 && $ringtype->overnight_id == 0 && $ringtype->dev_us_id > 0){
			$product_id = $ringtype->dev_us_id;
			$ezvalue_row = $this->engagementringsbetamodel->getEzOptionValues();
			$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
			$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

			$ringresults = $this->engagementringsbetamodel->getFingerSizeResult();
			$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';

			if( count($ringresults) > 0 ) {
				$req_param = '';
				if(!empty($_GET['carat'])){
					if(!empty($_GET)){
						$req_param .= '&carat='.$_GET['carat'];
					}else{
						$req_param = '?carat='.$_GET['carat'];
					}
				}
				foreach( $ringresults as $rowsize ) {
					$rgsz = setRingSize($rowsize['ring_size']);
					$selected = '';
					$ring_size_link = $base_link.'?diamond_lot='.$data['diamond_lot'].'&ring_size='.$rgsz.$req_param;
					if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }
					$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
				}
			}
			$data['finger_ring_size'] = $finger_size;
			$rowsring = $this->engagementringsbetamodel->getRingsDetailViaId($product_id, $ring_metal, $ring_size); //
		    $rowsring['prd_id'] = $prod_id;
			$data["getparent_cate"] = getMainCatParentCateID($rowsring['catid']);
			$data['shipping_policy'] = $this->get_page_content('shipping-policy');
			$data['finance_policy'] = $this->get_page_content('finance-policy');
			$data['wedding_band'] = strchr( $rowsring['parent_cate'], 'Bands' );
			$ctstone_shape = $rowsring['additional_stones']; 
			$find_ctsahpe = getCenterStoneShape($ctstone_shape);
			$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
			$suport_shape_img = view_shape_value($diamond_shape_img, ucwords( strtolower( $data['suport_shape'] ) ) );
			$data['supported_shape'] = SITE_URL . 'images/shapes_images/' . $diamond_shape_img;
			$data['buildring'] = $this->session->userdata('buildring');
			$data['rowsring'] = $rowsring;
			$data['rowsring']['priceRetail'] = $rowsring['priceRetail'];

			$data['retail_price'] = $rowsring['priceRetail'];
			$data['saving_percent'] = 45.43;
			$data['buynow_link']    = htmlspecialchars(config_item('base_url').'jewelleries/addtoshoppingcart/');
			$cate = $this->getCateName( $rowsring['catid'] );
			$data['ringtitle'] = $rowsring['matalType'].' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring ';
			$results['item_thumbs'] = $this->engagementringsbetamodel->getRingThumbs( $rowsring['name'] );
			$data['product_circle'] = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ringtitle'], '400', '', 'details');
			$data['product_thums'] = $data['product_circle']['thumb_image'];
			$data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
			$data['setingtype']   = $cate['sub_cname'];
			$data['maincate_name'] = $cate['main_cname'];
			$data['subcate_link'] = '<a href="'.SITE_URL.'selection/engagement_ring_listings/'.$rowsring['catid'].'" title="">'.$cate['main_cname'].' Diamond Engagement Rings</a>';
			$data['similar_items'] = $this->ringSimilarItems($rowsring['catid'], $product_id);
			$data['similar_products'] = $this->ringSimilarItems($rowsring['catid'], $product_id, 4);
			$data['popular_listings'] = $this->popularListings($rowsring['catid'], $product_id, 4);
			$data['more_engagement_listings'] = $this->popularListings($rowsring['catid'], $product_id, 4);
			$data['view_coments'] = $this->getProductReviews( $product_id );
			$data['extra_headers'] = '';
			$data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
			$data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
			$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/magnific-popup.css" rel="stylesheet" />';
			$rings_thumb = $this->getProductThumb( $rowsring );
			$data['rings_thumb'] = $rings_thumb['thumb_circle'];
			$data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );
			$getring_shape = getSuppliedStoneShape( $rowsring['supplied_stones'] );
			$aditional_ratios = getAdditonalStonesRatio( $rowsring['additional_stones'] );

			if( empty($rowsring['additional_stones']) ) {
				$this->session->set_userdata('shape', $getring_shape.'.');
				$this->session->unset_userdata('length');
				$this->session->unset_userdata('width');
				$this->session->unset_userdata('carat');
			} else {
				$this->session->set_userdata('shape_stone', $aditional_ratios['size_shape'].'.');
				$this->session->set_userdata('length', $aditional_ratios['length']);
				$this->session->set_userdata('width', $aditional_ratios['width']);
				$this->session->set_userdata('ringcarat', $aditional_ratios['carat']);
			}
			$ringsMetal = $rowsring['ringsMetal'];
			$defaultMetal = ( !empty( $ring_metal )  ? $ring_metal : $ringsMetal[0]['matalType'] );
			$defaultRingSz = ( !empty( $ring_size )  ? $ring_size : $rowsring['ringSize'] );
			$data['default_metal'] = $defaultMetal;
			$data['set_ring_size'] = resetsSlugTitle($defaultRingSz);

			$setsizes = explode('|', $rowsring['availblesize']);
			$trimmedArray = array_map('trim', $setsizes);
			array_filter($trimmedArray);
			$ringWeight = '';
			$metaList = array();
			$testar = array();
			$availableSizs = array();
			$available_insizes = ''; 
			foreach($trimmedArray as $rows_avsize) {
				if( !empty($rows_avsize) ) :
					$metailWeight = $this->engagementringsbetamodel->getMetalRingWeight($rows_avsize);
					$availableSizs[] = $rows_avsize;
					if(!in_array($metailWeight['metal_weight'], $testar)) {
						$metaList[] = array('ring_id'=>$metailWeight['id'], 'ring_metal'=>$metailWeight['metal_weight']);
						$testar[]  = $metailWeight['metal_weight'];
					}
				endif;
			}

			if( empty($avsizes) ) {
				$this->session->set_userdata('setmetal_list', $metaList);
			}

			$currMetalSizes = $this->session->userdata('setmetal_list'); //print_ar($currMetalSizes);
			if( count($currMetalSizes) > 0 ) {
				$req_param = '';
				if(!empty($_GET['carat'])){
					if(!empty($req_param)){
						$req_param .= '&carat='.$_GET['carat'];
					}else{
						$req_param = '?carat='.$_GET['carat'];
					}
				}
				$ringWeight .= '<option value="">Available Sizes</option>';
				foreach($currMetalSizes as $rows_avsize) {
					$metaLink = SITE_URL.'selection/engagement-rings-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id.$req_param;			
					$ringWeight .= '<option value="'.$metaLink.'" '.selectedOption($rows_avsize['ring_id'], $product_id).'>'.$rows_avsize['ring_metal'].'</option>';
					$available_insizes .= '<div class="tabsRow">
					<div class="metaLeft">Size:
					<span class="sizeBlock"><a href="'.$metaLink.'">'.$rows_avsize['ring_metal'].'</a></span>
					</div>
					</div>';

				}
			} else {
				$ringWeight .= '<option value="">Available Sizes</option>';
			}

			$req_param = '';
			if(!empty($_GET['carat'])){
				if(!empty($req_param)){
					$req_param .= '&carat='.$_GET['carat'];
				}else{
					$req_param = '?carat='.$_GET['carat'];
				}
			}
			$getRingsSize = '';
			if( count($rowsring['ringsSizes']) > 0 ) {
				foreach($rowsring['ringsSizes'] as $rng_size) {
					$rgsz = setRingSize($rng_size['ringSize']);
					$rings_rdlink = SITE_URL.'selection/engagement-rings-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal.$req_param;
					$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
				}
			} else {
				$getRingsSize .= '<option value="">Ring Sizes</option>';
			}
			$getRingsMetal = '';
			if( count($rowsring['ringsMetal']) > 0 ) {
				$req_param = '';
					$seg1 = $this->uri->segment(1);
							$seg2 = $this->uri->segment(2);
				if(!empty($_GET['diamond_lot'])){
					$req_param = '?diamond_lot='.$_GET['diamond_lot'];
				}
				if(!empty($_GET['ring_size'])){
					if(!empty($req_param)){
						$req_param .= '&ring_size='.$_GET['ring_size'];
					}else{
						$req_param = '?ring_size='.$_GET['ring_size'];
					}
				}
				if(!empty($_GET['carat'])){
					if(!empty($req_param)){
						$req_param .= '&carat='.$_GET['carat'];
					}else{
						$req_param = '?carat='.$_GET['carat'];
					}
				}
				foreach($rowsring['ringsMetal'] as $rings_metal) {
					$req_add = '';
					if( $rings_metal['matalType'] != 'PLAT' ) {
						$req_add = 'Gold';
					}

					if( $rings_metal['matalType'] != 'PDIUM' ) {
						//$metal_rdlink = SITE_URL.'selection/engagement-rings-detail/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
						$metal_rdlink = SITE_URL.$seg1.'/'.$seg2.'/'.$prod_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
						$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $ring_metal).'>'.set_ring_metal($rings_metal['matalType']).' '.$req_add.'</option>';
					}
				}
			} else {
				$getRingsMetal .= '<option value="">Metal Type</option>';
			}

			$data['ringsmetail'] = $getRingsMetal;
			$data['ring_weight']   = $ringWeight;
			$data['defaultMetal']      = $defaultMetal;
			$data['available_insizes'] = $available_insizes;
			$data['title'] = $data['ringtitle'].', '.$data['rowsring']['supplied_stones'].', '.$data['rowsring']['stone_weight'];
			//printr($data);
			$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
			<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
			<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
			<meta name="author" content="'.get_site_contact_info('sites_title').'">
			<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
			<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
			<meta http-equiv="Reply-to" content="">
			<meta name="creation_Date" content="12/12/2008">
			<meta name="expires" content="">
			<meta name="revisit-after" content="7 days">';
			$data['ringsize_option'] = $getRingsSize;
			$data['row_cate'] = $this->getCateName($rowsring['catid']);
                
			$output = $this->load->view('engagementringsbeta/engagement_unique_details' , $data , true);
			$this->output($output, $data);
		}
	}
    
    
	function ringSimilarItems($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
		return;
		$rowsring = $this->catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        $similar_rings = '';
        $popupBlock = '';
		if( count($rowsring['results']) > 0 ) {
			foreach( $rowsring['results'] as $rowring ) {
				$detaiLink = SITE_URL . 'selection/engagement-ring-detail/' . $rowring['ring_id'];
				$ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
				$ring_title = $this->getRingTitle($rowring);
				$retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
				$ring_ourprice = $rowring['priceRetail'];
				$saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
				$popupBlock .= $this->product_popup_detail( $rowring['ring_id'] );
				$popupLink = SITE_URL . 'selection/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';

				if( empty($listing) ) {
					$similar_rings .= '<div class="prdSection col-sm-3" id="'.$rowring['ring_id'].'">
					<a href="'.$detaiLink.'" class="alsoviwed-product-img">
					<img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
					</a>
					<a class="prdName" title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a>
					<div class="price-box">
					<p class="old-price"><span>Retail Price:</span>
					<span style="text-decoration: line-through;"> $'._nf($retail_price, 2).'</span></p>
					<p class="our-price"><span>Our Price:</span><span> $'._nf($ring_ourprice, 2).'</span></p>
					<!-- <a class="viewItem" href="">View Item</a> -->
					</div>
					</div>'; 
				} else {
					$similar_rings .= '<li class="item first">
					<div class="product-grid-quick col-sm-3" onmouseover="showTopQuickView('.$rowring['ring_id'].');" onmouseout="hideTopQuickView('.$rowring['ring_id'].');" style="overflow:hidden;">
					<div id="top-quickview'.$rowring['ring_id'].'" style="display: none; position: relative;">
					<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\', \'\', \'nofollow\');" title="Quick View'.$ring_title.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
					</div>
					<a title="'.$ring_title.'" href="'.$detaiLink.'"><img alt="'.$ring_title.'" class="" src="'.$ringImageLink.'" width="200" style="display: inline;"></a>
					<h2 class="product-name"><a title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a></h2>
					<div class="price-box">
					<p class="old-price"><span class="price-label">Retail Price:</span> 
					<span id="old-price-802865" class="price">$'._nf($retail_price, 2).'</span></p>
					<p class="our-price"><span class="price-label">Our Price:</span> 
					<span id="product-price-'.$rowring['ring_id'].'">$'._nf($ring_ourprice, 2).'</span>
					</p>
					</div>
					<ul class="add-to-links-details">
					<li><a class="view-item" href="'.$detaiLink.'">View Item</a></li>
					</ul>
					</div>
					<!-- Mouse Hover DIV STARTS here -->
					<div class="box-detail-over right-box" id="top-box-detail-over-'.$rowring['ring_id'].'" style="display: none;">
					<div class="column3">
					<p>'.$ring_title.'</p>
					<div class="hover-price">
					<div class="popup-prices">
					<p class="old-price-qv"><span class="price-label-qv">Retail Price:</span> 
					<span id="old-price-'.$rowring['ring_id'].'" class="price-qv">$'._nf($retail_price, 2).'</span></p>
					<p class="old-price-qv"><span class="price-label-qv">Our Price:</span> <span id="product-price-'.$rowring['ring_id'].'" class="new-price-qv">$'._nf($ring_ourprice, 2).'</span> <span class="special-price-label-qv">(Savings: '.round($saving_percent).'%)</span></p>
					</div>
					</div>
					<div id="top-product_additional_data_'.$rowring['ring_id'].'"></div>
					</div>
					</div>
					</li>';
				}
				$similar_rings .= $popupBlock;
            }
        }
        return $similar_rings;
    }

	function popularRingListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
		$rowsring = $this->catemodel->getRingbyCateory($ring_cateid, 0, $limit, $prod_id);
		$similar_rings = '';
		if( count($rowsring['results']) > 0 ) {
			foreach( $rowsring['results'] as $rowring ) {
				$detaiLink = SITE_URL . 'selection/engagement-rings-detail/'. $rowring['id'];
				if(!empty($rowring['image'])){
					$images = explode(";",$rowring['image']);
					$ringImageLink = SITE_URL .'images/'. $rowring['image_path'].$images[0];
				}else{
					$ringImageLink = '';
				}
				$ring_title = $this->getRingsTitle($rowring, 'similar');
				$retail_price  = $rowring['retail_price'] * PRICE_PERCENT;
				$ring_ourprice = $rowring['retail_price'];

				$popupBlock = $this->product_popup_detail( $rowring['id'] );
				$popupLink = SITE_URL . 'selection/product_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';

				$similar_rings .= '<div class="ring_cols col-sm-3" onmouseover="show_collection_block(\'hover_'.$rowring['id'].'\')" onmouseout="hide_block(\'hover_'.$rowring['id'].'\')">
				<div><a href="'.$detaiLink.'">
				<div class="set_thumb_img" id="'.$rowring['id'].'">
				<img src="'.$ringImageLink.'" alt="'.$ring_title.'" style="height:235px;" />
				</div>    
				</a></div>
				<div class="clear"></div>
				<div>'.$ring_title.'</div>
				<div class="ring_price_label">$'. $rowring['price'].'</div>
				<div>Complementary Match</div>
				</div>';
			}
		}
        return $similar_rings;
    }

	function getRingsTitle($rowring=array(), $similar='') {
		$cate   = $this->getCateName( $rowring['catid'] ); 
		$rtitle = $rowring['description'];
		return $rtitle;
    }

	function product_popup_detail($id=0) {
		return;
		$data = $this->getCommonData();
		$rowsring = $this->catemodel->getRingsDetailViaId($id, '', ''); //print_ar($rowsring);
		$data['title'] = 'Engagement Rings';
		$data['listings_detail'] = $this->listingdetail( $id, 'popup', 'info' );
		$data['ring_title'] = $this->getRingTitle($rowsring);
		$rings_thumb = $this->getProductThumb( $rowsring, 'popup' );
		$data['rings_thumb'] = $rings_thumb['thumb_circle'];
		$data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
		$data['rowsring']   = $rowsring;
		$retail_price  = $rowsring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
		$salesprice = $rowsring['priceRetail'];
		$saving_percent = ''; //calc_save_percent( $rowsring['priceRetail'] );
		$results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowsring['name'] );
		$product_circle = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ring_title'], '400', '', 'details');
		$data['product_thums'] = $product_circle['thumb_image'];
		$cate = $this->getCateName( $rowsring['catid'] );

		$ring_detail_bk = '<div id="pop_'.$id.'" class="simplePopup collection_view">';
		$ring_detail_bk .= '<div class="col-sm-5 imgleft_block"><div class="product-image product-image-zoom zoomright" id="ringsthumb_view yy">
		<div class="set_thumb_img" id="popup_'.$rowsring['ring_id'].'">                                
		<div class="" id="show_thumb_view"></div>
		'.$data['product_thums'].'
		</div>
		<div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'popup_'.$rowsring['ring_id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_view_ic.jpg" alt="" /></a></div>
		<div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'popup_'.$rowsring['ring_id'].'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_view_ic.jpg" alt="" /></a></div>
		</div>';
		$ring_detail_bk .= '<div class="clear"></div><br>
		<div>
		'.$data['listings_detail']['diamond_information'].'
		</div></div>';
		$ring_detail_bk .= '<div class="col-sm-6 pull-right"><br></br>
		<div class="price-box">
		<div class="product-name"><h1>'.$data['ring_title'].'</h1></div>
		<p class="old-price fb-old-price f-fix"> 
		<span class="price-label">Item Code:</span> <span>'.$rowsring['name'].'</span> 
		</p>
		<p class="old-price"> <span class="retail-label">Retail Price:</span> <span class="price" id="old-price-'.$rowsring['ring_id'].'">$'._nf($retail_price, 2).'</span> <span class="pnotify"> <a href="#" id="productupdates-button4" onmouseover="new Productupdates();"> <i></i>Get Price Update </a> </span> </p>
		<p class="old-price"> <span class="ourprice-label">Our Price:</span> <span class="new-price" id="product-price-'.$rowsring['ring_id'].'">$'._nf($salesprice, 2).'</span> <span class="special-price-label" id="old_price">(Savings:<?php echo $saving_percent; ?>%)</span> <span id="google_discount"></span> <span id="twitter_discount"></span> <span id="facebook_discount"></span> <span id="pinterest_discount"></span> <span id="total_price"></span> 
		<!-- // customm code for shipping free text --> 
		<strong><a class="freeShip" href="#" target="_blank">Ships for free&nbsp;*</a></strong> 
		<!-- // End customm code --> 
		</p>
		</div>
		<form id="'.$id.'" action="" method="">
		<label for="qty">QUANTITY:</label>
		<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
		<div class="product-options-bottom">
		<div class="add-to-cart-1">
		<input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$cate['sub_cname'].'">
		<input type="hidden" name="3ez_price" value="0">
		<input type="hidden" name="5ez_price" value="0">
		<input type="hidden" name="main_price" id="main_price" value="'.$rowsring['priceRetail'].'">
		<input type="hidden" name="price" value="'.$rowsring['priceRetail'].'">
		<input type="hidden" name="vender" value="unique" />
		<input type="hidden" name="url" value="'.$data['ringimg'].'">
		<input type="hidden" name="prodname" value="'.$rowsring['name'].'">
		<input type="hidden" name="diamnd_count" value="'.$rowsring['supplied_stones'].'">
		<input type="hidden" name="ring_shape" value="">
		<input type="hidden" name="ring_carat" value="'.$rowsring['metal_weight'].'">
		<input type="hidden" name="prid" id="prid" value="'.$rowsring['ring_id'].'">
		<input type="hidden" name="txt_ringtype" value="generic_ring">
		<input type="hidden" name="txt_ringsize" value="">
		<input type="hidden" name="txt_metal" value="">
		<input type="hidden" name="metals_weight" value="'.$rowsring['metal_weight'].'">
		<input type="hidden" name="vendors_name" value="Unique Jewelry" />
		<input type="hidden" name="center_stone_id" id="center_stone_id" />
		<input type="hidden" name="txt_qty" value="1" />                          
		<div>
		<a href="#javascript" onclick="add_to_cart_form(\''.SITE_URL.'jewelleries/addtoshoppingcart/\', \''.$id.'\')" class="add_to_cart_btn" id="addtoshopping">Add To Cart</a>
		</div>
		</div>
		</div>
		</form>
		<br clear="all">
		<div style="clear:both;width:100%;">
		<div class="box-collateral box-additional"> <br clear="all">
		'.$data['listings_detail']['item_information'].'
		<div class="other_button_links">
		<a href="#"><img src="'.SITE_URL.'img/heart_diamond/add_to_wish_list.jpg" alt="Add To Wishlist" /></a>
		<a href="#"><img src="'.SITE_URL.'img/heart_diamond/add_to_compare_ic.jpg" alt="Add to Compare" /></a>
		<a href="#"><img src="'.SITE_URL.'img/heart_diamond/email_to_friend_ic.jpg" alt="Email to Friend" /></a>
		</div>
		</div>
		</div>
		</div>';
		$ring_detail_bk .= '</div>';

		return $ring_detail_bk;
    }

	function getCateName( $cid=0 ) {
		$catevalue = array();
		$subparent = $this->catemodel->getparentCateID( $cid );
		$parent_cid = $this->catemodel->get_unique_main_cate_id( $cid );
		$catevalue['main_cname'] = $this->catemodel->getRingCategoryName( $cid );
		$catevalue['sub_cname'] = $this->catemodel->getRingCategoryName($subparent);        
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

        return $catevalue;
	}

	function get_page_content($topic='') {
		$row_content = $this->commonmodel->getCompanyInfoRow($topic);
		$page_content = check_empty($row_content['content'], 'Coming Soon');
		return $page_content;
	}

	function output($layout = null, $data = array(), $isleft = false, $isright = true) {
        $data ['loginlink'] = $this->user->loginhtml();
        $output = $this->load->view($this->config->item('template') . 'header', $data, true);
        if ($isleft)
            $output .= $this->load->view($this->config->item('template') . 'left', $data, true);
        $output .= $layout;
        if ($isright)
            $output .= $this->load->view($this->config->item('template') . 'right', $data, true);
        $output .= $this->load->view($this->config->item('template') . 'footer', $data, true);
        $this->output->set_output($output);
    }

	function getProductThumb($rowaray=array(), $popup='', $item_id='', $item_title='', $width=215, $height=215, $detail='') {
		$getRingsThumb = '';
		$check_thumb = array();
		$ring_title = $this->getRingTitle( $rowaray );
		$i = 1;
		$itemID = trim( $item_id );
		$set_ring_thumb = '';
		$set_popup_thumb = '';
		$new_array_for_image  = array();
        if( count($rowaray['item_thumbs']) > 0 ) {
			foreach( $rowaray['item_thumbs'] as $rng_thumb ) {
				if($detail == 'details'){
					$ringsView      = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
					$new_array_for_image[] = '<a class="lightbox" href="'.$ringsView.'"><img src="'.$ringsView.'" style="width:90%;margin:10px 0px;" alt="'.$item_title.'" /></a>'; 
				}else{
					$unique_id = 'bk_'.$i.'_'.$item_id;
					$ringsThumb = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
					$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
					if( !in_array($rng_thumb['ImagePathThumb'], $check_thumb) ) {
						if( empty($popup) ) {
							$getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$ringsView.'\')">
							<img src="'.$ringsThumb.'" alt=""></a></div>';
						} else {
							if( $popup == 'listing' ){
								$getRingsThumb .= '<li id="'.$i.'"><a href="javascript://" onclick="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'" onmouseover="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'">'. '<img src="'.SITE_URL.'img/heart_diamond/in_active_circle.jpg" width="9" height="9" alt="'.$ring_title.'"></a>'. '</li>';
							} else {
								$getRingsThumb .= '<li><a href="javascript://" onclick="ringThumbView(\''.$ringsView.'\');" title="'.$ring_title.'"><img src="'.$ringsThumb.'" width="31" alt="'.$ring_title.'"></a> </li>';
							}
						}

						$active_class = ( $i == 2 ? 'active_view' : 'hide_imgbk' );
						if( empty($detail) ) {
							if( $i == 2 ) {
								$set_ring_thumb = '<img src="'.$ringsView.'" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" />'; 
							}
						} else {
							$set_ring_thumb .= '<div class="sp '.$active_class.'" id="'.$unique_id.'"><img src="'.$ringsView.'" onmouseover="show_magnify_affect(\''.$unique_id.'\')" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" /></div>';
							if( $i == 2 ) {
								$set_popup_thumb .= '<a href="'.$ringsView.'"><img src="'.SITE_URL.'img/search_plus_ic.png" alt="" width="28" /></a>';
							} else {
								$set_popup_thumb .= '<a href="'.$ringsView.'"></a>';
							}
						}
					}
					$check_thumb[] = $rng_thumb['ImagePathThumb'];
				}
				$i++;
			}
		} else {
			$getRingsThumb .= '';
		}

        if($new_array_for_image){
            $increeee = 1;
            $our_swap_back          = $new_array_for_image[0];
            $new_array_for_image[0] = $new_array_for_image[1];
            $new_array_for_image[1] = $our_swap_back;
            foreach ($new_array_for_image as $new_arrayimage) {
                $set_ring_thumb .= $new_arrayimage; 
                $increeee++;
            }
        }
        $return['thumb_circle'] = $getRingsThumb;
        $return['thumb_image']  = $set_ring_thumb;
        $return['thumbs_popup'] = $set_popup_thumb;

        return $return;
    }

	function getProductReviews($rid=0) {
		/* get user comments */
		$rings_coments = $this->catemodel->getComentsListView($rid);

		$view_coments = '';
		if( count($rings_coments) > 0 ) {
			foreach($rings_coments as $row_coments) {
				$view_coments .= '<div class="reviews_block">
					<div class="reviews_label">
						<div><img src="'.SITE_URL.'img/page_img/stars_icon.png"  alt="stars_icon"/></div>
						<div class="dateLabel">'.date('d M, Y', strtotime($row_coments['coment_date'])).',</div>
					</div>
					<br />
					<div class="reviewHeading">This is comments review about '.$data['details']['parent_cate'].'</div>
					<div class="reviewData">'.$row_coments['post_comments'].'</div>
				</div>';
			}
		} else {
			$view_coments = '<div class="reviewData">NO COMMENTS LIST ADDED</div>';
		}
        return $view_coments;
    }
	
	function getDimaondShapeImage($rowshape=array()) {
		$getring_shape = getSuppliedStoneShape( $rowshape['supplied_stones'] );
		$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');

		$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
		$view_ctshape = '';

		$shapPath = SITE_URL.'img/diamond_shapes/';
		$ctstone_shape = $rowshape['additional_stones']; 
		$find_ctsahpe = getCenterStoneShape($ctstone_shape);

		$getsp_shape = $center_stshapes[$getring_shape];
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

			$data['row_detail'] = $this->diamondmodel->getDetailsByLot($lot_id);
		} else {
			$data['row_detail'] = $data['stones_list'][0];
		}        

		$this->load->view('engagementringstrial/view_diamond_result_detail', $data);
    }

	/* Get the ring diamond detail */
    function getDiamondListDetail($lot_id=0) {
        $lot_id = urldecode($lot_id);
        $lot_id = str_replace('_slash_', '/', $lot_id);
        $data['row_detail'] = $this->diamondmodel->getDetailsByLot($lot_id);

        $this->load->view('engagementringstrial/ring_diamond_detail', $data);
    }

}