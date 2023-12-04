<style type="text/css">
    .oldcontainer {
        margin-left: 1px !important;
        margin-right: 1px !important;
    }
    .order_info td:nth-child(1) {
        text-align:right; /*border:1px solid red;*/
    }
    .order_info td:nth-child(2) {
        text-align:left; /*border:1px solid blue;*/
    }
    .add2 {
        text-align:left;
    }
    .errorMsg{color:#F00; font-size:14px; margin-bottom: 15px; line-height: 16px;}
</style>
<script type="text/javascript" src="https://<cdn class="getfinanc"></cdn>ing.com/libs/1.0/getfinancing.js"></script>
<script>
    function setPaymentOption(blockid) {
        var ar = ['payment_card', 'payment_bankwire', 'payment_byphone', 'getfianancing'];

        for (var i = 0; i <= ar.length; i++) {
            if (ar[i] === blockid) {
                $('#' + ar[i] + ' .payment_label').addClass('activeLabel');
                $('#payment_method').val(ar[i]);

            } else {
                $('#' + ar[i] + ' .payment_label').removeClass('activeLabel');
                $('#payment_viacard').hide();
            }
        }
        if (blockid == 'payment_card') {
            $('#payment_viacard').show();
        }
    }
//// submit form
    function checkSubmitForm() {
        var pmt = $("#payment_method").val();

        if (pmt === 'payment_card') {
            usaepay();
        } else {
            $("#frmcontinue").submit();
        }
    }

    function toggle_option() {
        setPaymentOption('getfianancing');
        //var curr_class =$('#finance_show').attr('class');
        //console.log(curr_class);
        if ($('#finance_show').hasClass('hide')) {
            $('#finance_show').removeClass('hide');
            $('.finance_row').removeClass('hide');
        } else {
            $('#finance_show').addClass('hide');
            $('.finance_row').addClass('hide');
        }
    }

    /*** Function to add all financing options with ajax if user is logged in ****/
    var onComplete = function () {
        // this is called when the user finishes all the steps and
        // gets loan preapproved
        //$('#watch_listings').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
        alert('all steps are completed make new call now');
        $("#frmcontinue").attr("action", "<?php echo SITE_URL; ?>shoppingbasket/order_confirmation/ture");
        $("#frmcontinue").submit();
    };

    var onAbort = function () {
        alert('user closes the window ');
        // this is called when the user closes the lightbox before
        // finishing all the steps
    };

    function addfinancesubmit() {
        setPaymentOption('getfianancing');
        var finance_data = [];
        $(".get_finance_checkbox").each(function () {
            if ($(this).prop('checked') == true) {
                // console.log($(this).attr('id'));
                var name = $(this).attr('data-name');
                var sku = $(this).attr('data-sku');
                var qty = $(this).attr('data-qty');
                var price = $(this).attr('data-price');
                var product_name = name.replace(/ /g, "_");
                var push_data = {"name":product_name,"qty":qty,"uprice":price,"sku":sku};
                finance_data.push(push_data);
            }
        });

        console.log(finance_data);

        if (finance_data != "") {
            var urlink = base_url + '/testmmengagementrings/getfinancecall1';
            $.ajax({
                type: "POST",
                url: urlink,
                data: {
                    finance_data: finance_data
                },
                success: function (encoded_data) {
                    console.log(encoded_data);
                    data = JSON.parse(encoded_data);
                    if (data.success == 1) {
                        var url = data.info;
                        $("#getfinanaceUrl").val(url);
                        console.log(url);
                        //$("#frmcontinue").submit();
                        new GetFinancing(url, onComplete, onAbort);
                        
                    }/*else if(data.success==2){
                     alert('Plz login to your account first for finance.');
                     $('#view_errors').html('Plz login to your account first for finance.');
                     }else if(data.success==3){
                     alert('Billing or Shipping address is missing ,please update your profile.');
                     $('#view_errors').html('Billing or Shipping address is missing ,please update your profile.');
                     }*/
                    else {
                        alert('There is some problem , please try after some time.');
                        $('#view_errors').html('There is some problem , please try after some time.');
                    }
                },
                error: function () {
                    alert('Error ');
                }
            });

        } else {

            alert('Please select atleast one product for financing');
        }
    }
</script>
<script>
    function usaepay()
    {

        var cno = $("#creditcardno").val();
        var cvcode = $("#cvvcode").val();
        if (cno == '') {
            alert('Plz enter your card number!');
            $("#creditcardno").focus();
            return false;
        }
        if (cvcode == '') {
            alert('Plz enter the CVV code!');
            $("#cvvcode").focus();
            return false;
        }

        $.ajax({
            // The link we are accessing. 
            url: "<?php echo config_item('base_url'); ?>shoppingbasket/usaepay",
            // The type of request. 
            type: "post",
            // The type of data that is getting returned. 
            dataType: "html",
            data: {creditcardno: $("#creditcardno").val(), expmonth: $("#expmonth").val(), totalprice: $("#totalprice").val(), expyear: $("#expyear").val(), cvvcode: $("#cvvcode").val(), fname: $("#fname").val(), lname: $("#lname").val(), address1: $("#address1").val()},
            error: function () {
                //  ShowStatus( "AJAX - error()" ); 

                // Load the content in to the page. 
                jContent.html("<p>Page Not Found!!</p>");
           },
            beforeSend: function () {
                // $.blockUI(); 

           },
            complete: function () {


                ShowStatus("AJAX - complete()");
           },
            success: function (data) {
                if (data == 'approved') {
                    $("#frmcontinue").submit();
                } else {
                    $('#cardResponse').html(data);
                }
            }
        }
        );
    }

    function billForm() {
        $('#breadCrumbForm').submit();
    }
</script>
<?php
$this->load->helper('form');
$attributes = array('method' => 'POST', 'id' => 'frmcontinue');
?>
<div class="">

    <input type="hidden" id="getfinanaceUrl" value="">
    <div class="">
        <div>
            <form id="breadCrumbForm" name="breadCrumbForm" action="<?php echo SITE_URL; ?>shoppingbasket/orderinformation" method="post">
                <div class="bread-crumb">
                <h1>Hi!!!!!!!!!!!!</h1>
                    <div class="breakcrum_bk">	
                        <ul>
                            <li><a href="<?php echo config_item('base_url') ?>">Home</a></li>
                            <li><a href="<?php echo config_item('base_url') ?>shoppingbasket/mybasket">Shopping Cart</a></li>
                            <li><a href="#javascript;" onclick="billForm()">Billing and Shipping Address</a></li>
                            <li>Payment</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
            </form>
            <div class="">
                <div class="ship_row">
                    <div id="heading_left" class="mainPageHeading">
                        <h2 class="head_seting">Choose Your Payment</h2>
                    </div>
                    <div class="heading_right">
                        <ul class="shiping_tabs">
                            <li class="active_circle">Shipping + Billing</li>
                            <li class="active_circle">Payment</li>
                            <li>Review Order</li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php echo form_open(SITE_URL . 'shoppingbasket/selectpaymentmethod', $attributes) ?> 
                <?php
                //selectpaymentmethod
                //echo form_open(config_item('base_url').'shoppingbasket/selectpaymentmethod')
                ?>
                <div class="pad10">
                    <div class="dbr clear"></div><br>
                    <div class="dbr"></div>
                    <div class="shiping_left col-sm-5">
                        <div class="payment_block">
                            <div id="payment_card">
                                <input type="hidden" name="fname" id="fname" value="<?php echo $rowcust_info->fname; ?>" />
                                <input type="hidden" name="lname" id="lname" value="<?php echo $rowcust_info->lname; ?>" />
                                <input type="hidden" name="address1" id="address1" value="<?php echo $rowcust_info->address; ?>" />
                                <div class="payment_label activeLabel"><a href="#javascript;" onclick="setPaymentOption('payment_card')">PAY ONLINE WITH A CREDIT CARD</a></div>
                                <div>Use your Visa, MasterCard, American Express, or Discover.</div>
                                <div id="payment_viacard" style="display:none;"><br>
                                    We can only accept US, Canadian, and Australian credit cards online. For other cards, 
                                    please contact us. If you would like to pay with more than one credit card, call 866.Yadegar.<br>
                                    <div class="card_form">
                                        <div id="cardResponse" class="errorMsg"></div>
                                        <div class="label_rows">
                                            <span>Credit Card Number</span>
                                            <span><input type="text" class="cardField" value="<?php echo $rowcust_info->cc_number; ?>" name="creditcardno" id="creditcardno" /><br>
                                                <img src="<?php echo config_item('base_url'); ?>images/payment_cards.jpg" alt="payment_cards" class="viewCard" /></span>
                                        </div>
                                        <div class="label_rows">
                                            <span>Expiration</span>
                                            <span>
                                                <select name="expmonth" id="expmonth" class="monthField1">
                                                    <?php
                                                    $month = '';
                                                    $selected = (!empty($rowcust_info->exp_month) ? $rowcust_info->exp_month : date('m') );
                                                    for ($m = 1; $m <= 12; $m++) {
                                                        $mn = ( $m < 10 ? '0' . $m : $m );
                                                        $month .= '<option value="' . $mn . '" ' . selectedOption($selected, $m) . '>' . $m . '</option>';
                                                    }
                                                    echo $month;
                                                    ?>
                                                </select>&nbsp;
                                                <select name="expyear" id="expyear" class="yearSt">
                                                    <?php
                                                    $year = date('Y');
                                                    $year_option = '';
                                                    $selected1 = (!empty($rowcust_info->exp_year) ? $rowcust_info->exp_year : $year );

                                                    for ($y = $year; $y <= 2030; $y++) {
                                                        $year_option .= '<option ' . selectedOption($y, $selected1) . '>' . $y . '</option>';
                                                    }
                                                    echo $year_option;
                                                    ?>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="label_rows">
                                            <span>CVV Code</span>
                                            <span><input type="text" name="cvvcode" id="cvvcode" value="<?php echo $rowcust_info->cvv_code; ?>" class="monthField" /></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>

                            <div id="payment_bankwire">
                                <div class="payment_label activeLabel"><a href="#javascript;" onclick="setPaymentOption('payment_bankwire')">PAY WITH A BANK WIRE</a></div>
                                <div>All international orders are subject to a $35 processing fee.</div>
                            </div><br><br>

                            <div id="payment_byphone">
                                <div class="payment_label activeLabel"><a href="#javascript;" onclick="setPaymentOption('payment_byphone')">PAY BY TELEPHONE</a></div>
                                <div>Submit your order now, then complete it over the phone.</div>
                            </div>
                            <br><br>

                            <div id="">
                                <div class="payment_label activeLabel"><a href="javascript:void(0);" onclick="toggle_option()">Get finance</a></div>
                                <div id="finance_show" class="hide"><div class="imaglogo"><a href="javascript:void(0);" id="addfinancing" onclick="addfinancesubmit();" ><img src="<?php echo SITE_URL; ?>demo_retail/images/logo-getfinancing.png" alt="getfinancing" width="250"></a></div></div>
                            </div>
                            <br><br>

                            <br><br>
                            <input type="hidden" name="payment_method" id="payment_method" value="payment_bankwire" />
                            <div><span class="optionText">You will have an opportunity to review <br>your order on the next page.</span></div><br><br>
                        </div>
                    </div>
                    <div class="shiping_right col-sm-6 pull-right">
                        <div class="order_summbk">
                            <div class="ordersm_heading">Order Summary</div>
                            <?php
                            $tringTotal = 0;
                            $tearTotal = 0;
                            $stpendantTotal = 0;
                            $threestonepdtTotal = 0;
                            $tothreeTotal = 0;
                            $adjewelryTotal = 0;
                            $adUniqueTotal = 0;
                            $watchtotal = 0;

                            $defaultEaring = '';
                            $addtoringview = '';
                            $toearingview = '';
                            $threstPendantView = '';
                            $tosolitairview = '';
                            $tothreeview = '';
                            $addUniqueView = '';
                            $addwatchview = '';

                            $this->load->helper('t');
                            $totalcart_price = 0;
                            $finance_arr = $this->session->userdata('finance_product_arr');
                            //print_r($ids);
                            //echo "#########<hr>";	
                            foreach ($mycartitems as $myCartIndex => $item) {
                                //echo "<pre>";
                                //print_r($item);
                                $item_name = ($itemName1 == 'ZKORDIAMONDS' ? get_site_title() : $item['name']);
                                $rapnet_diamnd = $this->cartmodel->getrapnet_diamond_detail($item['lot']);
                                $dmitem_title = $rapnet_diamnd[0]['Girdle'];
                                $itemWirePrice = wire_price($item['totalprice']);
                                echo "<br>".$item['addoption'];
                                switch ($item['addoption']) {
                                    case 'addtoring':

                                        $diamond = getDetailsByLot($item['lot']);
                                        $dprice = $diamond['price'];
                                        $ringst_shape = view_shape_value($ringst_img, $side2['shape']);
                                        $ringst_image = $shape_imgurl . $ringst_img;

                                        $setttings = getAllByRindID($item['ringsetting']);
                                        $ringset_price = floatval($item['setting_price']) * $item['quantity'];
                                        $sprice = $item['price'];
                                        $totalitemPrice = ( $item['setting_price'] + $diamond['price'] ) * $item['quantity'];
                                        $itmWirePrice = wire_price($totalitemPrice);
                                        $ringsImage = $this->catemodel->getRingsImgViaId($setttings['style_group']);

                                        $setting_imgurl = config_item('base_url') . 'scrapper/imgs/' . $ringsImage['ImagePath'];

                                        //$itemPriceQty = ( ( floatval($dprice)*$item['quantity'] ) + $ringset_price );


                                        $addtoringview .= '<div class="row-fluid">';
                                        $addtoringview .= '<div class="imgleft_cols col-sm-2"><img src="' . $setting_imgurl . '" width="112" alt="Ring" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>' . $setttings['name'] . '</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Item: ' . $setttings['style_group'] . ' </span>
												<span>$' . _nf($item['setting_price']) . '</span>
											</div>
											<div class="shiping_row">
												<span>Lot : ' . $item['lot'] . '</span>
												<span>$' . _nf($diamond['price']) . '</span>
											</div>
											<div class="shiping_row">
												<span>RING SIZE: </span>
												<span>' . $item['dsize'] . '</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$' . _nf($totalitemPrice) . '</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$' . _nf($itmWirePrice) . '</span>
										</div>
										</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br></div>';

                                        $tringTotal = $tringTotal + $totalitemPrice;
                                        break;

                                    case 'toearring':

                                        $side1 = getDetailsByLot($item['sidestone1']);
                                        $s1price = $side1['price'];
                                        $side_shape = view_shape_value($side1_image, $side1['shape']);
                                        $side_image1 = $shape_imgurl . $side1_image;

                                        $side2 = getDetailsByLot($item['sidestone2']);
                                        $s2price = $side2['price'];
                                        $side2_shape = view_shape_value($side2_image, $side2['shape']);
                                        $side_image2 = $shape_imgurl . $side2_image;

                                        if ($item['earing_type'] == 'findings') {
                                            $setttings = $this->findingsmodel->getFindingsRingDetails($item['earringsetting']);
                                            $vimage_urlink = RINGS_IMAGE . 'crone/imgs/' . $setttings['ImagePath'];
                                            $sprice = $setttings['priceRetail'];
                                            $earingMetal = $setttings['metal_type'];
                                            $earingStyle = ucwords($setttings['head_style_name']);
                                            $seting_price = floatval($sprice) * $item['quantity'];
                                        } else {
                                            $setttings = getEarringSettingsById($item['earringsetting']);
                                            $vimage_urlink = config_item('base_url') . $setttings['small_image'];
                                            $sprice = $setttings['price'];
                                            $earingMetal = metal_label($setttings['metal']);
                                            $earingStyle = ucwords(str_replace('-', ' ', $setttings['style']));
                                            $seting_price = floatval($sprice) * $item['quantity'];
                                        }

                                        $stone1_price = floatval($s1price) * $item['quantity'];
                                        $stone2_price = floatval($s2price) * $item['quantity'];
                                        $total_ringpr = $stone1_price + $stone2_price + $seting_price;


                                        $toearingview .= '<div class="row-fluid">';
                                        $toearingview .= '<div class="imgleft_cols col-sm-2"><img src="' . $vimage_urlink . '" width="112" alt="Ring" /></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>Diamond Stud Earrings</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Item: ' . $item['earringsetting'] . '</span>
												<span>$' . _nf($seting_price) . '</span>
											</div>
											<div class="shiping_row">
												<span>Stone1 : ' . $side1['lot'] . '</span>
												<span>$' . _nf($stone1_price) . '</span>
											</div>
											<div class="shiping_row">
												<span>Stone2 : ' . $side2['lot'] . '</span>
												<span>$' . _nf($stone2_price) . '</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$' . _nf($item['totalprice']) . '</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$' . _nf($itemWirePrice) . '</span>
										</div>
										<div class="shiping_row">
												<span>Get Finance</span>
												<span><input type="checkbox" name="get_finance_checkbox" class="get_finance_checkbox" data-name="Diamond Stud Earrings" data-qty="' . $item['quantity'] . '" data-price="' . $item['totalprice'] . '"></span>
											</div>
										</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br></div>';

                                        $tearTotal = $tearTotal + $item['totalprice'];
                                        break;

                                    case 'addpendantsetings':

                                        $diamond = getDetailsByLot($item['lot']);
                                        $ringst_shape = view_shape_value($pendant_dmimg, $diamond['shape']);
                                        $pndt_image = $shape_imgurl . $pendant_dmimg;

                                        $dprice = intval(number_format($diamond['price'], 0, '.', ''));
                                        //$item['quantity'] = intval($item['quantity']);
                                        //$item['totalprice'] = intval(number_format($item['totalprice'],0,'.',''));
                                        $dmPrice = intval($item['quantity']) * $diamond['price'];

                                        $setttings = getPendentSettingsById($item['pendantsetting']);
                                        $sprice = intval(number_format($setttings['price'], 0, '.', ''));
                                        $pendant_imgurl = config_item('base_url') . $setttings['small_image'];

                                        $tosolitairview .= '<div class="row-fluid">';
                                        $tosolitairview .= '<div class="imgleft_cols col-sm-2"><img src="' . $pendant_imgurl . '" width="112" alt="Ring" /></div>
										<div class="detail_rightbk col-sm-10">
											<div class="checkout_cols">
										<div class="shiping_row">
											<span>' . $setttings['description'] . '</span>
											<span></span>
										</div>
										<div class="shiping_row">
											<span>Stock Number: ' . $setttings['stock_number'] . '</span>
											<span>$' . _nf($sprice * $item['quantity']) . '</span>
										</div>
										<div class="shiping_row">
											<span>Lot# : ' . $diamond['lot'] . '</span>
											<span>$' . _nf($dmPrice) . '</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$' . _nf($item['totalprice']) . '</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$' . _nf($itemWirePrice) . '</span>
										</div>
									</div>
										</div>
										<div class="clear"></div><br>
										<div class="botom_line"></div><br></div>';

                                        $stpendantTotal = $stpendantTotal + $item['totalprice'];
                                        break;

                                    case 'addpendantsetings3stone':

                                        ////// pendant 3stone detail
                                        $diamond = getDetailsByLot($item['lot']);
                                        $dprice = floatval($diamond['price']) * $item['quantity'];
                                        $diam_shape = view_shape_value($d1_image, $diamond['shape']);
                                        $diam_image1 = $shape_imgurl . $d1_image;

                                        $side1 = getDetailsByLot($item['sidestone1']);
                                        $s1price = floatval($side1['price']) * $item['quantity'];
                                        $diam1_shape = view_shape_value($dm1_image, $side1['shape']);
                                        $diamnd_image1 = $shape_imgurl . $dm1_image;

                                        $side2 = getDetailsByLot($item['sidestone2']);
                                        $s2price = floatval($side2['price']) * $item['quantity'];
                                        $diam2_shape = view_shape_value($dm2_image, $side2['shape']);
                                        $diam2_shape = $shape_imgurl . $dm2_image;

                                        $setttings = getPendentSettingsById($item['pendantsetting']);
                                        $sprice = $setttings['price'];
                                        $pendante_image = config_item('base_url') . $setttings['small_image'];
                                        $seting_price = floatval($dprice) * $item['quantity'];

                                        $threstPendantView .= '<div class="row-fluid">';
                                        $threstPendantView .= '<div class="imgleft_cols col-sm-2"><img src="' . $pendante_image . '" width="112" alt="Ring" /></div>
										<div class="detail_rightbk col-sm-10">
											<div class="checkout_cols">
										<div class="shiping_row">
											<span>' . $setttings['description'] . '</span>
											<span></span>
										</div>
										<div class="shiping_row">
											<span>Item: ' . $item['pendantsetting'] . '</span>
											<span>$' . _nf($sprice * $item['quantity']) . '</span>
										</div>
										<div class="shiping_row">
											<span>Lot# : ' . $diamond['lot'] . '</span>
											<span>$' . _nf($dprice) . '</span>
										</div>
										<div class="shiping_row">
											<span>Stone1 : ' . $side1['lot'] . '</span>
											<span>$' . _nf($s1price) . '</span>
										</div>
										<div class="shiping_row">
											<span>Stone2 : ' . $side2['lot'] . '</span>
											<span>$' . _nf($s2price) . '</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$' . _nf($item['totalprice']) . '</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$' . _nf($itemWirePrice) . '</span>
										</div>
									</div>
										</div>
										<div class="clear"></div><br>
										<div class="botom_line"></div><br></div>';

                                        $threestonepdtTotal = $threestonepdtTotal + $item['totalprice'];
                                        break;

                                    case 'tothreestone':

                                        ////// build three stone ring
                                        $diamond = getDetailsByLot($item['lot']);
                                        $dprice = $diamond['price'];
                                        $diam_shape = view_shape_value($d1_image, $diamond['shape']);
                                        $diam_image1 = $shape_imgurl . $d1_image;

                                        $side1 = getDetailsByLot($item['sidestone1']);
                                        $s1price = $side1['price'];
                                        $diam1_shape = view_shape_value($dm1_image, $side1['shape']);
                                        $diamnd_image1 = $shape_imgurl . $dm1_image;

                                        $side2 = getDetailsByLot($item['sidestone2']);
                                        $s2price = $side2['price'];
                                        $diam2_shape = view_shape_value($dm2_image, $side2['shape']);
                                        $diamnd_image2 = $shape_imgurl . $dm2_image;

                                        //// unique 3stone ring
                                        $build_3stone = $item['stone_type'];
                                        $default_ringsize = '';
                                        if ($build_3stone == 'unique') {
                                            $this->load->model('jewelleriesmodel');

                                            $setting_metal = $item['default_metal'];
                                            $default_ringsize = $item['default_ringsize'];

                                            $rowun_dtring = $this->catemodel->getRingsDetailViaId($item['ringsetting'], $setting_metal, $default_ringsize);
                                            $sprice = $rowun_dtring['priceRetail'];
                                            $data['rowun_dtring'] = $rowun_dtring;
                                            $unique_ringimg = SITE_URL . 'scrapper/imgs/' . $rowun_dtring['ImagePath'];
                                            $thestone_setinglink = config_item('base_url') . 'site/engagementRingDetail/' . $rowun_dtring['catid'] . '/' . $item['ringsetting'];
                                        } else {
                                            $setttings = getAllByStock($item['ringsetting']);
                                            $sprice = $setttings['price'];
                                            $unique_ringimg = $item['image_url'];
                                            $thestone_setinglink = config_item('base_url') . 'jewelry/tothree_stonedetail/' . $item['ringsetting'];
                                            $setting_metal = ( $setttings['metal'] == 'WhiteGold' ? 'White Gold' : $setttings['metal'] );
                                        }
                                        //$threstone_ringname = $details['style'].' '.$setttings['shape'].' Diamond Engagement Ring <span>in '.$setttings['metal'].' ('.$setttings['total_carats'].' tw.)</span>';
                                        $threstone_ringname = $details['style'] . ' ' . $setttings['shape'] . ' Diamond Engagement Ring';
                                        $threstone_ringname = (!empty($threstone_ringname) ? $threstone_ringname : 'Three-Stone Ring' );

                                        $tothreeview .= '<div class="row-fluid">';
                                        $tothreeview .= '<div class="imgleft_cols col-sm-2"><img src="' . $unique_ringimg . '" width="112" alt="Ring" /></div>
										<div class="detail_rightbk col-sm-10">
											<div class="checkout_cols">
										<div class="shiping_row">
											<span>' . $threstone_ringname . '</span>
											<span></span>
										</div>
										<div class="shiping_row">
											<span>Item: ' . $item['ringsetting'] . '</span>
											<span>$' . _nf(floatval($sprice) * $item['quantity']) . '</span>
										</div>
										<div class="shiping_row">
											<span>Lot# : ' . $diamond['lot'] . '</span>
											<span>$' . _nf(floatval($dprice) * $item['quantity']) . '</span>
										</div>
										<div class="shiping_row">
											<span>Stone1 : ' . $side1['lot'] . '</span>
											<span>$' . _nf(floatval($s1price) * $item['quantity']) . '</span>
										</div>
										<div class="shiping_row">
											<span>Stone2 : ' . $side2['lot'] . '</span>
											<span>$' . _nf(floatval($s2price) * $item['quantity']) . '</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Total Price :</span>
											<span>$' . _nf($item['totalprice']) . '</span>
										</div>
										<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$' . _nf($itemWirePrice) . '</span>
										</div>
									</div>
										</div>
										<div class="clear"></div><br>
										<div class="botom_line"></div><br></div>';

                                        $tothreeTotal = $tothreeTotal + $item['totalprice'];
                                        break;

                                    case 'addjewelry':
							
					$details = getDetailsByLot($item['lot']);
					$lotdm_shape = view_shape_value($lot_image, $details['shape']);
					$lotdm_image = $shape_imgurl.$lotdm_shape;
					$item_lot = $item['lot'];
					$checked_finance = "";
					if (in_array($item_lot, $finance_arr))
						$checked_finance = 'checked="checked"' ;

					if( !empty($details['fcolor_value']) ) {
						$diam_type = 'Color Diamond';
						$viewdtLink = diamond_detail_link($details['lot'],$item['addoption'],'fancy_color');
					} else {
						$diam_type = 'White Diamond';
						$viewdtLink = diamond_detail_link($details['lot'],'false','');
					}
					
					$itemName = loose_diamond_title($details);
					$jewelryTotalPrice = $item['price']*$item['quantity'];
					$wirePrice = wire_price($jewelryTotalPrice);
					
							$adjewelryView .= '<div class="row-fluid">';
							$adjewelryView .= '<div class="imgleft_cols col-sm-2">
							<img src="'.$item['image_url'].'" width="112" alt="'.$lotdm_shape.'" />
							<div style="font-size:12px;background-color:rey;padding-top:20px;" class="shiping_row finance_row hide">
									<span>Get Finance</span>
									<center><span>
		<input type="checkbox" name="get_finance_checkbox" '.$checked_finance.' class="get_finance_checkbox" data-sku="'.$item['lot'].'" data-name="'.$itemName.'" data-qty="'.$item['quantity'].'" data-price="'.$wirePrice.'">
										</span></center>
										</div>
							</div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>'.$itemName.'</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Web ID: </span>
												<span>'.$details['lot'].'</span>
											</div>
											<div class="shiping_row">
												<span>Lot : '.$item['lot'].'</span>
												<span>$'._nf($details['price']).'</span>
											</div>
											<div class="shiping_row">
												<span>Wire Price: </span>
												<span>'._nf($wirePrice).'</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Net Price :</span>
											<span>$'._nf($wirePrice).'</span>
										</div>
										</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br></div>';
							
							$adjewelryTotal = $adjewelryTotal + $wirePrice; //$jewelryTotalPrice;
							break;

                                    case 'addunique':

                                        $item['price'] = intval(number_format($item['price'], 0, '.', ''));
                                        $item['quantity'] = intval($item['quantity']);

                                        $uniqe_dtlink = $item['unique_urlink'];
                                        $getCateName = explode("/", $uniqe_dtlink);
                                        $details = getuniquedetail2($getCateName[5]);
                                        $itemCateName = strtoupper($getCateName[7]);
                                        $iteMetal = str_replace('_', ' ', $item['item_metal']);
                                        $itemSize = str_replace('_', '/', $item['dsize']);
                                        $getRingDMShape = explode('/', $details['stone_weight']);
                                        $lotdm_shape = view_shape_value($lot_image, $getRingDMShape[1]);
                                        $itemName = $itemCateName . ' Style Diamond Semi Mount Ring';
                                       
                                        $checked_finance = "";
                                        if (in_array($item_name, $finance_arr))
                                            $checked_finance = 'checked="checked"';
                                         $rowsring = $this->catemodel->getRingsDetailViaId($item['lot']);
                                        $engr_price = (!empty($item['engraved_text']) ? 30 : 0 );
                                        $unRingPrice = $item['price'] * $item['quantity'];

                                        $addUniqueView .= '<div class="row-fluid">';
                                        $addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="' . $item['image_url'] . '" width="112" alt="' . $lotdm_shape . '" /><div style="font-size:12px;background-color:rey;padding-top:20px;" class="shiping_row finance_row hide">
												<span>Get Finance</span><center>
												<span><input type="checkbox" name="get_finance_checkbox" ' . $checked_finance . ' class="get_finance_checkbox" data-name="' . $itemName . '" data-qty="' . $item['quantity'] . '" data-price="' . $item['totalprice'] . '"></span></center>
											</div></div>
											<div class="detail_rightbk col-sm-10">
												<div class="checkout_cols">
											<div class="shiping_row">
												<span>' . $itemName . '</span>
												<span></span>
											</div>
											<div class="shiping_row">
												<span>Stock Number: </span>
												<span>' . $rowsring['name'] . '</span>
											</div>
											<div class="shiping_row">
												<span>Metal: </span>
												<span>' . $iteMetal . '</span>
											</div>
											<div class="shiping_row">
												<span>Ring Size: </span>
												<span>' . $itemSize . '</span>
											</div>
											<div class="shiping_row">
												<span>Metal Weight:</span>
												<span>' . $rowsring['metal_weight'] . '</span>
											</div>
											<div class="shiping_row">
												<span>Stone Weight: </span>
												<span>' . $rowsring['stone_weight'] . '</span>
											</div>';
                                        $diamond['price'] = 0;

                                        if (!empty($item['sidestone1'])) {
                                            $diamond = getDetailsByLot($item['sidestone1']);

                                            $addUniqueView .= '<div class="shiping_row">
                                                                                    <span>Diamond Carat<br>Stock# ' . $diamond['lot'] . ' </span>
                                                                                    <span>' . $diamond['carat'] . '</span>
                                                                            </div>
                                                                            <div class="shiping_row">
                                                                                    <span>Diamond Measurement:<br>' . $diamond['Meas'] . ' </span>
                                                                                    <span></span>
                                                                            </div>
                                                                            <div class="shiping_row">
                                                                                    <span>Diamond Price: </span>
                                                                                    <span>' . _nf($diamond['price'], 2) . '</span>
                                                                            </div>';
                                        }

                                        $netTotalCartPrice = $unRingPrice + $diamond['price'] + $engr_price;
                                        $uniqueWirePrice = wire_price($netTotalCartPrice);

                                        if ($engr_price > 0) {
                                            $addUniqueView .= '<div class="shiping_row">
														<span>Engraved Price: </span>
														<span>$' . $engr_price . '</span>
													</div>';
                                        }

                                        $addUniqueView .= '<div class="shiping_row">
												<span>Ring Price: </span>
												<span>$' . _nf($unRingPrice) . '</span>
											</div>
											<div class="shiping_row pricerow">
											<span>Wire Price :</span>
											<span>$' . _nf($uniqueWirePrice) . '</span>
										</div>
										</div>
											</div>
											<div class="clear"></div><br>
											<div class="botom_line"></div><br></div>';

                                        $adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
                                        break;
                                    case 'addwatch':

                                        $details = $this->jewelrymodel->getWatchByStock($item['lot']);
                                        $item['price'] = $details['price1'];
                                        $item['quantity'] = intval($item['quantity']);

                                        $uniqe_dtlink = SITE_URL . $item['unique_urlink'];
                                        $itemName = $details['productName'] . ' ' . getWatchIdType($details['id_type']) . ' ' . $details['case_diameter'];

                                        $unRingPrice = $item['price'] * $item['quantity'];
                                        $netTotalCartPrice = $unRingPrice;
                                        $uniqueWirePrice = wire_price($netTotalCartPrice);

                                        $addUniqueView .= '<div class="row-fluid">';
                                        $addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="' . $item['image_url'] . '" width="112" alt="' . $itemName . '" /></div>
                        <div class="detail_rightbk col-sm-10">
                                <div class="checkout_cols">
                        <div class="shiping_row">
                                <span>' . $itemName . '</span>
                                <span></span>
                        </div>
                        <div class="shiping_row">
                                <span>Item Number: </span>
                                <span>' . $details['upc'] . '</span>
                        </div>
                        <div class="shiping_row">
                                <span>Model #: </span>
                                <span>' . check_empty($details['model_number'], 'NA') . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Brand Name: </span>
                                <span>' . check_empty($details['brand'], 'NA') . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Case Diametert:</span>
                                <span>' . $details['case_diameter'] . '</span>
                        </div>';

                                        $addUniqueView .= '<div class="shiping_row pricerow">
                                    <span>Sale Price :</span>
                                    <span>$' . _nf($unRingPrice) . '</span>
                            </div>
                            </div>
                                    </div>
                                    <div class="clear"></div><br>
                                    <div class="botom_line"></div><br></div>';

                                        $adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
                                        break;

                                    case 'rolex_watch':

                                        $details = $this->rolexmodel_new->getRolexWatchDetail($item['lot']);
                                        $item['price'] = $details['price'];
                                        $item['quantity'] = intval($item['quantity']);

                                        $uniqe_dtlink = SITE_URL . 'rolexrings/rolex_watch_detail/' . $item['lot'];
                                        $itemName = $details['title'];

                                        $unRingPrice = $item['price'] * $item['quantity'];
                                        $netTotalCartPrice = $unRingPrice;
                                        $uniqueWirePrice = wire_price($netTotalCartPrice);

                                        $addUniqueView .= '<div class="row-fluid">';
                                        $addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="' . $item['image_url'] . '" width="112" alt="' . $itemName . '" /></div>
                        <div class="detail_rightbk col-sm-10">
                                <div class="checkout_cols">
                        <div class="shiping_row">
                                <span>' . $itemName . '</span>
                                <span></span>
                        </div>
                        <div class="shiping_row">
                                <span>Item Number: </span>
                                <span>' . $details['style'] . '</span>
                        </div>
                        <div class="shiping_row">
                                <span>Metal: </span>
                                <span>' . check_empty($details['metal'], 'NA') . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Watch Type: </span>
                                <span>' . check_empty($details['watch_type'], 'NA') . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Country of Origin:</span>
                                <span>' . $details['country'] . '</span>
                        </div>
                        <div class="shiping_row">
                                <span>Average Weight:</span>
                                <span>' . $details['average_weight'] . '</span>
                        </div>';

                                        $addUniqueView .= '<div class="shiping_row pricerow">
                                    <span>Sale Price :</span>
                                    <span>$' . _nf($unRingPrice) . '</span>
                            </div>
                            </div>
                                    </div>
                                    <div class="clear"></div><br>
                                    <div class="botom_line"></div><br></div>';

                                        $adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
                                        break;

                                    case 'qualityrings':

                                        $item['price'] = intval(number_format($item['price'], 0, '.', ''));
                                        $item['quantity'] = intval($item['quantity']);

                                        $uniqe_dtlink = SITE_URL . $item['unique_urlink'];
                                        $details = $this->qualitymodel->qualityProductDetail($item['lot']);
                                        $itemName = $details['title'];

                                        $checked_finance = "";
                                        if (in_array($item_lot, $finance_arr))
                                        $checked_finance = 'checked="checked"' ;


                                        $engr_price = (!empty($item['engraved_text']) ? 30 : 0 );
                                        $unRingPrice = $item['price'] * $item['quantity'];
                                        $netTotalCartPrice = $unRingPrice + $engr_price;
                                        $uniqueWirePrice = wire_price($netTotalCartPrice);

                                        $addUniqueView .= '<div class="row-fluid">';
                                        $addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="' . QUALITY_IMGS . $details['large_image'] . '" width="112" alt="' . $itemName . '" />
<div style="font-size:12px;background-color:rey;padding-top:20px;" class="shiping_row finance_row hide">
                                    <span>Get Finance</span>
                                    <center><span>
        <input type="checkbox" name="get_finance_checkbox" '.$checked_finance.' class="get_finance_checkbox" data-1="'.$unRingPrice.'" data-2="'.$item_lot.'" data-3="'.$item_lot.'">
                                        </span></center>
                                        </div>



                                        </div>
                        <div class="detail_rightbk col-sm-10">
                                <div class="checkout_cols">
                        <div class="shiping_row">
                                <span>' . $itemName . '</span>
                                <span></span>
                        </div>
                        <div class="shiping_row">
                                <span>Item Number: </span>
                                <span>' . $details['style'] . '</span>
                        </div>
                        <div class="shiping_row">
                                <span>Metal Desc: </span>
                                <span>' . $details['metal'] . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Item Length: </span>
                                <span>' . $details['length_of_item'] . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Average Weight:</span>
                                <span>' . $details['average_weight'] . '</span>
                        </div>';

                                        if ($engr_price > 0) {
                                            $addUniqueView .= '<div class="shiping_row">
                                                            <span>Engraved Price: </span>
                                                            <span>$' . $engr_price . '</span>
                                                    </div>';
                                        }

                                        $addUniqueView .= '<div class="shiping_row pricerow">
                                    <span>Sale Price :</span>
                                    <span>$' . _nf($unRingPrice) . '</span>
                            </div>
                            </div>
                                    </div>
                                    <div class="clear"></div><br>
                                    <div class="botom_line"></div><br></div>';

                                        $adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
                                        break;

                                    case 'sterncolectionjewelry':

                                        $item['price'] = intval(number_format($item['price'], 0, '.', ''));
                                        $item['quantity'] = intval($item['quantity']);

                                        $details = $this->davidsternmodel->sternProductDetail($item['lot']);
                                        $uniqe_dtlink = SITE_URL . 'davidsternrings/jewelry_ring_detail/' . $details['id'];
                                        $ringBoxDesc = str_replace("/", ', ', $details['categories_name']);
                                        $itemName = $ringBoxDesc . ' Item ID: ' . $details['item_id'];
                                        $checked_finance = "";
                                                if (in_array($item_lot, $finance_arr))
                                                $checked_finance = 'checked="checked"' ;



                                        $ringsImg = STERN_IMGS . $details['item_id'] . '.jpg';

                                        $engr_price = (!empty($item['engraved_text']) ? 30 : 0 );
                                        $unRingPrice = $item['price'] * $item['quantity'];
                                        $netTotalCartPrice = $unRingPrice + $engr_price;
                                        $uniqueWirePrice = wire_price($netTotalCartPrice);

                                        $addUniqueView .= '<div class="row-fluid">';
                                        $addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="' . $ringsImg . '" width="112" alt="' . $itemName . '" />
<div style="font-size:12px;background-color:rey;padding-top:20px;" class="shiping_row finance_row hide">
                                    <span>Get Finance</span>
                                    <center><span>
        <input type="checkbox" name="get_finance_checkbox" '.$checked_finance.' class="get_finance_checkbox" data-1="'.$unRingPrice.'" data-2="'.$item_lot.'" data-3="'.$item_lot.'">
                                        </span></center>
                                        </div>




                                        </div>
                        <div class="detail_rightbk col-sm-10">
                                <div class="checkout_cols">
                        <div class="shiping_row">
                                <span>' . $itemName . '</span>
                                <span></span>
                        </div>
                        <div class="shiping_row">
                                <span>Item Number: </span>
                                <span>' . $details['item_id'] . '</span>
                        </div>
                        <div class="shiping_row">
                                <span>Metal Desc: </span>
                                <span>' . $details['default_metal'] . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Diamond CCTW: </span>
                                <span>' . $details['diamond_cctw_provided'] . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Ring Size: </span>
                                <span>' . $item['default_ringsize'] . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Finish Level:</span>
                                <span>' . $item['finish_level'] . '</span>
                        </div>';

                                        $addUniqueView .= '<div class="shiping_row pricerow">
                                    <span>Sale Price :</span>
                                    <span>$' . _nf($unRingPrice) . '</span>
                            </div>
                            </div>
                                    </div>
                                    <div class="clear"></div><br>
                                    <div class="botom_line"></div><br></div>';

                                        $adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
                                        break;

                                    case 'sterncollection':

                                        $item['price'] = intval(number_format($item['price'], 0, '.', ''));
                                        $item['quantity'] = intval($item['quantity']);

                                        $uniqe_dtlink = SITE_URL . $item['unique_urlink'];
                                        $details = $this->davidsternmodel->getSternCollectionDetail($item['lot']);
                                        $category_name = jewelry_cate_name($details['category']);
                                        $itemName = $category_name . ' ' . $details['metal_purity'] . ' Item ID: ' . $details['stock_number'];
                                          $checked_finance = "";
                                        if (in_array($item_name, $finance_arr))
                                            $checked_finance = 'checked="checked"';



                                        $engr_price = (!empty($item['engraved_text']) ? 30 : 0 );
                                        $unRingPrice = $item['price'] * $item['quantity'];
                                        $netTotalCartPrice = $unRingPrice + $engr_price;
                                        $uniqueWirePrice = wire_price($netTotalCartPrice);

                                        $addUniqueView .= '<div class="row-fluid">';
                                        $addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="' . $item['image_url'] . '" width="112" alt="' . $itemName . '" />

<div style="font-size:12px;background-color:rey;padding-top:20px;" class="shiping_row finance_row hide">
                                    <span>Get Finance</span>
                                    <center><span>
        <input type="checkbox" name="get_finance_checkbox" '.$checked_finance.' class="get_finance_checkbox" data-1="'.$unRingPrice.'" data-2="'.$item_lot.'" data-3="'.$item_lot.'">
                                        </span></center>
                                        </div>



                                        </div>
                        <div class="detail_rightbk col-sm-10">
                                <div class="checkout_cols">
                        <div class="shiping_row">
                                <span>' . $itemName . '</span>
                                <span></span>
                        </div>
                        <div class="shiping_row">
                                <span>Item Number: </span>
                                <span>' . $details['stock_number'] . '</span>
                        </div>
                        <div class="shiping_row">
                                <span>Metal Desc: </span>
                                <span>' . $details['metal'] . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Item Length: </span>
                                <span>' . $details['length'] . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Item Width: </span>
                                <span>' . $details['width'] . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Average Weight:</span>
                                <span>' . $details['weight'] . '</span>
                        </div>';

                                        $addUniqueView .= '<div class="shiping_row pricerow">
                                    <span>Sale Price :</span>
                                    <span>$' . _nf($unRingPrice) . '</span>
                            </div>
                            </div>
                                    </div>
                                    <div class="clear"></div><br>
                                    <div class="botom_line"></div><br></div>';

                                        $adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
                                        break;

                                    case 'stullerrings':

                                        $item['price'] = intval(number_format($item['price'], 0, '.', ''));
                                        $item['quantity'] = intval($item['quantity']);

                                        $uniqe_dtlink = SITE_URL . $item['unique_urlink'];
                                        $details = $this->qualitymodel->stullerRingsDetail($item['lot']);
                                        $itemName = $details['Description'];


                                         $checked_finance = "";
                                            if (in_array($item_lot, $finance_arr))
                                            $checked_finance = 'checked="checked"' ;

                                        $engr_price = (!empty($item['engraved_text']) ? 30 : 0 );
                                        $unRingPrice = $item['price'] * $item['quantity'];
                                        $netTotalCartPrice = $unRingPrice + $engr_price;
                                        $uniqueWirePrice = wire_price($netTotalCartPrice);

                                        $addUniqueView .= '<div class="row-fluid">';
                                        $addUniqueView .= '<div class="imgleft_cols col-sm-2"><img src="' . $item['image_url'] . '" width="112" alt="' . $itemName . '" />

<div style="font-size:12px;background-color:rey;padding-top:20px;" class="shiping_row finance_row hide">
                                    <span>Get Finance</span>
                                    <center><span>
        <input type="checkbox" name="get_finance_checkbox" '.$checked_finance.' class="get_finance_checkbox" data-1="'.$unRingPrice.'" data-2="'.$item_lot.'" data-3="'.$item_lot.'">
                                        </span></center>
                                        </div>


                                        </div>
                        <div class="detail_rightbk col-sm-10">
                                <div class="checkout_cols">
                        <div class="shiping_row">
                                <span>' . $itemName . '</span>
                                <span></span>
                        </div>
                        <div class="shiping_row">
                                <span>Item Number: </span>
                                <span>' . $details['Sku'] . '</span>
                        </div>';

                                        if (!empty($details['RingSize'])) {
                                            $addUniqueView .= '<div class="shiping_row">
                                <span>Ring Size: </span>
                                <span>' . $details['RingSize'] . '</span>
                        </div>';
                                            $addUniqueView .= '<div class="shiping_row">
                                <span>Ring Size Type: </span>
                                <span>' . $details['RingSizeype'] . '</span>
                        </div>';
                                        }

                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Weight:</span>
                                <span>' . _nf($details['Weight'], 2) . '</span>
                        </div>';
                                        $addUniqueView .= '<div class="shiping_row">
                                <span>Gram Weight:</span>
                                <span>' . _nf($details['GramWeight'], 2) . '</span>
                        </div>';

                                        if ($engr_price > 0) {
                                            $addUniqueView .= '<div class="shiping_row">
                                                            <span>Engraved Price: </span>
                                                            <span>$' . $engr_price . '</span>
                                                    </div>';
                                        }

                                        $addUniqueView .= '<div class="shiping_row pricerow">
                                    <span>Sale Price :</span>
                                    <span>$' . _nf($unRingPrice) . '</span>
                            </div>
                            </div>
                                    </div>
                                    <div class="clear"></div><br>
                                    <div class="botom_line"></div><br></div>';

                                        $adUniqueTotal = $adUniqueTotal + $netTotalCartPrice;
                                        break;
                                }
                            }
                            $totalcart_price = $tringTotal + $tearTotal + $stpendantTotal + $threestonepdtTotal + $tothreeTotal + $adjewelryTotal + $adUniqueTotal + $watchtotal;
                            $vieworder_cart = $addtoringview . $toearingview . $tosolitairview . $threstPendantView . $tothreeview . $adjewelryView . $addUniqueView . $addwatchview;
                            echo $vieworder_cart;

                            $salesTaxAmount = $totalcart_price * ( $salesTaxPercnt / 100 );   /// calculate tax amount
                            $netTotalOrderAmount = $totalcart_price + $salesTaxAmount;
                            ?>

                            <div class="further_row">
                                <span>Subtotal</span>
                                <span>$<?php echo _nf($totalcart_price); ?></span>
                            </div>
                            <div class="further_row">
                                <span>Fedex Shipping</span>
                                <span>Free</span>
                            </div>
                            <div class="further_row">
                                <span>Sales Tax <?php echo ( $salesTaxPercnt > 0 ? $salesTaxPercnt : ''); ?>%*</span>
                                <span>$<?php echo _nf($salesTaxAmount, 2); ?></span>
                            </div>
                            <div class="further_row">
                                <span>Order Total</span>
                                <span>$<?php echo _nf($netTotalOrderAmount); ?></span>
                            </div>
                        </div>
                        <input type="hidden" name="totalprice" id="totalprice" value="<?php echo ceil($totalcart_price); ?>">
                        <input type="hidden" name="paymentmethod" id="paymentmethod" value="furtherprocess">
                        <br><br>
                        <div class="setbotmText">
                            <div class="label_color">*Sales Tax is collected for orders shipped to <?php echo getSalesTaxCount(); ?> or outside the United States.</div>
                            <div class="label_color">View our policies for shipping internationally outside the U.S., Canada, and Australia.</div>
                            <div class="label_color"><span class="secure_ckout">Secure Checkout Shopping is always safe and secure</span></div>
                            <br><br>
                            <div class="text-right"><input type="button" name="continueorder" value="continue" onclick="checkSubmitForm()" class="submit_bntbg" title="Continue"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!--<div><input type="radio" name="shippingmethod" id="fedex" value="fedex" checked><input type="radio" name="paymentmethod" id="creditcard" value="creditcard" checked></div>-->


                    <script type="text/javascript">

                        function showmsgx() {
                            if (document.getElementById('creditcard').checked != true && document.getElementById('phone').checked != true && document.getElementById('moneyorder').checked != true) {
                                alert('Please select a method of payment');
                            }


                        }
                        ;

                    </script>
                    <div class="clear"></div><br><br>
                    <div class="newbotom_line"></div>
                    <div id="further_asistcols" class="checkout_cols">
                        <h3>Need Assistance</h3>
                        <div>
                                <!--<span class="liveChat">Live Chat</span>-->
                            <span class="contactNo"><?php echo get_site_title('contact_info'); ?></span>
                            <span class="emailUs"><a href="mailto:<?php echo get_site_title('email'); ?>">Email Us</a></span>
                        </div>
                        <div class="clear"></div><br>
                    </div> 
                    <div class="clear"></div>
                </div>
                <!--</form>--> 
<?php echo form_close(); ?> </div>
            <div class="clear"></div><br>
        </div>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>
    <br>
