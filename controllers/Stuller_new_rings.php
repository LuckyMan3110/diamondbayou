<?php
class Stuller_new_rings extends CI_Controller {
    function __construct(){
            parent::__construct();
            $this->load->model('rolexmodel_new');
            $this->load->model('stulleringsmodel');
            $this->load->model('catemodel');
            $this->load->helper('stullering');
            $this->load->helper('common_function');
            $this->load->library('pagination');
            $this->session->unset_userdata('whsale_section');
            $phone_from_admin = get_site_contact_info('contact_info'); 
        define('CONTACT_NO', $phone_from_admin);
    }	
    function index()
    {
        die('You are not allowed to access this page!');
    }
    private function getCommonData($banner='')
    {
            $this->load->model('commonmodel');
            $data = array();
            $data = $this->commonmodel->getPageCommonData();
            return $data;
    }
    
    ///// wedding band rings
    function wedding_bands_diamond() {
        $data = $this->getCommonData(); 
		
        
        $data['meta_tags'] = '<meta name="title" content="Diamond Engagement & Wedding Rings Los Angeles | hearts and diamond"><meta name="keywords" content=""><meta name="description" content="hearts and diamond fine jewelry offers to Buy Discounted Rate Diamond Engagement Ring, wedding rings, GIA Certified Diamonds, Bracelets & Rolex Watches. Call Now.">';
        
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $data['title'] = 'Diamond Wedding Bands';
        
        $pag_sort = $this->input->get('sort');
        $page_sort = ( !empty($pag_sort) ? $pag_sort : 'ASC' );
        $per_page = ( $perpage > 0 ? $perpage : 20 );
        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $per_page ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        $results = $this->stulleringsmodel->getWedingBanDiamond($start_from, $per_page, $page_sort);
                
        $data['wedding_band_diamonds'] = $this->getWedingBandsDiamondList( $results['results'] );
        $data['page_links']   = get_pagination_links($per_page, $results['total'], 'stuller_new_rings/wedding_bands_diamond/', $page_sort);
        $options_link = SITE_URL.'stuller_new_rings/wedding_bands_diamond/?pagelist='.$per_page.'&per_page='.$perpage_no.'&sort=';
        $data['option_link'] = $this->sort_option_list($options_link, $page_sort);
        
        $output = $this->load->view('stuller_rings_views/weddingbands_diamond_rings' , $data , true);
        $this->output($output, $data);
    }
    
