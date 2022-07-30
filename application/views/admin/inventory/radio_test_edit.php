<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
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
                            <li class="breadcrumb-item"><a href="<?= base_url().'my-dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url().'pathologyservices';?>">Services</a></li>
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
                        echo '</div>';} ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Name<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Test Name" value="<?= $test_records['name']?>">
                                <input type="hidden" name="testId" id="testId"value="<?= $test_records['id']?>">
                            </div>
                        </div>
                        <!-- <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Category<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="category" id="category" placeholder="Enter Category" value="<?= $test_records['category']?>"> 
                            </div>
                        </div> -->
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-3 col-md-3 col-sm-3 col-form-label">Description<span class="error">*</span></label> 
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description"><?= $test_records['description']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Save</button>
                               <a href="<?= base_url().'inventory/radiology' ?>" class="btn btn-primary">Cancel</a>
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
            name: {
                required:true,
                remote:{
                    url: "<?php echo site_url("check_radio_edit_test_exist_or_not_master"); ?>",
                    type: "POST",
                    data: {
                        name: function(){ return $("#name").val(); },
                        
                        id: function(){ return $("#testId").val(); },
                    }
                }
                
            },
            description: {
                required:true,
            },
            // category: {
            //     required:true,
                
            // },
        },
        messages: {
            name: {
                required:"Please Enter Name",
                remote:"Test is Already Exists"
            },
            
            description: {
                required:"Please Enter Details",
            },
            category: {
                required:"Please Enter Category",
                remote:"Test is Already Exists"
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>