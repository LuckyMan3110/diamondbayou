<?php
class Rings extends CI_Controller{
	public $getHaloJewleries='Halo Category';
	public $uniqueProd = FALSE;
	public $header_file = '';
	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("t_helper");
		$this->load->helper('directory');
		$this->load->helper('diamond_section');
		$this->load->helper('ringsection');
		$this->load->model("Jewelleriesmodel");
		$this->load->model("Catemodel");
		$this->load->model("Ringmodel");
		$this->load->model("Engagementringsbetamodel");
		$this->load->model('User');
		$this->load->library("pagination");
		$this->header_file = 'wsale_header';
		$this->session->set_userdata('whsale_section', 'whsale');
	}

	/* view rings via category list */
	function ringCollections($cates_id="", $start=0){
		$data = $this->getCommonData();
		if(isset($cates_id) && $cates_id == 1401){
			$cateName = 'Engagement Rings';
		}elseif(isset($cates_id) && $cates_id == 1402){
			$cateName = 'Wedding Bands';
		}elseif(isset($cates_id) && $cates_id == 1403){
			$cateName = 'Mens Wedding Bands';
		}elseif(isset($cates_id) && $cates_id == 1404){
			$cateName = 'Tennis Bracelet';
		}elseif(isset($cates_id) && $cates_id == 1405){
			$cateName = 'Diamond Stud Earrings';
		}elseif(isset($cates_id) && $cates_id == 1406){
			$cateName = 'Fashion Rings';
		}elseif(isset($cates_id) && $cates_id == 1407){
			$cateName = 'Tennis Necklace';
		}elseif(isset($cates_id) && $cates_id == 1408){
			$cateName = 'Diamond Hoop Earrings';
		}elseif(isset($cates_id) && $cates_id == 1409){
			$cateName = 'Eternity Bands';
		}elseif(isset($cates_id) && $cates_id == 1410){
			$cateName = 'Diamond Wedding Bands';
		}elseif(isset($cates_id) && $cates_id == 1411){
			$cateName = 'Stackable Rings';
		}elseif(isset($cates_id) && $cates_id == 1412){
			$cateName = 'Mens Diamond Wedding Bands';
		}elseif(isset($cates_id) && $cates_id == 1413){
			$cateName = 'Diamonds';
		}elseif(isset($cates_id) && $cates_id == 1414){
			$cateName = 'Lab Diamonds';
		}else{
			$cateName = '';
		}
		$data["maincate_name"] = $cateName;
		$data["maincate_id"] = $cates_id;
		$this->session->unset_userdata('buildring');
		$this->session->unset_userdata('search_string');

		$output = $this->load->view('rings/uniquerings_listview', $data, true);
		$this->output($output, $data);
		$this->output->cache(5);
	}

	function getcatsearchresult(){
		$params = $columns = $totalRecords = $data = array();
    	$params = $_REQUEST;
        if(isset($params['start']) AND isset($params['length'])){
			$limit 	= $params['length'];
			$offset = $params['start']; 
		}else{
			$limit  = 30;
			$offset = 0;
		}

		$search_field = isset($_POST['searchField'])?$_POST['searchField']:0;
		if(isset($search_field) && $search_field == 1401){
			$resultrowa = $this->Catemodel->getResultFor401Cat($limit,$offset);
			if(!empty($resultrowa)){
				foreach($resultrowa as $rowa){
					if(!empty($rowa['image'])){
						$images = explode(";",$rowa['image']);
						if($rowa['costar_id'] > 0){
							if(file_exists('images/'. $rowa['image_path'].$images[0].'')){
								$ringimage = SITE_URL ."images/". $rowa['image_path'].$images[0];
							}else{
								$ringimage = SITE_URL ."images/". $rowa['image_path'].$images[1];
							}
						}elseif($rowa['overnight_id'] > 0){
							if(file_exists('images/'. $rowa['image_path'].str_replace("THUMBNAIL/","",$images[0]).'')){
								$ringimage = SITE_URL ."images/". $rowa['image_path'].str_replace("THUMBNAIL/","",$images[0]);
							}else{
								$ringimage = SITE_URL ."images/". $rowa['image_path'].str_replace("THUMBNAIL/","",$images[1]);
							}
						}elseif($rowa['dev_us_id'] > 0){
							if(file_exists(''. $rowa['image_path'].$images[0].'')){
								$ringimage = SITE_URL . $rowa['image_path'].$images[0];
							}else{
								$ringimage = SITE_URL . $rowa['image_path'].$images[1];
							}
						}else{
							if(file_exists('images/'. $rowa['image_path'].$images[0].'')){
								$ringimage = SITE_URL ."images/".$rowa['image_path'].$images[0];
							}else{
								$ringimage = SITE_URL ."images/".$rowa['image_path'].$images[1];
							}
						}
					}else{
						$ringimage = '';
					}
					if($rowa['dev_us_id'] > 0){
						$sqlClr = "SELECT metal_weight,supplied_stones FROM dev_us WHERE name LIKE '".$rowa['name']."' AND id = '".$rowa['dev_us_id']."' ";
						$queryClr = $this->db->query($sqlClr);
						$resultClr = $queryClr->row();
						$cur_stones1 = explode(',',$resultClr->supplied_stones);
						$req_tot = 0;
						if(!empty($cur_stones1)){
							foreach($cur_stones1 as $cur_stone1){
								$req_data = explode('-',$cur_stone1);
								$req_tot = $req_tot + (int)$req_data[0];
							}
							$req_tot = $req_tot +1;
						}
						$weightigrm = str_replace(" grams","",$resultClr->metal_weight);
						$metalprc = 70*$weightigrm;
						$stonprc = 14*$req_tot;
						$semiMountprce = $metalprc+$stonprc;
						$finalsemiMountprce = $semiMountprce*1.5;
						$offer_price = $finalsemiMountprce+225;
					}else{
						$offer_price = $rowa['price'];
					}
					$ringName = !empty($rowa['description'])?$rowa['description']:$rowa['name'];
					$detaillinka = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowa['id'];
					$make_html = '<div class="product-block OnlyD">
						<a href="'.$detaillinka.'" class="product-block__img"><img src="'.$ringimage.'" alt="'.$ringName.'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($offer_price* 1.25) .'</div>
							<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
							<div>Setting price</div>
							<p><b>Stock Number:</b> '.$rowa['item_number'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinka.'">'.$ringName.'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_html);
					$data[] = $make_array;
				}
			}
			$resultrow1 = $this->Catemodel->countResultFor401Cat();
			$totalCount1 = count($resultrow1);
			$totalCount = $totalCount1;
		}elseif(isset($search_field) && $search_field == 1402){
			$resultrowb = $this->Catemodel->getResultFor402Cat($limit,$offset);
			if(!empty($resultrowb)){
				foreach($resultrowb as $rowb){
					$sql = "SELECT ImagePath FROM images WHERE ItemNumber LIKE '".$rowb['name']."' LIMIT 0,1";
					$rsring = $this->db->query($sql);
					$imgrsult = $rsring->row();
					$imgurl = '';
					if($rowb['catid'] == 335 || $rowb['catid'] == 336){
						if(file_exists($imgrsult->ImagePath)){
							$imgurl = SITE_URL .str_replace("THUMBNAIL/","",$imgrsult->ImagePath);
						}
						$offer_price = $rowb['priceRetail'];
					}else{
						if(file_exists('scrapper/imgs/'. $imgrsult->ImagePath .'')){
							$imgurl = SITE_URL .'scrapper/imgs/'. $imgrsult->ImagePath;
						}
						$cur_stones1 = explode(',',$rowb['supplied_stones']);
						$req_tot = 0;
						if(!empty($cur_stones1)){
							foreach($cur_stones1 as $cur_stone1){
								$req_data = explode('-',$cur_stone1);
								$req_tot = $req_tot + (int)$req_data[0];
							}
							$req_tot = $req_tot +1;
						}
						$weightigrm = str_replace(" grams","",$rowb['metal_weight']);
						$metalprc = 70*$weightigrm;
						$stonprc = 85*$req_tot;
						$semiMountprce = $metalprc+$stonprc;
						$finalsemiMountprce = $semiMountprce*1.5;
						$offer_price = $finalsemiMountprce;
					}
					$detaillinkb = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowb['ring_id'];
					$make_htmlf = '<div class="product-block OnlyA">
						<a href="'.$detaillinkb.'" class="product-block__img"><img src="'.$imgurl.'" alt="'.$rowb['name'].'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($offer_price*1.25) .'</div>
							<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rowb['name'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinkb.'">'. get_site_contact_info('dashboard_title').' #'.$rowb['name'].'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_htmlf);
					$data[] = $make_array;
				}
			}
			$resultrow2 = $this->Catemodel->countResultFor402Cat();
			$totalCount2 = count($resultrow2);
			$totalCount = $totalCount2;
		}elseif(isset($search_field) && ($search_field == 1403 || $search_field == 1412)){
			$resultrowc = $this->Catemodel->getResultFor403Cat($limit,$offset);
			if(!empty($resultrowc)){
				foreach($resultrowc as $rowc){
					$sql = "SELECT ImagePath FROM images WHERE ItemNumber LIKE '".$rowc['name']."' LIMIT 0,1";
					$rsring = $this->db->query($sql);
					$imgrsult = $rsring->row();
					$imgurl = '';
					if(file_exists('scrapper/imgs/'. $imgrsult->ImagePath .'')){
						$imgurl = SITE_URL .'scrapper/imgs/'. $imgrsult->ImagePath;
					}
					$cur_stones1 = explode(',',$rowc['supplied_stones']);
					$req_tot = 0;
					if(!empty($cur_stones1)){
						foreach($cur_stones1 as $cur_stone1){
							$req_data = explode('-',$cur_stone1);
							$req_tot = $req_tot + (int)$req_data[0];
						}
						$req_tot = $req_tot +1;
					}
					$weightigrm = str_replace(" grams","",$rowc['metal_weight']);
					$metalprc = 70*$weightigrm;
					$stonprc = 85*$req_tot;
					$semiMountprce = $metalprc+$stonprc;
					$finalsemiMountprce = $semiMountprce*1.5;
					$offer_price = $finalsemiMountprce;
					$detaillinkc = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowc['ring_id'];
					$make_htmlf = '<div class="product-block OnlyA">
						<a href="'.$detaillinkc.'" class="product-block__img"><img src="'.$imgurl.'" alt="'.$rowc['name'].'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($offer_price*1.25) .'</div>
							<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rowc['name'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinkc.'">'. get_site_contact_info('dashboard_title').' #'.$rowc['name'].'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_htmlf);
					$data[] = $make_array;
				}
			}
			$resultrow3 = $this->Catemodel->countResultFor403Cat();
			$totalCount3 = count($resultrow3);
			$totalCount = $totalCount3;
		}elseif(isset($search_field) && $search_field == 1404){
			$resultrowd = $this->Catemodel->getResultFor404Cat($limit,$offset);
			if(!empty($resultrowd)){
				foreach($resultrowd as $rowd){
					if($rowd['is_carol'] == 1){
						if(file_exists($rowd['image1'])){
							$imgPath = SITE_URL .$rowd['image1'];
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}elseif($rowd['is_oneil'] == 1){
						if(file_exists(str_replace("THUMBNAIL/","",$rowd['image1']))){
							$imgPath = SITE_URL .str_replace("THUMBNAIL/","",$rowd['image1']);
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}else{
						if(file_exists($rowd['image1'])){
							$imgPath = $rowd['image1'];
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}
					$proname = '#'.$rowd['name'];
					$detaillinkd = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowd['stock_number'];
					$make_html = '<div class="product-block OnlyC">
						<a href="'.$detaillinkd.'" class="product-block__img"><img src="'.$imgPath.'" alt="'.$proname.'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($rowd['price_website']*1.25) .'</div>
							<div class="sale-pricing">$'. _nf($rowd['price_website']) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rowd['stock_real_number'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinkd.'">'.$proname.'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_html);
					$data[] = $make_array;
				}
			}
			$resultrow4 = $this->Catemodel->countResultFor404Cat();
			$totalCount4 = count($resultrow4);
			$totalCount = $totalCount4;
		}/* elseif(isset($search_field) && $search_field == 1405){
			$resultrowe = $this->Catemodel->getResultFor405Cat($limit,$offset);
			
			$resultrow5 = $this->Catemodel->countResultFor405Cat();
			$totalCount5 = count($resultrow5);
			$totalCount = $totalCount5;
		} */elseif(isset($search_field) && $search_field == 1406){
			$resultrowf = $this->Catemodel->getResultFor406Cat($limit,$offset);
			if(!empty($resultrowf)){
				foreach($resultrowf as $rowf){
					if($rowf['is_carol'] == 1){
						if(file_exists($rowf['image1'])){
							$imgPath = SITE_URL .$rowf['image1'];
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}elseif($rowf['is_oneil'] == 1){
						if(file_exists(str_replace("THUMBNAIL/","",$rowf['image1']))){
							$imgPath = SITE_URL .str_replace("THUMBNAIL/","",$rowf['image1']);
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}else{
						if(file_exists($rowf['image1'])){
							$imgPath = $rowf['image1'];
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}
					$proname = '#'.$rowf['name'];
					$detaillinkf = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowf['stock_number'];
					$make_html = '<div class="product-block OnlyC">
						<a href="'.$detaillinkf.'" class="product-block__img"><img src="'.$imgPath.'" alt="'.$proname.'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($rowf['price_website']*1.25) .'</div>
							<div class="sale-pricing">$'. _nf($rowf['price_website']) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rowf['stock_real_number'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinkf.'">'.$proname.'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_html);
					$data[] = $make_array;
				}
			}
			$resultrow6 = $this->Catemodel->countResultFor406Cat();
			$totalCount6 = count($resultrow6);
			$totalCount = $totalCount6;
		}elseif(isset($search_field) && $search_field == 1407){
			$resultrowg = $this->Catemodel->getResultFor407Cat($limit,$offset);
			if(!empty($resultrowg)){
				foreach($resultrowg as $rowg){
					if($rowg['is_carol'] == 1){
						if(file_exists($rowg['image1'])){
							$imgPath = SITE_URL .$rowg['image1'];
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}elseif($rowg['is_oneil'] == 1){
						if(file_exists(str_replace("THUMBNAIL/","",$rowg['image1']))){
							$imgPath = SITE_URL .str_replace("THUMBNAIL/","",$rowg['image1']);
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}else{
						if(file_exists($rowg['image1'])){
							$imgPath = $rowg['image1'];
						}else{
							$imgPath = SITE_URL ."img/no_image_found.jpg";
						}
					}
					$proname = '#'.$rowg['name'];
					$detaillinkg = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowg['stock_number'];
					$make_html = '<div class="product-block OnlyC">
						<a href="'.$detaillinkg.'" class="product-block__img"><img src="'.$imgPath.'" alt="'.$proname.'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($rowg['price_website']*1.25) .'</div>
							<div class="sale-pricing">$'. _nf($rowg['price_website']) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rowg['stock_real_number'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinkg.'">'.$proname.'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_html);
					$data[] = $make_array;
				}
			}
			$resultrow7 = $this->Catemodel->countResultFor407Cat();
			$totalCount7 = count($resultrow7);
			$totalCount = $totalCount7;
		}/* elseif(isset($search_field) && $search_field == 1408){
			$resultrowh = $this->Catemodel->getResultFor408Cat($limit,$offset);
			
			$resultrow8 = $this->Catemodel->countResultFor408Cat();
			$totalCount8 = count($resultrow8);
			$totalCount = $totalCount8;
		} */elseif(isset($search_field) && $search_field == 1409){
			$resultrowi = $this->Catemodel->getResultFor409Cat($limit,$offset);
			if(!empty($resultrowi)){
				foreach($resultrowi as $rowi){
					$sql = "SELECT ImagePath FROM images WHERE ItemNumber LIKE '".$rowi['name']."' LIMIT 0,1";
					$rsring = $this->db->query($sql);
					$imgrsult = $rsring->row();
					$imgurl = '';
					if(file_exists($imgrsult->ImagePath)){
						$imgurl = SITE_URL .str_replace("THUMBNAIL/","",$imgrsult->ImagePath);
					}
					$offer_price = $rowi['priceRetail'];
					$detaillinki = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowi['ring_id'];
					$make_htmlf = '<div class="product-block OnlyA">
						<a href="'.$detaillinki.'" class="product-block__img"><img src="'.$imgurl.'" alt="'.$rowi['name'].'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($offer_price*1.25) .'</div>
							<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rowi['name'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinki.'">'. get_site_contact_info('dashboard_title').' #'.$rowi['name'].'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_htmlf);
					$data[] = $make_array;
				}
			}
			$resultrow9 = $this->Catemodel->countResultFor409Cat();
			$totalCount9 = count($resultrow9);
			$totalCount = $totalCount9;
		}elseif(isset($search_field) && $search_field == 1410){
			$resultrowj = $this->Catemodel->getResultFor410Cat($limit,$offset);
			if(!empty($resultrowj)){
				foreach($resultrowj as $rowj){
					$sql = "SELECT ImagePath FROM images WHERE ItemNumber LIKE '".$rowj['name']."' LIMIT 0,1";
					$rsring = $this->db->query($sql);
					$imgrsult = $rsring->row();
					$imgurl = '';
					if(file_exists('scrapper/imgs/'. $imgrsult->ImagePath .'')){
						$imgurl = SITE_URL .'scrapper/imgs/'. $imgrsult->ImagePath;
					}
					$cur_stones1 = explode(',',$rowj['supplied_stones']);
					$req_tot = 0;
					if(!empty($cur_stones1)){
						foreach($cur_stones1 as $cur_stone1){
							$req_data = explode('-',$cur_stone1);
							$req_tot = $req_tot + (int)$req_data[0];
						}
						$req_tot = $req_tot +1;
					}
					$weightigrm = str_replace(" grams","",$rowj['metal_weight']);
					$metalprc = 70*$weightigrm;
					$stonprc = 85*$req_tot;
					$semiMountprce = $metalprc+$stonprc;
					$finalsemiMountprce = $semiMountprce*1.5;
					$offer_price = $finalsemiMountprce;
					$detaillinkj = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowj['ring_id'];
					$make_htmlf = '<div class="product-block OnlyA">
						<a href="'.$detaillinkj.'" class="product-block__img"><img src="'.$imgurl.'" alt="'.$rowj['name'].'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($offer_price*1.25) .'</div>
							<div class="sale-pricing">$'. _nf($offer_price) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rowj['name'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinkj.'">'. get_site_contact_info('dashboard_title').' #'.$rowj['name'].'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_htmlf);
					$data[] = $make_array;
				}
			}
			$resultrow10 = $this->Catemodel->countResultFor410Cat();
			$totalCount10 = count($resultrow10);
			$totalCount = $totalCount10;
		}/* elseif(isset($search_field) && $search_field == 1411){
			$resultrowk = $this->Catemodel->getResultFor411Cat($limit,$offset);
			
			$resultrow11 = $this->Catemodel->countResultFor411Cat();
			$totalCount11 = count($resultrow11);
			$totalCount = $totalCount11;
		} */elseif(isset($search_field) && $search_field == 1413){
			$resultrowm = $this->Catemodel->getResultFor413Cat($limit,$offset);
			if(!empty($resultrowm)){
				foreach($resultrowm as $rowm){
					if($rowm['is_lab_diamond'] == 1){
						$view_shapeimage	= $rowm['image_url'];
					}elseif($rowm['image_url'] != '' && file_exists($rowm['image_url'])){
						$view_shapeimage	= SITE_URL . $rowm['image_url'];
					}else{
						if($rowm['shape'] == 'B' || $rowm['shape'] == 'Round'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
						}else if($rowm['shape'] == 'PR' || $rowm['shape'] == 'Princess'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
						}else if($rowm['shape'] == 'C' || $rowm['shape'] == 'Cushion'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
						}else if($rowm['shape'] == 'R' || $rowm['shape'] == 'Radiant'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
						}else if($rowm['shape'] == 'E' || $rowm['shape'] == 'Emerald'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
						}else if($rowm['shape'] == 'P' || $rowm['shape'] == 'Pear'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/pear.jpg';
						}else if($rowm['shape'] == 'P' || $rowm['shape'] == 'Oval'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/oval.jpg';
						}else if($rowm['shape'] == 'AS' || $rowm['shape'] == 'Asscher'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
						}else if($rowm['shape'] == 'M' || $rowm['shape'] == 'Marquise'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
						}else if($rowm['shape'] == 'H' || $rowm['shape'] == 'Heart'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/heart.jpg';
						}else{
							$view_shapeimage    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
						}
					}
					$proname = $rowm['carat'].'-Carat '.$rowm['shape'].' Diamond';
					$detaillinkm = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rowm['lot'];
					$make_html = '<div class="product-block OnlyB">
						<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
						<a href="'.$detaillinkm.'" class="product-block__img"><img src="'.$view_shapeimage.'" alt="'.$proname.'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($rowm['price']* 1.25) .'</div>
							<div class="sale-pricing">$'. _nf($rowm['price']) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rowm['lot'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinkm.'">'.$proname.'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_html);
					$data[] = $make_array;
				}
			}
			$resultrow13 = $this->Catemodel->countResultFor413Cat();
			$totalCount13 = count($resultrow13);
			$totalCount = $totalCount13;
		}elseif(isset($search_field) && $search_field == 1414){
			$resultrown = $this->Catemodel->getResultFor414Cat($limit,$offset);
			if(!empty($resultrown)){
				foreach($resultrown as $rown){
					if($rown['is_lab_diamond'] == 1){
						$view_shapeimage	= $rown['image_url'];
					}elseif($rown['image_url'] != '' && file_exists($rown['image_url'])){
						$view_shapeimage	= SITE_URL . $rown['image_url'];
					}else{
						if($rown['shape'] == 'B' || $rown['shape'] == 'Round'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/actual-dime.jpg';
						}else if($rown['shape'] == 'PR' || $rown['shape'] == 'Princess'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/princesss.jpg';
						}else if($rown['shape'] == 'C' || $rown['shape'] == 'Cushion'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/cushion_cut_diamond.jpg';
						}else if($rown['shape'] == 'R' || $rown['shape'] == 'Radiant'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/radiant.jpg';
						}else if($rown['shape'] == 'E' || $rown['shape'] == 'Emerald'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/emeraled.jpg';
						}else if($rown['shape'] == 'P' || $rown['shape'] == 'Pear'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/pear.jpg';
						}else if($rown['shape'] == 'P' || $rown['shape'] == 'Oval'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/oval.jpg';
						}else if($rown['shape'] == 'AS' || $rown['shape'] == 'Asscher'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/asscher.jpg';
						}else if($rown['shape'] == 'M' || $rown['shape'] == 'Marquise'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/marquise.jpg';
						}else if($rown['shape'] == 'H' || $rown['shape'] == 'Heart'){
							$view_shapeimage    = ''.SITE_URL.'images/shapes_images/heart.jpg';
						}else{
							$view_shapeimage    = ''.SITE_URL.'img/diamond_shapes/dm_noimage.jpg';
						}
					}
					$proname = $rown['carat'].'-Carat '.$rown['shape'].' Diamond';
					$detaillinkn = SITE_URL . 'rings/rings_view_detail/'.$search_field.'/'.$rown['lot'];
					$make_html = '<div class="product-block OnlyB">
						<span class="product-block__badge"><img src="'.SITE_URL .'images/CyberWeekSale.png" alt="Black Friday Sale" /></span>
						<a href="'.$detaillinkn.'" class="product-block__img"><img src="'.$view_shapeimage.'" alt="'.$proname.'" /></a>
						<div class="product-block__pricing">
							<div class="old-pricing">$'. _nf($rown['price']* 1.25) .'</div>
							<div class="sale-pricing">$'. _nf($rown['price']) .' <small>(25% off)</small></div>
							<p><b>Stock Number:</b> '.$rown['lot'].'</p>
						</div>
						<h3 class="product-block__heading"><a href="'.$detaillinkn.'">'.$proname.'</a></h3>
						<div class="product-block__stock product-in-stock">Online Only</div>
						<div class="product-block__ratings">
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
							<div class="product-rating-star is--filled">
								<div></div>
							</div>
						</div>
					</div>';
					$make_array  = array('0' => $make_html);
					$data[] = $make_array;
				}
			}
			$resultrow14 = $this->Catemodel->countResultFor414Cat();
			$totalCount14 = count($resultrow14);
			$totalCount = $totalCount14;
		}

		$json_data = array(
			"draw"            => intval($params['draw']),
			"recordsTotal"    => intval(isset($totalCount)?$totalCount:0),
			"recordsFiltered" => intval(isset($totalCount)?$totalCount:0),
			"data"            => $data
		);
	    echo json_encode($json_data);
	}

	function rings_view_detail($catid=0,$id, $rngsize='6', $metal='14KW', $avsizes=''){
		$this->session->unset_userdata('shape');
		$burl = config_item('base_url');
		$data = $this->getCommonData();
		$data['setings_id'] = isset($id)?$id:0;
		$cates_id = isset($catid)?$catid:'';
		if(isset($cates_id) && $cates_id == 1401){
			$data['catgory_id'] = $cates_id;
			$data['parent_cate'] = 'Engagement Rings';
			$detail = $this->Jewelleriesmodel->getringsdetails('dev_engagement_rings','id',$id);
			$data["details"] = isset($detail[0])?$detail[0]:array();
			$ezvalues = $this->Jewelleriesmodel->getezvalue();
			$data['ez3value'] = $ezvalues[0]['ezvalue'];
			$data['ez5value'] = $ezvalues[1]['ezvalue'];
			$data['buynow_link'] = htmlspecialchars(config_item('base_url').'shbasket_wholesale/addtoshoppingcart/');
			$this->load->view($this->config->item('template').$this->header_file , $data);
			$this->load->view('rings/uniquedetail_ringsview' , $data);
			$this->load->view($this->config->item('template').'wsale_footer', $data);
			$this->output->cache(5);
		}elseif(isset($cates_id) && ($cates_id == 1402 || $cates_id == 1403 || $cates_id == 1409 || $cates_id == 1410 || $cates_id == 1412)){
			if(isset($cates_id) && $cates_id == 1403){
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Mens Wedding Bands';
			}elseif(isset($cates_id) && $cates_id == 1409){
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Eternity Bands';
			}elseif(isset($cates_id) && $cates_id == 1410){
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Diamond Wedding Bands';
			}elseif(isset($cates_id) && $cates_id == 1412){
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Mens Diamond Wedding Bands';
			}else{
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Wedding Bands';
			}
			$product_id = $id;
			$sqls = "SELECT catid,name FROM `dev_us` WHERE id LIKE '". $product_id ."'";
			$queryvar = $this->db->query($sqls);
			$resultVar = $queryvar->row();
			if($resultVar->catid == 335 || $resultVar->catid == 336){
				$sqlnew = "SELECT stock_number FROM `dev_jewelries_new` WHERE stock_real_number LIKE '". $resultVar->name ."' AND `category` LIKE 'Wedding Bands'";
				$querynew = $this->db->query($sqlnew);
				$resultnew = $querynew->row();
				$productID = $resultnew->stock_number;
				$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
				$metals_type='';
				$data['title'] = 'Wedding Bands Detail';
				$ezvalue_row = $this->Commonmodel->getEzOptionValues();
				$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
				$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];
				$ring_size = $this->input->get('ring_size');
				$rsize_price = 0;
				$rowsring = $this->Ringmodel->getSternCollectionDetail($productID);
				if( isset($_GET['style']) AND isset($_GET['metal_type']) AND isset($_GET['quality']) AND isset($_GET['carat_item']) AND isset($_GET['ring_size']) ){ 
					if( empty($_GET['style']) ){
						$get_style = $rowsring['subcategory'];
					}else{
						$get_style = $_GET['style'];
					}
					if( empty($_GET['quality']) ){
						$get_quality = $rowsring['quality'];
					}else{
						$get_quality = $_GET['quality'];
					}
					if( empty($_GET['gender']) ){
						$get_gender = $rowsring['gender'];
					}else{
						$get_gender = $_GET['gender'];
					}
					if( empty($_GET['carat_item']) ){
						$get_carat_item = $rowsring['center_stone_sizes'];
					}else{
						$get_carat_item = $_GET['carat_item'];
					}
					if( empty($_GET['ring_size']) ){
						$get_ring_size = $rowsring['ring_size'];
					}else{
						$get_ring_size = $_GET['ring_size'];
					}
					$get_diamond_size = $rowsring['diamond_size'];
					$get_chain_weight = $rowsring['chain_weight'];
					$get_avail_size = '';
					$rowsring_items = $this->Ringmodel->getSternCollectionDetail360Item($_GET['style'], $_GET['metal_type'], $get_quality, $get_carat_item, $get_ring_size, $get_gender, $get_diamond_size, $get_chain_weight, $get_avail_size);
					$product_new_id = $rowsring_items['stock_number'];
					if($product_new_id){
						$rowsring = $this->Ringmodel->getSternCollectionDetail($product_new_id);
					}else{
						$rowsring = $this->Ringmodel->getSternCollectionDetail($productID);
					}
				}   
				$subcategory            = $rowsring['subcategory']; 
				$get_carat_item         = $rowsring['center_stone_sizes'];
				$get_quality            = $rowsring['quality'];
				$resultForMetal         = $this->Ringmodel->getSternDistinctCollectionDetail360Item($subcategory, $get_carat_item, $get_quality,  $rowsring['gender'], $rowsring['diamond_size'], $rowsring['chain_weight'], $rowsring['ring_size']);
				$data['resultForMetal'] = $resultForMetal;

				$jew_metal = set_jew_metal($rowsring['metal'], $rowsring['carat']);
				$metal_type = $jew_metal;

				$data['global_fields'] = '';
				$data['category_name'] = jewelry_cate_name( $rowsring['category'] );
				$categoryID = ( !empty($rowsring['subcategory']) ? $rowsring['subcategory'] : $rowsring['category'] );

				$data['bread_crumb_link'] = '';
				$data['comp_jew_title'] = $this->Ringmodel->get_ebay_cat_name($rowsring['category']);
				$metals_link = SITE_URL . 'collection/collection-detail/'.$productID.'/';
				$data['metal_type_options'] = $this->get_metal_type($metals_link, $metal_type);
				$rowsring['price'] = $rowsring['price_website'];

				$where_dev_ebaycategories_cat    = array('category_id' => $rowsring['subcategory']);
				$dev_ebaycategories_data         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');
				$categoryNames1 = isset($dev_ebaycategories_data['0']->category_name)?$dev_ebaycategories_data['0']->category_name:'';

				$where_dev_ebaycategories_cat2    = array('category_id' => $rowsring['category']);
				$dev_ebaycategories_data2         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat2, 'dev_ebaycategories');
				$categoryNames2 = isset($dev_ebaycategories_data2['0']->category_name)?$dev_ebaycategories_data2['0']->category_name:'';

				$data['rowsring']       = $rowsring;
				$data['heart_title'] = ''.get_site_contact_info('dashboard_title').' '.$categoryNames1.' '.$categoryNames2.' '.$rowsring['item_title']; 
				$data['sales_price'] = $rowsring['price_website'] + $rsize_price;
				$data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
				$data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
				$data['buynow_link'] = htmlspecialchars(config_item('base_url').'shbasket_wholesale/addtoshoppingcart/');
				$data['item_desc'] = get_site_title().' Jewelry can be yours for $'._nf($rowsring['price_website'], 2).'.';
				$data['our_price'] = ( $rowsring['price_website'] > 0 ? '$'._nf($rowsring['price_website'], 2) : 'Please Call ' . CONTACT_NO . ' for price' );

				$ringBoxDesc = $data['category_name'];
				$data['ringtitle'] = $ringBoxDesc. ' Item ID: '. $rowsring['stock_real_number'];
				if($rowsring['is_carol'] == 1){
					$data['ringimg']   = SITE_URL .$rowsring['image1'];
				}elseif($rowsring['is_oneil'] == 1){
					$data['ringimg']   = SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image1']);
				}else{
					$data['ringimg']   = SITE_URL .$rowsring['image1'];
				}
				$data['setingtype']   = '';
				$data['maincate_name'] = '';
				$data['subcate_link'] = '';
				$data['metals_list'] = $this->set_metal_links( $productID, $rowsring['ring_style'], $metal_type, $rowsring['metal_color'] );
				$id = $rowsring['subcategory'];
				$data['view_coments'] = '';
				$data['finished_level'] = $this->finishlevel( $productID, 'gold', 'options' );
				$data['rings_allowed_id'] = array(3292598018);
				$ringresults = $this->Catemodel->getFingerSizeResult();
				$base_link = SITE_URL.'collection/collection-detail/'.$productID.'/';
				$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
				if( count((array)$ringresults) > 0 ) {
					foreach( $ringresults as $rowsize ) {
						$rgsz = setRingSize($rowsize['ring_size']);
						$finger_size .= '<option value="'.$base_link.'?ring_size='.$rgsz.'" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
					}
				}
				$data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
				$data['extraheader'] .= '<link href="'.SITE_URL.'css/magnific-popup.css" rel="stylesheet" />';
				$data['extraheader'] .= '<link href="'.SITE_URL.'collection_detail/heart_collection_detail_1.css" rel="stylesheet" />';
				$data['extraheader'] .= '<link href="'.SITE_URL.'collection_detail/heart_collection_detail_2.css" rel="stylesheet" />';
				////// item thumbs
				$data['page_link'] = $base_link;
				$data['finger_ring_size'] = $finger_size;
				$data['prod_thumbs'] = $this->heart_collection_images( $rowsring, $data['heart_title'], 'detail' );
				$data['product_thumbs'] = $data['prod_thumbs']['thumbs'];
				$data['small_thumbs']   = $data['prod_thumbs']['small_thumbs'];
				$data['rings_thumb'] = '';
				$center_stone = $this->collection_diamond_options();
				$data['stone_count'] = $center_stone['diamond_count'];
				$data['collections_cate'] = $this->Catemodel->getCollectionCateName( $rowsring['category'] );
				$this->session->set_userdata('stone_cate_id', $rowsring['category']);

				$this->load->view($this->config->item('template').$this->header_file , $data);
				if($rowsring['is_oneil'] == 1){
					$this->load->view('rings/oneil_wedding_bands_detail' , $data);
				}else{
					$this->load->view('rings/carol_wedding_bands_detail' , $data);
				}
				$this->load->view($this->config->item('template').'wsale_footer', $data);
				$this->output->cache(120);
			}else{
				$ring_size = $this->input->get('ring_size');
				$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
				$base_link = SITE_URL.'collection/collection-detail/'.$product_id.'/';
				$ezvalue_row = $this->Engagementringsbetamodel->getEzOptionValues();
				$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
				$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];

				$ringresults = $this->Engagementringsbetamodel->getFingerSizeResult();
				$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';

				if( count((array)$ringresults) > 0 ) {
					$req_param = '';
					if(!empty($_GET['carat'])){
						if(!empty($_GET)){
							$req_param .= '&carat='.$_GET['carat'];
						}else{
							$req_param = '?carat='.$_GET['carat'];
						}
					}
					foreach( $ringresults as $rowsize ) {
						$rgsz = setRingSize($rowsize['ring_size']);
						$selected = '';
						$ring_size_link = $base_link.'?ring_size='.$rgsz.$req_param;
						if(isset($_GET['ring_size'])){ if($rgsz == $_GET['ring_size']){ $selected = 'selected="selected"';} }
						$finger_size .= '<option value="'.$ring_size_link.'" '.$selected.' '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
					}
				}
				$data['finger_ring_size'] = $finger_size;
				$rowsring = $this->Engagementringsbetamodel->getRingsDetailViaId($product_id, $metal, $ring_size);
				$rowsring['prd_id'] = $product_id;
				$data["getparent_cate"] = getMainCatParentCateID($rowsring['catid']);
				$data['shipping_policy'] = $this->get_page_content('shipping-policy');
				$data['finance_policy'] = $this->get_page_content('finance-policy');
				$data['wedding_band'] = strchr( $rowsring['parent_cate'], 'Bands' );
				$ctstone_shape = $rowsring['additional_stones']; 
				$find_ctsahpe = getCenterStoneShape($ctstone_shape);
				$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
				$suport_shape_img = view_shape_value($diamond_shape_img, ucwords( strtolower( $data['suport_shape'] ) ) );
				$data['supported_shape'] = SITE_URL . 'images/shapes_images/' . $diamond_shape_img;
				$data['buildring'] = $this->session->userdata('buildring');
				$data['rowsring'] = $rowsring;
				$data['rowsring']['priceRetail'] = $rowsring['priceRetail'];

				$cur_stones1 = explode(',',$rowsring['supplied_stones']);
				$req_tot = 0;
				if(!empty($cur_stones1)){
					foreach($cur_stones1 as $cur_stone1){
						$req_data = explode('-',$cur_stone1);
						$req_tot = $req_tot + (int)$req_data[0];
					}
					$req_tot = $req_tot +1;
				}
				$metalprc = 0; $weightigrm = str_replace(" grams","",$rowsring['metal_weight']);
				if($rowsring['matalType'] == '14KP'){
					$metalprc = 70*$weightigrm;
				}							
				if($rowsring['matalType'] == '14KW'){
					$metalprc = 70*$weightigrm;
				}
				if($rowsring['matalType'] == '14KY'){
					$metalprc = 70*$weightigrm;
				}
				if($rowsring['matalType'] == '18KP'){
					$metalprc = 97.9*$weightigrm;
				}
				if($rowsring['matalType'] == '18KW'){
					$metalprc = 97.9*$weightigrm;
				}
				if($rowsring['matalType'] == '18KY'){
					$metalprc = 97.9*$weightigrm;
				}
				if($rowsring['matalType'] == 'PLAT'){
					$metalprc = 121*$weightigrm;
				}
				$stonprc = 85*$req_tot;
				$semiMountprce = $metalprc+$stonprc;
				$finalsemiMountprce = $semiMountprce*1.5;

				$data['retail_price'] = $finalsemiMountprce;
				$data['saving_percent'] = 45.43;
				$data['ring_id'] = $product_id;
				$this->session->set_userdata('ringID',$product_id);
				$d_id = $this->session->userdata('diamnd_id');
				$dm_id = ( !empty($d_id) ? $d_id : 'false' );
				$data['addtoring_link'] = htmlspecialchars(config_item('base_url').'engagement/complete_youring/'.$dm_id.'/'.$product_id.'/addtoring/');
				$data['buynow_link'] = htmlspecialchars(config_item('base_url').'shbasket_wholesale/addtoshoppingcart/');
				$cate = $this->getCateName( $rowsring['catid'] );
				if($rowsring['matalType'] == '14KP'){
					$matalTypes = '14 Karat Pink Gold';
				}elseif($rowsring['matalType'] == '14KY'){
					$matalTypes = '14 Karat Yellow Gold';
				}elseif($rowsring['matalType'] == '18KP'){
					$matalTypes = '18 Karat Pink Gold';
				}elseif($rowsring['matalType'] == '18KW'){
					$matalTypes = '18 Karat White Gold';
				}elseif($rowsring['matalType'] == '18KY'){
					$matalTypes = '18 Karat Yellow Gold';
				}elseif($rowsring['matalType'] == 'PLAT'){
					$matalTypes = 'Platinum';
				}else{
					$matalTypes = '14 Karat White Gold';
				}
				$data['ringtitle'] = $matalTypes.' '.$cate['main_cname'].' Cut Diamond Unique Engagement Ring ';
				$results['item_thumbs'] = $this->Ringmodel->getRingThumbs( $rowsring['name'] );
				$data['product_circle'] = $this->getProductThumb( $results, 'listing', $rowsring['name'], $data['ringtitle'], '400', '', 'details');
				$data['product_thums'] = $data['product_circle']['thumb_image'];
				$data['thumbs_count'] = $data['product_circle']['thumbs_count']-2;
				$data['ringimg']   = SITE_URL . 'scrapper/imgs/'.$rowsring['ImagePath'];
				$data['setingtype']   = $cate['sub_cname'];
				$data['maincate_name'] = $cate['main_cname'];
				$data['subcate_link'] = '<a href="'.SITE_URL.'selection/engagement_ring_listings/'.$rowsring['catid'].'" title="">'.$cate['main_cname'].' Diamond Engagement Rings</a>';
				if(isset($_GET['carat'])){
					$carats = $_GET['carat'];
				}else{
					$carats = str_replace(" CT.","",$rowsring['stone_weight']);
				}
				$data['extra_headers'] = '';
				$data['extra_headers'] .= '<script language="javascript" src="'.SITE_URL.'js/jquery.popup.js" type="text/javascript"></script>';
				$data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
				$data['extraheader'] .= '<link type="text/css" href="' . SITE_URL . 'css/magnific-popup.css" rel="stylesheet" />';
				$rings_thumb = $this->getProductThumb( $rowsring );
				$data['rings_thumb'] = $rings_thumb['thumb_circle'];
				$data['suported_shapes'] = $this->getDimaondShapeImage( $rowsring );
				$getring_shape = getSuppliedStoneShape( $rowsring['supplied_stones'] );
				$aditional_ratios = getAdditonalStonesRatio( $rowsring['additional_stones'] );

				if( empty($rowsring['additional_stones']) ) {
					$this->session->set_userdata('shape', $getring_shape.'.');
					$this->session->unset_userdata('length');
					$this->session->unset_userdata('width');
					$this->session->unset_userdata('carat');
				} else {
					$this->session->set_userdata('shape_stone', $aditional_ratios['size_shape'].'.');
					$this->session->set_userdata('length', $aditional_ratios['length']);
					$this->session->set_userdata('width', $aditional_ratios['width']);
					$this->session->set_userdata('ringcarat', $aditional_ratios['carat']);
				}
				$ringsMetal = $rowsring['ringsMetal'];
				$defaultMetal = ( !empty( $metal )  ? $metal : $ringsMetal[0]['matalType'] );
				$defaultRingSz = ( !empty( $ring_size )  ? $ring_size : $rowsring['ringSize'] );
				$data['default_metal'] = $defaultMetal;
				$data['set_ring_size'] = resetsSlugTitle($defaultRingSz);

				$setsizes = explode('|', $rowsring['availblesize']);
				$trimmedArray = array_map('trim', $setsizes);
				array_filter($trimmedArray);
				$ringWeight = '';
				$metaList = array();
				$testar = array();
				$availableSizs = array();
				$available_insizes = ''; 
				foreach($trimmedArray as $rows_avsize) {
					if( !empty($rows_avsize) ) :
						$metailWeight = $this->Ringmodel->getMetalRingWeight($rows_avsize);
						$availableSizs[] = $rows_avsize;
						if(!in_array($metailWeight['metal_weight'], $testar)) {
							$metaList[] = array('ring_id'=>$metailWeight['id'], 'ring_metal'=>$metailWeight['metal_weight']);
							$testar[]  = $metailWeight['metal_weight'];
						}
					endif;
				}

				if( empty($avsizes) ) {
					$this->session->set_userdata('setmetal_list', $metaList);
				}

				$currMetalSizes = $this->session->userdata('setmetal_list'); //print_ar($currMetalSizes);
				if( count((array)$currMetalSizes) > 0 ) {
					$req_param = '';
					if(!empty($_GET['carat'])){
						if(!empty($req_param)){
							$req_param .= '&carat='.$_GET['carat'];
						}else{
							$req_param = '?carat='.$_GET['carat'];
						}
					}
					$ringWeight .= '<option value="">Available Sizes</option>';
					foreach($currMetalSizes as $rows_avsize) {
						$metaLink = SITE_URL.'selection/engagement-rings-detail/'.trim($rows_avsize['ring_id']).'/'.$defaultRingSz.'/'.$defaultMetal.'/'.$product_id.$req_param;			
						$ringWeight .= '<option value="'.$metaLink.'" '.selectedOption($rows_avsize['ring_id'], $product_id).'>'.$rows_avsize['ring_metal'].'</option>';
						$available_insizes .= '<div class="tabsRow">
						<div class="metaLeft">Size:
						<span class="sizeBlock"><a href="'.$metaLink.'">'.$rows_avsize['ring_metal'].'</a></span>
						</div>
						</div>';

					}
				} else {
					$ringWeight .= '<option value="">Available Sizes</option>';
				}

				$req_param = '';
				if(!empty($_GET['carat'])){
					if(!empty($req_param)){
						$req_param .= '&carat='.$_GET['carat'];
					}else{
						$req_param = '?carat='.$_GET['carat'];
					}
				}
				$getRingsSize = '';
				if( count((array)$rowsring['ringsSizes']) > 0 ) {
					foreach($rowsring['ringsSizes'] as $rng_size) {
						$rgsz = setRingSize($rng_size['ringSize']);
						$rings_rdlink = SITE_URL.'selection/engagement-rings-detail/'.$product_id.'/'.$rgsz.'/'.$defaultMetal.$req_param;
						$getRingsSize .= '<option value="'.$rings_rdlink.'" '.selectedOption($rgsz, $ring_size).'>'.$rng_size['ringSize'] . ' (+$'.$rng_size['priceRetail'].')' .'</option>';
					}
				} else {
					$getRingsSize .= '<option value="">Ring Sizes</option>';
				}
				$getRingsMetal = '';
				if( count((array)$rowsring['ringsMetal']) > 0 ) {
					$req_param = '';
						$seg1 = $this->uri->segment(1);
								$seg2 = $this->uri->segment(2);
					if(!empty($_GET['diamond_lot'])){
						$req_param = '?diamond_lot='.$_GET['diamond_lot'];
					}
					if(!empty($_GET['ring_size'])){
						if(!empty($req_param)){
							$req_param .= '&ring_size='.$_GET['ring_size'];
						}else{
							$req_param = '?ring_size='.$_GET['ring_size'];
						}
					}
					if(!empty($_GET['carat'])){
						if(!empty($req_param)){
							$req_param .= '&carat='.$_GET['carat'];
						}else{
							$req_param = '?carat='.$_GET['carat'];
						}
					}
					foreach($rowsring['ringsMetal'] as $rings_metal) {
						$req_add = '';
						if( $rings_metal['matalType'] != 'PLAT' ) {
							$req_add = 'Gold';
						}

						if( $rings_metal['matalType'] != 'PDIUM' ) {
							$metal_rdlink = SITE_URL.$seg1.'/'.$seg2.'/'.$product_id.'/'.$defaultRingSz.'/'.trim($rings_metal['matalType']).$req_param;
							$getRingsMetal .= '<option value="'.$metal_rdlink.'" '.selectedOption($rings_metal['matalType'], $metal).'>'.set_ring_metal($rings_metal['matalType']).' '.$req_add.'</option>';
						}
					}
				} else {
					$getRingsMetal .= '<option value="">Metal Type</option>';
				}

				$data['ringsmetail'] = $getRingsMetal;
				$data['ring_weight']   = $ringWeight;
				$data['defaultMetal']      = $defaultMetal;
				$data['available_insizes'] = $available_insizes;
				$data['title'] = $data['ringtitle'].', '.$data['rowsring']['supplied_stones'].', '.$data['rowsring']['stone_weight'];
				//printr($data);
				$data['meta_tags'] = '<meta name="ROBOTS" content="INDEX,FOLLOW">
				<meta name="description" content="Buy online emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
				<meta name="keywords" content="emerald cut diamond rings, three stone diamond rings, 3 stone diamond ring, antique diamond ring, set engagement ring, tension engagement rings, affordable engagement ring, 3 stone diamond ring, antique diamond ring, set engagement ring, pave diamond rings, '.$data['title'].'">
				<meta name="author" content="'.get_site_contact_info('sites_title').'">
				<meta name="publisher" content="'.get_site_contact_info('sites_title').'">
				<meta name="copyright" content="'.get_site_contact_info('sites_title').'">
				<meta http-equiv="Reply-to" content="">
				<meta name="creation_Date" content="12/12/2008">
				<meta name="expires" content="">
				<meta name="revisit-after" content="7 days">';
				$data['ringsize_option'] = $getRingsSize;
				$data['row_cate'] = $this->getCateName($rowsring['catid']);

				$this->load->view($this->config->item('template').$this->header_file , $data);
				$this->load->view('rings/unique_wedding_bands_detail' , $data);
				$this->load->view($this->config->item('template').'wsale_footer', $data);
				$this->output->cache(120);
			}
		}elseif(isset($cates_id) && ($cates_id == 1404 || $cates_id == 1406 || $cates_id == 1407)){
			if(isset($cates_id) && $cates_id == 1406){
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Fashion Rings';
			}elseif(isset($cates_id) && $cates_id == 1407){
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Tennis Necklace';
			}else{
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Tennis Bracelet';
			}
			$product_id = $id;
			$data['title'] = 'Jewelary Detail';
			$data['onload_class'] = 'catalog-product-view product-14k-gold-diamond-three-stone-engagement-ring-set-128c-p-24728 categorypath-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings-aspx category-diamond-engagement-rings-wholesale-preset-gold-diamond-engagement-rings';
			$imagesName = array();
			$ezvalue_row = $this->Commonmodel->getEzOptionValues();
			$data['first_ez_value'] = $ezvalue_row[0]['ezvalue'];
			$data['second_ez_value'] = $ezvalue_row[1]['ezvalue'];
			$data['shipping_policy'] = $this->get_page_content('shipping-policy');
			$ring_size = $this->input->get('ring_size');
			$main_ring_size = resetsSlugTitle($ring_size);
			$rsize_price = $this->Catemodel->getFingerSizePrice( $main_ring_size );
			$rowsring = $this->Ringmodel->getSternCollectionDetail($product_id);
			if( isset($_GET['style']) && isset($_GET['metal_type']) && isset($_GET['quality']) && isset($_GET['carat_item']) && isset($_GET['ring_size']) ){ 
				if( empty($_GET['style']) ){
					$get_style = $rowsring['subcategory'];
				}else{
					$get_style = $_GET['style'];
				}
				if( empty($_GET['quality']) ){
					$get_quality = $rowsring['quality'];
				}else{
					$get_quality = $_GET['quality'];
				}
				if( empty($_GET['gender']) ){
					$get_gender = $rowsring['gender'];
				}else{
					$get_gender = $_GET['gender'];
				}
				if( empty($_GET['carat_item']) ){
					$get_carat_item = $rowsring['center_stone_sizes'];
				}else{
					$get_carat_item = $_GET['carat_item'];
				}
				if( empty($_GET['ring_size']) ){
					$get_ring_size = $rowsring['ring_size'];
				}else{
					$get_ring_size = $_GET['ring_size'];
				}
				$get_diamond_size = $rowsring['diamond_size'];
				$get_chain_weight = $rowsring['chain_weight'];
				$get_avail_size = '';
				$rowsring_items = $this->Ringmodel->getSternCollectionDetail360Item($_GET['style'], $_GET['metal_type'], $get_quality, $get_carat_item, $get_ring_size, $get_gender, $get_diamond_size, $get_chain_weight, $get_avail_size);
				$product_new_id = $rowsring_items['stock_number'];
				if($product_new_id){
					$rowsring = $this->Ringmodel->getSternCollectionDetail($product_new_id);
				}else{
					$rowsring = $this->Ringmodel->getSternCollectionDetail($product_id);
				}
			}   
			$subcategory            = $rowsring['subcategory']; 
			$get_carat_item         = $rowsring['center_stone_sizes'];
			$get_quality            = $rowsring['quality'];
			$resultForMetal         = $this->Ringmodel->getSternDistinctCollectionDetail360Item($subcategory, $get_carat_item, $get_quality,  $rowsring['gender'], $rowsring['diamond_size'], $rowsring['chain_weight'], $rowsring['ring_size']);
			$data['resultForMetal'] = $resultForMetal;

			$jew_metal = set_jew_metal($rowsring['metal'], $rowsring['carat']);
			$metal_type = ( empty($metals_type) ? $jew_metal : $metals_type );
			$priceField = $this->get_price_field($metal_type);

			$prod_price = $rowsring[$priceField];
			$globalFields = unserialize( $rowsring['global_fields'] );

			$data['global_fields'] = $this->get_global_fields( $globalFields );
			$data['category_name'] = jewelry_cate_name( $rowsring['category'] );
			$categoryID = ( !empty($rowsring['subcategory']) ? $rowsring['subcategory'] : $rowsring['category'] );

			$data['bread_crumb_link'] = '';
			$data['comp_jew_title'] = $this->Ringmodel->get_ebay_cat_name($rowsring['category']);
			$metals_link = SITE_URL . 'rings/rings_view_detail/'.$cates_id.'/'.$product_id.'';
			$data['metal_type_options'] = $this->get_metal_type($metals_link, $metal_type);
			$rowsring['price'] = ( $prod_price > 0 ? $prod_price : $rowsring['price_website'] );

			$where_dev_ebaycategories_cat    = array('category_id' => $rowsring['subcategory']);
			$dev_ebaycategories_data         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat, 'dev_ebaycategories');
			$categoryName1 = isset($dev_ebaycategories_data['0']->category_name)?$dev_ebaycategories_data['0']->category_name:'';

			$where_dev_ebaycategories_cat2    = array('category_id' => $rowsring['category']);
			$dev_ebaycategories_data2         = $this->Catemodel->getdata_any_table_where($where_dev_ebaycategories_cat2, 'dev_ebaycategories');
			$categoryName2 = isset($dev_ebaycategories_data2['0']->category_name)?$dev_ebaycategories_data2['0']->category_name:'';

			$data['rowsring']       = $rowsring;
			$data['heart_title'] = ''.get_site_contact_info('dashboard_title').' '. $categoryName1 .' '. $categoryName2 .' '.$rowsring['item_title']; 
			$data['sales_price'] = $rowsring['price_website'] + $rsize_price;
			$data['retail_price'] = $data['sales_price'] * PRICE_PERCENT;
			$data['saving_percent'] = ( 100 - ( ( $data['sales_price'] / $data['retail_price'] ) * 100 ) );
			$data['buynow_link'] = htmlspecialchars(config_item('base_url').'shbasket_wholesale/addtoshoppingcart/');
			$data['item_desc'] = get_site_title().' Jewelry can be yours for $'._nf($rowsring['price_website'], 2).'.';
			$data['our_price'] = ( $rowsring['price_website'] > 0 ? '$'._nf($rowsring['price_website'], 2) : 'Please Call ' . CONTACT_NO . ' for price' );

			$ringBoxDesc = $data['category_name'];
			$data['ringtitle'] = $ringBoxDesc. ' Item ID: '. $rowsring['stock_real_number'];
			if($rowsring['is_carol'] == 1){
				$data['ringimg']   = SITE_URL .$rowsring['image1'];
			}elseif($rowsring['is_oneil'] == 1){
				$data['ringimg']   = SITE_URL .str_replace("THUMBNAIL/","",$rowsring['image1']);
			}else{
				$data['ringimg']   = SITE_URL .$rowsring['image1'];
			}
			$data['setingtype']   = '';
			$data['maincate_name'] = '';
			$data['subcate_link'] = '';
			$data['metals_list'] = $this->set_metal_links($product_id, $cates_id, $rowsring['ring_style'], $metal_type, $rowsring['metal_color']);
			$id = $rowsring['subcategory'];
			$data['more_collection_listings_new'] = ''; 
			$data['rings_allowed_id'] = array(3292598018);
			$ringresults = $this->Catemodel->getFingerSizeResult();
			$base_link = SITE_URL . 'rings/rings_view_detail/'.$cates_id.'/'.$product_id.'';
			$finger_size = '<option value="'.$base_link.'?ring_size=">Select Finger Size</option>';
			if( count($ringresults) > 0 ) {
				foreach( $ringresults as $rowsize ) {
					$rgsz = setRingSize($rowsize['ring_size']);
					$finger_size .= '<option value="'.$base_link.'?ring_size='.$rgsz.'" '.selectedOption($rgsz, $ring_size).'>'.$rowsize['ring_size'].'</option>';
				}
			}
			$data['extraheader'] = '<link type="text/css" href="' . SITE_URL . 'css/magnify_zoom.css" rel="stylesheet" />';
			$data['extraheader'] .= '<link href="'.SITE_URL.'css/magnific-popup.css" rel="stylesheet" />';
			$data['extraheader'] .= '<link href="'.SITE_URL.'collection_detail/heart_collection_detail_1.css" rel="stylesheet" />';
			$data['extraheader'] .= '<link href="'.SITE_URL.'collection_detail/heart_collection_detail_2.css" rel="stylesheet" />';
			$data['page_link'] = $base_link;
			$data['finger_ring_size'] = $finger_size;
			$data['prod_thumbs'] = $this->heart_collection_images( $rowsring, $data['heart_title'], 'detail' );
			$data['product_thumbs'] = $data['prod_thumbs']['thumbs'];
			$data['small_thumbs']   = $data['prod_thumbs']['small_thumbs'];
			$data['rings_thumb'] = '';
			$center_stone = $this->collection_diamond_options();
			$data['recently_purchased'] = '';
			$data['stone_count'] = $center_stone['diamond_count'];
			$data['collections_cate'] = $this->Catemodel->getCollectionCateName( $rowsring['category'] );
			$this->session->set_userdata('stone_cate_id', $rowsring['category']);

			$this->load->view($this->config->item('template').$this->header_file , $data);
			if($rowsring['is_oneil'] == 1){
				$this->load->view('rings/oneil_collections_detail_view' , $data);
			}else{
				$this->load->view('rings/heart_collections_detail_view' , $data);
			}
			$this->load->view($this->config->item('template').'wsale_footer', $data);
			$this->output->cache(120);
		}elseif(isset($cates_id) && ($cates_id == 1413 || $cates_id == 1414)){
			if(isset($cates_id) && $cates_id == 1414){
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Lab Diamonds';
			}else{
				$data['catgory_id'] = $cates_id;
				$data['parent_cate'] = 'Diamonds';
			}

			$lot		= urldecode($id);
			$data['lot'] 	= $lot;
			$data['addoption']	= 'false';
			$data['settingsid']	= '';
			$data['suplied_stone_link'] = '';
			$view_diamondimg	= '';
			$add_option = 'false';

			$row_detail = $this->Ringmodel->getDetailsByLot($lot);
			if(empty($row_detail)){
				redirect(base_url().'rings/ringCollections/'.$cates_id.'');
			}
			$data['row_detail'] = $row_detail;
			if($row_detail['vdbapp_id'] > 0 && $row_detail['vdbapp_id'] != '99999'){
				$sqlClr = "SELECT video_url FROM dev_vdbapp_jewelry WHERE id = '".$row_detail['vdbapp_id']."'";
				$queryClr = $this->db->query($sqlClr);
				$resultClr = $queryClr->row();
				$data['row_detail']['video_url'] = $resultClr->video_url;
			}
			//$data['row_sdiamond'] = $this->Ringmodel->getNewSimilarDiamonds($row_detail);
			$data['buynow_link'] = htmlspecialchars(config_item('base_url').'shbasket_wholesale/addtoshoppingcart/');
			$addoption_arlist = array('addpendantsetings3stone','tothreestone');
			if( in_array($add_option,$addoption_arlist)) {
				$this->session->set_userdata('ctcart_value', $row_detail['carat']);
				$this->session->set_userdata('center_dmid', $row_detail['lot']);
				$this->session->set_userdata('shape', $row_detail['shape']);
			}
			$image_path = config_item('base_url').'images/shapes_images/';
			$coloredm_imgpath = config_item('base_url').'img/diamond_shapes/';
			$data['diamond_shape'] = view_shape_value($view_diamondimg, $row_detail['shape']);

			$image_dmshape = strtolower($data['diamond_shape']);
			$image_cltype = getDiamondColr($row_detail['fcolor_value']);

			if($row_detail['fcolor_value'] != ''){
				$data['diamond_type'] = 'Colored Diamond';
				$shape_image = $coloredm_imgpath.$image_cltype.'_'.$image_dmshape.'.jpg'; //echo $shape_image;exit;
				$data['view_shapeimage'] = ( getimagesize($shape_image) ? $shape_image : $coloredm_imgpath.'dm_noimage.jpg' );
			} else {
				$data['diamond_type'] = 'White Diamond';
				$data['view_shapeimage'] = $image_path.$view_diamondimg;
			}

			$data ['extraheader'] = '<link type="text/css" href="' . config_item('base_url') . 'css/tabs_style.css" rel="stylesheet" />';
			$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/nanoscroller.css" rel="stylesheet" />';
			$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/organictabs.jquery.js" type="text/javascript"></script>';
			$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.nanoscroller.js" type="text/javascript"></script>';
			$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/angular.min.js" type="text/javascript"></script>';
			$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';

			$arpendant_option = array('addpendantsetings3stone','tothreestone');
			if(in_array($add_option, $arpendant_option)) {
				$data ['pendanType'] = 'threestone';
				$data ['pendanStep'] = 2;
				$this->session->set_userdata('diamond_view', current_url());
			} else {
				$data ['pendanType'] = $this->session->userdata('pendant_option');
				$data ['pendanStep'] = 2;
			}		
			$this->session->set_userdata('diamnd_id', $lot);
			$data['setting_ring_id']   = $this->session->userdata('ringID');
			$ring_cate_id   = $this->session->userdata('ring_cate_id');
			$ringrq_fields = $this->session->userdata('rqring_fields');
			if(isset($ringrq_fields['image_vurl']) && !empty($ringrq_fields['image_vurl'])) {
				$data['setting_image'] = $ringrq_fields['image_vurl'];
			} else {
				$data['setting_image'] = SITE_URL.'img/page_img/no_image.jpg';
			}
			if(isset($ringrq_fields['ring_price']) && !empty($ringrq_fields['ring_price']) ) {
				$data['setting_price'] = _nf($ringrq_fields['ring_price'], 2);
			} else {
				$data['setting_price'] = '0.00';
			}
			if( $add_option == 'addtoring' ) {
				$this->session->set_userdata('build_ring', 'addtoring');
			}
			$this->load->view($this->config->item('template').$this->header_file , $data);
			$this->load->view('rings/viewdiamond_detail' , $data);
			$this->load->view($this->config->item('template').'wsale_footer', $data);
			$this->output->cache(120);
		}elseif(isset($cates_id) && $cates_id == 1405){
			$data['catgory_id'] = $cates_id;
			$data['parent_cate'] = 'Diamond Stud Earrings';
			$detail = array();
		}elseif(isset($cates_id) && $cates_id == 1408){
			$data['catgory_id'] = $cates_id;
			$data['parent_cate'] = 'Diamond Hoop Earrings';
			$detail = array();
		}elseif(isset($cates_id) && $cates_id == 1411){
			$data['catgory_id'] = $cates_id;
			$data['parent_cate'] = 'Stackable Rings';
			$detail = array();
		}else{
			$data['catgory_id'] = 1401;
			$data['parent_cate'] = 'Engagement Rings';
			$detail = array();
		}
	}

	function get_page_content($topic='') {
		$row_content = $this->Commonmodel->getCompanyInfoRow($topic);
		if(isset($row_content['content'])){
			$page_content = check_empty($row_content['content'], 'Coming Soon');
		}else{
			$page_content = 'Coming Soon';
		}
		return $page_content;
	}

	function get_price_field($metal='') {
		switch ($metal) {
			case '14k_gold':
				$field_name = 'g14_wh_price';
				break;
			case '18k_gold':
				$field_name = 'g18_wh_price';
				break;
			case 'platinum':
				$field_name = 'plat_wh_price';
				break;
				default :
				$field_name = 'g14_wh_price';
				break;
		}
		return $field_name;
	}

	function get_global_fields($gFields=array()) {
		$itemLables = '';
		if(!empty($gFields)) {
			foreach($gFields as $rows) {
				if( strchr($rows[0], 'Image') == FALSE ) {
					$itemLables .= '<div class="detail_bk_row">
						<div class="detail_left_cols">' . ucwords( strtolower($rows[0]) ) . '</div>
						<div class="detail_right_cols">'.$rows[1].'</div>
						<div class="clear"></div>
					</div>';
				}
				if( $rows[0] == 'CENTER STONE TAG' ) {
					$this->session->set_userdata('center_stone', $rows[1]);
				}
			}
		}
		return $itemLables;
	}

	function get_metal_type($link='', $metal_val='') {
		$metals = array('14k_gold' => '14K Gold', '18k_gold' => '18K Gold', 'platinum' => 'Platinum');
		$metal_options = '';
		foreach( $metals as $metalkey => $metal_value ) {
			$metal_options .= '<option value="' . $link . $metalkey . '" '.selectedOption($metalkey, $metal_val).'>'.$metal_value.'</option>';
		}
		return $metal_options;
	}

	function set_metal_links($ring_id=0, $cates_id, $ringstyle=0, $metal_type='', $metal_color='') {
		$metal_ic = $metal_ic = array(
			array('ring_id' => 0, 'icon' => 'yellow_14kgold_ic.jpg', 'metal' => 'Yellow Gold', 'carat' => '14','metal_type' =>'14k_gold','color'=>'Yellow'),
			array('ring_id' => 0, 'icon' => 'yellow_gold_ic.jpg', 'metal' => 'Yellow Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'Yellow'),
			array('ring_id' => 0, 'icon' => 'white_gold_ic.jpg', 'metal' => 'White Gold', 'carat' => '14', 'metal_type' => '14k_gold','color'=>'White'),
			array('ring_id' => 0, 'icon' => 'white_18gold_ic.jpg', 'metal' => 'White Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'White'),
			array('ring_id' => 0, 'icon' => 'rose_gold_ic.jpg', 'metal' => 'Rose Gold', 'carat' => '14', 'metal_type' => '14k_gold','color'=>'Rose'),
			array('ring_id' => 0, 'icon' => 'rose_18gold_ic.jpg', 'metal' => 'Rose Gold', 'carat' => '18', 'metal_type' => '18k_gold','color'=>'Rose'),
			array('ring_id' => 0, 'icon' => 'platinum_ic.jpg', 'metal' => 'Platinum', 'carat' => '', 'metal_type' => 'platinum','color'=>'')
		);
		$metal_list = '<ul>';
		$i = 1;
		foreach( $metal_ic as $metalrow ) {
			$metal_link = SITE_URL . 'rings/rings_view_detail/'.$cates_id . '/'.$ring_id . '/'. $metalrow['metal_type'];
			if( $metalrow['color'] == $metal_color && !empty($metal_color) ){
				if( $i == 2 ) {
					$metal_list .= '<li><a href="'.SITE_URL . 'rings/rings_view_detail/'.$cates_id . '/'.$ring_id.'/platinum"><img src="'.SITE_URL.'images/platinum_ic.jpg" /></a></li>';
				}
				$metal_list .= '<li><a href="'.$metal_link.'"><img src="'.SITE_URL.'images/'.$metalrow['icon'].'" /></a></li>';
				$i++;   
			}
		}
		$metal_list .= '</ul>';
		return $metal_list;
	}

	function heart_collection_images($rows=array(), $ring_title='', $detail='', $recent='') {
		$collection = array();
		$flderPath = COLLECTION_FOLDER;
		$collections_link = 'http://www.thegoldsourcejewelry.com/images/';
		if( empty($detail) ) {
			$lightbox_class = '';
			$res_class      = '';
		} else {
			$lightbox_class = 'portfolio-box';
			$res_class      = 'img-responsive';
		}
		for( $i=1; $i <= 6; $i++ ) {
			if( !empty($rows['image'.$i]) ) {
				$collection[] = $rows['image'.$i];
			}
		}

		$jewelryImage = $this->get_collection_img( $rows['global_fields'] );
		if( count($jewelryImage) > 0 ) {
			$collection_thumb = $jewelryImage;
		} else {
			$collection_thumb = $this->get_image_via_folder($rows['item_sku'], $rows['different_imglist']);
		}

		$tt_count = count((array)$collection_thumb);
		$j = 1;
		$tt_count = 1;
		$set_ring_thumb = '';
		$set_popup_thumb = '';
		$set_ring_small_thumb = '';
		if( !empty($rows['image1']) ) {
			if($detail == 'detail'){
				for( $i=1; $i <= 6; $i++ ) {
					if( !empty($rows['image'.$i]) ) {
						$set_ring_thumb .= '<div class="sp active_view set_position" id="video_show_div_'.$i.'"><img src="'.$rows['image'.$i].'" width="200" height="153" alt="Diamond Image" /></div>';
						$set_ring_small_thumb .= '<a href="#javascript" onclick="show_video_image(\'video_show_div_'.$i.'\')">
						<img src="'.$rows['image'.$i].'" width="80" height="80" alt="Diamond Image" style="margin-left: 15px;border: solid 1px #cccccc;margin-right: 15px;" />
						</a>';  
					}
				}
			}else{
				for( $i=1; $i <= 6; $i++ ) {
					if( !empty($rows['image'.$i]) ) {
						if($i == 1){
							$set_ring_thumb .= '<div class="sp active_view set_position" id="video_show_div_'.$i.'"><img src="'.$rows['image'.$i].'" width="200" height="153" alt="'.$ring_title.'" /></div>';

							$set_ring_small_thumb .= '<a href="#javascript" onclick="show_video_image(\'video_show_div_'.$i.'\')">
							<img src="'.$rows['image'.$i].'" width="80" height="80" alt="'.$ring_title.'" style="margin-left: 15px;border: solid 1px #cccccc;margin-right: 15px;" />
							</a>';
						}
					}
				}
			}
			if($rows['comment'] != '' AND $detail == 'detail'){
				$set_ring_small_thumb .= '<a href="#javascript" onclick="show_video_image(\'video_show_div\')">
				<img src="'.SITE_URL.'images/360-spin-button_white.jpg" width="80" height="80" alt="video" style="margin-left: 15px;border: solid 1px #cccccc;margin-right: 15px;" />
				</a>';
				$set_ring_thumb .= '<div id="video_show_div" class="sp active_view set_position" style="position: absolute; overflow: hidden; display: none;width: 98%;">
				<video controls style="position: relative; left: 0px; top: 0px; width: 100%; height: 100%; margin: 0px; padding: 0px; max-width: none; max-height: none; border: medium none; line-height: 0; visibility: visible;" src="'.SITE_URL.'images/'.$rows['comment'].'"></video>
				</div>';
			}
		}else{
			$set_ring_thumb = '<div class="sp active_view set_position"><img src="'.SITE_URL.'img/no_image_found.jpg" width="200" height="153" alt="'.$ring_title.'" /></div>';
		}
		$returns['small_thumbs']    = $set_ring_small_thumb;
		$returns['thumbs']          = $set_ring_thumb;
		$returns['popup_thumbs']    = $set_popup_thumb;
		$returns['total']           = $tt_count;

		return $returns;
	}

	function get_collection_img($serialField='') {
		$imgList = array();
		if( !empty($serialField) ) {
			$globalFields = unserialize( $serialField );

			foreach( $globalFields as $rows ) {
				if( strchr($rows[1], 'Image') != '' ) {
					$imgList[] = $rows[1];
				}
			}
		}
		return $imgList;
	}

	function get_image_via_folder($item_sku='', $imgFields='') {
		foreach(glob('webimages/completed_images/*') as $filename){
			$folderImageName = basename($filename);
			$check_str = strchr($folderImageName, $item_sku);
			if( !empty($check_str) ) {
				$imagesName[] = $folderImageName;
			}
		}
		$other_img = $this->set_multi_color_img($imgFields);
		if( count( $other_img ) > 0 ) {
			return $other_img;
		} else {
			return isset($imagesName)?$imagesName:'';
		}
	}

	function set_multi_color_img($img_fields='', $color='Y') {
		$view_img = array();
		if( !empty($img_fields) ) {
			$img_list = unserialize( $img_fields );
			if( count($img_list) > 0 ) {
				foreach( $img_list as $img ) {
					if( strchr($img, $color) ) {
						$view_img[] = $img;
					}
				}
			}
		}
		return $view_img;
	}

	function collection_diamond_options() {
		$center_stone = $this->session->userdata('center_stone');
		$str = explode('=', $center_stone);
		$return['carat'] = isset($str[1])?$str[1]:'';
		$return['shape'] = substr($str[0], -2);
		$return['diamond_count'] = substr($str[0], 0, -2);

		return $return;
	}

	function finishlevel($rid='', $metal='gold', $level='') {
		$rowsring = $this->Ringmodel->sternProductDetail( $rid );
		$field_figur = $this->getFinishedLevel( $metal );
		$finishOptions = array(
			$metal.'_polished'.$field_figur => 'Polished',
			$metal.'_semimount'.$field_figur => 'Semi Mount',
			$metal.'_complete'.$field_figur => 'complete'
		);

		$options = '';
		$i = 1;
		foreach( $finishOptions as $fskey => $fsvalue ) {
			if(isset($rowsring[$fskey]) && $rowsring[$fskey] > 0 ) {
				$optionValue = ( $fsvalue === 'Semi Mount' ? 'semimount' : setSlugTitle($fsvalue) );
				$options .= '<option value="'.$optionValue.'" '.selectedOption(1, $i).'>'.$fsvalue.'</option>';
				$i++;
			}
		}
		$return['prices'] = isset($rowsring[$metal.'_polished'.$field_figur])?$rowsring[$metal.'_polished'.$field_figur]:'';
		$return['metal_list'] = $options;

		if( $level === 'finish' ) {
			echo $return['prices'] . '_' . $options;
		} else {
			return $options;
		}
	}

	function getFinishedLevel($metal='gold') {
        $field_figur = '';
        if( $metal == 'gold' ) {
            $field_figur = '_1300';
        } elseif( $metal == 'silver' ) {
            $field_figur = '_40';
        } elseif( $metal == 'platinum' ) {
            $field_figur = '_1200';
        }

        return $field_figur;
    }

	function getCateName( $cid=0 ) {
		$catevalue = array();
		$subparent = $this->Catemodel->getparentCateID( $cid );
		$parent_cid = $this->Catemodel->get_unique_main_cate_id( $cid );
		$catevalue['main_cname'] = $this->Catemodel->getRingCategoryName( $cid );
		$catevalue['sub_cname'] = $this->Catemodel->getRingCategoryName($subparent);        
		$catevalue['main_cid'] = $cid;
        $catevalue['sub_cid']  = $subparent;
       
		if( $cid == 40 || $subparent == 40 ) {
			$catevalue['main_cate_name'] = 'Engagement Rings';
			$catevalue['main_cate_id'] = 40;
		} else if( $cid == 57 || $subparent == 57 ) {
			$catevalue['main_cate_name'] = 'Necklace and Pendants';
			$catevalue['main_cate_id'] = 57;
		} else if( $parent_cid == 63 ) {
			$catevalue['main_cate_name'] = 'Bands';
			$catevalue['main_cate_id'] = 63;
		} else if( $parent_cid == 7 ) {
			$catevalue['main_cate_name'] = 'Engagement Rings';
			$catevalue['main_cate_id'] = 7;
		} else {
			$catevalue['main_cate_name'] = '';
			$catevalue['main_cate_id'] = 0;
		}
		$catevalue['parent_cid'] = $parent_cid;

        return $catevalue;
	}

	function getProductThumb($rowaray=array(), $popup='', $item_id='', $item_title='', $width=215, $height=215, $detail='') {
		$getRingsThumb = '';
		$check_thumb = array();
		$ring_title = $this->getRingTitle( $rowaray );
		$i = 1;
		$itemID = trim( $item_id );
		$set_ring_thumb = '';
		$set_popup_thumb = '';

		$new_array_for_image  = array();
        if(isset($rowaray['item_thumbs']) && count((array)$rowaray['item_thumbs']) > 0){
			foreach($rowaray['item_thumbs'] as $rng_thumb){
				if($detail == 'details'){
					$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
					if($i == 2){
						$new_array_for_image[] = '<a class="lightbox" id="light_a" href="'.$ringsView.'"><img id="light_img" src="'.$ringsView.'" style="margin: 0px 0px;width:100%;" alt="'.$item_title.'" /></a><br><br>';
					}else{
						$new_array_for_image[] = '<a class="lightbox" onclick="ch_imgs(\''.$ringsView.'\')"><img src="'.$ringsView.'" style="width:100px;height:100px;display:inherit;margin: 5px;" alt="'.$item_title.'" /></a>';
					}
				}else{
					$unique_id = 'bk_'.$i.'_'.$item_id;
					$ringsThumb = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePathThumb'];
					$ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];

					if(!in_array($rng_thumb['ImagePathThumb'], $check_thumb)){
						if(empty($popup)){
							$getRingsThumb .= '<div class="smalimgview">
								<a href="#javascript;" onclick="ringThumbView(\''.$ringsView.'\')"><img src="'.$ringsThumb.'" alt=""></a>
							</div>';
						} else {
							if($popup == 'listing'){
								$getRingsThumb .= '<li id="'.$i.'"><a href="javascript://" onclick="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'" onmouseover="ringsThumbView(\''.$ringsView.'\', \''.$itemID.'\', \''.$i.'\');" title="'.$ring_title.'">'. '<img src="'.SITE_URL.'img/heart_diamond/in_active_circle.jpg" width="9" height="9" alt="'.$ring_title.'"></a>'. '</li>';
							} else {
								$getRingsThumb .= '<li><a href="javascript://" onclick="ringThumbView(\''.$ringsView.'\');" title="'.$ring_title.'"><img src="'.$ringsThumb.'" width="31" alt="'.$ring_title.'"></a> </li>';
							}
						}

						$active_class = ( $i == 2 ? 'active_view' : 'hide_imgbk' );
						if( empty($detail) ) {
							if( $i == 2 ) {
								$set_ring_thumb = '<img src="'.$ringsView.'" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" />'; 
							}
						} else {
							$set_ring_thumb .= '<div class="sp '.$active_class.'" id="'.$unique_id.'"><img src="'.$ringsView.'" onmouseover="show_magnify_affect(\''.$unique_id.'\')" width="'.$width.'" height="'.$height.'" alt="'.$item_title.'" /></div>';
							if( $i == 2 ) {
								$set_popup_thumb .= '<a href="'.$ringsView.'"><img src="'.SITE_URL.'img/search_plus_ic.png" alt="" width="28" /></a>';
							} else {
								$set_popup_thumb .= '<a href="'.$ringsView.'"></a>';
							}
						}
					}
					$check_thumb[] = $rng_thumb['ImagePathThumb'];
				}
				$i++;
			}
		} else {
			$getRingsThumb .= '';
		}

        if($new_array_for_image){
            $increeee = 1;
            $our_swap_back          = $new_array_for_image[0];
            $new_array_for_image[0] = $new_array_for_image[1];
            $new_array_for_image[1] = $our_swap_back;
            foreach ($new_array_for_image as $new_arrayimage) {
                $set_ring_thumb .= $new_arrayimage; 
                $increeee++;
            }
        }
        $return['thumb_circle'] = $getRingsThumb;
        $return['thumb_image']  = $set_ring_thumb;
        $return['thumbs_popup'] = $set_popup_thumb;
		$return['thumbs_count'] = $i;
        return $return;
    }

	function getRingTitle($rowring=array(), $similar=''){
		if(isset($rowring) && !empty($rowring)){
			$catId = isset($rowring['catid'])?$rowring['catid']:0;
			$matalType = isset($rowring['matalType'])?$rowring['matalType']:'';
			$stoneWeight = isset($rowring['stone_weight'])?$rowring['stone_weight']:'';
			$cate = $this->getCateName($catId);
			if($matalType == '14KP'){
				$matalTypes = '14 Karat Pink Gold';
			}elseif($matalType == '14KY'){
				$matalTypes = '14 Karat Yellow Gold';
			}elseif($matalType == '18KP'){
				$matalTypes = '18 Karat Pink Gold';
			}elseif($matalType == '18KW'){
				$matalTypes = '18 Karat White Gold';
			}elseif($matalType == '18KY'){
				$matalTypes = '18 Karat Yellow Gold';
			}elseif($matalType == 'PLAT'){
				$matalTypes = 'Platinum';
			}else{
				$matalTypes = '14 Karat White Gold';
			}
			if( empty($similar) ) {
				$rtitle = $stoneWeight.' '.$matalTypes.' '.$cate['main_cname'].' Cut Diamond Engagement Ring '.$cate['sub_cname'] .' Style';
			} else {
				$rtitle = $stoneWeight.' '.$matalTypes.' '.$cate['main_cname'].' Cut Diamond <br>Engagement Ring '.$cate['sub_cname'] .' Style';
			}
			return $rtitle;
		}else{
			return;
		}
	}

	function getDimaondShapeImage($rowshape=array()) {
		$getring_shape = getSuppliedStoneShape( $rowshape['supplied_stones'] );
		$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
		$center_stshapes = array('B'=>'round','H'=>'heart','E'=>'emerald','PR'=>'princess','R'=>'radiant','O'=>'oval','M'=>'marquise','AS'=>'asscher','P'=>'pear','C'=>'cushion');
		$view_ctshape = '';
		$shapPath = SITE_URL.'img/diamond_shapes/';
		$ctstone_shape = $rowshape['additional_stones']; 
		$find_ctsahpe = getCenterStoneShape($ctstone_shape);
		$data['suport_shape'] = ( !empty($ctstone_shape) ? strtoupper( implode(', ', $find_ctsahpe) ) : 'Support any shape' );
		$i=0;
		foreach($center_stshapes as $sid => $shap_list) {
			$shap_img = 'ct_'.$shap_list.'.jpg';
			$altitle = strtoupper($shap_list);

			if( !empty($ctstone_shape) ) {
				if(in_array($shap_list, $find_ctsahpe))
				$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
				} else {
				$view_ctshape .= '<a href="#javascript;" class="currShape" alt="'.$altitle.'"><img src="'.$shapPath.$shap_img.'" id="'.$sid.'_sh" onclick="setShapeInCenterStone(\''.$sid.'_sh\')" alt="'.$altitle.'" /></a>';
			}
		}
        return $view_ctshape;
    }

	/* view rings via category list */
	function rings_view_list($cates_id="", $start=0){
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		$this->output->cache(5);
		$this->load->library("pagination");
		$data = $this->getCommonData();

		$this->session->unset_userdata('buildring');

		$config["per_page"] = 12;
		$config["num_links"] = 50;
		$config["uri_segment"] = 5;
		$config['use_page_numbers'] = TRUE;

		$ringresults = $this->Catemodel->getRingsByCateory($cates_id, $start, $config["per_page"]);
		$config["total_rows"] = $ringresults['total'];
		$config["base_url"] = config_item('base_url')."rings/rings_view_list/".$cates_id."/";
		$total_pages = ceil( $config["total_rows"] / $config["per_page"]);
		$lastPage = $config["per_page"] * ($total_pages  - 1);

		$getparent_cate = getMainCatParentCateID($cates_id);
		$style_cateid = $cate1 = $this->Catemodel->getparentCateID($cates_id);
		$data["maincate_name"] = $this->Catemodel->getRingCategoryName($getparent_cate);
		$data["cates_name"] = $this->Catemodel->getRingCategoryName($cates_id);
		$data["cates_stnam"] = $this->Catemodel->getRingCategoryName($style_cateid);
		$data["cates_stname"] = '';
		if( strcmp( $data["maincate_name"], $data["cates_stnam"] ) !== 0 ) 
		{
		$data["cates_stname"] = $data["cates_stnam"];
		}
		$data["sbcate_link"] = config_item('base_url').'rings/rings_view_category/'.$cates_id;
		$data["ttpages"] = $total_pages;
		$data["getparent_cate"] = $getparent_cate;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		////// unique collections fields and functionality
		$slide_stone = $this->get_vr('slide_stone');
		$hallo 		 = $this->get_vr('hallo');
		$bridal 	 = $this->get_vr('bridal');
		$off_set 	 = $this->get_vr('off_set');
		$offs_set	 = $this->session->set_userdata('some_name', $off_set);

		$data['results_rings'] = $ringresults['results'];

		$data["hallo"] 		= $hallo;
		$data["sideStone"]  = $slide_stone;
		$data["bridal"] 	= $bridal;
		$data["engage_styles"] = $st;
		$data["price_sort"] = $price_sort;		
		$data['catgory_id'] = $cates_id;

		$data ['extraheader'] = '<script language="javascript" src="' . config_item('base_url') . 'js/hover_prodetail.js"></script>';
		$data ['extraheader'] .= '<link type="text/css" href="' . config_item('base_url') . 'css/jquery.popup.css" rel="stylesheet" />';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/jquery.popup.js" type="text/javascript"></script>';
		$data ['extraheader'] .= '<script language="javascript" src="' . config_item('base_url') . 'js/common_function.js" type="text/javascript"></script>';
		$this->pagination->initialize($config); 
		$data['pagination_links'] = '';
		$paginate = '';
		///// $this->pagination->create_links()

		if($config["total_rows"] > 0) {
		$data['pagination_links'] = '<li><a href="'.$config["base_url"].'">First</a>&nbsp; < </li>';
		for($i=1; $i<=$total_pages; $i++) {
			$j = $i - 1;
			$page_start = $j * $config["per_page"];
			$startLimit = ( $i == 1 ? $i : $page_start );			
				$paginate .= '<option value="'.$config["base_url"].$startLimit.'" '.selectedOption($startLimit, $start).'>'.$i.'</option>';
				$data['pagination_links'] .= '<li><a href="'.$config["base_url"].$startLimit.'">'.$i.'</a></li>';
				
			}
			$data['pagination_links'] .= '<li><a href="'.$config["base_url"].$lastPage.'">Last</a></li>';
		} else {
			$paginate = '<option>1</option>';
		}
		$data["paginate"] = $paginate;
		$this->session->unset_userdata('search_string');
		$output = $this->load->view('rings/uniquerings_listview', $data, true);//new
		$this->output($output, $data);
	}

	/* view category list */
	function rings_view_category($cates_id=""){
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);

		$this->output->cache(5);

		$this->load->library("pagination");
		$data = $this->getCommonData();

		$config["base_url"]=config_item('base_url')."rings/rings_view_category/".$catid."/";
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsmystullerfur($catname);
		$config["per_page"]=18;
		$config["num_links"]=5;
		$config["uri_segment"] = 5;
		$getparent_cate = getMainCatParentCateID($cates_id);
		$data["maincate_name"] = $this->Catemodel->getRingCategoryName($getparent_cate);
		$data["cates_name"] = $this->Catemodel->getRingCategoryName($cates_id);
		$data["sbcate_link"] = config_item('base_url').'rings/rings_view_category/'.$cates_id;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		////// unique collections fields and functionality
		$slide_stone = $this->get_vr('slide_stone');
		$hallo 		 = $this->get_vr('hallo');
		$bridal 	 = $this->get_vr('bridal');
		$off_set 	 = $this->get_vr('off_set');
		$offs_set	 = $this->session->set_userdata('some_name', $off_set);

		$data["hallo"] 		= $hallo;
		$data["sideStone"]  = $slide_stone;
		$data["bridal"] 	= $bridal;
		$data["engage_styles"] = $st;
		$data["price_sort"] = $price_sort;		
		$data['catgory_id'] = $cates_id;
		$results_subcate = $this->Catemodel->getSubCategory($cates_id);
		$r=1;
		$baseLink = config_item('base_url');
		$trialUserLogo = get_trial_user_logo();
		$viewCateListView = '';
		$hoverContent = '';
		if(count($results_subcate)>0){
			foreach($results_subcate as $rowsub_cate){
				$ringdetail_link = $baseLink.'rings/rings_view_list/'.$rowsub_cate['id'];
				$subcate_service = 'webservice_apis/index.php?type=subcate&cateid=';
				$rings_service   = 'webservice_apis/index.php?type=ringsview&cateid=';
				$check_subcate = $this->Catemodel->getSubCategory($rowsub_cate['id']);
				$checkring_list= $this->Catemodel->checkCateRingsExist($rowsub_cate['id']);
				if( count($check_subcate) == 0) {
					if($cates_id == 49) {
						if($rowsub_cate['id'] == 50) {
							$ringsCateId = 180;
						} elseif($rowsub_cate['id'] == 51) {
							$ringsCateId = 181;
						} else {
							$ringsCateId = $rowsub_cate['id'];
						}
						$furtherLink = $baseLink.'rings/rings_view_list/'.$ringsCateId;
					} else {
						$furtherLink = $baseLink.'rings/rings_view_list/'.$rowsub_cate['id'];	
					}
				} else {
					$furtherLink = $baseLink.'rings/rings_view_category/'.$rowsub_cate['id'];
				}
				$cateImgLink = $baseLink.'crone/'.$rowsub_cate['image'];
				$viewCateListView .= '<div class="engagement-product"><span class="setcolr">&ndash;</span>
				<div class="image-engagement">
				<div class="setringsbg_bk">'.$trialUserLogo.'</div>
				<a href="'.$furtherLink.'">&nbsp;<img src="'.$cateImgLink.'" alt="'.$rowsub_cate['catname'].'" width="155" hight="144"></a>
				<meta class="desc" content="'.$hoverContent.'">
				</div>
				<div class="dw-arrow"><img src="'.$baseLink.'images/down-ar.png" align="Down Arrow" /></div>
				<div class="price-product ringprice-section">
				<p class="ring-engagement"><a href="'.$furtherLink.'">'.$rowsub_cate['catname'].'</a></p>
				<div></div>
				</div>
				</div>';
				$r++;
			}
		} else {
			$viewCateListView .= '<h4 class="norecordMesage">No Ring Catgory Records Found</h4>';
		}
		$data['viewCateListView'] = $viewCateListView;
		$output = $this->load->view('rings/uniquerings_cateview', $data, true);//new
		$this->output($output, $data);
	}

	/* view category list */
	function ringsMainCategory($cates_id=""){
		parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
		$this->output->cache(5);
		$this->load->library("pagination");
		$data = $this->getCommonData();
		$config["base_url"]=config_item('base_url')."rings/rings_view_category/".$cates_id."/";
		$config["total_rows"]=$this->Jewelleriesmodel->numofrowsmystullerfur(isset($catname)?$catname:'');
		$config["per_page"]=18;
		$config["num_links"]=5;
		$config["uri_segment"] = 5;
		$getparent_cate = getMainCatParentCateID($cates_id);
		$data["maincate_name"] = $this->Catemodel->getRingCategoryName($getparent_cate);
		$data["cates_name"] = $this->Catemodel->getRingCategoryName($cates_id);
		$data["sbcate_link"] = config_item('base_url').'rings/rings_view_category/'.$cates_id;

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		////// unique collections fields and functionality
		$slide_stone = $this->get_vr('slide_stone');
		$hallo 		 = $this->get_vr('hallo');
		$bridal 	 = $this->get_vr('bridal');
		$off_set 	 = $this->get_vr('off_set');
		$offs_set	 = $this->session->set_userdata('some_name', $off_set);

		$data["hallo"] 		= $hallo;
		$data["sideStone"]  = $slide_stone;
		$data["bridal"] 	= $bridal;
		$data["engage_styles"] = isset($st)?$st:'';
		$data["price_sort"] = isset($price_sort)?$price_sort:'';
		$data['catgory_id'] = $cates_id;
		$results_subcate = $this->Catemodel->getSubCategory($cates_id);

		$r=1;
		$baseLink = config_item('base_url');
		$trialUserLogo = get_trial_user_logo();
		$viewCateListView = '';
		$hoverContent = '';
		if(count($results_subcate)>0){
			foreach($results_subcate as $rowsub_cate){
				$ringdetail_link = $baseLink.'rings/rings_view_list/'.$rowsub_cate['id'];

				$subcate_service = 'webservice_apis/index.php?type=subcate&cateid=';
				$rings_service   = 'webservice_apis/index.php?type=ringsview&cateid=';
				$check_subcate = $this->Catemodel->getSubCategory($rowsub_cate['id']);
				$checkring_list= $this->Catemodel->checkCateRingsExist($rowsub_cate['id']);
				if( count($check_subcate) == 0) {
					if($cates_id == 49) {
						if($rowsub_cate['id'] == 50) {
							$ringsCateId = 180;
						} elseif($rowsub_cate['id'] == 51) {
							$ringsCateId = 181;
						} else {
							$ringsCateId = $rowsub_cate['id'];
						}
						$furtherLink = $baseLink.'rings/rings_view_list/'.$ringsCateId;
					} else {
						$furtherLink = $baseLink.'rings/rings_view_list/'.$rowsub_cate['id'];	
					}
				} else {
					$furtherLink = $baseLink.'rings/rings_view_category/'.$rowsub_cate['id'];
				}
				$cateImgLink = $baseLink.'crone/'.$rowsub_cate['image'];
				$viewCateListView .= '<div class="engagement-product"><span class="setcolr">&ndash;</span>
				<div class="image-engagement">
				<div class="setringsbg_bk">'.$trialUserLogo.'</div>
				<a href="'.$furtherLink.'">&nbsp;<img src="'.$cateImgLink.'" alt="'.$rowsub_cate['catname'].'" width="155" hight="144"></a>
				<meta class="desc" content="'.$hoverContent.'">
				</div>
				<div class="dw-arrow"><img src="'.$baseLink.'images/down-ar.png" align="Down Arrow" /></div>
				<div class="price-product ringprice-section">
				<p class="ring-engagement"><a href="'.$furtherLink.'">'.$rowsub_cate['catname'].'</a></p>
				<div></div>
				</div>
				</div>';
				$r++;
			}
		} else {
			$viewCateListView .= '<h4 class="norecordMesage">No Ring Catgory Records Found</h4>';
		}
		$data['viewCateListView'] = $viewCateListView;
		$output = $this->load->view('rings/uniquerings_cateview', $data, true);//new
		$this->output($output, $data);
	}

	function settingDesc($rows) {
		$seting_dmshape = view_shape_value( $imgs, $rows['shape'] );
		$seting_metal   = metal_label( $rows['metal'] );
		$seting_style = ucwords( str_replace('-',' ',$rows['style']) );
		$seting_desc = $seting_metal.' '.$seting_style.' '.$seting_dmshape.' Diamond Stud Earrings';
		return $seting_desc;
	}

	function get_vr($fd) {
		$field_vl = '';
		if(isset($_GET[$fd]) && !empty($_GET[$fd])) {
			$field_vl = $_GET[$fd];
		}
		return $field_vl;
	}

	private function getCommonData($banner = '') {
		$data = array();
		$data = $this->Commonmodel->getPageCommonData();
		return $data;
	}

	function output($layout = null, $data = array(), $isleft = true, $isright = true) {
		$data['loginlink'] = $this->User->loginhtml();
		$output = $this->load->view($this->config->item('template') . $this->header_file, $data, true);
		$output .= $layout;
		if ($isright)
		$output .= $this->load->view($this->config->item('template') . 'right', $data, true);
		$output .= $this->load->view($this->config->item('template') . 'wsale_footer', $data, true);
		$this->output->set_output($output);
	}
}
?>