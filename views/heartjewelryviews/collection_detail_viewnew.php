<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>
<style>
    .similar_collection .sp{width:500px;}
    .collection_detail_hover .addtocart_icon{ width: 100px; padding: 8px 0px 8px 0px;}
    .quick_view{top:10px !important;}
</style>  
<!--<link href="<?php echo SITE_URL; ?>css/magnific-popup.css" rel="stylesheet">-->
<script>
    var $ = jQuery.noConflict();
    
function getRingSize(field_id) {
 var mt = document.getElementById(field_id).value;
 window.location = mt;	
}
function ringThumbView(th_url) {
    $('#ringsthumb_view .sp').hide();
    $('#ex1').hide();
    $('#show_thumb_view').html('Loading.....');
    $('#show_thumb_view').html('<img src="'+th_url+'" alt="th_url" onmouseover="show_magnify_affect(\'show_thumb_view\')" alt="" />');
    $('#show_thumb_view').zoom();
}

///// show and hide product deail tabs
function show_tabs_block_detail(blockid) {
    var idar_list = ["product_details", "customer_reviews", "ask_questins", "similar_products", "policies"];
    
    $('#'+blockid).show();
    
    for(var i=0; i < idar_list.length; i++) {
        
        if( idar_list[i] !== blockid ) {
                $('#'+idar_list[i]).hide();
            }
    }
}

//// onclick show and hide block
function show_hide_block() {
    
    }
    
function commentsThisPost() {
	var urlink = base_url+'site/postRingComents';
	
	dataString = $("#coment_form").serialize();
	var fname = $('#full_name').val();
	var em = $('#email_adres').val();
	var coments = $('#tr_comments').val();
	var eror = '';
	
	<?php
		if(!$this->session->isLoggedin())
		{
	?>
		$('#view_errors').html('Plz login to your account first to comments this product!');
		return false
	<?php
		}
	?>
	if(fname == '') {
		$('#full_name').focus();
		$('#view_errors').html('Please enter your Full name!');
		return false
	}
	if(em == '') {
		eror = 'Please enter your email address!';
		$('#email_adres').focus();
		$('#view_errors').html('Please enter your email address!');
		return false
	}
	if(coments == '') {
		$('#tr_comments').focus();
		$('#view_errors').html('Please enter your comments!');
		return false
	}
	$("#view_coments").html('');
	
	$.ajax({
		 type: "POST",
		 url:urlink,
		 data: dataString,
		 success: function(data) {
			 $('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif" alt="loading"></div>');
			 $("#view_errors").html(data);
			 //$('#full_name').val('');
			 //$('#email_adres').val('');
			 $('#tr_comments').val('');
			 $('#cmb_rating').val('');
			 //$('#comprForm').submit();
		},
		error: function(){alert('Error ');}
	  });
} 

    $(document).ready(function() {
        function close_accordion_section() {
            $('.accordion .accordion-section-title').removeClass('active');
            $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
        }

        $('.accordion-section-title').click(function(e) {
            // Grab current anchor value
            var currentAttrValue = $(this).attr('href');

            if($(e.target).is('.active')) {
                close_accordion_section();
            }else {
                close_accordion_section();

                // Add active class to section title
                $(this).addClass('active');
                // Open up the hidden content panel
                $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
            }

            e.preventDefault();
        });
    });
 function addcartsubmit(pageURL)
    {
        document.getElementById('collection_form').action = pageURL;
        document.getElementById('collection_form').submit();
    }
    
 function setListingPage(option_value) {
     window.location = option_value;
 }
 
 function set_detail_blocks(id_block) {                    
        var bk = ["diamond_detail_bk", "ring_detail_bk"];
        var link_bk = ["diamonds_link", "rings_link"];

        for(var i=0; i < bk.length; i++) {
            if( bk[i] === id_block ) {
                $('#'+bk[i]).show();
                $('#'+link_bk[i]).addClass('sel_active_tabs');
            } else {
                $('#'+bk[i]).hide();
                $('#'+link_bk[i]).removeClass('sel_active_tabs');
            }
        }
    }
</script>
<script>
    $(document).ready(function() { 
        $('#topbar_block').click(function() {
            $('html,body').animate({ scrollTop: 0 }, 1000);
            return false;
        });
    });
    $(document).scroll(function () {
        //Show element after user scrolls 800px
        var y = $(this).scrollTop();
        if (y > 200) {
            $('.topbar_section').fadeIn();
        } else {
            $('.topbar_section').fadeOut();
        }                
    });
</script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/zoom_jquery.css" rel="stylesheet" />
<script src="<?php echo SITE_URL; ?>js/jquery.zoom.js"></script>
<script>
        $(document).ready(function(){
                //$('#ex1').zoom();
                $('.sp').zoom();
                $('#show_thumb_view').zoom();
                $('#show_thumb_view .sp img').scroll(zoom);
        });
</script>
<script language="javascript" src="<?php echo SITE_URL; ?>js/common_function.js" type="text/javascript"></script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>
<link type="text/css" href="<?php echo SITE_URL; ?>css/jquery.popup.css" rel="stylesheet" />
<script language="javascript" src="<?php echo SITE_URL; ?>js/jquery.popup.js" type="text/javascript"></script>-->
<script>
    var $ = jQuery.noConflict();
    
    function printCurrPage() {
        window.print();
    }
  $(function() {
    ////// call popup scirpt
    $(".js__p_start, .js__p_another_start").simplePopup();
  });
