<?php
function admin_left_sidebar() {
	$sites   = set_active_leftmenu('home');
	$master  = set_active_leftmenu('master');
	$modules = set_active_leftmenu('modules');
	$ecomrce = set_active_leftmenu('ecome');
	$orders  = set_active_leftmenu('order');
	$confgrs  = set_active_leftmenu('configure');
	$em      = set_active_leftmenu('email');
	$invent  = set_active_leftmenu('inventory');
	$market  = set_active_leftmenu('market');
	$stuller  = set_active_leftmenu('stuller');

	$view_sidebar = '<ul>
		<li class="left_nav_active theme_border"><a href="'.SITE_URL.'admin"><i class="fa fa-home"></i> DASHBOARD </a></li>
		<li class="left_nav_active theme_border"><a href="'.SITE_URL.'" target="_blank"><i class="fa fa-home"></i> Retailer </a></li>
		<li class="left_nav_active theme_border"><a href="'.SITE_URL.'wholesale" target="_blank"><i class="fa fa-home"></i> Wholesaler </a></li>
		<li class="left_nav_active theme_border"><a href="http://45.79.211.148:8069/web" target="_blank"><i class="fa fa-home"></i> Point of Sale and ERP </a></li>
		<li '.$sites['list'].'><a href="javascript:void(0);"><i class="fa fa-folder-open-o"></i> Site Management <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus"></i></span> </a>
			<ul '.$sites['ul'].'>
				<li> <a href="'.SITE_URL.'admin/commonpagetemplate"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b class="theme_color">Pages Manager</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/manage_comments"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Comments Manager</b> </a></li>
				<li> <a href="'.SITE_URL.'admin/emails_subscriber"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Email Subscriber</b> </a></li>
				<li> <a href="'.SITE_URL.'admin/customs_design"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Custom Design</b> </a></li>
				<li> <a href="https://sellercentral.amazon.com/gp/item-manager/ezdpc/uploadInventory.html?ie=UTF8&ref_=ag_invfile_dnav_xx" target="_blank"> 
				<span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Batch File Status</b> </a> </li>			  
			</ul>
		</li>
		<li '.$master['list'].'> <a href="javascript:void(0);"> <i class="fa fa-building-o"></i> Master Management <span class="plus"><i class="fa fa-plus"></i></span></a>
			<ul '.$master['ul'].'>
				<li> <a href="'.SITE_URL.'admin/rolex"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Watches Mgmt.</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/brands"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Manage Brands</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/jewelries"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>3D Jewelry</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/jewelries_manager"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Jewelry Mgmt.</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/nameplate"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Nameplate Mgmt.</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/categorymanagement"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Amazon &amp; eBay Exp.</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/owners"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Rapnet Companies</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/rappent_logins_mgmt"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Rapnet Logins</b> </a> </li>
			</ul>
		</li>
		<li '.$stuller['list'].'> <a href="javascript:void(0);"> <i class="fa fa-building-o"></i> Stuller Bands <span class="plus"><i class="fa fa-plus"></i></span></a>
			<ul '.$stuller['ul'].'>
				<li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_diamond"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Wedding Bands</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_ladies"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Ladies Wedding Bands</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_platinum"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Wedding Bands</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_mens"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Men\'s Wedding Bands</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_studs"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Stud Earrings</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/wb_hoops"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Hoops</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/diamond_stuller_earing/gemstone"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Gemstone Earrings</b> </a> </li>
				<li><a href="'.SITE_URL.'admin/diamond_stud_earing"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Stud Audit</b> </a> </li>
			</ul>
		</li>
		<li '.$modules['list'].'> <a href="javascript:void(0);"> <i class="fa fa-bar-chart-o"></i> Modules <span class="plus"><i class="fa fa-plus"></i></span></a>
			<ul '.$modules['ul'].'>
				<li> <a href="'.SITE_URL.'admin_listings/heart_collection_items"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Colletion Listings</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/rapnetDiamondsSearch"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Index Diamond</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/feedbacks"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Feedback Manager</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/coupon"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Coupon Manager</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/helixprice"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Helix Price</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/uniqueprice_setting"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Unique Price</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/helixpriceJwelery"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Jewelry Helix Price</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/helixpriceStuller"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Stuller Helix Price</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/helixpriceQuality"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Helix Price Manager</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/stuller"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Stuller Manager</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/qualitygold"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Q &amp; G Manager</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/uniquesettings"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Unique Settings</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/diamondshapes"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Shapes</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/cert"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Cert</b> </a> </li>
			</ul>
		</li>
		<li '.$ecomrce['list'].'> <a href="javascript:void(0);"> <i class="fa fa-shopping-cart"></i> E-Commerce <span class="plus"><i class="fa fa-plus"></i></span></a>
			<ul '.$ecomrce['ul'].'>
				<li> <a href="'.SITE_URL.'admin/rapnetimport"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Rapnet Diamonds</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/polygonimport"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Polygon Diamonds</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/ideximport"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Idex Diamonds</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/customers"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Manage Customers</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/inventory"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Watches Bulk Upload</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/jewelriesinventory"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Jewelry Bulk Upload</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/povadajewelries"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Povada Jewelry</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/testimonial"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Testimonials</b> </a> </li>
			</ul>
		</li>
		<li '.$orders['list'].'> <a href="javascript:void(0);"> <i class="fa fa-bars"></i> Orders <span class="plus"><i class="fa fa-plus"></i></span></a>
			<ul '.$orders['ul'].'>
				<li> <a href="'.SITE_URL.'admin/order"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Website Fullfillments</b> </a> </li>
			</ul>
		</li>
		<li '.$confgrs['list'].'> <a href="javascript:void(0);"> <i class="fa fa-wrench"></i> EZ Pay Configuration <span class="plus"><i class="fa fa-plus"></i></span></a>
			<ul '.$confgrs['ul'].'>
				<li> <a href="'.SITE_URL.'admin/ezpay"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Ezpay Configuration</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/catamanager"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Category Manager</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/catamanager"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Price Manager</b> </a> </li>
			</ul>
		</li>
		<li '.$invent['list'].'> <a href="javascript:void(0);"> <i class="fa fa-wrench"></i> Inventory $ Management<span class="plus"><i class="fa fa-plus"></i></span></a>
			<ul '.$invent['ul'].'>
				<li> <a href="'.SITE_URL.'admin/inventory_mgnt"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Unique Settings</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/inventory_mgnt"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Stuller</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/inventory_mgnt"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Quality Gold</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/helixprice"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Rapnet</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/jewelries_manager"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Jeweler Cart</b> </a> </li>
			</ul>
		</li>
		<li '.$em['list'].'> <a href="javascript:void(0);"> <i class="fa fa-envelope"></i> EMAIL <span class="plus"><i class="fa fa-plus"></i></span> </a>
			<ul '.$em['ul'].'>
				<li> <a href="'.SITE_URL.'admin/inbox""> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Inbox</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/compose""> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Compose</b> </a> </li>
				<!--<li> <a href="'.SITE_URL.'admin/readmail""> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Read Mail</b> </a> </li>-->
			</ul>
		</li>
		<li> <a href="'.SITE_URL.'admin/order"> <i class="fa fa-power-off"></i> Notifications </a></li>
		<li '.$master['list'].' id="marketplace"> <a href="javascript:void(0);"> <i class="fa fa-building-o"></i> Market Places <span class="plus"><i class="fa fa-plus"></i></span></a>
			<ul '.$market['ul'].'>
				<li> <a href="'.SITE_URL.'admin_listings/heart_collection_items#marketplace"><span>&nbsp;</span> <i class="fa fa-circle"></i><b>Market Filter </b> </a> </li>
				<li> <a href="'.SITE_URL.'admin_listings/heart_collection_items#marketplace"><span>&nbsp;</span> <i class="fa fa-circle"></i><b>eBay Jewelry </b> </a> </li>              
				<li> <a href="'.SITE_URL.'admin/rapnetDiamondsSearch#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>eBay Diamonds</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin_listings/heart_collection_items#marketplace"><span>&nbsp;</span> <i class="fa fa-circle"></i><b>Watches </b> </a> </li>
				<li class="setsubcate"><b>1. Diamonds</b></li>  
				<li> <a href="'.SITE_URL.'admin/cert#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Certificates</b> </a> </li>              
				<li> <a href="'.SITE_URL.'admin/diamondshapes#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Solitaire Image Uploader</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/admin/loosediamondshapes#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Shape Image Upload</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/admin//owners#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Rapnet Companies</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/loosediamonds#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Bulk Upload Diamonds</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/rapnetDiamondsSearch#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Single Diamond Upload</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/helixpriceQuality#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Diamond Price Manager</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/rappent_logins_mgmt#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Rapnet Logins</b> </a> </li>
				<li class="setsubcate"><b>2. Watches</b></li>
				<li> <a href="'.SITE_URL.'admin/rolex#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Watches Mgmt.</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/brands#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Manage Brands</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/inventory#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Watches Bulk Upload</b> </a> </li>
				<li class="setsubcate"><b>3. Jewelry</b></li>
				<li> <a href="'.SITE_URL.'admin/jewelries_manager#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Jewelry Mgmt.</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/jewelries_manager/add#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Jewelry Upload</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/rapnetcomdiamonds#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Bulk Jewelry Export</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/helixpriceJwelery#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Bulk Jewelry Price</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/jewelriesinventory#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Bulk Jewelry Import</b> </a> </li>
				<li class="setsubcate"><b>4. Orders</b></li>
				<li> <a href="'.SITE_URL.'admin/orders#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Amazon Fullfillments</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/canadaorders#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Canada Fullfillments</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/ebayorders#marketplace"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>eBay Fullfillments</b> </a> </li>
				<li class="setsubcate"><b>5.Market Place Login</b></li>
				<li> <a href="https://sellercentral.amazon.com/gp/ezdpc-gui/inventory-status/status.html/ref=ag_invmgr_dnav_xx_" target="_blank"> <span>&nbsp;</span>              <i class="fa fa-circle"></i> <b>Manage Inventory</b> </a> </li>
				<li> <a href="'.SITE_URL.'admin/contentpage/ebaylogin#marketplace"> <span>&nbsp;</span><i class="fa fa-circle"></i> <b>Ebay Login</b> </a></li>      
				<li> <a href="'.SITE_URL.'admin/contentpage/amazonlogin#marketplace"> <span>&nbsp;</span><i class="fa fa-circle"></i> <b>Amazon Login</b> </a></li>   
				<li> <a href="'.SITE_URL.'admin/contentpage/sears#marketplace"> <span>&nbsp;</span><i class="fa fa-circle"></i> <b>Sears</b> </a> </li>
			</ul>
		</li>
		<li> <a href="'.SITE_URL.'admin/"> <i class="fa fa-power-off"></i> Google Analytics </a></li>
		<li> <a href="'.SITE_URL.'admin/"> <i class="fa fa-power-off"></i> Social Media </a></li>
		<li> <a href="'.SITE_URL.'admin/"> <i class="fa fa-power-off"></i> Profile </a></li>
		<li> <a href="'.SITE_URL.'admin/customers"> <i class="fa fa-power-off"></i> Users </a></li>		  
		<li> <a href="'.SITE_URL.'admin/logout"> <i class="fa fa-power-off"></i> Logout </a></li>
		<li> <a href="'.SITE_URL.'admin/logout"> <i class="fa fa-power-off"></i> Logout </a></li>
	</ul>';
	return $view_sidebar;
}

