<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_listings extends CI_Controller {
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
        $this->load->model('itemjewelrymodel');

        $cu = current_url();
        $url = explode('/', $cu);
        $uri = ( isset($url[4]) ? $url[4] : '' );
        $this->session->set_userdata('pages_name', $uri);
    }
    
    function index() {
        die('You are not allowed to access this page directly!');
    }
        
    function get_center_idex_diamond($id=0, $shape='B') {        
        $rows = $this->itemjewelrymodel->updateIdexCenterDiamondToItem($id, $shape);
    }
    
    function heart_collection_items($action = 'view', $type='HD', $filter_id=0, $id = '') {
		require_once(APPPATH .'libraries/vendor/autoload.php');
		$links = $type.'/' . $filter_id . '/' . urldecode($id);
		if(isset($_POST['authentication_submit'])){
			session_start();
			$oauth = new OAuth('k08eccol9wh33wmldh13eonw','bad6tsimn2');
			$req_token = $oauth->getRequestToken("https://openapi.etsy.com/v2/oauth/request_token?scope=email_r%20listings_w", "".$_POST['home_link']."", "GET");
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
					window.location.href='". SITE_URL ."admin_listings/heart_collection_items/view/".$links."';
                </SCRIPT>");
			}catch (OAuthException $e) {
				//print_ar('sdfsdf2222');
    		}
        }

		/* $data = $this->getCommonData(); */
        $data['name'] = $this->getAdminDetails();
        $item_category = urldecode($id);
        $data['category_list'] = get_items_cate_list($type, $filter_id, $item_category); // admin_common_func helper
        $data['view_type'] = $type;
        $data['filter_id_no'] = $filter_id;
        $data['category_id'] = $item_category;
        $this->session->unset_userdata('return_message');
        $item_id_list = $this->input->post('item_id_list');
        if( !empty($item_id_list) && count($item_id_list) > 0 ) {
            $this->itemjewelrymodel->uploadItemPhotoGallery($item_id_list);
        }

        if ($this->isadminlogin()) {
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

			$link_strings = $type.'/' . $filter_id . '/' . $item_category;
			$url = SITE_URL . 'admin_listings/getCollectionListings/' . $action . '/' . $link_strings;
			$data['action'] = $action;
			$data['onloadextraheader'] .= "var actionview = '".$action."';
			var home_link = '".SITE_URL . 'admin_listings/heart_collection_items/view/' . $link_strings."';
			var photo_gallery_link = '".SITE_URL . 'admin_listings/heart_collection_items/photogallery/' . $link_strings."';
			function amazonGaleryBtn() {
				window.location = '" . SITE_URL . "admin_listings/heart_collection_items/amazongallery/".$link_strings."';
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
						{display: 'Item Number', name : 'id', isdefault: true}
					],		
					sortname: \"id\",
					sortorder: \"ASC\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Heart Colletion Ebay Items</h1>',
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
						{display: 'ebay ID', name : 'ebayid', width : 80, sortable : true, align: 'center'},
						{display: 'Category', name : 'category', width : 100, sortable : true, align: 'center'},
						{display: 'Item Name', name : 'product_name', width : 125, sortable : true, align: 'center'},
						{display: 'Image', name : 'id', width : 80, sortable : true, align: 'left'},				
						{display: 'Price', name : 'price', width : 90, sortable : true, align: 'center'},
						{display: 'Total Carat', name : 'diamond_weight', width : 120, sortable : false, align: 'center'},
						{display: 'Center Carat', name : 'center_weight', width : 90, sortable : false, align: 'left'},
						{display: 'Side Carat', name : 'side_weight', width : 80, sortable : false, align: 'left'},
						{display: 'Missing Diamond', name : 'missing_diamonds', width : 120, sortable : false, align: 'center'},
						{display: 'Shape', name : 'category', width : 120, sortable : false, align: 'left'},
						{display: 'Color', name : 'color', width : 80, sortable : false, align: 'left'},
						{display: 'New Cert #', name : 'index_diamond_cert', width : 100, sortable : false, align: 'left'},
						{display: 'Cert #', name : 'certificate_no', width : 100, sortable : false, align: 'left'},
						{display: 'Item ID', name : 'item_id', width : 120, sortable : false, align: 'left'},
						{display: 'Set. Type', name : 'setting_type', width : 106, sortable : false, align: 'left'}	
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
						{display: 'Item Number', name : 'id', isdefault: true},
						{display: 'Item Sku', name : 'item_id', isdefault: false}
					], 		
					sortname: \"id\",
					sortorder: \"ASC\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Heart Colletion Ebay Items</h1>',
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
				var idlist = $(\".bookid:checked\").map(
				function () {return this.value;}).get().join(\",\");
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
				} else if (com=='Add'){
					window.location = '" . SITE_URL . "admin/loosediamonds/add';
				}			
			}";

			$data['homeLink'] = ''. SITE_URL .'admin_listings/heart_collection_items/view/'. $link_strings .'';
			$data['extraheader'] = '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/heart_collection_admin_listing', $data, true);
			$this->output($output, $data);
		} else {
			$output = $this->load->view('admin/login', $data, true);
			$this->output($output, $data);
		}
	}

    //// view unique ring detail
    function item_collection_detail($prod_id = 0, $type='') {
        $data['name'] = $this->getAdminDetails();
        if ($this->isadminlogin()) {
            $diamondrow = get_diamond_detail_row($prod_id); //// item jewelry section helper
            $data['return_msg'] = $this->session->userdata('return_message');
            $rowsring = $this->itemjewelrymodel->getItemDetailViaID($prod_id); //print_ar($rowsring);
            //$itemShape = item_cate_shape_value( $rowsring['global_fields'] );
            $results = $this->itemjewelrymodel->get_item_imgs( $prod_id, $rowsring['product_name'] ); // get the collection item img lists
            $data['rowsring'] = $rowsring;
            $data['details'] = $this->itemjewelrymodel->getItemSpecification($prod_id, 'dev_ebay_details');
            $data['view_type'] = $type;
            $data['extraheader'] = '<link type="text/css" rel="stylesheet" href="'.SITE_URL.'css/home_style.css" />';
            $data['ringtitle'] = item_jew_title($rowsring); /// item_jewelry_section helper //$rowsring['product_name'];
            $data['title'] = $data['ringtitle'];
            $data['ringimg']   = $results[0]['image'];
            $data['item_img_list'] = $this->getCollectionItemImgList($results, $rowsring['product_name']);
            $data['setingtype']   = $rowsring['category'];
            $data['maincate_name'] = $rowsring['category'];
            $data['item_specifition'] = $this->getJewelryItemSpec( $prod_id );
            $data['item_details'] = $this->getJewelryItemDetails( $prod_id, $rowsring['price'], $rowsring['new_price'] );
            $data['our_ring_price'] = $rowsring['price'] + $diamondrow['price'];  /// toal ring price = ring price + diamond price
            $data['retail_price'] = $data['our_ring_price'] * 1.7;
            $data['saving_percent'] = ( 100 - ( ( $rowsring['priceRetail'] / $data['retail_price'] ) * 100 ) );
            $data['feature_desc'] = $this->itemjewelrymodel->getItemSpecification( $prod_id, 'featured_item_description' );
            $data['detail_result'] = $this->itemjewelrymodel->getItemSpecification( $prod_id, 'dev_ebay_details' );
            $data['global_field_rows'] = $this->heart_items_detail_rows( $rowsring['global_fields'], $data['detail_result'] );
            $data['heart_item_details'] = $this->heart_other_fields_details( $data['details'] );

                $output = $this->load->view('admin/item_collection_details_view', $data, true);
                $this->output($output, $data);
        } else {
                $output = $this->load->view('admin/login', $data, true);
                $this->output($output, $data);
        }
    }
    
