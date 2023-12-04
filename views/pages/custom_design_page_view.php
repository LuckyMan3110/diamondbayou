<style>
.container{width: 100%;background-color: transparent;}
img.imgcls{width: 210px;height: 210px;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	document.getElementById("uploadBtnLLogo").onchange = function () {
		document.getElementById("uploadFileLLogo").value = this.value;
	};
});
</script>
<link type="text/css" href="<?= SITE_URL() ?>css/custom_design_style.css" rel="stylesheet" />
<div class="custom_form_block"><br><br>
	<h1>Customize Your Ring Inquiry</h1>
	<?= isset($email_sent)?$email_sent:''; ?>
	<div><?php echo get_site_contact_info('sites_title'); ?></div>
	<div class="custom_content">
		<form name="custom_form" method="post" action="<?php echo htmlspecialchars($submit_link); ?>" enctype="multipart/form-data">
			<div class="name_field common_style">
				<div><input type="text" name="full_name" required="" /></div>
				<div>Name</div>
			</div>
			<div class="date_field common_style">
				<div><input type="text" name="req_date" required="" /></div>
				<div>Date</div>
			</div>
			<div class="phone_field common_style">
				<div><input type="text" name="telephone_number" required="" /></div>
				<div>Telephone Number</div>
			</div>
			<div class="email_field common_style set_right_margin">
				<div><input type="email" name="email_address" required="" /></div>
				<div>Email Address</div>
			</div>
			<div class="clear"></div>
			<div class="mail_field common_style">
				<div><input type="text" name="mailing_address" /></div>
				<div>Mailing Address</div>
			</div>
			<div class="fax_field common_style set_right_margin">
				<div><input type="text" name="fax_number" required="" /></div>
				<div>Fax Number</div>
			</div>
			<div class="clear"></div>
			<div class="bottom_border_line"></div><br>
			<div>Please read and filll out this form completely to help us give you the most accurate cost to produce your custom jewelry. Thank you!</div>
			<div class="form_content_row">
				<div class="fax_field common_style">
					<div><input type="text" name="item_budget" required="" /></div>
					<div>Budget</div>
				</div>
				<div class="budget_content">
					(How much do you want to spend on your custom jewelry?? Estimating your own budget will allow us to determine if your detailed request in
					the rest of this form are realistic and reflect your budget. Our final Cost estimate will be based off the details you select in this order form. The
					Cost may come out to more or less than your budget so you may need to make changes to fit the price you are comfortable spending. 
				</div>
				<div class="clear"></div>
				<div class="bottom_border_line"></div><br>
				<div class="meas_section">
					<div class="meas_left">
						<div class="budget_left set_right_margin">
							<div>
								<span><input type="text" name="size_width" required="" /></span>
								<span>x</span>
								<span><input type="text" name="size_height" required="" /></span>
							</div>
							<div>Size</div>
						</div>
						<div class="budget_right set_content_bg">(Please Use Inches Example: 3 in tall x 2 in wide)</div>
						<div class="clear"></div><br>
						<div class="set_kt_field">
							<select name="item_carat_kt">
								<option>N/A</option>
								<option>10KT</option>
								<option>14KT</option>
								<option>18KT</option>
								<option>22KT</option>
								<option>24KT</option>
							</select>
						</div>
						<div class="set_content_bg set_kt_content">IF YOU CHECKED GOLD , PLEASE SELECT THE KT (keep in mind that as you increase the kt of gold , the price of gold also increases)</div>
						<div class="clear"></div>
					</div>
					<div class="meas_right">
						<div class="set_label_bg">Color</div><br>
						<div class="">
							<span>(PLEASE CHECK ONE) </span>
							<span class="set_label_bg">Gold</span>
							<span><input type="radio" name="metal_color" value="Gold" /></span>
							<span class="set_label_bg">Silver</span>
							<span><input type="radio" name="metal_color" value="Silver" checked="" /></span>
						</div><br>
						<div class="set_label_bg">Weight</div><br>
						<div class="">
							<span>(PLEASE CHECK ONE) </span>
							<span class="set_label_bg">Light</span>
							<span><input type="radio" name="metal_weight" value="Light" checked="" /></span>
							<span class="set_label_bg">Medium</span>
							<span><input type="radio" name="metal_weight" value="Medium" /></span>
							<span class="set_label_bg">Heavy</span>
							<span><input type="radio" name="metal_weight" value="Heavy" /></span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="bottom_border_line"></div><br>
				<div class="stone_left">
					<div class="set_label_font">DIAMONDS OR SAPHIRE STONES (MAN MADE DIAMONDS) SELECT ONE:</div>
					<span class="set_label_bg1">DIAMOND</span>
					<span><input type="radio" name="diamond_stone" value="Diamond" checked="" /></span>
					<span class="set_label_bg1">SAPHIRE</span>
					<span><input type="radio" name="diamond_stone" value="Saphire" /></span>
				</div>
				<div class="stone_right">
				A Diamond is a more precious valuable stone and will test positive on any
				diamond tester , our saphire stones achieve the same look as VS diamonds but
				do not hold the same value or test positive on a diamond tester) 
				</div>
				<div class="clear"></div>
				<div class="diamond_color_row">
					<span class="setLabelBg set_diamond_info">DIAMOND COLOR : WHAT COLOR DIAMONDS WOULD YOU LIKE USED IN YOUR CUSTOM JEWELRY?</span>
					<span class="diamond_color_option">
						<select name="diamond_color">
							<option>N/A</option>
							<option>WHITE</option>
							<option>BLACK</option>
							<option>BLUE</option>
							<option>GREEN</option>
							<option>Yellow</option>
							<option>Pink</option>
						</select>
					</span>
				</div>
				<div class="diamond_color_row">
					<span class="setLabelBg set_diamond_info">*OUR SAPHIRE STONES COME IN ALL COLORS SO PLEASE LIST WHICH COLORS YOU WOULD LIKE TO USE</span>
					<span><input type="text" name="saphire_stones_color" /></span>
				</div>
				<div class="clear"></div>
				<div class="bottom_border_line"></div>
				<div class="diamond_color_row">
					<span class="setLabelBg set_diamond_info1">DIAMOND QUALITY: THE COST INCREASES THE HIGHER THE QUALITY</span>
					<span class="diamond_color_option">
						<select name="diamond_quality">
							<option>N/A</option>
							<option>VVS1</option>
							<option>VVS2</option>
							<option>VS1</option>
							<option>VS2</option>
							<option>SI1</option>
							<option>SI2</option>
							<option>I1</option>
							<option>I2</option>
						</select>
					</span>
				</div>
				<div class="set_form_content">
				Very, Very Slightly Included category (VVS) diamonds have minute inclusions that are dicult for a skilled grader to see under 10x magnification. The VVS category is divided into two grades; VVS1 denotes a higher clarity grade than VVS2. Pinpoints and needles set the grade at VVS.<br><br>

				Very Slightly Included category (VS) diamonds have minor inclusions that are difficult to somewhat easy for a trained grader to see when viewed under 10x magnification. The VS category is divided into two grades; VS1 denotes a higher clarity grade than VS2. Typically the inclusions in VS diamonds are invisible without magnification, however infrequently
				some VS2 inclusions may still be visible to the eye. An example would be on a large emerald cut diamond which has a small inclusion under the corner of the table.
				<br><br>

				Slightly Included category (SI) diamonds have noticeable inclusions that are easy to very easy for a trained grader to see when viewed under 10x magnification. The SI category is divided into two grades; SI1 denotes a higher clarity grade than SI2. <br>These may or may not be noticeable to the naked eye.
				<br><br>

				Included category (I) diamonds have obvious inclusions that are clearly visible to a trained grader under 10x magnification. Included diamonds have inclusions that are usually visible without magnification or have inclusions that threaten the durability of the stone. The I category is divided into three grades; I1 denotes a higher clarity grade than I2, whichin turn is higher than I3. Inclusions in I1 diamonds often are seen to the unaided eye. I2 inclusions are easily seen, while I3 diamonds have large and extremely easy to see inclusions that typically impact the brilliance of the diamond, as well as having inclusions that are often likely to threaten the structure of the diamond.
				</div>
				<div class="bottom_border_line"></div>
				<div class="main_form_content">
					<div class="setLabelBg set_sumry_text">Summary: Please give a detailed description completely summarizing your order. Include every detail possible</div>
					<div><textarea name="message_sumry" required="" class="set_message_box"></textarea></div>
					<div class="set_end_notes">Please attach some form of logo , image, sketch or drawing to this document to help us create a more accurate 3D layout for your order. Thank you!</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Attach File</label><br />
						<input id="uploadFileLLogo" readonly style="height: 40px;border: 1px solid #ccc" />
						<div class="fileUpload btn btn-primary" style="padding: 9px 12px;">
							<span>Browse</span>
							<input id="uploadBtnLLogo" name="uploadFileLLogo" type="file" class="upload" />
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="submit_form"><input type="submit" value="Submit Request" name="submit_req_btn" class="submit_req_btn" /></div>
					<div class="clear"></div>
				</div>
			</div>
		</form>
	</div>
</div>