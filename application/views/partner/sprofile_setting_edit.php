<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card" >
            <div class="card-body">
                <div class="col-sm-12">
                    <h2 class="full_width job-post-title"><?= $page_title; ?></h2>
                </div>
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="mt-22">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?= base_url().'my-dashboard';?>">Home</a></li>
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
                        echo '</div>';}?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        
                        <h5>General Details</h5>
                        <hr>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Promotional Discription </label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5" id="comment" name="comment"><?php echo $profile_records->description; ?></textarea>
                            </div>
                        </div>
                       
                        <div class="form-group m-t-40 row">
                            <div class="col-md-6 mb-3">
                                <label class="radio-inline">
                                    <input type="radio" name="opttiming" value="1" <?php if($time_id=='1'){ ?> checked <?php } ?>>Open 24/7
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="opttiming" value="2" <?php if($time_id=='2'){ ?> checked <?php } ?>>Add Custom Timing
                                </label>
                            </div>
                            <div class="row">
							<div class="<?php if($time_id=='1'){ ?>  d-none <?php } ?>" id="CustomTimingDiv">
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
											<input type="time" id="tue_end" name="tue_end" class="form-control time-box">
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
                            </div>
                       	</div>
                        
                        
                    	<div class="form-group m-t-40 row">
							<label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Upload Images Of Store (min 3 - max 5)
							<span class="error">*</span></label>
							<div class="col-md-4">
								<input type="file" class="form-control" id="store_image" name="store_image[]" multiple />
							</div>
                        	<?php  $returnpath = $this->config->item('store_images_uploaded_path'); ?>
							<?php if($returnpath != ''){ 
								foreach($store_images as $k=>$cd) {?>
								<?php if(file_exists($returnpath.$cd->images)){ if($cd->images != ''){ ?>
									<div class="col-md-1">
										<img src="<?php echo $returnpath.$cd->images; ?>" class="img-thumbnail" height="70" width="70" />
									</div>
								<?php } } ?>
							<?php } } ?>
                    	</div>
                    
                        <h5>Profile Details</h5>
                        <hr>


                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Profile Image<span class="error">*</span></label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" id="profile" name="profile" />
                            </div>
                            <?php  $returnpath = $this->config->item('profile_images_uploaded_path'); ?>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <?php if(file_exists($returnpath.$profile_records->profile)){ if($profile_records->profile != ''){ ?>
                                <img src="<?php echo $returnpath.$profile_records->profile; ?>" class="img-thumbnail" height="70" width="70" />
                                <?php } } ?>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Stamp<span class="error">*</span></label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" id="stamp" name="stamp" />
                            </div>
                            <?php  $returnpath = $this->config->item('stamp_images_uploaded_path'); ?>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <?php if($profile_records->stamp != ''){ ?>
                                <img src="<?php echo $returnpath.$profile_records->stamp; ?>" class="img-thumbnail" height="70" width="70" />
                                <?php }  ?>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Symbol<span class="error">*</span></label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" id="symbol" name="symbol" />
                            </div>
                            <?php  $returnpath = $this->config->item('symbol_images_uploaded_path'); ?>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <?php if($profile_records->symbol != ''){ ?>
                                <img src="<?php echo $returnpath.$profile_records->symbol; ?>" class="img-thumbnail" height="70" width="70" />
                                <?php  } ?>
                            </div>
                            <?php } ?>
                        </div>



                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Name Of Owner
                                <span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="name of owner" id="name" name="name" value="<?php echo $profile_records->name; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Password
                            <span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Enter Email Id" value="<?php echo $profile_records->org_password; ?>" > 
                            </div>
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
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">DOB<span class="error">*</span></label>
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

                        <h5>Certificate Details</h5>
                        <hr>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Document ID Proof<span class="error">*</span></label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" id="pancard" name="pancard" />
                            </div>
                            <?php  $returnpath = $this->config->item('pancard_images_uploaded_path'); ?>
                            <?php if($returnpath != ''){ ?>
                             <div class="col-md-2">
                                <?php if(file_exists($returnpath.$profile_records->pancard)){ if($profile_records->pancard != ''){ ?>
                                <img src="<?php echo $returnpath.$profile_records->pancard; ?>" class="img-thumbnail" height="70" width="70" />
                                <?php } } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <h5>Bank Details</h5>
                        <hr>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Account No<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Account Number" id="account_no" name="account_no" value="<?php echo $profile_records->account_no; ?>">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Account Name<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Account Name" id="account_name" name="account_name" value="<?php echo $profile_records->account_name; ?>">
                            </div>
                        </div>

                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">IFSC Code<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="IFSC Code" id="ifsc_code" name="ifsc_code" value="<?php echo $profile_records->ifsc_code; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                            </div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("partners/profile-edit"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $('input[type=radio][name=opttiming]').change(function() {
    if (this.value == '1') {
        $('#CustomTimingDiv').addClass('d-none');
    }
    else if (this.value == '2') {
      $('#CustomTimingDiv').removeClass('d-none');
      nicescrollresize();
}
});
// $('input[type=radio][name=opttiming]').change(function() {
//     if (this.value == '1') {
//         $('#CustomTimingDiv').addClass('d-none');
//     } else if (this.value == '2') {
//         $('#CustomTimingDiv').removeClass('d-none');
//     }
//         });
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
<script>
    $(function() {
        $("#form").validate({
        rules: {
            description: {required:true},
            owner_name: {required:true},
            gender: {required:true},
        },
        messages: {
            name: {required:"Please Enter Owner Name"},
            owner_name: {required:"Please Enter Owner Name"},
            age: {required:"Please Select Age"},
            gender: {required:"Please Select Gender"},
        },
        submitHandler: function(form) {
           form.submit();
        }
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
                selected.push({
                    Day: this.value,
                    Strtime: str_time,
                    Endtime: end_time
                });
            });
        var jsoncovert = JSON.stringify(selected);
        $('#time_schedule').val(jsoncovert);
    }
});
</script>