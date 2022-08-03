<?php $urlsegment = $this->uri->segment(2);
// echo "<pre>";
// print_r($reportdata);
// exit;
?>
<div class="full_width main_contentt mc_inner load-job">
    <div class="full_width main_contentt_padd">
        <div class="full_width searchby-truck-main my-ratings my-network">
            <h2 class="full_width job-post-title"><?= $title; ?></h2>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <table id="example233" class="example table
                        table-striped table-bordered table-data-load"
                        style="width:100%"> 
                        <thead> 
                            <tr> 
                                <th scope="col">#</th> 
                                <?php if ($_SESSION['usercategory'] == 1) {  ?>
                                    <th scope="col">Order ID</th>
                                    <?php } else { ?>
                                    <th scope="col">Booking ID</th>
                                    <?php } ?>
                                <th scope="col">Name</th> 
                                <th scope="col" width="150px">Date</th>
                                <?php if ($_SESSION['usercategory'] == 1) {  ?>
                                    <th scope="col">Delivery Type</th> 
                                    <?php } else { ?>
                                     <th scope="col">Mode of Request</th> 
                                    <?php } ?>

                               
                                <th scope="col">Amount</th> 
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (count($reportdata) > 0) {
                                $rowno = 1;
                                foreach ($reportdata as $category) {
                                    if ($_SESSION['usercategory'] == 1) {
                                        if ($category['delivery_type'] == 1) {
                                            $delivery_type = 'Home Delivery';
                                        } else {
                                            $delivery_type = 'Self Pickup';
                                        }
                                    } else {
                                        if ($category['delivery_type'] == 1) {
                                            $delivery_type = 'At Home';
                                        } else {
                                            $delivery_type = 'At Lab';
                                        }
                                    } ?>  
                                    <tr>
                                        <td><?php echo $rowno; ?></td>
                                        <td><?php echo $category['customorder_id']; ?></td>
                                        <td><?php echo $category['name']; ?></td>
                                        <td><?php echo date('d-m-Y h:i A', strtotime($category['created_at'])); ?></td>
                                        <td><?php echo $delivery_type; ?></td>
                                        <td> <?php echo number_format((float) $category['final_amount'], 2, '.', ''); ?>
                                        </td>
                                        <td>
                                            <?php /* New */ if ($category['order_status'] == 1 || $category['order_status'] == 6) { ?> 
                                                    <a href="<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'2'; ?>" class="btn btn-success btn-sm ">Approve</a>
                                                    <?php } ?>
                                                    <?php if ($category['order_status'] == 2) { ?> 
                                                    <?php if ($category['category'] == 1) { ?>
                                                    <a href="<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'3'; ?>" class="btn btn-success btn-sm ">Dispatch</a>
                                                   <?php } ?>
                                                   <?php if ($category['category'] == 2) { ?>
                                                   <a href="<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'7'; ?>" class="btn btn-success btn-sm ">Sample Collect Remaining</a>
                                                   <?php } ?>
                                                   <?php if ($category['category'] == 3) { ?>
                                                    <button type="button" class="btn btn-success btn-sm" onclick="bookappointment(<?= $category['id']; ?>);">Book</button>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($category['order_status'] == 7) { ?>
                                                        <?php if ($category['category'] == 2 || $category['category'] == 3) { ?>
                                                            <a href="<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'3'; ?>" class="btn btn-success btn-sm "><?php if ($category['category'] == 2) {
                                        echo 'Sample Collect';
                                    } else {
                                        echo 'Complete Appointment';
                                    } ?></a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($category['order_status'] == 1) { ?>
                                                        <a href="javascript:void(0);" onclick="view_edit_popup('<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'6'; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class="btn btn-danger">Reject</a>
                                                    <?php } ?>
                                                    <?php if ($category['category'] == 1) { ?>
                                                    <?php if ($category['order_status'] == 2) { ?>
                                                    <!-- <a href="<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'6'; ?>" class="btn btn-danger btn-sm ">Reject</a> -->
                                                    <a href="javascript:void(0);" onclick="view_edit_popup('<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'6'; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class="btn btn-danger">Reject</a>
                                                    <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($category['order_status'] == 3) { ?> 
                                                        <?php if ($category['category'] == 1) { ?>
                                                        <a href="<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'4'; ?>" class="btn btn-success btn-sm ">Delivered</a>
                                                        <?php } ?>
                                                        <?php if ($category['category'] == 2 || $category['category'] == 3) { ?>
                                                        <a href="<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'8'; ?>" class="btn btn-success btn-sm ">Pending Report</a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($category['order_status'] == 8) { ?> 
                                                        <?php if ($category['category'] == 2 || $category['category'] == 3) { ?>
                                                            <a class="btn btn-success btn-sm" onclick="deliverd_report(<?= $category['patient_id']; ?>);">Delivered Report</a>
                                                            
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($category['category'] == 1) {
                                        if ($category['order_status'] == 4 || ($category['category'] == 2 && $category['order_status'] == 2)) { ?> 

                                                   <a href="<?php echo base_url().'orders/changeStatus/'.$category['id'].'?status='.'4'; ?>" class="btn btn-info btn-sm ">Genrate Invoice</a>
                                                    <?php }
                                    } ?>
                                                    <a href="<?= base_url().'orders/view/'.$category['id']; ?>" data-toggle="tooltip"  data-placement="left" title="View" class="btn btn-sm"><i class="fa fa-eye btn btn-warning btn-sm" style="font-size: 18px;"></i></a><?php if ($category['order_status'] == 4) { ?> <a href="<?= base_url().'orders/genrate_invoice/'.$category['id']; ?>" title="View" class="btn btn-info btn-sm">invoice</a>
                                                 <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                    ++$rowno;
                                }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="book-appoitment" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form class="form" method="post" id="appoitmentform" name="form" action="<?php echo base_url().'orders/changeStatus/'.'878'.'?status='.'7'; ?>" accept-charset="utf-8" enctype="multipart/form-data">
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="widget footer-widgets tag-widget">
                    <form class="form-horizontal form3" action="" id="contactform" method="post" style="margin-top:15px;" novalidate="novalidate">
                        <!-- Form Name -->
                        <!-- Text input-->
                        
                        <div class="form-group ">
                            <textarea class="form-control" name="message" id="message" placeholder="Message" required="required"></textarea>

                        </div>
                            <div class="form-group ">
                             <button class="btn btn-theme" id="btnContactUs" name="save_button" value="Inquiry Now">Save Reason</button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">

$(document).ready( function () {
        // alert("LOKK");
    // $('#example23').DataTable();
        var table = $('#example233').DataTable({
            "order": [[0, "DESC" ]]
        });

});

    function bookappointment(patientid)
    {
        var url = '<?php echo base_url().'orders/changeStatus/'; ?>'+patientid+'?status='+'7';
        $('#appoitmentform').attr('action', url);
        $('#book-appoitment').modal('show');
    }

    $("#btnInquiry").click(function(){
        alert("sss");
         $('#myModal').modal('show');
    });
</script>
