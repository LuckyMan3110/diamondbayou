<script>
$(function() {
	$( "#slider-range" ).slider({
		range: true,
		min: <?php echo $minslide_price; ?>,
		max: <?php echo $maxslide_price; ?>,
		values: [ <?php echo $minslide_price; ?>, <?php echo $maxslide_price; ?> ],
		slide: function( event, ui ) {
			$( "#minslide_price" ).val( "$" + ui.values[ 0 ] );
			$( "#maxslide_price" ).val( " $" + ui.values[ 1 ] );

			setSessValue(ui.values[ 0 ],ui.values[ 1 ]);
			set3StoneRings('<?php echo $metals_option; ?>', 'columns');
		}
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +" - $" + $( "#slider-range" ).slider( "values", 1 ) );
});

function setSessValue(minpr, maxpr) {
	urllink = base_url+'jewelry/setSessValue/'+minpr+'/'+ maxpr;
	$.ajax({
		type: "POST",
		url: urllink,
		success: function(response) {
			//$( "#product_vlist" ).html( response );
		},
		error: function(){alert('Error ');}
	});  
}

function set3StoneRings(metalvalue, view_type) {
	urllink = base_url+'jewelry/get3StoneJewellery/'+view_type+'/'+metalvalue;
	$('#product_vlist').html('<div style="margin: 0px auto; text-align:center;"><img src="'+base_url+'images/loading.gif"></div>');
	setTimeout(function () {
		$.ajax({
			type: "POST",
			url: urllink,
			success: function(response) {
				$( "#product_vlist" ).html( response );
			},
			error: function(){alert('Error ');}
		});
	}, 2000);
}
</script>
<style>
.product_column{height: 305px;}
.steps_rgarow img {
width: 39px;
height: 39px;
right: 42px;
position: absolute;
top: 2px;
z-index: 999;
}
</style>
<div class="">
	<div class="bread-crumb">
		<div class="breakcrum_bk">
			<ul>
				<li><a href="<?php echo SITE_URL ?>">Home</a></li>
				<li><a href="#">Diamonds</a></li>
				<li><a href="#">Build Your Own Three Stone Ring</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div class="tothree_stone"> 
		<?php echo stepsBuildToThrestone(); ?>
		<div class="earing_heading">Create YOUR OWN THREE-STONE RING</div>
		<div class="clear"></div><br>
		<div class="viewtype_option">
			<a href="#javascript;" onclick="set3StoneRings('<?php echo $metals_option; ?>', 'columns')"><img src="<?php echo config_item('base_url')?>img/threstone/a_boxview.jpg" alt="List View" /></a>&nbsp;&nbsp;
			<a href="#javascript;" onclick="set3StoneRings('<?php echo $metals_option; ?>', 'details')"><img src="<?php echo config_item('base_url')?>img/threstone/a_dtview.jpg" alt="Detail View" /></a>
		</div>
		<div class="clear"></div><br>
		<div class="row-fluid">
			<?php
			if(!empty($signatur_option)){
				echo '<div id="" class="product_block">';
				echo $cateview_list;
				echo '<div class="clear"></div></div>';
			} else {
			?>
				<div id="product_vlist" class="product_block">
					<?php echo $detail_list; ?>
					<div class="clear"></div>
				</div>
				<div class="clear"></div><br><br><br><br>
				<div>Average Product Rating : <img src="<?php echo config_item('base_url')?>img/threstone/a_asterik.jpg" alt="Product Rating" />  4.8 out of 5 (based on 691 ratings)</div>
			<?php } ?>
		</div>
		<br><br>
	</div>
	<div class="clear"></div><br><br>
</div>