    ///// wedding band rings
    function wbands_diamond_detail($id=0, $pageOptions='wb_diamond', $detail_id='') {
        $data = $this->getCommonData(); 
        
        $data['stuller_id']  = $id;
        $data['page_options']  = $pageOptions;
        $tablesName = getStulerTable( $pageOptions );
        $data['tbl_name'] = ( !empty($tablesName['details']) ? $tablesName['details'] : 'not_found' );
        $data['ring_size'] = $this->input->get('ring_size');
        $rsize_price = $this->catemodel->getFingerSizePrice( $data['ring_size'] );
        
        $data['finger_size'] = $this->getFingerSizeOptions( $id, $pageOptions, $data['ring_size'] );
        if( !empty($tablesName['details']) ) {
            $rowdetail = $this->stulleringsmodel->get_stuller_details( $id, $tablesName['details'] );
        } else {
            $rowdetail = array();
        }
        if( empty( $detail_id ) ) {
            $tableName = $tablesName['product'];
            $stullerID = $id;
        } else {
            $tableName = $tablesName['details'];
            $stullerID = $detail_id;
        }
        
        $data['results'] = $this->stulleringsmodel->getStulleRingDetail( $stullerID, $tableName );
        $priceMargin = $this->catemodel->inventory_price_margin($pageOptions, STULLER_FINE);
        $data['results']['price'] = $data['results']['price'] * $priceMargin;
        
        $data['band_price'] = $data['results']['price'] + $rsize_price;
        
        $data['prod_images'] = $this->stulleringsmodel->getStullerImages( $id, $tablesName['product'], $tablesName['images'] );
        $data['image_src'] = 'stuller/'.$tablesName['folder'].'/'.$data['prod_images'][0]['product_image'];
        $data['product_image'] = SITE_URL.$data['image_src'];
        $prod_specification = explode(';', $data['results']['specifications'] );
        $comes_with = explode(';', $data['results']['comes_set_with'] ); //print_ar($comes_with);
        $data['product_spec'] = $this->getProductSpecification( $prod_specification, resetRingSize($data['ring_size']) );
        $data['comes_qunatity'] = $this->setComesSetWith( $comes_with[0] );
        $data['comes_stone']    = $this->setComesSetWith( $comes_with[1] );
        $data['check_page'] = explode(':', $comes_with[2]);
        $data['page_numbers']    = $this->setComesSetWith( $comes_with[2] );
        $data['page_options']    = ( !empty($pageOptions) ? $pageOptions : 'wb_diamond' );
        $data['stuller_title']    = $tablesName['title'];
        $data['item_number']    = ( !empty($data['results']['item_number']) ? $data['results']['item_number'] : $rowdetail[0]['item_number'] );
        $data['product_details']    = $this->getStullerDetails( $rowdetail, $id, $pageOptions );
        $data['quality_option']    = $this->quality_dropdown( $data['results']['quality'] );
        
        if( $id == 659 || $pageOptions == 'wb_diamond' ) {
            $data['title'] = 'Sterling Silver Ring | Hearts and Diamonds | Diamond Wedding Bands';
        } else if( $id == 1327 || $pageOptions == 'wb_mens' ) {
            $data['title'] = 'Diamond Duo Band | Hearts and Diamonds | Mens Wedding Bands';
        } else {
            $data['title'] = $data['results']['title'];
        }
        
        if( $pageOptions != 'gemstone' ) {
        $data['diamond_carat_wt']  = $this->get_dropdown_options( $id, 'diamond_carat_weight', $tablesName['details'], $data['results']['diamond_carat_weight'] );
        $data['diamond_quality_opt']  = $this->get_dropdown_options( $id, 'diamond_quality', $tablesName['details'], $data['results']['diamond_quality'] );
        }
        
        if( $pageOptions === 'wb_hoops' ) {
        $data['stone_type']  = $this->get_dropdown_options( $id, 'stone_type', $tablesName['details'], $data['results']['stone_type'] );
        $data['outside_dimension']  = $this->get_dropdown_options( $id, 'outside_dimension', $tablesName['details'], $data['results']['outside_dimension'] );
        }
        
        
        
        $complete_page = array('wb_studs', 'wb_hoops');
        $data['stuller_list'] = $tablesName;
        $data['stuller_link'] = $this->set_stuller_link( $tablesName['folder'] );
        if( !empty($data['results']['meta_description']) ) {
            $data['meta_tags'] = '<meta name="description" content="'.$data['results']['meta_description'].' '.$data['results']['title'].' ">';
        } else {
            $data['meta_tags'] = '<meta name="description" content="Offers Loose Diamonds,Design Your Own Ring,Ideal Scope, Loose Diamond, Engagement Rings, Cheap Diamonds, Customize Rings,Diamond Tutorial, Diamond rings, Cheap Diamonds, Ideal Scope, Diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, '.$data['results']['title'].' ">';
        }
        
        if( in_array($pageOptions, $complete_page) ) {
            $this->stuller_output('stuller_rings_views/weding_bands_diamond_detail' , $data);
        } else {
            $this->detail_output('stuller_rings_views/weding_bands_diamond_detail' , $data);
        }       
        
    }
    function set_stuller_link($folder='') {
        switch ($folder) {
            case 'diamondhoops':
                $stuller_link = 'diamond_hoop_earings';
                break;
            case 'gemstone':
                $stuller_link = 'gemstone_earings';
                break;
            default:
                $stuller_link = $folder;
                break;
        }
        return $stuller_link;
    }
    
    //// quality option dropdown
    function quality_dropdown($quality='') {
        $metal_list = array('14kt Rose', '14kt White', '14kt Yellow', '18kt White', 'Platinum');
        $options = '';
        
        foreach( $metal_list as $metals ) {
            $options .= '<option value="'.$metals.'" '.selectedOption($metals, $quality).'>'.$metals.'</option>';
        }
        
        return $options;
        
    }
    
