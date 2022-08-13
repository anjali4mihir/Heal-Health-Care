<?php 
// echo "<pre>";
// print_r($rowd);
// exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Heal – Health & Medical</title>
    <?php $this->load->view('front/common_css'); ?>
    <style type="text/css">
    .p-error {
        color: red;
    }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php $this->load->view('front/common_header'); ?>
        <main class="main-content site-wrapper-reveal">
            <section class="page-title-area bg-img bg-img-top"
                data-bg-img="<?= base_url()?>assets/img/photos/about-bg1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 m-auto">
                            <div class="page-title-content content-style5 text-center">
                                <p>
                                    <font color="#ed1c24">@</font>Heal App
                                </p>
                                <h4 class="title"><?= $page_title?> <span></span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="register_page">
                <div class="container">
                    <div class="register_form otp_screen profile" id="example-basic">
                        <?php 
						if($rowd->category == 1)
						{
							$Category = 'Pharmacy Stores';
						}else if($rowd->category == 2){
							$Category = 'Pathology Labs';
                            $name="Enter Name Of Pathology";
						}else if($rowd->category == 3)
						{
							$Category = 'Radiodiagnostic Centers';
                            $name="Enter Name Of Diagnostic Centers";
						}
						?>
                        <h2><span><?= $Category;?></span> Profile</h2>
                        <form class="form" method="post" id="form" name="form" accept-charset="utf-8"
                            enctype="multipart/form-data" autocomplete="off">
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
                            <input type="hidden" name="CategoryID" id="CategoryID" value="<?= $rowd->category; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="tabs">
                                        <li class="tab-link current" data-tab="tab-1" id="tab1">General Details</li>
                                        <li class="tab-link" data-tab="tab-2" id="tab2">Company Details</li>
                                        <li class="tab-link" data-tab="tab-3" id="tab3">Certificate Details</li>
                                    </ul>
                                    <fieldset id="one">
                                    <div id="tab-1" class="tab-content current">
                                        <h3>Step 1</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">
                                                        <?php if(isset($name) && !empty($name))
                                                        {
                                                            echo $name;
                                                        } else { ?>
                                                            Enter <?php if($rowd->category == 1 ) { echo 'Store' ;}else{'Lab' ;} ?> Name    
                                                        <?php } ?>
                                                        <span
                                                            class="error">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter  Name" id="storename" name="storename"
                                                        required>
                                                    <!--<p class="p-error" id="storename_error"></p>-->
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email Address<span class="error">*</span></label>
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter Email Id" id="email" name="email"
                                                        value="<?= $rowd->email ?>" required disabled>
                                                    <p class="p-error" id="email_error"></p>
                                                </div>
                                            </div>
                                            <?php  /* <div class="row">
                                    <div class="col-md-7 mb-3">
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="1" checked>Google address
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="2">Manually address
                                        </label>
                                    </div>
                                </div> */ ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Apprtment Name/Road<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Flat or Block No" id="flat_block" name="flat_block" required>
                                            <p class="p-error" id="flat_block_error"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Choose Google Location<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="Choose Google Location" id="location" name="location" required>
                                            <!-- <input type="text" class="form-control d-none" placeholder="Choose Google Location" id="manuallylocation" name="manuallylocation"> -->
                                            <input type="hidden" name="g_lat" id="g_lat">
                                            <input type="hidden" name="g_lng" id="g_lng">
                                            <p class="p-error" id="location_error"></p>
                                            <!-- <p class="p-error" id="manuallylocation_error"></p> -->
                                        </div>
                                    </div>
                                </div>
                                            <div class="col-md-12" id="google_address">
                                                <div class="form-group">
                                                    <label for="name">Enter Google Map Link</label>
                                                    <input type="url" class="form-control"
                                                        placeholder="Enter Google Map Link" id="map_link"
                                                        name="map_link">
                                                    <p class="p-error" id="map_link_error"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row " id="manuallyEntryDiv">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Your Country<span class="error">*</span></label>
                                                    <input type="text" id="hidden_country" value="" class="form-control" name="hidden_country" required disabled placeholder="country">
                                                    <input type="hidden" id="country" value="" class="form-control" name="country">
                                                    <p class="p-error" id="country_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Your State<span class="error">*</span></label>
                                                    <input type="text" id="hidden_state" value="" class="form-control" name="hidden_state" required disabled placeholder="state">
                                                    <input type="hidden" id="state" value="" class="form-control" name="state">
                                                    <?php /* <select name="state" id="state" class="form-control select2"
                                                        required>
                                                        <option value="">Choose your state</option>
                                                        <?php foreach($state as $row){ ?>
                                                        <option value="<?php echo $row->id;?>">
                                                            <?php echo $row->name;?>
                                                        </option>
                                                        <?php  } ?>
                                                    </select> */ ?>
                                                    <p class="p-error" id="state_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Your City<span class="error">*</span></label>
                                                    
                                                     <input type="text" id="hidden_city" value="" class="form-control" name="hidden_city" required disabled placeholder="city">
                                                    <input type="hidden" id="city" value="" class="form-control" name="city">
                                                   
                                                   <?php /* <select name="city" id="city" class="form-control select2" required>
                                                        <option value="">Choose your City</option>
                                                    </select> */ ?>
                                                    <p class="p-error" id="city_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Pincode<span class="error">*</span></label>
                                                    <input type="hidden" id="pincode" value="" class="form-control" name="pincode">
                                                    <input type="tel" class="form-control" id="hidden_pincode" name="hidden_pincode" maxlength="6" minlength="6" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" required disabled placeholder="pincode">
                                                    <p class="p-error" id="pincode_error"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($rowd->category == 2 ) { ?>
                                        <div class="row">
                                            <div class="col-md-5 mb-3 ">
                                                <label class="radio-inline">
                                                    <input type="checkbox" name="homesample" id="homesample" value="1" checked>Home Sample Collection
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row" id="sampleChargesDiv">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Charges<span class="error">*</span></label>
                                                    <select name="charges" id="charges" onchange="Charges()"
                                                        class="form-control select2" required>
                                                        <option value="">Choose Charges</option>
                                                        <option value="Amount">Amount</option>
                                                        <option value="Free">Free</option>
                                                    </select>
                                                    <p class="p-error" id="charges_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-none" id="amountDiv">
                                                <div class="form-group">
                                                    <label for="name">Amount<span class="error">*</span></label>
                                                    <input type="tel" name="amount" id="amount" maxlength="5" class="form-control" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                        placeholder="Enter Amount" required>
                                                    <p class="p-error" id="amount_error"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="radio-inline">
                                                    <input type="radio" name="opttiming" value="1" checked>Open 24/7
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="opttiming" value="2">Add Custom Timing
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row d-none" id="CustomTimingDiv">
                                            <div class="col-md-12 pull-left">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="mon" name="days" value="Monday"> Monday
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="start_mon" name="start_mon" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="end_mon" name="end_mon" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="tue" name="days" value="Tuesday"> Tuesday
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="start_tue" name="start_tue" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="end_tue" name="end_tue" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="wed" name="days" value="Wednesday"> Wednesday
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="start_wed" name="start_wed" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="end_wed" name="end_wed" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="thu" name="days" value="Thursday"> Thursday
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="start_thu" name="start_thu" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="end_thu" name="end_thu" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">&nbsp;</div>
                                                    
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="fri" name="days" value="Friday"> Friday
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="start_fri" name="start_fri" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="end_fri" name="end_fri" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="sat" name="days" value="Saturday"> Saturday
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="start_sat" name="start_sat" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="end_sat" name="end_sat" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="sun" name="days" value="Sunday"> Sunday
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="start_sun" name="start_sun" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="time" id="end_sun" name="end_sun" class="form-control time-box">
                                                    </div>
                                                    <div class="col-md-3">&nbsp;</div>
                                                    <input type="hidden" name="time_schedule" id="time_schedule">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Promotional Discription</label>
                                                    <textarea class="form-control" rows="5" id="comment"
                                                        name="comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary btnNext">Next</a>
                                    </div>
                                    </fieldset>
                                    <fieldset id="two">
                                    <div id="tab-2" class="tab-content">
                                        <h3>Step 2</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">GSTIN
                                                        <?php if($rowd->category == 4 || $rowd->category == 5 || $rowd->category == 6 || $rowd->category == 7){ ?>
                                                            <span class="error">*</span>
                                                        <?php } ?>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="Enter GSTIN" id="gstin" name="gstin" maxlength="15" minlength="15">
                                                    <p class="p-error" id="gastin_error"></p>
                                                </div>
                                            </div>
                                            <?php if($rowd->category == 1){ ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Licence No<span class="error">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Enter Licence No" id="licence_no" name="licence_no" <?php if($rowd->category == 1){ echo 'required';}
													?>>
                                                    <p class="p-error" id="licence_no_error"></p>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Upload Profile Image<span class="error">*</span></label>
                                                    <input type="file" class="form-control" id="profile" name="profile" required />
                                                    <p class="p-error" id="profile_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name Of <?php if($rowd->category == 1){ echo 'Owner';} else{echo 'Doctor'; }
													?><span class="error">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Enter Name Of Owner" id="name" name="name" value="<?= $rowd->name ?>">
                                                    <p class="p-error" id="name_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Select Gender<span class="error">*</span></label>
                                                    <select name="gender" id="gender" class="form-control select2"
                                                        required>
                                                        <option value="">Choose gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <p class="p-error" id="gender_error"></p>
                                                </div>
                                            </div>
                                            <?php if($rowd->category == 1){ ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Qualification<span class="error">*</span></label>
                                                    <input type="text" name="qualification" class="form-control" id="qualification" placeholder="Qualification" <?php if($rowd->category == 1){ echo 'required';}
													?>>
                                                    <p class="p-error" id="qualification_error"></p>
                                                </div>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Qualification</label>
                                                        <input type="text" class="form-control" placeholder="Name of College" id="UG_college" name="UG_college" <?php if($rowd->category != 1){ echo 'required';}
													?>>
                                                        <p class="p-error" id="UG_college_error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">&nbsp;</label>
                                                        <input type="text" class="form-control" placeholder="Name of University" id="UG_uni" name="UG_uni" <?php if($rowd->category != 1){ echo 'required';}
													?>>
                                                        <p class="p-error" id="UG_uni_error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">&nbsp;</label>
                                                        <select name="UG_year" id="UG_year" class="form-control" <?php if($rowd->category != 1){ echo 'required';}
													?>></select>
                                                        <p class="p-error" id="UG_year_error"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Registration<span class="error">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Name of MCI" id="UG_MCI" name="UG_MCI" <?php if($rowd->category != 1){ echo 'required';}
													?>>
                                                        <p class="p-error" id="UG_MCI_error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">&nbsp;</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Registration No" id="UG_reg_no"
                                                            name="UG_reg_no" <?php if($rowd->category != 1){ echo 'required';}
													?>>
                                                        <p class="p-error" id="UG_reg_no_error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="name">&nbsp;</label>
                                                        <select name="UG_MCI_year" id="UG_MCI_year" class="form-control" <?php if($rowd->category != 1){ echo 'required';}
													?>></select>
                                                        <p class="p-error" id="UG_MCI_year_error"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                         <a class="btn btn-primary btnPrevious">Previous</a>
                                        <a class="btn btn-primary btnNext">Next</a>
                                    </div>
                                    </fieldset>
                                    <fieldset id="three">
                                    <div id="tab-3" class="tab-content">
                                        <h3>Step 3</h3>
                                        <div class="row">
                                            <!-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Choose Id Proof<span class="error">*</span></label>
                                                    <select name="chooseID" id="chooseID" class="form-control" onchange="hideshowID();">
                                                        <option value="">Choose your ID</option>
                                                        <option value="1">Aadharcard</option>
                                                        <option value="2">Pan Card</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Pancard Number<span class="error">*</span></label>
                                                    <input type="text" class="form-control" id="pan" name="pan" maxlength="10" minlength="10" placeholder="Enter PAN" />
                                                    <p class="p-error" id="pancard_no_error"></p>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12 d-none" id="AdharcardDiv">
                                                <div class="form-group">
                                                    <label for="name">Adhaar Card Number<span class="error">*</span></label>
                                                    <input type="text" class="form-control" id="adharcard_no"
                                                        name="adharcard_no" maxlength="12" minlength="12"
                                                        onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                        placeholder="Enter Adhaar Card No" />
                                                    <p class="p-error" id="adharcard_no_error"></p>
                                                </div>
                                            </div> -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload ID Document(Pancard)<span class="error">*</span></label>
                                                    <input type="file" class="form-control" id="pancard"
                                                        name="pancard" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload GSTIN Certificate<?php if($rowd->category == 2 || $rowd->category == 3) { ?><?php }else { ?><span class="error"></span></label><?php } ?>
                                                    <input type="file" class="form-control" id="gstin_certificate"
                                                        name="gstin_certificate" required />
                                                    <p class="p-error" id="gstin_certificate_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload Sign-Board<span
                                                            class="error">*</span></label>
                                                    <input type="file" class="form-control" id="sign_board"
                                                        name="sign_board" required />
                                                    <p class="p-error" id="sign_board_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload Images Of <?php if($rowd->category == 1){ echo 'Store';} else{echo 'Lab'; }
													?> (min 3 - max 5)(optional)</label>
                                                    <input type="file" class="form-control" id="store_image"
                                                        name="store_image[]" multiple />
                                                    <p class="p-error" id="store_image_MAXerror" style="display:none;">
                                                        Upload Max 5 Files allowed </p>
                                                    <p class="p-error" id="store_image_MINerror" style="display:none;">
                                                        Upload Min 3 Files allowed <?php echo $rowd->category; ?></p>
                                                </div>
                                            </div>
                                            <?php if($rowd->category == 1){ ?>
                                                <?php /* <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Upload B.PHARM/M.PHARM Licence<span
                                                                class="error">*</span></label>
                                                        <input type="file" class="form-control" id="bpharm_lience"
                                                            name="bpharm_lience" required />
                                                        <p class="p-error" id="bpharm_lience_error"></p>
                                                    </div>
                                                </div> */ ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">DRUG LICENSE<span
                                                                class="error">*</span></label>
                                                        <input type="file" class="form-control" id="degree_certi"
                                                            name="degree_certi" required />
                                                        <p class="p-error" id="degree_certi_error"></p>
                                                    </div>
                                                </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload degree Certificate<span
                                                            class="error">*</span></label>
                                                    <input type="file" class="form-control" id="UG_certificate"
                                                        name="UG_certificate" />
                                                    <p class="p-error" id="UG_certificate_error"></p>
                                                </div>
                                            </div>

                                            <?php } else{ ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload degree Certificate<span
                                                            class="error">*</span></label>
                                                    <input type="file" class="form-control" id="UG_certificate"
                                                        name="UG_certificate" />
                                                    <p class="p-error" id="UG_certificate_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload Registration Certificate<span
                                                            class="error">*</span></label>
                                                    <input type="file" class="form-control" id="UG_MCI_certificate"
                                                        name="UG_MCI_certificate" />
                                                    <p class="p-error" id="UG_MCI_certificate_error"></p>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload Corporation Registration(optional) </label>
                                                    <input type="file" class="form-control" id="corporation"
                                                        name="corporation" />
                                                    <p class="p-error" id="corporation_error"></p>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload Authorized Stamp<span
                                                            class="error">*</span></label>
                                                    <input type="file" class="form-control" id="stamp"
                                                        name="stamp" />
                                                    <p class="p-error" id="stamp_error"></p>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload Authorized Signature<span
                                                            class="error">*</span></label>
                                                    <input type="file" class="form-control" id="symbol"
                                                        name="symbol" />
                                                    <p class="p-error" id="symbol_error"></p>
                                                </div>
                                            </div>


                                        </div>
                                        <a class="btn btn-primary btnPrevious">Previous</a>
                                        <input type="submit" id="submit_btn" class="book-now-btn form_btn mt-1"
                                        name="save_button" value="Register">
                                    </div>
                                    </fieldset>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <input type="hidden" name="address1" id="address1">
            </section>
        </main>
        <?php $this->load->view('front/common_footer'); ?>
    </div>
    <?php $this->load->view('front/common_js'); ?>
</body>
</html>



<script type="text/javascript">
    var site_url = '<?php echo base_url(); ?>';
    var required=true;
    <?php if($rowd->category == 2 || $rowd->category == 3) { ?>required=false;<?php } ?>
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function(){

var current_fs, next_fs, previous_fs;
var opacity;
$('#error').delay(6000).fadeOut();


    var form = $("#form");
    
    /*$.validator.addMethod('minupload', function(value, element, param) {
        var length = ( element.files.length );
        return this.optional( element ) || length > param;
    });*/

    // $.validator.addMethod("pan", function(value, element) {
    //     return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
    // }, "Invalid Pan Number");

$(".btnNext").click(function(){
    $.validator.addMethod("days", function(value, elem, param) {
        return $("#CustomTimingDiv input[type=checkbox]:checked").length > 0;
    },"You must select at least one day!");
    form.validate({
        errorElement: 'span',
        errorClass: 'p-error',
        highlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').addClass("has-error");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass("has-error");
        },

        rules: {
                gstin: {
                    minlength: 15,
                    maxlength: 15,
                },
                city:{
                    required:true,
                },
                state:{
                    required:true,
                },
                charges:{
                    required:true,
                },
                storename:{
                    required:true,
                },
                pincode:{
                required:true,
                number: true,
                minlength:6,
                maxlength:6,
                },
                // manuallylocation:{
                //     required:true,
                // },
                flat_block:{
                    required:true,
                },
                location:{
                    required:true,
                },
                map_link:{
                required:true,
                url:true,
                },
                licence_no:{
                    required:true,
                },
                profile:{
                    required:true, 
                    extension: "jpg|jpeg|png",
                },
                gender:{
                  required:true,      
                },
                name:{
                    required:true,
                },
                qualification:{
                    required:true,
                },
                pan: {
                // required:function() {
                //         return ($("#chooseID option:selected" ).val() == 1);
                //     },
                //pan: true,
                required:true,
                maxlength: 10,
                minlength: 10,
                remote: {
                    url: "<?php echo site_url("check_become_partners_pancard_exist_or_not"); ?>",
                    type: "POST",
                }
            },
            store_image: {
                    extension: "jpg|jpeg|png",
                    minupload: 3,
                    maxupload: 5,
            },
            // adharcard_no: {
            //     required:function() {
            //             return ($("#chooseID option:selected" ).val() == 2);
            //         },
            //     maxlength: 12,
            //     minlength: 12,
            //     number: true,
            //     remote: {
            //         url: "<?php echo site_url("check_become_partners_adharcard_exist_or_not"); ?>",
            //         type: "POST",
            //     }
            // },
            pancard: {
                    required: true,
                    extension: "jpg|jpeg|png",

                },
            gstin_certificate:{
                    required: false,
                    extension: "jpg|jpeg|png",
                },
            sign_board: {
                    required: true,
                    extension: "jpg|jpeg|png",
                },
            // bpharm_lience: {
            //     required: function() {
            //         return ($("#CategoryID").val() == 1);
            //     },
            //     extension: "jpg|jpeg|png",

            // },
            degree_certi: {
                required: function() {
                     return ($("#CategoryID").val() == 1);
                },
                extension: "jpg|jpeg|png",

            },
            stamp: {
                required: function() {
                     return ($("#CategoryID").val() == 1 || $("#CategoryID").val() == 2 || $("#CategoryID").val() == 3);
                },
                extension: "jpg|jpeg|png",

            },
            symbol: {
                required: function() {
                     return (
                        $("#CategoryID").val() == 1 || $("#CategoryID").val() == 2 || $("#CategoryID").val() == 3);
                },
                extension: "jpg|jpeg|png",

            },

            corporation: {
                extension: "jpg|jpeg|png",
                },
            UG_certificate: {
                // required: function() {
                //     return ($("#CategoryID").val() != 1);
                // },
                required: true,
                extension: "jpg|jpeg|png",
            },
            UG_MCI_certificate: {
                required: function() {
                    return ($("#CategoryID").val() != 1);
                },
                extension: "jpg|jpeg|png",
            },
            UG_college:{
                required:true,
            },
            UG_uni:{
                required:true,
            },
            UG_year:{
                required:true,    
            },
            UG_reg_no:{
                required:true,
            },
            chooseID:{
                required:true,
            },
            UG_MCI:{
                required:true,
            },
            UG_MCI_year:{
                required:true,
            },
            days:{
                days: function() {
                    return ($("#opttiming").val() != 1);
                },
            },
            start_mon:{
                required: function() {
                    return ($("#mon").is(':checked'));
                },
            },
            end_mon:{
                required: function() {
                    return ($("#mon").is(':checked'));
                },
            },
            start_tue:{
                required: function() {
                    return ($("#tue").is(':checked'));
                },
            },
            end_tue:{
                required: function() {
                    return ($("#tue").is(':checked'));
                },
            },
            start_wed:{
                required: function() {
                    return ($("#wed").is(':checked'));
                },
            },
            end_wed:{
                required: function() {
                    return ($("#wed").is(':checked'));
                },
            },
            start_thu:{
                required: function() {
                    return ($("#thu").is(':checked'));
                },
            },
            end_thu:{
                required: function() {
                    return ($("#thu").is(':checked'));
                },
            },
            start_fri:{
                required: function() {
                    return ($("#fri").is(':checked'));
                },
            },
            end_fri:{
                required: function() {
                    return ($("#fri").is(':checked'));
                },
            },
            start_sat:{
                required: function() {
                    return ($("#sat").is(':checked'));
                },
            },
            end_sat:{
                required: function() {
                    return ($("#sat").is(':checked'));
                },
            },
            start_sun:{
                required: function() {
                    return ($("#sun").is(':checked'));
                },
            },
            end_sun:{
                required: function() {
                    return ($("#sun").is(':checked'));
                },
            },
            
            },
            messages: {
                UG_MCI:{
                        required:"Please Enter Name of MCI",
                },
                UG_MCI_year:{
                        required:"Please Enter Year",
                },
                chooseID:{
                     required:"Please Select Field",
                },
                gstin:{
                minlength: "Please check your GST number.",
                maxlength: "Please check your GST number.",
                },
                name:{
                    required:"Name is required",
                },
                city:{
                    required:"Please Select City",
                },
                state:{
                    required:"Please Select State",
                },
                charges:{
                    required:"Please Select Charges",
                },
                storename:{
                    required:"Enter Store Name",
                },
                pincode:{
                    required:"Please Enter Pincode",
                    minlength:"minimum length is 6",
                    maxlength:"maximum length is 6",
                },
                // manuallylocation:{
                //         required:"Enter location",
                // },
                flat_block:{
                    required:"Enter Apprtment Name/Road",
                },
                location:{
                        required:"Enter location",
                },
                map_link:{
                    required:"Add Map-link",
                    url:"Enter Valid Url",
                },
                licence_no:{
                    required:"Please Enter Licence No",
                },
                profile:{
                    required:"Please Select File",
                    extension: "Image Extension Must be jpg|jpeg|png",  
                },
                gender:{
                  required:"Please Select Gender",      
                },
                qualification:{
                    required:"Please Select Qualification"
                },
                pan: {
                required: "Please Enter PAN Number",
                remote: "This PAN No Is Already Exist!",
                },
                store_image: {
                    extension: "Image Extension Must be jpg|jpeg|png",
                    minupload: "Minimum Upload is 3",
                    maxupload: "Maximum Upload is 5",
                },
                adharcard_no: {
                    required: "Please Enter AdharCard Number",
                    remote: "This Adhaar Card  Is Already Exist!",
                },
                pancard: {
                    required: "Please Select File",
                    extension: " PLz enter jpg|jpeg|png image",
                },
                gstin_certificate:{
                    required: "Enter Gstin Image",
                    extension: "Image Extension Must be jpg|jpeg|png",
                },
                sign_board: {
                    required: "Enter Sign-Board Document Image",
                    extension: "Image Extension Must be jpg|jpeg|png",
                },
                // bpharm_lience: {
                //     required: "Please Select File",
                // },
                degree_certi: {
                    required: "Please Select File",
                },
                symbol: {
                    required: "Please Select Signature File",
                },
                stamp: {
                    required: "Please Select Stamp File",
                },
                UG_certificate: {
                    required: "Please Select File",
                },
                UG_MCI_certificate: {
                    required: "Please Select File",
                },
                UG_college:{
                    required:"Please Enter College",
                },
                UG_uni:{
                    required:"Please Enter University",
                },
                UG_year:{
                    required:"Please Enter Passing Year",    
                },
                UG_reg_no:{
                    required:"Please Enter Registration No",
                },
                start_mon:{
                    required:"Please Select",
                },
                end_mon:{
                    required:"Please Select",
                },
                start_tue:{
                   required:"Please Select",
                },
                end_tue:{
                    required:"Please Select",
                },
                start_wed:{
                    required:"Please Select",
                },
                end_wed:{
                    required:"Please Select",
                },
                start_thu:{
                    required:"Please Select",
                },
                end_thu:{
                    required:"Please Select",
                },
                start_fri:{
                    required:"Please Select",
                },
                end_fri:{
                    required:"Please Select",
                },
                start_sat:{
                    required:"Please Select",
                },
                end_sat:{
                    required:"Please Select",
                },
                start_sun:{
                    required:"Please Select",
                },
                end_sun:{
                    required:"Please Select",
                },
            },
            
    });



    if(form.valid() === true)
    {

        current_fs = $(this).parent();
        next_fs = $(this).parent().parent().next();
        //alert($(this).parent().html());
        //alert(index(next_fs));
        //alert(current_fs.html());
        //alert(next_fs.html());

        //$(".ul li").eq(1).addClass("active");
        //alert(current_fs.html());
        //$(".tabs li").eq($("div:first").index(current_fs-2)).removeClass("current");
        //$(".tabs li").eq($("div:first").index(next_fs)).addClass("current");
        //$('ul.tabs li').removeClass('current');
        //$('.tab-content').removeClass('current');
        //alert()
        //show the next fieldset
        //$("#tabs li").
        var c_id = $(this).parent().attr('id');
        //alert(c_id);

        //alert();
        //$(".tabs li").find(c_id).removeClass("current");
        //$(".tabs li .tab-link").toggleClass('current');
            if(c_id === 'tab-1') {
                $("#tab1").removeClass('current');
                $("#tab2").addClass('current');
            }

            if(c_id === 'tab-2') {
                $("#tab2").removeClass('current');
                $("#tab3").addClass('current');
            }

            if(c_id === 'tab-3') {
                $("#tab3").removeClass('current');
            }

        $(this).parent().parent().next().find('div:first').addClass("current");

        $(this).parent().removeClass("current");
        //next_fs.first().addClass("current");
        next_fs.show();
        current_fs.hide();
        //current_fs.hide();
        
        //hide the current fieldset with style

        /*current_fs.animate({opacity: 0}, {
        step: function(now) {
        opacity = 1 - now;

        current_fs.css({
            'display': 'none',
            'position': 'relative'
        });
        next_fs.css({'opacity': opacity});
        },
        duration: 600
        });*/
    }
});
        /*$("#submit_btn").addClass('d-none');

        $('ul.tabs li').click(function() {
            var tab_id = $(this).attr('data-tab');
            if (tab_id == 'tab-1') {
                $("#submit_btn").addClass('d-none');
                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            } else if (tab_id == 'tab-2') {

                    $("#submit_btn").addClass('d-none');
                    $('ul.tabs li').removeClass('current');
                    $('.tab-content').removeClass('current');
                    $(this).addClass('current');
                    $("#" + tab_id).addClass('current');
            } else if (tab_id == 'tab-3') {
                    $("#submit_btn").removeClass('d-none');
                    $('ul.tabs li').removeClass('current');
                    $('.tab-content').removeClass('current');
                    $(this).addClass('current');
                    $("#" + tab_id).addClass('current');
            }
        });

        $('.btnNext').click(function() {

        if ($('#tab-1').hasClass('current')) {
            $("#submit_btn").addClass('d-none');
            $('.tabs > .current').next('li').trigger('click');
        }else if ($('#tab-2').hasClass('current')) {
            $("#submit_btn").removeClass('d-none');
            $('.tabs > .current').next('li').trigger('click');
        }
        });
        $('.btnPrevious').click(function() {
            if ($('#tab-1').hasClass('current')) {
                $("#submit_btn").addClass('d-none');
            } else if ($('#tab-2').hasClass('current')) {
                $("#submit_btn").addClass('d-none');
            } else if ($('#tab-3').hasClass('current')) {
                $("#submit_btn").removeClass('d-none');
            }
            $('.tabs > .current').prev('li').trigger('click');
        });
    }*/

$(".btnPrevious").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().parent().prev();
var c_id = $(this).parent().attr('id');
//alert(c_id);
if(c_id === 'tab-1') {
    $("#tab1").removeClass('current');
}
if(c_id === 'tab-2') {
    $("#tab2").removeClass('current');
    $("#tab1").addClass('current');
}
if(c_id === 'tab-3') {
    $("#tab3").removeClass('current');
    $("#tab2").addClass('current');
}

//alert()
//Remove class active
//$(".tabs li").eq($("fieldset").index(current_fs)).addClass("current");
//$(".tabs li").eq($("fieldset").index(previous_fs)).removeClass("current");
//alert($(this).)
$(this).parent().removeClass("current");
$(this).parent().parent().prev().find('div:first').addClass("current").removeAttr('style');


//$(".tabs li").eq($("fieldset").index(current_fs)).removeClass("current");

//show the previous fieldset

previous_fs.show();


//hide the current fieldset with style
/*current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;
current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},

});*/
});






});


