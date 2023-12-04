<div id="main-body-a">
	<div id="content-nonav" style="margin:0 auto; width:970px;">
		<p class="browntitle">Custom <span class="browntitle-lg">Design</span> Inquiry</p>
		<p></p>
		<p>&nbsp;</p>
		<p>Thanks for your interest in custom design!  Please provide us with some basic information to get the conversation going.  Our hope is to get to know you better and work together to design a wonderful new piece of jewelry unique to you and your relationship.</p>
		<p>&nbsp;</p>
		<p>You have two options for starting this conversation:</p>
		<ol>
			<li>Complete the form below, or</li>
			<li>Skip the form and start with an email to <?php echo '<a href="mailto:'.getadmin_contact_info('email').'">'.getadmin_contact_info('email').'</a>'; ?>.</li>
		</ol>
		<p>&nbsp;</p>

		<form id="frmcustom" name="frmcustom" method="post" action="">
			<table width="100%" cellspacing="0" cellpadding="5" border="0">
				<tbody>
					<tr valign="top">
						<td width="50%" align="right"><span class="boldgreen">Name(s):</span><br>
						We also enjoy knowing the name of your partner, so we can address them personally throughout the dialogue.</td>
						<td width="50%"><input type="text" size="35" id="names" name="names"></td>
					</tr>
					<tr valign="top">
						<td align="right" class="boldgreen">Email Address: </td>
						<td><input type="text" size="35" name="email"></td>
					</tr>
					<tr valign="top">
						<td align="right" class="boldgreen">Phone Number: </td>
						<td><input type="text" id="phone" name="phone"></td>
					</tr>
					<tr valign="top">
						<td align="right"><span class="boldgreen">Deadline (if applicable):</span><br>
						Please let us know your wedding/commitment ceremony date, or if you have a vacation or ideal proposal time looming.  It's best to know this information early, so we can pace ourselves accordingly.</td>
						<td><textarea id="deadline" rows="5" cols="50" name="deadline"></textarea></td>
					</tr>
					<tr valign="top">
						<td align="right" class="boldgreen">General Description &amp; Details: </td>
						<td><textarea id="description" rows="5" cols="50" name="description"></textarea></td>
					</tr>
					<tr valign="top">
						<td align="right"><span class="boldgreen">Recycled Metal Choice:</span><br>
						Indicate your recycled metal choice. If you're unsure, please be sure to explore your options in our <a target="_blank" href="../education/engagement-ring-buying-guide.asp">Ring Buying Guide</a>.</td>
						<td><select id="metal" name="metal">
						<option selected="selected" value="">Select metal</option>
						<option value="Help me choose a metal to fit my budget and preferences!">Help me choose a metal to fit my budget and preferences!</option>
						<option value="Platinum">Platinum</option>
						<option value="18k White Gold">18k White Gold</option>
						<option value="18k Yellow Gold">18k Yellow Gold</option>
						<option value="18k Rose Gold">18k Rose Gold</option>
						<option value="14k Palladium White Gold (nickel-free)">14k Palladium White Gold (nickel-free)</option>
						</select></td>
					</tr>
					<tr valign="top">
						<td align="right"><span class="boldgreen">Ring Size:</span><br>
						<a target="_blank" href="../customerSupport/ringsize.asp">Click here to request a  free Ring Sizing Tool.</a></td>
						<td><select id="ringsize" name="ringsize">
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
						</select></td>
					</tr>
					<tr valign="top">
						<td align="right"><span class="boldgreen">Diamonds or Gemstones:</span><br>
						If your design includes stones, please let us know a little bit about what you'd like! Explore the <a target="_blank" href="../education/engagement-ring-buying-guide.asp">available stones</a> in our Ring Buying Guide or review the <a target="_blank" href="diamondGallery.asp">range of colors</a> we offer in lab created diamonds. </td>
						<td><textarea id="gemstones" rows="5" cols="50" name="gemstones"></textarea></td>
					</tr>
					<tr valign="top">
						<td align="right"><p><span class="boldgreen">Budget:</span><br>
						Help us help you!  If you're comfortable sharing this information, it can help us guide you through certain decisions on design, metal and stone options.  If your original idea is outside of your price range, we can offer solutions instead of just leaving you hanging.</p>
						<p> <br>
						To obtain a general idea of pricing, please explore the standard products shown on the web site.  Find those with similar materials as what you'd like to use, and use that price as a jumping off point.  While most custom designs begin at $1,000, we offer a great selection of solitaires that are customizable in gem stone and shape for less than that amount.</p></td>
						<td><textarea id="budget" rows="5" cols="50" name="budget"></textarea></td>
					</tr>
					<tr valign="top">
						<td align="right"><span class="boldgreen">Are you planning to participate in our myKarat<span class="trademarksm">&reg;</span> program?</span><br>
						This is a great way to significantly lower the cost of your purchase!  Have your family and friends send in unwanted old and broken jewelry in exchange for a store credit, or use the gold from Grandma's ring to create a special legacy piece.</td>
						<td><select id="mykarat" name="mykarat">
						<option selected="selected" value="">Select response</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
						<option value="Maybe">Maybe</option>
						<option value="Tell me more">Tell me more</option>
						</select></td>
					</tr>
					<tr valign="top">
						<td>&nbsp;</td>
						<script type="text/javascript">function HDW_getCookie(name){  var cname = name + "=";var dc = document.cookie;  dc = dc.replace(/\+/g," "); dc = dc.replace(/%5F/g,"_");dc = dc.replace(/%2E/g,"."); if(dc.length &gt; 0) {begin = dc.indexOf(cname); if (begin != -1) {begin += cname.length; end = dc.indexOf(";", begin); if(end == -1) end = dc.length; var rt = dc.substring(begin, end); rt = rt.replace(/\+/g," "); return unescape(rt); } } return null;}try {var items = document.getElementsByTagName("input");for(i=0;i &lt; items.length;i++)if (items[i].name != "hdcaptcha" &amp;&amp; items[i].name != "hdwfail" )try{var ck = HDW_getCookie("hdw"+items[i].name);if (ck != "" &amp;&amp; ck != null){if (items[i].type == "checkbox")items[i].checked = true;else if (items[i].type == "radio" &amp;&amp; items[i].value == ck)items[i].checked = true; else items[i].value = ck;}} catch (e) {}var items = document.getElementsByTagName("select");for(i=0;i &lt; items.length;i++)try{var ck = HDW_getCookie("hdw"+items[i].name);if (ck != "" &amp;&amp; ck != null){for (j=0;j &lt; items[i].length;j++)if (items[i].options[j].value == ck)items[i].selectedIndex = j;  }} catch (e) {}var items = document.getElementsByTagName("textarea");for(i=0;i &lt; items.length;i++)try{var ck = HDW_getCookie("hdw"+items[i].name);if (ck != "" &amp;&amp; ck != null)items[i].value = ck;} catch (e) {}} catch (e) {}</script></td>
					</tr>
					<tr valign="top">
						<td align="center" colspan="2">&nbsp;</td>
					</tr>
					<tr valign="top">
						<td align="right">&nbsp;</td>
						<td><p><input type="submit" value="Submit" name="submit"></p><p>&nbsp;</p></td>
					</tr>
				</tbody>
			</table>
			<input type="hidden" value="http://www.greenkarat.com/products/customdesigns-formSecurityFail.asp" id="hdwfail" name="hdwfail">
		</form>
		<p>&nbsp;</p>
	</div>
</div>