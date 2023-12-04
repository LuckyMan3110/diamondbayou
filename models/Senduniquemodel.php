<?php  
    class Senduniquemodel extends CI_Model {

        function __construct()
        {
            parent::__construct();
            $this->load->model( 'adminmodel' );
            $this->load->model( 'catemodel' );
        }
        
    function sendUniqueRingToEbay($diamond_id=0, $post = array()) {
        
        $response = '';
        $count=0;

        $rapnet_details = $this->getRappnetDetailById($diamond_id);

        $v = $rapnet_details;    
        $details[0] = $rapnet_details;
        $shape = $v['shape'];

        $carat = $v['carat'];
        $color = $v['color'];
        $clarity = $v['clarity'];
        $meas = $v['Meas'];
         if(!empty($v['Meas'])){
                list($w,$b,$h) = explode("x",$v['Meas']);
                $meas = $w." x ".$b." x ".$h;
         } else {
            $meas = '';   
         }
        $stock_no = $v['Stock_n']; 
        $dmtype = $this->adminmodel->getDiamondType($v['lot']);
        $clarity_enhance = ( $dmtype['clarityresult'] > 0 ? ' Clarity Enhanced ' : '' );
        $getDmShape = viewDmShapes($v['shape']);
            
        if( !empty($v['fancy_color']) ) {
            $dimond_title = _nf($v['carat'], 2).' CT '.$getDmShape.' '.$v['clarity']. getFancyColorName($v['fancy_color']) . ' Fancy Loose Diamond! '.' '.$v['cert'].'! ';
        } else {
            $dimond_title = _nf($v['carat'], 2).' CT '.$getDmShape.' '.$v['color']. ' '.$v['clarity'].' '.$clarity_enhance.'Loose Diamond!'.' '.$v['cert'].'! ';
        }
        $ring_title = $post['ring_title'];
        //$ring_id    = $post['unique_ring_id'];
        
        $cert_name = explode(' ', $v['Cert']);
        $sqlcert   = "SELECT cert_img FROM ". $this->config->item('table_perfix')."cert  WHERE cert_name = '".$cert_name[0]."'";
        $querycert = $this->db->query($sqlcert);
        $resultcert = $querycert->result_array();
        $certs_image =  $resultcert[0]['cert_img'];

        $diamondPrice = ( ($v['price'] * $v['carat']) * 6 );
        $retaildm_price = $diamondPrice * 1.65;
        $ring_total_price = $diamondPrice + $post['ring_price'];
        $imgColsValue = $this->adminmodel->getColorImgColmn($v['fancy_color'], $getDmShape);			
				
	$details = array(
                'lot' => $v['lot'],
                'ring_id' => $post['unique_ring_id'],
                'category_id' => $post['ring_cate_id'],
                'title' => $dimond_title,
                'ring_title' => $ring_title,
                'shape' => $shape,
                'carat' => _nf($carat, 2),
                'color' => $color,
                'clarity' => $clarity,
                'price' => $ring_total_price,
                'ring_price' => $ring_total_price,
                'retail_price' => $retaildm_price,
                'diamond_ourprice' => $diamondPrice,
                'cert' => $v['Cert'],
                'Cert_n' => $v['Cert_n'],
                'depth' => $v['Depth'],
                'table' => $v['TablePercent'],
                'girdle' =>  $v['Girdle'],
                'polish' => $v['Polish'],
                'sym' => $v['sym'],
                'flour' => $v['Flour'], 
                'meas' => $meas,
                'stones' => $v['Stones'],
                'certnum' => $v['Cert_n'],
                'stocknum' => $v['Stock_n'],
                'length' => $v['length'],
                'width' => $v['width'],
                'height' => $v['height'],
                'Meas' => $v['Meas'],
                'ebayid' => $v['ebayid'],
                'image1' => $post['ring_image'],
                'image2' => $imgColsValue,
                'certimage' => $certs_image,
                'bulkitem' => 'bulk_item',
                'editbtn' => 'Continue to Send'
            );
        //print_ar($details);
        
        $GetResponse = $this->addUniqueRingsToEbay($details, 30, 'pendants', '-1');
        if (isset($GetResponse) && !empty($GetResponse)) {
            $count++;
            $response .= "<div style=\"border: 1px solid red;display:block;\">Stock No($stock_no)</br>";
            $response .= $GetResponse."</div>";
        } else {
            $response .="<div style=\"border: 1px solid red;display:block;\">Item Failed to Update on eBay Stock No($stock_no)</div>";
        }         

        $response = "<h1>Total " . $count . " diamond(s) added/updated. </h1></br>" . $response;
        return $response;             
    }
    
    function getDiamondPictCols($type='pendants', $shape='') {
        $tble = ( $type == 'pendants' ? 'loosepictures' : 'pictures' );
         $ssql = "SELECT picture1,picture2,picture3,picture4,picture5,picture6 FROM " . $this->config->item('table_perfix') . "$tble  WHERE diamondshape = '" . $shape . "'";
        $squery = $this->db->query($ssql);
        $pictureslist = $squery->result_array();
        $return['pictures'] = $pictureslist[0];
        $return['diamondpic'] = $pictureslist[0]["picture1"];
        return $return;
    }
    
    /// get diamond type title
    function getDiamondTypeTitle($lot_id=0) {
        $checkdm_type = $this->adminmodel->getDiamondType($lot_id);
        $rt['clarity_en'] = '';
        if($checkdm_type['colorresult'] > 0)
        {
            $rt['description'] = "100% Natural Colored Diamond!";
        }
        if($checkdm_type['clarityresult'] > 0)
        {
            $rt['description'] = "100% Natural Diamond; Artificial Clarity Enhancement!";
            $rt['clarity_en'] = ' Clarity Enhanced ';
        }
        if($checkdm_type['whiteresult'] > 0)
        {
            $rt['description'] = "100% Natural Diamond";
        }
        return $rt;
    }
    
    function addUniqueRingsToEbay($detail, $durations=30, $type, $index, $ebayRequest='AddItem') {
        $duration = ( $durations > 0 ? $durations : 30 );
        if(!empty($detail['Meas'])){
        list($w,$b,$h) = explode("x",$detail['Meas']);
        $meas = $w." x ".$b." x ".$h;
        } else {
         $meas = '';   
        }

        $checkdm_type = $this->getDiamondTypeTitle($detail['lot']);
        $details_dm   = $this->getRappnetDetailById($detail['lot']);
        $shaper = viewDmShapes( $details_dm['shape'] );
        $shape = $shaper;

        $typeDescription = $checkdm_type['description'];
        $clarityEnhanc   = $checkdm_type['clarity_en'];
       
        $storeCategoryId = '13525436017';
        $requestArray['primaryCategory'] = '152810';
            
        $polish = getCutValue( $detail['polish'] );
        $sym    = getCutValue( $detail['sym'] );
        $detail['girdle'] = $detail['girdle'];
        $color = getColorValue( $detail['color'] );
        
        if (isset($detail['cut']) && !empty($detail['cut'])) {
            $cut = trim($detail['cut']) . "&nbsp;Cut!";
        } else {
            $cut = '';
        }
        if (!empty($detail['certimage'])) {
            $detail['certimage'] = $detail['certimage'];
        }
        //Get the images   
        $shapeimg = $this->getDiamondPictCols($type, $shape);
        $pictures   = $shapeimg['pictures'];
        $diamondpic = $shapeimg['diamondpic'];
        
        $diamondpic = $detail['image2'];
        $clarityRange = getClarityRange( $detail['clarity'] );
         
        $caratRange = getCaratRange( $detail['carat'] );
        
        if ($detail['cert'] != 'GIA') {
            // $detail['Cert'] = 'EGL';
        }
        $requestArray['listingType'] = 'StoresFixedPrice'; //'FixedPriceItem';
        $requestArray['productID'] = $detail['lot'];
        $requestArray['ring_id'] = $detail['ring_id'];
        $price = $detail['diamond_ourprice'];
        $diamondSalePrice = $price;
        $salesPrice = $price; //$this->getLooseFiltersDiscount($price, 'eBay');
        $daimondSalePrice = round($salesPrice,2);
        $retail_price = $detail['retail_price'];
        $watchdetails = '';
            //$link = "https://myapps.gia.edu/ReportCheckPortal/getReportData.do?&reportno=" . $detail['certnum'] . "&weight=" . $detail['carat'];
        //$eglcert = array('EGL USA', 'EGL NY', 'EGL ISRAEL');
        //$eglcert = explode(' ', $details_dm['Cert']);
        
        if( $detail['cert'] == 'GIA' ) {
            $link = 'http://www.gia.edu/cs/Satellite?reportno='.$detail['Cert_n'].'&c=Page&childpagename=GIA%2FPage%2FReportCheck&pagename=GIA%2FDispatcher&cid=1355954554547&encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C';
        } else if( $detail['cert'] == 'IGI' ) {
           $link = 'http://www.igiworldwide.com/verify.php?r='.$detail['Cert_n']; 
        } else if( $detail['cert'] == 'EGL USA' || $detail['cert'] == 'EGL NY' ) {
           $link = 'http://www.eglusa.com/verify-a-report-results/?st_num='.$detail['Cert_n']; 
        } else {
            $link = '#';
        }
               
	$verifyLabLink = $link;
        $titleShape = $shaper;
        //$detail['carat'] = number_format($test['carat'],2);
        $certCertified = ( ( !empty($detail['cert']) && $detail['cert'] != 'NONE' ) ? $detail['cert'] : '' );
        
        if ($type == 'pendants') {
            if( !empty($details_dm['fancy_color']) ) 
                {
                $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['clarity'] . ' '.getFancyColorName($details_dm['fancy_color']).' Fancy Loose Diamond! ' . $certCertified;
                } else {                
                $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' '.$clarityEnhanc.'Loose Diamond! ' . $certCertified;
            }
        } else {
            $viewhtmlTitle = $detail['carat'] . ' CT ' . $titleShape . ' ' . $detail['color'] . ' ' . $detail['clarity'] . ' DIAMOND ENGAGEMENT RING! ' . $certCertified;
        }

            $watchdetails = '<!-- Include jQuery Mobile stylesheets -->
            <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

            <link rel="stylesheet" type="text/css" href="http://www.elandiamondimporters.com/css/font-awesome.min.css"/>
            <link type="text/css" href="http://www.elandiamondimporters.com/css/ruman.css" rel="stylesheet" />

            <link type="text/css" href="http://www.elandiamondimporters.com/css/site-style.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/site-body.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/site-page.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/site-menu.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/main.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/js-image-slider.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/tamal.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/tabs.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/whsale_styles.css" rel="stylesheet" />
            <link type="text/css" rel="stylesheet" href="http://www.elandiamondimporters.com/css/fonts.css" />
            <link type="text/css" rel="stylesheet" href="http://www.elandiamondimporters.com/css/cd_styles.css?v=1" />
            <link type="text/css" rel="stylesheet" href="http://www.elandiamondimporters.com/css/styles_elan.css" />
            <link rel="stylesheet" href="http://www.elandiamondimporters.com/css/meanmenu_styles.css" media="all" />

            <link rel="stylesheet" type="text/css" href="http://www.elandiamondimporters.com/css/jquery-ui.css"/>
            <link type="text/css" href="http://www.elandiamondimporters.com/css/wh_styles.css" rel="stylesheet" />

            <link rel="stylesheet" href="http://www.elandiamondimporters.com/css/bootstrap.css"  type="text/css"/>
            <link href="http://www.elandiamondimporters.com/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="http://www.elandiamondimporters.com/css/bootstrap-responsive.css">
            <link href="http://www.elandiamondimporters.com/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
            <link type="text/css" rel="stylesheet" href="http://www.elandiamondimporters.com/css/united_style.css" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/tabs_style.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/jquery.popup.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/nanoscroller.css" rel="stylesheet" />
            <link type="text/css" href="http://www.elandiamondimporters.com/css/popup_nw_style.css" rel="stylesheet" />
            <style>
            body
            {
                    background: #ffffff;
            }
            #example-two .list-wrap {
              margin: 19px 0 0 0 !important;
              padding: 0 0;
            }
            #example-two .nav li a {
              padding: 5px 5px 0 !important;
            }
            .list-wrap .labelHeading {
              color: #000000;
              display: table-cell !important;
            }
            .tabBox {
              margin-left: 25px;
              width: 29.5% !important;
            }
            .list-wrap .metalTp {
              float: none !important;	
              display: table-cell  !important;
              padding-left: 14px  !important;
              text-align: left  !important;
              width: 100% !important;
            }
            #content_2
            {
                    display: none;
            }
            #content_3
            {
                    display: none;
            }
            #content_4
            {
                    display: none;
            }
            #content_5
            {
                    display: none;
            }
            .content {
              float: left;
              font-size: 13px !important;
              margin: 0;
              padding: 0 0 10px 10px;
              text-align: justify  !important;
              width: 62%  !important;
              line-height: 26px !important;
            }
            .content img {
              margin: 15px 0 15px 0;
            }
            </style>
            <div class="contentTb contb_bk setpadd">
      <div class="row-fluid">
        <div class="imageColumn col-sm-4"><img src="' . $diamondpic . '" border="0" align="left" alt="" name="rollimg" /></br>Sample Image Only for any questions call David Marketplace Diamonds 516-482-3101 Located in Florida.</div>
        <div class="col-sm-5">
         
            <div class="centerCol">
              <div class="whHead"><span class="dwar-icon"></span>' . $viewhtmlTitle .'</div>';
               if ($type != 'pendants') {
			  $watchdetails .=' <div class="textList dmDescription">'.$typeDescription.'</div>';
			   } else {
				   $watchdetails .=' <div class="textList dmDescription">'.$typeDescription.'</div>';
			   }
			   
              $watchdetails .= ' <div class="textList">
                <label>ID#:&nbsp;&nbsp;</label>';
               $watchdetails .= " <span><a href='$link' target='_BLANK'>" . $detail['Cert_n'] . "</a></span> </div>";
				$watchdetails .= ' <div class="textList">
                <label>Stock#</label>
                <span>' . $detail['stocknum'] . '</span> </div>';
				
			   $watchdetails .= ' <div class="textList">
                <label>Measurements:&nbsp;&nbsp;</label>
                <span>' . $detail['meas'] . '&nbsp;mm</span> </div>';

				 $watchdetails .= ' 
              <div class="textList">
                <label>Price:&nbsp;&nbsp;</label>';
                $watchdetails .='<span>$' . number_format($salesPrice, 2) . '</span> </div>';
              $watchdetails .= '<div class="wirePr"><span style="text-decoration: line-through;">Retail Price: $' . number_format($detail['retail_price'],2) . '</span></div>';
              $watchdetails .= '<div class="clear"></div>
            </div>
          
        </div>
        <div class="rightCol col-sm-3">

        </div>
        <div class="clear"></div>
      </div>
      
      <div class="clear"></div>';
	  $watchdetails .= ' <div class="collectionBlock row-fluid">';
	  $imgring = $diamondpic;

