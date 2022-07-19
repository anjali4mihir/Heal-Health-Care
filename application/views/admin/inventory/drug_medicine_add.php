<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12"><h2 class="full_width job-post-title"><?= $page_title; ?></h2></div>
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="mt-22">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?= base_url().'admin/dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url().'inventory/drugmedicine';?>">Drug Medicine</a></li>
                            <li class="breadcrumb-item active"><?= $action?></li>
                        </ol>
                    </nav>
                </div>
                <div class="full_width contact-us">
                    <?php if (validation_errors()) {   
                        echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Warning!</strong> ';
                        echo validation_errors();echo '</div>';}?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Name<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Medicine Name"> 
                                <input type="hidden" name="MedicineCode" id="MedicineCode">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Brand/Generic Name<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="generic_name" id="generic_name" placeholder="Enter Brand/Generic Name"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Manufacture Name<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="company_name" id="company_name" placeholder="Enter Manufacture Name"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">No Of QTY(Per Pack)<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="no_of_tablets" id="no_of_tablets" placeholder="Enter No Of Tablets"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Form of Package<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="form_of_package" id="form_of_package" placeholder="Enter Form of Package"> 
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("inventory/drugmedicine"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>
<script type="text/javascript">
    $("#name").keyup(function(){
        if($('#name').val() == '')
        {
            $("#company_name").removeAttr("readonly"); 
            $("#no_of_tablets").removeAttr("readonly");
            $("#generic_name").removeAttr("readonly");
            $("#form_of_package").removeAttr("readonly");
        }
    });
    $("#name").autocomplete({ 
        source: function(request, response){
            $.ajax({
                url: "<?= base_url().'Inventory/fetch_medicineList'?>",
                type: 'post',
                dataType: "json",
                data: {search: request.term},
                success: function(data){
                    response(data.MedicineList);
                }
            });
        },
        minLength: 3,
        select: function( event, ui ){
            $('#name').val(ui.item.label); 
            $('#MedicineCode').val(ui.item.value);
            $.ajax({
                url: "<?= base_url().'Inventory/fetch_medicinecompany'?>",
                type: 'post',
                dataType: "json",
                data: {medicineId: $('#MedicineCode').val()},
                success: function(data){
                    $("#company_name").attr('readonly', true); 
                    $("#no_of_tablets").attr('readonly', true);
                    $("#generic_name").attr("readonly", true);
                    $("#form_of_package").attr("readonly", true);
                    $('#name').val(data.Name);
                    $('#company_name').val(data.Company);
                    $('#no_of_tablets').val(data.Tablets);
                    $('#generic_name').val(data.GenericName);
                    $('#form_of_package').val(data.Formofpackage);
                }
            });
            return false;
        },
    });
</script>
<script>
    $(function() {
        

        $("#form").validate({
        rules: {
            name:{required:true},
        },
        messages: {
            name: {required:"Please select Medicine Name",min:"Please select Medicine Name"},
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>