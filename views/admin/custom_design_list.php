<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel"> 
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <!--\\\\\\\ contentpanel start\\\\\\-->
    <div class="pull-left breadcrumb_admin clear_both">
      <div class="pull-left page_title theme_color">
        <h1>Site Management</h1>
        <h2 class="">Custom Design Detail</h2>
      </div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
          <li class="active"><a href="<?php echo SITE_URL; ?>admin/customs_design">Custom Design</a></li>
        </ol>
      </div>
    </div>
    <div class="container clear_both padding_fix">
        
      <div>
        <?php if($action == 'view_detail'){
            
           // print_ar($details);
    
    ?>
    <style>
    .table > tbody > tr > td, .table > tfoot > tr > td {
        border-top: 1px solid #ddd !important;
    }
    </style>
        <div class="blue_man">
          <div class="blue_admin_box1">
            <div class="addcountry_box">
              <div class="heading">
                <h1>Custom Design</h1><br>
              </div>
              <!-- Message Part -->
              <div style="width:100%;">
                <? if(isset($success) && !empty($success)){ ?>
                <div style="width:95.5%; margin:5px; padding:10px 10px 10px 10px; background-color:#C8F2BB; font-weight:bold"> <? echo $success;   ?> </div>
                <? } ?>
              </div>
              <div style="clear:both"></div>
              <!-- End -->
              <div class="orderdt_block">
                <?php
				$designPath = SITE_URL.'uploads/';
				$cs_design1 = $designPath.$details->design_img1;
				$cs_design2 = $designPath.$details->design_img2;
				$cs_design3 = $designPath.$details->design_img3;
			
					$viewListDetail = '<table class="table">
					  <tr>
						<td width="20%">Custom Request:</td>
						<td width="80%">'.$details->custom_desc.'</td>
					  </tr>
					  <tr>
						<td>Unique Style #</td>
						<td>'.$details->style_number.'</td>
					  </tr>
					  <tr>
						<td>Metal Rquested:</td>
						<td>'.$details->metal_requested.'</td>
					  </tr>
					  <tr>
						<td>Finger Size:</td>
						<td>'.$details->finger_size.'</td>
					  </tr>
					  <tr>
						<td>Contact Name:</td>
						<td>'.$details->contact_name.'</td>
					  </tr>
					  <tr>
						<td>Email Address:</td>
						<td>'.$details->contact_email.'</td>
					  </tr>
					  <tr>
						<td>Phone Number:</td>
						<td>'.$details->contact_phone.'</td>
					  </tr>
					  
					  <tr>
						<td>Date:</td>
						<td>'.$details->req_date.'</td>
					  </tr>
					  <tr>
						<td>Mailing Address:</td>
						<td>'.$details->mailing_address.'</td>
					  </tr>
					  <tr>
						<td>Fax Number:</td>
						<td>'.$details->fax_number.'</td>
					  </tr>
					  <tr>
						<td>Item Budget:</td>
						<td>'.$details->item_budget.'</td>
					  </tr>
					  <tr>
						<td>Size Width:</td>
						<td>'.$details->size_width.'</td>
					  </tr>
					  <tr>
						<td>Size Height:</td>
						<td>'.$details->size_height.'</td>
					  </tr>
					  <tr>
						<td>Item Carat KT:</td>
						<td>'.$details->item_carat_kt.'</td>
					  </tr>
					  <tr>
						<td>Metal Color:</td>
						<td>'.$details->metal_color.'</td>
					  </tr>
					  <tr>
						<td>Metal Weight:</td>
						<td>'.$details->metal_weight.'</td>
					  </tr>
					  <tr>
						<td>Diamond Stone:</td>
						<td>'.$details->diamond_stone.'</td>
					  </tr>
					  <tr>
						<td>Diamond Color:</td>
						<td>'.$details->diamond_color.'</td>
					  </tr>
					  <tr>
						<td>Saphire Stones Color:</td>
						<td>'.$details->saphire_stones_color.'</td>
					  </tr>
					  <tr>
						<td>Diamond Quality:</td>
						<td>'.$details->diamond_quality.'</td>
					  </tr>
					  <tr>
						<td>Message Sumry:</td>
						<td>'.$details->message_sumry.'</td>
					  </tr>
					  
					  
					  <tr>
						<td>Message Date:</td>
						<td>'.date('d-m-Y', strtotime($details->request_date)).'</td>
					  </tr>';
				
				if(getimagesize($cs_design1) )
				{	  
					$viewListDetail .= '<tr>
							<td>Design 1:</td>
							<td><div><a href="'.$cs_design1.'" target="_blank"><img src="'.$cs_design1.'" width="100" alt="Custom Design1" /></a><br></div></td>
						  </tr>';
				}
				if(getimagesize($cs_design2) )
				{	  
					$viewListDetail .= '<tr>
							<td>Design 1:</td>
							<td><div><a href="'.$cs_design2.'" target="_blank"><img src="'.$cs_design2.'" width="100" alt="Custom Design2" /></a><br></div></td>
						  </tr>';
				}
				if(getimagesize($cs_design3) )
				{	  
					$viewListDetail .= '<tr>
							<td>Design 1:</td>
							<td><div><a href="'.$cs_design3.'" target="_blank"><img src="'.$cs_design3.'" width="100" alt="Custom Design3" /></a></div></td>
						  </tr>';
				}
						
					$viewListDetail .= '</table>';
					
				echo $viewListDetail;
				
				?>
              </div>
            </div>
          </div>
          <div class="spacerdiv"><img src="/template/admin/images/spacer.gif" alt="spacer" /></div>
        </div>
        <?php }else{
    $a = config_item('base_url')."admin/updaterolexgroup";
    ?>
        <form name="mywatchfrm" id="mywatchfrm" action="<?php echo $a; ?>" method="post">
          <div>
            <table id="results" style="display:none; ">
            </table>
          </div>
        </form>
        <?php }?>
      </div>
      <!--\\\\\\\ container  end \\\\\\--> 
    </div>
    <!--\\\\\\\ content panel end \\\\\\--> 
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>