        <? $site_link = "http://www.sandor.seowebdirect.com/"?>
<link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url').'css/a_003.css'; ?>" >
  <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url').'css/a.css'; ?>" >
  <link rel="stylesheet" type="text/css" href="<?php echo config_item('base_url').'css/a_002.css'; ?>" >
  <script type="text/javascript" src="<?php echo config_item('base_url').'js/a.js'; ?>"></script>
  <script src="<?php echo config_item('base_url').'js/ga.js'; ?>" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo config_item('base_url')."js/a_002.js"; ?>" ></script>
  <script type="text/javascript" src="<?php echo config_item('base_url')."js/t.js"; ?>" ></script>
  
  
  
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
                    });

                </script>
	            
  </div>
  
    <div id="everythingContainer">
    <div id="header">
    <div id="contentHeader">
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
									
									         <?php
										 
									 $cat_arr  =  $this->uri->segment_array();
									 $arr_length = count($cat_arr);
									 if($arr_length==3)
									   $b_link = "engagement/stullerinventory";
									 else{  
									  for($i=1;$i<$arr_length;$i++)
									       {
											$b_link = $b_link.urldecode($this->uri->segment($i))."/";
											
											}  
										}	
									 $link ="" ;
									 
									 for($i=3;$i<= $arr_length;$i++)
									       {
										   
											$con[] ='sd.Level'.($i-2).' = "'.urldecode($this->uri->segment($i)).'"';
											$link = $link.urldecode($this->uri->segment($i))."/";
											
											}
									 if(count($con)>0)
											$condition = implode(" and ",$con);	 
										$level = $i;  
							foreach($all_sub_category as  $item){ 
								   $sub_cat = $this->jewelrymodel->getstuller_sub_level($item['items'],$level-2);
								   if($item['items']!="")
								{
								 
								 ?>
				           <li class="qTipMegaMenu" style=""> 
									<a aria-describedby="ui-tooltip-1" class=" sub " href="<?php echo config_item('base_url')."engagement/products/". $link. $item['items']; ?>" style="color:#55697F;" >
									  <span class="subText" style="text-align:left;"><?php echo $item['items'];?></span>
									  <span class="subArrow"></span>
                                      </a>
									 <?
									if(count($sub_cat)>0 && $sub_cat[0]['items']!=""){
										 ?>  
									<div class="categoryPopout">
									      <ul class="catColumn">
										        <?
											    $i=1;
												foreach($sub_cat  as  $c_cat)
											   { 
												?>
												  <li class="firstLevelChildren hasChildren">
													    <a href="<?php echo config_item('base_url')."engagement/products/".$link.$item['items']."/".$c_cat['items']; ?>" ><span style='color:black;'><?php echo $c_cat['items'];?></span></a>
													     <?php
													    $child_cat = $this->jewelrymodel->getstuller_sub_level_sub($item['items'],$c_cat['items'],$level-1);
													     if(count($child_cat)>0 && $child_cat[0]['items']!=""){
														 ?>
													      <ul class="secondLevelChildren">
															        <?
																	  foreach( $child_cat as $s_c_cat){
																	  ?>
															          <li>  <a href="<?php echo config_item('base_url')."engagement/products/".$link.$item['items']."/".$c_cat['items']."/".$s_c_cat['items']; ?>"><?  echo $s_c_cat['items'];?></a></li>                         
														           <?}?>
														  </ul>
														 <?}?> 
												  </li>
											  <?}?>	  
										 </ul>
									</div>
									<?}?>
                          </li>
						  <?
						     }  //end if
						  
						  }//end first if ?>	
									
									
									
                            	   </ul>
                 </div>
                    </li>        	                       
              </ul>
			   <a  href="<?php  echo config_item('base_url').$b_link;?>">
						              <input  type="button" value="<<Back" name="">
			  </a>
		</div>
      </li>
       
