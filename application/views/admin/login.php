<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= Project_name; ?> | <?= $title; ?></title>
	<link rel="shortcut icon" type="<?= base_url() ?>assets/admin/image/x-icon" href="<?= base_url() ?>assets/admin/images/favicon.ico">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/style.css">
</head>
<body>
<div class="full_width main_screen lg_sp_section">
	<div class="user_select_section login_signup_section">
		<div class="row flex-row-reverse">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 row_eq_height">
				<div class="full_width login_side_one">
                    <img src="<?= base_url() ?>assets/img/logo.png" alt="demo">
                    <p>Please Enter the Username registered on your account</p>
                    <form class="full_width" action="" method="post" id="loginform">
                            <div class="alert alert-danger icons-alert" style="margin-bottom: 0px; display: none;" id="error">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 9px;"><i class="icofont icofont-close-line-circled"></i></button><p style="font-weight: bold; margin: 9px 0;" id="error-message"></p>
                            </div>
                            <div class="alert alert-success icons-alert" style="margin-bottom: 0px; display: none;" id="success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 9px;"><i class="icofont icofont-close-line-circled"></i></button><p style="font-weight: bold; margin: 0px 0;padding-bottom:0;">Login Successfull...</p>
                            </div>
                        <div class="full_width form-group">
                            <label>UserName</label>
                            <input class="form-control" type="text" placeholder="Enter Username" id="username" name="username" autocomplete="off" required />
                        </div>
                        <div class="full_width form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Enter Password" autocomplete="off" required><span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                        </div>
                        <div class="full_width form-group">
                            <button type="submit" class="buttn" id="sign-in-button"><span id="sign-in">Login</span><span id="sign-in-loader" style="display: none;"><i class="fa fa-circle-o-notch fa-spin"></i> Checking...</span>
                            </button>
                            <span class="pull-right"><a href="<?= base_url().'admin/forgot-password' ?>">Forgot password?</a></span>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/main.js"></script>
<script>
	/*$("#password").on('click','.toggle-password', function(){
         alert("jkhjkhk");
		  $(this).toggleClass("fa-eye-slash fa-eye");
		  var input = $("#password");
		  if (input.attr("type") === "password") {
		    input.attr("type", "text");
		  } else {
		    input.attr("type", "password");
		  }
        });*/
        $(".toggle-password").on('click', function() {
              $(this).toggleClass("fa-eye fa-eye-slash");
              var input = $("#password");
              if (input.attr("type") === "password") {
                input.attr("type", "text");
              } else {
                input.attr("type", "password");
            }
        });
        
	$('#loginform').submit(function(event){
		event.preventDefault();
		$.ajax({
        type: "POST",
        url: '<?= base_url('admin/check_login'); ?>',
        data: {username: $("#username").val(),password: $("#password").val()},
        beforeSend: function() {
            $("#sign-in").hide();
            $("#sign-in-loader").show();
            $("#sign-in-button").attr("disabled",true);       
        },      
        success: function(data)
        {
            setTimeout(function(){
                if(data != "Successfully" ){
                    $("#error-message").html(data);
                    $("#error").show();
                    $("#success").hide();
                    $("#sign-in").show();
                    $("#sign-in-loader").hide();
                    $("#sign-in-button").removeAttr("disabled"); 
                }else{
                    $("#error").hide();
                    $("#success").show();
                    setTimeout(function(){
                        window.location = "<?= base_url().'admin/dashboard' ?>";
                    },2000);
                }
            }, 1000);
        }
    });
});
</script>
</body>
</html>