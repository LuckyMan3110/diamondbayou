<link type="text/css" href="<?php echo SITE_URL; ?>css/simple_model.css" rel="stylesheet" />
<style>
    .prdSection {
      width: 21%;
    }
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <?php
    $stone_cate_id = $this->session->userdata('stone_cate_id');   /// earring ID: 3292601018
    if( count($stones_list) > 0 ) {
        $view_rappnet = '<div class="center_stonelist">';
        
    $view_rappnet .= '<table class="unique_diamond_table">
                    <tr>
                        <th>Shape</th>
                        <th>Carat</th>
                        <th>Color</th>
                        <th>Clarity</th>
                        <th>Price</th>
                        <th>View</th>
                    </tr>';
    
    if( $diamond_count == 2 || $stone_cate_id == '3292601018' ) {
        foreach($stones_list as $rowlist ) { 
        $diamond_shape = view_shape_value($view_diamondimg, $rowlist['shape']);
        
                $rowlist2 = $this->catemodel->get_center_match_stonelist($rowlist);
                if( count($rowlist2) > 0 ) {
                    $view_rappnet .= '<tr>
                        <td>'.$diamond_shape.'</td>
                        <td>'._nf($rowlist['carat'], 2).'<br>'._nf($rowlist2['carat'], 2).'</td>
                        <td>'.$rowlist['color'].'<br>'.$rowlist2['color'].'</td>
                        <td>'.$rowlist['clarity'].'<br>'.$rowlist2['clarity'].'</td>
                        <td>'._nf($rowlist['price'] + $rowlist2['price'],2).'</td>
                        <td><a href="#javascript" id="'.$rowlist['lot'].'" id2="'.$rowlist2['lot'].'" data-modal-id="popup1"><img src="'.IMGSRC_LINK.'view_detail.jpg" alt="Details"></a></td>
                    </tr>'; 
                    
            } // end foreach        
        }  // end diamond count if
    } else {
        foreach($stones_list as $rowlist ) {
        $diamond_shape = view_shape_value($view_diamondimg, $rowlist['shape']);
        
        $view_rappnet .= '<tr>
                        <td>'.$diamond_shape.'</td>
                        <td>'._nf($rowlist['carat'], 2).'</td>
                        <td>'.$rowlist['color'].'</td>
                        <td>'.$rowlist['clarity'].'</td>
                        <td>'._nf($rowlist['price'],2).'</td>
                        <td><a href="#javascript" id="'.$rowlist['lot'].'" data-modal-id="popup1"><img src="'.IMGSRC_LINK.'view_detail.jpg" alt="Details"></a></td>
                    </tr>';
        
        }
    }
                
                $view_rappnet .= '</table>';
                
    $view_rappnet .= '</div>';
    } else {
        $view_rappnet .= '<div>NO DIAMOND FOUND FOR THIS SETTING!</div>';
    }
                
                echo $view_rappnet;
    ?>

<!-- popup block start -->
    <div id="popup1" class="modal-box">
  <header> <a href="#javascript" class="js-modal-close close">X</a>
    <h3></h3>
  </header>
  <div class="modal-body">    
    <div id="popupbox"><im src="<?php echo SITE_URL; ?>demo_retail/retaildemo_img/ajax-loader.gif" alt="Loading..." /></div>
  </div>
<!--  <footer> <a href="#" class="btn btn-small js-modal-close">Close</a> </footer>-->
</div>
 <!-- popup block end -->
<script>
function centerStoneDiamondList() {
    var opt = $('#finished_level').val();
    
    if( opt === 'complete_stone' ) {
        $.ajax({
            type: "POST",
            url: base_url + 'testengagementrings/viewCenterStone',
            success: function(response) {
                     $('#center_diamond_list').html('<div class="wait_data">Loading List plz wait....</div>');
                     $('#center_diamond_list').html(response);
           },
                     error: function(){alert('Error ');}
        });
    } else {
        $('#center_diamond_list').html('');
    }
}
function selectThisDiamond(lotid, dmprice) {
    //var ringid = $('#prid').val();
    var ring_price = $('#main_price').val();
    $('#center_stone_id').val( lotid );
    
    var totalprice = parseFloat(dmprice) + parseFloat(ring_price);
    
    $('#price_label').html( '$'  + totalprice.toFixed(2) );
    
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
    
    getLeftDiamonDetail(lotid, 'diamond');
    //alert('Test: ' + prid);
}
function getLeftDiamonDetail(ringid, type) {
    $('#center_stone_detail').html('<div>Updating plz wait...</div>');
    $.ajax({
            type: "POST",
            url: base_url + 'testengagementrings/getDiamondResultDetail/'+encodeURI(ringid)+'/'+type,
            success: function(response) {
                     $('#center_stone_detail').html(response);
           },
                     error: function(){alert('Error ');}
        });
}

$(function(){

var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

	$('a[data-modal-id]').click(function(e) {
		e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    //$(".js-modalbox").fadeIn(500);
		var modalBox = $(this).attr('data-modal-id');
		$('#'+modalBox).fadeIn($(this).data());
                $('#popupbox').html('<div class="wait_data">Loading diamond detail plz wait....</div>');
                var link_id = $(this).attr('id');
                var link_id2 = $(this).attr('id2');
                //$('#popupbox').html(link_id);
                <?php if( $diamond_count == 2 || $stone_cate_id == '3292601018' ) { ?>
                        view_earing_diamonds_detail(link_id, 'toearring', 0, link_id2)   //  file function.js
                <?php } else { ?>
                    getDetailById( link_id );
                <?php } ?>        
                
	});  
  
  
$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
 
});

///// set function to show diamond detail
function view_earing_diamonds_detail(lot,addOption,setting_id,lot2) {
        var urllink, urlink;
        urlink = base_url + 'heartdiamond/view_earing_diamonds_detail/'+lot+'/'+addOption+'/'+setting_id+'/'+lot2;
        urllink = encodeURI(urlink);

        //$("#defaults_button").css("display", "none");
        //$("#vdiamond_detail").html('<div class="loading_text">Loading.....</div>');

        $.ajax({
         type: "POST",
         url: decodeURI(urllink),
         success: function(response) {
            $('#popupbox').html('<div class="wait_data">Loading detail plz wait....</div>');
            $('#popupbox').html(response);
        },
                        error: function(){alert('Error ');}
     });
}

 //// get diamond detial
 function getDetailById(lotid) {
     var urlink = base_url + 'testengagementrings/getDiamondDetail/'+lotid;
     $('#popupbox').html('<im src="<?php echo SITE_URL; ?>demo_retail/retaildemo_img/ajax-loader.gif" alt="Loading..." />');
     
      $.ajax({
            type: "POST",
            url: urlink,
            success: function(response) {
                     $('#popupbox').html('<div class="wait_data">Loading detail plz wait....</div>');
                     $('#popupbox').html(response);
           },
                     error: function(){alert('Error ');}
        });
 }
$(window).resize(function() {
    $(".modal-box").css({
        top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
});
 
$(window).resize();
 
});
</script>