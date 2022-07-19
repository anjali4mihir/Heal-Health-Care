
<div class="full_width main_contentt mc_inner load-job">
    <div class="full_width main_contentt_padd">
        <div class="full_width searchby-truck-main my-ratings my-network">
            <div class="col-sm-12">
                <h2 class="full_width job-post-title"><?= $title ?></h2>
            </div>
            <div class="col-sm-12">
                <nav aria-label="breadcrumb" class="mt-22">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item">
                            <?php

                            if($this->session->userdata('role')=='1' || $this->session->userdata('role')=="0"){
                                $url = 'admin/dashboard';
                            }if($this->session->userdata('userid')){
                                $url = 'my-dashboard';
                            }if ($this->session->userdata('role')=='1' || $this->session->userdata('role')=="0" && $this->session->userdata('userid')) {
                                $currentURL = current_url();
                                $url = explode('/',$currentURL);
                                if($url[4]=='pharmacy-report')
                                {
                                        $url = 'admin/dashboard';
                                }else{
                                    $url = 'my-dashboard';
                                }
                            }
                            ?>
                            <a href="<?= base_url().$url;?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title?></li>
                    </ol>
                </nav>
            </div>
            <div class="tab-content" id="myTabContent" >
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">                    
                        
                            <form method="post" id="myform">
                            <div class="col-xl-3">
                                <div><h7><b>Select Status</b></h7></div>
                                <select class="form-control" name="status_select" style="margin-top:10px;" id="status_select">
                                    <option value="">--Select Status--</option>
                                    <?php
                                    $str='selected="selected"';
                                    if($c_id=='1'|| $c_id=='2' || $c_id=='3')
                                        
                                    { ?>
                                        <option value="1" <?php if(isset($status) && $status=="1"){echo $str;}?>>Pending</option>
                                        <option value="2" <?php if(isset($status) && $status=="2"){echo $str;}?>>Accepted</option>
                                        <option value="3" <?php if(isset($status) && $status=="3"){echo $str;}?>>Dispatched</option>
                                        <option value="4" <?php if(isset($status) && $status=="4"){echo $str;}?>>Delivered</option>
                                        <option value="5" <?php if(isset($status) && $status=="5"){echo $str;}?>>Cancelled</option>
                                        <option value="6" <?php if(isset($status) && $status=="6"){echo $str;}?>>Reject</option>
                                        <?php 
                                        if($c_id=='2' || $c_id=='3') { ?>
                                        <option value="7" <?php if(isset($status) && $status=="7"){echo $str;}?>>Pending Sample Collect / Pending Appointment</option>
                                        <option value="8" <?php if(isset($status) && $status=="8"){echo $str;}?>>Pending Report</option>
                                    <?php } } elseif($c_id=='4'|| $c_id=='5' || $c_id=='6' || $c_id=='7'){ ?>
                                        <option value="0" <?php if(isset($status) && $status=="0"){echo $str;}?>>Pending</option>
                                        <option value="1" <?php if(isset($status) && $status=="1"){echo $str;}?>>Start Consultation</option>
                                        <option value="2" <?php if(isset($status) && $status=="2"){echo $str;}?>>End Consultation</option>
                                        <option value="3" <?php if(isset($status) && $status=="3"){echo $str;}?>>Cancelled</option>
                                        <option value="4" <?php if(isset($status) && $status=="4"){echo $str;}?>>Rejected</option>
                                   <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div><h7><b>From</b></h7></div>
                                <input type="date" name="date_from" class="form-control" id="date_from" value="<?php if(isset($date_from)){echo $date_from; } ?>" max="<?php echo date('Y-m-d'); ?>" style="height: 37px; margin-top: 10px;">
                            </div>
                            <div class="col-md-3">
                                <div><h7><b>To</b></h7></div>
                                <input type="date" name="date_to" class="form-control" id="date_to" value="<?php if(isset($date_to)){echo $date_to; } ?>" max="<?php echo date('Y-m-d'); ?>" style="height: 37px; margin-top: 10px;">
                                <p id="date_error" style="color: red;" class="date_error1"></p>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <input type="submit" name="btn_submit" class="btn btn-success" style="margin-top: 10px;">
                                <button type="button" class="btn btn-success" name="reset" value="reset" id="reset" style="margin-top: 10px;">Reset</button>
                            </div>
                            </div>
                            </form> 
                        
                    
                    
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <table id="example23" class="example table table-striped table-bordered table-data-load table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Partner Name</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Final Receiving Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(count($fetch_data)>0){
                                    $no = 1;
                                    foreach ($fetch_data as $value) {
                                        $patient = unserialize($value['patient_serialize_array']);
                                        /*echo "<pre>";
                                        print_r($value);
                                        print_r($patient);
                                        exit;*/
                                        $currentURL = current_url();
                                        $url = explode('/',$currentURL);
                                        if($url['3']=='report-1')
                                        {
                                        $edit_url = base_url() . 'report-1/view/' . $c_id.'/'.$value['id'];
                                        }else{
                                            $edit_url = base_url() . 'report/view/' . $c_id.'/'.$value['id'];
                                        }

                                        // $date = explode(" ",$value['created_at']);
                                        // $newDate = date("d-m-Y h:i A ", strtotime($date[0]));
                                        $newDate = date("d-m-Y h:i A ", strtotime($value['created_at']));
                                        if($c_id=='2' || $c_id=='3') {
                                                if($value['order_status']=='3'){
                                                    $Status = "Sample Collected / Appointment Completed"; $class="label label-primary";
                                                }if($value['order_status']=='7'){
                                                    $Status = "Pending Sample Collect / Pending Appointment"; $class="label label-warning";
                                                }if($value['order_status']=='8'){
                                                    $Status = "Pending Report"; $class="label label-danger"; }
                                            }
                                        if($c_id=='1' || $c_id=='2' || $c_id=='3'){
                                            if($value['order_status']=='1'){ 
                                                $Status = "Pending"; $class="label label-warning";
                                            }elseif($value['order_status']=='2'){
                                            $Status = "Accepted"; $class="label label-primary"; }
                                            elseif($value['order_status']=='3' && $c_id=='1'){
                                                $Status = "Dispatched"; $class="label label-info";
                                            }elseif ($value['order_status']=='4'){
                                                $Status = "Delivered"; $class="label label-success";
                                            }elseif ($value['order_status']=='5'){
                                                $Status = "Cancelled"; $class="label label-danger";
                                            }elseif ($value['order_status']=='6'){
                                                $Status = "Reject"; $class="label label-danger";
                                            }
                                        }elseif($c_id=='4' || $c_id=='5' || $c_id=='6' || $c_id=='7')
                                        {
                                            if($value['appointment_status']=='0'){
                                                $Status = "Pending"; $class="label label-warning";
                                            }elseif ($value['appointment_status']=='1'){ 
                                                $Status = "Start Consultation"; $class="label label-info";
                                            }elseif($value['appointment_status']=='2'){
                                                $Status = "End Consultation"; $class="label label-success";
                                            }elseif($value['appointment_status']=='3'){
                                                $Status = "Cancelled"; $class="label label-danger";
                                            }elseif($value['appointment_status']=='4'){
                                                $Status = "Rejected"; $class="label label-danger";
                                            }
                                        }
                                ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?= $value['p_name'] ?></td>
                                    <td>
                                        <?php
                                        if($c_id=='5')
                                        {
                                            echo $name = $patient['animal_name'];
                                        }else
                                        {
                                            echo $name = $patient['name'];
                                        }
                                        ?>

                                    </td>
                                    <td><?= $value['mobile_no'] ?></td>
                                    <td><?= number_format((float)$value['main_amount'],2, '.', '') ?></td>
                                    <td><?= number_format((float)$value['final_receiving_amt'], 2, '.', '') ?></td>
                                    
                                    <td><label class="<?php if(isset($class)){ echo $class; }?>" style="font-size:13px;"><?= $Status ?></label></td>
                                    <td><?= $newDate ?></td>
                                    <td><a href="<?php echo $edit_url; ?>" data-toggle="tooltip"  data-placement="left" title="View" class="btn btn-sm-small btn-warning">View</a>
                                    <?php /*  if($c_id=='1' || $c_id=='2' || $c_id=='3') {  ?> 
                                        <?php if($value['order_status'] == 5){ ?> 
                                        <button class="btn btn-sm-small btn-success" type ="button" id ="refund_btn<?= $value['id'] ?>" onclick="Refund(<?= $value['id'] ?>)">Refund</button>
                                        <?php } ?>
                                        <?php if($value['order_status'] == 4){ ?>
                                        <?php if($value['is_refund'] != 1){
                                        if($role == 'admin'){ ?>
                                        <button class="btn btn-sm-small btn-info" type ="button" id ="payment_btn<?= $value['id'] ?>" onclick="Payment(<?= $value['id'] ?>)">Payment</button>
                                        <?php } } }?>
                                    <?php } else{ ?>
                                        <?php if($value['appointment_status'] == 3){ ?>
                                        <?php if($value['is_refund'] != 1){
                                        if($role == 'admin'){ ?> 
                                            <button class="btn btn-sm-small btn-success" type ="button" id ="refund_btn<?= $value['id'] ?>" onclick="Refund(<?= $value['id'] ?>)">Refund</button>
                                        <?php } } ?>
                                        <?php } ?>
                                        <?php if($value['appointment_status'] == 2){ ?>
                                        <?php if($value['is_refund'] != 1){
                                        if($role == 'admin'){ ?> 
                                        <button class="btn btn-sm-small btn-info" type ="button" id ="payment_btn<?= $value['id'] ?>" onclick="Payment(<?= $value['id'] ?>)">Payment</button>
                                        <?php } } ?>
                                        <?php } ?>

                                    <?php } */ ?>
                                    </td>
                                </tr>
                                <?php $no++; }  } ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#example23').DataTable();
    });
    $("#date_to").change(function () {

    var startDate = $("#date_from").val();
    var endDate = $("#date_to").val();
    if ((Date.parse(startDate) > Date.parse(endDate))) {
        $("#date_error").html("End date should be greater than Start date");
        var endDate = $("#date_to").val("");
    }
    else if((Date.parse(startDate) <= Date.parse(endDate)))
    {
        $("#date_error").html("");
        var endDate = $("#date_to").val();
    }
    
});

