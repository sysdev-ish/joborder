<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Joborder</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="icon" href="<?php echo base_url(); ?>public/dist/img/favicon.ico" type="image/x-icon">
	<!-- Bootstrap 3.3.4 -->
	<link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="<?php echo base_url(); ?>public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
	<link href="<?php echo base_url(); ?>public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url(); ?>public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Date Picker -->
	<link href="<?php echo base_url(); ?>public/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
	<!-- Daterange picker -->
	<link href="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url(); ?>public/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<!-- FastClick -->
	<script src='<?php echo base_url(); ?>public/plugins/fastclick/fastclick.min.js'></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>public/dist/js/app.min.js" type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url(); ?>public/dist/js/demo.js" type="text/javascript"></script>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="skin-red layout-top-nav">
	<div class="wrapper">
		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a href="" class="navbar-brand"><b>Joborder</b>ISH</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<?php if ($level != "5") { ?>
								<li class="active"><a href="<?php echo base_url(); ?>index.php/home/">Dashboard <span class="sr-only">(current)</span></a></li>
								<?php if ($level == '15' || $level == '18') { ?>
									<li><a href="<?php echo base_url(); ?>index.php/home/listorderx/">List Project</a></li>
								<?php echo '
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Job Order <span class="caret"></span></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="' . base_url() . 'index.php/event/formadd">Event</a></li>
												</ul>
											</li>
											';
								} else if ($level == '13') { ?>
									<li><a href="<?php echo base_url(); ?>index.php/finance/listorder_fin/">List Project</a></li>
								<?php } else if ($level == '17') { ?>
									<li><a href="<?php echo base_url(); ?>index.php/tax/listorder_tax/">List Project</a></li>
								<?php } else if ($level == '12') { ?>
									<li><a href="<?php echo base_url(); ?>index.php/legal/listorder_leg/">List Project</a></li>
								<?php } else if (($level == '10') || ($level == '11')) { ?>
									<li><a href="<?php echo base_url(); ?>index.php/pro/listorder_pro/">List Project</a></li>
								<?php } else if (($level == '8') || ($level == '9')) { ?>
									<li><a href="<?php echo base_url(); ?>index.php/ops/listorder_ops/">List Project</a></li>
									<?php } else if ($level != '7') {
									//if ( ($level != "3") && ($level != "5") && ($level != "4") ){ 
									if (($level != "3") && ($level != "5")) {
										// <li><a href="' . base_url() . 'index.php/login/joborder_eo/">Event Organizer</a></li>
										// <li><a href="' . base_url() . 'index.php/login/joborder_event/">Event</a></li>
										/*echo '
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Job Order <span class="caret"></span></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="' . base_url() . 'index.php/home/joborder/">HR Solutions</a></li>
													<li><a href="#">Event Organizer</a></li>
													<li><a href="' . base_url() . 'index.php/JobOrderEvent">Event</a></li>
													<li><a href="' . base_url() . 'index.php/jobOrder/jobtraining">Training</a></li>
												</ul>
											</li>
											';*/

										echo '
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Job Order <span class="caret"></span></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="' . base_url() . 'index.php/rotasi/joborderx/">HR Solutions</a></li>
													<li><a href="' . base_url() . 'index.php/event/formadd">Event</a></li>
													
												</ul>
											</li>
											';
										/*<li><a href="' . base_url() . 'index.php/rotasi/formadd">Rotasi/Mutasi</a></li>*/
										/*<li><a href="' . base_url() . 'index.php/home/joborder/">HR Solutions</a></li>*/

										if (($level == "1") || ($level == "14")) { ?>
											<!--<li><a href="<?php echo base_url(); ?>index.php/home/appjo/">Status JO</a></li>-->
											<li><a href="<?php echo base_url(); ?>index.php/home/appjox/">Status JO</a></li>
											<?php } else if ($level == '2') {
											if ($regional == "1") { ?>
												<!--<li><a href="<?php echo base_url(); ?>index.php/home/appjo/">Status JO</a></li>-->
												<li><a href="<?php echo base_url(); ?>index.php/home/appjox/">Status JO</a></li>
											<?php } else { ?>
												<li>
													<!--a href="<?php //echo base_url();
																			?>index.php/home/appjo/">Approval Job Order</a-->
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">Approval <span class="caret"></span></a>
													<ul class="dropdown-menu" role="menu">
														<!--<li><a href="<?php echo base_url(); ?>index.php/home/appjo/">Job Order</a></li>-->
														<li><a href="<?php echo base_url(); ?>index.php/home/appjox/">Job Order</a></li>
														<li><a href="<?php echo base_url(); ?>index.php/jobOrder/jobtrainingApproveList">Training</a></li>
													</ul>
												</li>
											<?php } ?>
										<?php } else { ?>
											<li>
												<!--a href="<?php //echo base_url();
																		?>index.php/home/appjo/">Approval Job Order</a-->
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">Approval <span class="caret"></span></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="<?php echo base_url(); ?>index.php/home/listorderx/">Job Order</a></li>
													<li><a href="<?php echo base_url(); ?>index.php/jobOrder/jobtraining/">Training</a></li>
												</ul>
											</li>
										<?php } ?>
									<?php } ?>

									<?php if ($level == "4") { ?>
										<li><a href="<?php echo base_url(); ?>index.php/home/listorderx/">Approval JO</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/mapping/v_mapping/">Mapping PIC</a></li>
									<?php } else { ?>
										<!--li><a href="<?php echo base_url(); ?>index.php/home/listorder/">List Job Order</a></li-->


										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">List Job Order <span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="<?php echo base_url(); ?>index.php/home/listorderx/">Recruitment</a></li>
												<!--<li><a href="<?php //echo base_url();
																					?>index.php/jobOrder/jobTrainingRecruitmentList/">Training</a></li>-->
											</ul>
										</li>

										<!--<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">Approval <span class="caret"></span></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="<?php //echo base_url();
																				?>index.php/jobOrder/jobTrainingRecruitmentApprovalList/">Training</a></li>
												</ul>
											</li>-->

										<?php if (($level == "1") && ($type == "OPS")) { ?>
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">List Invoice <span class="caret"></span></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="<?php echo base_url(); ?>index.php/ops/listorder_ops/">List Preparation</a></li>
													<li><a href="<?php echo base_url(); ?>index.php/ops/view_listorder_ops/">View Preparation</a></li>
												</ul>
											</li>

										<?php } ?>

									<?php } ?>

									<?php
									if ($level == "6") {
										echo '
											<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <span class="caret"></span></a>
												<ul class="dropdown-menu" role="menu">
													<li><a href="' . base_url() . 'index.php/login/create_login/">Create Login</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_kontrak/">Create Kontrak</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_jabatan_login/">Create Jabatan</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_lokasi/">Create Lokasi</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_layanan/">Create Layanan</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_provinsi/">Create Provinsi</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_jobcategory/">Create Job Category</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_jabatan/">Create Job Function</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_mapping_city_manar/">Create Mapping City Manar</a></li>
													<li><a href="' . base_url() . 'index.php/login/create_mapping_manar/">Create Mapping Manar</a></li>
													<li><a href="' . base_url() . 'index.php/login/take_bak/">Take File BAK NEW</a></li>
													<li><a href="' . base_url() . 'index.php/setting/approvalManagement">Approval</a></li>
												</ul>
											</li>
											';
									}
								} else { ?>
									<li><a href="<?php echo base_url(); ?>index.php/mapping/v_mapping/">Mapping PIC</a></li>
								<?php }
							} else { ?>
								<li class="active"><a href="<?php echo base_url(); ?>index.php/home/">Dashboard <span class="sr-only">(current)</span></a></li>
								<!--<li><a href="<?php //echo base_url();
																	?>index.php/home/listorder/">List Job Order</a></li>-->

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">List Job Order <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="<?php echo base_url(); ?>index.php/home/listorderx/">Approval List JO</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/bast/listpm/">BAST List JO</a></li>
										<!-- <li><a href="<?php echo base_url(); ?>index.php/pks/listpm/">PKS List JO</a></li> -->
									</ul>
								</li>

								<?php if ($type == 'PM') { ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="<?php echo base_url(); ?>index.php/login/create_login/">Create Login</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_kontrak/">Create Kontrak</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_jabatan_login/">Create Jabatan</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_lokasi/">Create Lokasi</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_layanan/">Create Layanan</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_provinsi/">Create Provinsi</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_jobcategory/">Create Job Category</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_jabatan/">Create Job Function</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_mapping_city_manar/">Create Mapping City Manar</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/create_mapping_manar/">Create Mapping Manar</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/login/take_bak/">Take File BAK NEW</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/setting/approvalManagement">Approval</a></li>
										</ul>
									</li>
								<?php } ?>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Skema <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="<?php echo base_url(); ?>index.php/master/bpjs/">Master BPJS</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/master/komponen/">Master Komponen</a></li>

										<?php if ($type == 'PPC') { ?>
											<li><a href="<?php echo base_url(); ?>index.php/skema/form_skema/">Skema Contract</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/skema/form_skema_inf/">Skema Contract INF</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/skema/skema_pb/">Skema PB</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/skema/ket_skema_sap/">Ket Skema SAP</a></li>
											<li><a href="<?php echo base_url(); ?>index.php/skema/fix_var/">Fixed Variable</a></li>
										<?php } ?>

										<li><a href="<?php echo base_url(); ?>index.php/skema/n_client/">Nama Client Kontrak</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/skema/mpb/">Master Peralihan</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/login/create_jobcategory/">Create Job Category</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/login/create_jabatan/">Create Job Function</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/login/create_provinsi/">Create Provinsi</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/login/create_mapping_city_manar/">Create Lokasi & Manar</a></li>
										<li><a href="<?php echo base_url(); ?>index.php/login/donlot_dok/">Download Dokumen</a></li>
									</ul>
								</li>
							<?php
								/*	
								echo '
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Job Order <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="' . base_url() . 'index.php/home/joborder/">HR Solutions</a></li>
										<li><a href="#">Event Organizer</a></li>
										<li><a href="' . base_url() . 'index.php/JobOrderEvent">Event</a></li>
										<li><a href="' . base_url() . 'index.php/jobOrder/jobtraining">Training</a></li>
									</ul> 
								</li>
								';*/

								echo '
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Job Order <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="' . base_url() . 'index.php/rotasi/joborderx/">HR Solutions</a></li>
										<li><a href="' . base_url() . 'index.php/event/formadd">Event</a></li>
									</ul>
								</li>
								';
								/*<li><a href="' . base_url() . 'index.php/rotasi/formadd">Rotasi/Mutasi</a></li>*/
							} ?>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">PKS List <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo base_url(); ?>index.php/pks/verifikasi">Verifikasi</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/pks/draft">Draft</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/pks/sirkuler">Sirkuler</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/pks/selesai">Selesai</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/pks/stop">Stop</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/pks/project_non_pks">Project Non PKS</a></li>
								</ul>
							</li>
						</ul>

						<!--
							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
								</div>
							</form>   
							-->
					</div><!-- /.navbar-collapse -->


					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">

							<!-- Tasks Menu -->
							<li class="dropdown tasks-menu">
								<!-- Menu Toggle Button -->


							</li>
							<!-- User Account Menu -->
							<li class="dropdown user user-menu">
								<!-- Menu Toggle Button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- The user image in the navbar-->
									<img src="<?php echo base_url(); ?>public/dist/img/person-icon.png" class="user-image" alt="User Image" />
									<!-- hidden-xs hides the username on small devices so only the image appears. -->
									<span class="hidden-xs"><?php echo $nama; ?></span>
								</a>
								<ul class="dropdown-menu">
									<!-- The user image in the menu -->
									<li class="user-header">
										<img src="<?php echo base_url(); ?>public/dist/img/person-icon.png" class="img-circle" alt="User Image" />
										<p>
											<?php echo $nama; ?>
											<small><?php if ($level == 1) {
																echo 'Creater';
															} elseif ($level == 2) {
																echo 'Approval';
															} elseif ($level == 3) {
																echo 'Recrutment';
															} elseif ($level == 4) {
																echo 'Admin Rekrut';
															} elseif ($level == 5) {
																echo 'Admin SAP';
															} elseif ($level == 6) {
																echo 'Superadmin';
															} ?></small>
										</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="<?php echo base_url(); ?>index.php/home/change_password" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											<a href="<?php echo base_url(); ?>index.php/home/logout" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-custom-menu -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>