<div class="floatl pad05 body">
  		<div class="bodytop"></div>
	  	<div class="bodymid">
	  	
	  		<div class="topdiv">
				<p class="txtcenter">Best Selling Products</p>
				<?php echo $top_ads;?>
			</div>
			
			<div class="divheader txtright pad10">
					Best Selling Products
			</div>
			<div class="dbr"></div>
			
			 
			<!--<div>
					<div class="floatl tabheader">
		  				<a href="#" class="blue">
		  				<div class="floatl w35px"><img align="absmiddle" src="<?php //echo config_item('base_url')?>images/tamal/choose_pen_style.jpg"></div> 
		  				<div class="floatl w124px">1.Choose Your Style</div></a>
		  				<div class="clear"></div>
		  			</div>
		  			<div class="floatl tabheader">
		  				<a href="#" class="gray">
		  				<div class="floatl w35px"><img align="absmiddle" src="<?php //echo config_item('base_url')?>images/tamal/select_sidestone.jpg"></div>
		  				<div class="floatl w125px">2.Select Your Diamond</div></a>
		  			</div>
		  			<div class="floatl tabheader">
		  				<a href="#" class="gray">
		  				<div class="floatl w35px"><img align="absmiddle" src="<?php //echo config_item('base_url')?>images/tamal/add_to_basket.jpg"></div>		  				
		  				<div class="floatl w125px">3.Add Pendant To Basket</div></a>
		  			</div> 
		  			<div class="clear"></div>			
			</div>
			
			<div>			  			
			  		  <div class="floatl bigcontainerR">
						      <p class="fakaline pad10">Directloose diamonds make it easy to design your own pendant. Follow these steps to find the perfect diamond and settings.</p>
						      <div>			  		  		
					  		  <table width="95%" class="bgblue" cellpadding="5px" cellspacing="5px" style="font-size:10px;">
						  		  	<tr>
						  		  		<td>1.Choose Your Style</td>
						  		  	</tr><tr>
						  		  		<td>2.Select Your Diamond</td>
						  		  	</tr><tr>
						  		  		<td>3.Add Pendant To Basket</td>
						  		  	</tr>					  		  	 			  		  	
					  		  </table>
				      </div>
				      </div>
				      <div class="floatl bigcontainerL">
			  				<img src="<?php echo config_item('base_url')?>/images/tamal/threestonepen_bg.jpg">
			  		  </div>			  		  
				      <div class="clear"></div>
				      
				      <div class="floatl tile borderrigth ">
				      		<div class="commonheader m5"><font class="white">Select Your Metal</font></div>
				      		<div class="m5">
				      				<div class="floatl w80px txtcenter">
				      						<label for="platinumchk"><img src="<?php echo config_item('base_url')?>images/tamal/pendant/th_metal_pla.jpg"></label>
				      						<input type="checkbox" id="platinumchk" onclick="getpendantsettings()"><br />
				      						<label for="platinumchk">Platinum</label>
				      				</div> 
				      				<div class="floatl w80px txtcenter">
				      						<label for="yelloegoldchk"><img src="<?php echo config_item('base_url')?>images/tamal/pendant/th_metal_yg.jpg"></label>
				      						<input type="checkbox" id="yelloegoldchk" onclick="getpendantsettings()"><br />
				      						<label for="yelloegoldchk">Yellow<br />Gold</label>
				      				</div> 
				      				<div class="floatl w80px txtcenter">
				      						<label for="whitegoldchk"><img src="<?php echo config_item('base_url')?>images/tamal/pendant/th_metal_pla.jpg"></label>
				      						<input type="checkbox" id="whitegoldchk" onclick="getpendantsettings()"><br />
				      						<label for="whitegoldchk">White<br />Gold</label>
				      				</div> 
				      				<div class="clear"></div>
				      		</div>	
				      </div>
				      <div class="floatl tile">
				      		<div class="commonheader m5"><font class="white">Select Your Style</font></div>
				      		<div class="m5 txtcenter"> 
			      					<div class="floatl w80px txtcenter">
			      						<label for="solitirechk"><img src="<?php echo config_item('base_url')?>images/tamal/pendant/th_style_solitire.jpg"></label>
			      						<input type="checkbox" id="solitirechk" onclick="getpendantsettings()"><br />
			      						<label for="solitirechk">Solitaire<br />Settings</label>
				      				</div> 
				      				<div class="floatl w80px txtcenter">
				      						<label for="threestonechk"><img src="<?php echo config_item('base_url')?>images/tamal/pendant/th_style_3stone.jpg"></label>
				      						<input type="checkbox" id="threestonechk" onclick="getpendantsettings()"><br />
				      						<label for="threestonechk">Three<br />Stone</label>
				      				</div>  
				      		</div>
				      </div>
				      <div class="clear hr"></div>
				      
				      <div class="dbr"></div>
				      
				    
				</div>-->
			  <div id="pendantresules">	
                        <?php echo isset($dataSep) ? $dataSep : '';?>			      		
				      </div>
                      <div id="container" style="display:none;">
                  
