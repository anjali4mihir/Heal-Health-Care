<!DOCTYPE html>
<html lang="en">
<head>
<title> Heal Health & Medical </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<?php $this->load->view('front/common_css'); ?>
</head>
<body>
	
    <?php $this->load->view('front/common_header'); ?>

	<div class="page-banner">
        <img class="animation-element fadeUp animation-element-fast" src="<?= base_url(); ?>assets/img/profile-banner.jpg" alt="About Us">
    </div>

    <div class="form-wizard">
        <div class="container">
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
            <h1><?= $Category;?> <span> Profile </span> </h1>
			<form method="post" id="form" name="form" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
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
				<div class="form-wizard-wrapper">
					<ul>
						<li><a class="form-wizard-link active" href="javascript:void(0);" data-attr="info"><span>General Detail</span></a></li>
						<li><a class="form-wizard-link" href="javascript:void(0);" data-attr="ads"><span>Education Detail</span></a></li>
						<li><a class="form-wizard-link" href="javascript:void(0);" data-attr="placement"><span>Certificate Detail</span></a></li>
						<li class="form-wizardmove-button"></li>
					</ul>
					<div class="form-wizard-content-wrapper">
						<div class="form-wizard-content show" data-tab-content="info">
							<h3> Step 1 </h3>
							<div class="form-row">
								<div class="full-wdth">
									<label for=""> 
									<?php if(isset($name) && !empty($name)){
															echo $name;
										  } else { ?>
											 Enter <?php if($rowd->category == 1 ) { echo 'Store' ;}else{'Lab' ;} ?> Name    
										 <?php } ?> <span> * </span></label>
									<input type="text" class="text-field" placeholder="Enter Name" id="storename" name="storename" required>
								</div>
								<div class="form-column mt-2">
									<label for="email"> Email Address <span> * </span> </label>
									<input type="email" class="text-field" placeholder="Enter Email Address" id="email" name="email" value="<?= $rowd->email ?>" required disabled>
									<p class="error" id="email_error"></p>
								</div>
								<div class="form-column mt-2">
									<label for="flat_block"> Appartment Name/Road <span> * </span> </label>
									<input type="text" class="text-field" placeholder="Enter Flat or Block No" id="flat_block" name="flat_block" required>
									<p class="error" id="flat_block_error"></p>
								</div>
								<div class="form-column mt-2">
									<label for=""> Choose Google Location <span> * </span> </label>
									<input type="text" class="text-field" placeholder="Choose Google Location" id="location" name="location" required>
									<input type="hidden" name="g_lat" id="g_lat">
									<input type="hidden" name="g_lng" id="g_lng">
									<p class="error" id="location_error"></p>
								</div>
								<div class="form-column mt-2" id="google_address">
									<label for="map_link"> Enter Google Map Link <span> * </span> </label>
									<input type="url" class="text-field" placeholder="Enter Google Map Link" id="map_link" name="map_link">
									<p class="error" id="map_link_error"></p>
								</div>
								<div class="form-column mt-2">
									<label for="country"> Your Country <span> * </span> </label>
									<input type="text" class="text-field" placeholder="Country" id="hidden_country" value="" name="hidden_country" required disabled>
									<input type="hidden" id="country" value="" class="text-field" name="country">
									<p class="error" id="country_error"></p>
								</div>
								<div class="form-column mt-2">
									<label for="state"> Your State  <span> * </span> </label>
									<input type="text" class="text-field" placeholder="State" id="hidden_state" value="" name="hidden_state" required disabled>
									<input type="hidden" id="state" value="" class="text-field" name="state">
									<p class="error" id="state_error"></p>
								</div>
								<div class="form-column mt-2">
									<label for="city"> Your City <span> * </span> </label>
									<input type="text" class="text-field" placeholder="City" id="hidden_city" value="" name="hidden_city" required disabled>
									<input type="hidden" id="city" value="" class="text-field" name="city">
									<p class="error" id="city_error"></p>
								</div>
								<div class="form-column mt-2">
									<label for="Pincode"> Pincode  <span> * </span> </label>
									<input type="hidden" class="text-field" placeholder="Pincode" id="pincode" value="">
									<input type="tel" class="text-field" id="hidden_pincode" name="hidden_pincode" maxlength="6" minlength="6" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" required disabled placeholder="pincode">
									<p class="error" id="pincode_error"></p>
								</div>
								<?php if($rowd->category == 2 ) { ?>
								<div class="form-group checkbox">
									<input type="checkbox" name="homesample" id="homesample" value="1" checked>
									<label for="homesample">Home Sample Collection</label>
								</div>
								<div class="form-column" id="sampleChargesDiv">
									<div class="form-column mt-2">
										<label for="charges"> Charges  <span> * </span> </label>
										<select name="charges" id="charges" onchange="Charges()" class="text-field select2" required>
											<option value="">Choose Charges</option>
											<option value="Amount">Amount</option>
											<option value="Free">Free</option>
										</select>
										<p class="error" id="charges_error"></p>
									</div>
									<div class="form-column mt-2 d-none" id="amountDiv">
										<label for="amount">Amount<span>*</span></label>
										<input type="tel" name="amount" id="amount" maxlength="5" class="text-field" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
											placeholder="Enter Amount" required>
										<p class="error" id="amount_error"></p>
									</div>
								</div>
								<?php } ?>
								<div class="radio-btn">
									<div class="form-column">
										<p>
											<input type="radio" name="opttiming" value="1" id="option1" checked>
											<label for="option1">Open 24/7</label>
										</p>
										<p>
											<input type="radio" name="opttiming" value="2" id="option2">
											<label for="option2">Add Custom Timing</label>
										</p>
									</div>
								</div>
								<div class="week-timing d-none" id="CustomTimingDiv">
									<div class="full-wdth">
										<div class="form-group checkbox">
											<input type="checkbox" id="mon" name="days" value="Monday">
											<label for="mon">Monday</label>
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="start_mon" name="start_mon">
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="end_mon" name="end_mon">
										</div>
									</div>

									<div class="full-wdth">
										<div class="form-group checkbox">
											<input type="checkbox" id="tue" name="days" value="Tuesday">
											<label for="tue">Tuesday</label>
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="start_tue" name="start_tue">
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="end_tue" name="end_tue">
										</div>
									</div>

									<div class="full-wdth">
										<div class="form-group checkbox">
											<input type="checkbox" id="wed" name="days" value="Wednesday">
											<label for="wed">Wednesday</label>
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="start_wed" name="start_wed">
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="end_wed" name="end_wed">
										</div>
									</div>

									<div class="full-wdth">
										<div class="form-group checkbox">
											<input type="checkbox" id="thu" name="days" value="Thursday">
											<label for="thu">Thursday</label>
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="start_thu" name="start_thu">
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="end_thu" name="end_thu">
										</div>
									</div>

									<div class="full-wdth">
										<div class="form-group checkbox">
											<input type="checkbox" id="fri" name="days" value="Friday">
											<label for="fri">Friday</label>
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="start_fri" name="start_fri">
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="end_fri" name="end_fri">
										</div>
									</div>

									<div class="full-wdth">
										<div class="form-group checkbox">
											<input type="checkbox" id="sat" name="days" value="Saturday">
											<label for="sat">Saturday</label>
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="start_sat" name="start_sat">
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="end_sat" name="end_sat">
										</div>
									</div>

									<div class="full-wdth">
										<div class="form-group checkbox">
											<input type="checkbox" id="sun" name="days" value="Sunday">
											<label for="sun">Sunday</label>
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="start_sun" name="start_sun">
										</div>

										<div class="time-field">
											<input type="time" class="text-field" placeholder="Choose Charges" id="end_sun" name="end_sun">
										</div>
									</div>
									<input type="hidden" name="time_schedule" id="time_schedule">
								</div>
  
								<div class="full-wdth">
									<label for="comment">Promotional Description</label>
									<textarea rows="5" class="text-field bg-white" cols="50" id="comment" name="comment"></textarea>
								</div>
								<div class="full-wdth clearfix step-btn">
									<a href="javascript:void(0);" class="form-wizard-next-btn btnNext">Next</a>
								</div>
							</div>
						</div>
						<div class="form-wizard-content" data-tab-content="ads" style="display:none;">
							<h3> Step 2 </h3>
							
							<div class="form-row">
								<div class="form-column mt-2">
									<label for="gstin"> GSTIN <?php if($rowd->category == 4 || $rowd->category == 5 || $rowd->category == 6 || $rowd->category == 7){ ?> <span> * </span> <?php } ?></label>
									<input type="text" class="text-field" placeholder="GSTIN" id="gstin" name="gstin" maxlength="15" minlength="15">
									<p class="error" id="gastin_error"></p>
								</div>
								<?php if($rowd->category == 1){ ?>
								<div class="form-column mt-2">
                                    <label for="licence_no"> Licence No <span> * </span> </label>
                                    <input type="text" class="text-field" placeholder="Enter Licence No" id="licence_no" name="licence_no" <?php if($rowd->category == 1){ echo 'required';}?>>
									<p class="error" id="licence_no_error"></p>
                                </div>
								<?php } ?>
								<div class="form-column">
									<label for="profile">Upload Profile Image <span> * </span></label>
									<input type="file" class="text-field" id="profile" name="profile" required>
									<p class="error" id="profile_error"></p>
								</div>

								<div class="form-column mt-2">
									<label for="name"> Name of <?php if($rowd->category == 1){ echo 'Owner';} else{echo 'Doctor'; }?> <span> * </span> </label>
									<input type="text" class="text-field" placeholder="Enter Full Name" id="name" name="name" value="<?= $rowd->name ?>">
									<p class="error" id="name_error"></p>
								</div>
								<div class="form-column">
									<label for="gender"> Select Gender <span> * </span> </label>
									<div class="select">
										<select name="gender" id="gender" class="select2" required>
											<option value="">Choose Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<p class="error" id="gender_error"></p>
										</select>
									</div>
								</div>
								<?php if($rowd->category == 1){ ?>
								<div class="form-column">
                                    <label for="qualification">Qualification<span> * </span></label>
                                    <input type="text" class="text-field" placeholder="Qualification" name="qualification" id="qualification" <?php if($rowd->category == 1){ echo 'required';}?>>
									<p class="error" id="qualification_error"></p>
                                </div>
								<?php }else{ ?>
								<div class="full-wdth two-row">
									<label for="UG_college"> Qualification <span> * </span></label>
									<div class="multi-row-btm pt-0">
										<input type="text" class="text-field bg-white" placeholder="Name of College" id="UG_college" name="UG_college" <?php if($rowd->category != 1){ echo 'required';}?>>
										<p class="error" id="UG_college_error"></p>
										<input type="text" class="text-field bg-white" placeholder="Name of University" id="UG_uni" name="UG_uni" <?php if($rowd->category != 1){ echo 'required';}?>>
										<p class="error" id="UG_uni_error"></p>
										<select name="UG_year" id="UG_year" class="text-field bg-white" <?php if($rowd->category != 1){ echo 'required';}?>></select>
                                        <p class="error" id="UG_year_error"></p>
									</div>
								</div>
								<div class="full-wdth two-row">
									<label for="UG_MCI"> Registration <span> * </span></label>
									<div class="multi-row-btm pt-0">
										<input type="text" class="text-field bg-white" placeholder="Name of MCI" id="UG_MCI" name="UG_MCI" <?php if($rowd->category != 1){ echo 'required';}?>>
										<p class="error" id="UG_MCI_error"></p>
										<input type="text" class="text-field bg-white" placeholder="Registration No" id="UG_reg_no" name="UG_reg_no" <?php if($rowd->category != 1){ echo 'required';}?>>
										<p class="error" id="UG_reg_no_error"></p>
										<select name="UG_MCI_year" id="UG_MCI_year" class="text-field bg-white" <?php if($rowd->category != 1){ echo 'required';}?>></select>
										<p class="error" id="UG_MCI_year_error"></p>
									</div>
								</div>
								<?php } ?>
								<div class="full-wdth clearfix step-btn">
									<a href="javascript:;" class="form-wizard-previous-btn">Previous</a>
									<a href="javascript:;" class="form-wizard-next-btn">Next</a>
								</div>
							</div>
						</div>
						<div class="form-wizard-content" data-tab-content="placement" style="display:none;">
							<h3> Step 3 </h3>
							<div class="full-wdth mt-2">
								<label for="pan"> Pancard Number <span> * </span> </label>
								<input type="text" class="text-field" id="pan" name="pan" maxlength="10" minlength="10" placeholder="Enter PAN">
							</div>

							<div class="full-wdth">
								<label for="pancard">Upload ID Document(Pancard)<span> * </span></label>
								<input type="file" class="text-field" id="pancard" name="pancard">
							</div>

							<div class="full-wdth">
								<label for="gstin_certificate">Upload GSTIN Certificate <?php if($rowd->category == 2 || $rowd->category == 3) { ?><?php }else { ?><span>*</span></label><?php } ?></label>
								<input type="file" class="text-field" id="gstin_certificate" name="gstin_certificate" required>
								<p class="error" id="gstin_certificate_error"></p>
							</div>

							<div class="full-wdth">
								<label for="sign_board">Upload Sign-Board<span> * </span></label>
								<input type="file" class="text-field" id="sign_board" name="sign_board" required />
								<p class="error" id="sign_board_error"></p>
							</div>

							<div class="full-wdth">
								<label for="store_image">Upload Images Of <?php if($rowd->category == 1){ echo 'Store';} else{echo 'Lab'; }?> (Min 3 - Max 6)(Optional)</label>
								<input type="file" class="text-field" id="store_image" name="store_image[]" multiple>
								<p class="error" id="store_image_MAXerror" style="display:none;">Upload Max 5 Files allowed </p>
                                <p class="error" id="store_image_MINerror" style="display:none;">Upload Min 3 Files allowed <?php echo $rowd->category; ?></p>
							</div>
							
							<?php if($rowd->category == 1){ ?>
							<div class="full-wdth">
								<label for="degree_certi">DRUG Licence<span> * </span></label>
								<input type="file" class="text-field" id="degree_certi" name="degree_certi" required>
								<p class="error" id="degree_certi_error"></p>
							</div>

							<div class="full-wdth">
								<label for="UG_certificate">Upload Degree Certificate<span> * </span></label>
								<input type="file" class="text-field" id="UG_certificate" name="UG_certificate">
								<p class="error" id="UG_certificate_error"></p>
							</div>
							<?php } else{ ?>

							<div class="full-wdth">
								<label for="UG_certificate">Upload Degree Certificate<span> * </span></label>
								<input type="file" class="text-field" id="UG_certificate" name="UG_certificate">
								<p class="error" id="UG_certificate_error"></p>
							</div>

							<div class="full-wdth">
								<label for="UG_MCI_certificate">Upload Registration Certificate<span> * </span></label>
								<input type="file" class="text-field" id="UG_MCI_certificate" name="UG_MCI_certificate">
								<p class="error" id="UG_MCI_certificate_error"></p>
							</div>
							<?php } ?>

							<div class="full-wdth">
								<label for="corporation">Upload Corporation Registration(Optional)</label>
								<input type="file" class="text-field" id="corporation" name="corporation">
								<p class="error" id="corporation_error"></p>
							</div>

							<div class="full-wdth">
								<label for="stamp">Upload Authorized Stamp<span> * </span></label>
								<input type="file" class="text-field" id="stamp" name="stamp">
								<p class="error" id="stamp_error"></p>
							</div>

							<div class="full-wdth">
								<label for="symbol">Upload Auhtorized Signature<span> * </span></label>
								<input type="file" class="text-field" id="symbol" name="symbol">
								<p class="error" id="symbol_error"></p>
							</div>

							<div class="full-wdth clearfix step-btn">
								<a href="javascript:void(0);" class="form-wizard-previous-btn">Previous</a>
								<input type="submit" id="submit_btn" class="book-now-btn form_btn mt-1" name="save_button" value="Register">
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </div>
	<input type="hidden" name="address1" id="address1">

    <?php $this->load->view('front/common_footer'); ?>
	
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
		var show_fs, next_fs, previous_fs;
		var opacity;
		$('#error').delay(6000).fadeOut();

		var form = $("#form");
		
        jQuery(document).ready(function() {
            jQuery('.form-wizard-next-btn').click(function() {
				$.validator.addMethod("days", function(value, elem, param) {
					return $("#CustomTimingDiv input[type=checkbox]:checked").length > 0;
				},"You must select at least one day!");
				form.validate({
					errorElement: 'span',
					errorClass: 'error',
					highlight: function(element, errorClass, validClass) {
						$(element).closest('.form-column').addClass("has-error");
					},
					unhighlight: function(element, errorClass, validClass) {
						$(element).closest('.form-column').removeClass("has-error");
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
					var next = jQuery(this);
					next.parents('.form-wizard-content').removeClass('show');
					next.parents('.form-wizard-content').hide();
					next.parents('.form-wizard-content').next('.form-wizard-content').addClass('show');
					next.parents('.form-wizard-content').next('.form-wizard-content').show();
					jQuery(document).find('.form-wizard-content').each(function(){
						if(jQuery(this).hasClass('show')){
							var formAtrr = jQuery(this).attr('data-tab-content');
							jQuery(document).find('.form-wizard-wrapper li a').each(function(){
								if(jQuery(this).attr('data-attr') == formAtrr){
									jQuery(this).addClass('active');
									var innerWidth = jQuery(this).innerWidth();
									var position = jQuery(this).position();
									jQuery(document).find('.form-wizardmove-button').css({"left": position.left, "width": innerWidth});
								}else{
									jQuery(this).removeClass('active');
								}
							});
						}
					});
				}
            });
            jQuery('.form-wizard-previous-btn').click(function() {
                var prev =jQuery(this);
                prev.parents('.form-wizard-content').removeClass('show');
				prev.parents('.form-wizard-content').hide();
                prev.parents('.form-wizard-content').prev('.form-wizard-content').addClass('show');
				prev.parents('.form-wizard-content').prev('.form-wizard-content').show();
                jQuery(document).find('.form-wizard-content').each(function(){
                    if(jQuery(this).hasClass('show')){
                        var formAtrr = jQuery(this).attr('data-tab-content');
                        jQuery(document).find('.form-wizard-wrapper li a').each(function(){
                            if(jQuery(this).attr('data-attr') == formAtrr){
                                jQuery(this).addClass('active');
                                var innerWidth = jQuery(this).innerWidth();
                                var position = jQuery(this).position();
                                jQuery(document).find('.form-wizardmove-button').css({"left": position.left, "width": innerWidth});
                            }else{
                                jQuery(this).removeClass('active');
                            }
                        });
                    }
                });
            });
            });

    </script>

    <!--for add remove row in form-->
    <script>
        var $TABLE = $('#table');
        var $BTN = $('#export-btn');
        var $EXPORT = $('#export');

        $('.table-add').click(function() {
        var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
        $TABLE.find('table').append($clone);
        });

        $('.table-remove').click(function() {
        $(this).parents('tr').detach();
        });

        $('.table-up').click(function() {
        var $row = $(this).parents('tr');
        if ($row.index() === 1) return; // Don't go above the header
        $row.prev().before($row.get(0));
        });

        $('.table-down').click(function() {
        var $row = $(this).parents('tr');
        $row.next().after($row.get(0));
        });

        // A few jQuery helpers for exporting only
        jQuery.fn.pop = [].pop;
        jQuery.fn.shift = [].shift;

        $BTN.click(function() {
        var $rows = $TABLE.find('tr:not(:hidden)');
        var headers = [];
        var data = [];

        // Get the headers (add special header logic here)
        $($rows.shift()).find('th:not(:empty):not([data-attr-ignore])').each(function() {
            headers.push($(this).text().toLowerCase());
        });

        // Turn all existing rows into a loopable array
        $rows.each(function() {
            var $td = $(this).find('td');
            var h = {};

            // Use the headers from earlier to name our hash keys
            headers.forEach(function(header, i) {
            h[header] = $td.eq(i).text(); // will adapt for inputs if text is empty
            });

            data.push(h);
        });

        // Output the result
        $EXPORT.text(JSON.stringify(data));
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

</body>
</head>
</html>

