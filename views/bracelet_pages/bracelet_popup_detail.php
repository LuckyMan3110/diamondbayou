<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0116)iquickshop/product/view/id/3572/?keepThis=true&TB_iframe=true&width=800&height=510&modal=false -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" itemscope="" itemtype="http://schema.org/Product">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $ring_title; ?></title>

<script type="text/javascript">
var BASE_URL = '<?php echo SITE_URL; ?>';
</script>
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>default.css">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>magento.css">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>calendar-win2k-1.css">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>widgets.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>jquery.thickbox.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>skin_2.2.20.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>style.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>custommenu.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>fbintegrator.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>popup_5.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>dailydeal_1.1.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>sociallogin.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>skin.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>catalog.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>custommenu1.3.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>print.css" media="print">
<link rel="stylesheet" type="text/css" href="<?php echo DEMO_RETAIL_CSS; ?>reponsive.css" name="zcss_last">
<script src="<?php echo SITE_URL; ?>js/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
//<![CDATA[
optionalZipCountries = ["US"];
//]]>
</script>

<script type="text/javascript">
//jQuery.noConflict();
</script>
<!-- Facebook Pixel Code -->

<!-- End Facebook Pixel Code -->

<script async="true" type="text/javascript" src="<?php echo DEMO_RETAIL_JS; ?>roundtrip.js"></script>
<link href="<?php echo DEMO_RETAIL_CSS; ?>inside_style.css" rel="stylesheet" type="text/css" />

</head>
<body class="page-empty  iquickshop-product-view">
<div id="buysafeRollover" style="position: absolute; visibility: hidden; transition: none; left: -1000px; top: -1000px; right: auto; bottom: auto;"></div>
<div> 

  <script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.amsocial-side-image a').click(function(){
		jQuery('.coupon-btn').show();
	});
	jQuery('.amsocial-popup-close').click(function(){
		jQuery('.coupon-btn').hide();
	});
});
</script>
  <div class="product-view quick-view-popup">
    <div class="product-essential-1">
      <form action="#" method="post" id="product_addtocart_form" enctype="multipart/form-data" target="_top">
        <div class="no-display">
          <input type="hidden" name="product" value="3572">
          <input type="hidden" name="related_product" id="related-products-field" value="">
        </div>
        <div class="product-name">
          <h1><?php echo $ring_title; ?></h1>
        </div>
        <div class="product-img-box">
          <div class="box_main">
            <ul class="video-btns">
              <li id="divQuickLi1" class="activeClass"><a onclick="showMe(&#39;1&#39;);" href="javascript:void(0)" class="photos">&nbsp;</a></li>
            </ul>
            <br clear="all">
            <div class="f-left">
              <div id="tab1" class="data" style="clear:both;">
                <p class="product-image product-image-zoom"> <img id="image" src="<?php echo $ringimg; ?>" alt="<?php echo $ring_title; ?>" title="<?php echo $ring_title; ?>"> </p>
                <div class="more-views">
                  <ul>
                    <?php echo $rings_thumb; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column3">
          <div class="price-box">
            <p class="old-price fb-old-price f-fix"> <span class="price-label"><strong>Item Code:</strong></span> <span><?php echo $rowsring['Sku']; ?></span> <span class="print_product_details"><a href="<?php echo SITE_URL.'braceletsection/bracelet_detail/'.$rowsring['id']; ?>" target="_blank" title="Print this Product" rel="nofollow"><img src="<?php echo DEMO_RETAIL_IMG; ?>print.png" border="0" alt="Print"></a></span> </p>
            <p class="old-price"> <span class="retail-label">Retail Price:</span> <span class="price" id="old-price-<?php echo $rowsring['stuller_id']; ?>">$<?php echo _nf($retail_price, 2); ?></span> <span class="pnotify"> <a href="#" id="productupdates-button4" onmouseover=""> <i></i>Get Price Update </a> </span> </p>
            <p class="old-price"> <span class="ourprice-label">Our Price:</span> <span class="new-price" id="product-price-<?php echo $rowsring['stuller_id']; ?>">
                    $<?php echo _nf($salesprice, 2); ?></span> <span class="special-price-label" id="old_price">(Savings:<?php echo round($saving_percent); ?>%)</span> <span id="google_discount"></span> <span id="twitter_discount"></span> <span id="facebook_discount"></span> <span id="pinterest_discount"></span> <span id="total_price"></span> 
              <!-- // customm code for shipping free text --> 
              <strong><a class="freeShip" href="#" target="_blank">Ships for free&nbsp;*</a></strong> 
              <!-- // End customm code --> 
            </p>
          </div>
          <label for="qty">Qty:</label>
          <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty required-entry">
          <div class="product-options1" id="product-options-wrapper"> 
            <script type="text/javascript">
