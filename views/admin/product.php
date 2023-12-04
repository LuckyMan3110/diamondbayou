<div>
<? $str=""; ?>
		<?php 
		
		
		//echo($action);
		if($action == 'add' || $action == 'edit'){
	       	$this->load->helper('custom','form');

			$genderoptions = '<option value=""> Select Gender </option>
			                 <option value="men">Male</option>
			                 <option value="ladies">Ladies </option>
			                 ';
			
			$brandoptions = '<option value=""> Select Brand </option>'.$brandoptions.'<option value="-1"> Other </option>';			

			$metaloptions = '<option value=""> Select Metal </option>
				                 <option value="ss">Stainless Steel </option>
				                 <option value="gold_ss">Stainless Steel and Gold</option>
				                 <option value="gold">Gold</option>
				                 '; 
			$styleoptions      = '<option value=""> Select Style </option>
				                 <option value="new">New</option>
				                 <option value="preowned">Pre Owned</option>
				                 ';

		
	  		$id = isset($id) ? $id : '';
			
			if($details['is_featured']) {
				$featured_checked = 'checked';
			} else {
				$featured_checked = 'unchecked';
			}
			if($details['is_on_clearance']) {
				$divLabel = 'style="display:block;"';
				$divTxtBox = 'style="display:block;"';
				$special_price = $details['clearance_price'];
				$clearance_checked = 'checked';
			} else {
				$divLabel = 'style="display:none;"';
				$divTxtBox = 'style="display:none;"';
				$clearance_checked = 'unchecked';
			}
			
			//print_r($details);

			?>
			<div>
					<h1 class="hbb" align="center">
								<?=ucfirst($action) ?> Product
					
					</h1>
					
					<br/>
                        
                    
                          
					<div align="center">
					
						 <form name="" action="<?php echo config_item('base_url');?>admin/product/<?php echo $action; echo '/'.$cid; echo ($action == 'edit') ? '/' .$id : '';?>" method="post" enctype="multipart/form-data" >
						<!--  <input type="text" name="rootparentname" id="rootparentname" value="<?php echo $rootparentname;  ?>"  /> -->             
<? //print_r($collections); ?>
						<?php foreach ($collections as $value) { ?>				
						 			<div class="lebelfield floatl"><?php echo $value['label'];  ?></div>
									<div class="inputfield floatl">
                                    
						<?php switch($value['type']){
								case 'text' :
								?>
                                <?
								//echo($value['field']);
									$field	= '<input type="text" name="'.$value['field'].'" value="'.$details[$value['field']].'"  />';
									?>
                                   
									
									<?
								break;
								case 'price' :
									$field	= '<input type="text" name="'.$value['field'].'" value="'.$details[$value['field']].'" maxlength="15" class="price" />';
								break;
								case 'select' :
								
									$field	= '<select name="'.$value['field'].'">';
										foreach ($value['options'] as $optionIndex => $optionValue) { 
											if ($optionIndex == $details[$value['field']])
												$field	.= '<option value="'.$optionIndex.'" selected>'.$optionValue.'</option>';
												else
												$field	.= '<option value="'.$optionIndex.'">'.$optionValue.'</option>';
										 } 
									$field	.= '</select>';
								break;
								case 'preselect' :
								
								if($category['id']==3)
								{
										$str='
<head>
<META content=\"Microsoft FrontPage 4.0\" name=GENERATOR>
<META content=FrontPage.Editor.Document name=ProgId>
</head>

<TABLE width=598 align=center border=0>
<TBODY>
<TR>
<TD align=middle width=626>
<MARQUEE><FONT face=Verdana size=5><B>WELCOME TO DIRECT LOOSE DIAMONDS, YOUR SOURCE FOR CERTIFIED GIA & EGL DIAMONDS </B></FONT></MARQUEE> <P> <MARQUEE><FONT face=Verdana color=red size=5><B>PAY NO SALES TAX WHEN YOU PURCHASE THIS ITEM, ONLY CALIFORNIA RESIDENCE ARE SUBJECT TO 8.25% SALES TAX </B></FONT></MARQUEE>
<P>
<MARQUEE><FONT face=Verdana size=3><B> (877)425-2645</B></FONT></MARQUEE>
<MARQUEE><A href="mailto:alangjewelers@aol.com?subject=ebay auction">alangjewelers@aol.com</A></MARQUEE><BR></P> </TD></TR>
<TR>
<TD align=middle width=626> 
<IMG height=79 src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width=235 border=0><IMG height=79 src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width=235 border=0></TD></TR>
<TR>
<TD vAlign=top width=626 height=2309>
<DIV align=center>
<TABLE height=2479 width="99%" border=0>
<TBODY>
<TR>
<TD vAlign=top align=right width="99%" height=1457>
<TABLE height=1 width=625 align=center border=0>
<TBODY>
<TR vAlign=top align=left>
<TD width=252 height=1>
<TABLE height=220 cellSpacing=1 cellPadding=1 width=379 border=0>
<TBODY>
<TR>
<TD align=middle width=375 bgColor=black height=17><B><FONT face="Georgia, Times New Roman, Times, serif" color=#ffffff size=2>Information</FONT></B></TD></TR>
<TR>
<TD width=375 height=18> ITEM NUMBER:{item_number} </TD></TR>
<TR>
<TD width=375 bgColor=silver height=1> METAL: {metal}</TD></TR>
<TR>
<TD width=375 bgColor=aqua height=15> ITEM INFO:{item_info} CERTIFICATE APPRAISAL </TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> SHAPE OF DIAMONDS:{diamond_shape} </TD></TR>
<TR>
<TD width=375 height=18> WEIGHT OF DIAMONDS:{diamond_weight}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> CLARITY: {clarity}</TD></TR>
<TR>
<TD width=375 height=21> COLOR: {color}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> POLISH: {polish}</TD></TR>
<TR>
<TD width=375 height=21> SYMMETRY: {symetry}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> CUT: {cut}</TD></TR>
<TR>
<TD width=375 height=19> MEASUREMENT: {band_width}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> NUMBER OF INDIVIDUAL DIAMONDS: {total_diamonds}
</TD></TR>
<TR>
<TD width=375 height=22> RING SIZE: {RingSize}</TD></TR>
<TR bgColor=#c8c8d8>
<TD width=375 bgColor=silver height=24> POLISH: {polish}</TD></TR>
<TR>
<TD width=375 height=18> DIAMOND SETTING:{	diamond_setting} </TD></TR>
<TR bgColor=#c8c8d8>
<TD width=375 bgColor=silver height=24> CONDITION: {condition}</TD></TR>
<TR>
<TD width=375 height=18> ESTIMATED RETAIL VALUE : {retail_price}</TD></TR>
<TR>
<TD width=375 bgColor=yellow height=18> OUR PRICE: <FONT color=#ff0000>$ 
</FONT> & NO RESERVE <FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></TD></TR></TBODY></TABLE>
<DIV style="WIDTH: 338px; HEIGHT: 521px" align=center>
<TABLE height=1 width=377 border=0>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width=371 height=18><FONT color=black> *************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR>
<TR>
<TD vAlign=top width=371 height=778>*<FONT color=#0000ff>DIAMOND MEN\'S BAND: </FONT>
<P><FONT face=Verdana size=2>This auction is for a <FONT color=#008080><B><I>BRAND NEW</I></B> </FONT> MEN\'S DIAMOND BAND. 
</FONT></P>
<P align=justify><FONT face=Verdana size=2>The Diamonds are set in <FONT color=#008080><U><B>18kt WHITE GOLD</B>.</U></FONT> 
Yellow gold is available upon request at no additional charge. Upgrade to Platinum for an additional $995.00</FONT></P>
<P align=justify><FONT face=Verdana size=2>Please mention your ring size in
your paypal payment. </FONT><FONT face=Verdana size=2>Rings will be
shipped in a size 9, if ring size is not mentioned.</FONT></P>
<P align=justify><FONT face=Verdana size=2>Our diamonds have an excellent polish and symmetry and are simply incredible. They are clear and bright with exceptional brilliance and fire. The clarity is truly amazing, and this diamonds sparkle immensely, the shapes and cuts are perfect. The diamonds are gauged and measured for the best fit in this item. </FONT></P>
<P align=justify><FONT face=Verdana size=2>Please email me with your questions or comments. You may visit my store to find more selection of certified <SPAN style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA & EGL diamonds</SPAN>. The highest bidder will win this beauty. Bid with full confidence. </FONT></P>
<P><FONT color=#ff0000>These diamonds are all guaranteed to be 100% natural, with no enhancements or treatments. The gemstones are guaranteed to be 100% natural, with no enhancements or treatments. All items have been examined by a GIA gemologist.</FONT></P>
<P><font face="Arial" size="3"><FONT color=black>Descriptions of quality are inherently subjective. The quality descriptions we provide, are to the best of our certified gemologists ability, and are her honest opinion. Disagreements with quality descriptions may occur. </FONT>Appraisal value is given at high retail value for insurance purposes only. Appraisal value is subjective and may vary from one gemologist to another. 
<FONT color=black>Opinions of appraisers may vary up to 25%. Diamond grading is subjective and may vary greatly. If the lowest color or clarity grades we specify are determined to be more than one grade lower than indicated. you may return the item for a full refund less shipping and insurance. Its our recommendation that the buyer obtains an insurance for this item, since they are responsible for lost diamonds or gems.</FONT></font></P></TD></TR>
<TR>
<TD vAlign=top width=371 height=33>
<CENTER>
<P> </P></CENTER> </TD></TR></TBODY></TABLE></DIV></TD>
<TD width=365 height=1>
<TABLE height=758 cellSpacing=1 cellPadding=1 width=389 align=center border=0>
<TBODY>
<TR>
<TD width=414 height=212>
<CENTER>
<P><IMG height=298 src="http://www.alangjewelers.com/images/02209med.jpg" width=376 border=0></P></CENTER> </TD></TR>
<TR>
<TD width=414 height=259><FONT face=Verdana size=2>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<FORM name=orderform action=http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1 method=post>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width="100%"><FONT color=#0000ff>**************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR></FORM></TBODY></TABLE></FONT>
<TABLE height=482 width=354 align=center border=0>
<TBODY>
<TR>
<TD vAlign=center width=348 background=topbk.jpg bgColor=black height=20>
<P align=center><B><FONT face="Georgia, Times New Roman, Times, serif" color=white size=2>Your Free Gift</FONT></B></P></TD></TR>
<TR>
<TD vAlign=top width=348 height=454>
<UL>
<LI><FONT face=Verdana size=2>Jewelry Box </FONT>
<LI><FONT face=Verdana size=2>guaranteed to be 100% genuine diamond</FONT>
<LI><FONT face=Verdana size=2>guaranteed to be 100% genuine 18kt GOLD</FONT>
<LI><FONT face=Verdana size=2>Free appraisal for the estimated retail value of the item with every purchase. </FONT>
<LI><FONT face=Verdana,Arial color=#000000 size=2>Items will be shipped 7-10 days after payment is received. (shipping cut off time is 12:00 PM pacific standard time)</FONT>
<P>Alan G. Jewelers has been dedicated to excellent customer satisfaction and lowest prices in the jewelry business for nearly 20 years. We are a direct diamond importer and all of our diamonds and gemstones are guaranteed to appraise for twice the amount of purchase price. Our merchandise is being offered on EBAY in order to provide the same exceptional quality and value to the general public. <FONT color=#ff0000>These diamonds are all guaranteed to be natural, with no enhancements or treatments.</FONT> Our goal is to reach the highest customer satisfaction rate possible. We welcome the opportunity to serve you.<BR></FONT></B></FONT></P>
<P></P>
<P><FONT face=Verdana color=#ff0000 size=4>Please review our feedback for your Confidence. Lay away plan is available, please click here for additional information </FONT> <FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></P></LI></UL>
<P> </P></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD width=414 height=259>
<P align=center><FONT face="Arial, Helvetica, sans-serif" color=#000033 size=3><BR></FONT><FONT face=Verdana>BID WITH CONFIDENCE!</FONT> </P>
<P dir=rtl align=center><FONT face=Verdana size=2><FONT color=#800000>Alan G Jewelers Guarantees all our <BR>diamonds to be 100% natural <BR></FONT></P></FONT>
<P> </P></TD></TR>
<TR>
<TD width=414 height=259>
<CENTER>
<P><IMG height=285 src="http://www.alangjewelers.com/images/02209med.jpg" width=371 border=0></P></CENTER>
<P> </P></TD></TR></TBODY></TABLE></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=243><!-- Begin Description -->
<DIV align=center>
<CENTER> </CENTER></DIV><!-- End Description -->
<P> <U><B><FONT face=Verdana size=3>About us</FONT></B></U> </P>
<P class=text><FONT face=Verdana size=2>We invite you to read our <A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT>page to obtain information on:
<UL type=circle>
<LI>
<P class=text>Alan G Jewelers</P>
<LI>
<P class=text>Store Policy</P>
<LI>
<P class=text>Shipping </P>
<LI>
<P class=text>Return Policy</P></LI></UL>
<P class=fontblack><U><B><FONT face=Verdana size=3>Payment Information </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>We accept <FONT color=red>ELECTRONIC BANK Wire Transfer,</FONT> and
Visa, MasterCard, American Express, Discover and <FONT color=red>PAYPAL.</FONT></FONT></P>
<P align=justify> <IMG height=24 src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width=50 border=0></P>
<P align=justify></P>
<P></P></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=369> <U><B><FONT face=Verdana size=3>Helpful Information </FONT></B></U>
<P class=text><FONT face=Verdana size=2>GIA stands for Gemological Institute of America and EGL stands for European Gemological Laboratory. GIA and EGL certification are prepared by a third independent party not affiliated to Alan G Jewelers for your protection. The certifications state the color and clarity of diamonds greater than .50cts. They are both well respected in the jewelry industry. If you need any more information regarding these laboratories, you may visit EGL at <A href="http://www.eglusa.com/customerlogin.html"&gt;www.eglusa.com&lt;/A&gt; </FONT>
<P class=text><U><B><FONT face=Verdana>Satisfied Client</FONT><FONT face=Verdana size=3>\'s Letter </FONT></B></U>
<P class=text>
<DIV>dated July 13, 2004:
<P>"Alan,</P></DIV>
<DIV> </DIV>
<DIV>I received your diamond and its a beauty. Thank you so much for your patience and help, you were a dream come true and I know my future wife will appreciate the care you took.</DIV>
<DIV><BR> <BR>Jeffery Ned"</DIV><FONT face=Verdana size=2>
<P class=fontblack><U><B><FONT face=Verdana size=3>Clarity </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>The following table explains the diamond clarity (inside the diamond):<BR>
<P>
<TABLE width="80%" border=1>
<TBODY>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>IF</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI3</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I3</FONT> </TD></TR>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>FLAWLESS</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>EXTREMELY DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE UNDER 10X MAGNIFICATION </FONT></TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE TO NAKED EYE</FONT> </TD></TR></TBODY></TABLE>
<P>
<P class=fontblack><U><B><FONT face=Verdana size=3>Color </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2></FONT></P></FONT></FONT>
<TR>
<TD class=basic10 colSpan=2 height=394>While many diamonds appear colorless, or white, they may actually have subtle yellow or brown tones that can be detected when comparing diamonds side by side. Diamonds were formed under intense heat and pressure, and traces of other elements may have been incorporated into their atomic structure accounting for the variances in color. <BR><BR>Diamond color grades start at D and continue down through the alphabet. Colorless diamonds, graded D, are extremely rare and very valuable. The closer a diamond is to being colorless, the more valuable and rare it is. <BR><BR>The color of a diamond is graded with the diamond upside down before it is set in a mounting. The first three colors D, E, F are often called collection color. The subtle changes in collection color are so minute that it is difficult to identify them in the smaller sizes. Although the presence of color makes a diamond less rare and valuable, some diamonds come out of the ground in vivid "fancy" colors - well defined reds, blues, pinks, greens, and bright yellows. These are highly priced and extremely rare.<BR><BR>
<DIV align=center><IMG height=200 src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width=600> </DIV></TD></TR></TBODY></TABLE>
<DIV></DIV></TD></TR></TBODY></TABLE><!-- End Description --></DIV></TD></TR></TBODY></TABLE>
<CENTER> </CENTER>
<CENTER> </CENTER><!-- End Description -->';
	}
								
								else if($category['id']==5)
								{
										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 2</title>
</head>

<body>

<div id="EBdescription"> <table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR
SOURCE FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       /             (213)623-1456      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="641"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>

<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="1">
<table height="218" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="18">  ITEM
NUMBER:{item_number}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL:  
    {metal}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="15"> WEIGHT
OF METAL:{metal weight}  </td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO:  {item_info}            </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS:  {diamond_shape}</td>
</tr>
<tr>




<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:    {diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:  
      
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:            
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:   {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:{diamond_setting}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="18"> WIDTH
OF ITEM:      
{band_width}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> POLISH: 
{polish}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="22">  CONDITION: 
{condition}</td>
</tr>
<tr>
<td width="360" height="22">ESTIMATED
RETAIL VALUE : {retail_price}</td>
</tr>

<tr>
<td width="360" bgColor="yellow" height="18"> Our
Price:  <b><font color="#ff0000">$</font></b>        
&  No Reserve <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 838px" align="center">
<table height="831" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="788">*<font color="#0000ff">Natural
Diamonds ;      </font>
<p><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b> </font>diamond<font color="#008080">
</font>ladies\' Diamond Solitaire pendant. </font></p>
<p align="justify"><font face="Verdana" size="2">These
diamonds are all natural with out any
enhancements or treatments.  </font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND is made of <u><font color="#008080"><b>14KT
GOLD</b>.</font></u> Also available
in Yellow Gold at no additional charge,
18KT GOLD for an additional $295.00 and
PLATINUM for an additional $595.00.</font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and
symmetry and is simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for
the best fit in the band.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The
highest bidder will win this beauty. 
Bid with full confidence.</font></p>
<p><font color="#ff0000">These diamonds
are all guaranteed to be 100% natural,
with no enhancements or treatments. 
The gemstones are  guaranteed to be
100% natural, with no enhancements or
treatments.  All items have been
examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to
the best of our certified gemologists ability,
and are her honest opinion.
Disagreements with quality descriptions
may occur.   </font>Appraisal
value is given at high retail value for
insurance purposes only.  Appraisal
value is subjective and may vary from one
gemologist to another.  <font face="Arial" color="black" size="1">Opinions
of appraisers may vary up to 25%. Diamond
grading is subjective and may vary
greatly. If the lowest color or clarity
grades we specify are determined to be
more than one grade lower than indicated.
you may return the item for a full refund
less shipping and insurance.  It is
our recommendation that the buyer obtains
insurance for this item, since we are not
responsible for lost diamonds or gems.</font></font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
</tbody>
</table>
</font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="15"></td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="758" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="212"><font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<table height="453" width="354" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="425">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine 14KT GOLD</font>
<li><font face="Verdana" size="2">Free
appraisal for the estimated
retail value of the item with
every purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will be shipped up to 10 days
after the payment has been
received.  (shipping cut
off time is 1:00 PM pacific
standard time)</font>
<p>Alan G. Jewelers has been
dedicated to excellent
customer satisfaction and
lowest prices in the jewelry
business for nearly 20 years.
We are a direct diamond
importer and all of our
diamonds and gemstones are
guaranteed to appraise for
twice the amount of purchase
price. Our merchandise is
being offered on EBAY in order
to provide the same
exceptional quality and value
to the general public. <font color="#ff0000">These
diamonds are all guaranteed to
be natural, with no
enhancements or treatments.</font>
Our goal is to reach the
highest customer satisfaction
rate possible. We welcome the
opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence </font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td width="414" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"><i><b><font color="#008080" size="5">1200
+ Positive Feedbacks</font></b></i></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"><!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About
us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept <font color="red"> Electronic Bank
Wire Transfer</font> and <font color="red">PAYPAL,
VISA, MASTERCARD, DISCOVER, AND AMEX.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and
EGL stands for European Gemological Laboratory.
GIA and EGL certification are prepared by a third
independent party not affiliated to Alan G
Jewelers for your protection. The certifications
state the color and clarity of diamonds greater
than .50cts. They are both well respected in the
jewelry industry. If you need any more information
regarding these laboratories, you may visit EGL at
<a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text"> 
<div>
dated July 13, 2004:
<p>"Alan,</p>
</div>
<div>
 
</div>
<div>
I received your diamond and its a beauty. 
Thank you so much for your patience and help,
you were a dream come true and I know my future
wife will appreciate the care you took.
</div>
<div>
<br>
 <br>
Jeffery Ned"
</div>
<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The following table explains
the diamond clarity (inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that
can be detected when comparing diamonds side by
side. Diamonds were formed under intense heat and
pressure, and traces of other elements may have
been incorporated into their atomic structure
accounting for the variances in color.<br>

<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded
D, are extremely rare and very valuable. The
closer a diamond is to being colorless, the more
valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to
identify them in the smaller sizes. Although the
presence of color makes a diamond less rare and
valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined
reds, blues, pinks, greens, and bright yellows.
These are highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
  <!-- End Description -->
<br>
<br>
<!-- End Description -->
</div>

</body>

</html>
';
		}
					else if($category['id']==21)
								{
										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 5</title>
</head>

<body>

<table> <tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR SOURCE
FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            877-425-2645       /             877-4-ALANGJ      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay%20auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="653"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="1143" width="95%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="2298">
<table height="89" width="779" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="364" height="382">
<table height="236" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> ITEM
NUMBER:{item_number}  </td>
</tr>
<tr>
<td width="360" bgColor="#00ffff" height="18"> CERTIFICATE: {certificate}</td>
</tr>
<tr>
<td width="360" height="18"> METAL:     
     {metal}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> WEIGHT:    
     {metal_weight}</td>
</tr>
<tr>
<td width="360" height="18"> CLARITY:  
             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> COLOR:                   
{color}</td>
</tr>
<tr>
<td width="360" height="18"> MEASUREMENT OF
NECKLACE:      {WidthofBand}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamonds}</td>
</tr>
<tr>
<td width="360" height="18"> CONDITION: {condition}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> POLISH: 
{polish}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="white" height="24"> TYPE
OF SETTING:  {SettingType}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> BAND
STYLE:  <span style="BACKGROUND-COLOR: rgb(255,0,255)">DIAMOND
BY THE YARD</span></td>
</tr>
<tr>
<td width="360" bgColor="white" height="24"> SPACING: 
      {spacing}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="24"> TYPE
OF CLASP:{type of clasp} </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> ESTIMATED
RETAIL VALUE : {retail_price}</td>
</tr>
<tr>
<td width="360" bgColor="#ffff00" height="18"> OUR
PRICE:  <font color="#ff0000">$       
  </font>& <font color="#ff0000">{our price}</font> <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 364px; HEIGHT: 860px" align="center">
<table height="792" width="364" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="358" height="745">*<font color="#0000ff">
Round Brilliant Diamond Necklace;   </font>
<p><font face="Verdana" size="2">This auction
is for a <font color="#008000"><i><b>BRAND NEW</b></i></font>
diamond necklace.</font></p>
<p align="left"><font face="Verdana" size="2">The
NECKLACE is made of <u><font color="#008080">14KT
GOLD</font></u>.  Also available in
yellow gold with no additional charge. 
Please indicate yellow gold in your PAYPAL
payment.</font></p>
<p align="left"><font face="Verdana" size="2">The
diamonds have excellent cut, polish and
symmetry and are simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for the
best fit for this NECKLACE.</font></p>
<p><font face="Verdana" size="2">Please email
me with your questions or comments.  You
may visit my store to find more selection of
certified <span style="BACKGROUND-COLOR: rgb(255,0,255)">GIA
& EGL diamonds</span>. A certificate
appraisal will accompany this diamond
NECKLACE.  The estimated retail value of
this NECKLACE is $4,845.00.  The highest
bidder will win this beauty.  Bid with
full confidence.</font></p>
<p><font color="#ff0000">These diamonds are
all guaranteed to be 100% natural, with no
enhancements or treatments.  All items
have been examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to the
best of our certified gemologists ability,
and are her honest opinion. Disagreements
with quality descriptions may occur. 
 </font>Appraisal value is given at high
retail value for insurance purposes only. 
Appraisal value is subjective and may vary
from one gemologist to another.  <font color="black">Diamond
grading is subjective and may vary greatly. If
the lowest color or clarity grades we specify
are determined to be more than one grade lower
than indicated. you may return the item for a
full refund less shipping and insurance. 
It is our recommendation that the buyer
obtains insurance on this item, since they are
responsible for lost diamond.</font></font></p>
</td>
</tr>
<tr>
<td vAlign="top" width="358" height="19"> </td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="453" height="382">
<table height="759" cellSpacing="1" cellPadding="1" width="303" align="center" border="0">
<tbody>
<tr>
<td width="418" height="220"><br>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff">***************************************************************</font></td>
</tr>
</tbody>
</form>
</table>
</font>
<table height="344" width="382" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="376" background="http://www.lajd.com/images/topbk.jpg" bgColor="white" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="376" height="316">
<ul>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Jewelry
Box</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine diamond</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine 14KT GOLD</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Free
appraisal for the estimated retail
value of the item with every
purchase.</font></b></i>
<li><i><b><font face="Verdana,Arial" color="#0000ff" size="2">Items
will be shipped 5-7 days after your 
payment has been received. 
(shipping cut off time is 1:00 PM
pacific standard time)</font></b></i>
<p>Alan G. Jewelers has been
dedicated to excellent customer
satisfaction and lowest prices in
the jewelry business for nearly 20
years. We are a direct diamond
importer and all of our diamonds and
gemstones are guaranteed to appraise
for twice the amount of purchase
price. Our merchandise is being
offered on EBAY in order to provide
the same exceptional quality and
value to the general public. <font color="#ff0000">These
diamonds are all guaranteed to be
natural, with no enhancements or
treatments.</font> Our goal is to
reach the highest customer
satisfaction rate possible. We
welcome the opportunity to serve
you.<br>
</p>
<p> </p>
<p><b><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence.</font></b></li>
</ul>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="418" height="260">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH CONFIDENCE!</font></p>
<p dir="rtl" align="center"><font color="#800000" face="Verdana" size="2">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural</font></td>
</tr>
</tbody>
</table>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff"> </font></td>
</tr>
</tbody>
</form>
</font>
<tbody>
<tr>
<td vAlign="top" width="444" height="316"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="243"><!-- Begin Description -->
<!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We invite
you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:</p>
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept ELECTRONIC BANK <font color="red">Wire Transfer,</font>
and <font color="red">PAYPAL, VISA, MASTERCARD, AMEX.
DISCOVER.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA stands
for Gemological Institute of America and EGL stands for
European Gemological Laboratory. GIA and EGL
certification are prepared by a third independent party
not affiliated to Alan G Jewelers for your protection.
The certifications state the color and clarity of
diamonds greater than .50cts. They are both well
respected in the jewelry industry. If you need any more
information regarding these laboratories, you may visit
EGL at <a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;&lt;/p&gt;
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Clarity</font></b></u></font></p>
<p align="justify"><font face="Verdana" size="2">The
following table explains the diamond clarity (inside the
diamond):<br>
</font></p>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> </p>
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Color</font></b></u></font></p>
<p align="justify"> </p>
</td>
</tr>
<tr>
<td class="basic10" colSpan="2" height="394" width="823">While many
diamonds appear colorless, or white, they may actually
have subtle yellow or brown tones that can be detected
when comparing diamonds side by side. Diamonds were
formed under intense heat and pressure, and traces of
other elements may have been incorporated into their
atomic structure accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded D, are
extremely rare and very valuable. The closer a diamond
is to being colorless, the more valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond upside
down before it is set in a mounting. The first three
colors D, E, F are often called collection color. The
subtle changes in collection color are so minute that it
is difficult to identify them in the smaller sizes.
Although the presence of color makes a diamond less rare
and valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined reds,
blues, pinks, greens, and bright yellows. These are
highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</table>

</body>';
		}
		           else if($category['id']==18)
								{

										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 5</title>
</head>

<body>

<table> <tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR SOURCE
FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            877-425-2645       /             877-4-ALANGJ      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay%20auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="653"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="1143" width="95%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="2298">
<table height="89" width="779" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="364" height="382">
<table height="236" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> ITEM
NUMBER:{item_number}  </td>
</tr>
<tr>
<td width="360" bgColor="#00ffff" height="18"> CERTIFICATE: 
{certificate}</td>
</tr>
<tr>
<td width="360" height="18"> METAL:     
      {metal}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> WEIGHT:    
     {diamond_weight}</td>
</tr>
<tr>
<td width="360" height="18"> CLARITY:  
             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> COLOR:                   
{color}</td>
</tr>
<tr>
<td width="360" height="18"> MEASUREMENT OF
NECKLACE:{bandwidth}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamonds}</td>
</tr>
<tr>
<td width="360" height="18"> CONDITION: {condition}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> POLISH: 
{polish}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="white" height="24"> TYPE
OF SETTING:{SettingType}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> BRACELET
STYLE:  {braclet_style}</td>
</tr>
<tr>
<td width="360" bgColor="white" height="24"> SPACING: 
      {spacing}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="24"> TYPE
OF CLASP:  {clasp_type}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> ESTIMATED
RETAIL VALUE : {retail_price}</td>
</tr>
<tr>
<td width="360" bgColor="#ffff00" height="18"> OUR
PRICE:  <font color="#ff0000">$       
  </font>& <font color="#ff0000">{our price}</font> <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 364px; HEIGHT: 860px" align="center">
<table height="792" width="364" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="358" height="745">*<font color="#0000ff">
Round Brilliant Diamond Necklace;   </font>
<p><font face="Verdana" size="2">This auction
is for a <font color="#008000"><i><b>BRAND NEW</b></i></font>
diamond necklace.</font></p>
<p align="left"><font face="Verdana" size="2">The
NECKLACE is made of <u><font color="#008080">14KT
GOLD</font></u>.  Also available in
yellow gold with no additional charge. 
Please indicate yellow gold in your PAYPAL
payment.</font></p>
<p align="left"><font face="Verdana" size="2">The
diamonds have excellent cut, polish and
symmetry and are simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for the
best fit for this NECKLACE.</font></p>
<p><font face="Verdana" size="2">Please email
me with your questions or comments.  You
may visit my store to find more selection of
certified <span style="BACKGROUND-COLOR: rgb(255,0,255)">GIA
& EGL diamonds</span>. A certificate
appraisal will accompany this diamond
NECKLACE.  The estimated retail value of
this NECKLACE is $4,845.00.  The highest
bidder will win this beauty.  Bid with
full confidence.</font></p>
<p><font color="#ff0000">These diamonds are
all guaranteed to be 100% natural, with no
enhancements or treatments.  All items
have been examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to the
best of our certified gemologists ability,
and are her honest opinion. Disagreements
with quality descriptions may occur. 
 </font>Appraisal value is given at high
retail value for insurance purposes only. 
Appraisal value is subjective and may vary
from one gemologist to another.  <font color="black">Diamond
grading is subjective and may vary greatly. If
the lowest color or clarity grades we specify
are determined to be more than one grade lower
than indicated. you may return the item for a
full refund less shipping and insurance. 
It is our recommendation that the buyer
obtains insurance on this item, since they are
responsible for lost diamond.</font></font></p>
</td>
</tr>
<tr>
<td vAlign="top" width="358" height="19"> </td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="453" height="382">
<table height="759" cellSpacing="1" cellPadding="1" width="303" align="center" border="0">
<tbody>
<tr>
<td width="418" height="220"><br>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff">***************************************************************</font></td>
</tr>
</tbody>
</form>
</table>
</font>
<table height="344" width="382" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="376" background="http://www.lajd.com/images/topbk.jpg" bgColor="white" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="376" height="316">
<ul>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Jewelry
Box</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine diamond</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine 14KT GOLD</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Free
appraisal for the estimated retail
value of the item with every
purchase.</font></b></i>
<li><i><b><font face="Verdana,Arial" color="#0000ff" size="2">Items
will be shipped 5-7 days after your 
payment has been received. 
(shipping cut off time is 1:00 PM
pacific standard time)</font></b></i>
<p>Alan G. Jewelers has been
dedicated to excellent customer
satisfaction and lowest prices in
the jewelry business for nearly 20
years. We are a direct diamond
importer and all of our diamonds and
gemstones are guaranteed to appraise
for twice the amount of purchase
price. Our merchandise is being
offered on EBAY in order to provide
the same exceptional quality and
value to the general public. <font color="#ff0000">These
diamonds are all guaranteed to be
natural, with no enhancements or
treatments.</font> Our goal is to
reach the highest customer
satisfaction rate possible. We
welcome the opportunity to serve
you.<br>
</p>
<p> </p>
<p><b><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence.</font></b></li>
</ul>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="418" height="260">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH CONFIDENCE!</font></p>
<p dir="rtl" align="center"><font color="#800000" face="Verdana" size="2">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural</font></td>
</tr>
</tbody>
</table>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff"> </font></td>
</tr>
</tbody>
</form>
</font>
<tbody>
<tr>
<td vAlign="top" width="444" height="316"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="243"><!-- Begin Description -->
<!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We invite
you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:</p>
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept ELECTRONIC BANK <font color="red">Wire Transfer,</font>
and <font color="red">PAYPAL, VISA, MASTERCARD, AMEX.
DISCOVER.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA stands
for Gemological Institute of America and EGL stands for
European Gemological Laboratory. GIA and EGL
certification are prepared by a third independent party
not affiliated to Alan G Jewelers for your protection.
The certifications state the color and clarity of
diamonds greater than .50cts. They are both well
respected in the jewelry industry. If you need any more
information regarding these laboratories, you may visit
EGL at <a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;&lt;/p&gt;
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Clarity</font></b></u></font></p>
<p align="justify"><font face="Verdana" size="2">The
following table explains the diamond clarity (inside the
diamond):<br>
</font></p>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> </p>
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Color</font></b></u></font></p>
<p align="justify"> </p>
</td>
</tr>
<tr>
<td class="basic10" colSpan="2" height="394" width="823">While many
diamonds appear colorless, or white, they may actually
have subtle yellow or brown tones that can be detected
when comparing diamonds side by side. Diamonds were
formed under intense heat and pressure, and traces of
other elements may have been incorporated into their
atomic structure accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded D, are
extremely rare and very valuable. The closer a diamond
is to being colorless, the more valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond upside
down before it is set in a mounting. The first three
colors D, E, F are often called collection color. The
subtle changes in collection color are so minute that it
is difficult to identify them in the smaller sizes.
Although the presence of color makes a diamond less rare
and valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined reds,
blues, pinks, greens, and bright yellows. These are
highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</table>

</body>';
		}
				
				else if($category['id']==9)
								{
										$str='
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 10</title>
</head>

<body>

<table width="598" align="center" border="0"> <tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="6"><b>WELCOME TO ALAN G, YOUR SOURCE
FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<marquee><font color="red" face="Verdana" size="5"><b>          
PAY NO SALES TAX WHEN YOU PURCHASE THIS ITEM, SALES TAX APPLIES TO ALL
CALIFORNIA RESIDENCE</b></font></marquee>
<p>
<marquee><font face="Verdana" size="4"><b>                             
            (877)425-2645       /             (213)623-1456      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<td align="middle" width="1018"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="418" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="711">
<table height="201" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="19"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="16"> ITEM NUMBER:{item_number}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL:         
{metal}</td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO: {item_info}
                </td>
</tr>
<tr>
<td width="360" height="18"> SHAPE OF
DIAMOND:{diamond_shape}    </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> WEIGHT
OF GOLD:{metal_weight}         
</td>
</tr>
<tr>
<td width="360" height="18"> WEIGHT OF
DIAMOND:      {diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:             
{clarity}</td>
</tr>
<tr>
<td width="360" height="11"> COLOR:                
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CROSS
MEASUREMENT:         
{cross_measurement}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
MEASUREMENT:             
{diamond_size}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> DIAMOND
SETTING:{diamond_setting}    </td>
</tr>
<tr>
<td width="360" height="21"> CONDITION: 
{condition}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="silver" height="24"> ESTIMATED
RETAIL VALUE : {retail_price} </td>
</tr>
<tr>
<td width="360" bgColor="yellow" height="17">Our
Price: <font color="#ff0000">$</font>{our price}<font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 876px" align="center">
<table height="773" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="717"><font color="#0000ff">Diamond
Cross Pendant;      </font>
<p><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b></font> diamond cross pendant.  </font></p>
<p align="justify"><font face="Verdana" size="2">The
PENDANT is made of <u><font color="#008080"><b>14kt
gold</b>.</font></u>  Also, available
YELLOW GOLD.  Upgrade to platinum for
additional $500.00. </font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and symmetry
and is simply incredible.  They are
clear and bright with exceptional brilliance
and fire.  The clarity is truly
amazing, and this diamonds sparkle immensely
the shape and cut are perfect.  The
diamonds are gauged and measured for the
best fit in the band.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The highest
bidder will win this beauty.  Bid with
full confidence.</font></p>
<p><font color="#ff0000">These diamonds are
all guaranteed to be 100% natural, with no
enhancements or treatments.  The
gemstones are  guaranteed to be 100%
natural, with no enhancements or treatments. 
All items have been examined by a GIA
gemologist.</font></p>
<p align="justify"><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently
subjective. The quality descriptions
we provide, are to the best of our
certified gemologists ability,
and are her honest opinion.
Disagreements with quality
descriptions may occur.   </font>Appraisal
value is given at high retail value
for insurance purposes only. 
Appraisal value is subjective and
may vary from one gemologist to
another.  <font color="black">Opinions
of appraisers may vary up to 25%.
Diamond grading is subjective and
may vary greatly. If the lowest
color or clarity grades we specify
are determined to be more than one
grade lower than indicated. you may
return the item for a full refund
less shipping and insurance. 
It is our recommendation that you
obtain insurance for this item,
since the buyer is responsible
for lost diamonds or gems.</font></font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<tr>
<td vAlign="top" width="359" height="28"> </td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="711">
<table height="1" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="38"></td>
</tr>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><u><i><b><font color="#ffffff">WE
ONLY SELL NATURAL DIAMONDS NEVER ENHANCED</font></b></i></u></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="1">
<p></p>
</td>
</tr>
<tr>
<td width="414" height="127">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"> </p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="454">
<ul>
<li><font face="Verdana" color="#0000ff" size="2">JEWELRY
BOX</font>
<li><font face="Verdana" color="#0000ff" size="2">GUARANTEED
TO BE 100% GENUINE NATURAL DIAMOND, NO
ENHANCEMENT OR TREATMENTS</font>
<li><font face="Verdana" color="#0000ff" size="2">GUARANTEED
TO BE 100% 14KT GOLD</font>
<li><font face="Verdana" color="#0000ff" size="2">Free
appraisal for the estimated retail value
of the item with every purchase.</font>
<li><font face="Verdana,Arial" color="#0000ff" size="2">Items
will be shipped 5-7 days after payment
received.  (shipping cut off time
is 1:00 PM pacific standard time)</font>
<p>Alan G. Jewelers has been dedicated
to excellent customer satisfaction and
lowest prices in the jewelry business
for nearly 20 years. We are a direct
diamond importer and all of our diamonds
and gemstones are guaranteed to appraise
for twice the amount of purchase price.
Our merchandise is being offered on EBAY
in order to provide the same exceptional
quality and value to the general public.
<font color="#ff0000">These diamonds are
all guaranteed to be natural, with no
enhancements or treatments.</font> Our
goal is to reach the highest customer
satisfaction rate possible. We welcome
the opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your Confidence. </font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
<tr>
<td width="414" height="127"> </td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"><!-- Begin Description -->
<!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About
us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept <font color="red">ELECTRONIC BANK Wire
Transfer</font> and <font color="red">PAYPAL, VISA,
MASTERCARD, DISCOVER, AMEX</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and EGL
stands for European Gemological Laboratory. GIA and
EGL certification are prepared by a third
independent party not affiliated to Alan G Jewelers
for your protection. The certifications state the
color and clarity of diamonds greater than .50cts.
They are both well respected in the jewelry
industry. If you need any more information regarding
these laboratories, you may visit EGL at <a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s</font></b></u>
<p class="text">Please review our feedback from our
long term and loyal clients.  We have received
1000+ positive feedbacks.  We look forward to
serving your jewelry needs. <font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">The
following table explains the diamond clarity (inside
the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font></font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that can
be detected when comparing diamonds side by side.
Diamonds were formed under intense heat and
pressure, and traces of other elements may have been
incorporated into their atomic structure accounting
for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded D,
are extremely rare and very valuable. The closer a
diamond is to being colorless, the more valuable and
rare it is.<br>
<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to identify
them in the smaller sizes. Although the presence of
color makes a diamond less rare and valuable, some
diamonds come out of the ground in vivid
"fancy" colors - well defined reds, blues,
pinks, greens, and bright yellows. These are highly
priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
 

</body>

</html>';
		}							
								
			 
			 else if($category['id']==8)
								{
										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 2</title>
</head>

<body>

<div id="EBdescription"> <table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR
SOURCE FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       /             (213)623-1456      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="641"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>

<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="1">
<table height="218" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="18">  ITEM
NUMBER: {item_number} </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL:  
   {metal}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="15"> WEIGHT
OF METAL:    {metal_weight}</td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO: {item_info}            </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS:{diamond_shape} </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:    {diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:  
      
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:            
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS: {noofdiamonds}L</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:{SettingType}  </td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="18"> WIDTH
OF ITEM:      
{WidthofBand}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> POLISH: 
{polish}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="22">  CONDITION: 
{condition}</td>
</tr>
<tr>
<td width="360" height="22">ESTIMATED
RETAIL VALUE : {retail_price}</td>
</tr>

<tr>
<td width="360" bgColor="yellow" height="18"> Our
Price:  <b><font color="#ff0000">$</font></b>{our price}<font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 838px" align="center">
<table height="831" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="788">*<font color="#0000ff">Natural
Diamonds ;      </font>
<p><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b> </font>diamond<font color="#008080">
</font>ladies\' Diamond Solitaire pendant. </font></p>
<p align="justify"><font face="Verdana" size="2">These
diamonds are all natural with out any
enhancements or treatments.  </font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND is made of <u><font color="#008080"><b>14KT
GOLD</b>.</font></u> Also available
in Yellow Gold at no additional charge,
18KT GOLD for an additional $295.00 and
PLATINUM for an additional $595.00.</font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and
symmetry and is simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for
the best fit in the band.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The
highest bidder will win this beauty. 
Bid with full confidence.</font></p>
<p><font color="#ff0000">These diamonds
are all guaranteed to be 100% natural,
with no enhancements or treatments. 
The gemstones are  guaranteed to be
100% natural, with no enhancements or
treatments.  All items have been
examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to
the best of our certified gemologists ability,
and are her honest opinion.
Disagreements with quality descriptions
may occur.   </font>Appraisal
value is given at high retail value for
insurance purposes only.  Appraisal
value is subjective and may vary from one
gemologist to another.  <font face="Arial" color="black" size="1">Opinions
of appraisers may vary up to 25%. Diamond
grading is subjective and may vary
greatly. If the lowest color or clarity
grades we specify are determined to be
more than one grade lower than indicated.
you may return the item for a full refund
less shipping and insurance.  It is
our recommendation that the buyer obtains
insurance for this item, since we are not
responsible for lost diamonds or gems.</font></font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
</tbody>
</table>
</font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="15"></td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="758" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="212"><font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<table height="453" width="354" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="425">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine 14KT GOLD</font>
<li><font face="Verdana" size="2">Free
appraisal for the estimated
retail value of the item with
every purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will be shipped up to 10 days
after the payment has been
received.  (shipping cut
off time is 1:00 PM pacific
standard time)</font>
<p>Alan G. Jewelers has been
dedicated to excellent
customer satisfaction and
lowest prices in the jewelry
business for nearly 20 years.
We are a direct diamond
importer and all of our
diamonds and gemstones are
guaranteed to appraise for
twice the amount of purchase
price. Our merchandise is
being offered on EBAY in order
to provide the same
exceptional quality and value
to the general public. <font color="#ff0000">These
diamonds are all guaranteed to
be natural, with no
enhancements or treatments.</font>
Our goal is to reach the
highest customer satisfaction
rate possible. We welcome the
opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence </font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td width="414" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"><i><b><font color="#008080" size="5">1200
+ Positive Feedbacks</font></b></i></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"><!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About
us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We

accept <font color="red"> Electronic Bank
Wire Transfer</font> and <font color="red">PAYPAL,
VISA, MASTERCARD, DISCOVER, AND AMEX.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and
EGL stands for European Gemological Laboratory.
GIA and EGL certification are prepared by a third
independent party not affiliated to Alan G
Jewelers for your protection. The certifications
state the color and clarity of diamonds greater
than .50cts. They are both well respected in the
jewelry industry. If you need any more information
regarding these laboratories, you may visit EGL at
<a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text"> 
<div>
dated July 13, 2004:
<p>"Alan,</p>
</div>
<div>
 
</div>
<div>
I received your diamond and its a beauty. 
Thank you so much for your patience and help,
you were a dream come true and I know my future
wife will appreciate the care you took.
</div>
<div>
<br>
 <br>
Jeffery Ned"
</div>
<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The following table explains
the diamond clarity (inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that
can be detected when comparing diamonds side by
side. Diamonds were formed under intense heat and
pressure, and traces of other elements may have
been incorporated into their atomic structure
accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded
D, are extremely rare and very valuable. The
closer a diamond is to being colorless, the more
valuable and rare it is.<br>

<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to
identify them in the smaller sizes. Although the
presence of color makes a diamond less rare and
valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined
reds, blues, pinks, greens, and bright yellows.
These are highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
  <!-- End Description -->
<br>
<br>
<!-- End Description -->
</div>

</body>

</html>
';
		}
		
		
		 else if($category['id']==7)
								{
										$str='
<html>
 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 1</title>
</head>
 
<body>
 
<div id="EBdescription"> <table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR
SOURCE FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       / (213)623-1456</b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="626"><img src="http://www.alangjewelers.com/images/upperbar02.jpg" border="0" width="900" height="99"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="1">
<table height="218" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="18">  ITEM
NUMBER: {item_number} </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL:      
{metal} </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="15"> WEIGHT
OF METAL:        
{metal_weight}</td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO:  {item_info}             </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS: {diamond_shape}  </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:          
{diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:            
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:               
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:  {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:{diamond_setting}   </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS:{diamond_shape}  </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:       
{diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:                
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamonds}</td>
</tr>

<tr>

<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:{diamond_setting}   </td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="18">RING SIZE: {diamond_size}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WIDTH
OF BAND:         
{earring_width}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="22"> POLISH: 
{polish}</td>
</tr>
<tr>
<td width="360" height="22"> CONDITION: 
{condition}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="silver" height="24"> ESTIMATED
RETAIL VALUE :{retail_price}</td>
</tr>
<tr>
<td width="360" bgColor="yellow" height="18"> Our
Price: <font color="#ff0000"><b>$             </b> </font>{our price}<font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 838px" align="center">
<table height="831" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="788">*<font color="#0000ff">Natural
Diamonds ;      </font>
<p align="justify"><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b> </font>diamond<font color="#008080">
</font>ladies\'<font color="#008080"> </font>semi-mount.  </font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND is made of <u><font color="#008080"><b>14KT
GOLD</b>.</font></u> Also available
in Yellow Gold at no additional charge,
18KT GOLD for an additional 295.00 and
PLATINUM for an additional $595.00.</font></p>
<p align="justify"><font face="Verdana" size="2">All
Rings are made to order in size 6. 
If no sizing is written in your PayPal
payment we will ship in size 6.</font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and
symmetry and is simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for
the best fit in the ring.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The
highest bidder will win this beauty. 
Bid with full confidence.</font></p>
<p><font color="#ff0000">These diamonds
are all guaranteed to be 100% natural,
with no enhancements or treatments. 
The gemstones are  guaranteed to be
100% natural, with no enhancements or
treatments.  All items have been
examined by a GIA gemologist.</font></p>
<p><font face="Arial" color="black" size="1">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to
the best of our certified gemologists ability,
and are her honest opinion.
Disagreements with quality descriptions
may occur.   </font><font face="Arial" size="1">Appraisal
value is given at high retail value for
insurance purposes only.  Appraisal
value is subjective and may vary from one
gemologist to another.  </font><font face="Arial" color="black" size="1">Opinions
of appraisers may vary up to 25%. Diamond
grading is subjective and may vary
greatly. If the lowest color or clarity
grades we specify are determined to be
more than one grade lower than indicated.
you may return the item for a full refund
less shipping and insurance.  It is
our recommendation that the buyer obtains
insurance for this item, since we are not
responsible for lost diamonds or gems.</font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
</tbody>
</table>
</font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="15"></td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="758" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="212"><font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<table height="453" width="354" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="425">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine 14KT GOLD</font>
<li><font face="Verdana" size="2">Free
appraisal for the estimated
retail value of the item with
every purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will be shipped up to 10 days
after the payment has been
received.  (shipping cut
off time is 1:00 PM pacific
standard time)</font>
<p>Alan G. Jewelers has been
dedicated to excellent
customer satisfaction and
lowest prices in the jewelry
business for nearly 20 years.
We are a direct diamond
importer and all of our
diamonds and gemstones are
guaranteed to appraise for
twice the amount of purchase
price. Our merchandise is
being offered on EBAY in order
to provide the same
exceptional quality and value
to the general public. <font color="#ff0000">These
diamonds are all guaranteed to
be natural, with no
enhancements or treatments.</font>
Our goal is to reach the
highest customer satisfaction
rate possible. We welcome the
opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence </font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td width="414" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"><i><b><font color="#008080" size="5">1200
+ Positive Feedbacks</font></b></i></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"> <u><b><font face="Verdana" size="3">About
us</font></b></u>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept <font color="red"> Electronic Bank
Wire Transfer</font> and <font color="red">PAYPAL,
VISA, MASTERCARD, DISCOVER, & AMEX.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and
EGL stands for European Gemological Laboratory.
GIA and EGL certification are prepared by a third
independent party not affiliated to Alan G
Jewelers for your protection. The certifications
state the color and clarity of diamonds greater
than .50cts. They are both well respected in the
jewelry industry. If you need any more information
regarding these laboratories, you may visit EGL at
<a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text"> 
<div>
dated July 13, 2004:
<p>"Alan,</p>
</div>
<div>
 
</div>
<div>
I received your diamond and its a beauty. 
Thank you so much for your patience and help,
you were a dream come true and I know my future
wife will appreciate the care you took.
</div>
<div>
<br>
 <br>
Jeffery Ned"
</div>
<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The following table explains
the diamond clarity (inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that
can be detected when comparing diamonds side by
side. Diamonds were formed under intense heat and
pressure, and traces of other elements may have
been incorporated into their atomic structure
accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded
D, are extremely rare and very valuable. The
closer a diamond is to being colorless, the more
valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to
identify them in the smaller sizes. Although the
presence of color makes a diamond less rare and
valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined
reds, blues, pinks, greens, and bright yellows.
These are highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
  <!-- End Description -->
<br>
<br>
<!-- End Description -->
</div>
 
</body>
 
</html>
';
		}
		        else if($category['id']==6)
								{
										$str='
<head>
<META content="Microsoft FrontPage 4.0" name=GENERATOR>
<META content=FrontPage.Editor.Document name=ProgId>
</head>

<TABLE width=598 align=center border=0>
<TBODY>
<TR>
<TD align=middle width=626>
<MARQUEE><FONT face=Verdana size=5><B>WELCOME TO DIRECT LOOSE DIAMONDS, YOUR SOURCE FOR CERTIFIED GIA & EGL DIAMONDS </B></FONT></MARQUEE> <P> <MARQUEE><FONT face=Verdana color=red size=5><B>PAY NO SALES TAX WHEN YOU PURCHASE THIS ITEM, ONLY CALIFORNIA RESIDENCE ARE SUBJECT TO 8.25% SALES TAX </B></FONT></MARQUEE>
<P>
<MARQUEE><FONT face=Verdana size=3><B> (877)425-2645</B></FONT></MARQUEE>
<MARQUEE><A href="mailto:alangjewelers@aol.com?subject=ebay auction">alangjewelers@aol.com</A></MARQUEE><BR></P> </TD></TR>
<TR>
<TD align=middle width=626> 
<IMG height=79 src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width=235 border=0><IMG height=79 src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width=235 border=0></TD></TR>
<TR>
<TD vAlign=top width=626 height=2309>
<DIV align=center>
<TABLE height=2479 width="99%" border=0>
<TBODY>
<TR>
<TD vAlign=top align=right width="99%" height=1457>
<TABLE height=1 width=625 align=center border=0>
<TBODY>
<TR vAlign=top align=left>
<TD width=252 height=1>
<TABLE height=220 cellSpacing=1 cellPadding=1 width=379 border=0>
<TBODY>
<TR>
<TD align=middle width=375 bgColor=black height=17><B><FONT face="Georgia, Times New Roman, Times, serif" color=#ffffff size=2>Information</FONT></B></TD></TR>
<TR>
<TD width=375 height=18> ITEM NUMBER:{item_number} </TD></TR>
<TR>
<TD width=375 bgColor=silver height=1> METAL: {metal}</TD></TR>
<TR>
<TD width=375 bgColor=aqua height=15> ITEM INFO: {item_info} </TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> SHAPE OF DIAMONDS:{diamond_shape} </TD></TR>
<TR>
<TD width=375 height=18> WEIGHT OF DIAMONDS: {diamond_weight}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> CLARITY: 
{clarity}</TD></TR>
<TR>
<TD width=375 height=21> COLOR: {color}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> POLISH: {polish}</TD></TR>
<TR>
<TD width=375 height=21> SYMMETRY:{symmetry} </TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> CUT:{cut}</TD></TR>
<TR>
<TD width=375 height=19> MEASUREMENT:{braclet_width}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> NUMBER OF INDIVIDUAL DIAMONDS: {noofdiamonds}
</TD></TR>
<TR>
<TD width=375 height=22> RING SIZE: {RingSize}</TD></TR>
<TR bgColor=#c8c8d8>
<TD width=375 bgColor=silver height=24> POLISH: {polish}</TD></TR>
<TR>
<TD width=375 height=18> DIAMOND SETTING:{diamond_setting} </TD></TR>
<TR bgColor=#c8c8d8>
<TD width=375 bgColor=silver height=24> CONDITION: {condition}</TD></TR>
<TR>
<TD width=375 height=18> ESTIMATED RETAIL VALUE :{retail_price}</TD></TR>
<TR>
<TD width=375 bgColor=yellow height=18> OUR PRICE: <FONT color=#ff0000>$ 
</FONT>{our price}<FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></TD></TR></TBODY></TABLE>
<DIV style="WIDTH: 338px; HEIGHT: 521px" align=center>
<TABLE height=1 width=377 border=0>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width=371 height=18><FONT color=black> *************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR>
<TR>
<TD vAlign=top width=371 height=778>*<FONT color=#0000ff>DIAMOND MEN\'S BAND: </FONT>
<P><FONT face=Verdana size=2>This auction is for a <FONT color=#008080><B><I>BRAND NEW</I></B> </FONT> MEN\'S DIAMOND BAND. 
</FONT></P>
<P align=justify><FONT face=Verdana size=2>The Diamonds are set in <FONT color=#008080><U><B>18kt WHITE GOLD</B>.</U></FONT> 
Yellow gold is available upon request at no additional charge. Upgrade to Platinum for an additional $995.00</FONT></P>
<P align=justify><FONT face=Verdana size=2>Please mention your ring size in
your paypal payment. </FONT><FONT face=Verdana size=2>Rings will be
shipped in a size 9, if ring size is not mentioned.</FONT></P>
<P align=justify><FONT face=Verdana size=2>Our diamonds have an excellent polish and symmetry and are simply incredible. They are clear and bright with exceptional brilliance and fire. The clarity is truly amazing, and this diamonds sparkle immensely, the shapes and cuts are perfect. The diamonds are gauged and measured for the best fit in this item. </FONT></P>
<P align=justify><FONT face=Verdana size=2>Please email me with your questions or comments. You may visit my store to find more selection of certified <SPAN style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA & EGL diamonds</SPAN>. The highest bidder will win this beauty. Bid with full confidence. </FONT></P>
<P><FONT color=#ff0000>These diamonds are all guaranteed to be 100% natural, with no enhancements or treatments. The gemstones are guaranteed to be 100% natural, with no enhancements or treatments. All items have been examined by a GIA gemologist.</FONT></P>
<P><font face="Arial" size="3"><FONT color=black>Descriptions of quality are inherently subjective. The quality descriptions we provide, are to the best of our certified gemologists ability, and are her honest opinion. Disagreements with quality descriptions may occur. </FONT>Appraisal value is given at high retail value for insurance purposes only. Appraisal value is subjective and may vary from one gemologist to another. 
<FONT color=black>Opinions of appraisers may vary up to 25%. Diamond grading is subjective and may vary greatly. If the lowest color or clarity grades we specify are determined to be more than one grade lower than indicated. you may return the item for a full refund less shipping and insurance. Its our recommendation that the buyer obtains an insurance for this item, since they are responsible for lost diamonds or gems.</FONT></font></P></TD></TR>
<TR>
<TD vAlign=top width=371 height=33>
<CENTER>
<P> </P></CENTER> </TD></TR></TBODY></TABLE></DIV></TD>
<TD width=365 height=1>
<TABLE height=758 cellSpacing=1 cellPadding=1 width=389 align=center border=0>
<TBODY>
<TR>
<TD width=414 height=212>
<CENTER>
<P><IMG height=298 src="http://www.alangjewelers.com/images/02209med.jpg" width=376 border=0></P></CENTER> </TD></TR>
<TR>
<TD width=414 height=259><FONT face=Verdana size=2>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<FORM name=orderform action=http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1 method=post>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width="100%"><FONT color=#0000ff>**************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR></FORM></TBODY></TABLE></FONT>
<TABLE height=482 width=354 align=center border=0>
<TBODY>
<TR>
<TD vAlign=center width=348 background=topbk.jpg bgColor=black height=20>
<P align=center><B><FONT face="Georgia, Times New Roman, Times, serif" color=white size=2>Your Free Gift</FONT></B></P></TD></TR>
<TR>
<TD vAlign=top width=348 height=454>
<UL>
<LI><FONT face=Verdana size=2>Jewelry Box </FONT>
<LI><FONT face=Verdana size=2>guaranteed to be 100% genuine diamond</FONT>
<LI><FONT face=Verdana size=2>guaranteed to be 100% genuine 18kt GOLD</FONT>
<LI><FONT face=Verdana size=2>Free appraisal for the estimated retail value of the item with every purchase. </FONT>
<LI><FONT face=Verdana,Arial color=#000000 size=2>Items will be shipped 7-10 days after payment is received. (shipping cut off time is 12:00 PM pacific standard time)</FONT>
<P>Alan G. Jewelers has been dedicated to excellent customer satisfaction and lowest prices in the jewelry business for nearly 20 years. We are a direct diamond importer and all of our diamonds and gemstones are guaranteed to appraise for twice the amount of purchase price. Our merchandise is being offered on EBAY in order to provide the same exceptional quality and value to the general public. <FONT color=#ff0000>These diamonds are all guaranteed to be natural, with no enhancements or treatments.</FONT> Our goal is to reach the highest customer satisfaction rate possible. We welcome the opportunity to serve you.<BR></FONT></B></FONT></P>
<P></P>
<P><FONT face=Verdana color=#ff0000 size=4>Please review our feedback for your Confidence. Lay away plan is available, please click here for additional information </FONT> <FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></P></LI></UL>
<P> </P></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD width=414 height=259>
<P align=center><FONT face="Arial, Helvetica, sans-serif" color=#000033 size=3><BR></FONT><FONT face=Verdana>BID WITH CONFIDENCE!</FONT> </P>
<P dir=rtl align=center><FONT face=Verdana size=2><FONT color=#800000>Alan G Jewelers Guarantees all our <BR>diamonds to be 100% natural <BR></FONT></P></FONT>
<P> </P></TD></TR>
<TR>
<TD width=414 height=259>
<CENTER>
<P><IMG height=285 src="http://www.alangjewelers.com/images/02209med.jpg" width=371 border=0></P></CENTER>
<P> </P></TD></TR></TBODY></TABLE></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=243><!-- Begin Description -->
<DIV align=center>
<CENTER> </CENTER></DIV><!-- End Description -->
<P> <U><B><FONT face=Verdana size=3>About us</FONT></B></U> </P>
<P class=text><FONT face=Verdana size=2>We invite you to read our <A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT>page to obtain information on:
<UL type=circle>
<LI>
<P class=text>Alan G Jewelers</P>
<LI>
<P class=text>Store Policy</P>
<LI>
<P class=text>Shipping </P>
<LI>
<P class=text>Return Policy</P></LI></UL>
<P class=fontblack><U><B><FONT face=Verdana size=3>Payment Information </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>We accept <FONT color=red>ELECTRONIC BANK Wire Transfer,</FONT> and
Visa, MasterCard, American Express, Discover and <FONT color=red>PAYPAL.</FONT></FONT></P>
<P align=justify> <IMG height=24 src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width=50 border=0></P>
<P align=justify></P>
<P></P></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=369> <U><B><FONT face=Verdana size=3>Helpful Information </FONT></B></U>
<P class=text><FONT face=Verdana size=2>GIA stands for Gemological Institute of America and EGL stands for European Gemological Laboratory. GIA and EGL certification are prepared by a third independent party not affiliated to Alan G Jewelers for your protection. The certifications state the color and clarity of diamonds greater than .50cts. They are both well respected in the jewelry industry. If you need any more information regarding these laboratories, you may visit EGL at <A href="http://www.eglusa.com/customerlogin.html"&gt;www.eglusa.com&lt;/A&gt; </FONT>
<P class=text><U><B><FONT face=Verdana>Satisfied Client</FONT><FONT face=Verdana size=3>\'s Letter </FONT></B></U>
<P class=text>
<DIV>dated July 13, 2004:
<P>"Alan,</P></DIV>
<DIV> </DIV>
<DIV>I received your diamond and its a beauty. Thank you so much for your patience and help, you were a dream come true and I know my future wife will appreciate the care you took.</DIV>
<DIV><BR> <BR>Jeffery Ned"</DIV><FONT face=Verdana size=2>
<P class=fontblack><U><B><FONT face=Verdana size=3>Clarity </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>The following table explains the diamond clarity (inside the diamond):<BR>
<P>
<TABLE width="80%" border=1>
<TBODY>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>IF</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI3</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I3</FONT> </TD></TR>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>FLAWLESS</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>EXTREMELY DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE UNDER 10X MAGNIFICATION </FONT></TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE TO NAKED EYE</FONT> </TD></TR></TBODY></TABLE>
<P>
<P class=fontblack><U><B><FONT face=Verdana size=3>Color </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2></FONT></P></FONT></FONT>
<TR>
<TD class=basic10 colSpan=2 height=394>While many diamonds appear colorless, or white, they may actually have subtle yellow or brown tones that can be detected when comparing diamonds side by side. Diamonds were formed under intense heat and pressure, and traces of other elements may have been incorporated into their atomic structure accounting for the variances in color. <BR><BR>Diamond color grades start at D and continue down through the alphabet. Colorless diamonds, graded D, are extremely rare and very valuable. The closer a diamond is to being colorless, the more valuable and rare it is. <BR><BR>The color of a diamond is graded with the diamond upside down before it is set in a mounting. The first three colors D, E, F are often called collection color. The subtle changes in collection color are so minute that it is difficult to identify them in the smaller sizes. Although the presence of color makes a diamond less rare and valuable, some diamonds come out of the ground in vivid "fancy" colors - well defined reds, blues, pinks, greens, and bright yellows. These are highly priced and extremely rare.<BR><BR>
<DIV align=center><IMG height=200 src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width=600> </DIV></TD></TR></TBODY></TABLE>
<DIV></DIV></TD></TR></TBODY></TABLE><!-- End Description --></DIV></TD></TR></TBODY></TABLE>
<CENTER> </CENTER>
<CENTER> </CENTER><!-- End Description -->';
		}     
		
		                               else if($category['id']==4)
								{
										$str='
										<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 2</title>
</head>

<body>

<div id="EBdescription"> <table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR
SOURCE FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       / (213)623-1456</b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="626"><img src="http://www.alangjewelers.com/images/upperbar02.jpg" border="0" width="900" height="99"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="1">
<table height="218" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="18">  ITEM
NUMBER:{item_number}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL:  
    {metal}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="15"> WEIGHT
OF METAL:    {metal_weight}</td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO:  {item_info}            </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS:{diamond_shape}   </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:     {diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:  
      
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:            
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:   {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:{diamond setting}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS: {diamond_shape} </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:     {diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:  
      
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:            
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:    {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING: {diamond setting}  </td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="18"> WIDTH
OF ITEM:      
{width of item}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> POLISH: 
{polish}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="22">  CONDITION: 
{condition}</td>
</tr>
<tr>
<td width="360" height="22">ESTIMATED
RETAIL VALUE :{retail_price}</td>
</tr>

<tr>
<td width="360" bgColor="yellow" height="18"> Our
Price:  <b><font color="#ff0000">$</font></b>{our price}<font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 838px" align="center">
<table height="831" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="788">*<font color="#0000ff">Natural
Diamonds ;      </font>
<p><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b> </font>diamond<font color="#008080">
</font>ladies\' Pendant. </font></p>
<p align="justify"><font face="Verdana" size="2">These
diamonds are all natural with out any
enhancements or treatments.  </font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND is made of <u><font color="#008080"><b>14KT
GOLD</b>.</font></u> Also available
in Yellow Gold at no additional charge,
18KT GOLD for an additional $295.00 and
PLATINUM for an additional $595.00.</font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and
symmetry and is simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for
the best fit in the band.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The
highest bidder will win this beauty. 
Bid with full confidence.</font></p>
<p><font color="#ff0000">These diamonds
are all guaranteed to be 100% natural,
with no enhancements or treatments. 
The gemstones are  guaranteed to be
100% natural, with no enhancements or
treatments.  All items have been
examined by a GIA gemologist.</font></p>
<p><font face="Arial" color="black" size="1">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to
the best of our certified gemologists ability,
and are her honest opinion.
Disagreements with quality descriptions
may occur.   </font><font face="Arial" size="1">Appraisal
value is given at high retail value for
insurance purposes only.  Appraisal
value is subjective and may vary from one
gemologist to another.  </font><font face="Arial" color="black" size="1">Opinions
of appraisers may vary up to 25%. Diamond
grading is subjective and may vary
greatly. If the lowest color or clarity
grades we specify are determined to be
more than one grade lower than indicated.
you may return the item for a full refund
less shipping and insurance.  It is
our recommendation that the buyer obtains
insurance for this item, since we are not
responsible for lost diamonds or gems.</font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
</tbody>
</table>
</font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="15"></td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="758" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="212"><font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<table height="453" width="354" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="425">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine 14KT GOLD</font>
<li><font face="Verdana" size="2">Free
appraisal for the estimated
retail value of the item with
every purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will be shipped up to 10 days

after the payment has been
received.  (shipping cut
off time is 1:00 PM pacific
standard time)</font>
<p>Alan G. Jewelers has been
dedicated to excellent
customer satisfaction and
lowest prices in the jewelry
business for nearly 20 years.
We are a direct diamond
importer and all of our
diamonds and gemstones are
guaranteed to appraise for
twice the amount of purchase
price. Our merchandise is
being offered on EBAY in order
to provide the same
exceptional quality and value
to the general public. <font color="#ff0000">These
diamonds are all guaranteed to
be natural, with no
enhancements or treatments.</font>
Our goal is to reach the
highest customer satisfaction
rate possible. We welcome the
opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence </font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td width="414" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"><i><b><font color="#008080" size="5">PLATINUM
POWER SELLER</font></b></i></p>
<p align="center"><i><b><font color="#008080" size="5">1200
+ Positive Feedbacks</font></b></i></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"><!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About
us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept <font color="red"> Electronic Bank
Wire Transfer</font> and <font color="red">PAYPAL,
VISA, MASTERCARD, DISCOVER, AND AMEX.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and
EGL stands for European Gemological Laboratory.
GIA and EGL certification are prepared by a third
independent party not affiliated to Alan G
Jewelers for your protection. The certifications
state the color and clarity of diamonds greater
than .50cts. They are both well respected in the
jewelry industry. If you need any more information
regarding these laboratories, you may visit EGL at
<a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text"> 
<div>
dated July 13, 2004:
<p>"Alan,</p>
</div>
<div>
 

</div>
<div>
I received your diamond and its a beauty. 
Thank you so much for your patience and help,
you were a dream come true and I know my future
wife will appreciate the care you took.
</div>
<div>
<br>
 <br>
Jeffery Ned"
</div>
<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The following table explains
the diamond clarity (inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that
can be detected when comparing diamonds side by
side. Diamonds were formed under intense heat and
pressure, and traces of other elements may have
been incorporated into their atomic structure
accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded
D, are extremely rare and very valuable. The
closer a diamond is to being colorless, the more
valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to
identify them in the smaller sizes. Although the
presence of color makes a diamond less rare and
valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined
reds, blues, pinks, greens, and bright yellows.
These are highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
  <!-- End Description -->
<br>
<br>
<!-- End Description -->
</div>

</body>

</html>

';
		}     
		                      else if($category['id']==2)
								{
										$str='
<html>
 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 1</title>
</head>
 
<body>
 
<div id="EBdescription"> <table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR
SOURCE FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       / (213)623-1456</b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="626"><img src="http://www.alangjewelers.com/images/upperbar02.jpg" border="0" width="900" height="99"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="1">
<table height="218" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="18">  ITEM
NUMBER:{item_number}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL:      
{metal} </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="15"> WEIGHT
OF METAL:        
{metal_weight}</td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO:  {item_info}            </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS: {diamond_shape}  </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:          
{diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:            
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:               
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:   {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING: {diamond_setting}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS:{diamond_shape}  </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:       
{diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:                
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:{diamond_setting}   </td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="18">RING
SIZE: {	RingSize}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WIDTH
OF BAND:         
{band width}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="22"> POLISH: 
{polish}</td>
</tr>
<tr>
<td width="360" height="22"> CONDITION: 
{condition}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="silver" height="24"> ESTIMATED
RETAIL VALUE :{retail_price}</td>
</tr>
<tr>
<td width="360" bgColor="yellow" height="18"> Our
Price: <font color="#ff0000"><b>$             </b> </font>{our price}<font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 838px" align="center">
<table height="831" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="788">*<font color="#0000ff">Natural
Diamonds ;      </font>
<p align="justify"><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b> </font>diamond<font color="#008080">
</font>ladies\'<font color="#008080"> </font>semi-mount.  </font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND is made of <u><font color="#008080"><b>14KT
GOLD</b>.</font></u> Also available
in Yellow Gold at no additional charge,
18KT GOLD for an additional 295.00 and
PLATINUM for an additional $595.00.</font></p>
<p align="justify"><font face="Verdana" size="2">All
Rings are made to order in size 6. 
If no sizing is written in your PayPal
payment we will ship in size 6.</font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and
symmetry and is simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for
the best fit in the ring.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The
highest bidder will win this beauty. 
Bid with full confidence.</font></p>
<p><font color="#ff0000">These diamonds
are all guaranteed to be 100% natural,
with no enhancements or treatments. 
The gemstones are  guaranteed to be
100% natural, with no enhancements or
treatments.  All items have been
examined by a GIA gemologist.</font></p>
<p><font face="Arial" color="black" size="1">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to
the best of our certified gemologists ability,
and are her honest opinion.
Disagreements with quality descriptions
may occur.   </font><font face="Arial" size="1">Appraisal
value is given at high retail value for
insurance purposes only.  Appraisal
value is subjective and may vary from one
gemologist to another.  </font><font face="Arial" color="black" size="1">Opinions
of appraisers may vary up to 25%. Diamond
grading is subjective and may vary
greatly. If the lowest color or clarity
grades we specify are determined to be
more than one grade lower than indicated.
you may return the item for a full refund
less shipping and insurance.  It is
our recommendation that the buyer obtains
insurance for this item, since we are not
responsible for lost diamonds or gems.</font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
</tbody>
</table>
</font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="15"></td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="758" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="212"><font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<table height="453" width="354" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="425">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine 14KT GOLD</font>
<li><font face="Verdana" size="2">Free
appraisal for the estimated
retail value of the item with
every purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will be shipped up to 10 days
after the payment has been
received.  (shipping cut
off time is 1:00 PM pacific
standard time)</font>
<p>Alan G. Jewelers has been
dedicated to excellent
customer satisfaction and
lowest prices in the jewelry
business for nearly 20 years.
We are a direct diamond
importer and all of our
diamonds and gemstones are
guaranteed to appraise for
twice the amount of purchase
price. Our merchandise is
being offered on EBAY in order
to provide the same
exceptional quality and value
to the general public. <font color="#ff0000">These
diamonds are all guaranteed to
be natural, with no
enhancements or treatments.</font>
Our goal is to reach the
highest customer satisfaction
rate possible. We welcome the
opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence </font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td width="414" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"><i><b><font color="#008080" size="5">1200
+ Positive Feedbacks</font></b></i></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"> <u><b><font face="Verdana" size="3">About
us</font></b></u>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept <font color="red"> Electronic Bank
Wire Transfer</font> and <font color="red">PAYPAL,
VISA, MASTERCARD, DISCOVER, & AMEX.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and
EGL stands for European Gemological Laboratory.
GIA and EGL certification are prepared by a third
independent party not affiliated to Alan G
Jewelers for your protection. The certifications
state the color and clarity of diamonds greater
than .50cts. They are both well respected in the
jewelry industry. If you need any more information
regarding these laboratories, you may visit EGL at
<a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text"> 
<div>
dated July 13, 2004:
<p>"Alan,</p>
</div>
<div>
 
</div>
<div>
I received your diamond and its a beauty. 
Thank you so much for your patience and help,
you were a dream come true and I know my future
wife will appreciate the care you took.
</div>
<div>
<br>
 <br>
Jeffery Ned"
</div>
<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The following table explains
the diamond clarity (inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that
can be detected when comparing diamonds side by
side. Diamonds were formed under intense heat and
pressure, and traces of other elements may have
been incorporated into their atomic structure
accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded
D, are extremely rare and very valuable. The
closer a diamond is to being colorless, the more
valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to
identify them in the smaller sizes. Although the
presence of color makes a diamond less rare and
valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined
reds, blues, pinks, greens, and bright yellows.
These are highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
  <!-- End Description -->
<br>
<br>
<!-- End Description -->
</div>
 
</body>
 
</html>
';
		}                     
		                   else if($category['id']==12)
								{
										$str='

<html>
 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 1</title>
</head>
 
<body>
 
<div id="EBdescription"> <table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR
SOURCE FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       / (213)623-1456</b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="626"><img src="http://www.alangjewelers.com/images/upperbar02.jpg" border="0" width="900" height="99"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="1">
<table height="218" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="18">  ITEM
NUMBER:{item_number}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL: 
{metal}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="15"> WEIGHT
OF METAL:{metal_weight}</td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO:  {item_info}             </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS:{diamond_shape}   </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:    {diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:            
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:    
          
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:  {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:{diamond_setting}   </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS:  {diamond shape}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:     
{diamond weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:  
          
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:                
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:    {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:   {diamond setting}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="18">RING
SIZE:  {RingSize}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WIDTH
OF BAND:  {band width}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="22"> POLISH: 
{polish}</td>
</tr>
<tr>
<td width="360" height="22"> CONDITION: {condition}
</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="silver" height="24"> ESTIMATED
RETAIL VALUE : {retail_price}</td>
</tr>
<tr>
<td width="360" bgColor="yellow" height="18"> Our
Price: <font color="#ff0000"><b>$2,689.00</b>
</font>{our price}<font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 838px" align="center">
<table height="831" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="788">*<font color="#0000ff">Natural
Diamonds ;      </font>
<p align="justify"><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b> </font>diamond<font color="#008080">
</font>ladies\'<font color="#008080"> </font>semi-mount. 
</font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND is made of <u><font color="#008080"><b>14KT
GOLD</b>.</font></u> Also available
in Yellow Gold at no additional charge,
18KT GOLD for an additional 295.00 and
PLATINUM for an additional $595.00.</font></p>
<p align="justify"><font face="Verdana" size="2">All
Rings are made to order in size 6. 
If no sizing is written in your paypal
payment we will ship in size 6.</font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and
symmetry and is simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for
the best fit in the ring.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The
highest bidder will win this beauty. 
Bid with full confidence.</font></p>
<p><font color="#ff0000">These diamonds
are all guaranteed to be 100% natural,
with no enhancements or treatments. 
The gemstones are  guaranteed to be
100% natural, with no enhancements or
treatments.  All items have been
examined by a GIA gemologist.</font></p>
<p><font face="Arial" color="black" size="1">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to
the best of our certified gemologists ability,
and are her honest opinion.
Disagreements with quality descriptions
may occur.   </font><font face="Arial" size="1">Appraisal
value is given at high retail value for
insurance purposes only.  Appraisal
value is subjective and may vary from one
gemologist to another.  </font><font face="Arial" color="black" size="1">Opinions
of appraisers may vary up to 25%. Diamond
grading is subjective and may vary
greatly. If the lowest color or clarity
grades we specify are determined to be
more than one grade lower than indicated.
you may return the item for a full refund
less shipping and insurance.  It is
our recommendation that the buyer obtains
insurance for this item, since we are not
responsible for lost diamonds or gems.</font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
</tbody>
</table>
</font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="15"></td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="758" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="212"><font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<table height="453" width="354" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="425">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine 14KT GOLD</font>
<li><font face="Verdana" size="2">Free
appraisal for the estimated
retail value of the item with
every purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will be shipped up to 10 days
after the payment has been
received.  (shipping cut
off time is 1:00 PM pacific
standard time)</font>
<p>Alan G. Jewelers has been
dedicated to excellent
customer satisfaction and
lowest prices in the jewelry
business for nearly 20 years.
We are a direct diamond
importer and all of our
diamonds and gemstones are
guaranteed to appraise for
twice the amount of purchase
price. Our merchandise is
being offered on EBAY in order
to provide the same
exceptional quality and value
to the general public. <font color="#ff0000">These
diamonds are all guaranteed to
be natural, with no
enhancements or treatments.</font>
Our goal is to reach the
highest customer satisfaction
rate possible. We welcome the
opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence </font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td width="414" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"><i><b><font color="#008080" size="5">1200
+ Positive Feedbacks</font></b></i></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"> <u><b><font face="Verdana" size="3">About
us</font></b></u>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept <font color="red"> Electronic Bank
Wire Transfer</font> and <font color="red">PAYPAL,
VISA, MASTERCARD, DISCOVER, & AMEX.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and
EGL stands for European Gemological Laboratory.
GIA and EGL certification are prepared by a third
independent party not affiliated to Alan G
Jewelers for your protection. The certifications
state the color and clarity of diamonds greater
than .50cts. They are both well respected in the
jewelry industry. If you need any more information
regarding these laboratories, you may visit EGL at
<a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text"> 
<div>
dated July 13, 2004:
<p>"Alan,</p>
</div>
<div>
 
</div>
<div>
I received your diamond and its a beauty. 
Thank you so much for your patience and help,
you were a dream come true and I know my future

wife will appreciate the care you took.
</div>
<div>
<br>
 <br>
Jeffery Ned"
</div>
<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The following table explains
the diamond clarity (inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that
can be detected when comparing diamonds side by
side. Diamonds were formed under intense heat and
pressure, and traces of other elements may have
been incorporated into their atomic structure
accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded
D, are extremely rare and very valuable. The
closer a diamond is to being colorless, the more
valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to
identify them in the smaller sizes. Although the
presence of color makes a diamond less rare and
valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined
reds, blues, pinks, greens, and bright yellows.
These are highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
  <!-- End Description -->
<br>
<br>
<!-- End Description -->
</div>
 
</body>
 
</html>
';
		}
		        else if($category['id']==13)
								{
										$str='
<html>
 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 1</title>
</head>
 
<body>
 
<div id="EBdescription"> <table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">

<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR
SOURCE FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       / (213)623-1456</b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="626"><img src="http://www.alangjewelers.com/images/upperbar02.jpg" border="0" width="900" height="99"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="1">
<table height="218" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="18">  ITEM
NUMBER:{item_number}  </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL:      
{metal} </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="15"> WEIGHT
OF METAL:        
{metal_weight}</td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO:  {item_info}            </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS:{diamond_shape}   </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:          
{diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:            
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:               
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:  {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:{diamond_setting}   </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS: {diamond_shape} </td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:       
{diamond_weight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:                
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamond}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:   {diamond setting}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="18">RING
SIZE:  {RingSize}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WIDTH
OF BAND:         
{bandwidth}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="22"> POLISH: 
{polish}</td>
</tr>
<tr>
<td width="360" height="22"> CONDITION: 
{condition}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="silver" height="24"> ESTIMATED
RETAIL VALUE : {retail_price}</td>
</tr>
<tr>
<td width="360" bgColor="yellow" height="18"> Our
Price: <font color="#ff0000"><b>$             </b> </font>{our price}<font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 838px" align="center">
<table height="831" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="788">*<font color="#0000ff">Natural
Diamonds ;      </font>
<p align="justify"><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b> </font>diamond<font color="#008080">
</font>ladies\'<font color="#008080"> </font>semi-mount.  </font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND is made of <u><font color="#008080"><b>14KT
GOLD</b>.</font></u> Also available
in Yellow Gold at no additional charge,
18KT GOLD for an additional 295.00 and
PLATINUM for an additional $595.00.</font></p>
<p align="justify"><font face="Verdana" size="2">All
Rings are made to order in size 6. 
If no sizing is written in your PayPal
payment we will ship in size 6.</font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and
symmetry and is simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for
the best fit in the ring.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The
highest bidder will win this beauty. 
Bid with full confidence.</font></p>
<p><font color="#ff0000">These diamonds
are all guaranteed to be 100% natural,
with no enhancements or treatments. 
The gemstones are  guaranteed to be
100% natural, with no enhancements or
treatments.  All items have been
examined by a GIA gemologist.</font></p>
<p><font face="Arial" color="black" size="1">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to
the best of our certified gemologists ability,
and are her honest opinion.
Disagreements with quality descriptions
may occur.   </font><font face="Arial" size="1">Appraisal
value is given at high retail value for
insurance purposes only.  Appraisal
value is subjective and may vary from one
gemologist to another.  </font><font face="Arial" color="black" size="1">Opinions
of appraisers may vary up to 25%. Diamond
grading is subjective and may vary
greatly. If the lowest color or clarity
grades we specify are determined to be
more than one grade lower than indicated.
you may return the item for a full refund
less shipping and insurance.  It is
our recommendation that the buyer obtains
insurance for this item, since we are not
responsible for lost diamonds or gems.</font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
</tbody>
</table>
</font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="15"></td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="758" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="212"><font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<table height="453" width="354" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="425">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine 14KT GOLD</font>
<li><font face="Verdana" size="2">Free
appraisal for the estimated
retail value of the item with
every purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will be shipped up to 10 days
after the payment has been
received.  (shipping cut
off time is 1:00 PM pacific
standard time)</font>
<p>Alan G. Jewelers has been
dedicated to excellent
customer satisfaction and
lowest prices in the jewelry
business for nearly 20 years.
We are a direct diamond
importer and all of our
diamonds and gemstones are
guaranteed to appraise for
twice the amount of purchase
price. Our merchandise is
being offered on EBAY in order
to provide the same
exceptional quality and value
to the general public. <font color="#ff0000">These
diamonds are all guaranteed to
be natural, with no
enhancements or treatments.</font>
Our goal is to reach the
highest customer satisfaction
rate possible. We welcome the
opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence </font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td width="414" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"><i><b><font color="#008080" size="5">1200
+ Positive Feedbacks</font></b></i></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"> <u><b><font face="Verdana" size="3">About
us</font></b></u>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept <font color="red"> Electronic Bank
Wire Transfer</font> and <font color="red">PAYPAL,
VISA, MASTERCARD, DISCOVER, & AMEX.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and
EGL stands for European Gemological Laboratory.
GIA and EGL certification are prepared by a third
independent party not affiliated to Alan G
Jewelers for your protection. The certifications
state the color and clarity of diamonds greater
than .50cts. They are both well respected in the
jewelry industry. If you need any more information
regarding these laboratories, you may visit EGL at
<a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text"> 
<div>
dated July 13, 2004:
<p>"Alan,</p>
</div>
<div>
 
</div>
<div>
I received your diamond and its a beauty. 
Thank you so much for your patience and help,
you were a dream come true and I know my future
wife will appreciate the care you took.
</div>
<div>
<br>
 <br>
Jeffery Ned"
</div>
<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The following table explains
the diamond clarity (inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that
can be detected when comparing diamonds side by
side. Diamonds were formed under intense heat and
pressure, and traces of other elements may have
been incorporated into their atomic structure
accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded
D, are extremely rare and very valuable. The
closer a diamond is to being colorless, the more
valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to
identify them in the smaller sizes. Although the
presence of color makes a diamond less rare and
valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined
reds, blues, pinks, greens, and bright yellows.
These are highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
  <!-- End Description -->
<br>
<br>
<!-- End Description -->
</div>
 
</body>
 
</html>
';
		} 
		
		     else if($category['id']==31)
								{
										$str='



<html>
 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 7</title>
</head>
 
<body>
 
<table style="WIDTH: 100%; border-spacing: 0px" align="center"> <tbody>
<tr>
<td>
<div id="EBdescription">

<!-- Begin Description -->
<table cellSpacing="28" cellPadding="0" width="100%">
<tbody>
<tr>
<td vAlign="top">
<table cellSpacing="28" cellPadding="0" width="100%">
<tbody>
<tr>
<td vAlign="top"><!-- Begin Description -->
<table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME
TO ALAN G, YOUR SOURCE FOR CERTIFIED GIA &
EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       / (213)623-1456</b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="626"><img height="99" src="http://www.alangjewelers.com/images/upperbar02.jpg" width="900" border="0"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div style="WIDTH: 811px; HEIGHT: 2496px" align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">

<td width="252" height="1">
<table height="236" cellSpacing="1" cellPadding="1" width="380" border="0">
<tbody>
<tr>
<td align="middle" width="376" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="376" height="18"> ITEM
NUMBER:  </td>
</tr>
<tr>
<td width="376" bgColor="silver" height="1"> METAL:   
10KT GOLD </td>
</tr>
<tr>
<td width="376" height="18"> WEIGHT
OF METAL:    
GRAMS</td>
</tr>
<tr>
<td width="376" bgColor="#00ffff" height="18"> ITEM
INFO:  
CERTIFIED APPRAISAL</td>
</tr>
<tr>
<td width="376" bgColor="#00ff00" height="18"> SHAPE
OF DIAMONDS:   
</td>
</tr>
<tr>
<td width="376" bgColor="silver" height="18"> WEIGHT
OF ROUND DIAMONDS:        
CARATS</td>
</tr>
<tr>
<td width="376" height="22"> CLARITY: 
      
(NATURAL CLARITY)</td>
</tr>
<tr>
<td width="376" bgColor="silver" height="18"> COLOR:           
(NATURAL COLOR) </td>
</tr>
<tr>
<td width="376" height="22"> NUMBER
OF DIAMONDS:     
INDIVIDUAL</td>
</tr>
<tr>
<td width="376" bgColor="silver" height="18"> WIDTH
OF BAND : 
      
MM</td>
</tr>
<tr>
<td width="376" height="22"> TYPE
OF DIAMOND SETTING: 
</td>
</tr>
<tr>
<td width="376" bgColor="silver" height="18"> POLISH: 
EXCELLENT HIGH
POLISH</td>
</tr>
<tr>
<td width="376" height="22"> CONDITION: 
100% BRAND NEW</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="376" bgColor="silver" height="24"> ESTIMATED
RETAIL VALUE : <b>$ </b></td>
</tr>
<tr>
<td width="376" bgColor="yellow" height="18">Our
Price: <b><font color="#ff0000">$         
</font></b> 
&  No
Reserve <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img height="8" src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width="23" border="0"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 364px; HEIGHT: 786px" align="center">
<table height="659" width="364" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%" height="18"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="358" height="759">*<font color="#0000ff">Lady\'s
Diamond Band;          </font>
<p><font face="Verdana" size="2">This
auction is for a <i><b><font color="#008080">BRAND
NEW</font></b></i>
lady\'s diamond BAND.
</font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND  is made
of <font color="#008080"><u><b>10KT
GOLD</b></u></font>.   
</font></p>
<p align="justify"><font face="Verdana" size="2">You
may order
this eternity any
size, prices vary
based on finger
size.  Please
email or call our

customer care
service for
additional
information and
exact price. </font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have
excellent polish
and symmetry and
is simply
incredible. 
They are clear and
bright with
exceptional
brilliance and
fire.  The
clarity is truly
amazing, and this
diamonds sparkle
immensely the
shape and cut are
perfect.  The
diamonds are
gauged and
measured for the
best fit in the
BAND . </font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your
questions or
comments. 
You may visit my
store to find more
selection of
certified <span style="BACKGROUND-COLOR: #ff00ff">GIA
& EGL diamonds</span>.</font></p>
<p align="justify"><font color="#ff0000">These
diamonds are all
guaranteed to be
100% natural, with
no enhancements or
treatments. 
All items have
been examined by a
GIA gemologist.</font></p>
<p align="justify"><font face="Arial" size="2"><font color="black">Descriptions
of quality are
inherently
subjective. The
quality
descriptions we
provide, are to
the best of our
certified
gemologists ability,
and are her
honest opinion.
Disagreements with
quality
descriptions may
occur. 
 </font>Appraisal
value is given at
high retail value
for insurance
purposes only. 
Appraisal value is
subjective and may
vary from one
gemologist to
another.  <font color="black">Opinions
of appraisers may
vary up to 25%.
Diamond grading is
subjective and may
vary greatly. If
the lowest color
or clarity grades
we specify are
determined to be
more than one
grade lower than
indicated. you may
return the item
for a full refund
less shipping and
insurance. 
It is our
recommendation
that you obtain
insurance for this
item, since the
buyer is
responsible for
lost diamonds or
gems.</font></font></p>
</td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="562" cellSpacing="1" cellPadding="1" width="409" align="center" border="0">
<tbody>
<tr bgColor="white">
<td width="434" height="16"></td>
</tr>
<tr>
<td width="434" height="212">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">*************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
<table height="482" width="395" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="389" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="389" height="454">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be
100%
genuine
diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be
100%
genuine
14kt
gold</font>
<li><font face="Verdana" size="2">Free
appraisal
for
the
estimated
retail
value
of the
item
with
every
purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will
be
shipped
the
same
day as
payment
received. 
(shipping
cut
off
time
is
1:00
PM
pacific
standard
time)</font>
<p>Alan
G.
Jewelers
has
been
dedicated
to
excellent
customer
satisfaction
and
lowest
prices
in the
jewelry
business
for
nearly
20
years.
We are
a
direct
diamond
importer
and
all of
our
diamonds
and
gemstones
are
guaranteed
to
appraise
for
twice
the
amount
of
purchase
price.
Our
merchandise
is
being
offered
on
EBAY
in
order
to
provide
the
same
exceptional
quality
and
value
to the
general
public.
<font color="#ff0000">These
diamonds
are
all
guaranteed
to be
natural,
with
no
enhancements
or
treatments.</font>
Our
goal
is to
reach
the
highest
customer
satisfaction
rate
possible.
We
welcome
the
opportunity
to
serve
you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review
our
feedback
for
your
Confidence. 
Lay
away
plan
is
available,
please
click
here
for
additional
information
</font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img height="8" src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width="23" border="0"></a></font></p>
</li>
</ul>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="434" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID
WITH CONFIDENCE!</font></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers
Guarantees all our<br>
diamonds to be
100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"><!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About
us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img height="8" src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width="23" border="0">
</a></font>page to obtain
information on:
<ul type="circle">
<li>
<p class="text">Alan G
Jewelers</p>
<li>
<p class="text">Store
Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return
Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept<font color="red">
Electronic Bank Wire
TRANSFER, VISA,
MASTERCARD, AMEX, DISCOVER
AND PAYPAL.</font></font></p>
<p align="justify">  <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="19"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological
Institute of America and
EGL stands for European
Gemological Laboratory.
GIA and EGL certification
are prepared by a third
independent party not
affiliated to Alan G
Jewelers for your
protection. The
certifications state the
color and clarity of
diamonds greater than
.50cts. They are both well
respected in the jewelry
industry. If you need any
more information regarding
these laboratories, you
may visit EGL at <a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text">Please
review our feedback and if
you have any questions,
please email us before you
bid.  We continuously
strive to get the highest
customer satisfaction in
our industry.<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The
following table explains
the diamond clarity
(inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE
INCLUSIONS UNDER
10x MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS
UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X
MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED
EYE</font></td>
</tr>
</tbody>
</table>
<p></font></p>
<tr>
<td class="basic10" colSpan="2" height="394"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Color</font></b></u></font>
<p> </p>
<p>While many diamonds
appear colorless, or
white, they may actually
have subtle yellow or
brown tones that can be
detected when comparing
diamonds side by side.
Diamonds were formed under
intense heat and pressure,
and traces of other
elements may have been
incorporated into their
atomic structure
accounting for the
variances in color.<br>
<br>
Diamond color grades start
at D and continue down
through the alphabet.
Colorless diamonds, graded
D, are extremely rare and
very valuable. The closer
a diamond is to being
colorless, the more
valuable and rare it is.<br>
<br>
The color of a diamond is
graded with the diamond
upside down before it is
set in a mounting. The
first three colors D, E, F
are often called
collection color. The
subtle changes in
collection color are so
minute that it is
difficult to identify them
in the smaller sizes.
Although the presence of
color makes a diamond less
rare and valuable, some
diamonds come out of the
ground in vivid
"fancy" colors -
well defined reds, blues,
pinks, greens, and bright
yellows. These are highly
priced and extremely rare.<br>
<br>
</p>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
</tbody>
</table>
 
</body>
 
</html>';
		} 
		
		
		
		             else if($category['id']==30)
								{
										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 5</title>
</head>

<body>

<table> <tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR SOURCE
FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            877-425-2645       /             877-4-ALANGJ      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay%20auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="653"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="1143" width="95%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="2298">
<table height="89" width="779" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="364" height="382">
<table height="236" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> ITEM
NUMBER:  {item number}</td>
</tr>
<tr>
<td width="360" bgColor="#00ffff" height="18"> CERTIFICATE: 
{certificate}</td>
</tr>
<tr>
<td width="360" height="18"> METAL:     
     {metal}</td>
</tr>

<tr>
<td width="360" bgColor="silver" height="18"> WEIGHT:    
     {weight}</td>
</tr>
<tr>
<td width="360" height="18"> CLARITY:  
             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> COLOR:                   
{color}</td>
</tr>
<tr>
<td width="360" height="18"> MEASUREMENT OF
NECKLACE:      {measurement}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamond}</td>
</tr>
<tr>
<td width="360" height="18"> CONDITION: 
{condition}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> POLISH: 
{polish}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="white" height="24"> TYPE
OF SETTING:  {settingtype}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> BRACELET
STYLE:  <span style="BACKGROUND-COLOR: rgb(255,0,255)">DIAMOND
BY THE YARD</span>{braceletstyle}</td>
</tr>
<tr>
<td width="360" bgColor="white" height="24"> SPACING: 
      {spacing}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="24"> TYPE
OF CLASP:  {typeofclasp}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> ESTIMATED
RETAIL VALUE : {retailprice}</td>
</tr>
<tr>
<td width="360" bgColor="#ffff00" height="18"> OUR
PRICE:  <font color="#ff0000">$       
  </font>& <font color="#ff0000">NO
RESERVE</font> <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a>{ourprice}</td>
</tr>
</tbody>
</table>
<div style="WIDTH: 364px; HEIGHT: 860px" align="center">
<table height="792" width="364" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="358" height="745">*<font color="#0000ff">
Round Brilliant Diamond Necklace;   </font>
<p><font face="Verdana" size="2">This auction
is for a <font color="#008000"><i><b>BRAND NEW</b></i></font>
diamond necklace.</font></p>
<p align="left"><font face="Verdana" size="2">The
NECKLACE is made of <u><font color="#008080">14KT
GOLD</font></u>.  Also available in
yellow gold with no additional charge. 
Please indicate yellow gold in your PAYPAL
payment.</font></p>
<p align="left"><font face="Verdana" size="2">The
diamonds have excellent cut, polish and
symmetry and are simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for the
best fit for this NECKLACE.</font></p>
<p><font face="Verdana" size="2">Please email
me with your questions or comments.  You
may visit my store to find more selection of
certified <span style="BACKGROUND-COLOR: rgb(255,0,255)">GIA
& EGL diamonds</span>. A certificate
appraisal will accompany this diamond
NECKLACE.  The estimated retail value of
this NECKLACE is $4,845.00.  The highest
bidder will win this beauty.  Bid with
full confidence.</font></p>
<p><font color="#ff0000">These diamonds are
all guaranteed to be 100% natural, with no
enhancements or treatments.  All items
have been examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to the
best of our certified gemologists ability,
and are her honest opinion. Disagreements
with quality descriptions may occur. 
 </font>Appraisal value is given at high
retail value for insurance purposes only. 
Appraisal value is subjective and may vary
from one gemologist to another.  <font color="black">Diamond
grading is subjective and may vary greatly. If
the lowest color or clarity grades we specify
are determined to be more than one grade lower
than indicated. you may return the item for a
full refund less shipping and insurance. 
It is our recommendation that the buyer
obtains insurance on this item, since they are
responsible for lost diamond.</font></font></p>
</td>
</tr>
<tr>
<td vAlign="top" width="358" height="19"> </td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="453" height="382">
<table height="759" cellSpacing="1" cellPadding="1" width="303" align="center" border="0">
<tbody>
<tr>
<td width="418" height="220"><br>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff">***************************************************************</font></td>
</tr>
</tbody>
</form>
</table>
</font>
<table height="344" width="382" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="376" background="http://www.lajd.com/images/topbk.jpg" bgColor="white" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="376" height="316">
<ul>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Jewelry
Box</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine diamond</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine 14KT GOLD</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Free
appraisal for the estimated retail
value of the item with every
purchase.</font></b></i>
<li><i><b><font face="Verdana,Arial" color="#0000ff" size="2">Items
will be shipped 5-7 days after your 
payment has been received. 
(shipping cut off time is 1:00 PM
pacific standard time)</font></b></i>
<p>Alan G. Jewelers has been
dedicated to excellent customer
satisfaction and lowest prices in
the jewelry business for nearly 20
years. We are a direct diamond
importer and all of our diamonds and
gemstones are guaranteed to appraise
for twice the amount of purchase
price. Our merchandise is being
offered on EBAY in order to provide
the same exceptional quality and
value to the general public. <font color="#ff0000">These
diamonds are all guaranteed to be
natural, with no enhancements or
treatments.</font> Our goal is to
reach the highest customer
satisfaction rate possible. We
welcome the opportunity to serve
you.<br>
</p>
<p> </p>
<p><b><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence.</font></b></li>
</ul>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="418" height="260">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH CONFIDENCE!</font></p>
<p dir="rtl" align="center"><font color="#800000" face="Verdana" size="2">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural</font></td>
</tr>
</tbody>
</table>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff"> </font></td>
</tr>
</tbody>
</form>
</font>
<tbody>
<tr>
<td vAlign="top" width="444" height="316"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="243"><!-- Begin Description -->
<!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We invite
you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:</p>
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept ELECTRONIC BANK <font color="red">Wire Transfer,</font>
and <font color="red">PAYPAL, VISA, MASTERCARD, AMEX.
DISCOVER.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA stands
for Gemological Institute of America and EGL stands for
European Gemological Laboratory. GIA and EGL
certification are prepared by a third independent party
not affiliated to Alan G Jewelers for your protection.
The certifications state the color and clarity of
diamonds greater than .50cts. They are both well
respected in the jewelry industry. If you need any more
information regarding these laboratories, you may visit
EGL at <a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;&lt;/p&gt;
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Clarity</font></b></u></font></p>
<p align="justify"><font face="Verdana" size="2">The
following table explains the diamond clarity (inside the
diamond):<br>
</font></p>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> </p>
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Color</font></b></u></font></p>
<p align="justify"> </p>
</td>
</tr>
<tr>
<td class="basic10" colSpan="2" height="394" width="823">While many
diamonds appear colorless, or white, they may actually
have subtle yellow or brown tones that can be detected
when comparing diamonds side by side. Diamonds were
formed under intense heat and pressure, and traces of
other elements may have been incorporated into their
atomic structure accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded D, are
extremely rare and very valuable. The closer a diamond
is to being colorless, the more valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond upside
down before it is set in a mounting. The first three
colors D, E, F are often called collection color. The
subtle changes in collection color are so minute that it
is difficult to identify them in the smaller sizes.
Although the presence of color makes a diamond less rare
and valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined reds,
blues, pinks, greens, and bright yellows. These are
highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</table>

</body>';
		}             
		                  else if($category['id']==24)
								{
										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 5</title>
</head>

<body>

<table> <tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR SOURCE
FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            877-425-2645       /             877-4-ALANGJ      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay%20auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="653"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="1143" width="95%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="2298">
<table height="89" width="779" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="364" height="382">
<table height="236" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> ITEM
NUMBER:  {itemnumber}</td>
</tr>
<tr>
<td width="360" bgColor="#00ffff" height="18"> CERTIFICATE: 
{certificate}</td>
</tr>
<tr>
<td width="360" height="18"> METAL:     
      {metal}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> WEIGHT:    
     {weight}</td>
</tr>
<tr>
<td width="360" height="18"> CLARITY:  
             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> COLOR:                   
{color}</td>
</tr>
<tr>
<td width="360" height="18"> MEASUREMENT OF
NECKLACE:      {measurement}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamonds}</td>
</tr>
<tr>
<td width="360" height="18"> CONDITION: 100%
{condition}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> POLISH: 
{polish}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="white" height="24"> TYPE
OF SETTING:  {typeofsetting}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> BRACELET
STYLE:  <span style="BACKGROUND-COLOR: rgb(255,0,255)">DIAMOND
BY THE YARD</span>{braceletstyle}</td>
</tr>
<tr>
<td width="360" bgColor="white" height="24"> SPACING: 
      {spacing}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="24"> TYPE
OF CLASP:  {typeofclasp}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> ESTIMATED
RETAIL VALUE : {retailprice}</td>
</tr>
<tr>
<td width="360" bgColor="#ffff00" height="18"> OUR
PRICE:  <font color="#ff0000">$       
  </font>& <font color="#ff0000">{ourprice}</font> <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 364px; HEIGHT: 860px" align="center">
<table height="792" width="364" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="358" height="745">*<font color="#0000ff">
Round Brilliant Diamond Necklace;   </font>
<p><font face="Verdana" size="2">This auction
is for a <font color="#008000"><i><b>BRAND NEW</b></i></font>
diamond necklace.</font></p>
<p align="left"><font face="Verdana" size="2">The
NECKLACE is made of <u><font color="#008080">14KT
GOLD</font></u>.  Also available in
yellow gold with no additional charge. 
Please indicate yellow gold in your PAYPAL
payment.</font></p>
<p align="left"><font face="Verdana" size="2">The
diamonds have excellent cut, polish and
symmetry and are simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for the
best fit for this NECKLACE.</font></p>
<p><font face="Verdana" size="2">Please email
me with your questions or comments.  You
may visit my store to find more selection of
certified <span style="BACKGROUND-COLOR: rgb(255,0,255)">GIA
& EGL diamonds</span>. A certificate
appraisal will accompany this diamond
NECKLACE.  The estimated retail value of
this NECKLACE is $4,845.00.  The highest
bidder will win this beauty.  Bid with
full confidence.</font></p>
<p><font color="#ff0000">These diamonds are
all guaranteed to be 100% natural, with no
enhancements or treatments.  All items
have been examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to the
best of our certified gemologists ability,
and are her honest opinion. Disagreements
with quality descriptions may occur. 
 </font>Appraisal value is given at high
retail value for insurance purposes only. 
Appraisal value is subjective and may vary
from one gemologist to another.  <font color="black">Diamond
grading is subjective and may vary greatly. If
the lowest color or clarity grades we specify
are determined to be more than one grade lower
than indicated. you may return the item for a
full refund less shipping and insurance. 
It is our recommendation that the buyer
obtains insurance on this item, since they are
responsible for lost diamond.</font></font></p>
</td>
</tr>
<tr>
<td vAlign="top" width="358" height="19"> </td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="453" height="382">
<table height="759" cellSpacing="1" cellPadding="1" width="303" align="center" border="0">
<tbody>
<tr>
<td width="418" height="220"><br>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff">***************************************************************</font></td>
</tr>
</tbody>
</form>
</table>
</font>
<table height="344" width="382" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="376" background="http://www.lajd.com/images/topbk.jpg" bgColor="white" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="376" height="316">
<ul>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Jewelry
Box</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine diamond</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine 14KT GOLD</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Free
appraisal for the estimated retail
value of the item with every
purchase.</font></b></i>
<li><i><b><font face="Verdana,Arial" color="#0000ff" size="2">Items
will be shipped 5-7 days after your 
payment has been received. 
(shipping cut off time is 1:00 PM
pacific standard time)</font></b></i>
<p>Alan G. Jewelers has been
dedicated to excellent customer
satisfaction and lowest prices in
the jewelry business for nearly 20
years. We are a direct diamond
importer and all of our diamonds and
gemstones are guaranteed to appraise
for twice the amount of purchase
price. Our merchandise is being
offered on EBAY in order to provide
the same exceptional quality and
value to the general public. <font color="#ff0000">These
diamonds are all guaranteed to be
natural, with no enhancements or
treatments.</font> Our goal is to
reach the highest customer
satisfaction rate possible. We
welcome the opportunity to serve
you.<br>
</p>
<p> </p>
<p><b><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence.</font></b></li>
</ul>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="418" height="260">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH CONFIDENCE!</font></p>
<p dir="rtl" align="center"><font color="#800000" face="Verdana" size="2">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural</font></td>
</tr>
</tbody>
</table>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff"> </font></td>
</tr>
</tbody>
</form>
</font>
<tbody>
<tr>
<td vAlign="top" width="444" height="316"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="243"><!-- Begin Description -->
<!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We invite
you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:</p>
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept ELECTRONIC BANK <font color="red">Wire Transfer,</font>
and <font color="red">PAYPAL, VISA, MASTERCARD, AMEX.
DISCOVER.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA stands
for Gemological Institute of America and EGL stands for
European Gemological Laboratory. GIA and EGL
certification are prepared by a third independent party
not affiliated to Alan G Jewelers for your protection.
The certifications state the color and clarity of
diamonds greater than .50cts. They are both well
respected in the jewelry industry. If you need any more
information regarding these laboratories, you may visit
EGL at <a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;&lt;/p&gt;
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Clarity</font></b></u></font></p>
<p align="justify"><font face="Verdana" size="2">The
following table explains the diamond clarity (inside the
diamond):<br>
</font></p>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> </p>
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Color</font></b></u></font></p>
<p align="justify"> </p>
</td>
</tr>
<tr>
<td class="basic10" colSpan="2" height="394" width="823">While many
diamonds appear colorless, or white, they may actually
have subtle yellow or brown tones that can be detected
when comparing diamonds side by side. Diamonds were
formed under intense heat and pressure, and traces of
other elements may have been incorporated into their
atomic structure accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded D, are
extremely rare and very valuable. The closer a diamond
is to being colorless, the more valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond upside
down before it is set in a mounting. The first three
colors D, E, F are often called collection color. The
subtle changes in collection color are so minute that it
is difficult to identify them in the smaller sizes.
Although the presence of color makes a diamond less rare
and valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined reds,
blues, pinks, greens, and bright yellows. These are
highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</table>

</body>';
		}        
		     else if($category['id']==23)
								{
										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 5</title>
</head>

<body>

<table> <tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR SOURCE
FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            877-425-2645       /             877-4-ALANGJ      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay%20auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="653"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="1143" width="95%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="2298">
<table height="89" width="779" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="364" height="382">
<table height="236" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> ITEM
NUMBER:  {itemnumber}</td>
</tr>
<tr>
<td width="360" bgColor="#00ffff" height="18"> CERTIFICATE: 
{certificate}</td>
</tr>
<tr>
<td width="360" height="18"> METAL:     
      {metal}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> WEIGHT:    
    {weight}</td>
</tr>
<tr>
<td width="360" height="18"> CLARITY:  
             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> COLOR:                   
{color}</td>
</tr>
<tr>
<td width="360" height="18"> MEASUREMENT OF
NECKLACE:      {measurement}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamonds}</td>
</tr>
<tr>
<td width="360" height="18"> CONDITION: 100%
{condition}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> POLISH: 
{polish}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="white" height="24"> TYPE
OF SETTING:  {typeofsetting}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> BRACELET
STYLE:  <span style="BACKGROUND-COLOR: rgb(255,0,255)">DIAMOND
BY THE YARD</span>{braceletstyle}</td>
</tr>
<tr>
<td width="360" bgColor="white" height="24"> SPACING: 
      {spacing}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="24"> TYPE
OF CLASP:  {typeofclasp}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> ESTIMATED
RETAIL VALUE : {retailprice}</td>
</tr>
<tr>
<td width="360" bgColor="#ffff00" height="18"> OUR
PRICE:  <font color="#ff0000">$       
  </font>& <font color="#ff0000">{ourprice}</font> <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 364px; HEIGHT: 860px" align="center">
<table height="792" width="364" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="358" height="745">*<font color="#0000ff">
Round Brilliant Diamond Necklace;   </font>
<p><font face="Verdana" size="2">This auction
is for a <font color="#008000"><i><b>BRAND NEW</b></i></font>
diamond necklace.</font></p>
<p align="left"><font face="Verdana" size="2">The
NECKLACE is made of <u><font color="#008080">14KT
GOLD</font></u>.  Also available in
yellow gold with no additional charge. 
Please indicate yellow gold in your PAYPAL
payment.</font></p>
<p align="left"><font face="Verdana" size="2">The
diamonds have excellent cut, polish and
symmetry and are simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for the
best fit for this NECKLACE.</font></p>
<p><font face="Verdana" size="2">Please email
me with your questions or comments.  You
may visit my store to find more selection of
certified <span style="BACKGROUND-COLOR: rgb(255,0,255)">GIA
& EGL diamonds</span>. A certificate
appraisal will accompany this diamond
NECKLACE.  The estimated retail value of
this NECKLACE is $4,845.00.  The highest
bidder will win this beauty.  Bid with
full confidence.</font></p>
<p><font color="#ff0000">These diamonds are
all guaranteed to be 100% natural, with no
enhancements or treatments.  All items
have been examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to the
best of our certified gemologists ability,
and are her honest opinion. Disagreements
with quality descriptions may occur. 
 </font>Appraisal value is given at high
retail value for insurance purposes only. 
Appraisal value is subjective and may vary
from one gemologist to another.  <font color="black">Diamond
grading is subjective and may vary greatly. If
the lowest color or clarity grades we specify
are determined to be more than one grade lower
than indicated. you may return the item for a
full refund less shipping and insurance. 
It is our recommendation that the buyer
obtains insurance on this item, since they are
responsible for lost diamond.</font></font></p>
</td>
</tr>
<tr>
<td vAlign="top" width="358" height="19"> </td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="453" height="382">
<table height="759" cellSpacing="1" cellPadding="1" width="303" align="center" border="0">
<tbody>
<tr>
<td width="418" height="220"><br>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff">***************************************************************</font></td>
</tr>
</tbody>
</form>
</table>
</font>
<table height="344" width="382" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="376" background="http://www.lajd.com/images/topbk.jpg" bgColor="white" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="376" height="316">
<ul>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Jewelry
Box</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine diamond</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine 14KT GOLD</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Free
appraisal for the estimated retail
value of the item with every
purchase.</font></b></i>
<li><i><b><font face="Verdana,Arial" color="#0000ff" size="2">Items
will be shipped 5-7 days after your 
payment has been received. 
(shipping cut off time is 1:00 PM
pacific standard time)</font></b></i>
<p>Alan G. Jewelers has been
dedicated to excellent customer
satisfaction and lowest prices in
the jewelry business for nearly 20
years. We are a direct diamond
importer and all of our diamonds and
gemstones are guaranteed to appraise
for twice the amount of purchase
price. Our merchandise is being
offered on EBAY in order to provide
the same exceptional quality and
value to the general public. <font color="#ff0000">These
diamonds are all guaranteed to be
natural, with no enhancements or
treatments.</font> Our goal is to
reach the highest customer
satisfaction rate possible. We
welcome the opportunity to serve
you.<br>
</p>
<p> </p>
<p><b><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence.</font></b></li>
</ul>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="418" height="260">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH CONFIDENCE!</font></p>
<p dir="rtl" align="center"><font color="#800000" face="Verdana" size="2">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural</font></td>
</tr>
</tbody>
</table>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff"> </font></td>
</tr>
</tbody>
</form>
</font>
<tbody>
<tr>
<td vAlign="top" width="444" height="316"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="243"><!-- Begin Description -->
<!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We invite
you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:</p>
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept ELECTRONIC BANK <font color="red">Wire Transfer,</font>
and <font color="red">PAYPAL, VISA, MASTERCARD, AMEX.
DISCOVER.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA stands
for Gemological Institute of America and EGL stands for
European Gemological Laboratory. GIA and EGL
certification are prepared by a third independent party
not affiliated to Alan G Jewelers for your protection.
The certifications state the color and clarity of
diamonds greater than .50cts. They are both well
respected in the jewelry industry. If you need any more
information regarding these laboratories, you may visit
EGL at <a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;&lt;/p&gt;
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Clarity</font></b></u></font></p>
<p align="justify"><font face="Verdana" size="2">The
following table explains the diamond clarity (inside the
diamond):<br>
</font></p>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> </p>
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Color</font></b></u></font></p>
<p align="justify"> </p>
</td>
</tr>
<tr>
<td class="basic10" colSpan="2" height="394" width="823">While many
diamonds appear colorless, or white, they may actually
have subtle yellow or brown tones that can be detected
when comparing diamonds side by side. Diamonds were
formed under intense heat and pressure, and traces of
other elements may have been incorporated into their
atomic structure accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded D, are
extremely rare and very valuable. The closer a diamond
is to being colorless, the more valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond upside
down before it is set in a mounting. The first three
colors D, E, F are often called collection color. The
subtle changes in collection color are so minute that it
is difficult to identify them in the smaller sizes.
Although the presence of color makes a diamond less rare
and valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined reds,
blues, pinks, greens, and bright yellows. These are
highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</table>

</body>';
		}          
		   else if($category['id']==22)
								{
										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 5</title>
</head>

<body>

<table> <tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR SOURCE
FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            877-425-2645       /             877-4-ALANGJ      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay%20auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="653"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>
<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="1143" width="95%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="2298">
<table height="89" width="779" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="364" height="382">
<table height="236" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> ITEM
NUMBER:  {itemnumber}</td>
</tr>
<tr>
<td width="360" bgColor="#00ffff" height="18"> CERTIFICATE: 
{certificate}</td>
</tr>
<tr>
<td width="360" height="18"> METAL:     
      {metal}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> WEIGHT:    
     {weight}</td>
</tr>
<tr>
<td width="360" height="18"> CLARITY:  
             
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> COLOR:                   
{color}</td>
</tr>
<tr>
<td width="360" height="18"> MEASUREMENT OF
NECKLACE:      {measurement}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS:      
{noofdiamonds}</td>
</tr>
<tr>
<td width="360" height="18"> CONDITION: 100%
{condition}W</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> POLISH: 
{polish}</td>
</tr>
<tr bgColor="#c8c8d8">
<td width="360" bgColor="white" height="24"> TYPE
OF SETTING:  {settingtype}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> BRACELET
STYLE:  <span style="BACKGROUND-COLOR: rgb(255,0,255)">DIAMOND
BY THE YARD</span>{braceletstyle}</td>
</tr>
<tr>
<td width="360" bgColor="white" height="24"> SPACING: 
      {spacing}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="24"> TYPE
OF CLASP:  {clasptype}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> ESTIMATED
RETAIL VALUE : {retailprice}</td>
</tr>
<tr>
<td width="360" bgColor="#ffff00" height="18"> OUR
PRICE:  <font color="#ff0000">$       
  </font>& <font color="#ff0000">{ourprice}</font> <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 364px; HEIGHT: 860px" align="center">
<table height="792" width="364" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="358" height="745">*<font color="#0000ff">
Round Brilliant Diamond Necklace;   </font>
<p><font face="Verdana" size="2">This auction
is for a <font color="#008000"><i><b>BRAND NEW</b></i></font>
diamond necklace.</font></p>
<p align="left"><font face="Verdana" size="2">The
NECKLACE is made of <u><font color="#008080">14KT
GOLD</font></u>.  Also available in
yellow gold with no additional charge. 
Please indicate yellow gold in your PAYPAL
payment.</font></p>
<p align="left"><font face="Verdana" size="2">The
diamonds have excellent cut, polish and
symmetry and are simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for the
best fit for this NECKLACE.</font></p>

<p><font face="Verdana" size="2">Please email
me with your questions or comments.  You
may visit my store to find more selection of
certified <span style="BACKGROUND-COLOR: rgb(255,0,255)">GIA
& EGL diamonds</span>. A certificate
appraisal will accompany this diamond
NECKLACE.  The estimated retail value of
this NECKLACE is $4,845.00.  The highest
bidder will win this beauty.  Bid with
full confidence.</font></p>
<p><font color="#ff0000">These diamonds are
all guaranteed to be 100% natural, with no
enhancements or treatments.  All items
have been examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to the
best of our certified gemologists ability,
and are her honest opinion. Disagreements

with quality descriptions may occur. 
 </font>Appraisal value is given at high
retail value for insurance purposes only. 
Appraisal value is subjective and may vary
from one gemologist to another.  <font color="black">Diamond
grading is subjective and may vary greatly. If
the lowest color or clarity grades we specify
are determined to be more than one grade lower
than indicated. you may return the item for a
full refund less shipping and insurance. 
It is our recommendation that the buyer
obtains insurance on this item, since they are
responsible for lost diamond.</font></font></p>
</td>
</tr>
<tr>
<td vAlign="top" width="358" height="19"> </td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="453" height="382">
<table height="759" cellSpacing="1" cellPadding="1" width="303" align="center" border="0">
<tbody>
<tr>
<td width="418" height="220"><br>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff">***************************************************************</font></td>
</tr>
</tbody>
</form>
</table>
</font>
<table height="344" width="382" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="376" background="http://www.lajd.com/images/topbk.jpg" bgColor="white" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="376" height="316">
<ul>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Jewelry
Box</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine diamond</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">guaranteed
to be 100% genuine 14KT GOLD</font></b></i>
<li><i><b><font face="Verdana" color="#0000ff" size="2">Free
appraisal for the estimated retail
value of the item with every
purchase.</font></b></i>
<li><i><b><font face="Verdana,Arial" color="#0000ff" size="2">Items
will be shipped 5-7 days after your 
payment has been received. 
(shipping cut off time is 1:00 PM
pacific standard time)</font></b></i>
<p>Alan G. Jewelers has been
dedicated to excellent customer
satisfaction and lowest prices in
the jewelry business for nearly 20
years. We are a direct diamond
importer and all of our diamonds and
gemstones are guaranteed to appraise
for twice the amount of purchase
price. Our merchandise is being
offered on EBAY in order to provide
the same exceptional quality and
value to the general public. <font color="#ff0000">These
diamonds are all guaranteed to be
natural, with no enhancements or
treatments.</font> Our goal is to
reach the highest customer
satisfaction rate possible. We
welcome the opportunity to serve
you.<br>
</p>
<p> </p>
<p><b><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence.</font></b></li>
</ul>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td width="418" height="260">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH CONFIDENCE!</font></p>
<p dir="rtl" align="center"><font color="#800000" face="Verdana" size="2">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural</font></td>
</tr>
</tbody>
</table>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana,Arial,Helvetica,sans-serif" vAlign="top" width="100%"><font color="#0000ff"> </font></td>
</tr>
</tbody>
</form>
</font>
<tbody>
<tr>
<td vAlign="top" width="444" height="316"></td>

</tr>
</tbody>
</table>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="243"><!-- Begin Description -->
<!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We invite
you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:</p>
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept ELECTRONIC BANK <font color="red">Wire Transfer,</font>
and <font color="red">PAYPAL, VISA, MASTERCARD, AMEX.
DISCOVER.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
</tr>
<tr vAlign="top" align="left">
<td width="823" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA stands
for Gemological Institute of America and EGL stands for
European Gemological Laboratory. GIA and EGL
certification are prepared by a third independent party
not affiliated to Alan G Jewelers for your protection.
The certifications state the color and clarity of
diamonds greater than .50cts. They are both well
respected in the jewelry industry. If you need any more
information regarding these laboratories, you may visit
EGL at <a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;&lt;/p&gt;
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Clarity</font></b></u></font></p>
<p align="justify"><font face="Verdana" size="2">The
following table explains the diamond clarity (inside the
diamond):<br>
</font></p>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> </p>
<p class="fontblack"><font face="Verdana" size="2"><u><b><font face="Verdana" size="3">Color</font></b></u></font></p>
<p align="justify"> </p>
</td>
</tr>
<tr>
<td class="basic10" colSpan="2" height="394" width="823">While many
diamonds appear colorless, or white, they may actually
have subtle yellow or brown tones that can be detected
when comparing diamonds side by side. Diamonds were
formed under intense heat and pressure, and traces of
other elements may have been incorporated into their
atomic structure accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded D, are
extremely rare and very valuable. The closer a diamond
is to being colorless, the more valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond upside
down before it is set in a mounting. The first three
colors D, E, F are often called collection color. The
subtle changes in collection color are so minute that it
is difficult to identify them in the smaller sizes.
Although the presence of color makes a diamond less rare
and valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined reds,
blues, pinks, greens, and bright yellows. These are
highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</table>

</body>';
		}                     
		          
				              else if($category['id']==14)
								{
										$str='
<head>
<META content="Microsoft FrontPage 4.0" name=GENERATOR>
<META content=FrontPage.Editor.Document name=ProgId>
</head>

<TABLE width=598 align=center border=0>
<TBODY>
<TR>
<TD align=middle width=626>
<MARQUEE><FONT face=Verdana size=5><B>WELCOME TO DIRECT LOOSE DIAMONDS, YOUR SOURCE FOR CERTIFIED GIA & EGL DIAMONDS </B></FONT></MARQUEE> <P> <MARQUEE><FONT face=Verdana color=red size=5><B>PAY NO SALES TAX WHEN YOU PURCHASE THIS ITEM, ONLY CALIFORNIA RESIDENCE ARE SUBJECT TO 8.25% SALES TAX </B></FONT></MARQUEE>
<P>
<MARQUEE><FONT face=Verdana size=3><B> (877)425-2645</B></FONT></MARQUEE>
<MARQUEE><A href="mailto:alangjewelers@aol.com?subject=ebay auction">alangjewelers@aol.com</A></MARQUEE><BR></P> </TD></TR>
<TR>
<TD align=middle width=626> 
<IMG height=79 src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width=235 border=0><IMG height=79 src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width=235 border=0></TD></TR>
<TR>
<TD vAlign=top width=626 height=2309>
<DIV align=center>
<TABLE height=2479 width="99%" border=0>
<TBODY>
<TR>
<TD vAlign=top align=right width="99%" height=1457>
<TABLE height=1 width=625 align=center border=0>
<TBODY>
<TR vAlign=top align=left>
<TD width=252 height=1>
<TABLE height=220 cellSpacing=1 cellPadding=1 width=379 border=0>
<TBODY>
<TR>
<TD align=middle width=375 bgColor=black height=17><B><FONT face="Georgia, Times New Roman, Times, serif" color=#ffffff size=2>Information</FONT></B></TD></TR>
<TR>
<TD width=375 height=18> ITEM NUMBER: {itemnumber}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=1> METAL:{metal}</TD></TR>
<TR>
<TD width=375 bgColor=aqua height=15> ITEM INFO:{iteminfo}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> SHAPE OF DIAMONDS: {diamondshape}</TD></TR>
<TR>
<TD width=375 height=18> WEIGHT OF DIAMONDS: {diamondweight}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> CLARITY: 
{clarity}</TD></TR>
<TR>
<TD width=375 height=21> COLOR: {color}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> POLISH: {polish}</TD></TR>
<TR>
<TD width=375 height=21> SYMMETRY:{symmetry}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> CUT:{cut}</TD></TR>
<TR>
<TD width=375 height=19> MEASUREMENT: {measurement}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> NUMBER OF INDIVIDUAL DIAMONDS: 
{noofdiamonds}</TD></TR>
<TR>
<TD width=375 height=22> RING SIZE: {ringsize}</TD></TR>
<TR bgColor=#c8c8d8>
<TD width=375 bgColor=silver height=24> POLISH:{polish}</TD></TR>
<TR>
<TD width=375 height=18> DIAMOND SETTING: {diamondsetting}</TD></TR>
<TR bgColor=#c8c8d8>
<TD width=375 bgColor=silver height=24> CONDITION: {condition}</TD></TR>
<TR>
<TD width=375 height=18> ESTIMATED RETAIL VALUE : {retailprice}</TD></TR>
<TR>
<TD width=375 bgColor=yellow height=18> OUR PRICE: <FONT color=#ff0000>$ 
</FONT>{ourprice}<FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></TD></TR></TBODY></TABLE>
<DIV style="WIDTH: 338px; HEIGHT: 521px" align=center>
<TABLE height=1 width=377 border=0>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width=371 height=18><FONT color=black> *************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR>
<TR>
<TD vAlign=top width=371 height=778>*<FONT color=#0000ff>DIAMOND MEN\'S BAND: </FONT>
<P><FONT face=Verdana size=2>This auction is for a <FONT color=#008080><B><I>BRAND NEW</I></B> </FONT> MEN\'S DIAMOND BAND. 
</FONT></P>
<P align=justify><FONT face=Verdana size=2>The Diamonds are set in <FONT color=#008080><U><B>18kt WHITE GOLD</B>.</U></FONT> 
Yellow gold is available upon request at no additional charge. Upgrade to Platinum for an additional $995.00</FONT></P>
<P align=justify><FONT face=Verdana size=2>Please mention your ring size in
your paypal payment. </FONT><FONT face=Verdana size=2>Rings will be
shipped in a size 9, if ring size is not mentioned.</FONT></P>
<P align=justify><FONT face=Verdana size=2>Our diamonds have an excellent polish and symmetry and are simply incredible. They are clear and bright with exceptional brilliance and fire. The clarity is truly amazing, and this diamonds sparkle immensely, the shapes and cuts are perfect. The diamonds are gauged and measured for the best fit in this item. </FONT></P>
<P align=justify><FONT face=Verdana size=2>Please email me with your questions or comments. You may visit my store to find more selection of certified <SPAN style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA & EGL diamonds</SPAN>. The highest bidder will win this beauty. Bid with full confidence. </FONT></P>
<P><FONT color=#ff0000>These diamonds are all guaranteed to be 100% natural, with no enhancements or treatments. The gemstones are guaranteed to be 100% natural, with no enhancements or treatments. All items have been examined by a GIA gemologist.</FONT></P>
<P><font face="Arial" size="3"><FONT color=black>Descriptions of quality are inherently subjective. The quality descriptions we provide, are to the best of our certified gemologists ability, and are her honest opinion. Disagreements with quality descriptions may occur. </FONT>Appraisal value is given at high retail value for insurance purposes only. Appraisal value is subjective and may vary from one gemologist to another. 
<FONT color=black>Opinions of appraisers may vary up to 25%. Diamond grading is subjective and may vary greatly. If the lowest color or clarity grades we specify are determined to be more than one grade lower than indicated. you may return the item for a full refund less shipping and insurance. Its our recommendation that the buyer obtains an insurance for this item, since they are responsible for lost diamonds or gems.</FONT></font></P></TD></TR>
<TR>
<TD vAlign=top width=371 height=33>
<CENTER>
<P> </P></CENTER> </TD></TR></TBODY></TABLE></DIV></TD>
<TD width=365 height=1>
<TABLE height=758 cellSpacing=1 cellPadding=1 width=389 align=center border=0>
<TBODY>
<TR>
<TD width=414 height=212>
<CENTER>
<P><IMG height=298 src="http://www.alangjewelers.com/images/02209med.jpg" width=376 border=0></P></CENTER> </TD></TR>
<TR>
<TD width=414 height=259><FONT face=Verdana size=2>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<FORM name=orderform action=http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1 method=post>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width="100%"><FONT color=#0000ff>**************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR></FORM></TBODY></TABLE></FONT>
<TABLE height=482 width=354 align=center border=0>
<TBODY>
<TR>
<TD vAlign=center width=348 background=topbk.jpg bgColor=black height=20>
<P align=center><B><FONT face="Georgia, Times New Roman, Times, serif" color=white size=2>Your Free Gift</FONT></B></P></TD></TR>
<TR>
<TD vAlign=top width=348 height=454>
<UL>
<LI><FONT face=Verdana size=2>Jewelry Box </FONT>
<LI><FONT face=Verdana size=2>guaranteed to be 100% genuine diamond</FONT>
<LI><FONT face=Verdana size=2>guaranteed to be 100% genuine 18kt GOLD</FONT>
<LI><FONT face=Verdana size=2>Free appraisal for the estimated retail value of the item with every purchase. </FONT>
<LI><FONT face=Verdana,Arial color=#000000 size=2>Items will be shipped 7-10 days after payment is received. (shipping cut off time is 12:00 PM pacific standard time)</FONT>
<P>Alan G. Jewelers has been dedicated to excellent customer satisfaction and lowest prices in the jewelry business for nearly 20 years. We are a direct diamond importer and all of our diamonds and gemstones are guaranteed to appraise for twice the amount of purchase price. Our merchandise is being offered on EBAY in order to provide the same exceptional quality and value to the general public. <FONT color=#ff0000>These diamonds are all guaranteed to be natural, with no enhancements or treatments.</FONT> Our goal is to reach the highest customer satisfaction rate possible. We welcome the opportunity to serve you.<BR></FONT></B></FONT></P>
<P></P>
<P><FONT face=Verdana color=#ff0000 size=4>Please review our feedback for your Confidence. Lay away plan is available, please click here for additional information </FONT> <FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></P></LI></UL>
<P> </P></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD width=414 height=259>
<P align=center><FONT face="Arial, Helvetica, sans-serif" color=#000033 size=3><BR></FONT><FONT face=Verdana>BID WITH CONFIDENCE!</FONT> </P>
<P dir=rtl align=center><FONT face=Verdana size=2><FONT color=#800000>Alan G Jewelers Guarantees all our <BR>diamonds to be 100% natural <BR></FONT></P></FONT>
<P> </P></TD></TR>
<TR>
<TD width=414 height=259>
<CENTER>
<P><IMG height=285 src="http://www.alangjewelers.com/images/02209med.jpg" width=371 border=0></P></CENTER>
<P> </P></TD></TR></TBODY></TABLE></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=243><!-- Begin Description -->
<DIV align=center>
<CENTER> </CENTER></DIV><!-- End Description -->
<P> <U><B><FONT face=Verdana size=3>About us</FONT></B></U> </P>
<P class=text><FONT face=Verdana size=2>We invite you to read our <A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT>page to obtain information on:
<UL type=circle>
<LI>
<P class=text>Alan G Jewelers</P>
<LI>
<P class=text>Store Policy</P>
<LI>
<P class=text>Shipping </P>
<LI>
<P class=text>Return Policy</P></LI></UL>
<P class=fontblack><U><B><FONT face=Verdana size=3>Payment Information </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>We accept <FONT color=red>ELECTRONIC BANK Wire Transfer,</FONT> and
Visa, MasterCard, American Express, Discover and <FONT color=red>PAYPAL.</FONT></FONT></P>
<P align=justify> <IMG height=24 src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width=50 border=0></P>
<P align=justify></P>
<P></P></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=369> <U><B><FONT face=Verdana size=3>Helpful Information </FONT></B></U>
<P class=text><FONT face=Verdana size=2>GIA stands for Gemological Institute of America and EGL stands for European Gemological Laboratory. GIA and EGL certification are prepared by a third independent party not affiliated to Alan G Jewelers for your protection. The certifications state the color and clarity of diamonds greater than .50cts. They are both well respected in the jewelry industry. If you need any more information regarding these laboratories, you may visit EGL at <A href="http://www.eglusa.com/customerlogin.html"&gt;www.eglusa.com&lt;/A&gt; </FONT>
<P class=text><U><B><FONT face=Verdana>Satisfied Client</FONT><FONT face=Verdana size=3>\'s Letter </FONT></B></U>
<P class=text>
<DIV>dated July 13, 2004:
<P>"Alan,</P></DIV>
<DIV> </DIV>
<DIV>I received your diamond and its a beauty. Thank you so much for your patience and help, you were a dream come true and I know my future wife will appreciate the care you took.</DIV>
<DIV><BR> <BR>Jeffery Ned"</DIV><FONT face=Verdana size=2>
<P class=fontblack><U><B><FONT face=Verdana size=3>Clarity </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>The following table explains the diamond clarity (inside the diamond):<BR>
<P>
<TABLE width="80%" border=1>
<TBODY>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>IF</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI3</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I3</FONT> </TD></TR>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>FLAWLESS</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>EXTREMELY DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE UNDER 10X MAGNIFICATION </FONT></TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE TO NAKED EYE</FONT> </TD></TR></TBODY></TABLE>
<P>
<P class=fontblack><U><B><FONT face=Verdana size=3>Color </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2></FONT></P></FONT></FONT>
<TR>
<TD class=basic10 colSpan=2 height=394>While many diamonds appear colorless, or white, they may actually have subtle yellow or brown tones that can be detected when comparing diamonds side by side. Diamonds were formed under intense heat and pressure, and traces of other elements may have been incorporated into their atomic structure accounting for the variances in color. <BR><BR>Diamond color grades start at D and continue down through the alphabet. Colorless diamonds, graded D, are extremely rare and very valuable. The closer a diamond is to being colorless, the more valuable and rare it is. <BR><BR>The color of a diamond is graded with the diamond upside down before it is set in a mounting. The first three colors D, E, F are often called collection color. The subtle changes in collection color are so minute that it is difficult to identify them in the smaller sizes. Although the presence of color makes a diamond less rare and valuable, some diamonds come out of the ground in vivid "fancy" colors - well defined reds, blues, pinks, greens, and bright yellows. These are highly priced and extremely rare.<BR><BR>
<DIV align=center><IMG height=200 src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width=600> </DIV></TD></TR></TBODY></TABLE>
<DIV></DIV></TD></TR></TBODY></TABLE><!-- End Description --></DIV></TD></TR></TBODY></TABLE>
<CENTER> </CENTER>
<CENTER> </CENTER><!-- End Description -->';
		}  
		
		                                  else if($category['id']==15)
								{
										$str='
										
										<head>
<META content="Microsoft FrontPage 4.0" name=GENERATOR>
<META content=FrontPage.Editor.Document name=ProgId>
</head>

<TABLE width=598 align=center border=0>
<TBODY>
<TR>
<TD align=middle width=626>
<MARQUEE><FONT face=Verdana size=5><B>WELCOME TO DIRECT LOOSE DIAMONDS, YOUR SOURCE FOR CERTIFIED GIA & EGL DIAMONDS </B></FONT></MARQUEE> <P> <MARQUEE><FONT face=Verdana color=red size=5><B>PAY NO SALES TAX WHEN YOU PURCHASE THIS ITEM, ONLY CALIFORNIA RESIDENCE ARE SUBJECT TO 8.25% SALES TAX </B></FONT></MARQUEE>
<P>
<MARQUEE><FONT face=Verdana size=3><B> (877)425-2645</B></FONT></MARQUEE>
<MARQUEE><A href="mailto:alangjewelers@aol.com?subject=ebay auction">alangjewelers@aol.com</A></MARQUEE><BR></P> </TD></TR>
<TR>
<TD align=middle width=626> 
<IMG height=79 src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width=235 border=0><IMG height=79 src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width=235 border=0></TD></TR>
<TR>
<TD vAlign=top width=626 height=2309>
<DIV align=center>
<TABLE height=2479 width="99%" border=0>
<TBODY>
<TR>
<TD vAlign=top align=right width="99%" height=1457>
<TABLE height=1 width=625 align=center border=0>
<TBODY>
<TR vAlign=top align=left>
<TD width=252 height=1>
<TABLE height=220 cellSpacing=1 cellPadding=1 width=379 border=0>
<TBODY>
<TR>
<TD align=middle width=375 bgColor=black height=17><B><FONT face="Georgia, Times New Roman, Times, serif" color=#ffffff size=2>Information</FONT></B></TD></TR>
<TR>
<TD width=375 height=18> ITEM NUMBER: {itemnumber}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=1> METAL: {metal}</TD></TR>
<TR>
<TD width=375 bgColor=aqua height=15> ITEM INFO: {iteminfo}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> SHAPE OF DIAMONDS:{diamondshape}</TD></TR>
<TR>
<TD width=375 height=18> WEIGHT OF DIAMONDS: {diamondweight}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> CLARITY: 
{clarity}</TD></TR>
<TR>
<TD width=375 height=21> COLOR:{color}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> POLISH:{polish}</TD></TR>
<TR>
<TD width=375 height=21> SYMMETRY:{symmetry}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> CUT:{cut}</TD></TR>
<TR>
<TD width=375 height=19> MEASUREMENT: {measurement}</TD></TR>
<TR>
<TD width=375 bgColor=silver height=18> NUMBER OF INDIVIDUAL DIAMONDS: 
{noofdiamonds}</TD></TR>
<TR>
<TD width=375 height=22> RING SIZE:{ringsize}</TD></TR>
<TR bgColor=#c8c8d8>
<TD width=375 bgColor=silver height=24> POLISH:{polish}</TD></TR>
<TR>
<TD width=375 height=18> DIAMOND SETTING: {diamondsetting}</TD></TR>
<TR bgColor=#c8c8d8>
<TD width=375 bgColor=silver height=24> CONDITION:{condition}</TD></TR>
<TR>
<TD width=375 height=18> ESTIMATED RETAIL VALUE : {retailprice}</TD></TR>
<TR>
<TD width=375 bgColor=yellow height=18> OUR PRICE: <FONT color=#ff0000>$ 
</FONT>{ourprice}<FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></TD></TR></TBODY></TABLE>
<DIV style="WIDTH: 338px; HEIGHT: 521px" align=center>
<TABLE height=1 width=377 border=0>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width=371 height=18><FONT color=black> *************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR>
<TR>
<TD vAlign=top width=371 height=778>*<FONT color=#0000ff>DIAMOND MEN\'S BAND: </FONT>
<P><FONT face=Verdana size=2>This auction is for a <FONT color=#008080><B><I>BRAND NEW</I></B> </FONT> MEN\'S DIAMOND BAND. 
</FONT></P>
<P align=justify><FONT face=Verdana size=2>The Diamonds are set in <FONT color=#008080><U><B>18kt WHITE GOLD</B>.</U></FONT> 
Yellow gold is available upon request at no additional charge. Upgrade to Platinum for an additional $995.00</FONT></P>
<P align=justify><FONT face=Verdana size=2>Please mention your ring size in
your paypal payment. </FONT><FONT face=Verdana size=2>Rings will be
shipped in a size 9, if ring size is not mentioned.</FONT></P>
<P align=justify><FONT face=Verdana size=2>Our diamonds have an excellent polish and symmetry and are simply incredible. They are clear and bright with exceptional brilliance and fire. The clarity is truly amazing, and this diamonds sparkle immensely, the shapes and cuts are perfect. The diamonds are gauged and measured for the best fit in this item. </FONT></P>
<P align=justify><FONT face=Verdana size=2>Please email me with your questions or comments. You may visit my store to find more selection of certified <SPAN style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA & EGL diamonds</SPAN>. The highest bidder will win this beauty. Bid with full confidence. </FONT></P>
<P><FONT color=#ff0000>These diamonds are all guaranteed to be 100% natural, with no enhancements or treatments. The gemstones are guaranteed to be 100% natural, with no enhancements or treatments. All items have been examined by a GIA gemologist.</FONT></P>
<P><font face="Arial" size="3"><FONT color=black>Descriptions of quality are inherently subjective. The quality descriptions we provide, are to the best of our certified gemologists ability, and are her honest opinion. Disagreements with quality descriptions may occur. </FONT>Appraisal value is given at high retail value for insurance purposes only. Appraisal value is subjective and may vary from one gemologist to another. 
<FONT color=black>Opinions of appraisers may vary up to 25%. Diamond grading is subjective and may vary greatly. If the lowest color or clarity grades we specify are determined to be more than one grade lower than indicated. you may return the item for a full refund less shipping and insurance. Its our recommendation that the buyer obtains an insurance for this item, since they are responsible for lost diamonds or gems.</FONT></font></P></TD></TR>
<TR>
<TD vAlign=top width=371 height=33>
<CENTER>
<P> </P></CENTER> </TD></TR></TBODY></TABLE></DIV></TD>
<TD width=365 height=1>
<TABLE height=758 cellSpacing=1 cellPadding=1 width=389 align=center border=0>
<TBODY>
<TR>
<TD width=414 height=212>
<CENTER>
<P><IMG height=298 src="http://www.alangjewelers.com/images/02209med.jpg" width=376 border=0></P></CENTER> </TD></TR>
<TR>
<TD width=414 height=259><FONT face=Verdana size=2>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<FORM name=orderform action=http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1 method=post>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width="100%"><FONT color=#0000ff>**************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR></FORM></TBODY></TABLE></FONT>
<TABLE height=482 width=354 align=center border=0>
<TBODY>
<TR>
<TD vAlign=center width=348 background=topbk.jpg bgColor=black height=20>
<P align=center><B><FONT face="Georgia, Times New Roman, Times, serif" color=white size=2>Your Free Gift</FONT></B></P></TD></TR>
<TR>
<TD vAlign=top width=348 height=454>
<UL>
<LI><FONT face=Verdana size=2>Jewelry Box </FONT>
<LI><FONT face=Verdana size=2>guaranteed to be 100% genuine diamond</FONT>
<LI><FONT face=Verdana size=2>guaranteed to be 100% genuine 18kt GOLD</FONT>
<LI><FONT face=Verdana size=2>Free appraisal for the estimated retail value of the item with every purchase. </FONT>
<LI><FONT face=Verdana,Arial color=#000000 size=2>Items will be shipped 7-10 days after payment is received. (shipping cut off time is 12:00 PM pacific standard time)</FONT>
<P>Alan G. Jewelers has been dedicated to excellent customer satisfaction and lowest prices in the jewelry business for nearly 20 years. We are a direct diamond importer and all of our diamonds and gemstones are guaranteed to appraise for twice the amount of purchase price. Our merchandise is being offered on EBAY in order to provide the same exceptional quality and value to the general public. <FONT color=#ff0000>These diamonds are all guaranteed to be natural, with no enhancements or treatments.</FONT> Our goal is to reach the highest customer satisfaction rate possible. We welcome the opportunity to serve you.<BR></FONT></B></FONT></P>
<P></P>
<P><FONT face=Verdana color=#ff0000 size=4>Please review our feedback for your Confidence. Lay away plan is available, please click here for additional information </FONT> <FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></P></LI></UL>
<P> </P></TD></TR></TBODY></TABLE></TD></TR>
<TR>
<TD width=414 height=259>
<P align=center><FONT face="Arial, Helvetica, sans-serif" color=#000033 size=3><BR></FONT><FONT face=Verdana>BID WITH CONFIDENCE!</FONT> </P>
<P dir=rtl align=center><FONT face=Verdana size=2><FONT color=#800000>Alan G Jewelers Guarantees all our <BR>diamonds to be 100% natural <BR></FONT></P></FONT>
<P> </P></TD></TR>
<TR>
<TD width=414 height=259>
<CENTER>
<P><IMG height=285 src="http://www.alangjewelers.com/images/02209med.jpg" width=371 border=0></P></CENTER>
<P> </P></TD></TR></TBODY></TABLE></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=243><!-- Begin Description -->
<DIV align=center>
<CENTER> </CENTER></DIV><!-- End Description -->
<P> <U><B><FONT face=Verdana size=3>About us</FONT></B></U> </P>
<P class=text><FONT face=Verdana size=2>We invite you to read our <A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT>page to obtain information on:
<UL type=circle>
<LI>
<P class=text>Alan G Jewelers</P>
<LI>
<P class=text>Store Policy</P>
<LI>
<P class=text>Shipping </P>
<LI>
<P class=text>Return Policy</P></LI></UL>
<P class=fontblack><U><B><FONT face=Verdana size=3>Payment Information </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>We accept <FONT color=red>ELECTRONIC BANK Wire Transfer,</FONT> and
Visa, MasterCard, American Express, Discover and <FONT color=red>PAYPAL.</FONT></FONT></P>
<P align=justify> <IMG height=24 src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width=50 border=0></P>
<P align=justify></P>
<P></P></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=369> <U><B><FONT face=Verdana size=3>Helpful Information </FONT></B></U>
<P class=text><FONT face=Verdana size=2>GIA stands for Gemological Institute of America and EGL stands for European Gemological Laboratory. GIA and EGL certification are prepared by a third independent party not affiliated to Alan G Jewelers for your protection. The certifications state the color and clarity of diamonds greater than .50cts. They are both well respected in the jewelry industry. If you need any more information regarding these laboratories, you may visit EGL at <A href="http://www.eglusa.com/customerlogin.html"&gt;www.eglusa.com&lt;/A&gt; </FONT>
<P class=text><U><B><FONT face=Verdana>Satisfied Client</FONT><FONT face=Verdana size=3>\'s Letter </FONT></B></U>
<P class=text>
<DIV>dated July 13, 2004:
<P>"Alan,</P></DIV>
<DIV> </DIV>
<DIV>I received your diamond and its a beauty. Thank you so much for your patience and help, you were a dream come true and I know my future wife will appreciate the care you took.</DIV>
<DIV><BR> <BR>Jeffery Ned"</DIV><FONT face=Verdana size=2>
<P class=fontblack><U><B><FONT face=Verdana size=3>Clarity </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>The following table explains the diamond clarity (inside the diamond):<BR>
<P>
<TABLE width="80%" border=1>
<TBODY>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>IF</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI3</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I3</FONT> </TD></TR>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>FLAWLESS</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>EXTREMELY DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE UNDER 10X MAGNIFICATION </FONT></TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE TO NAKED EYE</FONT> </TD></TR></TBODY></TABLE>
<P>
<P class=fontblack><U><B><FONT face=Verdana size=3>Color </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2></FONT></P></FONT></FONT>
<TR>
<TD class=basic10 colSpan=2 height=394>While many diamonds appear colorless, or white, they may actually have subtle yellow or brown tones that can be detected when comparing diamonds side by side. Diamonds were formed under intense heat and pressure, and traces of other elements may have been incorporated into their atomic structure accounting for the variances in color. <BR><BR>Diamond color grades start at D and continue down through the alphabet. Colorless diamonds, graded D, are extremely rare and very valuable. The closer a diamond is to being colorless, the more valuable and rare it is. <BR><BR>The color of a diamond is graded with the diamond upside down before it is set in a mounting. The first three colors D, E, F are often called collection color. The subtle changes in collection color are so minute that it is difficult to identify them in the smaller sizes. Although the presence of color makes a diamond less rare and valuable, some diamonds come out of the ground in vivid "fancy" colors - well defined reds, blues, pinks, greens, and bright yellows. These are highly priced and extremely rare.<BR><BR>
<DIV align=center><IMG height=200 src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width=600> </DIV></TD></TR></TBODY></TABLE>
<DIV></DIV></TD></TR></TBODY></TABLE><!-- End Description --></DIV></TD></TR></TBODY></TABLE>
<CENTER> </CENTER>
<CENTER> </CENTER><!-- End Description -->';
		}  
		
		            else if($category['id']==17)
								{
										$str='

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 2</title>
</head>

<body>

<div id="EBdescription"> <table width="598" align="center" border="0">
<tbody>
<tr>
<td align="middle" width="626">
<marquee><font face="Verdana" size="5"><b>WELCOME TO ALAN G, YOUR
SOURCE FOR CERTIFIED GIA & EGL DIAMONDS</b></font></marquee>
<p>
<marquee><font face="Verdana" size="3"><b>                             
            (877)425-2645       /             (213)623-1456      </b></font></marquee>
<marquee><a href="mailto:alangjewelers@aol.com?subject=ebay auction" target="_blank">alangjewelers@aol.com</a></marquee>
<br>
</p>
 </td>
</tr>
<tr>
<td align="middle" width="641"> <img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87">                            
<img src="http://www.directloosediamonds.com/images/directloose_logo.jpg" width="260" height="87"></td>
</tr>

<tr>
<td vAlign="top" width="626" height="2309">
<div align="center">
<table height="2479" width="99%" border="0">
<tbody>
<tr>
<td vAlign="top" align="right" width="99%" height="1457">
<table height="1" width="625" align="center" border="0">
<tbody>
<tr vAlign="top" align="left">
<td width="252" height="1">
<table height="218" cellSpacing="1" cellPadding="1" width="364" border="0">
<tbody>
<tr>
<td align="middle" width="360" bgColor="black" height="17"><b><font face="Georgia, Times New Roman, Times, serif" color="#ffffff" size="2">Information</font></b></td>
</tr>
<tr>
<td width="360" height="18">  ITEM
NUMBER: {itemnumber} </td>
</tr>
<tr>
<td width="360" bgColor="silver" height="1"> METAL:  
    {metal}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="15"> WEIGHT
OF METAL:   {metalweight}</td>
</tr>
<tr>
<td width="360" bgColor="aqua" height="15"> ITEM
INFO:  {iteminfo}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> SHAPE
OF DIAMONDS: {diamondshape}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> WEIGHT
OF DIAMONDS:     {diamondweight}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> CLARITY:  
      
{clarity}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> COLOR:            
{color}</td>
</tr>
<tr>
<td width="360" bgColor="silver" height="18"> NUMBER
OF DIAMONDS: {noofdiamonds}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> DIAMOND
SETTING:  {diamondsetting}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="18"> WIDTH
OF ITEM:      
{widthofitem}</td>
</tr>
<tr>
<td width="360" bgColor="#ffffff" height="18"> POLISH: 
{polish}</td>
</tr>
<tr>
<td width="360" bgColor="#c0c0c0" height="22">  CONDITION: 
{condition}</td>
</tr>
<tr>
<td width="360" height="22">ESTIMATED
RETAIL VALUE :  {retailprice}</td>
</tr>

<tr>
<td width="360" bgColor="yellow" height="18"> Our
Price:  <b><font color="#ff0000">$</font></b>{ourprice}<font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></td>
</tr>
</tbody>
</table>
<div style="WIDTH: 365px; HEIGHT: 838px" align="center">
<table height="831" width="365" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="359" height="16"><font color="black"> *************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="788">*<font color="#0000ff">Natural
Diamonds ;      </font>
<p><font face="Verdana" size="2">This
auction is for a <font color="#008080"><b><i>BRAND
NEW</i></b> </font>diamond<font color="#008080">
</font>ladies\' Diamond Solitaire pendant. </font></p>
<p align="justify"><font face="Verdana" size="2">These
diamonds are all natural with out any
enhancements or treatments.  </font></p>
<p align="justify"><font face="Verdana" size="2">The
BAND is made of <u><font color="#008080"><b>14KT
GOLD</b>.</font></u> Also available
in Yellow Gold at no additional charge,
18KT GOLD for an additional $295.00 and
PLATINUM for an additional $595.00.</font></p>
<p align="justify"><font face="Verdana" size="2">The
diamonds have excellent polish and
symmetry and is simply incredible. 
They are clear and bright with exceptional
brilliance and fire.  The clarity is
truly amazing, and this diamonds sparkle
immensely the shape and cut are perfect. 
The diamonds are gauged and measured for
the best fit in the band.</font></p>
<p align="justify"><font face="Verdana" size="2">Please
email me with your questions or comments. 
You may visit my store to find more
selection of certified <span style="BACKGROUND-COLOR: #ff00ff; TEXT-DECORATION: underline">GIA
& EGL diamonds</span>.  The
highest bidder will win this beauty. 
Bid with full confidence.</font></p>
<p><font color="#ff0000">These diamonds
are all guaranteed to be 100% natural,
with no enhancements or treatments. 
The gemstones are  guaranteed to be
100% natural, with no enhancements or
treatments.  All items have been
examined by a GIA gemologist.</font></p>
<p><font face="Arial" size="2"><font color="black">Descriptions
of quality are inherently subjective. The
quality descriptions we provide, are to
the best of our certified gemologists ability,
and are her honest opinion.
Disagreements with quality descriptions
may occur.   </font>Appraisal
value is given at high retail value for
insurance purposes only.  Appraisal
value is subjective and may vary from one
gemologist to another.  <font face="Arial" color="black" size="1">Opinions
of appraisers may vary up to 25%. Diamond
grading is subjective and may vary
greatly. If the lowest color or clarity
grades we specify are determined to be
more than one grade lower than indicated.
you may return the item for a full refund
less shipping and insurance.  It is
our recommendation that the buyer obtains
insurance for this item, since we are not
responsible for lost diamonds or gems.</font></font></p>
<font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<form name="orderform" action="http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1" method="post" target="_blank">
<tbody>
</tbody>
</table>
</font></td>
</tr>
<tr>
<td vAlign="top" width="359" height="15"></td>
</tr>
</tbody>
</table>
</div>
</td>
<td width="365" height="1">
<table height="758" cellSpacing="1" cellPadding="1" width="389" align="center" border="0">
<tbody>
<tr>
<td width="414" height="212"><font face="Verdana" size="2">
<table cellSpacing="0" cellPadding="0" width="100%" border="0">
<tbody>
<tr>
<td style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign="top" width="100%"><font color="#0000ff">**************************************************</font><font face="Verdana" size="2"> </font></td>
</tr>
</FORM>
</tbody>
</table>
</font>
<table height="453" width="354" align="center" border="0">
<tbody>
<tr>
<td vAlign="center" width="348" background="http://vi.ebaydesc.com/ws/topbk.jpg" bgColor="black" height="20">
<p align="center"><b><font face="Georgia, Times New Roman, Times, serif" color="white" size="2">Your
Free Gift</font></b></p>
</td>
</tr>
<tr>
<td vAlign="top" width="348" height="425">
<ul>
<li><font face="Verdana" size="2">Jewelry
Box</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine diamond</font>
<li><font face="Verdana" size="2">guaranteed
to be 100% genuine 14KT GOLD</font>
<li><font face="Verdana" size="2">Free
appraisal for the estimated
retail value of the item with
every purchase.</font>
<li><font face="Verdana,Arial" color="#000000" size="2">Items
will be shipped up to 10 days
after the payment has been
received.  (shipping cut
off time is 1:00 PM pacific
standard time)</font>
<p>Alan G. Jewelers has been
dedicated to excellent
customer satisfaction and
lowest prices in the jewelry
business for nearly 20 years.
We are a direct diamond
importer and all of our
diamonds and gemstones are
guaranteed to appraise for
twice the amount of purchase
price. Our merchandise is
being offered on EBAY in order
to provide the same
exceptional quality and value
to the general public. <font color="#ff0000">These
diamonds are all guaranteed to
be natural, with no
enhancements or treatments.</font>
Our goal is to reach the
highest customer satisfaction
rate possible. We welcome the
opportunity to serve you.<br>
</p>
<p> </p>
<p><font face="Verdana" color="#ff0000" size="4">Please
review our feedback for your
Confidence </font> <font face="Arial" size="2"><a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8"></a></font></p>
</li>
</ul>
<p> </p>
</td>
</tr>
</tbody>
</table>
 </td>
</tr>
<tr>
<td width="414" height="259">
<p align="center"><font face="Arial, Helvetica, sans-serif" color="#000033" size="3"><br>
</font><font face="Verdana">BID WITH
CONFIDENCE!</font></p>
<p align="center"><i><b><font color="#008080" size="5">1200
+ Positive Feedbacks</font></b></i></p>
<p dir="rtl" align="center"><font face="Verdana" size="2"><font color="#800000">Alan
G Jewelers Guarantees all our<br>
diamonds to be 100% natural<br>
</font></p>
</font></td>
</tr>
</tbody>
</table>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="243"><!-- End Description -->
<p> <u><b><font face="Verdana" size="3">About
us</font></b></u></p>
<p class="text"><font face="Verdana" size="2">We
invite you to read our <a href="http://members.ebay.com/aboutme/alan-g-jewelers/" target="_blank"><img src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" border="0" width="23" height="8">
</a></font>page to obtain information on:
<ul type="circle">
<li>
<p class="text">Alan G Jewelers</p>
<li>
<p class="text">Store Policy</p>
<li>
<p class="text">Shipping</p>
<li>
<p class="text">Return Policy</p>
</li>
</ul>
<p class="fontblack"><u><b><font face="Verdana" size="3">Payment
Information</font></b></u></p>
<p align="justify"><font face="Verdana" size="2">We
accept <font color="red"> Electronic Bank
Wire Transfer</font> and <font color="red">PAYPAL,
VISA, MASTERCARD, DISCOVER, AND AMEX.</font></font></p>
<p align="justify"> <img height="24" src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width="50" border="0"></p>
<p align="justify"> </p>
<p> </p>
</td>
<tr vAlign="top" align="left">
<td width="617" colSpan="2" height="369"> <u><b><font face="Verdana" size="3">Helpful
Information</font></b></u>
<p class="text"><font face="Verdana" size="2">GIA
stands for Gemological Institute of America and
EGL stands for European Gemological Laboratory.
GIA and EGL certification are prepared by a third
independent party not affiliated to Alan G
Jewelers for your protection. The certifications
state the color and clarity of diamonds greater
than .50cts. They are both well respected in the
jewelry industry. If you need any more information
regarding these laboratories, you may visit EGL at
<a href="http://www.eglusa.com/customerlogin.html" target="_blank">www.eglusa.com&lt;/a&gt;&lt;/font&gt;
<p class="text"><u><b><font face="Verdana">Satisfied
Client</font><font face="Verdana" size="3">\'s
Letter</font></b></u>
<p class="text"> 
<div>
dated July 13, 2004:
<p>"Alan,</p>
</div>
<div>
 
</div>
<div>
I received your diamond and its a beauty. 
Thank you so much for your patience and help,
you were a dream come true and I know my future
wife will appreciate the care you took.
</div>
<div>
<br>
 <br>
Jeffery Ned"
</div>
<font face="Verdana" size="2">
<p class="fontblack"><u><b><font face="Verdana" size="3">Clarity</font></b></u></p>
<p align="justify">The following table explains
the diamond clarity (inside the diamond):<br>
<p> 
<table width="80%" border="1">
<tbody>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">IF</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VVS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">VS2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">SI3</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I1</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I2</font></td>
<td align="middle"><font face="Arial" color="#586479" size="1">I3</font></td>
</tr>
<tr>
<td align="middle"><font face="Arial" color="#586479" size="1">FLAWLESS</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">EXTREMELY
DIFFICULT TO SEE INCLUSIONS UNDER 10x
MAGNIFICATION</font></td>
<td align="middle" colSpan="2"><font face="Arial" color="#586479" size="1">DIFFICULT
TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE UNDER 10X MAGNIFICATION</font></td>
<td align="middle" colSpan="3"><font face="Arial" color="#586479" size="1">INCLUSIONS
VISIBLE TO NAKED EYE</font></td>
</tr>
</tbody>
</table>
<p> 
<p class="fontblack"><u><b><font face="Verdana" size="3">Color</font></b></u></p>
<p align="justify"> </p>
</font>
<tr>
<td class="basic10" colSpan="2" height="394">While
many diamonds appear colorless, or white, they may
actually have subtle yellow or brown tones that
can be detected when comparing diamonds side by
side. Diamonds were formed under intense heat and
pressure, and traces of other elements may have
been incorporated into their atomic structure
accounting for the variances in color.<br>
<br>
Diamond color grades start at D and continue down
through the alphabet. Colorless diamonds, graded
D, are extremely rare and very valuable. The
closer a diamond is to being colorless, the more
valuable and rare it is.<br>
<br>
The color of a diamond is graded with the diamond
upside down before it is set in a mounting. The
first three colors D, E, F are often called
collection color. The subtle changes in collection
color are so minute that it is difficult to
identify them in the smaller sizes. Although the
presence of color makes a diamond less rare and
valuable, some diamonds come out of the ground in
vivid "fancy" colors - well defined
reds, blues, pinks, greens, and bright yellows.
These are highly priced and extremely rare.<br>
<br>
<div align="center">
<img height="200" src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width="600">
</div>
</td>
</tr>
</tbody>
</table>
<div>
</div>
</td>
</tr>
</tbody>
</table>
<!-- End Description -->
</div>
</td>
</tr>
<tr>
<td vAlign="top" align="middle"></td>
</tr>
</tbody>
</table>
  <!-- End Description -->
<br>
<br>
<!-- End Description -->
</div>

</body>

</html>
';
		}  
		             else if($category['id']==16)
								{
										$str='
										<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>New Page 12</title>
<META content=FrontPage.Editor.Document name=ProgId><!-- Begin Description --> <!-- Begin Description --><META content="Microsoft FrontPage 4.0" name=GENERATOR>
<META content=FrontPage.Editor.Document name=ProgId>
</head>

<body onload="init();ebHelpContextualRebrand(\'buy\');" rightmargin="0" topmargin="0" leftmargin="0" bottommargin="0" marginheight="0" marginwidth="0">

<br><!-- ST_SEAL_HTML_END -->

<TABLE width=598 align=center border=0>
<TBODY>
<TR>
<TD align=middle width=626>
<MARQUEE><FONT face=Verdana size=5><B>WELCOME TO ALAN G, YOUR SOURCE FOR
CERTIFIED GIA & EGL DIAMONDS </B></FONT></MARQUEE>
<P>
<MARQUEE><FONT face=Verdana size=3><B>             (877)425-2645       / (213)623-1456</B></FONT></MARQUEE>
<MARQUEE><A href="mailto:alangjewelers@aol.com?subject=ebay auction">alangjewelers@aol.com</A></MARQUEE><BR></P> </TD></TR>
<TR>
<TD align=middle width=626><IMG height=99 src="http://www.alangjewelers.com/images/upperbar02.jpg" width=900 border=0></TD></TR>
<TR>
<TD vAlign=top width=626 height=2309>
<DIV align=center>
<TABLE height=2479 width="100%" border=0>
<TBODY>

<TR>
<TD vAlign=top align=right width="99%" height=1457>
<TABLE height=638 width=625 align=center border=0>
<TBODY>
<TR vAlign=top align=left>
<TD width=252 height=931>
<TABLE height=1 cellSpacing=1 cellPadding=1 width=364 border=0>
<TBODY>
<TR>
<TD align=middle width=360 bgColor=black height=17><B><FONT face="Georgia, Times New Roman, Times, serif" color=#ffffff size=2>Information</FONT></B></TD></TR>
<TR>
<TD width=360 height=10> ITEM NUMBER: {itemnumber}</TD></TR>
<TR>
<TD width=360 bgColor=silver height=2> METAL:{metal} </TD></TR>
<TR>
<TD width=360 bgColor=aqua height=16> ITEM INFO: {iteminfo}</TD></TR>
<TR>
<TD width=360 height=18> SHAPE OF DIAMOND:{diamondshape}</TD></TR>
<TR>
<TD width=360 bgColor=silver height=15> WEIGHT OF DIAMOND: {diamondweight}</TD></TR>
<TR>
<TD width=360 height=21> MEASUREMENT:{measurement}</TD></TR>

<TR>
<TD width=360 bgColor=silver height=19> CLARITY: {clarity}</TD></TR>
<TR>
<TD width=360 height=18> COLOR:{color}</TD></TR>
<TR>
<TD width=360 bgColor=silver height=15> DEPTH: {depth}</TD></TR>
<TR>
<TD width=360 height=21> TABLE:{table}</TD></TR>
<TR>
<TD width=360 bgColor=silver height=18> POLISH:{polish}</TD></TR>
<TR>
<TD width=360 height=21> SYMMETRY:{symmetry} </TD></TR>
<TR>
<TD width=360 bgColor=silver height=15> FLUORESCENCE: {flourescence}</TD></TR>
<TR>
<TD width=360 height=21> CUT:{cut}</TD></TR>
<TR>
<TD width=360 bgColor=silver height=18> STYLE OF RING:{styleofring}</TD></TR>
<TR>
<TD width=360 height=21> DIAMOND QUANTITY:{diamondquality}</TD></TR>
<TR>
<TD width=360 bgColor=silver height=19> RING SIZE:{ringsize}</TD></TR>
<TR>
<TD width=360 bgColor=#ffffff height=18> WIDTH OF BAND:{bandwidth}</TD></TR>
<TR>
<TD width=360 bgColor=silver height=18> DIAMOND SETTING: {diamondsetting}</TD></TR>
<TR>
<TD width=360 height=22> CONDITION:{condition} </TD></TR>
<TR bgColor=#c8c8d8>
<TD width=360 bgColor=silver height=24> ESTIMATED RETAIL VALUE :{retailprice}</TD></TR>
<TR>
<TD width=360 bgColor=yellow height=18> Our Price: <FONT color=#ff0000>$3,270.00</FONT>{ourprice}<FONT face=Arial size=2><A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT></TD></TR></TBODY></TABLE>
<DIV style="WIDTH: 365px; HEIGHT: 830px" align=center>
<TABLE height=1 width=365 border=0>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width=359><FONT color=black> *************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR>
<TR>
<TD vAlign=top width=359 height=289><FONT color=#0000ff> </FONT><P align=justify><FONT face=Verdana size=2>This auction is for a <FONT color=#008080><B><I>
BRAND NEW</I></B> </FONT>
SOLITAIRE diamond ladies\' engagement ring. </FONT></P>
<P align=justify><font face="Verdana" size="2">The copy of the original certificate will be
mailed with the diamond upon purchase. The original will be mailed after
buyer has left feedback. </font></P>
<P align=justify><FONT face=Verdana size=2>The RING is made of <U><FONT color=#008080><B>14kt white gold</B>.</FONT></U> 
14kt Yellow Gold available with no additional charge. Upgrade to Platinum
950 for additional $495.00. All rings are shipped in size 6 if sizing is
not indicated in your PAYPAL payment. Please indicate your ring size in PAYPAL
Payment. </FONT></P>
<P align=justify><FONT face=Verdana size=2>The diamond has an excellent polish 
and symmetry and is simply incredible. It is clear and bright with 
exceptional brilliance and fire. The clarity is truly amazing, and it sparkles immensely. </FONT></P>
<P align=justify><FONT face=Verdana size=2>Please email me with your questions or
comments before you bid on any item. Look for our auctions on Ebay. We
offer a huge selection of certified <SPAN style="text-decoration: underline">GIA & EGL diamonds</SPAN>. The highest bidder will win this beauty. Bid with full confidence. </FONT></P>
<P><FONT color=#ff0000>These diamonds are all guaranteed to be 100% natural, with no enhancements or treatments. The gemstones are guaranteed to be 100% natural, with no enhancements or treatments. All items have been examined by a GIA gemologist.</FONT></P>
<P><font face="Arial" size="2"><FONT color=black>Descriptions of quality are inherently subjective. The quality descriptions we provide, are to the best of our certified gemologists ability, and are her honest opinion. Disagreements with quality descriptions may occur. 
</FONT>Appraisal value is given at high retail value for insurance purposes only. Appraisal value is subjective and may vary from one gemologist to another. 
<FONT face=Arial color=black size=1>Opinions of appraisers may vary up to 25%. Diamond grading is subjective and may vary greatly. If the lowest color or clarity grades we specify are determined to be more than one grade lower than indicated. you may return the item for a full refund less shipping and insurance. 
Buyer is responsible for lost diamonds or gems after purchase. GIA &
EGL diamonds are independently certified and graded based on the companies
standard of grading diamonds. Alan G is not responsible for diamond
grading by EGL or GIA.</FONT></font></P></TD></TR></TBODY></TABLE></DIV></TD>
<TD width=365 height=931>
<TABLE height=554 cellSpacing=1 cellPadding=1 width=389 align=center border=0>
<TBODY>
<TR>
<TD width=414 height=212><IMG height=325 src="http://www.alangjewelers.com/images/RBC-SOL109.jpg" width=400></TD></TR>
<TR>
<TD width=414 height=55><FONT face=Verdana size=2>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<FORM name=orderform action=http://www.ewebcart.com/cgi-bin/cart.pl?add_items=1 method=post>
<TBODY>
<TR>
<TD style="FONT-SIZE: 11px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" vAlign=top width="100%"><FONT color=#0000ff>*********************************************************</FONT><FONT face=Verdana size=2> </FONT></TD></TR></FORM></TBODY></TABLE></FONT>
<TABLE height=557 width=394 align=center border=0>
<TBODY>
<TR>
<TD vAlign=center width=388 background=topbk.jpg bgColor=black height=20>
<P align=center><B><FONT face="Georgia, Times New Roman, Times, serif" color=white size=2>Your Free Gift</FONT></B></P></TD></TR>
<TR>
<TD vAlign=top width=388 height=529>
<UL>
<LI><FONT face=Verdana color=#0000ff size=2>Jewelry Box </FONT></LI>
<LI><FONT face=Verdana color=#0000ff size=2>Guaranteed to be 100% genuine diamond</FONT></LI>
<LI><FONT face=Verdana color=#0000ff size=2>Guaranteed to be 100% genuine 14kt GOLD</FONT></LI>
<LI><FONT face=Verdana color=#0000ff size=2>Free appraisal for the high estimated retail value of the item with every purchase. 
(Appraisal is for insurance purposes only. Please do not make a buying
decision based on any one\'s appraisal price.)</FONT></LI>
<LI><FONT face=Verdana,Arial color=#0000ff size=2>Items will be shipped 3 - 5 days
after your payment is received. (shipping cut off time is 1:00 PM pacific standard time)</FONT>
<P>Alan G. Jewelers has been dedicated to excellent customer satisfaction and lowest prices in the jewelry business for nearly
25 years. We are a direct diamond importer and all of our diamonds and gemstones are guaranteed to appraise for twice the amount of purchase price. Our merchandise is being offered on EBAY in order to provide the same exceptional quality and value to the general public. <FONT color=#ff0000>These diamonds are all guaranteed to be natural, with no enhancements or treatments.</FONT> Our goal is to reach the highest customer satisfaction rate possible. We welcome the opportunity to serve you.</P>
<P><FONT face=Verdana color=#ff0000 size=4>Please review our feedback for your Confidence. </FONT></P>
<P><font face="Verdana" size="4" color="#FF0000">WE GUARANTEE ALL OUR DIAMONDS
TO APPRAISE HIGHER THAN YOUR PURCHASE PRICE.</font></P>
<P> </P>
<P align=center><FONT face=Verdana>BID WITH CONFIDENCE!</FONT> </P>
<P align=center><I><B><FONT color=#008080 size=5>PLATINUM POWER SELLER</FONT></B></I></P>
<P dir=rtl align=center><FONT color=#800000>Alan G Jewelers Guarantees all our <BR>diamonds to be 100% natural</FONT></P>
<P> </P></LI></UL></TD></TR></TBODY></TABLE>
</TD></TR></TBODY></TABLE></TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=243>
<!-- End Description -->
<P> <U><B><FONT face=Verdana size=3>About us</FONT></B></U> </P>
<P class=text><FONT face=Verdana size=2>We invite you to read our <A href="http://members.ebay.com/aboutme/alan-g-jewelers/" target=_blank><IMG height=8 src="http://pics.ebaystatic.com/aw/pics/aboutme-small.gif" width=23 border=0> </A></FONT>page to obtain information on:
<UL type=circle>
<LI>
<P class=text>Alan G Jewelers</P></LI>
<LI>
<P class=text>Store Policy</P></LI>
<LI>
<P class=text>Shipping </P></LI>
<LI>
<P class=text>Return Policy</P></LI></UL>
<P class=fontblack><U><B><FONT face=Verdana size=3>Payment Information </FONT></B></U></P>
<P align=justify><FONT face=Verdana size=2>We accept <font color="#FF0000"> ELECTRONIC BANK
WIRE TRANSFER, PAYPAL, VISA, MASTERCARD, DISCOVER, AND AMEX</font></FONT></P>
<P align=justify> <IMG height=24 src="http://pics.ebaystatic.com/aw/pics/paypal/iconEcheck.gif" width=50 border=0></P>
<P class=fontblack><u><b><font face="Verdana" size="3">Feedback Information</font></b></u></P>
<p align="justify">Please read our return policy detailed in our store. 
Contact us if you are not happy with your purchase before leaving any negative
feedback. We have been in business for over 25 years and will be glad to
resolve any issues.</p>
<p align="justify"> </TD>
<TR vAlign=top align=left>
<TD width=617 colSpan=2 height=369> <U><B><FONT face=Verdana size=3>Helpful Information </FONT></B></U>
<P class=text><FONT face=Verdana size=2>GIA stands for Gemological Institute of America and EGL stands for European Gemological Laboratory. GIA and EGL certification are prepared by a third independent party not affiliated to Alan G Jewelers for your protection. The certifications state the color and clarity of diamonds greater than .50cts. They are both well respected in the jewelry industry. If you need any more information regarding these laboratories, you may visit EGL at <A href="http://www.eglusa.com/customerlogin.html"&gt;www.eglusa.com&lt;/A&gt;. </FONT>
<P class=text><U><B><FONT face=Verdana>Satisfied Clients</FONT></B></U>
<P class=text>Please read our feedback to obtain positive feedback from our clients. If you have any questions, please do not hesitate to contact our office or email.<FONT face=Verdana size=2>
<P class=fontblack><U><B><FONT face=Verdana size=3>Clarity </FONT></B></U></P>
<P align=justify>The following table explains the diamond clarity (inside the diamond):<BR>
<P>
<TABLE width="80%" border=1>
<TBODY>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>IF</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VVS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>VS2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>SI3</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I1</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I2</FONT> </TD>
<TD align=middle><FONT face=Arial color=#586479 size=1>I3</FONT> </TD></TR>
<TR>
<TD align=middle><FONT face=Arial color=#586479 size=1>FLAWLESS</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>EXTREMELY DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=2><FONT face=Arial color=#586479 size=1>DIFFICULT TO SEE INCLUSIONS UNDER 10x MAGNIFICATION</FONT> </TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE UNDER 10X MAGNIFICATION </FONT></TD>
<TD align=middle colSpan=3><FONT face=Arial color=#586479 size=1>INCLUSIONS VISIBLE TO NAKED EYE</FONT> </TD></TR></TBODY></TABLE>
<P class=fontblack> </P>
</FONT>
<TR>
<TD class=basic10 colSpan=2 height=394><FONT face=Verdana size=2><U><B><FONT face=Verdana size=3>Color </FONT></B></U></FONT>
<p>While many diamonds appear colorless, or white, they may actually have subtle yellow or brown tones that can be detected when comparing diamonds side by side. Diamonds were formed under intense heat and pressure, and traces of other elements may have been incorporated into their atomic structure accounting for the variances in color. <BR><BR>Diamond color grades start at D and continue down through the alphabet. Colorless diamonds, graded D, are extremely rare and very valuable. The closer a diamond is to being colorless, the more valuable and rare it is. <BR><BR>The color of a diamond is graded with the diamond upside down before it is set in a mounting. The first three colors D, E, F are often called collection color. The subtle changes in collection color are so minute that it is difficult to identify them in the smaller sizes. Although the presence of color makes a diamond less rare and valuable, some diamonds come out of the ground in vivid "fancy" colors - well defined reds, blues, pinks, greens, and bright yellows. These are highly priced and extremely rare.<BR><BR>
</p>
<DIV align=center><IMG height=200 src="http://www.alangjewelers.com/images/Color/Color_Profile.jpg" width=600> </DIV></TD></TR></TBODY></TABLE>
<DIV></DIV></TD></TR></TBODY></TABLE><!-- End Description --></DIV></TD></TR>

<BR />
</body>';
		}
		
		
		
		

									$field	= '<select name="'.$value['field'].'">';
									$field	.= '<option value="'.$category['id'].'">'.$category['category_label'].'</option>';
									$field	.= '</select>';
								break;
								case 'file' :
									$field	= '<input type="file" name="'.$value['field'].'"  />';
									if($details[$value['field']] != '') {
										$link = config_item('base_url').$details[$value['field']];
										$field	.=  "<a class=\"blue\"  href='".$link."' target='_blank' >Click Here to View</a>";
									} 
								break;
								case 'textarea' :
							
								
								
									$field	= '<textarea name="'.$value['field'].'" style="width: 400px;height: 60px;">'.$details[$value['field']].'</textarea>';
							
								break;
								case 'checkbox' :
									if ($details[$value['field']] == 1)
										$field	= '<input type="checkbox" name="'.$value['field'].'" value="1" checked />';
									else
										$field	= '<input type="checkbox" name="'.$value['field'].'" value="1"  />';
									
								break;
						   } 
							echo $field.'</div><div class="clear"></div>';
							
						}
						 ?>
                       
                       
							<table 	 border="0" align="left" width="100%"/>
                             
						  <!-- <tr>
							<td colspan="2"> 
								<table width="100%"><tr><td valign="top">
												<fieldset style="background: #fff;">
												<legend>Small Image ( 80 x 80 px)</legend>
													<center>
												 <?php  {
												  
												    	if(file_exists(config_item('base_path').'images/watches/'.$small_img) && $small_img !='')echo '<img width="120" height="120" src="'.config_item('base_url').'images/watches/'.$small_img.'" style="width: 80px; height: 80px;"><br />';
												    	else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
												    	echo '<small>Upload new image will replace the old image</small><br />'; 
												    }   
												 ?>
													<input type="file" name="image_small" id="file1" value=""  /> 
													</center>
												</fieldset>	
											</td>
										<td>
												<fieldset style="background: #fff;">
												<legend>Big Image( 80 x 80 px)</legend>
													<center>
												 <?php  {
												  
												    	if(file_exists(config_item('base_path').'images/rings/carat'.$carat_image) && $carat_image !='')echo '<img src="'.config_item('base_url').'images/rings/carat'.$carat_image.'" style="width: 80px; height: 80px;"><br />';
												    	else echo '<img src="'.config_item('base_url').'images/rings/noringimage.png" style="width: 80px; height: 80px;"><br />';
												    	echo '<small>Upload new image will replace the old image</small><br />'; 
												    }   
												 ?>
													<input type="file" name="big_image" id="big_image" value=""  /> 
													</center>
												</fieldset>	
										</td>
									  </tr>
							  		</table>
							  </td></tr>
							   -->
							  
							   <tr>
                              	
							  <td></td><td><br>
                                
                                
							   <input type="submit"  name="<?=$action;?>btn" value="<?=ucfirst($action);?>" class="adminbutton"  /> <a href="<?php echo config_item('base_url')?>admin/rolex" class="adminbutton"> Cancel</a>
										 
							  </td>
							  </tr>
							</table>
							 
						</form>
					</div>
			</div>
			<?php }else{?>
		 
			<div>
					<table id="results" style="display:none; "></table>
			</div>
		<?php }?>
</div>
 

 