function set_active_leftmenu($menu='') {
	$CI = & get_instance();
	$pages_name = $CI->session->userdata('pages_name');
	$return = array();

	switch($menu) {
		case 'home':
			$active_ar = array('commonpagetemplate','manage_comments','emails_subscriber','subsEmailSent','customs_design','settings_mgmt','profile_mgmt','trial_users');
			break;
		case 'master':
			$active_ar = array('rolex','brands','jewelries','jewelries_manager','nameplate','categorymanagement','owners','loosediamondshapes');
			break;
		case 'stuller':
			$active_ar = array('diamond_stuller_earing', 'diamond_stud_earing');
			break;
		case 'modules':
			$active_ar = array('feedbacks','coupon','helixprice','uniqueprice_setting','helixpriceJwelery','helixpriceStuller','helixpriceQuality','stuller','qualitygold','uniquesettings', 'heart_collection_items', 'item_collection_detail', 'view_unique_detail','rapnetDiamondsSearch','rapnetcomdiamonds','loosediamonds','rappent_logins_mgmt', 'diamondshapes', 'cert');
			break;
		case 'ecome':
			$active_ar = array('rapnetimport','polygonimport','ideximport','customers','inventory','jewelriesinventory','povadajewelries','testimonial','affiliate_mgmt');
			break;
		case 'order':
			$active_ar = array('order','orders','canadaorders','ebayorders','getorderdetail_view','sendContact');
			break;
		case 'configure':
			$active_ar = array('ezpay','catamanager','catamanager');
			break;
		case 'email':
			$active_ar = array('inbox','compose','readmail');
			break;
		case 'inventory':
			$active_ar = array('inventory_mgnt','stuller_inventory','quality_inventory');
			break;
		case 'market':
			$active_ar = array('cert','diamondshapes','loosediamonds','rapnetDiamondsSearch','helixpriceQuality','rappent_logins_mgmt','rolex','brands','inventory','jewelries_manager','rapnetcomdiamonds','heart_collection_items', 'rapnetDiamondsSearch', 'helixpriceJwelery','jewelriesinventory','loosediamondshapes','orders','canadaorders','ebayorders','contentpage');
			break;
		default:
			$active_ar = array('commonpagetemplate');;
			break;
	}
	$return['list'] = '';
	$return['ul']   = '';

	if( in_array($pages_name, $active_ar) || ( empty($pages_name) && $menu == 'home' ) ) {
		$return['list'] = 'class="left_nav_active theme_border"';
		$return['ul']   = 'class="opened" style="display:block"';
	}
	return $return;
}

