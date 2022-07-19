<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Heal – Health & Medical</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <?php $this->load->view('front/common_css'); ?>
   </head>
   <body>
      <div class="wrapper home-default-wrapper">
      <?php $this->load->view('front/common_header'); $path = $this->config->item('content_images_uploaded_path'); ?>
      <main class="main-content site-wrapper-reveal slider-register">
      <section class="page-title-area bg-img bg-img-top" data-bg-img="assets/img/Bg-reg.png">
         <div class="container">
            <div class="row">
               <div class="col-sm-8">
                  <div class="register-banner-text">
                     <h4 class="title">Let's Create Happiness Together</h4>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="register-image-banner"><img src="assets/img/phone-reg.png" /></div>
               </div>
            </div>
         </div>
      </section>

      <section class="register-tab">
      <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item active"><a class="nav-link" id="home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="home" aria-selected="true" >Doctor</a></li>
         <li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="profile" aria-selected="false">Nurse</a></li>
         <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#3" role="tab" aria-controls="contact" aria-selected="false">Physiotherapist</a></li>
         <li class="nav-item"><a class="nav-link" id="contact-tab1" data-toggle="tab" href="#4" role="tab" aria-controls="contact1" aria-selected="false">Veterinary Doctor</a></li>
         <li class="nav-item"><a class="nav-link" id="contact-tab2" data-toggle="tab" href="#5" role="tab" aria-controls="contact2" aria-selected="false">Chemist   Pathologist  Radiologist</a></li>
      </ul>
      <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="1" role="tabpanel" aria-labelledby="home-tab">
         <div class="register-doctor-logo">
            <img src="<?= $path.$con_id['main_image'];?>" name="main_image" alt="demo">
            <h4 id="main_heading"><?= $con_id['main_heading']; ?></h4>
            <div class="row pt-5" >
               <div class="col-md-4" id="div_1_1">
                  <div class="screen-shot-reg">
                    <div id="original_1">
                     <div class="doctor-s-slides owl-carousel owl-theme" id="image_1_1_1div">
                        <?php
                        $image_1 = json_decode($con_id['image_1']);
                        $high_1 = json_decode($con_id['highlighted_image_1'],true);
                        ?>
                        <?php 
                        $i=1;
                        foreach($image_1 as $value){
                        ?>
                        <a href="<?= $path.$high_1["image_$i"];?>">
                        <div class="item"><img src="<?= $path.$value;?>" alt="demo"></div>
                         </a>
                      <?php $i++;}  ?>
                     </div>
                     </div>
                     <div id="123">  
                     </div>
                  </div>
               </div>
               <div class="col-md-8" id="div_1_2">
                  <div class="doctor-right-box">
                     <div class="doctor-box-position">
                        <h2 id="heading_1"><?= $con_id['heading_1']; ?></h2>
                        <p id="description_1"><?= $con_id['description_1']; ?></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row pt-5">
               <div class="col-md-8 order-2 order-lg-1 order-md-1 order-xl-1" id="div_2_1">
                  <div class="doctor-right-box">
                     <div class="doctor-box-position">
                        <h2 id="heading_2"><?= $con_id['heading_2']; ?></h2>
                        <p id="description_2"><?= $con_id['description_2']; ?></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 order-1 order-lg-2 order-md-2 order-xl-2" id="div_2_2">
                  <div class="screen-shot-reg">
                    <div id="original_2">
                     <div class="doctor-s-slides owl-carousel owl-theme" id="image_2div">
                        <?php
                        $image_2 = json_decode($con_id['image_2']);
                        $high_2 = json_decode($con_id['highlighted_image_2'],true);
                        $i=1;
                        foreach($image_2 as $value){
                        ?>
                         <a href="<?= $path.$high_2["image_$i"];?>">
                        <div class="item"><img src="<?= $path.$value;?>" alt="demo"></div>
                         </a>
                      <?php $i++;}  ?>
                     </div>
                   </div>
                     <div id="456">  </div>
                  </div>

               </div>
            </div>
            <div class="row pt-5" id="div_3">
               <div class="col-md-4" id="div_3_1">
                  <div class="screen-shot-reg">
                    <div id="original_3"> 
                     <div class="doctor-s-slides owl-carousel owl-theme" id="image_3div">
                        <?php
                        $image_3 = json_decode($con_id['image_3']);
                        $high_3 = json_decode($con_id['highlighted_image_3'],true);
                        $i=1;
                        foreach($image_3 as $value){
                        ?>
                         <a href="<?= $path.$high_3["image_$i"];?>">
                        <div class="item"><img src="<?= $path.$value;?>" alt="demo"></div>
                         </a>
                      <?php $i++;}  ?>
                     </div>
                   </div>
                     <div id="789">  </div>
                  </div>
               </div>
               <div class="col-md-8" id="div_3_2">
                  <div class="doctor-right-box">
                     <div class="doctor-box-position">
                        <h2 id="heading_3"><?= $con_id['heading_3']; ?></h2>
                        <p id="description_3"><?= $con_id['description_3']; ?></p>
                     </div>
                  </div>
               </div>
            </div>
          
         </div>
      </div>
      
    </div>
