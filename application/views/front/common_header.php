<?php
$uri = $this->uri->segment(1);
$this->load->view('front/gtagbody');
$returnpath = $this->config->item('site_images_uploaded_path');
?>
<header>
	<div class="container">
		<nav>
			<div id="logo"> <a href="<?= base_url() ?>"> <img src="<?= $returnpath . $site_details->header_logo ?>" alt="Heal Health & Medical"> </a></div>
			<div class="mobile-menu">
				<img src="<?= base_url(); ?>assets/img/menu.png">
			</div>    
			<ul class="menu">
				<li><a href="<?= base_url() . 'services/doctors'?>">Doctors</a></li>
				<li><a href="<?= base_url() . 'services/nurses'?>">Nurse</a></li>
				<li><a href="<?= base_url() . 'services/physiotherapist'?>">Physiotherapist</a></li>
				<li><a href="<?= base_url() . 'services/animal-doctors'?>">Animal Doctors</a></li>
				<li><a href="<?= base_url() . 'services/find-store'?>">Find stores</a></li>
				<li><a href="<?= base_url() . 'services/find-lab'?>">Find Labs</a></li>
				<li><a href="<?= base_url() . 'services/find-diagnostics'?>">Find Radiodiagnostics</a></li>
				<li class="dropdown">
					<a href="javascript:void(0);"> For Professionals <span> <img src="<?= base_url(); ?>assets/img/down-arrow.png"></span> </a>
					<ul class="sub-menu">
						<?php if (isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])) { ?>
						<li><a href="<?= base_url() . 'my-dashboard' ?>">My Dashboard</a></li>
						<li><a href="<?= base_url() . 'partners/logout' ?>">Logout</a></li>
						<?php } else { ?>
						<li><a href="<?= base_url() . 'partners/login' ?>">Login</a></li>
						<li><a href="<?= base_url() . 'register' ?>">Sign Up</a></li>
						<?php } ?>
					</ul> 

				</li>
				<li class="dropdown">
					<a href="javascript:void(0);"> Download App <span> <img src="<?= base_url(); ?>assets/img/down-arrow.png"></span> </a>
					<ul class="sub-menu">
						<li><a href="https://play.google.com/store/apps/details?id=com.atheal">Play Srore</a></li>
						<li><a href="https://apps.apple.com/us/app/heal/id1582761953">Apple Store</a></li>
					</ul> 
				</li>
			</ul>
		</nav>
	</div>
</header>