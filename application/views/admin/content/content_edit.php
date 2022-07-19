<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12"><h2 class="full_width job-post-title"><?= $title; ?></h2></div>
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="mt-22">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?= base_url().'my-dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url().'content';?>">Content</a></li>
                        </ol>
                    </nav>
                </div>
                <?php
                $path = $this->config->item('content_images_uploaded_path');
                $image_1 = json_decode($con_list['image_1']);
                $image_2 = json_decode($con_list['image_2']);
                $image_3 = json_decode($con_list['image_3']);
                $high_1 = json_decode($con_list['highlighted_image_1']);
                $high_2 = json_decode($con_list['highlighted_image_2']);
                $high_3 = json_decode($con_list['highlighted_image_3']);
                ?>
                <div class="full_width contact-us">
                    <?php if (validation_errors()) {   
                        echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Warning!</strong> ';echo validation_errors();echo '</div>';} ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <?php if($con_list['main_heading']){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Main Heading<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="main_heading" id="main_heading" readonly value="<?= strtoupper($con_list['main_heading']);?>"> 
                            </div>  
                        </div>
                        <?php } ?>
                        <?php if($con_list['main_image']){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Main Image<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="main_image" id="main_image"> 
                            </div>  
                        </div>
                        <div class="form-group m-t-40 row">
                             <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Selected Image</label>
                             <div class="col-md-9">
                            <img src="<?php echo $path.$con_list['main_image']; ?>" height="100" width="100">
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">highlight image-1<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="high_1[]" multiple/> 
                            </div>  
                        </div>
                        <div class="form-group m-t-40 row">
                             <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Selected Image</label>
                             <div class="col-md-9">
                                <?php foreach ($high_1 as $value){ ?>
                            <img src="<?php echo $path.$value; ?>" height="100" width="100">
                            <?php } ?>
                            </div>
                        </div>
                        
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Image-1<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="image_1[]" id="image_1" multiple> 
                            </div>  
                        </div>
                        <div class="form-group m-t-40 row">
                             <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Selected Image</label>
                             <div class="col-md-9">
                            <?php foreach ($image_1 as $value){ ?>
                                <img src="<?php echo $path.$value; ?>" height="100" width="100">
                            <?php } ?>  
                            </div>
                        </div>
                        
                        <?php if($con_list['heading_1']){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Heading-1<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="heading_1" id="heading_1" value="<?= strtoupper($con_list['heading_1']);?>"> 
                            </div>  
                        </div>
                        <?php } ?>
                        <?php if($con_list['description_1']){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Description-1<span class="error">*</span></label>
                            <div class="col-md-9">
                                <textarea name="description_1" id="description_1" rows="5" class="form-control"><?= strtoupper($con_list['description_1']);?></textarea> 
                            </div>  
                        </div>
                        <?php } ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">highlight image-2<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="high_2[]" multiple/> 
                            </div>  
                        </div>
                        <div class="form-group m-t-40 row">
                             <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Selected Image</label>
                             <div class="col-md-9">
                                <?php foreach ($high_2 as $value){ ?>
                            <img src="<?php echo $path.$value; ?>" height="100" width="100">
                            <?php } ?>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Image-2<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="image_2[]" id="image_2" multiple> 
                            </div>  
                        </div>
                        <div class="form-group m-t-40 row">
                             <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Selected Image</label>
                             <div class="col-md-9">
                            <?php foreach ($image_2 as $value){ ?>
                                <img src="<?php echo $path.$value; ?>" height="100" width="100">
                            <?php } ?>  
                            </div>
                        </div>
                        
                        <?php if($con_list['heading_2']){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Heading-2<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="heading_2" id="heading_2" value="<?= strtoupper($con_list['heading_2']);?>"> 
                            </div>  
                        </div>
                        <?php } ?>
                        <?php if($con_list['description_2']){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Description-2<span class="error">*</span></label>
                            <div class="col-md-9">
                                <textarea name="description_2" id="description_2" rows="5" class="form-control"><?= strtoupper($con_list['description_2']);?></textarea> 
                            </div>  
                        </div>
                        <?php } ?>
                        <?php
                        if($con_list['image_3']){
                         ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">highlight image-3<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="high_3[]" multiple/> 
                            </div>  
                        </div>
                        <div class="form-group m-t-40 row">
                             <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Selected Image</label>
                             <div class="col-md-9">
                                <?php foreach ($high_3 as $value){ ?>
                            <img src="<?php echo $path.$value; ?>" height="100" width="100">
                            <?php } ?>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Image-3<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" name="image_3[]" id="image_3" multiple/> 
                            </div>  
                        </div>
                        <div class="form-group m-t-40 row">
                             <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Selected Image</label>
                             <div class="col-md-9">
                            <?php foreach ($image_3 as $value){ ?>
                                <img src="<?php echo $path.$value; ?>" height="100" width="100">
                            <?php } ?>  
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($con_list['heading_3']){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Heading-3<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="heading_3" id="heading_3" value="<?= strtoupper($con_list['heading_3']);?>"> 
                            </div>  
                        </div>
                        <?php } ?>
                        <?php if($con_list['description_3']){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Description-3<span class="error">*</span></label>
                            <div class="col-md-9">
                                <textarea name="description_3" id="description_3" rows="5" class="form-control"><?= strtoupper($con_list['description_3']);?></textarea> 
                            </div>  
                        </div>
                    <?php } ?>
                        
                       
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("content"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>

<script>
    $(function() {
        
        $("#form").validate({
        rules: {
            heading_1: {required:true},
            heading_2: {required:true},
            heading_3: {
                required:true
            },
            description_1: {required:true},
            description_2: {required:true},
            description_3: {required:true},
            },
        messages: {
            heading_1: "Heading-1 is required",
            heading_2: "Heading-2 is required",
            heading_3: "Heading-3 is required",
            description_1: "Description-1 is required",
            description_2: "Description-2 is required",
            description_3: "Description-3 is required",
            
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>