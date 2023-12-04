<?php echo featured_inlinks(); ?>
<!-- start body content -->
<br><br>
<div class="body_content">
	<div class="leftmenu_bk">
		<?php echo wholeSalerLeftMenu(); ?>
    </div>
	<form name="accountForm" method="post" action="" class="accountForm">
		<div class="rightmenu_bk">
			<h2>My Account > <span class="setSubLabel">Edit Account Information</span></h2><br>
			<div class="account_leftbk">
				<div class="main_acchead">Company Information</div>
				<div class="account_detail">
					<div class="rowline">
						<div class="leftlabel">Company</div>
						<div class="rightValue"><input type="text" name="company_name" value="<?php echo $cust_info->company_name; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Account</div>
						<div class="rightValue">122043</div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Contact Title</div>
						<div class="rightValue">
							<select name="contact_title">
								<option>Owner</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">First Name</div>
						<div class="rightValue"><input type="text" name="ship_fname" value="<?php echo $cust_info->fname; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Last Name</div>
						<div class="rightValue"><input type="text" name="ship_lname" value="<?php echo $cust_info->lname; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Phone</div>
						<div class="rightValue"><input type="text" name="phone_number" value="<?php echo $cust_info->phone; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Fax</div>
						<div class="rightValue"><input type="text" name="fax_number" value="<?php echo $cust_info->ship_faxno; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Email</div>
						<div class="rightValue"><input type="text" name="comp_email" value="<?php echo $cust_info->email; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Username</div>
						<div class="rightValue"><input type="text" name="user_name" value="<?php echo $cust_info->user_name; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Password</div>
						<div class="rightValue"><input type="text" name="password" value="<?php echo $cust_info->password_text; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Payment Terms</div>
						<div class="rightValue">
							<select name="payment_terms">
								<option>Credit Card</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Balance</div>
						<div class="rightValue">$0.00</div>
						<div class="clear"></div>
					</div>
				</div>
				<br>
				<div class="main_acchead">Billing Address</div>
				<div class="account_detail">
					<div class="rowline">
						<div class="leftlabel">First Name</div>
						<div class="rightValue"><input type="text" name="bill_fname" value="<?php echo $cust_info->billing_fname; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Last Name</div>
						<div class="rightValue"><input type="text" name="bill_lname" value="<?php echo $cust_info->billing_lname; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Phone</div>
						<div class="rightValue"><input type="text" name="bill_phone" value="<?php echo $cust_info->billing_phone; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Fax</div>
						<div class="rightValue"><input type="text" name="bill_fax" value="<?php echo $cust_info->bill_faxno; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">E-Mail</div>
						<div class="rightValue"><input type="text" name="bill_email" value="<?php echo $cust_info->billing_email; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">City</div>
						<div class="rightValue"><input type="text" name="bill_city" value="<?php echo $cust_info->billing_city; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Postcode</div>
						<div class="rightValue"><input type="text" name="bill_postcode" value="<?php echo $cust_info->billing_postcode; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Province / State</div>
						<div class="rightValue"><input type="text" name="bill_province" value="<?php echo $cust_info->billing_province; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Country</div>
						<div class="rightValue"><input type="text" name="bill_country" value="<?php echo $cust_info->billing_country; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel sethg">Address</div>
						<div class="rightValue">
							<textarea name="bill_adres"><?php echo $cust_info->billing_adres1; ?></textarea>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<br><br>
				<div class="clear"></div>
				<div class="fieldvalue"><input type="submit" value="Edit Account Information" name="submit_btn"></div>
			</div>
			<div class="account_rightbk">
				<div class="main_acchead">Shipping Address</div>
				<div class="account_detail">
					<div class="rowline">
						<div class="leftlabel">City</div>
						<div class="rightValue"><input type="text" name="ship_city" value="<?php echo $cust_info->city; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Postcode</div>
						<div class="rightValue"><input type="text" name="ship_postcode" value="<?php echo $cust_info->postcode; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Province / State</div>
						<div class="rightValue"><input type="text" name="ship_province" value="<?php echo $cust_info->province; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Country</div>
						<div class="rightValue"><input type="text" name="ship_country" value="<?php echo $cust_info->country; ?>" /></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel sethg">Address</div>
						<div class="rightValue">
							<textarea name="ship_adres"><?php echo $cust_info->address; ?></textarea>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<br>
				<div class="main_acchead">My Credit Cards</div>
				<div class="right_mainbk">
					<div class="main_acchead">Credit Card on File <span class="cardEx">Expired</span></div>
					<div class="account_detail">
						<div class="rowline">
							<div class="leftlabel">Card Number</div>
							<div class="rightValue"><input type="text" name="card_number" id="card_number" value="<?php echo $cust_info->cc_number; ?>" maxlength="19" /></div>
							<div class="clear"></div>
						</div>
						<div class="rowline">
							<div class="leftlabel">EXP Date / CCV</div>
							<div class="rightValue">
							<select name="cmb_month" class="setmonthfield"><?php echo $monthList; ?></select>
							<select name="cmb_year" class="setmonthfield"><?php echo $yearList; ?></select>
							<input type="text" name="secret_code" class="setcodefield" value="<?php echo $cust_info->cvv_code; ?>" /></div>
							<div class="clear"></div>
						</div>
						<div class="rowline">
							<div class="leftlabel">Name</div>
							<div class="rightValue"><input type="text" name="card_holder_name" value="<?php echo $cust_info->card_holder_name; ?>" /></div>
							<div class="clear"></div>
						</div>
						<div class="rowline">
							<div class="leftlabel sethg">Address</div>
							<div class="rightValue">
								<textarea name="cc_address"><?php echo $cust_info->cc_address; ?></textarea>
							</div>
							<div class="clear"></div>
						</div>
						<div class="rowline">
							<div class="leftlabel sethg1">Notes</div>
							<div class="rightValue"><textarea name="cc_notes"><?php echo $cust_info->cc_notes; ?></textarea></div>
							<div class="clear"></div>
						</div>
						<div class="rowline">
							<div class="additoNotes">Please call our customer service to make changes <br>to your credit card.</div>
							<div class="clear"></div>
						</div>
					</div><br>
				</div>
			</div>
		</div>
	</form>
	<div class="clear"></div>
	<script>
	$('#card_number').keyup(function() {
		var foo = $(this).val().split("-").join(""); // remove hyphens
		if (foo.length > 0) {
			foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
		}
		$(this).val(foo);
	});
	</script>
</div>
<!-- end body content -->