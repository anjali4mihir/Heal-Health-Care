<!doctype html>
<html lang="en">
<head>
<title> Heal Health & Medical </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<?php $this->load->view('front/common_css'); ?>
</head>
<body>
    <?php $this->load->view('front/common_header'); ?>
	
	 <div class="container">
		<div class="register_form otp_screen">
		   <h2><span>Your</span> OTP</h2>
		   <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
			  <?php if (validation_errors()){ echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning!</strong> ';echo validation_errors();echo '</div>'; }?><?php if($error != ''){ echo $error ; } ?>
			  <div class='d-none' id="ErrorDiv"></div>
			  <div class="row">
				 <div class="col-md-12">
					<div class="form-group">
						<label for="name">Enter OTP<span class="error">*</span></label>
						<input type="text" class="form-control" placeholder="Enter Valid OTP" id="otp" name="otp" maxlength="4" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
						<input type="hidden" name="mobile">
					</div>
				 </div>
				 <div class="otp_verify">
					<div class="col-md-6">
						<button type="submit" class="book-now-btn form_btn mt-1">Verify OTP</button>
					</div>
					<div class="col-md-6">
						<button type="button" id="submit_button" class="book-now-btn form_btn mt-1" onclick="resendOTP()">
							<span id="save_text">Resend OTP</span>
							<span id="save_progress" style="display: none;">Please Wait.. <i class="fa fa-circle-o-notch fa-spin"></i></span>
						</button>
					</div>
				 </div>
			  </div>
		   </form>
		</div>
	 </div>
      <?php $this->load->view('front/common_footer'); ?>
   </body>
</html>
<script>
$(function() {
    $("#form").validate({
        rules: {
            otp: {
                required: true,
                minlength: 4,
                maxlength: 4,
            },
        },
        messages: {
            otp: {
                required: "Please Enter OTP",
                minlength: "Please enter minimum 4 Number",
                maxlength: "Please enter maximum 4 Number"
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>
<script type="text/javascript">
function resendOTP() {
    $.ajax({
        url: "<?=base_url().'healto/resend_otp'?>",
        method: "POST",
        data: {
            id: "<?php echo $id; ?>"
        },
        beforeSend: function() {
            $('#submit_button').attr('disabled', true);
            $('#save_text').hide();
            $('#save_progress').show();
        },
        success: function(data) {
            $('#submit_button').removeAttr('disabled');
            $('#save_text').show();
            $('#save_progress').hide();
            if (data != '') {
                $('#ErrorDiv').removeClass('d-none');
                $('#ErrorDiv').html(data);
            }
        }
    });
}
</script>