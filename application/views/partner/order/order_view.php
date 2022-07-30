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
        <div class="col-sm-12"><h2 class="full_width job-post-title"><?= $title; ?></h2></div>
        <div class="col-sm-12">
            <nav aria-label="breadcrumb" class="mt-22">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?= base_url().'my-dashboard'; ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </nav>
        </div>
        <div class="full_width c_info_details">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row_eq_height">
                    <div class="d-flex align-items-top w_100">
                        <div class="full_width c_infos">
                            <div class="full_width c_i_details">
                             
                                <table class="table table-hover table-bordered detail-view">
                                    <tbody>
                                        <?php if (isset($reportdata['reason']) && !empty($reportdata['reason'])) {  ?>
                                            <tr>
                                                <th scope="row" width="25%"><strong>Reject Reason</strong></th>
                                                <td width="75%"><?= $reportdata['reason']; ?></td>
                                            </tr>
                                        <?php } ?>

                                        <tr>
                                            <th scope="row" width="25%"><strong>Name</strong></th>
                                            <td width="75%"><?= $reportdata['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Mobile No</strong></th>
                                            <td width="75%"><?= $reportdata['mobile_no']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Gender</strong></th>
                                            <td width="75%"><?= $reportdata['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Age</strong></th>
                                            <td width="75%"><?= $reportdata['age']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Address</strong></th>
                                            <td width="75%"><?= $reportdata['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                                if ($_SESSION['usercategory'] == 1) {
                                                    if ($reportdata['delivery_type'] == 1) {
                                                        $delivery_type = 'Home Delivery';
                                                    } else {
                                                        $delivery_type = 'Self Pickup';
                                                    }
                                                } else {
                                                    if ($reportdata['delivery_type'] == 1) {
                                                        $delivery_type = 'At Home';
                                                    } else {
                                                        $delivery_type = 'At Lab';
                                                    }
                                                }

                                                ?>
                                            <th scope="row" width="25%"><strong>
                                            <?php if ($_SESSION['usercategory'] == 1) {  ?>
                                            Delivery Type
                                            <?php } else { ?>
                                            Mode of Request 
                                            <?php } ?>
                                            </strong></th>
                                            <td width="75%"><?= $delivery_type; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Priscription</strong></th>
                                            <td width="75%">
                                                <?php
                                                $returnpath = $this->config->item('prescription_uploaded_path');
                                                if (count($prescription) > 0) {
                                                    foreach ($prescription as $k => $cd) {?> 
                                                <img src="<?php echo $returnpath.$cd['filename']; ?>" class="img-thumbnail viewImage mb-2" height="70" width="70" id="<?= $cd['id']; ?>" onclick="showimg(<?= $cd['id']; ?>)"/><button type="button" class="btn btn-sm btn-info" onclick='imagedownload(<?= $cd['id']; ?>)'><i class="fa fa-download" aria-hidden="true"></i></button>
                                                <?php }
                                                }?>
                                            </td>
                                        </tr>
                                        <?php if ($reportdata['category'] == 1) { ?>
                                            <?php if ($reportdata['reference_doctor'] != '') { ?>
                                            <tr>
                                                <th scope="row" width="25%"><strong>Refernce Doctor Name</strong></th>
                                                <td width="75%"><?php echo $reportdata['reference_doctor']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Medicine</strong></th>
                                            <td width="75%">
                                                <table class="example table table-striped table-bordered table-data-load"
                                                style="width:100%"> 
                                                    <thead> 
                                                        <tr> 
                                                            <th scope="col">No.</th> 
                                                            <th scope="col">Name</th>
                                                            <th scope="col">No of tablets</th>
                                                            <th scope="col">MANUFACTURER</th>
                                                            <th scope="col">Generic</th>
                                                            <th scope="col">Qty</th>
                                                           
                                                            <th scope="col">MRP</th>
                                                           
                                                            <th scope="col">GST(%)</th>
                                                            <th scope="col">Discount Price</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php if (count($items) > 0) {
                                                    $rowno = 1;
                                                    for ($i = 0; $i < count($items); ++$i) {
                                                        $medicinelist = unserialize($items[$i]['medicine_serialize']); ?>
                                                        <tr>
                                                            <td><?php echo $rowno; ?></td>
                                                            <td><?php echo strtoupper($medicinelist['name']); ?></td>
                                                            <td><?php echo strtoupper($medicinelist['no_of_tablets']); ?></td>
                                                            <td><?php echo strtoupper($medicinelist['manufacture_name']); ?></td>
                                                            <td><?php echo strtoupper($medicinelist['generic_name']); ?></td>
                                                            <td><?php echo strtoupper($medicinelist['medicine_qty']); ?></td>
                                                            <td><?php echo number_format((float) $medicinelist['mrp'], 2, '.', ''); ?></td>
                                                            <td><?php echo number_format((float) $medicinelist['gst'], 2, '.', ''); ?>
                                                            </td>
                                                            <td><?php echo number_format((float) $medicinelist['discount'], 2, '.', ''); ?>
                                                            </td>
                                                            
                                                            <td><?php echo number_format((float) $medicinelist['total'], 2, '.', ''); ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        ++$rowno;
                                                    }
                                                } ?> 
                                                    </tbody>
                                                </table>  
                                            </td>
                                        </tr>
                                        <?php }  ?>
                                        <?php if ($reportdata['category'] == 2 || $reportdata['category'] == 3) { ?>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Test</strong></th>
                                            <td width="75%">
                                                <table class="example table table-striped table-bordered table-data-load"
                                                style="width:100%"> 
                                                    <thead> 
                                                        <tr> 
                                                            <th scope="col">No.</th> 
                                                            <th scope="col">Name</th>
                                                            
                                                            <th scope="col">Charges</th>
                                                            <th scope="col">GST Amt</th>
                                                            <th scope="col">GST(%)</th>
                                                            <th scope="col">Discount Price</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php

                                                        if (count($items) > 0) {
                                                            $rowno = 1;
                                                            foreach ($items as $k => $category) {
                                                                $testlist = unserialize($category['test_serialize']);
                                                                // echo "<pre>";
                                                                // print_r($category);
                                                                // echo "</pre>";?>
                                                         <tr>
                                                            <td><?php echo $rowno; ?></td>
                                                            <td><?php echo $category['name']; ?></td>
                                                            <td><?php echo number_format((float) $category['mrp'], 2, '.', ''); ?></td>

                                                             <td><?php echo number_format((float) $category['gst'], 2, '.', ''); ?>
                                                            </td>
                                                            <td><?php echo number_format((float) $category['gst_per'], 2, '.', ''); ?>
                                                            
                                                            <td><?php echo number_format((float) $category['discount'], 2, '.', ''); ?>
                                                            </td>
                                                           
                                                            <td><?php echo number_format((float) $category['total'], 2, '.', ''); ?>
                                                            </td>
                                                            
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        ++$rowno;
                                                            }
                                                        } ?> 
                                                    </tbody>
                                                </table>  
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <?php if ($reportdata['category'] == 1) { ?>
                                            <th scope="row" width="25%"><strong>Total MRP Amount</strong></th>
                                          <?php }

                                          if ($reportdata['category'] == 2 || $reportdata['category'] == 3) { ?>
                                            <th scope="row" width="25%"><strong>Charges</strong></th>
                                           <?php } ?> 
                                            <td width="75%"><?php echo number_format((float) $reportdata['main_amount'], 2, '.', ''); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Total GST</strong></th>
                                            <td width="75%"><?php echo number_format((float) $reportdata['gst_amount'], 2, '.', ''); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Total Discount</strong></th>
                                            <td width="75%"><?php echo number_format((float) $reportdata['discount_amount'], 2, '.', ''); ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row" width="25%"><strong>Total Amount</strong></th>
                                            <td width="75%"><?php echo number_format((float) $reportdata['final_amount'], 2, '.', ''); ?></td>
                                        </tr>

                                        <tr>
                                          <th scope="row" width="25%"><strong>Service Charges</strong></th>
                                            <td width="75%"><?= number_format((float) $reportdata['service_charges'], 2, '.', ''); ?></td>
                                        </tr>

                                        <tr>
                                          <th scope="row" width="25%">
                                            <?php  ?>
                                            <strong><?php if ($reportdata['category'] == 1 || $reportdata['category'] == 2 || $reportdata['category'] == 3) {
                                              echo 'GST';
                                          } else {
                                              echo 'TDS';
                                          } ?></strong></th>
                                            <td width="75%">

                                              <?php if ($reportdata['category'] == 1 || $reportdata['category'] == 2 || $reportdata['category'] == 3) {
                                              $pharmcy_tds_amt = $app_setting['pharmcy_tds_amt'];
                                              if ($reportdata['service_charges'] == '0') {
                                                  echo '0.00';
                                              } else {
                                                  echo $reportdata['service_charges'] * $pharmcy_tds_amt / 100;
                                              } ?>
                                              <?php
                                          } else { ?>
                                              <?= number_format((float) $reportdata['tds'], 2, '.', ''); ?>
                                              <?php } ?>
                                              </td>

                                        </tr>
                                        <tr>
                                          <th scope="row" width="25%"><strong>Final Receiving Amount</strong></th>
                                            <td width="75%"><?= number_format((float) $reportdata['final_receiving_amt'], 2, '.', ''); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="float-right">
                                                    <?php if ($reportdata['order_status'] == 1 || $reportdata['order_status'] == 6) { ?> 
                                                    <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'2'; ?>" class="btn btn-success btn-sm ">Approve</a>
                                                    <?php } ?>
                                                    <?php if ($reportdata['order_status'] == 2) { ?> 
                                                    <?php if ($reportdata['category'] == 1) { ?>
                                                    <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'3'; ?>" class="btn btn-success btn-sm ">Dispatch</a>
                                                   <?php } ?>
                                                   <?php if ($reportdata['category'] == 2) { ?>
                                                   <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'7'; ?>" class="btn btn-success btn-sm ">Sample Collect Remaining</a>
                                                   <?php } ?>
                                                   <?php if ($reportdata['category'] == 3) { ?>
                                                    <button type="button" class="btn btn-success btn-sm" onclick="bookappointment(<?= $reportdata['patient_id']; ?>);">Book</button>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($reportdata['order_status'] == 7) { ?>
                                                        <?php if ($reportdata['category'] == 2 || $reportdata['category'] == 3) { ?>
                                                            <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'3'; ?>" class="btn btn-success btn-sm "><?php if ($reportdata['category'] == 2) {
                                              echo 'Sample Collect';
                                          } else {
                                              echo 'Complete Appointment';
                                          } ?></a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($reportdata['order_status'] == 1) { ?>
                                                        <a href="javascript:void(0);" onclick="view_edit_popup('<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'6'; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class="btn btn-danger">Reject</a>
                                                    <?php /* <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'6'; ?>" class="btn btn-danger btn-sm ">Reject</a> */ ?>
                                                    <?php } ?>
                                                    <?php if ($reportdata['category'] == 1) { ?>
                                                    <?php if ($reportdata['order_status'] == 2) { ?>
                                                        <a href="javascript:void(0);" onclick="view_edit_popup('<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'6'; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class="btn btn-danger">Reject</a>
                                                    <?php /* <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'6'; ?>" class="btn btn-danger btn-sm ">Reject</a> */ ?>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($reportdata['order_status'] == 3) { ?> 
                                                        <?php if ($reportdata['category'] == 1) { ?>
                                                        <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'4'; ?>" class="btn btn-success btn-sm ">Delivered</a>
                                                        <?php } ?>
                                                        <?php if ($reportdata['category'] == 2 || $reportdata['category'] == 3) { ?>
                                                        <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'8'; ?>" class="btn btn-success btn-sm ">Pending Report</a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($reportdata['order_status'] == 8) { ?> 
                                                        <?php if ($reportdata['category'] == 2 || $reportdata['category'] == 3) { ?>
                                                            <a class="btn btn-success btn-sm" onclick="deliverd_report(<?= $reportdata['patient_id']; ?>);">Delivered Report</a>
                                                            
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($reportdata['category'] == 1) {
                                              if ($reportdata['order_status'] == 4 || ($reportdata['category'] == 2 && $reportdata['order_status'] == 2)) { ?> 

                                                   <a href="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'4'; ?>" class="btn btn-info btn-sm ">Genrate Invoice</a>
                                                    <?php }
                                          } ?>
                                                </div>
                                            </td>
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
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="book-appoitment" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form class="form" method="post" id="appoitmentform" name="form" action="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'7'; ?>" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="modal-header"><h4>Give Appointment Slot</h4></div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Date<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" name="date" id="date" min='<?= date('Y-m-d'); ?>'> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Time<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="time" name="time"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Book</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="deliverd_report" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form class="form" method="post" id="deliverdform" name="form" action="<?php echo base_url().'orders/changeStatus/'.$reportdata['id'].'?status='.'4'; ?>" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="modal-header"><h4>Attach Report PDF</h4></div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Files<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="report_pdf[]" id="report_pdf" accept="application/pdf" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
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
    window.location.href = "<?= base_url().'orders/prescription_download/'; ?>"+id;
}
function bookappointment(patientid)
{
    $('#book-appoitment').modal('show');
}
function deliverd_report(patientid)
{
    $('#deliverd_report').modal('show');
}
</script>
<script>
    $(function() {
        $("#appoitmentform").validate({
        rules: {
            report_pdf: {
                required:true,
                extension: "pdf"
            },
            
        },
        messages: {
            report_pdf: {
                required:"Please Enter Valid date",
                extension:"select valied input file format"
            },
            
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
$(function() {
        $("#deliverdform").validate({
        rules: {
            date: {
                required:true,
                date: true,
            },
            time: {
                required:true,
                time: true,
            },
        },
        messages: {
            date: {required:"Please Enter Valid date"},
            time: {required:"Please Enter Time"},
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>



