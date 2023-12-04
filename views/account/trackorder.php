<link href="<?php echo config_item('base_url') ?>css/newstyle.css" rel="stylesheet" type="text/css" />
<div class="contentSectionOuter">
    <div class="midBg">
        <div class="midBgContentBox">
            <div class="orderStatusBox"><h2>order status</h2></div>
            <div style="clear:both">&nbsp;</div>
            <div style="margin:0 auto; width: 500px;">
                <?php echo (isset($message)) ? $message : ""; ?>
            </div>

            <div style="clear:both">&nbsp;</div>
            <?php if (isset ($orderInfo)): ?>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#more_info').click(function(e){
                            e.preventDefault();
                            $('#more_info_div').slideToggle('slow');
                        });
                    });        
                            
                </script>
                <div class="orderDetailsTableContainer">
                    <table class="orderDetailsTable" border="1" cellspacing="0" cellpadding="4">
                        <tr><th>Order Id#:</th><td><span ><a id="more_info" ><?php echo $orderInfo[0]['id'] ?></a></span></td></tr>
                        <tr><th>Price:</th><td><span><?php echo '$' . $orderInfo[0]['totalprice'] ?></span></td></tr>
                        <tr><th>Name:</th><td><span><?php echo $customerInfo[0]['fname'] . ' ' . $customerInfo[0]['lname'] ?></span></td></tr>
                        <tr><th>Phone#:</th><td><span><?php echo $customerInfo[0]['phone'] ?></span></td></tr>
                        <tr><th>Email:</th><td><span><?php echo $customerInfo[0]['email'] ?></span></td></tr>
                        <!--<tr><th>Status:</th><td><span><?php echo $orderInfo[0]['isconfirmed']?></span></td></tr>
                        <tr><th>City:</th><td><span><?php echo $orderInfo['city'] ?></span></td></tr>
                        <tr><th>State:</th><td><span><?php echo $orderInfo['state'] ?></span></td></tr>
                        <tr><th>Address:</th><td><span><?php echo $orderInfo['address'] ?></span></td></tr>-->
                    </table>
                </div>
                
               
                <div style="clear:both">&nbsp;</div>
                    <div class="orderDetailsTableContainer" id="more_info_div" style="display:none">
                        <table class="orderDetailsTable" border="1" cellspacing="0" cellpadding="4">
                            <tr><th>Lot:</th><td><span><?php echo $orderInfo['lot'] ?></span></td></tr>
                            <tr><th>Sidestone1:</th><td><span><?php echo $orderInfo['sidestone1'] ?></span></td></tr>
                            <tr><th>Sidestone2:</th><td><span><?php echo $orderInfo['sidestone2'] ?></span></td></tr>
                            <tr><th>Ring Setting:</th><td><span><?php echo $orderInfo['ringsetting'] ?></span></td></tr>
                            <tr><th>Earring Setting:</th><td><span><?php echo $orderInfo['earringsetting'] ?></span></td></tr>
                            <tr><th>Pendant setting:</th><td><span><?php echo $orderInfo['pendantsetting'] ?></span></td></tr>
                            <tr><th>Stud Earring:</th><td><span><?php echo $orderInfo['studearring'] ?></span></td></tr>
                            <tr><th>Order Date:</th><td><span><?php echo $orderInfo['orderdate'] ?></span></td></tr>
                            <tr><th>Quantity:</th><td><span><?php echo $orderInfo['quantity'] ?></span></td></tr>
                            <tr><th>Total Price:</th><td><span><?php echo $orderInfo['totalprice'] ?></span></td></tr>
                            <tr><th>Confirmed:</th><td><span><?php echo ($orderInfo['isconfirmed'] == '1') ? 'Yes' : 'No' ?></span></td></tr>
                        </table>
                        <div style="clear:both">&nbsp;</div>
                    </div>
                
                <div class="back-button-container">
                    <a class ="back-button" href="<?php echo config_item('base_url') ?>account/trackorder/">Back</a>
                </div>
                <div style="clear:both">&nbsp;</div>
            </div>
        <?php else: ?>
            <div>
                <div class="orderStatusFieldBoxOuter">
                    <div style="clear:both">&nbsp;</div>

                    <p>Our order status page provides the latest update available, offering the same information available to our Customer Services team. The information shown is based on the tracking numbers for your individual order.</p>

                    <p>Please enter your order number, and an e-mail address or phone number.</p>
                    <form action="trackorder" method="post" name="track_order">
                        <div class="orderStatusFieldBox">
                            <div class="orderStatusFieldBoxInner">
                                <div class="orderStatusFieldText">*E-mail address or<br /></div>
                                <div class="fieldText">
                                    <input name="email" type="text" class="fieldsize" />
                                </div>
                            </div>
                            <div class="orderStatusFieldBoxInner">
                                <div class="orderStatusFieldText">*Order Number</div>
                                <div class="fieldText">
                                    <input name="order_no" type="text" class="fieldsize" />
                                </div>
                            </div>
                            <div style="clear:both">&nbsp;</div>
                            <div class="orderStatusFieldBoxInner">
                                <div class="orderStatusFieldText">*Order Number</div>
                                <div class="fieldText">
                                    <input name="submit" type="submit" value="Track My Order" class="fieldsize" />
                                </div>
                            </div>
                            <div style="clear:both">&nbsp;</div>
                            <div style="clear:both">&nbsp;</div>

                            <!--                        <div class="orderStatusFieldBoxInner">
                                                        <div class="orderStatusFieldText">&nbsp;</div>
                                                        <div class="fieldText">
                                                            <a href="#">
                                                                <img src="http://gemnile.com/new_design/images/check-order.jpg" alt="" border="0" />
                                                            </a>
                                                        </div>
                                                    </div>-->
                        </div>
                    </form>

                </div>
                <div class="messageText">Fields Marked with * are required.</div>
            </div>

        <?php endif; ?>
        <div style="clear:both">&nbsp;</div>
        <div style="clear:both">&nbsp;</div>
        <div style="clear:both">&nbsp;</div>
        <div style="clear:both">&nbsp;</div>
    </div>
</div>
</div>

