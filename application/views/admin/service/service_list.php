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
                        <a href="<?= base_url().'services/add' ?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                    </div>  
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <?php if (isset($error)) {echo $error;}echo $this->session->flashdata("message");?>
                        <div class="alert alert-success alert-dismissible" role="alert" id="myElem" style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Service activated successfully.
                        </div>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myElemNo"  style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Service deactivated successfully. 
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
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Short Des</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(count($services) > 0) {
                                $returnpath = $this->config->item('service_images_uploaded_path');
                                $rowno = 1;
                                foreach ($services as $category) {
                                $my_url = $category->file;
                                $filelast = substr($my_url, -3);
                                $edit_url = base_url() . 'services/edit/' . $category->id;
                                $delete_url = base_url() . 'services/delete/' . $category->id;?>  
                                <tr>
                                    <td>
                                        <input name="chk_id[]" type="checkbox" class="custBox" value="<?php echo $category->id; ?>"/>
                                    </td>
                                    <td><?php echo $rowno; ?></td>
                                    <td><img src="<?php echo $returnpath.$category->iconimg; ?>" class="round" alt="image" height="125px" width="125px"></td>
                                    <td><?php echo $category->title; ?></td>
                                    <td><?php echo $category->short_desc; ?></td>
                                   <td><input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_services" data-status="status" data-idfield="id"  data-id="<?php echo $category->id; ?>" id='cb_<?php echo $category->id; ?>'  <?php echo ($category->status == '1') ? "checked" : ""; ?> /></td>
                                    <td>
                                        <a href="<?php echo $edit_url; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>
                                        <a href="javascript:void(0);" onclick="confirm_delete('<?php echo $delete_url; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>
                                    </td>
                                </tr>
                                <?php $rowno++; } } ?>    
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
</script>