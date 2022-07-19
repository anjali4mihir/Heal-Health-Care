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
                            <li class="breadcrumb-item"><a href="<?= base_url().'Services';?>">Services</a></li>
                            <li class="breadcrumb-item active"><?= $action?></li>
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
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Is Parent<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="type" value="<?php if($services_records->is_parent==1){echo 'Yes';}else{echo 'No' ;} ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row <?php if($services_records->is_parent == 1){echo "d-none";} ?>" id="ServicesDiv">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Select Service<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="services" id="services" value="<?= $service_name->title ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Name<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="title" id="title" placeholder="Enter  Name" value="<?= $services_records->title; ?>"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Short Description<span class="error">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" type="text" name="short_desc" value="<?php echo $services_records->short_desc; ?>"><?php echo $services_records->short_desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-3 col-md-3 col-sm-3 col-form-label">Description<span class="error">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description"><?php echo $services_records->description; ?></textarea>
                                <p id="description_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Is Possition<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="possition" id="possition"value="<?php echo $services_records->is_possiotion; ?>"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Image<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input type="file" name="file[]" id="file" multiple="multiple">
                            </div>
                            <div class="col-md-3">
                                <?php $returnpath = $this->config->item('service_images_uploaded_path');
                                if($returnpath != ''){ 
                                    foreach($service_images as $k=>$cd) {?>
                                    <img src="<?php echo $returnpath.$cd->image_url; ?>" class="img-thumbnail" height="70" width="70" /><a href="<?= base_url(); ?>services/service_image/<?= $cd->id ; ?>"> X</a>
                                <?php } } ?>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-password-input" 
                            class="col-lg-3 col-md-3 col-sm-3 col-form-label">Icon-Image In Hindi<span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input type="file" name="file_hindi" id="file_hindi">
                            </div>
                           
                            <?php if(!empty($services_records->image_hindi) ||$services_records->image_hindi != '')
                            { ?>
                                <div class="col-md-6">
                                <?php 
                                $returnpath = $this->config->item('service_images_uploaded_path');
                                ?>
                                <img src="<?php echo $returnpath.$services_records->image_hindi; ?>" class="round" alt="image" height="70px" width="70px">
                                </div>
                            <?php } ?>
                        </div>

                       
                        <div class="form-group row">
                            <label for="example-password-input"
                                class="col-lg-3 col-md-3 col-sm-3 col-form-label">Icon-Image
                                <span class="text-danger">*</span></label>
                            <div class="col-md-3">
                                <input type="file" name="iconfile" id="iconfile" class="dropify" accept="image/*" />
                            </div>
                           
                            <?php if(!empty($services_records->iconimg) ||$services_records->iconimg != '')
                            { ?>
                                <div class="col-md-6">
                                <?php 
                                $returnpath = $this->config->item('service_images_uploaded_path');
                                ?>
                                <img src="<?php echo $returnpath.$services_records->iconimg; ?>" class="round" alt="image" height="70px" width="70px">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Status
                                <span class="error">*</span></label>
                            <div class="input-field col s12">
                                 <input type="checkbox" id="indeterminate-checkbox" name="status" class="js-switch" autocomplete="off" <?php echo ($services_records->status=='1')? "checked" : ""; ?>/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-2">
                            </div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("services"); ?>" class="btn btn-primary">Cancel</a>
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
<script type="text/javascript">
    function hideshowServices()
    {
        if($( "#type option:selected" ).val() == 0)
        {
            $('#ServicesDiv').removeClass('d-none');
        }
        else{
            $('#ServicesDiv').addClass('d-none');
        }
    }
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
            title: {required:true},
            services: {
                required: function(){
                        return $("#type").val() == 0;}
            },
            type: {required:true},
            short_desc: {required:true},
            description: {required:true},
            
            <?php if(count($service_images)>0) { ?>
                "file[]": {required:false},
            <?php } else { ?>
                "file[]": {required:true},
            <?php } ?>

            <?php if(count($service_images_hindi)>0) { ?>
                file_hindi:{required:false},
            <?php } else { ?>
                file_hindi:{required:true},
            <?php } ?>
            
            <?php if(!empty($services_records->iconimg) ||$services_records->iconimg != '')
                            { ?>
                iconfile: {required:false},
            <?php } else { ?>
                iconfile: {required:true},
            <?php } ?>

            
        },
        messages: {
            title: {required:"Please Enter Name"},
            type: {required:"Please Select Type"},
            services: {required:"Please Select Service"},
            short_desc: {required:"Please Enter Short Description"},
            url: {
                required:"Please Enter Url",
                url:"Please Enter Valid Url",
            },
            description: {required:"Please Enter Description"},
            "file[]": {required:"Please Select Image"},
            file_hindi: {required:"Please Select Image"},
            iconfile: {required:"Please Select Icon-Image"},
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>