</script>


<script type="text/javascript">
    $("#country").change(function() {
        var ajaxurl = "<?= base_url();?>";
        var id = $('#country').val();
        $.ajax({
                method: "POST",
                url: ajaxurl + 'get-state',
                data: {
                    id: id
                }
            })
            .done(function(msg) {

                if (msg != '') {
                    $("#state").html(msg);
                    //$('#state').niceSelect('update');
                }
            });
    });
    $("#state").change(function() {
        var ajaxurl = "<?= base_url();?>";
        var id = $(this).val();
        $.ajax({
                method: "POST",
                url: ajaxurl + 'get-city',
                data: {
                    id: id
                }
            })
            .done(function(msg) {
                //  alert(msg);
                if (msg != '') {
                    $("#city").html(msg);
                }
            });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc&libraries=places,drawing&callback=initAutocomplete"
    async defer></script>
<script>
        $("#qualification").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }

    $('#qualification').val(function() {
        return this.value.toUpperCase();
    })
        });
        $("#storename").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }

    $('#storename').val(function() {
        return this.value.toUpperCase();
    })
        });
        $("#gstin").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#gstin').val(function() {
        return this.value.toUpperCase();
    })
        });
        $("#licence_no").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }

    $('#licence_no').val(function() {
        return this.value.toUpperCase();
    })
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
        $("#pan").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }

    $('#pan').val(function() {
        return this.value.toUpperCase();
    })
        });
        $("#UG_college").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#UG_college').val(function() {
        return this.value.toUpperCase();
    })
        });
        $("#UG_uni").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#UG_uni').val(function() {
        return this.value.toUpperCase();
    })
        });
        $("#UG_MCI").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#UG_MCI').val(function() {
        return this.value.toUpperCase();
    })
        });
        $("#UG_reg_no").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#UG_reg_no').val(function() {
        return this.value.toUpperCase();
    })
        });

        

        $('input[type=checkbox][name=homesample]').change(function() {
    if ($(this).prop('checked') == true) {
        $('#sampleChargesDiv').removeClass('d-none');
        $('#charges').attr('required');
    } else {
        $('#sampleChargesDiv').addClass('d-none');
        $('#charges').removeAttr('required');
    }
        });
        function Charges() {
    if ($('#charges :selected').val() == 'Amount') {
        $('#amountDiv').removeClass('d-none');
        $('#amount').attr('required');
    } else {
        $('#amountDiv').addClass('d-none');
        $('#amount').removeAttr('required');
    }
        }

	var selectedVal = "1";
	var selected = $("input[type=radio][name=optradio]:checked");
	if (selected.length > 0) {
	    selectedVal = selected.val();
	}
	if(selectedVal == "1") {
		$('#google_address').show();
		$('#manual_address').show();
	} else {
		$('#google_address').hide();
		$('#manual_address').show();
	}
	

	// $('input[type=radio][name=optradio]').change(function() {
		
	//     if (this.value == '1') {
	//         $('#location').removeClass('d-none');
	//         $('#manuallylocation').addClass('d-none');
	//         $('#location').attr('required');
	//         $('#manuallylocation').removeAttr('required');
	//         $('#google_address').show();
	//         $('#manual_address').show();
	       
	//     } else if (this.value == '2') {
	//         $('#manuallylocation').removeClass('d-none');
	//         $('#map_link').val('')
	//         $('#location').addClass('d-none');
	//         $('#manuallylocation').attr('required');
	//         $('#location').removeAttr('required');
	//         $('#google_address').hide();
	//         $('#manual_address').show();
	//     }
	// });

	$('input[type=radio][name=opttiming]').change(function() {
	    if (this.value == '1') {
	        $('#CustomTimingDiv').addClass('d-none');
	    } else if (this.value == '2') {
	        $('#CustomTimingDiv').removeClass('d-none');
	    }
	});

        var placeSearch, autocomplete;

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('location')), {
                types: ['geocode','establishment']
            });

        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();


