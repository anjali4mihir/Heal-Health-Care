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
                            <li class="breadcrumb-item"><a href="<?= base_url().'lable_languages';?>">Lable Languages</a></li>
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
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Lable
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="lable" id="lable" placeholder="Enter lable"
                                 value="<?php echo $hindi_records[0]['title'];?>"> 
                            </div>
                        </div>
                        <?php if($hindi_records[0]['language_id'] == 1 || $hindi_records[0]['language_id'] == '1'){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Lable Key
                                <span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="lable_key" id="lable_key" placeholder="Enter lable Key"
                                value="<?php echo $hindi_records[0]['label_key'];?>"></div>
                        </div>
                        <?php } ?>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("lable_languages"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>
<script>
    $(function() {
        $("#form").validate({
         rules: {
            lable: {required:true}
        },
        messages: {
            lable: {
                required: "Please Enter lable",
                remote: "lable is already register",
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>