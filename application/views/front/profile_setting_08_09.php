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
						}else if($rowd->category == 3)
						{
							$Category = 'Radiodiagnostic Centers';
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
                                        <li class="tab-link current" data-tab="tab-1">General Details</li>
                                        <li class="tab-link" data-tab="tab-2">Company Details</li>
                                        <li class="tab-link" data-tab="tab-3">Certificate Details</li>
                                    </ul>
                                    <div id="tab-1" class="tab-content current">
                                        <h3>Step 1</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Enter <?php if($rowd->category == 1 ) { echo 'Store' ;}else{'Lab' ;} ?> Name<span
                                                            class="error">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter  Name" id="storename" name="storename"
                                                        required>
                                                    <p class="p-error" id="storename_error"></p>
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
                                            <div class="col-md-7 mb-3">
                                                <label class="radio-inline">
                                                    <input type="radio" name="optradio" value="1" checked>Google Address
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="optradio" value="2">Manually address
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Enter Your Address<span class="error">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Enter Address" id="location" name="location" required>
                                                    <input type="text" class="form-control d-none" placeholder="Enter Address" id="manuallylocation" name="manuallylocation">
                                                    <input type="hidden" name="g_lat" id="g_lat">
                                                    <input type="hidden" name="g_lng" id="g_lng">
                                                    <p class="p-error" id="location_error"></p>
                                                    <p class="p-error" id="manuallylocation_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Enter Google Map Link</label>
                                                    <input type="url" class="form-control"
                                                        placeholder="Enter Google Map Link" id="map_link"
                                                        name="map_link" required>
                                                    <p class="p-error" id="map_link_error"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row " id="manuallyEntryDiv">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Your Country<span class="error">*</span></label>
                                                    <input type="hidden" name="country" value="101">
                                                    <input type="text" id="country" value="India" class="form-control" required disabled>
                                                    <p class="p-error" id="country_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Your State<span class="error">*</span></label>
                                                    <select name="state" id="state" class="form-control select2"
                                                        required>
                                                        <option value="">Choose Your State</option>
                                                        <?php foreach($state as $row){ ?>
                                                        <option value="<?php echo $row->id;?>">
                                                            <?php echo $row->name;?>
                                                        </option>
                                                        <?php  } ?>
                                                    </select>
                                                    <p class="p-error" id="state_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Your City<span class="error">*</span></label>
                                                    <select name="city" id="city" class="form-control select2" required>
                                                        <option value="">Choose Your City</option>
                                                    </select>
                                                    <p class="p-error" id="city_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Pincode<span class="error">*</span></label>
                                                    <input type="tel" class="form-control" placeholder="Enter Pincode"
                                                        id="pincode" name="pincode" maxlength="6" minlength="6"
                                                        onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                        required>
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
                                                        <input type="checkbox" id="mon" name="mon" value="Monday"> Monday
                                                        <!-- <label for="monday" class="text-left"> Monday</label> -->

                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="start_mon" name="start_mon" >
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="end_mon" name="end_mon" >
                                                    </div>
                                                    <div class="col-md-5">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="tue" name="tue" value="Tuesday"> Tuesday
                                                        <!-- <label for="monday" class="text-left"> Tuesday</label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="start_tue" name="start_tue">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="tue_end" name="tue_end">
                                                    </div>
                                                    <div class="col-md-5">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="wed" name="wed" value="Wednesday"> Wednesday
                                                        <!-- <label for="monday" class="text-left"> Wednesday</label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="start_wed" name="start_wed">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="end_wed" name="end_wed">
                                                    </div>
                                                    <div class="col-md-5">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="thu" name="thu" value="Thursday"> Thursday
                                                        <!-- <label for="monday" class="text-left"> </label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="start_thu" name="start_thu">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="end_thu" name="end_thu">
                                                    </div>
                                                    <div class="col-md-5">&nbsp;</div>
                                                    
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="fri" name="fri" value="Friday"> Friday
                                                        <!-- <label for="monday" class="text-left"></label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="start_fri" name="start_fri">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="end_fri" name="end_fri">
                                                    </div>
                                                    <div class="col-md-5">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="sat" name="sat" value="Saturday"> Saturday
                                                        <!-- <label for="monday" class="text-right">Saturday</label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="start_sat" name="start_sat">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="end_sat" name="end_sat">
                                                    </div>
                                                    <div class="col-md-5">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <input type="checkbox" id="sun" name="sun" value="Sunday"> Sunday
                                                        <!-- <label for="monday" class="text-left">Sunday</label> -->
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="start_sun" name="start_sun">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="time" id="end_sun" name="end_sun">
                                                    </div>
                                                    <div class="col-md-5">&nbsp;</div>
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
                                            <a class="btn btn-primary btnNext">Next</a>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-content">
                                        <h3>Step 2</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">GSTIN<span class="error">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Enter GSTIN" id="gstin" name="gstin" maxlength="15" minlength="15" required>
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
                                                    <input type="text" class="form-control" placeholder="Enter Name Of Owner" id="name" name="name" value="<?= $rowd->name ?>" disabled>
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
                                                        <label for="name">Qulification</label>
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
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            <a class="btn btn-primary btnNext">Next</a>
                                        </div>
                                    </div>
                                    <div id="tab-3" class="tab-content">
                                        <h3>Step 3</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Choose Id Proof<span class="error">*</span></label>
                                                    <select name="chooseID" id="chooseID" class="form-control" onchange="hideshowID();">
                                                        <option value="">Choose your ID</option>
                                                        <option value="1">Aadharcard</option>
                                                        <option value="2">Pan Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-none" id="PancardDiv">
                                                <div class="form-group">
                                                    <label for="name">Pancard Number<span class="error">*</span></label>
                                                    <input type="text" class="form-control" id="pan" name="pan" maxlength="10" minlength="10" placeholder="Enter PAN" />
                                                    <p class="p-error" id="pancard_no_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-none" id="AdharcardDiv">
                                                <div class="form-group">
                                                    <label for="name">Adhaar Card Number<span class="error">*</span></label>
                                                    <input type="text" class="form-control" id="adharcard_no"
                                                        name="adharcard_no" maxlength="12" minlength="12"
                                                        onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                        placeholder="Enter Adhaar Card No" />
                                                    <p class="p-error" id="adharcard_no_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload ID Document(Pancard/Aadhar Card)<span class="error">*</span></label>
                                                    <input type="file" class="form-control" id="pancard"
                                                        name="pancard" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload GSTIN Certificate<span class="error">*</span></label>
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
                                                        Upload Min 3 Files allowed </p>
                                                </div>
                                            </div>
                                            <?php if($rowd->category == 1){ ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload B.PHARM/M.PHARM Licence<span
                                                            class="error">*</span></label>
                                                    <input type="file" class="form-control" id="bpharm_lience"
                                                        name="bpharm_lience" required />
                                                    <p class="p-error" id="bpharm_lience_error"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Upload B.PHARM/M.PHARM Degree Certificate<span
                                                            class="error">*</span></label>
                                                    <input type="file" class="form-control" id="degree_certi"
                                                        name="degree_certi" required />
                                                    <p class="p-error" id="degree_certi_error"></p>
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
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" id="submit_btn" class="book-now-btn form_btn mt-1 d-none"
                                name="save_button" value="Register">
                        </form>
                    </div>
                </div>
                <input type="hidden" name="address1" id="address1">
            </section>
        </main>
        <?php $this->load->view('front/common_footer'); ?>
    </div>
    <?php $this->load->view('front/common_js'); ?>
    <script type="text/javascript">
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
$('input[type=radio][name=optradio]').change(function() {
    if (this.value == '1') {
        $('#location').removeClass('d-none');
        $('#manuallylocation').addClass('d-none');
        $('#location').attr('required');
        $('#manuallylocation').removeAttr('required');
    } else if (this.value == '2') {
        $('#manuallylocation').removeClass('d-none');
        $('#map_link').val('')
        $('#location').addClass('d-none');
        $('#manuallylocation').attr('required');
        $('#location').removeAttr('required');
    }
});
$('input[type=radio][name=opttiming]').change(function() {
    if (this.value == '1') {
        $('#CustomTimingDiv').addClass('d-none');
    } else if (this.value == '2') {
        $('#CustomTimingDiv').removeClass('d-none');
    }
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
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc&libraries=places,drawing&callback=initAutocomplete"
    async defer></script>
    <script type="text/javascript">
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
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        $('#g_lat').val(lat);
        $('#g_lng').val(lng);
        $('#map_link').val('https://maps.google.com/?ll="' + lat + '","' + lng + '"');
    }
    </script>
    <script type="text/javascript">
    $("#country").change(function() {
        var ajaxurl = "<?= base_url();?>";
        var id = $(this).val();
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
    <script type="text/javascript">
    $(document).ready(function() {
        for (i = new Date().getFullYear(); i > 1900; i--) {
            $('#UG_year').append($('<option />').val(i).html(i));
            $('#PG_year').append($('<option />').val(i).html(i));
            $('#PG_MCI_year').append($('<option />').val(i).html(i));
            $('#UG_MCI_year').append($('<option />').val(i).html(i));

        }
        $("#submit_btn").addClass('d-none');

        $('ul.tabs li').click(function() {
            var tab_id = $(this).attr('data-tab');
            if (tab_id == 'tab-1') {
                $("#submit_btn").addClass('d-none');
                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            } else if (tab_id == 'tab-2') {
                if (validate_FirstTab()) {
                    $('#storename_error').html("");
                    $('#manuallylocation_error').html("");
                    $('#location_error').html("");
                    $('#country_error').html("");
                    $('#state_error').html("");
                    $('#city_error').html("");
                    $('#email_error').html("");
                    $('#charges_error').html("");
                    $('#gastin_error').html("");
                    $('#pancard_no_error').html("");
                    $('#adharcard_no_error').html("");
                    $('#licence_no_error').html("");
                    $('#store_no_error').html("");
                    $('#profile_error').html("");
                    $('#gender_error').html("");
                    $("#submit_btn").addClass('d-none');
                    $('ul.tabs li').removeClass('current');
                    $('.tab-content').removeClass('current');
                    $(this).addClass('current');
                    $("#" + tab_id).addClass('current');
                }
            } else if (tab_id == 'tab-3') {

                if (validate_FirstTab() && validate_SecondTab()) {
                    $('#storename_error').html("");
                    $('#manuallylocation_error').html("");
                    $('#location_error').html("");
                    $('#country_error').html("");
                    $('#state_error').html("");
                    $('#city_error').html("");
                    $('#email_error').html("");
                    $('#charges_error').html("");
                    $('#gastin_error').html("");
                    $('#pancard_no_error').html("");
                    $('#adharcard_no_error').html("");
                    $('#licence_no_error').html("");
                    $('#store_no_error').html("");
                    $('#profile_error').html("");
                    $('#gender_error').html("");
                    $("#submit_btn").removeClass('d-none');
                    $('ul.tabs li').removeClass('current');
                    $('.tab-content').removeClass('current');
                    $(this).addClass('current');
                    $("#" + tab_id).addClass('current');
                }
            }
        })
    })
    </script>
    <script type="text/javascript">
    $('.btnNext').click(function() {

        if ($('#tab-1').hasClass('current')) {
            if (validate_FirstTab()) {
                $('#storename_error').html("");
                $('#manuallylocation_error').html("");
                $('#location_error').html("");
                $('#country_error').html("");
                $('#state_error').html("");
                $('#city_error').html("");
                $('#pincode_error').html("");
                $('#email_error').html("");
                $('#charges_error').html("");
                $("#submit_btn").addClass('d-none');
                $('.tabs > .current').next('li').trigger('click');
            }

        } else if ($('#tab-2').hasClass('current')) {
            if (validate_SecondTab()) {
                $('#storename_error').html("");
                $('#manuallylocation_error').html("");
                $('#location_error').html("");
                $('#country_error').html("");
                $('#state_error').html("");
                $('#city_error').html("");
                $('#pincode_error').html("");
                $('#email_error').html("");
                $('#charges_error').html("");
                $('#gastin_error').html("");
                $('#pancard_no_error').html("");
                $('#adharcard_no_error').html("");
                $('#licence_no_error').html("");
                $('#store_no_error').html("");
                $('#profile_error').html("");
                $('#gender_error').html("");
                $("#submit_btn").removeClass('d-none');
                $('.tabs > .current').next('li').trigger('click');
            }
        }
    });

    $('.btnPrevious').click(function() {
        if ($('#tab-1').hasClass('current')) {
            $('#storename_error').html("");
            $('#manuallylocation_error').html("");
            $('#location_error').html("");
            $('#country_error').html("");
            $('#state_error').html("");
            $('#city_error').html("");
            $('#pincode_error').html("");
            $('#email_error').html("");
            $('#charges_error').html("");
            $("#submit_btn").addClass('d-none');
        } else if ($('#tab-2').hasClass('current')) {
            $('#gastin_error').html("");
            $('#pancard_no_error').html("");
            $('#adharcard_no_error').html("");
            $('#licence_no_error').html("");
            $('#store_no_error').html("");
            $('#profile_error').html("");
            $('#gender_error').html("");
            $('#qualification_error').html("");
            $("#submit_btn").addClass('d-none');
        } else if ($('#tab-3').hasClass('current')) {
            $("#submit_btn").removeClass('d-none');
        }
        $('.tabs > .current').prev('li').trigger('click');
    });

    function hideshowTime() {
        var ServiceOption = $('#services :selected').val();
        if (ServiceOption != 2) {
            $('#deliverytimeDiv').show();
            $('#chargesDiv').show();
            $('#delivery_to').attr('required');
            $('#delivery_from').attr('required');
            $('#charges').attr('required');
        } else {
            $('#deliverytimeDiv').hide();
            $('#chargesDiv').hide();
            $('#delivery_to').removeAttr('required');
            $('#delivery_from').removeAttr('required');
            $('#charges').removeAttr('required');
        }
    }
    </script>
    <script>
    function validate_FirstTab() {
        var isValid = true;

        if ($('#storename')[0].checkValidity() == false) {
            $('#storename_error').html("Please Enter Store Name.");
            isValid = false;
        }
        if ($('input[name="optradio"]:checked').val() == 2) {
            if ($('#manuallylocation')[0].checkValidity() == false) {
                $('#manuallylocation_error').html("Please Enter Location");
                isValid = false;
            }
        }
        if ($('input[name="optradio"]:checked').val() == 1) {
            if ($('#location')[0].checkValidity() == false) {
                $('#location_error').html("Please Enter Location");
                isValid = false;
            }
        }
        if ($('#country')[0].checkValidity() == false) {
            $('#country_error').html("Please Select Country");
            isValid = false;

        }
        if ($('#state')[0].checkValidity() == false) {
            $('#state_error').html("Please Select State");
            isValid = false;

        }
        if ($('#city')[0].checkValidity() == false) {
            $('#city_error').html("Please Select City");
            isValid = false;

        }
        if ($('#pincode')[0].checkValidity() == false) {
        $('#pincode_error').html("Please Enter Pincode");
        isValid = false;
        }

        if ($('#email')[0].checkValidity() == false) {
            $('#email_error').html("Please Enter Email Address.");
            isValid = false;
        }
        if ('<?= $rowd->category ?>' == 2) {
            if ($('#homesample').prop('checked') == true) {
                if ($('#charges')[0].checkValidity() == false) {
                    $('#charges_error').html("Please Select Charges");
                    isValid = false;
                }
                if ($('#charges :selected').val() == 'Amount') {

                    if ($('#amount')[0].checkValidity() == false) {
                        $('#amount_error').html("Please Enter Amount Value");
                        isValid = false;
                    }
                }
            }

        }
        // if($('#contact_no')[0].checkValidity() == false)
        // {
        //     $('#contact_error').html("Please Enter Contact Number.");
        //     isValid = false;
        //     //$('#contact_no').focus();
        // }
        // if('<?= $rowd->category ?>' != 3)
        // {
        // 	if($('#services')[0].checkValidity() == false)
        // 	{
        // 		$('#services_error').html("Please Select Service");
        // 		isValid = false;
        // 	}


        // 	if($('#services :selected').val() != 2)
        // 	{

        // 		if($('#delivery_from')[0].checkValidity() == false)
        // 		{
        // 			$('#delivery_from_error').html("Please Enter Delivery From Time");
        // 			isValid = false;
        // 		}
        // 		if($('#delivery_to')[0].checkValidity() == false)
        // 		{
        // 			$('#delivery_to_error').html("Please Enter Delivery To Time");
        // 			isValid = false;
        // 		}
        // 		if($('#charges')[0].checkValidity() == false)
        // 		{
        // 			$('#charges_error').html("Please Select Charges");
        // 			isValid = false;
        // 		}	
        // 	}
        // }

        return isValid;
    }

    function validate_SecondTab() {
        var isValid = true;

        if ($('#gstin')[0].checkValidity() == false) {
            $('#gastin_error').html("Please Enter GSTIN");
            isValid = false;
        } else {
            //var regExp = /^([0-9]{2}[a-zA-Z]{4}([a-zA-Z]{1}|[0-9]{1})[0-9]{4}[a-zA-Z]{1}([a-zA-Z]|[0-9]){3}){0,15}$/;
            var regExp = "^([0][1-9]|[1-2][0-9]|[3][0-7])([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$" ;
            var txtpan = $('#gstin').val();
            if (txtpan.match(regExp)) {
                isValid = true;
            } else {
                $('#gastin_error').html("Please Enter Valid GSTIN");
                isValid = false;
            }
        }
        // if ($('#pan')[0].checkValidity() == false) {
        //     $('#pancard_no_error').html("Please Enter PAN");
        //     isValid = false;
        // } else {
        //     var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/;
        //     var txtpan = $('#pan').val();
        //     if (txtpan.match(regExp)) {
        //         isValid = true;
        //     } else {
        //         $('#pancard_no_error').html("Please Enter Valid PAN");
        //         isValid = false;
        //     }
        // }
        // if ($('#adharcard_no')[0].checkValidity() == false) {
        //     $('#adharcard_no_error').html("Please Enter Adhaar Card No");
        //     isValid = false;
        // }
        if ($('#profile')[0].checkValidity() == false) {
            $('#profile_error').html("Please Select File");
            isValid = false;
            //$('#profile').focus();
        }
        if ($('#gender')[0].checkValidity() == false) {
            $('#gender_error').html("Please Select Gender");
            isValid = false;
            //$('#gender').focus();
        }
        if ('<?= $rowd->category ?>' == 1) {
            if ($('#licence_no')[0].checkValidity() == false) {
                $('#licence_no_error').html("Please Enter Licence No");
                isValid = false;
                //$('#licence_no').focus();
            }
            if ($('#qualification')[0].checkValidity() == false) {
                $('#qualification_error').html("Please Select Qualification");
                isValid = false;
                //$('#qualification').focus();
            }
        }
        if ('<?= $rowd->category ?>' != 1) {
            if ($('#UG_college')[0].checkValidity() == false) {
                $('#UG_college_error').html("Please Enter College");
                isValid = false;
            }
            if ($('#UG_uni')[0].checkValidity() == false) {
                $('#UG_uni_error').html("Please Enter University");
                isValid = false;
            }
            if ($('#UG_year')[0].checkValidity() == false) {
                $('#UG_uni_error').html("Please Enter Passing Year");
                isValid = false;
            }
            if ($('#UG_MCI')[0].checkValidity() == false) {
                $('#UG_MCI_error').html("Please Enter MCI");
                isValid = false;
            }
            if ($('#UG_reg_no')[0].checkValidity() == false) {
                $('#UG_reg_no_error').html("Please Enter Registration No");
                isValid = false;
            }
        }
        // if($('#store_no')[0].checkValidity() == false)
        // {
        // 	$('#store_no_error').html("Please Enter Store No");
        // 	isValid = false;
        // }


        // if($('#age')[0].checkValidity() == false)
        // {
        // 	$('#age_error').html("Please Select Age");
        // 	isValid = false;
        // }





        return isValid;

    }
    </script>
    <script>
    // $('#store_image').change(function(){
    //    //get the input and the file list
    //    var input = document.getElementById('store_image');
    //    if(input.files.length < 3){
    //        $('#store_image_MAXerror').css('display','block');
    //    }else if(input.files.length > 5){
    //        $('#store_image_MINerror').css('display','block');
    //    }else{
    //        $('#store_image_MAXerror').css('display','none');

    //        $('#store_image_MINerror').css('display','none');

    //    }
    // });
    $(function() {
        $.validator.addMethod("pan", function(value, element) {
        return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
    }, "Invalid Pan Number");
        $("#form").validate({
            rules: {
                pancard: {
                    required: true,
                    extension: "jpg|jpeg|png",

                },
                // adharcard: {
                //     required: true,
                //     extension: "jpg|jpeg|png",

                // },
                // adharcard_back: {
                //     required: true,
                //     extension: "jpg|jpeg|png",

                // },
                pan: {
                required:function() {
                        return ($("#chooseID option:selected" ).val() == 1);
                    },
                pan: true,
                maxlength: 10,
                minlength: 10,
                remote: {

                    url: "<?php echo site_url("check_become_partners_pancard_exist_or_not"); ?>",

                    type: "POST",
                }
            },
            adharcard_no: {
                required:function() {
                        return ($("#chooseID option:selected" ).val() == 2);
                    },
                maxlength: 12,
                minlength: 12,
                number: true,
                remote: {

                    url: "<?php echo site_url("check_become_partners_adharcard_exist_or_not"); ?>",

                    type: "POST",
                }
            },
                store_image: {
                    extension: "jpg|jpeg|png",
                    minupload: 3,
                    maxupload: 5,
                },
                sign_board: {
                    required: true,
                    extension: "jpg|jpeg|png",

                },
                gstin_certificate: {
                    required: true,
                },

                bpharm_lience: {
                    required: function() {
                        return ($("#CategoryID").val() == 1);
                    },
                    extension: "jpg|jpeg|png",

                },
                degree_certi: {
                    required: function() {
                        return ($("#CategoryID").val() == 1);
                    },
                    extension: "jpg|jpeg|png",

                },
                corporation: {
                    extension: "jpg|jpeg|png",

                },
                UG_certificate: {
                    required: function() {
                        return ($("#CategoryID").val() != 1);
                    },
                    extension: "jpg|jpeg|png",

                },
                UG_MCI_certificate: {
                    required: function() {
                        return ($("#CategoryID").val() != 1);
                    },
                    extension: "jpg|jpeg|png",

                },

            },
            messages: {
                pan: {
                required: "Please Enter PAN Number",
                remote: "This PAN No Is Already Exist!",
                },
                
                adharcard_no: {
                    required: "Please Enter AdharCard Number",
                    remote: "This Adhaar Card  Is Already Exist!",
                },
                pancard: {
                    required: "Please Select File",
                },
                adharcard: {
                    required: "Please Select File",
                },
                adharcard_back: {
                    required: "Please Select File",
                },
                store_image: {
                    maxupload: "You can only upload a maximum of 5 images",
                    maxupload: "You must upload at least 3 image (maximum of 5) ",
                },
                sign_board: {
                    required: "Please Select File",
                },
                gstin_certificate: {
                    required: "Please Select File",
                },
                bpharm_lience: {
                    required: "Please Select File",
                },

                degree_certi: {
                    required: "Please Select File",
                },
                UG_certificate: {
                    required: "Please Select File",
                },
                UG_MCI_certificate: {
                    required: "Please Select File",
                },
            },
            // submitHandler: function(form) {

            // 	form.submit();
            // }
        });
    });
    $('#form').submit(function() {
        if ($(this).valid()) {
            
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

                // selected.push({
                //     Day: this.value,
                //     Strtime: str_time,
                //     Endtime: end_time
                // });
                AllData = day + '#' + str_time + '#' + end_time;
                selected.push(AllData);

            });
        }
        $('#time_schedule').val(selected);
    });
    </script>
</body>

</html>