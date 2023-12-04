<?php
class Davidsternrings extends CI_Controller {
    private $finish;
    function __construct(){
            parent::__construct();
            $this->load->model('jewelrymodel');
            $this->load->model('diamondmodel');
            $this->load->model('engagementmodel');
            $this->load->model('qualitymodel');
            $this->load->model('davidsternmodel');
            $this->load->helper('ringsection');
            $this->load->model('commonmodel');
            $this->finish = '';
            $phone_from_admin = get_site_contact_info('contact_info'); 
            define('CONTACT_NO', $phone_from_admin);
    }	
    function index()
    {
        $data = $this->getCommonData(); 
        $data['title'] = 'Jewelry';
        $output = $this->load->view('jewelry/index' , $data , true);
        $this->output($output , $data);		
    }
    
    function personalized()
    {
        $data = $this->getCommonData(); 
        $data['title'] = 'Personalized';
        $output = $this->load->view('engagementringstrial/personalized_view' , $data , true);
        $this->output($output , $data);		
    }
    private function getCommonData($banner='')
    {
            $this->load->model('commonmodel');
            $data = array();
            $data = $this->commonmodel->getPageCommonData();
            return $data;
    }
    
    ///// category listings
    function stern_collection_cate($cates_id = 2) {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Engagement Rings';
        //$cates_id = 40;
        
        $data['ring_categoies'] = $this->category_cols_list_view($cates_id);
        $data['category_id'] = $cates_id;
        //$rings_cate = array(281, 283, 283, 284, 285);
        
        //$cateid_list = array_rand( $rings_cate, 4 );
        //$setcateid = $rings_cate[$cateid_list[0]];
        
        $data['similar_products'] = ''; //$this->ringSimilarItems($setcateid, '', 6, 'listings');
        
        if( $data['ring_categoies'] != 'false' ) {
            $output = $this->load->view('engagementringstrial/stern_collectoin_ringcate' , $data , true);
            $this->output($output, $data);
        } else {
            header('Location:' . SITE_URL . 'davidsternrings/ringlisting/' . $cates_id);
        }
    }
    
    ///// category listings
    function ringlisting($category_id=0, $start=0) {
        $data = $this->getCommonData();
        $this->load->library('pagination');
		
        $data['title'] = 'Engagement Rings';
        //$cate_title = resetsSlugTitle( $category_id );
        $caterow = $this->davidsternmodel->getCateName( $category_id );
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $sort = $this->input->get('sort');
        $metalcolor = $this->input->get('colors');
        $metal_val = check_empty( $this->input->get('metal'), '' );
        $metal_value = ( !empty($metal_val) ? urldecode($metal_val) : '' );
        $metal_color = ( ( !empty($metalcolor) ) ? urldecode($metalcolor) : '' );
        $sort_option =  ( ( isset($sort) && !empty($sort) ) ? $sort : 'ASC' );
        
        $config["per_page"] = ( $perpage > 0 ? $perpage : 20 );
        $config["num_links"] = 50;
        $config["uri_segment"] = 5;
        $config['use_page_numbers'] = TRUE;
        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        
        $ringresults = $this->davidsternmodel->getRingListing($category_id, $startFrom, $config["per_page"], $sort_option, $metal_value, $metal_color); 
        //print_ar($ringresults);
        
        $config["total_rows"] = $ringresults['total'];
        $base_link = SITE_URL.'davidsternrings/ringlisting/'.$category_id.'/?sort='.$sort_option;
	$config["base_url"]   = $base_link.'&pagelist='.$config["per_page"];
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $data['similar_products'] = $this->ringSimilarItems($category_id, '', 6, 'listings');
        
        $data['ring_listings'] = $this->stern_ring_lisitngs_view($ringresults['results']); //print_ar($ringresults['results']);
        $data['cate_name'] = $this->product_cate_list_link( $caterow['cate_name'] );
        $data['category_id'] = $category_id;
        $data['page_link'] = $base_link;
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $ringresults['total'], $start_from); // custome helper
        
        $options = '';  
        $page_link = ( !empty( $perpage_no ) ? $base_link.'&per_page='.$perpage_no : $base_link);
        
            for( $page=10; $page <= 50; $page+=10 ) {
                $options .= '<option value="'.$page_link.'&pagelist='.$page.'" '.selectedOption($page,$config["per_page"]).'>'.$page.'</option>';
            }
        ///// sort options
        $sort_list = array('ASC' => 'Lowest Price', 'DESC' => 'Highest Price');
        $sort_link = $page_link.'?per_page='.$page.'&sort=';
        $optionList = '';
        
        foreach( $sort_list as $sorting => $sort_value ) {
            $optionList .= '<option value="'.$sort_link.$sorting.'" '.selectedOption($sorting, $sort_option).'>'.$sort_value.'</option>';
        }
        //// metal list
        $results_metal = $this->davidsternmodel->sterMetalOptions( $category_id );
        $metal_list = '';
        $metal_link = $sort_link.$sort_option;
        
        foreach( $results_metal as $rowmetal ) {
           $metal_list .= '<option value="'.$metal_link.'&metal='.urlencode( $rowmetal['default_metal'] ).'" '.selectedOption($rowmetal['default_metal'], $metal_value).'>'.$rowmetal['default_metal'].'</option>';
        }
        //// metal color list
        $results_color = $this->davidsternmodel->sternColorsList( $category_id );
        $colors_list = '<option value="'.$metal_link.'&colors=">Metal Color</option>';
        
        foreach( $results_color as $rowcolor ) {
           $colors_list .= '<option value="'.$metal_link.'&colors='.urlencode( $rowcolor['default_color'] ).'" '.selectedOption($rowcolor['default_color'], $metal_color).'>'.$rowcolor['default_color'].'</option>';
        }
        
