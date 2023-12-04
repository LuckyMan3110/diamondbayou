<?php echo featured_inlinks(); ?>
<!-- start body content -->
<br><br>
<div class="body_content">
	<div class="leftmenu_bk">
		<?php echo wholeSalerLeftMenu(); ?>
    </div>
	<form method="post" name="customDesign" action="<?php echo $action; ?>" enctype="multipart/form-data">
		<div class="rightmenu_bk">
			<h2>My Account > <span class="setSubLabel">Custom Design Request</span></h2><br>
			<div><img src="<?php echo WHSITE_IMGURL; ?>custom_design_baner.jpg" alt="Custom Design Request" /></div><br>
			<div class="rightpage_content"><br>
                <h3>CUSTOM DESIGN CENTER</h3>
                <div class="returnmsg"><?php echo $custDesign; ?></div>
                <div>The jewelery industry is on the fast track toward customization. Allow us to be the backbone of your custom ambitions and inquiries. Simply fill out our easy-to-use form and upload any additional images/sketches. One of our new model experts will get back to you within 24 hours!</div><br>
                <h4>Custom Design Process</h4><br>
                <ul class="listdata">
                	<li>Free quote within 24 hours (working business days).</li>
                    <li>If CAD new model, CAD image within 48 hours after approval of quote.</li>
                    <li>If hand-carved wax model, wax within 72 hours after approval of quote.</li>
                    <li>Upon approving either CAD image or hand-carved wax, 7-10 business days to complete finished product.</li>
                </ul>
                <br>
                <h4>Custom Request Form</h4>
                <div>Please fill out the following form to get your custom design started.</div><br>
                <div class="setext">Enter description of your custom design request: * </div>
                <div><textarea name="request_message" required="required"></textarea></div>
                <div class="fieldrow">
                	<div class="fieldleft">Unique Settings Style Number: </div>
                    <div class="fieldright"><input type="text" name="style_number" /></div>
                    <div class="clear"></div>
                </div>
                <div class="fieldrow">
                	<div class="fieldleft">Metal Requested: </div>
                    <div class="fieldright">
                    	<select name="metal_requested" required>
                            <option selected="selected" value="">Select metal</option>
                            <option value="Help me choose a metal to fit my budget and preferences!">Help me choose a metal to fit my budget and preferences!</option>
                            <option value="Platinum">Platinum</option>
                            <option value="18k White Gold">18k White Gold</option>
                            <option value="18k Yellow Gold">18k Yellow Gold</option>
                            <option value="18k Rose Gold">18k Rose Gold</option>
                            <option value="14k Palladium White Gold (nickel-free)">14k Palladium White Gold (nickel-free)</option>
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="fieldrow">
                	<div class="fieldleft">Finger Size: </div>
                    <div class="fieldright">
						<select name="finger_size" required>
							<option selected="selected" value="">Select size</option>
							<option value="Please send me a free Ring Sizing Tool">Please send me a free Ring Sizing Tool (click link to the left)</option>
							<option value="3.5">3.5</option>
							<option value="3.75">3.75</option>
							<option value="4">4</option>
							<option value="4.25">4.25</option>
							<option value="4.5">4.5</option>
							<option value="4.75">4.75</option>
							<option value="5">5</option>
							<option value="5.25">5.25</option>
							<option value="5.5">5.5</option>
							<option value="5.75">5.75</option>
							<option value="6">6</option>
							<option value="6.25">6.25</option>
							<option value="6.5">6.5</option>
							<option value="6.75">6.75</option>
							<option value="7">7</option>
							<option value="7.25">7.25</option>
							<option value="7.75">7.75</option>
							<option value="8">8</option>
							<option value="8.25">8.25</option>
							<option value="8.5">8.5</option>
							<option value="8.75">8.75</option>
							<option value="9">9</option>
							<option value="9.25">9.25</option>
							<option value="9.5">9.5</option>
							<option value="9.75">9.75</option>
							<option value="10">10</option>
							<option value="10.25">10.25</option>
							<option value="10.5">10.5</option>
							<option value="10.75">10.75</option>
							<option value="11">11</option>
							<option value="11.25">11.25</option>
							<option value="11.5">11.5</option>
							<option value="11.75">11.75</option>
							<option value="12">12</option>
							<option value="12.25">12.25</option>
							<option value="12.5">12.5</option>
							<option value="Other">Other</option>
						</select>
					</div>
					<div class="clear"></div>
				</div><br>
                <div><b>Upload your images -</b> <i>You can upload upto 3 images, only jpeg, jpg, png and gif file are accepted.</i></div><br>
                <div class="imageUpload">
                    <span>Image Upload 1: </span>
                    <span><input type="file" name="file_upload1" /></span>
                </div>
                <div class="imageUpload">
                    <span>Image Upload 2: </span>
                    <span><input type="file" name="file_upload2" /></span>
                </div>
                <div class="imageUpload">
                    <span>Image Upload 3: </span>
                    <span><input type="file" name="file_upload3" /></span>
                </div>
                <br><br>
                <div class="setext">Enter description of your custom design request: * </div><br>
                <div class="fieldrow">
                	<div class="fieldleft">Contact Name:* </div>
                    <div class="fieldright"><input type="text" required="required" name="contact_numb" /></div>
                    <div class="clear"></div>
                </div>
                <div class="fieldrow">
                	<div class="fieldleft">Contact E-mail address:* </div>
                    <div class="fieldright"><input name="contact_email" type="email" required="required" /></div>
                    <div class="clear"></div>
                </div>
                <div class="fieldrow">
                	<div class="fieldleft">Contact Telephone:* </div>
                    <div class="fieldright"><input type="text" required="required"  name="contact_phone" /></div>
                    <div class="clear"></div>
                </div>
                <br>
                <div class="fieldrow">
                	<div class="fieldleft">&nbsp;</div>
                    <div class="fieldright submitRequest"><input type="submit" name="submit_request" value="Submit Your Request" /></div>
                    <div class="clear"></div>
                </div>
			</div>
		</div>
	</form>
	<div class="clear"></div>
</div>
<!-- end body content -->