</div>
</section>
<section class="register_page">
<div class="container">
    <div class="register_form">
        <h2><span>Register</span> Account</h2>
        <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8"
            enctype="multipart/form-data">
            <?php if (validation_errors()){   
                echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Warning!</strong> ';
                echo validation_errors();
                echo '</div>';
                }
            ?>
            <?php if($error != '')
            { 
                echo $error ;
            } ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <i class="icofont-user-male"></i>
                        <label for="name">Enter Your Name<span class="error">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Full Name"
                            name="name" id="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <i class="icofont-diamond"></i>
                        <label for="name">Selecy Your Category<span class="error">*</span></label>
                        <select name="type_category" id="type_category" class="form-control select2">
                            <option value="">Choose Your Option</option>
                            
                            <?php foreach($parent_services as $row){ ?>
                            <option value="<?php echo $row->id;?>">
                                <?php echo $row->name;?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <i class="icofont-envelope"></i>
                        <label for="email">Email address<span class="error">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter Email Id"
                            name="email" id="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <i class="icofont-phone"></i>
                        <label for="name">Enter Your Mobile Number<span class="error">*</span></label>
                        <input type="tel" class="form-control" name="number" id="number" maxlength="10"
                            minlength="10" placeholder="Enter Mobile Number">
                        <input type="hidden" name="country_code" id="country_code" value="+91">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group input-group">
                        <i class="icofont-key"></i>
                        <label for="name">Enter Your Password<span class="error">*</span></label>
                        <input type="password" class="form-control" placeholder="Enter Password"
                            name="pwd" id="pwd">
                        <span toggle="#pwd"
                            class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <i class="icofont-key"></i>
                        <label for="name">Confirm Password<span class="error">*</span></label>
                        <input type="password" name="confirmpwd" id="confirmpwd" class="form-control"
                            placeholder="Enter Confirm Password">
                        <span toggle="#confirmpwd"
                            class="fa fa-fw fa-eye-slash field-icon toggle-password1"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="terms-condition form-group">
                        <label class="radio-inline">
                            <input type="checkbox" name="accept" id="accept" value="1"> Accept <a
                                href="<?= base_url().'term-condition'; ?>">terms & conditions</a> & <a
                                href="<?= base_url().'privacy-policy'; ?>">privacy policy </a>
                        </label>
                    </div>
                </div>
                <p style="font-size: 10px;color: #004940;font-weight: 700;"><span style="color:red;">Note*:</span> By Continuing you will receive a verification code to your phone number by SMS.Message and data rates may apply.</p>
                <div class="col-md-12">
                    <button type="submit" class="book-now-btn form_btn mt-1">Register</button>
                </div>
                <p>Are You Already Member ? <a href="<?= base_url().'partners/login'?>">Login</a></p>
            </div>
        </form>
    </div>
</div>
</section>
</main>
<?php $this->load->view('front/common_footer'); ?>
<?php $this->load->view('front/common_js'); ?>
<script type="text/javascript">
$(document).ready(function(){
$(".toggle-password").on('click', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pwd");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
}
});

$(".toggle-password1").on('click', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#confirmpwd");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
}
});