//             var address = place.formatted_address;

//             var latitude = place.geometry.location.lat();
//             var longitude = place.geometry.location.lng();

//             console.log(place);
            
//             var pin = place.address_components[place.address_components.length - 1].long_name;
//             var country = place.address_components[place.address_components.length - 2].long_name;
//             var state = place.address_components[place.address_components.length - 3].long_name;
//             var city = place.address_components[place.address_components.length - 4].long_name;

//             var full_address = place.address_components;

//             console.log(country);
//             console.log(state);
//             console.log(city);
//             console.log(pin);

//             var count = full_address.length;
//             var tmp_address = '';
//             for(i=0;i<count;i++){
//                 tmp_address += full_address[i].long_name+",";
//             }

//             var tmp_country = " "+country;
//             var tmp_state = state+",";
//             var tmp_city = city+",";
//             var tmp_pin = pin+",";

//             tmp_address_c = tmp_address.replace(tmp_country,'');
//             tmp_address_s = tmp_address_c.replace(tmp_state,'');
//             tmp_address_cc = tmp_address_s.replace(tmp_city,'');
//             tmp_address = tmp_address_cc.replace(tmp_pin,'');


            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {

                        var tmp_address = results[0].formatted_address;
                        var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                        var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                        var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                        var city = results[0].address_components[results[0].address_components.length - 4].long_name;

                            console.log(pin);
                            console.log(country);
                            console.log(state);
                            console.log(city);

                            var tmp_country = " "+country;
                            var tmp_state = state+" "+pin+",";
                            var tmp_city = city+",";
                            var tmp_pin = pin+",";
                            var tmp_pisn = " ,";
                            var tmp_pisns = ",";
                            

                            var tmp_address_c = tmp_address.replace(tmp_country,'');
                            // console.log(tmp_address_c);
                            var tmp_address_s = tmp_address_c.replace(tmp_state,'');
                            // console.log(tmp_address_s);
                            var tmp_address_cc = tmp_address_s.replace(tmp_city,'');
                            // console.log(tmp_address_cc);
                            var tmp_address = tmp_address_cc.replace(tmp_pin,'');
                            // console.log(tmp_address);
                            var tmp_address = tmp_address.replace(tmp_pisn,'');
                            var tmp_address = tmp_address.replace(tmp_pisns,'');

                            $('#country').val(country);
                            $('#state').val(state);
                            $('#city').val(city);
                            $('#pincode').val(pin);
                            $('#location').val(tmp_address);

                            $('#hidden_country').val(country);
                            $('#hidden_state').val(state);
                            $('#hidden_city').val(city);
                            $('#hidden_pincode').val(pin);
                            $('#location').val(tmp_address);
                    }
                }
            });

        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        $('#g_lat').val(lat);
        $('#g_lng').val(lng);
        $('#map_link').val('https://maps.google.com/?ll="' + lat + '","' + lng + '"');
    }
  
