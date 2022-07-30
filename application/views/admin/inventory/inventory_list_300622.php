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
.loading_image{margin-top: 150px}
.wrapper_loader {
    width: 200px;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
    z-index: 11111;
    background: rgba(255,255,255,0.8);
    width: 100%;
}
.hshow{
    display: none;
}
.circle {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            animation: rotate 2.5s linear infinite;
        }
/* ==== Animation 8 ==== */
        
        .circle8 {
            position: absolute;
            border-radius: 50%;
        }
        
        .c81 {
            border: 5px solid #3a86ff;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            animation: 2s ease rotate2 infinite;
        }
        
        .c82 {
            width: 80px;
            height: 80px;
            border: 5px solid #ff006e;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            animation: 2s 200ms ease rotate2 infinite;
        }
        
        .c83 {
            width: 60px;
            height: 60px;
            border: 5px solid #fb5607;
            border-bottom: 5px solid transparent;
            border-top: 5px solid transparent;
            animation: 2s 500ms ease rotate2 infinite;
        }
        
        .c84 {
            width: 40px;
            height: 40px;
            border: 5px solid #80ffdb;
            border-bottom: 5px solid transparent;
            border-top: 5px solid transparent;
            animation: 2s 1s ease rotate2 infinite;
        }
        
        .c85 {
            width: 20px;
            height: 20px;
            border: 5px solid #ffbe0b;
        }
        
        @keyframes rotate2 {
            0%,
            100% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(360deg);
            }
        }
