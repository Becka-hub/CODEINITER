<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dasboardDocteur.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
</head>

<body>
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
						<a href="#" id="open_message">
							<div class="icon"><i class="fa fa-user-md" aria-hidden="true"></i></div>
							<div class="title">Messages <i class="badge badge-danger count_message"></i></div>
						</a>
					</li>
					<li>
						<a href="#" id="open_forums">
							<div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
							<div class="title">Forums</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_listesPatients">
							<div class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></div>
							<div class="title">Listes des patients</div>
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
					<div class="image_docteur">
						<img src="<?php echo base_url() . 'upload/docteur/' . $_SESSION['PHOTODOCTEUR']; ?>" alt="" width="40px" />
						<a href="#">Dr <?php echo $_SESSION['PRENOMDOCTEUR']; ?></a>
					</div>
				</div>
				<div class="bloc_right">
					<div class="btn-group btn_deconnection">
						<a href="<?php echo base_url() . 'admin/docteur/Docteur_controlleur/logout' ?>"><i class="fa fa-power-off"></i></a>
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
								<div class="image_docteur">
									<img src="<?php echo base_url() . 'upload/docteur/' . $_SESSION['PHOTODOCTEUR']; ?>" alt="" />
								</div>
							</div>
							<div class="description_docteur">
								<input type="hidden" value="<?php echo $_SESSION['IDDOCTEUR']; ?>">
								<h6><span>Nom:</span> <?php echo $_SESSION['NOMDOCTEUR']; ?></h6>
								<h6><span>Prénom:</span> <?php echo $_SESSION['PRENOMDOCTEUR']; ?></h6>
								<h6><span>Adresse:</span> <?php echo $_SESSION['ADRESSEDOCTEUR']; ?></h6>
								<h6><span>Téléphone:</span> <?php echo $_SESSION['TELEPHONEDOCTEUR']; ?></h6>
								<h6><span>Adresse mail:</span> <?php echo $_SESSION['MAILDOCTEUR']; ?></h6>
								<h6><span>CIN:</span> <?php echo $_SESSION['CINDOCTEUR']; ?></h6>
								<h6><span>Clinique:</span> <?php echo $_SESSION['CLINIQUEDOCTEUR']; ?></h6>
								<h6><span>Adresse clinique:</span> <?php echo $_SESSION['ADRESSECLINIQUEDOCTEUR']; ?></h6>
								<h6><span>Docteur spécilaisé en:</span> <?php echo $_SESSION['SPECIALISEDOCTEUR']; ?></h6>
								<h6><span>Province:</span> <?php echo $_SESSION['PROVINCEDOCTEUR']; ?> - <span>Région:</span> <?php echo $_SESSION['REGIONDOCTEUR']; ?> - <span>District:</span> <?php echo $_SESSION['DISTRICTDOCTEUR']; ?> - <span>Communes:</span>
									<?php echo $_SESSION['COMMUNEDOCTEUR']; ?> </h6>
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
										<img src="<?php echo base_url('assets/image/login-doctor.png') ?>" alt="">
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




			<!-- Messages -->
			<section class="messages-blocs" id="messages-blocs">
				<div class="message overflow-auto">
					<div class="table-responsive messagePatient">

					</div>

					<!-- Modal -->
					<div class="modal fade" id="reponseMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						<div class="modal-dialog  modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Messages</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body overflow-auto">
									<div class="contenue_consulation">


									</div>
								</div>

								<div class="formulaire_reponse">
									<form id="reponseConsultation" method="POST" enctype="multipart/form-data">
										<div class="file_ordonance">
											<div class="form-group">
												<label for="ordonance">Ordonance :</label>
												<input type="file" class="form-control" name="ordonanceMessage">
											</div>
										</div>
										<div class="input_message">
											<div class="form-group">
												<textarea class="form-control" name="reponseMessageConsultation" placeholder="Réponse ..." required></textarea>
											</div>
											<input type="hidden" value="<?php echo $_SESSION['IDDOCTEUR']; ?>" name="idDocteurMessage">
											<input type="hidden" id="idConsultationMessage" name="idConsultationMessage">
											<input type="hidden" name="reponseConsultation" value="reponseConsultation">
											<button type="submit" class="btn btn-success"><i class="fa fa-send-o"></i></button>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>


				</div>
			</section>
			<!-- Fin Messages -->



			<!-- Forums -->
			<section class="forums-blocs" id="forums-blocs">
				<div class="forums">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-8 col-lg-8 ">
							<div class="content_forum">
								<div class="header_forum">
									<div class="docteur">
										<img src="<?php echo base_url() . 'upload/docteur/' . $_SESSION['PHOTODOCTEUR']; ?>" width="35px" alt="">
										<i class="fa fa-circle actif"></i>
										<h6>Dr <?php echo $_SESSION['PRENOMDOCTEUR']; ?></h6>
									</div>
								</div>
								<div class="body_forum overflow-auto">


								</div>
								<form method="POST" id="formForum">
									<div class="footer_forum">
										<input type="text" id="messageforum" class="form-control" placeholder="Message ..." required>
										<input type="hidden" class="form-control" value="<?php echo $_SESSION['IDDOCTEUR']; ?>" id="idDocteurForum">
										<button class="btn" type="submit"><i class="fa fa-send-o"></i></button>
									</div>
								</form>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 ">
							<div class="membre_docteur ">
								<div class="titre_membre_docteur">
									<h6 class="text-center"> <i class="fa fa-user-md"></i> Docteurs menbres</h6>
								</div>
								<div class="listes_docteur overflow-auto">

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Fin Forums -->


			<!-- Listes Patients -->
			<section class="listesPatients-blocs" id="listesPatients-blocs">
				<div class="listesPatients overflow-auto">
					<div class="recherche_patients">
						<input type="text" id="recherche_patients" class="form-control form-control-sm" placeholder="Recherche ...">
					</div>
					<div class="content_listesPatients">
						<div class="table-responsive table_liste_patients">

						</div>
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
										<select class="custom-select custom-select-md mb-3" id="typeNotification" required>
											<option selected value="">Select types notifications</option>
											<option value="message">Message</option>
											<option value="avertissement">Avertissement</option>
										</select>
									</div>
									<div class="form-group">
										<textarea class="form-control" id="messageNotification" placeholder="Notications ..." required></textarea>
									</div>
									<input type="hidden" id="idPatientNotif">
									<input type="hidden" value="<?php echo $_SESSION['PRENOMDOCTEUR']; ?>" id="prenomDocteurNotif">
									<input type="hidden" value="<?php echo $_SESSION['PHOTODOCTEUR']; ?>" id="photoDocteurNotif">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm">Envoyer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--Fin Modal Notifier Patients -->


				<!--Modal Ordonance Patients -->
				<div class="modal fade modal-OrdonancePatients" id="ordonancePatients" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Ordonnances</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="response_ordonnance">
							</div>

							<form action="<?php echo base_url() . 'admin/docteur/Docteur_controlleur/creerOrdonnance' ?>" id="formOrdonnance" method="post">
								<div class="modal-body">
									<div class="form-group">
										<input type="date" class="form-control form-control-md" id="dateOrdonance" name="dateOrdonance" required>
									</div>
									<div class="form-group">
										<select class="custom-select custom-select-md mb-3" name="delaisOrdonance" required>
											<option selected>Select délais ordonnances</option>
											<option value="1 jours">1 jours</option>
											<option value="2 jours">2 jours</option>
											<option value="3 jours">3 jours</option>
											<option value="4 jours">4 jours</option>
											<option value="5 jours">5 jours</option>
											<option value="6 jours">6 jours</option>
										</select>
									</div>

									<div class="form-group">
										<textarea class="form-control" id="messageOrdonance" name="messageOrdonance" placeholder="Ordonance ..." required></textarea>
									</div>
									<input type="hidden" name="idPatientOrdonnance" id="idPatientOrdonnance">
									<input type="hidden" name="creerOrdonnance" value="creerOrdonnance">
									<input type="hidden" value="<?php echo $_SESSION['NOMDOCTEUR']; ?>" name="nomDocteurOrdonnance" id="nomDocteurOrdonnance">
									<input type="hidden" value="<?php echo $_SESSION['PRENOMDOCTEUR']; ?>" name="prenomDocteurOrdonance" id="prenomDocteurOrdonance">
									<input type="hidden" value="<?php echo $_SESSION['CLINIQUEDOCTEUR']; ?>" name="cliniqueDocteurOrdonance" id="cliniqueDocteurOrdonance">
									<input type="hidden" value="<?php echo $_SESSION['TELEPHONEDOCTEUR']; ?>" name="telephoneDocteurOrdonance" id="telephoneDocteurOrdonance">

								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--Fin Modal Notifier Patients -->



			</section>
			<!-- Listes Patients -->



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

			afficheEnvoiMessage();
			patient();
			countMessage();
			setInterval(afficheEnvoiMessage, 1000);
			setInterval(countMessage, 1000);


			// AFFICHE ENVOI MESSAGE
			function afficheEnvoiMessage() {
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/affichePatient'; ?>",
					type: 'post',
					data: {
						afficheEnvoiMessage: "afficheEnvoiMessage"
					},
					success: function(data) {
						$('.messagePatient').html(data);
					}
				});
			}
			// FIN AFFICHE ENVOI MESSAGE


			// CLICK AFFICHE MESSAGE
			$(document).on("click", "#messagePatient", function(e) {
				e.preventDefault();
				var idConsultation = $(this).attr("value");
				$('#idConsultationMessage').val(idConsultation);
				afficheMessage(idConsultation);
			});

			function afficheMessage(idConsultation) {
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/afficheMessage'; ?>",
					type: 'post',
					data: {
						idConsultation: idConsultation
					},
					success: function(data) {
						$('.contenue_consulation').html(data);
					}
				});
			}
			// FIN AFFICHE MESSAGE

			// AFFICHE LISTES PATIENTS
			$('#recherche_patients').keyup(function() {
				var search = $(this).val();
				if (search != '') {
					patient(search);
				} else {
					patient();
				}
			});

			function patient(search) {
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/patient' ?>",
					method: "POST",
					data: {
						query: search,
						patient: "patient"
					},
					success: function(data) {
						$('.table_liste_patients').html(data);
					}
				});
			}
			// FIN AFFICHE LISTES PATIENTS


			// AFFICHE NOMBRE MESSAGE NON REPONSE
			function countMessage() {
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/countMessage'; ?>",
					type: 'post',
					data: {
						countMessage: "countMessage"
					},
					success: function(data) {
						$('.count_message').html(data);
					}
				});
			}
			// FIN AFFICHE NOMBRE MESSAGE NON REPONSE



			// CLICK AFFICHE DETAILS PATIENTS
			$(document).on("click", "#detailsPatient", function(e) {
				e.preventDefault();
				var idPatient = $(this).attr("value");
				detailsPatient(idPatient);
			});

			function detailsPatient(idPatient) {
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/detailsPatient'; ?>",
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
							url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/suprimerPatient'; ?>",
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
				var prenomDocteurNotif = $('#prenomDocteurNotif').val();
				var photoDocteurNotif = $('#photoDocteurNotif').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/ajouteNotification'; ?>",
					type: 'post',
					data: {
						typeNotification: typeNotification,
						messageNotification: messageNotification,
						idPatientNotif: idPatientNotif,
						prenomDocteurNotif: prenomDocteurNotif,
						photoDocteurNotif: photoDocteurNotif,
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



			// CLICK ORDONNANCE PATIENTS
			$(document).on("click", "#ordonnancePatient", function(e) {
				e.preventDefault();
				var idPatient = $(this).attr("value");
				$('#idPatientOrdonnance').val(idPatient);
				$('.response_ordonnance').html('');
			});
			// FIN

			// RESSET FORM ORDONNANCE
			$("#formOrdonnance").on("submit", function() {
				setTimeout(function() {
					$('#formOrdonnance')[0].reset();
					$('.response_ordonnance').html('<div class="alert alert-success alert-dismissible"><strong>Création ordonnance avec success !<strong></div>');
				},3000);
				
			});
			// FIN RESSET FORM ORDONNANCE

			// REPONSE MESSAGE
			$("#reponseConsultation").on("submit", function(e) {
				e.preventDefault();
				var ordonanceMessage = $('#ordonanceMessage').val();
				var reponseMessageConsultation = $('#reponseMessageConsultation').val();
				var idDocteurMessage = $('#idDocteurMessage').val();
				var idConsultationMessage = $('#idConsultationMessage').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/modifierConsultation'; ?>",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						afficheEnvoiMessage();
						setTimeout(function() {
							location.reload();
						}, 2200);

					}
				});
			});
			// FIN REPONSE MESSAGE




			// AJOUTE MESSAGE FORUM
			$("#formForum").on("submit", function(e) {
				e.preventDefault();
				var messageforum = $('#messageforum').val();
				var idDocteurForum = $('#idDocteurForum').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/ajouteForum'; ?>",
					type: 'post',
					data: {
						messageforum: messageforum,
						idDocteurForum: idDocteurForum,
						ajouteForum: "ajouteForum"
					},
					success: function(data) {

					}
				});
				$('#formForum')[0].reset();
			});
			// FIN AJOUTE MESSAGE FORUM



			// AFFICHE MESSAGE FORUM
			setInterval(afficheMessageForum, 1000);

			function afficheMessageForum() {

				var idDocteurForum = $('#idDocteurForum').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/afficheMessageForum'; ?>",
					type: 'post',
					data: {
						afficheMessageForum: "afficheMessageForum",
						idDocteurForum: idDocteurForum
					},
					success: function(data) {
						$('.body_forum').html(data);
					}
				});

			}
			// FIN AFFICHE MESSAGE FORUM


			// AFFICHE DOCTEUR
			setInterval(afficheDocteur, 1000);

			function afficheDocteur() {
				$.ajax({
					url: "<?php echo base_url() . 'admin/docteur/Docteur_controlleur/afficheDocteur'; ?>",
					type: 'post',
					data: {
						afficheDocteur: "afficheDocteur",
					},
					success: function(data) {
						$('.listes_docteur').html(data);
					}
				});

			}
			// FIN AFFICHE DOCTEUR




		});











		$(document).ready(function() {

			let profile = document.getElementById('profile-blocs'),
				openProfile = document.getElementById('open_profile');

			openProfile.addEventListener('click', function() {
				profile.style.display = "block";
				messages.style.display = "none";
				listesPatients.style.display = "none";
				forums.style.display = "none";


			});


			let messages = document.getElementById('messages-blocs'),
				openMessages = document.getElementById('open_message');

			openMessages.addEventListener('click', function() {
				messages.style.display = "block";
				profile.style.display = "none";
				forums.style.display = "none";
				listesPatients.style.display = "none";


			});



			let forums = document.getElementById('forums-blocs'),
				openForums = document.getElementById('open_forums');

			openForums.addEventListener('click', function() {
				forums.style.display = "block";
				messages.style.display = "none";
				profile.style.display = "none";
				listesPatients.style.display = "none";


			});



			let listesPatients = document.getElementById('listesPatients-blocs'),
				openListesPatients = document.getElementById('open_listesPatients');

			openListesPatients.addEventListener('click', function() {
				listesPatients.style.display = "block";
				forums.style.display = "none";
				profile.style.display = "none";
				messages.style.display = "none";


			});



		});
	</script>
</body>

</html>
