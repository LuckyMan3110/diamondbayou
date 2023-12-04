<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(2).css" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(4).css" />
    
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/fonts.css" />
<script type="text/javascript" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/js/saved_resource(5).js"></script>
<!--
        /*
         * Emigre web font kit 53a9d2b43e896
         * 
         * These fonts are not shareware. 
         * Use of these fonts requires the purchase 
         * of a license from Emigre, www.emigre.com  
         * Please contact sales@emigre.com
         *
         * To purchase a license to use this font go to:
         * http://www.emigre.com/fontpage.php?SMrR.html
         *
         * © 2012 Emigre, Inc
        
         *
         * Emigre web font kit 53a9d2b443726
         * 
         * These fonts are not shareware. 
         * Use of these fonts requires the purchase 
         * of a license from Emigre, www.emigre.com  
         * Please contact sales@emigre.com
         *
         * To purchase a license to use this font go to:
         * http://www.emigre.com/fontpage.php?SMrRI.html
         *
         * © 2012 Emigre, Inc
        -->

<div id="everythingContainer" class="">
  <div class="clear"></div>
  <div id="footerPadding" class="loggedOutFooterPadding">
    <div id="containerContent">
      <div id="containerContent_Inner">
        <ul id="viewingbar">
          <li class="top"> <a href="<?php echo SITE_URL; ?>">Fine Jewelry</a> </li>
          <li class="lastNaviItem"> <span>Men's Bands</span> </li>
        </ul>
        <div id="main">
          <div class="row">
            <div id="navContent" class="navContent col-md-12">
              <div>
                <div id="content">
                  <!--<h1 class="pull-left set_top_margin"> Men's Bands </h1>-->
                  <div id="catalog">
                    <div>
                      <form method="get" action="<?php echo SITE_URL; ?>browse/wedding-and-engagement/wedding-bands/diamond/" class="topFilterForm">
                        <div class="floatRight">
                          <div class="pager">
                            <table>
                              <tbody>
                                <tr>
                                  <td>Page</td>
                                  <td class="previousPage"></td>
                                  <td class="previousPage"><?php echo $page_links; ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <span id="jumpToFiltersButton" class="secondary smallButton StullerButton">
                        <button title="Go To Filters" type="button" class="jumpToFilters visible-xs hideForNonResponsive"> <span>Filters</span> </button>
                        </span>
                        
                        <div id="top-filtering-area" class="filterTable form-horizontal clear">
                            
                            <div class="col-md-3">
                                <label>Price</label>
                                <select id="price_orderby" name="price_orderby" onchange="set_dropdown_link(this.value)">
                                  <option value="<?php echo SITE_URL; ?>store/wedding_bands_mens">All</option>
                                  <option value="<?php echo SITE_URL; ?>store/wedding_bands_mens?sort_value=ASC&field=price" <?php if( isset($_GET['sort_value']) AND $_GET['sort_value'] == 'ASC' AND $_GET['field'] == 'price'){ echo 'selected'; } ?> >Price: Low to High</option>
                                  <option value="<?php echo SITE_URL; ?>store/wedding_bands_mens/?sort_value=DESC&field=price" <?php if( isset($_GET['sort_value']) AND $_GET['sort_value'] == 'DESC' AND $_GET['field'] == 'price'){ echo 'selected'; } ?>>Price: High to Low</option>
                                </select>
                            </div>   
                            
                            <div class="col-md-3">
                                <label>Metals</label>
                                <select id="metals_sortby" name="metals_sortby">
                                  <option value="<?php echo SITE_URL; ?>store/wedding_bands_mens">All</option>
                                </select>
                            </div> 
                            
                            <div class="col-md-3">
                                <label>Setting Type</label>
                                <select id="settings_sortby" name="settings_sortby">
                                  <option value="<?php echo SITE_URL; ?>store/wedding_bands_mens">All</option>
                                </select>
                            </div> 
                            
                            <div class="col-md-3">
                                <label>Short</label>
                                <select id="sortby" name="sortby" onchange="set_dropdown_link(this.value)">
                                  <option value="<?php echo SITE_URL; ?>store/wedding_bands_mens">All</option>
                                  <option value="<?php echo SITE_URL; ?>store/wedding_bands_mens?sort_value=DESC&field=id" <?php if( isset($_GET['sort_value']) AND $_GET['sort_value'] == 'DESC' AND $_GET['field'] == 'id'){ echo 'selected'; } ?>>Newest</option>
                                  <option value="<?php echo SITE_URL; ?>store/wedding_bands_mens/?sort_value=ASC&field=id" <?php if( isset($_GET['sort_value']) AND $_GET['sort_value'] == 'ASC' AND $_GET['field'] == 'id'){ echo 'selected'; } ?>>Oldest</option>
                                </select>
                            </div> 
                            
                            <script>
                              function set_dropdown_link(getVal){
                                  window.location.href = getVal;
                              }
                            </script>
                                
                            
                          <!--<div class="floatLeft rightMargin10"><span>Sort by:</span>
                            <select id="sortby" name="sortby">
                              <option value="default">Default</option>
                              <option value="recent">Newest</option>
                              <option value="priceasc">Price: Low to High</option>
                              <option value="pricedesc">Price: High to Low</option>
                              <option value="alphabetical">Name</option>
                              <option value="bestsellers">Bestsellers</option>
                            </select>
                          </div>
                          <div class="hide">
                            <div id="addToExport"> </div>
                          </div>
                          <div id="pageSizeSection" class="floatRight">
                            <div class="floatRight rightMargin10"><span>Items<span class="hidden-inline-xs">&nbsp;per page</span>:</span>
                              <select id="pageSize" name="pageSize">
                                <option selected="selected" value="36">36</option>
                                <option value="72">72</option>
                                <option value="144">144</option>
                              </select>
                            </div>
                            <div class="floatRight rightMargin10 hidden-xs set_line_font">|</div>
                            <div class="floatRight rightMargin10 hidden-xs"> <span class="middleAlign"> Showing <span id="numResultsText">1</span> - <span>36</span> of <span id="totalSearchResults">69</span> </span> </div>
                          </div>-->
                          
                          
                        </div>
                        
                      </form>
                    </div>
                    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(8)" />
                    <div id="results">
                        <div class="resultsFlex">
                            <?php echo $wedding_band_mens; ?>
                        </div>
                    </div>
                    <div class="floatRight">
                      <div class="pager">
                        <table>
                          <tbody>
                            <tr>
                              <td>Page</td>
                              <td class="previousPage"></td>
                              <td class="previousPage"><?php echo $page_links; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="feedbackContainer clear smallFont">
          <div class="floatRight noUnderline link" onclick="window.print();"> <span>[</span> <span class="glyphicon glyphicon-print" hide_block"></span> <span>]</span> <span> Print this Page</span> </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(9)"></script> 
<script type="text/javascript" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/js/include.js"></script>