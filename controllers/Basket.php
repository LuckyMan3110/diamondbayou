<?php 
	
	$this->load->helper('t');

	$loosediamond = '';
	$ring = '';
	$threestonering = '';
	$earring = '';		
	$studearring = '';	
	$watch = '';	
	$diamondpendant = '';
	$threestonependant = ''; 
	
	if(!isset($ajax)){
		
		
?>
<div style="margin:0px auto;width:946px;color:#fff;font-weight: bold;" >  <span style="color:#fff">1.Shopping Basket</span> &nbsp; 2.Order Information &nbsp; 3.Payment Method &nbsp; 4.Order Review 
<form method="POST" action="<?php echo config_item('base_url');?>checkout" id="frmshoppingcart">
<div class="floatl pad05 body">
  <div class="bodytop"></div>
  <div class="">
  	
      	<h1 class="pageheader hr">Shopping Basket</h1>
      	 
      	<div class="dbr"></div>  
      <!--	<a href="<?php echo config_item('base_url');?>"><input type="button" value="Back" /></a>-->
      	<div id="carthtml"></div> 
      	      	
      	<?php
      	
	}
	
?>
<?php /* ?>
<div style="margin:10px auto;width:946px;color:#fff;font-weight: bold;" >  <span style="color:#fff">1.Shopping Basket</span> &nbsp; 2.Order Information &nbsp; 3.Payment Method &nbsp; 4.Order Review</span>
<form method="POST" action="<?php echo config_item('base_url');?>shoppingbasket/orderinformation" id="frmshoppingcart">
<div class="floatl pad05 body">
  <div class="bodytop"></div>
  <div class="">
  	
      	<h1 class="pageheader hr">Shopping Basket</h1>
      	 
      	<div class="dbr"></div>  
      <!--	<a href="<?php echo config_item('base_url');?>"><input type="button" value="Back" /></a>-->
<?php */ ?>
      	
