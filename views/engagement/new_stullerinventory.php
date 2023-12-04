  <? $link = "http://www.sandor.seowebdirect.com/"?>
  
  <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/a_003.css"; ?>" >
  <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/a.css"; ?>" >
  <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url')."css/a_002.css"; ?>" >

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
								   $sub_cat = $this->jewelrymodel->getstullerlevel2_new($item['items']);
								   if($item['items']!="")
								   {
								 ?>
				           <li class="qTipMegaMenu" style=""> 
									<a aria-describedby="ui-tooltip-1" class=" sub " href="<?php echo config_item('base_url')."engagement/newproducts/". $item['items']; ?>"  style="color:#55697F;" >
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
													    <a href="<?php echo config_item('base_url')."engagement/newproducts/".$item['items']."/".$c_cat['items']; ?>" style="color:#000000;"><span style='color:black;'><?php echo $c_cat['items'];?></span></a>
													     <?
													     $child_cat = $this->jewelrymodel->getstullerlevel3_new($item['items'],$c_cat['items']);
													     if(count($child_cat)>0 && $child_cat[0]['items']!=""){
														 ?>
													      <ul class="secondLevelChildren">
															        <?
																	  foreach( $child_cat as $s_c_cat){
																	 

																	 ?>
															         <li>   <a href="<?php echo config_item('base_url')."engagement/newproducts/".$item['items']."/".$c_cat['items']."/".$s_c_cat['items']; ?>"><?  echo $s_c_cat['items'];?></a></li>                         
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
                          <?php
                          $i = 1;
                          foreach($all_category as $item){
                              if(!empty($item['items'])){
                                  $img = $this->jewelrymodel->getstullerlevel1_new_img1_by_level1($item['items']);
                                if($i % 3 == 1){
                          ?>
                          <tr>
                              <td class="<?php if($i%3 == 1) echo 'first';?>">
                                  <div class="cat-container">
                                    <a href="<?php echo config_item('base_url')."engagement/newproducts/". $item['items']; ?>">
                                      <div class="cat-slant">
                                        <span class="cat-name">
                                          <span class="cat-name-text">
                                            <?php echo $item['items'];?>
                                          </span>
                                        </span>
                                      </div>


                                        <img class="cat-image-container" src="<?php echo config_item('base_url').'/stuller/'. str_replace('\\', '/',strtolower($img[0]['img'])); ?>" alt="New Products" width="155" height="155">
                                    </a>
                                  </div>
                              </td>
                          <?php
                                } elseif($i % 3 > 1){
                          ?>
                              <td class="">
                                  <div class="cat-container">
                                    <a href="<?php echo config_item('base_url')."engagement/newproducts/". $item['items']; ?>">
                                      <div class="cat-slant">
                                        <span class="cat-name">
                                          <span class="cat-name-text">
                                            <?php echo $item['items'];?>
                                          </span>
                                        </span>
                                      </div>


                                      <img class="cat-image-container" src="<?php echo config_item('base_url').'/stuller/'. str_replace('\\', '/',strtolower($img[0]['img'])); ?>" alt="New Products" width="155" height="155">
                                    </a>
                                  </div>
                              </td>
                          <?php
                                } elseif($i % 3 == 0){
                          ?>
                              <td class="<?php if($i%3 == 0) echo 'last';?>">
                                  <div class="cat-container">
                                    <a href="<?php echo config_item('base_url')."engagement/newproducts/". $item['items']; ?>">
                                      <div class="cat-slant">
                                        <span class="cat-name">
                                          <span class="cat-name-text">
                                            <?php echo $item['items'];?>
                                          </span>
                                        </span>
                                      </div>


                                      <img class="cat-image-container" src="<?php echo config_item('base_url').'/stuller/'. str_replace('\\', '/',strtolower($img[0]['img'])); ?>" alt="New Products" width="155" height="155">
                                    </a>
                                  </div>
                              </td>
                          </tr>
                          <?php    
                                }
                                $i++;
                              }
                          }
                          ?>
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
      