<h1>Rate and Comment here</h1>

<!--<h2>v 1.2.2, March 18, 2007</h2>-->
<!--<p>CodeIgniter port by Wiredesignz, 2008-02-14</p>-->
<br />
<div class="ratingblock">

            
<?php //echo $this->ratings->bar('id21',''); ?>
<?php //echo $this->ratings->bar('id22',''); ?>
<?php //echo $this->ratings->bar('id1',''); ?>
<?php //echo $this->ratings->bar('Customer',5); ?>
<?php //echo $this->ratings->show_comments(); ?>
<?php //echo $this->ratings->bar('3xx',6); ?>
<?php //echo $this->ratings->bar('4test',8); ?>
<?php //echo $this->ratings->bar('5560'); ?>
<?php //echo $this->ratings->bar('66234','','static'); ?>
<?php //echo $this->ratings->bar('66334',''); ?>
<?php //echo $this->ratings->bar('63334',''); ?>
<?php //echo $this->ratings->bar('63335',''); ?>


<!--<label>Name</label>
<input type="text" value="" class="">
<label>Email</label>
<input type="text" value="" class="">
<label>Add Comments</label>
<textarea class="boxes">
        
</textarea>
-->
              
	<!--<table border="1">
	  <tr>
	    <th>ID</th>
	    <th>Title</th>   
	    <th>Author</th>   
	    <th>Year</th>   
	  </tr>
	<?php
	//foreach($query as $row){
	  //echo "<tr>";
	    //echo "<td>". $row->id ."</td>";
	    //echo "<td>". $row->title ."</td>";
	    //echo "<td>". $row->author ."</td>";
	   // echo "<td>". $row->year ."</td>";
	 // echo "</tr>";  
	//}
	?>
	</table>-->




                  <?
				  
				//  print_r($testMode);
				  
				    echo form_open('diamonds/register2');
					
         $com_name=array
		 (
		    'name'           => 'com_name',
			'id'             => 'com_name',
			'value'          => ''
			
		 );
		 
		 $com_email=array
		 (
		    'name'           => 'com_email',
			'id'             => 'com_email',
			'value'          => ''
			
		 );
		 
		 $comments=array
		 (
		    'name'           => 'comments',
			'id'             => 'comments',
			'value'          => ''
			
		 );
		 
               ?>

<table width="70%" border="0">
  <tr>
    <td width="50%">Name</td>
    <td><?php echo form_input($com_name);?></td>
  </tr>
  <tr>
    <td width="50%">Email</td>
    <td><?php echo form_input($com_email);?></td>
  </tr>
  <tr>
    <td width="50%">Add comments</td>
    <td><?php echo form_textarea($comments);?>
        
</td>
  </tr>
    <tr>
    <td  colspan="2" width="40%" style="padding-left:6px;"><?php echo form_submit(array('name'=>'submit'), 'submit');?> </td>
    <td></td>
  </tr>
</table>

            <?php echo validation_errors();?> 

      <?php form_close(); ?>







<br /><br />
<!--<a href="http://www.masugadesign.com/the-lab/scripts/unobtrusive-ajax-star-rating-bar/">(Unobtrusive) AJAX Star Rating Bar Homepage</a>-->

</div>

</div>
		</div>
        
	  	<div class="bodybottom"></div>
</div>