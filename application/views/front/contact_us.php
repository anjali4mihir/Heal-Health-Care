<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title>Heal – Health & Medical</title><?php $this->load->view('front/common_css'); ?><style>#map { height: 100%;}</style></head><body><div class="wrapper home-default-wrapper"><?php $this->load->view('front/common_header'); ?><main class="main-content site-wrapper-reveal"><div class="contact-map-area"><div id="map">Hello</div></div><section class="contact-area"><div class="container"><div class="row"><div class="col-lg-12"><div class="contact-info-content"><div class="info-address"><h2 class="title"><?= $site_details->main_address; ?>,<span><?= $site_details->city; ?></span></h2><p><?= $site_details->address; ?></p><a href="https://www.kriprtechmed.com/"><span>Website:</span>https://www.kriprtechmed.com/</a><br/><a href="mailto:<?= $site_details->contact_email; ?>"><span>Email:</span><?= $site_details->contact_email; ?></a></div><div class="brand-office"><div class="info-tem style-two"><h6>Call directly:</h6><p><a style="color:white;font-size:30px;" href="tel:<?= $site_details->contact_no; ?>"><?= $site_details->contact_no; ?></a></p></div><!-- <?php if($site_details->brand_offices != ''){ ?><div class="info-tem"><h6>Head Office:</h6><p><?= $site_details->brand_offices; ?></p></div><?php } ?> --><div class="info-tem mb-0"><h6>Work Hours:</h6><p><?= $site_details->work_hours; ?></p></div></div></div></div></div><div class="row"><div class="col-lg-12"><div class="contact-form"><div class="section-title text-center"><p>Contact</p><h2 class="title"><span> We Always Ready</span> To Help You</h2></div><form class="contact-form-wrapper" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data"><?php if (validation_errors()) { echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning!</strong> '; echo validation_errors();echo '</div>';}?><div class="row"><div class="col-md-4"><div class="form-group"><input class="form-control" type="text" name="con_name" placeholder="Your Name" /></div></div><div class="col-md-4"><div class="form-group"><input class="form-control" type="email" name="con_email" placeholder="Email Address" /></div></div><div class="col-md-4"><div class="form-group"><input class="form-control" type="text" name="con_subject" placeholder="Subject (optional)" /></div></div><div class="col-md-12"><div class="form-group mb-0"><textarea name="con_message" rows="5" placeholder="Write your message here"></textarea></div></div><div class="col-md-12 text-center"><button type="submit" class="book-now-btn form_btn mt-1">Send Message</button></div></div></form></div><div class="form-message"></div></div></div></div></section></main><?php $this->load->view('front/common_footer'); ?></div><?php $this->load->view('front/common_js'); ?></body></html>
<script src="auto-complete.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc&callback=initMap&libraries=&v=weekly"
    async></script>
<script type="text/javascript">
function initMap() {
    const location = {
        lat: 23.0193367,
        lng: 72.5605776
    };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: location,
    });
    const marker = new google.maps.Marker({
        position: location,
        map: map,
    });
}
</script>
<script>
$(function() {
    $("#form").validate({
        rules: {
            con_name: {required: true},
            con_email: {required: true},
            con_message: {required: true}
        },
        messages: {
            con_name: {required: "Please Enter Name"},
            con_email: {required: "Please Enter Email"},
            con_message: {required: "Please Enter message"},
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>