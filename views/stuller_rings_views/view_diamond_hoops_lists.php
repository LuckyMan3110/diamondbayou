<div id="footerPadding" class="loggedOutFooterPadding">
        <div id="containerContent">
      <div id="containerContent_Inner">
        <ul id="viewingbar">
          <li class="top"> <a href="<?php echo SITE_URL; ?>">Home</a> </li>
          <li class="top"> <a href="#">Jewelry</a> </li>
          <li class="lastNaviItem"> <a href="<?php echo SITE_URL; ?>stuller_new_rings/diamond_hoop_earings">Diamond Hoops</a> </li>
        </ul>
        <div id="main">
          <div class="row">
            <div id="navContent" class="navContent col-md-9 col-md-push-3 col-sm-8 col-sm-push-4 col-xs-12">
              <div>
                <div id="content">
                  <h1 class="pull-left set_top_margin"> Diamond Hoops </h1>
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
                                  <td class="pagination-numbers text-center"><span class="this-page">1</span> <a href="<?php echo SITE_URL; ?>browse/wedding-and-engagement/wedding-bands/diamond/?page=2" onclick="" class=" padding">2</a></td>
                                  <td class="nextPage"><a href="<?php echo SITE_URL; ?>browse/wedding-and-engagement/wedding-bands/diamond/?page=2" onclick="" class="containerFix padding"><span class="fa fa-caret-right"></span></a></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <span id="jumpToFiltersButton" class="secondary smallButton StullerButton">
                        <button title="Go To Filters" type="button" class="jumpToFilters visible-xs hideForNonResponsive"> <span>Filters</span> </button>
                        </span>
                        <div class="filterTable form-horizontal clear">
                          <div class="floatLeft rightMargin10"><span>Sort by:</span>
                            <select id="sortby" name="sortby" onchange="set_option_page_link(this.value)">
                              <?php echo $option_link; ?>
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
                            <div class="floatRight rightMargin10 set_line_font hidden-xs">|</div>
                            <div class="floatRight rightMargin10 hidden-xs"> <span class="middleAlign"> Showing <span id="numResultsText">1</span> - <span>36</span> of <span id="totalSearchResults">69</span> </span> </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(8).css" />
                    <div id="results">
                        <div class="resultsFlex">
                            <?php echo $view_diamond_hooplist; ?>
                        </div>
                    </div>
                    <div class="floatRight">
                      <div class="pager">
                        <table>
                          <tbody>
                            <tr>
                              <td>Page</td>
                              <td class="previousPage"></td>
                              <td class="pagination-numbers text-center"><span class="this-page">1</span> <a href="<?php echo SITE_URL; ?>browse/wedding-and-engagement/wedding-bands/diamond/?page=2" onclick="" class=" padding">2</a></td>
                              <td class="nextPage"><a href="<?php echo SITE_URL; ?>browse/wedding-and-engagement/wedding-bands/diamond/?page=2" onclick="" class="containerFix padding"><span class="fa fa-caret-right"></span></a></td>
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
           <div id="sideFilterContainer" class="col-md-3 col-md-pull-9 col-sm-4 col-sm-pull-8 col-xs-12">
  <div id="catnav">
    <div id="catNavOverlay"></div>
    <div class="search_refining">
      <ul class="metaltype sideNavSection">
        <li>
          <div class="sectionLabel">Metal Type<span class="floatRight bgColor glyphicon glyphicon-minus"></span></div>
          <ul class="topFilters hide_overflow">
            <li class="visible-xs visible-sm hideForNonResponsive"> <a class="noSub" href="#"> <span class="subText">Gold</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Gold</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive"> <a class="noSub" href="#"> <span class="subText">Platinum</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Platinum</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Silver</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Silver</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Palladium</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Palladium</span> <span class="subArrow">&gt;</span> </a> </li>
          </ul>
        </li>
      </ul>
      <ul class="metalcolor sideNavSection">
        <li>
          <div class="sectionLabel">Metal Color<span class="floatRight bgColor glyphicon glyphicon-minus"></span></div>
          <ul class="topFilters hide_overflow">
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="<?php echo $metal_color; ?>White"> <span class="subText">White</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="<?php echo $metal_color; ?>White"> <span class="subText">White</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="<?php echo $metal_color; ?>Yellow"> <span class="subText">Yellow</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="<?php echo $metal_color; ?>Yellow"> <span class="subText">Yellow</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="<?php echo $metal_color; ?>Rose"> <span class="subText">Rose</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="<?php echo $metal_color; ?>Rose"> <span class="subText">Rose</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="<?php echo $metal_color; ?>Two Tone"> <span class="subText">Two Tone</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="<?php echo $metal_color; ?>Two Tone"> <span class="subText">Two Tone</span> <span class="subArrow">&gt;</span> </a> </li>
          </ul>
        </li>
      </ul>
      <ul class="metalkarat sideNavSection">
        <li>
          <div class="sectionLabel">Metal Karat<span class="floatRight bgColor glyphicon glyphicon-minus"></span></div>
          <ul class="topFilters hide_overflow">
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">14kt</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">14kt</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">18kt</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">18kt</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">10kt</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">10kt</span> <span class="subArrow">&gt;</span> </a> </li>
          </ul>
        </li>
      </ul>
      <ul class="color sideNavSection">
        <li>
          <div class="sectionLabel">Stone Color<span class="floatRight bgColor glyphicon glyphicon-minus"></span></div>
          <ul class="topFilters hide_overflow">
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">G-H</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">G-H</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">White</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">White</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">H+</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">H+</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">H-I</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">H-I</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">I2-I3</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">I2-I3</span> <span class="subArrow">&gt;</span> </a> </li>
          </ul>
        </li>
      </ul>
      <ul class="shape sideNavSection">
        <li>
          <div class="sectionLabel">Stone Shape<span class="floatRight bgColor glyphicon glyphicon-minus"></span></div>
          <ul class="topFilters hide_overflow">
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Round</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Round</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">N/A</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">N/A</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Marquise</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Marquise</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Square</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Square</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Circle</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Circle</span> <span class="subArrow">&gt;</span> </a> </li>
          </ul>
        </li>
      </ul>
      <ul class="pim_primary_stone_shape sideNavSection">
        <li>
          <div class="sectionLabel">Primary Stone Shape<span class="floatRight bgColor glyphicon glyphicon-plus"></span></div>
          <ul class="topFilters hide_overflow">
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="<?php echo $stone_shape; ?>Round"> <span class="subText">Round</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="<?php echo $stone_shape; ?>Round"> <span class="subText">Round</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="<?php echo $stone_shape; ?>N/A"> <span class="subText">N/A</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="<?php echo $stone_shape; ?>N/A"> <span class="subText">N/A</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="<?php echo $stone_shape; ?>Marquise"> <span class="subText">Marquise</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="<?php echo $stone_shape; ?>Marquise"> <span class="subText">Marquise</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="<?php echo $stone_shape; ?>Square"> <span class="subText">Square</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="<?php echo $stone_shape; ?>Square"> <span class="subText">Square</span> <span class="subArrow">&gt;</span> </a> </li>
          </ul>
        </li>
      </ul>
      <ul class="productstate sideNavSection">
        <li>
          <div class="sectionLabel">Product State<span class="floatRight bgColor glyphicon glyphicon-plus"></span></div>
          <ul class="topFilters hide_overflow">
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Mounting</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Mounting</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Complete</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Complete</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Semi-Mount</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Semi-Mount</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Component</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Component</span> <span class="subArrow">&gt;</span> </a> </li>
          </ul>
        </li>
      </ul>
      <ul class="pim_color sideNavSection">
        <li>
          <div class="sectionLabel">Color<span class="floatRight bgColor glyphicon glyphicon-plus"></span></div>
          <ul class="topFilters hide_overflow">
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">White</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">White</span> <span class="subArrow">&gt;</span> </a> </li>
            <li class="visible-xs visible-sm hideForNonResponsive "> <a class="noSub" href="#"> <span class="subText">Rose</span> </a> </li>
            <li class="hidden-inline-xs hidden-inline-sm"> <a class="noSub" href="#"> <span class="subText">Rose</span> <span class="subArrow">&gt;</span> </a> </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
        $(".expandableFilterTrigger").removeClass("hide");
        $(".expandableFilter").addClass("hide");
        $(".solrShowAll").click(function () {
            $(this).parent(".expandableFilterTrigger").addClass("hide");
            $(this).closest("ul").children("li.expandableFilter").each(function () {
                if ($(this).css("display") =="none") {
                    $(this).removeClass("hide");
                } else {
                    $(this).addClass("hide");
                }
            });
        });
        $('.qTipMegaMenu').delegate('.sub', 'mouseover', function (event) {
            var self = $(this),
            qtip = '.qtip.ui-tooltip-stuller-category',
            container = $(event.liveFired),
            submenu = self.next('div'),
                
            // Determine whether this is a top-level menu
            isTopMenu = self.parents(qtip).length < 1;
            // If it's not a top level and we can't find a sub-menu... return
            if (isTopMenu && !submenu.length) { return false; }
            // Create the tooltip
            self.qtip({
                overwrite: false, // Make sure we only render one tooltip
                content: {
                    text: submenu // Use the submenu as the qTip content
                },
                position: {
                    viewport: $("#navContent").offset().top < $(window).scrollTop() ? $(window) : $("#navContent"),
                    adjust: {
                        method: 'none shift'
                    },
                    my: 'left bottom',
                    at: 'right bottom'
                },
                show: {
                    delay: 75,
                    event: event.type, // Make sure to sue the same event as above
                    ready: true, // Make sure it shows on first mouseover
                    solo: true
                },
                hide: {
                    delay: 200,
                    event: 'unfocus mouseleave',
                    fixed: true // Make sure we can interact with the qTip by setting it as fixed
                },
                style: {
                    classes: 'ui-tooltip-stuller-category',
                    tip: false // We don't want a tip... it's a menu duh!
                },
                events: {
                    // Toggle an active class on each menus activator
                    toggle: function (event, api) {
                        api.elements.target.parent('li').toggleClass('activeCatLink', event.type === 'tooltipshow');
                    },
                    visible: function (event, api) {
                        api.set("position.viewport", $("#navContent").offset().top < $(window).scrollTop() ? $(window) : $("#navContent"));
                    }
                }
            });
        });
        $(".sectionLabel").click(function () {
            var sectionMenu = $(this).siblings(".topFilters");
            if (sectionMenu.is(":visible")) {
                $(this).closest(".sideNavSection").removeClass("clicked");
                CollapseLeftNavSection($(this).closest(".sideNavSection"));
            } else {
                $(this).closest(".sideNavSection").addClass("clicked");
                ExpandLeftNavSection($(this).closest(".sideNavSection"));
            }
        });
        
        $(window).resize(function () {
            HandleLeftNavCollapse();
        });
        HandleLeftNavCollapse();
    });
    
