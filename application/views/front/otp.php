<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>Heal – Health & Medical</title><?php $this->load->view('front/common_css'); ?></head><body><div class="wrapper home-default-wrapper"><?php $this->load->view('front/common_header'); ?><section class="page-title-area bg-img bg-img-top" data-bg-img="<?=base_url()?>assets/img/photos/about-bg1.jpg"><div class="container"><div class="row"><div class="col-lg-7 m-auto"><div class="page-title-content content-style5 text-center"><p><font color="#ed1c24">@</font>Heal App</p><h4 class="title">OTP <span></span></h4></div></div></div></div></section><section class="register_page"><div class="container"><div class="register_form otp_screen"><h2><span>Your</span> OTP</h2> <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data"><?php if (validation_errors()){ echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning!</strong> ';echo validation_errors();echo '</div>'; }?><?php if($error != ''){ echo $error ; } ?><div class='d-none' id="ErrorDiv"></div><div class="row"><div class="col-md-12"><div class="form-group"><label for="name">Enter OTP<span class="error">*</span></label><input type="text" class="form-control" placeholder="Enter Valid OTP" id="otp" name="otp" maxlength="4" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"><input type="hidden" name="mobile"></div></div><div class="col-md-12"><div class="col-md-6"><button type="submit" class="book-now-btn form_btn mt-1">Verify OTP</button></div><div class="col-md-6"><button type="button" id="submit_button" class="book-now-btn form_btn mt-1" onclick="resendOTP()"><span id="save_text">Resend OTP</span><span id="save_progress" style="display: none;">Please Wait.. <i class="fa fa-circle-o-notch fa-spin"></i></span></button></div></div></div></form></div></div></section></main><?php $this->load->view('front/common_footer'); ?><?php $this->load->view('front/common_js'); ?></div></body></html>
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