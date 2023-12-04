<?php 

defined('BASEPATH') OR exit('No direct script access allowed');



class Jcart_fashion_jewelry extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('adminmodel');

		$this->load->model('user');

		$this->load->model('sitepaging');

		$this->load->model('commonmodel');

		$this->load->model('davidsternmodel');

		$this->load->helper('admin_libs');

		$this->load->helper('admin_mainmenu');

		$this->load->helper('form');

		$this->load->helper('url');

		$this->load->helper('item_jewelry_section');

		$this->load->model('stullerfashionmodel');

		$this->load->model('jcartfashionmodel');



		$cu = current_url();

		$url = explode('/', $cu);

		$uri = ( isset($url[4]) ? $url[4] : '' );

		$this->session->set_userdata('pages_name', $uri);

	}



	function index() {

		die('You are not allowed to access this page directly!');

	}



	function get_center_idex_diamond($id=0, $shape='B') {

		$rows = $this->jcartfashionmodel->updateIdexCenterDiamondToItem($id, $shape);

	}



	function stuller_fashionjew_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {

		require_once(APPPATH.'libraries/vendor/autoload.php');

		if( isset($_POST['authentication_submit']) ){

			session_start();

			$oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2');

			$req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", "https://demo1.jbetadev.com/jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/".$filter_id."?pc=mpb&cp=mpb1", "GET");

			$_SESSION['aman']= $req_token['oauth_token_secret'];



            header('Location:'.$req_token['login_url']);

		}



        if( isset($_GET['oauth_token']) AND isset($_GET['oauth_verifier']) ){

			$_SESSION['oauth_token'] = $_GET['oauth_token'];

			$_SESSION['oauth_token_secret'] = $_SESSION['aman'];



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

        		} catch (OAuthException $e) {



        		}



                echo ("<SCRIPT LANGUAGE='JavaScript'>

                window.alert('Succesfully Authenticated')

                window.location.href='https://demo1.jbetadev.com/jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/".$filter_id."?pc=mpb&cp=mpb1';

                </SCRIPT>");

            }catch (OAuthException $e) {

	            //print_ar('sdfsdf2222');

    		}

        }



        $data['name'] = getAdminDetails();

		$item_category = urldecode($id);

        $item_sub_category = urldecode($sub_id);    

        $data['category_list'] = stuller_fashion_cate_list($type, $filter_id, $item_category);

        $data['view_type'] = $type;

        $data['item_sub_category'] = $item_sub_category;

        $data['filter_id_no'] = $filter_id;

        $data['category_id'] = $item_category;

        $this->session->unset_userdata('return_message');

        $item_id_list = $this->input->post('item_id_list');



        if( !empty($item_id_list) && count($item_id_list) > 0 ) {

            $this->jcartfashionmodel->uploadItemPhotoGallery($item_id_list);

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

			$("#rapnet").click();';

			$link_strings = $type.'/'. $filter_id. '/'. $item_category. '/'. $item_sub_category;

			$url = SITE_URL . 'jcart_fashion_jewelry/getCollectionListings/' . $action . '/' . $link_strings;

			$data['action'] = $action;

			$data['onloadextraheader'] .= "  var actionview = '".$action."';

			var home_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/view/' . $link_strings."';

			var photo_gallery_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';

			function amazonGaleryBtn() {

				window.location = '" . SITE_URL . "jcart_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';

			}



			if(actionview == 'photogallery' || actionview == 'amazongallery') {

				jQuery(\"#results\").flexigrid({

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

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},

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

				});

			} else {

				jQuery(\"#results\").flexigrid({

					url: '" . $url . "',

					dataType: 'json',

					colModel : [

						{display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},

						{display: 'Stock #', name : 'stock_real_number', width : 140, sortable : true, align: 'center'},

						{display: 'Category', name : 'sub_category', width : 140, sortable : true, align: 'center'},

						{display: 'Item Name', name : 'item_title', width : 250, sortable : true, align: 'center'},

						{display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},

						{display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Profit', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},

						{display: 'Center Stone', name : 'center_stone_sizes', width : 120, sortable : false, align: 'left'},

						{display: 'Metal Type', name : 'metal_type', width : 120, sortable : false, align: 'left'}

					],

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{separator: true}

					],

					searchitems : [

						{display: 'Item Number', name : 'stock_number', isdefault: true}

					],

					sortname: \"stock_number\",

					sortorder: \"ASC\",

					usepager: true,

					title: '<h1 class=\"pageheader\">Marketplace Jewelry Items</h1>',

					useRp: true,

					rp: 50,

					showTableToggleBtn: false,

					width:1020,

					height: 565

				});

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



			function test(com,grid){   

				var idlist = $(\".bookid:checked\").map(function () {return this.value;}).get().join(\",\");

				var ttcount = $(\".bookid:checked\").length;

				var itemlist ='';

				if (com=='Delete' || com=='Revise'){ 

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

							}

						}

					} else{

						alert('You have not selected a row.');

					} 

				} else if (com=='Add') {

					window.location = '" . SITE_URL . "admin/loosediamonds/add';

                }			

			}";



			$data['extraheader'] = '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';

			$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';

			$output = $this->load->view('admin/jcart_fashionjew_admin_listing', $data, true);

			output_page($output, $data);

		} else {

			$output = $this->load->view('admin/login', $data, true);

			output_page($output, $data);

		}

	}



	function get_main_overmount_sub_category_list(){

    	if(isset($_GET['get_main_category_value'])){

			$cat_id				= $_GET['get_main_category_value'];

			$get_filter_id_no	= $_GET['get_filter_id_no'];

			$where_sub_cat	= $this->jcartfashionmodel->getSubCategory($cat_id);

			$option_sub_cat	= '<option value="">Select One Option</option>';

			$option_sub_cat	.= '<option value="'.SITE_URL.'jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/'.$get_filter_id_no.'/'.$cat_id.'/"> - Show With Main Category</option>';

			if(is_array($where_sub_cat)){

				foreach ($where_sub_cat as $sub_cat_value) {

					$option_sub_cat	.= '<option value="'.SITE_URL.'jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/'.$get_filter_id_no.'/'.$cat_id.'/'.$sub_cat_value['category_id'].'"> '.$sub_cat_value['category_name'].'</option>';

				}

				echo $option_sub_cat;

			}

		}else{

			echo $option_sub_cat	= '<option value=""> Sub Category Not Found</option>';

		}



	}



	function three_sixty_engagement_rings($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {

        require_once(APPPATH.'libraries/vendor/autoload.php');

        if( isset($_POST['authentication_submit']) ){

            session_start();

            $oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2');

            $req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", "https://demo1.jbetadev.com/jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/".$filter_id."?pc=mpb&cp=mpb1", "GET");

            $_SESSION['aman']= $req_token['oauth_token_secret'];



            header('Location:'.$req_token['login_url']);

        } 



        if( isset($_GET['oauth_token']) AND isset($_GET['oauth_verifier']) ){

            $_SESSION['oauth_token'] = $_GET['oauth_token'];

            $_SESSION['oauth_token_secret'] = $_SESSION['aman'];



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



        		}

            

                echo ("<SCRIPT LANGUAGE='JavaScript'>

                window.alert('Succesfully Authenticated')

                window.location.href='https://demo1.jbetadev.com/jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/".$filter_id."?pc=mpb&cp=mpb1';

                </SCRIPT>");

            

            }catch (OAuthException $e) {

	            //print_ar('sdfsdf2222');

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

            $this->jcartfashionmodel->uploadItemPhotoGallery($item_id_list);

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

                

                $url = SITE_URL . 'jcart_fashion_jewelry/getCollection360_Engagement_RingsListings/' . $action . '/' . $link_strings;

                

                

                $data['action'] = $action;

                $data['onloadextraheader'] .= "  var actionview = '".$action."';

                var home_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/view/' . $link_strings."';

                var photo_gallery_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';

function amazonGaleryBtn() {

    window.location = '" . SITE_URL . "jcart_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';

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

    $(\"#results\").flexigrid

        (

        {   	 							

                    url: '" . $url . "',

                    dataType: 'json',

                    colModel : [

                    {display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},

                    {display: 'Stock #', name : 'stock_real_number', width : 140, sortable : true, align: 'center'},

                    {display: 'Category', name : 'sub_category', width : 140, sortable : true, align: 'center'},

                    {display: 'Item Name', name : 'item_title', width : 250, sortable : true, align: 'center'},

                    {display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},				

                    {display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},

                    {display: 'Profit', name : 'price', width : 90, sortable : true, align: 'center'},

                    {display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},

                    {display: 'Center Stone', name : 'center_stone_sizes', width : 120, sortable : false, align: 'left'},

                    {display: 'Metal Type', name : 'metal_type', width : 120, sortable : false, align: 'left'}

                    ],

                 buttons : [	{name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

                                {separator: true}

                        ],

        searchitems : [

                    {display: 'Item Number', name : 'stock_number', isdefault: true}

                    ], 		

        sortname: \"stock_number\",

        sortorder: \"ASC\",

        usepager: true,

        title: '<h1 class=\"pageheader\">Marketplace 360 Engagement Rings Items</h1>',

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

                $output = $this->load->view('admin/three_sixty_engagement_rings', $data, true);

                output_page($output, $data);  /// admin_common_func helper

        } else {

                $output = $this->load->view('admin/login', $data, true);

                output_page($output, $data); /// admin_common_func helper

        }

    }



    function quality_gold_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {

        require_once(APPPATH.'libraries/vendor/autoload.php');

        if( isset($_POST['authentication_submit']) ){

            session_start();

            $oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2');

            $req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", "https://demo1.jbetadev.com/jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/".$filter_id."?pc=mpb&cp=mpb1", "GET");

            $_SESSION['aman']= $req_token['oauth_token_secret'];

            header('Location:'.$req_token['login_url']);

        } 



        if( isset($_GET['oauth_token']) AND isset($_GET['oauth_verifier']) ){

            $_SESSION['oauth_token'] = $_GET['oauth_token'];

            $_SESSION['oauth_token_secret'] = $_SESSION['aman'];



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



        		}

            

                echo ("<SCRIPT LANGUAGE='JavaScript'>

                window.alert('Succesfully Authenticated')

                window.location.href='https://demo1.jbetadev.com/jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/".$filter_id."?pc=mpb&cp=mpb1';

                </SCRIPT>");

            

            }catch (OAuthException $e) {

	            //print_ar('sdfsdf2222');

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

            $this->jcartfashionmodel->uploadItemPhotoGallery($item_id_list);

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

                

                $url = SITE_URL . 'jcart_fashion_jewelry/getQualityGoldCollectionListings/' . $action . '/' . $link_strings;

                

                

                $data['action'] = $action;

                $data['onloadextraheader'] .= "  var actionview = '".$action."';

                var home_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/view/' . $link_strings."';

                var photo_gallery_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';

function amazonGaleryBtn() {

    window.location = '" . SITE_URL . "jcart_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';

}



if(actionview == 'photogallery' || actionview == 'amazongallery') {

    jQuery(\"#results\").flexigrid

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

    jQuery(\"#results\").flexigrid

        (

        {   	 							

                    url: '" . $url . "',

                    dataType: 'json',

                    colModel : [

                    {display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},

                    {display: 'Stock #', name : 'stock_real_number', width : 140, sortable : true, align: 'center'},

                    {display: 'Category', name : 'sub_category', width : 140, sortable : true, align: 'center'},

                    {display: 'Item Name', name : 'item_title', width : 250, sortable : true, align: 'center'},

                    {display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},				

                    {display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},

                    {display: 'Profit', name : 'price', width : 90, sortable : true, align: 'center'},

                    {display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},

                    {display: 'Center Stone', name : 'center_stone_sizes', width : 120, sortable : false, align: 'left'},

                    {display: 'Metal Type', name : 'metal_type', width : 120, sortable : false, align: 'left'}

                    ],

                 buttons : [	{name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

                                {separator: true}

                        ],

        searchitems : [

                    {display: 'Item Number', name : 'stock_number', isdefault: true}

                    ], 		

        sortname: \"stock_number\",
        sortorder: \"ASC\",

        usepager: true,

        title: '<h1 class=\"pageheader\">Quality Gold Jewelry Items</h1>',

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

                $output = $this->load->view('admin/jcart_fashionjew_admin_quality_listing', $data, true);

                output_page($output, $data);  /// admin_common_func helper

        } else {

                $output = $this->load->view('admin/login', $data, true);

                output_page($output, $data); /// admin_common_func helper

        }

    }



    function overnight_mounting_fashionjew_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {

        if( isset($_POST['authentication_submit']) ){

            session_start();

            $oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');

            $req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", 'https://www.thegoldsourcejewelry.com/jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/'.$filter_id);

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

                window.location.href='https://www.thegoldsourcejewelry.com/jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/'.$filter_id;

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

            $this->jcartfashionmodel->uploadItemPhotoGallery($item_id_list);

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

                

                $url = SITE_URL . 'jcart_fashion_jewelry/getOvernightMountingCollectionListings/' . $action . '/' . $link_strings;

                

                

                $data['action'] = $action;

                $data['onloadextraheader'] .= "  var actionview = '".$action."';

                var home_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/view/' . $link_strings."';

                var photo_gallery_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';

function amazonGaleryBtn() {

    window.location = '" . SITE_URL . "jcart_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';

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

    $(\"#results\").flexigrid

        (

        {   	 							

                    url: '" . $url . "',

                    dataType: 'json',

                    colModel : [

                    {display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},

                    {display: 'Stock #', name : 'stock_real_number', width : 140, sortable : true, align: 'center'},

                    {display: 'Category', name : 'sub_category', width : 140, sortable : true, align: 'center'},

                    {display: 'Item Name', name : 'item_title', width : 250, sortable : true, align: 'center'},

                    {display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},				

                    {display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},

                    {display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},

                    {display: 'Center Stone', name : 'center_stone_sizes', width : 120, sortable : false, align: 'left'},

                    {display: 'Metal Type', name : 'metal_type', width : 120, sortable : false, align: 'left'}

                    ],

                 buttons : [	{name: 'Home', bclass: 'add', onpress : homeBtn}, {name: 'Delete', bclass: 'delete', onpress : test}, {name: 'Revise', bclass: 'add', onpress : test}, {name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn}, {name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

                                {separator: true}

                        ],

        searchitems : [

                    {display: 'Item Number', name : 'stock_number', isdefault: true}

                    ], 		

        sortname: \"stock_number\",

        sortorder: \"ASC\",

        usepager: true,

        title: '<h1 class=\"pageheader\">Overnight Mountings Items</h1>',

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

                $output = $this->load->view('admin/overnight_mounting_fashionjew_listing', $data, true);

                output_page($output, $data);  /// admin_common_func helper

        } else {

                $output = $this->load->view('admin/login', $data, true);

                output_page($output, $data); /// admin_common_func helper

        }

    }



	function get_main_sub_category_list(){

    	if(isset($_GET['get_main_category_value'])){

			$cat_id 	    = $_GET['get_main_category_value'];

			$get_filter_id_no 	    = $_GET['get_filter_id_no'];

			$where_cat_id 	= array('parent_id' => $cat_id);

			$where_sub_cat	= $this->Catemodel->getdata_any_table_where($where_cat_id, 'dev_ebaycategories');



			if(is_array($where_sub_cat)){

				$option_sub_cat	= '<option value="">Select One Sub Category</option>';

				foreach ($where_sub_cat as $sub_cat_value) {

					$option_sub_cat	.= '<option value="'.SITE_URL.'jcart_fashion_jewelry/stuller_fashionjew_listing/view/jewelercart/'.$get_filter_id_no.'/'.$cat_id.'/'.$sub_cat_value->category_id.'"> '.$sub_cat_value->category_name.' </option>';

				}

				echo $option_sub_cat;

			}else{

				echo $option_sub_cat	= '<option value=""> Sub Category Not Found</option>';	

			}

		}else{

			echo $option_sub_cat	= '<option value=""> Sub Category Not Found</option>';

		}

		

	}



	//// view unique ring detail

    function stuller_items_detail_edit($prod_id = 0, $type='') {

        $data['name'] = getAdminDetails(); /// admin_common_func helper

        require_once(APPPATH.'libraries/vendor/autoload.php');

        if ( isadminlogin() ) {

            if( isset($_POST['authentication_submit']) ){

                session_start();

                $oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8','8nqfek62cu');

                $req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", 'https://www.thegoldsourcejewelry.com/jcart_fashion_jewelry/stuller_items_detail/'.$prod_id.'?sendTo=etsy');

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

                    window.location.href='https://www.thegoldsourcejewelry.com/jcart_fashion_jewelry/stuller_items_detail/'.$prod_id.'?sendTo=etsy';

                    </SCRIPT>");

                

                }catch (OAuthException $e) {

        			//error_log($e->getMessage());

        			//error_log(print_r($oauth->getLastResponse(), true));

        			//error_log(print_r($oauth->getLastResponseInfo(), true));

        			//exit;

        		}

                

            }

            

            

            if( isset($_POST['btn_submit']) ){

                

                

                $access_token           = $_SESSION['oauth_token'];

                $access_token_secret    = $_SESSION['oauth_token_secret'];

                

                $oauth = new OAuth('irdmq2mj1tn2nslwx7vx2xp8', '8nqfek62cu');

                $oauth->setVersion("1.1");

                $oauth->enableDebug();

                $oauth->setToken($access_token, $access_token_secret);

                $data1 = array(); 

                

                $shippingTemplateId = '53031263588';

                $tags_input = $this->input->post('ring_item_tags'); //'test0022,test0033';

                $tags = $tags_input.',Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,vintage_rings,wedding_ring,unique_rings,antique_ring';

                

                $get_ring_price = $this->input->post('ring_price');

                $get_ring_price_percent = ($get_ring_price * 3.5) / 100;

                

                $get_ring_price_show = $get_ring_price + $get_ring_price_percent;

                

                //echo $this->input->post('ring_image');

                

    			$arr  = Array(

    					  'quantity' => 1,

    					  'title' => $this->input->post('item_title'),

    					  'description' => $this->input->post('ring_descriptions'),

    					  'price' => $get_ring_price_show,

    					  'who_made' => 'i_did',                                                        

    					  'is_supply' => 0,

    					  'when_made' => 'made_to_order',

    					  'shipping_template_id'=>(int)$shippingTemplateId

    				);	

					//echo '<pre>'; print_r($arr); exit();

				try {

					$oauth_data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings?tags=".$tags,$arr,OAUTH_HTTP_METHOD_POST);	

					$json       = $oauth->getLastResponse();

					$array      = json_decode($json,true);

					

					foreach($array['results'] as $r1){

						$listing_id = $r1['listing_id'];

						

						$source_file = dirname(realpath(__FILE__)) . "/image1_904.jpg"; // image1_906

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

            

            if(isset($_POST['produbt_edit_action'])){



				$update1Data = array(

					'item_title'	    => $this->input->post('item_title'),

					'stock_real_number'		=> $this->input->post('stock_real_number'),

					'diamond_size'		=> $this->input->post('diamond_size'),

					'total_carats'	=> $this->input->post('total_carats'),

					'gender'	=> $this->input->post('gender'),

					'vendor_name'			=> $this->input->post('vendor_name'),

					'vendor_sku'		=> $this->input->post('vendor_sku'),

					'item_sku'		=> $this->input->post('item_sku'),

					'price_amazon'		=> $this->input->post('price_website'),

					'price_ebay'		=> $this->input->post('price_website'),

					'price_website'		=> $this->input->post('price_website'),

					'metal_type'		    => $this->input->post('metal_type'),

					'category_type'		=> $this->input->post('category_type'),

					'weight'		=> $this->input->post('weight'),

					'chain_weight'	=> $this->input->post('chain_weight'),

					'quality'	=> $this->input->post('quality'),

					'center_stone_sizes'	=> $this->input->post('center_stone_sizes'),

					'avail_size'	=> $this->input->post('avail_size'),

					'description'	=> $this->input->post('description')

				);



				$this->Catemodel->update_any_table($update1Data, 'dev_jewelries', 'stock_number', $prod_id);

				

				$data['msg'] = 'Successfully Updated <b>'.$this->input->post('item_title').'</b> Product.';

				$data['msg_notify'] = 1;

			}

            

            $data['return_msg'] = $this->session->userdata('return_message');

            $rowsring = $this->jcartfashionmodel->getStullerItemDetailViaID($prod_id); //print_ar($rowsring);

            $imgs_rows = stuller_imglinks_list($rowsring); /// item jewelry section helper

            $data['rowsring'] = $rowsring;

            $data['view_type'] = $type;

            $data['extraheader'] = '<link type="text/css" rel="stylesheet" href="'.SITE_URL.'css/home_style.css" />';

            $data['ringtitle'] = $rowsring['description'];

            $data['title'] = $data['item_title'];

            $data['ringimg']   = $imgs_rows[0];

            $data['item_img_list'] = $this->getStullerItemsImgLists($imgs_rows, $data['ringtitle']);

            $data['setingtype']   = $rowsring['MerchandisingCategory3'];

            $data['maincate_name'] = $rowsring['MerchandisingCategory3'];

            $data['retail_price'] = $rowsring['price_website'] * RETAIL_PERCENT;

            $data['saving_percent'] = ( 100 - ( ( $rowsring['priceRetail'] / $data['retail_price'] ) * 100 ) );

            $data['item_details_list'] = jcart_item_details_rows( $rowsring );



                $output = $this->load->view('admin/jcart_fashionjew_item_detail', $data, true);

                output_page($output, $data); /// admin_common_func helper

        } else {

                $output = $this->load->view('admin/login', $data, true);

                output_page($output, $data); /// admin_common_func helper

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



                $shippingTemplateId = '61869938006';

                $tags_input         = '';//$this->input->post('ring_item_tags'); //'test0022,test0033';

                

                if($type == 'wb_hoops'){

                    $tags = 'Jewelry,Earrings,Hoop_Earrings,Diamond_Hoop,Ear_Hoop_Earrings,Diamond_Huggies,Diamond_Hoops,14k_Solid_Gold,Huggie_Earrings,Tiny_Hoop_Earrings,Fine_Jewelry,gift_for_her,gold_earrings,diamond_earrings,everyday_earrings';

                }else if($type == 'wb_studs'){

                    $tags = 'Jewelry,Earrings,Stud_Earrings,genuine_diamond,diamond,diamond_studs,diamond_earrings,studs,diamond_earring_stud,diamond_stud';

                }else if($type == 'wb_ladies'){

                    $tags = 'Jewelry_Rings,Wedding_Engagement,Wedding_Bands,Anniversary_Band,Gold_Wedding_Band,Engagement_Ring,10K_Custom_Band,Gift_for_Her,Ladies_Gold_Band,2mm_Wedding_Band,Gold_Midi_Ring,White_Gold_Wedding,10K_White_Gold';

                }else if($type == 'wb_mens'){

                    $tags = 'Diamond_Wedding_Ring,Diamond_Wedding_Band,Diamond_Ring,Mens_Wedding_Ring,Mens_Wedding_Band,Men_Diamond_Band,Men_Diamond_Ring,Jewelry_Necklaces,Pendants,Wedding_Ring,Wedding_Band,Gold_Wedding_Ring,Gold_Wedding_Band';

                }else if($type == 'wb_platinum'){

                    $tags = 'Jewelry_Rings,Wedding_Engagement,Wedding_Bands,Anniversary_Band,Gold_Wedding_Band,Engagement_Ring,10K_Custom_Band,Gift_for_Her,Ladies_Gold_Band,2mm_Wedding_Band,Gold_Midi_Ring,White_Gold_Wedding,10K_White_Gold';

                }else{

                    $tags = 'Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,vintage_rings,wedding_ring,unique_rings,antique_ring';

                }

                

                

                $get_ring_price = $this->input->post('ring_price');

                $get_ring_price_percent = ($get_ring_price * 3.5) / 100;

                

                $get_ring_price_show = $get_ring_price + $get_ring_price_percent;

                

                if($type == 'wb_platinum'){

                    $shop_section_id = '24930014';

                }else if($type == 'wb_mens'){

                    $shop_section_id = '24940981';

                }else if($type == 'wb_ladies'){

                    $shop_section_id = '24940985';

                }else if($type == 'wb_hoops'){

                    $shop_section_id = '24940993';

                }else if($type == 'wb_studs'){

                    $shop_section_id = '24940989';

                }else{

                   $shop_section_id = '24941057';

                }

                

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

					

					$item_img_link = $this->input->post('ring_image');

					

					//echo '<pre>'; print_r($array); exit();

					

					$data['response_etsy']      = $array['results'][0];

					

					foreach($array['results'] as $r1){

						$listing_id = $r1['listing_id'];

						

						$updateData = array('etsy_id' => $listing_id);

        				$this->adminmodel->update_any_table($updateData, 'dev_jewelries', 'stock_number', $prod_id);

						

						$source_file = dirname(realpath(__FILE__)) . "/image1_906.jpg"; // $item_img_link image1_906

						//echo $source_file; exit();

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

            

            

            if( isset($_POST['btn_revise_submit']) ){

                

                

                $access_token           = $_SESSION['oauth_token'];

                $access_token_secret    = $_SESSION['oauth_token_secret'];

                

                $oauth = new OAuth('k08eccol9wh33wmldh13eonw', 'bad6tsimn2');

                $oauth->setVersion("1.1");

                $oauth->enableDebug();

                $oauth->setToken($access_token, $access_token_secret);

                $data1 = array(); 

                

                $shippingTemplateId = '61869938006';

                $tags_input         = '';//$this->input->post('ring_item_tags'); //'test0022,test0033';

                

                if($type == 'wb_hoops'){

                    $tags = 'Jewelry,Earrings,Hoop_Earrings,Diamond_Hoop,Ear_Hoop_Earrings,Diamond_Huggies,Diamond_Hoops,14k_Solid_Gold,Huggie_Earrings,Tiny_Hoop_Earrings,Fine_Jewelry,gift_for_her,gold_earrings,diamond_earrings,everyday_earrings';

                }else if($type == 'wb_studs'){

                    $tags = 'Jewelry,Earrings,Stud_Earrings,genuine_diamond,diamond,diamond_studs,diamond_earrings,studs,diamond_earring_stud,diamond_stud';

                }else if($type == 'wb_ladies'){

                    $tags = 'Jewelry_Rings,Wedding_Engagement,Wedding_Bands,Anniversary_Band,Gold_Wedding_Band,Engagement_Ring,10K_Custom_Band,Gift_for_Her,Ladies_Gold_Band,2mm_Wedding_Band,Gold_Midi_Ring,White_Gold_Wedding,10K_White_Gold';

                }else if($type == 'wb_mens'){

                    $tags = 'Diamond_Wedding_Ring,Diamond_Wedding_Band,Diamond_Ring,Mens_Wedding_Ring,Mens_Wedding_Band,Men_Diamond_Band,Men_Diamond_Ring,Jewelry_Necklaces,Pendants,Wedding_Ring,Wedding_Band,Gold_Wedding_Ring,Gold_Wedding_Band';

                }else if($type == 'wb_platinum'){

                    $tags = 'Jewelry_Rings,Wedding_Engagement,Wedding_Bands,Anniversary_Band,Gold_Wedding_Band,Engagement_Ring,10K_Custom_Band,Gift_for_Her,Ladies_Gold_Band,2mm_Wedding_Band,Gold_Midi_Ring,White_Gold_Wedding,10K_White_Gold';

                }else{

                    $tags = 'Jewelry,Rings,Engagement_Rings,diamond_rings,moissanite_rings,unique_ring,PILLOW_CUT_STONE,vintage_rings,wedding_ring,unique_rings,antique_ring';

                }

                

                

                $get_ring_price = $this->input->post('ring_price');

                $get_ring_price_percent = ($get_ring_price * 3.5) / 100;

                

                $get_ring_price_show = $get_ring_price + $get_ring_price_percent;

                

                if($type == 'wb_platinum'){

                    $shop_section_id = '24930014';

                }else if($type == 'wb_mens'){

                    $shop_section_id = '24940981';

                }else if($type == 'wb_ladies'){

                    $shop_section_id = '24940985';

                }else if($type == 'wb_hoops'){

                    $shop_section_id = '24940993';

                }else if($type == 'wb_studs'){

                    $shop_section_id = '24940989';

                }else{

                   $shop_section_id = '24941057';

                }

                

    			$arr  = Array(

    					  'title' => $this->input->post('item_title'),

    					  'description' => $this->input->post('ring_descriptions'),

    					  'price' => $get_ring_price_show

    				);	

					//echo '<pre>'; print_r($arr); exit();

				try {

					//$oauth_data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings?tags=".$tags,$arr,OAUTH_HTTP_METHOD_POST);

					

					$etsy_id = $this->input->post('etsy_id');

					

					$oauth_data = $oauth->fetch("https://openapi.etsy.com/v2/private/listings/".$etsy_id."?state=active&tags=".$tags,$arr,OAUTH_HTTP_METHOD_PUT);	

					

					$json       = $oauth->getLastResponse();

					$array      = json_decode($json,true);

					

					$item_img_link = $this->input->post('ring_image');

					

					//echo '<pre>'; print_r($array); exit();

					

					$data['response_etsy']      = $array['results'][0];

					

					foreach($array['results'] as $r1){

						$listing_id = $r1['listing_id'];

						

						$updateData = array('etsy_id' => $listing_id);

        				$this->adminmodel->update_any_table($updateData, 'dev_jewelries', 'stock_number', $prod_id);

						

						$source_file = dirname(realpath(__FILE__)) . "/image1_906.jpg"; // $item_img_link image1_906

						//echo $source_file; exit();

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

            

            if(isset($_POST['produbt_edit_action'])){



				$update1Data = array(

					'item_title'	    => $this->input->post('item_title'),

					'stock_real_number'		=> $this->input->post('stock_real_number'),

					'diamond_size'		=> $this->input->post('diamond_size'),

					'total_carats'	=> $this->input->post('total_carats'),

					'gender'	=> $this->input->post('gender'),

					'vendor_name'			=> $this->input->post('vendor_name'),

					'vendor_sku'		=> $this->input->post('vendor_sku'),

					'item_sku'		=> $this->input->post('item_sku'),

					'price_amazon'		=> $this->input->post('price_website'),

					'price_ebay'		=> $this->input->post('price_website'),

					'price_website'		=> $this->input->post('price_website'),

					'metal_type'		    => $this->input->post('metal_type'),

					'category_type'		=> $this->input->post('category_type'),

					'weight'		=> $this->input->post('weight'),

					'chain_weight'	=> $this->input->post('chain_weight'),

					'quality'	=> $this->input->post('quality'),

					'center_stone_sizes'	=> $this->input->post('center_stone_sizes'),

					'avail_size'	=> $this->input->post('avail_size'),

					'description'	=> $this->input->post('description')

				);



				$this->Catemodel->update_any_table($update1Data, 'dev_jewelries', 'stock_number', $prod_id);

				

				$data['msg'] = 'Successfully Updated <b>'.$this->input->post('item_title').'</b> Product.';

				$data['msg_notify'] = 1;

			}

            

            $data['return_msg'] = $this->session->userdata('return_message');

            $rowsring = $this->jcartfashionmodel->getStullerItemDetailViaID($prod_id); //print_ar($rowsring);

            $imgs_rows = stuller_imglinks_list($rowsring); /// item jewelry section helper

            $data['rowsring'] = $rowsring;

            $data['view_type'] = $type;

            $data['extraheader'] = '<link type="text/css" rel="stylesheet" href="'.SITE_URL.'css/home_style.css" />';

            $data['ringtitle'] = $rowsring['description'];

            $data['title'] = $data['item_title'];

            $data['ringimg']   = $imgs_rows[0];

            $data['item_img_list'] = $this->getStullerItemsImgLists($imgs_rows, $data['ringtitle']);

            $data['setingtype']   = $rowsring['MerchandisingCategory3'];

            $data['maincate_name'] = $rowsring['MerchandisingCategory3'];

            $data['retail_price'] = $rowsring['price_website'] * RETAIL_PERCENT;

            $data['saving_percent'] = ( 100 - ( ( $rowsring['priceRetail'] / $data['retail_price'] ) * 100 ) );

            $data['item_details_list'] = jcart_item_details_rows( $rowsring );



                $output = $this->load->view('admin/stuller_items_detail', $data, true);

                output_page($output, $data); /// admin_common_func helper

        } else {

                $output = $this->load->view('admin/login', $data, true);

                output_page($output, $data); /// admin_common_func helper

        }

    }



    function update_prive_retail_by_id_wise(){

    	if(isset($_GET['product_id']) AND isset($_GET['ringsMetalPrice']) ){

			$product_id 	        = $_GET['product_id'];

			if($product_id AND $_GET['ringsMetalPrice'] ){

				$update2Data = array(

					'price_amazon'	=> $_GET['ringsMetalPrice'],

					'price_ebay'	=> $_GET['ringsMetalPrice'],

					'price_website'	=> $_GET['ringsMetalPrice']

				);

				$return  =  $this->Catemodel->update_any_table($update2Data, 'dev_jewelries', 'stock_number', $product_id);

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

		$results = $this->jcartfashionmodel->getCollectionJewListing('HD', 0, '', 1, 200, 'id', 'DESC', '', 'id');

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

        $item_img = $this->jcartfashionmodel->get_item_imgs( $item_id );

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

        $results = $this->jcartfashionmodel->getCollectionJewListing('ERPHD', 0, '', 1, 1000);

        $item_id = '';

        foreach( $results['result'] as $rows ) {

            $img_link = ''; //$this->jewelry_item_img( $rows['id'] );

            $item_id .= $rows['id'] . ' = ' . $img_link . '<br>';

        }

        echo $item_id;

    }



    function update_market_id($item_id=0, $item_field='', $field_id=0) {

        $this->jcartfashionmodel->updateMarketID($item_id, $item_field, $field_id);

    }



	function getCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {

		$page = isset($_POST['page']) ? $_POST['page'] : 0;

		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;

		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'stock_number';

		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';

		$query = isset($_POST['query']) ? $_POST['query'] : '';

		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'stock_number';

		$results = $this->jcartfashionmodel->getStullerItemOvermountingRows($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);

		$delink_url = SITE_URL.'admin/deleteShapeLink/';



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



		foreach ($results['result'] as $row) {

			$items_image = stuller_fashionjew_imgs( $row['Images'] );   /// item jewelry section helper

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

			}

			$item_image = $jewelry_img;

			$prod_name = $row['Description'];

			$item_shape = '';

			$detail_link = SITE_URL . "jcart_fashion_jewelry/stuller_items_detail_edit/" . $row['stock_number'];

			$etsy_detail_link = SITE_URL . 'jcart_fashion_jewelry/stuller_items_detail/'.$row['stock_number'].'?sendTo=etsy';

			$newTotalCarat = '';

			$new_center_carat = '';

			$oldCertView = '';

			$newCertView = '';

			if( $row['ebayid'] != '-2' ) {

				$ebayLink = 'http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item='.$row['ebayid'];

			} else {

				$ebayLink = '#';

			}

			$imgrow = $this->jcartfashionmodel->getMoreItemImgList($row['stock_number']);

			$item_profit = '';

			//$diamond_row = $this->jcartfashionmodel->getIndexDiamondDetail($row['diamond_lot_id'], 'lot');

			$pk_id = $row['stock_number'];

			$ebay_id   = 'ebay_'.$row['stock_number'];

			$amazon_id = 'amazon_'.$row['stock_number'];

			$sears_id  = 'sears_'.$row['stock_number'];

			$esty_id   = 'etsy_'.$row['stock_number'];

			$lst_id    = 'lst_'.$row['stock_number'];

			$ebay_h = 'ebay_h_'.$row['stock_number'];

			$ebay_c = 'ebay_c_'.$row['stock_number'];

			$amazon_h = 'amazon_h_'.$row['stock_number'];

			$amazon_c = 'amazon_c_'.$row['stock_number'];

			$sears_h = 'sears_h_'.$row['stock_number'];

			$sears_c = 'sears_c_'.$row['stock_number'];

			$esty_h = 'esty_h_'.$row['stock_number'];

			$esty_c = 'esty_c_'.$row['stock_number'];

			$lstdibbs_h = 'lstdibbs_h_'.$row['stock_number'];

			$lstdibbs_c = 'lstdibbs_c_'.$row['stock_number'];

			$check_box_class = 'class=\"bookid\"';



			if ($rc )

				$json .= ",";

				$json .= "\n {";



            $json .= "id:'" . $row['stock_number'] . "',";

            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['stock_number']."\" />ID #: " . $row['stock_number'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/view\' target=\"_blank\" class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>". "<table class=\"set_ckbox_table\">". "</table>'";



			if($action == 'photogallery') {

				$json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";    

				$json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";  

				$json .= ",'" . addslashes( getMarketMoreImgView($imgrow['ebay_img2']) . '<input type="file" name="eb2_'.$pk_id.'" />' ) . "'";

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

				$ringPrice = $row['price_website'];

				$check_cate = strchr($cate_id, 'Cross');

				if( empty($check_cate) ) {

					$semi_label = '';

				} else {

					$semi_label = 'Semi ';

				}



				$total_ring_diamond_price = $ringPrice;

				$center_carat_weight = $row['Weight'];



				$diamond_detail = '';

				$update_center_diamond = '';

				$where_dev_ebaycategories_cat	= array('category_id' => $row['subcategory']);

				$dev_ebaycategories_data		= $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');



                $json .= ",'" . addslashes($row['item_title']) . " '";

                $json .= ",'" . addslashes($row['category']) . " '";

                $json .= ",'" . addslashes($row['item_title']) . " '";

                $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''.  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['stock_number']."\">View Image</a>". "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['stock_number']."\">View Video</a>'";

                $json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>". "<input type=\"text\" name=\"jitem_price\" id=\"over_mounting_price_".$row['stock_number']."\" onkeyup=\"updateJitemPriceMW(\'".$row['stock_number']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";

                if($row['category'] == '740520120'){

                    $json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/2.5) , 2)) . " '";

                }else{

                    $json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/3) , 2)) . " '";

                }



				$json .= ",'". addslashes($row['total_carats']) ." <div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"jewelryimg_".$row['stock_number']."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\" style=\"width: 100% !important;\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title ringProdTitle\" id=\"myModalLabel\" style=\"text-align:left;\">Item: ".$prod_name."</h4></div><div class=\"modal-body\"><div class=\"vide_view_block set_imgview\"><img src=\'".$item_image."\' alt=\'".$prod_name."\' /></div><br></div></div></div></div>'";



                $json .= ",'" . addslashes($row['center_stone_sizes']) . " '";

                $json .= ",'" . addslashes($row['metal_type']) . " '";

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



	function getCollection360_Engagement_RingsListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {

            $page = isset($_POST['page']) ? $_POST['page'] : 0;

            $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;

            $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'stock_number';

            $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';

            $query = isset($_POST['query']) ? $_POST['query'] : '';

            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'stock_number';

            $results = $this->jcartfashionmodel->getStullerItemRowsMarketplace360_Engagement_Rings($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);

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

                $items_image = stuller_fashionjew_imgs( $row['Images'] );   /// item jewelry section helper

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

                }

                $item_image = $jewelry_img;

                

                

                $prod_name = $row['Description'];

                $item_shape = '';

                //$this->get_center_idex_diamond($row['id'], $item_shape);  /// update idex diamond

                //$feat_desc = str_replace(array("'", '`', '/'), '', $feat_detail['desc']);

                $detail_link = SITE_URL . "jcart_fashion_jewelry/stuller_items_detail_edit/" . $row['stock_number'];

                $etsy_detail_link = SITE_URL . 'jcart_fashion_jewelry/stuller_items_detail/'.$row['stock_number'].'?sendTo=etsy';

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

                $imgrow = $this->jcartfashionmodel->getMoreItemImgList($row['stock_number']);

                $item_profit = ''; //$this->getIRingItemProfit($row['diamond_lot_id'], $row['Price'], $row['Price'], $row['Price']);

                $diamond_row = $this->jcartfashionmodel->getIndexDiamondDetail($row['diamond_lot_id'], 'lot');

                $pk_id = $row['stock_number'];  /// primary key id

                

//                if( $row['id'] == 22 ) {

//                    $popup_img = '<div class="popup-gallery"><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_45.jpg"><img src="http://www.heartsanddiamonds.com/img/search_plus_ic.png" alt="" width="28"></a><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_90.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_45.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_90.jpg"></a></div>';

//                } else {

//                    $popup_img = '';

//                }

                //$rowother = array();

                $ebay_id   = 'ebay_'.$row['stock_number'];

                $amazon_id = 'amazon_'.$row['stock_number'];

                $sears_id  = 'sears_'.$row['stock_number'];

                $esty_id   = 'etsy_'.$row['stock_number'];

                $lst_id    = 'lst_'.$row['stock_number'];

                $ebay_h = 'ebay_h_'.$row['stock_number'];

                $ebay_c = 'ebay_c_'.$row['stock_number'];

                $amazon_h = 'amazon_h_'.$row['stock_number'];

                $amazon_c = 'amazon_c_'.$row['stock_number'];

                $sears_h = 'sears_h_'.$row['stock_number'];

                $sears_c = 'sears_c_'.$row['stock_number'];

                $esty_h = 'esty_h_'.$row['stock_number'];

                $esty_c = 'esty_c_'.$row['stock_number'];

                $lstdibbs_h = 'lstdibbs_h_'.$row['stock_number'];

                $lstdibbs_c = 'lstdibbs_c_'.$row['stock_number'];

                //$check_box_class = ( !empty($row['ebay_field']) ? 'class=\"bookid\"' : 'class=\"bookid_new\"' );

                $check_box_class = 'class=\"bookid\"';

                

                if ($rc )

                    

                $json .= ",";

                $json .= "\n {";

                

            $json .= "id:'" . $row['stock_number'] . "',";

            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['stock_number']."\" />ID #: " . $row['stock_number'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/view\' target=\"_blank\" class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>"

                        . "<table class=\"set_ckbox_table\">"

                        /*. "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_ebay\" ".checkedBox($ebay_id, $row['ebay_field'])." id=\"".$ebay_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_id."\', \'ebay_field\')\" /><label for=\"".$ebay_id."\" class=\"set_lable\">Ebay</label></td>"

                        . "<th><input type=\"checkbox\" name=\"ebay_h\" id=\"".$ebay_h."\" value=\"".$ebay_h."\" ".checkedBox($ebay_h, $row['ebay_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_h."\', \'ebay_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"ebay_c\" id=\"".$ebay_c."\" value=\"".$ebay_c."\" ".checkedBox($ebay_c, $row['ebay_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_c."\', \'ebay_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_amzon\" ".checkedBox($amazon_id, $row['amazon_field'])." id=\"".$amazon_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_id."\', \'amazon_field\')\" /><label for=\"".$amazon_id."\" class=\"set_lable\">Amazon</label></td>"

                        . "<th><input type=\"checkbox\" name=\"amazon_h\" id=\"".$amazon_h."\" value=\"".$amazon_h."\" ".checkedBox($amazon_h, $row['amazon_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_h."\', \'amazon_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"amazon_c\" id=\"".$amazon_c."\" value=\"".$amazon_c."\" ".checkedBox($amazon_c, $row['amazon_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_c."\', \'amazon_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_esty\" ".checkedBox($esty_id, $row['esty_field'])." id=\"".$esty_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_id."\', \'esty_field\')\" /><label for=\"".$esty_id."\" class=\"set_lable\">Etsy</label></td>"

                        . "<th><input type=\"checkbox\" name=\"esty_h\" id=\"".$esty_h."\" value=\"".$esty_h."\" ".checkedBox($esty_h, $row['esty_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_h."\', \'esty_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"esty_c\" id=\"".$esty_c."\" value=\"".$esty_c."\" ".checkedBox($esty_c, $row['esty_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_c."\', \'esty_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"*/

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

                $ringPrice = $row['price_website']; //check_empty($row['ring_price'], $row['price']);

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

                

                $where_dev_ebaycategories_cat    = array('category_id' => $row['subcategory']);

                $dev_ebaycategories_data         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');

                

                $json .= ",'" . addslashes($row['stock_real_number']) . " '";

                $json .= ",'" . addslashes($dev_ebaycategories_data['0']->category_name) . " '";

                $json .= ",'" . addslashes($row['item_title']) . " '";

                $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''

                        .  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['stock_number']."\">View Image</a>"

                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['stock_number']."\">View Video</a>'";

                

                $json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>"

                        . "<input type=\"text\" name=\"jitem_price\" id=\"over_mounting_price_".$row['stock_number']."\" onkeyup=\"updateJitemPriceMW(\'".$row['stock_number']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";

                

                if($row['category'] == '740520120'){

                    $json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/2.5) , 2)) . " '";

                }else{

                    $json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/3) , 2)) . " '";

                }    

                

                $json .= ",'" . addslashes($row['total_carats']) . " '";

                $json .= ",'" . addslashes($row['center_stone_sizes']) . " '";

                $json .= ",'" . addslashes($row['metal_type']) . " '";

                /*$json .= ",'" . addslashes($row['clarity']) . " '";

                $json .= ",'" . addslashes($row['color']) . " '";

                $json .= ",'" . addslashes($row['Cert']) . " '";

                $json .= ",'" . addslashes($row['Weight'] . '<br>' . $oldCertView) . " '";

                $json .= ",'" . addslashes($row['Sku']) . " '";

                $json .= ",'" . addslashes($row['productType']) . " '";*/

                

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



	function getQualityGoldCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {
            $page = isset($_POST['page']) ? $_POST['page'] : 0;

            $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;

            $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'item_title';

            $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'asc';

            $query = isset($_POST['query']) ? $_POST['query'] : '';

            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'stock_number';

            $results = $this->jcartfashionmodel->getQualityGoldItemRowsMarketplaceJewelry($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);

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

                $items_image = stuller_fashionjew_imgs( $row['Images'] );   /// item jewelry section helper

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

                }

                $item_image = $jewelry_img;

                

                

                $prod_name = $row['Description'];

                $item_shape = '';

                //$this->get_center_idex_diamond($row['id'], $item_shape);  /// update idex diamond

                //$feat_desc = str_replace(array("'", '`', '/'), '', $feat_detail['desc']);

                $detail_link = SITE_URL . "jcart_fashion_jewelry/stuller_items_detail_edit/" . $row['stock_number'];

                $etsy_detail_link = SITE_URL . 'jcart_fashion_jewelry/stuller_items_detail/'.$row['stock_number'].'?sendTo=etsy';

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

                $imgrow = $this->jcartfashionmodel->getMoreItemImgList($row['stock_number']);

                $item_profit = ''; //$this->getIRingItemProfit($row['diamond_lot_id'], $row['Price'], $row['Price'], $row['Price']);

                $diamond_row = $this->jcartfashionmodel->getIndexDiamondDetail($row['diamond_lot_id'], 'lot');

                $pk_id = $row['stock_number'];  /// primary key id

                

//                if( $row['id'] == 22 ) {

//                    $popup_img = '<div class="popup-gallery"><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_45.jpg"><img src="http://www.heartsanddiamonds.com/img/search_plus_ic.png" alt="" width="28"></a><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_90.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_45.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_90.jpg"></a></div>';

//                } else {

//                    $popup_img = '';

//                }

                //$rowother = array();

                $ebay_id   = 'ebay_'.$row['stock_number'];

                $amazon_id = 'amazon_'.$row['stock_number'];

                $sears_id  = 'sears_'.$row['stock_number'];

                $esty_id   = 'etsy_'.$row['stock_number'];

                $lst_id    = 'lst_'.$row['stock_number'];

                $ebay_h = 'ebay_h_'.$row['stock_number'];

                $ebay_c = 'ebay_c_'.$row['stock_number'];

                $amazon_h = 'amazon_h_'.$row['stock_number'];

                $amazon_c = 'amazon_c_'.$row['stock_number'];

                $sears_h = 'sears_h_'.$row['stock_number'];

                $sears_c = 'sears_c_'.$row['stock_number'];

                $esty_h = 'esty_h_'.$row['stock_number'];

                $esty_c = 'esty_c_'.$row['stock_number'];

                $lstdibbs_h = 'lstdibbs_h_'.$row['stock_number'];

                $lstdibbs_c = 'lstdibbs_c_'.$row['stock_number'];

                //$check_box_class = ( !empty($row['ebay_field']) ? 'class=\"bookid\"' : 'class=\"bookid_new\"' );

                $check_box_class = 'class=\"bookid\"';

                

                if ($rc )

                    

                $json .= ",";

                $json .= "\n {";

                

            $json .= "id:'" . $row['stock_number'] . "',";

            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['stock_number']."\" />ID #: " . $row['stock_number'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/view\' target=\"_blank\" class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>"

                        . "<table class=\"set_ckbox_table\">"

                        /*. "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_ebay\" ".checkedBox($ebay_id, $row['ebay_field'])." id=\"".$ebay_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_id."\', \'ebay_field\')\" /><label for=\"".$ebay_id."\" class=\"set_lable\">Ebay</label></td>"

                        . "<th><input type=\"checkbox\" name=\"ebay_h\" id=\"".$ebay_h."\" value=\"".$ebay_h."\" ".checkedBox($ebay_h, $row['ebay_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_h."\', \'ebay_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"ebay_c\" id=\"".$ebay_c."\" value=\"".$ebay_c."\" ".checkedBox($ebay_c, $row['ebay_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_c."\', \'ebay_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_amzon\" ".checkedBox($amazon_id, $row['amazon_field'])." id=\"".$amazon_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_id."\', \'amazon_field\')\" /><label for=\"".$amazon_id."\" class=\"set_lable\">Amazon</label></td>"

                        . "<th><input type=\"checkbox\" name=\"amazon_h\" id=\"".$amazon_h."\" value=\"".$amazon_h."\" ".checkedBox($amazon_h, $row['amazon_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_h."\', \'amazon_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"amazon_c\" id=\"".$amazon_c."\" value=\"".$amazon_c."\" ".checkedBox($amazon_c, $row['amazon_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_c."\', \'amazon_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_esty\" ".checkedBox($esty_id, $row['esty_field'])." id=\"".$esty_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_id."\', \'esty_field\')\" /><label for=\"".$esty_id."\" class=\"set_lable\">Etsy</label></td>"

                        . "<th><input type=\"checkbox\" name=\"esty_h\" id=\"".$esty_h."\" value=\"".$esty_h."\" ".checkedBox($esty_h, $row['esty_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_h."\', \'esty_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"esty_c\" id=\"".$esty_c."\" value=\"".$esty_c."\" ".checkedBox($esty_c, $row['esty_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_c."\', \'esty_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"*/

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

                $ringPrice = $row['price_website']; //check_empty($row['ring_price'], $row['price']);

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

                

                $where_dev_ebaycategories_cat    = array('category_id' => $row['subcategory']);

                $dev_ebaycategories_data         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');

                

                $json .= ",'" . addslashes($row['stock_real_number']) . " '";

                $json .= ",'" . addslashes($dev_ebaycategories_data['0']->category_name) . " '";

                $json .= ",'" . addslashes($row['item_title']) . " '";

                $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''

                        .  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['stock_number']."\">View Image</a>"

                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['stock_number']."\">View Video</a>'";

                

                $json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>"

                        . "<input type=\"text\" name=\"jitem_price\" id=\"over_mounting_price_".$row['stock_number']."\" onkeyup=\"updateJitemPriceMW(\'".$row['stock_number']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";

                

                if($row['category'] == '740520120'){

                    $json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/2.5) , 2)) . " '";

                }else{

                    $json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/3) , 2)) . " '";

                }    

                

                $json .= ",'" . addslashes($row['total_carats']) . " '";

                $json .= ",'" . addslashes($row['center_stone_sizes']) . " '";

                $json .= ",'" . addslashes($row['metal_type']) . " '";

                /*$json .= ",'" . addslashes($row['clarity']) . " '";

                $json .= ",'" . addslashes($row['color']) . " '";

                $json .= ",'" . addslashes($row['Cert']) . " '";

                $json .= ",'" . addslashes($row['Weight'] . '<br>' . $oldCertView) . " '";

                $json .= ",'" . addslashes($row['Sku']) . " '";

                $json .= ",'" . addslashes($row['productType']) . " '";*/

                

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



	function getOvernightMountingCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {

            $page = isset($_POST['page']) ? $_POST['page'] : 0;

            $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;

            $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'stock_number';

            $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';

            $query = isset($_POST['query']) ? $_POST['query'] : '';

            $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'stock_number';

            $results = $this->jcartfashionmodel->getStullerItemRowsOverMounting($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);

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

                $items_image = stuller_fashionjew_imgs( $row['Images'] );   /// item jewelry section helper

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

                }

                $item_image = $jewelry_img;

                

                

                $prod_name = $row['Description'];

                $item_shape = '';

                //$this->get_center_idex_diamond($row['id'], $item_shape);  /// update idex diamond

                //$feat_desc = str_replace(array("'", '`', '/'), '', $feat_detail['desc']);

                $detail_link = SITE_URL . "jcart_fashion_jewelry/stuller_items_detail/" . $row['stock_number'];

                $etsy_detail_link = SITE_URL . 'jcart_fashion_jewelry/stuller_items_detail/'.$row['stock_number'].'?sendTo=etsy';

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

                $imgrow = $this->jcartfashionmodel->getMoreItemImgList($row['stock_number']);

                $item_profit = ''; //$this->getIRingItemProfit($row['diamond_lot_id'], $row['Price'], $row['Price'], $row['Price']);

                $diamond_row = $this->jcartfashionmodel->getIndexDiamondDetail($row['diamond_lot_id'], 'lot');

                $pk_id = $row['stock_number'];  /// primary key id

                

//                if( $row['id'] == 22 ) {

//                    $popup_img = '<div class="popup-gallery"><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_45.jpg"><img src="http://www.heartsanddiamonds.com/img/search_plus_ic.png" alt="" width="28"></a><a href="http://173.230.130.50:8888/Images/HD8003WhiteImage_90.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_45.jpg"></a><a href="http://173.230.130.50:8888/Images/HD8003RoseImage_90.jpg"></a></div>';

//                } else {

//                    $popup_img = '';

//                }

                //$rowother = array();

                $ebay_id   = 'ebay_'.$row['stock_number'];

                $amazon_id = 'amazon_'.$row['stock_number'];

                $sears_id  = 'sears_'.$row['stock_number'];

                $esty_id   = 'etsy_'.$row['stock_number'];

                $lst_id    = 'lst_'.$row['stock_number'];

                $ebay_h = 'ebay_h_'.$row['stock_number'];

                $ebay_c = 'ebay_c_'.$row['stock_number'];

                $amazon_h = 'amazon_h_'.$row['stock_number'];

                $amazon_c = 'amazon_c_'.$row['stock_number'];

                $sears_h = 'sears_h_'.$row['stock_number'];

                $sears_c = 'sears_c_'.$row['stock_number'];

                $esty_h = 'esty_h_'.$row['stock_number'];

                $esty_c = 'esty_c_'.$row['stock_number'];

                $lstdibbs_h = 'lstdibbs_h_'.$row['stock_number'];

                $lstdibbs_c = 'lstdibbs_c_'.$row['stock_number'];

                //$check_box_class = ( !empty($row['ebay_field']) ? 'class=\"bookid\"' : 'class=\"bookid_new\"' );

                $check_box_class = 'class=\"bookid\"';

                

                if ($rc )

                    

                $json .= ",";

                $json .= "\n {";

                

            $json .= "id:'" . $row['stock_number'] . "',";

            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['stock_number']."\" />ID #: " . $row['stock_number'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/view\' target=\"_blank\" class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>"

                        . "<table class=\"set_ckbox_table\">"

                        /*. "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_ebay\" ".checkedBox($ebay_id, $row['ebay_field'])." id=\"".$ebay_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_id."\', \'ebay_field\')\" /><label for=\"".$ebay_id."\" class=\"set_lable\">Ebay</label></td>"

                        . "<th><input type=\"checkbox\" name=\"ebay_h\" id=\"".$ebay_h."\" value=\"".$ebay_h."\" ".checkedBox($ebay_h, $row['ebay_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_h."\', \'ebay_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"ebay_c\" id=\"".$ebay_c."\" value=\"".$ebay_c."\" ".checkedBox($ebay_c, $row['ebay_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$ebay_c."\', \'ebay_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_amzon\" ".checkedBox($amazon_id, $row['amazon_field'])." id=\"".$amazon_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_id."\', \'amazon_field\')\" /><label for=\"".$amazon_id."\" class=\"set_lable\">Amazon</label></td>"

                        . "<th><input type=\"checkbox\" name=\"amazon_h\" id=\"".$amazon_h."\" value=\"".$amazon_h."\" ".checkedBox($amazon_h, $row['amazon_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_h."\', \'amazon_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"amazon_c\" id=\"".$amazon_c."\" value=\"".$amazon_c."\" ".checkedBox($amazon_c, $row['amazon_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$amazon_c."\', \'amazon_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"

                        . "<td><input type=\"checkbox\" name=\"cb_esty\" ".checkedBox($esty_id, $row['esty_field'])." id=\"".$esty_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_id."\', \'esty_field\')\" /><label for=\"".$esty_id."\" class=\"set_lable\">Etsy</label></td>"

                        . "<th><input type=\"checkbox\" name=\"esty_h\" id=\"".$esty_h."\" value=\"".$esty_h."\" ".checkedBox($esty_h, $row['esty_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_h."\', \'esty_h\')\" /></th>"

                        . "<th><input type=\"checkbox\" name=\"esty_c\" id=\"".$esty_c."\" value=\"".$esty_c."\" ".checkedBox($esty_c, $row['esty_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_c."\', \'esty_c\')\" /></th>"

                        . "</tr>"

                        . "<tr>"*/

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

                $ringPrice = $row['price_website']; //check_empty($row['ring_price'], $row['price']);

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

                

                $where_dev_ebaycategories_cat    = array('category_id' => $row['subcategory']);

                $dev_ebaycategories_data         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');

                

                $json .= ",'" . addslashes($row['stock_real_number']) . " '";

                $json .= ",'" . addslashes($dev_ebaycategories_data['0']->category_name) . " '";

                $json .= ",'" . addslashes($row['item_title']) . " '";

                $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''

                        .  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['stock_number']."\">View Image</a>"

                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['stock_number']."\">View Video</a>'";

                

                $json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>"

                        . "<input type=\"text\" name=\"jitem_price\" id=\"over_mounting_price_".$row['stock_number']."\" onkeyup=\"updateJitemPriceMW(\'".$row['stock_number']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";



                $json .= ",'" . addslashes($row['total_carats']) . " '";

                $json .= ",'" . addslashes($row['center_stone_sizes']) . " '";

                $json .= ",'" . addslashes($row['metal_type']) . " '";

                /*$json .= ",'" . addslashes($row['clarity']) . " '";

                $json .= ",'" . addslashes($row['color']) . " '";

                $json .= ",'" . addslashes($row['Cert']) . " '";

                $json .= ",'" . addslashes($row['Weight'] . '<br>' . $oldCertView) . " '";

                $json .= ",'" . addslashes($row['Sku']) . " '";

                $json .= ",'" . addslashes($row['productType']) . " '";*/

                

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

            $results = $this->jcartfashionmodel->getIndexDiamondDetail($diamondID, 'lot');

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

        $itemdetail = $this->jcartfashionmodel->getItemDetailViaID($item_id);

        

        $results = $this->jcartfashionmodel->getCenterDiamondFilterResults($_GET, $item_id, $item_shape, $itemPrice, $items_carat, $minprice, $maxprice, $mcarat, $maxcarat);

        $item_details = $this->jcartfashionmodel->getItemSpecification($item_id, 'dev_ebay_details');

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

        $results = $this->jcartfashionmodel->getSimilarItemLists($id, $itemShape, $item_price); //print_ar($results);

        $itemdetail = $this->jcartfashionmodel->getItemDetailViaID($id);

        $item_cate = urldecode($itemCate);

        $item_details = $this->jcartfashionmodel->getItemSpecification($id, 'dev_ebay_details');

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

        

        $this->jcartfashionmodel->updateItemDMInfo($itemID, $diamondID);

        

        echo 'Item Diamond info has changed successfully!';

        

    }



    //// update the items diamond info

    function update_jitems_price($itemID=0, $items_price=0) {

        $item_price = str_replace(array('$', ','), '', $items_price);

        $this->jcartfashionmodel->updateJewelryItemPrice($itemID, $item_price);

        

    }



    function update_jewelry_item($id=0) {

       $embed_value = urldecode( $this->input->get('embed_value') );



       $this->jcartfashionmodel->updateJewelryItemEmbedLink($id, $embed_value);

    }



    function update_jewcarat_value($id=0) {

       $center_carat = $this->input->get('center_carat');

       $side_carat   = $this->input->get('side_carat');



       $this->jcartfashionmodel->updateJewItemCarat($id, $center_carat, $side_carat);

    }



    function update_item_newprice($id=0, $newprice=0) {

       $this->jcartfashionmodel->updateNewPrice($id, $newprice);

    }



    function updateJewelryItemIDWithRandomNumber() {

        $this->jcartfashionmodel->update_item_detail_itemid();



        echo 'Item ID has updated Successfully!';

    }



	function costar_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {

        $data['name'] = getAdminDetails();

		$item_category = urldecode($id);

        $item_sub_category = urldecode($sub_id);    

        $data['view_type'] = $type;

        $data['item_sub_category'] = $item_sub_category;

        $data['filter_id_no'] = $filter_id;

        $data['category_id'] = $item_category;

        $this->session->unset_userdata('return_message');



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

			$("#rapnet").click();';

			$link_strings = $type.'/'. $filter_id. '/'. $item_category. '/'. $item_sub_category;

			$url = SITE_URL . 'jcart_fashion_jewelry/getCostarCollectionListings/' . $action . '/' . $link_strings;

			$data['action'] = $action;

			$data['onloadextraheader'] .= "  var actionview = '".$action."';

			var home_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/view/' . $link_strings."';

			var photo_gallery_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';

			function amazonGaleryBtn() {

				window.location = '" . SITE_URL . "jcart_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';

			}



			if(actionview == 'photogallery' || actionview == 'amazongallery') {

				jQuery(\"#results\").flexigrid({

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

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},

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

				});

			} else {

				jQuery(\"#results\").flexigrid({

					url: '" . $url . "',

					dataType: 'json',

					colModel : [

						{display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},

						{display: 'Stock #', name : 'stock_real_number', width : 140, sortable : true, align: 'center'},

						{display: 'Category', name : 'sub_category', width : 140, sortable : true, align: 'center'},

						{display: 'Item Name', name : 'item_title', width : 250, sortable : true, align: 'center'},

						{display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},

						{display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Profit', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},

						{display: 'Center Stone', name : 'center_stone_sizes', width : 120, sortable : false, align: 'left'},

						{display: 'Metal Type', name : 'metal_type', width : 120, sortable : false, align: 'left'}

					],

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{separator: true}

					],

					searchitems : [

						{display: 'Item Number', name : 'stock_number', isdefault: true}

					],

					sortname: \"stock_number\",

					sortorder: \"ASC\",

					usepager: true,

					title: '<h1 class=\"pageheader\">Costar Jewelry Items</h1>',

					useRp: true,

					rp: 50,

					showTableToggleBtn: false,

					width:1020,

					height: 565

				});

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



			function test(com,grid){   

				var idlist = $(\".bookid:checked\").map(function () {return this.value;}).get().join(\",\");

				var ttcount = $(\".bookid:checked\").length;

				var itemlist ='';

				if (com=='Delete' || com=='Revise'){ 

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

							}

						}

					} else{

						alert('You have not selected a row.');

					} 

				} else if (com=='Add') {

					window.location = '" . SITE_URL . "admin/loosediamonds/add';

                }			

			}";



			$data['extraheader'] = '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';

			$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';

			$output = $this->load->view('admin/jcart_costar_admin_listing', $data, true);

			output_page($output, $data);

		} else {

			$output = $this->load->view('admin/login', $data, true);

			output_page($output, $data);

		}

	}

	

	function getCostarCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {

		$page = isset($_POST['page']) ? $_POST['page'] : 0;

		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;

		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'stock_number';

		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';

		$query = isset($_POST['query']) ? $_POST['query'] : '';

		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'stock_number';

		$results = $this->jcartfashionmodel->getCostarItemRows($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);

		$delink_url = SITE_URL.'admin/deleteShapeLink/';



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



		foreach ($results['result'] as $row) {

			$items_image = stuller_fashionjew_imgs( $row['Images'] );   /// item jewelry section helper

			$item_image = $items_image[0];



			if( !empty($row['image1']) ) {

				$jewelry_img = SITE_URL .'images/costarimages/'. addslashes($row['image1']);

			} else {

				$jewelry_img = SITE_URL .'images/costarimages/'. addslashes($row['image2']);

			}

			$item_image = $jewelry_img;

			$prod_name = $row['stock_number'];

			$item_shape = '';

			$detail_link = SITE_URL . "jcart_fashion_jewelry/stuller_items_detail_edit/" . $row['stock_number'];

			$etsy_detail_link = SITE_URL . 'jcart_fashion_jewelry/stuller_items_detail/'.$row['stock_number'].'?sendTo=etsy';

			$newTotalCarat = '';

			$new_center_carat = '';

			$oldCertView = '';

			$newCertView = '';

			$ebayLink = '#';

			$item_profit = '';

			$pk_id = $row['stock_number'];

			$ebay_id   = 'ebay_'.$row['stock_number'];

			$amazon_id = 'amazon_'.$row['stock_number'];

			$sears_id  = 'sears_'.$row['stock_number'];

			$esty_id   = 'etsy_'.$row['stock_number'];

			$lst_id    = 'lst_'.$row['stock_number'];

			$ebay_h = 'ebay_h_'.$row['stock_number'];

			$ebay_c = 'ebay_c_'.$row['stock_number'];

			$amazon_h = 'amazon_h_'.$row['stock_number'];

			$amazon_c = 'amazon_c_'.$row['stock_number'];

			$sears_h = 'sears_h_'.$row['stock_number'];

			$sears_c = 'sears_c_'.$row['stock_number'];

			$esty_h = 'esty_h_'.$row['stock_number'];

			$esty_c = 'esty_c_'.$row['stock_number'];

			$lstdibbs_h = 'lstdibbs_h_'.$row['stock_number'];

			$lstdibbs_c = 'lstdibbs_c_'.$row['stock_number'];

			$check_box_class = 'class=\"bookid\"';



			if ($rc )

				$json .= ",";

				$json .= "\n {";



            $json .= "id:'" . $row['stock_number'] . "',";

            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['stock_number']."\" />ID #: " . $row['stock_number'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/view\' target=\"_blank\" class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>". "<table class=\"set_ckbox_table\">". "</table>'";



			$ringPrice = $row['price'];

			$check_cate = strchr($cate_id, 'Cross');

			if( empty($check_cate) ) {

				$semi_label = '';

			} else {

				$semi_label = 'Semi ';

			}



			$total_ring_diamond_price = $ringPrice;

			$center_carat_weight = $row['Weight'];



			$diamond_detail = '';

			$update_center_diamond = '';

			$where_dev_ebaycategories_cat	= array('category_id' => $row['subcategory']);

			$dev_ebaycategories_data		= $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');



			$json .= ",'" . addslashes($row['stock_number']) . " '";

			$json .= ",'" . addslashes($row['category']) . " '";

			$json .= ",'" . addslashes($row['stock_number']) . " '";

			$json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''.  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['stock_number']."\">View Image</a>". "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['stock_number']."\">View Video</a>'";

			$json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>". "<input type=\"text\" name=\"jitem_price\" id=\"over_mounting_price_".$row['stock_number']."\" onkeyup=\"updateJitemPriceMW(\'".$row['stock_number']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";

			$json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/3) , 2)) . " '";

			$json .= ",'". addslashes($row['total_carats']) ." <div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"jewelryimg_".$row['stock_number']."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\" style=\"width: 100% !important;\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title ringProdTitle\" id=\"myModalLabel\" style=\"text-align:left;\">Item: ".$prod_name."</h4></div><div class=\"modal-body\"><div class=\"vide_view_block set_imgview\"><img src=\'".$item_image."\' alt=\'".$prod_name."\' /></div><br></div></div></div></div>'";



			$json .= ",'" . addslashes($row['center_stone_sizes']) . " '";

			$json .= ",'" . addslashes($row['metal_type']) . " '";

			$json .= "]";

			$json .= "}";

			$rc = true;

			$i = $i + 1;

		}

		$json .= "]\n";

		$json .= "}";

		echo $json;

	}



	function get_main_costar_sub_category_list(){

    	if(isset($_GET['get_main_category_value'])){

			$cat_id				= $_GET['get_main_category_value'];

			$get_filter_id_no	= $_GET['get_filter_id_no'];

			$where_sub_cat	= $this->jcartfashionmodel->getSubCategory($cat_id);

			$option_sub_cat	= '<option value="">Select One Option</option>';

			$option_sub_cat	.= '<option value="'.SITE_URL.'jcart_fashion_jewelry/costar_listing/view/jewelercart/'.$get_filter_id_no.'/'.$cat_id.'/"> - Show With Main Category</option>';

			if(is_array($where_sub_cat)){

				foreach ($where_sub_cat as $sub_cat_value) {

					$option_sub_cat	.= '<option value="'.SITE_URL.'jcart_fashion_jewelry/costar_listing/view/jewelercart/'.$get_filter_id_no.'/'.$cat_id.'/'.$sub_cat_value['category_id'].'"> '.$sub_cat_value['category_name'].'</option>';

				}

				echo $option_sub_cat;

			}

		}else{

			echo $option_sub_cat	= '<option value=""> Sub Category Not Found</option>';

		}



	}



	function diamond_traces_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {

        $data['name'] = getAdminDetails();

		$item_category = urldecode($id);

        $item_sub_category = urldecode($sub_id);    

        $data['view_type'] = $type;

        $data['item_sub_category'] = $item_sub_category;

        $data['filter_id_no'] = $filter_id;

        $data['category_id'] = $item_category;

        $this->session->unset_userdata('return_message');



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

			$("#rapnet").click();';

			$link_strings = $type.'/'. $filter_id. '/'. $item_category. '/'. $item_sub_category;

			$url = SITE_URL . 'jcart_fashion_jewelry/getDiamondTracesCollectionListings/' . $action . '/' . $link_strings;

			$data['action'] = $action;

			$data['onloadextraheader'] .= "  var actionview = '".$action."';

			var home_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/view/' . $link_strings."';

			var photo_gallery_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';

			function amazonGaleryBtn() {

				window.location = '" . SITE_URL . "jcart_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';

			}



			if(actionview == 'photogallery' || actionview == 'amazongallery') {

				jQuery(\"#results\").flexigrid({

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

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},

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

				});

			} else {

				jQuery(\"#results\").flexigrid({

					url: '" . $url . "',

					dataType: 'json',

					colModel : [

						{display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},

						{display: 'Stock #', name : 'stock_real_number', width : 140, sortable : true, align: 'center'},

						{display: 'Category', name : 'sub_category', width : 140, sortable : true, align: 'center'},

						{display: 'Item Name', name : 'item_title', width : 250, sortable : true, align: 'center'},

						{display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},

						{display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Profit', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},

						{display: 'Center Stone', name : 'center_stone_sizes', width : 120, sortable : false, align: 'left'},

						{display: 'Metal Type', name : 'metal_type', width : 120, sortable : false, align: 'left'}

					],

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{separator: true}

					],

					searchitems : [

						{display: 'Item Number', name : 'item_number', isdefault: true}

					],

					sortname: \"item_number\",

					sortorder: \"ASC\",

					usepager: true,

					title: '<h1 class=\"pageheader\">FAM Collection Items</h1>',

					useRp: true,

					rp: 50,

					showTableToggleBtn: false,

					width:1020,

					height: 565

				});

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



			function test(com,grid){   

				var idlist = $(\".bookid:checked\").map(function () {return this.value;}).get().join(\",\");

				var ttcount = $(\".bookid:checked\").length;

				var itemlist ='';

				if (com=='Delete' || com=='Revise'){ 

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

							}

						}

					} else{

						alert('You have not selected a row.');

					} 

				} else if (com=='Add') {

					window.location = '" . SITE_URL . "admin/loosediamonds/add';

                }			

			}";



			$data['extraheader'] = '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';

			$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';

			$output = $this->load->view('admin/jcart_diamond_traces_admin_listing', $data, true);

			output_page($output, $data);

		} else {

			$output = $this->load->view('admin/login', $data, true);

			output_page($output, $data);

		}

	}

	

	function getDiamondTracesCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {

		$page = isset($_POST['page']) ? $_POST['page'] : 0;

		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;

		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'item_number';

		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';

		$query = isset($_POST['query']) ? $_POST['query'] : '';

		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'item_number';

		$results = $this->jcartfashionmodel->getDiamondTraceItemRows($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);

		$delink_url = SITE_URL.'admin/deleteShapeLink/';



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



		foreach ($results['result'] as $row) {

			$images = explode(";",$row['image']);

			if(!empty($images[0])){

				$jewelry_img = SITE_URL .'images/'. $row['image_path'].$images[0];

			} else {

				$jewelry_img = SITE_URL .'images/'. $row['image_path'].$images[1];

			}

			$item_image = $jewelry_img;

			$prod_name = $row['item_number'];

			$item_shape = '';

			$detail_link = SITE_URL . "jcart_fashion_jewelry/stuller_items_detail_edit/" . $row['item_number'];

			$etsy_detail_link = SITE_URL . 'jcart_fashion_jewelry/stuller_items_detail/'.$row['item_number'].'?sendTo=etsy';

			$newTotalCarat = '';

			$new_center_carat = '';

			$oldCertView = '';

			$newCertView = '';

			$ebayLink = '#';

			$item_profit = '';

			$pk_id = $row['item_number'];

			$ebay_id   = 'ebay_'.$row['item_number'];

			$amazon_id = 'amazon_'.$row['item_number'];

			$sears_id  = 'sears_'.$row['item_number'];

			$esty_id   = 'etsy_'.$row['item_number'];

			$lst_id    = 'lst_'.$row['item_number'];

			$ebay_h = 'ebay_h_'.$row['item_number'];

			$ebay_c = 'ebay_c_'.$row['item_number'];

			$amazon_h = 'amazon_h_'.$row['item_number'];

			$amazon_c = 'amazon_c_'.$row['item_number'];

			$sears_h = 'sears_h_'.$row['item_number'];

			$sears_c = 'sears_c_'.$row['item_number'];

			$esty_h = 'esty_h_'.$row['item_number'];

			$esty_c = 'esty_c_'.$row['item_number'];

			$lstdibbs_h = 'lstdibbs_h_'.$row['item_number'];

			$lstdibbs_c = 'lstdibbs_c_'.$row['item_number'];

			$check_box_class = 'class=\"bookid\"';



			if ($rc )

				$json .= ",";

				$json .= "\n {";



            $json .= "id:'" . $row['id'] . "',";

            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['id']."\" />ID #: " . $row['id'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/view\' target=\"_blank\" class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>". "<table class=\"set_ckbox_table\">". "</table>'";



			$ringPrice = $row['price'];

			$check_cate = strchr($cate_id, 'Cross');

			if( empty($check_cate) ) {

				$semi_label = '';

			} else {

				$semi_label = 'Semi ';

			}



			$total_ring_diamond_price = $ringPrice;

			$json .= ",'" . addslashes($row['item_number']) . " '";

			$json .= ",'" . addslashes($row['category']) . " '";

			$json .= ",'" . addslashes($row['name']) . " '";

			$json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''.  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['item_number']."\">View Image</a>". "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['item_number']."\">View Video</a>'";

			$json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>". "<input type=\"text\" name=\"jitem_price\" id=\"over_mounting_price_".$row['item_number']."\" onkeyup=\"updateJitemPriceMW(\'".$row['item_number']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";

			$json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/3) , 2)) . " '";

			$json .= ",'". addslashes($row['stone_weight']) ." <div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"jewelryimg_".$row['item_number']."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\" style=\"width: 100% !important;\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title ringProdTitle\" id=\"myModalLabel\" style=\"text-align:left;\">Item: ".$prod_name."</h4></div><div class=\"modal-body\"><div class=\"vide_view_block set_imgview\"><img src=\'".$item_image."\' alt=\'".$prod_name."\' /></div><br></div></div></div></div>'";



			$json .= ",'" . addslashes($row['diamond_weight']) . " '";

			$json .= ",'" . addslashes($row['metal']) . " '";

			$json .= "]";

			$json .= "}";

			$rc = true;

			$i = $i + 1;

		}

		$json .= "]\n";

		$json .= "}";

		echo $json;

	}

	

	function richard_cannon_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {

        $data['name'] = getAdminDetails();

		$item_category = urldecode($id);

        $item_sub_category = urldecode($sub_id);    

        $data['view_type'] = $type;

        $data['item_sub_category'] = $item_sub_category;

        $data['filter_id_no'] = $filter_id;

        $data['category_id'] = $item_category;

        $this->session->unset_userdata('return_message');



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

			$("#rapnet").click();';

			$link_strings = $type.'/'. $filter_id. '/'. $item_category. '/'. $item_sub_category;

			$url = SITE_URL . 'jcart_fashion_jewelry/getRichardCannonCollectionListings/' . $action . '/' . $link_strings;

			$data['action'] = $action;

			$data['onloadextraheader'] .= "  var actionview = '".$action."';

			var home_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/view/' . $link_strings."';

			var photo_gallery_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';

			function amazonGaleryBtn() {

				window.location = '" . SITE_URL . "jcart_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';

			}



			if(actionview == 'photogallery' || actionview == 'amazongallery') {

				jQuery(\"#results\").flexigrid({

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

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},

						{separator: true}

					],

					searchitems : [

						{display: 'Item Number', name : 'id', isdefault: true},

						{display: 'Item Category', name : 'MerchandisingCategory3', isdefault: true}

					],		

					sortname: \"stock_number\",

					sortorder: \"ASC\",

					usepager: true,

					title: '<h1 class=\"pageheader\">Richard Cannon Items</h1>',

					useRp: true,

					rp: 50,

					showTableToggleBtn: false,

					width:1020,

					height: 565

				});

			} else {

				jQuery(\"#results\").flexigrid({

					url: '" . $url . "',

					dataType: 'json',

					colModel : [

						{display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},

						{display: 'Stock #', name : 'stock_real_number', width : 140, sortable : true, align: 'center'},

						{display: 'Category', name : 'sub_category', width : 140, sortable : true, align: 'center'},

						{display: 'Item Name', name : 'item_title', width : 250, sortable : true, align: 'center'},

						{display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},

						{display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Profit', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},

						{display: 'Center Stone', name : 'center_stone_sizes', width : 120, sortable : false, align: 'left'},

						{display: 'Metal Type', name : 'metal_type', width : 120, sortable : false, align: 'left'}

					],

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{separator: true}

					],

					searchitems : [

						{display: 'Item Number', name : 'stock_number', isdefault: true}

					],

					sortname: \"stock_number\",

					sortorder: \"ASC\",

					usepager: true,

					title: '<h1 class=\"pageheader\">Richard Cannon Items</h1>',

					useRp: true,

					rp: 50,

					showTableToggleBtn: false,

					width:1020,

					height: 565

				});

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



			function test(com,grid){   

				var idlist = $(\".bookid:checked\").map(function () {return this.value;}).get().join(\",\");

				var ttcount = $(\".bookid:checked\").length;

				var itemlist ='';

				if (com=='Delete' || com=='Revise'){ 

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

							}

						}

					} else{

						alert('You have not selected a row.');

					} 

				} else if (com=='Add') {

					window.location = '" . SITE_URL . "admin/loosediamonds/add';

                }			

			}";



			$data['extraheader'] = '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';

			$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';

			$output = $this->load->view('admin/jcart_richard_cannon_admin_listing', $data, true);

			output_page($output, $data);

		} else {

			$output = $this->load->view('admin/login', $data, true);

			output_page($output, $data);

		}

	}

	

	function getRichardCannonCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {

		$page = isset($_POST['page']) ? $_POST['page'] : 0;

		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;

		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'item_number';

		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';

		$query = isset($_POST['query']) ? $_POST['query'] : '';

		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'item_number';

		$results = $this->jcartfashionmodel->getRichardCannonItemRows($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);

		$delink_url = SITE_URL.'admin/deleteShapeLink/';



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



		foreach ($results['result'] as $row) {

			$images = explode(";",$row['image1']);

			if(!empty($row['image1'])){

				$jewelry_img = $row['image1'];

			} else {

				$jewelry_img = $row['image2'];

			}

			$item_image = $jewelry_img;

			$prod_name = $row['stock_number'];

			$item_shape = '';

			$detail_link = SITE_URL . "jcart_fashion_jewelry/stuller_items_detail_edit/" . $row['stock_number'];

			$etsy_detail_link = SITE_URL . 'jcart_fashion_jewelry/stuller_items_detail/'.$row['stock_number'].'?sendTo=etsy';

			$newTotalCarat = '';

			$new_center_carat = '';

			$oldCertView = '';

			$newCertView = '';

			$ebayLink = '#';

			$item_profit = '';

			$pk_id = $row['stock_number'];

			$ebay_id   = 'ebay_'.$row['stock_number'];

			$amazon_id = 'amazon_'.$row['stock_number'];

			$sears_id  = 'sears_'.$row['stock_number'];

			$esty_id   = 'etsy_'.$row['stock_number'];

			$lst_id    = 'lst_'.$row['stock_number'];

			$ebay_h = 'ebay_h_'.$row['stock_number'];

			$ebay_c = 'ebay_c_'.$row['stock_number'];

			$amazon_h = 'amazon_h_'.$row['stock_number'];

			$amazon_c = 'amazon_c_'.$row['stock_number'];

			$sears_h = 'sears_h_'.$row['stock_number'];

			$sears_c = 'sears_c_'.$row['stock_number'];

			$esty_h = 'esty_h_'.$row['stock_number'];

			$esty_c = 'esty_c_'.$row['stock_number'];

			$lstdibbs_h = 'lstdibbs_h_'.$row['stock_number'];

			$lstdibbs_c = 'lstdibbs_c_'.$row['stock_number'];

			$check_box_class = 'class=\"bookid\"';



			if ($rc )

				$json .= ",";

				$json .= "\n {";



            $json .= "id:'" . $row['stock_number'] . "',";

            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['stock_number']."\" />ID #: " . $row['stock_number'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/view\' target=\"_blank\" class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>". "<table class=\"set_ckbox_table\">". "</table>'";



			$ringPrice = $row['price_website'];

			$check_cate = strchr($cate_id, 'Cross');

			if( empty($check_cate) ) {

				$semi_label = '';

			} else {

				$semi_label = 'Semi ';

			}



			$total_ring_diamond_price = $ringPrice;

			$json .= ",'" . addslashes($row['stock_real_number']) . " '";

			$json .= ",'" . addslashes($row['category']) . " '";

			$json .= ",'" . addslashes($row['item_title']) . " '";

			$json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''.  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['stock_number']."\">View Image</a>". "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['stock_number']."\">View Video</a>'";

			$json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>". "<input type=\"text\" name=\"jitem_price\" id=\"over_mounting_price_".$row['stock_number']."\" onkeyup=\"updateJitemPriceMW(\'".$row['stock_number']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";

			$json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/3) , 2)) . " '";

			$json .= ",'". addslashes($row['total_carats']) ." <div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"jewelryimg_".$row['stock_number']."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\" style=\"width: 100% !important;\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title ringProdTitle\" id=\"myModalLabel\" style=\"text-align:left;\">Item: ".$prod_name."</h4></div><div class=\"modal-body\"><div class=\"vide_view_block set_imgview\"><img src=\'".$item_image."\' alt=\'".$prod_name."\' /></div><br></div></div></div></div>'";



			$json .= ",'" . addslashes($row['center_stone_sizes']) . " '";

			$json .= ",'" . addslashes($row['metal_type']) . " '";

			$json .= "]";

			$json .= "}";

			$rc = true;

			$i = $i + 1;

		}

		$json .= "]\n";

		$json .= "}";

		echo $json;

	}

	

	function vdbapp_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = '') {

        $data['name'] = getAdminDetails();

		$item_category = urldecode($id);

        $item_sub_category = urldecode($sub_id);    

        $data['view_type'] = $type;

        $data['item_sub_category'] = $item_sub_category;

        $data['filter_id_no'] = $filter_id;

        $data['category_id'] = $item_category;

        $this->session->unset_userdata('return_message');



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

			$("#rapnet").click();';

			$link_strings = $type.'/'. $filter_id. '/'. $item_category. '/'. $item_sub_category;

			$url = SITE_URL . 'jcart_fashion_jewelry/getCostarCollectionListings/' . $action . '/' . $link_strings;

			$data['action'] = $action;

			$data['onloadextraheader'] .= "  var actionview = '".$action."';

			var home_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/view/' . $link_strings."';

			var photo_gallery_link = '".SITE_URL . 'jcart_fashion_jewelry/heart_collection_items/photogallery/' . $link_strings."';

			function amazonGaleryBtn() {

				window.location = '" . SITE_URL . "jcart_fashion_jewelry/heart_collection_items/amazongallery/".$link_strings."';

			}



			if(actionview == 'photogallery' || actionview == 'amazongallery') {

				$(\"#results\").flexigrid({

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

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{name: 'SubmitGallery', bclass: 'add', onpress : submitGalry},

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

				});

			} else {

				$(\"#results\").flexigrid({

					url: '" . $url . "',

					dataType: 'json',

					colModel : [

						{display: 'ID', name : 'id', width : 140, sortable : true, align: 'left'},

						{display: 'Stock #', name : 'stock_real_number', width : 140, sortable : true, align: 'center'},

						{display: 'Category', name : 'sub_category', width : 140, sortable : true, align: 'center'},

						{display: 'Item Name', name : 'item_title', width : 250, sortable : true, align: 'center'},

						{display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},

						{display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Profit', name : 'price', width : 90, sortable : true, align: 'center'},

						{display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},

						{display: 'Center Stone', name : 'center_stone_sizes', width : 120, sortable : false, align: 'left'},

						{display: 'Metal Type', name : 'metal_type', width : 120, sortable : false, align: 'left'}

					],

					buttons : [

						{name: 'Home', bclass: 'add', onpress : homeBtn},

						{name: 'Delete', bclass: 'delete', onpress : test},

						{name: 'Revise', bclass: 'add', onpress : test},

						{name: 'Photo Gallery', bclass: 'add', onpress : galeryBtn},

						{name: 'Amazon Gallery', bclass: 'add', onpress : amazonGaleryBtn},

						{separator: true}

					],

					searchitems : [

						{display: 'Item Number', name : 'stock_number', isdefault: true}

					],

					sortname: \"stock_number\",

					sortorder: \"ASC\",

					usepager: true,

					title: '<h1 class=\"pageheader\">vdbapp Jewelry Items</h1>',

					useRp: true,

					rp: 50,

					showTableToggleBtn: false,

					width:1020,

					height: 565

				});

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



			function test(com,grid){   

				var idlist = $(\".bookid:checked\").map(function () {return this.value;}).get().join(\",\");

				var ttcount = $(\".bookid:checked\").length;

				var itemlist ='';

				if (com=='Delete' || com=='Revise'){ 

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

							}

						}

					} else{

						alert('You have not selected a row.');

					} 

				} else if (com=='Add') {

					window.location = '" . SITE_URL . "admin/loosediamonds/add';

                }			

			}";



			$data['extraheader'] = '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';

			$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';

			$output = $this->load->view('admin/jcart_vdbapp_admin_listing', $data, true);

			output_page($output, $data);

		} else {

			$output = $this->load->view('admin/login', $data, true);

			output_page($output, $data);

		}

	}

	

	function getVdbappCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {

		$page = isset($_POST['page']) ? $_POST['page'] : 0;

		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;

		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'stock_number';

		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';

		$query = isset($_POST['query']) ? $_POST['query'] : '';

		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'stock_number';

		$results = $this->jcartfashionmodel->getVdbappItemRows($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);

		$delink_url = SITE_URL.'admin/deleteShapeLink/';



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



		foreach ($results['result'] as $row) {

			$items_image = stuller_fashionjew_imgs( $row['Images'] );   /// item jewelry section helper

			$item_image = $items_image[0];



			if( !empty($row['image']) ) {

				$jewelry_img = SITE_URL .'vdbapp/'.$row['category'].'/'. addslashes($row['image']);

			} else {

				$jewelry_img = addslashes($row['image_url']);

			}

			$item_image = $jewelry_img;

			$prod_name = $row['stock_number'];

			$item_shape = '';

			$detail_link = SITE_URL . "jcart_fashion_jewelry/stuller_items_detail_edit/" . $row['stock_number'];

			$etsy_detail_link = SITE_URL . 'jcart_fashion_jewelry/stuller_items_detail/'.$row['stock_number'].'?sendTo=etsy';

			$newTotalCarat = '';

			$new_center_carat = '';

			$oldCertView = '';

			$newCertView = '';

			$ebayLink = '#';

			$item_profit = '';

			$pk_id = $row['stock_number'];

			$ebay_id   = 'ebay_'.$row['stock_number'];

			$amazon_id = 'amazon_'.$row['stock_number'];

			$sears_id  = 'sears_'.$row['stock_number'];

			$esty_id   = 'etsy_'.$row['stock_number'];

			$lst_id    = 'lst_'.$row['stock_number'];

			$ebay_h = 'ebay_h_'.$row['stock_number'];

			$ebay_c = 'ebay_c_'.$row['stock_number'];

			$amazon_h = 'amazon_h_'.$row['stock_number'];

			$amazon_c = 'amazon_c_'.$row['stock_number'];

			$sears_h = 'sears_h_'.$row['stock_number'];

			$sears_c = 'sears_c_'.$row['stock_number'];

			$esty_h = 'esty_h_'.$row['stock_number'];

			$esty_c = 'esty_c_'.$row['stock_number'];

			$lstdibbs_h = 'lstdibbs_h_'.$row['stock_number'];

			$lstdibbs_c = 'lstdibbs_c_'.$row['stock_number'];

			$check_box_class = 'class=\"bookid\"';



			if ($rc )

				$json .= ",";

				$json .= "\n {";



            $json .= "id:'" . $row['stock_number'] . "',";

            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['stock_number']."\" />ID #: " . $row['stock_number'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/view\' target=\"_blank\" class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>". "<table class=\"set_ckbox_table\">". "</table>'";



			$ringPrice = $row['price'];

			$check_cate = strchr($cate_id, 'Cross');

			if( empty($check_cate) ) {

				$semi_label = '';

			} else {

				$semi_label = 'Semi ';

			}



			$total_ring_diamond_price = $ringPrice;

			$center_carat_weight = $row['Weight'];



			$diamond_detail = '';

			$update_center_diamond = '';

			$where_dev_ebaycategories_cat	= array('category_id' => $row['subcategory']);

			$dev_ebaycategories_data		= $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');



			$json .= ",'" . addslashes($row['stock_number']) . " '";

			$json .= ",'" . addslashes($row['category']) . " '";

			$json .= ",'" . addslashes($row['stock_number']) . " '";

			$json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''.  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['stock_number']."\">View Image</a>". "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['stock_number']."\">View Video</a>'";

			$json .= ",'" . addslashes($prod_name) . "<br><div class=\"text-center\"><b>".urldecode($cate_id)."<br> Price</b></div>". "<input type=\"text\" name=\"jitem_price\" id=\"over_mounting_price_".$row['stock_number']."\" onkeyup=\"updateJitemPriceMW(\'".$row['stock_number']."\')\" class=\"set_carat_field\" value=\"".$total_ring_diamond_price."\" />'";

			$json .= ",'$" . addslashes(number_format($total_ring_diamond_price - ($total_ring_diamond_price/3) , 2)) . " '";

			$json .= ",'". addslashes($row['total_carats']) ." <div class=\"modal fade jewitem_model\" style=\"width: 100% !important;\" id=\"jewelryimg_".$row['stock_number']."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\" style=\"width: 100% !important;\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title ringProdTitle\" id=\"myModalLabel\" style=\"text-align:left;\">Item: ".$prod_name."</h4></div><div class=\"modal-body\"><div class=\"vide_view_block set_imgview\"><img src=\'".$item_image."\' alt=\'".$prod_name."\' /></div><br></div></div></div></div>'";



			$json .= ",'" . addslashes($row['center_stone_sizes']) . " '";

			$json .= ",'" . addslashes($row['metal_type']) . " '";

			$json .= "]";

			$json .= "}";

			$rc = true;

			$i = $i + 1;

		}

		$json .= "]\n";

		$json .= "}";

		echo $json;

	}



	function get_main_vdbapp_sub_category_list(){

    	if(isset($_GET['get_main_category_value'])){

			$cat_id				= $_GET['get_main_category_value'];

			$get_filter_id_no	= $_GET['get_filter_id_no'];

			$where_sub_cat	= $this->jcartfashionmodel->getSubCategory($cat_id);

			$option_sub_cat	= '<option value="">Select One Option</option>';

			$option_sub_cat	.= '<option value="'.SITE_URL.'jcart_fashion_jewelry/vdbapp_listing/view/jewelercart/'.$get_filter_id_no.'/'.$cat_id.'/"> - Show With Main Category</option>';

			if(is_array($where_sub_cat)){

				foreach ($where_sub_cat as $sub_cat_value) {

					$option_sub_cat	.= '<option value="'.SITE_URL.'jcart_fashion_jewelry/vdbapp_listing/view/jewelercart/'.$get_filter_id_no.'/'.$cat_id.'/'.$sub_cat_value['category_id'].'"> '.$sub_cat_value['category_name'].'</option>';

				}

				echo $option_sub_cat;

			}

		}else{

			echo $option_sub_cat	= '<option value=""> Sub Category Not Found</option>';

		}



	}



}