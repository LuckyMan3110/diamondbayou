<?php
class Heartjewelrylistings extends CI_Controller {
    private $finish;
	function __construct(){
		parent::__construct();
		$this->load->helper('ringsection');
		$this->load->model('Commonmodel');
		$this->load->model('User');
		$this->load->model('Diamondmodel');
		$this->load->model('Engagementmodel');
		$this->load->model('Davidsternmodel');
		$this->load->library('pagination');
		$this->finish = '';
	}

    function index(){
        $data = $this->getCommonData(); 
        $data['title'] = 'Jewelry';
        $output = $this->load->view('jewelry/index' , $data , true);
        $this->output($output , $data);		
    }

    function personalized(){
        $data = $this->getCommonData(); 
        $data['title'] = 'Jewelry';
        $output = $this->load->view('heartjewelryviews/personalized_view' , $data , true);
        $this->output($output , $data);		
    }

    private function getCommonData($banner=''){
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();
		return $data;
    }

    function hear_cate_link($c_id=0) {
        $cates1 = $this->Davidsternmodel->getCateName( $c_id );
        $cates2 = $this->Davidsternmodel->getCateName( $cates1['sub_cateid'] );
        $cates3 = $this->Davidsternmodel->getCateName( $cates2['sub_cateid'] ); //print_ar($cates1);

        $cate_link = '';
        if( !empty($cates3['cate_name']) ) {
            $cate_link .= '<li><a href="'.SITE_URL.'heartjewelrylistings/heart_collection_cate/'.$cates3['id'].'">'.$cates3['cate_name'].'</a></li> > ';
        }
        if( !empty($cates2['cate_name']) ) {
            $cate_link .= '<li><a href="'.SITE_URL.'heartjewelrylistings/heart_collection_cate/'.$cates2['id'].'">'.$cates2['cate_name'].'</a></li> > ';
        }
        if( !empty($cates1['cate_name']) ) {
            $cate_link .= '<li><a href="'.SITE_URL.'heartjewelrylistings/heart_collection_cate/'.$cates1['id'].'">'.$cates1['cate_name'].'</a></li>';
        }

        return $cate_link;
    }

    function get_cate_list($gender='M') {
        $men_cate = $this->Davidsternmodel->get_ebay_category( $gender ); //print_ar($men_cate);
        $collection_cate = '';
        foreach($men_cate as $rowmen) {
            $cate_name = $this->Davidsternmodel->get_ebay_cat_name( $rowmen['category'] );
            if( !empty($cate_name) ) {
                $collection_cate .= '<li><a href="'.SITE_URL.'heartjewelrylistings/heart_collection_listing/'.$rowmen['category'].'">'.$cate_name.'</a>';
                $get_subcate = $this->Davidsternmodel->get_ebay_subcategory( $gender,  $rowmen['category']);
            }
            if( count($get_subcate) > 0 ) {
                $collection_cate .= '<ul>';
                foreach( $get_subcate as $rowm_scate ) {
                    $scate_name = $this->Davidsternmodel->get_ebay_cat_name( $rowm_scate['subcategory'] );
                    $collection_cate .= '<li><a href="'.SITE_URL.'heartjewelrylistings/heart_collection_listing/'.$rowm_scate['subcategory'].'">'.$scate_name.'</a>';
                }
                $collection_cate .= '</ul>';
            }
            $collection_cate .= '</li>';        
        }
        return $collection_cate;
    }

    /// get colleciton categories
    function get_collection_cate() {
        $collection_cate = '<ul>
                  <li><i>Filter By:</i></li>
                  <li><a href="#">Men</a>
                    <ul>' . $this->get_cate_list('M');       
        
        $collection_cate .= '</ul>
                  </li>
                  <li><a href="#">Women</a>
                    <ul>
                      '.$this->get_cate_list('F').'
                    </ul>
                  </li>
                </ul>';
        
        return $collection_cate;
    }
    
    ///// category listings
    function heart_collection_cate($cates_id = 2) {
        $data = $this->getCommonData(); 
        //$cates_id = 40;
        
        $data['ring_categoies'] = $this->category_cols_list_view($cates_id);
        $data['category_id'] = $cates_id;
        //$rings_cate = array(281, 283, 283, 284, 285);
        
        //$cateid_list = array_rand( $rings_cate, 4 );
        //$setcateid = $rings_cate[$cateid_list[0]];
        $cates = $this->Davidsternmodel->getCateName( $cates_id );
        $data['cate_links'] = $this->hear_cate_link($cates_id);
        
        $data['category_name']  = $cates['cate_name'] . ' Rings and Jewelry';
        $data['category_links'] = $this->getSubCategoryLink( $cates_id );	
        $data['title'] = $data['category_name'];
        
        if( $data['ring_categoies'] != 'false' ) {
            $output = $this->load->view('heartjewelryviews/heart_collectoin_rings_cate' , $data , true);
            $this->output($output, $data);
        } else {
            header('Location:' . SITE_URL . 'heartjewelrylistings/ringlisting/' . $cates_id);
        }
    }
    
    ///// category listings
    function ringlisting($category_id=0, $start=0) {
        $data = $this->getCommonData();
	$data['cate_links'] = $this->hear_cate_link($category_id);
        $data['title'] = 'Engagement Rings';
        //$cate_title = resetsSlugTitle( $category_id );
        $caterow = $this->Davidsternmodel->getCateName( $category_id );
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
        
        $ringresults = $this->Davidsternmodel->getRingListing($category_id, $startFrom, $config["per_page"], $sort_option, $metal_value, $metal_color); 
        //print_ar($ringresults);
        
        $config["total_rows"] = $ringresults['total'];
        $base_link = SITE_URL.'heartjewelrylistings/ringlisting/'.$category_id.'/?sort='.$sort_option;
	$config["base_url"]   = $base_link.'&pagelist='.$config["per_page"];
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $data['similar_products'] = $this->ringSimilarItems($category_id, '', 6, 'listings');
        
        $data['ring_listings'] = '<ul class="products-grid prduct-list first last odd">'.$this->heart_ring_lisitngs_view($ringresults['results']).'</ul>'; //print_ar($ringresults['results']);
        $data['cate_name'] = $this->product_cate_list_link( $caterow['cate_name'] );
        $data['category_id'] = $category_id;
        $data['page_link'] = $base_link;
        $data['product_category'] = $caterow['cate_name'] . ' Rings and Jewelry';
        $data['category_links'] = $this->getSubCategoryLink( $caterow['sub_cateid'] );
        
        $data['page_numb_hint'] = page_number_hint($config["per_page"], $ringresults['total'], $start_from); // custome helper
        $sort_option_link = SITE_URL . 'heartjewelrylistings/ringlisting/'.$category_id.'/?pagelist='.$config["per_page"].'&per_page='.$startFrom.'&sort=';
        $data['sort_option_link'] = page_sort_listing($sort_option_link, $sort_option); /// ring section helper
        
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
        $results_metal = $this->Davidsternmodel->sterMetalOptions( $category_id );
        $metal_list = '';
        $metal_link = $sort_link.$sort_option;
        
        foreach( $results_metal as $rowmetal ) {
           $metal_list .= '<option value="'.$metal_link.'&metal='.urlencode( $rowmetal['default_metal'] ).'" '.selectedOption($rowmetal['default_metal'], $metal_value).'>'.$rowmetal['default_metal'].'</option>';
        }
        //// metal color list
        $results_color = $this->Davidsternmodel->sternColorsList( $category_id );
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
        
        //$output = $this->load->view('heartjewelryviews/sternring_listing_view' , $data , true);
        $output = $this->load->view('heartjewelryviews/heart_rings_listing_view' , $data , true);
        $this->output($output, $data);
    }
    function heart_bread_crumb_links($cid=0) {
        $cate_pid = $this->Davidsternmodel->get_ebay_parent_cateid($cid);
        $cate_pid1 = $this->Davidsternmodel->get_ebay_parent_cateid($cate_pid);
        $cate_link = '';
        
        $cate_link .= $this->heart_bread_links($cate_pid1, 'main');
        $cate_link .= $this->heart_bread_links($cate_pid);
        $cate_link .= $this->heart_bread_links($cid);
        
        
        return $cate_link;
    }
    
    function heart_bread_links($cid=0, $main='') {
        $cate_link = '';
        
        if( $cid > 0 ) {            
            $cate_name = $this->Davidsternmodel->get_ebay_cat_name($cid);
            if( empty($main) ) {
                $cate_link = ' > <li><a href="'.SITE_URL.'heartjewelrylistings/heart_collection_listing/'.$cid.'">'.$cate_name.'</a></li>';
            } else {
                $cate_link = ' > <li><a href="#">'.$cate_name.'</a></li>';
            }            
        }
        return $cate_link;
    }
    //// site map
    function site_map_page() {
        $data = $this->getCommonData();
        
	$row_content = $this->Commonmodel->getCompanyInfoRow('site-map');
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
        $rows = $this->Commonmodel->getLocationsList();
        foreach( $rows as $row ) {
            $view_list .= '<li><a href="'.SITE_URL.'location/'.$row['topicid'].'">'.$row['description'].'</a></li>';
        }

        return $view_list;
    }

    function getLocationPageListOptions() {
        $rows = $this->Commonmodel->getLocationsList();
        $locationList = array();
        
        foreach( $rows as $row ) {
            $locationList[$row['description']] = 'location/'.$row['topicid'];
        }
        
        //print_r($locationList);
        echo serialize($locationList);
    }
    ///// stern collection page
    function heart_collection() {
        $data = $this->getCommonData();
        $this->session->unset_userdata('center_stone');
        //$this->load->library('pagination');
	$data['collection_cate_links'] = $this->get_collection_cate();
        
        $data['title'] = 'Hearts and Arrows Collection';
        $data['rings_listing_3'] = $this->heart_diamond_collection_list( 3292598018, 0, 6, 6 );   //// rings  Note: 4th-parameter tells the col-sm-6, etc
        $data['rings_listing_5'] = $this->heart_diamond_collection_list( 3292598018, 6, 5, 6 );   //// rings
        $data['necklaces_6_listing'] = $this->heart_diamond_collection_list( 740520028, 0, 6, 6, 'necklace' );  /// rings bands
        $data['necklaces_5_listing'] = $this->heart_diamond_collection_list( 740520028, 6, 5, 6, 'necklace' );   //// rings bands
        $data['bracelet_6_listing'] = $this->heart_diamond_collection_list( 3292607018, 0, 6, 6 );        /// wedding bands
        $data['bracelet_5_listing'] = $this->heart_diamond_collection_list( 3292607018, 6, 5, 6 );       /// wedding bands
        $data['earings_6_listing'] = $this->heart_diamond_collection_list( 3292601018, 0, 6, 6 );  // earings
        $data['earings_5_listing'] = $this->heart_diamond_collection_list( 3292601018, 6, 5, 6 );  // earings
        $data['dheart_2_listing'] = $this->heart_diamond_collection_list( 3292598018, 0, 4, 6 ); //$this->heart_diamond_main_listing( 0, 4, 2 );
        $data['dheart_5_listing'] = $data['rings_listing_5']; //$this->heart_diamond_main_listing( 4, 5, 5 );
        
        
        $output = $this->load->view('heartjewelryviews/heartdiamond_collection' , $data , true);
        $this->output($output, $data);
    }
    
