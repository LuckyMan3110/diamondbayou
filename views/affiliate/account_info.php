<?php echo featured_inlinks(); ?>
<br><br>
<div class="body_content">
	<div class="leftmenu_bk">
		<?php echo wholeSalerLeftMenu(); ?>
	</div>
	<div class="rightmenu_bk">
		<h2>My Account</h2><br>
		<div class="account_leftbk">
			<div class="main_acchead">Company Information <a href="<?php echo SITE_URL; ?>affiliate/edit_account_info" class="headLink">Edit</a></div>
			<div class="account_detail">
				<div class="rowline">
					<div class="leftlabel">Company</div>
					<div class="rightValue"><?php echo $cust_info->company_name; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Account</div>
					<div class="rightValue"><?php echo $cust_info->account_no; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Contact Title</div>
					<div class="rightValue"><?php echo $cust_info->account_title; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Contact Name</div>
					<div class="rightValue"><?php echo $contact_name; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Phone</div>
					<div class="rightValue"><?php echo $cust_info->phone; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Fax</div>
					<div class="rightValue"><?php echo $cust_info->ship_faxno; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Email</div>
					<div class="rightValue"><?php echo $cust_info->email; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Username</div>
					<div class="rightValue"><?php echo $cust_info->user_name; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Password</div>
					<div class="rightValue"><?php echo $cust_info->password_text; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Payment Terms</div>
					<div class="rightValue"><?php echo $cust_info->payment_terms; ?></div>
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
					<div class="leftlabel">Contact</div>
					<div class="rightValue"><?php echo $bill_contact; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Phone</div>
					<div class="rightValue"><?php echo $cust_info->billing_phone; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Fax</div>
					<div class="rightValue"><?php echo $cust_info->bill_faxno; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">E-Mail</div>
					<div class="rightValue"><?php echo $cust_info->billing_email; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel sethg">Address</div>
					<div class="rightValue"><?php echo $cust_info->billing_adres1; ?></div>
					<div class="clear"></div>
				</div>
			</div>
		</div>

		<div class="account_rightbk">
			<div class="main_acchead">Shipping Address</div>
			<div class="account_detail">
				<div class="rowline">
					<div class="leftlabel">Contact</div>
					<div class="rightValue"><?php echo $contact_name; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Phone</div>
					<div class="rightValue"><?php echo $cust_info->phone; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">Fax</div>
					<div class="rightValue"><?php echo $cust_info->ship_faxno; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel">E-Mail</div>
					<div class="rightValue"><?php echo $cust_info->email; ?></div>
					<div class="clear"></div>
				</div>
				<div class="rowline">
					<div class="leftlabel sethg">Address</div>
					<div class="rightValue"><?php echo $cust_info->address; ?></div>
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
						<div class="rightValue"><?php echo $cust_info->cc_number; ?></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">EXP Date / CCV</div>
						<div class="rightValue"><?php echo $cc_info; ?></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel">Name</div>
						<div class="rightValue"><?php echo $cust_info->card_holder_name; ?></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel sethg">Address</div>
						<div class="rightValue"><?php echo $cust_info->cc_address; ?></div>
						<div class="clear"></div>
					</div>
					<div class="rowline">
						<div class="leftlabel sethg1">Notes</div>
						<div class="rightValue"><?php echo $cust_info->cc_notes; ?></div>
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
	<div class="clear"></div>
</div>
<!-- end body content -->