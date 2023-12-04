<script>
    function set_stuller_price(page_opt) {
        var s_id     = '<?php echo $stuller_id; ?>';
        var tbl_name = '<?php echo $tbl_name; ?>';
        var jewelry_quality = $('#jewelry_quality').val();
        var d_carat = $('#diamond_carat').val();
        var d_quality = $('#diamond_quality').val();
        var s_type       = $('#diamond_stone_type').val();
        var outside_dime = $('#out_side_dimension').val();
        var first_val, second_val;
        
        if( page_opt == 'wb_hoops' ) {
            first_val  = s_type;
            second_val = outside_dime;
        } else {
            first_val  = d_carat;
            second_val = d_quality;
        }

        var url_link = base_url + 'stuller_new_rings/get_stuller_price/'+s_id+'/'+tbl_name+'/'+jewelry_quality+'/'+page_opt+'/?first_option='+first_val+'&second_option='+second_val;
        
        $.ajax({
            type: "POST",
            url: url_link,
            success: function(response) {
                   
                   if( tbl_name == 'not_found' ||  response == 0 ) {
                       $("#stuller_jew_price, #specific_price, #main_price_bk").html("Please Call <?php echo CONTACT_NO; ?> to speak to a Jewelry Represenative.");
                       $('#buy_now_btn').hide();
                       
                   } else {
                        $("#stuller_jew_price, #specific_price, #main_price_bk").html(response); 
                        $('#buy_now_btn').show();
                   }
                    //alert(response);
           },
                     error: function(){alert('Error ');}
        });
    
    }
</script>

<div id="everythingContainer" class="">
    <div class="clear"></div>
  <div id="footerPadding" class="loggedOutFooterPadding">
    <div id="containerContent">
      <div id="containerContent_Inner"> 
        <script type="text/html" id="pager-template">
    <div class="floatRight pager">

        <table>
            <tr>
                <td>Page</td>
                <td class="previousPage" data-bind="if:CurrentPage() > FirstDisplayPage()">
                    <a href="javascript:return false;" class="padding" data-bind="click:function(){CurrentPage(CurrentPage()-1);}">
                        <span class="fa fa-caret-left"></span>
                    </a>
                </td>
                <td class="pagination-numbers">
                    <span data-bind="if: FirstDisplayPage() == 2"><a href="javascript:return false;" data-bind="click:function(){CurrentPage(1);}">1</a></span>
                                            
                    <span data-bind="if: FirstDisplayPage() > 2"><a href="javascript:return false;" data-bind="click:function(){CurrentPage(1);}">1</a><span>...</span></span>
                                            
                    <span data-bind="foreach:Pages">
                        <span data-bind="if:$parent.CurrentPage() == $data">
                            <span data-bind="text:$data" class="this-page"></span>
                        </span>
                        <span data-bind="ifnot:$parent.CurrentPage() == $data">
                            <a href="javascript:return false;" data-bind="text:$data, click:function(){$parent.CurrentPage($data);}"></a>
                        </span>
                    </span>
                                            
                    <span data-bind="if: LastDisplayPage() == (TotalPages() -1)"><a href="javascript:return false;" data-bind="text:TotalPages(), click:function(){CurrentPage(TotalPages());}"></a></span>
                                            
                    <span data-bind="if: LastDisplayPage() < (TotalPages() - 1)"><span>...</span><a href="javascript:return false;" data-bind="text:TotalPages(), click:function(){CurrentPage(TotalPages());}"></a></span>
                </td>
                <td class="nextPage">
                    <span data-bind="if:CurrentPage() < TotalPages()">
                        <a href="javascript:return false;" class="padding" data-bind="click:function(){CurrentPage(CurrentPage()+1);}">
                            <span class="fa fa-caret-right"></span>
                        </a>
                    </span>
                </td>
            </tr>
        </table>
    </div>
</script> 
        
        <ul id="viewingbar">
          <li class="top"> <a href="<?php echo SITE_URL; ?>">Home</a> </li>
          <li><a href="#"> Jewelry</a></li>
          <li class="lastNaviItem"><a href="<?php echo SITE_URL.'stuller_new_rings/'.$stuller_link; ?>"> <?php echo $stuller_list['title']; ?></a></li>