    //// Hearts and Arrows Collection listing
    function heart_diamond_main_listing($start=0, $limit=4, $cols=2) {
        $results = $this->Davidsternmodel->getRingListing(90, $start, $limit, 'DESC', '', '');
        
        $ring_listing = '';
        
        if( count($results['results']) > 0 ) {
            foreach( $results['results'] as $rowrings ) {
                $ringDetail = SITE_URL . 'heartjewelrylistings/jewelry_ring_detail/' . $rowrings['id'];
                
                //$ringsImg = SITE_URL . 'images/no_img_found.jpg';
                $ringsImg = STERN_IMGS . $rowrings['item_id'].'.jpg';
                //$ringTitle .= '<br>Item ID: '.$rowrings['item_id'];
                    
                //$retailPrice = _nf($rowrings['gold_polished_1300'] * PRICE_PERCENT, 2);
                //$ourPrice = _nf($rowrings['gold_polished_1300'], 2);
                //$rid = $rowrings['id'];
                
                $ring_listing .= '<div class="heart_cols_'.$cols.'"><a href="'.$ringDetail.'"><img src="'.$ringsImg.'" alt="" width="226" /></a></div>';
                
            }
        }        
        return $ring_listing;        
    }
    
    function collection_sort_options($id=0, $sort_value='') {
        $sort_option = array(
                    '' => 'Default Sorting',
                    'popularity' => 'Sort by Popularity',
                    'rating' => 'Sort by average rating',
                    'newness' => 'Sort by newness',
                    'ASC' => 'Sort by price: Low to High',
                    'DESC' => 'Sort by price: High to Low'
                );
        
        $option_link = SITE_URL.'heartjewelrylistings/heart_collection_listing/'.$id.'/?sort_value=';
        $view_sort_option = '';
        foreach( $sort_option as $sortkey => $sortvalue ) {
            $view_sort_option .= '<option value="'.$option_link.$sortkey.'" '.selectedOption($sortkey, $sort_value).'>'.$sortvalue.'</option>';
        }
        return $view_sort_option;
    }
    
    ///// stern collection page
    function heart_collection_listing($id='', $recent='') {
        $data = $this->getCommonData();
        $this->session->unset_userdata('center_stone');
        //$this->load->library('pagination');
        $data['collection_cate_links'] = $this->get_collection_cate();
        $data['cate_name'] = $this->Davidsternmodel->get_ebay_cat_name( $id );
        $data['collection_type'] = ( !empty($recent) ? 'Recently Purchased Products' : 'New Arrivals' );
        $sort_field = $this->input->get('sort_value');
        //$rowrings = $this->Davidsternmodel->get_jewelry_list( $id, '', '', '', '', $sort_field );
        ///// pagination start
        $config["per_page"] = 21;
        $config["num_links"] = 5;
        $config["uri_segment"] = 5;
        $config['use_page_numbers'] = TRUE;
        $perpage_no = $this->input->get('per_page');
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        
        //$config["total_rows"] = 272;
        $base_link = SITE_URL.'heartjewelrylistings/heart_collection_listing/'.$id.'/?sort_value='.$sort_field;
	$config["base_url"]   = $base_link.'&pagelist='.$config["per_page"];
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        /////////////////////////////
        $data['page_links'] = '';
        $data['title'] = 'Hearts and Arrows Collection';
        $necklace = ( $id == '3292603018'  ? 'necklace' : '' );
        
        $rowrings = $this->Davidsternmodel->get_jewelry_list( $id, $start_from, $config["per_page"], $necklace, '', $sort_field, $recent );
        $data['total_rows'] = $rowrings['total'];
        $config["total_rows"] = $data['total_rows'];
        
        if( $id == 'newarrivals' ) {
            $data['ringlisting']  = $this->heart_collection_newarrivals_listing( $rowrings['results'] );             
            //print_ar($data['ringlisting']['total_rows']);
            $data['viewtype_listing']  = $this->heart_collection_viewtype_listing( $id, 0, '', 5, $necklace, $sort_field );
            //$data['rings_listing'] = $data['ringlisting']['listings'];
            $data['listing_type']  = 'newarrivals';
            //}
        } else {
            //$data['ringlisting'] = $this->heart_diamond_collection_list( $id, 0, '', 5, $necklace );
            $data['ringlisting']  = $this->heart_collection_newarrivals_listing( $rowrings['results'] );
            $data['listing_type'] = 'listing';
            $data['viewtype_listing']  = '';
        }            
        
        $this->pagination->initialize($config); ///// initializ the pagination
        $data['page_links'] = $this->pagination->create_links();         
        $starts_from = ( $start_from > 1 ? $start_from + 1 : $start_from );
        $result_range = ( $start_from == 1 ? $config["per_page"] : $start_from + $config["per_page"] );
        $range_to = ( $result_range > $data['total_rows'] ? $data['total_rows'] : $result_range );
        $data['showing_paging_hint'] = $starts_from.' - '.$range_to.' of '.$data['total_rows'].' Results';
        $data['category_name'] = collection_cate_name($id);
        $data['sort_dropdown_options'] = $this->collection_sort_options($id, $sort_field);
        $data['bread_crumb_link'] = $this->heart_bread_crumb_links($id);
        $output = $this->load->view('heartjewelryviews/heartdiamond_collection_listing' , $data , true);
        $this->output($output, $data);
    }
    function get_page_content($topic='') {
        $row_content = $this->Commonmodel->getCompanyInfoRow($topic);
        $page_content = check_empty($row_content['content'], 'Coming Soon');
        return $page_content;
    }
    
    function set_collection_img($img='', $item_sku='', $img_list='') {
        if( !empty($img) ) {
            if( file_exists(COLLECTION_FOLDER.$img) ) {
                $ringimg   = SITE_URL.COLLECTION_FOLDER.$img;
            } else {
                $imageLink = $this->get_image_via_folder($item_sku);
                $ringimg   = ( !empty($imageLink[0]) ? SITE_URL.COLLECTION_FOLDER.$imageLink[0] : SITE_URL.'img/no_image_found.jpg' );
            }
        } else {
            $ringimg = SITE_URL.'img/no_image_found.jpg';
        }
        
        $img_list_view = $this->set_multi_color_img($img_list);
        
        if( !empty($img_list_view[0]) ) {
            return $img_list_view[0];
        } else {
            return $ringimg;
        }       
    }
    
    /// heart title
    function get_heart_title($row=array(), $metalType='') {
        if( !empty($metalType) ) {
            $metal = ucwords( str_replace('k_', ' Karat ', $metalType) );
        } else {
            $metal = $row['carat'] . ' Karat ' . $row['metal'];
        }
        $heartitle = $metal . ' ' .$row['item_title'];
        return $heartitle;
    }
    
    function set_global_fields($gFields=array()) {
        if( count($gFields) > 0 ) {
            $itemLables = '';
            foreach($gFields as $rows) {
                $itemLables .= '<div><b>'.$rows[0].'</b></div>';
            }
            $return['lables'] = $itemLables;
            $item_value = '';
            
            foreach($gFields as $rows) {
                $item_value .= '<div>'.$rows[1].'</div>';
            }
            $return['cols_values'] = $item_value;
        }
        return $return;
    }
    
    function get_global_fields($gFields=array()) {
        
        $itemLables = '';
        if( count($gFields) > 0 ) {
            foreach($gFields as $rows) {
                if( strchr($rows[0], 'Image') == FALSE ) {
                    $itemLables .= '<div class="detail_bk_row">
                                        <div class="detail_left_cols">' . ucwords( strtolower($rows[0]) ) . '</div>
                                        <div class="detail_right_cols">'.$rows[1].'</div>
                                        <div class="clear"></div>
                                    </div>';
                }
                
                if( $rows[0] == 'CENTER STONE TAG' ) {
                    $this->session->set_userdata('center_stone', $rows[1]);
                }
            }
        }
        return $itemLables;
    }
    
    function complete_jewelry_title($cid=0, $title='') {
        switch ($cid) {
            case 3292598018:
                $jew_title = 'Ring';
                break;
            case 3292601018:
                $jew_title = 'Earring';
                break;
            default :
                $jew_title = $title;
                break;
        }
        return $jew_title;
    }
    
    /// heart metal type
    function get_metal_type($link='', $metal_val='') {
        $metals = array('14k_gold' => '14K Gold', '18k_gold' => '18K Gold', 'platinum' => 'Platinum');
        $metal_options = '';
        foreach( $metals as $metalkey => $metal_value ) {
            $metal_options .= '<option value="' . $link . $metalkey . '" '.selectedOption($metalkey, $metal_val).'>'.$metal_value.'</option>';
        }
        return $metal_options;
    }
    
    function get_price_field($metal='') {
        switch ($metal) {
            case '14k_gold':
                $field_name = 'g14_wh_price';
                break;
            case '18k_gold':
                $field_name = 'g18_wh_price';
                break;
            case 'platinum':
                $field_name = 'plat_wh_price';
                break;
                default :
                $field_name = 'g14_wh_price';
                break;
        }
        return $field_name;
    }
    
    function get_image_via_folder($item_sku='', $imgFields='') {
        foreach(glob('webimages/completed_images/*') as $filename){
            $folderImageName = basename($filename);
            $check_str = strchr($folderImageName, $item_sku);
            if( !empty($check_str) ) {
                $imagesName[] = $folderImageName;
            }
        }
        $other_img = $this->set_multi_color_img($imgFields);
        
        if( count( $other_img ) > 0 ) {
            return $other_img;
        } else {
            return $imagesName;
        }        
    }
    
    function get_metal_color_link($ring_style, $metal='', $carat='') {
        $id = $this->Davidsternmodel->get_collection_id($ring_style, $metal, $carat);
        if( $id > 0 ) {
            $collection_link = SITE_URL . 'heartjewelrylistings/collection_detail/'.$id;
        } else {
            $collection_link = '#';
        }
        
        return $collection_link;
    }
    