</script>
<script type="text/javascript">
    function getTime() {
        var selected = [];
        var str_time = 0.00;
        var end_time = 0.00;
        $("#CustomTimingDiv input[type=checkbox]:checked").each(function() {
            str_time = $("#start_" + this.id).val();
            end_time = $("#end_" + this.id).val();
            selected.push({
                Day: this.value,
                Strtime: str_time,
                Endtime: end_time
            });
        });
        $('#time_schedule').val(selected);
    }

    for (i = new Date().getFullYear(); i > 1900; i--)
    {
        $('#UG_year').append($('<option />').val(i).html(i));
        $('#PG_year').append($('<option />').val(i).html(i));
        $('#PG_MCI_year').append($('<option />').val(i).html(i));
        $('#UG_MCI_year').append($('<option />').val(i).html(i));
    }

</script>
<!-- <script type="text/javascript">
    $(document).ready(function(){

    if(<?= $is_form_submit ?> == '1')
    {
        alert(<?= $is_form_submit ?>);
        $('#Success-modal').modal('show');  
    } 
});
</script> -->
<script>
function hideshowID()
{
    if($("#chooseID option:selected" ).val() == 1)
    {
        $('#PancardDiv').addClass('d-none');
        $('#pan').val('');
        $('#AdharcardDiv').removeClass('d-none');
    }else if($("#chooseID option:selected" ).val() == 2){
        $('#AdharcardDiv').addClass('d-none');
        $('#adharcard_no').val('');
        $('#PancardDiv').removeClass('d-none');
    }else{
        $('#PancardDiv').addClass('d-none');
        $('#AdharcardDiv').addClass('d-none');
        $('#pan').val('');
        $('#adharcard_no').val('');
    }
}
</script>