        $this->pagination->initialize($config); ///// initializ the pagination
        
        $data['page_options'] = $options;
        $data['metal_colors'] = $colors_list;
        $data['page_links'] = $this->pagination->create_links();
        $data['sorting_option'] = $optionList;       
        $data['rings_metal'] = $metal_list;       
        
        $output = $this->load->view('engagementringstrial/sternring_listing_view' , $data , true);
        $this->output($output, $data);
    }
    
    ///// stern collection page
    function stern_collection() {
        $data = $this->getCommonData();
        //$this->load->library('pagination');
        $this->unset_jewelry_field();
		
        $data['title'] = SITES_NAME;
        $data['rings_listing_3'] = $this->david_stern_collection_list( 3292598018, 0, 6, 3, '', 'check_image' );
        $data['rings_listing_5'] = $this->david_stern_collection_list( 3292598018, 6, 5, 5, '', 'check_image' );
        $data['necklaces_6_listing'] = $this->david_stern_collection_list( 3292603018, 0, 6, 3, 'necklace', 'check_image' );
        $data['necklaces_5_listing'] = $this->david_stern_collection_list( 3292603018, 6, 5, 5, 'necklace', 'check_image' );
        $data['bracelet_6_listing'] = $this->david_stern_collection_list( 3292607018, 0, 6, 3, '', 'check_image' );
        $data['bracelet_5_listing'] = $this->david_stern_collection_list( 3292607018, 6, 5, 5, '', 'check_image' );
        $data['earings_6_listing'] = $this->david_stern_collection_list( 3292601018, 0, 6, 3, '', 'check_image' );
        $data['earings_5_listing'] = $this->david_stern_collection_list( 3292601018, 6, 5, 5, '', 'check_image' );
        $data['dstern_2_listing'] = $this->david_stern_collection_list( 3292598018, 0, 4, 2, '', 'check_image' ); //$this->david_stern_main_listing( 0, 4, 2 );
        $data['dstern_5_listing'] = $data['rings_listing_5']; //$this->david_stern_main_listing( 4, 5, 5 );
        
        
        $output = $this->load->view('engagementringstrial/davidstern_collection' , $data , true);
        $this->output($output, $data);
    }
    
    //// hearts and diamond collection listing
    function david_stern_main_listing($start=0, $limit=4, $cols=2) {
        $results = $this->davidsternmodel->getRingListing(90, $start, $limit, 'DESC', '', '');
        
        $ring_listing = '';
        
        if( count($results['results']) > 0 ) {
            foreach( $results['results'] as $rowrings ) {
                $ringDetail = SITE_URL . 'davidsternrings/jewelry_ring_detail/' . $rowrings['id'];
                
                //$ringsImg = SITE_URL . 'images/no_img_found.jpg';
                $ringsImg = STERN_IMGS . $rowrings['item_id'].'.jpg';
                //$ringTitle .= '<br>Item ID: '.$rowrings['item_id'];
                    
                //$retailPrice = _nf($rowrings['gold_polished_1300'] * PRICE_PERCENT, 2);
                //$ourPrice = _nf($rowrings['gold_polished_1300'], 2);
                //$rid = $rowrings['id'];
                
                $ring_listing .= '<div class="stern_cols_'.$cols.'"><a href="'.$ringDetail.'"><img src="'.$ringsImg.'" alt="" width="226" /></a></div>';
                
            }
        }
        
        return $ring_listing;
        
    }
    
    ///// stern collection page
    function stern_collection_listing($id='') {
        $data = $this->getCommonData();
        //$this->load->library('pagination');
        $this->unset_jewelry_field();
		
        $data['title'] = SITES_NAME;
        $necklace = ( $id == '3292603018'  ? 'necklace' : '' );
        $data['rings_listing'] = $this->david_stern_collection_list( $id, 0, '', 5, $necklace );
        
        $output = $this->load->view('engagementringstrial/davidstern_collection_listing' , $data , true);
        $this->output($output, $data);
    }
    
    //// stern collection detail page
    ///// product detail page
    function collection_detail($product_id=0) {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Engagement Rings Detail';
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        
        //$this->load->view('engagementringstrial/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        $ring_size = $this->input->get('ring_size');
        $rsize_price = $this->catemodel->getFingerSizePrice( $ring_size );
        
        $rowsring = $this->davidsternmodel->getSternCollectionDetail($product_id); //print_ar($rowsring);
        
        if( empty( $rowsring['global_fields'] ) ) {
            $this->unset_jewelry_field();
        }
        
        $data['category_name'] = jewelry_cate_name( $rowsring['category'] );
        $data['rowsring'] = $rowsring;
        $data['jewelery_details'] = $this->jewelry_detail_rows( unserialize( $rowsring['global_fields'] ) );  /// get the jewelry detail that in serialize formate
        $priceMargin = $this->commonmodel->inventoryPriceMargin('dstern', 'dstern_collection');
        $jewelery_price = $this->session->userdata('jewelry_price') * $priceMargin;
        
        $data['jewelery_price'] = ( ( $jewelery_price > 0 && !empty($data['jewelery_details']) ) ? '$ ' . _nf($jewelery_price, 2) : 'Please Call 1.561.994.3330 for price' );
        
        $data['sales_price'] = $rowsring['price_website'] + $rsize_price;
        $data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'jewelleries/addtoshoppingcart/');
        $data['item_desc'] = get_site_title().' Jewelry can be yours for $'._nf($rowsring['price_website'], 2).'.';
        
        //$cate = $this->getCateName( $rowsring['catid'] );  
        //$ringBoxDesc = $data['category_name'] . ' ' . $rowsring['metal_purity'];        
        $data['item_code'] = ( !empty( $rowsring['item_sku'] ) ? $rowsring['item_sku'] : $rowsring['stock_number'] );
        //$data['ringtitle'] = $ringBoxDesc. ' Item ID: '. $data['item_code'];
        $data['ringtitle'] = $this->get_ring_title($rowsring, $data['category_name']);
        
        $data['ringimg'] = $this->jewelry_get_img( $rowsring );
        
        $data['setingtype']   = ''; //$cate['sub_cname'];
        $data['maincate_name'] = ''; //$cate['main_cname'];
        $data['subcate_link'] = ''; //$this->product_cate_list_link( $cateName[0] );
         //$data['sales_price'] = $rowsring['gold_polished_1300'];
        
        $data['similar_items'] = $this->collectionSimilarLististing($rowsring['category'], $product_id);
        $data['similar_products'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4);
        $data['popular_listings'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4);
        $data['more_collection_listings'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4);
        ////// get user comments
	$data['view_coments'] = $this->getProductReviews( $product_id );
	$data['finished_level'] = $this->finishlevel( $product_id, 'gold', 'options' );
        $data['rings_allowed_id'] = array(3292598018);
        
        $data['extra_headers'] = '';
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $ringresults = $this->catemodel->getFingerSizeResult();
        $base_link = SITE_URL.'davidsternrings/collection_detail/'.$product_id.'/';
        $finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowsize ) {
                $rgsz = setRingSize($rowsize['ring_size']);
                $finger_size .= '<option value="'.$base_link.'?ring_size='.$rgsz.'" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
            }
        }

        ////// item thumbs
        $data['page_link'] = $base_link;
        $data['finger_ring_size'] = $finger_size;
        $data['set_ring_size'] = resetsSlugTitle($ring_size);
        $data['rings_thumb'] = ''; //$this->getProductThumb( $rowsring );
        $data['ring_weight'] = $this->session->userdata('ring_weight');
        $data['items_metal'] = ( !empty( $rowsring['metal_purity'] ) ? $rowsring['metal_purity'] :  $this->session->userdata('items_metal') );
        $data['items_weight'] = ( !empty( $rowsring['weight'] ) ? $rowsring['weight'] : $this->session->userdata('items_weight') );
         //print_ar($_SESSION);
        
        $output = $this->load->view('engagementringstrial/collection_detail_view' , $data , true);
        $this->output($output, $data);
    }
    
    function get_ring_title($rowsarray=array(), $ring_collection='') {
        $ring_title = 'The ' . $this->session->userdata('ring_name') . ' is an exquisite ' . $this->session->userdata('ring_metal_type') . ' piece of jewelry from the Davidsternfinejewelry ' . $ring_collection . ' Collection';
        
        return $ring_title;
        
    }