//<![CDATA[
var DateOption = Class.create({

    getDaysInMonth: function(month, year)
    {
        var curDate = new Date();
        if (!month) {
            month = curDate.getMonth();
        }
        if (2 == month && !year) { // leap year assumption for unknown year
            return 29;
        }
        if (!year) {
            year = curDate.getFullYear();
        }
        return 32 - new Date(year, month - 1, 32).getDate();
    },

    reloadMonth: function(event)
    {
        var selectEl = event.findElement();
        var idParts = selectEl.id.split("_");
        if (idParts.length != 3) {
            return false;
        }
        var optionIdPrefix = idParts[0] + "_" + idParts[1];
        var month = parseInt($(optionIdPrefix + "_month").value);
        var year = parseInt($(optionIdPrefix + "_year").value);
        var dayEl = $(optionIdPrefix + "_day");

        var days = this.getDaysInMonth(month, year);

        //remove days
        for (var i = dayEl.options.length - 1; i >= 0; i--) {
            if (dayEl.options[i].value > days) {
                dayEl.remove(dayEl.options[i].index);
            }
        }

        // add days
        var lastDay = parseInt(dayEl.options[dayEl.options.length-1].value);
        for (i = lastDay + 1; i <= days; i++) {
            this.addOption(dayEl, i, i);
        }
    },

    addOption: function(select, text, value)
    {
        var option = document.createElement('OPTION');
        option.value = value;
        option.text = text;

        if (select.options.add) {
            select.options.add(option);
        } else {
            select.appendChild(option);
        }
    }
});
var dateOption = new DateOption();
//]]>
</script> 
            <script type="text/javascript">
    //<![CDATA[
    var optionFileUpload = {
        productForm : $('product_addtocart_form'),
        formAction : '',
        formElements : {},
        upload : function(element){
            this.formElements = this.productForm.select('input', 'select', 'textarea', 'button');
            this.removeRequire(element.readAttribute('id').sub('option_', ''));

            template = '<iframe id="upload_target" name="upload_target" style="width:0; height:0; border:0;"><\/iframe>';

            Element.insert($('option_'+element.readAttribute('id').sub('option_', '')+'_uploaded_file'), {after: template});

            this.formAction = this.productForm.action;

            var baseUrl = BASE_URL + 'iquickshop/product/upload/';
            var urlExt = 'option_id/'+element.readAttribute('id').sub('option_', '');

            this.productForm.action = parseSidUrl(baseUrl, urlExt);
            this.productForm.target = 'upload_target';
            this.productForm.submit();
            this.productForm.target = '';
            this.productForm.action = this.formAction;
        },
        removeRequire : function(skipElementId){
            for(var i=0; i<this.formElements.length; i++){
                if (this.formElements[i].readAttribute('id') != 'option_'+skipElementId+'_file' && this.formElements[i].type != 'button') {
                    this.formElements[i].disabled='disabled';
                }
            }
        },
        addRequire : function(skipElementId){
            for(var i=0; i<this.formElements.length; i++){
                if (this.formElements[i].readAttribute('name') != 'options_'+skipElementId+'_file' && this.formElements[i].type != 'button') {
                    this.formElements[i].disabled='';
                }
            }
        },
        uploadCallback : function(data){
            this.addRequire(data.optionId);
            $('upload_target').remove();

            if (data.error) {

            } else {
                $('option_'+data.optionId+'_uploaded_file').value = data.fileName;
                $('option_'+data.optionId+'_file').value = '';
                $('option_'+data.optionId+'_file').hide();
                $('option_'+data.optionId+'').hide();
                template = '<div id="option_'+data.optionId+'_file_box"><a href="#"><img src="var/options/'+data.fileName+'" alt="options"><\/a><a href="#" onclick="optionFileUpload.removeFile('+data.optionId+')" title="Remove file" \/>Remove file<\/a>';

                Element.insert($('option_'+data.optionId+'_uploaded_file'), {after: template});
            }
        },
        removeFile : function(optionId)
        {
            $('option_'+optionId+'_uploaded_file').value= '';
            $('option_'+optionId+'_file').show();
            $('option_'+optionId+'').show();

            $('option_'+optionId+'_file_box').remove();
        }
    }
    var optionTextCounter = {
        count : function(field,cntfield,maxlimit){
            if (field.value.length > maxlimit){
                field.value = field.value.substring(0, maxlimit);
            } else {
                cntfield.innerHTML = maxlimit - field.value.length;
            }
        }
    }

    Product.Options = Class.create();
    Product.Options.prototype = {
        initialize : function(config){
            this.config = config;
            this.reloadPrice();
        },
        reloadPrice : function(){
            price = new Number();
            config = this.config;
            skipIds = [];
            $$('.product-custom-option').each(function(element){
                var optionId = 0;
                element.name.sub(/[0-9]+/, function(match){
                    optionId = match[0];
                });
                if (this.config[optionId]) {
                    if (element.type == 'checkbox' || element.type == 'radio') {
                        if (element.checked) {
                            if (config[optionId][element.getValue()]) {
                                price += parseFloat(config[optionId][element.getValue()]);
                            }
                        }
                    } else if(element.hasClassName('datetime-picker') && !skipIds.include(optionId)) {
                        dateSelected = true;
                        $$('.product-custom-option[id^="options_' + optionId + '"]').each(function(dt){
                            if (dt.getValue() == '') {
                                dateSelected = false;
                            }
                        });
                        if (dateSelected) {
                            price += parseFloat(this.config[optionId]);
                            skipIds[optionId] = optionId;
                        }
                    } else if(element.type == 'select-one' || element.type == 'select-multiple') {
                        if (element.options) {
                            $A(element.options).each(function(selectOption){
                                if (selectOption.selected) {
                                    if (this.config[optionId][selectOption.value]) {
                                        price += parseFloat(this.config[optionId][selectOption.value]);
                                    }
                                }
                            });
                        }
                    } else {
                        if (element.getValue().strip() != '') {
                            price += parseFloat(this.config[optionId]);
                        }
                    }
                }
            });
            try {
                optionsPrice.changePrice('options', price);
                optionsPrice.reload();
            } catch (e) {

            }
        }
    }
    function validateOptionsCallback(elmId, result){
        var container = $(elmId).up('ul.options-list');
        if (result == 'failed') {
            container.removeClassName('validation-passed');
            container.addClassName('validation-failed');
        } else {
            container.removeClassName('validation-failed');
            container.addClassName('validation-passed');
        }
    }
    var opConfig = new Product.Options({"201156":{"1763977":0,"1763978":0,"1763979":0}});
    //]]>
    </script> 
            <!--<dl id="quick_shop">
                    </dl>-->
            
            <div class="product-options1">
              <dl id="quick_shop" class="last">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                    <tr>
                      <td><table width="70%" cellspacing="2" cellpadding="2" border="0">
                          <tbody>
                            <tr>
                              <td><!--<select onchange="opConfig.reloadPrice()" title="" class="multiselect required-entry product-custom-option option-goldcolor-201156" id="select_201156" name="options[201156][]">-->
                                
                                <select title="" onchange="getColorImages(this.value,3572)" class="multiselect required-entry product-custom-option option-goldcolor-201156" id="select_201156" name="options[201156][]">
                                  <option value="" selected="selected">Gold Color</option>
                                  <option value="1763977">White</option>
                                  <option value="1763978">Yellow</option>
                                  <option value="1763979">Rose</option>
                                </select></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table>
              </dl>
            </div>
            <script>
 function getColorImages(color, productId){
 //alert(color);
 //alert(productId) ;
 jQuery( "#tab1" ).empty().append('<img src="'+BASE_URL+'images/loading-infinite.gif" alt="loading-infinite" style="padding: 214px 81px;">' );	
  url = '/catalog/product/getcoloredimagequickview/'
  jQuery.post(url,{colordata: color, pId: productId }, function(res) {
	  
	  var content = jQuery( res ).find( "#tab1" ).html();
	  if(content)
	  {
		jQuery( "#tab1" ).empty().append( content );
		showMe('1')	;
	  }

  });
  
 }
