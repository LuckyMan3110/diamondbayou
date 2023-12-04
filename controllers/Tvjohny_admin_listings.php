<?php
class Tvjohny_admin_listings extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('user');
        $this->load->model('sitepaging');
        $this->load->model('commonmodel');
        $this->load->model('helixmodel');
        $this->load->model('cronmodel');              
        $this->load->model('uploadimgmodel');              
        $this->load->model('davidsternmodel');
        $this->load->model('tvjohny_watchesmodel');
        $this->load->helper('admin_libs');
        $this->load->helper('collection_items');
        $this->load->helper('form');
        $this->load->helper('url');

        $ttEmail = $this->adminmodel->getEmailsReceivedList();
        $this->totalEmails = $ttEmail['count'];

        $cu = current_url();
        $url = explode('/', $cu);
        $uri = ( isset($url[4]) ? $url[4] : '' );
        $this->session->set_userdata('pages_name', $uri);
    }	
    function index()
    {
        die('You are not allowed to access this page!');
    }
    
    function tvjohny_item_mgmt($action = 'view', $id = 0, $type='') {
        //$db2 = $this->load->database('malak', TRUE);
        //$this->db->close();
        //$malak_db = $this->load->database('malak', TRUE); // Connect to malak database
        //$this->db = $malak_db;
        $this->load->model('adminjewelrymodel');
        
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();

        ///Custom module loading
        $this->load->model('malak_adminmodel');
        $data['extraheader']  = '';
        $data['collections'] ='';
        $data['typeoptions'] = '';
        $data['action_type'] = $action;
        $excel_file_path = 'excel_libs/';
        $ring_id_list = $this->input->post('ring_id_list');
        
        if( !empty($ring_id_list) && count($ring_id_list) > 0 ) {
          $this->uploadimgmodel->upload_phoneimg_intoDB($ring_id_list, 'edit_img_', 'image1', 'id', 'dev_jewelries', 'completed_images/completed_images');
        }
             
        if( !empty( $_FILES['import_xlfile']['name'] ) ) {
            //echo $malak_db->database;
            $excelFile = $excel_file_path.$_FILES['import_xlfile']['name'];
            move_uploaded_file($_FILES['import_xlfile']['tmp_name'], $excelFile);
            echo $_FILES['import_xlfile']['tmp_name']; 
            
            require_once 'excel_libs/reader.php';
            // ExcelFile($filename, $encoding);
            $data = new Spreadsheet_Excel_Reader();
            // Set output Encoding.
            $data->setOutputEncoding('CP1251');
            $data->read(SITE_URL.'/'.$excelFile);
            error_reporting(E_ALL ^ E_NOTICE);

            for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                    for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                            echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                    }
                    echo "\n";

            }
            
            echo 'Excel File read here!';
            exit;
            
            unlink( $excelFile );
        }

        if($this->isadminlogin()){
                if($action == 'delete'){
                        $ret = $this->malak_adminmodel->jewelries($_POST , $action , $id);
                        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
                        header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
                        header("Cache-Control: no-cache, must-revalidate" );
                        header("Pragma: no-cache" );
                        header("Content-type: text/x-json");
                        $json = "";
                        $json .= "{\n";
                        $json .= "total: ".$ret['total'].",\n";
                        $json .= "}\n";
                        echo $json;
                }else{ 
                        if($action == 'add' || $action == 'edit'){
                                $this->load->library('form_validation');
                                $this->form_validation->set_rules('vendor_name', 'vendor_name', 'trim|required');
                                $this->form_validation->set_rules('vendor_sku', 'vendor_sku', 'trim|required');
                                $this->form_validation->set_error_delimiters('<font class="require">', '</font>');
                                if(isset($_POST[$action.'btn'])){
                                        if ($this->form_validation->run() == FALSE){
                                                $data['error'] = 'ERROR ! Please check the error fields';
                                                if($action != 'edit')$data['details'] = $_POST;
                                        }else {
                                            $jewlabel  = $this->input->post('jewlabel');
                                            $jew_field = $this->input->post('jew_field');
                                            $description = $this->input->post('desc_field');
                                            $detailField = array();
                                            $detail_field = '';
                                            
                                            if( isset($jewlabel) && !empty($jewlabel) ) {
                                                for($i=0; $i < count($jewlabel); $i++) {
                                                    $fieldValue = ( $jewlabel[$i] != 'Description' ? strip_tags($jew_field[$i]) : $description );
                                                    $detailField[] = array($jewlabel[$i], $fieldValue);
                                                } 
                                               $detail_field = serialize( $detailField );
                                            }
                                            
                                            //print_ar($detailField);
                                            
                                            
                                            
                                                $ret = $this->malak_adminmodel->jewelries($_POST , $action , $id, $detail_field);
                                                if($ret['error'] == '')$data['success'] = $ret['success'];
                                                else{
                                                        $data['error'] = $ret['error'];
                                                        if($action != 'edit')$data['details']  = $_POST;
                                                }
                                        }
                                }
    $data['extraheader'] .= $this->commonmodel->addEditor('simple' );
    //      $data['collectionoptions'] = $this->commonmodel->makeoptions($this->adminmodel->getcollections() , 'collection' , 'collection');
    $data['gemstones'] = $this->malak_adminmodel->getGemstonesByStockId($id);
    if($action == 'edit') {
        $this->load->model('jewelrymodel');
        $edit_id = $this->input->post('collection_id', TRUE);
        $data['success'] = ( !empty($edit_id) ? 'Collection Items has updated successfully!' : '' );
        $data['details'] = $this->tvjohny_watchesmodel->get_tvjohny_row_details($id, $edit_id, $_POST, $_FILES); //print_ar($data['details']);
        $data['global_fields'] = unserialize( $data['details']['global_fields'] );
        
        if( !empty($edit_id) ) {
            redirect('tvjohny_admin_listings/tvjohny_item_mgmt/edit/'.$edit_id.'/update');
        }
        
        $details = $data['details'];
        switch ($details['section']){
                case 'Earrings':
                        $collections = '<option value="DiamondStud">Diamond Stud Earrings</option>
                                                                                  <option value="BuildEarring">Build Your Own Earrings</option>
                                                                                ';
                        break;
                case 'EngagementRings':
                        $collections = '
                                                                                        <option value="International Collection">International Collection</option>
                                                                                ';
                        break;
                case 'Jewelry':
                        $collections = '
                                                                                        <option value="MensWeddingRing">Men\'s Wedding Rings</option>  
                                                                            <option value="WomensWeddingRing">Women\'s Wedding Rings</option>  
                                                                                        <option value="WomensAnniversaryRing">Women\'s Anniversary Rings</option> 
                                                                                        ';
                        break;
                case 'Pendants':
                        $collections = '
                                                                                        <option value="BuildPendant">Build your own Pendants</option>
                                                                                ';
                        break;
                default:
                        break;
        }
        $data['collections'] =$collections;
        $data['animations'] = $this->malak_adminmodel->getFlashByStockId($id);
        $data['id'] = $id;
    }
                        }

                        $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
                         {
                         $(this).css({backgroundImage:"url('.SITE_URL.'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
                         $(this).siblings().css({backgroundImage:"url('.SITE_URL.'images/plus.jpg)"});
                         });
                         $("#jewelrymanage").click();

                         ';
                        $data['leftmenus']	=	$this->malak_adminmodel->adminmenuhtml('jewelries');
                        $url = SITE_URL.'tvjohny_admin_listings/gettvjohny_item_listings';
                        $data['action'] = $action;
                        $data['onloadextraheader'] .= "   $(\"#results\").flexigrid({
                  url: '".$url."',
                  dataType: 'json',
                  colModel : [
                  {display: 'ID', name : 'id', width : 80, sortable : true, align: 'center'},
                  {display: 'Item Price', name : 'Price', width : 85, sortable : true, align: 'center'},
                  {display: 'Item SKU', name : 'SKU', width : 100, sortable : true, align: 'center'},
                  {display: 'Metal Type', name : 'Metal_Type', width : 85, sortable : true, align: 'center'},
                  {display: 'Title', name : 'Title', width : 120, sortable : true, align: 'center'},
                  {display: 'Category', name : 'Category', width : 120, sortable : true, align: 'center'},
                  {display: 'Subcategory_1', name : 'Subcategory_1', width : 100, sortable : true, align: 'center'},
                  {display: 'Subcategory_2', name : 'Subcategory_2', width : 100, sortable : true, align: 'center'},
                  {display: 'Subcategory_3', name : 'Subcategory_3', width : 100, sortable : true, align: 'center'},
                  {display: 'Carat Weight', name : 'Carat_Weight', width : 100, sortable : true, align: 'center'},
                  {display: 'Diamond Color', name : 'Diamond_Color', width : 100, sortable : true, align: 'center'},
                  {display: 'Case', name : 'Case', width : 100, sortable : true, align: 'center'}],
                  buttons : [{name: 'Add', bclass: 'add', onpress : test},
                  {name: 'Delete', bclass: 'delete', onpress : test},
                  {name: 'Upload Image', bclass: 'add', onpress : uploadImage},
                  {separator: true}
                  ],
                  searchitems : [
                  {display: 'Lot #', name : 'id', isdefault: true},
                  {display: 'Item SKU', name : 'SKU', isdefault: true},
                  {display: 'Subcategory_2', name : 'Subcategory_2', isdefault: true}
                  ],
                  sortname: \"Subcategory_2\",
                  sortorder: \"ASC\",
                  usepager: true,
                  title: '<h1 class=\"pageheader\">TV Johny Collection</h1><div id=\"return_mesage\"></div>',
                  useRp: true,
                  rp: 50,
                  showTableToggleBtn: false,
                  width:1190,
                  height: 800
                  }
                  );

                  function test(com,grid)
                  {
                  if (com=='Delete')
                  {

                  if($('.trSelected').length>0){
                  if(confirm('Remove ' + $('.trSelected').length + ' rows?')){
                  var items = $('.trSelected');
                  var itemlist ='';
                  for(i=0;i<items.length;i++){
                  itemlist+= items[i].id.substr(3)+\",\";
                  }
                  $.ajax({
                  type: \"POST\",
                  dataType: \"json\",
                  url: \"".SITE_URL."tvjohny_admin_listings/tvjohny_item_mgmt/delete\",
                  data: \"items=\"+itemlist,
                  success: function(data){
                  alert('Total Deleted rows: '+data.total);
                  $(\"#results\").flexReload();
                  }
                  });

                  }
                  } else{
                  alert('You have to select a row.');
                  }


                  }
                  else if (com=='Add')
                  {
                  window.location = '".SITE_URL."tvjohny_admin_listings/tvjohny_item_mgmt/add';
                  }
                  }
                  function uploadImage() {
                        document.getElementById('jewelry_form').submit();
                  }";

        $data['extraheader'] .= '<script src="'.SITE_URL.'third_party/flexigrid/flexigrid.js"></script>';
        $data['extraheader'] .= '<link type="text/css" href="'.SITE_URL.'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
        $data['extraheader'] .= '<script src="'.SITE_URL.'js/swfobject.js" type="text/javascript"></script>';
        $data['extraheader'] .= '<script src="'.SITE_URL.'js/t.js" type="text/javascript"></script>';
        $data['onloadextraheader'] .= "var so;";
        $data['usetips'] = true;
        $data['success'] = ( !empty($type) ? 'Collection Items has updated successfully!' : '' );
        $data['cate_results'] = $this->adminjewelrymodel->getJewCategory( 0 );
        $output = $this->load->view('admin/tvjohny_item_mgmt_view' , $data , true);
        $this->output($output , $data);
        //echo "Send Output";
                }
        } else { $output =$this->load->view('admin/login', $data , true);$this->output($output , $data);}
        //$this->load->database('default'); // Connect to malak database
    }
    
    function gettvjohny_item_listings($addoption = '') {        

            $page 		= isset($_POST['page']) ? $_POST['page'] : 1;
            $rp 		= isset($_POST['rp']) ? $_POST['rp'] : 10;
            $sortname 	= isset($_POST['sortname']) ? $_POST['sortname'] : 'Subcategory_2';
            $sortorder 	= isset($_POST['sortorder'])? $_POST['sortorder'] : 'DESC';
            $query 		= isset($_POST['query']) ? $_POST['query'] : '';
            $qtype 		= isset($_POST['qtype']) ? $_POST['qtype'] : 'title';
            $results = $this->tvjohny_watchesmodel->getTvJohnnyRows($page, $rp, $sortname ,$sortorder  ,$query  , $qtype);
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
            header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
            header("Cache-Control: no-cache, must-revalidate" );
            header("Pragma: no-cache" );
            header("Content-type: text/x-json");
            $json = "";
            $json .= "{\n";
            $json .= "page: $page,\n";
            $json .= "total: ".$results['count'].",\n";
            $json .= "rows: [";
            $rc = false;
            foreach ($results['result'] as $row) {
			if ($rc) $json .= ",";
			$json .= "\n {";
			$json .= "id:'".$row['id']."',";
			$json .= "cell:['Lot #: ".$row['id']."<br /><a href=\'".SITE_URL."tvjohny_admin_listings/tvjohny_item_mgmt/edit/".($row['id'])."\'  class=\"edit\">View Details</a>'";
                                            
                        $imgrow = getTvJohnyProductImg($row);   //// ringsection helper
                    
                        $json .= ",'<img src=\'".$imgrow[0]."\' width=\'80\'><br />$ ".addslashes($row['Price']).""
                                . "<br><b>Edit Price</b><br>"
                                . "<input type=\"text\" name=\"jew_price\" id=\"jew_price_".$row['id']."\" onkeyup=\"update_jewelry_price(\'".$row['id']."\')\" class=\"set_price_field\" value=\"".$row['Price']."\" />"
                                . "<br><b>Edit Image</b><br>"
                                . "<input type=\"file\" name=\"edit_img_".$row['id']."\" />'";
                        
                        $json .= ",'<input type=\"text\" size=\"10\" name=\"item_sku\" onkeyup=\"update_jewelry_cols(\'".addslashes($row['id'])."\')\" id=\"item_sku_".addslashes($row['id'])."\" value=\"".addslashes($row['SKU'])."\">'";
                        
			$json .= ",'".addslashes($row['Metal_Type'])."'";
			$json .= ",'".addslashes($row['Title'])."'";
			$json .= ",'".addslashes($row['Category'])."'";
			$json .= ",'".addslashes($row['Subcategory_1'])."'";
			$json .= ",'".addslashes($row['Subcategory_2'])."'";
			$json .= ",'".addslashes($row['Subcategory_3'])."'";
			$json .= ",'".addslashes($row['Carat_Weight'])."'";
			$json .= ",'".addslashes($row['Diamond_Color'])."'";
			$json .= ",'".addslashes($row['Case'])."'";
			$json .= "]";
			$json .= "}";
			$rc = true;
				
		}
		$json .= "]\n";
		$json .= "}";
		echo $json;
    }
    
    function getCollectionImgLink($row=array()) {
        if( !empty($row['jew_image_url']) ) {
            $jewelry_img = $row['jew_image_url'];
            $image_file_name = $row['jew_image_url'];
        } else {
            if( $row['image1'] != '' ) {
                $jewelrys_img = SITE_URI . 'completed_images/completed_images/' . $row['image1'].'.png';
                if( getimagesize($jewelrys_img) ) {
                    $jewelry_img = $jewelrys_img;
                } else {
                    $jewelry_img = SITE_URI . 'completed_images/completed_images/' . $row['image1'];
                }
                $image_file_name = $row['image1'];
            } else {
                if( file_exists('images/uploads/'.$row['item_sku'].'.jpg') ) {
                    $jewelry_img = SITE_URL.'images/uploads/'.$row['item_sku'].'.jpg.png';
                    $image_file_name = $row['item_sku'].'.jpg';
                } else {
                    $jewelry_img = SITE_URL.'images/noimage_found_2.jpg';
                    $image_file_name = '';
                }
            }
        }
        
        if( getimagesize($jewelry_img) ) {
            $jew_img = $jewelry_img;
        } else {
            $jew_img = SITE_URL.'images/noimage_found_2.jpg';
        }
        
        $returns['jewelry_img'] = $jew_img;
        $returns['image_file_name'] = $image_file_name;
        
        return $returns;
    }
    
    private function output($layout = null, $data = array()) {
        $this->load->model('user');
        $this->load->model('adminmodel');
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
    
    function getAdminDetails() {
        if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
                return 'Administrator';
        } else {
                return '-1';
        }
    }
    
    function isadminlogin() {
        if (($this->session->isLoggedin()) && ($this->session->userdata('usertype') == 'admin')) {
                return true;
        } else {
                return false;
        }
    }
        
    private function getCommonData() {
        $data = $this->commonmodel->getPageCommonData();
        return $data;
    }
}