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
        <img class="animation-element fadeUp animation-element-fast" src="<?= base_url(); ?>assets/img/contact-us-banner.jpg" alt="About Us">
        <h1 class="animation-element fadeUp animation-element-exslow"> About Us </h1>
    </div>

    <div class="health-section animation-element fadeUp animation-element-exslow">
        <div class="container">
            <h2> Key for health </h2>
            <h5> @Heal - Digital World of Healthcare </h5>
            <?= $page_data->desc_web;?>
        </div>
    </div>

    <div class="offering-section">
        <div class="container">
            <h2> What We Are Offering </h2>

            <div class="offering-btm ">
                <div class="offering-left animation-element fadeLeft animation-element-fast">
                    <div class="service-card">
						<a href="<?= base_url() . 'services/doctors'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-doctor.jpg" alt="Doctors"> 
							<p> Doctors </p> 
						</a>
                    </div>

                    <div class="service-card">
						<a href="<?= base_url() . 'services/doctors'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-dentist.jpg" alt="Dentist"> 
							<p> Dentist </p> 
						</a>
                    </div>

                    <div class="service-card service-card-text">
                        <ul>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> 24 x 7 </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Online Consultation </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> In Clinic Appoinments </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Doorstep Consultation </li>
                        </ul>
                    </div>

                    <div class="service-card">
						<a href="<?= base_url() . 'services/doctors'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-dietician.jpg" alt="Doctors"> 
							<p> Dietician </p> 
						</a>
                    </div>
                </div>

                <div class="offering-right animation-element fadeRight animation-element-slow">
                    <div class="service-card">
						<a href="<?= base_url() . 'services/animal-doctors'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-animal-doctor.jpg" alt="Doctors"> 
							<p> Animal Doctors </p> 
						</a>
                    </div>

                    <div class="service-card service-card-text">
                        <ul>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Quality Pet Care 24 x 7  </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Online Consultation </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Vet Clinic Appoinments </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Doorstep Consultation  </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="offering-btm">
                <div class="offering-left animation-element fadeLeft animation-element-fast">
                    <div class="service-card">
						<a href="<?= base_url() . 'services/physiotherapist'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-physiotherapist.jpg" alt="Doctors"> 
							<p> Physiotherapy </p> 
						</a>
                    </div>

                    <div class="service-card">
						<a href="<?= base_url() . 'services/nurses'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-nurses.jpg" alt="Doctors"> 
							<p> Nurses </p>
						</a>
                    </div>

                    <div class="service-card service-card-text">
                        <ul>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> 24 x 7 </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> In Clinic Appoinments </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Doorstep Consultation </li>
                        </ul>
                    </div>

                    <div class="service-card service-card-text">
                        <ul>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> 24 x 7 </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Doorstep Visits </li>
                        </ul>
                    </div>
                </div>

                <div class="offering-right offering-right-btm animation-element fadeRight animation-element-slow">
                    <div class="service-card">
						<a href="<?= base_url() . 'services/find-store'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-pharmacy.jpg" alt="Doctors"> 
							<p> Pharmacy </p> 
						</a>
                    </div>

                    <div class="service-card">
						<a href="<?= base_url() . 'services/find-lab'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-lab.jpg" alt="Doctors"> 
							<p> Lab </p> 
						</a>
                    </div>

                    <div class="service-card">
						<a href="<?= base_url() . 'services/find-diagnostics'?>"> 
							<img src="<?= base_url(); ?>assets/img/offering-radiology.jpg" alt="Doctors"> 
							<p> Radiology </p>
						</a>
                    </div>

                    <div class="service-card service-card-text service-card-text-btm">
                        <div class="compare-text">
                            <ul>
                                <li> Search </li>
                                <li> Compare </li>
                                <li> Book </li>
                            </ul>
                        </div>
                        <ul>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> 24 x 7  </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Search in Nearby </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Compare </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Book </li>
                            <li> <img src="<?= base_url(); ?>assets/img/checkmark-green.png"> Payment with COD </li>
                        </ul>
                    </div>
                </div>
            </div>
			
			<?php if($page_data->our_mission != ''){ ?>
            <div class="mission-vision animation-element fadeUp animation-element-slow">
                <h2> Our Mission </h2>
                <?= trim($page_data->our_mission) ;?>
            </div>
			<?php } ?>
			
			<?php if($page_data->our_vision != ''){ ?>
            <div class="mission-vision animation-element fadeUp animation-element-exslow">
                <h2> Our Vision </h2>
                <?= trim($page_data->our_vision) ;?>
            </div>
			<?php } ?>
        </div>
    </div>

    
    <div class="home-banner about-download">
        <div class="container">
            <div class="banner-right animation-element fadeLeft animation-element-slow">
                <img src="<?= base_url(); ?>assets/img/heal-mobile-img.png" alt="Heal App">
            </div>
            <div class="banner-left animation-element fadeRight animation-element-exslow">
                <img class="logo" src="<?= base_url(); ?>assets/img/heal-logo.png" alt="Heal Health">
                <div class="download-option">
                    <a class="o-button"> Download Now</a>
                </div>
                <div class="app-icons">
                    <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"> <img src="<?= base_url(); ?>assets/img/google-play-img.png" alt="Google Play"> </a>
                    <a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"> <img src="<?= base_url(); ?>assets/img/app-store.png" alt="Google Play"> </a>
                </div>
            </div>
        </div>     
    </div>

    <?php $this->load->view('front/common_footer'); ?>
</body>
</html>

