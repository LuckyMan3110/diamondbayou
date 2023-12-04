<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" href="<?php echo SITE_URL; ?>css/simple_model.css" rel="stylesheet" />
<style>
    .prdSection {
      width: 21%;
    }
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
var base_url = '<?php echo SITE_URL; ?>';
</script>
</head>
<body>

    <?php
    if( count($stones_list) > 0 ) {
        $view_rappnet = '<div class="center_stonelist">';
        
    $view_rappnet .= '<table class="unique_diamond_table">
                    <tr>
                        <th>Shape</th>
                        <th>Carat</th>
                        <th>Color</th>
                        <th>Clarity</th>
                        <th>Price</th>
                        <th>Retail Price</th>
                        <th>View</th>
                    </tr>';
        foreach($stones_list as $rowlist ) {
            $diamond_lot_id = str_replace("/", '_slash_', $rowlist['lot']);
            
        $diamond_shape = view_shape_value($view_diamondimg, $rowlist['shape']);
        $retail_price = ( $rowlist['price'] * $rowlist['carat'] ) * 6;
        $view_rappnet .= '<tr>
                            <td>'.$diamond_shape.'</td>
                            <td>'.$rowlist['carat'].'</td>
                            <td>'.$rowlist['color'].'</td>
                            <td>'.$rowlist['clarity'].'</td>
                            <td>$'._nf($rowlist['price'],2).'</td>
                            <td>$'._nf($retail_price,2).'</td>
                            <td><a href="#javascript" id="'.$diamond_lot_id.'" data-modal-id="popup1">Select</a></td>
                        </tr>';
        }
                
                $view_rappnet .= '</table>';
                
    $view_rappnet .= '</div>';
    } else {
        $view_rappnet .= '<div>NO DIAMOND FOUND FOR THIS RING!</div>';
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
function selectThisDiamond(lotid, dmprice, carat) {
    //var ringid = $('#prid').val();
    var ring_price = $('#main_price').val();
    $('#center_stone_id').val( lotid );
    $('#carat_weight_view').html( carat + ' CT.' );
    $('#carat_weight').val( carat );
    
    var totalprice = parseFloat(dmprice) + parseFloat(ring_price);
    
    $('#price_label').html( '$'  + totalprice.toFixed(2) );
    
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
    
    //alert('Test: ' + prid);
}
$(function(){
	$('a[data-modal-id]').click(function(e) {
		
                //$('#popupbox').html('<div class="wait_data">Loading diamond detail plz wait....</div>');
                var link_id = $(this).attr('id');
                //$('#popupbox').html(link_id);
                $('#center_stone_id').val(link_id);
                $('#show_diamond_id').html('<b>Diamond ID : ' + link_id + ' has selected!</b>');
                //getDetailById( link_id );        
	});  
  
  
$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });
 
});
 
 //// get diamond detial
 function getDetailById(lotid) {
     var urlink = base_url + 'testengagementrings/getDiamondDetail/'+lotid;
     $('#popupbox').html('<im src="<?php echo SITE_URL; ?>demo_retail/retaildemo_img/ajax-loader.gif" alt="Loading..." />');
     
        $.ajax({
            type: "POST",
            url: base_url + 'testengagementrings/getDiamondDetail/'+lotid,
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
</body>
</html>