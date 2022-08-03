<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12">
                    <h2 class="full_width job-post-title"><?= $page_title; ?></h2>
                </div>
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="mt-22">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="<?= base_url().'my-dashboard';?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url().'pathologyservices';?>">Services</a></li>
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
                        echo validation_errors();
                        echo '</div>';} ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Name<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Test Name"> 
                                <input type="hidden" name="TestCode" id="TestCode"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Taxable Amt<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="mrp" id="mrp" placeholder="Enter Test Taxable Amt" onchange="calDiscount();"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">GST(%)<span class="error">*</span><br><span class="error" style="font-size: 12px; font-weight: 800;">Note*: </span><span style="font-size: 12px; font-weight: 800;">CGST & SGST Included</span></label>
                            <div class="col-md-9">
                                <select class="form-control" onchange="calDiscount();" name="gst" id="gst">
                                    <option value="0">0%</option>
                                    <option value="5">5%</option>
                                    <option value="12">12%</option>
                                    <option value="18">18%</option>
                                    <option value="28">28%</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">GST Amount<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="gst_amt" id="gst_amt" placeholder="Enter GST Amount" readonly> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Total Charges<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="sale_price" id="sale_price" placeholder="Enter  Test Sale Price" readonly> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Discount Percentage(%)<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="discount_per" id="discount_per" placeholder="Test Discount(%)" onchange="calDiscount();"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Discount Amt<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="discount" id="discount" placeholder="Test Discount" readonly> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Total Amount<span class="error">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total" id="total" placeholder="Total Amount" readonly> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-3 col-md-3 col-sm-3 col-form-label">Description<span class="error">*</span></label> 
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Status<span class="error">*</span></label>
                            <div class="input-field col s12">
                                 <input type="checkbox" id="indeterminate-checkbox" name="status" class="js-switch" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-3 col-sm-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("pathologyservices"); ?>" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>
<script>
function calDiscount()
{
    var taxable_amt = $('#mrp').val();
    var gst = $('#gst').val();
    $('#gst_amt').val((taxable_amt * gst / 100).toFixed(2));
    $('#sale_price').val((parseFloat(taxable_amt) + parseFloat($('#gst_amt').val())).toFixed(2));
    var discount = $('#discount_per').val();
    var sale_price = $('#sale_price').val();
    $('#discount').val((sale_price * discount / 100).toFixed(2));
    var discount_amt = $('#discount').val();
    var total = parseFloat(sale_price) - parseFloat(discount_amt)
    $('#total').val(total.toFixed(2));
}
</script>
<script type="text/javascript">
    $("#name").autocomplete({ 
        source: function(request, response){
            $.ajax({
                url: "<?= base_url().'pathologyservices/fetch_testList'?>",
                type: 'post',
                dataType: "json",
                data: {search: request.term},
                success: function(data){
                    response(data.TestList);
                }
            });
        },
        minLength: 1,
        select: function( event, ui ){
            var str = ui.item.label;
            var string = str.split(",",2);
            $('#name').val(string[0]); 
            $('#description').val(string[1]); 
            $('#TestCode').val(ui.item.value);
            return false;
        },
    });
</script>
<script>
    $(function() {
        $.validator.addMethod('lessThan', function (value, element, param) {
        return this.optional(element) || parseInt(value) <= parseInt($(param).val());
        }, 'Invalid value');
        $("#form").validate({
        rules: {
            name: {
                required:true,
                remote:{
                    url: "<?php echo site_url("check_test_exist_or_not"); ?>",
                    type: "POST",
                    data: {
                        name: function(){ return $("#name").val(); },
                    }
                }
            },
            description: {
                required:true,
            },
            mrp: {
                required:true,
                 number:true,
            },
            gst: {
                required:true,
                 number:true,
            },
            total: {
                required:true,
                 number:true,
            },
            sale_price: {
                required:true,
                number:true,
            },
        },
        messages: {
            name: {
                required:"Please Enter Name",
                remote:"Service is Already Exists"
            },
            
            description: {
                required:"Please Enter Details",
            },
            mrp: {
                required:"Please Enter MRP",
            },
            gst: {
                required:"Please Enter GST",
            },
            total: {
                required:"Please Enter Total",
            },
            sale_price: {
                required:"Please Enter Sale Price",
                lessThan: 'Enter Must be Less than or Equal to MRP'
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>