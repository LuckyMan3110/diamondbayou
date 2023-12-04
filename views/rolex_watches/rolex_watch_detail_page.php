<link rel="stylesheet" type="text/css" href="<?php echo OTHER_MANUFACT; ?>rolex_page/_global.less">   
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/modernizr-2.6.2.js" type="text/javascript"></script>
<!--[if IE 8]>    
    <script src="/Scripts/site_js/respond.js" type="text/javascript"></script>
<![endif]-->
<div id="container">
  <div style="display: none" id="page_loading"></div>
  <div id="page_spin"></div>
  <section id="main_content_area">
    <div id="main_contentContainer" class="product_detail">
      <div id="product_detail_container" class="container">
        <div id="breadcrumb_container" class="col12">
          <div class="product_breadcrumb" id="ProductBreadcrumb1">
            <ul>
              <li class="parentList"><a href="<?php echo SITE_URL; ?>rolexrings/rolex_rings_listing" class="parentLink" hidefocus="true">Watches </a><span class="separator"></span></li>
              <li class="parentList"><a href="<?php echo SITE_URL; ?>rolexrings/rolex_rings_listing" class="parentLink" hidefocus="true">Wrist Watches </a><span class="separator"></span></li>
              <li class="parentList"><a href="<?php echo SITE_URL; ?>rolexrings/rolex_rings_listing" class="parentLink" hidefocus="true">Certified Pre-owned Rolex </a></li>
              <li class="parentList"></li>
            </ul>
          </div>
          <div class="last_breadcrumb"></div>
        </div>
        <div id="image_col" class="col6">
          <div id="media_container"> <!-- <img class="holder" width="500" height="500" src="./rolex_detail_page_files/product_detail_holder.gif"> --> <img class="position1 product_image" style="" title="<?php echo $results['title']; ?>" alt="<?php echo $results['title']; ?>" width="500" height="500" src="<?php echo SITE_URL.'stuller/rolex/images_rolex/'.$results['large_image']; ?>" />
            <div class="image_btn active position1">1</div>
            <img class="position2 product_image" style="display:none" title="<?php echo $results['title']; ?>" alt="<?php echo $results['title']; ?>" width="500" height="500" src="<?php echo SITE_URL.'stuller/rolex/images_rolex/'.$results['large_image2']; ?>" />
            <div class="image_btn  position2">2</div>
            <img class="position3 product_image" style="display:none" title="<?php echo $results['title']; ?>" alt="<?php echo $results['title']; ?>" width="500" height="500" src="<?php echo SITE_URL.'stuller/rolex/images_rolex/'.$results['large_image3']; ?>" />
            <div class="image_btn  position3">3</div>
            <img class="position4 product_image" style="display:none" title="<?php echo $results['title']; ?>" alt="<?php echo $results['title']; ?>" width="500" height="500" src="<?php echo SITE_URL.'stuller/rolex/images_rolex/'.$results['large_image4']; ?>" />
            <div class="image_btn  position4">4</div>
          </div>
            <div class="clear"></div>
            <div id="attributes_container" class="info_container">
            <h3 class="section_header">Attributes:</h3>
            <ul>
              <?php echo $watch_attribute; ?>
            </ul>
          </div>
            <form id="form1" name="form1" method="post" action="">
                <input type="hidden" name="price" value="<?php echo $results['price']; ?>" />
                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $results['style']; ?>" />
                <input type="hidden" name="main_price" value="<?php echo $results['price']; ?>" />
                <input type="hidden" name="vender" value="rolex_watch" />
                <input type="hidden" name="url" value="<?php echo SITE_URL.'stuller/rolex/images_rolex/'.$results['large_image']; ?>" />
                <input type="hidden" name="prodname" value="<?php echo $results['title']; ?>" />
                <input type="hidden" name="diamnd_count" value="" />
                <input type="hidden" name="ring_shape" value="" />
                <input type="hidden" name="ring_carat" value="" />
                <input type="hidden" name="prid" value="<?php echo $results['id']; ?>" />
                <input type="hidden" name="txt_ringtype" value="" />
                <input type="hidden" name="txt_ringsize" value="" />
                <input type="hidden" name="txt_metal" value="<?php echo $results['metal']; ?>" />
                <input type="hidden" name="vendors_name" value="Rolex Quality Gold" />
                <input type="hidden" name="txt_addoption" value="rolex_watch" />
                <input type="hidden" name="txt_qty" value="1" />
            </form>
            <div class="clear"></div>
            <div><a href="#javascript" onclick="addToCartSubmitForm('<?php echo SITE_URL; ?>jewelleries/addtoshoppingcart/')" id="addtoshopping"><img src="<?php echo SITE_URL; ?>images/buy-now.jpg" alt="Buy Now" width="242" style="width: 242px;" /></a><br></div>
        </div>
        <div id="info_col" class="col6 last">
          <div id="product_info_container">
            <h2 id="product_title"><?php echo $results['title']; ?></h2>
            <div id="features_info"> 
              
              <!-- ko if: Product().MSRP() -->
              <p class="price msrp_price "><span class="property">Suggested Sales Price: </span><span class="value" data-bind="text: &#39;$&#39; + Product().MSRP().toFixed(2) + &#39; &#39;">$<?php echo _nf($results['price'], 2); ?> </span></p>
              
              <!-- /ko -->
              
              <p class="style"><span class="property">Style: </span><span class="value" data-bind="text: Product().Style() "><?php echo $results['style']; ?></span></p>
              <p class="stock" data-bind="css: { red: isDiscontinued() }"> <span class="property">In Stock: </span> <span class="value" data-bind="html: ActualStock()"><?php echo $results['in_stock']; ?></span> </p>
            </div>
            <div id="product_tabs_container">
              <ul class="product_tab_list">
                <li class="product_tab_btn active" data-tab="Specs"><a href="https://qgold.com/pd/Certified-Pre-owned-Rolex-Steel-and-18ky-Ladies-Champagne-Dial-Watch/CRX119#" hidefocus="true"><span>Specs</span></a></li>
              </ul>
            </div>
            <div id="Specs" class="info_container tabbed">
              <ul data-bind="html: BuildSpecs()">
                <li class="status"><span class="property">Status: </span><span class="value"><?php echo $results['status']; ?></span></li>
                <li class="average_weight"><span class="property">Average Weight: </span><span class="value"><?php echo $results['average_weight']; ?><span class="weight_mesurement"> </span></span></li>
                <li class="county_origin"><span class="property">Country of Origin: </span><span class="value"><?php echo $results['country']; ?></span></li>
                <li><span class="property">Metal: </span><span class="value"><?php echo $results['metal']; ?></span></li>
                <li><span class="property">Product Type:</span> <span class="value"><?php echo $results['product_type']; ?></span></li>
                <li><span class="property">Watch Type:</span> <span class="value"><?php echo $results['watch_type']; ?></span></li>
                <li><span class="property">Material: Primary:</span> <span class="value"><?php echo $results['material_primary']; ?></span></li>
                <li><span class="property">Material: Primary - Color:</span> <span class="value"><?php echo $results['material_primary_color']; ?></span></li>
                <li><span class="property">Material: Accents:</span> <span class="value"><?php echo $results['material_accents']; ?></span></li>
                <li><span class="property">Material: Accent Color 1:</span> <span class="value"><?php echo $results['material_accent_color1']; ?></span></li>
                <li><span class="property">Length of Item:</span> <span class="value"><?php echo $results['length_of_item']; ?></span></li>
                <li><span class="property">Sold By Unit:</span> <span class="value"><?php echo $results['sold_by_unit']; ?></span></li>
                <li><span class="property">Bezel Type:</span> <span class="value"><?php echo $results['bezel_type']; ?></span></li>
                <li><span class="property">Case Material:</span> <span class="value"><?php echo $results['case_material']; ?></span></li>
                <li><span class="property">Caseback Material:</span> <span class="value"><?php echo $results['case_back_material']; ?></span></li>
                <li><span class="property">Clasp /Connector:</span> <span class="value"><?php echo $results['clasp_connector']; ?></span></li>
                <li><span class="property">Crown Type:</span> <span class="value"><?php echo $results['crown_type']; ?></span></li>
                <li><span class="property">Crystal Material:</span> <span class="value"><?php echo $results['crystal_material']; ?></span></li>
                <li><span class="property">Finish:</span> <span class="value"><?php echo $results['finish']; ?></span></li>
                <li><span class="property">Gender:</span> <span class="value"><?php echo $results['gender']; ?></span></li>
                <li><span class="property">Movement Country of Origin:</span> <span class="value"><?php echo $results['movement_country']; ?></span></li>
                <li><span class="property">Movement Descriptor:</span> <span class="value"><?php echo $results['movement_descriptor']; ?></span></li>
                <li><span class="property">Packaging:</span> <span class="value"><?php echo $results['packaging']; ?></span></li>
                <li><span class="property">Warranty:</span> <span class="value"><?php echo $results['warranty']; ?></span></li>
                <li><span class="property">Watch Band Material:</span> <span class="value"><?php echo $results['watch_band_material']; ?></span></li>
                <li><span class="property">Watch Band Width:</span> <span class="value"><?php echo $results['watch_band_width']; ?></span></li>
                <li><span class="property">Watch Band Width U/M:</span> <span class="value"><?php echo $results['watch_band_width_um']; ?></span></li>
                <li><span class="property">Watch Case Size:</span> <span class="value"><?php echo $results['watch_case_size']; ?></span></li>
                <li><span class="property">Watch Case size U/M:</span> <span class="value"><?php echo $results['watch_case_size_um']; ?></span></li>
                <li><span class="property">Watch Dial Color:</span> <span class="value"><?php echo $results['watch_dial_color']; ?></span></li>
                <li><span class="property">Watch Face Length:</span> <span class="value"><?php echo $results['watch_face_length']; ?></span></li>
                <li><span class="property">Watch Face Length U/M:</span> <span class="value"><?php echo $results['watch_face_length_um']; ?></span></li>
                <li><span class="property">Watch Face Thickness:</span> <span class="value"><?php echo $results['watch_face_thickness']; ?></span></li>
                <li><span class="property">Watch Face Thickness U/M:</span> <span class="value"><?php echo $results['watch_face_thickness_um']; ?></span></li>
                <li><span class="property">Watch Face Width:</span> <span class="value"><?php echo $results['watch_face_width']; ?></span></li>
                <li><span class="property">Watch Face Width U/M:</span> <span class="value"><?php echo $results['watch_face_width_um']; ?></span></li>
                <li><span class="property">Watch Function:</span> <span class="value"><?php echo $results['watch_function']; ?></span></li>
                <li><span class="property">Watch Movement Type:</span> <span class="value"><?php echo $results['water_movement_type']; ?></span></li>
                <li><span class="property">Water Movement Warranty:</span> <span class="value"><?php echo $results['water_movement_warranty']; ?></span></li>
                <li><span class="property">Water Resistant:</span> <span class="value"><?php echo $results['water_resistant']; ?></span></li>
              </ul>
            </div>
          </div>
<!--          <div id="detail_notify_container">
            <p>Login to add this product to your cart and see additional product details.</p>
            <a id="login_btn" href="https://qgold.com/Login?returnPath=/pd/Certified-Pre-owned-Rolex-Steel-and-18ky-Ladies-Champagne-Dial-Watch/CRX119" class="button blue" hidefocus="true">Login<span class="icon-arrow-right"></span></a> </div>-->
        </div>
      </div>
    </div>
  </section>
</div>
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/jquery-1.8.3.js"><\/script>')</script> 
<script type="text/javascript">
            var ROOT = "/" == "/" ? "/" : "/";                     
        </script> 
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/_global_scripts.js" type="text/javascript"></script> 
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/dropkick.js" type="text/javascript"></script> 
<script src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/_qg.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/qg_sliders.js"></script> 
<script type="text/javascript" src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/knockout-2.1.0.js"></script> 
<script type="text/javascript" src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/knockout-mapping-latest.js"></script> 
<script type="text/javascript" src="<?php echo OTHER_MANUFACT; ?>rolex_page/js/details.js"></script> 