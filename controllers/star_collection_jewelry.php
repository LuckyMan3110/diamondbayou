<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Star_collection_jewelry extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->model('commonmodel');
		$this->load->model('user');
		$this->load->model('star_collection_fashionmodel');
		$this->load->helper('admin_common_func');
		$this->load->helper('admin_mainmenu');

		$cu = current_url();
		$url = explode('/', $cu);
		$uri = ( isset($url[4]) ? $url[4] : '' );
		$this->session->set_userdata('pages_name', $uri);
	}

    function index(){
		die('You are not allowed to access this page directly!');
    }

	function star_collection_listing($action = 'view', $type='HD', $filter_id=0, $id = '', $sub_id = ''){
		$data['name'] = getAdminDetails();
		$item_category = urldecode($id);
		$item_sub_category = urldecode($sub_id);
		$data['category_list'] = $this->getStarCollectioncatelist($type, $filter_id, $item_category);
		$data['view_type'] = $type;
		$data['item_sub_category'] = $item_sub_category;
		$data['filter_id_no'] = $filter_id;
		$data['category_id'] = $item_category;
		$this->session->unset_userdata('return_message');
		$item_id_list = $this->input->post('item_id_list');

        if(isadminlogin()){
			if($action == 'delete'){
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
			}else{
				if($action == 'add' || $action == 'edit'){
					if(isset($_POST['btn'])){
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
				$(this).css({backgroundImage:"url(' . SITEIMG_URL .'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
				$(this).siblings().css({backgroundImage:"url(' . SITEIMG_URL .'images/plus.jpg)"});
			});
			$("#rapnet").click();';
			$link_strings = $type.'/'. $filter_id. '/'. $item_category. '/'. $item_sub_category;
			$url = SITE_URL . 'star_collection_jewelry/getStarCollectionListings/' . $action . '/' . $link_strings;
			$data['action'] = $action;
			$data['onloadextraheader'] .= "  var actionview = '".$action."';
			var home_link = '".SITE_URL . 'star_collection_jewelry/star_collection_listing/view/' . $link_strings."';
			var photo_gallery_link = '".SITE_URL . 'star_collection_jewelry/star_collection_listing/photogallery/' . $link_strings."';
			function amazonGaleryBtn() {
				window.location = '" . SITE_URL . "star_collection_jewelry/star_collection_listing/amazongallery/".$link_strings."';
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
					title: '<h1 class=\"pageheader\">Star Collection Items</h1>',
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
						{display: 'Style Group', name : 'style_group', width : 120, sortable : false, align: 'center'},
						{display: 'Metal Weight', name : 'metal_weight', width : 90, sortable : false, align: 'left'},
						{display: 'Stone Weight', name : 'stone_weight', width : 80, sortable : false, align: 'left'},
						{display: 'Supplied Stones', name : 'supplied_stones', width : 120, sortable : false, align: 'left'}
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
					sortname: \"p.id\",
					sortorder: \"ASC\",
					usepager: true,
					title: '<h1 class=\"pageheader\">Star Collection Items</h1>',
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
				} else if (com=='Add') {
					window.location = '" . SITE_URL . "admin/loosediamonds/add';
				}
			}";
			$data['extraheader'] = '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';
			$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
			$output = $this->load->view('admin/star_collection_listing', $data, true);
			output_page($output, $data);
        } else {
			$output = $this->load->view('admin/login', $data, true);
			output_page($output, $data);
		}
	}

	function getStarCollectionListings($action='view', $view_type='HD', $filterID=0, $cate_id='', $sub_cate_id='') {
		$page = isset($_POST['page']) ? $_POST['page'] : 0;
		$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
		$sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
		$sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'name';
		$query = isset($_POST['query']) ? $_POST['query'] : '';
		$qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'id';
		$results = $this->star_collection_fashionmodel->getStarCollectionItemRows($view_type, $filterID, $cate_id, $page, $rp, $sortname, $sortorder, $query, $qtype, $sub_cate_id);
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
			$rowsring = $this->star_collection_fashionmodel->getStarCollectionDetailViaId($row['ring_id']);
			$item_image = SITEIMG_URL .'scrapper/imgs/'.$rowsring['ImagePath'];
			$prod_name = $row['name'];
			$item_shape = '';
			$detail_link = SITE_URL . "star_collection_jewelry/star_collection_items_detail_edit/" . $row['ring_id'];
			$etsy_detail_link = SITE_URL . 'star_collection_jewelry/star_collection_items_detail/'.$row['ring_id'].'?sendTo=etsy';
			$newTotalCarat = '';
			$new_center_carat = '';
			$oldCertView = '';
			$newCertView = '';
			if( $row['catid'] != '-2' ) {
				$ebayLink = 'http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item='.$row['catid'];
			} else {
				$ebayLink = '#';
			}
			$imgrow = $this->star_collection_fashionmodel->getMoreItemImgList($row['ring_id']);
			$item_profit = '';
			$diamond_row = '';
			$pk_id = $row['ring_id'];
			$ebay_id   = 'ebay_'.$row['ring_id'];
			$amazon_id = 'amazon_'.$row['ring_id'];
			$sears_id  = 'sears_'.$row['ring_id'];
			$esty_id   = 'etsy_'.$row['ring_id'];
			$lst_id    = 'lst_'.$row['ring_id'];
			$ebay_h = 'ebay_h_'.$row['ring_id'];
			$ebay_c = 'ebay_c_'.$row['ring_id'];
			$amazon_h = 'amazon_h_'.$row['ring_id'];
			$amazon_c = 'amazon_c_'.$row['ring_id'];
			$sears_h = 'sears_h_'.$row['ring_id'];
			$sears_c = 'sears_c_'.$row['ring_id'];
			$esty_h = 'esty_h_'.$row['ring_id'];
			$esty_c = 'esty_c_'.$row['ring_id'];
			$lstdibbs_h = 'lstdibbs_h_'.$row['ring_id'];
			$lstdibbs_c = 'lstdibbs_c_'.$row['ring_id'];
			$check_box_class = 'class=\"bookid\"';
			if ($rc )
				$json .= ",";
                $json .= "\n {";
			$json .= "id:'" . $row['ring_id'] . "',";
            $json .= "cell:['<input type=\"checkbox\" ".$check_box_class." name=\"bookid[]\" value=\"".$row['ring_id']."\" />ID #: " . $row['ring_id'] . "<br /><a href=\'" .  $detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to eBay</a><br /><a href=\'" .  $etsy_detail_link . "\'  class=\"edit\" style=\"color:red; font-weight:bold;\">Send to Etsy</a><br /><a href=\'" . $detail_link . "/edit\'  class=\"edit\" style=\"font-weight:bold;\">Edit Details</a><br>". "<table class=\"set_ckbox_table\">". "<tr>". "<td><input type=\"checkbox\" name=\"cb_ebay\" ".checkedBox($ebay_id, $row['catid'])." id=\"".$ebay_id."\" onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$ebay_id."\', \'catid\')\" /><label for=\"".$ebay_id."\" class=\"set_lable\">Ebay</label></td>". "<th><input type=\"checkbox\" name=\"ebay_h\" id=\"".$ebay_h."\" value=\"".$ebay_h."\" ".checkedBox($ebay_h, $row['catid'])." onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$ebay_h."\', \'catid\')\" /></th>". "<th><input type=\"checkbox\" name=\"ebay_c\" id=\"".$ebay_c."\" value=\"".$ebay_c."\" ".checkedBox($ebay_c, $row['catid'])." onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$ebay_c."\', \'catid\')\" /></th>". "</tr>". "<tr>". "<td><input type=\"checkbox\" name=\"cb_amzon\" ".checkedBox($amazon_id, $row['catid'])." id=\"".$amazon_id."\" onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$amazon_id."\', \'catid\')\" /><label for=\"".$amazon_id."\" class=\"set_lable\">Amazon</label></td>". "<th><input type=\"checkbox\" name=\"amazon_h\" id=\"".$amazon_h."\" value=\"".$amazon_h."\" ".checkedBox($amazon_h, $row['catid'])." onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$amazon_h."\', \'amazon_h\')\" /></th>". "<th><input type=\"checkbox\" name=\"amazon_c\" id=\"".$amazon_c."\" value=\"".$amazon_c."\" ".checkedBox($amazon_c, $row['catid'])." onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$amazon_c."\', \'amazon_c\')\" /></th>". "</tr>". "<tr>". "<td><input type=\"checkbox\" name=\"cb_esty\" ".checkedBox($esty_id, $row['catid'])." id=\"".$esty_id."\" onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$esty_id."\', \'catid\')\" /><label for=\"".$esty_id."\" class=\"set_lable\">Etsy</label></td>". "<th><input type=\"checkbox\" name=\"esty_h\" id=\"".$esty_h."\" value=\"".$esty_h."\" ".checkedBox($esty_h, $row['catid'])." onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$esty_h."\', \'esty_h\')\" /></th>". "<th><input type=\"checkbox\" name=\"esty_c\" id=\"".$esty_c."\" value=\"".$esty_c."\" ".checkedBox($esty_c, $row['catid'])." onclick=\"update_market_id(\'".$row['ring_id']."\', \'".$esty_c."\', \'esty_c\')\" /></th>". "</tr>". "<tr>". "</table>'";
			if($action == 'photogallery') {
				$json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";    
				$json .= ",'<img src=\'" . addslashes($item_image) . "\' width=\'80\'><br />'";  
				$json .= ",'" . addslashes( getMarketMoreImgView($imgrow['ebay_img2']) . '<input type="file" name="eb2_'.$pk_id.'" />' ) . "'";
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
				$ringPrice = $rowsring['priceRetail'];
                $check_cate = strchr($cate_id, 'Cross');
                if( empty($check_cate) ) {
                    $semi_label = '';
                } else {
                    $semi_label = 'Semi ';
                }
                $total_ring_diamond_price = $ringPrice;
                $center_carat_weight = $row['metal_weight'];
                $diamond_detail = '';
                $update_center_diamond = '';
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
                $json .= ",'" . addslashes($semi_label.' $' . _nf($total_ring_diamond_price, 2)) . " <br>". "<input type=\"text\" name=\"price_box\" id=\"price_box_".$row['id']."\" onkeyup=\"update_jcarat_price(\'".$total_ring_diamond_price."\')\" class=\"set_carat_field\" value=\"".round($total_ring_diamond_price, 2)."\" />'";
                $json .= ",'" . addslashes($row['metal_weight'] . '<br><b>Total Carat</b><br>' . $newTotalCarat) . ""
				. "<br><a href=\"".$detail_link."/view\">View Details</a>";
                $json .= ",'<b>Total Carat</b><br><input type=\"text\" name=\"center_carat\" id=\"ctcarat_".$row['id']."\" onkeyup=\"update_jcarat_value(\'".$row['id']."\')\" class=\"set_carat_field\" value=\"".$center_carat_weight."\" /><br>"
				. $diamond_detail.""
				. "<br><a href=\"#javascript\" data-toggle=\"modal\" data-target=\"#mymodel_".$row['id']."\">Change Center <br>Diamond</a>"
				. "<br>".$update_center_diamond."'";
                $json .= ",'<input type=\"text\" name=\"side_carat\" id=\"scarat_".$row['id']."\" onkeyup=\"update_jcarat_value(\'".$row['id']."\')\" class=\"set_carat_field\" value=\"".$item_detail['semi_mount_weight']."\" />'";
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

	function getStarCollectioncatelist($type='', $filter_id=0, $category='') {
		$results = $this->star_collection_fashionmodel->getStarCollectionCategoryResults();
        $option_list = '<option value="">-- Select Category --</option>';
		foreach($results as $rows){
			$cate_name = $rows['name'];
			$option_list .= '<option value="'.$rows['id'].'" '.$this->selectedOption($rows['id'], $category).'>'.$cate_name.'</option>';
		}
		return $option_list;
	}

	function selectedOption($select,$select2) {
		$rt = ( $select == $select2 ? 'selected' : '' );
		return $rt;
	}

	function get_main_sub_category_list(){
    	if(isset($_GET['get_main_category_value'])){
			$cat_id 	            = $_GET['get_main_category_value'];
			$get_filter_id_no 	    = $_GET['get_filter_id_no'];
			$where_cat_id 	= array('parent_id' => $cat_id);
			$where_sub_cat	= $this->star_collection_fashionmodel->getSubCategory($cat_id);
            $option_sub_cat	= '<option value="">Select One Option</option>';
            $option_sub_cat	.= '<option value="'.SITE_URL.'star_collection_jewelry/star_collection_listing/view/star_collection/'.$get_filter_id_no.'/'.$cat_id.'/"> - Show With Main Category</option>';
			if(is_array($where_sub_cat)){
				foreach ($where_sub_cat as $sub_cat_value) {
					$option_sub_cat	.= '<option value="'.SITE_URL.'star_collection_jewelry/star_collection_listing/view/star_collection/'.$get_filter_id_no.'/'.$cat_id.'/'.$sub_cat_value['id'].'">'.$sub_cat_value['name'].'</option>';
				}
				echo $option_sub_cat;
			}
		}else{
			echo $option_sub_cat	= '<option value=""> Sub Category Not Found</option>';
		}
	}

}