//    $fields_list = array(
//            'M-G14-GR' => $details['mg14_gr'],
//            'M-G14-PRICE' => '$' . _nf($details['mg14_price'], 2),
//            'M-G18-GR' => $details['mg18_gr'],
//            'M-G18-PRICE' => '$' . _nf($details['mg18_price']),
//            'M-PLAT-GR' => $details['mplat_gr'],
//            'M-PLAT-PRICE' => '$' . _nf($details['mplat_price']),
//            'TOTAL-DIAM-WEIGHT' => $details['total_carat_weight'],
//            'TOTAL-DIAM-PCS' => $details['total_diam_pcs'],
//            'TOTAL-COLOR-WEIGHT' => $details['total_color_weight'],
//            'TOTAL-COLOR-PCS' => $details['total_color_pcs'],
//            'G14-WHOLESALE-PRICE' => '$' . _nf($details['g14_whsale_price']),
//            'G18-WHOLESALE-PRICE' => '$' . _nf($details['g18_whsale_price']),
//            'PLAT-WHOLESALE-PRICE' => '$' . _nf($details['plat_whsale_price'])
//        );
    
    function heart_other_fields_details($details=[]) {
        //$item_total_carat = get_item_total_carat($details['pid']); // item_jewlery_section helper
        $item_total_carat = $details['new_center_carat'] + $details['semi_mount_weight']; // item_jewlery_section helper
        
        $fields_list = array(
            'Metal' => 'Platinum',
            'Total Carat Weight' => $item_total_carat,
            'TOTAL-DIAM-PCS' => $details['total_diam_pcs'],
            'Platinum Price' => '$' . _nf($details['plat_whsale_price'])
        );
        $view_details = '';
        
        foreach( $fields_list as $labels => $cols_values ) {
            if( !empty($cols_values) ) {
                $view_details .= '<div class="item_rows">
                            <span>'.$labels.' :</span>
                            <span>'.$cols_values.'</span>
                            <div class="clear"></div>
                        </div>';
                }
        }
        
        return $view_details;
    }
    function heart_items_detail_rows($globalFields='', $details=[]) {
        $fields_row_view = '';
        //$not_show_field = array(); //array('S-CENTER1', 'S-CARAT1');
        //$total_carat = get_global_field_value($globalFields, 'CARAT', 'sum_carat');
        $total_carat = $details['new_center_carat'] + $details['semi_mount_weight'];
        $allow_field = array('S-TYPE1', 'S-SHAPE1', 'S-SHAPE2');
        
        if( !empty($globalFields) ) {
            $results = unserialize($globalFields);
            foreach( $results as $cols_value ) {
                if( in_array($cols_value[0], $allow_field) ) {
                    if( $cols_value[0] == 'S-SHAPE1' ) {
                        $field_lable = 'Center Diamond Shape';
                    } elseif( $cols_value[0] == 'S-SHAPE2' ) {
                        $field_lable = 'Side Diamond Shape';
                    } else {
                        $field_lable = str_replace(array('S-', 1), '', $cols_value[0]);
                    }                    
                    
                    $fields_row_view .= '<div class="item_rows">
                                <span>'.$field_lable.' :</span>
                                <span>'.$cols_value[1].'</span>
                                <div class="clear"></div>
                            </div>';
                }                
            }
            $fields_row_view .= '<div class="item_rows">
                                <span>Side Diamond Carats :</span>
                                <span>'.$details['semi_mount_weight'].'</span>
                                <div class="clear"></div>
                            </div>';
            $fields_row_view .= '<div class="item_rows">
                                <span>Total Carat Weight :</span>
                                <span>'.$total_carat.'</span>
                                <div class="clear"></div>
                            </div>';
        }
        
        return $fields_row_view;
    }
    
    //// get item specification
    function getJewelryItemDetails($product_id=0, $itemPrice=0, $newPrice=0) {
        $results = $this->itemjewelrymodel->getItemSpecification($product_id, 'dev_ebay_details');
        $details = itemJeweleryDetailsList( $results, $itemPrice, $newPrice ); /// item_jewelry_section helper
        $detail_list = $this->item_list_view($details, $results['certificate'], $results['index_diamond_cert']);
        
        return $detail_list;
    }
    
    //// get item specification
    function getJewelryItemSpec($product_id=0) {
        $results = $this->itemjewelrymodel->getItemSpecification($product_id);
        $specList = itemJewelerySpecList( $results );
        $spec_lists = $this->item_list_view($specList);
        
        return $spec_lists;
    }
    
    function item_list_view($specList=array(), $certNo='', $newCertNo='') {
        $spec_lists = '';
        
        foreach( $specList as $label => $colValue ) {
            if( !empty($colValue) ) {
                $verify_cert_link = getEbayRingItemCertVerifiyLink($label, $certNo, $newCertNo);   ///// item_jewelry_section helper    
                
                $spec_lists .= '<div class="item_rows">
                                    <span>'.$label.'</span>
                                    <span>' . $colValue . $verify_cert_link . '</span>
                                    <div class="clear"></div>
                                </div>';
            }
        }
        
        return $spec_lists;
    }
    
    //// download img of HD rings item
    function download_hdrings_imgs() {
         $results = $this->itemjewelrymodel->getCollectionJewListing('HD', 0, '', 1, 200, 'id', 'DESC', '', 'id');
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
    function getCollectionItemImgList($results=0, $product_title='') {
        $item_image = '';
        
        if( count($results) > 0 ) {
            foreach( $results as $rows ) {
                $img_link_hd = SITE_URL . $rows['image'];
                $img_link = HEART_LINK . $rows['image'];
                $erphd_img = ERPHD_LINK . $rows['image'];
                
                if( getimagesize($img_link_hd) ) {
                    $item_image .= '<div class="set_detail_imgcol"><img src="'.$img_link_hd.'" alt="'.$product_title.'" width="200" /></div>';
                } else if( getimagesize($img_link) ) {
                    $item_image .= '<div class="set_detail_imgcol"><img src="'.$img_link.'" alt="'.$product_title.'" width="200" /></div>';
                } else if( getimagesize($erphd_img) ) {
                    $item_image .= '<div class="set_detail_imgcol"><img src="'.$erphd_img.'" alt="'.$product_title.'" width="200" /></div>';
                } else {
                   $item_image .= '<div><img src="'.SITE_URL . 'images/cert/12_541_no_image_thumb.gif" alt="'.$product_title.'" width="200" /></div>';
                   break;
                }    
            }
        } else {
            $item_image .= '<div><img src="'.SITE_URL . 'images/cert/12_541_no_image_thumb.gif" alt="'.$product_title.'" width="200" /></div>';
        }
        return $item_image;
    }
        
    function jewelry_item_img($item_id=0) {
        $item_img = $this->itemjewelrymodel->get_item_imgs( $item_id );
        
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
        
        $results = $this->itemjewelrymodel->getCollectionJewListing('ERPHD', 0, '', 1, 1000);
        $item_id = '';
        
        foreach( $results['result'] as $rows ) {
            $img_link = ''; //$this->jewelry_item_img( $rows['id'] );
            
            $item_id .= $rows['id'] . ' = ' . $img_link . '<br>';
        }
        echo $item_id;
    }
    
    ////
    function update_market_id($item_id=0, $item_field='', $field_id=0) {
        
        $this->itemjewelrymodel->updateMarketID($item_id, $item_field, $field_id);
        
    }
    
    function get_diamond_rows($results_rows=[], $cate_id='') {
        $item_result = array();
            
        foreach( $results_rows['result'] as $rows ) {
            $item_detail = $this->itemjewelrymodel->getItemSpecification($rows['id'], 'dev_ebay_details');
            $item_shape = getItemDiamondShape( $rows['category'], $rows['global_fields'] );  /// admin libs helper
            $total_diamond = $this->itemjewelrymodel->updateIdexCenterDiamondToItem($rows['id'], $item_shape, $item_detail['total_carat_updated'], 'count');

            if( $cate_id == 'missing_diamonds' || $cate_id == 'missing_imgs' ) {
                if( $total_diamond == 0 ) {
                    $item_result[] = $rows;
                }                    
            } else {
                if( $total_diamond > 0 ) {
                    $item_result[] = $rows;
                }                    
            }                
        }
        $results['count']  = count($item_result);
        $results['result'] = $item_result;
        
        return $results;
    }

	function getCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='') {
		$page = isset($_POST['page']) ? $_POST['page'] : 0;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'id';
		$results = $this->itemjewelrymodel->getCollectionJewListing($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype);

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
			$item_image = $this->jewelry_item_img( $row['id'] );
			$newPrice = ( $row['new_price'] > 0 ? $row['new_price'] : $row['price'] );
			$item_detail = $this->itemjewelrymodel->getItemSpecification($row['id'], 'dev_ebay_details');
			$feat_detail = $this->itemjewelrymodel->getItemSpecification($row['id'], 'featured_item_description');
			$item_shape = getItemDiamondShape( $row['category'], $row['global_fields'] );  /// admin libs helper
			$update_center_diamond = $this->itemjewelrymodel->updateIdexCenterDiamondToItem($row['id'], $item_shape, $item_detail['total_carat_updated']);
			$detail_link = SITE_URL . "admin_listings/item_collection_detail/" . $row['id'];
			$newTotalCarat = $item_detail['new_center_carat'] + $item_detail['semi_mount_weight'];
			$new_center_carat = ( !empty($item_detail['new_center_carat']) ? $item_detail['new_center_carat'] : $item_detail['center_carat'] );
			$oldCertView = $this->setNewCertView( $item_detail['certificate'] );
			$newCertView = $this->setNewCertView( $item_detail['index_diamond_cert'] );
			if( $row['ebayid'] != '-2' ) {
				$ebayLink = 'http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item='.$row['ebayid'];
			} else {
				$ebayLink = '#';
			}
			$imgrow = $this->itemjewelrymodel->getMoreItemImgList($row['id']);
			$diamond_row = $this->itemjewelrymodel->getIndexDiamondDetail($item_detail['diamond_lot_id'], 'lot');
			$pk_id = $row['id'];
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
			$check_box_class = ( !empty($row['ebay_field']) ? 'class=\"bookid\"' : 'class=\"bookid_new\"' );

			if ($rc )
			$json .= ",";
			$json .= "\n {";

            $json .= "id:'" . $row['id'] . "',";
            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['id']."\" />ID #: " . $row['id'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" . $detail_link . "/view\'  class=\"edit\" style=\"font-weight:bold;\">View Details</a><br>"
			. "<table class=\"set_ckbox_table\">"
			. "<tr><td>&nbsp;</td><th>H</th><th>C</th></tr>"
			. "<tr>"
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
			. "<td><input type=\"checkbox\" name=\"cb_sears\" ".checkedBox($sears_id, $row['sears_field'])." id=\"".$sears_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$sears_id."\', \'sears_field\')\" /><label for=\"".$sears_id."\" class=\"set_lable\">Sears</label></td>"
			. "<th><input type=\"checkbox\" name=\"sears_h\" id=\"".$sears_h."\" value=\"".$sears_h."\" ".checkedBox($sears_h, $row['sears_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$sears_h."\', \'sears_h\')\" /></th>"
			. "<th><input type=\"checkbox\" name=\"sears_c\" id=\"".$sears_c."\" value=\"".$sears_c."\" ".checkedBox($sears_c, $row['sears_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$sears_c."\', \'sears_c\')\" /></th>"
			. "</tr>"
			. "<tr>"
			. "<td><input type=\"checkbox\" name=\"cb_esty\" ".checkedBox($esty_id, $row['esty_field'])." id=\"".$esty_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_id."\', \'esty_field\')\" /><label for=\"".$esty_id."\" class=\"set_lable\">Etsy</label></td>"
			. "<th><input type=\"checkbox\" name=\"esty_h\" id=\"".$esty_h."\" value=\"".$esty_h."\" ".checkedBox($esty_h, $row['esty_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_h."\', \'esty_h\')\" /></th>"
			. "<th><input type=\"checkbox\" name=\"esty_c\" id=\"".$esty_c."\" value=\"".$esty_c."\" ".checkedBox($esty_c, $row['esty_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$esty_c."\', \'esty_c\')\" /></th>"
			. "</tr>"
			. "<tr>"
			. "<td><input type=\"checkbox\" name=\"cb_lst\" ".checkedBox($lst_id, $row['lst_field'])." id=\"".$lst_id."\" onclick=\"update_market_id(\'".$row['id']."\', \'".$lst_id."\', \'lst_field\')\" /><label for=\"".$lst_id."\" class=\"set_lable\">1stdibbs</label></td>"
			. "<th><input type=\"checkbox\" name=\"1stdibbs_h\" id=\"".$lstdibbs_h."\" value=\"".$lstdibbs_h."\" ".checkedBox($lstdibbs_h, $row['1stdibbs_h'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$lstdibbs_h."\', \'1stdibbs_h\')\" /></th>"
			. "<th><input type=\"checkbox\" name=\"1stdibbs_c\" id=\"".$lstdibbs_c."\" value=\"".$lstdibbs_c."\" ".checkedBox($lstdibbs_c, $row['1stdibbs_c'])." onclick=\"update_market_id(\'".$row['id']."\', \'".$lstdibbs_c."\', \'1stdibbs_c\')\" /></th>"
			. "</tr>"
			. "<tr>"
			. "</table>'";
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
				$ringPrice = check_empty($row['ring_price'], $row['price']);
                $center_diamond_carat = check_empty($item_detail['center_stone_size'], $item_detail['total_carat_weight']);
                
                $total_ring_diamond_price = $ringPrice + $diamond_row['price'];    
                $json .= ",'" . addslashes($row['ebayid']) . " '";
                $json .= ",'" . addslashes($row['category']) . " '";
                $json .= ",'" . addslashes($row['product_name']) . "<br><b>Ring Price</b><br> "
                        . "<input type=\"text\" name=\"jitem_price\" id=\"jitem_price_".$row['id']."\" onkeyup=\"update_jitem_price(\'".$row['id']."\')\" class=\"set_carat_field\" value=\"$"._nf($total_ring_diamond_price, 2)."\" />'";
                $json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br /> " . ''
                        .  "<a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#jewelryimg_".$row['id']."\">View Image</a>"
                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#videomodel_".$row['id']."\">View Video</a>'";
                
                //$json .= ",'" . addslashes($row['id']) . " '";
                $json .= ",'" . addslashes('Semi $' . _nf($row['price'], 2)) . " <br>"
                        . "<input type=\"text\" name=\"price_box\" id=\"price_box_".$row['id']."\" onkeyup=\"update_mainitem_price(\'".$row['id']."\')\" class=\"set_carat_field\" value=\"".$row['price']."\" />'";
                /*$json .= ",'<input type=\"text\" name=\"videos_link[]\" id=\"video_".$row['id']."\" onkeyup=\"update_jewitem_value(\'".$row['id']."\')\" class=\"set_link_field\" value=\"".$row['embed_link']."\" />'";*/
                //<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#centermodel_".$row['id']."\">Find Center <br>Diamond</a>
                $json .= ",'" . addslashes($item_detail['diamond_weight'] . '<br><b>Total Carat</b><br>' . $newTotalCarat) . ""
                        . "<br><a href=\"".$detail_link."/view\">View Details</a>"
                        . $this->get_jewelry_imgview_model($row['id'], $item_image, $row['product_name']).""
                        . $this->get_video_model_block($row['id'], $item_detail['embed_link_code'], $row['product_name']).""
                        . $this->get_similar_jewelry_list($row['id'], $item_shape, $row['price'], $item_detail['center_carat']).""
                        . $this->find_center_diamond_list($row['id'], $item_shape, $row['price']) . "'";
                
                $json .= ",'<b>Original Center <br>Diamond</b><br><input type=\"text\" name=\"center_carat\" id=\"ctcarat_".$row['id']."\" onkeyup=\"update_jcarat_value(\'".$row['id']."\')\" class=\"set_carat_field\" value=\"".$center_diamond_carat."\" />"
                        . "<br><b>Center Carat</b><br><input type=\"text\" name=\"newcenter_carat\" id=\"nctcarat_".$row['id']."\" onkeyup=\"updates_jcarat_value(\'".$row['id']."\')\" class=\"set_carat_field\" value=\"".$item_detail['new_center_carat']."\" />"
                        . "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#mymodel_".$row['id']."\">Change Center <br>Diamond</a>"
                        . "<br>".$update_center_diamond."'";
                $json .= ",'<input type=\"text\" name=\"side_carat\" id=\"scarat_".$row['id']."\" onkeyup=\"update_jcarat_value(\'".$row['id']."\')\" class=\"set_carat_field\" value=\"".$item_detail['semi_mount_weight']."\" />'";
                if( $row['missing_diamonds'] == 'N' ) {
                    $json .= ",'" . addslashes('No') . " '";
                } else {
                    $json .= ",'" . addslashes('<b>Missing<br>Diamond</b>') . " '";
                }
                $itemShapeValue = viewDmShape_new( $item_shape ); /// custome helper
                $item_shape_value = check_empty( $itemShapeValue, '<b>Center Diamond<br>Shape is not <br>available</b>' ); /// custome helper
                
                $json .= ",'" . addslashes($item_shape_value) . " '";
                $json .= ",'" . addslashes($row['idex_fw']) . " '";
                
                if( $diamond_row['price'] > 0 ) {
                    $json .= ",'" . addslashes($new_center_carat.'<br>'.$newCertView.'<br><b>Diamond Price</b><br>$'._nf($diamond_row['price'], 2)) . ""
                            . "<br><b>Total Price</b><br>$". _nf($total_ring_diamond_price, 2)."'";
                } else {
                    $json .= ",'" . addslashes($new_center_carat.'<br>'.$newCertView) . " '";
                }
                
                $json .= ",'" . addslashes($item_detail['center_carat'] . '<br>' . $oldCertView) . " '";
                $json .= ",'" . addslashes($feat_detail['item_id']) . " '";
                $json .= ",'" . addslashes($item_detail['set_type']) . " '";
                
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
            $results = $this->itemjewelrymodel->getIndexDiamondDetail($diamondID, 'lot');
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
        
    function setNewCertView($newCert='') {
        $new_cert_view = '';
        
        if( !empty($newCert) ) {
            $cert_list = explode('by', $newCert);
            if( !empty($cert_list[0]) ) { /// check certificate number
                $new_cert_view .= $cert_list[0];
            }
            
            if( !empty($cert_list[1]) ) { /// check cert either EGL or GIA, etc
                $new_cert_view .= '<br>by ' . $cert_list[1];
            }
        }
        
        return $new_cert_view;
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
        $itemdetail = $this->itemjewelrymodel->getItemDetailViaID($item_id);
        
        $results = $this->itemjewelrymodel->getCenterDiamondFilterResults($_GET, $item_id, $item_shape, $itemPrice, $items_carat, $minprice, $maxprice, $mcarat, $maxcarat);
        $item_details = $this->itemjewelrymodel->getItemSpecification($item_id, 'dev_ebay_details');
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
                $model_view .= '<div class=\"vide_view_block\"><iframe width="560" height="315" src="'.$embed_link.'" frameborder="0" allowfullscreen=""></iframe></div> \\';
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
        $results = $this->itemjewelrymodel->getSimilarItemLists($id, $itemShape, $item_price); //print_ar($results);
        $itemdetail = $this->itemjewelrymodel->getItemDetailViaID($id);
        $item_cate = urldecode($itemCate);
        $item_details = $this->itemjewelrymodel->getItemSpecification($id, 'dev_ebay_details');
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
        
        $this->itemjewelrymodel->updateItemDMInfo($itemID, $diamondID);
        
        echo 'Item Diamond info has changed successfully!';
        
    }
    
    //// update the items diamond info
    function update_jitems_price($itemID=0, $items_price=0) {
        $item_price = str_replace(array('$', ','), '', $items_price);
        $this->itemjewelrymodel->updateJewelryItemPrice($itemID, $item_price);
        
    }
        
    function update_jewelry_item($id=0) {
       $embed_value = urldecode( $this->input->get('embed_value') );

       $this->itemjewelrymodel->updateJewelryItemEmbedLink($id, $embed_value);
    }
    
    function update_jewcarat_value($id=0) {
       $center_carat = $this->input->get('center_carat');
       $side_carat   = $this->input->get('side_carat');

       $this->itemjewelrymodel->updateJewItemCarat($id, $center_carat, $side_carat);
    }
    
    function update_item_newprice($id=0, $newprice=0) {

       $this->itemjewelrymodel->updateNewPrice($id, $newprice);
       
    }
    
    function update_mainitem_price($id=0, $newprice=0) {

       $this->itemjewelrymodel->updateNewPrice($id, $newprice, 'price');
       
    }
    
    private function output($layout = null, $data = array()) {
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        $data['loginlink'] = $this->user->loginhtml('admin');
        $output = $this->load->view('admin/header', $data, true);
        if ($this->session->isLoggedin() && ($this->session->userdata('usertype') == 'admin')) {
                $output .= $layout;
        } else {
                $output .= $this->load->view('admin/login', $data, true);
        }
        $output .= $this->load->view('admin/footer', $data, true);
        $this->output->set_output($output);
    }

    function isadminlogin() {
        if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
                return true;
        } else {
                return false;
        }
    }
    
    function updateJewelryItemIDWithRandomNumber() {
        $this->itemjewelrymodel->update_item_detail_itemid();
        
        echo 'Item ID has updated Successfully!';
    }
    
    function getAdminDetails() {
        if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
                return 'Administrator';
        } else {
                return '-1';
        }
    }
}