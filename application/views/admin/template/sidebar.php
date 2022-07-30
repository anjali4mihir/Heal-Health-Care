<?php 
$uri=$this->uri->segment(1);
$uri1=$this->uri->segment(2);
$uri2=$this->uri->segment(3);
$modules = json_decode($this->session->userdata('is_manage_modules'));
//print_r($modules);die;
?>
<div id="boxscroll" class="side_navigation">
	<div class="full_width pro_name_nav">
		<div class="pro_img"><img src="<?= user_image($_SESSION['admin_id']) ?>" alt="John Doe" /></div>
		<span><strong><?= user_name($_SESSION['admin_id']) ?></strong><?= user_mobile($_SESSION['admin_id']) ?></span>
	</div>
	<div class="full_width side_nav">
		<ul>

			<li class="<?php if($uri1=='dashboard'){echo "active";}?>">
				<a href="<?= base_url().'admin/dashboard' ?>">
					<i class="fa fa-home"></i>Home
				</a>
			</li>
			<?php if(isset($modules) && !empty($modules) && count($modules) > 0 ){ ?> 
			<?php if(in_array('1',$modules) || in_array('0',$modules)){ ?> 
			<li class="<?php if($uri=='doctors'||$uri=='testimonials'||$uri=='social'||$uri=='services_list'||$uri=='speciality'||$uri=='security_features'){ echo 'active';}?>"><a class="nav-link text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-th-large "></i> Tools<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='doctors'||$uri=='testimonials'||$uri=='social'||$uri=='services_list'||$uri=='speciality'||$uri=='security_features'){ echo 'show';}?>" id="submenu1" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri=='doctors'){ echo 'active';}?>"><a href="<?= base_url(); ?>doctors">Doctors List</a></li>
						<li class="nav-item <?php if($uri=='testimonials'){ echo 'active';}?>"><a href="<?= base_url(); ?>testimonials">Testimonials List</a></li>
						<li class="nav-item <?php if($uri=='social'){ echo 'active';}?>"><a href="<?= base_url(); ?>social">Social media</a></li>
						<li class="nav-item <?php if($uri=='services_list'){ echo 'active';}?>"><a href="<?= base_url(); ?>services_list">Services</a></li>
						<li class="nav-item <?php if($uri=='speciality'){ echo 'active';}?>"><a href="<?= base_url(); ?>speciality">Speciality</a></li>
						<li class="nav-item <?php if($uri=='security_features'){ echo 'active';}?>"><a href="<?= base_url(); ?>security_features">Security Features</a></li>
						<li class="nav-item <?php if($uri=='Videos'){ echo 'active';}?>"><a href="<?= base_url(); ?>Videos">Video</a></li>
					</ul>
				</div>
			</li>
			<?php } ?>

			<?php if(in_array('2',$modules) || in_array('0',$modules)){ ?>
			<li class="<?php if($uri=='cmspage'){ echo 'active';}?>"><a class="nav-link collapsed text-truncate" href="#submenu2" data-toggle="collapse" data-target="#submenu2"><i class="fa fa-file"></i> Cms Pages<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='cmspage'){ echo 'show';}?>" id="submenu2" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri1=='pages' && $uri2==1){ echo 'show';}?>"><a href="<?= base_url();?>cmspage/pages/1">About Us</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='pages' && $uri2==2){ echo 'show';}?>"><a href="<?= base_url();?>cmspage/pages/2">Terms And Condition</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='pages' && $uri2==3){ echo 'show';}?>"><a href="<?= base_url();?>cmspage/pages/3">Privacy Policy</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='security'){ echo 'show';}?>"><a href="<?= base_url();?>cmspage/security">Security</a>
                        </li>
                    </ul>
				</div>
			</li>
			<?php } ?>
			<?php if(in_array('3',$modules) || in_array('0',$modules)){ ?>
			<li class="<?php if($uri=='vendors'){ echo 'active';}?>"><a class="nav-link collapsed text-truncate" href="#submenu3" data-toggle="collapse" data-target="#submenu3"><i class="fa fa-users"></i> Register Partners <span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='vendors'){ echo 'show';}?>" id="submenu3" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri1=='pending-approve'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/pending-approve">Pending Approve</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='pharmacy-stores'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/pharmacy-stores">Pharmacy Stores</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='pathology-labs'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/pathology-labs">Pathology Labs</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='radiodiagnostic-centers'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/radiodiagnostic-centers">Radiodiagnostic Centers</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='register-doctors'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/register-doctors">Doctors</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='veterinary-doctors'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/veterinary-doctors">Veterinary Doctors</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='nurse'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/nurse">Nurse</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='physiotherapist'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/physiotherapist">Physiotherapist</a>
                        </li>
                        <li class="nav-item <?php if($uri1=='rejected'){ echo 'active';}?>"><a href="<?= base_url();?>vendors/rejected">Rejected</a>
                        </li>
                    </ul>
				</div>
			</li>
			<?php } ?>
			<?php if(in_array('4',$modules) || in_array('0',$modules)){ ?>
			<li class="<?php if($uri=='patients'){echo 'active';}?>">
				<a href="<?= base_url().'patients' ?>">
					<i class="fa fa-heartbeat"></i>Patients
				</a>
			</li>
			<?php } ?>
			<?php } ?>
			<li class="<?php if($uri=='content'){echo 'active';}?>">
				<a href="<?= base_url().'content' ?>">
					<i class="fa fa-list-alt"></i>Register Page-Content
				</a>
			</li>
			<?php if(in_array('5',$modules) || in_array('0',$modules)){ ?>
			 <li class="<?php if($uri=='report'){ echo 'active';}?>"><a class="nav-link collapsed text-truncate" href="#submenu7" data-toggle="collapse" data-target="#submenu7"><i class="fa fa-file"></i> Reports <span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='report'){ echo 'show';}?>" id="submenu7" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri1=='pharmacy-report'){ echo 'active';}?>"><a href="<?= base_url().'report/pharmacy-report' ?>">Pharmacy Report</a></li>
						<li class="nav-item <?php if($uri1=='pathologylabs-report'){ echo 'active';}?>"><a href="<?= base_url().'report/pathologylabs-report' ?>">Pathology-labs Report</a></li>
						<li class="nav-item <?php if($uri1=='radiology-report'){ echo 'active';}?>"><a href="<?= base_url().'report/radiology-report' ?>">Radiology Report</a></li>
						<li class="nav-item <?php if($uri1=='doctors-report'){ echo 'active';}?>"><a href="<?= base_url().'report/doctors-report' ?>">Doctors Report</a></li>
						<li class="nav-item <?php if($uri1=='veterinary-doctors-report'){ echo 'active';}?>"><a href="<?= base_url().'report/veterinary-doctors-report' ?>">Veterinary-Doctors Report</a></li>
						<li class="nav-item <?php if($uri1=='nurse-report'){ echo 'active';}?>"><a href="<?= base_url().'report/nurse-report' ?>">Nurse Report</a></li>
						<li class="nav-item <?php if($uri1=='physiotherapist-report'){echo 'active';}?>"><a href="<?= base_url().'report/physiotherapist-report' ?>">Physiotherapist Report</a></li>
					</ul>
				</div>
			</li> 
		    <?php } ?>
			<li class="<?php if($uri=='lable_languages' ||$uri=='message_languages'){echo "active";}?>"><a class="nav-link collapsed text-truncate" href="#submenu4" data-toggle="collapse" data-target="#submenu4"><i class="fa fa-language"></i>Languages<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri=='lable_languages' ||$uri=='message_languages'){echo "show";}?>" id="submenu4" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri=='lable_languages'){echo "active";}?>"><a href="<?= base_url();?>lable_languages">Lable</a>
                        </li>
                        <li class="nav-item <?php if($uri=='message_languages'){echo "active";}?>"><a href="<?= base_url();?>message_languages">Messages</a>
                        </li>
                    </ul>
				</div>
			</li>
			<?php if(isset($modules) && !empty($modules) && count($modules) > 0 ){ ?> 
			<?php if(in_array('6',$modules) || in_array('0',$modules)){ ?>
			<li class="<?php if($uri1=='inventory'){echo "active";}?>">
				<a href="<?= base_url().'inventory' ?>">
					<i class="fa fa-list-alt "></i>Partners Inventory
				</a>
			</li>
			<?php } ?>
			<?php if(in_array('7',$modules) || in_array('0',$modules)){ ?>
			<li class="<?php if($uri1=='profile' ||$uri=='site-setting'||$uri=='app-setting'){echo "active";}?>"><a class="nav-link collapsed text-truncate" href="#submenu5" data-toggle="collapse" data-target="#submenu5"><i class="fa fa-cog"></i> Setting<span class="lnr lnr-chevron-right"></span></a>
				<div class="collapse <?php if($uri1=='profile' ||$uri=='site-setting'||$uri=='app-setting'){echo "show";}?>" id="submenu5" aria-expanded="false">
					<ul class="flex-column nav submenu">
						<li class="nav-item <?php if($uri1=='profile' && $uri=='admin'){echo "active";}?>"><a href="<?= base_url();?>admin/profile">Admin Setting</a>
                        </li>
                        <li class="nav-item <?php if($uri=='site-setting'){echo "active";}?>"><a href="<?= base_url();?>site-setting">Site Setting</a>
                        </li>
                        <li class="nav-item <?php if($uri=='app-setting'){echo "active";}?>"><a href="<?= base_url();?>app-setting">App Setting</a>
                        </li>
                    </ul>
				</div>
			</li>
			<?php } ?>
			<?php if(in_array('0',$modules)){ ?>
			<li class="<?php if($uri1=='backoffice'){echo "active";}?>">
				<a href="<?= base_url().'backoffice' ?>">
					<i class="fa fa-users "></i>Back Office
				</a>
			</li>
			<?php } ?>
			<?php } ?>
			<li class="<?php if($uri1=='logout'){echo "active";}?>">
				<a href="<?= base_url().'admin/logout' ?>">
					<i class="fa fa-sign-out "></i>Logout
				</a>
			</li>
		</ul>	
	</div>
</div>