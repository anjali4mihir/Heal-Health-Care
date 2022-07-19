<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>Heal – Health & Medical</title><?php $this->load->view('front/common_css'); ?></head><body><div class="wrapper home-default-wrapper"><?php $this->load->view('front/common_header'); ?><main class="main-content site-wrapper-reveal"><section class="page-title-area bg-img bg-img-top" data-bg-img="assets/img/photos/about-bg1.jpg"><div class="container"><div class="row"><div class="col-lg-9 m-auto"><div class="page-title-content content-style5 text-center"><p><font color="#ed1c24">@</font>Heal App</p><h4 class="title">Privacy Policy<span><font color="#ed1c24">@</font>Heal</span></h4></div></div></div></div></section><section class="page_content"><div class="container"><?= $page_data->desc_web; ?></div></section></main><?php $this->load->view('front/common_footer');?></div><?php $this->load->view('front/common_js'); ?></body></html>
<script type="text/javascript">
if ($(".sticky-header").length) {
    var returnpath = '<?= $returnpath = $this->config->item('site_images_uploaded_path')?>';
    var logo = '<?= $site_details->header_logo?>';
    var windowpos = $(this).scrollTop();
    if (windowpos >= 150) {
        $(".sticky-header").addClass("sticky");
        $(".mobile-sticky").addClass("sticky");
        $(".sticky-img").attr("src", returnpath + logo);
    } else {
        $(".sticky-header").removeClass("sticky");
        $(".mobile-sticky").removeClass("sticky");
        $(".sticky-img").attr("src", returnpath + logo);
    }
}
</script>