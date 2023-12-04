<?php
class Collections extends CI_Controller {
    function __construct(){
        parent::__construct();
        //$this->ci = & get_instance ();
        
        $this->load->model('jewelrymodel');
        $this->load->model('diamondmodel');
        $this->load->model('engagementmodel');
        $this->load->helper('ringsection');
        $this->load->helper('contentsection');
        $this->load->library('session');
        $phone_from_admin = get_site_contact_info('contact_info'); 
        define('CONTACT_NO', $phone_from_admin);
    }	

    function index(){
        $data = $this->getCommonData(); 
        $data['title'] = 'Jewelry';
        $output = $this->load->view('jewelry/index' , $data , true);
        $this->output($output , $data);		
    }

    function engagement_ring_listings(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = '//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/wedding.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function wedding_bands($category_id=0, $start=0){
        
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Wedding Bands';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = '//cdn.shopify.com/s/files/1/0773/7929/t/10/assets/wedding.gif?11590209297283401907';
        
        
        $this->load->library('pagination');
		
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $sort = $this->input->get('sort');
        $metal_val = check_empty( $this->input->get('metal'), '' );
        $metal_value = ( !empty($metal_val) ? urldecode($metal_val) : '' );
        $sort_option =  ( ( isset($sort) && !empty($sort) ) ? $sort : 'ASC' );
        
        $config["per_page"] = ( $perpage > 0 ? $perpage : 20 );
        $config["num_links"] = 50;
        $config["uri_segment"] = 15;
        $config['use_page_numbers'] = TRUE;        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        
        $ringresults = $this->catemodel->getRingsByCateory($category_id, $startFrom, $config["per_page"], '', $metal_value, $sort_option); //print_ar($ringresults);
        $config["total_rows"] = $ringresults['total'];
        $baseLink = SITE_URL.'testengagementrings/engagement_ring_listings/'.$category_id.'/?sort='.$sort_option;
	    $config["base_url"]   = $baseLink.'&pagelist='.$config["per_page"].'&metal='.$metal_value;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $ringresults['total'], $start_from); // custome helper
        
        $data['similar_products'] = $this->ringSimilarItems($category_id, '', 6, 'listings');        
        $sort_option_link = SITE_URL . 'testengagementrings/engagement_ring_listings/'.$category_id.'/?pagelist='.$config["per_page"].'&per_page='.$startFrom.'&sort=';
        $data['sort_option_link'] = page_sort_listing($sort_option_link, $sort_option); /// ring section helper
        
        $ring_result = $this->get_unique_ring_listing($ringresults['results']);



        $data['ring_listings'] = '<ul class="products-grid prduct-list first last odd">'.$ring_result['ring_listing'].'</ul>' . $ring_result['popup_block'];
        
        $cate_name = $this->catemodel->getRingCategoryName( $category_id );
        $data['catename_title'] = $cate_name.' Diamond Engagement Rings'; 
        $options = '';  
        $page_link = $baseLink; //( !empty( $perpage_no ) ? $baseLink.'&per_page='.$perpage_no : $baseLink);
        
            for( $page=10; $page <= 50; $page+=10 ) {
                $options .= '<option value="'.$page_link.'&pagelist='.$page.'" '.selectedOption($page,$config["per_page"]).'>'.$page.'</option>';
            }
        ///// sort options
        $sort_list = array( 'ASC' => 'Lowest Price', 'DESC' => 'Highest Price');
        $sort_link = $page_link.'?per_page='.$config["per_page"].'&sort=';
        $optionList = '';
        
        foreach( $sort_list as $sorting => $sort_value ) {
            $optionList .= '<option value="'.$sort_link.$sorting.'" '.selectedOption($sorting, $sort_option).'>'.$sort_value.'</option>';
        }
        
        $results_metal = $this->catemodel->getRingsMetalByCate( $category_id );
        $metal_link = $sort_link.$sort_option;
        $metal_list = '<option value="'.$metal_link.'&metal=">Select Metal</option>';
        
        foreach( $results_metal as $rowmetal ) {
           $metal_list .= '<option value="'.$metal_link.'&metal='.urlencode( $rowmetal['rings_metal'] ).'" '.selectedOption($rowmetal['rings_metal'], $metal_value).'>'.$rowmetal['rings_metal'].'</option>';
        }
        
        $this->pagination->initialize($config); ///// initializ the pagination        
        $data['page_options'] = $options;
        $data['sorting_option'] = $optionList;
        $data['rings_metal'] = $metal_list;
        $data['main_category_id'] = $category_id;
        $data['parent_cateid'] = $this->catemodel->getparentCateID($category_id);
        $data['page_links']   = $this->pagination->create_links();
        $data['ring_cate_name']   = $this->getCateName( $category_id ); //print_ar($data['ring_cate_name']);
        
        
        
        
        
        
        

