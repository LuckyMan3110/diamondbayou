  <? $link = "http://www.sandor.seowebdirect.com/"?>
  
  <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/a_003.css"; ?>" >
  <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/a.css"; ?>" >
  <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/a_002.css"; ?>" >
  
  <script type="text/javascript" src="<?php echo config_item('base_url')."js/a.js"; ?>"></script>
  <script src="<?php echo config_item('base_url')."js/ga.js"; ?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo config_item('base_url')."js/a_002.js"; ?>" ></script>
    </div>

       
    <div id="everythingContainer" style="margin-left:auto;margin-right:auto;" >

    <div id="contentHeader" >
      <div id="footerPadding" class="loggedOutFooterPadding">
        <div id="pageContainer">
          <div id="containerContent">
            <div id="main">
              <div id="sideFilterContainer">
                <div id="catnav">
                  <div id="search_refining" class="search_refining">
                    <ul class="narrow">
                      <li class="top">Narrow By</li>
                      <li class="header last">
                        <div>Category</div>
                        <ul class="topFilters">
						   <?
							foreach($all_category as  $item){ 
								   $sub_cat = $this->jewelrymodel->getstullerlevel2($item['items']);
								   if($item['items']!="")
								   {
								 ?>
				           <li class="qTipMegaMenu" style=""> 
									<a aria-describedby="ui-tooltip-1" class=" sub " href="<?php echo config_item('base_url')."engagement/products/". $item['items']; ?>"  style="color:#55697F;" >
									  <span class="subText" style="text-align:left;" style="color:#55697F;"><?php echo $item['items'];?></span>
									  <span class="subArrow"></span>
                                      </a>
									 <?
									if(count($sub_cat)>0 && $sub_cat[0]['items']!=""){
										 ?>  
									<div class="categoryPopout">
									            <?
											    $i=1;
												foreach($sub_cat  as  $c_cat)
											   { 
											   if($i%2==1){
												?>
										  <ul class="catColumn">
										  <?}?>
												  <li class="firstLevelChildren hasChildren">
													    <a href="<?php echo config_item('base_url')."engagement/products/".$item['items']."/".$c_cat['items']; ?>" style="color:#000000;"><span style='color:black;'><?php echo $c_cat['items'];?></span></a>
													     <?
													     $child_cat = $this->jewelrymodel->getstullerlevel3($item['items'],$c_cat['items']);
													     if(count($child_cat)>0 && $child_cat[0]['items']!=""){
														 ?>
													      <ul class="secondLevelChildren">
															        <?
																	  foreach( $child_cat as $s_c_cat){
																	 

																	 ?>
															         <li>   <a href="<?php echo config_item('base_url')."engagement/products/".$item['items']."/".$c_cat['items']."/".$s_c_cat['items']; ?>"><?  echo $s_c_cat['items'];?></a></li>                         
														           <?}?>
														  </ul>
														 <?}?> 
												  </li>
										 <?if($i%2==0){?>	  
										 </ul>
										  <?
										  }$i++;
										  }if($i%2==0){?>
                                          </ul>
										  <?}?>										  
										  
									</div>
									<?}?>
                          </li>
						  <?
						  }//end inner if 
						  }//end first if ?>	
 	                       
                   </ul>
		
      </li>
       </ul>