    //// get drop options values
    function get_dropdown_options($s_id=0, $column='', $table_name='', $col_value='') {
        $options_list = $this->stulleringsmodel->stuller_table_cols( $s_id, $column, $table_name );
        $options = '';
        
        foreach( $options_list as $option_value ) {
            $options .= '<option value="'.$option_value[$column].'" '.selectedOption($option_value[$column], $col_value).'>'.$option_value[$column].'</option>';
        }
        
        return $options;
        
    }
    
    //// get the stuller jewelry price on change the dorpdown
    function get_stuller_price($id=0, $table='', $quality='', $page_option='') {
        $firstVar = $this->input->get('first_option');
        $secondVar     = $this->input->get('second_option');
        $contact = 'Please Call ' . CONTACT_NO . ' to speak to a Jewelry Represenative.';
        
        if( $table === 'not_found' ) {
            echo $contact; exit;
        }
        
        $stuller_price = $this->stulleringsmodel->get_stuller_jewelry_price( $id, $table, $quality, $firstVar, $secondVar, $page_option );
        
        echo ( !empty($stuller_price) ? $stuller_price : 0 );
    }
    
    //// show the stuller detail
    function getStullerDetails($results=array(), $s_id=0, $page_opt='') {
        
        $stuller_detail = '';
        
        if( count($results) > 0 ) {
            $stuller_detail .= '<div class="topMarginLarge">
                      <div class="table-responsive">
                        <table class="lightGreyBackground table simple withAltRows">
                          <thead>
                            <tr>
                              <th>Item Number</th>
                              <th>Quality</th>
                              <th>Diamond CTW</th>
                              <th>Sold By</th>
                              <th>Description</th>
                              <th>Price</th>
                              <th>Option</th>
                            </tr>
                          </thead>
                          <tbody>';
            
            foreach( $results as $rows ) {
                $diamond_ctw = ( !empty($rows['diamond_ctw']) ? $rows['diamond_ctw'] : $rows['description'] );
                $stuller_detail .= '<tr>
                                        <td>' . $rows['item_number'] . '</td>
                                        <td>' . $rows['quality'] . '</td>
                                        <td>' . $diamond_ctw . '</td>
                                        <td>' . $rows['sold_by'] . '</td>
                                        <td>' . $rows['description'] . '</td>
                                        <td>$' . _nf($rows['price'],2) . '</td>
                                        <td><a href="'.SITE_URL.'stuller_new_rings/wbands_diamond_detail/'.$s_id.'/'.$page_opt.'/'.$rows['id'].'">Select</a></td>
                                    </tr>';
            }
            $stuller_detail .= '</tbody>
                        </table>
                        <div class="clear"></div>
                      </div>
                    </div>';
        }
        
        return $stuller_detail;
        
    }
    
    //// get finger size options list
    function getFingerSizeOptions($product_id, $boptions='wb_diamond', $ring_size) {
        //$ring_size = ''; //$this->input->get('ring_size');
        $band_options = array('', 'wb_diamond', 'wb_ladies', 'wb_platinum', 'wb_mens');
        
        ///// finger size
        $ringresults = $this->catemodel->getFingerSizeResult();
        $base_link = SITE_URL.'stuller_new_rings/wbands_diamond_detail/'.$product_id.'/'.$boptions.'/';
        $finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
        //$finger_size = '<option value="">Select Finger Size</option>';
        
        if( count($ringresults) > 0 ) {
            foreach( $ringresults as $rowsize ) {
                $rgsz = setRingSize($rowsize['ring_size']);
                $finger_size .= '<option value="'.$base_link.'?ring_size='.$rgsz.'" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'] . ' (+ $'.$rowsize['priceRetail'].')' .'</option>';
                //$finger_size .= '<option value="" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
            }
        }
        