$('#reset').on("click",function(){
   var id = '<?php echo $c_id; ?>';
   var row = window.location.href;
   var result = row.split('/');
   if(result[3]=='report-1')
   {
    if(id==1){
    window.location.assign("<?= base_url().'report-1/pharmacy-report-1' ?>");
   }else if(id==2){
    window.location.assign("<?= base_url().'report-2/pathologylabs-report-2' ?>");
    }else if(id==3){
    window.location.assign("<?= base_url().'report-3/radiology-report-3' ?>");
   }
   }
   if(result[3]=='report')
   {
   if(id==1){
    window.location.assign("<?= base_url().'report/pharmacy-report' ?>");
   }else if(id==2){
    window.location.assign("<?= base_url().'report/pathologylabs-report' ?>");
    }else if(id==3){
    window.location.assign("<?= base_url().'report/radiology-report' ?>");
   }else if(id==4){
    window.location.assign("<?= base_url().'report/doctors-report' ?>");
   }else if(id==5){
    window.location.assign("<?= base_url().'report/veterinary-doctors-report' ?>");
   }else if(id==6){
    window.location.assign("<?= base_url().'report/nurse-report' ?>");
   }else if(id==7){
    window.location.assign("<?= base_url().'report/physiotherapist-report' ?>");
   }
   }
});
</script>
<script>
    function Refund(id) {
            $.ajax({
            url:"<?= base_url().'admin/refund' ?>",
            method:"POST",
            dataType: "JSON",
            cache: false,
            data:{OrderId:id},
            success:function(data)
            {
                if(data != 'failed')
                {
                    PNOTY('refund payment is processed','success');
                    $('#refund_btn'+id).addClass('d-none');
                }else{
                    PNOTY(data,'error');
                    $('#refund_btn'+id).addClass('d-none');

                }

            }
        });
    }
    function Payment(id) {
            $.ajax({
            url:"<?= base_url().'admin/payment' ?>",
            method:"POST",
            dataType: "JSON",
            cache: false,
            data:{OrderId:id},
            success:function(data)
            {
                if(data != 'failed')
                {
                    PNOTY('refund payment is processed','success');
                    $('#refund_btn'+id).addClass('d-none');
                }else{
                    PNOTY('refund payment is failed','error');
                }

            }
        });
    }
</script>