$('#original_2').show();
$('#original_3').show();
$('#original_1').show();
$('#123').hide();
$('#456').hide();
$('#789').hide();
$('.doctor-s-slides.owl-carousel').owlCarousel({
                loop: true,
             margin: 10,
             autoplay:false,
             autoplayTimeout:3000,
             responsiveClass: true,
             dots: false,
             nav: true,
             responsive: {
                 0: {
                     items: 1,
                     nav: true
                 },
                 600: {
                     items: 1,
                     nav: true
                 },
                 1000: {
                     items: 1,
                    nav: true,
                     loop: true
                 }
             }
         });
});

$('ul li a').click(function(){
  var path = "<?= $path ?>";
  var id = $(this).attr('href');
  var one = id.substring(1);
  
  var ajaxurl = "<?= base_url();?>";
  $('.tab-pane').attr('id',one);
  $.ajax({
    method: "POST",
    url: ajaxurl + 'get-query',
    dataType: "JSON",
    data: {
      id: one
    },success:function(data)
        {
              //alert(data.image_1['image_1']);
              //alert(path);
              if(one=='5'){
                $('#div_3_1').addClass('col-md-6').removeClass('col-md-4');
                $('#div_3_2').addClass('col-md-6').removeClass('col-md-8');
                $('#div_1_1').addClass('col-md-6').removeClass('col-md-4');
                $('#div_1_2').addClass('col-md-6').removeClass('col-md-8');
                $('#div_2_1').addClass('col-md-6').removeClass('col-md-8');
                $('#div_2_2').addClass('col-md-6').removeClass('col-md-4');
              }else{
                $('#div_3_1').addClass('col-md-4').removeClass('col-md-6');
                $('#div_3_2').addClass('col-md-8').removeClass('col-md-6');
                $('#div_1_1').addClass('col-md-4').removeClass('col-md-6');
                $('#div_1_2').addClass('col-md-8').removeClass('col-md-6');
                $('#div_2_1').addClass('col-md-8').removeClass('col-md-6');
                $('#div_2_2').addClass('col-md-4').removeClass('col-md-6');
              }

              if(data.main_image != ''){  
                  $('[name="main_image"]').show();
                  $('[name="main_image"]').attr("src",path+data.main_image);
              }else{
                $('[name="main_image"]').hide();
              }

              if(data.main_heading != ''){   
                  $('h4#main_heading').show();
                  $('h4#main_heading').html(data.main_heading);
              }else{
                $('h4#main_heading').hide();
              }
              
              if(data.heading_3 == '' && data.description_3 == '' && data.description_3 == ''){
                $('#div_3').hide();
              }else{
                $('#div_3').show();
              }
              
              $('#123').show();
              $('#original_1').hide();
               $('#123').html('<div id="testing" class="doctor-s-slides owl-carousel owl-theme"></div>');
                 var i =1;
                 var highh = 'image_';
                jQuery.each(data.image_1, function(index, itemData) {
                $("#testing").append('<a href="'+path+data.high_1[highh+i]+'"><div class="item"><img src="'+path+itemData+'"></div></a>');
                i++;
              });
            
            
            $('#456').show();
              $('#original_2').hide();
               $('#456').html('<div id="testing1" class="doctor-s-slides owl-carousel owl-theme"></div>');
                 var i =1;
                 var highh = 'image_';
                jQuery.each(data.image_2, function(index, itemData) {
                $("#testing1").append('<a href="'+path+data.high_2[highh+i]+'"><div class="item"><img src="'+path+itemData+'"></div></a>');
                i++;
              });

            $('#789').show();
              $('#original_3').hide();
               $('#789').html('<div id="testing2" class="doctor-s-slides owl-carousel owl-theme"></div>');
                 var i =1;
                 var highh = 'image_';
                jQuery.each(data.image_3, function(index, itemData) {
                $("#testing2").append('<a href="'+path+data.high_3[highh+i]+'"><div class="item"><img src="'+path+itemData+'"></div></a>');
                i++;
              });

              if(data.heading_1 != ''){   
                  $('h2#heading_1').show();
                  $('h2#heading_1').html(data.heading_1);
              }else{
                $('h2#heading_1').hide();
              }
              
              if(data.description_1 != ''){
                  $('#description_1').show();
                  $('#description_1').html(data.description_1);
              }else{
                $('#description_1').hide();
              }

              

              if(data.heading_2 != ''){   
                  $('h2#heading_2').show();
                  $('h2#heading_2').html(data.heading_2);
              }else{
                $('h2#heading_2').hide();
              }
              
              if(data.description_2 != ''){
                  $('#description_2').show();
                  $('#description_2').html(data.description_2);
              }else{
                $('#description_2').hide();
              }

              

              if(data.heading_3 != ''){   
                  $('h2#heading_3').show();
                  $('h2#heading_3').html(data.heading_3);
              }else{
                $('h2#heading_3').hide();
              }
              
              if(data.description_3 != ''){
                  $('#description_3').show();
                  $('#description_3').html(data.description_3);
              }else{
                $('#description_3').hide();
              }
              
              $('.doctor-s-slides.owl-carousel').owlCarousel({
                loop: true,
             margin: 10,
             autoplay:false,
             autoplayTimeout:3000,
             responsiveClass: true,
             dots: false,
             nav: true,
             responsive: {
                 0: {
                     items: 1,
                     nav: true
                 },
                 600: {
                     items: 1,
                     nav: true
                 },
                 1000: {
                     items: 1,
                    nav: true,
                     loop: true
                 }
             }
         });
          $('.doctor-s-slides').each(function() {
          $(this).magnificPopup({
          delegate: 'a', // the selector for gallery item
          type: 'image',
          gallery: {
          enabled:true
          }
        });
        });    
        }
  });

});




