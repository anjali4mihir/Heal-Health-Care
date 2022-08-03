<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Heal – Health & Medical</title><?php $this->load->view('front/common_css'); ?>
</head>

<body>
    <div class="wrapper home-default-wrapper"><?php $this->load->view('front/common_header'); ?><main class="main-content site-wrapper-reveal"><?php $returnpath = $this->config->item('security_images_uploaded_path'); ?><section class="page-title-area bg-img bg-img-top" data-bg-img="<?= $returnpath . $cms_page->banner; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 m-auto">
                            <div class="page-title-content content-style2 text-center">
                                <h4 class="title secu-title"><?= $cms_page->page_title; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="security_section_one">
                <div class="container">
                    <h2><?= $cms_page->security_title; ?></h2>
                    <div class="row"><?php if (count($cms_page_images) > 0) {
                                            foreach ($cms_page_images as $key => $value) { ?><div class="col-md-4"><img src="<?= $returnpath . $value; ?>" alt="demo"></div><?php }
                                                                                                                                                                                                    } ?></div>
                    <div class="listing-security"><?= $cms_page->security_points; ?></div>
                </div>
            </section>
            <section class="security-sec-new">
                <div class="container">
                    <h2><?= $cms_page->ISO_title; ?></h2><img src="<?= $returnpath . $cms_page->ISO_logo; ?>" alt="demo">
                    <p><?= $cms_page->ISO_description; ?></p>
                </div>
            </section>
            <section class="security_section_two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="pesent_detail border">
                                <h4>Data security for patients</h4><?= $cms_page->security_patients; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pesent_detail">
                                <h4>Data security for Medical Professionals</h4><?= $cms_page->security_medical; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="security_sec_five">
                <div class="container">
                    <h2>Secure platform for Medical professionals</h2>
                    <div class="security_info_image"><img src="assets/img/securities-1.png" alt="demo"></div>
                </div>
            </section>
            <section class="security_sec_six">
                <div class="container">
                    <div class="row"><?php if (count($security_features) > 0) {
                                            foreach ($security_features as $key => $value) { ?><div class="col-md-6 row-eq-height">
                                    <div class="sec-six-box"><?php if ($value->file != '') { ?><img src="<?= $returnpath . $value->file; ?>" alt="demo"><?php } ?><h4><?= $value->name; ?></h4>
                                        <p><?= $value->details; ?></p>
                                    </div>
                                </div><?php }
                                        } ?></div>
                </div>
            </section>
            <section class="security-faq">
                <div class="container">
                    <h2>FAQs</h2>
                    <p>What is @Heal View on data security and Privacy</p>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="faqs-left">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Lorem Ipsum?</button></h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente eaproident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> What is Lorem Ipsum? #2</button></h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente eaproident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">What is Lorem Ipsum? #3</button></h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente eaproident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What is Lorem Ipsum? #4</button></h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                            <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente eaproident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingFive">
                                            <h5 class="mb-0"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">What is Lorem Ipsum? #5</button></h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente eaproident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="Faq-image"><img src="<?php echo base_url(); ?>assets/img/faq-1.png" alt="demo"></div>
                        </div>
                    </div>
                </div>
            </section>
        </main><?php $this->load->view('front/common_footer'); ?><?php $this->load->view('front/common_js'); ?>
</body>

</html>