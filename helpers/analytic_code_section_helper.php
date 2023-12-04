<?php

function getSitePagesTitleList($pageID='') {
    $pageList = array(
        'diamonds_index' => 'Home Page',
        'heart-collection' => 'The Collection',
        'newarrivals' => 'New Arrivals',
        'diamonds_search' => 'Diamond Search',
        'engagement_search' => 'Build Your Own Ring',
        'build-earings' => 'Build Your Own Earrings',
        'buildiamond-pendant' => 'Build Your Own Diamond Pendant',
        'buildthree-stonesring' => 'Build Your Own Three-Stone Ring',
        'wedding-bands-diamond' => 'Diamond Wedding Bands',
        'wedding-bands-ladies' => 'Ladies Wedding Bands',
        'wedding-bands-platinum' => 'Wedding Bands',
        'diamond-stud-earrings' => 'Diamond Stud Earrings',
        'diamond-hoop-earings' => 'Diamond Hoops',
        'gemstone-earings' => 'Gemstone Earrings',
        'testengagementrings_engagementrings' => 'Womens Wedding Bands',
        'wedding-bands-mens' => 'Mens Wedding Bands',
        'myaccount' => 'My Account',
        '740520034' => 'Heart Bands',
        '740520041' => '3ROW',
        '740520042' => 'MATCHINGBAND',
        '740520043' => 'WEDDING',
        '740520062' => '2Row',
        '740520063' => 'Eternity',
        '3292603018' => 'Necklaces &amp; Pendants',
        '3292601018' => 'Heart Earrings',
        '740520052' => 'DANGLING',
        '740520053' => 'HOOP',
        '740520054' => 'STUD',
        '740520061' => 'WBaskets',
        '740520051' => 'Bracelets &amp; Bangles',
        '3292598018' => 'Heart Ring',
        '740520044' => 'Three Stones Ring',
        '740520045' => 'Three Stones Ring With Halo',
        '740520046' => 'Double Halo Double Shank',
        '740520047' => 'Double Halo Triple Shank',
        '740520048' => 'Original Shank',
        '740520049' => 'Single Halo Triple Shank',
        '740520050' => 'Solitaire',
        '740520059' => 'Single Halo Double Shank',
        '740520060' => 'Single Halo Single Shank',
        '3292603018' => 'Heart Pendants',
        '3292607018' => 'Braclets',
        '740520051' => 'BANGLE',
        '740520035' => 'Band Eternity',
        '740520036' => 'Cross Pendant',
        '740520037' => 'Ring W Basket',
        '740520055' => 'Double Halo Single Shank',
        '740520056' => 'Single Halo Double Shank',
        '740520057' => 'Single Halo Single Shank',
        '740520058' => 'Three Stones Ring',
        'site_map_page' => 'Site Map'
    );
    
    if( empty($pageID) ) {
        return $pageList;
    } else {
       return $pageList[$pageID]; 
    }    
}