$("#name").bind('keyup', function(e) {
if (e.which >= 97 && e.which <= 122) {
var newKey = e.which - 32;
// I have tried setting those
e.keyCode = newKey;
e.charCode = newKey;
}

$('#name').val(function() {
return this.value.toUpperCase();
})
});
</script>
<script>
$('.doctor-s-slides').each(function() { // the containers for all your galleries
$(this).magnificPopup({
    delegate: 'a', // the selector for gallery item
    type: 'image',
    gallery: {
    enabled:true
    }
});
});
</script>
<script>
$(function() {
var category = $('#type_category').val();
$("#form").validate({
rules: {
    type_category: {
        required: true,
    },
    name: {
        required: true,
    },
    email: {
        required: true,
        email: true,
        remote: {

            url: "<?php echo site_url("check_become_partners_email_exist_or_not"); ?>",

            type: "POST",

            data: {

                category: function() {
                    return $('#type_category').val();
                },
                //category:category
            }
        }

    },
    number: {
        required: true,
        minlength: 10,
        maxlength: 10,
        number: true,
        remote: {
            url: "<?php echo site_url("check_become_partners_mobile_exist_or_not"); ?>",
            type: "POST",
            data: {

                category: function() {
                    return $('#type_category').val();
                },
          }
        }
    },
    pwd: {
        required: true,
    },
    confirmpwd: {
        required: true,
        equalTo: "#pwd"
    },
    accept: {
        required: true,
    },
},
messages: {
    type_category: {
        required: "Please Select Category",
    },
    name: {
        required: "Please Enter Name",
    },
    email: {
        required: "Please Enter Email Id",
        email: "Please Enter Valid Email Id",
        remote: "This Email Id Is Already Exist!",

    },
    number: {
        required: "Please Enter Mobile Number",
        number: "Please Your Number Only",
        remote: "This Mobile Number Is Already Exist!",
    },
    pwd: {
        required: "Please Enter Password",
    },
    confirmpwd: {
        required: "Please Enter Confirm-Password",
    },
    accept: {
        required: "Please Accept terms & conditions",
    },
},
submitHandler: function(form) {

    form.submit();
}
});
});
</script>
</body>
</html>