</script> 
            <script type="text/javascript">
//<![CDATA[
enUS = {"m":{"wide":["January","February","March","April","May","June","July","August","September","October","November","December"],"abbr":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]}}; // en_US locale reference
Calendar._DN = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]; // full day names
Calendar._SDN = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]; // short day names
Calendar._FD = 0; // First day of the week. "0" means display Sunday first, "1" means display Monday first, etc.
Calendar._MN = ["January","February","March","April","May","June","July","August","September","October","November","December"]; // full month names
Calendar._SMN = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]; // short month names
Calendar._am = "AM"; // am/pm
Calendar._pm = "PM";

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = "About the calendar";

Calendar._TT["ABOUT"] =
"DHTML Date/Time Selector\n" +
"(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" +
"For latest version visit: http://www.dynarch.com/projects/calendar/\n" +
"Distributed under GNU LGPL. See http://gnu.org/licenses/lgpl.html for details." +
"\n\n" +
"Date selection:\n" +
"- Use the \xab, \xbb buttons to select year\n" +
"- Use the " + String.fromCharCode(0x2039) + ", " + String.fromCharCode(0x203a) + " buttons to select month\n" +
"- Hold mouse button on any of the above buttons for faster selection.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"Time selection:\n" +
"- Click on any of the time parts to increase it\n" +
"- or Shift-click to decrease it\n" +
"- or click and drag for faster selection.";

