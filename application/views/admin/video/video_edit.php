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
                        }
                    ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Name
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name" value="<?php echo $video_records['name']; ?>"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Link
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input type="url" name="link" class="form-control" id="link" placeholder="Enter Link" value="<?php echo $video_records['link']; ?>">
                            </div>
                        </div>
                       <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status
                                <span class="error">*</span></label>
                            <div class="input-field col s12">
                                 <input type="checkbox" class="js-switch" id="indeterminate-checkbox" name="status" <?php echo ($video_records['status']=='1')? "checked" : ""; ?> />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("videos"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>
<script>
    $(function() {

        $("#form").validate({
        rules: {
            name: {
                required:true,
            },
            link: {
                required:true,
            },
        },
        messages: {
            name: {
                required:"Please Enter Name",
            },
            link: {
                required:"Please Enter Youtube Video Link",
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>
