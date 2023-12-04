<?php
$diamond_carat_value = _nf($row_detail['carat'], 2);
$carat_margin = getCaratMargin( $diamond_carat_value );
?>
<style>
        .diamond_carat_bg{background: url('../../../../img/david_home/diamond_search/carat_diamond_bg_view.jpg') center no-repeat; width: 100%; height: 137px;}
        .diamond_carat_bg div{background: url('../../../../img/david_home/diamond_search/carat_bg_value.png') left no-repeat; width: 189px; height: 159px; display: inline-block; margin:5.4em 0px 0px <?php echo $carat_margin; ?>;}
        .diamond_carat_bg div span{display: inline-block; font-size: 20px; padding: 4.2em 0px 0px 24px; color:#fff;}
    </style>
    
    <div class="aboutdavid_img diamond_carat_bk">
                   <div class="diamond_carat_bg">
                        <div><span><?php echo $diamond_carat_value; ?><br>Ct.</span></div>
                    </div>
               <div class="clear"></div>
               </div>