</script> 
</div>
          </div>
        </div>
        <div class="feedbackContainer clear smallFont">
          <div class="floatRight noUnderline link" onclick="window.print();"> <span>[</span> <span class="glyphicon glyphicon-print"></span> <span>]</span> <span>  Print this Page</span> </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
        <div id="containerFooter" class="containerFix noFooterBackgroundChange">
          <div data-cms="{
  &quot;EditUrl&quot;: &quot;&quot;,
  &quot;ContentContainerId&quot;: 55046,
  &quot;ContentId&quot;: 859,
  &quot;Title&quot;: &quot;&quot;,
  &quot;ContentType&quot;: &quot;&quot;,
  &quot;ChildContent&quot;: null
}" class="cms_section  targeted-marketing" data-content_container_id="55046" data-content_block_id="859">
            <div class="frequentCategories topMarginExtraLarge containerFix row">
              <div class="col-sm-3 freqCatSection">
                <h2 class="hidden-xs"><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;3CCollection&#39;)" class="noUnderline" href="<?php echo SITE_URL; ?>categories/23618?showAll=true">Flexible Collection</a></h2>
                <h2 class="visible-xs hideForNonResponsive">Flexible Collection</h2>
                <div class="subCats">
                  <ul>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;Engagement&#39;)" href="<?php echo SITE_URL; ?>categories/23621">Engagement</a></li>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;GemstoneRings&#39;)" href="<?php echo SITE_URL; ?>categories/23631">Gemstone Rings</a></li>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;Mens&#39;)" href="<?php echo SITE_URL; ?>categories/23641">Men's</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3 freqCatSection">
                <h2 class="hidden-xs"><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;Bridal&#39;)" class="noUnderline" href="<?php echo SITE_URL; ?>categories/15">Bridal</a></h2>
                <h2 class="visible-xs hideForNonResponsive">Bridal</h2>
                <div class="subCats">
                  <ul>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;Bridal Mountings&#39;)" href="<?php echo SITE_URL; ?>categories/10979">Bridal Mountings</a></li>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;EverAndEver&#39;)" href="<?php echo SITE_URL; ?>categories/24004">Ever&amp;Ever™</a></li>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;NewProducts-Bridal&#39;)" href="<?php echo SITE_URL; ?>categories/22072">New Products</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3 freqCatSection">
                <h2 class="hidden-xs"><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;Mountings&#39;)" class="noUnderline" href="<?php echo SITE_URL; ?>categories/3">Mountings</a></h2>
                <h2 class="visible-xs hideForNonResponsive">Mountings</h2>
                <div class="subCats">
                  <ul>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;AdvancedMountingsSearch&#39;)" href="<?php echo SITE_URL; ?>searchbystone/">Advanced Mountings Search</a></li>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;3CCollection&#39;)" href="<?php echo SITE_URL; ?>categories/23618?showAll=true">3C Collection</a></li>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;NewProducts-Mountings&#39;)" href="<?php echo SITE_URL; ?>categories/2854">New Products</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-3 freqCatSection">
                <h2 class="hidden-xs"><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;Findings&#39;)" class="noUnderline" href="<?php echo SITE_URL; ?>categories/2">Findings</a></h2>
                <h2 class="visible-xs hideForNonResponsive">Findings</h2>
                <div class="subCats">
                  <ul>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;DieStruckJewelry&#39;)" href="<?php echo SITE_URL; ?>diestruck/">Die-Struck Jewelry </a></li>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;PresetFindings&#39;)" href="<?php echo SITE_URL; ?>categories/22529">Preset Findings</a></li>
                    <li><a onclick="StullerTrackEvent(&#39;Quicklinks&#39;,&#39;Default&#39;,&#39;NewProducts-Findings&#39;)" href="<?php echo SITE_URL; ?>categories/2910">New Products</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <script type="text/javascript">
    $(".freqCatSection h2").click(function() {
        if ($("#bootstrap-visible-xs").is(":visible")) {
            $(this).parents('.freqCatSection').toggleClass("expand","400");
        }
    });
