<div class="container main_wraper">
    <?php
        echo '<div class="mainpg1_baner"><img src="'.SITE_URL.'img/banners/stuller_jewelry.jpg" alt="Stuller Gold Jewelry"></div>';
    ?> 
<div class="content row-fluid engagement">
    <div class="col-sm-3" id="acordianMenu">
      <?php
            echo $leftring_category;
        ?>
      <div class="clear"></div>           
    </div>
    <div id="uniquRingView" class="col-sm-9">
      <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
      <div class="bread-crumb">
      <div class="breakcrum_bk">
        <ul>
              <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
              <?php echo $cate_name; ?>
            </ul>
        </div>
        <div class="paginat_st paginateBlock col-sm-6">
       <div class="setpagination"> <ul><?php //echo $paginate_links; ?></ul></div>
       <!-- Page <span><</span>&nbsp;
        <select name="paginat_box" id="paginat_box" onChange="rdLink('paginat_box')" class="ddbox-st1">
          <?php echo $paginate;	?>
        </select>
        &nbsp;<span>></span>&nbsp; of <?php echo $ttpages; ?> pages &nbsp;&nbsp;&nbsp;&nbsp;
        View Products:-->
      </div>
      <div class="clear"></div>
      </div>
      
      <br />
      <div class="setpagination anotherPaginate"><ul><?php //echo $paginate_links; //echo $pagination_links; ?></ul></div>
      <div class="clear"></div>
      <br />
      <!-- view unique sub categories -->
      
      <!--<div class="bordr-line">&nbsp;</div>-->
     <div class="uniqueRingsView">
     <?php echo $quality_rings_cate; //// print quality gold cateory list ?>
         
      <div class="clear"></div>
      <div class="setpagination"><ul><?php //echo $paginate_links; //$pagination_links; ?></ul></div><br>
      <div id="details-pane" style="display: none;"> 
            <div class="desc"></div> 
      </div>
      </div>
      
    </div>
  </div>
<div class="clear"></div>
</div>
<script>
function addCartFormSubmit(id, nm) 
    {
        var fieldname = ( nm == 1 ? 'buynowring' : 'buildaring' );
        var urlpath = document.getElementById(fieldname).value;
        
        var pageurl = base_url+urlpath;
        var formid = 'form'+id;
        
        document.getElementById(formid).action = pageurl;
        document.getElementById(formid).submit();
    }
</script>
<!--End #Content-->