</style>
<div class="wrapper_loader hshow">
            <div class="circle circle8 c81"></div>
            <div class="circle circle8 c82"></div>
            <div class="circle circle8 c83"></div>
            <div class="circle circle8 c84"></div>
            <div class="circle circle8 c85"></div>
            <div class="loading_image">
                <img src="<?= base_url();?>/assets/admin/images/273.gif">
            </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?php if($inventory_type == 'pharmacy'){echo 'active';} ?>" id="medicine-tab" href="<?= base_url().'inventory' ?>" role="tab" aria-controls="medicine" aria-selected="true">MEDICINES (<?= $medicines_list ?>)</a></li>
                <li class="nav-item">
                    <a class="nav-link <?php if($inventory_type == 'pathology'){echo 'active';} ?>" id="pathologytest-tab" href="<?= base_url().'inventory/pathology' ?>" role="tab" aria-controls="pathologytest" aria-selected="false">LABORATORY TEST (<?= $pathology_test_list ?>)</a></li>
                
                <li class="nav-item">
                    <a class="nav-link <?php if($inventory_type == 'radiology'){echo 'active';} ?>" id="radiologytest-tab" href="<?= base_url().'inventory/radiology' ?>" role="tab" aria-controls="radiologytest" aria-selected="false">RADIO DIAGNOSIS TEST (<?= $radiology_test_list ?>)</a></li>

                <li class="nav-item">
                    <a class="nav-link <?php if($inventory_type == 'provisional'){echo 'active';} ?>" id="provisionaltest-tab" href="<?= base_url().'inventory/provisional' ?>" role="tab" aria-controls="provisionaltest" aria-selected="false">PROVISIONAL DIAGNOSIS (<?= $provisional_test_list ?>)</a></li>
            </ul>
            <div class="tab-content mt-5" id="myTabContent">

               <div class="tab-pane fade show <?php if($inventory_type == 'pharmacy'){echo 'active';} ?>" id="medicine" role="tabpanel" aria-labelledby="medicine-tab">
                    <div class="full_width network-btn-main">
                        <a href="<?= base_url().'inventory/add_medicine' ?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                        <a href="<?= base_url() ?>inventory/admin_csv_structure_download1/1" id="open-popup" class="add-post-btn add-company-btn float-left open-popup">CSV file structure</a>
                        <a href="#" class="add-post-btn add-company-btn float-left" onclick="importData()"> Import</a>
                            <?php /* <a href="" class="add-post-btn add-company-btn float-left" onclick="delete_all(1)">Delete All</a> */ ?>

                    </div> 
                    <div class="full_width all_tables table-responsive rating-table load-table"> 
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        echo $this->session->flashdata("message");
                        ?>
                        <form class="deleteForm" method="post" id="deleteForm" name="deleteForm" action="">
                            <input id="delete_btn_medicine" name="submit" type="submit" class="btn btn-danger" value="Delete All" /><br>
                            <input type="hidden" name="inv_type" id="inv_type" value="medicine">
                        <br/>
                        <table id="example23" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input id="chk_all" name="chk_all" type="checkbox" />
                                    </th>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Medicine Name</th>
                                    <th scope="col">Generic Name</th>
                                    <th scope="col">Manufacturer</th>
                                    <th scope="col">QTY(Per pack)</th>
                                    <th scope="col">Form Of Package</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                        </form>
                        
                    </div>                   
                </div>
                <div class="tab-pane fade show <?php if($inventory_type == 'pathology'){echo 'active';} ?>" id="pathologytest" role="tabpanel" aria-labelledby="pathologytest-tab">
                    <div class="full_width network-btn-main">
                        <a href="<?= base_url().'inventory/add_pathologytest' ?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                        <a href="<?= base_url() ?>inventory/admin_csv_structure_download1/2" id="open-popup1" class="add-post-btn add-company-btn float-left open-popup">CSV file structure</a>
                        <a href="#" class="add-post-btn add-company-btn float-left" onclick="importData()"> Import</a>
                        <?php /*  <a href="" class="add-post-btn add-company-btn float-left" onclick="delete_all(2)">Delete All</a> */ ?>
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
                        <form class="deleteForm" method="post" id="deleteForm" name="deleteForm" action="">
                            <input id="delete_btn_patho" name="submit" type="submit" class="btn btn-danger" value="Delete All" /><br>
                            <input type="hidden" name="inv_type" id="inv_type" value="pathology">
                        <br/>
                        <table id="example26" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input id="chk_all" name="chk_all" type="checkbox" />
                                    </th>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Test Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                        </form>
                        
                    </div>                   
                </div>
                <div class="tab-pane fade show <?php if($inventory_type == 'radiology'){echo 'active';} ?>" id="radiologytest" role="tabpanel" aria-labelledby="radiologytest-tab">
                    <div class="full_width network-btn-main">
                        <a href="<?= base_url().'inventory/add_radiology_test' ?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                        <a href="<?= base_url() ?>inventory/admin_csv_structure_download1/3" id="open-popup3" class="add-post-btn add-company-btn float-left open-popup">CSV file structure</a>
                        <a href="#" class="add-post-btn add-company-btn float-left" onclick="importData()"> Import</a>
                         <?php /* <a href="" class="add-post-btn add-company-btn float-left" onclick="delete_all(3)">Delete All</a> */ ?>
                    </div> 
                    <div class="full_width all_tables table-responsive rating-table load-table"> 
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        echo $this->session->flashdata("message");
                        ?>
                           <form class="deleteForm" method="post" id="deleteForm" name="deleteForm" action="">
                            <input id="delete_btn_radio" name="submit" type="submit" class="btn btn-danger" value="Delete All" /><br>
                            <input type="hidden" name="inv_type" id="inv_type" value="radiology">
                        <br/>
                        <table id="example24" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input id="chk_all" name="chk_all" type="checkbox" />
                                    </th>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Test Name</th>
                                    <!-- <th scope="col">Category</th> -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                        </form>
                        
                    </div>                   
                </div>
                <div class="tab-pane fade show <?php if($inventory_type == 'provisional'){echo 'active';} ?>" id="provisionaltest" role="tabpanel" aria-labelledby="provisionaltest-tab">
                    <div class="full_width network-btn-main">
                        <a href="<?= base_url().'inventory/add_provisionaltest' ?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                        <a href="<?= base_url() ?>inventory/admin_csv_structure_download1/4" id="open-popup4" class="add-post-btn add-company-btn float-left open-popup">CSV file structure</a>
                        <a href="#" class="add-post-btn add-company-btn float-left" onclick="importData()"> Import</a>
                         <?php /* <a href="" class="add-post-btn add-company-btn float-left" onclick="delete_all(4)">Delete All</a> */ ?>
                    </div> 
                    <div class="full_width all_tables table-responsive rating-table load-table"> 
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        echo $this->session->flashdata("message");
                        ?>
                           
                       <form class="deleteForm" method="post" id="deleteForm" name="deleteForm" action="">
                            <input id="delete_btn_provisional" name="submit" type="submit" class="btn btn-danger" value="Delete All" /><br>
                            <input type="hidden" name="inv_type" id="inv_type" value="provisional">
                        <br/>
                        <table id="example25" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input id="chk_all" name="chk_all" type="checkbox" />
                                    </th>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Test Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                        </form>
                        
                    </div>                   
                </div>
            </div>
        </div>      
    </div>