</div>
</div>                                     


              </div>
              <div id="navContent" class="navContent">



                <div id="content">


                  <div class="top_content">


                    <div class="cms_section content-blocks" data-content_block_id="8396">
                      <script type="text/javascript">// <![CDATA[
                          jQuery(document).ready(function () {
                              stuller.slider.resetTimerOnHover("topPromo", 5000, true);
                          });
                          // ]]></script>
                      <div style="clear: both;"></div>
                    </div>
                  </div>


                  <div id="catalog">
				        <!--
				     	<script type="text/javascript"> var base_url = '<?php echo config_item('base_url');?>'; </script>
						 <script src="<?php echo config_item('base_url');?>js/jquery.js" type="text/javascript"></script>
						
						 <script src="<?php echo config_item('base_url')?>js/jquery.corner.js" type="text/javascript"></script>			
						 <script src="<?php echo config_item('base_url')?>js/function.js" type="text/javascript"></script> 	
				       -->
				      <script src="<?php echo config_item('base_url') ?>js/facebox.js" type="text/javascript"></script>
				  
				  

                    <h3 style="padding: 15px 0 0 0;">Jewelry Product Categories</h3>
			
					<div id="HolderBox">
<?php 					
						$i=0; 
						$returnhtml ='';
if(count($products) > 0) {	
       // print_r($products);
		foreach ($products as $row) {
				        $row['img1'] = urldecode($row['ImagePath']);
					    $image1 = $site_link  ."stuller/".trim($row["StoneMapImageFile"]);                      
					if (fopen($image1, "r")) {	
						
				        $title='';
				        if(!empty($row["Level1"])){
				        	$title= trim($row["Description"]);
				        }else{
				        	$title= trim($row["Description"]);
				        }
                        $lot = $row['ItemNumber'];
                        
                        $href= $site_link  ."engagement/detail/".$lot;
                        $image1 = $site_link  ."stuller/".trim($row["StoneMapImageFile"]);                        
        				/* if (fopen($image1, "r")) {

                		 } else {
                 			$image1 = "http://images3.wikia.nocookie.net/__cb20061129213453/muppet/images/7/7c/Noimage.png";           
			                    } */
			                    
			             $section = '';       
//img1,	ImagePath,StoneMapImageFile,Level1,	Description,ItemNumber,	RetailPrice	,PrimaryMetalComposition,Quality
	$returnhtml .= '<div style=" height: 264px; margin-left: 15px;margin-top: 30px;width: 170px;" class="floatl ringbox txtcenter" >
							<span style="color:#000000;font-size:10px;">'.$title.'<br></span><br>   ';
							
							echo $returnhtml ;
							?>
							
                               <a href="javascript:void(0)" onclick="showdetails('ff','<?php echo $lot;?>')"  >
                                                                            
							    		 <center>
								    		 <div class="ringtile">
								    		 <img style=" width:100px;height:150px;"  src="<?=$image1;?>" width="70" ><br>															
								    		 </div>
							    		 </center>
							  </a>                                   
         				<?	
						$returnhtml='<div style="color:#000000;" class="txtsmall">Retail Price: $'.number_format($row['RetailPrice'],2).'</div>
                            <div style="color:#000000;" class="txtsmall">Metal: '.$row['PrimaryMetalComposition'].'</div>						    		 
						    <div style="color:#000000;" class="txtsmall">Quality: '.$row['Quality'].'</div>';
						 	
     
	// <a  style="color:#000000;"  href="'.$href.'" class="search2">View Details</a>'
	 echo $returnhtml ;
	 $returnhtml="";
	 ?>
                <a  style="color:#000000;"  href="javascript:void(0)"   class="search2"  onclick="showdetails('ff','<?php echo $lot;?>')" >View Details</a>
	        </div>
                    <?  $i = $i + 1;
					  
					  
					  
					  
			}		  
					  
		}
                
 				//echo $returnhtml;
}							
?>					
	                    
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
    


        
