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
    
    <div class="page-banner">
        <img class="animation-element fadeUp animation-element-fast" src="<?= base_url(); ?>assets/img/about-banner.jpg" alt="About Us">
        <h1 class="animation-element fadeUp animation-element-exslow"> Contact Us </h1>
    </div>

    <div class="contact-section">
        <div class="container">
            <div class="contact-section-left animation-element fadeLeft animation-element-fast">
                <img src="<?= base_url(); ?>assets/img/kripr-logo-img.jpg" alt="Kripr Tech Med">
                <p> <?= $site_details->address; ?> </p>
                <!-- <h5> Get Directions </h5> -->
                <a href="mailto:<?= $site_details->contact_email; ?>"> <img src="<?= base_url(); ?>assets/img/mail-icon.png" alt="Mail Icon"> <?= $site_details->contact_email; ?> </a>
            </div>

            <div class="contact-section-right animation-element fadeRight animation-element-slow">
                <h5> CALL DIRECTLY : </h5>
                <a href="tel:<?= $site_details->contact_no; ?>"> <?= $site_details->contact_no; ?> </a>

                <h5 class="work-hr"> Work Hours : </h5>
                <p><?= $site_details->work_hours; ?> </p>
            </div>
        </div>

        <div class="contact-form animation-element fadeUp animation-element animation-element-exslow">
            <div class="container">
                <h2> We Always Ready <span> To Help You </span> </h2>  
				<form method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="contact-form-btm">
						<?php if (validation_errors()) { echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning!</strong> '; echo validation_errors();echo '</div>';}?>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Your Name" name="con_name">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email Address" name="con_email">
						</div>

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject (Optional)" name="con_subject">
						</div>

						<div class="form-group text-area">
							<textarea name="con_message" class="form-control" rows="10" placeholder="Write your message here"></textarea>
						</div>

						<div class="submit-btn">
							<button type="submit" class="btn o-button">Send Message</button>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>

    <?php $this->load->view('front/common_footer'); ?>
	<script src="auto-complete.js"></script>
	<script>
	$(function() {
		$("#form").validate({
			rules: {
				con_name: {required: true},
				con_email: {required: true},
				con_message: {required: true}
			},
			messages: {
				con_name: {required: "Please Enter Name"},
				con_email: {required: "Please Enter Email"},
				con_message: {required: "Please Enter message"},
			},
			submitHandler: function(form) {
				form.submit();
			}
		});
	});
	</script>
</body>
</head>
</html>

