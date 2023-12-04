<?php
///// get stuller tables name
    function getStulerTable($options='') {
        $tables = array();
        switch( $options ) {
            case 'wb_ladies':
                $tables['product'] = 'stuller_products_wb_ladies';
                $tables['images'] = 'stuller_images_wb_ladies';
                $tables['folder'] = 'wedding_bands_ladies';
                $tables['details'] = 'stuller_details_wb_ladies';
                $tables['title'] = 'Ladies Wedding Bands';
            break;
            case 'wb_platinum':
                $tables['product'] = 'stuller_products_wb_platinum';
                $tables['images'] = 'stuller_images_wb_platinum';
                $tables['folder'] = 'wedding_bands_platinum';
                $tables['details'] = 'stuller_details_wb_platinum';
                $tables['title'] = 'Wedding Band Platinum';
            break;
            case 'wb_mens':
                $tables['product'] = 'stuller_products_wb_mens';
                $tables['images'] = 'stuller_images_wb_mens';
                $tables['folder'] = 'wedding_bands_mens';
                $tables['details'] = 'stuller_details_wb_platinum';
                $tables['title'] = 'Mens Wedding Bands';
            break;
            case 'wb_studs':
                $tables['product'] = 'stuller_products_studearrings';
                $tables['images'] = 'stuller_images_studearrings';
                $tables['folder'] = 'diamond_stud_earrings';
                $tables['details'] = 'stuller_details_studearrings';
                $tables['title'] = 'Diamond Stud Earrings';
                
            break;
            case 'wb_hoops':
                $tables['product'] = 'stuller_products_dhoops';
                $tables['images'] = 'stuller_images_dhoops';
                $tables['folder'] = 'diamondhoops';
                $tables['details'] = 'stuller_details_dhoops';
                $tables['title'] = 'Diamond Hoops';
            break;
            case 'gemstone':
                $tables['product'] = 'stuller_products_gemstone';
                $tables['images'] = 'stuller_images_gemstone';
                $tables['folder'] = 'gemstone';
                $tables['details'] = '';
                $tables['title'] = 'Gemstone Earrings';
            break;
            case 'wb_diamond':
                $tables['product'] = 'stuller_products_wb_diamonds';
                $tables['images']  = 'stuller_images_wb_diamonds';
                $tables['folder']  = 'wedding_bands_diamond';
                $tables['details'] = 'stuller_details_wb_diamonds';
                $tables['title'] = 'Diamond Wedding Bands';
            break;
            default :
                $tables['product'] = 'stuller_products_wb_diamonds';
                $tables['images']  = 'stuller_images_wb_diamonds';
                $tables['folder']  = 'wedding_bands_diamond';
                $tables['details'] = 'stuller_details_wb_diamonds';
                $tables['title'] = 'Diamond Wedding Bands';
            break;
        }
        
        return $tables;
    }