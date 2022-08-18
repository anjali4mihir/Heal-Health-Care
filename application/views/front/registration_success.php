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
        <img class="animation-element fadeUp animation-element-fast" src="<?= base_url(); ?>assets/img/form-submission.jpg" alt="About Us">
    </div>
	
   <div class="container">
	  <center>
		<div class="success-msg" style="margin-bottom: 60px;">
		 <p style="color: green;padding-top:30px;">YOUR REGISTRATION HAS BEEN SUCCESSFULLY</p>
		 <a href="<?= base_url() ?>" class="btn book-now-btn form_btn">EXIT</a><?php if($record->category == 1 || $record->category == 2 || $record->category == 3){$link = 'storeprofile-setting/'.$record->id;}else{$link = 'profile-setting/'.$record->id;} ?>  <a href="<?= base_url().$link ?>" class="btn book-now-btn form_btn">GO TO PROFILE</a>
		</div>
	  </center>
   </div>
	
    <?php $this->load->view('front/common_footer'); ?>
   </body>
</html>