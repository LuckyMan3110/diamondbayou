<style>
#pick_cause{padding:16px}
#pick_cause .btn-down{background-color:#000}
#pick_cause input[type=text],input[type=email],input[type=password]{padding:15px;margin:5px 0 0;display:inline-block;border-color:#000;background:#fff;position:relative;-ms-flex:1 1 auto;flex:1 1 auto;margin-bottom:0;height:calc(1.5em + .75rem + 2px);font-size:1rem;font-weight:400;line-height:1.5;color:#495057}
#pick_cause input[type=text]:focus,input[type=email]:focus,input[type=password]:focus{background-color:#ddd;outline:none}
#pick_cause button{background-color:#4CAF50;color:#fff;padding:14px 20px;margin:8px 0;border:none;cursor:pointer;width:100%;opacity:.9}
#pick_cause button:hover{opacity:1}
#pick_cause hr{border:1px solid #f1f1f1;margin-bottom:25px!important;width:100%;max-width:100%;margin-top:1rem!important}
#pick_cause h4{margin-bottom:.5rem;font-weight:500;line-height:1.2;font-size:1.5rem}
#pick_cause h5{font-size:1.25rem;margin-bottom:.5rem;font-weight:500;line-height:1.2;color:#000}
#pick_cause h6{font-size:1rem}
#pick_cause .clearfix::after{content:"";clear:both;display:table}
#pick_cause .btn-circle.btn-xl{width:70px;height:70px;padding:10px 16px;border-radius:35px;font-size:15px;line-height:1.33}
#pick_cause .btn-circle{width:30px;height:30px;padding:6px 0;border-radius:15px;text-align:center;font-size:12px;line-height:1.42857}
#pick_cause div.label{margin:0;padding:0;margin-left:20px;font-size:100%;font-weight:700}
#pick_cause ul.checkbox{margin:0;padding:0;margin-left:20px;list-style:none}
#pick_cause ul.checkbox li input{margin-right:.25em}
#pick_cause .background{text-align:center;background-color:#ffba00}
#pick_cause .img-fluid{max-width:100%;height:auto}
#pick_cause p{margin-top:0;margin-bottom:1rem}
#pick_cause img{vertical-align:middle;border-style:none}
#pick_cause .text-center{text-align:center!important}
#pick_cause .input-group{margin-bottom:0;position:relative;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-align:stretch;align-items:stretch;width:100%}
.viewErorMsages{color:red;text-align:center}
</style>
<div class="container" id="pick_cause">
	<img class="img-fluid" src="<?php echo SITE_URL; ?>images/banners/diamond-bayou-logo.png" width="10%" height="auto">
	<h4 class="text-center"><strong>I STAND FOR</strong></h4>
	<h6 class="text-center" style="color: gray;">Pick Your Stand</h6>
	<hr>
	<p class="text-center">With your purchase, DIAMOND supports Giving Partners creating more just and equitable futures for marginalized people.</p>

	<h5 class="text-center"><Strong>Sing up to take  $10 off your first order</Strong></h5>
	<span class="viewErorMsages"></span>
	<form id="pickcauseForm">
		<div class="input-group">
			<input style="width:33%" class="form-control" placeholder="first name" id="pcfirstname" name="pcfirstname" type="text" />
			<input style="width:33%" class="form-control" placeholder="lastname" id="pclastname" name="pclastname" type="text" />
			<input style="width:33%" class="form-control" placeholder="email" id="pcemail" name="pcemail" type="email" />
		</div>
	</form>
	<h4 class="text-center">I"m bling for:</h4>
	<form>
		<?php /* <label class="checkbox-inline">
			<input type="checkbox" value="">Giving Shoes
		</label> */ ?>
		<label class="checkbox-inline">
			<input type="checkbox" value="">Ending Gun Violence
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" value="">Safe Water
		</label>
		<?php /* <label class="checkbox-inline">
			<input type="checkbox" value="">Equality
		</label> */ ?>
		<label class="checkbox-inline">
			<input type="checkbox" value="">Mental Health
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" value="">The Homeless
		</label>
	</form>
	<button class="btn-down" onclick="managePickCause()">Next</button>
	<p class="text-center">By selecting 'Next', you to agree to our terms of use & Term of Sale and Privacy Policy</p>
	<p class="text-center" style="color: gray;">With every diamond purchase,you stand with us on issues that matter.</p>
</div>
<?php $sendurl = SITE_URL.'pages/purchase-help';?>
<script>
function managePickCause(){
	var urlinks = base_url+'site/managPickCauseSubs';

	dataString = $("#pickcauseForm").serialize();
	var pcfname = $('#pcfirstname').val();
	var pclname = $('#pclastname').val();
	var pcemail = $('#pcemail').val();
	var eror = '';
	if(pcfname == '') {
		$('#pcfirstname').focus();
		$('.viewErorMsages').html('Please enter your first name!');
		return false
	}
	if(pclname == '') {
		$('#pclastname').focus();
		$('.viewErorMsages').html('Please enter your last name!');
		return false
	}
	if(pcemail == '') {
		$('#pcemail').focus();
		$('.viewErorMsages').html('Please enter your email address');
		return false
	}
	if(IsEmail(pcemail)==false){
		$('.viewErorMsages').html('Please enter valid email address!');
		return false;
    }

	$.ajax({
		type: "POST",
		url:urlinks,
		data: dataString,
		success: function(data) {
			if(data == 0){
				$('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
				$(".viewErorMsages").html('Plz Enter the valid email address!');
			}else if(data == 1){
				$('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
				$(".viewErorMsages").html('You are Subscribed successfully!');
				$('#pcfirstname').val('');
				$('#pclastname').val('');
				$('#pcemail').val('');
				document.location.href= "<?php echo $sendurl; ?>";
			}else if(data == 2){
				$('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
				$(".viewErorMsages").html('This email address is already Subscribed here');
			}else{
				$('#view_errors').html('<div style="margin: 0px auto; "><img src="'+base_url+'images/loading.gif"></div>');
				$(".viewErorMsages").html('Error!!!');
			}
		},
		error: function(){
			alert('Error ');
		}
	  });
}
</script>