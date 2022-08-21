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
			$flag=0;
			if($rowd->category == 4){
				$Category = 'Doctors';
			}else if($rowd->category == 5){
				$Category = 'Veterinary Doctors';
			}else if($rowd->category == 6){
				$Category = 'Nurse';
				$flag=1;
			}else if($rowd->category == 7){
				$Category = 'Physiotherapist';
				$flag=1;
			}

			?>
            <h1> <?= $Category; ?> <span> Profile </span> </h1>
			<form class="form" method="post" id="form" name="form" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
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
								<label for="fullname">Enter Your Name <span> * </span></label>
								<input type="text" class="text-field" placeholder="Enter Full Name" id="fullname" name="fullname" value="<?= $rowd->name ?>" required disabled>
                                 <p class="p-error" id="name_error"></p>
							</div>
							<div class="full-wdth">
								<label for="profile">Upload Profile Image <span> * </span></label>
								<input type="file" class="text-field" id="profile" name="profile" accept="image/png, image/gif, image/jpeg" required>
								<p class="p-error" id="profile_error"></p>
							</div>
							<div class="form-column mt-2">
								<label for="gender"> Select Geneder <span> * </span> </label>
								<div class="select">
									<select id="standard-select" name="gender" id="gender"required>
										<option value="">Choose Geneder</option>
										<option value="Male">Male</option>
                                        <option value="Female">Female</option>
									</select>
									<p class="p-error" id="gender_error"></p>
								</div>
							</div>
							<div class="form-column mt-2">
								<label for="dob"> Birth Date <span> * </span> </label>
								<input type="text" class="text-field" data-toggle="datepicker" id="dob" name="dob" placeholder="DD-MM-YYYY" readonly='true' required>
								<p class="p-error" id="dob_error"></p>
							</div>
							<div class="form-column mt-2">
								<label for="mobile"> Mobile Number <span> * </span> </label>
								<input type="tel" class="text-field" placeholder="Mobile Number" id="mobile" name="mobile" value="<?= $rowd->contact_no ?>" required disabled>
								<p class="p-error" id="mobile_error"></p>
							</div>
							<div class="form-column mt-2">
								<label for="email"> Email Address <span> * </span> </label>
								<input type="email" class="text-field" placeholder="Email Address" id="email" name="email" value="<?= $rowd->email ?>" required disabled>
								<p class="p-error" id="email_error"></p>
							</div>
							<div class="full-wdth">
								<label for="flat_block">Flat/Block No <span> * </span></label>
								<input type="text" class="text-field bg-white" placeholder="Enter Flat or Block No" id="flat_block" name="flat_block" required>
							</div>
							<div class="full-wdth">
								<label for="location">Choose Google Location <span> * </span></label>
								<input type="text" class="text-field" placeholder="Choose Google Location" id="location" name="location" required>
								<input type="hidden" name="g_lat" id="g_lat">
								<input type="hidden" name="g_lng" id="g_lng">
							</div>
							<div class="form-column mt-2" id="manuallyEntryDiv">
								<label for="country"> Your Country <span> * </span> </label>
								<input type="text" class="text-field" placeholder="Country" id="hidden_country" value="" name="hidden_country" required disabled>
                                <input type="hidden" id="country" value="" class="text-field" name="country">
                                <p class="p-error" id="country_error"></p>
							</div>
							<div class="form-column mt-2">
								<label for="state"> Your State <span> * </span> </label>
								<input type="text" class="text-field" placeholder="State" id="hidden_state" value="" name="hidden_state" required disabled>
                                <input type="hidden" id="state" value="" class="text-field" name="state">
								<p class="p-error" id="state_error"></p>
							</div>
							<div class="form-column mt-2">
								<label for="city"> Your City <span> * </span> </label>
								<input type="text" class="text-field" placeholder="City" id="hidden_city" value="" name="hidden_city" required disabled>
								<input type="hidden" id="city" value="" class="text-field" name="city">
								<p class="p-error" id="city_error"></p>
							</div>
							<div class="form-column mt-2">
								<label for="pincode"> Pincode <span> * </span> </label>
								<input type="hidden" id="pincode" value="" class="text-field" placeholder="Pincode">
								<input type="tel" class="text-field" id="hidden_pincode" name="hidden_pincode" maxlength="6" minlength="6" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" required disabled placeholder="pincode">
                                <p class="p-error" id="pincode_error"></p>
							</div>
							<div class="form-column mt-2" <?php if($flag==1){ echo 'd-none';} ?> >
								<label for="is_online"> Online Consultation <span> * </span> </label>
								<select name="is_online" id="is_online" class="text-field" required>
									<option value="1">Yes</option>
									<option value="0" <?php if($flag==1){ echo 'selected';} ?> >No</option>
								</select>
							</div>
							<div class="<?php if($flag==1){ ?>full-wdth <?php }else{?>form-column mt-2<?php } ?>">
								<?php 
								if($rowd->category == 4){
									$Category = 'Home Consultation';
								}else if($rowd->category == 5){
									$Category = 'Home Consultation';
								}else {
									 $Category = 'Home Visit';
								} ?>
								<label for="is_homevisit"><?= $Category; ?><span>*</span></label>
								<select name="is_homevisit" id="is_homevisit" class="text-field" required>
									<option value="1">Yes</option>
									<option value="0" <?php if($flag==1){ echo "disabled";} ?>>No</option>
								</select>
							</div>
							<?php if(count($speciality_list) > 0) { ?>
							<div class="full-wdth <?php if($flag==1){ echo 'd-none';} ?>">
								<label for="speciality">Speciality <span> * </span></label>
								<select name="speciality" id="speciality" class="text-field" required>
									<option value="">Choose your Speciality</option>
									<?php foreach($speciality_list as $row){ ?>
									<option value="<?php echo $row->id;?>">
										<?php echo $row->title;?></option>
									<?php  } ?>
								</select>
								<p class="p-error" id="speciality_error"></p>
							</div>
							<?php } ?>
							<div class="full-wdth">
								<label for="comment">Promotional Description <span> * </span></label>
								<textarea rows="5" class="text-field bg-white" cols="50" id="comment" name="comment"></textarea>
								<p class="p-error" id="comment_error"></p>
							</div>
							<div class="full-wdth clearfix step-btn">
								<a href="javascript:void(0);" class="form-wizard-next-btn">Next</a>
							</div>
						</div>
                    </div>
                    <div class="form-wizard-content" data-tab-content="ads" style="display:none;">
                        <h3> Step 2 </h3>
						<div class="form-row">
							<div class="<?php if($rowd->category == 4){ ?>form-column mt-2 <?php }else{?>full-wdth <?php } ?> two-row">
								<label for="">Qualification<span> * </span></label>
								<div class="multi-row">
									<input type="text" class="text-field bg-white" placeholder="Name of Course" id="UG_course" name="UG_course" required>
									<p class="p-error" id="UG_course_error"></p>
									<?php if($rowd->category == 4){ ?>
										<input type="text" class="text-field bg-white" placeholder="Name of Speciality" id="UG_speciality" name="UG_speciality" required>
										<p class="p-error" id="UG_speciality_error"></p>
									<?php } ?>
                                </div>
								<div class="multi-row-btm">
									<input type="text" class="text-field bg-white" placeholder="Name of Collage" id="UG_college" name="UG_college" required>
									<p class="p-error" id="UG_college_error"></p>
									<input type="text" class="text-field bg-white" placeholder="Name of University" id="UG_uni" name="UG_uni" required>
									<p class="p-error" id="UG_uni_error"></p>
									<select name="UG_year" id="UG_year" class="text-field bg-white" required></select>
                                    <p class="p-error" id="UG_year_error"></p>
								</div>
							</div>
							<?php if($rowd->category == 4 || $rowd->category == 5){ ?>
							<div class="full-wdth two-row">
								<label for=""> Registration <span> * </span></label>
								<div class="multi-row-btm pt-0">
									<input type="text" class="text-field bg-white" placeholder="Name of MCI" id="UG_MCI" name="UG_MCI" required>
									<p class="p-error" id="UG_MCI_error"></p>
									<input type="text" class="text-field bg-white" placeholder="Registration No" id="UG_reg_no" name="UG_reg_no" required>
                                    <p class="p-error" id="UG_reg_no_error"></p>
									<select name="UG_MCI_year" id="UG_MCI_year" class="text-field bg-white" required></select>
                                    <p class="p-error" id="UG_MCI_year_error"></p>
								</div>
							</div>
							<?php } ?>
							<div class="full-wdth profile-table-top">
								<label for="ProductName"> Work Experience <span> * </span></label>
								<div class="profile-table">
									<div id="table" class="table-editable">
										<button class="table-add glyphicon glyphicon-plus" id="add" onclick="addrow();" type="button"> Add </button>
										<table class="table" id="productdata">
										<thead>
										  <tr>
											<th>#</th>
											<th>Company</th>
											<th>Designation</th>
											<th>Exp. year</th>
										  </tr>
										 <tbody id="productbody">
										  <tr id="1">
											<td></td>
											<td contenteditable="true" data-attr-value="42"> <input type="text" class="text-field bg-white" name="name1" id="name1"> </td>
											<td contenteditable="true" data-attr-key="42"> <input type="text" class="text-field bg-white" name="designation1" id="designation1"> </td>
											<td contenteditable="true" data-attr-key="42"><input type="text" name="exp1" id="exp1" class="text-field bg-white"></td>
											<input type="hidden" id="row" value="1">
										  </tr>
										  </tbody>
                                            </thead>
										</table>
									  </div>
									<input type="hidden" id="TAbleDataArray" name="TAbleDataArray"></input>
								</div>
							</div>

							<div class="full-wdth clearfix step-btn">
								<a href="javascript:void(0);" class="form-wizard-previous-btn">Previous</a>
								<a href="javascript:void(0);" class="form-wizard-next-btn">Next</a>
							</div>
						</div>
                    </div>
                    <div class="form-wizard-content" data-tab-content="placement" style="display:none;">
                        <h3> Step 3 </h3>
						<div class="form-row">
							<div class="full-wdth">
								<label for=""> Choose Id Proof <span> * </span> </label>
								<div class="select">
									<select id="standard-select" name="chooseID" id="chooseID" onchange="hideshowID();" required>
										<option value="">Choose your ID</option>
										<?php /* <option value="1">Aadharcard</option> */ ?>
										<option value="2">Pan Card</option>
									</select>
								</div>
							</div>
							<div class="full-wdth d-none" id="PancardDiv">
								<label for="pan">Pancard Number<span> * </span></label>
								<input type="text" class="text-field bg-white" id="pan" name="pan" maxlength="10" minlength="10" placeholder="Enter PAN" required accept="image/png, image/gif, image/jpeg">
								<p class="p-error" id="pancard_no_error"></p>
							</div>
							<div class="full-wdth d-none" id="AdharcardDiv">
								<label for="adharcard_no">Adhaar Card Number<span id="AadharErrorSpan"> * </span></label>
								<input type="text" class="text-field bg-white" id="adharcard_no" name="adharcard_no" maxlength="12" minlength="12" onkeypress="if(isNaN(this.value + String.fromCharCode(event.keyCode))) return false;" placeholder="Enter Adhaar Card No" required>
								<p class="p-error" id="adharcard_no_error"></p>
							</div>
							<div class="full-wdth">
								<label for="pancard">Upload Pancard ID Document <span id="AadharPanErrorSpan"> * </span></label>
								<input type="file" class="text-field" id="pancard" name="pancard" accept="image/png, image/gif, image/jpeg" required>
								<p class="p-error" id="pancard_error"></p>
							</div>

							<div class="full-wdth">
								<label for="UG_certificate">Upload Degree Certificate <span> * </span></label>
								<input type="file" class="text-field" accept="image/png, image/gif, image/jpeg"  class="text-field" id="UG_certificate" name="UG_certificate" required>
								<p class="p-error" id="UG_certificate_error"></p>
							</div>
							<?php if($rowd->category == 4 || $rowd->category == 5) { ?>
							<div class="full-wdth">
								<label for="">Upload Registration Certificate <span> * </span></label>
								<input type="file" class="text-field" id="UG_MCI_certificate" name="UG_MCI_certificate" accept="image/png, image/gif, image/jpeg" required>
								<p class="p-error" id="UG_MCI_certificate_error"></p>
							</div>
							<?php } ?>
							<div class="full-wdth clearfix step-btn">
								<a href="javascript:void(0);" class="form-wizard-previous-btn">Previous</a>
								<input type="submit" id="submit_btn" class="book-now-btn form_btn mt-1" name="save_button" value="Register">
							</div>
						</div>
                    </div>
                </div>
            </div>
			</form>
        </div>
    </div>
	<?php $this->load->view('front/common_footer'); ?>
