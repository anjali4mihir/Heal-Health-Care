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
                        }?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Select Langauge
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <select id="language" name="language" class="form-control">
                                    <option name="" id="" value="">-- Select Language ---</option>
                                      <?php if(count($language)>0) {
                                       foreach($language as $k=>$cd) {
                                        ?>
                                        <option name="<?php echo $cd->id; ?>" id="<?php echo $cd->id; ?>" value="<?php echo $cd->id; ?>"  <?php if($records->language_id == $cd->id) { echo "selected"; } ?>  ><?php echo ucwords($cd->language); ?></option>
                                     <?php } } ?>   
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Title
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"placeholder="Enter Title" value="<?php echo $records->name; ?>"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Details<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="details"><?php echo $records->details; ?></textarea>
                                <p id="description_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="file" name="file" id="file" class="dropify"  accept="image/*" />
                            </div>
                            <?php  $returnpath = $this->config->item('security_images_uploaded_path'); ?>
                            <div class="col-md-5">
                                <img src="<?php echo $returnpath.$records->file; ?>" id="image" class="img-thumbnail" height="100" width="100" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status
                                <span class="error">*</span></label>
                            <div class="input-field col s12">
                                 <input type="checkbox" class="js-switch" id="indeterminate-checkbox" name="status" <?php echo ($records->status=='1')? "checked" : ""; ?> />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("security_features"); ?>" class="btn btn-primary">Cancel</a>
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
CKEDITOR.replace( 'details');
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
            details: {required:true},
            language: {required:true},
        },
        messages: {
            name: {required:"Please Enter Title"},
            details: {required:"Please Enter Testimonial Details"},
            language: {required:"Please Select Language"}
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>
