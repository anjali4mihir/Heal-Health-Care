<?php 
$uri=$this->uri->segment(1);
$uri1=$this->uri->segment(2);
$uri2=$this->uri->segment(3);
//print_r($uri);die;
?>
<div id="boxscroll" class="side_navigation">
	<div class="full_width pro_name_nav">
		<div class="pro_img">
			<?php if(partner_image($_SESSION['userid']) != '' ) { ?> 
				<img src="<?= partner_image($_SESSION['userid']) ?>" alt="John Doe" /> 
			<?php } ?>
				</div>
				<span><strong><?= partner_store_name($_SESSION['userid']) ?></strong>
					<?= partner_mobile($_SESSION['userid']) ?><br>
					<?= partner_category($_SESSION['userid']) ?>
			</span>
	</div>
	<div class="full_width side_nav">
		<ul>
			<li class="<?php if($uri=='my-dashboard'){ echo "active"; } ?>">
				<a href="<?= base_url().'my-dashboard' ?>">
					<i class="fa fa-home"></i>Home <span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php if($_SESSION['usercategory'] == 1){ ?>
			<li class="<?php if($uri=='medicines'){ echo "active"; } ?>">
				<a href="<?= base_url().'medicines' ?>">
					<i class="fas fa-pills"></i> My Inventory<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>

			<li class="<?php if($uri=='report-1'){ echo "active"; } ?>">
				<a href="<?= base_url().'report-1/pharmacy-report-1' ?>">
					<i class="fa fa-file"></i>Report<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php } ?>
			<?php if($_SESSION['usercategory'] == 3){ ?>
			<!-- <li>
				<a href="<?= base_url().'radiologyservices' ?>">
					<i class="fa fa-list-alt"></i> My Services<span class="lnr lnr-chevron-right"></span>
				</a>
			</li> -->
			<li class="<?php if($uri=='radiologyservices'){ echo "active"; } ?>"><a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-list-alt"></i> My Services<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='radiologyservices'){ echo "show"; } ?>" id="submenu1" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<!-- <li class="nav-item <?php if($uri1=='test-modality'){ echo "active"; } ?>"><a href="<?= base_url(); ?>radiologyservices/test-modality"> Add Group/Modality</a></li> -->
						<li class="nav-item <?php if($uri1=='test'){ echo "active"; } ?>"><a href="<?= base_url(); ?>radiologyservices/test">Test List</a></li>
					</ul>
				</div>
			</li>
			<?php } ?> 
			<?php if($_SESSION['usercategory'] == 2){ ?>
			<li class="<?php if($uri=='pathologyservices'){ echo "active"; } ?>">
				<a href="<?= base_url().'pathologyservices' ?>">
					<i class="fa fa-list-alt"></i> My Inventory<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>

			<?php } ?> 
			
			<?php if($_SESSION['usercategory'] == 1 ){ ?>
			<li class="<?php if($uri=='orders'){ echo "active"; } ?>"><a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-list "></i> Orders<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='orders'){ echo 'show';}?>" id="submenu1" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri1=='pending-order'){ echo 'active';}?>"><a href="<?= base_url().'orders/pending-order' ?>">Pending Orders</a></li>
						<li class="nav-item <?php if($uri1=='approved-order'){ echo 'active';}?>"><a href="<?= base_url().'orders/approved-order' ?>">Approved Orders</a></li>
						<li class="nav-item <?php if($uri1=='dispatch-order'){ echo 'active';}?>"><a href="<?= base_url().'orders/dispatch-order' ?>">Dispatch/Pickup Orders</a></li>
						<li class="nav-item <?php if($uri1=='delivered-order'){ echo 'active';}?>"><a href="<?= base_url().'orders/delivered-order' ?>">Delivered/Picked up Orders</a></li>
						<li class="nav-item <?php if($uri1=='cancelled-order'){ echo 'active';}?>"><a href="<?= base_url().'orders/cancelled-order' ?>">Cancelled Orders</a></li>
						<li class="nav-item <?php if($uri1=='rejected-order'){ echo 'active';}?>"><a href="<?= base_url().'orders/rejected-order' ?>">Rejected Orders</a></li>
					</ul>
				</div>
			</li>
			<!-- <li class="<?php if($uri=='notification'){ echo "active"; } ?>">
				<a href="<?= base_url().'notification' ?>">
					<i class="fas fa-bell"></i> Notification<span class="lnr lnr-chevron-right"></span>
				</a>
			</li> -->

			<?php } ?>
			<li class="<?php if($uri=='notification'){ echo "active"; } ?>">
				<a href="<?= base_url().'notification' ?>">
					<i class="fas fa-bell"></i> Notification<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php if($_SESSION['usercategory'] == 2 ){ ?>
			<li class="<?php if($uri=='requests'){ echo "active"; } ?>"><a class="nav-link collapsed text-truncate" href="#submenu2" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-list "></i> Requests<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='requests'){ echo 'show';}?>" id="submenu2" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri1=='pending-request'){ echo 'active';}?>"><a href="<?= base_url().'requests/pending-request' ?>">Pending Requests</a></li>
						<li class="nav-item <?php if($uri1=='accepted-request'){ echo 'active';}?>"><a href="<?= base_url().'requests/accepted-request' ?>">Accepted Requests</a></li>
						<li class="nav-item <?php if($uri1=='pending-sample-collect'){ echo 'active';}?>"><a href="<?= base_url().'requests/pending-sample-collect' ?>">Pending Sample Collect</a></li>

						<li class="nav-item <?php if($uri1=='sample-collected'){ echo 'active';}?>"><a href="<?= base_url().'requests/sample-collected' ?>">Sample Collected</a></li>

						<li class="nav-item <?php if($uri1=='pending-report'){ echo 'active';}?>"><a href="<?= base_url().'requests/pending-report' ?>">Pending Report</a></li>

						<li class="nav-item <?php if($uri1=='deliverd-report'){ echo 'active';}?>"><a href="<?= base_url().'requests/deliverd-report' ?>">Delivered Report</a></li>

						<li class="nav-item <?php if($uri1=='cancelled-request'){ echo 'active';}?>"><a href="<?= base_url().'requests/cancelled-request' ?>">Cancelled Requests</a></li>

						<li class="nav-item <?php if($uri1=='rejected-request'){ echo 'active';}?>"><a href="<?= base_url().'requests/rejected-request' ?>">Rejected Requests</a></li>
					</ul>
				</div>
			</li>
			<li class="<?php if($uri1=='pathologylabs-report-2'){ echo "active"; } ?>">
				<a href="<?= base_url().'report-1/pathologylabs-report-2' ?>">
					<i class="fa fa-file"></i>Report<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php } ?>
			<?php if($_SESSION['usercategory'] == 3 ){ ?>
			<li class="<?php if($uri=='requests'){ echo "active"; } ?>"><a class="nav-link collapsed text-truncate" href="#submenu3" data-toggle="collapse" data-target="#submenu3"><i class="fa fa-list "></i> Appointments<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='requests'){ echo "show"; } ?>" id="submenu3" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri1=='pending-request'){ echo "active"; } ?>"><a href="<?= base_url().'requests/pending-request' ?>">Pending Requests</a></li>

						<li class="nav-item <?php if($uri1=='accepted-request'){ echo "active"; } ?>"><a href="<?= base_url().'requests/accepted-request' ?>">Accepted Appointments</a></li>

						<li class="nav-item <?php if($uri1=='pending-appointment'){ echo "active"; } ?>"><a href="<?= base_url().'requests/pending-appointment' ?>">Pending Appointment</a></li>

						<li class="nav-item <?php if($uri1=='appointment-completed'){ echo "active"; } ?>"><a href="<?= base_url().'requests/appointment-completed' ?>">Appointment Completed</a></li>
						<li class="nav-item <?php if($uri1=='pending-report'){ echo "active"; } ?>"><a href="<?= base_url().'requests/pending-report' ?>">Pending Report</a></li>

						<li class="nav-item <?php if($uri1=='deliverd-report'){ echo "active"; } ?>"><a href="<?= base_url().'requests/deliverd-report' ?>">Delivered Report</a></li>

						<li class="nav-item <?php if($uri1=='cancelled-request'){ echo "active"; } ?>"><a href="<?= base_url().'requests/cancelled-request' ?>">Cancelled Appointments</a></li>
						<li class="nav-item <?php if($uri1=='rejected-request'){ echo "active"; } ?>"><a href="<?= base_url().'requests/rejected-request' ?>">Rejected Requests</a></li>

					</ul>
				</div>
			</li>
			<li>
				<a href="<?= base_url().'report-1/radiology-report-3' ?>">
					<i class="fa fa-file"></i>Report<span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php } ?>

			<li class="<?php if($uri1=='profile'){ echo "active"; } ?>">
				<a href="<?= base_url().'partners/profile' ?>">
					<i class="fa fa-user"></i> Profile Setting <span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php if($_SESSION['usercategory'] == 1 || $_SESSION['usercategory'] == 2){ ?>
			<li class="<?php if($uri1=='app-setting'){ echo "active"; } ?>">
				<a href="<?= base_url().'partners/app-setting' ?>">
					<i class="fa fa-mobile-phone"></i> App Setting <span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
			<?php } ?>
			<li class="<?php if($uri1=='logout'){ echo "active"; } ?>">
				<a href="<?= base_url().'partners/logout' ?>">
					<i class="fa fa-sign-out "></i>Logout <span class="lnr lnr-chevron-right"></span>
				</a>
			</li>
		</ul>	
	</div>
</div>