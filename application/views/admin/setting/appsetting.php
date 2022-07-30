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
                        echo '</div>';
                        }?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <!-- <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Home Consultation TDS Amount
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="home_visit_tds_amt" id="home_visit_tds_amt" placeholder="Enter TDS Amount" value="<?= $app_setting['home_visit_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Home Consultation Admin Charge
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="home_visit_admin_amt" id="home_visit_admin_amt" placeholder="Enter Admin Charge" value="<?= $app_setting['home_visit_admin_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div> -->
                        <!-- <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Online Consultation TDS Amount
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="online_visit_tds_amt" id="online_visit_tds_amt" placeholder="Enter TDS Amount" value="<?= $app_setting['online_visit_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div> -->
                        <!-- <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Online Consultation Admin Charge
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="online_visit_admin_amt" id="online_visit_admin_amt" placeholder="Enter Admin Charge" value="<?= $app_setting['online_visit_admin_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div> -->
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">For Pharmcy GST(%)  & Services Charges<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="pharmcy_tds_amt" id="pharmcy_tds_amt" placeholder="Enter TDS (%)" value="<?= $app_setting['pharmcy_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="pharmcy_service_charge" id="pharmcy_service_charge" placeholder="Enter Service Charge" value="<?= $app_setting['pharmcy_service_charge']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">For Pathology GST(%)  & Services Charges<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="pathology_tds_amt" id="pathology_tds_amt" placeholder="Enter TDS (%)" value="<?= $app_setting['pathology_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="pathology_service_charge" id="pathology_service_charge" placeholder="Enter Service Charge" value="<?= $app_setting['pathology_service_charge']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">For Radiology GST(%)  & Services Charges<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="radiology_tds_amt" id="radiology_tds_amt" placeholder="Enter TDS (%)" value="<?= $app_setting['radiology_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="radiology_service_charge" id="radiology_service_charge" placeholder="Enter Service Charge" value="<?= $app_setting['radiology_service_charge']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">For Doctor TDS(%)  & Services Charges<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="doctor_tds_amt" id="doctor_tds_amt" placeholder="Enter TDS (%)" value="<?= $app_setting['doctor_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="doctor_service_charge" id="doctor_service_charge" placeholder="Enter Service Charge" value="<?= $app_setting['doctor_service_charge']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">For Animal Doctor TDS(%) & Services Charges<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="animal_tds_amt" id="animal_tds_amt" placeholder="Enter TDS (%)" value="<?= $app_setting['animal_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="animal_service_charge" id="animal_service_charge" placeholder="Enter Service Charge" value="<?= $app_setting['animal_service_charge']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">For Nurse TDS(%)  & Services Charges<span class="error">*</span></label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="nurse_tds_amt" id="nurse_tds_amt" placeholder="Enter TDS (%)" value="<?= $app_setting['nurse_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="nurse_service_charge" id="nurse_service_charge" placeholder="Enter Service Charge" value="<?= $app_setting['nurse_service_charge']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">For Physiotherapist TDS(%)  & Services Charges<span class="error">*</span></label>
                            
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="physio_tds_amt" id="physio_tds_amt" placeholder="Enter TDS (%)" value="<?= $app_setting['physio_tds_amt']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" readonly>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="physio_service_charge" id="physio_service_charge" placeholder="Enter Service Charge" value="<?= $app_setting['physio_service_charge']; ?>" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Payment Mode
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input type="radio" name="radio_btn" id="radio_btn" value="0"  <?php if($app_setting['payment_mode']=='0'){ ?> checked <?php }?>>Test
                                <input type="radio" name="radio_btn" id="radio_btn" value="1" <?php if($app_setting['payment_mode']=='1'){ ?> checked <?php }?>>Live
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Test Razorpay Key ID
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="test_key" id="test_key" placeholder="Enter Razorpay Test Key" value="<?= $app_setting['test_key']; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Test Razorpay Secrate Key
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="test_secrate_key" id="test_secrate_key" placeholder="Enter Razorpay Test Secrate Key" value="<?= $app_setting['test_secrate_key']; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Live Razorpay Key ID
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="live_key" id="live_key" placeholder="Enter Razorpay Live Key" value="<?= $app_setting['live_key']; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-4 col-md-4 col-sm-4 col-form-label">Live Razorpay Secrate Key
                            <span class="error">*</span></label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="live_secrate_key" id="live_secrate_key" placeholder="Enter Razorpay Live Secrate Key" value="<?= $app_setting['live_secrate_key']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("app-setting"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace( 'description');
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
            // home_visit_tds_amt: {required:true,number:true},
            // home_visit_admin_amt: {required:true,number:true},
            // online_visit_tds_amt: {required:true,number:true},
            // online_visit_admin_amt: {required:true,number:true},
            pharmcy_tds_amt: {required:true,number:true},
            pharmcy_service_charge: {required:true,number:true},
            radology_tds_amt: {required:true,number:true},
            radology_service_charge: {required:true,number:true},
            pathology_tds_amt: {required:true,number:true},
            pathology_service_charge: {required:true,number:true},
            doctor_tds_amt: {required:true,number:true},
            doctor_service_charge: {required:true,number:true},
            animal_tds_amt: {required:true,number:true},
            animal_service_charge: {required:true,number:true},
            nurse_tds_amt: {required:true,number:true},
            nurse_service_charge: {required:true,number:true},
            physio_tds_amt: {required:true,number:true},
            physio_service_charge: {required:true,number:true},
            test_key: {required:true},
            test_secrate_key: {required:true},
            live_key: {required:true},
            live_secrate_key: {required:true},
        },
        messages: {
            // home_visit_tds_amt: {
            //     required:"Please Enter TDS Amount",
            //     number:"Please enter number only",
            // },
            // home_visit_admin_amt: {
            //     required:"Please Enter Admin Charge",
            //    number:"Please enter number only",
            // },
            // online_visit_tds_amt: {
            //     required:"Please Enter TDS Amount",
            //     number:"Please enter number only",
            // },
            // online_visit_admin_amt: {
            //     required:"Please Enter Admin Charge ",
            //     number:"Please enter number only",
            // },
            pharmcy_tds_amt: {
                required:"Please Enter TDS For Pharmcy",
                number:"Please enter number only",
            },
            pharmcy_service_charge: {
                required:"Please Enter Service Charge For Pharmcy",
               number:"Please enter number only",
            },
            pathology_tds_amt: {
                required:"Please Enter TDS For pathology lab",
                number:"Please enter number only",
            },
            pathology_service_charge: {
                required:"Please Enter Service Charge For pathology lab",
               number:"Please enter number only",
            },
            radiology_tds_amt: {
                required:"Please Enter TDS For Radiology Lab",
                number:"Please enter number only",
            },
            radiology_service_charge: {
                required:"Please Enter Service Charge For Radiology Lab",
               number:"Please enter number only",
            },
            doctor_tds_amt: {
                required:"Please Enter TDS For Doctor",
                number:"Please enter number only",
            },
            doctor_service_charge: {
                required:"Please Enter Service Charge For Doctor",
               number:"Please enter number only",
            },
            animal_tds_amt: {
                required:"Please Enter TDS For Animal Doctor",
                number:"Please enter number only",
            },
            animal_service_charge: {
                required:"Please Enter Service Charge For Animal Doctor",
                number:"Please enter number only",
            },
            nurse_tds_amt: {
                required:"Please Enter TDS For Nurse",
                number:"Please enter number only",
            },
            nurse_service_charge: {
                required:"Please Enter Service Charge For Nurse",
               number:"Please enter number only",
            },
            physio_tds_amt: {
                required:"Please Enter TDS For Physiotherapist",
                number:"Please enter number only",
            },
            physio_service_charge: {
                required:"Please Enter Service Charge For Physiotherapist ",
                number:"Please enter number only",
            },
            test_key: {required:"Please Enter Razorpay Test key"},
            test_secrate_key: {required:"Please Enter Razorpay Test Secrate key"},
            live_key: {required:"Please Enter Razorpay Live key"},
            live_secrate_key: {required:"Please Enter Razorpay Live Secrate key"},
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>