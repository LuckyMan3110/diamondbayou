<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Engagement_rings_fashion_jewelry extends CI_Controller {
    //private $totalEmails;
    function __construct() {
        parent::__construct();
		$this->load->helper('admin_libs');
        $this->load->helper('admin_common_func');
        $this->load->helper('admin_mainmenu');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('item_jewelry_section');
        $this->load->model('Adminmodel','adminmodel');
        $this->load->model('User','user');
        $this->load->model('Sitepaging','sitepaging');
        $this->load->model('Commonmodel','commonmodel');
        $this->load->model('Davidsternmodel','davidsternmodel');
        $this->load->model('Catemodel','catemodel');
        $this->load->model('Stullerfashionmodel','stullerfashionmodel');
        $this->load->model('Engagement_rings_fashionmodel','engagement_rings_fashionmodel');

        $cu = current_url();
        $url = explode('/', $cu);
        $uri = ( isset($url[4]) ? $url[4] : '' );
        $this->session->set_userdata('pages_name', $uri);
    }
    
    function index() {
        die('You are not allowed to access this page directly!');
    }
        
    function get_center_idex_diamond($id=0, $shape='B') {
        $rows = $this->engagement_rings_fashionmodel->updateIdexCenterDiamondToItem($id, $shape);
    }
    //http://market.heartsanddiamonds.com/stuller_fashion_jewelry/heart_collection_items/view/ERPHD/320
    
    function stuller_engagement_rings_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {
        require_once(APPPATH.'libraries/vendor/autoload.php');
        //session_start();
        if( isset($_POST['authentication_submit']) ){
            
            $oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2');
            $req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", "https://yadegardiamonds.com/engagement_rings_fashion_jewelry/stuller_engagement_rings_listing/view/engagement_rings/".$filter_id."", "GET");
            $_SESSION['aman']= $req_token['oauth_token_secret'];
            header('Location:'.$req_token['login_url']);
        } 
        
        if( isset($_GET['oauth_token']) AND isset($_GET['oauth_verifier']) ){
            
            $_SESSION['oauth_token']        = $_GET['oauth_token'];
            $_SESSION['oauth_token_secret'] = $_SESSION['aman'];
            
            //echo $_SESSION['oauth_token_secret']; exit();
            
            $request_token = $_GET['oauth_token'];
            $request_token_secret = $_SESSION['aman']; 
            $verifier = $_GET['oauth_verifier']; 
            $oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2');
            $oauth->setToken($request_token, $request_token_secret);
            
            try {
                $acc_token = $oauth->getAccessToken("https://openapi.etsy.com/v2/oauth/access_token", null, $verifier, "GET");
                $_SESSION['oauth_token']=$access_token = $acc_token['oauth_token'];// get from db
        		$_SESSION['oauth_token_secret']=$access_token_secret = $acc_token['oauth_token_secret'];// get from db
        		$oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2', OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
        		$oauth->setToken($access_token, $access_token_secret);
            		
        		
        		try {
        			$oauth_data = $oauth->fetch("https://openapi.etsy.com/v2/users/__SELF__", null, OAUTH_HTTP_METHOD_GET);
        			$json = $oauth->getLastResponse();
        			//echo "<pre>"; 
        		} catch (OAuthException $e) {
        			//error_log($e->getMessage());
        			//error_log(print_r($oauth->getLastResponse(), true));
        			//error_log(print_r($oauth->getLastResponseInfo(), true));
        			print_r($e->getMessage(), true);
        			print_r($oauth->getLastResponse(), true);
        			print_r($oauth->getLastResponseInfo(), true);
        			exit();
        		}
            
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully Authenticated')
                window.location.href='https://yadegardiamonds.com/engagement_rings_fashion_jewelry/stuller_engagement_rings_listing/view/engagement_rings/'.$filter_id;
                </SCRIPT>");
            
            }catch (OAuthException $e) {
                //echo 'd3';
    			//error_log($e->getMessage());
    			//error_log(print_r($oauth->getLastResponse(), true));
    			//error_log(print_r($oauth->getLastResponseInfo(), true));
    			//print_r($e->getMessage(), true);
    			//print_r($e->getLastResponse(), true);
    			//print_r($e->getLastResponseInfo(), true);
    			//exit();
    		}
            
        }
        
        
        //$data = $this->getCommonData();
        $data['name'] = getAdminDetails();  /// admin_common_func helper
        $item_category = urldecode($id);     
        $item_sub_category = urldecode($sub_id);     
        $data['category_list'] = stuller_fashion_cate_list($type, $filter_id, $item_category); // admin_common_func helper
        $data['view_type'] = $type;
        $data['item_sub_category'] = $item_sub_category;
        $data['filter_id_no'] = $filter_id;
        $data['category_id'] = $item_category;
        $this->session->unset_userdata('return_message');
        $item_id_list = $this->input->post('item_id_list');
        
        if( !empty($item_id_list) && count($item_id_list) > 0 ) {
            $this->engagement_rings_fashionmodel->uploadItemPhotoGallery($item_id_list);
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
                
                $link_strings = $type.'/'. $filter_id. '/'. $item_category. '/'. $item_sub_category;
                
                $url = SITE_URL . 'engagement_rings_fashion_jewelry/getCollectionListings/' . $action . '/' . $link_strings;
                
                
                $data['action'] = $action;
                $data['onloadextraheader'] .= "  var actionview = '".$action."';
                var home_link = '".SITE_URL . 'engagement_rings_fashion_jewelry/heart_collection_items/view/' . $link_strings."';
                var photo_gallery_link = '".SITE_URL . 'engagement_rings_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';
function amazonGaleryBtn() {
    window.location = '" . SITE_URL . "engagement_rings_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';
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
        sortname: \"stock_number\",
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
    jQuery(\"#results\").flexigrid(
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
                    {display: 'Style Group', name : 'style_group', width : 120, sortable : false, align: 'center'},
                    {display: 'Metal Weight', name : 'metal_weight', width : 90, sortable : false, align: 'left'},
                    {display: 'Stone Weight', name : 'stone_weight', width : 80, sortable : false, align: 'left'},
                    {display: 'Supplied Stones', name : 'supplied_stones', width : 120, sortable : false, align: 'left'}
                    ],
                 buttons : [	{name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},
                                {separator: true}
                        ],
        searchitems : [
                    {display: 'Item Number', name : 'stock_number', isdefault: true}
                    ], 		
        sortname: \"id\",
        sortorder: \"ASC\",
        usepager: true,
        title: '<h1 class=\"pageheader\">Jewelery Cart Jewelry Ebay Items</h1>',
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
                $output = $this->load->view('admin/stuller_engagement_rings_listing', $data, true);
                output_page($output, $data);  /// admin_common_func helper
        } else {
                $output = $this->load->view('admin/login', $data, true);
                output_page($output, $data); /// admin_common_func helper
        }
    }
    
    
    function getCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {
	    
	    
            $page = isset($_POST['page']) ? $_POST['page'] : 0;
            $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
            $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
            $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'name';
            $query = isset($_POST['query']) ? $_POST['query'] : '';
            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'id';
            $results = $this->engagement_rings_fashionmodel->getStullerItemRows($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);
            $delink_url = SITE_URL.'admin/deleteShapeLink/';
            //print_ar($results); exit();
            
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
                /*$items_image = stuller_fashionjew_imgs( $row['Images'] );
                $item_image = $items_image[0];
                
                if( !empty($row['jew_image_url']) ) {
                    $jewelry_img = addslashes($row['jew_image_url']);
                    $image_file_name = $row['jew_image_url'];
                } else {
                    if( $row['image1'] != '' ) {
                        $jewelry_img = SITE_URL . 'images/' . addslashes($row['image1']);
                        $image_file_name = $row['image1'];
                    } else {
                        if( file_exists('images/uploads/'.$row['item_sku'].'.jpg') ) {
                            $jewelry_img = SITE_URL.'images/uploads/'.addslashes($row['item_sku'].'.jpg');
                            $image_file_name = $row['item_sku'].'.jpg';
                        } else {
                            $jewelry_img = SITE_URL.'images/noimage_found_2.jpg';
                            $image_file_name = '';
                        }
                    }
                }*/
               
                
                $rowsring = $this->catemodel->getRingsDetailViaId($row['id']);
                //echo '<pre>'; print_r($rowsring);  exit();
                
                $item_image = SITE_URL.'scrapper/imgs/'.$rowsring['ImagePath'];
                
                $prod_name = $row['name'];
                $item_shape = '';
                //$this->get_center_idex_diamond($row['id'], $item_shape);  /// update idex diamond
                //$feat_desc = str_replace(array("'", '`', '/'), '', $feat_detail['desc']);
                $detail_link = SITE_URL . "engagement_rings_fashion_jewelry/stuller_items_detail_edit/" . $row['id'];
                $etsy_detail_link = SITE_URL . 'engagement_rings_fashion_jewelry/stuller_items_detail/'.$row['id'].'?sendTo=etsy';
                //$newTotalCarat = ( $item_detail['newdiamond_weight'] > 0 ? $item_detail['newdiamond_weight'] : $item_detail['diamond_weight'] );
                $newTotalCarat = '';
                $new_center_carat = '';
                $oldCertView = ''; //$this->setNewCertView( $item_detail['certificate'] );
                $newCertView = ''; //$this->setNewCertView( $item_detail['index_diamond_cert'] );
                if( $row['catid'] != '-2' ) {
                    $ebayLink = 'http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item='.$row['catid'];
                } else {
                    $ebayLink = '#';
                }
                $imgrow = $this->engagement_rings_fashionmodel->getMoreItemImgList($row['id']);
                $item_profit = ''; //$this->getIRingItemProfit($row['diamond_lot_id'], $row['Price'], $row['Price'], $row['Price']);
                $diamond_row = '';//$this->engagement_rings_fashionmodel->getIndexDiamondDetail($row['diamond_lot_id'], 'lot');
                $pk_id = $row['id'];  /// primary key id
                
//                if( $row['id'] == 22 ) {
//                    $popup_img = '<div class="popup-gallery"><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_45.jpg"><img src="http://www.heartsanddiamonds.com/img/search_plus_ic.png" alt="" width="28"></a><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_90.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_45.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_90.jpg"></a></div>';
//                } else {
//                    $popup_img = '';
//                }
                //$rowother = array();
                $ebay_id   = 'ebay_'.$row['id'];
                $amazon_id = 'amazon_'.$row['id'];
                $sears_id  = 'sears_'.$row['id'];
                $esty_id   = 'etsy_'.$row['id'];
                $lst_id    = 'lst_'.$row['id'];
                $ebay_h = 'ebay_h_'.$row['id'];
                $ebay_c = 'ebay_c_'.$row['id'];
                $amazon_h = 'amazon_h_'.$row['id'];
                $amazon_c = 'amazon_c_'.$row['id'];
                $sears_h = 'sears_h_'.$row['id'];
                $sears_c = 'sears_c_'.$row['id'];
                $esty_h = 'esty_h_'.$row['id'];
                $esty_c = 'esty_c_'.$row['id'];
                $lstdibbs_h = 'lstdibbs_h_'.$row['id'];
                $lstdibbs_c = 'lstdibbs_c_'.$row['id'];
                //$check_box_class = ( !empty($row['ebay_field']) ? 'class=\"bookid\"' : 'class=\"bookid_new\"' );
                $check_box_class = 'class=\"bookid\"';
                
                if ($rc )
                    
                $json .= ",";
                $json .= "\n {";
                
            $json .= "id:'" . $row['id'] . "',";
            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['id']."\" />ID #: " . $row['id'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/edit\'  class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>"
                        . "<table class=\"set_ckbox_table\">"
                        . "<tr>"
                        . "<td><input type=\"checkbox\" name=\"cb_ebay\" ".checkedBox($ebay_id, $row['catid'])." id=\"".$ebay_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_id."\', \'catid\')\" /><label for=\"".$ebay_id."\" class=\"set_lable\">Ebay</label></td>"
                        . "<th><input type=\"checkbox\" name=\"ebay_h\" id=\"".$ebay_h."\" value=\"".$ebay_h."\" ".checkedBox($ebay_h, $row['catid'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_h."\', \'catid\')\" /></th>"
                        . "<th><input type=\"checkbox\" name=\"ebay_c\" id=\"".$ebay_c."\" value=\"".$ebay_c."\" ".checkedBox($ebay_c, $row['catid'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_c."\', \'catid\')\" /></th>"
                        . "</tr>"
                        . "<tr>"
                        . "<td><input type=\"checkbox\" name=\"cb_amzon\" ".checkedBox($amazon_id, $row['catid'])." id=\"".$amazon_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_id."\', \'catid\')\" /><label for=\"".$amazon_id."\" class=\"set_lable\">Amazon</label></td>"
                        . "<th><input type=\"checkbox\" name=\"amazon_h\" id=\"".$amazon_h."\" value=\"".$amazon_h."\" ".checkedBox($amazon_h, $row['catid'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_h."\', \'amazon_h\')\" /></th>"
                        . "<th><input type=\"checkbox\" name=\"amazon_c\" id=\"".$amazon_c."\" value=\"".$amazon_c."\" ".checkedBox($amazon_c, $row['catid'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_c."\', \'amazon_c\')\" /></th>"
                        . "</tr>"
                        . "<tr>"
                        . "<td><input type=\"checkbox\" name=\"cb_esty\" ".checkedBox($esty_id, $row['catid'])." id=\"".$esty_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_id."\', \'catid\')\" /><label for=\"".$esty_id."\" class=\"set_lable\">Etsy</label></td>"
                        . "<th><input type=\"checkbox\" name=\"esty_h\" id=\"".$esty_h."\" value=\"".$esty_h."\" ".checkedBox($esty_h, $row['catid'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_h."\', \'esty_h\')\" /></th>"
                        . "<th><input type=\"checkbox\" name=\"esty_c\" id=\"".$esty_c."\" value=\"".$esty_c."\" ".checkedBox($esty_c, $row['catid'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_c."\', \'esty_c\')\" /></th>"
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
                }else if($action == 'amazongallery') {
                    $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";
                    $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";
                    $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img2']) . '<input type="file" name="amazon2_'.$pk_id.'" />' ) . "'";
                    $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img3']) . '<input type="file" name="amazon3_'.$pk_id.'" />' ) . "'";
                    $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img4']) . '<input type="file" name="amazon4_'.$pk_id.'" />' ) . "'";
                    $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img5']) . '<input type="file" name="amazon5_'.$pk_id.'" />' ) . "'";
                    $json .= ",'" . addslashes( getMarketMoreImgView($imgrow['amazon_img6']) . '<input type="file" name="amazon6_'.$pk_id.'" />' ) . "'";
                            
                } else {
                $ringPrice = $rowsring['priceRetail']; //check_empty($row['ring_price'], $row['price']);
                $check_cate = strchr($cate_id, 'Cross');
                if( empty($check_cate) ) {
                    $semi_label = '';
                } else {
                    
                    $semi_label = 'Semi ';
                }
                
                $total_ring_diamond_price = $ringPrice; //$ringPrice + $diamond_row['price'];
                $center_carat_weight = $row['metal_weight'];
                
                $diamond_detail = '';
                $update_center_diamond = '';
                
                $rowsring = $this->catemodel->getRingsDetailViaIdEdit($row['id'], 'PLAT');
                //print_ar($rowsring);
                
                $ringsMetalDropDown = '';
                foreach($rowsring['ringsMetal'] as $ringsMetal){
                    $ringsMetalDropDown .= '<option value="'.$ringsMetal['matalType'].'" > '.$ringsMetal['matalType'].' </option>';
                }
                
                $json .= ",'" . addslashes($row['catid']) . " '";
                $json .= ",'" . addslashes($row['catid']) . " '";
                
                $json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price Edit</b></div>"
                
                        . "<select name=\"ringsMetal\" id=\"ringsMetal_".$row['id']."\" onchange=\"set_option_ringsMetal_lists(\'".$row['id']."\')\" /> ".$ringsMetalDropDown."</select><br>"
                        . "<input type=\"text\" name=\"jitem_price\" id=\"jitem_ringsMetal_price_".$row['id']."\" onkeyup=\"updateJitemPriceMW(\'".$row['id']."\',\'".$row['name']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";
               
                $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''
                        .  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['id']."\">View Image</a>"
                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['id']."\">View Video</a>'";
                
                //$json .= ",'" . addslashes($row['id']) . " '";
                $json .= ",'" . addslashes($semi_label.' $' . _nf($total_ring_diamond_price, 2)) . " <br>"
                        . "<input type=\"text\" name=\"price_box\" id=\"price_box_".$row['id']."\" onkeyup=\"update_jcarat_price(\'".$total_ring_diamond_price."\')\" class=\"set_carat_field\" value=\"".round($total_ring_diamond_price, 2)."\" />'";
                /*$json .= ",'<input type=\"text\" name=\"videos_link[]\" id=\"video_".$row['id']."\" onkeyup=\"update_jewitem_value(\'".$row['id']."\')\" class=\"set_link_field\" value=\"".$row['embed_link']."\" />'";*/
                //<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#centermodel_".$row['id']."\">Find Center <br>Diamond</a>
                $json .= ",'" . addslashes($row['metal_weight'] . '<br><b>Total Carat</b><br>' . $newTotalCarat) . ""
                        . "<br><a href=\"".$detail_link."/view\">View Details</a>"
                        . $this->get_jewelry_imgview_model($row['id'], $item_image, $prod_name).""
                        . $this->get_video_model_block($row['id'], $row['catid'], $prod_name).""
                        . $this->get_similar_jewelry_list($row['id'], $item_shape, $row['catid'], $prod_name).""
                        . $this->find_center_diamond_list($row['id'], $item_shape, $row['catid']) . "'";
                
                $json .= ",'<b>Total Carat</b><br><input type=\"text\" name=\"center_carat\" id=\"ctcarat_".$row['id']."\" onkeyup=\"update_jcarat_value(\'".$row['id']."\')\" class=\"set_carat_field\" value=\"".$center_carat_weight."\" /><br>"
                        . $diamond_detail.""
                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#mymodel_".$row['id']."\">Change Center <br>Diamond</a>"
                        . "<br>".$update_center_diamond."'";
                $json .= ",'<input type=\"text\" name=\"side_carat\" id=\"scarat_".$row['id']."\" onkeyup=\"update_jcarat_value(\'".$row['id']."\')\" class=\"set_carat_field\" />'";
                $json .= ",'" . addslashes($row['style_group']) . " '";
                $json .= ",'" . addslashes($row['metal_weight']) . " '";
                $json .= ",'" . addslashes($row['stone_weight']) . " '";
                $json .= ",'" . addslashes($row['supplied_stones']) . " '";
                
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






function stuller_fine_jewelry_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {
        
        if( isset($_POST['authentication_submit']) ){
            session_start();
            $oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');
            $req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", 'https://yadegardiamonds.com/engagement_rings_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/'.$filter_id);
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
                window.location.href='https://yadegardiamonds.com/engagement_rings_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/'.$filter_id;
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
        $item_sub_category = urldecode($sub_id);     
        $data['category_list'] = stuller_fashion_cate_list($type, $filter_id, $item_category); // admin_common_func helper
        $data['view_type'] = $type;
        $data['item_sub_category'] = $item_sub_category;
        $data['filter_id_no'] = $filter_id;
        $data['category_id'] = $item_category;
        $this->session->unset_userdata('return_message');
        $item_id_list = $this->input->post('item_id_list');
        
        if( !empty($item_id_list) && count($item_id_list) > 0 ) {
            $this->engagement_rings_fashionmodel->uploadItemPhotoGallery($item_id_list);
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
                
                $link_strings = $type.'/'. $filter_id. '/'. $item_category. '/'. $item_sub_category;
                
                $url = SITE_URL . 'engagement_rings_fashion_jewelry/getCollectionListings/' . $action . '/' . $link_strings;
                
                
                $data['action'] = $action;
                $data['onloadextraheader'] .= "  var actionview = '".$action."';
                var home_link = '".SITE_URL . 'engagement_rings_fashion_jewelry/heart_collection_items/view/' . $link_strings."';
                var photo_gallery_link = '".SITE_URL . 'engagement_rings_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';
function amazonGaleryBtn() {
    window.location = '" . SITE_URL . "engagement_rings_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';
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
                 buttons : [    {name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn}, {name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},
                                {separator: true}
                        ],
        searchitems : [
                    {display: 'Item Number', name : 'id', isdefault: true},
                    {display: 'Item Category', name : 'MerchandisingCategory3', isdefault: true}
                    ],      
        sortname: \"stock_number\",
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
                    {display: 'Style Group', name : 'style_group', width : 120, sortable : false, align: 'center'},
                    {display: 'Metal Weight', name : 'metal_weight', width : 90, sortable : false, align: 'left'},
                    {display: 'Stone Weight', name : 'stone_weight', width : 80, sortable : false, align: 'left'},
                    {display: 'Supplied Stones', name : 'supplied_stones', width : 120, sortable : false, align: 'left'}
                    ],
                 buttons : [    {name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},
                                {separator: true}
                        ],
        searchitems : [
                    {display: 'Item Number', name : 'stock_number', isdefault: true}
                    ],      
        sortname: \"id\",
        sortorder: \"ASC\",
        usepager: true,
        title: '<h1 class=\"pageheader\">Jewelery Cart Jewelry Ebay Items</h1>',
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
                $output = $this->load->view('admin/stuller_engagement_rings_listing', $data, true);
                output_page($output, $data);  /// admin_common_func helper
        } else {
                $output = $this->load->view('admin/login', $data, true);
                output_page($output, $data); /// admin_common_func helper
        }
    }


    
        
    
    
	function get_main_sub_category_list(){

    	if(isset($_GET['get_main_category_value'])){
    	    
			$cat_id 	            = $_GET['get_main_category_value'];
			$get_filter_id_no 	    = $_GET['get_filter_id_no'];
			$where_cat_id 	= array('parent_id' => $cat_id);
			
			$where_sub_cat	= $this->catemodel->getSubCategory($cat_id);
			//$sub_cat_value->category_id
            $option_sub_cat	= '<option value="">Select One Option</option>';
            $option_sub_cat	.= '<option value="'.SITE_URL.'engagement_rings_fashion_jewelry/stuller_engagement_rings_listing/view/engagement_rings/'.$get_filter_id_no.'/'.$cat_id.'/"> - Show With Main Category</option>';
            
			if(is_array($where_sub_cat)){
				
				foreach ($where_sub_cat as $sub_cat_value) {
					$option_sub_cat	.= '<option value="'.SITE_URL.'engagement_rings_fashion_jewelry/stuller_engagement_rings_listing/view/engagement_rings/'.$get_filter_id_no.'/'.$cat_id.'/'.$sub_cat_value['id'].'"> '.$sub_cat_value['catname'].' Diamond</option>';
				}
				echo $option_sub_cat;
			}else{
				//echo $option_sub_cat .= '<option value="'.SITE_URL.'engagement_rings_fashion_jewelry/stuller_engagement_rings_listing/view/engagement_rings/'.$get_filter_id_no.'/'.$cat_id.'/">Show With Main Category</option>';	
			}
		}else{
			echo $option_sub_cat	= '<option value=""> Sub Category Not Found</option>';
		}
		
	}
    
    //// view unique ring detail
    function stuller_items_detail($prod_id = 0, $type='') {
        
        $data['name'] = getAdminDetails(); /// admin_common_func helper
        
        require_once(APPPATH.'libraries/vendor/autoload.php');
        
        if ( isadminlogin() ) {
            
            if( isset($_POST['btn_submit']) ){
                
                
                $access_token           = $_SESSION['oauth_token'];
                $access_token_secret    = $_SESSION['oauth_token_secret'];
                
                $oauth = new OAuth('k08eccol9wh33wmldh13eonw', 'bad6tsimn2');
                $oauth->setVersion("1.1");
                $oauth->enableDebug();
                $oauth->setToken($access_token, $access_token_secret);
                $data1 = array(); 
                
                $shippingTemplateId     = '61869938006';
                $tags_input             = $this->input->post('ring_item_tags'); //'test0022,test0033';
                
                $shop_section_id        = '24899717';
                
                $title_category_name    = $this->input->post('title_category_name');
                if($title_category_name == 'Solitaire'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,diamond_ring,engagement_ring,diamond_solitaire,diamond_engagement,white_gold_diamond,round_solitaire,round_engagement,solitaire_diamond,solitaire_ring';
                }else if($title_category_name == 'Fancy'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,halo_ring,halo_split_shank,halo_engagement,bridal_rings,Wedding_rings,anniversary_ring,promise_rings,double_shank_ring_,unique_fancy,cut_sparkly';
                }else if($title_category_name == 'Halo'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,diamond,brilliant_cut_ring,bridal_ring,anniversary_ring,round_halo_ring_,halo_ring,halo_engagement_ring,diamond_cut_ring';
                }else if($title_category_name == 'Antique'){
                    $tags = 'Jewelry,Rings,Wedding_Engagemen,Engagement_Rings,vintage_diamond_ring,diamond_halo_ring,sapphire_halo_ring,art_deco_style,art_deco_ring,ring_14k_gold,white_gold,antique_engagement_ring';
                }else if($title_category_name == 'Petite'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,gift_for_her,gold_wedding_set,platinum_wedding_set,gold_engagement_set,affordable_wedding,Round_Diamond_Ring,Engagement_Ring,Diamond_Ring,petite_engagement';
                }else if($title_category_name == 'Semi Mount'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,14k,gold,engagement,halo,double_halo,semi_mount,semimount,semi_mount_ring,wedding,diamond_ring,white_gold,round,cushion_halo';
                }else if($title_category_name == 'Round'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Wedding_Bands,Wedding_Band,Unique_band,_U-shape_band,Womens_wedding_band,diamond_wedding_band,Half_Eternity_Band,unique_wedding_band,Anniversary_ring,7_Stone_Diamond_Ring';
                }else if($title_category_name == 'Eternity Wedding Bands'){
                    $shop_section_id = '25008656';
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Wedding_Bands,wedding_rings,white_sapphires,rose_gold,eternity_bands,engagement_ring,etsy_wedding,etsy_Eternity_Bands,etsy_bridal';
                }else if($title_category_name == 'Mens Rings'){
                    $tags = 'Jewelry,Rings,Mens_Diamond_Rings,Rings,Mens_Ring,Mens_Band,Mens_Gold_Band,Mens_Gold_Ring,Mens_Diamond_Ring,Mens_Diamond_Band,Diamond_Band,Diamond_Ring,Gold_Diamond_Band';
                }else if($title_category_name == 'Pendants'){
                    $tags = 'Jewelry,Necklaces,Pendants_DIAMOND,DIAMOND_PENDANT,SOLITAIRE,DIAMOND_NECKLACE,GENUINE,14K,YELLOW_GOLD,BEZEL_SET,DIAMOND_SOLITAIRE,necklace,pendant';
                }else if($title_category_name == 'Wedding Band Sets'){
                    $tags = 'Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,Wedding_Band_Sets,vintage_rings,wedding_ring,unique_rings,antique_ring';
                    $shop_section_id = '25010086';
                }else if($title_category_name == 'Wedding Bands'){
                    $tags = 'Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,vintage_rings,wedding_ring,unique_rings,antique_ring,Wedding_Bands';
                    $shop_section_id = '25010096';
                }else{
                    $tags = 'Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,vintage_rings,wedding_ring,unique_rings,antique_ring';
                }
                
                
                $get_ring_price = $this->input->post('ring_price');
                $get_ring_price_percent = ($get_ring_price * 3.5) / 100;
                
                $get_ring_price_show = $get_ring_price;
                
                $ring_image_name = $this->input->post('ring_image_name');
                
    			$arr  = Array(
    					  'quantity' => 500,
    					  'title' => $this->input->post('item_title'),
    					  'description' => $this->input->post('ring_descriptions'),
    					  'price' => $get_ring_price_show,
    					  'who_made' => 'i_did',                                                        
    					  'is_supply' => 0,
    					  'when_made' => 'made_to_order',
    					  'shop_section_id' => $shop_section_id,
    					  'taxonomy_id' => 1245,
    					  'shipping_template_id'=>(int)$shippingTemplateId
    				);	
			    //echo '<pre>'; print_r($arr); exit();
				try {
					$oauth_data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings?tags=".$tags,$arr,OAUTH_HTTP_METHOD_POST);	
					$json       = $oauth->getLastResponse();
					$array      = json_decode($json,true);
					
					
					//echo '<pre>'; print_r($array); echo '</pre>';
					$data['response_etsy']      = $array['results'][0];
					
					foreach($array['results'] as $r1){
						$listing_id = $r1['listing_id'];
						
						$source_file = dirname(realpath(__FILE__)) . "/engagement_rings/imgs/".$ring_image_name; // image1_906
						//echo '<pre>'; print_r($listing_id); echo '</pre>';
                        $response = $this->ListImage($listing_id, $source_file);
                        //echo '<pre>'; print_r($response); echo '</pre>';
                        
					}
                            
				}
					
				catch (OAuthException $e) {
					//error_log($e->getMessage());
					//error_log(print_r($oauth->getLastResponse(), true));
					//error_log(print_r($oauth->getLastResponseInfo(), true));
					
					print $oauth->getLastResponse()."\n";
					//print_r($oauth->debugInfo);				
				}	
					
            }
            
                $data['return_msg'] = $this->session->userdata('return_message');
                $rowsring = $this->catemodel->getRingsDetailViaId($prod_id, 'PLAT');//$this->engagement_rings_fashionmodel->getStullerItemDetailViaID($prod_id); //
                //print_ar($rowsring);
                
                $data['row_cate'] = $this->getCateName($rowsring['catid']);
                
                $cate               = $this->getCateName( $rowsring['catid'] );
                $data_ringtitle     = $rowsring['matalType'].' '.$cate['main_cname'].' ';
                $data_ringtitle2    = str_replace('PLAT', 'Platinum', $data_ringtitle);
                $data['ringtitleMain']  = str_replace('GA', 'GIA', $data_ringtitle2);
                
                $imgs_rows = stuller_imglinks_list($rowsring); /// item jewelry section helper
                $data['rowsring'] = $rowsring;
                $data['view_type'] = $type;
                $data['extraheader'] = '<link type="text/css" rel="stylesheet" href="'.SITE_URL.'css/home_style.css" />';
                $data['ringtitle'] = $rowsring['name'];
                $data['title'] = $data['name'];
                $data['ringimg']   = $imgs_rows[0];
                $data['item_img_list'] = '';//$this->getStullerItemsImgLists($imgs_rows, $data['ringtitle']);
                $data['setingtype']   = $rowsring['parent_cate'];
                $data['maincate_name'] = $rowsring['parent_cate'];
                $data['retail_price'] = $rowsring['priceRetail'] * RETAIL_PERCENT;
                $data['saving_percent'] = $rowsring['priceRetail']; //( 100 - ( ( $rowsring['priceRetail'] / $data['retail_price'] ) * 100 ) );
                $data['item_details_list'] = jcart_item_details_rows( $rowsring );
            
                $output = $this->load->view('admin/engagement_rings_fashion_jewelry_details', $data, true);
                output_page($output, $data); /// admin_common_func helper
        } else {
                $output = $this->load->view('admin/login', $data, true);
                output_page($output, $data); /// admin_common_func helper
        }
    }
    
    
    //// view unique ring detail
    function stuller_items_detail_edit($prod_id = 0, $type='') {
        
        $data['name'] = getAdminDetails(); /// admin_common_func helper
        
        require_once(APPPATH.'libraries/vendor/autoload.php');
        
        if ( isadminlogin() ) {
            
            if( isset($_POST['btn_submit']) ){
                
                
                $access_token           = $_SESSION['oauth_token'];
                $access_token_secret    = $_SESSION['oauth_token_secret'];
                
                $oauth = new OAuth('k08eccol9wh33wmldh13eonw', 'bad6tsimn2');
                $oauth->setVersion("1.1");
                $oauth->enableDebug();
                $oauth->setToken($access_token, $access_token_secret);
                $data1 = array(); 
                
                $shippingTemplateId     = '61869938006';
                $tags_input             = $this->input->post('ring_item_tags'); //'test0022,test0033';
                
                $shop_section_id        = '24899717';
                
                $title_category_name    = $this->input->post('title_category_name');
                if($title_category_name == 'Solitaire'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,diamond_ring,engagement_ring,diamond_solitaire,diamond_engagement,white_gold_diamond,round_solitaire,round_engagement,solitaire_diamond,solitaire_ring';
                }else if($title_category_name == 'Fancy'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,halo_ring,halo_split_shank,halo_engagement,bridal_rings,Wedding_rings,anniversary_ring,promise_rings,double_shank_ring_,unique_fancy,cut_sparkly';
                }else if($title_category_name == 'Halo'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,diamond,brilliant_cut_ring,bridal_ring,anniversary_ring,round_halo_ring_,halo_ring,halo_engagement_ring,diamond_cut_ring';
                }else if($title_category_name == 'Antique'){
                    $tags = 'Jewelry,Rings,Wedding_Engagemen,Engagement_Rings,vintage_diamond_ring,diamond_halo_ring,sapphire_halo_ring,art_deco_style,art_deco_ring,ring_14k_gold,white_gold,antique_engagement_ring';
                }else if($title_category_name == 'Petite'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,gift_for_her,gold_wedding_set,platinum_wedding_set,gold_engagement_set,affordable_wedding,Round_Diamond_Ring,Engagement_Ring,Diamond_Ring,petite_engagement';
                }else if($title_category_name == 'Semi Mount'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Engagement_Rings,14k,gold,engagement,halo,double_halo,semi_mount,semimount,semi_mount_ring,wedding,diamond_ring,white_gold,round,cushion_halo';
                }else if($title_category_name == 'Round'){
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Wedding_Bands,Wedding_Band,Unique_band,_U-shape_band,Womens_wedding_band,diamond_wedding_band,Half_Eternity_Band,unique_wedding_band,Anniversary_ring,7_Stone_Diamond_Ring';
                }else if($title_category_name == 'Eternity Wedding Bands'){
                    $shop_section_id = '25008656';
                    $tags = 'Jewelry,Rings,Wedding_Engagement,Wedding_Bands,wedding_rings,white_sapphires,rose_gold,eternity_bands,engagement_ring,etsy_wedding,etsy_Eternity_Bands,etsy_bridal';
                }else if($title_category_name == 'Mens Rings'){
                    $tags = 'Jewelry,Rings,Mens_Diamond_Rings,Rings,Mens_Ring,Mens_Band,Mens_Gold_Band,Mens_Gold_Ring,Mens_Diamond_Ring,Mens_Diamond_Band,Diamond_Band,Diamond_Ring,Gold_Diamond_Band';
                }else if($title_category_name == 'Pendants'){
                    $tags = 'Jewelry,Necklaces,Pendants_DIAMOND,DIAMOND_PENDANT,SOLITAIRE,DIAMOND_NECKLACE,GENUINE,14K,YELLOW_GOLD,BEZEL_SET,DIAMOND_SOLITAIRE,necklace,pendant';
                }else if($title_category_name == 'Wedding Band Sets'){
                    $tags = 'Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,Wedding_Band_Sets,vintage_rings,wedding_ring,unique_rings,antique_ring';
                    $shop_section_id = '25010086';
                }else if($title_category_name == 'Wedding Bands'){
                    $tags = 'Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,vintage_rings,wedding_ring,unique_rings,antique_ring,Wedding_Bands';
                    $shop_section_id = '25010096';
                }else{
                    $tags = 'Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,vintage_rings,wedding_ring,unique_rings,antique_ring';
                }
                
                
                $get_ring_price = $this->input->post('ring_price');
                $get_ring_price_percent = ($get_ring_price * 3.5) / 100;
                
                $get_ring_price_show = $get_ring_price;
                
                $ring_image_name = $this->input->post('ring_image_name');
                
    			$arr  = Array(
    					  'quantity' => 500,
    					  'title' => $this->input->post('item_title'),
    					  'description' => $this->input->post('ring_descriptions'),
    					  'price' => $get_ring_price_show,
    					  'who_made' => 'i_did',                                                        
    					  'is_supply' => 0,
    					  'when_made' => 'made_to_order',
    					  'shop_section_id' => $shop_section_id,
    					  'taxonomy_id' => 1245,
    					  'shipping_template_id'=>(int)$shippingTemplateId
    				);	
			    //echo '<pre>'; print_r($arr); exit();
				try {
					$oauth_data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings?tags=".$tags,$arr,OAUTH_HTTP_METHOD_POST);	
					$json       = $oauth->getLastResponse();
					$array      = json_decode($json,true);
					
					
					//echo '<pre>'; print_r($array); echo '</pre>';
					$data['response_etsy']      = $array['results'][0];
					
					foreach($array['results'] as $r1){
						$listing_id = $r1['listing_id'];
						
						$source_file = dirname(realpath(__FILE__)) . "/engagement_rings/imgs/".$ring_image_name; // image1_906
						//echo '<pre>'; print_r($listing_id); echo '</pre>';
                        $response = $this->ListImage($listing_id, $source_file);
                        //echo '<pre>'; print_r($response); echo '</pre>';
                        
					}
                            
				}
					
				catch (OAuthException $e) {
					//error_log($e->getMessage());
					//error_log(print_r($oauth->getLastResponse(), true));
					//error_log(print_r($oauth->getLastResponseInfo(), true));
					
					print $oauth->getLastResponse()."\n";
					//print_r($oauth->debugInfo);				
				}	
					
            }
            
                $data['msg_notify'] = 0;
			    $data['msg'] 		= '';
			
                if(isset($_POST['produbt_edit_action'])){

    				$update1Data = array(
    					'style_group'	    => $this->input->post('style_group'),
    					'metal_weight'		=> $this->input->post('metal_weight'),
    					'stone_weight'		=> $this->input->post('stone_weight'),
    					'supplied_stones'	=> $this->input->post('supplied_stones'),
    					'additional_stones'	=> $this->input->post('additional_stones'),
    					'top_width'			=> $this->input->post('top_width'),
    					'bottom_width'		=> $this->input->post('bottom_width'),
    					'top_height'		=> $this->input->post('top_height'),
    					'bottom_height'		=> $this->input->post('bottom_height'),
    					'ring_size'		    => $this->input->post('ring_size'),
    					'availblesize'		=> $this->input->post('availblesize'),
    					'measurements'		=> $this->input->post('measurements'),
    					'product_id_set'	=> $this->input->post('product_id_set'),
    					'metal_weight_bk'	=> $this->input->post('metal_weight_bk')
    				);
    
    				$this->catemodel->update_any_table($update1Data, 'dev_us', 'name', $this->input->post('name'));
					
					if($this->input->post('ringsMetal')){
    					$update2Data = array(
        					'price'	=> $this->input->post('price'),
        					'priceRetail'	=> $this->input->post('priceRetail')
        				);
        				$updateWData = array(
        					'productId'	=> $this->input->post('name'),
        					'matalType'	=> $this->input->post('ringsMetal')
        				);
        				$this->catemodel->update_any_table_where($update2Data, 'dev_us_prices', $updateWData);
                    }
                    
					$data['msg'] = 'Successfully Updated <b>'.$this->input->post('name').'</b> Product.';
					$data['msg_notify'] = 1;
    			}
    			
    			
            
                $data['return_msg'] = $this->session->userdata('return_message');
                $rowsring = $this->catemodel->getRingsDetailViaIdEdit($prod_id, 'PLAT');//$this->engagement_rings_fashionmodel->getStullerItemDetailViaID($prod_id); //
                //print_ar($rowsring);
                
                $data['row_cate'] = $this->getCateName($rowsring['catid']);
                
                $cate               = $this->getCateName( $rowsring['catid'] );
                $data_ringtitle     = $rowsring['matalType'].' '.$cate['main_cname'].' ';
                $data_ringtitle2    = str_replace('PLAT', 'Platinum', $data_ringtitle);
                $data['ringtitleMain']  = str_replace('GA', 'GIA', $data_ringtitle2);
                
                $imgs_rows = stuller_imglinks_list($rowsring); /// item jewelry section helper
                $data['rowsring'] = $rowsring;
                $data['view_type'] = $type;
                $data['extraheader'] = '<link type="text/css" rel="stylesheet" href="'.SITE_URL.'css/home_style.css" />';
                $data['ringtitle'] = $rowsring['name'];
                $data['title'] = $data['name'];
                $data['ringimg']   = $imgs_rows[0];
                $data['item_img_list'] = '';//$this->getStullerItemsImgLists($imgs_rows, $data['ringtitle']);
                $data['setingtype']   = $rowsring['parent_cate'];
                $data['maincate_name'] = $rowsring['parent_cate'];
                $data['retail_price'] = $rowsring['priceRetail'] * RETAIL_PERCENT;
                $data['saving_percent'] = $rowsring['priceRetail']; //( 100 - ( ( $rowsring['priceRetail'] / $data['retail_price'] ) * 100 ) );
                $data['item_details_list'] = jcart_item_details_rows( $rowsring );
            
                
                $output = $this->load->view('admin/engagement_rings_fashion_jewelry_edit', $data, true);
                
                output_page($output, $data); /// admin_common_func helper
        } else {
                $output = $this->load->view('admin/login', $data, true);
                output_page($output, $data); /// admin_common_func helper
        }
    }
    
    
    function update_prive_retail_by_metal_wise(){

    	if(isset($_GET['product_name']) AND isset($_GET['ringsMetal']) AND isset($_GET['ringsMetalPrice']) ){
    	    
			$product_name 	        = $_GET['product_name'];
			$ringsMetal 	        = $_GET['ringsMetal'];
			
			if($ringsMetal AND $_GET['ringsMetal'] AND $_GET['ringsMetalPrice'] ){
				$update2Data = array(
					'priceRetail'	=> $_GET['ringsMetalPrice']
				);
				$updateWData = array(
					'productId'	=> $product_name,
					'matalType'	=> $ringsMetal
				);
				$return  =  $this->catemodel->update_any_table_where($update2Data, 'dev_us_prices', $updateWData);
				if($return){
				    echo 'Updated';
				}else{
				   echo 'Note Updated'; 
				}
				exit();
            }
            
			
		}else{
		    echo 'Note Updated';
			exit();
		}
		
	}
	
	
    
    function get_prive_retail_by_metal_wise(){

    	if(isset($_GET['product_name']) AND isset($_GET['ringsMetal'])){
    	    
			$product_name 	        = $_GET['product_name'];
			$ringsMetal 	        = $_GET['ringsMetal'];
			$rowsring               = $this->catemodel->getRingsDetailViaIdEdit($product_name, $ringsMetal);

			if(is_array($rowsring)){
				$main_price     = $rowsring['price'];
				$retail_price   = $rowsring['priceRetail'];
				echo $main_price.'|'.$retail_price;
				exit();
			}else{
				$rowsring               = $this->catemodel->getRingsDetailViaIdEdit($product_name, 'PLAT');
				$main_price     = $rowsring['price'];
				$retail_price   = $rowsring['priceRetail'];
				echo  $main_price.'|'.$retail_price;
				exit();
			}
		}else{
			$rowsring       = $this->catemodel->getRingsDetailViaIdEdit($product_name, 'PLAT');
			$main_price     = $rowsring['price'];
			$retail_price   = $rowsring['priceRetail'];
			echo  $main_price.'|'.$retail_price;
			exit();
		}
		
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
        //print_ar($catevalue);
        
        return $catevalue;
    }   
    
    
    
    
/*********************************************/
function ListImage($EtsyItemId, $RPath) {
    $url = "https://openapi.etsy.com/v2/listings/$EtsyItemId/images";
    $imageSize = getImageSize($RPath);
    //print_ar($RPath);
    $imageWidth = $imageSize[0];
    $imageHeight = $imageSize[1];
    if ($imageWidth > 10000 | $imageHeight > 10000) {
        resize_image($RPath, 9000);
    }
    $source_file = $RPath;
    $mimeType = 'image/jpeg';
    $filename = basename($source_file);
    $source_file = new CurlFile($source_file, $mimeType, $filename);
    $data = array("image" => $source_file, "filename" => $filename);
    //print_ar($data);
    $response = $this->CurlEtsy('POST', $url, null, $data);
    
    return $response;
}

function resize_image($file, $w) {
    $imageSize = getImageSize($file);
    $imageWidth = $imageSize[0];
    $imageHeight = $imageSize[1];

    $DESIRED_WIDTH = $w;
    $proportionalHeight = round(($DESIRED_WIDTH * $imageHeight) / $imageWidth);

    $originalImage = imageCreateFromJPEG($file);

    $resizedImage = imageCreateTrueColor($DESIRED_WIDTH, $proportionalHeight);

    imageCopyResampled($resizedImage, $originalImage, 0, 0, 0, 0, $DESIRED_WIDTH + 1, $proportionalHeight + 1, $imageWidth, $imageHeight);
    imageJPEG($resizedImage, $file);

    imageDestroy($originalImage);
    imageDestroy($resizedImage);
}

function CurlEtsy($method, $url, $param = null, $data = null) {
    
    $access_token           = $_SESSION['oauth_token'];
    $access_token_secret    = $_SESSION['oauth_token_secret'];
    
    $consumer_key = 'k08eccol9wh33wmldh13eonw';
    $consumer_secret = 'bad6tsimn2';
    $TokenSecret = $access_token_secret;
    $Access_token = $access_token;
    $nonce = mt_rand();
    $timestamp = time();
    $params = array(
        'oauth_consumer_key' => $consumer_key,
        'oauth_nonce' => $nonce,
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_timestamp' => $timestamp,
        'oauth_version' => '1.0',
        'oauth_token' => $Access_token,
    );
    if ($method == 'GET') {
        if (isset($param)) {
            $query = http_build_query($param);
            $Geturl = $url . '?' . $query;
            foreach ($param as $key => $value) {
                $params[$key] = $value;
            }
        } else {
            $Geturl = $url;
        }
    } else if ($method == 'PUT') {
        foreach ($param as $key => $value) {
            $params[$key] = $value;
        }

        $data = http_build_query($param, '', '&');
    }
    ksort($params);
    $sortedParamsByKeyEncodedForm = array();
    foreach ($params as $key => $value) {
        $sortedParamsByKeyEncodedForm[] = rawurlencode($key) . '=' . rawurlencode($value);
    }
    $strParams = implode('&', $sortedParamsByKeyEncodedForm);
    $signatureData = strtoupper($method)
            . '&'
            . rawurlencode($url)
            . '&'
            . rawurlencode($strParams);

    $key = rawurlencode($consumer_secret) . '&' . rawurlencode($TokenSecret);
    $signature = base64_encode(hash_hmac('SHA1', $signatureData, $key, 1));
    $arrHeaders = array(
        'Authorization: OAuth '
        . 'oauth_consumer_key="' . $params['oauth_consumer_key'] . '",'
        . 'oauth_nonce="' . $params['oauth_nonce'] . '",'
        . 'oauth_signature_method="' . $params['oauth_signature_method'] . '",'
        . 'oauth_signature="' . rawurlencode($signature) . '",'
        . 'oauth_timestamp="' . $params['oauth_timestamp'] . '",'
        . 'oauth_version="' . $params['oauth_version'] . '",'
        . 'oauth_token="' . rawurlencode($params['oauth_token']) . '",'
    );
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeaders);
//    curl_setopt($curl, CURLOPT_CAINFO, public_path() . "/ssl/cacert.pem");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    if ($method !== 'GET') {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    } else {
        $url = $Geturl;
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    $mxdResponse = curl_exec($curl);
    curl_error($curl);
    //$mxdResponse;
    //echo 'One Item Added';
    $array = json_decode($mxdResponse, true);
    return $array;
}
/***********************************************/
    
    
    
    
    
    
    
    //// download img of HD rings item
    function download_hdrings_imgs() {
         $results = $this->engagement_rings_fashionmodel->getCollectionJewListing('HD', 0, '', 1, 200, 'id', 'DESC', '', 'id');
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
        $item_img = $this->engagement_rings_fashionmodel->get_item_imgs( $item_id );
        
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
        
        $results = $this->engagement_rings_fashionmodel->getCollectionJewListing('ERPHD', 0, '', 1, 1000);
        $item_id = '';
        
        foreach( $results['result'] as $rows ) {
            $img_link = ''; //$this->jewelry_item_img( $rows['id'] );
            
            $item_id .= $rows['id'] . ' = ' . $img_link . '<br>';
        }
        echo $item_id;
    }
    
    ////
    function update_market_id($item_id=0, $item_field='', $field_id=0) {
        
        $this->engagement_rings_fashionmodel->updateMarketID($item_id, $item_field, $field_id);
        
    }
	
    function getIRingItemProfit($diamondID=0, $newPrice=0, $ring_price=0, $orignalPrice=0) {
        $ring_profit = 0;
        $newRingPrice = ( $newPrice > 0 ? $newPrice : $orignalPrice );
        
        if( $diamondID > 0 ) {
            $results = $this->engagement_rings_fashionmodel->getIndexDiamondDetail($diamondID, 'lot');
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
        $itemdetail = $this->engagement_rings_fashionmodel->getItemDetailViaID($item_id);
        
        $results = $this->engagement_rings_fashionmodel->getCenterDiamondFilterResults($_GET, $item_id, $item_shape, $itemPrice, $items_carat, $minprice, $maxprice, $mcarat, $maxcarat);
        $item_details = $this->engagement_rings_fashionmodel->getItemSpecification($item_id, 'dev_ebay_details');
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
        $results = $this->engagement_rings_fashionmodel->getSimilarItemLists($id, $itemShape, $item_price); //print_ar($results);
        $itemdetail = $this->engagement_rings_fashionmodel->getItemDetailViaID($id);
        //$item_cate = urldecode($itemCate);
        $item_details = $this->engagement_rings_fashionmodel->getItemSpecification($id, 'dev_ebay_details');
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
        
        $this->engagement_rings_fashionmodel->updateItemDMInfo($itemID, $diamondID);
        
        echo 'Item Diamond info has changed successfully!';
        
    }
    
    //// update the items diamond info
    function update_jitems_price($itemID=0, $items_price=0) {
        $item_price = str_replace(array('$', ','), '', $items_price);
        $this->engagement_rings_fashionmodel->updateJewelryItemPrice($itemID, $item_price);
        
    }
        
    function update_jewelry_item($id=0) {
       $embed_value = urldecode( $this->input->get('embed_value') );

       $this->engagement_rings_fashionmodel->updateJewelryItemEmbedLink($id, $embed_value);
    }
    
    function update_jewcarat_value($id=0) {
       $center_carat = $this->input->get('center_carat');
       $side_carat   = $this->input->get('side_carat');

       $this->engagement_rings_fashionmodel->updateJewItemCarat($id, $center_carat, $side_carat);
    }
    
    function update_item_newprice($id=0, $newprice=0) {

       $this->engagement_rings_fashionmodel->updateNewPrice($id, $newprice);
       
    }
    
    function updateJewelryItemIDWithRandomNumber() {
        $this->engagement_rings_fashionmodel->update_item_detail_itemid();
        
        echo 'Item ID has updated Successfully!';
    }
}