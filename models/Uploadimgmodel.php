<?php
/**
* model class used for upload image choose by admin
* @param string
* @return string
* @since 28, March 2017
* @Author Muhammad Safdar
*/
class Uploadimgmodel extends CI_Model{
    
    function __construct(){

            parent::__construct();
    }
    
    /*
     * parameters explainations:
     * 
     * $lists_id : list of id all phones
     * $file_colum : browse file column name
     * $db_field img filed in database table
     * $pk_id : primary key in table
     * $db_table table name in database
     * $src_folder src folder path like images/gallery, etc
     * 
     */
    ////// upload item photo gallery
    function upload_phoneimg_intoDB($lists_id=array(), $file_colum='', $db_field='image', $pk_id='id', $db_table='models_sell', $src_folder='for_lessphone_img/images_sell') {
     
        array_filter($lists_id);
        if( count($lists_id) > 0) {
        $file_up['message'] = 'Success';
        foreach($lists_id as $list_id) {
            if( !empty($list_id)) {
                $list_id = trim($list_id);
                    
                $fieldsName    = $file_colum.$list_id;  //// input file name
                $uploaded_file = $db_field; //// db column name
                    
                    //echo $_FILES[$fieldsName]['name'].'<br>';exit;
           
           if( !empty($_FILES[$fieldsName]['name']) ) {
            ////// upload shapes img    
            $this->upload_img_file($_FILES, $fieldsName, $src_folder, 'jpeg,gif,jpg,bmp,png', $src_folder, 'phoneimg', $db_table, $pk_id, $list_id, $uploaded_file);     
                }
            }
        }
    } else {
      $file_up['message'] = 'Plz checked the checkbox to upload file';      
    }
        return $file_up;
    }
    
    function upload_img_file($files, $formfilenvar = 'myfile', $imageurlbase = '', $extsupport = 'jpeg,gif,jpg,bmp,png,swf', $base_savepath = 'uploads/', $filename = 'error.error', $dbtable = 'error', $idfield = 'id', $idvalue = '1', $tablefield = 'msg') {
        $attachExtension = '';
        $rdno = rand(10,1000);
        $db_table = $dbtable;
        ///// get pcitrue db field value
        $sqlpict = "SELECT $tablefield FROM $db_table WHERE $idfield = ".$idvalue;
        $pictqry = $this->db->query($sqlpict);
        $pictrow = $pictqry->result_array();
        
        if ($files[$formfilenvar]['name'] != '') {
            $supportExt = explode(',', $extsupport);
             $fileExt = end(explode('.', $files[$formfilenvar]['name']));
            //if (in_array(strtolower($fileExt[1]), $supportExt)) {
            if (TRUE) {
               $attachFileName = $files[$formfilenvar]['tmp_name'];
                //$attachFileName = $_FILES['image_small']['tmp_name'];
                $attachExtension = strtolower($fileExt);
                $moveFileName = str_replace( ' ', '_', strtolower($files[$formfilenvar]['name']) );
                $uploadedFileName = $idvalue.'_'.$rdno.'_'.$moveFileName;
                $saveTo = $base_savepath . '/' . $uploadedFileName;
                //$imageurl = $imageurlbase . '/' . $uploadedFileName;
                $imageurl = $uploadedFileName;
                
                if ( !empty($pictrow[0][$tablefield]) ) {
                    //$pict_str = explode('images', $pictrow[0][$tablefield]); 
                        unlink($base_savepath . '/' . $pictrow[0][$tablefield]);
                }
                
                //echo $saveTo;die;
                //chmod($base_savepath, 0777);
                $ismove = move_uploaded_file($attachFileName, $saveTo);
                //chmod($base_savepath, 0655);
               if ($ismove) {
                    $this->db->where($idfield, $idvalue);
                    $t = $isinsert = $this->db->update($dbtable, array($tablefield => $imageurl));
                    if ($t) {
                        $ret['success'] = SITE_URL . $imageurl;
                    } else {
                        $ret['error'] = 'ERROR ! Image not uploaded';
                    }
                } else {
                    $ret['error'] = '<br><b>ERROR ! </b>File Can\t upload to server';
                }
            } else {
                $ret['error'] = '<br> Invalid File Type : <b>' . $fileExt[1] . '</b>';
            }
            return $ret;
        }
    }
        
}