</script>
<?php
$diamond_carat_value = _nf($rowsring['carat'], 2);
$carat_margin = getCaratMargin( $diamond_carat_value );
?>
<style>
    .diamond_carat_bg{background: url('../../../../img/david_home/diamond_search/carat_diamond_bg_view.jpg') center no-repeat; width: 100%; height: 137px;}
    .diamond_carat_bg div{background: url('../../../../img/david_home/diamond_search/carat_bg_value.png') left no-repeat; width: 189px; height: 159px; display: inline-block; margin:5.4em 0px 0px <?php echo $carat_margin; ?>;}
    .diamond_carat_bg div span{display: inline-block; font-size: 20px; padding: 4.2em 0px 0px 24px; color:#fff;}
    .ring_img_block{position:relative; max-height:450px; height:100%;}
    </style>
<div class="diamondViewDetail container collection_detail_view">
<?php
$options_list = array('addpendantsetings3stone','tothreestone');

    $diamond_desc = 'This fair-cut '.$row_detail['cut'].', '.$row_detail['color'].'-color and '.$row_detail['clarity'].'-clarity diamond comes accompanied by a diamond grading report from the '.$row_detail['Cert'].'. <br>Have a question regarding this item? Our specialists are available to assist you.';
    $addring_link = config_item('base_url').'engagement/engagement_ring_settings/'.$lot.'/addtoring';
    $option_setting = setOptionValue($addoption);
    $diamondOption = ( ( $addoption == 'false' || $addoption === 'addjewelry' ) ? 'rapnet' : $addoption );
    $addring_pairlink = config_item('base_url').'diamonds/search/true/false/'.$option_setting.'/false/'.$lot;
    $diamondTitle = _nf($row_detail['carat'], 2) . '-Carat ' .$diamond_shape . ' Diamond';
    //echo wordwrap($diamond_desc, 50, "<br>\n");

    ?>
    <div>
        <ul class="bread_crumb_list">
            <li><a href="<?php echo SITE_URL; ?>wholesale">Home</a></li> > 
            <li><a href="<?php echo SITE_URL; ?>heartdiamond/heart_collection">Hearts &amp; Diamonds collection</a></li>
            <?php 
                $newarr = strchr($ringimg, 'no_image_found.jpg');
                if( empty($newarr) ) {
                    echo ' > <li><a href="'.SITE_URL.'heartdiamond/heart_collection_listing/newarrivals">New Arrivals</a></li>';
                }
                echo $bread_crumb_link; 
            ?>
<!--            <li><a href="<?php echo SITE_URL.'heartdiamond/heart_collection_listing/'.$rowsring['category']; ?>"><?php echo collection_cate_name($rowsring['category']); ?></a></li>-->
        </ul>
    </div>
    <div class="moredetail_bgblock daviddt_block">  
<!--        <div class="popup-gallery">
                <a href="http://heartsanddiamonds.com/webimages/completed_images/DJ0197W.jpg" class="">
                        click here
                    </a>
                </div>-->      
        <div class="container">
            <hr />
            <?php            
            
                if( $rowsring['category'] == 3292598018 ) {
            ?>
            <div class="set_steps_bar" id="builder_stpes_bar"><img src="<?php echo SITE_URL; ?>img/heart_diamond/ring_builder_steps.jpg" alt="ring_builder_steps" /></div>
                <?php } ?>
            <form name="collection_form" id="collection_form" method="post" action="">
            <div class="detail_column">
                <div class="detail_left col-sm-3">
                    <div class="left_cols_head">Create your <br><span>Own <?php echo $comp_jew_title; ?></span></div>
                    <div class="left_cols_head"><img src="<?php echo SITE_URL; ?>img/heart_diamond/reviews_stars.jpg" alt="reviews_stars" /><span><a href="#" class="set_review_link">(Read Reviews)</a></span></div>
                    <div class="center_stone_dm" id="center_stone_detail">
                    </div>
                </div>
                <div class="detail_center col-sm-6">
                    <div class="ring_img_block">
                        <div class="zoomright" id="ringsthumb_view">
                            <div class="set_thumb_img" id="<?php echo $rowsring['stock_number'];?>">                                
                            <div class="" id="show_thumb_view"></div>
                                  <?php //echo $product_thums;?>
                            <div class="image_section">
                                <?php
                                //echo '<img src="'.$ringimg.'" onmouseover="show_magnify_affect(\''.$rowsring['stock_number'].'\')" />';
                                echo $product_thumbs;
                                ?>
                            </div>
                            </div> 
                            <div class="left_arrow_view"><a href="#javascript" onclick="button_previous('<?php echo $rowsring['stock_number'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/left_arrow_icon.jpg" alt="left_arrow_icon" /></a></div>
        <div class="right_arrow_view"><a href="#javascript" onclick="button_next('<?php echo $rowsring['stock_number'];?>')"><img src="<?php echo SITE_URL; ?>img/heart_diamond/right_arrow_icon.jpg" alt="right_arrow_icon" /></a></div>
                        </div>
<!--                        <script src="<?php echo SITE_URL; ?>js/jquery.magnify.js"></script>
                        <script>
                            function show_magnify_affect(bkid) {
                                $('#'+bkid+' img').magnify();
                            }
                            </script>-->
                        <div class="clear"></div>
                        <div class="rings_thumbs">
<!--                            <img src="<?php echo SITE_URL; ?>img/heart_diamond/small_image_icon.jpg" alt="" />-->
                            <?php echo $rings_thumb; 
                                if( !empty($prod_thumbs['popup_thumbs']) ) {
                                    echo '<div class="smalimgview"><div class="popup-gallery">'.$prod_thumbs['popup_thumbs'].'</div></div>';
                                }
                            ?>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div><br><br>
                    <?php echo $recently_purchased; ?>
                    <div class="clear"></div><br><br>
                    <div class="cut_diamond"><?php echo $collections_cate; ?> Information</div>
                    <?php
                        $item_listing = array(
                            'Item Code' => $rowsring['item_sku'],
                            'Metal' => $rowsring['metal'],
                            'Metal Color' => $rowsring['metal_color'],
                            'Ring Style' => $rowsring['ring_style'],
                            'Karat' => $rowsring['carat'],
                            'Description' => $rowsring['description'],
                            'Ring Type' => $rowsring['ringtype'],
                            'Design' => $rowsring['design'],
                            'Made In' => $rowsring['made_in'],
                            'Ring Model' => $rowsring['ring_model'],
                            'Vend Style No.' => $rowsring['vend_style_no'],
                            'Clarity' => 'VVS1 to SI2',
                            'Color' => 'D to L'
                        );
                        
                        $view_lables = '';
                        
                        foreach( $item_listing as $label => $cols_value ) {
                            if( !empty($cols_value) ) {
                                $view_lables .= '<div class="detail_bk_row">
                                                    <div class="detail_left_cols">'.$label.'</div>
                                                    <div class="detail_right_cols">'.$cols_value.'</div>
                                                    <div class="clear"></div>
                                                </div>';
                            }
                        }
                        
                        echo $view_lables;
                        
                    ?>
                    <br>
                    <div class="cut_diamond">Diamond Information</div>
                    <div><?php echo $global_fields; ?></div>
                    <div class="clear"></div><br><br>
                    <div class="need_help_bk">
                        <div class="need_help_left col-sm-7">
                            <div class="help_head">NEED HELP?</div>
                            <div>Your questions or feedback are always welcome at Hearts and
Diamond. Join in a conversation with one of our Diamond and 
Jewelry Consultants to help you make the right decision.</div>
                        </div>
                        <div class="need_help_right col-sm-4 pull-right">
                            <div><span class="chat_icon">&nbsp;</span>Live Chat</div>
                            <div><span class="contact_ic">&nbsp;</span><?php echo CONTACT_NO; ?></div>
                            <div><span class="email_icon">&nbsp;</span><a href="mailto:<?php echo SITE_EMAIL; ?>">Email Us</a></div>
                        </div>
                    </div>
                </div>
                <div class="detail_right col-sm-3">
                    <div class="cut_diamond"><?php echo $heart_title; ?></div>
                    <div class="learn_about">
                        <div class="further_dtcols">
                            <span>ITEM CODE</span>
                            <span><?php echo $rowsring['item_sku']; ?></span>
                        </div>  
                        <div class="clear"></div>
                        <div class="further_dtcols">
                            <span>ITEM STYLE</span>
                            <span><?php echo $rowsring['ring_style']; ?></span>
                        </div>    
<!--                        <div class="further_dtcols">
                            <span>Metal</span>
                            <span><?php echo $rowsring['metal']; ?></span>
                        </div>    -->
                        <div class="further_dtcols">
                            <span>Retail Price</span>
                            <span><strike>$ <?php echo _nf($retail_price, 2); ?></strike> <span>save <?php echo _nf($saving_percent,0); ?>%</span></span>
                        </div>    
<!--                        <div class="further_dtcols">
                            <span>Carat Weight</span>
                            <span><?php echo $rowsring['carat']; ?></span>
                        </div>-->
                        <div class="clear"></div><br>
                    </div>
                    <div class="prices_label" id="price_label">$<?php echo _nf($sales_price, 2) ; ?></div><br>
                    <?php if( $rowsring['category'] == 3292598018 ) { ?>
                    <div class="further_dtcols metalsection ringsize">
                        <span>Ring Size:</span>
                        <span>
                            <select name="rings_size" id="rings_size" onchange="setListingPage(this.value)">
                                   <?php echo $finger_ring_size; ?>
                               </select>
                        </span>
                    </div>
                    <?php } ?>
                       <div class="further_dtcols metalsection ringsize">
                        <span>Metal Type:</span>
                        <span>
                            <select name="metal_type" id="metal_type" onchange="setListingPage(this.value)">
<!--                                <option value=""><?php echo $rowsring['metal']; ?></option>-->
                                <?php echo $metal_type_options; ?>
                               </select>
                        </span>
                    </div>
                    <div class="clear"></div>
                    <div class="jew_item_info">
                        <div class="item_sub_head"><?php echo $collections_cate; ?> Information</div>
                        <div class="learn_about">
                            <?php
                             //// 3292598018: rings
                             //// 3292603018: necklace and pendants
                            //// 3292601018: earing
                            ///  740520034: bands
                            
                            $item_info_list = array(
                                array('cate' => 3292598018, 'label'=>'Item Code', 'col_value' => $rowsring['item_sku']),
                                array('cate' => 3292598018, 'label'=>'Metal', 'col_value' => $rowsring['metal']),
                                array('cate' => 3292598018, 'label'=>'Metal Color', 'col_value' => $rowsring['metal_color']),
                                array('cate' => 3292598018, 'label'=>'Ring Style', 'col_value' => $rowsring['ring_style']),
                                array('cate' => 3292598018, 'label'=>'Karat', 'col_value' => $rowsring['carat']),
                                array('cate' => 3292598018, 'label'=>'Description', 'col_value' => $rowsring['description']),
                                array('cate' => 3292598018, 'label'=>'Ring Type', 'col_value' => $rowsring['ringtype']),
                                array('cate' => 3292598018, 'label'=>'Design', 'col_value' => $rowsring['design']),
                                array('cate' => 3292598018, 'label'=>'Made In', 'col_value' => $rowsring['made_in']),
                                array('cate' => 3292598018, 'label'=>'Ring Model', 'col_value' => $rowsring['ring_model']),
                                array('cate' => 3292598018, 'label'=>'Vend Style No.', 'col_value' => $rowsring['vend_style_no']),
                                array('cate' => 3292598018, 'label'=>'Clarity', 'col_value' => 'VVS1 to SI2'),
                                array('cate' => 3292598018, 'label'=>'Color', 'col_value' => 'D to L'),
                                array('cate' => '', 'label'=>'Stock Number', 'col_value' => $rowsring['item_sku']),
                                array('cate' => '', 'label'=>'Metal', 'col_value' => $rowsring['metal']),
                                array('cate' => 3292603018, 'label'=>'Clasp', 'col_value' => $rowsring['chain_clasp']),
                                array('cate' => 3292603018, 'label'=>'Chain Length', 'col_value' => $rowsring['chain_length']),
                                array('cate' => 3292603018, 'label'=>'Chain Type', 'col_value' => $rowsring['chain_type']),
                                array('cate' => 3292603018, 'label'=>'Width', 'col_value' => $rowsring['width']),
                                array('cate' => 3292603018, 'label'=>'Length', 'col_value' => $rowsring['length']),
                                array('cate' => 3292603018, 'label'=>'Rhodium Plated', 'col_value' => 'Yes'),
                                array('cate' => 3292601018, 'label'=>'Diameter', 'col_value' => $rowsring['hoop_diameter']),
                                array('cate' => 3292601018, 'label'=>'Backing', 'col_value' => $rowsring['back_type']),
                                array('cate' => 3292601018, 'label'=>'Approximate Weight', 'col_value' => $rowsring['weight']),
                                array('cate' => 3292601018, 'label'=>'Rhodium Plated', 'col_value' => 'Yes'),
                                array('cate' => 740520034, 'label'=>'Height', 'col_value' => $rowsring['ring_height']),
                                array('cate' => 740520034, 'label'=>'Width', 'col_value' => $rowsring['band_width'])
                            );
                            
                            $jew_item_info = '';
                            
                            foreach( $item_info_list as $itemrow ) {
                                if( $rowsring['category'] == $itemrow['cate'] || empty($itemrow['cate']) ) {
                                    $jew_item_info .= '<div class="further_dtcols">
                                                        <span>'.$itemrow['label'].'</span>
                                                        <span>'.check_empty($itemrow['col_value'], 'NA').'</span>
                                                    </div>
                                                    <div class="clear"></div>';
                                }
                            }
                            
                            echo $jew_item_info;
                            
                            ?>
                            <div class="clear"></div><br>
                        </div>
                    </div>
               <div class="clear"></div>
               <div class="metal_icon_list">
                   <?php echo $metals_list; ?>
               </div>
               
                    <div class="detail_botom_text"><br>
                <?php
                    $center_paire_stone = '';
                        if( $rowsring['category'] == 3292598018 ) {
                           $center_paire_stone = '<a href="#javascript" onclick="centerStoneDiamondList(\''.$rowsring['stock_number'].'\', \''.$rowsring['category'].'\', \''.$stone_count.'\')" class="button_link" id="addtoshopping">Add Center Stone</a>'; 
                        }
                        if( $rowsring['category'] == 3292601018 ) {
                           $center_paire_stone = '<a href="#javascript" onclick="centerStoneDiamondList(\''.$rowsring['stock_number'].'\', \''.$rowsring['category'].'\', \''.$stone_count.'\')" class="button_link" id="addtoshopping">Add Pair Stone</a>'; 
                        }
                        echo $center_paire_stone;
                ?>
<!--                        <span>FINISH-LEVEL</span><br>
                        <span>
                            <select name="finish_level" id="finished_level" onchange="centerStoneDiamondList('<?php echo $rowsring['stock_number']; ?>')">
                                
                                <?php
                                $finis_level = '';
                                $idlist_ar = array(7,66);
                                $finis_level .= '<option value="semi_mount">Semi-Mount</option>';
                                $finis_level .= '<option value="complete_stone">Complete</option>';
                                
                                echo $finis_level;
                                ?>                           
                            </select>
                        </span>-->
                    </div>
               <br><div id="center_diamond_list"></div><br>                   
                    <div class="clear"></div>
                    <div class="learn_about">
                        <div class="dataseting">Order Today for free Engagement Ring Delivery on <?php echo nextDate().' or set in jewelry on '.nextDate(11); ?>.</div>
                    </div><br>
                    <div class="">
                        <a href="<?php echo SITE_URL.'account/account_wishlist/'.$rowsring['stock_number']; ?>" class="button_link">Save this design</a>
                    </div>
                    <div class="share_this">
                            <span class='st_facebook_hcount' displayText='Facebook'></span> 
                            <span class='st_twitter_hcount' displayText='Tweet'></span><br>
                            <span class='st_linkedin_hcount' displayText='LinkedIn'></span> 
                            <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                        </div>
                        <div class="clear"></div><br><br>
                        <div class="set_buton_bg">
                         <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $rowsring['ring_style']; ?>" />
                          <input type="hidden" name="3ez_price" value="" />
                          <input type="hidden" name="5ez_price" value="" />
                          <input type="hidden" name="main_price" id='main_price' value="<?php echo $sales_price; ?>" />
                          <input type="hidden" name="price" value="<?php echo $sales_price; ?>" />
                          <input type="hidden" name="vender" value="heart_diamond_collection">
                          <input type="hidden" name="url" value="<?php echo $ringimg; ?>">
                          <input type="hidden" name="prodname" value="<?php echo $heart_title; ?>" />
                          <input type="hidden" name="diamnd_count" value="<?php echo $rowsring['diamond_count']; ?>">
                          <input type="hidden" name="ring_shape" value="<?php echo $rowsring['shape']; ?>" />
                          <input type="hidden" name="ring_carat" value="<?php echo $rowsring['carat']; ?>" />
                          <input type="hidden" name="prid" id="prid" value="<?php echo $rowsring['stock_number'];?>" />
                          <input type="hidden" name="txt_ringtype" value="heart_diamond_collection" />
                          <input type="hidden" name="txt_ringsize" value="" />
                          <input type="hidden" name="txt_metal" value="<?php echo $rowsring['metal']; ?>" />
                          <input type="hidden" name="metals_weight" value="<?php echo $rowsring['weight']; ?>" />
                          <input type="hidden" name="vendors_name" value="Hearts and Diamonds Collection" />
                          <input type="hidden" name="txt_addoption" value="heart_diamond_collection" />
                          <input type="hidden" name="center_stone_id" id="center_stone_id" />
                    <?php
                        if( $stone_count == 1 || $stone_count == 2 || empty($stone_count) ) {
                            echo '<a href="#javascript" onclick="addcartsubmit(\''.SITE_URL.'shbasket_wholesale/addtoshoppingcart/\')" id="addtoshopping" class="button_link">Place a Memo</a>';
                        } else {
                            echo 'Please Call ' . CONTACT_NO . ' for pricing';
                        }
                    ?>

                        </div>            
                </div>
                
                <div class="clear"></div>
            </div> 
            </form>
            <div class="clear"></div><br><br>
            <hr /><br> 
            <div class="ring_heading">You Might Also Like</div><br>
            <div class="rings_block">
                <?php echo $more_collection_listings['similar_listing'] . $more_collection_listings['popup_link']; ?>
                
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <br><br><br>
            <div class="ring_heading set_red_color">Matching Wedding Rings</div><br>
            <div class="rings_block">
                <?php echo $popular_listings['similar_listing'] . $popular_listings['popup_link']; ?>
                <div class="clear"></div><br>
            </div>
            <div class="clear"></div><br><br>
            <div class="expert_advice_bg">
                <div class="expert_advice">Expert Advice from our</div>
                <div class="jew_consultant">Jewelry Consultants</div><br><br>
                <div class="">
                    Our Consultants are here to help every step of the way, from selecting the perfect <br>setting and stones to ensuring a seamless delivery.
                </div><br>
                <div class="">
                    <b><?php echo CONTACT_NO; ?> SEND US A MESSAGE</b>
                </div><br><br>
                <div class="view_faq"><a href="#">View FAQ  ></a></div><br>
            </div>
            <div class="selection_tabs_bk" style="display:none;">
                <a href="#javascript" class="selection_tabs sel_active_tabs" id="diamonds_link" onclick="set_detail_blocks('diamond_detail_bk')">Diamond Selector</a>
                <a href="#javascript" class="selection_tabs" id="rings_link" onclick="set_detail_blocks('ring_detail_bk')">Product Details</a>
            </div>
            <br><br>
            <!-- diamond detail block start  -->
            <div class="detail_ring_bk" id="diamond_detail_bk" style="display:none;">
                <div class="detail_bk_left">
                    <div class="detail_inner_bk">
                        <div class="detail_bk_head"><?php echo $suport_shape; ?> Diamond</div>
                        <div class="clarity_row">
                            <div class="clarity_cols">
                                <div>Carat</div>
                                <div>1.2</div>
                            </div>
                            <div class="clarity_cols">
                                <div>Clarity</div>
                                <div>SI2</div>
                            </div>
                            <div class="clarity_cols">	
                                <div>Color</div>
                                <div>1</div>
                            </div>
                            <div class="clear"></div><br>
                        </div>
                        <div class="clear"></div><br>    
                        <div>
<!--                            <img src="<?php echo SITE_URL; ?>img/heart_diamond/diamond_shape_view.jpg" alt="" />-->
                            <img src="<?php echo $supported_shape; ?>" alt="" />
                        </div><br />
                        <div>
                            <div><a href="#javascript" class="link_style">Learn About Diamonds</a></div>
                            <div><a href="#javascript" class="link_style">View GIA Certificate</a></div><br />
                            <div class="prices_label">$<?php echo _nf($rowsring['priceRetail'], 2) ; ?></div><br />
                            <div class="total_price_label">Total ring price</div><br /><br /><br />
                            <div><a href="#" class="button_link">Change this diamond</a></div>
                        </div><br />
                        
                    </div>
                </div>
                <div class="detail_bk_right">
                    <div><br /><br />
                    <div class="rightdetail">
                <div class="right_dtheading">5.00-Carat Round Diamond</div>
                <div>This fair-cut G, L-color and VVS1-clarity diamond comes accompanied by a diamond grading report from the GIA. <br>Have a question regarding this item? Our specialists are available to assist you.</div><br>
                <div>
                    <div class="contact_no_dt"><b><?php echo CONTACT_NO; ?></b></div>
                    <div><a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></div>
                </div>
                <br>
                <div class="diamond_left_dt">
                    <div class="detail_rows"><label>SKU# 89 39</label></div>
                    <div class="detail_rows">
                        <span>Measurements: </span>
                        <span>10.71 x 10.83 x 6.92</span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Price</span>
                        <span>$54,600</span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Wire Price</span>
                        <span>$54,600</span>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="right_detail_cols">
                    <div class="right_left_dtcols">
                        <div class="detail_rows"></div>
                    <div class="detail_rows">
                        <span>Report </span>
                        <span>GIA</span>
                        <div class="clear"></div>
                    </div>
                    <div class="detail_rows">
                        <span>Color </span>
                        <span>L</span>
                        <div class="clear"></div>
                    </div>
                    
                    </div>
                    <div class="right_left_dtcols">
                        <div class="detail_rows"></div>
                    <div class="detail_rows">
                        <span>Cut </span>
                        <span>G</span>
                        <div class="clear"></div>
                    </div>
                     <div class="detail_rows">
                        <span>Clarity </span>
                        <span>VVS1</span>
                        <div class="clear"></div>
                    </div>
                    </div>                    
                </div>                
                <div class="clear"></div><br>
                  <div class="other_link_list">
                      <ul>
                          <li><a href="#" class="js__p_another_start">Drop a Hint</a></li>
                          <li><a href="http://heartsanddiamonds.jewelercart.com/account/account_wishlist/89 39/add/rapnet/">Add to Wishlist</a></li>
                          <li><a href="#" class="js__p_another_start">Ask an Expert</a></li>
                          <li><a href="#" class="js__p_start">Email a Friend</a></li>
                          <li><a href="#" class="js__p_another_start">Schedule Viewing</a></li>
                          <li><a href="#javascript" onclick="printCurrPage()">Print Details</a></li>
                      </ul>
                    </div>
                    <div class="clear"></div><br>
                    <div><b>Other Reports</b></div>
                    <div class="other_reports_link">
                        <ul>
<!--                          <li><a href="#">ASET</a></li>
                          <li><a href="#">Ideal Scope</a></li>
                          <li><a href="#">Heart</a></li>-->
                          <li><a href="#">Lab Report</a></li>
                          <li>
                              <a href="http://www.gia.edu/cs/Satellite?reportno=2145710367&amp;c=Page&amp;childpagename=GIA%2FPage%2FReportCheck&amp;pagename=GIA%2FDispatcher&amp;cid=1355954554547&amp;encryptedString=7CD682F48A4AC0441FEEC95403BDAA3C" target="_blank">Verify Lab Report</a></li>
                      </ul>
                    </div>
            </div>
                <div class="clear"></div><br>
                    </div><br />
                </div>
                
                <div class="clear"></div><br>
                
                    <div class="diamond_result">
                        <table width="">
                            <thead>
                                <tr>
                                    <th>Sort:</th>
                                    <th>Carat</th>
                                    <th>Clarity</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i=1; $i <= 10; $i++) {
                                ?>
                                <tr>
                                    <td><img src="<?php echo SITE_URL; ?>img/heart_diamond/diamond_small_icon.jpg" width="25" alt="" /></td>
                                    <td>
                                        <div>Carat</div>
                                        <div>1.20</div>
                                    </td>
                                    <td>
                                        <div>Clarity</div>
                                        <div>S12</div>
                                    </td>
                                    <td>
                                        <div>Color</div>
                                        <div>I</div>
                                    </td>
                                    <td>
                                        <div>Ring Price</div>
                                        <div>$5,775</div>
                                    </td>
                                    <td>
                                        <div><a href="#" class="table_link">View GIA <br>Certificate</a></div>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <div><a href="#">Select</a></div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <div class="clear"></div><br>
            </div>
            <!-- diamond detail block end  -->
            
            <!-- ring detail block start  -->
            <div class="detail_ring_bk" id="ring_detail_bk" style="display:none;">
                <div class="detail_bk_left">
                    <div class="detail_inner_bk">
                        <div class="detail_bk_head"><?php echo $suport_shape; ?> Diamond Engagement Ring</div>
<!--                        <div class="clarity_row">
                            <div class="clarity_cols">
                                <div>Carat</div>
                                <div>1.2</div>
                            </div>
                            <div class="clarity_cols">
                                <div>Clarity</div>
                                <div>SI2</div>
                            </div>
                            <div class="clarity_cols">	
                                <div>Color</div>
                                <div>1</div>
                            </div>
                            <div class="clear"></div><br>
                        </div>-->
                        <div class="clear"></div><br>    
                        <div>
                            <img src="<?php echo $ringimg; ?>" width="282" height="272" alt="<?php echo $ringtitle; ?>" />
                        </div><br />
                        <div>
<!--                            <div><a href="#javascript" class="link_style">Learn About Diamonds</a></div>
                            <div><a href="#javascript" class="link_style">View GIA Certificate</a></div><br />-->
                            <div class="prices_label">$<?php echo _nf($rowsring['priceRetail'], 2) ; ?></div><br />
                            <div class="total_price_label">Total ring price</div><br /><br /><br />
<!--                            <div><a href="#" class="button_link">Change this diamond</a></div>-->
                        </div><br />
                        
                    </div>
                </div>
                <div class="detail_bk_right">
                    <div><br /><br />
                    <div class="details_tab_right">
                        <div><b>ITEM INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Item Code</span>
                                <span><?php echo $rowsring['style_group']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Approx. Weight</span>
                                <span><?php echo $rowsring['metal_weight']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Measurements</span>
                                <span><?php echo 'Top Width: '.$rowsring['top_width'].' mm, Bottom Width: '.$rowsring['bottom_width'].' mm, <br>Top Height: '.$rowsring['top_height'].' mm, Bottom Height: '.$rowsring['bottom_height'].' mm'; ?></span>
                                <div class="clear"></div><br>
                            </div>
                            <div class="item_rows">
                                <span>Style Name</span>
                                <span><?php echo $rowsring['name']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Style Group Name</span>
                                <span><?php echo $rowsring['style_group']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stones</span>
                                <span><?php echo $rowsring['supplied_stones']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stone Weight</span>
                                <span><?php echo $rowsring['stone_weight']; ?></span>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div><br>
                        <div><b>DIAMOND INFORMATION</b></div><br>
                        <div class="item_detail_bk">
                            <div class="item_rows">
                                <span>Setting Type</span>
                                <span><?php echo $maincate_name; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stones</span>
                                <span><?php echo $rowsring['supplied_stones']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Supplied Stone Weight</span>
                                <span><?php echo $rowsring['stone_weight']; ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Diamond Shapes</span>
                                <span><?php echo $suport_shape; ?></span>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="item_rows">
                                <span>Center Stone Sold Separately</span>
                                <span><?php echo $rowsring['additional_stones']; ?></span>
                                <div class="clear"></div>
                            </div>                            
                            <?php
                                $itemInformation = '';
                                if( !empty( $suported_shapes) ) {  
                                    $itemInformation .= '<div class="item_rows">
                                                        <span>Diamond Shapes View</span>
                                                        <span>'.$suported_shapes.'</span>
                                                        <div class="clear"></div>
                                                    </div>';
                                }

                                echo $itemInformation;

                            ?>
                            <div class="item_rows">
                                <span>Clarity</span>
                                <span>VVS1 to SI2</span>
                                <div class="clear"></div>
                            </div>
                            <div class="item_rows">
                                <span>Color</span>
                                <span>D to L</span>
                                <div class="clear"></div>
                            </div>
                            
                        </div>
                    </div>
                    </div><br />
                </div>
                
                <div class="clear"></div><br>
            </div>
            <!-- ring detail block end  -->
            
        </div>
        <div class="container">
            <hr /><br><br>
            <div class="davidstern_cols col-sm-6">
                <div class="davidHeading">CARAT</div>
                <div>The international unit of weight used for measuring diamonds 
and gemstones, 1 carat is equal to 200 milligrams, or 0.2 grams. 
A specific measurement of a diamond's weight, carat weight alone 
may not accurately represent a diamond's visual size</div>
            </div>
            <div class="davidstern_cols1 col-sm-6"><br>
                <div>We recommend considering carat weight along with two other influential 
characteristics: the overall dimensions and the cut grade of the diamond.</div>
                <div><a href="#">Learn More ></a></div>
            </div>
                <div class="clear"></div><br>
                <div id="carat_graph">
                    <div class="aboutdavid_img diamond_carat_bk">
                       <div class="diamond_carat_bg">
                            <div><span><?php echo $diamond_carat_value; ?><br>Ct.</span></div>
                        </div>
    <!--                   <span><?php echo _nf($row_detail['carat'], 2); ?><br>Ct.</span>-->
                    <!-- <img src="<?php echo IMGSRC_LINK; ?>your_diamond_dt.jpg" alt="Your Diamond Detail">-->
                   <div class="clear"></div>
                   </div>
               </div>
                <div class="clear"></div><br>
                <br><br><br><br>
        </div>
    </div>
    <div class="clear"></div>
    <div class="similar_diamonds daviddt_block">
        <div class="mainwrap">
            <div class="davidstern_cols col-sm-6">
                <div class="davidHeading">CUT</div>
                <div>Excellent: Our most brilliant cut, representing roughly the top 1% of GIA diamond quality based on cut. The highest grades of polish and symmetry allow it to reflect even more light than the standard ideal cut.
<br><br>
Ideal cut: Represents roughly the top 3% of AGS diamond quality based on cut. Reflects nearly all light that enters the diamond. An exquisite and rare cut.
<br><br>
Very good cut: Represents roughly the top 15% of diamond quality based on cut. Reflects nearly as much light as the ideal cut, but for a lower price.
<br><br>
Good cut: Represents roughly the top 25% of diamond quality based on cut. Reflects most light that enters. Much less expensive than a very good cut.
<br><br>
Fair cut: Represents roughly the top 35% of diamond quality based on cut. Still a quality diamond, but a fair cut will not be as brilliant as a good cut.
<br><br>
Poor cut: Diamonds that are generally so deep and narrow or shallow and wide that they lose most of the light out the sides and bottom. Hearts and Diamonds does not carry diamonds with cut grades of poor.</div><br>
            </div>
            <div class="davidstern_cols1 col-sm-6">
                <div class="aboutdavid_img"><img src="<?php echo IMGSRC_LINK; ?>shallow_cut.jpg" alt="CUT DIAMOND"></div>
            </div>
                <div class="clear"></div><br>
        </div>
    </div>
    <div class="moredetail_bgblock daviddt_block">
        <div class="container"><br><br>
            <div class="davidstern_cols col-sm-6">
                <div class="davidHeading">COLOR</div>
                <div>Color refers to a diamond's lack of color, grading the whiteness of a diamond.
A color grade of D is the highest possible, while Z is the lowest.
Hearts and Diamonds only sells diamonds with a color grade of J or higher.</div>
            </div>
            <div class="davidstern_cols1 col-sm-6"><br>
                <div>Color manifests itself in a diamond as a pale yellow. This is why a diamond's color grade is based on its lack of color. The less color a diamond has, the higher its color grade. After cut, color is generally considered the second most important characteristic when selecting a diamond. This is because the human eye tends to detect a diamond's sparkle (light performance) first, and color second.
<br>
At Hearts and Diamonds, you'll find only the finest diamonds with color graded D-J. Diamonds graded J or better are colorless or near-colorless, with color that is typically undetectable to the unaided eye.</div>
            </div>
                <div class="clear"></div><br><br>
                <div class="aboutdavid_img"><img src="<?php echo IMGSRC_LINK; ?>color_grading_dt.jpg" alt="Your Diamond Detail"></div><br><br>
        </div>
    </div>
    <div class="similar_diamonds daviddt_block">
        <div class="container"><br><br>
            <div class="davidstern_cols col-sm-6">
                <div class="davidHeading">CLARITY</div>
                <div>Clarity is a measure of the number and size of the tiny imperfections that occur in almost all diamonds.
Many of these imperfections are microscopic, and do not affect a diamond's beauty in any discernible way.

Much is made of a diamond's clarity, but of the Four Cs, it is the easiest to understand, and, according to many experts, generally has the least impact on a diamond's appearance. Clarity simply refers to the tiny, natural imperfections that occur in all but the finest diamonds. 
</div>
            </div>
            <div class="davidstern_cols1 col-sm-6"><br>
                <div>Gemologists refer to these imperfections by a variety of technical names, including blemishes and inclusions, among others. Diamonds with the least and smallest imperfections receive the highest clarity grades. Because these imperfections tend to be microscopic, they do not generally affect a diamond's beauty in any discernible way.</div>
            </div>
                <div class="clear"></div><br><br>
                <div class="aboutdavid_img"><img src="<?php echo IMGSRC_LINK; ?>clarity_dt.jpg" alt="Your Diamond Detail"></div><br><br>
        </div>
    </div>
    <div class="moredetail_bgblock daviddt_block">
        <div class="container"><br><br>
            <div class="davidstern_cols col-sm-6">
                <div class="davidHeading">Diamond Price Guarantee</div>
                <div>The Hearts and Diamonds Diamond Price Match Guarantee makes it easy to purchase diamonds with peace of mind. If you find a comparable GIA certified diamond at a lower price, call <?php echo CONTACT_NO; ?>. If the offer meets our qualifications, we'll match the price. There is no comparison when it comes to the value and quality of Hearts and Diamonds.</div>
            </div>
            <div class="davidstern_cols1 col-sm-6">
                <div class="davidHeading">DIAMOND HEART UPGRADE PROGRAM</div>
                <div>As part of our jeweler for life commitment, Hearts and Diamonds is pleased to offer a lifetime diamond upgrade program on all GIA and AGSL certified diamonds. Simply call a Diamond & Jewelry Consultant at <?php echo CONTACT_NO; ?> to learn more about our upgrade program and to select your new diamond*.</div>
            </div>
                <div class="clear"></div><br><br>
                <div class="aboutdavid_img"><img src="<?php echo IMGSRC_LINK; ?>diamond_price_dt.jpg" alt="Your Diamond Detail"></div><br><br>
        </div>
    </div>
    <div class="shiping_block">
    <div class="container">
        <div class="shiping_imgbk col-sm-3">
            <img src="<?php echo IMGSRC_LINK; ?>shiping_dt.jpg" alt="Shipping Detail">
        </div>
        <div class="shiping_detailbk col-sm-9">
            <div class="shipheading">Shipping</div>
            <div>
                <?php echo $shipping_policy; ?>
            </div>
            <br><br>
        </div>
        <div class="clear"></div>
    </div>
 </div>
</div>
    <input type="hidden" name="liting_class" id="liting_class" value="" />
<script>
function centerStoneDiamondList(ringid, c_id, diamond_count) {
    var opt = $('#finished_level').val();
    $('#center_diamond_list').html('<div class="wait_data">LOADING PLEASE WAIT.....</div>');
    $('#diamond_detail_bk').show();
    $('.selection_tabs_bk').show();
    
    //if( opt === 'complete_stone' ) {
        $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/view_center_stone/' + ringid + '/' +diamond_count,
            success: function(response) {
                     $('#center_diamond_list').html(response);
           },
                     error: function(){alert('Error ');}
        });
        
        show_diamond_result_detail();
        get_left_diamond_detail(ringid, 'ring');
        
