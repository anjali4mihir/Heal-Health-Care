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
                    if($rowd->category == 4){
                        $Category = 'Doctors';
                    }else if($rowd->category == 5){
                        $Category = 'Veterinary Doctors';
                    }else if($rowd->category == 6){
                        $Category = 'Nurse';
                    }else if($rowd->category == 7){
                        $Category = 'Physiotherapist';
                    }
                    ?>
                        <h2><span><?= $Category; ?></span> Profile</h2>
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
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="tabs">
                                <li class="tab-link current" data-tab="tab-1">General Details</li>
                                <li class="tab-link" data-tab="tab-2">Education Details</li>
                                <li class="tab-link" data-tab="tab-3">Certificate Details</li>
                            </ul>
                            <div id="tab-1" class="tab-content current">
                                <h3>Step 1</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Enter Name<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Name"
                                                id="fullname" name="fullname" value="<?= $rowd->name ?>"
                                                required disabled>
                                            <p class="p-error" id="name_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Upload Profile Image<span
                                                    class="error">*</span></label>
                                            <input type="file" class="form-control" id="profile" name="profile"
                                                required />
                                            <p class="p-error" id="profile_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Select Gender<span class="error">*</span></label>
                                            <select name="gender" id="gender" class="form-control select2"
                                                required>
                                                <option value="">Choose Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <p class="p-error" id="gender_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Birth Date<span class="error">*</span></label>
                                            <input type="text" data-toggle="datepicker" id="dob" name="dob"
                                                class="form-control" placeholder="DD-MM-YYYY" readonly='true'
                                                required>
                                            <p class="p-error" id="dob_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Mobile No<span class="error">*</span></label>
                                            <input type="tel" class="form-control" id="mobile" name="mobile"
                                                value="<?= $rowd->contact_no ?>" required disabled>
                                            <p class="p-error" id="mobile_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email Address<span class="error">*</span></label>
                                            <input type="email" class="form-control"
                                                placeholder="Enter Email Id" id="email" name="email"
                                                value="<?= $rowd->email ?>" required disabled>
                                            <p class="p-error" id="email_error"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 mb-3">
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="1" checked>Google address
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" value="2">Manually address
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
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
                                </div>
                                <div class="row" id="manuallyEntryDiv">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Your Country<span class="error">*</span></label>
                                            <input type="hidden" name="country" value="101">
                                            <input type="text" id="country" value="India" class="form-control"
                                                required disabled>
                                            <p class="p-error" id="country_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Your State<span class="error">*</span></label>
                                            <select name="state" id="state" class="form-control select2"
                                                required>
                                                <option value="">Choose your state</option>
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
                                                <option value="">Choose your City</option>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Online Consultation<span class="error">*</span></label>
                                            <select name="is_online" id="is_online" class="form-control select2" required>
                                               <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Home Visit Consultation<span class="error">*</span></label>
                                            <select name="is_homevisit" id="is_homevisit" class="form-control select2"
                                                required>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <?php if(count($speciality_list) > 0) { ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Speciality<span class="error">*</span></label>
                                            <select name="speciality" id="speciality" class="form-control select2" required>
                                                <option value="">Choose your Speciality</option>
                                                <?php foreach($speciality_list as $row){ ?>
                                                <option value="<?php echo $row->id;?>">
                                                    <?php echo $row->title;?></option>
                                                <?php  } ?>
                                            </select>
                                            <p class="p-error" id="speciality_error"></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Promotional Discription<span class="error">*</span></label>
                                            <textarea class="form-control" rows="3" id="comment" name="comment" required></textarea>
                                            <p class="p-error" id="comment_error"></p>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary btnNext">Next</a>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-content">
                                <h3>Step 2</h3>
                                <div class="row">
                                    
                                    <div class="<?php if($rowd->category == 4){ echo'col-md-6';}else{'col-md-12';} ?>">
                                        <div class="form-group">
                                            <label for="name">Qulification<span
                                                    class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="Name of Course" id="UG_course" name="UG_course" required>
                                            <p class="p-error" id="UG_course_error"></p>
                                        </div>
                                    </div>
                                    <?php if($rowd->category == 4){ ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control" placeholder="Name Specialty"
                                                id="UG_speciality" name="UG_speciality" required>
                                            <p class="p-error" id="UG_speciality_error"></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control"
                                                placeholder="Name of College" id="UG_college" name="UG_college" required>
                                            <p class="p-error" id="UG_college_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control"
                                                placeholder="Name of University" id="UG_uni" name="UG_uni" required>
                                            <p class="p-error" id="UG_uni_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="name">&nbsp;</label>
                                            <select name="UG_year" id="UG_year" class="form-control" required></select>
                                            <p class="p-error" id="UG_year_error"></p>
                                        </div>
                                    </div>
                                </div>
                                <?php if($rowd->category == 4){ ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> Registration<span
                                                    class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="Name of MCI"
                                                id="UG_MCI" name="UG_MCI" required>
                                            <p class="p-error" id="UG_MCI_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">&nbsp;</label>
                                            <input type="text" class="form-control"
                                                placeholder="Registration No" id="UG_reg_no" name="UG_reg_no"
                                                required>
                                            <p class="p-error" id="UG_reg_no_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="name">&nbsp;</label>
                                            <select name="UG_MCI_year" id="UG_MCI_year" class="form-control"
                                                required></select>
                                            <p class="p-error" id="UG_MCI_year_error"></p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="ProductName">Work Expirience</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button class="float-right mt-32 btn btn-primary btn-sm" style="cursor: pointer;" type="button" id="add" onclick="addrow();">AddMore</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 table-responsive">
                                        <label>&nbsp;</label>
                                        <table class="table table-bordered table-striped table-sm"
                                            id="productdata">
                                            <thead>
                                                <tr style="background-color: #0140381a;">
                                                    <th>#</th>
                                                    <th>Company</th>
                                                    <th>Designation</th>
                                                    <th>Exp. year</th>
                                                </tr>
                                            <tbody>
                                                <tr id="1">
                                                    <td></td>
                                                    <td><input type="text" name="name1" id="name1" class="form-control"></td>
                                                    <td><input type="text" name="designation1" id="designation1" class="form-control"></td>
                                                    <td><input type="text" name="exp1" id="exp1" class="form-control"></td>
                                                    <input type="hidden" id="row" value="1">
                                                </tr>
                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                    <input type="hidden" id="TAbleDataArray" name="TAbleDataArray"></input>
                                </div>
                                <div class="row">
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
                                            <input type="text" class="form-control" id="adharcard_no" name="adharcard_no" maxlength="12" minlength="12" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                placeholder="Enter Adhaar Card No" />
                                            <p class="p-error" id="adharcard_no_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Upload ID Document(Pancard/Aadhar Card)<span class="error">*</span></label>
                                            <input type="file" class="form-control" id="pancard"
                                                name="pancard" />
                                            <p class="p-error" id="pancard_error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Upload Degree Certificate<span
                                                    class="error">*</span></label>
                                            <input type="file" class="form-control" id="UG_certificate"
                                                name="UG_certificate" />
                                            <p class="p-error" id="UG_certificate_error"></p>
                                        </div>
                                    </div>
                                    <?php if($rowd->category == 4) { ?> 
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
                                    <a class="btn btn-primary btnPrevious">Previous</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" id="submit_btn" class="book-now-btn form_btn mt-1 d-none" name="save_button" value="Register">
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
$("#fullname").bind('keyup', function(e) {
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
</script>
<script>
function validRow(rowid) {
    var isValid = true;
    var Name = $("#name" + rowid).val();
    var Designation = $("#designation" + rowid).val();
    var Expirience = $("#exp" + rowid).val();
    if (Name != '' && Designation != ''&& Expirience != '') {
        isValid = true;
    } else {
        isValid = false;
    }
    return isValid;
}
function addrow(){
    var rowid = $('#row').val();
    var value = '';
    if (validRow(rowid)) {
        var rowno = parseInt(rowid) + 1;
        value = value + '<tr id="' + rowno + '">';
        value = value + '<td><a onclick="deleterow(' + rowno + ')" style="cursor: pointer; color:red;">X</a></td>';
        value = value + '<td><input id="name' + rowno + '" name="name' + rowno + '" type="text" class="form-control"></input></td>';
        value = value + '<td><input id="designation' + rowno + '" name="designation' + rowno +
            '" type="text" class="form-control"></input></td>';
        value = value + '<td><input id="exp' + rowno + '" name="exp' + rowno + '" type="text" class="form-control"></input></td>';
        value = value + '</tr>';
        $('tbody').append(value);
        $('#row').val(rowno);
    }
}
function deleterow(rowid) {
    $('#' + rowid).remove();
}
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
        $('#UG_MCI_year').append($('<option />').val(i).html(i));
    }
    $("#submit_btn").addClass('d-none');
    $('ul.tabs li').click(function() {
        var tab_id = $(this).attr('data-tab');
        if (tab_id == 'tab-1') {
            ('#')
            $("#submit_btn").addClass('d-none');
            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');
            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        } else if (tab_id == 'tab-2') {
            if (validate_FirstTab()) {
                $('#comment_error').html("");
                $('#profile_error').html("");
                $('#name_error').html("");
                $('#gender_error').html("");
                $('#dob_error').html("");
                $('#mobile_error').html("");
                $('#country_error').html("");
                $('#state_error').html("");
                $('#city_error').html("");
                $('#pincode_error').html("");
                $('#email_error').html("");
                $('#manuallylocation_error').html("");
                $('#location_error').html("");
                $("#submit_btn").addClass('d-none');
                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');
                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            }
        } else if (tab_id == 'tab-3') {
            if (validate_FirstTab() && validate_SecondTab()) {
                $('#comment_error').html("");
                $('#profile_error').html("");
                $('#name_error').html("");
                $('#gender_error').html("");
                $('#dob_error').html("");
                $('#mobile_error').html("");
                $('#country_error').html("");
                $('#state_error').html("");
                $('#city_error').html("");
                $('#pincode_error').html("");
                $('#email_error').html("");
                $('#manuallylocation_error').html("");
                $('#location_error').html("");
                $('#UG_course_error').html("");
                $('#UG_speciality_error').html("");
                $('#UG_college_error').html("");
                $('#UG_uni_error').html("");
                $('#UG_uni_error').html("");
                $('#UG_MCI_error').html("");
                $('#UG_reg_no_error').html("");
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
            $("#submit_btn").addClass('d-none');
            $('.tabs > .current').next('li').trigger('click');
        }
    } else if ($('#tab-2').hasClass('current')) {
        if (validate_SecondTab()) {
            $('#comment_error').html("");
            $('#profile_error').html("");
            $('#name_error').html("");
            $('#gender_error').html("");
            $('#dob_error').html("");
            $('#mobile_error').html("");
            $('#country_error').html("");
            $('#state_error').html("");
            $('#city_error').html("");
            $('#pincode_error').html("");
            $('#email_error').html("");
            $('#manuallylocation_error').html("");
            $('#location_error').html("");
            $("#submit_btn").removeClass('d-none');
            $('.tabs > .current').next('li').trigger('click');
        }
    }
});
$('.btnPrevious').click(function() {
    if ($('#tab-1').hasClass('current')) {
        $("#submit_btn").addClass('d-none');
        $('#comment_error').html("");
        $('#profile_error').html("");
        $('#name_error').html("");
        $('#gender_error').html("");
        $('#dob_error').html("");
        $('#mobile_error').html("");
        $('#country_error').html("");
        $('#state_error').html("");
        $('#city_error').html("");
        $('#pincode_error').html("");
        $('#email_error').html("");
        $('#manuallylocation_error').html("");
        $('#location_error').html("");
    } else if ($('#tab-2').hasClass('current')) {
        $("#submit_btn").addClass('d-none');
    } else if ($('#tab-3').hasClass('current')) {
        $('#UG_course_error').html("");
        $('#UG_speciality_error').html("");
        $('#UG_college_error').html("");
        $('#UG_uni_error').html("");
        $('#UG_uni_error').html("");
        $('#UG_MCI_error').html("");
        $('#UG_reg_no_error').html("");
        $("#submit_btn").removeClass('d-none');
    }
    $('.tabs > .current').prev('li').trigger('click');
});
</script>
<script>
function validate_FirstTab() {
    var isValid = true;
    if ($('#profile')[0].checkValidity() == false) {
        $('#profile_error').html("Please Select File");
        isValid = false;
    }
    if ($('#fullname')[0].checkValidity() == false) {
        $('#name_error').html("Please Enter Name.");
        isValid = false;
    }
    if ($('#gender')[0].checkValidity() == false) {
        $('#gender_error').html("Please Select Gender");
        isValid = false;
    }
    if ($('#dob').val() == '') {
        $('#dob_error').html("Please Enter Valid DOB");
        isValid = false;
    }
    if ($('#mobile')[0].checkValidity() == false) {
        $('#mobile_error').html("Please Enter Contact Number.");
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
    if ($('#comment')[0].checkValidity() == false) {
        $('#comment_error').html("Please Enter Description");
        isValid = false;
    }
    if ($('#email')[0].checkValidity() == false) {
        $('#email_error').html("Please Enter Email Address.");
        isValid = false;
    }
    if ('<?php count($speciality_list) ?>' > 0) {
        if ($('#speciality').val() == '') {
            $('#speciality_error').html("Please Select Speciality");
            isValid = false;
        }
    }
    return isValid;
}
function validate_SecondTab(){
    var isValid = true;
    
        if ($('#UG_course')[0].checkValidity() == false) {
            $('#UG_course_error').html("Please Enter Course");
            isValid = false;
        }
    if('<?= $rowd->category ?>' == 4) {    
        if ($('#UG_speciality')[0].checkValidity() == false) {
            $('#UG_speciality_error').html("Please Enter Speciality");
            isValid = false;
        }
    }
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
    if ('<?= $rowd->category ?>' == 4) {
    if ($('#UG_MCI')[0].checkValidity() == false) {
        $('#UG_MCI_error').html("Please Enter MCI");
        isValid = false;
    }
    if ($('#UG_reg_no')[0].checkValidity() == false) {
        $('#UG_reg_no_error').html("Please Enter Registration No");
        isValid = false;
    }
    }
    return isValid;
}   
</script>
<script>
$(function() {
    $.validator.addMethod("pan", function(value, element) {
        return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
    }, "Invalid Pan Number");
    $("#form").validate({
        rules: {
            pancard: {
                required: true,
                extension: "jpg|jpeg|png|pdf",
            },
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
            UG_certificate: {
                required: true,
                extension: "jpg|jpeg|png|pdf",

            },
            UG_MCI_certificate: {
                required: function() {
                        return ('<?= $rowd->category ?>' == 4);
                    },
                extension: "jpg|jpeg|png|pdf",

            },
        },
        messages: {
            pancard: {
                required: "Please Select File",
            },
            pan: {
                required: "Please Enter PAN Number",
                remote: "This PAN No Is Already Exist!",
            },
            adharcard_no: {
                required: "Please Enter AdharCard Number",
                remote: "This Adhaar Card  Is Already Exist!",
            },
            UG_certificate: {
                required: "Please Select File",
            },
            UG_MCI_certificate: {
                required: "Please Select File",
            },
        },
    });
});
$('#form').submit(function() {
    if ($(this).valid()) {
        var myTableArray = [];
        var rowno = 0;
        var name = '';
        var designation = '';
        var exp = 0;
        var AllData = '';
        $("tbody tr").each(function() {
            rowno = this.id;
            name = $("#name" + this.id).val();
            designation = $("#designation" + this.id).val();
            exp = $("#exp" + this.id).val();
            myTableArray.push({
                "Rowno":rowno, 
                "Companyname":name,
                "Designation":designation,
                "Exp_Year":exp,
            });
        });
    }
    var jsoncovert = JSON.stringify(myTableArray);
    $('#TAbleDataArray').val(jsoncovert);
});
</script>