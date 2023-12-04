<div class="contentPage row-fluid mainwrap">
  <div class="rightCl col-sm-12">
    <div class="pgSt">
      <div class="bread-crumb brbg">
        <div class="breakcrum_bk">
            <ul>
              <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
              <li><a href="#"><?php echo ($content_title); ?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
      </div>
      <br />
    </div>
    <div class="contentTb">
      <div class="pageContent">
        <h1 class="pageMainHeading"><?php echo ($content_title); ?></h1>
        <br>
        <?php //echo ($content); ?> <br>
        <ul class="sitemap_list">
            <?php echo $sitemap_links; ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <br />
  <?php //echo $signup_form; ?>
  <div class="clear"></div>
  <div class="clearfix"></div>
</div>