<?php	
	if(isset($ajax)){ ?>
	<div id="carthtml">
	<?php
      	 
      	$maintotal = 0;
      	$subtotal = 0;
      	
      	$ldTotal = 0;
      	$rTotal = 0;
      	$tsTotal = 0;
      	$eTotal = 0;
      	$esTotal = 0;
      	$pTotal = 0;
      	$tspTotal = 0;      	
      	
      	$ld = 0;
      	$r = 0;
      	$ts = 0;
      	$e = 0;
      	$es = 0;
		$wh = 0;
      	$p = 0;
      	$tsp = 0;
      	//var_dump($_SESSION['3ez_price']);
      	//var_dump($_SESSION['main_price']);
      	//echo "<pre>";
      	//var_dump($mycartitems);
      	foreach ($mycartitems as $myCartIndex => $item){
			switch ($item['addoption']){
				case 'addloosediamond':
				
					$details = getDetailsByLot($item['lot']);
					$price = $details['price'];
					if($ld == 0){
					   $subtotal = 0;
					    $ld = $ld +1;

						if($item['ezpay']=='normal'){ 
						$ezprice = $item['price'];
						$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
						}
						elseif($item['ezpay']=='3EZ'){ 
						$ezprice = $item['price']/2;
						$ezprice = number_format($ezprice,2);
						$ezpay = '3 EZ Pay- '.$item['price'].' with 3 EZ payments of '.$ezprice.' No credit check required.';
						}
						elseif($item['ezpay']=='5EZ'){ 
						$ezprice = $item['price']/4;
						$ezprice = number_format($ezprice,2);
						$ezpay = '5 EZ Pay- '.$item['price'].' with 5 EZ payments of '.$ezprice.' No credit check required.';
						}

					   $loosediamond .=  '
									<div class="cartheader">Your Diamond</div> 
									<div style="background-color:#888;">		
											<table width="100%"  >
													<tr class="cartrowodd">
															<td style="width:20px">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
															<td width="30%">Lot:'.$item['lot'].'</td>
															<td width="30%" align="right">$ '.floatval($price).'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a></td>
															<td width="20%"align="right">$'.$item['totalprice'].'</td> 
													</tr>													  
							
							';
					   $subtotal = $ezprice*$item['quantity'];
					   $ldTotal = $subtotal + $ldTotal;
					   $maintotal = $maintotal + $subtotal ;
					   
					}
					elseif ($ld >=1){

						if($item['ezpay']=='normal'){ 
						$ezprice = $item['price'];
						$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
						}
						elseif($item['ezpay']=='3EZ'){ 
						$ezprice = $item['price']/2;
						$ezprice = number_format($ezprice,2);
						$ezpay = '3 EZ Pay- '.$item['price'].' with 3 EZ payments of '.$ezprice.' No credit check required.';
						}
						elseif($item['ezpay']=='5EZ'){ 
						$ezprice = $item['price']/4;
						$ezprice = number_format($ezprice,2);
						$ezpay = '5 EZ Pay- '.$item['price'].' with 5 EZ payments of '.$ezprice.' No credit check required.';
						}

						 $ld = $ld + 1;
						 $c = ($ld % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$loosediamond .= '
													<tr '.$c.' >
															<td style="width:20px">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
															<td width="30%">Lot:'.$item['lot'].' :: '.$ezpay.'</td>
															<td width="30%" align="right">$ '.$ezprice.'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$ezprice.'\')" class="underline update" alt="update"> </a></td>
															<td width="20%"align="right">$'.$ezprice*$item['quantity'].'</td> 
													</tr> 
										';
						 $subtotal = $ezprice*$item['quantity'];
						 $ldTotal = $subtotal + $ldTotal;
					   $maintotal = $maintotal + $subtotal ;
					  
					}
					break;
				case 'addjewelry':
					
					$item['price'] = number_format($item['price'],0);
					
					$details = getDetailsByLot($item['lot']);
					$price = $details['price'];
					if($ld == 0){
					   $subtotal = 0;
					    $ld = $ld +1;

						if($item['ezpay']=='normal'){ 
						$ezprice = $item['price'];
						$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
						}
						elseif($item['ezpay']=='3EZ'){ 
						//$ezprice = $item['price']/2;
						$ezprice = $_SESSION['3ez_price']/2;
						$ezprice = number_format($ezprice,0);
						$ezpay = '3 EZ Pay- '.$item['price'].' with 2 EZ payments of '.$ezprice.' No credit check required.';
						$_SESSION['ez3_price'] = $ezprice;
						}
						elseif($item['ezpay']=='5EZ'){ 
						//$ezprice = $item['price']/4;
						$ezprice = $_SESSION['5ez_price']/4;
						$ezprice = number_format($ezprice,0);
						$ezpay = '5 EZ Pay- '.$item['price'].' with 4 EZ payments of '.$ezprice.' No credit check required.';
						$_SESSION['ez5_price'] = $ezprice;
						}
						var_dump($item['price']);
					   $loosediamond .=  '
									<div class="cartheader">Your Jewelry</div> 
									<div style="background-color:#888;">		
											<table width="100%"  >
													<tr class="cartrowodd">
															<td style="width:20px">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
															<td width="30%">Lot:'.$item['lot'].' - '.$item['name'].' :: '.$ezpay.'</td>
															<td width="30%" align="right">$ '.$item['price'].'x<input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$ezprice.'\')" class="underline update" alt="update"> </a></td>
															<td width="20%"align="right">$'.$item['price'].'</td> 
													</tr>													  
							
							';
					   $subtotal = $item['price']*$item['quantity'];
					   $ldTotal = $subtotal + $ldTotal;
					   $maintotal = $maintotal + $subtotal ;
					   
					}
					elseif ($ld >=1){
						
						$item['price'] = number_format($item['price'],0);

						if($item['ezpay']=='normal'){ 
						$ezprice = $item['price'];
						$ezpay = 'Best Value - '.$item['price'].' Price after 15% discount when paid by Visa/MC.';
						}
						elseif($item['ezpay']=='3EZ'){ 
						$ezprice = $_SESSION['5ez_price']/2;
						$ezprice = number_format($ezprice,0);
						$ezpay = '3 EZ Pay- '.$item['price'].' with 2 EZ payments of '.$ezprice.' No credit check required.';
						$_SESSION['ez3_price'] = $ezprice;
						}
						elseif($item['ezpay']=='5EZ'){ 
						$ezprice = $_SESSION['5ez_price']/4;
						$ezprice = number_format($ezprice,0);
						$ezpay = '5 EZ Pay- '.$item['price'].' with 4 EZ payments of '.$ezprice.' No credit check required.';
						$_SESSION['ez5_price'] = $ezprice;
						}

						 $ld = $ld + 1;
						 $c = ($ld % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$loosediamond .= '
													<tr '.$c.' >
															<td style="width:20px">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
															<td width="30%">Lot:'.$item['lot'].' - '.$item['name'].' :: '.$ezpay.'</td>
															<td width="30%" align="right">$ '.$item['price'].'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$ezprice.'\')" class="underline update" alt="update"> </a></td>
															<td width="20%"align="right">$'.$item['price']*$item['quantity'].'</td> 
													</tr> 
										';
						 $subtotal = $item['price']*$item['quantity'];
						 $ldTotal = $subtotal + $ldTotal;
					   $maintotal = $maintotal + $subtotal ;
					  
					}
					break;	
				case 'addtoring':										
					$diamond = getDetailsByLot($item['lot']);
					//var_dump($item);
					$dprice = $diamond['price'];
					$dprice = $item['price'];
					
					$setttings = getAllByStock($item['ringsetting']);
				
					//$sprice = $setttings['price'];
					$sprice = $item['price'];
					if($r == 0){
						$subtotal = 0;
						$r = $r+1;
						$ring .= '
										<div class="cartheader">Your Ring  </div>
										<div  style="background-color:#888;">
										
												<table width="100%"  >
														<tr class="cartrowodd">
															<td width="15%" valign="top"> 
															
																	<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																	<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																	Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'">
																	
															</td>
															<td width="65%"> 
																	<table width="100%">
																		<!--tr>
																			<td width="40%">Lot:'.$item['lot'].'</td>
																			<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																			<td width="30%" align="right">$'.floatval($dprice)*$item['quantity'].'</td>
																		</tr-->
																		<tr>
																			<td>Setting:'.$item['ringsetting'].'</td>
																			<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																			<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																		</tr> 
																	</table>
															</td>															
															<td width="20%" colspan="2" align="right">
																	$'.$item['totalprice'].'
															</td>
								
														</tr>
								';
						$subtotal = $item['totalprice'];
						$rTotal = $rTotal + $subtotal;
					   $maintotal = $maintotal + $subtotal ;
						
					}
					elseif($r >=1){
						$r = $r+1;
						 $c = ($r % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$ring .= '
														<tr '.$c.'>
															<td width="15%" valign="top"> 
																	<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																	<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																	Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																	
															</td>
															<td width="65%"> 
																	<table width="100%">
																		<!--tr>
																			<td width="40%">Lot:'.$item['lot'].'</td>
																			<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																			<td width="30%" align="right">$'.floatval($dprice)*$item['quantity'].'</td>
																		</tr-->
																		<tr>
																			<td>Setting:'.$item['ringsetting'].'</td>
																			<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																			<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																		</tr>   
																	</table>
															</td>
															<td width="20%" colspan="2" align="right">
																	$'.$item['totalprice'].'
															</td>
														</tr>
						
						';
						$subtotal = $item['totalprice'];
						$rTotal = $rTotal + $subtotal;
					   $maintotal = $maintotal + $subtotal ;
					}
					
					break;
					case 'addtoproduct':										
					$diamond = getDetailsByLot($item['lot']);
					//var_dump($item);
					$dprice = $diamond['price'];
					$dprice = $item['price'];
					
					$setttings = getAllByStock($item['ringsetting']);
				
					//$sprice = $setttings['price'];
					$sprice = $item['price'];
					if($r == 0){
						$subtotal = 0;
						$r = $r+1;
						$ring .= '
										<div class="cartheader">Your Ring  </div>
										<div class="">
										
												<table width="100%"  >
														<tr class="cartrowodd">
															<td width="15%" valign="top"> 
															
																	<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																	<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																	Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'">
																	
															</td>
															<td width="65%"> 
																	<table width="100%">
																		<!--tr>
																			
																			<td width="30%" align="right">$'.floatval($dprice)*$item['quantity'].'</td>
																		</tr-->
																		<tr>
																			<td>Setting:'.$item['ringsetting'].'</td>
																			
																			<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																		</tr> 
																	</table>
															</td>															
															<td width="20%" colspan="2" align="right">
																	$'.$item['totalprice'].'
															</td>
								
														</tr>
								';
						$subtotal = $item['totalprice'];
						$rTotal = $rTotal + $subtotal;
					   $maintotal = $maintotal + $subtotal ;
						
					}
					elseif($r >=1){
						$r = $r+1;
						 $c = ($r % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$ring .= '
														<tr '.$c.'>
															<td width="15%" valign="top"> 
																	<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																	<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																	Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																	
															</td>
															<td width="65%"> 
																	<table width="100%">
																		<!--tr>
																			<td width="40%">Lot:'.$item['lot'].'</td>
																			<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																			<td width="30%" align="right">$'.floatval($dprice)*$item['quantity'].'</td>
																		</tr-->
																		<tr>
																			<td>Setting:'.$item['ringsetting'].'</td>
																			<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																			<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																		</tr>   
																	</table>
															</td>
															<td width="20%" colspan="2" align="right">
																	$'.$item['totalprice'].'
															</td>
														</tr>
						
						';
						$subtotal = $item['totalprice'];
						$rTotal = $rTotal + $subtotal;
					   $maintotal = $maintotal + $subtotal ;
					}
					
					break;
				case 'tothreestone':
					
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price'];
					
					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = $side1['price'];
					
					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = $side2['price'];
					
					$setttings = getAllByStock($item['ringsetting']);
					$sprice = $setttings['price'];
					
					if($ts == 0){
						$subtotal = 0;
						$threestonering .= '
											<div class="cartheader">Your Three-Stone Ring</div>
											<div class="">
											
													<table width="100%"  >
															<tr class="cartrowodd">
																<td width="15%" valign="top"> 
																		 <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																		 <a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																		Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																		 
																</td>
																<td width="65%"> 
																		<table width="100%">
																				<tr>
																					<td width="40%">Lot: '.$item['lot'].'</td>
																					<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																					<td width="30%" align="right">$ '.floatval($dprice)*$item['quantity'].'</td>
																				</tr>
																				<tr>
																					<td >Stone 1: '.$item['sidestone1'].'</td>
																					<td align="right">$ '.floatval($s1price).' x '.$item['quantity'].'</td>
																					<td align="right">$ '.floatval($s1price)*$item['quantity'].'</td>
																				</tr>
																				<tr>
																					<td >Stone 2: '.$item['sidestone2'].'</td>
																					<td align="right">$ '.floatval($s2price).' x '.$item['quantity'].'</td>
																					<td align="right">$ '.floatval($s2price)*$item['quantity'].'</td>
																				</tr>
																				<tr>
																					<td>Setting: '.$item['ringsetting'].'</td>
																					<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																					<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																				</tr>
																		</table>
																</td>
																<td width="20%" colspan="2" align="right">
																		$'.$item['totalprice'].'
																</td> 
															</tr>	
										';
						$subtotal = $item['totalprice'];
						$tsTotal = $tsTotal +$subtotal;
					   $maintotal = $maintotal + $subtotal ;
					   $ts = $ts +1;
					}
					elseif ($ts >=0){ 
						  $ts = $ts +1;
						 $c = ($ts % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
						$threestonering .='
															<tr '.$c.'>
																<td width="15%" valign="top"> 
																		<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																		<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																		Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																		
																</td>
																<td width="65%"> 
																		<table width="100%">
																				<tr>
																					<td width="40%">Lot: '.$item['lot'].'</td>
																					<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																					<td width="30%" align="right">$ '.floatval($dprice)*$item['quantity'].'</td>
																				</tr>
																				<tr>
																					<td >Stone 1: '.$item['sidestone1'].'</td>
																					<td align="right">$ '.floatval($s1price).' x '.$item['quantity'].'</td>
																					<td align="right">$ '.floatval($s1price)*$item['quantity'].'</td>
																				</tr>
																				<tr>
																					<td >Stone 2: '.$item['sidestone2'].'</td>
																					<td align="right">$ '.floatval($s2price).' x '.$item['quantity'].'</td>
																					<td align="right">$ '.floatval($s2price)*$item['quantity'].'</td>
																				</tr>
																				<tr>
																					<td>Setting: '.$item['ringsetting'].'</td>
																					<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																					<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																				</tr>
																		</table>
																</td>
																<td width="20%" colspan="2" align="right">
																		$'.$item['totalprice'].'
																</td>
															</tr>
						';
						$subtotal = $item['totalprice'];
						$tsTotal = $tsTotal +$subtotal;
					   $maintotal = $maintotal + $subtotal ;
					}
					break;
					
				case 'toearring': 
					
					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = $side1['price'];
					
					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = $side2['price'];
					
					$setttings = getEarringSettingsById($item['earringsetting']);
					$sprice = $setttings['price'];
					#$mycartitems[$myCartIndex]['totalprice'] = $s1price+$s2price+$sprice;
					#$item['totalprice'] = $mycartitems[$myCartIndex]['totalprice'];
					#print_r($mycartitems);
					#echo '<br>e'.$e;
						if($e == 0){
							$subtotal =0;
							 $earring .= '
										<div class="cartheader">Your Earring  </div>
										<div  style="background-color:#888;">
										
												<table width="100%"  >
														<tr class="cartrowodd">
															<td width="15%" valign="top"> 
																	<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																	<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																	Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																	
															</td>
															<td width="65%"> 
																	<table width="100%">
																		<tr>
																			<td width="40%">Stone 1: '.$item['sidestone1'].'</td>
																			<td width="30%" align="right">$ '.floatval($s1price).' x '.$item['quantity'].'</td>
																			<td width="30%" align="right">$ '.floatval($s1price)*$item['quantity'].'</td>
																		</tr> 
																		<tr>
																			<td >Stone 2: '.$item['sidestone2'].'</td>
																			<td align="right">$ '.floatval($s2price).' x '.$item['quantity'].'</td>
																			<td align="right">$ '.floatval($s2price)*$item['quantity'].'</td>
																		</tr>
																		<tr>
																			<td>Setting:'.$item['earringsetting'].'</td>
																			<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																			<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																		</tr> 
																	</table>
															</td>
															<td width="20%" colspan="2" align="right">
																	$'.$item['totalprice'].'
															</td>
														</tr>
								';
							 $subtotal = $item['totalprice'];
							 $eTotal = $eTotal + $subtotal;
							 $maintotal = $maintotal + $subtotal ;
						     $e = $e+1;
						}
						elseif($e >=1){
							$e = $e+1;
							$c = ($e % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
							$earring .= '
														<tr '.$c.'>
															<td width="15%" valign="top"> 
																	<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																	<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																	Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																	
															</td>
															<td width="65%"> 
																	<table width="100%">
																		<tr>
																			<td width="40%">Stone 1: '.$item['sidestone1'].'</td>
																			<td width="30%" align="right">$ '.floatval($s1price).' x '.$item['quantity'].'</td>
																			<td width="30%" align="right">$ '.floatval($s1price)*$item['quantity'].'</td>
																		</tr> 
																		<tr>
																			<td >Stone 2: '.$item['sidestone2'].'</td>
																			<td align="right">$ '.floatval($s2price).' x '.$item['quantity'].'</td>
																			<td align="right">$ '.floatval($s2price)*$item['quantity'].'</td>
																		</tr>
																		<tr>
																			<td>Setting:'.$item['earringsetting'].'</td>
																			<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																			<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																		</tr> 
																	</table>
															</td>
															<td width="20%" colspan="2" align="right">
																	$'.$item['totalprice'].'
															</td>
														</tr>
						
							';
							$subtotal = $item['totalprice'];
							$eTotal = $eTotal + $subtotal;
							 $maintotal = $maintotal + $subtotal ;
						}
					break;
					
				case 'addwatch': 
					
					$setttings = $this->jewelrymodel->getWatchByStock($item['watchid']);
					$sprice = $setttings['price1'];
					
						if($wh == 0){
							$subtotal = 0;
							   $watch .=  '
											<div class="cartheader">Your Watch</div> 
											<div class="">		
													<table width="100%"  >
															<tr class = "cartrowodd">
																	<td width="20%">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
																	<td width="30%">Rolex Watch:'.$item['studearring'].'</td>
																	<td width="30%" align="right">$ '.floatval($sprice).'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a></td>
																	<td width="20%"align="right">$'.$item['totalprice'].'</td> 
															</tr> 
												 
									
									';
							   $subtotal = $item['totalprice'];
							   $whTotal = $whTotal + $subtotal;
							    $maintotal = $maintotal + $subtotal ;
							    $wh = $wh +1;
							}
							elseif ($wh >=1){
								$wh = $wh +1;
								$c = ($wh % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
								$studearring .= '
															<tr '.$c.'>
																	<td width="20%">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
																	<td width="30%">Rolex Watch :'.$item['studearring'].'</td>
																	<td width="30%" align="right">$ '.floatval($sprice).'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a></td>
																	<td width="20%"align="right">$'.$item['totalprice'].'</td> 
															</tr> 
									';
								$subtotal = $item['totalprice'];
								$whTotal = $whTotal + $subtotal;
							 $maintotal = $maintotal + $subtotal ;
					}	
					
					break;

				case 'addearringstud': 
					
					//$setttings = getAllByStock($item['studearring']);
					$setttings = $this->jewelrymodel->getByStock($item['studearring']);
					$sprice = $setttings['price'];
					
						if($es == 0){
							$subtotal = 0;
							   $studearring .=  '
											<div class="cartheader">Your Diamond Stud Earring</div> 
											<div class="">		
													<table width="100%"  >
															<tr class = "cartrowodd">
																	<td width="20%">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
																	<td width="30%">Stud Earring :'.$item['studearring'].'</td>
																	<td width="30%" align="right">$ '.floatval($sprice).'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a></td>
																	<td width="20%"align="right">$'.$item['totalprice'].'</td> 
															</tr> 
												 
									
									';
							   $subtotal = $item['totalprice'];
							   $esTotal = $esTotal + $subtotal;
							    $maintotal = $maintotal + $subtotal ;
							    $es = $es +1;
							}
							elseif ($es >=1){
								$es = $es +1;
								$c = ($es % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
								$studearring .= '
															<tr '.$c.'>
																	<td width="20%">  <a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a> </td>
																	<td width="30%">Stud Earring :'.$item['studearring'].'</td>
																	<td width="30%" align="right">$ '.floatval($sprice).'x <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"><a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a></td>
																	<td width="20%"align="right">$'.$item['totalprice'].'</td> 
															</tr> 
									';
								$subtotal = $item['totalprice'];
								$esTotal = $esTotal + $subtotal;
							 $maintotal = $maintotal + $subtotal ;
					}			
					break;

				case 'addpendantsetings':
					
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price']; 
					
					$setttings = getPendentSettingsById($item['pendantsetting']);
					$sprice = $setttings['price'];
					
						if($p == 0){
							$subtotal = 0;
								$diamondpendant .= '
												<div class="cartheader">Your Diamond Pendant </div>
												<div class="">
												
														<table width="100%"  >
																<tr class = "cartrowodd">
																	<td width="15%" valign="top"> 
																			<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																			<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																			Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																			
																	</td>
																	<td width="65%"> 
																			<table width="100%">
																				<tr>
																					<td width="40%">Lot:'.$item['lot'].'</td>
																					<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																					<td width="30%" align="right">$ '.floatval($dprice)*$item['quantity'].'</td>
																				</tr>
																				<tr>
																					<td>Setting:'.$item['pendantsetting'].'</td>
																					<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																					<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																				</tr> 
																			</table>
																	</td>
																	<td width="20%" colspan="2" align="right">
																			$'.$item['totalprice'].'
																	</td>
																</tr>
										';
								$subtotal = $item['totalprice'];
								$pTotal = $pTotal + $subtotal;
							 	$maintotal = $maintotal + $subtotal ;
								$p = $p+1;
							}
							elseif($p >=1){
								$p = $p+1;
								$c = ($p % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
								$diamondpendant .= '
																<tr '.$c.'>
																	<td width="15%" valign="top"> 
																			<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																			<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																			Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																			
																	</td>
																	<td width="65%"> 
																			<table width="100%">
																				<tr>
																					<td width="40%">Lot:'.$item['lot'].'</td>
																					<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																					<td width="30%" align="right">$ '.floatval($dprice)*$item['quantity'].'</td>
																				</tr>
																				<tr>
																					<td>Setting:'.$item['pendantsetting'].'</td>
																					<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																					<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																				</tr>   
																			</table>
																	</td>
																	<td width="20%" colspan="2" align="right">
																			$'.$item['totalprice'].'
																	</td>
																</tr>
								
								';
								$subtotal = $item['totalprice'];
								$pTotal = $pTotal + $subtotal;
							 $maintotal = $maintotal + $subtotal ;
					}			
					break;
				case 'addpendantsetings3stone':
					
					$diamond = getDetailsByLot($item['lot']);
					$dprice = $diamond['price'];
					
					$side1 = getDetailsByLot($item['sidestone1']);
					$s1price = $side1['price'];
					
					$side2 = getDetailsByLot($item['sidestone2']);
					$s2price = $side2['price'];
					
					$setttings = getPendentSettingsById($item['pendantsetting']);
					$sprice = $setttings['price'];
					
						if($tsp == 0){
							$subtotal = 0;
								$threestonependant .= '
													<div class="cartheader">Your Three-Stone Pendant</div>
													<div class="">
													
															<table width="100%"  >
																	<tr class="cartrowodd">
																		<td width="15%" valign="top"> 
																				<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																				<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																				Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																				
																		</td>
																		<td width="65%"> 
																				<table width="100%">
																						<tr>
																							<td width="40%">Lot: '.$item['lot'].'</td>
																							<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																							<td width="30%" align="right">$ '.floatval($dprice)*$item['quantity'].'</td>
																						</tr>
																						<tr>
																							<td >Stone 1: '.$item['sidestone1'].'</td>
																							<td align="right">$ '.floatval($s1price).' x '.$item['quantity'].'</td>
																							<td align="right">$ '.floatval($s1price)*$item['quantity'].'</td>
																						</tr>
																						<tr>
																							<td >Stone 2: '.$item['sidestone2'].'</td>
																							<td align="right">$ '.floatval($s2price).' x '.$item['quantity'].'</td>
																							<td align="right">$ '.floatval($s2price)*$item['quantity'].'</td>
																						</tr>
																						<tr>
																							<td>Setting: '.$item['pendantsetting'].'</td>
																							<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																							<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																						</tr>
																				</table>
																		</td>
																		<td width="20%" colspan="2" align="right">
																				$'.$item['totalprice'].'
																		</td>
																	</tr>	
												';
								$subtotal = $item['totalprice'];
								$tspTotal = $tspTotal + $subtotal;
							 	$maintotal = $maintotal + $subtotal ;
								$tsp = $tsp +1;
						}
						elseif ($tsp >=0){
								$tsp = $tsp +1;
								$c = ($tsp % 2 == 0) ? 'class="cartroweven"' : 'class="cartrowodd"';
								$threestonependant .='
																	<tr '.$c.'>
																		<td width="15%" valign="top"> 
																				<a href="javascript:void(0)" onclick="c = confirm(\'Are you sure delete this item from cart?\'); if(c)deletcartitembyid(\''.$item['id'].'\')" class="underline remove" alt="remove"> </a>
																				<a href="javascript:void(0)" onclick="updatecart(\''.$item['id'].'\',\''.$item['price'].'\')" class="underline update" alt="update"> </a><br>
																				Quantity: <input type="text" id="'.$item['id'].'" class="quantity" name="'.$item['id'].'" value="'.$item['quantity'].'"> 
																				
																		</td>
																		<td width="65%"> 
																				<table width="100%">
																						<tr>
																							<td width="40%">Lot: '.$item['lot'].'</td>
																							<td width="30%" align="right">$ '.floatval($dprice).' x '.$item['quantity'].'</td>
																							<td width="30%" align="right">$ '.floatval($dprice)*$item['quantity'].'</td>
																						</tr>
																						<tr>
																							<td >Stone 1: '.$item['sidestone1'].'</td>
																							<td align="right">$ '.floatval($s1price).' x '.$item['quantity'].'</td>
																							<td align="right">$ '.floatval($s1price)*$item['quantity'].'</td>
																						</tr>
																						<tr>
																							<td >Stone 2: '.$item['sidestone2'].'</td>
																							<td align="right">$ '.floatval($s2price).' x '.$item['quantity'].'</td>
																							<td align="right">$ '.floatval($s2price)*$item['quantity'].'</td>
																						</tr>
																						<tr>
																							<td>Setting: '.$item['pendantsetting'].'</td>
																							<td align="right">$ '.floatval($sprice).' x '.$item['quantity'].'</td>
																							<td align="right">$ '.floatval($sprice)*$item['quantity'].'</td>
																						</tr>
																				</table>
																		</td>
																		<td width="20%" colspan="2" align="right">
																				$'.$item['totalprice'].'
																		</td>
																	</tr>
								';
								$subtotal = $item['totalprice'];
								$tspTotal = $tspTotal + $subtotal;
							 $maintotal = $maintotal + $subtotal ;
							}		
					break;
				default:
					break;
			}
	}
	if($ld >0){
		$loosediamond .= '
									<tr>
											<td colspan="4"  class="line"></td>
									</tr>
									<tr>
											<td colspan="4" align="right"><b>$'.$ldTotal.'</b></td>
									</tr> 
							</table> 
						</div>
						<div class="dbr"></div>
					';
		echo $loosediamond;
	}
	if($r >0){
		$ring .= '
						<tr>
								<td colspan="4"  class="line"></td>
						</tr>
						<tr>
								<td colspan="4" align="right"><b>$'.$rTotal.'</b></td>
						</tr> 
				</table> 
				
		</div>
		<div class="dbr"></div>
		';
		echo $ring;
	}
	if($ts >0){
		$threestonering .='
						<tr>
								<td colspan="4"  class="line"></td>
						</tr>
						<tr>
								<td colspan="4" align="right"><b>$'.$tsTotal.'</b></td>
						</tr> 
				</table> 
		</div>
		<div class="dbr"></div>
		';
		echo $threestonering;
	}
	if($e>0){
		$earring .= '
						<tr>
								<td colspan="4"  class="line"></td>
						</tr>
						<tr>
								<td colspan="4" align="right"><b>$'.$eTotal.'</b></td>
						</tr> 
				</table> 
				
		</div>
		<div class="dbr"></div>
		';
		echo $earring;
	}
	if($es >0){
		$studearring .= '
									<tr>
											<td colspan="4"  class="line"></td>
									</tr>
									<tr>
											<td colspan="4" align="right"><b>$'.$esTotal.'</b></td>
									</tr> 
							</table> 
						</div>
						<div class="dbr"></div>
					';
		echo $studearring;
	}
	if($wh >0){
		$watch .= '
									<tr>
											<td colspan="4"  class="line"></td>
									</tr>
									<tr>
											<td colspan="4" align="right"><b>$'.$whTotal.'</b></td>
									</tr> 
							</table> 
						</div>
						<div class="dbr"></div>
					';
		echo $watch;
	}
	if($p >0){
		$diamondpendant .= '
						<tr>
								<td colspan="4"  class="line"></td>
						</tr>
						<tr>
								<td colspan="4" align="right"><b>$'.$pTotal.'</b></td>
						</tr> 
				</table> 
				
		</div>
		<div class="dbr"></div>
		';
		echo $diamondpendant;
	}
	if($tsp >0){
		$threestonependant .='
						<tr>
								<td colspan="4"  class="line"></td>
						</tr>
						<tr>
								<td colspan="4" align="right"><b>$'.$tspTotal.'</b></td>
						</tr> 
				</table> 
		</div>
		<div class="dbr"></div>
		';
		echo $threestonependant;
	}
	
	if($ld == 0 && $r == 0 && $ts == 0 && $e == 0 && $es == 0 && $wh == 0 && $p == 0 && $tsp == 0){
		echo '<center> <b>Shopping Cart is Empty</b> </center>';
	}
	else {
		echo ' 
					<div class="floatl column">
						 <input type="hidden" name="totalprice" id="totalprice" value="'. $maintotal.'"> 
						 <input type="hidden" name="ez3_price" id="ez3_price" value="'. $_SESSION['ez3_price'].'">
						 <input type="hidden" name="ez5_price" id="ez5_price" value="'. $_SESSION['ez5_price'].'">  
						 <input type="submit" class="tbutton3" value="check out to continue" name="checkout">
						 <!--<input type="submit" class="tbutton2" value="Update Basket" name="updatebasket">-->
					</div>
				
					<div class="floatl column"><span class="floatr"><b>Total Price: $'.$maintotal.'</b></span></div>
					<div class="clear"></div>
				
		';
	} 
?>
</div>
<?php	
	}
    if(!isset($ajax)){  	
?>  	
		<!--<table><tr class=""><td></td> </tr> </table>-->
		
	
        
  </div>
 <div class="bodybottom"></div>
</div>
</form> 
</div>
<?php }?>
