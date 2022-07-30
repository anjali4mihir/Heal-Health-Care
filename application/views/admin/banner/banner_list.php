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
            <div class="tab-content" id="myTabContent" >
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="full_width network-btn-main">
                        <a href="<?= base_url().'banner/add' ?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                    </div>  
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        echo $this->session->flashdata("message");
                        ?>
                        <div class="alert alert-success alert-dismissible" role="alert" id="myElem" style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Banner activated successfully.
                        </div>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myElemNo"  style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Success !</strong> Banner deactivated successfully. 
                        </div>
                        <table id="example23" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Tag</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(count($banner) > 0) {
                                $returnpath = $this->config->item('banner_images_uploaded_path');
                                $rowno = 1 ;     
                                foreach ($banner as $category) {
                                $my_url = $category->file;
                                $filelast = substr($my_url, -3);
                                $edit_url = base_url() . 'banner/edit/' . $category->id;
                                $delete_url = base_url() . 'banner/delete/' . $category->id;?> 
                                <tr>
                                    <td><?php echo $rowno; ?></td>
                                    <td>
                                    <?php 
                                    if($filelast == 'jpg' || $filelast == 'png' || $filelast == 'peg' || $filelast == 'ebp' ) {?>
                                    <img src="<?php echo $returnpath.$category->file; ?>" class="round" alt="image" height="125px" width="125px">
                                    <?php } else if($filelast == 'mp4') {
                                    ?>
                                    <video width="125px" height="75px" controls><source src="<?php echo $returnpath.$category->file; ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                    <?php 
                                    } ?>
                                    </td>
                                    <td><?php echo $category->tag; ?></td>
                                    <td><?php echo $category->title; ?></td>
                                    <td><?php echo $category->url; ?></td>
                                    <td><input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_banner" data-status="status" data-idfield="id"  data-id="<?php echo $category->id; ?>" id='cb_<?php echo $category->id; ?>'  <?php echo ($category->status == '1') ? "checked" : ""; ?> /></td>
                                    <td>
                                        <a href="<?php echo $edit_url; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>
                                        <a href="javascript:void(0);" data-toggle="tooltip"  onclick="confirm_delete('<?php echo $delete_url; ?>')" data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>
                                    </td>
                                </tr>
                                <?php $rowno++ ;} } 
                                ?>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>

