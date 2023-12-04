<div class="row-fluid">
  <div class="col-sm-3">
    <div class="leftMenueBoxOuter">
      <div class="content_leftmenu">
        <?php echo content_page_left_menu(); ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="rightCl col-sm-9">
    <div class="pgSt">
      <div class="bread-crumb brbg">
        <div class="breakcrum_bk">
        	<ul>
          <li><a href="<?php echo config_item('base_url') ?>">Resources</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
        </div>
        <div class="clear"></div>
      </div>
      <br />
    </div>
    <div class="contentTb">
      <div class="pageContent">
        <h1 class="pageMainHeading">Contact Us</h1>
        <div class="contactAdres">
        <?php echo ($content); ?> <br>
        </div>
        <?php echo '<div class="validationError">'.validation_errors().'</div>'; 
			if($error_message === 'sent') {
				echo '<div class="sentMsg">Your message has sent successfully!</div>';
			}
		?>
		<?php //echo form_open('form'); ?>
        <!--<div><h3>Send Us Query:</h3></div><br>-->
        <form name="contactForm" method="post" action="" class="formStyle">
			<div class="p_content">
          <div class="formArea">
            <div class="fieldBlock">
              <div class="columnSection">
              <div class="fLabel">First Name</div>
                <input type="text" name="cont_fname" id="cont_fname"> </div>
              <div class="columnSection">
              <div class="fLabel">Last Name</div>
                <input type="text" name="cont_lname" id="cont_lname">
               </div>
              <div class="clear"></div>
            </div>
            <div class="fieldBlock">
              <div class="fLabel">Email</div>
              <div>
                <input type="text" name="cont_email" id="cont_email" class="fullTextField">
              </div>
            </div>
            <div class="fieldBlock">
              <div class="fLabel">Phone No.</div>
              <div>
                <input type="text" name="cont_pno" id="cont_pno" class="">
              </div>
            </div>
            <div class="fieldBlock">
              <div class="fLabel">How did you hear about us?</div>
              <div>
                <select name="cont_hear" id="cont_hear">
                  <option value="">Select</option>
                  <option>Search Engine</option>
                  <option>Yahoo</option>
                  <option>Bing</option>
                  <option>Google</option>
                  <option>Friends</option>
                  <option>Family</option>
                  <option>Other Sources</option>
                </select>
              </div>
            </div>
            <div class="fieldBlock">
              <div class="fLabel">Description</div>
              <div class="">
                <textarea name="cont_desc" id="cont_desc"></textarea>
              </div>
            </div>
            <br><br>
            <div class="fieldBlock">
              <input type="submit" name="btn_ctsubmit" class="btnStyle" value="Submit">
            </div>
          </div>
        </div>
		</form>
        <br>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <br />
  <?php echo $signup_form; ?>
  <div class="clear"></div>
  <div class="clearfix"></div>
</div>