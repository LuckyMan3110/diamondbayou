<div class="floatl pad05 body">
  		<div class="bodytop"></div>
	  	<div class="bodymid">
	  	
	  		<div class="topdiv">
				<p class="txtcenter"></p>
				<?php echo $top_ads;?>
			</div>
			
		
			<div class="dbr"></div>
	       <div class="right-gradient">
               <div class="right-icon">
                  <div class="main-content area">
                     <div class="indent">
                   <!--     	<div class="divheader txtright pad10" style="text-align:center">
					          insurance

			                </div>-->
                            <div class="bodymid">

  
  	<div class="pad10">
  	
  	         <div class="divheader" style="text-align:center;background:#81ae33;color:#FFFFFF;padding:5px 2px"><strong>please fill form</strong></div> 
  			<!--<div class="floatl divheader">hi user registered</div> -->
			<div class="dbr clear"></div>

              <div class="center" style="width: 300px;">
<div class="dbr"></div>
<h1><div class="head" style="text-align:center">User Login</div></h1>
<div class="pad10">
      			     <?php echo (isset($loginerror)) ? '<div class="error">'. $loginerror.'</div><hr />' : '';?>
	      			 <?php echo form_open('account/signin'); ?>
	           		   	<table class="tborder pad10">
	           		   	<tr><td valign="top">User ID:</td><td> 
	          			<input type="text" name="username" value="<?php echo $username;?>" style="width: 200px;"> <?php echo form_error('username'); ?><br />
	          			</td></tr>
	          			<tr><td valign="top">Password:</td><td>
	          			<input type="password" name="password" value="<?php echo $password;?>" style="width: 200px;"> <?php echo form_error('password'); ?><br /><br />
	          			</td></tr>
	          			<tr><td colspan="2" align="center">  
	          			 <input type="submit" name="loginbtn" value="Signin" class="button" style="color:#000000"> <a href="<?php echo config_item('base_url')?>account/forgotpassword">Forgot Password /</a>
                       
	          			</td></tr></table>
	          		<?php echo form_close();?>
          		</div>	

</div>
  	<div class="dbr"></div>
  
  </div>
 <div class="bodybottom"></div>
</div>
                            
			      <div id="pendantresules">
                  	     
                        <?php echo isset($dataSep) ? $dataSep : '';?>	
                        		      		
				      </div>
                      </div>
                      </div>
                      </div>
                      </div><!--right gradient-->
		</div>
	  	<div class="bodybottom"></div>
</div>