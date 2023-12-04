<div class="contentPage row-fluid">
  <div class="col-sm-3">
    <div class="leftMenueBoxOuter">
      <h2>Resources</h2>
      <div class="content_leftmenu">
        <?php echo $page_left_menus; /// content_page_helper ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="rightCl col-sm-9">
    <div class="pgSt">
      <div class="bread-crumb brbg">
        <div class="breakcrum_bk">
            <ul>
              <li><a href="<?php echo config_item('base_url') ?>">Diamonds</a></li>
              <li><a href="#"><?php echo ($content_title); ?></a></li>
<!--              <li><a href="#javascript;"><?php echo ($content_title); ?></a></li>-->
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
        <?php 
        
        $link_last_seg           = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $link_array_last_seg     = explode('/',$link_last_seg);
        $page_last_seg           = end($link_array_last_seg);
        $page_last_seg           = ucwords(str_replace('-',' ',$page_last_seg));
        
        echo $page_last_seg.': '. ($content); 
        
        ?> <br>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <br />
  <?php echo $signup_form; ?>
  <div class="clear"></div>
  <div class="clearfix"></div>
</div>