<?php
// echo "<pre>";
// print_r($r_data);
// exit;
?>
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
            <h2 class="full_width job-post-title"><?=$r_data['c_name'] . " Report Detail";?></h2>
        </div>
        <div class="col-sm-12">
            <nav aria-label="breadcrumb" class="mt-22">

            </nav>
        </div>
        <div class="full_width c_info_details">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row_eq_height">
                    <div class="d-flex align-items-top w_100">
                        <div class="full_width c_infos">
                            <div class="full_width loading-box">
                                <h4><?=$r_data['c_name'] . " Detail";?></h4>
                            </div>
                        <div class="full_width c_i_details">
                            <table class="table table-hover table-bordered detail-view">
                                <tbody>
                                    <?php
if ($c_id == 1) {
    if ($r_data['delivery_type'] == '1') {
        $type = "Home Delivery";
    } else {
        $type = "Self Pickup";
    }
}
if ($c_id == 2) {
    if ($r_data['delivery_type'] == '1') {
        $type = "At Home";
    } else {
        $type = "At Lab";
    }
    if ($r_data['order_status'] == '3') {
        $Status = "Sample Collected / Appointment Completed";
        $class = "label label-primary";
    }
    if ($r_data['order_status'] == '7') {
        $Status = "Pending Sample Collect / Pending Appointment";
        $class = "label label-danger";
    }
    if ($r_data['order_status'] == '8') {
        $Status = "Pending Report";
        $class = "label label-danger";
    }
}
if ($c_id == 3) {
    if ($r_data['delivery_type'] == '1') {
        $type = "At Home";
    } else {
        $type = "At Lab";
    }
    if ($r_data['order_status'] == '3') {
        $Status = "Sample Collected / Appointment Completed";
        $class = "label label-primary";
    }
    if ($r_data['order_status'] == '7') {
        $Status = "Pending Sample Collect / Pending Appointment";
        $class = "label label-danger";
    }
    if ($r_data['order_status'] == '8') {
        $Status = "Pending Report";
        $class = "label label-danger";
    }
}
if ($c_id == 4) {
    if ($r_data['delivery_type'] == '1') {
        $type = "At Home";
    } else {
        $type = "At Lab";
    }
}
if ($c_id == 5) {
    if ($r_data['delivery_type'] == '1') {
        $type = "At Home";
    } else {
        $type = "At Lab";
    }
}
if ($c_id == 6) {
    $tdname = "Service Request";
    if ($r_data['delivery_type'] == '1') {
        $type = "At Home";
    } else {
        $type = "At Lab";
    }
}
if ($c_id == 7) {
    $tdname = "Service Request";
    if ($r_data['delivery_type'] == '1') {
        $type = "At Home";
    } else {
        $type = "At Lab";
    }
}

if ($c_id == '2' || $c_id == '3') {
    if ($r_data['order_status'] == '3') {
        $Status = "Sample Collected / Appointment Completed";
        $class = "label label-primary";
    }
    if ($r_data['order_status'] == '7') {
        $Status = "Pending Sample Collect / Pending Appointment";
        $class = "label label-danger";
    }
    if ($r_data['order_status'] == '8') {
        $Status = "Pending Report";
        $class = "label label-danger";
    }
}
if ($c_id == '1' || $c_id == '2' || $c_id == '3') {
    if ($r_data['order_status'] == '1') {
        $Status = "Pending";
        $class = "label label-danger";
    } elseif ($r_data['order_status'] == '2') {
        $Status = "Accepted";
        $class = "label label-primary";
    } elseif ($r_data['order_status'] == '3' && $c_id == '1') {
        $Status = "Dispatched";
        $class = "label label-info";
    } elseif ($r_data['order_status'] == '4') {
        $Status = "Delivered";
        $class = "label label-success";
    } elseif ($r_data['order_status'] == '5') {
        $Status = "Cancelled";
        $class = "label label-danger";
    } elseif ($r_data['order_status'] == '6') {
        $Status = "Reject";
        $class = "label label-danger";
    }
} elseif ($c_id == '4' || $c_id == '5' || $c_id == '6' || $c_id == '7') {
    if ($r_data['appointment_status'] == '0') {
        $Status = "Pending";
        $class = "label label-danger";
    } elseif ($r_data['appointment_status'] == '1') {
        $Status = "Start Consultation";
        $class = "label label-info";
    } elseif ($r_data['appointment_status'] == '2') {
        $Status = "End Consultation";
        $class = "label label-info";
    } elseif ($r_data['appointment_status'] == '3') {
        $Status = "Cancelled";
        $class = "label label-danger";
    } elseif ($r_data['appointment_status'] == '4') {
        $Status = "Rejected";
        $class = "label label-danger";
    }
}