</script>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div data-cms="{
  &quot;EditUrl&quot;: &quot;&quot;,
  &quot;ContentContainerId&quot;: 54906,
  &quot;ContentId&quot;: 1071,
  &quot;Title&quot;: &quot;&quot;,
  &quot;ContentType&quot;: &quot;&quot;,
  &quot;ChildContent&quot;: null
}" class="cms_section  targeted-marketing" data-content_container_id="54906" data-content_block_id="1071">
            <div class="clear footerCMSBanners">
              <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12 bottomMarginExtraLarge topMarginExtraLarge text-center-xs smallBanner">
                  <div class="auto-margin-xs inline_block">
                    <div class="responsive-image-caption-item"> <a class="visible-lg visible-md visible-sm visible-xs" onclick="StullerTrackEvent(&quot;Banners&quot;, &quot;CorpFooter-20160104-LocateAJewler&quot;, &quot;Slide1&quot;);" href="<?php echo SITE_URL; ?>locateajeweler/"> <img class="image-responsive" src="<?php echo SITE_URL; ?>stuller_libs/stud_earings/imgs_lib/Stuller.jpg" alt="2016-01-04 | Corp Footer | Locate A Jeweler"> </a> <a class="visible-lg visible-md visible-sm visible-xs" onclick="StullerTrackEvent(&quot;Banners&quot;, &quot;CorpFooter-20160104-LocateAJewler&quot;, &quot;Slide1&quot;);" href="<?php echo SITE_URL; ?>locateajeweler/">
                      <div class="responsive-image-caption-item-cover">
                      <div class="Archer responsive-image-caption-item-cover-title">Point Customers To Your Store</div>
                    </div>
                      <div class="responsive-image-caption-item-cover-overlay">
                      <div class="Archer responsive-image-caption-item-cover-title">Point Customers To Your Store</div>
                      <div class="responsive-image-caption-item-cover-subtitle"> Stuller retailers can now be found with Locate a Jeweler so you won't miss a possible sale. </div>
                    </div>
                      </a> </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 bottomMarginExtraLarge topMarginExtraLarge text-center-xs smallBanner">
                  <div class="auto-margin-xs inline_block">
                    <div class="responsive-image-caption-item"> <a class="visible-lg visible-md visible-sm visible-xs" onclick="StullerTrackEvent(&quot;Banners&quot;, &quot;CorpFooter-20160104-PrimeManufacturing&quot;, &quot;Slide2&quot;);" href="<?php echo SITE_URL; ?>pages/53344"> <img class="image-responsive" src="<?php echo SITE_URL; ?>stuller_libs/stud_earings/imgs_lib/Stuller(1).jpg" alt="2016-01-04 | Corp Footer | Prime Manufacturing"> </a> <a class="visible-lg visible-md visible-sm visible-xs" onclick="StullerTrackEvent(&quot;Banners&quot;, &quot;CorpFooter-20160104-PrimeManufacturing&quot;, &quot;Slide2&quot;);" href="<?php echo SITE_URL; ?>pages/53344">
                      <div class="responsive-image-caption-item-cover">
                      <div class="Archer responsive-image-caption-item-cover-title">Prime Manufacturing</div>
                    </div>
                      <div class="responsive-image-caption-item-cover-overlay">
                      <div class="Archer responsive-image-caption-item-cover-title">Prime Manufacturing</div>
                      <div class="responsive-image-caption-item-cover-subtitle"> We make our own metals...because we want the best. </div>
                    </div>
                      </a> </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 bottomMarginExtraLarge topMarginExtraLarge text-center-xs smallBanner">
                  <div class="auto-margin-xs inline_block">
                    <div class="responsive-image-caption-item"> <a class="visible-lg visible-md visible-sm visible-xs" onclick="StullerTrackEvent(&quot;Banners&quot;, &quot;CorpFooter-20160104-Blog&quot;, &quot;Slide3&quot;);" href="<?php echo SITE_URL; ?>blog/"> <img class="image-responsive" src="<?php echo SITE_URL; ?>stuller_libs/stud_earings/imgs_lib/Stuller(2).jpg" alt="2016-01-04 | Corp Footer | Blog"> </a> <a class="visible-lg visible-md visible-sm visible-xs" onclick="StullerTrackEvent(&quot;Banners&quot;, &quot;CorpFooter-20160104-Blog&quot;, &quot;Slide3&quot;);" href="<?php echo SITE_URL; ?>blog/">
                      <div class="responsive-image-caption-item-cover">
                      <div class="Archer responsive-image-caption-item-cover-title">Be In The Know</div>
                    </div>
                      <div class="responsive-image-caption-item-cover-overlay">
                      <div class="Archer responsive-image-caption-item-cover-title">Be In The Know</div>
                      <div class="responsive-image-caption-item-cover-subtitle"> Zale's tales, birthstone lore, and much more </div>
                    </div>
                      </a> </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 bottomMarginExtraLarge topMarginExtraLarge text-center-xs smallBanner">
                  <div class="auto-margin-xs inline_block">
                    <div class="responsive-image-caption-item"> <a class="visible-lg visible-md visible-sm visible-xs" onclick="StullerTrackEvent(&quot;Banners&quot;, &quot;2016-01-04 | Corp Footer | Ever\u0026Ever&quot;, &quot;Slide4&quot;);" href="<?php echo SITE_URL; ?>everandever"> <img class="image-responsive" src="<?php echo SITE_URL; ?>stuller_libs/stud_earings/imgs_lib/Stuller(3).jpg" alt="2016-01-04 | Corp Footer | Ever&amp;Ever"> </a> <a class="visible-lg visible-md visible-sm visible-xs" onclick="StullerTrackEvent(&quot;Banners&quot;, &quot;2016-01-04 | Corp Footer | Ever\u0026Ever&quot;, &quot;Slide4&quot;);" href="<?php echo SITE_URL; ?>everandever">
                      <div class="responsive-image-caption-item-cover">
                      <div class="Archer responsive-image-caption-item-cover-title">The Future Of Bridal Jewelry</div>
                    </div>
                      <div class="responsive-image-caption-item-cover-overlay">
                      <div class="Archer responsive-image-caption-item-cover-title">The Future Of Bridal Jewelry</div>
                      <div class="responsive-image-caption-item-cover-subtitle"> A fully customizable bridal collection that will enchant your customers </div>
                    </div>
                      </a> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="clear"></div>
          <div class="visible-xs topMarginLarge row"> 
            <!--Donut#05659DDB8F0C3E1E3D14B0EEE0BA0D9C874730DCAB08B9E63364A67955A72854A67F2943FEBE991059AB39241E1F9CD4420842669E58EBD316FA990015FB5996E9AD6021FA0B44CB4DA69721EE0F76A9BA684B381C783E3A271CF839B4C5B81C7544DD5E1C2011BDDE9B2BC54693E2256E14EA0B5BC4AB0072D31A80678F69E65EFAF2229D7CDF90B5B445B815C287D05FDE963C019A653BF8FAFA0BB9C4BD42C6808749DD49C721FB7B710FE1F39444EBD3C6AC490853CDDE9AECA2990CC4A59D256B0C0CDC69D97F097FC74B54B07EA9098C30DAE6235D7EAFD26099E820836CE1C423B4BA81C82AAB8C1ACB3D2B787DECDE60CC937080551F600BCB601DD7042FC1FFB37B5EA733D52EC43150684D8EE1C0C55C887BB209FC03FD11A6A89FB82D0844585766D81C2796212E28112A3F3930ED4FCCECD9C664F0602F55900BBAB1197D4C00FCAA8EC01D800F7813EB3E7D976A25385CA57ED7B0241CCE215EC69F19F537F780009D8600EBC05557C740A812CB316FA133A7AC845B3407919DA078167E929BCF8FA6610BBCDE373DDDFC6900E93E47F6F31F5449B8283CB6AEED0B526BE14EA75EFBCD4D2EB3201B72A040C443157E5D367EE100F5360DB0F009D10D6F135DD4B997E6636D572270EF5261B620B8B470BA81B8E2B46EF3B78066592560#-->
            
            <div id="metalPrices">
              <div id="metalsFixedFooter" class="fakeTableHeaderLighter">
                <div> <span class="normal">Market prices as of <span class="bold">6/16/2016</span> </span>
                  <div id="metalBreakPoint" class="visible-xs"></div>
                  <span class="metalQualityRate goldQualityRate"> Gold <a href="http://www.kitco.com/market/" target="_blank" onclick="TrackFooter(&#39;False&#39;, &#39;False&#39;, &#39;Markets - Gold&#39;)">1310.75</a> <span class="glyphicon glyphicon-arrow-up"></span> </span> <span class="metalQualityRate platinumQualityRate"> Platinum <a href="http://www.kitco.com/market/" target="_blank" onclick="TrackFooter(&#39;False&#39;, &#39;False&#39;, &#39;Markets - Platinum&#39;)">986.00</a> <span class="glyphicon glyphicon-arrow-up"></span> </span> <span class="metalQualityRate silverQualityRate"> Silver <a href="http://www.kitco.com/market/" target="_blank" onclick="TrackFooter(&#39;False&#39;, &#39;False&#39;, &#39;Markets - Silver&#39;)">17.71</a> <span class="glyphicon glyphicon-arrow-up"></span> </span> </div>
              </div>
            </div>
            <!--EndDonut--> 
          </div>
        </div>
      </div>