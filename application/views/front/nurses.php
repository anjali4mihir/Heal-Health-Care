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

    <div class="doctor-detail nurse-detail">
        <div class="container">
            <h2 class="animation-element fadeRight animation-element-slow"> Now Get Nursing Care <br/> <span> At Your Doorstep With Ease </span></h2>
            <img class="animation-element fadeLeft animation-element-exslow" src="<?= base_url(); ?>assets/img/find-nurse-img.png" alt="Animal Doctor">
        </div>
    </div>

    <div class="consultant-section nurse-consultant-section consultant-section-desktop">
        <div class="container">
            <h2 class="animation-element fadeUp animation-element-fast"> We Care For Your Loved One <br/> 
                Now get Nursing Service by  <br/>
                Nurses Around You </h2>
            <img class="animation-element fadeLeft animation-element-exslow" src="<?= base_url(); ?>assets/img/nursing-around-img.png" alt="Doctor Services"> 
        </div>
    </div>

    <div class="consultant-section-mobile">
        <div class="container">
            <img class="animation-element fadeUp animation-element-fast" src="<?= base_url(); ?>assets/img/physiotherapist-consultant2.jpg" alt="Doctor Services">
            <img class="animation-element fadeUp animation-element-slow" src="<?= base_url(); ?>assets/img/physiotherapist-consultant3.jpg" alt="Doctor Services">
        </div>
    </div>

    <div class="video-section animation-element zoom animation-element-exslow">
        <div class="container">
            <iframe width="560" height="500" src="https://www.youtube.com/embed/hvwQtrGrZJ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>


        </div>
    </div>
	
	<?php $this->load->view('front/common_footer'); ?>
	
</body>
</html>

