<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Heal – Health & Medical</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php $this->load->view('front/common_css'); ?>
    <style>
        @media screen and (max-width:800px) { .store {  text-align:center  }   }
    </style>
</head>

<body>
    <div class="wrapper home-default-wrapper">
        <?php $this->load->view('front/common_header');
        $path = $this->config->item('content_images_uploaded_path'); ?>
        <main class="main-content site-wrapper-reveal slider-register">
            <section class="page-title-area bg-img bg-img-top" data-bg-img="assets/img/Bg-reg.png">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="register-banner-text">
                                <h4 class="title">Book a Consultation Now</h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="register-image-banner"><img src="assets/img/phone-reg.png" /></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="register-tab">
                <div class="container">
                    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active"><a class="nav-link" id="home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="home" aria-selected="true">Doctor</a></li>
                        <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="profile" aria-selected="false">Nurse</a></li>
                        <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#3" role="tab" aria-controls="contact" aria-selected="false">Physiotherapist</a></li>
                        <li class="nav-item"><a class="nav-link" id="contact-tab1" data-toggle="tab" href="#4" role="tab" aria-controls="contact1" aria-selected="false">Veterinary Doctor</a></li>
                        <li class="nav-item"><a class="nav-link" id="contact-tab2" data-toggle="tab" href="#5" role="tab" aria-controls="contact2" aria-selected="false">Chemist Pathologist Radiologist</a></li>
                    </ul> -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="register-doctor-logo">
                                <img src="<?= $path . 'Doctor.png'; ?>" name="main_image" alt="demo">
                                <h4 id="main_heading">For Patient</h4>
                                <div class="row pt-5">
                                    <div class="col-md-4" id="div_1_1">
                                        <div class="screen-shot-reg">
                                            <div id="original_1">
                                                <!-- <div class="doctor-s-slides owl-theme" id="image_1_1_1div"> -->
                                                <div class="doctor-s-slides owl-carousel owl-theme" id="image_1_1_1div">
                                                    <?php
                                                    // $image_1 = json_decode($con_id['image_1']);
                                                    // $high_1 = json_decode($con_id['highlighted_image_1'], true);
                                                    ?>
                                                    <?php
                                                    // $i = 1;
                                                    // foreach ($image_1 as $value) {
                                                    ?>
                                                    <a href="<?= $path . 'dmmm-2.png'; ?>">
                                                        <div class="item"><img src="<?= $path . 'dm-2.png'; ?>" alt="demo"></div>
                                                    </a>
                                                    <?php //$i++;
                                                    //}  
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="123">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="div_1_2">
                                        <div class="doctor-right-box">
                                            <div class="doctor-box-position">
                                                <h2 id="heading_1">Manage Your Profile</h2>
                                                <p id="description_1" style="font-weight: 400 !important; font-size: 18px !important;">Create your profile in a few easy steps. List out your health issues and your medical history conveniently.</p>
                                                <div class="col-sm-6" style=" margin-top:10px;"> Download the App Now </div>
                                                <div class="col-sm-3" > <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-google-play-48.png" alt="google play store" />Google Play </a></div>
                                                <div class="col-sm-3"><a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-apple-logo-48.png" alt="apple logo" /> Apple Store </a></div>
                                            </div>
                                        </div>
                                        <!-- <div class="button-group store-buttons"> -->
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-8 order-2 order-lg-1 order-md-1 order-xl-1" id="div_2_1">
                                        <div class="doctor-right-box">
                                            <div class="doctor-box-position">
                                                <h2 id="heading_2">Choose Your Doctor</h2>
                                                <p id="description_2" style="font-weight: 400 !important; font-size: 18px !important;">You can choose from 1000+ medical staff for your needs. Book online consultation by Doctors, Nurse, Physiotherapist and Veterinarians of India instantly and book HOME Visits as well. </p>
                                                <div class="col-sm-6" style="margin-top:10px;"> Download the App Now </div>
                                                <div class="col-sm-3"> <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-google-play-48.png" alt="google play store" />Google Play </a></div>
                                                <div class="col-sm-3"><a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-apple-logo-48.png" alt="apple logo" /> Apple Store </a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 order-1 order-lg-2 order-md-2 order-xl-2" id="div_2_2">
                                        <div class="screen-shot-reg">
                                            <div id="original_2">
                                                <div class="doctor-s-slides owl-carousel owl-theme" id="image_2div">
                                                    <?php
                                                    // $image_2 = json_decode($con_id['image_2']);
                                                    // $high_2 = json_decode($con_id['highlighted_image_2'], true);
                                                    // $i = 1;
                                                    // foreach ($image_2 as $value) {
                                                    ?>
                                                    <a href="<?= $path . 'dmmm-2.png'; ?>">
                                                        <div class="item"><img src="<?= $path . 'dm-2.png'; ?>" alt="demo"></div>
                                                    </a>
                                                    <?php //$i++;
                                                    // }  
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="456"> </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row pt-5" id="div_3">
                                    <div class="col-md-4" id="div_3_1">
                                        <div class="screen-shot-reg">
                                            <div id="original_3">
                                                <div class="doctor-s-slides owl-carousel owl-theme" id="image_3div">
                                                    <?php
                                                    // $image_3 = json_decode($con_id['image_3']);
                                                    // $high_3 = json_decode($con_id['highlighted_image_3'], true);
                                                    // $i = 1;
                                                    // foreach ($image_3 as $value) {
                                                    ?>
                                                    <a href="<?= $path . 'dmmm-2.png'; ?>">
                                                        <div class="item"><img src="<?= $path . 'dm-2.png'; ?>" alt="demo"></div>
                                                    </a>
                                                    <?php //$i++;
                                                    //  }  
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="789"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="div_3_2">
                                        <div class="doctor-right-box">
                                            <div class="doctor-box-position">
                                                <h2 id="heading_3">Bring Home the Clinic </h2>
                                                <p id="description_3" style="font-weight: 400 !important; font-size: 18px !important;">Don’t go anywhere. Get video consultation at your convenience. You can easily communicate with your choice of doctor as per your concern through audio/video and chat option. <br /><br /> Additionally with Atheal you can also get HOME visits. </p>

                                                <div class="col-sm-6" style="margin-top:10px;"> Download the App Now </div>
                                                <div class="col-sm-3"> <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-google-play-48.png" alt="google play store" />Google Play </a></div>
                                                <div class="col-sm-3"><a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-apple-logo-48.png" alt="apple logo" /> Apple Store </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-8 order-2 order-lg-1 order-md-1 order-xl-1" id="div_2_1">
                                        <div class="doctor-right-box">
                                            <div class="doctor-box-position">
                                                <h2 id="heading_2">Get Digital Prescriptions </h2>
                                                <p id="description_2" style="font-weight: 400 !important; font-size: 18px !important;">Heal yourself and heal nature with Atheal by going paperless. Moving to digital platforms cuts the use of paper to a great extent thereby saving hundreds of trees from destruction. </p>
                                                <div class="col-sm-6" style="margin-top:10px;"> Download the App Now </div>
                                                <div class="col-sm-3"> <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-google-play-48.png" alt="google play store" />Google Play </a></div>
                                                <div class="col-sm-3"><a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-apple-logo-48.png" alt="apple logo" /> Apple Store </a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 order-1 order-lg-2 order-md-2 order-xl-2" id="div_2_2">
                                        <div class="screen-shot-reg">
                                            <div id="original_2">
                                                <div class="doctor-s-slides owl-carousel owl-theme" id="image_2div">
                                                    <?php
                                                    // $image_2 = json_decode($con_id['image_2']);
                                                    // $high_2 = json_decode($con_id['highlighted_image_2'], true);
                                                    // $i = 1;
                                                    // foreach ($image_2 as $value) {
                                                    ?>
                                                    <a href="<?= $path . 'dmmm-2.png'; ?>">
                                                        <div class="item"><img src="<?= $path . 'dm-2.png'; ?>" alt="demo"></div>
                                                    </a>
                                                    <?php //$i++;
                                                    // }  
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="456"> </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-4" id="div_1_1">
                                        <div class="screen-shot-reg">
                                            <div id="original_1">
                                                <div class="doctor-s-slides owl-carousel owl-theme" id="image_1_1_1div">
                                                    <?php
                                                    // $image_1 = json_decode($con_id['image_1']);
                                                    // $high_1 = json_decode($con_id['highlighted_image_1'], true);
                                                    ?>
                                                    <?php
                                                    // $i = 1;
                                                    // foreach ($image_1 as $value) {
                                                    ?>
                                                    <a href="<?= $path . 'dmmm-2.png'; ?>">
                                                        <div class="item"><img src="<?= $path . 'dm-2.png'; ?>" alt="demo"></div>
                                                    </a>
                                                    <?php //$i++;
                                                    //}  
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="123">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="div_1_2">
                                        <div class="doctor-right-box">
                                            <div class="doctor-box-position">
                                                <h2 id="heading_1">Order Medicines from Your nearby Pharmacy from Mobile App</h2>
                                                <p id="description_1" style="font-weight: 400 !important; font-size: 18px !important;">You do not need to wander for your medicines anymore. Order your medicines from the mobile app and receive it right on your doorstep. <br /><br /> The concept of online medicine has been taken to a new level by the Atheal. You can use the Atheal app to browse through an extensive range of medicines, compare the price and also pick up at your convenience.<br /><br /> Sit back, and we will have all your medical necessities taken care of.
                                                </p>
                                                <div class="col-sm-6" style="margin-top:10px;"> Download the App Now </div>
                                                <div class="col-sm-3"> <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-google-play-48.png" alt="google play store" />Google Play </a></div>
                                                <div class="col-sm-3"><a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-apple-logo-48.png" alt="apple logo" /> Apple Store </a></div>
                                            </div>
                                        </div>
                                        <!-- <div class="button-group store-buttons"> -->
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-8 order-2 order-lg-1 order-md-1 order-xl-1" id="div_2_1">
                                        <div class="doctor-right-box">
                                            <div class="doctor-box-position">
                                                <h2 id="heading_2">Lab Test at Ease</h2>
                                                <p id="description_2" style="font-weight: 400 !important; font-size: 18px !important;">To ease your worries, Atheal offers the facility to book appointments at the lab of your choice. <br /><br /> Radiology test - we give the option to book any radiology investigations like X-Ray, CT Scan, MRI, Sonography etc. </p>
                                                <p id="description_2" style="font-weight: 400 !important; font-size: 18px !important;">The expert phlebotomists will come to your house to collect samples. And all safety precautions are maintained. A fresh collection kit and/or needle will be used so that there is no contamination of samples and spread of diseases. The reports will be sent to you online. That means you won’t have to travel to the diagnostic lab to collect your reports. </p>

                                                <div class="col-sm-6" style="margin-top:10px;"> Download the App Now </div>
                                                <div class="col-sm-3"> <a href="https://play.google.com/store/apps/details?id=com.atheal" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-google-play-48.png" alt="google play store" />Google Play </a></div>
                                                <div class="col-sm-3"><a href="https://apps.apple.com/us/app/heal/id1582761953" target="_blank"><img style="width: auto; margin:0px !important;" src="<?php echo base_url(); ?>assets/img/icons8-apple-logo-48.png" alt="apple logo" /> Apple Store </a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 order-1 order-lg-2 order-md-2 order-xl-2" id="div_2_2">
                                        <div class="screen-shot-reg">
                                            <div id="original_2">
                                                <div class="doctor-s-slides owl-carousel owl-theme" id="image_2div">
                                                    <?php
                                                    // $image_2 = json_decode($con_id['image_2']);
                                                    // $high_2 = json_decode($con_id['highlighted_image_2'], true);
                                                    // $i = 1;
                                                    // foreach ($image_2 as $value) {
                                                    ?>
                                                    <a href="<?= $path . 'dmmm-2.png'; ?>">
                                                        <div class="item"><img src="<?= $path . 'dm-2.png'; ?>" alt="demo"></div>
                                                    </a>
                                                    <?php //$i++;
                                                    // }  
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="456"> </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section id="app-screenshot-area" class="app-screenshot-area" style="padding: 80px 0 !important ; margin-top:60px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-lg-7">
                            <div class="footer-item">
                                <div class="footer-quick">
                                    <h3>Frequently booked lab tests </h3>
                                    <h5 style="color :#ed1c24; margin-bottom: 2.5rem;">Book Lab Test Online. Obtain doorstep sample collection.</h5>
                                    <ul>
                                        <li style="color: #fff;"><i class="icofont-long-arrow-right"></i> 750+ Medical professionals</li>
                                        <li style="color: #fff;"><i class="icofont-long-arrow-right"></i> 5000+ Satisfied customers</li>
                                        <li style="color: #fff;"><i class="icofont-long-arrow-right"></i> 100+ Authorized Labs</li>
                                        <li style="color: #fff;"><i class="icofont-long-arrow-right"></i> 250+ Tests to choose from</li>
                                    </ul>
                                </div>
                                <div class="row">
                                <div class="col-md-6 pr-0 store"><a href="https://play.google.com/store/apps/details?id=com.atheal"><img src="<?php echo base_url(); ?>assets/img/playstore.webp" style="width:50%; padding-bottom: 10px;" alt="demo"/></a></div>
                                <div class="col-md-6 store"><a href="https://apps.apple.com/us/app/heal/id1582761953"><img src="<?php echo base_url(); ?>assets/img/apple-store.webp" style="width:50%;" alt="demo" /></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="swiper-container screenshot" data-aos="fade-up" data-aos-duration="1300">
                                <img src="<?php echo base_url(); ?>assets/img/splash-1-s.webp" alt="demo" />
                            </div>
                        </div>
                        <div class="col-lg-3 pr-0">
                            <div class="speciality-item speciality-right"><img src="<?php echo base_url(); ?>assets/img/about4.jpg" alt="Speciality"></div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php $this->load->view('front/common_footer'); ?>
        <?php $this->load->view('front/common_js'); ?>
        <script type="text/javascript">
            $(document).ready(function() {
                // $(".toggle-password").on('click', function() {
                //     $(this).toggleClass("fa-eye fa-eye-slash");
                //     var input = $("#pwd");
                //     if (input.attr("type") === "password") {
                //         input.attr("type", "text");
                //     } else {
                //         input.attr("type", "password");
                //     }
                // });

                // $(".toggle-password1").on('click', function() {
                //     $(this).toggleClass("fa-eye fa-eye-slash");
                //     var input = $("#confirmpwd");
                //     if (input.attr("type") === "password") {
                //         input.attr("type", "text");
                //     } else {
                //         input.attr("type", "password");
                //     }
                // });



                $('#original_2').show();
                $('#original_3').show();
                $('#original_1').show();
                $('#123').hide();
                $('#456').hide();
                $('#789').hide();
                // $('.doctor-s-slides.owl-carousel').owlCarousel({
                //     loop: true,
                //     margin: 10,
                //     autoplay: false,
                //     autoplayTimeout: 3000,
                //     responsiveClass: true,
                //     dots: false,
                //     nav: true,
                //     responsive: {
                //         0: {
                //             items: 1,
                //             nav: true
                //         },
                //         600: {
                //             items: 1,
                //             nav: true
                //         },
                //         1000: {
                //             items: 1,
                //             nav: true,
                //             loop: true
                //         }
                //     }
                // });
            });

            // $('ul li a').click(function() {
            //     var path = "<?= $path ?>";
            //     var id = $(this).attr('href');
            //     var one = id.substring(1);

            //     var ajaxurl = "<?= base_url(); ?>";
            //     $('.tab-pane').attr('id', one);
            // $.ajax({
            //     method: "POST",
            //     url: ajaxurl + 'get-query',
            //     dataType: "JSON",
            //     data: {
            //         id: one
            //     },
            //     success: function(data) {
            //         //alert(data.image_1['image_1']);
            //         //alert(path);
            //         if (one == '5') {
            //             $('#div_3_1').addClass('col-md-6').removeClass('col-md-4');
            //             $('#div_3_2').addClass('col-md-6').removeClass('col-md-8');
            //             $('#div_1_1').addClass('col-md-6').removeClass('col-md-4');
            //             $('#div_1_2').addClass('col-md-6').removeClass('col-md-8');
            //             $('#div_2_1').addClass('col-md-6').removeClass('col-md-8');
            //             $('#div_2_2').addClass('col-md-6').removeClass('col-md-4');
            //         } else {
            //             $('#div_3_1').addClass('col-md-4').removeClass('col-md-6');
            //             $('#div_3_2').addClass('col-md-8').removeClass('col-md-6');
            //             $('#div_1_1').addClass('col-md-4').removeClass('col-md-6');
            //             $('#div_1_2').addClass('col-md-8').removeClass('col-md-6');
            //             $('#div_2_1').addClass('col-md-8').removeClass('col-md-6');
            //             $('#div_2_2').addClass('col-md-4').removeClass('col-md-6');
            //         }

            //         if (data.main_image != '') {
            //             $('[name="main_image"]').show();
            //             $('[name="main_image"]').attr("src", path + data.main_image);
            //         } else {
            //             $('[name="main_image"]').hide();
            //         }

            //         if (data.main_heading != '') {
            //             $('h4#main_heading').show();
            //             $('h4#main_heading').html(data.main_heading);
            //         } else {
            //             $('h4#main_heading').hide();
            //         }

            //         if (data.heading_3 == '' && data.description_3 == '' && data.description_3 == '') {
            //             $('#div_3').hide();
            //         } else {
            //             $('#div_3').show();
            //         }

            //         $('#123').show();
            //         $('#original_1').hide();
            //         $('#123').html('<div id="testing" class="doctor-s-slides owl-carousel owl-theme"></div>');
            //         var i = 1;
            //         var highh = 'image_';
            //         jQuery.each(data.image_1, function(index, itemData) {
            //             $("#testing").append('<a href="' + path + data.high_1[highh + i] + '"><div class="item"><img src="' + path + itemData + '"></div></a>');
            //             i++;
            //         });


            //         $('#456').show();
            //         $('#original_2').hide();
            //         $('#456').html('<div id="testing1" class="doctor-s-slides owl-carousel owl-theme"></div>');
            //         var i = 1;
            //         var highh = 'image_';
            //         jQuery.each(data.image_2, function(index, itemData) {
            //             $("#testing1").append('<a href="' + path + data.high_2[highh + i] + '"><div class="item"><img src="' + path + itemData + '"></div></a>');
            //             i++;
            //         });

            //         $('#789').show();
            //         $('#original_3').hide();
            //         $('#789').html('<div id="testing2" class="doctor-s-slides owl-carousel owl-theme"></div>');
            //         var i = 1;
            //         var highh = 'image_';
            //         jQuery.each(data.image_3, function(index, itemData) {
            //             $("#testing2").append('<a href="' + path + data.high_3[highh + i] + '"><div class="item"><img src="' + path + itemData + '"></div></a>');
            //             i++;
            //         });

            //         if (data.heading_1 != '') {
            //             $('h2#heading_1').show();
            //             $('h2#heading_1').html(data.heading_1);
            //         } else {
            //             $('h2#heading_1').hide();
            //         }

            //         if (data.description_1 != '') {
            //             $('#description_1').show();
            //             $('#description_1').html(data.description_1);
            //         } else {
            //             $('#description_1').hide();
            //         }



            //         if (data.heading_2 != '') {
            //             $('h2#heading_2').show();
            //             $('h2#heading_2').html(data.heading_2);
            //         } else {
            //             $('h2#heading_2').hide();
            //         }

            //         if (data.description_2 != '') {
            //             $('#description_2').show();
            //             $('#description_2').html(data.description_2);
            //         } else {
            //             $('#description_2').hide();
            //         }



            //         if (data.heading_3 != '') {
            //             $('h2#heading_3').show();
            //             $('h2#heading_3').html(data.heading_3);
            //         } else {
            //             $('h2#heading_3').hide();
            //         }

            //         if (data.description_3 != '') {
            //             $('#description_3').show();
            //             $('#description_3').html(data.description_3);
            //         } else {
            //             $('#description_3').hide();
            //         }

            //         $('.doctor-s-slides.owl-carousel').owlCarousel({
            //             loop: true,
            //             margin: 10,
            //             autoplay: false,
            //             autoplayTimeout: 3000,
            //             responsiveClass: true,
            //             dots: false,
            //             nav: true,
            //             responsive: {
            //                 0: {
            //                     items: 1,
            //                     nav: true
            //                 },
            //                 600: {
            //                     items: 1,
            //                     nav: true
            //                 },
            //                 1000: {
            //                     items: 1,
            //                     nav: true,
            //                     loop: true
            //                 }
            //             }
            //         });
            //         $('.doctor-s-slides').each(function() {
            //             $(this).magnificPopup({
            //                 delegate: 'a', // the selector for gallery item
            //                 type: 'image',
            //                 gallery: {
            //                     enabled: true
            //                 }
            //             });
            //         });
            //     }
            // });

            // });




            // $("#name").bind('keyup', function(e) {
            //     if (e.which >= 97 && e.which <= 122) {
            //         var newKey = e.which - 32;
            //         // I have tried setting those
            //         e.keyCode = newKey;
            //         e.charCode = newKey;
            //     }

            //     $('#name').val(function() {
            //         return this.value.toUpperCase();
            //     })
            // });
        </script>
        <script>
            // $('.doctor-s-slides').each(function() { // the containers for all your galleries
            //     $(this).magnificPopup({
            //         delegate: 'a', // the selector for gallery item
            //         type: 'image',
            //         gallery: {
            //             enabled: true
            //         }
            //     });
            // });
        </script>
        <!-- <script>
            $(function() {
                var category = $('#type_category').val();
                $("#form").validate({
                    rules: {
                        type_category: {
                            required: true,
                        },
                        name: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true,
                            remote: {

                                url: "<?php //echo site_url("check_become_partners_email_exist_or_not"); 
                                        ?>",

                                type: "POST",

                                data: {

                                    category: function() {
                                        return $('#type_category').val();
                                    },
                                    //category:category
                                }
                            }

                        },
                        number: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            number: true,
                            remote: {
                                url: "<?php //echo site_url("check_become_partners_mobile_exist_or_not"); 
                                        ?>",
                                type: "POST",
                                data: {

                                    category: function() {
                                        return $('#type_category').val();
                                    },
                                }
                            }
                        },
                        pwd: {
                            required: true,
                        },
                        confirmpwd: {
                            required: true,
                            equalTo: "#pwd"
                        },
                        accept: {
                            required: true,
                        },
                    },
                    messages: {
                        type_category: {
                            required: "Please Select Category",
                        },
                        name: {
                            required: "Please Enter Name",
                        },
                        email: {
                            required: "Please Enter Email Id",
                            email: "Please Enter Valid Email Id",
                            remote: "This Email Id Is Already Exist!",

                        },
                        number: {
                            required: "Please Enter Mobile Number",
                            number: "Please Your Number Only",
                            remote: "This Mobile Number Is Already Exist!",
                        },
                        pwd: {
                            required: "Please Enter Password",
                        },
                        confirmpwd: {
                            required: "Please Enter Confirm-Password",
                        },
                        accept: {
                            required: "Please Accept terms & conditions",
                        },
                    },
                    submitHandler: function(form) {

                        form.submit();
                    }
                });
            });
        </script> -->
</body>

</html>