</div>
</div>                                     


              <script type="text/javascript">
                    $(document).ready(function () {

                        if ($("#SearchProvider").length) {
                            if ($("#SearchProvider").val().toUpperCase() == "SOLR") {
                                $(".expandableFilterTrigger").show();
                                $(".expandableFilter").hide();
                            } else {
                                $(".expandableFilterTrigger").hide();
                                $(".expandableFilter").show();
                            }
                        }

                        $(".solrShowAll").click(function () {
                            $(this).parent(".expandableFilterTrigger").hide();

                            $(this).closest("ul").children("li.expandableFilter").each(function () {
                                if ($(this).css("display") == "none") {
                                    $(this).show();
                                } else {
                                    $(this).hide();
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
                                    viewport: $("#navContent"),
                                    adjust: { method: 'none shift' },
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
                                    }
                                }
                            });
                        });

                        $("ul.topFilters > li > a.noSub").hover(function () {
                            $(this).parent("li").toggleClass("activeCatLink");

                        });

                        $("ul.topFilters > li > .solrShowAll").hover(function () {
                            $(this).parent("li").toggleClass("activeCatLink");

                        });
                        //        console.log($("#search_refining").height());
                        //        $('.ui-tooltip-stuller-category .ui-tooltip-content').attr("style", "min-height:" + $("#search_refining").height() + "px;");

                    });

                </script>
              </div>
              <div id="navContent" class="navContent">



                <div id="content">

                  <div id="catalog">

                    <h3 style="padding: 15px 0 0 0;">
                      Jewelry

                    Product Categories</h3>

                    <table class="listlevel topMargin" style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
                      <tbody>

                        <tr>

                          <td class="first">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      New Products
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-newproducts-comp-7fff2a8a-4d11-4795-93d9-559784e9093c.jpg"; ?>" alt="New Products" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Wedding &amp; Engagement
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-bridal2-comp-0c24fe30-d1f2-4a22-8cc2-9a2c9eb29dd3.jpg"; ?>" alt="Wedding &amp; Engagement" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="last">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Contemporary Metals
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-contemporary-metals-comp-ff5ee8af-3e01-4af0-8049-58c1fcd3.jpg"; ?>" alt="Contemporary Metals" width="155" height="155">
                              </a>
                            </div>

                          </td>

                        </tr>

                        <tr>

                          <td class="first">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Rings
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-rings-a7e9f293-246f-4da7-bd62-d9067e991bbd.jpg"; ?>" alt="Rings" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Earrings
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-earrings-037f17b8-cce0-4d7a-a657-5d1752b47284.jpg"; ?>" alt="Earrings" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="last">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Necklaces &amp; Pendants
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-neckwear-305bf71f-5967-44a6-9c18-9d3b8ac62894.jpg"; ?>" alt="Necklaces &amp; Pendants" width="155" height="155">
                              </a>
                            </div>

                          </td>

                        </tr>

                        <tr>

                          <td class="first">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Chain &amp; Cord
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-chain-comp-65e41ec7-ca69-4dd2-83fa-eff3cf5d49be.jpg"; ?>" alt="Chain &amp; Cord" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Bracelets
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-bracelets-comp-58bc2054-385f-4e5e-9f63-12b2078419bc.jpg"; ?>" alt="Bracelets" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="last">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Charms &amp; Dangles
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-charms-dangles-comp-90b9b52e-a1d1-4859-8a4d-309972c6d391.jpg"; ?>" alt="Charms &amp; Dangles" width="155" height="155">
                              </a>
                            </div>

                          </td>

                        </tr>

                        <tr>

                          <td class="first">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Kera Beads
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-collections-kera-8e5d8479-0733-44ac-9154-d9a5d5232f47.jpg"; ?>" alt="Beads" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="">

                            <div class="cat-container">
                              <a href="http://www.stuller.com/browse/jewelry/brooches/">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Brooches
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-brooches-comp-2ff24128-335c-4630-a39c-15aaed8555a3.jpg"; ?>" alt="Brooches" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="last">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Family Jewelry
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-familyjewelry-comp-cdc07c28-042a-4677-b4b4-e5d2ee7626eb.jpg"; ?>" alt="Family Jewelry" width="155" height="155">
                              </a>
                            </div>

                          </td>

                        </tr>

                        <tr>

                          <td class="first">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Men's
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-mens2-comp-22261595-3ad1-42f4-b228-7f4e98488a7c.jpg"; ?>" alt="Men's" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Religious &amp; Symbolic
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-religioussymbolic-newproducts-comp-2fbb198b-3713-4aa4-8b4.jpg"; ?>" alt="Religious &amp; Symbolic" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="last">

                          </td>

                        </tr>

                      </tbody>
                    </table>
                    <h3 style="padding: 15px 0 0 0;">Shop By</h3>

                    <table class="listlevel topMargin" style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0">
                      <tbody>

                        <tr>

                          <td class="first">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Shop by Color
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/bluestones-4b5de23c-6fc7-4d51-8251-55ff107c23fe.jpg"; ?>" alt="Shop by Color" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Shop by Collection
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-collections-serena-9466f3b3-0533-45ff-b4b7-072ecab9f222.jpg"; ?>" alt="Shop by Collection" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="last">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Shop by Stone Type
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/quartz-sample-bbfe3f95-dc55-4b0b-814a-7150e23df3fb.jpg"; ?>" alt="Shop by Stone Type" width="155" height="155">
                              </a>
                            </div>

                          </td>

                        </tr>

                        <tr>

                          <td class="first">

                            <div class="cat-container">
                              <a href="javascript:void(0);">
                                <div class="cat-slant">
                                  <span class="cat-name">
                                    <span class="cat-name-text">
                                      Shop by Theme
                                    </span>
                                  </span>
                                </div>


                                <img class="cat-image-container" src="<?php echo $link."Jewelry_files/fj-popular-themes-comp-e285e89f-5665-4562-8b75-0f9868f2d61e.jpg"; ?>" alt="Shop by Theme" width="155" height="155">
                              </a>
                            </div>

                          </td>

                          <td class="">

                          </td>

                          <td class="last">

                          </td>

                        </tr>

                      </tbody>
                    </table>
                  </div>


                  <div class="cms_section content-blocks" data-content_block_id="6599">

                    <a href="javascript:void(0);"><br></a>

                    <div style="clear: both;"></div>
                  </div>
                </div>

              </div>
            </div>


            <div class="clear"></div>
          </div>
        </div>



        <div class="clear"></div>

      </div>
    </div>
    
    <style type="text/css">
      #sticky-footer {background: #332E2E no-repeat bottom center; border-top: 1px solid #5F5959;}
      #sticky-footer #sticky-bench a, #sticky-footer #sticky-stuller a {background-image: url(/static/i/benchjeweler/stuller_footer_sprites2.png);}
      #sticky-footer #sticky-chat, #sticky-footer #sticky-friends, #sticky-footer #sticky-cart, #sticky-footer #sticky-messages, #sticky-footer #sticky-settings
      {
          background-image: url(/static/i/benchjeweler/stuller_footer_sprites2.png);border-top-left-radius: 0;border-top-right-radius: 0;padding:5px 8px 6px 30px;font-weight:bold;
      }
      #sticky-footer #sticky-chat:hover, #sticky-footer #sticky-friends:hover, #sticky-footer #sticky-cart:hover, #sticky-footer #sticky-messages:hover, #sticky-footer #sticky-settings:hover {background-color: #DCD7D3; color:Black;}

      #sticky-footer ul#sticky-nav li span {color: #55697F;}
      #sticky-footer ul#sticky-nav li:hover a {color: black !important;}
      #sticky-footer #sticky-stuller a {width:91px;}
      #sticky-footer #sticky-chat{background:none repeat scroll 0 0 transparent;padding-left: 8px;}
      #sticky-footer #sticky-history {background-image: url(/static/i/benchjeweler/stuller_footer_sprites2.png) no-repeat -269px 0;}
      #sticky-footer #sticky-history-tab{background:url(/static/i/benchjeweler/stuller_footer_sprites2.png) no-repeat 2px -261px;}
      #sticky-footer #sticky-history ul li{background: url(/static/i/benchjeweler/stuller_footer_sprites2.png) no-repeat 0px -318px;}
      #pinBenchToolBar #pin a{background-image: url(/static/i/benchjeweler/stuller_footer_sprites2.png); }
    </style>

    <style media="print" type="text/css">
      #sticky-footer {display:none !important;visibility:hidden !important;}
    </style>



    <script type="text/javascript">
        $("#pin").click(function () {
            $("#sticky-footer").animate({ height: "toggle" });

            if ($("#showToolbar").val() == "False") {
                $("#pinLink").removeClass("showPin");
                $("#pinLink").addClass("showUnpin");
                $("#showToolbar").val("True");
                document.getElementById('pinLink').setAttribute('title', "Hide Bench Jeweler Toolbar");
            }
            else {
                $("#pinLink").removeClass("showUnpin");
                $("#pinLink").addClass("showPin");
                $("#showToolbar").val("False");
                document.getElementById('pinLink').setAttribute('title', "Show Bench Jeweler Toolbar");
            }

            $.ajax({
                url: "/myaccount/accountsettings/toggleshowbenchjewelertoolbar/",
                type: "POST",
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#cmsArrowContainer").click(function () {
                if ($("#cms_portal").css("display") == "none") {
                    $("#cms_portal").show();
                    $("#cmsArrow").removeClass("showCMS").addClass("hideCMS");
                    stuller.formHelper.setCookie('CMS_SHOW_POPOUT_COOKIE', true);
                } else {
                    $("#cms_portal").hide();
                    $("#cmsArrow").removeClass("hideCMS").addClass("showCMS");
                    stuller.formHelper.setCookie('CMS_SHOW_POPOUT_COOKIE', false);
                }
            });
        });
    </script>

        <div style="border:solid 1px red;position: absolute; left: 0pt; z-index: 999;" id="woInvite" name="woInvite" align="right"></div>
		<div style="width: 187px; z-index: 15002;" aria-hidden="true" aria-describedby="ui-tooltip-1-content" aria-atomic="false" aria-live="polite" role="alert" tracking="false" class="ui-tooltip qtip ui-helper-reset ui-tooltip-default ui-tooltip-stuller-category ui-tooltip-pos-bl" id="ui-tooltip-1"><div aria-atomic="true" id="ui-tooltip-1-content" class="ui-tooltip-content"><div style="display: block;" class="categoryPopout">

          <ul class="catColumn">

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Bracelets</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Brooches</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Charms</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Contemporary Metals</a>

            </li>

            <li class="firstLevelChildren hasChildren">
              <a href="javascript:void(0);">Collections</a>

              <ul class="secondLevelChildren">

                <li><a href="javascript:void(0);">Kera Collection</a></li>

                <li><a href="javascript:void(0);">Hannah by Stuller</a></li>

                <li><a href="javascript:void(0);">Layla</a></li>

                <li><a href="javascript:void(0);">Serena by Stuller</a></li>

                <li><a href="javascript:void(0);">Charming Animals</a></li>

                <li><a class="categoryShowAll" href="javascript:void(0);">Show All</a></li>

              </ul>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Earrings</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Men's</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Necklaces &amp; Pendants</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Rings</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Semi-mounts</a>

            </li>

    </ul></div></div></div>
	
	<div style="width: 187px; z-index: 15001;" aria-hidden="true" aria-describedby="ui-tooltip-3-content" aria-atomic="false" aria-live="polite" role="alert" tracking="false" class="ui-tooltip qtip ui-helper-reset ui-tooltip-default ui-tooltip-stuller-category ui-tooltip-pos-bl" id="ui-tooltip-3"><div aria-atomic="true" id="ui-tooltip-3-content" class="ui-tooltip-content"><div style="display: block;" class="categoryPopout">

          <ul class="catColumn">

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Wedding Bands                                     </a>

            </li>

            <li class="firstLevelChildren hasChildren">
              <a href="javascript:void(0);">Anniversary Rings</a>

              <ul class="secondLevelChildren">

                <li><a href="javascript:void(0);">Anniversary Bands</a></li>

                <li><a href="javascript:void(0);">Color Anniversary Bands                           </a></li>

                <li><a href="javascript:void(0);">3 Stone Anniversary                               </a></li>

              </ul>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Fancy Engagements &amp; Semi Mounts</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Solstice Solitaire Rings</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Tulipset</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Diamond Duos</a>

            </li>

            <li class="firstLevelChildren">
              <a href="javascript:void(0);">Yellow Diamond Selections</a>

            </li>

            <li class="firstLevelChildren hasChildren">
              <a href="javascript:void(0);">Bands</a>

              <ul class="secondLevelChildren">

                <li><a href="javascript:void(0);">Celtic Bands</a></li>

                <li><a href="javascript:void(0);">Duo Wedding Bands</a></li>

                <li><a href="javascript:void(0);">Etruscan Bands</a></li>

                <li><a href="javascript:void(0);">Stainless Steel Bands</a></li>

                <li><a href="javascript:void(0);">All Metal Wedding Bands</a></li>

                <li><a class="categoryShowAll" href="javascript:void(0);">Show All</a></li>

              </ul>

            </li>

            <li class="firstLevelChildren hasChildren">
              <a href="javascript:void(0);">Ring Guards, Wraps, Enhancers</a>

              <ul class="secondLevelChildren">

                <li><a href="javascript:void(0);">Ring Guards</a></li>

                <li><a href="javascript:void(0);">Solitaire Wraps &amp; Enhancers</a></li>

              </ul>

            </li>

          </ul>

</div></div>
</div>  
    <script type="text/javascript">
function getpopdetails(n){
	   $.ajax({
			type: "POST",
			url: "<?php echo config_item('base_url')."engagement/showlevels"; ?>",
			data: 	"levelname="+n,
			success: function(html){
                            alert(html); return false;
				//$("#dataHolder").html(html);
			}
		});	               
  }
</script>
</div>
      