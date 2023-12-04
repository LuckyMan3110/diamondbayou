<?php

    function getImageViaFolder($item_sku='', $imgFields='') {
        foreach(glob('webimages/completed_images/*') as $filename){
            $folderImageName = basename($filename);
            $check_str = strchr($folderImageName, $item_sku);
            if( !empty($check_str) ) {
                $imagesName[] = $folderImageName;
            }
        }
        $other_img = setMultiColorImg($imgFields); // same file
        
        if( count( $other_img ) > 0 ) {
            return $other_img;
        } else {
            return $imagesName;
        }        
    }
    
    function setMultiColorImg($img_fields='', $color='Y') {
        $view_img = array();
        
        if( !empty($img_fields) ) {
            $img_list = unserialize( $img_fields );
            if( count($img_list) > 0 ) {
                foreach( $img_list as $img ) {
                    if( strchr($img, $color) ) {
                        $view_img[] = $img;
                    }                    
                }
            }
        }
        return $view_img;
    }
    
    function setCollectionImgLink($img='', $item_sku='', $img_list='') {
        if( !empty($img) ) {
            if( file_exists(COLLECTION_FOLDER.$img) ) {
                $ringimg   = SITE_URL.COLLECTION_FOLDER.$img;
            } else {
                $imageLink = getImageViaFolder($item_sku); // same file
                $ringimg   = ( !empty($imageLink[0]) ? SITE_URL.COLLECTION_FOLDER.$imageLink[0] : SITE_URL.'img/no_image_found.jpg' );
            }
        } else {
            $ringimg = SITE_URL.'img/no_image_found.jpg';
        }
        
        $img_list_view = setMultiColorImg($img_list); // same file
        
        if( !empty($img_list_view[0]) ) {
            return $img_list_view[0];
        } else {
            return $ringimg;
        }       
    }