/* popups and other blocks data */
function popupsOtherBlockData() {
	$view_data = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form name="taskForm" id="taskForm" method="post">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
					</div>
					<div class="modal-body">
						<div id="viewErorMsg"></div>
						<div>
							<input type="text" name="task_heading" id="task_heading" class="form-control" placeholder="Task Heading">
						</div>
						<br>
						<div>
							<textarea name="task_detail" placeholder="Task Detail" id="task_detail" class="form-control"></textarea>
						</div>
						<br>
						<div>
							<input type="checkbox" name="cb_imptask" id="cb_imptask" value="Y" /><label for="cb_imptask">Important Task</label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="saveTaskDetail()">Save changes</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
				</div>
				<div class="modal-body"> sgxdfgxfg </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		';
	return $view_data;
}

/* get task list */
function viewTaskList() {
	$CI = & get_instance();
	$CI->load->model('adminmodel');

	$task_result = $CI->adminmodel->getTaskList();
	$total_task = $task_result['count'];
	$viewTask = '';
	$taskLink = SITE_URL.'admin/manage_tasks';

	$viewTask .= '<li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> Tasks <span class="badge badge">'.$total_task.'</span></a>
		<ul class="drop_down_task dropdown-menu">
			<div class="top_pointer"></div>
			<li>
				<p class="number">You have '.$total_task.' pending tasks</p>
			</li>';
			if( $total_task > 0 ) {
				foreach($task_result['results'] as $rowtask) {
					$taskDesc = substr($rowtask['task_desc'], 0, 40);
					$viewTask .= '<li> <a href="'.$taskLink.'" class="task">
					<div class="green_status task_height" style="width:80%;"></div>
					<div class="task_head"> <span class="pull-left">'.$rowtask['task_heading'].'</span> <span class="pull-right green_label">80%</span> </div>
					<div class="task_detail">'.$taskDesc.'</div>
					</a> </li>';
				}
			}

			$viewTask .= '<li> <span class="new"> <a href="javascript:void(0);" data-toggle="modal" class="pull_left" data-target="#myModal">Create New</a> <a href="'.$taskLink.'" class="pull-right">View All</a> </span></li>';
		$viewTask .= '</ul>
	</li>';
	return $viewTask;
}