//    } else {
//        $('#center_diamond_list').html('');
//    }
}
function show_diamond_result_detail() {
    $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/view_diamond_result/',
            success: function(response) {
                     $('#diamond_detail_bk').html(response);
           },
                     error: function(){alert('Error ');}
        });
}

function get_left_diamond_detail(ringid, type) {
    $.ajax({
            type: "POST",
            url: base_url + 'heartdiamond/get_diamond_result_detail/'+encodeURI(ringid)+'/'+type,
            success: function(response) {
                     $('#center_stone_detail').html(response);
           },
                     error: function(){alert('Error ');}
        });
}
</script>
<script src="<?php echo SITE_URL; ?>js/jquery.simplePopup.js" type="text/javascript"></script>
<script type="text/javascript">
    function view_simple_popup(block_vid) {
        jQuery('#pop_' + block_vid).simplePopupBlock();
    }
if (typeof jQuery == 'undefined')
{
    alert("Jquery library is not loaded. Please goto System > Configuration > Catalog > I-Quickshop and enable it.");
}
else
{
    jQuery(document).ready(function() {
        var tb_pathToImage = "<?php echo DEMO_RETAIL_IMG; ?>ajax-loader.gif";
        //tb_init('a.thickbox, area.thickbox, input.thickbox');//pass where to apply thickbox
        imgLoader = new Image();// preload image
        imgLoader.src = tb_pathToImage;
    });
	
	//close thick box on ESC key
	jQuery(this).keydown(function(e){
        if (e == null) { // ie
                keycode = event.keyCode;
        } else { // mozilla
                keycode = e.which;
        }
        if(keycode == 27){ // close
                top.tb_remove();
        }
	});
}

