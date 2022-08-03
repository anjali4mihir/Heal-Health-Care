<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0" /><title><?= $page_title; ?></title><?php $this->load->view('front/common_css'); ?></head><body><div class="wrapper"><div class="preloader-wrap"><div class="preloader"><span class="dot"></span><div class="dots"><span></span><span></span><span></span></div></div></div><main class="main-content site-wrapper-reveal"><section class="login"><div class="container"><div class="login-form"><img src="<?= base_url() ?>assets/img/logo-2.png"><form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data"><div class="row"><?php if (validation_errors()){  echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Warning!</strong> ';echo validation_errors();echo '</div>'; }?><?php if($error != '') { echo $error ; } ?><div class="col-md-12"><div class="form-group logo-in"><i class="icofont-rounded-down"></i><select name="type_category" id="type_category" class="form-control select2"><option value="">Select Your Category</option><?php foreach($parent_services as $row){ ?> <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option><?php  } ?></select></div></div><div class="col-md-12"><div class="form-group"><i class="icofont-envelope"></i><input type="email" class="form-control" placeholder="Enter Email Id" id="email" name="email"></div></div><div class="col-md-12"><span class="pull-left"><a href="#"></a></span><span class="pull-right"><a href="<?= base_url('partners/login')?>"><i class="icofont-lock mr-1"></i> Login?</a></span></div><div id="save_button" class="btn-primary" value="GET Email"></div></div></form></div></div></section></main></div><?php $this->load->view('front/common_js'); ?><script>
    $(function() {
            $("#form").validate({
            rules: {
                type_category: { required: true},
                email: { required: true,email: true}
            },
            messages: {
                type_category: { required: "Please Select Category"},
                email: {required: "Please Enter Email Id"},
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    </script>
</body></html>