/* count total emails */
function countTotalEmails() {
	$CI = & get_instance();
	$CI->load->model('adminmodel');
	$ttEmail = $CI->adminmodel->getEmailsReceivedList();
	return $ttEmail['count'];
}

/* list down emails */
function getNotificationEmaiLists() {
	$CI = & get_instance();
	$CI->load->model('adminmodel');
	$emailsList = $CI->adminmodel->getEmailsReceivedList();

	$viewEmails = '';
	if( $emailsList['count'] > 0 ) {
		foreach($emailsList['results'] as $results) {
			$emailDate = date('F, j H:i', strtotime($results['em_date']));
			$detaiLink = SITE_URL.'admin/readmail/'.$results['id'];
			$viewEmails .= '<li> <a href="'.$detaiLink.'" class="mail"> <span class="photo"><img src="'.ADMIN_LIB.'images/user.png" /></span> <span class="subject"> <span class="from">'.$results['em_subject'].'</span> <span class="time"></span> </span> <span class="message">'.$emailDate.'</span> </a> </li>';
		}
	} else {
		$viewEmails .= 'No Emails Received Yet';	
	}
	return $viewEmails;
}

function get_burl($string='') {
	$rtURL = config_item('base_url');
	$baseURL = $rtURL;
	if(!empty($string)) {
		$baseURL = $rtURL.$string;
	}
	return $baseURL; 
}