<!--          <li class="lastNaviItem"> Accented Band </li>-->
        </ul>
        <div id="productModelBindingKey">
          <div id="productDetailsPageContainer" data-bind="template: { name: &#39;product-details-page-template&#39;, afterRender:ProductDetails().PageLoadPostProcessing }">
            <div id="product-details-view-model" data-bind="with:ProductDetails()">
              <div class="modal fade confirmationModal" role="dialog" tab-index="-1" aria-hidden="true" aria-labelledby="confirmationModalLabel" data-bind="with:ConfigurationViewModel.ConfirmationModal">
                <div class="modal-dialog">
                  <div id="confirmationModalTemplate" class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">\D7</span></button>
                      <h3 class="modal-title" data-bind="html:Title()"></h3>
                    </div>
                    <div class="modal-body containerFix">
                      <div class="col-sm-4 col-xs-12 bottomMarginLarge-xs text-center"> 
                        <!-- ko if: SupplementalList().length > 0 --><!-- /ko --> 
                        <!-- ko if: SupplementalList().length <= 0 -->
                        <!-- /ko --> 
                      </div>
                      <div class="col-sm-8">
                        <h4 class="text-center-xs" data-bind="text: Body()"></h4>
                        
                        <!-- ko if: SupplementalList().length > 0 --><!-- /ko --> 
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div>Do you still want to continue?</div>
                      <div class="floatRight"> <span class="floatLeft rightMargin10" data-dismiss="modal" data-bind="click: ConfirmFunction"> <span class="StullerButton primary largeButton">
                        <button type="button" value="Yes"><span>Yes</span></button>
                        </span> </span> <span class="floatLeft" data-dismiss="modal" data-bind="click:RejectFunction"> <span class="StullerButton secondary largeButton">
                        <button type="button" value="No"><span>No</span></button>
                        </span> </span> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="wholeContainer"> 
                
                <!-- ko if:$root.ProductDetails().StoneForViewAvailableMountingsViewModel() != null --><!-- /ko -->
                <div class="detailsTopContainer">
                  <h1 class="productDescription"> 
                    <!-- ko if: $root.ProductDetails().SkuTitleReplacementAssociatedContent() != null --><!-- /ko --> 
                    <!-- ko if: $root.ProductDetails().SkuTitleReplacementAssociatedContent() == null --> 
                    <span data-bind="html: Title()"><?php echo $results['title']; ?></span> 
                    <!-- /ko --> 
                    
                  </h1>
                  
                  <!-- ko if: ThreeCBuilderUrl() != null --><!-- /ko -->
                  
                  <div>
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                      <div class="row verticalPadding"> 
                        <!-- ko if:Product.EmphasizeSeriesNumber() --><!-- /ko -->
                        <div id="itemNum" class="clearLeft pull-left no-float-xs"> Item #: <span id="itemSegment" data-bind="text:Product.ItemNumber()"><?php echo $item_number; ?></span> </div>
                        <div id="socialMedia" class="no-float-xs display-block-xs no-margin-xs text-center-xs pull-left leftMarginLarge" data-bind="html: $root.ProductDetails().SocialMediaPartial()"> <span class="socialMediaButtons"> <a title="Facebook" href="<?php echo SITE_URL; ?>products/123159/?groupId=194603&amp;categoryId=21169#" onclick="window.open(&#39;https://www.facebook.com/sharer/sharer.php?u=http%3a%2f%2fwww.stuller.com%2fproducts%2f123159%2f%3fgroupId%3d194603%26categoryId%3d21169&#39;, &#39;newwindow&#39;, &#39;width=500, height=300&#39;); return false;"> <span class="fa-stack"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-facebook fa-stack-1x fa-inverse"></i> </span> </a> <a title="Twitter" href="<?php echo SITE_URL; ?>products/123159/?groupId=194603&amp;categoryId=21169#" onclick="window.open(&#39;https://twitter.com/home?status=http%3a%2f%2fwww.stuller.com%2fproducts%2f123159%2f%3fgroupId%3d194603%26categoryId%3d21169&#39;, &#39;newwindow&#39;, &#39;width=500, height=300&#39;); return false;"> <span class="fa-stack"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-twitter fa-stack-1x fa-inverse"></i> </span> </a> <a href="javascript:pinIt();"> <span class="fa-stack"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-pinterest-p fa-stack-1x fa-inverse"></i> </span> </a> <a title="Google+" onclick="window.open(&#39;https://plus.google.com/share?url=http%3a%2f%2fwww.stuller.com%2fproducts%2f123159%2f%3fgroupId%3d194603%26categoryId%3d21169&#39;, &#39;newwindow&#39;, &#39;width=500, height=300&#39;); return false;"> <span class="fa-stack"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i> </span> </a> <a title="Email" id="productSharePopup" href="<?php echo SITE_URL; ?>products/123159/?groupId=194603&amp;categoryId=21169#" data-toggle="modal" data-target="#productShareForm"> <span class="fa-stack"> <i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </a> </span> </div>
                      </div>
                    </div>
                    <div class="clear"></div>
                    <div id="productShareForm" class="modal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">\D7</span></button>
                            <h3 class="modal-title">Product Share</h3>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal" data-bind="submit: ProductEmailPostViewModel.ShareThisProduct, attr: { id: &#39;productShareForm_&#39; + ProductEmailPostViewModel.ItemId() }" id="productShareForm_12617388">
                              <div class="form-group">
                                <div class="clear col-sm-9 col-sm-offset-3 text-center-xs"> <img src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/Stuller" width="150" alt="Stuller" class="img-responsive auto-margin-xs" data-bind="attr: { src: ProductEmailPostViewModel.ItemImage() }" nopin="true">
                                  <div class="italic lightFont topMargin">Preview Image</div>
                                </div>
                              </div>
                              <div class="form-group clear">
                                <label class="control-label col-sm-3">Sender's Name <span class="important">*</span></label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="ProductEmailPostViewModel_SenderName" name="ProductEmailPostViewModel.SenderName" data-bind="value: ProductEmailPostViewModel.SenderName, valueUpdate: &#39;afterkeydown&#39;">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3">Sender's Email <span class="important">*</span></label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="<?php echo SITE_EMAIL; ?>" id="ProductEmailPostViewModel_SenderEmail" name="ProductEmailPostViewModel.SenderEmail" data-bind="value: ProductEmailPostViewModel.SenderEmail, valueUpdate: &#39;afterkeydown&#39;">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3">Recipient's Name <span class="important">*</span></label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="ProductEmailPostViewModel_RecipientName" name="ProductEmailPostViewModel.RecipientName" data-bind="value: ProductEmailPostViewModel.RecipientName, valueUpdate: &#39;afterkeydown&#39;">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3">Recipient's Email <span class="important">*</span></label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="<?php echo SITE_EMAIL; ?>" id="ProductEmailPostViewModel_RecipientEmail" name="ProductEmailPostViewModel.RecipientEmail" data-bind="value: ProductEmailPostViewModel.RecipientEmail, valueUpdate: &#39;afterkeydown&#39;">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3">Message</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control" cols="20" id="ProductEmailPostViewModel_Message" name="ProductEmailPostViewModel.Message" rows="2"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3"> <span class="StullerButton primary largeButton">
                                  <button type="submit" value="Send"><span>Send</span></button>
                                  </span> </div>
                              </div>
                              <input type="hidden" id="ProductEmailPostViewModel_ItemId" name="ProductEmailPostViewModel.ItemId" data-bind="attr: { value: ProductEmailPostViewModel.ItemId() }" value="12617388">
                              <input type="hidden" id="ProductEmailPostViewModel_GroupId" name="ProductEmailPostViewModel.GroupId" data-bind="attr: { value: ProductEmailPostViewModel.GroupId() }" value="194603">
                              <input type="hidden" id="ProductEmailPostViewModel_ItemTitle" name="ProductEmailPostViewModel.ItemTitle" data-bind="attr: { value: ProductEmailPostViewModel.ItemTitle() }" value="14kt White .02 CTW Diamond Matching Band">
                              <input type="hidden" id="ProductEmailPostViewModel_ItemImage" name="ProductEmailPostViewModel.ItemImage" data-bind="attr: { value: ProductEmailPostViewModel.ItemImage() }" value="//stuller.scene7.com/is/image/Stuller?layer=0&amp;src=ir(StullerRender/2a19bf52-cbdb-4329-aa66-a5ef01126b2e?obj=stones/g_Accent/diamonds/fullcut&amp;show&amp;obj=metals&amp;show&amp;obj=metals&amp;show&amp;color=bfbab8&amp;rs=c..218.188.-37..e.250..255.-68..w...59...u8..116.......v8..153.130......&amp;hei=640&amp;wid=640&amp;fmt=jpeg)&amp;$350$">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="visible-xs text-right newPrice medium topPrice-xs" id="product_page_add_to_cart_price_only" data-bind="html: $root.ProductDetails().PriceOnlyPartial()">
                      <div class="lblPrice noMargin " data-classes="ui-tooltip-stuller-white" data-contentelement=".studioInfo" data-myposition="right center" data-atposition="left center" data-contentrelationship="child">
                        <div class="largePrice mainPrice "> &nbsp; </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="productSlide">
                          <img src="<?php echo $product_image; ?>" alt="<?php echo $results['title']; ?>" width="300" height="300" />
                      </div>
                        <div class="clear"></div><br><br>
                        <div class="set_short_note">(We sell rings in all colors but Image on website is only available in White Gold,Pladium and Platinum)</div>
                    </div>
                    <div class="col-sm-5">
                      <div class="leftLightestBorder"> 
                        
                        <!-- ko if:Product.CanShowStullerTestedBadge() || Product.CanShowStullerExclusiveBadge() --><!-- /ko --> 
                        
                        <!-- ko if: GroupTemplateName() == 'Tools' --><!-- /ko --> 
                        <!-- ko if: Options != null -->
                        <div class="optionButtonsContainer"> 
                          <!-- ko foreach: Options -->
                          <div class="option chooseOption" data-bind="visible: !((SelectedOptionText() == null || SelectedOptionText() == &#39;N/A&#39; || SelectedOptionText() == &#39;&#39;) &amp;&amp; !CanChange()), attr: { id: typeof CatalogKeyField != &#39;undefined&#39; &amp;&amp; CatalogKeyField != null ? CatalogKeyField : DisplayName }, addCssClass:CustomDisplayUI(), css:{&#39;bgColorLightest customizeOption&#39;: IsCustomizationOption(), &#39;chooseOption&#39;:!IsCustomizationOption(), &#39;topBorderLight topMargin10&#39;:$root.ProductDetails().IsOptionFirstCustomizationOption($data)}" id="Element2"> 
                            <!-- ko if:$root.ProductDetails().IsOptionFirstCustomizationOption($data) --><!-- /ko -->
                            <div class="optionLabel containerFix"> <span class="floatLeft bold" data-bind="text:DisplayName()">Jewelry State</span> 
                              <!-- ko if:IsRequired() --><!-- /ko --> 
                              <!-- ko if:SelectedOptionText() != null --> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText hideForSterling" data-bind="text:SelectedOptionText(), css:{hideForSterling:CanChange()}">Set</span> 
                              <!-- /ko --> 
                              <!-- ko if:QtipContent().text != null --><!-- /ko --> 
                            </div>
                            <!-- ko if: CanChange() -->
                            
                            <div class="clear optionSelector"> 
                              <!-- ko if: CustomDisplayUI() != null --><!-- /ko --> 
                              <!-- ko if:CustomDisplayUI() == null -->
                              <select class="optionDropdown form-control" data-bind="options:Choices, optionsText:&#39;Text&#39;, optionsValue:&#39;Value&#39;, value:SelectedChoiceForDropDown,
                                                    event: {
                                                        change: function () {
                                                            $root.Post(CatalogKeyFieldNumber(), SelectedChoiceForDropDown());
                                                        }
                                                    }">
                                <option value="Set">Set</option>
                              </select>
                              <!-- /ko --> 
                            </div>
                            
                            <!-- /ko --> 
                          </div>
                          <div class="option Quality chooseOption" id="Element3"> 
                            <!-- ko if:$root.ProductDetails().IsOptionFirstCustomizationOption($data) --><!-- /ko -->
                            <div class="optionLabel containerFix"> <span class="floatLeft bold">Quality</span> 
                              <!-- ko if:IsRequired() --><!-- /ko --> 
                              <!-- ko if:SelectedOptionText() != null --> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText hideForSterling">
                                  <?php echo $results['quality']; ?></span> 
                              <!-- /ko --> 
                              <!-- ko if:QtipContent().text != null --><!-- /ko --> 
                            </div>
                            <!-- ko if: CanChange() -->
                            
                            <div class="clear optionSelector"> 
                              <!-- ko if: CustomDisplayUI() != null -->
                              <div data-bind="template:{ name: CustomDisplayUI(), data: $data }">
                                <div> 
                                  <!-- ko with: $root.ProductDetails().ProductCustomizationViewModel().QualityDialogViewModel -->
                                  <input type="hidden" id="selectedMetalCoin" value="white">
                                  <div class="select2-container select2-container-active" id="s2id_QualityDropDown">
                                      <select class="optionDropdown form-control" id="jewelry_quality" onchange="set_stuller_price('<?php echo $page_options; ?>')">
                                        <?php echo $quality_option; ?>
                                    </select>
                                  </div>                                  
                                  <!-- /ko --> 
                                </div>
                              </div>
                              <!-- /ko --> 
                              <!-- ko if:CustomDisplayUI() == null --><!-- /ko --> 
                            </div>
                            
                            <!-- /ko --> 
                          </div>
                          <?php if( $page_options === 'wb_hoops' ) { ?>
                          <div class="option Quality chooseOption"> 
                            <div class="optionLabel containerFix set_bottom_margin"> <span class="floatLeft bold">Stone Type</span> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText hideForSterling">
                                  <?php echo $results['stone_type']; ?></span> 
                            </div>
                            
                            <div class="clear optionSelector"> 
                              <div>
                                <div>
                                  <input type="hidden" id="selectedMetalCoin" value="white">
                                  <div class="select2-container select2-container-active set_full_width" id="s2id_QualityDropDown">
                                      <select class="optionDropdown form-control" id="diamond_stone_type" onchange="set_stuller_price('<?php echo $page_options; ?>')">
                                        <?php echo $stone_type; ?>
                                    </select>
                                  </div>  
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="option Quality chooseOption"> 
                            <div class="optionLabel containerFix"> <span class="floatLeft bold">Diamond Color</span> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText hideForSterling">
                                  White</span> 
                            </div>
                          </div>
                          <div class="option Quality chooseOption"> 
                            <div class="optionLabel containerFix"> <span class="floatLeft bold">Outside Dimension</span> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText hideForSterling">
                                  <?php echo $results['outside_dimension']; ?></span> 
                            </div>
                            
                            <div class="clear optionSelector"> 
                              <div>
                                <div>
                                  <input type="hidden" id="selectedMetalCoin" value="white">
                                  <div class="select2-container select2-container-active set_full_width" id="s2id_QualityDropDown">
                                      <select class="optionDropdown form-control" id="out_side_dimension" onchange="set_stuller_price('<?php echo $page_options; ?>')">
                                        <?php echo $outside_dimension; ?>
                                    </select>
                                  </div>  
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php } 
                          if( $page_options === 'wb_studs' ) { ?>
                          <div class="option Quality chooseOption"> 
                            <div class="optionLabel containerFix"> <span class="floatLeft bold">Diamond Carat Weight</span> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText hideForSterling">
                                  <?php echo $results['diamond_carat_weight']; ?></span> 
                            </div>
                            
                            <div class="clear optionSelector"> 
                              <div>
                                <div>
                                  <input type="hidden" id="selectedMetalCoin" value="white">
                                  <div class="select2-container select2-container-active set_full_width" id="s2id_QualityDropDown">
                                      <select class="optionDropdown form-control" id="diamond_carat" onchange="set_stuller_price('<?php echo $page_options; ?>')">
                                        <?php echo $diamond_carat_wt; ?>
                                    </select>
                                  </div>  
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="option Quality chooseOption"> 
                            <div class="optionLabel containerFix"> <span class="floatLeft bold">Diamond Quality</span> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText hideForSterling">
                                  <?php echo $results['diamond_quality']; ?></span> 
                            </div>
                            
                            <div class="clear optionSelector"> 
                              <div>
                                <div>
                                  <input type="hidden" id="selectedMetalCoin" value="white">
                                  <div class="select2-container select2-container-active set_full_width" id="s2id_QualityDropDown">
                                      <select class="optionDropdown form-control" id="diamond_quality" onchange="set_stuller_price('<?php echo $page_options; ?>')">
                                        <?php echo $diamond_quality_opt; ?>
                                    </select>
                                  </div>  
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                          <div class="option chooseOption" id="Element4"> 
                            <!-- ko if:$root.ProductDetails().IsOptionFirstCustomizationOption($data) --><!-- /ko -->
                            <div class="optionLabel containerFix"> <span class="floatLeft bold" data-bind="text:DisplayName()">Finished State</span> 
                              <!-- ko if:IsRequired() --><!-- /ko --> 
                              <!-- ko if:SelectedOptionText() != null --> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText" data-bind="text:SelectedOptionText(), css:{hideForSterling:CanChange()}">Polished</span> 
                              <!-- /ko --> 
                              <!-- ko if:QtipContent().text != null --><!-- /ko --> 
                            </div>
                          </div>
                          <div class="option chooseOption" id="Element5"> 
                            <div class="optionLabel containerFix"> <span class="floatLeft bold" data-bind="text:DisplayName()">Description</span> 
                              <!-- ko if:IsRequired() --><!-- /ko --> 
                              <!-- ko if:SelectedOptionText() != null --> 
                              <span class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText" data-bind="text:SelectedOptionText(), css:{hideForSterling:CanChange()}"><?php echo $results['quality'].' '.$results['name']; ?></span> 
                              <!-- /ko --> 
                              <!-- ko if:QtipContent().text != null --><!-- /ko --> 
                            </div>
                            <div class="clear"></div><br>
                            <div class="optionLabel containerFix"> <span class="floatLeft bold">Price</span> 
                                <span id="stuller_jew_price" class="leftMarginLarge smallFont darkWarmGreyFont floatRight selectedOptionText">
                                  $<?php echo _nf($band_price, 2); ?>
                              </span> 
                            </div>
                            <!-- ko if: CanChange() --><!-- /ko --> 
                          </div>
                          <div class="option Exact_Ring_Sizing bgColorLightest customizeOption topBorderLight topMargin10" data-bind="visible: !((SelectedOptionText() == null || SelectedOptionText() == &#39;N/A&#39; || SelectedOptionText() == &#39;&#39;) &amp;&amp; !CanChange()), attr: { id: typeof CatalogKeyField != &#39;undefined&#39; &amp;&amp; CatalogKeyField != null ? CatalogKeyField : DisplayName }, addCssClass:CustomDisplayUI(), css:{&#39;bgColorLightest customizeOption&#39;: IsCustomizationOption(), &#39;chooseOption&#39;:!IsCustomizationOption(), &#39;topBorderLight topMargin10&#39;:$root.ProductDetails().IsOptionFirstCustomizationOption($data)}"> 
                            <!-- ko if:$root.ProductDetails().IsOptionFirstCustomizationOption($data) -->
                            <h2 class="bold bottomPaddingLarge topPadding10 bottomMargin">Customization Options</h2>
                            <!-- /ko -->
                            
                            <?php echo $finger_size; ?>
                          </div>
                          <!-- /ko --> 
                          
                        </div>
                        <!-- /ko --> 
                      </div>
                      <div data-bind="html: $root.ProductDetails().UnderDropDownsAssociatedContent()"></div>
                      <div class="clear"></div>
                    </div>
                    <div class="col-sm-3">
                      <div class="topMarginExtraLarge-xs addToCartSlide">
                        <div class="addToCartControl">
                          <div id="product_page_add_to_cart" data-bind="html:$root.ProductDetails().AddToCartPartial()">
                            
                            <div id="addPanel" class="addPanel_12617388  addPanel">
                              <input id="currentUserIsToolsOnly" name="currentUserIsToolsOnly" type="hidden" value="True">
                              <input id="QuantityOnHand" name="QuantityOnHand" type="hidden" value="0">
                              <input id="disableAddToCart" name="disableAddToCart" type="hidden" value="True">
                              <div class="addPanel_12617388">
                              <div id="price_availability" class="price_availability ">
                                  <div class="clear"></div>
                                  <div class="col-sm-12 statusMsgAndShipDateContainer">
                                    <div id="substituteProductsPlaceholderFor12617388" class="substituteProductsPlaceholder"> </div>
                                    
                                    <?php
                                        if($item_number){
                                            $item_number_show = $item_number;
                                        }else{
                                            $item_number_show = $results['title'];
                                        }
                                    
                                    ?>
                                    
                                    <div class="clear"></div><br>
            <form id="form1" name="form1" method="post" action="">
                <input type="hidden" name="price" value="<?php echo $band_price; ?>" />
                <input type="hidden" name="txt_rstyle" id="txt_rstyle" value="<?php echo $results['style']; ?>" />
                <input type="hidden" name="main_price" value="<?php echo $band_price; ?>" />
                <input type="hidden" name="vender" value="<?php echo $page_options; ?>" />
                <input type="hidden" name="url" value="<?php echo $image_src; ?>" />
                <input type="hidden" name="prodname" value="<?php echo $results['title']; ?>" />
                <input type="hidden" name="diamnd_count" value="" />
                <input type="hidden" name="ring_shape" value="" />
                <input type="hidden" name="ring_carat" value="" />
                <input type="hidden" name="prid" value="<?php echo $results['id']; ?>" />
                <input type="hidden" name="stock_number" value="<?php echo $item_number_show; ?>" />
                <input type="hidden" name="txt_ringtype" value="" />
                <input type="hidden" name="txt_ringsize" value="<?php echo $ring_size; ?>" />
                <input type="hidden" name="txt_metal" value="" />
                
                <input type="hidden" name="vendors_name" value="Stuller" />
                <input type="hidden" name="vendor_number" value="800-877-7777" />
                <input type="hidden" name="table_name" value="dev_stuller" />
                <input type="hidden" name="item_title" value="<?php echo $results['title']; ?>" />
                <input type="hidden" name="item_url" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
                <input type="hidden" name="product_type" value="Stuller" />
                
                
                <input type="hidden" name="txt_addoption" value="<?php echo $page_options; ?>" />
                <input type="hidden" name="txt_qty" value="1" />
            </form>
                                    <div id="priceBlock" class="price_block">Price: <span id="main_price_bk">$ <?php echo _nf($band_price, 2); ?></span></div>
                                    <div id="buy_now_btn"><a href="#javascript" onclick="addToCartSubmitForm('<?php echo SITE_URL; ?>jewelleries/addtoshoppingcart/')" id="addtoshopping"><img src="<?php echo SITE_URL; ?>images/buy-now.jpg" alt="buy-now"></a><br></div>
                                    <div class="clear"></div><br>
                                    <div class="set_note_text"><?php echo ORDER_DELIVERY_LABEL; ?></div><br>
                                    <div class="see_available_price">PLEASE SCROLL DOWN TO SEE AVAILABLE PRICE OPTIONS FOR THIS PRODUCT.</div><br>
                                    <div class="clear"></div><br>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="hidden">
                                <div id="loggedInAddPanel">
                                  <div id="addToCartContainer" class="">
                                    <form id="addtocart_form_12617388" method="post">
                                      <input id="CartItemViewModel_ID" name="CartItemViewModel.ID" type="hidden" value="12617388">
                                      <input id="CartItemViewModel_ItemName" name="CartItemViewModel.ItemName" type="hidden" value="<?php echo $item_number; ?>">
                                      <input id="CartItemViewModel_Source" name="CartItemViewModel.Source" type="hidden" value="">
                                      <input id="CartItemViewModel_SourceType" name="CartItemViewModel.SourceType" type="hidden" value="">
                                      <input id="CartItemViewModel_RelatedId" name="CartItemViewModel.RelatedId" type="hidden" value="">
                                      <input id="CartItemViewModel_PromotionItemId" name="CartItemViewModel.PromotionItemId" type="hidden" value="">
                                      <input id="CartItemViewModel_ShowOutOfStockMessage" name="CartItemViewModel.ShowOutOfStockMessage" type="hidden" value="False">
                                      <input id="CartItemViewModel_ShowPostAddToCartFlyout" name="CartItemViewModel.ShowPostAddToCartFlyout" type="hidden" value="False">
                                      <input id="CartItemViewModel_ShowPostAddToCartSerializedFlyout" name="CartItemViewModel.ShowPostAddToCartSerializedFlyout" type="hidden" value="False">
                                      <input id="CartItemViewModel_IgnoreWebEnabledFlag" name="CartItemViewModel.IgnoreWebEnabledFlag" type="hidden" value="False">
                                      <div class="quantityContainer form-group col-xs-12 topMarginLarge">
                                        <div class="">
                                          <label for="CartItemViewModel_Quantity">Quantity:</label>
                                          <input class="input-sm" id="CartItemViewModel_Quantity" maxlength="5" name="CartItemViewModel.Quantity" type="text" value="1">
                                          Each <img id="ajax_quantity_error" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/fail.png" alt="Error!" class="hide" nopin="true">
                                          <div class="currentQtyInCartContainer_12617388" class="hide_block">
                                            <label for="CartItemViewModel.Quantity" class="currentQtyInCart_12617388">Quantity in Cart:</label>
                                            <span>0</span> </div>
                                        </div>
                                      </div>
                                      <div class="col-xs-12 form-group specialInstructions">
                                        <label for="CartItemViewModel.SpecialInstructions" class="form-label">Special Instructions:</label>
                                        &nbsp;<span class="whatsthis hidden-inline-xs" onclick="StullerTrackEvent(&#39;CTA&#39;, &#39;WhatsThis(Products)&#39;, &#39;/pages/51573/?useMaster=False&#39;);$(this).colorbox({ title: &#39;What\&#39;s this?&#39;, href: &#39;/pages/51573/?useMaster=False&#39;, width: &#39;800&#39;, height: &#39;400&#39; });"><span class="glyphicon glyphicon-question-sign largeFont"></span></span>
                                        <div>
                                          <textarea class="form-control specialInstructionsText watermarkImportant" cols="1" id="CartItemViewModel_SpecialInstructions" name="CartItemViewModel.SpecialInstructions" onkeypress="return stuller.formHelper.textLimit(this,250);" rows="1"></textarea>
                                        </div>
                                      </div>
                                      <div class="col-xs-12 form-group customerNotes">
                                        <label for="CartItemViewModel.CustomerNotes" class="form-label">Customer Notes:</label>
                                        &nbsp;<span class="whatsthis hidden-inline-xs" onclick="StullerTrackEvent(&#39;CTA&#39;, &#39;WhatsThis(Products)&#39;, &#39;/pages/51572/?useMaster=False&#39;);$(this).colorbox({ title: &#39;What\&#39;s this?&#39;, href: &#39;/pages/51572/?useMaster=False&#39;, width: &#39;800&#39;, height: &#39;400&#39; });"><span class="glyphicon glyphicon-question-sign largeFont"></span></span>
                                        <div>
                                          <textarea class="form-control customerNotesText watermarkImportant" cols="1" id="CartItemViewModel_CustomerNotes" name="CartItemViewModel.CustomerNotes" onkeypress="return stuller.formHelper.textLimit(this,250);" rows="1"></textarea>
                                        </div>
                                      </div>
                                      <span id="general_error_info"> </span>
                                      <div id="addBlock" class="col-xs-12"> <img id="ajax_add_indicator" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/circle_small.gif" alt="Loading, please wait..." nopin="true"> <img id="" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/success.png" alt="Successful!" class="hide" nopin="true"> <span id="ajax_add_successful" class="glyphicon glyphicon-ok"></span> <img id="" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/fail.png" alt="Error!" class="hide" nopin="true"> <span id="ajax_add_error" class="glyphicon glyphicon-ban-circle"></span>
                                        <div class="ajax_add_success">Add Successful!</div>
                                        <br class="clear">
                                      </div>
                                    </form>
                                  </div>
                                  <div id="disabledAddToCartContainer" class="hidden">
                                    <div class="smallBlueBorder mustConfigureContent">
                                      <div class="leftMarginLarge rightMarginLarge center bold"> <span class="blue-ui-icon-set ui-icon ui-icon-alert floatLeft"></span> This item must be customized. </div>
                                    </div>
                                    <div>
                                      <div class="fakeDisabledAddToCartButton">Add to Cart</div>
                                    </div>
                                  </div>
                                  <div class="clear pricingSummarySection">
                                    <div class="baseItemPriceSummary col-sm-6 topMargin10 containerFix">
                                      <div class="priceSummary config-price-break-down questionContainer smallLightestBorder noPadding">
                                        <div class="questionHeader noMargin center">Setting</div>
                                        <table class="noMargin bottomBorderNone warmGreyFont" cellspacing="0">
                                          <tbody>
                                            <tr class="border">
                                              <td>Series</td>
                                              <td class="textRight bold">123159</td>
                                            </tr>
                                            <tr class="border">
                                              <td>Jewelry State</td>
                                              <td class="textRight bold">Set</td>
                                            </tr>
                                            <tr class="border">
                                              <td>Quality</td>
                                              <td class="textRight bold">14kt White</td>
                                            </tr>
                                            <tr class="border">
                                              <td>Finished State</td>
                                              <td class="textRight bold">Polished</td>
                                            </tr>
                                            <tr class="border">
                                              <td>Description</td>
                                              <td class="textRight bold">.02 CTW Diamond Matching Band</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div id="trademarks" class="clear smallFont trademarks"> </div>
                            </div>
                            <div class="modal fade" id="addToFavoritesModal_12617388" tabindex="-1" role="dialog" aria-labelledby="addToFavoritesModal_12617388-title" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content text-left">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">\D7</span></button>
                                    <h2 class="modal-title" id="addToFavoritesModal_12617388-title">Add to Favorites</h2>
                                  </div>
                                  <div class="modal-body" id="addToFavoritesModal_12617388-body"> </div>
                                  <div class="modal-footer"> </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div data-bind="html: $root.ProductDetails().UnderAddToCartAssociatedContent()"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="clear"></div>
                <div class="tabsContainer" data-bind="with:TabsViewModel">
                  <div>
                    <h3 class="set_prod_heading">Product Details</h3>
                  </div>
                  <div data-bind="html: Specifications">
                    <div class="topMarginExtraLarge">
                      <h3 class="details-header">Specifications</h3>
                      <table class="lightGreyBackground table simple withAltRows specsTable">
                        <tbody>
                            <?php echo $product_spec; ?>
                          <tr>
                            <td class="bold">Price:</td>
                            <td id="specific_price">$ <?php echo _nf($band_price, 2); ?></td>
                          </tr>
                          <?php
                          $spec_view = '';
                            if( !empty($results['quality']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Quality:</td>
                                                <td>'.$results['quality'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['diamond_carat_weight']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Diamond Carat:</td>
                                                <td>'.$results['diamond_carat_weight'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['diamond_quality']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Diamond Quality:</td>
                                                <td>'.$results['diamond_quality'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['diamond_ctw']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Diamond CTW:</td>
                                                <td>'.$results['diamond_ctw'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['diamond_clarity']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Diamond Clarity:</td>
                                                <td>'.$results['diamond_clarity'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['jewelry_state']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Jewelry State:</td>
                                                <td>'.$results['jewelry_state'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['diamond_color']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Diamond Color:</td>
                                                <td>'.$results['diamond_color'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['stone_type']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Stone Type:</td>
                                                <td>'.$results['stone_type'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['stone_size']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Stone Size:</td>
                                                <td>'.$results['stone_size'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['sold_by']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Sold By:</td>
                                                <td>'.$results['sold_by'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['post_type']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Post Type:</td>
                                                <td>'.$results['post_type'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['finish_state']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Finish State:</td>
                                                <td>'.$results['finish_state'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['gemstone_quality']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Gemstone Quality:</td>
                                                <td>'.$results['gemstone_quality'].'</td>
                                            </tr>';
                            }
                            if( !empty($results['item_number']) ) {
                              $spec_view .= '<tr>
                                                <td class="bold">Item Number:</td>
                                                <td>'.$results['item_number'].'</td>
                                            </tr>';
                            }
                            
                            echo $spec_view;
                            
                          ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- ko if: CmsSection() --><!-- /ko -->
                  <div data-bind="html: AdditionalDetails">
                    <style type="text/css">
    .displayLabel{
        width: 75px;
    }
</style>
                    <div class="topMarginLarge">
                      <h3 class="details-header">Details</h3>
<!--                      <div id="groupDescription" class="clear padding lightGreyBackground veryDarkWarmGreyFont"> <br _mce_bogus="1">
                        <div class="clear"></div>
                      </div>-->
                      <div id="details" class="clear padding lightGreyBackground veryDarkWarmGreyFont">
                          <?php echo $product_details; ?>
                          <br>
                        <div><?php echo $results['details']; ?></div>
                        <div class="clear"></div><br>
                      </div>
                    </div>
<?php if( !empty($comes_qunatity) && $check_page[0] != 'Page Numbers' ) { ?>
                    <div class="topMarginLarge">
                      <h3 class="details-header">Comes Set With</h3>
                      <div class="table-responsive">
                        <table class="lightGreyBackground table simple withAltRows">
                          <thead>
                            <tr>
                              <th>Quantity</th>
                              <th>Stone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $comes_qunatity; ?></td>
                              <td><?php echo $comes_stone; ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="clear"></div>
                      </div>
                    </div>
<?php } 
if( !empty($page_numbers) && $check_page[0] == 'Page Numbers' ) { ?>
<div data-bind="html: Publications">
  <div class="topMarginLarge">
    <h3 class="details-header">Publications</h3>
    <div class="responsiveTable">
      <table class="lightGreyBackground table simple withAltRows">
        <thead>
          <tr>
            <th>Catalog</th>
            <th>Edition</th>
            <th>Page Numbers</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-title="Catalog"><?php echo $comes_qunatity; ?></td>
            <td data-title="Edition"><?php echo $comes_stone; ?></td>
            <td data-title="Page Numbers"><?php echo $page_numbers; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php } ?>
                  </div>
                  <div data-bind="html: Publications"></div>
                </div>
                <div class="clear"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
      <div class="scrollToTop show_block"><span class="fa fa-chevron-up"></span> <span>TOP</span></div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(9).js"></script> 
<script type="text/javascript" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/saved_resource(10).js"></script> 
<script type="text/javascript" src="<?php echo SITE_URL; ?>stuller_libs/weddingband_diamond/js/full.js"></script> 
<script type="text/javascript">
        var rawViewModel = <?php echo $finalList; ?>;
        var rootViewModel = new GameChangerDetailsViewModel(rawViewModel);
        var configurationViewModel = rootViewModel.ProductDetails().ConfigurationViewModel;
        
        var catalogValues = [
  {
    "key": "Element1",
    "value": "123159"
  },
  {
    "key": "Element2",
    "value": "Set"
  },
  {
    "key": "Element3",
    "value": "14KW"
  },
  {
    "key": "Element4",
    "value": "P"
  },
  {
    "key": "Element5",
    "value": ".02 CTW Diamond Matching Band"
  },
  {
    "key": "Element6",
    "value": null
  },
  {
    "key": "Element7",
    "value": null
  },
  {
    "key": "Element8",
    "value": null
  },
  {
    "key": "Element9",
    "value": null
  },
  {
    "key": "Element10",
    "value": null
  },
  {
    "key": "Element11",
    "value": null
  },
  {
    "key": "Element12",
    "value": null
  },
  {
    "key": "Element13",
    "value": null
  },
  {
    "key": "Element14",
    "value": null
  },
  {
    "key": "Element15",
    "value": null
  }
];
            "123159",
     
        $(function () {
            ko.applyBindings(rootViewModel, document.getElementById("productModelBindingKey"));
            
            $("img:not(.unzoomedImage)").attr("nopin", "true");
            // when the carousel slides, auto update thumbnail
            $('#productDetailsImagesCarousel').on('slid.bs.carousel', function (e) {
                var id = $('.item.active').data('slide-number');
                id = parseInt(id);
                $('[id^=carousel-selector-]').removeClass('carouselSelected');
                $('#productThumbnailSlider .item').removeClass('active');
                $('[id=carousel-selector-' + id + ']').addClass('carouselSelected');
                $('[id=carousel-selector-' + id + ']').closest('.item').addClass('active');
            });
            
            $('#otherConfigsAndRecommendedItems').accordion({ autoHeight: false });
           
            CloseAllQtips();
            $("#bulkPricesBtnContainer").live("click", function() {
                $(this).siblings("#aj_breaks").toggle();
            });
            var mainImageTop = $("#main-image").offset().top;
            
            $(".engravings-patterns-modal").on('shown.bs.modal', function() {
                rootViewModel.ProductDetails().ProductCustomizationViewModel().EngravingDialogViewModel.CopyFromConfiguration(configurationViewModel);
            });
            $('.peg-head-modal').on('hidden.bs.modal', function() {
                rootViewModel.ProductDetails().ProductCustomizationViewModel().PegHeadViewModel().PegHeadOptionsViewModel.ClearFilters();
            });
          
            $('#setStonesDialogTemplate, #Earring_Back_Dialog, #Clasp_Dialog, #ChainOrBracelet_Dialog, #Special_Finishes_Dialog, #PegShankHead_Dialog, #MatchingBand_Dialog').bind("dialogopen", function(event, ui) {
                
                $('html, body').animate({ scrollTop: mainImageTop }, 800);
            });
           
            $('.ui-dialog').click(function() {
                $('.inDialog').select2('close'); //i hate that i have to do this sooooo much.
            });
            CatalogValueUpdateManager.displayAffectedValueNotifications(rootViewModel.ProductDetails().Product.Series(), catalogValues);
            
            
        });
    </script>
    <div class="clear"></div>
</div>
<div class="clear"></div>
</div>
