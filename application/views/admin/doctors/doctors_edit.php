<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12"><h2 class="full_width job-post-title"><?= $page_title; ?></h2></div>
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="mt-22">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url().'doctors';?>">Doctors</a></li>
                            <li class="breadcrumb-item active"><?= $action?></li>
                        </ol>
                    </nav>
                </div>
                <div class="full_width contact-us">
                    <?php if (validation_errors()) {echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Warning!</strong> ';echo validation_errors();
                        echo '</div>';} ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Name
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"placeholder="Enter Testimonial Name" value="<?php echo $doctors_records->name; ?>"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Position
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="<?php echo $doctors_records->position; ?>" name="position"placeholder="Enter Position Title"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Details<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="details"><?php echo $doctors_records->details; ?></textarea>
                                <p id="description_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image
                                <span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="file" name="file" id="file" class="dropify" accept="image/*" />
                            </div>
                            <?php  $returnpath = $this->config->item('banner_images_uploaded_path'); ?>
                            <div class="col-md-5">
                                <img src="<?php echo $returnpath.$doctors_records->file; ?>" id="image" class="img-thumbnail" height="100" width="100" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status
                                <span class="error">*</span></label>
                            <div class="input-field col s12">
                                 <input type="checkbox" class="js-switch" id="indeterminate-checkbox" name="status" <?php echo ($doctors_records->status=='1')? "checked" : ""; ?> />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("doctors"); ?>" class="btn btn-primary">Cancel</a>
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
CKEDITOR.replace( 'details',{
    filebrowserUploadUrl: "<?= base_url();?>cmspage/upload",
    filebrowserUploadMethod: 'form',
    allowedContent :true
});
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
            name: {required:true},
            position: {required:true},
            details: {required:true}
        },
        messages: {
            name: {required:"Please Enter Testimonial Name"},
            position: {required:"Please Enter Testimonial Position"},
            details: {required:"Please Enter Testimonial Details"},
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>