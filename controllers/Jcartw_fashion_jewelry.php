<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jcartw_fashion_jewelry extends CI_Controller {
    //private $totalEmails;
    function __construct() {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('user');
        $this->load->model('sitepaging');
        $this->load->model('commonmodel');
        $this->load->model('jcartwfashionmodel');
        //$this->load->model('helixmodel');
        //$this->load->model('cronmodel');
        $this->load->model('davidsternmodel');
        $this->load->helper('admin_libs');
        $this->load->helper('admin_mainmenu');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('item_jewelry_section');
        //$this->load->model('catemodel');
        $this->load->model('stullerfashionmodel');

        //$ttEmail = $this->adminmodel->getEmailsReceivedList();
        //$this->totalEmails = $ttEmail['count'];

        $cu = current_url();
        $url = explode('/', $cu);
        $uri = ( isset($url[4]) ? $url[4] : '' );
        $this->session->set_userdata('pages_name', $uri);
    }
    
    function index() {
        die('You are not allowed to access this page directly!');
    }
        
    function get_center_idex_diamond($id=0, $shape='B') {
        $rows = $this->jcartwfashionmodel->updateIdexCenterDiamondToItem($id, $shape);
    }
    //http://market.heartsanddiamonds.com/jcartw_fashion_jewelry/heart_collection_items/view/ERPHD/320
    
    function stuller_fashionjew_listing($action = 'view', $type='HD', $filter_id=0, $id = '') {
        
        
        if( isset($_POST['authentication_submit']) ){
            session_start();
            $oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');
            $req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", 'https://www.thegoldsourcejewelry.com/jcartw_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart_watches/'.$filter_id);
            $_SESSION['aman']= $req_token['oauth_token_secret'];
            header('Location:'.$req_token['login_url']);
        } 
        
        if( isset($_GET['oauth_token']) AND isset($_GET['oauth_verifier']) ){
            
            $_SESSION['oauth_token'] = $_GET['oauth_token'];
            $_SESSION['oauth_token_secret'] = $_SESSION['aman'];
            
            $request_token = $_GET['oauth_token'];
            $request_token_secret = $_SESSION['aman']; 
            $verifier = $_GET['oauth_verifier']; 
            $oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');
            $oauth->setToken($request_token, $request_token_secret);
            
            try {
                $acc_token = $oauth->getAccessToken("https://openapi.etsy.com/v2/oauth/access_token", null, $verifier);
                $_SESSION['oauth_token']=$access_token = $acc_token['oauth_token'];// get from db
        		$_SESSION['oauth_token_secret']=$access_token_secret = $acc_token['oauth_token_secret'];// get from db
        		$oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu', OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
        		$oauth->setToken($access_token, $access_token_secret);
        		
        		try {
        			$oauth_data = $oauth->fetch("https://openapi.etsy.com/v2/users/__SELF__", null, OAUTH_HTTP_METHOD_GET);
        			$json = $oauth->getLastResponse();
        			//echo "<pre>";
        		} catch (OAuthException $e) {
        			//error_log($e->getMessage());
        			//error_log(print_r($oauth->getLastResponse(), true));
        			//error_log(print_r($oauth->getLastResponseInfo(), true));
        			//exit();
        		}
            		
            	//echo 'd2';exit();
            
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully Authenticated')
                window.location.href='https://www.thegoldsourcejewelry.com/jcartw_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart_watches/'.$filter_id;
                </SCRIPT>");
            
            }catch (OAuthException $e) {
    			//error_log($e->getMessage());
    			//error_log(print_r($oauth->getLastResponse(), true));
    			//error_log(print_r($oauth->getLastResponseInfo(), true));
    			//exit;
    		}
            
        }
        
        
        
        //$data = $this->getCommonData();
        $data['name'] = getAdminDetails();  /// admin_common_func helper
        $item_category = urldecode($id);        
        $data['category_list'] = stuller_fashion_cate_list($type, $filter_id, $item_category); // admin_common_func helper
        $data['brandoptions'] = $this->adminmodel->getWatchBrand();
        $data['view_type'] = $type;
        $data['filter_id_no'] = $filter_id;
        $data['category_id'] = $item_category;
        $this->session->unset_userdata('return_message');
        $item_id_list = $this->input->post('item_id_list');
        
        if( !empty($item_id_list) && count($item_id_list) > 0 ) {
            $this->jcartwfashionmodel->uploadItemPhotoGallery($item_id_list);
        }
        
        if ( isadminlogin() ) {
            if ($action == 'delete') {
                    $ret = $this->adminmodel->qualitygold($_POST, $action, $id);
                    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                    header("Cache-Control: no-cache, must-revalidate");
                    header("Pragma: no-cache");
                    header("Content-type: text/x-json");
                    $json = "";
                    $json .= "{\n";
                    $json .= "total: " . $ret['total'] . ",\n";
                    $json .= "}\n";
                    echo $json;
            } else {
                    if ($action == 'add' || $action == 'edit') {
                            if (isset($_POST['btn'])) {
                                    $ret = $this->adminmodel->qualitygold($_POST, $action, $id);
                                    $data['details'] = $_POST;
                                    if ($ret['error'] == '')
                                    $data['success'] = $ret['success'];
                            }
                            $data['extraheader'] .= $this->commonmodel->addEditor('simple');
                            if ($action == 'edit') {
                                    $data['details'] = $this->adminmodel->getqualitygoldByID($id);
                                    $details = $data['details'];
                                    $data['id'] = $id;
                            }
                    }
            }
                $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function() {
         $(this).css({backgroundImage:"url(' . SITE_URL . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
         $(this).siblings().css({backgroundImage:"url(' . SITE_URL . 'images/plus.jpg)"});
                });
                $("#rapnet").click();
                ';
                
                $link_strings = $type.'/' . $filter_id . '/' . $item_category;
                $url = SITE_URL . 'jcartw_fashion_jewelry/getCollectionListings/' . $action . '/' . $link_strings;
                $data['action'] = $action;
                $data['onloadextraheader'] .= "  var actionview = '".$action."';
                var home_link = '".SITE_URL . 'jcartw_fashion_jewelry/heart_collection_items/view/' . $link_strings."';
                var photo_gallery_link = '".SITE_URL . 'jcartw_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';
function amazonGaleryBtn() {
    window.location = '" . SITE_URL . "jcartw_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';
}

if(actionview == 'photogallery' || actionview == 'amazongallery') {
    $(\"#results\").flexigrid
        (
        {   	 							
        url: '" . $url . "',
        dataType: 'json',
        colModel : [
                {display: 'ID', name : 'lot', width : 140, sortable : true, align: 'center'},
                {display: 'Certificate Image', name : 'price', width : 90, sortable : true, align: 'left'},
                {display: 'Shape image', name : 'shape', width : 90, sortable : true, align: 'center'},
                {display: 'Image2', name : 'ebay_img2', width : 110, sortable : true, align: 'center'},
                {display: 'Image3', name : 'ebay_img3', width : 110, sortable : true, align: 'center'},
                {display: 'Image4', name : 'ebay_img4', width : 110, sortable : true, align: 'center'},
                {display: 'Image5', name : 'ebay_img5', width : 110, sortable : true, align: 'center'},
                {display: 'Image6', name : 'ebay_img6', width : 110, sortable : true, align: 'center'}
                ],
                 buttons : [	{name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn}, {name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},
                                {separator: true}
                        ],
        searchitems : [
                    {display: 'Item Number', name : 'id', isdefault: true},
                    {display: 'Item Category', name : 'MerchandisingCategory3', isdefault: true}
                    ],		
        sortname: \"productID\",
        sortorder: \"ASC\",
        usepager: true,
        title: '<h1 class=\"pageheader\">Stuller Fashoin Jewelery Ebay Items</h1>',
        useRp: true,
        rp: 50,
        showTableToggleBtn: false,
        width:1020,
        height: 565
        }
        );
} else {
    $(\"#results\").flexigrid
        (
        {   	 							
                    url: '" . $url . "',
                    dataType: 'json',
                    colModel : [
                    {display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},
                    {display: 'ebay ID', name : 'ebayid', width : 80, sortable : true, align: 'center'},
                    {display: 'Category', name : 'category', width : 100, sortable : true, align: 'center'},
                    {display: 'Item Name', name : 'product_name', width : 125, sortable : true, align: 'center'},
                    {display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},				
                    {display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},
                    {display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},
                    {display: 'Center Carat', name : 'center_weight', width : 90, sortable : false, align: 'left'},
                    {display: 'Side Carat', name : 'side_weight', width : 80, sortable : false, align: 'left'},
                    {display: 'Clarity', name : 'clarity', width : 120, sortable : false, align: 'left'},
                    {display: 'Color', name : 'color', width : 80, sortable : false, align: 'left'},
                    {display: 'Diamond Cert', name : 'color', width : 80, sortable : false, align: 'left'},
                    {display: 'Cert #', name : 'certificate_no', width : 100, sortable : false, align: 'left'},
                    {display: 'Item ID', name : 'item_id', width : 120, sortable : false, align: 'left'},
                    {display: 'Set. Type', name : 'setting_type', width : 106, sortable : false, align: 'left'}	
                    ],
                 buttons : [	{name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},
                                {separator: true}
                        ],
        searchitems : [
                    {display: 'Item Number', name : 'productID', isdefault: true}
                    ], 		
        sortname: \"productID\",
        sortorder: \"ASC\",
        usepager: true,
        title: '<h1 class=\"pageheader\">Watches Ebay Items</h1>',
        useRp: true,
        rp: 50,
        showTableToggleBtn: false,
        width:1020,
        height: 565
        }
        );
}


function homeBtn() {
    window.location = home_link;
}
function submitGalry() {
    document.getElementById('rapnetstones').submit();
}
function galeryBtn() {
    window.location = photo_gallery_link;
}
        function test(com,grid)
        {   
            var idlist = $(\".bookid:checked\").map(
                 function () {return this.value;}).get().join(\",\");
                 var ttcount = $(\".bookid:checked\").length;
                 var itemlist ='';
                
            if (com=='Delete' || com=='Revise')
                { 

                    if($('.trSelected').length>0 || idlist != ''){
                    var totalItem = (idlist != '' ? ttcount : $('.trSelected').length );
                    
                        if(confirm(com+' ' + totalItem + ' rows?')){
                         if(idlist != '') {
                            itemlist = idlist;
                        } else {
                            var items = $('.trSelected');
                            
                            for(i=0;i<items.length;i++){
                                    itemlist+= items[i].id.substr(3)+\",\";
                            }
                        }
                        
                if(com=='Revise') {
                    $(\".ebayExportResponse\").html('Revise Item is processing plz wait!!').show();
                    
                    $.ajax({
                                type: \"POST\",
                                url: \"" . SITE_URL . "send_itemjewelry_to_ebay/revise_bulkitem_jewelry_toebay/\",
                                data: \"items=\"+itemlist,
                                success: function(data){
                                     //alert('Total Revised rows: '+data.total);
                                     //$.facebox('<div>'+data+'</div>');
                                     $(\".ebayExportResponse\").html(data).show();
                                 //$(\"#results\").flexReload();
                                },
                                error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
                              });
                              
                } else {
                        $.ajax({
                                type: \"POST\",
                                dataType: \"json\",
                                url: \"" . SITE_URL . "admin/rapnetDiamondsSearch/Delete\",
                                data: \"items=\"+itemlist,
                                success: function(data){
                                     alert('Total Deleted rows: '+data.total);
                                 $(\"#results\").flexReload();
                                },
                                error: function(x,e){  alert(x.status +  e + itemlist + x.responseText); }
                              });
                }                                                                                                                                                            }
        } else{
                alert('You have not selected a row.');
        } 
    }
        else if (com=='Add')
                {
                        window.location = '" . SITE_URL . "admin/loosediamonds/add';
                }			
}";
                
                $data['extraheader'] = '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';
                $data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
                $output = $this->load->view('admin/jcartw_fashionjew_admin_listing', $data, true);
                output_page($output, $data);  /// admin_common_func helper
        } else {
                $output = $this->load->view('admin/login', $data, true);
                output_page($output, $data); /// admin_common_func helper
        }
    }
    
    //// view unique ring detail
    function stuller_items_detail($prod_id = 0, $type='') {
        $data['name'] = getAdminDetails(); /// admin_common_func helper
        if ( isadminlogin() ) {
            
            $data['return_msg'] = $this->session->userdata('return_message');
            $rowsring = $this->jcartwfashionmodel->getStullerItemDetailViaID($prod_id);  //print_ar($rowsring); exit();
            $imgs_rows = stuller_imglinks_list($rowsring); /// item jewelry section helper
            $data['rowsring'] = $rowsring;
            $data['view_type'] = $type;
            $data['extraheader'] = '<link type="text/css" rel="stylesheet" href="'.SITE_URL.'css/home_style.css" />';
            $data['ringtitle'] = $rowsring['productName'];
            $data['title'] = $data['productName'];
            $data['ringimg']   = $imgs_rows[0];
            $data['item_img_list'] = $this->getStullerItemsImgLists($imgs_rows, $data['productName']);
            $data['setingtype']   = $rowsring['brand'];
            $data['maincate_name'] = $rowsring['brand'];
            $data['retail_price'] = $rowsring['price1'] * RETAIL_PERCENT;
            $data['saving_percent'] = ( 100 - ( ( $rowsring['priceRetail'] / $data['retail_price'] ) * 100 ) );
            $data['item_details_list'] = jcart_watch_item_details_rows( $rowsring );

                $output = $this->load->view('admin/jcartw_fashionjew_item_detail', $data, true);
                output_page($output, $data); /// admin_common_func helper
        } else {
                $output = $this->load->view('admin/login', $data, true);
                output_page($output, $data); /// admin_common_func helper
        }
    }
    
    //// download img of HD rings item
    function download_hdrings_imgs() {
         $results = $this->jcartwfashionmodel->getCollectionJewListing('HD', 0, '', 1, 200, 'id', 'DESC', '', 'id');
        $img_list = '';
        $i = 1;
        
        foreach ($results['result'] as $row) {
            $item_image = $this->jewelry_item_img( $row['id'] );
            $img_list .= '<div>Item ID: '.$row['id'].' = <img src="'.$item_image . '" alt="" width="200" /><br><a href="'.$item_image.'">Download Image</a></div>';
            
            $i++;            
        }
        
        echo $img_list;
        
    } 
    //// collection item img
    function getStullerItemsImgLists($results=0, $product_title='') {
        $item_image = '';
        
        if( count($results) > 0 ) {
            foreach( $results as $imglink ) {                
                $item_image .= '<div class="set_detail_imgcol"><img src="'.$imglink.'" alt="'.$product_title.'" width="200" /></div>';    
            }
        } else {
            $item_image .= '<div><img src="'.SITE_URL . 'images/cert/12_541_no_image_thumb.gif" alt="'.$product_title.'" width="200" /></div>';
        }
        return $item_image;
    }
        
    function jewelry_item_img($item_id=0) {
        $item_img = $this->jcartwfashionmodel->get_item_imgs( $item_id );
        
        $item_image = '';
        
        foreach( $item_img as $rowimg ) {
            if( !empty($rowimg['image']) ) {
                $img_path_hd = SITE_URL . $rowimg['image'];
                $img_path = HEART_LINK . $rowimg['image'];
                $erphd_img = ERPHD_LINK . $rowimg['image'];
                
                if( getimagesize($img_path_hd) ) {
                    $item_image = $img_path_hd;
                    break;
                }
                
                if( getimagesize($erphd_img) ) {
                    $item_image = $erphd_img;
                    break;
                }
                
                if( getimagesize($img_path) ) {
                    $item_image = $img_path;
                    break;
                }
            }
        }
        
        if( !empty($item_image) ) {
            $ring_item_img = $item_image;
        } else {
            $ring_item_img = SITE_URL . 'images/cert/12_541_no_image_thumb.gif';
        }
          
        return $ring_item_img;
    }
    
    function item_img_view_type() {
        
        $results = $this->jcartwfashionmodel->getCollectionJewListing('ERPHD', 0, '', 1, 1000);
        $item_id = '';
        
        foreach( $results['result'] as $rows ) {
            $img_link = ''; //$this->jewelry_item_img( $rows['id'] );
            
            $item_id .= $rows['id'] . ' = ' . $img_link . '<br>';
        }
        echo $item_id;
    }
    
    ////
    function update_market_id($item_id=0, $item_field='', $field_id=0) {
        
        $this->jcartwfashionmodel->updateMarketID($item_id, $item_field, $field_id);
        
    }
	function getCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='') {
            $page = isset($_POST['page']) ? $_POST['page'] : 0;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
            $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'productID';
            $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
            $query = isset($_POST['query']) ? $_POST['query'] : '';
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
            $results = $this->jcartwfashionmodel->getStullerItemRows($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype);
            $delink_url = SITE_URL.'admin/deleteShapeLink/';
            //print_ar($results);
            
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
            header("Cache-Control: no-cache, must-revalidate");
            header("Pragma: no-cache");
            header("Content-type: text/x-json");
            $json = "";
            $json .= "{\n";
            $json .= "page: $page,\n";
            $json .= "total: " . $results['count'] . ",\n";
            $json .= "rows: [";
            $rc = false;
            $i = 0;
            //$popup_img = '';
            //print_r($results['result']);
            foreach ($results['result'] as $row) {
                $items_image = stuller_fashionjew_imgs( $row['Images'] );  
                /// item jewelry section helper
                $url = config_item('base_url');
                $item_image = $url . addslashes($row['thumb']); //$items_image[0];
                
                $prod_name = $row['Description'];
                $item_shape = '';
                //$this->get_center_idex_diamond($row['productID'], $item_shape);  /// update idex diamond
                //$feat_desc = str_replace(array("'", '`', '/'), '', $feat_detail['desc']);
                $detail_link = SITE_URL . "jcartw_fashion_jewelry/stuller_items_detail/" . $row['productID'];
                //$newTotalCarat = ( $item_detail['newdiamond_weight'] > 0 ? $item_detail['newdiamond_weight'] : $item_detail['diamond_weight'] );
                $newTotalCarat = '';
                $new_center_carat = '';
                $oldCertView = ''; //$this->setNewCertView( $item_detail['certificate'] );
                $newCertView = ''; //$this->setNewCertView( $item_detail['index_diamond_cert'] );
                if( $row['ebayid'] != '-2' ) {
                    $ebayLink = 'http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item='.$row['ebayid'];
                } else {
                    $ebayLink = '#';
                }
                $imgrow = $this->jcartwfashionmodel->getMoreItemImgList($row['productID']);
                $item_profit = ''; //$this->getIRingItemProfit($row['diamond_lot_id'], $row['Price'], $row['Price'], $row['Price']);
                $diamond_row = $this->jcartwfashionmodel->getIndexDiamondDetail($row['diamond_lot_id'], 'lot');
                $pk_id = $row['productID'];  /// primary key id
                
//                if( $row['id'] == 22 ) {
//                    $popup_img = '<div class="popup-gallery"><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_45.jpg"><img src="http://www.heartsanddiamonds.com/img/search_plus_ic.png" alt="" width="28"></a><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_90.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_45.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_90.jpg"></a></div>';
//                } else {
//                    $popup_img = '';
//                }
                //$rowother = array();
                $ebay_id   = 'ebay_'.$row['productID'];
                $amazon_id = 'amazon_'.$row['productID'];
                $sears_id  = 'sears_'.$row['productID'];
                $esty_id   = 'etsy_'.$row['productID'];
                $lst_id    = 'lst_'.$row['productID'];
                $ebay_h = 'ebay_h_'.$row['productID'];
                $ebay_c = 'ebay_c_'.$row['productID'];
                $amazon_h = 'amazon_h_'.$row['productID'];
                $amazon_c = 'amazon_c_'.$row['productID'];
                $sears_h = 'sears_h_'.$row['productID'];
                $sears_c = 'sears_c_'.$row['productID'];
                $esty_h = 'esty_h_'.$row['productID'];
                $esty_c = 'esty_c_'.$row['productID'];
                $lstdibbs_h = 'lstdibbs_h_'.$row['productID'];
                $lstdibbs_c = 'lstdibbs_c_'.$row['productID'];
                //$check_box_class = ( !empty($row['ebay_field']) ? 'class=\"bookid\"' : 'class=\"bookid_new\"' );
                $check_box_class = 'class=\"bookid\"';
                
                if ($rc )
                    
                $json .= ",";
                $json .= "\n {";
                
            $json .= "id:'" . $row['productID'] . "',";
            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['productID']."\" />ID #: " . $row['productID'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" . $detail_link . "/view\'  class=\"edit\" style=\"font-weight:bold;\">View Details</a><br>"
                        . "<table class=\"set_ckbox_table\">"
                        . "<tr><td>&nbsp;</td><th>H</th><th>C</th></tr>"
                        . "<tr>"
                        . "<td><input type=\"checkbox\" name=\"cb_ebay\" ".checkedBox($ebay_id, $row['ebay_field'])." id=\"".$ebay_id."\" onclick=\"update_market_id(\'".$row['productID']."\', \'".$ebay_id."\', \'ebay_field\')\" /><label for=\"".$ebay_id."\" class=\"set_lable\">Ebay</label></td>"
                        . "<th><input type=\"checkbox\" name=\"ebay_h\" id=\"".$ebay_h."\" value=\"".$ebay_h."\" ".checkedBox($ebay_h, $row['ebay_h'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$ebay_h."\', \'ebay_h\')\" /></th>"
                        . "<th><input type=\"checkbox\" name=\"ebay_c\" id=\"".$ebay_c."\" value=\"".$ebay_c."\" ".checkedBox($ebay_c, $row['ebay_c'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$ebay_c."\', \'ebay_c\')\" /></th>"
                        . "</tr>"
                        . "<tr>"
                        . "<td><input type=\"checkbox\" name=\"cb_amzon\" ".checkedBox($amazon_id, $row['amazon_field'])." id=\"".$amazon_id."\" onclick=\"update_market_id(\'".$row['productID']."\', \'".$amazon_id."\', \'amazon_field\')\" /><label for=\"".$amazon_id."\" class=\"set_lable\">Amazon</label></td>"
                        . "<th><input type=\"checkbox\" name=\"amazon_h\" id=\"".$amazon_h."\" value=\"".$amazon_h."\" ".checkedBox($amazon_h, $row['amazon_h'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$amazon_h."\', \'amazon_h\')\" /></th>"
                        . "<th><input type=\"checkbox\" name=\"amazon_c\" id=\"".$amazon_c."\" value=\"".$amazon_c."\" ".checkedBox($amazon_c, $row['amazon_c'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$amazon_c."\', \'amazon_c\')\" /></th>"
                        . "</tr>"
                        /*. "<tr>"
                        . "<td><input type=\"checkbox\" name=\"cb_sears\" ".checkedBox($sears_id, $row['sears_field'])." id=\"".$sears_id."\" onclick=\"update_market_id(\'".$row['productID']."\', \'".$sears_id."\', \'sears_field\')\" /><label for=\"".$sears_id."\" class=\"set_lable\">Sears</label></td>"
                        . "<th><input type=\"checkbox\" name=\"sears_h\" id=\"".$sears_h."\" value=\"".$sears_h."\" ".checkedBox($sears_h, $row['sears_h'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$sears_h."\', \'sears_h\')\" /></th>"
                        . "<th><input type=\"checkbox\" name=\"sears_c\" id=\"".$sears_c."\" value=\"".$sears_c."\" ".checkedBox($sears_c, $row['sears_c'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$sears_c."\', \'sears_c\')\" /></th>"
                        . "</tr>"*/
                        . "<tr>"
                        . "<td><input type=\"checkbox\" name=\"cb_esty\" ".checkedBox($esty_id, $row['esty_field'])." id=\"".$esty_id."\" onclick=\"update_market_id(\'".$row['productID']."\', \'".$esty_id."\', \'esty_field\')\" /><label for=\"".$esty_id."\" class=\"set_lable\">Etsy</label></td>"
                        . "<th><input type=\"checkbox\" name=\"esty_h\" id=\"".$esty_h."\" value=\"".$esty_h."\" ".checkedBox($esty_h, $row['esty_h'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$esty_h."\', \'esty_h\')\" /></th>"
                        . "<th><input type=\"checkbox\" name=\"esty_c\" id=\"".$esty_c."\" value=\"".$esty_c."\" ".checkedBox($esty_c, $row['esty_c'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$esty_c."\', \'esty_c\')\" /></th>"
                        . "</tr>"
                        . "<tr>"
                        . "<td><input type=\"checkbox\" name=\"cb_lst\" ".checkedBox($lst_id, $row['lst_field'])." id=\"".$lst_id."\" onclick=\"update_market_id(\'".$row['productID']."\', \'".$lst_id."\', \'lst_field\')\" /><label for=\"".$lst_id."\" class=\"set_lable\">1stdibbs</label></td>"
                        . "<th><input type=\"checkbox\" name=\"1stdibbs_h\" id=\"".$lstdibbs_h."\" value=\"".$lstdibbs_h."\" ".checkedBox($lstdibbs_h, $row['1stdibbs_h'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$lstdibbs_h."\', \'1stdibbs_h\')\" /></th>"
                        . "<th><input type=\"checkbox\" name=\"1stdibbs_c\" id=\"".$lstdibbs_c."\" value=\"".$lstdibbs_c."\" ".checkedBox($lstdibbs_c, $row['1stdibbs_c'])." onclick=\"update_market_id(\'".$row['productID']."\', \'".$lstdibbs_c."\', \'1stdibbs_c\')\" /></th>"
                        . "</tr>"
                        . "<tr>"
                        . "</table>'";
                
        if($action == 'photogallery') {
            $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";    
            $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";  
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['ebay_img2']) . '<input type="file" name="eb2_'.$pk_id.'" />' ) . "'";
            //// getMarketMoreImgView in item_jewelry_section helper
            
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['ebay_img3']) . '<input type="file" name="eb3_'.$pk_id.'" />' ) . "'";
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['ebay_img4']) . '<input type="file" name="eb4_'.$pk_id.'" />' ) . "'";
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['ebay_img5']) . '<input type="file" name="eb5_'.$pk_id.'" />' ) . "'";
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['ebay_img6']) . '<input type="file" name="eb6_'.$pk_id.'" />' ) . "'";
      } else if($action == 'amazongallery') {
            $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";
            $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img2']) . '<input type="file" name="amazon2_'.$pk_id.'" />' ) . "'";
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img3']) . '<input type="file" name="amazon3_'.$pk_id.'" />' ) . "'";
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img4']) . '<input type="file" name="amazon4_'.$pk_id.'" />' ) . "'";
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img5']) . '<input type="file" name="amazon5_'.$pk_id.'" />' ) . "'";
            $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img6']) . '<input type="file" name="amazon6_'.$pk_id.'" />' ) . "'";
                    
                } else {
                $ringPrice = $row['price1']; //check_empty($row['ring_price'], $row['price']);
                $check_cate = strchr($cate_id, 'Cross');
                if( empty($check_cate) ) {
                    $semi_label = '';
                } else {
                    
                    $semi_label = 'Semi ';
                }
                
                $total_ring_diamond_price = $ringPrice; //$ringPrice + $diamond_row['price'];
                $center_carat_weight = $row['Weight'];
                
                $diamond_detail = '';
                $update_center_diamond = '';
                
                $json .= ",'" . addslashes($row['ebayid']) . " '";
                $json .= ",'" . addslashes($row['MerchandisingCategory3']) . " '";
                $json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>"
                        . "<input type=\"text\" name=\"jitem_price\" id=\"jitem_price_".$row['productID']."\" onkeyup=\"update_jitem_price(\'".$row['productID']."\')\" class=\"set_carat_field\" value=\"$"._nf($total_ring_diamond_price, 2)."\" />'";
                $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''
                        .  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['productID']."\">View Image</a>"
                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['productID']."\">View Video</a>'";
                
                //$json .= ",'" . addslashes($row['id']) . " '";
                $json .= ",'" . addslashes($semi_label.' $' . _nf($row['price1'], 2)) . " <br>"
                        . "<input type=\"text\" name=\"price_box\" id=\"price_box_".$row['productID']."\" onkeyup=\"update_jcarat_price(\'".$row['productID']."\')\" class=\"set_carat_field\" value=\"".round($row['price1'], 2)."\" />'";
                /*$json .= ",'<input type=\"text\" name=\"videos_link[]\" id=\"video_".$row['id']."\" onkeyup=\"update_jewitem_value(\'".$row['id']."\')\" class=\"set_link_field\" value=\"".$row['embed_link']."\" />'";*/
                //<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#centermodel_".$row['id']."\">Find Center <br>Diamond</a>
                $json .= ",'" . addslashes($row['Weight'] . '<br><b>Total Carat</b><br>' . $newTotalCarat) . ""
                        . "<br><a href=\"".$detail_link."/view\">View Details</a>"
                        . $this->get_jewelry_imgview_model($row['productID'], $item_image, $prod_name).""
                        . $this->get_video_model_block($row['productID'], $row['embed_link'], $prod_name).""
                        . $this->get_similar_jewelry_list($row['productID'], $item_shape, $row['price1'], $prod_name).""
                        . $this->find_center_diamond_list($row['productID'], $item_shape, $row['price1']) . "'";
                
                $json .= ",'<b>Total Carat</b><br><input type=\"text\" name=\"center_carat\" id=\"ctcarat_".$row['productID']."\" onkeyup=\"update_jcarat_value(\'".$row['productID']."\')\" class=\"set_carat_field\" value=\"".$center_carat_weight."\" /><br>"
                        . $diamond_detail.""
                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#mymodel_".$row['productID']."\">Change Center <br>Diamond</a>"
                        . "<br>".$update_center_diamond."'";
                $json .= ",'<input type=\"text\" name=\"side_carat\" id=\"scarat_".$row['productID']."\" onkeyup=\"update_jcarat_value(\'".$row['productID']."\')\" class=\"set_carat_field\" value=\"".$item_detail['semi_mount_weight']."\" />'";
                $json .= ",'" . addslashes($row['clarity']) . " '";
                $json .= ",'" . addslashes($row['color']) . " '";
                $json .= ",'" . addslashes($row['Cert']) . " '";
                
                $json .= ",'" . addslashes($row['Weight'] . '<br>' . $oldCertView) . " '";
                $json .= ",'" . addslashes($row['Sku']) . " '";
                $json .= ",'" . addslashes($row['productType']) . " '";
                
                }
                
                $json .= "]";
                $json .= "}";
                $rc = true;
                $i = $i + 1;
            }
            $json .= "]\n";
            $json .= "}";
            echo $json;
	}
        
    function getIRingItemProfit($diamondID=0, $newPrice=0, $ring_price=0, $orignalPrice=0) {
        $ring_profit = 0;
        $newRingPrice = ( $newPrice > 0 ? $newPrice : $orignalPrice );
        
        if( $diamondID > 0 ) {
            $results = $this->jcartwfashionmodel->getIndexDiamondDetail($diamondID, 'lot');
            $ring_profit = $newRingPrice - ( $ring_price + $results['price'] );
            $profit_with_diamond = $ring_profit + ( $results['price'] * 0.10 );
        } else {
            $ring_profit = $newRingPrice - $ring_price;
            $profit_with_diamond = '';
        }
        
        $returns['ring_profit'] = $ring_profit;
        $returns['profit_with_diamond'] = $profit_with_diamond;
        
        return $returns;
    }
    
    function find_center_diamond_list($id=0, $item_shape='', $item_price='') {
                
        $model_view = '<div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"centermodel_'.$id.'\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"> \
                            <div class=\"modal-dialog\"> \
                              <div class=\"modal-content\"> \
                                    <div class=\"modal-header\" style=\"width: 100% !important;\"> \
                                      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button> \
                                      <h4 class=\"modal-title\" id=\"myModalLabel\" style=\"text-align:left;\">Find Center Diamond List</h4> \
                                    </div> \
                                    <div class=\"modal-body\"> \
                                    <div class=\"carat_field_row\"><span class=\"carat_label\">Enter Diamond Carat :</span> \
                                    <span class=\"carat_field\"><input type=\"text\" min=\"0\" name=\"diamond_carat\" id=\"diamond_carats_'.$id.'\" /></span><span><input type=\"button\" onclick=\"findCenterDiamondList('.$id.', '.$item_price.')\" value=\"Select Diamond\" min=\"0\" name=\"submit_carat\" id=\"submit_carat\" /></span><input type=\"hidden\" id=\"diamond_shape_'.$id.'\" value=\"'.$item_shape.'\" /></div> \\';
        
                            $model_view .= '<div id=\"viewErorMsg\"></div> \
                                        <div id=\"center_list_'.$id.'\"> \\';
                        
                            $model_view .= '</div> \
                                      <br> \
                                    </div> \
                              </div> \
                            </div> \
                    </div> \ ';

        //echo $model_view;
        return ''; //$model_view;
    }
    
    function getCenterDiamondViaCaratSearch($item_id=0, $item_shape='', $itemPrice=0, $itemCarat=0, $minprice=0, $maxprice=0) {  
        $items_carat = trim($itemCarat);
        $mcarat   = ( !empty($_GET['mincarat']) ? $_GET['mincarat'] : 0 );
        $maxcarat = ( !empty($_GET['maxcarat']) ? $_GET['maxcarat'] : 0 );
        //$dm_color = ( !empty($_GET['dm_color']) ? $_GET['dm_color'] : 0 );
        //$dm_clarity = ( !empty($_GET['dm_clarity']) ? $_GET['dm_clarity'] : 0 );
        $itemdetail = $this->jcartwfashionmodel->getItemDetailViaID($item_id);
        
        $results = $this->jcartwfashionmodel->getCenterDiamondFilterResults($_GET, $item_id, $item_shape, $itemPrice, $items_carat, $minprice, $maxprice, $mcarat, $maxcarat);
        $item_details = $this->jcartwfashionmodel->getItemSpecification($item_id, 'dev_ebay_details');
        $cert_list = array('EGL', 'GIA');
        
        if( in_array($item_details['diamond_cert'], $cert_list) ) {
            $diamond_certs = $item_details['diamond_cert'];
        } else {
            $diamond_certs = 'Diamond';
        }
        
        //print_ar($results);
        
        $model_view = '<table class="jewitem_table">
                        <tr>
                        <th>Item ID</th>
                        <th>Carat</th>
                        <th>Color</th>
                        <th>Cert</th>
                        <th>Cert #</th>
                        <th>Shape</th>
                        <th>Clarity</th>
                        <th>Price</th>
                        <th>Change</th>
                        <th>Profit</th>
                        <th>Profit with<br>Diamond</th>
                        </tr>';
        
        if( count($results) > 0 ) {
            foreach( $results as $rows ) {
                $unique_row_id = 'un_row_'.$rows['lot'];
                $item_profit = $this->getIRingItemProfit($rows['lot'], $itemdetail['new_price'], $itemdetail['ring_price'], $itemdetail['price']);
                
                $model_view .= '<tr id="'.$unique_row_id.'">
                        <td>'.$rows['lot'].'</td>
                        <td>'.$rows['carat'].'</td>
                        <td>'.$rows['color'].'</td>
                        <td>'.$rows['Cert'].'</td>
                        <td>'.$rows['Cert_n'].'</td>
                        <td>'.viewDmShape($rows['shape']).'</td>
                        <td>'.$rows['clarity'].'</td>
                        <td>US $' . _nf($rows['price'], 2) . '</td>
                        <td><a href="#javascript" onclick="change_item_diamondinfo('.$item_id.', '.$rows['uid'].', 1)">Change</a></td>
                        <td>US $' . _nf($item_profit['ring_profit'], 2) . '</td>
                        <td>US $' . _nf($item_profit['profit_with_diamond'], 2) . '</td>
                        </tr>';
                }
        } else {
            $model_view .= '<tr>
                    <td colspan="10"><b>No '.$diamond_certs.' is found we will now list all '.$diamond_certs.' for this color and clairity!</b></td>
                    </tr>';
        }
        
        $model_view .= '</table>';
        
        echo $model_view;
        
    }
    
    function get_video_model_block($id=0, $embed_link='', $prod_name='') {
        
        $model_view = '<div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"videomodel_'.$id.'\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"> \
                            <div class=\"modal-dialog\"> \
                              <div class=\"modal-content\"> \
                                    <div class=\"modal-header\" style=\"width: 100% !important;\"> \
                                      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button> \
                                      <h4 class=\"modal-title ringProdTitle\" id=\"myModalLabel\" style=\"text-align:left;\">Item: '.$prod_name.'</h4> \
                                    </div> \
                                    <div class=\"modal-body\"> \\';
        
        if( !empty($embed_link) && $embed_link != 'NULL' ) {
                $model_view .= '<div class=\"vide_view_block\">'.$embed_link.'</div> \\';
        } else {
            $model_view .= '<div><b>Jewelry Ring Item Embed Video Link has not Found!</b></div> \\';
        }
        
                            $model_view .= '<br> \
                                    </div> \
                              </div> \
                            </div> \
                    </div> \\';
                            
        return $model_view;
        
    }
    
    function stuller_imgview_model($id=0, $imgLink='', $prod_name='') {
        echo 'demo';
    }
    
    function get_jewelry_imgview_model($id=0, $imgLink='', $prod_name='') {
        
        $model_view = '<div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"jewelryimg_'.$id.'\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"> \
                            <div class=\"modal-dialog\"> \
                              <div class=\"modal-content\"> \
                                    <div class=\"modal-header\" style=\"width: 100% !important;\"> \
                                      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button> \
                                      <h4 class=\"modal-title ringProdTitle\" id=\"myModalLabel\" style=\"text-align:left;\">Item: '.$prod_name.'</h4> \
                                    </div> \
                                    <div class=\"modal-body\"> \\';
        
        if( !empty($imgLink) ) {
                $model_view .= '<div class=\"vide_view_block set_imgview\"><img src="'.$imgLink.'" alt=\"'.$prod_name.'\" /></div> \\';
        } else {
            $model_view .= '<div><b>Jewelry Ring Item Image has not Found!</b></div> \\';
        }
        
                            $model_view .= '<br> \
                                    </div> \
                              </div> \
                            </div> \
                    </div> \\';
                            
        return $model_view;
        
    }
    
    function get_similar_jewelry_list($id=0, $itemShape='', $item_price=0, $d_carat=0) {
        $results = $this->jcartwfashionmodel->getSimilarItemLists($id, $itemShape, $item_price); //print_ar($results);
        $itemdetail = $this->jcartwfashionmodel->getItemDetailViaID($id);
        $item_cate = urldecode($itemCate);
        $item_details = $this->jcartwfashionmodel->getItemSpecification($id, 'dev_ebay_details');
        $cert_list = array('EGL', 'GIA');
        
        if( in_array($item_details['diamond_cert'], $cert_list) ) {
            $diamond_certs = $item_details['diamond_cert'];
        } else {
            $diamond_certs = 'Diamond';
        }
                
        $model_view = '<div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"mymodel_'.$id.'\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"> \
                      <form name=\"taskForm\" id=\"taskForm\" method=\"post\"> \
                            <div class=\"modal-dialog\"> \
                              <div class=\"modal-content\"> \
                                    <div class=\"modal-header\" style=\"width: 100% !important;\"> \
                                      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button> \
                                      <h4 class=\"modal-title\" id=\"myModalLabel\" style=\"text-align:left;\">Change the Jewelry Diamond</h4> \
                                    </div> \
                                    <div class=\"modal-body\"> \\';
        
                            $model_view .= '<div id=\"view_mesage_'.$id.'\"></div> \
                                <div class=\"carat_field_row\"><span class=\"carat_label\">Enter Price Range :</span> \
                                    <span class=\"carat_field\"><input type=\"text\" min=\"0\" name=\"diamond_minprice\" placeholder=\"Enter Min. Price\" id=\"diamond_minprice_'.$id.'\" /></span>&nbsp;&nbsp;&nbsp;<span class=\"carat_field\"><input type=\"text\" placeholder=\"Enter Max. Price\" min=\"0\" name=\"diamond_maxprice\" id=\"diamond_maxprice_'.$id.'\" /></span><span><input type=\"button\" onclick=\"findCenterDiamondListViaPrice('.$id.', '.$item_price.', 1)\" value=\"Search Diamond\" min=\"0\" name=\"submit_carat\" id=\"submit_carat\" /></span><input type=\"hidden\" id=\"diamond_shape_'.$id.'\" value=\"'.$itemShape.'\" /><input type=\"hidden\" id=\"diamnd_carat_'.$id.'\" value=\"'.$d_carat.'\" /></div> \\';
                            $model_view .= '<div class=\"carat_field_row\"><span class=\"carat_label\">Enter Carat Range :</span> \
                                    <span class=\"carat_field\"><input type=\"text\" min=\"0\" name=\"diamond_mincarat\" placeholder=\"Enter Min. Carat\" id=\"diamond_mincarat_'.$id.'\" /></span>&nbsp;&nbsp;&nbsp;<span class=\"carat_field\"><input type=\"text\" placeholder=\"Enter Max. Carat\" min=\"0\" name=\"diamond_maxcarat\" id=\"diamond_maxcarat_'.$id.'\" /></span><span><input type=\"button\" onclick=\"findCenterDiamondListViaPrice('.$id.', '.$item_price.', 2)\" value=\"Search Diamond\" min=\"0\" name=\"submit_carat\" id=\"submit_carat\" /></span></div> \\';
                            $model_view .= '<div class=\"carat_field_row\"><span class=\"carat_label\">New Carat Diamond Search :</span> \
                                    <span class=\"carat_field\"><input type=\"text\" min=\"0\" name=\"new_mincarat\" placeholder=\"Enter Min. Carat\" id=\"new_mincarat_'.$id.'\" /></span>&nbsp;&nbsp;&nbsp;<span class=\"carat_field\"><input type=\"text\" placeholder=\"Enter Max. Carat\" min=\"0\" name=\"new_maxcarat\" id=\"new_maxcarat_'.$id.'\" /></span><span><input type=\"button\" onclick=\"findCenterDiamondListViaPrice('.$id.', '.$item_price.', 3)\" value=\"Search Diamond\" min=\"0\" name=\"submit_carat\" id=\"submit_carat\" /></span></div> \\';
                            $model_view .= '<div class=\"carat_field_row\"><span class=\"carat_label\">New Price Diaomnd Search :</span> \
                                    <span class=\"carat_field\"><input type=\"text\" min=\"0\" name=\"new_minprice\" placeholder=\"Enter Min. Price\" id=\"new_minprice_'.$id.'\" /></span>&nbsp;&nbsp;&nbsp;<span class=\"carat_field\"><input type=\"text\" placeholder=\"Enter Max. Price\" min=\"0\" name=\"new_maxprice\" id=\"new_maxprice_'.$id.'\" /></span><span><input type=\"button\" onclick=\"findCenterDiamondListViaPrice('.$id.', '.$item_price.', 4)\" value=\"Search Diamond\" min=\"0\" name=\"submit_carat\" id=\"submit_carat\" /></span></div> \\';
                            $model_view .= '<div id=\"center_stone_list_'.$id.'\"> \
                                        <table class=\"jewitem_table\"> \
                                        <tr> \
                                        <th>Item ID</th> \
                                        <th>Carat</th> \
                                        <th>Color</th> \
                                        <th>Cert</th> \
                                        <th>Cert #</th> \
                                        <th>Shape</th> \
                                        <th>Clarity</th> \
                                        <th>Price</th> \
                                        <th>Change</th> \
                                        <th>Profit</th> \
                                        <th>Profit with <br>Diamond</th> \
                                        </tr> \\';
                        if( count($results) > 0 ) {
                            foreach( $results as $rows ) {
                                $item_profit = $this->getIRingItemProfit($rows['lot'], $itemdetail['new_price'], $itemdetail['ring_price'], $itemdetail['price']);
                                
                                $unRowID = 'uns_row_'.$rows['uid'];
                                $model_view .= '<tr id=\"'.$unRowID.'\"> \
                                        <td>'.$rows['lot'].'</td> \
                                        <td>'.$rows['carat'].'</td> \
                                        <td>'.$rows['color'].'</td> \
                                        <td>'.$rows['Cert'].'</td> \
                                        <td>'.$rows['Cert_n'].'</td> \
                                        <td>'.viewDmShape($rows['shape']).'</td> \
                                        <td>'.$rows['clarity'].'</td> \
                                        <td>US $' . _nf($rows['price'], 2) . '</td> \
                                        <td><a href=\"#javascript\" onclick=\"change_item_diamondinfo('.$id.', '.$rows['uid'].', 2)\">Change</a></td> \
                                        <td>$ '._nf($item_profit['ring_profit'], 2).'</td> \
                                        <td>$ '._nf($item_profit['profit_with_diamond'], 2).'</td> \
                                        </tr> \\';
                                }
                        } else {
                            $model_view .= '<tr> \
                                <td colspan=\"11\"><b>No '.$diamond_certs.' is found we will now list all '.$diamond_certs.' for this color and clairity!</b></td> \
                                    </tr> \\';
                        }
                            $model_view .= '</table> \
                                        </div> \
                                      <br> \
                                    </div> \
                              </div> \
                            </div> \
                      </form>\
                    </div> \ ';

        //echo $model_view;
        return $model_view;
    }
    
    //// update the items diamond info
    function changeItemDiamondInfo($itemID=0, $diamondID=0) {
        
        $this->jcartwfashionmodel->updateItemDMInfo($itemID, $diamondID);
        
        echo 'Item Diamond info has changed successfully!';
        
    }
    
    //// update the items diamond info
    function update_jitems_price($itemID=0, $items_price=0) {
        $item_price = str_replace(array('$', ','), '', $items_price);
        $this->jcartwfashionmodel->updateJewelryItemPrice($itemID, $item_price);
        
    }
        
    function update_jewelry_item($id=0) {
       $embed_value = urldecode( $this->input->get('embed_value') );

       $this->jcartwfashionmodel->updateJewelryItemEmbedLink($id, $embed_value);
    }
    
    function update_jewcarat_value($id=0) {
       $center_carat = $this->input->get('center_carat');
       $side_carat   = $this->input->get('side_carat');

       $this->jcartwfashionmodel->updateJewItemCarat($id, $center_carat, $side_carat);
    }
    
    function update_item_newprice($id=0, $newprice=0) {

       $this->jcartwfashionmodel->updateNewPrice($id, $newprice);
       
    }
    
    function updateJewelryItemIDWithRandomNumber() {
        $this->jcartwfashionmodel->update_item_detail_itemid();
        
        echo 'Item ID has updated Successfully!';
    }
}