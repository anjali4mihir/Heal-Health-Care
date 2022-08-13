<div class="full_width main_contentt">
	<div class="full_width main_contentt_padd">
		<div class="full_width four_secs_dash">
			<div class="row">
				<?php if($_SESSION['usercategory'] == 1){ ?> 
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings "><a href="<?= base_url().'medicines' ?>"><h2>My Inventory<span><?= $countMedicines?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url().'orders/pending-order' ?>"><h2>Pending Orders<span><?= $countPending?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings "><a href="<?= base_url().'orders/delivered-order' ?>"><h2>Completed Orders<span><?= $countComplete?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url().'orders/cancelled-order' ?>"><h2>Cancelled Orders<span><?= $countCancel?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url().'orders/rejected-order' ?>"><h2>Rejected Orders<span><?= $countReject?></span></h2></a></div></div>
				<?php } ?>
				<?php if($_SESSION['usercategory'] == 2){ ?> 
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url().'pathologyservices' ?>"><h2>My Inventory<span><?= $countTestpathology?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url().'requests/pending-request' ?>"><h2>Pending Requests<span><?= $countPending?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url().'deliverd-report' ?>"><h2>Completed Appoitments<span><?= $countComplete?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url().'orders/cancelled-request' ?>"><h2>Cancelled Appoitments<span><?= $countCancel?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url().'requests/rejected-request' ?>"><h2>Rejected Appoitments<span><?= $countReject?></span></h2></a></div></div>
				<?php } ?>
				<?php if($_SESSION['usercategory'] == 3){ ?> 
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url().'radiologyservices/test' ?>"><h2>My Inventory<span><?= $countTestradiology?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url().'requests/pending-request' ?>"><h2>Pending Requests<span><?= $countPending?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url().'deliverd-report' ?>"><h2>Completed Appoitments<span><?= $countComplete?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url().'requests/cancelled-request' ?>"><h2>Cancelled Requests<span><?= $countCancel?></span></h2></a></div></div>
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url().'requests/rejected-request' ?>"><h2>Rejected Requests<span><?= $countReject?></span></h2></a></div></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>