<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

class Adminexceldownload extends CI_Controller {
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
    
    ///// create excel file and download it
    function downloadExcelFile($cateID=0, $gender_id='', $subCateID=0) {
        $time_string = time();
        $downloadFileName = $time_string.'_spreadsheet.xls';
        
        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Europe/London');

        if (PHP_SAPI == 'cli') {
                die('This example should only be run from a Web Browser');
        }
        /** Include PHPExcel */
        
        //require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
        require_once 'classes_phpexcel/PHPExcel.php';


        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                                                 ->setLastModifiedBy("Maarten Balliauw")
                                                                 ->setTitle("Office 2007 XLSX Test Document")
                                                                 ->setSubject("Office 2007 XLSX Test Document")
                                                                 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                                                 ->setKeywords("office 2007 openxml php")
                                                                 ->setCategory("Test result file");

    $additoinal_cols = $this->get_additional_columns( $cateID );
    $cols_list = array('P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    
    //// set excel file header
    $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Item Sku')
                    ->setCellValue('B1', 'Vendor Name!')
                    ->setCellValue('C1', 'Vendor Sku')
                    ->setCellValue('D1', 'Ebay')
                    ->setCellValue('E1', 'Website')
                    ->setCellValue('F1', 'Amazon')
                    ->setCellValue('G1', 'Price Amazon')
                    ->setCellValue('H1', 'Retail Price')
                    ->setCellValue('I1', 'Price eBay')
                    ->setCellValue('J1', 'Price Website')
                    ->setCellValue('K1', 'Quantity')
                    ->setCellValue('L1', 'Gender')
                    ->setCellValue('M1', 'Parent Category')
                    ->setCellValue('N1', 'Sub Category')
                    ->setCellValue('O1', 'Sub Category Name');
    
    $r = 0;
    if( !empty($additoinal_cols) && count($additoinal_cols) > 0 ) {
        foreach( $additoinal_cols as $rowcols ) {
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($cols_list[$r].'1', $rowcols);

            $r++;
        }
    }
    
    
    // Add data into excel rows
        for($j=2; $j<=50; $j++) {
        $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A'.$j, 'Hello')
                    ->setCellValue('B'.$j, 'world!')
                    ->setCellValue('C'.$j, 'Hello')
                    ->setCellValue('D'.$j, 'world!');
                }

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A4', 'Miscellaneous glyphs')
                    ->setCellValue('A5', 'Demo');

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle($downloadFileName);  //// set excel work sheet name

        $objPHPExcel->getActiveSheet()
            ->getProtection()->setSheet(true);
        for($i=1; $i<=5000; $i++) {   /// unprotect these cells in excel file
        $objPHPExcel->getActiveSheet()->getStyle('B'.$i.':E'.$i)
            ->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
        }


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$downloadFileName.'"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
    
    //// get additional columns
    function get_additional_columns($cid) {

        $ring_array = array('Ring Style', 'Ring Size', 'Avail sizes', 'Measurements', 'Ring Weight');
        $earing_array = array('Earring Style', 'Earring Back Type', 'Earring Width', 'Hoop Diameter', 'Earring Weight');
        $pendants_array = array('Pendant Style', 'Pendant Weight', 'Pendant Length', 'Pendant Width', 'Chain Included', 'Pendant Width', 'Chain Style', 'Chain length', 'Chain Purity', 'Clasp', 'Chain Weight');
        $bracelet_array  = array('Bracelet Style','Bracelet Claps Type','Bracelet Length','Bracelet Width');
        $chains_array    = array('Chain Style', 'Chain type', 'Chain Length', 'Chain Width', 'Claps Type', 'Chain Weight');

        $ringsID = array('3291875018','3292598018','3291859024','3291859042','3291859074');
        $chainID = array('3291962018','3291859025','3291859043');
        $pendantID = array('3292498018','3292603018','3291859026','3291859044');
        $earingID = array('3292577018','3292601018','3291859028','3291859046');
        $bracletID = array('3292560018','3292607018','3291859027','3291859045','3291859075');

        $addit_columns = array();
        $column_name   = '';

        if(in_array($cid, $ringsID)) {
                $addit_columns = $ring_array;
                $column_name   = 'rings';
        }
        if(in_array($cid, $chainID)) {
                $addit_columns = $chains_array;
                $column_name   = 'chain';
        }
        if(in_array($cid, $pendantID)) {
                $addit_columns = $pendants_array;
                $column_name   = 'pendant';
        }
        if(in_array($cid, $earingID)) {
                $addit_columns = $earing_array;
                $column_name   = 'earing';
        }
        if(in_array($cid, $bracletID)) {
                $addit_columns = $bracelet_array;
                $column_name   = 'braclet';
        }

        $return_additcolumn = '';
        $this->count_cols = count($addit_columns);
        $this->colname    = $column_name;

        if(count($addit_columns) > 0) {
                $return_additcolumn = $addit_columns;
        }

        return $return_additcolumn;
    }
}