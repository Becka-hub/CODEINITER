<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dasboardClinique.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">

</head>

<body>
	<input type="hidden" value="<?php echo $_SESSION['IDCLINIQUE']; ?>" id="IDCLINIQUE">
	<!-- WRAPPER -->
	<div class="WRAPPER">

		<!-- SIDEBAR -->
		<div class="SIDEBAR">

			<div class="bg_shadow"></div>

			<div class="sidebar_inner">
				<div class="sidebar_close d-flex justify-content-end">
					<div class="closse">
						<i class="fa fa-times"></i>
					</div>
				</div>
				<div class="sidebar_logo">
					<img src="<?php echo base_url('assets/image/logo.png') ?>" alt="">
				</div>
				<ul class="sidebar_menu">
					<li class="active">
						<a href="#" id="open_profile">
							<div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
							<div class="title">Profile</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_planing">
							<div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
							<div class="title">Gerer les planings</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_rendezVous">
							<div class="icon"><i class="fa fa-list-alt" aria-hidden="true"></i></div>
							<div class="title">Rendez-vous</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_patients">
							<div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
							<div class="title">Listes Patients</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_reservations">
							<div class="icon"><i class="fa fa-fax" aria-hidden="true"></i></div>
							<div class="title">Réservations <span class="badge badge-danger badge_Reservation ml-1"></span></div>
						</a>
					</li>
					<li>
						<a href="#" id="open_loyer">
							<div class="icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="title">Loyers</div>
						</a>
					</li>

				</ul>
			</div>


		</div>
		<!-- FIN SIDEBAR -->




		<!-- CONTENT -->
		<div class="CONTENT">

			<!-- Navbar -->
			<div class="navbar_content">
				<div class="bloc_left">
					<div class="hamburger">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</div>
					<div class="image_clinique">
						<img src="<?php echo base_url() . 'upload/clinique/' . $_SESSION['LOGOCLINIQUE']; ?>" alt="" width="40px" />
						<a href="#"><?php echo $_SESSION['NOMCLINIQUE']; ?></a>
					</div>
				</div>
				<div class="bloc_right">
					<div class="btn-group btn_deconnection mr-1">
						<a href="<?php echo base_url() . 'admin/clinique/Clinique_controlleur/logout' ?>"><i class="fa fa-power-off"></i></a>
					</div>

				</div>
			</div>
			<!--Fin Navbar-->

			<!-- Profile -->
			<section class="profile-blocs" id="profile-blocs">
				<div class="profile">
					<div class="row">
						<div class="col-12 col-sm-8 col-md-8 col-lg-8 bloc1">
							<div class="col d-flex justify-content-center">
								<div class="logo_clinique">
									<img src="<?php echo base_url() . 'upload/clinique/' . $_SESSION['LOGOCLINIQUE']; ?>" alt="">
								</div>
							</div>
							<div class="description_clinique">
								<h6><span>Nom:</span> <?php echo $_SESSION['NOMCLINIQUE']; ?></h6>
								<h6><span>Adresse:</span> <?php echo $_SESSION['ADRESSECLINIQUE']; ?></h6>
								<h6><span>Téléphone:</span> <?php echo $_SESSION['TELEPHONECLINIQUE']; ?></h6>
								<h6><span>Adresse Mail:</span> <?php echo $_SESSION['MAILCLINIQUE']; ?></h6>
								<h6><span>A propos:</span> <?php echo $_SESSION['SPECIALISECLINIQUE']; ?></h6>
								<h6><span>Jour ouverture:</span> <?php echo $_SESSION['JOUROUVERTURECLINIQUE']; ?></h6>
								<h6><span>Heure ouverture:</span> <?php echo $_SESSION['HEUREOUVERTURECLINIQUE']; ?></h6>
								<h6><span>Propriétaire:</span> <?php echo $_SESSION['NOMPROPRIETAIRECLINIQUE'] . " " . $_SESSION['PRENOMPROPRIETAIRECLINIQUE']; ?></h6>
								<h6><span>Province:</span> <?php echo $_SESSION['PROVINCECLINIQUE']; ?> - <span>Région:</span> <?php echo $_SESSION['REGIONCLINIQUE']; ?> -
									<span>District:</span> <?php echo $_SESSION['DISTRICTCLINIQUE']; ?> - <span>Communes:</span>
									<?php echo $_SESSION['COMMUNECLINIQUE']; ?>
								</h6>
							</div>
						</div>
						<div class="col-12 col-sm-4 col-md-4 col-lg-4 bloc2">
							<div class="astuces_profile">
								<h6 class="text-center"> <i class="fa fa-tint"></i> Astuces</h6>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
									Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel
									necessitatibus optio ad corporis,necessitatibus optio ad corporis.. Duis aute irure
									dolor in reprehenderit Asperiores dolores sed et. Tenetur quia eos. </p>
								<div class="d-flex justify-content-center">
									<div class="image_astuce">
										<img src="<?php echo base_url('assets/image/login-clinique.png') ?>" alt="">
									</div>
								</div>
							</div>
							<div class="button_modification col d-flex justify-content-center">
								<button class="btn btn-success btn-sm">Modifications des informations</button>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Fin Profile -->




			<!-- Planing -->
			<section class="planing-blocs" id="planing-blocs">
				<div class="planing">
					<div class="ajoute_agenda d-flex justify-content-end">
						<button class="btn btn-sm  btn_ajouteAgenda" data-toggle="modal" data-target="#modalAgenda">Ajouter planings</button>
					</div>
					<div class="content_planing mt-1 overflow-auto">

					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">AJOUTES PLANINGS</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" id="ajoutePlaning">
								<div class="modal-body">
									<div class="form-group">
										<label for="data">Date :</label>
										<input type="date" class="form-control form-control-sm" name="date" id="date" required>
									</div>
									<input type="hidden" name="IDCLINIQUE" value=" <?php echo $_SESSION['IDCLINIQUE']; ?>">
									<div class="form-group">
										<label for="delais">Délais d'un rendez-vous :</label>
										<select class="custom-select custom-select-sm mb-3" id="selectDelais" required>
											<option value="">Sélectioner...</option>
											<option value="30">30 minutes</option>
											<option value="1">1 heures</option>
											<option value="2">2 heures</option>
											<option value="3">3 heures</option>
											<option value="4">4 heures</option>
											<option value="5">5 heures</option>
										</select>
									</div>
									<div class="demi" id="demi">
										<div class="row">
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="6h à 6h 30min" id="demi1">
													<label class="form-check-label" for="exampleCheck1">6h à 6h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="6h 30min à 7h" id="demi2">
													<label class="form-check-label" for="exampleCheck1">6h 30min à
														7h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="7h à 7h 30min" id="demi3">
													<label class="form-check-label" for="exampleCheck1">7h à 7h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="7h 30min à 8h" id="demi4">
													<label class="form-check-label" for="exampleCheck1">7h 30min à
														8h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="8h à 8h 30min" id="demi5">
													<label class="form-check-label" for="exampleCheck1">8h à 8h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="8h 30min à 9h" id="demi6">
													<label class="form-check-label" for="exampleCheck1">8h 30min à
														9h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="9h à 9h 30min" id="demi7">
													<label class="form-check-label" for="exampleCheck1">9h à 9h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="9h 30min à 10h" id="demi8">
													<label class="form-check-label" for="exampleCheck1">9h 30min à
														10h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="10h à 10h 30min" id="demi9">
													<label class="form-check-label" for="exampleCheck1">10h à 10h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="10h 30min à 11h" id="demi10">
													<label class="form-check-label" for="exampleCheck1">10h 30min à
														11h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="11h à 11h 30min" id="demi11">
													<label class="form-check-label" for="exampleCheck1">11h à 11h 30
														min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="11h 30min à 12h" id="demi12">
													<label class="form-check-label" for="exampleCheck1">11h 30min à
														12h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="12h à 12h 30min" id="demi13">
													<label class="form-check-label" for="exampleCheck1">12h à 12h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="12h 30min à 13h" id="demi14">
													<label class="form-check-label" for="exampleCheck1">12h 30min à
														13h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="13h à 13h 30min" id="demi15">
													<label class="form-check-label" for="exampleCheck1">13h à 13h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="13h 30min à 14h" id="demi16">
													<label class="form-check-label" for="exampleCheck1">13h 30min à
														14h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="14h à 14h 30min" id="demi17">
													<label class="form-check-label" for="exampleCheck1">14h à 14h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="14h 30min à 15h" id="demi18">
													<label class="form-check-label" for="exampleCheck1">14h 30min à
														15h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="15h à 15h 30min" id="demi19">
													<label class="form-check-label" for="exampleCheck1">15h à 15h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="15h 30min à 16h" id="demi20">
													<label class="form-check-label" for="exampleCheck1">15h 30min à
														16h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="16h à 16h 30min" id="demi21">
													<label class="form-check-label" for="exampleCheck1">16h à 16h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="16h 30min à 17h" id="demi22">
													<label class="form-check-label" for="exampleCheck1">16h 30min à
														17h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="17h à 17h 30min" id="demi23">
													<label class="form-check-label" for="exampleCheck1">17h à 17h
														30min</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="17h 30min à 18h" id="demi24">
													<label class="form-check-label" for="exampleCheck1">17h 30min à
														18h</label>
												</div>
											</div>
										</div>
									</div>
									<div class="une" id="une">
										<div class="row">
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="6h à 7h" id="une1">
													<label class="form-check-label" for="exampleCheck1">6h à 7h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="7h à 8h" id="une2">
													<label class="form-check-label" for="exampleCheck1">7h à 8h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="8h à 9h" id="une3">
													<label class="form-check-label" for="exampleCheck1">8h à 9h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="9h à 10h" id="une4">
													<label class="form-check-label" for="exampleCheck1">9h à 10h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="10h à 11h" id="une5">
													<label class="form-check-label" for="exampleCheck1">10h à 11h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="11h à 12h" id="une6">
													<label class="form-check-label" for="exampleCheck1">11h à 12h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="12h à 13h" id="une7">
													<label class="form-check-label" for="exampleCheck1">12h à 13h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="13h à 14h" id="une8">
													<label class="form-check-label" for="exampleCheck1">13h à 14h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="14h à 15h" id="une9">
													<label class="form-check-label" for="exampleCheck1">14h à 15h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="15h à 16h" id="une10">
													<label class="form-check-label" for="exampleCheck1">15h à 16h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="16h à 17h" id="une11">
													<label class="form-check-label" for="exampleCheck1">16h à 17h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="17h à 18h" id="une12">
													<label class="form-check-label" for="exampleCheck1">17h à 18h</label>
												</div>
											</div>
										</div>
									</div>
									<div class="deux" id="deux">
										<div class="row">
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="6h à 8h" id="deux1">
													<label class="form-check-label" for="exampleCheck1">6h à 8h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="8h à 10h" id="deux2">
													<label class="form-check-label" for="exampleCheck1">8h à 10h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="10h à 12h" id="deux3">
													<label class="form-check-label" for="exampleCheck1">10h à 12h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="12h à 14h" id="deux4">
													<label class="form-check-label" for="exampleCheck1">12h à 14h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="14h à 16h" id="deux5">
													<label class="form-check-label" for="exampleCheck1">14h à 16h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="16h à 18h" id="deux6">
													<label class="form-check-label" for="exampleCheck1">16h à 18h</label>
												</div>
											</div>

										</div>
									</div>
									<div class="trois" id="trois">
										<div class="row">
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="6h à 9h" id="trois1">
													<label class="form-check-label" for="exampleCheck1">6h à 9h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="9h à 12h" id="trois2">
													<label class="form-check-label" for="exampleCheck1">9h à 12h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="12h à 15h" id="trois3">
													<label class="form-check-label" for="exampleCheck1">12h à 15h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="15h à 18h" id="trois4">
													<label class="form-check-label" for="exampleCheck1">15h à 18h</label>
												</div>
											</div>
										</div>
									</div>
									<div class="quatre" id="quatre">
										<div class="row">
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="6h à 10h" id="quatre1">
													<label class="form-check-label" for="exampleCheck1">6h à 10h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="10h à 14h" id="quatre2">
													<label class="form-check-label" for="exampleCheck1">10h à 14h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="14h à 18h" id="quatre3">
													<label class="form-check-label" for="exampleCheck1">14h à 18h</label>
												</div>
											</div>
										</div>
									</div>
									<div class="cinq" id="cinq">
										<div class="row">
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="6h à 11h" id="cinq1">
													<label class="form-check-label" for="exampleCheck1">6h à 11h</label>
												</div>
											</div>
											<div class="col-6 col-sm-4 col-md-3 col-lg-3">
												<div class="form-group form-check">
													<input type="checkbox" name="heure[]" class="form-check-input" value="13h à 16h" id="cinq2">
													<label class="form-check-label" for="exampleCheck1">13h à 16h</label>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm btn-primary" name="ajoute_agenda">Ajouter</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="modal fade" id="modal_modifierAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Modifier date</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" id="form_modifier_date">
								<div class="modal-body">
									<div class="form-groupe">
										<input type="date" class="form-control form-control-sm" name="modifier_date" id="modifier_date" required>
									</div>
									<input type="hidden" name="idAgenda" id="idAgenda">
									<input type="hidden" name="IDCLINIQUE" value=" <?php echo $_SESSION['IDCLINIQUE']; ?>">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-primary btn-sm">Modifier</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<!-- Fin Planing -->



			<!-- Rendez vous -->
			<section class="rendezVous-blocs" id="rendezVous-blocs">
				<div class="rendezVous">
					<div class="select_status">
						<div class="jour ml-3">
							<select class="custom-select custom-select-sm mb-3" id="selectJour">
								<option value="" selected>Selects jours</option>
							</select>
						</div>
					</div>
					<div class="content_status overflow-auto">

					</div>
			</section>
			<!-- Fin Rendez vous -->

			<!-- Listes Patients -->
			<section class="patients-blocs" id="patients-blocs">
				<div class="listesPatients overflow-auto">
					<div class="recherche_patients">
						<input type="text" id="recherche_patients" class="form-control" placeholder="Recherche ...">
					</div>
					<div class="content_listesPatients">

					</div>
				</div>




				<!--Modal Details Patients -->
				<div class="modal fade modal-detailsPatients" id="detailsPatients" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Details Patients</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body details_patients">

							</div>
						</div>
					</div>
				</div>
				<!--Fin Modal Details Patients -->


				<!--Modal Notifier Patients -->
				<div class="modal fade modal-notifierPatients" id="notifierPatients" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Notifications</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="notification" method="post">
								<div class="modal-body">
									<div class="form-group">
										<select class="custom-select custom-select-sm mb-3" id="typeNotification" required>
											<option selected value="">Select types notifications</option>
											<option value="message">Message</option>
											<option value="averstissement">Avertissement</option>
										</select>
									</div>
									<div class="form-group">
										<textarea class="form-control" id="messageNotification" placeholder="Notications ..." required></textarea>
									</div>
									<input type="hidden" id="idPatientNotif">
									<input type="hidden" value="<?php echo $_SESSION['NOMCLINIQUE'];; ?>" id="nomCliniqueNotif">
									<input type="hidden" value="<?php echo $_SESSION['LOGOCLINIQUE']; ?>" id="photoCliniqueNotif">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm">Envoyer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--Fin Modal Notifier Patients -->

			</section>
			<!-- Fin Listes Patients -->


			<!-- Reservations -->
			<section class="reservations-blocs" id="reservations-blocs">
				<div class="reservations">
					<div class="content_reservations overflow-auto">

					</div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="modal_validation" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Validations</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="post" id="validationForm" enctype="multipart/form-data">
								<div class="modal-body">
									<select class="custom-select custom-select-sm mb-3" name="validation_select" id="validation_select">
										<option selected value="">Selects validations</option>
										<option value="accepter">Accepter</option>
										<option value="refuser">Réfuser</option>
									</select>
									<div id="valider">

										<div class="form-group">
											<label>Réponse valider :</label>
											<textarea class="form-control" placeholder="Entrer réponse valider ..." name="reponseValider" id="reponseValider"></textarea>
										</div>
										<div class="form-group">
											<label>Ticket :</label>
											<input type="file" class="form-control" name="ticket" id="ticket">
										</div>
									</div>
									<div id="nom_valider">
										<label>Réponse non valider :</label>
										<textarea class="form-control" placeholder="Entrer réponse non valider ..." name="reponseNonValider" id="reponseNonValider"></textarea>
									</div>
									<input type="hidden" value="<?php echo $_SESSION['IDCLINIQUE']; ?>" id="IDCLINIQUE" name="IDCLINIQUE">
									<input type="hidden" id="idReservation" name="idReservation">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm">Valider</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</section>
			<!-- Fin Reservations -->


			<!-- Loyers -->
			<section class="loyers-blocs" id="loyers-blocs">
				<div class="payements">
					<div class="button_loyer d-flex justify-content-between">
						<div class="select_annee">
							<select class="custom-select custom-select-sm mb-3">
								<option value="">Select année</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
								<option value="2026">2026</option>
								<option value="2027">2027</option>
								<option value="2028">2028</option>
								<option value="2029">2029</option>
								<option value="2030">2030</option>
							</select>
						</div>
						<div class="button_ajoute_loyer">
							<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ajouter_loyer">Ajouter</button>
						</div>

					</div>
					<div class="content_loyer">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead class="bg-thead">
									<tr>
										<th>Mois</th>
										<th>Opérateur</th>
										<th>Réference</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td align="center">Janvier</td>
										<td align="center">Orange Money</td>
										<td align="center">0326587985456121321254</td>
										<td align="center"><button class="btn btn-success btn-sm">Valider</button></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>



					<div class="modal fade" id="ajouter_loyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalScrollableTitle">Ajoute Loyer
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<select class="custom-select custom-select-sm mb-3">
										<option value="">Select année</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										<option value="2028">2028</option>
										<option value="2029">2029</option>
										<option value="2030">2030</option>
									</select>
									<select class="custom-select custom-select-sm mb-3">
										<option value="">Select mois</option>
										<option value="Janvier">Janvier</option>
										<option value="Fevrier">Fevrier</option>
										<option value="Mars">Mars</option>
										<option value="Avril">Avril</option>
										<option value="Mais">Mais</option>
										<option value="Juin">Juin</option>
										<option value="Juillet">Juillet</option>
										<option value="Août">Août</option>
										<option value="Septembre">Septembre</option>
										<option value="Octobre">Octobre</option>
										<option value="Novembre">Novembre</option>
										<option value="Décembre">Décembre</option>
									</select>
									<select class="custom-select custom-select-sm mb-3">
										<option selected>Selects opérateur</option>
										<option value="Orange Money">Orange Money</option>
										<option value="Mvola">Mvola</option>
										<option value="Airtel Money">Airtel Money</option>
									</select>

									<div class="form-group">
										<label>Numéro :</label>
										<input type="text" class="form-control form-control-sm" id="numero" placeholder="Entrer numéro envoi payement ...">
									</div>

									<div class="form-group">
										<label>Réference :</label>
										<input type="text" class="form-control form-control-sm" id="reference" placeholder="Entrer réference ...">
									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- Fin Loyers -->



		</div>
		<!-- FIN CONTENT -->


	</div>
	<!--FIN WRAPPER-->


	<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.slim.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.2.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/sweetalert2.all.min.js'); ?>"></script>
	<script>
		$(document).ready(function() {

			$(".sidebar_menu li ").click(function() {
				$(".sidebar_menu li ").removeClass("active ");
				$(this).addClass("active ");
			});
			$(".hamburger ").click(function() {
				$(".WRAPPER ").addClass("active ");
			});
			$(".closse, .bg_shadow ").click(function() {
				$(".WRAPPER ").removeClass("active ");
			});


		});


		$(document).ready(function() {
			let demi = document.getElementById('demi'),
				une = document.getElementById('une'),
				deux = document.getElementById('deux'),
				trois = document.getElementById('trois'),
				quatre = document.getElementById('quatre'),
				cinq = document.getElementById('cinq');

			$('#selectDelais').on('change', function() {
				var delais = $('#selectDelais').val();
				if (delais == "30") {
					demi.style.display = "block";
					une.style.display = "none";
					deux.style.display = "none";
					trois.style.display = "none";
					quatre.style.display = "none";
					cinq.style.display = "none";
					$('#une1').val('');
					$('#une2').val('');
					$('#une3').val('');
					$('#une4').val('');
					$('#une5').val('');
					$('#une6').val('');
					$('#une7').val('');
					$('#une8').val('');
					$('#une9').val('');
					$('#une10').val('');
					$('#une11').val('');
					$('#une12').val('');

					$('#deux1').val('');
					$('#deux2').val('');
					$('#deux3').val('');
					$('#deux4').val('');
					$('#deux5').val('');
					$('#deux6').val('');

					$('#trois1').val('');
					$('#trois2').val('');
					$('#trois3').val('');
					$('#trois4').val('');

					$('#quatre1').val('');
					$('#quatre2').val('');
					$('#quatre3').val('');

					$('#cinq1').val('');
					$('#cinq2').val('');


				} else if (delais == "1") {
					demi.style.display = "none";
					une.style.display = "block";
					deux.style.display = "none";
					trois.style.display = "none";
					quatre.style.display = "none";
					cinq.style.display = "none";
					$('#demi1').val('');
					$('#demi2').val('');
					$('#demi3').val('');
					$('#demi4').val('');
					$('#demi5').val('');
					$('#demi6').val('');
					$('#demi7').val('');
					$('#demi8').val('');
					$('#demi9').val('');
					$('#demi10').val('');
					$('#demi11').val('');
					$('#demi12').val('');
					$('#demi13').val('');
					$('#demi14').val('');
					$('#demi15').val('');
					$('#demi16').val('');
					$('#demi17').val('');
					$('#demi18').val('');
					$('#demi19').val('');
					$('#demi20').val('');
					$('#demi21').val('');
					$('#demi22').val('');
					$('#demi23').val('');
					$('#demi24').val('');

					$('#deux1').val('');
					$('#deux2').val('');
					$('#deux3').val('');
					$('#deux4').val('');
					$('#deux5').val('');
					$('#deux6').val('');

					$('#trois1').val('');
					$('#trois2').val('');
					$('#trois3').val('');
					$('#trois4').val('');

					$('#quatre1').val('');
					$('#quatre2').val('');
					$('#quatre3').val('');

					$('#cinq1').val('');
					$('#cinq2').val('');
				} else if (delais == "2") {
					demi.style.display = "none";
					une.style.display = "none";
					deux.style.display = "block";
					trois.style.display = "none";
					quatre.style.display = "none";
					cinq.style.display = "none";
					$('#demi1').val('');
					$('#demi2').val('');
					$('#demi3').val('');
					$('#demi4').val('');
					$('#demi5').val('');
					$('#demi6').val('');
					$('#demi7').val('');
					$('#demi8').val('');
					$('#demi9').val('');
					$('#demi10').val('');
					$('#demi11').val('');
					$('#demi12').val('');
					$('#demi13').val('');
					$('#demi14').val('');
					$('#demi15').val('');
					$('#demi16').val('');
					$('#demi17').val('');
					$('#demi18').val('');
					$('#demi19').val('');
					$('#demi20').val('');
					$('#demi21').val('');
					$('#demi22').val('');
					$('#demi23').val('');
					$('#demi24').val('');

					$('#une1').val('');
					$('#une2').val('');
					$('#une3').val('');
					$('#une4').val('');
					$('#une5').val('');
					$('#une6').val('');
					$('#une7').val('');
					$('#une8').val('');
					$('#une9').val('');
					$('#une10').val('');
					$('#une11').val('');
					$('#une12').val('');

					$('#trois1').val('');
					$('#trois2').val('');
					$('#trois3').val('');
					$('#trois4').val('');

					$('#quatre1').val('');
					$('#quatre2').val('');
					$('#quatre3').val('');

					$('#cinq1').val('');
					$('#cinq2').val('');
				} else if (delais == "3") {
					demi.style.display = "none";
					une.style.display = "none";
					deux.style.display = "none";
					trois.style.display = "block";
					quatre.style.display = "none";
					cinq.style.display = "none";
					$('#demi1').val('');
					$('#demi2').val('');
					$('#demi3').val('');
					$('#demi4').val('');
					$('#demi5').val('');
					$('#demi6').val('');
					$('#demi7').val('');
					$('#demi8').val('');
					$('#demi9').val('');
					$('#demi10').val('');
					$('#demi11').val('');
					$('#demi12').val('');
					$('#demi13').val('');
					$('#demi14').val('');
					$('#demi15').val('');
					$('#demi16').val('');
					$('#demi17').val('');
					$('#demi18').val('');
					$('#demi19').val('');
					$('#demi20').val('');
					$('#demi21').val('');
					$('#demi22').val('');
					$('#demi23').val('');
					$('#demi24').val('');

					$('#une1').val('');
					$('#une2').val('');
					$('#une3').val('');
					$('#une4').val('');
					$('#une5').val('');
					$('#une6').val('');
					$('#une7').val('');
					$('#une8').val('');
					$('#une9').val('');
					$('#une10').val('');
					$('#une11').val('');
					$('#une12').val('');

					$('#deux1').val('');
					$('#deux2').val('');
					$('#deux3').val('');
					$('#deux4').val('');
					$('#deux5').val('');
					$('#deux6').val('');

					$('#quatre1').val('');
					$('#quatre2').val('');
					$('#quatre3').val('');

					$('#cinq1').val('');
					$('#cinq2').val('');
				} else if (delais == "4") {
					demi.style.display = "none";
					une.style.display = "none";
					deux.style.display = "none";
					trois.style.display = "none";
					quatre.style.display = "block";
					cinq.style.display = "none";
					$('#demi1').val('');
					$('#demi2').val('');
					$('#demi3').val('');
					$('#demi4').val('');
					$('#demi5').val('');
					$('#demi6').val('');
					$('#demi7').val('');
					$('#demi8').val('');
					$('#demi9').val('');
					$('#demi10').val('');
					$('#demi11').val('');
					$('#demi12').val('');
					$('#demi13').val('');
					$('#demi14').val('');
					$('#demi15').val('');
					$('#demi16').val('');
					$('#demi17').val('');
					$('#demi18').val('');
					$('#demi19').val('');
					$('#demi20').val('');
					$('#demi21').val('');
					$('#demi22').val('');
					$('#demi23').val('');
					$('#demi24').val('');

					$('#une1').val('');
					$('#une2').val('');
					$('#une3').val('');
					$('#une4').val('');
					$('#une5').val('');
					$('#une6').val('');
					$('#une7').val('');
					$('#une8').val('');
					$('#une9').val('');
					$('#une10').val('');
					$('#une11').val('');
					$('#une12').val('');

					$('#deux1').val('');
					$('#deux2').val('');
					$('#deux3').val('');
					$('#deux4').val('');
					$('#deux5').val('');
					$('#deux6').val('');

					$('#trois1').val('');
					$('#trois2').val('');
					$('#trois3').val('');
					$('#trois4').val('');

					$('#cinq1').val('');
					$('#cinq2').val('');
				} else if (delais == "5") {
					demi.style.display = "none";
					une.style.display = "none";
					deux.style.display = "none";
					trois.style.display = "none";
					quatre.style.display = "none";
					cinq.style.display = "block";
					$('#demi1').val('');
					$('#demi2').val('');
					$('#demi3').val('');
					$('#demi4').val('');
					$('#demi5').val('');
					$('#demi6').val('');
					$('#demi7').val('');
					$('#demi8').val('');
					$('#demi9').val('');
					$('#demi10').val('');
					$('#demi11').val('');
					$('#demi12').val('');
					$('#demi13').val('');
					$('#demi14').val('');
					$('#demi15').val('');
					$('#demi16').val('');
					$('#demi17').val('');
					$('#demi18').val('');
					$('#demi19').val('');
					$('#demi20').val('');
					$('#demi21').val('');
					$('#demi22').val('');
					$('#demi23').val('');
					$('#demi24').val('');

					$('#une1').val('');
					$('#une2').val('');
					$('#une3').val('');
					$('#une4').val('');
					$('#une5').val('');
					$('#une6').val('');
					$('#une7').val('');
					$('#une8').val('');
					$('#une9').val('');
					$('#une10').val('');
					$('#une11').val('');
					$('#une12').val('');

					$('#deux1').val('');
					$('#deux2').val('');
					$('#deux3').val('');
					$('#deux4').val('');
					$('#deux5').val('');
					$('#deux6').val('');

					$('#trois1').val('');
					$('#trois2').val('');
					$('#trois3').val('');
					$('#trois4').val('');


					$('#quatre1').val('');
					$('#quatre2').val('');
					$('#quatre3').val('');
				} else {
					demi.style.display = "none";
					une.style.display = "none";
					deux.style.display = "none";
					trois.style.display = "none";
					quatre.style.display = "none";
					cinq.style.display = "none";
					$('#demi1').val('');
					$('#demi2').val('');
					$('#demi3').val('');
					$('#demi4').val('');
					$('#demi5').val('');
					$('#demi6').val('');
					$('#demi7').val('');
					$('#demi8').val('');
					$('#demi9').val('');
					$('#demi10').val('');
					$('#demi11').val('');
					$('#demi12').val('');
					$('#demi13').val('');
					$('#demi14').val('');
					$('#demi15').val('');
					$('#demi16').val('');
					$('#demi17').val('');
					$('#demi18').val('');
					$('#demi19').val('');
					$('#demi20').val('');
					$('#demi21').val('');
					$('#demi22').val('');
					$('#demi23').val('');
					$('#demi24').val('');

					$('#une1').val('');
					$('#une2').val('');
					$('#une3').val('');
					$('#une4').val('');
					$('#une5').val('');
					$('#une6').val('');
					$('#une7').val('');
					$('#une8').val('');
					$('#une9').val('');
					$('#une10').val('');
					$('#une11').val('');
					$('#une12').val('');

					$('#deux1').val('');
					$('#deux2').val('');
					$('#deux3').val('');
					$('#deux4').val('');
					$('#deux5').val('');
					$('#deux6').val('');

					$('#trois1').val('');
					$('#trois2').val('');
					$('#trois3').val('');
					$('#trois4').val('');


					$('#quatre1').val('');
					$('#quatre2').val('');
					$('#quatre3').val('');


					$('#cinq1').val('');
					$('#cinq2').val('');
				}

			});


			$('#validation_select').change(function() {
				var validation = $('#validation_select').val();
				let accepteValidation = document.getElementById('valider');
				let nomValidation = document.getElementById('nom_valider');
				if (validation != '' && validation == 'accepter') {
					accepteValidation.style.display = "block";
					nomValidation.style.display = "none";
				} else if (validation != '' && validation == 'refuser') {
					accepteValidation.style.display = "none";
					nomValidation.style.display = "block";
				} else {
					accepteValidation.style.display = "none";
					nomValidation.style.display = "none";
				}
			});

			// AJOUTE AGENDA
			$(document).on('submit', '#ajoutePlaning', function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/ajouteAgenda'; ?>",
					type: 'post',
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						afficheAgenda();
						setTimeout(function() {
							location.reload();
						}, 1500);

					}
				});
				$('#ajoutePlaning')[0].reset();

			});
			// FIN AJOUTE AGENDA
			// AFFICHE AGENDA
			setInterval(afficheAgenda, 1000);

			function afficheAgenda() {

				var idClinique = $('#IDCLINIQUE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/afficheAgenda'; ?>",
					type: 'post',
					data: {
						afficheAgenda: "afficheAgenda",
						idClinique: idClinique
					},
					success: function(data) {
						$('.content_planing').html(data);
					}
				});

			}
			// FIN AFFICHE AGENDA

			// GET IDAGENDA
			$(document).on('click', '.modifier_agenda', function() {
				var idAgenda = $(this).attr('value');
				$('#idAgenda').val(idAgenda);
			});
			// FIN GET IDAGENDA

			// MODIFIER DATE
			$(document).on('submit', '#form_modifier_date', function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/modifierDate'; ?>",
					type: 'post',
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						afficheAgenda();
						setTimeout(function() {
							location.reload();
						}, 2200);
					}
				});
				$('#form_modifier_date')[0].reset();
			})
			// FIN MODIFIER DATE

			// SUPRIMER AGENDA
			$(document).on('click', '.suprimer_agenda', function() {
				var idAgenda = $(this).attr('value');
				var idClinique = $('#IDCLINIQUE').val();
				Swal.fire({
					title: 'Vous êtes sur de suprimer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, suprimer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/suprimerAgenda'; ?>",
							type: 'post',
							data: {
								idAgenda: idAgenda,
								idClinique: idClinique,
								suprimerAgenda: "suprimerAgenda"
							},
							success: function(data) {
								Swal.fire(
									'Suppression!',
									data,
									'success'
								);
								afficheAgenda();
							},
						});
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						Swal.fire(
							'Annulation',
							'Suppression annuler :)',
							'error'
						)
					}
				});
			});
			// FIN SUPRIMER AGENDA

			// MODIFIER STATUS HEURE
			$(document).on('click', '#btn_on', function() {
				var idHeure = $(this).attr('value');
				Swal.fire({
					title: 'Vous êtes sur de désactiver?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, désactiver!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/modidiferStatusOn'; ?>",
							type: 'post',
							data: {
								idHeure: idHeure,
								modifierStatus: "modifierStatus"
							},
							success: function(data) {
								Swal.fire(
									'Désactivation!',
									data,
									'success'
								);
								afficheAgenda();
							},
						});
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						Swal.fire(
							'Annulation',
							'Désactivation annuler :)',
							'error'
						)
					}
				});
			});
			// FIN MODIFIER STATUS HEURE


			// MODIFIER STATUS HEURE
			$(document).on('click', '#btn_off', function() {
				var idHeure = $(this).attr('value');
				Swal.fire({
					title: 'Vous êtes sur de l\'activer ?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, activer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/modidiferStatusoff'; ?>",
							type: 'post',
							data: {
								idHeure: idHeure,
								modifierStatus: "modifierStatus"
							},
							success: function(data) {
								Swal.fire(
									'Activation!',
									data,
									'success'
								);
								afficheAgenda();
							},
						});
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						Swal.fire(
							'Annulation',
							'Activation annuler :)',
							'error'
						)
					}
				});
			});
			// FIN MODIFIER STATUS HEURE

			// SUPRIMER HEURE
			$(document).on('click', '#suprimerHeure', function() {
				var idHeure = $(this).attr('value');
				Swal.fire({
					title: 'Vous êtes sur de suprimer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, suprimer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/suprimerHeure'; ?>",
							type: 'post',
							data: {
								idHeure: idHeure,
								suprimerHeure: "suprimerHeure"
							},
							success: function(data) {
								Swal.fire(
									'Suppression!',
									data,
									'success'
								);
								afficheAgenda();
							},
						});
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						Swal.fire(
							'Annulation',
							'Suppression annuler :)',
							'error'
						)
					}
				});
			});
			//FIN SUPRIMER HEURE

			// AFFICHE LISTES PATIENTS
			$('#recherche_patients').keyup(function() {
				var search = $(this).val();
				if (search != '') {
					patient(search);
				} else {
					patient();
				}
			});
			patient();

			// patient();
			function patient(search) {
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/affichePatient'; ?>",
					method: "POST",
					data: {
						query: search,
						patient: "patient"
					},
					success: function(data) {
						$('.content_listesPatients').html(data);
					}
				});
			}
			// FIN AFFICHE LISTES PATIENTS

			// CLICK AFFICHE DETAILS PATIENTS
			$(document).on("click", "#detailsPatient", function(e) {
				e.preventDefault();
				var idPatient = $(this).attr("value");
				detailsPatient(idPatient);
			});

			function detailsPatient(idPatient) {
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/detailsPatient'; ?>",
					type: 'post',
					data: {
						idPatient: idPatient
					},
					success: function(data) {
						$('.details_patients').html(data);
					}
				});
			}
			// FIN AFFICHE DETAILS PATIENTS


						
            // SUPRIMER PATIENT
			$(document).on('click','#idPatientSuprimer',function(){
               var idPatient=$(this).attr('value');
			   Swal.fire({
					title: 'Vous êtes sur de suprimer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, suprimer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/suprimerPatient'; ?>",
							type: 'post',
							data: {
								idPatient: idPatient,
								suprimerPatient: "suprimerPatient"
							},
							success: function(data) {
								Swal.fire(
									'Suppression!',
									data,
									'success'
								);
								patient();
							},
						});
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						Swal.fire(
							'Annulation',
							'Suppression annuler :)',
							'error'
						)
					}
				});
			});
			// FIN SUPRIMER PATIENT


			// CLICK NOTIF PATIENTS
			$(document).on("click", "#notificationPatient", function(e) {
				e.preventDefault();
				var idPatient = $(this).attr("value");
				$('#idPatientNotif').val(idPatient);
			});
			// FIN

			// AJOUTER NOTIFICATION

			$("#notification").on("submit", function(e) {
				e.preventDefault();
				var typeNotification = $('#typeNotification').val();
				var messageNotification = $('#messageNotification').val();
				var idPatientNotif = $('#idPatientNotif').val();
				var nomCliniqueNotif = $('#nomCliniqueNotif').val();
				var photoCliniqueNotif = $('#photoCliniqueNotif').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/ajouteNotification'; ?>",
					type: 'post',
					data: {
						typeNotification: typeNotification,
						messageNotification: messageNotification,
						idPatientNotif: idPatientNotif,
						nomCliniqueNotif: nomCliniqueNotif,
						photoCliniqueNotif: photoCliniqueNotif,
						ajouteNotif: "ajoutNotif"
					},
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						setTimeout(function() {
							location.reload();
						}, 2200);

					}
				});
				$('#notification')[0].reset();
			});
			// FIN AJOUTER NOTIFICATION


			// AFFICHE RESERVATION
			setInterval(afficheReservation, 1000);

			function afficheReservation() {

				var idClinique = $('#IDCLINIQUE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/afficheReservation'; ?>",
					type: 'post',
					data: {
						afficheReservation: "afficheReservation",
						idClinique: idClinique
					},
					success: function(data) {
						$('.content_reservations').html(data);
					}
				});

			}
			// FIN AFFICHE RESERVATION


			// VALIDATION RESERVATION
			$(document).on('click', '.btn_validation', function() {
				var idReservation = $(this).attr('value');
				$('#idReservation').val(idReservation);
			});
			$(document).on('submit', '#validationForm', function(e) {
				e.preventDefault();
				var validation = $('#validation_select').val();
				var ticket = $('#ticket').val();
				var reponseValider = $('#reponseValider').val();
				var reponseNonValider = $('#reponseNonValider').val();
				if (validation == 'accepter' && validation != '') {
					$('#reponseNonValider').val("");
					if (ticket != '' && reponseValider != '') {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/validationReservation'; ?>",
							method: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								Swal.fire({
									title: 'validation avec success!',
									icon: 'success'
								});
								setTimeout(function() {
									location.reload();
								}, 2000);
								rendezVous();
								selectJours();

							}
						});
					} else {
						Swal.fire({
							title: 'Remplir tous les champs',
							icon: 'warning'
						});
					}
				} else if (validation == 'refuser' && validation != '') {
					$('#ticket').val("");
					$('#reponseValider').val("");
					if (reponseNonValider != '') {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/validationReservation'; ?>",
							method: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								Swal.fire({
									title: 'validation avec success!',
									icon: 'success'
								});
								setTimeout(function() {
									location.reload();
								}, 2000);

							}
						});
					} else {
						Swal.fire({
							title: 'Remplir tous les champs',
							icon: 'warning'
						});
					}
				} else {
					Swal.fire({
						title: 'Selectionner la validation!',
						icon: 'warning'
					});
				}
			});
			//FIN VALIDATION RESERVATION


			// AFFICHE RENDEZ-VOUS
			rendezVous();

			function rendezVous() {
				var idClinique = $('#IDCLINIQUE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/afficheRendezVous'; ?>",
					method: "POST",
					data: {
						idClinique: idClinique,
						rendezVous: "rendezVous"
					},
					success: function(data) {
						$('.content_status').html(data);
					}
				});
			}
			// FIN AFFICHE RENDEZ-VOUS



			// SELECT JOURS RENDEZ VOUS
			selectJours();

			function selectJours() {
				var idClinique = $('#IDCLINIQUE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/afficheJours'; ?>",
					method: "POST",
					data: {
						idClinique: idClinique,
						jours: "jours"
					},
					success: function(data) {
						$('#selectJour').html(data);
					}
				});
			}
			// FIN SELECT JOURS  RENDEZ VOUS


			// AFFICHE VENTE MOIS
			$('#selectJour').change(function() {
				var jour = $('#selectJour').val();
				var idClinique = $('#IDCLINIQUE').val();
				if (jour != '') {
					$.ajax({
						url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/afficheRendezVousDate'; ?>",
						type: 'post',
						data: {
							jour: jour,
							idClinique: idClinique,
							selectDate: "selectDate"
						},
						success: function(data) {
							$('.content_status').html(data);
						}
					});
				} else {
					rendezVous();
				}

			});
			// FIN AFFICHE VENTE MOIS

			// SUPRIMER RENDEZ-VOUS
			$(document).on('click', '.btn_suprimerRendezVous', function() {
				var idRendezVous = $(this).attr('value');
				var idClinique = $('#IDCLINIQUE').val();
				Swal.fire({
					title: 'Vous êtes sur de suprimer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, suprimer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/suprimerRendezVous'; ?>",
							type: 'post',
							data: {
								idRendezVous: idRendezVous,
								idClinique: idClinique,
								suprimerRendezVous: "suprimerRendezVous"
							},
							success: function(data) {
								Swal.fire(
									'Suppression!',
									data,
									'success'
								);
								rendezVous();
							},
						});
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						Swal.fire(
							'Annulation',
							'Suppression annuler :)',
							'error'
						)
					}
				});

			});
			// FIN SUPRIMER RENDEZ-VOUS

			// CHANGER RENDEZ-VOUS

			$(document).on('click', '.btn_change', function() {
				var idRendezVous = $(this).attr('value');
				var idClinique = $('#IDCLINIQUE').val();
				Swal.fire({
					title: 'Vous êtes sur de le changer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, changer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/changeRendezVous'; ?>",
							type: 'post',
							data: {
								idRendezVous: idRendezVous,
								idClinique: idClinique,
								changeRendezVous: "changeRendezVous"
							},
							success: function(data) {
								Swal.fire(
									'Changement!',
									data,
									'success'
								);
								rendezVous();
							},
						});
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						Swal.fire(
							'Annulation',
							'Changement annuler :)',
							'error'
						)
					}
				});
			});
			// FIN CHANGER RENDEZ-VOUS

			// AFFICHE COUNT RESERVATION
			setInterval(afficheCountReservation,1000);
			function afficheCountReservation(){
				var idClinique = $('#IDCLINIQUE').val();
					$.ajax({
						url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/afficheCount'; ?>",
						type: 'post',
						data: {
							idClinique: idClinique,
							afficheCount: "afficheCount"
						},
						success: function(data) {
							$('.badge_Reservation').html(data);
						}
					});
			}
			// FIN AFFICHE COUNT RESERVATION

			$('#open_reservations').on('click',function(){
				var idClinique = $('#IDCLINIQUE').val();
				$.ajax({
						url: "<?php echo base_url() . 'admin/clinique/Clinique_controlleur/modifierCount'; ?>",
						type: 'post',
						data: {
							idClinique: idClinique,
							modifierCount: "modifierCount"
						},
						success: function(data) {
						}
					});
			});



		});




		$(document).ready(function() {

			let profile = document.getElementById('profile-blocs'),
				openProfile = document.getElementById('open_profile');

			openProfile.addEventListener('click', function() {
				profile.style.display = "block";
				planing.style.display = "none";
				reservations.style.display = "none";
				rendezVous.style.display = "none";
				patients.style.display = "none";
				loyers.style.display = "none";

			});


			let planing = document.getElementById('planing-blocs'),
				openPlaning = document.getElementById('open_planing');

			openPlaning.addEventListener('click', function() {
				planing.style.display = "block";
				profile.style.display = "none";
				rendezVous.style.display = "none";
				patients.style.display = "none";
				reservations.style.display = "none";
				loyers.style.display = "none";

			});



			let rendezVous = document.getElementById('rendezVous-blocs'),
				openRendezVous = document.getElementById('open_rendezVous');

			openRendezVous.addEventListener('click', function() {
				rendezVous.style.display = "block";
				planing.style.display = "none";
				profile.style.display = "none";
				patients.style.display = "none";
				reservations.style.display = "none";
				loyers.style.display = "none";

			});


			let patients = document.getElementById('patients-blocs'),
				openPatients = document.getElementById('open_patients');

			openPatients.addEventListener('click', function() {
				patients.style.display = "block";
				rendezVous.style.display = "none";
				planing.style.display = "none";
				profile.style.display = "none";
				reservations.style.display = "none";
				loyers.style.display = "none";

			});



			let reservations = document.getElementById('reservations-blocs'),
				openReservations = document.getElementById('open_reservations');

			openReservations.addEventListener('click', function() {
				reservations.style.display = "block";
				rendezVous.style.display = "none";
				profile.style.display = "none";
				planing.style.display = "none";
				patients.style.display = "none";
				loyers.style.display = "none";

			});


			let loyers = document.getElementById('loyers-blocs'),
				openLoyers = document.getElementById('open_loyer');

			openLoyers.addEventListener('click', function() {
				loyers.style.display = "block";
				reservations.style.display = "none";
				rendezVous.style.display = "none";
				profile.style.display = "none";
				planing.style.display = "none";
				patients.style.display = "none";


			});




		});
	</script>
</body>

</html>
