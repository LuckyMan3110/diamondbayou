<script>
function setAction() {

/*loc = jQuery('input[name=ds]:checked', '#diamond_search').val();
 $('#diamond_search').attr('action', loc);*/
 
 	if (document.getElementById["ds"].checked) 
         {
           choice = document.getElementById["ds"].value;
          alert('choice');
			window.location = choice;
         }

}

</script>
<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
  <div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
      <h1>User Management</h1>
      <h2 class="">User</h2>
    </div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="<?php echo SITE_URL; ?>admin">Home</a></li>
        <li>User</li>
      </ol>
    </div>
  </div>
  <form id="diamond_search" name="diamond_search" method="post" action="#" onsubmit="return setAction();">
 	<table border="0" bordercolor="#FFCC00" cellpadding="0" cellspacing="5">
	<tbody><tr>
	  <td><div class="search_forlb">Search for <br>Diamonds</div></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds1.png" height="40;" width="40px;">
		<span class="classic">Round</span>
		</a>
		
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/B"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds2.png" height="50;" width="50px;">
		<span class="classic">Pear</span>
		</a>
		
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/P"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds3.png" height="50;" width="50px;">
		<span class="classic">Princess</span>
		</a>
		</td>
		
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/PR"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds4.png" height="50;" width="50px;">
		<span class="classic">Marquise</span>
		</a>
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/M"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds5.png" height="50;" width="50px;">
		<span class="classic">oval</span>
		</a>
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/O"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds6.png" height="50;" width="50px;">
		<span class="classic">Emerald</span>
		</a>
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/E"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds7.png" height="50;" width="50px;">
		<span class="classic">Asscher</span>
		</a>
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/AS"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds8.png" height="50;" width="50px;">
		<span class="classic">Heart</span>
		</a>
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/H"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds9.png" height="50;" width="50px;">
		<span class="classic">Radiant</span>
		</a>
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/R"></td>
		<td>
		<a href="#" class="tooltip">
		<img src="<?php echo config_item('base_url'); ?>images/ds10.png" height="50;" width="50px;">
		<span class="classic">Cushion</span>
		</a>
		</td>
		<td><input type="radio" name="ds" id="ds" value="<?php echo config_item('base_url'); ?>diamonds/search/true/C"></td>
		<td>
		<input type="image" src="<?php echo $image_url; ?>direct_source.jpg">
		</td>
	</tr>
	<tr>
		
	</tr>

</tbody></table></form>
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<?php echo popupsOtherBlockData(); ?>