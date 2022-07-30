 <style>
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
.viewImage {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
.viewImage:hover {opacity: 0.7;}
.modal {
  display: none;
  position: fixed;
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.9);
}
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}
@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}
@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}
.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<div class="full_width main_contentt mc_inner">
  <div class="full_width main_contentt_padd">
    <div class="col-sm-12">
            <h2 class="full_width job-post-title"><?= $title ?></h2>
        </div>
        <div class="col-sm-12">
            <nav aria-label="breadcrumb" class="mt-22">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard';?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url().'vendors/list/pending';?>"> <?php if($data['category'] == 8) { ?>    
                        Patients <?php } else { ?>Vendors <?php } ?></a></li>
                    <li class="breadcrumb-item active"><?= $title?></li>
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
                                
                                    
                                    <ul>
                                        <a href="<?= base_url().'vendors/edit/'.$data['id'] ?> " class="btn btn-sm btn-warning">EDIT</a>
                                    </ul>
                                <?php if($data['category'] != 8) { ?>    
                                <?php } ?>
              </div>
              <div class="full_width c_i_details" id="printArea">
                <table class="table table-hover table-bordered detail-view">
                  <tbody>
                                        
                                        <tr>
                                            <th scope="row" width="25%"><strong>Category</strong></th>
                                            <td width="75%"><?= $data['category_name']; ?></td>
                                        </tr>
                                        <?php if($data['category'] == 4){ ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Speciality</strong></th>
                                            <td width="75%"><?= $data['speciality_name']; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Profile Image</strong></th>
                                            <td width="75%">
                                                <img src="<?= partner_image($data['id']) ?>" height="100px" width="100px"/>

                                                <?php /* if($storedata->profile != ''){ ?> 

                                                    <img src="<?= partner_image($data['id']) ?>" height="100px" width="100px" id="profile" class="viewImage mb-2" onclick="showimg('profile')" /><br/><span><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id?>,"profile")'>Download</button> <?php if(!empty($documents_status->profile) && isset($documents_status->profile) && $data['status_by_admin'] == 0 ){ ?><button type="button" id="status_profile" class="btn btn-sm <?php if($documents_status->profile == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"profile",<?= 
                                                        $documents_status->profile ?>)'><?php if($documents_status->profile == 0){ echo 'Verified';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button> <?php } ?>
                                                <?php } */ ?>
                                            </td>
                                            
                                        </tr>

                                         <?php if($data['category'] == 8 ){ ?> 
                                        <tr>
                                            <th scope="row" width="25%"><strong>Address Proof Image</strong></th>
                                            <td width="75%">
                                                

                                                <?php if($storedata->address_proof != ''){ ?> 

                                                    <img src="<?php echo base_url()."uploads/profile_setting/addressproof/".$storedata->address_proof; ?>" height="100px" width="100px" id="address_proof" class="viewImage mb-2" onclick="showimg('address_proof')" /><br/><span>
                                                <?php }?>
                                            </td>                                          
                                        </tr>
                                        <?php } ?>
                                        

                                        <?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ ?> 
                                        <tr>
                                            <th scope="row" width="25%"><strong><?php if($data['category'] == 1){ echo 'Store' ;} else{ echo 'Lab';} ?> Name</strong></th>
                                            <td width="75%"><?= $storedata->store_name; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong><?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ echo 'Owner' ;} ?> Name</strong></th>
                                            <td width="75%"><?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ echo $storedata->name;}else {echo $storedata->name; } ?></td>
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
                                            <th scope="row" width="25%"><strong>Gender</strong></th>
                                            <td width="75%"><?= $storedata->gender; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>DOB</strong></th>
                                            <td width="75%">
                                                <?php
                                                    if(isset($storedata->dob) && !empty($storedata->dob) && $storedata->dob != '1970-01-01') { 
                                                    echo date("d-m-Y", strtotime($storedata->dob)); 
                                                    } else {
                                                        echo "N.A.";
                                                    }
                                                ?></td>
                                        </tr>
                                        <?php if($data['category'] == 1 ){ ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Qualification</strong></th>
                                            <td width="75%"><?= $storedata->qualification; ?></td>
                                        </tr>
                                    <?php } ?>
                                        
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
                                            <td width="75%"><?= $data['city']; ?></td>
                                        </tr>
                                        <?php if($data['category'] == 4 || $data['category'] == 5 || $data['category'] == 6 || $data['category'] == 7){ ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Pincode</strong></th>
                                            <td width="75%"><?= $data['pincode']; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>State</strong></th>
                                            <td width="75%"><?= $data['state']; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row" width="25%"><strong>Country</strong></th>
                                            <td width="75%"><?= $data['country']; ?></td>
                                        </tr>
                                        <?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Google Map Link</strong></th>
                                            <td width="75%"><?= $storedata->map_link; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if($data['is_fill_profile'] == 1) { ?> 
                                        <tr>
                                            <th scope="row" width="25%"><strong>Location</strong></th>
                                            <td width="75%"><div class="map" id="map" style="width 550px; height: 250px;"></div>
                                            <input type="hidden" name="vCurrentLatitude" id="lat" value="<?= $data['latitude']; ?>">
                                            <input type="hidden" name="vCurrentLongitude" id="lng" value="<?= $data['longitude']; ?>"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if($data['category'] != 1 && $data['category'] != 8){ ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Qulification</strong></th>
                                            <td width="75%"><b>College:</b><?= $storedata->ug_college; ?><br/>  <b>University:</b><?= $storedata->ug_uni; ?><br/>  <b>Passing Year:</b><?= $storedata->ug_year; ?></td>
                                        </tr>
                                        <?php if($data['category'] == 4){ ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Registration</strong></th>
                                            <td width="75%"><b>MCI:</b><?= $storedata->ug_mci; ?><br/> <b>Reg.NO:</b><?= $storedata->ug_reg_no; ?><br/> <b>Year:</b><?= $storedata->ug_mci_year; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php if($data['category'] == 4 || $data['category'] == 5 || $data['category'] == 6 || $data['category'] == 7){ ?>
                                        <?php if($partner_work_exp != ''){if($partner_work_exp[0]->Companyname != '' && $partner_work_exp[0]->Designation != '' && $partner_work_exp[0]->Exp_Year != ''){ ?> 
                                        <tr>
                                            <th scope="row" width="25%"><strong>Work Experince</strong></th>

                                            <td width="75%">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">SR.No</th>
                                                        <th scope="col">Company Name</th>
                                                        <th scope="col">Desingination</th>
                                                        <th scope="col">Exp.Year</th>
                                                    </tr>
                                                    </thead>
                                                <tbody>
                                    <?php if (count($partner_work_exp) > 0){
                                    $i=0; 
                                    foreach ($partner_work_exp as$key => $category) {  ?>
                                        <?php if($category->Companyname != '' && $category->Designation != '' && $category->Exp_Year != ''){ ?> 
                                        <tr>
                                        <td><?php echo $category->Rowno; ?></td>
                                        <td><?php echo $category->Companyname; ?></td> 
                                        <td><?php echo $category->Designation; ?></td>
                                        <td><?php echo $category->Exp_Year; ?></td>
                                        </tr>
                                        <?php  } ?>
                                        <?php
                                    $i++; }
                                } 
                                ?>
                                </tbody>
                                </table>
                            </td>
                        </tr>
                        <?php } } ?>
                        <?php } ?>
                            <?php } ?>

                                <?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ ?>
                                <?php if($data['category'] == 2)
                                { ?>
                                <tr>
                                    <th scope="row" width="25%"><strong>Home Sample Collection</strong></th>
                                    
                                    <td width="75%"><?php 
                                    if($storedata->charges != ''){ 
                                      echo 'Yes'; 
                                    } else { 
                                      echo "No"; 
                                    } ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="25%"><strong>Delivery Charges</strong></th>
                                    
                                    <td width="75%"><?php 
                                  

                                    if($storedata->is_homesample == '0'){echo number_format((float)$storedata->amount , 2, '.', '');}else{ echo 'Free';}  ?></td>
                                </tr>
                                <?php } ?> 
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
                                
                               
                                <tr>
                                    <th scope="row" width="25%"><strong>GSTIN</strong></th>
                                    <td width="75%"><?= $storedata->gstin; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php if($storedata->gstin != ''){ if($storedata->is_valid_gstin == 0){?> 
                                      <button type="button" class="btn btn-sm btn-info" id="verify_gstin" onclick='number_verified(<?= $storedata->id ?>,"gstin")'>Verify</button>
                                        <?php } ?>
                                        <span id="message_gstin" style="font-weight: 500; float: right; <?php if($storedata->is_valid_gstin == 1){ echo'color:green'; } ?>"><?php if($storedata->is_valid_gstin == 1){ echo'<i class="fa fa-check" aria-hidden="true"></i> Valid'; } ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>

                                

                                <?php if($data['category'] == 1 ){ ?>
                                <tr>
                                    <th scope="row" width="25%"><strong>Licence No</strong></th>
                                    <td width="75%"><?= $storedata->licence_no; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php if($storedata->pan != ''){ if($storedata->is_valid_licence == 0){?> 
                                      <button type="button" class="btn btn-sm btn-info" id="verify_licence" onclick='number_verified(<?= $storedata->id ?>,"licence")'>Verify</button>
                                        <?php } ?>
                                        <span id="message_licence" style="font-weight: 500; float: right; <?php if($storedata->is_valid_licence == 1){ echo'color:green'; } ?>"><?php if($storedata->is_valid_licence == 1){ echo'<i class="fa fa-check" aria-hidden="true"></i> Valid'; } ?></span>
                                        <?php } ?>
                                    </td>
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
                                        <th scope="row" width="25%"><strong>IFSC Code</strong></th>
                                        <td width="75%"><?= $storedata->ifsc_code; ?></td>
                                    </tr>
                                        

                                        <tr>
                                    <th scope="row" width="25%"><strong><?php if($data['category'] == 1){ echo 'Store' ;} else { echo 'Lab' ;} ?> Stamp</strong></th>
                                    <?php  $returnpath = $this->config->item('stamp_images_uploaded_path'); ?>

                                    <td width="75%">
                                        <?php if(isset($storedata->stamp) && !empty($storedata->stamp)){?>
                                         <img src="<?php echo $returnpath.$storedata->stamp; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="stamp" onclick="showimg('stamp')" />

                                          <br/>
                                          <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"stamp")'>Download</button>
                                          <?php } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" width="25%"><strong><?php if($data['category'] == 1){ echo 'Store' ;} else { echo 'Lab' ;} ?> Signature</strong></th>
                                    <?php  $returnpath = $this->config->item('symbol_images_uploaded_path'); ?>

                                    <td width="75%">
                                        <?php if(isset($storedata->symbol) && !empty($storedata->symbol)){?>
                                         <img src="<?php echo $returnpath.$storedata->symbol; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="symbol" onclick="showimg('symbol')" />

                                         <br/>

                                         <button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"symbol")'>Download</button>
                                         <?php } ?>

                                    </td>
                                </tr>
                                
                                <tr>
                                    <th scope="row" width="25%"><strong><?php if($data['category'] == 1){ echo 'Store' ;} else{ echo 'Lab' ;} ?> Images</strong></th>
                                    <?php  $returnpath = $this->config->item('store_images_uploaded_path'); ?>

                                    <td width="75%">
                                        <?php if($returnpath != ''){ 
                                        foreach($store_images as $k=>$cd) {?>
                                        <img src="<?php echo $returnpath.$cd->images; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" />
                                        
                                        <?php } } ?>
                                        <br/><button type="button" class="btn btn-sm btn-info" onclick='storeimagedownload(<?= $storedata->id ?>)'>Download</button>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($storedata->description != '') {?> 
                                <tr>
                                    <th scope="row" width="25%"><strong>Comments</strong></th>
                                    <td width="75%"><?= $storedata->description; ?></td>
                                </tr>
                                <?php } ?>
                                <?php if($storedata->pan != ''){ ?>  
                                <tr>
                                    <th scope="row" width="25%"><strong>Pancard No</strong></th>
                                    <td width="75%"><?= $storedata->pan; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php if($storedata->pan != ''){ if($storedata->is_valid_pan == 0){?> 
                                      <button type="button" class="btn btn-sm btn-info" id="verify_pancard" onclick='number_verified(<?= $storedata->id ?>,"pancard")'>Verify</button>
                                        <?php } ?>
                                        <span id="message_pancard" style="font-weight: 500; float: right; <?php if($storedata->is_valid_pan == 1){ echo'color:green'; } ?>"><?php if($storedata->is_valid_pan == 1){ echo'<i class="fa fa-check" aria-hidden="true"></i> Valid'; } ?></span>
                                        <?php } ?>
                                    </td>
                                </tr>
                               <?php } ?>
                                <?php if($storedata->adharcard_no != ''){ ?> 
                                <tr>
                                    <th scope="row" width="25%"><strong>Adhaar Card No</strong></th>
                                    <td width="75%"><?= $storedata->adharcard_no; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <?php if($storedata->adharcard_no != ''){ if($storedata->is_valid_aadhar_no == 0){?> 
                                      <button type="button" class="btn btn-sm btn-info" id="verify_adharcard" onclick='number_verified(<?= $storedata->id ?>,"adharcard")'>Verify</button>
                                      <?php } ?>
                                        <span id="message_adharcard" style="font-weight: 500; float: right; <?php if($storedata->is_valid_aadhar_no == 1){ echo'color:green'; } ?>"><?php if($storedata->is_valid_aadhar_no == 1){ echo'<i class="fa fa-check" aria-hidden="true"></i> Valid'; } ?> </span>
                                        <?php }   ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($data['category'] != 8){ ?> 
                                <tr>
                                    <th scope="row" width="25%"><strong>Document ID Proof</strong></th>
                                    <?php  $returnpath = $this->config->item('pancard_images_uploaded_path'); ?>

                                    <td width="75%">

                                    <?php if($storedata->pancard != ''){if($returnpath != ''){ ?>
                                        <img src="<?php echo $returnpath.$storedata->pancard; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="pancard" onclick="showimg('pancard')"/><br/><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"pancard")'>Download</button> <?php if($data['status_by_admin'] == 0 ){ ?> <button type="button" id="status_pancard" class="btn btn-sm <?php if($documents_status->pancard == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"pancard",<?= 
                                        $documents_status->pancard ?>)'><?php if($documents_status->pancard == 0){ echo 'Verify';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button>
                                      <?php } ?>
                                    <?php } } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($data['category'] == 1 || $data['category'] == 2 || $data['category'] == 3){ ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Sign-Board</strong></th>
                                        <?php  $returnpath = $this->config->item('sign_board_images_uploaded_path'); ?>

                                        <td width="75%">
                                            <?php if($storedata->sign_board != '') {?> 
                                            <img src="<?php echo $returnpath.$storedata->sign_board; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="signboardimage" onclick="showimg('signboardimage')" /><br/><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"sign_board")'>Download</button> <?php if($data['status_by_admin'] == 0 ){ ?> <button type="button" id="status_sign_board" class="btn btn-sm <?php if($documents_status->sign_board == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"sign_board",<?= 
                                            $documents_status->sign_board ?>)'><?php if($documents_status->sign_board == 0){ echo 'Verify';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button>
                                          <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong>GSTIN Certificate</strong></th>
                                        <?php  $returnpath = $this->config->item('gst_certificate_images_uploaded_path'); ?>

                                        <td width="75%">
                                            <?php if($storedata->gstin_certificate != ''){ ?> 
                                            <img src="<?php echo $returnpath.$storedata->gstin_certificate; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="gstinimage" onclick="showimg('gstinimage')" />
                                            <br/><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"gstin_certificate")'>Download</button> <?php if($data['status_by_admin'] == 0 ){ ?><button type="button" id="status_gstin_certificate" class="btn btn-sm <?php if($documents_status->gstin_certificate == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"gstin_certificate",<?= 
                                            $documents_status->gstin_certificate ?>)'><?php if($documents_status->gstin_certificate == 0){ echo 'Verify';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button> <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Corporation Registration</strong></th>
                                        <?php  $returnpath = $this->config->item('corporation_images_uploaded_path'); ?>

                                        <td width="75%">
                                            <?php if($storedata->corporation != ''){ ?> 
                                            <img src="<?php echo $returnpath.$storedata->corporation; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="corporationimg" onclick="showimg('corporationimg')"/>
                                            <br/><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"corporation")'>Download</button> <?php if($data['status_by_admin'] == 0 ){ ?>  <button type="button" id="status_corporation" class="btn btn-sm <?php if($documents_status->corporation == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"corporation",<?= 
                                            $documents_status->corporation ?>)'><?php if($documents_status->corporation == 0){ echo 'Verify';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button>
                                            </td><?php } ?>
                                        <?php } ?>
                                        </td>
                                    </tr>
                                    <?php if($data['category'] == 1 ){ ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>B.PHARM Licence</strong></th>
                                        <?php  $returnpath = $this->config->item('bpharm_lience_images_uploaded_path'); ?>

                                        <td width="75%">
                                            <?php if($storedata->bpharm_licence != ''){ ?> 
                                            <img src="<?php echo $returnpath.$storedata->bpharm_licence; ?>" class="img-thumbnail mb-2" height="70" width="70" id="bpharmlicenceimg" onclick="showimg('bpharmlicenceimg')" />
                                            <br/><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"bpharm_licence")'>Download</button> <?php if($data['status_by_admin'] == 0 ){ ?> <button type="button" id="status_bpharm_licence" class="btn btn-sm <?php if($documents_status->bpharm_licence == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"bpharm_licence",<?= 
                                            $documents_status->bpharm_licence ?>)'><?php if($documents_status->bpharm_licence == 0){ echo 'Verify';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button> <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" width="25%"><strong>B.PHARM/M.PHARM Degree Certificate</strong></th>
                                        <?php  $returnpath = $this->config->item('degree_certi_images_uploaded_path'); ?>

                                        <td width="75%">
                                            <?php if($storedata->degree_certificate != ''){ ?> 
                                            <img src="<?php echo $returnpath.$storedata->degree_certificate; ?>" class="img-thumbnail" height="70" width="70" class="viewImage mb-2" id="bpharmcertiimg" onclick="showimg('bpharmcertiimg')"/>
                                            <br/><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"degree_certificate")'>Download</button> <?php if($data['status_by_admin'] == 0 ){ ?> <button type="button" id="status_degree_certificate" class="btn btn-sm <?php if($documents_status->degree_certificate == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"degree_certificate",<?= 
                                            $documents_status->degree_certificate ?>)'><?php if($documents_status->degree_certificate == 0){ echo 'Verify';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button>
                                          <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php if($data['category'] != 1 && $data['category'] != 8) { ?>
                                <tr>
                                    <th scope="row" width="25%"><strong>Degree Certificate</strong></th>
                                    <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>
                                    <td width="75%">
                                    <?php if($storedata->ug_certificate != ''){ 
                                        if($returnpath != ''){ ?>
                                        <img src="<?php echo $returnpath.$storedata->ug_certificate; ?>" class="img-thumbnail viewImage" height="70" width="70" id="ug_certi_img" onclick="showimg('ug_certi_img')" />
                                        <br/><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"ug_certificate")'>Download</button> <?php if($data['status_by_admin'] == 0 ){ ?> <button type="button" id="status_ug_certificate" class="btn btn-sm <?php if($documents_status->ug_certificate == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"ug_certificate",<?= 
                                        $documents_status->ug_certificate ?>)'><?php if($documents_status->ug_certificate == 0){ echo 'Verify';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button>  <?php } ?>
                                    <?php } } ?>
                                    </td>
                                </tr> 
                                <?php if($data['category'] != 6 && $data['category'] != 7) { ?>
                                <tr>
                                    <th scope="row" width="25%"><strong>UG MCI/SMC Registration Certificate</strong></th>
                                    <?php  $returnpath = $this->config->item('ug_pg_images_uploaded_path'); ?>

                                    <td width="75%">
                                    <?php
                                    if($storedata->ug_mci_certificate != ''){  
                                    if($returnpath != ''){ ?>
                                        <img src="<?php echo $returnpath.$storedata->ug_mci_certificate; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="ug_mci_img" onclick="showimg('ug_mci_img')" />
                                        <br/><button type="button" class="btn btn-sm btn-info" onclick='download(<?= $storedata->id ?>,"ug_mci_certificate")'>Download</button>  <?php if($data['status_by_admin'] == 0 ){ ?><button type="button" id="status_ug_mci_certificate" class="btn btn-sm <?php if($documents_status->ug_mci_certificate == 0){ echo 'btn-warning';} else{ echo 'btn-success';} ?>" onclick='verified(<?= $storedata->id?>,"ug_mci_certificate",<?= 
                                        $documents_status->ug_mci_certificate ?>)'><?php if($documents_status->ug_mci_certificate == 0){ echo 'Verify';} else{echo'<i class="fa fa-check" aria-hidden="true"></i>';} ?></button> <?php } ?>  
                                    <?php } } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php } ?>

                                <?php 

                                if($data['status_by_admin'] == 1) { 

                                if(isset($data['razorpay_vendor_id']) && !empty($data['razorpay_vendor_id']) ) { ?>

                                  <tr>
                                    <th scope="row" width="25%"><strong>My Razorpay ID</strong></th>
                                    <td width="75%">
                                      <?php echo $data['razorpay_vendor_id']; ?>  
                                    </td>
                                </tr>

                                <?php } else {  ?> 
                                <tr>
                                    <th scope="row" width="25%"><strong>Razorpay Registration</strong></th>
                                    <td width="75%">
                                      <div id="createBeneficiary"><font color="green">Your Beneficiary registered successfully.</font></div>
                                      <div id="createBeneficiaryError"><font color="red">Your Beneficiary registration failed try again.</font></div>

                                      <button style="width:200px !important;" class="btn btn-success" type ="button" id ="payment_btn<?= $data['id'] ?>" onclick="createBeneficiary(<?= $data['id'] ?>)">Create Beneficiary</button></td>
                                </tr>
                              <?php } } ?>
                              

                                <tr>
                                    <th scope="row" width="25%"><strong>Registered Date</strong></th>
                                    <td width="75%"><?php echo date('d-m-Y h:i A',strtotime($data['created_at'])); ?></td>
                                </tr>
                                </tbody>  
                </table>
                                <?php if($data['category'] != 8) { ?>
                                    <?php 
                                        if($data['status_by_admin'] == 1)
                                        {
                                        if($data['category'] == 4){
                                            $backPage = 'register-doctors';
                                        }else if($data['category'] == 5){
                                            $backPage = 'veterinary-doctors';
                                        }else if($data['category'] == 6){
                                            $backPage = 'nurse';
                                        }else if($data['category'] == 7){
                                            $backPage = 'physiotherapist';
                                        }else if($data['category'] == 3){
                                            $backPage = 'radiodiagnostic-centers';
                                        }else if($data['category'] == 2){
                                            $backPage = 'pathology-labs';
                                        }else if($data['category'] == 1){
                                            $backPage = 'pharmacy-stores';
                                        }
                                    }

                                     ?>
                <?php if($data['status_by_admin'] == 0 ){ ?>    
                  <?php if($data['is_fill_profile'] == 1 ){ 
                    ?>
                                        <?php if($data['category'] == 4 ||$data['category'] == 5){ ?> 
                                            <?php if($documents_status->pancard == 1 && $documents_status->ug_certificate == 1 && $documents_status->ug_mci_certificate == 1 && ($storedata->is_valid_aadhar_no == 1 || $storedata->is_valid_pan == 1)){ ?>
                                                <a  href="<?php echo base_url().'vendors/changeStatus/'.$data['id'].'?status='.'1';?>" class="mt-3 btn btn-success btn-sm">Approve</a>
                                            <?php } ?>
                                        <?php } else if($data['category'] == 6 || $data['category'] == 7){ ?> 
                                           <?php if($documents_status->pancard == 1 && $documents_status->ug_certificate == 1 && ($storedata->is_valid_aadhar_no == 1 || $storedata->is_valid_pan == 1)){ ?>
                                                <a  href="<?php echo base_url().'vendors/changeStatus/'.$data['id'].'?status='.'1';?>" class="mt-3 btn btn-success btn-sm">Approve</a>
                                            <?php } ?> 

                                        <?php } 
                                        else if($data['category'] == 2 ||$data['category'] == 3){ 

                                          ?> 
                                            <?php if($documents_status->pancard == 1 && $documents_status->ug_certificate == 1 && $documents_status->ug_mci_certificate == 1 && $documents_status->sign_board == 1 && ($storedata->is_valid_aadhar_no == 1 || $storedata->is_valid_pan == 1)){ ?>
                                                <a  href="<?php echo base_url().'vendors/changeStatus/'.$data['id'].'?status='.'1';?>" class="mt-3 btn btn-success btn-sm">Approve</a>
                                            <?php } ?>
                                        <?php } else{ ?> 
                                            <?php if($documents_status->pancard == 1 && $documents_status->degree_certificate == 1 && $documents_status->bpharm_licence == 1 && $documents_status->sign_board == 1  && ($storedata->is_valid_aadhar_no == 1 || $storedata->is_valid_pan == 1)){ ?>
                                                <a  href="<?php echo base_url().'vendors/changeStatus/'.$data['id'].'?status='.'1';?>" class="mt-3 btn btn-success btn-sm">Approve</a>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                        <?php if($data['is_fill_profile'] == 1){ ?>
                    <a  href="<?php echo base_url().'vendors/changeStatus/'.$data['id'].'?status='.'2';?>" class="mt-3 btn btn-danger btn-sm">Reject</a>
                                        <?php } ?>
                    <a  href="<?php echo base_url().'vendors/pending-approve'?>" class="mt-3 btn btn-info btn-sm">Back</a>
                  <?php } ?>
                  <?php if($data['status_by_admin'] == 1 ){ ?>
                    <?php if($data['is_fill_profile'] == 1){ ?>
                                        <a  href="<?php echo base_url().'vendors/changeStatus/'.$data['id'].'?status='.'2';?>" class="mt-3 btn btn-danger btn-sm">Reject</a>
                                        <?php } ?>
                    <a  href="<?php echo base_url().'vendors/'.$backPage?>" class="mt-3 btn btn-info btn-sm">Back</a>
                  <?php } ?>
                  <?php if($data['status_by_admin'] == 2 ){ ?>
                                        
                    <a  href="<?php echo base_url().'vendors/changeStatus/'.$data['id'].'?status='.'1';?>" class="mt-3 btn btn-success btn-sm">Approve</a>
                                        
                    <a  href="<?php echo base_url().'vendors/rejected'?>" class="mt-3 btn btn-info btn-sm">Back</a>
                  <?php } ?>
                                    <?php if($data['is_fill_profile'] == 1 ){ ?>
                                    <button type="button" class="float-sm-right mt-3 btn btn-primary btn-sm" id="print" onclick="print();"><i class="fa fa-print" aria-hidden="true" ></i> Print</button>
                                    <?php } ?>
                                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC93Z5_qlMnJIsemSXrmaQvTHKTrOSWaqE&libraries=places"></script>
<script>
var modal = document.getElementById("myModal");
var modalImg = document.getElementById("img01");
function showimg(id)
{
  modal.style.display = "block";
  modalImg.src =$('#'+id).attr('src');
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
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
          '<div class="iw_title"><h5><?php echo $data['name']; ?></h5><br><?php echo $cityname; ?>,<?php echo $statename; ?>,<?php echo $countryname; ?> </div></div>';
          infowindow.setContent(iwContent);
          infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">

$("#createBeneficiary").hide();
$("#createBeneficiaryError").hide();
function download(id,name)
{
    window.location.href = "<?= base_url().'vendors/download/'?>"+id+'?name='+name;
}
function storeimagedownload(id)
{

    window.location.href = "<?= base_url().'vendors/storeimagedownload/'?>"+id;
}

function storeSymboldownload(id)
{
    alert(id);
    return false;
    window.location.href = "<?= base_url().'vendors/storeimagedownload/'?>"+id;
}

function storeStampdownload(id)
{
     alert(id);
    return false;
    window.location.href = "<?= base_url().'vendors/storeimagedownload/'?>"+id;
}

function verified(id,name,status)
{
  $.ajax({
          url:'<?= base_url().'vendors/verified_document'?>',
          method:"POST",
          dataType: "JSON",
          cache: false,
          data:{id:id,name:name,status:status},
          success:function(data)
          {
            if(data.Status == 200)
            {
                if(status == 0)
                {
                  $('#status_'+name).removeClass('btn-warning');
                  $('#status_'+name).addClass('btn-success');
                  $('#status_'+name).html("<i class='fa fa-check' aria-hidden='true'></i>");
                  location.reload();
                }
            }
        }
   });
}
function number_verified(id,name)
{
  var number = '';
  if(name == 'pancard')
  {
    number = '<?= $storedata->pan; ?>';
  }else if(name == 'adharcard'){
    number = '<?= $storedata->adharcard_no; ?>';
  }else if(name == 'gstin'){
    number = '<?= $storedata->gstin; ?>';
  }else if(name == 'licence'){
    number = '<?= $storedata->licence_no; ?>';
  }
  $.ajax({
          url:'<?= base_url().'vendors/verification'?>',
          method:"POST",
          dataType: "JSON",
          cache: false,
          data:{id:id,name:name,number:number},
          success:function(data)
          {
            if(data.status == 200)
            {
               $('#message_'+name).html("Valid");
               $("#message_"+name).css("color","green");
               $('#verify_'+name).addClass('d-none');
            }
            else if(data.status == 1){
                $('#message_'+name).html(data.message);
                $("#message_"+name).css("color","red");
                $('#verify_'+name).addClass('d-none'); 

            }else{

                $('#message_'+name).html("Invalid "+name);
                $("#message_"+name).css("color","red");
                $('#verify_'+name).addClass('d-none'); 
            }
            location.reload(); 
              
          }
        });
}
  
 

    function createBeneficiary(id) {

            $.ajax({
            url:"<?= base_url().'admin/createBeneficiary' ?>",
            method:"POST",
            dataType: "JSON",
            cache: false,
            data:{vendorId:id},
            success:function(data)
            {
                if(data == '1'){
                      $("#createBeneficiary").show();
                } else {
                      $("createBeneficiaryError").show();
                }
                
                window.setTimeout(function(){
                  location.reload();
                },3000);
            }
        });
    }
</script>
<script type="text/javascript">
function print()
{
  var PartnerId = "<?= $data['id'] ?>" ;
  window.open(
              '<?= base_url().'vendors/printView/'; ?>'+PartnerId,
              '_blank'
            );
}
</script>

