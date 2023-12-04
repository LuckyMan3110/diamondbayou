<?php
class Adminsection extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('commonmodel');
        $this->load->model('jewelrymodel');
        $this->load->model('adminjewelrymodel');
        $this->load->model('adminmodel');
        $this->load->model('qualitymodel');
    }
    
    function index() {
        die('Page Not Found');
    }
    
    //// manipulate the jewelry sub categories
    function manageRingAttribute($mesg=false, $id=0, $action='', $sub_cate_id=0) {
        
        $data = $this->getCommonData();
        $data['options_list'] = $this->mainCategoryList();
        $btn_submit   = $this->input->post('btn_submit', TRUE);
        //$global_submit = $this->input->post('global_submit', TRUE);
        
        $subcate_options = $this->input->post('subcate_options', TRUE);
        $subcate_id = ( strlen($id) > 6 ? $id : '' );
        $sub_category_id = ( $sub_cate_id > 0 ? $sub_cate_id : $subcate_id );
        $subcategory_id = ( $sub_category_id > 0 ? $sub_category_id : 0 );
        
        $attribute_id = ( empty( $subcate_id ) ? $id : '' );
        $data['attribute_list'] = $this->getAttributeList( 0, $subcategory_id );
        $data['submit_form'] = '';
        
        ///// delete records
        if( $action === 'delete' ) {
            $this->adminjewelrymodel->saveJewAttriubte($id, $action);
             header('Location:'.SITE_URL.'adminsection/manageRingAttribute/Attribute has deleted successfully!/'.$sub_cate_id);
        }
        
        if( isset($btn_submit) && !empty($btn_submit) ) {
          $results = $this->adminjewelrymodel->saveJewAttriubte($attribute_id, $action);     ///// save category data into db
          if( $results == 'true' ) {
            $submit_form = 'Attribute has saved successfully!';
                header('Location:'.SITE_URL.'adminsection/manageRingAttribute/'.$submit_form.'/'.$subcate_options.'/'.$sub_cate_id);
          }
        }
        
        //// get row detial to edit the records
        if( !empty($id) && $action == 'edit' ) {
            $rowedit = $this->adminjewelrymodel->getAttributeRow( $id );
            
            $data['jewelry_category'] = $this->adminjewelrymodel->getCategoryName( $rowedit['parent_category'] );
            $data['parent_sub_cate']  = $this->adminjewelrymodel->getCategoryName( $rowedit['parent_sub_category'] );
            $data['sub_category']     = $this->adminjewelrymodel->getCategoryName( $rowedit['sub_category'] );
            $data['attribute_name']   = $rowedit['attribute_label'];
            $data['attriubte_id']   = $id;
            $data['button_label']   = 'Modify Attribute';
            $data['global_button']   = 'Add Global Attribute';
            
        } else {
            $data['jewelry_category'] = '';
            $data['parent_sub_cate']  = '';
            $data['sub_category']     = '';
            $data['attribute_name']   = '';
            $data['attriubte_id']     = '';
            $data['button_label']     = 'Add New Attribute';
            $data['global_button']   = 'Add Global Attribute';
        }
        
        
        
        if( $mesg != 'false' ) {
            $data['submit_form'] = urldecode($mesg);
        }
        $this->load->view('admin/managed_jewelry_attributes', $data);
    }
    //// get parent category list
    function mainCategoryList($parentid=0, $sub='') {
        //$cate_parent_id = urlencode($parentid);
        $results = $this->adminjewelrymodel->getJewCategory( $parentid );
        
        $optionslist = '';
        if( count($results) > 0 ) {
            $optionslist .= '<option value=""> ---------- </option>';
            foreach( $results as $rows ) {
                $optionslist .= '<option value="'.$rows['category_id'].'">'.$rows['category_name'].'</option>';
            }
        }
        if( empty($sub) ) {
            return $optionslist;
        } else {
            echo $optionslist;
        }        
    }
    ///// attribute list
    function getAttributeList($category_id=0, $subcateid=0) {
        if( $category_id > 0 ) {
            $results = $this->adminjewelrymodel->getAttributeList($category_id);
        } elseif( $subcateid > 0 ) {
            $results = $this->adminjewelrymodel->getAttributeList($subcateid);
        } else {
            $results = $this->adminjewelrymodel->getAttributeList(0, 'listing');
        }
        
        $attriubte_list = '';
        $action_link = SITE_URL.'adminsection/manageRingAttribute/false/';
        
        $i = 1;
        
        if( count($results) > 0 ) {
            foreach ( $results as $row ) {
                $parent_cate = $this->adminjewelrymodel->getCategoryName( $row['parent_category'] );
                $parent_cate_name = ( !empty($parent_cate) ? $parent_cate : 'Global Attribute' );
                
            $attriubte_list .= '<tr>
                                <td>'.$i.'</td>
                                <td>' . $parent_cate_name . '</td>
                                <td>' . $this->adminjewelrymodel->getCategoryName( $row['parent_sub_category'] ) . '</td>
                                <td>' . $this->adminjewelrymodel->getCategoryName( $row['sub_category'] ) . '</td>
                                <td>'.$row['attribute_label'].'</td>
                                <td><a href="#javascript" onClick="confirmRecord('.$row['id'].', '.$subcateid.')">Delete</a> | <a href="'.$action_link.$row['id'].'/edit/'.$subcateid.'">Edit</a></td>
                            </tr>';
            
            $i++;
            }
        } else {
            $attriubte_list .= '<tr><td colspan="6">No Attribute Found</td></tr>';
        }
        
        if( $category_id > 0 ) {
            echo $attriubte_list;
        } else {
            return $attriubte_list;
        }        
    }
   ///////////////////
    private function getCommonData() {
        $data = array();
        $data = $this->commonmodel->getPageCommonData();
        return $data;
    }
}