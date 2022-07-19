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
				<li> <a href="#"> <img src="<?= base_url(); ?>assets/img/facebook.png"> </a></li>
				<li> <a href="#"> <img src="<?= base_url(); ?>assets/img/whatsapp.png"> </a></li>
				<li> <a href="#"> <img src="<?= base_url(); ?>assets/img/instagram.png"> </a></li>
				<li> <a href="#"> <img src="<?= base_url(); ?>assets/img/linkedin.png"> </a></li>
				<li> <a href="#"> <img src="<?= base_url(); ?>assets/img/twitter.png"> </a></li>
				<li> <a href="#"> <img src="<?= base_url(); ?>assets/img/youtube.png"> </a></li>
			</ul>
		</div>
	</div>
</footer>

<a href="javascript:void(0);" id="scroll" style="display: none;"><span></span></a>

<?php $this->load->view('front/common_js'); ?>

<!-- Meta Pixel Code -->
<script>
	! function(f, b, e, v, n, t, s) {
		if (f.fbq) return;
		n = f.fbq = function() {
			n.callMethod ?
				n.callMethod.apply(n, arguments) : n.queue.push(arguments)
		};
		if (!f._fbq) f._fbq = n;
		n.push = n;
		n.loaded = !0;
		n.version = '2.0';
		n.queue = [];
		t = b.createElement(e);
		t.async = !0;
		t.src = v;
		s = b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t, s)
	}(window, document, 'script',
		'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '449985093366925');
	fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=449985093366925&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->
<script>
	var element = "";
	var iframeSrc = "";
	$('.videoLink1, .videoLink2, .videoLink3')
		.magnificPopup({
			type: 'inline',
			midClick: true,
			callbacks: {
				open: function() {
					element = "#" + $(this).attr("id");
					iframeSrc = $(element).find("iframe").eq(0).clone();
					$(element).find("iframe").eq(0).attr('src', $(element).find("iframe").eq(0).attr(
						'local-src'));
					console.log(element);
				},
				close: function() {
					$(element).find("iframe").remove();
					$(element).append(iframeSrc);
				}
			}
		});
</script>
<script>
	$('.app-step').each(function() { // the containers for all your galleries
		$(this).magnificPopup({
			delegate: 'a', // the selector for gallery item
			type: 'image',
			gallery: {
				enabled: true
			}
		});
	});
</script>

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