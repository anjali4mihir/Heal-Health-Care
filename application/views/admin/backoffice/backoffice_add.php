<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="card">
            <div class="card-body">
                <h2 class="full_width job-post-title"><?= $page_title; ?></h2>
                <div class="full_width contact-us">
                    <?php if (validation_errors()) {   
                        echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Warning!</strong> ';
                        echo validation_errors();
                        echo '</div>';
                        } ?>
                    <form class="form" method="post" id="form" name="form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Name<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"placeholder="Enter Name"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Email<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="email" id="email" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Mobile No<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Enter Mobile"></div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">User Name<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="username" id="username"placeholder="Enter User Name"> 
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Password<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="password" id="password" placeholder="Enter Password"></div>
                        </div>
                        <div class="form-group m-t-40 row" id="ModulList">
                            <label class="col-lg-2 col-md-2 col-sm-2 col-form-label">Manage Modules<span class="error">*</span></label>
                            <div class="col-md-10">
                                <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="user" value="1">
                                    <label class="form-check-label" for="inlineCheckbox1">Tools Management</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category" value="2">
                                    <label class="form-check-label" for="inlineCheckbox2">CMS Pages Management</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="music" value="3">
                                    <label class="form-check-label" for="inlineCheckbox3">Register Partner Management</label>
                                </div> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="video" value="4">
                                    <label class="form-check-label" for="inlineCheckbox2">Patients Management</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="banner" value="5">
                                    <label class="form-check-label" for="inlineCheckbox2">Report Management</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ads" value="6">
                                    <label class="form-check-label" for="inlineCheckbox2">Partner's Inventory Management</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="ads" value="7">
                                    <label class="form-check-label" for="inlineCheckbox2">Setting</label>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input"
                                class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image<span class="text-danger">*</span></label>
                            <div class="col-md-5">
                                <input type="file" name="file" id="file" class="dropify"accept="image/*" />
                            </div>
                            <div class="col-md-5" style="display: none;" id="ViewImageDiv">
                                <img src="#" id="image" class="img-thumbnail" height="100" width="100" />
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status<span class="error">*</span></label>
                            <div class="input-field col s12">
                                 <input type="checkbox" id="indeterminate-checkbox" name="status" class="js-switch" autocomplete="off"/>
                            </div>
                        </div> -->
                        <input type="hidden" name="modules_list" id="modules_list">
                        <div class="form-group row">
                            <div class="col-lg-2 col-md-2 col-sm-2">
                            </div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a href="<?= base_url("backoffice"); ?>" class="btn btn-primary">Cancel</a>
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
<script type="text/javascript">
CKEDITOR.replace( 'details');
</script>
<script>
$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});
</script>
<script>
    $(function() {
        $("#form").validate({
        rules: {
            name: {required:true},
            username: {required:true},
            email: {required:true,email:true},
            mobile: {required:true,number:true},
            password: {required:true},
            file: {required:true},
        },
        messages: {
            name: {required:"Please Enter  Name"},
            username: {required:"Please Enter  Username"},
            email: {required:"Please Enter Email"},
            mobile: {required:"Please Enter Mobile Number"},
            password: {required:"Please Enter Password"},
            file: {required:"Please Select Image"},
        },
        // submitHandler: function(form) {
            

        //    form.submit();
        // }
    });
});

$('#form').submit(function() {
    if ($(this).valid()) {
        var selected = [];
        if($('#role :selected').val() != 1){
            $("#ModulList input[type=checkbox]:checked").each(function () {
                selected.push(this.value);
            });
        }
    }
    var jsoncovert = JSON.stringify(selected);
    //alert(jsoncovert)
    $('#modules_list').val(jsoncovert);
});
</script>

