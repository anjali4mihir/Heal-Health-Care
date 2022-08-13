<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <h2 class="full_width job-post-title"><?= $page_title; ?></h2>
                <div class="full_width contact-us">
                    <?php if (validation_errors()) {   
                        echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Warning!</strong> ';
                        echo validation_errors();
                        echo '</div>';
                        } ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Name<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"placeholder="Enter Testimonial Name" value="<?php echo $testimonials_records->name; ?>"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Position<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="position"placeholder="Enter Position Title" value="<?php echo $testimonials_records->position; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Country</label>
                            <div class="col-md-10">
                                <select class="form-control" name="country" id="country">
                                    
                                    <?php foreach($country as $row){ ?>
                                    <option value="<?php echo $row->id;?>" <?php if($row->id==$testimonials_records->country){echo "selected='selected'";} ?>>
                                        <?php echo $row->name;?></option>
                                    <?php  } ?>
                                </select>  
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">State</label>
                            <div class="col-md-10">
                                <select class="form-control" name="state" id="state">
                                    <option value="<?php if($statename != ''){ echo $testimonials_records->state; } ?>"><?php if($statename != ''){ echo $statename; }else{ echo 'Select State';}?></option>
                                </select>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">City</label>
                            <div class="col-md-10">
                                <select class="form-control" name="city" id="city">
                                <option value="<?php if($cityname != ''){echo $testimonials_records->city; }?>"><?php if($cityname != ''){echo $cityname; }else{echo 'Select City'; }?></option> 
                                </select>  
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="address" id="address" placeholder="Address"><?php echo $testimonials_records->address; ?></textarea>  
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Details<span class="error">*</span></label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="details"><?php echo $testimonials_records->details; ?></textarea>
                                <p id="description_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="file" name="file" id="file" class="dropify"
                                    accept="image/*" />
                            </div>
                            <?php  $returnpath = $this->config->item('banner_images_uploaded_path'); ?>
                            <div class="col-md-5">
                                <img src="<?php echo $returnpath.$testimonials_records->file; ?>" id="image" class="img-thumbnail" height="100" width="100" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status<span class="error">*</span></label>
                            <div class="input-field col s12">
                                 <input type="checkbox" class="js-switch" id="indeterminate-checkbox" name="status" <?php echo ($testimonials_records->status=='1')? "checked" : ""; ?> />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2"></div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("testimonials"); ?>" class="btn btn-primary">Cancel</a>
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

        $("#form").validate({
        rules: {
            name: {required:true},
            position: {required:true},
            details: {required:true},
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
<script type="text/javascript">
$("#country").change(function() {
    var ajaxurl = "<?= base_url();?>";
    var id = $(this).val();
    $.ajax({
            method: "POST",
            url: ajaxurl + 'get-state',
            data:{id:id }
        })
    .done(function(msg) {
        
        if (msg != '') {
            $("#state").html(msg);
        }
    });
});
$("#state").change(function() {
    var ajaxurl = "<?= base_url();?>";
    var id = $(this).val();
    $.ajax({
            method: "POST",
            url: ajaxurl + 'get-city',
            data: { id: id }
        })
        .done(function(msg) {
            //  alert(msg);
            if (msg != '') {
                $("#city").html(msg);
            }
        });
});
</script>