if (!empty($diamondpic)) {
			$watchdetails .= '<div class="imageColect col-sm-2">';
                $url = "http://diamondsforlife.com/beta/scripts/timthumb.php?src=" . $diamondpic . "&h=380&w=365&zc=1&ALLOW_EXTERNAL=true";
                $watchdetails .= "<a onMouseOver=\"bigImg=document.rollimg; bigImg.src='" . $url . "'\"  href='#' ;=''  style=\"width:60px;\">";
                $watchdetails .= '<img src="' . $imgring . '" border="0" alt="" /></a>';
				$watchdetails .= '</div>';
            }
            if (!empty($detail['certimage']) && $detail['cert'] != 'NONE') {
		$watchdetails .= '<div class="imageColect col-sm-2">';
                $setCert = array('GIA','IGI','EGL USA','EGL NY');
                if( in_array($detail['cert'], $setCert) ) {    
                        $watchdetails .= '<a href="'.$verifyLabLink.'" target="_blank"><img src="'.$detail['certimage'].'" border="0" alt=""  />';
                        $watchdetails .= '<label>Verify Lab Report</label></a>';
                    } else {
                        $watchdetails .= '<img src="' . $detail['certimage'] . '" border="0" alt=""  />';
                        $watchdetails .= '<label>Lab Report</label>';
                    }
            $watchdetails .= '</div>';
            }
            if ($type != 'pendants') {
            }
			
            $watchdetails .= '</div>';

      $watchdetails .= '<div class="diamondTabs">
        <div id="example-two">
          <ul class="nav">
            <li class="nav-one"><a href="javascript:tabSwitch(\'tab_1\', \'content_1\');" id="tab_1" class="active">More Details</a></li>
            <li class="nav-two"><a href="javascript:tabSwitch(\'tab_2\', \'content_2\');" id="tab_2">Diamond Grading Information</a></li>
            <li class="nav-three"><a href="javascript:tabSwitch(\'tab_3\', \'content_3\');" id="tab_3">Payment &amp; Shipping</a></li>
			<li class="nav-three"><a href="javascript:tabSwitch(\'tab_4\', \'content_4\');" id="tab_4">About Us</a></li>
            <li class="nav-four last"><a href="javascript:tabSwitch(\'tab_5\', \'content_5\');" id="tab_5">Return Policy</a></li>
          </ul>
          <div class="list-wrap">
            <div class="diamondDetailTabs row-fluid" id="content_1" class="content">
              <div class="tabBox">
                <div class="tabsRow">';
      if($detail['cert'] == 'GIA') {
          $watchdetails .= '<div class="metaLeft"><span class="labelHeading">Certificate:</span> <span class="metalTp"><a href="'.$verifyLabLink.'" target="_blank">' . $detail['cert'] . '&nbsp;Certified!!!</span> </a></div>';
      } else if($detail['cert'] == 'NONE') {
         $watchdetails .= '<div class="metaLeft"><span class="labelHeading">Certificate:</span> <span class="metalTp">None Certified</span> </div>';
      } else {
         $watchdetails .= '<div class="metaLeft"><span class="labelHeading">Certificate:</span> <span class="metalTp">' . $detail['cert'] . '&nbsp;Certified!!!</span> </div>'; 
      }
        
        $watchdetails .= '</div>
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Stock#:</span> <span class="metalTp">' . $detail['stocknum'] . '</span> </div>
                </div>
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">ID#:</span> <span class="metalTp">';
				  $watchdetails .= "<strong><a href='".$link."' target='_BLANK'>" . $detail['Cert_n'] . "</a></strong>";
				  $watchdetails .= '</span> </div>
                </div>';
    if ($type != 'pendants') {
		$watchdetails .= ' <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Carat Weight:</span> <span class="metalTp">' . $detail['carat'] . '&nbsp;carat</span> </div>
                </div>';
				}
				if (!empty($detail['depth'])) {
                $watchdetails .=' <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Depth:</span> <span class="metalTp">' . $detail['depth'] . '%</span> </div>
                </div>';
				}
				if (!empty($detail['table'])) {
               $watchdetails .='<div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Table:</span> <span class="metalTp">' . $detail['table'] . '%</span> </div>
                </div>';
				}
                $watchdetails .='<div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Measurements:</span> <span class="metalTp">' . $detail['meas'] . '&nbsp;mm</span> </div>
                </div>
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Type:</span> <span class="metalTp">100% Natural Diamond</span> </div>
                </div>';
	if (!empty($cut)) {
                $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Cut:</span> <span class="metalTp">' . $cut . '</span> </div>
                </div>';
				}
              $watchdetails .='</div>
              <div class="tabBox tbrow2">';
	if( empty($details_dm['fancy_color']) ) {
              $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Color Grade:</span> <span class="metalTp">' . $color . '</span> </div>
                </div>';
              
        } else 
            {      
              $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Fancy Color:</span> <span class="metalTp">' . getFancyColorName($details_dm['fancy_color']) . '</span> </div>
                </div>';
              $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Fancy Color Intensity:</span> <span class="metalTp">' . $details_dm['fancy_color_intens'] . '</span> </div>
                </div>';
              $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Member comments:</span> <span class="metalTp">' . $details_dm['member_coment'] . '</span> </div>
                </div>';
        }
        
        $watchdetails .='<div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Clarity Grade:</span> <span class="metalTp">' . $clarityRange . '</span> </div>
                </div>';
				if (!empty($polish) && !empty($sym)) {
                $watchdetails .= '
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Polish/Symmetry:</span> <span class="metalTp">' . $polish . '/' . $sym . ' </span> </div>
                </div>';
				}
				if (!empty($detail['girdle'])) {
                $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Girdle:</span> <span class="metalTp">' . $detail['girdle'] . ' </span> </div>
                </div>';
				}
				if (!empty($detail['flour'])) {
                $watchdetails .='
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Fluorescence:</span> <span class="metalTp">' . $detail['flour'] . '</span> </div>
                </div>';
				}
				$watchdetails .= '
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Culet:</span> <span class="metalTp">' . (!empty($detail['culet']) ? $detail['culet'] : 'None') . ' </span> </div>
                </div>';
            $watchdetails .= '
                <div class="tabsRow">
                  <div class="metaLeft"><span class="labelHeading">Shape</span> <span class="metalTp">'.$shaper.'</span> </div>
                </div>';		
                
              $watchdetails .= '</div>
              <div class="clear"></div>
            </div>
            <div id="content_2" class="content">
               Buying a diamond does not have to be an uncomfortable experience. David Marketplace Diamonds Corporation is 
