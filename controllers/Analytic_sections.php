<?php
class Analytic_sections extends CI_Controller {
    private $totalEmails;
    function __construct() {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('commonmodel');
        $this->load->model('adminsection_newmodel');
        $this->load->helper('admin_libs');
        $this->load->helper('admin_mainmenu');
        $this->load->helper('analytic_code_section');
        $this->load->helper('form');
        $this->load->helper('url');

        $ttEmail = $this->adminmodel->getEmailsReceivedList();
        $this->totalEmails = $ttEmail['count'];

        $cu = current_url();
        $url = explode('/', $cu);
        $uri = ( isset($url[4]) ? $url[4] : '' );
        $this->session->set_userdata('pages_name', $uri);		
    }
    
    function index() {
        die('You are not allowed to access this page directly!'); exit;
    }
    
    function getPageNameOptions($selected_opt='') {
        $pageOptions = getSitePagesTitleList(); // analytic_code_section helper
        $page_option = '';
        
        foreach( $pageOptions as $option_key => $option_value ) {
            $page_option .= '<option value="'.$option_key.'" '.selectedOption($option_key, $selected_opt).'>'.$option_value.'</option>';
        }
        
        return $page_option;
    }
    
    function manage_analytics($action = 'view', $id = 0) {
        $data = $this->getCommonData();
        $data['name'] = $this->getAdminDetails();
        $data['extraheader'] = '';
        
            if ($this->isadminlogin()) {
                    if ($action == 'delete') {
                            $ret = $this->adminsection_newmodel->save_analytic_code($_POST, $action, $id);
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
                            $this->load->library('form_validation');
                            if (isset($_POST[$action . 'btn'])) {
                                    $ret = $this->adminsection_newmodel->save_analytic_code($_POST, $action, $id);
                                    if ($ret['error'] == '')
                                    $data['success'] = $ret['success'];
                                    else {
                                            $data['error'] = $ret['error'];
                                            if ($action != 'edit')
                                            $data['details'] = $_POST;
                                    }
                                        //}
                                }
            if ($action == 'edit') {
                $data['id'] = $id;
                $data['details'] = $this->adminsection_newmodel->getAnalyticRowById($id);
            }
        }
        $data['page_name_options'] = $this->getPageNameOptions( $data['details']['page_link_id'] );
        
        $data['onloadextraheader'] = '$("#secondpane p.menu_head").click(function()
                                                    {
            $(this).css({backgroundImage:"url(' . SITE_URL . 'images/minus.jpg)"}).next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
        $(this).siblings().css({backgroundImage:"url(' . SITE_URL . 'images/plus.jpg)"});
       });
       $("#rapnet").click();';
        $url = SITE_URL . 'analytic_sections/getAnalyticsRows';
        $data['action'] = $action;
        $data['onloadextraheader'] .= "   $(\"#results\").flexigrid
                (
                {   	 							
                url: '" . $url . "',
                dataType: 'json',
                colModel : [
                        {display: 'ID', name : 'id', width : 80, sortable : true, align: 'center'},
                        {display: 'Page Name', name : 'page_title', width : 450, sortable : true, align: 'left'},
                        {display: 'Add Date', name : 'add_date', width : 100, sortable : true, align: 'center'}
                        ],
                         buttons : [{name: 'Add', bclass: 'add', onpress : test},
                                        {name: 'Delete', bclass: 'delete', onpress : test},
                                        {separator: true}
                                ],
                searchitems : [
                        {display: 'ID #', name : 'id', isdefault: true},
                        {display: 'Page Title', name : 'page_title', isdefault: true}
                        ], 		
                sortname: \"id\",
                sortorder: \"DESC\",
                usepager: true,
                title: '<h1 class=\"pageheader\">Manage Analytics Code</h1>',
                useRp: true,
                rp: 100,
                showTableToggleBtn: false,
                width:1025,
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
                                                url: \"" . SITE_URL . "analytic_sections/manage_analytics/delete\",
                                                data: \"items=\"+itemlist,
                                                success: function(data){
                                                     alert('Total Deleted Rows: '+data.total);
                                                 $(\"#results\").flexReload();
                                                },
                                                error:function (xhr, ajaxOptions, thrownError){
                                                     alert(xhr.status);
                                                     alert(xhr.responseText);
                                                 }               
                            });                                                                                                                                               }
      } else{
              alert('You have to select a Analytic Data Row.');
      } 
    }
        else if (com=='Add')
                {
                        window.location = '" . SITE_URL . "analytic_sections/manage_analytics/add';
                }			
                }";
        
        $data['extraheader'] .= '<script src="' . SITE_URL . 'third_party/flexigrid/flexigrid.js"></script>';
        $data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'third_party/flexigrid/css/flexigrid/flexigrid_admin.css" rel="stylesheet" /> ';
	$data['extraheader'] .= '<script src="' . SITE_URL . 'js/swfobject.js" type="text/javascript"></script>';
	$data['extraheader'] .= '<script src="' . SITE_URL . 'js/t.js" type="text/javascript"></script>';
	$data['onloadextraheader'] .= "var so;";
        $data['usetips'] = true;
        $output = $this->load->view('admin/analytics_manage_data', $data, true);
        $this->output($output, $data);
            }
	} else {
            $output = $this->load->view('admin/login', $data, true);
            $this->output($output, $data);
        }
    }
    
    function getAnalyticsRows() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'page_title';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'DESC';
        $query = isset($_POST['query']) ? $_POST['query'] : '';
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : 'page_title';
        $results = $this->adminsection_newmodel->getAnalyticsRowsList($page, $rp, $sortname, $sortorder, $query, $qtype);
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
        foreach ($results['result'] as $row) {
            $shape = '';
            if ($rc)
            $json .= ",";
            $json .= "\n {";
            $json .= "id:'" . $row['id'] . "',";
            $json .= "cell:['ID #: " . $row['id'] . "<br /><a href=\'" . SITE_URL . "analytic_sections/manage_analytics/edit/" . $row['id'] . "\'  class=\"edit\">Edit</a>'";
            $json .= ",'" . addslashes($row['page_title']) . "'";
            $json .= ",'" . addslashes($row['add_date']) . "'";
            $json .= "]";
            $json .= "}";
            $rc = true;
        }
        $json .= "]\n";
        $json .= "}";
        echo $json;
    }
    
    private function getCommonData() {
        //$data = array();
        $data = $this->commonmodel->getPageCommonData();
        return $data;
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
}