    function set_metal_links($ring_id=0, $ringstyle=0, $metal_type='', $metal_color='') {
        $metal_ic = $metal_ic = array(
                    array('ring_id' => 0, 'icon' => 'yellow_14kgold_ic.jpg', 'metal' => 'Yellow Gold', 'carat' => '14','metal_type' =>'14k_gold','color'=>'Yellow'),
                    array('ring_id' => 0, 'icon' => 'yellow_gold_ic.jpg', 'metal' => 'Yellow Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'Yellow'),
                    array('ring_id' => 0, 'icon' => 'white_gold_ic.jpg', 'metal' => 'White Gold', 'carat' => '14', 'metal_type' => '14k_gold','color'=>'White'),
                    array('ring_id' => 0, 'icon' => 'white_18gold_ic.jpg', 'metal' => 'White Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'White'),
                    array('ring_id' => 0, 'icon' => 'rose_gold_ic.jpg', 'metal' => 'Rose Gold', 'carat' => '14', 'metal_type' => '14k_gold','color'=>'Rose'),
                    array('ring_id' => 0, 'icon' => 'rose_18gold_ic.jpg', 'metal' => 'Rose Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'Rose'),
                    array('ring_id' => 0, 'icon' => 'platinum_ic.jpg', 'metal' => 'Platinum', 'carat' => '', 'metal_type' => 'platinum','color'=>'')
                );
        
                $metal_list = '<ul>';
                $i = 1;
                foreach( $metal_ic as $metalrow ) {
                    $metal_link = SITE_URL . 'heartjewelrylistings/collection_detail/'.$ring_id . '/' . $metalrow['metal_type'];
                    
                    if( $metalrow['color'] == $metal_color && !empty($metal_color) ) { 
                        //$this->get_metal_color_link($ringstyle, $metalrow['metal'], $metalrow['carat']);
                        if( $i == 2 ) {
                        $metal_list .= '<li><a href="'.SITE_URL . 'heartjewelrylistings/collection_detail/'.$ring_id.'/platinum"><img src="'.SITE_URL.'images/platinum_ic.jpg" /></a></li>';
                        }
                        
                        $metal_list .= '<li><a href="'.$metal_link.'"><img src="'.SITE_URL.'images/'.$metalrow['icon'].'" /></a></li>';
                    
                        $i++;   
                     }
                    
                }
                $metal_list .= '</ul>';
                
        return $metal_list;
    }
    function metal_color_img_list() {
//        $metal_ic = array(
//                    array('ring_id' => 0, 'icon' => 'rose_gold_ic.jpg', 'metal' => 'Rose Gold', 'carat' => '14', 'metal_type' => '14k_gold'),
//                    array('ring_id' => 0, 'icon' => 'white_gold_ic.jpg', 'metal' => 'White Gold', 'carat' => '14', 'metal_type' => 'White'),
//                    array('ring_id' => 0, 'icon' => 'yellow_gold_ic.jpg', 'metal' => 'Gold', 'carat' => '18', 'metal_type' => 'Yellow'),
//                    array('ring_id' => 0, 'icon' => 'platinum_ic.jpg', 'metal' => 'Platinum', 'carat' => '', 'metal_type' => 'Platinum')
//                );
        $metal_ic = array(
                    array('ring_id' => 0, 'icon' => 'yellow_gold_ic.jpg', 'metal' => 'Yellow Gold', 'carat' => '14', 'metal_type' => '14k_gold'),
                    array('ring_id' => 0, 'icon' => 'yellow_gold_ic.jpg', 'metal' => 'Yellow Gold', 'carat' => '18', 'metal_type' => '18k_gold'),
                    array('ring_id' => 0, 'icon' => 'platinum_ic.jpg', 'metal' => 'Platinum', 'carat' => '', 'metal_type' => 'Platinum')
                );
        return $metal_ic;
    }
    
    function get_collection_price($rows=array()) {
        $jew_metal  = set_jew_metal($rows['metal'], $rows['carat']);
        $priceField = $this->get_price_field($jew_metal);
        
        $prod_price = $rows[$priceField];
        $prodPrice  = ( $prod_price > 0 ? $prod_price : $rows['price'] );
        
        return $prodPrice;
    }
    
    //// stern collection detail page
    ///// product detail page
    function collection_detail($product_id=0, $metals_type='') {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Engagement Rings Detail';
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        $imagesName = array();
        
        //$this->load->view('heartjewelryviews/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        $data['shipping_policy'] = $this->get_page_content('shipping-policy');
        $ring_size = $this->input->get('ring_size');
        $main_ring_size = resetsSlugTitle($ring_size);
        $rsize_price = $this->catemodel->getFingerSizePrice( $main_ring_size );
        
        $rowsring = $this->Davidsternmodel->getSternCollectionDetail($product_id); //print_ar($rowsring);
        $jew_metal = set_jew_metal($rowsring['metal'], $rowsring['carat']);
        $metal_type = ( empty($metals_type) ? $jew_metal : $metals_type );
        $priceField = $this->get_price_field($metal_type);
        
        $prod_price = $rowsring[$priceField];
        $globalFields = unserialize( $rowsring['global_fields'] );
        
        $data['global_fields'] = $this->get_global_fields( $globalFields );
        $data['category_name'] = jewelry_cate_name( $rowsring['category'] );
        $categoryID = ( !empty($rowsring['subcategory']) ? $rowsring['subcategory'] : $rowsring['category'] );
        $data['bread_crumb_link'] = $this->heart_bread_crumb_links($categoryID);
        $data['comp_jew_title'] = $this->Davidsternmodel->get_ebay_cat_name($rowsring['category']);
        $metals_link = SITE_URL . 'heartjewelrylistings/collection_detail/'.$product_id.'/';
        $data['metal_type_options'] = $this->get_metal_type($metals_link, $metal_type);
        //$data['comp_jew_title'] = $this->complete_jewelry_title($rowsring['category'], $cateTitle);
        $rowsring['price'] = ( $prod_price > 0 ? $prod_price : $rowsring['price'] );
        
        $data['rowsring'] = $rowsring;
        $data['heart_title'] = $this->get_heart_title($rowsring, $metal_type);
        $data['sales_price'] = $rowsring['price'] + $rsize_price;
        $data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'shbasket_wholesale/addtoshoppingcart/');
        $data['item_desc'] = get_site_title().' Jewelry can be yours for $'._nf($rowsring['price_website'], 2).'.';
        $data['our_price'] = ( $rowsring['price'] > 0 ? '$'._nf($rowsring['price'], 2) : 'Please Call ' . CONTACT_NO . ' for price' );
        
        //$cate = $this->getCateName( $rowsring['catid'] );  
        $ringBoxDesc = $data['category_name'] . ' ' . $rowsring['metal_purity'];
        $data['ringtitle'] = $ringBoxDesc. ' Item ID: '. $rowsring['stock_number'];
        $data['ringimg']   = $this->set_collection_img($rowsring['image1'], $rowsring['item_sku'], $rowsring['different_imglist']);
        $data['setingtype']   = ''; //$cate['sub_cname'];
        $data['maincate_name'] = ''; //$cate['main_cname'];
        $data['subcate_link'] = ''; //$this->product_cate_list_link( $cateName[0] );
        $data['metals_list'] = $this->set_metal_links( $product_id, $rowsring['ring_style'], $metal_type, $rowsring['metal_color'] );
         //$data['sales_price'] = $rowsring['gold_polished_1300'];
        
        $data['similar_items'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4, 'similar');
        $data['similar_products'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4, 'products');
        $data['popular_listings'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4, 'popular');
        $data['more_collection_listings'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4, 'collection');
        ////// get user comments
	$data['view_coments'] = $this->getProductReviews( $product_id );
	$data['finished_level'] = $this->finishlevel( $product_id, 'gold', 'options' );
        $data['rings_allowed_id'] = array(3292598018);
        
        $ringresults = $this->catemodel->getFingerSizeResult();
        $base_link = SITE_URL.'heartjewelrylistings/collection_detail/'.$product_id.'/';
        $finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowsize ) {
                $rgsz = setRingSize($rowsize['ring_size']);
                $finger_size .= '<option value="'.$base_link.'?ring_size='.$rgsz.'" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
            }
        }
        
        $data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
        //$data['extraheader'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $data['extraheader'] .= '<link href="'.SITE_URL.'css/magnific-popup.css" rel="stylesheet">';
        ////// item thumbs
        $data['page_link'] = $base_link;
        $data['finger_ring_size'] = $finger_size;
        //$data['product_thumbs'] = $this->get_collection_thumbs( $rowsring, $data['heart_title'] );
        $data['prod_thumbs'] = $this->heart_collection_images( $rowsring, $data['heart_title'], 'detail' );
        $data['product_thumbs'] = $data['prod_thumbs']['thumbs'];
        $data['rings_thumb'] = $this->getProductThumb( $rowsring );
        $center_stone = $this->collection_diamond_options();
        $data['recently_purchased'] = $this->recently_purchased_product($rowsring['category']);
        $data['stone_count'] = $center_stone['diamond_count'];
        $data['collections_cate'] = $this->catemodel->getCollectionCateName( $rowsring['category'] );
        $this->session->set_userdata('stone_cate_id', $rowsring['category']);
        
        //$output = $this->load->view('heartjewelryviews/collection_detail_view' , $data , true);
        $output = $this->load->view('heartjewelryviews/collection_detail_viewnew' , $data , true);
        $this->output($output, $data);
    }
    
    function get_collection_img($serialField='') {
        
        $imgList = array();
        if( !empty($serialField) ) {
            $globalFields = unserialize( $serialField );

            foreach( $globalFields as $rows ) {
                if( strchr($rows[1], 'Image') != '' ) {
                    $imgList[] = $rows[1];
                }
            }
        }
        
       return $imgList;
    }
    //// get diamond get diamond shape and carat size
    function get_diamond_spec($rows=array()) {
        
        $return['shape'] = $this->get_global_fields_value($rows, 'S-SHAPE1');
        $return['carat'] = $this->get_global_fields_value($rows, 'S-CARAT1');
        
        return $return;
    }
    function get_global_fields_value($globFields=array(), $index_label='S-SHAPE1') {
        $field_value = '';
        
        if( count($globFields) > 0 ) {
            foreach ( $globFields as $row ) {
                if( !empty($row[0] && $row[0] === $index_label ) ) {
                    $field_value = $row[1];
                    break;
                }
            }
        }
        
        return $field_value;
    }
    ///// product detail page
    function collection_ring_detail($product_id=0, $metal_type='14k_gold') {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Engagement Rings Detail';
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        
        //$this->load->view('heartjewelryviews/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        $data['shipping_policy'] = $this->get_page_content('shipping-policy');
        $ring_size = $this->input->get('ring_size');
        $rsize_price = $this->catemodel->getFingerSizePrice( $ring_size );
        $priceField = $this->get_price_field($metal_type);
        
        $rowsring = $this->Davidsternmodel->getSternCollectionDetail($product_id, $metal_type); //print_ar($rowsring);
        $prod_price = $rowsring[$priceField];
        $data['global_fields'] = unserialize( $rowsring['global_fields'] );
        $data['category_name'] = jewelry_cate_name( $rowsring['category'] );
        $categoryID = ( !empty($rowsring['subcategory']) ? $rowsring['subcategory'] : $rowsring['category'] );
        $data['bread_crumb_link'] = $this->heart_bread_crumb_links($categoryID);
        $data['comp_jew_title'] = $this->Davidsternmodel->get_ebay_cat_name($rowsring['category']);
        $metals_link = SITE_URL . 'heartjewelrylistings/collection_detail/'.$product_id.'/';
        $data['metal_type_options'] = $this->get_metal_type($metals_link, $metal_type);
        //$data['comp_jew_title'] = $this->complete_jewelry_title($rowsring['category'], $cateTitle);
        $rowsring['price'] = ( $prod_price > 0 ? $prod_price : $rowsring['price'] );
        
        $data['rowsring'] = $rowsring;
        $data['heart_title'] = $this->get_heart_title($rowsring);
        $data['sales_price'] = $rowsring['price'] + $rsize_price;
        $data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'shbasket_wholesale/addtoshoppingcart/');
        $data['item_desc'] = get_site_title().' Jewelry can be yours for $'._nf($rowsring['price_website'], 2).'.';
        $data['our_price'] = ( $rowsring['price'] > 0 ? '$'._nf($rowsring['price'], 2) : 'Please Call ' . CONTACT_NO . ' for price' );
        
        //$cate = $this->getCateName( $rowsring['catid'] );  
        $ringBoxDesc = $data['category_name'] . ' ' . $rowsring['metal_purity'];
        $data['ringtitle'] = $ringBoxDesc. ' Item ID: '. $rowsring['stock_number'];
        $data['ringimg']   = $this->set_collection_img($rowsring['image1'], $rowsring['item_sku'], $rowsring['different_imglist']);
        $data['setingtype']   = ''; //$cate['sub_cname'];
        $data['maincate_name'] = ''; //$cate['main_cname'];
        $data['subcate_link'] = ''; //$this->product_cate_list_link( $cateName[0] );
         //$data['sales_price'] = $rowsring['gold_polished_1300'];
        
        $data['similar_items'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4, 'similar');
        $data['similar_products'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4, 'products');
        $data['popular_listings'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4, 'popular');
        $data['more_collection_listings'] = $this->collectionSimilarLististing($rowsring['category'], $product_id, 4, 'collection');
        ////// get user comments
	$data['view_coments'] = $this->getProductReviews( $product_id );
	$data['finished_level'] = $this->finishlevel( $product_id, 'gold', 'options' );
        $data['rings_allowed_id'] = array(3292598018);
        