        $finger_size_option = '<br><div class="optionLabel containerFix set_bottom_margin"> 
            <span class="floatLeft bold" data-bind="text:DisplayName()">Finger Size</span>
                            </div>                            
                            <div class="clear optionSelector hide_overflow">
                              <div>
                                <select class="optionDropdown form-control" onChange="window.location=this.value">'.$finger_size.'</select>
                              </div>
                            </div>';
        
        return ( in_array($boptions, $band_options) ? $finger_size_option : '' );
    }
    ///// set the vlaues of come set with
    function setComesSetWith($ar=  array()) {
        $comes = explode(':', $ar);
        
        return $comes[1];
    }
    ///// get product specifications
    function getProductSpecification($specs=  array(), $fingersize='') {
        
        $specification = '';
        $spec = array_filter( $specs );
        
        if( count($spec) > 0 ) {
            foreach( $spec as $rows ) {
                $specrow = explode( ':', $rows );                
                //if( !empty($specrow[0]) )
                if( $specrow[0] == 'Approximate Finger Size' ) {
                    $finger_size = ( !empty($fingersize) ? $fingersize : $specrow[1] );
                    $specification .= '<tr>
                            <td class="bold">Approximate Finger Size:</td>
                            <td>'.$finger_size.'</td>
                          </tr>';
                } else {
                    $specification .= '<tr>
                            <td class="bold">'.$specrow[0].':</td>
                            <td>'.$specrow[1].'</td>
                          </tr>';
                }                
            }
            
        }
        
        return $specification;
    }
    
    ///// wedding band ladies
    function wedding_bands_ladies() {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Ladies Wedding Bands';
        
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $pag_sort = $this->input->get('sort');
        $page_sort = ( !empty($pag_sort) ? $pag_sort : 'ASC' );
        $per_page = ( $perpage > 0 ? $perpage : 20 );   
        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $per_page ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );     
        $results = $this->stulleringsmodel->getWedingBandLadies($start_from, $per_page, $page_sort);
        $data['page_links']   = get_pagination_links($per_page, $results['total'], 'stuller_new_rings/wedding_bands_ladies/', $page_sort);
        
        $options_link = SITE_URL.'stuller_new_rings/wedding_bands_ladies/?pagelist='.$per_page.'&per_page='.$perpage_no.'&sort=';
        $data['option_link'] = $this->sort_option_list($options_link, $page_sort);
        
        $data['wedding_band_ladies'] = $this->getWedingBandsDiamondList( $results['results'], 'wedding_bands_ladies', 'wb_ladies' );
        
        $output = $this->load->view('stuller_rings_views/weddingbands_ladies_rings' , $data , true);
        $this->output($output, $data);
    }
    
    
    ///// wedding band ladies
    function wb_platinum() {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Wedding Bands Platinum';
        
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $pag_sort = $this->input->get('sort');
        $page_sort = ( !empty($pag_sort) ? $pag_sort : 'ASC' );
        $per_page = ( $perpage > 0 ? $perpage : 20 );   
        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $per_page ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );     
        $results = $this->stulleringsmodel->getWedingBandLadies($start_from, $per_page, $page_sort);
        $data['page_links']   = get_pagination_links($per_page, $results['total'], 'stuller_new_rings/wb_platinum/', $page_sort);
        
        $options_link = SITE_URL.'stuller_new_rings/wb_platinum/?pagelist='.$per_page.'&per_page='.$perpage_no.'&sort=';
        $data['option_link'] = $this->sort_option_list($options_link, $page_sort);
        
        $data['wedding_band_ladies'] = $this->getWedingBandsDiamondList( $results['results'], 'wb_platinum', 'wb_platinum' );
        
        $output = $this->load->view('stuller_rings_views/weddingbands_ladies_rings' , $data , true);
        $this->output($output, $data);
    }
    
    ///// wedding band platinum
    function wedding_bands_platinum() {
        $data = $this->getCommonData(); 
		
        
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $config["per_page"] = ( $perpage > 0 ? $perpage : 20 );
        $config["num_links"] = 5;
        $config["uri_segment"] = 10;
        $config['use_page_numbers'] = TRUE;        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        $results = $this->stulleringsmodel->getWedingBandPlatinum($start_from, $config["per_page"]);
        
        $config["total_rows"] = $results['total'];
	    $config["base_url"]   = SITE_URL.'stuller_new_rings/wedding_bands_platinum/?pagelist='.$config["per_page"];
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config); ///// initializ the pagination
        $data['page_links']   = $this->pagination->create_links();
        
        $data['title'] = 'Wedding Bands '.$perpage_no;
        
        $data['meta_tags']  = '
