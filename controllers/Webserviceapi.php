<?php 

class Webserviceapi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('webservicemodel');
    }

    function index() {
		//echo 'this is an test web service';
    }
	
	/// api link: http://yadegardiamonds.com/webserviceapi/getMainCategoryList
	function getMainCategoryList() {
		
		$catelist = $this->webservicemodel->getMainCateViewList();
		echo $catelist;
    }
	function getMainCategoryViewList() {
		
		$catelist = $this->webservicemodel->getMainCateViewList();
		echo $catelist;
    }
	function getSubCategoryList($id='') {
		
		$subcatelist = $this->webservicemodel->getSubCategory($id);
		echo $subcatelist;
    }
	///// get rings via category
	function getRingsViaCategory($id='') {
		$subcatelist = '';
		
		if( !empty($id) ) {
			$subcatelist = $this->webservicemodel->getRingsViaCate($id);
		}
		
		echo $subcatelist;
	}
	//// get rings img via id
	function getRingsImgView($id) {
		
		$subcatelist = $this->webservicemodel->getRingsImgViaId($id);
		echo $subcatelist['ImagePath'];
	}
}
?>