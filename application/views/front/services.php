<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>Heal – Health & Medical</title><?php $this->load->view('front/common_css'); ?></head><body><div class="wrapper home-default-wrapper"><?php $this->load->view('front/common_header'); ?><main class="main-content site-wrapper-reveal"><section class="page-title-area bg-img bg-img-top" data-bg-img="<?=base_url(); ?>assets/img/slider/main-slide-01.jpg"><div class="container"><div class="row"><div class="col-lg-6 col-xl-7 m-auto"><div class="page-title-content content-style2 text-center"><p>Best solution for your heatlh</p><h4 class="title">Services <span>That We Provide</span></h4></div></div></div></div></section><?php if(count($services_list) > 0){?><section class="service-area"><div class="container"><div class="row"><div class="col-lg-12"><div class="section-title text-center"><p>Our services</p><h2 class="title"><span>Best Solution</span> For Your Health</h2></div></div></div><div class="row"><div class="col-lg-12"><div class="row service-style2"><?php foreach ($services_list as $key => $value){ $returnpath = $this->config->item('service_images_uploaded_path'); ?><div class="col-sm-6 col-md-6 col-lg-3 service-item"><div class="icon"><img src="<?= $returnpath.$value->iconimg; ?>" height="46px" width="46px"></div><div class="content"><h5 class="service-name"><?= $value->title ?></h5><p><?= $value->short_desc; ?></p><a class="btn-link" href="<?= base_url().'services/'.$value->slug ?>">More <i class="icofont-simple-right"></i></a></div></div><?php } ?></div></div></div></div></section><?php } ?><?php if(count($testimonials) > 0){?><section class="testimonial-area testimonial-default-area bg-img" data-bg-img="<?= base_url() ?>assets/img/photos/testimonial-bg1.jpg"><div class="container"><div class="row"><div class="col-lg-12"><div class="section-title text-center"><h2 class="title"><span>Our</span> Doctors</h2></div></div></div><div class="row"><div class="col-lg-12"><div class="swiper-container testimonial-slider-container"><div class="swiper-wrapper testimonial-slider"> <?php foreach ($testimonials as $key => $value){ $returnpath = $this->config->item('banner_images_uploaded_path'); ?><div class="swiper-slide testimonial-item"><div class="thumb"><img src="<?= $returnpath.$value->file; ?>" alt="Image" /></div><div class="client-content"><?= $value->details; ?></div><div class="client-info"><div class="desc"><h4 class="name"><?= $value->name; ?></h4><p class="client-location"><?= $value->position; ?></p></div></div></div><?php } ?></div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div></div></div></div></section><?php } ?><?php if(count($speciality) > 0){?><div class="speciality-area pb-100"><div class="container-fluid p-0"><div class="row m-0"><div class="col-lg-7"><div class="speciality-left"><div class="section-title-two"><span>Speciality</span><h2>Our Expertise</h2></div><div class="speciality-item"><div class="row m-0"><?php foreach ($speciality as $key => $value){ ?><div class="col-sm-6 col-lg-6"><div class="speciality-inner"><i class="icofont-check-circled"></i><h3><?= $value->title ?></h3><p><?= $value->details ?></p></div></div><?php } ?></div></div></div></div><div class="col-lg-5 pr-0"><div class="speciality-item speciality-right"><img src="/images/about4.jpg" alt="Speciality"></div></div></div></div></div><?php } ?></main><?php $this->load->view('front/common_footer'); ?><?php $this->load->view('front/common_js'); ?></body></html>