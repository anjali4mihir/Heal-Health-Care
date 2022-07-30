<div class="full_width main_contentt mc_inner load-job">
    <div class="full_width main_contentt_padd">
        <div class="full_width searchby-truck-main my-ratings my-network">
            <h2 class="full_width job-post-title"><?= $title ?></h2>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <div class="alert alert-success alert-dismissible" role="alert" id="myElem" style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Notification activated Successfully.
                        </div>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myElemNo"  style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Notification deactivated Successfully. 
                        </div>
                       
                        <table id="example23" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <?php if($_SESSION['usercategory'] == 1) {  ?>
                                    <th scope="col">Order ID</th>
                                    <?php } else { ?>
                                    <th scope="col">Booking ID</th>
                                    <?php } ?>
                                    <th scope="col">Title</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($notification) > 0) {
                                    $rowno = 1 ;
                                    foreach ($notification as $category) { ?>  
                                        <tr>
                                            <td><?php echo $rowno; ?></td>
                                            <td><a href="<?= base_url().'orders/view/'.  $category['order_no']?>"><?php echo $category['order_id']; ?></a></td>
                                            <td><?php echo $category['title']; ?></td>
                                            <td><?php echo $category['description']; ?></td>
                                            <td><input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_notification" data-status="status" data-idfield="id"  data-id="<?php echo $category['id']; ?>" id='cb_<?php echo$category['id']; ?>'  <?php echo ($category['status'] == '1') ? "checked" : ""; ?> />
                                            </td>
                                            <td><?php echo date('d-m-Y h:i A',strtotime($category['created_at'])); ?></td>
                                            <td>
                                                <a href="<?= base_url().'orders/view/'.  $category['order_no']?>" data-toggle="tooltip"  data-placement="left" title="View" class=""><i class="fa fa-eye btn btn-warning btn-sm"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    $rowno++; } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
