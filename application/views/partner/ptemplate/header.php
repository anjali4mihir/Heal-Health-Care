<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= Project_name; ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>assets/admin/images/favicon.ico">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin/css/custom.css">
	<!-- PNotify -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin\pnotify\css\pnotify.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin\pnotify\css\pnotify.brighttheme.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin\pnotify\css\pnotify.buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin\pnotify\css\pnotify.history.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin\pnotify\css\pnotify.mobile.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/all.css">
    <!-- Sweet alert -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin\sweetalert\css\sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin\css\icofont.css">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" integrity="sha512-uyGg6dZr3cE1PxtKOCGqKGTiZybe5iSq3LsqOolABqAWlIRLo/HKyrMMD8drX+gls3twJdpYX0gDKEdtf2dpmw==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin\croppie\croppie.css">
</head>
<body>
	<div class="full_width header_top">
	<div class="row">
		<div class="col-xl-6 col-lg-7 col-md-2 col-sm-3 col-4">
			<div class="full_width left_head">
				<span class="menu_iconn"><img src="<?= base_url() ?>assets/admin/images/menuicn.png" alt="menuicn" /></span>
				<img class="main_logo" src="<?= base_url() ?>assets/admin/images/logo.png" alt="logow" />
				
			</div>
		</div>
		<div class="col-xl-6 col-lg-5 col-md-10 col-sm-9 col-8">
			<div class="full_width right_head">
				<div class="pro_img"><img src="<?= partner_image($_SESSION['userid']) ?>" alt="John Doe" />
					<div class="profile-hover">
						<a href="<?= base_url();?>partners/profile" class="active">My Profile</a>
						<a href="<?= base_url().'partners/logout' ?>">Logout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>