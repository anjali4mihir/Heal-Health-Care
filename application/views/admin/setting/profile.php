<style>
th, td {
  padding: 5px;
  text-align: left;    
}
</style>
<div class="full_width main_contentt mc_inner">
	<div class="full_width main_contentt_padd">
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
        <div class="full_width c_info_details">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row_eq_height">
					<div class="d-flex align-items-top w_100">
						<div class="full_width c_infos">
							<div class="full_width loading-box">
								<h4>Profile Information</h4>
								<ul><li><a href="#" onclick="showModal()"><i class="fa fa-pencil"></i>Edit</a></li></ul>
							</div>
							<div class="full_width c_i_details">
                                <table class="table table-hover table-bordered detail-view">
                                    <tbody>
                                        <tr>
                                            <th scope="row" width="25%"><strong>UserName:</strong></th>
                                            <td width="75%"><?= $data['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Password:</strong></th>
                                            <td width="75%"><?= $data['org_password']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Name:</strong></th>
                                            <td width="75%"><?= $data['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Email:</strong></th>
                                            <td width="75%"><?= $data['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Contact no:</strong></th>
                                            <td width="75%"><?= $data['contactno']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" width="25%"><strong>Profile Image:</strong></th>
                                            <td width="75%"><img src="<?= user_image($data['admin_id']) ?>" height="100px" width="100px"/></td>
                                        </tr>
                                    </tbody>
                                </table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close-icon" data-dismiss="modal" aria-label="Close">
					<span class="lnr lnr-cross"></span>
				</button>
				<p class="full_width add-a-card-heading"></p>
			</div>
			<div class="modal-body">
				<div class="full_width contact-us">
                    <form class="form" method="post" id="entry_form" action="" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">User Name<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="username" placeholder="Enter User Name" required> 
                                <p id="username_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Password<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" placeholder="Enter Password" required> 
                                <p id="password_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Name<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name" required> 
                                <p id="name_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Mobile No<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" required> 
                                <p id="mobile_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Email Id<span class="error">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="email" id="email"placeholder="Enter Email Id" required> 
                                <p id="email_error" class="ml-1 mt-1"></p>   
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image<span class="error">*</span></label>
                            <div class="col-md-9">
                                <img src="<?= (set_value('image_base64') == '')?base_url().'uploads/no-image.png':set_value('image_base64') ?>" style="width: 70px;height: 70px; cursor: pointer;" id="image_user">
                                <input type="file" name="my_image" class="upload" id="upload_image" accept="image/*" style="display: none;">
                                <input type="hidden" name="image_base64" id="image_base64" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-10 col-md-10 col-sm-10">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success" onclick="Submit()">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
<div class="modal" id="banner_modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Your Image</h5>
                <button type="button" class="close" onclick="cancel_model();" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="image_demoa"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cancel_model();">Cancel</button>
                <button type="button" class="btn btn-primary" id="upload_banner_button"><span id="upload_banner_text">OK</span></button>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
$('#image_user').click(function() {
    $('#upload_image').trigger('click');
});
function cancel_model()
{
    $('#banner_modal').modal('hide');
}
$(document).ready(function(){
    $image_crop = $('#image_demoa').croppie({
        enableExif: true,
        viewport: {
            width: 175,
            height: 175,
            type: 'squre'
        },
        boundary: {
            width: 200,
            height: 200
        }
    });
var url = "#";
$('#upload_image').on('change', function () { readFile(this);  url = "<?= base_url('user') ?>"; });
$('#upload_banner_button').click(function(event){
        $image_crop.croppie('result', {
            type: 'canvas',
            size: {
                width: 500,
                height: 500
            }
        }).then(function(response){
            $('#image_user').attr('src',response);
            $('#image_base64').val(response);
            $('#banner_modal').modal('hide');
        })
    });
});  
function readFile(input)
{
    if(input.files && input.files[0]) {
        var reader = new FileReader();          
        reader.onload = function (e) {
            result = e.target.result;
            arrTarget = result.split(';');
            tipo = arrTarget[0];
            if (tipo == 'data:image/jpeg' || tipo == 'data:image/png' || tipo == 'data:image/jpg') {
                $image_crop.croppie('bind', {
                    url: e.target.result
                });
                $('#banner_modal').modal('show');
            } else {
                alert('Accept only .jpg o .png image types');
            }
        }           
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script type="text/javascript">
function showModal()
{
	$('#exampleModalCenter').modal('show');
	get_by_id_data();
}
function get_by_id_data()
{
    var bid = "<?= $_SESSION['admin_id']; ?>";
    $.ajax({
        url:"<?= base_url().'admin/editProfile' ?>",
        method:"POST",
        dataType: "JSON",
        cache: false,
        data:{userId:bid},
        success:function(data)
        {
            if(data.Status == 200)
            {
                if(data.fullname != ''){   
                    $('[name="name"]').val(data.fullname);
                }
                if(data.username != ''){   
                    $('[name="username"]').val(data.username);
                }
                if(data.email != ''){   
                    $('[name="email"]').val(data.email);
                }
                if(data.password != ''){   
                    $('[name="password"]').val(data.password);
                }
                if(data.contactno != ''){   
                    $('[name="mobile"]').val(data.contactno);
                }
                if(data.image != ''){   
                    $('#image_user').attr('src',data.image);
                }
                $('[name="role"]').html(data.roleList);
            }
        }
    });
}
function Submit()
{
    $.ajax({
        url:"<?=base_url().'admin/saveProfile'; ?>",
        method:"POST",
        dataType: "JSON",
        data:{userId:"<?= $_SESSION['admin_id']; ?>",name : $('[name="name"]').val(),status:1,username : $('[name="username"]').val(),password : $('[name="password"]').val(),mobile : $('[name="mobile"]').val(),role : $('[name="role"]').val(),email : $('[name="email"]').val(),image_base64:$('#image_base64').val()},
        cache: false,
        success:function(response)
        {
            if(response.success)
            {
                $('#exampleModalCenter').modal('hide');
                PNOTY(response.success,'success');
                window.location.reload();
            }
            else
            {
                if(response.name_error == ''){
                    $('#name_error').html('');
                    $('[name="name"]').removeClass('has-error');
                }else{
                    $('#name_error').html(response.name_error);
                    $('[name="name"]').addClass('has-error');
                }if(response.username_error == ''){
                    $('#username_error').html('');
                    $('[name="username"]').removeClass('has-error');
                }else{
                    $('#username_error').html(response.username_error);
                    $('[name="username"]').addClass('has-error');
                }if(response.password_error == ''){
                    $('#password_error').html('');
                    $('[name="password"]').removeClass('has-error');
                }else{
                    $('#password_error').html(response.password_error);
                    $('[name="password"]').addClass('has-error');
                }if(response.email_error == ''){
                    $('#email_error').html('');
                    $('[name="email"]').removeClass('has-error');
                }else{
                    $('#email_error').html(response.email_error);
                    $('[name="email"]').addClass('has-error');
                }if(response.mobile_error == ''){
                    $('#mobile_error').html('');
                    $('[name="mobile"]').removeClass('has-error');
                }else{
                    $('#mobile_error').html(response.mobile_error);
                    $('[name="mobile"]').addClass('has-error');
                }
            }
        }
    }); 
}
</script>	