//// site map
    function site_map_page() {
        $data = $this->getCommonData();
        
	$row_content = $this->commonmodel->getCompanyInfoRow('site-map');
        $data['content'] = check_empty($row_content['content'], 'Coming Soon');
	$data['content_title'] = check_empty($row_content['description'], 'Coming Soon'); 
        $data['title'] =  check_empty($row_content['description'], getadmin_contact_info('sites_title'));
        
        $data['sitemap_links'] = $this->siteMapLinkList();
        
        $output = $this->load->view('erd/site_map_view' , $data , true);
        $this->output($output, $data);
    }
    
    function siteMapLinkList() {
        $this->load->helper('sitemap_link');
        
        $sitemap_list = getSitemapLinks();
        $view_list = '';
        
        foreach( $sitemap_list as $label => $link ) {
            $view_list .= '<li><a href="' . SITE_URL . $link . '">' . $label . '</a></li>';
        }
        
        return $view_list;
        
    }
    
    function jewelry_detail_rows($rows=array()) {
        $rows_list = '';
        $metal_cols = array('PLATINUM', '14k white gold', '18k white gold', '14k two-tone', 'SIL 18kt yel', '18k yellow gold', '14k yellow gold', '18kgreen', 'SILVER', '18k two tone  silver', '18k two tone  silver', '18K ROSE /SILVER', '14kwhite gold');
        //print_ar($rows);
        
        if( count($rows) > 0 ) {
            foreach( $rows as $row ) {
                
                if( $row[0] == 'Ring Weight') {
                    $this->session->set_userdata('ring_weight', $row[1]);
                }
                if( trim($row[0]) == 'Name') {
                    $this->session->set_userdata('ring_name', $row[1]);
                }
                if( $row[0] == 'Metal Type') {
                    $this->session->set_userdata('ring_metal_type', $row[1]);
                }
                
                if( in_array(trim($row[0]), $metal_cols) ) {
                    $get_wt = explode(".", str_replace("..", ".", $row[1]) );
                    $field_value = ( ( $get_wt[1] * 1.55 ) . ' grams' );
                    
                    $this->session->set_userdata('items_metal', $row[0]);
                    $this->session->set_userdata('items_weight', $field_value);
                    
                    if( !empty($get_wt[2]) ) {
                        $this->session->set_userdata('jewelry_price', $get_wt[2]);
                    }
                    
                } else {
                    $field_value = $row[1];
                }
                
                $rows_list .= '<div class="item_rows">
                                <span>'.$row[0].'</span>
                                <span>'.$field_value.'</span>
                                <div class="clear"></div>
                            </div>';
            }
        }
        
        return $rows_list;
    }
    
    function unset_jewelry_field() {
        $this->session->unset_userdata('ring_weight');
        $this->session->unset_userdata('items_metal');
        $this->session->unset_userdata('items_weight');
        $this->session->unset_userdata('jewelry_price');
        $this->session->unset_userdata('ring_name');
        $this->session->unset_userdata('ring_metal_type');
    }
    //// hearts and diamond collection jewelry rings
    function david_stern_collection_list($cid=0, $start=0, $limit=4, $cols=2, $type='', $ck_empty='') {
        $rowrings = $this->davidsternmodel->get_jewelry_list( $cid, $start, $limit, $type, $ck_empty );
        $ring_listing = '';
        
        if( count($rowrings) > 0 ) {
            foreach( $rowrings as $rows ) {
            $detaiLink = SITE_URL.'davidsternrings/collection_detail/'.$rows['stock_number'];
            
            $ringImage = $this->jewelry_get_img( $rows );
                
                $ring_listing .= '<div class="stern_cols_'.$cols.' col-sm-2"><a href="'.$detaiLink.'"><img src="'.$ringImage.'" alt="" width="226" /></a></div>';
            }
        }
        return $ring_listing;
    }
    
    function jewelry_get_img($rows=array()) {
        if( !empty($rows['image1']) ) {
                $ringImage = ( (file_exists('images/'.$rows['image1'])) ? SITE_URL.'images/'.$rows['image1'] : SITE_URL.'img/noimage_found.jpg' );
            } else {
                
                $ringImage = ( (file_exists('images/uploads/'.$rows['item_sku'].'.jpg')) ? SITE_URL.'images/uploads/'.$rows['item_sku'].'.jpg' : SITE_URL.'img/noimage_found.jpg' );
            }
            
            return $ringImage;
    }
    
    //// get category image link
   function getCateImageLink($cid=0) {
       $sub_cateid = $this->davidsternmodel->checkSubCategory( $cid );
       
       $category_id = $cid;
       if( $sub_cateid > 0 ) {
           $category_id = $sub_cateid;
       }       
       
       $results = $this->davidsternmodel->sternProductDetail(0, $category_id );
       $imageLink = STERN_IMGS.$results['item_id'].'.jpg';
       
       if( !empty($results['item_id']) ) {
            return $imageLink;
       } else {
           return '';
       }
   }
    
    //// get main and parent category name list
   function product_cate_list_link($cname='') {
       
       //$cate_name = '<li><a href="#" alt="hearts and diamond Collection">hearts and diamond Collection</a></li>';
                
        $cate_name = '<li><a href="#">'.$cname.'</a></li>';
        
        $catelink['category_link'] = $cate_name;
        $catelink['category_name'] = $cname;
        
        return $catelink;
   }
    ///// product detail page
    function jewelry_ring_detail($product_id=0) {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Engagement Rings Detail';
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        
        //$this->load->view('engagementringstrial/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        $ring_size = $this->input->get('ring_size');
        $rsize_price = $this->catemodel->getFingerSizePrice( $ring_size );
        
        $rowsring = $this->davidsternmodel->sternProductDetail($product_id);
        $data['buildring'] = $this->session->userdata('buildring');
        $data['rowsring'] = $rowsring;
        $priceMargin = $this->commonmodel->inventoryPriceMargin($rowsring['category_id'], OVERNIGHT_OPTION);
        $rowsring['gold_polished_1300'] = $rowsring['gold_polished_1300'] * $priceMargin;
                
        $data['sales_price'] = $rowsring['gold_polished_1300'] + $rsize_price;
        $data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'jewelleries/addtoshoppingcart/');
        $ringBoxDesc = str_replace("/", ', ', $rowsring['categories_name']);
        $data['item_desc'] = get_site_title().' stunning '.$ringBoxDesc . ' can be yours for $'._nf($rowsring['gold_polished_1300'], 2).'.';
        $cateName = explode("/", $rowsring['categories_name']);
        
        $cate = $this->getCateName( $rowsring['catid'] );  
        
        $data['ringtitle'] = $ringBoxDesc. ' Item ID: '. $rowsring['item_id'];
        $data['ringimg']   = STERN_IMGS.$rowsring['item_id'].'.jpg';
        $data['setingtype']   = $cate['sub_cname'];
        $data['maincate_name'] = $cate['main_cname'];
        $data['subcate_link'] = $this->product_cate_list_link( $cateName[0] );
         //$data['sales_price'] = $rowsring['gold_polished_1300'];
        
        $data['similar_items'] = $this->ringSimilarItems($rowsring['category_id'], $product_id);
        $data['similar_products'] = $this->ringSimilarItems($rowsring['category_id'], $product_id, 4);
        $data['popular_listings'] = $this->popularListings($rowsring['category_id'], $product_id, 4);
        $data['more_engagement_listings'] = $this->popularListings($rowsring['category_id'], $product_id, 4);
        ////// get user comments
	$data['view_coments'] = $this->getProductReviews( $product_id );
	$data['finished_level'] = $this->finishlevel( $product_id, 'gold', 'options' );
        
        $data['rings_parent_id'] = $this->catemodel->stern_main_parent_cid( $rowsring['category_id'] );
        $data['rings_allowed_id'] = array(2, 6, 9, 7);
        
        $data['extra_headers'] = '';
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $ringresults = $this->catemodel->getFingerSizeResult();
        $base_link = SITE_URL.'davidsternrings/jewelry_ring_detail/'.$product_id.'/';
        $finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowsize ) {

                $rgsz = setRingSize($rowsize['ring_size']);
                $finger_size .= '<option value="'.$base_link.'?ring_size='.$rgsz.'" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
            }
        }

        ////// item thumbs
        $data['finger_ring_size'] = $finger_size;
        $data['set_ring_size'] = resetsSlugTitle($ring_size);
        $data['rings_thumb'] = $this->getProductThumb( $rowsring );
        //$data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );  /// get supplied stones shapes
        
        $output = $this->load->view('engagementringstrial/sternring_detail_view' , $data , true);
        $this->output($output, $data);
    }
    
    //// get commnets list
    function getProductReviews($rid=0) {
        ////// get user comments
	$rings_coments = $this->catemodel->getComentsListView($rid);
	$view_coments = '';
	
	if( count($rings_coments) > 0 ) {
		foreach($rings_coments as $row_coments) {
			$view_coments .= '<div class="reviews_block">
								<div class="reviews_label">
								  <div><img src="'.SITE_URL.'img/page_img/stars_icon.png" /></div>
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
    
    /// get product thumb
    function getProductThumb($rowaray=array(), $popup='') {
        $getRingsThumb = '';
        $itemTitle = $rowaray['categories_name'].' ITEM ID: ' . $rowaray['item_id'];
        
	$thumb_options = array(
                        'alt', 
                        'alt1', 
                        'normal', 
                        'set.alt', 
                        'set.alt1',
                        'set',
                        'side.alt',
                        'side.alt1',
                        'side',
                        'ver.alt',
                        'ver.alt1',
                        'ver',
                        'ver1.alt',
                        'ver1.alt1',
                        'ver1'
            );
	
        foreach( $thumb_options as $thoption ) {
            $imageName = ( $thoption === 'normal' ? $rowaray['item_id'] : $rowaray['item_id'].'.'.$thoption );
            $thumbimage = STERN_IMGS . $imageName . '.jpg';
            
            if( getimagesize($thumbimage) ) {
                if( empty($popup) ) {
				$getRingsThumb .= '<div class="smalimgview"><a href="#javascript;" onclick="ringThumbView(\''.$thumbimage.'\')">
			<img src="'.$thumbimage.'" alt="'.$itemTitle.'"></a></div>';
                            } else {
                                $getRingsThumb .= '<li><a href="javascript://" onclick="imageshow(\''.$thumbimage.'\');" title="'.$itemTitle.'"><img src="'.$thumbimage.'" width="31" alt="'.$itemTitle.'"></a> </li>';
                            }
            }
        }
        
        return $getRingsThumb;
    }
    //// get diamond shape
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
    
    ///// rings similar items popularListings
    function ringSimilarItems($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->davidsternmodel->sternSimilartProduct($prod_id, $ring_cateid, $limit);
                
        $similar_rings = '';
        
        if( count($rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'davidsternrings/jewelry_ring_detail/' . $rowring['id'];
               $ringImageLink = STERN_IMGS.$rowring['item_id'].'.jpg';
               
            //if( getimagesize( $ringImageLink ) ) {
               $ringBoxDesc = str_replace("/", ', ', $rowring['categories_name']);
               $ring_title = wordwrap($ringBoxDesc,25,"<br>\n").'<br>Item ID: '.$rowring['item_id'];
               $retail_price  = $rowring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['gold_polished_1300'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $rid = $rowring['id'];
               $popupLink = SITE_URL . 'davidsternrings/stern_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               
            if( empty($listing) ) {
               $similar_rings .= '<div class="prdSection" id="'.$rid.'">
                                    <a href="'.$detaiLink.'" class="alsoviwed-product-img">
                                            <img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
                                    </a><br><br>
                                    <a class="prdName" title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a>
                                    <div class="price-box">
                                            <p class="old-price"><span>Retail Price:</span>
                                            <span style="text-decoration: line-through;"> $'._nf($retail_price, 2).'</span></p>
                                            <p class="our-price"><span>Our Price:</span><span> $'._nf($ring_ourprice, 2).'</span><br>
                                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150" /></span></p>
                                            <!-- <a class="viewItem" href="">View Item</a> -->
                                    </div>
				</div>'; 
                } else {
                   $similar_rings .= '<li class="item first">
			<div class="product-grid-quick" onmouseover="showTopQuickView('.$rid.');" onmouseout="hideTopQuickView('.$rid.');" style="overflow:hidden;">
				<div id="top-quickview'.$rid.'" style="display: none; position: relative;">
					<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\', \'Quick View\', \'nofollow\');" title="Quick View'.$ring_title.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
				</div>
				<a title="'.$ring_title.'" href="'.$detaiLink.'"><img alt="'.$ring_title.'" class="" src="'.$ringImageLink.'" width="200" style="display: inline;"></a>
				<h2 class="product-name"><a title="'.$ring_title.'" href="'.$detaiLink.'">'.$ring_title.'</a></h2>
				<div class="price-box">
                                    <p class="old-price"><span class="price-label">Retail Price:</span> 
                                    <span id="old-price-802865" class="price">$'._nf($retail_price, 2).'</span></p>
				<p class="our-price"><span class="price-label">Our Price:</span> 
                                <span id="product-price-'.$rid.'">$'._nf($ring_ourprice, 2).'</span><br>
                                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150" /></span>
                                    </p>
				</div>
				<ul class="add-to-links-details">
					<li><a class="view-item" href="'.$detaiLink.'">View Item</a></li>
				</ul>
			</div>
			<!-- Mouse Hover DIV STARTS here -->
			<div class="box-detail-over right-box" id="top-box-detail-over-'.$rid.'" style="display: none;">
				<div class="column3">
					<p>'.$ring_title.'</p>
					<div class="hover-price">
						<div class="popup-prices">
                                                <p class="old-price-qv"><span class="price-label-qv">Retail Price:</span> 
                                                <span id="old-price-'.$rid.'" class="price-qv">$'._nf($retail_price, 2).'</span></p>
							<p class="old-price-qv"><span class="price-label-qv">Our Price:</span> <span id="product-price-'.$rowring['id'].'" class="new-price-qv">$'._nf($ring_ourprice, 2).'</span> <span class="special-price-label-qv">(Savings: '.round($saving_percent).'%)</span></p>
</div>
					</div>
					<div id="top-product_additional_data_'.$rid.'"></div>
				</div>
			</div>
			<!-- Mouse Hover DIV ENDS here -->
		</li>';     
                }
            //} /// end getimagesize
          } /// end foreach
        }  //// end count if
        
        return $similar_rings;
    }
    ///// rings popular items 
    function collectionSimilarLististing($cid=0, $prod_id=0, $limit=5) {
        $rowsring = $this->davidsternmodel->colectionSimilarProduct($cid, $prod_id, $limit);
        $priceMargin = $this->commonmodel->inventoryPriceMargin('dstern', 'dstern_collection');
                
        $similar_rings = '';
        
        if( count($rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'davidsternrings/collection_detail/' . $rowring['stock_number'];
               $ringImageLink = $this->jewelry_get_img( $rowring );
               
               $ring_title = $this->stern_ring_title( $rowring );
               $ring_ourprice = $rowring['price_website'] * $priceMargin;
               $detailDesc = 'Metal Purity ' . $rowring['metal_purity'] . ' Metal Color ' . $rowring['metal_color'];
               
            $similar_rings .= '<div class="product_colsbk col-sm-3">
                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"></a></div>
                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg" alt=""><span class="reviewlabel">(86 Review)</span></div><br>
                        <div>$ '. _nf($ring_ourprice, 2).'</div>
                        <div class="setcolor_label">+ '.$rowring['product_type'].'</div><br>
                        <div class="centerLabel"><a href="'.$detaiLink.'">This is '.$ring_title.'</a></div>
                        <div class="setcolor_label">'.$detailDesc.'</div>
                    </div>';
            }
        }
        
        return $similar_rings;
    }
    
    function stern_ring_title($rowring=array()) {
        $title = get_site_title() . ' ' . jewelry_cate_name( $rowring['category'] );
        
        return $title;
    }
    ///// rings popular items 
    function popularListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->davidsternmodel->sternSimilartProduct($prod_id, $ring_cateid, $limit);
                
        $similar_rings = '';
        
        if( count($rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'davidsternrings/jewelry_ring_detail/' . $rowring['id'];
               $ringImageLink = STERN_IMGS.$rowring['item_id'].'.jpg';
               $ring_title = $this->getRingTitle( $rowring, 'rings' );
               //$retail_price  = $rowring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['gold_polished_1300'];
               //$saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               //$popupLink = SITE_URL . 'davidsternrings/stern_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
               $detailDesc = 'Metal ' . $rowring['default_metal'] . ' Diamond CCTW ' . $rowring['diamond_cctw_provided'];
               
            $similar_rings .= '<div class="product_colsbk col-sm-3">
                <div class="productRingImg"><a href="'.$detaiLink.'"><img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"></a></div>
                        <div><img src="'.IMGSRC_LINK.'rating_icon.jpg" alt=""><span class="reviewlabel">(86 Review)</span></div><br>
                        <div>$ '. _nf($ring_ourprice, 2).'</div>
                        <div class="setcolor_label">+ '.$rowring['product_type'].'</div><br>
                        <div class="centerLabel"><a href="'.$detaiLink.'">This is '.$ring_title.'</a></div>
                        <div class="setcolor_label">'.$detailDesc.'</div>
                    </div>';
            }
        }
        
        return $similar_rings;
    }
    ///// get rings listings view according to the category id
    function stern_ring_lisitngs_view( $results = array()) {
        $ringlistings = '';
        $str = 150;
        
        if( count($results) > 0 ) {
            foreach( $results as $rowrings ) {
                $ringDetail = SITE_URL . 'davidsternrings/jewelry_ring_detail/' . $rowrings['id'];
                
                //$ringsImg = SITE_URL . 'images/no_img_found.jpg';
                $ringsImg = STERN_IMGS . $rowrings['item_id'].'.jpg';
                $priceMargin = $this->commonmodel->inventoryPriceMargin($rowrings['category_id'], OVERNIGHT_OPTION);
                $rowrings['gold_polished_1300'] = $rowrings['gold_polished_1300'] * $priceMargin;
        
            //if( getimagesize( $ringsImg ) !== FALSE ) {
                $ringBoxDesc = str_replace("/", ', ', $rowrings['categories_name']);
                $ringTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
                $ringTitle .= '<br>Item ID: '.$rowrings['item_id'];
                    
                $retailPrice = _nf($rowrings['gold_polished_1300'] * PRICE_PERCENT, 2);
                $ourPrice = _nf($rowrings['gold_polished_1300'], 2);
                $rid = $rowrings['id'];
                
                $popupLink = SITE_URL . 'davidsternrings/stern_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
                
                $ringlistings .= '<li class="item" data-url="'.$ringDetail.'">
      <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
        <div id="quickview'.$rid.'" style="display: none;"> 
        	<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\',\'Quick View\',\'nofollow\');" title="'.$ringTitle.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
        </div>
        <div class="product-image"><a class="product-labels" href="'.$ringDetail.'" title="'.$ringTitle.'">
        	
        	<img class="" src="'.$ringsImg.'" itemprop="image" alt="'.$ringTitle.'" style="display: inline;"></a></div>
        	
		<h3><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3>
          
    <div class="price-box">
                                
                    <p class="old-price">
                <span class="price-label">Retail Price:</span>
                <span class="price" id="old-price-'.$rid.'">
                    $'.$retailPrice.'                </span>
            </p>
                        <p class="our-price">
                <span class="price-label">Our Price:</span>
                <span id="product-price-'.$rid.'">
                    $'.$ourPrice.'                </span><br>
                <span><img src="'.SITE_URL.'demo_retail/images/logo-getfinancing.png" width="150" /></span>
            </p>
		<p class="special-price">
			<!--<span class="price-label">(Savings: 
			%)
			</span>-->
		</p>
        </div>
        <div class="actions">
                    <a href="'.$ringDetail.'" class="view-item" title="'.$ringTitle.'">View Item</a>
          				
	<div class="ratings">
                    <div class="rating-box">
                <div class="rating" style="width:100%"></div>
            </div>
                <span class="amount"><a href="'.$ringDetail.'#prod_detail">4 Review(s)</a></span>
    </div>
	</div>
      </div>
      <div class="box-detail-over " id="box-detail-over-'.$rid.'" style="display: none;">
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
          
            			
			<span class="special-price-label-qv">(Savings: 64%)</span>
			  </p>
        </div>
          </div>
          <div id="product_additional_data_'.$rid.'"><div class="product_additional_data"></div></div>
        </div>
      </div>
    </li>';
            //}
                
    } /// end foreach loop
    
        } else {
            $ringlistings .= '<div>NO Rrings List Found!</div>';
        }
        
        return $ringlistings;
    }
    ////// get the category list view
    function category_cols_list_view($cid=0) {
        
        $ringresults = $this->davidsternmodel->getCateList( $cid );
        //print_ar($ringresults);
        
        $catelist_view = '';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowcate ) {
                $detaiLink = SITE_URL.'davidsternrings/stern_collection_cate/'.$rowcate['id'];
                $cateImgLink = $this->getCateImageLink( $rowcate['id'] ); //SITE_URL.'images/no_img_found.jpg';
            
                if( !empty($cateImgLink) ) {
                    $ringTitle = $rowcate['cate_name'];

                    $cateDesc = 'We have taken care of your engagement rush by creating a breathtaking collection of the <a href="'.$detaiLink.'" style="text-decoration: none;"><strong>'.$ringTitle.'</strong></a> available in 14k or 18k yellow, rose, white gold or Platinum our pre-set diamond engagement rings are made to impress and for any budget:  from unique engagement rings to solitaire engagement rings to very cheap engagement rings.
                                                    ';

                    $catelist_view .= '<div class="cat-list"><div class="cat-row-inner"><span class="cat-name"><a href="'.$detaiLink.'" alt="" title="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');">'.$ringTitle.'</a></span><div class="cat-image"><a href="'.$detaiLink.'" alt="'.$ringTitle.'" title="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');">	<img class="" src="'.$cateImgLink.'" alt="'.$ringTitle.'" title="'.$ringTitle.'" border="0" style="display: block;">
            </a></div>
                    <div class="sm-desc ">
                      <div class="cat-view-more">'.$cateDesc.'</div>
                            <a href="'.$detaiLink.'" class="more-btn" title="'.$ringTitle.'" alt="'.$ringTitle.'" onclick="setrefrenceurl(371,\'\');"></a>
                            </div>
                    </div></div>';
                }
            }
        } else {
            $catelist_view .= 'false';
        }
        
        return $catelist_view;
    }
    
    //// get ring title
    function getRingTitle($rowring=array(), $ring='') {
        $ringTitle = str_replace("/", ', ', $rowring['categories_name']);
        if( empty($ring) ) {
            $ringTitle .= ' Item ID: '.$rowring['item_id'];            
        } else {
            $ringTitle .= ' <br>Item ID: '.$rowring['item_id'];
        }
        
        return $ringTitle;
    }
    ///// get category name
    function getCateName( $cid=0 ) {
        $catevalue = array();
        
        $catevalue['main_cname'] = $this->catemodel->getRingCategoryName( $cid );
        $subparent = $this->catemodel->getparentCateID( $cid );
        $catevalue['sub_cname'] = $this->catemodel->getRingCategoryName($subparent);
        
        return $catevalue;
    }
    function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true)
    {
            $this->load->model('user');
            $data['loginlink'] = $this->user->loginhtml();
            $output = $this->load->view($this->config->item('template').'header' , $data , true);
      
            $output .= $layout;
            if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
            $output .= $this->load->view($this->config->item('template').'footer', $data , true);
            $this->output->set_output($output);
    }
    
    //// get supported shape
    function getSuportedShape( $rowring ) {
        $ctstone_shape = $rowring['additional_stones']; 
	$find_ctsahpe = getCenterStoneShape($ctstone_shape);
        $suport_shape = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
        
        return $suport_shape;
    }
    ////// get product detail
    function listingdetail($id=0, $popup='') {
        $rowsring = $this->davidsternmodel->sternProductDetail($id);
        
        $view_iteminfo = '';
        $view_iteminfo .= '<span id="item-info"><b>Item Information</b></span>
<table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
  <tbody>';
    $view_iteminfo .= '<tr class="first-row">
                        <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
                        <td style="color:#ff0000;font-weight:bold;">'.$rowsring['item_id'].'</td>
                      </tr>';
    $view_iteminfo .= '<tr class="first-row">
                                <th style="width:40%;">Default Metal</th>
                                <td>'.$rowsring['default_metal'].'</td>
                              </tr>';
    
    if( !empty($rowsring['default_color']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Default Color</th>
                            <td>'.$rowsring['default_color'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['categories_name']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Category Name</th>
                            <td>'.$rowsring['categories_name'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['approxi_semi_mount']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Semi Mount</th>
                            <td>'.$rowsring['approxi_semi_mount'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['pc_casting']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">PC Casting</th>
                            <td>'.$rowsring['pc_casting'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['stone_breakdown']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Stone Breakdown</th>
                            <td>'.$rowsring['stone_breakdown'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['diamond_cctw_provided']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">CCTW Provided</th>
                            <td>'.$rowsring['diamond_cctw_provided'].'</td>
                          </tr>';
    }
    if( !empty($rowsring['diamond_quality']) ) {
      $view_iteminfo .= '<tr class="first-row">
                            <th style="width:40%;">Diamond quality <br>that prices are based at</th>
                            <td>'.$rowsring['diamond_quality'].'</td>
                          </tr>';
    }
     
 $view_iteminfo .= '</tbody></table>';
 
        if( empty($popup) ) {
            echo $view_iteminfo;
        } else {
            return $view_iteminfo;
        }
        
    }
    //// product popup detail
    function stern_popup_detail($id=0) {
       $data = $this->getCommonData();
       $rowsring = $this->davidsternmodel->sternProductDetail($id); //print_ar($rowsring);
       
       $data['title'] = $rowsring['title'];
       $data['listings_detail'] = $this->listingdetail( $id, 'popup' );
       $data['ring_title'] = $this->getRingTitle($rowsring);
       $data['rings_thumb'] = $this->getProductThumb( $rowsring, 'popup' );
       $data['ringimg']   = STERN_IMGS.$rowsring['item_id'].'.jpg';
       $data['rowsring']   = $rowsring;
       $data['retail_price']  = $rowsring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
       $data['salesprice'] = $rowsring['gold_polished_1300'];
       $data['saving_percent'] = ( 100 - ( ( $data['salesprice'] / $data['retail_price'] ) * 100 ) );
       
       $this->load->view('engagementringstrial/sternjw_popup_detail', $data);
        //$this->output($output, $data);
        
    }
    
    ///// get finish level value
    function finishlevel($rid='', $metal='gold', $level='') {

        $rowsring = $this->davidsternmodel->sternProductDetail( $rid );
        
        $field_figur = $this->getFinishedLevel( $metal );
        //// price fields
        $finishOptions = array(
            $metal.'_polished'.$field_figur => 'Polished',
            $metal.'_semimount'.$field_figur => 'Semi Mount',
            $metal.'_complete'.$field_figur => 'complete'
        );
        
        $options = '';
        $i = 1;
        foreach( $finishOptions as $fskey => $fsvalue ) {
            if( $rowsring[$fskey] > 0 ) {
                $optionValue = ( $fsvalue === 'Semi Mount' ? 'semimount' : setSlugTitle($fsvalue) );
                $options .= '<option value="'.$optionValue.'" '.selectedOption(1, $i).'>'.$fsvalue.'</option>';
                
                $i++;
            }
        }
        $return['prices'] = $rowsring[$metal.'_polished'.$field_figur];
        $return['metal_list'] = $options;
        
        if( $level === 'finish' ) {
            echo $return['prices'] . '_' . $options;
        } else {
            return $options;
        } 
        //echo $return['prices'] . '_' . $options;
    }
    ///// get price according to the finished level
    function setFinishedLevel($rid='', $metal='gold', $level='polished') {

        $rowsring = $this->davidsternmodel->sternProductDetail( $rid );
        
        $field_figur = $this->getFinishedLevel( $metal );
        
        echo $rowsring[$metal.'_'.$level.$field_figur];
    }
    
    function getFinishedLevel($metal='gold') {
        $field_figur = '';
        if( $metal == 'gold' ) {
            $field_figur = '_1300';
        } elseif( $metal == 'silver' ) {
            $field_figur = '_40';
        } elseif( $metal == 'platinum' ) {
            $field_figur = '_1200';
        }
        
        return $field_figur;
    }
    
    /// get product categories
    function stern_listing_cate() {
        
        $sql = "SELECT categories_name FROM dev_overnight WHERE categories_name <> '' GROUP BY categories_name ORDER BY categories_name ASC";
        
        $query = $this->db->query($sql);
        $results = $query->result_array();
        
        $cate_list = array();
        
        foreach( $results as $rows ) {
            $catename = explode("/", $rows['categories_name']);
            $sbcate = $this->db->query("SELECT * FROM dev_overnight_cate WHERE cate_name = '{$catename[6]}'");
            $sbresult = $sbcate->result_array();
            
            if( !empty($catename[7]) ) {
                $fullCateName = ( !empty($catename[8]) ? '' : $rows['categories_name'] );
                $cate_list[]  = array( 'cateid' => $sbresult[0]['id'], 'name' => $catename[7], 'cate_name' => $fullCateName);
                //$cate_list[]['catename'] = $catename[1];
            }
            //print_r($catename);
            //echo '<br>';
            
            //$cate_list .= $rows['categories_name'].'<br>';
        }
        
        $catedata = array_unique($cate_list, SORT_REGULAR);
        
      foreach($catedata as $cate_name) {
        $scate = $this->db->query("SELECT * FROM dev_overnight_cate WHERE sub_cateid = '{$cate_name['cateid']}'");
        $scaters = $scate->result_array();
        
        //echo count($scaters);
        //print_ar($scaters);
        
        //if( $scaters[0]['sub_cateid'] != $cate_name['cateid'] ) {
            
//            $this->db->query("INSERT INTO dev_overnight_cate (sub_cateid, cate_name, full_cate_name) VALUES ('{$cate_name['cateid']}', '{$cate_name['name']}', '{$cate_name['cate_name']}')");
            
            //}
        }
        
        print_ar($catedata);
        //echo $cate_list;
    }
}