function getFancyColorName($colr='') {
	if($colr == '') { return false; }
	switch ($colr) {
		case 'B':
			$colrname = 'Blue';
		break;
		case 'BN':
			$colrname = 'Brown';
		break;
		case 'BK':
			$colrname = 'Black';
		break;
		case 'CHAMELEON':
			$colrname = 'CHAMELEON';
		break;
		case 'CM':
		case 'CHAMPAGNE':
			$colrname = 'CHAMPAGNE';
		break;
		case 'G':
			$colrname = 'Green';
		break;
		case 'GY':
			$colrname = 'Gray';
		break;
		case 'O':
			$colrname = 'Orange';
		break;
		case 'P':
			$colrname = 'Pink';
		break;
		case 'PL':
			$colrname = 'Purple';
		break;
		break;
		case 'R':
			$colrname = 'Red';
		break;
		break;
		case 'Y':
			$colrname = 'Yellow';
		break;
		break;
		default:
			$colrname = 'White';
		break;
	}
	return $colrname;
}

/* get first character of each words in a string */
function firstCharOfWords($str='') {
	$str1 = explode(' ', $str); 
	$string = '';
	foreach($str1 as $str2) {
		$string .= $str2[0];
	}
	return strtoupper($string);
}

function get_month_name($numb=1) {
    switch ($numb) {
        case 1 :
            $month = 'January';
        break;
        case 2 :
            $month = 'Februray';
        break;
        case 3 :
            $month = 'March';
        break;
        case 4 :
            $month = 'April';
        break;
        case 5 :
            $month = 'May';
        break;
        case 6 :
            $month = 'June';
        break;
        case 7 :
            $month = 'July';
        break;
        case 8 :
            $month = 'August';
        break;
        case 9 :
            $month = 'September';
        break;
        case 10 :
            $month = 'October';
        break;
        case 11 :
            $month = 'November';
        break;
        case 12 :
            $month = 'December';
        break;
		default :
            $month = 'January';
        break;
    }
    return $month;
}

function viewDmShape_new($shap='') {
    if( $shap == '') { return false;}
 
    $shapes = trim($shap);

    switch($shapes) {
        case 'AS':
            $shap_name = 'Asscher';
        break;
        case 'C':
        case 'CU':
            $shap_name = 'Cushion';
        break;
        case 'E':
            $shap_name = 'Emerald';
        break;
        case 'H':
            $shap_name = 'Heart';
        break;
        case 'M':
            $shap_name = 'Marquise';
        break;
        case 'O':
            $shap_name = 'Oval';
        break;
        case 'PR':
            $shap_name = 'Princess';
        break;
        case 'P':
            $shap_name = 'Pear';
        break;
        case 'R':
        case 'RAD':
            $shap_name = 'Radiant';
        break;
        case 'B':
            $shap_name = 'Round';
        break;
        case 'BRIOLETTE':
            $shap_name = 'BRIOLETTE';
        break;
        case 'Shield':
            $shap_name = 'Shield';
        break;
        case 'T':
            $shap_name = 'Trilliant';
        break;
        default :
            $shap_name = 'Round';
        break;
    }
    return $shap_name;
}