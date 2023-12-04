<?php

 
?>
<script type="text/javascript">
</script>

<script type="text/css">
label {
    width: 4em;
    float: left;
    text-align: right;
    margin-right: 0.5em;
    display: block
}

.submit input {
    margin-left: 4.5em;
}

input {
    color: #781351;
    background: #fee3ad;
    border: 1px solid #781351
}
.submit input {
    color: #000;
    background: #ffa20f;
    border: 2px outset #d7b9c9
}

fieldset {
    border: 1px solid #781351;
    width: 20em
}

legend {
    color: #fff;
    background: #ffa20c;
    border: 1px solid #781351;
    padding: 2px 6px
}

</script>

<!-- add item form -->

<div id="basic">
    <h1>Add Item to Category #<?=$getParams['id']?></h1>

<form action="#">
    <fieldset>
        <legend>Item Basic Information</legend>
            <p>
                <label for="Title">Product Title</label>
                <input type="text" id="Title" name="Title" />
            </p>
             
            <p>
                <label for="StartPrice">StartPrice</label>
                <input type="text" id="StartPrice" name="StartPrice" /><br />
            </p>
            <p>
                <label for="ConditionID">ConditionID</label>
                <input type="text" id="ConditionID" name="ConditionID" /><br />
            </p>
            <p>
                <label for="Country">Country</label>
                <input type="text" id="Country" name="Country" /><br />
            </p>
            <p>
                <label for="Currency">Currency</label>
                <input type="text" id="Currency" name="Currency" /><br />
            </p>
            <p>
                <label for="ListingDuration">ListingDuration</label>
                <input type="text" id="ListingDuration" name="ListingDuration" /><br />
            </p>
            <p>
                <label for="ListingType">ListingType</label>
                <input type="text" id="ListingType" name="ListingType" /><br />
            </p>
            <p>
                <label for="PayPalEmailAddress">PayPalEmailAddress</label>
                <input type="text" id="PayPalEmailAddress" name="PayPalEmailAddress" /><br />
            </p>
            <p>
                <label for="PostalCode">PostalCode</label>
                <input type="text" id="PostalCode" name="PostalCode" /><br />
            </p>
            <p>
                <label for="Quantity">Quantity</label>
                <input type="text" id="Quantity" name="Quantity" /><br />
            </p>

       

    </fieldset>


    <fieldset>
    <legend>Item Description</legend>
           <p>
                <label for="Description">Product Description</label>
                <input type="text" id="Description" name="Description" />
            </p>
    </fieldset>

    <fieldset>
    <legend>Payment Methods</legend>
           <p>
                <label for="PaymentMethods">Payment Methods</label>
                <input type="text" id="PaymentMethods" name="PaymentMethods" />
            </p>
    </fieldset>

    <fieldset>
    <legend>Picture Details</legend>
           <p>
                <label for="PaymentMethods">Picture Details</label>
                <input type="text" id="PictureDetails" name="PictureDetails" />
            </p>
    </fieldset>

    <fieldset>
    <legend>Item Specifics</legend>
           <p>
                <label for="ItemSpecifics">ItemSpecifics</label>
                <input type="text" id="ItemSpecifics" name="ItemSpecifics" />
            </p>
    </fieldset>


    <p class="submit"><input type="submit" value="Submit" /></p>
</form>

</div>