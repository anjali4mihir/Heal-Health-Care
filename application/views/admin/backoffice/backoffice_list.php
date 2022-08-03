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
                        <a href="<?= base_url().'backoffice/add' ?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                    </div>  
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <?php if (isset($error)) { echo $error;}echo $this->session->flashdata("message");?>
                        <div class="alert alert-success alert-dismissible" role="alert" id="myElem" style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Doctor activated successfully.
                        </div>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myElemNo"  style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Doctor deactivated successfully. 
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
                                    <th scope="col">User Name</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <!-- <th scope="col">Manage <br/>Modules</th> -->
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (count($staff) > 0) {
                                    $returnpath = $this->config->item('profile_images_uploaded_path');
                                    //print_r($returnpath);die;
                                    $rowno = 1 ;
                                    foreach ($staff as $category) {
                                        $edit_url = base_url() . 'backoffice/edit/' . $category->admin_id ;
                                        $delete_url = base_url() . 'backoffice/delete/' . $category->admin_id ;?>  
                                        <tr>
                                            <td>
                                                <?php if($category->role != '1'){ ?> 

                                                <input name="chk_id[]" type="checkbox" class="custBox" value="<?php echo $category->admin_id; ?>"/>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $rowno; ?></td>
                                            <td>
                                                <?php if($category->role != '1'){ ?> 
                                                    <img src="<?php echo $returnpath.$category->image; ?>" class="round" alt="image" height="50px" width="50px">
                                                <?php } else{ ?> 
                                                    <img src="<?= user_image($_SESSION['admin_id']) ?>" class="round" alt="image" height="50px" width="50px">
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $category->username; ?></td>
                                            <td><?php echo $category->org_password; ?></td>
                                            <td><?php echo $category->name; ?></td>
                                            <td><?php echo $category->email; ?></td>
                                            <td><?php echo $category->contactno; ?></td>
                                            <!-- <td><?php echo $category->is_manage_modules; ?></td> -->
                                            <!-- <td><input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_doctors" data-status="status" data-idfield="id"  data-id="<?php echo $category->admin_id ; ?>" id='cb_<?php echo $category->admin_id ; ?>'  <?php echo ($category->activestatus == 'Y') ? "checked" : ""; ?> /></td> -->
                                            <?php if($category->role != '1'){ ?> 
                                            <td><a href="<?php echo $edit_url; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a><a href="javascript:void(0);" onclick="confirm_delete('<?php echo $delete_url; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a></td>
                                            <?php } ?>
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
