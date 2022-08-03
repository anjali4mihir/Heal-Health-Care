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
    
    <div class="doctor-banner ">
        <div class="container">
            <div class="">
                <h1 class="banner-left animation-element fadeUp animation-element-exfast"> @Heal - Key For Health </h1>
                <div class="download-option animation-element fadeUp animation-element-fast">
                    <a class="o-button"> Download Now</a>
                </div>
                <div class="app-icons animation-element fadeUp animation-element-slow">
                    <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"> <img src="<?= base_url(); ?>assets/img/google-play-img.png" alt="Google Play"> </a>
                    <a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank">  <img src="<?= base_url(); ?>assets/img/app-store.png" alt="Google Play"> </a>
                </div>
            </div>
        </div>
    </div>

    <div class="doctor-detail diagnostics-detail">
        <div class="container">
            <h2 class="animation-element fadeRight animation-element-slow"> Now Book An Appointment For X-Rays & Scans  <br/> <span> From Your Choice of Imaging Center </span></h2>
            <img class="animation-element fadeLeft animation-element-exslow" src="<?= base_url(); ?>assets/img/diagnostics-top.png" alt="Animal Doctor">
        </div>
    </div>

    <div class="consultant-section">
        <div class="container">
            <img class="animation-element fadeRight animation-element-exslow" src="<?= base_url(); ?>assets/img/diagnostics-btm.png" alt="Doctor Services"> 
        </div>
    </div>

    <div class="video-section animation-element zoom animation-element-exslow">
        <div class="container">
        <iframe width="560" height="500" src="https://www.youtube.com/embed/hvwQtrGrZJ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
	
	<?php $this->load->view('front/common_footer'); ?>
	
</body>
</html>

