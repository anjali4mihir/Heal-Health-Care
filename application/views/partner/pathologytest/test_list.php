<style type="text/css">
    #open-popup {padding:20px}
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
    background: rgba(0,0,0,0.8);
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
                        <li class="breadcrumb-item"><a href="<?= base_url().'my-dashboard';?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title?></li>
                    </ol>
                </nav>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="full_width network-btn-main">
                        <a href="<?= base_url().'pathologyservices/add'?>" class="add-post-btn add-company-btn float-right"><i class="fa fa-plus"></i>Add</a>
                        <a href="<?= base_url().'pathologyservices/csv_structure_download/2'?>" class="add-post-btn add-company-btn float-left">CSV file structure</a>
                        <a href="#" class="add-post-btn add-company-btn float-left" onclick="importData()"> Import</a>
                        <a href="javascript:void(0);" onclick="confirm_delete('<?= base_url() . 'Pathologyservices/alldelete/2'; ?>')"  title="Delete All" class="add-post-btn add-company-btn float-left">Delete All</a>
                    </div>
                    <div class="full_width all_tables table-responsive rating-table load-table">                
                        <?php if (isset($error)) { echo $error;}
                        echo $this->session->flashdata("message");?>
                        <div class="alert alert-success alert-dismissible" role="alert" id="myElem" style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <strong>Success !</strong> Service activated Successfully.
                        </div>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="myElemNo"  style="display:none">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success !</strong> Service deactivated Successfully. 
                        </div>
                        <form class="deleteForm" method="post" id="deleteForm" name="deleteForm" action="">
                            <input id="delete_btn" name="submit" type="submit" class="btn btn-danger" value="Delete All" /><br>
                        <br/>
                        <table id="test_table" class="example table table-striped table-bordered table-data-load" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input id="chk_all" name="chk_all" type="checkbox" />
                                    </th>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Charges</th>
                                    <th scope="col">GST Amt</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <!--<tbody>
                                <?php if (count($services) > 0) {
                                    $returnpath = $this->config->item('labservice_images_uploaded_path');
                                    $rowno = 1 ;
                                    foreach ($services as $category) {
                                        $edit_url = base_url() . 'pathologyservices/edit/' . $category->id;
                                        $delete_url = base_url() . 'pathologyservices/delete/' . $category->id;
                                        ?>  
                                        <tr>
                                            <td><?php echo $rowno; ?></td>
                                            <td><?php echo ucwords($category->name); ?></td>
                                            <td><?php echo number_format((float)$category->mrp, 2, '.', ''); ?></td>
                                            <td><?php echo number_format((float)$category->sale_price, 2, '.', ''); ?></td>
                                            <td><?php echo number_format((float)$category->discount, 2, '.', ''); ?></td>
                                            <td><?php echo number_format((float)$category->gst, 2, '.', ''); ?></td>
                                            <td><?php echo number_format((float)$category->total, 2, '.', ''); ?></td>
                                            <td><input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_test_pathology_wise" data-status="status" data-idfield="id"  data-id="<?php echo $category->id; ?>" id='cb_<?php echo $category->id; ?>'  <?php echo ($category->status == '1') ? "checked" : ""; ?> /></td>
                                            <td>
                                                <a href="<?php echo $edit_url; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class=""><i class="fa fa-edit btn btn-warning btn-sm"></i></a>
                                                 <a href="javascript:void(0);" onclick="confirm_delete('<?php echo $delete_url; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class=""><i class="fa fa-trash btn btn-danger btn-sm"></i></a>
                                            </td>
                                        </tr>
                                    <?php $rowno++; } } ?>
                            </tbody>-->
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
        <form enctype="multipart/form-data" method="post" role="form"  id="importdata">
            <div class="modal-content">
                <div class="modal-header"><h4>Import Data</h4></div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Uplod CSV File</label>
                                <input class="form-control" type="file" name="file" id="file">
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success import-btn">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="<?php echo base_url();?>assets/admin/js/papaparse.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready( function () {
   
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

<script>
    function importData()
    {
        $('#import-data').modal('show');
    }
</script>
<script>
    $(function() {
        $("#form").validate({
        rules: {
            file: {
                required:true,
                extension: "csv",
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
$('#open-popup').magnificPopup({
    items: [
      {
        src: '<?= base_url().'assets/img/Untitled-4.png' ?>',
        title: 'csv file structure for import test'
      },
    ],
    gallery: {
      enabled: true
    },
    type: 'image'
});
</script>
<script>
    jQuery.noConflict();
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="<?php echo base_url();?>assets/admin/js/papaparse.min.js"></script>
<script type="text/javascript">
jQuery('#importdata').submit(function (e) {
     e.preventDefault();
    //console.log(e.target.file.files[0]);
   // return false;
    //e.preventDefault();
        jQuery(".import-btn").attr('disabled', 'disabled');

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
            chunkSize: 1024, //15kb
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
            jQuery.ajax({
                url: '<?= base_url();?>pathologyservices/importdata',
                type: 'post',
                data: {records: data},
                async: false,
                dataType: 'json',
                beforeSend:function(){
                    parser.pause();
                },
                complete:function (data) {
                    //parser.resume();
                    parser.resume();
                }
            });
        }
    }

    $(document).ready(function(){
    var token = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var hash = '<?php echo $this->security->get_csrf_hash(); ?>';
    $('#test_table').DataTable({
            "processing": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
            },
            "serverSide": true,
            "ajax": {
                url: "<?=base_url('pathologyservices/show_all_test');?>",
                type: "POST",
                data: {
                    token: hash
                }
            },
            "drawCallback": function (settings) { 
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                elems.forEach(function(html) {
                    var switchery = new Switchery(html,{secondaryColor: '#FF5E5E', jackSecondaryColor: '#fff'});
                });
            },
            order: [],
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": [7]
            }, ]
        });
});
function deletedata(id) {
    swal({
            title: "Are you sure want to delete this?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        },
        function(isConfirm) {
            if (isConfirm) {
                $('.preloader').show();
                $('.preloader').css('background-color', 'rgba(255,255,255,0.1)');
                $.ajax({
                    url: '<?= base_url().'pathologyservices/delete'?>',
                    method: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        id: id
                    },
                    beforeSend: function() {
                        $('#delete_button' + id).attr('disabled', true);
                        $('#delete_text' + id).hide();
                        $('#delete_progress' + id).show();
                    },
                    success: function(data) {
                        if (data.Status == 200) {
                            PNOTY(data.message, 'success');
                            window.setTimeout(function(){location.reload()},2000);
                            $('.preloader').hide();
                        } else if (data.Status == 1) {
                            $('.preloader').hide();
                            $('#delete_button' + id).removeAttr('disabled', true);
                            $('#delete_text' + id).show();
                            $('#delete_progress' + id).hide();
                            PNOTY(data.message, 'error');
                        }else if(data.status===100){
                           window.location.href="<?php echo base_url(); ?>partners/login"; 
                        }
                    }
                });
            } else {
                return false;
            }
        }
    );
}
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
                url: "<?php echo base_url("login/change_status1"); ?>",
                data: {table: table, status: status, id: id, id_field: id_field, on_off: bin}
            })
            .done(function (msg) {
                //  alert(msg);
                if (msg == '1') {
                    PNOTY("Test Unblock successfully", 'success');
                    
                } else if (msg == '0') {
                    PNOTY("Test Block successfully", 'danger');
                }
            });
        });
});
</script>