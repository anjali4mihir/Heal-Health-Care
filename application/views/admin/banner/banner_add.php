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
                            <li class="breadcrumb-item"><a href="<?= base_url().'banner';?>">Banner</a></li>
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
                        } ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Tag
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="tag" id="tag"placeholder="Enter Tag"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Banner Title
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title"placeholder="Enter Banner Title"> 
                                <p id="title_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">URL
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="url"placeholder="Enter Banner URL"> 
                                
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Description<span class="error">*</span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="description"></textarea>
                                <p id="description_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image
                                <span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="file" name="file" id="file" class="dropify"
                                    accept="image/*" />
                            </div>
                            <div class="col-md-5" style="display: none;" id="ViewImageDiv">
                                <img src="#" id="image" class="img-thumbnail" height="100" width="100" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Banner Status
                                <span class="error">*</span></label>
                            <div class="input-field col s12">
                                 <input type="checkbox" id="indeterminate-checkbox" name="status" class="js-switch" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("banner"); ?>" class="btn btn-primary">Cancel</a>
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
        $("#form").validate({
        rules: {
            tag: {required:true},
            title: {required:true},
            url: {
                required:true,
                url:true,
            },
            description: {required:true},
            SelectFile: {required:true},
            file: {required:true},
        },
        messages: {
            tag: {
                required:"Please Enter Tag",
            },
            title: {
                required:"Please Enter Title",
            },
            url: {
                required:"Please Enter Url",
                url:"Please Enter Valid Url",
            },
            description: {
                required:"Please Enter Description",
            },
            file: {
                required:"Please Select Image",
            },
            SelectFile: {
                required:"Please Select Any File Type And Select Image/Video",
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>