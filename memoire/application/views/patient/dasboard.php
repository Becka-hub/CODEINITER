<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dasboardPatient.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
</head>

<body>
	<input type="hidden" id="IDPATIENT" value="<?php echo $_SESSION['IDPATIENT']; ?>">
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
					<img src="<?php echo base_url('assets/image/logo.png'); ?>" alt="" />
				</div>
				<ul class="sidebar_menu">
					<li class="active">
						<a href="#" id="open_profile">
							<div class="icon">
								<i class="fa fa-male" aria-hidden="true"></i>
							</div>
							<div class="title">Profil</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_consultation" class="suprime_count_message">
							<div class="icon">
								<i class="fa fa-comments" aria-hidden="true"></i>
							</div>
							<div class="title">Consultations<span class="badge badge-danger badge_Message ml-1"></span></div>
						</a>
					</li>
					<li>
						<a href="#" id="open_docteur">
							<div class="icon">
								<i class="fa fa-user-md" aria-hidden="true"></i>
							</div>
							<div class="title">Docteurs</div>
						</a>
					</li>
					<li>
					<li>
						<a href="#" id="open_medicament">
							<div class="icon">
								<i class="fa fa-flask" aria-hidden="true"></i>
							</div>
							<div class="title">Médicaments</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_pharmacie">
							<div class="icon">
								<i class="fa fa-medkit" aria-hidden="true"></i>
							</div>
							<div class="title">Pharmaceutiques</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_clinique">
							<div class="icon">
								<i class="fa fa-plus-square" aria-hidden="true"></i>
							</div>
							<div class="title">Centre médicales</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_apropos">
							<div class="icon">
								<i class="fa fa-file-text" aria-hidden="true"></i>
							</div>
							<div class="title">À propos</div>
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
					<div class="image_patient">
						<img src="<?php echo base_url() . 'upload/patient/' . $_SESSION['PHOTOPATIENT']; ?>" width="40px" alt="" />
						<h2 class="text-center"><?php echo $_SESSION['NOMPATIENT'] . " " . $_SESSION['PRENOMPATIENT']; ?></h2>
					</div>
				</div>
				<div class="bloc_right">
					<div class="btn-group btn_notification " data-toggle="modal" data-target="#modal_notification" data-whatever="@mdo">
						<span class="badge badge_notification"></span>
						<i class="fa fa-bell-o"></i>
					</div>
					<div class="btn-group btn_deconnection">
						<a href="<?php echo base_url() . 'patient/Patient_controlleur/logout' ?>"><i class="fa fa-power-off"></i></a>
					</div>
				</div>
			</div>

			<!--Modal navbar notification-->
			<div class="modal fade" id="modal_notification" tabindex="-1" role="dialog" aria-labelledby="notification_modalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<i class="fa fa-times"></i>
							</button>
						</div>
						<div class="modal-body">
							<div class="notification_content overflow-auto">

							</div>

						</div>
					</div>
				</div>
			</div>
			<!--Fin Modal navbar notification-->


			<!-- Fin Navbar -->

			<!-- Profile -->
			<section class="profile_blocs" id="profile_blocs">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-8 col-lg-8">
						<div class="profile">
							<div class="background_profile">
								<img src="<?php echo base_url('assets/image/20-mg-label-blister-pack-208512.jpg'); ?>" alt="" />
							</div>
							<div class="col d-flex justify-content-center">
								<div class="patient_photo">
									<img src="<?php echo base_url() . 'upload/patient/' . $_SESSION['PHOTOPATIENT']; ?>" alt="" />
								</div>
							</div>
							<div class="patient_nom d-flex justify-content-center">
								<h2 class="text-center"><?php echo $_SESSION['NOMPATIENT'] . " " . $_SESSION['PRENOMPATIENT']; ?></h2>
							</div>
							<div class="patient_description pl-4 pr-4 pt-2 pb-2">
								<p>
									<i class="fa fa-user"></i>
									<?php echo $_SESSION['NOMPATIENT'] . " " . $_SESSION['PRENOMPATIENT'] . " née le " . $_SESSION['DATENAISSANCEPATIENT'] . " qui porte le numéro cin " . $_SESSION['CINPATIENT'] . " ,Son
									travaille " . $_SESSION['PROFESSIONPATIENT'] . " est logée dans " . $_SESSION['ADRESSEPATIENT'] . "."; ?>
								</p>
								<div class="row">
									<div class="col-12 col-sm-12 col-md-6 col-lg-6">
										<p><i class="fa fa-phone-square mr-2"></i><?php echo $_SESSION['TELEPHONEPATIENT']; ?></p>
									</div>
									<div class="col-12 col-sm-12 col-md-6 col-lg-6">
										<p>
											<i class="fa fa-envelope mr-2"></i><?php echo $_SESSION['MAILPATIENT']; ?>
										</p>
									</div>
								</div>

								<p>
									<i class="fa fa-map-marker mr-2"></i><?php echo "Province:" . $_SESSION['PROVINCEPATIENT'] . " - Région:" . $_SESSION['REGIONPATIENT'] . " - District:" . $_SESSION['DISTRICTPATIENT'] . " - Communes:" . $_SESSION['COMMUNEPATIENT']; ?>
								</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<div class="astuce_profile">
							<h6 class="text-center">
								<i class="fa fa-tint mr-2"></i>Règles
							</h6>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
								do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								Duis aute irure dolor in reprehenderit Asperiores dolores sed
								et. Tenetur quia eos. Autem tempore quibusdam vel
								necessitatibus optio ad corporis,necessitatibus optio ad
								corporis.. Duis aute irure dolor in reprehenderit Asperiores
								dolores sed et. Tenetur quia eos.


							</p>
							<h6 class="text-center mt-3">
								<i class="fa fa-youtube-play mr-2"></i>Manipulation de
								l'interface
							</h6>
							<iframe width="100%" height="235" class="mt-2" src="https://www.youtube.com/embed/HgIeckuG7cQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
							</iframe>
						</div>
					</div>
				</div>
			</section>
			<!-- Fin Profile -->



			<!-- Message -->
			<section class="consultation_blocs" id="consultation_blocs">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-8 col-lg-8">
						<div class="consultation">
							<div class="corps_consultation">
								<div class="profile_consultation">
									<img src="<?php echo base_url() . 'upload/patient/' . $_SESSION['PHOTOPATIENT']; ?>" width="40px" alt="" />
									<h6><?php echo $_SESSION['PRENOMPATIENT']; ?></h6>
								</div>
								<div class="body_consultation overflow-auto">
									<div class="body_content_consultation">

									</div>
								</div>
								<form class="consultation_form mt-2" id="form" method="post">
									<div class="input_consultation">
										<div class="form-group mr-3">
											<input type="text" name="consultation" id="consultation" placeholder="Votre message..." required />
											<input type="hidden" name="IDPATIENT" id="IDPATIENT" value="<?php echo $_SESSION['IDPATIENT']; ?>">
										</div>
									</div>
									<div class="button_consultation">
										<button type="submit" id="Consultation_Ajouter" class="p-1 m-0 btn-consultation">
											<i class="fa fa-send"></i>
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<div class="astuce_consultation">
							<h6 class="text-center">
								<i class="fa fa-tint mr-2"></i>Astuces
							</h6>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
								do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								Duis aute irure dolor in reprehenderit Asperiores dolores sed
								et. Tenetur quia eos. Autem tempore quibusdam vel
								necessitatibus optio ad corporis,necessitatibus optio ad
								corporis.. Duis aute irure dolor in reprehenderit Asperiores
								dolores sed et. Tenetur quia eos.
							</p>
							<div class="d-flex justify-content-center">
								<div class="image_astuce">
									<img src="<?php echo base_url('assets/image/consultation.png'); ?>" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Fin Message-->




			<!-- Docteur -->
			<section class="docteur_blocs" id="docteur_blocs">
				<div class="docteur">
					<div class="recherche_docteur">
						<div class="row">
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<select name="province" class="custom-select custom-select-sm mt-2" id="provinceDoctor" required>
									<option value="">Selects provinces</option>
									<?php
									if ($province->num_rows() > 0) {
										foreach ($province->result() as $resultat) {
									?>
											<option value="<?php echo $resultat->IDPROVINCE; ?>">
												<?php echo $resultat->NOMPROVINCE; ?></option>

									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idProvinceRegion">
								<select class="custom-select custom-select-sm mt-2" id="regionDoctor">
									<option selected>Selects régions</option>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idRegionDistrict">
								<select class="custom-select custom-select-sm mt-2" id="districtDoctor">
									<option selected>Selects districts</option>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idDistrictCommune">
								<select class="custom-select custom-select-sm mt-2" id="communeDoctor">
									<option selected>Selects communes</option>

								</select>
							</div>
						</div>
					</div>
					<div class="content_docteur overflow-auto">
						<div class="row liste_docteur">

						</div>
					</div>
					<div class="modal_docteur">
						<div class="modal fade " id="ModalDocteur" tabindex="-1" role="dialog" aria-labelledby="ModalDocteurLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-body modalDocteurContent">

									</div>
									<div class="modal-footer d-flex justify-content-center">
										<button type="button" class="btn " data-dismiss="modal">Fermer</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Fin Docteur -->

			<section class="medicament_blocs" id="medicament_blocs">
				<div class="medicament">
					<div class="d-flex justify-content-center">
						<div class="recherche_medicament">
							<div class="form-group">
								<input type="text" class="form-control" id="recherche_medicament" placeholder="Recherche médicaments ...">
							</div>
						</div>
					</div>
					<div class="content_medicament">
						<div class="row liste_medicament overflow-auto">

						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="modal_medicament" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						<div class="modal-dialog  modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalScrollableTitle">Détails Médicaments</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body select_medicament">

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Pharmacie -->
			<section class="pharmacie_blocs" id="pharmacie_blocs">
				<div class="pharmacie">
					<div class="recherche_pharmacie">
						<div class="row">
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<select name="province" class="custom-select custom-select-sm mt-2" id="provincePharmacie" required>
									<option value="">Selects provinces</option>
									<?php
									if ($province->num_rows() > 0) {
										foreach ($province->result() as $resultat) {
									?>
											<option value="<?php echo $resultat->IDPROVINCE; ?>">
												<?php echo $resultat->NOMPROVINCE; ?></option>

									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idProvinceRegionPharmacie">
								<select class="custom-select custom-select-sm mt-2" id="regionPharmacie">
									<option value="">Selects régions</option>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idRegionDistrictPharmacie">
								<select class="custom-select custom-select-sm mt-2" id="districtPharmacie">
									<option value="">Selects districts</option>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idDistrictCommunePharmacie">
								<select class="custom-select custom-select-sm mt-2" id="communePharmacie">
									<option value="">Selects communes</option>
								</select>
							</div>
						</div>
					</div>
					<div class="content_pharmacie overflow-auto">
						<div class="row liste_pharmacie">


						</div>
					</div>
				</div>
			</section>
			<!-- Fin Pharmacie -->



			<!-- Clinique -->
			<section class="clinique_blocs" id="clinique_blocs">
				<div class="clinique">
					<div class="recherche_clinique">
						<div class="row">
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<select name="province" class="custom-select custom-select-sm mt-2" id="provinceClinique" required>
									<option value="">Selects provinces</option>
									<?php
									if ($province->num_rows() > 0) {
										foreach ($province->result() as $resultat) {
									?>
											<option value="<?php echo $resultat->IDPROVINCE; ?>">
												<?php echo $resultat->NOMPROVINCE; ?></option>

									<?php
										}
									}
									?>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idProvinceRegionClinique">
								<select class="custom-select custom-select-sm mt-2" id="regionClinique">
									<option selected>Selects régions</option>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idRegionDistrictClinique">
								<select class="custom-select custom-select-sm mt-2" id="districtClinique">
									<option selected>Selects districts</option>
								</select>
							</div>
							<div class="col-12 col-sm-6 col-md-3 col-lg-3">
								<input type="hidden" id="idDistrictCommuneClinique">
								<select class="custom-select custom-select-sm mt-2" id="communeClinique">
									<option selected>Selects communes</option>
								</select>
							</div>
						</div>
					</div>
					<div class="content_clinique overflow-auto">
						<div class="row liste_clinique">


						</div>
					</div>
				</div>

			</section>
			<!-- Fin Clinique -->



			<!-- Apropos -->
			<section class="apropos_blocs" id="apropos_blocs">
				<div class="apropos">
					<div class="content-apropos">
						<div class="d-flex justify-content-center">
							<div class="logoApropos">
								<img src="<?php echo base_url('assets/image/logo.png'); ?>" alt="" />
							</div>
						</div>
						<div class="articleApropos">
							<p>Malgré les besoins sanitaires dans la vie quotidienne, DOCTOPHARME est conçue pour résoudre quelques problèmes dans ce domaine à Madagascar. DOCTOPHARME n’est pas une application comme les autres parce qu’il est fait pour la santé et les besoins sanitaire.DOCTOPHARME a pour principe de diminuer les personnes malades, aides les pauvres à obtenir un soin, aider les personnes qui ne sont pas en mesure de se déplacer par manque de transport en commun ou handicap physique et faciliter besoins sanitaires.</p>
							<div class="photoFonctinnalite">
								<div class="row">
									<div class="col-4 col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">
										<div class="image">
											<img src="<?php echo base_url('assets/image/mess.png'); ?>" alt="" />
										</div>
									</div>
									<div class="col-4 col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">
										<div class="image">
											<img src="<?php echo base_url('assets/image/phar.png'); ?>" alt="" />
										</div>
									</div>
									<div class="col-4 col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center">
										<div class="image">
											<img src="<?php echo base_url('assets/image/rend.png'); ?>" alt="" />
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

			</section>
			<!-- Fin Apropos -->



		</div>
		<!-- FIN CONTENT -->
	</div>
	<!-- FIN WRAPPER -->

	<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.slim.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.2.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
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


			// SELECT DOCTEUR

			// AFFICHE REGION A PARTIRE DU PROVINCE
			$('#provinceDoctor').change(function() {
				var idProvince = $('#provinceDoctor').val();
				$('#idProvinceRegion').val(idProvince);
				var regionDoctor = document.getElementById("regionDoctor");
				var districtDoctor = document.getElementById("districtDoctor");
				var communeDoctor = document.getElementById("communeDoctor");
				if (idProvince != '') {
					selectProvinceDocteur($('#provinceDoctor').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectRegion'; ?>",
						type: 'post',
						data: {
							idProvince: idProvince
						},
						success: function(data) {
							$('#regionDoctor').html(data);
							regionDoctor.style.display = "block";
							districtDoctor.style.display = "none";
							communeDoctor.style.display = "none";
							$('#districtDoctor').html("<option selected>Selects districts</option>");
							$('#communeDoctor').html("<option selected>Selects communes</option>");
						}
					});
				} else {
					afficheDocteur();
					$('#regionDoctor').html("<option selected>Selects regions</option>");
					$('#districtDoctor').html("<option selected>Selects districts</option>");
					$('#communeDoctor').html("<option selected>Selects communes</option>");
					districtDoctor.style.display = "none";
					communeDoctor.style.display = "none";
				}
			});
			// FIN


			// AFFICHE DISTRICT A PARTIRE DU REGION
			$('#regionDoctor').change(function() {
				var idRegion = $('#regionDoctor').val();
				$('#idRegionDistrict').val(idRegion);
				var districtDoctor = document.getElementById("districtDoctor");
				var communeDoctor = document.getElementById("communeDoctor");
				if (idRegion != '') {
					selectRegionDocteur($('#regionDoctor').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectDistrict'; ?>",
						type: 'post',
						data: {
							idRegion: idRegion
						},
						success: function(data) {
							$('#districtDoctor').html(data);
							districtDoctor.style.display = "block";
							communeDoctor.style.display = "none";
							$('#communeDoctor').html("<option selected>Selects communes</option>");
						}
					});
				} else {
					$('#districtDoctor').html("<option selected>Selects districts</option>");
					districtDoctor.style.display = "block";
					communeDoctor.style.display = "none";
					var idProvinceRegion = $('#idProvinceRegion').val();
					selectProvinceDocteur(idProvinceRegion);
				}
			});
			// FIN


			// AFFICHE COMMUNE A PARTIRE DU DISTRICT
			$('#districtDoctor').change(function() {
				var idDistrict = $('#districtDoctor').val();
				$('#idDistrictCommune').val(idDistrict);
				var communeDoctor = document.getElementById("communeDoctor");
				if (idDistrict != '') {
					selectDistrictDocteur($('#districtDoctor').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectCommune'; ?>",
						type: 'post',
						data: {
							idDistrict: idDistrict
						},
						success: function(data) {
							$('#communeDoctor').html(data);
							communeDoctor.style.display = "block";
						}
					});
				} else {
					var idRegionDistrict = $('#idRegionDistrict').val();
					selectRegionDocteur(idRegionDistrict);
					$('#communeDoctor').html("<option selected>Selects communes</option>");
				}
			});
			// FIN



			// AFFICHE COMMUNE A PARTIRE DU DISTRICT
			$('#communeDoctor').change(function() {
				var idCommune = $('#communeDoctor').val();
				if (idCommune != '') {
					selectCommuneDocteur($('#communeDoctor').val());
				} else {
					var idDistrictCommune = $('#idDistrictCommune').val();
					selectDistrictDocteur(idDistrictCommune);
				}


			});
			// FIN

			// FIN SELECT DOCTEUR








			// SELECT PHARMACIE

			// AFFICHE REGION A PARTIRE DU PROVINCE
			$('#provincePharmacie').change(function() {
				var idProvince = $('#provincePharmacie').val();
				$('#idProvinceRegionPharmacie').val(idProvince);
				var regionPharmacie = document.getElementById("regionPharmacie");
				var districtPharmacie = document.getElementById("districtPharmacie");
				var communePharmacie = document.getElementById("communePharmacie");
				if (idProvince != '') {
					selectProvincePharmacie($('#provincePharmacie').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectRegion'; ?>",
						type: 'post',
						data: {
							idProvince: idProvince
						},
						success: function(data) {
							$('#regionPharmacie').html(data);
							regionPharmacie.style.display = "block";
							districtPharmacie.style.display = "none";
							communePharmacie.style.display = "none";
							$('#districtPharmacie').html("<option selected>Selects districts</option>");
							$('#communePharmacie').html("<option selected>Selects communes</option>");
						}
					});
				} else {
					affichePharmacie();
					$('#regionPharmacie').html("<option selected>Selects regions</option>");
					$('#districtPharmacie').html("<option selected>Selects districts</option>");
					$('#communePharmacie').html("<option selected>Selects communes</option>");
					districtPharmacie.style.display = "none";
					communePharmacie.style.display = "none";

				}
			});
			// FIN


			// AFFICHE DISTRICT A PARTIRE DU REGION
			$('#regionPharmacie').change(function() {
				var idRegion = $('#regionPharmacie').val();
				$('#idRegionDistrictPharmacie').val(idRegion);
				var districtPharmacie = document.getElementById("districtPharmacie");
				var communePharmacie = document.getElementById("communePharmacie");
				if (idRegion != '') {
					selectRegionPharmacie($('#regionPharmacie').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectDistrict'; ?>",
						type: 'post',
						data: {
							idRegion: idRegion
						},
						success: function(data) {
							$('#districtPharmacie').html(data);
							districtPharmacie.style.display = "block";
							communePharmacie.style.display = "none";
							$('#communePharmacie').html("<option selected>Selects communes</option>");
						}
					});
				} else {
					$('#districtPharmacie').html("<option selected>Selects districts</option>");
					districtPharmacie.style.display = "block";
					communePharmacie.style.display = "none";
					var idProvinceRegion = $('#idProvinceRegionPharmacie').val();
					selectProvincePharmacie(idProvinceRegion);
				}
			});
			// FIN


			// AFFICHE COMMUNE A PARTIRE DU DISTRICT
			$('#districtPharmacie').change(function() {
				var idDistrict = $('#districtPharmacie').val();
				$('#idDistrictCommunePharmacie').val(idDistrict);
				var communePharmacie = document.getElementById("communePharmacie");
				if (idDistrict != '') {
					selectDistrictPharmacie($('#districtPharmacie').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectCommune'; ?>",
						type: 'post',
						data: {
							idDistrict: idDistrict
						},
						success: function(data) {
							$('#communePharmacie').html(data);
							communePharmacie.style.display = "block";
						}
					});
				} else {
					var idRegionDistrict = $('#idRegionDistrictPharmacie').val();
					selectRegionPharmacie(idRegionDistrict);
					$('#communePharmacie').html("<option selected>Selects communes</option>");
				}
			});
			// FIN

			// FIN SELECT PHARMACIE

			// SELECT PHARMACIE COMMUNE
			$('#communePharmacie').change(function() {
				var idCommune = $('#communePharmacie').val();
				if (idCommune != '') {
					selectCommunePharmacie($('#communePharmacie').val());
				} else {
					var idDistrictCommune = $('#idDistrictCommunePharmacie').val();
					selectDistrictPharmacie(idDistrictCommune);
				}


			});

			// FIN SELECT PHARMACIE COMMUNE








			// AFFICHE REGION A PARTIRE DU PROVINCE
			$('#provinceClinique').change(function() {
				var idProvince = $('#provinceClinique').val();
				$('#idProvinceRegionClinique').val(idProvince);
				var regionClinique = document.getElementById("regionClinique");
				var districtClinique = document.getElementById("districtClinique");
				var communeClinique = document.getElementById("communeClinique");
				if (idProvince != '') {
					selectProvinceClinique($('#provinceClinique').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectRegion'; ?>",
						type: 'post',
						data: {
							idProvince: idProvince
						},
						success: function(data) {
							$('#regionClinique').html(data);
							regionClinique.style.display = "block";
							districtClinique.style.display = "none";
							communeClinique.style.display = "none";
							$('#districtClinique').html("<option selected>Selects districts</option>");
							$('#communeClinique').html("<option selected>Selects communes</option>");
						}
					});
				} else {
					afficheClinique();
					$('#regionClinique').html("<option selected>Selects regions</option>");
					$('#districtClinique').html("<option selected>Selects districts</option>");
					$('#communeClinique').html("<option selected>Selects communes</option>");
					districtClinique.style.display = "none";
					communeClinique.style.display = "none";
				}
			});
			// FIN


			// AFFICHE DISTRICT A PARTIRE DU REGION
			$('#regionClinique').change(function() {
				var idRegion = $('#regionClinique').val();
				$('#idRegionDistrictClinique').val(idRegion);
				var districtClinique = document.getElementById("districtClinique");
				var communeClinique = document.getElementById("communeClinique");
				if (idRegion != '') {
					selectRegionClinique($('#regionClinique').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectDistrict'; ?>",
						type: 'post',
						data: {
							idRegion: idRegion
						},
						success: function(data) {
							$('#districtClinique').html(data);
							districtClinique.style.display = "block";
							communeClinique.style.display = "none";
							$('#communeClinique').html("<option selected>Selects communes</option>");
						}
					});
				} else {
					$('#districtClinique').html("<option selected>Selects districts</option>");
					districtClinique.style.display = "block";
					communeClinique.style.display = "none";
					var idProvinceRegion = $('#idProvinceRegionClinique').val();
					selectProvinceClinique(idProvinceRegion);
				}
			});
			// FIN


			// AFFICHE COMMUNE A PARTIRE DU DISTRICT
			$('#districtClinique').change(function() {
				var idDistrict = $('#districtClinique').val();
				$('#idDistrictCommuneClinique').val(idDistrict);
				var communeClinique = document.getElementById("communeClinique");
				if (idDistrict != '') {
					selectDistrictClinique($('#districtClinique').val());
					$.ajax({
						url: "<?php echo base_url() . 'patient/Patient_controlleur/selectCommune'; ?>",
						type: 'post',
						data: {
							idDistrict: idDistrict
						},
						success: function(data) {
							$('#communeClinique').html(data);
							communeClinique.style.display = "block";
						}
					});
				} else {
					var idRegionDistrict = $('#idRegionDistrictClinique').val();
					selectRegionClinique(idRegionDistrict);
					$('#communeClinique').html("<option selected>Selects communes</option>");
				}
			});
			// FIN


			// SELECT CLINIQUE COMMUNE
			$('#communeClinique').change(function() {
				var idCommune = $('#communeClinique').val();
				if (idCommune != '') {
					selectCommuneClinique($('#communeClinique').val());
				} else {
					var idDistrictCommune = $('#idDistrictCommuneClinique').val();
					selectDistrictClinique(idDistrictCommune);
				}


			});

			// FIN SELECT CLINIQUE COMMUNE

			// FIN SELECT CLINIQUE






			// ENVOI MESSAGE
			$("#form").on("submit", function(e) {
				e.preventDefault();
				var message = $('#consultation').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/ajouteMessage'; ?>",
					type: 'post',
					dataType: 'json',
					data: {
						message: message,
						idPatient: idPatient
					},
					success: function() {
						readData();
					}
				});
				$('#form')[0].reset();
			});
			// FIN ENVOI MESSAGE



			// AFFICHE MESSAGE
			setInterval(afficheMessage, 1000);
			afficheMessage();

			function afficheMessage() {
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/afficheMessage'; ?>",
					type: 'post',
					data: {
						idPatient: idPatient,
						afficheMessage: "afficheMessage",
					},
					success: function(data) {
						$('.body_content_consultation').html(data);
					}
				});
			}
			// FIN AFFICHE MESSAGE



			// AFFICHE NOTIFICATION
			setInterval(afficheNotification, 1000);
			afficheNotification();

			function afficheNotification() {
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/afficheNotification'; ?>",
					type: 'post',
					data: {
						idPatient: idPatient,
						afficheNotification: "afficheNotification",
					},
					success: function(data) {
						$('.notification_content').html(data);
					}
				});
			}
			// FIN AFFICHE NOTIFICATION



			// AFFICHE COUNT NOTIFICATION
			setInterval(afficheCountNotification, 1000);
			afficheCountNotification();

			function afficheCountNotification() {
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/afficheCountNotification'; ?>",
					type: 'post',
					data: {
						idPatient: idPatient,
						afficheCountNotif: "afficheCountNotif",
					},
					success: function(data) {
						$('.badge_notification').html(data);
					}
				});
			}
			// FIN AFFICHE COUNT NOTIFICATION

			// SUPRIMER COUNT NOTIFICATION
			$('.btn_notification').on('click', function() {
				$('.badge_notification').html("");
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/deleteCountNotification'; ?>",
					type: 'post',
					data: {
						idPatient: idPatient,
						deleteCountNotif: "deleteCountNotif",
					},
					success: function(data) {

					}
				});

			});
			// FIN SUPRIMER COUNT NOTIFICATION




			// AFFICHE COUNT MESSAGE
			setInterval(afficheCountMessage, 1000);
			afficheCountMessage();

			function afficheCountMessage() {
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/afficheCountMessage'; ?>",
					type: 'post',
					data: {
						idPatient: idPatient,
						afficheCountMessage: "afficheCountMessage",
					},
					success: function(data) {
						$('.badge_Message').html(data);
					}
				});
			}
			// FIN AFFICHE COUNT MESSAGE



			// SUPRIMER COUNT MESSAGE
			$('.suprime_count_message').on('click', function() {
				$('.badge_Message').html("");
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/deleteCountMessage'; ?>",
					type: 'post',
					data: {
						idPatient: idPatient,
						deleteCountMessage: "deleteCountMessage",
					},
					success: function(data) {

					}
				});

			});
			// FIN SUPRIMER COUNT MESSAGE



			// AFFICHE DOCTEUR
			afficheDocteur();

			function afficheDocteur() {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/afficheDocteur'; ?>",
					type: 'post',
					data: {
						selectDocteur: "selectDocteur",
					},
					success: function(data) {
						$('.liste_docteur').html(data);
					}
				});
			}
			// FIN AFFICHE DOCTEUR

			// SELECT PROVINCE DOCTEUR
			function selectProvinceDocteur(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectProvinceDocteur'; ?>",
					type: 'post',
					data: {
						id: id,
						selectDocteur: "selectDocteur",

					},
					success: function(data) {
						$('.liste_docteur').html(data);
					}
				});
			}
			// FIN SELECT PROVINCE DOCTEUR

			// SELECT REGION DOCTEUR
			function selectRegionDocteur(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectRegionDocteur'; ?>",
					type: 'post',
					data: {
						id: id,
						selectDocteur: "selectDocteur",

					},
					success: function(data) {
						$('.liste_docteur').html(data);
					}
				});
			}
			// FIN SELECT REGION DOCTEUR


			// SELECT DISTRICT DOCTEUR
			function selectDistrictDocteur(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectDistrictDocteur'; ?>",
					type: 'post',
					data: {
						id: id,
						selectDocteur: "selectDocteur",

					},
					success: function(data) {
						$('.liste_docteur').html(data);
					}
				});
			}
			// FIN SELECT DISTRICT DOCTEUR

			// SELECT COMMUNE DOCTEUR
			function selectCommuneDocteur(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectCommuneDocteur'; ?>",
					type: 'post',
					data: {
						id: id,
						selectDocteur: "selectDocteur",

					},
					success: function(data) {
						$('.liste_docteur').html(data);
					}
				});
			}
			// FIN SELECT COMMUNE DOCTEUR





			// AFFICHE PHARMACIE
			affichePharmacie();

			function affichePharmacie() {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/affichePharmacie'; ?>",
					type: 'post',
					data: {
						selectPharmacie: "selectPharmacie",
					},
					success: function(data) {
						$('.liste_pharmacie').html(data);
					}
				});
			}
			// FIN AFFICHE PHARMACIE

			// SELECT PROVINCE PHARMACIE
			function selectProvincePharmacie(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectProvincePharmacie'; ?>",
					type: 'post',
					data: {
						id: id,
						selectPharmacie: "selectPharmacie",

					},
					success: function(data) {
						$('.liste_pharmacie').html(data);
					}
				});
			}
			// FIN SELECT PROVINCE PHARMACIE

			// SELECT REGION PHARMACIE
			function selectRegionPharmacie(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectRegionPharmacie'; ?>",
					type: 'post',
					data: {
						id: id,
						selectPharmacie: "selectPharmacie",

					},
					success: function(data) {
						$('.liste_pharmacie').html(data);
					}
				});
			}
			// FIN SELECT REGION PHARMACIE


			// SELECT DISTRICT PHARMACIE
			function selectDistrictPharmacie(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectDistrictPharmacie'; ?>",
					type: 'post',
					data: {
						id: id,
						selectPharmacie: "selectPharmacie",

					},
					success: function(data) {
						$('.liste_pharmacie').html(data);
					}
				});
			}
			// FIN SELECT DISTRICT PHARMACIE

			// SELECT COMMUNE PHARMACIE
			function selectCommunePharmacie(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectCommunePharmacie'; ?>",
					type: 'post',
					data: {
						id: id,
						selectPharmacie: "selectPharmacie",

					},
					success: function(data) {
						$('.liste_pharmacie').html(data);
					}
				});
			}
			// FIN SELECT COMMUNE PHARMACIE





			// A PROPOS DOCTEUR
			$(document).on("click", "#idDocteurApropos", function(e) {
				e.preventDefault();
				var idDocteur = $(this).attr("value");
				aproposDocteur(idDocteur);
			});

			function aproposDocteur(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/aproposDocteur'; ?>",
					type: 'post',
					data: {
						id: id,
						selectDocteur: "selectDocteur",
					},
					success: function(data) {
						$('.modalDocteurContent').html(data);
					}
				});
			}

			// FIN A PROPOS DOCTEUR


			// AFFICHE LISTES MEDICAMENTS
			$('#recherche_medicament').keyup(function() {
				var search = $(this).val();
				if (search != '') {
					medicament(search);
				} else {
					medicament();
				}
			});
			medicament();

			function medicament(search) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/afficheMedicament'; ?>",
					method: "POST",
					data: {
						query: search,
						medicament: "medicament",
					},
					success: function(data) {
						$('.liste_medicament').html(data);
					}
				});
			}
			// FIN AFFICHE LISTES MEDICAMENTS

			// GET MEDICAMENT
			$(document).on('click', '#getMedicament', function() {
				var idMedicament = $(this).attr('value');
				selectMedicament(idMedicament);
			});
			// FIN GET MEDICAMENT

			// SELECT MEDICAMENT
			function selectMedicament(idMedicament) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectMedicament'; ?>",
					method: "POST",
					data: {
						idMedicament: idMedicament,
						medicament: "medicament",
					},
					success: function(data) {
						$('.select_medicament').html(data);
					}
				});
			}
			// FIN SELECT MEDICAMENT




			// AFFICHE CLINIQUE
			afficheClinique();

			function afficheClinique() {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/afficheClinique'; ?>",
					type: 'post',
					data: {
						selectClinique: "selectClinique",
					},
					success: function(data) {
						$('.liste_clinique').html(data);
					}
				});
			}
			// FIN AFFICHE CLINIQUE

			// SELECT PROVINCE CLINIQUE
			function selectProvinceClinique(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectProvinceClinique'; ?>",
					type: 'post',
					data: {
						id: id,
						selectClinique: "selectClinique",

					},
					success: function(data) {
						$('.liste_clinique').html(data);
					}
				});
			}
			// FIN SELECT PROVINCE CLINIQUE

			// SELECT REGION CLINIQUE
			function selectRegionClinique(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectRegionClinique'; ?>",
					type: 'post',
					data: {
						id: id,
						selectClinique: "selectClinique",

					},
					success: function(data) {
						$('.liste_clinique').html(data);
					}
				});
			}
			// FIN SELECT REGION CLINIQUE


			// SELECT DISTRICT CLINIQUE
			function selectDistrictClinique(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectDistrictClinique'; ?>",
					type: 'post',
					data: {
						id: id,
						selectClinique: "selectClinique",

					},
					success: function(data) {
						$('.liste_clinique').html(data);
					}
				});
			}
			// FIN SELECT DISTRICT CLINIQUE

			// SELECT COMMUNE CLINIQUE
			function selectCommuneClinique(id) {
				$.ajax({
					url: "<?php echo base_url() . 'patient/Patient_controlleur/selectCommuneClinique'; ?>",
					type: 'post',
					data: {
						id: id,
						selectClinique: "selectClinique",

					},
					success: function(data) {
						$('.liste_clinique').html(data);
					}
				});
			}
			// FIN SELECT COMMUNE CLINIQUE



		});












		$(document).ready(function() {
			let profile = document.getElementById("profile_blocs"),
				openProfile = document.getElementById("open_profile");

			openProfile.addEventListener("click", function() {
				profile.style.display = "block";
				consultation.style.display = "none";
				docteur.style.display = "none";
				medicament.style.display = "none";
				pharmacie.style.display = "none";
				clinique.style.display = "none";
				apropos.style.display = "none";
			});

			let consultation = document.getElementById("consultation_blocs"),
				openConsultation = document.getElementById("open_consultation");

			openConsultation.addEventListener("click", function() {
				consultation.style.display = "block";
				profile.style.display = "none";
				docteur.style.display = "none";
				medicament.style.display = "none";
				pharmacie.style.display = "none";
				clinique.style.display = "none";
				apropos.style.display = "none";
			});

			let docteur = document.getElementById("docteur_blocs"),
				openDocteur = document.getElementById("open_docteur");

			openDocteur.addEventListener("click", function() {
				docteur.style.display = "block";
				profile.style.display = "none";
				consultation.style.display = "none";
				medicament.style.display = "none";
				pharmacie.style.display = "none";
				clinique.style.display = "none";
				apropos.style.display = "none";
			});


			let medicament = document.getElementById("medicament_blocs"),
				openMedicament = document.getElementById("open_medicament");

			openMedicament.addEventListener("click", function() {
				medicament.style.display = "block";
				docteur.style.display = "none";
				profile.style.display = "none";
				consultation.style.display = "none";
				pharmacie.style.display = "none";
				clinique.style.display = "none";
				apropos.style.display = "none";
			});

			let pharmacie = document.getElementById("pharmacie_blocs"),
				openPharmacie = document.getElementById("open_pharmacie");

			openPharmacie.addEventListener("click", function() {
				pharmacie.style.display = "block";
				profile.style.display = "none";
				consultation.style.display = "none";
				docteur.style.display = "none";
				medicament.style.display = "none";
				clinique.style.display = "none";
				apropos.style.display = "none";
			});

			let clinique = document.getElementById("clinique_blocs"),
				openClinique = document.getElementById("open_clinique");

			openClinique.addEventListener("click", function() {
				clinique.style.display = "block";
				profile.style.display = "none";
				consultation.style.display = "none";
				docteur.style.display = "none";
				medicament.style.display = "none";
				pharmacie.style.display = "none";
				apropos.style.display = "none";
			});

			let apropos = document.getElementById("apropos_blocs"),
				openApropos = document.getElementById("open_apropos");

			openApropos.addEventListener("click", function() {
				apropos.style.display = "block";
				profile.style.display = "none";
				consultation.style.display = "none";
				docteur.style.display = "none";
				medicament.style.display = "none";
				pharmacie.style.display = "none";
				clinique.style.display = "none";
			});
		});
	</script>
</body>

</html>
