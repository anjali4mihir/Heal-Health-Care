<style>
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
<div class="full_width main_contentt mc_inner">
	<div class="full_width main_contentt_padd">
		<div class="col-sm-12">
            <h2 class="full_width job-post-title"><?= $title; ?></h2>
        </div>
        <div class="col-sm-12">
            <nav aria-label="breadcrumb" class="mt-22">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?= base_url().'my-dashboard';?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </nav>
        </div>
		<div class="full_width c_info_details">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row_eq_height">
					<div class="d-flex align-items-top w_100">
						<div class="full_width c_infos">
							<div class="full_width loading-box">
								<h4>Profile Information</h4>
								<ul><a href="<?= base_url().'partners/profile-edit' ?> " class="btn btn-sm btn-warning">EDIT</a></ul>
							</div>
							<div class="full_width c_i_details">
                                <table class="table table-hover table-bordered detail-view">
                                    <tbody>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Category</strong></th>
                                            <td width="75%"><?= $data['category_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Profile Image</strong></th>
                                            <td width="75%"><img src="<?= partner_image($data['id']) ?>" height="100px" width="100px"/></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong><?php if($data['category'] == 1){ echo 'Store' ;} else{ echo 'Lab' ;} ?> Name</strong></th>
                                            <td width="75%"><?= $storedata->store_name; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Owner Name</strong></th>
                                            <td width="75%"><?= $storedata->name; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Email Id</strong></th>
                                            <td width="75%"><?= $data['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Password</strong></th>
                                            <td width="75%"><?= $data['org_password']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Contact No</strong></th>
                                            <td width="75%"><?= $data['contact_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Address</strong></th>
                                            <td width="75%"><?= $data['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>City</strong></th>
                                            <td width="75%"><?= $cityname->name; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>State</strong></th>
                                            <td width="75%"><?= $statename->name; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Country</strong></th>
                                            <td width="75%"><?= $countryname->name; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Google Map link</strong></th>
                                            <td width="75%"><?= $data['map_link']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Location</strong></th>
                                            <td width="75%"><div class="map" id="map" style="width 550px; height: 250px;"></div>
                                            <input type="hidden" name="vCurrentLatitude" id="lat" value="<?= $data['latitude']; ?>">
                                            <input type="hidden" name="vCurrentLongitude" id="lng" value="<?= $data['longitude']; ?>"></td>
                                        </tr>
                                        <?php
                                        if(isset($time_id) &&  $time_id=='2')
                                        {
                                        ?>
                                        <?php if($storetiming > 0 && isset($storetiming)){ ?> 
                                        <tr>
                                            <th scope="row" width="25%"><strong>Open Timing</strong></th>
                                            <td width="75%">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Day</th>
                                                        <th scope="col">From</th>
                                                        <th scope="col">To</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php for($i=0; $i < count($storetiming);$i++){ ?>
                                                      <tr>
                                                      <td>
                                                        <?php if(isset($storetiming[$i]->Day)) { ?>
                                                            <?= $storetiming[$i]->Day ?>
                                                        <?php } ?>    
                                                        </td>
                                                      <td>
                                                         <?php if(isset($storetiming[$i]->Strtime)) { ?>
                                                            <?= $storetiming[$i]->Strtime ?>
                                                        <?php } ?>    
                                                      </td>
                                                      <td>
                                                        <?php if(isset($storetiming[$i]->Endtime)) { ?>
                                                            <?= $storetiming[$i]->Endtime ?>
                                                        <?php } ?>
                                                        </td>
                                                      </tr>
                                                   <?php } ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php } }else{ ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Open Timing</strong></th>
                                            <td width="75%"><?= $storetiming ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if($storedata->description != '') {?> 
                                    <tr>
                                        <th scope="row" width="25%"><strong>Comments</strong></th>
                                        <td width="75%"><?= $storedata->description; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>GSTIN</strong></th>
                                        <td width="75%"><?= $storedata->gstin; ?></td>
                                    </tr>
                                    <?php if($data['category'] == 1){  ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Licence No</strong></th>
                                        <td width="75%"><?= $storedata->licence_no; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Owner Qualification</strong></th>
                                        <td width="75%"><?= $storedata->qualification; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Account No</strong></th>
                                        <td width="75%"><?= $storedata->account_no; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Account Name</strong></th>
                                        <td width="75%"><?= $storedata->account_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong><?php if($data['category'] == 1){ echo 'Store' ;} else{ echo 'Lab' ;} ?> Images</strong></th>
                                        <?php  $returnpath = $this->config->item('store_images_uploaded_path'); ?>
                                        <td width="75%">
                                            <?php if($returnpath != ''){ 
                                            foreach($store_images as $k=>$cd) { if(file_exists($returnpath.$cd->images)){ if($cd->images != ''){?>

                                            <img src="<?php echo $returnpath.$cd->images; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } } } ?>
                                        </td>
                                    </tr>
                                    <?php if($storedata->pan != ''){ ?> 
                                    <tr>
                                        <th scope="row" width="25%"><strong>Pancard No</strong></th>
                                        <td width="75%"><?= $storedata->pan; ?></td>
                                    </tr>
                                    <?php } else { ?> 
                                    <tr>
                                        <th scope="row" width="25%"><strong>Adhaar Card No</strong></th>
                                        <td width="75%"><?= $storedata->adharcard_no; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Document ID Proof</strong></th>
                                        <?php  $returnpath = $this->config->item('pancard_images_uploaded_path'); ?>
                                        <td width="75%">
                                            <?php if(file_exists($returnpath.$storedata->pancard)){ if($storedata->pancard != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->pancard; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Sign-Board</strong></th>
                                        <?php  $returnpath = $this->config->item('sign_board_images_uploaded_path'); ?>
                                        <td width="75%">
                                            <?php if(file_exists($returnpath.$storedata->sign_board)){ if($storedata->sign_board != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->sign_board; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong>GSTIN Certificate</strong></th>
                                        <?php  $returnpath = $this->config->item('gst_certificate_images_uploaded_path'); ?>
                                        <td width="75%">
                                            <?php if(file_exists($returnpath.$storedata->gstin_certificate)){ if($storedata->gstin_certificate != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->gstin_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?>
                                        </td>
                                    </tr>
                                    <?php if($data['category'] == 1) { ?> 
                                    <tr>
                                        <th scope="row" width="25%"><strong>B.PHARM Licence</strong></th>
                                        <?php  $returnpath = $this->config->item('bpharm_lience_images_uploaded_path'); ?>
                                        <td width="75%">
                                            <?php if(file_exists($returnpath.$storedata->bpharm_licence)){ if($storedata->bpharm_licence != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->bpharm_licence; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong>B.PHARM/M.PHARM Degree Certificate</strong></th>
                                        <?php  $returnpath = $this->config->item('degree_certi_images_uploaded_path'); ?>
                                        <td width="75%">
                                            <?php if(file_exists($returnpath.$storedata->degree_certificate)){ if($storedata->degree_certificate != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->degree_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($storedata->corporation != ''){ ?> 
                                    <tr>
                                        <th scope="row" width="25%"><strong>Corporation Registration</strong></th>
                                        <?php  $returnpath = $this->config->item('corporation_images_uploaded_path'); ?>
                                        <td width="75%">
                                            <?php if(file_exists($returnpath.$storedata->corporation)){ if($storedata->corporation != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->corporation; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($data['category'] != 1) { ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>UG degree Certificate</strong></th>
                                        <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
                                        <td width="75%">
                                        <?php if($returnpath != ''){ ?>
                                            <?php if(file_exists($returnpath.$storedata->ug_certificate)){ if($storedata->ug_certificate != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->ug_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?> 
                                        <?php } ?>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th scope="row" width="25%"><strong>UG MCI/SMC Registration Certificate</strong></th>
                                        <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
                                        <td width="75%">
                                        <?php if($returnpath != ''){ ?>
                                            <?php if(file_exists($returnpath.$storedata->ug_mci_certificate)){ if($storedata->ug_mci_certificate != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->ug_mci_certificate; ?>" class="img-thumbnail" height="70" width="70" /> 
                                            <?php } } ?> 
                                        <?php } ?>
                                        </td>
                                    </tr>
                                    <!-- <?php if($storedata->pg_college != ''){ ?> 
                                    <tr>
                                        <th scope="row" width="25%"><strong>PG/PGDM/CPS/FCPS Certificate</strong></th>
                                        <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
                                        <td width="75%">
                                        <?php if($returnpath != ''){ ?>
                                            <?php if(file_exists($returnpath.$storedata->pg_certificate)){ if($storedata->pg_certificate != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->pg_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?>  
                                        <?php } ?>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th scope="row" width="25%"><strong>PG MCI/SMC Registration Certificate</strong></th>
                                        <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
                                        <td width="75%">
                                        <?php if($returnpath != ''){ ?>
                                            <?php if(file_exists($returnpath.$storedata->pg_mci_certificate)){ if($storedata->pg_mci_certificate != ''){ ?>
                                            <img src="<?php echo $returnpath.$storedata->pg_mci_certificate; ?>" class="img-thumbnail" height="70" width="70" />
                                            <?php } } ?>  
                                        <?php } ?>
                                        </td>
                                    </tr> 
                                    <?php } ?> --> <?php } ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Registered Date</strong></th>
                                        <td width="75%"><?= $data['created_at']; ?></td>
                                    </tr>
                                    </tbody>    
                                </table>
							</div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close-icon" onclick="Closemodal()" aria-label="Close">
					<span class="lnr lnr-cross"></span>
				</button>
				<p class="full_width add-a-card-heading"></p>
			</div>
			<div class="modal-body">
				<div class="full_width contact-us">
                    <form class="form" method="post" id="entry_form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Category Name<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="category_name" id="category_name" readonly> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Name<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name" required> 
                                <p id="name_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Mobile No<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" required> 
                                <p id="mobile_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Email Id<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="email" id="email"placeholder="Enter Email Id" required> 
                                <p id="email_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Password<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" placeholder="Enter Password" required> 
                                <p id="password_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Location<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="location" id="location"placeholder="Enter location" required> 
                                <p id="location_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Country<span class="error">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control" name="country" id="country"></select>
                                <p id="country_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">State<span class="error">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control" name="state" id="state"></select>
                                <p id="state_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">City<span class="error">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control" name="city" id="city"></select>
                                <p id="city_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image<span class="error">*</span></label>
                            <div class="col-md-9">
                                <img src="<?= (set_value('image_base64') == '')?base_url().'uploads/no-image.png':set_value('image_base64') ?>" style="width: 70px;height: 70px; cursor: pointer;" id="image_user">
                                <input type="file" name="my_image" class="upload" id="upload_image" accept="image/*" style="display: none;">
                                <input type="hidden" name="image_base64" id="image_base64" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            </div>
                            <div class="col-md-2"><button type="button" class="btn btn-success" onclick="Submit()">Save</button></div>
                            <div class="col-md-2"><button type="button" class="btn btn-danger" onclick="Closemodal()">Cancel</button></div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
<<div class="modal" id="banner_modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Your Image</h5>
                <button type="button" class="close" onclick="cancel_model();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body"><div id="image_demoa"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cancel_model();">Cancel</button>
                <button type="button" class="btn btn-primary" id="upload_banner_button"><span id="upload_banner_text">OK</span></button>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC93Z5_qlMnJIsemSXrmaQvTHKTrOSWaqE&libraries=places"></script>
<script type="text/javascript">
    var lat = document.getElementById('lat').value;
    var lng = document.getElementById('lng').value;
    function initialize() {
       var latlng = new google.maps.LatLng(lat,lng);
        var map = new google.maps.Map(document.getElementById('map'), {
          center: latlng,
          zoom: 13
        });
        var marker = new google.maps.Marker({
          map: map,
          position: latlng,
          draggable: false,
          anchorPoint: new google.maps.Point(0, -29)
       });
        var infowindow = new google.maps.InfoWindow();   
        google.maps.event.addListener(marker, 'click', function() {
          var iwContent = '<div id="iw_container">' +
          '<div class="iw_title"><h5><?php echo $data['name']; ?></h5><br><?php echo $cityname->name; ?>,<?php echo $statename->name; ?>,<?php echo $countryname->name; ?> </div></div>';
          infowindow.setContent(iwContent);
          infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
$('#image_user').click(function() {
    $('#upload_image').trigger('click');
});
function cancel_model()
{
    $('#banner_modal').modal('hide');
}
function Closemodal()
{
    $("#sign-in").show();
    $("#sign-in-loader").hide();
    $("#sign-in-button").removeAttr("disabled");
    $('#exampleModalCenter').modal('hide');
}
$(document).ready(function(){
    $image_crop = $('#image_demoa').croppie({
        enableExif: true,
        viewport: {
            width: 175,
            height: 175,
            type: 'squre'
        },
        boundary: {
            width: 200,
            height: 200
        }
    });
    var url = "#";
    $('#upload_image').on('change', function () { readFile(this);  url = "<?= base_url('user') ?>"; });
    $('#upload_banner_button').click(function(event){
        $image_crop.croppie('result', {
            type: 'canvas',
            size: {
                width: 500,
                height: 500
            }
        }).then(function(response){
            $('#image_user').attr('src',response);
            $('#image_base64').val(response);
            $('#banner_modal').modal('hide');
        })
    });
});  
function readFile(input)
{
    if(input.files && input.files[0]) {
        var reader = new FileReader();          
        reader.onload = function (e) {
            result = e.target.result;
            arrTarget = result.split(';');
            tipo = arrTarget[0];
            if (tipo == 'data:image/jpeg' || tipo == 'data:image/png' || tipo == 'data:image/jpg') {
                $image_crop.croppie('bind', {
                    url: e.target.result
                });
                $('#banner_modal').modal('show');
            } else {
                alert('Accept only .jpg o .png image types');
            }
        }           
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
$("#country").change(function() {
    var ajaxurl = "<?= base_url();?>";
    var id = $(this).val();
    $.ajax({
            method: "POST",
            url: ajaxurl + 'get-state',
            data:{id:id }
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
            data: { id: id }
        })
        .done(function(msg) {
            if (msg != '') {
                $("#city").html(msg);
            }
        });
});
</script>
<script type="text/javascript">
function showModal()
{
    get_by_id_data();
}
function get_by_id_data()
{
    var bid = "<?= $_SESSION['userid']; ?>";
    $.ajax({
        url:"<?= base_url().'partners/editProfile' ?>",
        method:"POST",
        dataType: "JSON",
        cache: false,
        data:{userId:bid},
        beforeSend: function() {
            $("#sign-in").hide();
            $("#sign-in-loader").show();
            $("#sign-in-button").attr("disabled",true);       
        }, 
        success:function(data)
        {
            if(data.Status == 200)
            {
                $('#exampleModalCenter').modal('show');
                if(data.name != ''){   
                    $('[name="name"]').val(data.name);
                }
                if(data.categoryname != ''){   
                    $('[name="category_name"]').val(data.categoryname);
                }
                if(data.email != ''){   
                    $('[name="email"]').val(data.email);
                }
                if(data.password != ''){   
                    $('[name="password"]').val(data.password);
                }
                if(data.contactno != ''){   
                    $('[name="mobile"]').val(data.contactno);
                }
                if(data.location != ''){   
                    $('[name="location"]').val(data.location);
                }
                if(data.city != ''){   
                    $('[name="city"]').html(data.city);
                }
                if(data.state != ''){   
                    $('[name="state"]').html(data.state);
                }
                if(data.country != ''){   
                    $('[name="country"]').html(data.country);
                }
                if(data.image != ''){   
                    $('#image_user').attr('src',data.image);
                }
                $('[name="role"]').html(data.roleList);
            }
        }
    });
}
function Submit()
{
    $("#sign-in").show();
    $("#sign-in-loader").hide();
    $("#sign-in-button").removeAttr("disabled");
    $.ajax({
        url:"<?=base_url().'partners/saveProfile'; ?>",
        method:"POST",
        dataType: "JSON",
        data:{userId:"<?= $_SESSION['userid']; ?>",name : $('[name="name"]').val(),password : $('[name="password"]').val(),mobile : $('[name="mobile"]').val(),email : $('[name="email"]').val(),image_base64:$('#image_base64').val(),city : $('[name="city"]').val(),state : $('[name="state"]').val(),country : $('[name="country"]').val(),location : $('[name="location"]').val()},
        cache: false,
        success:function(response)
        {
            if(response.success)
            {
                $('#exampleModalCenter').modal('hide');
                PNOTY(response.success,'success');
                window.location.reload();
            }
            else
            {
                if(response.name_error == ''){
                    $('#name_error').html('');
                    $('[name="name"]').removeClass('has-error');
                }else{
                    $('#name_error').html(response.name_error);
                    $('[name="name"]').addClass('has-error');
                }
                if(response.password_error == ''){
                    $('#password_error').html('');
                    $('[name="password"]').removeClass('has-error');
                }else{
                    $('#password_error').html(response.password_error);
                    $('[name="password"]').addClass('has-error');
                }
                if(response.email_error == ''){
                    $('#email_error').html('');
                    $('[name="email"]').removeClass('has-error');
                }else{
                    $('#email_error').html(response.email_error);
                    $('[name="email"]').addClass('has-error');
                }
                if(response.mobile_error == ''){
                    $('#mobile_error').html('');
                    $('[name="mobile"]').removeClass('has-error');
                }else{
                    $('#mobile_error').html(response.mobile_error);
                    $('[name="mobile"]').addClass('has-error');
                }
                if(response.city_error == ''){
                    $('#city_error').html('');
                    $('[name="city"]').removeClass('has-error');
                }else{
                    $('#city_error').html(response.city_error);
                    $('[name="city"]').addClass('has-error');
                }
                if(response.state_error == ''){
                    $('#state_error').html('');
                    $('[name="state"]').removeClass('has-error');
                }else{
                    $('#state_error').html(response.state_error);
                    $('[name="state"]').addClass('has-error');
                }
                if(response.country_error == ''){
                    $('#country_error').html('');
                    $('[name="country"]').removeClass('has-error');
                }else{
                    $('#country_error').html(response.country_error);
                    $('[name="country"]').addClass('has-error');
                }
                if(response.location_error == ''){
                    $('#location_error').html('');
                    $('[name="location"]').removeClass('has-error');
                }else{
                    $('#location_error').html(response.location_error);
                    $('[name="location"]').addClass('has-error');
                }
            }
        }
    }); 
}
</script>	
