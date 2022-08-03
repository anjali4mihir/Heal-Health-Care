<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <h2 class="full_width job-post-title"><?= $page_title; ?></h2>
                <div class="full_width contact-us">
                    <?php if (isset($error)) {echo $error;}echo $this->session->flashdata("message");?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <h5 class="mt-2">Page Head</h5><hr>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Page Title<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="page_title" name="page_title" value="<?= $cms_page->page_title; ?>"></input>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Banner<span class="error">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" id="banner" name="banner"></input>
                            </div>
                            <?php if($cms_page->banner != ''){ ?> 
                            <div class="col-md-3">
                                <?php $returnpath = $this->config->item('security_images_uploaded_path'); ?>
                                <img src="<?= $returnpath.$cms_page->banner; ?>" class="round" alt="image" height="50px" width="120px">
                            </div>
                            <?php } ?>
                        </div>
                        <h5 class="mt-5">Security Section</h5>
                        <hr>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Title<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="security_title" name="security_title" value="<?= $cms_page->security_title; ?>"></input>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Security Logos<span class="error">*</span>
                            </label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" id="security_logo" name="security_logo[]" multiple></input>
                            </div>
                            <?php  $returnpath = $this->config->item('security_images_uploaded_path'); ?>
                            <?php if(count($cms_page_images) > 0){ 
                                foreach($cms_page_images as $key => $value) { ?>
                            <div class="col-md-1">
                                <img src="<?php echo $returnpath.$value; ?>" class="img-thumbnail" height="120" width="70" />
                            </div>
                            <?php } } ?>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Security Points<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="security_points" name="security_points"><?= $cms_page->security_points; ?></textarea>
                            </div>
                        </div>
                        <h5 class="mt-5">ISO Certified Details</h5>
                        <hr>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Title<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="ISO_title" name="ISO_title" value="<?= $cms_page->ISO_title; ?>"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                class="col-lg-2 col-md-2 col-sm-2 col-form-label">ISO Logo
                                <span class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <input type="file" name="ISO_logo" id="ISO_logo" class="form-control" accept="image/*" />
                            </div>
                            <?php if($cms_page->ISO_logo != ''){ ?> 
                            <div class="col-md-3">
                                <?php $returnpath = $this->config->item('security_images_uploaded_path'); ?>
                                <img src="<?= $returnpath.$cms_page->ISO_logo; ?>" class="round" alt="image" height="50px" width="120px">
                            </div>
                            <?php } ?>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">ISO Description<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="ISO_description" name="ISO_description"><?= $cms_page->ISO_description; ?></textarea>
                            </div>
                        </div>
                        <h5 class="mt-5">Data Security</h5>
                        <hr>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Data security for patients<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="security_patients" name="security_patients"><?= $cms_page->security_patients; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Data Security for Medical Professionals<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="security_medical" name="security_medical"><?= $cms_page->security_medical; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" id="save_button" class="btn btn-success">Update</button>
                                <a href="<?= base_url("cmspage"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('security_points');
CKEDITOR.replace('ISO_description');
CKEDITOR.replace('security_medical');
CKEDITOR.replace('security_patients');
</script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>
<script>
  $(function() {
    $("#form").validate({
        rules: {
            page_title:{required:true},
            banner:{extension: "jpg|jpeg|png"},
            security_title:{required:true},
            security_logo:{extension: "jpg|jpeg|png"},
            security_points:{required:true},
            ISO_logo:{extension: "jpg|jpeg|png"},
            ISO_title:{required:true},
            ISO_description:{required:true},
            security_patients:{required:true},
            security_medical:{required:true}
        },
        messages: {
            page_title:{required:"Please enter Page Title"},
            security_title:{required:"Please enter Title"},
            security_points:{required:"Please enter description"},
            ISO_description:{required:"Please enter description"},
            security_patients:{required:"Please enter description"},
            security_medical:{required:"Please enter description"},
        },
        submitHandler: function(form) {
          form.submit();
        }
    });
});
</script>