<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12"><h2 class="full_width job-post-title"><?= $page_title; ?></h2></div>
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="mt-22">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url().'message_languages';?>">Message Languages</a></li>
                            <li class="breadcrumb-item active"><?= $action?></li>
                        </ol>
                    </nav>
                </div>
                <div class="full_width contact-us">
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">
                                Add Message<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="message" id="message" placeholder="Enter Message"></div>
                            </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">
                                Add Message Key<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="message_key" id="message_key" placeholder="Enter Message Key"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("message_languages"); ?>" class="btn btn-primary">Cancel</a>
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
CKEDITOR.replace( 'description',{
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
            message: {required:true},
            message_key: {required:true,
                remote: {
                    url: "<?php echo base_url(); ?>message_languages/Register_message",
                    type: "POST",
                    data: {
                        message: function(){ return $("#message").val(); }
                            }
                    }
            }
        },
        messages: {
            message: {required: "Please Enter message"},
            message_key: {
                required: "Please Enter message",
                remote: "message key is already exist",
            }
        },
    });
});
</script>