</div>
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="import-data" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form enctype="multipart/form-data" id="importdata" method="post" role="form" action="" id="form" target="_blank">
            <div class="modal-content">
                <div class="modal-header"><h4>Import Data</h4></div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Uplod CSV File <span class='text-danger'>Please upload only 1000 Records at a time</span></label>
                                <input class="form-control" type="file" name="file" id="file">
                                <input type="hidden" name="type" id="type" value="<?= $inventory_type?>">
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" value="Import" class="btn btn-success import-btn">
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="<?php echo base_url();?>assets/admin/js/papaparse.min.js"></script> -->

<script>
$(document).ready( function () {
   
    $('#error').delay(3000).fadeOut();
    // delete all
    $('#delete_btn_medicine').prop('disabled',true);
    $('#delete_btn_patho').prop('disabled',true);
    $('#delete_btn_radio').prop('disabled',true);
    $('#delete_btn_provisional').prop('disabled',true);

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

        } else {
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
            $('#delete_btn_medicine').prop('disabled',false);
            $('#delete_btn_patho').prop('disabled',false);
            $('#delete_btn_radio').prop('disabled',false);
            $('#delete_btn_provisional').prop('disabled',false);
        }else{
            $('#delete_btn_medicine').prop('disabled',true);
            $('#delete_btn_patho').prop('disabled',true);
            $('#delete_btn_radio').prop('disabled',true);
            $('#delete_btn_provisional').prop('disabled',true);
        }
    });

    $("body").on("click",".custBox", function(){
        if($(this).is(':checked')){
            $('#delete_btn_medicine').prop('disabled',false);
            $('#delete_btn_patho').prop('disabled',false);
            $('#delete_btn_radio').prop('disabled',false);
            $('#delete_btn_provisional').prop('disabled',false);
        } else {
            $('#delete_btn_medicine').prop('disabled',true);
            $('#delete_btn_patho').prop('disabled',true);
            $('#delete_btn_radio').prop('disabled',true);
            $('#delete_btn_provisional').prop('disabled',true);
        }
    });


    // delete all
});
</script>

<script>
$(document).ready( function () {
    var name="";
    <?php /* if($inventory_type=="pharmacy")
    { ?>
        name="pharmacy";
    <?php } else if($inventory_type=="pharmacy") */ ?>
    //$('#example23').DataTable();
    //$('#example24').DataTable();
    //$('#example25').DataTable();
    //$('#example26').DataTable();
    var token = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var hash = '<?php echo $this->security->get_csrf_hash(); ?>';
    var inventory_type = "<?= $inventory_type; ?>";
    if(inventory_type=="pharmacy" || inventory_type=="pharmacy")
    {
        $('#example23').DataTable({
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "ajax": {
                url: "<?=base_url('inventory/inventory_medicines');?>",
                type: "POST",
                data: {
                    token: hash
                }
            },
            order: [],
            "columnDefs": [{
                "orderable": true,
                "targets": [5]
            }, {
                "targets": 5,
                "className": "text-center",
            }]
        });
    }
    if(inventory_type=="pathology" || inventory_type=="pathology")
    {

        $('#example26').DataTable({
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "ajax": {
                url: "<?=base_url('inventory/inventory_pathology');?>",
                type: "POST",
                data: {
                    token: hash
                }
            },
           
            order: [],
            "columnDefs": [{
                "orderable": false,
                "targets": [2]
            }] 
        });
    }
    if(inventory_type=="radiology" || inventory_type=="radiology")
    {
        $('#example24').DataTable({
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "ajax": {
                url: "<?=base_url('inventory/inventory_radiology');?>",
                type: "POST",
                data: {
                    token: hash
                }
            },
           
            order: [],
            "columnDefs": [{
                "orderable": false,
                "targets": [2]
            }] 
        });
    }
    if(inventory_type=="provisional" || inventory_type=="provisional")
    {
        $('#example25').DataTable({
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "ajax": {
                url: "<?=base_url('inventory/inventory_provisional');?>",
                type: "POST",
                data: {
                    token: hash
                }
            },
           
            order: [],
            "columnDefs": [{
                "orderable": false,
                "targets": [3]
            }] 
        });
    }
});
function importData()
{
    $('#import-data').modal('show');
}
function delete_all(type)
{
    var ajaxurl = "<?= base_url(); ?>";
    $.ajax({
    method: "POST",
    url: ajaxurl + 'admin_delete_all_inventory',
    dataType: "JSON",
    data: {
      type: type,
    },success:function(data)
    {
        alert("Record Deleted successfully");  
    }
  });
}

