<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12">
                    <h2 class="full_width job-post-title"><?= $page_title; ?></h2>
                </div>
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="mt-22">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $page_title?></li>
                        </ol>
                    </nav>
                </div>
                <div class="full_width contact-us">
                    <?php if (validation_errors()) {   
                        echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Warning!</strong> ';
                        echo validation_errors();
                        echo '</div>';
                        }?>
                    <form class="form" method="post" id="form" name="form" action="<?= base_url().'admin/saveSetting' ?>" accept-charset="utf-8" enctype="multipart/form-data">
                        <!-- Start Site Setting -->
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Description<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="description"><?php echo $site_setting->site_description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Help-Line Number<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Enter Number" value="<?= $site_setting->help_line; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Support Email Id<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" id="email" value="<?= $site_setting->header_email; ?>" placeholder="Enter Email id"></div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Header logo<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="file" name="headerlogo" id="headerlogo" class="dropify" accept="image/*" />
                            </div>
                            <div class="col-md-5">
                                <?php $returnpath = $this->config->item('site_images_uploaded_path');{ ?>
                                <img src="<?php echo $returnpath.$site_setting->header_logo; ?>" class="round" alt="image" height="50px" width="120px">
                                <?php } ?>   
                            </div>
                        </div>
                        <hr>
                        <h5>Contact-Us Setting </h5>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Main-Area Name<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="main_address" value="<?= $site_setting->main_address; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Full Address<span class="error">*</span></label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="address"><?= $site_setting->address; ?></textarea> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">City<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="city" value="<?= $site_setting->city; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Contact No<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="contact_mobile" value="<?= $site_setting->contact_no; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Contact EMail<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="contact_email" value="<?= $site_setting->contact_email; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Brand Offices<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="brand_offices" value="<?= $site_setting->brand_offices; ?>">
                            </div>
                        </div> 
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Work Hours<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="work_hours" value="<?= $site_setting->work_hours; ?>">
                            </div>
                        </div> 
                        <!-- End Contact-Us Setting -->
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("site-setting"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace( 'description');
</script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>
<script>
    $(function() {
        jQuery.validator.addMethod("maskedPhone", function (value, element) {
          return this.optional(element) || /[+]{1}[1]{1} [(0-9)]{5}-[0-9]{3}-[0-9]{4}/.test(value);
        }, "Please enter valid number.");
        $("#form").validate({
        rules: {
            mobile: {required:true,minlength:10,maxlength:15},
            email: {required:true,email:true},
            description: {required:true},
            main_address: {required:true},
            address: {required:true},
            city: {required:true},
            contact_email: {required:true},
            contact_mobile: {required:true},
            work_hours: {required:true},
        },
        messages: {
            mobile: {
                required:"Please Enter Mobile number",
                number:"Please enter number only",
            },
            email: {
                required:"Please Enter Email",
                email:"Please enter valid email",
            },
            description: {required:"Please Enter Description"},
            main_address: {required:"Please Enter Main Area name"},
            address: {required:"Please Enter Address"},
            city: {required:"Please Enter City"},
            contact_email: {required:"Please Enter Contact Email"},
            contact_mobile: {required:"Please Enter Contact Mobile No"},
            work_hours: {required:"Please Enter Work-Hours"},
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>