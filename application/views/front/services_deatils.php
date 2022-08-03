<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Heal – Health & Medical</title>
        <?php $this->
        load->view('front/common_css'); ?>
    </head>
    <body>
        <div class="wrapper home-default-wrapper">
            <?php $this->load->view('front/common_header'); ?>
            <main class="main-content site-wrapper-reveal">
                <section class="page-title-area bg-img bg-img-top" data-bg-img="<?=base_url()?>assets/img/slider/main-slide-01.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-xl-7 m-auto">
                                <div class="page-title-content content-style2 text-center">
                                    <p>Service Details Page</p>
                                    <h4 class="title">Services <span>That We Provide</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="department-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="department-wrpp">
                                    <div class="sidebar-wrapper">
                                        <div class="widget-item">
                                            <h4 class="widget-title">Departments</h4>
                                            <div class="widget-side-nav">
                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <?php foreach ($service_list as $key =>
                                                    $value){ ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingOne<?= $value->id ?>">
                                                            <?php if($value->is_parent == 1){ if($value->subcount > 0) { ?>
                                                            <button
                                                                class="accordion-button collapsed"
                                                                type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseOne<?= $value->id ?>"
                                                                aria-expanded="false"
                                                                aria-controls="flush-collapseOne"
                                                            >
                                                                <?= $value->title ?>
                                                            </button>
                                                            <?php } } ?><?php if($value->is_parent == 1){if($value->subcount == 0){ ?>
                                                            <button class="accordion-button collapsed" type="button" onclick="Servicesdetail('<?= $value->slug ?>');"><?= $value->title ?></button>
                                                            <?php } } ?>
                                                        </h2>
                                                        <?php if($value->subcount > 0) { ?>
                                                        <div id="flush-collapseOne<?= $value->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <ul>
                                                                    <?php foreach ($service_list as $key1 =>
                                                                    $value1){ if($value1->parent_id == $value->id){ $class = '';$link1 = base_url().'services/'.$value1->slug ;if($services_deatils->title == $value1->title){ $class =
                                                                    'active'; }?>
                                                                    <li>
                                                                        <a class="<?= $class ?>" href="<?= $link1; ?>"><?= $value1->title ?></a>
                                                                    </li>
                                                                    <?php } } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-item">
                                            <div class="widget-work-hours"><h6 class="title">Working Hours 24/7</h6></div>
                                        </div>
                                    </div>
                                    <div class="department-content">
                                        <h2 class="title"><?= $services_deatils->title?></h2>
                                        <div class="swiper-container department-gallery">
                                            <div class="swiper-wrapper gallery-slider">
                                                <?php foreach ($servicesImage as $key =>
                                                $value){$returnpath = $this->config->item('service_images_uploaded_path'); ?>
                                                <?php if($value->image_url != ''){ 
                                                    if(file_exists($returnpath.$value->image_url)){?>
                                                    <div class="swiper-slide"><img src="<?= $returnpath.$value->image_url; ?>" alt="hope-Image" /></div>
                                                <?php } } ?>
                                                
                                                <?php } ?>
                                            </div>
                                            <div class="swiper-button-prev"><i class="icofont-rounded-left"></i></div>
                                            <div class="swiper-button-next"><i class="icofont-rounded-right"></i></div>
                                        </div>
                                        <div class="content"><?= $services_deatils->description?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php if(count($services) >
                0){?>
                <section class="testimonial-area testimonial-default-area bg-img" data-bg-img="assets/img/photos/testimonial-bg1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title text-center">
                                    <h2 class="title"><span>Our</span> Doctors</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper-container testimonial-slider-container">
                                    <div class="swiper-wrapper testimonial-slider">
                                        <?php foreach ($testimonials as $key =>
                                        $value){ $returnpath = $this->config->item('banner_images_uploaded_path'); ?>
                                        <div class="swiper-slide testimonial-item">
                                            <div class="thumb"><img src="<?= $returnpath.$value->file; ?>" alt="Image" /></div>
                                            <div class="client-content"><?= $value->details; ?></div>
                                            <div class="client-info">
                                                <div class="desc">
                                                    <h4 class="name"><?= $value->name; ?></h4>
                                                    <p class="client-location"><?= $value->position; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php } ?><?php if(count($speciality) >
                0){?>
                <div class="speciality-area pb-100">
                    <div class="container-fluid p-0">
                        <div class="row m-0">
                            <div class="col-lg-7">
                                <div class="speciality-left">
                                    <div class="section-title-two">
                                        <span>Speciality</span>
                                        <h2>Our Expertise</h2>
                                    </div>
                                    <div class="speciality-item">
                                        <div class="row m-0">
                                            <?php foreach ($speciality as $key =>
                                            $value){ ?>
                                            <div class="col-sm-6 col-lg-6">
                                                <div class="speciality-inner">
                                                    <i class="icofont-check-circled"></i>
                                                    <h3><?= $value->title ?></h3>
                                                    <p><?= $value->details ?></p>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 pr-0">
                                <div class="speciality-item speciality-right"><img src="/images/about4.jpg" alt="Speciality" /></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </main>
        </div>
    </body>
</html>
    <?php $this->load->view('front/common_footer'); ?>
    <?php $this->load->view('front/common_js'); ?>
    <script type="text/javascript">
    $('.collapse').collapse();
    </script>
    <script type="text/javascript">
    function Servicesdetail(slug) {
        $class = '';
        window.location.assign("<?= base_url().'services/'?>" + slug);
    }
    </script>
</body></html>