$(function() {
        $("#form").validate({
        rules: {
            file: {
                required:true,
                extension: "csv,application/vnd.ms-excel/",
            },
        },
        messages: {
            file: {
                required:"Please Select File",
                extension:"Only CSV file is support",
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});



</script>

<script>
    jQuery.noConflict();
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="<?php echo base_url();?>assets/admin/js/papaparse.min.js"></script>
<script>
/* function handleFileSelect(evt) {
    var file = evt.target.files[0];

     Papa.parse(file, {
         header: true,
         dynamicTyping: true,
         complete: function(results) {
             console.log(results);
	 	var countdata= results.data.length;
             if(countdata >= 8500)
             {
                 alert("You can't Upload more than 10000 records");
                 $("#form").trigger("reset");
             }
	     }
     });
}

$(document).ready(function(){
    $("#file").change(handleFileSelect);
});  */

</script>
<script type="text/javascript">
jQuery('#importdata').submit(function (e) {
     e.preventDefault();
    //console.log(e.target.file.files[0]);
   // return false;
    //e.preventDefault();
    //$('.wrapper_loader').removeClass('hshow');
    jQuery(".import-btn").attr('disabled', 'disabled');
    //return false;
        if (jQuery('input[type=file][name=file]')[0].files.length) {
             var file =  e.target.file.files[0];

             // console.log(file);
             // return false;
            Papa.parse(file,{
                //config: {
                    chunkSize: insure_PotentialImport_js.getConfig('chunkSize'),
                    header: insure_PotentialImport_js.getConfig('header'),
                    skipEmptyLines: insure_PotentialImport_js.getConfig('skipEmptyLines'),
                    complete: insure_PotentialImport_js.getConfigComplete,
                    error: insure_PotentialImport_js.getConfigError,
                    chunk: insure_PotentialImport_js.getConfigChunk,
                    beforeFirstChunk: insure_PotentialImport_js.getBeforeFirstChunk,
                //},
                before: function (file, inputElem) {
                    console.log("Parsing file...", file);
                },
                error: function (err, file) {
                    console.log("ERROR:", err, file);
                },
                complete: function (results) {
                    $('.wrapper_loader').hide();
                    window.location.reload();
                }
            });
            
        }
        return false;
});
insure_PotentialImport_js = {
        _default: {
            delimiter: "",  // auto-detect
            newline: "",    // auto-detect
            header: true,
            dynamicTyping: false,
            preview: 0,
            encoding: "",
            worker: false,
            comments: false,
            step: undefined,
            download: false,
            skipEmptyLines: true,
            fastMode: undefined,
            beforeFirstChunk: undefined,
            withCredentials: undefined,
            chunkSize: 15360, //15kb
        },
        getConfig: function (what) {
           return this._default[what];
        },
        getConfigChunk: function (results, parser) {
            var thisInstance = insure_PotentialImport_js;
            thisInstance.postChunkDataImport(results.data,parser);
        }, getConfigError: function (err, file) {
            console.log("Calling : getConfigError");
        }, getConfigComplete: function (results) {
            console.log("Calling : getConfigComplete");
        }, getBeforeFirstChunk: function (chunk) {
            //console.log("getBeforeFirstChunk:"+chunk);
            var index = chunk.match(/\r\n|\r|\n/).index;
            var headings = chunk.substr(0, index).split(',');
            return headings.join() + chunk.substr(index);
        }, postChunkDataImport: function (data,parser) {
            $('.wrapper_loader').removeClass('hshow');
            var type=$("#type").val();

            jQuery.ajax({
                url: '<?= base_url();?>inventory/ImportusingPapaparser?type='+type,
                type: 'post',
                data: {records: data},
                async: false,
                dataType: 'json',
                beforeSend:function(){
                    parser.pause();
                },
                complete:function (data) {
                    parser.resume();
                }
            });
        }
    }

</script>