/*if($c_id=='1'){

if($r_data['delivery_type']=='1'){
$type = "Home Delivery";
} else {
$type = "Self Pickup";
}
} else {
if($r_data['delivery_type']=='1')
{
$type = "At Home";
}
else
{
$type = "At Lab";
}
} */

if ($r_data['consulation_type'] == '0') {
    $c_type = "online";
} elseif ($r_data['consulation_type'] == '1') {
    $c_type = "home";
} elseif ($r_data['consulation_type'] == '2') {
    $c_type = "Both";
}

if ($r_data['patient_realative'] == '0') {
    $p_rel = "Self";
} elseif ($r_data['patient_realative'] == '1') {
    $p_rel = "Relative";
}

// $date = explode(" ", $r_data['created_at']);
$date = $r_data['created_at'];
$tret_start_date = explode(" ", $r_data['treatment_start_date']);
$tret_start_date = $r_data['treatment_start_date'];

$tret_end_date = explode(" ", $r_data['treatment_end_date']);
$tret_end_date = $r_data['treatment_end_date']; ?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Status</strong></th>
                                        <td width="75%"><label class="<?php if (isset($class)) {echo $class;}?>" style="font-size:13px;"><?=$Status?></label></td>
                                    </tr>
									<?php if (isset($Status) && $Status == "Cancelled" || $Status == "Rejected") {?>
                                    <tr>
                                      <th scope="row" width="25%"><strong>Reason For Cancellation</strong></th>
									  <td width="75%"><label class="" style="font-size:13px;"><?php if (isset($r_data['reason'])) {echo $r_data['reason'];}?></label></td>
                                    </tr>
									<?php }?>
                                    <tr>
                                      <th scope="row" width="25%"><strong>Category</strong></th>
                                        <td width="75%"><?=$r_data['c_name'];?></td>
                                    </tr>

                                      <tr>
                                      <th scope="row" width="25%"><strong>RazorPay Payment ID</strong></th>
                                        <td width="75%"><?=$r_data['payment_id'];?></td>
                                    </tr>

                                    
                                <?php if ($c_id == 4) {?>
                                  <tr>
                                    <th scope="row" width="25%"><strong>Speciallity</strong></th>
                                      <td width="75%"><?php echo $healthcare_details->title; ?></td>
                                  </tr>
                                <?php
}?>

                                <?php if ($c_id != 5) {?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Patient Name</strong></th>
                                    <td width="75%"><?=$r_data['name'];?></td>
                                </tr>


                                <?php
} else {?>
                                  <tr>
                                      <th scope="row" width="25%"><strong>Animal Category</strong></th>
                                      <td width="75%"><?=$r_data['animal_category'];?></td>
                                  </tr>
                                  <tr>
                                      <th scope="row" width="25%"><strong>Animal Name</strong></th>
                                      <td width="75%"><?=$r_data['animal_name'];?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="25%"><strong>Animal Care Taker</strong></th>
                                    <td width="75%"><?=$r_data['animal_caretaker'];?></td>
                                  </tr>
                                  <?php
}?>
                                <tr>
                                    <th scope="row" width="25%"><strong>Mobile-Number</strong></th>
                                    <td width="75%"><?=$r_data['country_code'] . " " . $r_data['mobile_no'];?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="25%"><strong>Address</strong></th>
                                    <td width="75%"><?=$r_data['address'];?></td>
                                </tr>
                                <?php if ($c_id != 5) {?>
                                  <tr>
                                    <th scope="row" width="25%"><strong>Patient Relative</strong></th>
                                      <td width="75%"><?php if (isset($p_rel)) {echo $p_rel;}?></td>
                                  </tr>
                                  <?php
}?>

                                <?php
