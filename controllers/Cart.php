<?php

class Cart extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('cartmodel');
		$this->load->model('jewelrymodel');
		$phone_from_admin = get_site_contact_info('contact_info'); 
        define('CONTACT_NO', $phone_from_admin);

	}
	
	function index()
	{
		$data = $this->getCommonData();
		$data['title'] = 'Engagement';
		$output = $this->load->view('engagement/index' , $data , true);
		$this->output($output , $data);
	}

	private function getCommonData($banner='')
	{
		$data = array();
		$data = $this->commonmodel->getPageCommonData();
		return $data;

	}

	function output($layout = null , $data = array() , $isleft = true , $isright = true)
	{
		$data['loginlink'] = $this->user->loginhtml();
		$output = $this->load->view($this->config->item('template').'header' , $data , true);
		if($isleft)$output .= $this->load->view($this->config->item('template').'left' , $data , true);
		$output .= $layout;
		if($isright)$output .= $this->load->view($this->config->item('template').'right' , $data , true);
		$output .= $this->load->view($this->config->item('template').'footer', $data , true);
		$this->output->set_output($output);
	}	
	
	function addtocart($addoption = '', $lot= '', $sidestone1 = '', $sidestone2 = '', $stockno = '',$price = '',$dsize = '',$rgmetal='',$imageurl='',$chain_size=''){
		
 	
 		
		$html = '';
		$msg = '';
		$tothre_image = $this->session->userdata('settings_imgurl');
		$lot		  = urldecode($lot);
		$sidestone1	  = urldecode($sidestone1);
		$sidestone2	  = urldecode($sidestone2);
		$stockno	  = urldecode($stockno);
		$dsize		  = urldecode($dsize);
		//$additional_field = array('chain_size'=>$chain_size);
		
		$success = false;	
		switch ($addoption){
			case 'addloosediamond':
				$success = $this->cartmodel->addloosediamond($lot,$addoption,$price,$dsize);
				
				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You have already added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;
			case 'addtoring':
					//	 echo($dsize);
		// exit(0);
				$row_ring = $this->jewelrymodel->getAllByStock($stockno);
				$ringrq_fields = $this->session->userdata('rqring_fields');
				$prodRing_metal = $ringrq_fields['metal_type'];
				$prodRing_price = $ringrq_fields['ring_price'];				
								
				$success = $this->cartmodel->addring($lot,$stockno,$addoption,$price,$dsize,$prodRing_metal,$prodRing_price);

				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;
			case 'addtoproduct':
					//	 echo($dsize);
		// exit(0);
				$success = $this->cartmodel->addproduct($lot,$stockno,$addoption,$price,$dsize);

				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;
			case 'tothreestone':
			case 'tothree_supplied_stone':
							
				$success = $this->cartmodel->add3stonering($lot,$sidestone1,$sidestone2,$stockno,$addoption,$price,$dsize,$tothre_image,$rgmetal,$chain_size);
				
				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;
			case 'toearring':
				$success = $this->cartmodel->addearring($lot,$stockno,$addoption,$price,$sidestone1,$sidestone2,$dsize);
				
				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
						echo "<script>window.location.href='".config_item('base_url')."addtocart'</script>";
				//echo $html; 
				
				break;
			case 'addearringstud':
				$success = $this->cartmodel->adddiamondstudearring($stockno,$addoption,$price,$dsize);
				
				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;
			
			case 'addwatch':
				$success = $this->cartmodel->addwatch($stockno,$addoption,$price,$dsize);
				
				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;

			case 'addpendantsetings':
				$success = $this->cartmodel->adddiamondpendant($lot,$stockno,$addoption,$price,$dsize,$chain_size);
				
				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;
			case 'addpendantsetings3stone':
				$success = $this->cartmodel->add3stonediamondpendant($lot,$sidestone1,$sidestone2,$stockno,$addoption,$price,$dsize,$chain_size);
				
				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;
				
			case 'addjewellery':
				$success = $this->cartmodel->addjewellery($stockno,$addoption,$price,$dsize);
				
				if($success == 'success') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart.png"></td><td>Item has been added</td></tr>  </table>';
				if($success == 'exist') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.SITE_URL.'images/add_to_cart_already.png"></td><td>You heve alredy added this product!</td></tr>  </table>';
				if($success == 'fail') $msg = '<table width="100%" align="center"><tr><td width = "60"><img src="'.config_item('base_url').'/images/error.gif"></td><td>There was an error while saving this item.</td></tr>  </table>';				
				$html .= '<center>
							 	'.$msg.' 
								<div class="dbr"></div>
								<a href="'.config_item('base_url').'engagement" style="font-weight:bold;" class="underline">Continue Shopping</a> <span style="color:#81ae33; font-weight:bold;">|</span> 
								<a href="'.config_item('base_url').'addtocart" style="font-weight:bold;" class="underline">Check Out</a>
								
						  </center>
						';
				echo $html; 
				break;
			default:
				break;
		}
		 
	}
	
	function updatecart($id = '', $price = '', $qty = '',$dsize=''){
		$success = '';
		$newprice = '';
		$newprice = $price*$qty;
		
		$success = $this->cartmodel->updatecartbyid($id,$newprice,$qty,$dsize);
		echo ($success) ? 'Updated Sucessfully' : 'Failed to update!';
		
		redirect(config_item('base_url').'addtocart', 'refresh');
	}
	
    function deletecart($id){
        $success = $this->cartmodel->deletcartitembyid($id);
        $totalCartsItem = count( $this->session->userdata('myallitmes') );
        if( $success ) {
           echo 'Item Deleted'; 
           if( $totalCartsItem == 1 ) {
               $this->session->unset_userdata('myallitmes');
           }
        } else {
            echo 'Failed to Delete!';
        }
    }
}