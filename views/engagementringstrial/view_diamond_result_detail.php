<link type="text/css" href="<?php echo SITE_URL; ?>css/simple_model.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/heart_diamond.css" rel="stylesheet" />
<link type="text/css" href="<?php echo SITE_URL; ?>css/simple_model.css" rel="stylesheet" />
<style>
    .prdSection {
      width: 21%;
    }
</style>
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script>
function selectYourDiamond() {
    $('#builder_stpes_bar').html('<img src="'+base_url+'img/heart_diamond/select_diamond.jpg" alt="select_diamond">');
}    
</script>
<?php if( count($stones_list) > 0 ) { 
    
    $diamond_shap = view_shape_value($diamond_image, $row_detail['shape']);
    $row_detail['carat'] = _nf($row_detail['carat'], 2);
    $diamond_shape = view_shape_value($view_diamondimg, $row_detail['shape']);
    
    ?>
<div class="center_stone_dm">
                        <div class="center_stone_head">
                            <div class="center_stone_left">CENTER STONE<br><span>Diamond</span></div>
                            <div class="center_stone_right"><img src="<?php echo SITE_URL; ?>img/heart_diamond/center_right_diamond.jpg" alt="Center Stone Diamon"></div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        <div class="center_stone_content">
                            <div class="credentials">
                                Credentials <?php echo $row_detail['carat'] . ' carat, ' . $row_detail['color'] . ' color, ' . $diamond_shape . ', ' . $row_detail['clarity'] . ' clarity'; ?>
                            </div><br>
                            <div class=""><a href="#javascript" class="button_link" onclick="selectYourDiamond()">Select Your Diamond</a></div>
                            <br><hr><br>
                            <div class="">
                                <img src="<?php echo SITE_URL . 'images/shapes_images/' . $view_diamondimg; ?>" width="35" alt="Center Stone Diamon"></div>
                            <br><hr><br>
                        </div>
                    </div>
<?php } else {
        echo '<div>NO DIAMOND FOUND FOR THIS RING!</div>';
    }
?>