if ($c_id == '1' || $c_id == '2' || $c_id == '3') {?>
                                  <tr>
                                    <th scope="row" width="25%"><strong>Reference-doctor</strong></th>
                                      <td width="75%"><?=$r_data['reference_doctor'];?></td>
                                  </tr>
                                 <?php
}?>


                                <tr>
                                    <th scope="row" width="25%"><strong>Prescription</strong></th>
                                    <td width="75%"><?php
                                    $returnpath = $this->config->item('prescription_uploaded_path');

                                    if ($c_id == '1' || $c_id == '2' || $c_id == '3') {

                                      if (isset($prescription) && count($prescription) > 0) {
                                        foreach ($prescription as $k => $cd) { ?>
                                          <img src="<?php echo $returnpath . $cd['filename']; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="<?=$cd['id']?>" onclick="showimg(<?=$cd['id']?>)"/><button type="button" class="btn btn-sm btn-info" onclick='imagedownload(<?=$cd['id']?>)'><i class="fa fa-download" aria-hidden="true"></i></button>
                                        <?php
                                        }
                                      }  
                                  } else if($c_id =='4') {
                                      
                                      if (isset($prescription) && count($prescription) > 0) { 
                                          ?>
                                          <img src="<?php echo $returnpath . $prescription['file']; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="<?=$prescription['id']?>" onclick="showimg(<?=$prescription['id']?>)"/><button type="button" class="btn btn-sm btn-info" onclick='image_download(<?=$prescription['id']?>)'><i class="fa fa-download" aria-hidden="true"></i></button>
                                        <?php
                                        
                                      }  

                                  } else{
                                      echo "N.A";
                                    }?>
                                    </td>
                                </tr>
                                <?php if (isset($medicines) && count($medicines) > 0) {
    if ($c_id == '1' || $c_id == '2' || $c_id == '3') {?>
                                <tr>
                                    <?php if ($c_id == '1') {?>
                                        <th scope="row" width="25%"><strong>Medicines</strong></th>
                                    <?php } else {?>
                                    <th scope="row" width="25%"><strong>Test</strong></th>
                                    <?php }?>
                                    <td width="75%">
                                       <div class="table-responsive">
	                                        <table>
	                                            <tr>
	                                              <?php if ($c_id == '1') {?>
	                                              <th>Name</th>
	                                              <th>Company-name</th>
	                                              <th>Batch-no</th>
	                                              <th>No of tablets</th>
	                                              <th>Exp.date</th>
	                                              <th>Qty</th>
	                                              <th>Stock</th>
	                                              <?php } elseif ($c_id == '2' || $c_id == '3') {?>
	                                               <th>Test Name</th>
	                                               <th>Image</th>
	                                              <?php }?>
	                                              <th>Mrp</th>
                                                 <th>Gst</th>
                                                <th>Gst.Per</th>
	                                              <th>discount percatnage(%)</th>
	                                              <th>discount amount</th>
	                                              <th>Total</th>
	                                            </tr>
                                                <?php
// echo "<pre>";print_r($medicines);
        foreach ($medicines as $value) {
            if ($c_id == '1') { 
              $rows = unserialize($value['medicine_serialize']);
              ?>
	                                              	<tr>
			                                            <td><?=strtoupper($rows['name']);?></td>
			                                            <td><?=strtoupper($value['company_name']);?></td>
			                                            <td><?=$value['batch_no'];?></td>
			                                            <td><?=strtoupper($value['no_of_tablets']);?></td>
			                                            <td><?=$value['expiry_date'];?></td>
			                                            <td><?=$value['medicine_qty'];?></td>
			                                            <td><?=$value['stock'];?></td>
			                                            <?php } elseif ($c_id == '2' || $c_id == '3') {?>
			                                            <td><?=$value['name'];?></td>
			                                            <td><?=$value['image'];?></td>
			                                            <?php }?>
			                                            <td><?=$value['mrp'];?></td>
			                                            <td><?=$value['gst'];?></td>
			                                            <td><?=$value['gst_per'];?></td>
                                                  <td><?=$value['discount_per'] . '%';?></td>
                                                  <td><?=$value['discount'];?></td>
			                                            <td><?=$value['total'];?></td>
                                                  </tr>
		                                            <?php }?>
	                                        	</table>
                                    	    </div>
                                        </td>
                                </tr>
                                <?php }}?>
                                <?php if ($c_id == '4' || $c_id == '5' || $c_id == '6' || $c_id == '7') {?>
                                  <?php if ($c_id == '4' || $c_id == '6' || $c_id == '7') {?>
                                  <tr>
                                  <th scope="row" width="25%"><strong>Gender</strong></th>
                                    <td width="75%"><?=$r_data['gender'];?></td>
                                  </tr>

                                  <tr>
                                  <th scope="row" width="25%"><strong>Age</strong></th>
                                    <td width="75%"><?=$r_data['age'] . "years";?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="25%"><strong>Height</strong></th>
                                    <td width="75%"><?=$r_data['height']?></td>
                                  </tr>
                                  <tr>
                                  <th scope="row" width="25%"><strong>Body-weight</strong>
                                  </th>
                                    <td width="75%"><?=$r_data['weight'] . " Kg";?></td>
                                  </tr>
                                   <?php }?>
                                  <?php $symp = json_decode($r_data['symptoms']);?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Symptoms</strong></th>
                                    <td width="75%">
                                        <table>
                                          <tr>
                                            <th scope="row"><strong>Symptoms Name</strong></th>
                                            <th scope="row"><strong>Symptoms Days</strong></th>
                                          </tr>
                                          <?php if (isset($symp) && !empty($symp) && count($symp) > 0) {foreach ($symp as $value) {?>
                                          <tr>
                                            <td><center><?=$value->SymptomsName?></center></td>
                                            <td><center><?=$value->SymptomsDays?></center></td>
                                          </tr>
                                          <?php }}?>
                                        </table>

                                    </td>
                                </tr>
                                <?php
                                if ($c_id == '6' || $c_id == '7') {?>
                                <tr>
                                  <th scope="row" width="25%"><strong>
                                    <?php if($c_id == '7')
                                    {
                                      echo "Visit Start Date";
                                    }else
                                    {
                                      echo "Treatment Start Date";
                                    } ?>
                                  </strong></th>
                                    <td width="75%">

                                        <?php 
                                            if(isset($r_data['treatment_start_date']) && !empty($r_data['treatment_start_date'])) { 
                                                echo date('d-m-Y h:i A',strtotime($r_data['treatment_start_date']));
                                            } else {
                                                echo "N.A";
                                            }
                                        ?>
                                      </td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>
                                    <?php if($c_id == '7')
                                    {
                                      echo "Visit End Date";
                                    }else
                                    {
                                      echo "Treatment End Date";
                                    } ?></strong></th>
                                    <td width="75%">
                                        <?php 
                                            if(isset($r_data['treatment_end_date']) && !empty($r_data['treatment_end_date'])) { 
                                                echo date('d-m-Y h:i A',strtotime($r_data['treatment_end_date']));
                                            } else {
                                                echo "N.A";
                                            }
                                        ?>
                                        </td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Treatment Hours</strong></th>
                                    <td width="75%"><?=$r_data['treatment_hours'];?></td>
                                </tr>
                                 <?php }?>
                                  <?php
                                if ($c_id == '4' || $c_id == '5' || $c_id == '6' || $c_id == '7') { ?>
                                <tr>
                                  <th scope="row" width="25%"><strong>
                                  <?php if($c_id == '6' || $c_id == '7')
                                  {
                                    echo "Service Request Date";
                                  }
                                  elseif($c_id == '5' || $c_id == '4')
                                  {
                                    echo "Consultation Request Date";
                                  }
                                  else
                                  {
                                    echo "Appoitment Date";
                                  }?>
                                   </strong></th>
                                    <td width="75%">

                                        <?php 
                                            if(isset($r_data['appoitment_date']) && !empty($r_data['appoitment_date'])) { 
                                                echo date('d-m-Y h:i A',strtotime($r_data['appoitment_date']));
                                            } else {
                                                echo "N.A";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>
                                  <?php if($c_id == '6' || $c_id == '7')
                                  {
                                    echo "Service Request Time";
                                  } 
                                  elseif($c_id == '5' || $c_id == '4')
                                  {
                                    echo "Consultation Request Time";
                                  }
                                  else
                                  {
                                    echo "Appoitment Time";
                                  }?></strong></th>
                                    <td width="75%">
                                        <?php 
                                            if(isset($r_data['appoitment_time']) && !empty($r_data['appoitment_time'])) { 
                                                echo date('d-m-Y h:i A',strtotime($r_data['appoitment_time']));
                                            } else {
                                                echo "N.A";
                                            }
                                        ?>
                                        </td>
                                </tr>

                                <tr>
                                  <th scope="row" width="25%"><strong>
                                  <?php if($c_id == '6' || $c_id == '7')
                                  {
                                    echo "Service Request Startdate";
                                  }
                                  elseif($c_id == '5' || $c_id == '4')
                                  {
                                    echo "Consultation Request startdate";
                                  }
                                  else
                                  {
                                    echo "Appoitment startdate";
                                  }?></strong></th>
                                    <td width="75%">
                                        <?php 
                                            if(isset($r_data['appoitment_start_date']) && !empty($r_data['appoitment_start_date'])) { 
                                                echo date('d-m-Y h:i A',strtotime($r_data['appoitment_start_date']));
                                            } else {
                                                echo "N.A";
                                            }
                                        ?>
                                    </td>
                                </tr>

                                <?php }?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Consulation Type</strong></th>
                                    <td width="75%"><?=$c_type;?></td>
                                </tr>

                                <?php }?>

                                <tr>
                                  <th scope="row" width="25%"><strong>Main amount</strong></th>
                                    <td width="75%"><?=number_format((float) $r_data['main_amount'], 2, '.', '');?></td>
                                </tr>
                                 <?php
                                if ($c_id == '1' || $c_id == '2' || $c_id == '3') {?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Gst amount</strong></th>
                                    <td width="75%"><?=number_format((float) $r_data['gst_amount'], 2, '.', '');?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Discount amount</strong></th>
                                    <td width="75%"><?=number_format((float) $r_data['discount_amount'], 2, '.', '');?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Final amount</strong></th>
                                    <td width="75%"><?=number_format((float) $r_data['final_amount'], 2, '.', '');?></td>
                                </tr>

                                 <?php if($r_data['category'] == 1){  ?>

                                <tr>
                                  <th scope="row" width="25%"><strong>Delivery type</strong></th>
                                    <td width="75%"><?=$type;?></td>
                                </tr>
                                <?php } else if($r_data['category'] == 2 || $r_data['category'] == 3){ ?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Request Mode</strong></th>
                                    <td width="75%"><?=$type;?></td>
                                </tr>
                                <?php } ?>

                                <tr>
                                  <?php if ($c_id == '2') {?>
                                  <th scope="row" width="25%"><strong>Sample Collection Charge</strong></th>
                                   <td width="75%"><?=number_format((float) $r_data['delivery_charge'], 2, '.', '');?></td>
                                <?php } else { ?>

                                  <?php if($r_data['category'] == 1){  ?>
                                  <th scope="row" width="25%"><strong>Delivery Charge</strong></th>
                                   <td width="75%"><?=number_format((float) $r_data['delivery_charge'], 2, '.', '');?></td>
                                   <?php } ?>

                                   <?php } ?>
                                   
                                </tr>
                                <?php }?>

                                <tr>
                                  <th scope="row" width="25%"><strong>Service Charges</strong></th>
                                    <td width="75%"><?=number_format((float) $r_data['service_charges'], 2, '.', '');?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong><?php if ($c_id == '1') {echo "GST";} else {echo "TDS <span class='badge badge-info'>section 194-o</span>";}?></strong></th>
                                    <td width="75%">

                                            <?php
                                            if($r_data['category'] == 1 || $r_data['category'] == 2 || $r_data['category'] == 3 ){ 
                                                $pharmcy_tds_amt = $app_setting['pharmcy_tds_amt'];
                                                ?>
                                                  <?php echo $r_data['final_amount']*$pharmcy_tds_amt/100; ?>
                                              <?php } else { ?>
                                              <?= number_format((float)$r_data['tds'], 2, '.', ''); ?>
                                              <?php } ?>
                                      </td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Final Receiving Amount</strong></th>
                                    <td width="75%"><?=number_format((float) $r_data['final_receiving_amt'], 2, '.', '');?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Order Status</strong></th>
                                    <td width="75%"><?php if (isset($r_data['change_status_datetime']) && !empty($r_data['change_status_datetime'])) {
                                            $statusdata = json_decode($r_data['change_status_datetime'], true);?>
                                            <table class="table-responsive">
                                            <?php foreach ($statusdata as $statusrow) {?>
                                                <tr>
                                                    <td>
                                                    <?php
                                                    if ($statusrow['id'] == '1') {
                                                            $Status = "Pending";
                                                        } elseif ($statusrow['id'] == '2') {
                                                            $Status = "Accepted";} elseif ($statusrow['id'] == '3' && $c_id == '1') {
                                                            $Status = "Dispatched";
                                                        } elseif ($statusrow['id'] == '4') {
                                                            $Status = "Delivered";
                                                        } elseif ($statusrow['id'] == '5') {
                                                            $Status = "Cancelled";
                                                        } elseif ($statusrow['id'] == '6') {
                                                            $Status = "Reject";
                                                        }
                                                            echo $Status;?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if(isset($statusrow['date']) && !empty($statusrow['date'])) { 
                                                                echo date('d-m-Y h:i A',strtotime($statusrow['date']));
                                                            } else {
                                                                echo "N.A";
                                                            }
                                                        ?>
                                                        </td>
                                                </tr>
                                            <?php }?>
                                            </table>
                                            <?php }?>
                                    </td>
                                </tr>
                                <?php 
                                /*  if(isset($r_data['appointment_status']) && !empty($r_data['appointment_status']) && $r_data['appointment_status']=="2") { ?>
                                 <tr>
                                  <th scope="row" width="25%"><strong>Invoice</strong></th>
                                    <td width="75%">
                                      <?php if (isset($r_data['invoice']) && !empty($r_data['invoice'])) { ?> 

                                        <a href="<?= base_url().'reports/genrate_invoice/'.$c_id.'/'.$r_data['id'];?>">Download Invoice</a>
                                     <?php }  ?>
                                    </td>
                                </tr>
                                <?php } */ ?>

                                <tr>
                                  <th scope="row" width="25%"><strong>Created at</strong></th>
                                    <td width="75%"><?php echo date("d-m-Y h:i A", strtotime($date)); ?></td>
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
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

function imagedownload(id)
{
    window.location.href = "<?= base_url().'orders/prescription_download/'?>"+id;
}


function image_download(id)
{
    window.location.href = "<?= base_url().'orders/get_prescription_download/'?>"+id;
}



    /*$(document).ready(function(){
      var id = '<?php echo $c_id; ?>';
      if(id==1){
    $('#back').attr('href',"<?=base_url() . 'report/pharmacy-report'?>");
   }else if(id==2){
    $('#back').attr('href',"<?=base_url() . 'report/pathologylabs-report'?>");
    }else if(id==3){
    $('#back').attr('href',"<?=base_url() . 'report/radiology-report'?>");
   }else if(id==4){
    $('#back').attr('href',"<?=base_url() . 'report/doctors-report'?>");
   }else if(id==5){
   $('#back').attr('href',"<?=base_url() . 'report/veterinary-doctors-report'?>");
   }else if(id==6){
    $('#back').attr('href',"<?=base_url() . 'report/nurse-report'?>");
   }else if(id==7){
    $('#back').attr('href',"<?=base_url() . 'report/physiotherapist-report'?>");
   }
    });*/
</script>

