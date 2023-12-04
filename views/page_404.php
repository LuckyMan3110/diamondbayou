<div class="banner-bottom first-bottom">
    <div class="container" aria-hidden="false">
        <div class="col-md-6 agileits_banner_bottom_left">
            <img src="<?= SITE_URL ?>images/jewelercart_images/image1.jpg" alt="image1" class="img-responsive">
        </div>
        <div class="col-md-6 first_bottom_right">
            <h1 style="font-size:80px;">404</h1>
            <h1>This Page Not Found!</h1>
            <p>
            <?php
            $link_last_seg  = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            echo '<h4>Requested URL:<br> '.$link_last_seg.' </h4>';
            ?>
            </p> 
             <a href="<?= SITE_URL ?>">Back To Home</a> OR
            <a href="<?= SITE_URL ?>diamonds/search/true">Design Your Own</a> 
        </p></div>
        <div class="clearfix"> </div>
    </div>
</div>