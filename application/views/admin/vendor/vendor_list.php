<div class="full_width main_contentt mc_inner load-job">
    <div class="full_width main_contentt_padd">
        <div class="full_width searchby-truck-main my-ratings my-network">
            <div class="col-sm-12">
                <h2 class="full_width job-post-title"><?= $title ?></h2>
            </div>
            <div class="col-sm-12">
                <nav aria-label="breadcrumb" class="mt-22">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard';?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title?></li>
                    </ol>
                </nav>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="full_width network-btn-main">
                        <button type="button" class="add-post-btn add-company-btn float-left" id="print"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                        
                    </div> 
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <?php if (isset($error)) {echo $error;}echo $this->session->flashdata("message");?>
                        <div class="alert alert-success alert-dismissible" role="alert" id="myElem" style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Vendor activated successfully.
                        </div>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myElemNo"  style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Vendor deactivated successfully. 
                        </div>
                        <form class="deleteForm" method="post" id="deleteForm" name="deleteForm" action="">
                            <input id="delete_btn" name="submit" type="submit" class="btn btn-danger" value="Delete All" /><br>
                        <br/>
                        <table id="example23" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input id="chk_all" name="chk_all" type="checkbox" />
                                    </th>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Category</th>
                                    <?php if($statusId == 0 || $statusId == 1){ if($status == 4 || $statusId == 04){ ?> 
                                    <th scope="col">Speciality</th>
                                    <?php } }?>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Register at</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="printArea">
                            <?php if(count($vendor) > 0) {
                                $rowno = 1;
                                foreach ($vendor as $category) {
                                $edit_url = base_url() . 'vendors/view/' . $category->id;
                                $delete_url = base_url() . 'vendors/delete/' . $category->id;?>  
                                <tr>
                                    <td>
                                        <input name="chk_id[]" type="checkbox" class="custBox" value="<?php echo $category->id; ?>"/>
                                    </td>
                                    <td><?php echo $rowno; ?></td>
                                    
                                    <td><?php echo $category->category_name; ?></td>
                                    
                                    <?php if($statusId == 0 || $statusId == 1){ if($status == 4 || $statusId == 04){?> 
                                    <td><?php echo $category->speciality_name; ?></td>
                                    <?php } }?>
                                    <td><?php echo $category->name; ?></td>
                                    <td><?php echo $category->email; ?></td>
                                    <td><?php echo $category->contact_no; ?></td>
                                    <td><?php echo $category->address; ?></td>
                                    <td><?php echo date('d-m-Y h:i A',strtotime($category->created_at)); ?></td>
                                    <td><input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_partners" data-status="status" data-idfield="id"  data-id="<?php echo $category->id; ?>" id='cb_<?php echo $category->id; ?>'  <?php echo ($category->status == '1') ? "checked" : ""; ?> /></td>
                                    <td>
                                        <a href="<?php echo $edit_url; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-eye btn btn-warning btn-sm"></i></a>
                                        <a href="<?php echo $delete_url; ?>" data-toggle="tooltip"  data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>
                                    </td>
                                </tr>
                                <?php $rowno++; } } 
                                ?>    
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

$(document).ready( function () {
    $('#example23').DataTable();
    $('#error').delay(3000).fadeOut();
      // delete all
    $('#delete_btn').prop('disabled',true);
    var custIds = [];

    $('#chk_all').click(function(){

        if($('#chk_all').is(':checked') == true){
            $('#chk_all').prop('checked',true);
            $(document).find('.custBox').prop('checked',true);
            $(document).find('.custBox:checked').each(function(){
                custIds.push(parseInt($(this).val()));
            })
            custIds = custIds.filter(function(itm, i, a) {
                return i == a.indexOf(itm);
            });

        }else{
            $('#chk_all').prop('checked',false);
            $(document).find('.custBox').prop('checked',false);
            $(document).find('.custBox').each(function(){
                if($(this).is(':checked') != true){
                    remove_Item = $(this).val();
                    custIds = $.grep(custIds, function(value) {
                                    return parseInt(value) != parseInt(remove_Item);
                                });
                }
            })
        }
        if(custIds.length > 0){
            $('#delete_btn').prop('disabled',false);
        }else{
            $('#delete_btn').prop('disabled',true);
        }
    });

    $("body").on("click",".custBox", function(){
        if($(this).is(':checked')){
             $('#delete_btn').prop('disabled',false);
        } else {
            $('#delete_btn').prop('disabled',true);
        }
    });
    // delete all
});
$(function () {
    $("body").on("change", ".tgl_checkbox", function () {
        var table = $(this).data("table");
        var status = $(this).data("status");
        var id = $(this).data("id");
        var id_field = $(this).data("idfield");
        var bin = 0;
        if ($(this).is(':checked')) {
            bin = 1;
        }
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>admin/change_status",
            data: {table: table, status: status, id: id, id_field: id_field, on_off: bin}
        })
        .done(function (msg) {
            if (msg == '1') {
                $("#myElem").show();
                setTimeout(function () {
                    $("#myElem").hide();
                }, 3000);

            } else if (msg == '0') {
                $("#myElemNo").show();
                setTimeout(function () {
                    $("#myElemNo").hide();
                }, 3000);
            }
        });
    });
})
</script>

<script type="text/javascript">
    $('#print').click(function(){
    var divToPrint=document.getElementById('printArea');
    var newWin=window.open('','Print-Window');
    newWin.document.open();
    newWin.document.write('<html>');
    newWin.document.write('<table border="1">');
    newWin.document.write('<thead>');
    newWin.document.write('<tr>'); 
    newWin.document.write('<th>Sr.No</th>');
    newWin.document.write('<th>Category</th>');
    newWin.document.write('<th>Name</th>');
    newWin.document.write('<th>Email</th>');
    newWin.document.write('<th>Contact</th>');
    newWin.document.write('<th>Address</th>');
    newWin.document.write('</tr>');
    newWin.document.write('</thead>');
    newWin.document.write('<body onload="window.print()">'+divToPrint.innerHTML+'</body>');
    newWin.document.write('</table>');
    newWin.document.write('</html>');
    newWin.document.close();
    setTimeout(function(){newWin.close();},10);
});
</script>

