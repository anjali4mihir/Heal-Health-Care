<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title><?= $page_title; ?></title>
    <style>
    .userform label {
        width: 120px;
        color: #333;
        float: left;
    }
    input.error {
        border: 1px solid red;
    }
    label.error {
        width: 100%;
        color: red;
        font-style: normal !important;
        margin-left: 0px !important;
        margin-bottom: 5px;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php $this->load->view('front/common_css'); ?>
</head>
<body><div class="wrapper"><div class="preloader-wrap"><div class="preloader"><span class="dot"></span><div class="dots"><span></span><span></span><span></span></div></div></div><main class="main-content site-wrapper-reveal"><section class="login"><div class="container"><div class="login-form"><div class="close-btn" id="close">+</div><img src="<?= base_url() ?>assets/img/logo-2.png"><form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="row">
                                <?php if(isset($error)){ echo $error; }
                                   echo $this->session->flashdata("message"); ?>
                                <div class="col-md-12">
                                    <div class="form-group logo-in">
                                        <i class="icofont-rounded-down"></i>
                                        <select name="type_category" id="type_category" class="form-control select2">
                                            <option value="">Select Your Category</option>
                                            <?php foreach($parent_services as $row){ if($row->id <= 3){?>
                                            <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                            <?php  }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <i class="icofont-envelope"></i>
                                        <input type="email" class="form-control" placeholder="Enter Email Id" id="email"
                                            name="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <i class="icofont-ui-password"></i>
                                        <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" autocomplete="off">
                                        <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span class="pull-left"><a href="#"></a></span>
                                    <span class="pull-right"><a href="<?= base_url().'partners/forget-password' ?>"><i class="icofont-lock mr-1"></i> Forgot password?</a></span>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="book-now-btn form_btn" name="save_button"
                                        id="save_button" class="btn-primary" value="Login">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <?php $this->load->view('front/common_js'); ?>
    <script>
    $(document).ready(function() {
        $('#error').delay(3000).fadeOut();
        $("#close").on('click',function(){
            window.location.href = "<?php  echo site_url(); ?>";
        });
        $(".toggle-password").on('click', function() {
              $(this).toggleClass("fa-eye fa-eye-slash");
              var input = $("#password");
              if (input.attr("type") === "password") {
                input.attr("type", "text");
              } else {
                input.attr("type", "password");
            }
        });
    });
    </script>
    <script>
    $(function() {
        $("#form").validate({
            rules: {
                type_category: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
            },
            messages: {
                type_category: { required: "Please Select Category"},
                email: { required: "Please Enter Email Id"},
                password: {required: "Please Enter password"},
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    </script>
</body>
</html>