        $output = $this->load->view('collections/wedding_bands' , $data , true);
        $this->output($output , $data);     
    }
    
    
    
    
    
    ///// rings similar items
    function ringSimilarItems($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        return;
        $rowsring = $this->catemodel->getRingsByCateory($ring_cateid, 0, $limit, $prod_id);
        
        $similar_rings = '';
        $popupBlock = '';
        if( count($rowsring['results']) > 0 ) {
            foreach( $rowsring['results'] as $rowring ) {
                
               $detaiLink = SITE_URL . 'testengagementrings/engagement_ring_detail/' . $rowring['ring_id'];
               $ringImageLink = SITE_URL . 'scrapper/imgs/' . $rowring['ImagePath'];
               $ring_title = $this->getRingTitle($rowring);
               $retail_price  = $rowring['priceRetail'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['priceRetail'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $popupBlock .= $this->product_popup_detail( $rowring['ring_id'] );
               $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/'.$rowring['ring_id'] . '/?keepThis=true&TB_iframe=true&width=900&height=600&modal=false';
               
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
			<!-- Mouse Hover DIV ENDS here -->engagement_ring_detail
		</li>';  
		
	
                }
                $similar_rings .= $popupBlock;
                
                
            }
        }
        return $similar_rings;
    }
    
    
    
    
    //// product popup detail
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
       $saving_percent = calc_save_percent( $rowsring['priceRetail'] );
       $results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowsring['name'] );
       $product_circle = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ring_title'], '400', '', 'details');
       $data['product_thums'] = $product_circle['thumb_image'];
       $cate = $this->getCateName( $rowsring['catid'] );
       
       $ring_detail_bk = '<div id="pop_'.$id.'" class="simplePopup collection_view">';
       $ring_detail_bk .= '<div class="col-sm-5 imgleft_block"><div class="product-image product-image-zoom zoomright" id="ringsthumb_view">
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
       //$this->load->view('engagementringstrial/product_popup_detail', $data);
        //$this->output($output, $data);        
    }
    
    
    
    
    /// get product thumb
    function getProductThumb($rowaray=array(), $popup='', $item_id='', $item_title='', $width=215, $height=215, $detail='') {
        $getRingsThumb = '';
	$check_thumb = array();
	$ring_title = $this->getRingTitle( $rowaray );
        $i = 1;
        $itemID = trim( $item_id );
        $set_ring_thumb = '';
        $set_popup_thumb = '';
        
	if( count($rowaray['item_thumbs']) > 0 ) {
		foreach( $rowaray['item_thumbs'] as $rng_thumb ) {
                    $unique_id = 'bk_'.$i.'_'.$item_id;
			$ringsThumb = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
			$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
			
			if( !in_array($rng_thumb['ImagePathThumb'], $check_thumb) ) {
                            if( empty($popup) ) {
				$getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$ringsView.'\')">
			<img src="'.$ringsThumb.'" alt=""></a></div>';
                            } else {
                                
                                if( $popup == 'listing' ) { //// if popup is listing then show these thumbs with dots in linsting page
                                    $getRingsThumb .= '<li id="'.$i.'"><a href="javascript://" onclick="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'" onmouseover="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'">'
                                            . '<img src="'.SITE_URL.'img/heart_diamond/in_active_circle.jpg" width="9" height="9" alt="'.$ring_title.'"></a>'
                                            . '</li>';
                                } else {
                                    $getRingsThumb .= '<li><a href="javascript://" onclick="ringThumbView(\''.$ringsView.'\');" title="'.$ring_title.'"><img src="'.$ringsThumb.'" width="31" alt="'.$ring_title.'"></a> </li>';
                                }
                                
                            }
                            $active_class = ( $i == 1 ? 'active_view' : 'hide_imgbk' );
                            
                            if( empty($detail) ) { //// check unique detail page
                               $set_ring_thumb .= '<div class="sp '.$active_class.'"><img src="'.$ringsView.'" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" /></div>';     
                            } else {
                                $set_ring_thumb .= '<div class="sp '.$active_class.'" id="'.$unique_id.'"><img src="'.$ringsView.'" onmouseover="show_magnify_affect(\''.$unique_id.'\')" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" /></div>';
                                
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
    
    
    
    ///// get rings listings view according to the category id
    function get_unique_ring_listing( $results = array()) {

        $ringlistings        = '';
        $popup_block = '';

        if (empty($results)) {
            $ringlistings .= '<div>NO Ring List Found!</div>';
            $popup_block  .= '';
            
            $return['ring_listing'] = $ringlistings;
            $return['popup_block'] = $popup_block;

            return $return;
        }
        
        if( count($results) == 0 ) {
            $ringlistings .= '<div>NO Ring List Found!</div>';
            
            return $ringlistings;
        }
        $total_records = count( $results );
        $i = 1;
        
        
        foreach( $results as $rowrings ) {
            if( $i <= 4 ) {
                $ringlistings .= $this->rings_block( $rowrings );
                $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
            }
            
            $i++;

        }
        
        if( $total_records >= 5 ) {
            $ringlistings .= '<div class="half_block_cols col-sm-6">';
            $j = 1;
            foreach( $results as $rowrings ) {
                if( $j > 4 && $j <= 8 ) {
                    $ringlistings .= $this->rings_block( $rowrings );
                    $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }
               $j++;
            }
            $ringlistings .= '</div>';

            $ringlistings .= '<div class="half_block_cols col-sm-6" style="width:518px;height:548px;padding-top:20%;text-transform:uppercase;color:#ffffff;background-color:#000000;text-align:center;font-size:40px;">'.get_site_contact_info('sites_title').'';
            $ringlistings .= '</div>';
            $ringlistings .= '<div class="clear"></div>';
        }
        
        if( $total_records >= 9 ) {
            $k = 1;
            foreach( $results as $rowrings ) {
                if( $k >= 9 && $k <= 16 ) {
                     $ringlistings .= $this->rings_block( $rowrings );
                     $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }
                
                $k++;
            }
        }
        
        if( $total_records >= 17 ) {
            $ringlistings .= '<div class="half_block_cols col-sm-6" style="width:518px;height:548px;padding-top:20%;text-transform:uppercase;color:#ffffff;background-color:#000000;text-align:center;font-size:40px;">'.get_site_contact_info('sites_title').'';
            $ringlistings .= '</div>';

            $ringlistings .= '<div class="half_block_cols col-sm-6">';
            $m = 1;
            foreach( $results as $rowrings ) {
                if( $m >= 17 && $m <= 20 ) {
                    $ringlistings .= $this->rings_block( $rowrings ); 
                    $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }
            
               $m++;
            }
            $ringlistings .= '</div>';
        }
        
        if( $total_records > 20 ) {
            $p = 1;
            
            foreach( $results as $rowrings ) {
                if( $p > 20 ) {
                    $ringlistings .= $this->rings_block( $rowrings );
                    $popup_block .= $this->product_popup_detail($rowrings['ring_id']);
                }

                $p++;

            }
        }
        
        $return['ring_listing'] = $ringlistings;
        $return['popup_block'] = $popup_block;
        
        return $return;
    }
    
    
    
    
    ///// get category name
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
        //print_ar($catevalue);
        
        return $catevalue;
    }
    
    
    
    
    //// rings block
    function rings_block($rowrings=array()) {
        $ringDetail = SITE_URL . 'testengagementrings/engagement_ring_detail/' . $rowrings['ring_id'];
        $ringsImg = SITE_URL . 'scrapper/imgs/' . $rowrings['ImagePath'];
        $priceMargin = $this->commonmodel->inventoryPriceMargin($rowrings['catid'], UNIQUE_OPTION);
        $rowrings['priceRetail'] = $rowrings['priceRetail'] * $priceMargin;
        $retailPrice = _nf($rowrings['priceRetail'] * PRICE_PERCENT, 2);
        $ourPrice = _nf($rowrings['priceRetail'], 2);
        $rid = $rowrings['ring_id'];
        $saving_percent = calc_save_percent( $rowrings['priceRetail'] );
        $cate = $this->getCateName( $rowrings['catid'] );
        $ringTitle = $rowrings['matalType'].' '.$cate['main_cname'] . ' ' . $rowrings['stone_weight'] . ' ' . $cate['sub_cname'] . ' Style';
        //$ringTitle = $this->getRingTitle($rowrings);
        $popupLink = SITE_URL . 'testengagementrings/product_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=850&height=600&modal=false';
        $results['item_thumbs'] = $this->catemodel->getRingThumbs( $rowrings['name'] );
        $product_circle = $this->getProductThumb( $results, 'listing', $rowrings['name'], $ringTitle);
            
                
                $ringlistings = '<li class="item rings_cols col-sm-3" data-url="'.$ringDetail.'" onmouseover="show_collection_block(\'hover_'.$rid.'\')" onmouseout="hide_block(\'hover_'.$rid.'\')">
      <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
        <div class="product-image"><a class="product-labels" href="'.$ringDetail.'" id="'. trim($rowrings['name']) .'" title="'.$ringTitle.'">        	
        	<div class="set_thumb_img" id="'.$rowrings['ring_id'].'">
                    '.$product_circle['thumb_image'].'
                </div>                 
                </a>
            </div>
        	<div><ul class="ringsThumb" id="' . trim( $rowrings['name'] ) . '">'.$product_circle['thumb_circle'].'</ul><div class="clear"></div></div>
		<h3><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3> 
        <div class="set_item_info">
            <div class="ring_view_rating"><img src="'.SITE_URL.'img/heart_diamond/rating_icong_view.jpg" alt="" /></div>
            <div class="priceLable">$ ' . _nf($rowrings['priceRetail'], 2) . '</div>
         </div>
         <div class="addto_cart_icon"><a href="#javascript" onClick="submitCartForm(\''.SITE_URL.'jewelleries/addtoshoppingcart/\', \''.$rid.'\')">Add to Cart</a>          </div>
      </div>
      <div class="box-detail-over" id="box-detail-over-'.$rid.'" style="display: none;">
        <div class="column3">
          <p>'.$ringTitle.'</p>
                    <div class="hover-price">
    <div class="popup-prices">
            <p class="old-price-qv">
                <span class="price-label-qv">Retail Price:</span>
                <span class="price-qv" id="old-price-'.$rid.'">
                    $'.$retailPrice.'                </span>
            </p>
                        <p class="old-price-qv">
                <span class="price-label-qv">Our Price:</span>
                <span class="new-price-qv" id="product-price-'.$rid.'">
                    $'.$ourPrice.'                </span>
		    <span class="special-price-label-qv">(Savings: '.$saving_percent.'%)</span>
                </p>
        </div>
          </div>
          <div id="product_additional_data_'.$rid.'"><div class="product_additional_data"></div></div>
        </div>
      </div>
        ' . $this->get_ring_hover_view($rowrings, $cate['sub_cname'], $rid, $ringsImg, $ringTitle, $results, $popupLink) . '
    </li>';
            
        return $ringlistings;
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
    
    
    
    //// ring hover block
    function get_ring_hover_view($rowrings=array(), $style_name='', $rid=0, $ringsImg='', $ringTitle='', $results='', $popupLink='') {
        
        $ring_hover = '<div class="collection_hover_bk" id="hover_'.$rid.'">
        <div class="view_count">1/'.count($results['item_thumbs']).'</div>
        <div class="quick_view"><a href="Javascript:;" onclick="view_simple_popup(\''.$rid.'\')" title="'.$ringTitle.'" rel="nofollow">Quick <br> View</a></div>
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
    
    

    function featured_jewels(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Featured Jewels';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/featured-jewels.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function women_wedding_ring_gallery(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Women Wedding Ring Gallery';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/rings.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function diamond_earring(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Diamond Earring';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/diamond-earrings.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function bracelets(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Bracelets';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/bracelets.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function necklaces(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Necklaces';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/necklaces.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function pendants(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Pendants';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/pendants.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function pearls(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Pearls';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/pearls.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function gemstones(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women > Gemstones';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/gemstones.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function mens_rings(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men > Mens Rings';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-rings.jpg?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function mens_bracelets(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men > Mens Bracelets';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-bracelets.jpg?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function mens_studs(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men > Mens Studs';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-studs.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function mens_chains(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men > Mens Chains';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-chains.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function cufflinks(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men > Cufflinks';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/cufflinks.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function engagement_rings(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men > Engagement Rings';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/engagement-rings.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function engagement_ring_under_2_000(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men > Engagement Ring Under $2,000';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/engagement-rings.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function bands_for_him(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men > Bands For Him';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/engagement-rings.gif?11590209297283401907';

        $output = $this->load->view('collections/collections-contents' , $data , true);
        $this->output($output , $data);     
    }

    function women(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Women';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/women.gif?11590209297283401907';

        $output = $this->load->view('collections/women' , $data , true);
        $this->output($output , $data);     
    }

    function men(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Men';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/mens-featured-collections.gif?11590209297283401907';

        $output = $this->load->view('collections/men' , $data , true);
        $this->output($output , $data);     
    }

    function weddings(){
        $data                       = $this->getCommonData(); 
        $data['title']              = get_site_contact_info('dashboard_title');
        $data['sub_page_link']      = 'Weddings';
        $data['ring_listings']      = '';
        $data['header_bg_image']    = 'https://cdn.shopify.com/s/files/1/0773/7929/t/10/assets/weddings.gif?11590209297283401907';

        $output = $this->load->view('collections/weddings' , $data , true);
        $this->output($output , $data);     
    }


    private function getCommonData($banner=''){
        $this->load->model('commonmodel');
        $data = array();
        $data = $this->commonmodel->getPageCommonData();
        return $data;
    }

    function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true){
        $this->load->model('user');
        $data['loginlink'] = $this->user->loginhtml();
        $output = $this->load->view($this->config->item('template').'header' , $data , true);
  
        $output .= $layout;
        if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
        $output .= $this->load->view($this->config->item('template').'footer', $data , true);
        $this->output->set_output($output);
    }
    
   
}