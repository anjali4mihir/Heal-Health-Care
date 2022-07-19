<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= Project_name; ?> | <?= $page_title; ?></title>
    <link rel="shortcut icon" type="<?= base_url() ?>assets/admin/image/x-icon" href="<?= base_url() ?>assets/admin/images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/style.css">
    <?php $this->load->view('front/common_css'); ?>
</head>
<body>
<div class="full_width main_screen lg_sp_section">
    <div class="user_select_section login_signup_section">
        <div class="row flex-row-reverse">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row_eq_height">
                <div class="full_width login_side_one">
                    <img src="<?= base_url() ?>assets/img/logo.png" alt="demo">
                    <p>Please Enter the Email address registered on your account</p>
                    <form class="full_width"  method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php if (validation_errors()){ echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert"><i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Warning!</strong> ';
                                echo validation_errors();
                                echo '</div>';}?>
                            <?php if($error != ''){ echo $error;} ?>
                            <div class="alert alert-danger icons-alert" style="margin-bottom: 0px; display: none;" id="error">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 9px;">=<i class="icofont icofont-close-line-circled"></i>=</button>
                                <p style="font-weight: bold; margin: 9px 0;" id="error-message">=</p>
                            </div>
                            <div class="alert alert-success icons-alert" style="margin-bottom: 0px; display: none;" id="success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 9px;">=<i class="icofont icofont-close-line-circled"></i>=</button>
                                <p style="font-weight: bold; margin: 0px 0;padding-bottom:0;">Login Successfull...</p>
                            </div>
                        <div class="full_width form-group">
                            <label>Email address</label>
                            <input class="form-control" type="text" placeholder="Enter Email Id" id="email" name="email" autocomplete="off" />
                        </div>
                        <div class="full_width form-group">
                            <input type="submit" class="buttn" name="save_button" id="save_button" class="btn-primary" value="GET Email">
                            <span class="pull-right"><a href="<?= base_url().'admin/login' ?>">Login?</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/main.js"></script>
<?php $this->load->view('front/common_js'); ?>
<script>
    $(function() {
        $("#form").validate({
        rules: {
            email: {
                required:true,
                email: true 
            },
        },
        messages: {
            email: {required:"Please Enter Email Id"}
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>
</body>
</html>