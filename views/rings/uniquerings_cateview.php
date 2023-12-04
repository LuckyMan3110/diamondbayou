<article class="container_12" id="main-body-a"> 
  <!--<section id="sub"> </section>-->
  <section id="main" class="engagement">
    <div id="containt">
      
      <div class="content">
        <div class="engagement-left">
          <?php
				echo accordian_left_menu('styles',$catgory_id);
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
          <br />
          <div class="seting-box">
            <!--<div class="box-row">
              <div class="signat-bk">
                <input type="checkbox" id="signat_seting" name="signat_seting" onclick="rdPage('<?php echo config_item('base_url') ?>jewelleries/engagementQuality/Engagement_Rings/sidestone/18/');" value="Y" />
                &nbsp;&nbsp; <span class="sgicon">Yadegar Signature Setting</span> </div>
              <div class="signat-bk1">
                <input type="checkbox" id="signat_seting" name="signat_seting" value="Y" />
                &nbsp;&nbsp; <span class="sgicon1">Yadegar Select Setting</span> </div>
              <div class="signat-bk" align="center">
                <input type="checkbox" id="signat_seting" name="signat_seting" onclick="rdPage('<?php echo config_item('base_url') ?>jewelleries/viewotherdesigner');" value="Y" />
                &nbsp;&nbsp; <span class="sgicon2">Other Designer</span> </div>
            </div>-->
            <?php /*?><div class="clear"></div>
            <br />
            <div class="box-row">
              <div class="signat-bk2" align="center">
                <select name="cmb_cates" id="cmb_categories" onChange="rdLink('cmb_categories')" class="ddbox-st">
                  <option value="#">Select Shape</option>
                  <?php
							$view_cate = $this->session->userdata('retrive_catelist');
							echo $view_cate;
						?>
                </select>
                &nbsp;&nbsp;
                <!--<select name="cmb_mtype" id="cmb_metaltype" onChange="rdLink('cmb_metaltype')" class="ddbox-st">
                  <?php	echo $metalOptionRing; ?>
                </select>-->
              </div>
            </div><?php */?>
            <div class="clear"></div>
          </div>
          <br />
          
          <div class="clear"></div>
          <br />
          <!-- view unique sub categories -->
          
          <!--<div class="bordr-line">&nbsp;</div>-->
         <?php echo $viewCateListView; ?>
          <div id="details-pane" style="display: none;"> 
  				<div class="desc"></div> 
		  </div>
          
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </section>
</article>
<!--End #Content-->