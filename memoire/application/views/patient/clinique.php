<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/clinique.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.css'); ?>">
</head>

<body>
	<input type="hidden" value="<?php echo $idClinique; ?>" id="IDCLINIQUE">
	<input type="hidden" value="<?php echo $_SESSION['IDPATIENT']; ?>" id="IDPATIENT">
	<!-- Header -->
	<section id="header">
		<div class="container">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="#"><img src="<?php echo base_url("assets/image/logo.png"); ?>" alt="image/logo.png" width="50px"></a>
				<h6>Dentiste Ambaranjana</h6>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('patient/Clinique_controlleur/dasboard'); ?>"><i class="fa fa-home"></i></a>
						</li>
					</ul>
				</div>
			</nav>
			<div class="profile_clinique">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<div class="profile">
						<div class="row">
							<div class="col-12 col-sm-6 col-md-4 col-lg-4">
								<div class="logo_clinique">
									<img src="<?php echo base_url() . 'upload/clinique/' . $logoClinique; ?>" alt="">
								</div>
								<div class="logo_doctopharme">
									<img src="<?php echo base_url('assets/image/logo.png') ?>" alt="">
								</div>
							</div>
							<div class="col-12 col-sm-6 col-md-8 col-lg-8">
								<div class="description_profile">
									<h4 class="text-center"><?php echo $nomClinique; ?></h4>
									<h6><i class="fa fa-ambulance"></i> <?php echo $specialiseClinique; ?></h6>
									<hr style="border:1px solid rgb(0, 230, 0);">
									<h6><i class="fa fa-phone-square"></i> <?php echo $telephoneClinique; ?></h6>
									<hr style="border:1px solid rgb(0, 230, 0);">
									<h6><i class="fa fa-map-marker"></i> <?php echo $adresseClinique; ?></h6>
									<hr style="border:1px solid rgb(0, 230, 0);">
									<h6><i class="fa fa-envelope"></i> <?php echo $mailClinique; ?></h6>
									<hr style="border:1px solid rgb(0, 230, 0);">
									<h6><i class="fa fa-calendar"></i> <?php echo $jourClinique; ?></h6>
									<hr style="border:1px solid rgb(0, 230, 0);">
									<h6><i class="fa fa-clock-o"></i> <?php echo $heureClinique; ?></h6>
									<hr style="border:1px solid rgb(0, 230, 0);">
									<h6>Province : <?php echo $provinceClinique; ?> - Région : <?php echo $regionClinique; ?> - District : <?php echo $districtClinique; ?> -
										Communes : <?php echo $communeClinique; ?> </h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fin Header -->


	<!-- Agenda -->
	<section id="clinique">
		<div class="container">
			<div class="content_clinique">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-8 col-lg-8">
						<div class="planing_clinique">
							<div class="titre_planing">
								<h5>Planings</h5>
							</div>
							<div class="content_planing overflow-auto">

							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<div class="rendezVous_prise">
							<div class="titre">
								<h6 class="text-center"><i class="fa fa-calendar-plus-o"></i> Rendez-vous prise</h6>
							</div>
							<div class="content_rendezVousPrise">

							</div>
							<div class="content_reservation">

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ======= Footer ======= -->
			<footer>
				<h6 class="text-center">&copy; Copyright <strong>DOCTOPHARME</strong></h6>
			</footer>
			<!-- =======Fin Fin Footer ======= -->
		</div>


	</section>
	<!-- Fin Agenda -->



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


			// AFFICHE AGENDA

			setInterval(afficheAgenda, 1000);
			afficheAgenda();

			function afficheAgenda() {
				var idClinique = $('#IDCLINIQUE').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Clinique_controlleur/afficheAgenda'; ?>",
					type: 'post',
					data: {
						afficheAgenda: "afficheAgenda",
						idClinique: idClinique,
					},
					success: function(data) {
						$('.content_planing').html(data);
					}
				});
			}


			// FIN AFFICHE AGENDA

			// ALERT BUTTON OFF
			$(document).on('click', '#btn_of', function() {
				Swal.fire('Oops...', 'Cette heure est déja prise !!!', 'error')
			});
			// FIN ALERT BUTTON OFF

			// AJOUTE PANIER AGENDA
			$(document).on('click', '#btn_on', function() {
				var idHeureAgenda = $(this).attr('value');
				var idClinique = $('#IDCLINIQUE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Clinique_controlleur/ajouteHeure'; ?>",
					type: 'post',
					data: {
						ajouteHeure: "ajouteHeure",
						idHeureAgenda: idHeureAgenda,
						idPatient: idPatient,
						idClinique: idClinique
					},
					success: function(data) {
						Swal.fire({
							title: data,
						});
						affichePanier();
					}
				});
			});
			// FIN AJOUTE PANIER AGENDA

			// AFFICHE PANIER
			affichePanier();

			function affichePanier() {
				var idPatient = $('#IDPATIENT').val();
				var idClinique = $('#IDCLINIQUE').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Clinique_controlleur/affichePanier'; ?>",
					type: 'post',
					data: {
						affichePanier: "affichePanier",
						idClinique: idClinique,
						idPatient: idPatient,
					},
					success: function(data) {
						$('.content_rendezVousPrise').html(data);
					}
				});
			}
			// FIN AFFICHE PANIER

			// SUPRIMER PANIER
			$(document).on('click', '.btn_suprimer', function() {
				var idPanier = $(this).attr('value');
				var idPatient = $('#IDPATIENT').val();
				var idClinique = $('#IDCLINIQUE').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Clinique_controlleur/suprimerPanier'; ?>",
					type: 'post',
					data: {
						suprimerPanier: "suprimerPanier",
						idPanier: idPanier,
						idClinique: idClinique,
						idPatient: idPatient,
					},
					success: function(data) {
						affichePanier();
					}
				});
			});
			// FIN SUPRIMER PANIER

			// VALIDATION 
			$(document).on('click', '.btn_valider', function() {
				var idPanier = $(this).attr('value');
				$.ajax({
					url: "<?php echo base_url() . 'patient/Clinique_controlleur/validerPanier'; ?>",
					type: 'post',
					data: {
						ValiderPanier: "ValiderPanier",
						idPanier: idPanier,
					},
					success: function(data) {
						affichePanier();
						afficheReservation();
					}
				});
			});
			// FIN VALIDATION

			// AFFICHE RESERVATION
			setInterval(afficheReservation, 1000);
			afficheReservation();

			function afficheReservation() {
				var idClinique = $('#IDCLINIQUE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Clinique_controlleur/afficheReservation'; ?>",
					type: 'post',
					data: {
						afficheReservation: "afficheReservation",
						idClinique: idClinique,
						idPatient: idPatient
					},
					success: function(data) {
						$('.content_reservation').html(data);
					}
				});
			}

			// FIN AFFICHE RESERVATION

			// SUPRIMER RESERVATION
			$(document).on('click', '#suprimerReservation', function() {
				var idReservation = $(this).attr('value');
				var idClinique = $('#IDCLINIQUE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Clinique_controlleur/supprimerReservation'; ?>",
					type: 'post',
					data: {
						supprimerReservation: "supprimerReservation",
						idClinique: idClinique,
						idPatient: idPatient,
						idReservation: idReservation
					},
					success: function(data) {}
				});
			});
			// FIN SUPRIMER RESERVATION


		});
	</script>
</body>

</html>
