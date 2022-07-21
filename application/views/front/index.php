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

    <div class="home-banner">
        <div class="banner-left animation-element fadeLeft">
            <h1>Key for health</h1>
            <p> 1L + Professionals </p>
            <div class="download-option">
                <a class="o-button"> Download @Heal App</a>
            </div>
            <div class="app-icons">
                <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"> <img src="<?= base_url(); ?>assets/img/google-play-img.png" alt="Google Play"> </a>
                <a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank">  <img src="<?= base_url(); ?>assets/img/app-store.png" alt="Google Play"> </a>
            </div>
        </div>
        <div class="banner-right animation-element fadeRight">
            <img src="<?= base_url(); ?>assets/img/banner-left-img.jpg" alt="Heal Banner">
        </div>        
    </div>

    <div class="top-services-section">
        <div class="container">
            <span class="before-border"></span>
            <h2> Top Services to choose from </h2>
            <span class="after-border"></span>

            <div class="services-block">
                <div class="services-left animation-element fadeUp animation-element-fast">
                    <div class="service-card">
						<a href="<?= base_url() . 'services/doctors'?>"> 
							<img src="<?= base_url(); ?>assets/img/doctor-img.jpg" alt="Doctors"> 
							<p> Doctors </p> 
						</a>
                    </div>
                </div>

                <div class="services-right animation-element fadeUp animation-element-slow">
                    <h2 class="animation-element fadeRight animation-element-exslow"> Medical Hub </h2>
                    <div class="row">
                        <div class="service-card">
                            <a href="<?= base_url() . 'services/doctors'?>"> 
                                <img src="<?= base_url(); ?>assets/img/dentist-img.jpg" alt="Doctors"> 
                                <p> Dentist </p> 
                            </a>
                        </div>

                        <div class="service-card">
                            <a href="<?= base_url() . 'services/doctors'?>"> 
                                <img src="<?= base_url(); ?>assets/img/dietician-img.jpg" alt="Dietician"> 
                                <p> Dietician </p> 
                            </a>
                        </div>

                        <div class="service-card">
                            <a href="<?= base_url() . 'services/physiotherapist'?>"> 
                                <img src="<?= base_url(); ?>assets/img/physiotherapist-img.jpg" alt="Physiotherapist"> 
                                <p> Physiotherapist </p>
                            </a> 
                        </div>

                        <div class="service-card">
                            <a href="<?= base_url() . 'services/animal-doctors'?>"> 
                                <img src="<?= base_url(); ?>assets/img/animal-doctor-img.jpg" alt="Animal Doctors"> 
                                <p> Animal Doctors </p> 
                            </a>
                        </div>

                        <div class="service-card">
                            <a href="<?= base_url() . 'services/nurses'?>"> 
                                <img src="<?= base_url(); ?>assets/img/nurse-img.jpg" alt="Nurses"> 
                                <p> Nurses </p> 
                            </a>
                        </div>

                        <div class="service-card">
                            <a href="<?= base_url() . 'services/find-store'?>"> 
                                <img src="<?= base_url(); ?>assets/img/pharmacy-img.jpg" alt="Find Pharmacy"> 
                                <p> Find Pharmacy </p> 
                            </a>
                        </div>

                        <div class="service-card">
                            <a href="<?= base_url() . 'services/find-lab'?>"> 
                                <img src="<?= base_url(); ?>assets/img/lab-img.jpg" alt="Find Labs"> 
                                <p> Find Labs </p> 
                            </a>
                        </div>

                        <div class="service-card">
                            <a href="<?= base_url() . 'services/find-diagnostics'?>"> 
                                <img src="<?= base_url(); ?>assets/img/rediogenist-img.jpg" alt="Find Radiodiagnostics"> 
                                <p> Find Radiodiagnostics </p> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="member-section">
        <div class="container">
            <div class="member-left animation-element fadeLeft animation-element-fast">
                <img src="<?= base_url(); ?>assets/img/member-img.png" alt="Member">
            </div>
            <div class="member-right animation-element fadeRight animation-element-slow">
                <h2> Become An Associate </h2>
                <p> Start your service online with Zero Investment</p>

                <div class="member-download animation-element zoom animation-element-slow">
                    <div class="app-icons">
                        <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"> <img src="<?= base_url(); ?>assets/img/google-play-img.png" alt="Google Play"> </a>
                        <a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"> <img src="<?= base_url(); ?>assets/img/app-store.png" alt="Google Play"> </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="register-member-section">
        <div class="container">
            <h1 class="animation-element fadeLeft animation-element-exfast"> Register as a @Heal Member</h1>
            <p class="animation-element fadeLeft animation-element-fast"> List to your service to your customer </p>
            <div class="member-block-img animation-element fadeLeft animation-element-slow">
                <img src="<?= base_url(); ?>assets/img/member-block-img.png" alt="Member">
            </div>
            <div class="member-btm-section member-block-img animation-element fadeRight animation-element-exslow">
                <img src="<?= base_url(); ?>assets/img/member-lady-img.png" alt="Member">
            </div>
			<?php if (isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])) { ?><?php } else { ?>
            <div class="sign-up-button animation-element fadeLeft animation-element-slow">
                <a href="<?= base_url() . 'register' ?>" class="o-button"> Free Sign up Now </a>
            </div>
			<?php }?>
        </div>
    </div>

    <div class="health-concern-section animation-element fadeUp animation-element-fast">
        <div class="container">
            <h2> Common Health Concerns </h2>
            <!-- <a class="view-btn" href="#"> View All</a> -->

            <div class="health-concern-card">
                <div class="wrapper">
                    <div class="carousel">
                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/fever.png">
                            <p> Fever </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/cough.png">
                            <p> cough </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/hypertension.png">
                            <p> Hypertention </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/hairfall.png">
                            <p> Hairfall </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/weight-loss.png">
                            <p> Weight Loss </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/diabetes.png">
                            <p> Diabetes </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/period-issue.png">
                            <p> Peroid Issue </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/pimples.png">
                            <p> Acne/Pimples </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/covid-19.png">
                            <p> Covid 19 </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/pregnancy.png">
                            <p> Pregnancy Related </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/acidity.png">
                            <p> Acidity </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/headache.png">
                            <p> Headache </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/performance-issue.png">
                            <p> Performance Issue </p>
                        </div>

                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/depression.png">
                            <p> Depression Or Anxiety </p>
                        </div>
                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/urine.png">
                            <p> Urinary Tract Infection </p>
                        </div>
                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/abdominal-pain.png">
                            <p> Abdominal Pain </p>
                        </div>
                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/thyroid-issue.png">
                            <p> Thyroid Issue  </p>
                        </div>
                        <div class="concern-card">
                            <img src="<?= base_url(); ?>assets/img/piles.png">
                            <p> Piles and Fissures  </p>
                        </div>
                    </div>
                </div>
                <!-- <img src="<?= base_url(); ?>assets/img/arrow-right.png" class="right-arrow animation-element fadeRight animation-element-exslow"> -->
            </div>

            
        </div>
    </div>

    <div class="specialities-section">
        <div class="container">
            <h2 class="animation-element fadeUp animation-element-fast"> Meet Specalists Pan India</h2>
            <p class="speci-count animation-element fadeUp animation-element-slow"> 30+ Specialities</p>

            <div class="specialities-option animation-element fadeUp animation-element-slow">
                <ul>
                    <li> <img src="<?= base_url(); ?>assets/img/checkmark.png"> In Clinic Consultation </li>
                    <li> <img src="<?= base_url(); ?>assets/img/checkmark.png"> Online Consultation </li>
                    <li> <img src="<?= base_url(); ?>assets/img/checkmark.png"> Doorstep Consultation </li>
                </ul>

                <a class="view-btn" id="view-specialities" href="javascript:void(0)"> View All</a>
            </div>
            <div class="specialities-services animation-element fadeUp animation-element-exslow">
                <div class="service-card">
                    <img src="<?= base_url(); ?>assets/img/physician.jpg" alt="Doctors"> 
                    <p> Physician </p> 
                </div>
                <div class="service-card">
                    <img src="<?= base_url(); ?>assets/img/paediatrician.jpg" alt="Doctors"> 
                    <p> Paediatrician </p> 
                </div>
                <div class="service-card">
                    <img src="<?= base_url(); ?>assets/img/surgon-new.jpg" alt="Doctors"> 
                    <p> General Surgeon </p> 
                </div>
                <div class="service-card">
                    <img src="<?= base_url(); ?>assets/img/dermalogist.jpg" alt="Doctors"> 
                    <p> Dermatologist </p> 
                </div>
                <div class="service-card">
                    <img src="<?= base_url(); ?>assets/img/obstetrician.jpg" alt="Doctors"> 
                    <p> Gynaecologist Obstetrician </p> 
                </div>

                <div class="show-all animation-element fadeUp animation-element-exfast">
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/sexologist.jpg" alt="Doctors"> 
                        <p> Sexologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/dietician.jpg" alt="Doctors"> 
                        <p> Dieticion & Nutritionist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/ayurvedic.jpg" alt="Doctors"> 
                        <p> Ayurvedic Consultant </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/homeopathy.jpg" alt="Doctors"> 
                        <p> Homeopathic Consultant </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/naturopathy.jpg" alt="Doctors"> 
                        <p> Naturopathy Consultant </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/general.jpg" alt="Doctors"> 
                        <p> General Practitioner  </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/dentist.jpg" alt="Doctors"> 
                        <p> Dentist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/enderologist.jpg" alt="Doctors"> 
                        <p> Endocrinologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/orthopedics.jpg" alt="Doctors"> 
                        <p> Orthopedics </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/cardiologist.jpg" alt="Doctors"> 
                        <p> Cardiologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/gastrologist.jpg" alt="Doctors"> 
                        <p> Gastroenterologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/pulomologist.jpg" alt="Doctors"> 
                        <p> Pulmonologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/cancer-specialist.jpg" alt="Doctors"> 
                        <p> Cancer Specialist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/surgon.jpg" alt="Doctors"> 
                        <p> Specialist Surgeons </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/neourologist.jpg" alt="Doctors"> 
                        <p> Neurologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/urologist.jpg" alt="Doctors"> 
                        <p> Urologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/nephrologist.jpg" alt="Doctors"> 
                        <p> Nephrologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/rheumologist.jpg" alt="Doctors"> 
                        <p> Rheumatologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/diabitilogist.jpg" alt="Doctors"> 
                        <p> Diabetologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/psychiatrist.jpg" alt="Doctors"> 
                        <p> Psychiatrist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/ophthalmologist.jpg" alt="Doctors"> 
                        <p> Ophthalmologist </p> 
                    </div>
                    <div class="service-card">
                        <img src="<?= base_url(); ?>assets/img/ent-specialist.jpg" alt="Doctors"> 
                        <p> Ent Specialist </p> 
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="healthcare-section">
        <div class="container">
            <div class="healthcare-left animation-element fadeLeft animation-element-fast">
                <h2> Digital World of Healthcare</h2>
                <p> Get All Medical Services At Your Doorstep <span> Simply Book From Our App </span></p>
                <div class="download-option animation-element fadeLeft animation-element-slow">
                    <a class="o-button"> Download @Heal App</a>
                </div>
                <div class="app-icons">
                    <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"> <img src="<?= base_url(); ?>assets/img/google-play-img.png" alt="Google Play"> </a>
                    <a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"> <img src="<?= base_url(); ?>assets/img/app-store.png" alt="Google Play"> </a>
                </div>
            </div>

            <div class="healthcare-right animation-element fadeRight animation-element-exslow">
                <img src="<?= base_url(); ?>assets/img/patient-video.jpg">
            </div>
        </div>
    </div>

    <div class="consultant-section">
        <div class="container">
            <h2 class="animation-element fadeLeft animation-element-exfast"> Consult Top Vaterinarians Across India</h2>
            <p class="animation-element fadeLeft animation-element-exfast"> Now Care For Your Beloved Pet </p>

            <img src="<?= base_url(); ?>assets/img/veterinarians.jpg" class="veterians-img animation-element zoom animation-element-fast">

            <div class="download-option animation-element fadeUp animation-element-slow">
                <a class="o-button"> Download @Heal App</a>
            </div>
            <div class="app-icons animation-element fadeUp animation-element-exslow">
                <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"> <img src="<?= base_url(); ?>assets/img/google-play-img.png" alt="Google Play"> </a>
                <a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"> <img src="<?= base_url(); ?>assets/img/app-store.png" alt="Google Play"> </a>
            </div>
        </div>
    </div>

    <div class="book-section">
        <div class="container">
            <ul>
                <li> Find </li>
                <li class="partition"> | </li>
                <li> Book </li>
                <li class="partition"> | </li>
                <li> Compare </li>
            </ul>

            <div class="book-service">
                <div class="service-card animation-element fadeUp animation-element-fast">
                    <img src="<?= base_url(); ?>assets/img/medicins.jpg" alt="Doctors"> 
                    <p> Medicines </p> 
                    <h5> 2000+ Pharmacy Stores Across India </h5>
                </div>
                <div class="service-card animation-element fadeUp animation-element-slow">
                    <img src="<?= base_url(); ?>assets/img/lab-test.jpg" alt="Doctors">
                    <p> Lab Tests </p> 
                    <h5> 1000+ Pathology Labs Across India </h5>
                </div>
                <div class="service-card animation-element fadeUp animation-element-exslow">
                    <img src="<?= base_url(); ?>assets/img/scanner.jpg" alt="Doctors"> 
                    <p> X-Rays & Scans </p> 
                    <h5> 2000+ Pharmacy Stores Across India </h5>
                </div>
            </div>

            <div class="book-btm">
                <div class="download-option animation-element fadeUp animation-element-slow">
                    <a class="o-button" href="#"> Book Now</a>
                </div>
                <div class="app-icons animation-element fadeUp animation-element-exslow">
                    <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"> <img src="<?= base_url(); ?>assets/img/google-play-img.png" alt="Google Play"> </a>
                    <a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"> <img src="<?= base_url(); ?>assets/img/app-store.png" alt="Google Play"> </a>
                </div>
            </div>
            
        </div>
    </div>

    <div class="how-work">
        <div class="container">
            <h2> How it works</h2>
        </div>

        <div class="work-step">
            <div class="container">
                <img class="animation-element fadeLeft animation-element-fast" src="<?= base_url(); ?>assets/img/step-img.png">

                <div class="step-text animation-element fadeUp animation-element-exslow">
                    <div class="step-block">
                        <h4> Create profile </h4>
                        <ul>
                            <li> Download App </li>
                            <li> Open Free Account </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <h4> Choose Services </h4>
                        <ul>
                            <li> Choose Wide </li>
                            <li> Range of Services </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <h4> Select Location </h4>
                        <ul>
                            <li> Choose location </li>
                            <li> Add multiple locations </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <h4> Find Services </h4>
                        <ul>
                            <li> Find Services Across  </li>
                            <li> India & within cities </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <h4> Compare Services </h4>
                        <ul>
                            <li> Find best options </li>
                            <li> Among All Available </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <h4> Book Services </h4>
                        <ul>
                            <li> Book easily with multiple payment option </li>
                            <li> Also Available COD </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="book-btm">
                <div class="download-option animation-element fadeUp animation-element-slow">
                    <a class="o-button"> Download @ Heal App </a>
                </div>
                <div class="app-icons animation-element fadeUp animation-element-exslow">
                    <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"> <img src="<?= base_url(); ?>assets/img/google-play-img.png" alt="Google Play"> </a>
                    <a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"> <img src="<?= base_url(); ?>assets/img/app-store.png" alt="Google Play"> </a>
                </div>
            </div>

        </div>
    </div>

    <div class="health-concern-section health-feed-section animation-element fadeUp animation-element-fast">
        <div class="container">
            <h2> Common Health Concerns </h2>
            <a class="view-btn" href="#"> View All</a>

            <div class="health-concern-card">
                    <div class="concern-card">
                        <div class="concern-card-inner">
             
                        </div>
                        <p> Topic </p>
                    </div>

                    <div class="concern-card">
                        <div class="concern-card-inner">
             
                        </div>
                        <p> Topic </p>
                    </div>

                    <div class="concern-card">
                        <div class="concern-card-inner">
             
                        </div>
                        <p> Topic </p>
                    </div>

                    <div class="concern-card">
                        <div class="concern-card-inner">
             
                        </div>
                        <p> Topic </p>
                    </div>

                    <div class="concern-card">
                        <div class="concern-card-inner">
             
                        </div>
                        <p> Topic </p>
                    </div>
            </div>

            
        </div>
    </div>
	
	<?php if(count($testimonials) > 0){ ?>
    <div class="testimonial-slider">
        <div class="container">
            <h2 class="animation-element fadeUp animation-element-slow"> Testimonials From Our Users</h2>

            <div class="sd_master_wrapper animation-element fadeUp animation-element-exslow">	
                <div class="sdtestBg2"></div>
                <div class="sdtestBg3"></div>
                <div class="slideshow">
                     <?php foreach ($testimonials as $key => $value) {
                            $returnpath = $this->config->item('banner_images_uploaded_path'); ?>
                    <div class="content"> <!-- slide 1 -->
                        <div class="thumbnail">
                            <img src="<?= $returnpath . $value->file; ?>"> 
                        </div>
                        <div class="btnNtxt"> 
                            <div class="sdAllContent"> 
                                
                                <div class="sd_scroll">
                                <h1 class="sdCustomSliderHeadig"><?= $value->details; ?></h1> 
                                </div>
                                <p class="SdClientName"><?= $value->name; ?></p>
                                <p class="SdClientDesc"><?= $value->position; ?></p>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                                 
                </div>
            </div>	
        </div>
    </div>
	<?php } ?>
	
	<?php $this->load->view('front/common_footer'); ?>
	<div class="offcanvas-overlay"></div>
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <div class="inner">
                <div class="border-bottom mb-3 pb-3 text-end"><button class="offcanvas-close">×</button></div>
                <div class="offcanvas-head mb-3">
                    <div class="header-top-offcanvas">
                        <p><i class="icofont-google-map"></i><span>ADDRESS:</span> 568 Elizaberth Str, London, UK</p>
                    </div>
                </div>
                <nav class="offcanvas-menu">
                    <ul>
                        <li><a href="#"><span class="menu-text">Home</span></a></li>
                        <li><a href="#"><span class="menu-text">Services</span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="services.html">Service</a></li>
                                <li><a href="service-details.html">service details</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">about</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </nav>
                <div class="offcanvas-social my-4">
                    <ul>
                        <li><a href="#"><i class="icofont-twitter"></i></a></li>
                        <li><a href="#"><i class="icofont-facebook"></i></a></li>
                        <li><a href="#"><i class="icofont-instagram"></i></a></li>
                        <li><a href="#"><i class="icofont-rss-feed"></i></a></li>
                        <li><a href="#"><i class="icofont-play-alt-1"></i></a></li>
                    </ul>
                </div>
                <ul class="media-wrap">
                    <li class="media media-list"><a href="login.html" class="book-now-btn">Login</a></li>
                    <li class="media media-list"><a href="register.html" class="book-now-btn">join with Us</a></li>
                </ul>
            </div>
        </div>
	
	<script src="<?=base_url()?>assets/js/slick.min.js"></script>
	<script src="<?=base_url()?>assets/js/slick-animation.js"></script>
	
	<!-- Meta Pixel Code -->
<script>
	! function(f, b, e, v, n, t, s) {
		if (f.fbq) return;
		n = f.fbq = function() {
			n.callMethod ?
				n.callMethod.apply(n, arguments) : n.queue.push(arguments)
		};
		if (!f._fbq) f._fbq = n;
		n.push = n;
		n.loaded = !0;
		n.version = '2.0';
		n.queue = [];
		t = b.createElement(e);
		t.async = !0;
		t.src = v;
		s = b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t, s)
	}(window, document, 'script',
		'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '449985093366925');
	fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=449985093366925&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->
<script>
	var element = "";
	var iframeSrc = "";
	$('.videoLink1, .videoLink2, .videoLink3')
		.magnificPopup({
			type: 'inline',
			midClick: true,
			callbacks: {
				open: function() {
					element = "#" + $(this).attr("id");
					iframeSrc = $(element).find("iframe").eq(0).clone();
					$(element).find("iframe").eq(0).attr('src', $(element).find("iframe").eq(0).attr(
						'local-src'));
					console.log(element);
				},
				close: function() {
					$(element).find("iframe").remove();
					$(element).append(iframeSrc);
				}
			}
		});
</script>
<script>
	$('.app-step').each(function() { // the containers for all your galleries
		$(this).magnificPopup({
			delegate: 'a', // the selector for gallery item
			type: 'image',
			gallery: {
				enabled: true
			}
		});
	});
</script>
    
	<script>
	$(document).ready(function(){ 
		var $slickElement = $('.slideshow');

		$slickElement.slick({
		autoplay: true,
		dots: false,
		});
		
		$('.carousel').slick({
			slidesToShow: 6,
			dots:false,
			centerMode: false,
			responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
				},
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});
	});
	</script>
</body>
</html>