designed to give you the tools and information you need to properly evaluate diamond quality and value with confidence.
Every diamond is unique, and there are a variety of factors which affect the price of a diamond. 
Focus on those factors most important to you, and choose a diamond that satisfies 
your individual standards for beauty and value. This might be a very different diamond than someone else with a similar budget would choose. 
At David Marketplace Diamonds, we want to help find the best diamond for you.
You also have access to a personal diamond consultant; who can walk you through the diamond selection process or answer any questions you have.<div style="padding-top:10px;"></div><strong>We have access to the largest suppliers in the world. If we can\'t find the diamond you want, it does not exist!</strong>
            </div>
            <div id="content_3" class="content">
              We only accept PayPal payments in US funds (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). Sorry, we DO NOT accept personal checks.
                        <div style="margin-top:8px;"></div>
                        Payment must be received within 4 days of end of auction. Florida residents must pay 8.875% sales tax.
                        <div align="left" style="margin-top:5px;"><img alt="" src="http://diamondsforlife.info/ebaystore/paypalcreditcards.gif"></div>
                        <div class="polheadings">Shipping: United States</div>
                        We ship all orders using FedEx or UPS Overnight. We process, insure and ship all orders within 2 business days of receipt of payment. For custom designs, and alterations, such as sizing, please allow up to an additional 5 business days. Longer delivery times are experienced during the holidays.
                        <div class="polheadings">Shipping: International</div>
                        We only accept international orders from the United Kingdom, Canada, Europe, Australia and Asia at this time. Shipping to these countries is $65 and such international residents can only pay with PayPal (WE SHIP TO PAYPAL\'S CONFIRMED ADDRESS ONLY). IMPORT TAXES, DUTIES AND CHARGES ARE NOT INCLUDED IN THE ITEM PRICE. THESE CHARGES ARE THE BUYER\'S RESPONSIBILITY. PLEASE CHECK WITH YOUR COUNTRY\'S CUSTOMS OFFICE TO DETERMINE WHAT THESE ADDITIONAL COSTS WILL BE PRIOR TO BIDDING/BUYING. Thank you.
            </div>
            
		  <div id="content_4" class="content">David Marketplace Diamonds carries a large variety of certified stones of all shapes and sizes. 
Sure to carry exactly what you’re looking for, David Marketplace Diamonds is your most affordable online diamond source. 
                      <div style="margin-top:8px;"></div>Each of the diamonds in our large inventory has been hand selected to meet the high standards of our company. 
Our knowledgeable staff knows the extent of finding the prefect diamond for that special occasion.  
At David Marketplace Diamonds, we strive to make this daunting task as simple as possible.  
No matter the occasion or order, we hope you continue to choose David Marketplace Diamonds for all your certified diamond needs.
          </div>
		  <div id="content_5" class="content">  We offer a 100% unconditional 30 day money-back guarantee. We are so confident in the quality of our merchandise that if, for any reason, you are not satisfied with your purchase, we will reimburse you 100% of your purchase price.  We accept returns or exchanges within 30 days of the items receipt, with no restocking fee!  Any exchange, credit or refund will be for the original price paid.  Items must be in their original condition, and must not be altered in any way.  You must call us to obtain a return authorization PRIOR to shipping the item back to us. No packages will be accepted without a return authorization. This is especially important as we will also be giving you specific shipping instructions for your protection. Refunds will be processed through PayPal. All returns are guaranteed by Ebay and PayPal through the <a href="http://pages.ebay.com/paypal/buyer/protection.html" target="_blank">Buyer Protection Program</a>.
          </div>
          <!-- END List Wrap --> 
          
        </div>
		
		<script type="text/javascript">
function tabSwitch(new_tab, new_content) {
	document.getElementById(\'content_1\').style.display = \'none\';
	document.getElementById(\'content_2\').style.display = \'none\';
	document.getElementById(\'content_3\').style.display = \'none\';
	document.getElementById(\'content_4\').style.display = \'none\';
	document.getElementById(\'content_5\').style.display = \'none\';
	document.getElementById(new_content).style.display = \'block\';
	document.getElementById(\'tab_1\').className = \'\';
	document.getElementById(\'tab_2\').className = \'\';
	document.getElementById(\'tab_3\').className = \'\';
	document.getElementById(\'tab_4\').className = \'\';
	document.getElementById(\'tab_5\').className = \'\';
	document.getElementById(new_tab).className = \'active\';		
}
</script>
		
        <!--<img src="http://www.elandiamondimporters.com/images/tabs-image.jpg" alt="" />--> 
      </div>
    </div>
	</div></div><div class="clear"></div>';
            $watchdetails .= '
			<!-- landing page end -->
            <!-- footer start -->
            <div id="leftsealbox">
              <div class="leftsealboxwrap"><a href="#"><img alt="100% Satisfaction Guaranteed or your Money Back" title="100% Satisfaction Guaranteed or your Money Back" src="http://diamondsforlife.info/ebaystore/seal_moneyback.png" border="0" /></a></div>
              <div style="clear:both;"></div>
            </div>
            <table id="FooterWarp" cellpadding="0" cellspacing="0" align="center" border="0">
              <tr>
                <td id="footerleft" valign="top" align="left"><div id="footertitle"><img alt="Can\'t find what you are looking for?" title="Can\'t find what you are looking for?" src="http://diamondsforlife.info/ebaystore/title_cantfind.gif" /></div>
                  <div id="footerinfo" align="left"><img align="left" alt="" src="http://diamondsforlife.info/ebaystore/cust_serv.png" />David Marketplace Diamonds- deals with all kinds of jewelry and diamonds.<br />
                    We are available 24/7.
                    Call us toll-free <span>516-482-3101</span> with the exact specifications of the diamond you are 
                    looking for. We will gladly contact you with a price within the same working day. </div></td>
                <td id="footerright" valign="top"><img alt="100% Positive Feedback" title="100% Positive Feedback" src="http://diamondsforlife.info/ebaystore/seal_blue.png" /><img alt="30 Day Money Back Guarantee" title="30 Day Money Back Guarantee" src="http://diamondsforlife.info/ebaystore/seal_green.png" /><img alt="Copyright Exclusive Design" title="Copyright Exclusive Design" src="http://diamondsforlife.info/ebaystore/seal_red.png" /><img alt="Free Overnight Shipping" title="Free Overnight Shipping" src="http://diamondsforlife.info/ebaystore/seal_yellow.png" /> </td>
              </tr>
              <tr>
                <td colspan="2" id="footerbottom" align="left" valign="top"><img alt="GIA - Gemological Institute of America" title="GIA - Gemological Institute of America" src="http://diamondsforlife.info/ebaystore/seal_gia.png" /><img alt="EGL - European Gemological Laboratory" title="EGL - European Gemological Laboratory" src="http://diamondsforlife.info/ebaystore/seal_egl.png" /><img class="bldia" alt="Stop Blood Diamonds" title="Stop Blood Diamonds" src="http://diamondsforlife.info/ebaystore/seal_blooddiamonds.png" /><img alt="Paypal Verified" title="Paypal Verified" src="http://diamondsforlife.info/ebaystore/seal_paypalverified.png" /></td>
              </tr>
            </table>
            <!-- footer end -->
            <div align="center" id="credit">All Imagery & Content &copy;2015 David Marketplace Diamonds</a></div></td>
<div class="scrollgal" align="center">';


        if (get_magic_quotes_gpc()) {
            // print "stripslashes!!! <br>\n";
            $requestArray['itemDescription'] = stripslashes($watchdetails);
        } else {
            $requestArray['itemDescription'] = $watchdetails;
        }
        $requestArray['ItemSpecification'] = $this->getUniqueItemSpecification($detail); 
        
        $detail['title'] = $viewhtmlTitle;
        $requestArray['AttributeArray'] = $this->adminmodel->get_attribute($detail);
        $listing_duration = 'Days_' . $duration;
        $requestArray['listingDuration'] = $listing_duration;
        $requestArray['startPrice'] = round($detail['ring_price']); //round($salesPrice);
        $requestArray['buyItNowPrice'] = round($detail['ring_price']); //round($salesPrice);
        $requestArray['quantity'] = '1';
        $requestArray['storeCategoryID'] = $storeCategoryId;
        $requestArray['lot'] = $detail['lot'];
        $requestArray['itemID'] = $detail['ebayid'];
        $requestArray['itemTitle'] = $detail['ring_title'];
        $requestArray['replace_gurantee'] = 'Days_14';
        $requestArray['ring_id'] = $detail['ring_id'];
        $requestArray['category_id'] = $detail['category_id'];
        //$requestArray['image1'] = config_item('base_url') . $diamondpic;
        $requestArray['image1'] = $detail['image1'];
        $requestArray['image2'] = $detail['image2'];
//echo "</pre>"; print_r($requestArray); echo "<br>Type".$type."</pre>";
        if (!empty($detail['ebayid']) && $detail['ebayid'] != '-2' && $ebayRequest != 'ReviseItem') {
            $itemID = $this->adminmodel->updateRequestEbay1($requestArray, $type);
        } else {
            $itemID = $this->sendUniqueJewelryToEbay($requestArray, $type, 'accent', $ebayRequest);
        }
        return $itemID;
    }
    
    function getUniqueItemSpecification($detail) {
        
        $shape = viewDmShapes( $detail['shape'] );        
        //$clr = getDiamondClarity( $detail['clarity'] );
        
        //$clarityRange  = $clr['clarityRange'];
       // $clarityRange1 = $clr['clarityRange1'];
            
        $caratRange = getCaratsRange( $detail['carat'] );
        
        if ($detail['cert'] == 'GIA') {
            $cert = $detail['cert'];
        } elseif ($detail['cert'] == 'EGL U') {
            $cert = "EGL " . $detail['Country'];
        } else {
            //$cert =   $detail['Cert']."EGL ".$detail['Country'];
            $cert = "EGL ";
        }
        
    $dmtype = $this->adminmodel->getDiamondType($detail['lot']);
        
    if( $dmtype['clarityresult'] > 0 ) {
        $clarty_enahnce = 'Enhanced';
        $mains_stone    = 'Enhanced Natural Diamond';
    } else {
        $clarty_enahnce = 'Not Enhanced';
        $mains_stone = '100% Natural Diamond';
    }

        $specification = '<ItemSpecifics>
                            <NameValueList> 
                                  <Name>Shape</Name> 
                                  <Value>' . $shape . '</Value> 
                            </NameValueList>
                            <NameValueList>
                            <Name>Main Stone Treatment</Name> 
                            <Value>'.$clarty_enahnce.'</Value> 
                          </NameValueList>
                           <NameValueList> 
                                  <Name>Total Carat Weight</Name> 
                                  <Value>' . $caratRange . '</Value> 
                            </NameValueList>
                            <NameValueList> 
                                  <Name>Exact Carat Weight</Name> 
                                  <Value>' . $detail['carat'] . '</Value> 
                            </NameValueList> 
                            <NameValueList>
                                  <Name>Certification/Grading</Name> 
                                  <Value>' . $detail['cert'] . '</Value> 
                            </NameValueList> 
                            <NameValueList> 
                                  <Name>Clarity</Name> 
                                  <Value>' . $detail['clarity'] . '</Value> 
                            </NameValueList> 
                              <NameValueList> 
                                  <Name>Color</Name> 
                                  <Value>' . $detail['color'] . '</Value> 
                            </NameValueList>
                            <NameValueList> 
                                  <Name>Main Stone</Name> 
                                  <Value>'.$mains_stone.'</Value> 
                            </NameValueList>';
        if (!empty($detail['cut'])) {
            $specification .= '<NameValueList> 
                                    <Name>Cut</Name> 
                                    <Value>' . $detail['cut'] . '</Value> 
                              </NameValueList>';
        }
        $specification .= '</ItemSpecifics>';
        $specification .= '<ConditionID>1000</ConditionID>';
        return $specification;
    }
    
    function sendUniqueJewelryToEbay($requestArray, $section = 'watches', $category = 'accent', $ebayRequests) {
        global $userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel,$production,$ebay_paypal_email,$shipping_salestax_and_jurisdiction,$location;
        include_once 'application/helpers/eBaySession.php';
        include_once 'application/helpers/keys.php';
        //pr, 17July,2015
        $this->adminmodel->validateTestUserRegistration();
        $requestArray['replace_gurantee'] = "Days_30";
        //pr("@sendRequestEbay1--include","exit");
        $siteID = 0;
        //for AddItemRequest, specify "AddItem" (without "Request") in this call name header.
        $verb = $ebayRequests; /// AddItem or ReviseItem 
        $addItemsRequest = $ebayRequests.'Request';
        ////// Autopaye : True: immediate payemnt is on and False: immediate payment is off
        $setAutoPay = 'false'; //( $requestArray['startPrice'] < 10000 ? 'true' : 'false' );
        $compatabilityLevel = 601;
        $requestXmlBody = '';
        $requestArray['listingType'] = "FixedPriceItem";
        $requestXmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        //$requestXmlBody .= '<AddItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<'.$addItemsRequest.' xmlns="urn:ebay:apis:eBLBaseComponents">';
        $requestXmlBody .= '<DetailLevel>ReturnAll</DetailLevel>';
        $requestXmlBody .= '<ErrorLanguage>en_US</ErrorLanguage>';
        $requestXmlBody .= "<Version>$compatabilityLevel</Version>";
        $requestXmlBody .= '<Item>';
        $requestXmlBody .= '<Country>US</Country>';
        $requestXmlBody .= '<Currency>USD</Currency>';
        $requestXmlBody .= "<Description><![CDATA[" . $requestArray['itemDescription'] . "]]></Description>";
        $requestArray['ebay_upload_type'] = 'bestoffer';
        
        $requestXmlBody .= "<ListingType>" . $requestArray['listingType'] . "</ListingType>";
        $requestXmlBody .= "<ListingDuration>" . $requestArray['listingDuration'] . "</ListingDuration>";
        $requestXmlBody .= '<Location><![CDATA[US]]></Location>';
        
        $requestXmlBody .= '<PaymentMethods>VisaMC</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>Discover</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>AmEx</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>CreditCard</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>PayPalCredit</PaymentMethods>';
        $requestXmlBody .= '<PaymentMethods>PayPal</PaymentMethods>';
        $requestXmlBody .= '<PayPalEmailAddress>'.$ebay_paypal_email.'</PayPalEmailAddress>';
        $requestXmlBody .= '<PrimaryCategory>';
        $requestXmlBody .= '<CategoryID>' . $requestArray['primaryCategory'] . '</CategoryID>';
        $requestXmlBody .= '</PrimaryCategory>';
        $requestXmlBody .= '<PrivateListing>true</PrivateListing>';
        $requestArray['ebay_upload_type'] = '';
        $requestXmlBody .= $requestArray['ItemSpecification'];
        $requestXmlBody .= "<BuyItNowPrice currencyID=\"USD\">0.00</BuyItNowPrice>";
        $requestXmlBody .= "<Quantity>" . $requestArray['quantity'] . "</Quantity>";
        $requestXmlBody .= '<DispatchTimeMax>3</DispatchTimeMax>';
        $requestXmlBody .= '<AutoPay>'.$setAutoPay.'</AutoPay>';
        $requestXmlBody .= "<StartPrice>" . round($requestArray['startPrice']) . "</StartPrice>";
        if (strlen($requestArray['itemTitle']) > 80) {
            $title = substr($requestArray['itemTitle'], 0, 80);
        } else {
            $title = $requestArray['itemTitle'];
            $length = strlen($requestArray['itemTitle']);
            $loop = 80 - $length;
            $title = $requestArray['itemTitle'];
            $string1 = '';
            $loop = $loop / 6;
            for ($k = 0; $k < $loop - 1; $k++) {
                $string1 = $string1 . "      ";
            }
            $title = $title . $string1;
        }
        //$requestXmlBody .= "<Title><![CDATA[".($requestArray['itemTitle'])."]]></Title>";
        $requestXmlBody .= "<Title><![CDATA[" . ($title) . "]]></Title>";
        if(!empty($requestArray['subTitle'])) {
            $subtitle=substr(strip_tags($requestArray['subTitle']),0,55);
            $requestXmlBody .= "<SubTitle><![CDATA[" . $subtitle . "]]></SubTitle>";
        }
        $requestXmlBody .= "<SKU>" . (string)$requestArray['productID'] . "</SKU>";
        $requestXmlBody .= '<ShippingTermsInDescription>True</ShippingTermsInDescription>';
        $requestXmlBody .= '<ShippingType>FlatDomesticCalculatedInternational</ShippingType><ThirdPartyCheckout>false</ThirdPartyCheckout>';
        $requestXmlBody .= '<ReturnPolicy>
            <ReturnsAcceptedOption>ReturnsAccepted</ReturnsAcceptedOption>
            <RefundOption>MoneyBack</RefundOption>
            <ReturnsWithinOption>' . $requestArray['replace_gurantee'] . '</ReturnsWithinOption>
            <Description>PLEASE VISIT OUR EBAY STORE FOR A DETAILED RETURN POLICY.</Description>
              <ShippingCostPaidByOption>Buyer</ShippingCostPaidByOption>
              <ShippingCostPaidBy>Buyer</ShippingCostPaidBy>
    </ReturnPolicy>
    <ShippingDetails>
          <GlobalShipping>true</GlobalShipping>
          <ApplyShippingDiscount>false</ApplyShippingDiscount>
          <SalesTax>
          <SalesTaxPercent>8</SalesTaxPercent>
          <SalesTaxState>'.$shipping_salestax_and_jurisdiction.'</SalesTaxState>
          <ShippingIncludedInTax>true</ShippingIncludedInTax>
          </SalesTax>
          <ShippingServiceOptions>
          <ShippingService>USPSFirstClass</ShippingService>
          <ShippingServiceCost>0.00</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <FreeShipping>true</FreeShipping>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>6</ShippingTimeMax>
          <FreeShipping>true</FreeShipping>
          </ShippingServiceOptions>
          <ShippingServiceOptions>
          <ShippingService>USPSPriority</ShippingService>
          <ShippingServiceCost>8.99</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>2</ShippingServicePriority>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>3</ShippingTimeMax>
          </ShippingServiceOptions>
          <ShippingServiceOptions>
          <ShippingService>USPSExpressMail</ShippingService>
          <ShippingServicePriority>3</ShippingServicePriority>
          <ShippingServiceCost>29.99</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ExpeditedService>false</ExpeditedService>
          <ShippingTimeMin>1</ShippingTimeMin>
          <ShippingTimeMax>6</ShippingTimeMax>
          </ShippingServiceOptions>
          <InternationalShippingServiceOption>
          <ShippingService>USPSExpressMailInternational</ShippingService>
          <ShippingServiceCost>55.00</ShippingServiceCost>
          <ShippingServiceAdditionalCost>0.00</ShippingServiceAdditionalCost>
          <ShippingServicePriority>1</ShippingServicePriority>
          <ShipToLocation>Europe</ShipToLocation>
          <ShipToLocation>Asia</ShipToLocation>
          <ShipToLocation>CA</ShipToLocation>
          <ShipToLocation>GB</ShipToLocation>
          <ShipToLocation>AU</ShipToLocation>
          <ShipToLocation>DE</ShipToLocation>
          <ShipToLocation>JP</ShipToLocation>
          </InternationalShippingServiceOption>
          <TaxTable>
                <TaxJurisdiction>
                  <JurisdictionID>'.$shipping_salestax_and_jurisdiction.'</JurisdictionID>
                  <SalesTaxPercent>0.00</SalesTaxPercent>
                  <ShippingIncludedInTax>true</ShippingIncludedInTax>
                </TaxJurisdiction>
          </TaxTable>
         </ShippingDetails>';
        ///$requestArray['image2'] is the large image
        $ebay_main_image=(!empty($requestArray['image1']) ? $requestArray['image1'] : $requestArray['image2']); 
        //$ebay_main_image='http://certeddiamonds.jewelercart.com/images/pictures/white.jpg';
        $rowOtherImg = $this->adminmodel->getDiamondShapeRow($requestArray['lot']);
        $rowsring = $this->catemodel->getRingsDetailViaId($requestArray['ring_id'], '', '', '', $requestArray['category_id']); /// get unique ring detail        
        
        if (!empty($ebay_main_image)) { 
            $requestXmlBody .= '<PictureDetails><GalleryType>Gallery</GalleryType>
                                          <GalleryURL>' . $ebay_main_image . '</GalleryURL>';
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';
        }
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '<PictureURL>' . $ebay_main_image . '</PictureURL>';
        }
        if( count($rowsring['item_thumbs']) > 0 ) {
		foreach( $rowsring['item_thumbs'] as $rng_thumb ) {
                    $ringsView = SITE_URL.'scrapper/imgs/'.$rng_thumb['ImagePath'];
                    $requestXmlBody .= '<PictureURL>' . $ringsView . '</PictureURL>';
            }
        }
        if (!empty($rowOtherImg['ebay_img1'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img1'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img2'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img2'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img3'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img3'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img4'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img4'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img5'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img5'] . '</PictureURL>';
        }
        if (!empty($rowOtherImg['ebay_img6'])) {
            $requestXmlBody .= '<PictureURL>' . $rowOtherImg['ebay_img6'] . '</PictureURL>';
        }
        if (!empty($ebay_main_image)) {
            $requestXmlBody .= '</PictureDetails>';
        }
        if ($category == "accent") {
            $ccid = 4520584010;
        } else {
            $ccid = 4520584010;
        }
        //$ccid='640142919';
        //echo "category ID".$ccid;
        $requestXmlBody .= '<Storefront>
          <StoreCategoryID>' . $requestArray['storeCategoryID'] . '</StoreCategoryID>
          </Storefront>';
        $requestXmlBody .= '<RegionID>0</RegionID>';
        $requestXmlBody .= '</Item>';
        $requestXmlBody .= "<RequesterCredentials><eBayAuthToken>$userToken</eBayAuthToken></RequesterCredentials>";
        $requestXmlBody .= '</'.$addItemsRequest.'>';
        //file_put_contents("additem_requests.txt",$requestXmlBody,FILE_APPEND);
        //$requestXmlBody .= '</'.$addItemRequest.'>';
        //echo '<pre>'; print_r($requestXmlBody); echo '</pre>';
        $session = new eBaySession($userToken, $devID, $appID, $certID, $serverUrl, $compatabilityLevel, $siteID, $verb);
        $responseXml = $session->sendHttpRequest($requestXmlBody);
        if (stristr($responseXml, 'HTTP 404') || $responseXml == '')
            die('<P>Error sending request');
        //Xml string is parsed and creates a DOM Document object
        $responseDoc = new DomDocument();
        $responseDoc->loadXML($responseXml); //print_ar($responseDoc);
        
    if($ebayRequests != 'ReviseItem') {
            $responses = $responseDoc->getElementsByTagName("AddItemResponse");
            foreach ($responses as $response) {
                $acks = $response->getElementsByTagName("Ack");
                $ack = $acks->item(0)->nodeValue;
                //echo "Ack = $ack <BR />\n"; // Success if successful
            }
            //get any error nodes
            $errors = $responseDoc->getElementsByTagName('Errors');
            if ($ack == 'Failure') {
                foreach ($errors AS $error) {
                    $SeverityCode = $error->getElementsByTagName('SeverityCode');
                    //echo '<br>'.$SeverityCode->item(0)->nodeValue;
                    if ($SeverityCode->item(0)->nodeValue == 'Error') {
                        $status = '<P><B>eBay returned the following error(s):</B>';
                        //display each error
                        //Get error code, ShortMesaage and LongMessage
                        $code = $error->getElementsByTagName('ErrorCode');
                        $shortMsg = $error->getElementsByTagName('ShortMessage');
                        $longMsg = $error->getElementsByTagName('LongMessage');
                        //Display code and shortmessage
                        $status .= '<P>' . $code->item(0)->nodeValue . ' : ' . str_replace(">", "&gt;", str_replace("<", "&lt;", $shortMsg->item(0)->nodeValue));
                        //if there is a long message (ie ErrorLevel=1), display it
                        if (count($longMsg) > 0)
                            $status .= '<BR>' . str_replace(">", "&gt;", str_replace("<", "&lt;", $longMsg->item(0)->nodeValue));
                    }
                }
                return $status;
            } else { //no errors
                //   echo '<br>'.die('ppt');
                //get results nodes
                $responses = $responseDoc->getElementsByTagName("AddItemResponse");
                //file_put_contents("additem_response.txt",$responses,FILE_APPEND);
                
                foreach ($responses as $response) {
                    $acks = $response->getElementsByTagName("Ack");
                    $ack = $acks->item(0)->nodeValue;
                    //echo "Ack = $ack <BR />\n";   // Success if successful
                    $endTimes = $response->getElementsByTagName("EndTime");
                    $endTime = $endTimes->item(0)->nodeValue;
                    //echo "endTime = $endTime <BR />\n";
                    $itemIDs = $response->getElementsByTagName("ItemID");
                    $itemID = $itemIDs->item(0)->nodeValue;
                    $itemID = trim($itemID);
                    // echo "itemID = $itemID <BR />\n";
                    if(!$production) {
                       $linkBase = "http://cgi.sandbox.ebay.com/ws/eBayISAPI.dll?ViewItem&item="; 
                    }
                    else{
                        $linkBase = "http://cgi.ebay.com/ws/eBayISAPI.dll?ViewItem&item="; 
                    }
                    $status = "<a href=$linkBase" . $itemID . " target='_blank'>" . $requestArray['itemTitle'] . "</a> <BR />";
                    $feeNodes = $responseDoc->getElementsByTagName('Fee');
                    foreach ($feeNodes as $feeNode) {
                        $feeNames = $feeNode->getElementsByTagName("Name");
                        if ($feeNames->item(0)) {
                            $feeName = $feeNames->item(0)->nodeValue;
                            $fees = $feeNode->getElementsByTagName('Fee'); // get Fee amount nested in Fee
                            $fee = $fees->item(0)->nodeValue;
                            if ($fee > 0.0) {
                                if ($feeName == 'ListingFee') {
                                    $status .= "<B>$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                                } else {
                                    $status .= "$feeName :" . number_format($fee, 2, '.', '') . " </B><BR>\n";
                                }
                            } // if $fee > 0
                        } // if feeName
                    } // foreach $feeNode
                    $status = "Item successfully added to Ebay.<br>click here to view this: ".$status;
                    
                } // foreach response
//                if( !empty($itemID) ) {
//                        $this->addDiscountToEbayListing( $itemID );
//                }
        if( !empty($itemID) ) {
            $this->db->where('id', $requestArray['ring_id']);
                $this->db->update($this->config->item('table_perfix') . 'us', array(
                    'ebayid' => $itemID,
                ));
            }
        }
    }
        //if $errors->length > 0
        return $status;
        //return 'Request: <br>'.$requestXmlBody.'<br>Response:'.print_r($responses);
    }
    function getRappnetDetailById($id) {
        $sql = "SELECT * FROM " . $this->config->item('table_perfix') . "rapproduct  WHERE lot = '" . $id . "' ORDER BY lot DESC LIMIT 1";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0];
    }
}