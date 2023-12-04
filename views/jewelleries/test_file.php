<article class="container_12" id="main-body-a"> 
  <!--<section id="sub"> </section>-->
  <section id="main" class="engagement">
    <div id="containt">
      
      <div class="content">
        <div class="engagement-left">
          <?php
				//echo accordian_left_menu('styles', $catgory_id);
			?>
          <div class="clear"></div>           
        </div>
        <div class="engagement-right"> 
          <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
          <div class="bread-crumb">
          <div class="breakcrum_bk">
            <ul>
                  <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
                  <li><a href="#"><?php echo $maincate_name; ?></a></li>
                  <li><a href="<?php echo $sbcate_link; ?>"><?php echo $cates_name; ?></a></li>
                </ul>
            </div>
            <div class="paginat_st paginateBlock"> Page <span><</span>&nbsp;
            <select name="paginat_box" id="paginat_box" onChange="rdLink('paginat_box')" class="ddbox-st1">
              <?php echo $paginate;	?>
            </select>
            &nbsp;<span>></span>&nbsp; of <?php echo $ttpages; ?> pages &nbsp;&nbsp;&nbsp;&nbsp;
            View Products:
            <?php
			   
			   if($total_records > 9) {
			   $view_pagelimit = '<a href="'.$base_link.'?off_set=9">9</a>';
			   }
			   if($total_records > 27) {
			   $view_pagelimit .= ' | <a href="'.$base_link.'?off_set=27">27</a>';
			   }
			   if($total_records > 54) {
			   $view_pagelimit .= ' | <a href="'.$base_link.'?off_set=54">54</a>';
			   }
			   if($total_records > 99) {
			   $view_pagelimit .= ' | <a href="'.$base_link.'?off_set=99">99</a>';
			   }
			   
			  // echo $view_pagelimit;
			//echo $base_link;
			//echo $this->pagination->create_links();?>
          </div>
          <div class="clear"></div>
          </div>
          
          <br />
          <div class="setpagination"><ul><?php echo $pagination_links; ?></ul></div>
          <br />
          <div class="clear"></div>
          <br />
          <!-- view unique sub categories -->
          
          <!--<div class="bordr-line">&nbsp;</div>-->
         
          <div class="clear"></div>
          <div class="setpagination"><ul><?php echo $pagination_links; ?></ul></div><br>
          <div id="details-pane" style="display: none;"> 
  				<div class="desc"></div> 
		  </div>
          
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </section>
</article>
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