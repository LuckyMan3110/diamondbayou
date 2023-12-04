<?php
function set_stuller_link($index=0, $results=array()) {
    if($results[$index]['price'] > 0 ) {
        $stuller_link = SITE_URL . 'stuller_new_rings/wbands_diamond_detail/'.$results[$index]['id'].'/wb_studs';
    } else {
        $stuller_link = '#';
    }
    
    return $stuller_link;
    
}
