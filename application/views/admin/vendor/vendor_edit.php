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
                            <li class="breadcrumb-item"><a href="<?= base_url().'my-dashboard';?>">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Profile Edit</li>
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
                        <input type="hidden" name="CategoryID" id="CategoryID" value="<?= $profile_records->category ;?>">
                        <h5>General Details</h5>
                        <hr>
                        <?php if($profile_records->category == 1 ||$profile_records->category == 2 || $profile_records->category == 3 ){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Store Name
                                <span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="storename" id="storename"placeholder="Enter Store Name" value="<?php echo $profile_records->store_name; ?>"></div>
                        </div>
                        <?php } ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Name <?php if($profile_records->category == 1 || $profile_records->category == 2 || $profile_records->category == 3){ echo 'Of Owner' ;} ?>
                                <span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="name of owner" id="name" name="name" value="<?php echo $profile_records->name; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Profile Image<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" id="profile" name="profile" />
                            </div>
                            <?php if($profile_records->profile != '')
                            { ?>
                            <?php  $returnpath = $this->config->item('profile_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"profile")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <img src="<?php echo $returnpath.$profile_records->profile; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Select Gender<span class="error">*</span></label>
                            <div class="col-md-9">
                                <select name="gender" id="gender" class="form-control select2" required>
                                  <option value="">Choose gender</option>
                                  <option value="Male" <?php if($profile_records->gender=='Male'){echo "selected='selected'";} ?>>Male</option>
                                  <option value="Female" <?php if($profile_records->gender=='Female'){echo "selected='selected'";} ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">DOB<span class="error"></span></label>
                            <div class="col-md-9">
                                
                                    <?php 
                                  
                                    if(isset($profile_records->dob) && !empty($profile_records->dob) && $profile_records->dob != '1970-01-01') {  ?>
                                        <input type="date" data-toggle="datepiscker" id="dosb" name="dob" class="form-control" placeholder="DD-MM-YYYY"  max="<?php echo date('Y-m-d'); ?>"
                                        value="<?= date("Y-m-d", strtotime($profile_records->dob)); ?>">

                                    <?php } else { ?>
                                        <input type="date" data-toggle="datespicker" id="dsob" name="dob" class="form-control" placeholder="DD-MM-YYYY" max="<?php echo date('Y-m-d'); ?>"
                                        >
                                    <?php } ?>

                                
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Email
                            <span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email Id" value="<?php echo $profile_records->email; ?>" > 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Password
                            <span class="error">*</span></label>
                            <div class="col-md-9">
                                <div class="input-group-btn">
                                  <div class="input-group-prepend">
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" value="<?php echo $profile_records->org_password; ?>" >
                                    <span class="input-group-text" onclick="myFunction()"><i class="fa fa-eye-slash" id="togglePassword"></i></span>
                                  </div>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Mobile No<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Enter Store Phone Number" value="<?php echo $profile_records->contact_no; ?>" > 
                            </div>
                        </div>
                        <?php if($profile_records->pan != ''){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">PAN<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="pan" name="pan" maxlength="10" minlength="10" placeholder="Enter PAN" value="<?php echo $profile_records->pan; ?>"/>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($profile_records->adharcard_no != ''){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Aadharcard Number<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="adharcard_no" name="adharcard_no" maxlength="12" minlength="12" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" placeholder="Enter Adhaar Card No" value="<?php echo $profile_records->adharcard_no; ?>" /> 
                            </div>
                        </div>
                        <?php } ?>
                        <?php /* <div class="form-group m-t-40 row">
                            <div class="col-md-3"></div>
                            <div class="col-md-7">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" value="1" checked>Google address
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" value="2">Manually address
                                </label>
                            </div>
                        </div> */

                        $locations_arr = explode(' ',$profile_records->address);
                        $total = count($locations_arr);
                        $tmp_add = "";
                        if($total>0){
                             for($i=1;$i<$total;$i++) {
                                $tmp_add .= $locations_arr[$i]." ";
                            }
                        }
                       
                         ?>

                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Apprtment Name/Road<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter Flat or Block No" id="flat_block" name="flat_block" value="<?php echo $locations_arr[0]; ?>" required>
                            </div>
                        </div>

                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Choose Google Location<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Choose Google Location" id="location" name="location" value="<?php echo $tmp_add; ?>" required>
                                <?php /* <input class="form-control" type="text" name="location" id="location" placeholder="Enter Address Name" >
                                <input type="text" class="form-control d-none" placeholder="Enter Address" id="manuallylocation" name="manuallylocation"> */ ?>
                                <input type="hidden" name="g_lat" id="g_lat" value="<?php echo $profile_records->latitude; ?>">
                                <input type="hidden" name="g_lng" id="g_lng" value="<?php echo $profile_records->longitude; ?>"> 
                            </div>
                        </div>
                        <?php if($profile_records->category == 1 ||$profile_records->category == 2 || $profile_records->category == 3){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">GoogleMap Link<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="url" class="form-control"
                                    placeholder="Enter Google Map Link" id="map_link" name="map_link" value="<?= $profile_records->map_link ?>">
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Country<span class="error">*</span></label>
                            <div class="col-md-9">
                                
                                
                                <input type="text" id="hidden_country" value="<?php echo $profile_records->country; ?>" class="form-control" name="hidden_country" required disabled placeholder="country">
                                <input type="hidden" id="country" value="<?php echo $profile_records->country; ?>" class="form-control" name="country">


                                <?php /* <select name="country" id="country" class="form-control select2" required>
                                  <option value="">Choose your Country</option>
                                    <?php foreach($country as $row){ ?>
                                    <option value="<?php echo $row->id;?>" <?php if($row->id==$profile_records->country){echo "selected='selected'";} ?>>
                                        <?php echo $row->name;?></option>
                                    <?php  } ?>
                                </select> */ ?>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">State<span class="error">*</span></label>
                            <div class="col-md-9">
                                
                                <input type="text" id="hidden_state" value="<?php echo $profile_records->state; ?>" class="form-control" name="hidden_state" required disabled placeholder="state">
                                
                                <input type="hidden" id="state" value="<?php echo $profile_records->state; ?>" class="form-control" name="state">

                                <?php /* <input type="text"    name="state" id="state" class="form-control" required>
                                <select name="state" id="state" class="form-control select2" required>
                                  <option value="<?php if($statename != ''){ echo $profile_records->state; } ?>"><?php if($statename != ''){ echo $statename; }else{ echo 'Select State';}?></option>
                                </select> */ ?>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">City<span class="error">*</span></label>
                            <div class="col-md-9">

                                <input type="text" id="hidden_city" value="<?php echo $profile_records->city; ?>" class="form-control" name="hidden_city" required disabled placeholder="city">
                                
                                <input type="hidden" id="city" value="<?php echo $profile_records->city; ?>" class="form-control" name="city">

                                 <?php /* <input type="text"  value="<?php echo $profile_records->city; ?>"   name="city" id="city" class="form-control" required>
                                  <select name="city" id="city" class="form-control select2" required>
                                  <option value="<?php if($cityname != ''){echo $profile_records->city; }?>"><?php if($cityname != ''){echo $cityname; }else{echo 'Select City'; }?></option>
                                </select>  */ ?>
                            </div>
                        </div>
                        <?php if($profile_records->category == 4 ||$profile_records->category == 5 || $profile_records->category == 6 || $profile_records->category == 7 ){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Pincode<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="hidden" id="pincode" value="<?php echo $profile_records->pincode; ?>" class="form-control" name="pincode">

                                <input class="form-control" type="text" name="hidden_pincode" id="hidden_pincode" placeholder="Enter Pincode" value="<?php echo $profile_records->pincode; ?>" required disabled > 
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($profile_records->category == 1 ||$profile_records->category == 2 || $profile_records->category == 3 ){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Promotional Discription </label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5" id="comment" name="comment"><?php echo $profile_records->description; ?></textarea>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($profile_records->category == 4){
                        // if($profile_records->speciality != ''){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Speciality<span class="error">*</span></label>
                            <div class="col-md-9">
                                <select name="speciality" id="speciality"
                                    class="form-control select2" required>
                                    <option value="">Choose your Speciality</option>
                                    <?php foreach($speciality_list as $row){ ?>
                                    <option value="<?php echo $row->id;?>" <?php if($profile_records->speciality == $row->id){ echo 'selected';} ?>>
                                        <?php echo $row->title;?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </div>
                        <?php // } 
                    } ?>
                        <?php if($profile_records->category == 1 ||$profile_records->category == 2 || $profile_records->category == 3 ){ ?>
                        <h5><?php if($profile_records->category == 1 ){ echo 'Store'; }else{ echo 'Lab';} ?> Details</h5>
                        <hr>
                        <?php if($profile_records->category == 2){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-md-9">
                                <label class="radio-inline">
                                    <input type="checkbox" name="homesample" id="homesample" value="1" <?php if($profile_records->charges != ''){echo 'checked';}?>
                                    >Home Sample Collection
                                </label>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row" id="sampleChargesDiv">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Charges<span class="error">*</span></label>
                            <div class="col-md-9">
                                <select name="charges" id="charges" onchange="Charges()" class="form-control select2" required>
                                    <option value="">Choose Charges</option>
                                    <option value="Amount" <?php if($profile_records->charges == 'Amount'){echo 'selected';}?>>Amount</option>
                                    <option value="Free" <?php if($profile_records->charges == 'Free'){echo 'selected';}?>>Free</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-t-40 row" id="amountDiv">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Charges<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="tel" name="amount" id="amount" class="form-control" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" placeholder="Enter Amount" value="<?= $profile_records->amount ?>">
                            </div>
                        </div>    
                        <?php } ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">GSTIN<span class="error"></span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter GSTIN" id="gstin" name="gstin" value="<?php echo $profile_records->gstin; ?>" >
                            </div>
                        </div>
                        <?php if($profile_records->category == 1 ){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Licence No<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="licence_no" id="licence_no" placeholder="Enter Licence No" value="<?php echo $profile_records->licence_no; ?>" > 
                            </div>
                        </div>
                        
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload Images Of Store (min 3 - max 5)<span class="error"></span></label>
                            <div class="col-md-4">
                                <input type="file" class="form-control" id="store_image" name="store_image[]" multiple />
                            </div>
                            <?php  $returnpath = $this->config->item('store_images_uploaded_path'); ?>
                            <?php if($returnpath != ''){ 
                                foreach($store_images as $k=>$cd) {?>
                            <div class="col-md-1">
                                <img src="<?php echo $returnpath.$cd->images; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } } ?>
                        </div>
                        <?php } ?> <?php } ?>
                        <h5>Qualification Details</h5>
                        <hr>
                        <?php if($profile_records->category == 1 ){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Qualification of Owner<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="qualification" id="qualification" class="form-control" value="<?= $profile_records->qualification; ?>">
                            </div>
                        </div>
                        <?php } else { ?> 
                        <?php if($profile_records->category == 4 || $profile_records->category == 5 || $profile_records->category == 6 || $profile_records->category == 7){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Qulification<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Name of Course" id="UG_course" name="UG_course" value="<?php echo $profile_records->ug_course; ?>"> 
                            </div>
                            <?php if($profile_records->category == 4 || $profile_records->category == 5){ ?> 
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Name Specialty" id="UG_speciality" name="UG_speciality" value="<?php echo $profile_records->ug_speciality; ?>">
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">College & University<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control"
                                placeholder="Name of College" id="UG_college" name="UG_college" value="<?php echo $profile_records->ug_college; ?>">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control"
                                placeholder="Name of University" id="UG_uni" name="UG_uni" value="<?php echo $profile_records->ug_uni; ?>">
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" type="text" name="UG_year" id="UG_year" placeholder="Enter Year" value="<?php echo $profile_records->ug_year; ?>" > 
                            </div>
                        </div>
                        <?php if($profile_records->category == 4 || $profile_records->category == 5){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Registration<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Enter Name of MCI" id="UG_MCI" name="UG_MCI" value="<?php echo $profile_records->ug_mci; ?>"> 
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" placeholder="Enter Registration No" id="UG_reg_no" name="UG_reg_no" value="<?php echo $profile_records->ug_reg_no; ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="Enter Year" id="UG_MCI_year" name="UG_MCI_year" value="<?php echo $profile_records->ug_mci_year; ?>">
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <h5>Certificate Details</h5>
                        <hr>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload ID Proof<span class="error">*</span></label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" id="pancard" name="pancard" />
                            </div>
                            <?php if($profile_records->pancard != ''){ ?> 
                            <?php  $returnpath = $this->config->item('pancard_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"pancard")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <img src="<?php echo $returnpath.$profile_records->pancard; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <?php if($profile_records->category == 1 ||$profile_records->category == 2 || $profile_records->category == 3 ){ ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload Sign-Board<span class="error">*</span></label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" id="sign_board" name="sign_board" />
                            </div>
                            <?php if($profile_records->sign_board != ''){ ?> 
                            <?php  $returnpath = $this->config->item('sign_board_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"sign_board")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <img src="<?php echo $returnpath.$profile_records->sign_board; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload GSTIN Certificate<span class="error"></span></label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" id="gstin_certificate" name="gstin_certificate" />
                            </div>
                            <?php if($profile_records->gstin_certificate != '') { ?> 
                            <?php  $returnpath = $this->config->item('gst_certificate_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"gstin_certificate")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <img src="<?php echo $returnpath.$profile_records->gstin_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php if($profile_records->category == 1){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload B.PHARM/M.PHARM Licence<span class="error">*</span></label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" id="bpharm_lience" name="bpharm_lience" />
                            </div>
                            <?php if($profile_records->bpharm_licence != '') { ?> 
                            <?php  $returnpath = $this->config->item('bpharm_lience_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"bpharm_licence")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                            <div class="col-md-2">
                                <img src="<?= $returnpath.$profile_records->bpharm_licence; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload B.PHARM/M.PHARM Degree Certificate<span class="error">*</span></label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" id="degree_certi" name="degree_certi" />
                            </div>
                            <?php if($profile_records->degree_certificate != ''){ ?> 
                            <?php  $returnpath = $this->config->item('degree_certi_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"degree_certificate")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                            <div class="col-md-2">
                                <img src="<?php echo $returnpath.$profile_records->degree_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <?php } else { ?>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload Degree Certificate<span class="error">*</span></label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" id="UG_certificate" name="UG_certificate" />
                            </div>
                            <?php if($profile_records->ug_certificate != '') { ?> 
                            <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"ug_certificate")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <img src="<?php echo $returnpath.$profile_records->ug_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <?php if($profile_records->category == 4 || $profile_records->category == 5){ ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload Registration Certificate<span class="error">*</span></label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" id="UG_MCI_certificate" name="UG_MCI_certificate" />
                            </div>
                            <?php if($profile_records->ug_mci_certificate != '') { ?> 
                            <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"ug_mci_certificate")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                            <div class="col-md-2">
                                <img src="<?php echo $returnpath.$profile_records->ug_mci_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php if($profile_records->category == 1 ||$profile_records->category == 2 || $profile_records->category == 3 ) { ?> 
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload Corporation Registration
                            </label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" id="corporation" name="corporation" />
                            </div>
                            <?php if($profile_records->corporation != '') { ?> 
                            <?php  $returnpath = $this->config->item('corporation_images_uploaded_path'); ?>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $profile_records->id ?>,"corporation")'>Download</button>
                            </div>
                            <?php if($returnpath != ''){ ?>
                            <div class="col-md-2">
                                <img src="<?= $returnpath.$profile_records->corporation; ?>" class="img-thumbnail" height="70" width="70" />
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            </div>
                            <input type="hidden" name="partnerid" id="partner_id" value="<?= $partnerId ?>">
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("vendors/view/".$profile_records->id); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$("#storename").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#fullname').val(function() {
        return this.value.toUpperCase();
    })
});
$("#name").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#fullname').val(function() {
        return this.value.toUpperCase();
    })
});
$("#UG_course").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#UG_course').val(function() {
        return this.value.toUpperCase();
    })
});
$("#UG_speciality").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#UG_speciality').val(function() {
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
$("#pan").bind('keyup', function(e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#pan').val(function() {
        return this.value.toUpperCase();
    })
});
</script>
<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    $('#togglePassword').removeClass('fa fa-eye-slash');
    $('#togglePassword').addClass('fa fa-eye');
  } else {
    x.type = "password";
    $('#togglePassword').removeClass('fa fa-eye');
    $('#togglePassword').addClass('fa fa-eye-slash');

  }
}
// $('input[type=radio][name=optradio]').change(function() {
//     if (this.value == '1') {
//         $('#location').removeClass('d-none');
//         $('#manuallylocation').addClass('d-none');
//         $('#location').attr('required');
//         $('#manuallylocation').removeAttr('required');
//     } else if (this.value == '2') {
//         $('#manuallylocation').removeClass('d-none');
//         $('#map_link').val('')
//         $('#location').addClass('d-none');
//         $('#manuallylocation').attr('required');
//         $('#location').removeAttr('required');
//     }
// });
$('input[type=checkbox][name=homesample]').change(function() {
    if ($(this).prop('checked') == true) {
        $('#sampleChargesDiv').removeClass('d-none');
        $('#charges').attr('required');
    } else {
        $('#sampleChargesDiv').addClass('d-none');
        $('#charges').removeAttr('required');

    }
});
function Charges()
{
    if ($('#charges :selected').val() == 'Amount') {
        $('#amountDiv').removeClass('d-none');
        $('#amount').attr('required');
    } else {
        $('#amountDiv').addClass('d-none');
        $('#amount').removeAttr('required');
    }
}
// $("#country").change(function() {
//     var ajaxurl = "<?= base_url();?>";
//     var id = $(this).val();
//     $.ajax({
//             method: "POST",
//             url: ajaxurl + 'get-state',
//             data:{id:id }
//         })
//     .done(function(msg) {
//         if (msg != '') {
//             $("#state").html(msg);
//         }
//     });
// });
// $("#state").change(function() {
//     var ajaxurl = "<?= base_url();?>";
//     var id = $(this).val();
//     $.ajax({
//             method: "POST",
//             url: ajaxurl + 'get-city',
//             data: { id: id }
//         })
//         .done(function(msg) {
//             //  alert(msg);
//             if (msg != '') {
//                 $("#city").html(msg);
//             }
//         });
// });
</script>
<script src="<?= base_url()?>assets/js/datepicker.min.js"></script>
<script type="text/javascript">
var maxBirthdayDate = new Date();
maxBirthdayDate.setFullYear(maxBirthdayDate.getFullYear() - 18);
maxBirthdayDate.setMonth(11, 31);
$('#dob').datepicker({
    startDate: new Date(1955, 1 - 1, 1),
    endDate: maxBirthdayDate,
    changeMonth: true,
    changeYear: true,
    yearRange: '-65:-18',
    format: 'dd/mm/yyyy',
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc&libraries=places&callback=initAutocomplete" async defer></script>
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
    var place = autocomplete.getPlace();
    
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
<script>
    $(function() {
        $.validator.addMethod("pan", function(value, element) {
        return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
        }, "Invalid Pan Number");
        $("#form").validate({
        rules: {
            storename: {
                required:function(){
                    return ($("#CategoryID").val() == 1 || $("#CategoryID").val() == 2 || $("#CategoryID").val() == 3);
                },
                remote:{
                    url: "<?php echo site_url("check_store_name_exist_or_not_by_admin"); ?>",
                    type: "POST",
                    data: {
                        partnerid: function(){ return $("#partner_id").val(); },
                    }
                }
            },
            name: { required:true },
            password: { required:true },
            dob: { required:true },
            email: {
                required:true,
                email:true,
                remote:{

                  url: "<?php echo site_url("check_store_email_exist_or_not"); ?>",

                  type: "POST",

                  data: {
                        partnerid: "<?php echo $profile_records->id;?>",
                        categoryid:"<?php echo $profile_records->category;?>"
                    }
                }
            },
            
            contact_no: {
                required:true,
                minlength :10,
                maxlength :15,
                remote:{

                  url: "<?php echo site_url("check_store_mobile_exist_or_not"); ?>",

                  type: "POST",

                  data: {
                        partnerid: function(){ return $("#partner_id").val(); },
                        categoryid:"<?php echo $profile_records->category;?>"
                    }
                }
            },

            flat_block:{
                required:true,
            },
            
            location:{
                required:true,
            },
            // manuallylocation: {
            //     required:function(){
            //         return ($('input[name=optradio]:checked', '#form').val() == 2);
            //     },
            // },
            country: {required:true},
            state: {required:true},
            city: {required:true},
            pincode: {
                required:function(){
                        return ('<?= $profile_records->pan ?>' != '');
                  },
                minlength :6,
                maxlength :6,
            },
            pan: {
                required: function(){
                        return ('<?= $profile_records->adharcard_no ?>' != '');
                  },
                pan: true,
                maxlength: 10,
                minlength: 10,
                // remote: {

                //     url: "<?php echo site_url("check_become_partners_pancard_exist_or_not"); ?>",

                //     type: "POST",
                // }
            },
            adharcard_no: {
                required: function(){
                        return ($("#CategoryID").val() != 1 || $("#CategoryID").val() != 2 || $("#CategoryID").val() != 3);
                  },
                maxlength: 12,
                minlength: 12,
                number: true,

                // remote: {

                //     url: "<?php echo site_url("check_become_partners_adharcard_exist_or_not"); ?>",

                //     type: "POST",
                // }
            },
            speciality: {
                required:function(){
                        return ($("#CategoryID").val() == 4);
                  },
            },
            gstin: {
                // required:function(){
                //         return ($("#CategoryID").val() == 1 || $("#CategoryID").val() == 2 || $("#CategoryID").val() == 3);
                //   },
                remote:{

                  url: "<?php echo site_url("check_store_gstin_exist_or_not"); ?>",

                  type: "POST",
                  data: {
                        partnerid: function(){ return $("#partner_id").val(); },
                    }
                  
                }

            },
            licence_no: {
                required:function(){
                        return ($("#CategoryID").val() == 1);
                  },
            },
            qualification: {
                required:function(){
                        return ($("#CategoryID").val() == 1);
                  },
            },

        },
        messages: {
            storename: {
                required:"Please Enter Store Name",
                remote: "This Store Name Is Already Exist!",
            },
            name: { required:"Please Enter Owner Name"},
            dob: { required:"Please Select DOB"},
            password: { required:"Please Enter Password" },

            email: {
                required:"Please Enter Email Id",
                email:"Please Enter Valid Email",
                remote: "This Email Id Is Already Exist!",
            },
            contact_no: {
                required:"Please Enter Contact No",
                remote: "This Mobile Number Is Already Exist!",
            },
            flat_block:{
                required:"Enter Apprtment Name/Road",
            },
            location:{
                required:"Enter location",
            },
            manuallylocation: { required:"Please Enter Address"},
            country: { required:"Please Select Country"},
            state: { required:"Please Select State"},
            city: { required:"Please Select City"},
            pincode: {
                required:"Please Enter Pincode",
                minlength:"Please Enter Minimum Six Digit",
                maxlength:"Please Enter Maximum Six Digit ",
            },
            pan: {
                required: "Please Enter PAN Number",
            },
            adharcard_no: {
                required: "Please Enter AdharCard Number",
            },
            speciality:{ required: "Please Select Speciality"},
            gstin: {
                // required:"Please Enter GSTIN",
                remote: "This GSTIN Already Exist!",
            },
            licence_no: { required:"Please Enter Licence No"},
            qualification: { required:"Please Select Qualification" },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>