<script>
/*function Ground_operator()
{
    if($('#services').val() == 'Ground Operator')  
    {
        $('#GroundoperatorDiv').show();
        $('#OtheroperatorDiv').hide();

    } else{
        $('#GroundoperatorDiv').hide();
        $('#OtheroperatorDiv').show();

    }   
}
/*$(document).ready(function(){

    $('#error').delay(6000).fadeOut();
    $('.multiselect').select2({
        minimumResultsForSearch: Infinity
    });

    $('#country').change(function () {
            var country_id = $('#country').val();
            if (country_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxcontroller/fetch_state",
                    method: "POST",
                    data: {country_id: country_id},
                    success: function (data) {
                        //$('#state').html('');
                        $('#state').html(data);
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            }
            else {
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#state').change(function () {
            var state_id = $('#state').val();
            if (state_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxcontroller/fetch_city",
                    method: "POST",
                    data: {state_id: state_id},
                    success: function (data) {
                        $('#city').html(data);
                    }
                });
            }
            else {
                $('#city').html('<option value="">Select City</option>');
            }
        });
        /*$('input[type=radio][name=is_parent_company]').change(function() {
            if (this.value == '1') {
                $('#ParentBranchDiv').show();
            }
            else if (this.value == '0') {
                $('#ParentBranchDiv').hide();
                
            }
        });
        
});
/*function RedirectHome()
{
    window.location.replace("<?= base_url() ?>");   
}*/
$('#form').submit(function() {
        if ($(this).valid()) {

            //alert("Registration Done Successfully");
            var selected = [];
            var str_time = 0.00;
            var end_time = 0.00;
            var day = '';
            $("#CustomTimingDiv input[type=checkbox]:checked").each(function() {
                day = this.value;
                if ($("#start_" + this.id).val() == '') {
                    str_time = '09:00';
                    end_time = '21:00';
                } else {
                    str_time = $("#start_" + this.id).val();
                    end_time = $("#end_" + this.id).val();
                }
                selected.push({
                    Day: this.value,
                    Strtime: str_time,
                    Endtime: end_time
                });
            });
        }
        var jsoncovert = JSON.stringify(selected);
        $('#time_schedule').val(jsoncovert);
        
    });
</script>