<meta http-equiv="Content-Type" content="text/html; iso-8859-1">
<meta name="title" content="Loose Diamonds,Engagement Rings, Design Your Own Ring, Cheap Diamonds Ideal Scope, Customize Rings - Engagement Rings, '.$data['title'].', '.$perpage_no.' ">
<meta name="ROBOTS" content="INDEX,FOLLOW">
<meta name="description" content="Offers Loose Diamonds,Design Your Own Ring,Ideal Scope, Loose Diamond, Engagement Rings, Cheap Diamonds, Customize Rings,Diamond Tutorial, Diamond rings, Cheap Diamonds, Ideal Scope, Diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, '.$data['title'].', '.$perpage_no.'">
<meta name="abstract" content="Diamond Rings, Wholesale Diamonds, Estate Jewelry, Custom Engagement Rings, New York, Chicago, California, Boston, Las Vegas, Columbia, Montgomery, '.$data['title'].', '.$perpage_no.'">
<meta name="keywords" content="diamonds, Loose diamonds, engagement ring usa, colored diamonds, engagement diamonds ring, wholesal diamond, diamond district, Diamond Rings, Wholesale Diamonds, Estate Jewelry, custom engagement rings, diamond ring usa, engagement rings diamond, '.$data['category_name'].', '.$perpage_no.'">
<meta name="author" content="'.get_site_contact_info('sites_title').'">
<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
<meta http-equiv="Reply-to" content="">
<meta name="creation_Date" content="12/12/2008">
<meta name="expires" content="">
<meta name="revisit-after" content="7 days">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';
        
        $data['wedding_band_platinum'] = $this->getWedingBandsDiamondList( $results['results'], 'wedding_bands_platinum', 'wb_platinum' );
        
        $output = $this->load->view('stuller_rings_views/weddingbands_platinum_rings' , $data , true);
        $this->output($output, $data);
    }
    
    ///// wedding band mens
    function wedding_bands_mens() {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Mends Wedding Bands';
        
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $config["per_page"] = ( $perpage > 0 ? $perpage : 20 );
        $config["num_links"] = 5;
        $config["uri_segment"] = 10;
        $config['use_page_numbers'] = TRUE;        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        $results = $this->stulleringsmodel->getWedingBandMens($start_from, $config["per_page"]);
        
        $config["total_rows"] = $results['total'];
	$config["base_url"]   = SITE_URL.'stuller_new_rings/wedding_bands_mens/?pagelist='.$config["per_page"];
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config); ///// initializ the pagination
        $data['page_links']   = $this->pagination->create_links();
        
        $data['wedding_band_mens'] = $this->getWedingBandsDiamondList( $results['results'], 'wedding_bands_mens', 'wb_mens' );
        
        $output = $this->load->view('stuller_rings_views/weddingbands_mens_rings' , $data , true);
        $this->output($output, $data);
    }
    
    ///// gemstones earings
    function gemstone_earings() {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Gemstone Earrings';
        $perpage = $this->input->get('pagelist');
        $perpage_no = $this->input->get('per_page');
        $config["per_page"] = ( $perpage > 0 ? $perpage : 20 );
        $config["num_links"] = 5;
        $config["uri_segment"] = 10;
        $config['use_page_numbers'] = TRUE;        
        $startFrom = ( $perpage_no > 0 ? ( ( $perpage_no - 1 ) * $config["per_page"] ) : 0 );        
        $start_from =  ( $startFrom > 0 ? $startFrom : 1 );
        $results = $this->stulleringsmodel->getGemstonEarings($start_from, $config["per_page"]);
        
        $config["total_rows"] = $results['total'];
	$config["base_url"]   = SITE_URL.'stuller_new_rings/gemstone_earings/?pagelist='.$config["per_page"];
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $data['gemstones_earrings'] = $this->getWedingBandsDiamondList( $results['results'], 'gemstone', 'gemstone' );
        
        $this->pagination->initialize($config); ///// initializ the pagination
        $data['page_links']   = $this->pagination->create_links();
        
        $output = $this->load->view('stuller_rings_views/gemstones_earring_rings' , $data , true);
        $this->output($output, $data);
    }
    
    ///// gemstones earings
    function diamond_stud_earrings() {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Diamond Earrings';
        //$results = $this->stulleringsmodel->getGemstonEarings();
        //$data['gemstones_earrings'] = $this->getWedingBandsDiamondList( $results, 'gemstone' );
        $data['results'] = $this->stulleringsmodel->getDiamondStullerStudEarrings();
        
        //echo '<pre>'; print_r($data['results']); exit();
        
        $this->stuller_output('stuller_rings_views/diamond_stud_earings' , $data);
        
    }
    
    ///// stud earings view
    function stud_earrings_view($stone_color='NA') {
        $data = $this->getCommonData(); 
		
        
        $pag_sort = $this->input->get('sort');
        $metal_color = $this->input->get('metal_color');
        $stone_shape = $this->input->get('stone_shape');
        $page_sort = ( !empty($pag_sort) ? $pag_sort : 'ASC' );
        $results = $this->stulleringsmodel->getDiamondStudEaring($stone_color, $metal_color, $stone_shape, $page_sort);
        $data['view_stud_earrings'] = $this->getWedingBandsDiamondList( $results, 'diamond_stud_earrings', 'wb_studs' );
        $page_link = SITE_URL.'stuller_new_rings/stud_earrings_view/';
        $options_link = $page_link.$stone_color.'/?sort=';
        $data['option_link'] = $this->sort_option_list($options_link, $page_sort);
        $data['page_sort'] = $page_sort;
        $data['metal_color'] = $page_link . $stone_color . '/?sort='.$page_sort.'&metal_color=';
        $data['stone_shape'] = $data['metal_color'].$metal_color.'&stone_shape=';
        
        //echo '<pre>'; print_r( $results ); exit();
        
        $data['title'] = 'Diamond Stud Earrings';
       
        $this->stuller_output('stuller_rings_views/view_alldiamond_studs' , $data);
        
    }
    
    ///// stud earings view
    function diamond_hoop_view() {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Diamond Hoops';
        $pag_sort = $this->input->get('sort');
        $metal_color = $this->input->get('metal_color');
        $stone_shape = $this->input->get('stone_shape');
        $page_sort = ( !empty($pag_sort) ? $pag_sort : 'ASC' );
        $results = $this->stulleringsmodel->getDiamondHoopRings($metal_color, $stone_shape, $page_sort);
        $data['view_diamond_hooplist'] = $this->getWedingBandsDiamondList( $results, 'diamondhoops', 'wb_hoops' );
        $pageLink = SITE_URL.'stuller_new_rings/diamond_hoop_view/';
        $options_link = $pageLink.'?metal_color='.$metal_color.'&stone_shape='.$stone_shape.'&sort=';
        $data['option_link'] = $this->sort_option_list($options_link, $page_sort);
        $data['metal_color'] = $pageLink.'?stone_shape='.$stone_shape.'&sort='.$page_sort.'&metal_color=';
        $data['stone_shape'] = $pageLink.'?metal_color='.$metal_color.'&sort='.$page_sort.'&stone_shape=';
       
        $this->stuller_output('stuller_rings_views/view_diamond_hoops_lists' , $data);
        
    }
    
    ///// diamond hoop earings
    function diamond_hoop_earings() {
        $data = $this->getCommonData(); 
		
        $data['title'] = 'Diamond Hoops';
        //$results = $this->stulleringsmodel->getDiamondStudEaring();
        //$data['view_stud_earrings'] = $this->getWedingBandsDiamondList( $results, 'diamond_stud_earrings' );        
       
        $this->detail_output('stuller_rings_views/diamond_hoop_earings_view' , $data);
        
    }
    
    function sort_option_list($option_link='', $sort='') {
        $options = '<option value="'.$option_link.'default" '.selectedOption('default', $sort).'>Default</option>';
        //$options .= '<option value="recent">Newest</option>';
        $options .= '<option value="'.$option_link.'DESC" '.selectedOption('DESC', $sort).'>Price: Low to High</option>';
        $options .= '<option value="'.$option_link.'ASC" '.selectedOption('ASC', $sort).'>Price: High to Low</option>';
        $options .= '<option value="'.$option_link.'Name" '.selectedOption('Name', $sort).'>Name</option>';
        //$options .= '<option value="bestsellers">Bestsellers</option>';
        
        return $options;
    }
    
    //// get rolex product listing
    function getWedingBandsDiamondList($results=array(), $folder='wedding_bands_diamond', $page_option='') {
        $prodList = '';
        $i = 1;
        $tablesName = getStulerTable( $page_option );
        
        if( count($results) > 0 ) {
            foreach ( $results as $rows ) {
                
                if( !empty($tablesName['details']) ) {
                    $rowdetail = $this->stulleringsmodel->get_stuller_details( $rows['id'], $tablesName['details'] );
                } else {
                    $rowdetail = array();
                }
                $item_number    = ( !empty($rows['item_number']) ? $rows['item_number'] : $rowdetail[0]['item_number'] );
                
                $detail_link = SITE_URL.'stuller_new_rings/wbands_diamond_detail/'.$rows['id'].'/'.$page_option;
                $imageLink = SITE_URL . 'stuller/'.$folder.'/' . $rows['image'];
                
            $prodList .= '<div class="searchColumn text-center col-md-4 col-lg-3 col-xs-6">
                          <div class="set_min_height">
                            <div class="italic">'.$rows['id'].'</div>
                          </div>
                          <a class="image logClick containerFix" href="'.$detail_link.'" data-title="">';
            
            if( $folder !== 'gemstone' ) {
                $prodList .= '<img src="'.SITE_URL.'stuller_libs/weddingband_diamond/new_prod_listing.png" class="hidden-xs stuller-badge-not-xs" alt="'.$rows['name'].'" title="'.$rows['name'].'"> <img src="'.SITE_URL.'stuller_libs/weddingband_diamond/new_prod_listing.png" class="visible-xs stuller-badge-xs" alt="'.$rows['name'].'" title="'.$rows['name'].'">';
            }
            
            $prodList .= '<img class="image-responsive" src="'.$imageLink.'" width="165" alt="'.$rows['name'].'"> </a>
                          <div class="caption">
                            <div> <a href="'.$detail_link.'"> <span id="groupTextFor_194603" class="bold">'.$rows['name'].'</span> </a> </div>';
            $prodList .= '<div class="groupPrice lightText">Starting Price:  $'. _nf($rows['price'], 2).'</div>';
            if( !empty($item_number) ) {
                $prodList .= '<div class="groupPrice lightText">Model# '.$item_number.'</div>';
            } else {
                $prodList .= '<div class="groupPrice lightText">'.$rows['name'].'</div>';
            }
            $prodList .= '</div>
                        </div>';
            
            $i++;
            
            }
        } else {
            $prodList .= '<div>No Diamond Stuller Records Found</div>';
        }
        
        return $prodList;
    }
    
    ///// stuller view
    function stuller_output($file_path='', $data_array=array()) {
//        $this->load->view('stuller_rings_views/stuller_header' , $data_array);
//        $this->load->view($file_path , $data_array);
//        $this->load->view('stuller_rings_views/stuller_footer' , $data_array);
        
        return $this->detail_output($file_path, $data_array);
        
    }
    
    ///// stuller detail page viiew
    function detail_output($file_path='', $data_array=array()) {
        //$this->load->view('stuller_rings_views/stuller_detail_header' , $data_array);
        $this->load->view('erd/header' , $data_array);
        $this->load->view($file_path , $data_array);
        $this->load->view('erd/footer' , $data_array);
        //$this->load->view('stuller_rings_views/stuller_detail_footer' , $data_array);
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
}