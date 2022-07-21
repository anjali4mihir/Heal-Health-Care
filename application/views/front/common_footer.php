<footer>
	<div class="container">
		<div class="footer-logo animation-element fadeUp animation-element-exfast">
			<img src="<?= base_url(); ?>assets/img/footer-logo.png">
		</div>

		<div class="footer-link animation-element fadeUp animation-element-fast">
			<h4> For Patients </h4>

			<ul>
				<li> <a href="<?= base_url() . 'services/doctors'?>"> Find Doctor </a></li>
				<li> <a href="<?= base_url() . 'services/nurses'?>"> Find Nurse </a></li>
				<li> <a href="<?= base_url() . 'services/physiotherapist'?>"> Find Physiotherapist </a></li>
				<li> <a href="<?= base_url() . 'services/animal-doctors'?>"> Find Animal Doctor </a></li>
				<li> <a href="<?= base_url() . 'services/find-store'?>"> Find Stores </a></li>
				<li> <a href="<?= base_url() . 'services/find-lab'?>"> Find Pathology Lab </a></li>
				<li> <a href="<?= base_url() . 'services/find-diagnostics'?>"> Find Radiodiagnostics </a></li>     
			</ul>
		</div>

		<div class="footer-link animation-element fadeUp animation-element-slow">
			<h4> For Providers </h4>

			<ul>
				<li> <a href="<?= base_url() . 'partners/login'; ?>"> Login / Sign In </a></li>
				<li> <a href="<?= base_url() . 'services/doctors'?>"> Doctors </a></li>
				<li> <a href="<?= base_url() . 'services/doctors'?>"> Dentist </a></li>
				<li> <a href="<?= base_url() . 'services/doctors'?>"> Dietician </a></li>
				<li> <a href="<?= base_url() . 'services/nurses'?>"> Nurse </a></li>
				<li> <a href="<?= base_url() . 'services/physiotherapist'?>"> Physiotherapist </a></li>
				<li> <a href="<?= base_url() . 'services/doctors'?>"> veterinarians </a></li>
				<li> <a href="<?= base_url() . 'services/find-store'?>"> Owners of Pharmacy </a></li>
				<li> <a href="<?= base_url() . 'services/find-lab'?>"> Owners of Pathology Lab </a></li>
				<li> <a href="<?= base_url() . 'services/find-diagnostics'?>"> Owners of Radiodiagnostics</a></li>
			</ul>
		</div>

		<div class="footer-link animation-element fadeUp animation-element-exslow">
			<h4> More </h4>

			<ul>
				<li> <a href="<?= base_url() . 'about-us'; ?>"> About Us </a></li>
				<li> <a href="#"> Blogs </a></li>
				<li> <a href="<?= base_url() . 'contact-us'; ?>"> Contact Us </a></li>
				<li> <a href="<?= base_url() . 'privacy-policy'; ?>"> Privacy Policy </a></li>
				<li> <a href="<?= base_url() . 'term-condition'; ?>"> Terms & Condition </a></li>
			</ul>
		</div>

		<div class="social-media animation-element fadeUp animation-element-exslow">
			<ul>
				<?php foreach ($social_media as $key => $value) { ?>
				<li> <a href="<?= $value->link ?>"> <img src="<?= base_url().'assets/img/'.strtolower($value->name).'.png';?>"> </a></li><?php } ?>
			</ul>
		</div>
	</div>
</footer>

<a href="javascript:void(0);" id="scroll" style="display: none;"><span></span></a>

<?php $this->load->view('front/common_js'); ?>

<script>

$(document).ready(function(){ 
	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 100) { 
			$('#scroll').fadeIn(); 
		} else { 
			$('#scroll').fadeOut(); 
		} 
		
		if ($(this).scrollTop() > 120) {
			$('header').addClass('fixed');
		} else {
			$('header').removeClass('fixed');
		}
	}); 
	$('#scroll').click(function(){ 
		$("html, body").animate({ scrollTop: 0 }, 600); 
		return false; 
	}); 
});
</script>