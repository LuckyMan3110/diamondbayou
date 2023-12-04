<?php

function getLocationPageAddress() {
    
    $view_addres = '<div>Hearts & Diamonds Jewelers<br>
                        510 w 6th st Suite 518 <br>
                        Los Angeles, CA <br>
                        90014 <br>
                        +1(213) 629-2929</div>';
    
    $view_addres .= '<br><script type=\'application/ld+json\'> 
                    {
                      "@context": "http://www.schema.org",
                      "@type": "JewelryStore",
                      "name": "Hearts & Diamonds Jewelers",
                      "url": "http://www.heartsanddiamonds.com/",
                      "logo": "http://www.heartsanddiamonds.com/img/heart_diamond/header_logo.jpg",
                      "description": "Hearts And Diamonds offers to Buy Discounted Rate Diamond Engagement Ring, wedding rings, Diamond Bracelets & Earrings in Los                         Angeles. Call at 213 629 2929.",
                      "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "510 w 6th st Suite 518",
                        "addressLocality": "Los Angeles",
                        "addressRegion": "CA",
                        "postalCode": "90014",
                        "addressCountry": "USA"
                      },
                      "contactPoint": {
                        "@type": "ContactPoint",
                        "telephone": "+1(213) 629-2929",
                        "contactType": "Customer support"
                      }
                    }
                </script><br>';
    
    $view_addres .= "<br><script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyCm3_AWoEVzEXdiEGp1Ezf_9tdhr-bbRwM '></script>
            <div style='overflow:hidden;height:334px;width:561px;'>
              <div id='gmap_canvas' style='height:334px;width:561px;'></div>
              <style>
            #gmap_canvas img{max-width:none!important;background:none!important}
            </style>
            </div>
            <a href='https://indiatvnow.com/'>Movies&Series INDIA</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=bebf68116a353e2c64b821479409cf405cd90bdc'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(34.0481329,-118.25468599999999),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(34.0481329,-118.25468599999999)});infowindow = new google.maps.InfoWindow({content:'<strong>Hearts & Diamonds Jewelers</strong><br>510 w 6th st Suite 518<br>90014 Los Angeles<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>";
    
    
    return $view_addres;
}