<div id="" class="earingSearch">
	<div class="bread-crumb">
		<div class="breakcrum_bk">
			<ul>
				<li><a href="<?php echo config_item('base_url')?>">Home</a></li>
				<li><a href="#">Diamonds</a></li>
				<li>Create Your Own Earrings</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div class="">
		<br><br>
		<div class="earing_headrow row-fluid">
			<div class="headleft col-sm-6">
				<div class="leftSbhead">Personalize Your <br>Earrings</div>
				<div class="leftsbdesc">Select your favorite setting and diamond pair to create <br>your ideal diamond earings.</div>
			</div>
			<div class="headright col-sm-6"><img src="<?php echo config_item('base_url')?>img/page_img/down_pd10.jpg" alt="Design Your Own Earrings" /></div>
		</div>
		<div class="clear"></div><br><br><br><br>
		<div class="creatEarrings">Create Your own diamond earrings</div><br><br><br>
		<div class="earingBoxRow">
			<div class="earboxCol">1. Choose your diamonds</div>
			<div class="earboxCol earboxActive">2. Choose your setting</div>
			<div class="earboxCol">3. Complete Your Earring</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div><br>
		<div class="sortingRow">
			<div class="sortColumn">Showing  1-14 of 14 Results</div>
			<div class="sortColumn">
				<label>Display:&nbsp;</label>
				<select name="cmb_sort" class="displayBox">
				<option value="">30</option>
				</select>
				1 of 1
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div><br>
		<div class="options_colsrow row-fluid">
			<div class="stoptionsRow col-sm-3">
				<div class="labeltext">Precious Metal</div>
                <div class="metalList"><a href="#javascript;" id="platinum" onclick="changeEaringSetting('platinum')">Platinum</a></div>
                <div class="metalList"><a href="#javascript;" id="PDIUM" onclick="changeEaringSetting('PDIUM')">Pladium</a></div>
                <div class="metalList"><a href="#javascript;" id="14KG" onclick="changeEaringSetting('14KG')">14k Gold</a></div>
                <div class="metalList"><a href="#javascript;" id="14KP" onclick="changeEaringSetting('14KP')">14k Platinum</a></div>
                <div class="metalList"><a href="#javascript;" id="14KW" onclick="changeEaringSetting('14KW')">14k White Gold</a></div>
                <div class="metalList"><a href="#javascript;" id="14KY" onclick="changeEaringSetting('14KY')">14k Yellow Gold</a></div>
                <div class="metalList"><a href="#javascript;" id="18KG" onclick="changeEaringSetting('18KG')">18KG Gold</a></div>
                <div class="metalList"><a href="#javascript;" id="18KP" onclick="changeEaringSetting('18KP')">18KP Platinum</a></div>
                <div class="metalList"><a href="#javascript;" id="whitegold" onclick="changeEaringSetting('whitegold')">18k White Gold</a></div>
                <div class="metalList"><a href="#javascript;" id="yellowgold" onclick="changeEaringSetting('yellowgold')">18k Yellow Gold</a></div>
			</div>
            <div class="stoptionsRow col-sm-3">
            	<div class="labeltext">Center Diamond</div>
                <div class="metalList"><a href="#javascript;" id="rdShape" onclick="changeEaringSetting('rdShape')">Round</a></div>
                <div class="metalList"><a href="#javascript;" id="prShape" onclick="changeEaringSetting('prShape')">Princess</a></div>
                <div class="metalList"><a href="#javascript;" id="pear" onclick="changeEaringSetting('pear')">Pear</a></div>
                <div class="metalList"><a href="#javascript;" id="oval" onclick="changeEaringSetting('oval')">Oval</a></div>
                <div class="metalList"><a href="#javascript;" id="marquise" onclick="changeEaringSetting('marquise')">Marquise</a></div>
                <div class="metalList"><a href="#javascript;" id="heart" onclick="changeEaringSetting('heart')">Heart</a></div>
                <div class="metalList"><a href="#javascript;" id="emerald" onclick="changeEaringSetting('emerald')">Emerald</a></div>
                <div class="metalList"><a href="#javascript;" id="trillion" onclick="changeEaringSetting('trillion')">Trillion</a></div>
            </div>
            <div class="stoptionsRow col-sm-3">
            	<div class="labeltext">Price Range</div>
                <div class="metalList"><a href="#javascript;" id="range_showall" onclick="changeEaringSetting('range_showall')">Show All</a></div>
                <div class="blankCheckbox"><a href="#javascript;" id="range_499" onclick="changeEaringSetting('range_499')">$0 - $499</a></div>
                <div class="blankCheckbox"><a href="#javascript;" id="range_999" onclick="changeEaringSetting('range_999')">$500 - $999</a></div>
                <div class="blankCheckbox"><a href="#javascript;" id="range_1999" onclick="changeEaringSetting('range_1999')">$1,00, - $1,999</a></div>
                <div class="blankCheckbox"><a href="#javascript;" id="range_2999" onclick="changeEaringSetting('range_2999')">$2,000 - $2,999</a></div>
                <div class="blankCheckbox"><a href="#javascript;" id="range_3000" onclick="changeEaringSetting('range_3000')">$3,000</a></div>
            </div>
            <div class="clear"></div><br>
		</div>
		<div class="clear"></div><br>
		<div class="hideButton">
			<span>Hide</span>
		</div>
		<div class="clear"></div>
		<hr class="borderline" /><br><br><br>
		<div class="jewelry_boxrow">
			<div id="earingresult" class="earingresult row-fluid">
				<?php
				$result_rings = $this->Findingsmodel->getFindingsRingList();
				$viewearing_list = '';
				foreach($result_rings['result'] as $rowfindings) {
					$viewRingImg = RINGS_IMAGE.'crone/imgs/'.$rowfindings['ImagePath'];
					$viewearing_list .= '<div class="engagement-product col-sm-4">
						<div class="image-engagement">
							<div class="ringsHeading">'.get_site_title().'</div>
							<a href="'.config_item('base_url').'site/uniquefindings_detail/'.$rowfindings['catid'].'/'.$rowfindings['findings_id'].'">
							<img style="width:130px;height:130px" src="'.$viewRingImg.'"></a>
						</div>
						<div class="prodDescLabel">'.$rowfindings['name'].'<br>
							<a href="'.config_item('base_url').'site/uniquefindings_detail/'.$rowfindings['catid'].'/'.$rowfindings['findings_id'].'" class="underline">View Details</a>
						</div>
						<div class="jewlry_price">$'.$rowfindings['priceRetail'].'</div>
					</div>';
				}
				echo $viewer_list;
				?>
			</div>
			<div class="clear"></div>
			<br><br><br>
			<div class="sortingRow">
				<div class="sortColumn">
					Showing  1-14 of 14 Results
                </div>
                <div class="sortColumn">
                	<label>Display:&nbsp;</label>
                    <select name="cmb_sort" class="displayBox">
                    	<option value="">30</option>
                    </select>
                    1 of 1
                </div>
                <div class="clear"></div>
			</div>
			<div class="clear"></div><br>
		</div>
	</div>
</div>