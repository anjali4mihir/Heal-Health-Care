<div id="boxscroll" class="side_navigation">
	<div class="full_width pro_name_nav">
		<div class="pro_img">
			<?php if(partner_image($_SESSION['userid']) != '' ) { ?> 
				<img src="<?= partner_image($_SESSION['userid']) ?>" alt="John Doe" /> 
			<?php } ?>
				</div>
		<span><strong><?= partner_name($_SESSION['userid']) ?></strong><?= partner_mobile($_SESSION['userid']) ?></span>
	</div>
	<div class="full_width side_nav">
		<ul>
			<li class="active">
				<a href="<?= base_url().'my-dashboard' ?>">
					<i class="fa fa-home"></i>Home <span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php if($_SESSION['usercategory'] == 1){ ?>
			<li>
				<a href="<?= base_url().'medicines' ?>">
					<i class="fas fa-pills"></i> My Inventory<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php } ?>
			<?php if($_SESSION['usercategory'] == 3){ ?>
			<li>
				<a href="<?= base_url().'radiologyservices/test' ?>">
					<i class="fa fa-list-alt"></i> My Services<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<!-- <li><a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-list-alt"></i> My Services<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse" id="submenu1" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item"><a href="<?= base_url(); ?>test-modality"> Add Group/Modality</a></li>
						<li class="nav-item"><a href="<?= base_url(); ?>radiologyservices/test">Test List</a></li>
					</ul>
				</div>
			</li> -->
			<?php } ?> 
			<?php if($_SESSION['usercategory'] == 2){ ?>
			<li>
				<a href="<?= base_url().'pathologyservices' ?>">
					<i class="fa fa-list-alt"></i> My Inventory<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>

			<?php } ?> 
			
			
			<?php if($_SESSION['usercategory'] == 1 ){ ?>
			<li><a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-list "></i> Orders<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse" id="submenu1" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item"><a href="<?= base_url().'orders/pending-order' ?>">Pending Orders</a></li>
						<li class="nav-item"><a href="<?= base_url().'orders/approved-order' ?>">Approved Orders</a></li>
						<li class="nav-item"><a href="<?= base_url().'orders/dispatch-order' ?>">Dispatch/Pickup Orders</a></li>
						<li class="nav-item"><a href="<?= base_url().'orders/delivered-order' ?>">Delivered/Picked up Orders</a></li>
						<li class="nav-item"><a href="<?= base_url().'orders/cancelled-order' ?>">Cancelled Orders</a></li>
						<li class="nav-item"><a href="<?= base_url().'orders/rejected-order' ?>">Rejected Orders</a></li>
					</ul>
				</div>
			</li>
			<li>
				<a href="<?= base_url().'notification' ?>">
					<i class="fas fa-bell"></i> Notification<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			
			<?php } ?>
			<?php if($_SESSION['usercategory'] == 2 ){ ?>
			<li><a class="nav-link collapsed text-truncate" href="#submenu2" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-list "></i> Requests<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse" id="submenu2" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item"><a href="<?= base_url().'requests/pending-request' ?>">Pending Requests</a></li>
						<li class="nav-item"><a href="<?= base_url().'requests/accepted-request' ?>">Accepted Requests</a></li>
						<li class="nav-item"><a href="<?= base_url().'pending-sample-collect' ?>">Pending Sample Collect</a></li>
						<li class="nav-item"><a href="<?= base_url().'sample-collected' ?>">Sample Collected</a></li>
						<li class="nav-item"><a href="<?= base_url().'pending-report' ?>">Pending Report</a></li>
						<li class="nav-item"><a href="<?= base_url().'deliverd-report' ?>">Delivered Report</a></li>
						<li class="nav-item"><a href="<?= base_url().'requests/cancelled-request' ?>">Cancelled Requests</a></li>
						<li class="nav-item"><a href="<?= base_url().'requests/rejected-request' ?>">Rejected Requests</a></li>
					</ul>
				</div>
			</li>
			
			<?php } ?>
			<?php if($_SESSION['usercategory'] == 3 ){ ?>
			<li><a class="nav-link collapsed text-truncate" href="#submenu3" data-toggle="collapse" data-target="#submenu3"><i class="fa fa-list "></i> Appointments<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse" id="submenu3" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item"><a href="<?= base_url().'requests/pending-request' ?>">Pending Requests</a></li>
						<li class="nav-item"><a href="<?= base_url().'requests/accepted-request' ?>">Accepted Appointments</a></li>
						<li class="nav-item"><a href="<?= base_url().'pending-appointment' ?>">Pending Appointment</a></li>
						<li class="nav-item"><a href="<?= base_url().'appointment-completed' ?>">Appointment Completed</a></li>
						<li class="nav-item"><a href="<?= base_url().'pending-report' ?>">Pending Report</a></li>
						<li class="nav-item"><a href="<?= base_url().'deliverd-report' ?>">Delivered Report</a></li>
						<li class="nav-item"><a href="<?= base_url().'requests/cancelled-request' ?>">Cancelled Appointments</a></li>
						<li class="nav-item"><a href="<?= base_url().'requests/rejected-request' ?>">Rejected Requests</a></li>

					</ul>
				</div>
			</li>
			<?php } ?>

			<li>
				<a href="<?= base_url().'partners/profile' ?>">
					<i class="fa fa-user"></i> Profile Setting <span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php if($_SESSION['usercategory'] == 1 || $_SESSION['usercategory'] == 2){ ?>
			<li>
				<a href="<?= base_url().'partners/app-setting' ?>">
					<i class="fa fa-mobile-phone"></i> App Setting <span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php } ?>
			<li>
				<a href="<?= base_url().'partners/logout' ?>">
					<i class="fa fa-sign-out "></i>Logout <span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
		</ul>	
	</div>
</div>