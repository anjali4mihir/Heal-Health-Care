<!doctype html>
<html lang="en">
<head>
<title> Heal Health & Medical </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<?php $this->load->view('front/common_css'); ?>
</head>
<body>
    <?php $this->load->view('front/common_header'); ?>

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
            <div class="form-wizard-wrapper">
                <ul>
                    <li><a class="form-wizard-link active" href="javascript:;" data-attr="info"><span>General Detail</span></a></li>
                    <li><a class="form-wizard-link" href="javascript:;" data-attr="ads"><span>Education Detail</span></a></li>
                    <li><a class="form-wizard-link" href="javascript:;" data-attr="placement"><span>Certificate Detail</span></a></li>
                    <li class="form-wizardmove-button"></li>
                </ul>
                <div class="form-wizard-content-wrapper">
                    <div class="form-wizard-content show" data-tab-content="info">
                        <h3> Step 1 </h3>
                        <form method="post" id="form" name="form" accept-charset="utf-8"
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
                                    <label for=""> Email Address <span> * </span> </label>
                                    <input type="email" class="text-field" placeholder="Enter Email Address" id="email" name="email" value="<?= $rowd->email ?>" required disabled>
									<p class="p-error" id="email_error"></p>
                                </div>
                                <div class="form-column mt-2">
                                    <label for=""> Appartment Name/Road <span> * </span> </label>
                                    <input type="text" class="text-field" placeholder="Enter Flat or Block No" id="flat_block" name="flat_block" required>
									<p class="p-error" id="flat_block_error"></p>
                                </div>
                                <div class="form-column mt-2">
                                    <label for=""> Choose Google Location <span> * </span> </label>
                                    <input type="text" class="text-field" placeholder="Choose Google Location" id="location" name="location" required>
									<input type="hidden" name="g_lat" id="g_lat">
                                    <input type="hidden" name="g_lng" id="g_lng">
                                    <p class="p-error" id="location_error"></p>
                                </div>
                                <div class="form-column mt-2" id="google_address">
                                    <label for=""> Enter Google Map Link <span> * </span> </label>
                                    <input type="url" class="text-field" placeholder="Enter Google Map Link" id="map_link" name="map_link">
                                    <p class="p-error" id="map_link_error"></p>
                                </div>
                                <div class="form-column mt-2">
                                    <label for=""> Your Country <span> * </span> </label>
                                    <input type="text" class="text-field" placeholder="Country" id="hidden_country" value="" name="hidden_country" required disabled>
									<input type="hidden" id="country" value="" class="text-field" name="country">
                                    <p class="p-error" id="country_error"></p>
                                </div>
                                <div class="form-column mt-2">
                                    <label for=""> Your State  <span> * </span> </label>
                                    <input type="text" class="text-field" placeholder="State" id="hidden_state" value="" name="hidden_state" required disabled>
									<input type="hidden" id="state" value="" class="text-field" name="state">
                                    <p class="p-error" id="state_error"></p>
                                </div>
                                <div class="form-column mt-2">
                                    <label for=""> Your City <span> * </span> </label>
                                    <input type="text" class="text-field" placeholder="City" id="hidden_city" value="" name="hidden_city" required disabled>
									<input type="hidden" id="city" value="" class="text-field" name="city">
                                    <p class="p-error" id="city_error"></p>
                                </div>
                                <div class="form-column mt-2">
                                    <label for=""> Pincode  <span> * </span> </label>
                                    <input type="text" class="text-field" placeholder="Pincode" id="pincode" value="">
									<input type="tel" class="text-field" id="hidden_pincode" name="hidden_pincode" maxlength="6" minlength="6" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" required disabled placeholder="pincode">
                                    <p class="p-error" id="pincode_error"></p>
                                </div>
								<?php if($rowd->category == 2 ) { ?>
                                <div class="form-group checkbox">
                                    <input type="checkbox" name="homesample" id="homesample" value="1" checked>
                                    <label for="html">Home Sample Collection</label>
                                </div>
                                <div class="form-column mt-2">
                                    <label for=""> Charges  <span> * </span> </label>
                                    <select name="charges" id="charges" onchange="Charges()" class="text-field select2" required>
                                        <option value="">Choose Charges</option>
                                        <option value="Amount">Amount</option>
                                        <option value="Free">Free</option>
                                    </select>
                                    <p class="p-error" id="charges_error"></p>
                                </div>
								<div class="form-column mt-2" id="amountDiv">
									<label for="name">Amount<span>*</span></label>
									<input type="tel" name="amount" id="amount" maxlength="5" class="text-field" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
										placeholder="Enter Amount" required>
									<p class="p-error" id="amount_error"></p>
								</div>
								<?php } ?>
                                <div class="radio-btn">
                                    <div class="form-column">
                                        <p>
                                            <input type="radio" name="opttiming" value="1" checked>
                                            <label for="option1">Open 24/7</label>
                                        </p>
                                        <p>
                                            <input type="radio" name="opttiming" value="2">
                                            <label for="option2">Add Custom Timing</label>
                                        </p>
                                    </div>
                                </div>
                                <div class="week-timing d-none" id="CustomTimingDiv">
                                    <div class="full-wdth">
                                        <div class="form-group checkbox">
                                            <input type="checkbox" id="mon" name="days" value="Monday">
                                            <label for="monday">Monday</label>
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
                                            <label for="monday">Tuesday</label>
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
                                            <label for="monday">Wednesday</label>
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
                                            <label for="monday">Thursday</label>
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
                                            <label for="monday">Friday</label>
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
                                            <label for="monday">Saturday</label>
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
                                            <label for="monday">Sunday</label>
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
                                    <label for="">Promotional Description <span> * </span></label>
                                    <textarea rows="5" class="text-field bg-white" cols="50" id="comment" name="comment"></textarea>
                                </div>
                                <div class="full-wdth clearfix step-btn">
                                    <a href="javascript:;" class="form-wizard-next-btn">Next</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-wizard-content" data-tab-content="ads">
                        <h3> Step 2 </h3>
                        <form action="#">
                            <div class="form-row">
                                <div class="form-column mt-2">
                                    <label for=""> GSTIN <?php if($rowd->category == 4 || $rowd->category == 5 || $rowd->category == 6 || $rowd->category == 7){ ?> <span> * </span> <?php } ?></label>
                                    <input type="text" class="text-field" placeholder="GSTIN" id="gstin" name="gstin" maxlength="15" minlength="15">
									<p class="p-error" id="gastin_error"></p>
                                </div>
                                <div class="form-column">
                                    <label for="">Upload Profile Image <span> * </span></label>
                                    <input type="file" class="text-field" id="profile" name="profile" required>
									<p class="p-error" id="profile_error"></p>
                                </div>

                                <div class="form-column mt-2">
                                    <label for=""> Name of <?php if($rowd->category == 1){ echo 'Owner';} else{echo 'Doctor'; }?> <span> * </span> </label>
                                    <input type="text" class="text-field" placeholder="Enter Full Name" id="name" name="name" value="<?= $rowd->name ?>">
                                    <p class="p-error" id="name_error"></p>
                                </div>
                                <div class="form-column">
                                    <label for=""> Select Geneder <span> * </span> </label>
                                    <div class="select">
                                        <select name="gender" id="gender" class="select2" required>
                                            <option value="">Choose Geneder</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
											<p class="p-error" id="gender_error"></p>
                                        </select>
                                    </div>
                                </div>
                                <div class="full-wdth two-row">
                                    <label for=""> Qualification <span> * </span></label>
                                    <div class="multi-row-btm pt-0">
                                        <input type="text" class="text-field bg-white" placeholder="Name of MCI">
                                        <input type="text" class="text-field bg-white" placeholder="Registration No">
                                        <input type="text" class="text-field bg-white" placeholder="Year">
                                    </div>
                                </div>
                                <div class="full-wdth two-row">
                                    <label for=""> Registration <span> * </span></label>
                                    <div class="multi-row-btm pt-0">
                                        <input type="text" class="text-field bg-white" placeholder="Name of MCI">
                                        <input type="text" class="text-field bg-white" placeholder="Registration No">
                                        <input type="text" class="text-field bg-white" placeholder="Year">
                                    </div>
                                </div>
                                
                                <div class="full-wdth clearfix step-btn">
                                    <a href="javascript:;" class="form-wizard-previous-btn">Previous</a>
                                    <a href="javascript:;" class="form-wizard-next-btn">Next</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-wizard-content" data-tab-content="placement">
                        <h3> Step 3 </h3>
                        <form action="#">
                                <div class="full-wdth mt-2">
                                    <label for=""> Pancard Number <span> * </span> </label>
                                    <input type="email" class="text-field" placeholder="Enter PAN">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload ID Document(Pancard)<span> * </span></label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload GSTIN Certificate</label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload Sign-Board<span> * </span></label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload Images Of Lab(Min 3 - Max 6)(Optional)</label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload Degree Certificate<span> * </span></label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload Registration Certificate<span> * </span></label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload Corporation Registration(Optional)</label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload Authorized Stamp<span> * </span></label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth">
                                    <label for="">Upload Auhtorized Signature<span> * </span></label>
                                    <input type="file" class="text-field" id="myfile" name="myfile">
                                </div>

                                <div class="full-wdth clearfix step-btn">
                                    <a href="javascript:;" class="form-wizard-previous-btn">Previous</a>
                                    <a href="javascript:;" class="form-wizard-next-btn">Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('front/common_footer'); ?>
	
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
            jQuery('.form-wizard-next-btn').click(function() {
                var next = jQuery(this);
                next.parents('.form-wizard-content').removeClass('show');
                next.parents('.form-wizard-content').next('.form-wizard-content').addClass('show');
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
            jQuery('.form-wizard-previous-btn').click(function() {
                var prev =jQuery(this);
                prev.parents('.form-wizard-content').removeClass('show');
                prev.parents('.form-wizard-content').prev('.form-wizard-content').addClass('show');
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

</body>
</head>
</html>

