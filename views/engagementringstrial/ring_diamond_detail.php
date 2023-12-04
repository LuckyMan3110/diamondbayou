<link type="text/css" href="<?php echo SITE_URL; ?>css/simple_model.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/heart_diamond.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/simple_model.css" rel="stylesheet" />
<style>
    .prdSection {
      width: 21%;
    }
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<?php
    
    $diamond_shap = view_shape_value($diamond_image, $row_detail['shape']);
    $row_detail['carat'] = _nf($row_detail['carat'], 2);
    
    ?>
<div class="detail_ring_bk">
    <div class="detail_bk_left col-sm-3">
        <div class="detail_inner_bk">
            <div class="detail_bk_head"><?php echo $diamond_shap; ?> Diamond</div>
            <div class="clarity_row">
                <div class="clarity_cols">
                    <div>Carat</div>
                    <div><?php echo $row_detail['carat']; ?></div>
                </div>
                <div class="clarity_cols">
                    <div>Clarity</div>
                    <div><?php echo $row_detail['clarity']; ?></div>
                </div>
                <div class="clarity_cols">	
                    <div>Color</div>
                    <div><?php echo $row_detail['color']; ?></div>
                </div>
                <div class="clear"></div><br>
            </div>
            <div class="clear"></div><br>    
            <div>
<!--                            <img src="<?php echo SITE_URL; ?>img/heart_diamond/diamond_shape_view.jpg" alt="" />-->
                <img src="<?php echo SITE_URL; ?>images/shapes_images/<?php echo $diamond_image; ?>" alt="<?php echo $diamond_image; ?>">
            </div><br>
            <div>
                <div><a href="#javascript" class="link_style">Learn About Diamonds</a></div>
                <div><a href="#javascript" class="link_style">View GIA Certificate</a></div><br>
                <div class="prices_label">$<?php echo _nf($row_detail['price'], 2); ?></div><br>
                <div class="total_price_label">Total ring price</div><br><br><br>
                <div><a href="#" class="button_link">Change this diamond</a></div>
            </div><br>

        </div>
    </div>
    <div class="detail_bk_right col-sm-8">
        <div><br><br>
            <div class="rightdetail" id="ring_diamond_dt">
    <div class="right_dtheading"><?php echo $row_detail['carat'].' Carat '.$diamond_shap.' Diamond'; ?></div>
    <div><?php
    $diamond_desc = 'This fair-cut '.$row_detail['cut'].', '.$row_detail['color'].'-color and '.$row_detail['clarity'].'-clarity diamond comes accompanied by a diamond grading report from the '.$row_detail['Cert'].'. <br>Have a question regarding this item? Our specialists are available to assist you.';

    echo $diamond_desc;

    ?></div><br>
    <div>
        <div class="contact_no_dt"><b><?php echo CONTACT_NO; ?></b></div>
        <div><a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></div>
    </div>
    <br>
    <div class="diamond_left_dt">
        <div class="detail_rows"><label>SKU# <?php echo $row_detail['Stock_n']; ?></label></div>
        <div class="detail_rows">
            <span>Measurements: </span>
            <span><?php echo $row_detail['Meas']; ?></span>
            <div class="clear"></div>
        </div>
        <div class="detail_rows">
            <span>Price</span>
            <span>$<?php echo _nf($row_detail['price'],2); ?></span>
            <div class="clear"></div>
        </div>
        <div class="detail_rows">
            <span>Wire Price</span>
            <span>$<?php echo _nf($row_detail['price'],2); ?></span>
            <div class="clear"></div>
        </div>
    </div>
    <div class="right_detail_cols">
        <div class="right_left_dtcols">
            <div class="detail_rows"></div>
        <div class="detail_rows">
            <span>Report </span>
            <span><?php echo $row_detail['lab']; ?></span>
            <div class="clear"></div>
        </div>
        <div class="detail_rows">
            <span>Color </span>
            <span><?php echo $row_detail['color']; ?></span>
            <div class="clear"></div>
        </div>

        </div>
        <div class="right_left_dtcols">
            <div class="detail_rows"></div>
        <div class="detail_rows">
            <span>Cut </span>
            <span><?php echo $row_detail['cut']; ?></span>
            <div class="clear"></div>
        </div>
         <div class="detail_rows">
            <span>Clarity </span>
            <span><?php echo $row_detail['clarity']; ?></span>
            <div class="clear"></div>
        </div>
        </div>                    
    </div>                
    <div class="clear"></div><br>
      <div class="other_link_list">
          <ul>
              <li><a href="#" class="js__p_another_start">Drop a Hint</a></li>
              <li><a href="<?php echo SITE_URL; ?>account/account_wishlist/89 39/add/rapnet/">Add to Wishlist</a></li>
              <li><a href="#" class="js__p_another_start">Ask an Expert</a></li>
              <li><a href="#" class="js__p_start">Email a Friend</a></li>
              <li><a href="#" class="js__p_another_start">Schedule Viewing</a></li>
              <li><a href="#javascript" onclick="printCurrPage()">Print Details</a></li>
          </ul>
        </div>
        <div class="clear"></div><br>
        <div><b>Other Reports</b></div>
        <div class="other_reports_link">
            <ul>
              <li><a href="#">Lab Report</a></li>
              <li>
<?php
 if( $row_detail['Cert'] == 'GIA' ) {
     $verify_link = 'http://www.gia.edu/cs/Satellite?reportno='.$row_detail['Cert_n'].'&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C';
 } else {
     $verify_link = '#';
 }
 
?>
                  <a href="<?php echo $verify_link; ?>" target="_blank">Verify Lab Report</a></li>
          </ul>
        </div>
</div>
    <div class="clear"></div><br>
        </div><br>
    </div>
    <div class="clear"></div><br>
</div>