Calendar._TT["PREV_YEAR"] = "Prev. year (hold for menu)";
Calendar._TT["PREV_MONTH"] = "Prev. month (hold for menu)";
Calendar._TT["GO_TODAY"] = "Go Today";
Calendar._TT["NEXT_MONTH"] = "Next month (hold for menu)";
Calendar._TT["NEXT_YEAR"] = "Next year (hold for menu)";
Calendar._TT["SEL_DATE"] = "Select date";
Calendar._TT["DRAG_TO_MOVE"] = "Drag to move";
Calendar._TT["PART_TODAY"] = ' (' + "Today" + ')';

// the following is to inform that "%s" is to be the first day of week
Calendar._TT["DAY_FIRST"] = "Display %s first";

// This may be locale-dependent. It specifies the week-end days, as an array
// of comma-separated numbers. The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "0,6";

Calendar._TT["CLOSE"] = "Close";
Calendar._TT["TODAY"] = "Today";
Calendar._TT["TIME_PART"] = "(Shift-)Click or drag to change value";

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%b %e, %Y";
Calendar._TT["TT_DATE_FORMAT"] = "%B %e, %Y";

Calendar._TT["WK"] = "Week";
Calendar._TT["TIME"] = "Time:";
//]]>
</script> 
          </div>
          <script type="text/javascript">decorateGeneric($$('#product-options-wrapper dl'), ['last']);</script>
          <div class="product-options-bottom">
            <div class="add-to-cart-1">
              <button type="button" title="Add to Cart" class="button-chk-cart" onclick="productAddToCartForm.submit()"></button>
              <ul class="add-to-links">
                <li><a href="javascript:void(0);" class="link-wishlist" title="Add to wishlist" onclick="fnc_redirectWindow();"></a></li>
                <li><span class="separator">|</span> <a href="javascript:void(0);" onclick="fnc_redirectWindowCompare();" class="link-compare" title="Add to compare">Add to Compare</a></li>
                <li><a href="javascript:void(0);" class="email-frnd" title="Email to a Friend" onclick="fnc_redirectWindow();"></a></li>
              </ul>
            </div>
            <script type="text/javascript">
function fnc_redirectWindow(url)
{
	window.parent.location = url;
	top.tb_remove();	
}

function fnc_redirectWindowCompare(url)
{
	
	/*window.location = url;
	top.tb_remove();*/
	jQuery.post(url+'?ajax=1',function(data,status){
  	top.tb_remove();
    window.parent.location.reload();
  });
	
}


</script> 
          </div>
          <br clear="all">
          <div style="clear:both;width:100%;">
            <div class="box-collateral box-additional"> <br clear="all">
                    <?php echo $listings_detail; ?>
              <script type="text/javascript">decorateTable('product-attribute-specs-table')</script> 
            </div>
          </div>
        </div>
      </form>
      <div class="clear"></div>
      <script type="text/javascript">
    //<![CDATA[
            var productAddToCartForm = new VarienForm('product_addtocart_form');
            productAddToCartForm.submit = function(){
                    if (this.validator.validate()) {
                            this.form.submit();
                    }
            }.bind(productAddToCartForm);
    //]]>
    </script> 
    </div>
  </div>
</div>

<!-- BEGIN: buySAFE Seal --> 
<script src="<?php echo DEMO_RETAIL_IMG; ?>rollover.js"></script> 
<script type="text/javascript">
		buySAFE.Hash = 'NFuAOT9fNTz9Gzi4Lzbrdbr0EoOguk4IKsZ294SPHMWiwDmrri%2FksgIJc%2F4H%2BsWkIz%2Bg4FJ32%2FHZ%2BA0cCZXNAA%3D%3D';
		WriteBuySafeSeal("BuySafeSealSpan", "GuaranteedSeal");
	</script> 
<!-- END: buySAFE Seal -->
</body>
</html>