</body>
</head>
</html>

<script>
	jQuery(document).ready(function() {
		jQuery('.form-wizard-wrapper').find('.form-wizard-link').click(function(){
                jQuery('.form-wizard-link').removeClass('active');
                var innerWidth = jQuery(this).innerWidth();
                jQuery(this).addClass('active');
                var position = jQuery(this).position();
                jQuery('.form-wizardmove-button').css({"left": position.left, "width": innerWidth});
                var attr = jQuery(this).attr('data-attr');
                jQuery('.form-wizard-content').each(function(){
                    if (jQuery(this).attr('data-tab-content') == attr) {
                        jQuery(this).addClass('show');
                    }else{
                        jQuery(this).removeClass('show');
                    }
                });
            });
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
		}).on('change', function(ev) {
			if($('#dob').valid()){
			   $('#dob_error').removeClass('error');   
			}
		 });
		var current_fs, next_fs, previous_fs;
		var opacity;
		$('#error').delay(6000).fadeOut();


			var form = $("#form");

			$.validator.addMethod("pan", function(value, element) {
				return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
			}, "Invalid Pan Number");
		
		jQuery('.form-wizard-next-btn').click(function() {
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
					comment:{
						required:false,
					},
					profile:{
							required:true,  
							extension: "jpg|jpeg|png",
					},
					gender:{
						required:true,
					},
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
					city:{
						required:true,
					},
					state:{
						required:true,
					},
					dob:{
						required:true,
					},
					pincode:{
						required:true,
						number: true,
						minlength:6,
						maxlength:6,
					},
					is_online:{
						required:true,
					},
					is_homevisit:{
						required:true,
					},
					speciality:{
						required:true,
					},
					UG_course:{
						required:true,
					},
					UG_speciality:{
						required:true,
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
					UG_MCI:{
						required:true,
					},
					UG_reg_no:{
						required:true,
					},
					UG_MCI_year:{
						required:true,
					},
					chooseID:{
						required:true,
					},
					pancard: {
						extension: "jpg|jpeg|png",
					},
					pan: {
						required:function() {
							return ($("#chooseID option:selected" ).val() == 2);
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
						// required:function() {
						//     return ($("#chooseID option:selected" ).val() == 2);
						// },
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
						extension: "jpg|jpeg|png",

					},
					UG_MCI_certificate: {
						required: function() {
								return ('<?= $rowd->category ?>' == 4);
							},
						extension: "jpg|jpeg|png",

					},
				},
				messages: {
					// comment:{
					//     required:"Add Promotional Details",
					// },
					profile:{
							required:"Please Select File",
							extension: "Image Extension Must be jpg|jpeg|png",  
					},
					gender:{
						required:"Select Gender",
					},
					flat_block:{
						required:"Enter flat or block no",
					},
					location:{
						required:"Enter location",
					},
					map_link:{
						required:"Add Map-link",
						url:"Enter Valid Url",
					},
					city:{
						required:"Please enter your city name",
					},
					state:{
						required:"Please enter your state name",
					},
					dob:{
						required:"Add Birth Date",
					},
					pincode:{
						required:"Please enter your pincode",
						minlength:"minimum length is 6",
						maxlength:"maximum length is 6",
					},
					is_online:{
						required:"Please Select Above",
					},
					is_homevisit:{
						required:"Please Select Above",
					},
					speciality:{
						required:"Please Select Your Speciality",
					},
					UG_course:{
						required:"Please Enter Course Name",
					},
					UG_speciality:{
						required:"Please Enter Course Speciality Name",
					},
					UG_college:{
						required:"Please Enter College Name",
					},
					UG_uni:{
						required:"Please Enter University Name",
					},
					UG_year:{
						required:"Select Year",
					},
					UG_MCI:{
						required:"Enter Name of MCI",
					},
					UG_reg_no:{
						required:"Please Enter Registration No",
					},
					UG_MCI_year:{
						required:"Please Enter Year",
					},
					chooseID:{
						required:"Please Select Proof",
					},
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
						extension: "Image Extension Must be jpg|jpeg|png",
					},
					UG_MCI_certificate: {
						required: "Please Select File",
						extension: "Image Extension Must be jpg|jpeg|png",
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
 function hideshowID()
 {
    if($("#chooseID option:selected" ).val() == 1)
    {
        $('#PancardDiv').addClass('d-none');
        $('#pan').val('');
        $('#AdharcardDiv').removeClass('d-none');
        $("#AadharErrorSpan").hide();
        $("#AadharPanErrorSpan").hide();
        $("#adharcard_no").removeAttr('required');
        $("#pancard").removeAttr('required');
    }else if($("#chooseID option:selected" ).val() == 2){
        $('#AdharcardDiv').addClass('d-none');
        $('#adharcard_no').val('');
        $('#PancardDiv').removeClass('d-none');
        $("#AadharErrorSpan").show();
        $("#AadharPanErrorSpan").show();
        $("#adharcard_no").removeAttr('required');
        $("#pancard").prop('required',true);
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
    });
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
        value = value + '<td contenteditable="true" data-attr-value="42"><a onclick="deleterow(' + rowno + ')" style="cursor: pointer; color:red;">X</a></td>';
        value = value + '<td contenteditable="true" data-attr-value="42"><input id="name' + rowno + '" name="name' + rowno + '" type="text" class="text-field bg-white"></input></td>';
        value = value + '<td contenteditable="true" data-attr-value="42"><input id="designation' + rowno + '" name="designation' + rowno +'" type="text" class="text-field bg-white"></input></td>';
        value = value + '<td contenteditable="true" data-attr-value="42"><input id="exp' + rowno + '" name="exp' + rowno + '" type="text" class="text-field bg-white"></input></td>';
        value = value + '</tr>';
        $('#productbody').append(value);
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
    
        // $('#country').val(country);
        // $('#state').val(state);
        // $('#city').val(city);
        // $('#pincode').val(pin);
        // $('#location').val(tmp_address);
  // 

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
    
    
});
</script>

<script>
$(function() {
    $.validator.addMethod("pan", function(value, element) {
        return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
    }, "Invalid Pan Number");
    
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