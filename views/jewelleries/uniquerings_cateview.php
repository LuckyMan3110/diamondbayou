<div class="content engagement row-fluid">
    <?php
        echo rings_page_baner($maincate_name);
    ?>
        <div class="col-sm-3" id="acordianMenu">
          <?php
				echo accordian_left_menu('styles',$catgory_id);
			?>
          <div class="clear"></div>           
        </div>
        <div id="uniquRingView" class="col-sm-9"> 
          <!-- <div class="ads01"><a href="#"><img src="<?php echo config_item('base_url') ?>images/ads1.png" alt=""/></a></div> -->
          <div class="bread-crumb row-fluid">
            <div class="breakcrum_bk">
                <ul>
                  <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
                  <li><a href="#"><?php echo $maincate_name; ?></a></li>
                  <li><a href="<?php echo $sbcate_link; ?>"><?php echo $cates_name; ?></a></li>
                </ul>
            </div>
            <!--<div class="paginat_st paginateBlock"> Page <span><</span>&nbsp;
                <select name="paginat_box" id="paginat_box" onChange="rdLink('paginat_box')" class="ddbox-st1">
                  <?php
                $tt_records = ceil($total_records/$perPage);
                $startLimit =  1;
                if($total_records > 0) {	
                    for($i=1; $i<=$tt_records; $i++) {
                        echo '<option value="'.$base_link.$startLimit.'">'.$i.'</option>';
                        $startLimit = $i*$perPage;
                    }
                } else {
                    echo '<option>1</option>';	
                }
                ?>
                </select>
                &nbsp;<span>></span>&nbsp; of <?php echo $tt_records; ?> pages &nbsp;&nbsp;&nbsp;&nbsp;
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
                   
                   echo $view_pagelimit;
                //echo $base_link;
                //echo $this->pagination->create_links();?>
              </div>-->
              <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <br />
          <!-- view unique sub categories -->
         <div class="row-fluid">
			 <?php echo $viewCateListView; ?>
              <div id="details-pane" style="display: none;"> 
                    <div class="desc"></div> 
              </div>
          </div>
          
        </div>
      </div>
      <div class="clear"></div>
<!--End #Content-->