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
            <h2 class="full_width job-post-title"><?= $r_data['c_name']." Report Detail"; ?></h2>
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
                                <h4><?= $r_data['c_name']." Detail"; ?></h4>
                            </div>
                        <div class="full_width c_i_details">
                            <table class="table table-hover table-bordered detail-view">
                                <tbody>   
                                    <?php
                                    if($c_id=='2' || $c_id=='3') {
                                        if($r_data['order_status']=='3'){
                                            $Status = "Sample Collected / Appointment Completed"; $class="label label-primary";
                                        }if($r_data['order_status']=='7'){
                                            $Status = "Pending Sample Collect / Pending Appointment"; $class="label label-danger";
                                        }if($r_data['order_status']=='8'){
                                            $Status = "Pending Report"; $class="label label-danger"; }
                                    }
                                    if($c_id=='1' || $c_id=='2' || $c_id=='3'){
                                        if($r_data['order_status']=='1'){ 
                                            $Status = "Pending"; $class="label label-danger";
                                        }elseif($r_data['order_status']=='2'){
                                            $Status = "Accepted"; $class="label label-primary"; }
                                        elseif($r_data['order_status']=='3' && $c_id=='1'){
                                            $Status = "Dispatched"; $class="label label-info";
                                        }elseif ($r_data['order_status']=='4'){
                                            $Status = "Delivered"; $class="label label-success";
                                        }elseif ($r_data['order_status']=='5'){
                                            $Status = "Cancelled"; $class="label label-danger";
                                        }elseif ($r_data['order_status']=='6'){
                                            $Status = "Reject"; $class="label label-danger";
                                        }
                                        }elseif($c_id=='4' || $c_id=='5' || $c_id=='6' || $c_id=='7'){
                                          if($r_data['appointment_status']=='0'){
                                            $Status = "Pending"; $class="label label-danger";
                                          }elseif ($r_data['appointment_status']=='1'){ 
                                            $Status = "Start Consultation"; $class="label label-info";
                                          }elseif($r_data['appointment_status']=='2'){
                                            $Status = "End Consultation"; $class="label label-info";
                                          }elseif($r_data['appointment_status']=='3'){
                                            $Status = "Cancelled"; $class="label label-danger";
                                          }elseif($r_data['appointment_status']=='4'){
                                            $Status = "Rejected"; $class="label label-danger";} 
                                         }
                                          if($r_data['delivery_type']=='1'){
                                            $type = "selfpickup";
                                          }elseif($r_data['delivery_type']=='2'){
                                            $type = "homedelivery";
                                          }elseif($r_data['delivery_type']=='0'){
                                            $type = "Both"; }

                                          if($r_data['consulation_type']=='0'){
                                            $c_type = "online";
                                          }elseif($r_data['consulation_type']=='1'){
                                            $c_type = "home";
                                          }elseif($r_data['consulation_type']=='2'){
                                            $c_type = "Both"; } 
                                            if($r_data['patient_realative']=='0'){
                                            $p_rel = "Self";
                                          }elseif($r_data['patient_realative']=='1'){
                                            $p_rel = "Relative"; }

                                      $date = explode(" ",$r_data['created_at']);
                                      $tret_start_date = explode(" ",$r_data['treatment_start_date']);
                                      $tret_end_date = explode(" ",$r_data['treatment_end_date']);?>
                                    <tr>
                                        <th scope="row" width="25%"><strong>Status</strong></th>
                                        <td width="75%"><label class="<?php if(isset($class)){ echo $class; }?>" style="font-size:13px;"><?= $Status ?></label></td>
                                    </tr>
									<?php if(isset($Status) && $Status=="Cancelled"){ ?>
                                    <tr>
                                      <th scope="row" width="25%"><strong>Reason For Cancellation</strong></th>
									  <td width="75%"><label class="" style="font-size:13px;"><?php if(isset($r_data['reason'])){ echo $r_data['reason']; }?></label></td>
                                    </tr>  
									<?php } ?>         
                                    <tr>
                                      <th scope="row" width="25%"><strong>Category</strong></th>
                                        <td width="75%"><?= $r_data['c_name']; ?></td>
                                    </tr>
                                <?php if($c_id != 5){ ?> 
                                <tr>
                                  <th scope="row" width="25%"><strong>Name</strong></th>
                                    <td width="75%"><?= $r_data['name']; ?></td>
                                </tr>
                                <?php } else{ ?> 
                                <tr>
                                    <th scope="row" width="25%"><strong>Animal Category</strong></th>
                                    <td width="75%"><?= $r_data['animal_category']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="25%"><strong>Animal Name</strong></th>
                                    <td width="75%"><?= $r_data['animal_name']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Animal Care Taker</strong></th>
                                  <td width="75%"><?= $r_data['animal_caretaker']; ?></td>
                                </tr>
                                <?php  } ?>
                                <tr>
                                    <th scope="row" width="25%"><strong>Mobile-Number</strong></th>
                                    <td width="75%"><?= $r_data['country_code']." ".$r_data['mobile_no']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="25%"><strong>Address</strong></th>
                                    <td width="75%"><?= $r_data['address']; ?></td>
                                </tr>
                                <?php if($c_id != 5){ ?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Patient Relative</strong></th>
                                    <td width="75%"><?php  if(isset($p_rel)){ echo $p_rel; } ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Reference-doctor</strong></th>
                                    <td width="75%"><?= $r_data['reference_doctor']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Prescription</strong></th>
                                    <td width="75%"><?= $r_data['prescription']; ?></td>
                                </tr>
                                <?php if(isset($medicines) && count($medicines)>0){ if($c_id=='1'||$c_id=='2'||$c_id=='3'){ ?>
                                <tr>
                                    <?php if($c_id=='1'){ ?>  
                                        <th scope="row" width="25%"><strong>Medicines</strong></th>
                                    <?php }else{ ?>
                                    <th scope="row" width="25%"><strong>Test</strong></th>
                                    <?php } ?>
                                    <td width="75%">
                                       <div class="table-responsive">
	                                        <table>
	                                            <tr>
	                                              <?php if($c_id=='1'){ ?>
	                                              <th>Name</th>
	                                              <th>Company-name</th>
	                                              <th>Batch-no</th>
	                                              <th>No of tablets</th>
	                                              <th>Exp.date</th>
	                                              <th>Qty</th>
	                                              <th>Stock</th>
	                                              <?php }elseif($c_id=='2'||$c_id=='3'){ ?>
	                                               <th>Test Name</th> 
	                                               <th>Image</th>
	                                              <?php } ?>
	                                              <th>Mrp</th>
	                                              <th>discount percatnage(%)</th>
	                                              <th>discount amount</th>
	                                              <th>Sale-price</th>
	                                              <th>Gst</th>
	                                              <th>Gst.Per</th>
	                                              <th>Total</th>
	                                            </tr>
	                                            
	                                              <?php 
	                                              foreach($medicines as $value){
	                                              if($c_id=='1')
	                                              { ?>
	                                              	<tr>
			                                            <td><?= strtoupper($value['name']); ?></td>
			                                            <td><?= strtoupper($value['company_name']); ?></td>
			                                            <td><?= $value['batch_no']; ?></td>
			                                            <td><?= strtoupper($value['no_of_tablets']); ?></td>
			                                            <td><?= $value['expiry_date']; ?></td>
			                                            <td><?= $value['medicine_qty']; ?></td>
			                                            <td><?= $value['stock']; ?></td>
			                                            <?php }elseif($c_id=='2'||$c_id=='3'){ ?>
			                                            <td><?= $value['name']; ?></td>
			                                            <td><?= $value['image']; ?></td>
			                                            <?php } ?>
			                                            <td><?= $value['mrp']; ?></td>
			                                            <td><?= $value['discount_per'].'%'; ?></td>
			                                            <td><?= $value['discount']; ?></td>
			                                            <td><?= $value['sale_price']; ?></td>
			                                            <td><?= $value['gst']; ?></td>
			                                            <td><?= $value['gst_per']; ?></td>
			                                            <td><?= $value['total']; ?></td>
		                                            		<?php } ?>
	                                        		</tr>
	                                    	</table>
                                    	</div>
                                    </td>
                                </tr>
                                <?php } } ?>
                                <?php if($c_id=='4'||$c_id=='5'||$c_id=='6'||$c_id=='7'){ ?> 
                                  <?php if($c_id=='4'||$c_id=='6'||$c_id=='7'){ ?>
                                  <tr>
                                  <th scope="row" width="25%"><strong>Gender</strong></th>
                                    <td width="75%"><?= $r_data['gender']; ?></td>
                                  </tr>
                                  
                                  <tr>
                                  <th scope="row" width="25%"><strong>Age</strong></th>
                                    <td width="75%"><?= $r_data['age']."years"; ?></td>
                                  </tr>
                                  <tr>
                                    <th scope="row" width="25%"><strong>Height</strong></th>
                                    <td width="75%"><?= $r_data['height'] ?></td>
                                  </tr>
                                  <tr>
                                  <th scope="row" width="25%"><strong>Body-weight</strong>
                                  </th>
                                    <td width="75%"><?= $r_data['weight']." Kg"; ?></td>
                                  </tr>
                                   <?php } ?>
                                  <?php $symp = json_decode($r_data['symptoms']); ?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Symptoms</strong></th>
                                    <td width="75%">
                                        <table>
                                          <tr>
                                            <th scope="row"><strong>Symptoms Name</strong></th>
                                            <th scope="row"><strong>Symptoms Days</strong></th>
                                          </tr>
                                          <?php if(isset($symp) && !empty($symp) && count($symp) > 0)
                                              { foreach($symp as $value){ ?>
                                          <tr>  
                                            <td><center><?= $value->SymptomsName ?></center></td>
                                            <td><center><?= $value->SymptomsDays ?></center></td>
                                          </tr>
                                          <?php } } ?>
                                        </table>
                                      
                                    </td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Treatment Start Date</strong></th>
                                    <td width="75%"><?= $tret_start_date[0]; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Treatment End Date</strong></th>
                                    <td width="75%"><?= $tret_end_date[0];; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Treatment Hours</strong></th>
                                    <td width="75%"><?= $r_data['treatment_hours']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Appoitment Date</strong></th>
                                    <td width="75%"><?= $r_data['appoitment_date']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Appoitment Time</strong></th>
                                    <td width="75%"><?= $r_data['appoitment_time']; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Consulation Type</strong></th>
                                    <td width="75%"><?= $c_type; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Appoitment start-date</strong></th>
                                    <td width="75%"><?= $r_data['appoitment_start_date']; ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Main amount</strong></th>
                                    <td width="75%"><?= number_format((float)$r_data['main_amount'], 2, '.', ''); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Gst amount</strong></th>
                                    <td width="75%"><?= number_format((float)$r_data['gst_amount'], 2, '.', ''); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Discount amount</strong></th>
                                    <td width="75%"><?= number_format((float)$r_data['discount_amount'], 2, '.', ''); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Final amount</strong></th>
                                    <td width="75%"><?= number_format((float)$r_data['final_amount'], 2, '.', ''); ?></td>
                                </tr>
                                <?php 
                                if($c_id=='1'||$c_id=='2'||$c_id=='3') { ?>
                                <tr>
                                  <th scope="row" width="25%"><strong>Delivery type</strong></th>
                                    <td width="75%"><?= isset($type) ? $type:''; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Delivery Charge</strong></th>
                                    <td width="75%"><?= number_format((float)$r_data['delivery_charge'], 2, '.', ''); ?></td>
                                </tr>
                                <?php } ?>
                                
                                <tr>
                                  <th scope="row" width="25%"><strong>Service Charges</strong></th>
                                    <td width="75%"><?= number_format((float)$r_data['service_charges'], 2, '.', ''); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong><?php if($c_id=='1'){ echo "GST";} else {echo "TDS";} ?></strong></th>
                                    <td width="75%"><?= number_format((float)$r_data['tds'], 2, '.', ''); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Final Dispatch Amount</strong></th>
                                    <td width="75%"><?= number_format((float)$r_data['final_receiving_amt'], 2, '.', ''); ?></td>
                                </tr>
                                <tr>
                                  <th scope="row" width="25%"><strong>Created at</strong></th>
                                    <td width="75%"><?= $date[0]; ?></td>
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
    /*$(document).ready(function(){
      var id = '<?php echo $c_id; ?>';
      if(id==1){
    $('#back').attr('href',"<?= base_url().'report/pharmacy-report' ?>");
   }else if(id==2){
    $('#back').attr('href',"<?= base_url().'report/pathologylabs-report' ?>");
    }else if(id==3){
    $('#back').attr('href',"<?= base_url().'report/radiology-report' ?>");
   }else if(id==4){
    $('#back').attr('href',"<?= base_url().'report/doctors-report' ?>");
   }else if(id==5){
   $('#back').attr('href',"<?= base_url().'report/veterinary-doctors-report' ?>");
   }else if(id==6){
    $('#back').attr('href',"<?= base_url().'report/nurse-report' ?>");
   }else if(id==7){
    $('#back').attr('href',"<?= base_url().'report/physiotherapist-report' ?>");
   }
    });*/
</script>

