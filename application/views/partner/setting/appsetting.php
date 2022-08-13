<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12"><h2 class="full_width job-post-title"><?= $page_title; ?></h2></div>
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="mt-22">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $page_title?></li>
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
                        echo '</div>';}?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Home <?php if($app_setting['category'] == 1){echo 'Delivery';}else{echo 'Sample';} ?>
                            <span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_partners" data-status="is_homesample" data-idfield="id"  data-id="<?php echo $app_setting['id'] ?>" id='cb_<?php echo 
                                $app_setting["id"] ?>'  <?php echo ($app_setting['is_homesample'] == '1') ? "checked" : ""; ?> />
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label"><?php if($app_setting['category'] == 1){echo 'Delivery';}else{ echo 'Sample';} ?> Charge
                            <span class="error">*</span></label>
                            <div class="col-md-2">
                                <input class="form-control" type="text" name="delivery_charge" id="delivery_charge" placeholder="Enter Delivery Charge" value="<?= number_format((float)$app_setting['delivery_charge'], 2, '.', ''); ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <h4 class="mt-5">Invoice Setting</h4>
                        <hr>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Retrurn Policy<span class="error">*</span></label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="return_policy" id="return_policy"><?= $app_setting['return_policy']?></textarea>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("partners/app_setting"); ?>" class="btn btn-primary">Cancel</a>
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
    CKEDITOR.replace( 'return_policy');
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
            delivery_charge: {
                required:true,
                number:true,
            },
        },
        messages: {
            delivery_charge: {
                required:"Please Enter delivery Charge",
                number:"Please enter number only",
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>