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
                        <a href="<?= base_url().'lable_languages/add' ?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                    </div>  
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <?php
                        if (isset($error)) {echo $error;}
                        echo $this->session->flashdata("message");?>
                        <table id="example23" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Label IN English</th>
                                    <th scope="col">Label IN Hindi</th>
                                    <th scope="col">Label Key</th>
                                    <th scope="col">Actions On <br/>English Lable</th>
                                     <th scope="col">Actions On <br/> Hindi Lable</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(count($labelList) > 0) {
                                $rowno = 1 ;  
                                $i = 0;   
                                foreach ($labelList as $value) {
                                $edit_url_hindi = base_url() . 'lable_languages/edit/' . $value['hindiid'];
                                $edit_url_english = base_url() . 'lable_languages/edit_english/'.$value['engid'];
                                $delete_url_english = base_url() . 'lable_languages/delete/' .$value['engid'].'?hid='.$value['hindiid'];?>
                                <tr>
                                    <td><?php echo $rowno; ?></td>
                                    <td><?php echo $value['engtitle']; ?></td>
                                    <td><?php echo $value['hindititle']; ?></td>
                                    <td><?php echo $value['label_key']; ?></td>
                                    <td>
                                        <a href="<?php echo $edit_url_english; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>
                                        <a href="javascript:void(0);" data-toggle="tooltip"  onclick="confirm_delete('<?php echo $delete_url_english; ?>')" data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>
                                       
                                    </td>
                                    <td>
                                         <a href="<?php echo $edit_url_hindi; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>
                                        </i></a>
                                    </td>
                                </tr>
                                <?php $rowno++ ; $i++; } } ?>    
                            </tbody>
                        </table>
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
});
</script>