// Added by Amit JS on 06-NOV-2013 to notify empty page
//Modified by sujit on 24-02-14 to send email for partial search
jQuery(document).ready(function () {
	var partial = '';
	var par = jQuery.trim(partial);
	var page = getParameterByName('p');
	
	if(jQuery.trim(jQuery('.note-msg').text()) == 'There are no products matching the selection.') {
		jQuery.post(BASE_URL+'/feeds/sendnotification.php',{purl:'<?php echo SITE_URL; ?>',fpc_id:'371'},function(res) {
			if(res=='success') {
				window.location.reload(true);
			}
		});
	}
	else if(par!='' && page=='') {
		//alert(page);
		jQuery.post(BASE_URL+'/feeds/sendnotification.php',{ptext:'',partialtext:par,surl:'<?php echo SITE_URL; ?>',fpc_id:''},function(res) {
			if(res=='success') {
				window.location.reload(true);
			}
		});
	}
	else {
		viewMoreLess();
		reviewSlider();
	}
});
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script> 
<div class="p_body js__p_body js__fadeout"></div>
  <div class="popup js__popup js__slide_top"> <a href="#" class="p_close js__p_close" title="Email a Friend"> <span></span><span></span> </a>
    <form name="askFriendForm" id="askFriendForm" method="post" action="#">
      <div class="p_content">
        <div class="popupHeading">Email a Friend&nbsp;<span class="validateMesage"></span></div>
        <div class="formArea">
          <div class="fieldBlock">
            <div class="fLabel">Your Name</div>
            <div class="columnSection">
              <input type="text" name="frien_fname" id="frien_fname" />
              <br />
              <span>First Name</span> </div>
            <div class="columnSection">
              <input type="text" name="frien_lname" id="frien_lname" />
              <br />
              <span>Last Name</span> </div>
            <div class="clear"></div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Your Email</div>
            <div>
              <input type="text" name="frien_email" id="frien_email" class="fullTextField" />
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Friend Name</div>
            <div class="columnSection">
              <input type="text" name="frien_frfname" id="frien_frfname" />
              <br />
              <span>First Name</span> </div>
            <div class="columnSection">
              <input type="text" name="frien_frlname" id="frien_frlname" />
              <br />
              <span>Last Name</span> </div>
            <div class="clear"></div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Friend Email</div>
            <div class="">
              <input type="text" name="frien_fremail" id="frien_fremail" class="fullTextField" />
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Description / Message</div>
            <div class="">
              <textarea name="frein_desc" id="frein_desc"></textarea>
            </div>
          </div>
          <div class="fieldBlock">
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['Stock_n'].'/false/';?>">
            <input type="button" name="btn_fnsubmit" class="btnStyle" onclick="friendForm()" value="Submit" />
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- second popup block -->
  <div class="popup js__another_popup js__slide_top"> <a href="#" class="p_close js__p_close" title="As an Expert"> <span></span><span></span> </a>
    <form name="askExpertForm" id="askExpertForm" method="post" action="#">
      <div class="p_content">
        <div class="popupHeading">Ask an Expert&nbsp;<span class="expertVdMessage"></span></div>
        <div class="formArea">
          <div class="fieldBlock">
            <div class="fLabel">Name</div>
            <div class="columnSection">
              <input type="text" name="exprt_fname" id="exprt_fname" />
              <br />
              <span>First Name</span> </div>
            <div class="columnSection">
              <input type="text" name="exprt_lname" id="exprt_lname" />
              <br />
              <span>Last Name</span> </div>
            <div class="clear"></div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Email</div>
            <div>
              <input type="text" name="exprt_email" id="exprt_email" class="fullTextField" />
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Phone No.</div>
            <div>
              <input type="text" name="exprt_pno" id="exprt_pno" class="" />
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">How did you hear about us?</div>
            <div>
              <select name="exprt_hear" id="exprt_hear">
                <option value="">Select</option>
                <option>Search Engine</option>
                <option>Yahoo</option>
                <option>Bing</option>
                <option>Google</option>
                <option>Friends</option>
                <option>Family</option>
                <option>Other Sources</option>
              </select>
            </div>
          </div>
          <div class="fieldBlock">
            <div class="fLabel">Description</div>
            <div class="">
              <textarea name="exprt_desc" id="exprt_desc"></textarea>
            </div>
          </div>
          <div class="fieldBlock">
            <input type="hidden" name="details_link" id="details_link" value="<?php echo 'diamonds/diamond_detail/'.$row_detail['Stock_n'].'/false/';?>">
            <input type="button" name="btn_exsubmit" class="btnStyle" onclick="askExperForm()" value="Submit" />
          </div>
        </div>
      </div>
    </form>
  </div>
  
  <!-- top bar add to cart block start -->
<div class="topbar_section" style="display: none;">
            <div class="top_bar_cart">
                <div class="topbar_left">
                    <div class="topbar_imgleft"><img src="<?php echo $ringimg; ?>" width="74" alt="<?php echo $ringtitle; ?>" /></div>
                    <div class="topbar_imgright">
                        <div class="topbar_heading"><?php echo $ringtitle; ?></div>
<!--                        <div class="topbar_label">in 18kt Yellow Gold with 1.5mm stones</div>-->
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="topbar_right">
                    <div class="topbar_cart_left">
                        <a href="#" class="addtocart_btn" onclick="addcartsubmit('<?php echo SITE_URL; ?>shbasket_wholesale/addtoshoppingcart/')">Place a Memo</a>
                    </div>
                    <div class="topbar_cart_right"><a href="#javascript" id="topbar_block"><img src="<?php echo SITE_URL; ?>img/heart_diamond/top_option_icon.jpg" /></a></div>
                </div>
                <div class="clear"></div>
            </div>
            <br>
            </div>
<!-- top bar add to cart block end -->
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<!--<script src="<?php echo SITE_URL; ?>js/jquery.min.js"></script>-->