        $data['extra_headers'] = '';
        $data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
        $ringresults = $this->catemodel->getFingerSizeResult();
        $base_link = SITE_URL.'heartjewelrylistings/collection_detail/'.$product_id.'/';
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
        $center_stone = $this->collection_diamond_options();
        $data['stone_count'] = $center_stone['diamond_count'];
        $this->session->set_userdata('stone_cate_id', $rowsring['category']);
        $this->session->set_userdata('hearts_collection', 'hearts');
        $this->session->set_userdata('ringID', $product_id);
        $this->session->set_userdata('heart_metal', $metal_type);
        $d_id = check_empty( $this->session->userdata('diamnd_id'), 'NA' );
	$data['addtoring_link'] = htmlspecialchars(SITE_URL.'engagement/complete_youring/'.$d_id.'/'.$product_id.'/addtoring/');
        //// set center stones detail
        if( empty($center_stone) ) {
		$this->session->unset_userdata('shape');
		$this->session->unset_userdata('carat');
	} else {
            $diamond_shape = getDiamondShape($center_stone['shape']);
            $this->session->set_userdata('shape', $diamond_shape.'.');
            $this->session->set_userdata('ringcarat', $center_stone['carat']);
	}
        
        $output = $this->load->view('heartjewelryviews/heart_collection_rings_detial' , $data , true);
        $this->output($output, $data);
    }
    
    //// Hearts and Arrows Collection jewelry rings
    function heart_collection_viewtype_listing($cid=0, $start=0, $limit=4, $cols=2, $type='', $sroting='') {
        $rowrings = $this->Davidsternmodel->get_jewelry_list( $cid, $start, $limit, $type, '', $sroting );
        $ring_listing = '';
        
        if( $cols == 3 || $cols == 2 ) {
            $block_cols = 'col-sm-4';
        } else if( $cols == 6 ) {
            $block_cols = 'col-sm-6';
        } else {
            $block_cols = 'col-sm-2';
        }
        $i = 1;
        if( count($rowrings['results']) > 0 ) {
            foreach( $rowrings['results'] as $rows ) {
               $imageLink = $this->get_image_via_folder($rows['item_sku'], $rows['different_imglist']);
               if( !empty($imageLink[0]) ) {
               $ringPrice = ( $rows['price'] > 0 ? '$ ' . _nf($rows['ring_price'], 2) : '' );
               $detaiLink = SITE_URL.'heartjewelrylistings/collection_detail/'.$rows['stock_number'];
               $popupLink = SITE_URL . 'heartjewelrylistings/heart_collection_popup_detail/'.$rows['stock_number'] . '/?keepThis=true&TB_iframe=false&width=900&height=550&modal=true';
               $thumbs = $this->heart_collection_images($rows, 'Hearts and Diamonds Collection');
            
               $ringImage = $this->set_collection_img($rows['image1'], $rows['item_sku'], $rows['different_imglist']);
               
               $ring_listing .= '<div class="heart_list_viewbk">
                    <div class="col-sm-4 heart_img_view" onmouseover="show_collection_block(\''.$rows['stock_number'].'\')" onmouseout="hide_block(\''.$rows['stock_number'].'\')">
                        <div><a href="'.$detaiLink.'">
                           <div class="set_thumb_img similar_collection" id="thumb_'.$rows['stock_number'].'">
                            ' . $thumbs['thumbs'] . '
                            </div>
                            </a></div>
                           <div class="set_sale_icon"><img src="'.SITE_URL.'img/heart_diamond/new_ring_compaign.jpg" width="91" alt="" /></div>
                           ' . $this->collection_hover_block($rows, $ringPrice, $ringImage, $popupLink, $thumbs['total'], 'listing', 'list_view') . '
                    </div>
                    <div class="col-sm-7 pull-right heart_content_section">
                        <h2>'. $rows['item_title'].'</h2>
                        <div>'. $rows['item_title'].' Hearts and Diamonds Collection</div><br><br>
                        <div class="col-sm-4 list_view_price">'.$ringPrice.'</div>
                        <div class="col-sm-4 pull-right add_tocart_icon"><a href="#javascript" onclick="submitCartForm(\''.SITE_URL.'shbasket_wholesale/addtoshoppingcart/\', \''.$rows['stock_number'].'\')">Place a Memo</a></div>
                    </div>
                    <div class="clear"></div>
                </div>';               
               $i++;               
               } /// end image check if
            } /// end foreach
        } else {
            //$ring_listing .= '<div>No Hearts and Diamonds Colleciton Found</div>';
        }
        $return['total_rows'] = $i;
        $return['listings'] = $ring_listing;
        
        return $return;
    }
    
    function set_multi_color_img($img_fields='', $color='Y') {
        $view_img = array();
        
        if( !empty($img_fields) ) {
            $img_list = unserialize( $img_fields );
            if( count($img_list) > 0 ) {
                foreach( $img_list as $img ) {
                    if( strchr($img, $color) ) {
                        $view_img[] = $img;
                    }                    
                }
            }
        }
        return $view_img;
    }

    //// Hearts and Arrows Collection jewelry rings
    function heart_collection_newarrivals_listing( $rowrings=array() ) {
        $ring_listing = '';
        $block_cols = 'col-sm-2';
        $i = 1;
        $popup_block = '';
        $collection_listing_view = '';
        if( count($rowrings) > 0 ) {
            foreach( $rowrings as $rows ) {
               $imageLink = $this->get_image_via_folder($rows['item_sku'], $rows['different_imglist']);
               if( !empty($imageLink[0]) ) {
               $ringPrice = ( $rows['g14_wh_price'] > 0 ? $rows['g14_wh_price'] : $rows['ring_price'] );
               $detaiLink = SITE_URL.'heartjewelrylistings/collection_detail/'.$rows['stock_number'];
               $popupLink = SITE_URL . 'heartjewelrylistings/heart_collection_popup_detail/'.$rows['stock_number'] . '/?keepThis=true&TB_iframe=false&width=900&height=550&modal=true';
               $popup_block .= $this->heart_collection_popup_detail($rows['stock_number']);
               $thumbs = $this->heart_collection_images($rows, 'Hearts and Diamonds Collection');          
               $ringImage = $this->set_collection_img($rows['image1'], $rows['item_sku'], $rows['different_imglist']);
               
               $ring_listing .= '<div class="'.$block_cols.' set_bk_height" onmouseover="show_collection_block(\''.$rows['stock_number'].'\')" onmouseout="hide_block(\''.$rows['stock_number'].'\')">'
                        . '<div><a href="'.$detaiLink.'">
                           <div class="set_thumb_img similar_collection" id="thumb_'.$rows['stock_number'].'">
                            ' . $thumbs['thumbs'] . '
                            </div>
                            </a></div>
                           <div class="set_sale_icon"><img src="'.SITE_URL.'img/heart_diamond/new_ring_compaign.jpg" width="91" alt="" /></div>
                           ' . $this->collection_hover_block($rows, $ringPrice, $ringImage, $popupLink, $thumbs['total'], 'listing') . '
                            <div class="set_heart_logo"><img src="'.SITE_URL.'img/heart_diamond/header_logo.jpg" alt="Hearts and Diamonds Collection"></div>
                        </div>';
               
               $collection_listing_view .= '<div class="heart_list_viewbk" onmouseover="show_collection_block(\''.$rows['stock_number'].'\')" onmouseout="hide_block(\''.$rows['stock_number'].'\')">
                    <div class="col-sm-4 heart_img_view">
                        <div><a href="'.$detaiLink.'">
                           <div class="set_thumb_img similar_collection" id="thumb_'.$rows['stock_number'].'">
                            ' . $thumbs['thumbs'] . '
                            </div>
                            </a></div>
                    </div>
                    <div class="col-sm-7 pull-right heart_content_section">
                        <h2>'.$rows['item_title'].'</h2>
                        <div>'.$rows['item_title'].' Hearts and Diamonds Collection</div><br><br>';
        if( $ringPrice > 0 ) {
            $collection_listing_view .= '<div class="col-sm-4 list_view_price">$'. _nf($ringPrice, 2) .'</div>';
        }
        $collection_listing_view .= '<div class="col-sm-4 pull-right add_tocart_icon"><a href="#javascript" onclick="submitCartForm(\''.SITE_URL.'shbasket_wholesale/addtoshoppingcart/\', \''.$rows['stock_number'].'\')">Place a Memo</a></div>
                    </div>
                    <div class="clear"></div>
                </div>';
               //$this->db->query("UPDATE dev_jewelries set have_img = 'Y' WHERE stock_number = '{$rows['stock_number']}'");
               $i++;               
               } /// end image check if
            } /// end foreach
        } else {
            //$ring_listing .= '<div>No Hearts and Diamonds Colleciton Found</div>';
        }
        $return['total_rows'] = $i;
        $return['listings'] = $ring_listing;
        $return['popup_block'] = $popup_block;
        $return['collection_listing'] = $collection_listing_view;
        
        return $return;
    }
    
    //// Hearts and Arrows Collection jewelry rings
    function heart_diamond_collection_list($cid=0, $start=0, $limit=4, $cols=2, $type='') {
        $rowrings = $this->Davidsternmodel->get_jewelry_list( $cid, $start, $limit, $type );
        $ring_listing = '';
        
        if( $cols == 3 || $cols == 2 ) {
            $block_cols = 'col-sm-4';
        } else if( $cols == 6 ) {
            $block_cols = 'col-sm-6';
        } else {
            $block_cols = 'col-sm-2';
        }
        $popup_block = '';
        
        if( count($rowrings['results']) > 0 ) {
            foreach( $rowrings['results'] as $rows ) {
               $ring_price = ( $rows['g14_wh_price'] > 0 ? $rows['g14_wh_price'] : $rows['ring_price'] );
               $ringPrice = ( $ring_price > 0 ? $ring_price : 'Please Call '.CONTACT_NO.' for price' );
               $detaiLink = SITE_URL.'heartjewelrylistings/collection_detail/'.$rows['stock_number'];
               $popupLink = SITE_URL . 'heartjewelrylistings/heart_collection_popup_detail/'.$rows['stock_number'] . '/?keepThis=true&TB_iframe=true&width=900&height=550&modal=false';
               $thumbs = $this->heart_collection_images($rows, 'Hearts and Diamonds Collection');
               $popup_block .= $this->heart_collection_popup_detail($rows['stock_number']);
               $ringImage = $this->set_collection_img($rows['image1'], $rows['item_sku'], $rows['different_imglist']);
               
               $ring_listing .= '<div class="'.$block_cols.' set_bk_height" onmouseover="show_collection_block(\''.$rows['stock_number'].'\')" onmouseout="hide_block(\''.$rows['stock_number'].'\')">'
                        . '<div><a href="'.$detaiLink.'">
                            <!-- <img src="'.$ringImage.'" alt="" />-->
                           <div class="set_thumb_img similar_collection" id="thumb_'.$rows['stock_number'].'">
                            ' . $thumbs['thumbs'] . '
                            </div>
                            </a></div>
                           <div class="set_sale_icon"><img src="'.SITE_URL.'img/heart_diamond/new_ring_compaign.jpg" width="91" alt="" /></div>
                           ' . $this->collection_hover_block($rows, $ringPrice, $ringImage, $popupLink, $thumbs['total']) . '
                        </div>';
            }
        } else {
            //$ring_listing .= '<div>No Hearts and Diamonds Colleciton Found</div>';
        }
        //$return['total_rows'] = $i;
        $return['listings'] = $ring_listing;
        $return['popup_block'] = $popup_block;
        
        return $return;
    }
    
    ///// hover block
    function collection_hover_block($rows=array(), $ringPrice=0, $ringImage='', $popupLink='', $total_img = 1, $listing='', $viewtype='') {
        $block_id = $rows['stock_number'];
        $form_name = 'form_'.$block_id;
        $collection_title = ( empty($listing) ? $this->get_heart_title( $rows ) : $rows['item_title'] );
        if( empty($viewtype) ) {
            $hover_block = '<div class="item_info_view">
                               <div class="item_lable_style"><a href="'.SITE_URL.'heartjewelrylistings/collection_detail/'.$rows['stock_number'].'">
                                   '. $collection_title .'<br>Hearts and Diamonds Collection</a></div>
                                   <div class="ring_view_rating"><img src="'.SITE_URL.'img/heart_diamond/rating_icong_view.jpg"></div>
                                   <div class="priceLable">$'._nf($ringPrice, 2).'</div>
                                </div>
                                <div class="addtocart_icon"><a href="#javascript" onClick="submitCartForm(\''.SITE_URL.'shbasket_wholesale/addtoshoppingcart/\', \''.$block_id.'\')">Place a Memo</a></div>';
        }
            $hover_block .= '<div class="collection_hover_bk" id="'.$rows['stock_number'].'">
                           <div class="view_count">1/'.$total_img.'</div>
                           <div class="quick_view"><a href="Javascript:;" onclick="view_simple_popup(\''.$rows['stock_number'].'\')" title="Quick View'.$rows['stock_number'].'" rel="nofollow">Quick <br> View</a></div>
                          <div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'thumb_'.$rows['stock_number'].'\'); show_number_count(\''.$block_id.'\', \''.$total_img.'\', \'back\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_icon.jpg"></a></div>
                    <div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'thumb_'.$rows['stock_number'].'\'); show_number_count(\''.$block_id.'\', \''.$total_img.'\', \'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_icon.jpg" alt=""></a></div>
                           
                                <form name="'.$form_name.'" id="'.$form_name.'" method="post">
                                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$rows['style'].'" />
                                <input type="hidden" name="3ez_price" value="" />
                                <input type="hidden" name="5ez_price" value="" />
                                <input type="hidden" name="main_price" value="'.$ringPrice.'" />
                                <input type="hidden" name="price" value="'.$ringPrice.'" />
                                <input type="hidden" name="vender" value="heart_diamond_collection" />
                                <input type="hidden" name="url" value="'.$ringImage.'" />
                                <input type="hidden" name="prodname" value="'.$collection_title.'" />
                                <input type="hidden" name="diamnd_count" value="'.$rows['supplied_stones'].'" />
                                <input type="hidden" name="ring_shape" value="'.$rows['shape'].'" />
                                <input type="hidden" name="ring_carat" value="'.$rows['weight'].'" />
                                <input type="hidden" name="prid" id="prid" value="'.$rows['stock_number'].'" />
                                <input type="hidden" name="txt_ringtype" value="heart_diamond_collection" />
                                <input type="hidden" name="txt_ringsize" value="" />
                                <input type="hidden" name="txt_metal" value="'.$rows['metal'].'" />
                                <input type="hidden" name="metals_weight" value="'.$rows['weight'].'" />
                                <input type="hidden" name="vendors_name" value="Hearts and Diamonds Collection" />
                                <input type="hidden" name="txt_addoption" value="heart_diamond_collection" />
                                <input type="hidden" name="center_stone_id" id="center_stone_id" />
                                </form>
                           </div>';
        
        return $hover_block;
    }
    
    //// get category image link
   function getCateImageLink($cid=0) {
       $sub_cateid = $this->Davidsternmodel->checkSubCategory( $cid );
       
       $category_id = $cid;
       if( $sub_cateid > 0 ) {
           $category_id = $sub_cateid;
       }       
       
       $results = $this->Davidsternmodel->sternProductDetail(0, $category_id );
       $imageLink = STERN_IMGS.$results['item_id'].'.jpg';
       
       if( !empty($results['item_id']) ) {
            return $imageLink;
       } else {
           return '';
       }
   }
    
    //// get main and parent category name list
   function product_cate_list_link($cname='') {
       
       $cate_name = '<li><a href="#" alt="Hearts and Arrows Collection">Hearts and Arrows Collection</a></li>';
                
        $cate_name .= '<li><a href="#">'.$cname.'</a></li>';
        
        $catelink['category_link'] = $cate_name;
        $catelink['category_name'] = $cname;
        
        return $catelink;
   }
    ///// product detail page
    function jewelry_ring_detail($product_id=0) {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Engagement Rings Detail';
        $data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
        
        //$this->load->view('heartjewelryviews/engagement_rings_details', $data);
        //$metal = '';
        //$rngsize = '';
        $ring_size = $this->input->get('ring_size');
        $rsize_price = $this->catemodel->getFingerSizePrice( $ring_size );
        
        $rowsring = $this->Davidsternmodel->sternProductDetail($product_id);
        $data['buildring'] = $this->session->userdata('buildring');
        $data['rowsring'] = $rowsring;
        $priceMargin = $this->Commonmodel->inventoryPriceMargin($rowsring['category_id'], OVERNIGHT_OPTION);
        $rowsring['gold_polished_1300'] = $rowsring['gold_polished_1300'] * $priceMargin;
        $data['cate_links'] = $this->hear_cate_link($rowsring['category_id']);
                
        $data['sales_price'] = $rowsring['gold_polished_1300'] + $rsize_price;
        $data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
        $data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'shbasket_wholesale/addtoshoppingcart/');
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
        $base_link = SITE_URL.'heartjewelrylistings/jewelry_ring_detail/'.$product_id.'/';
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
        
        $output = $this->load->view('heartjewelryviews/heartring_detail_view' , $data , true);
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
        $collections_link = 'http://173.230.130.50:8888/Images/';
        $jewelryImage = $this->get_collection_img( $rowaray['global_fields'] );
        
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
        
        if( count($jewelryImage) > 0 ) {
            $collection_thumb = $jewelryImage;
        } else {
            $collection_thumb = $this->get_image_via_folder($rowaray['item_sku'], $rowaray['different_imglist']);
        }
	
        
        foreach( $collection_thumb as $thoption ) {
            //$imageName = ( $thoption === 'normal' ? $rowaray['item_id'] : $rowaray['item_id'].'.'.$thoption );
            if( count($jewelryImage) > 0 ) {
                $thumbimage = $collections_link.$thoption;
            } else {
                $thumbimage = SITE_URL.COLLECTION_FOLDER.$thoption; //STERN_IMGS . $imageName . '.jpg';
            }
            
            //$ringImageLink = ( (file_exists(COLLECTION_FOLDER.$imgs)) ? SITE_URL.COLLECTION_FOLDER.$imgs : SITE_URL.'img/no_image_found.jpg' );
            
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
    function get_collection_thumbs($rowaray=array(), $item_title='') {
        $collection_thumb = $this->get_image_via_folder($rowaray['item_sku'], $rowaray['different_imglist']);
        $i = 1;
        $set_ring_thumb = '';
        if( count($collection_thumb) > 0 ) {  
            foreach( $collection_thumb as $thoption ) {
                $thumbimage = SITE_URL.COLLECTION_FOLDER.$thoption;
                $active_class = ( $i == 1 ? 'active_view' : '' );

                if( getimagesize($thumbimage) ) {
                    $unique_id = 'bk_'.$i.'_'.$rowaray['item_sku'];
                    $set_ring_thumb .= '<div class="sp '.$active_class.'" id="'.$unique_id.'"><img src="'.$thumbimage.'" onmouseover="show_magnify_affect(\''.$unique_id.'\')" width="400" alt="'.$item_title.'" /></div>';
                }
                $i++;
            }
        } else {
            $set_ring_thumb .= '<div class=""><img src="'.SITE_URL.'img/no_image_found.jpg" style="position:static;" width="200" height="200" alt="Hearts and Diamonds Collection"></div>';
        }
        return $set_ring_thumb;
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
        $rowsring = $this->Davidsternmodel->sternSimilartProduct($prod_id, $ring_cateid, $limit);
                
        $similar_rings = '';
        
        if( count($rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'heartjewelrylistings/jewelry_ring_detail/' . $rowring['id'];
               $ringImageLink = STERN_IMGS.$rowring['item_id'].'.jpg';
               
            //if( getimagesize( $ringImageLink ) ) {
               $ringBoxDesc = str_replace("/", ', ', $rowring['categories_name']);
               $ring_title = wordwrap($ringBoxDesc,25,"<br>\n").'<br>Item ID: '.$rowring['item_id'];
               $retail_price  = $rowring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['gold_polished_1300'];
               $saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               $rid = $rowring['id'];
               $popupLink = SITE_URL . 'heartjewelrylistings/heart_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=900&height=550&modal=false';
               
            if( empty($listing) ) {
               $similar_rings .= '<div class="prdSection col-sm-3" id="'.$rid.'">
                                    <a href="'.$detaiLink.'" class="alsoviwed-product-img">
                                            <img class="" src="'.$ringImageLink.'" width="200" alt="'.$ring_title.'" title="'.$ring_title.'" style="display: inline;">
                                    </a><br><br>
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
                                <span id="product-price-'.$rid.'">$'._nf($ring_ourprice, 2).'</span>
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
    function recently_purchased_product($category_id=0) {
        $rowsring = $this->Davidsternmodel->recentlyPurchaseProducts($category_id);
        $prod_list = '';
        
        if( count($rowsring) > 0 ) {
            $prod_list .= '<div class="recently_purchased">
                    <div class="rpurchase_left">Recently Purchased</div>
                    <div class="rpurchase_right text-right">
                    <a href="'.SITE_URL.'heartjewelrylistings/heart_collection_listing/newarrivals/'.$category_id.'">View All Products</a></div>
                        <div class="rpurchase_products">';
            
            foreach( $rowsring as $rowring ) {
                $ring_title = $this->heart_ring_title( $rowring );
                $thumbs = $this->heart_collection_images($rowring, $ring_title, '', 'recent');
                $prod_list .= '<a href="'.SITE_URL.'heartjewelrylistings/collection_detail/'.$rowring['stock_number'].'">'.$thumbs['thumbs'].'</a>';
            }
            $prod_list .= '</div></div>';
        }
        
        return $prod_list;
    }
    ///// rings popular items 
    function collectionSimilarLististing($cid=0, $prod_id=0, $limit=5, $type='similar') {
        $rowsring = $this->Davidsternmodel->colectionSimilarProduct($cid, $prod_id, $limit);
                
        $similar_rings = '';
        $popupBlock = '';
        
        if( count($rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'heartjewelrylistings/collection_detail/' . $rowring['stock_number'];
               $ringImageLink = $this->set_collection_img($rowring['image1'], $rowring['item_sku'], $rows['different_imglist']);
               $ring_title = $this->heart_ring_title( $rowring );
               $ring_ourprice = $this->get_collection_price( $rowring );
               $detailDesc = 'Metal Purity ' . $rowring['metal_purity'] . ' Metal Color ' . $rowring['metal_color'];
               $prodRingPrice = ( $ring_ourprice > 0 ? '$ '._nf($ring_ourprice, 2) : '<div class="setprice_label">PLEASE CALL '.CONTACT_NO.' FOR PRICE</div>');
               $popupLink = SITE_URL . 'heartjewelrylistings/heart_collection_popup_detail/'.$rowring['stock_number'] . '/?keepThis=true&TB_iframe=true&width=900&height=550&modal=false';
               $popupBlock .= $this->heart_collection_popup_detail($rowring['stock_number']);
               $hover_id_bk = $type . '_' . $rowring['stock_number'];
               $thumbs = $this->heart_collection_images($rowring, $ring_title);
            $similar_rings .= '<div class="product_colsbk col-sm-6" onmouseover="show_collection_block(\''.$hover_id_bk.'\')" onmouseout="hide_block(\''.$hover_id_bk.'\')">
                <div class="productRingImg"><a href="'.$detaiLink.'">
                        <!-- <img src="'.$ringImageLink.'" width="200" height="153" alt="'.$ring_title.'"> -->
                        <div class="set_thumb_img similar_collection" id="view_'.$hover_id_bk.'">
                            ' . $thumbs['thumbs'] . '
                        </div>
                    </a>
                </div>
                        <div><img src="'.SITE_URL.'img/heart_diamond/ratings_reviews.jpg" alt=""> 5.0<span class="reviewlabel">(2 Review)</span></div><br>';
            if( !empty($rowring['product_type']) ) {
                $similar_rings .= '<div class="setcolor_label">+ '.$rowring['product_type'].'</div><br>';
            }
                $similar_rings .= '<div class="centerLabel"><a href="'.$detaiLink.'">This is '.$ring_title.'</a></div>
                        <div class="setcolor_label">'.$detailDesc.'</div>                     
                        <div class="setcolor_label">Item ID: '.$rowring['item_sku'].'</div><br>
                        <div>'. $prodRingPrice .'</div>
                           ' . $this->collection_detail_hover_block($rowring, $ring_ourprice, $ringImageLink, $popupLink, $type, $thumbs['total']) . ' 
                    </div>';
            }
        }
        
        $return['similar_listing'] = $similar_rings;
        $return['popup_link'] = $popupBlock;
        
        return $return;
    }
    
    /// set collection hover block
    function collection_detail_hover_block($rowring=array(), $ring_ourprice=0, $ringImageLink='', $popupLink='', $type='', $total_img = 1) {
        $form_name = 'form_'.$rowring['stock_number'];
        $block_id = $type.'_'.$rowring['stock_number'];
        $collection = '<div class="collection_hover_bk collection_detail_hover" id="'.$block_id.'">
                    <div class="view_count">1/'.$total_img.'</div>
                    <div class="quick_view"><a href="Javascript:;" onclick="view_simple_popup(\''.$rowring['stock_number'].'\');" title="Quick View'.$rowring['stock_number'].'" rel="nofollow">Quick <br> View</a></div>
                    <div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'view_'.$block_id.'\'); show_number_count(\''.$block_id.'\', \''.$total_img.'\', \'back\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_icon.jpg"></a></div>
                    <div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'view_'.$block_id.'\'); show_number_count(\''.$block_id.'\', \''.$total_img.'\', \'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_icon.jpg" alt=""></a></div>
                    <div class="item_info_view">

                     </div>
                     <div class="addtocart_icon"><a href="#javascript" onClick="submitCartForm(\''.SITE_URL.'shbasket_wholesale/addtoshoppingcart/\', \''.$rowring['stock_number'].'\')">Place a Memo</a></div>
                 <form name="'.$form_name.'" id="'.$form_name.'" method="post">
                     <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$rowring['ring_style'].'" />
                     <input type="hidden" name="3ez_price" value="" />
                     <input type="hidden" name="5ez_price" value="" />
                     <input type="hidden" name="main_price" value="'.$ring_ourprice.'" />
                     <input type="hidden" name="price" value="'.$ring_ourprice.'" />
                     <input type="hidden" name="vender" value="heart_diamond_collection" />
                     <input type="hidden" name="url" value="'.$ringImageLink.'" />
                     <input type="hidden" name="prodname" value="Jewelry Item ID: '.$rowring['stock_number'].'" />
                     <input type="hidden" name="diamnd_count" value="'.$rowring['supplied_stones'].'" />
                     <input type="hidden" name="ring_shape" value="'.$rowring['shape'].'" />
                     <input type="hidden" name="ring_carat" value="'.$rowring['weight'].'" />
                     <input type="hidden" name="prid" id="prid" value="'.$rowring['stock_number'].'" />
                     <input type="hidden" name="txt_ringtype" value="heart_diamond_collection" />
                     <input type="hidden" name="txt_ringsize" value="" />
                     <input type="hidden" name="txt_metal" value="'.$rowring['metal'].'" />
                     <input type="hidden" name="metals_weight" value="'.$rowring['weight'].'" />
                     <input type="hidden" name="vendors_name" value="Hearts and Diamonds Collection" />
                     <input type="hidden" name="txt_addoption" value="heart_diamond_collection" />
                     <input type="hidden" name="center_stone_id" id="center_stone_id" />
                 </form>
                    </div>';
        
        return $collection;
    }
    
    /// get Hearts and Diamonds collection images
    function heart_collection_images($rows=array(), $ring_title='', $detail='', $recent='') {
        $collection = array();
        $flderPath = COLLECTION_FOLDER;
        $collections_link = 'http://173.230.130.50:8888/Images/';
        
        if( empty($detail) ) {
            $lightbox_class = '';
            $res_class      = '';
        } else {
            $lightbox_class = 'portfolio-box';
            $res_class      = 'img-responsive';
        }
        
        for( $i=1; $i <= 6; $i++ ) {
            if( !empty($rows['image'.$i]) ) {
                $collection[] = $rows['image'.$i];
            }
        }
        
        $jewelryImage = $this->get_collection_img( $rows['global_fields'] );
        
        if( count($jewelryImage) > 0 ) {
            $collection_thumb = $jewelryImage;
        } else {
            $collection_thumb = $this->get_image_via_folder($rows['item_sku'], $rows['different_imglist']);
        }
        
        $tt_count = count($collection_thumb);
        $j = 1;
        $set_ring_thumb = '';
        $set_popup_thumb = '';
        
        if( $tt_count > 0 ) {
            foreach ($collection_thumb as $imgs ) {
                $active_class = ( $j == 1 ? 'active_view' : 'hide_imgbk' );
                if( count($jewelryImage) > 0 ) {
                    $ringImageLink = $collections_link.$imgs;
                            //( (getimagesize($collections_link.$imgs)) ? $collections_link.$imgs : SITE_URL.'img/no_image_found.jpg' );
                } else {
                    $ringImageLink = ( (file_exists($flderPath.$imgs)) ? SITE_URL.$flderPath.$imgs : SITE_URL.'img/no_image_found.jpg' );
                }
                
                
                if( !empty($recent) ) {
                    $set_ring_thumb = '<img src="'.$ringImageLink.'" alt="'.$ring_title.'" />';
                    break;
                }
                $set_ring_thumb .= '<div class="sp '.$active_class.'"><img src="'.$ringImageLink.'" width="200" height="153" class="'.$res_class.'" alt="'.$ring_title.'" /></div>';
                
                if( !empty($detail) ) {
                    if( $j == 1 ) {
                        $set_popup_thumb .= '<a href="'.$ringImageLink.'"><img src="'.SITE_URL.'img/search_plus_ic.png" alt="" width="28" /></a>';
                    } else {
                        $set_popup_thumb .= '<a href="'.$ringImageLink.'"></a>';
                    }                    
                }
                
                $j++;
            }
        } else {
          $set_ring_thumb .= '<div class="sp active_view set_position"><img src="'.SITE_URL.'img/no_image_found.jpg" width="200" height="153" alt="'.$ring_title.'" /></div>';
          if( !empty($recent) ) {
                $set_ring_thumb = '<img src="'.SITE_URL.'img/no_image_found.jpg" alt="'.$ring_title.'" />';
            }
        }
        
        $returns['thumbs'] = $set_ring_thumb;
        $returns['popup_thumbs'] = $set_popup_thumb;
        $returns['total']  = $tt_count;
        
        return $returns;        
    }
    
    function heart_ring_title($rowring=array()) {
        $title = get_site_title() . ' ' . jewelry_cate_name( $rowring['category'] );
        
        return $title;
    }
    ///// rings popular items 
    function popularListings($ring_cateid=0, $prod_id=0, $limit=5, $listing='') {
        $rowsring = $this->Davidsternmodel->sternSimilartProduct($prod_id, $ring_cateid, $limit);
                
        $similar_rings = '';
        
        if( count($rowsring) > 0 ) {
            foreach( $rowsring as $rowring ) {
               $detaiLink = SITE_URL . 'heartjewelrylistings/jewelry_ring_detail/' . $rowring['id'];
               $ringImageLink = STERN_IMGS.$rowring['item_id'].'.jpg';
               $ring_title = $this->getRingTitle( $rowring, 'rings' );
               //$retail_price  = $rowring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
               $ring_ourprice = $rowring['gold_polished_1300'];
               //$saving_percent = ( 100 - ( ( $ring_ourprice / $retail_price ) * 100 ) );
               //$popupLink = SITE_URL . 'heartjewelrylistings/heart_popup_detail/'.$rowring['id'] . '/?keepThis=true&TB_iframe=true&width=800&height=550&modal=false';
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
    
    function heart_ring_lisitngs_view( $results = array()) {
        $ringlistings = '';
        
        if( count($results) == 0 ) {
            $ringlistings .= '<div>NO Ring List Found!</div>';
            
            return $ringlistings;
        }
        $total_records = count( $results );
        $i = 1;
        
        foreach( $results as $rowrings ) {
            if( $i <= 4 ) {
                $ringlistings .= $this->rings_block( $rowrings );
            }
            
            $i++;

        }
        
        if( $total_records >= 5 ) {
            $ringlistings .= '<div class="half_block_cols col-sm-6">';
            $j = 1;
            foreach( $results as $rowrings ) {
                if( $j > 4 && $j <= 8 ) {
                    $ringlistings .= $this->rings_block( $rowrings );
                }
               $j++;
            }
            $ringlistings .= '</div>';

            $ringlistings .= '<div class="half_block_cols col-sm-6"><img src="'.SITE_URL.'img/heart_diamond/served_text_block.jpg" />';
            $ringlistings .= '</div>';
            $ringlistings .= '<div class="clear"></div>';
        }
        
        if( $total_records >= 9 ) {
            $k = 1;
            foreach( $results as $rowrings ) {
                if( $k >= 9 && $k <= 16 ) {
                     $ringlistings .= $this->rings_block( $rowrings );
                }
                
                $k++;
            }
        }
        
        if( $total_records >= 17 ) {
            $ringlistings .= '<div class="half_block_cols col-sm-6"><img src="'.SITE_URL.'img/heart_diamond/payment_plan_view.jpg" />';
            $ringlistings .= '</div>';

            $ringlistings .= '<div class="half_block_cols col-sm-6">';
            $m = 1;
            foreach( $results as $rowrings ) {
                if( $m >= 17 && $m <= 20 ) {
                    $ringlistings .= $this->rings_block( $rowrings ); 
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
                }

                $p++;

            }
        }
        
        
        return $ringlistings;
    }
    
    ///// get rings listings view according to the category id
    function rings_block( $rowrings = array(), $class='col-sm-3') {
        $str = 150;
        
        $ringDetail = SITE_URL . 'heartjewelrylistings/jewelry_ring_detail/' . $rowrings['id'];

        //$ringsImg = SITE_URL . 'images/no_img_found.jpg';
        $ringsImg = STERN_IMGS . $rowrings['item_id'].'.jpg';
        $priceMargin = $this->Commonmodel->inventoryPriceMargin($rowrings['category_id'], OVERNIGHT_OPTION);
        $rowrings['gold_polished_1300'] = $rowrings['gold_polished_1300'] * $priceMargin;

    //if( getimagesize( $ringsImg ) !== FALSE ) {
        $ringBoxDesc = str_replace("/", ', ', $rowrings['categories_name']);
        $ringTitle = ( strlen($ringBoxDesc) > $str ? substr($ringBoxDesc, $str).'...' : $ringBoxDesc );
        $ringTitle .= '<br>Item ID: '.$rowrings['item_id'];

        $retailPrice = _nf($rowrings['gold_polished_1300'] * PRICE_PERCENT, 2);
        $ourPrice = _nf($rowrings['gold_polished_1300'], 2);
        $rid = $rowrings['id'];

        $popupLink = SITE_URL . 'heartjewelrylistings/heart_popup_detail/' . $rid . '/?keepThis=true&TB_iframe=true&width=900&height=550&modal=false';

        $ringlistings = '<li class="item rings_cols '.$class.'" data-url="'.$ringDetail.'">
      <div class="product-grid-quick" onmouseover="showQuickView('.$rid.');" onmouseout="hideQuickView('.$rid.');" style="overflow:hidden;">
        <div id="quickview'.$rid.'" style="display: none;"> 
        	<a href="Javascript:;" onclick="show_quick_view(\''.$popupLink.'\',\'Quick View\',\'nofollow\');" title="'.$ringTitle.'" class="quick-view thickbox" rel="nofollow"><span>Quick View</span></a>
        </div>
        <div class="product-image"><a class="product-labels" href="'.$ringDetail.'" title="'.$ringTitle.'">
        	
        	<img class="" src="'.$ringsImg.'" itemprop="image" alt="'.$ringTitle.'" width="175" height="159" /></a></div>
        	
		<h3><a href="'.$ringDetail.'" title="'.$ringTitle.'"> <span>' .  $ringTitle . '</span></a></h3>
          
    <div class="price-box">
               $'.$ourPrice.'<br>
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
           
        
        return $ringlistings;
    }
    
    //// get sub category link
    function getSubCategoryLink( $cid=0 ) {
        $ringresults = $this->Davidsternmodel->getCateList( $cid );
        $cateList = '';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowcate ) {
                $cateList .= '<li><a href="'.SITE_URL.'heartjewelrylistings/heart_collection_cate/'.$rowcate['id'].'" title="'.$rowcate['cate_name'].'">'.$rowcate['cate_name'].'</a></li>';
            }            
        }
        
        return $cateList;
        
    }
    
    ////// get the category list view
    function category_cols_list_view($cid=0) {
        
        $ringresults = $this->Davidsternmodel->getCateList( $cid );
        //print_ar($ringresults);
        
        $catelist_view = '';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowcate ) {
                $detaiLink = SITE_URL.'heartjewelrylistings/heart_collection_cate/'.$rowcate['id'];
                $cateImgLink = $this->getCateImageLink( $rowcate['id'] ); //SITE_URL.'images/no_img_found.jpg';
            
                if( !empty($cateImgLink) ) {
                    $ringTitle = $rowcate['cate_name'];

                    $catelist_view .= '<div class="rings_cols col-sm-3">
                            <div class="">
                                <a href="'.$detaiLink.'" class="img_block"><img src="'.$cateImgLink.'" alt="'.$ringTitle.'" width="175" height="159" /></a><br><br>
                            </div><br>
                            <div class="detail_row">
                                '.$ringTitle.'<br>
                            </div>
                        </div>';
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

    function output($layout = null , $data = array() ,$left='', $isleft = true , $isright = true){
		
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template').'wsale_header' , $data , true);
		
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
        $rowsring = $this->Davidsternmodel->sternProductDetail($id);
        
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
    
    /////
    function collectionPopupDetail($product_id=0, $popup='') { 
    
        $rowsring = $this->Davidsternmodel->getSternCollectionDetail($product_id);
        
        $view_iteminfo = '';
        $view_iteminfo .= '<span id="item-info"><b>Item Information</b></span>
            <table id="item-tbl" class="data-table2" width="100%" cellspacing="0" cellpadding="0">
              <tbody>';
                $view_iteminfo .= '<tr class="first-row">
                                    <th style="width:40%;color:#ff0000;font-weight:bold;">Item Code</th>
                                    <td style="color:#ff0000;font-weight:bold;">'.$rowsring['stock_number'].'</td>
                                  </tr>';
                $view_iteminfo .= '<tr class="first-row">
                                            <th style="width:40%;">Category Name</th>
                                            <td>'.jewelry_cate_name( $rowsring['category'] ).'</td>
                                          </tr>';
                $view_iteminfo .= '<tr class="first-row">
                                            <th style="width:40%;">Metal</th>
                                            <td>'.$rowsring['metal'].'</td>
                                          </tr>';

                if( !empty($rowsring['metal_color']) ) {
                  $view_iteminfo .= '<tr class="first-row">
                                        <th style="width:40%;">Metal Color</th>
                                        <td>'.$rowsring['metal_color'].'</td>
                                      </tr>';
                }
                if( !empty($rowsring['category_type']) ) {
                  $view_iteminfo .= '<tr class="first-row">
                                        <th style="width:40%;">Category Type</th>
                                        <td>'.$rowsring['category_type'].'</td>
                                      </tr>';
                }
                if( !empty($rowsring['ring_size']) ) {
                  $view_iteminfo .= '<tr class="first-row">
                                        <th style="width:40%;">Ring Size</th>
                                        <td>'.$rowsring['ring_size'].'</td>
                                      </tr>';
                }
                if( !empty($rowsring['ring_style']) ) {
                  $view_iteminfo .= '<tr class="first-row">
                                        <th style="width:40%;">Ring Style</th>
                                        <td>'.$rowsring['ring_style'].'</td>
                                      </tr>';
                }
                if( !empty($rowsring['avail_size']) ) {
                  $view_iteminfo .= '<tr class="first-row">
                                        <th style="width:40%;">Available Size</th>
                                        <td>'.$rowsring['avail_size'].'</td>
                                      </tr>';
                }
                if( !empty($rowsring['measurements']) ) {
                  $view_iteminfo .= '<tr class="first-row">
                                        <th style="width:40%;">Measurements</th>
                                        <td>'.$rowsring['measurements'].'</td>
                                      </tr>';
                }
                if( !empty($rowsring['company_id']) ) {
                  $view_iteminfo .= '<tr class="first-row">
                                        <th style="width:40%;">Company ID</th>
                                        <td>'.$rowsring['company_id'].'</td>
                                      </tr>';
                }
    }
     
 $view_iteminfo .= '</tbody></table>';
 
        if( empty($popup) ) {
            echo $view_iteminfo;
        } else {
            return $view_iteminfo;
        }
        
    }
    //// product popup detail
    function heart_popup_detail($id=0) {
       $data = $this->getCommonData();
       $rowsring = $this->Davidsternmodel->sternProductDetail($id); //print_ar($rowsring);
       
       $data['title'] = $rowsring['title'];
       $data['listings_detail'] = $this->listingdetail( $id, 'popup' );
       $data['ring_title'] = $this->getRingTitle($rowsring);
       $data['rings_thumb'] = $this->getProductThumb( $rowsring, 'popup' );
       $data['ringimg']   = STERN_IMGS.$rowsring['item_id'].'.jpg';
       $data['rowsring']   = $rowsring;
       $data['retail_price']  = $rowsring['gold_polished_1300'] * PRICE_PERCENT;  //// PRICE_PERCENT : 3.5
       $data['salesprice'] = $rowsring['gold_polished_1300'];
       $data['saving_percent'] = ( 100 - ( ( $data['salesprice'] / $data['retail_price'] ) * 100 ) );
       
       $this->load->view('heartjewelryviews/heartjw_popup_detail', $data);
        //$this->output($output, $data);
        
    }
    
    //// product popup detail
    function heart_collection_popup_detail($id=0) {
       $data = $this->getCommonData();
       $rowsring = $this->Davidsternmodel->getSternCollectionDetail($id);
        $data['category_name'] = jewelry_cate_name( $rowsring['category'] );
        $data['rowsring'] = $rowsring;
        //$sales_price = $rowsring['price'];
        $sales_price = ( $rowsring['g14_wh_price'] > 0 ? $rowsring['g14_wh_price'] : $rowsring['price'] );
        $retail_price = $sales_price * PRICE_PERCENT;
        $saving_percent = _nf( ( 100 - ( ( $sales_price / $retail_price ) * 100 ) ), 2 );
        $data['buynow_link'] = htmlspecialchars(SITE_URL.'shbasket_wholesale/addtoshoppingcart/');
        $data['item_desc'] = get_site_title().' Jewelry can be yours for $'._nf($rowsring['price_website'], 2).'.';

        //$cate = $this->getCateName( $rowsring['catid'] );  
        $ringBoxDesc = $data['category_name'] . ' ' . $rowsring['metal_purity'];
        $ring_title = $ringBoxDesc. ' Item ID: '. $rowsring['stock_number'];
        $ringimg   = ( (file_exists(COLLECTION_FOLDER.$rowsring['image1'])) ? SITE_URL.COLLECTION_FOLDER.$rowsring['image1'] : SITE_URL.'img/no_image_found.jpg' );
       
       $data['title'] = $ring_title;
       $listings_detail = ''; //$this->collectionPopupDetail( $id, 'popup' );
       //$product_thumbs = $this->get_collection_thumbs( $rowsring, $ring_title );
       $product_thumbs = $this->heart_collection_images( $rowsring, $ring_title );
       
       $ring_detail_bk = '<div id="pop_'.$id.'" class="simplePopup collection_view">';
       $ring_detail_bk .= '<div class="col-sm-5">
                  <div class="product-image product-image-zoom zoomright" id="ringsthumb_view">
                    <div class="set_thumb_img" id="popup_'.$rowsring['stock_number'].'">                                
                            <div class="" id="show_thumb_view"></div>
                                  '.$product_thumbs['thumbs'].'
                            </div>
                    <div class="left_arrow_view"><a href="#javascript" onclick="button_previous(\'popup_'.$rowsring['stock_number'].'\')"><img src="'.SITE_URL.'img/heart_diamond/left_arrow_view_ic.jpg" alt="" /></a></div>
        <div class="right_arrow_view"><a href="#javascript" onclick="button_next(\'popup_'.$rowsring['stock_number'].'\')"><img src="'.SITE_URL.'img/heart_diamond/right_arrow_view_ic.jpg" alt="" /></a></div>
                </div>
                <div class="more-views"></div>
              </div>';
       $ring_detail_bk .= '<form id="form_'.$rowsring['stock_number'].'" action="" method="">
           <div class="col-sm-6 pull-right">
          <div class="price-box">
              <div class="product-name"><h1>'.$ring_title.'</h1></div>
              <p class="old-price fb-old-price f-fix"> 
                  <span class="price-label">Item Code:</span> <span>'.$rowsring['item_sku'].'</span> 
              </p>
              <p class="old-price fb-old-price f-fix"> 
                  <span class="price-label">Item Style:</span> <span>'.$rowsring['ring_style'].'</span> 
              </p>';
            if($retail_price > 0 ) {
            $ring_detail_bk .= '<p class="old-price"> <span class="retail-label">Retail Price:</span> <span class="price" id="old-price-'.$rowsring['stock_number'].'">$'._nf($retail_price, 2).'</span> <span class="pnotify"> <a href="#" id="productupdates-button4" onmouseover="new Productupdates();"> <i></i>Get Price Update </a> </span> </p>
            <p class="old-price"> <span class="ourprice-label">Our Price:</span> <span class="new-price" id="product-price-'.$rowsring['stock_number'].'">$'._nf($sales_price, 2).'</span> <span class="special-price-label" id="old_price">(Savings:'.$saving_percent.'%)</span> <span id="google_discount"></span> <span id="twitter_discount"></span> <span id="facebook_discount"></span> <span id="pinterest_discount"></span> <span id="total_price"></span> 
              <!-- // customm code for shipping free text --> 
              <strong><a class="freeShip" href="#" target="_blank">Ships for free&nbsp;*</a></strong> 
              <!-- // End customm code --> 
            </p>';
            }
          $ring_detail_bk .= '</div>
          <label for="qty">QUANTITY:</label>
          <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
          <div class="product-options-bottom">
            <div class="add-to-cart-1">
                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="'.$rowsring['ring_style'].'">
                <input type="hidden" name="3ez_price" value="" />
                <input type="hidden" name="5ez_price" value="" />
                <input type="hidden" name="main_price" value="'.$rowsring['price'].'" />
                <input type="hidden" name="price" value="'.$rowsring['price'].'" />
                <input type="hidden" name="vender" value="heart_diamond_collection">
                <input type="hidden" name="url" value="'.$ringimg.'">
                <input type="hidden" name="prodname" value="'.$ringtitle.'" />
                <input type="hidden" name="diamnd_count" value="'.$rowsring['diamond_count'].'">
                <input type="hidden" name="ring_shape" value="'.$rowsring['shape'].'" />
                <input type="hidden" name="ring_carat" value="'.$rowsring['carat'].'" />
                <input type="hidden" name="prid" id="prid" value="'.$rowsring['stock_number'].'" />
                <input type="hidden" name="txt_ringtype" value="generic_ring" />
                <input type="hidden" name="txt_ringsize" value="" />
                <input type="hidden" name="txt_metal" value="'.$rowsring['metal'].'" />
                <input type="hidden" name="metals_weight" value="'.$rowsring['weight'].'" />
                <input type="hidden" name="vendors_name" value="Hearts and Diamonds Collection" />
                <input type="hidden" name="txt_addoption" value="heart_diamond_collection" />
                <input type="hidden" name="center_stone_id" id="center_stone_id" />
                <input type="hidden" name="txt_qty" value="1" />
                          
                <div>
                    <a href="#javascript" onclick="add_to_cart_form(\''.SITE_URL.'shbasket_wholesale/addtoshoppingcart/\', \''.$rowsring['stock_number'].'\')" class="add_to_cart_btn" id="addtoshopping">Place a Memo</a>
                </div>
            </div>
          </div>
          <br clear="all">
          <div style="clear:both;width:100%;">
            <div class="box-collateral box-additional"> <br clear="all">
                    '.$listings_detail['item_information'].'
              <div class="other_button_links">
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/add_to_wish_list.jpg" alt="Add To Wishlist" /></a>
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/add_to_compare_ic.jpg" alt="Add to Compare" /></a>
                  <a href="#"><img src="'.SITE_URL.'img/heart_diamond/email_to_friend_ic.jpg" alt="Email to Friend" /></a>
              </div>
            </div>
          </div>
        </div></form>';
       $ring_detail_bk .= '</div>';
       
       //$this->load->view('heartjewelryviews/heart_collection_popup_detail', $data);
        //$this->output($output, $data);
        
       return $ring_detail_bk;
    }
    
    ///// get finish level value
    function finishlevel($rid='', $metal='gold', $level='') {

        $rowsring = $this->Davidsternmodel->sternProductDetail( $rid );
        
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

        $rowsring = $this->Davidsternmodel->sternProductDetail( $rid );
        
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
    function collection_diamond_options() {
        $center_stone = $this->session->userdata('center_stone');
        $str = explode('=', $center_stone);
        $return['carat'] = $str[1];
        $return['shape'] = substr($str[0], -2);
        $return['diamond_count'] = substr($str[0], 0, -2);
        
        return $return;
    }
    
    function get_center_stone_list($collection_id=0) {
        $diamond = $this->collection_diamond_options();
        if( $diamond['diamond_count'] == 1 ) {
            $diamond_carat = $diamond['carat'];
        } elseif( $diamond['diamond_count'] == 2 ) {
            $diamond_carat = $diamond['carat'] / 2;
        } else {
            $diamond_carat = $diamond['carat'];
        }
        
        $rowsring = $this->Davidsternmodel->getSternCollectionDetail($collection_id); //print_ar($rowsring);
        $item_carat = explode('-', $rowsring['item_sku']);
        
        $globalFields = unserialize( $rowsring['global_fields'] ); //print_ar($globalFields);
        $diamondSpec = $this->get_diamond_spec( $globalFields ); //print_ar($diamondSpec);
        
        if( !empty($diamondSpec['shape']) ) {
            $diamondShape = $diamondSpec['shape'];
            //$diamondCarat = $diamondSpec['carat'];
        } else {
            $diamondShape = $diamond['shape'];
            //$diamondCarat = $diamond_carat;
        }
        if( !empty($item_carat[1]) ) {
            $diamondCarat = $item_carat[1];
        } else {
            $diamondCarat = 0.50;
        }
        
        $diamond_shape = getDiamondShape($diamondShape);
        $results = $this->catemodel->get_rapnet_diamond_list($diamond_shape, $diamondCarat, $diamond['diamond_count']); //print_ar($results);
        return $results;
    }
    
    ///// view center stone diamond
    function view_center_stone($ring_id=0, $d_count=0) {

        $data['stones_list'] = $this->get_center_stone_list($ring_id);
        $data['diamond_count'] = $d_count;
        $this->load->view('heartjewelryviews/view_center_stone_list', $data);
    }
    ///// view center stone diamond
    function view_diamond_result() {
        $data['stones_list'] = $this->get_center_stone_list();
        $data['row_detail'] = $data['stones_list'][0];

        $this->load->view('heartjewelryviews/view_diamond_result_list', $data);    
    }
     ///// view center stone diamond
    function get_diamond_result_detail($ring_id=0, $type='ring') {
        $data['stones_list'] = $this->get_center_stone_list();
        
        if( $type === 'diamond' ) {
            $lotid = urldecode($ring_id);
            $lot_id = str_replace('_slash_', '/', $lotid);
        
            $data['row_detail'] = $this->Diamondmodel->getDetailsByLot($lot_id);
            
        } else {
            $data['row_detail'] = $data['stones_list'][0];
        }        

        $this->load->view('heartjewelryviews/view_diamond_result_detail', $data);
    
    }
    
    function view_earing_diamonds_detail($lot='',$add_option='',$setting_id='', $lot2='') {
		
        $lot 	= urldecode($lot);
        $lot2 	= urldecode($lot2);
        $data['lot'] 		= $lot;
        $data['addoption']  = $add_option;
        $data['settingsid'] = $setting_id;
        $row_detail = $this->Diamondmodel->getDetailsByLot($lot);
        $data['row_detail'] = $row_detail;

        $image_path = SITE_URL.'images/shapes_images/';
        $data['diamond_shape'] = view_shape_value($view_diamondimg, $row_detail['shape']);

        $data['diamond_type'] = 'White Diamond';
        $data['view_shapeimage'] = $image_path.$view_diamondimg;

        $data['row_detail2'] = $this->Diamondmodel->getDetailsByLot($lot2);
        $data['diamond_price'] = $data['row_detail']['price'] + $data['row_detail2']['price'];
        $data['bothdm_price'] = '$'._nf( $data['diamond_price'] );
        $option_setting = resetOptionValue($add_option);
        $data['moredt_link'] = SITE_URL.'diamonds/diamondpair_moredetail/'.$lot.'/'.$option_setting.'/'.$setting_id.'/'.$lot2;
        $data['sidestone_carat'] = $row_detail['carat'] + $data['row_detail2']['carat'];
		
        $this->load->view('heartjewelryviews/view_earing_diamonds_detail', $data);
    }
    
    //// get collection rings results
    function getCollectionResult() {
        $trialUserLogo = get_trial_user_logo();
        $cates1 = $this->Davidsternmodel->get_ebay_subcategory_list( 3292598018 );    /// this ID for women rings category        
        $ringresults = '';
        if( count($cates1) > 0 ) {
            foreach( $cates1 as $rowcate ) {
                $ringresults .= '<div class="engagement-product col-sm-4">
                                    <a href="#javascript" onClick="getCollectionRings(\''.$rowcate['category_id'].'\', \'9\')">
                                    <div class="ringtile">
                                    <div class="setringsbg_bk">'.$trialUserLogo.'</div>
                                    <img style=" width:160px;height: 160px;" id="ringbigimage10267" src="'.SITE_URL.'img/no_image_found.jpg" /><br></div></a>
                                    <div><a href="#javascript" onClick="getCollectionRings(\''.$rowcate['category_id'].'\', \'9\')">
                                    <div class="lefticon_image"><img src="'.SITE_URL.'img/page_img/grdw-ar.jpg" alt="Diamond List"></div></a>
                                    <div class="pricebk_list"><a href="#javascript" onClick="getCollectionRings(\''.$rowcate['category_id'].'\', \'9\')">
                                    <div class="txtsmall"> '.$rowcate['category_name'].'</div>
                                <a href="#javascript" onClick="getCollectionRings(\''.$rowcate['category_id'].'\', \'9\')" class="viewdt_block">View Rings</a></div></div><div> </div>
                               <br></div>';
            }
        } else {
            $ringresults .= '<div>No Category Found</div>';
        }
        echo $ringresults;
    }
    function heart_ring_price($rows) {
        if( $rows['g14_wh_price'] > 0 ) {
            $ringprice = '$'._nf($rows['g14_wh_price']);
        } else if( $rows['price'] > 0 ) {
            $ringprice = '$'._nf($rows['price']);
        } else {
            $ringprice = 'Call: '.CONTACT_NO.' for Prices';
        }
        return $ringprice;
    }
    //// get collection rings results
    function getCollectionRings($category_id=0, $page_limit=9) {
        $trialUserLogo = get_trial_user_logo();
        $results = $this->Davidsternmodel->get_collection_list_via_cate( $category_id );    /// this ID for women rings category        
        $ringresults = '';
        if( count($results) > 0 ) {
            foreach( $results as $rows ) {
                $detailPageLink = SITE_URL . 'heartjewelrylistings/collection_ring_detail/'.$rows['stock_number'];
                $ringPrice = $this->heart_ring_price($rows);
                //$ringImage = SITE_URL.'img/no_image_found.jpg';
                $ringImage = $this->set_collection_img($rows['image1'], $rows['item_sku'], $rows['different_imglist']);;
                
                $ringresults .= '<div class="engagement-product col-sm-4">
				<a href="'.$detailPageLink.'" target="_blank">
                                <div class="ringtile">
                                <div class="setringsbg_bk">'.$trialUserLogo.'</div>
                                <img style=" width:160px;height: 160px;" id="ringbigimage10267" src="'.$ringImage.'" /><br></div></a>
                                <div><a href="'.$detailPageLink.'" target="_blank">
                                <div class="lefticon_image"><img src="'.SITE_URL.'img/page_img/grdw-ar.jpg" alt="Diamond List"></div></a>
                                <div class="pricebk_list"><a href="'.$detailPageLink.'" target="_blank">
                                <div class="txtsmall"> '.$rows['item_title'].'</div>
                                <div class="txtsmall"> '.$ringPrice.'</div></a>
                            <a href="'.$detailPageLink.'" target="_blank" class="viewdt_block">View Details</a></div></div><div> </div>
                           <br></div>';
            }
        } else {
            $ringresults .= '<div>No Category Found</div>';
        }
        echo $ringresults;
    }
    /// get product categories
    function heart_listing_cate() {
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
            }
        }
        $catedata = array_unique($cate_list, SORT_REGULAR);

		foreach($catedata as $cate_name) {
			$scate = $this->db->query("SELECT * FROM dev_overnight_cate WHERE sub_cateid = '{$cate_name['cateid']}'");
			$scaters = $scate->result_array();
        }
    }
}