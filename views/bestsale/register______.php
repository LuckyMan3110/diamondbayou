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
                        <!--	<div class="divheader txtright pad10" style="text-align:center">
					          register user

			                </div>-->
                             <h1 style="text-align:center">Please fill details below</h1>
     <div class="new_reg">   
     <ul>                    
<!--      <p>please fill in the detail below</p>-->
     <?php
           echo form_open('bestsale/register');
	 $username=array
		 (
		    'name'   => 'username',
			'id'         => 'username',
			'value'      => set_value('username')
			
		 );
	  	 $name=array
		 (
		    'name'       => 'name',
			'id'         => 'name',
			'value'      =>  set_value('name')
			
		 );
	 
	      	 $email=array
		 (
		    'name'       => 'email',
			'id'         => 'email',
			'value'      =>  set_value('email')
			
		 );
		     	 $password=array
		 (
		    'name'       => 'password',
			'id'             => 'password',
			'value'          => ''
			
		 );
		 	     	 $cnf_password=array
		 (
		    'name'      => 'cnf_password',
			'id'                => 'cnf_password',
			'value'             => ''
			
		 );
	 ?>
     
    
      <li>
      <label>username</label>
       <div>
          <?php echo form_input($username);?>
       </div>
      </li>
      
          <li>
      <label>name</label>
       <div>
          <?php echo form_input($name);?>
       </div>
      </li>
      
               <li>
      <label>email</label>
       <div>
          <?php echo form_input($email);?>
       </div>
      </li>
      
                <li>
      <label>password</label>
       <div>
          <?php echo form_input($password);?>
       </div>
      </li>
                 <li>
      <label>confirm password</label>
       <div>
          <?php echo form_input($cnf_password);?>
       </div>
      </li>
      
        <li>
       <div>
            <?php echo validation_errors();?> 
       </div>
      </li>
      
      
        <li>
       <div>
            <?php echo form_submit(array('name'=>'register'), 'register');?> 
       </div>
      </li>
     
      <?php form_close(); ?>
      </ul>
      </div>
			      <!--<div id="pendantresules">
                  	     
                        <?php //echo isset($dataSep) ? $dataSep : '';?>	
                        		      		
				      </div>-->
                      </div>
                      </div>
                      </div>
                      </div><!--right gradient-->
		</div>
	  	<div class="bodybottom"></div>
</div>