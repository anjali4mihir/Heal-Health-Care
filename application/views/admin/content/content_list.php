<style type="text/css">
    .open-popup {padding:20px}
.white-popup {
  position: relative;
  background: #FFF;
  padding: 40px;
  width: auto;
  max-width: 200px;
  margin: 20px auto;
  text-align: center;
}
</style>

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
            
            <div class="tab-content mt-5" id="myTabContent">

               
                     
                    <div class="full_width all_tables table-responsive rating-table load-table"> 
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        echo $this->session->flashdata("message");
                        ?>
                        <table id="example23" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($con_list) > 0) {
                                $rowno = 1 ;     
                                foreach ($con_list as $content) {
                                $edit_url = base_url() . 'content/edit_content/' . $content['id'];
                                ?>
                                <tr>
                                    <td><?php echo $rowno; ?></td>
                                    <td><?php echo $content['main_heading']; ?></td>
                                    <td><?php echo $content['main_image']; ?></td>
                                    <td><?php echo date('d-m-Y h:i A',strtotime($content['created_at'])); ?></td>
                                    
                                    <td>
                                        <a href="<?php echo $edit_url; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
$(document).ready( function () {
    $('#example23').DataTable();
});


</script>
