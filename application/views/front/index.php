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
            <img src="<?= base_url(); ?>assets/img/banner-right-img.jpg" alt="Heal Banner">
        </div>
        <div class="banner-right banner-right-new animation-element fadeRight">
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
            <h1 class="animation-element fadeLeft animation-element-exfast"> Register as a @Heal Associate</h1>
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
                <div class="service-card" >
                    <a id="myBtn1" class="modal-trigger no-select viewDesc" data-url="general-physician">
                        <img src="<?= base_url(); ?>assets/img/physician.jpg" alt="Doctors"> 
                        <p> Physician </p>
                    </a> 
                </div>
                <div class="service-card">
                    <a id="myBtn2" class="modal-trigger no-select viewDesc" data-url="paediatrics">
                        <img src="<?= base_url(); ?>assets/img/paediatrician.jpg" alt="Doctors"> 
                        <p> Paediatrician </p> 
                    </a>
                </div>
                <div class="service-card">
                    <a id="myBtn3" class="modal-trigger no-select viewDesc" data-url="general-surgeon">
                        <img src="<?= base_url(); ?>assets/img/surgon-new.jpg" alt="Doctors"> 
                        <p> General Surgeon </p>
                    </a> 
                </div>
                <div class="service-card">
                    <a id="myBtn4" class="modal-trigger no-select viewDesc" data-url="dermatologist">
                        <img src="<?= base_url(); ?>assets/img/dermalogist.jpg" alt="Doctors"> 
                        <p> Dermatologist </p> 
                    </a>
                </div>
                <div class="service-card">
                    <a id="myBtn5" class="modal-trigger no-select viewDesc" data-url="obstetrician-gynaecologist">
                        <img src="<?= base_url(); ?>assets/img/obstetrician.jpg" alt="Doctors"> 
                        <p> Gynaecologist Obstetrician </p> 
                    </a>
                </div>
                <div class="service-card mobile-none">
                    <a id="myBtn6" class="modal-trigger no-select viewDesc" data-url="general-physician">
                        <img src="<?= base_url(); ?>assets/img/sexologist.jpg" alt="Doctors"> 
                        <p> Sexologist </p> 
                    </a>
                </div>

                <div class="show-all animation-element fadeUp animation-element-exfast">
                    <div class="service-card">
                        <a id="myBtn6" class="modal-trigger no-select viewDesc" data-url="general-physician">
                            <img src="<?= base_url(); ?>assets/img/sexologist.jpg" alt="Doctors"> 
                            <p> Sexologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn7" class="modal-trigger no-select viewDesc" data-url="dietician">
                            <img src="<?= base_url(); ?>assets/img/dietician.jpg" alt="Doctors"> 
                            <p> Dieticion & Nutritionist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn8" class="modal-trigger no-select viewDesc" data-url="ayurvedic">
                            <img src="<?= base_url(); ?>assets/img/ayurvedic.jpg" alt="Doctors"> 
                            <p> Ayurvedic Consultant </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn9" class="modal-trigger no-select viewDesc" data-url="homeopathy">
                            <img src="<?= base_url(); ?>assets/img/homeopathy.jpg" alt="Doctors"> 
                            <p> Homeopathic Consultant </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn10" class="modal-trigger no-select viewDesc" data-url="naturopathy">
                            <img src="<?= base_url(); ?>assets/img/naturopathy.jpg" alt="Doctors"> 
                            <p> Naturopathy Consultant </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn11" class="modal-trigger no-select viewDesc" data-url="general-practitioner-mbbs">
                            <img src="<?= base_url(); ?>assets/img/general.jpg" alt="Doctors"> 
                            <p> General Practitioner  </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn12" class="modal-trigger no-select viewDesc" data-url="dentist">
                            <img src="<?= base_url(); ?>assets/img/dentist.jpg" alt="Doctors"> 
                            <p> Dentist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn13" class="modal-trigger no-select viewDesc" data-url="endocrinologist">
                            <img src="<?= base_url(); ?>assets/img/enderologist.jpg" alt="Doctors"> 
                            <p> Endocrinologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn14" class="modal-trigger no-select viewDesc" data-url="orthopaedics">
                            <img src="<?= base_url(); ?>assets/img/orthopedics.jpg" alt="Doctors"> 
                            <p> Orthopedics </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn15" class="modal-trigger no-select viewDesc" data-url="cardiologist">
                            <img src="<?= base_url(); ?>assets/img/cardiologist.jpg" alt="Doctors"> 
                            <p> Cardiologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn16" class="modal-trigger no-select viewDesc" data-url="gastroenterologist">
                            <img src="<?= base_url(); ?>assets/img/gastrologist.jpg" alt="Doctors"> 
                            <p> Gastroenterologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn17" class="modal-trigger no-select viewDesc" data-url="pulmonologist">
                            <img src="<?= base_url(); ?>assets/img/pulomologist.jpg" alt="Doctors"> 
                            <p> Pulmonologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn18" class="modal-trigger no-select viewDesc" data-url="cancer-specialist">
                            <img src="<?= base_url(); ?>assets/img/cancer-specialist.jpg" alt="Doctors"> 
                            <p> Cancer Specialist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn19" class="modal-trigger no-select viewDesc" data-url="specialist-surgeon">
                            <img src="<?= base_url(); ?>assets/img/surgon.jpg" alt="Doctors"> 
                            <p> Specialist Surgeons </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn20" class="modal-trigger no-select viewDesc" data-url="neurologist">
                            <img src="<?= base_url(); ?>assets/img/neourologist.jpg" alt="Doctors"> 
                            <p> Neurologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn21" class="modal-trigger no-select viewDesc" data-url="urologist">
                            <img src="<?= base_url(); ?>assets/img/urologist.jpg" alt="Doctors"> 
                            <p> Urologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn22" class="modal-trigger no-select viewDesc" data-url="nephrologist">
                            <img src="<?= base_url(); ?>assets/img/nephrologist.jpg" alt="Doctors"> 
                            <p> Nephrologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn23" class="modal-trigger no-select viewDesc" data-url="rheumatologist">
                            <img src="<?= base_url(); ?>assets/img/rheumologist.jpg" alt="Doctors"> 
                            <p> Rheumatologist </p>
                        </a> 
                    </div>
                    <div class="service-card">
                        <a id="myBtn24" class="modal-trigger no-select viewDesc" data-url="general-physician">
                            <img src="<?= base_url(); ?>assets/img/diabitilogist.jpg" alt="Doctors"> 
                            <p> Diabetologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn25" class="modal-trigger no-select viewDesc" data-url="psychiatrist">
                            <img src="<?= base_url(); ?>assets/img/psychiatrist.jpg" alt="Doctors"> 
                            <p> Psychiatrist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn26" class="modal-trigger no-select viewDesc" data-url="opthalmologist">
                            <img src="<?= base_url(); ?>assets/img/ophthalmologist.jpg" alt="Doctors"> 
                            <p> Ophthalmologist </p> 
                        </a>
                    </div>
                    <div class="service-card">
                        <a id="myBtn27" class="modal-trigger no-select viewDesc" data-url="general-physician">
                            <img src="<?= base_url(); ?>assets/img/ent-specialist.jpg" alt="Doctors"> 
                            <p> Ent Specialist </p> 
                        </a>
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
                <iframe width="560" height="315" src="https://www.youtube.com/embed/hvwQtrGrZJ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                    <a class="o-button" href="<?= base_url() . 'register' ?>"> Book Now</a>
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
                        <p class="step-text-column"> Step 1 </p>
                        <h4> Create profile </h4>
                        <ul>
                            <li> Download App </li>
                            <li> Open Free Account </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <p class="step-text-column"> Step 2 </p>
                        <h4> Choose Services </h4>
                        <ul>
                            <li> Choose Wide </li>
                            <li> Range of Services </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <p class="step-text-column"> Step 3 </p>
                        <h4> Select Location </h4>
                        <ul>
                            <li> Choose location </li>
                            <li> Add multiple locations </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <p class="step-text-column"> Step 4 </p>
                        <h4> Find Services </h4>
                        <ul>
                            <li> Find Services Across  </li>
                            <li> India & within cities </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <p class="step-text-column"> Step 5 </p>
                        <h4> Compare Services </h4>
                        <ul>
                            <li> Find best options </li>
                            <li> Among All Available </li>
                        </ul>
                    </div>

                    <div class="step-block">
                        <p class="step-text-column"> Step 6 </p>
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

    <div class="d-none health-concern-section health-feed-section animation-element fadeUp animation-element-fast">
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
    <div class="testimonial-slider d-none">
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
	
	<script src="<?=base_url()?>assets/js/slick.min.js"></script>
	<script src="<?=base_url()?>assets/js/slick-animation.js"></script>
    
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
		
		$('.viewDesc').click(function(event){
			var dataUrl = $(this).attr('data-url');
			$('#myModal').find('h1').html('');
			$('#myModal').find('p').html('');
			$.ajax({
				url: base_url+"services_details/"+dataUrl, 
				success: function(result) {
					var obj = jQuery.parseJSON(result);
					$('#myModal').find('h1').html(obj.title);
					$('#myModal').find('p').html(obj.description);
				}
			});
            showModal();
            event.stopPropagation(); 
        });
        $('#modalClose1').click(function(){
            hideModal();
        });
	});
	
	function showModal(){
		$('#myModal').fadeIn('slow');
	}

	function hideModal(){
		$('#myModal').fadeOut('fast');
	}
	</script>
	
	<div id="myModal" class="modal modal-new">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="modalClose1" class="close no-select">&times;</span>
            <h1></h1>
            <p></p>
        </div>
    </div>
</body>
</html>

